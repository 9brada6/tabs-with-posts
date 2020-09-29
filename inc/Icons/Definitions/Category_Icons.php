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
	 * Keywords to search for: tag, bookmark, hashtag, taxonomy, category, folder.
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
				'file_name'   => 'tag-filled.svg',
			),

			'twrp-tax-fa-t-f'    => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'Tags', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'tags-filled.svg',
			),

			'twrp-tax-fa-f-f'    => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'Folder', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'folder-filled.svg',
			),

			'twrp-tax-fa-f-ol'   => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'Folder', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'folder-outlined.svg',
			),

			'twrp-tax-fa-fo-f'   => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'Folder Open', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'folder-open-filled.svg',
			),

			'twrp-tax-fa-fo-ol'  => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'Folder Open', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'folder-open-outlined.svg',
			),

			'twrp-tax-fa-h-f'    => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'Hashtag', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'hashtag-filled.svg',
			),

			'twrp-tax-fa-b-f'    => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'Bookmark', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'bookmark-filled.svg',
			),

			'twrp-tax-fa-b-ol'   => array(
				'brand'       => 'FontAwesome',
				'description' => _x( 'Bookmark', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'bookmark-outlined.svg',
			),

			#endregion -- FontAwesome Icons

			#region -- Google Icons

			'twrp-tax-goo-f'     => array(
				'brand'       => 'Google',
				'description' => _x( 'Tag', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'tag-filled.svg',
			),

			'twrp-tax-goo-ol'    => array(
				'brand'       => 'Google',
				'description' => _x( 'Tag', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'tag-outlined.svg',
			),

			'twrp-tax-goo-dt'    => array(
				'brand'       => 'Google',
				'description' => _x( 'Tag', 'backend', 'twrp' ),
				'type'        => _x( 'DuoTone', 'backend', 'twrp' ),
				'file_name'   => 'tag-duotone.svg',
			),

			'twrp-tax-goo-sh'    => array(
				'brand'       => 'Google',
				'description' => _x( 'Tag', 'backend', 'twrp' ),
				'type'        => _x( 'Sharp', 'backend', 'twrp' ),
				'file_name'   => 'tag-sharp.svg',
			),

			'twrp-tax-goo-f-f'   => array(
				'brand'       => 'Google',
				'description' => _x( 'Folder', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'folder-filled.svg',
			),

			'twrp-tax-goo-f-ol'  => array(
				'brand'       => 'Google',
				'description' => _x( 'Folder', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'folder-outlined.svg',
			),

			'twrp-tax-goo-f-dt'  => array(
				'brand'       => 'Google',
				'description' => _x( 'Folder', 'backend', 'twrp' ),
				'type'        => _x( 'DuoTone', 'backend', 'twrp' ),
				'file_name'   => 'folder-duotone.svg',
			),

			'twrp-tax-goo-f-sh'  => array(
				'brand'       => 'Google',
				'description' => _x( 'Folder', 'backend', 'twrp' ),
				'type'        => _x( 'Sharp', 'backend', 'twrp' ),
				'file_name'   => 'folder-sharp.svg',
			),

			'twrp-tax-goo-h-f'   => array(
				'brand'       => 'Google',
				'description' => _x( 'Tag Heart', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'tag-heart-filled.svg',
			),

			'twrp-tax-goo-h-ol'  => array(
				'brand'       => 'Google',
				'description' => _x( 'Tag Heart', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'tag-heart-outlined.svg',
			),

			'twrp-tax-goo-h-dt'  => array(
				'brand'       => 'Google',
				'description' => _x( 'Tag Heart', 'backend', 'twrp' ),
				'type'        => _x( 'DuoTone', 'backend', 'twrp' ),
				'file_name'   => 'tag-heart-duotone.svg',
			),

			'twrp-tax-goo-h-sh'  => array(
				'brand'       => 'Google',
				'description' => _x( 'Tag Heart', 'backend', 'twrp' ),
				'type'        => _x( 'Sharp', 'backend', 'twrp' ),
				'file_name'   => 'tag-heart-sharp.svg',
			),

			'twrp-tax-goo-l-f'   => array(
				'brand'       => 'Google',
				'description' => _x( 'Label', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'label-filled.svg',
			),

			'twrp-tax-goo-l-ol'  => array(
				'brand'       => 'Google',
				'description' => _x( 'Label', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'label-outlined.svg',
			),

			'twrp-tax-goo-l-dt'  => array(
				'brand'       => 'Google',
				'description' => _x( 'Label', 'backend', 'twrp' ),
				'type'        => _x( 'DuoTone', 'backend', 'twrp' ),
				'file_name'   => 'label-duotone.svg',
			),

			'twrp-tax-goo-l-sh'  => array(
				'brand'       => 'Google',
				'description' => _x( 'Label', 'backend', 'twrp' ),
				'type'        => _x( 'Sharp', 'backend', 'twrp' ),
				'file_name'   => 'label-sharp.svg',
			),

			'twrp-tax-goo-l2-f'  => array(
				'brand'       => 'Google',
				'description' => _x( 'Label 2', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'label-2-filled.svg',
			),

			'twrp-tax-goo-l2-dt' => array(
				'brand'       => 'Google',
				'description' => _x( 'Label 2', 'backend', 'twrp' ),
				'type'        => _x( 'DuoTone', 'backend', 'twrp' ),
				'file_name'   => 'label-2-duotone.svg',
			),

			'twrp-tax-goo-b-f'   => array(
				'brand'       => 'Google',
				'description' => _x( 'Bookmark', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'bookmark-filled.svg',
			),

			'twrp-tax-goo-b-ol'  => array(
				'brand'       => 'Google',
				'description' => _x( 'Bookmark', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'bookmark-outlined.svg',
			),

			'twrp-tax-goo-b-dt'  => array(
				'brand'       => 'Google',
				'description' => _x( 'Bookmark', 'backend', 'twrp' ),
				'type'        => _x( 'DuoTone', 'backend', 'twrp' ),
				'file_name'   => 'bookmark-duotone.svg',
			),

			'twrp-tax-goo-b-sh'  => array(
				'brand'       => 'Google',
				'description' => _x( 'Bookmark', 'backend', 'twrp' ),
				'type'        => _x( 'Sharp', 'backend', 'twrp' ),
				'file_name'   => 'bookmark-sharp.svg',
			),

			'twrp-tax-goo-bs-f'  => array(
				'brand'       => 'Google',
				'description' => _x( 'Bookmarks', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'bookmarks-filled.svg',
			),

			'twrp-tax-goo-bs-ol' => array(
				'brand'       => 'Google',
				'description' => _x( 'Bookmarks', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'bookmarks-outlined.svg',
			),

			'twrp-tax-goo-bs-dt' => array(
				'brand'       => 'Google',
				'description' => _x( 'Bookmarks', 'backend', 'twrp' ),
				'type'        => _x( 'DuoTone', 'backend', 'twrp' ),
				'file_name'   => 'bookmarks-duotone.svg',
			),

			'twrp-tax-goo-bs-sh' => array(
				'brand'       => 'Google',
				'description' => _x( 'Bookmarks', 'backend', 'twrp' ),
				'type'        => _x( 'Sharp', 'backend', 'twrp' ),
				'file_name'   => 'bookmarks-sharp.svg',
			),

			#endregion -- Google Icons

			#region -- Dashicons Icons

			'twrp-tax-di-f'      => array(
				'brand'       => 'Dashicons',
				'description' => _x( 'Tag', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'tag-filled.svg',
			),

			'twrp-tax-di-c-f'    => array(
				'brand'       => 'Dashicons',
				'description' => _x( 'Folder', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'folder-filled.svg',
			),

			'twrp-tax-di-c2-f'   => array(
				'brand'       => 'Dashicons',
				'description' => _x( 'Folder Open', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'folder-2-filled.svg',
			),

			#endregion -- Dashicons Icons

			#region -- Foundation Icons

			'twrp-tax-fi-f'      => array(
				'brand'       => 'Foundation',
				'description' => _x( 'Tag', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'tag-filled.svg',
			),

			'twrp-tax-fi-t-f'    => array(
				'brand'       => 'Foundation',
				'description' => _x( 'Tags', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'tags-filled.svg',
			),

			'twrp-tax-fi-f-f'    => array(
				'brand'       => 'Foundation',
				'description' => _x( 'Folder', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'folder-filled.svg',
			),

			#endregion -- Foundation Icons

			#region -- Ionicons Icons

			'twrp-tax-ii-f'      => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Tag', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'tag-filled.svg',
			),

			'twrp-tax-ii-ol'     => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Tag', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'tag-outlined.svg',
			),

			'twrp-tax-ii-sh'     => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Tag', 'backend', 'twrp' ),
				'type'        => _x( 'Sharp', 'backend', 'twrp' ),
				'file_name'   => 'tag-sharp.svg',
			),

			'twrp-tax-ii-i-ol'   => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Ios Tag', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'ios-tag-outlined.svg',
			),

			'twrp-tax-ii-t-f'    => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Tags', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'tags-filled.svg',
			),

			'twrp-tax-ii-t-ol'   => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Tags', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'tags-outlined.svg',
			),

			'twrp-tax-ii-t-sh'   => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Tags', 'backend', 'twrp' ),
				'type'        => _x( 'Sharp', 'backend', 'twrp' ),
				'file_name'   => 'tags-sharp.svg',
			),

			'twrp-tax-ii-it-ol'  => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Ios Tags', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'ios-tags-outlined.svg',
			),

			'twrp-tax-ii-f-f'    => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Folder', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'folder-filled.svg',
			),

			'twrp-tax-ii-f-ol'   => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Folder', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'folder-outlined.svg',
			),

			'twrp-tax-ii-fo-f'   => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Folder Open', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'folder-open-filled.svg',
			),

			'twrp-tax-ii-fo-ol'  => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Folder Open', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'folder-open-outlined.svg',
			),

			'twrp-tax-ii-iof-f'  => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Ios Folder', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'ios-folder-filled.svg',
			),

			'twrp-tax-ii-iof-ol' => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Ios Folder', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'ios-folder-outlined.svg',
			),

			'twrp-tax-ii-b-f'    => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Bookmark', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'bookmark-filled.svg',
			),

			'twrp-tax-ii-b-ol'   => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Bookmark', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'bookmark-outlined.svg',
			),

			'twrp-tax-ii-b-sh'   => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Bookmark', 'backend', 'twrp' ),
				'type'        => _x( 'Sharp', 'backend', 'twrp' ),
				'file_name'   => 'bookmark-sharp.svg',
			),

			'twrp-tax-ii-bs-f'   => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Bookmarks', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'bookmarks-filled.svg',
			),

			'twrp-tax-ii-bs-ol'  => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Bookmarks', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'bookmarks-outlined.svg',
			),

			'twrp-tax-ii-bs-sh'  => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Bookmarks', 'backend', 'twrp' ),
				'type'        => _x( 'Sharp', 'backend', 'twrp' ),
				'file_name'   => 'bookmarks-sharp.svg',
			),

			'twrp-tax-ii-ibs-ol' => array(
				'brand'       => 'Ionicons',
				'description' => _x( 'Ios Bookmarks', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'ios-bookmark-outlined.svg',
			),

			#endregion -- Ionicons Icons

			#region -- IconMonstr Icons

			'twrp-tax-im-f'      => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Tag', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'tag-filled.svg',
			),

			'twrp-tax-im-ol'     => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Tag', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'tag-outlined.svg',
			),

			'twrp-tax-im-t'      => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Tag', 'backend', 'twrp' ),
				'type'        => _x( 'Thin', 'backend', 'twrp' ),
				'file_name'   => 'tag-thin.svg',
			),

			'twrp-tax-im-t-f'    => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Tags', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'tags-filled.svg',
			),

			'twrp-tax-im-t-ol'   => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Tags', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'tags-outlined.svg',
			),

			'twrp-tax-im-t-t'    => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Tags', 'backend', 'twrp' ),
				'type'        => _x( 'Thin', 'backend', 'twrp' ),
				'file_name'   => 'tags-thin.svg',
			),

			'twrp-tax-im-t2-f'   => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Tags 2', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'tags-2-filled.svg',
			),

			'twrp-tax-im-t2-ol'  => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Tags 2', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'tags-2-outlined.svg',
			),

			'twrp-tax-im-f-f'    => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Folder', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'folder-filled.svg',
			),

			'twrp-tax-im-f-ol'   => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Folder', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'folder-outlined.svg',
			),

			'twrp-tax-im-f-t'    => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Folder', 'backend', 'twrp' ),
				'type'        => _x( 'Thin', 'backend', 'twrp' ),
				'file_name'   => 'folder-thin.svg',
			),

			'twrp-tax-im-b-f'    => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Bookmark', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'bookmark-filled.svg',
			),

			'twrp-tax-im-b-ol'   => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Bookmark', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'bookmark-outlined.svg',
			),

			'twrp-tax-im-b-t'    => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Bookmark', 'backend', 'twrp' ),
				'type'        => _x( 'Thin', 'backend', 'twrp' ),
				'file_name'   => 'bookmark-thin.svg',
			),

			'twrp-tax-im-b2-f'   => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Bookmark 2', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'bookmark-2-filled.svg',
			),

			'twrp-tax-im-b2-ol'  => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Bookmark 2', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'bookmark-2-outlined.svg',
			),

			'twrp-tax-im-b3-f'   => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Bookmark 3', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'bookmark-3-filled.svg',
			),

			'twrp-tax-im-b3-ol'  => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Bookmark 3', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'bookmark-3-outlined.svg',
			),

			'twrp-tax-im-bs-f'   => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Bookmarks', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'bookmarks-filled.svg',
			),

			'twrp-tax-im-bs-ol'  => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Bookmarks', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'bookmarks-outlined.svg',
			),

			'twrp-tax-im-bs2-f'  => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Bookmarks 2', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'bookmarks-2-filled.svg',
			),

			'twrp-tax-im-bs2-ol' => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Bookmarks 2', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'bookmarks-2-outlined.svg',
			),

			'twrp-tax-im-h-f'    => array(
				'brand'       => 'IconMonstr',
				'description' => _x( 'Hashtag', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'hashtag-filled.svg',
			),

			#endregion -- IconMonstr Icons

			#region -- Capicon Icons

			'twrp-tax-ci-f'      => array(
				'brand'       => 'Capicon',
				'description' => _x( 'Tag', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'tag-filled.svg',
			),

			'twrp-tax-ci-2-f'    => array(
				'brand'       => 'Capicon',
				'description' => _x( 'Tag 2', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'tag-2-filled.svg',
			),

			'twrp-tax-ci-f-f'    => array(
				'brand'       => 'Capicon',
				'description' => _x( 'Folder', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'folder-filled.svg',
			),

			'twrp-tax-ci-b-f'    => array(
				'brand'       => 'Capicon',
				'description' => _x( 'Bookmark', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'bookmark-filled.svg',
			),

			#endregion -- Capicon Icons

			#region -- Feather Icons

			'twrp-tax-fe-ol'     => array(
				'brand'       => 'Feather',
				'description' => _x( 'Tag', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'tag-outlined.svg',
			),

			'twrp-tax-fe-f-ol'   => array(
				'brand'       => 'Feather',
				'description' => _x( 'Folder', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'folder-outlined.svg',
			),

			'twrp-tax-fe-b-ol'   => array(
				'brand'       => 'Feather',
				'description' => _x( 'Bookmark', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'bookmark-outlined.svg',
			),

			'twrp-tax-fe-h-f'    => array(
				'brand'       => 'Feather',
				'description' => _x( 'Hashtag', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'hashtag-filled.svg',
			),

			#endregion -- Feather Icons

			#region -- Jam Icons

			'twrp-tax-ji-f'      => array(
				'brand'       => 'JamIcons',
				'description' => _x( 'Tag', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'tag-filled.svg',
			),

			'twrp-tax-ji-ol'     => array(
				'brand'       => 'JamIcons',
				'description' => _x( 'Tag', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'tag-outlined.svg',
			),

			'twrp-tax-ji-t-f'    => array(
				'brand'       => 'JamIcons',
				'description' => _x( 'Tags', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'tags-filled.svg',
			),

			'twrp-tax-ji-t-ol'   => array(
				'brand'       => 'JamIcons',
				'description' => _x( 'Tags', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'tags-outlined.svg',
			),

			'twrp-tax-ji-f-f'    => array(
				'brand'       => 'JamIcons',
				'description' => _x( 'Folder', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'folder-filled.svg',
			),

			'twrp-tax-ji-f-ol'   => array(
				'brand'       => 'JamIcons',
				'description' => _x( 'Folder', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'folder-outlined.svg',
			),

			'twrp-tax-ji-b-f'    => array(
				'brand'       => 'JamIcons',
				'description' => _x( 'Bookmark', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'bookmark-filled.svg',
			),

			'twrp-tax-ji-b-ol'   => array(
				'brand'       => 'JamIcons',
				'description' => _x( 'Bookmark', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'bookmark-outlined.svg',
			),

			'twrp-tax-ji-h-f'    => array(
				'brand'       => 'JamIcons',
				'description' => _x( 'Hashtag', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'hashtag-filled.svg',
			),

			#endregion -- Jam Icons

			#region -- Linea Icons

			'twrp-tax-li-ol'     => array(
				'brand'       => 'Linea',
				'description' => _x( 'Tag', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'tag-outlined.svg',
			),

			'twrp-tax-li-t-ol'   => array(
				'brand'       => 'Linea',
				'description' => _x( 'Tags', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'tags-outlined.svg',
			),

			'twrp-tax-li-f-ol'   => array(
				'brand'       => 'Linea',
				'description' => _x( 'Folder', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'folder-outlined.svg',
			),

			'twrp-tax-li-f2-ol'  => array(
				'brand'       => 'Linea',
				'description' => _x( 'Folders', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'folders-outlined.svg',
			),

			'twrp-tax-li-b-ol'   => array(
				'brand'       => 'Linea',
				'description' => _x( 'Bookmark', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'bookmark-outlined.svg',
			),

			#endregion -- Linea Icons

			#region -- Octicons Icons

			'twrp-tax-oi-ol'     => array(
				'brand'       => 'Octicons',
				'description' => _x( 'Tag', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'tag-outlined.svg',
			),

			'twrp-tax-oi-f-f'    => array(
				'brand'       => 'Octicons',
				'description' => _x( 'Folder', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'folder-filled.svg',
			),

			'twrp-tax-oi-f-ol'   => array(
				'brand'       => 'Octicons',
				'description' => _x( 'Folder', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'folder-outlined.svg',
			),

			'twrp-tax-oi-b-f'    => array(
				'brand'       => 'Octicons',
				'description' => _x( 'Bookmark', 'backend', 'twrp' ),
				'type'        => _x( 'Filled', 'backend', 'twrp' ),
				'file_name'   => 'bookmark-filled.svg',
			),

			'twrp-tax-oi-b-ol'   => array(
				'brand'       => 'Octicons',
				'description' => _x( 'Bookmark', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'bookmark-outlined.svg',
			),

			#endregion -- Octicons Icons

			#region -- Typicons Icons

			'twrp-tax-ti-ol'     => array(
				'brand'       => 'Typicons',
				'description' => _x( 'Tag', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'tag-outlined.svg',
			),

			'twrp-tax-ti-t-ol'   => array(
				'brand'       => 'Typicons',
				'description' => _x( 'Tags', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'tags-outlined.svg',
			),

			'twrp-tax-ti-f-ol'   => array(
				'brand'       => 'Typicons',
				'description' => _x( 'Folder', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'folder-outlined.svg',
			),

			'twrp-tax-ti-fo-ol'  => array(
				'brand'       => 'Typicons',
				'description' => _x( 'Folder Open', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'folder-open-outlined.svg',
			),

			'twrp-tax-ti-b-ol'   => array(
				'brand'       => 'Typicons',
				'description' => _x( 'Bookmark', 'backend', 'twrp' ),
				'type'        => _x( 'Outlined', 'backend', 'twrp' ),
				'file_name'   => 'bookmark-outlined.svg',
			),

			#endregion -- Typicons Icons

		);

		return $registered_category_vectors;
	}

}
