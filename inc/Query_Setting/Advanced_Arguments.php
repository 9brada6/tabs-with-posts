<?php

namespace TWRP\Query_Setting;

use TWRP\Admin\Settings_Menu;
use \TWRP\Admin\Tabs\Queries_Tab;

class Advanced_Arguments implements Interface_Backend_Layout, Interface_Modify_Query_Arguments {

	public static function init() {
		add_action( 'admin_enqueue_scripts', array( 'TWRP\\Query_Setting\\Advanced_Arguments', 'enqueue_scripts' ) );
	}

	public function display_setting( $current_setting ) {

		$json_setting = $this->get_default_setting();
		if ( ! empty( $current_setting ) ) {
			$json_setting = $current_setting;
		}

		?>
		<div class="twrp-advanced-args">
			<textarea name="advanced_args" id="twrp-advanced-args__codemirror-textarea" rows="10"><?= esc_html( $json_setting ); ?></textarea>
		</div>
		<?php
	}

	public function get_title() {
		return _x( 'Advanced query settings', 'backend', 'twrp' );
	}

	protected function test_js() {

	}

	public static function sanitize_setting( $setting ) {

	}

	public function get_submitted_sanitized_setting() {
		return wp_unslash( $_POST['advanced_args'] );
	}

	public static function get_default_setting() {
		return '
/*
{
	"author": 2,
	"post__in": [13,42],
	"tax_query": {
		"relation": "AND",
		{
			"taxonomy": "movie_genre",
			"field": "slug",
			"terms": ["action", "comedy"]
		},
		{
			"taxonomy": "actor",
			"field": "term_id",
			"terms": [104, 115, 206],
			"operator": "NOT IN"
		}
	}
}
*/
		';
	}

	public static function enqueue_scripts() {
		if ( Settings_Menu::is_tab_active( new Queries_Tab() ) ) {
			wp_enqueue_script( 'wp-codemirror' );
		}
	}

	public static function get_setting_name() {
		return 'advanced_args';
	}

	public static function add_query_arg( $previous_query_args, $tabs_settings ) {
		return array( 'post_types' => 'post,page' );
	}

	public static function setting_is_collapsed() {
		return false;
	}
}