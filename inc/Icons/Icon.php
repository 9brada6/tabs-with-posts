<?php
/**
 * File that contains the class with the same name.
 *
 * @todo: add a variable that will hold the definition, and will not search every time.
 * @todo: try to speed this line: $icons = SVG_Manager::get_all_icons_attr(); by detecting what icons should we get, and not all. After that delete get_all_icons_attr() function.
 */

namespace TWRP\Icons;

use TWRP_Main;
use RuntimeException;
use WP_Filesystem_Direct;

class Icon {

	/**
	 * The id of the icon.
	 *
	 * @var string
	 */
	protected $id;

	/**
	 * The brand of the icon.
	 *
	 * @var string
	 */
	protected $brand;

	/**
	 * The icon description.
	 *
	 * @var string
	 */
	protected $description;

	/**
	 * The type of the icon. Ex: Filled, Outlined, ..etc.
	 *
	 * @var string
	 */
	protected $type;

	/**
	 * The filename of the icon.
	 *
	 * @var string
	 */
	protected $file_name;

	/**
	 * Classes to fix the icon, usually fix the icon vertical align.
	 *
	 * @var string
	 */
	protected $fix_classes = '';

	/**
	 * Holds the svg definition, to not retrieve multiple times.
	 *
	 * @var string
	 */
	protected $cache_definition = '';

	/**
	 * Construct the class. Either provide an icon id alongside with the needed
	 * arguments, or provide just the $icon_id, and let arguments be auto set.
	 *
	 * @throws RuntimeException In case that Icon Id does not exist.
	 *
	 * @param string $icon_id
	 * @param array $icon_args Defaults to the icon id arguments.
	 */
	public function __construct( $icon_id, $icon_args = array() ) {
		if ( empty( $icon_args ) ) {
			$icons = SVG_Manager::get_all_icons_attr();
			if ( isset( $icons[ $icon_id ] ) ) {
				$icon_args = $icons[ $icon_id ];
			} else {
				throw new RuntimeException( 'Icon id does not exist.' );
			}
		}

		$this->id          = $icon_id;
		$this->brand       = $icon_args['brand'];
		$this->description = $icon_args['description'];
		$this->type        = $icon_args['type'];
		$this->file_name   = $icon_args['file_name'];

		if ( isset( $icon_args['fix_classes'] ) ) {
			$this->fix_classes = $icon_args['fix_classes'];
		}
	}

	#region -- Get basic info

	/**
	 * Get the icon id.
	 *
	 * @return string
	 */
	public function get_id() {
		return $this->id;
	}

	/**
	 * Get the icon brand.
	 *
	 * @return string
	 */
	public function get_icon_brand() {
		return $this->brand;
	}

	/**
	 * Get the icon description.
	 *
	 * @return string
	 */
	public function get_icon_description() {
		return $this->description;
	}

	/**
	 * Get the icon type.
	 *
	 * @return string
	 */
	public function get_icon_type() {
		return $this->type;
	}

	/**
	 * Returns the absolute path to a file that contains the icon.
	 *
	 * @return string|false False if filename cannot be retrieved.
	 */
	public function get_icon_filename() {
		try {
			$relative_path = 'assets/svgs/' . $this->get_folder_name_category() . '/' . $this->get_brand_folder() . '/' . $this->file_name;
		} catch ( RuntimeException $e ) {
			return false;
		}

		return trailingslashit( TWRP_Main::get_plugin_directory() ) . $relative_path;
	}

	/**
	 * Get the fix classes.
	 *
	 * @return string
	 */
	public function get_fix_classes() {
		return $this->fix_classes;
	}

	/**
	 * Return the name of the folder, named after the icon brand.
	 *
	 * @return string
	 */
	protected function get_brand_folder() {
		$folder = str_replace( ' ', '-', strtolower( $this->get_icon_brand() ) );

		return $folder;
	}

	#endregion -- Get basic info

	/**
	 * Display the icon.
	 *
	 * @param string $additional_class Can be multiple classes separated by spaces.
	 * @return void
	 */
	public function display( $additional_class = '' ) {
		echo $this->get_html( $additional_class ); // phpcs:ignore
	}

	/**
	 * Returns the HTML to include an icon.
	 *
	 * @param string $additional_class Can be multiple classes separated by spaces.
	 * @return string
	 */
	public function get_html( $additional_class = '' ) {
		if ( ! empty( $additional_class ) ) {
			$additional_class = ' ' . $additional_class;
		}

		$icon_category_class = ' ' . $this->get_icon_category_class();

		$fix_icon_class = '';
		if ( ! empty( $this->get_fix_classes() ) ) {
			$fix_icon_class = ' ' . $this->get_fix_classes();
		}

		// todo: add aria-label and role="icon"?
		$html =
		'<span class="twrp-i' . esc_attr( $fix_icon_class . $additional_class . $icon_category_class ) . '" role="icon" aria-label="' . esc_attr( $this->get_icon_aria_label() ) . '">' .
		'<svg><use xlink:href="#' . esc_attr( $this->get_id() ) . '"/></svg>' .
		'</span>';

		return $html;
	}

	/**
	 * Returns the HTML that define the icon.
	 *
	 * @return string|false False if icon cannot be retrieved.
	 * @suppress PhanUndeclaredConstant
	 * @psalm-suppress UnresolvableInclude
	 * @psalm-suppress UndefinedConstant
	 */
	public function get_icon_svg_definition() {
		if ( ! empty( $this->cache_definition ) ) {
			return $this->cache_definition;
		}

		if ( ! class_exists( 'WP_Filesystem_Base' ) || ! class_exists( 'WP_Filesystem_Direct' ) ) {
			require_once ABSPATH . 'wp-admin/includes/class-wp-filesystem-base.php';
			require_once ABSPATH . 'wp-admin/includes/class-wp-filesystem-direct.php';
		}

		$filesystem    = new WP_Filesystem_Direct( null );
		$icon_filename = $this->get_icon_filename();

		if ( ! is_string( $icon_filename ) ) {
			return false;
		}

		$content = $filesystem->get_contents( $icon_filename );
		if ( is_string( $content ) ) {
			$this->cache_definition = $content;
			return $content;
		}

		return false;
	}

	/**
	 * Get the icon description to be displayed as an option.
	 *
	 * @param bool $with_brand Whether or not to include the brand in the name.
	 * @return string
	 */
	public function get_option_icon_description( $with_brand = false ) {
		// todo.
		return $this->get_icon_description();
	}

	#region -- Helpers

	/**
	 * Get a numeric value, representing the icon category. The numeric value
	 * is a constant declared in this class. Return false otherwise.
	 *
	 * @throws RuntimeException In case the numeric value cannot be retrieved.
	 *
	 * @return int|false
	 */
	public function get_icon_category() {
		$icon_id = $this->get_id();

		if ( strstr( $icon_id, 'views' ) ) {
			return SVG_Manager::VIEWS_ICON;
		}

		if ( strstr( $icon_id, 'cal' ) ) {
			return SVG_Manager::DATE_ICON;
		}

		if ( strstr( $icon_id, 'dcom' ) ) {
			return SVG_Manager::DISABLED_COMMENT_ICON;
		}

		if ( strstr( $icon_id, 'com' ) && ! strstr( $icon_id, 'dcom' ) ) {
			return SVG_Manager::COMMENT_ICON;
		}

		if ( strstr( $icon_id, 'user' ) ) {
			return SVG_Manager::USER_ICON;
		}

		if ( strstr( $icon_id, 'tax' ) ) {
			return SVG_Manager::CATEGORY_ICON;
		}

		if ( strstr( $icon_id, 'rat' ) ) {
			return SVG_Manager::RATING_ICON;
		}

		throw new RuntimeException();
	}

	/**
	 * Constructor helper, that will get the name of the folder category of the
	 * icons.
	 *
	 * @throws RuntimeException In case folder name cannot be retrieved.
	 *
	 * @return string
	 */
	public function get_folder_name_category() {
		$icon_category = $this->get_icon_category();
		$icon_folders  = SVG_Manager::ICON_CATEGORY_FOLDER;

		if ( isset( $icon_folders[ $icon_category ] ) ) {
			return $icon_folders[ $icon_category ];
		} else {
			throw new RuntimeException();
		}
	}

	/**
	 * Get the icon class, corresponding to icon category.
	 *
	 * @return string
	 */
	public function get_icon_category_class() {
		try {
			$category = $this->get_icon_category();
		} catch ( RuntimeException $e ) {
			return '';
		}
		$classes = SVG_Manager::ICON_CATEGORY_CLASS;

		if ( isset( $classes[ $category ] ) ) {
			return $classes[ $category ];
		}

		return '';
	}

	/**
	 * Get the aria label for the icon. If the icon does not have an aria-label,
	 * will return an empty string.
	 *
	 * @return string
	 */
	public function get_icon_aria_label() {
		$labels = SVG_Manager::get_category_aria_label();

		try {
			$icon_category = $this->get_icon_category();
		} catch ( RuntimeException $e ) {
			return '';
		}

		if ( isset( $labels[ $icon_category ] ) ) {
			return $labels[ $icon_category ];
		}

		return '';
	}

	#endregion -- Helpers

	#region -- Static Helpers

	/**
	 * Make the icons of same brand be nested in an array, where the key is the
	 * brand name.
	 *
	 * @param array<Icon> $icons
	 * @return array
	 */
	public static function nest_icons_by_brands( $icons ) {
		$branded_icons = array();

		foreach ( $icons as $icon_id => $icon ) {
			$brand = $icon->get_icon_brand();

			if ( ! isset( $branded_icons[ $brand ] ) ) {
				$branded_icons[ $brand ] = array();
			}

			$branded_icons[ $brand ][ $icon_id ] = $icon;
		}

		return $branded_icons;
	}

	#endregion -- Static Helpers

}
