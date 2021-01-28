<?php

namespace TWRP\Article_Block\Component;

use TWRP\Admin\Widget_Control\Number_Control;

/**
 * Class used to change the font size of the specific component.
 */
class Font_Size_Setting extends Component_Setting {

	public static function get_key_name() {
		return 'font_size';
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
			'before'  => _x( 'Font size:', 'backend; CSS unit', 'twrp' ),
			'after'   => _x( 'rem.', 'backend; CSS unit', 'twrp' ),
			'max'     => '3',
			'min'     => '0.7',
			'step'    => '0.025',
		);
	}

	public static function get_css( $value ) {
		if ( is_numeric( $value ) ) {
			return "font-size:${value}rem;";
		}

		return '';
	}
}
