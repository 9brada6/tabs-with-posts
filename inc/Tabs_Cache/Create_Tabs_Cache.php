<?php

namespace TWRP\Tabs_Cache;

use TWRP\Utils\Helper_Trait\After_Setup_Theme_Init_Trait;
use TWRP\Utils\Widget_Utils;

/**
 * Class used to manage when to create the cache for the tabs, and fire the request.
 */
class Create_Tabs_Cache {

	use After_Setup_Theme_Init_Trait;

	/**
	 * Holds the Background Process class.
	 *
	 * @var Tabs_Cache_Async_Request
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
		self::$async_request = new Tabs_Cache_Async_Request();

		add_action( 'post_updated', array( static::class, 'cache_all_widgets_and_tabs' ) );
	}

	/**
	 * Fire an async request that caches all widgets tabs.
	 */
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
