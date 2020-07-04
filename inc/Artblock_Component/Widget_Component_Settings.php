<?php

namespace TWRP\Artblock_Component;

use TWRP\Utils;
use TWRP\Artblock_Component\Component_Setting;

class Widget_Component_Settings {

	const COMPONENTS_NAMESPACE_PREFIX = 'TWRP\\Artblock_Component\\';

	const FONT_SIZE_SETTING   = 'Font_Size_Setting';
	const LINE_HEIGHT_SETTING = 'Line_Height_Setting';

	const TEXT_SETTINGS = array(
		self::FONT_SIZE_SETTING,
		self::LINE_HEIGHT_SETTING,
	);

	protected $name;

	protected $component_title;

	protected $widget_id;

	protected $query_id;

	protected $settings;

	protected $setting_types;

	/**
	 * Variable that holds the component settings classes needed.
	 *
	 * @var array|null
	 */
	protected $setting_classes = null;

	public function __construct( $widget_id, $query_id, $name, $component_title, $settings, $setting_types ) {
		$this->name            = $name;
		$this->component_title = $component_title;
		$this->widget_id       = $widget_id;
		$this->query_id        = $query_id;
		$this->settings        = $settings;
		$this->setting_types   = $setting_types;
	}

	/**
	 * Get the widget component setting classes used in this component.
	 *
	 * @return array<Component_Setting>
	 */
	protected function get_classes() {
		if ( is_array( $this->setting_classes ) ) {
			return $this->setting_classes;
		}

		$classes_names   = Utils::flatten_array( $this->setting_types );
		$setting_classes = array();

		foreach ( $classes_names as $component_setting_class_name ) {
			$component_setting_class_name = self::COMPONENTS_NAMESPACE_PREFIX . $component_setting_class_name;

			if ( ! class_exists( $component_setting_class_name ) ) {
				continue;
			}

			$component_setting_class = new $component_setting_class_name();

			if ( $component_setting_class instanceof Component_Setting ) {
				array_push( $setting_classes, $component_setting_class );
			}
		}

		$this->setting_classes = $setting_classes;
		return $setting_classes;
	}

	public function get_component_title() {
		return $this->component_title;
	}

	public function display_component_settings() {
		$component_setting_classes = $this->get_classes();

		$prefix_name = $this->get_component_prefix_name();
		$prefix_id   = $this->get_component_prefix_id();

		foreach ( $component_setting_classes as $component_class ) {
			$value = null;
			if ( isset( $this->settings[ $component_class::get_key_name() ] ) ) {
				$value = $this->settings[ $component_class::get_key_name() ];
			}

			$component_class::display_setting( $prefix_id, $prefix_name, $value );
		}
	}

	protected function get_component_prefix_name() {
		return Utils::get_twrp_widget_name( $this->widget_id, $this->query_id, $this->name );
	}

	protected function get_component_prefix_id() {
		return Utils::get_twrp_widget_id( $this->widget_id, $this->query_id, $this->name );
	}

}
