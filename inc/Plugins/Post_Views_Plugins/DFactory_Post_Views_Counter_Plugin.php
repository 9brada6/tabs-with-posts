<?php

namespace TWRP\Plugins;

class DFactory_Post_Views_Counter_Plugin implements Post_Views_Plugin {

	/**
	 * Whether the plugin support getting the views for a post and
	 * for multiple posts in an array.
	 *
	 * @return bool
	 */
	public static function support_get_views() {
		return true;
	}

	/**
	 * Whether the plugin support support ordering posts by querying the
	 *
	 * @return bool
	 */
	public static function support_order_posts() {
		return true;
	}

	/**
	 * Get the views for a post. This function will fail silently.
	 *
	 * @param int|string $post_id The post Id.
	 * @return int
	 */
	public static function get_post_views( $post_id ) {
		if ( ! is_numeric( $post_id ) ) {
			return 0;
		}
		$post_id = (int) $post_id;

		if ( ! function_exists( 'pvc_get_post_views' ) ) {
			return 0;
		}

		$post_views = pvc_get_post_views( $post_id );

		if ( is_numeric( $post_views ) && $post_views > 0 ) {
			return (int) $post_views;
		}

		return 0;
	}

	/**
	 * Get the views for all the posts in the array. This function will fail
	 * silently.
	 *
	 * @todo. Tests and make sure it returns an array of ids and post views.
	 *
	 * @param array $posts_ids
	 * @return array<int,int> The key of the array represents the post Id, and
	 *                        the value the post views number.
	 */
	public static function get_posts_views( $posts_ids ) {
		if ( ! is_array( $posts_ids ) ) {
			return array();
		}

		$posts_views = pvc_get_post_views( $posts_ids );

		return $posts_views;
	}

}
