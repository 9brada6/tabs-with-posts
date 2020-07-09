<?php
/**
 * File that holds the class with the same name.
 *
 * phpcs:disable Squiz.Commenting.FunctionComment.Missing -- Inherited from interface.
 */

namespace TWRP\Plugins;

/**
 * Adapter type of class that will manage and call the functions for the views
 * plugin written by DFactory.
 */
class DFactory_Views_Plugin implements Post_Views_Plugin {

	const ORDERBY_NAME = 'post_views';

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

		if ( ! self::is_installed_and_can_be_used() ) {
			return 0;
		}

		$post_views = pvc_get_post_views( $post_id );

		if ( is_numeric( $post_views ) && $post_views > 0 ) {
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
		$orderby_value = \TWRP\Query_Setting\Post_Order::PLUGIN_DFACTORY_ORDERBY_VALUE;
		if ( ! isset( $query_args['orderby'][ $orderby_value ] ) ) {
			return $query_args;
		}

		$query_args['order']            = $query_args['orderby'][ $orderby_value ];
		$query_args['orderby']          = 'post_views';
		$query_args['suppress_filters'] = false;

		return $query_args;
	}

}