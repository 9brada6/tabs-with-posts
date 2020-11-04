<?php

namespace TWRP\Plugins;

use TWRP\Utils\Simple_Utils;

class YASR_Rating_Plugin implements Post_Rating_Plugin {

	protected static $cache_ratings = array();

	/**
	 * Whether the plugin support getting the rating for a post and additionally
	 * for multiple posts in an array.
	 *
	 * @return bool
	 */
	public static function support_get_rating() {
		return true;
	}

	/**
	 * Whether the plugin support support ordering posts by querying the db.
	 *
	 * @return bool
	 */
	public static function support_order_posts() {
		return false;
	}

	/**
	 * Whether or not the plugin is installed and can be fully used by this
	 * plugin.
	 *
	 * @return bool
	 */
	public static function is_installed_and_can_be_used() {
		if ( ! class_exists( 'YasrDatabaseRatings' ) ) {
			return false;
		}

		if ( ! method_exists( 'YasrDatabaseRatings', 'getVisitorVotes' ) ) {
			return false;
		}

		if ( ! is_callable( array( 'YasrDatabaseRatings', 'getVisitorVotes' ) ) ) {
			return false;
		}

		return true;
	}

	#region -- Get Ratings.

	/**
	 * Get the average rating for a post. This function will fail silently.
	 *
	 * @param int|string $post_id The post Id.
	 * @return int|float|null Null if plugin is not installed.
	 */
	public static function get_average_rating( $post_id ) {
		if ( ! self::is_installed_and_can_be_used() ) {
			return null;
		}

		$post_id = Simple_Utils::get_valid_wp_id( $post_id );
		if ( ! $post_id ) {
			return null;
		}

		$votes = self::get_votes_from_plugin( $post_id );

		if ( ! isset( $votes['number_of_votes'], $votes['sum_votes'] ) ) {
			return null;
		}

		if ( ( ! is_numeric( $votes['sum_votes'] ) ) || ( ! is_numeric( $votes['number_of_votes'] ) ) ) {
			return 0;
		}

		$sum_votes       = + $votes['sum_votes'];
		$number_of_votes = + $votes['number_of_votes'];

		if ( ! ( $sum_votes > 0 ) || ! ( $number_of_votes > 0 ) ) {
			return 0;
		}

		$overall_rating = $sum_votes / $number_of_votes;

		return round( $overall_rating, 1, PHP_ROUND_HALF_UP );
	}

	/**
	 * Get the number of votes for a post.
	 *
	 * @param int $post_id
	 * @return null|int Null if Plugin is not installed or $post_id id not valid.
	 */
	public static function get_number_of_votes( $post_id ) {
		if ( ! self::is_installed_and_can_be_used() ) {
			return null;
		}

		$post_id = Simple_Utils::get_valid_wp_id( $post_id );
		if ( ! $post_id ) {
			return null;
		}

		$votes = self::get_votes_from_plugin( $post_id );

		if ( ! isset( $votes['number_of_votes'] ) || ! is_numeric( $votes['number_of_votes'] ) ) {
			return 0;
		}

		if ( $votes['number_of_votes'] < 0 ) {
			return 0;
		}

		return (int) $votes['number_of_votes'];
	}

	/**
	 * Get the array of votes from the plugin function.
	 *
	 * @param int $post_id
	 * @return null|array
	 */
	protected static function get_votes_from_plugin( $post_id ) {
		if ( ! self::is_installed_and_can_be_used() ) {
			return null;
		}

		if ( isset( self::$cache_ratings[ $post_id ] ) ) {
			$votes = self::$cache_ratings[ $post_id ];
		} else {
			$yasr_class = new \YasrDatabaseRatings();
			$votes      = $yasr_class->getVisitorVotes( ( $post_id ) );
			self::update_internal_cache( $post_id, $votes );
		}

		if ( ! is_array( $votes ) ) {
			return null;
		}

		return $votes;
	}

	/**
	 * Update the cache of the post, to not queue 2 times the database for a
	 * information that can be cached.
	 *
	 * @param int $post_id Will be put as a key.
	 * @param mixed $rating_values Will be put as a key.
	 * @return void
	 */
	protected static function update_internal_cache( $post_id, $rating_values ) {
		self::$cache_ratings[ $post_id ] = $rating_values;
	}

	#endregion -- Get Ratings.

	public static function modify_query_arg_if_necessary( $post_id ) {
		return $post_id;
	}

}
