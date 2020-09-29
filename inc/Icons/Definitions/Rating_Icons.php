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
				'file_name'   => 'star-filled.svg',
			),

			'twrp-rat-fa-hf' => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'Star', 'backend', 'twrp' ),
				'type'        => _x( 'Half Filled', 'backend', 'twrp' ),
				'file_name'   => 'star-half-filled.svg',
			),

			'twrp-rat-fa-ol' => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'Star', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'star-outlined.svg',
			),

			#endregion -- FontAwesome Icons

			#region -- Dashicons Icons

			'twrp-rat-di-f'  => array(
				'brand'       => 'Dashicons',
				'description' => _x( 'Star', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'star-filled.svg',
			),

			'twrp-rat-di-hf' => array(
				'brand'       => 'Dashicons',
				'description' => _x( 'Star', 'backend', 'twrp' ),
				'type'        => _x( 'Half Filled', 'backend', 'twrp' ),
				'file_name'   => 'star-half-filled.svg',
			),

			'twrp-rat-di-ol' => array(
				'brand'       => 'Dashicons',
				'description' => _x( 'Star', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
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
