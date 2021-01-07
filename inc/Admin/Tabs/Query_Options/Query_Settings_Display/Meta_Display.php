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
		$comparators          = Meta_Setting::get_meta_key_comparators();
		$meta_key_name        = Meta_Setting::get_setting_name() . '[' . Meta_Setting::META_KEY_NAME__SETTING_NAME . ']';
		$meta_is_applied_name = Meta_Setting::get_setting_name() . '[' . Meta_Setting::META_IS_APPLIED__SETTING_NAME . ']';

		$meta_apply_value             = $current_setting[ Meta_Setting::META_IS_APPLIED__SETTING_NAME ];
		$additional_meta_hidden_class = ' twrpb-hidden';
		if ( 'NA' !== $meta_apply_value ) {
			$additional_meta_hidden_class = '';
		}

		$meta_key_value = $current_setting[ Meta_Setting::META_KEY_NAME__SETTING_NAME ];

		$meta_compare_name  = Meta_Setting::get_setting_name() . '[' . Meta_Setting::META_KEY_COMPARATOR__SETTING_NAME . ']';
		$meta_compare_value = $current_setting[ Meta_Setting::META_KEY_COMPARATOR__SETTING_NAME ];

		$meta_value_name  = Meta_Setting::get_setting_name() . '[' . Meta_Setting::META_KEY_VALUE__SETTING_NAME . ']';
		$meta_value_value = $current_setting[ Meta_Setting::META_KEY_VALUE__SETTING_NAME ];

		$additional_value_hidden_class = '';
		if ( 'EXISTS' === $meta_compare_value || 'NOT EXISTS' === $meta_compare_value ) {
			$additional_value_hidden_class = ' twrpb-hidden';
		}

		$name_placeholder  = _x( 'Meta Name', 'backend', 'twrp' );
		$value_placeholder = _x( 'Meta Value', 'backend', 'twrp' );
		?>
		<div class="<?php $this->bem_class(); ?>">
			<select id="<?php $this->bem_class( 'js-apply-meta-select' ); ?>" class="<?php $this->bem_class( 'apply-meta-select' ); ?> <?php $this->query_setting_paragraph_class(); ?>" name="<?= esc_attr( $meta_is_applied_name ); ?>">
				<option value="NA" <?php selected( $meta_apply_value, 'NA' ); ?>><?= esc_html( _x( 'Not Applied', 'backend', 'twrp' ) ); ?></option>
				<option value="A" <?php selected( $meta_apply_value, 'A' ); ?>><?= esc_html( _x( 'Apply Meta', 'backend', 'twrp' ) ); ?></option>
			</select>

			<div id="<?php $this->bem_class( 'js-setting-wrapper' ); ?>" class="<?php $this->bem_class( 'setting-wrapper' ); ?> <?php $this->query_setting_paragraph_class(); ?><?= esc_attr( $additional_meta_hidden_class ); ?>">
				<div class="<?php $this->bem_class( 'input-group' ); ?>">
					<label for="<?php $this->bem_class( 'meta-key' ); ?>" class="<?php $this->bem_class( 'input-label' ); ?>">
						<?= esc_html( _x( 'Meta Name:', 'backend', 'twrp' ) ); ?>
					</label>
					<input id="<?php $this->bem_class( 'meta-key' ); ?>" type="text" placeholder="<?= esc_attr( $name_placeholder ); ?>" name="<?= esc_attr( $meta_key_name ); ?>" value="<?= esc_attr( $meta_key_value ); ?>"/>
				</div>

				<div class="<?php $this->bem_class( 'input-group' ); ?>">
					<label for="<?php $this->bem_class( 'js-meta-type' ); ?>" class="<?php $this->bem_class( 'input-label' ); ?>">
						<?= esc_html( _x( 'Meta Comparator:', 'backend', 'twrp' ) ); ?>
					</label>
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
				</div>

				<div id="<?php $this->bem_class( 'js-meta-value-group' ); ?>" class="<?php $this->bem_class( 'input-group' ); ?> <?= esc_attr( $additional_value_hidden_class ); ?>">
					<label for="<?php $this->bem_class( 'js-meta-value' ); ?>" class="<?php $this->bem_class( 'input-label' ); ?>">
						<?= esc_html( _x( 'Meta Value:', 'backend', 'twrp' ) ); ?>
					</label>
					<input id="<?php $this->bem_class( 'js-meta-value' ); ?>" class="<?php $this->bem_class( 'meta-value' ); ?>" placeholder="<?= esc_attr( $value_placeholder ); ?>" type="text" name="<?= esc_attr( $meta_value_name ); ?>" value="<?= esc_attr( $meta_value_value ); ?>"/>
				</div>
			</div>
		</div>
		<?php
	}

	protected function get_bem_base_class() {
		return 'twrpb-meta-setting';
	}

}