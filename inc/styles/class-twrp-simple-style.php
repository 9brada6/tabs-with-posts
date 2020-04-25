<?php

class TWRP_Simple_Style implements TWRP_Style_Setting {
	public function display_backend_settings() {
		return 'Style 1 display';
	}

	public function display_backend_style_preview() {
		include TWRP_Main::get_plugin_directory() . 'templates-backend-preview/simple-style.php';
	}

	public function get_template_file_name() {
		return TWRP_Main::get_templates_directory() . 'simple-style.php';
	}

	public function include_template() {
		include $this->get_template_file_name();
	}

	public function get_style_name() {
		return 'Simple Style';
	}

	public function get_style_id() {
		return 'simple_style';
	}

	public function sanitize_settings( $settings ) {

	}
	public function get_submitted_sanitized_settings() {
		return array();
	}
}
