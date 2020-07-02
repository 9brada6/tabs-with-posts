<?php
/**
 * File that holds the class with the same name.
 */

namespace TWRP;

use TWRP\Query_Setting\Query_Setting;

class Query_Settings_Manager {

	protected static $query_backend_settings = array();

	protected static $query_args_settings = array();

	public static function register_backend_setting_class( $setting_class_name, $priority = 0 ) {
		if ( ! class_exists( $setting_class_name ) ) {
			//phpcs:ignore
			trigger_error( 'The class: ' . esc_html( $setting_class_name ) . ' does not exist, in TWRP_Settings::add_tab_setting_class.' );
			return;
		}

		$setting_class = new $setting_class_name();

		if ( $setting_class instanceof Query_Setting ) {
			if ( is_numeric( $priority ) && ! empty( $priority ) && ! array_key_exists( $priority, self::$query_backend_settings ) ) {
				self::$query_backend_settings[ $priority ] = $setting_class;
			} else {
				self::$query_backend_settings [] = $setting_class;
			}
		}

		ksort( self::$query_backend_settings, SORT_NUMERIC );
	}

	public static function register_query_arg_setting( $setting_class_name, $priority = 0 ) {
		if ( ! class_exists( $setting_class_name ) ) {
			//phpcs:ignore
			trigger_error( 'The class: ' . esc_html( $setting_class_name ) . ' does not exist, in TWRP_Settings::add_tab_setting_class.' );
			return;
		}

		$setting_class = new $setting_class_name();

		if ( $setting_class instanceof Query_Setting ) {
			if ( is_numeric( $priority ) && ! empty( $priority ) && ! array_key_exists( $priority, self::$query_args_settings ) ) {
				self::$query_args_settings[ $priority ] = $setting_class;
			} else {
				self::$query_args_settings [] = $setting_class;
			}
		}

		ksort( self::$query_backend_settings, SORT_NUMERIC );
	}


	/**
	 * @return Query_Setting[]
	 */
	public static function get_registered_backend_settings() {
		return self::$query_backend_settings;
	}

	public static function get_registered_query_args_settings() {
		return self::$query_args_settings;
	}
}
