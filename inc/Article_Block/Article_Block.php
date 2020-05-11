<?php
/**
 * File that contains the interface of the article blocks.
 *
 * @package Tabs_With_Recommended_Posts
 */

namespace TWRP\Article_Block;

/**
 * The interface of an article block. By implementing this interface a class can
 * be declared an article block.
 *
 * Definition: An article block is how a post can be displayed in the widget.
 * It can be displayed as a simple title, where a user can click on it(it can
 * also have some metadata like the author or the date), or it can be displayed
 * maybe as a title and alongside a thumbnail, like YouTube do. Or maybe we want
 * to display a custom WooCommerce product. The possibilities are very large.
 */
interface Article_Block {

	/**
	 * Get the Id of the article block.
	 *
	 * This should be unique across all article blocks.
	 *
	 * @return string
	 */
	public function get_id();

	/**
	 * Get the name of the Article Block. The name should have spaces instead
	 * of "_" and should be something representative.
	 *
	 * @return string
	 */
	public function get_name();

	/**
	 * Include the template that should be displayed in the frontend.
	 *
	 * @return void
	 */
	public function include_template();

	/**
	 * Sanitize the settings of this specific article block.
	 *
	 * @param array $settings All the article block settings that can be set via backend.
	 *
	 * @return array
	 */
	public static function sanitize_settings( $settings );

	/**
	 * Get the default settings values of the article block.
	 *
	 * @return array
	 */
	public function get_default_settings();

	/**
	 * Display a description of the article block. What is this, what metadata
	 * can display, on which post formats can be displayed, which plugins can use
	 * to display data, and other things to take in consideration when using this
	 * article block.
	 *
	 * @return void
	 */
	public function display_backend_description();

	/**
	 * Display the HTML to modify the article block settings.
	 *
	 * @param array $current_settings The current settings to put as values(if
	 *                                previously modified) in the HTML form.
	 *
	 * @return void
	 */
	public function display_backend_settings( $current_settings );

	/**
	 * Get the settings submitted via the backend form. The settings are also sanitized.
	 *
	 * @return array
	 */
	public function get_submitted_sanitized_settings();

	public function get_settings_to_create();

	public function display_widget_settings( $widget_id, $query_id, $current_settings );

	public function sanitize_widget_settings( $query_settings );

}
