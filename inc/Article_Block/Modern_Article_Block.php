<?php

namespace TWRP\Article_Block;

class Modern_Article_Block implements Article_Block, Article_Block_Preview {
	public function display_backend_settings( $current_settings ) {
		return 'Style 2 display settings';
	}

	public function display_backend_description() {
		// include \TWRP_Main::get_plugin_directory() . 'templates-backend-preview/modern-style.php';
	}

	public function include_template() {
		include \TWRP_Main::get_plugin_directory() . 'templates/modern-style.php';
	}

	public function get_name() {
		return 'Modern Style';
	}

	public function get_id() {
		return 'modern_style';
	}

	public static function sanitize_settings( $settings ) {

	}
	public function get_submitted_sanitized_settings() {

	}

	public function get_default_settings() {

	}

	public function display_backend_preview() {

	}

}
