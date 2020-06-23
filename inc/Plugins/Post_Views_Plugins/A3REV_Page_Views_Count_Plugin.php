<?php

class A3REV_Page_Views_Count_Plugin {

	public function support_get_views() {
		return true;
	}

	public function support_order_posts() {
		return false;
	}

	public static function is_installed() {
		if ( ! class_exists( 'A3Rev\\PageViewsCount\\A3_PVC' ) ) {
			return false;
		}

		if ( ! method_exists( 'A3Rev\\PageViewsCount\\A3_PVC', 'pvc_fetch_post_total' ) ) {
			return false;
		}

		if ( ! is_callable( array( 'A3Rev\\PageViewsCount\\A3_PVC', 'pvc_fetch_post_total' ) ) ) {
			return false;
		}

		return true;
	}

	/**
	 * Get the views for a post. This function will fail silently.
	 *
	 * @param int|string $post_id The post Id.
	 * @return int
	 */
	public function get_post_views( $post_id ) {
		$total_views = \A3Rev\PageViewsCount\A3_PVC::pvc_fetch_post_total( $post_id );

		if ( is_numeric( $total_views ) ) {
			$total_views = (int) $total_views;
			if ( $total_views > 0 ) {
				return $total_views;
			}
		}

		return 0;
	}

	/**
	 * Get the views for all the posts in the array. This function will fail
	 * silently.
	 *
	 * @param array $posts_ids
	 * @return array<int,int> The key of the array represents the post Id, and
	 *                        the value the post views number.
	 */
	public function get_posts_views( $posts_ids ) {

	}

}
