<?php
/**
 * File that contains the class with the same name.
 *
 * @phpcs:disable Squiz.Commenting.FunctionComment.Missing
 */

namespace TWRP\Admin\Query_Settings_Display;

use TWRP\Query_Setting\Advanced_Arguments;
use TWRP\Utils;

/**
 * Used to display the advanced arguments query setting control.
 */
class Advanced_Arguments_Display extends Query_Setting_Display {

	const CLASS_ORDER = 1000;

	public function get_setting_class() {
		return new Advanced_Arguments();
	}

	public function get_submitted_sanitized_setting() {
		if ( isset( $_POST[ Advanced_Arguments::get_setting_name() ] ) ) { // phpcs:ignore -- Nonce verified
			// phpcs:ignore -- Nonce verified and the setting is sanitized.
			return Advanced_Arguments::sanitize_setting( wp_unslash( $_POST[ Advanced_Arguments::get_setting_name() ] ) );
		}

		return Advanced_Arguments::get_default_setting();
	}

	public function get_title() {
		return _x( 'Advanced query settings', 'backend', 'twrp' );
	}

	public function display_setting( $current_setting ) {
		$selector_name = Advanced_Arguments::get_setting_name() . '[' . Advanced_Arguments::IS_APPLIED__SETTING_NAME . ']';
		$textarea_name = Advanced_Arguments::get_setting_name() . '[' . Advanced_Arguments::CUSTOM_ARGS__SETTING_NAME . ']';

		$advanced_args  = $current_setting[ Advanced_Arguments::CUSTOM_ARGS__SETTING_NAME ];
		$selector_value = $current_setting[ Advanced_Arguments::IS_APPLIED__SETTING_NAME ];

		?>
		<div class="twrp-advanced-args">

			<p class="twrp-query-settings__paragraph">
				<select
					id="twrp-advanced-args__is-applied-selector"
					class="twrp-advanced-args__is-applied-selector"
					name="<?= esc_attr( $selector_name ); ?>"  rows="10"
				>
					<option value="not_apply" <?php selected( $selector_value, 'not_apply' ); ?>>
						<?= _x( 'Not applied', 'backend', 'twrp' ); ?>
					</option>

					<option value="apply" <?php selected( $selector_value, 'apply' ); ?>>
						<?= _x( 'Apply settings', 'backend', 'twrp' ); ?>
					</option>
				</select>
			</p>

			<textarea
				id="twrp-advanced-args__codemirror-textarea"
				name="<?= esc_attr( $textarea_name ); ?>"  rows="10"
			><?= esc_html( $advanced_args ); ?></textarea>
		</div>
		<?php
	}


}
