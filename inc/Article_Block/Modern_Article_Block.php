<?php

namespace TWRP\Article_Block;

class Modern_Article_Block extends Article_Block {

	const CLASS_ORDER = 100;

	protected $widget_id;
	protected $query_id;
	protected $settings;

	public static function get_id() {
		return 'modern_style';
	}

	public static function get_name() {
		return 'Modern Style';
	}

	public static function get_file_name() {
		return 'modern-style';
	}

	public function display_form_settings() {
		?>
		<p>
			Modern settings
		</p>
		<?php
	}

	public function sanitize_widget_settings() {
		return $this->settings;
	}

	public function get_components() {
		return '';
	}

}
