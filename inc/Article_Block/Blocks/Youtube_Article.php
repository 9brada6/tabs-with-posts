<?php

namespace TWRP\Article_Block\Blocks;

use TWRP\Article_Block\Article_Block;

use TWRP\Article_Block\Settings\Display_Meta;
use TWRP\Article_Block\Settings\Display_Post_Thumbnail_Setting;

/**
 * The class that display a post in a style, that is named "Youtube", because
 * is similar to that style.
 */
class Youtube_Article extends Article_Block {

	/**
	 * Redeclare to make Phan not trigger an error.
	 *
	 * @var array
	 */
	protected $settings;

	public static function get_class_order_among_siblings() {
		return 70;
	}

	public static function get_id() {
		return 'youtube_style';
	}

	public static function get_name() {
		return _x( 'Youtube Style', 'backend', 'twrp' );
	}

	public static function get_file_name() {
		return 'youtube-style.php';
	}

	public function get_components() {
		$components = array();
		return $components;
	}

	public function get_artblock_settings() {
		$query_settings = array();

		$setting           = new Display_Post_Thumbnail_Setting( $this->widget_id, $this->query_id, $this->settings );
		$query_settings [] = $setting;

		$setting           = new Display_Meta(
			$this->widget_id,
			$this->query_id,
			$this->settings,
			array(
				'instance' => 1,
				'meta'     => 'all',
			)
		);
		$query_settings [] = $setting;

		$setting           = new Display_Meta(
			$this->widget_id,
			$this->query_id,
			$this->settings,
			array(
				'instance' => 2,
				'meta'     => 'all',
			)
		);
		$query_settings [] = $setting;

		$setting           = new Display_Meta(
			$this->widget_id,
			$this->query_id,
			$this->settings,
			array(
				'instance' => 3,
				'meta'     => 'all',
			)
		);
		$query_settings [] = $setting;

		$setting           = new Display_Meta(
			$this->widget_id,
			$this->query_id,
			$this->settings,
			array(
				'instance' => 4,
				'meta'     => 'all',
			)
		);
		$query_settings [] = $setting;

		return $query_settings;
	}
}
