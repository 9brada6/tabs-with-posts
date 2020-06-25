<?php

namespace TWRP\Plugins;

class A3REV_Page_Views_Count_Plugin implements Post_Views_Plugin {

	/**
	 * Whether the plugin support getting the views for a post and
	 * for multiple posts in an array.
	 *
	 * @return bool
	 */
	public function support_get_views() {
		return true;
	}

	/**
	 * Whether the plugin support support ordering posts by querying the db.
	 *
	 * @return bool
	 */
	public function support_order_posts() {
		return false;
	}

	/**
	 * Whether or not the plugin is installed.
	 *
	 * @return bool
	 */
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
	public function get_views( $post_id ) {
		if ( ! is_numeric( $post_id ) ) {
			return 0;
		}
		$post_id = (int) $post_id;

		if ( ! self::is_installed() ) {
			return 0;
		}

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
	 * @return array<int,int> The key of the array represents the Post ID, and
	 *                        the value the post views number.
	 */
	public static function get_multiple_posts_views( $posts_ids ) {
		// Todo.
	}

	/**
	 * Given an array with WP_Query args with 'orderby' of type array and a
	 * custom orderby key. Return the new WP_Query args that will have the
	 * parameters modified, to retrieve the posts in order of the views.
	 *
	 * This plugin does not support ordering, so this function will just return
	 * the query_args unmodified.
	 *
	 * @param array $query_args The normal WP_Query args, only that a new key
	 * will appear as a key in 'orderby' parameter.
	 * @return array
	 */
	public static function modify_query_arg_if_necessary( $query_args ) {
		return $query_args;
	}
}
