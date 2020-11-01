<?php
/**
 * File that contains the interface with the same name.
 */

namespace TWRP\Query_Setting_Inserter;

interface Query_Setting_Inserter {

	/**
	 * Create and insert the new arguments for the WP_Query.
	 *
	 * The previous query arguments will be modified such that will also contain
	 * the new settings, and will return the new query arguments to be passed
	 * into WP_Query class.
	 *
	 * @throws \RuntimeException If a setting cannot implement something.
	 *
	 * @param array $previous_query_args The query arguments before being modified.
	 * @param array $query_settings All query settings, these settings are sanitized.
	 * @return array The new arguments modified.
	 */
	public function add_query_arg( $previous_query_args, $query_settings );
}
