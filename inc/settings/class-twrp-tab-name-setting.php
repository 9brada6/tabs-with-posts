<?php


class TWRP_Tab_Name_Setting implements TWRP_Backend_Setting {

	/**
	 * Display the backend HTML for the setting.
	 *
	 * @param mixed $current_setting The current setting of a query if is being
	 * edited, or else an empty string or null will be given.
	 *
	 * @return void
	 */
	public function display_setting( $current_setting = '' ) {
		$name        = self::sanitize_setting( $current_setting );
		$placeholder = _x( 'Ex: Related Posts', 'backend', 'twrp' );

		?>
		<div class="twrp-name-setting">
			<input class="twrp-name-setting__input" type="text" name="<?= esc_attr( $this->get_setting_name() ) ?>" value="<?= esc_attr( $name ) ?>" placeholder="<?= esc_attr( $placeholder ) ?>">
			<div class="twrp-name-setting__notice-wrap">
				<span class="twrp-name-setting__notice"><?= _x( 'Note: The name will be visible ONLY in the admin screen.', 'backend', 'twrp' ); ?></span>
			</div>
		</div>
		<?php
	}

	/**
	 * The title of the setting.
	 *
	 * @return string
	 */
	public function get_title() {
		return _x( 'Name of the query', 'backend', 'twrp' );
	}

	/**
	 * Sanitize a variable, to be safe for processing.
	 *
	 * @param string $name The string to be sanitized.
	 *
	 * @return string
	 */
	public static function sanitize_setting( $name ) {
		if ( ! is_string( $name ) ) {
			return '';
		}

		$sanitized_name = preg_replace( '/[^a-zA-Z0-9 ()\-_]/', '', wp_unslash( $name ) );
		return $sanitized_name;
	}

	/**
	 * The name of the input and of the array key that stores the option of the query.
	 *
	 * @return string
	 */
	public static function get_setting_name() {
		return 'tab_name';
	}

	/**
	 * Get the setting submitted from the form. The setting is sanitized and
	 * ready to use.
	 *
	 * @return string
	 */
	public function get_submitted_sanitized_setting() {
		if ( isset( $_POST, $_POST[ self::get_setting_name() ] ) ) { // phpcs:ignore
			return self::sanitize_setting( $_POST[ self::get_setting_name() ] ); // phpcs:ignore
		}
		return '';
	}

	/**
	 * Get the default setting. In this case an empty string.
	 *
	 * @return string
	 */
	public static function get_default_setting() {
		return '';
	}

	/**
	 * Whether or not when displaying the setting in the backend only the title
	 * is shown and the setting HTML is hidden(return false), or both are
	 * shown(return true).
	 *
	 * @return bool
	 */
	public static function setting_is_collapsed() {
		return true;
	}
}
