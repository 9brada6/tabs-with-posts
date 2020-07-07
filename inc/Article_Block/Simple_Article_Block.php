<?php
/**
 *
 * @todo: add a constant for all settings with default values.
 */

namespace TWRP\Article_Block;

use TWRP\Artblock_Component\Widget_Component_Settings;

class Simple_Article_Block implements Article_Block {

	const AUTHOR_ATTR           = 'author';
	const DATE_ATTR             = 'date';
	const TITLE_FONT_SIZE_ATTR  = 'font-size';
	const AUTHOR_FONT_SIZE_ATTR = 'author-font-size';

	protected $widget_id;
	protected $query_id;
	protected $settings;

	/**
	 * Get the Id of the article block.
	 *
	 * This should be unique across all article blocks.
	 *
	 * @return string
	 */
	public static function get_id() {
		return 'simple_style';
	}

	/**
	 * Get the name of the Article Block. The name should have spaces instead
	 * of "_" and should be something representative.
	 *
	 * @return string
	 */
	public static function get_name() {
		return 'Simple Style';
	}

	public static function init() {
		// Do nothing for now.
	}

	public function __construct( $widget_id, $query_id, $settings ) {
		$this->widget_id = $widget_id;
		$this->query_id  = $query_id;
		$this->settings  = $settings;
	}

	/**
	 * Include the template that should be displayed in the frontend.
	 *
	 * @return void
	 */
	public function include_template() {
		include \TWRP_Main::get_templates_directory() . 'simple-style.php';
	}

	/**
	 * Get the components that can be edited for this artblock.
	 *
	 * @return array<Widget_Component_Settings>
	 */
	public function get_components() {
		$components = array();

		$title_component_settings = ( isset( $this->settings['title'] ) && is_array( $this->settings['title'] ) ) ? $this->settings['title'] : array();
		$title_component_title    = _x( 'Title', 'backend', 'twrp' );
		$title_component          = new Widget_Component_Settings(
			$this->widget_id,
			$this->query_id,
			'title',
			$title_component_title,
			$title_component_settings,
			Widget_Component_Settings::TEXT_SETTINGS
		);
		$components ['title']     = $title_component;

		return $components;
	}

	/**
	 * Display the article block settings in the Widgets::form().
	 *
	 * @return void
	 */
	public function display_form_settings() {
		$this->display_artblock_settings();
		$this->display_components_settings();
	}

	/**
	 * Display the artblock specific settings.
	 */
	protected function display_artblock_settings() {
		// Do nothing for now.
	}

	/**
	 * Display the settings for the artblocks components.
	 *
	 * @return void
	 */
	protected function display_components_settings() {
		$components = $this->get_components();
		Widget_Component_Settings::display_components( $components );
	}

	/**
	 * Sanitize the widget settings of this specific article block.
	 *
	 * @return array The new array of settings.
	 */
	public function sanitize_widget_settings() {
		$components = $this->get_components();

		$sanitized_settings = array();

		foreach ( $components as $component ) {
			$component_name = $component->get_component_name();
			if ( isset( $this->settings[ $component_name ] ) ) {
				$sanitized_settings[ $component_name ] = $component->sanitize_settings( $this->settings[ $component_name ] );
			} else {
				$sanitized_settings[ $component_name ] = $component->sanitize_settings( null );
			}
		}

		// todo:
		return $this->settings;

		// $unsanitized_settings = wp_parse_args( $unsanitized_settings, $this->get_default_values() );
		// $settings_creator     = new Widget_Settings_Creator( 0, 0, $unsanitized_settings );
		// $default_values = $this->get_default_values();

		// todo: delete this:

		/*
		$sanitized_settings = array();
		foreach ( $unsanitized_settings as $setting_name => $setting ) {
			if ( 'display_author' === $setting_name ) {
				$sanitized_settings[ $setting_name ] = $settings_creator->sanitize_checkbox( $setting );
			}

			if ( 'display_date' === $setting_name ) {
				$sanitized_settings[ $setting_name ] = $settings_creator->sanitize_checkbox( $setting );
			}

			if ( 'header_size' === $setting_name ) {
				$sanitized_settings[ $setting_name ] = $settings_creator->sanitize_number( $setting, $default_values['header_size'], $this->get_header_size_setting_args() );
			}

			if ( 'meta_size' === $setting_name ) {
				$sanitized_settings[ $setting_name ] = $settings_creator->sanitize_number( $setting, $default_values['meta_size'], $this->get_meta_size_setting_args() );
			}

			if ( 'date_format' === $setting_name ) {
				$sanitized_settings[ $setting_name ] = $setting;
			}

			if ( 'show_date_difference' === $setting_name ) {
				$sanitized_settings[ $setting_name ] = $settings_creator->sanitize_checkbox( $setting );
			}
		}

		return $sanitized_settings;
		*/
	}

	// =========================================================================
	// Create/Sanitize Settings Helper Functions

	#region -- Rework and delete


	/**
	 * Enqueue all the styles and scripts necessary for this article block to run.
	 *
	 * @param int $widget_id
	 * @param int $query_id
	 * @param array $query_settings The settings passed must be sanitized.
	 * @return void
	 */
	public function enqueue_styles_and_scripts( $widget_id, $query_id, $query_settings ) {
		wp_enqueue_style( 'twrp-simple-style', 'todo', array(), '1.0.0', 'all' );

		// $custom_css = self::create_custom_css( $widget_id, $query_id, $query_settings );
		// wp_add_inline_style( 'twrp-simple-style', $custom_css );
	}

	protected function create_custom_css( $widget_id, $query_id, $settings ) {
		$parent_class = '.twrp-widget__tab-content--' . $widget_id . '-' . $query_id;

		$custom_css = '';
		if ( $settings['header_size'] ) {
			$custom_css .= "$parent_class .twrp-ss__title {
				font-size: {$settings['header_size']}rem;
			}";
		}

		return $custom_css;
	}

	#endregion -- Rework and delete


			// $settings_creator = new Widget_Settings_Creator( $widget_id, $query_id, $current_settings );
		// $default_settings = $this->get_default_values();

		// $settings_creator->display_checkbox_setting( 'display_author', _x( 'Display the author.', 'backend', 'twrp' ), $default_settings['display_author'] );
		// $settings_creator->display_checkbox_setting( 'display_date', _x( 'Display the date.', 'backend', 'twrp' ), $default_settings['display_author'] );
		// $settings_creator->display_checkbox_setting( 'show_date_difference', _x( 'Display the date as a human difference(Ex: 3 months ago).', 'backend', 'twrp' ), $default_settings['show_date_difference'] );

		// $settings_creator->display_number_setting( 'header_size', $default_settings['header_size'], $this->get_header_size_setting_args() );
		// $settings_creator->display_number_setting( 'meta_size', $default_settings['meta_size'], $this->get_meta_size_setting_args() );

		// $title_component_title = _x( 'Title', 'backend', 'twrp' );
		// $title_component       = new Default_Component( 'title_component', $title_component_title, $widget_id, $query_id, $current_settings );

		// $author_component_title = _x( 'Author', 'backend', 'twrp' );
		// $author_component       = new Default_Component( 'author_component', $author_component_title, $widget_id, $query_id, $current_settings );

		// $date_component_title = _x( 'Date', 'backend', 'twrp' );
		// $date_component       = new Default_Component( 'date_component', $date_component_title, $widget_id, $query_id, $current_settings );

		// $components = new Display_Components();
		// $components->add_component( $title_component );
		// $components->add_component( $author_component );
		// $components->add_component( $date_component );

		// $components->display_components();
}
