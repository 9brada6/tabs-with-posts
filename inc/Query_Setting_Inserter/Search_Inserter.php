<?php
/**
 * File that contains the class with the same name.
 *
 * @phpcs:disable Squiz.Commenting.FunctionComment.Missing
 */

namespace TWRP\Query_Setting_Inserter;

use TWRP\Query_Setting\Search;

/**
 * Class that adds the needed settings to a WP query array args.
 */
class Search_Inserter implements Query_Setting_Inserter {

	public function add_query_arg( $previous_query_args, $query_settings ) {
		if ( ! isset( $query_settings[ Search::get_setting_name() ][ Search::SEARCH_KEYWORDS__SETTING_NAME ] ) ) {
			return $previous_query_args;
		}

		$search_keywords = $query_settings[ Search::get_setting_name() ][ Search::SEARCH_KEYWORDS__SETTING_NAME ];

		if ( empty( $search_keywords ) ) {
			return $previous_query_args;
		}

		$previous_query_args['s'] = $search_keywords;
		return $previous_query_args;
	}

}
