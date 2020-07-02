<?php
/**
 * File that holds the class with the same name.
 */

namespace TWRP\TWRP_Widget;

use TWRP\TWRP_Widget\Widget_Form;

class Widget_Ajax {

	/**
	 * Called before anything else, to initialize actions and filters.
	 *
	 * This function is not called when needed, for example in admin backend or
	 * frontend, but when the WP include the plugin, so additional checking must
	 * be made inside the function.
	 */
	public static function init() {
		add_action( 'wp_ajax_twrp_widget_create_query_setting', self::class . '::ajax_create_query_selected_item' );
		add_action( 'wp_ajax_twrp_widget_create_artblock_settings', self::class . '::ajax_create_artblock_settings' );
	}

	public static function ajax_create_query_selected_item() {
		$widget_id = $_POST['widget_id'];
		$query_id  = $_POST['query_id'];

		// todo: Verify those 2.
		$widget_id = (int) $widget_id;
		$query_id  = (int) $query_id;

		Widget_Form::display_query_settings( $widget_id, $query_id );
		die();
	}

	public static function ajax_create_artblock_settings() {
		$artblock_id = $_POST['artblock_id'];
		$widget_id   = $_POST['widget_id'];
		$query_id    = $_POST['query_id'];

		// todo: verify those 3.

		Widget_Form::display_artblock_settings( $widget_id, $query_id, $artblock_id );
		die();
	}
}
