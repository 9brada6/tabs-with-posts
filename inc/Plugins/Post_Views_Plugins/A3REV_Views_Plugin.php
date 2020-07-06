<?php
/**
 * File that holds the class with the same name.
 *
 * phpcs:disable Squiz.Commenting.FunctionComment.Missing -- Inherited from interface.
 */

namespace TWRP\Plugins;

/**
 * Adapter type of class that will manage and call the functions for the views
 * plugin written by A3REV.
 */
class A3REV_Views_Plugin implements Post_Views_Plugin {

	public static function support_get_views() {
		return true;
	}

	public static function support_order_posts() {
		return false;
	}

	public static function init() {
		// Do nothing.
	}

	public static function is_installed_and_can_be_used() {
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

	public static function get_views( $post_id ) {
		if ( ! is_numeric( $post_id ) ) {
			return 0;
		}
		$post_id = (int) $post_id;

		if ( ! self::is_installed_and_can_be_used() ) {
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

	public static function modify_query_arg_if_necessary( $query_args ) {
		return $query_args;
	}

}
