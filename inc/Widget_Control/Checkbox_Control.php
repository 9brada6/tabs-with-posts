<?php
/**
 * File that holds the interface with the same name.
 */

namespace TWRP\Widget_Control;

/**
 * Class that implements the control to display the widget setting for a
 * checkbox.
 */
class Checkbox_Control implements Widget_Control {

	/**
	 * Display a checkbox field.
	 *
	 * @param string $id
	 * @param string $name
	 * @param string|null $current_value
	 * @param array{default?:string,value?:string,before?:string,after?:string} $args
	 * @return void
	 */
	public static function display_setting( $id, $name, $current_value, $args ) {
		$default_args = array(
			'default' => '',
			'value'   => '1',
			'before'  => '',
			'after'   => '',
		);
		$args         = wp_parse_args( $args, $default_args );

		$current_value = isset( $current_value ) && is_string( $current_value ) ? $current_value : $args['default'];
		?>
		<div>
			<?php if ( $args['before'] ) : ?>
				<span class="twrp-widget-form__checkbox-label-before" for="<?= esc_attr( $id ) ?>">
					<?= $args['before']; // phpcs:ignore -- No XSS. ?>
				</span>
			<?php endif; ?>

			<input
				id="<?= esc_attr( $id ); ?>"
				type="checkbox"
				name="<?= esc_attr( $name ); ?>"
				value="<?= esc_attr( $args['value'] ); ?>"
				<?php checked( $current_value, $args['value'] ); ?>
			>

			<?php if ( $args['after'] ) : ?>
				<span class="twrp-widget-form__checkbox-label-after" for="<?= esc_attr( $id ) ?>">
					<?= $args['after']; // phpcs:ignore -- No XSS. ?>
				</span>
			<?php endif; ?>
		</div>
		<?php
	}

	/**
	 * Sanitize the checkbox input field.
	 *
	 * @param mixed $setting
	 * @param array{default?:string,value?:string} $args
	 * @return string
	 */
	public static function sanitize_setting( $setting, $args ) {
		$default_args = array(
			'default' => '',
			'value'   => '1',
		);
		$args         = wp_parse_args( $args, $default_args );

		if ( $setting === $args['value'] || '' === $setting ) {
			return $setting;
		}

		return $args['default'];
	}
}
