<?php

namespace TWRP\Admin\Widget_Control;

/**
 * Class that implements the control to display the setting for a select.
 */
class Select_Control implements Widget_Control {

	/**
	 * Display a select field.
	 *
	 * @param string $id
	 * @param string $name
	 * @param string|null $value
	 * @param array{default?:string,options:array,before?:string,after?:string} $args
	 * @return void
	 */
	public static function display_setting( $id, $name, $value, $args ) {
		$default_args = array(
			'default' => '',
			'options' => array(),
			'before'  => '',
			'after'   => '',
		);
		$args         = wp_parse_args( $args, $default_args );

		$value = isset( $value ) && is_string( $value ) ? $value : $args['default'];
		?>
		<div class="twrpb-widget-form__paragraph twrpb-widget-form__paragraph-select-control">
			<?php if ( $args['before'] ) : ?>
				<span class="twrpb-widget-form__select-label-before" for="<?= esc_attr( $id ) ?>">
					<?= $args['before']; // phpcs:ignore -- No XSS. ?>
				</span>
			<?php endif; ?>

			<select
				id="<?= esc_attr( $id ) ?>"
				class="twrpb-widget-form__select-control"
				name="<?= esc_attr( $name ) ?>"
			>
				<?php foreach ( $args['options'] as $option_value => $display_value ) : ?>
					<option value="<?= esc_attr( $option_value ); ?>" <?php selected( $option_value, $value ); ?>>
						<?= esc_html( $display_value ); ?>
					</option>
				<?php endforeach; ?>
			</select>

			<?php if ( $args['after'] ) : ?>
				<span class="twrpb-widget-form__select-label-after" for="<?= esc_attr( $id ) ?>">
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
	 * @param array{default?:string,options:array} $args
	 * @return string
	 */
	public static function sanitize_setting( $setting, $args ) {
		$default_args = array(
			'default' => '',
			'options' => array(),
		);
		$args         = wp_parse_args( $args, $default_args );

		if ( ! is_scalar( $setting ) ) {
			return $default_args['default'];
		}

		$possible_values = array_keys( $args['options'] );
		$possible_values = array_map( 'strval', $possible_values );

		if ( ! in_array( $setting, $possible_values, true ) ) {
			return $default_args['default'];
		}

		return (string) $setting;
	}
}
