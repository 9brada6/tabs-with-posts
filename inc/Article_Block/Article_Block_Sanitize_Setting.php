<?php

namespace TWRP\Article_Block;

trait Article_Block_Sanitize_Setting {

	protected static function sanitize_checkbox( $settings, $setting_name ) {
		if ( isset( $settings[ $setting_name ] ) ) {
			if ( $settings[ $setting_name ] ) {
				return '1';
			} else {
				return '';
			}
		}

		return '';
	}

	/**
	 * Sanitize a number, usually passed from a number type input.
	 *
	 * @param array                      $settings The array containing all the settings.
	 * @param string                     $setting_name The array key containing our setting to be sanitized.
	 * @param array{min:float,max:float} $args The arguments for sanitization.
	 * @param string|float               $default The default value in case that the setting is not valid.
	 *
	 * @return string|float
	 */
	protected static function sanitize_number( $settings, $setting_name, $args, $default ) {
		if ( ( ! isset( $settings[ $setting_name ] ) ) || ( ! is_numeric( $settings[ $setting_name ] ) ) ) {
			return $default;
		}

		$value = $settings[ $setting_name ];

		if ( isset( $args['min'] ) && $args['min'] > $value ) {
			return $default;
		}

		if ( isset( $args['max'] ) && $args['max'] < $value ) {
			return $default;
		}

		return $settings[ $setting_name ];
	}
}
