<?php

namespace TWRP\Database\Settings;

use TWRP\Icons\Icon_Factory;

/**
 * Class that manages the setting of the Author Icon.
 */
class Author_Icon extends General_Option_Setting {

	public function get_default_value() {
		return 'twrp-user-fa-f';
	}

	public function get_possible_options() {
		$icons = Icon_Factory::get_user_icons();
		$icons = array_keys( $icons );

		return $icons;
	}

}
