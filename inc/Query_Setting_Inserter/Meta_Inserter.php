<?php
/**
 * File that contains the class with the same name.
 *
 * @phpcs:disable Squiz.Commenting.FunctionComment.Missing
 */

namespace TWRP\Query_Setting_Inserter;

use TWRP\Query_Setting\Meta_Setting;

/**
 * Class that adds the needed settings to a WP query array args.
 */
class Meta_Inserter implements Query_Setting_Inserter {

	public function add_query_arg( $previous_query_args, $query_settings ) {
		if ( empty( $query_settings[ Meta_Setting::get_setting_name() ][ Meta_Setting::META_KEY_NAME__SETTING_NAME ] ) ) {
			return $previous_query_args;
		}

		$meta_settings = $query_settings[ Meta_Setting::get_setting_name() ];

		// phpcs:ignore -- Slow query.
		$previous_query_args['meta_key'] = $meta_settings[ Meta_Setting::META_KEY_NAME__SETTING_NAME ];

		if ( 'EXISTS' === $meta_settings[ Meta_Setting::META_KEY_COMPARATOR__SETTING_NAME ] ) {
			return $previous_query_args;
		}

		$previous_query_args['meta_compare'] = $meta_settings[ Meta_Setting::META_KEY_COMPARATOR__SETTING_NAME ];

		if ( isset( $meta_settings[ Meta_Setting::META_KEY_VALUE__SETTING_NAME ] ) ) {
			if ( is_numeric( $meta_settings[ Meta_Setting::META_KEY_VALUE__SETTING_NAME ] ) ) {
				$previous_query_args['meta_value_num'] = $meta_settings[ Meta_Setting::META_KEY_VALUE__SETTING_NAME ];
			} else {
				$previous_query_args['meta_value'] = $meta_settings[ Meta_Setting::META_KEY_VALUE__SETTING_NAME ]; // phpcs:ignore -- Slow query.
			}
		} else {
			$previous_query_args['meta_value'] = ''; // phpcs:ignore -- Slow query.
		}

		return $previous_query_args;
	}

}
