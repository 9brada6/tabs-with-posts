<?php

namespace TWRP\Plugins;

use TWRP\Plugins\Known_Plugins\Post_Views_Plugin;

use TWRP\Utils\Class_Retriever_Utils;
use TWRP\Utils\Helper_Trait\After_Setup_Theme_Init_Trait;
use TWRP\Utils\Simple_Utils;

use WP_Post;

/**
 * Class that is used to get the number of views of a post.
 *
 * This class can recognize if a known plugin that display views is installed,
 * and use that plugin to get the views.
 *
 * The plugin used will be the first encountered installed plugin, in a specific
 * order of importance or preference.
 */
class Post_Views {

	const ORDERBY_VIEWS_OPTION_KEY = 'twrp_post_views_order';

	use After_Setup_Theme_Init_Trait;

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
	 * Returns an array with each plugin classes, in the usage preference order.
	 *
	 * @return array<string,Post_Views_Plugin>
	 */
	public static function get_plugin_classes() {
		if ( ! empty( self::$plugin_classes ) ) {
			return self::$plugin_classes;
		}

		self::$plugin_classes = Class_Retriever_Utils::get_all_post_views_plugins_objects();
		return self::$plugin_classes;
	}

	/**
	 * Get the class of the plugin to use.
	 *
	 * @return false|Post_Views_Plugin False if no views plugin is installed, so
	 * no class can be used, or the corresponding class to use.
	 */
	public static function get_plugin_to_use() {
		$plugins = self::get_plugin_classes();

		foreach ( $plugins as $plugin_class ) {
			if ( Simple_Utils::method_exist_and_is_public( $plugin_class, 'is_installed_and_can_be_used' ) && $plugin_class->is_installed_and_can_be_used() === true ) {
				self::$used_plugin_class = $plugin_class;
				return self::$used_plugin_class;
			}
		}

		self::$used_plugin_class = false;
		return false;
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
		$plugin_class = self::get_plugin_to_use();
		if ( false === $plugin_class ) {
			return $query_args;
		}

		$query_args = $plugin_class->modify_query_arg_if_necessary( $query_args );
		return $query_args;
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

		$post_views = $plugin_class->get_views( $post_id );
		return $post_views;
	}

	/**
	 * Add filters/actions necessary for this class to work. See
	 * After_Setup_Theme_Init_Trait for more info.
	 *
	 * @return void
	 */
	public static function after_setup_theme_init() {
		add_filter( 'twrp_post_first_orderby_select_options', array( self::class, 'add_orderby_views_option' ) );
		add_filter( 'twrp_get_query_arguments_created', array( self::class, 'modify_query_arg_if_necessary' ), 3 );
	}

	/**
	 * Function used to register the views as an orderby option in the query.
	 *
	 * @param array $orderby_options
	 * @return array
	 */
	public static function add_orderby_views_option( $orderby_options ) {
		$plugin_installed = ( self::get_plugin_to_use() === false ? false : true );

		$not_installed_message = '';
		if ( ! $plugin_installed ) {
			$not_installed_message = _x( 'Plugin not installed', 'backend', 'twrp' );
		}

		$text = _x( 'Order by post views.', 'backend', 'twrp' );
		if ( ! empty( $not_installed_message ) ) {
			$text = $text . '(' . $not_installed_message . ')';
		}

		$orderby_options[ self::ORDERBY_VIEWS_OPTION_KEY ] = $text;
		return $orderby_options;
	}
}
