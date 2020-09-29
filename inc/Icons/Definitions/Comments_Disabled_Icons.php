<?php
/**
 * File that contains the class with the same name.
 */

namespace TWRP\Icons;

/**
 * Class that holds all comments disabled icon definitions.
 */
class Comments_Disabled_Icons {

	/**
	 * Get all registered icons that represents the disabled comments.
	 *
	 * @return array<string,array>
	 */
	public static function get_disabled_comment_icons() {
		$registered_disabled_comments_vectors = array(

			#region -- FontAwesome Icons

			'twrp-dcom-fa-f'  => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'Comments Disabled', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'filled.svg',
			),

			#endregion -- FontAwesome Icons

			#region -- Google Icons

			// No icons...

			#endregion -- Google Icons

			#region -- Dashicons

			'twrp-dcom-di-f'  => array(
				'brand'       => 'Dashicons',
				'description' => _x( 'Comment Disabled', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'filled.svg',
			),

			#endregion -- Dashicons

			#region -- Foundation Icons

			// No icons...

			#endregion -- Foundation Icons

			#region -- Ionicons Icons

			// No Icons...

			#endregion -- Ionicons Icons

			#region -- IconMonstr Icons

			'twrp-dcom-im-f'  => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Comments Disabled', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'filled.svg',
			),

			'twrp-dcom-im-ol' => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Comments Disabled', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'outlined.svg',
			),

			#endregion -- IconMonstr Icons

			#region -- Capicon Icons

			// No Icons...

			#endregion -- Capicon Icons

			#region -- Feather Icons

			// No Icons...

			#endregion -- Feather Icons

			#region -- Jam Icons

			// No Icons...

			#endregion -- Jam Icons

			#region -- Linea Icons

			'twrp-dcom-li-ol' => array(
				'brand'       => 'Linea',
				'description' => _x( 'Comment Disabled', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'outlined.svg',
			),

			#endregion -- Linea Icons

			#region -- Octicons Icons

			// No Icons...

			#endregion -- Octicons Icons

			#region -- Typicons Icons

			// No Icons...

			#endregion -- Typicons Icons
		);

		return $registered_disabled_comments_vectors;
	}

}
