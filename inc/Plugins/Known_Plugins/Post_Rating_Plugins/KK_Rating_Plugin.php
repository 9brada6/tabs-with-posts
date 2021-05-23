<?php
/**
 * KK Rating plugin file
 *
 * @phpcs:disable Generic.Files.OneObjectStructurePerFile
 */

namespace TWRP\Plugins\Known_Plugins;

use TWRP\Plugins\Post_Rating;
use TWRP\Utils\Simple_Utils;

trait KK_Rating_Plugin_Info {

	public static function get_class_order_among_siblings() {
		return 50;
	}

	#region -- Plugin Meta

	public function get_plugin_title() {
		return 'kk Star Ratings';
	}

	public function get_plugin_author() {
		return 'Kamal Khan.';
	}

	public function get_tested_plugin_versions() {
		return '4.0.0 - 4.2.0';
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

}

if ( twrp_fs()->is__premium_only( 'full' ) ) {

	/**
	 * Class used to retrieve the ratings for KK Rating Plugin.
	 *
	 * This plugin use 5 stars, but can use any stars. Depending on the stars, it
	 * calculates the average based on the 5 stars. This implementation does the
	 * same.
	 */
	class KK_Rating_Plugin extends Post_Rating_Plugin {

		use KK_Rating_Plugin_Info;

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

		#region -- Modify the query argument to order posts.

		public function modify_query_arg_if_necessary( $query_args ) {
			$query_args = $this->modify_query_arg_if_necessary_to_order_by_average( $query_args );
			$query_args = $this->modify_query_arg_if_necessary_to_order_by_count( $query_args );

			return $query_args;
		}

		/**
		 * Given the query args, modify them to order them by average.
		 *
		 * @param array $query_args
		 * @return array
		 */
		public function modify_query_arg_if_necessary_to_order_by_average( $query_args ) {
			$orderby_value = Post_Rating::ORDERBY_RATING_OPTION_KEY;
			if ( ! isset( $query_args['orderby'][ $orderby_value ] ) ) {
				return $query_args;
			}

			$orderby     = $query_args['orderby'];
			$new_orderby = array();
			foreach ( $orderby as $key => $value ) {
				if ( Post_Rating::ORDERBY_RATING_OPTION_KEY === $key ) {
					$new_orderby['meta_value_num'] = $value;
				} else {
					$new_orderby[ $key ] = $value;
				}
			}
			$query_args['orderby']  = $new_orderby;
			$query_args['meta_key'] = '_kksr_avg'; // phpcs:ignore WordPress.DB.SlowDBQuery

			return $query_args;
		}

		/**
		 * Given the query args, modify them to order them by rating count.
		 *
		 * @param array $query_args
		 * @return array
		 */
		public function modify_query_arg_if_necessary_to_order_by_count( $query_args ) {
			$orderby_value = Post_Rating::ORDERBY_RATING_COUNT_OPTION_KEY;
			if ( ! isset( $query_args['orderby'][ $orderby_value ] ) ) {
				return $query_args;
			}

			$orderby     = $query_args['orderby'];
			$new_orderby = array();
			foreach ( $orderby as $key => $value ) {
				if ( Post_Rating::ORDERBY_RATING_COUNT_OPTION_KEY === $key ) {
					$new_orderby['meta_value_num'] = $value;
				} else {
					$new_orderby[ $key ] = $value;
				}
			}
			$query_args['orderby']  = $new_orderby;
			$query_args['meta_key'] = '_kksr_casts'; // phpcs:ignore WordPress.DB.SlowDBQuery

			return $query_args;
		}

		#endregion -- Modify the query argument to order posts.

	}

} else {

	/**
	 * Full class available only in premium plugin.
	 */
	class KK_Rating_Plugin_Locked extends Post_Rating_Plugin_Locked {
		use KK_Rating_Plugin_Info;
	}
}
