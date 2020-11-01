<?php
/**
 * File that contains the class with the same name.
 *
 * @phpcs:disable Squiz.Commenting.FunctionComment.Missing
 */

namespace TWRP\Admin\Query_Settings_Display;

use TWRP\Query_Setting\Query_Name;

/**
 * Used to display the query name setting control.
 */
class Query_Name_Display extends Query_Setting_Display {

	const CLASS_ORDER = 0;

	protected function get_setting_class() {
		return new Query_Name();
	}

	public function get_title() {
		return _x( 'Name of the query', 'backend', 'twrp' );
	}

	public function setting_is_collapsed() {
		return true;
	}

	public function get_submitted_sanitized_setting() {
		if ( isset( $_POST[ Query_Name::get_setting_name() ] ) ) { // phpcs:ignore -- Nonce verified
			// phpcs:ignore -- Nonce verified and the setting is sanitized.
			return Query_Name::sanitize_setting( wp_unslash( $_POST[ Query_Name::get_setting_name() ] ) );
		}

		return Query_Name::get_default_setting();
	}

	public function display_setting( $current_setting ) {
		$name        = Query_Name::get_setting_name() . '[' . Query_Name::QUERY_NAME__SETTING_NAME . ']';
		$value       = $current_setting[ Query_Name::QUERY_NAME__SETTING_NAME ];
		$placeholder = _x( 'Ex: Related Posts', 'backend', 'twrp' );

		?>
		<div class="twrp-name-setting">
			<div class="twrp-query-settings__paragraph">
			<input
				id="twrp-name-setting__name"
				class="twrp-name-setting__name" type="text"
				name="<?= esc_attr( $name ) ?>"
				value="<?= esc_attr( $value ) ?>"
				placeholder="<?= esc_attr( $placeholder ) ?>"
			/>
			</div>


			<div class="twrp-setting-note twrp-query-settings__paragraph">
				<span class="twrp-setting-note__label">
					<?= _x( 'Note:', 'backend', 'twrp' ); ?>
				</span>
				<span class="twrp-setting-note__text">
					<?= _x( 'The name will be visible ONLY in the admin screen.', 'backend', 'twrp' ); ?>
				</span>
			</div>
		</div>
		<?php
	}

}
