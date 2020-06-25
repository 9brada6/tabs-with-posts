<?php

namespace TWRP\Plugins;

class Post_Views {

	/**
	 * Array that holds all the classes that calls for each plugin API. The
	 * order of the plugin class names means the preference order to use one of
	 * them.
	 *
	 * @var array
	 */
	protected static $all_plugin_class_names = array(
		'DFactory' => 'DFactory_Post_Views_Counter_Plugin',
		'GamerZ'   => 'GamerZ_WP_Post_Views_Plugin',
	);

	protected static $plugin_classes = array();

	/**
	 * The plugins class namespace prefix.
	 *
	 * @var string
	 */
	protected static $plugin_namespace = '\\TWRP\\Plugins\\';

	public static function get_plugin_classes() {
		if ( ! empty( self::$plugin_classes ) ) {
			return self::$plugin_classes;
		}

		self::$plugin_classes = array();

		foreach ( self::$all_plugin_class_names as $identity => $class_name ) {
			$fully_qualified_class_name = self::$plugin_namespace . $class_name;
			$plugin_class               = new $fully_qualified_class_name();
			if ( $plugin_class instanceof Post_Views_Plugin ) {
				self::$plugin_classes[ $identity ] = new $fully_qualified_class_name();
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
	 * @todo: Get the preferred plugin from option and do not calculate every time.
	 *
	 * @return false|Post_Views_Plugin False if no views plugin is installed, so
	 * no class can be used, or the corresponding class to use.
	 */
	public static function get_plugin_to_use() {
		// foreach ( self::$all_plugin_classes as $plugin_name_class ) {
		// $fully_qualified_class_name = self::$plugin_namespace . $plugin_name_class;
		// if ( true === $fully_qualified_class_name::is_installed() ) {
		// self::$plugin_class = new $fully_qualified_class_name();
		// return self::$plugin_class; // @phan-suppress-current-line PhanPossiblyNullTypeReturn
		// }
		// }

		// self::$plugin_class = false;
		// return false;
	}

	/**
	 * Get the views for a post. This function will fail silently.
	 *
	 * @param int|string $post_id The post Id.
	 * @return int
	 */
	public static function get_views( $post_id ) {
		$plugin_class = self::get_plugin_to_use();

		if ( ! $plugin_class ) {
			return 0;
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
	public static function get_multiple_posts_views( $posts_ids ) {
		$plugin_class = self::get_plugin_to_use();

		if ( ! $plugin_class ) {
			$return_zeroes = array();
			foreach ( $posts_ids as $id ) {
				$return_zeroes[ $id ] = 0;
			}
			return $return_zeroes;
		}

		$posts_views = $plugin_class::get_multiple_posts_views( $posts_ids );

		return $posts_views;
	}

	#endregion -- Todo
}
