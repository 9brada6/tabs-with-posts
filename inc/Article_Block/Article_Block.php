<?php
/**
 * File that contains the abstract class of the article blocks.
 */

namespace TWRP\Article_Block;

use TWRP\Artblock_Component\Widget_Component_Settings;
use TWRP\Database\General_Options;
use TWRP\Icons\SVG_Manager;

/**
 * The abstract for an article block. By extending this class, a class can
 * be declared an article block.
 *
 * Definition: An article block is how a post can be displayed in the widget.
 * It can be displayed as a simple title, where a user can click on it(it can
 * also have some metadata like the author or the date), or it can be displayed
 * maybe as a title and alongside a thumbnail, like YouTube do. Or maybe we want
 * to display a custom WooCommerce product. The possibilities are very large.
 */
abstract class Article_Block {

	/**
	 * Holds the widget id of these article blocks.
	 *
	 * @var int
	 */
	protected $widget_id;

	/**
	 * Holds the query id of these article blocks.
	 *
	 * @var int
	 */
	protected $query_id;

	/**
	 * Holds the query settings.
	 *
	 * @var array
	 */
	protected $settings;

	/**
	 * Get the Id of the article block.
	 *
	 * This should be unique across all article blocks.
	 *
	 * @return string
	 */
	abstract public static function get_id();

	/**
	 * Get the name of the Article Block. The name should have spaces instead
	 * of "_" and should be something representative.
	 *
	 * @return string
	 */
	abstract public static function get_name();

	/**
	 * Get the file name. The name must have appended ".php" suffix.
	 *
	 * @return string
	 */
	abstract protected static function get_file_name();

	/**
	 * Called before anything else, to initialize actions and filters.
	 *
	 * Always called at 'after_setup_theme' action. Other things added here should be
	 * additionally checked, for example by admin hooks, or whether or not to be
	 * included in special pages, ...etc.
	 *
	 * @return void
	 *
	 * @phan-suppress PhanEmptyPublicMethod
	 */
	public static function init() {
		// Do nothing for now.
	}

	/**
	 * Construct the object instance.
	 *
	 * @param int $widget_id
	 * @param int $query_id
	 * @param array $settings
	 */
	public function __construct( $widget_id, $query_id, $settings ) {
		$this->widget_id = $widget_id;
		$this->query_id  = $query_id;
		$this->settings  = $settings;
	}

	/**
	 * Include the template that should be displayed in the frontend.
	 *
	 * @param array $settings The article block settings, included in the
	 * function closure to be available in the template.
	 * @return void
	 */
	public function include_template( $settings ) {
		// Todo: remove settings from parameter list.
		$widget_id = $this->widget_id;
		$query_id  = $this->query_id;
		$artblock  = $this;

		include \TWRP_Main::get_templates_directory() . static::get_file_name();
	}

	/**
	 * Get the components that can be edited for this artblock.
	 *
	 * @return array<Widget_Component_Settings>
	 */
	abstract public function get_components();

	/**
	 * Display the article block settings in the Widgets::form().
	 *
	 * @return void
	 */
	abstract public function display_form_settings();

	/**
	 * Sanitize the widget settings of this specific article block.
	 *
	 * @return array The new array of settings.
	 */
	abstract public function sanitize_widget_settings();

	/**
	 * Create and return the css of the component.
	 *
	 * @return string
	 */
	public function get_css() {
		$components = $this->get_components();

		$css = '';
		foreach ( $components as $component ) {
			$css .= $component->get_css();
		}

		return $css;
	}

	#region -- Display Settings

	public function display_author() {
		return (bool) $this->settings['display_author'];
	}

	public function display_date() {
		return (bool) $this->settings['display_date'];
	}

	public function display_views() {
		return (bool) $this->settings['display_views'];
	}

	public function display_rating() {
		return (bool) $this->settings['display_rating'];
	}

	public function display_comments() {
		return (bool) $this->settings['display_comments'];
	}

	#region -- Display Settings

	#region -- Icons

	/**
	 * Get the Id of the selected author icon. Empty if nothing is set(usually
	 * should not be encounter).
	 *
	 * @return string
	 */
	public function get_selected_author_icon() {
		if ( 'true' === General_Options::get_option( General_Options::KEY__PER_WIDGET_ICON ) ) {
			return General_Options::get_option( General_Options::KEY__AUTHOR_ICON );
		}

		if ( isset( $this->settings['author']['author_icon'] ) ) {
			return $this->settings['author']['author_icon'];
		}

		if ( null !== General_Options::get_option( General_Options::KEY__AUTHOR_ICON ) ) {
			return General_Options::get_option( General_Options::KEY__AUTHOR_ICON );
		}

		return '';
	}


	/**
	 * Return the svg for the author icon.
	 *
	 * @return string The HTML is safe for output.
	 */
	public function get_author_icon_html() {
		return SVG_Manager::get_html_svg( $this->get_selected_author_icon(), 'twrp-author-icon' );
	}

	/**
	 * Include the HTML svg for the author icon.
	 *
	 * @return void
	 */
	public function include_author_icon() {
		// phpcs:ignore
		echo SVG_Manager::get_html_svg( $this->get_selected_author_icon(), 'twrp-author-icon' );
	}


	/**
	 * Get the Id of the selected date icon. Empty if nothing is set(usually
	 * should not be encounter).
	 *
	 * @return string
	 */
	public function get_selected_date_icon() {
		if ( 'true' === General_Options::get_option( General_Options::KEY__PER_WIDGET_ICON ) ) {
			return General_Options::get_option( General_Options::KEY__DATE_ICON );
		}

		if ( isset( $this->settings['date']['date_icon'] ) ) {
			return $this->settings['date']['date_icon'];
		}

		if ( null !== General_Options::get_option( General_Options::KEY__DATE_ICON ) ) {
			return General_Options::get_option( General_Options::KEY__DATE_ICON );
		}

		return '';
	}

	/**
	 * Return the svg for the date icon.
	 *
	 * @return string The HTML is safe for output.
	 */
	public function get_date_icon_html() {
		return SVG_Manager::get_html_svg( $this->get_selected_date_icon(), 'twrp-date-icon' );
	}

	/**
	 * Include the HTML svg for the date icon.
	 *
	 * @return void
	 */
	public function include_date_icon() {
		// phpcs:ignore
		echo SVG_Manager::get_html_svg( $this->get_selected_date_icon(), 'twrp-date-icon' );
	}


	#endregion -- Icons

}
