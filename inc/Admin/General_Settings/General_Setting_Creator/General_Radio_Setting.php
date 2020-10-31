<?php
/**
 * File that contains the class with the same name.
 *
 * phpcs:disable Squiz.Commenting.FunctionComment.Missing
 */

namespace TWRP\Admin\General_Settings;

/**
 * Class used to create a radio setting, in the general settings tab.
 *
 * The "General" term used here does NOT mean as the "default" or in general, it
 * means that is primary used for the "General Settings" interface(so contrary
 * to what is to be expected), where a user could change the main settings.
 */
class General_Radio_Setting extends General_Setting_Creator {

	protected function display_internal_setting() {
		?>
		<div class="<?php $this->echo_bem_class( 'checkboxes' ); ?>">
			<?php foreach ( $this->options as $option_value => $text ) : ?>
				<?php
					$radio_id = $this->get_settings_attr_id( $option_value );
					$checked  = ( $option_value === $this->value ? ' checked' : '' );
				?>
				<span class="<?php $this->echo_bem_class( 'selection' ); ?>">
					<input
						id="<?= esc_attr( $radio_id ); ?>"
						type="radio"
						name="<?= esc_attr( $this->name ); ?>"
						value="<?= esc_attr( $option_value ); ?>"
						<?= esc_attr( $checked ); ?>
					>

					<label for="<?= esc_attr( $radio_id ); ?>">
						<?= $text; // phpcs:ignore -- No XSS ?>
					</label>
				</span>
			<?php endforeach; ?>
		</div>
		<?php
	}

	protected function get_bem_base_class() {
		return 'twrpb-general-radio';
	}

}
