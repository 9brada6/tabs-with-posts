<?php
/**
 * Contains the class that will filter articles via the comments.
 */

namespace TWRP\Query_Generator\Query_Setting;

/**
 * Creates the possibility to filter a query based on post comments.
 */
class Post_Comments extends Query_Setting {

	const CLASS_ORDER = 60;

	/**
	 * Name of the form input field, that holds the number of comments to
	 * compare.
	 */
	const COMMENTS_VALUE_NAME = 'value';

	/**
	 * Name of the form select field, that selects the comparator.
	 */
	const COMMENTS_COMPARATOR_NAME = 'comparator';

	public static function init() {
		// Do nothing.
	}

	public static function get_setting_name() {
		return 'post_comments';
	}

	public static function get_default_setting() {
		return array(
			self::COMMENTS_COMPARATOR_NAME => 'NA',
			self::COMMENTS_VALUE_NAME      => '',
		);
	}

	public static function sanitize_setting( $setting ) {
		if ( ! is_array( $setting ) ) {
			return self::get_default_setting();
		}

		if ( ! isset( $setting[ self::COMMENTS_VALUE_NAME ], $setting[ self::COMMENTS_COMPARATOR_NAME ] ) ) {
			return self::get_default_setting();
		}

		if ( ! in_array( $setting[ self::COMMENTS_COMPARATOR_NAME ], array( 'BE', 'LE', 'E', 'NE' ), true ) ) {
			return self::get_default_setting();
		}

		if ( ! is_numeric( $setting[ self::COMMENTS_VALUE_NAME ] ) ) {
			return self::get_default_setting();
		}

		$sanitized_setting = array(
			self::COMMENTS_COMPARATOR_NAME => $setting[ self::COMMENTS_COMPARATOR_NAME ],
			self::COMMENTS_VALUE_NAME      => ( (int) $setting[ self::COMMENTS_VALUE_NAME ] ),
		);

		return $sanitized_setting;
	}

	public static function add_query_arg( $previous_query_args, $query_settings ) {
		if ( ! isset( $query_settings[ self::get_setting_name() ] ) ) {
			return $previous_query_args;
		}

		$settings = $query_settings[ self::get_setting_name() ];

		if ( ! is_numeric( $settings[ self::COMMENTS_VALUE_NAME ] ) ) {
			return $previous_query_args;
		}

		if ( 'NA' === $settings[ self::COMMENTS_VALUE_NAME ] ) {
			return $previous_query_args;
		}

		$comment_count = array(
			'compare' => self::get_comparator_from_name( $settings[ self::COMMENTS_COMPARATOR_NAME ] ),
			'value'   => $settings[ self::COMMENTS_VALUE_NAME ],
		);

		$previous_query_args['comment_count'] = $comment_count;
		return $previous_query_args;
	}

	/**
	 * Get the comparator like in mathematics from a comparator acronym.
	 *
	 * @param string $name
	 * @return string The comparator;
	 */
	public static function get_comparator_from_name( $name ) {
		switch ( $name ) {
			case 'BE':
				return '>=';
			case 'LE':
				return '<=';
			case 'E':
				return '=';
			case 'NE':
				return '!=';
		}

		return '';
	}
}