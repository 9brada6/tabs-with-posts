<?php

namespace TWRP;

use TWRP\Article_Block\Article_Block;

class Article_Blocks_Manager {

	protected static $query_args_settings = array();

	protected static $style_classes_names   = array();
	protected static $artblock_class_titles = array();

	public static function add_style_class( $setting_class_name ) {
		$class_id    = $setting_class_name::get_id();
		$class_title = $setting_class_name::get_name();

		self::$style_classes_names [ $class_id ]   = $setting_class_name;
		self::$artblock_class_titles [ $class_id ] = $class_title;
	}

	// todo: delete.
	public static function get_style_classes() {
		return self::$style_classes_names;
	}

	/**
	 * Get an array, with the artblocks id's being the keys, and the artblock fully
	 * qualified class name being the value of the array.
	 *
	 * @return array<string,string>
	 */
	public static function get_artblocks_class_names() {
		return self::$style_classes_names;
	}

	/**
	 * Get an array, with the artblocks id's being the keys, and the artblock
	 * name being the value of the array.
	 *
	 * @return array<string,string>
	 */
	public static function get_artblocks_names() {
		return self::$artblock_class_titles;
	}

	/**
	 * Get the style class based on the style id.
	 *
	 * @param string $style_id The style id to get the class.
	 *
	 * @throws \RuntimeException If the $name does not correspond with a style id.
	 *
	 * @return Article_Block The class retrieved by name.
	 */
	public static function get_style_class_by_name( $style_id ) {
		if ( ! isset( self::$style_classes_names[ $style_id ] ) ) {
			throw new \RuntimeException( $style_id . ' is not a style id.' );
		}

		return self::$style_classes_names[ $style_id ];
	}

	/**
	 * Factory function to construct if a name exist.
	 *
	 * @throws \RuntimeException If class is not found.
	 *
	 * @param string $name_or_id For the name of the class, can be either just
	 *                           the class name, or fully qualified name.
	 * @param int|string $widget_id A numerical parameter.
	 * @param int|string $query_id A numerical parameter.
	 * @param array $settings
	 * @return Article_Block
	 */
	public static function construct_class_by_name_or_id( $name_or_id, $widget_id, $query_id, $settings ) {
		$artblock_class_names = self::get_artblocks_class_names();
		if ( array_key_exists( $name_or_id, $artblock_class_names ) ) {
			$name = $artblock_class_names[ $name_or_id ];
		} else {
			$name = $name_or_id;
		}

		if ( strpos( $name, '\\' ) === false ) {
			$fq_class_name = 'TWRP\\Article_Block\\' . $name;
		} else {
			$fq_class_name = $name;
		}

		if ( ! class_exists( $fq_class_name ) ) {
			throw new \RuntimeException( 'Could not find class ' . $fq_class_name );
		} else {
			return new $fq_class_name( $widget_id, $query_id, $settings );
		}
	}

	public static function article_block_id_exist( $artblock_id ) {
		$classes = self::$style_classes_names;
		if ( isset( $classes[ $artblock_id ] ) ) {
			return true;
		}

		return false;
	}

}
