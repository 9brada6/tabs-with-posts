<?php

class TWRP_Simple_Style implements TWRP_Style_Setting {
	public function display_backend_settings() {
		return 'Style 1 display';
	}

	public function display_backend_style_preview() {
		include TWRP_Main::get_plugin_dir() . 'templates-backend-preview/simple-style.php';
	}

	public function get_template() {
		include TWRP_Main::get_plugin_dir() . 'templates/simple-style.php';
	}

	public function get_style_name() {
		return 'Simple Style';
	}

	public function get_style_id() {
		return 'simple_style';
	}

}
