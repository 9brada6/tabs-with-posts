<?php

namespace TWRP\Article_Block\Settings;

use TWRP\Admin\Widget_Control\Checkbox_Control;
use TWRP\Plugins\Post_Rating;
use TWRP\Utils\Widget_Utils;

/**
 * Class used to create a setting that will manage to display the rating count
 * on an Article Block.
 */
class Display_Rating_Count_Setting extends Artblock_Setting {

	/**
	 * Redefine the current setting as a string variable for static analyzers.
	 *
	 * @var string
	 */
	protected $current_setting;

	public function display_setting() {
		$id   = Widget_Utils::get_field_id( $this->widget_id, $this->query_id, $this->get_setting_name() );
		$name = Widget_Utils::get_field_name( $this->widget_id, $this->query_id, $this->get_setting_name() );

		Checkbox_Control::display_setting( $id, $name, $this->current_setting, $this->get_rating_setting_args() );
	}

	public function sanitize_setting() {
		return Checkbox_Control::sanitize_setting( $this->current_setting, $this->get_rating_setting_args() );
	}

	public function get_setting_name() {
		return 'display_rating_count';
	}

	/**
	 * Get the arguments for the Widget Setting Control.
	 *
	 * @return array
	 */
	public function get_rating_setting_args() {
		$plugin_installed = ( Post_Rating::get_plugin_to_use() === false ? false : true );

		$disabled = true;
		if ( $plugin_installed ) {
			$disabled = false;
		}

		$not_installed_message = '';
		if ( ! $plugin_installed ) {
			$not_installed_message = _x( 'Not Installed', 'backend', 'twrp' );
		}

		$after = _x( 'Display the rating count', 'backend', 'twrp' );
		if ( ! empty( $not_installed_message ) ) {
			$after = $after . '(' . $not_installed_message . ')';
		}

		return array(
			'default'  => $this->get_default_value(),
			'value'    => '1',
			'after'    => $after,
			'disabled' => $disabled,
		);
	}

	public function get_default_value() {
		return '';
	}

}
