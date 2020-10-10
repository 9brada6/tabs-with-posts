<?php
/**
 * File that contains the class with the same name.
 */

namespace TWRP\Icons;

/**
 * Class that holds all views icon definitions.
 *
 * Keywords to search for icons: eye, chart, graph.
 */
class Views_Icons {

	/**
	 * Get all registered icons that represents the number of views.
	 *
	 * @return array<string,array>
	 */
	public static function get_views_icons() {

		$registered_views_vectors = array(

			#region -- TWRP Icons

			// No Icons...

			#endregion -- TWRP Icons

			#region -- FontAwesome Icons

			'twrp-views-fa-f'       => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'Eye', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'eye-filled.svg',
				'fix_classes' => 'twrp-i--va-15',
			),

			'twrp-views-fa-ol'      => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'Eye', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'eye-outlined.svg',
				'fix_classes' => 'twrp-i--va-15',
			),

			'twrp-views-fa-c-f'     => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'Chart', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'chart-filled.svg',
				'fix_classes' => 'twrp-i--va-15',
			),

			'twrp-views-fa-c-ol'    => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'Chart', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'chart-outlined.svg',
				'fix_classes' => 'twrp-i--va-15',
			),

			#endregion -- FontAwesome Icons

			#region -- Google Icons

			'twrp-views-goo-f'      => array(
				'brand'       => 'Google',
				'description' => _x( 'Eye', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'eye-filled.svg',
				'fix_classes' => 'twrp-i--va-15',
			),

			'twrp-views-goo-ol'     => array(
				'brand'       => 'Google',
				'description' => _x( 'Eye', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'eye-outlined.svg',
				'fix_classes' => 'twrp-i--va-15',
			),

			'twrp-views-goo-dt'     => array(
				'brand'       => 'Google',
				'description' => _x( 'Eye', 'backend', 'twrp' ),
				'type'        => _x( 'DuoTone', 'backend', 'twrp' ),
				'file_name'   => 'eye-duotone.svg',
				'fix_classes' => 'twrp-i--va-15',
			),

			'twrp-views-goo-line-f' => array(
				'brand'       => 'Google',
				'description' => _x( 'Chart', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'chart-filled.svg',
				'fix_classes' => 'twrp-i--va-15',
			),

			'twrp-views-goo-c-f'    => array(
				'brand'       => 'Google',
				'description' => _x( 'Bar Chart', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'bar-chart-filled.svg',
			),

			'twrp-views-goo-c2-f'   => array(
				'brand'       => 'Google',
				'description' => _x( 'Bar Chart', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'bar-chart-2-filled.svg',
			),

			#endregion -- Google Icons

			#region -- Dashicons

			'twrp-views-di-ol'      => array(
				'brand'       => 'Dashicons',
				'description' => _x( 'Eye', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'eye-outlined.svg',
				'fix_classes' => 'twrp-i--va-15',
			),

			'twrp-views-di-c-f'     => array(
				'brand'       => 'Dashicons',
				'description' => _x( 'Chart', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'chart-filled.svg',
			),

			#endregion -- Dashicons

			#region -- Foundation Icons

			'twrp-views-fi-f'       => array(
				'brand'       => 'Foundation',
				'description' => _x( 'Eye', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'eye-filled.svg',
				'fix_classes' => 'twrp-i--va-15',
			),

			'twrp-views-fi-c-f'     => array(
				'brand'       => 'Foundation',
				'description' => _x( 'Chart', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'chart-filled.svg',
			),

			#endregion -- Foundation Icons

			#region -- Ionicons Icons

			'twrp-views-ii-f'       => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Eye', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'eye-filled.svg',
				'fix_classes' => 'twrp-i--va-15',
			),

			'twrp-views-ii-ol'      => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Eye', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'eye-outlined.svg',
				'fix_classes' => 'twrp-i--va-15',
			),

			'twrp-views-ii-ios-f'   => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Ios Eye', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'ios-eye-filled.svg',
				'fix_classes' => 'twrp-i--va-15',
			),

			'twrp-views-ii-ios-ol'  => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Ios Eye', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'ios-eye-outlined.svg',
				'fix_classes' => 'twrp-i--va-15',
			),

			'twrp-views-ii-c-f'     => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Chart', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'chart-filled.svg',
			),

			'twrp-views-ii-c-ol'    => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Chart', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'chart-outlined.svg',
			),

			'twrp-views-ii-c-sh'    => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Chart', 'backend', 'twrp' ),
				'type'        => _x( 'Sharp', 'backend', 'twrp' ),
				'file_name'   => 'chart-sharp.svg',
			),

			#endregion -- Ionicons Icons

			#region -- IconMonstr Icons

			'twrp-views-im-f'       => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Eye', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'eye-filled.svg',
				'fix_classes' => 'twrp-i--va-15',
			),

			'twrp-views-im-ol'      => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Eye', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'eye-outlined.svg',
				'fix_classes' => 'twrp-i--va-15',
			),

			'twrp-views-im-t'       => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Eye', 'backend', 'twrp' ),
				'type'        => _x( 'Thin', 'backend', 'twrp' ),
				'file_name'   => 'eye-thin.svg',
				'fix_classes' => 'twrp-i--va-15',
			),

			'twrp-views-im-2-f'     => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Eye 2', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'eye2-filled.svg',
				'fix_classes' => 'twrp-i--va-15',
			),

			'twrp-views-im-2-ol'    => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Eye 2', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'eye2-outlined.svg',
				'fix_classes' => 'twrp-i--va-15',
			),

			'twrp-views-im-3-f'     => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Eye 3', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'eye3-filled.svg',
				'fix_classes' => 'twrp-i--va-15',
			),

			'twrp-views-im-3-ol'    => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Eye 3', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'eye3-outlined.svg',
				'fix_classes' => 'twrp-i--va-15',
			),

			'twrp-views-im-4-ol'    => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Eye 4', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'eye4-outlined.svg',
				'fix_classes' => 'twrp-i--va-15',
			),

			'twrp-views-im-c-f'     => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Chart', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'chart-filled.svg',
			),

			'twrp-views-im-c-ol'    => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Chart', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'chart-outlined.svg',
			),

			'twrp-views-im-c2-f'    => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Chart 2', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'chart2-filled.svg',
			),

			'twrp-views-im-c2-ol'   => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Chart 2', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'chart2-outlined.svg',
			),

			'twrp-views-im-c3-f'    => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Chart 3', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'chart3-filled.svg',
			),

			'twrp-views-im-c3-ol'   => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Chart 3', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'chart3-outlined.svg',
			),

			#endregion -- IconMonstr Icons

			#region -- Capicon Icons

			'twrp-views-ci-f'       => array(
				'brand'       => 'Capicon',
				'description' => _x( 'Eye', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'eye-filled.svg',
				'fix_classes' => 'twrp-i--va-15',
			),

			'twrp-views-ci-c2-f'    => array(
				'brand'       => 'Capicon',
				'description' => _x( 'Chart', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'chart2-filled.svg',
			),

			'twrp-views-ci-c-f'     => array(
				'brand'       => 'Capicon',
				'description' => _x( 'Chart 2', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'chart-filled.svg',
			),

			#endregion -- Capicon Icons

			#region -- Feather Icons

			'twrp-views-fe-ol'      => array(
				'brand'       => 'Feather',
				'description' => _x( 'Eye', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'eye-outlined.svg',
				'fix_classes' => 'twrp-i--va-15',
			),

			'twrp-views-fe-c-ol'    => array(
				'brand'       => 'Feather',
				'description' => _x( 'Chart', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'chart-outlined.svg',
			),

			'twrp-views-fe-c2-ol'   => array(
				'brand'       => 'Feather',
				'description' => _x( 'Chart 2', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'chart2-outlined.svg',
			),

			#endregion -- Feather Icons

			#region -- Jam Icons

			'twrp-views-ji-f'       => array(
				'brand'       => 'JamIcons',
				'description' => _x( 'Eye', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'eye-filled.svg',
				'fix_classes' => 'twrp-i--va-15',
			),

			'twrp-views-ji-ol'      => array(
				'brand'       => 'JamIcons',
				'description' => _x( 'Eye', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'eye-outlined.svg',
				'fix_classes' => 'twrp-i--va-15',
			),

			'twrp-views-ji-c-f'     => array(
				'brand'       => 'JamIcons',
				'description' => _x( 'Chart', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'chart-filled.svg',
			),

			#endregion -- Jam Icons

			#region -- Linea Icons

			'twrp-views-li-ol'      => array(
				'brand'       => 'Linea',
				'description' => _x( 'Eye', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'eye-outlined.svg',
				'fix_classes' => 'twrp-i--va-15',
			),

			'twrp-views-li-c-ol'    => array(
				'brand'       => 'Linea',
				'description' => _x( 'Eye', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'chart-outlined.svg',
			),

			#endregion -- Linea Icons

			#region -- Octicons Icons

			'twrp-views-oi-ol'      => array(
				'brand'       => 'Octicons',
				'description' => _x( 'Eye', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'eye-outlined.svg',
				'fix_classes' => 'twrp-i--va-15',
			),

			'twrp-views-oi-t'       => array(
				'brand'       => 'Octicons',
				'description' => _x( 'Eye', 'backend', 'twrp' ),
				'type'        => _x( 'Thin', 'backend', 'twrp' ),
				'file_name'   => 'eye-thin.svg',
				'fix_classes' => 'twrp-i--va-15',
			),

			'twrp-views-oi-c-ol'    => array(
				'brand'       => 'Octicons',
				'description' => _x( 'Chart', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'chart-outlined.svg',
			),

			'twrp-views-oi-c-t'     => array(
				'brand'       => 'Octicons',
				'description' => _x( 'Chart', 'backend', 'twrp' ),
				'type'        => _x( 'Thin', 'backend', 'twrp' ),
				'file_name'   => 'chart-thin.svg',
			),

			#endregion -- Octicons Icons

			#region -- Typicons Icons

			'twrp-views-ti-f'       => array(
				'brand'       => 'Typicons',
				'description' => _x( 'Eye', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'eye-filled.svg',
				'fix_classes' => 'twrp-i--va-15',
			),

			'twrp-views-ti-ol'      => array(
				'brand'       => 'Typicons',
				'description' => _x( 'Eye', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'eye-outlined.svg',
				'fix_classes' => 'twrp-i--va-15',
			),

			'twrp-views-ti-c-f'     => array(
				'brand'       => 'Typicons',
				'description' => _x( 'Chart', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'chart-filled.svg',
			),

			'twrp-views-ti-c-ol'    => array(
				'brand'       => 'Typicons',
				'description' => _x( 'Chart', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'chart-outlined.svg',
			),

			#endregion -- Typicons Icons

		);

		return $registered_views_vectors;
	}

}
