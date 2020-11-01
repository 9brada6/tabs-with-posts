<?php
/**
 * File that contains the class with the same name.
 *
 * @phpcs:disable Squiz.Commenting.FunctionComment.Missing
 */

namespace TWRP\Query_Setting_Inserter;

use TWRP\Query_Setting\Advanced_Arguments;

/**
 * Class that adds the needed settings to a WP query array args.
 */
class Advanced_Arguments_Inserter implements Query_Setting_Inserter {

	public function add_query_arg( $previous_query_args, $query_settings ) {
		if ( ! isset( $query_settings[ Advanced_Arguments::get_setting_name() ][ Advanced_Arguments::IS_APPLIED__SETTING_NAME ] ) ) {
			return $previous_query_args;
		}
		$settings = $query_settings[ Advanced_Arguments::get_setting_name() ];

		if ( 'apply' !== $settings[ Advanced_Arguments::IS_APPLIED__SETTING_NAME ] ) {
			return $previous_query_args;
		}

		// todo:

		return $previous_query_args;
	}

}
