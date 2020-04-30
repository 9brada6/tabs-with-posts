<?php

namespace TWRP\Article_Block;

class Simple_Article_Block implements Article_Block_Interface {
	public function display_backend_settings() {
		?>
		<div class="twrp-artblock-form">
			<p class="twrp-artblock-form__paragraph">
				<input id="twrp-artblock-form__<?= esc_attr( $this->get_style_id() ); ?>-author" type="checkbox" value="1"></input>
				<label for="twrp-artblock-form__<?= esc_attr( $this->get_style_id() ); ?>-author">
					Display the author
				</label>
			</p>

			<p class="twrp-artblock-form__paragraph">
				<input id="twrp-artblock-form__<?= esc_attr( $this->get_style_id() ); ?>-date" type="checkbox" value="1"></input>
				<label for="twrp-artblock-form__<?= esc_attr( $this->get_style_id() ); ?>-date">
					Display the date
				</label>
			</p>
		</div>
		<?php
	}

	public function display_backend_style_description() {
		echo _x( 'Display only the post title, additional with the author or date.', 'backend', 'twrp' );
	}

	public function get_template_file_name() {
		return \TWRP_Main::get_templates_directory() . 'simple-style.php';
	}

	public function include_template() {
		include $this->get_template_file_name();
	}

	public function get_name() {
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
