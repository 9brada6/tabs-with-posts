<?php
/**
 * File that holds the interface with the same name.
 */

namespace TWRP\Plugins;

/**
 * Interface that will tell what methods the plugin wrapper classes must
 * implement.
 */
interface Post_Rating_Plugin {

	/**
	 * Whether the plugin support getting the rating for a post and
	 * for multiple posts in an array.
	 *
	 * @return bool
	 */
	public static function support_get_rating();

	/**
	 * Whether the plugin support support ordering posts by querying the db.
	 *
	 * @return bool
	 */
	public static function support_order_posts();

	/**
	 * Whether or not the plugin is installed and can be fully used by this
	 * plugin.
	 *
	 * @return bool
	 */
	public static function is_installed_and_can_be_used();

	/**
	 * Get the rating for a post. This function will fail silently.
	 *
	 * @todo: What to return when fail?
	 *
	 * @param int|string $post_id The post Id.
	 * @return int
	 */
	public static function get_rating( $post_id );

	/**
	 * Given an array with WP_Query args with 'orderby' of type array and a
	 * custom orderby key. Return the new WP_Query args that will have the
	 * parameters modified, to retrieve the posts in order of the rating.
	 *
	 * @param array $query_args The normal WP_Query args, only that a new key
	 * will appear as a key in 'orderby' parameter.
	 * @return array
	 */
	public static function modify_query_arg_if_necessary( $query_args );

}
