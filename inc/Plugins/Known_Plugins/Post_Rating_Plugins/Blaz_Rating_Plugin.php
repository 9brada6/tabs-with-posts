<?php

namespace TWRP\Plugins\Known_Plugins;

use TWRP\Plugins\Post_Rating;
use TWRP\Utils\Helper_Trait\After_Setup_Theme_Init_Trait;
use TWRP\Utils\Simple_Utils;

use WP_Query;

/**
 * Class used to retrieve the ratings for Blaz K. Rating Plugin.
 *
 * This plugin use a 0-5 rating stars system(can be custom changed via a filter).
 */
class Blaz_Rating_Plugin extends Post_Rating_Plugin {

	const QUERY_ADDITIONAL_FILTER_KEY = 'twrp_blazk_rating_order';

	public static function get_class_order_among_siblings() {
		return 20;
	}

	#region -- Plugin Meta

	public function get_plugin_title() {
		return 'Rate my Post';
	}

	public function get_plugin_author() {
		return 'Blaz K.';
	}

	public function get_tested_plugin_versions() {
		return '2.5.0 - 3.3.1';
	}

	public function get_plugin_file_relative_path() {
		return 'rate-my-post/rate-my-post.php';
	}

	#endregion -- Plugin Meta

	#region -- Detect if is installed.

	public function is_installed_and_can_be_used() {
		$avg_function_exist   = function_exists( 'rmp_get_avg_rating' );
		$count_function_exist = function_exists( 'rmp_get_vote_count' );
		return $avg_function_exist && $count_function_exist;
	}

	#endregion -- Detect if is installed.

	#region -- Get Ratings.

	public function get_rating( $post_id ) {
		$post_id = Simple_Utils::get_valid_wp_id( $post_id );
		if ( ! $post_id ) {
			return false;
		}

		$rating = rmp_get_avg_rating( $post_id );
		if ( ! is_numeric( $rating ) ) {
			return 0;
		}

		$rating = + $rating;

		return $rating;
	}

	public function get_rating_count( $post_id ) {
		$post_id = Simple_Utils::get_valid_wp_id( $post_id );
		if ( ! $post_id ) {
			return false;
		}

		$votes = rmp_get_vote_count( $post_id );

		if ( ! is_numeric( $votes ) || ( $votes < 0 ) ) {
			return 0;
		}

		$votes = (int) $votes;

		return $votes;
	}

	#endregion -- Get Ratings.

	#region -- Modify the query argument to order posts.

	public function modify_query_arg_if_necessary( $query_args ) {
		$orderby_value = Post_Rating::ORDERBY_RATING_OPTION_KEY;
		if ( ! isset( $query_args['orderby'][ $orderby_value ] ) ) {
			return $query_args;
		}

		$query_args[ self::QUERY_ADDITIONAL_FILTER_KEY ] = true;
		$query_args['suppress_filters']                  = false;

		// phpcs:ignore WordPress.DB.SlowDBQuery -- Slow Query.
		$query_args['meta_query'] = array(
			'relation'            => 'AND',
			'twrp_rmp_vote_count' => array(
				'key'     => 'rmp_vote_count',
				'compare' => '>',
				'value'   => '0',
				'type'    => 'NUMERIC',
			),
			'twrp_rmp_vote_total' => array(
				'key'     => 'rmp_rating_val_sum',
				'compare' => '>',
				'value'   => '0',
				'type'    => 'NUMERIC',
			),
		);
		$query_args['orderby']    = array(
			'twrp_rmp_vote_total' => 'DESC',
			'twrp_rmp_vote_count' => 'DESC',
			'date'                => 'DESC',
		);

		return $query_args;
	}

	#endregion -- Modify the query argument to order posts.

	#region -- Creating custom filters for ordering posts.

	use After_Setup_Theme_Init_Trait;

	public static function after_setup_theme_init() {
		add_filter(
			'twrp_before_getting_query',
			/**
			 * Added some filters that can order posts by this plugin views.
			 *
			 * @param array $query_args
			 * @return array
			*/
			function( $query_args ) {
				add_filter( 'posts_orderby', array( self::class, 'add_query_posts_orderby_views' ), 10, 2 );
				return $query_args;
			}
		);

		add_filter(
			'twrp_after_getting_posts_filter',
			/**
			 * Remove the filters installed.
			 *
			 * @param array $query_args
			 * @return array
			*/
			function( $query_args ) {
				remove_filter( 'posts_orderby', array( self::class, 'add_query_posts_orderby_views' ) );
				return $query_args;
			}
		);
	}

	/**
	 * Filter function that adds to the query how to order by views stored by
	 * this plugin, if necessary.
	 *
	 * @param string $orderby
	 * @param WP_Query $wp_query
	 * @return string
	 *
	 * @psalm-suppress DocblockTypeContradiction
	 */
	public static function add_query_posts_orderby_views( $orderby, $wp_query ) {
		$query_array = $wp_query->query;
		if ( ! is_array( $query_array ) || ! array_key_exists( self::QUERY_ADDITIONAL_FILTER_KEY, $query_array ) ) {
			return $orderby;
		}

		$date_order      = '';
		$orderby_clauses = explode( ', ', $orderby );
		if ( count( $orderby_clauses ) > 2 ) {
			$date_order = ', ' . $orderby_clauses[2];
		}

		$pattern         = '/CAST\(.+?\)/i';
		$matches         = array();
		$pattern_matches = preg_match_all( $pattern, $orderby, $matches );

		if ( 2 !== $pattern_matches ) {
			// todo: add to log.
			return $orderby;
		}
		if ( isset( $matches[0] ) ) {
			$matches = $matches[0];
		}

		if ( ! isset( $matches[0], $matches[1] ) || ! is_string( $matches[0] ) || ! is_string( $matches[1] ) ) {
			// todo: add to log.
			return $orderby;
		}

		$orderby = '(' . $matches[0] . '/' . $matches[1] . ') DESC';

		return $orderby . $date_order;
	}

	#endregion -- Creating custom filters for ordering posts.

}
