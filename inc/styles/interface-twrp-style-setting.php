<?php

interface TWRP_Style_Setting {
	public function display_backend_settings();
	public function display_backend_style_preview();
	public function include_template();
	public function sanitize_settings( $settings );
	public function get_submitted_sanitized_settings();
}
