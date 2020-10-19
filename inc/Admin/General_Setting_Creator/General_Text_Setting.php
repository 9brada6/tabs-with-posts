<?php
/**
 * File that contains the class with the same name.
 *
 * phpcs:disable Squiz.Commenting.FunctionComment.Missing
 */

namespace TWRP\Admin;

/**
 * Class used to create a text setting, in the general settings tab.
 *
 * The "General" term used here does NOT mean as the "default" or in general, it
 * means that is primary used for the "General Settings" interface(so contrary
 * to what is to be expected), where a user could change the main settings.
 */
class General_Text_Setting extends General_Setting_Creator {

	protected function display_internal_setting() {
		?>
		<div class="<?php $this->echo_bem_class( 'wrapper' ); ?>">
			<input
				id="<?= esc_attr( $this->get_settings_attr_id() ); ?>"
				type="text"
				name="<?= esc_attr( $this->name ); ?>"
				value="<?= esc_attr( $this->value ); ?>"
				<?php $this->display_input_attributes(); ?>
			/>
		</div>
		<?php
	}

	protected function get_bem_base_class() {
		return 'twrpb-general-text';
	}
}
