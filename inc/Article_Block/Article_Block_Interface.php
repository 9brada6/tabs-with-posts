<?php

namespace TWRP\Article_Block;

interface Article_Block_Interface {
	public function display_backend_settings( $current_settings );
	public function display_backend_style_description();
	public function include_template();

	/**
	 * Sanitize the settings of this specific article block.
	 *
	 * @param array $settings All the article block settings that can be set via backend.
	 *
	 * @return array
	 */
	public static function sanitize_settings( $settings );
	public function get_default_settings();
	public function get_submitted_sanitized_settings();

	/**
	 * Get the Id of the article block.
	 *
	 * @todo change name from style to artblock.
	 *
	 * This should be unique across all article blocks.
	 *
	 * @return string
	 */
	public function get_style_id();
	public function get_name();
}
