<?php
/**
 * File containing a trait class, used by the article blocks.
 *
 * @package Tabs_With_Recommended_Posts
 */

namespace TWRP\Article_Block;

/**
 * Contains all the traits that are necessary to create the HTML in the backend
 * for form inputs to let the administrators change the settings.
 */
trait Article_Block_Create_Setting {

	/**
	 * The current artblock Id to generate the input controls form for.
	 *
	 * @var string
	 */
	private $creator_artblock_id = '';

	/**
	 * The current settings to generate the input controls form for.
	 *
	 * @var array
	 */
	private $creator_current_settings = array();

	/**
	 * Sets the properties necessary for traits to work. It's better to be set one
	 * time than to be passed each time to the functions.
	 *
	 * @param string $artblock_id The current article block that the creator is working.
	 * @param array $current_settings The current settings that the article block is having.
	 *
	 * @return void
	 */
	protected function set_creator( $artblock_id, $current_settings ) {
		$this->creator_artblock_id      = $artblock_id;
		$this->creator_current_settings = $current_settings;
	}


	// =========================================================================
	// Create Input Functions

	/**
	 * Create a checkbox accompanied with a text. The text will be displayed after
	 * the checkbox, to make all previous/future checkboxes aligned.
	 *
	 * The final name attribute of the input will be $artblock_id[$setting_name].
	 *
	 * @param string $setting_name The setting name should be unique only across
	 *                             the article block settings.
	 * @param string $after The text after the checkbox.
	 *
	 * @return void
	 */
	protected function create_checkbox_setting( $setting_name, $after ) {
		$input_id   = $this->create_input_id( $setting_name );
		$input_name = $this->create_input_name( $setting_name );

		$current_checked = $this->get_current_setting( $setting_name );

		?>
		<p class="twrp-artblock-form__paragraph">
			<input
				id="<?= esc_attr( $input_id ); ?>"
				class="twrp-artblock-form__checkbox"
				type="checkbox" value="1"
				name="<?= esc_attr( $input_name ); ?>"
				<?php checked( $current_checked, '1' ); ?>
			/>

			<label for="<?= esc_attr( $input_id ); ?>" class="twrp-artblock-form__checkbox-label">
				<?= $after // phpcs:ignore -- XSS safe. ?>
			</label>
		</p>
		<?php
	}

	/**
	 * Create a input of type number.
	 *
	 * @param string $setting_name The setting name should be unique only across
	 *                             the article block settings.
	 * @param array{min:string,max:string,step:string,value:string,before?:string,after?:string} $args The arguments.
	 *
	 * @return void
	 */
	protected function create_number_setting( $setting_name, $args ) {
		$input_id      = $this->create_input_id( $setting_name );
		$input_name    = $this->create_input_name( $setting_name );
		$current_value = $this->get_current_setting( $setting_name );
		?>
		<p class="twrp-artblock-form__number">
			<?php if ( isset( $args['before'] ) ) : ?>
				<label for="<?= esc_attr( $input_id ); ?>" class="twrp-artblock-form__number-label">
					<?= $args['before']; // phpcs:ignore -- XSS safe. ?>
				</label>
			<?php endif; ?>

			<input
				id="<?= esc_attr( $input_id ); ?>"
				class="twrp-artblock-form__number" type="number"
				step="<?= esc_attr( $args['step'] ); ?>"
				min="<?= esc_attr( $args['min'] ); ?>"
				max="<?= esc_attr( $args['max'] ); ?>"
				value="<?= esc_attr( $current_value ); ?>"
				name="<?= esc_attr( $input_name ); ?>"
			>
			</input>

			<?php if ( isset( $args['after'] ) ) : ?>
				<label for="<?= esc_attr( $input_id ); ?>" class="twrp-artblock-form__number-label">
					<?= $args['after']; // phpcs:ignore -- XSS safe. ?>
				</label>
			<?php endif; ?>
		</p>

		<?php
	}


	// =========================================================================
	// Helper Functions

	/**
	 * Create the input id for a setting, based on the setting and the article
	 * block id supplied.
	 *
	 * @param string $setting_name
	 *
	 * @return string Unsanitized.
	 */
	protected function create_input_id( $setting_name ) {
		$artblock_id = $this->creator_artblock_id;
		return "twrp-artblock-form__${artblock_id}-${setting_name}";
	}

	/**
	 * Create the input name for a setting, based on the setting(as array key)
	 * and the article block id supplied(as array).
	 *
	 * @param string $setting_name
	 *
	 * @return string Unsanitized.
	 */
	protected function create_input_name( $setting_name ) {
		return $this->creator_artblock_id . '[' . $setting_name . ']';
	}

	/**
	 * Get the current setting. The setting is sanitized before so it should be
	 * safe to use here.
	 *
	 * @param string $setting_name
	 *
	 * @return mixed The current setting or null otherwise.
	 */
	protected function get_current_setting( $setting_name ) {
		if ( isset( $this->creator_current_settings[ $setting_name ] ) ) {
			return $this->creator_current_settings[ $setting_name ];
		}

		return null;
	}

}
