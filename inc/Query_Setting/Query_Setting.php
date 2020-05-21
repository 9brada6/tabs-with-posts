<?php
/**
 * Contains the interface needed for all the query settings to exist.
 */

namespace TWRP\Query_Setting;

/**
 * Implements the functions needed to be calling in displaying the settings in
 * the backend, and to create a query setting in general. As the name says, this
 * interface is needed in the backend area of the WordPress website.
 *
 * Each one of this setting will be displayed with a title taken from
 * get_title() function, and display below the HTML in display_setting() function.
 */
interface Query_Setting {

	/**
	 * The name of the HTML form input and of the array key that stores the option of the query.
	 *
	 * @return string
	 */
	public static function get_setting_name();

	/**
	 * The title of the setting accordion.
	 *
	 * @return string
	 */
	public function get_title();

	/**
	 * Whether or not when displaying the setting in the backend only the title
	 * is shown and the setting HTML is hidden(return false), or both are
	 * shown(return true).
	 *
	 * @return bool
	 */
	public static function setting_is_collapsed();

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
	 * The default setting to be retrieved, if user didn't set anything.
	 *
	 * @return mixed
	 */
	public static function get_default_setting();

	/**
	 * Get the setting submitted from the form. The setting is sanitized and
	 * ready to use.
	 *
	 * @return mixed
	 */
	public function get_submitted_sanitized_setting();

	/**
	 * Sanitize a variable, to be safe for processing.
	 *
	 * @param mixed $setting The string to be sanitized.
	 *
	 * @return mixed The sanitized variable
	 */
	public static function sanitize_setting( $setting );

	/**
	 * Create and insert the new arguments for the WP_Query.
	 *
	 * The previous query arguments will be modified such that will also contain
	 * the new settings, and will return the new query arguments to be passed
	 * into WP_Query class.
	 *
	 * @throws \RuntimeException If a setting cannot implement something.
	 *
	 * @param array $previous_query_args The query arguments before being modified.
	 * @param mixed $query_settings All query settings, these settings are sanitized.
	 * @return array The new arguments modified.
	 */
	public static function add_query_arg( $previous_query_args, $query_settings );
}
