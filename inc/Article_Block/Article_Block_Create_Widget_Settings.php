<?php
/**
 * File containing a trait class, used by the article blocks.
 *
 * @package Tabs_With_Recommended_Posts
 */

namespace TWRP\Article_Block;

/**
 * Contains all the traits that are necessary to create the HTML in the backend
 * for the widget form settings.
 */
trait Article_Block_Create_Widget_Settings {

	// widget_id, query_id, current_setting, $args[]
	protected function create_checkbox_setting( $setting_name, $after ) {
		$input_id   = $this->create_input_id( $setting_name );
		$input_name = $this->create_input_name( $setting_name );

		$current_checked = $this->get_current_setting( $setting_name );

		?>
		<p class="twrp-artblock-form__paragraph">
			<input
				id="<?= esc_attr( $input_id ); ?>"
				class="twrp-artblock-form__checkbox"
				type="checkbox" value="1"
				name="<?= esc_attr( $input_name ); ?>"
				<?php checked( $current_checked, '1' ); ?>
			/>

			<label for="<?= esc_attr( $input_id ); ?>" class="twrp-artblock-form__checkbox-label">
				<?= $after // phpcs:ignore -- XSS safe. ?>
			</label>
		</p>
		<?php
	}
}
