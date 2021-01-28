<?php

namespace TWRP\Database\Settings;

/**
 * Class that manages the setting of auto selecting the comments disabled icon.
 */
class Comments_Disabled_Icon_Auto_Select extends General_Option_Setting {

	public function get_default_value() {
		return 'true';
	}

	public function get_possible_options() {
		return array( 'true', 'false' );
	}

}
