<?php

namespace TWRP\Database\Settings;

use TWRP\Icons\Icon_Factory;

/**
 * Class that manages the setting of the Category Icon.
 */
class Category_Icon extends General_Option_Setting {

	public function get_default_value() {
		return 'twrp-tax-fa-f-f';
	}

	public function get_possible_options() {
		$icons = Icon_Factory::get_category_icons();
		$icons = array_keys( $icons );

		return $icons;
	}

}
