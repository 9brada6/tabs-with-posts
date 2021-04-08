<?php

namespace TWRP\Tabs_Cache;

use RuntimeException;

use TWRP\Tabs_Cache\Tabs_Cache;
use TWRP\Tabs_Creator\Tabs_Creator;
use TWRP\Utils\Helper_Trait\After_Setup_Theme_Init_Trait;
use TWRP\Utils\Widget_Utils;
use TWRP\Utils\WP_Background_Process;

class Create_Tabs_Cache {

	use After_Setup_Theme_Init_Trait;

	/**
	 * Holds the Background Process class.
	 *
	 * @var TWRP_Tabs_Cache_Async_Request
	 */
	protected static $async_request;

	/**
	 * Whether or not the async request have been displaced.
	 *
	 * @var bool
	 */
	protected static $async_request_dispatched = false;

	public static function after_setup_theme_init() {

		// We need to initialize this class here, because after it's too late, and won't work.
		self::$async_request = new \TWRP\Tabs_Cache\TWRP_Tabs_Cache_Async_Request();

		add_action( 'post_updated', array( static::class, 'cache_all_widgets_and_tabs' ) );
	}

	public static function cache_all_widgets_and_tabs() {
		if ( self::$async_request_dispatched ) {
			return;
		}

		$widgets = get_option( 'widget_' . Widget_Utils::TWRP_WIDGET__BASE_ID, array() );

		if ( ! is_array( $widgets ) ) {
			return;
		}

		$request     = self::$async_request;
		$item_pushed = false;

		foreach ( $widgets as $id => $widget_instance_settings ) {
			if ( ! is_numeric( $id ) || ! is_array( $widget_instance_settings ) ) {
				continue;
			}

			$item                             = array();
			$item['widget_id']                = $id;
			$item['widget_instance_settings'] = $widget_instance_settings;

			$request->push_to_queue( $item );

			self::$async_request_dispatched = true;
			$item_pushed                    = true;
		}

		if ( $item_pushed ) {
			$request = $request->save();
			$request->dispatch();
		}
	}
}

class TWRP_Tabs_Cache_Async_Request extends WP_Background_Process {

	protected $prefix = 'twrp';

	protected $action = 'tabs_cache_request';

	protected function task( $item ) {
		$widget_id         = $item['widget_id'];
		$instance_settings = $item['widget_instance_settings'];

		if ( ! is_numeric( $widget_id ) || ! is_array( $instance_settings ) ) {
			return false;
		}

		$this->create_widget_cache( $widget_id, $instance_settings );
		return false;
	}

	protected function create_widget_cache( $widget_id, $instance_settings ) {
		try {
			$tabs_creator = new Tabs_Creator( $widget_id, $instance_settings );
		} catch ( RuntimeException $e ) {
			return;
		}

		$query_ids = $tabs_creator->get_query_ids();

		foreach ( $query_ids as $query_id ) {
			$tab_content_html = $tabs_creator->create_tab_articles( $query_id );
			if ( empty( $tab_content_html ) ) {
				continue;
			}

			$cache = new Tabs_Cache( $widget_id, $query_id );
			$cache->update_widget_html( $tab_content_html );
		}
	}

	protected function complete() {
		parent::complete();

		// Show notice to user or perform some other arbitrary task...
	}
}

// function wpbp_http_request_args( $r, $url ) {
// $r['headers']['Authorization'] = 'Basic ' . base64_encode( \USERNAME . ':' . \PASSWORD );

// return $r;
// }
// add_filter( 'http_request_args', 'TWRP\\Tabs_Cache\\wpbp_http_request_args', 10, 2 );
