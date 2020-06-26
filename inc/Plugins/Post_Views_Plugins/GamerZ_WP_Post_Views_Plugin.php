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
	 * Whether the plugin support support ordering posts by querying the db.
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
		if ( ! is_numeric( $post_id ) ) {
			return 0;
		}
		$post_id = (int) $post_id;

		if ( ! self::is_installed() ) {
			return 0;
		}

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
	 * Given an array with WP_Query args with 'orderby' of type array and a
	 * custom orderby key. Return the new WP_Query args that will have the
	 * parameters modified, to retrieve the posts in order of the views.
	 *
	 * @param array $query_args The normal WP_Query args, only that a new key
	 * will appear as a key in 'orderby' parameter.
	 * @return array
	 */
	public static function modify_query_arg_if_necessary( $query_args ) {
		$orderby_value = \TWRP\Query_Setting\Post_Order::PLUGIN_GAMERZ_VIEWS_ORDERBY_VALUE;
		if ( ! isset( $query_args['orderby'][ $orderby_value ] ) ) {
			return $query_args;
		}

		$new_orderby = array();

		foreach ( $query_args['orderby'] as $orderby => $order ) {
			if ( $orderby_value === $orderby ) {
				$new_orderby['meta_value_num'] = $order;
				continue;
			}
			$new_orderby[ $orderby ] = $order;
		}

		$query_args['orderby']  = $new_orderby;
		$query_args['meta_key'] = 'views'; // phpcs:ignore -- using meta_key is making query slow.

		return $query_args;
	}

}
