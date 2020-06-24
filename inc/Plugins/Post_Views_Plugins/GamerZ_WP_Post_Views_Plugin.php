<?php

namespace TWRP\Plugins;

class GamerZ_WP_Post_Views_Plugin implements Post_Views_Plugin {

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
	 * Whether or not the plugin is installed.
	 *
	 * @return bool
	 */
	public static function is_installed() {
		$is_active = false;

		// We search for any of the 2 functions, as one might change in the future.
		$a_function_exist = ( function_exists( 'wp_postview_cache_count_enqueue' ) || function_exists( 'the_views' ) );
		if ( is_plugin_active( 'wp-postviews/wp-postviews.php' ) || $a_function_exist ) {
			$is_active = true;
		}

		return $is_active;
	}

	/**
	 * Get the views for a post. This function will fail silently.
	 *
	 * @param int|string $post_id The post Id.
	 * @return int
	 */
	public static function get_views( $post_id ) {
		$post_views = get_post_meta( $post_id, 'views', true );

		if ( ! is_numeric( $post_views ) || ! ( $post_views > 0 ) ) {
			$post_views = 0;
		}

		return $post_views;
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
		// todo.
	}

	/**
	 * Given an array with WP_Query args return the new WP_Query args that will
	 * have the parameters added to order by this plugin views.
	 *
	 * @param array $query_args The normal WP_Query args, only that 'post_views'
	 * appears as a key in 'orderby' parameter.
	 * @return array
	 */
	public static function modify_query_arg( $query_args ) {
		if ( ! is_array( $query_args['orderby'] ) ) {
			return $query_args;
		}

		if ( ! isset( $query_args['orderby']['post_views'] ) ) {
			return $query_args;
		}

		$new_orderby = array();

		foreach ( $query_args['orderby'] as $orderby => $order ) {
			if ( 'post_views' === $orderby ) {
				$new_orderby['meta_value_num'] = $order;
				continue;
			}
			$new_orderby[ $orderby ] = $order;
		}

		$query_args['meta_key'] = 'views'; // phpcs:ignore -- using meta_key is making query slow.

		return $query_args;
	}

}
