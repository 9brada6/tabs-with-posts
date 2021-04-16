<?php

namespace TWRP\Tabs_Creator;

use TWRP\Utils\Helper_Trait\After_Setup_Theme_Init_Trait;
use TWRP\Utils\Widget_Utils;

use RuntimeException;

class Tabs_Creator_Ajax {

	use After_Setup_Theme_Init_Trait;

	public static function after_setup_theme_init() {
		add_action( 'wp_ajax_twrp_load_widget', array( static::class, 'create_widget' ) );
		add_action( 'wp_ajax_nopriv_twrp_load_widget', array( static::class, 'create_widget' ) );
	}

	public static function create_widget() {
		// phpcs:disable WordPress.Security.NonceVerification -- Since this is an anti-cache retrieval, we can't use a nonce that is cached.
		if ( ! isset( $_GET['items'] ) || ! is_string( $_GET['items'] ) ) {
			die();
		}
		$returned_data = array();

		// todo: test if json is valid and catch.
		$items = json_decode( wp_unslash( ( $_GET['items'] ) ) );
		foreach ( $items as $item ) {
			// Get widget id and post id and sanitize them.
			if ( ! property_exists( $item, 'widget_id' ) || ! property_exists( $item, 'post_id' ) ) {
				continue;
			}
			$widget_id = $item->widget_id;
			$post_id   = $item->post_id;

			if ( ! is_numeric( $widget_id ) || ! is_numeric( $post_id ) ) {
				continue;
			}
			$widget_id = (int) $widget_id;
			$post_id   = (int) $post_id;
			if ( ! ( $widget_id > 0 ) || ! ( $post_id > 0 ) ) {
				continue;
			}

			// Get the instance settings.
			$instance_settings = Widget_Utils::get_instance_settings( $widget_id );
			if ( empty( $instance_settings ) ) {
				continue;
			}

			// Get the widget content.
			try {
				$tabs_creator = new Tabs_Creator( $widget_id, $instance_settings );
				$tabs_creator->set_ajax_loading( false );
			} catch ( RuntimeException $e ) {
				continue;
			}
			ob_start();
			$tabs_creator->display_tabs();
			$widget = ob_get_contents();
			ob_end_clean();

			// Push the returned item to an array.
			$returned_item = array(
				'widget_id' => $widget_id,
				'post_id'   => $post_id,
				'content'   => $widget,
			);

			array_push( $returned_data, $returned_item );
		}

		$returned_data = wp_json_encode( $returned_data );

		echo $returned_data; // phpcs:ignore

		// phpcs:enable WordPress.Security.NonceVerification
		die();
	}
}
