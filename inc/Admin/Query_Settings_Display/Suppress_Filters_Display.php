<?php
/**
 * File that contains the class with the same name.
 *
 * @phpcs:disable Squiz.Commenting.FunctionComment.Missing
 */

namespace TWRP\Admin\Query_Settings_Display;

use TWRP\Query_Generator\Query_Setting\Suppress_Filters;

/**
 * Used to display the advanced arguments query setting control.
 */
class Suppress_Filters_Display extends Query_Setting_Display {

	const CLASS_ORDER = 140;

	protected function get_setting_class() {
		return new Suppress_Filters();
	}

	public function get_title() {
		return _x( 'Suppress other plugins/theme query filters', 'backend', 'twrp' );
	}

	public function get_submitted_sanitized_setting() {
		if ( isset( $_POST[ Suppress_Filters::get_setting_name() ] ) ) { // phpcs:ignore -- Nonce verified
			// phpcs:ignore -- Nonce verified and the setting is sanitized.
			return Suppress_Filters::sanitize_setting( wp_unslash( $_POST[ Suppress_Filters::get_setting_name() ] ) );
		}

		return Suppress_Filters::get_default_setting();
	}

	public function display_setting( $current_setting ) {
		$suppress_the_filters = $current_setting[ Suppress_Filters::SUPPRESS_FILTERS__SETTING_NAME ];
		$name                 = Suppress_Filters::get_setting_name() . '[' . Suppress_Filters::SUPPRESS_FILTERS__SETTING_NAME . ']';
		?>
		<div class="<?php $this->bem_class(); ?>">
			<div class="<?php $this->query_setting_paragraph_class(); ?> twrp-setting-note">
				<span class="twrp-setting-note__label">
					<?= _x( 'Note:', 'backend', 'twrp' ); ?>
				</span>
				<span class="twrp-setting-note__text">
					<?= _x( 'Some theme/plugins can alter any WP database query, modifying it\'s results in unexpected ways. Fortunately, with this setting we can suppress/allow them all together.', 'backend', 'twrp' ); ?>
				</span>
			</div>

			<div class="<?php $this->query_setting_paragraph_class(); ?>">
				<select id="<?php $this->bem_class( 'suppress-filters' ); ?>" name="<?= esc_attr( $name ); ?>">
					<option value="true" <?= selected( $suppress_the_filters, 'true' ); ?>>
						<?= _x( 'Suppress the filters', 'backend', 'twrp' ); ?>
					</option>
					<option value="false" <?= selected( $suppress_the_filters, 'false' ); ?>>
						<?= _x( 'Do not suppress the filters', 'backend', 'twrp' ); ?>
					</option>
				</select>
			</div>
		</div>
		<?php
	}

	protected function get_bem_base_class() {
		return 'twrp-filters-setting';
	}

}
