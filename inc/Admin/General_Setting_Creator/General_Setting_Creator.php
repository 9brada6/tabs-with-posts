<?php

abstract class General_Setting_Creator {

	protected $name;

	protected $value;

	protected $args;

	/**
	 * Construct the Object that will display a setting in the General Settings
	 * tab.
	 *
	 * @param string $name The name of the input.
	 * @param string|null $value The current value of the input, null for default.
	 * @param array{title:string,options:array,default:string,additional_attrs:?array} $args
	 */
	public function __construct( $name, $value, $args ) {
		$this->name  = $name;
		$this->value = $value;
		$this->args  = $args;
	}

	public function display() {
		?>
		<div id="<?= esc_attr( $wrapper_id ); ?>" class="twrp-general-select twrp-general-settings__select-group"<?= $additional_attrs // phpcs:ignore -- Pre-escaped. ?>>
			<div class="twrp-general-select__title">
				<?= $args['title']; // phpcs:ignore -- No XSS ?>
			</div>
			<?php $this->display_internal_setting(); ?>
		</div>
		<?php
	}

	abstract protected function display_internal_setting();

	abstract protected function get_bem_base_class();
}
