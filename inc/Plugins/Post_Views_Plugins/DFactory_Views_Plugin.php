<?php
/**
 * File that holds the class with the same name.
 */

namespace TWRP\Plugins;

/**
 * Adapter type of class that will manage and call the functions for the views
 * plugin written by DFactory.
 */
class DFactory_Views_Plugin extends Post_Views_Plugin {

	const ORDERBY_NAME = 'post_views';

	#region -- Plugin Meta

	public static function get_plugin_title() {
		return 'Post Views Counter';
	}

	public static function get_plugin_author() {
		return 'Digital Factory';
	}

	public static function get_last_tested_plugin_version() {
		return '1.3.2';
	}

	public static function get_plugin_file_relative_path() {
		return 'post-views-counter/post-views-counter.php';
	}

	#endregion -- Plugin Meta

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

	public static function init() {
		// Do nothing.
	}

	public static function is_installed_and_can_be_used() {
		return function_exists( 'pvc_get_post_views' );
	}

	public static function get_views( $post_id ) {
		if ( ! is_numeric( $post_id ) ) {
			return false;
		}
		$post_id = (int) $post_id;

		if ( ! self::is_installed_and_can_be_used() ) {
			return false;
		}

		if ( function_exists( 'pvc_get_post_views' ) ) {
			$post_views = pvc_get_post_views( $post_id ); // @phan-suppress-current-line PhanUndeclaredFunction
		} else {
			return false;
		}

		if ( is_numeric( $post_views ) && $post_views >= 0 ) {
			return (int) $post_views;
		}

		return 0;
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
		$orderby_value = \TWRP\Query_Generator\Query_Setting\Post_Order::PLUGIN_DFACTORY_ORDERBY_VALUE;
		if ( ! isset( $query_args['orderby'][ $orderby_value ] ) ) {
			return $query_args;
		}

		$query_args['order']            = $query_args['orderby'][ $orderby_value ];
		$query_args['orderby']          = 'post_views';
		$query_args['suppress_filters'] = false;

		return $query_args;
	}

}
