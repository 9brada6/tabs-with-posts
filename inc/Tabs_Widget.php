<?php
/**
 * @todo: Verify if we have privilege to retrieve the ajax settings.
 */

namespace TWRP;

use RuntimeException;
use TWRP\Admin\Tabs\Queries_Tab;
use TWRP\DB_Query_Options;

class Tabs_Widget extends \WP_Widget {

	const TWRP_BASE_ID           = 'twrp_tabs_with_recommended_posts';
	const ARTBLOCK_SELECTOR_NAME = 'article_block';

	const DEFAULT_SELECTED_ARTBLOCK_ID = 'simple_style';

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

	public static function enqueue_scripts( $widget_full_id ) {
		try {
			$widget_id = self::twrp_get_widget_id_num( $widget_full_id );
		} catch ( RuntimeException $exception ) {
			return;
		}

		// $settings  = self::get_instance_settings();

		// Get all queries and articles blocks.
		// For each article block enqueue the styles.
	}

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
				$this->display_query( 1, $instance_settings, true );
			echo '</div>';
		echo '</div>';

		echo $args['after_widget']; // phpcs:ignore
	}

	protected function display_query( $query_id, $instance_settings, $is_shown ) {
		// TODO: Verify these how we get them and how legit they are.
		try {
			$posts = Get_Posts::get_posts_by_query_id( $query_id );
		} catch ( RuntimeException $e ) {
			return;
		}

		$artblock_id = self::get_selected_artblock_id( (int) $this->number, $query_id );
		$artblock    = Manage_Component_Classes::get_style_class_by_name( $artblock_id );
		global $post;
		?>
		<div class="twrp-widget__tab-content">
			<?php
			foreach ( $posts as $new_global_post ) :
				$post = $new_global_post; // phpcs:ignore -- We reset afterwards;
				$artblock->include_template();
			endforeach;
			wp_reset_postdata();
			?>
		</div>
		<?php
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
			if ( DB_Query_Options::query_exists( $query_id ) ) {
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
			if ( Manage_Component_Classes::article_block_id_exist( $query_settings['article_block'] ) ) {
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
			$artblock = Manage_Component_Classes::get_style_class_by_name( $sanitized_settings['article_block'] );
		} catch ( \RuntimeException $e ) {
			return $sanitized_settings;
		}

		$sanitized_article_block_setting = $artblock->sanitize_widget_settings( $query_settings );

		return array_merge( $sanitized_settings, $sanitized_article_block_setting );
	}

	// =========================================================================
	// Display the widget form functions

	/**
	 * Create the widget form settings for an instance.
	 *
	 * @param array $instance
	 *
	 * @return ''
	 */
	public function form( $instance ) {
		$queries = DB_Query_Options::get_all_queries();
		?>
		<div class="twrp-widget-form" data-twrp-widget-id=<?= esc_attr( (string) $this->number ); ?> >
			<?php if ( ! empty( $queries ) ) : ?>
				<?php $this->display_select_query_options( $instance ); ?>
			<?php else : ?>
				<?php $this->display_no_queries_exist(); ?>
			<?php endif; ?>
		</div>
		<?php

		return '';
	}

	// ===================

	/**
	 * Display a text in case that no queries have been create, to guide the
	 * administrator to the settings.
	 *
	 * @return void
	 */
	protected function display_no_queries_exist() {
		?>
		<p class="twrp-widget-form__select-queries-exist">
			<?= _x( 'No queries created. You need to go to Settings Menu -> Tabs With Recommended Posts(Submenu) and create a query and a style.', 'backend', 'twrp' ); ?>
		</p>
		<?php
	}

	protected function display_select_query_options( $instance ) {
		$queries     = DB_Query_Options::get_all_queries();
		$queries_ids = array_keys( $queries );

		// Todo: factorize this:
		$selected_queries_list = '';
		if ( isset( $instance['queries'] ) ) {
			$selected_queries_list = $instance['queries'];
		}
		$selected_queries_ids = explode( ';', $selected_queries_list );
		?>
		<p class="twrp-widget-form__select-query-wrapper">
			<span class="twrp-widget-form__select-query-to-add-text">
				<?= _x( 'Select a query(tab) to add:', 'backend', 'twrp' ); ?>
			</span>
			<select class="twrp-widget-form__select-query-to-add">
				<?php foreach ( $queries_ids as $query_id ) : ?>
					<option value="<?= esc_attr( (string) $query_id ) ?>">
						<?= esc_html( DB_Query_Options::get_query_display_name( $query_id ) ); ?>
					</option>
				<?php endforeach; ?>
			</select>
			<button class="twrp-widget-form__select-query-to-add-btn button button-primary" type="button">
				<?= _x( 'Add', 'backend', 'twrp' ); ?>
			</button>
		</p>

		<ul class="twrp-widget-form__selected-queries-list">
			<?php foreach ( $selected_queries_ids as $selected_query_id ) : ?>
				<?php self::display_query_settings( (int) $this->number, (int) $selected_query_id ); ?>
			<?php endforeach; ?>
		</ul>

		<input id="<?= esc_attr( $this->get_field_id( 'queries' ) ); ?>" class="twrp-widget-form__selected-queries"
			type="text" name="<?= esc_attr( $this->get_field_name( 'queries' ) ); ?>"
			value="<?= esc_attr( $selected_queries_list ); ?>"
		/>
		<?php
	}

	// =========================================================================
	// Functions to create each query tab setting.

	/**
	 * Display the settings of a specified query, including the article block
	 * selected.
	 *
	 * @param string|int $widget_id Either the int or the whole widget Id.
	 * @param int $query_id
	 * @return void
	 */
	public static function display_query_settings( $widget_id, $query_id ) {
		try {
			$widget_id = self::twrp_get_widget_id_num( $widget_id );
		} catch ( RuntimeException $e ) {
			return;
		}

		?>
		<li class="twrp-widget-form__selected-query" data-twrp-query-id="<?= esc_attr( (string) $query_id ); ?>">
			<h4 class="twrp-widget-form__selected-query-title">
				<button class="twrp-widget-form__remove-selected-query" type="button" >X</button>
				<?= esc_attr( DB_Query_Options::get_query_display_name( $query_id ) ); ?>
			</h4>

			<div class="twrp-widget-form__selected-query-settings">
				<?php self::display_query_button_text_setting( $widget_id, $query_id ); ?>
				<?php self::display_query_select_artblock( $widget_id, $query_id ); ?>
				<?php self::display_query_wrapper_for_artblock( $widget_id, $query_id ); ?>
			</div>
		</li>
		<?php
	}

	/**
	 * Display the form input field that will let the user choose what button text
	 * the query will have.
	 *
	 * @param int $widget_id
	 * @param int $query_id
	 * @return void
	 */
	protected static function display_query_button_text_setting( $widget_id, $query_id ) {
		$instance_options = self::get_instance_settings( $widget_id );
		?>
		<p>
		<?= _x( 'Tab button text:', 'backend', 'twrp' ); ?>
		<input
			type="text"
			name="<?= esc_attr( self::twrp_get_field_name( $widget_id, $query_id . '[display_title]' ) ); ?>"
			placeholder="<?= _x( 'Display tab title', 'backend', 'twrp' ) ?>"
			value="<?= esc_attr( $instance_options[ $query_id ]['display_title'] ); ?>"
		/>
		</p>
		<?php
	}

	/**
	 * Display a HTML select form control, which will let user choose what article
	 * block to display posts with.
	 *
	 * @param int $widget_id
	 * @param int $query_id
	 * @return void
	 */
	protected static function display_query_select_artblock( $widget_id, $query_id ) {
		$instance_options     = self::get_instance_settings( $widget_id );
		$artblock_id_selected = self::get_selected_artblock_id( $widget_id, $query_id );
		$registered_artblocks = Manage_Component_Classes::get_style_classes();

		$select_name = self::twrp_get_field_name( $widget_id, $query_id . '[' . self::ARTBLOCK_SELECTOR_NAME . ']' );
		$select_val  = $instance_options[ $query_id ][ self::ARTBLOCK_SELECTOR_NAME ];
		?>
		<p>
			Select a style to display:
			<select class="twrp-widget-form__article-block-selector" name="<?= esc_attr( $select_name ); ?>" value="<?= esc_attr( $select_val ); ?>">
				<?php foreach ( $registered_artblocks as $artblock_id => $article_block ) : ?>
					<option
						class="twrp-widget-form__article-block-select-option"
						value="<?= esc_attr( (string) $artblock_id ); ?>"
						<?= $artblock_id_selected === $artblock_id ? 'selected' : '' ?>
					>
						<?= esc_html( $article_block->get_name() ); ?>
					</option>
				<?php endforeach; ?>
			</select>
		</p>
		<?php
	}

	/**
	 * Display the query wrapper for the article block settings.
	 *
	 * @param int $widget_id
	 * @param int $query_id
	 * @return void
	 */
	protected static function display_query_wrapper_for_artblock( $widget_id, $query_id ) {
		$artblock_id_selected = self::get_selected_artblock_id( $widget_id, $query_id );

		?>
		<div class="twrp-widget-form__article-block-settings-container">
			<?php self::display_artblock_settings( $widget_id, $query_id, $artblock_id_selected ); ?>
		</div>
		<?php
	}

	// =========================================================================
	// Functions to display the artblock settings.

	/**
	 * Display the artblock settings for a specific widget and query.
	 *
	 * @param string|int $widget_id Either the int or the whole widget Id.
	 * @param int $query_id
	 * @param string $artblock_id
	 * @return void
	 */
	public static function display_artblock_settings( $widget_id, $query_id, $artblock_id ) {
		try {
			$widget_id = self::twrp_get_widget_id_num( $widget_id );
		} catch ( RuntimeException $e ) {
			return;
		}

		try {
			$artblock = Manage_Component_Classes::get_style_class_by_name( $artblock_id );
		} catch ( \RuntimeException $e ) {
			try {
				$artblock = Manage_Component_Classes::get_style_class_by_name( self::DEFAULT_SELECTED_ARTBLOCK_ID );
			} catch ( \RuntimeException $e ) {
				return;
			}
		}

		$current_settings = self::get_instance_settings( $widget_id );

		?>
		<div class="twrp-widget-form__article-block-settings" data-twrp-selected-artblock="<?= esc_attr( (string) $artblock_id ); ?>" >
			<?php $artblock->display_widget_settings( $widget_id, $query_id, $current_settings ); ?>
		</div>
		<?php
	}

	// =========================================================================
	// Ajax functionality to fetch query settings and artblock settings.

	public static function ajax_create_query_selected_item() {
		$widget_id = $_POST['widget_id'];
		$query_id  = $_POST['query_id'];

		// todo: Verify those 2.
		$widget_id = (int) $widget_id;
		$query_id  = (int) $query_id;

		self::display_query_settings( $widget_id, $query_id );
		die();
	}

	public static function ajax_create_artblock_settings() {
		$artblock_id = $_POST['artblock_id'];
		$widget_id   = $_POST['widget_id'];
		$query_id    = $_POST['query_id'];

		// todo: verify those 3.

		self::display_artblock_settings( $widget_id, $query_id, $artblock_id );
		die();
	}

	// =========================================================================
	// Utility functions

	/**
	 * Get the instance settings array based on.
	 *
	 * @param string|int $widget_id Either the int or the whole widget Id.
	 * @return array
	 */
	public static function get_instance_settings( $widget_id ) {
		try {
			$widget_id = self::twrp_get_widget_id_num( $widget_id );
		} catch ( RuntimeException $e ) {
			return array();
		}

		$instance_options = get_option( 'widget_' . self::TWRP_BASE_ID );
		if ( isset( $instance_options[ $widget_id ] ) ) {
			return $instance_options[ $widget_id ];
		}

		return array();
	}

	/**
	 * Constructs name attributes for use in WP_Widget::form() fields.
	 *
	 * This function is basically the one from WP_Widget Class, but is static
	 * and can be called from outside of the class.
	 *
	 * @param string|int $widget_id Either the int or the whole widget Id.
	 * @param string $field_name The name of the setting to create the name.
	 * @return string The attribute name for that field, corresponding to the widget.
	 */
	public static function twrp_get_field_name( $widget_id, $field_name ) {
		try {
			$widget_id = self::twrp_get_widget_id_num( $widget_id );
		} catch ( RuntimeException $e ) {
			return '';
		}

		$pos = strpos( $field_name, '[' );
		if ( false === $pos ) {
			return 'widget-' . self::TWRP_BASE_ID . '[' . $widget_id . '][' . $field_name . ']';
		} else {
			return 'widget-' . self::TWRP_BASE_ID . '[' . $widget_id . '][' . substr_replace( $field_name, '][', $pos, strlen( '[' ) );
		}
	}

	/**
	 * Constructs id attributes for use in WP_Widget::form() fields. This is the
	 * same as get_field_id(), only that it can be called statically.
	 *
	 * @param string|int $widget_id Either the int or the whole widget Id.
	 * @param string $field_name The name of the setting to create the name.
	 * @return string The attribute name for that field, corresponding to the widget.
	 */
	public static function twrp_get_field_id( $widget_id, $field_name ) {
		try {
			$widget_id = self::twrp_get_widget_id_num( $widget_id );
		} catch ( RuntimeException $e ) {
			return '';
		}

		return 'widget-' . self::TWRP_BASE_ID . '-' . $widget_id . '-' .
		trim( str_replace( array( '[]', '[', ']' ), array( '', '-', '' ), $field_name ), '-' );
	}

	/**
	 * Get the selected article block id exclusive for a query selected within a widget.
	 * Return the constant "DEFAULT_SELECTED_ARTBLOCK_ID" if something is wrong, or article block not set.
	 *
	 * @param string|int $widget_id Either the int or the whole widget Id.
	 * @param int $query_id
	 * @return string
	 */
	protected static function get_selected_artblock_id( $widget_id, $query_id ) {
		try {
			$widget_id = self::twrp_get_widget_id_num( $widget_id );
		} catch ( RuntimeException $e ) {
			return self::DEFAULT_SELECTED_ARTBLOCK_ID;
		}

		$instance_options = self::get_instance_settings( $widget_id );
		if ( ! isset( $instance_options[ $query_id ][ self::ARTBLOCK_SELECTOR_NAME ] ) ) {
			return self::DEFAULT_SELECTED_ARTBLOCK_ID;
		}
		$artblock_id = $instance_options[ $query_id ][ self::ARTBLOCK_SELECTOR_NAME ];

		$registered_artblocks = Manage_Component_Classes::get_style_classes();
		if ( ! isset( $registered_artblocks[ $artblock_id ] ) ) {
			return self::DEFAULT_SELECTED_ARTBLOCK_ID;
		}

		return $artblock_id;
	}

	/**
	 * Get only the widget Id number for this type of widget.
	 *
	 * @throws \RuntimeException If the widget Id cannot be retrieved.
	 *
	 * @param string|int $widget_id Either the int or the whole widget Id.
	 * @return int
	 */
	public static function twrp_get_widget_id_num( $widget_id ) {
		if ( is_numeric( $widget_id ) ) {
			return (int) $widget_id;
		}

		$widget_id_num = ltrim( str_replace( self::TWRP_BASE_ID, '', $widget_id ), '-' );

		if ( is_numeric( $widget_id_num ) ) {
			return (int) $widget_id_num;
		} else {
			throw new \RuntimeException( 'Cannot retrieve a number corresponding to a widget Id.' );
		}
	}

	/**
	 * Get the selected queries id's for a specific widget. The Id's are
	 * verified if they exist before return.
	 *
	 * @param string|int $widget_id Either the int or the whole widget Id.
	 * @return array All queries id's exist and are valid.
	 */
	public static function get_selected_queries( $widget_id ) {
		try {
			$widget_id = self::twrp_get_widget_id_num( $widget_id );
		} catch ( RuntimeException $exception ) {
			return array();
		}
		$queries_ids    = array();
		$settings_names = array_keys( self::get_instance_settings( $widget_id ) );

		foreach ( $settings_names as $possible_query_id ) {
			if ( is_numeric( $possible_query_id ) && DB_Query_Options::query_exists( $possible_query_id ) ) {
				array_push( $queries_ids, $possible_query_id );
			}
		}

		return $queries_ids;
	}

	public static function get_query_instance_settings() {
		// todo.
	}
}
