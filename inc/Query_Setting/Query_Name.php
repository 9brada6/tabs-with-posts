<?php
/**
 * File that define the TWRP\Query_Setting\Query_Name class.
 *
 * @package Tabs_With_Recommended_Posts
 */

namespace TWRP\Query_Setting;

/**
 * Implements the query name setting.
 *
 * This setting is used for the administrators to give a query interrogation a
 * simple name to remember and describe what a query do. This name will be
 * visible only in the backend of the website.
 */
class Query_Name implements Query_Setting {

	/**
	 * The name of the input and of the array key that stores the option of the query.
	 *
	 * @return string
	 */
	public static function get_setting_name() {
		return 'tab_name';
	}

	/**
	 * The title of the setting accordion.
	 *
	 * @return string
	 */
	public function get_title() {
		return _x( 'Name of the query', 'backend', 'twrp' );
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
	 * Get the default setting. In this case an empty string.
	 *
	 * @return string
	 */
	public static function get_default_setting() {
		return '';
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
		return self::get_default_setting();
	}

	/**
	 * Sanitize a variable, to be safe for processing.
	 *
	 * @param mixed $name The string to be sanitized.
	 *
	 * @return string
	 */
	public static function sanitize_setting( $name ) {
		if ( ! is_string( $name ) ) {
			return '';
		}

		$sanitized_name = preg_replace( '/[^a-zA-Z0-9 ()\-_]/', '', $name );
		return $sanitized_name;
	}

	/**
	 * Create and insert the new arguments for the WP_Query.
	 *
	 * The previous query arguments will be modified such that will also contain
	 * the new settings, and will return the new query arguments to be passed
	 * into WP_Query class.
	 *
	 * @param array $previous_query_args The query arguments before being modified.
	 * @param mixed $query_settings All query settings, these settings are unsanitized.
	 *
	 * @return array The new arguments modified.
	 */
	public static function add_query_arg( $previous_query_args, $query_settings ) {
		return $previous_query_args;
	}
}
