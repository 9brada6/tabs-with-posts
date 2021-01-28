<?php

namespace TWRP\Database;

/**
 * A setting in the WP_Options table, that will hold options that are not so
 * important, but nonetheless needs someplace to be stored.
 */
class Aside_Options {

	const TABLE_OPTION_KEY = 'twrp__aside_options';

	const KEY__NEEDED_ICONS_GENERATION_TIME = 'needed_icons_generation_timestamp';

	#region -- Needed Icons Generation Timestamp

	/**
	 * Set the needed icons generation timestamp, to current timestamp.
	 *
	 * @return bool True if succeeded, false otherwise.
	 */
	public static function set_icons_generation_timestamp_to_current_timestamp() {
		$options = get_option( static::TABLE_OPTION_KEY, array() );
		if ( ! is_array( $options ) ) {
			$options = array();
		}

		$time = (string) time();
		$options[ static::KEY__NEEDED_ICONS_GENERATION_TIME ] = $time;

		return update_option( static::TABLE_OPTION_KEY, $options );
	}

	/**
	 * Get the needed icons generation timestamp.
	 *
	 * @return string Empty string if not set.
	 */
	public static function get_needed_icons_generation_timestamp() {
		$options = get_option( static::TABLE_OPTION_KEY, array() );
		if ( ! is_array( $options ) ) {
			return '';
		}

		if ( isset( $options[ static::KEY__NEEDED_ICONS_GENERATION_TIME ] ) ) {
			return (string) $options[ static::KEY__NEEDED_ICONS_GENERATION_TIME ];
		}

		return '';
	}

	#endregion -- Needed Icons Generation Timestamp

}
