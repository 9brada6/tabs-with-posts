<?php
/**
 * Contains the interface that each tab that needs to be displayed should implement.
 *
 * @package Tabs_With_Recommended_Posts
 */

/**
 * Interface to be used in creating a tab. A class needs to implement
 * this, for the main setting page to know how to interact with the class.
 *
 * See TWRP\Admin\Settings_Menu for how to add a class to be displayed.
 */
interface TWRP_Admin_Menu_Tab {

	/**
	 * Display the main content of the tab.
	 */
	public function display_tab();

	/**
	 * Get the url parameter value that represents the tab.
	 *
	 * The page will display a tab, depending on the query parameter of the url
	 * (after the "?" sign), that will get from $_GET variable.
	 *
	 * This value should be unique, it's like an ID.
	 */
	public static function get_tab_url_arg();

	/**
	 * The tab title, it will be displayed on the tab button.
	 */
	public static function get_tab_title();
}
