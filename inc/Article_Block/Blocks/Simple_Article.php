<?php

namespace TWRP\Article_Block\Blocks;

use TWRP\Article_Block\Article_Block;

use TWRP\Article_Block\Component\Artblock_Component;

use TWRP\Article_Block\Settings\Display_Author_Setting;
use TWRP\Article_Block\Settings\Display_Comments_Setting;
use TWRP\Article_Block\Settings\Display_Date_Setting;
use TWRP\Article_Block\Settings\Display_Post_Thumbnail_Setting;
use TWRP\Article_Block\Settings\Horizontal_Padding_Setting;

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
		$components  = array();
		$block_class = '.' . $this->get_block_class();

		#region -- Title Component

		$title_component_settings = ( isset( $this->settings['title'] ) && is_array( $this->settings['title'] ) ) ? $this->settings['title'] : array();
		$title_css_components     = array(
			$block_class . ' .twrp-ss__title' => Artblock_Component::TEXT_SETTINGS,
			$block_class . ' .twrp-ss__link-expanded:hover .twrp-ss__title' => array( Artblock_Component::HOVER_COLOR_SETTING ),
		);
		$title_component          = new Artblock_Component( $this->widget_id, $this->query_id, 'title', _x( 'Title', 'backend', 'twrp' ), $title_component_settings, $title_css_components );
		$components ['title']     = $title_component;

		#endregion -- Title Component

		#region -- Date Component

		$date_component_current_settings = ( isset( $this->settings['date'] ) && is_array( $this->settings['date'] ) ) ? $this->settings['date'] : array();

		$date_css_components = array(
			$block_class . ' .twrp-ss__date' => Artblock_Component::TEXT_SETTINGS,
			$block_class . ' .twrp-ss__link-expanded:hover + .twrp-ss__meta-wrapper .twrp-ss__date' => array( Artblock_Component::HOVER_COLOR_SETTING ),
		);

		$date_component      = new Artblock_Component( $this->widget_id, $this->query_id, 'date', _x( 'Date', 'backend', 'twrp' ), $date_component_current_settings, $date_css_components );
		$components ['date'] = $date_component;

		#endregion -- Date Component

		#region -- Author Component

		$author_css_components = array(
			$block_class . ' .twrp-ss__author' => Artblock_Component::TEXT_SETTINGS,
			$block_class . ' .twrp-ss__link-expanded:hover + .twrp-ss__meta-wrapper .twrp-ss__author' => array( Artblock_Component::HOVER_COLOR_SETTING ),
		);

		$author_component_current_settings = ( isset( $this->settings['author'] ) && is_array( $this->settings['author'] ) ) ? $this->settings['author'] : array();
		$author_component                  = new Artblock_Component( $this->widget_id, $this->query_id, 'author', _x( 'Author', 'backend', 'twrp' ), $author_component_current_settings, $author_css_components );
		$components ['author']             = $author_component;

		#endregion -- Author Component

		return $components;
	}

	public function get_artblock_settings() {
		$query_settings = array();

		$horizontal_padding_setting = new Horizontal_Padding_Setting( $this->widget_id, $this->query_id, $this->settings );
		$query_settings []          = $horizontal_padding_setting;

		$author_setting    = new Display_Author_Setting( $this->widget_id, $this->query_id, $this->settings );
		$query_settings [] = $author_setting;

		$date_setting      = new Display_Date_Setting( $this->widget_id, $this->query_id, $this->settings );
		$query_settings [] = $date_setting;

		$post_thumbnail_setting = new Display_Post_Thumbnail_Setting( $this->widget_id, $this->query_id, $this->settings );
		$query_settings []      = $post_thumbnail_setting;

		$comments_setting  = new Display_Comments_Setting( $this->widget_id, $this->query_id, $this->settings );
		$query_settings [] = $comments_setting;

		return $query_settings;
	}
}
