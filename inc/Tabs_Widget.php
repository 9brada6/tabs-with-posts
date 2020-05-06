<?php

namespace TWRP;

use TWRP\Admin\Tabs\Queries_Tab;
use \TWRP\Query_Setting\Query_Name;
use TWRP\DB_Query_Options;

class Tabs_Widget extends \WP_Widget {

	private static $instance = 0;

	const TWRP_BASE_ID = 'twrp_tabs_with_recommended_posts';

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

		self::$instance++;
	}

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
		<div
			class="twrp-widget-form"
			data-twrp-widget-id=<?= esc_attr( (string) $this->id ); ?>
			data-twrp-widget-instance=<?= esc_attr( (string) self::$instance ); ?>
		>

			<?php if ( ! empty( $queries ) ) : ?>
				<?php $this->display_select_query_options(); ?>
				<?php $this->display_queries_selected_options( $instance ); ?>
			<?php else : ?>
				<?php $this->display_no_queries_exist(); ?>
			<?php endif; ?>
		</div>
		<?php

		return '';
	}

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

	protected function display_select_query_options() {
		$queries = DB_Query_Options::get_all_queries();
		?>
		<p class="twrp-widget-form__select-query-wrapper">
			<span class="twrp-widget-form__select-query-to-add-text">
				<?= _x( 'Select a query(tab) to add:', 'backend', 'twrp' ); ?>
			</span>
			<select class="twrp-widget-form__select-query-to-add">
				<?php foreach ( $queries as $query_id => $query_settings ) : ?>
					<?php
					if ( isset( $query_settings[ Query_Name::get_setting_name() ] ) ) {
						$name = $query_settings[ Query_Name::get_setting_name() ];
					} else {
						$name = '';
					}

					// This should never be the case, but just to be sure.
					if ( empty( $name ) ) {
						$name = 'Query-' . $query_id;
					}
					?>
					<option value="<?= esc_attr( $query_id ) ?>">
						<?= esc_html( $name ); ?>
					</option>
				<?php endforeach; ?>
			</select>
			<button class="twrp-widget-form__select-query-to-add-btn button button-primary" type="button">
				<?= _x( 'Add', 'backend', 'twrp' ); ?>
			</button>
		</p>
		<?php
	}

	protected function display_queries_selected_options( $instance ) {
		$queries_list = '';
		if ( isset( $instance['queries'] ) ) {
			$queries_list = $instance['queries'];
		}
		?>
		<ul class="twrp-widget-form__selected-queries-list">
		</ul>
		<input
			id="<?= esc_attr( $this->get_field_id( 'queries' ) ); ?>"
			class="twrp-widget-form__selected-queries"
			name="<?= esc_attr( $this->get_field_name( 'queries' ) ); ?>"
			type="text"
			value="<?= esc_attr( $queries_list ); ?>"
		/>
		<?php
	}

	public static function ajax_create_query_selected_item() {
		$widget_id = $_POST['widget_id'];
		$query_id  = $_POST['query_id'];

		if ( ( ! is_string( $query_id ) ) || ( ! is_string( $widget_id ) ) ) {
			die();
		}

		$instance_num     = self::get_instance_number( $widget_id );
		$instance_options = self::get_instance_settings( $widget_id );

		?>
		<li class="twrp-widget-form__selected-query" data-twrp-query-id="<?= esc_attr( $query_id ); ?>">
			<h4 class="twrp-widget-form__selected-query-title">
				<button class="twrp-widget-form__remove-selected-query" type="button" >
					X
				</button>
				Related Posts
			</h4>
			<div class="twrp-widget-form__selected-query-settings">
				<p>
					Tab button text:
					<input
						type="text"
						name="<?= esc_attr( self::twrp_get_field_name( $instance_num, $query_id . '[display_title]' ) ); ?>"
						placeholder="Display tab title"
						value="<?= esc_attr( $instance_options[ $query_id ]['display_title'] ); ?>"
					/>
				</p>
			</div>
		</li>
		<?php
		die();
	}

	/**
	 * Get the instance settings array based on.
	 *
	 * @param string $widget_id
	 *
	 * @return array
	 */
	public static function get_instance_settings( $widget_id ) {
		$instance_options = get_option( 'widget_' . self::TWRP_BASE_ID );
		$widget_instance  = self::get_instance_number( $widget_id );

		if ( isset( $instance_options[ $widget_instance ] ) ) {
			return $instance_options[ $widget_instance ];
		}

		return array();
	}

	public static function twrp_get_field_name( $number, $field_name ) {
		$pos = strpos( $field_name, '[' );
		if ( false === $pos ) {
			return 'widget-' . self::TWRP_BASE_ID . '[' . $number . '][' . $field_name . ']';
		} else {
			return 'widget-' . self::TWRP_BASE_ID . '[' . $number . '][' . substr_replace( $field_name, '][', $pos, strlen( '[' ) );
		}
	}

	public static function get_instance_number( $widget_id ) {
		$instance_options = get_option( 'widget_' . self::TWRP_BASE_ID );
		// @phan-suppress-next-line PhanPartialTypeMismatchArgumentInternal
		$widget_instance = ltrim( str_replace( self::TWRP_BASE_ID, '', $widget_id ), '-' );

		if ( is_numeric( $widget_instance ) ) {
			return $widget_instance;
		}

		return 0;
	}

	public function update( $new_instance, $old_instance ) {
		return $new_instance;
	}

}
