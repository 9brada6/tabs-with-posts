<?php
/**
 * File that holds the class with the same name.
 */

namespace TWRP\Article_Block\Component;

use TWRP\Admin\Widget_Control\Number_Control;

class Line_Height_Setting implements Component_Setting {

	/**
	 * The name of the setting. Will be used as an array key for storage.
	 *
	 * @return string
	 */
	public static function get_key_name() {
		return 'line_height';
	}

	/**
	 * Display the component setting.
	 *
	 * @param string $prefix_id To this id will be appended the key name.
	 * @param string $prefix_name To this id will be added the key name.
	 * @param mixed $value The current value of the setting.
	 * @return void
	 */
	public static function display_setting( $prefix_id, $prefix_name, $value ) {
		$id   = $prefix_id . '-' . self::get_key_name();
		$name = $prefix_name . '[' . self::get_key_name() . ']';

		Number_Control::display_setting( $id, $name, $value, self::get_control_setting_args() );
	}

	/**
	 * Sanitize the setting.
	 *
	 * @param mixed $value
	 * @return int|float|''
	 */
	public static function sanitize_setting( $value ) {
		return Number_Control::sanitize_setting( $value, self::get_control_setting_args() );
	}

	/**
	 * Get the arguments for the control.
	 *
	 * @return array
	 */
	protected static function get_control_setting_args() {
		return array(
			'default' => '',
			'before'  => _x( 'Line Height:', 'backend; CSS unit', 'twrp' ),
			'after'   => '',
			'max'     => '3',
			'min'     => '0.7',
			'step'    => '0.05',
		);
	}

	/**
	 * Create the CSS for a given value.
	 *
	 * @param string|int|float $value
	 * @return string The CSS.
	 */
	public static function get_css( $value ) {
		if ( is_numeric( $value ) ) {
			return "line-height:${value};";
		}

		return '';
	}
}
