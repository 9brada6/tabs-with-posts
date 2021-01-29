<?php

namespace TWRP\Article_Block\Blocks;

use TWRP\Article_Block\Article_Block;

/**
 * The class that display a post in a style, that is named "Modern".
 *
 * The style consists of a title, a thumbnail, and the meta displayed over the
 * thumbnail, decreasing the space used, and drawing the attention to the meta
 * when viewing the image.
 *
 * @todo.
 */
class Modern_Article extends Article_Block {

	public static function get_class_order_among_siblings() {
		return 100;
	}

	public static function get_id() {
		return 'modern_style';
	}

	public static function get_name() {
		return 'Modern Style';
	}

	public static function get_file_name() {
		return 'modern-style';
	}

	public function get_components() {
		return array();
	}

	public function get_artblock_settings() {
		return array();
	}

}
