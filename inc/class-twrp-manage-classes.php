<?php

class TWRP_Manage_Classes {

	protected static $query_backend_settings = array();
	protected static $query_args_settings    = array();

	// =========================================================================
	// Query Settings

	public static function register_backend_setting_class( $setting_class_name, $priority = 0 ) {
		if ( ! class_exists( $setting_class_name ) ) {
			//phpcs:ignore
			trigger_error( 'The class: ' . esc_html( $setting_class_name ) . ' does not exist, in TWRP_Settings::add_tab_setting_class.' );
			return;
		}

		$setting_class = new $setting_class_name();

		if ( $setting_class instanceof \TWRP_Backend_Setting ) {
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

		if ( $setting_class instanceof \TWRP_Create_Query_Args ) {
			if ( is_numeric( $priority ) && ! empty( $priority ) && ! array_key_exists( $priority, self::$query_args_settings ) ) {
				self::$query_args_settings[ $priority ] = $setting_class;
			} else {
				self::$query_args_settings [] = $setting_class;
			}
		}

		ksort( self::$query_backend_settings, SORT_NUMERIC );
	}


	public static function get_registered_backend_settings() {
		return self::$query_backend_settings;
	}

	public static function get_registered_query_args_settings() {
		return self::$query_args_settings;
	}

	// =========================================================================
	// Todo:

	protected static $style_classes = array();

	public static function add_style_class( $setting_class_name ) {
		self::$style_classes [] = new $setting_class_name();
	}

	public static function get_style_classes() {
		return self::$style_classes;
	}

}
