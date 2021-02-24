<?php

namespace TWRP\Database\Settings;

use TWRP\Utils\Color_Utils;

/**
 * Class that manages the setting of the border color.
 */
class Border_Color extends General_Option_Setting {

	public function get_default_value() {
		return 'rgba(50, 50, 50, 1)';
	}

	public function sanitize( $value ) {
		if ( Color_Utils::is_color( $value ) ) {
			return $value;
		}

		return $this->get_default_value();
	}

	public function get_possible_options() {
		// Have a lot of possibilities.
		return array();
	}
}
