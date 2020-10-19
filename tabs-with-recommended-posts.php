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

use TWRP\Require_Files;
use TWRP\Query_Settings_Manager;
use TWRP\Article_Blocks_Manager;
use TWRP\Admin\Settings_Menu;
use TWRP\Database\Query_Options;
use TWRP\TWRP_Widget\Widget;
use TWRP\TWRP_Widget\Widget_Ajax;
use TWRP\Plugins\Post_Views;
use TWRP\Get_Posts;
use TWRP\Icons\SVG_Manager;
use TWRP\Icons\Create_And_Enqueue_Icons;


/**
 * For Development only.
 */
require_once __DIR__ . '/debug-and-development.php';

// Require all files. An autoloader is not used, because other plugins can use
// an autoloader that is slow, making this plugin slow as well.
require_once __DIR__ . '/inc/Require_Files.php';
Require_Files::init();

#region -- Initializing


/**
 * Initialize all classes init() static methods.
 *
 * @return void
 */
function twrp_initialize() {
	Query_Settings_Manager::init();
	Widget_Ajax::init();
	Post_Views::init();

	// Doesn't matter order of init:
	SVG_Manager::init();
	Create_And_Enqueue_Icons::init();
}
add_action( 'after_setup_theme', 'twrp_initialize' );


#endregion -- Initializing

/**
 * Main class.
 */
class TWRP_Main {

	/**
	 * Whether or not a pro plugin is installed.
	 *
	 * @var bool
	 */
	protected static $is_pro = false;

	const PLUGIN_FOLDER_NAME = 'tabs-with-recommended-posts';

	const TEMPLATES_FOLDER = 'templates/';

	const ASSETS_FOLDER = 'assets/';

	const SVG_FOLDER = 'assets/svgs/';

	/**
	 * Returns the path to this plugin directory.
	 *
	 * @return string The path is trail slashed.
	 */
	public static function get_plugin_directory() {
		return plugin_dir_path( __FILE__ );
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
}


/**
 * Unclassified
 *
 * @todo: Move
 *
 * @return void
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

/**
 * @todo: Move and comment.
 *
 * @return void
 */
function twrp_add_default_tabs() {
	Settings_Menu::add_tab( 'TWRP\Admin\Tabs\Documentation_Tab' );
	Settings_Menu::add_tab( 'TWRP\Admin\Tabs\General_Settings_Tab' );
	Settings_Menu::add_tab( 'TWRP\Admin\Tabs\Queries_Tab' );
}


add_action( 'after_setup_theme', 'twrp_register_settings' );

/**
 * @todo: Move and comment.
 *
 * @return void
 */
function twrp_register_settings() {
	Article_Blocks_Manager::add_style_class( 'TWRP\Article_Block\Simple_Article_Block' );
	Article_Blocks_Manager::add_style_class( 'TWRP\Article_Block\Modern_Article_Block' );
}


\TWRP\Query_Setting\Advanced_Arguments::init();

/**
 * @todo: Move and comment.
 *
 * @return void
 */
function twrp_enqueue_admin() {
	wp_enqueue_style( 'twrp-frontend', plugins_url( 'tabs-with-recommended-posts/assets/frontend/style.css' ), array(), '1.0.0', 'all' );
	wp_enqueue_style( 'twrp-backend', plugins_url( 'tabs-with-recommended-posts/assets/backend/style.css' ), array(), '1.0.0', 'all' );

	$script_url = plugins_url( 'tabs-with-recommended-posts/assets/backend/script.js' );
	wp_enqueue_script( 'twrp-backend', $script_url, array( 'jquery', 'wp-api' ), '1.0.0', true );

	wp_enqueue_style( 'twrp-codemirror', plugins_url( 'tabs-with-recommended-posts/assets/codemirror/codemirror.css' ), array(), '1.0.0', 'all' );
	wp_enqueue_style( 'twrp-codemirror-theme', plugins_url( 'tabs-with-recommended-posts/assets/codemirror/material-darker.css' ), array(), '1.0.0', 'all' );
	wp_enqueue_style( 'twrp-pickr-theme', plugins_url( 'tabs-with-recommended-posts/assets/backend/pickr.min.css' ), array(), '1.0.0', 'all' );

	wp_enqueue_script( 'twrp-jquery-ui', plugins_url( 'tabs-with-recommended-posts/assets/backend/jquery-ui.min.js' ), array(), '1.0.0', true );
	// wp_enqueue_script( 'jquery-ui-tabs' );
	// wp_enqueue_script( 'jquery-ui-accordion' );
	// wp_enqueue_script( 'jquery-ui-sortable' );
	// wp_enqueue_script( 'jquery-ui-datepicker' );
	// wp_enqueue_script( 'jquery-ui-autocomplete' );
	// wp_enqueue_script( 'jquery-effects-blind' );

	wp_enqueue_script( 'twrp-codemirror', plugins_url( 'tabs-with-recommended-posts/assets/codemirror/codemirror.js' ), array(), '1.0.0', true );
	wp_enqueue_script( 'twrp-codemirror-xml', plugins_url( 'tabs-with-recommended-posts/assets/codemirror/xml.js' ), array(), '1.0.0', true );
	wp_enqueue_script( 'twrp-codemirror-js', plugins_url( 'tabs-with-recommended-posts/assets/codemirror/javascript.js' ), array( 'twrp-codemirror' ), '1.0.0', true );
	wp_enqueue_script( 'twrp-codemirror-css', plugins_url( 'tabs-with-recommended-posts/assets/codemirror/css.js' ), array( 'twrp-codemirror' ), '1.0.0', true );
	wp_enqueue_script( 'twrp-codemirror-html', plugins_url( 'tabs-with-recommended-posts/assets/codemirror/htmlmixed.js' ), array( 'twrp-codemirror' ), '1.0.0', true );
	wp_enqueue_script( 'twrp-codemirror-clike', plugins_url( 'tabs-with-recommended-posts/assets/codemirror/clike.js' ), array( 'twrp-codemirror' ), '1.0.0', true );
	wp_enqueue_script( 'twrp-codemirror-autorefresh', plugins_url( 'tabs-with-recommended-posts/assets/codemirror/autorefresh.js' ), array( 'twrp-codemirror' ), '1.0.0', true );

	wp_enqueue_script( 'twrp-pickr', plugins_url( 'tabs-with-recommended-posts/assets/backend/pickr.es5.min.js' ), array( 'twrp-codemirror' ), '1.0.0', true );

	$php_mode_deps = array( 'twrp-codemirror', 'twrp-codemirror-xml', 'twrp-codemirror-js', 'twrp-codemirror-css', 'twrp-codemirror-html', 'twrp-codemirror-clike' );
	wp_enqueue_script( 'twrp-codemirror-php', plugins_url( 'tabs-with-recommended-posts/assets/codemirror/php.js' ), $php_mode_deps, '1.0.0', true );
}

add_action( 'admin_enqueue_scripts', 'twrp_enqueue_admin', 100 );

/**
 * @todo: Move and comment.
 *
 * @return void
 */
function twrp_register_widgets() {
	register_widget( 'TWRP\\TWRP_Widget\\Widget' );
}

add_action( 'widgets_init', 'twrp_register_widgets' );


/**
 * @todo: Move and comment.
 *
 * @return void
 */
function twrp_enqueue_artblock_styles() {
	global $wp_registered_widgets;

	foreach ( $wp_registered_widgets as $widget_full_id => $widget ) {
		if ( ! isset( $widget['callback'][0] ) ) {
			continue;
		}
		$widget_class = $widget['callback'][0];

		if ( ( $widget_class instanceof Widget ) && is_active_widget( false, $widget_full_id, $widget_class->id_base ) ) {
			$widget_class::enqueue_scripts( $widget_full_id );
		}
	}
}

// add_action( 'wp_enqueue_scripts', 'twrp_enqueue_artblock_styles' );

function twrp_enqueue_scripts() {
	wp_enqueue_style( 'twrp-frontend', plugins_url( 'tabs-with-recommended-posts/assets/frontend/style.css' ), array(), '1.0.0', 'all' );
}
add_action( 'wp_enqueue_scripts', 'twrp_enqueue_scripts' );



#region -- Testing

/**
 * Used for testing.
 *
 * @todo: delete.
 *
 * @return void
 */
function twrp_dump_query_settings() {

	// var_dump( \A3Rev\PageViewsCount\A3_PVC::pvc_fetch_post_total( 25 ) );

	$ids_array = array( 25, 27, 29 );
	// var_dump( \TWRP\Plugins\DFactory_Post_Views_Counter_Plugin::get_multiple_posts_views( $ids_array ) );

	// var_dump( pvc_get_post_views( $ids_array ) );

	try {
		\Debug\console_dump( \TWRP\Get_Posts::get_wp_query_arguments( 3 ), 'Query ID 3 Arguments' );
		\Debug\console_dump( \TWRP\Get_Posts::get_wp_query_arguments( 4 ), 'Query ID 4 Arguments' );
	} catch ( \RuntimeException $e ) {
		\Debug\console_dump( 'Query with Id 4 does not exist' );
		// Do nothing
	}

	\Debug\console_dump(
		get_posts(
			array(
				'cat' => '2AND3',
			)
		)
	);

	$args = array(
		'orderby'  => array(
			'comment_count'  => 'DESC',
			'meta_value_num' => 'DESC',
			'date'           => 'ASC',
		),
		'meta_key' => 'views', // phpcs:ignore -- Query is slow.
	);
	\Debug\console_dump( get_posts( $args ) );
	\Debug\console_dump( get_post_meta( 25, 'views', true ), '25:' );
	\Debug\console_dump( get_post_meta( 27, 'views', true ), '27:' );

	\Debug\console_dump( TWRP\Plugins\YASR_Rating_Plugin::get_average_rating( 25 ), '25 overall rating:' );
	\Debug\console_dump( TWRP\Plugins\YASR_Rating_Plugin::get_number_of_votes( 25 ), '25 nr votes:' );

	\Debug\console_dump( get_post_meta( 27, '_glsr_count', true ), '27 nr votes:' );

	\Debug\console_dump( class_exists( 'TWRP\Article_Block\Simple_Article_Block' ) );

}

add_action( 'twrp_after_displaying_existing_queries_table', 'twrp_dump_query_settings' );

/**
 * Used for debugging in the scripts.
 *
 * @todo: remove.
 *
 * @return null
 */
function twrp_enqueue_scripts_debug() {
	\Debug\dump_bench( 'test_sanitize' );
	\Debug\console_dump( get_taxonomies() );
	try {
		\Debug\console_dump( Query_Options::get_all_query_settings( 1 ), 'Query 1 settings:' );
		\Debug\console_dump( Get_Posts::get_wp_query_arguments( 1 ), 'Query 1 settings:' );

	} catch ( \RuntimeException $e ) {
		\Debug\console_dump( 'Not working, error', 'Query 1 settings:' );
	}

	$args = array(
		'suppress_filters' => true,
		'post_status'      => 'future',
		'perm'             => 'readable',
	);
	\Debug\console_dump( get_posts( $args ), 'Custom get posts' );

	return null;
}

add_action( 'wp_footer', 'twrp_enqueue_scripts_debug' );
add_action( 'admin_footer', 'twrp_enqueue_scripts_debug' );

// phpcs:disable


#endregion -- Testing
