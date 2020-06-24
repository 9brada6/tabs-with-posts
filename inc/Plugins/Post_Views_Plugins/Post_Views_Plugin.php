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
	public static function get_views( $post_id );

	/**
	 * Get the views for all the posts in the array. This function will fail
	 * silently.
	 *
	 * @param array $posts_ids
	 * @return array<int,int> The key of the array represents the Post ID, and
	 *                        the value the post views number.
	 */
	public static function get_multiple_posts_views( $posts_ids );

	/**
	 * Provides an additional sanitization to the settings.
	 *
	 * @param mixed $sanitized_setting The settings to sanitize.
	 * @param mixed $sanitization_method An identifier as where the settings come from, identifiers
	 * can be found in Additional_Sanitization_Methods class.
	 */
	public static function additional_sanitization( $sanitized_setting, $sanitization_method );

	/**
	 * Given an array with WP_Query args return the new WP_Query args that will
	 * have the parameters added to order by this plugin views.
	 *
	 * @param array $query_args The normal WP_Query args, only that 'post_views'
	 * appears as a key in 'orderby' parameter.
	 * @return array
	 */
	public static function modify_query_arg( $query_args );
}
