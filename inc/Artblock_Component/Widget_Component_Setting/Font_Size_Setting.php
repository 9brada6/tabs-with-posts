<?php
/**
 * File that holds the class with the same name.
 */

namespace TWRP\Artblock_Component;

use TWRP\Widget_Control\Number_Control;

class Font_Size_Setting {

	public static function display_setting( $id, $name, $value ) {
		?>
		<div>
			<?php Number_Control::display_setting( $id, $name, $value, self::get_font_size_setting_args() ); ?>
		</div>
		<?php
	}

	protected static function get_font_size_setting_args() {
		return array(
			'default' => '',
			'before'  => _x( 'Font size:', 'backend; CSS unit', 'twrp' ),
			'after'   => _x( 'rem.', 'backend; CSS unit', 'twrp' ),
			'max'     => '3',
			'min'     => '0.7',
			'step'    => '0.025',
		);
	}
}
