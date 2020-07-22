<?php
/**
 * File that holds the class with the same name.
 */

namespace TWRP\Widget_Control;

/**
 * Class that implements the control to display the setting for a color.
 */
class Color_Control implements Widget_Control {

	/**
	 * Display a widget control field.
	 *
	 * @param string $id
	 * @param string $name
	 * @param mixed $value
	 * @param array $args
	 * @return void
	 */
	public static function display_setting( $id, $name, $value, $args ) {
		?>
		<div class="twrp-widget-form__paragraph twrp-widget-form__paragraph-color-control">
			<input type="text" name="<?= esc_attr( $name ); ?>" value="<?= esc_attr( $value ); ?>">
			<div class="twrp-color-picker"></div>
		</div>
		<?php
	}

	/**
	 * Sanitize the number input field.
	 *
	 * @param mixed $setting
	 * @param array $args
	 * @return mixed
	 */
	public static function sanitize_setting( $setting, $args ) {
		return $setting;
	}
}
