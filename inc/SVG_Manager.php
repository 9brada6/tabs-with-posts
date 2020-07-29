<?php

namespace TWRP;

class SVG_Manager {

	/**
	 * @var array<string,array>
	 */
	public static $registered_author_vectors = array(
		'twrp-email'    => array(
			'svg'         => '<svg><defs><svg xmlns="http://www.w3.org/2000/svg" id="twrp-email" class="twrp-svg-icon" style="display:none"><path d="m457 30.872h-402c-30.327 0-55 24.673-55 55v264c0 30.327 24.673 55 55 55h129.514c1.581 0 3.084.759 4.023 2.032l47.253 64.063c4.735 6.421 12.026 10.124 20.004 10.161h.12c7.932 0 15.209-3.632 19.979-9.977l48.325-64.284c.939-1.25 2.434-1.996 3.997-1.996h128.785c30.327 0 55-24.673 55-55v-264c0-30.327-24.673-54.999-55-54.999zm25 319c0 2.362-.336 4.645-.951 6.812l-154.105-135.088 155.056-128.678zm-25-289c4.573 0 8.86 1.24 12.551 3.393l-197.543 163.936c-9.252 7.678-22.679 7.678-31.931 0l-197.578-163.965c3.68-2.135 7.949-3.364 12.501-3.364zm-426.049 295.812c-.615-2.167-.951-4.451-.951-6.812v-257.024l155.098 128.711zm269.288 32.156-44.291 58.917-43.268-58.66c-6.568-8.908-17.099-14.226-28.167-14.226h-128.8l152.762-133.911 12.443 10.326c10.177 8.446 22.648 12.667 35.124 12.667 12.472 0 24.948-4.224 35.123-12.667l12.399-10.29 152.721 133.875h-128.07c-10.941.001-21.4 5.222-27.976 13.969z"/></svg></defs></svg>',
			'description' => 'Email',
		),

		'twrp-i-user-1' => array(
			'svg'         => '<svg><defs><svg id="twrp-i-user-1" viewBox="0 0 477.87 477.87" xmlns="http://www.w3.org/2000/svg"><path d="m385.25 332.3-72.653-24.218c-1.738-0.584-3.559-0.883-5.393-0.888h-136.53c-1.834 4e-3 -3.655 0.304-5.393 0.888l-72.653 24.218c-55.345 18.388-92.674 70.176-92.621 128.5 0 9.426 7.641 17.067 17.067 17.067h443.73c9.426 0 17.067-7.641 17.067-17.067 0.053-58.319-37.276-110.11-92.621-128.5z"/><path d="m238.93 0c-56.554 0-102.4 45.846-102.4 102.4v68.267c0.056 56.531 45.869 102.34 102.4 102.4 56.531-0.056 102.34-45.869 102.4-102.4v-68.267c0-56.554-45.846-102.4-102.4-102.4z"/></svg></defs></svg>',
			'description' => 'Icon 1',
		),

		'twrp-i-user-2' => array(
			'svg'         => '<svg><defs><svg id="twrp-i-user-2" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="m437.02 330.98c-27.883-27.882-61.071-48.523-97.281-61.018 38.782-26.711 64.261-71.414 64.261-121.96 0-81.607-66.393-148-148-148s-148 66.393-148 148c0 50.548 25.479 95.251 64.262 121.96-36.21 12.495-69.398 33.136-97.281 61.018-48.352 48.353-74.981 112.64-74.981 181.02h40c0-119.1 96.897-216 216-216s216 96.897 216 216h40c0-68.38-26.629-132.67-74.98-181.02zm-181.02-74.98c-59.551 0-108-48.448-108-108s48.449-108 108-108 108 48.448 108 108-48.449 108-108 108z"/></svg></defs></svg>',
			'description' => 'Icon 2',
		),

		'twrp-i-user-3' => array(
			'svg'         => '<svg><defs><svg id="twrp-i-user-3" viewBox="0 0 477.87 477.87" xmlns="http://www.w3.org/2000/svg"><path d="m385.25 332.3-72.653-24.218c-1.738-0.584-3.559-0.883-5.393-0.888h-136.53c-1.834 4e-3 -3.655 0.304-5.393 0.888l-72.653 24.218c-55.345 18.388-92.674 70.176-92.621 128.5 0 9.426 7.641 17.067 17.067 17.067h443.73c9.426 0 17.067-7.641 17.067-17.067 0.053-58.319-37.276-110.11-92.621-128.5z"/><path d="m238.93 0c-56.554 0-102.4 45.846-102.4 102.4v68.267c0.056 56.531 45.869 102.34 102.4 102.4 56.531-0.056 102.34-45.869 102.4-102.4v-68.267c0-56.554-45.846-102.4-102.4-102.4z"/></svg></defs></svg>',
			'description' => 'Icon 3',
		),

		'twrp-i-user-4' => array(
			'svg'         => '<svg><defs><svg id="twrp-i-user-4" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="m256 0c-74.439 0-135 60.561-135 135s60.561 135 135 135 135-60.561 135-135-60.561-135-135-135zm0 240c-57.897 0-105-47.103-105-105s47.103-105 105-105 105 47.103 105 105-47.103 105-105 105z"/><path d="M297.833,301h-83.667C144.964,301,76.669,332.951,31,401.458V512h450V401.458C435.397,333.05,367.121,301,297.833,301z M451.001,482H451H61v-71.363C96.031,360.683,152.952,331,214.167,331h83.667c61.215,0,118.135,29.683,153.167,79.637V482z"/></svg></defs></svg>',
			'description' => 'Icon 4',
		),

		'twrp-i-user-5' => array(
			'svg'         => '<svg><defs><svg id="twrp-i-user-5" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="m256 0c-74.443 0-135 60.557-135 135s60.557 135 135 135 135-60.557 135-135-60.557-135-135-135z"/><path d="m478.48 398.68c-40.356-60.542-107.9-96.68-180.64-96.68h-83.672c-72.744 0-140.29 36.138-180.64 96.68l-2.52 3.779v109.54h450v-109.54l-2.52-3.779z"/></svg></defs></svg>',
			'description' => 'Icon 5',
		),
	);

	/**
	 * @var array<string,array>
	 */
	public static $registered_categories_vectors = array(
		'twrp-cat-tag-1' => array(
			'svg'         => '<svg><defs><svg viewBox="0 0 477.88 477.88"xmlns="http://www.w3.org/2000/svg"><path d="m460.81 0h-187.73c-4.526 1e-3 -8.866 1.8-12.066 5.001l-256 256c-6.669 6.661-6.675 17.467-0.013 24.136l187.75 187.75c6.665 6.662 17.468 6.662 24.132 0l256-256c3.205-3.204 5.004-7.551 5.001-12.083v-187.73c0-9.426-7.641-17.067-17.067-17.067zm-102.4 153.6c-18.851 0-34.133-15.282-34.133-34.133s15.282-34.133 34.133-34.133 34.133 15.282 34.133 34.133-15.282 34.133-34.133 34.133z"/></svg></defs></svg>',
			'description' => 'Category 1',
		),

		'twrp-cat-tag-2' => array(
			'svg'         => '<svg><defs><svg viewBox="0 0 477.86 477.86" xmlns="http://www.w3.org/2000/svg"><path d="m460.8 0h-187.73c-4.526 1e-3 -8.866 1.8-12.066 5.001l-256 256c-6.663 6.665-6.663 17.468 0 24.132l187.73 187.73c6.665 6.662 17.468 6.662 24.132 0l256-256c3.201-3.2 5-7.54 5.001-12.066v-187.73c0-9.426-7.641-17.067-17.067-17.067zm-17.066 197.73-238.93 238.93-163.6-163.6 238.93-238.93h163.6v163.6z"/><path d="m358.4 68.267c-28.277 0-51.2 22.923-51.2 51.2s22.923 51.2 51.2 51.2 51.2-22.923 51.2-51.2-22.923-51.2-51.2-51.2zm0 68.266c-9.426 0-17.067-7.641-17.067-17.067s7.641-17.067 17.067-17.067 17.067 7.641 17.067 17.067-7.641 17.067-17.067 17.067z"/></svg></defs></svg>',
			'description' => 'Category 2',
		),
	);

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
	 * Echo all the svg defs.
	 *
	 * @return void
	 */
	public static function include_all_svg() {
		$svg = self::get_all_vector_defs();
		echo $svg; // phpcs:ignore -- No XSS;
	}

	/**
	 * Get a HTML string that will define all vectors.
	 *
	 * @return string
	 */
	public static function get_all_vector_defs() {
		$output = '';

		foreach ( self::$registered_author_vectors as $svg ) {
			$output .= $svg['svg'];
		}

		return $output;
	}

	/**
	 * Get the HTML definition of a svg item.
	 *
	 * @param string $name
	 * @return string
	 */
	public static function get_svg_def( $name ) {
		if ( isset( self::$registered_author_vectors[ $name ] ) ) {
			return self::$registered_author_vectors[ $name ]['svg']; // phpcs:ignore -- No XSS.
		}

		return '';
	}

	#region -- Author Vectors

	/**
	 * Get the array with all authors vectors registered.
	 *
	 * @return array<string,array>
	 */
	public static function get_all_authors_vectors() {
		return self::$registered_author_vectors;
	}

	#endregion -- Author Vectors

	#region -- Category Vectors

	/**
	 * Get the array with all category vectors registered.
	 *
	 * @return array<string,array>
	 */
	public static function get_all_category_vectors() {
		return self::$registered_categories_vectors;
	}

	#endregion -- Category Vectors

}
