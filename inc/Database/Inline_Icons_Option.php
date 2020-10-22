<?php
/**
 * File that contains the class with the same name.
 */

namespace TWRP\Database;

/**
 * Manages the inline icons setting, in the WP_Options table.
 */
class Inline_Icons_Option {

	const TABLE_OPTION_KEY = 'twrp__inline_icons';

	/**
	 * Set the inline icons definitions.
	 *
	 * @param string $content
	 * @return bool True if setting was updated, false otherwise.
	 */
	public static function set_inline_icons( $content ) {
		return update_option( self::TABLE_OPTION_KEY, $content );
	}

	/**
	 * Get the inline icons definitions.
	 *
	 * @return string Return empty string if not set.
	 */
	public static function get_inline_icons() {
		$content = get_option( self::TABLE_OPTION_KEY );

		if ( is_string( $content ) ) {
			return $content;
		}

		return '';
	}
}
