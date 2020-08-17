<?php

namespace TWRP\Admin\Tabs;

class General_Settings_Tab implements Interface_Admin_Menu_Tab {
	public function display_tab() {

	}

	public static function get_tab_url_arg() {
		return 'general_settings';
	}

	public static function get_tab_title() {
		return _x( 'General Settings', 'backend', 'twrp' );
	}
}
