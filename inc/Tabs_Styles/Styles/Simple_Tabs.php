<?php
/**
 * File that contains the class with the same name.
 */

namespace TWRP\Tabs_Styles;

/**
 * Used to display the tabs a normal tabs style.
 */
class Simple_Tabs extends Tab_Style {

	public function start_tabs_wrapper() {
		?>
		<div>
		<?php
	}

	public function end_tabs_wrapper() {
		?>
		</div>
		<?php
	}

	public function start_tab_buttons_wrapper() {
		?>
		<div>
		<?php
	}

	public function end_tab_buttons_wrapper() {
		?>
		</div>
		<?php
	}

	public function tab_button( $button_text, $query_id = '' ) {
		?>
		<button><?= esc_html( $button_text ); ?></button>
		<?php
	}


	public function start_all_tabs_wrapper() {
		?>
		<div>
		<?php
	}

	public function end_all_tabs_wrapper() {
		?>
		</div>
		<?php
	}

	public function start_tab_content_wrapper( $query_id = '' ) {
		?>
		<div>
		<?php
	}

	public function end_tab_content_wrapper( $query_id = '' ) {
		?>
		</div>
		<?php
	}

}
