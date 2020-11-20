<?php
/**
 *
 * @todo: add a constant for all settings with default values.
 * @todo: add constant for setting names.
 */

namespace TWRP\Article_Block;

use TWRP\Artblock_Component\Widget_Component_Settings;
use TWRP\Utils\Widget_Utils;
use TWRP\Widget_Control\Checkbox_Control;

class Simple_Article_Block extends Article_Block {

	public static function get_class_order_among_siblings() {
		return 50;
	}

	const AUTHOR_ATTR           = 'author';
	const DATE_ATTR             = 'date';
	const TITLE_FONT_SIZE_ATTR  = 'font-size';
	const AUTHOR_FONT_SIZE_ATTR = 'author-font-size';

	public static function get_id() {
		return 'simple_style';
	}

	public static function get_name() {
		return 'Simple Style';
	}

	protected static function get_file_name() {
		return 'simple-style.php';
	}

	public function get_components() {
		$components = array();

		#region -- Title Component

		$title_component_settings = ( isset( $this->settings['title'] ) && is_array( $this->settings['title'] ) ) ? $this->settings['title'] : array();
		$title_css_components     = array(
			'.twrp-ss__title'                      => Widget_Component_Settings::TEXT_SETTINGS,
			'.twrp-ss__link:hover .twrp-ss__title' => array( Widget_Component_Settings::HOVER_COLOR_SETTING ),
		);
		$title_component          = new Widget_Component_Settings( $this->widget_id, $this->query_id, 'title', _x( 'Title', 'backend', 'twrp' ), $title_component_settings, $title_css_components );
		$components ['title']     = $title_component;

		#endregion -- Title Component

		#region -- Date Component

		$date_component_current_settings = ( isset( $this->settings['date'] ) && is_array( $this->settings['date'] ) ) ? $this->settings['date'] : array();

		$date_css_components = array(
			'.twrp-ss__date' => Widget_Component_Settings::TEXT_SETTINGS,
			'.twrp-ss__link:hover + .twrp-ss__meta-wrapper .twrp-ss__date' => array( Widget_Component_Settings::HOVER_COLOR_SETTING ),
		);

		$date_component      = new Widget_Component_Settings( $this->widget_id, $this->query_id, 'date', _x( 'Date', 'backend', 'twrp' ), $date_component_current_settings, $date_css_components );
		$components ['date'] = $date_component;

		#endregion -- Date Component

		#region -- Author Component

		$author_css_components = array(
			'.twrp-ss__author' => Widget_Component_Settings::TEXT_SETTINGS,
			'.twrp-ss__link:hover + .twrp-ss__meta-wrapper .twrp-ss__author' => array( Widget_Component_Settings::HOVER_COLOR_SETTING ),
		);

		$author_component_current_settings = ( isset( $this->settings['author'] ) && is_array( $this->settings['author'] ) ) ? $this->settings['author'] : array();
		$author_component                  = new Widget_Component_Settings( $this->widget_id, $this->query_id, 'author', _x( 'Author', 'backend', 'twrp' ), $author_component_current_settings, $author_css_components );
		$components ['author']             = $author_component;

		#endregion -- Author Component

		return $components;
	}

	public function display_form_settings() {
		// Display Author Setting
		$id              = Widget_Utils::get_field_id( $this->widget_id, $this->query_id, 'display_author' );
		$name            = Widget_Utils::get_field_name( $this->widget_id, $this->query_id, 'display_author' );
		$current_setting = ( isset( $this->settings['display_author'] ) && is_string( $this->settings['display_author'] ) ) ? $this->settings['display_author'] : null;
		Checkbox_Control::display_setting( $id, $name, $current_setting, $this->get_display_author_setting_args() ); // @phan-suppress-current-line PhanPartialTypeMismatchArgument

		// Display Date Setting
		$id              = Widget_Utils::get_field_id( $this->widget_id, $this->query_id, 'display_date' );
		$name            = Widget_Utils::get_field_name( $this->widget_id, $this->query_id, 'display_date' );
		$current_setting = ( isset( $this->settings['display_date'] ) && is_string( $this->settings['display_date'] ) ) ? $this->settings['display_date'] : null;
		Checkbox_Control::display_setting( $id, $name, $current_setting, $this->get_display_date_setting_args() ); // @phan-suppress-current-line PhanPartialTypeMismatchArgument

		// Display Date in readable format Setting
		$id              = Widget_Utils::get_field_id( $this->widget_id, $this->query_id, 'human_readable_date' );
		$name            = Widget_Utils::get_field_name( $this->widget_id, $this->query_id, 'human_readable_date' );
		$current_setting = ( isset( $this->settings['human_readable_date'] ) && is_string( $this->settings['human_readable_date'] ) ) ? $this->settings['human_readable_date'] : null;
		Checkbox_Control::display_setting( $id, $name, $current_setting, $this->get_human_readable_setting_args() ); // @phan-suppress-current-line PhanPartialTypeMismatchArgument

		// Display Comments
		$id              = Widget_Utils::get_field_id( $this->widget_id, $this->query_id, 'display_comments' );
		$name            = Widget_Utils::get_field_name( $this->widget_id, $this->query_id, 'display_comments' );
		$current_setting = ( isset( $this->settings['display_comments'] ) && is_string( $this->settings['display_comments'] ) ) ? $this->settings['display_comments'] : null;
		Checkbox_Control::display_setting( $id, $name, $current_setting, $this->get_comments_setting_args() ); // @phan-suppress-current-line PhanPartialTypeMismatchArgument

		// Display the components settings.
		$components = $this->get_components();
		Widget_Component_Settings::display_components( $components );
	}

	public function sanitize_widget_settings( $set_internal = true ) {
		$components         = $this->get_components();
		$sanitized_settings = array();

		foreach ( $components as $component ) {
			$component_name = $component->get_component_name();
			if ( isset( $this->settings[ $component_name ] ) ) {
				$sanitized_settings[ $component_name ] = $component->sanitize_settings();
			} else {
				$sanitized_settings[ $component_name ] = $component->sanitize_settings();
			}
		}

		$settings = $this->settings;

		$author_setting_to_sanitize           = isset( $settings['display_author'] ) ? $settings['display_author'] : null;
		$sanitized_settings['display_author'] = Checkbox_Control::sanitize_setting( $author_setting_to_sanitize, $this->get_display_author_setting_args() );

		$author_setting_to_sanitize         = isset( $settings['display_date'] ) ? $settings['display_date'] : null;
		$sanitized_settings['display_date'] = Checkbox_Control::sanitize_setting( $author_setting_to_sanitize, $this->get_display_date_setting_args() );

		$author_setting_to_sanitize                = isset( $settings['human_readable_date'] ) ? $settings['human_readable_date'] : null;
		$sanitized_settings['human_readable_date'] = Checkbox_Control::sanitize_setting( $author_setting_to_sanitize, $this->get_human_readable_setting_args() );

		$comments_setting_to_sanitize           = isset( $settings['display_comments'] ) ? $settings['display_comments'] : null;
		$sanitized_settings['display_comments'] = Checkbox_Control::sanitize_setting( $comments_setting_to_sanitize, $this->get_comments_setting_args() );

		if ( $set_internal ) {
			$this->settings = $sanitized_settings;
		}

		return $sanitized_settings;
	}

	#region -- Settings defaults

	public function get_display_author_setting_args() {
		return array(
			'default' => '1',
			'value'   => '1',
			'before'  => _x( 'Display the author', 'backend', 'twrp' ),
		);
	}

	public function get_display_date_setting_args() {
		return array(
			'default' => '1',
			'value'   => '1',
			'before'  => _x( 'Display the date', 'backend', 'twrp' ),
		);
	}

	public function get_human_readable_setting_args() {
		return array(
			'default' => '1',
			'value'   => '1',
			'before'  => _x( 'Date in relative format(Ex: 3 days ago)', 'backend', 'twrp' ),
		);
	}

	public function get_comments_setting_args() {
		return array(
			'default' => '',
			'value'   => '1',
			'before'  => _x( 'Display the number of comments?', 'backend', 'twrp' ),
		);
	}

	#endregion -- Settings defaults
}
