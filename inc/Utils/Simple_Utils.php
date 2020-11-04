<?php

namespace TWRP\Utils;

/**
 * Class that contain a list of static methods, that can be used everywhere.
 * The methods here are simple methods that cannot be categorized in one of the
 * other *_Utils classes.
 */
class Simple_Utils {

	/**
	 * Verify that a value is a number bigger than 0.
	 *
	 * This will work everywhere where WP use an id, like posts, users,
	 * categories, ...etc.
	 *
	 * @param mixed $post_id
	 * @return int|false False if not valid.
	 */
	public static function get_valid_wp_id( $post_id ) {
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
	 * Verify that each value in an array is a number bigger than 0.
	 *
	 * This will work everywhere where WP use an id, like posts, users,
	 * categories, ...etc.
	 *
	 * @param array $post_ids
	 * @return array<int>
	 */
	public static function get_valid_wp_ids( $post_ids ) {
		foreach ( $post_ids as $key => $post_id ) {
			$sanitized_id = self::get_valid_wp_id( $post_id );

			if ( $sanitized_id ) {
				$post_ids[ $key ] = $sanitized_id;
			} else {
				unset( $post_ids[ $key ] );
			}
		}

		return $post_ids;
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
}
