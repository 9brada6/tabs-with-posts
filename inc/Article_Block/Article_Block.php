<?php
/**
 * File that contains the interface of the article blocks.
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
	public static function get_id();

	/**
	 * Get the name of the Article Block. The name should have spaces instead
	 * of "_" and should be something representative.
	 *
	 * @return string
	 */
	public static function get_name();

	/**
	 * Called before anything else, to initialize actions and filters.
	 *
	 * Always called at 'after_setup_theme' action. Other things added here should be
	 * additionally checked, for example by admin hooks, or whether or not to be
	 * included in special pages, ...etc.
	 */
	public static function init();

	/**
	 * Construct the object instance.
	 *
	 * @param int $widget_id
	 * @param int $query_id
	 * @param array $settings
	 */
	public function __construct( $widget_id, $query_id, $settings );

	/**
	 * Include the template that should be displayed in the frontend.
	 *
	 * @return void
	 */
	public function include_template();

	/**
	 * Display the article block settings in the Widgets::form().
	 *
	 * @return void
	 */
	public function display_form_settings();

	/**
	 * Sanitize the widget settings of this specific article block.
	 *
	 * @return array The new array of settings.
	 */
	public function sanitize_widget_settings();
}
