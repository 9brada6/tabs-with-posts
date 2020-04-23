<?php

class TWRP_Modern_Style implements TWRP_Style_Setting {
	public function display_backend_settings() {
		return 'Style 2 display settings';
	}

	public function display_backend_style_preview() {
		include TWRP_Main::get_plugin_directory() . 'templates-backend-preview/modern-style.php';
	}

	public function include_template() {
		include TWRP_Main::get_plugin_directory() . 'templates/modern-style.php';
	}

	public function get_style_name() {
		return 'Modern Style';
	}

	public function get_style_id() {
		return 'modern_style';
	}

}
