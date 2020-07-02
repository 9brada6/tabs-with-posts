<?php
/**
 * File that holds the class with the same name.
 */

namespace TWRP\Artblock_Component;

class Line_Height_Setting {

	public static function display_setting( $settings_creator ) {
		?>
		<div>
			<?php $settings_creator->display_number_setting( 'line_height', '', self::get_line_height_setting_args() ); ?>
		</div>
		<?php
	}

	protected static function get_line_height_setting_args() {
		return array(
			'before' => _x( 'Line height:', 'backend', 'twrp' ),
			'after'  => '',
			'max'    => '2.5',
			'min'    => '0.7',
			'step'   => '0.025',
		);
	}
}
