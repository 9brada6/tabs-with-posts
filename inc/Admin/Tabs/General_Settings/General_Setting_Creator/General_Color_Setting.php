<?php
/**
 * File that contains the class with the same name.
 */

namespace TWRP\Admin\Tabs\General_Settings;

/**
 * Class used to create a color setting, in the general settings tab.
 */
class General_Color_Setting extends General_Setting_Creator {

	protected function display_internal_setting() {
		$before = '';

		?>
		<div class="<?php $this->echo_bem_class( 'color-wrapper' ); ?>">
			<input type="hidden" name="<?= esc_attr( $this->name ); ?>" value="<?= esc_attr( $this->value ); ?>"></input>
			<?php if ( isset( $this->all_args['before'] ) ) : ?>
				<span class="<?php $this->echo_bem_class( 'before-color' ); ?>"><?= esc_html( (string) $this->all_args['before'] ); ?></span>
			<?php endif; ?>
			<span class="twrpb-color-picker"></span>
		</div>
		<?php
	}

	protected function get_bem_base_class() {
		return 'twrpb-general-color';
	}

}
