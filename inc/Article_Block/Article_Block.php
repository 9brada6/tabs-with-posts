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
 * @todo: Read and change this.
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
	 * Display the article block settings in the Widgets::form().
	 *
	 * @param int $widget_id
	 * @param int $query_id
	 * @param array $current_settings
	 *
	 * @return void
	 */
	public function display_widget_settings( $widget_id, $query_id, $current_settings );

	/**
	 * Sanitize the widget settings of this specific article block.
	 *
	 * @param array $query_settings The settings to be sanitized. This settings
	 * also include other query settings, which can safely be removed in this
	 * sanitization process.
	 *
	 * @return array The new array of settings.
	 */
	public function sanitize_widget_settings( $query_settings );
}
