<?php

class Post_Views {

	protected $plugin_class;

	public function __construct( $plugin_class ) {
		// todo: check to see if a plugin is of a specific instance.
		$this->plugin_class = $plugin_class;
	}

	public function get_views_number() {
		$this->plugin_class->get_views_number();
	}
}
