<?php
/**
 * Contains the class that will let administrators custom modifying the WP_Query
 * arguments via a JSON object.
 *
 * @todo: change class from twrp-advanced-args into twrp-advanced-settings.
 */

namespace TWRP\Query_Generator\Query_Setting;

use TWRP\Admin\Settings_Menu;
use \TWRP\Admin\Tabs\Queries_Tab;

/**
 * Class that will let administrators custom modifying the advanced arguments
 * via JSON parameters.
 */
class Advanced_Arguments extends Query_Setting {

	public static function get_class_order_among_siblings() {
		return 1000;
	}

	/**
	 * The setting name and the array key of the option that remembers whether
	 * or not the custom arguments are applied.
	 */
	const IS_APPLIED__SETTING_NAME = 'is_applied_setting';

	/**
	 * The setting name and the array key where the custom arguments JSON is found.
	 */
	const CUSTOM_ARGS__SETTING_NAME = 'custom_args_json';

	public static function get_setting_name() {
		return 'advanced_args';
	}

	public static function get_default_setting() {
		return array(
			self::IS_APPLIED__SETTING_NAME  => 'not_apply',
			self::CUSTOM_ARGS__SETTING_NAME => self::advanced_arguments_example(),
		);
	}

	public static function sanitize_setting( $setting ) {
		if ( ! isset( $setting[ self::CUSTOM_ARGS__SETTING_NAME ], $setting[ self::IS_APPLIED__SETTING_NAME ] ) ) {
			return self::get_default_setting();
		}

		$is_applied_possible_values = array( 'not_apply', 'apply' );
		if ( ! in_array( $setting[ self::IS_APPLIED__SETTING_NAME ], $is_applied_possible_values, true ) ) {
			return self::get_default_setting();
		}

		$sanitized_setting = array(
			self::IS_APPLIED__SETTING_NAME => $setting[ self::IS_APPLIED__SETTING_NAME ],
		);

		$sanitized_setting[ self::CUSTOM_ARGS__SETTING_NAME ] = $setting[ self::IS_APPLIED__SETTING_NAME ];
		$sanitized_setting[ self::CUSTOM_ARGS__SETTING_NAME ] = $setting[ self::CUSTOM_ARGS__SETTING_NAME ];

		return $sanitized_setting;
	}

	public static function add_query_arg( $previous_query_args, $query_settings ) {
		if ( ! isset( $query_settings[ self::get_setting_name() ][ self::IS_APPLIED__SETTING_NAME ] ) ) {
			return $previous_query_args;
		}
		$settings = $query_settings[ self::get_setting_name() ];

		if ( 'apply' !== $settings[ self::IS_APPLIED__SETTING_NAME ] ) {
			return $previous_query_args;
		}

		// todo:

		return $previous_query_args;
	}

	public static function is_valid_json( $json ) {
		// Todo.
	}

	public static function advanced_arguments_example() {
		// return '/*
		// {
		// "author": 2,
		// "post__in": [13,42],
		// "tax_query": {
		// "relation": "AND",
		// {
		// "taxonomy": "movie_genre",
		// "field": "slug",
		// "terms": ["action", "comedy"]
		// },
		// {
		// "taxonomy": "actor",
		// "field": "term_id",
		// "terms": [104, 115, 206],
		// "operator": "NOT IN"
		// }
		// }
		// }
		// */';
		return '';
	}

}
