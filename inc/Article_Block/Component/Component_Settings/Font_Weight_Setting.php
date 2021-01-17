<?php
/**
 * File that holds the class with the same name.
 */

namespace TWRP\Article_Block\Component;

use TWRP\Admin\Widget_Control\Select_Control;

/**
 * Class used to change the font weight of the specific component.
 */
class Font_Weight_Setting extends Component_Setting {

	public static function get_key_name() {
		return 'font_weight';
	}

	public static function display_setting( $prefix_id, $prefix_name, $value ) {
		$id   = $prefix_id . '-' . self::get_key_name();
		$name = $prefix_name . '[' . self::get_key_name() . ']';

		Select_Control::display_setting( $id, $name, $value, self::get_control_setting_args() );
	}

	public static function sanitize_setting( $value ) {
		return Select_Control::sanitize_setting( $value, self::get_control_setting_args() );
	}

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

	public static function get_css( $font_weight ) {
		$control_settings = self::get_control_setting_args();
		if ( isset( $control_settings['options'] ) && is_array( $control_settings['options'] ) ) {
			$possible_values = $control_settings['options'];
		} else {
			$possible_values = array();
		}

		if ( empty( $font_weight ) ) {
			return '';
		}

		if ( ! in_array( $font_weight, $possible_values, true ) ) {
			return '';
		}

		return "font-weight:${font_weight};";
	}
}
