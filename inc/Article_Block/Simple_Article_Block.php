<?php
/**
 *
 * @todo: add a constant for all settings with default values.
 */

namespace TWRP\Article_Block;

class Simple_Article_Block implements Article_Block {

	const AUTHOR_ATTR           = 'author';
	const DATE_ATTR             = 'date';
	const TITLE_FONT_SIZE_ATTR  = 'font-size';
	const AUTHOR_FONT_SIZE_ATTR = 'author-font-size';

	/**
	 * Get the Id of the article block.
	 *
	 * This should be unique across all article blocks.
	 *
	 * @return string
	 */
	public function get_id() {
		return 'simple_style';
	}

	/**
	 * Get the name of the Article Block. The name should have spaces instead
	 * of "_" and should be something representative.
	 *
	 * @return string
	 */
	public function get_name() {
		return 'Simple Style';
	}

	/**
	 * Include the template that should be displayed in the frontend.
	 *
	 * @return void
	 */
	public function include_template() {
		$settings = array();
		include \TWRP_Main::get_templates_directory() . 'simple-style.php';
	}

	/**
	 * Enqueue all the styles and scripts necessary for this article block to run.
	 *
	 * @param int $widget_id
	 * @param int $query_id
	 * @param array $query_settings
	 * @return void
	 */
	public function enqueue_styles_and_scripts( $widget_id, $query_id, $query_settings ) {

	}

	/**
	 * Display the article block settings in the Widgets::form().
	 *
	 * @param int $widget_id
	 * @param int $query_id
	 * @param array $current_settings
	 *
	 * @return void
	 */
	public function display_widget_settings( $widget_id, $query_id, $current_settings ) {
		$settings_creator = new \TWRP\Article_Block_Widget_Settings_Creator( $widget_id, $query_id, $current_settings );
		$default_settings = $this->get_default_values();

		$settings_creator->display_checkbox_setting( 'display_author', _x( 'Display the author.', 'backend', 'twrp' ), $default_settings['display_author'] );
		$settings_creator->display_checkbox_setting( 'display_date', _x( 'Display the date.', 'backend', 'twrp' ), $default_settings['display_author'] );

		$settings_creator->display_number_setting( 'header_size', $default_settings['header_size'], $this->get_header_size_setting_args() );
		$settings_creator->display_number_setting( 'meta_size', $default_settings['meta_size'], $this->get_meta_size_setting_args() );
	}

	/**
	 * Sanitize the widget settings of this specific article block.
	 *
	 * @param array $unsanitized_settings The settings to be sanitized. This settings
	 * also include other query settings, which can safely be removed in this
	 * sanitization process.
	 *
	 * @return array The new array of settings.
	 */
	public function sanitize_widget_settings( $unsanitized_settings ) {
		$unsanitized_settings = wp_parse_args( $unsanitized_settings, $this->get_default_values() );
		$settings_creator     = new \TWRP\Article_Block_Widget_Settings_Creator( 0, 0, $unsanitized_settings );
		$default_values       = $this->get_default_values();

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
		}

		return $sanitized_settings;
	}

	// =========================================================================
	// Create/Sanitize Settings Helper Functions

	public function get_default_values() {
		$defaults = array(
			'display_date'   => '',
			'display_author' => '',
			'header_size'    => '',
			'meta_size'      => '0.9',
		);

		return $defaults;
	}

	protected function get_header_size_setting_args() {
		return array(
			'before' => _x( 'Title font size:', 'backend; CSS unit', 'twrp' ),
			'after'  => _x( 'rem.', 'backend; CSS unit', 'twrp' ),
			'max'    => '3',
			'min'    => '0.7',
			'step'   => '0.025',
		);
	}

	protected function get_meta_size_setting_args() {
		return array(
			'before' => _x( 'Author and date font size:', 'backend; CSS unit', 'twrp' ),
			'after'  => _x( 'rem.', 'backend; CSS unit', 'twrp' ),
			'max'    => '3',
			'min'    => '0.7',
			'step'   => '0.025',
		);
	}

	// =========================================================================

}
