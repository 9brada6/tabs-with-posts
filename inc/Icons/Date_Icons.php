<?php
/**
 * File that contains the class with the same name.
 */

namespace TWRP\Icons;

/**
 * Class that holds all date icon definitions.
 */
class Date_Icons {

	/**
	 * Get all registered icons that represents the date.
	 *
	 * @return array<string,array>
	 */
	public static function get_date_icons() {

		$registered_date_vectors = array(

			#region -- FontAwesome Icons

			'twrp-cal-fa-f'         => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'Calendar', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-cal-fa-f" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M12 192h424c6.6 0 12 5.4 12 12v260c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V204c0-6.6 5.4-12 12-12zm436-44v-36c0-26.5-21.5-48-48-48h-48V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H160V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H48C21.5 64 0 85.5 0 112v36c0 6.6 5.4 12 12 12h424c6.6 0 12-5.4 12-12z"/></svg>',
				'file_name'   => 'filled.svg',
			),

			'twrp-cal-fa-ol'        => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'Calendar', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-cal-fa-ol" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M400 64h-48V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H160V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48zm-6 400H54c-3.3 0-6-2.7-6-6V160h352v298c0 3.3-2.7 6-6 6z"/></svg>',
				'file_name'   => 'outlined.svg',
			),

			'twrp-cal-fa-2-f'       => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'Calendar 2', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-cal-fa-2-f" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M0 464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V192H0v272zm320-196c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM192 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM64 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zM400 64h-48V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H160V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H48C21.5 64 0 85.5 0 112v48h448v-48c0-26.5-21.5-48-48-48z"/></svg>',
				'file_name'   => 'alt-filled.svg',
			),

			'twrp-cal-fa-2-ol'      => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'Calendar 2', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-cal-fa-2-ol" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M148 288h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12zm108-12v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm96 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm-96 96v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm-96 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm192 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm96-260v352c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h48V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h128V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h48c26.5 0 48 21.5 48 48zm-48 346V160H48v298c0 3.3 2.7 6 6 6h340c3.3 0 6-2.7 6-6z"/></svg>',
				'file_name'   => 'alt-outlined.svg',
			),

			#endregion -- FontAwesome Icons

			#region -- Google Icons

			'twrp-cal-goo-f'        => array(
				'brand'       => 'Google',
				'description' => _x( 'Calendar', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-cal-goo-f" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0,0h24v24H0V0z"/><path d="M21,2h-1V0h-2v2H6V0H4v2H3C1.8,2,1,2.8,1,4v18c0,1.2,0.8,2,2,2h18c1.2,0,2-0.8,2-2V4C23,2.8,22.2,2,21,2z M21,22H3V8h18V22z"/></svg>',
				'file_name'   => 'filled.svg',
			),

			'twrp-cal-goo-ol'       => array(
				'brand'       => 'Google',
				'description' => _x( 'Calendar', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-cal-goo-ol" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0,0h24v24H0V0z"/><path d="M21,2h-1V0h-2v2H6V0H4v2H3C1.8,2,1,2.8,1,4v18c0,1.2,0.8,2,2,2h18c1.2,0,2-0.8,2-2V4C23,2.8,22.2,2,21,2z M21,22H3V9h18V22z M21,7H3V4h18V7z"/></svg>',
				'file_name'   => 'outlined.svg',
			),

			'twrp-cal-goo-dt'       => array(
				'brand'       => 'Google',
				'description' => _x( 'Calendar', 'backend', 'twrp' ),
				'type'        => _x( 'TwoTone', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-cal-goo-dt" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0,0h24v24H0V0z"/><path d="M21,2h-1V0h-2v2H6V0H4v2H3C1.8,2,1,2.8,1,4v18c0,1.2,0.8,2,2,2h18c1.2,0,2-0.8,2-2V4C23,2.8,22.2,2,21,2z M21,4v3H3V4H21z M3,22V9h18v13H3z"/><path style="opacity:0.3;" d="M3,4l18,0v3H3V4z"/></svg>',
				'file_name'   => 'twotone.svg',
			),

			'twrp-cal-goo-sh'       => array(
				'brand'       => 'Google',
				'description' => _x( 'Calendar', 'backend', 'twrp' ),
				'type'        => _x( 'Sharp', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-cal-goo-sh" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0,0h24v24H0V0z"/><path d="M23,2h-3V0h-2v2H6V0H4v2H1v22h22V2z M21,22H3V8h18V22z"/></svg>',
				'file_name'   => 'sharp.svg',
			),

			'twrp-cal-range-goo-f'  => array(
				'brand'       => 'Google',
				'description' => _x( 'Calendar Range', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-cal-range-goo-f" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0,0h24v24H0V0z"/><path d="M8,10H6v2h2V10z M13,10h-2v2h2V10z M18,10h-2v2h2V10z M21,2h-2V0h-2v2H7V0H5v2H3C1.6,2,1,2.7,1,4v18c0,1.3,0.6,2,2,2h18c1.3,0,2-0.7,2-2V4C23,2.7,22.3,2,21,2z M21,22H3V8h18V22z"/></svg>',
				'file_name'   => 'range-filled.svg',
			),

			'twrp-cal-range-goo-ol' => array(
				'brand'       => 'Google',
				'description' => _x( 'Calendar Range', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-cal-range-goo-ol" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0,0h24v24H0V0z"/><path d="M6,11h2v2H6V11z M23,4v18c0,1.3-0.7,2-2,2H3c-1.4,0-2-0.7-2-2V4c0-1.3,0.6-2,2-2h2V0h2v2h10V0h2v2h2C22.3,2,23,2.7,23,4z M3,7h18V4H3V7z M21,22V9H3v13H21z M16,13h2v-2h-2V13z M11,13h2v-2h-2V13z"/></svg>',
				'file_name'   => 'range-outlined.svg',
			),

			'twrp-cal-range-goo-dt' => array(
				'brand'       => 'Google',
				'description' => _x( 'Calendar Range', 'backend', 'twrp' ),
				'type'        => _x( 'TwoTone', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-cal-range-goo-dt" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0,0h24v24H0V0z"/><path style="opacity:0.3" d="M3,7h18V4H3V7z"/><path d="M6,11h2v2H6V11z M21,2h-2V0h-2v2H7V0H5v2H3C1.6,2,1,2.7,1,4v18c0,1.3,0.6,2,2,2h18c1.3,0,2-0.7,2-2V4C23,2.7,22.3,2,21,2z M21,22H3V9h18V22z M21,7H3V4h18V7z M16,11h2v2h-2V11z M11,11h2v2h-2V11z"/></svg>',
				'file_name'   => 'range-twotone.svg',
			),

			'twrp-cal-range-goo-sh' => array(
				'brand'       => 'Google',
				'description' => _x( 'Calendar Range', 'backend', 'twrp' ),
				'type'        => _x( 'Sharp', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-cal-range-goo-sh" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0,0h24v24H0V0z"/><path d="M8,10H6v2h2V10z M13,10h-2v2h2V10z M18,10h-2v2h2V10z M23,2h-4V0h-2v2H7V0H5v2H1v22h22V2z M21,22H3V8h18V22z"/></svg>',
				'file_name'   => 'range-sharp.svg',
			),

			'twrp-cal-day-goo-f'    => array(
				'brand'       => 'Google',
				'description' => _x( 'Calendar Today', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-cal-day-goo-f" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M0,0h24v24H0V0z" fill="none"/><path d="M21,2h-2V0h-2v2H7V0H5v2H3C1.6,2,1,2.7,1,4v18c0,1.3,0.6,2,2,2h18c1.3,0,2-0.7,2-2V4C23,2.7,22.3,2,21,2z M21,22H3V8h18V22z M5,10h6v6H5V10z"/></svg>',
				'file_name'   => 'today-filled.svg',
			),

			'twrp-cal-day-goo-ol'   => array(
				'brand'       => 'Google',
				'description' => _x( 'Calendar Today', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-cal-day-goo-ol" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0,0h24v24H0V0z"/><path d="M21,2h-2V0h-2v2H7V0H5v2H3C1.6,2,1,2.7,1,4v18c0,1.3,0.6,2,2,2h18c1.3,0,2-0.7,2-2V4C23,2.7,22.3,2,21,2z M21,7H3V4h18V7z M21,22H3V9h18V22z M5,11h6v6H5V11z"/></svg>',
				'file_name'   => 'today-outlined.svg',
			),

			'twrp-cal-day-goo-dt'   => array(
				'brand'       => 'Google',
				'description' => _x( 'Calendar Today', 'backend', 'twrp' ),
				'type'        => _x( 'TwoTone', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-cal-day-goo-dt" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M21,2h-2V0h-2v2H7V0H5v2H3C1.6,2,1,2.7,1,4v18c0,1.3,0.6,2,2,2h18c1.1,0,2-0.9,2-2V4C23,2.7,22.3,2,21,2z M21,22H3V9h18V22 M21,7H3V4h18V7z M11,11H5v6h6V11z"/><path fill="none" d="M0,0h24v24H0V0z"/><path style="opacity:0.3" d="M3,4h18v3H3V4z"/></svg>',
				'file_name'   => 'today-twotone.svg',
			),

			'twrp-cal-day-goo-sh'   => array(
				'brand'       => 'Google',
				'description' => _x( 'Calendar Today', 'backend', 'twrp' ),
				'type'        => _x( 'Sharp', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-cal-day-goo-sh" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0,0h24v24H0V0z"/><path d="M23,2h-4V0h-2v2H7V0H5v2H1v22h22V2z M21,22H3V8h18V22z M5,10h6v6H5V10z"/></svg>',
				'file_name'   => 'today-sharp.svg',
			),

			#endregion -- Google Icons

			#region -- Foundation Icons

			'twrp-cal-fi-f'         => array(
				'brand'       => 'Foundation',
				'description' => _x( 'Calendar', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-cal-fi-f" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><path d="M92.1,35.6H7.9c-1,0-1.7,0.8-1.7,1.7v60.4c0,1,0.8,1.7,1.7,1.7h84.1c1,0,1.7-0.8,1.7-1.7V37.3C93.8,36.3,93,35.6,92.1,35.6z M35.4,86.7c-2.9,0-6.1-0.6-8.6-1.6c-0.4-0.1-0.6-0.5-0.5-0.9l0.8-5.9c0-0.3,0.2-0.5,0.4-0.6c0.2-0.1,0.5-0.2,0.8-0.1c2.7,1,5,1.4,7.9,1.4c3,0,5.1-1.4,5.1-3.5c0-2.5-1.2-3.9-7.9-4.3c-0.5,0-0.8-0.4-0.8-0.9v-5.9c0-0.5,0.4-0.8,0.8-0.9c5.8-0.4,6.4-2.2,6.4-3.5c0-0.9,0-2.3-3.9-2.3c-2.1,0-4.3,0.6-6.6,1.7c-0.3,0.1-0.5,0.1-0.8,0c-0.2-0.1-0.4-0.4-0.5-0.6l-0.8-5.9c-0.1-0.4,0.1-0.7,0.5-0.9c2.7-1.2,6-1.9,10-1.9c7.1,0,11.8,3.3,11.8,8.2c0,3.7-1.9,6.4-5.8,8.2c3.3,1.3,6.7,3.6,6.7,8.6C50.5,82.1,44.6,86.7,35.4,86.7z M72.1,85.3c0,0.5-0.4,0.9-0.9,0.9h-7.2c-0.5,0-0.9-0.4-0.9-0.9V61.6l-4.7,1.8c-0.3,0.1-0.5,0.1-0.8-0.1c-0.2-0.1-0.4-0.4-0.4-0.6l-0.8-5.9c-0.1-0.4,0.1-0.7,0.5-0.9l10.3-5.1c0.1-0.1,0.3-0.1,0.4-0.1h3.6c0.5,0,0.9,0.4,0.9,0.9L72.1,85.3L72.1,85.3z"/><path d="M92.1,8.4h-9v4.2c0,4.4-2.5,9.2-9.7,9.2s-9.7-4.8-9.7-9.2V8.4H36.4v4.2c0,4.4-2.5,9.2-9.7,9.2c-7.1,0-9.7-4.8-9.7-9.2V8.4H7.9c-1,0-1.7,0.8-1.7,1.7v17.7c0,1,0.8,1.7,1.7,1.7h84.1c1,0,1.7-0.8,1.7-1.7V10.1C93.8,9.1,93,8.4,92.1,8.4z"/><path d="M26.7,16.1c2.9,0,4.1-1,4.1-3.6V8.4V4.2c0-2.5-1.2-3.6-4.1-3.6c-2.9,0-4.1,1-4.1,3.6v4.2v4.2C22.6,15.1,23.8,16.1,26.7,16.1z"/><path d="M73.4,16.1c2.9,0,4.1-1,4.1-3.6V8.4V4.2c0-2.5-1.2-3.6-4.1-3.6c-2.9,0-4.1,1-4.1,3.6v4.2v4.2C69.4,15.1,70.5,16.1,73.4,16.1z"/></svg>',
				'file_name'   => 'filled.svg',
			),

			#endregion -- Foundation Icons

			#region -- Ionicons Icons

			'twrp-cal-ii-f'         => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Calendar', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-cal-ii-f" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M423.8,54H407V37.7c0-9-7-16.8-16.2-17.3c-9.4-0.4-17.3,6.7-17.8,16c0,0.3,0,0.5,0,0.8V54H139V37.7c0-9-7-16.8-16.2-17.3c-9.4-0.4-17.3,6.7-17.8,16c0,0.3,0,0.5,0,0.8V54H88.2C51.1,54,21,84.1,21,121.2v302.6c0,37.1,30.1,67.2,67.2,67.2h335.6c37.1,0,67.2-30.1,67.2-67.2V121.2C491,84.1,460.9,54,423.8,54z M130,424c-13.9,0-25.2-11.3-25.2-25.2c0-13.9,11.3-25.2,25.2-25.2s25.2,11.3,25.2,25.2C155.2,412.7,143.9,424,130,424z M130,340c-13.9,0-25.2-11.3-25.2-25.2c0-13.9,11.3-25.2,25.2-25.2s25.2,11.3,25.2,25.2C155.2,328.7,143.9,340,130,340z M214,424c-13.9,0-25.2-11.3-25.2-25.2c0-13.9,11.3-25.2,25.2-25.2s25.2,11.3,25.2,25.2C239.2,412.7,227.9,424,214,424z M214,340c-13.9,0-25.2-11.3-25.2-25.2c0-13.9,11.3-25.2,25.2-25.2s25.2,11.3,25.2,25.2C239.2,328.7,227.9,340,214,340z M298,424c-13.9,0-25.2-11.3-25.2-25.2c0-13.9,11.3-25.2,25.2-25.2s25.2,11.3,25.2,25.2C323.2,412.7,311.9,424,298,424z M298,340c-13.9,0-25.2-11.3-25.2-25.2c0-13.9,11.3-25.2,25.2-25.2s25.2,11.3,25.2,25.2C323.2,328.7,311.9,340,298,340z M298,256c-13.9,0-25.2-11.3-25.2-25.2s11.3-25.2,25.2-25.2s25.2,11.3,25.2,25.2S311.9,256,298,256L298,256z M382,340c-13.9,0-25.2-11.3-25.2-25.2c0-13.9,11.3-25.2,25.2-25.2s25.2,11.3,25.2,25.2C407.2,328.7,395.9,340,382,340z M382,256c-13.9,0-25.2-11.3-25.2-25.2s11.3-25.2,25.2-25.2s25.2,11.3,25.2,25.2S395.9,256,382,256L382,256z M457,129.9v16.7c0,4.6-3.8,8.4-8.4,8.4H62.4c-4.6,0-8.4-3.8-8.4-8.4v-25.1C54.1,103,69.1,88.1,87.6,88h335.8c18.5,0.1,33.5,15,33.6,33.5V129.9z"/></svg>',
				'file_name'   => 'filled.svg',
			),

			'twrp-cal-ii-ol'        => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Calendar', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-cal-ii-ol" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path style="fill:none;stroke:currentColor;stroke-width:32;stroke-linejoin:round;" d="M87.4,71h336.2c27.8,0,50.4,22.6,50.4,50.4v302.2c0,27.8-22.6,50.4-50.4,50.4H87.4C59.6,474,37,451.4,37,423.6V121.4C37,93.6,59.6,71,87.4,71z"/><path d="M404.5,71h-298C68.2,71,37,102.6,37,141.3V205h16.8c0-16.5,16.8-33,33.6-33h336c16.8,0,33.6,16.5,33.6,33h17v-63.7C474,102.6,442.8,71,404.5,71z"/><circle cx="298" cy="230.8" r="25.2"/><circle cx="382" cy="230.8" r="25.2"/><circle cx="298" cy="314.8" r="25.2"/><circle cx="382" cy="314.8" r="25.2"/><circle cx="130" cy="314.8" r="25.2"/><circle cx="214" cy="314.8" r="25.2"/><circle cx="130" cy="398.8" r="25.2"/><circle cx="214" cy="398.8" r="25.2"/><circle cx="298" cy="398.8" r="25.2"/><line style="fill:none;stroke:currentColor;stroke-width:32;stroke-linecap:round;stroke-linejoin:round;" x1="122" y1="38" x2="122" y2="71"/><line style="fill:none;stroke:currentColor;stroke-width:32;stroke-linecap:round;stroke-linejoin:round;" x1="390" y1="38" x2="390" y2="71"/></svg>',
				'file_name'   => 'outlined.svg',
			),

			'twrp-cal-ii-sh'        => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Calendar', 'backend', 'twrp' ),
				'type'        => _x( 'Sharp', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-cal-ii-sh" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M277.2,206h41.6c2.3,0,4.2,1.9,4.2,4.2v41.6c0,2.3-1.9,4.2-4.2,4.2h-41.6c-2.3,0-4.2-1.9-4.2-4.2v-41.6C273,207.9,274.9,206,277.2,206z"/><path d="M361.2,206h41.6c2.3,0,4.2,1.9,4.2,4.2v41.6c0,2.3-1.9,4.2-4.2,4.2h-41.6c-2.3,0-4.2-1.9-4.2-4.2v-41.6C357,207.9,358.9,206,361.2,206z"/><path d="M277.2,290h41.6c2.3,0,4.2,1.9,4.2,4.2v41.6c0,2.3-1.9,4.2-4.2,4.2h-41.6c-2.3,0-4.2-1.9-4.2-4.2v-41.6C273,291.9,274.9,290,277.2,290z"/><path d="M361.2,290h41.6c2.3,0,4.2,1.9,4.2,4.2v41.6c0,2.3-1.9,4.2-4.2,4.2h-41.6c-2.3,0-4.2-1.9-4.2-4.2v-41.6C357,291.9,358.9,290,361.2,290z"/><path d="M109.2,290h41.6c2.3,0,4.2,1.9,4.2,4.2v41.6c0,2.3-1.9,4.2-4.2,4.2h-41.6c-2.3,0-4.2-1.9-4.2-4.2v-41.6C105,291.9,106.9,290,109.2,290z"/><path d="M193.2,290h41.6c2.3,0,4.2,1.9,4.2,4.2v41.6c0,2.3-1.9,4.2-4.2,4.2h-41.6c-2.3,0-4.2-1.9-4.2-4.2v-41.6C189,291.9,190.9,290,193.2,290z"/><path d="M109.2,374h41.6c2.3,0,4.2,1.9,4.2,4.2v41.6c0,2.3-1.9,4.2-4.2,4.2h-41.6c-2.3,0-4.2-1.9-4.2-4.2v-41.6C105,375.9,106.9,374,109.2,374z"/><path d="M193.2,374h41.6c2.3,0,4.2,1.9,4.2,4.2v41.6c0,2.3-1.9,4.2-4.2,4.2h-41.6c-2.3,0-4.2-1.9-4.2-4.2v-41.6C189,375.9,190.9,374,193.2,374z"/><path d="M277.2,374h41.6c2.3,0,4.2,1.9,4.2,4.2v41.6c0,2.3-1.9,4.2-4.2,4.2h-41.6c-2.3,0-4.2-1.9-4.2-4.2v-41.6C273,375.9,274.9,374,277.2,374z"/><path d="M457.4,55H407V21h-42v34H147V21h-42v34H54.6C36,55,21,70,21,88.6v368.8C21,476,36,491,54.6,491h402.8c18.6,0,33.6-15,33.6-33.6V88.6C491,70,476,55,457.4,55z M445,445H67V172h378V445z"/></svg>',
				'file_name'   => 'sharp.svg',
			),

			'twrp-cal-ii-ios-f'     => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Ios Calendar', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-cal-ii-ios-f" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><rect x="16" y="176" width="480" height="320"/><polygon points="496,56 376,56 376,116 356,116 356,56 156,56 156,116 136,116 136,56 16,56 16,156 496,156 	"/><rect x="136" y="16" width="20" height="40"/><rect x="356" y="16" width="20" height="40"/></svg>',
				'file_name'   => 'ios-filled.svg',
			),

			'twrp-cal-ii-ios-ol'    => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Ios Calendar', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-cal-ii-ios-ol" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M376,56V16h-20v40H156V16h-20v40H16v440h480V56H376z M476,476H36V176h440V476z M476,156H36V76h100v40h20V76h200v40h20V76h100V156z"/></svg>',
				'file_name'   => 'ios-outlined.svg',
			),

			#endregion -- Ionicons Icons

			#region -- IconMonstr Icons

			'twrp-cal-im-f'         => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Calendar', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-cal-im-f" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M24 2v22h-24v-22h3v1c0 1.103.897 2 2 2s2-.897 2-2v-1h10v1c0 1.103.897 2 2 2s2-.897 2-2v-1h3zm-2 6h-20v14h20v-14zm-2-7c0-.552-.447-1-1-1s-1 .448-1 1v2c0 .552.447 1 1 1s1-.448 1-1v-2zm-14 2c0 .552-.447 1-1 1s-1-.448-1-1v-2c0-.552.447-1 1-1s1 .448 1 1v2zm6.687 13.482c0-.802-.418-1.429-1.109-1.695.528-.264.836-.807.836-1.503 0-1.346-1.312-2.149-2.581-2.149-1.477 0-2.591.925-2.659 2.763h1.645c-.014-.761.271-1.315 1.025-1.315.449 0 .933.272.933.869 0 .754-.816.862-1.567.797v1.28c1.067 0 1.704.067 1.704.985 0 .724-.548 1.048-1.091 1.048-.822 0-1.159-.614-1.188-1.452h-1.634c-.032 1.892 1.114 2.89 2.842 2.89 1.543 0 2.844-.943 2.844-2.518zm4.313 2.518v-7.718h-1.392c-.173 1.154-.995 1.491-2.171 1.459v1.346h1.852v4.913h1.711z"/></svg>',
				'file_name'   => 'filled.svg',
			),

			'twrp-cal-im-t'         => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Calendar', 'backend', 'twrp' ),
				'type'        => _x( 'Thin', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-cal-im-t" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M24 23h-24v-19h4v-3h4v3h8v-3h4v3h4v19zm-1-15h-22v14h22v-14zm-16.501 8.794l1.032-.128c.201.93.693 1.538 1.644 1.538.957 0 1.731-.686 1.731-1.634 0-.989-.849-1.789-2.373-1.415l.115-.843c.91.09 1.88-.348 1.88-1.298 0-.674-.528-1.224-1.376-1.224-.791 0-1.364.459-1.518 1.41l-1.032-.171c.258-1.319 1.227-2.029 2.527-2.029 1.411 0 2.459.893 2.459 2.035 0 .646-.363 1.245-1.158 1.586.993.213 1.57.914 1.57 1.928 0 1.46-1.294 2.451-2.831 2.451-1.531 0-2.537-.945-2.67-2.206zm9.501 2.206h-1.031v-6.265c-.519.461-1.354.947-1.969 1.159v-.929c1.316-.576 2.036-1.402 2.336-1.965h.664v8zm7-14h-22v2h22v-2zm-16-3h-2v2h2v-2zm12 0h-2v2h2v-2z"/></svg>',
				'file_name'   => 'thin.svg',
			),

			'twrp-cal-im-2-f'       => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Calendar 2', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-cal-im-2-f" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M17 3v-2c0-.552.447-1 1-1s1 .448 1 1v2c0 .552-.447 1-1 1s-1-.448-1-1zm-12 1c.553 0 1-.448 1-1v-2c0-.552-.447-1-1-1-.553 0-1 .448-1 1v2c0 .552.447 1 1 1zm13 13v-3h-1v4h3v-1h-2zm-5 .5c0 2.481 2.019 4.5 4.5 4.5s4.5-2.019 4.5-4.5-2.019-4.5-4.5-4.5-4.5 2.019-4.5 4.5zm11 0c0 3.59-2.91 6.5-6.5 6.5s-6.5-2.91-6.5-6.5 2.91-6.5 6.5-6.5 6.5 2.91 6.5 6.5zm-14.237 3.5h-7.763v-13h19v1.763c.727.33 1.399.757 2 1.268v-9.031h-3v1c0 1.316-1.278 2.339-2.658 1.894-.831-.268-1.342-1.111-1.342-1.984v-.91h-9v1c0 1.316-1.278 2.339-2.658 1.894-.831-.268-1.342-1.111-1.342-1.984v-.91h-3v21h11.031c-.511-.601-.938-1.273-1.268-2z"/></svg>',
				'file_name'   => '2-filled.svg',
			),

			'twrp-cal-im-3-f'       => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Calendar 3', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-cal-im-3-f" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20 20h-4v-4h4v4zm-6-10h-4v4h4v-4zm6 0h-4v4h4v-4zm-12 6h-4v4h4v-4zm6 0h-4v4h4v-4zm-6-6h-4v4h4v-4zm16-8v22h-24v-22h3v1c0 1.103.897 2 2 2s2-.897 2-2v-1h10v1c0 1.103.897 2 2 2s2-.897 2-2v-1h3zm-2 6h-20v14h20v-14zm-2-7c0-.552-.447-1-1-1s-1 .448-1 1v2c0 .552.447 1 1 1s1-.448 1-1v-2zm-14 2c0 .552-.447 1-1 1s-1-.448-1-1v-2c0-.552.447-1 1-1s1 .448 1 1v2z"/></svg>',
				'file_name'   => '3-filled.svg',
			),

			'twrp-cal-im-4-f'       => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Calendar 4', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-cal-im-4-f" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M14 13h-4v-4h4v4zm6-4h-4v4h4v-4zm-12 6h-4v4h4v-4zm6 0h-4v4h4v-4zm-6-6h-4v4h4v-4zm16-8v13.386c0 2.391-6.648 9.614-9.811 9.614h-14.189v-23h24zm-2 6h-20v15h11.362c4.156 0 2.638-6 2.638-6s6 1.65 6-2.457v-6.543z"/></svg>',
				'file_name'   => '4-filled.svg',
			),

			'twrp-cal-im-5-f'       => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Calendar 5', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-cal-im-5-f" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M14 13h-4v-4h4v4zm6-4h-4v4h4v-4zm-12 6h-4v4h4v-4zm6 0h-4v4h4v-4zm-6-6h-4v4h4v-4zm16-8v22h-24v-22h24zm-7.471 19.96c1.616-.863 4.35-3.572 5.471-5.058v-.018c-.962.658-2.978 1.207-4.479.856.165 1.087-.137 3.356-.992 4.22zm-14.529.04h11.589c3.328 0 2.331-5.903 2.331-5.903 2.14.529 6.08.278 6.08-1.942v-6.155h-20v14z"/></svg>',
				'file_name'   => '5-filled.svg',
			),

			#endregion -- IconMonstr Icons

			#region -- Capicon Icons

			'twrp-cal-ci-f'         => array(
				'brand'       => 'Capicon',
				'description' => _x( 'Calendar', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-cal-ci-f" xmlns="http://www.w3.org/2000/svg" viewBox="-1.395 0 32 32.244"><path d="M28.858,5c-0.125-0.126-1.812,0.058-4.306,0.422c-0.156-1.221-0.684-5.247-0.881-5.401c-0.233-0.182-4.852,0.907-5.073,1.244c-0.187,0.284-0.13,3.947-0.106,5.119c-3.004,0.507-6.258,1.091-9.178,1.653C9.159,7.173,8.596,4.105,8.401,3.95c-0.226-0.183-3.3,0.998-3.411,1.361c-0.085,0.28-0.069,2.567-0.055,3.608c-2.66,0.566-4.502,1.035-4.709,1.269c-0.245,0.275-0.272,2.271-0.168,4.948l29.102-4.769C29.104,7.323,29.007,5.147,28.858,5z"/><path d="M29.188,12.498L1.289,15.874l0,0l-1.193,0.145c0.015,0.312,0.031,0.63,0.048,0.955l0.005,0.106l0,0c0.345,6.323,1.208,14.731,1.736,14.997c0.83,0.414,26.559,0,26.973-0.622C29.128,31.049,29.267,20.179,29.188,12.498z M27.125,29.812c-0.514,0.371-23.411,0.865-23.759,0.592c-0.35-0.271-1.128-6.969-1.378-12.842l25.456-3.104C27.462,21.541,27.457,29.569,27.125,29.812z"/><path d="M13.868,18.731c-2.529-3.812-6.225,0.194-7.431,4.437l1.751,1.983c0,0,1.984-5.096,3.54-1.983c0,0,1.4,1.75-2.256,4.513l0.545,1.984l6.263-1.051V25.19l-3.423,1.246C12.856,26.437,16.396,22.546,13.868,18.731z"/><polygon points="15.58,21.456 17.173,23.435 19.003,20.989 18.38,28.537 22,28.537 22,16.671 20.091,16.088 "/></svg>',
				'file_name'   => 'filled.svg',
			),

			'twrp-cal-ci-2-f'       => array(
				'brand'       => 'Capicon',
				'description' => _x( 'Calendar 2', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-cal-ci-2-f" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26.826 32"><path d="M26.754,6.777c-0.058-0.1-0.612-0.1-1.515-0.027c-0.018,5.466-0.94,23.329-1.555,23.624c-0.608,0.294-15.669-1.147-20.397-1.97c0.048,0.69,0.111,1.137,0.188,1.229c0.529,0.635,21.084,2.672,21.797,2.328C25.987,31.617,27.124,7.412,26.754,6.777z"/><path d="M22.099,28.787c0.715-0.344,1.854-24.549,1.481-25.184c-0.122-0.209-2.448,0.017-5.562,0.451c0.002-0.012,0.004-0.023,0.006-0.035c0.359-1.728,1.838-2.882,3.299-2.577c0.462,0.097,0.865,0.327,1.191,0.651l0.963-0.92c-0.494-0.554-1.129-0.95-1.867-1.104c-1.396-0.291-2.795,0.344-3.734,1.527c-0.46-0.442-1.021-0.76-1.662-0.893c-1.268-0.265-2.54,0.236-3.468,1.219c-0.381-0.28-0.815-0.484-1.294-0.584c-1.351-0.282-2.708,0.305-3.646,1.418C7.467,2.539,7.096,2.375,6.69,2.29C4.587,1.854,2.462,3.514,1.943,5.999C1.865,6.375,1.831,6.746,1.832,7.108C1.488,7.223,1.251,7.325,1.146,7.412C-0.124,8.471-0.229,25.824,0.3,26.459C0.829,27.094,21.384,29.131,22.099,28.787z M3.014,17.062l-0.065-2.096l17.678-1.01l0.079,2.547L3.014,17.062z M20.699,18.902l-0.064,2.547L2.94,21.006l0.053-2.094L20.699,18.902z M7.644,9.183c0.297-0.918,1.163-1.459,1.936-1.21c0.772,0.25,1.158,1.196,0.861,2.113c-0.297,0.918-1.163,1.459-1.936,1.21C7.732,11.046,7.347,10.1,7.644,9.183z M12.723,8.548c0.297-0.918,1.163-1.459,1.936-1.21c0.771,0.25,1.158,1.196,0.861,2.113c-0.297,0.918-1.164,1.459-1.938,1.21C12.812,10.411,12.426,9.465,12.723,8.548z M19.737,6.703c0.771,0.25,1.158,1.196,0.861,2.113c-0.299,0.918-1.164,1.459-1.938,1.209C17.89,9.776,17.503,8.83,17.8,7.912C18.099,6.995,18.965,6.454,19.737,6.703z M15.926,2.077c0.474,0.1,0.886,0.341,1.218,0.679l0.063-0.044C17.062,3.046,16.94,3.4,16.862,3.777C16.831,3.93,16.81,4.08,16.79,4.23c-1.332,0.196-2.766,0.421-4.202,0.661c0.011-0.079,0.023-0.157,0.04-0.237C12.988,2.927,14.465,1.772,15.926,2.077z M7.866,5.289c0.36-1.728,1.837-2.881,3.298-2.576c0.288,0.06,0.551,0.177,0.788,0.332c-0.216,0.417-0.383,0.875-0.485,1.367c-0.048,0.23-0.08,0.459-0.098,0.687c-1.224,0.211-2.433,0.43-3.566,0.646C7.815,5.594,7.834,5.441,7.866,5.289z M3.104,6.241c0.36-1.728,1.838-2.881,3.298-2.576c0.242,0.05,0.467,0.139,0.674,0.257C6.917,4.273,6.788,4.648,6.705,5.047c-0.066,0.314-0.1,0.626-0.109,0.934C5.207,6.258,3.977,6.526,3.033,6.767C3.044,6.594,3.067,6.418,3.104,6.241z M2.564,10.135C2.861,9.217,3.728,8.676,4.5,8.926c0.772,0.249,1.158,1.195,0.861,2.113c-0.297,0.917-1.163,1.459-1.936,1.209C2.652,11.998,2.268,11.052,2.564,10.135z M20.554,26.312L2.9,25.025l0.152-2.088l17.688,0.834L20.554,26.312z"/></svg>',
				'file_name'   => 'filled.svg',
			),

			#endregion -- Capicon Icons

			#region -- Feather Icons

			'twrp-cal-fe-ol'        => array(
				'brand'       => 'Feather',
				'description' => _x( 'Calendar', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-cal-fe-ol" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>',
				'file_name'   => 'outlined.svg',
			),

			#endregion -- Feather Icons

			#region -- Jam Icons

			'twrp-cal-jam-f'        => array(
				'brand'       => 'JamIcons',
				'description' => _x( 'Calendar', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-cal-jam-f" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M4.3,4.5v2.3c0,1.3,1,2.3,2.2,2.3s2.2-1,2.2-2.3V4.5h6.6v2.3c0,1.3,1,2.3,2.2,2.3s2.2-1,2.2-2.3V4.5C21.5,4.5,23,6,23,7.9v2.3H1V7.9C1,6,2.5,4.5,4.3,4.5z M23,12.6v6.9c0,1.9-1.5,3.5-3.3,3.5H4.3C2.5,23,1,21.4,1,19.5v-6.9H23z M17.5,1c0.6,0,1.1,0.5,1.1,1.2v4.6c0,0.6-0.5,1.2-1.1,1.2s-1.1-0.5-1.1-1.2V2.2C16.4,1.5,16.9,1,17.5,1z M6.5,1c0.6,0,1.1,0.5,1.1,1.2v4.6c0,0.6-0.5,1.2-1.1,1.2S5.4,7.4,5.4,6.8V2.2C5.4,1.5,5.9,1,6.5,1z"/></svg>',
				'file_name'   => 'filled.svg',
			),

			'twrp-cal-jam-ol'       => array(
				'brand'       => 'JamIcons',
				'description' => _x( 'Calendar', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-cal-jam-ol" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20.8,9.6V7.1c0-0.7-0.5-1.2-1.1-1.2h-1.1v1.2c0,0.7-0.5,1.2-1.1,1.2s-1.1-0.5-1.1-1.2V5.9H7.6v1.2c0,0.7-0.5,1.2-1.1,1.2S5.4,7.8,5.4,7.1V5.9H4.3c-0.6,0-1.1,0.5-1.1,1.2v2.4H20.8z M20.8,12H3.2v7.3c0,0.7,0.5,1.2,1.1,1.2h15.4c0.6,0,1.1-0.5,1.1-1.2V12z M18.6,3.4h1.1c1.8,0,3.3,1.6,3.3,3.7v12.2c0,2-1.5,3.7-3.3,3.7H4.3C2.5,23,1,21.4,1,19.3V7.1c0-2,1.5-3.7,3.3-3.7h1.1V2.2C5.4,1.5,5.9,1,6.5,1s1.1,0.5,1.1,1.2v1.2h8.8V2.2c0-0.7,0.5-1.2,1.1-1.2s1.1,0.5,1.1,1.2V3.4z"/></svg>',
				'file_name'   => 'outlined.svg',
			),

			'twrp-cal-jam-2-f'      => array(
				'brand'       => 'JamIcons',
				'description' => _x( 'Calendar 2', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-cal-jam-2-f" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19.7,3.4c1.8,0,3.3,1.6,3.3,3.7v12.2c0,2-1.5,3.7-3.3,3.7H4.3C2.5,23,1,21.4,1,19.3V7.1c0-2,1.5-3.7,3.3-3.7v2.4c0,1.4,1,2.4,2.2,2.4s2.2-1.1,2.2-2.4V3.4h1.1v2.4c0,1.4,1,2.4,2.2,2.4s2.2-1.1,2.2-2.4V3.4h1.1v2.4c0,1.4,1,2.4,2.2,2.4s2.2-1.1,2.2-2.4V3.4z M4.3,10.8v2.4h2.2v-2.4H4.3z M4.3,15.7v2.4h2.2v-2.4H4.3z M17.5,15.7v2.4h2.2v-2.4H17.5z M17.5,10.8v2.4h2.2v-2.4H17.5z M8.7,10.8v2.4h2.2v-2.4H8.7z M13.1,10.8v2.4h2.2v-2.4H13.1z M13.1,15.7v2.4h2.2v-2.4H13.1z M8.7,15.7v2.4h2.2v-2.4H8.7z M6.5,1c0.6,0,1.1,0.5,1.1,1.2v3.7c0,0.7-0.5,1.2-1.1,1.2S5.4,6.6,5.4,5.9V2.2C5.4,1.5,5.9,1,6.5,1z M17.5,1c0.6,0,1.1,0.5,1.1,1.2v3.7c0,0.7-0.5,1.2-1.1,1.2s-1.1-0.5-1.1-1.2V2.2C16.4,1.5,16.9,1,17.5,1z M12,1c0.6,0,1.1,0.5,1.1,1.2v3.7c0,0.7-0.5,1.2-1.1,1.2s-1.1-0.5-1.1-1.2V2.2C10.9,1.5,11.4,1,12,1z"/></svg>',
				'file_name'   => 'alt-filled.svg',
			),

			'twrp-cal-jam-2-ol'     => array(
				'brand'       => 'JamIcons',
				'description' => _x( 'Calendar 2', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-cal-jam-2-ol" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M10.9,3.4V2.2C10.9,1.5,11.4,1,12,1s1.1,0.5,1.1,1.2v1.2h3.3V2.2c0-0.7,0.5-1.2,1.1-1.2s1.1,0.5,1.1,1.2v1.2h1.1c1.8,0,3.3,1.6,3.3,3.7v12.2c0,2-1.5,3.7-3.3,3.7H4.3C2.5,23,1,21.4,1,19.3V7.1c0-2,1.5-3.7,3.3-3.7h1.1V2.2C5.4,1.5,5.9,1,6.5,1s1.1,0.5,1.1,1.2v1.2H10.9z M10.9,5.9H7.6v1.2c0,0.7-0.5,1.2-1.1,1.2S5.4,7.8,5.4,7.1V5.9H4.3c-0.6,0-1.1,0.5-1.1,1.2v12.2c0,0.7,0.5,1.2,1.1,1.2h15.4c0.6,0,1.1-0.5,1.1-1.2V7.1c0-0.7-0.5-1.2-1.1-1.2h-1.1v1.2c0,0.7-0.5,1.2-1.1,1.2s-1.1-0.5-1.1-1.2V5.9h-3.3v1.2c0,0.7-0.5,1.2-1.1,1.2s-1.1-0.5-1.1-1.2V5.9z M4.3,10.8h2.2v2.4H4.3V10.8z M4.3,15.7h2.2v2.4H4.3V15.7z M17.5,15.7h2.2v2.4h-2.2V15.7z M17.5,10.8h2.2v2.4h-2.2V10.8z M8.7,10.8h2.2v2.4H8.7V10.8z M13.1,10.8h2.2v2.4h-2.2V10.8z M13.1,15.7h2.2v2.4h-2.2V15.7z M8.7,15.7h2.2v2.4H8.7V15.7z"/></svg>',
				'file_name'   => 'alt-outlined.svg',
			),

			#endregion -- Jam Icons

			#region -- Octicons Icons

			'twrp-cal-oi-ol'        => array(
				'brand'       => 'Octicons',
				'description' => _x( 'Calendar', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-cal-oi-ol" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M6.75 0a.75.75 0 01.75.75V3h9V.75a.75.75 0 011.5 0V3h2.75c.966 0 1.75.784 1.75 1.75v16a1.75 1.75 0 01-1.75 1.75H3.25a1.75 1.75 0 01-1.75-1.75v-16C1.5 3.784 2.284 3 3.25 3H6V.75A.75.75 0 016.75 0zm-3.5 4.5a.25.25 0 00-.25.25V8h18V4.75a.25.25 0 00-.25-.25H3.25zM21 9.5H3v11.25c0 .138.112.25.25.25h17.5a.25.25 0 00.25-.25V9.5z"></path></svg>',
				'file_name'   => 'outlined.svg',
			),

			#endregion -- Octicons Icons

			#region -- Typicons Icons

			'twrp-cal-ti-f'         => array(
				'brand'       => 'Typicons',
				'description' => _x( 'Calendar', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-cal-ti-f" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20.6,4.9V4.7c0-2-1.6-3.7-3.7-3.7s-3.7,1.6-3.7,3.7h-2.4c0-2-1.6-3.7-3.7-3.7S3.4,2.6,3.4,4.7v0.2C2,5.4,1,6.7,1,8.3v11c0,2,1.6,3.7,3.7,3.7h14.7c2,0,3.7-1.6,3.7-3.7v-11C23,6.7,22,5.4,20.6,4.9z M15.7,4.7c0-0.7,0.5-1.2,1.2-1.2s1.2,0.5,1.2,1.2v2.4c0,0.7-0.5,1.2-1.2,1.2s-1.2-0.5-1.2-1.2V4.7z M5.9,4.7c0-0.7,0.5-1.2,1.2-1.2c0.7,0,1.2,0.5,1.2,1.2v2.4c0,0.7-0.5,1.2-1.2,1.2S5.9,7.8,5.9,7.1V4.7z M20.6,19.3c0,0.7-0.5,1.2-1.2,1.2H4.7c-0.7,0-1.2-0.5-1.2-1.2V12h17.1V19.3z"/></svg>',
				'file_name'   => 'filled.svg',
			),

			'twrp-cal-ti-ol'        => array(
				'brand'       => 'Typicons',
				'description' => _x( 'Calendar', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-cal-ti-ol" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20.6,4.9V4.7c0-2-1.6-3.7-3.7-3.7s-3.7,1.6-3.7,3.7h-2.4c0-2-1.6-3.7-3.7-3.7S3.4,2.6,3.4,4.7v0.2C2,5.4,1,6.7,1,8.3v11c0,2,1.6,3.7,3.7,3.7h14.7c2,0,3.7-1.6,3.7-3.7v-11C23,6.7,22,5.4,20.6,4.9z M15.7,4.7c0-0.7,0.5-1.2,1.2-1.2s1.2,0.5,1.2,1.2v2.4c0,0.7-0.5,1.2-1.2,1.2s-1.2-0.5-1.2-1.2V4.7z M5.9,4.7c0-0.7,0.5-1.2,1.2-1.2c0.7,0,1.2,0.5,1.2,1.2v2.4c0,0.7-0.5,1.2-1.2,1.2S5.9,7.8,5.9,7.1V4.7z M20.6,19.3c0,0.7-0.5,1.2-1.2,1.2H4.7c-0.7,0-1.2-0.5-1.2-1.2V12h17.1V19.3z M20.6,10.8H3.4V8.3c0-0.7,0.5-1.2,1.2-1.2c0,1.3,1.1,2.4,2.4,2.4s2.4-1.1,2.4-2.4h4.9c0,1.3,1.1,2.4,2.4,2.4s2.4-1.1,2.4-2.4c0.7,0,1.2,0.5,1.2,1.2V10.8z"/></svg>',
				'file_name'   => 'outlined.svg',
			),

			#endregion -- Typicons Icons

		);

		return $registered_date_vectors;
	}

}
