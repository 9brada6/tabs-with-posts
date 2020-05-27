<?php
/**
 * Contains the class that will filter articles via the post date property.
 */

namespace TWRP\Query_Setting;

/**
 * Creates the possibility to filter a query based on post dates.
 */
class Post_Date implements Query_Setting {

	const DATE_TYPE_NAME = 'date_type';

	const DATE_LAST_PERIOD_NAME = 'last_period';

	const DATE_LAST_DAYS_NAME = 'last_days';

	const BEFORE_DATE_NAME = 'before';

	const AFTER_DATE_NAME = 'after';

	/**
	 * The name of the HTML form input and of the array key that stores the option of the query.
	 *
	 * @return string
	 */
	public static function get_setting_name() {
		return 'post_date';
	}

	/**
	 * The title of the setting accordion.
	 *
	 * @return string
	 */
	public function get_title() {
		return _x( 'Post Date', 'backend', 'twrp' );
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
	 * @param array $current_setting The setting is sanitized.
	 *
	 * @return void
	 */
	public function display_setting( $current_setting ) {
		?>
		<div class="twrp-date-settings">
			<!-- todo: add info text where needed. -->
			<?php $this->display_date_filter_type( $current_setting[ self::DATE_TYPE_NAME ] ); ?>
			<?php $this->display_last_period_of_time_settings( $current_setting ); ?>
			<?php $this->display_between_fixed_point_in_time_settings( $current_setting ); ?>
		</div>
		<?php
	}

	/**
	 * Display the setting to select the type of date that the articles will be
	 * filter on.
	 *
	 * @param string $date_type
	 * @return void
	 */
	protected function display_date_filter_type( $date_type ) {
		?>
		<div class="twrp-date-settings twrp-query-settings__paragraph">
			<select id="twrp-date-settings__js-date-type" name="<?= esc_attr( self::get_setting_name() . '[' . self::DATE_TYPE_NAME . ']' ) ?>">
				<option value="NA" <?php selected( 'NA', $date_type ); ?>>
					<?= _x( 'Not Applied', 'backend', 'twrp' ) ?>
				</option>

				<option value="LT" <?php selected( 'LT', $date_type ); ?>>
					<?= _x( 'Last period of time', 'backend', 'twrp' ) ?>
				</option>

				<option value="FT" <?php selected( 'FT', $date_type ); ?>>
					<?= _x( 'Fixed point in time', 'backend', 'twrp' ) ?>
				</option>
			</select>
		</div>
		<?php
	}

	/**
	 * Display the radio buttons to choose to display posts from last periods of
	 * time, like last week/month/year... etc, or a custom number of days.
	 *
	 * @param array $current_setting
	 * @return void
	 */
	protected function display_last_period_of_time_settings( $current_setting ) {
		$name           = self::get_setting_name() . '[' . self::DATE_LAST_PERIOD_NAME . ']';
		$last_days_name = self::get_setting_name() . '[' . self::DATE_LAST_DAYS_NAME . ']';

		$last_period = '';
		if ( isset( $current_setting[ self::DATE_LAST_PERIOD_NAME ] ) ) {
			$last_period = $current_setting[ self::DATE_LAST_PERIOD_NAME ];
		}

		$last_days_num = '';
		if ( isset( $current_setting[ self::DATE_LAST_DAYS_NAME ] ) && is_numeric( $current_setting[ self::DATE_LAST_DAYS_NAME ] ) ) {
			$last_days_num = $current_setting[ self::DATE_LAST_DAYS_NAME ];
		}

		$additional_settings_hidden_class = '';
		if ( ( ! isset( $current_setting[ self::DATE_TYPE_NAME ] ) ) || ( 'LT' !== $current_setting[ self::DATE_TYPE_NAME ] ) ) {
			$additional_settings_hidden_class = ' twrp-hidden';
		}

		?>
		<div id="twrp-date-settings__js-last-period-wrapper" class="twrp-query-settings__paragraph twrp-query-settings__paragraph-with-hide<?= esc_attr( $additional_settings_hidden_class ); ?>">
			<p class="twrp-query-settings__checkbox-line">
				<input id="twrp-date-settings__last-week" type="radio" value="LW"
					name="<?= esc_attr( $name ) ?>"
					<?php checked( 'LW', $last_period ); ?>
				/>
				<label for="twrp-date-settings__last-week">
					<?= _x( 'This and last week', 'backend', 'twrp' ); ?>
				</label>
			</p>

			<p class="twrp-query-settings__checkbox-line">
				<input id="twrp-date-settings__last-month" type="radio" value="LM"
					name="<?= esc_attr( $name ) ?>"
					<?php checked( 'LM', $last_period ); ?>
				/>
				<label for="twrp-date-settings__last-month">
					<?= _x( 'This and last month', 'backend', 'twrp' ); ?>
				</label>
			</p>

			<p class="twrp-query-settings__checkbox-line">
				<input id="twrp-date-settings__this-year" type="radio" value="TY"
					name="<?= esc_attr( $name ) ?>"
					<?php checked( 'TY', $last_period ); ?>
				/>
				<label for="twrp-date-settings__this-year">
					<?= _x( 'This year', 'backend', 'twrp' ); ?>
				</label>
			</p>

			<p class="twrp-query-settings__checkbox-line twrp-date-settings__custom-last-days-wrapper">
				<input id="twrp-date-settings__js-custom" type="radio" value="C"
					name="<?= esc_attr( $name ) ?>"
					<?php checked( 'C', $last_period ); ?>
				/>
				<label for="twrp-date-settings__js-custom">
					<?= _x( 'Last n days:', 'backend', 'twrp' ); ?>
				</label>

				<input
					class="twrp-date-settings__last-days-input"
					min="0" step="1" type="number"
					name="<?= esc_attr( $last_days_name ); ?>"
					placeholder="<?= esc_attr_x( 'Last number of days...', 'backend', 'twrp' ); ?>"
					value="<?= esc_attr( $last_days_num ); ?>"
				/>
			</p>
		</div>
		<?php
	}

	/**
	 * Display the radio buttons to choose to display posts from last periods of
	 * time, like last week/month/year... etc, or a custom number of days.
	 *
	 * @param array $current_setting
	 * @return void
	 */
	protected function display_between_fixed_point_in_time_settings( $current_setting ) {
		$after_value = '';
		if ( isset( $current_setting[ self::AFTER_DATE_NAME ] ) ) {
			$after_value = $current_setting[ self::AFTER_DATE_NAME ];
		}

		$before_value = '';
		if ( isset( $current_setting[ self::BEFORE_DATE_NAME ] ) ) {
			$before_value = $current_setting[ self::BEFORE_DATE_NAME ];
		}

		$is_hidden_class = '';
		if ( 'FT' !== $current_setting[ self::DATE_TYPE_NAME ] ) {
			$is_hidden_class = ' twrp-hidden';
		}

		?>
		<div id="twrp-date-settings__js-between-wrapper" class="twrp-query-settings__paragraph-with-hide twrp-date-settings__between-wrapper <?= esc_attr( $is_hidden_class ); ?>">
			<span class="twrp-date-settings__after-wrapper">
				<label for="twrp-date-settings__after">
					<?= _x( 'After:', 'backend', 'twrp' ); ?>
				</label>
				<br />
				<input id="twrp-date-settings__after" type="date" autocomplete="off"
					name="<?= esc_attr( self::get_setting_name() . '[' . self::AFTER_DATE_NAME . ']' ); ?>"
					value="<?= esc_attr( $after_value ); ?>"
				/>
			</span>

			<span class="twrp-date-settings__after-before-separator"> &nbsp;&ndash;&nbsp; </span>

			<span class="twrp-date-settings__before-wrapper">
				<label for="twrp-date-settings__before">
					<?= _x( 'Before:', 'backend', 'twrp' ); ?>
				</label>
				<br />
				<input id="twrp-date-settings__before" type="date" autocomplete="off"
					name="<?= esc_attr( self::get_setting_name() . '[' . self::BEFORE_DATE_NAME . ']' ); ?>"
					value="<?= esc_attr( $before_value ); ?>"
				/>
			</span>
		</div>
		<?php
	}

	/**
	 * The default setting to be retrieved, if user didn't set anything.
	 *
	 * @return array
	 */
	public static function get_default_setting() {
		return array(
			self::DATE_TYPE_NAME => 'NA',
		);
	}

	/**
	 * Get the setting submitted from the form. The setting is sanitized and
	 * ready to use.
	 *
	 * @return array
	 */
	public function get_submitted_sanitized_setting() {
		if ( isset( $_POST[ self::get_setting_name() ] ) ) { // phpcs:ignore -- Nonce verified.
			return self::sanitize_setting( wp_unslash( $_POST[ self::get_setting_name() ] ) ); // phpcs:ignore -- Nonce verified.
		}
		return self::get_default_setting();
	}

	/**
	 * Sanitize the date fields, to be safe for processing.
	 *
	 * @param mixed $setting
	 * @return array
	 */
	public static function sanitize_setting( $setting ) {
		$sanitized_settings = array();
		if ( ! is_array( $setting ) ) {
			return self::get_default_setting();
		}

		// Make sure that date type is set.
		if ( ! isset( $setting[ self::DATE_TYPE_NAME ] ) ) {
			return self::get_default_setting();
		}

		$date_type_possibilities = array( 'NA', 'LT', 'FT' );
		if ( ! in_array( $setting[ self::DATE_TYPE_NAME ], $date_type_possibilities, true ) ) {
			return self::get_default_setting();
		}

		if ( 'NA' === $setting[ self::DATE_TYPE_NAME ] ) {
			return self::get_default_setting();
		}

		// Make sure that last period of time is set correctly.
		if ( 'LT' === $setting[ self::DATE_TYPE_NAME ] ) {
			$sanitized_settings[ self::DATE_TYPE_NAME ] = $setting[ self::DATE_TYPE_NAME ];

			$last_period_possibilities = array( 'LW', 'LM', 'TY', 'C' );
			if ( ( ! isset( $setting[ self::DATE_LAST_PERIOD_NAME ] ) ) ||
				( ! in_array( $setting[ self::DATE_LAST_PERIOD_NAME ], $last_period_possibilities, true ) )
			) {
				return self::get_default_setting();
			}
			$sanitized_settings[ self::DATE_LAST_PERIOD_NAME ] = $setting[ self::DATE_LAST_PERIOD_NAME ];

			if ( ! ( 'C' === $setting[ self::DATE_LAST_PERIOD_NAME ] ) ) {
				return $sanitized_settings;
			}

			if ( ( ! isset( $setting[ self::DATE_LAST_DAYS_NAME ] ) ) || ( ! is_numeric( $setting[ self::DATE_LAST_DAYS_NAME ] ) ) || ( $setting[ self::DATE_LAST_DAYS_NAME ] < 0 ) ) {
				return self::get_default_setting();
			}
			$sanitized_settings[ self::DATE_LAST_DAYS_NAME ] = $setting[ self::DATE_LAST_DAYS_NAME ];

			return $sanitized_settings;
		}

		// Make sure that between fixed point in time is correct.
		if ( 'FT' === $setting[ self::DATE_TYPE_NAME ] ) {
			$sanitized_settings[ self::DATE_TYPE_NAME ] = $setting[ self::DATE_TYPE_NAME ];

			if ( isset( $setting[ self::AFTER_DATE_NAME ] ) ) {
				$sanitized_settings[ self::AFTER_DATE_NAME ] = self::sanitize_date( $setting[ self::AFTER_DATE_NAME ] );
			}

			if ( isset( $setting[ self::BEFORE_DATE_NAME ] ) ) {
				$sanitized_settings[ self::BEFORE_DATE_NAME ] = self::sanitize_date( $setting[ self::BEFORE_DATE_NAME ] );
			}

			if ( empty( $sanitized_settings[ self::AFTER_DATE_NAME ] ) && empty( $sanitized_settings[ self::BEFORE_DATE_NAME ] ) ) {
				return self::get_default_setting();
			}

			return $sanitized_settings;
		}

		return self::get_default_setting();
	}

	/**
	 * Sanitize the a date passed from a type="date" input.
	 *
	 * @param string $date
	 * @return string Empty string if not correct, or the correct date.
	 */
	protected static function sanitize_date( $date ) {
		$format = 'Y-m-d';
		$d      = \DateTime::createFromFormat( $format, $date );

		if ( $d && $d->format( $format ) === $date ) {
			return $date;
		} else {
			return '';
		}
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
	// Todo:
	public static function add_query_arg( $previous_query_args, $query_settings ) {
		$date_settings = $query_settings[ self::get_setting_name() ];

		if ( 'NA' === $date_settings[ self::DATE_TYPE_NAME ] ) {
			return $previous_query_args;
		}

		if ( 'LT' === $date_settings[ self::DATE_TYPE_NAME ] ) {
			if ( 'LW' === $date_settings[ self::DATE_LAST_PERIOD_NAME ] ) {

			}

			if ( 'LM' === $date_settings[ self::DATE_LAST_PERIOD_NAME ] ) {

			}

			if ( 'TY' === $date_settings[ self::DATE_LAST_PERIOD_NAME ] ) {

			}

			if ( 'C' === $date_settings[ self::DATE_LAST_PERIOD_NAME ] ) {

			}

			return $previous_query_args;
		}

		if ( 'FT' === $date_settings[ self::DATE_TYPE_NAME ] ) {
			return $previous_query_args;
		}

		return $previous_query_args;
	}
}
