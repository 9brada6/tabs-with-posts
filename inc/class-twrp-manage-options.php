<?php
/**
 * Implements the class that will manage all the WP database options.
 *
 * @todo make every setting an array. And make sure of it. We will ned to implement
 * this on add_style/query, and on query/style_exist functions.
 *
 * @todo: Divide this file in 2 separated files.
 *
 * @package Tabs_With_Recommended_Posts
 */

/**
 * Class that contains functions to manage the settings stored in WordPress
 * database "Options" table.
 */
class TWRP_Manage_Options {
	const QUERIES_OPTION_KEY = 'twrp__article_queries';

	const STYLES_OPTION_KEY = 'twrp__article_styles';

	// =========================================================================
	// Functions to Retrieve/Add/Remove/Edit Queries from database table:

	/**
	 * Returns all registered article queries.
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

		return $all_queries;
	}

	/**
	 * Get all the settings for a specific query ID.
	 *
	 * @throws RuntimeException In case of query ID not existing.
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
			throw new RuntimeException( 'Query ID doesn\'t exists.' );
		}

		return $queries_options[ $query_id ];
	}

	/**
	 * Returns a specific setting for a query ID.
	 * Returns null if setting or query ID doesn't exist.
	 *
	 * @throws RuntimeException In case of query ID not existing.
	 *
	 * @param int|string $query_id The query ID.
	 * @param string     $setting_name The setting name.
	 *
	 * @return mixed|null The value of the setting, or null in case it didn't exist.
	 */
	public static function get_specific_query_setting( $query_id, $setting_name ) {
		$queries = get_option( self::QUERIES_OPTION_KEY, array() );

		if ( ! is_array( $queries ) ) {
			$queries = array();
		}

		if ( ! self::query_exists( $query_id ) ) {
			throw new RuntimeException( 'Query ID doesn\'t exists.' );
		}

		if ( isset( $queries[ $query_id ][ $setting_name ] ) ) {
			return $queries[ $query_id ][ $setting_name ];
		}

		return null;
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

		if ( isset( $all_queries[ (int) $query_id ] ) ) {
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


	// =========================================================================
	// Functions to Retrieve/Add/Remove/Edit Styles from database table:

	/**
	 * Returns all registered styles.
	 *
	 * @return array
	 */
	public static function get_all_styles() {
		$all_styles = get_option( self::STYLES_OPTION_KEY, array() );

		if ( ! is_array( $all_styles ) ) {
			$all_styles = array();
		}

		$all_styles_keys = array_keys( $all_styles );
		foreach ( $all_styles_keys as $key ) {
			if ( ! self::style_exists( $key ) ) {
				unset( $all_styles[ $key ] );
			}
		}

		return $all_styles;
	}

	/**
	 * Get all the settings for a specific style ID.
	 *
	 * @throws RuntimeException In case of a style ID not existing.
	 *
	 * @param int|string $style_id The style ID.
	 *
	 * @return array All the settings of the style.
	 */
	public static function get_all_style_settings( $style_id ) {
		$styles = get_option( self::STYLES_OPTION_KEY, array() );

		if ( ! is_array( $styles ) ) {
			$styles = array();
		}

		if ( ! self::style_exists( $style_id ) ) {
			throw new RuntimeException( 'Style ID doesn\'t exists.' );
		}

		return $styles[ $style_id ];
	}

	/**
	 * Returns a specific setting for a style ID.
	 * Returns null if setting or style ID doesn't exist.
	 *
	 * @throws RuntimeException In case of style ID not existing.
	 *
	 * @param int|string $style_id The style ID.
	 * @param string     $setting_name The setting name.
	 *
	 * @return mixed|null The value of the setting, or null in case it didn't exist.
	 */
	public static function get_specific_style_setting( $style_id, $setting_name ) {
		$styles = get_option( self::STYLES_OPTION_KEY, array() );

		if ( ! is_array( $styles ) ) {
			$styles = array();
		}

		if ( ! self::style_exists( $style_id ) ) {
			throw new RuntimeException( 'Style ID doesn\'t exists.' );
		}

		if ( isset( $styles[ $style_id ][ $setting_name ] ) ) {
			return $styles[ $style_id ][ $setting_name ];
		}

		return null;
	}

	/**
	 * Adds a new style.
	 *
	 * @param array $new_style_settings The settings for the style. Must be sanitized.
	 *
	 * @return void
	 */
	public static function add_new_style( $new_style_settings ) {
		if ( ! is_array( $new_style_settings ) ) {
			return;
		}

		$styles = get_option( self::STYLES_OPTION_KEY, array() );

		if ( ! is_array( $styles ) ) {
			$styles = array();
		}

		// Just to make the Id bigger than 0.
		if ( empty( $styles ) ) {
			$styles[0] = null;
		}

		$styles[] = $new_style_settings;

		update_option( self::STYLES_OPTION_KEY, $styles );
	}

	/**
	 * Updates a style with new settings.
	 *
	 * The new settings will completely replace the previous settings. Like
	 * the old settings were deleted first, and then the new ones added.
	 *
	 * @param int|string $style_id A number that represents the style key.
	 * @param array      $new_style_settings An array of settings to update the new style.
	 *
	 * @return bool True if style has been found and updated, false if it hasn't.
	 */
	public static function update_style( $style_id, $new_style_settings ) {
		$all_styles = get_option( self::STYLES_OPTION_KEY, array() );

		if ( ( ! self::style_id_is_valid( $style_id ) ) || ( ! is_array( $new_style_settings ) ) ) {
			return false;
		}

		if ( isset( $all_styles[ $style_id ] ) ) {
			$all_styles[ $style_id ] = $new_style_settings;
			update_option( self::STYLES_OPTION_KEY, $all_styles );
			return true;
		}

		return false;
	}

	/**
	 * Delete a style.
	 *
	 * @param int|string $style_id The ID of the style.
	 *
	 * @return void
	 */
	public static function delete_style( $style_id ) {
		$all_styles = get_option( self::STYLES_OPTION_KEY, array() );

		if ( ! is_array( $all_styles ) ) {
			$all_styles = array();
		}

		// We don't delete the style because when we assign a new one will take
		// the same id, causing frontend displays to go wrong.
		if ( isset( $all_styles[ $style_id ] ) ) {
			$all_styles[ $style_id ] = null;
		}

		update_option( self::STYLES_OPTION_KEY, $all_styles );
	}

	/**
	 * Check to see if a style exist.
	 *
	 * If the style has been deleted will return false.
	 *
	 * @param int|string $style_id The key to be verified.
	 *
	 * @return bool True if exist, false otherwise.
	 */
	public static function style_exists( $style_id ) {
		$all_styles = get_option( self::STYLES_OPTION_KEY, array() );

		if ( ! is_array( $all_styles ) ) {
			return false;
		}

		if ( ! self::style_id_is_valid( $style_id ) ) {
			return false;
		}

		if ( isset( $all_styles[ (int) $style_id ] ) ) {
			return true;
		}

		return false;
	}

	/**
	 * Check if a key is valid to represent the id of a style.
	 *
	 * The key should be an int higher than 0(array key).
	 *
	 * @param mixed $key The key to check.
	 *
	 * @return bool
	 */
	protected static function style_id_is_valid( $key ) {
		if ( is_numeric( $key ) && $key > 0 ) {
			return true;
		}

		return false;
	}

}
