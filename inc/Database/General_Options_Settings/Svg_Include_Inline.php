<?php
/**
 * File that contains the class with the same name.
 */

namespace TWRP\Database\Settings;

/**
 * Class that manages the setting of the inclusion of all svgs inline.
 */
class Svg_Include_Inline extends General_Option_Setting {

	public function get_default_value() {
		return 'false';
	}

	public function get_possible_options() {
		return array( 'true', 'false' );
	}

}
