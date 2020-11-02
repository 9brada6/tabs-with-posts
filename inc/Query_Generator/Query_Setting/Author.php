<?php
/**
 * File containing the class with the same name.
 *
 * @todo File and class comment.
 *
 * phpcs:disable Squiz.Commenting.FunctionComment.Missing -- Inherited from interface.
 */

namespace TWRP\Query_Generator\Query_Setting;

use TWRP\Query_Generator;
use TWRP\Simple_Utils;
use RuntimeException;

class Author extends Query_Setting {

	const CLASS_ORDER = 40;

	/**
	 * The setting attribute name, and the array key of the author filter type.
	 */
	const AUTHORS_TYPE__SETTING_NAME = 'setting_type';

	/**
	 * The setting attribute name, and the array key of the ids selected. The
	 * ids selected are a string separated by ';'.
	 */
	const AUTHORS_IDS__SETTING_NAME = 'authors';

	/**
	 * Do not filter by authors type.
	 */
	const AUTHORS_TYPE__DISABLED = 'DISABLED';

	/**
	 * Filter by including authors.
	 */
	const AUTHORS_TYPE__INCLUDE = 'IN';

	/**
	 * Filter by excluding authors.
	 */
	const AUTHORS_TYPE__EXCLUDE = 'OUT';

	/**
	 * Filter by same author as the post.
	 */
	const AUTHORS_TYPE__SAME = 'SAME';

	public static function init() {
		// Do nothing.
	}

	public static function get_setting_name() {
		return 'author_settings';
	}

	public static function get_default_setting() {
		return array(
			self::AUTHORS_TYPE__SETTING_NAME => self::AUTHORS_TYPE__DISABLED,
			self::AUTHORS_IDS__SETTING_NAME  => '',
		);
	}

	public static function sanitize_setting( $settings ) {
		if ( ! isset( $settings[ self::AUTHORS_TYPE__SETTING_NAME ] ) ) {
			return self::get_default_setting();
		}

		$authors_type    = $settings[ self::AUTHORS_TYPE__SETTING_NAME ];
		$available_types = array( self::AUTHORS_TYPE__DISABLED, self::AUTHORS_TYPE__INCLUDE, self::AUTHORS_TYPE__EXCLUDE, self::AUTHORS_TYPE__SAME );
		if ( ! in_array( $authors_type, $available_types, true ) ) {
			return self::get_default_setting();
		}

		if ( self::AUTHORS_TYPE__DISABLED === $authors_type ) {
			return self::get_default_setting();
		}

		$sanitized_setting = array(
			self::AUTHORS_TYPE__SETTING_NAME => $settings[ self::AUTHORS_TYPE__SETTING_NAME ],
			self::AUTHORS_IDS__SETTING_NAME  => '',
		);
		if ( self::AUTHORS_TYPE__SAME === $authors_type ) {
			return $sanitized_setting;
		}

		$authors_ids = explode( ';', $settings[ self::AUTHORS_IDS__SETTING_NAME ] );
		$authors_ids = Simple_Utils::get_valid_wp_ids( $authors_ids );

		$sanitized_authors_ids = array();
		foreach ( $authors_ids as $author_id ) {
			$author = get_userdata( (int) $author_id );
			if ( false !== $author ) {
				array_push( $sanitized_authors_ids, $author_id );
			}
		}
		$sanitized_authors_ids = implode( ';', $sanitized_authors_ids );

		$sanitized_setting[ self::AUTHORS_IDS__SETTING_NAME ] = $sanitized_authors_ids;

		return $sanitized_setting;
	}

	/**
	 * Create and insert the new arguments for the WP_Query.
	 *
	 * The previous query arguments will be modified such that will also contain
	 * the new settings, and will return the new query arguments to be passed
	 * into WP_Query class.
	 *
	 * @throws \RuntimeException If a setting cannot implement something.
	 *
	 * @param array $previous_query_args The query arguments before being modified.
	 * @param array $query_settings All query settings, these settings are sanitized.
	 * @return array The new arguments modified.
	 */
	public static function add_query_arg( $previous_query_args, $query_settings ) {
		$settings     = $query_settings[ self::get_setting_name() ];
		$authors_type = $settings[ self::AUTHORS_TYPE__SETTING_NAME ];

		if ( self::AUTHORS_TYPE__DISABLED === $authors_type ) {
			return $previous_query_args;
		}

		if ( self::AUTHORS_TYPE__SAME === $authors_type ) {
			$global_post = Query_Generator::get_global_post();
			if ( ( ! $global_post ) || ( ! is_singular() ) ) {
				throw new RuntimeException( 'Author cannot be retrieved in a non single page.' );
			}
			$author_id = get_the_author_meta( 'ID', $global_post->post_author );

			$previous_query_args['author__in'] = array( $author_id );
			return $previous_query_args;
		}

		$authors_ids = explode( ';', $settings[ self::AUTHORS_IDS__SETTING_NAME ] );
		$authors_ids = Simple_Utils::get_valid_wp_ids( $authors_ids );

		if ( empty( $authors_ids ) ) {
			return $previous_query_args;
		}

		if ( self::AUTHORS_TYPE__INCLUDE === $authors_type ) {
			$previous_query_args['author__in'] = $authors_ids;
		} elseif ( self::AUTHORS_TYPE__EXCLUDE === $authors_type ) {
			$previous_query_args['author__not_in'] = $authors_ids;
		}

		return $previous_query_args;
	}
}
