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
	 * Whether the plugin support getting the views for a post.
	 *
	 * @return bool
	 */
	public static function support_get_views();

	/**
	 * Whether the plugin support support ordering posts by querying the db.
	 *
	 * @return bool
	 */
	public static function support_order_posts();

	/**
	 * Called before anything else, to initialize actions and filters.
	 *
	 * This function is not called when needed, for example in admin backend or
	 * frontend, but when the WP include the plugin, so additional checking must
	 * be made inside the function.
	 */
	public static function init();

	/**
	 * Whether or not the plugin is installed.
	 *
	 * @return bool
	 */
	public static function is_installed_and_can_be_used();

	/**
	 * Get the views for a post. This function will fail silently.
	 *
	 * @param int|string $post_id The post Id.
	 * @return int
	 */
	public static function get_views( $post_id );

	/**
	 * Given an array with WP_Query args with 'orderby' of type array and a
	 * custom orderby key. Return the new WP_Query args that will have the
	 * parameters modified, to retrieve the posts in order of the views.
	 *
	 * @param array $query_args The normal WP_Query args, only that a new key
	 * will appear as a key in 'orderby' parameter.
	 * @return array
	 */
	public static function modify_query_arg_if_necessary( $query_args );
}
