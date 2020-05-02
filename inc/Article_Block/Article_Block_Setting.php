<?php

namespace TWRP\Article_Block;

class Article_Block_Setting {

	protected $artblock_id;

	protected $setting_name;

	protected $type;

	protected $args;

	public function __construct( $artblock_id, $setting_name, $type, $args ) {
		$this->artblock_id  = $artblock_id;
		$this->setting_name = $setting_name;
		$this->type         = $type;
		$this->args         = $args;
	}

	public function sanitize_setting()

	// =========================================================================
	// Functions to display the backend.

	public function display_backend_setting() {
		if ( 'checkbox' === $this->type ) {
			$this->display_checkbox_backend_setting();
		}
		if ( 'number' === $this->type ) {
			$this->display_number_backend_setting();
		}
	}

	/**
	 * Display the input of type checkbox as the setting of the article block.
	 */
	protected function display_checkbox_backend_setting() {
		$current_checked = $this->get_current_setting( $setting_name );
		?>
		<p class="twrp-artblock-form__paragraph">
			<input
				id="<?= esc_attr( $this->create_input_id() ); ?>"
				class="twrp-artblock-form__checkbox"
				type="checkbox" value="1"
				name="<?= esc_attr( $this->create_input_name() ); ?>"
				<?php checked( $current_checked, '1' ); ?>
			/>

			<label for="<?= esc_attr( $this->create_input_id() ); ?>" class="twrp-artblock-form__checkbox-label">
				<?= $this->args['after'] // phpcs:ignore -- XSS safe. ?>
			</label>
		</p>
		<?php
	}

	/**
	 * Display the input of type number as the setting of the article block.
	 */
	protected function display_number_backend_setting() {
	}

	/**
	 * Create the input id for a setting, based on the setting name and the article
	 * block id.
	 *
	 * @return string Unsanitized.
	 */
	protected function create_input_id() {
		$artblock_id = $this->artblock_id;
		$name        = $this->setting_name;
		return "twrp-artblock-form__{$artblock_id}-{$name}";
	}

	/**
	 * Create the input name for a setting, based on the setting name(as array key)
	 * and the article block id(as array).
	 *
	 * @return string Unsanitized.
	 */
	protected function create_input_name() {
		return $this->artblock_id . '[' . $this->setting_name . ']';
	}
}
