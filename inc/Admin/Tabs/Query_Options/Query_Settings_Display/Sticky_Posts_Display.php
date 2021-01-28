<?php

namespace TWRP\Admin\Tabs\Query_Options;

use TWRP\Query_Generator\Query_Setting\Sticky_Posts;

/**
 * Used to display the sticky posts query setting control.
 */
class Sticky_Posts_Display extends Query_Setting_Display {

	public static function get_class_order_among_siblings() {
		return 90;
	}

	protected function get_setting_class() {
		return new Sticky_Posts();
	}

	public function get_title() {
		return _x( 'Sticky posts inclusion', 'backend', 'twrp' );
	}

	public function display_setting( $current_setting ) {
		$name            = Sticky_Posts::get_setting_name() . '[' . Sticky_Posts::INCLUSION__SETTING_NAME . ']';
		$selected_option = $current_setting[ Sticky_Posts::INCLUSION__SETTING_NAME ];
		?>
		<div class="<?php $this->bem_class(); ?>">
			<p class="<?php $this->query_setting_paragraph_class(); ?>">
				<select class="<?php $this->bem_class( 'selector' ); ?>" name="<?= esc_attr( $name ); ?>">
					<option value="not_include" <?php selected( $selected_option, 'not_include' ); ?>>
						<?= _x( 'Do not bring the sticky posts first', 'backend', 'twrp' ); ?>
					</option>

					<option value="include" <?php selected( $selected_option, 'include' ); ?>>
						<?= _x( 'Bring the sticky posts to be first(at the top)', 'backend', 'twrp' ); ?>
					</option>
				</select>
			</p>
		</div>
		<?php
	}

	protected function get_bem_base_class() {
		return 'twrpb-sticky-setting';
	}

}
