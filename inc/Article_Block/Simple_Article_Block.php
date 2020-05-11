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


	public function display_backend_description() {
		echo _x( 'Display only the post title, additional with the author or date.', 'backend', 'twrp' );
	}

	public function get_template_file_name() {
		return \TWRP_Main::get_templates_directory() . 'simple-style.php';
	}

	public function include_template() {
		include $this->get_template_file_name();
	}

	public function get_name() {
		return 'Simple Style';
	}

	/**
	 * Get the Id of the article block.
	 *
	 * @return string
	 */
	public function get_id() {
		return 'simple_style';
	}

	/**
	 * Sanitize the settings of this specific article block.
	 *
	 * @param array|mixed $settings All the article block settings that can be set via backend.
	 *
	 * @return array
	 */
	public static function sanitize_settings( $settings ) {

		$sanitized_settings = array();

		// $sanitized_settings[ self::AUTHOR_ATTR ] = self::sanitize_checkbox( $settings, self::AUTHOR_ATTR, '' );
		// $sanitized_settings[ self::DATE_ATTR ]   = self::sanitize_checkbox( $settings, self::DATE_ATTR, '' );

		// $sanitized_settings[ self::TITLE_FONT_SIZE_ATTR ] = self::sanitize_number(
		// $settings,
		// self::TITLE_FONT_SIZE_ATTR,
		// self::get_title_font_size_setting_form_args(),
		// ''
		// );

		// $sanitized_settings[ self::AUTHOR_FONT_SIZE_ATTR ] = self::sanitize_number(
		// $settings,
		// self::AUTHOR_FONT_SIZE_ATTR,
		// self::get_author_font_size_setting_form_args(),
		// ''
		// );

		return $sanitized_settings;
	}

	public function get_default_settings() {

	}

	/**
	 * Get the sanitized settings submitted on the style edit form.
	 *
	 * @return array With all the settings.
	 */
	public function get_submitted_sanitized_settings() {
		if ( ! isset( $_POST[ $this->get_id() ] ) ) { // phpcs:ignore -- Nonce verified.
			return $this->get_default_settings();
		}

		// phpcs:ignore -- Nonce verified, and setting sanitized.
		return self::sanitize_settings( $_POST[ $this->get_id() ] );
	}

	/**
	 * Get the arguments that should be passed into create_number_setting()
	 * function for the title font size setting.
	 *
	 * @todo make value current from settings.
	 *
	 * @return array
	 */
	protected static function get_title_font_size_setting_form_args() {
		$font_size_args = array(
			'before' => _x( 'Title font size:', 'backend', 'twrp' ),
			'after'  => 'rem',
			'min'    => 0.9,
			'max'    => 3,
			'step'   => 0.025,
		);

		return $font_size_args;
	}

	/**
	 * Get the arguments to create the number setting of the font size
	 * CSS applied to author and the date.
	 *
	 * @todo make value current from settings.
	 *
	 * @return array
	 */
	protected static function get_author_font_size_setting_form_args() {
		$author_date_size_args = array(
			'before' => _x( 'Author and date font size:', 'backend', 'twrp' ),
			'after'  => 'rem',
			'min'    => 0.9,
			'max'    => 3,
			'step'   => 0.025,
		);

		return $author_date_size_args;
	}

	public function get_settings_to_create() {
		$settings_to_create = array();

		$display_author_setting = array(
			'type'    => 'checkbox',
			'name'    => 'display_author',
			'default' => '',
			'after'   => _x( 'Display the author', 'backend', 'twrp' ),
		);

		array_push( $settings_to_create, $display_author_setting );

		return $settings_to_create;
	}


	public function display_widget_settings( $widget_id, $query_id, $current_settings ) {
		$settings_creator = new \TWRP\Article_Block_Widget_Settings_Creator( $widget_id, $query_id, $current_settings );

		$author_text = _x( 'Display the author.', 'backend', 'twrp' );
		$settings_creator->display_checkbox_setting( 'display_author', $author_text, '' );

		$date_text = _x( 'Display the date.', 'backend', 'twrp' );
		$settings_creator->display_checkbox_setting( 'display_date', $date_text, '' );

	}

	public function sanitize_widget_settings( $unsanitized_settings ) {
		$settings_creator = new \TWRP\Article_Block_Widget_Settings_Creator( 0, 0, $unsanitized_settings );
		return $unsanitized_settings;
		$sanitized_settings = $unsanitized_settings;
		foreach ( $unsanitized_settings as $setting_name => $setting ) {
			if ( 'display_author' === $setting_name ) {
				$sanitized_settings[ $setting_name ] = $settings_creator->sanitize_checkbox( $setting, '' );
			}
			if ( 'display_date' === $setting_name ) {
				$sanitized_settings[ $setting_name ] = $settings_creator->sanitize_checkbox( $setting, '' );
			}
		}

		return $sanitized_settings;
	}

}
