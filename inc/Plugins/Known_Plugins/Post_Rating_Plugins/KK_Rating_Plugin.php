<?php

namespace TWRP\Plugins\Known_Plugins;

use TWRP\Utils\Simple_Utils;

/**
 * Class used to retrieve the ratings for KK Rating Plugin.
 */
class KK_Rating_Plugin extends Post_Rating_Plugin {

	public static function get_class_order_among_siblings() {
		return 60;
	}

	#region -- Plugin Meta

	public function get_plugin_title() {
		return 'kk Star Ratings';
	}

	public function get_plugin_author() {
		return 'Kamal Khan.';
	}

	public function get_last_tested_plugin_version() {
		return '4.1.7';
	}

	public function get_plugin_file_relative_path() {
		return 'kk-star-ratings/index.php';
	}

	#endregion -- Plugin Meta

	#region -- Detect if is installed.

	public function is_installed_and_can_be_used() {
		$plugin_is_installed = function_exists( 'kk_star_ratings' );
		return $plugin_is_installed;
	}

	#endregion -- Detect if is installed.

	#region -- Get Ratings.

	public function get_rating( $post_id ) {
		$post_id = Simple_Utils::get_valid_wp_id( $post_id );
		if ( ! $post_id ) {
			return false;
		}

		// Get the average rating.
		$rating = get_post_meta( $post_id, '_kksr_avg', true );
		if ( ! is_numeric( $rating ) ) {
			return 0;
		}
		$rating = + $rating;

		// Get number of maximum stars.
		$maximum_stars = get_option( 'kksr_stars', 5 );
		if ( ! is_numeric( $maximum_stars ) || $maximum_stars < 1 ) {
			$maximum_stars = 5;
		}
		$maximum_stars = + $maximum_stars;

		// This is taken from KK source code, calculate the avg score, relative to 5 stars system.
		$rating = $rating / 5 * $maximum_stars;
		$rating = round( $rating, 1, PHP_ROUND_HALF_DOWN );

		// Sanitize one more time as in KK source code, and return.
		if ( $rating < 0 ) {
			$rating = 0;
		} elseif ( $rating > $maximum_stars ) {
			$rating = $maximum_stars;
		}

		return $rating;
	}

	public function get_rating_count( $post_id ) {
		$post_id = Simple_Utils::get_valid_wp_id( $post_id );
		if ( ! $post_id ) {
			return false;
		}

		$votes = get_post_meta( $post_id, '_kksr_casts', true );

		if ( ( ! is_numeric( $votes ) ) || ( $votes < 0 ) ) {
			return 0;
		}

		$votes = (int) $votes;

		return $votes;
	}

	#endregion -- Get Ratings.

}
