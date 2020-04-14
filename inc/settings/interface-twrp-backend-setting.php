<?php
/**
 * Contains the interface needed for all the query settings to exist.
 *
 * @package Tabs_With_Recommended_Posts
 */

/**
 * Implements the functions needed to be calling in displaying the settings in
 * the backend, and to create a query setting in general. As the name says, this
 * interface is needed in the backend area of the WordPress website.
 *
 * Each one of this setting will be displayed with a title taken from
 * get_title() function, and display below the HTML in display_setting() function.
 */
interface TWRP_Backend_Setting {

	/**
	 * Display the backend HTML for the setting.
	 *
	 * @param mixed $current_setting The current setting of a query if is being
	 * edited, or else an empty string or null will be given.
	 *
	 * @return void
	 */
	public function display_setting( $current_setting );

	/**
	 * The title of the setting.
	 *
	 * @return string
	 */
	public function get_title();

	/**
	 * The name of the input and of the array key that stores the option of the query.
	 *
	 * @return string
	 */
	public static function get_setting_name();

	/**
	 * Sanitize a variable, to be safe for processing.
	 *
	 * @param mixed $setting The string to be sanitized.
	 */
	public static function sanitize_setting( $setting );

	/**
	 * Get the setting submitted from the form. The setting is sanitized and
	 * ready to use.
	 */
	public function get_submitted_sanitized_setting();

	/**
	 * The name of the input, and also of the array key that stores the option of the query.
	 */
	public static function get_default_setting();

	/**
	 * Whether or not when displaying the setting in the backend only the title
	 * is shown and the setting HTML is hidden(return false), or both are
	 * shown(return true).
	 *
	 * @return bool
	 */
	public static function setting_is_collapsed();
}
