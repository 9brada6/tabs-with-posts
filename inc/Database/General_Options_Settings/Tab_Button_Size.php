<?php

namespace TWRP\Database\Settings;

/**
 * Class that manages the setting of the tab button size.
 */
class Tab_Button_Size extends General_Option_Setting {

	public function get_default_value() {
		return '1';
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
