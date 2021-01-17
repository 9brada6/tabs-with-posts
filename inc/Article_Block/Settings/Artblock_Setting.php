<?php
/**
 * File that contains the abstract class with the same name.
 */

namespace TWRP\Article_Block\Settings;

abstract class Artblock_Setting {

	/**
	 * The widget Id of this setting.
	 *
	 * @var int
	 */
	protected $widget_id;

	/**
	 * The query Id of this setting.
	 *
	 * @var int
	 */
	protected $query_id;

	/**
	 * The current setting.
	 *
	 * @var array|string
	 */
	protected $current_setting;

	final public function __construct( $widget_id, $query_id, $settings ) {
		$this->widget_id = $widget_id;
		$this->query_id  = $query_id;

		if ( isset( $settings[ $this->get_setting_name() ] ) ) {
			$this->current_setting = $settings[ $this->get_setting_name() ];
		} else {
			$this->current_setting = $this->get_default_value();
		}
	}

	/**
	 * Display the widget control for the setting.
	 *
	 * @return void
	 */
	abstract public function display_setting();

	/**
	 * Get the sanitized setting.
	 *
	 * @return string|array
	 */
	abstract public function sanitize_setting();

	/**
	 * Get the setting name. An unique name among the other settings. Used to
	 * generate the name attr in HTML setting control.
	 *
	 * @return string
	 */
	abstract public function get_setting_name();

	/**
	 * Get the default value of the setting.
	 *
	 * @return string|array
	 */
	abstract public function get_default_value();

}
