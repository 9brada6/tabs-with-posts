<?php

namespace TWRP;

use TWRP\Article_Block\Article_Block;
use TWRP\Query_Setting\Interface_Backend_Layout;
use TWRP\Query_Setting\Interface_Modify_Query_Arguments;


class Manage_Component_Classes {

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

		if ( $setting_class instanceof Interface_Backend_Layout ) {
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

		if ( $setting_class instanceof Interface_Modify_Query_Arguments ) {
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
		$style_class                                    = new $setting_class_name();
		self::$style_classes [ $style_class->get_id() ] = $style_class;
	}

	public static function get_style_classes() {
		return self::$style_classes;
	}

	/**
	 * Get the style class based on the style id.
	 *
	 * @param string $style_id The style id to get the class.
	 *
	 * @throws \RuntimeException If the $name does not correspond with a style id.
	 *
	 * @return Article_Block The class retrieved by name.
	 */
	public static function get_style_class_by_name( $style_id ) {
		if ( ! isset( self::$style_classes[ $style_id ] ) ) {
			throw new \RuntimeException( $style_id . ' is not a style id.' );
		}

		return self::$style_classes[ $style_id ];
	}

}
