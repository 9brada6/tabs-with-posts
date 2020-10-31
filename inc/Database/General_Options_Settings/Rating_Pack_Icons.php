<?php
/**
 * File that contains the class with the same name.
 *
 * @phpcs:disable Squiz.Commenting.FunctionComment.Missing
 */

namespace TWRP\Database\Settings;

use TWRP\Icons\SVG_Manager;

/**
 * Class that manages the setting of the rating pack icon.
 */
class Rating_Pack_Icons extends General_Option_Setting {

	public function get_default_value() {
		return 'fa-stars';
	}

	public function get_possible_options() {
		$icons = SVG_Manager::get_rating_packs();
		$icons = array_keys( $icons );

		return $icons;
	}

}