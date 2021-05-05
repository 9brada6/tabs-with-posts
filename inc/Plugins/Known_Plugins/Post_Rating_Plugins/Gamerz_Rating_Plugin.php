<?php

namespace TWRP\Plugins\Known_Plugins;

use TWRP\Utils\Simple_Utils;

/**
 * Class used to retrieve the ratings for GamerZ Rating Plugin.
 *
 * This plugin use a 0-5 rating stars system by default, but the users can change
 * the rating system very simple via a setting.
 *
 * This plugin has also a like/dislike system, or only a like system. This
 * rating is not implemented to show, and the function
 * is_installed_and_can_be_used will return false if a rating is below 2 stars
 * or a custom rating system is used.
 */
class Gamerz_Rating_Plugin extends Post_Rating_Plugin {

	public static function get_class_order_among_siblings() {
		return 40;
	}

	#region -- Plugin Meta

	public function get_plugin_title() {
		return 'WP-PostRatings';
	}

	public function get_plugin_author() {
		return "Lester 'GaMerZ' Chan";
	}

	public function get_tested_plugin_versions() {
		return '1.50 - 1.89';
	}

	public function get_plugin_file_relative_path() {
		return 'wp-postratings/wp-postratings.php';
	}

	#endregion -- Plugin Meta

	#region -- Detect if is installed.

	public function is_installed_and_can_be_used() {
		$plugin_is_installed = function_exists( 'the_ratings' ) && function_exists( 'expand_ratings_template' );

		$ratings_max    = intval( get_option( 'postratings_max' ) );
		$ratings_custom = intval( get_option( 'postratings_customrating' ) );

		return $plugin_is_installed && ! $ratings_custom && $ratings_max > 2;
	}

	#endregion -- Detect if is installed.

	#region -- Get Ratings.

	public function get_rating( $post_id ) {
		$post_id = Simple_Utils::get_valid_wp_id( $post_id );
		if ( ! $post_id ) {
			return false;
		}

		$rating = get_post_meta( $post_id, 'ratings_average', true );

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

		$votes = get_post_meta( $post_id, 'ratings_users', true );

		if ( ( ! is_numeric( $votes ) ) || ( $votes < 0 ) ) {
			return 0;
		}

		$votes = (int) $votes;

		return $votes;
	}

	#endregion -- Get Ratings.

	#region -- Modify the query argument to order posts.

	public function modify_query_arg_if_necessary( $query_args ) {
		return $query_args;
	}

	#endregion -- Modify the query argument to order posts.

}
