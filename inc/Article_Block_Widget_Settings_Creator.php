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
	// public function create_settings( $settings ) {
	// if ( ! is_array( $settings ) ) {
	// return;
	// }

	// foreach ( $settings as $setting ) {
	// if ( ! isset( $setting['type'] ) ) {
	// continue;
	// }
	// $type = $setting['type'];

	// if ( 'checkbox' === $type ) {
	// $this->display_checkbox_setting( $setting );
	// }
	// }
	// }

	/**
	 *
	 */
	protected function get_settings() {
		// TODO: Verify if query_id is set.
		$settings = $this->current_settings;
		return $settings[ $this->query_id ];
	}

	// =========================================================================
	// Create settings by type of form fields.

	public function display_checkbox_setting( $name, $after, $default = '' ) {
		$input_id   = $this->create_input_id( $name );
		$input_name = $this->create_input_name( $name );
		$settings   = $this->get_settings();
		$checked    = '';

		if ( isset( $settings[ $name ] ) && '1' === $settings[ $name ] ) {
			$checked = 'checked';
		} elseif ( '1' === $default ) {
			$checked = 'checked';
		}

		// $this->get_current_setting( $setting_name );

		// Todo: Sanitize Default value.
		// todo: add a const to checkbox true value and false.

		?>
		<p class="twrp-artblock-form__paragraph">
			<input
				id="<?= esc_attr( $input_id ) ?>"
				class="twrp-artblock-form__checkbox"
				type="checkbox" value="1"
				name="<?= esc_attr( $input_name ); ?>"
				<?= esc_attr( $checked ) ?>
			/>

			<label for="<?= esc_attr( $input_id ); ?>" class="twrp-artblock-form__checkbox-label">
				<?= $after // phpcs:ignore -- XSS safe. ?>
			</label>
		</p>
		<?php
	}

	// =========================================================================
	// Sanitize settings by type of form fields.

	public function sanitize_checkbox( $setting, $default = '' ) {
		if ( '1' === $setting ) {
			return '1';
		} elseif ( ! $setting ) {
			return '';
		}

		if ( $default ) {
			return '1';
		}

		return '';
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
		return Tabs_Widget::twrp_get_field_id( $this->widget_id, $this->query_id . '-' . $field_name );
	}

	/**
	 * Create the HTML attribute name for a setting to be used in a widget form.
	 *
	 * @param string $field_name
	 *
	 * @return string Unsanitized.
	 */
	protected function create_input_name( $field_name ) {
		return Tabs_Widget::twrp_get_field_name( $this->widget_id, $this->query_id . "[$field_name]" );
	}

}

	// Todo:


	/**
	 * Sanitize a setting coming from a checkbox.
	 *
	 * @param array  $settings     The array of all style settings.
	 * @param string $setting_name The key in the array of settings to verify.
	 * @param '1'|'' $default      The default value in case that our setting is not set.
	 *
	 * @return string Either '1' or ''.
	 */
	// protected static function sanitize_checkbox( $settings, $setting_name, $default ) {
	// if ( isset( $settings[ $setting_name ] ) ) {
	// if ( $settings[ $setting_name ] ) {
	// return '1';
	// } else {
	// return '';
	// }
	// }

	// return $default;
	// }

	/**
	 * Sanitize a number, usually passed from a number type input.
	 *
	 * @param array                      $settings The array containing all the settings.
	 * @param string                     $setting_name The array key containing our setting to be sanitized.
	 * @param array{min:float,max:float} $args The arguments for sanitization.
	 * @param string|float               $default The default value in case that the setting is not valid.
	 *
	 * @return string|float
	 */
	// protected static function sanitize_number( $settings, $setting_name, $args, $default ) {
	// if ( ( ! isset( $settings[ $setting_name ] ) ) || ( ! is_numeric( $settings[ $setting_name ] ) ) ) {
	// return $default;
	// }

	// $value = $settings[ $setting_name ];

	// if ( isset( $args['min'] ) && $args['min'] > $value ) {
	// return $default;
	// }

	// if ( isset( $args['max'] ) && $args['max'] < $value ) {
	// return $default;
	// }

	// return $settings[ $setting_name ];
	// }
