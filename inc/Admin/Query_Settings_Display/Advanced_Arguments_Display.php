<?php
/**
 * File that contains the class with the same name.
 */

namespace TWRP\Admin\Query_Settings_Display;

use TWRP\Query_Generator\Query_Setting\Advanced_Arguments;

/**
 * Used to display the advanced arguments query setting control.
 */
class Advanced_Arguments_Display extends Query_Setting_Display {

	const CLASS_ORDER = 1000;

	protected function get_setting_class() {
		return new Advanced_Arguments();
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
		<div class="<?php $this->bem_class(); ?>">

			<p class="<?php $this->query_setting_paragraph_class(); ?>">
				<select
					id="<?php $this->bem_class( 'is-applied-selector' ); ?>"
					class="<?php $this->bem_class( 'is-applied-selector' ); ?>"
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
				id="<?php $this->bem_class( 'textarea' ); ?>"
				class="<?php $this->bem_class( 'textarea' ); ?>"
				name="<?= esc_attr( $textarea_name ); ?>"  rows="10"
			><?= esc_html( $advanced_args ); ?></textarea>
		</div>
		<?php
	}

	protected function get_bem_base_class() {
		return 'twrp-advanced-args';
	}

}
