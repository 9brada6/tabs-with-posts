<?php
/**
 * File that holds the interface with the same name.
 */

namespace TWRP\Plugins;

use TWRP\Simple_Utils;

class GamerZ_Rating_Plugin implements Post_Rating_Plugin {

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
		return true;
	}

	/**
	 * Whether or not the plugin is installed and can be fully used by this
	 * plugin.
	 *
	 * @return bool
	 */
	public static function is_installed_and_can_be_used() {
		if ( ! function_exists( 'the_ratings' ) ) {
			return false;
		}

		return true;
	}

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

		$rating = get_post_meta( $post_id, 'ratings_average', true );

		if ( ( ! is_numeric( $rating ) ) ) {
			return 0;
		}

		$rating = + $rating;

		return $rating;
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

		$votes = get_post_meta( $post_id, 'ratings_users', true );

		if ( ( ! is_numeric( $votes ) ) || ( $votes < 0 ) ) {
			return 0;
		}

		$votes = (int) $votes;

		return $votes;
	}

	/**
	 * Given an array with WP_Query args with 'orderby' of type array and a
	 * custom orderby key. Return the new WP_Query args that will have the
	 * parameters modified, to retrieve the posts in order of the rating.
	 *
	 * @param array $query_args The normal WP_Query args, only that a new key
	 * will appear as a key in 'orderby' parameter.
	 * @return array
	 */
	public static function modify_query_arg_if_necessary( $query_args ) {
		$orderby_value = \TWRP\Query_Setting\Post_Order::PLUGIN_GAMERZ_RATING_ORDERBY_VALUE;

		if ( ! isset( $query_args['orderby'][ $orderby_value ] ) ) {
			return $query_args;
		}

		$new_orderby = array();

		foreach ( $query_args['orderby'] as $orderby => $order ) {
			if ( $orderby_value === $orderby ) {
				$new_orderby['meta_value_num'] = $order;
				continue;
			}
			$new_orderby[ $orderby ] = $order;
		}

		$query_args['orderby']  = $new_orderby;
		$query_args['meta_key'] = 'ratings_average'; // phpcs:ignore -- using meta_key is making query slow.

		return $query_args;
	}

}
