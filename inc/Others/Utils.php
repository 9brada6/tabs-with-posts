<?php

namespace TWRP;

class Utils {
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
}
