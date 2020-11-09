<?php
/**
 * File that contains the class with the same name.
 */

namespace TWRP\Admin\Tabs\Query_Options;

use TWRP\Query_Generator\Query_Setting\Meta_Setting;

/**
 * Used to display the advanced arguments query setting control.
 */
class Meta_Display extends Query_Setting_Display {

	public static function get_class_order_among_siblings() {
		return 130;
	}

	protected function get_setting_class() {
		return new Meta_Setting();
	}

	public function get_title() {
		return _x( 'Meta key', 'backend', 'twrp' );
	}

	public function display_setting( $current_setting ) {
		$comparators    = Meta_Setting::get_meta_key_comparators();
		$meta_key_name  = Meta_Setting::get_setting_name() . '[' . Meta_Setting::META_KEY_NAME__SETTING_NAME . ']';
		$meta_key_value = $current_setting[ Meta_Setting::META_KEY_NAME__SETTING_NAME ];

		$meta_compare_name  = Meta_Setting::get_setting_name() . '[' . Meta_Setting::META_KEY_COMPARATOR__SETTING_NAME . ']';
		$meta_compare_value = $current_setting[ Meta_Setting::META_KEY_COMPARATOR__SETTING_NAME ];

		$meta_value_name  = Meta_Setting::get_setting_name() . '[' . Meta_Setting::META_KEY_VALUE__SETTING_NAME . ']';
		$meta_value_value = $current_setting[ Meta_Setting::META_KEY_VALUE__SETTING_NAME ];

		$additional_input_hidden_class = '';
		if ( 'EXISTS' === $meta_compare_value || 'NOT EXISTS' === $meta_compare_value ) {
			$additional_input_hidden_class = ' twrpb-hidden';
		}

		?>
		<div class="<?php $this->bem_class(); ?>">
			<div class="<?php $this->bem_class( 'setting-wrapper' ); ?> <?php $this->query_setting_paragraph_class(); ?>">
				<input id="<?php $this->bem_class( 'meta-key' ); ?>" type="text" name="<?= esc_attr( $meta_key_name ); ?>" value="<?= esc_attr( $meta_key_value ); ?>"/>

				<select id="<?php $this->bem_class( 'js-meta-type' ); ?>" name="<?= esc_attr( $meta_compare_name ); ?>">
					<?php foreach ( $comparators as $value => $display ) : ?>
						<option
							value="<?= esc_attr( $value ); ?>"
							<?php selected( $value, $meta_compare_value ); ?>
						>
							<?= esc_html( $display ); ?>
						</option>
					<?php endforeach; ?>
				</select>

				<input id="<?php $this->bem_class( 'js-meta-value' ); ?>" class="<?php $this->bem_class( 'meta-value' ); ?><?= esc_attr( $additional_input_hidden_class ); ?>" type="text" name="<?= esc_attr( $meta_value_name ); ?>" value="<?= esc_attr( $meta_value_value ); ?>"/>
			</div>
		</div>
		<?php
	}

	protected function get_bem_base_class() {
		return 'twrpb-meta-setting';
	}

}
