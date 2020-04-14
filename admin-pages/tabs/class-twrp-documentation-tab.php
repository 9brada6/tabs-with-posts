<?php

class TWRP_Documentation_Tab implements TWRP_Admin_Menu_Tab {
	public function display_tab() {

	}
	public static function get_tab_url_arg() {
		return 'documentation';
	}

	public static function get_tab_title() {
		return _x( 'Documentation', 'backend', 'twrp' );
	}
}
