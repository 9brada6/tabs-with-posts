<?php
/**
 * File that contains the abstract class of the article blocks.
 */

namespace TWRP\Article_Block;

use TWRP\Artblock_Component\Widget_Component_Settings;

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

	use Display_Post_Meta_Trait;

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
	 * Holds the query settings. This property is commented because is
	 * implemented in Get_Widget_Settings_Trait, but is also put here to know
	 * the properties of this object.
	 *
	 * @var array
	 */
	// protected $settings;

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
	 * Get the widget Id this artblock is build for.
	 *
	 * @return int
	 */
	public function get_widget_id() {
		return $this->widget_id;
	}

	/**
	 * Get the query Id this artblock is build for.
	 *
	 * @return int
	 */
	public function get_query_id() {
		return $this->query_id;
	}

	/**
	 * Get the settings of this artblock.
	 *
	 * @return array
	 */
	public function get_settings() {
		return $this->settings;
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
	 * Echo the block class that each article block in the query should have.
	 *
	 * The string is escaped when echoed.
	 *
	 * @return void
	 */
	public function the_block_class() {
		echo esc_attr( $this->get_block_class() );
	}

	/**
	 * Get the block class that each article block in the query should have.
	 *
	 * @return string
	 */
	public function get_block_class() {
		return 'twrp-block--' . $this->widget_id . '-' . $this->query_id;
	}

	/**
	 * Include the template that should be displayed in the frontend.
	 *
	 * @return void
	 * @psalm-suppress UnresolvableInclude
	 */
	public function include_template() {
		$artblock = $this;
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

}
