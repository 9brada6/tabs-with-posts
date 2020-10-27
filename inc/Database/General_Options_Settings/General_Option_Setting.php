<?php

namespace TWRP\Database\Settings;

/**
 * Each setting is represented as an array of strings, or as a string. There is
 * not a setting represented as boolean, they are represented as strings 'true'
 * and 'false'.
 */
abstract class General_Option_Setting {

	public function sanitize( $value ) {
		return $this->sanitize_string_choice( $value, $this->get_possible_options(), $this->get_default_value() );
	}

	final public function get_key_name() {
		$fqn_class          = get_class( $this );
		$separator_position = strrpos( $fqn_class, '\\' );
		if ( $separator_position ) {
			return substr( $fqn_class, $separator_position + 1 );
		}

		return strtolower( $fqn_class );
	}

	abstract public function get_default_value();

	abstract public function get_possible_options();

	/**
	 * Sanitize choices the strings.
	 *
	 * @param mixed $value
	 * @param array $options
	 * @param array|string $default
	 * @return array|string
	 */
	protected function sanitize_string_choice( $value, $options, $default ) {
		if ( in_array( $value, $options, true ) ) {
			return $value;
		}

		return $default;
	}
}
