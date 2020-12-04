<?php
/**
 * File that holds the interface with the same name.
 */

namespace TWRP\Artblock_Component;

/**
 * Each component setting should implement this interface.
 */
interface Component_Setting {

	/**
	 * The name of the setting. Will be used as an array key for storage.
	 *
	 * @return string
	 */
	public static function get_key_name();

	/**
	 * Display the component setting.
	 *
	 * @param string $prefix_id The prefix id of the control. Will be merged with
	 *                          the class key name.
	 * @param string $prefix_name The prefix name of the control. Will be merged with
	 *                            the class key name.
	 * @param mixed $value The value of the control.
	 * @return void
	 */
	public static function display_setting( $prefix_id, $prefix_name, $value );

	/**
	 * Sanitize the setting.
	 *
	 * @param mixed $value
	 * @return mixed
	 */
	public static function sanitize_setting( $value );

	/**
	 * Create the CSS for a given value.
	 *
	 * @param string|int|float $value
	 * @return string The CSS.
	 */
	public static function get_css( $value );

}
