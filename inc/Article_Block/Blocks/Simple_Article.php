<?php

namespace TWRP\Article_Block\Blocks;

use TWRP\Article_Block\Article_Block;

use TWRP\Article_Block\Component\Artblock_Component;

use TWRP\Article_Block\Settings\Display_Author_Setting;
use TWRP\Article_Block\Settings\Display_Main_Category_Setting;
use TWRP\Article_Block\Settings\Display_Comments_Setting;
use TWRP\Article_Block\Settings\Display_Date_Setting;
use TWRP\Article_Block\Settings\Display_Post_Thumbnail_Setting;
use TWRP\Article_Block\Settings\Display_Views_Setting;

/**
 * The class that display a post in a style, that is named "Simple", because
 * nothing here is complicated.
 *
 * Consists of a title, a thumbnail, and the meta of the post displayed in order.
 */
class Simple_Article extends Article_Block {

	/**
	 * Redeclare to make Phan not trigger an error.
	 *
	 * @var array
	 */
	protected $settings;

	public static function get_class_order_among_siblings() {
		return 50;
	}

	public static function get_id() {
		return 'simple_style';
	}

	public static function get_name() {
		return 'Simple Style';
	}

	public static function get_file_name() {
		return 'simple-style.php';
	}

	public function get_components() {
		$components = array();
		$css_prefix = $this->get_body_css_specificity_selector() . ' .' . $this->get_block_class() . ' ';

		#region -- Title Component

		$current_settings     = ( isset( $this->settings['title'] ) && is_array( $this->settings['title'] ) ) ? $this->settings['title'] : array();
		$css_components       = array(
			$css_prefix . '.twrp-ss__title' => Artblock_Component::TEXT_SETTINGS,
			$css_prefix . '.twrp-ss__link-expanded:hover .twrp-ss__title' => array( Artblock_Component::HOVER_COLOR_SETTING ),
		);
		$component            = new Artblock_Component( 'title', _x( 'Title', 'backend', 'twrp' ), $current_settings, $css_components );
		$components ['title'] = $component;

		#endregion -- Title Component

		#region -- Author Component

		$css_components        = array(
			$css_prefix . '.twrp-ss__author' => array( Artblock_Component::FLEX_ORDER_SETTING, Artblock_Component::TEXT_SETTINGS ),
			$css_prefix . '.twrp-ss__link-expanded:hover + .twrp-ss__meta-wrapper .twrp-ss__author' => array( Artblock_Component::HOVER_COLOR_SETTING ),
		);
		$current_settings      = ( isset( $this->settings['author'] ) && is_array( $this->settings['author'] ) ) ? $this->settings['author'] : array();
		$component             = new Artblock_Component( 'author', _x( 'Author', 'backend', 'twrp' ), $current_settings, $css_components );
		$components ['author'] = $component;

		#endregion -- Author Component

		#region -- Date Component

		$current_settings    = ( isset( $this->settings['date'] ) && is_array( $this->settings['date'] ) ) ? $this->settings['date'] : array();
		$css_components      = array(
			$css_prefix . '.twrp-ss__date' => array( Artblock_Component::FLEX_ORDER_SETTING, Artblock_Component::TEXT_SETTINGS ),
			$css_prefix . '.twrp-ss__link-expanded:hover + .twrp-ss__meta-wrapper .twrp-ss__date' => array( Artblock_Component::HOVER_COLOR_SETTING ),
		);
		$component           = new Artblock_Component( 'date', _x( 'Date', 'backend', 'twrp' ), $current_settings, $css_components );
		$components ['date'] = $component;

		#endregion -- Date Component

		#region -- Views Component

		$current_settings     = ( isset( $this->settings['views'] ) && is_array( $this->settings['views'] ) ) ? $this->settings['views'] : array();
		$css_components       = array(
			$css_prefix . '.twrp-ss__views' => array( Artblock_Component::FLEX_ORDER_SETTING, Artblock_Component::TEXT_SETTINGS ),
			$css_prefix . '.twrp-ss__link-expanded:hover + .twrp-ss__meta-wrapper .twrp-ss__views' => array( Artblock_Component::HOVER_COLOR_SETTING ),
		);
		$component            = new Artblock_Component( 'views', _x( 'Views', 'backend', 'twrp' ), $current_settings, $css_components );
		$components ['views'] = $component;

		#endregion -- Views Component

		#region -- Comments Component

		$current_settings        = ( isset( $this->settings['comments'] ) && is_array( $this->settings['comments'] ) ) ? $this->settings['comments'] : array();
		$css_components          = array(
			$css_prefix . '.twrp-ss__comments' => array( Artblock_Component::FLEX_ORDER_SETTING, Artblock_Component::TEXT_SETTINGS ),
			$css_prefix . '.twrp-ss__link-expanded:hover + .twrp-ss__meta-wrapper .twrp-ss__comments' => array( Artblock_Component::HOVER_COLOR_SETTING ),
		);
		$component               = new Artblock_Component( 'comments', _x( 'Comments', 'backend', 'twrp' ), $current_settings, $css_components );
		$components ['comments'] = $component;

		#endregion -- Comments Component

		#region -- Category Component

		$current_settings        = ( isset( $this->settings['category'] ) && is_array( $this->settings['category'] ) ) ? $this->settings['category'] : array();
		$css_components          = array(
			$css_prefix . '.twrp-ss__category' => array( Artblock_Component::FLEX_ORDER_SETTING, Artblock_Component::TEXT_SETTINGS ),
			$css_prefix . '.twrp-ss__link-expanded:hover + .twrp-ss__meta-wrapper .twrp-ss__category' => array( Artblock_Component::HOVER_COLOR_SETTING ),
		);
		$component               = new Artblock_Component( 'category', _x( 'Category', 'backend', 'twrp' ), $current_settings, $css_components );
		$components ['category'] = $component;

		#endregion -- Category Component

		return $components;
	}

	public function get_artblock_settings() {
		$query_settings = array();

		$setting           = new Display_Post_Thumbnail_Setting( $this->widget_id, $this->query_id, $this->settings );
		$query_settings [] = $setting;

		$setting           = new Display_Author_Setting( $this->widget_id, $this->query_id, $this->settings );
		$query_settings [] = $setting;

		$setting           = new Display_Date_Setting( $this->widget_id, $this->query_id, $this->settings );
		$query_settings [] = $setting;

		$setting           = new Display_Views_Setting( $this->widget_id, $this->query_id, $this->settings );
		$query_settings [] = $setting;

		$setting           = new Display_Comments_Setting( $this->widget_id, $this->query_id, $this->settings );
		$query_settings [] = $setting;

		$setting           = new Display_Main_Category_Setting( $this->widget_id, $this->query_id, $this->settings );
		$query_settings [] = $setting;

		return $query_settings;
	}
}
