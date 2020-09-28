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

			#region -- FontAwesome Icons

			'twrp-views-fa-s'         => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'Eye', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-views-fa-s" viewBox="0 0 576 512"><path d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z"></path></svg>',
				'file_name'   => 'eye-filled.svg',
			),

			'twrp-views-fa-ol'        => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'Eye', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-views-fa-ol" viewBox="0 0 576 512"><path d="M288 144a110.94 110.94 0 0 0-31.24 5 55.4 55.4 0 0 1 7.24 27 56 56 0 0 1-56 56 55.4 55.4 0 0 1-27-7.24A111.71 111.71 0 1 0 288 144zm284.52 97.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400c-98.65 0-189.09-55-237.93-144C98.91 167 189.34 112 288 112s189.09 55 237.93 144C477.1 345 386.66 400 288 400z"></path></svg>',
				'file_name'   => 'eye-outlined.svg',
			),

			'twrp-views-fa-chart-s'   => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'Chart', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-views-fa-chart-s" viewBox="0 0 576 512"><path d="M332.8 320h38.4c6.4 0 12.8-6.4 12.8-12.8V172.8c0-6.4-6.4-12.8-12.8-12.8h-38.4c-6.4 0-12.8 6.4-12.8 12.8v134.4c0 6.4 6.4 12.8 12.8 12.8zm96 0h38.4c6.4 0 12.8-6.4 12.8-12.8V76.8c0-6.4-6.4-12.8-12.8-12.8h-38.4c-6.4 0-12.8 6.4-12.8 12.8v230.4c0 6.4 6.4 12.8 12.8 12.8zm-288 0h38.4c6.4 0 12.8-6.4 12.8-12.8v-70.4c0-6.4-6.4-12.8-12.8-12.8h-38.4c-6.4 0-12.8 6.4-12.8 12.8v70.4c0 6.4 6.4 12.8 12.8 12.8zm96 0h38.4c6.4 0 12.8-6.4 12.8-12.8V108.8c0-6.4-6.4-12.8-12.8-12.8h-38.4c-6.4 0-12.8 6.4-12.8 12.8v198.4c0 6.4 6.4 12.8 12.8 12.8zM496 384H64V80c0-8.84-7.16-16-16-16H16C7.16 64 0 71.16 0 80v336c0 17.67 14.33 32 32 32h464c8.84 0 16-7.16 16-16v-32c0-8.84-7.16-16-16-16z"></path></svg>',
				'file_name'   => 'chart-filled.svg',
			),

			'twrp-views-fa-chart-ol'  => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'Chart', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-views-fa-chart-ol" viewBox="0 0 576 512"><path d="M396.8 352h22.4c6.4 0 12.8-6.4 12.8-12.8V108.8c0-6.4-6.4-12.8-12.8-12.8h-22.4c-6.4 0-12.8 6.4-12.8 12.8v230.4c0 6.4 6.4 12.8 12.8 12.8zm-192 0h22.4c6.4 0 12.8-6.4 12.8-12.8V140.8c0-6.4-6.4-12.8-12.8-12.8h-22.4c-6.4 0-12.8 6.4-12.8 12.8v198.4c0 6.4 6.4 12.8 12.8 12.8zm96 0h22.4c6.4 0 12.8-6.4 12.8-12.8V204.8c0-6.4-6.4-12.8-12.8-12.8h-22.4c-6.4 0-12.8 6.4-12.8 12.8v134.4c0 6.4 6.4 12.8 12.8 12.8zM496 400H48V80c0-8.84-7.16-16-16-16H16C7.16 64 0 71.16 0 80v336c0 17.67 14.33 32 32 32h464c8.84 0 16-7.16 16-16v-16c0-8.84-7.16-16-16-16zm-387.2-48h22.4c6.4 0 12.8-6.4 12.8-12.8v-70.4c0-6.4-6.4-12.8-12.8-12.8h-22.4c-6.4 0-12.8 6.4-12.8 12.8v70.4c0 6.4 6.4 12.8 12.8 12.8z"></path></svg>',
				'file_name'   => 'chart-outlined.svg',
			),

			#endregion -- FontAwesome Icons

			#region -- Google Icons

			'twrp-views-goo-f'        => array(
				'brand'       => 'Google',
				'description' => _x( 'Eye', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-views-goo-f" viewBox="0 0 24 24"><path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/></svg>',
				'file_name'   => 'eye-filled.svg',
			),

			'twrp-views-goo-ol'       => array(
				'brand'       => 'Google',
				'description' => _x( 'Eye', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-views-goo-ol" viewBox="0 0 24 24"><path d="M12 6c3.79 0 7.17 2.13 8.82 5.5C19.17 14.87 15.79 17 12 17s-7.17-2.13-8.82-5.5C4.83 8.13 8.21 6 12 6m0-2C7 4 2.73 7.11 1 11.5 2.73 15.89 7 19 12 19s9.27-3.11 11-7.5C21.27 7.11 17 4 12 4zm0 5c1.38 0 2.5 1.12 2.5 2.5S13.38 14 12 14s-2.5-1.12-2.5-2.5S10.62 9 12 9m0-2c-2.48 0-4.5 2.02-4.5 4.5S9.52 16 12 16s4.5-2.02 4.5-4.5S14.48 7 12 7z"/></svg>',
				'file_name'   => 'eye-outlined.svg',
			),

			'twrp-views-goo-dt'       => array(
				'brand'       => 'Google',
				'description' => _x( 'Eye', 'backend', 'twrp' ),
				'type'        => _x( 'TwoTone', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-views-goo-dt" viewBox="0 0 24 24"><path d="M12 6c-3.79 0-7.17 2.13-8.82 5.5C4.83 14.87 8.21 17 12 17s7.17-2.13 8.82-5.5C19.17 8.13 15.79 6 12 6zm0 10c-2.48 0-4.5-2.02-4.5-4.5S9.52 7 12 7s4.5 2.02 4.5 4.5S14.48 16 12 16z" opacity=".3"/><path d="M12 4C7 4 2.73 7.11 1 11.5 2.73 15.89 7 19 12 19s9.27-3.11 11-7.5C21.27 7.11 17 4 12 4zm0 13c-3.79 0-7.17-2.13-8.82-5.5C4.83 8.13 8.21 6 12 6s7.17 2.13 8.82 5.5C19.17 14.87 15.79 17 12 17zm0-10c-2.48 0-4.5 2.02-4.5 4.5S9.52 16 12 16s4.5-2.02 4.5-4.5S14.48 7 12 7zm0 7c-1.38 0-2.5-1.12-2.5-2.5S10.62 9 12 9s2.5 1.12 2.5 2.5S13.38 14 12 14z"/></svg>',
				'file_name'   => 'eye-twotone.svg',
			),

			'twrp-views-goo-line-f'   => array(
				'brand'       => 'Google',
				'description' => _x( 'Chart', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-views-goo-line-f" viewBox="0 0 24 24"><path d="M3.5 18.49l6-6.01 4 4L22 6.92l-1.41-1.41-7.09 7.97-4-4L2 16.99z"/></svg>',
				'file_name'   => 'chart-filled.svg',
			),

			'twrp-views-goo-chart-f'  => array(
				'brand'       => 'Google',
				'description' => _x( 'Bar Chart', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-views-goo-chart-f" viewBox="0 0 24 24"><path d="M2,8h4.3v14H2V8z M10,2h4V22h-4V2z M18,13.4h4V22h-4V13.4z"/></svg>',
				'file_name'   => 'bar-chart-filled.svg',
			),

			'twrp-views-goo-chart2-f' => array(
				'brand'       => 'Google',
				'description' => _x( 'Bar Chart', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-views-goo-chart2-f" viewBox="0 0 24 24"><path d="M4,8h0.3c1.1,0,2,0.9,2,2v10c0,1.1-0.9,2-2,2H4c-1.1,0-2-0.9-2-2V10C2,8.9,2.9,8,4,8z M12,2c1.1,0,2,0.9,2,2V20c0,1.1-0.9,2-2,2c-1.1,0-2-0.9-2-2V4C10,2.9,10.9,2,12,2z M20,13.4c1.1,0,2,0.9,2,2V20c0,1.1-0.9,2-2,2s-2-0.9-2-2v-4.6C18,14.3,18.9,13.4,20,13.4z"/></svg>',
				'file_name'   => 'bar-chart-2-filled.svg',
			),

			#endregion -- Google Icons

			#region -- Dashicons

			'twrp-views-di-f'         => array(
				'brand'       => 'Dashicons',
				'description' => _x( 'Eye', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-views-di-f" viewBox="0 0 20 20"><path d="M19.1,8.7C15.5,3.7,8.4,2.5,3.3,6.2C2,7.2,0.9,8.5,0,10c0.2,0.4,0.5,0.9,0.9,1.3c3.6,5.1,10.5,6.2,15.6,2.6c1-0.8,1.9-1.5,2.6-2.6c0.3-0.4,0.5-0.9,0.9-1.3C19.7,9.5,19.5,9.1,19.1,8.7z M10.1,6.2c0.5-0.5,1.4-0.5,2,0c0.5,0.5,0.5,1.4,0,2c-0.5,0.5-1.4,0.5-2,0C9.6,7.6,9.6,6.8,10.1,6.2z M10,14.7c-3.4,0-6.6-1.8-8.5-4.6c1.3-1.9,3.1-3.2,5.2-3.8c-0.8,0.9-1.1,1.9-1.1,3c0,2.4,1.9,4.5,4.4,4.5c2.4,0,4.5-1.9,4.5-4.4V9.2c0-1.1-0.4-2.2-1.2-3c2.1,0.7,3.8,2,5.2,3.8C16.6,12.9,13.4,14.7,10,14.7z"/></svg>',
				'file_name'   => 'eye-outlined.svg',
			),

			'twrp-views-di-c-f'       => array(
				'brand'       => 'Dashicons',
				'description' => _x( 'Chart', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-views-di-c-f" viewBox="0 0 20 20"><path d="M20,20V0h-5v20H20z M12.5,20V6.3h-5V20H12.5z M5,20V10H0v10H5z"/></svg>',
				'file_name'   => 'chart-filled.svg',
			),

			#endregion -- Dashicons

			#region -- Foundation Icons

			'twrp-views-fi-f'         => array(
				'brand'       => 'Foundation',
				'description' => _x( 'Eye', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-views-fi-f" viewBox="0 0 100 100"><path d="M95.6,46.9L73.4,24.8l-0.2,0.2c-6.1-5.7-14.3-9.2-23.4-9.2c-10.2,0-19.3,4.4-25.6,11.4L3.7,47.7l0,0c-0.5,0.6-0.9,1.4-0.9,2.3c0,1.1,0.5,2.1,1.3,2.7l22.3,22.3l0,0c6.1,5.7,14.3,9.1,23.3,9.1c10.1,0,19.3-4.4,25.5-11.4l0.1,0.1L96,52.5c0.1-0.1,0.2-0.2,0.2-0.2l0,0l0,0c0.6-0.6,0.9-1.5,0.9-2.4C97.1,48.6,96.5,47.6,95.6,46.9z M49.9,73.2c-12.8,0-23.2-10.4-23.2-23.2c0-12.8,10.4-23.2,23.2-23.2S73.1,37.2,73.1,50C73.1,62.8,62.7,73.2,49.9,73.2z"/><circle cx="50" cy="50.1" r="11.3"/></svg>',
				'file_name'   => 'eye-filled.svg',
			),

			'twrp-views-fi-chart-f'   => array(
				'brand'       => 'Foundation',
				'description' => _x( 'Chart', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-views-fi-chart-f" viewBox="0 0 100 100"><path d="M46.05,60.163H31.923c-0.836,0-1.513,0.677-1.513,1.513v21.934c0,0.836,0.677,1.513,1.513,1.513H46.05 c0.836,0,1.512-0.677,1.512-1.513V61.675C47.562,60.839,46.885,60.163,46.05,60.163z"/><path d="M68.077,14.878H53.95c-0.836,0-1.513,0.677-1.513,1.513v67.218c0,0.836,0.677,1.513,1.513,1.513h14.127 c0.836,0,1.513-0.677,1.513-1.513V16.391C69.59,15.555,68.913,14.878,68.077,14.878z"/><path d="M90.217,35.299H76.09c-0.836,0-1.513,0.677-1.513,1.513v46.797c0,0.836,0.677,1.513,1.513,1.513h14.126 c0.836,0,1.513-0.677,1.513-1.513V36.812C91.729,35.977,91.052,35.299,90.217,35.299z"/><path d="M23.91,35.299H9.783c-0.836,0-1.513,0.677-1.513,1.513v46.797c0,0.836,0.677,1.513,1.513,1.513H23.91 c0.836,0,1.513-0.677,1.513-1.513V36.812C25.423,35.977,24.746,35.299,23.91,35.299z"/></svg>',
				'file_name'   => 'chart-filled.svg',
				'fix_classes' => 'twrp-i--va-1',
			),

			#endregion -- Foundation Icons

			#region -- Ionicons Icons

			'twrp-views-ii-f'         => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Eye', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-views-ii-f" viewBox="0 0 512 512"><circle cx="256" cy="256" r="64"/><path d="M490.84,238.6c-26.46-40.92-60.79-75.68-99.27-100.53C349,110.55,302,96,255.66,96c-42.52,0-84.33,12.15-124.27,36.11C90.66,156.54,53.76,192.23,21.71,238.18a31.92,31.92,0,0,0-.64,35.54c26.41,41.33,60.4,76.14,98.28,100.65C162,402,207.9,416,255.66,416c46.71,0,93.81-14.43,136.2-41.72,38.46-24.77,72.72-59.66,99.08-100.92A32.2,32.2,0,0,0,490.84,238.6ZM256,352a96,96,0,1,1,96-96A96.11,96.11,0,0,1,256,352Z"/></svg>',
				'file_name'   => 'eye-filled.svg',
			),

			'twrp-views-ii-ol'        => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Eye', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-views-ii-ol" viewBox="0 0 512 512"><path d="M255.66,112c-77.94,0-157.89,45.11-220.83,135.33a16,16,0,0,0-.27,17.77C82.92,340.8,161.8,400,255.66,400,348.5,400,429,340.62,477.45,264.75a16.14,16.14,0,0,0,0-17.47C428.89,172.28,347.8,112,255.66,112Z" style="fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"/><circle cx="256" cy="256" r="80" style="fill:none;stroke:currentColor;stroke-miterlimit:10;stroke-width:32px"/></svg>',
				'file_name'   => 'eye-outlined.svg',
			),

			'twrp-views-ii-ios-f'     => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Ios Eye', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-views-ii-ios-f" viewBox="0 0 512 512"><path d="M504.4,256.3C445.5,188.4,364.2,110.4,256,110.4c-43.7,0-83.7,12.3-126,38.7C94.4,171.5,57.9,203,7.7,254.7L6.4,256l8.7,9C86.7,338.3,148.6,401.6,256,401.6c47.5,0,93.5-15.5,140.7-47.3c40.2-27.2,74.4-61.6,101.8-89.4l7.1-7.2L504.4,256.3z M256,360c-57.3,0-104-46.7-104-104s46.7-104,104-104s104,46.7,104,104S313.3,360,256,360z"/><path d="M248.7,218c0-9,2.6-17.4,7.2-24.4c-34.4,0-62.3,28.1-62.3,62.7s27.9,62.5,62.3,62.5s62.4-28,62.4-62.5l0,0c-7,4.6-15.5,7.1-24.4,7.1C269,263.3,248.7,243,248.7,218z"/></svg>',
				'file_name'   => 'ios-eye-filled.svg',
			),

			'twrp-views-ii-ios-ol'    => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Ios Eye', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-views-ii-ios-ol" viewBox="0 0 512 512"><path d="M504.4,256.3C445.5,188.4,364.2,110.4,256,110.4c-43.7,0-83.7,12.3-126,38.7C94.4,171.5,57.9,203,7.7,254.7L6.4,256l8.7,9C86.7,338.3,148.6,401.6,256,401.6c47.5,0,93.5-15.5,140.7-47.3c40.2-27.2,74.4-61.6,101.8-89.4l7.1-7.2L504.4,256.3z M256,131.2c43,0,84.4,12.4,126.4,39.8c31.1,20.3,61.6,47.7,95.8,85.9C428.4,307.2,353.6,380.8,256,380.8c-44.5,0-83.5-10.9-122.5-36.7c-35.8-23.5-68-56.3-99.1-88.1C111.3,178.4,175.4,131.2,256,131.2z"/><path d="M256,360c57.3,0,104-46.7,104-104s-46.7-104-104-104s-104,46.7-104,104S198.7,360,256,360z M256,173.2c45.8,0,83.2,37.2,83.2,82.8s-37.4,82.8-83.2,82.8s-83.1-37.2-83.1-82.8S210.2,173.2,256,173.2z"/><path d="M297.6,256L297.6,256c0,22.8-18.7,41.6-41.3,41.6s-41.9-19.8-41.9-42.5c0-22.7,20.5-40.7,41.6-40.7v-20.8c-34.4,0-62.3,28.1-62.3,62.7s27.9,62.5,62.3,62.5s62.4-28.1,62.4-62.5V256H297.6z"/></svg>',
				'file_name'   => 'ios-eye-outlined.svg',
			),

			'twrp-views-ii-chart-f'   => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Chart', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-views-ii-chart-f" viewBox="0 0 512 512"><path d="M480,496H48a32,32,0,0,1-32-32V32a16,16,0,0,1,32,0V464H480a16,16,0,0,1,0,32Z"/><path d="M156,432H116a36,36,0,0,1-36-36V244a36,36,0,0,1,36-36h40a36,36,0,0,1,36,36V396A36,36,0,0,1,156,432Z"/><path d="M300,432H260a36,36,0,0,1-36-36V196a36,36,0,0,1,36-36h40a36,36,0,0,1,36,36V396A36,36,0,0,1,300,432Z"/><path d="M443.64,432h-40a36,36,0,0,1-36-36V132a36,36,0,0,1,36-36h40a36,36,0,0,1,36,36V396A36,36,0,0,1,443.64,432Z"/></svg>',
				'file_name'   => 'chart-filled.svg',
				'fix_classes' => 'twrp-i--va-1',
			),

			'twrp-views-ii-chart-ol'  => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Chart', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-views-ii-chart-ol" viewBox="0 0 512 512"><path d="M32,32V464a16,16,0,0,0,16,16H480" style="fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"/><rect x="96" y="224" width="80" height="192" rx="20" ry="20" style="fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"/><rect x="240" y="176" width="80" height="240" rx="20" ry="20" style="fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"/><rect x="383.64" y="112" width="80" height="304" rx="20" ry="20" style="fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"/></svg>',
				'file_name'   => 'chart-outlined.svg',
				'fix_classes' => 'twrp-i--va-1',
			),

			'twrp-views-ii-chart-sh'  => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Chart', 'backend', 'twrp' ),
				'type'        => _x( 'Sharp', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-views-ii-chart-sh" viewBox="0 0 512 512"><polygon points="496 496 16 496 16 16 48 16 48 464 496 464 496 496"/><path d="M192,432H80V208H192Z"/><path d="M336,432H224V160H336Z"/><path d="M479.64,432h-112V96h112Z"/></svg>',
				'file_name'   => 'chart-sharp.svg',
				'fix_classes' => 'twrp-i--va-1',
			),

			#endregion -- Ionicons Icons

			#region -- IconMonstr Icons

			'twrp-views-im-f'         => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Eye', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-views-im-f" viewBox="0 0 24 24"><path d="M15 12c0 1.657-1.343 3-3 3s-3-1.343-3-3c0-.199.02-.393.057-.581 1.474.541 2.927-.882 2.405-2.371.174-.03.354-.048.538-.048 1.657 0 3 1.344 3 3zm-2.985-7c-7.569 0-12.015 6.551-12.015 6.551s4.835 7.449 12.015 7.449c7.733 0 11.985-7.449 11.985-7.449s-4.291-6.551-11.985-6.551zm-.015 12c-2.761 0-5-2.238-5-5 0-2.761 2.239-5 5-5 2.762 0 5 2.239 5 5 0 2.762-2.238 5-5 5z"/></svg>',
				'file_name'   => 'eye-filled.svg',
			),

			'twrp-views-im-ol'        => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Eye', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-views-im-ol" viewBox="0 0 24 24"><path d="M12.015 7c4.751 0 8.063 3.012 9.504 4.636-1.401 1.837-4.713 5.364-9.504 5.364-4.42 0-7.93-3.536-9.478-5.407 1.493-1.647 4.817-4.593 9.478-4.593zm0-2c-7.569 0-12.015 6.551-12.015 6.551s4.835 7.449 12.015 7.449c7.733 0 11.985-7.449 11.985-7.449s-4.291-6.551-11.985-6.551zm-.015 3c-2.21 0-4 1.791-4 4s1.79 4 4 4c2.209 0 4-1.791 4-4s-1.791-4-4-4zm-.004 3.999c-.564.564-1.479.564-2.044 0s-.565-1.48 0-2.044c.564-.564 1.479-.564 2.044 0s.565 1.479 0 2.044z"/></svg>',
				'file_name'   => 'eye-outlined.svg',
			),

			'twrp-views-im-t'         => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Eye', 'backend', 'twrp' ),
				'type'        => _x( 'Thin', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-views-im-t" viewBox="0 0 24 24" fill-rule="evenodd" clip-rule="evenodd"><path d="M12.01 20c-5.065 0-9.586-4.211-12.01-8.424 2.418-4.103 6.943-7.576 12.01-7.576 5.135 0 9.635 3.453 11.999 7.564-2.241 4.43-6.726 8.436-11.999 8.436zm-10.842-8.416c.843 1.331 5.018 7.416 10.842 7.416 6.305 0 10.112-6.103 10.851-7.405-.772-1.198-4.606-6.595-10.851-6.595-6.116 0-10.025 5.355-10.842 6.584zm10.832-4.584c2.76 0 5 2.24 5 5s-2.24 5-5 5-5-2.24-5-5 2.24-5 5-5zm0 1c2.208 0 4 1.792 4 4s-1.792 4-4 4-4-1.792-4-4 1.792-4 4-4z"/></svg>',
				'file_name'   => 'eye-thin.svg',
			),

			'twrp-views-im-2-f'       => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Eye 2', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-views-im-2-f" viewBox="0 0 24 24"><path d="M14 12c0 1.103-.897 2-2 2s-2-.897-2-2 .897-2 2-2 2 .897 2 2zm10-.449s-4.252 7.449-11.985 7.449c-7.18 0-12.015-7.449-12.015-7.449s4.446-6.551 12.015-6.551c7.694 0 11.985 6.551 11.985 6.551zm-8 .449c0-2.208-1.791-4-4-4-2.208 0-4 1.792-4 4 0 2.209 1.792 4 4 4 2.209 0 4-1.791 4-4z"/></svg>',
				'file_name'   => 'eye2-filled.svg',
			),

			'twrp-views-im-2-ol'      => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Eye 2', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-views-im-2-ol" viewBox="0 0 24 24"><path d="M12.015 7c4.751 0 8.063 3.012 9.504 4.636-1.401 1.837-4.713 5.364-9.504 5.364-4.42 0-7.93-3.536-9.478-5.407 1.493-1.647 4.817-4.593 9.478-4.593zm0-2c-7.569 0-12.015 6.551-12.015 6.551s4.835 7.449 12.015 7.449c7.733 0 11.985-7.449 11.985-7.449s-4.291-6.551-11.985-6.551zm-.015 7l-3.36-2.171c-.405.625-.64 1.371-.64 2.171 0 2.209 1.791 4 4 4s4-1.791 4-4-1.791-4-4-4c-.742 0-1.438.202-2.033.554l2.033 3.446z"/></svg>',
				'file_name'   => 'eye2-outlined.svg',
			),

			'twrp-views-im-3-f'       => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Eye 3', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-views-im-3-f" viewBox="0 0 24 24"><path d="M15 12c0 1.654-1.346 3-3 3s-3-1.346-3-3 1.346-3 3-3 3 1.346 3 3zm9-.449s-4.252 8.449-11.985 8.449c-7.18 0-12.015-8.449-12.015-8.449s4.446-7.551 12.015-7.551c7.694 0 11.985 7.551 11.985 7.551zm-7 .449c0-2.757-2.243-5-5-5s-5 2.243-5 5 2.243 5 5 5 5-2.243 5-5z"/></svg>',
				'file_name'   => 'eye3-filled.svg',
			),

			'twrp-views-im-3-ol'      => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Eye 3', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-views-im-3-ol" viewBox="0 0 24 24"><path d="M12.015 7c4.751 0 8.063 3.012 9.504 4.636-1.401 1.837-4.713 5.364-9.504 5.364-4.42 0-7.93-3.536-9.478-5.407 1.493-1.647 4.817-4.593 9.478-4.593zm0-2c-7.569 0-12.015 6.551-12.015 6.551s4.835 7.449 12.015 7.449c7.733 0 11.985-7.449 11.985-7.449s-4.291-6.551-11.985-6.551zm-.015 3c-2.209 0-4 1.792-4 4 0 2.209 1.791 4 4 4s4-1.791 4-4c0-2.208-1.791-4-4-4z"/></svg>',
				'file_name'   => 'eye3-outlined.svg',
			),

			'twrp-views-im-4-ol'      => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Eye 4', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-views-im-4-ol" viewBox="0 0 24 24"><path d="M12.015 7c4.751 0 8.063 3.012 9.504 4.636-1.401 1.837-4.713 5.364-9.504 5.364-4.42 0-7.93-3.536-9.478-5.407 1.493-1.647 4.817-4.593 9.478-4.593zm0-2c-7.569 0-12.015 6.551-12.015 6.551s4.835 7.449 12.015 7.449c7.733 0 11.985-7.449 11.985-7.449s-4.291-6.551-11.985-6.551zm-.015 5c1.103 0 2 .897 2 2s-.897 2-2 2-2-.897-2-2 .897-2 2-2zm0-2c-2.209 0-4 1.792-4 4 0 2.209 1.791 4 4 4s4-1.791 4-4c0-2.208-1.791-4-4-4z"/></svg>',
				'file_name'   => 'eye4-outlined.svg',
			),

			'twrp-views-im-chart-f'   => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Chart', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-views-im-chart-f" viewBox="0 0 24 24"><path d="M5 19h-4v-4h4v4zm6 0h-4v-8h4v8zm6 0h-4v-13h4v13zm6 0h-4v-19h4v19zm1 2h-24v2h24v-2z"/></svg>',
				'file_name'   => 'chart-filled.svg',
			),

			'twrp-views-im-chart-ol'  => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Chart', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-views-im-chart-ol" viewBox="0 0 24 24" fill-rule="evenodd" clip-rule="evenodd"><path d="M0 22h1v-5h4v5h2v-10h4v10h2v-15h4v15h2v-21h4v21h1v1h-24v-1zm4-4h-2v4h2v-4zm6-5h-2v9h2v-9zm6-5h-2v14h2v-14zm6-6h-2v20h2v-20z"/></svg>',
				'file_name'   => 'chart-outlined.svg',
			),

			'twrp-views-im-chart2-f'  => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Chart 2', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-views-im-chart2-f" viewBox="0 0 24 24"><path d="M7 19h-6v-11h6v11zm8-18h-6v18h6v-18zm8 11h-6v7h6v-7zm1 9h-24v2h24v-2z"/></svg>',
				'file_name'   => 'chart2-filled.svg',
			),

			'twrp-views-im-chart2-ol' => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Chart 2', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-views-im-chart2-ol" viewBox="0 0 24 24"><path d="M5 9v8h-2v-8h2zm2-2h-6v12h6v-12zm6-4v14h-2v-14h2zm2-2h-6v18h6v-18zm6 13v3h-2v-3h2zm2-2h-6v7h6v-7zm1 9h-24v2h24v-2z"/></svg>',
				'file_name'   => 'chart2-outlined.svg',
			),

			'twrp-views-im-chart3-f'  => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Chart 3', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-views-im-chart3-f" viewBox="0 0 24 24"><path d="M7 24h-6v-6h6v6zm8-9h-6v9h6v-9zm8-4h-6v13h6v-13zm0-11l-6 1.221 1.716 1.708-6.85 6.733-3.001-3.002-7.841 7.797 1.41 1.418 6.427-6.39 2.991 2.993 8.28-8.137 1.667 1.66 1.201-6.001z"/></svg>',
				'file_name'   => 'chart3-filled.svg',
				'fix_classes' => 'twrp-i--va-1',
			),

			'twrp-views-im-chart3-ol' => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Chart 3', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-views-im-chart3-ol" viewBox="0 0 24 24"><path d="M5 20v2h-2v-2h2zm2-2h-6v6h6v-6zm6-1v5h-2v-5h2zm2-2h-6v9h6v-9zm6-2v9h-2v-9h2zm2-2h-6v13h6v-13zm0-11l-6 1.221 1.716 1.708-6.85 6.733-3.001-3.002-7.841 7.797 1.41 1.418 6.427-6.39 2.991 2.993 8.28-8.137 1.667 1.66 1.201-6.001z"/></svg>',
				'file_name'   => 'chart3-outlined.svg',
				'fix_classes' => 'twrp-i--va-1',
			),

			#endregion -- IconMonstr Icons

			#region -- Capicon Icons

			'twrp-views-ci-f'         => array(
				'brand'       => 'Capicon',
				'description' => _x( 'Eye', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-views-ci-f" viewBox="0 -2.803 32 32"><path d="M17.891,0.004C9.404-0.247,0,12.042,0,14.169c0,1.937,9.256,12.462,17.833,12.22C25.146,26.181,31.998,15.585,32,14.169C32,12.604,28.357,0.314,17.891,0.004z M22.255,9.611c-0.965,1.806-2.937,2.633-4.399,1.85c-1.463-0.782-1.87-2.883-0.902-4.688c0.346-0.646,0.82-1.165,1.355-1.53c1.582,0.01,2.969,0.366,4.18,0.932C22.93,7.151,22.882,8.442,22.255,9.611z M17.904,22.761c-6.593,0.293-13.672-7.746-13.672-8.479c0-1.087,3.4-4.457,7.645-6.972c-2.03,3.944-1.126,8.479,2.064,10.187c3.229,1.728,7.573-0.099,9.702-4.075c1.041-1.947,1.354-4.052,1.026-5.895c3.136,2.492,4.617,5.668,4.562,6.416C29.173,14.771,23.755,22.502,17.904,22.761z"/></svg>',
				'file_name'   => 'eye-filled.svg',
			),

			'twrp-views-ci-chart2-f'  => array(
				'brand'       => 'Capicon',
				'description' => _x( 'Chart', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-views-ci-chart2-f" viewBox="0 0 32 30.146"><path d="M0.265,23.555c-0.387,0.211-0.316,5.901,0,6.323s6.009,0.281,6.325,0c0.316-0.279,0.246-5.901,0-6.323C6.344,23.133,0.651,23.344,0.265,23.555z"/><path d="M8.698,15.292c-0.316,0.287-0.316,13.8,0,14.375c0.316,0.576,6.009,0.288,6.326,0c0.316-0.287,0.246-13.896,0-14.375C14.778,14.813,9.015,15.004,8.698,15.292z"/><path d="M17.132,5.537c-0.315,0.461-0.315,23.645,0,24.219c0.316,0.577,5.938,0.462,6.325,0c0.387-0.461,0.176-23.643,0-24.219S17.449,5.075,17.132,5.537z"/><path d="M31.893,0.211c-0.142-0.229-5.938-0.327-6.326,0c-0.387,0.328-0.256,29.067,0,29.533c0.254,0.465,6.177,0.191,6.326,0C32.041,29.552,32.032,0.444,31.893,0.211z"/></svg>',
				'file_name'   => 'chart2-filled.svg',
				'fix_classes' => 'twrp-i--va-1',
			),

			'twrp-views-ci-chart-f'   => array(
				'brand'       => 'Capicon',
				'description' => _x( 'Chart 2', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-views-ci-chart-f" viewBox="0 0 32 25"><path d="M0.265,18.408c-0.387,0.211-0.316,5.902,0,6.324s6.009,0.281,6.325,0c0.316-0.28,0.246-5.902,0-6.324C6.344,17.986,0.651,18.197,0.265,18.408z"/><path d="M8.698,10.146c-0.316,0.287-0.316,13.799,0,14.375c0.316,0.576,6.009,0.287,6.326,0c0.316-0.287,0.246-13.896,0-14.375C14.778,9.666,9.015,9.857,8.698,10.146z"/><path d="M25.463,10.146c-0.316,0.287-0.316,13.799,0,14.375s6.01,0.287,6.326,0s0.246-13.896,0-14.375C31.542,9.666,25.779,9.857,25.463,10.146z"/><path d="M17.132,0.391c-0.315,0.461-0.315,23.643,0,24.218c0.316,0.578,5.938,0.463,6.325,0c0.387-0.461,0.176-23.644,0-24.218C23.281-0.185,17.449-0.071,17.132,0.391z"/></svg>',
				'file_name'   => 'chart-filled.svg',
				'fix_classes' => 'twrp-i--va-1',
			),

			#endregion -- Capicon Icons

			#region -- Feather Icons

			'twrp-views-fe-ol'        => array(
				'brand'       => 'Feather',
				'description' => _x( 'Eye', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-views-fe-ol" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>',
				'file_name'   => 'eye-outlined.svg',
			),

			'twrp-views-fe-chart-ol'  => array(
				'brand'       => 'Feather',
				'description' => _x( 'Chart', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-views-fe-chart-ol" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>',
				'file_name'   => 'chart-outlined.svg',
			),

			'twrp-views-fe-chart2-ol' => array(
				'brand'       => 'Feather',
				'description' => _x( 'Chart 2', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-views-fe-chart2-ol" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="20" x2="12" y2="10"></line><line x1="18" y1="20" x2="18" y2="4"></line><line x1="6" y1="20" x2="6" y2="16"></line></svg>',
				'file_name'   => 'chart2-outlined.svg',
			),

			#endregion -- Feather Icons

			#region -- Jam Icons

			'twrp-views-ji-f'         => array(
				'brand'       => 'JamIcons',
				'description' => _x( 'Eye', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-views-ji-f" viewBox="-2 -6 24 24"><path d="M10 12c-5.042.007-10-2.686-10-6S4.984-.017 10 0c5.016.017 10 2.686 10 6s-4.958 5.993-10 6zm0-2a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm0-2a2 2 0 1 1 0-4 2 2 0 0 1 0 4z" /></svg>',
				'file_name'   => 'eye-filled.svg',
			),

			'twrp-views-ji-ol'        => array(
				'brand'       => 'JamIcons',
				'description' => _x( 'Eye', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-views-ji-ol" viewBox="-2 -6 24 24"><path d="M18 6c0-1.81-3.76-3.985-8.007-4C5.775 1.985 2 4.178 2 6c0 1.825 3.754 4.006 7.997 4C14.252 9.994 18 7.82 18 6zm-8 6c-5.042.007-10-2.686-10-6S4.984-.017 10 0c5.016.017 10 2.686 10 6s-4.958 5.993-10 6zm0-2a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/></svg>',
				'file_name'   => 'eye-outlined.svg',
			),

			'twrp-views-ji-chart-f'   => array(
				'brand'       => 'JamIcons',
				'description' => _x( 'Chart', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-views-ji-chart-f" viewBox="-5 -4 24 24"><path d="M1 0a1 1 0 0 1 1 1v14a1 1 0 0 1-2 0V1a1 1 0 0 1 1-1zm12 4a1 1 0 0 1 1 1v10a1 1 0 0 1-2 0V5a1 1 0 0 1 1-1zM7 8a1 1 0 0 1 1 1v6a1 1 0 0 1-2 0V9a1 1 0 0 1 1-1z" /></svg>',
				'file_name'   => 'chart-filled.svg',
			),

			#endregion -- Jam Icons

			#region -- Linea Icons

			'twrp-views-li-ol'        => array(
				'brand'       => 'Linea',
				'description' => _x( 'Eye', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-views-li-ol" viewBox="0 0 64 64"><path fill="none" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" d="M1,32c0,0,11,15,31,15s31-15,31-15S52,17,32,17S1,32,1,32z"/><circle fill="none" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" cx="32" cy="32" r="7"/></svg>',
				'file_name'   => 'eye-outlined.svg',
			),

			'twrp-views-li-c-ol'      => array(
				'brand'       => 'Linea',
				'description' => _x( 'Eye', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-views-li-c-ol" viewBox="0 0 64 64"><rect x="10" y="45" fill="none" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" width="12" height="18"/><rect x="42" y="18" fill="none" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" width="12" height="45"/><rect x="26" y="32" fill="none" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" width="12" height="31"/><line fill="none" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" x1="14" y1="38" x2="51" y2="1"/><polyline fill="none" stroke="currentColor" stroke-width="2" stroke-linejoin="bevel" stroke-miterlimit="10" points="40,1 51,1 51,12"/></svg>',
				'file_name'   => 'chart-outlined.svg',
			),

			#endregion -- Linea Icons

			#region -- Octicons Icons

			'twrp-views-oi-ol'        => array(
				'brand'       => 'Octicons',
				'description' => _x( 'Eye', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-views-oi-ol" viewBox="0 0 24 24"><path d="M15.5 12a3.5 3.5 0 11-7 0 3.5 3.5 0 017 0z"></path><path fill-rule="evenodd" d="M12 3.5c-3.432 0-6.125 1.534-8.054 3.24C2.02 8.445.814 10.352.33 11.202a1.6 1.6 0 000 1.598c.484.85 1.69 2.758 3.616 4.46C5.876 18.966 8.568 20.5 12 20.5c3.432 0 6.125-1.534 8.054-3.24 1.926-1.704 3.132-3.611 3.616-4.461a1.6 1.6 0 000-1.598c-.484-.85-1.69-2.757-3.616-4.46C18.124 5.034 15.432 3.5 12 3.5zM1.633 11.945c.441-.774 1.551-2.528 3.307-4.08C6.69 6.314 9.045 5 12 5c2.955 0 5.309 1.315 7.06 2.864 1.756 1.553 2.866 3.307 3.307 4.08a.111.111 0 01.017.056.111.111 0 01-.017.056c-.441.774-1.551 2.527-3.307 4.08C17.31 17.685 14.955 19 12 19c-2.955 0-5.309-1.315-7.06-2.864-1.756-1.553-2.866-3.306-3.307-4.08A.11.11 0 011.616 12a.11.11 0 01.017-.055z"></path></svg>',
				'file_name'   => 'eye-outlined.svg',
			),

			'twrp-views-oi-chart-ol'  => array(
				'brand'       => 'Octicons',
				'description' => _x( 'Chart', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-views-oi-chart-ol" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M11.75 3.5a.75.75 0 01.75.75v15.5a.75.75 0 01-1.5 0V4.25a.75.75 0 01.75-.75zm6.5 3.625a.75.75 0 01.75.75V19.75a.75.75 0 01-1.5 0V7.875a.75.75 0 01.75-.75zM5.25 11a.75.75 0 01.75.75v8a.75.75 0 01-1.5 0v-8a.75.75 0 01.75-.75z"></path></svg>',
				'file_name'   => 'chart-outlined.svg',
			),

			#endregion -- Octicons Icons

			#region -- Typicons Icons

			'twrp-views-ti-f'         => array(
				'brand'       => 'Typicons',
				'description' => _x( 'Eye', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-views-ti-f" viewBox="0 0 24 24"><path d="M21.821 12.43c-.083-.119-2.062-2.944-4.793-4.875-1.416-1.003-3.202-1.555-5.028-1.555-1.825 0-3.611.552-5.03 1.555-2.731 1.931-4.708 4.756-4.791 4.875-.238.343-.238.798 0 1.141.083.119 2.06 2.944 4.791 4.875 1.419 1.002 3.205 1.554 5.03 1.554 1.826 0 3.612-.552 5.028-1.555 2.731-1.931 4.71-4.756 4.793-4.875.239-.342.239-.798 0-1.14zm-9.821 4.07c-1.934 0-3.5-1.57-3.5-3.5 0-1.934 1.566-3.5 3.5-3.5 1.93 0 3.5 1.566 3.5 3.5 0 1.93-1.57 3.5-3.5 3.5zM14 13c0 1.102-.898 2-2 2-1.105 0-2-.898-2-2 0-1.105.895-2 2-2 1.102 0 2 .895 2 2z"/></svg>',
				'file_name'   => 'eye-filled.svg',
			),

			'twrp-views-ti-ol'        => array(
				'brand'       => 'Typicons',
				'description' => _x( 'Eye', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-views-ti-ol" viewBox="0 0 24 24"><path d="M12 9c1.211 0 2.381.355 3.297 1.004 1.301.92 2.43 2.124 3.165 2.996-.735.872-1.864 2.077-3.166 2.996-.915.649-2.085 1.004-3.296 1.004s-2.382-.355-3.299-1.004c-1.301-.92-2.43-2.124-3.164-2.996.734-.872 1.863-2.076 3.164-2.995.917-.65 2.088-1.005 3.299-1.005m0-2c-1.691 0-3.242.516-4.453 1.371-2.619 1.852-4.547 4.629-4.547 4.629s1.928 2.777 4.547 4.629c1.211.855 2.762 1.371 4.453 1.371s3.242-.516 4.451-1.371c2.619-1.852 4.549-4.629 4.549-4.629s-1.93-2.777-4.549-4.629c-1.209-.855-2.76-1.371-4.451-1.371zM12 12c-.553 0-1 .447-1 1 0 .551.447 1 1 1 .551 0 1-.449 1-1 0-.553-.449-1-1-1zM12 16c-1.654 0-3-1.346-3-3s1.346-3 3-3 3 1.346 3 3-1.346 3-3 3zm0-5c-1.104 0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2z"/></svg>',
				'file_name'   => 'eye-outlined.svg',
			),

			'twrp-views-ti-chart-f'   => array(
				'brand'       => 'Typicons',
				'description' => _x( 'Chart', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-views-ti-chart-f" viewBox="0 0 24 24"><path d="M14.8,2.6c0-1.4-1.2-2.5-2.8-2.5S9.3,1.2,9.3,2.6v15.1h5.5V2.6z M21.6,7.6c0-1.4-1.2-2.5-2.8-2.5s-2.8,1.1-2.8,2.5v10.1h5.5V7.6z M7.9,11.4c0-1.4-1.2-2.5-2.8-2.5S2.4,10,2.4,11.4v6.3h5.5V11.4z M21.6,21.5H2.4C1.6,21.5,1,22,1,22.7S1.6,24,2.4,24h19.3c0.8,0,1.4-0.6,1.4-1.3S22.4,21.5,21.6,21.5z"/></svg>',
				'file_name'   => 'chart-filled.svg',
				'fix_classes' => 'twrp-i--va-1',
			),

			'twrp-views-ti-chart-ol'  => array(
				'brand'       => 'Typicons',
				'description' => _x( 'Chart', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-views-ti-chart-ol" viewBox="0 0 24 24"><path d="M18.3,4.8c-1,0-1.8,0.4-2.5,0.9V3.6c0-2-1.7-3.6-3.8-3.6S8.3,1.6,8.3,3.6v5.7C7.6,8.8,6.7,8.4,5.8,8.4C3.7,8.4,2,10,2,12v7.2h20V8.4C22,6.4,20.3,4.8,18.3,4.8z M12,2.4c0.7,0,1.3,0.5,1.3,1.2v13.2h-2.5V3.6C10.8,2.9,11.3,2.4,12,2.4z M7,16.8H4.5V12c0-0.7,0.6-1.2,1.3-1.2S7,11.3,7,12V16.8z M19.5,16.8H17V8.4c0-0.7,0.6-1.2,1.3-1.2s1.3,0.5,1.3,1.2V16.8z M20.8,24H3.3C2.6,24,2,23.5,2,22.8c0-0.7,0.6-1.2,1.3-1.2h17.5c0.7,0,1.3,0.5,1.3,1.2C22,23.5,21.4,24,20.8,24z"/></svg>',
				'file_name'   => 'chart-outlined.svg',
				'fix_classes' => 'twrp-i--va-1',
			),

			#endregion -- Typicons Icons

		);

		return $registered_views_vectors;
	}

}
