<?php

namespace TWRP;

use TWRP\TWRP_Widget\Widget;

class Utils {

	/**
	 * Check a variable if can be a post id and return it on success, or false
	 * otherwise.
	 *
	 * @param mixed $post_id
	 * @return int|false False if not valid.
	 */
	public static function get_valid_post_id( $post_id ) {
		if ( ! is_numeric( $post_id ) ) {
			return false;
		}

		$post_id = (int) $post_id;

		if ( ! ( $post_id > 0 ) ) {
			return false;
		}

		return $post_id;
	}

	/**
	 * Flatten multi-dimensional array.
	 *
	 * @param array $array
	 * @return array
	 */
	public static function flatten_array( array $array ) {
		$ret_array = array();
		foreach ( new \RecursiveIteratorIterator( new \RecursiveArrayIterator( $array ) ) as $value ) {
			$ret_array[] = $value;
		}
		return $ret_array;
	}

	/**
	 * Get the name of a control for the Tabs with Recommended Posts Widget.
	 *
	 * @param int|string $widget_id
	 * @param int|string ...$other_name_keys
	 * @return string
	 *
	 * @psalm-param numeric $widget_id
	 * @psalm-param array-key ...$other_name_keys
	 */
	public static function get_twrp_widget_name( $widget_id, ...$other_name_keys ) {
		$suffix = '[' . $widget_id . ']';
		foreach ( $other_name_keys as $name_key ) {
			$name_key = sanitize_key( $name_key );
			if ( ! $name_key ) {
				continue;
			}

			$suffix .= '[' . $name_key . ']';
		}

		$twrp_widget_base_id = Widget::TWRP_BASE_ID;

		$name = 'widget-' . $twrp_widget_base_id . $suffix;
		return $name;
	}

	/**
	 * Get the name of a control for the Tabs with Recommended Posts Widget.
	 *
	 * @param int|string $widget_id
	 * @param int|string ...$other_name_keys
	 * @return string
	 *
	 * @psalm-param numeric $widget_id
	 */
	public static function get_twrp_widget_id( $widget_id, ...$other_name_keys ) {
		$suffix = '-' . $widget_id;
		foreach ( $other_name_keys as $name_key ) {
			$suffix .= '-' . $name_key;
		}

		$twrp_widget_base_id = Widget::TWRP_BASE_ID;

		$name = 'widget-' . $twrp_widget_base_id . $suffix;
		return $name;
	}
}
