<?php

namespace TWRP\Database\Settings;

use TWRP\Utils\Color_Utils;

/**
 * Class that manages the setting of the lighter accent color.
 */
class Lighter_Accent_Color extends General_Option_Setting {

	public function get_default_value() {
		return 'rgba(70, 160, 255, 1)';
	}

	public function sanitize( $value ) {
		if ( '' === $value || Color_Utils::is_color( $value ) ) {
			return $value;
		}

		return $this->get_default_value();
	}

	public function get_possible_options() {
		// Have a lot of possibilities.
		return array();
	}
}
