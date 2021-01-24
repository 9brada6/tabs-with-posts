<?php

namespace TWRP\Article_Block\Blocks;

use TWRP\Article_Block\Article_Block;

class Modern_Article extends Article_Block {

	public static function get_class_order_among_siblings() {
		return 100;
	}

	protected $widget_id;
	protected $query_id;
	protected $settings;

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
		return '';
	}

	public function get_artblock_settings() {
		return array();
	}

}
