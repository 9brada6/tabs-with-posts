<?php
/**
 * File that contains the class with the same name.
 */

namespace TWRP\Admin\Query_Setting_Display;

abstract class Query_Setting_Display {

	const CLASS_ORDER = 0;

	/**
	 * The title of the setting accordion.
	 *
	 * @return string
	 */
	abstract public function get_title();

	/**
	 * Whether or not when displaying the setting in the backend only the title
	 * is shown and the setting HTML is hidden(return false), or both are
	 * shown(return true).
	 *
	 * @return bool|'auto'
	 */
	abstract public function setting_is_collapsed();

	/**
	 * Display the backend HTML for the setting.
	 *
	 * @param mixed $current_setting An array filled with only the settings that
	 * this class work with. The settings are sanitized.
	 *
	 * @return void
	 */
	abstract public function display_setting( $current_setting );

	/**
	 * Get the setting submitted from the form. The setting is sanitized and
	 * ready to use.
	 *
	 * @return array
	 */
	abstract public function get_submitted_sanitized_setting();

}
