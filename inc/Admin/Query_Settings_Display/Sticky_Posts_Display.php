<?php
/**
 * File that contains the class with the same name.
 *
 * @phpcs:disable Squiz.Commenting.FunctionComment.Missing
 */

namespace TWRP\Admin\Query_Settings_Display;

use TWRP\Query_Setting\Sticky_Posts;

/**
 * Used to display the sticky posts query setting control.
 */
class Sticky_Posts_Display extends Query_Setting_Display {

	const CLASS_ORDER = 90;

	public function get_setting_class() {
		return new Sticky_Posts();
	}

	public function get_title() {
		return _x( 'Sticky posts inclusion', 'backend', 'twrp' );
	}

	public function get_submitted_sanitized_setting() {
		if ( isset( $_POST[ Sticky_Posts::get_setting_name() ] ) ) { // phpcs:ignore -- Nonce verified
			// phpcs:ignore -- Nonce verified and the setting is sanitized.
			return Sticky_Posts::sanitize_setting( wp_unslash( $_POST[ Sticky_Posts::get_setting_name() ] ) );
		}

		return Sticky_Posts::get_default_setting();
	}

	public function display_setting( $current_setting ) {
		$name            = Sticky_Posts::get_setting_name() . '[' . Sticky_Posts::INCLUSION__SETTING_NAME . ']';
		$selected_option = $current_setting[ Sticky_Posts::INCLUSION__SETTING_NAME ];
		?>
		<div class="twrp-sticky-setting">
			<p class="twrp-query-settings__paragraph">
				<select class="twrp-sticky-setting__selector" name="<?= esc_attr( $name ); ?>">
					<option value="not_include" <?php selected( $selected_option, 'not_include' ); ?>>
						<?= _x( 'Do not include sticky posts', 'backend', 'twrp' ); ?>
					</option>

					<option value="include" <?php selected( $selected_option, 'include' ); ?>>
						<?= _x( 'Include sticky posts', 'backend', 'twrp' ); ?>
					</option>
				</select>
			</p>
		</div>
		<?php
	}

}
