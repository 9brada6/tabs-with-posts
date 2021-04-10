<?php

namespace TWRP\Tabs_Creator;

use TWRP\TWRP_Widget;
use TWRP\Article_Block\Article_Block;
use TWRP\Query_Generator\Query_Generator;
use TWRP\Database\Tabs_Cache_Table;

use TWRP\Tabs_Creator\Tabs_Styles\Tab_Style;

use TWRP\Utils\Widget_Utils;
use TWRP\Utils\Class_Retriever_Utils;

use RuntimeException;
use TWRP\Database\General_Options;

/**
 * Construct the tabs widget.
 *
 * The only way to set the settings for the tabs are through the WordPress widget.
 * We can pass a set of custom settings to this constructor, or pass the ones
 * defined in widget.
 */
class Tabs_Creator {

	/**
	 * Holds the widget id of which the tabs must be generated for.
	 *
	 * @var int
	 */
	protected $widget_id = 0;

	/**
	 * Holds the widget instance settings.
	 *
	 * @var array
	 */
	protected $instance_settings = array();

	/**
	 * Holds the Tab_Style object.
	 *
	 * @var Tab_Style
	 */
	protected $tab_style;

	/**
	 * Holds all the query ids of the widget
	 *
	 * @var array
	 */
	protected $query_ids = array();

	/**
	 * For each query id holds the artblock that needs to generate the posts.
	 *
	 * @var array
	 */
	protected $query_artblocks = array();

	/**
	 * For each query id holds the posts to be displayed.
	 *
	 * @var array
	 */
	protected $query_array_of_posts = array();

	/**
	 * Construct the object based on some widget settings.
	 *
	 * By default WordPress Widget classes are not intuitively very reasonable,
	 * we cannot pass a widget object, because the settings are stored in
	 * database and not in the object itself.
	 *
	 * @throws RuntimeException If widget id does not exist, or the instance
	 * settings might not be correct. Or there are no tabs that can be correctly
	 * displayed.
	 *
	 * @param int $widget_id
	 * @param array $widget_instance_settings Optionally. Will get the default
	 * settings by widget_id.
	 *
	 * @psalm-suppress DocblockTypeContradiction
	 * @psalm-suppress PropertyTypeCoercion
	 */
	public function __construct( $widget_id, $widget_instance_settings = array() ) {
		if ( ! is_int( $widget_id ) ) {
			throw new RuntimeException();
		}

		if ( empty( $widget_instance_settings ) || ! is_array( $widget_instance_settings ) ) {
			$widget_instance_settings = Widget_Utils::get_instance_settings( $widget_id );
		}

		if ( empty( $widget_instance_settings ) ) {
			throw new RuntimeException();
		}

		$this->widget_id         = $widget_id;
		$this->instance_settings = $widget_instance_settings;

		$tab_and_variant = Widget_Utils::pluck_tab_style_and_variant_id( $this->instance_settings );

		$tab_style_id         = $tab_and_variant['tab_style_id'];
		$tab_style_class_name = Class_Retriever_Utils::get_tab_style_class_name_by_id( $tab_style_id );
		$tab_variant          = $tab_and_variant['tab_variant_id'];

		if ( empty( $tab_style_class_name ) ) {
			throw new RuntimeException();
		}

		$this->tab_style = new $tab_style_class_name( $this->widget_id, $this->instance_settings, $tab_variant );

		$this->query_ids = Widget_Utils::pluck_valid_query_ids( $this->instance_settings );

		foreach ( $this->query_ids as $key => $query_id ) {
			$artblock = $this->get_artblock( $query_id );
			if ( null === $artblock ) {
				unset( $this->query_ids[ $key ] );
			} else {
				$this->query_artblocks[ $query_id ] = $artblock;
			}
		}

		// todo: verify if query_ids exist here, and unset them.

		if ( empty( $this->query_ids ) ) {
			throw new RuntimeException();
		}
	}

	/**
	 * Create and display the tabs for the widget.
	 *
	 * @return void
	 */
	public function display_tabs() {
		$this->widget_inline_css();
		$tab_style   = $this->tab_style;
		$default_tab = true;

		do_action( 'twrp_before_tabs', $this->instance_settings, $this->widget_id, $this->query_ids, $this->tab_style, $this->query_artblocks, $this->query_ids );

		$tab_style->start_tabs_wrapper();
		if ( count( $this->query_ids ) > 1 ) {
			$tab_style->start_tab_buttons_wrapper();
			foreach ( $this->query_ids as $query_id ) :
				$button_text = Widget_Utils::pluck_tab_button_title( $this->instance_settings, $query_id );
				$tab_style->tab_button( $button_text, $query_id, $default_tab );
				$default_tab = false;
			endforeach;
			$tab_style->end_tab_buttons_wrapper();
		}

		$tab_style->start_all_tabs_wrapper();
		foreach ( $this->query_ids as $query_id ) :
			$tab_style->start_tab_content_wrapper( $query_id );
			$this->display_query_posts( $query_id );
			$tab_style->end_tab_content_wrapper( $query_id );
		endforeach;
		$tab_style->end_all_tabs_wrapper();
		$tab_style->end_tabs_wrapper();

		do_action( 'twrp_after_tabs', $this->instance_settings, $this->widget_id, $this->query_ids, $this->tab_style, $this->query_artblocks, $this->query_ids );
	}

	/**
	 * Get an array with each query id.
	 *
	 * @return array
	 */
	public function get_query_ids() {
		return $this->query_ids;
	}

	/**
	 * Display all the posts from a query id.
	 *
	 * @param int $query_id
	 * @return void
	 */
	protected function display_query_posts( $query_id ) {
		$cache_is_enabled = General_Options::get_option( General_Options::ENABLE_CACHE );

		if ( 'false' === $cache_is_enabled ) {
			$this->create_tab_articles( $query_id, true );
			return;
		}

		$tabs_cache = new Tabs_Cache_Table( $this->widget_id );
		$widget     = $tabs_cache->get_widget_html( (string) $query_id );

		if ( ! empty( $widget ) ) {
			echo $widget; // phpcs:ignore
		}
	}

	/**
	 * Echo the inline css for the whole tabs, the css is from table cache..
	 *
	 * @return void
	 */
	protected function widget_inline_css() {
		$cache_is_enabled = General_Options::get_option( General_Options::ENABLE_CACHE );

		if ( 'false' === $cache_is_enabled ) {
			echo $this->create_widget_inline_css(); // phpcs:ignore -- No XSS.
			return;
		}

		$tabs_cache   = new Tabs_Cache_Table( $this->widget_id );
		$inline_style = $tabs_cache->get_widget_html( 'style' );

		if ( ! empty( $inline_style ) ) {
			echo $inline_style; //phpcs:ignore -- No XSS.
		}
	}

	/**
	 * Get the article block class for a query in the widget.
	 *
	 * @param int $query_id
	 * @return Article_Block|null
	 */
	protected function get_artblock( $query_id ) {
		$artblock_id = Widget_Utils::pluck_artblock_id( $this->instance_settings, $query_id );
		if ( empty( $artblock_id ) || ! is_array( $this->instance_settings[ $query_id ] ) ) {
			return null;
		}

		try {
			$artblock = Article_Block::construct_class_by_name_or_id( $artblock_id, $this->widget_id, $query_id, $this->instance_settings[ $query_id ] );
		} catch ( RuntimeException $e ) {
			return null;
		}

		return $artblock;
	}

	/**
	 * Get the setting of how many posts to display per page.
	 *
	 * @return int
	 */
	protected function get_posts_per_page_setting() {
		$posts_per_page = TWRP_Widget::DEFAULT_POSTS_PER_PAGE;
		if ( isset( $this->instance_settings[ TWRP_Widget::NUMBER_OF_POSTS_PER_PAGE__NAME ] ) ) {
			$posts_per_page = (int) $this->instance_settings[ TWRP_Widget::NUMBER_OF_POSTS_PER_PAGE__NAME ];
		}

		return $posts_per_page;
	}

	/**
	 * Create the inline css for a widget.
	 *
	 * @return string
	 */
	public function create_widget_inline_css() {
		$css = '';
		foreach ( $this->query_ids as $query_id ) {
			$artblock = $this->get_artblock( $query_id );
			if ( null === $artblock ) {
				continue;
			}

			$css .= $artblock->get_css();
		}

		if ( ! empty( $css ) ) {
			$css = '<style>' . $css . '</style>';
		}

		return $css;
	}

	/**
	 * Create the article blocks for a query id.
	 *
	 * @param int $query_id
	 * @param bool $echo Whether to echo the html or to return.
	 * @return null|string Return the html or null if echo is true.
	 */
	public function create_tab_articles( $query_id, $echo = false ) {
		if ( ! $echo ) {
			ob_start();
		}

		$number_of_posts = 12;
		if ( isset( $this->instance_settings[ TWRP_Widget::NUMBER_OF_POSTS__NAME ] ) ) {
			$num_posts_aux = $this->instance_settings[ TWRP_Widget::NUMBER_OF_POSTS__NAME ];
			if ( is_numeric( $num_posts_aux ) ) {
				$number_of_posts = (int) $num_posts_aux;
			}
		}

		$additional_args = array(
			'nopaging'       => false,
			'posts_per_page' => $number_of_posts,
			'page'           => 1,
		);

		try {
			$query_posts = Query_Generator::get_posts_by_query_id( $query_id, $additional_args );
		} catch ( RuntimeException $e ) {
			$result = ob_get_contents();
			ob_end_clean();
			if ( $echo ) {
				return '';
			} else {
				return null;
			}
		}

		$artblock       = $this->query_artblocks[ $query_id ];
		$posts_per_page = $this->get_posts_per_page_setting();
		$artblock->display_blocks( $query_posts, $posts_per_page );

		if ( ! $echo ) {
			$result = ob_get_contents();
			ob_end_clean();

			if ( false === $result ) {
				$result = '';
			}

			return $result;
		}

		return null;
	}
}
