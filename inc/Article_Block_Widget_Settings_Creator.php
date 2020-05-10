<?php
/**
 * This file contains a class used to simplify the creation of each article
 * block widget settings.
 */

namespace TWRP;

use TWRP\Tabs_Widget;

class Article_Block_Widget_Settings_Creator {
	protected $widget_id;
	protected $query_id;
	protected $current_settings;

	public function __construct( $widget_id, $query_id, $current_settings ) {
		$this->widget_id        = $widget_id;
		$this->query_id         = $query_id;
		$this->current_settings = $current_settings;
	}

	/**
	 * Given an array of settings,for each one of them create the specific setting.
	 *
	 * @param array $settings
	 *
	 * @return void
	 */
	public function create_settings( $settings ) {
		if ( ! is_array( $settings ) ) {
			return;
		}

		foreach ( $settings as $setting ) {
			if ( ! isset( $setting['type'] ) ) {
				continue;
			}
			$type = $setting['type'];

			if ( 'checkbox' === $type ) {
				$this->create_checkbox_setting( $setting );
			}
		}
	}

	// =========================================================================
	// Settings by type of form fields.

	public function display_checkbox_setting( $name, $default, $after ) {
		$input_id   = $this->create_input_id( $name );
		$input_name = $this->create_input_name( $name );

		$current_checked = '1'; // $this->get_current_setting( $setting_name );

		// Todo: Sanitize Default value.
		// todo: add a const to checkbox true value and false.

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


	// =========================================================================
	// Helper functions

	/**
	 * Create the HTML attribute id for a setting to be used in a widget form.
	 *
	 * @param string $field_name
	 *
	 * @return string Unsanitized.
	 */
	protected function create_input_id( $field_name ) {
		return Tabs_Widget::twrp_get_field_id( $this->widget_id, $field_name );
	}

	/**
	 * Create the HTML attribute name for a setting to be used in a widget form.
	 *
	 * @param string $field_name
	 *
	 * @return string Unsanitized.
	 */
	protected function create_input_name( $field_name ) {
		return Tabs_Widget::twrp_get_field_name( $this->widget_id, $field_name );
	}

}
