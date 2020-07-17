<?php
/**
 * File that holds the class with the same name.
 */

namespace TWRP\Widget_Control;

/**
 * Class that implements the control to display the setting for a number.
 */
class Number_Control implements Widget_Control {

	/**
	 * Display a number input field.
	 *
	 * @param string $id
	 * @param string $name
	 * @param int|float|string|null $value
	 * @param array{default?:''|int|float,min?:''|int|float,max?:''|int|float,step?:''|int|float,before?:string,after?:string,string:string} $args
	 * @return void
	 */
	public static function display_setting( $id, $name, $value, $args ) {
		$default_args = array(
			'default' => '',
			'min'     => '',
			'max'     => '',
			'step'    => '',
			'before'  => '',
			'after'   => '',
		);
		$args         = wp_parse_args( $args, $default_args );

		$value = isset( $value ) && is_numeric( $value ) ? $value : $args['default'];
		?>
		<div class="twrp-widget-form__paragraph twrp-widget-form__paragraph-number-control">
			<?php if ( $args['before'] ) : ?>
				<span class="twrp-widget-form__number-label-before" for="<?= esc_attr( $id ) ?>">
					<?= $args['before']; // phpcs:ignore -- No XSS. ?>
				</span>
			<?php endif; ?>

			<input id="<?= esc_attr( $id ) ?>"
				class="twrp-widget-form__number-control"
				name="<?= esc_attr( $name ) ?>"
				type="number"
				step="<?= esc_attr( $args['step'] ) ?>"
				max="<?= esc_attr( $args['max'] ) ?>"
				min="<?= esc_attr( $args['min'] ) ?>"
				value="<?= esc_attr( (string) $value ) ?>"
			/>

			<?php if ( $args['after'] ) : ?>
				<span class="twrp-widget-form__number-label-after" for="<?= esc_attr( $id ) ?>">
					<?= $args['after']; // phpcs:ignore -- No XSS. ?>
				</span>
			<?php endif; ?>
		</div>
		<?php
	}

	/**
	 * Sanitize the number input field.
	 *
	 * @param mixed $setting
	 * @param array{default?:''|int|float,min?:''|int|float,max?:''|int|float} $args
	 * @return float|int|''
	 */
	public static function sanitize_setting( $setting, $args ) {
		$default_args = array(
			'default' => '',
			'min'     => '',
			'max'     => '',
		);
		$args         = wp_parse_args( $args, $default_args );

		if ( ! is_numeric( $setting ) ) {
			return $args['default'];
		}

		if ( '' !== $args['min'] && $setting < $args['min'] ) {
			return $args['default'];
		}

		if ( '' !== $args['max'] && $setting > $args['max'] ) {
			return $args['default'];
		}

		return $setting;
	}
}
