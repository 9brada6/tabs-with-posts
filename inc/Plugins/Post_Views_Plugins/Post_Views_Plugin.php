<?php
/**
 * File that holds the interface with the same name.
 */

namespace TWRP\Plugins;

/**
 * Interface that will tell what methods the plugin wrapper classes should
 * implement.
 */
interface Post_Views_Plugin {

	/**
	 * Whether the plugin support getting the views for a post and
	 * for multiple posts in an array.
	 *
	 * @return bool
	 */
	public static function support_get_views();

	/**
	 * Whether the plugin support support ordering posts by querying the
	 *
	 * @return bool
	 */
	public static function support_order_posts();

	/**
	 * Whether or not the plugin is installed.
	 *
	 * @return bool
	 */
	public static function is_installed();

	/**
	 * Get the views for a post. This function will fail silently.
	 *
	 * @param int|string $post_id The post Id.
	 * @return int
	 */
	public static function get_post_views( $post_id );

	/**
	 * Get the views for all the posts in the array. This function will fail
	 * silently.
	 *
	 * @param array $posts_ids
	 * @return array<int,int> The key of the array represents the post Id, and
	 *                        the value the post views number.
	 */
	public static function get_posts_views( $posts_ids );

	/**
	 * Given an array with WP_Query args return the new WP_Query args that will
	 * have the parameters added to order by this plugin views.
	 *
	 * @param array $query_args
	 * @return array
	 */
	public static function construct_query_order( $query_args );
}
