<?php
/**
 * File that contains the class with the same name.
 */

namespace TWRP\Database\Settings;

/**
 * Class that manages the setting of the date format.
 */
class Date_Format extends General_Option_Setting {

	public function get_default_value() {
		return '';
	}

	public function sanitize( $value ) {
		if ( is_string( $value ) ) {
			return $value;
		}

		return $this->get_default_value();
	}

	public function get_possible_options() {
		return array();
	}

}
