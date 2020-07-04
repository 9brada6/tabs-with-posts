<?php

namespace TWRP\Article_Block;

class Modern_Article_Block implements Article_Block {

	/**
	 * Get the Id of the article block.
	 *
	 * This should be unique across all article blocks.
	 *
	 * @return string
	 */
	public function get_id() {
		return 'modern_style';
	}

	/**
	 * Get the name of the Article Block. The name should have spaces instead
	 * of "_" and should be something representative.
	 *
	 * @return string
	 */
	public function get_name() {
		return 'Modern Style';
	}

	/**
	 * Include the template that should be displayed in the frontend.
	 *
	 * @param int $widget_id
	 * @param int $query_id
	 * @param array $settings
	 * @return void
	 */
	public function include_template( $widget_id, $query_id, $settings ) {
		include \TWRP_Main::get_plugin_directory() . 'templates/modern-style.php';
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
	public function display_form_settings( $widget_id, $query_id, $current_settings ) {
		?>
		<p>
			Modern settings
		</p>
		<?php
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
		return $unsanitized_settings;
	}


}
