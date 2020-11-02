<?php
/**
 * File that contains the class with the same name.
 */

namespace TWRP;

use TWRP\Query_Generator\Query_Setting\Query_Setting;
use TWRP\Admin\Query_Settings_Display\Query_Setting_Display;

/**
 * Class that is a collection of static methods, that can be used everywhere
 * to retrieve a list of classes of a specific type. Like classes that extends
 * another class, or all the classes that implements a certain interface.
 *
 * If the class order is important, some of the methods will retrieve the
 * classes ordered by a class constant, named CLASS_ORDER.
 */
class Class_Retriever_Utils {

	/**
	 * Get all the Article_Block objects.
	 *
	 * @return array<string,string>
	 * @psalm-return array<string,class-string<Article_Block>>
	 */
	public static function get_all_article_block_names() {
		$class_names = static::get_all_child_classes( 'TWRP\\Article_Block\\Article_Block' );
		$class_names = self::order_class_name( $class_names );

		return $class_names;
	}

	/**
	 * Get all the Query_Setting objects.
	 *
	 * @return array<Query_Setting>
	 */
	public static function get_all_query_settings_objects() {
		$class_names = static::get_all_child_classes( 'TWRP\\Query_Generator\\Query_Setting\\Query_Setting' );
		$class_names = self::order_class_name( $class_names );

		foreach ( $class_names as $key => $class_name ) {
			$class_names[ $key ] = new $class_name();
		}

		return $class_names;
	}

	/**
	 * Get all the Query_Setting_Display objects.
	 *
	 * @return array<Query_Setting_Display>
	 */
	public static function get_all_display_query_settings_objects() {
		$class_names = static::get_all_child_classes( 'TWRP\\Admin\\Query_Settings_Display\\Query_Setting_Display' );
		$class_names = self::order_class_name( $class_names );

		foreach ( $class_names as $key => $class_name ) {
			$class_names[ $key ] = new $class_name();
		}

		return $class_names;
	}

	/**
	 * Get all classes that implements/extends a certain interface/class.
	 *
	 * @param string $parent_class
	 * @return array
	 *
	 * @psalm-return array<class-string>
	 */
	protected static function get_all_child_classes( $parent_class ) {
		$children_classes = array();
		$declared_classes = get_declared_classes();

		foreach ( $declared_classes as $declared_class ) {
			if ( is_subclass_of( $declared_class, $parent_class ) ) {
				array_push( $children_classes, $declared_class );
			}
		}

		return $children_classes;
	}

	/**
	 * Order class name by CLASS_ORDER constant.
	 *
	 * @param array<string> $class_names
	 * @return array
	 */
	private static function order_class_name( $class_names ) {
		usort( $class_names, array( get_called_class(), 'sort_classes_algorithm' ) );
		return $class_names;
	}

	/**
	 * Function to be passed as an algorithm to usort function, to order class
	 * by CLASS_ORDER constant if defined.
	 *
	 * @param string $first_class_name
	 * @param string $second_class_name
	 * @return int
	 */
	private static function sort_classes_algorithm( $first_class_name, $second_class_name ) {
		if ( ! defined( $first_class_name . '::CLASS_ORDER' ) ) {
			return 0;
		}

		if ( ! defined( $second_class_name . '::CLASS_ORDER' ) ) {
			return 0;
		}

		$first_class_order  = $first_class_name::CLASS_ORDER;
		$second_class_order = $second_class_name::CLASS_ORDER;

		if ( $first_class_order === $second_class_order ) {
			return 0;
		}

		return ( $first_class_order < $second_class_order ) ? -1 : 1;
	}

}
