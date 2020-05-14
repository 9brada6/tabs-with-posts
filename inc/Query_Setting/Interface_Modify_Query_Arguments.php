<?php
/**
 * Contains the interface needed to calculate the posts retrieved by a WP Query.
 */

namespace TWRP\Query_Setting;

/**
 * Interface that implements functions needed to create query arguments to
 * get posts via WP_Query class.
 */
interface Interface_Modify_Query_Arguments {

	/**
	 * Add the setting into some previous WP_Query arguments to retrieve posts
	 * via WP_Query class.
	 *
	 * The previous query arguments will be modified such that will also contain
	 * the new settings, and will return the new query arguments to be passed
	 * into WP_Query class.
	 *
	 * @param array $previous_query_args The query arguments before being modified.
	 * @param mixed $query_settings All query settings, these settings are unsanitized.
	 *
	 * @return array The new arguments modified.
	 */
	public static function add_query_arg( $previous_query_args, $query_settings );
}
