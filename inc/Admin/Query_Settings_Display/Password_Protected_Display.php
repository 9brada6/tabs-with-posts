<?php
/**
 * File that contains the class with the same name.
 *
 * @phpcs:disable Squiz.Commenting.FunctionComment.Missing
 */

namespace TWRP\Admin\Query_Settings_Display;

use TWRP\Query_Setting\Password_Protected;

/**
 * Used to display the password protected query setting control.
 */
class Password_Protected_Display extends Query_Setting_Display {

	const CLASS_ORDER = 120;

	public function get_setting_class() {
		return new Password_Protected();
	}

	public function get_title() {
		return _x( 'Filter by password', 'backend', 'twrp' );
	}

	public function get_submitted_sanitized_setting() {
		if ( isset( $_POST[ Password_Protected::get_setting_name() ] ) ) { // phpcs:ignore -- Nonce verified
			// phpcs:ignore -- Nonce verified and the setting is sanitized.
			return Password_Protected::sanitize_setting( wp_unslash( $_POST[ Password_Protected::get_setting_name() ] ) );
		}

		return Password_Protected::get_default_setting();
	}

	public function display_setting( $current_setting ) {
		$select_name     = Password_Protected::get_setting_name() . '[' . Password_Protected::PASSWORD_PROTECTED__SETTING_NAME . ']';
		$current_setting = $current_setting[ Password_Protected::PASSWORD_PROTECTED__SETTING_NAME ];

		$not_applied_text  = _x( 'Not Applied (Posts with and without password)', 'backend', 'twrp' );
		$has_password_text = _x( 'Only posts with password', 'backend', 'twrp' );
		$no_password_text  = _x( 'Only posts without password', 'backend', 'twrp' );

		?>
		<div class="twrp-password-settings">
			<div class="twrp-query-settings__paragraph">
				<select name="<?= esc_attr( $select_name ); ?>">
					<option value="not_applied" <?php selected( 'not_applied', $current_setting ); ?>>
						<?= esc_html( $not_applied_text ); ?>
					</option>
					<option value="has_password" <?php selected( 'has_password', $current_setting ); ?>>
						<?= esc_html( $has_password_text ); ?>
					</option>
					<option value="no_password" <?php selected( 'no_password', $current_setting ); ?>>
						<?= esc_html( $no_password_text ); ?>
					</option>
				</select>
			</div>
		</div>
		<?php
	}


}
