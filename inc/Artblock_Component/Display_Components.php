<?php

namespace TWRP\Artblock_Component;

class Display_Components {

	protected $components = array();

	/**
	 * @todo: verify instance of.
	 */
	public function __construct( $components ) {
		$this->components = $components;
	}

	public function add_component( $component ) {
		array_push( $this->components, $component );
	}

	public function display_components() {
		?>
		<div class="twrp-widget-components">
			<div class="twrp-widget-components__buttons">
				<?php foreach ( $this->components as $component ) : ?>
					<div class="twrp-widget-components__btn">
						<?= esc_html( $component->get_component_title() ); ?>
					</div>
				<?php endforeach; ?>
			</div>
			<div class="twrp-widget-components__components">
				<?php foreach ( $this->components as $component ) : ?>
					<div class="twrp-widget-components__component-wrapper">
						<?php $component->display_component_settings(); ?>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
		<?php
	}
}
