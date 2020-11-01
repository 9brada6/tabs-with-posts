<?php
/**
 * File that contains the class with the same name.
 *
 * @phpcs:disable Squiz.Commenting.FunctionComment.Missing
 */

namespace TWRP\Admin\Query_Settings_Display;

use TWRP\Query_Setting\Meta_Setting;

/**
 * Used to display the advanced arguments query setting control.
 */
class Meta_Display extends Query_Setting_Display {

	const CLASS_ORDER = 130;

	public function get_setting_class() {
		return new Meta_Setting();
	}

	public function get_title() {
		return _x( 'Meta key', 'backend', 'twrp' );
	}

	public function get_submitted_sanitized_setting() {
		if ( isset( $_POST[ Meta_Setting::get_setting_name() ] ) ) { // phpcs:ignore -- Nonce verified
			// phpcs:ignore -- Nonce verified and the setting is sanitized.
			return Meta_Setting::sanitize_setting( wp_unslash( $_POST[ Meta_Setting::get_setting_name() ] ) );
		}

		return Meta_Setting::get_default_setting();
	}

	public function display_setting( $current_setting ) {
		$comparators    = Meta_Setting::get_meta_key_comparators();
		$meta_key_name  = Meta_Setting::get_setting_name() . '[' . Meta_Setting::META_KEY_NAME__SETTING_NAME . ']';
		$meta_key_value = $current_setting[ Meta_Setting::META_KEY_NAME__SETTING_NAME ];

		$meta_compare_name  = Meta_Setting::get_setting_name() . '[' . Meta_Setting::META_KEY_COMPARATOR__SETTING_NAME . ']';
		$meta_compare_value = $current_setting[ Meta_Setting::META_KEY_COMPARATOR__SETTING_NAME ];

		$meta_value_name  = Meta_Setting::get_setting_name() . '[' . Meta_Setting::META_KEY_VALUE__SETTING_NAME . ']';
		$meta_value_value = $current_setting[ Meta_Setting::META_KEY_VALUE__SETTING_NAME ];

		?>
		<div class="twrp-meta-setting">
			<div class="twrp-query-settings__paragraph">
				<input id="twrp-meta-setting__meta-key" type="text" name="<?= esc_attr( $meta_key_name ); ?>" value="<?= esc_attr( $meta_key_value ); ?>"/>

				<select name="<?= esc_attr( $meta_compare_name ); ?>">
					<?php foreach ( $comparators as $value => $display ) : ?>
						<option
							value="<?= esc_attr( $value ); ?>"
							<?php selected( $value, $meta_compare_value ); ?>
						>
							<?= esc_html( $display ); ?>
						</option>
					<?php endforeach; ?>
				</select>

				<input id="twrp-meta-setting__meta-key-value" type="text" name="<?= esc_attr( $meta_value_name ); ?>" value="<?= esc_attr( $meta_value_value ); ?>"/>
			</div>
		</div>
		<?php
	}

}
