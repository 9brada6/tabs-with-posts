<?php
/**
 * File containing a trait, used with the custom article blocks.
 *
 * @package Tabs_With_Recommended_Posts
 */

namespace TWRP\Article_Block;

/**
 * This trait contains functions that sanitizes the settings set via the HTML
 * inputs in the backend.
 *
 * Usually should be needed in each article block.
 */
trait Article_Block_Sanitize_Setting {

	/**
	 * Sanitize a setting coming from a checkbox.
	 *
	 * @param array  $settings     The array of all style settings.
	 * @param string $setting_name The key in the array of settings to verify.
	 * @param '1'|'' $default      The default value in case that our setting is not set.
	 *
	 * @return string Either '1' or ''.
	 */
	protected static function sanitize_checkbox( $settings, $setting_name, $default ) {
		if ( isset( $settings[ $setting_name ] ) ) {
			if ( $settings[ $setting_name ] ) {
				return '1';
			} else {
				return '';
			}
		}

		return $default;
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
