<?php
/**
 * @todo: make query key is valid protected
 */

class TWRP_Manage_Options {
	const QUERIES_OPTION_KEY = 'twrp__article_queries';

	/**
	 * Returns all registered article queries.
	 *
	 * @return array
	 */
	public static function get_all_queries() {
		$queries_options = get_option( self::QUERIES_OPTION_KEY, array() );

		if ( ! is_array( $queries_options ) ) {
			$queries_options = array();
		}

		foreach ( $queries_options as $key => $option ) {
			if ( ( ! is_array( $option ) ) || ( ! self::query_key_is_valid( $key ) ) ) {
				unset( $queries_options[ $key ] );
			}
		}

		return $queries_options;
	}

	/**
	 * Get all the settings for a specific query ID.
	 *
	 * @param int|string $query_id The query ID.
	 *
	 * @return array|null Array with all the settings of the query, or null if query didn't exist.
	 */
	public static function get_query_options_by_id( $query_id ) {
		$queries_options = get_option( self::QUERIES_OPTION_KEY, array() );

		if ( ! is_array( $queries_options ) ) {
			$queries_options = array();
		}

		if ( ! self::query_key_is_valid( $query_id ) ) {
			return null;
		}

		if ( isset( $queries_options[ $query_id ] ) && is_array( $queries_options[ $query_id ] ) ) {
			return $queries_options[ $query_id ];
		}

		return null;
	}

	/**
	 * Returns a specific setting for a query ID.
	 * Returns null if setting or query ID doesn't exist.
	 *
	 * @param int|string $query_id The query ID.
	 * @param string     $setting_name The setting name.
	 *
	 * @return mixed|null The value of the setting, or null in case it didn't exist.
	 */
	public static function get_specific_query_setting( $query_id, $setting_name ) {
		$queries_options = get_option( self::QUERIES_OPTION_KEY, array() );

		if ( ! is_array( $queries_options ) ) {
			$queries_options = array();
		}

		if ( ! self::query_key_is_valid( $query_id ) ) {
			return null;
		}

		if ( isset( $queries_options[ $query_id ][ $setting_name ] ) ) {
			return $queries_options[ $query_id ][ $setting_name ];
		}

		return null;
	}

	/**
	 * Adds a new query to the options.
	 *
	 * @param array $query_settings The settings for the query. Must be sanitized.
	 *
	 * @return void
	 */
	public static function add_new_query( $query_settings ) {
		$queries_options = get_option( self::QUERIES_OPTION_KEY, array() );

		if ( ! is_array( $queries_options ) ) {
			$queries_options = array();
		}

		$queries_options[] = $query_settings;

		update_option( self::QUERIES_OPTION_KEY, $queries_options );
	}

	/**
	 * Updates an article query with new settings.
	 *
	 * The new settings will completely replace the previous settings. Like
	 * the old settings were deleted first, and then the new ones added.
	 *
	 * @param int|string $query_key A number that represents the query key.
	 * @param array      $query_settings An array of settings to update the new query.
	 *
	 * @return bool True if query has been found and updated, false if it hasn't.
	 */
	public static function update_query( $query_key, $query_settings ) {
		$queries_options = get_option( self::QUERIES_OPTION_KEY, array() );

		if ( ! self::query_key_is_valid( $query_key ) ) {
			return false;
		}

		if ( isset( $queries_options[ $query_key ] ) ) {
			$queries_options[ $query_key ] = $query_settings;
			update_option( self::QUERIES_OPTION_KEY, $queries_options );
			return true;
		}

		return false;
	}

	/**
	 * Delete a query. The query is replaced by the word 'delete' inside the
	 * options array.
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

		if ( isset( $queries_options[ $query_id ] ) ) {
			$queries_options[ $query_id ] = 'deleted';
		}

		update_option( self::QUERIES_OPTION_KEY, $queries_options );
	}

	/**
	 * Check to see if a query that has associated a specific key exist.
	 * Will not return true for a deleted query.
	 *
	 * @param int|string $key The key to be verified.
	 *
	 * @return bool True if exist, false otherwise.
	 */
	public static function query_key_exist( $key ) {
		$available_queries = self::get_all_queries();
		$available_keys    = array_keys( $available_queries );

		if ( ! self::query_key_is_valid( $key ) ) {
			return false;
		}

		foreach ( $available_keys as $available_key ) {
			if ( ( (int) $key ) === ( (int) $available_key ) ) {
				return true;
			}
		}

		return false;
	}

	/**
	 * Check if a key is valid to represent the id of a query.
	 *
	 * The key should be an int higher or equal to 0(array key).
	 *
	 * @param mixed $key The key to check.
	 *
	 * @return bool
	 */
	public static function query_key_is_valid( $key ) {
		if ( is_numeric( $key ) && $key >= 0 ) {
			return true;
		}

		return false;
	}

}
