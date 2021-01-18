<?php
/**
 * File that contains the class with the same name.
 */

namespace TWRP\Utils;

use TWRP\Query_Generator\Query_Setting\Query_Setting;
use TWRP\Admin\Tabs\Query_Options\Query_Setting_Display;
use TWRP\Plugins\Known_Plugins\Post_Views_Plugin;

/**
 * Class that is a collection of static methods, that can be used everywhere
 * to retrieve a list of classes of a specific type. Like classes that extends
 * another class, or all the classes that implements a certain interface.
 *
 * If the class order is important, the class parents that use the trait
 * Class_Children_Order_Trait will be retrieved in order of what int they return.
 */
class Class_Retriever_Utils {

	/**
	 * Get a class that implements a Tab_Style by the Id of the class.
	 *
	 * @param string $id The id of the tab style.
	 * @return string|null
	 *
	 * @psalm-return null|class-string<\TWRP\Tabs_Creator\Tabs_Styles\Tab_Style>
	 * @psalm-suppress MoreSpecificReturnType
	 * @psalm-suppress LessSpecificReturnStatement
	 */
	public static function get_tab_style_class_name_by_id( $id ) {
		$class_names        = static::get_all_tab_style_class_names();
		$founded_class_name = null;

		foreach ( $class_names as $class_name ) {
			if ( defined( $class_name . '::TAB_ID' ) && $class_name::TAB_ID === $id ) {
				$founded_class_name = $class_name;
				break;
			}
		}

		return $founded_class_name;
	}

	/**
	 * Get all classes that extends/implements the Tab_Style class.
	 *
	 * @return array
	 *
	 * @psalm-return array<class-string<\TWRP\Tabs_Creator\Tabs_Styles\Tab_Style>>
	 * @psalm-suppress MoreSpecificReturnType
	 * @psalm-suppress LessSpecificReturnStatement
	 */
	public static function get_all_tab_style_class_names() {
		$class_names = static::get_all_child_classes( 'TWRP\\Tabs_Creator\\Tabs_Styles\\Tab_Style' );
		return $class_names;
	}

	/**
	 * Get all the Article_Block objects.
	 *
	 * @return array<string,string>
	 * @psalm-return array<string,class-string<\TWRP\Article_Block\Article_Block>>
	 * @psalm-suppress MoreSpecificReturnType
	 * @psalm-suppress LessSpecificReturnStatement
	 */
	public static function get_all_article_block_names() {
		$class_names = static::get_all_child_classes( 'TWRP\\Article_Block\\Article_Block' );

		return $class_names;
	}

	/**
	 * Get all the Query_Setting objects.
	 *
	 * @return array<Query_Setting>
	 */
	public static function get_all_query_settings_objects() {
		$class_names = static::get_all_child_classes( 'TWRP\\Query_Generator\\Query_Setting\\Query_Setting' );

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
		$class_names = static::get_all_child_classes( 'TWRP\\Admin\\Tabs\\Query_Options\\Query_Setting_Display' );

		foreach ( $class_names as $key => $class_name ) {
			$class_names[ $key ] = new $class_name();
		}

		return $class_names;
	}

	/**
	 * Get all classes that implements After_Setup_Theme_Init_Trait trait.
	 *
	 * @return array<string>
	 */
	public static function get_all_classes_that_uses_after_init_theme_trait() {
		$trait_classes = self::get_all_trait_classes( 'TWRP\\Utils\\Helper_Trait\\After_Setup_Theme_Init_Trait' );
		return $trait_classes;
	}

	/**
	 * Get all the Post_Views_Plugin objects.
	 *
	 * @return array<Post_Views_Plugin>
	 */
	public static function get_all_post_views_plugins_objects() {
		$class_names = static::get_all_child_classes( 'TWRP\\Plugins\\Known_Plugins\\Post_Views_Plugin' );

		foreach ( $class_names as $key => $class_name ) {
			$class_names[ $key ] = new $class_name();
		}

		return $class_names;
	}

	/**
	 * Get all classes that implements/extends a certain interface/class.
	 *
	 * If the parent class uses the trait Class_Children_Order_Trait, then the
	 * classes will be ordered by the int they return.
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

		if ( self::class_use_trait( $parent_class, 'TWRP\\Utils\\Helper_Trait\\Class_Children_Order_Trait' ) ) {
			$children_classes = self::order_class_name( $children_classes );
		}

		return $children_classes;
	}

	/**
	 * Get all classes that use a specific trait.
	 *
	 * @param string $trait_name
	 * @return array
	 *
	 * @psalm-return array<class-string>
	 */
	protected static function get_all_trait_classes( $trait_name ) {
		$trait_classes    = array();
		$declared_classes = get_declared_classes();

		foreach ( $declared_classes as $declared_class ) {
			if ( self::class_use_trait( $declared_class, $trait_name ) ) {
				array_push( $trait_classes, $declared_class );
			}
		}

		return $trait_classes;
	}

	/**
	 * Get if a class uses a specific trait
	 *
	 * @param string $class_name
	 * @param string $trait_name
	 * @return bool
	 */
	protected static function class_use_trait( $class_name, $trait_name ) {
		while ( true ) {
			$traits = class_uses( $class_name );
			if ( is_array( $traits ) && isset( $traits[ $trait_name ] ) ) {
				return true;
			}

			$class_name = get_parent_class( $class_name );
			if ( false === $class_name ) {
				break;
			}
		}

		return false;
	}

	/**
	 * Order class name by a method in the trait Class_Children_Order_Trait.
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
	 * by a method in the trait Class_Children_Order_Trait that returns an int.
	 *
	 * @param string $first_class_name
	 * @param string $second_class_name
	 * @return int
	 *
	 * @phan-suppress PhanSuspiciousValueComparison
	 */
	private static function sort_classes_algorithm( $first_class_name, $second_class_name ) {
		$first_class_order = 0;
		if ( is_callable( array( $first_class_name, 'get_class_order_among_siblings' ) ) ) {
			$first_class_order = $first_class_name::get_class_order_among_siblings();
		}

		$second_class_order = 0;
		if ( is_callable( array( $second_class_name, 'get_class_order_among_siblings' ) ) ) {
			$second_class_order = $second_class_name::get_class_order_among_siblings();
		}

		if ( $first_class_order === $second_class_order ) {
			return 0;
		}

		return ( $first_class_order < $second_class_order ) ? -1 : 1;
	}

}
