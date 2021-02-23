<?php

namespace TWRP\Database\Settings;

/**
 * Class that manages the setting of the image when there is no thumbnail.
 */
class No_Thumbnail_Image extends General_Option_Setting {

	public function get_default_value() {
		return '';
	}

	public function sanitize( $value ) {
		if ( is_numeric( $value ) && is_string( $value ) ) {
			return $value;
		}

		return $this->get_default_value();
	}

	public function get_possible_options() {
		// Have a lot of possibilities.
		return array();
	}
}
