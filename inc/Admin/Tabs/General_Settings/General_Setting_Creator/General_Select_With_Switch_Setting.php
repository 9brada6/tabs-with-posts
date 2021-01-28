<?php

namespace TWRP\Admin\Tabs\General_Settings;

/**
 * Class used to create a select setting with switch, in the general settings
 * tab. Be careful, this class inherits General_Select_Setting.
 *
 * This class used an additional 'switch' key, passed in the creation of the
 * class as the parameter argument(third argument). The switch key must be an
 * array, that contains the key 'title', 'name', 'value'.
 *
 * The value given to switch must be either "true" or "false".
 *
 * The "General" term used here does NOT mean as the "default" or in general, it
 * means that is primary used for the "General Settings" interface(so contrary
 * to what is to be expected), where a user could change the main settings.
 */
class General_Select_With_Switch_Setting extends General_Select_Setting {

	protected function display_internal_setting() {

		if ( isset( $this->all_args['switch'] ) ) {
			$switch_args = $this->all_args['switch'];
		} else {
			return;
		}

		if ( ! isset( $switch_args['name'], $switch_args['title'], $switch_args['value'] ) ) {
			return;
		}

		$switch_name  = $switch_args['name'];
		$switch_title = $switch_args['title'];
		$value        = $switch_args['value'];

		$disabled_value_checked = ( 'false' === $value ? 'checked' : '' );
		$enabled_value_checked  = ( 'true' === $value ? 'checked' : '' );

		$enabled_aria_label  = _x( 'Yes', 'backend', 'twrp' );
		$disabled_aria_label = _x( 'No', 'backend', 'twrp' );

		?>
		<div class="<?php $this->bem_class( 'switch-wrapper' ); ?>">
			<div class="twrpb-switch <?php $this->bem_class( 'switch' ); ?>">
				<input
					id="<?= esc_attr( $this->get_settings_attr_id( 'false' ) ); ?>"
					class="twrpb-switch__input" type="radio"
					name="<?= esc_attr( $switch_name ); ?>"
					value="false"
					<?= esc_html( $disabled_value_checked ); ?>
				/>

				<input
					id="<?= esc_attr( $this->get_settings_attr_id( 'true' ) ); ?>"
					class="twrpb-switch__input" type="radio"
					name="<?= esc_attr( $switch_name ); ?>"
					value="true"
					<?= esc_html( $enabled_value_checked ); ?>
				/>

				<span class="twrpb-switch__slider">
					<label for="<?= esc_attr( $this->get_settings_attr_id( 'false' ) ); ?>" class="twrpb-switch__slider-label-disabled" aria-label="<?= esc_attr( $disabled_aria_label ); ?>"></label>
					<label for="<?= esc_attr( $this->get_settings_attr_id( 'true' ) ); ?>" class="twrpb-switch__slider-label-enabled" aria-label="<?= esc_attr( $enabled_aria_label ); ?>"></label>
				</span>
			</div>
			<div class="<?php $this->bem_class( 'switch-title' ); ?>">
				<?= esc_html( $switch_title ); ?>
			</div>
		</div>
		<?php
		parent::display_internal_setting();
	}

}
