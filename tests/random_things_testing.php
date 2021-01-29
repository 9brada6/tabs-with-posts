<?php
/**
 * File used to test random things, or to debug this plugin.
 */

/**
 * Used for debugging in the scripts.
 *
 * @return null
 */
function twrp_enqueue_scripts_debug() {
}

add_action( 'wp_footer', 'twrp_enqueue_scripts_debug' );
add_action( 'admin_footer', 'twrp_enqueue_scripts_debug' );
