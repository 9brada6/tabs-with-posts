<?php
/**
 * File that holds the class with the same name.
 */

namespace TWRP\Article_Block\Component;

use TWRP\Admin\Widget_Control\Number_Control;

/**
 * Class used to change the line height of the specific component.
 */
class Line_Height_Setting extends Component_Setting {

	public static function get_key_name() {
		return 'line_height';
	}

	public static function display_setting( $prefix_id, $prefix_name, $value ) {
		$id   = $prefix_id . '-' . self::get_key_name();
		$name = $prefix_name . '[' . self::get_key_name() . ']';

		Number_Control::display_setting( $id, $name, $value, self::get_control_setting_args() );
	}

	public static function sanitize_setting( $value ) {
		return Number_Control::sanitize_setting( $value, self::get_control_setting_args() );
	}

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

	public static function get_css( $value ) {
		if ( is_numeric( $value ) ) {
			return "line-height:${value};";
		}

		return '';
	}
}
