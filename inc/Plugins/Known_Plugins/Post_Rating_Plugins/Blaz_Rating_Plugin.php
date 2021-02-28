<?php

namespace TWRP\Plugins\Known_Plugins;

use TWRP\Utils\Simple_Utils;

/**
 * Class used to retrieve the ratings for Blaz K. Rating Plugin.
 *
 * This plugin use a 0-5 rating stars system(can be custom changed via a filter).
 */
class Blaz_Rating_Plugin extends Post_Rating_Plugin {

	public static function get_class_order_among_siblings() {
		return 40;
	}

	#region -- Plugin Meta

	public function get_plugin_title() {
		return 'Rate my Post - WP Rating System';
	}

	public function get_plugin_author() {
		return 'Blaz K.';
	}

	public function get_last_tested_plugin_version() {
		return '3.3.1';
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

}
