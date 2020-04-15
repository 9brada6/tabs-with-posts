<?php
/**
 * Contains the interface needed to calculate the posts retrieved by a WP Query.
 *
 * @package Tabs_With_Recommended_Posts
 */

/**
 * Interface that implements functions needed to create query arguments to
 * get posts via WP_Query class.
 */
interface TWRP_Create_Query_Args {

	/**
	 * Add the setting into some previous WP_Query arguments to retrieve posts
	 * via WP_Query class.
	 *
	 * The previous query arguments will be modified such that will also contain
	 * the new settings, and will return the new query arguments to be passed
	 * into WP_Query class.
	 *
	 * @param array $previous_query_args The query arguments before being modified.
	 * @param mixed $setting The setting to modify the query args with.
	 *
	 * @return array The new arguments modified.
	 */
	public static function add_query_arg( $previous_query_args, $setting );
}
