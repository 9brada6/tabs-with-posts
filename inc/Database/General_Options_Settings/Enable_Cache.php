<?php

namespace TWRP\Database\Settings;

/**
 * Class that manages the setting that will enable or disable the widget cache.
 */
class Enable_Cache extends General_Option_Setting {

	public function get_default_value() {
		return 'true';
	}

	public function get_possible_options() {
		return array( 'true', 'false' );
	}

}
