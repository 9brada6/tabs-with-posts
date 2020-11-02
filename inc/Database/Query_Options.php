<?php
/**
 * Implements the class that will manage all the WP database options.
 */

namespace TWRP\Database;

use TWRP\Query_Setting\Query_Name;
use TWRP\Utils;

/**
 * Class that contains functions to manage the settings stored in WordPress
 * database "Options" table.
 */
class Query_Options {
	const QUERIES_OPTION_KEY = 'twrp__post_queries';

	/**
	 * Holds the various sanitized settings of the cache.
	 *
	 * @var array
	 */
	protected static $query_settings_cache = array();

	/**
	 * Returns all registered article queries. The settings are sanitized.
	 *
	 * @return array
	 */
	public static function get_all_queries() {
		$all_queries = get_option( self::QUERIES_OPTION_KEY, array() );

		if ( ! is_array( $all_queries ) ) {
			$all_queries = array();
		}

		$all_queries_keys = array_keys( $all_queries );
		foreach ( $all_queries_keys as $key ) {
			if ( ! self::query_exists( $key ) ) {
				unset( $all_queries[ $key ] );
			}
		}

		$all_queries_keys = array_keys( $all_queries );
		foreach ( $all_queries_keys as $query_id ) {
			try {
				$all_queries[ $query_id ] = self::get_all_query_settings( $query_id );
			} catch ( \RuntimeException $e ) {
				unset( $all_queries[ $query_id ] );
			}
		}

		return $all_queries;
	}

	/**
	 * Get all the settings for a specific query ID. The settings are sanitized.
	 *
	 * @throws \RuntimeException In case of query ID not existing.
	 *
	 * @param int|string $query_id The query ID.
	 *
	 * @return array All the settings of the query.
	 */
	public static function get_all_query_settings( $query_id ) {
		$queries_options = get_option( self::QUERIES_OPTION_KEY, array() );

		if ( ! is_array( $queries_options ) ) {
			$queries_options = array();
		}

		if ( ! self::query_exists( $query_id ) ) {
			throw new \RuntimeException( 'Query ID doesn\'t exists.' );
		}

		if ( isset( self::$query_settings_cache[ $query_id ] ) ) {
			return self::$query_settings_cache[ $query_id ];
		}

		// The key is always set, verified in query_exists.
		$sanitized_setting                       = self::sanitize_settings( $queries_options[ $query_id ] );
		self::$query_settings_cache[ $query_id ] = $sanitized_setting;
		return $sanitized_setting;
	}

	/**
	 * Function used specifically to get a name for the query to be displayed
	 * in the backend. If the query does not have a name set, will default to
	 * Query-$id, or the translated version.
	 *
	 * @param string|int $query_id
	 *
	 * @return string
	 */
	public static function get_query_display_name( $query_id ) {
		try {
			$settings = self::get_all_query_settings( $query_id );
		} catch ( \RuntimeException $e ) {
			$settings = array();
		}

		return Query_Name::get_query_display_name( $settings, $query_id );
	}

	/**
	 * Adds a new query to the options.
	 *
	 * @param array $new_query_settings The settings for the query. Must be sanitized.
	 *
	 * @return void
	 */
	public static function add_new_query( $new_query_settings ) {
		if ( ! is_array( $new_query_settings ) ) {
			return;
		}

		$queries = get_option( self::QUERIES_OPTION_KEY, array() );

		if ( ! is_array( $queries ) ) {
			$queries = array();
		}

		// Just to make the Id bigger than 0.
		if ( empty( $queries ) ) {
			$queries[0] = null;
		}

		$queries[] = $new_query_settings;

		update_option( self::QUERIES_OPTION_KEY, $queries );
	}

	/**
	 * Updates an article query with new settings.
	 *
	 * The new settings will completely replace the previous settings. Like
	 * the old settings were deleted first, and then the new ones added.
	 *
	 * @param int|string $query_id A number that represents the query key.
	 * @param array      $new_query_settings An array of settings to update the new query.
	 *
	 * @return bool True if query has been found and updated, false if it hasn't.
	 */
	public static function update_query( $query_id, $new_query_settings ) {
		$all_queries = get_option( self::QUERIES_OPTION_KEY, array() );

		if ( ! self::query_id_is_valid( $query_id ) ) {
			return false;
		}

		if ( isset( $all_queries[ $query_id ] ) ) {
			$all_queries[ $query_id ] = $new_query_settings;
			update_option( self::QUERIES_OPTION_KEY, $all_queries );
			return true;
		}

		return false;
	}

	/**
	 * Delete a query.
	 *
	 * @param int|string $query_id The ID of the query.
	 *
	 * @return void
	 */
	public static function delete_query( $query_id ) {
		$queries_options = get_option( self::QUERIES_OPTION_KEY, array() );

		if ( ! is_array( $queries_options ) ) {
			$queries_options = array();
		}

		// We don't delete the query because when we assign a new one will take
		// the same id, causing frontend displays to go wrong.
		if ( isset( $queries_options[ $query_id ] ) ) {
			$queries_options[ $query_id ] = null;
		}

		update_option( self::QUERIES_OPTION_KEY, $queries_options );
	}

	/**
	 * Sanitize all the settings from a query.
	 *
	 * @param array $settings The settings to be sanitized.
	 *
	 * @return array
	 */
	public static function sanitize_settings( $settings ) {
		$sanitized_settings  = array();
		$registered_settings = Utils::get_all_query_settings_objects();

		foreach ( $registered_settings as $setting_class ) {
			$setting_name = $setting_class->get_setting_name();
			if ( ! isset( $settings[ $setting_name ] ) ) {
				$sanitized_settings[ $setting_name ] = $setting_class->get_default_setting();
				continue;
			}
			$to_sanitize_value = $settings[ $setting_name ];

			$sanitized_value                     = $setting_class->sanitize_setting( $to_sanitize_value );
			$sanitized_settings[ $setting_name ] = $sanitized_value;
		}

		return $sanitized_settings;
	}

	/**
	 * Check to see if a query exist.
	 *
	 * If the query has been deleted will return false.
	 *
	 * @param int|string $query_id The key to be verified.
	 *
	 * @return bool True if exist, false otherwise.
	 */
	public static function query_exists( $query_id ) {
		$all_queries = get_option( self::QUERIES_OPTION_KEY, array() );

		if ( ! is_array( $all_queries ) ) {
			return false;
		}

		if ( ! self::query_id_is_valid( $query_id ) ) {
			return false;
		}

		if ( isset( $all_queries[ $query_id ] ) && is_array( $all_queries[ $query_id ] ) ) {
			return true;
		}

		return false;
	}

	/**
	 * Check if a key is valid to represent the id of a query.
	 *
	 * The key should be an int higher than 0(array key).
	 *
	 * @param mixed $key The key to check.
	 *
	 * @return bool
	 */
	protected static function query_id_is_valid( $key ) {
		if ( is_numeric( $key ) && $key > 0 ) {
			return true;
		}

		return false;
	}
}
