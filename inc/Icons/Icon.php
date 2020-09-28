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
			$this->fix_classes = $icon_args['fix_classes']; }
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
	 * @return string
	 */
	public function get_icon_filename() {
		$relative_path = 'assets/svgs/' . $this->get_icon_type() . '/' . strtolower( $this->get_icon_brand() ) . '/' . $this->file_name;
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

	#endregion -- Get basic info

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

		$fix_icon_class = '';
		if ( ! empty( $this->get_fix_classes() ) ) {
			$fix_icon_class = ' ' . $this->get_fix_classes();
		}

		// todo: add aria-label and role="icon"?
		$html =
		'<span class="twrp-i' . esc_attr( $fix_icon_class . $additional_class ) . '">' .
		'<svg><use xlink:href="#' . esc_attr( $this->get_id() ) . '"/></svg>' .
		'</span>';

		return $html;
	}

	/**
	 * Returns the HTML that define the icon.
	 *
	 * @return string|false False if icon cannot be retrieved.
	 */
	public function get_icon_svg_definition() {
		// todo: verify if filesystem class exist.

		$filesystem = new WP_Filesystem_Direct( null );
		$content    = $filesystem->get_contents( $this->get_icon_filename() );
		if ( is_string( $content ) ) {
			return $content;
		}

		return false;
	}

	/**
	 * Get the icon description to be displayed as an option.
	 *
	 * @return string
	 */
	public function get_option_icon_description() {
		// todo.
		return $this->get_icon_description();
	}

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
