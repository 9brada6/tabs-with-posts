<?php

namespace TWRP\Database\Settings;

/**
 * Class that manages what yasr rating to display.
 */
class YASR_Rating_Type extends General_Option_Setting {

	public function get_default_value() {
		return 'visitors';
	}

	public function get_possible_options() {
		return array(
			'overall',
			'visitors',
			'multi_set_overall',
			'multi_set_visitors',
		);
	}

}
