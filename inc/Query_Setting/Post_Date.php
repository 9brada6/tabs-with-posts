<?php
/**
 * Contains the class that will filter articles via the post date property.
 */

namespace TWRP\Query_Setting;

use DateInterval;
use DateTime;
use DateTimeZone;

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


	// =========================================================================
	// Display the settings

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
		<div class="twrp-date-settings__type-selector-wrapper twrp-query-settings__paragraph">
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

		$note_label = _x( 'Note:', 'backend', 'twrp' );
		$note_text  = _x( 'You can either put a number of days manualy(7 for week, 30 for a month, ..etc), or calculate the first day of last week/month and include everything after.', 'backend', 'twrp' );

		$note_label2 = _x( 'Note 2:', 'backend', 'twrp' );
		$note_text2  = _x( 'When putting a custom number of days, do not forget to also check the last option.', 'backend', 'twrp' );

		?>
		<div id="twrp-date-settings__js-last-period-wrapper" class="twrp-date-settings__last-period-wrapper twrp-query-settings__paragraph twrp-query-settings__paragraph-with-hide<?= esc_attr( $additional_settings_hidden_class ); ?>">
			<p class="twrp-posts-queries-tab__paragraph twrp-setting-info">
				<span class="twrp-setting-info__label">
					<?= esc_html( $note_label ); ?>
				</span>
				<span class="twrp-setting-info__text">
					<?= esc_html( $note_text ); ?>
				</span>
			</p>

			<p class="twrp-posts-queries-tab__paragraph twrp-setting-info">
				<span class="twrp-setting-info__label">
				<?= esc_html( $note_label2 ); ?>
				</span>
				<span class="twrp-setting-info__text">
				<?= esc_html( $note_text2 ); ?>
				</span>
			</p>

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

		$info_tag  = _x( 'Note:', 'backend', 'twrp' );
		$info_text = _x( 'If you want, only one setting can be set(either "after" or "before"). For example to display all posts after a specific date, but not before.', 'backend', 'twrp' );

		?>
		<div id="twrp-date-settings__js-between-wrapper" class="twrp-query-settings__paragraph-with-hide twrp-date-settings__between-wrapper <?= esc_attr( $is_hidden_class ); ?>">
			<p class="twrp-query-settings__paragraph twrp-setting-info">
				<span class="twrp-setting-info__tag">
					<?= esc_html( $info_tag ); ?>
				</span>
				<span class="twrp-setting-info__text">
					<?= esc_html( $info_text ); ?>
				</span>
			</p>
			<span class="twrp-date-settings__after-wrapper">
				<label for="twrp-date-settings__after" class="twrp-date-settings__after-label">
					<?= _x( 'After:', 'backend', 'twrp' ); ?>
				</label>
				<br />
				<input id="twrp-date-settings__after" class="twrp-date-settings__after" type="date" autocomplete="off"
					name="<?= esc_attr( self::get_setting_name() . '[' . self::AFTER_DATE_NAME . ']' ); ?>"
					value="<?= esc_attr( $after_value ); ?>"
				/>
			</span>

			<span class="twrp-date-settings__after-before-separator"> &nbsp;&ndash;&nbsp; </span>

			<span class="twrp-date-settings__before-wrapper">
				<label for="twrp-date-settings__before" class="twrp-date-settings__before-label">
					<?= _x( 'Before:', 'backend', 'twrp' ); ?>
				</label>
				<br />
				<input id="twrp-date-settings__before" class="twrp-date-settings__before" type="date" autocomplete="off"
					name="<?= esc_attr( self::get_setting_name() . '[' . self::BEFORE_DATE_NAME . ']' ); ?>"
					value="<?= esc_attr( $before_value ); ?>"
				/>
			</span>
		</div>
		<?php
	}


	// =========================================================================
	// Sanitize settings

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
		$time   = \DateTime::createFromFormat( $format, $date );

		if ( $time && $time->format( $format ) === $date ) {
			return $date;
		} else {
			return '';
		}
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
		if ( isset( $_POST[ self::get_setting_name() ] ) ) { // phpcs:ignore -- Nonce verified
			// phpcs:ignore -- Nonce verified and the setting is sanitized.
			return self::sanitize_setting( wp_unslash( $_POST[ self::get_setting_name() ] ) );
		}

		return self::get_default_setting();
	}


	// =========================================================================
	// Create WP_Query args

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
		$date_settings = $query_settings[ self::get_setting_name() ];

		if ( 'NA' === $date_settings[ self::DATE_TYPE_NAME ] ) {
			return $previous_query_args;
		}

		if ( 'LT' === $date_settings[ self::DATE_TYPE_NAME ] ) {
			$date_query_settings = self::get_last_period_args( $date_settings );
			if ( null !== $date_query_settings ) {
				$previous_query_args['date_query'] = $date_query_settings;
			}
		}

		if ( 'FT' === $date_settings[ self::DATE_TYPE_NAME ] ) {
			$date_query_settings = self::get_between_fixed_period_args( $date_settings );
			if ( null !== $date_query_settings ) {
				$previous_query_args['date_query'] = $date_query_settings;
			}
		}

		return $previous_query_args;
	}

	/**
	 * Create the last period args to insert into WP_Query args.
	 *
	 * @param array $date_settings
	 * @return array|null Null if cannot be created
	 */
	protected static function get_last_period_args( $date_settings ) {
		if ( 'LW' === $date_settings[ self::DATE_LAST_PERIOD_NAME ] ) {
			$time = new DateTime( 'now' );
			$time->setTimezone( self::get_timezone() );
			$time->modify( 'tomorrow' );
			$time->modify( 'last Monday' );
			$time->modify( 'last Monday' );
		}

		if ( 'LM' === $date_settings[ self::DATE_LAST_PERIOD_NAME ] ) {
			$time = new DateTime( 'first day of this month' );
			$time->setTimezone( self::get_timezone() );
			$time->sub( new DateInterval( 'P2D' ) );
			$time->modify( 'first day of this month' );
		}

		if ( 'TY' === $date_settings[ self::DATE_LAST_PERIOD_NAME ] ) {
			$time = new DateTime( 'first day of January this year' );
		}

		if ( 'C' === $date_settings[ self::DATE_LAST_PERIOD_NAME ] ) {
			$time = new DateTime( 'now' );
			$time->setTimezone( self::get_timezone() );

			if ( ! isset( $date_settings[ self::DATE_LAST_DAYS_NAME ] ) ) {
				return null;
			}
			$nr_days = $date_settings[ self::DATE_LAST_DAYS_NAME ];

			if ( is_numeric( $nr_days ) && ( $nr_days > 0 ) ) {
				$nr_days = (int) $nr_days;
			} else {
				return null;
			}

			$time->sub( new DateInterval( 'P' . $nr_days . 'D' ) );
		}

		if ( ! ( $time instanceof DateTime ) ) {
			return null;
		}

		return array( 'after' => self::get_wp_time_args( $time ) );
	}

	/**
	 * Create the after and before settings to insert into WP_Query args.
	 *
	 * @param array $date_settings
	 * @return array|null Null if cannot be created
	 */
	protected static function get_between_fixed_period_args( $date_settings ) {
		$between_args   = array();
		$after_setting  = $date_settings[ self::AFTER_DATE_NAME ];
		$before_setting = $date_settings[ self::BEFORE_DATE_NAME ];

		if ( isset( $before_setting ) && ( ! empty( $before_setting ) ) ) {
			$time = DateTime::createFromFormat( 'Y-m-d', $before_setting );
			if ( ! ( $time instanceof DateTime ) ) {
				return null;
			}

			$between_args['before'] = self::get_wp_time_args( $time );
		}

		if ( isset( $after_setting ) && ( ! empty( $after_setting ) ) ) {
			$time = DateTime::createFromFormat( 'Y-m-d', $after_setting );
			if ( ! ( $time instanceof DateTime ) ) {
				return null;
			}

			$between_args['after'] = self::get_wp_time_args( $time );
		}

		if ( empty( $between_args ) ) {
			return null;
		}

		return $between_args;
	}

	// =========================================================================
	// Helpers

	/**
	 * Returns a specific time array of for WP_Query args, to be used into
	 * 'before' or 'after' keys.
	 *
	 * @param DateTime $time
	 * @return array
	 */
	protected static function get_wp_time_args( $time ) {
		return array(
			'year'  => $time->format( 'Y' ),
			'month' => $time->format( 'm' ),
			'day'   => $time->format( 'd' ),
		);
	}

	/**
	 * Get the website timezone.
	 *
	 * This will try to use WP function wp_timezone() available from WP 5.3, or
	 * else, will fallback to a polyfill.
	 *
	 * @return DateTimeZone
	 */
	protected static function get_timezone() {
		if ( function_exists( 'wp_timezone' ) ) {
			return wp_timezone();
		}

		return new DateTimeZone( self::get_polyfill_timezone() );
	}

	/**
	 * Get the timezone string. Used as polyfill if wp_timezone is not available.
	 *
	 * @return string
	 */
	protected static function get_polyfill_timezone() {
		$timezone_string = get_option( 'timezone_string' );

		if ( $timezone_string ) {
			return $timezone_string;
		}

		$offset  = (float) get_option( 'gmt_offset' );
		$hours   = (int) $offset;
		$minutes = ( $offset - $hours );

		$sign      = ( $offset < 0 ) ? '-' : '+';
		$abs_hour  = abs( $hours );
		$abs_mins  = abs( $minutes * 60 );
		$tz_offset = sprintf( '%s%02d:%02d', $sign, $abs_hour, $abs_mins );

		return $tz_offset;
	}
}
