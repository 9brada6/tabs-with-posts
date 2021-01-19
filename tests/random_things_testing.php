<?php
/**
 * File used to test random things, or to debug this plugin.
 */

use TWRP\Database\Query_Options;
use TWRP\Query_Generator\Query_Generator;

/**
 * Used for debugging in the scripts.
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
