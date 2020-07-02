<?php
/**
 * File that holds the class with the same name.
 */

namespace TWRP\Widget_Control;

/**
 * Class that implements the control to display the setting for a number.
 */
class Number_Control implements Widget_Control {

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

		$value = isset( $value ) ? $value : $args['default'];
		?>
		<p class="twrp-artblock-form__paragraph">
			<?php if ( $args['before'] ) : ?>
				<span class="twrp-artblock-form__number-label-before" for="<?= esc_attr( $id ) ?>">
					<?= $args['before']; // phpcs:ignore -- No XSS. ?>
				</span>
			<?php endif; ?>

			<input id="<?= esc_attr( $id ) ?>"
				name="<?= esc_attr( $name ) ?>"
				type="number"
				step="<?= esc_attr( $args['step'] ) ?>"
				max="<?= esc_attr( $args['max'] ) ?>"
				min="<?= esc_attr( $args['min'] ) ?>"
				value="<?= esc_attr( $value ) ?>"
			/>

			<?php if ( $args['after'] ) : ?>
				<span class="twrp-artblock-form__number-label-after" for="<?= esc_attr( $id ) ?>">
					<?= $args['after']; // phpcs:ignore -- No XSS. ?>
				</span>
			<?php endif; ?>
		</p>
		<?php
	}

}
