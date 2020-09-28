<?php
/**
 * @todo Change all function names, from svg to icon, instead of get_svg_def, change to get_icon_def.
 */

namespace TWRP\Icons;

use TWRP_Main;
use TWRP\Utils;
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
		add_action( 'admin_head', array( __CLASS__, 'test_same_icons' ) );

		// todo: remove:
		add_action( 'admin_footer', array( __CLASS__, 'write_all_needed_icons_to_file' ) );
	}

	#region -- Get specific icon sets

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

	#endregion -- Get specific icon sets

	/**
	 * Get all registered icons that represents the rating.
	 *
	 * @return array<string,array>
	 */
	public static function get_all_icons() {
		return self::get_user_icons() +
			self::get_date_icons() +
			self::get_category_icons() +
			self::get_comment_icons() +
			self::get_comment_disabled_icons() +
			self::get_views_icons() +
			self::get_rating_icons();
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

	public static function get_html_svg( $icon_name, $additional_class = '' ) {
		if ( ! empty( $additional_class ) ) {
			$additional_class = ' ' . $additional_class;
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
	protected static function get_defs_file_all_needed_icons() {
		$html =
		'<?xml version="1.0" encoding="UTF-8" standalone="no"?>' . "\n" .
		'<!-- This file is generated dynamically. Do NOT modify it. -->' . "\n" .
		'<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="display:none;"><defs>';

		foreach ( self::get_all_used_icons() as $icon_id ) {
			$html .= self::get_svg_def( $icon_id );
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

	#region -- Helpers

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

	#endregion -- Helpers

	#region -- Testing

	/**
	 * This function was created for testing and prototyping. It is not for use
	 * in the theme directly.
	 *
	 * @return void
	 */
	public static function test_icons() {
		$icons = self::get_all_icons();
		self::include_all_icons_file();
		$icon_nr = 0;

		?>
		<style>
			.twrp-test__icon-block-wrapper {
				margin:3px; margin-right: 10px; font-size: 1.5rem; display:inline-block; color:darkblue;
			}
			.twrp-test__icon-wrapper {
				margin-right: 6px
			}
		</style>
		<?php

		echo '<p>';
		foreach ( $icons as $id => $vector ) {
			$random_word = substr( str_shuffle( 'abcdefghijklmnopqrstuvwxyz' ), 0, 4 );

			if ( 0 === $icon_nr % 3 ) {
				echo '<div>';
			}

			// Quick and dirty method.
			$additional_class = in_array( $vector, self::get_views_icons(), true ) ? 'twrp-i--views' : '';
			$additional_class = in_array( $vector, self::get_comment_icons(), true ) ? 'twrp-i--comments' : $additional_class;

			echo '<span class="twrp-test__icon-block-wrapper">';
				echo '<span class="twrp-test__icon-wrapper">';
					echo self::get_html_svg( $id, $additional_class ); // phpcs:ignore
				echo '</span>';
				echo esc_html( $random_word );
			echo '</span>';

			if ( ( ( $icon_nr + 1 ) % 3 ) === 0 || ( count( $icons ) === $icon_nr ) ) {
				echo '</div>';
			}

			$icon_nr++;
		}
		echo '</p>';
	}

	/**
	 * Test to see if each file content corresponds to each icon item.
	 *
	 * Best to be called at 'admin_head' action.
	 *
	 * @return void
	 */
	public static function test_same_icons() {
		$icons = self::get_all_icons();

		foreach ( $icons as $id => $icon ) {
			$icon_type = self::test_get_icon_type( $icon );
			$icon_file = trailingslashit( TWRP_Main::get_plugin_directory() ) . 'assets/svgs/' . $icon_type . '/' . strtolower( $icon['brand'] ) . '/' . $icon['file_name'];

			@$file_content = file_get_contents( $icon_file ); // phpcs:ignore

			if ( false === $file_content ) {
				?>
				<script>console.log('Icon <?= esc_html( $id ); ?> not good. Cannot get it\'s content.');</script>
				<?php
			} elseif ( trim( $file_content ) !== $icon['svg'] ) {
				?>
				<script>console.log('Icon <?= esc_html( $id ); ?> not good. Content does not match.');</script>
				<?php
			}
		}

		?>
		<script>console.log('All icons files successfully tested.');</script>
		<?php

		// Verify attributes:
		$founded_attrs = self::test_icons_must_be_missing_attributes();
		$founded_attrs = implode( ', ', $founded_attrs );
		if ( empty( $founded_attrs ) ) {
			?>
			<script>console.log('All attributes are correct.');</script>
			<?php
		} else {
			?>
			<script>console.log('Attributes that must be deleted: <?= esc_html( $founded_attrs ); ?>');</script>
			<?php
		}

		// Verify Id format
		$founded_ids = self::test_icons_ids();
		$founded_ids = implode( ', ', $founded_ids );
		if ( empty( $founded_ids ) ) {
			?>
			<script>console.log('All ids are correct.');</script>
			<?php
		} else {
			?>
			<script>console.log('Ids that must be renamed: <?= esc_html( $founded_ids ); ?>');</script>
			<?php
		}

		// Verify filename format
		$founded_ids = self::test_all_icons_filename();
		$founded_ids = implode( ', ', $founded_ids );
		if ( empty( $founded_ids ) ) {
			?>
			<script>console.log('All ids are correct.');</script>
			<?php
		} else {
			?>
			<script>console.log('Ids that have filenames wrong: <?= esc_html( $founded_ids ); ?>');</script>
			<?php
		}

		// Verify filename format
		$founded_ids = self::test_icons_description_file_id_match();
		$founded_ids = implode( ', ', $founded_ids );
		if ( empty( $founded_ids ) ) {
			?>
			<script>console.log('All ids are correct.');</script>
			<?php
		} else {
			?>
			<script>console.log('Ids that do not correspond in id-description-filename: <?= esc_html( $founded_ids ); ?>');</script>
			<?php
		}

	}

	/**
	 * Returns an array with all ids where the id, description, and filename do
	 * not match in terms of type(filled, outlined, ..etc).
	 *
	 * @return array<string>
	 */
	protected static function test_icons_description_file_id_match() {
		$all_icons    = self::get_all_icons();
		$icon_matches = array(
			'f'  => array(
				'type'        => 'Filled',
				'file_prefix' => 'filled',
			),
			'ol' => array(
				'type'        => 'Outlined',
				'file_prefix' => 'outlined',
			),
			'sh' => array(
				'type'        => 'Sharp',
				'file_prefix' => 'sharp',
			),
			't'  => array(
				'type'        => 'Thin',
				'file_prefix' => 'thin',
			),
			'dt' => array(
				'type'        => 'DuoTone',
				'file_prefix' => 'duotone',
			),
			'hf' => array(
				'type'        => 'Half Filled',
				'file_prefix' => 'half-filled',
			),
		);
		$wrong_ids    = array();

		foreach ( $all_icons as $icon_id => $icon ) {
			$icon_id_pieces = explode( '-', $icon_id );
			$icon_id_type   = $icon_id_pieces[ count( $icon_id_pieces ) - 1 ];

			if ( $icon_id === 'twrp-user-goo-dt' ) {
				$todo = 'pause';
			}

			if ( ! isset( $icon_matches[ $icon_id_type ] ) ) {
				array_push( $wrong_ids, $icon_id );
				continue;
			}

			if ( strstr( $icon['type'], $icon_matches[ $icon_id_type ]['type'] ) === false ) {
				array_push( $wrong_ids, $icon_id );
				continue;
			}

			if ( strstr( $icon['file_name'], $icon_matches[ $icon_id_type ]['file_prefix'] ) === false ) {
				array_push( $wrong_ids, $icon_id );
				continue;
			}
		}

		return $wrong_ids;
	}

	/**
	 * Return an array with all attributes present in all icons. The attributes
	 * are only the one we care to not be present.
	 *
	 * @return array<string>
	 */
	public static function test_icons_must_be_missing_attributes() {
		$all_icons_file_content = self::test_get_all_icons_content();

		$attributes   = array( 'class', 'role', 'focusable', 'aria', ' "', '  ', "\t" );
		$regex_verify = array( '/#(\d|[abcdef]){3}/i' );
		$founded_attr = array();

		foreach ( $attributes as $attribute ) {
			if ( strpos( $all_icons_file_content, $attribute ) !== false ) {
				array_push( $founded_attr, $attribute );
			}
		}

		foreach ( $regex_verify as $regex_to_verify ) {
			if ( preg_match( $regex_to_verify, $all_icons_file_content ) ) {
				array_push( $founded_attr, $regex_to_verify );
			}
		}

		return $founded_attr;
	}

	/**
	 * Get the all-icons.svg file contents.
	 *
	 * @return string Empty string if not available.
	 */
	protected static function test_get_all_icons_content() {
		$all_icons = trailingslashit( TWRP_Main::get_plugin_directory() ) . 'assets/svgs/all-icons.svg';

		@$file_content = file_get_contents( $all_icons ); // phpcs:ignore
		if ( false === $file_content ) {
			return '';
		}

		return $file_content;
	}

	/**
	 * Get an array with all icon id's that do not have filenames that
	 * corresponds to the style.
	 *
	 * @return array<string>
	 */
	protected static function test_all_icons_filename() {
		$icons = self::get_all_icons();

		$finish_format = array( 'filled', 'outlined', 'thin', 'duotone', 'sharp' );
		$wrong_ids     = array();

		foreach ( $icons as $icon_id => $icon ) {
			$found = false;

			foreach ( $finish_format as $format ) {
				if ( isset( $icon['file_name'] ) && strstr( $icon['file_name'], $format ) !== false ) {
					$found = true;
					break;
				}
			}

			if ( ! $found ) {
				array_push( $wrong_ids, $icon_id );
			}
		}

		return $wrong_ids;
	}

	/**
	 * Test the icons id's to have similar structure.
	 *
	 * @return array<string> Return an array with all id's that do not correspond.
	 */
	protected static function test_icons_ids() {
		$all_icons = self::get_all_icons();
		$wrong_ids = array();

		$prefix         = 'twrp-';
		$icon_id_types  = array( 'user', 'tax', 'com', 'dcom', 'rat', 'views', 'cal' );
		$icon_id_brands = array( 'fa', 'goo', 'di', 'fi', 'ii', 'im', 'ci', 'fe', 'ji', 'li', 'oi', 'ti' );

		foreach ( $all_icons as $icon_id => $icon ) {
			if ( strpos( $icon_id, $prefix ) !== 0 ) {
				array_push( $wrong_ids, $icon_id );
				continue;
			}

			$id_sections = explode( '-', $icon_id );

			if ( ! in_array( $id_sections[1], $icon_id_types, true ) ) {
				array_push( $wrong_ids, $icon_id );
				continue;
			}

			if ( ! in_array( $id_sections[2], $icon_id_brands, true ) ) {
				array_push( $wrong_ids, $icon_id );
				continue;
			}
		}

		return $wrong_ids;
	}

	protected static function test_get_icon_type( $icon ) {
		if ( in_array( $icon, self::get_views_icons(), true ) ) {
			return 'views';
		}

		if ( in_array( $icon, self::get_date_icons(), true ) ) {
			return 'date';
		}

		if ( in_array( $icon, self::get_comment_icons(), true ) ) {
			return 'comments';
		}

		if ( in_array( $icon, self::get_user_icons(), true ) ) {
			return 'user';
		}

		if ( in_array( $icon, self::get_category_icons(), true ) ) {
			return 'taxonomy';
		}

		if ( in_array( $icon, self::get_rating_icons(), true ) ) {
			return 'rating';
		}

		if ( in_array( $icon, self::get_comment_disabled_icons(), true ) ) {
			return 'disabled-comments';
		}

		return '';
	}

	#endregion -- Testing

}
