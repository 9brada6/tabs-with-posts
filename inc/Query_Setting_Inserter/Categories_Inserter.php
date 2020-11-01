<?php
/**
 * File that contains the class with the same name.
 *
 * @phpcs:disable Squiz.Commenting.FunctionComment.Missing
 */

namespace TWRP\Query_Setting_Inserter;

use TWRP\Query_Setting\Categories;
use TWRP\Utils;

/**
 * Class that adds the needed settings to a WP query array args.
 */
class Categories_Inserter implements Query_Setting_Inserter {

	public function add_query_arg( $previous_query_args, $query_settings ) {
		$settings = $query_settings[ Categories::get_setting_name() ];

		if ( 'NA' === $settings[ Categories::CATEGORIES_TYPE__SETTING_KEY ] ) {
			return $previous_query_args;
		}

		if ( empty( $settings[ Categories::CATEGORIES_IDS__SETTING_KEY ] ) ) {
			return $previous_query_args;
		}
		$cat_ids = explode( ';', $settings[ Categories::CATEGORIES_IDS__SETTING_KEY ] );
		$cat_ids = Utils::get_valid_wp_ids( $cat_ids );

		if ( '0' === $settings[ Categories::INCLUDE_CHILDREN__SETTING_KEY ] ) {
			// Do not include children.
			// category__in (array) – use category id.
			// category__not_in (array) – use category id.
			if ( 'IN' === $settings[ Categories::CATEGORIES_TYPE__SETTING_KEY ] ) {
				if ( 'OR' === $settings[ Categories::RELATION__SETTING_KEY ] ) {
					$previous_query_args['category__in'] = $cat_ids;
				} else {
					$previous_query_args['category__and'] = $cat_ids;
				}
			} else { // OUT.
				$previous_query_args['category__out'] = $cat_ids;
			}
		} else {
			// cat (int) – use category id.
			if ( 'IN' === $settings[ Categories::CATEGORIES_TYPE__SETTING_KEY ] ) {
				if ( 'OR' === $settings[ Categories::RELATION__SETTING_KEY ] ) {
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
