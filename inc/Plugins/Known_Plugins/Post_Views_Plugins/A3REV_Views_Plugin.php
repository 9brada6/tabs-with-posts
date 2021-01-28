<?php

namespace TWRP\Plugins\Known_Plugins;

use TWRP\Utils\Simple_Utils;

/**
 * Adapter type of class that will manage and call the functions for the views
 * plugin written by A3REV.
 */
class A3REV_Views_Plugin extends Post_Views_Plugin {

	public static function get_class_order_among_siblings() {
		return 30;
	}

	#region -- Plugin Meta

	public static function get_plugin_title() {
		return 'Page View Count';
	}

	public static function get_plugin_author() {
		return 'a3rev Software';
	}

	public static function get_last_tested_plugin_version() {
		return '2.4.3';
	}

	#endregion -- Plugin Meta

	public static function support_get_views() {
		return true;
	}

	public static function support_order_posts() {
		return false;
	}

	public static function is_installed_and_can_be_used() {
		return Simple_Utils::method_exist_and_is_public( 'A3Rev\\PageViewsCount\\A3_PVC', 'pvc_fetch_post_total' );
	}

	public static function get_views( $post_id ) {
		if ( ! is_numeric( $post_id ) ) {
			return 0;
		}
		$post_id = (int) $post_id;

		if ( ! self::is_installed_and_can_be_used() ) {
			return 0;
		}

		if ( class_exists( 'A3Rev\\PageViewsCount\\A3_PVC' ) ) {
			$post_views = \A3Rev\PageViewsCount\A3_PVC::pvc_fetch_post_total( $post_id );
		} else {
			return 0;
		}

		if ( is_numeric( $post_views ) && $post_views >= 0 ) {
			return (int) $post_views;
		}

		return 0;
	}

	public static function modify_query_arg_if_necessary( $query_args ) {
		return $query_args;
	}

	public static function get_plugin_file_relative_path() {
		return 'page-views-count/page-views-count.php';
	}

}
