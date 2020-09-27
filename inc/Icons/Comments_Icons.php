<?php
/**
 * File that contains the class with the same name.
 */

namespace TWRP\Icons;

/**
 * Class that holds all comments icon definitions.
 */
class Comments_Icons {

	/**
	 * Get all registered icons that represents the comments.
	 *
	 * @return array<string,array>
	 */
	public static function get_comment_icons() {

		$registered_comment_vectors = array(

			#region -- FontAwesome Icons

			'twrp-com-fa-f'       => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'Comment', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-fa-f" viewBox="0 0 512 512"><path d="M256 32C114.6 32 0 125.1 0 240c0 49.6 21.4 95 57 130.7C44.5 421.1 2.7 466 2.2 466.5c-2.2 2.3-2.8 5.7-1.5 8.7S4.8 480 8 480c66.3 0 116-31.8 140.6-51.4 32.7 12.3 69 19.4 107.4 19.4 141.4 0 256-93.1 256-208S397.4 32 256 32z"></path></svg>',
				'file_name'   => 'filled.svg',
			),

			'twrp-com-fa-ol'      => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'Comment', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-fa-ol" viewBox="0 0 512 512"><path d="M256 32C114.6 32 0 125.1 0 240c0 47.6 19.9 91.2 52.9 126.3C38 405.7 7 439.1 6.5 439.5c-6.6 7-8.4 17.2-4.6 26S14.4 480 24 480c61.5 0 110-25.7 139.1-46.3C192 442.8 223.2 448 256 448c141.4 0 256-93.1 256-208S397.4 32 256 32zm0 368c-26.7 0-53.1-4.1-78.4-12.1l-22.7-7.2-19.5 13.8c-14.3 10.1-33.9 21.4-57.5 29 7.3-12.1 14.4-25.7 19.9-40.2l10.6-28.1-20.6-21.8C69.7 314.1 48 282.2 48 240c0-88.2 93.3-160 208-160s208 71.8 208 160-93.3 160-208 160z"></path></svg>',
				'file_name'   => 'outlined.svg',
			),

			'twrp-com-fa-2-f'     => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'Comment 2', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-fa-2-f" viewBox="0 0 512 512"><path d="M448 0H64C28.7 0 0 28.7 0 64v288c0 35.3 28.7 64 64 64h96v84c0 9.8 11.2 15.5 19.1 9.7L304 416h144c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64z"></path></svg>',
				'file_name'   => 'alt-filled.svg',
			),

			'twrp-com-fa-2-ol'    => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'Comment 2', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-fa-2-ol" viewBox="0 0 512 512"><path d="M448 0H64C28.7 0 0 28.7 0 64v288c0 35.3 28.7 64 64 64h96v84c0 7.1 5.8 12 12 12 2.4 0 4.9-.7 7.1-2.4L304 416h144c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64zm16 352c0 8.8-7.2 16-16 16H288l-12.8 9.6L208 428v-60H64c-8.8 0-16-7.2-16-16V64c0-8.8 7.2-16 16-16h384c8.8 0 16 7.2 16 16v288z"></path></svg>',
				'file_name'   => 'alt-outlined.svg',
			),

			'twrp-com-fa-dots-f'  => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'Dots', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-fa-dots-f" viewBox="0 0 512 512"><path d="M256 32C114.6 32 0 125.1 0 240c0 49.6 21.4 95 57 130.7C44.5 421.1 2.7 466 2.2 466.5c-2.2 2.3-2.8 5.7-1.5 8.7S4.8 480 8 480c66.3 0 116-31.8 140.6-51.4 32.7 12.3 69 19.4 107.4 19.4 141.4 0 256-93.1 256-208S397.4 32 256 32zM128 272c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32zm128 0c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32zm128 0c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32z"></path></svg>',
				'file_name'   => 'dots-filled.svg',
			),

			'twrp-com-fa-dots-ol' => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'Dots', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-fa-dots-ol" viewBox="0 0 512 512"><path d="M144 208c-17.7 0-32 14.3-32 32s14.3 32 32 32 32-14.3 32-32-14.3-32-32-32zm112 0c-17.7 0-32 14.3-32 32s14.3 32 32 32 32-14.3 32-32-14.3-32-32-32zm112 0c-17.7 0-32 14.3-32 32s14.3 32 32 32 32-14.3 32-32-14.3-32-32-32zM256 32C114.6 32 0 125.1 0 240c0 47.6 19.9 91.2 52.9 126.3C38 405.7 7 439.1 6.5 439.5c-6.6 7-8.4 17.2-4.6 26S14.4 480 24 480c61.5 0 110-25.7 139.1-46.3C192 442.8 223.2 448 256 448c141.4 0 256-93.1 256-208S397.4 32 256 32zm0 368c-26.7 0-53.1-4.1-78.4-12.1l-22.7-7.2-19.5 13.8c-14.3 10.1-33.9 21.4-57.5 29 7.3-12.1 14.4-25.7 19.9-40.2l10.6-28.1-20.6-21.8C69.7 314.1 48 282.2 48 240c0-88.2 93.3-160 208-160s208 71.8 208 160-93.3 160-208 160z"></path></svg>',
				'file_name'   => 'dots-outlined.svg',
			),

			'twrp-com-fa-comm-f'  => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'Comments', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-fa-comm-f" viewBox="0 0 576 512"><path d="M416 192c0-88.4-93.1-160-208-160S0 103.6 0 192c0 34.3 14.1 65.9 38 92-13.4 30.2-35.5 54.2-35.8 54.5-2.2 2.3-2.8 5.7-1.5 8.7S4.8 352 8 352c36.6 0 66.9-12.3 88.7-25 32.2 15.7 70.3 25 111.3 25 114.9 0 208-71.6 208-160zm122 220c23.9-26 38-57.7 38-92 0-66.9-53.5-124.2-129.3-148.1.9 6.6 1.3 13.3 1.3 20.1 0 105.9-107.7 192-240 192-10.8 0-21.3-.8-31.7-1.9C207.8 439.6 281.8 480 368 480c41 0 79.1-9.2 111.3-25 21.8 12.7 52.1 25 88.7 25 3.2 0 6.1-1.9 7.3-4.8 1.3-2.9.7-6.3-1.5-8.7-.3-.3-22.4-24.2-35.8-54.5z"></path></svg>',
				'file_name'   => 'comments-filled.svg',
			),

			'twrp-com-fa-comm-ol' => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'Comments', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-fa-comm-ol" viewBox="0 0 576 512"><path d="M532 386.2c27.5-27.1 44-61.1 44-98.2 0-80-76.5-146.1-176.2-157.9C368.3 72.5 294.3 32 208 32 93.1 32 0 103.6 0 192c0 37 16.5 71 44 98.2-15.3 30.7-37.3 54.5-37.7 54.9-6.3 6.7-8.1 16.5-4.4 25 3.6 8.5 12 14 21.2 14 53.5 0 96.7-20.2 125.2-38.8 9.2 2.1 18.7 3.7 28.4 4.9C208.1 407.6 281.8 448 368 448c20.8 0 40.8-2.4 59.8-6.8C456.3 459.7 499.4 480 553 480c9.2 0 17.5-5.5 21.2-14 3.6-8.5 1.9-18.3-4.4-25-.4-.3-22.5-24.1-37.8-54.8zm-392.8-92.3L122.1 305c-14.1 9.1-28.5 16.3-43.1 21.4 2.7-4.7 5.4-9.7 8-14.8l15.5-31.1L77.7 256C64.2 242.6 48 220.7 48 192c0-60.7 73.3-112 160-112s160 51.3 160 112-73.3 112-160 112c-16.5 0-33-1.9-49-5.6l-19.8-4.5zM498.3 352l-24.7 24.4 15.5 31.1c2.6 5.1 5.3 10.1 8 14.8-14.6-5.1-29-12.3-43.1-21.4l-17.1-11.1-19.9 4.6c-16 3.7-32.5 5.6-49 5.6-54 0-102.2-20.1-131.3-49.7C338 339.5 416 272.9 416 192c0-3.4-.4-6.7-.7-10C479.7 196.5 528 238.8 528 288c0 28.7-16.2 50.6-29.7 64z"></path></svg>',
				'file_name'   => 'comments-outlined.svg',
			),

			'twrp-com-fa-do-f'    => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'Comments Dollar', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-fa-do-f" viewBox="0 0 512 512"><path d="M256 32C114.62 32 0 125.12 0 240c0 49.56 21.41 95.01 57.02 130.74C44.46 421.05 2.7 465.97 2.2 466.5A7.995 7.995 0 0 0 8 480c66.26 0 115.99-31.75 140.6-51.38C181.29 440.93 217.59 448 256 448c141.38 0 256-93.12 256-208S397.38 32 256 32zm24 302.44V352c0 8.84-7.16 16-16 16h-16c-8.84 0-16-7.16-16-16v-17.73c-11.42-1.35-22.28-5.19-31.78-11.46-6.22-4.11-6.82-13.11-1.55-18.38l17.52-17.52c3.74-3.74 9.31-4.24 14.11-2.03 3.18 1.46 6.66 2.22 10.26 2.22h32.78c4.66 0 8.44-3.78 8.44-8.42 0-3.75-2.52-7.08-6.12-8.11l-50.07-14.3c-22.25-6.35-40.01-24.71-42.91-47.67-4.05-32.07 19.03-59.43 49.32-63.05V128c0-8.84 7.16-16 16-16h16c8.84 0 16 7.16 16 16v17.73c11.42 1.35 22.28 5.19 31.78 11.46 6.22 4.11 6.82 13.11 1.55 18.38l-17.52 17.52c-3.74 3.74-9.31 4.24-14.11 2.03a24.516 24.516 0 0 0-10.26-2.22h-32.78c-4.66 0-8.44 3.78-8.44 8.42 0 3.75 2.52 7.08 6.12 8.11l50.07 14.3c22.25 6.36 40.01 24.71 42.91 47.67 4.05 32.06-19.03 59.42-49.32 63.04z"></path></svg>',
				'file_name'   => 'dollar-filled.svg',
			),

			#endregion -- FontAwesome Icons

			#region -- Google Icons

			'twrp-com-go-f'       => array(
				'brand'       => 'Google',
				'description' => _x( 'Comment', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-go-f" viewBox="0 0 24 24"><path d="M23,3.2C23,2,22,1,20.8,1H3.2C2,1,1,2,1,3.2v13.2c0,1.2,1,2.2,2.2,2.2h15.4L23,23L23,3.2z"/></svg>',
				'file_name'   => 'filled.svg',
			),

			'twrp-com-go-ol'      => array(
				'brand'       => 'Google',
				'description' => _x( 'Comment', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-go-ol" viewBox="0 0 24 24"><path d="M20.8,17.7l-1.3-1.3H3.2V3.2h17.6V17.7z M20.8,1H3.2C2,1,1,2,1,3.2v13.2c0,1.2,1,2.2,2.2,2.2h15.4L23,23V3.2C23,2,22,1,20.8,1z"/></svg>',
				'file_name'   => 'outlined.svg',
			),

			'twrp-com-go-dt'      => array(
				'brand'       => 'Google',
				'description' => _x( 'Comment', 'backend', 'twrp' ),
				'type'        => _x( 'TwoTone', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-go-dt" viewBox="0 0 24 24"><path d="M20.8,1H3.2C2,1,1,2,1,3.2v13.2c0,1.2,1,2.2,2.2,2.2h15.4L23,23V3.2C23,2,22,1,20.8,1z M20.8,17.7l-1.3-1.3H3.2V3.2h17.6V17.7z"/><path style="opacity:0.3;" d="M3.2,3.2v13.2h16.3l1.3,1.3V3.2H3.2z"/></svg>',
				'file_name'   => 'twotone.svg',
			),

			'twrp-com-go-sh'      => array(
				'brand'       => 'Google',
				'description' => _x( 'Comment', 'backend', 'twrp' ),
				'type'        => _x( 'Sharp', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-go-sh" viewBox="0 0 24 24"><path d="M23,1H1v17.6h17.6L23,23V1z"/></svg>',
				'file_name'   => 'sharp.svg',
			),

			'twrp-com-go-2-f'     => array(
				'brand'       => 'Google',
				'description' => _x( 'Comment 2', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-go-2-f" viewBox="0 0 24 24"><path d="M23,3.2C23,2,22,1,20.8,1H3.2C2,1,1,2,1,3.2v13.2c0,1.2,1,2.2,2.2,2.2h15.4L23,23L23,3.2z M18.6,14.2H5.4V12h13.2V14.2z M18.6,10.9H5.4V8.7h13.2V10.9z M18.6,7.6H5.4V5.4h13.2V7.6z"/></svg>',
				'file_name'   => 'alt-filled.svg',
			),

			'twrp-com-go-2-ol'    => array(
				'brand'       => 'Google',
				'description' => _x( 'Comment 2', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-go-2-ol" viewBox="0 0 24 24"><path d="M23,3.2C23,2,22,1,20.8,1H3.2C2,1,1,2,1,3.2v13.2c0,1.2,1,2.2,2.2,2.2h15.4L23,23L23,3.2z M20.8,3.2v14.5l-1.3-1.3H3.2V3.2H20.8z M5.4,12h13.2v2.2H5.4V12z M5.4,8.7h13.2v2.2H5.4V8.7z M5.4,5.4h13.2v2.2H5.4V5.4z"/></svg>',
				'file_name'   => 'alt-outlined.svg',
			),

			'twrp-com-go-2-dt'    => array(
				'brand'       => 'Google',
				'description' => _x( 'Comment 2', 'backend', 'twrp' ),
				'type'        => _x( 'TwoTone', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-go-2-dt" viewBox="0 0 24 24"><path style="opacity:0.3;" d="M20.8,17.7V3.2H3.2v13.2h16.3L20.8,17.7z M18.6,14.2H5.4V12h13.2V14.2z M18.6,10.9H5.4V8.7h13.2V10.9z M18.6,7.6H5.4V5.4h13.2V7.6z"/><path d="M3.2,18.6h15.4L23,23l0-19.8C23,2,22,1,20.8,1H3.2C2,1,1,2,1,3.2v13.2C1,17.6,2,18.6,3.2,18.6z M3.2,3.2h17.6v14.5l-1.3-1.3H3.2V3.2z M5.4,12h13.2v2.2H5.4V12z M5.4,8.7h13.2v2.2H5.4V8.7z M5.4,5.4h13.2v2.2H5.4V5.4z"/></svg>',
				'file_name'   => 'alt-twotone.svg',
			),

			'twrp-com-go-2-sh'    => array(
				'brand'       => 'Google',
				'description' => _x( 'Comment 2', 'backend', 'twrp' ),
				'type'        => _x( 'Sharp', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-go-2-sh" viewBox="0 0 24 24"><path d="M23,1H1v17.6h17.6L23,23L23,1z M18.6,14.2H5.4V12h13.2V14.2z M18.6,10.9H5.4V8.7h13.2V10.9z M18.6,7.6H5.4V5.4h13.2V7.6z"/></svg>',
				'file_name'   => 'alt-sharp.svg',
			),

			'twrp-com-go-f-f'     => array(
				'brand'       => 'Google',
				'description' => _x( 'Feedback', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-go-f-f" viewBox="0 0 24 24"><path d="M20.8,1H3.2C2,1,1,2,1,3.2L1,23l4.4-4.4h15.4c1.2,0,2.2-1,2.2-2.2V3.2C23,2,22,1,20.8,1z M13.1,14.2h-2.2V12h2.2V14.2z M13.1,9.8h-2.2V5.4h2.2V9.8z"/></svg>',
				'file_name'   => 'feedback-filled.svg',
			),

			'twrp-com-go-f-ol'    => array(
				'brand'       => 'Google',
				'description' => _x( 'Feedback', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-go-f-ol" viewBox="0 0 24 24"><path d="M20.8,1H3.2C2,1,1,2,1,3.2L1,23l4.4-4.4h15.4c1.2,0,2.2-1,2.2-2.2V3.2C23,2,22,1,20.8,1z M20.8,16.4H4.5L3.8,17l-0.6,0.6V3.2h17.6V16.4z M10.9,12h2.2v2.2h-2.2V12z M10.9,5.4h2.2v4.4h-2.2V5.4z"/></svg>',
				'file_name'   => 'feedback-outlined.svg',
			),

			'twrp-com-go-f-dt'    => array(
				'brand'       => 'Google',
				'description' => _x( 'Feedback', 'backend', 'twrp' ),
				'type'        => _x( 'TwoTone', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-go-f-dt" viewBox="0 0 24 24"><path style="opacity:0.3;" d="M3.2,17.7l1.3-1.3h16.3V3.2H3.2V17.7z M10.9,5.4h2.2v4.4h-2.2V5.4z M10.9,12h2.2v2.2h-2.2V12z"/><path d="M20.8,1H3.2C2,1,1,2,1,3.2L1,23l4.4-4.4h15.4c1.2,0,2.2-1,2.2-2.2V3.2C23,2,22,1,20.8,1z M20.8,16.4H4.5l-1.3,1.3V3.2h17.6V16.4z M10.9,12h2.2v2.2h-2.2V12z M10.9,5.4h2.2v4.4h-2.2V5.4z"/></svg>',
				'file_name'   => 'feedback-twotone.svg',
			),

			'twrp-com-go-f-sh'    => array(
				'brand'       => 'Google',
				'description' => _x( 'Feedback', 'backend', 'twrp' ),
				'type'        => _x( 'Sharp', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-go-f-sh" viewBox="0 0 24 24"><path d="M23,1H1l0,22l4.4-4.4H23V1z M13.1,14.2h-2.2V12h2.2V14.2z M13.1,9.8h-2.2V5.4h2.2V9.8z"/></svg>',
				'file_name'   => 'feedback-sharp.svg',
			),

			'twrp-com-go-b-f'     => array(
				'brand'       => 'Google',
				'description' => _x( 'Bank', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-go-b-f" viewBox="0 0 24 24"><path d="M20.8,1H3.2C2,1,1,2,1,3.2V23l4.4-4.4h15.4c1.2,0,2.2-1,2.2-2.2V3.2C23,2,22,1,20.8,1z M19.7,13.1L17,11.4l-2.8,1.7V4.3h5.5V13.1z"/></svg>',
				'file_name'   => 'bank-filled.svg',
			),

			'twrp-com-go-b-ol'    => array(
				'brand'       => 'Google',
				'description' => _x( 'Bank', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-go-b-ol" viewBox="0 0 24 24"><polygon points="18.6,14.2 18.6,5.4 13.1,5.4 13.1,14.2 15.9,12.6"/><path d="M20.8,1H3.2C2,1,1,2,1,3.2V23l4.4-4.4h15.4c1.2,0,2.2-1,2.2-2.2V3.2C23,2,22,1,20.8,1z M20.8,16.4H5.4l-2.2,2.2V3.2h17.6V16.4z"/></svg>',
				'file_name'   => 'bank-outlined.svg',
			),

			'twrp-com-go-b-dt'    => array(
				'brand'       => 'Google',
				'description' => _x( 'Bank', 'backend', 'twrp' ),
				'type'        => _x( 'TwoTone', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-go-b-dt" viewBox="0 0 24 24"><path style="opacity:0.3;" d="M3.2,18.6l2.2-2.2h15.4V3.2H3.2V18.6z M13.1,5.4h5.5v8.8l-2.8-1.6l-2.8,1.6V5.4z"/><polygon points="18.6,14.2 18.6,5.4 13.1,5.4 13.1,14.2 15.9,12.6"/><path d="M20.8,1H3.2C2,1,1,2,1,3.2V23l4.4-4.4h15.4c1.2,0,2.2-1,2.2-2.2V3.2C23,2,22,1,20.8,1z M20.8,16.4H5.4l-2.2,2.2V3.2h17.6V16.4z"/></svg>',
				'file_name'   => 'bank-twotone.svg',
			),

			'twrp-com-go-b-sh'    => array(
				'brand'       => 'Google',
				'description' => _x( 'Bank', 'backend', 'twrp' ),
				'type'        => _x( 'Sharp', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-go-b-sh" viewBox="0 0 24 24"><path d="M1,1v22l4.4-4.4H23V1H1z M19.7,13.1L17,11.4l-2.8,1.7V4.3h5.5V13.1z"/></svg>',
				'file_name'   => 'bank-sharp.svg',
			),

			#endregion -- Google Icons

			#region -- Dashicons

			'twrp-com-di-f'       => array(
				'brand'       => 'Dashicons',
				'description' => _x( 'Comment', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-di-f" viewBox="0 0 20 20"><path d="M4.5,0h11.1C16.9,0,18,1.1,18,2.5v8.8c0,1.4-1.1,2.5-2.5,2.5h-2.5L6.9,20v-6.3H4.5c-1.4,0-2.5-1.1-2.5-2.5V2.5C2,1.1,3.1,0,4.5,0z"/></svg>',
				'file_name'   => 'filled.svg',
			),

			'twrp-com-di-c-f'     => array(
				'brand'       => 'Dashicons',
				'description' => _x( 'Comments', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-di-c-f" viewBox="0 0 20 20"><path d="M11.1,5.6h-0.9C9,5.6,7.8,6.9,7.8,8v2l-3.3,3.3V10H2.2C1,10,0,9,0,7.8V2.2C0,1,1,0,2.2,0h6.7c1.2,0,2.2,1,2.2,2.2V5.6z M11.1,6.7h6.7c1.2,0,2.2,1,2.2,2.2v5.6c0,1.2-1,2.2-2.2,2.2h-2.2V20l-3.3-3.3h-1.1c-1.2,0-2.2-1-2.2-2.2V8.9C8.9,7.7,9.9,6.7,11.1,6.7z"/></svg>',
				'file_name'   => 'comments-filled.svg',
			),

			'twrp-com-di-d-f'     => array(
				'brand'       => 'Dashicons',
				'description' => _x( 'Dots', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-di-d-f" viewBox="0 0 20 20"><path d="M10,0c7.8,0,10,3.3,10,7.4s-2.2,7.4-10,7.4S0,11.5,0,7.4S2.2,0,10,0z M5,9.1c0.9,0,1.7-0.8,1.7-1.7S5.9,5.7,5,5.7S3.3,6.5,3.3,7.4S4.1,9.1,5,9.1z M10,9.1c0.9,0,1.7-0.8,1.7-1.7S10.9,5.7,10,5.7S8.3,6.5,8.3,7.4S9.1,9.1,10,9.1z M15,9.1c0.9,0,1.7-0.8,1.7-1.7S15.9,5.7,15,5.7s-1.7,0.8-1.7,1.7S14.1,9.1,15,9.1z M5.6,15.4c0.9,0,1.7,0.8,1.7,1.7c0,0.9-0.7,1.7-1.7,1.7s-1.7-0.8-1.7-1.7C3.9,16.2,4.6,15.4,5.6,15.4z M2.2,17.7c0.6,0,1.1,0.5,1.1,1.1S2.8,20,2.2,20s-1.1-0.5-1.1-1.1S1.6,17.7,2.2,17.7z"/></svg>',
				'file_name'   => 'dots-filled.svg',
			),

			'twrp-com-di-l-f'     => array(
				'brand'       => 'Dashicons',
				'description' => _x( 'Lines', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-di-l-f" viewBox="0 0 20 20"><path d="M2.5,0h15c0.7,0,1.3,0.3,1.8,0.7S20,1.8,20,2.5v8.8c0,0.7-0.3,1.3-0.7,1.8s-1.1,0.7-1.8,0.7h-1.3L10,20v-6.3H2.5c-0.7,0-1.3-0.3-1.8-0.7S0,11.9,0,11.3V2.5c0-0.7,0.3-1.3,0.7-1.8S1.8,0,2.5,0z M16.4,2.4H2.6v1.3h13.7V2.4z M17.6,6.2h-15v1.3h15V6.2z M13.9,9.9H2.6v1.3h11.3V9.9z"/></svg>',
				'file_name'   => 'lines-filled.svg',
			),

			#endregion -- Dashicons

			#region -- Foundation Icons

			'twrp-com-fi-f'       => array(
				'brand'       => 'Foundation',
				'description' => _x( 'Comment', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-fi-f" viewBox="0 0 100 100"><path d="M98.5,8.3c-0.2-2.1-2-3.8-4.2-3.8H5.6v0C3.5,4.6,1.7,6.2,1.5,8.3h0v71h0.1c0.4,1.9,2,3.3,4,3.4v0h14.6v8.5c0,2.3,1.9,4.3,4.3,4.3c1.5,0,2.8-0.7,3.5-1.9l10.9-10.9h55.4c2.1,0,3.8-1.5,4.2-3.4h0.1L98.5,8.3L98.5,8.3z"/></svg>',
				'file_name'   => 'filled.svg',
			),

			'twrp-com-fi-2-f'     => array(
				'brand'       => 'Foundation',
				'description' => _x( 'Comments', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-fi-2-f" viewBox="0 0 100 100"><path d="M99.5,14.6c-0.1-1.4-1.3-2.5-2.7-2.5v0H38.6c-1.4,0-2.6,1.1-2.8,2.5h0v14.5h24.6c1.3,0,2.3,1,2.5,2.2h0v32.2H75l7.1,7.1c0.5,0.7,1.4,1.2,2.3,1.2c1.5,0,2.8-1.2,2.8-2.8v-5.6h9.6v0c1.3,0,2.4-1,2.7-2.2h0.1L99.5,14.6L99.5,14.6z"/><path d="M54.9,34.6h-52v0c-1.3,0-2.3,1-2.4,2.2h0v41.6h0.1c0.2,1.1,1.2,2,2.4,2v0h8.5v5c0,1.4,1.1,2.5,2.5,2.5c0.9,0,1.6-0.4,2.1-1.1l6.4-6.4h32.5c1.2,0,2.2-0.9,2.4-2h0V36.8h0C57.2,35.5,56.2,34.6,54.9,34.6z"/></svg>',
				'file_name'   => 'comments-filled.svg',
			),

			#endregion -- Foundation Icons

			#region -- Ionicons Icons

			'twrp-com-ii-f'       => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Comment', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-ii-f" viewBox="0 0 512 512"><path d="M129.1,491.5c-10,0-18.1-8.1-18.1-18.1V401H84c-44.7,0-81-36.5-81-81.4V102.4C3,57.5,39.3,21,84,21h343.6c44.9,0,81.4,36.5,81.4,81.4v217.1c0,45-36.5,81.4-81.4,81.4H244.1l-103.4,86.3C137.4,490,133.3,491.5,129.1,491.5z"/></svg>',
				'file_name'   => 'filled.svg',
			),

			'twrp-com-ii-ol'      => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Comment', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-ii-ol" viewBox="0 0 512 512"><path style="fill:none;stroke:currentColor;stroke-width:32;stroke-linejoin:round;" d="M427.8,39H84.2C49.3,39.1,21.1,67.4,21,102.3v217c0.1,34.9,28.4,63.2,63.3,63.3h45.2V473l105.9-88.3c1.6-1.4,3.7-2.1,5.8-2.1h186.6c34.9-0.1,63.2-28.4,63.3-63.3v-217C490.9,67.4,462.7,39.1,427.8,39z"/></svg>',
				'file_name'   => 'outlined.svg',
			),

			'twrp-com-ii-sh'      => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Comment', 'backend', 'twrp' ),
				'type'        => _x( 'Sharp', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-ii-sh" viewBox="0 0 512 512"><path d="M111,491.5V401H30.1C15.1,401,3,388.9,3,373.9V48.1C3,33.1,15.1,21,30.1,21h451.8c15,0,27.1,12.1,27.1,27.1v325.8c0,15-12.1,27.1-27.1,27.1H244.1L111,491.5z M482,57.1L482,57.1z"/></svg>',
				'file_name'   => 'sharp.svg',
			),

			'twrp-com-ii-2-f'     => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Comment 2', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-ii-2-f" viewBox="0 0 512 512"><path d="M53.5,509.1C37.5,509,24.6,496,24.6,480c0.1-2.9,0.5-5.8,1.4-8.6l20.8-75.3c0.9-2.8-0.1-5.6-1.4-7.8l-0.2-0.5c-0.1-0.1-0.5-0.7-0.8-1.2c-0.3-0.4-0.7-0.9-1-1.4l-0.2-0.3C16.9,345.2,2.9,298.5,2.9,250.8C2.7,185.7,28.1,124.2,74.6,77.6C122.7,29.4,187,2.9,255.8,2.9c58.4,0,115.1,19.8,160.7,56.3c44.6,35.9,75.6,85.9,87.2,140.9c3.6,16.7,5.4,33.8,5.4,50.9c0,66.6-25.6,129.1-72,176.1c-46.9,47.5-109.8,73.5-177.2,73.5c-23.7,0-54.1-6.1-68.7-10.2c-17.5-4.9-34.2-11.3-36-12c-1.9-0.7-4-1.1-6.1-1.1c-2.2,0-4.5,0.4-6.6,1.3l-1,0.4l-76.3,27.5C61.6,508.1,57.6,509,53.5,509.1z M65.6,396.1L65.6,396.1z"/></svg>',
				'file_name'   => '2-filled.svg',
			),

			'twrp-com-ii-2-ol'    => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Comment 2', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-ii-2-ol" viewBox="0 0 512 512"><path style="fill:none;stroke:currentColor;stroke-width:32;stroke-linecap:round;stroke-miterlimit:10;" d="M65.8,396.1c1.3-4.9-1.6-11.8-4.5-16.8c-0.9-1.5-1.8-2.9-2.9-4.3c-24.3-36.9-37.3-80.1-37.3-124.3C20.8,123.9,126,21,256.1,21c113.4,0,208.1,78.6,230.2,182.9c3.3,15.5,5,31.2,5,47.1c0,127-101.1,231.6-231.2,231.6c-20.7,0-48.6-5.2-63.8-9.5c-15.2-4.3-30.4-9.9-34.3-11.4c-4-1.5-8.3-2.3-12.6-2.3c-4.7,0-9.3,0.9-13.7,2.7l-76.6,27.7c-1.7,0.7-3.5,1.2-5.3,1.4c-6,0-10.8-4.9-10.8-10.9c0,0,0-0.1,0-0.1c0.1-1.3,0.3-2.5,0.7-3.7L65.8,396.1z"/></svg>',
				'file_name'   => '2-outlined.svg',
			),

			'twrp-com-ii-ios-f'   => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Ios Comment', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-ii-ios-f" viewBox="0 0 512 512"><path d="M256,51.7c-135.5,0-245.2,88.2-245.2,197c0,39.2,14.3,75.7,38.8,106.4c1.1,1.1,3.7,4.9,4.6,6.3c0,0-1.3-2-1.4-2.4l0,0l0,0l0,0c2.9,4.2,4.6,9.1,4.6,14.3c0,1.8-22.9,74.1-22.9,74.1l0,0c-1.7,5.6,2.7,11.4,9.7,12.8c1,0.3,2,0.3,3.1,0.3c1.7,0,3.2-0.3,4.7-0.6l2-0.8l64.6-28.1c1.1-0.5,11.5-4.5,12.8-5l0.8-0.3c0,0-0.1,0-0.8,0.3c4.3-1.5,9.2-2.3,14.3-2.3c4.6,0,9.1,0.6,13.2,1.9c0.1,0,0.3,0,0.3,0.1c0.6,0.3,1.3,0.4,1.9,0.6c29.5,10.1,61.8,13.2,95.9,13.2c135.4,0,243.9-81.8,243.9-190.6C501.2,139.9,391.4,51.7,256,51.7L256,51.7z"/></svg>',
				'file_name'   => 'ios-filled.svg',
			),

			'twrp-com-ii-ios-ol'  => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Ios Comment', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-ii-ios-ol" viewBox="0 0 512 512"><path d="M256,72.1c123.9,0,224.7,79.2,224.7,176.6c0,45.8-22.5,88.4-63.2,119.9c-41.9,32.4-98.8,50.2-160.3,50.2c-36.9,0-65.1-3.8-89-11.9c-0.8-0.3-1.7-0.6-2.6-0.9c-0.4-0.1-0.8-0.3-1-0.3c-6-1.8-12.4-2.7-18.8-2.7c-7.2,0-14.2,1.1-20.8,3.3l0,0l-0.4,0.1c-0.8,0.3-11.4,4.2-14,5.5l0,0l-50.6,22c17.6-56.1,17.6-57.2,17.6-60.8c0-9.1-2.8-18-8-25.8c-0.6-0.9-1.3-1.8-2-2.7c-0.9-1.1-1.7-2.2-2.3-2.9c-22.2-28-34-60.1-34-93.2C31.3,151.3,132.2,72.1,256,72.1 M256,51.7c-135.5,0-245.2,88.2-245.2,197c0,39.2,14.3,75.7,38.8,106.4c1.1,1.1,3.7,4.9,4.6,6.3c0,0-1.3-2-1.4-2.4l0,0l0,0l0,0c2.9,4.2,4.6,9.1,4.6,14.3c0,1.8-22.9,74.1-22.9,74.1l0,0c-1.7,5.6,2.7,11.4,9.7,12.8c1,0.3,2,0.3,3.1,0.3c1.7,0,3.2-0.3,4.7-0.6l2-0.8l64.6-28.1c1.1-0.5,11.5-4.5,12.8-5l0.8-0.3c0,0-0.1,0-0.8,0.3c4.3-1.5,9.2-2.3,14.3-2.3c4.6,0,9.1,0.6,13.2,1.9c0.1,0,0.3,0,0.3,0.1c0.6,0.3,1.3,0.4,1.9,0.6c29.5,10.1,61.8,13.2,95.9,13.2c135.4,0,243.9-81.8,243.9-190.6C501.2,139.9,391.4,51.7,256,51.7L256,51.7z"/></svg>',
				'file_name'   => 'ios-outlined.svg',
			),

			'twrp-com-ii-t-f'     => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Dots', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-ii-t-f" viewBox="0 0 512 512"><path d="M427.8,21H84.2C39.3,21,2.9,57.4,2.9,102.3v217c0,44.9,36.4,81.3,81.4,81.4h27.1V473c0,10,8.1,18.1,18.1,18.1c4.2,0,8.3-1.5,11.6-4.2l103.4-86.2h183.4c44.9,0,81.3-36.4,81.4-81.4v-217C509.1,57.4,472.7,21,427.8,21z M147.5,247c-20,0-36.2-16.2-36.2-36.2s16.2-36.2,36.2-36.2s36.2,16.2,36.2,36.2S167.5,247,147.5,247z M256,247c-20,0-36.2-16.2-36.2-36.2s16.2-36.2,36.2-36.2c20,0,36.2,16.2,36.2,36.2S276,247,256,247z M364.5,247c-20,0-36.2-16.2-36.2-36.2s16.2-36.2,36.2-36.2c20,0,36.2,16.2,36.2,36.2S384.5,247,364.5,247z"/></svg>',
				'file_name'   => 'dots-filled.svg',
			),

			'twrp-com-ii-t-ol'    => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Dots', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-ii-t-ol" viewBox="0 0 512 512"><path style="fill:none;stroke:currentColor;stroke-width:32;stroke-linejoin:round;" d="M427.8,39H84.2C49.3,39.1,21.1,67.4,21,102.3v217c0.1,34.9,28.4,63.2,63.3,63.3h45.2V473l105.9-88.3c1.6-1.4,3.7-2.1,5.8-2.1h186.6c34.9-0.1,63.2-28.4,63.3-63.3v-217C490.9,67.4,462.7,39.1,427.8,39z"/><circle cx="147.5" cy="210.8" r="36.2"/><circle cx="256" cy="210.8" r="36.2"/><circle cx="364.5" cy="210.8" r="36.2"/></svg>',
				'file_name'   => 'dots-outlined.svg',
			),

			'twrp-com-ii-t-sh'    => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Dots', 'backend', 'twrp' ),
				'type'        => _x( 'Sharp', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-ii-t-sh" viewBox="0 0 512 512"><path d="M482,21H30C15,21,2.9,33.1,2.9,48.1v325.4c0,15,12.1,27.1,27.1,27.1h81.4V491l133-90.4H482c15,0,27.1-12.1,27.1-27.1V48.1C509.1,33.1,497,21,482,21z M147.5,247c-20,0-36.2-16.2-36.2-36.2s16.2-36.2,36.2-36.2s36.2,16.2,36.2,36.2S167.5,247,147.5,247z M256,247c-20,0-36.2-16.2-36.2-36.2s16.2-36.2,36.2-36.2c20,0,36.2,16.2,36.2,36.2S276,247,256,247z M364.5,247c-20,0-36.2-16.2-36.2-36.2s16.2-36.2,36.2-36.2c20,0,36.2,16.2,36.2,36.2S384.5,247,364.5,247z M482,57.1L482,57.1z"/></svg>',
				'file_name'   => 'dots-sharp.svg',
			),

			'twrp-com-ii-t2-f'    => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Dots 2', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-ii-t2-f" viewBox="0 0 512 512"><path d="M503.7,200.1c-11.7-55-42.7-105-87.3-140.9C370.9,22.7,314.2,2.9,255.8,2.9C187,2.9,122.7,29.4,74.6,77.6C28.1,124.2,2.7,185.7,2.9,250.8c0,47.7,14,94.4,40.3,134.2l4.9,6.8L21,509.1l129.7-32.3c0,0,2.6,0.9,4.5,1.6c1.9,0.7,18.5,7.1,36,12c14.6,4.1,44.9,10.2,68.7,10.2c67.4,0,130.3-26.1,177.2-73.5c46.5-47,72-109.6,72-176.2C509.1,233.8,507.3,216.8,503.7,200.1z M147.5,292.2c-20,0-36.2-16.2-36.2-36.2c0-20,16.2-36.2,36.2-36.2s36.2,16.2,36.2,36.2C183.7,276,167.5,292.2,147.5,292.2z M256,292.2c-20,0-36.2-16.2-36.2-36.2c0-20,16.2-36.2,36.2-36.2c20,0,36.2,16.2,36.2,36.2C292.2,276,276,292.2,256,292.2z M364.5,292.2c-20,0-36.2-16.2-36.2-36.2c0-20,16.2-36.2,36.2-36.2s36.2,16.2,36.2,36.2C400.6,276,384.5,292.2,364.5,292.2z"/></svg>',
				'file_name'   => 'dots-2-filled.svg',
			),

			'twrp-com-ii-t2-ol'   => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Dots 2', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-ii-t2-ol" viewBox="0 0 512 512"><path style="fill:none;stroke:currentColor;stroke-width:32;stroke-linecap:round;stroke-miterlimit:10;" d="M65.6,396.1c1.4-4.9-1.6-11.8-4.5-16.8c-0.9-1.5-1.8-2.9-2.9-4.3C33.9,338.1,21,294.9,21,250.7C20.6,123.9,125.7,21,255.8,21C369.2,21,463.9,99.5,486,203.9c3.3,15.5,5,31.2,5,47.1c0,127-101.1,231.6-231.2,231.6c-20.7,0-48.6-5.2-63.8-9.5c-15.2-4.3-30.4-9.9-34.3-11.4c-4-1.5-8.3-2.3-12.6-2.3c-4.7,0-9.3,0.9-13.7,2.7l-76.7,27.7c-1.7,0.7-3.5,1.2-5.3,1.4c-6,0-10.8-4.9-10.8-10.9c0,0,0-0.1,0-0.1c0.1-1.3,0.3-2.5,0.7-3.7L65.6,396.1z"/><circle cx="147.5" cy="256" r="36.2"/><circle cx="256" cy="256" r="36.2"/><circle cx="364.5" cy="256" r="36.2"/></svg>',
				'file_name'   => 'dots-2-outlined.svg',
			),

			'twrp-com-ii-c-f'     => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Comments', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-ii-c-f" viewBox="0 0 512 512"><path d="M473,319.8c0.9-1.3,1.7-2.6,2.6-3.8c21.9-32.5,33.5-70.7,33.6-109.9C509.5,93.9,414.8,2.9,297.7,2.9c-102.1,0-187.3,69.5-207.2,161.7c-3,13.7-4.5,27.6-4.5,41.6C86,318.5,177,412,294.1,412c18.6,0,43.7-5.6,57.4-9.4c13.8-3.8,27.4-8.8,30.9-10.1c3.5-1.3,9-2.7,13.4-1.5l87.5,25.3c2.4,0.7,4.9-0.7,5.6-3.1c0.2-0.8,0.2-1.6,0-2.4l-20-76.3C467.6,329,467.4,327.9,473,319.8z"/><path d="M319.9,436.1c-8.7,1.4-17.5,2.2-26.3,2.3c-47.9,0-93.2-12.7-130-36.4c-23.5-14.4-43.9-33.4-60-55.7c-29.5-39.1-45.5-88.7-45.5-140.7c0-3.5,0.1-6.9,0.2-10.4c0.1-2.7-2-5-4.7-5.1c-1.5-0.1-2.9,0.5-3.8,1.6c-55.7,60.9-62.6,152-16.8,220.6c2.8,4.3,4.4,7.5,3.9,9.7L21,503.8c-0.5,2.5,1.1,4.8,3.6,5.3c0.8,0.1,1.6,0.1,2.3-0.2l76.8-27.4c4.7-1.9,10-1.8,14.6,0.2c23,9,48.4,14.6,73.9,14.6c49,0.2,96.1-18.4,131.8-52c1.9-1.9,2-4.9,0.1-6.9C323,436.4,321.4,435.9,319.9,436.1z"/></svg>',
				'file_name'   => 'comments-filled.svg',
			),

			'twrp-com-ii-c-ol'    => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Comments', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-ii-c-ol" viewBox="0 0 512 512"><path style="fill:none;stroke:currentColor;stroke-width:32;stroke-linecap:round;stroke-miterlimit:10;" d="M453.8,329c-1.1-4.1,1.4-9.7,3.7-13.8c0.7-1.2,1.5-2.4,2.4-3.5c20.3-30.2,31.2-65.7,31.2-102C491.4,105.5,403.5,21,294.8,21C200,21,120.9,85.5,102.3,171.1c-2.8,12.7-4.2,25.7-4.2,38.6c0,104.3,84.5,191.1,193.2,191.1c17.3,0,40.6-5.2,53.3-8.7c12.8-3.5,25.4-8.1,28.7-9.4c3.4-1.3,6.9-1.9,10.5-1.9c3.9,0,7.8,0.8,11.4,2.3l64.1,22.7c1.4,0.6,2.9,1,4.4,1.1c5,0,9-4,9-9c-0.1-1-0.3-2.1-0.6-3.1L453.8,329z"/><path style="fill:none;stroke:currentColor;stroke-width:32;stroke-linecap:round;stroke-miterlimit:10;" d="M41.8,228.9C11.6,283.2,14.4,349.8,49,401.4c2.6,3.9,4.1,7,3.6,9c-0.5,2-13.5,69.9-13.5,69.9c-0.6,3.2,0.5,6.6,3.1,8.7c1.7,1.3,3.7,2,5.8,2c1.1,0,2.3-0.2,3.3-0.7l63.5-24.9c4.4-1.7,9.2-1.6,13.6,0.2c21.4,8.3,45.1,13.6,68.7,13.6c31.8,0,63-8.3,90.5-24.3"/></svg>',
				'file_name'   => 'comments-outlined.svg',
			),

			'twrp-com-ii-ioc-f'   => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Ios Comments', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-ii-ioc-f" viewBox="0 0 512 512"><polygon points="346,21 21,21 21,274 147,274 147,148 346,148 	"/><path d="M166,166v253h183.6l72.3,72H437v-72h54V166H166z"/></svg>',
				'file_name'   => 'ios-comments-filled.svg',
			),

			'twrp-com-ii-ioc-ol'  => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Ios Comments', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-ii-ioc-ol" viewBox="0 0 512 512"><polygon points="39,39 328.3,39 328.3,147.5 346.4,147.5 346.4,21 21,21 21,274.1 147.5,274.1 147.5,256 39,256"/><path d="M165.6,165.6v253.1h183.7l72.3,72.3h15.1v-72.3H491V165.6H165.6z M473,400.6h-54.2v61.7l-62.1-61.7H183.7v-217H473V400.6z"/></svg>',
				'file_name'   => 'ios-comments-outlined.svg',
			),

			#endregion -- Ionicons Icons

			#region -- IconMonstr Icons

			'twrp-com-im-f'       => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Comment', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-im-f" viewBox="0 0 24 24"><path d="M24 1h-24v16.981h4v5.019l7-5.019h13z"/></svg>',
				'file_name'   => 'filled.svg',
			),

			'twrp-com-im-ol'      => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Comment', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-im-ol" viewBox="0 0 24 24"><path d="M22 3v13h-11.643l-4.357 3.105v-3.105h-4v-13h20zm2-2h-24v16.981h4v5.019l7-5.019h13v-16.981z"/></svg>',
				'file_name'   => 'outlined.svg',
			),

			'twrp-com-im-2-f'     => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Comment 2', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-im-2-f" viewBox="0 0 24 24"><path d="M.054 23c.971-1.912 2.048-4.538 1.993-6.368-1.308-1.562-2.047-3.575-2.047-5.625 0-5.781 5.662-10.007 12-10.007 6.299 0 12 4.195 12 10.007 0 6.052-6.732 11.705-15.968 9.458-1.678 1.027-5.377 2.065-7.978 2.535z"/></svg>',
				'file_name'   => '2-filled.svg',
			),

			'twrp-com-im-2-ol'    => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Comment 2', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-im-2-ol" viewBox="0 0 24 24"><path d="M12 3c5.514 0 10 3.685 10 8.213 0 5.04-5.146 8.159-9.913 8.159-2.027 0-3.548-.439-4.548-.712l-4.004 1.196 1.252-2.9c-.952-1-2.787-2.588-2.787-5.743 0-4.528 4.486-8.213 10-8.213zm0-2c-6.628 0-12 4.573-12 10.213 0 2.39.932 4.591 2.427 6.164l-2.427 5.623 7.563-2.26c1.585.434 3.101.632 4.523.632 7.098.001 11.914-4.931 11.914-10.159 0-5.64-5.372-10.213-12-10.213z"/></svg>',
				'file_name'   => '2-outlined.svg',
			),

			'twrp-com-im-t-f'     => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Dots', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-im-t-f" viewBox="0 0 24 24"><path d="M0 1v16.981h4v5.019l7-5.019h13v-16.981h-24zm7 10c-.828 0-1.5-.671-1.5-1.5s.672-1.5 1.5-1.5c.829 0 1.5.671 1.5 1.5s-.671 1.5-1.5 1.5zm5 0c-.828 0-1.5-.671-1.5-1.5s.672-1.5 1.5-1.5c.829 0 1.5.671 1.5 1.5s-.671 1.5-1.5 1.5zm5 0c-.828 0-1.5-.671-1.5-1.5s.672-1.5 1.5-1.5c.829 0 1.5.671 1.5 1.5s-.671 1.5-1.5 1.5z"/></svg>',
				'file_name'   => 'dots-filled.svg',
			),

			'twrp-com-im-t-ol'    => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Dots', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-im-t-ol" viewBox="0 0 24 24"><path d="M7 11c-.828 0-1.5-.671-1.5-1.5s.672-1.5 1.5-1.5c.829 0 1.5.671 1.5 1.5s-.671 1.5-1.5 1.5zm5 0c-.828 0-1.5-.671-1.5-1.5s.672-1.5 1.5-1.5c.829 0 1.5.671 1.5 1.5s-.671 1.5-1.5 1.5zm5 0c-.828 0-1.5-.671-1.5-1.5s.672-1.5 1.5-1.5c.829 0 1.5.671 1.5 1.5s-.671 1.5-1.5 1.5zm5-8v13h-11.643l-4.357 3.105v-3.105h-4v-13h20zm2-2h-24v16.981h4v5.019l7-5.019h13v-16.981z"/></svg>',
				'file_name'   => 'dots-outlined.svg',
			),

			'twrp-com-im-t2-f'    => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Dots 2', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-im-t2-f" viewBox="0 0 24 24"><path d="M12 1c-6.338 0-12 4.226-12 10.007 0 2.05.739 4.063 2.047 5.625.055 1.83-1.023 4.456-1.993 6.368 2.602-.47 6.301-1.508 7.978-2.536 9.236 2.247 15.968-3.405 15.968-9.457 0-5.812-5.701-10.007-12-10.007zm-5 11.5c-.829 0-1.5-.671-1.5-1.5s.671-1.5 1.5-1.5 1.5.671 1.5 1.5-.671 1.5-1.5 1.5zm5 0c-.829 0-1.5-.671-1.5-1.5s.671-1.5 1.5-1.5 1.5.671 1.5 1.5-.671 1.5-1.5 1.5zm5 0c-.828 0-1.5-.671-1.5-1.5s.672-1.5 1.5-1.5c.829 0 1.5.671 1.5 1.5s-.671 1.5-1.5 1.5z"/></svg>',
				'file_name'   => 'dots-2-filled.svg',
			),

			'twrp-com-im-t2-ol'   => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Dots 2', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-im-t2-ol" viewBox="0 0 24 24"><path d="M12 3c5.514 0 10 3.592 10 8.007 0 4.917-5.145 7.961-9.91 7.961-1.937 0-3.383-.397-4.394-.644-1 .613-1.595 1.037-4.272 1.82.535-1.373.723-2.748.602-4.265-.838-1-2.025-2.4-2.025-4.872-.001-4.415 4.485-8.007 9.999-8.007zm0-2c-6.338 0-12 4.226-12 10.007 0 2.05.738 4.063 2.047 5.625.055 1.83-1.023 4.456-1.993 6.368 2.602-.47 6.301-1.508 7.978-2.536 1.418.345 2.775.503 4.059.503 7.084 0 11.91-4.837 11.91-9.961-.001-5.811-5.702-10.006-12.001-10.006zm-3.5 10c0 .829-.671 1.5-1.5 1.5-.828 0-1.5-.671-1.5-1.5s.672-1.5 1.5-1.5c.829 0 1.5.671 1.5 1.5zm3.5-1.5c-.828 0-1.5.671-1.5 1.5s.672 1.5 1.5 1.5c.829 0 1.5-.671 1.5-1.5s-.671-1.5-1.5-1.5zm5 0c-.828 0-1.5.671-1.5 1.5s.672 1.5 1.5 1.5c.829 0 1.5-.671 1.5-1.5s-.671-1.5-1.5-1.5z"/></svg>',
				'file_name'   => 'dots-2-outlined.svg',
			),

			'twrp-com-im-co-f'    => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Content', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-im-co-f" viewBox="0 0 24 24"><path d="M0 1v16.981h4v5.019l7-5.019h13v-16.981h-24zm13 12h-8v-1h8v1zm6-3h-14v-1h14v1zm0-3h-14v-1h14v1z"/></svg>',
				'file_name'   => 'content-filled.svg',
			),

			'twrp-com-im-co-ol'   => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Content', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-im-co-ol" viewBox="0 0 24 24"><path d="M22 3v13h-11.643l-4.357 3.105v-3.105h-4v-13h20zm2-2h-24v16.981h4v5.019l7-5.019h13v-16.981zm-5 6h-14v-1h14v1zm0 2h-14v1h14v-1zm-6 3h-8v1h8v-1z"/></svg>',
				'file_name'   => 'content-outlined.svg',
			),

			'twrp-com-im-co2-f'   => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Content 2', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-im-co2-f" viewBox="0 0 24 24"><path d="M12 1c-6.338 0-12 4.226-12 10.007 0 2.05.738 4.063 2.047 5.625.055 1.83-1.023 4.456-1.993 6.368 2.602-.47 6.301-1.508 7.978-2.536 9.236 2.247 15.968-3.405 15.968-9.457 0-5.812-5.701-10.007-12-10.007zm0 14h-6v-1h6v1zm6-3h-12v-1h12v1zm0-3h-12v-1h12v1z"/></svg>',
				'file_name'   => 'content-2-filled.svg',
			),

			'twrp-com-im-co2-ol'  => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Content 2', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-im-co2-ol" viewBox="0 0 24 24"><path d="M12 3c5.514 0 10 3.592 10 8.007 0 4.917-5.145 7.961-9.91 7.961-1.937 0-3.383-.397-4.394-.644-1 .613-1.595 1.037-4.272 1.82.535-1.373.723-2.748.602-4.265-.838-1-2.025-2.4-2.025-4.872-.001-4.415 4.485-8.007 9.999-8.007zm0-2c-6.338 0-12 4.226-12 10.007 0 2.05.738 4.063 2.047 5.625.055 1.83-1.023 4.456-1.993 6.368 2.602-.47 6.301-1.508 7.978-2.536 1.418.345 2.775.503 4.059.503 7.084 0 11.91-4.837 11.91-9.961-.001-5.811-5.702-10.006-12.001-10.006zm0 14h-5v-1h5v1zm5-3h-10v-1h10v1zm0-3h-10v-1h10v1z"/></svg>',
				'file_name'   => 'content-2-outlined.svg',
			),

			'twrp-com-im-c-f'     => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Comments', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-im-c-f" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 24 24"><path d="M20 9.999v-2h4v12.001h-3v4l-5.333-4h-7.667v-4h12v-6.001zm-2 4.001h-9.667l-5.333 4v-4h-3v-14.001h18v14.001z"/></svg>',
				'file_name'   => 'comments-filled.svg',
			),

			'twrp-com-im-c-ol'    => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Comments', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-im-c-ol" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 24 24"><path d="M24 20h-3v4l-5.333-4h-7.667v-4h2v2h6.333l2.667 2v-2h3v-8.001h-2v-2h4v12.001zm-15.667-6l-5.333 4v-4h-3v-14.001l18 .001v14h-9.667zm-6.333-2h3v2l2.667-2h8.333v-10l-14-.001v10.001z"/></svg>',
				'file_name'   => 'comments-outlined.svg',
			),

			'twrp-com-im-c2-f'    => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Comments 2', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-im-c2-f" viewBox="0 0 24 24"><path d="M19.619 21.671c-5.038 1.227-8.711-1.861-8.711-5.167 0-3.175 3.11-5.467 6.546-5.467 3.457 0 6.546 2.309 6.546 5.467 0 1.12-.403 2.22-1.117 3.073-.029 1 .558 2.435 1.088 3.479-1.419-.257-3.438-.824-4.352-1.385zm-10.711-5.167c0-4.117 3.834-7.467 8.546-7.467.886 0 1.74.119 2.544.338-.021-4.834-4.761-8.319-9.998-8.319-5.281 0-10 3.527-10 8.352 0 1.71.615 3.391 1.705 4.695.047 1.527-.851 3.718-1.661 5.313 2.168-.391 5.252-1.258 6.649-2.115.803.196 1.576.304 2.328.363-.067-.379-.113-.765-.113-1.16z"/></svg>',
				'file_name'   => 'comments-2-filled.svg',
			),

			'twrp-com-im-c2-ol'   => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Comments 2', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-im-c2-ol" viewBox="0 0 24 24"><path d="M17.454 12.537c2.782 0 5.046 1.779 5.046 3.967 0 1.12-.462 1.745-1.102 2.509-.021.746-.049 1.054.139 1.866-.891-.306-.986-.396-1.666-.813-.894.218-1.489.38-2.465.38-3.087 0-4.998-2.046-4.998-3.942 0-2.188 2.264-3.967 5.046-3.967zm0-1.5c-3.436 0-6.546 2.292-6.546 5.467 0 2.799 2.633 5.442 6.498 5.442.699 0 1.44-.087 2.213-.275.914.561 2.933 1.128 4.352 1.385-.53-1.044-1.117-2.479-1.088-3.479.714-.853 1.117-1.953 1.117-3.073 0-3.158-3.089-5.467-6.546-5.467zm-8.485 4.614c-1.138-.11-1.611-.247-2.611-.491-.97.596-1.26.815-3.008 1.374.418-1.514.364-2.183.333-3.183-.834-1-1.683-2.07-1.683-3.943 0-3.502 3.589-6.352 8-6.352 4.264 0 7.748 2.664 7.978 6.004.698.038 1.377.14 2.021.315-.022-4.834-4.762-8.319-9.999-8.319-5.281 0-10 3.527-10 8.352 0 1.71.615 3.391 1.705 4.695.047 1.527-.851 3.718-1.661 5.313 2.168-.391 5.252-1.258 6.649-2.115.802.196 1.578.314 2.33.374-.135-.749-.148-1.317-.054-2.024z"/></svg>',
				'file_name'   => 'comments-2-outlined.svg',
			),

			'twrp-com-im-c3-sf'   => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Comments 3', 'backend', 'twrp' ),
				'type'        => _x( 'Semi Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-im-c3-sf" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 24 24"><path d="M24 20h-3v4l-5.333-4h-7.667v-4h2v2h6.333l2.667 2v-2h3v-8.001h-2v-2h4v12.001zm-6-6h-9.667l-5.333 4v-4h-3v-14.001h18v14.001z"/></svg>',
				'file_name'   => 'comments-3-semi-filled.svg',
			),

			'twrp-com-im-c4-sf'   => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Comments 4', 'backend', 'twrp' ),
				'type'        => _x( 'Semi Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-im-c4-sf" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 24 24"><path d="M24 20h-3v4l-5.333-4h-7.667v-4h2v2h6.333l2.667 2v-2h3v-8.001h-2v-2h4v12.001zm-6-6h-9.667l-5.333 4v-4h-3v-14.001h18v14.001zm-9-4.084h-5v1.084h5v-1.084zm5-2.916h-10v1h10v-1zm0-3h-10v1h10v-1z"/></svg>',
				'file_name'   => 'comments-4-semi-filled.svg',
			),

			'twrp-com-im-c5-sf'   => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Comments 5', 'backend', 'twrp' ),
				'type'        => _x( 'Semi Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-im-c5-sf" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 24 24"><path d="M24 20h-3v4l-5.333-4h-7.667v-4h2v2h6.333l2.667 2v-2h3v-8.001h-2v-2h4v12.001zm-6-6h-9.667l-5.333 4v-4h-3v-14.001h18v14.001zm-13-8c.552 0 1 .448 1 1s-.448 1-1 1-1-.448-1-1 .448-1 1-1zm4 0c.552 0 1 .448 1 1s-.448 1-1 1-1-.448-1-1 .448-1 1-1zm4 0c.552 0 1 .448 1 1s-.448 1-1 1-1-.448-1-1 .448-1 1-1z"/></svg>',
				'file_name'   => 'comments-5-semi-filled.svg',
			),

			'twrp-com-im-c6-f'    => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Comments 6', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-im-c6-f" viewBox="0 0 24 24"><path d="M20 9.352c0-4.852-4.751-8.352-10-8.352-5.281 0-10 3.526-10 8.352 0 1.711.615 3.391 1.705 4.695.047 1.527-.851 3.718-1.661 5.312 2.168-.391 5.252-1.258 6.649-2.115 7.697 1.877 13.307-2.842 13.307-7.892zm-14.5 1.38c-.689 0-1.25-.56-1.25-1.25s.561-1.25 1.25-1.25 1.25.56 1.25 1.25-.561 1.25-1.25 1.25zm4.5 0c-.689 0-1.25-.56-1.25-1.25s.561-1.25 1.25-1.25 1.25.56 1.25 1.25-.561 1.25-1.25 1.25zm4.5 0c-.689 0-1.25-.56-1.25-1.25s.561-1.25 1.25-1.25 1.25.56 1.25 1.25-.561 1.25-1.25 1.25zm8.383 8.789c-.029 1.001.558 2.435 1.088 3.479-1.419-.258-3.438-.824-4.352-1.385-3.365.818-6.114-.29-7.573-2.1 4.557-.66 8.241-3.557 9.489-7.342 1.48.979 2.465 2.491 2.465 4.274 0 1.12-.403 2.221-1.117 3.074z"/></svg>',
				'file_name'   => 'comments-6-filled.svg',
			),

			'twrp-com-im-c6-ol'   => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Comments 6', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-im-c6-ol" viewBox="0 0 24 24"><path d="M10 3.002c4.411 0 8 2.849 8 6.35 0 3.035-3.029 6.311-7.925 6.311-1.58 0-2.718-.317-3.718-.561-.966.593-1.256.813-3.006 1.373.415-1.518.362-2.182.331-3.184-.837-1.001-1.682-2.069-1.682-3.939 0-3.501 3.589-6.35 8-6.35zm0-2.002c-5.281 0-10 3.526-10 8.352 0 1.711.615 3.391 1.705 4.695.047 1.527-.851 3.718-1.661 5.312 2.168-.391 5.252-1.258 6.649-2.115 1.181.289 2.312.421 3.382.421 5.903 0 9.925-4.038 9.925-8.313 0-4.852-4.751-8.352-10-8.352zm11.535 11.174c-.161.488-.361.961-.601 1.416 1.677 1.262 2.257 3.226.464 5.365-.021.745-.049 1.049.138 1.865-.892-.307-.979-.392-1.665-.813-2.127.519-4.265.696-6.089-.855-.562.159-1.145.278-1.74.364 1.513 1.877 4.298 2.897 7.577 2.1.914.561 2.933 1.127 4.352 1.385-.53-1.045-1.117-2.479-1.088-3.479 1.755-2.098 1.543-5.436-1.348-7.348zm-15.035-3.763c-.591 0-1.071.479-1.071 1.071s.48 1.071 1.071 1.071 1.071-.479 1.071-1.071-.48-1.071-1.071-1.071zm3.5 0c-.591 0-1.071.479-1.071 1.071s.48 1.071 1.071 1.071 1.071-.479 1.071-1.071-.48-1.071-1.071-1.071zm3.5 0c-.591 0-1.071.479-1.071 1.071s.48 1.071 1.071 1.071 1.071-.479 1.071-1.071-.48-1.071-1.071-1.071z"/></svg>',
				'file_name'   => 'comments-6-outlined.svg',
			),

			'twrp-com-im-c6-t'    => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Comments 6', 'backend', 'twrp' ),
				'type'        => _x( 'Thin', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-im-c6-t" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 24 24"><path d="M20 15c0 .552-.448 1-1 1s-1-.448-1-1 .448-1 1-1 1 .448 1 1m-3 0c0 .552-.448 1-1 1s-1-.448-1-1 .448-1 1-1 1 .448 1 1m-3 0c0 .552-.448 1-1 1s-1-.448-1-1 .448-1 1-1 1 .448 1 1m5.415 4.946c-1 .256-1.989.482-3.324.482-3.465 0-7.091-2.065-7.091-5.423 0-3.128 3.14-5.672 7-5.672 3.844 0 7 2.542 7 5.672 0 1.591-.646 2.527-1.481 3.527l.839 2.686-2.943-1.272zm-13.373-3.375l-4.389 1.896 1.256-4.012c-1.121-1.341-1.909-2.665-1.909-4.699 0-4.277 4.262-7.756 9.5-7.756 5.018 0 9.128 3.194 9.467 7.222-1.19-.566-2.551-.889-3.967-.889-4.199 0-8 2.797-8 6.672 0 .712.147 1.4.411 2.049-.953-.126-1.546-.272-2.369-.483m17.958-1.566c0-2.172-1.199-4.015-3.002-5.21l.002-.039c0-5.086-4.988-8.756-10.5-8.756-5.546 0-10.5 3.698-10.5 8.756 0 1.794.646 3.556 1.791 4.922l-1.744 5.572 6.078-2.625c.982.253 1.932.407 2.85.489 1.317 1.953 3.876 3.314 7.116 3.314 1.019 0 2.105-.135 3.242-.428l4.631 2-1.328-4.245c.871-1.042 1.364-2.384 1.364-3.75"/></svg>',
				'file_name'   => 'comments-6-thin.svg',
			),

			'twrp-com-im-c7-sf'   => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Comments 7', 'backend', 'twrp' ),
				'type'        => _x( 'Semi Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-im-c7-sf" viewBox="0 0 24 24"><path d="M20 9.352c0-4.852-4.75-8.352-10-8.352-5.281 0-10 3.527-10 8.352 0 1.71.615 3.39 1.705 4.695.047 1.527-.85 3.719-1.66 5.312 2.168-.391 5.252-1.258 6.648-2.115 7.698 1.877 13.307-2.842 13.307-7.892zm-14.5 1.381c-.689 0-1.25-.56-1.25-1.25s.561-1.25 1.25-1.25 1.25.56 1.25 1.25-.561 1.25-1.25 1.25zm4.5 0c-.689 0-1.25-.56-1.25-1.25s.561-1.25 1.25-1.25 1.25.56 1.25 1.25-.561 1.25-1.25 1.25zm4.5 0c-.689 0-1.25-.56-1.25-1.25s.561-1.25 1.25-1.25 1.25.56 1.25 1.25-.561 1.25-1.25 1.25zm7.036 1.441c-.161.488-.361.961-.601 1.416 1.677 1.262 2.257 3.226.464 5.365-.021.745-.049 1.049.138 1.865-.892-.307-.979-.392-1.665-.813-2.127.519-4.265.696-6.089-.855-.562.159-1.145.278-1.74.364 1.513 1.877 4.298 2.897 7.577 2.1.914.561 2.933 1.127 4.352 1.385-.53-1.045-1.117-2.479-1.088-3.479 1.755-2.098 1.543-5.436-1.348-7.348z"/></svg>',
				'file_name'   => 'comments-7-semi-filled.svg',
			),

			'twrp-com-im-c7-sol'  => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Comments 7', 'backend', 'twrp' ),
				'type'        => _x( 'Semi Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-im-c7-sol" viewBox="0 0 24 24"><path d="M2.001 9.352c0 1.873.849 2.943 1.683 3.943.031 1 .085 1.668-.333 3.183 1.748-.558 2.038-.778 3.008-1.374 1 .244 1.474.381 2.611.491-.094.708-.081 1.275.055 2.023-.752-.06-1.528-.178-2.33-.374-1.397.857-4.481 1.725-6.649 2.115.811-1.595 1.708-3.785 1.661-5.312-1.09-1.305-1.705-2.984-1.705-4.695-.001-4.826 4.718-8.352 9.999-8.352 5.237 0 9.977 3.484 9.998 8.318-.644-.175-1.322-.277-2.021-.314-.229-3.34-3.713-6.004-7.977-6.004-4.411 0-8 2.85-8 6.352zm20.883 10.169c-.029 1.001.558 2.435 1.088 3.479-1.419-.258-3.438-.824-4.352-1.385-.772.188-1.514.274-2.213.274-3.865 0-6.498-2.643-6.498-5.442 0-3.174 3.11-5.467 6.546-5.467 3.457 0 6.546 2.309 6.546 5.467 0 1.12-.403 2.221-1.117 3.074zm-7.563-3.021c0-.453-.368-.82-.82-.82s-.82.367-.82.82.368.82.82.82.82-.367.82-.82zm3 0c0-.453-.368-.82-.82-.82s-.82.367-.82.82.368.82.82.82.82-.367.82-.82zm3 0c0-.453-.368-.82-.82-.82s-.82.367-.82.82.368.82.82.82.82-.367.82-.82z"/></svg>',
				'file_name'   => 'comments-7-semi-outlined.svg',
			),

			#endregion -- IconMonstr Icons

			#region -- Capicon Icons

			'twrp-com-ci-f'       => array(
				'brand'       => 'Capicon',
				'description' => _x( 'Comment', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-ci-f" viewBox="0 0 32 31.965"><path d="M30.902,0.151c-9.09-1.363-29.323,6.872-30.106,8.18c-2.387,3.977,1.249,17.838,2.367,18.632c0.406,0.29,3.769,0.098,7.974-0.347c1.03,2.213,2.659,5.421,3.405,5.348c0.727-0.073,2.661-3.678,3.962-6.269c5.405-0.778,10.37-1.736,11.264-2.48C32.085,21.279,32.822,0.439,30.902,0.151z M8.217,9.934l17.516-3.87l-0.088,2.751L8.116,12.851L8.217,9.934z M24.473,19.898L8.14,23.658l-0.297-2.824l17.031-3.764L24.473,19.898z M28.225,13.628L4.162,19.167l0.101-2.952l24.055-5.313L28.225,13.628z"/></svg>',
				'file_name'   => 'filled.svg',
			),

			'twrp-com-ci-ol'      => array(
				'brand'       => 'Capicon',
				'description' => _x( 'Comment', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-ci-ol" viewBox="0 0 31.244 32"><path d="M29.511,0.397C21.369-2.011,1.774,7.249,1.145,8.509c-2.603,5.203-0.204,17.772,1.634,18.873c0.396,0.235,2.928,0.089,6.813-0.321c0.952,2.043,3.56,4.938,4.252,4.939c1.601,0,4.12-3.396,5.321-5.789c4.993-0.721,9.025-1.607,9.852-2.293C31.157,22.13,32.494,1.279,29.511,0.397z M26.497,22.127c-0.725,0.604-4.756,1.383-9.146,2.018c-1.055,2.104-2.625,5.028-3.217,5.088c-0.607,0.062-1.929-2.545-2.764-4.342c-3.416,0.359-6.707,0.526-7.029,0.28c-1.587-1.194-2.569-13.743-0.816-15.13c1.522-1.203,16.514-7.75,23.895-6.644C28.979,3.633,28.381,20.557,26.497,22.127z"/><polygon points="23.222,8.199 8.997,11.342 8.915,13.712 23.149,10.434"/><polygon points="5.704,18.84 25.245,14.342 25.321,12.128 5.786,16.444"/><polygon points="8.934,22.486 22.196,19.434 22.524,17.139 8.693,20.193"/></svg>',
				'file_name'   => 'outlined.svg',
			),

			'twrp-com-ci-2-f'     => array(
				'brand'       => 'Capicon',
				'description' => _x( 'Comment 2', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-ci-2-f" viewBox="0 -1.308 32 32"><path d="M25.977,1.701C23.786,0.719,13.924-3.248,4.26,5.887c0,0-10.146,10.16,0.877,16.729c1.322,0.785,3.462,1.309,4.084,1.703c0.497,0.318,0.128,4.837,0.697,5.039c1.171,0.414,5.989-4.435,6.531-4.756c0.805-0.479,13.226-2.783,15.264-11.353C33.256,6.768,28.165,2.682,25.977,1.701z"/></svg>',
				'file_name'   => '2-filled.svg',
			),

			'twrp-com-ci-3-f'     => array(
				'brand'       => 'Capicon',
				'description' => _x( 'Comment 3', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-ci-3-f" viewBox="0 -1.308 32 32"><path d="M25.975,1.701C23.785,0.719,13.923-3.248,4.26,5.889c0,0-10.146,10.158,0.877,16.728c1.323,0.786,3.462,1.309,4.085,1.704c0.497,0.318,0.127,4.839,0.697,5.039c1.17,0.414,5.988-4.436,6.531-4.756c0.805-0.479,13.225-2.783,15.264-11.354C33.256,6.768,28.165,2.682,25.975,1.701z M11.548,13.205c-0.632,1.313-1.935,2-2.909,1.53c-0.974-0.469-1.25-1.914-0.618-3.229c0.633-1.314,1.935-2,2.909-1.531C11.904,10.445,12.181,11.891,11.548,13.205z M18.674,13.504c-0.855,1.776-2.616,2.705-3.934,2.069c-1.316-0.633-1.691-2.588-0.836-4.364c0.855-1.777,2.618-2.705,3.933-2.07C19.156,9.771,19.529,11.727,18.674,13.504z M24.529,13.205c-0.633,1.313-1.938,2-2.91,1.53c-0.975-0.469-1.251-1.914-0.618-3.229c0.632-1.314,1.935-2,2.908-1.531C24.885,10.445,25.161,11.891,24.529,13.205z"/></svg>',
				'file_name'   => '3-filled.svg',
			),

			'twrp-com-ci-4-f'     => array(
				'brand'       => 'Capicon',
				'description' => _x( 'Comment 4', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-ci-4-f" viewBox="0 -5.352 32 32"><path d="M15.328,13.5c0.745-3.133-1.716-5.108-2.773-5.583C11.496,7.443,6.729,5.526,2.059,9.941c0,0-4.903,4.911,0.424,8.084c0.639,0.382,1.673,0.634,1.974,0.824c0.24,0.151,0.062,2.338,0.337,2.437c0.565,0.2,2.894-2.144,3.156-2.3C8.34,18.756,14.342,17.643,15.328,13.5z"/><path d="M25.041,1.063C14.528-2.508,8.422,3.934,7.102,5.441C6.955,5.609,6.794,5.82,6.629,6.066c3.733-1.076,6.833,0.181,7.736,0.586c1.304,0.584,4.335,3.019,3.417,6.88c-0.75,3.149-3.853,4.877-6.232,5.807c4.709,1.435,10.188,0.113,10.749,0.175c0.525,0.055,5.869,2.06,6.612,1.336c0.362-0.353-1.49-3.65-1.224-4.065c0.334-0.519,1.774-1.656,2.506-2.716C36.275,5.246,25.041,1.063,25.041,1.063z"/></svg>',
				'file_name'   => '4-filled.svg',
			),

			#endregion -- Capicon Icons

			#region -- Feather Icons

			'twrp-com-ci-sq-f'    => array(
				'brand'       => 'Feather',
				'description' => _x( 'Square', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-ci-sq-f" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>',
				'file_name'   => 'square-outlined.svg',
			),

			'twrp-com-ci-ci-f'    => array(
				'brand'       => 'Feather',
				'description' => _x( 'Circle', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-ci-ci-f" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>',
				'file_name'   => 'circle-outlined.svg',
			),

			#endregion -- Feather Icons

			#region -- Jam Icons

			'twrp-com-ji-f'       => array(
				'brand'       => 'JamIcons',
				'description' => _x( 'Comment', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-ji-f" viewBox="-2 -2 24 24"><path d="M3 .565h14a3 3 0 0 1 3 3v8a3 3 0 0 1-3 3h-6.958l-6.444 4.808A1 1 0 0 1 2 18.57v-4.006a2 2 0 0 1-2-2v-9a3 3 0 0 1 3-3z" /></svg>',
				'file_name'   => 'filled.svg',
			),

			'twrp-com-ji-ol'      => array(
				'brand'       => 'JamIcons',
				'description' => _x( 'Comment', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-ji-ol" viewBox="-2 -2.5 24 24"><path d="M9.378 12H17a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1 1 1 0 0 1 1 1v3.013L9.378 12zM3 0h14a3 3 0 0 1 3 3v8a3 3 0 0 1-3 3h-6.958l-6.444 4.808A1 1 0 0 1 2 18.006V14a2 2 0 0 1-2-2V3a3 3 0 0 1 3-3z"/></svg>',
				'file_name'   => 'outlined.svg',
			),

			'twrp-com-ji-2-f'     => array(
				'brand'       => 'JamIcons',
				'description' => _x( 'Comment 2', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-ji-2-f" viewBox="-3 -2 24 24"><path d="M10.01 15.959c-.186.018-1.626 1.276-4.321 3.774a1 1 0 0 1-1.68-.742c.02-2.362.011-3.709-.024-4.04-.018-.173.032-.28 0-.3C1.708 13.212 0 10.775 0 8.005 0 3.584 4.03 0 9 0s9 3.584 9 8.004c0 4.117-3.495 7.509-7.99 7.955z" /></svg>',
				'file_name'   => 'alt-filled.svg',
			),

			'twrp-com-ji-2-ol'    => array(
				'brand'       => 'JamIcons',
				'description' => _x( 'Comment 2', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-ji-2-ol" viewBox="-3 -2 24 24"><path d="M5.978 14.969a.38.38 0 0 1 .002-.033l-.002.033zm.001-.167a1.36 1.36 0 0 0 .001.003v-.003zm.04 1.9c2.678-2.462 3.007-2.656 3.793-2.734C13.364 13.615 16 11.01 16 8.004c0-3.26-3.085-6.003-7-6.003S2 4.745 2 8.004c0 1.893 1.175 3.767 3.054 4.957.783.495.958 1.117.941 1.778a2.548 2.548 0 0 1-.009.15c.022.33.032.92.033 1.814zm3.99-.743c-.185.018-1.625 1.276-4.32 3.774a1 1 0 0 1-1.68-.742c.02-2.362.011-3.709-.024-4.04-.018-.173.032-.28 0-.3C1.708 13.212 0 10.775 0 8.005 0 3.584 4.03 0 9 0s9 3.584 9 8.004c0 4.117-3.495 7.509-7.99 7.955z"/></svg>',
				'file_name'   => 'alt-outlined.svg',
			),

			'twrp-com-ji-c-f'     => array(
				'brand'       => 'JamIcons',
				'description' => _x( 'Comments', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-ji-c-f" viewBox="-2 -2.5 24 24"><path d="M3.656 17.979A1 1 0 0 1 2 17.243V15a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h11a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H8.003l-4.347 2.979zM16 10.017a7.136 7.136 0 0 0 0 .369v-.37c.005-.107.006-1.447.004-4.019a3 3 0 0 0-3-2.997H5V2a2 2 0 0 1 2-2h11a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2v2.243a1 1 0 0 1-1.656.736L16 13.743v-3.726z" /></svg>',
				'file_name'   => 'comments-filled.svg',
			),

			'twrp-com-ji-c-ol'    => array(
				'brand'       => 'JamIcons',
				'description' => _x( 'Comments', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-ji-c-ol" viewBox="-2 -2.5 24 24"><path d="M3.656 17.979A1 1 0 0 1 2 17.243V15a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h11a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H8.003l-4.347 2.979zm.844-3.093a.536.536 0 0 0 .26-.069l2.355-1.638A1 1 0 0 1 7.686 13H12a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v5c0 .54.429.982 1 1 .41.016.707.083.844.226.128.134.135.36.156.79.003.063.003.177 0 .37a.5.5 0 0 0 .5.5zm11.5-4.87a7.136 7.136 0 0 0 0 .37v-.37c.02-.43.028-.656.156-.79.137-.143.434-.21.844-.226.571-.018 1-.46 1-1V3a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1H5V2a2 2 0 0 1 2-2h11a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2v2.243a1 1 0 0 1-1.656.736L16 13.743v-3.726z" /></svg>',
				'file_name'   => 'comments-outlined.svg',
			),

			'twrp-com-ji-c2-f'    => array(
				'brand'       => 'JamIcons',
				'description' => _x( 'Comments 2', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-ji-c2-f" viewBox="-2 -2 24 24"><path d="M7.46 2.332C8.74.913 10.746 0 13 0c3.866 0 7 2.686 7 6 0 1.989-1.13 3.752-2.868 4.844a2.826 2.826 0 0 1-.132.076v4.05a1 1 0 0 1-1.718.696l-1.14-1.174c1.069-1.264 1.698-2.816 1.698-4.493 0-4.067-3.698-7.395-8.38-7.667z"/><path d="M8.385 15.886l-3.667 3.78A1 1 0 0 1 3 18.97v-4.05a2.826 2.826 0 0 1-.132-.076C1.129 13.752 0 11.989 0 10c0-3.314 3.134-6 7-6s7 2.686 7 6c0 2.726-2.121 5.028-5.026 5.758a8.17 8.17 0 0 1-.589.128z"/></svg>',
				'file_name'   => 'comments-alt-filled.svg',
			),

			'twrp-com-ji-c2-ol'   => array(
				'brand'       => 'JamIcons',
				'description' => _x( 'Comments 2', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-ji-c2-ol" viewBox="-2 -2 24 24"><path d="M7.403 14.026l.64-.11c.124-.022.272-.054.443-.098C10.6 13.288 12 11.708 12 10c0-2.135-2.176-4-5-4s-5 1.865-5 4c0 1.218.702 2.378 1.931 3.15l.036.02L5 13.74v2.763l2.403-2.477zm.982 1.86l-3.667 3.78A1 1 0 0 1 3 18.97v-4.05a2.826 2.826 0 0 1-.132-.076C1.129 13.752 0 11.989 0 10c0-3.314 3.134-6 7-6s7 2.686 7 6c0 2.726-2.121 5.028-5.026 5.758a8.17 8.17 0 0 1-.589.128zM6.936 3C8.146 1.207 10.41 0 13 0c3.866 0 7 2.686 7 6 0 1.989-1.13 3.752-2.868 4.844a2.826 2.826 0 0 1-.132.076v4.05a1 1 0 0 1-1.718.696l-1.735-1.788 1.043-1.798.41.423V9.74l1.033-.57.036-.02C17.299 8.378 18 7.218 18 6c0-2.135-2.176-4-5-4-1.28 0-2.426.383-3.297 1H6.936z"/></svg>',
				'file_name'   => 'comments-alt-outlined.svg',
			),

			'twrp-com-ji-t-f'     => array(
				'brand'       => 'JamIcons',
				'description' => _x( 'Dots', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-ji-t-f" viewBox="-2 -2 24 24"><path d="M3 .858h14a3 3 0 0 1 3 3v8a3 3 0 0 1-3 3h-6.958l-6.444 4.808A1 1 0 0 1 2 18.864v-4.006a2 2 0 0 1-2-2v-9a3 3 0 0 1 3-3zm10 9a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm-6 0a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" /></svg>',
				'file_name'   => 'dots-filled.svg',
			),

			'twrp-com-ji-t-ol'    => array(
				'brand'       => 'JamIcons',
				'description' => _x( 'Dots', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-ji-t-ol" viewBox="-2 -2.5 24 24"><path d="M3 0h14a3 3 0 0 1 3 3v8a3 3 0 0 1-3 3h-6.958l-6.444 4.808A1 1 0 0 1 2 18.006V14a2 2 0 0 1-2-2V3a3 3 0 0 1 3-3zm6.378 12H17a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1 1 1 0 0 1 1 1v3.013L9.378 12zM13 9a2 2 0 1 1 0-4 2 2 0 0 1 0 4zM7 9a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"/></svg>',
				'file_name'   => 'dots-outlined.svg',
			),

			'twrp-com-ji-t2-f'    => array(
				'brand'       => 'JamIcons',
				'description' => _x( 'Dots 2', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-ji-t2-f" viewBox="-3 -2 24 24"><path d="M10.01 15.959c-.186.018-1.626 1.276-4.321 3.774a1 1 0 0 1-1.68-.742c.02-2.362.011-3.709-.024-4.04-.018-.173.032-.28 0-.3C1.708 13.212 0 10.775 0 8.005 0 3.584 4.03 0 9 0s9 3.584 9 8.004c0 4.117-3.495 7.509-7.99 7.955zM12 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm-6 0a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" /></svg>',
				'file_name'   => 'dots-alt-filled.svg',
			),

			'twrp-com-ji-t2-ol'   => array(
				'brand'       => 'JamIcons',
				'description' => _x( 'Dots 2', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-ji-t2-ol" viewBox="-3 -2 24 24"><path d="M10.01 15.959c-.186.018-1.626 1.276-4.321 3.774a1 1 0 0 1-1.68-.742c.02-2.362.011-3.709-.024-4.04-.018-.173.032-.28 0-.3C1.708 13.212 0 10.775 0 8.005 0 3.584 4.03 0 9 0s9 3.584 9 8.004c0 4.117-3.495 7.509-7.99 7.955zm-3.99.744c2.677-2.463 3.006-2.657 3.792-2.735C13.364 13.615 16 11.01 16 8.004c0-3.26-3.085-6.003-7-6.003S2 4.745 2 8.004c0 1.893 1.175 3.767 3.054 4.957.783.495.958 1.117.941 1.778a2.548 2.548 0 0 1-.009.15c.022.33.032.92.033 1.814zM12 10a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm-6 0a2 2 0 1 1 0-4 2 2 0 0 1 0 4z" /></svg>',
				'file_name'   => 'dots-alt-outlined.svg',
			),

			#endregion -- Jam Icons

			#region -- Linea Icons

			'twrp-com-li-ol'      => array(
				'brand'       => 'Linea',
				'description' => _x( 'Comment', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-li-ol" viewBox="0 0 64 64"><polygon fill="none" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" points="32,47 63,47 63,5 1,5 1,47 18,47 18,59"/></svg>',
				'file_name'   => 'comment-outlined.svg',
			),

			'twrp-com-li-c-ol'    => array(
				'brand'       => 'Linea',
				'description' => _x( 'Comments', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-li-c-ol" viewBox="0 0 64 64"><polygon fill="none" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" points="26,49.042 54.963,49.042 54.963,11.042 1,11.042 1,49.042 14,49.042 14,59.486"/><polyline fill="none" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" points="57,41.042 62.963,41.042 62.963,3.042 9,3.042 9,9"/></svg>',
				'file_name'   => 'comments-outlined.svg',
			),

			'twrp-com-li-l-ol'    => array(
				'brand'       => 'Linea',
				'description' => _x( 'Lines', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-li-l-ol" viewBox="0 0 64 64"><line fill="none" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" x1="10" y1="16" x2="54" y2="16"/><line fill="none" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" x1="10" y1="26" x2="54" y2="26"/><line fill="none" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" x1="10" y1="36" x2="54" y2="36"/><polygon fill="none" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" points="32,47 63,47 63,5 1,5 1,47 18,47 18,59"/></svg>',
				'file_name'   => 'lines-outlined.svg',
			),

			'twrp-com-li-d-ol'    => array(
				'brand'       => 'Linea',
				'description' => _x( 'Dots', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-li-d-ol" viewBox="0 0 64 64"><polygon fill="none" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" points="32,47 63,47 63,5 1,5 1,47 18,47 18,59"/><line fill="none" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" x1="29" y1="26" x2="35" y2="26"/><line fill="none" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" x1="39" y1="26" x2="45" y2="26"/><line fill="none" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" x1="19" y1="26" x2="25" y2="26"/></svg>',
				'file_name'   => 'dots-outlined.svg',
			),

			'twrp-com-li-he-ol'   => array(
				'brand'       => 'Linea',
				'description' => _x( 'Heart', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-li-he-ol" viewBox="0 0 64 64"><polygon fill="none" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" points="32,47 63,47 63,5 1,5 1,47 18,47 18,59"/><path fill="none" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" d="M22,23c0,6.666,10,12,10,12s10-5.334,10-12c0-2.762-2-5-5-5c-2.762,0-5,2.238-5,5c0-2.762-2.238-5-5-5C24,18,22,20.238,22,23z"/></svg>',
				'file_name'   => 'heart-outlined.svg',
			),

			'twrp-com-li-ha-ol'   => array(
				'brand'       => 'Linea',
				'description' => _x( 'Happy', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-li-ha-ol" viewBox="0 0 64 64"><path fill="none" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" d="M24,30c0,4.418,3.582,8,8,8s8-3.582,8-8"/><line fill="none" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" x1="18" y1="20" x2="20" y2="20"/><line fill="none" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" x1="46" y1="20" x2="44" y2="20"/><polygon fill="none" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" points="32,47 63,47 63,5 1,5 1,47 18,47 18,59"/></svg>',
				'file_name'   => 'happy-outlined.svg',
			),

			#endregion -- Linea Icons

			#region -- Octicons Icons

			'twrp-com-oi-f'       => array(
				'brand'       => 'Octicons',
				'description' => _x( 'Comment', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-oi-f" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M3.25 4a.25.25 0 00-.25.25v12.5c0 .138.112.25.25.25h2.5a.75.75 0 01.75.75v3.19l3.72-3.72a.75.75 0 01.53-.22h10a.25.25 0 00.25-.25V4.25a.25.25 0 00-.25-.25H3.25zm-1.75.25c0-.966.784-1.75 1.75-1.75h17.5c.966 0 1.75.784 1.75 1.75v12.5a1.75 1.75 0 01-1.75 1.75h-9.69l-3.573 3.573A1.457 1.457 0 015 21.043V18.5H3.25a1.75 1.75 0 01-1.75-1.75V4.25z"></path></svg>',
				'file_name'   => 'filled.svg',
			),

			'twrp-com-oi-c-f'     => array(
				'brand'       => 'Octicons',
				'description' => _x( 'Comments', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-oi-c-f" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1.5 2.75a.25.25 0 01.25-.25h8.5a.25.25 0 01.25.25v5.5a.25.25 0 01-.25.25h-3.5a.75.75 0 00-.53.22L3.5 11.44V9.25a.75.75 0 00-.75-.75h-1a.25.25 0 01-.25-.25v-5.5zM1.75 1A1.75 1.75 0 000 2.75v5.5C0 9.216.784 10 1.75 10H2v1.543a1.457 1.457 0 002.487 1.03L7.061 10h3.189A1.75 1.75 0 0012 8.25v-5.5A1.75 1.75 0 0010.25 1h-8.5zM14.5 4.75a.25.25 0 00-.25-.25h-.5a.75.75 0 110-1.5h.5c.966 0 1.75.784 1.75 1.75v5.5A1.75 1.75 0 0114.25 12H14v1.543a1.457 1.457 0 01-2.487 1.03L9.22 12.28a.75.75 0 111.06-1.06l2.22 2.22v-2.19a.75.75 0 01.75-.75h1a.25.25 0 00.25-.25v-5.5z"></path></svg>',
				'file_name'   => 'comments-filled.svg',
			),

			#endregion -- Octicons Icons

			#region -- Typicons Icons

			'twrp-com-ti-f'       => array(
				'brand'       => 'Typicons',
				'description' => _x( 'Comment', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-ti-f" viewBox="0 0 24 24"><path d="M20,4.5c0.7,0,1.3,0.6,1.3,1.3v8.8c0,0.7-0.6,1.3-1.3,1.3H8.2L8,16v-0.2H4c-0.7,0-1.3-0.6-1.3-1.3V5.8c0-0.7,0.6-1.3,1.3-1.3H20 M20,2H4C1.8,2,0,3.7,0,5.8v8.8c0,2.1,1.8,3.8,4,3.8h1.3V22l4-3.8H20c2.2,0,4-1.7,4-3.8V5.8C24,3.7,22.2,2,20,2z"/></svg>',
				'file_name'   => 'outlined.svg',
			),

			'twrp-com-ti-d-f'     => array(
				'brand'       => 'Typicons',
				'description' => _x( 'Dots', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-ti-d-f" viewBox="0 0 24 24"><path d="M20.1,2H3.8C1.7,2,0,3.7,0,5.8v8.8c0,2.1,1.7,3.8,3.8,3.8H5V22l3.8-3.8h11.3c2.1,0,3.8-1.7,3.8-3.8V5.8C23.9,3.7,22.2,2,20.1,2z M21.4,14.5c0,0.7-0.6,1.3-1.3,1.3H3.8c-0.7,0-1.3-0.6-1.3-1.3V5.8c0-0.7,0.6-1.3,1.3-1.3h16.4c0.7,0,1.3,0.6,1.3,1.3V14.5z M6.3,12.6c-1.4,0-2.5-1.1-2.5-2.5s1.1-2.5,2.5-2.5s2.5,1.1,2.5,2.5S7.7,12.6,6.3,12.6z M6.3,8.9C5.6,8.9,5,9.4,5,10.1s0.6,1.3,1.3,1.3s1.3-0.6,1.3-1.3S7,8.9,6.3,8.9z M11.9,12.6c-1.4,0-2.5-1.1-2.5-2.5s1.1-2.5,2.5-2.5s2.5,1.1,2.5,2.5S13.3,12.6,11.9,12.6z M11.9,8.9c-0.7,0-1.3,0.6-1.3,1.3s0.6,1.3,1.3,1.3s1.3-0.6,1.3-1.3S12.6,8.9,11.9,8.9z M17.6,12.6c-1.4,0-2.5-1.1-2.5-2.5s1.1-2.5,2.5-2.5s2.5,1.1,2.5,2.5S19,12.6,17.6,12.6z M17.6,8.9c-0.7,0-1.3,0.6-1.3,1.3s0.6,1.3,1.3,1.3c0.7,0,1.3-0.6,1.3-1.3S18.3,8.9,17.6,8.9z"/></svg>',
				'file_name'   => 'dots-outlined.svg',
			),

			'twrp-com-ti-c-f'     => array(
				'brand'       => 'Typicons',
				'description' => _x( 'Comments', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-com-ti-c-f" viewBox="0 0 24 24"><path d="M21 7h-3c0-1.65-1.35-3-3-3h-12c-1.65 0-3 1.35-3 3v7c0 1.65 1.35 3 3 3v3l3-3c0 1.65 1.35 3 3 3h8l3 3v-3h1c1.65 0 3-1.35 3-3v-7c0-1.65-1.35-3-3-3zm-18 8c-.542 0-1-.458-1-1v-7c0-.542.458-1 1-1h12c.542 0 1 .458 1 1v1h-6.5c-1.379 0-2.5 1.121-2.5 2.5v4.5h-4zm19 2c0 .542-.458 1-1 1h-12c-.542 0-1-.458-1-1v-6.5c0-.827.673-1.5 1.5-1.5h11.5c.542 0 1 .458 1 1v7z"/></svg>',
				'file_name'   => 'comments-outlined.svg',
			),

			#endregion -- Typicons Icons

		);

		return $registered_comment_vectors;
	}


}
