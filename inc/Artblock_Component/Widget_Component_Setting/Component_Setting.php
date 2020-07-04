<?php
/**
 * File that holds the interface with the same name.
 */

namespace TWRP\Artblock_Component;

interface Component_Setting {
	public static function get_key_name();

	public static function display_setting( $id, $name, $value );

}
