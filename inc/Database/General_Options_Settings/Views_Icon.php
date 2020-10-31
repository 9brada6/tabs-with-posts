<?php
/**
 * File that contains the class with the same name.
 *
 * @phpcs:disable Squiz.Commenting.FunctionComment.Missing
 */

namespace TWRP\Database\Settings;

use TWRP\Icons\Icon_Factory;

/**
 * Class that manages the setting of the views icon.
 */
class Views_Icon extends General_Option_Setting {

	public function get_default_value() {
		return 'twrp-views-fa-f';
	}

	public function get_possible_options() {
		$icons = Icon_Factory::get_views_icons();
		$icons = array_keys( $icons );

		return $icons;
	}

}
