<?php
/**
 * File that contains the class with the same name.
 */

namespace TWRP\Admin\Query_Settings_Display;

use TWRP\Query_Setting\Query_Setting;

/**
 * Used to display a control for a query setting.
 */
abstract class Query_Setting_Display {

	/**
	 * Return the query setting class corresponding to this controller.
	 *
	 * @return Query_Setting
	 */
	abstract public function get_setting_class();

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
	public function setting_is_collapsed() {
		return 'auto';
	}

	/**
	 * Get the setting submitted from the form. The setting is sanitized and
	 * ready to use.
	 *
	 * @return array
	 */
	abstract public function get_submitted_sanitized_setting();

	/**
	 * Display the backend HTML for the setting.
	 *
	 * @param mixed $current_setting An array filled with only the settings that
	 * this class work with. The settings are sanitized.
	 *
	 * @return void
	 */
	abstract public function display_setting( $current_setting );

}
