<?php
/**
 * File that contains the class with the same name.
 */

namespace TWRP\Icons;

/**
 * Class that holds all rating icon definitions.
 */
class Rating_Icons {

	/**
	 * Get all registered icons that represents the rating.
	 *
	 * @return array<string,array>
	 */
	public static function get_rating_icons() {
		$registered_rating_vectors = array(

			#region -- FontAwesome Icons

			'twrp-rat-fa-f'  => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'Star', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-rat-fa-f" viewBox="0 0 576 512"><path d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg>',
				'file_name'   => 'star-filled.svg',
			),

			'twrp-rat-fa-hf' => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'Star', 'backend', 'twrp' ),
				'type'        => _x( 'Half Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-rat-fa-hf" viewBox="0 0 536 512"><path d="M508.55 171.51L362.18 150.2 296.77 17.81C290.89 5.98 279.42 0 267.95 0c-11.4 0-22.79 5.9-28.69 17.81l-65.43 132.38-146.38 21.29c-26.25 3.8-36.77 36.09-17.74 54.59l105.89 103-25.06 145.48C86.98 495.33 103.57 512 122.15 512c4.93 0 10-1.17 14.87-3.75l130.95-68.68 130.94 68.7c4.86 2.55 9.92 3.71 14.83 3.71 18.6 0 35.22-16.61 31.66-37.4l-25.03-145.49 105.91-102.98c19.04-18.5 8.52-50.8-17.73-54.6zm-121.74 123.2l-18.12 17.62 4.28 24.88 19.52 113.45-102.13-53.59-22.38-11.74.03-317.19 51.03 103.29 11.18 22.63 25.01 3.64 114.23 16.63-82.65 80.38z"></path></svg>',
				'file_name'   => 'star-half-filled.svg',
			),

			'twrp-rat-fa-ol' => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'Star', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-rat-fa-ol" viewBox="0 0 576 512"><path d="M528.1 171.5L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6zM388.6 312.3l23.7 138.4L288 385.4l-124.3 65.3 23.7-138.4-100.6-98 139-20.2 62.2-126 62.2 126 139 20.2-100.6 98z"></path></svg>',
				'file_name'   => 'star-outlined.svg',
			),

			#endregion -- FontAwesome Icons

			#region -- Dashicons Icons

			'twrp-rat-di-f'  => array(
				'brand'       => 'Dashicons',
				'description' => _x( 'Star', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-rat-di-f" viewBox="0 0 20 20"><path d="M10,0l3.3,6.7L20,7.5l-4.6,5.1l1.2,7.4L10,16.7L3.3,20l1.3-7.4L0,7.5l6.7-0.8L10,0z"/></svg>',
				'file_name'   => 'star-filled.svg',
			),

			'twrp-rat-di-hf' => array(
				'brand'       => 'Dashicons',
				'description' => _x( 'Star', 'backend', 'twrp' ),
				'type'        => _x( 'Half Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-rat-di-hf" viewBox="0 0 20 20"><path d="M10,0L6.7,6.7L0,7.5l4.6,5.1L3.3,20l6.7-3.3l6.7,3.3l-1.2-7.4L20,7.5l-6.7-0.8L10,0z M10,2.5l2.6,5.2l5.2,0.6l-3.5,4l1,5.7L10,15.4V2.5z"/></svg>',
				'file_name'   => 'star-half-filled.svg',
			),

			'twrp-rat-di-ol' => array(
				'brand'       => 'Dashicons',
				'description' => _x( 'Star', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-rat-di-ol" viewBox="0 0 20 20"><path d="M10,0L6.7,6.7L0,7.5l4.6,5.1L3.3,20l6.7-3.3l6.7,3.3l-1.2-7.4L20,7.5l-6.7-0.8L10,0z M10,2.5l2.6,5.2l5.2,0.6l-3.5,4l1,5.7L10,15.4L4.8,18l1-5.7l-3.5-4l5.2-0.6L10,2.5z"/></svg>',
				'file_name'   => 'star-outlined.svg',
			),

			#endregion -- Dashicons Icons

		);

		return $registered_rating_vectors;
	}

	/**
	 * Get all rating icons packs.
	 *
	 * @return array<string,array>
	 */
	public static function get_rating_packs() {
		return array(
			'fa-stars' => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'Stars', 'backend', 'twrp' ),
				'full'        => 'twrp-rat-fa-f',
				'half'        => 'twrp-rat-fa-hf',
				'empty'       => 'twrp-rat-fa-ol',
			),
		);
	}

}
