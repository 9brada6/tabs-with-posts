<?php

namespace TWRP;

use TWRP\Admin\Tabs\Queries_Tab;
use \TWRP\Query_Setting\Query_Name;
use TWRP\DB_Query_Options;

class Tabs_Widget extends \WP_Widget {

	private static $instance = 0;

	public function __construct() {

		$description = _x( 'Tabs with recommended posts. The settings are available at Settings->Tabs With Recommended Posts', 'backend', 'twrp' );
		$widget_ops  = array(
			'classname'                   => 'twrp-widget',
			'description'                 => $description,
			'customize_selective_refresh' => true,
		);

		parent::__construct(
			'twrp_tabs_with_recommended_posts',
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
				<?php $this->display_queries_selected_options(); ?>
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

	protected function display_queries_selected_options() {
		?>
		<ul class="twrp-widget-form__selected-queries-list">
		</ul>
		<input
			id="<?= esc_attr( $this->get_field_id( 'queries' ) ); ?>"
			class="twrp-widget-form__selected-queries"
			name="<?= esc_attr( $this->get_field_name( 'queries' ) ); ?>"
			type="text"
		/>
		<?php
	}

	public static function ajax_create_query_selected_item() {
		$widget_id = $_POST['widget_id'];
		$query_id  = $_POST['query_id'];

		if ( ! is_string( $query_id ) ) {
			die();
		}

		?>
		<li class="twrp-widget-form__selected-query" data-twrp-query-id="<?= esc_attr( $query_id ); ?>">
			<h4 class="twrp-widget-form__selected-query-title">
				Related Posts
			</h4>

			<div class="twrp-widget-form__selected-query-settings">
				<p>
					Tab button text: <input type="text" placeholder="Display tab title" />
				</p>

				<select>
					<option>Style 1</option>
					<option>Style 2</option>
				</select>
			</div>
		</li>
		<?php
		die();
	}

	public function update( $new_instance, $old_instance ) {
		return $new_instance;
	}

}
