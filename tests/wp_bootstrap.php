<?php
/**
 * PHPUnit bootstrap file
 *
 * @package Tabs_With_Recommended_Posts
 * @phan-file-suppress PhanUndeclaredConstant, PhanUndeclaredFunction
 */

if ( \function_exists( 'xdebug_set_filter' ) ) {
	/**
	 * Speed up phpunit for code coverage, by filtering some xdebug files.
	 */
	\xdebug_set_filter(
		\XDEBUG_FILTER_CODE_COVERAGE,
		\XDEBUG_PATH_WHITELIST,
		array(
			'/var/www/html/wp-content/plugins/tabs-with-recommended-posts/inc/Query_Setting/',
			'/var/www/html/wp-content/plugins/tabs-with-recommended-posts/inc/Icons/',
		)
	);
}

$_tests_dir = getenv( 'WP_TESTS_DIR' );

if ( ! $_tests_dir ) {
	$_tests_dir = dirname( dirname( dirname( dirname( dirname( dirname( __FILE__ ) ) ) ) ) ) . '/wp-test/wordpress-tests-lib';
}

if ( ! file_exists( $_tests_dir . '/includes/functions.php' ) ) {
	echo "Could not find $_tests_dir/includes/functions.php, have you run bin/install-wp-tests.sh ?" . PHP_EOL; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	exit( 1 );
}

// Give access to tests_add_filter() function.
require_once $_tests_dir . '/includes/functions.php';

/**
 * Manually load the plugin being tested.
 */
function _manually_load_plugin() {
	require dirname( dirname( __FILE__ ) ) . '/tabs-with-recommended-posts.php';
}
tests_add_filter( 'muplugins_loaded', '_manually_load_plugin' );

// Start up the WP testing environment.
require $_tests_dir . '/includes/bootstrap.php';
