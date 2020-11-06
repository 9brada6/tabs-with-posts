<?php
/**
 * File that contains the class with the same name.
 */

namespace TWRP\Database\Settings;

use TWRP\Icons\Icon_Factory;

/**
 * Class that manages the setting of the comments disabled icon.
 */
class Comments_Disabled_Icon extends General_Option_Setting {

	public function get_default_value() {
		return 'twrp-dcom-twrp-c2-f';
	}

	public function get_possible_options() {
		$icons = Icon_Factory::get_comment_disabled_icons();
		$icons = array_keys( $icons );

		return $icons;
	}

}
