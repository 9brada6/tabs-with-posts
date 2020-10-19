<?php
/**
 * Require all files.
 */

namespace TWRP;

class Require_Files {

	/**
	 * All files that needs to be required for the plugin.
	 *
	 * @var array<string>
	 */
	protected static $required_files = array(
		// Inc Folder.
		'Utils',
		'Query_Settings_Manager',
		'Article_Blocks_Manager',
		'Get_Posts',
		'Create_Tabs',

		// Admin.
		'Admin/Interface Helpers/License_Display',
		'Admin/General_Setting_Creator/General_Setting_Creator',
		'Admin/General_Setting_Creator/General_Select_Setting',
		'Admin/General_Setting_Creator/General_Radio_Setting',
		'Admin/General_Setting_Creator/General_Text_Setting',

		'Admin/Settings_Menu',
		'Admin/Tabs/Interface_Admin_Menu_Tab',
		'Admin/Tabs/Documentation_Tab',
		'Admin/Tabs/General_Settings_Tab',
		'Admin/Tabs/Queries_Tab',

		// Artblock Component Settings.
		'Artblock_Component/Widget_Component_Settings',

		'Artblock_Component/Widget_Component_Setting/Component_Setting',

		'Artblock_Component/Widget_Component_Setting/Font_Size_Setting',
		'Artblock_Component/Widget_Component_Setting/Line_Height_Setting',
		'Artblock_Component/Widget_Component_Setting/Font_Weight_Setting',
		'Artblock_Component/Widget_Component_Setting/Color_Setting',
		'Artblock_Component/Widget_Component_Setting/Hover_Color_Setting',
		'Artblock_Component/Widget_Component_Setting/Author_Icon_Setting',
		'Artblock_Component/Widget_Component_Setting/Category_Icon_Setting',
		'Artblock_Component/Widget_Component_Setting/Date_Icon_Setting',

		// Article Blocks.
		'Article_Block/Get_Widget_Settings_Trait',
		'Article_Block/Get_Settings_Trait',
		'Article_Block/Display_Post_Meta_Trait',
		'Article_Block/Article_Block',
		'Article_Block/Simple_Article_Block',
		'Article_Block/Modern_Article_Block',

		// Database.
		'Database/Query_Options',
		'Database/General_Options',

		// Icons.
		'Icons/Icon',
		'Icons/Rating_Icon_Pack',
		'Icons/SVG_Manager',
		'Icons/Create_And_Enqueue_Icons',

		'Icons/Definitions/User_Icons',
		'Icons/Definitions/Date_Icons',
		'Icons/Definitions/Category_Icons',
		'Icons/Definitions/Comments_Icons',
		'Icons/Definitions/Comments_Disabled_Icons',
		'Icons/Definitions/Views_Icons',
		'Icons/Definitions/Rating_Icons',

		// Plugins.
		'Plugins/Plugin_Info',
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

		// Query_Setting.
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
		'Query_Setting/Meta_Setting',
		'Query_Setting/Sticky_Posts',
		'Query_Setting/Suppress_Filters',

		// TWRP_Widget.
		'TWRP_Widget/Widget_Utilities',
		'TWRP_Widget/Widget',
		'TWRP_Widget/Widget_Ajax',
		'TWRP_Widget/Widget_Form',

		// Widget Control.
		'Widget_Control/Widget_Control',
		'Widget_Control/Checkbox_Control',
		'Widget_Control/Number_Control',
		'Widget_Control/Select_Control',
		'Widget_Control/Color_Control',
	);

	/**
	 * Require all the files needed for the plugin.
	 *
	 * @return void
	 */
	public static function init() {
		foreach ( self::$required_files as $file ) {
			/** @psalm-suppress all */
			require __DIR__ . '/' . $file . '.php';
		}
	}
}
