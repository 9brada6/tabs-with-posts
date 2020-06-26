<?php

namespace TWRP\Query_Setting;

class Suppress_Filters implements Query_Setting {

	const SUPPRESS_FILTERS__SETTING_NAME = 'suppress';

	/**
	 * The name of the HTML form input and of the array key that stores the option of the query.
	 *
	 * @return string
	 */
	public static function get_setting_name() {
		return 'suppress_filters';
	}

	/**
	 * The title of the setting accordion.
	 *
	 * @return string
	 */
	public function get_title() {
		return _x( 'Suppress Filters', 'backend', 'twrp' );
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
	 * @param mixed $current_setting An array filled with only the settings that
	 * this class work with. The settings are sanitized.
	 *
	 * @return void
	 */
	public function display_setting( $current_setting ) {
		$suppress_the_filters = $current_setting[ self::SUPPRESS_FILTERS__SETTING_NAME ];
		$name                 = self::get_setting_name() . '[' . self::SUPPRESS_FILTERS__SETTING_NAME . ']';
		?>
		<div class="twrp-filters-setting">
			<div class="twrp-posts-queries-tab__paragraph">
			<select id="twrp-filters-setting__suppress-filters" name="<?= esc_attr( $name ); ?>">
			<option value="false" <?= selected( $suppress_the_filters, 'false' ); ?>>
					<?= _x( 'Do not suppress the filters', 'backend', 'twrp' ); ?>
				</option>
				<option value="true" <?= selected( $suppress_the_filters, 'true' ); ?>>
					<?= _x( 'Suppress the filters', 'backend', 'twrp' ); ?>
				</option>
			</select>
			</div>
		</div>
		<?php
	}

	/**
	 * The default setting to be retrieved, if user didn't set anything.
	 *
	 * @return mixed
	 */
	public static function get_default_setting() {
		return array(
			self::SUPPRESS_FILTERS__SETTING_NAME => 'false',
		);
	}

	/**
	 * Get the setting submitted from the form. The setting is sanitized and
	 * ready to use.
	 *
	 * @return mixed
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
		if ( ! is_array( $setting ) ) {
			return self::get_default_setting();
		}

		if ( ! isset( $setting[ self::SUPPRESS_FILTERS__SETTING_NAME ] ) ) {
			return self::get_default_setting();
		}

		$suppress_possible_values = array( 'true', 'false' );
		if ( ! in_array( $setting[ self::SUPPRESS_FILTERS__SETTING_NAME ], $suppress_possible_values, true ) ) {
			return self::get_default_setting();
		}
		$sanitized_settings = array();
		$sanitized_settings[ self::SUPPRESS_FILTERS__SETTING_NAME ] = $setting[ self::SUPPRESS_FILTERS__SETTING_NAME ];

		return $sanitized_settings;
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
		if ( ! isset( $query_settings[ self::get_setting_name() ][ self::SUPPRESS_FILTERS__SETTING_NAME ] ) ) {
			return $previous_query_args;
		}

		if ( 'true' === $query_settings[ self::get_setting_name() ][ self::SUPPRESS_FILTERS__SETTING_NAME ] ) {
			$previous_query_args['suppress_filters'] = true;
		}

		return $previous_query_args;
	}
}
