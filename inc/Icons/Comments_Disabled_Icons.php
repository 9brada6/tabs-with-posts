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
				'svg'         => '<svg id="twrp-dcom-fa-f" viewBox="0 0 640 512"><path d="M64 240c0 49.6 21.4 95 57 130.7-12.6 50.3-54.3 95.2-54.8 95.8-2.2 2.3-2.8 5.7-1.5 8.7 1.3 2.9 4.1 4.8 7.3 4.8 66.3 0 116-31.8 140.6-51.4 32.7 12.3 69 19.4 107.4 19.4 27.4 0 53.7-3.6 78.4-10L72.9 186.4c-5.6 17.1-8.9 35-8.9 53.6zm569.8 218.1l-114.4-88.4C554.6 334.1 576 289.2 576 240c0-114.9-114.6-208-256-208-65.1 0-124.2 20.1-169.4 52.7L45.5 3.4C38.5-2 28.5-.8 23 6.2L3.4 31.4c-5.4 7-4.2 17 2.8 22.4l588.4 454.7c7 5.4 17 4.2 22.5-2.8l19.6-25.3c5.4-6.8 4.1-16.9-2.9-22.3z"></path></svg>',
				'file_name'   => 'filled.svg',
			),

			#endregion -- FontAwesome Icons

			#region -- Google Icons

			// No icons...

			#endregion -- Google Icons

			#region -- Dashicons

			#endregion -- Dashicons

			'twrp-dcom-di-f'  => array(
				'brand'       => 'Dashicons',
				'description' => _x( 'Comment Disabled', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-dcom-di-f" viewBox="0 0 20 20"><path d="M3.9,0h12.2c1.3,0,2.4,1.1,2.4,2.4v9.4c0,1.3-1.1,2.4-2.4,2.4h-2.6l-6,5.9v-5.9H3.9c-1.3,0-2.4-1.1-2.4-2.4V2.4C1.5,1.1,2.6,0,3.9,0z M13.8,10.1l-3-3l3-3L12.5,3l-3,3l-3-3L5.3,4.2l3,3l-3,3l1.2,1.2l3-3l3,3L13.8,10.1z"/></svg>',
				'file_name'   => 'filled.svg',
			),

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
				'svg'         => '<svg id="twrp-dcom-im-f" fill-rule="evenodd" clip-rule="evenodd"><path d="M3.439 3l-1.439-1.714 1.532-1.286 17.382 20.714-1.533 1.286-2.533-3.019h-5.848l-7 5.02v-5.02h-4v-15.981h3.439zm20.561 15.981h-2.588l-13.41-15.981h15.998v15.981z"/></svg>',
				'file_name'   => 'filled.svg',
			),

			'twrp-dcom-im-ol' => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Comments Disabled', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-dcom-im-ol" fill-rule="evenodd" clip-rule="evenodd"><path d="M3.439 3l-1.439-1.714 1.532-1.286 17.382 20.714-1.533 1.286-2.533-3.019h-5.848l-7 5.02v-5.02h-4v-15.981h3.439zm11.747 14l-10.068-11.999h-3.118v11.999h4v3.105l4.357-3.105h4.829zm8.814 1.981h-2.588l-1.662-1.981h2.25v-11.999h-12.319l-1.679-2.001h15.998v15.981z"/></svg>',
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
				'svg'         => '<svg id="twrp-dcom-li-ol" viewBox="0 0 64 64"><polygon fill="none" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" points="32,47 63,47 63,5 1,5 1,47 18,47 18,59 "/><line fill="none" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" x1="39" y1="33" x2="25" y2="19"/><line fill="none" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" x1="25" y1="33" x2="39" y2="19"/></svg>',
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
