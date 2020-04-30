<?php

namespace TWRP;

class DB_Style_Options {

	const STYLES_OPTION_KEY = 'twrp__article_styles';

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
	 * @throws \RuntimeException In case of a style ID not existing.
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
			throw new \RuntimeException( 'Style ID doesn\'t exists.' );
		}

		return $styles[ $style_id ];
	}

	/**
	 * Returns a specific setting for a style ID.
	 * Returns null if setting or style ID doesn't exist.
	 *
	 * @throws \RuntimeException In case of style ID not existing.
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
			throw new \RuntimeException( 'Style ID doesn\'t exists.' );
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
