<?php
/**
 * File that holds the class with the same name.
 */

namespace TWRP\Plugins;

/**
 * Adapter type of class that will manage and call the functions for the views
 * plugin written by GaMerZ.
 */
class GamerZ_Views_Plugin extends Post_Views_Plugin {

	#region -- Plugin Meta

	public static function get_plugin_title() {
		return 'WP-PostViews';
	}

	public static function get_plugin_author() {
		return "Lester 'GaMerZ' Chan";
	}

	public static function get_last_tested_plugin_version() {
		return '1.76.1';
	}

	public static function get_plugin_file_relative_path() {
		return 'wp-postviews/wp-postviews.php';
	}

	#endregion -- Plugin Meta

	public static function support_get_views() {
		return true;
	}

	public static function support_order_posts() {
		return true;
	}

	public static function is_installed_and_can_be_used() {
		if ( ! function_exists( 'the_views' ) ) {
			return false;
		}

		if ( ! function_exists( 'get_totalviews' ) ) {
			return false;
		}

		return true;
	}

	public static function get_views( $post_id ) {
		if ( ! is_numeric( $post_id ) ) {
			return false;
		}
		$post_id = (int) $post_id;

		if ( ! self::is_installed_and_can_be_used() ) {
			return false;
		}

		$post_views = get_post_meta( $post_id, 'views', true );

		if ( is_numeric( $post_views ) && $post_views >= 0 ) {
			return (int) $post_views;
		}

		return 0;
	}

	public static function modify_query_arg_if_necessary( $query_args ) {
		$orderby_value = \TWRP\Query_Generator\Query_Setting\Post_Order::PLUGIN_GAMERZ_VIEWS_ORDERBY_VALUE;
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
