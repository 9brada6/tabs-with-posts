<?php

namespace TWRP\Database\Settings;

class Svg_Include_Inline extends General_Option_Setting {

	public function get_default_value() {
		return 'false';
	}

	public function get_possible_options() {
		return array( 'true', 'false' );
	}

}
