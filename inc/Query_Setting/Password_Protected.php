<?php
/**
 * Contains the class that will filter articles via the post password.
 */

namespace TWRP\Query_Setting;

/**
 * Creates the possibility to filter a query based on the post passwords,
 * if they are set.
 */
class Password_Protected implements Query_Setting {

	/**
	 * The name of the HTML form input and of the array key that stores the option of the query.
	 *
	 * @return string
	 */
	public static function get_setting_name() {
		return 'password_protected';
	}

	/**
	 * The title of the setting accordion.
	 *
	 * @return string
	 */
	public function get_title() {
		return _x( 'Post Passwords', 'backend', 'twrp' );
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
	 * @param mixed $current_setting The setting is sanitized.
	 *
	 * @return void
	 */
	public function display_setting( $current_setting ) {
		?>
		<div>
			<select name="<?= esc_attr( self::get_setting_name() ); ?>">
				<option value="NA">Not Applied (Posts with and without password)</option>
				<option value="has_password">Only posts with password</option>
				<option value="no_password">Only posts without password</option>
			</select>
		</div>
		<?php
	}

	/**
	 * The default setting to be retrieved, if user didn't set anything.
	 *
	 * @return mixed
	 */
	public static function get_default_setting() {
		return null;
	}

	/**
	 * Get the setting submitted from the form. The setting is sanitized and
	 * ready to use.
	 *
	 * @return 'has_password'|'no_password'|null Null for posts with and without passwords.
	 */
	public function get_submitted_sanitized_setting() {
		if ( isset( $_POST[ self::get_setting_name() ] ) ) { // phpcs:ignore -- Nonce verified.
			return self::sanitize_setting( wp_unslash( $_POST[ self::get_setting_name() ] ) ); // phpcs:ignore -- Nonce verified.
		}
		return self::get_default_setting();
	}

	/**
	 * Sanitize a variable, to be safe for processing.
	 *
	 * @param mixed $setting
	 * @return 'has_password'|'no_password'|null Null for posts with and without passwords.
	 */
	public static function sanitize_setting( $setting ) {
		$options = array( 'has_password', 'no_password' );
		if ( ! in_array( $setting, $options, true ) ) {
			return self::get_default_setting();
		}

		return $setting;
	}

	/**
	 * Create and insert the new arguments for the WP_Query.
	 *
	 * The previous query arguments will be modified such that will also contain
	 * the new settings, and will return the new query arguments to be passed
	 * into WP_Query class.
	 *
	 * @param array $previous_query_args The query arguments before being modified.
	 * @param mixed $query_settings All query settings, these settings are sanitized.
	 * @return array The new arguments modified.
	 */
	public static function add_query_arg( $previous_query_args, $query_settings ) {
		if ( ! isset( $query_settings[ self::get_setting_name() ] ) ) {
			return $previous_query_args;
		}

		$setting = $query_settings[ self::get_setting_name() ];

		if ( 'has_password' === $setting ) {
			$previous_query_args['has_password'] = true;
		}

		if ( 'no_password' === $setting ) {
			$previous_query_args['has_password'] = false;
		}

		return $previous_query_args;
	}
}
