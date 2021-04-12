<?php

namespace TWRP\Database\Settings;

/**
 * Class that manages at what interval of time the global widget cache should
 * refresh, no matter what.
 */
class Cache_Automatic_Refresh extends General_Option_Setting {

	public function get_default_value() {
		return '10';
	}

	public function get_possible_options() {
		return array(
			'7',
			'10',
			'15',
			'20',
			'30',
			'45',
			'60',
		);
	}

}
