<?php
/**
 * @todo: Verify if we have privilege to retrieve the ajax settings.
 */

namespace TWRP\TWRP_Widget;

use TWRP\Article_Block\Article_Block;
use TWRP\Tabs_Creator\Tabs_Creator;
use TWRP\Database\Query_Options;
use TWRP\Admin\TWRP_Widget\Widget_Form;

use TWRP\Utils\Simple_Utils;
use TWRP\Utils\Widget_Utils;

use RuntimeException;
use TWRP\Utils\Helper_Trait\After_Setup_Theme_Init_Trait;
use WP_Widget;

class Widget extends WP_Widget {

	const TWRP_BASE_ID = 'twrp_tabs_with_recommended_posts';

	const TAB_STYLE_AND_VARIANT__NAME = 'tab_style_and_variant';

	const SYNC_QUERY_SETTINGS__NAME = 'sync_query_settings';

	const ARTBLOCK_SELECTOR__NAME = 'article_block';

	const QUERY_BUTTON_TITLE__NAME = 'display_title';

	const TAB_QUERIES__NAME = 'queries';

	const DEFAULT_SELECTED_ARTBLOCK_ID = 'simple_style';

	use After_Setup_Theme_Init_Trait;

	public function __construct() {

		$description = _x( 'Tabs with recommended posts. The settings are available at Settings->Tabs With Recommended Posts', 'backend', 'twrp' );
		$widget_ops  = array(
			'classname'                   => 'twrp-widget',
			'description'                 => $description,
			'customize_selective_refresh' => true,
		);

		parent::__construct(
			self::TWRP_BASE_ID,
			_x( 'Tabs with Recommended posts', 'backend', 'twrp' ),
			$widget_ops
		);
	}

	/**
	 * Initialize this plugin.
	 *
	 * For more info about this method see After_Setup_Theme_Init_Trait trait.
	 *
	 * @return void
	 */
	public static function after_setup_theme_init() {
		add_action(
			'widgets_init',
			function() {
				register_widget( 'TWRP\\TWRP_Widget\\Widget' );
			}
		);
	}

	/**
	 * Display the front-end content.
	 *
	 * @param array $args              Display arguments including 'before_title',
	 *                                 'after_title', 'before_widget', and 'after_widget'.
	 * @param array $instance_settings The settings for the particular instance of the widget.
	 * @return void
	 */
	public function widget( $args, $instance_settings ) {
		try {
			$tabs_creator = new Tabs_Creator( (int) $this->number, $instance_settings );
		} catch ( RuntimeException $e ) {
			// If the tabs cannot be created, or there are no tabs, then return.
			return;
		}

		echo $args['before_widget']; // phpcs:ignore -- No XSS.
			$tabs_creator->display_tabs();
		echo $args['after_widget']; // phpcs:ignore -- No XSS.
	}

	/**
	 * Create the widget form settings for an instance.
	 *
	 * @param array $instance_settings
	 * @return ''
	 */
	public function form( $instance_settings ) {
		$widget_form = new Widget_Form( $this->number, $instance_settings );
		$widget_form->display_form();
		return ''; // Because of AJAX.
	}

	// =========================================================================
	// Enqueue the scripts dynamically.

	/**
	 * Enqueue the scripts and generate the styles for a specific widget.
	 *
	 * @param int|string $widget_id Full widget Id, or just the int number.
	 * @return void
	 */
	public static function enqueue_scripts( $widget_id ) {
		// todo, not called yet:
		try {
			$widget_id = Widget_Utils::get_widget_id_number( $widget_id );
		} catch ( \RuntimeException $exception ) {
			return;
		}

		$instance_settings = Widget_Utils::get_instance_settings( $widget_id );
		if ( empty( $instance_settings ) ) {
			return;
		}

		$selected_queries = Widget_Utils::pluck_valid_query_ids( $instance_settings );

		foreach ( $selected_queries as $query_id ) {
			$selected_artblock_id = Widget_Utils::pluck_artblock_id( $instance_settings, $query_id );
			if ( empty( $selected_artblock_id ) ) {
				$selected_artblock_id = self::DEFAULT_SELECTED_ARTBLOCK_ID;
			}

			try {
				$query_settings = Widget_Utils::pluck_query_settings( $instance_settings, $query_id );
				$artblock       = Article_Block::construct_class_by_name_or_id( $selected_artblock_id, $widget_id, $query_id, $query_settings );
				$query_settings = $artblock->sanitize_widget_settings();
			} catch ( \RuntimeException $e ) {
				continue;
			}
			// Todo:
			// $artblock->enqueue_styles_and_scripts( $widget_id, $query_id, $query_settings );
		}
	}

	// =========================================================================



	#region -- Update

	public function update( $new_instance, $old_instance ) {
		// $widget_id = (int) $this->number;
		// return self::sanitize_all_queries_settings( $widget_id, $new_instance );
		return $new_instance;
	}

	public static function sanitize_all_queries_settings( $widget_id, $settings ) {
		if ( ! isset( $settings['queries'] ) ) {
			$settings['queries'] = '';
		}
		$queries            = explode( ';', $settings['queries'] );
		$queries            = Simple_Utils::get_valid_wp_ids( $queries );
		$valid_queries_ids  = array();
		$sanitized_settings = array();

		foreach ( $queries as $query_id ) {
			if ( Query_Options::query_exists( $query_id ) ) {
				$sanitized_settings[ $query_id ] = self::sanitize_query_settings( $widget_id, $query_id, $settings[ $query_id ] );
				array_push( $valid_queries_ids, $query_id );
			}
		}

		$sanitized_settings['queries'] = implode( ';', $valid_queries_ids );

		return $sanitized_settings;
	}

	protected static function sanitize_query_settings( $widget_id, $query_id, $query_settings ) {
		$sanitized_settings = array();

		if ( ! is_array( $query_settings ) ) {
			$query_settings = array();
		}

		if ( isset( $query_settings[ self::ARTBLOCK_SELECTOR__NAME ] ) ) {
			if ( Article_Block::article_block_id_exist( $query_settings[ self::ARTBLOCK_SELECTOR__NAME ] ) ) {
				$sanitized_settings[ self::ARTBLOCK_SELECTOR__NAME ] = $query_settings[ self::ARTBLOCK_SELECTOR__NAME ];
			} else {
				$sanitized_settings[ self::ARTBLOCK_SELECTOR__NAME ] = self::DEFAULT_SELECTED_ARTBLOCK_ID;
			}
		} else {
			$sanitized_settings[ self::ARTBLOCK_SELECTOR__NAME ] = self::DEFAULT_SELECTED_ARTBLOCK_ID;
		}

		if ( ! isset( $query_settings[ self::QUERY_BUTTON_TITLE__NAME ] ) ) {
			$sanitized_settings[ self::QUERY_BUTTON_TITLE__NAME ] = '';
		} else {
			$sanitized_settings[ self::QUERY_BUTTON_TITLE__NAME ] = $query_settings[ self::QUERY_BUTTON_TITLE__NAME ];
		}

		try {
			$artblock = Article_Block::construct_class_by_name_or_id( $sanitized_settings[ self::ARTBLOCK_SELECTOR__NAME ], $widget_id, $query_id, $query_settings );
		} catch ( \RuntimeException $e ) {
			return $sanitized_settings;
		}

		$sanitized_article_block_setting = $artblock->sanitize_widget_settings();

		return array_merge( $sanitized_settings, $sanitized_article_block_setting );
	}

	#endregion -- Update

}
