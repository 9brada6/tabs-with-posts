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
		echo '</div>';

		echo $args['after_widget']; // phpcs:ignore
	}

	// =========================================================================
	// Functions to sanitize the settings.

	public function update( $new_instance, $old_instance ) {
		return self::sanitize_instance_settings( $new_instance );
	}

	public static function sanitize_instance_settings( $settings ) {
		$settings = self::sanitize_query_list_setting( $settings );

		return $settings;
	}

	protected static function sanitize_query_list_setting( $settings ) {
		if ( ! isset( $settings['queries'] ) ) {
			$settings['queries'] = '';
		}
		$queries           = explode( ';', $settings['queries'] );
		$valid_queries_ids = array();
		foreach ( $queries as $query_id ) {
			if ( ! is_numeric( $query_id ) ) {
				continue;
			}
			if ( DB_Query_Options::query_exists( $query_id ) ) {
				array_push( $valid_queries_ids, $query_id );
			}
		}

		$sanitized_settings = array();
		foreach ( $valid_queries_ids as $query_id ) {
			$sanitized_settings[ $query_id ] = $settings[ $query_id ];
		}
		$sanitized_settings['queries'] = implode( ';', $valid_queries_ids );

		return $sanitized_settings;
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

	/**
	 * Display the settings of a specified query, including the article block
	 * selected.
	 *
	 * @param int $widget_id
	 * @param int $query_id
	 *
	 * @return void
	 */
	public static function display_query_settings( $widget_id, $query_id ) {
		?>
		<li class="twrp-widget-form__selected-query" data-twrp-query-id="<?= esc_attr( (string) $query_id ); ?>">
			<h4 class="twrp-widget-form__selected-query-title">
				<button class="twrp-widget-form__remove-selected-query" type="button" >X</button>
				<?= esc_attr( DB_Query_Options::get_query_display_name( $query_id ) ); ?>
			</h4>

			<div class="twrp-widget-form__selected-query-settings">
				<?php self::display_query_button_text_setting( $widget_id, $query_id ); ?>
				<?php self::display_query_select_artblock_setting( $widget_id, $query_id ); ?>
				<?php self::display_query_wrapper_for_artblock_setting( $widget_id, $query_id ); ?>
			</div>
		</li>
		<?php
	}

	/**
	 * Todo.
	 */
	protected static function display_query_button_text_setting( $widget_id, $query_id ) {
		$instance_options = self::get_instance_settings( $widget_id );
		?>
		<p>
		Tab button text:
		<input
			type="text"
			name="<?= esc_attr( self::twrp_get_field_name( $widget_id, $query_id . '[display_title]' ) ); ?>"
			placeholder="Display tab title"
			value="<?= esc_attr( $instance_options[ $query_id ]['display_title'] ); ?>"
		/>
		</p>
		<?php
	}

	protected static function display_query_select_artblock_setting( $widget_id, $query_id ) {
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

	protected static function display_query_wrapper_for_artblock_setting( $widget_id, $query_id ) {
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
	 * @param int $widget_id
	 * @param int $query_id
	 * @param string $artblock_id
	 *
	 * @return void
	 */
	public static function display_artblock_settings( $widget_id, $query_id, $artblock_id ) {
		$current_settings = self::get_instance_settings( $widget_id );
		try {
			$artblock = Manage_Component_Classes::get_style_class_by_name( $artblock_id );
		} catch ( \RuntimeException $e ) {
			try {
				$artblock = Manage_Component_Classes::get_style_class_by_name( self::DEFAULT_SELECTED_ARTBLOCK_ID );
			} catch ( \RuntimeException $e ) {
				return;
			}
		}
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
	 * Get only the widget Id number for this type of widget, the number is
	 * taken from the full widget id.
	 *
	 * @throws \RuntimeException If the widget Id cannot be retrieved.
	 * @param string $widget_id The full widget Id has the id_base of the widget
	 *                          appended with the unique id number.
	 * @return int
	 */
	public static function twrp_get_widget_id_num( $widget_id ) {
		$widget_id_num = ltrim( str_replace( self::TWRP_BASE_ID, '', $widget_id ), '-' );

		if ( is_numeric( $widget_id_num ) ) {
			return (int) $widget_id_num;
		} else {
			throw new \RuntimeException( 'Cannot retrieve a number corresponding to a widget Id.' );
		}
	}

	/**
	 * Get the instance settings array based on.
	 *
	 * @param int $widget_id The widget Id number.
	 *
	 * @return array
	 */
	public static function get_instance_settings( $widget_id ) {
		$instance_options = get_option( 'widget_' . self::TWRP_BASE_ID );
		if ( isset( $instance_options[ $widget_id ] ) ) {
			return $instance_options[ $widget_id ];
		}

		return array();
	}

	public static function get_query_instance_settings() {
		// todo.
	}

	/**
	 * Constructs name attributes for use in WP_Widget::form() fields. The
	 * name will be specifically for only a widget instance. This function is
	 * basically the one from WP_Widget Class, but is static and can be called
	 * from outside of the class.
	 *
	 * @param int $widget_id The number of the widget Id.
	 * @param string $field_name The name of the setting to create the name.
	 *
	 * @return string The attribute name for that field, corresponding to the widget.
	 */
	public static function twrp_get_field_name( $widget_id, $field_name ) {
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
	 * @param int $widget_id The number of the widget Id.
	 * @param string $field_name The name of the setting to create the name.
	 *
	 * @return string The attribute name for that field, corresponding to the widget.
	 */
	public static function twrp_get_field_id( $widget_id, $field_name ) {
		return 'widget-' . self::TWRP_BASE_ID . '-' . $widget_id . '-' .
		trim( str_replace( array( '[]', '[', ']' ), array( '', '-', '' ), $field_name ), '-' );
	}



	/**
	 * Get the selected article block id exclusive for a query selected within a widget.
	 * Return empty string if no article block selected or the article block was
	 * not registered.
	 *
	 * @param int $widget_id
	 * @param int $query_id
	 *
	 * @return string
	 */
	protected static function get_selected_artblock_id( $widget_id, $query_id ) {

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
}
