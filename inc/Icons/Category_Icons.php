<?php
/**
 * File that contains the class with the same name.
 */

namespace TWRP\Icons;

/**
 * Class that holds all category icon definitions.
 */
class Category_Icons {

	/**
	 * Get all registered icons that represents the category.
	 *
	 * Keywords to search for:  tag, bookmark, hashtag, taxonomy, category.
	 *
	 * @return array<string,array>
	 */
	public static function get_category_icons() {
		$registered_category_vectors = array(

			#region -- FontAwesome Icons

			'twrp-tax-fa-f'      => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'Tag', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-fa-f" viewBox="0 0 512 512"><path d="M0 252.118V48C0 21.49 21.49 0 48 0h204.118a48 48 0 0 1 33.941 14.059l211.882 211.882c18.745 18.745 18.745 49.137 0 67.882L293.823 497.941c-18.745 18.745-49.137 18.745-67.882 0L14.059 286.059A48 48 0 0 1 0 252.118zM112 64c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.49-48-48-48z"></path></svg>',
				'file_name'   => 'tag-filled.svg',
			),

			'twrp-tax-fa-t-f'    => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'Tags', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-fa-t-f" viewBox="0 0 640 512"><path d="M497.941 225.941L286.059 14.059A48 48 0 0 0 252.118 0H48C21.49 0 0 21.49 0 48v204.118a48 48 0 0 0 14.059 33.941l211.882 211.882c18.744 18.745 49.136 18.746 67.882 0l204.118-204.118c18.745-18.745 18.745-49.137 0-67.882zM112 160c-26.51 0-48-21.49-48-48s21.49-48 48-48 48 21.49 48 48-21.49 48-48 48zm513.941 133.823L421.823 497.941c-18.745 18.745-49.137 18.745-67.882 0l-.36-.36L527.64 323.522c16.999-16.999 26.36-39.6 26.36-63.64s-9.362-46.641-26.36-63.64L331.397 0h48.721a48 48 0 0 1 33.941 14.059l211.882 211.882c18.745 18.745 18.745 49.137 0 67.882z"></path></svg>',
				'file_name'   => 'tags-filled.svg',
			),

			'twrp-tax-fa-f-f'    => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'Folder', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-fa-f-f" viewBox="0 0 512 512"><path d="M464 128H272l-64-64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V176c0-26.51-21.49-48-48-48z"></path></svg>',
				'file_name'   => 'folder-filled.svg',
			),

			'twrp-tax-fa-f-ol'   => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'Folder', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-fa-f-ol" viewBox="0 0 512 512"><path d="M464 128H272l-54.63-54.63c-6-6-14.14-9.37-22.63-9.37H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V176c0-26.51-21.49-48-48-48zm0 272H48V112h140.12l54.63 54.63c6 6 14.14 9.37 22.63 9.37H464v224z"></path></svg>',
				'file_name'   => 'folder-outlined.svg',
			),

			'twrp-tax-fa-fo-f'   => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'Folder Open', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-fa-fo-f" viewBox="0 0 576 512"><path d="M572.694 292.093L500.27 416.248A63.997 63.997 0 0 1 444.989 448H45.025c-18.523 0-30.064-20.093-20.731-36.093l72.424-124.155A64 64 0 0 1 152 256h399.964c18.523 0 30.064 20.093 20.73 36.093zM152 224h328v-48c0-26.51-21.49-48-48-48H272l-64-64H48C21.49 64 0 85.49 0 112v278.046l69.077-118.418C86.214 242.25 117.989 224 152 224z"></path></svg>',
				'file_name'   => 'folder-open-filled.svg',
			),

			'twrp-tax-fa-fo-ol'  => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'Folder Open', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-fa-fo-ol" viewBox="0 0 576 512"><path d="M527.9 224H480v-48c0-26.5-21.5-48-48-48H272l-64-64H48C21.5 64 0 85.5 0 112v288c0 26.5 21.5 48 48 48h400c16.5 0 31.9-8.5 40.7-22.6l79.9-128c20-31.9-3-73.4-40.7-73.4zM48 118c0-3.3 2.7-6 6-6h134.1l64 64H426c3.3 0 6 2.7 6 6v42H152c-16.8 0-32.4 8.8-41.1 23.2L48 351.4zm400 282H72l77.2-128H528z"></path></svg>',
				'file_name'   => 'folder-open-outlined.svg',
			),

			'twrp-tax-fa-h-f'    => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'Hashtag', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-fa-h-f" viewBox="0 0 448 512"><path d="M440.667 182.109l7.143-40c1.313-7.355-4.342-14.109-11.813-14.109h-74.81l14.623-81.891C377.123 38.754 371.468 32 363.997 32h-40.632a12 12 0 0 0-11.813 9.891L296.175 128H197.54l14.623-81.891C213.477 38.754 207.822 32 200.35 32h-40.632a12 12 0 0 0-11.813 9.891L132.528 128H53.432a12 12 0 0 0-11.813 9.891l-7.143 40C33.163 185.246 38.818 192 46.289 192h74.81L98.242 320H19.146a12 12 0 0 0-11.813 9.891l-7.143 40C-1.123 377.246 4.532 384 12.003 384h74.81L72.19 465.891C70.877 473.246 76.532 480 84.003 480h40.632a12 12 0 0 0 11.813-9.891L151.826 384h98.634l-14.623 81.891C234.523 473.246 240.178 480 247.65 480h40.632a12 12 0 0 0 11.813-9.891L315.472 384h79.096a12 12 0 0 0 11.813-9.891l7.143-40c1.313-7.355-4.342-14.109-11.813-14.109h-74.81l22.857-128h79.096a12 12 0 0 0 11.813-9.891zM261.889 320h-98.634l22.857-128h98.634l-22.857 128z"></path></svg>',
				'file_name'   => 'hashtag-filled.svg',
			),

			'twrp-tax-fa-b-f'    => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'Bookmark', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-fa-b-f" viewBox="0 0 384 512"><path d="M0 512V48C0 21.49 21.49 0 48 0h288c26.51 0 48 21.49 48 48v464L192 400 0 512z"></path></svg>',
				'file_name'   => 'bookmark-filled.svg',
			),

			'twrp-tax-fa-b-ol'   => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'Bookmark', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-fa-b-ol" viewBox="0 0 384 512"><path d="M336 0H48C21.49 0 0 21.49 0 48v464l192-112 192 112V48c0-26.51-21.49-48-48-48zm0 428.43l-144-84-144 84V54a6 6 0 0 1 6-6h276c3.314 0 6 2.683 6 5.996V428.43z"></path></svg>',
				'file_name'   => 'bookmark-outlined.svg',
			),

			#endregion -- FontAwesome Icons

			#region -- Google Icons

			'twrp-tax-go-f'      => array(
				'brand'       => 'Google',
				'description' => _x( 'Tag', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-go-f" viewBox="0 0 24 24"><path d="M23.3,11.5L12.5,0.7c-0.4-0.4-1-0.7-1.7-0.7H2.4C1.1,0,0,1.1,0,2.4v8.4c0,0.7,0.3,1.3,0.7,1.7l10.8,10.8c0.4,0.4,1,0.7,1.7,0.7c0.7,0,1.3-0.3,1.7-0.7l8.4-8.4c0.4-0.4,0.7-1,0.7-1.7C24,12.5,23.7,11.9,23.3,11.5z M4.2,6c-1,0-1.8-0.8-1.8-1.8s0.8-1.8,1.8-1.8S6,3.2,6,4.2S5.2,6,4.2,6z"/></svg>',
				'file_name'   => 'tag-filled.svg',
			),

			'twrp-tax-go-ol'     => array(
				'brand'       => 'Google',
				'description' => _x( 'Tag', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-go-ol" viewBox="0 0 24 24"><path d="M23.3,11.5L12.5,0.7c-0.4-0.4-1-0.7-1.7-0.7H2.4C1.1,0,0,1.1,0,2.4v8.4c0,0.7,0.3,1.3,0.7,1.7l10.8,10.8c0.4,0.4,1,0.7,1.7,0.7c0.7,0,1.3-0.3,1.7-0.7l8.4-8.4c0.4-0.4,0.7-1,0.7-1.7C24,12.5,23.7,11.9,23.3,11.5z M13.2,21.6L2.4,10.8V2.4h8.4v0l10.8,10.8L13.2,21.6z"/><circle cx="5.4" cy="5.4" r="1.8"/></svg>',
				'file_name'   => 'tag-outlined.svg',
			),

			'twrp-tax-go-dt'     => array(
				'brand'       => 'Google',
				'description' => _x( 'Tag', 'backend', 'twrp' ),
				'type'        => _x( 'Twotone', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-go-dt" viewBox="0 0 24 24"><path style="opacity:0.3;" d="M10.8,2.4H2.4v8.4l10.8,10.8l8.4-8.4L10.8,2.4z M5.4,7.2c-1,0-1.8-0.8-1.8-1.8s0.8-1.8,1.8-1.8s1.8,0.8,1.8,1.8S6.4,7.2,5.4,7.2z"/><path d="M12.5,0.7c-0.4-0.4-1-0.7-1.7-0.7H2.4C1.1,0,0,1.1,0,2.4v8.4c0,0.7,0.3,1.3,0.7,1.7l10.8,10.8c0.4,0.4,1,0.7,1.7,0.7c0.7,0,1.3-0.3,1.7-0.7l8.4-8.4c0.4-0.4,0.7-1,0.7-1.7c0-0.7-0.3-1.3-0.7-1.7L12.5,0.7z M13.2,21.6L2.4,10.8V2.4h8.4v0l10.8,10.8L13.2,21.6z"/><circle cx="5.4" cy="5.4" r="1.8"/></svg>',
				'file_name'   => 'tag-twotone.svg',
			),

			'twrp-tax-go-sh'     => array(
				'brand'       => 'Google',
				'description' => _x( 'Tag', 'backend', 'twrp' ),
				'type'        => _x( 'Sharp', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-go-sh" viewBox="0 0 24 24"><path d="M24,12.7L11.3,0H0v11.3L12.7,24L24,12.7z M4,5.8C3.1,5.8,2.3,5,2.3,4S3.1,2.3,4,2.3S5.8,3.1,5.8,4S5,5.8,4,5.8z"/></svg>',
				'file_name'   => 'tag-sharp.svg',
			),

			'twrp-tax-go-f-f'    => array(
				'brand'       => 'Google',
				'description' => _x( 'Folder', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-go-f-f" viewBox="0 0 24 24"><path d="M9.6,2.4H2.4C1.1,2.4,0,3.5,0,4.8l0,14.4c0,1.3,1.1,2.4,2.4,2.4h19.2c1.3,0,2.4-1.1,2.4-2.4v-12c0-1.3-1.1-2.4-2.4-2.4H12L9.6,2.4z"/></svg>',
				'file_name'   => 'folder-filled.svg',
			),

			'twrp-tax-go-f-ol'   => array(
				'brand'       => 'Google',
				'description' => _x( 'Folder', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-go-f-ol" viewBox="0 0 24 24"><path d="M8.6,4.8L11,7.2h10.6v12H2.4V4.8H8.6 M9.6,2.4H2.4C1.1,2.4,0,3.5,0,4.8l0,14.4c0,1.3,1.1,2.4,2.4,2.4h19.2c1.3,0,2.4-1.1,2.4-2.4v-12c0-1.3-1.1-2.4-2.4-2.4H12L9.6,2.4z"/></svg>',
				'file_name'   => 'folder-outlined.svg',
			),

			'twrp-tax-go-f-dt'   => array(
				'brand'       => 'Google',
				'description' => _x( 'Folder', 'backend', 'twrp' ),
				'type'        => _x( 'Twotone', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-go-f-dt" viewBox="0 0 24 24"><path style="opacity:0.3;" d="M11,7.2l-0.7-0.7L8.6,4.8H2.4v14.4h19.2v-12H12H11z"/><path d="M21.6,4.8H12L9.6,2.4H2.4C1.1,2.4,0,3.5,0,4.8l0,14.4c0,1.3,1.1,2.4,2.4,2.4h19.2c1.3,0,2.4-1.1,2.4-2.4v-12C24,5.9,22.9,4.8,21.6,4.8z M21.6,19.2H2.4V4.8h6.2l1.7,1.7L11,7.2h10.6V19.2z"/></svg>',
				'file_name'   => 'folder-twotone.svg',
			),

			'twrp-tax-go-f-sh'   => array(
				'brand'       => 'Google',
				'description' => _x( 'Folder', 'backend', 'twrp' ),
				'type'        => _x( 'Sharp', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-go-f-sh" viewBox="0 0 24 24"><path d="M9.6,2.4H0v19.2h24V4.8H12L9.6,2.4z"/></svg>',
				'file_name'   => 'folder-sharp.svg',
			),

			'twrp-tax-go-h-f'    => array(
				'brand'       => 'Google',
				'description' => _x( 'Tag Heart', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-go-h-f" viewBox="0 0 24 24"><path d="M23.3,11.5L12.5,0.7c-0.4-0.4-1-0.7-1.7-0.7H2.4C1.1,0,0,1.1,0,2.4v8.4c0,0.7,0.3,1.3,0.7,1.7l10.8,10.8c0.4,0.4,1,0.7,1.7,0.7c0.7,0,1.3-0.3,1.7-0.7l8.4-8.4c0.4-0.4,0.7-1,0.7-1.7C24,12.5,23.7,11.9,23.3,11.5z M4.2,6c-1,0-1.8-0.8-1.8-1.8s0.8-1.8,1.8-1.8S6,3.2,6,4.2S5.2,6,4.2,6z M18.3,15.9L13.2,21l-5.1-5.1c-0.5-0.6-0.9-1.3-0.9-2.1c0-1.7,1.3-3,3-3c0.8,0,1.6,0.3,2.1,0.9l0.9,0.9l0.9-0.9c0.5-0.5,1.3-0.9,2.1-0.9c1.7,0,3,1.3,3,3C19.2,14.6,18.9,15.4,18.3,15.9z"/></svg>',
				'file_name'   => 'tag-heart-filled.svg',
			),

			'twrp-tax-go-h-ol'   => array(
				'brand'       => 'Google',
				'description' => _x( 'Tag Heart', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-go-h-ol" viewBox="0 0 24 24">twrp-tax-go-h-ol<path d="M23.3,11.5L12.5,0.7c-0.4-0.4-1-0.7-1.7-0.7H2.4C1.1,0,0,1.1,0,2.4v8.4c0,0.7,0.3,1.3,0.7,1.7l10.8,10.8c0.4,0.4,1,0.7,1.7,0.7c0.7,0,1.3-0.3,1.7-0.7l8.4-8.4c0.4-0.4,0.7-1,0.7-1.7C24,12.5,23.7,11.9,23.3,11.5z M13.2,21.6L2.4,10.8V2.4h8.4v0l10.8,10.8L13.2,21.6z"/><circle cx="5.4" cy="5.4" r="1.8"/><path d="M8.3,12.7c0,0.7,0.3,1.3,0.7,1.7l4.2,4.2l4.2-4.2c0.4-0.4,0.7-1.1,0.7-1.7c0-1.4-1.1-2.5-2.5-2.5c-0.7,0-1.3,0.3-1.7,0.7l-0.7,0.7l-0.7-0.7c-0.4-0.5-1.1-0.7-1.7-0.7C9.4,10.2,8.3,11.3,8.3,12.7z"/></svg>',
				'file_name'   => 'tag-heart-outlined.svg',
			),

			'twrp-tax-go-h-dt'   => array(
				'brand'       => 'Google',
				'description' => _x( 'Tag Heart', 'backend', 'twrp' ),
				'type'        => _x( 'Twotone', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-go-h-dt" viewBox="0 0 24 24"><path style="opacity:0.3;" d="M10.8,2.4H2.4v8.4l10.8,10.8l8.4-8.4L10.8,2.4z M5.4,7.2c-1,0-1.8-0.8-1.8-1.8s0.8-1.8,1.8-1.8s1.8,0.8,1.8,1.8S6.4,7.2,5.4,7.2z M13.2,11.6l0.7-0.7c0.4-0.4,1.1-0.7,1.7-0.7c1.4,0,2.5,1.1,2.5,2.5c0,0.7-0.3,1.3-0.7,1.7l-4.2,4.2L9,14.4c-0.4-0.5-0.7-1.1-0.7-1.7c0-1.4,1.1-2.5,2.5-2.5c0.7,0,1.3,0.3,1.7,0.7L13.2,11.6z"/><path d="M23.3,11.5L12.5,0.7c-0.4-0.4-1-0.7-1.7-0.7H2.4C1.1,0,0,1.1,0,2.4v8.4c0,0.7,0.3,1.3,0.7,1.7l10.8,10.8c0.4,0.4,1,0.7,1.7,0.7c0.7,0,1.3-0.3,1.7-0.7l8.4-8.4c0.4-0.4,0.7-1,0.7-1.7C24,12.5,23.7,11.9,23.3,11.5z M13.2,21.6L2.4,10.8V2.4h8.4v0l10.8,10.8L13.2,21.6z"/><circle cx="5.4" cy="5.4" r="1.8"/><path d="M8.3,12.7c0,0.7,0.3,1.3,0.7,1.7l4.2,4.2l4.2-4.2c0.4-0.4,0.7-1.1,0.7-1.7c0-1.4-1.1-2.5-2.5-2.5c-0.7,0-1.3,0.3-1.7,0.7l-0.7,0.7l-0.7-0.7c-0.4-0.5-1.1-0.7-1.7-0.7C9.4,10.2,8.3,11.3,8.3,12.7z"/></svg>',
				'file_name'   => 'tag-heart-twotone.svg',
			),

			'twrp-tax-go-h-sh'   => array(
				'brand'       => 'Google',
				'description' => _x( 'Tag Heart', 'backend', 'twrp' ),
				'type'        => _x( 'Sharp', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-go-h-sh" viewBox="0 0 24 24"><path d="M11.3,0H0v11.3L12.7,24c0,0,1.2-1.2,1.6-1.6l9.7-9.7L11.3,0z M4,5.8C3.1,5.8,2.3,5,2.3,4S3.1,2.3,4,2.3S5.8,3.1,5.8,4S5,5.8,4,5.8z M12.7,20.2l-4.9-4.9c-0.5-0.5-0.8-1.2-0.8-2c0-1.6,1.3-2.9,2.9-2.9c0.8,0,1.5,0.3,2,0.9l0.8,0.8l0.8-0.8c0.5-0.5,1.2-0.8,2-0.8c1.6,0,2.9,1.3,2.9,2.9c0,0.8-0.3,1.5-0.8,2L12.7,20.2z"/></svg>',
				'file_name'   => 'tag-heart-sharp.svg',
			),

			'twrp-tax-go-l-f'    => array(
				'brand'       => 'Google',
				'description' => _x( 'Label', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-go-l-f" viewBox="0 0 24 24"><path d="M18.5,4.1C18,3.4,17.3,3,16.4,3L2.5,3C1.1,3,0,4.2,0,5.6v12.9C0,19.8,1.1,21,2.5,21l13.9,0c0.8,0,1.6-0.4,2.1-1.1L24,12C24,12,18.5,4.1,18.5,4.1z"/></svg>',
				'file_name'   => 'label-filled.svg',
			),

			'twrp-tax-go-l-ol'   => array(
				'brand'       => 'Google',
				'description' => _x( 'Label', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-go-l-ol" viewBox="0 0 24 24"><path d="M18.5,4.1C18,3.4,17.3,3,16.4,3L2.5,3C1.1,3,0,4.2,0,5.6v12.9C0,19.8,1.1,21,2.5,21l13.9,0c0.8,0,1.6-0.4,2.1-1.1L24,12C24,12,18.5,4.1,18.5,4.1z M16.4,18.4H2.5V5.6h13.9l4.5,6.4L16.4,18.4z"/></svg>',
				'file_name'   => 'label-outlined.svg',
			),

			'twrp-tax-go-l-dt'   => array(
				'brand'       => 'Google',
				'description' => _x( 'Label', 'backend', 'twrp' ),
				'type'        => _x( 'Twotone', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-go-l-dt" viewBox="0 0 24 24"><path style="opacity:0.3;" d="M16.4,5.6H2.5v12.9h13.9l4.5-6.4L16.4,5.6z"/><path d="M18.5,4.1C18,3.4,17.3,3,16.4,3L2.5,3C1.1,3,0,4.2,0,5.6v12.9C0,19.8,1.1,21,2.5,21l13.9,0c0.8,0,1.6-0.4,2.1-1.1L24,12C24,12,18.5,4.1,18.5,4.1z M16.4,18.4H2.5V5.6h13.9l4.5,6.4L16.4,18.4z"/></svg>',
				'file_name'   => 'label-twotone.svg',
			),

			'twrp-tax-go-l-sh'   => array(
				'brand'       => 'Google',
				'description' => _x( 'Label', 'backend', 'twrp' ),
				'type'        => _x( 'Sharp', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-go-l-sh" viewBox="0 0 24 24"><path d="M17.7,3L0,3v18l17.7,0l6.3-9L17.7,3z"/></svg>',
				'file_name'   => 'label-sharp.svg',
			),

			'twrp-tax-go-l2-f'   => array(
				'brand'       => 'Google',
				'description' => _x( 'Label 2', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-go-l2-f" viewBox="0 0 24 24"><path d="M0,21l15.5,0c0.9,0,1.8-0.4,2.3-1.1L24,12l-6.2-7.9C17.3,3.4,16.5,3,15.5,3L0,3l6.8,9L0,21z"/></svg>',
				'file_name'   => 'label-2-filled.svg',
			),

			'twrp-tax-go-l2-dt'  => array(
				'brand'       => 'Google',
				'description' => _x( 'Label 2', 'backend', 'twrp' ),
				'type'        => _x( 'Twotone', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-go-l2-dt" viewBox="0 0 24 24"><path style="opacity:0.3;" d="M15.5,5.6h-10l5,6.4l-5,6.4h10l5-6.4L15.5,5.6z"/><path d="M17.8,4.1C17.3,3.4,16.5,3,15.5,3H0l7.1,9L0,21h15.5c0.9,0,1.8-0.4,2.3-1.1L24,12C24,12,17.8,4.1,17.8,4.1z M15.5,18.4h-10l5-6.4l-5-6.4h10l5,6.4L15.5,18.4z"/></svg>',
				'file_name'   => 'label-2-twotone.svg',
			),

			'twrp-tax-go-b-f'    => array(
				'brand'       => 'Google',
				'description' => _x( 'Bookmark', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-go-b-f" viewBox="0 0 24 24"><path d="M18.4,0H5.6C4.2,0,3,1.2,3,2.7L3,24l9-4l9,4V2.7C21,1.2,19.8,0,18.4,0z"/></svg>',
				'file_name'   => 'bookmark-filled.svg',
			),

			'twrp-tax-go-b-ol'   => array(
				'brand'       => 'Google',
				'description' => _x( 'Bookmark', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-go-b-ol" viewBox="0 0 24 24"><path d="M18.4,0H5.6C4.2,0,3,1.2,3,2.7V24l9-4l9,4V2.7C21,1.2,19.8,0,18.4,0z M18.4,20L12,17.1L5.6,20V2.7h12.9V20z"/></svg>',
				'file_name'   => 'bookmark-outlined.svg',
			),

			'twrp-tax-go-b-dt'   => array(
				'brand'       => 'Google',
				'description' => _x( 'Bookmark', 'backend', 'twrp' ),
				'type'        => _x( 'Twotone', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-go-b-dt" viewBox="0 0 24 24"><path style="opacity:0.3;" d="M5.6,20l6.4-2.9l6.4,2.9V2.7H5.6V20z"/><path d="M18.4,0H5.6C4.2,0,3,1.2,3,2.7V24l9-4l9,4V2.7C21,1.2,19.8,0,18.4,0z M18.4,20L12,17.1L5.6,20V2.7h12.9V20z"/></svg>',
				'file_name'   => 'bookmark-twotone.svg',
			),

			'twrp-tax-go-b-sh'   => array(
				'brand'       => 'Google',
				'description' => _x( 'Bookmark', 'backend', 'twrp' ),
				'type'        => _x( 'Sharp', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-go-b-sh" viewBox="0 0 24 24"><path d="M21,0H3v24l9-4l9,4V0z"/></svg>',
				'file_name'   => 'bookmark-sharp.svg',
			),

			'twrp-tax-go-bs-f'   => array(
				'brand'       => 'Google',
				'description' => _x( 'Bookmarks', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-go-bs-f" viewBox="0 0 24 24"><path d="M19.8,18.5l2.2,1.1V2.2C22,1,21,0,19.8,0H8.7C7.4,0,6.4,1,6.4,2.2h11.1c1.2,0,2.2,1,2.2,2.2V18.5z M15.3,4.4H4.2C3,4.4,2,5.3,2,6.5V24l7.8-3.3l7.8,3.3V6.5C17.6,5.3,16.6,4.4,15.3,4.4z"/></svg>',
				'file_name'   => 'bookmarks-filled.svg',
			),

			'twrp-tax-go-bs-ol'  => array(
				'brand'       => 'Google',
				'description' => _x( 'Bookmarks', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-go-bs-ol" viewBox="0 0 24 24"><path d="M15.3,6.5v14.1l-4.7-2l-0.9-0.4l-0.9,0.4l-4.7,2V6.5H15.3 M19.8,0H8.7C7.4,0,6.4,1,6.4,2.2h11.1c1.2,0,2.2,1,2.2,2.2v14.2l2.2,1.1V2.2C22,1,21,0,19.8,0z M15.3,4.4H4.2C3,4.4,2,5.3,2,6.5V24l7.8-3.3l7.8,3.3V6.5C17.6,5.3,16.6,4.4,15.3,4.4z"/></svg>',
				'file_name'   => 'bookmarks-outlined.svg',
			),

			'twrp-tax-go-bs-dt'  => array(
				'brand'       => 'Google',
				'description' => _x( 'Bookmarks', 'backend', 'twrp' ),
				'type'        => _x( 'Twotone', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-go-bs-dt" viewBox="0 0 24 24"><path d="M19.8,0H8.7C7.4,0,6.4,1,6.4,2.2h11.1c1.2,0,2.2,1,2.2,2.2v14.2l2.2,1.1V2.2C22,1,21,0,19.8,0z M15.3,4.4H4.2C3,4.4,2,5.3,2,6.5V24l7.8-3.3l7.8,3.3V6.5C17.6,5.3,16.6,4.4,15.3,4.4z M15.3,20.7l-4.7-2l-0.9-0.4l-0.9,0.4l-4.7,2V6.5h11.1V20.7z"/><path style="opacity:0.3;" d="M4.2,20.7l5.6-2.3l5.6,2.3V6.5H4.2V20.7z"/></svg>',
				'file_name'   => 'bookmarks-twotone.svg',
			),

			'twrp-tax-go-bs-sh'  => array(
				'brand'       => 'Google',
				'description' => _x( 'Bookmarks', 'backend', 'twrp' ),
				'type'        => _x( 'Sharp', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-go-bs-sh" viewBox="0 0 24 24"><path d="M19.8,18.5l2.2,1.1V0H6.4v2.2h13.3V18.5z M17.6,4.4H2V24l7.8-3.3l7.8,3.3V4.4z"/></svg>',
				'file_name'   => 'bookmarks-sharp.svg',
			),

			#endregion -- Google Icons

			#region -- Dashicons Icons

			'twrp-tax-di-f'      => array(
				'brand'       => 'Dashicons',
				'description' => _x( 'Tag', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-di-f" viewBox="0 0 20 20"><path d="M11.8,0H20v8.2L8.2,20L0,11.8L11.8,0z M15.3,7.1c1.3,0,2.4-1.1,2.4-2.4s-1.1-2.4-2.4-2.4s-2.4,1.1-2.4,2.4S14,7.1,15.3,7.1z"/></svg>',
				'file_name'   => 'tag-filled.svg',
			),

			'twrp-tax-di-c-f'    => array(
				'brand'       => 'Dashicons',
				'description' => _x( 'Folder', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-di-c-f" viewBox="0 0 20 20"><path d="M3.8,5.6H20v12.5H0V1.9h8.8l2.5,2.5H2.5v11.3h1.3V5.6z"/></svg>',
				'file_name'   => 'folder-filled.svg',
			),

			'twrp-tax-di-c2-f'   => array(
				'brand'       => 'Dashicons',
				'description' => _x( 'Folder Open', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-di-c2-f" viewBox="0 0 20 20"><path d="M10.6,4.4L8.1,1.9H0l0.9,11.9l1.9-9.4H10.6z M3.8,5.6L1.3,18.1h16.3L20,5.6H3.8z"/></svg>',
				'file_name'   => 'folder-2-filled.svg',
			),

			#endregion -- Dashicons Icons

			#region -- Foundation Icons

			'twrp-tax-fi-f'      => array(
				'brand'       => 'Foundation',
				'description' => _x( 'Tag', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-fi-f" viewBox="0 0 100 100"><path d="M87.4,69.2c0,0-0.1-0.1-0.1-0.1l0,0L55.2,13.5l0,0c-0.3-0.4-0.7-0.8-1.1-1l0,0L41,5V5c-0.7-0.4-1.5-0.4-2.2-0.1l0,0L38.5,5c0,0,0,0,0,0c0,0,0,0,0,0L13.2,19.6c-0.8,0.5-1.2,1.3-1.2,2.1l0,0v15.2l0,0c-0.1,0.5,0,1,0.3,1.5c0,0,0,0.1,0.1,0.1l0,0l32,55.4c0,0.1,0.1,0.1,0.1,0.2c0.7,1.2,2.1,1.6,3.3,1l0,0l38.7-22.4l0,0C87.7,71.9,88.1,70.4,87.4,69.2z M33.6,25.2c-2.2,1.3-5.1,0.5-6.3-1.7c-1.3-2.2-0.5-5.1,1.7-6.3s5.1-0.5,6.3,1.7C36.6,21.1,35.9,24,33.6,25.2z"/></svg>',
				'file_name'   => 'tag-filled.svg',
			),

			'twrp-tax-fi-t-f'    => array(
				'brand'       => 'Foundation',
				'description' => _x( 'Tags', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-fi-t-f" viewBox="0 0 100 100"><path d="M95.9,71.6c0,0-0.1-0.1-0.1-0.1l0,0L63.6,15.5l0,0c-0.3-0.4-0.7-0.8-1.1-1l0,0L52.9,9l10.6,18.4l24.2,41.9l0,0c0,0,0.1,0.1,0.1,0.1c0.7,1.2,0.3,2.7-0.9,3.4l0,0L51.1,93.6l1.6,2.7c0,0.1,0.1,0.1,0.1,0.2c0.7,1.2,2.1,1.6,3.3,1l0,0L95,75l0,0C96.2,74.3,96.6,72.8,95.9,71.6z"/><path d="M78.5,70.4c1.2-0.7,1.6-2.2,0.9-3.4c0,0-0.1-0.1-0.1-0.1l0,0L47.2,11.3l0,0c-0.3-0.4-0.7-0.8-1.1-1l0,0L33,2.8v0.1c-0.7-0.4-1.5-0.4-2.2-0.1l0,0l-0.2,0.1c0,0,0,0,0,0c0,0,0,0,0,0L5.2,17.4C4.5,17.9,4,18.7,4,19.5l0,0v15.2l0,0c-0.1,0.5,0,1,0.3,1.5c0,0,0,0.1,0.1,0.1l0,0l32,55.4c0,0.1,0.1,0.1,0.1,0.2c0.7,1.2,2.1,1.6,3.3,1l0,0L78.5,70.4L78.5,70.4z M25.5,23c-2.2,1.3-5.1,0.5-6.3-1.7c-1.3-2.2-0.5-5.1,1.7-6.3s5.1-0.5,6.3,1.7C28.4,18.9,27.7,21.7,25.5,23z"/></svg>',
				'file_name'   => 'tags-filled.svg',
			),

			'twrp-tax-fi-f-f'    => array(
				'brand'       => 'Foundation',
				'description' => _x( 'Folder', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-fi-f-f" viewBox="0 0 100 100"><path d="M93.2,18.9h-44c-2.4-2.8-4.8-5.8-5.4-6.7c-0.6-1.3-1.9-2.2-3.4-2.2H22.8c-1.2,0-2.2,0.5-3,1.4l-6,7.5H6.8c-3.6,0-6.6,3-6.6,6.6v57.9c0,3.6,3,6.6,6.6,6.6h86.4c3.6,0,6.6-2.9,6.6-6.6V25.5C99.8,21.9,96.8,18.9,93.2,18.9z"/></svg>',
				'file_name'   => 'folder-filled.svg',
			),

			#endregion -- Foundation Icons

			#region -- Ionicons Icons

			'twrp-tax-io-f'      => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Tag', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-io-f" viewBox="0 0 512 512"><path d="M491.5,20.7C482.1,11.3,469.4,6,456.1,6H318.9c-9,0-17.6,3.6-24,9.9L20.6,290.1c-19.5,19.5-19.5,51.1,0,70.7l130.6,130.6c19.5,19.5,51.2,19.5,70.7,0L496,217.3c6.4-6.4,9.9-15,10-24V56C506.1,42.8,500.9,30.1,491.5,20.7z M398.9,148.9c-19.7,0-35.7-16-35.7-35.7s16-35.7,35.7-35.7s35.7,16,35.7,35.7S418.6,148.9,398.9,148.9z"/></svg>',
				'file_name'   => 'tag-filled.svg',
			),

			'twrp-tax-io-ol'     => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Tag', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-io-ol" viewBox="0 0 512 512"><path style="fill:none;stroke:currentColor;stroke-width:32;stroke-linecap:round;stroke-linejoin:round;" d="M457.7,22H319.4c-4.3,0-8.4,1.7-11.5,4.7L31.5,304.3c-12.6,12.7-12.6,33.3,0,46l131.7,132.2c12.7,12.7,33.1,12.7,45.8,0L485.3,205c3-3.1,4.7-7.2,4.7-11.5v-139c0.1-17.9-14.3-32.5-32.1-32.5C457.8,22,457.8,22,457.7,22z"/><path d="M400,148.5c-19.9,0-36-16.2-36-36.2s16.1-36.2,36-36.2s36,16.2,36,36.2S419.9,148.5,400,148.5z"/></svg>',
				'file_name'   => 'tag-outlined.svg',
			),

			'twrp-tax-io-sh'     => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Tag', 'backend', 'twrp' ),
				'type'        => _x( 'Sharp', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-io-sh" viewBox="0 0 512 512"><path d="M315.3,7L5,317.3L194.7,507L505,196.7V7H315.3z M401.6,144.9c-19,0-34.5-15.4-34.5-34.5S382.5,76,401.6,76S436,91.4,436,110.4S420.6,144.9,401.6,144.9z"/></svg>',
				'file_name'   => 'tag-sharp.svg',
			),

			'twrp-tax-io-i-ol'   => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Ios Tag', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-io-i-ol" viewBox="0 0 512 512"><path d="M488.1,6H309.6L23.9,327.4L202.4,506l285.7-321.4V6z M470.3,175.6L202.6,479.2L50.7,327.4L318,23.9h152.2V175.6z"/><path d="M381,148.9c19.7,0,35.7-16,35.7-35.7s-16-35.7-35.7-35.7s-35.7,16-35.7,35.7S361.3,148.9,381,148.9z M381,95.3c9.9,0,17.9,8,17.9,17.9s-8,17.9-17.9,17.9s-17.9-8-17.9-17.9S371.1,95.3,381,95.3z"/></svg>',
				'file_name'   => 'ios-tag-outlined.svg',
			),

			'twrp-tax-io-t-f'    => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Tags', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-io-t-f" viewBox="0 0 512 512"><path d="M448,183.8v-123A44.66,44.66,0,0,0,403.29,16H280.36a30.62,30.62,0,0,0-21.51,8.89L13.09,270.58a44.86,44.86,0,0,0,0,63.34l117,117a44.84,44.84,0,0,0,63.33,0L439.11,205.31A30.6,30.6,0,0,0,448,183.8ZM352,144a32,32,0,1,1,32-32A32,32,0,0,1,352,144Z"/><path d="M496,64a16,16,0,0,0-16,16V207.37L218.69,468.69a16,16,0,1,0,22.62,22.62l262-262A29.84,29.84,0,0,0,512,208V80A16,16,0,0,0,496,64Z"/></svg>',
				'file_name'   => 'tags-filled.svg',
			),

			'twrp-tax-io-t-ol'   => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Tags', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-io-t-ol" viewBox="0 0 512 512"><path d="M403.29,32H280.36a14.46,14.46,0,0,0-10.2,4.2L24.4,281.9a28.85,28.85,0,0,0,0,40.7l117,117a28.86,28.86,0,0,0,40.71,0L427.8,194a14.46,14.46,0,0,0,4.2-10.2V60.8A28.66,28.66,0,0,0,403.29,32Z" style="fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"/><path d="M352,144a32,32,0,1,1,32-32A32,32,0,0,1,352,144Z"/><path d="M230,480,492,218a13.81,13.81,0,0,0,4-10V80" style="fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"/></svg>',
				'file_name'   => 'tags-outlined.svg',
			),

			'twrp-tax-io-t-sh'   => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Tags', 'backend', 'twrp' ),
				'type'        => _x( 'Sharp', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-io-t-sh" viewBox="0 0 512 512"><path d="M288,16,0,304,176,480,464,192V16Zm80,128a32,32,0,1,1,32-32A32,32,0,0,1,368,144Z"/><polygon points="480 64 480 208 216.9 471.1 242 496 512 224 512 64 480 64"/></svg>',
				'file_name'   => 'tags-sharp.svg',
			),

			'twrp-tax-io-it-ol'  => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Ios Tags', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-io-it-ol" viewBox="0 0 512 512"><path d="M470.3,41.7V6H291.7L6,327.4L184.6,506l26.2-26.7l27.4,26.7L506,202.4V41.7H470.3z M184.6,480.7L31,327.4L299.1,23.9h153.3v17.9v17.9v117.6L210.7,454l-12.7,12.7L184.6,480.7z M488.1,195l-250,285.7l-14.7-14.1l246.9-282.1v-125h17.9V195z"/><path d="M363.1,148.9c19.7,0,35.7-16,35.7-35.7s-16-35.7-35.7-35.7c-19.7,0-35.7,16-35.7,35.7S343.4,148.9,363.1,148.9z M363.1,95.3c9.9,0,17.9,8,17.9,17.9s-8,17.9-17.9,17.9s-17.9-8-17.9-17.9S353.3,95.3,363.1,95.3z"/></svg>',
				'file_name'   => 'ios-tags-outlined.svg',
			),

			'twrp-tax-io-f-f'    => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Folder', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-io-f-f" viewBox="0 0 512 512"><path d="M512,145.1c0-33-26.7-59.7-59.7-59.7H217.7c-5.1,0-10-1.5-14.2-4.3l-29.7-19.8c-9.8-6.6-21.4-10.1-33.2-10H59.7C26.7,51.2,0,77.9,0,110.9v51.2c0,4.7,3.8,8.5,8.5,8.5h494.9c4.7,0,8.5-3.8,8.5-8.5V145.1z"/><path d="M0,401.1c0,33,26.7,59.7,59.7,59.7h392.5c33,0,59.7-26.7,59.7-59.7V213.3c0-4.7-3.8-8.5-8.5-8.5H8.5c-4.7,0-8.5,3.8-8.5,8.5V401.1z"/></svg>',
				'file_name'   => 'folder-filled.svg',
			),

			'twrp-tax-io-f-ol'   => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Folder', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-io-f-ol" viewBox="0 0 512 512"><path style="fill:none;stroke:currentColor;stroke-width:32;stroke-linecap:round;stroke-linejoin:round;" d="M453.1,444.6H58.9c-23.7,0-42.9-19.2-42.9-42.9V110.3c0-23.7,19.2-42.9,42.9-42.9h81.3c8.5,0,16.7,2.5,23.8,7.2l29.8,19.9c7,4.7,15.3,7.2,23.8,7.2h235.6c23.7,0,42.9,19.2,42.9,42.9v257.1C496,425.4,476.8,444.6,453.1,444.6z"/><line style="fill:none;stroke:currentColor;stroke-width:32;stroke-linecap:round;stroke-linejoin:round;" x1="32" y1="192" x2="480" y2="192"/></svg>',
				'file_name'   => 'folder-outlined.svg',
			),

			'twrp-tax-io-fo-f'   => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Folder Open', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-io-fo-f" viewBox="0 0 512 512"><path d="M418.1,85.3H251.8c-5.1,0-10-1.5-14.2-4.3L208,61.2c-9.8-6.6-21.4-10.1-33.2-10H93.9c-33,0-59.7,26.8-59.7,59.7v25.6h443.7C477.9,103.6,451.1,85.3,418.1,85.3z"/><path d="M434.9,460.8H77.1c-32.6,0-59.2-26.2-59.7-58.8L0.2,226.3V226c-2.3-28.2,18.8-52.9,46.9-55.1c1.3-0.1,2.7-0.2,4.1-0.2h409.7c28.3,0,51.2,23,51.1,51.2c0,1.3-0.1,2.7-0.2,4v0.3L494.6,402C494.1,434.6,467.5,460.8,434.9,460.8z M494.8,224.6L494.8,224.6z"/></svg>',
				'file_name'   => 'folder-open-filled.svg',
			),

			'twrp-tax-io-fo-ol'  => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Folder Open', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-io-fo-ol" viewBox="0 0 512 512"><path style="fill:none;stroke:currentColor;stroke-width:32;stroke-linecap:round;stroke-linejoin:round;" d="M50.3,187.4v-77.1c0-23.7,19.2-42.9,42.9-42.9h81.3c8.5,0,16.7,2.5,23.8,7.2l29.8,19.9c7,4.7,15.3,7.2,23.8,7.2h167c23.7,0,42.9,19.2,42.9,42.9v42.9"/><path style="fill:none;stroke:currentColor;stroke-width:32;stroke-linecap:round;stroke-linejoin:round;" d="M495.9,224.4l-17.4,177.3c0,23.6-19.1,42.8-42.8,42.9H76.3c-23.6,0-42.8-19.2-42.8-42.9L16.1,224.4c-1.5-18.9,12.6-35.4,31.4-36.9c0.9-0.1,1.8-0.1,2.7-0.1h411.5c18.9,0.1,34.2,15.5,34.2,34.4C496,222.7,496,223.6,495.9,224.4z"/></svg>',
				'file_name'   => 'folder-open-outlined.svg',
			),

			'twrp-tax-io-iof-f'  => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Ios Folder', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-io-iof-f" viewBox="0 0 512 512"><path d="M502.9,164.6H9.1c-5,0-9.1,4.1-9.1,9.1v273.1c0,15.2,13.4,28.6,28.6,28.6h457.1c14.5,0,26.3-12.8,26.3-28.6V173.7C512,168.7,507.9,164.6,502.9,164.6z"/><path d="M485.7,73.1H209.1c-3.2,0-4.9-0.7-7-2.8l-25.7-25.7l-0.2-0.2c-5.6-5.3-10.1-7.9-19.7-7.9h-128C12.8,36.6,0,48.4,0,62.9v85c2.9-1,5.9-1.6,9.1-1.6h493.7c3.2,0,6.3,0.6,9.1,1.6V99.4C512,84.2,500.9,73.1,485.7,73.1z"/></svg>',
				'file_name'   => 'ios-folder-filled.svg',
			),

			'twrp-tax-io-iof-ol' => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Ios Folder', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-io-iof-ol" viewBox="0 0 512 512"><path d="M485.7,73.1H209.1c-3.2,0-4.9-0.7-7-2.8l-25.7-25.7l-0.2-0.2c-5.6-5.3-10.1-7.9-19.7-7.9h-128C12.8,36.6,0,48.4,0,62.9v384c0,15.2,13.4,28.6,28.6,28.6h457.1c14.5,0,26.3-12.8,26.3-28.6V99.4C512,84.2,500.9,73.1,485.7,73.1z M28.6,54.9h128c4,0,4.3,0.2,7.1,2.8l25.6,25.6c5.5,5.5,11.9,8.1,19.9,8.1h276.6c5.1,0,8,2.9,8,8v48.4c-2.9-1-5.9-1.6-9.1-1.6H27.4c-3.2,0-6.3,0.6-9.1,1.6v-85C18.3,57.9,23.6,54.9,28.6,54.9z M493.7,446.9c0,4.9-3.1,10.3-8,10.3H28.6c-5.1,0-10.3-5.2-10.3-10.3V173.7c0-5,4.1-9.1,9.1-9.1h457.1c5,0,9.1,4.1,9.1,9.1V446.9z"/></svg>',
				'file_name'   => 'ios-folder-outlined.svg',
			),

			'twrp-tax-io-b-f'    => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Bookmark', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-io-b-f" viewBox="0 0 512 512"><path d="M416.7,506c-4.4,0-8.6-1.6-11.9-4.5L256,369.2L107.2,501.5c-7.4,6.6-18.7,5.9-25.2-1.5c-2.9-3.3-4.5-7.5-4.5-11.9V77.4C77.5,38,109.4,6,148.9,6h214.3c39.4,0,71.4,32,71.4,71.4v410.7C434.6,498,426.6,506,416.7,506z"/></svg>',
				'file_name'   => 'bookmark-filled.svg',
			),

			'twrp-tax-io-b-ol'   => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Bookmark', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-io-b-ol" viewBox="0 0 512 512"><path style="fill:none;stroke:currentColor;stroke-width:32;stroke-linecap:round;stroke-linejoin:round;" d="M364.5,21H147.5c-30,0-54.2,24.3-54.2,54.2V491L256,346.4L418.7,491V75.2C418.7,45.3,394.4,21,364.5,21z"/></svg>',
				'file_name'   => 'bookmark-outlined.svg',
			),

			'twrp-tax-io-b-sh'   => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Bookmark', 'backend', 'twrp' ),
				'type'        => _x( 'Sharp', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-io-b-sh" viewBox="0 0 512 512"><path d="M434.6,506L256,369.2L77.4,506V6h357.1V506z"/></svg>',
				'file_name'   => 'bookmark-sharp.svg',
			),

			'twrp-tax-io-bs-f'   => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Bookmarks', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-io-bs-f" viewBox="0 0 512 512"><path d="M400,0H176a64.11,64.11,0,0,0-62,48H342a74,74,0,0,1,74,74V426.89l22,17.6a16,16,0,0,0,19.34.5A16.41,16.41,0,0,0,464,431.57V64A64,64,0,0,0,400,0Z"/><path d="M320,80H112a64,64,0,0,0-64,64V495.62A16.36,16.36,0,0,0,54.6,509a16,16,0,0,0,19.71-.71L216,388.92,357.69,508.24a16,16,0,0,0,19.6.79A16.4,16.4,0,0,0,384,495.59V144A64,64,0,0,0,320,80Z"/></svg>',
				'file_name'   => 'bookmarks-filled.svg',
			),

			'twrp-tax-io-bs-ol'  => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Bookmarks', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-io-bs-ol" viewBox="0 0 512 512"><path d="M128,80V64a48.14,48.14,0,0,1,48-48H400a48.14,48.14,0,0,1,48,48V432l-80-64" style="fill:none;stroke:currentColor;stroke-linejoin:round;stroke-width:32px"/><path d="M320,96H112a48.14,48.14,0,0,0-48,48V496L216,368,368,496V144A48.14,48.14,0,0,0,320,96Z" style="fill:none;stroke:currentColor;stroke-linejoin:round;stroke-width:32px"/></svg>',
				'file_name'   => 'bookmarks-outlined.svg',
			),

			'twrp-tax-io-bs-sh'  => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Bookmarks', 'backend', 'twrp' ),
				'type'        => _x( 'Sharp', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-io-bs-sh" viewBox="0 0 512 512"><polygon points="112 0 112 48 416 48 416 416 464 448 464 0 112 0"/><polygon points="48 80 48 512 216 388 384 512 384 80 48 80"/></svg>',
				'file_name'   => 'bookmarks-sharp.svg',
			),

			'twrp-tax-io-ibs-ol' => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Ios Bookmarks', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-io-ibs-ol" viewBox="0 0 512 512"><path d="M102.2,6v500L256,390.1L409.8,506V6H102.2z M390.6,467.5L256,366.2L121.4,467.5V25.2h269.2V467.5z"/></svg>',
				'file_name'   => 'ios-bookmark-outlined.svg',
			),

			#endregion -- Ionicons Icons

			#region -- IconMonstr Icons

			'twrp-tax-im-f'      => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Tag', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-im-f" viewBox="0 0 24 24"><path d="M10.605 0h-10.605v10.609l13.391 13.391 10.609-10.604-13.395-13.396zm-4.191 6.414c-.781.781-2.046.781-2.829.001-.781-.783-.781-2.048 0-2.829.782-.782 2.048-.781 2.829-.001.782.782.781 2.047 0 2.829z"/></svg>',
				'file_name'   => 'tag-filled.svg',
			),

			'twrp-tax-im-ol'     => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Tag', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-im-ol" viewBox="0 0 24 24"><path d="M9.776 2l11.395 11.395-7.78 7.777-11.391-11.391v-7.781h7.776zm.829-2h-10.605v10.609l13.391 13.391 10.609-10.604-13.395-13.396zm-3.191 7.414c-.781.782-2.046.782-2.829.001-.781-.783-.781-2.048 0-2.829.782-.782 2.048-.781 2.829-.001.782.783.781 2.047 0 2.829z"/></svg>',
				'file_name'   => 'tag-outlined.svg',
			),

			'twrp-tax-im-t'      => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Tag', 'backend', 'twrp' ),
				'type'        => _x( 'Thin', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-im-t" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 24 24"><path d="M14.101 24l-14.101-14.105v-9.895h9.855l14.145 14.101c-3.3 3.299-6.6 6.599-9.899 9.899zm-4.659-23h-8.442v8.481l13.101 13.105 8.484-8.484c-4.381-4.368-8.762-8.735-13.143-13.102zm-1.702 3.204c.975.976.975 2.56 0 3.536-.976.975-2.56.975-3.536 0-.976-.976-.976-2.56 0-3.536s2.56-.976 3.536 0zm-.708.707c.586.586.586 1.536 0 2.121-.585.586-1.535.586-2.121 0-.585-.585-.585-1.535 0-2.121.586-.585 1.536-.585 2.121 0z"/></svg>',
				'file_name'   => 'tag-thin.svg',
			),

			'twrp-tax-im-t-f'    => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Tags', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-im-t-f" viewBox="0 0 24 24"><path d="M11.28 0h-8.28v8.058l10.271 10.296 8.302-8.07-10.293-10.284zm-2.72 5.559c-.585.585-1.535.585-2.12 0-.586-.584-.586-1.533 0-2.118.585-.585 1.535-.585 2.12 0 .586.584.586 1.533 0 2.118zm12.01 8.407l1.43 1.409-8.688 8.625-10.312-10.317v-2.833l10.349 10.291 7.221-7.175z"/></svg>',
				'file_name'   => 'tags-filled.svg',
			),

			'twrp-tax-im-t-ol'   => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Tags', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-im-t-ol" viewBox="0 0 24 24"><path d="M10.452 2l8.271 8.265-5.431 5.279-8.292-8.314v-5.23h5.452zm.828-2h-8.28v8.058l10.271 10.296 8.302-8.07-10.293-10.284zm-1.72 6.559c-.585.585-1.535.585-2.12 0-.586-.584-.586-1.533 0-2.118.585-.585 1.535-.585 2.12 0 .586.584.586 1.533 0 2.118zm11.01 7.407l1.43 1.409-8.688 8.625-10.312-10.317v-2.833l10.349 10.291 7.221-7.175z"/></svg>',
				'file_name'   => 'tags-outlined.svg',
			),

			'twrp-tax-im-t-t'    => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Tags', 'backend', 'twrp' ),
				'type'        => _x( 'Thin', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-im-t-t" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 24 24"><path d="M12.434 22.586l7.859-7.858.707.707-8.565 8.565-.001-.001v.001l-12.434-12.434.707-.707 11.727 11.727zm-.033-1.7l-12.401-12.405v-8.481h8.441l12.445 12.401-8.485 8.485zm-4.373-19.886h-7.028v7.067l11.401 11.405 7.07-7.07s-7.534-7.506-11.443-11.402zm-1.598 2.594c.78.78.78 2.048 0 2.828-.781.781-2.048.781-2.829 0-.78-.78-.78-2.048 0-2.828.781-.781 2.048-.781 2.829 0zm-.707.707c.39.39.39 1.024 0 1.414-.391.39-1.024.39-1.414 0-.391-.39-.391-1.024 0-1.414.39-.39 1.023-.39 1.414 0z"/></svg>',
				'file_name'   => 'tags-thin.svg',
			),

			'twrp-tax-im-t2-f'   => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Tags 2', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-im-t2-f" viewBox="0 0 24 24"><path d="M12.876 2h-8.876v9.015l10.972 11.124 9.028-9.028-11.124-11.111zm-3.139 5.737c-.684.684-1.791.684-2.475 0s-.684-1.791 0-2.474c.684-.684 1.791-.684 2.475 0 .684.683.684 1.791 0 2.474zm1.866 13.827l-1.369 1.436-10.234-10.257v-7.743h2v6.891l9.603 9.673z"/></svg>',
				'file_name'   => 'tags-2-filled.svg',
			),

			'twrp-tax-im-t2-ol'  => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Tags 2', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-im-t2-ol" viewBox="0 0 24 24"><path d="M12.049 4l9.122 9.112-6.189 6.188-8.982-9.106v-6.194h6.049zm.827-2h-8.876v9.015l10.973 11.124 9.027-9.028-11.124-11.111zm-2.315 6.561c-.586.586-1.535.586-2.121 0s-.586-1.535 0-2.121c.586-.586 1.535-.586 2.121 0 .585.585.585 1.535 0 2.121zm1.042 13.003l-1.369 1.436-10.234-10.257v-7.743h2v6.891l9.603 9.673z"/></svg>',
				'file_name'   => 'tags-2-outlined.svg',
			),

			'twrp-tax-im-f-f'    => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Folder', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-im-f-f" viewBox="0 0 24 24"><path d="M11 5c-1.629 0-2.305-1.058-4-3h-7v20h24v-17h-13z"/></svg>',
				'file_name'   => 'folder-filled.svg',
			),

			'twrp-tax-im-f-ol'   => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Folder', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-im-f-ol" viewBox="0 0 24 24"><path d="M6.083 4c1.38 1.612 2.578 3 4.917 3h11v13h-20v-16h4.083zm.917-2h-7v20h24v-17h-13c-1.629 0-2.305-1.058-4-3z"/></svg>',
				'file_name'   => 'folder-outlined.svg',
			),

			'twrp-tax-im-f-t'    => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Folder', 'backend', 'twrp' ),
				'type'        => _x( 'Thin', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-im-f-t" viewBox="0 0 24 24" fill-rule="evenodd" clip-rule="evenodd"><path d="M11 5h13v17h-24v-20h8l3 3zm-10-2v18h22v-15h-12.414l-3-3h-6.586z"/></svg>',
				'file_name'   => 'folder-thin.svg',
			),

			'twrp-tax-im-b-f'    => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Bookmark', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-im-b-f" viewBox="0 0 24 24"><path d="M18 24l-6-5.269-6 5.269v-24h12v24z"/></svg>',
				'file_name'   => 'bookmark-filled.svg',
			),

			'twrp-tax-im-b-ol'   => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Bookmark', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-im-b-ol" viewBox="0 0 24 24"><path d="M16 2v17.582l-4-3.512-4 3.512v-17.582h8zm2-2h-12v24l6-5.269 6 5.269v-24z"/></svg>',
				'file_name'   => 'bookmark-outlined.svg',
			),

			'twrp-tax-im-b-t'    => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Bookmark', 'backend', 'twrp' ),
				'type'        => _x( 'Thin', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-im-b-t" viewBox="0 0 24 24" fill-rule="evenodd" clip-rule="evenodd"><path d="M5 0v24l7-6 7 6v-24h-14zm1 1h12v20.827l-6-5.144-6 5.144v-20.827z"/></svg>',
				'file_name'   => 'bookmark-thin.svg',
			),

			'twrp-tax-im-b2-f'   => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Bookmark 2', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-im-b2-f" viewBox="0 0 24 24"><path d="M24 24l-6-5.269-6 5.269v-24h12v24zm-14-23h-10v2h10v-2zm0 5h-10v2h10v-2zm0 5h-10v2h10v-2zm0 5h-10v2h10v-2z"/></svg>',
				'file_name'   => 'bookmark-2-filled.svg',
			),

			'twrp-tax-im-b2-ol'  => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Bookmark 2', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-im-b2-ol" viewBox="0 0 24 24"><path d="M22 2v17.582l-4-3.512-4 3.512v-17.582h8zm2-2h-12v24l6-5.269 6 5.269v-24zm-14 1h-10v2h10v-2zm0 5h-10v2h10v-2zm0 5h-10v2h10v-2zm0 5h-10v2h10v-2z"/></svg>',
				'file_name'   => 'bookmark-2-outlined.svg',
			),

			'twrp-tax-im-b3-f'   => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Bookmark 3', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-im-b3-f" viewBox="0 0 24 24"><path d="M20 24l-6-5.269-6 5.269v-17.411c0-3.547-1.167-5.547-4-6.589h9.938c3.34 0 6.052 2.701 6.062 6.042v17.958z"/></svg>',
				'file_name'   => 'bookmark-3-filled.svg',
			),

			'twrp-tax-im-b3-ol'  => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Bookmark 3', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-im-b3-ol" viewBox="0 0 24 24"><path d="M13.938 2c2.232 0 4.055 1.816 4.062 4.042v13.54l-4-3.512-4 3.512v-12.993c0-2.464-.28-3.333-.858-4.589h4.796zm0-2h-9.938c2.834 1.042 4 3.042 4 6.589v17.411l6-5.269 6 5.269v-17.958c-.011-3.341-2.723-6.042-6.062-6.042z"/></svg>',
				'file_name'   => 'bookmark-3-outlined.svg',
			),

			'twrp-tax-im-bs-f'   => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Bookmarks', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-im-bs-f" viewBox="0 0 24 24"><path d="M19 24l-5-4.39-5 4.39v-20h10v20zm-12-22h8v-2h-10v20l2-1.756v-16.244z"/></svg>',
				'file_name'   => 'bookmarks-filled.svg',
			),

			'twrp-tax-im-bs-ol'  => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Bookmarks', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-im-bs-ol" viewBox="0 0 24 24"><path d="M17 6v13.583l-3-2.634-3 2.634v-13.583h6zm2-2h-10v20l5-4.39 5 4.39v-20zm-12-2h8v-2h-10v20l2-1.756v-16.244z"/></svg>',
				'file_name'   => 'bookmarks-outlined.svg',
			),

			'twrp-tax-im-bs2-f'  => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Bookmarks 2', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-im-bs2-f" viewBox="0 0 24 24"><path d="M19 24l-5-4.39-5 4.39v-20h10v20zm-2-22h-10v19h1v-18h9v-1zm-2-2h-10v19h1v-18h9v-1z"/></svg>',
				'file_name'   => 'bookmarks-2-filled.svg',
			),

			'twrp-tax-im-bs2-ol' => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Bookmarks 2', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-im-bs2-ol" viewBox="0 0 24 24"><path d="M17 6v13.583l-3-2.634-3 2.634v-13.583h6zm2-2h-10v20l5-4.39 5 4.39v-20zm-2-2h-10v19h1v-18h9v-1zm-2-2h-10v19h1v-18h9v-1z"/></svg>',
				'file_name'   => 'bookmarks-2-outlined.svg',
			),

			'twrp-tax-im-h-f'    => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Hashtag', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-im-h-f" viewBox="0 0 24 24"><path d="M22.548 9l.452-2h-5.364l1.364-6h-2l-1.364 6h-5l1.364-6h-2l-1.364 6h-6.184l-.452 2h6.182l-1.364 6h-5.36l-.458 2h5.364l-1.364 6h2l1.364-6h5l-1.364 6h2l1.364-6h6.185l.451-2h-6.182l1.364-6h5.366zm-8.73 6h-5l1.364-6h5l-1.364 6z"/></svg>',
				'file_name'   => 'hashtag-filled.svg',
			),

			#endregion -- IconMonstr Icons

			#region -- Capicon Icons

			'twrp-tax-ci-f'      => array(
				'brand'       => 'Capicon',
				'description' => _x( 'Tag', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-ci-f" viewBox="-0.921 0 32 32"><path d="M12.665,0.414C11,0.372,1.489-0.497,0.638,0.414c-0.851,0.911-0.851,12.209,0,12.998c0.851,0.789,15.868,18.449,16.521,18.587c0.652,0.136,12.953-14.153,12.999-14.821C30.203,16.51,15.079,0.475,12.665,0.414z M9.835,10.429c-1.393,0.813-3.347,0.058-4.367-1.687C4.448,6.997,4.75,4.923,6.142,4.109S9.49,4.05,10.509,5.796C11.528,7.541,11.227,9.615,9.835,10.429z"/></svg>',
				'file_name'   => 'tag-filled.svg',
			),

			'twrp-tax-ci-2-f'    => array(
				'brand'       => 'Capicon',
				'description' => _x( 'Tag 2', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-ci-2-f" viewBox="0 0 29.23 32"><path d="M16.663,3.527C15.847,2.899,6.169-0.18,5.353,0.009C4.538,0.198,0.39,3.779,0.076,4.47c-0.312,0.691,0.438,9.738,0.502,10.618c0.062,0.88,11.458,16.592,12.716,16.907c1.258,0.313,15.745-10.938,15.936-11.881C29.418,19.172,17.479,4.155,16.663,3.527z M5.596,9.427C5.117,7.295,6.046,5.268,7.671,4.905C9.295,4.54,11,5.974,11.479,8.107c0.479,2.133-0.45,4.158-2.074,4.523C7.78,12.995,6.075,11.561,5.596,9.427z M8.634,18.424l9.924-7.697l2.079,2.683l-9.923,7.695L8.634,18.424z M14.481,26.038l-2.08-2.683l9.924-7.696l2.079,2.681L14.481,26.038z"/></svg>',
				'file_name'   => 'tag-2-filled.svg',
			),

			'twrp-tax-ci-f-f'    => array(
				'brand'       => 'Capicon',
				'description' => _x( 'Folder', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-ci-f-f" viewBox="0 0 32 25.943"><path d="M31.783,5.426C30.812,3.926,8.318,4.719,6.201,6.66C4.084,8.602,2.496,24.921,3.29,25.538c0.794,0.618,25.317,0.618,26.11-0.617C30.195,23.686,32.754,6.925,31.783,5.426z"/><path d="M18.209,3.701c-0.596-1.428-1.428-2.954-2.393-3.394C13.876-0.573,1.878,0.573,0.379,1.984c-1.251,1.179,0.935,14.689,1.694,19.143c0.262-5.042,1.525-14.107,3.07-15.523C6.192,4.64,12.249,3.96,18.209,3.701z"/></svg>',
				'file_name'   => 'folder-filled.svg',
			),

			'twrp-tax-ci-b-f'    => array(
				'brand'       => 'Capicon',
				'description' => _x( 'Bookmark', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-ci-b-f" viewBox="0 0 24.055 32"><path d="M0,1.262c0,0,1.958,4.864,3.679,11.661c1.994,7.88,0.484,18.517,1.152,19.015c1.266,0.945,9.666-9.035,9.666-9.035s8.402,8.195,9.354,7.773C24.799,30.256,22.694,12.502,12.186,0L0,1.262z"/></svg>',
				'file_name'   => 'bookmark-filled.svg',
			),

			#endregion -- Capicon Icons

			#region -- Feather Icons

			'twrp-tax-fe-ol'     => array(
				'brand'       => 'Feather',
				'description' => _x( 'Tag', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-fe-ol" viewBox="0 0 24 24"><path style="fill:none;stroke:currentColor;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;" d="M22.3,14.1l-8.2,8.2c-0.9,0.9-2.3,0.9-3.2,0c0,0,0,0,0,0L1,12.5V1h11.5l9.9,9.9C23.2,11.8,23.2,13.2,22.3,14.1z"/><line style="fill:none;stroke:currentColor;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;" x1="6.7" y1="6.7" x2="6.7" y2="6.7"/></svg>',
				'file_name'   => 'tag-outlined.svg',
			),

			'twrp-tax-fe-f-ol'   => array(
				'brand'       => 'Feather',
				'description' => _x( 'Folder', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-fe-f-ol" viewBox="0 0 24 24"><path style="fill:none;stroke:currentColor;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;" d="M23,19.7c0,1.2-1,2.2-2.2,2.2H3.2c-1.2,0-2.2-1-2.2-2.2V4.3c0-1.2,1-2.2,2.2-2.2h5.5l2.2,3.3h9.9c1.2,0,2.2,1,2.2,2.2V19.7z"/></svg>',
				'file_name'   => 'folder-outlined.svg',
			),

			'twrp-tax-fe-b-ol'   => array(
				'brand'       => 'Feather',
				'description' => _x( 'Bookmark', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-fe-b-ol" viewBox="0 0 24 24"><path style="fill:none;stroke:currentColor;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;" d="M21,23l-9-6.1L3,23V3.4C3,2.1,4.2,1,5.6,1h12.9C19.8,1,21,2.1,21,3.4V23z"/></svg>',
				'file_name'   => 'bookmark-outlined.svg',
			),

			'twrp-tax-fe-h-f'    => array(
				'brand'       => 'Feather',
				'description' => _x( 'Hashtag', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-fe-h-f" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="4" y1="9" x2="20" y2="9"></line><line x1="4" y1="15" x2="20" y2="15"></line><line x1="10" y1="3" x2="8" y2="21"></line><line x1="16" y1="3" x2="14" y2="21"></line></svg>',
				'file_name'   => 'hashtag-filled.svg',
			),

			#endregion -- Feather Icons

			#region -- Jam Icons

			'twrp-tax-ji-f'      => array(
				'brand'       => 'JamIcons',
				'description' => _x( 'Tag', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-ji-f" viewBox="0 0 24 24"><path d="M19.2,0.7l4.1,4.1c0.7,0.7,0.9,1.6,0.5,2.5L21.8,13c-0.1,0.2-0.2,0.3-0.3,0.4l-9.9,9.9c-0.9,0.9-2.4,0.9-3.4,0c0,0,0,0,0,0l-7.6-7.6c-0.9-0.9-0.9-2.4,0-3.4l9.9-9.9c0.1-0.1,0.3-0.2,0.4-0.3l5.7-2.1C17.6-0.2,18.6,0,19.2,0.7z M15.4,8.6c0.7,0.7,1.8,0.7,2.5,0s0.7-1.8,0-2.5c0,0,0,0,0,0c-0.7-0.7-1.8-0.7-2.5,0C14.7,6.8,14.7,7.9,15.4,8.6z"/></svg>',
				'file_name'   => 'tag-filled.svg',
			),

			'twrp-tax-ji-ol'     => array(
				'brand'       => 'JamIcons',
				'description' => _x( 'Tag', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-ji-ol" viewBox="0 0 24 24"><path d="M19.2,0.7l4.1,4.1c0.7,0.7,0.9,1.6,0.5,2.5L21.8,13c-0.1,0.2-0.2,0.3-0.3,0.4l-9.9,9.9c-0.9,0.9-2.4,0.9-3.4,0c0,0,0,0,0,0l-7.6-7.6c-0.9-0.9-0.9-2.4,0-3.4l9.9-9.9c0.1-0.1,0.3-0.2,0.4-0.3l5.7-2.1C17.6-0.2,18.6,0,19.2,0.7z M12.1,4.4l-9.7,9.7l7.6,7.6l9.7-9.7l2-5.5l-4.1-4.1C17.5,2.4,12.1,4.4,12.1,4.4z M15.4,8.6c-0.7-0.7-0.7-1.8-0.1-2.5s1.8-0.7,2.5-0.1c0,0,0,0,0.1,0.1c0.7,0.7,0.6,1.8-0.1,2.5C17.1,9.3,16.1,9.3,15.4,8.6L15.4,8.6z"/></svg>',
				'file_name'   => 'tag-outlined.svg',
			),

			'twrp-tax-ji-t-f'    => array(
				'brand'       => 'JamIcons',
				'description' => _x( 'Tags', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-ji-t-f" viewBox="0 0 24 24"><path d="M14.3,4l2.5,2.5c0.5,0.5,0.7,1.3,0.5,2l-1.3,4L8,20.4l-8-7.8l8.1-7.9l4.2-1.3C13,3.3,13.8,3.5,14.3,4z M10.5,10.2c0.6,0.6,1.6,0.6,2.2,0c0.6-0.6,0.6-1.5,0-2.1l0,0c-0.6-0.6-1.6-0.6-2.2,0C9.9,8.7,9.9,9.6,10.5,10.2L10.5,10.2z M17.9,11.2c0.6,0,1-0.1,1.2-0.3c0.7-0.5,0.7-1.5,0.2-2.1c-0.1-0.1-0.3-0.3-0.5-0.4c0.2-0.7-0.1-1.4-0.6-1.8l-1.8-1.7l2.3-0.7c0.7-0.2,1.5,0,2.1,0.5l2.5,2.5c0.5,0.5,0.7,1.3,0.5,2l-1.3,4l-8.1,7.9l-2.9-2.8l5.8-5.7C17.5,12.6,17.9,11.2,17.9,11.2z"/></svg>',
				'file_name'   => 'tags-filled.svg',
			),

			'twrp-tax-ji-t-ol'   => array(
				'brand'       => 'JamIcons',
				'description' => _x( 'Tags', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-ji-t-ol" viewBox="0 0 24 24"><path d="M11.6,18.1l1.5-1.4l1.5,1.4l6.3-6.2l1.1-3.6l-2.5-2.5l-1.1,0.3l-1.6-1.6L18.8,4c0.7-0.2,1.5,0,2.1,0.5l2.5,2.5c0.5,0.5,0.7,1.3,0.5,2l-1.3,4l-8.1,7.9L11.6,18.1L11.6,18.1z M14.3,3.8l2.5,2.5c0.5,0.5,0.7,1.3,0.5,2l-1.3,4L8,20.2l-8-7.8l8.1-7.9l4.2-1.3C13,3,13.8,3.2,14.3,3.8L14.3,3.8z M2.9,12.4L8,17.4l6.3-6.2l1.1-3.6l-2.5-2.5L9.2,6.3L2.9,12.4z M10.5,9.9c-0.6-0.6-0.6-1.5,0-2.1s1.6-0.6,2.2,0c0,0,0,0,0,0c0.6,0.6,0.6,1.6-0.1,2.1C12,10.5,11.1,10.5,10.5,9.9L10.5,9.9z M17.6,11l0.8-2.9c0.5,0.2,0.8,0.3,0.9,0.5c0.5,0.6,0.5,1.6-0.2,2.1C18.8,11,18.3,11,17.6,11z"/></svg>',
				'file_name'   => 'tags-outlined.svg',
			),

			'twrp-tax-ji-f-f'    => array(
				'brand'       => 'JamIcons',
				'description' => _x( 'Folder', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-ji-f-f" viewBox="0 0 24 24"><path d="M13,4.8h7.4c2,0,3.6,1.6,3.6,3.6V18c0,2-1.6,3.6-3.6,3.6H3.6C1.6,21.6,0,20,0,18V6c0-2,1.6-3.6,3.6-3.6h6C11.2,2.4,12.5,3.4,13,4.8z"/></svg>',
				'file_name'   => 'folder-filled.svg',
			),

			'twrp-tax-ji-f-ol'   => array(
				'brand'       => 'JamIcons',
				'description' => _x( 'Folder', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-ji-f-ol" viewBox="0 0 24 24"><path d="M20.4,7.2h-9.1l-0.6-1.6c-0.2-0.5-0.6-0.8-1.1-0.8h-6C2.9,4.8,2.4,5.3,2.4,6v12c0,0.7,0.5,1.2,1.2,1.2h16.8c0.7,0,1.2-0.5,1.2-1.2V8.4C21.6,7.7,21.1,7.2,20.4,7.2z M13,4.8h7.4c2,0,3.6,1.6,3.6,3.6V18c0,2-1.6,3.6-3.6,3.6H3.6C1.6,21.6,0,20,0,18V6c0-2,1.6-3.6,3.6-3.6h6C11.2,2.4,12.5,3.4,13,4.8z"/></svg>',
				'file_name'   => 'folder-outlined.svg',
			),

			'twrp-tax-ji-b-f'    => array(
				'brand'       => 'JamIcons',
				'description' => _x( 'Bookmark', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-ji-b-f" viewBox="0 0 24 24"><path d="M6.9,0h10.3C19.3,0,21,1.6,21,3.6v18c0,1.3-1.2,2.4-2.6,2.4c-0.6,0-1.3-0.2-1.7-0.6l-3.8-3.3c-0.5-0.4-1.2-0.4-1.7,0l-3.8,3.3c-1,0.9-2.7,0.8-3.6-0.2c-0.4-0.4-0.7-1-0.7-1.6v-18C3,1.6,4.7,0,6.9,0z"/></svg>',
				'file_name'   => 'bookmark-filled.svg',
			),

			'twrp-tax-ji-b-ol'   => array(
				'brand'       => 'JamIcons',
				'description' => _x( 'Bookmark', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-ji-b-ol" viewBox="0 0 24 24"><path d="M6.9,2.4c-0.7,0-1.3,0.5-1.3,1.2v18l3.8-3.3c1.5-1.3,3.7-1.3,5.2,0l3.8,3.3v-18c0-0.7-0.6-1.2-1.3-1.2H6.9z M6.9,0h10.3C19.3,0,21,1.6,21,3.6v18c0,1.3-1.2,2.4-2.6,2.4c-0.6,0-1.3-0.2-1.7-0.6l-3.8-3.3c-0.5-0.4-1.2-0.4-1.7,0l-3.8,3.3c-1,0.9-2.7,0.8-3.6-0.2c-0.4-0.4-0.7-1-0.7-1.6v-18C3,1.6,4.7,0,6.9,0z"/></svg>',
				'file_name'   => 'bookmark-outlined.svg',
			),

			'twrp-tax-ji-h-f'    => array(
				'brand'       => 'JamIcons',
				'description' => _x( 'Hashtag', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-ji-h-f" viewBox="0 0 24 24">twrp-tax-ji-h-f<path d="M10.7,10.7v2.6h2.6v-2.6H10.7z M10.7,8.1h2.6V4.3c0-0.7,0.6-1.3,1.3-1.3s1.3,0.6,1.3,1.3v3.9h3.9c0.7,0,1.3,0.6,1.3,1.3c0,0.7-0.6,1.3-1.3,1.3h-3.9v2.6h3.9c0.7,0,1.3,0.6,1.3,1.3s-0.6,1.3-1.3,1.3h-3.9v3.9c0,0.7-0.6,1.3-1.3,1.3s-1.3-0.6-1.3-1.3v-3.9h-2.6v3.9c0,0.7-0.6,1.3-1.3,1.3c-0.7,0-1.3-0.6-1.3-1.3v-3.9H4.3c-0.7,0-1.3-0.6-1.3-1.3s0.6-1.3,1.3-1.3h3.9v-2.6H4.3C3.6,10.7,3,10.1,3,9.4c0-0.7,0.6-1.3,1.3-1.3h3.9V4.3C8.1,3.6,8.7,3,9.4,3c0.7,0,1.3,0.6,1.3,1.3V8.1z"/></svg>',
				'file_name'   => 'hashtag-filled.svg',
			),

			#endregion -- Jam Icons

			#region -- Linea Icons

			'twrp-tax-li-ol'     => array(
				'brand'       => 'Linea',
				'description' => _x( 'Tag', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-li-ol" viewBox="0 0 64 64"><polygon fill="none" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" points="25,1 63,39 39,63 1,25 1,1"/><circle fill="none" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" cx="17" cy="17" r="6"/></svg>',
				'file_name'   => 'tag-outlined.svg',
			),

			'twrp-tax-li-t-ol'   => array(
				'brand'       => 'Linea',
				'description' => _x( 'Tags', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-li-t-ol" viewBox="0 0 64 64"><polygon fill="none" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" points="21.903,5 55,38.097 34.097,59 1,25.903 1,5"/><polyline fill="none" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" points="29.903,5 63,38.097 42.097,59"/><circle fill="none" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" cx="14" cy="18" r="5"/></svg>',
				'file_name'   => 'tags-outlined.svg',
			),

			'twrp-tax-li-f-ol'   => array(
				'brand'       => 'Linea',
				'description' => _x( 'Folder', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-li-f-ol" viewBox="0 0 64 64"><polygon fill="none" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" points="63,18 63,54 1,54 1,10 22,10 30,18"/></svg>',
				'file_name'   => 'folder-outlined.svg',
			),

			'twrp-tax-li-f2-ol'  => array(
				'brand'       => 'Linea',
				'description' => _x( 'Folders', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-li-f2-ol" viewBox="0 0 64 64"><polygon fill="none" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" points="56,22 56,54 1,54 1,15 19.629,15 26.726,22"/><polyline fill="none" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" points="8,13 8,7 26.629,7 33.726,14 63,14 63,46 58,46"/></svg>',
				'file_name'   => 'folders-outlined.svg',
			),

			'twrp-tax-li-b-ol'   => array(
				'brand'       => 'Linea',
				'description' => _x( 'Bookmark', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-li-b-ol" viewBox="0 0 64 64"><polygon fill="none" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" points="18,1 46,1 46,62 32,48 18,62"/></svg>',
				'file_name'   => 'bookmark-outlined.svg',
			),

			#endregion -- Linea Icons

			#region -- Octicons Icons

			'twrp-tax-o-ol'      => array(
				'brand'       => 'Octicons',
				'description' => _x( 'Tag', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-o-ol" viewBox="0 0 24 24"><path d="M7.75 6.5a1.25 1.25 0 100 2.5 1.25 1.25 0 000-2.5z"></path><path fill-rule="evenodd" d="M2.5 1A1.5 1.5 0 001 2.5v8.44c0 .397.158.779.44 1.06l10.25 10.25a1.5 1.5 0 002.12 0l8.44-8.44a1.5 1.5 0 000-2.12L12 1.44A1.5 1.5 0 0010.94 1H2.5zm0 1.5h8.44l10.25 10.25-8.44 8.44L2.5 10.94V2.5z"></path></svg>',
				'file_name'   => 'tag-outlined.svg',
			),

			'twrp-tax-o-f-f'     => array(
				'brand'       => 'Octicons',
				'description' => _x( 'Folder', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-o-f-f" viewBox="0 0 24 24"><path style="fill-rule:evenodd;clip-rule:evenodd;" d="M0,3.3c0-1.2,0.9-2.1,2.1-2.1h6c0.7,0,1.3,0.3,1.7,0.9l1.7,2.5c0.1,0.1,0.1,0.1,0.2,0.1h10.2c1.2,0,2.1,0.9,2.1,2.1v13.9c0,1.2-0.9,2.1-2.1,2.1H2.1c-1.2,0-2.1-0.9-2.1-2.1V3.3z"/></svg>',
				'file_name'   => 'folder-filled.svg',
			),

			'twrp-tax-o-f-ol'    => array(
				'brand'       => 'Octicons',
				'description' => _x( 'Folder', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-o-f-ol" viewBox="0 0 12 12"><path style="fill-rule:evenodd;clip-rule:evenodd;" d="M1,1.5C1,1.5,0.9,1.6,0.9,1.6v8.7c0,0.1,0.1,0.1,0.1,0.1h9.9c0.1,0,0.2-0.1,0.2-0.1V3.4c0-0.1-0.1-0.2-0.2-0.2H5.9C5.5,3.3,5.2,3.1,5,2.8L4.2,1.6c0,0-0.1-0.1-0.1-0.1H1z M0,1.6c0-0.6,0.5-1,1-1h3c0.3,0,0.7,0.2,0.9,0.5l0.8,1.2c0,0,0.1,0.1,0.1,0.1h5.1c0.6,0,1.1,0.5,1.1,1v6.9c0,0.6-0.5,1-1.1,1H1c-0.6,0-1-0.5-1-1V1.6z"/></svg>',
				'file_name'   => 'folder-outlined.svg',
			),

			'twrp-tax-o-b-f'     => array(
				'brand'       => 'Octicons',
				'description' => _x( 'Bookmark', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-o-b-f" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M6.69 2a1.75 1.75 0 00-1.75 1.756L5 21.253a.75.75 0 001.219.583L12 17.21l5.782 4.625A.75.75 0 0019 21.25V3.75A1.75 1.75 0 0017.25 2H6.69z"></path></svg>',
				'file_name'   => 'bookmark-filled.svg',
			),

			'twrp-tax-o-b-ol'    => array(
				'brand'       => 'Octicons',
				'description' => _x( 'Bookmark', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-o-b-ol" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M5 3.75C5 2.784 5.784 2 6.75 2h10.5c.966 0 1.75.784 1.75 1.75v17.5a.75.75 0 01-1.218.586L12 17.21l-5.781 4.625A.75.75 0 015 21.25V3.75zm1.75-.25a.25.25 0 00-.25.25v15.94l5.031-4.026a.75.75 0 01.938 0L17.5 19.69V3.75a.25.25 0 00-.25-.25H6.75z"></path></svg>',
				'file_name'   => 'bookmark-outlined.svg',
			),

			#endregion -- Octicons Icons

			#region -- Typicons Icons

			'twrp-tax-ti-ol'     => array(
				'brand'       => 'Typicons',
				'description' => _x( 'Tag', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-ti-ol" viewBox="0 0 24 24"><path d="M8,2.3c1.5,0,2.9,0.6,4,1.7l4,4l5.7,5.7l-8,8l-6.3-6.3C7.4,15.5,4,12,4,12C1.7,9.8,1.7,6.2,4,4C5.1,2.8,6.5,2.3,8,2.3 M8,0C5.9,0,3.9,0.8,2.3,2.3C0.8,3.9,0,5.9,0,8s0.8,4.1,2.3,5.7l3.4,3.4c0.1,0.1,0.3,0.2,0.4,0.3l5.9,5.9c0.4,0.4,1,0.7,1.6,0.7s1.2-0.2,1.6-0.7l8-8c0.9-0.9,0.9-2.3,0-3.2l-5.7-5.7l-3.9-4C12.1,0.8,10.1,0,8,0z M8,6.3c0.9,0,1.7,0.8,1.7,1.7S8.9,9.7,8,9.7S6.3,8.9,6.3,8S7.1,6.3,8,6.3 M8,5.1C6.4,5.1,5.1,6.4,5.1,8c0,1.6,1.3,2.9,2.9,2.9s2.9-1.3,2.9-2.9C10.9,6.4,9.6,5.1,8,5.1z"/></svg>',
				'file_name'   => 'tag-outlined.svg',
			),

			'twrp-tax-ti-t-ol'   => array(
				'brand'       => 'Typicons',
				'description' => _x( 'Tags', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-ti-t-ol" viewBox="0 0 24 24"><path d="M22.4,9l-7.1-6.8C13.8,0.8,11.9,0,9.8,0s-4,0.8-5.4,2.1C2.8,3.6,2,5.6,2.1,7.7C1.4,8.8,1,10.1,1,11.5c0,2,0.8,3.8,2.3,5.2l3.4,3.1l3.8,3.6c0.4,0.4,1,0.6,1.6,0.6s1.1-0.2,1.6-0.6l7.7-7.3c0.9-0.8,0.9-2.1,0-2.9L21.2,13l1.2-1.1C23.2,11.1,23.2,9.8,22.4,9z M12,21.9l-3.8-3.6l-3.3-3.1c-2.1-2-2.1-5.3,0-7.4c1.1-1,2.5-1.5,3.9-1.5s2.8,0.5,3.9,1.5l7.1,6.8C19.7,14.6,12,21.9,12,21.9z M14.2,6.3c-1.5-1.4-3.4-2.1-5.5-2.1c-1.4,0-2.7,0.4-3.9,1C5,4.6,5.4,4.1,5.9,3.6c1.1-1,2.5-1.5,3.9-1.5s2.8,0.5,3.9,1.5l7.1,6.8l-1.2,1.1L14.2,6.3z M8.7,9.9c0.9,0,1.6,0.7,1.6,1.6c0,0.9-0.7,1.6-1.6,1.6S7,12.3,7,11.5C7,10.6,7.8,9.9,8.7,9.9 M8.7,8.9c-1.5,0-2.8,1.2-2.8,2.6c0,1.4,1.2,2.6,2.8,2.6s2.8-1.2,2.8-2.6C11.4,10,10.2,8.9,8.7,8.9z"/></svg>',
				'file_name'   => 'tags-outlined.svg',
			),

			'twrp-tax-ti-f-ol'   => array(
				'brand'       => 'Typicons',
				'description' => _x( 'Folder', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-ti-f-ol" viewBox="0 0 24 24"><path d="M20,4h-8c0-1.5-1.2-2.7-2.7-2.7H4c-2.2,0-4,1.8-4,4v13.3c0,2.2,1.8,4,4,4h16c2.2,0,4-1.8,4-4V8C24,5.8,22.2,4,20,4z M4,4h5.3c0,1.5,1.2,2.7,2.7,2.7h8c0.7,0,1.3,0.6,1.3,1.3H2.7V5.3C2.7,4.6,3.3,4,4,4z M20,20H4c-0.7,0-1.3-0.6-1.3-1.3V9.3h18.7v9.3C21.3,19.4,20.7,20,20,20z"/></svg>',
				'file_name'   => 'folder-outlined.svg',
			),

			'twrp-tax-ti-fo-ol'  => array(
				'brand'       => 'Typicons',
				'description' => _x( 'Folder Open', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-ti-fo-ol" viewBox="0 0 24 24"><path d="M23.2,7.4h-2.7c-0.5-1.4-1.7-2.3-3.2-2.3h-6.9c0-1.3-1-2.3-2.3-2.3H3.4C1.5,2.9,0,4.3,0,6.3v11.4c0,1.9,1.5,3.4,3.4,3.4h13.7c1.9,0,3.9-1.5,4.3-3.4L24,8.6C24.1,7.9,23.7,7.4,23.2,7.4z M2.3,8.6V6.3c0-0.7,0.5-1.1,1.1-1.1H8c0,1.3,1,2.3,2.3,2.3h6.9c0.7,0,1.1,0.5,1.1,1.1H5.6C4.9,8.6,4.3,9,4.1,9.7l-1.8,7.2C2.3,16.9,2.3,8.6,2.3,8.6z M19.3,17.1c-0.2,0.9-1.3,1.7-2.2,1.7H3.4c0,0-0.5-0.2-0.2-0.9l2.2-8c0-0.1,0.2-0.2,0.3-0.2h15.6C21.4,9.7,19.3,17.1,19.3,17.1z"/></svg>',
				'file_name'   => 'folder-open-outlined.svg',
			),

			'twrp-tax-ti-b-ol'   => array(
				'brand'       => 'Typicons',
				'description' => _x( 'Bookmark', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'svg'         => '<svg id="twrp-tax-ti-b-ol" viewBox="0 0 24 24"><path d="M17.1,0.1H6.9C4.7,0.1,3,1.8,3,3.9v17.6c0,0.6,0.1,1.2,0.4,1.6c0.7,1.2,2.3,1.3,3.6,0l4.1-4c0.5-0.5,1.3-0.5,1.8,0l4.1,4c0.6,0.6,1.3,0.9,2,0.9c1,0,2.1-0.8,2.1-2.6V3.9C21,1.8,19.3,0.1,17.1,0.1z M6.9,2.6h10.3c0.7,0,1.3,0.6,1.3,1.3v12.4l-3.2-2.8c-1.8-1.6-4.7-1.6-6.6,0l-3.1,2.8V3.9C5.6,3.2,6.1,2.6,6.9,2.6z M14.7,17.3C14,16.6,13,16.2,12,16.2s-2,0.4-2.7,1.1l-3.7,3.6V18l4-3.6c1.3-1.2,3.5-1.2,4.8,0l4,3.6v2.9C18.4,20.9,14.7,17.3,14.7,17.3z"/></svg>',
				'file_name'   => 'bookmark-outlined.svg',
			),

			#endregion -- Typicons Icons

		);

		return $registered_category_vectors;
	}

}
