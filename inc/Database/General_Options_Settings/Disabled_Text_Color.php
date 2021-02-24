<?php

namespace TWRP\Database\Settings;

use TWRP\Utils\Color_Utils;

/**
 * Class that manages the setting of the disabled text color.
 */
class Disabled_Text_Color extends General_Option_Setting {

	public function get_default_value() {
		return 'rgba(70, 70, 70, 1)';
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
