<?php

class Html_Component {

	public function __construct( $widget_id, $query_id, $defaults ) {

	}

	function display_artblock_widget_settings() {
		$settings_creator = new \TWRP\Article_Block_Widget_Settings_Creator( $widget_id, $query_id, $current_settings );
		$settings_creator->display_number_setting( 'header_size', $default_settings['header_size'], $this->get_header_size_setting_args() );
	}

}
