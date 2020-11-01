<?php
/**
 * File that contains the class with the same name.
 *
 * @phpcs:disable Squiz.Commenting.FunctionComment.Missing
 */

namespace TWRP\Query_Setting_Inserter;

use TWRP\Query_Setting\Password_Protected;

/**
 * Class that adds the needed settings to a WP query array args.
 */
class Password_Protected_Inserter implements Query_Setting_Inserter {

	public function add_query_arg( $previous_query_args, $query_settings ) {
		if ( ! isset( $query_settings[ Password_Protected::get_setting_name() ][ Password_Protected::PASSWORD_PROTECTED__SETTING_NAME ] ) ) {
			return $previous_query_args;
		}

		$setting = $query_settings[ Password_Protected::get_setting_name() ][ Password_Protected::PASSWORD_PROTECTED__SETTING_NAME ];

		if ( 'has_password' === $setting ) {
			$previous_query_args['has_password'] = true;
		}

		if ( 'no_password' === $setting ) {
			$previous_query_args['has_password'] = false;
		}

		return $previous_query_args;
	}

}
