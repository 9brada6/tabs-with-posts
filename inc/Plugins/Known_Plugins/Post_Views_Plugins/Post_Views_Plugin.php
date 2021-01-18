<?php
/**
 * File that holds the interface with the same name.
 */

namespace TWRP\Plugins\Known_Plugins;

use TWRP\Utils\Helper_Trait\Class_Children_Order_Trait;

/**
 * Interface that will tell what methods the plugin wrapper classes should
 * implement.
 */
abstract class Post_Views_Plugin extends Known_Plugin {

	use Class_Children_Order_Trait;

	/**
	 * Whether the plugin support getting the views for a post.
	 *
	 * @return bool
	 */
	abstract public static function support_get_views();

	/**
	 * Whether the plugin support support ordering posts by querying the db.
	 *
	 * @return bool
	 */
	abstract public static function support_order_posts();

	/**
	 * Get the views for a post. Return false if cannot be retrieved.
	 *
	 * @param int|string $post_id The post Id.
	 * @return int|false
	 */
	abstract public static function get_views( $post_id );

	/**
	 * Given an array with WP_Query args with 'orderby' of type array and a
	 * custom orderby key. Return the new WP_Query args that will have the
	 * parameters modified, to retrieve the posts in order of the views.
	 *
	 * @param array $query_args The normal WP_Query args, only that a new key
	 * will appear as a key in 'orderby' parameter.
	 * @return array
	 */
	abstract public static function modify_query_arg_if_necessary( $query_args );
}
