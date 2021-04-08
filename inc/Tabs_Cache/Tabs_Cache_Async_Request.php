<?php

namespace TWRP\Tabs_Cache;

use TWRP\Database\Tabs_Cache_Table;
use TWRP\Tabs_Creator\Tabs_Creator;

use TWRP\Utils\WP_Background_Process;

use RuntimeException;

/**
 * This class manages how the async request that caches tabs works.
 */
class Tabs_Cache_Async_Request extends WP_Background_Process {

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

			$cache = new Tabs_Cache_Table( $widget_id, $query_id );
			$cache->update_widget_html( $tab_content_html );
		}
	}

	// Use function complete() to notice the user, or perform other arbitrary task...
}
