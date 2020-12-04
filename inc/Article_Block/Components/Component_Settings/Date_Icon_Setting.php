<?php
/**
 * File that holds the interface with the same name.
 */

namespace TWRP\Article_Block\Component;

use TWRP\Admin\Widget_Control\Select_Control;
use TWRP\Icons\Icon_Factory;

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
	 * @param string $icon_id
	 * @return string The CSS.
	 */
	public static function get_css( $icon_id ) {
		return '';
	}

	/**
	 * Get the arguments for the control.
	 *
	 * @return array
	 */
	protected static function get_control_setting_args() {
		$icons   = Icon_Factory::get_date_icons();
		$options = array();

		foreach ( $icons as $id => $icon ) {
			$options[ $id ] = $icon->get_option_icon_description();
		}

		return array(
			'default' => 'twrp-fa-calendar-alt-regular',
			'before'  => _x( 'Author Icon:', 'backend', 'twrp' ),
			'after'   => '',
			'options' => $options,
		);
	}

}
