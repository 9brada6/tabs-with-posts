<?php

if ( ! function_exists( 'twrp_fs' ) ) {
	// Create a helper function for easy SDK access.
	function twrp_fs() {
		global $twrp_fs;

		if ( ! isset( $twrp_fs ) ) {
			// Include Freemius SDK.
			require_once dirname( __FILE__ ) . '/freemius/start.php';

			$twrp_fs = fs_dynamic_init(
				array(
					'id'             => '8374',
					'slug'           => 'tabs-with-posts',
					'type'           => 'plugin',
					'public_key'     => 'pk_c1ae81786eb03cf3ee395ca42d790',
					'is_premium'     => false,
					'has_addons'     => false,
					'has_paid_plans' => false,
					'menu'           => array(
						'slug'           => 'tabs_with_recommended_posts',
						'override_exact' => true,
						'first-path'     => 'options-general.php?page=tabs_with_recommended_posts&tab=documentation',
						'account'        => false,
						'contact'        => false,
						'support'        => false,
						'parent'         => array(
							'slug' => 'options-general.php',
						),
					),
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
