<?php
/**
 * File that holds the class with the same name.
 */

namespace TWRP\Artblock_Component;

use TWRP\Admin\Widget_Control\Select_Control;

/**
 * Font weight component setting.
 */
class Font_Weight_Setting implements Component_Setting {

	/**
	 * The name of the setting. Will be used as an array key for storage.
	 *
	 * @return string
	 */
	public static function get_key_name() {
		return 'font_weight';
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

		Select_Control::display_setting( $id, $name, $value, self::get_control_setting_args() );
	}

	/**
	 * Sanitize the setting.
	 *
	 * @param mixed $value
	 * @return string
	 */
	public static function sanitize_setting( $value ) {
		return Select_Control::sanitize_setting( $value, self::get_control_setting_args() );
	}

	/**
	 * Get the arguments for the control.
	 *
	 * @return array
	 */
	protected static function get_control_setting_args() {
		return array(
			'default' => '',
			'before'  => _x( 'Font weight:', 'backend; CSS unit', 'twrp' ),
			'after'   => '',
			'options' => array(
				''        => 'Not set',
				'inherit' => 'inherit',
				'100'     => '100',
				'200'     => '200',
				'300'     => '300',
				'400'     => '400',
				'500'     => '500',
				'600'     => '600',
				'700'     => '700',
				'800'     => '800',
				'900'     => '900',
			),
		);
	}

	/**
	 * Create the CSS for a given value.
	 *
	 * @param string|int|float $font_weight
	 * @return string The CSS.
	 */
	public static function get_css( $font_weight ) {
		$possible_values = self::get_control_setting_args();

		if ( empty( $font_weight ) ) {
			return '';
		}

		if ( ! in_array( $font_weight, $possible_values, true ) ) {
			return '';
		}

		return "font-weight:${font_weight} !important;";
	}
}
