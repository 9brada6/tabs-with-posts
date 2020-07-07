<?php
/**
 * Require all files.
 */

namespace TWRP;

class Require_Files {

	protected static $required_files = array(
		// Inc Folder
		'Utils',
		'Query_Settings_Manager',
		'Article_Blocks_Manager',
		'Get_Posts',

		// Admin
		'Admin/Settings_Menu',
		'Admin/Tabs/Interface_Admin_Menu_Tab',
		'Admin/Tabs/Documentation_Tab',
		'Admin/Tabs/Queries_Tab',

		// Artblock Component Settings
		'Artblock_Component/Widget_Component_Settings',

		'Artblock_Component/Widget_Component_Setting/Component_Setting',

		'Artblock_Component/Widget_Component_Setting/Font_Size_Setting',
		'Artblock_Component/Widget_Component_Setting/Line_Height_Setting',
		'Artblock_Component/Widget_Component_Setting/Font_Weight_Setting',

		// Article Blocks
		'Article_Block/Article_Block',
		'Article_Block/Simple_Article_Block',
		'Article_Block/Modern_Article_Block',

		// Database
		'Database/Query_Options',

		// Plugins
		'Plugins/Post_Rating',
		'Plugins/Post_Views',
		'Plugins/Post_Views_Plugins/Post_Views_Plugin',
		'Plugins/Post_Views_Plugins/A3REV_Views_Plugin',
		'Plugins/Post_Views_Plugins/DFactory_Views_Plugin',
		'Plugins/Post_Views_Plugins/GamerZ_Views_Plugin',

		'Plugins/Rating_Plugins/Post_Rating_Plugin',
		'Plugins/Rating_Plugins/BlazK_Rating_Plugin',
		'Plugins/Rating_Plugins/GamerZ_Rating_Plugin',
		'Plugins/Rating_Plugins/KK_Rating_Plugin',
		'Plugins/Rating_Plugins/PaulR_Rating_Plugin',
		'Plugins/Rating_Plugins/YASR_Rating_Plugin',

		// Query_Setting
		'Query_Setting/Query_Setting',
		'Query_Setting/Advanced_Arguments',
		'Query_Setting/Author',
		'Query_Setting/Categories',
		'Query_Setting/Password_Protected',
		'Query_Setting/Post_Comments',
		'Query_Setting/Post_Date',
		'Query_Setting/Post_Order',
		'Query_Setting/Post_Settings',
		'Query_Setting/Post_Status',
		'Query_Setting/Post_Types',
		'Query_Setting/Query_Name',
		'Query_Setting/Search',
		'Query_Setting/Sticky_Posts',
		'Query_Setting/Suppress_Filters',

		// TWRP_Widget
		'TWRP_Widget/Widget_Utilities',
		'TWRP_Widget/Widget',
		'TWRP_Widget/Widget_Ajax',
		'TWRP_Widget/Widget_Form',

		// Widget Control
		'Widget_Control/Widget_Control',
		'Widget_Control/Number_Control',
		'Widget_Control/Select_Control',

	);

	public static function init() {
		foreach ( self::$required_files as $file ) {
			require __DIR__ . '/' . $file . '.php';
		}
	}
}
