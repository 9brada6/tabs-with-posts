<?php
/**
 * File that holds the interface with the same name.
 */

namespace TWRP\Widget_Control;

interface Widget_Control {

	public static function display_setting( $id, $name, $value, $args );

	public static function sanitize_setting( $setting, $args );
}
