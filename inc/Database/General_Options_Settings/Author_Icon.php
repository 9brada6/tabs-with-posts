<?php
/**
 * File that contains the class with the same name.
 *
 * @phpcs:disable Squiz.Commenting.FunctionComment.Missing
 */

namespace TWRP\Database\Settings;

use TWRP\Icons\SVG_Manager;

/**
 * Class that manages the setting of the Author Icon.
 */
class Author_Icon extends General_Option_Setting {

	public function get_default_value() {
		return 'twrp-user-goo-ol';
	}

	public function get_possible_options() {
		$icons = SVG_Manager::get_user_icons();
		$icons = array_keys( $icons );

		return $icons;
	}

}
