<?php

namespace TWRP\Tabs_Creator;

use TWRP\TWRP_Widget;
use TWRP\Article_Block\Article_Block;
use TWRP\Query_Generator\Query_Generator;

use TWRP\Tabs_Creator\Tabs_Styles\Tab_Style;

use TWRP\Utils\Widget_Utils;
use TWRP\Utils\Class_Retriever_Utils;

use RuntimeException;

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

		$number_of_posts = 12;
		if ( isset( $this->instance_settings[ TWRP_Widget::NUMBER_OF_POSTS__NAME ] ) ) {
			$num_posts_aux = $this->instance_settings[ TWRP_Widget::NUMBER_OF_POSTS__NAME ];
			if ( is_numeric( $num_posts_aux ) ) {
				$number_of_posts = (int) $num_posts_aux;
			}
		}

		foreach ( $this->query_ids as $key => $query_id ) {
			try {
				$additional_args                         = array(
					'nopaging'       => false,
					'posts_per_page' => $number_of_posts,
					'page'           => 1,
				);
				$query_posts                             = Query_Generator::get_posts_by_query_id( $query_id, $additional_args );
				$this->query_array_of_posts[ $query_id ] = $query_posts;
			} catch ( RuntimeException $e ) {
				unset( $this->query_ids[ $key ] );
			}
		}

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

		// phpcs:disable Generic.WhiteSpace.ScopeIndent.IncorrectExact -- Visualize the HTML format created by the functions.
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
		// phpcs:enable Generic.WhiteSpace.ScopeIndent.IncorrectExact

		do_action( 'twrp_after_tabs', $this->instance_settings, $this->widget_id, $this->query_ids, $this->tab_style, $this->query_artblocks, $this->query_ids );
	}

	/**
	 * Display all the posts from a query id.
	 *
	 * @param int $query_id
	 * @return void
	 */
	protected function display_query_posts( $query_id ) {
		$artblock    = $this->query_artblocks[ $query_id ];
		$query_posts = $this->query_array_of_posts[ $query_id ];

		$artblock->display_blocks( $query_posts );
	}

	/**
	 * Echo the inline css for the whole tabs.
	 *
	 * @return void
	 */
	protected function widget_inline_css() {
		$css = '';
		foreach ( $this->query_ids as $query_id ) {
			$artblock = $this->get_artblock( $query_id );
			if ( null === $artblock ) {
				continue;
			}

			$css .= $artblock->get_css();
		}

		if ( ! empty( $css ) ) {
			// phpcs:ignore -- No XSS.
			echo '<style>' . $css . '</style>';
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
}
