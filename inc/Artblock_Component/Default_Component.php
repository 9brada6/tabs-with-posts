<?php

namespace TWRP\Artblock_Component;

class Default_Component {

	protected $widget_id;
	protected $query_id;
	protected $settings;
	protected $name;
	protected $component_title;

	public function __construct( $name, $component_title, $widget_id, $query_id, $settings ) {
		$this->name            = $name;
		$this->component_title = $component_title;
		$this->widget_id       = $widget_id;
		$this->query_id        = $query_id;
		$this->settings        = $settings;
	}

	public function get_component_title() {
		return $this->component_title;
	}

	public function create_component_settings() {
		$settings_creator = new \TWRP\Article_Block_Widget_Settings_Creator( $this->widget_id, $this->query_id, $this->settings, $this->name );
		?>
		<div>
			<?php $settings_creator->display_number_setting( 'header_size', '', $this->get_header_size_setting_args() ); ?>
		</div>
		<?php
	}

	protected function get_header_size_setting_args() {
		return array(
			'before' => _x( 'Title font size:', 'backend; CSS unit', 'twrp' ),
			'after'  => _x( 'rem.', 'backend; CSS unit', 'twrp' ),
			'max'    => '3',
			'min'    => '0.7',
			'step'   => '0.025',
		);
	}
}
