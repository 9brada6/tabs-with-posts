<?php
/**
 * File that contains the class with the same name.
 */

namespace TWRP\Utils;

/**
 * Class that is a collection of static methods, that can be used everywhere
 * when a work with color needs to be done.
 */
class Color_Utils {

	/**
	 * Verify if the value is a hex/rgba/rgb color.
	 *
	 * @param string $value
	 * @return bool
	 */
	public static function is_color( $value ) {
		return '' === $value || static::is_rgba_color( $value );
	}

	/**
	 * Verify if the value is a hex color.
	 *
	 * @param string $value
	 * @return bool
	 */
	public static function is_hex_color( $value ) {
		return (bool) preg_match( '/^#([0-9a-f]{3}){1,2}$/i', $value );
	}

	/**
	 * Verify if the value is a rgb color.
	 *
	 * @param string $value
	 * @return bool
	 */
	public static function is_rgb_color( $value ) {
		return (bool) preg_match( '/rgb\((?:\s*\d+\s*,){2}\s*[\d]+\)/i', $value );
	}

	/**
	 * Verify if the value is a rgba color.
	 *
	 * @param string $value
	 * @return bool
	 */
	public static function is_rgba_color( $value ) {
		return (bool) preg_match( '/rgba\((\s*\d+\s*,){3}\s*(0|1)(\.?\d+)?\)/i', $value );
	}

	/**
	 * Increase or decrease the brightness of a color.
	 *
	 * @param string $rgba Color in rgba format to lighten/darken.
	 * @param int $steps To darken use positive integers, to lighten use negative.
	 * @return string|null
	 */
	public static function adjust_brightness( $rgba, $steps ) {
		// Steps should be between -255 and 255. Negative = darker, positive = lighter.
		$steps = max( -255, min( 255, $steps ) );

		$color_values = array();
		preg_match_all( '/(\d+\.*\d*)/', $rgba, $color_values );

		if ( ! isset( $color_values[1] ) ) {
			return;
		}
		$color_values = $color_values[1];

		if ( count( $color_values ) < 4 ) {
			return null;
		}

		for ( $i = 0; $i < 3; $i++ ) {
			$color_values[ $i ] = intval( $color_values[ $i ] );
			$color_values[ $i ] = max( 0, min( 255, $color_values[ $i ] + $steps ) );
		}

		return 'rgba(' . $color_values[0] . ', ' . $color_values[1] . ', ' . $color_values[2] . ', ' . $color_values[3] . ')';
	}
}
