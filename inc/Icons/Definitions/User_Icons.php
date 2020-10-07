<?php
/**
 * File that contains the class with the same name.
 */

namespace TWRP\Icons;

/**
 * Class that holds all user icon definitions.
 *
 * Keywords: user, person, man, woman, people.
 */
class User_Icons {

	/**
	 * Get all registered icons that represents the user.
	 *
	 * @return array<string,array>
	 */
	public static function get_user_icons() {

		$registered_user_vectors = array(

			#region -- TWRP Icons

			// No Icons...

			#endregion -- TWRP Icons

			#region -- FontAwesome Icons

			'twrp-user-fa-f'             => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'User', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'filled.svg',
			),

			'twrp-user-fa-ol'            => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'User', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'outlined.svg',
			),

			'twrp-user-fa-alt-f'         => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'User 2', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'alt-filled.svg',
			),

			'twrp-user-fa-tie-f'         => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'Tie', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'tie-filled.svg',
			),

			'twrp-user-fa-g-f'           => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'Graduate', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'graduate-filled.svg',
			),

			'twrp-user-fa-c-f'           => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'Circle', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'circle-filled.svg',
			),

			'twrp-user-fa-c-ol'          => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'Circle', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'circle-outlined.svg',
			),

			#endregion -- FontAwesome Icons

			#region -- Google Icons

			#region -- Normal User Icon

			'twrp-user-goo-f'            => array(
				'brand'       => 'Google',
				'description' => _x( 'User', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'filled.svg',
			),

			'twrp-user-goo-ol'           => array(
				'brand'       => 'Google',
				'description' => _x( 'User', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'outlined.svg',
			),

			'twrp-user-goo-dt'           => array(
				'brand'       => 'Google',
				'description' => _x( 'User', 'backend', 'twrp' ),
				'type'        => _x( 'DuoTone', 'backend', 'twrp' ),
				'file_name'   => 'duotone.svg',
			),

			#endregion -- Normal User Icon

			#region -- Circle User Icon

			'twrp-user-goo-circle-f'     => array(
				'brand'       => 'Google',
				'description' => _x( 'Circle', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'circle-filled.svg',
				'fix_classes' => 'twrp-i--va-2',
			),

			'twrp-user-goo-circle-ol'    => array(
				'brand'       => 'Google',
				'description' => _x( 'Circle', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'circle-outlined.svg',
				'fix_classes' => 'twrp-i--va-2',
			),

			'twrp-user-goo-circle-dt'    => array(
				'brand'       => 'Google',
				'description' => _x( 'Circle', 'backend', 'twrp' ),
				'type'        => _x( 'DuoTone', 'backend', 'twrp' ),
				'file_name'   => 'circle-duotone.svg',
				'fix_classes' => 'twrp-i--va-2',
			),

			#endregion -- Circle User Icon

			#region -- Box User Icon

			'twrp-user-goo-box-f'        => array(
				'brand'       => 'Google',
				'description' => _x( 'Box', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'box-filled.svg',
			),

			'twrp-user-goo-box-ol'       => array(
				'brand'       => 'Google',
				'description' => _x( 'Box', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'box-outlined.svg',
			),

			'twrp-user-goo-box-dt'       => array(
				'brand'       => 'Google',
				'description' => _x( 'Box', 'backend', 'twrp' ),
				'type'        => _x( 'DuoTone', 'backend', 'twrp' ),
				'file_name'   => 'box-duotone.svg',
			),

			'twrp-user-goo-box-sh'       => array(
				'brand'       => 'Google',
				'description' => _x( 'Box', 'backend', 'twrp' ),
				'type'        => _x( 'Sharp', 'backend', 'twrp' ),
				'file_name'   => 'box-sharp.svg',
			),

			#endregion -- Box User Icon

			#endregion -- Google Icons

			#region -- Dashicons icons

			'twrp-user-di-f'             => array(
				'brand'       => 'Dashicons',
				'description' => _x( 'User', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'filled.svg',
			),

			'twrp-user-di-p-f'           => array(
				'brand'       => 'Dashicons',
				'description' => _x( 'Person', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'person-filled.svg',
			),

			'twrp-user-di-m-f'           => array(
				'brand'       => 'Dashicons',
				'description' => _x( 'Male', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'man-filled.svg',
			),

			'twrp-user-di-f-f'           => array(
				'brand'       => 'Dashicons',
				'description' => _x( 'Female', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'woman-filled.svg',
			),

			#endregion -- Dashicons icons

			#region -- Foundation Icons

			'twrp-user-fi-male-f'        => array(
				'brand'       => 'Foundation',
				'description' => _x( 'Male', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'male-filled.svg',
			),

			'twrp-user-fi-female-f'      => array(
				'brand'       => 'Foundation',
				'description' => _x( 'Female', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'female-filled.svg',
			),

			'twrp-user-fi-tie-f'         => array(
				'brand'       => 'Foundation',
				'description' => _x( 'Tie', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'tie-filled.svg',
			),

			#endregion -- Foundation Icons

			#region -- Ionicons Icons

			#region -- Ionicons Normal User Icons

			'twrp-user-ii-f'             => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'User', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'filled.svg',
			),

			'twrp-user-ii-ol'            => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'User', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'outlined.svg',
			),

			'twrp-user-ii-sh'            => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'User', 'backend', 'twrp' ),
				'type'        => _x( 'Sharp', 'backend', 'twrp' ),
				'file_name'   => 'sharp.svg',
			),

			#endregion -- Ionicons Normal User Icons

			#region -- Ionicons Person Icons

			'twrp-user-ii-person-f'      => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Person', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'person-filled.svg',
			),

			'twrp-user-ii-person-ol'     => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Person', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'person-outlined.svg',
			),

			#endregion -- Ionicons Person Icons

			#region -- Ionicons Person Circle Icons

			'twrp-user-ii-ios-person-f'  => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Ios Person', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'ios-contact-filled.svg',
			),

			'twrp-user-ii-ios-person-ol' => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Ios Person', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'ios-contact-outlined.svg',
			),

			#endregion -- Ionicons Person Circle Icons

			#endregion -- Ionicons Icons

			#region -- Iconmonstr Icons

			'twrp-user-im-f'             => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'User', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'filled.svg',
			),

			'twrp-user-im-ol'            => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'User', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'outlined.svg',
			),

			'twrp-user-im-tie-f'         => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Tie', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'tie-filled.svg',
			),

			'twrp-user-im-female-f'      => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Female', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'female-filled.svg',
			),

			'twrp-user-im-female-ol'     => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Female', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'female-outlined.svg',
			),

			'twrp-user-im-circle-f'      => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Circle', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'circle-filled.svg',
			),

			'twrp-user-im-circle-ol'     => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Circle', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'circle-outlined.svg',
			),

			#endregion -- Iconmonstr Icons

			#region -- Capicon Icons

			'twrp-user-ci-f'             => array(
				'brand'       => 'Capicon',
				'description' => _x( 'User', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'filled.svg',
			),

			'twrp-user-ci-alt-f'         => array(
				'brand'       => 'Capicon',
				'description' => _x( 'User 2', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'user2-filled.svg',
			),

			'twrp-user-ci-man-f'         => array(
				'brand'       => 'Capicon',
				'description' => _x( 'Man', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'man-filled.svg',
			),

			'twrp-user-ci-woman-f'       => array(
				'brand'       => 'Capicon',
				'description' => _x( 'Woman', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'woman-filled.svg',
			),

			#endregion -- Capicon Icons

			#region -- Feather Icons

			'twrp-user-fi-ol'            => array(
				'brand'       => 'Feather',
				'description' => _x( 'User', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'outlined.svg',
			),

			#endregion -- Feather Icons

			#region -- Jam Icons

			'twrp-user-ji-ol'            => array(
				'brand'       => 'JamIcons',
				'description' => _x( 'User', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'outlined.svg',
			),

			'twrp-user-ji-circle-ol'     => array(
				'brand'       => 'JamIcons',
				'description' => _x( 'Circle', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'circle-outlined.svg',
			),

			'twrp-user-ji-square-ol'     => array(
				'brand'       => 'JamIcons',
				'description' => _x( 'Square', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'square-outlined.svg',
			),

			#endregion -- Jam Icons

			#region -- Linea Icons

			// No icons...

			#endregion -- Linea Icons

			#region -- Octicons Icons

			'twrp-user-oi-ol'            => array(
				'brand'       => 'Octicons',
				'description' => _x( 'User', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'user-outlined.svg',
			),

			'twrp-user-oi-t'             => array(
				'brand'       => 'Octicons',
				'description' => _x( 'User', 'backend', 'twrp' ),
				'type'        => _x( 'Thin', 'backend', 'twrp' ),
				'file_name'   => 'user-thin.svg',
			),

			#endregion -- Octicons Icons

			#region -- Typicons Icons

			'twrp-user-ti-f'             => array(
				'brand'       => 'Typicons',
				'description' => _x( 'User', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'filled.svg',
			),

			'twrp-user-ti-ol'            => array(
				'brand'       => 'Typicons',
				'description' => _x( 'User', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'outlined.svg',
			),

			#endregion -- Typicons Icons

		);

		return $registered_user_vectors;
	}

}
