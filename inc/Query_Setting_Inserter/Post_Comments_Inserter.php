<?php
/**
 * File that contains the class with the same name.
 *
 * @phpcs:disable Squiz.Commenting.FunctionComment.Missing
 */

namespace TWRP\Query_Setting_Inserter;

use TWRP\Query_Setting\Post_Comments;

/**
 * Class that adds the needed settings to a WP query array args.
 */
class Post_Comments_Inserter implements Query_Setting_Inserter {

	public function add_query_arg( $previous_query_args, $query_settings ) {
		if ( ! isset( $query_settings[ Post_Comments::get_setting_name() ] ) ) {
			return $previous_query_args;
		}

		$settings = $query_settings[ Post_Comments::get_setting_name() ];

		if ( ! is_numeric( $settings[ Post_Comments::COMMENTS_VALUE_NAME ] ) ) {
			return $previous_query_args;
		}

		if ( 'NA' === $settings[ Post_Comments::COMMENTS_VALUE_NAME ] ) {
			return $previous_query_args;
		}

		$comment_count = array(
			'compare' => Post_Comments::get_comparator_from_name( $settings[ Post_Comments::COMMENTS_COMPARATOR_NAME ] ),
			'value'   => $settings[ Post_Comments::COMMENTS_VALUE_NAME ],
		);

		$previous_query_args['comment_count'] = $comment_count;
		return $previous_query_args;
	}

}
