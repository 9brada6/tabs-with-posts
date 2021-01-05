<?php
/**
 * File that contains the abstract class of the article blocks.
 */

namespace TWRP\Article_Block;

use TWRP\Article_Block\Component\Artblock_Component;
use TWRP\Utils\Class_Retriever_Utils;
use TWRP\Utils\Directory_Utils;
use TWRP\Utils\Helper_Trait\Class_Children_Order_Trait;
use TWRP\Article_Block\Setting\Artblock_Setting;
use WP_Post;

/**
 * The abstract for an article block. By extending this class, a class can
 * be declared an article block.
 *
 * Definition: An article block is how a post can be displayed in the widget.
 * It can be displayed as a simple title, where a user can click on it(it can
 * also have some metadata like the author or the date), or it can be displayed
 * maybe as a title and alongside a thumbnail, like YouTube do. Or maybe we want
 * to display a custom WooCommerce product. The possibilities are very large.
 *
 * If you want to sanitize the widgets settings(usually you don't need because
 * they are sanitized before adding in database), call
 * sanitize_widget_settings() function externally.
 */
abstract class Article_Block {

	use Display_Post_Meta_Trait;

	use Class_Children_Order_Trait;

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
	final public function __construct( $widget_id, $query_id, $settings ) {
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
	 * Create the block for each post inside of the array.
	 *
	 * @param array<WP_Post> $query_posts
	 * @return void
	 */
	public function display_blocks( $query_posts ) {
		global $post;

		foreach ( $query_posts as $query_post ) {
			$post = $query_post; // phpcs:ignore -- We reset it.
			setup_postdata( $query_post );
			$this->include_template();
		}
	}

	/**
	 * Include the template that should be displayed in the frontend.
	 *
	 * @return void
	 * @psalm-suppress UnresolvableInclude
	 */
	public function include_template() {
		$artblock = $this;
		include Directory_Utils::get_template_directory_path() . static::get_file_name();
	}

	/**
	 * Get the components that can be edited for this artblock.
	 *
	 * @return array<Artblock_Component>
	 */
	abstract public function get_components();

	/**
	 * Get an array of artblock class settings names.
	 *
	 * @return array<Artblock_Setting>
	 */
	abstract public function get_artblock_settings();

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

	#region -- Helper methods

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
		$artblock_class_names  = Class_Retriever_Utils::get_all_article_block_names();
		$founded_artblock_name = '';

		foreach ( $artblock_class_names as $artblock_name ) {
			// find the class by id.
			if ( $artblock_name::get_id() === $name_or_id ) {
				$founded_artblock_name = $artblock_name;
				break;
			}

			// Find the class by class name. Verify if not empty first because otherwise PHP throw warning.
			if ( ! empty( $name_or_id ) && strpos( $artblock_name, $name_or_id ) !== false ) {
				$founded_artblock_name = $artblock_name;
				break;
			}
		}

		if ( ! class_exists( $founded_artblock_name ) ) {
			throw new \RuntimeException( 'Could not find class ' . $founded_artblock_name );
		} else {
			return new $founded_artblock_name( $widget_id, $query_id, $settings );
		}

	}

	/**
	 * Return whether or not the article block is registered.
	 *
	 * @param string $artblock_id
	 * @return bool
	 */
	public static function article_block_id_exist( $artblock_id ) {
		$article_block_names = Class_Retriever_Utils::get_all_article_block_names();

		foreach ( $article_block_names as $article_block_name ) {
			if ( $article_block_name::get_id() === $artblock_id ) {
				return true;
			}
		}

		return false;
	}

	#endregion -- Helper methods

}
