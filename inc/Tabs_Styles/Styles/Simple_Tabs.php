<?php
/**
 * File that contains the class with the same name.
 */

namespace TWRP\Tabs_Styles;

/**
 * Used to display the tabs a normal tabs style.
 */
class Simple_Tabs extends Tab_Style {

	const TAB_ID = 'simple_tabs';

	public static function get_tab_style_name() {
		return _x( 'Simple Style', 'backend', 'twrp' );
	}

	public static function get_all_variants() {
		return array( 'inverse_colors' => _x( 'Inverse Accent Colors', 'backend', 'twrp' ) );
	}

	public function start_tabs_wrapper() {
		?>
		<div class="<?php $this->tab_class(); ?>">
		<?php
	}

	public function end_tabs_wrapper() {
		?>
		</div>
		<?php
	}

	public function start_tab_buttons_wrapper() {
		?>
		<ul class="<?php $this->tab_btns_class(); ?>" <?php $this->tabby_btns_data_attr(); ?>>
		<?php
	}

	public function end_tab_buttons_wrapper() {
		?>
		</ul>
		<?php
	}

	public function tab_button( $button_text, $query_id = '', $default_tab = false ) {
		$default_tab_attr = '';
		if ( $default_tab ) {
			$default_tab_attr = ' ' . $this->get_tabby_default_tab_data_attr();
		}
		?>
		<li class="<?php $this->tab_btn_item_class(); ?>"><a class="<?php $this->tab_btn_class(); ?>" href="#<?php $this->tab_id( $query_id ); ?>"<?= esc_attr( $default_tab_attr ); ?>><?= esc_html( $button_text ); ?></a></li>
		<?php
	}

	public function start_all_tabs_wrapper() {
		?>
		<div class="<?php $this->tab_contents_wrapper_class(); ?>">
		<?php
	}

	public function end_all_tabs_wrapper() {
		?>
		</div>
		<?php
	}

	public function start_tab_content_wrapper( $query_id = '' ) {
		?>
		<div id="<?php $this->tab_id( $query_id ); ?>" class="<?php $this->tab_content_class(); ?>">
		<?php
	}

	public function end_tab_content_wrapper( $query_id = '' ) {
		?>
		</div>
		<?php
	}

	protected function get_bem_base_class() {
		return 'twrp-tab-ss';
	}

}
