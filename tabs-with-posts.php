<?php
/**
 * The plugin bootstrap file.
 *
 * @wordpress-plugin
 * Plugin Name:       Tabs with Recommended Posts (Widget)
 * Description:       Widget to show posts(latest/most viewed/best rated/custom), with a very solid and nice design. Focused on user friendliness to customize.
 * Version:           0.9.0
 * Author:            Bradatan Dorin
 * License:           CC BY-NC-ND
 * Text Domain:       tabs-with-posts
 * Domain Path:       @todo
 */

use TWRP\Plugin_Bootstrap;

/**
 * Require Freemius initialization.
 */
require_once __DIR__ . '/inc/Freemius_Init.php';

/**
 * Include all the files of this plugin.
 */
require_once __DIR__ . '/inc/Plugin_Bootstrap.php';
Plugin_Bootstrap::include_all_files();

/**
 * Script to execute right now. Cannot wait until 'after_setup_theme' action.
 */
Plugin_Bootstrap::after_file_including_execute();

/**
 * Initialize all the WordPress Hooks and Actions that needs to be called.
 *
 * The function called search for all classes that implements a specific trait,
 * that suggest the class wants to use some event-driven WP hooks/actions.
 *
 * All hooks and actions used should be after the 'after_setup_theme' action.
 * If a hook or action that is earlier needs to be called, then it should be
 * added in the classic way. 'after_setup_theme' action is used because a class
 * that is not yet included might not get called.
 */
add_action( 'after_setup_theme', array( Plugin_Bootstrap::class, 'initialize_after_setup_theme_hooks' ) );

/**
 * For Development and Tests.
 */
if ( file_exists( __DIR__ . '/tests/debug-and-development.php' ) ) {
	require_once __DIR__ . '/tests/debug-and-development.php';
}

if ( file_exists( __DIR__ . '/tests/random_things_testing.php' ) ) {
	require_once __DIR__ . '/tests/random_things_testing.php';
}
