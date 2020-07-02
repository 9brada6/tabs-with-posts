<?php

namespace TWRP;

use TWRP\Article_Block\Article_Block;

class Article_Blocks_Manager {

	protected static $query_args_settings = array();

	protected static $style_classes = array();

	public static function add_style_class( $setting_class_name ) {
		$style_class                                    = new $setting_class_name();
		self::$style_classes [ $style_class->get_id() ] = $style_class;
	}

	public static function get_style_classes() {
		return self::$style_classes;
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
		if ( ! isset( self::$style_classes[ $style_id ] ) ) {
			throw new \RuntimeException( $style_id . ' is not a style id.' );
		}

		return self::$style_classes[ $style_id ];
	}

	public static function article_block_id_exist( $artblock_id ) {
		$classes = self::$style_classes;
		if ( isset( $classes[ $artblock_id ] ) ) {
			return true;
		}

		return false;
	}

}
