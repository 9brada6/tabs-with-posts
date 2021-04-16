<?php

namespace TWRP\Database\Settings;

/**
 * Class that manages whether or not the widget is loaded via ajax.
 */
class Load_Widget_Via_Ajax extends General_Option_Setting {

	public function get_default_value() {
		return 'false';
	}

	public function get_possible_options() {
		return array( 'true', 'false' );
	}

}
