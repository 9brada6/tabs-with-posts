<?php
/**
 * File that holds the class with the same name.
 */

namespace TWRP\TWRP_Widget;

use TWRP\TWRP_Widget\Widget_Form;
use TWRP\Utils\Helper_Trait\After_Setup_Theme_Init_Trait;

class Widget_Ajax {

	use After_Setup_Theme_Init_Trait;

	public static function after_setup_theme_init() {
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
