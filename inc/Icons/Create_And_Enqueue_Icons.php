<?php
/**
 * File that contains the class with the same name.
 */

namespace TWRP\Icons;

use TWRP_Main;
use TWRP\Utils;
use RuntimeException;
use TWRP\Database\General_Options;

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
		add_action( 'admin_head', array( __CLASS__, 'include_all_icons_file' ) );

		// todo: remove:
		add_action( 'admin_footer', array( __CLASS__, 'write_all_needed_icons_to_file' ) );
	}

	#region -- Enqueue icons

	/**
	 * Enqueue all needed icons file. This function needs to be called at the
	 * correct action, usually "wp_enqueue_scripts".
	 *
	 * @todo: make $ver to change when the file has been updated.
	 *
	 * @return void
	 */
	public static function include_all_needed_icons_file() {
		$file_path = trailingslashit( TWRP_Main::get_plugin_directory() ) . 'assets/svgs/needed-icons.svg';
		$ver       = '1.0.0';
		self::ajax_include_svg_file( $file_path );
	}

	/**
	 * Echo the HTML to include all icons as inline svg defs.
	 *
	 * @return void
	 */
	public static function include_defs_inline_all_needed_icons() {
		echo self::get_defs_inline_all_needed_icons(); // phpcs:ignore
	}

	/**
	 * Enqueue all needed icons file. This function needs to be called at
	 * 'wp_head' or 'admin_head' action.
	 *
	 * @todo: make $ver to change when the file has been updated.
	 *
	 * @return void
	 */
	public static function include_all_icons_file() {
		$file_path = trailingslashit( Utils::get_assets_directory_url() ) . 'svgs/all-icons.svg';
		self::ajax_include_svg_file( $file_path );
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

	/**
	 * Write all needed icons to a file named assets/svgs/needed-icons.svg
	 *
	 * @todo: WP_Filesystem check for credentials.
	 * @return bool Whether or not the file was written.
	 */
	public static function write_all_needed_icons_to_file() {
		$file_path = trailingslashit( TWRP_Main::get_plugin_directory() ) . 'assets/svgs/needed-icons.svg';

		if ( ! file_exists( $file_path ) ) {
			return false;
		}

		$wp_filesystem_available = WP_Filesystem();
		if ( ! $wp_filesystem_available ) {
			return false;
		}

		global $wp_filesystem;
		$html = self::get_defs_file_all_needed_icons();

		/** @psalm-suppress UndefinedConstant */
		// @phan-suppress-next-line PhanUndeclaredConstant -- FS_CHMOD_FILE is declared.
		if ( ! $wp_filesystem->put_contents( $file_path, $html, FS_CHMOD_FILE ) ) {
			return false;
		}

		return true;
	}

	/**
	 * Get the HTML to include all icons as a file of svg defs.
	 *
	 * @return string
	 */
	protected static function get_defs_file_all_needed_icons() {
		$html_header =
		'<?xml version="1.0" encoding="UTF-8" standalone="no"?>' . "\n" .
		'<!-- This file is generated dynamically. Do NOT modify it. -->' . "\n" .
		'<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="display:none;">';
		$html_footer = '</svg>';

		$html = '';
		foreach ( self::get_all_used_icons() as $icon_id ) {
			try {
				$icon = new Icon( $icon_id );
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
	public static function get_defs_inline_all_needed_icons() {
		$html = '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="display:none;"><defs>';

		foreach ( self::get_all_used_icons() as $icon_id ) {
			try {
				$icon = new Icon( $icon_id );
			} catch ( RuntimeException $e ) {
				continue;
			}

			$def = $icon->get_icon_svg_definition();
			if ( false !== $def ) {
				$html .= $def;
			}
		}

		$html .= '</defs></svg>';

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
		if ( 'false' === General_Options::get_option( General_Options::KEY__PER_WIDGET_ICON ) ) {
			return self::get_all_global_used_icons();
		}

		return self::get_all_per_widget_used_icons();
	}

	/**
	 * Get an array with all global used icons ids.
	 *
	 * @todo: add rating icons.
	 *
	 * @return array<string>
	 */
	protected static function get_all_global_used_icons() {
		$icons = array();

		$options = array(
			General_Options::KEY__AUTHOR_ICON,
			General_Options::KEY__DATE_ICON,
			General_Options::KEY__VIEWS_ICON,
			General_Options::KEY__CATEGORY_ICON,
			General_Options::KEY__COMMENTS_ICON,
		);

		foreach ( $options as $option_key ) {
			$option_value = General_Options::get_option( $option_key );
			if ( ! empty( $option_value ) ) {
				array_push( $icons, $option_value );
			}
		}

		return $icons;
	}

	// todo:
	protected static function get_all_per_widget_used_icons() {
		return array();
	}

	#endregion -- Get all used website icons Ids


}
