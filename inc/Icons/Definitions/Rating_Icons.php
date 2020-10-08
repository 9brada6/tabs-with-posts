<?php
/**
 * File that contains the class with the same name.
 */

namespace TWRP\Icons;

/**
 * Class that holds all rating icon definitions.
 *
 * Keywords to search: star, stars, heart.
 */
class Rating_Icons {

	/**
	 * Get all registered icons that represents the rating.
	 *
	 * @return array<string,array>
	 */
	public static function get_rating_icons() {
		$registered_rating_vectors = array(

			#region -- TWRP Icons

			'twrp-rat-twrp-h-f'   => array(
				'brand'       => 'TWRP',
				'description' => _x( 'Heart', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'heart-filled.svg',
			),

			'twrp-rat-twrp-h-hf'  => array(
				'brand'       => 'TWRP',
				'description' => _x( 'Heart', 'backend', 'twrp' ),
				'type'        => _x( 'Half Filled', 'backend', 'twrp' ),
				'file_name'   => 'heart-half-filled.svg',
			),

			'twrp-rat-twrp-ht-hf' => array(
				'brand'       => 'TWRP',
				'description' => _x( 'Heart Thin', 'backend', 'twrp' ),
				'type'        => _x( 'Half Filled', 'backend', 'twrp' ),
				'file_name'   => 'heart-thin-half-filled.svg',
			),

			'twrp-rat-twrp-h-ol'  => array(
				'brand'       => 'TWRP',
				'description' => _x( 'Heart', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'heart-outlined.svg',
			),

			'twrp-rat-twrp-ht-t'  => array(
				'brand'       => 'TWRP',
				'description' => _x( 'Heart Thin', 'backend', 'twrp' ),
				'type'        => _x( 'Thin', 'backend', 'twrp' ),
				'file_name'   => 'heart-thin.svg',
			),

			#endregion -- TWRP Icons

			#region -- FontAwesome Icons

			'twrp-rat-fa-f'       => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'Star', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'star-filled.svg',
			),

			'twrp-rat-fa-hf'      => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'Star', 'backend', 'twrp' ),
				'type'        => _x( 'Half Filled', 'backend', 'twrp' ),
				'file_name'   => 'star-half-filled.svg',
			),

			'twrp-rat-fa-ol'      => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'Star', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'star-outlined.svg',
			),

			#endregion -- FontAwesome Icons

			#region -- Google Icons

			'twrp-rat-goo-f'      => array(
				'brand'       => 'Google',
				'description' => _x( 'Star', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'star-filled.svg',
			),

			'twrp-rat-goo-hf'     => array(
				'brand'       => 'Google',
				'description' => _x( 'Star', 'backend', 'twrp' ),
				'type'        => _x( 'Half Filled', 'backend', 'twrp' ),
				'file_name'   => 'star-half-filled.svg',
			),

			'twrp-rat-goo-ol'     => array(
				'brand'       => 'Google',
				'description' => _x( 'Star', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'star-outlined.svg',
			),

			'twrp-rat-goo-sh-f'   => array(
				'brand'       => 'Google',
				'description' => _x( 'Star Sharp', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'star-sharp-filled.svg',
			),

			'twrp-rat-goo-sh-hf'  => array(
				'brand'       => 'Google',
				'description' => _x( 'Star Sharp', 'backend', 'twrp' ),
				'type'        => _x( 'Half Filled', 'backend', 'twrp' ),
				'file_name'   => 'star-sharp-half-filled.svg',
			),

			'twrp-rat-goo-sh-ol'  => array(
				'brand'       => 'Google',
				'description' => _x( 'Star Sharp', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'star-sharp-outlined.svg',
			),

			#endregion -- Google Icons

			#region -- Dashicons Icons

			'twrp-rat-di-f'       => array(
				'brand'       => 'Dashicons',
				'description' => _x( 'Star', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'star-filled.svg',
			),

			'twrp-rat-di-hf'      => array(
				'brand'       => 'Dashicons',
				'description' => _x( 'Star', 'backend', 'twrp' ),
				'type'        => _x( 'Half Filled', 'backend', 'twrp' ),
				'file_name'   => 'star-half-filled.svg',
			),

			'twrp-rat-di-ol'      => array(
				'brand'       => 'Dashicons',
				'description' => _x( 'Star', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'star-outlined.svg',
			),

			#endregion -- Dashicons Icons

			#region -- Foundation Icons

			// No icons...

			#endregion -- Foundation Icons

			#region -- Ionicons Icons

			'twrp-rat-ii-f'       => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Star', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'star-filled.svg',
			),

			'twrp-rat-ii-hf'      => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Star', 'backend', 'twrp' ),
				'type'        => _x( 'Half Filled', 'backend', 'twrp' ),
				'file_name'   => 'star-half-filled.svg',
			),

			'twrp-rat-ii-ol'      => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Star', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'star-outlined.svg',
			),

			'twrp-rat-ii-is-f'    => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Ios Star', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'ios-star-filled.svg',
			),

			'twrp-rat-ii-is-hf'   => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Ios Star', 'backend', 'twrp' ),
				'type'        => _x( 'Half Filled', 'backend', 'twrp' ),
				'file_name'   => 'ios-star-half-filled.svg',
			),

			'twrp-rat-ii-is-ol'   => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Ios Star', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'ios-star-outlined.svg',
			),

			#endregion -- Ionicons Icons

			#region -- IconMonstr Icons

			'twrp-rat-im-f'       => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Star', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'star-filled.svg',
			),

			'twrp-rat-im-hf'      => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Star', 'backend', 'twrp' ),
				'type'        => _x( 'Half Filled', 'backend', 'twrp' ),
				'file_name'   => 'star-half-filled.svg',
			),

			'twrp-rat-im-ol'      => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Star', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'star-outlined.svg',
			),

			#endregion -- IconMonstr Icons

			#region -- Capicon Icons

			// No Icons...

			#endregion -- Capicon Icons

			#region -- Feather Icons

			// No Icons...

			#endregion -- Feather Icons

			#region -- Jam Icons

			// Duplicate icons...

			#endregion -- Jam Icons

			#region -- Linea Icons

			// No Icons...

			#endregion -- Linea Icons

			#region -- Octicons Icons

			// No Icons...

			#endregion -- Octicons Icons

			#region -- Typicons Icons

			'twrp-rat-ti-f'       => array(
				'brand'       => 'Typicons',
				'description' => _x( 'Stars', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'star-filled.svg',
			),

			'twrp-rat-ti-hf'      => array(
				'brand'       => 'Typicons',
				'description' => _x( 'Stars', 'backend', 'twrp' ),
				'type'        => _x( 'Half Filled', 'backend', 'twrp' ),
				'file_name'   => 'star-half-filled.svg',
			),

			'twrp-rat-ti-ol'      => array(
				'brand'       => 'Typicons',
				'description' => _x( 'Stars', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'star-outlined.svg',
			),

			'twrp-rat-ti-h-f'     => array(
				'brand'       => 'Typicons',
				'description' => _x( 'Heart', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'heart-filled.svg',
			),

			'twrp-rat-ti-h-hf'    => array(
				'brand'       => 'Typicons',
				'description' => _x( 'Heart', 'backend', 'twrp' ),
				'type'        => _x( 'Half Filled', 'backend', 'twrp' ),
				'file_name'   => 'heart-half-filled.svg',
			),

			'twrp-rat-ti-h-ol'    => array(
				'brand'       => 'Typicons',
				'description' => _x( 'Heart', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'heart-outlined.svg',
			),

			#endregion -- Typicons Icons

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

			'twrp-hearts'      => array(
				'brand'       => 'TWRP',
				'description' => _x( 'Hearts', 'backend', 'twrp' ),
				'full'        => 'twrp-rat-twrp-h-f',
				'half'        => 'twrp-rat-twrp-h-hf',
				'empty'       => 'twrp-rat-twrp-h-ol',
			),

			'twrp-hearts-thin' => array(
				'brand'       => 'TWRP',
				'description' => _x( 'Hearts Thin', 'backend', 'twrp' ),
				'full'        => 'twrp-rat-twrp-h-f',
				'half'        => 'twrp-rat-twrp-ht-hf',
				'empty'       => 'twrp-rat-twrp-ht-t',
			),

			'fa-stars'         => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'Stars', 'backend', 'twrp' ),
				'full'        => 'twrp-rat-fa-f',
				'half'        => 'twrp-rat-fa-hf',
				'empty'       => 'twrp-rat-fa-ol',
			),

			'goo-stars'        => array(
				'brand'       => 'Google',
				'description' => _x( 'Stars', 'backend', 'twrp' ),
				'full'        => 'twrp-rat-goo-f',
				'half'        => 'twrp-rat-goo-hf',
				'empty'       => 'twrp-rat-goo-ol',
			),

			'goo-stars-sharp'  => array(
				'brand'       => 'Google',
				'description' => _x( 'Stars Sharp', 'backend', 'twrp' ),
				'full'        => 'twrp-rat-goo-sh-f',
				'half'        => 'twrp-rat-goo-sh-hf',
				'empty'       => 'twrp-rat-goo-sh-ol',
			),

			'di-stars'         => array(
				'brand'       => 'Dashicons',
				'description' => _x( 'Stars', 'backend', 'twrp' ),
				'full'        => 'twrp-rat-di-f',
				'half'        => 'twrp-rat-di-hf',
				'empty'       => 'twrp-rat-di-ol',
			),

			'ii-stars'         => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Stars', 'backend', 'twrp' ),
				'full'        => 'twrp-rat-ii-f',
				'half'        => 'twrp-rat-ii-hf',
				'empty'       => 'twrp-rat-ii-ol',
			),

			'ii-stars-ios'     => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Ios Stars', 'backend', 'twrp' ),
				'full'        => 'twrp-rat-ii-is-f',
				'half'        => 'twrp-rat-ii-is-hf',
				'empty'       => 'twrp-rat-ii-is-ol',
			),

			'im-stars'         => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Stars', 'backend', 'twrp' ),
				'full'        => 'twrp-rat-im-f',
				'half'        => 'twrp-rat-im-hf',
				'empty'       => 'twrp-rat-im-ol',
			),

			'ti-stars'         => array(
				'brand'       => 'Typicons',
				'description' => _x( 'Stars', 'backend', 'twrp' ),
				'full'        => 'twrp-rat-ti-f',
				'half'        => 'twrp-rat-ti-hf',
				'empty'       => 'twrp-rat-ti-ol',
			),

			'ti-hearts'        => array(
				'brand'       => 'Typicons',
				'description' => _x( 'Hearts', 'backend', 'twrp' ),
				'full'        => 'twrp-rat-ti-h-f',
				'half'        => 'twrp-rat-ti-h-hf',
				'empty'       => 'twrp-rat-ti-h-ol',
			),

		);
	}

}
