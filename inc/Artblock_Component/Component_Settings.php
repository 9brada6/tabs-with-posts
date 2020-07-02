<?php

namespace TWRP;

use TWRP\Utils;

class Widget_Component_Settings {

	const FONT_SIZE_SETTING   = 'Font_Size_Setting';
	const LINE_HEIGHT_SETTING = 'Line_Height_Setting';

	const TEXT_SETTINGS = array(
		self::FONT_SIZE_SETTING,
		self::LINE_HEIGHT_SETTING,
	);

	protected $settings_creator;

	protected $setting_types;

	/**
	 * Variable that holds the component settings classes needed.
	 *
	 * @var array|null
	 */
	protected $setting_classes = null;

	public function __construct( $settings_creator, $setting_types ) {
		$this->settings_creator = $settings_creator;
		$this->setting_types    = $setting_types;
	}

	public function display_component_settings() {

	}

	protected function get_classes() {
		$classes_names = Utils::flatten_array( $this->setting_types );

	}

}
