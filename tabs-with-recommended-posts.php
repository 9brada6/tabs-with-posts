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


class TWRP_Main {

	protected static $plugin_dir;
	protected static $is_pro         = false;
	protected static $is_initialized = false;


	public static function init() {
		self::$is_initialized = true;
		self::$plugin_dir     = plugin_dir_path( __FILE__ );
	}

	public static function get_registered_tabs() {

	}

	public static function get_plugin_dir() {
		return self::$plugin_dir;
	}

	public static function get_posts_ids( $tab_name ) {
		$posts_ids = array();

		foreach ( $posts as $post ) {
			array_push( $posts_ids, $post->ID );
		}
		return $posts_ids;
	}

	public static function get_posts( $tab_name ) {
		// $posts = get_posts( TWRP_Settings::get_wp_query_tab_args( $tab_name ) );

		// return $posts;
	}
}

TWRP_Main::init();

/**
 * Main admin submenu, displayed in the backend.
 */
require_once __DIR__ . '/admin-pages/class-twrp-admin-settings-submenu.php';



require_once __DIR__ . '/admin-pages/tabs/interface-twrp-admin-menu-tab.php';
require_once __DIR__ . '/admin-pages/tabs/class-twrp-documentation-tab.php';
require_once __DIR__ . '/admin-pages/tabs/class-twrp-posts-query-tab.php';
require_once __DIR__ . '/admin-pages/tabs/class-twrp-styles-tab.php';


/**
 * Posts Query Settings
 */
// Main interface for other settings.
require_once __DIR__ . '/inc/settings/interface-twrp-backend-setting.php';
require_once __DIR__ . '/inc/settings/interface-twrp-create-query-args.php';
// Setting to give to name the custom query.
require_once __DIR__ . '/inc/settings/class-twrp-query-name-setting.php';
// Setting to select post types of the custom query.
require_once __DIR__ . '/inc/settings/class-twrp-post-types-setting.php';
// Setting to add a custom list of arguments to WP_Query. For advanced users only.
require_once __DIR__ . '/inc/settings/class-twrp-advance-args-setting.php';
require_once __DIR__ . '/inc/settings/class-twrp-categories-setting.php';
require_once __DIR__ . '/inc/settings/class-twrp-author-setting.php';

require_once __DIR__ . '/inc/class-twrp-query-posts.php';


/**
 *
 */
require_once __DIR__ . '/inc/styles/interface-twrp-style-setting.php';
require_once __DIR__ . '/inc/styles/class-twrp-simple-style.php';
require_once __DIR__ . '/inc/styles/class-twrp-modern-style.php';

require_once __DIR__ . '/inc/class-twrp-manage-options.php';

/**
 * For Development only.
 */
require_once __DIR__ . '/debug-and-development.php';

/**
 * Unclassified
 *
 * @todo: Move
 */
require_once __DIR__ . '/inc/class-twrp-settings.php';


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
		array( 'TWRP_Admin_Settings_Submenu', 'display_admin_page_hook' )
	);
}

add_action( 'admin_menu', 'twrp_add_default_tabs' );

add_action( 'admin_menu', 'twrp_admin_add_setting_submenu' );


function twrp_add_default_tabs() {
	TWRP_Admin_Settings_Submenu::add_tab( 'TWRP_Documentation_Tab' );
	TWRP_Admin_Settings_Submenu::add_tab( 'TWRP_General_Test' );
	TWRP_Admin_Settings_Submenu::add_tab( 'TWRP_Posts_Query_Tab' );
	TWRP_Admin_Settings_Submenu::add_tab( 'TWRP_Styles_Tab' );

	TWRP_Manage_Classes::register_backend_setting_class( 'TWRP_Query_Name_Setting', 10 );
	TWRP_Manage_Classes::register_backend_setting_class( 'TWRP_Post_Types_Setting', 20 );
	TWRP_Manage_Classes::register_backend_setting_class( 'TWRP_Author_Setting', 30 );
	TWRP_Manage_Classes::register_backend_setting_class( 'TWRP_Categories_Setting', 40 );
	TWRP_Manage_Classes::register_backend_setting_class( 'TWRP_Advanced_Args_Setting', 100 );

	TWRP_Manage_Classes::register_query_arg_setting( 'TWRP_Post_Types_Setting', 10 );
	// TWRP_Manage_Classes::register_query_arg_setting( 'TWRP_Advanced_Args_Setting', 1000 );.

	TWRP_Manage_Classes::add_style_class( 'TWRP_Simple_Style' );
	TWRP_Manage_Classes::add_style_class( 'TWRP_Modern_Style' );
}


TWRP_Advanced_Args_Setting::init();


function twrp_enqueue_admin() {

	wp_enqueue_style( 'twrp-backend', plugins_url( 'tabs-with-recommended-posts/assets/backend/style.css' ), array(), '1.0.0', 'all' );

	$script_url = plugins_url( 'tabs-with-recommended-posts/assets/backend/script.js' );
	wp_enqueue_script( 'twrp-backend', $script_url, array( 'jquery', 'wp-api' ), '1.0.0', true );

	wp_enqueue_style( 'twrp-codemirror', plugins_url( 'tabs-with-recommended-posts/assets/codemirror/codemirror.css' ), array(), '1.0.0', 'all' );
	wp_enqueue_style( 'twrp-codemirror-theme', plugins_url( 'tabs-with-recommended-posts/assets/codemirror/material-darker.css' ), array(), '1.0.0', 'all' );

	wp_enqueue_script( 'jquery-ui-accordion' );
	wp_enqueue_script( 'jquery-ui-sortable' );
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
