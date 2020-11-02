<?php
/**
 * File containing the class with the same name.
 *
 * @todo: Remove the margin-bottom of categories classes and move to setting section classes.
 *
 * phpcs:disable Squiz.Commenting.FunctionComment.Missing -- Inherited from interface.
 */

namespace TWRP\Query_Setting;

use TWRP\Simple_Utils;

/**
 * Class that will filter posts via categories.
 */
class Categories extends Query_Setting {

	const CLASS_ORDER = 60;

	const CATEGORIES_TYPE__SETTING_KEY  = 'setting_type';
	const INCLUDE_CHILDREN__SETTING_KEY = 'include_children';
	const RELATION__SETTING_KEY         = 'relation';

	const CATEGORIES_HIDE_EMPTY = false;

	/**
	 * Input name and array key of the option that remembers the selected
	 * categories.
	 */
	const CATEGORIES_IDS__SETTING_KEY = 'cat_ids';

	public static function init() {
		// Do nothing.
	}

	public static function get_setting_name() {
		return 'cat_settings';
	}

	public static function get_default_setting() {
		return array(
			self::CATEGORIES_TYPE__SETTING_KEY  => 'NA',
			self::INCLUDE_CHILDREN__SETTING_KEY => '1',
			self::RELATION__SETTING_KEY         => 'OR',
			self::CATEGORIES_IDS__SETTING_KEY   => '',
		);
	}

	public static function sanitize_setting( $setting ) {
		$sanitized_setting = array();
		if ( ! is_array( $setting ) ) {
			return self::get_default_setting();
		}

		if ( isset( $setting[ self::CATEGORIES_TYPE__SETTING_KEY ] ) ) {
			$possible_cat_types = array( 'OUT', 'IN' );
			$has_valid_setting  = in_array( $setting[ self::CATEGORIES_TYPE__SETTING_KEY ], $possible_cat_types, true );
			if ( ! $has_valid_setting ) {
				return self::get_default_setting();
			}
		} else {
			return self::get_default_setting();
		}
		$sanitized_setting[ self::CATEGORIES_TYPE__SETTING_KEY ] = $setting[ self::CATEGORIES_TYPE__SETTING_KEY ];

		// Sanitizing the option to include children of all categories selected.
		if ( ! empty( $setting[ self::INCLUDE_CHILDREN__SETTING_KEY ] ) ) {
			$sanitized_setting[ self::INCLUDE_CHILDREN__SETTING_KEY ] = '1';
		} else {
			$sanitized_setting[ self::INCLUDE_CHILDREN__SETTING_KEY ] = '0';
		}

		// Sanitizing the category relation.
		$possible_cat_relation = array( 'OR', 'AND' );
		$has_valid_setting     = in_array( $setting[ self::RELATION__SETTING_KEY ], $possible_cat_relation, true );
		if ( ! $has_valid_setting || 'OUT' === $setting[ self::CATEGORIES_TYPE__SETTING_KEY ] ) {
			$setting[ self::RELATION__SETTING_KEY ] = 'OR';
		}
		$sanitized_setting[ self::RELATION__SETTING_KEY ] = $setting[ self::RELATION__SETTING_KEY ];

		// Checking to see if the categories are a string.
		if ( ! is_string( $setting[ self::CATEGORIES_IDS__SETTING_KEY ] ) ) {
			return self::get_default_setting();
		}

		// Explode the categories into an array of ids and verify them.
		$categories = explode( ';', $setting[ self::CATEGORIES_IDS__SETTING_KEY ] );
		$categories = Simple_Utils::get_valid_wp_ids( $categories );
		$categories = array_values( $categories );

		// Checking to see if the array exist.
		if ( empty( $categories ) ) {
			return self::get_default_setting();
		}

		$available_categories     = get_categories(
			array(
				'include'    => $categories,
				// Changing hide_empty here will also need be to
				'hide_empty' => self::CATEGORIES_HIDE_EMPTY,
			)
		);
		$available_categories_ids = wp_list_pluck( $available_categories, 'term_id' );

		foreach ( $categories as $key => $category_id ) {
			if ( ! in_array( $category_id, $available_categories_ids, true ) ) {
				unset( $categories[ $key ] );
			}
		}

		// Checking to see if the array exist.
		if ( empty( $categories ) ) {
			return self::get_default_setting();
		}
		$categories = array_values( $categories );

		$categories = implode( ';', $categories );
		$sanitized_setting[ self::CATEGORIES_IDS__SETTING_KEY ] = $categories;

		return $sanitized_setting;
	}

	public static function add_query_arg( $previous_query_args, $query_settings ) {
		$settings = $query_settings[ self::get_setting_name() ];

		if ( 'NA' === $settings[ self::CATEGORIES_TYPE__SETTING_KEY ] ) {
			return $previous_query_args;
		}

		if ( empty( $settings[ self::CATEGORIES_IDS__SETTING_KEY ] ) ) {
			return $previous_query_args;
		}
		$cat_ids = explode( ';', $settings[ self::CATEGORIES_IDS__SETTING_KEY ] );
		$cat_ids = Simple_Utils::get_valid_wp_ids( $cat_ids );

		if ( '0' === $settings[ self::INCLUDE_CHILDREN__SETTING_KEY ] ) {
			// Do not include children.
			// category__in (array) – use category id.
			// category__not_in (array) – use category id.
			if ( 'IN' === $settings[ self::CATEGORIES_TYPE__SETTING_KEY ] ) {
				if ( 'OR' === $settings[ self::RELATION__SETTING_KEY ] ) {
					$previous_query_args['category__in'] = $cat_ids;
				} else {
					$previous_query_args['category__and'] = $cat_ids;
				}
			} else { // OUT.
				$previous_query_args['category__out'] = $cat_ids;
			}
		} else {
			// cat (int) – use category id.
			if ( 'IN' === $settings[ self::CATEGORIES_TYPE__SETTING_KEY ] ) {
				if ( 'OR' === $settings[ self::RELATION__SETTING_KEY ] ) {
					$cat_ids                    = implode( ',', $cat_ids );
					$previous_query_args['cat'] = $cat_ids;
				} else {
					$categories = get_categories( array( 'include' => $cat_ids ) );
					$cat_slugs  = array();
					foreach ( $categories as $category ) {
						array_push( $cat_slugs, $category->slug );
					}
					$cat_slugs                            = implode( '+', $cat_slugs );
					$previous_query_args['category_name'] = $cat_slugs;
				}
			} else { // OUT.
				foreach ( $cat_ids as &$id ) {
					$id = '-' . $id;
				}
				$cat_ids                    = implode( ',', $cat_ids );
				$previous_query_args['cat'] = $cat_ids;
			}
		}

		return $previous_query_args;
	}
}
