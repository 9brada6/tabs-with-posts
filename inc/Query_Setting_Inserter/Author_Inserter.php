<?php
/**
 * File that contains the class with the same name.
 *
 * @phpcs:disable Squiz.Commenting.FunctionComment.Missing
 */

namespace TWRP\Query_Setting_Inserter;

use TWRP\Query_Setting\Author;
use TWRP\Get_Posts;
use TWRP\Utils;
use RuntimeException;

/**
 * Class that adds the needed settings to a WP query array args.
 */
class Author_Inserter implements Query_Setting_Inserter {

	public function add_query_arg( $previous_query_args, $query_settings ) {
		$settings     = $query_settings[ Author::get_setting_name() ];
		$authors_type = $settings[ Author::AUTHORS_TYPE__SETTING_NAME ];

		if ( Author::AUTHORS_TYPE__DISABLED === $authors_type ) {
			return $previous_query_args;
		}

		if ( Author::AUTHORS_TYPE__SAME === $authors_type ) {
			$global_post = Get_Posts::get_global_post();
			if ( ( ! $global_post ) || ( ! is_singular() ) ) {
				throw new RuntimeException( 'Author cannot be retrieved in a non single page.' );
			}
			$author_id = get_the_author_meta( 'ID', $global_post->post_author );

			$previous_query_args['author__in'] = array( $author_id );
			return $previous_query_args;
		}

		$authors_ids = explode( ';', $settings[ Author::AUTHORS_IDS__SETTING_NAME ] );
		$authors_ids = Utils::get_valid_wp_ids( $authors_ids );

		if ( empty( $authors_ids ) ) {
			return $previous_query_args;
		}

		if ( Author::AUTHORS_TYPE__INCLUDE === $authors_type ) {
			$previous_query_args['author__in'] = $authors_ids;
		} elseif ( Author::AUTHORS_TYPE__EXCLUDE === $authors_type ) {
			$previous_query_args['author__not_in'] = $authors_ids;
		}

		return $previous_query_args;
	}

}
