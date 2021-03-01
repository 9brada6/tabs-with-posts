<?php

namespace TWRP\Plugins\Known_Plugins;

use TWRP\Utils\Simple_Utils;

/**
 * Class used to retrieve the ratings for Paul Ryley Rating Plugin, "Site Reviews".
 *
 * @todo: This plugin seems to not get the ratings via the filters.
 */
class Site_Reviews_Rating_Plugin extends Post_Rating_Plugin {

	public static function get_class_order_among_siblings() {
		return 30;
	}

	#region -- Plugin Meta

	public function get_plugin_title() {
		return 'Site Reviews';
	}

	public function get_plugin_author() {
		return 'Paul Ryley';
	}

	public function get_tested_plugin_versions() {
		return '5.7.3 - 5.7.3';
	}

	public function get_plugin_file_relative_path() {
		return 'site-reviews/site-reviews.php';
	}

	#endregion -- Plugin Meta

	#region -- Detect if is installed.

	public function is_installed_and_can_be_used() {
		$plugin_is_installed = function_exists( 'glsr_get_review' ) || function_exists( 'glsr_get_reviews' );
		return $plugin_is_installed;
	}

	#endregion -- Detect if is installed.

	#region -- Get Ratings.

	public function get_rating( $post_id ) {
		$post_id = Simple_Utils::get_valid_wp_id( $post_id );
		if ( ! $post_id ) {
			return false;
		}

		$review = apply_filters(
			'glsr_get_ratings',
			null,
			array(
				'assigned_posts' => 'post_id',
			)
		);

		$review = apply_filters(
			'glsr_get_review',
			null,
			$post_id
		);

		$rating = $review['average'];

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

		// This is a special case of meta.
		$votes_array = get_post_meta( $post_id, '_glsr_count', true );

		if ( ! is_array( $votes_array ) || ! isset( $votes_array['local'] ) || ! is_array( $votes_array['local'] ) ) {
			return 0;
		}

		$total_votes = 0;
		foreach ( $votes_array['local'] as $number_of_votes ) {
			$total_votes += $number_of_votes;
		}

		$total_votes = intval( $total_votes );

		if ( $total_votes < 0 ) {
			return 0;
		}

		return $total_votes;
	}

	#endregion -- Get Ratings.

}
