<?php
/**
 * File that contains the class with the same name.
 */

namespace TWRP\Article_Block\Setting;

use TWRP\Admin\Widget_Control\Checkbox_Control;
use TWRP\Utils\Widget_Utils;

/**
 * Class used to create a setting that will manage to display the post thumbnail
 * on an artblock.
 */
class Display_Post_Thumbnail_Setting extends Artblock_Setting {

	/**
	 * Redefine the current setting as a string variable for static analyzers.
	 *
	 * @var string
	 */
	protected $current_setting;

	public function display_setting() {
		$id   = Widget_Utils::get_field_id( $this->widget_id, $this->query_id, $this->get_setting_name() );
		$name = Widget_Utils::get_field_name( $this->widget_id, $this->query_id, $this->get_setting_name() );

		Checkbox_Control::display_setting( $id, $name, $this->current_setting, $this->get_display_post_thumbnail_setting_args() );
	}

	public function sanitize_setting() {
		return Checkbox_Control::sanitize_setting( $this->current_setting, $this->get_display_post_thumbnail_setting_args() );
	}

	public function get_setting_name() {
		return 'display_post_thumbnail';
	}

	/**
	 * Get the arguments for the Widget Setting Control.
	 *
	 * @return array
	 */
	public function get_display_post_thumbnail_setting_args() {
		return array(
			'default' => $this->get_default_value(),
			'value'   => '1',
			'before'  => _x( 'Display the post thumbnail', 'backend', 'twrp' ),
		);
	}

	public function get_default_value() {
		return '1';
	}

}
