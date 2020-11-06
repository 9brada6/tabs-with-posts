<?php
/**
 * Contains the class that will filter articles via the post password.
 */

namespace TWRP\Query_Generator\Query_Setting;

/**
 * Creates the possibility to filter a query based on the post passwords,
 * if they are set.
 */
class Password_Protected extends Query_Setting {

	const CLASS_ORDER = 80;

	/**
	 * The name of the setting and array key which represents whether or not the
	 * posts to be filtered by passwords or not.
	 */
	const PASSWORD_PROTECTED__SETTING_NAME = 'password_protected';

	public static function init() {
		// Do nothing.
	}

	public static function get_setting_name() {
		return 'password_protected';
	}

	public static function get_default_setting() {
		return array(
			self::PASSWORD_PROTECTED__SETTING_NAME => 'not_applied',
		);
	}

	public static function sanitize_setting( $setting ) {
		$sanitized_settings = array();
		$options            = array( 'has_password', 'no_password' );
		$need_password      = self::PASSWORD_PROTECTED__SETTING_NAME;

		if ( ! isset( $setting[ $need_password ] ) || ! in_array( $setting[ $need_password ], $options, true ) ) {
			return self::get_default_setting();
		}

		$sanitized_settings[ $need_password ] = $setting[ $need_password ];

		return $sanitized_settings;
	}

	public static function add_query_arg( $previous_query_args, $query_settings ) {
		if ( ! isset( $query_settings[ self::get_setting_name() ][ self::PASSWORD_PROTECTED__SETTING_NAME ] ) ) {
			return $previous_query_args;
		}

		$setting = $query_settings[ self::get_setting_name() ][ self::PASSWORD_PROTECTED__SETTING_NAME ];

		if ( 'has_password' === $setting ) {
			$previous_query_args['has_password'] = true;
		}

		if ( 'no_password' === $setting ) {
			$previous_query_args['has_password'] = false;
		}

		return $previous_query_args;
	}
}