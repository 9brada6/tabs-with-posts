<?php
/**
 * File that contains the class with the same name.
 */

namespace TWRP\Database\Settings;

use TWRP\Icons\Icon_Factory;

/**
 * Class that manages the setting of the date icon.
 */
class Date_Icon extends General_Option_Setting {

	public function get_default_value() {
		return 'twrp-cal-fa-2-f';
	}

	public function get_possible_options() {
		$icons = Icon_Factory::get_date_icons();
		$icons = array_keys( $icons );

		return $icons;
	}

}
