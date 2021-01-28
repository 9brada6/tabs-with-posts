<?php

namespace TWRP\Query_Generator\Query_Setting;

use TWRP\Utils\Date_Utils;
use DateInterval;
use DateTime;

/**
 * Creates the possibility to filter(but not order) a query based on post dates.
 */
class Post_Date extends Query_Setting {

	public static function get_class_order_among_siblings() {
		return 35;
	}

	const DATE_TYPE_NAME = 'date_type';

	const DATE_LAST_PERIOD_NAME = 'last_period';

	const DATE_LAST_DAYS_NAME = 'last_days';

	const BEFORE_DATE_NAME = 'before';

	const AFTER_DATE_NAME = 'after';

	public static function get_setting_name() {
		return 'post_date';
	}

	#region -- Sanitization

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

			if ( 'C' !== $setting[ self::DATE_LAST_PERIOD_NAME ] ) {
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
		$time   = DateTime::createFromFormat( $format, $date );

		if ( $time && $time->format( $format ) === $date ) {
			return $date;
		} else {
			return '';
		}
	}

	#endregion -- Sanitization

	public static function get_default_setting() {
		return array(
			self::DATE_TYPE_NAME => 'NA',
		);
	}

	#region -- Create WP Query args

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
			$time->setTimezone( Date_Utils::wp_timezone() );
			$time->modify( 'tomorrow' );
			$time->modify( 'last Monday' );
			$time->modify( 'last Monday' );
		}

		if ( 'LM' === $date_settings[ self::DATE_LAST_PERIOD_NAME ] ) {
			$time = new DateTime( 'first day of this month' );
			$time->setTimezone( Date_Utils::wp_timezone() );
			$time->sub( new DateInterval( 'P2D' ) );
			$time->modify( 'first day of this month' );
		}

		if ( 'TY' === $date_settings[ self::DATE_LAST_PERIOD_NAME ] ) {
			$time = new DateTime( 'first day of January this year' );
		}

		if ( 'C' === $date_settings[ self::DATE_LAST_PERIOD_NAME ] ) {
			$time = new DateTime( 'now' );
			$time->setTimezone( Date_Utils::wp_timezone() );

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

		// @phan-suppress-next-line PhanRedundantCondition -- I prefer to be sure $time is DateTime.
		if ( ! isset( $time ) || ! ( $time instanceof DateTime ) ) {
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

	#endregion -- Create WP Query args

	#region -- Class Helpers

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





	#endregion -- Class Helpers
}
