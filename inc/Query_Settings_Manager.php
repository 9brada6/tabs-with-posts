<?php
/**
 * File that holds the class with the same name.
 */

namespace TWRP;

use TWRP\Query_Setting\Query_Setting;

class Query_Settings_Manager {

	/**
	 * Hold the classes that will be used to display the settings in the backed.
	 *
	 * @var array<Query_Setting>
	 */
	protected static $query_backend_settings = array();

	/**
	 * Hold the classes that will be used to make the custom WP query arguments.
	 *
	 * @var array<Query_Setting>
	 */
	protected static $query_args_settings = array();

	/**
	 * Register a Query_Setting class to add its settings to the WP query args
	 * when needed.
	 *
	 * @param string $setting_class_name
	 * @param int|null $priority Defaults to be added after the last one.
	 * @return void
	 *
	 * @psalm-param class-string<Query_Setting> $setting_class_name
	 */
	public static function register_query_arg_setting( $setting_class_name, $priority = 0 ) {
		/** @psalm-suppress DocblockTypeContradiction */
		if ( ! class_exists( $setting_class_name ) ) {
			// phpcs:ignore -- Todo: change this
			trigger_error( 'The class: ' . esc_html( $setting_class_name ) . ' does not exist.' );
			return;
		}

		$setting_class = new $setting_class_name();

		if ( $setting_class instanceof Query_Setting ) {
			if ( is_numeric( $priority ) && ! empty( $priority ) && ! array_key_exists( $priority, self::$query_args_settings ) ) {
				self::$query_args_settings[ $priority ] = $setting_class;
			} else {
				self::$query_args_settings [] = $setting_class;
			}
		}

		ksort( self::$query_backend_settings, SORT_NUMERIC );
	}

	/**
	 * Executes the initialization of this class, and all query settings classes.
	 *
	 * Always called at 'after_setup_theme' action. Other things added here should be
	 * additionally checked, for example by admin hooks, or whether or not to be
	 * included in special pages, ...etc.
	 *
	 * @return void
	 */
	public static function init() {
		add_action( 'twrp_add_query_backend_setting', array( 'TWRP\\Query_Settings_Manager', 'add_plugin_query_settings' ) );
		do_action( 'twrp_add_query_backend_setting' );
	}

	/**
	 * Return the registered classes used to create custom settings for the WP
	 * Query.
	 *
	 * @return Query_Setting[]
	 */
	public static function get_registered_query_args_settings() {
		return self::$query_args_settings;
	}

	/**
	 * @return void
	 */
	public static function add_plugin_query_settings() {
		self::register_query_arg_setting( 'TWRP\Query_Setting\Post_Types'::class, 20 );
		self::register_query_arg_setting( 'TWRP\Query_Setting\Post_Status'::class, 30 );
		self::register_query_arg_setting( 'TWRP\Query_Setting\Post_Order'::class, 40 );
		self::register_query_arg_setting( 'TWRP\Query_Setting\Post_Settings'::class, 50 );
		self::register_query_arg_setting( 'TWRP\Query_Setting\Categories'::class, 60 );

		self::register_query_arg_setting( 'TWRP\Query_Setting\Sticky_Posts'::class, 33 );
		self::register_query_arg_setting( 'TWRP\Query_Setting\Meta_Setting'::class, 33 );

		self::register_query_arg_setting( 'TWRP\Query_Setting\Post_Date'::class, 35 );
		self::register_query_arg_setting( 'TWRP\Query_Setting\Author'::class, 40 );
		self::register_query_arg_setting( 'TWRP\Query_Setting\Post_Comments'::class, 60 );
		self::register_query_arg_setting( 'TWRP\Query_Setting\Search'::class, 70 );
		self::register_query_arg_setting( 'TWRP\Query_Setting\Password_Protected'::class, 80 );
		self::register_query_arg_setting( 'TWRP\Query_Setting\Suppress_Filters'::class, 90 );
	}
}
