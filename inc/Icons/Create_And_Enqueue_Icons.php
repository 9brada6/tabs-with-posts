<?php
/**
 * File that contains the class with the same name.
 */

namespace TWRP\Icons;

use TWRP_Main;
use TWRP\Directory_Utils;
use TWRP\Filesystem_Utils;
use RuntimeException;
use TWRP\Database\General_Options;
use TWRP\Database\Inline_Icons_Option;
use TWRP\Database\Aside_Options;


class Create_And_Enqueue_Icons {

	/**
	 * Called before anything else, to initialize all the things that this class
	 * needs.
	 *
	 * Always called at 'after_setup_theme' action. Other things added here should be
	 * additionally checked, for example by admin hooks, or whether or not to be
	 * included in special pages, ...etc.
	 *
	 * @return void
	 */
	public static function init() {
		$include_inline = General_Options::get_option( General_Options::SVG_INCLUDE_INLINE );
		if ( 'true' === $include_inline ) {
			add_action( 'wp_head', array( __CLASS__, 'include_needed_icons_file' ) );
		} else {
			// todo:
			// Include inline icons before the tabs are getting displayed
		}

		// In admin, include all icons file.
		add_action( 'admin_head', array( __CLASS__, 'include_all_icons_file' ) );

		// When settings get updated, generate the needed icons file and inline svg.
		add_action( 'twrp_general_before_settings_submitted', array( __CLASS__, 'write_needed_icons_on_settings_submitted' ) );
	}

	#region -- Enqueue icons

	/**
	 * Echo the HTML to include all icons as inline svg defs.
	 *
	 * @return void
	 */
	public static function include_defs_inline_needed_icons() {
		echo Inline_Icons_Option::get_inline_icons(); // phpcs:ignore
	}

	/**
	 * Enqueue all needed icons file. This function needs to be called at the
	 * correct action, usually "wp_enqueue_scripts".
	 *
	 * @return void
	 */
	public static function include_needed_icons_file() {
		$file_url = Directory_Utils::get_needed_icons_url();
		$time     = Aside_Options::get_needed_icons_generation_timestamp();
		self::ajax_include_svg_file( $file_url . '?time="' . $time . '"' );
	}

	/**
	 * Enqueue all needed icons file. This function needs to be called at
	 * 'wp_head' or 'admin_head' action.
	 *
	 * @return void
	 */
	public static function include_all_icons_file() {
		$file_path = Directory_Utils::get_all_icons_url();
		self::ajax_include_svg_file( $file_path . '?version="' . TWRP_MAIN::VERSION . '"' );
	}

	/**
	 * Include a svg file at the top of the document(after the body tag ends).
	 *
	 * The svg files cannot be included in the head, and inline svg is the only
	 * way to reference a SVG by id. Inline svgs are not good because they
	 * cannot be cached, so thus we include a file containing all svgs as inline.
	 *
	 * Careful at the included file, to not violate the CORS.
	 *
	 * @param string $file_path The path to the file to be included.
	 * @return void
	 */
	protected static function ajax_include_svg_file( $file_path ) {
		?>
		<script>
		(function() { const ajax = new XMLHttpRequest(); ajax.open('GET', '<?= esc_url( $file_path ) ?>', true); ajax.send();
			ajax.onload = function( e ) { var div = document.createElement( 'div' ); div.innerHTML = ajax.responseText; insertIntoDocument(div); };
			function insertIntoDocument(elem) { if( document.body ) { document.body.insertBefore(elem, document.body.childNodes[ 0 ]); } else { setTimeout( insertIntoDocument, 100 ); } }
		})();
		</script>
		<?php
	}

	#endregion -- Enqueue icons

	#region -- Create needed icons, inline and in a file

	public static function write_needed_icons_on_settings_submitted( $updated_settings ) {
		foreach ( General_Options::ICON_KEYS as $icon_setting ) {
			if ( isset( $updated_settings[ $icon_setting ] ) && General_Options::get_option( $icon_setting ) !== $updated_settings[ $icon_setting ] ) {
				add_action(
					'twrp_general_after_settings_submitted',
					function() {
						self::write_needed_icons_to_file();
						self::write_needed_icons_to_option_in_database();
					}
				);
				break;
			}
		}
	}

	/**
	 * Write needed icons to a specific file in assets folder.
	 *
	 * @return bool Whether or not the file was written.
	 */
	protected static function write_needed_icons_to_file() {
		$file_path = Directory_Utils::get_needed_icons_path();
		$html      = self::get_defs_file_needed_icons();

		return Filesystem_Utils::set_file_contents( $file_path, $html );
	}

	/**
	 * Write needed icons to a option in database.
	 *
	 * @return bool Whether or not the option was updated.
	 */
	protected static function write_needed_icons_to_option_in_database() {
		$html = self::get_defs_inline_needed_icons();
		Aside_Options::set_icons_generation_timestamp_to_current_timestamp();
		return Inline_Icons_Option::set_inline_icons( $html );
	}

	/**
	 * Get the HTML to include all icons as a file of svg defs.
	 *
	 * @return string
	 */
	protected static function get_defs_file_needed_icons() {
		$html_header =
		'<?xml version="1.0" encoding="UTF-8" standalone="no"?>' . "\n" .
		'<!-- This file is generated dynamically. Do NOT modify it. -->' . "\n" .
		'<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="display:none;">' . "\n";
		$html_footer = '</svg>';

		$html = '';
		foreach ( self::get_all_used_icons() as $icon_id ) {
			try {
				$icon = Icon_Factory::get_icon( $icon_id );
			} catch ( RuntimeException $e ) {
				continue;
			}

			$def = $icon->get_icon_svg_definition();
			if ( false !== $def ) {
				$html .= $def;
			}
		}
		$html = str_replace( '<svg', '<symbol', $html );
		$html = str_replace( 'svg>', 'symbol>', $html );

		$html = $html_header . $html . $html_footer;

		return $html;
	}

	/**
	 * Get the HTML to include all icons as inline svg defs.
	 *
	 * @return string
	 */
	public static function get_defs_inline_needed_icons() {
		$html_header = '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="display:none;">';
		$html_footer = '</svg>';

		$html = '';
		foreach ( self::get_all_used_icons() as $icon_id ) {
			try {
				$icon = Icon_Factory::get_icon( $icon_id );
			} catch ( RuntimeException $e ) {
				continue;
			}

			$def = $icon->get_icon_svg_definition();
			if ( false !== $def ) {
				$html .= $def;
			}
		}
		$html = str_replace( '<svg', '<symbol', $html );
		$html = str_replace( 'svg>', 'symbol>', $html );

		$html = $html_header . $html . $html_footer;

		return $html;
	}

	#endregion -- Create needed icons, inline and in a file

	#region -- Get all used website icons Ids

	/**
	 * Get an array with all used icons ids, for all widgets.
	 *
	 * @return array<string>
	 */
	public static function get_all_used_icons() {
		$icons = array();

		$options = General_Options::ICON_KEYS;
		foreach ( $options as $option_key ) {
			$option_value = General_Options::get_option( $option_key );

			if ( General_Options::RATING_ICON_PACK === $option_key ) {
				if ( is_string( $option_value ) ) {
					try {
						$rating_pack = Icon_Factory::get_rating_pack( $option_value );
					} catch ( RuntimeException $e ) {
						continue;
					}

					$icon = $rating_pack->get_filled_icon();
					array_push( $icons, $icon->get_id() );
					$icon = $rating_pack->get_half_filled_icon();
					array_push( $icons, $icon->get_id() );
					$icon = $rating_pack->get_empty_icon();
					array_push( $icons, $icon->get_id() );
				}

				continue;
			}

			if ( ! empty( $option_value ) && is_string( $option_value ) ) {
				array_push( $icons, $option_value );
			}
		}

		return $icons;
	}

	#endregion -- Get all used website icons Ids
}
