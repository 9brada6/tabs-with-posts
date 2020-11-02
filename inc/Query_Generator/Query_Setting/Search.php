<?php
/**
 * Contains the class that will filter articles by search keywords.
 *
 * phpcs:disable Squiz.Commenting.FunctionComment.Missing -- Inherited from interface.
 */

namespace TWRP\Query_Generator\Query_Setting;

/**
 * Creates the possibility to filter a query based on a search string.
 */
class Search extends Query_Setting {

	const CLASS_ORDER = 70;

	/**
	 * The name of the setting and array key which represents the search string.
	 */
	const SEARCH_KEYWORDS__SETTING_NAME = 'search_keywords';

	public static function init() {
		// Do nothing.
	}

	public static function get_setting_name() {
		return 'search';
	}

	public static function get_default_setting() {
		return array(
			self::SEARCH_KEYWORDS__SETTING_NAME => '',
		);
	}

	public static function sanitize_setting( $setting ) {
		if ( ! isset( $setting[ self::SEARCH_KEYWORDS__SETTING_NAME ] ) ) {
			return self::get_default_setting();
		}
		$search_keywords = $setting[ self::SEARCH_KEYWORDS__SETTING_NAME ];

		if ( ! is_string( $search_keywords ) ) {
			return self::get_default_setting();
		}

		return $setting;
	}

	public static function add_query_arg( $previous_query_args, $query_settings ) {
		if ( ! isset( $query_settings[ self::get_setting_name() ][ self::SEARCH_KEYWORDS__SETTING_NAME ] ) ) {
			return $previous_query_args;
		}

		$search_keywords = $query_settings[ self::get_setting_name() ][ self::SEARCH_KEYWORDS__SETTING_NAME ];

		if ( empty( $search_keywords ) ) {
			return $previous_query_args;
		}

		$previous_query_args['s'] = $search_keywords;
		return $previous_query_args;
	}
}
