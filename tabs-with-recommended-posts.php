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
use TWRP\Query_Settings_Manager;
use TWRP\Article_Blocks_Manager;
use TWRP\TWRP_Widget\Widget;
use TWRP\TWRP_Widget\Widget_Ajax;
use TWRP\Plugins\Post_Views;

use function Debug\stop_bench_and_dump;

/**
 * For Development only.
 */
require_once __DIR__ . '/debug-and-development.php';

\Debug\start_bench( 'require_files' );
require_once __DIR__ . '/require-files.php';
\Debug\stop_bench( 'require_files' );

\Debug\start_bench( 'twrp' );

class TWRP_Main {

	protected static $is_pro         = false;
	protected static $is_initialized = false;

	const SETTINGS_CLASSES_FOLDER = 'inc/settings/';

	const TEMPLATES_FOLDER = 'templates/';

	/**
	 * @todo: Find on what OS's we can interchange "\" with /.
	 * @todo: Compatibility of OS's between "\" and "/".
	 */
	protected static $autoload_directories = array(
		'TWRP\\'                   => array( 'inc/', 'tests/' ),
		'TWRP\\Plugins'            => array( 'inc/Plugins', 'inc/Plugins/Post_Views_Plugins', 'inc/Plugins/Rating_Plugins', 'inc/Plugins/Related_Plugins' ),
		'TWRP\\Artblock_Component' => array( 'inc/Artblock_Component', 'inc/Artblock_Component/Widget_Component_Setting' ),
	);

	public static function init() {
		self::$is_initialized = true;
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

	// TODO: learn about autoload and improve.
	protected static function autoload_plugin_classes( $class_name ) {
		$class_name_parts = explode( '\\', $class_name );

		if ( isset( $class_name_parts[0] ) && ( '' === $class_name_parts[0] ) ) {
			array_shift( $class_name_parts );
		}

		// Base namespace needs to be TWRP.
		if ( empty( $class_name_parts ) || 'TWRP' !== $class_name_parts[0] ) {
			return;
		}

		foreach ( self::$autoload_directories as $autoload_namespace => $autoload_directories ) {
			if ( is_string( $autoload_directories ) ) {
				$autoload_directories = array( $autoload_directories );
			}

			foreach ( $autoload_directories as $autoload_dir ) {
				$relative_directory = ltrim( str_replace( $autoload_namespace, $autoload_dir, $class_name ) . '.php', '/\\' );
				$relative_directory = str_replace( '\\', '/', $relative_directory );

				$file_path = trailingslashit( self::get_plugin_directory() ) . $relative_directory;

				\Debug\start_foreach_bench( 'autoload_fornew' );
				$file_exist = false;
				if ( is_file( $file_path ) ) {
					$file_exist = true;
				}
				\Debug\stop_foreach_bench( 'autoload_fornew' );
				if ( $file_exist ) {
					require_once $file_path;
				}
			}
		}
	}
}

TWRP_Main::init();





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
	Query_Settings_Manager::register_backend_setting_class( 'TWRP\Query_Setting\Query_Name', 10 );
	Query_Settings_Manager::register_backend_setting_class( 'TWRP\Query_Setting\Post_Types', 20 );
	Query_Settings_Manager::register_backend_setting_class( 'TWRP\Query_Setting\Post_Status', 30 );
	Query_Settings_Manager::register_backend_setting_class( 'TWRP\Query_Setting\Post_Order', 40 );
	Query_Settings_Manager::register_backend_setting_class( 'TWRP\Query_Setting\Post_Settings', 50 );
	Query_Settings_Manager::register_backend_setting_class( 'TWRP\Query_Setting\Categories', 60 );
	Query_Settings_Manager::register_backend_setting_class( 'TWRP\Query_Setting\Post_Date', 70 );
	Query_Settings_Manager::register_backend_setting_class( 'TWRP\Query_Setting\Author', 80 );
	Query_Settings_Manager::register_backend_setting_class( 'TWRP\Query_Setting\Sticky_Posts', 90 );
	Query_Settings_Manager::register_backend_setting_class( 'TWRP\Query_Setting\Post_Comments', 100 );
	Query_Settings_Manager::register_backend_setting_class( 'TWRP\Query_Setting\Search', 110 );
	Query_Settings_Manager::register_backend_setting_class( 'TWRP\Query_Setting\Password_Protected', 120 );
	Query_Settings_Manager::register_backend_setting_class( 'TWRP\Query_Setting\Suppress_Filters', 130 );
	Query_Settings_Manager::register_backend_setting_class( 'TWRP\Query_Setting\Advanced_Arguments', 150 );

	// Todo: some work on authors still left.
	Query_Settings_Manager::register_query_arg_setting( 'TWRP\Query_Setting\Post_Types', 20 );
	Query_Settings_Manager::register_query_arg_setting( 'TWRP\Query_Setting\Post_Status', 30 );
	Query_Settings_Manager::register_query_arg_setting( 'TWRP\Query_Setting\Post_Order', 40 );
	Query_Settings_Manager::register_query_arg_setting( 'TWRP\Query_Setting\Post_Settings', 50 );
	Query_Settings_Manager::register_query_arg_setting( 'TWRP\Query_Setting\Categories', 60 );

	Query_Settings_Manager::register_query_arg_setting( 'TWRP\Query_Setting\Sticky_Posts', 33 );

	Query_Settings_Manager::register_query_arg_setting( 'TWRP\Query_Setting\Post_Date', 35 );
	Query_Settings_Manager::register_query_arg_setting( 'TWRP\Query_Setting\Author', 40 );
	Query_Settings_Manager::register_query_arg_setting( 'TWRP\Query_Setting\Post_Comments', 60 );
	Query_Settings_Manager::register_query_arg_setting( 'TWRP\Query_Setting\Search', 70 );
	Query_Settings_Manager::register_query_arg_setting( 'TWRP\Query_Setting\Password_Protected', 80 );
	Query_Settings_Manager::register_query_arg_setting( 'TWRP\Query_Setting\Suppress_Filters', 90 );

	Article_Blocks_Manager::add_style_class( 'TWRP\Article_Block\Simple_Article_Block' );
	Article_Blocks_Manager::add_style_class( 'TWRP\Article_Block\Modern_Article_Block' );
}


\TWRP\Query_Setting\Advanced_Arguments::init();


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
	register_widget( 'TWRP\\TWRP_Widget\\Widget' );
}

add_action( 'widgets_init', 'twrp_register_widgets' );



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

add_action( 'wp_enqueue_scripts', 'twrp_enqueue_artblock_styles' );

#region -- Initializing

twrp_init_classes();

/**
 * Initialize all the functions of the classes, usually implementing actions or
 * filters.
 *
 * @return void
 */
function twrp_init_classes() {
	Widget_Ajax::init();
	Post_Views::init();
}

#endregion -- Initializing

#region -- Testing

function dump_query_settings() {

	// var_dump( \A3Rev\PageViewsCount\A3_PVC::pvc_fetch_post_total( 25 ) );

	$ids_array = array( 25, 27, 29 );
	// var_dump( \TWRP\Plugins\DFactory_Post_Views_Counter_Plugin::get_multiple_posts_views( $ids_array ) );

	// var_dump( pvc_get_post_views( $ids_array ) );

	var_dump( TWRP\Plugins\Post_Views::get_plugin_to_use() );

	var_dump( \TWRP\Get_Posts::get_wp_query_arguments( 4 ) );

	var_dump(
		get_posts(
			array(
				'cat' => '2AND3',
			)
		)
	);

	$args = array(
		'suppress_filters' => false,
	);
	\Debug\console_dump( get_posts( $args ) );

	$args = array(
		'orderby'  => array(
			'comment_count'  => 'DESC',
			'meta_value_num' => 'DESC',
			'date'           => 'ASC',
		),
		'meta_key' => 'views',
	);
	\Debug\console_dump( get_posts( $args ) );
	\Debug\console_dump( get_post_meta( 25, 'views', true ), '25:' );
	\Debug\console_dump( get_post_meta( 27, 'views', true ), '27:' );

	\Debug\console_dump( TWRP\Plugins\YASR_Rating_Plugin::get_average_rating( 25 ), '25 overall rating:' );
	\Debug\console_dump( TWRP\Plugins\YASR_Rating_Plugin::get_number_of_votes( 25 ), '25 nr votes:' );

	\Debug\console_dump( get_post_meta( 27, '_glsr_count', true ), '27 nr votes:' );

}

add_action( 'twrp_after_displaying_existing_queries_table', 'dump_query_settings' );

/**
 * @return string
 */
function test_string() {
	return \TWRP\Query_Setting\Post_Order::setting_is_collapsed();
}

#endregion -- Testing

function twrp_bench_debug() {
	\Debug\dump_bench( 'autoload_fornew', 'autoload_fornew' );
	\Debug\dump_bench( 'require_files', 'require_files' );
}

\Debug\stop_bench( 'twrp' );

add_action( 'wp_enqueue_scripts', 'twrp_bench_debug' );
add_action( 'admin_enqueue_scripts', 'twrp_bench_debug' );
