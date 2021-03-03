<?php

namespace TWRP\Database\Settings;

/**
 * Class that manages the setting of the Border Radius.
 */
class Border_Radius extends General_Option_Setting {

	public function get_default_value() {
		return '4';
	}

	public function sanitize( $value ) {
		if ( is_numeric( $value ) ) {
			return (string) $value;
		}

		return $this->get_default_value();
	}

	public function get_possible_options() {
		return array();
	}

}
