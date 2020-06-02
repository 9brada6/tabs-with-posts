<?php
/**
 * The plugin bootstrap file
 *
 * @wordpress-plugin
 * Plugin Name:       Tabs with Recommended Posts (Widget)
 * Description:       @todo
 * Version:           1.0.0
 * Author:            @todo
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       tabs-with-recommended-posts
 * Domain Path:       @todo
 */

use TWRP\Admin\Settings_Menu;
use TWRP\Manage_Component_Classes;

class TWRP_Main {

	protected static $is_pro         = false;
	protected static $is_initialized = false;

	const SETTINGS_CLASSES_FOLDER = 'inc/settings/';

	const TEMPLATES_FOLDER = 'templates/';

	/**
	 * @todo: Find on what OS's we can interchange "\" with /.
	 * @todo: Compatibility of OS's between "\" and "/".
	 */
	const AUTOLOAD_DIRECTORIES = array( 'TWRP\\' => 'inc/' );

	public static function init() {
		self::$is_initialized = true;
		spl_autoload_register( 'TWRP_Main::autoload_query_classes' );
		spl_autoload_register( 'TWRP_Main::autoload_plugin_classes' );
	}

	/**
	 * Returns the path to this plugin directory.
	 *
	 * @return string The path is trail slashed.
	 */
	public static function get_plugin_directory() {
		return plugin_dir_path( __FILE__ );
	}

	/**
	 * Returns the absolute path to the directory where the settings classes
	 * with their interfaces are defined.
	 *
	 * @return string The path is trail slashed.
	 */
	public static function get_query_settings_classes_directory() {
		// get_plugin_directory() return a trailing slash path, so we use ltrim
		// to be sure not to have "//".
		$directory = self::get_plugin_directory() . ltrim( self::SETTINGS_CLASSES_FOLDER, '/' );
		return trailingslashit( $directory );
	}

	/**
	 * Returns the absolute path to the directory where the templates are found.
	 *
	 * @return string The path is trail slashed.
	 */
	public static function get_templates_directory() {
		// get_plugin_directory() return a trailing slash path, so we use ltrim
		// to be sure not to have "//".
		$directory = self::get_plugin_directory() . ltrim( self::TEMPLATES_FOLDER, '/' );
		return trailingslashit( $directory );
	}


	/**
	 * Verify if a class exist in the settings folder, and require it. Function
	 * to be passed to spl_autoload_register.
	 *
	 * @param string $class_name The name of the class.
	 *
	 * @return void
	 */
	protected static function autoload_query_classes( $class_name ) {
		$directory  = self::get_query_settings_classes_directory();
		$class_name = strtolower( $class_name );
		$class_name = str_replace( '_', '-', $class_name );

		$instance_file_path = $directory . 'instance-' . $class_name . '.php';
		$class_file_path    = $directory . 'class-' . $class_name . '.php';
		if ( is_file( $class_file_path ) ) {
			require_once $class_file_path;
		} elseif ( is_file( $instance_file_path ) ) {
			require_once $instance_file_path;
		}
	}



	protected static function autoload_plugin_classes( $class_name ) {
		$class_name_parts = explode( '\\', $class_name );

		// Base namespace needs to be TWRP.
		if ( empty( $class_name_parts ) || 'TWRP' !== $class_name_parts[0] ) {
			return;
		}

		foreach ( self::AUTOLOAD_DIRECTORIES as $autoload_namespace => $autoload_dir ) {
			$relative_directory = ltrim( str_replace( $autoload_namespace, $autoload_dir, $class_name ) . '.php', '/\\' );
			$relative_directory = str_replace( '\\', '/', $relative_directory );

			$file_path = trailingslashit( self::get_plugin_directory() ) . $relative_directory;
			if ( is_file( $file_path ) ) {
				require_once $file_path;
			}
		}
	}
}

TWRP_Main::init();


/**
 * For Development only.
 */
require_once __DIR__ . '/debug-and-development.php';


/**
 * Unclassified
 *
 * @todo: Move
 */
function twrp_admin_add_setting_submenu() {
	$page_title = _x( 'Tabs with Recommended Posts - Settings', 'backend', 'twrp' );
	$menu_title = _x( 'Recommended Posts Tabs', 'backend', 'twrp' );
	$capability = 'manage_options';
	$slug       = 'tabs_with_recommended_posts';

	add_options_page(
		$page_title,
		$menu_title,
		$capability,
		$slug,
		array( 'TWRP\Admin\Settings_Menu', 'display_admin_page_hook' )
	);
}

add_action( 'admin_menu', 'twrp_add_default_tabs' );

add_action( 'admin_menu', 'twrp_admin_add_setting_submenu' );


function twrp_add_default_tabs() {
	Settings_Menu::add_tab( 'TWRP\Admin\Tabs\Documentation_Tab' );
	Settings_Menu::add_tab( 'TWRP\Admin\Tabs\Queries_Tab' );
}

add_action( 'init', 'twrp_register_settings' );
function twrp_register_settings() {
	Manage_Component_Classes::register_backend_setting_class( 'TWRP\Query_Setting\Query_Name', 10 );
	Manage_Component_Classes::register_backend_setting_class( 'TWRP\Query_Setting\Post_Types', 20 );
	Manage_Component_Classes::register_backend_setting_class( 'TWRP\Query_Setting\Post_Status', 30 );
	Manage_Component_Classes::register_backend_setting_class( 'TWRP\Query_Setting\Post_Order', 33 );
	Manage_Component_Classes::register_backend_setting_class( 'TWRP\Query_Setting\Post_Date', 35 );
	Manage_Component_Classes::register_backend_setting_class( 'TWRP\Query_Setting\Author', 40 );
	Manage_Component_Classes::register_backend_setting_class( 'TWRP\Query_Setting\Categories', 50 );
	Manage_Component_Classes::register_backend_setting_class( 'TWRP\Query_Setting\Post_Comments', 60 );
	Manage_Component_Classes::register_backend_setting_class( 'TWRP\Query_Setting\Search', 70 );
	Manage_Component_Classes::register_backend_setting_class( 'TWRP\Query_Setting\Password_Protected', 80 );
	Manage_Component_Classes::register_backend_setting_class( 'TWRP\Query_Setting\Advanced_Arguments', 100 );

	// Todo: some work on authors still left.
	Manage_Component_Classes::register_query_arg_setting( 'TWRP\Query_Setting\Post_Types', 20 );
	Manage_Component_Classes::register_query_arg_setting( 'TWRP\Query_Setting\Post_Status', 30 );
	Manage_Component_Classes::register_query_arg_setting( 'TWRP\Query_Setting\Post_Order', 33 );
	Manage_Component_Classes::register_query_arg_setting( 'TWRP\Query_Setting\Post_Date', 35 );
	Manage_Component_Classes::register_query_arg_setting( 'TWRP\Query_Setting\Author', 40 );
	Manage_Component_Classes::register_query_arg_setting( 'TWRP\Query_Setting\Post_Comments', 60 );
	Manage_Component_Classes::register_query_arg_setting( 'TWRP\Query_Setting\Search', 70 );
	Manage_Component_Classes::register_query_arg_setting( 'TWRP\Query_Setting\Password_Protected', 80 );

	Manage_Component_Classes::add_style_class( 'TWRP\Article_Block\Simple_Article_Block' );
	Manage_Component_Classes::add_style_class( 'TWRP\Article_Block\Modern_Article_Block' );
}


TWRP\Query_Setting\Advanced_Arguments::init();


function twrp_enqueue_admin() {

	wp_enqueue_style( 'twrp-frontend', plugins_url( 'tabs-with-recommended-posts/assets/frontend/style.css' ), array(), '1.0.0', 'all' );
	wp_enqueue_style( 'twrp-backend', plugins_url( 'tabs-with-recommended-posts/assets/backend/style.css' ), array(), '1.0.0', 'all' );

	$script_url = plugins_url( 'tabs-with-recommended-posts/assets/backend/script.js' );
	wp_enqueue_script( 'twrp-backend', $script_url, array( 'jquery', 'wp-api' ), '1.0.0', true );

	wp_enqueue_style( 'twrp-codemirror', plugins_url( 'tabs-with-recommended-posts/assets/codemirror/codemirror.css' ), array(), '1.0.0', 'all' );
	wp_enqueue_style( 'twrp-codemirror-theme', plugins_url( 'tabs-with-recommended-posts/assets/codemirror/material-darker.css' ), array(), '1.0.0', 'all' );

	wp_enqueue_script( 'jquery-ui-accordion' );
	wp_enqueue_script( 'jquery-ui-sortable' );
	wp_enqueue_script( 'jquery-ui-datepicker' );
	wp_enqueue_script( 'jquery-ui-autocomplete' );
	wp_enqueue_script( 'jquery-effects-blind' );

	wp_enqueue_script( 'twrp-codemirror', plugins_url( 'tabs-with-recommended-posts/assets/codemirror/codemirror.js' ), array(), '1.0.0', true );
	wp_enqueue_script( 'twrp-codemirror-xml', plugins_url( 'tabs-with-recommended-posts/assets/codemirror/xml.js' ), array(), '1.0.0', true );
	wp_enqueue_script( 'twrp-codemirror-js', plugins_url( 'tabs-with-recommended-posts/assets/codemirror/javascript.js' ), array( 'twrp-codemirror' ), '1.0.0', true );
	wp_enqueue_script( 'twrp-codemirror-css', plugins_url( 'tabs-with-recommended-posts/assets/codemirror/css.js' ), array( 'twrp-codemirror' ), '1.0.0', true );
	wp_enqueue_script( 'twrp-codemirror-html', plugins_url( 'tabs-with-recommended-posts/assets/codemirror/htmlmixed.js' ), array( 'twrp-codemirror' ), '1.0.0', true );
	wp_enqueue_script( 'twrp-codemirror-clike', plugins_url( 'tabs-with-recommended-posts/assets/codemirror/clike.js' ), array( 'twrp-codemirror' ), '1.0.0', true );
	wp_enqueue_script( 'twrp-codemirror-autorefresh', plugins_url( 'tabs-with-recommended-posts/assets/codemirror/autorefresh.js' ), array( 'twrp-codemirror' ), '1.0.0', true );

	$php_mode_deps = array( 'twrp-codemirror', 'twrp-codemirror-xml', 'twrp-codemirror-js', 'twrp-codemirror-css', 'twrp-codemirror-html', 'twrp-codemirror-clike' );
	wp_enqueue_script( 'twrp-codemirror-php', plugins_url( 'tabs-with-recommended-posts/assets/codemirror/php.js' ), $php_mode_deps, '1.0.0', true );

}

add_action( 'admin_enqueue_scripts', 'twrp_enqueue_admin', 100 );


function twrp_register_widgets() {
	register_widget( 'TWRP\Tabs_Widget' );
}

add_action( 'widgets_init', 'twrp_register_widgets' );

add_action( 'wp_ajax_twrp_widget_create_query_setting', 'TWRP\Tabs_Widget::ajax_create_query_selected_item' );
add_action( 'wp_ajax_twrp_widget_create_artblock_settings', 'TWRP\Tabs_Widget::ajax_create_artblock_settings' );

function twrp_enqueue_artblock_styles() {
	global $wp_registered_widgets;

	foreach ( $wp_registered_widgets as $widget_full_id => $widget ) {
		if ( ! isset( $widget['callback'][0] ) ) {
			continue;
		}
		$widget_class = $widget['callback'][0];

		if ( ( $widget_class instanceof \TWRP\Tabs_Widget ) && is_active_widget( false, $widget_full_id, $widget_class->id_base ) ) {
			$widget_class::enqueue_scripts( $widget_full_id );
		}
	}
}

add_action( 'wp_enqueue_scripts', 'twrp_enqueue_artblock_styles' );


function dump_query_settings() {
	xdebug_var_dump( \TWRP\Get_Posts::get_wp_query_arguments( 1 ) );
}

add_action( 'twrp_after_displaying_existing_queries_table', 'dump_query_settings' );
