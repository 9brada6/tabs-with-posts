<?php

namespace TWRP\Icons;

/**
 * Class that holds all date icon definitions.
 *
 * Keywords to search: calendar, clock.
 */
class Date_Icons implements Icon_Definitions {

	/**
	 * Get all registered icons that represents the date.
	 *
	 * @return array<string,array>
	 */
	public static function get_definitions() {

		$registered_date_vectors = array(

			#region -- TWRP Icons

			// No Icons...

			#endregion -- TWRP Icons

			#region -- FontAwesome Icons

			'twrp-cal-fa-f'      => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'Calendar', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'filled.svg',
			),

			'twrp-cal-fa-ol'     => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'Calendar', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'outlined.svg',
			),

			'twrp-cal-fa-2-f'    => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'Calendar 2', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'alt-filled.svg',
			),

			'twrp-cal-fa-2-ol'   => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'Calendar 2', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'alt-outlined.svg',
			),

			'twrp-cal-fa-c-f'    => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'Clock', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'clock-filled.svg',
				'fix_classes' => 'twrp-i--va-15',
			),

			'twrp-cal-fa-c-ol'   => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'Clock', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'clock-outlined.svg',
				'fix_classes' => 'twrp-i--va-15',
			),

			#endregion -- FontAwesome Icons

			#region -- Google Icons

			'twrp-cal-goo-f'     => array(
				'brand'       => 'Google',
				'description' => _x( 'Calendar', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'filled.svg',
			),

			'twrp-cal-goo-ol'    => array(
				'brand'       => 'Google',
				'description' => _x( 'Calendar', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'outlined.svg',
			),

			'twrp-cal-goo-dt'    => array(
				'brand'       => 'Google',
				'description' => _x( 'Calendar', 'backend', 'twrp' ),
				'type'        => _x( 'DuoTone', 'backend', 'twrp' ),
				'file_name'   => 'duotone.svg',
			),

			'twrp-cal-goo-sh'    => array(
				'brand'       => 'Google',
				'description' => _x( 'Calendar', 'backend', 'twrp' ),
				'type'        => _x( 'Sharp', 'backend', 'twrp' ),
				'file_name'   => 'sharp.svg',
			),

			'twrp-cal-goo-r-f'   => array(
				'brand'       => 'Google',
				'description' => _x( 'Calendar Range', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'range-filled.svg',
			),

			'twrp-cal-goo-r-ol'  => array(
				'brand'       => 'Google',
				'description' => _x( 'Calendar Range', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'range-outlined.svg',
			),

			'twrp-cal-goo-r-dt'  => array(
				'brand'       => 'Google',
				'description' => _x( 'Calendar Range', 'backend', 'twrp' ),
				'type'        => _x( 'DuoTone', 'backend', 'twrp' ),
				'file_name'   => 'range-duotone.svg',
			),

			'twrp-cal-goo-r-sh'  => array(
				'brand'       => 'Google',
				'description' => _x( 'Calendar Range', 'backend', 'twrp' ),
				'type'        => _x( 'Sharp', 'backend', 'twrp' ),
				'file_name'   => 'range-sharp.svg',
			),

			'twrp-cal-goo-d-f'   => array(
				'brand'       => 'Google',
				'description' => _x( 'Calendar Today', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'today-filled.svg',
			),

			'twrp-cal-goo-d-ol'  => array(
				'brand'       => 'Google',
				'description' => _x( 'Calendar Today', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'today-outlined.svg',
			),

			'twrp-cal-goo-d-dt'  => array(
				'brand'       => 'Google',
				'description' => _x( 'Calendar Today', 'backend', 'twrp' ),
				'type'        => _x( 'DuoTone', 'backend', 'twrp' ),
				'file_name'   => 'today-duotone.svg',
			),

			'twrp-cal-goo-d-sh'  => array(
				'brand'       => 'Google',
				'description' => _x( 'Calendar Today', 'backend', 'twrp' ),
				'type'        => _x( 'Sharp', 'backend', 'twrp' ),
				'file_name'   => 'today-sharp.svg',
			),

			'twrp-cal-goo-c-f'   => array(
				'brand'       => 'Google',
				'description' => _x( 'Clock', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'clock-filled.svg',
				'fix_classes' => 'twrp-i--va-15',
			),

			'twrp-cal-goo-c-ol'  => array(
				'brand'       => 'Google',
				'description' => _x( 'Clock', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'clock-outlined.svg',
				'fix_classes' => 'twrp-i--va-15',
			),

			'twrp-cal-goo-c-dt'  => array(
				'brand'       => 'Google',
				'description' => _x( 'Clock', 'backend', 'twrp' ),
				'type'        => _x( 'DuoTone', 'backend', 'twrp' ),
				'file_name'   => 'clock-duotone.svg',
				'fix_classes' => 'twrp-i--va-15',
			),

			#endregion -- Google Icons

			#region -- Dashicons

			'twrp-cal-di-f'      => array(
				'brand'       => 'Dashicons',
				'description' => _x( 'Calendar', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'calendar-filled.svg',
			),

			'twrp-cal-di-2-f'    => array(
				'brand'       => 'Dashicons',
				'description' => _x( 'Calendar 2', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'calendar-2-filled.svg',
			),

			'twrp-cal-di-c-ol'   => array(
				'brand'       => 'Dashicons',
				'description' => _x( 'Clock', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'clock-outlined.svg',
				'fix_classes' => 'twrp-i--va-15',
			),

			#endregion -- Dashicons

			#region -- Foundation Icons

			'twrp-cal-fi-f'      => array(
				'brand'       => 'Foundation',
				'description' => _x( 'Calendar', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'filled.svg',
			),

			'twrp-cal-fi-c-ol'   => array(
				'brand'       => 'Foundation',
				'description' => _x( 'Clock', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'clock-outlined.svg',
				'fix_classes' => 'twrp-i--va-15',
			),

			#endregion -- Foundation Icons

			#region -- Ionicons Icons

			'twrp-cal-ii-f'      => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Calendar', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'filled.svg',
			),

			'twrp-cal-ii-ol'     => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Calendar', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'outlined.svg',
			),

			'twrp-cal-ii-sh'     => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Calendar', 'backend', 'twrp' ),
				'type'        => _x( 'Sharp', 'backend', 'twrp' ),
				'file_name'   => 'sharp.svg',
			),

			'twrp-cal-ii-ios-f'  => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Ios Calendar', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'ios-filled.svg',
			),

			'twrp-cal-ii-ios-ol' => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Ios Calendar', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'ios-outlined.svg',
			),

			'twrp-cal-ii-c-f'    => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Clock', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'clock-filled.svg',
				'fix_classes' => 'twrp-i--va-15',
			),

			'twrp-cal-ii-c-ol'   => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Clock', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'clock-outlined.svg',
				'fix_classes' => 'twrp-i--va-15',
			),

			'twrp-cal-ii-ic-f'   => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Ios Clock', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'ios-clock-filled.svg',
				'fix_classes' => 'twrp-i--va-15',
			),

			'twrp-cal-ii-ic-ol'  => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Ios Clock', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'ios-clock-outlined.svg',
				'fix_classes' => 'twrp-i--va-15',
			),

			'twrp-cal-ii-it-f'   => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Ios Time', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'ios-time-filled.svg',
				'fix_classes' => 'twrp-i--va-15',
			),

			'twrp-cal-ii-it-ol'  => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Ios Time', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'ios-time-outlined.svg',
				'fix_classes' => 'twrp-i--va-15',
			),

			#endregion -- Ionicons Icons

			#region -- IconMonstr Icons

			'twrp-cal-im-f'      => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Calendar', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'filled.svg',
			),

			'twrp-cal-im-t'      => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Calendar', 'backend', 'twrp' ),
				'type'        => _x( 'Thin', 'backend', 'twrp' ),
				'file_name'   => 'thin.svg',
			),

			'twrp-cal-im-2-f'    => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Calendar 2', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => '2-filled.svg',
			),

			'twrp-cal-im-3-f'    => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Calendar 3', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => '3-filled.svg',
			),

			'twrp-cal-im-4-f'    => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Calendar 4', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => '4-filled.svg',
			),

			'twrp-cal-im-5-f'    => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Calendar 5', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => '5-filled.svg',
			),

			'twrp-cal-im-c-f'    => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Clock', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'clock-filled.svg',
				'fix_classes' => 'twrp-i--va-15',
			),

			'twrp-cal-im-c-ol'   => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Clock', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'clock-outlined.svg',
				'fix_classes' => 'twrp-i--va-15',
			),

			'twrp-cal-im-c-t'    => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Clock', 'backend', 'twrp' ),
				'type'        => _x( 'Thin', 'backend', 'twrp' ),
				'file_name'   => 'clock-thin.svg',
				'fix_classes' => 'twrp-i--va-15',
			),

			#endregion -- IconMonstr Icons

			#region -- Captain Icons

			'twrp-cal-ci-f'      => array(
				'brand'       => 'Captain Icons',
				'description' => _x( 'Calendar', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'filled.svg',
			),

			'twrp-cal-ci-2-f'    => array(
				'brand'       => 'Captain Icons',
				'description' => _x( 'Calendar 2', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => '2-filled.svg',
			),

			'twrp-cal-ci-c-ol'   => array(
				'brand'       => 'Captain Icons',
				'description' => _x( 'Clock', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'clock-outlined.svg',
				'fix_classes' => 'twrp-i--va-15',
			),

			#endregion -- Captain Icons

			#region -- Feather Icons

			'twrp-cal-fe-ol'     => array(
				'brand'       => 'Feather',
				'description' => _x( 'Calendar', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'outlined.svg',
			),

			'twrp-cal-fe-c-ol'   => array(
				'brand'       => 'Feather',
				'description' => _x( 'Clock', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'clock-outlined.svg',
				'fix_classes' => 'twrp-i--va-15',
			),

			#endregion -- Feather Icons

			#region -- Jam Icons

			'twrp-cal-ji-f'      => array(
				'brand'       => 'JamIcons',
				'description' => _x( 'Calendar', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'filled.svg',
			),

			'twrp-cal-ji-ol'     => array(
				'brand'       => 'JamIcons',
				'description' => _x( 'Calendar', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'outlined.svg',
			),

			'twrp-cal-ji-2-f'    => array(
				'brand'       => 'JamIcons',
				'description' => _x( 'Calendar 2', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'alt-filled.svg',
			),

			'twrp-cal-ji-2-ol'   => array(
				'brand'       => 'JamIcons',
				'description' => _x( 'Calendar 2', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'alt-outlined.svg',
			),

			'twrp-cal-ji-c-f'    => array(
				'brand'       => 'JamIcons',
				'description' => _x( 'Clock', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'clock-filled.svg',
				'fix_classes' => 'twrp-i--va-15',
			),

			'twrp-cal-ji-c-ol'   => array(
				'brand'       => 'JamIcons',
				'description' => _x( 'Clock', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'clock-outlined.svg',
				'fix_classes' => 'twrp-i--va-15',
			),

			#endregion -- Jam Icons

			#region -- Linea Icons

			'twrp-cal-li-ol'     => array(
				'brand'       => 'Linea',
				'description' => _x( 'Calendar', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'calendar-outlined.svg',
			),

			'twrp-cal-li-2-ol'   => array(
				'brand'       => 'Linea',
				'description' => _x( 'Calendar 2', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'calendar-2-outlined.svg',
			),

			'twrp-cal-li-c-ol'   => array(
				'brand'       => 'Linea',
				'description' => _x( 'Clock', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'clock-outlined.svg',
				'fix_classes' => 'twrp-i--va-15',
			),

			'twrp-cal-li-c2-ol'  => array(
				'brand'       => 'Linea',
				'description' => _x( 'Clock 2', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'clock-2-outlined.svg',
				'fix_classes' => 'twrp-i--va-15',
			),

			#endregion -- Linea Icons

			#region -- Octicons Icons

			'twrp-cal-oi-ol'     => array(
				'brand'       => 'Octicons',
				'description' => _x( 'Calendar', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'calendar-outlined.svg',
			),

			'twrp-cal-oi-t'      => array(
				'brand'       => 'Octicons',
				'description' => _x( 'Calendar', 'backend', 'twrp' ),
				'type'        => _x( 'Thin', 'backend', 'twrp' ),
				'file_name'   => 'calendar-thin.svg',
			),

			'twrp-cal-oi-c-ol'   => array(
				'brand'       => 'Octicons',
				'description' => _x( 'Clock', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'clock-outlined.svg',
				'fix_classes' => 'twrp-i--va-15',
			),

			'twrp-cal-oi-c-t'    => array(
				'brand'       => 'Octicons',
				'description' => _x( 'Clock', 'backend', 'twrp' ),
				'type'        => _x( 'Thin', 'backend', 'twrp' ),
				'file_name'   => 'clock-thin.svg',
				'fix_classes' => 'twrp-i--va-15',
			),

			#endregion -- Octicons Icons

			#region -- Typicons Icons

			'twrp-cal-ti-f'      => array(
				'brand'       => 'Typicons',
				'description' => _x( 'Calendar', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'filled.svg',
			),

			'twrp-cal-ti-ol'     => array(
				'brand'       => 'Typicons',
				'description' => _x( 'Calendar', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'outlined.svg',
			),

			'twrp-cal-ti-c-ol'   => array(
				'brand'       => 'Typicons',
				'description' => _x( 'Clock', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'clock-outlined.svg',
				'fix_classes' => 'twrp-i--va-15',
			),

			#endregion -- Typicons Icons

		);

		return $registered_date_vectors;
	}

}
