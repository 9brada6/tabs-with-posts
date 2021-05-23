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

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

#region -- Include Freemius.

if ( function_exists( 'twrp_fs' ) ) {
	twrp_fs()->set_basename( true, __FILE__ );
} else {

	#region -- Freemius integration snippet.

	// DO NOT REMOVE THIS IF, IT IS ESSENTIAL FOR THE `function_exists` CALL ABOVE TO PROPERLY WORK.
	if ( ! function_exists( 'twrp_fs' ) ) {
		// Create a helper function for easy SDK access.
		function twrp_fs() {
			global $twrp_fs;

			if ( ! isset( $twrp_fs ) ) {
				// Include Freemius SDK.
				require_once dirname( __FILE__ ) . '/freemius/start.php';

				$twrp_fs = fs_dynamic_init(
					array(
						'id'                  => '8374',
						'slug'                => 'tabs-with-posts',
						'type'                => 'plugin',
						'public_key'          => 'pk_c1ae81786eb03cf3ee395ca42d790',
						'is_premium'          => true,
						'premium_suffix'      => '(Pro)',
						// If your plugin is a serviceware, set this option to false.
						'has_premium_version' => true,
						'has_addons'          => false,
						'has_paid_plans'      => true,
						'trial'               => array(
							'days'               => 7,
							'is_require_payment' => false,
						),
						'menu'                => array(
							'slug'           => 'tabs_with_recommended_posts',
							'override_exact' => true,
							'first-path'     => 'options-general.php?page=tabs_with_recommended_posts&tab=documentation',
							'support'        => false,
							'parent'         => array(
								'slug' => 'options-general.php',
							),
						),
						// Set the SDK to work in a sandbox mode (for development & testing).
						// IMPORTANT: MAKE SURE TO REMOVE SECRET KEY BEFORE DEPLOYMENT.
						'secret_key'          => 'sk_H(LhQ^:9R~P$s=6sp_tm%?Ys4=-&A',
					)
				);
			}

			return $twrp_fs;
		}

		// Init Freemius.
		twrp_fs();
		// Signal that SDK was initiated.
		do_action( 'twrp_fs_loaded' );

		function twrp_fs_settings_url() {
			return admin_url( 'options-general.php?page=tabs_with_recommended_posts&tab=general_settings' );
		}

		twrp_fs()->add_filter( 'connect_url', 'twrp_fs_settings_url' );
		twrp_fs()->add_filter( 'after_skip_url', 'twrp_fs_settings_url' );
		twrp_fs()->add_filter( 'after_connect_url', 'twrp_fs_settings_url' );
		twrp_fs()->add_filter( 'after_pending_connect_url', 'twrp_fs_settings_url' );
	}

	#endregion -- Freemius integration snippet.

	#region -- Plugin Bootstrap

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

	#endregion -- Plugin Bootstrap

}
#endregion -- Include Freemius.
