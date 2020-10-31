<?php
/**
 * File that contains the class with the same name.
 *
 * @phpcs:disable Squiz.Commenting.FunctionComment.Missing
 */

namespace TWRP\Database\Settings;

use TWRP\Icons\SVG_Manager;

/**
 * Class that manages the setting of the comments icon.
 */
class Comments_Icon extends General_Option_Setting {

	public function get_default_value() {
		return 'twrp-com-goo-ol';
	}

	public function get_possible_options() {
		$icons = SVG_Manager::get_comment_icons();
		$icons = array_keys( $icons );

		return $icons;
	}

}