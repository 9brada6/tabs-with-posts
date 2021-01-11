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

use TWRP\Plugin_Bootstrap;
use TWRP\Admin\Settings_Menu;
use TWRP\Database\Query_Options;
use TWRP\TWRP_Widget\Widget;
use TWRP\Query_Generator\Query_Generator;
use TWRP\Utils\Color_Utils;
use TWRP\Utils\Widget_Utils;

/**
 * For Development only.
 */
require_once __DIR__ . '/debug-and-development.php';

require_once __DIR__ . '/inc/Plugin_Bootstrap.php';
Plugin_Bootstrap::include_all_files();
add_action( 'after_setup_theme', array( 'TWRP\\Plugin_Bootstrap', 'initialize_after_setup_theme_hooks' ) );

#region -- Initializing


#endregion -- Initializing

/**
 * Main class.
 */
class TWRP_Main {

	/**
	 * Whether or not the pro plugin is installed.
	 *
	 * @var bool
	 */
	protected static $is_pro = false;

	const VERSION = '1.0.0';

	const TWRP_WIDGET__BASE_ID = 'twrp_tabs_with_recommended_posts';



	/**
	 * The folder name of this plugin.
	 */
	const PLUGIN_FOLDER_NAME = 'tabs-with-recommended-posts';

	/**
	 * The folder where article blocks templates are to be found.
	 */
	const TEMPLATES_FOLDER = 'templates/';

	const ASSETS_FOLDER = 'assets/';

	const SVG_FOLDER = 'assets/svgs/';

	const ALL_ICONS_FILE = 'assets/svgs/all-icons.svg';

	const NEEDED_ICONS_FILE = 'assets/svgs/needed-icons.svg';
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
	wp_localize_script( 'twrp-backend', 'TwrpPickrTranslations', get_pickr_translations() );

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

	wp_enqueue_script( 'twrp-pickr', plugins_url( 'tabs-with-recommended-posts/assets/backend/pickr.min.js' ), array( 'twrp-codemirror' ), '1.0.0', true );

	$php_mode_deps = array( 'twrp-codemirror', 'twrp-codemirror-xml', 'twrp-codemirror-js', 'twrp-codemirror-css', 'twrp-codemirror-html', 'twrp-codemirror-clike' );
	wp_enqueue_script( 'twrp-codemirror-php', plugins_url( 'tabs-with-recommended-posts/assets/codemirror/php.js' ), $php_mode_deps, '1.0.0', true );
}

add_action( 'admin_enqueue_scripts', 'twrp_enqueue_admin', 100 );

function twrp_enqueue() {
	wp_enqueue_script( 'twrp-script', plugins_url( 'tabs-with-recommended-posts/assets/frontend/script.js' ), array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'twrp_enqueue', 100 );

/**
 * Get an array with translations that is needed to be used in the pickr color
 * picker.
 *
 * @return array
 */
function get_pickr_translations() {
	return array(
		// Strings visible in the UI.
		'ui:dialog'       => _x( 'color picker dialog', 'backend', 'twrp' ),
		'btn:toggle'      => _x( 'toggle color picker dialog', 'backend', 'twrp' ),
		'btn:swatch'      => _x( 'color swatch', 'backend', 'twrp' ),
		'btn:last-color'  => _x( 'use previous color', 'backend', 'twrp' ),
		'btn:save'        => _x( 'Save', 'backend', 'twrp' ),
		'btn:cancel'      => _x( 'Cancel', 'backend', 'twrp' ),
		'btn:clear'       => _x( 'Clear', 'backend', 'twrp' ),

		// Strings used for aria-labels.
		'aria:btn:save'   => _x( 'save and close', 'backend, screen reader text', 'twrp' ),
		'aria:btn:cancel' => _x( 'cancel and close', 'backend, screen reader text', 'twrp' ),
		'aria:btn:clear'  => _x( 'clear and close', 'backend, screen reader text', 'twrp' ),
		'aria:input'      => _x( 'color input field', 'backend, screen reader text', 'twrp' ),
		'aria:palette'    => _x( 'color selection area', 'backend, screen reader text', 'twrp' ),
		'aria:hue'        => _x( 'hue selection slider', 'backend, screen reader text', 'twrp' ),
		'aria:opacity'    => _x( 'selection slider', 'backend, screen reader text', 'twrp' ),
	);
}

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
 * Used for debugging in the scripts.
 *
 * @todo: remove.
 *
 * @return null
 */
function twrp_enqueue_scripts_debug() {
	\Debug\dump_bench( 'test_sanitize' );
	try {
		\Debug\console_dump( Query_Options::get_all_query_settings( 10 ), 'Query 10 settings:' );

		$wp_query_args = Query_Generator::get_wp_query_arguments( 10 );
		\Debug\console_dump( $wp_query_args, 'Query 10 Arguments:' );

		$wp_query                  = new WP_Query();
		$wp_query_args['nopaging'] = true;

		\Debug\console_dump( $wp_query->query( $wp_query_args ), 'Query 10 Posts (with no paging added):' );
	} catch ( \RuntimeException $e ) {
		\Debug\console_dump( 'Not working, error', 'Query 1 settings:' );
	}

	$args = array(
		'no_found_rows'          => true,
		'nopaging'               => true,
		'post__in'               => array( 75 ),
		'cat'                    => 1,
		'update_post_term_cache' => false,
		'ignore_sticky_posts'    => false,
		// 'suppress_filters' => true,
		// 'post_status'      => 'future',
		// 'perm'             => 'readable',
		// 'post__in'         => array( 25 ),
	);
	$wp_query = new WP_Query();
	$queries  = $wp_query->query( $args );
	\Debug\console_dump( $queries, 'Custom get posts' );

	// Widget_Utils::get_widget_instance_by_id( 2 );

	return null;
}

add_action( 'wp_footer', 'twrp_enqueue_scripts_debug' );
add_action( 'admin_footer', 'twrp_enqueue_scripts_debug' );

// phpcs:disable - For testings purposes.

#endregion -- Testing
