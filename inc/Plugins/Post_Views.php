<?php

namespace TWRP\Plugins;

use WP_Post;

// todo:
/*
			self::PLUGIN_DFACTORY_ORDERBY_VALUE     => _x( '(Plugin DFactory) Order by post views', 'backend', 'twrp' ),
			self::PLUGIN_GAMERZ_VIEWS_ORDERBY_VALUE => _x( '(Plugin GamerZ) Order by post views', 'backend', 'twrp' ),
			 */
class Post_Views {

	/**
	 * Array that holds all the classes that calls for each plugin API. The
	 * order of the plugin class names means the preference order to use one of
	 * them.
	 *
	 * @var array
	 */
	protected static $all_plugin_class_names = array(
		'DFactory' => 'DFactory_Views_Plugin',
		'GamerZ'   => 'GamerZ_Views_Plugin',
		'A3REV'    => 'A3REV_Views_Plugin',
	);

	/**
	 * Holds an array with an instance of each plugin class. The key is the
	 * acronym of the plugin, as seen in $all_plugin_class_names variable, while
	 * the value is the class instance.
	 *
	 * @var array<string,Post_Views_Plugin>
	 */
	protected static $plugin_classes = array();

	/**
	 * WP views plugin class to use.
	 *
	 * @var Post_Views_Plugin|false
	 */
	protected static $used_plugin_class = false;

	/**
	 * The plugins class namespace prefix.
	 *
	 * @var string
	 */
	protected static $plugin_namespace = '\\TWRP\\Plugins\\';

	/**
	 * Returns an array with each plugin classes, in the usage preference order.
	 *
	 * @return array<string,Post_Views_Plugin>
	 */
	public static function get_plugin_classes() {
		if ( ! empty( self::$plugin_classes ) ) {
			return self::$plugin_classes;
		}

		self::$plugin_classes = array();

		foreach ( self::$all_plugin_class_names as $acronym => $plugin_class_name ) {
			$fully_qualified_class_name = self::$plugin_namespace . $plugin_class_name;
			$plugin_class               = new $fully_qualified_class_name();

			if ( $plugin_class instanceof Post_Views_Plugin ) {
				self::$plugin_classes[ $acronym ] = $plugin_class;
			}
		}

		return self::$plugin_classes;
	}

	/**
	 * Given an array with WP_Query args return the new WP_Query args that will
	 * have the parameters added to order by the views plugin selected.
	 *
	 * @param array $query_args The normal WP_Query args, only that 'post_views'
	 * appears as a key in 'orderby' parameter.
	 * @return array
	 */
	public static function modify_query_arg_if_necessary( $query_args ) {
		$plugin_classes = self::get_plugin_classes();

		foreach ( $plugin_classes as $plugin_class ) {
			$query_args = $plugin_class::modify_query_arg_if_necessary( $query_args );
		}

		return $query_args;
	}

	#region -- Todo

	/**
	 * Get the class of the plugin to use.
	 *
	 * @return false|Post_Views_Plugin False if no views plugin is installed, so
	 * no class can be used, or the corresponding class to use.
	 */
	public static function get_plugin_to_use() {
		foreach ( self::$all_plugin_class_names as $plugin_name_class ) {
			$fully_qualified_class_name = self::$plugin_namespace . $plugin_name_class;

			if ( is_callable( array( $fully_qualified_class_name, 'is_installed_and_can_be_used' ) ) && true === call_user_func( array( $fully_qualified_class_name, 'is_installed_and_can_be_used' ) ) ) {
				$plugin_class = new $fully_qualified_class_name();

				if ( $plugin_class instanceof Post_Views_Plugin ) {
					self::$used_plugin_class = $plugin_class;
					return self::$used_plugin_class;
				}
			}
		}

		self::$used_plugin_class = false;
		return false;
	}

	/**
	 * Get the views for a post. Return false if the views cannot be retrieved,
	 * like the plugin is not installed, or another error.
	 *
	 * @param WP_Post|int|null $post The post to use. Defaults to global $post.
	 * @return int|false
	 */
	public static function get_views( $post = null ) {
		$post = get_post( $post );
		if ( ! ( $post instanceof WP_Post ) ) {
			return false;
		}

		$post_id      = $post->ID;
		$plugin_class = self::get_plugin_to_use();

		if ( ! $plugin_class ) {
			return false;
		}

		$post_views = $plugin_class::get_views( $post_id );
		return $post_views;
	}

	/**
	 * Get the views for all the posts in the array. This function will fail
	 * silently.
	 *
	 * @param array $posts_ids
	 * @return array<int,int> The key of the array represents the Post ID, and
	 *                        the value the post views number.
	 */
	// todo:
	// public static function get_multiple_posts_views( $posts_ids ) {
	// $plugin_class = self::get_plugin_to_use();

	// if ( ! $plugin_class ) {
	// $return_zeroes = array();
	// foreach ( $posts_ids as $id ) {
	// $return_zeroes[ $id ] = 0;
	// }
	// return $return_zeroes;
	// }

	// $posts_views = $plugin_class::get_multiple_posts_views( $posts_ids );

	// return $posts_views;
	// }

	#endregion -- Todo
}
