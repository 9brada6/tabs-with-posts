<?php
/**
 * File that holds the class with the same name.
 */

namespace TWRP\Article_Block\Component;

use TWRP\Admin\Widget_Control\Color_Control;

/**
 * Class used to change the font color of the specific component.
 */
class Color_Setting extends Component_Setting {

	public static function get_key_name() {
		return 'color';
	}

	public static function display_setting( $prefix_id, $prefix_name, $value ) {
		$id   = $prefix_id . '-' . self::get_key_name();
		$name = $prefix_name . '[' . self::get_key_name() . ']';

		Color_Control::display_setting( $id, $name, $value, self::get_control_setting_args() );
	}

	public static function sanitize_setting( $value ) {
		return Color_Control::sanitize_setting( $value, self::get_control_setting_args() );
	}

	protected static function get_control_setting_args() {
		return array(
			'default' => '',
			'before'  => _x( 'Font color:', 'backend; CSS unit', 'twrp' ),
		);
	}

	public static function get_css( $value ) {
		if ( ! empty( $value ) ) {
			return "color:${value};";
		}

		return '';
	}
}
