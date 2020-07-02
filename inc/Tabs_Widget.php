<?php
/**
 * @todo: Verify if we have privilege to retrieve the ajax settings.
 */

namespace TWRP;

use TWRP\Database\Query_Options;

class Tabs_Widget extends \WP_Widget {

	const TWRP_BASE_ID                 = 'twrp_tabs_with_recommended_posts';
	const ARTBLOCK_SELECTOR_NAME       = 'article_block';
	const DEFAULT_SELECTED_ARTBLOCK_ID = 'simple_style';

	use \TWRP\Widget\Widget_Utilities;

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

		echo '<div class="twrp-widget__content">';

			echo '<div class="twrp-widget__tabs-container">';
				// Todo: change this shit.
				$this->display_query( 1, true );
			echo '</div>';
		echo '</div>';

		echo $args['after_widget']; // phpcs:ignore
	}

	protected function display_query( $query_id, $is_shown ) {
		// Todo: Verify if widget_id is good.
		$widget_id = (int) $this->number;

		try {
			$artblock_id = self::get_selected_artblock_id( $widget_id, $query_id );
			$artblock    = Article_Blocks_Manager::get_style_class_by_name( $artblock_id );
			$posts       = Get_Posts::get_posts_by_query_id( $query_id );
			$settings    = self::get_query_instance_settings( $widget_id, $query_id );
			$settings    = $artblock->sanitize_widget_settings( $settings );
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
				$artblock->include_template( $widget_id, $query_id, $settings );
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
				$artblock       = Article_Blocks_Manager::get_style_class_by_name( $selected_artblock_id );
				$query_settings = self::get_query_instance_settings( $widget_id, $query_id );
				$query_settings = $artblock->sanitize_widget_settings( $query_settings );
			} catch ( \RuntimeException $e ) {
				continue;
			}
			$artblock->enqueue_styles_and_scripts( $widget_id, $query_id, $query_settings );
		}
	}

	// =========================================================================
	// Functions to sanitize the settings.

	public function update( $new_instance, $old_instance ) {
		return self::sanitize_instance_settings( $new_instance );
	}

	public static function sanitize_instance_settings( $settings ) {
		if ( ! isset( $settings['queries'] ) ) {
			$settings['queries'] = '';
		}
		$queries            = explode( ';', $settings['queries'] );
		$valid_queries_ids  = array();
		$sanitized_settings = array();

		foreach ( $queries as $query_id ) {
			if ( ! is_numeric( $query_id ) ) {
				continue;
			}
			if ( Query_Options::query_exists( $query_id ) ) {
				$sanitized_settings[ $query_id ] = self::sanitize_query_settings( $settings[ $query_id ] );
				array_push( $valid_queries_ids, $query_id );
			}
		}

		$sanitized_settings['queries'] = implode( ';', $valid_queries_ids );

		return $sanitized_settings;
	}

	/**
	 * @param array $query_settings
	 */
	protected static function sanitize_query_settings( $query_settings ) {
		$sanitized_settings = array();

		if ( isset( $query_settings['article_block'] ) ) {
			if ( Article_Blocks_Manager::article_block_id_exist( $query_settings['article_block'] ) ) {
				$sanitized_settings['article_block'] = $query_settings['article_block'];
			} else {
				$sanitized_settings['article_block'] = self::DEFAULT_SELECTED_ARTBLOCK_ID;
			}
		} else {
			$sanitized_settings['article_block'] = self::DEFAULT_SELECTED_ARTBLOCK_ID;
		}

		if ( ! isset( $query_settings['display_title'] ) ) {
			$sanitized_settings['display_title'] = '';
		} else {
			$sanitized_settings['display_title'] = $query_settings['display_title'];
		}

		try {
			$artblock = Article_Blocks_Manager::get_style_class_by_name( $sanitized_settings['article_block'] );
		} catch ( \RuntimeException $e ) {
			return $sanitized_settings;
		}

		$sanitized_article_block_setting = $artblock->sanitize_widget_settings( $query_settings );

		return array_merge( $sanitized_settings, $sanitized_article_block_setting );
	}

	/**
	 * Create the widget form settings for an instance.
	 *
	 * @param array $instance
	 *
	 * @return ''
	 */
	public function form( $instance ) {
		\TWRP\Widget\Widget_Form::display_form( $instance, (int) $this->number );

		return ''; // todo: Learn why, probably because of AJAX.
	}

}
