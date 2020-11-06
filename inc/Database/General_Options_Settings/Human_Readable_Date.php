<?php
/**
 * File that contains the class with the same name.
 */

namespace TWRP\Database\Settings;

/**
 * Class that manages the setting that will show the date as a human readable date.
 */
class Human_Readable_Date extends General_Option_Setting {

	public function get_default_value() {
		return 'true';
	}

	public function get_possible_options() {
		return array( 'true', 'false' );
	}

}
