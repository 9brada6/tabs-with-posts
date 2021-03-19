<?php

namespace TWRP\Database\Settings;

/**
 * Class that manages the setting of filling additional grid spaces with posts.
 */
class Fill_Grid_With_Posts extends General_Option_Setting {

	public function get_default_value() {
		return 'true';
	}

	public function get_possible_options() {
		return array( 'true', 'false' );
	}

}
