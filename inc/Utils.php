<?php

namespace TWRP;

use TWRP\TWRP_Widget\Widget;
use DateTimeZone;

class Utils {

	const PLUGIN_DIR_NAME = 'tabs-with-recommended-posts';

	/**
	 * Verify that a value is a number bigger than 0.
	 *
	 * This will work everywhere where WP use an id, like posts, users,
	 * categories, ...etc.
	 *
	 * @param mixed $post_id
	 * @return int|false False if not valid.
	 */
	public static function get_valid_wp_id( $post_id ) {
		if ( ! is_numeric( $post_id ) ) {
			return false;
		}

		$post_id = (int) $post_id;

		if ( ! ( $post_id > 0 ) ) {
			return false;
		}

		return $post_id;
	}

	/**
	 * Verify that each value in an array is a number bigger than 0.
	 *
	 * This will work everywhere where WP use an id, like posts, users,
	 * categories, ...etc.
	 *
	 * @param array $post_ids
	 * @return array<int>
	 */
	public static function get_valid_wp_ids( $post_ids ) {
		foreach ( $post_ids as $key => $post_id ) {
			$sanitized_id = self::get_valid_wp_id( $post_id );

			if ( $sanitized_id ) {
				$post_ids[ $key ] = $sanitized_id;
			} else {
				unset( $post_ids[ $key ] );
			}
		}

		return $post_ids;
	}

	/**
	 * Flatten multi-dimensional array.
	 *
	 * @param array $array
	 * @return array
	 */
	public static function flatten_array( array $array ) {
		$ret_array = array();
		foreach ( new \RecursiveIteratorIterator( new \RecursiveArrayIterator( $array ) ) as $value ) {
			$ret_array[] = $value;
		}
		return $ret_array;
	}

	/**
	 * Get the name of a control for the Tabs with Recommended Posts Widget.
	 *
	 * @param int|string $widget_id
	 * @param int|string ...$other_name_keys
	 * @return string
	 *
	 * @psalm-param numeric $widget_id
	 * @psalm-param array-key ...$other_name_keys
	 */
	public static function get_twrp_widget_name( $widget_id, ...$other_name_keys ) {
		$suffix = '[' . $widget_id . ']';
		foreach ( $other_name_keys as $name_key ) {
			$name_key = sanitize_key( (string) $name_key );
			if ( empty( $name_key ) ) {
				continue;
			}

			$suffix .= '[' . $name_key . ']';
		}

		$twrp_widget_base_id = Widget::TWRP_BASE_ID;

		$name = 'widget-' . $twrp_widget_base_id . $suffix;
		return $name;
	}

	/**
	 * Get the name of a control for the Tabs with Recommended Posts Widget.
	 *
	 * @param int|string $widget_id
	 * @param int|string ...$other_name_keys
	 * @return string
	 *
	 * @psalm-param numeric $widget_id
	 */
	public static function get_twrp_widget_id( $widget_id, ...$other_name_keys ) {
		$suffix = '-' . $widget_id;
		foreach ( $other_name_keys as $name_key ) {
			$suffix .= '-' . $name_key;
		}

		$twrp_widget_base_id = Widget::TWRP_BASE_ID;

		$name = 'widget-' . $twrp_widget_base_id . $suffix;
		return $name;
	}

	#region -- WP Date and Time Polyfills

	/**
	 * Get the website timezone.
	 *
	 * This will try to use WP function wp_timezone() available from WP 5.3, or
	 * else, will fallback to a polyfill.
	 *
	 * @return DateTimeZone
	 */
	public static function wp_timezone() {
		if ( function_exists( 'wp_timezone' ) ) {
			return wp_timezone(); // @phan-suppress-current-line PhanUndeclaredFunction
		}

		return new DateTimeZone( self::wp_timezone_polyfill() );
	}

	/**
	 * Get the timezone string. Used as polyfill if wp_timezone is not available.
	 *
	 * @return string
	 */
	protected static function wp_timezone_polyfill() {
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


	/**
	 * Retrieve post published or modified time as a Unix timestamp. This function
	 * will either use the native WP function with the same name(WP 5.3), or
	 * will fallback to the polyfill version.
	 *
	 * @param \WP_Post|int|null $post WP_Post object or ID. Default is global $post object.
	 * @param string $field Published or modified time to use from database. Accepts 'date' or 'modified'.
	 * @return int|false Unix timestamp on success, false on failure.
	 */
	public static function get_post_timestamp( $post = null, $field = 'date' ) {
		if ( function_exists( 'get_post_timestamp' ) ) {
			return get_post_timestamp( $post, $field ); // @phan-suppress-current-line PhanUndeclaredFunction
		}

		return self::get_post_timestamp_polyfill( $post, $field );
	}

	/**
	 * Polyfill version of the get_post_timestamp() function introduced in WP 5.3.
	 *
	 * @param \WP_Post|int|null $post WP_Post object or ID. Default is global $post object.
	 * @param string $field Published or modified time to use from database. Accepts 'date' or 'modified'.
	 * @return int|false Unix timestamp on success, false on failure.
	 */
	protected static function get_post_timestamp_polyfill( $post = null, $field = 'date' ) {
		$datetime = self::get_post_datetime( $post, $field );

		if ( false === $datetime ) {
			return false;
		}

		return $datetime->getTimestamp();
	}


	/**
	 * Retrieve post published or modified time as a DateTimeImmutable object
	 * instance. This will either use the wp function if available(WP 5.3), or
	 * will fallback to the polyfill version.
	 *
	 * For legacy reasons, this function allows to choose to instantiate from
	 * local or UTC time in database. Normally this should make no difference to
	 * the result. However, the values might get out of sync in database,
	 * typically because of timezone setting changes. The parameter ensures the
	 * ability to reproduce backwards compatible behaviors in such cases.
	 *
	 * @param \WP_Post|int|null $post WP_Post object or ID. Default is global $post object.
	 * @param string $field Published or modified time to use from database. Accepts 'date' or 'modified'.
	 * @param string $source Local or UTC time to use from database. Accepts 'local' or 'gmt'.
	 * @return \DateTimeImmutable|false Time object on success, false on failure.
	 */
	public static function get_post_datetime( $post = null, $field = 'date', $source = 'local' ) {
		if ( function_exists( 'get_post_datetime' ) ) {
			return get_post_datetime( $post, $field, $source ); // @phan-suppress-current-line PhanUndeclaredFunction
		}

		return self::get_post_datetime_polyfill( $post, $field, $source );
	}

	/**
	 * Retrieve post published or modified time as a DateTimeImmutable object
	 * instance. This is a polyfill of the wp function get_post_datetime() (WP 5.3).
	 *
	 * For legacy reasons, this function allows to choose to instantiate from
	 * local or UTC time in database. Normally this should make no difference to
	 * the result. However, the values might get out of sync in database,
	 * typically because of timezone setting changes. The parameter ensures the
	 * ability to reproduce backwards compatible behaviors in such cases.
	 *
	 * @param \WP_Post|int|null $post WP_Post object or ID. Default is global $post object.
	 * @param string $field Published or modified time to use from database. Accepts 'date' or 'modified'.
	 * @param string $source Local or UTC time to use from database. Accepts 'local' or 'gmt'.
	 * @return \DateTimeImmutable|false Time object on success, false on failure.
	 */
	protected static function get_post_datetime_polyfill( $post = null, $field = 'date', $source = 'local' ) {
		$post = get_post( $post );

		if ( ! $post || is_array( $post ) ) {
			return false;
		}

		$wp_timezone = self::wp_timezone();

		if ( 'gmt' === $source ) {
			$time     = ( 'modified' === $field ) ? $post->post_modified_gmt : $post->post_date_gmt;
			$timezone = new DateTimeZone( 'UTC' );
		} else {
			$time     = ( 'modified' === $field ) ? $post->post_modified : $post->post_date;
			$timezone = $wp_timezone;
		}

		if ( empty( $time ) || '0000-00-00 00:00:00' === $time ) {
			return false;
		}

		$datetime = date_create_immutable_from_format( 'Y-m-d H:i:s', $time, $timezone );

		if ( false === $datetime ) {
			return false;
		}

		return $datetime->setTimezone( $wp_timezone );
	}


	/**
	 * Retrieves the current time as an object with the timezone from settings.
	 * This function will either call the WP function current_datetime() if
	 * available(> WP 5.3) or fallback to a polyfill.
	 *
	 * @return \DateTimeImmutable Date and time object.
	 */
	public static function current_datetime() {
		if ( function_exists( 'current_datetime' ) ) {
			return current_datetime(); // @phan-suppress-current-line PhanUndeclaredFunction
		}

		return self::current_datetime_polyfill();
	}

	/**
	 * Retrieves the current time as an object with the timezone from settings.
	 * This function is a polyfill for the WP function introduced in WP 5.3.
	 *
	 * @return \DateTimeImmutable Date and time object.
	 */
	protected static function current_datetime_polyfill() {
		return new \DateTimeImmutable( 'now', self::wp_timezone() );
	}

	#endregion -- WP Date and Time Polyfills

	#region -- Directory Utilities

	/**
	 * Get this plugin assets URL.
	 *
	 * @return string
	 */
	public static function get_assets_directory_url() {
		$plugin_dir = self::get_plugin_directory_url();

		$assets_dir = trailingslashit( $plugin_dir ) . 'assets/';
		return $assets_dir;
	}

	/**
	 * Get this plugin directory URL.
	 *
	 * @return string
	 */
	protected static function get_plugin_directory_url() {
		$directory = __DIR__;

		$index_of_directory = strrpos( $directory, self::PLUGIN_DIR_NAME );

		if ( false === $index_of_directory ) { // @phan-suppress-current-line PhanSuspiciousValueComparison
			return $directory;
		}

		$directory     = substr( $directory, 0, $index_of_directory + strlen( self::PLUGIN_DIR_NAME ) ) . '/non-existent-file.php';
		$directory_url = plugin_dir_url( $directory );

		return $directory_url;
	}

	#endregion -- Directory Utilities

}
