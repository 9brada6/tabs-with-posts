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

			#region -- TWRP Icons

			'twrp-dcom-twrp-c-f'    => array(
				'brand'       => 'TWRP',
				'description' => _x( 'Comment Disabled', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'comment-filled.svg',
			),

			'twrp-dcom-twrp-c-ol'   => array(
				'brand'       => 'TWRP',
				'description' => _x( 'Comment Disabled', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'comment-outlined.svg',
			),

			'twrp-dcom-twrp-c-dt'   => array(
				'brand'       => 'TWRP',
				'description' => _x( 'Comment Disabled', 'backend', 'twrp' ),
				'type'        => _x( 'DuoTone', 'backend', 'twrp' ),
				'file_name'   => 'comment-duotone.svg',
			),

			'twrp-dcom-twrp-c-sh'   => array(
				'brand'       => 'TWRP',
				'description' => _x( 'Comment Disabled', 'backend', 'twrp' ),
				'type'        => _x( 'Sharp', 'backend', 'twrp' ),
				'file_name'   => 'comment-sharp.svg',
			),

			'twrp-dcom-twrp-c-t'    => array(
				'brand'       => 'TWRP',
				'description' => _x( 'Comment Disabled', 'backend', 'twrp' ),
				'type'        => _x( 'Thin', 'backend', 'twrp' ),
				'file_name'   => 'comment-thin.svg',
			),

			'twrp-dcom-twrp-c2-f'   => array(
				'brand'       => 'TWRP',
				'description' => _x( 'Comment Alt Disabled', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'comment-alt-filled.svg',
			),

			'twrp-dcom-twrp-c2-ol'  => array(
				'brand'       => 'TWRP',
				'description' => _x( 'Comment Alt Disabled', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'comment-alt-outlined.svg',
			),

			'twrp-dcom-twrp-c2-dt'  => array(
				'brand'       => 'TWRP',
				'description' => _x( 'Comment Alt Disabled', 'backend', 'twrp' ),
				'type'        => _x( 'DuoTone', 'backend', 'twrp' ),
				'file_name'   => 'comment-alt-duotone.svg',
			),

			'twrp-dcom-twrp-c2-t'   => array(
				'brand'       => 'TWRP',
				'description' => _x( 'Comment Alt Disabled', 'backend', 'twrp' ),
				'type'        => _x( 'Thin', 'backend', 'twrp' ),
				'file_name'   => 'comment-alt-thin.svg',
			),

			'twrp-dcom-twrp-cs-f'   => array(
				'brand'       => 'TWRP',
				'description' => _x( 'Comments Disabled', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'comments-filled.svg',
			),

			'twrp-dcom-twrp-cs-ol'  => array(
				'brand'       => 'TWRP',
				'description' => _x( 'Comments Disabled', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'comments-outlined.svg',
			),

			'twrp-dcom-twrp-cs-dt'  => array(
				'brand'       => 'TWRP',
				'description' => _x( 'Comments Disabled', 'backend', 'twrp' ),
				'type'        => _x( 'DuoTone', 'backend', 'twrp' ),
				'file_name'   => 'comments-duotone.svg',
			),

			'twrp-dcom-twrp-cs-sh'  => array(
				'brand'       => 'TWRP',
				'description' => _x( 'Comments Disabled', 'backend', 'twrp' ),
				'type'        => _x( 'Sharp', 'backend', 'twrp' ),
				'file_name'   => 'comments-sharp.svg',
			),

			'twrp-dcom-twrp-cs-t'   => array(
				'brand'       => 'TWRP',
				'description' => _x( 'Comments Disabled', 'backend', 'twrp' ),
				'type'        => _x( 'Thin', 'backend', 'twrp' ),
				'file_name'   => 'comments-thin.svg',
			),

			'twrp-dcom-twrp-cs2-f'  => array(
				'brand'       => 'TWRP',
				'description' => _x( 'Comments Alt Disabled', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'comments-alt-filled.svg',
			),

			'twrp-dcom-twrp-cs2-ol' => array(
				'brand'       => 'TWRP',
				'description' => _x( 'Comments Alt Disabled', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'comments-alt-outlined.svg',
			),

			'twrp-dcom-twrp-cs2-dt' => array(
				'brand'       => 'TWRP',
				'description' => _x( 'Comments Alt Disabled', 'backend', 'twrp' ),
				'type'        => _x( 'DuoTone', 'backend', 'twrp' ),
				'file_name'   => 'comments-alt-duotone.svg',
			),

			'twrp-dcom-twrp-cs2-t'  => array(
				'brand'       => 'TWRP',
				'description' => _x( 'Comments Alt Disabled', 'backend', 'twrp' ),
				'type'        => _x( 'Thin', 'backend', 'twrp' ),
				'file_name'   => 'comments-alt-thin.svg',
			),

			#endregion -- TWRP Icons

			#region -- FontAwesome Icons

			'twrp-dcom-fa-f'        => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'Comment Disabled', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'filled.svg',
			),

			#endregion -- FontAwesome Icons

			#region -- Google Icons

			// No icons...

			#endregion -- Google Icons

			#region -- Dashicons

			'twrp-dcom-di-f'        => array(
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

			'twrp-dcom-im-f'        => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Comment Disabled', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'filled.svg',
			),

			'twrp-dcom-im-ol'       => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Comment Disabled', 'backend', 'twrp' ),
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

			'twrp-dcom-li-ol'       => array(
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
