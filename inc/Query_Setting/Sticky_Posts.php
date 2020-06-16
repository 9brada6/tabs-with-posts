<?php
/**
 * Contains the class that will include or not sticky posts.
 */

namespace TWRP\Query_Setting;

/**
 * Class that will create the setting to include or not sticky posts.
 */
class Sticky_Posts implements Query_Setting {

	/**
	 * The name of the setting which represents whether or not to include sticky
	 * posts.
	 */
	const INCLUSION__SETTING_NAME = 'inclusion';

	/**
	 * The name of the HTML form input and of the array key that stores the option of the query.
	 *
	 * @return string
	 */
	public static function get_setting_name() {
		return 'sticky_posts';
	}

	/**
	 * The title of the setting accordion.
	 *
	 * @return string
	 */
	public function get_title() {
		return _x( 'Sticky Posts', 'backend', 'twrp' );
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
	 * @param array $current_setting An array filled with only the settings that
	 * this class work with. The settings are sanitized.
	 * @return void
	 */
	public function display_setting( $current_setting ) {
		$name            = self::get_setting_name() . '[' . self::INCLUSION__SETTING_NAME . ']';
		$selected_option = $current_setting[ self::INCLUSION__SETTING_NAME ];
		?>
		<div class="twrp-sticky-setting">
			<select class="twrp-sticky-setting__selector" name="<?= esc_attr( $name ); ?>">
				<option value="not_include" <?php selected( $selected_option, 'not_include' ); ?>>
					<?= _x( 'Do not include sticky posts', 'backend', 'twrp' ); ?>
				</option>

				<option value="include" <?php selected( $selected_option, 'include' ); ?>>
					<?= _x( 'Include sticky posts', 'backend', 'twrp' ); ?>
				</option>
			</select>
		</div>
		<?php
	}

	/**
	 * The default setting to be retrieved, if user didn't set anything.
	 *
	 * @return string
	 */
	public static function get_default_setting() {
		return array(
			self::INCLUSION__SETTING_NAME => 'not_include',
		);
	}

	/**
	 * Get the setting submitted from the form. The setting is sanitized and
	 * ready to use.
	 *
	 * @return array
	 */
	public function get_submitted_sanitized_setting() {
		if ( isset( $_POST[ self::get_setting_name() ] ) ) { // phpcs:ignore -- Nonce verified
			// phpcs:ignore -- Nonce verified and the setting is sanitized.
			return self::sanitize_setting( wp_unslash( $_POST[ self::get_setting_name() ] ) );
		}

		return self::get_default_setting();
	}

	/**
	 * Sanitize a variable, to be safe for processing.
	 *
	 * @param mixed $setting
	 * @return array The sanitized variable.
	 */
	public static function sanitize_setting( $setting ) {
		if ( ! isset( $setting[ self::INCLUSION__SETTING_NAME ] ) ) {
			return self::get_default_setting();
		}

		$inclusion_setting = $setting[ self::INCLUSION__SETTING_NAME ];
		$possible_values   = array( 'not_include', 'include' );
		if ( ! in_array( $inclusion_setting, $possible_values, true ) ) {
			return self::get_default_setting();
		}

		$sanitized_setting = array(
			self::INCLUSION__SETTING_NAME => $setting[ self::INCLUSION__SETTING_NAME ],
		);

		return $sanitized_setting;
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
		$inclusion_setting = $query_settings[ self::get_setting_name() ][ self::INCLUSION__SETTING_NAME ];

		if ( 'include' === $inclusion_setting ) {
			$previous_query_args['ignore_sticky_posts'] = false;
		} else {
			$previous_query_args['ignore_sticky_posts'] = true;
		}

		return $previous_query_args;
	}
}
