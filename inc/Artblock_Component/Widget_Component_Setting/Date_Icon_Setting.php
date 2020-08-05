<?php
/**
 * File that holds the interface with the same name.
 */

namespace TWRP\Artblock_Component;

use TWRP\Widget_Control\Select_Control;
use TWRP\SVG_Manager;

/**
 * Setting that let administrator select what category icon they want.
 */
class Date_Icon_Setting implements Component_Setting {

	/**
	 * The name of the setting. Will be used as an array key for storage.
	 *
	 * @return string
	 */
	public static function get_key_name() {
		return 'date_icon';
	}

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
	public static function display_setting( $prefix_id, $prefix_name, $value ) {
		$id   = $prefix_id . '-' . self::get_key_name();
		$name = $prefix_name . '[' . self::get_key_name() . ']';

		Select_Control::display_setting( $id, $name, $value, self::get_control_setting_args() );
	}

	/**
	 * Sanitize the setting.
	 *
	 * @param mixed $value
	 * @return mixed
	 */
	public static function sanitize_setting( $value ) {
		// todo.
		return $value;
	}

	/**
	 * Create the CSS for a given value.
	 *
	 * @param string $svg_name
	 * @return string The CSS.
	 */
	public static function get_css( $svg_name ) {
		if ( $svg_name ) {
			return '}</style>' . SVG_Manager::get_svg_def( $svg_name ) . '<style>.twrp-no{';
		}

		return '';
	}

	/**
	 * Get the arguments for the control.
	 *
	 * @return array
	 */
	protected static function get_control_setting_args() {
		$options = SVG_Manager::get_all_date_vectors();

		foreach ( $options as $id => $option ) {
			$options[ $id ] = $option['description'];
		}

		return array(
			'default' => 'twrp-fa-calendar-alt-regular',
			'before'  => _x( 'Author Icon:', 'backend', 'twrp' ),
			'after'   => '',
			'options' => $options,
		);
	}

}
