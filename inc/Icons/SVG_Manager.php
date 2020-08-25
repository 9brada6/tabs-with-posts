<?php
/**
 * @todo Change all function names, from svg to icon, instead of get_svg_def, change to get_icon_def.
 */

namespace TWRP\Icons;

use TWRP\Icons\Date_Icons;
use TWRP\Icons\User_Icons;
use TWRP\Icons\Category_Icons;
use TWRP\Icons\Comments_Icons;
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
		echo get_html_svg( $icon_name, $additional_class = '' );
	}

	public static function get_html_svg( $icon_name, $additional_class = '' ) {

		if ( ! empty( $additional_class ) ) {
			$additional_class = ' ' . $additional_class;
		}

		if ( key_exists( $icon_name, self::get_views_icons() ) ) {
			$additional_class = ' twrp-views-i';
		}

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
}
