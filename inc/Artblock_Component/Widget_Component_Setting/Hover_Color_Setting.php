<?php
/**
 * File that holds the class with the same name.
 */

namespace TWRP\Artblock_Component;

use TWRP\Widget_Control\Color_Control;

/**
 * Font size component setting.
 */
class Hover_Color_Setting implements Component_Setting {

	/**
	 * The name of the setting. Will be used as an array key for storage.
	 *
	 * @return string
	 */
	public static function get_key_name() {
		return 'hover_color';
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

		Color_Control::display_setting( $id, $name, $value, self::get_control_setting_args() );
	}

	/**
	 * Sanitize the setting.
	 *
	 * @param mixed $value
	 * @return int|float|''
	 */
	public static function sanitize_setting( $value ) {
		return Color_Control::sanitize_setting( $value, self::get_control_setting_args() );
	}

	/**
	 * Get the arguments for the control.
	 *
	 * @return array
	 */
	protected static function get_control_setting_args() {
		return array(
			'default' => '',
			'before'  => _x( 'Font size:', 'backend; CSS unit', 'twrp' ),
			'after'   => _x( 'rem.', 'backend; CSS unit', 'twrp' ),
			'max'     => '3',
			'min'     => '0.7',
			'step'    => '0.025',
		);
	}

	/**
	 * Create the CSS for a given value.
	 *
	 * @param string|int|float $value
	 * @return string The CSS.
	 */
	public static function get_css( $value ) {
		return "color:${value} !important;fill: ${value} !important";
		// todo
		// return '';
	}
}
