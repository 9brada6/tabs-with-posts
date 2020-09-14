<?php
/**
 * @todo Change all function names, from svg to icon, instead of get_svg_def, change to get_icon_def.
 */

namespace TWRP\Icons;

use TWRP_Main;
use TWRP\Database\General_Options;
use TWRP\Icons\Date_Icons;
use TWRP\Icons\User_Icons;
use TWRP\Icons\Category_Icons;
use TWRP\Icons\Comments_Icons;
use TWRP\Icons\Comments_Disabled_Icons;
use TWRP\Icons\Views_Icons;
use TWRP\Icons\Rating_Icons;

/**
 * By convention, to make the working more easily, every Id should be composed
 * as: twrp-{icon-meaning}-{brand/author}-[additional-icon-meaning]-{icon-type}.
 */
class SVG_Manager {

	/**
	 * Get all registered icons that represents the user.
	 *
	 * @return array<string,array>
	 */
	public static function get_user_icons() {
		return User_Icons::get_user_icons();
	}

	/**
	 * Get all registered icons that represents the date.
	 *
	 * @return array<string,array>
	 */
	public static function get_date_icons() {
		return Date_Icons::get_date_icons();
	}

	/**
	 * Get all registered icons that represents the category.
	 *
	 * Keywords to search for:  tag, bookmark, hashtag, taxonomy, category.
	 *
	 * @return array<string,array>
	 */
	public static function get_category_icons() {
		return Category_Icons::get_category_icons();
	}

	/**
	 * Get all registered icons that represents the comments.
	 *
	 * @return array<string,array>
	 */
	public static function get_comment_icons() {
		return Comments_Icons::get_comment_icons();
	}

	/**
	 * Get all registered icons that represents the disabled comments.
	 *
	 * @return array<string,array>
	 */
	public static function get_comment_disabled_icons() {
		return Comments_Disabled_Icons::get_disabled_comment_icons();
	}


	/**
	 * Get all registered icons that represents the number of views.
	 *
	 * @return array<string,array>
	 */
	public static function get_views_icons() {
		return Views_Icons::get_views_icons();
	}

	/**
	 * Get all registered icons that represents the rating.
	 *
	 * @return array<string,array>
	 */
	public static function get_rating_icons() {
		return Rating_Icons::get_rating_icons();
	}

	/**
	 * Get all rating icons packs.
	 *
	 * @return array<string,array>
	 */
	public static function get_rating_packs() {
		return Rating_Icons::get_rating_packs();
	}

	/**
	 * Get all registered icons that represents the rating.
	 *
	 * @return array<string,array>
	 */
	public static function get_all_icons() {
		return self::get_user_icons() + self::get_date_icons() + self::get_category_icons() +
		self::get_comment_icons() + self::get_views_icons() + self::get_rating_icons();
	}

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
		add_action( 'admin_footer', array( __CLASS__, 'include_all_svg' ) );

		// todo: remove:
		add_action( 'wp_footer', array( __CLASS__, 'include_defs_inline_all_needed_icons' ) );
		add_action( 'admin_footer', array( __CLASS__, 'write_all_needed_icons_to_file' ) );
	}

	/**
	 * Creates a useful description for a icon, composed from the
	 * brand(optionally), icon type and icon description.
	 *
	 * @param array $icon An icon type.
	 * @param bool $with_brand Whether or not to include the brand, default false.
	 * @return string
	 */
	public static function get_icon_description( $icon, $with_brand = false ) {
		// todo:
		return $icon['description'];
	}

	/**
	 * Make the icons of same brand be nested in an array, where the key is the
	 * brand name.
	 *
	 * @param array $icons
	 * @return array
	 */
	public static function nest_icons_by_brands( $icons ) {
		$branded_icons = array();

		foreach ( $icons as $icon_id => $icon ) {
			$brand = $icon['brand'];

			if ( ! isset( $branded_icons[ $brand ] ) ) {
				$branded_icons[ $brand ] = array();
			}

			$branded_icons[ $brand ][ $icon_id ] = $icon;
		}

		return $branded_icons;
	}

	/**
	 * Echo all the svg defs.
	 *
	 * @return void
	 */
	public static function include_all_svg() {
		$svg = self::get_all_vector_defs();
		echo '<svg style="display:none;"><defs>' . $svg . '</defs></svg>'; // phpcs:ignore -- No XSS;
	}

	/**
	 * Get a HTML string that will define all vectors.
	 *
	 * @return string
	 */
	public static function get_all_vector_defs() {
		$output = '';

		foreach ( self::get_date_icons() as $svg ) {
			$output .= $svg['svg'];
		}

		foreach ( self::get_views_icons() as $svg ) {
			$output .= $svg['svg'];
		}

		return $output;
	}

	/**
	 * Get a registered icon details.
	 *
	 * @param string $name
	 * @return array|false
	 */
	public static function get_icon( $name ) {
		$icons = self::get_all_icons();
		if ( isset( $icons[ $name ] ) ) {
			return $icons[ $name ];
		}

		return false;
	}

	/**
	 * Get the HTML definition of a svg item.
	 *
	 * @param string $name
	 * @return string
	 */
	public static function get_svg_def( $name ) {
		$icon = self::get_icon( $name );

		if ( is_array( $icon ) ) {
			return $icon['svg'];
		}

		return '';
	}

	/**
	 * @todo
	 *
	 * @return void
	 */
	public static function test_icons() {
		echo '<script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>';

		$icons = self::get_all_icons();

		echo '<p>';
		foreach ( $icons as $id => $vector ) {
			echo "<span style='display:none'>";
			echo $vector['svg']; // phpcs:ignore
			echo '</span>';
		}
		foreach ( $icons as $id => $vector ) {
			echo '<span style="display:block;margin:3px">';
			self::include_svg( $id );
			echo 'Ok <span style="margin-left: 6px;"> <span class="twrp-i twrp-views-i"><svg><use href="#twrp-views-goo-f" /></svg></span>Lala</span>';
			echo '</span>';
		}
		?>

		<?php
		echo '</p>';
	}

	public static function include_svg( $icon_name, $additional_class = '' ) {
		echo self::get_html_svg( $icon_name, $additional_class = '' );
	}

	public static function get_html_svg( $icon_name, $additional_class = '' ) {

		if ( ! empty( $additional_class ) ) {
			$additional_class = ' ' . $additional_class;
		}

		if ( key_exists( $icon_name, self::get_views_icons() ) ) {
			$additional_class = ' twrp-views-i';
		}

		// todo: fix this class.
		if ( key_exists( $icon_name, self::get_comment_icons() ) ) {
			$additional_class = ' twrp-views-c';
		}

		$icon           = self::get_icon( $icon_name );
		$fix_icon_class = '';
		if ( is_array( $icon ) && ! empty( $icon['fix_classes'] ) ) {
			$fix_icon_class = ' ' . $icon['fix_classes'];
		}

		// todo: add aria-label and role="icon"?
		$html =
		'<span class="twrp-i' . esc_attr( $fix_icon_class . $additional_class ) . '">' .
			'<svg><use xlink:href="#' . esc_attr( $icon_name ) . '"/></svg>' .
		'</span>';

		return $html;
	}

	#region -- Create a full HTML tag with all the icons.

	public static function get_all_icons_svg() {

	}

	public static function create_all_icons_file() {

	}

	#endregion -- Create a full HTML tag with all the icons.

	#region -- Include Icons, either inline or via a file

	/**
	 * Echo the HTML to include all icons as inline svg defs.
	 *
	 * @return void
	 */
	public static function include_defs_inline_all_needed_icons() {
		echo self::get_defs_inline_all_needed_icons(); // phpcs:ignore
	}

	/**
	 * Get the HTML to include all icons as inline svg defs.
	 *
	 * @return string
	 */
	public static function get_defs_inline_all_needed_icons() {
		$html = '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="display:none;"><defs>';

		foreach ( self::get_all_used_icons() as $icon_id ) {
			$html .= self::get_svg_def( $icon_id );
		}

		$html .= '</defs></svg>';

		return $html;
	}

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
	public static function get_defs_file_all_needed_icons() {
		$html = '<!-- This file is generated dynamically. Do NOT modify it. -->' . "\n" .
		'<?xml version="1.0" encoding="UTF-8" standalone="no"?>' . "\n" .
		'<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="display:none;"><defs>';

		foreach ( self::get_all_used_icons() as $icon_id ) {
			$html .= self::get_svg_def( $icon_id );
		}

		$html .= '</defs></svg>';

		return $html;
	}

	/**
	 * Enqueue all needed icons file. This function needs to be called at the
	 * correct action, usually "wp_enqueue_scripts".
	 *
	 * @todo: make $ver to change when the file has been updated.
	 *
	 * @return void
	 */
	public static function enqueue_all_needed_icons_file() {
		$file_path = trailingslashit( TWRP_Main::get_plugin_directory() ) . 'assets/svgs/needed-icons.svg';
		$deps      = array();
		$ver       = '1.0.0';

		wp_enqueue_style( 'twrp_needed_icons', $file_path, $deps, $ver, 'all' );
	}

	#endregion -- Include Icons, either inline or via a file

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

	public static function get_all_per_widget_used_icons() {
		return array();
	}

}
