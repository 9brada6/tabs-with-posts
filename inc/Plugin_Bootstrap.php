<?php
/**
 * Require all files.
 */

namespace TWRP;

use TWRP\Icons\Create_And_Enqueue_Icons;
use TWRP\TWRP_Widget\Widget_Ajax;
use TWRP\Utils\Class_Retriever_Utils;

class Plugin_Bootstrap {

	/**
	 * All files that needs to be required for the plugin.
	 *
	 * @var array<string>
	 */
	protected static $required_files = array(
		// Inc Folder.
		'Create_Tabs',

		// Utils.
		// These traits should be included first.
		'Utils/Helper_Trait/BEM_Class_Naming_Trait',
		'Utils/Helper_Trait/After_Setup_Theme_Init_Trait',
		'Utils/Helper_Trait/Class_Children_Order_Trait',
		'Utils/Simple_Utils',
		'Utils/Class_Retriever_Utils',
		'Utils/Date_Utils',
		'Utils/Directory_Utils',
		'Utils/Filesystem_Utils',
		'Utils/Widget_Utils',

		// Admin.
		'Admin/Helpers/Remember_Note',

		'Admin/Tabs/Documentation/License_Display',
		'Admin/Tabs/Documentation/Icons_Documentation',

		'Admin/Tabs/General_Settings/General_Setting_Creator/General_Setting_Creator',
		'Admin/Tabs/General_Settings/General_Setting_Creator/General_Select_Setting',
		'Admin/Tabs/General_Settings/General_Setting_Creator/General_Radio_Setting',
		'Admin/Tabs/General_Settings/General_Setting_Creator/General_Text_Setting',
		'Admin/Tabs/General_Settings/General_Setting_Creator/General_Select_With_Switch_Setting',
		'Admin/Tabs/General_Settings/General_Settings_Factory',

		'Admin/Tabs/Query_Options/Modify_Query_Settings',
		'Admin/Tabs/Query_Options/Existing_Table',
		'Admin/Tabs/Query_Options/Query_Settings_Display/Query_Setting_Display',
		'Admin/Tabs/Query_Options/Query_Settings_Display/Advanced_Arguments_Display',
		'Admin/Tabs/Query_Options/Query_Settings_Display/Author_Display',
		'Admin/Tabs/Query_Options/Query_Settings_Display/Categories_Display',
		'Admin/Tabs/Query_Options/Query_Settings_Display/Meta_Display',
		'Admin/Tabs/Query_Options/Query_Settings_Display/Password_Protected_Display',
		'Admin/Tabs/Query_Options/Query_Settings_Display/Post_Comments_Display',
		'Admin/Tabs/Query_Options/Query_Settings_Display/Post_Date_Display',
		'Admin/Tabs/Query_Options/Query_Settings_Display/Post_Order_Display',
		'Admin/Tabs/Query_Options/Query_Settings_Display/Post_Settings_Display',
		'Admin/Tabs/Query_Options/Query_Settings_Display/Post_Status_Display',
		'Admin/Tabs/Query_Options/Query_Settings_Display/Post_Types_Display',
		'Admin/Tabs/Query_Options/Query_Settings_Display/Query_Name_Display',
		'Admin/Tabs/Query_Options/Query_Settings_Display/Search_Display',
		'Admin/Tabs/Query_Options/Query_Settings_Display/Sticky_Posts_Display',
		'Admin/Tabs/Query_Options/Query_Settings_Display/Suppress_Filters_Display',


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
		'Database\General_Options_Settings\General_Option_Setting',
		'Database\General_Options_Settings\Per_Widget_Date_Format',
		'Database\General_Options_Settings\Human_Readable_Date',
		'Database\General_Options_Settings\Date_Format',
		'Database\General_Options_Settings\Author_Icon',
		'Database\General_Options_Settings\Date_Icon',
		'Database\General_Options_Settings\Category_Icon',
		'Database\General_Options_Settings\Comments_Icon',
		'Database\General_Options_Settings\Comments_Disabled_Icon_Auto_Select',
		'Database\General_Options_Settings\Comments_Disabled_Icon',
		'Database\General_Options_Settings\Views_Icon',
		'Database\General_Options_Settings\Rating_Pack_Icons',
		'Database\General_Options_Settings\Svg_Include_Inline',
		'Database/Query_Options',
		'Database/General_Options',
		'Database/Aside_Options',
		'Database/Inline_Icons_Option',

		// Icons.
		'Icons/Icon',
		'Icons/Rating_Icon_Pack',
		'Icons/Icon_Factory',
		'Icons/Icon_Categories',
		'Icons/Create_And_Enqueue_Icons',

		'Icons/Definitions/Icon_Definitions',
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
		'Query_Generator/Query_Generator',
		'Query_Generator/Query_Setting/Query_Setting',
		'Query_Generator/Query_Setting/Advanced_Arguments',
		'Query_Generator/Query_Setting/Author',
		'Query_Generator/Query_Setting/Categories',
		'Query_Generator/Query_Setting/Password_Protected',
		'Query_Generator/Query_Setting/Post_Comments',
		'Query_Generator/Query_Setting/Post_Date',
		'Query_Generator/Query_Setting/Post_Order',
		'Query_Generator/Query_Setting/Post_Settings',
		'Query_Generator/Query_Setting/Post_Status',
		'Query_Generator/Query_Setting/Post_Types',
		'Query_Generator/Query_Setting/Query_Name',
		'Query_Generator/Query_Setting/Search',
		'Query_Generator/Query_Setting/Meta_Setting',
		'Query_Generator/Query_Setting/Sticky_Posts',
		'Query_Generator/Query_Setting/Suppress_Filters',

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

		// Tabs_Creator
		'Tabs_Creator/Tabs_Creator',

	);

	/**
	 * Require all the files needed for the plugin.
	 *
	 * @return void
	 *
	 * @psalm-suppress all
	 */
	public static function include_all_files() {
		foreach ( self::$required_files as $file ) {
			require __DIR__ . '/' . $file . '.php';
		}
	}

	/**
	 * This method should be called immediately after include_all_files()
	 * method.
	 *
	 * @return void
	 */
	public static function initialize_after_setup_theme_hooks() {
		$trait_classes = Class_Retriever_Utils::get_all_classes_that_uses_after_init_theme_trait();

		foreach ( $trait_classes as $trait_class ) {
			$trait_class::after_setup_theme_init();
		}
	}

}
