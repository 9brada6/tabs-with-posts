<?php

namespace TWRP\Article_Block;

class Modern_Article_Block implements Article_Block {

	protected $widget_id;
	protected $query_id;
	protected $settings;

	public function __construct( $widget_id, $query_id, $settings ) {
		$this->widget_id = $widget_id;
		$this->query_id  = $query_id;
		$this->settings  = $settings;
	}

	/**
	 * Get the Id of the article block.
	 *
	 * This should be unique across all article blocks.
	 *
	 * @return string
	 */
	public static function get_id() {
		return 'modern_style';
	}

	/**
	 * Get the name of the Article Block. The name should have spaces instead
	 * of "_" and should be something representative.
	 *
	 * @return string
	 */
	public static function get_name() {
		return 'Modern Style';
	}

	public static function init() {
		// Do nothing.
	}

	/**
	 * Include the template that should be displayed in the frontend.
	 *
	 * @return void
	 */
	public function include_template( $settings ) {
		include \TWRP_Main::get_plugin_directory() . 'templates/modern-style.php';
	}

	/**
	 * Display the article block settings in the Widgets::form().
	 *
	 * @return void
	 */
	public function display_form_settings() {
		?>
		<p>
			Modern settings
		</p>
		<?php
	}

	/**
	 * Sanitize the widget settings of this specific article block.
	 *
	 * @return array The new array of settings.
	 */
	public function sanitize_widget_settings() {
		return $this->settings;
	}
}
