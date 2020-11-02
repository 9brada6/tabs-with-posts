<?php
/**
 * @todo: Verify if we have privilege to retrieve the ajax settings.
 */

namespace TWRP\TWRP_Widget;

use TWRP\Article_Block\Article_Block;
use TWRP\Create_Tabs;
use TWRP\Query_Generator;
use TWRP\Database\Query_Options;
use TWRP\TWRP_Widget\Widget_Utilities;
use TWRP\TWRP_Widget\Widget_Form;
use TWRP\Simple_Utils;
use WP_Widget;

class Widget extends WP_Widget {

	const TWRP_BASE_ID             = 'twrp_tabs_with_recommended_posts';
	const ARTBLOCK_SELECTOR__NAME  = 'article_block';
	const QUERY_BUTTON_TITLE__NAME = 'display_title';

	const DEFAULT_SELECTED_ARTBLOCK_ID = 'simple_style';


	use Widget_Utilities;

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

	// =========================================================================
	// Functions to display the frontend.

	/**
	 * Display the front-end content.
	 *
	 * @param array $args              Display arguments including 'before_title',
	 *                                 'after_title', 'before_widget', and 'after_widget'.
	 * @param array $instance_settings The settings for the particular instance of the widget.
	 */
	public function widget( $args, $instance_settings ) {
		echo $args['before_widget']; // phpcs:ignore
			$tabs_creator = new Create_Tabs( (int) $this->number );
			$tabs_creator->display_tabs();
		echo $args['after_widget']; // phpcs:ignore
	}

	protected function display_query( $query_id, $is_shown ) {
		// Todo: Verify if widget_id is good.
		$widget_id = (int) $this->number;

		try {
			$artblock_id = self::get_selected_artblock_id( $widget_id, $query_id );
			$settings    = self::get_query_instance_settings( $widget_id, $query_id );
			$artblock    = Article_Block::construct_class_by_name_or_id( $artblock_id, $widget_id, $query_id, $settings );
			$posts       = Query_Generator::get_posts_by_query_id( $query_id );
			$artblock->sanitize_widget_settings();
		} catch ( \RuntimeException $e ) {
			return;
		}

		$query_content_class = 'twrp-widget__tab-content twrp-widget__tab-content--' . $widget_id . '-' . $query_id;

		global $post;
		?>
		<div class="<?= esc_attr( $query_content_class ); ?>">
			<?php
			foreach ( $posts as $new_global_post ) :
				$post = $new_global_post; // phpcs:ignore -- We reset afterwards;
				setup_postdata( $new_global_post );
				$artblock->include_template();
			endforeach;
			wp_reset_postdata();
			?>
		</div>
		<?php
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
		try {
			$widget_id = self::twrp_get_widget_id_num( $widget_id );
		} catch ( \RuntimeException $exception ) {
			return;
		}

		$selected_queries = self::get_selected_queries( $widget_id );

		foreach ( $selected_queries as $query_id ) {
			$selected_artblock_id = self::get_selected_artblock_id( $widget_id, $query_id );
			try {
				$query_settings = self::get_query_instance_settings( $widget_id, $query_id );
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

	/**
	 * Create the widget form settings for an instance.
	 *
	 * @param array $instance_settings
	 *
	 * @return ''
	 */
	public function form( $instance_settings ) {
		Widget_Form::display_form( $instance_settings, (int) $this->number );
		return ''; // todo: Learn why, probably because of AJAX.
	}

	#region -- Update

	public function update( $new_instance, $old_instance ) {
		$widget_id = (int) $this->number;
		return self::sanitize_all_queries_settings( $widget_id, $new_instance );
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
