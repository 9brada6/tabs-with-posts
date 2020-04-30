<?php

namespace TWRP\Article_Block;

interface Article_Block_Interface {
	public function display_backend_settings();
	public function display_backend_style_description();
	public function include_template();
	public function sanitize_settings( $settings );
	public function get_submitted_sanitized_settings();
	public function get_style_id();
	public function get_name();
}
