<?php

namespace TWRP;

use TWRP\Article_Block\Article_Block;
use TWRP\Tabs_Creator\Tabs_Creator;
use TWRP\Database\Query_Options;
use TWRP\Admin\TWRP_Widget\Widget_Form;

use TWRP\Utils\Simple_Utils;

use RuntimeException;
use TWRP\Admin\Widget_Control\Checkbox_Control;
use TWRP\Admin\Widget_Control\Select_Control;
use TWRP\Utils\Helper_Trait\After_Setup_Theme_Init_Trait;
use TWRP\Utils\Widget_Utils;
use WP_Widget;

/**
 * The main widget of this plugin, named "Tabs with recommended posts".
 */
class TWRP_Widget extends WP_Widget {

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
				register_widget( self::class );
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
		if ( is_bool( $this->number ) ) {
			return '';
		}

		// Here the number is either int or "__i__". Usually its "__i__".
		// See WP_Widget or Google for more info.
		$widget_form = new Widget_Form( $this->number, $instance_settings );
		$widget_form->display_form();
		return ''; // Because of AJAX.
	}

	#region -- Update

	public function update( $new_instance, $old_instance ) {
		$sanitized_non_query_settings = $this->sanitize_all_non_queries_widget_settings( $new_instance );
		$widget_id                    = $this->number;
		if ( ! is_int( $widget_id ) ) {
			$widget_id = Widget_Utils::get_widget_id_by_instance_settings( $old_instance );
		}
		$sanitized_query_settings = $this->sanitize_all_queries_settings( $widget_id, $new_instance );

		return $sanitized_non_query_settings + $sanitized_query_settings;
	}

	/**
	 * Sanitize all the widgets settings that do not belong to queries.
	 *
	 * @param array $settings Instance of the widget settings.
	 * @return array
	 */
	protected function sanitize_all_non_queries_widget_settings( $settings ) {
		$sanitized_settings = array();

		// Sanitize sync all queries option.
		$current_setting = null;
		if ( isset( $settings [ self::SYNC_QUERY_SETTINGS__NAME ] ) ) {
			$current_setting = $settings [ self::SYNC_QUERY_SETTINGS__NAME ];
		}
		$sanitized_settings[ self::SYNC_QUERY_SETTINGS__NAME ] = Checkbox_Control::sanitize_setting( $current_setting, Widget_Form::get_query_sync_control_args() );

		// Sanitize tab style.
		$current_setting = null;
		if ( isset( $settings [ self::TAB_STYLE_AND_VARIANT__NAME ] ) ) {
			$current_setting = $settings [ self::TAB_STYLE_AND_VARIANT__NAME ];
		}
		$sanitized_settings[ self::TAB_STYLE_AND_VARIANT__NAME ] = Select_Control::sanitize_setting( $current_setting, Widget_Form::get_tab_style_control_args() );

		return $sanitized_settings;
	}

	/**
	 * Sanitize all the widgets settings that belong to queries, including the
	 * setting that holds all the queries.
	 *
	 * @param int $widget_id
	 * @param array $settings Instance of the widget settings.
	 * @return array
	 */
	public function sanitize_all_queries_settings( $widget_id, $settings ) {
		if ( ! isset( $settings['queries'] ) ) {
			$settings['queries'] = '';
		}
		$queries = explode( ';', $settings['queries'] );
		$queries = Simple_Utils::get_valid_wp_ids( $queries );

		$valid_queries_ids  = array();
		$sanitized_settings = array();

		foreach ( $queries as $query_id ) {
			if ( Query_Options::query_exists( $query_id ) ) {
				if ( ! isset( $settings[ $query_id ] ) || ! is_array( $settings[ $query_id ] ) ) {
					$settings[ $query_id ] = array();
				}

				// @phan-suppress-next-line PhanPartialTypeMismatchArgument
				$sanitized_settings[ $query_id ] = self::sanitize_query_settings( $widget_id, $query_id, $settings[ $query_id ] );
				array_push( $valid_queries_ids, $query_id );
			}
		}

		$sanitized_settings['queries'] = implode( ';', $valid_queries_ids );

		return $sanitized_settings;
	}

	/**
	 * Sanitize all the widgets settings that belong to queries, including the
	 * setting that holds all the queries.
	 *
	 * @param int $widget_id
	 * @param int $query_id
	 * @param array $query_settings Only the query settings to sanitize.
	 * @return array
	 *
	 * @psalm-suppress DocblockTypeContradiction
	 */
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
		} catch ( RuntimeException $e ) {
			return $sanitized_settings;
		}

		$sanitized_article_block_setting = $artblock->sanitize_widget_settings();

		return $sanitized_settings + $sanitized_article_block_setting;
	}

	#endregion -- Update

}
