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

	public function form( $instance ) {
		$queries = DB_Query_Options::get_all_queries();
		?>
		<div id="twrp-widget-form__id-<?= esc_attr( (string) self::$instance ) ?>" class="twrp-widget-form">
			<?php if ( ! empty( $queries ) ) : ?>
				<?php $this->display_select_query_options(); ?>
			<?php else : ?>

			<?php endif; ?>
		</div>

		<?php
	}

	protected function display_select_query_options() {
		$queries = DB_Query_Options::get_all_queries();
		?>
		<p class="twrp-widget-form__select-query-wrapper">
			<span class="twrp-widget-form__select-query-to-add-text">
				<?= _x( 'Select a query to add:', 'backend', 'twrp' ); ?>
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
			<button class="twrp-widget-form__select-query-to-add-btn button button-primary">
				<?= _x( 'Add Query', 'backend', 'twrp' ); ?>
			</button>
		</p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {

	}

}
