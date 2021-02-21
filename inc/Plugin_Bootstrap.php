<?php
/**
 * Require all files.
 */

namespace TWRP;

use TWRP\Utils\Class_Retriever_Utils;
use TWRP\CSS\Icons_CSS;
use TWRP\Utils\Directory_Utils;

/**
 * Class used to require all files needed by this plugin.
 *
 * An autoloader is not used, because other plugins can use an autoloader that
 * is slow, making this plugin slow as well.
 */
class Plugin_Bootstrap {

	/**
	 * All files that needs to be required for the plugin.
	 *
	 * @var array<string>
	 */
	protected static $required_files = array(
		// Utils.
		// These traits should be included first.
		'Utils/Helper_Trait/BEM_Class_Naming_Trait',
		'Utils/Helper_Trait/After_Setup_Theme_Init_Trait',
		'Utils/Helper_Interfaces/Class_Children_Order',

		'Utils/Simple_Utils',
		'Utils/Class_Retriever_Utils',
		'Utils/Color_Utils',
		'Utils/Date_Utils',
		'Utils/Directory_Utils',
		'Utils/Filesystem_Utils',
		'Utils/Widget_Utils',

		// Admin.
		'Admin/Helpers/Remember_Note',

		'Admin/Tabs/Documentation/Tab_Queries_Docs',
		'Admin/Tabs/Documentation/License_Display',
		'Admin/Tabs/Documentation/Icons_Documentation',

		'Admin/Tabs/General_Settings/General_Setting_Creator/General_Setting_Creator',
		'Admin/Tabs/General_Settings/General_Setting_Creator/General_Select_Setting',
		'Admin/Tabs/General_Settings/General_Setting_Creator/General_Radio_Setting',
		'Admin/Tabs/General_Settings/General_Setting_Creator/General_Text_Setting',
		'Admin/Tabs/General_Settings/General_Setting_Creator/General_Color_Setting',
		'Admin/Tabs/General_Settings/General_Setting_Creator/General_Select_With_Switch_Setting',
		'Admin/Tabs/General_Settings/General_Settings_Factory',

		'Admin/Tabs/Query_Options/Modify_Query_Settings',
		'Admin/Tabs/Query_Options/Existing_Table',
		'Admin/Tabs/Query_Options/Query_Templates',
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
		'Admin/Tabs/Admin_Menu_Tab',
		'Admin/Tabs/Documentation_Tab',
		'Admin/Tabs/General_Settings_Tab',
		'Admin/Tabs/Queries_Tab',

		'Admin/TWRP_Widget/Widget_Form',
		'Admin/TWRP_Widget/Widget_Sanitization',
		'Admin/TWRP_Widget/Widget_Ajax',
		'Admin/TWRP_Widget/Widget_Form_Components_Display',

		'Admin/Widget_Control/Widget_Control',
		'Admin/Widget_Control/Checkbox_Control',
		'Admin/Widget_Control/Number_Control',
		'Admin/Widget_Control/Select_Control',
		'Admin/Widget_Control/Color_Control',


		// Article Blocks.
		'Article_Block/Article_Block_Info',
		'Article_Block/Article_Block',

		'Article_Block/Component/Artblock_Component',
		'Article_Block/Component/Component_Settings/Component_Setting',

		'Article_Block/Component/Component_Settings/Font_Size_Setting',
		'Article_Block/Component/Component_Settings/Line_Height_Setting',
		'Article_Block/Component/Component_Settings/Font_Weight_Setting',
		'Article_Block/Component/Component_Settings/Color_Setting',
		'Article_Block/Component/Component_Settings/Hover_Color_Setting',
		'Article_Block/Component/Component_Settings/Flex_Order_Setting',
		'Article_Block/Component/Component_Settings/Text_Decoration_Setting',
		'Article_Block/Component/Component_Settings/Hover_Text_Decoration_Setting',

		'Article_Block/Settings/Artblock_Setting',
		'Article_Block/Settings/Display_Author_Setting',
		'Article_Block/Settings/Display_Date_Setting',
		'Article_Block/Settings/Display_Comments_Setting',
		'Article_Block/Settings/Display_Main_Category_Setting',
		'Article_Block/Settings/Display_Post_Thumbnail_Setting',
		'Article_Block/Settings/Display_Views_Setting',

		'Article_Block/Blocks/Simple_Article',
		'Article_Block/Blocks/Modern_Article',

		// CSS.
		'CSS/General_CSS',
		'CSS/Icons_CSS',

		// Database.
		'Database/General_Options_Settings/General_Option_Setting',
		'Database/General_Options_Settings/Accent_Color',
		'Database/General_Options_Settings/Darker_Accent_Color',
		'Database/General_Options_Settings/Text_Color',
		'Database/General_Options_Settings/Disabled_Text_Color',
		'Database/General_Options_Settings/Background_Color',
		'Database/General_Options_Settings/Secondary_Background_Color',
		'Database/General_Options_Settings/Human_Readable_Date',
		'Database/General_Options_Settings/Date_Format',
		'Database/General_Options_Settings/Author_Icon',
		'Database/General_Options_Settings/Date_Icon',
		'Database/General_Options_Settings/Category_Icon',
		'Database/General_Options_Settings/Comments_Icon',
		'Database/General_Options_Settings/Comments_Disabled_Icon_Auto_Select',
		'Database/General_Options_Settings/Comments_Disabled_Icon',
		'Database/General_Options_Settings/Views_Icon',
		'Database/General_Options_Settings/Rating_Pack_Icons',
		'Database/General_Options_Settings/Svg_Include_Inline',
		'Database/Query_Options',
		'Database/General_Options',
		'Database/Aside_Options',
		'Database/Inline_Icons_Option',

		// Icons.
		'Icons/Icon',
		'Icons/Rating_Icon_Pack',
		'Icons/Icon_Factory',
		'Icons/Icon_Categories',

		'Icons/Definitions/Icon_Definitions',
		'Icons/Definitions/User_Icons',
		'Icons/Definitions/Date_Icons',
		'Icons/Definitions/Category_Icons',
		'Icons/Definitions/Comments_Icons',
		'Icons/Definitions/Comments_Disabled_Icons',
		'Icons/Definitions/Views_Icons',
		'Icons/Definitions/Rating_Icons',

		// Plugins.
		'Plugins/Post_Views',

		'Plugins/Known_Plugins/Known_Plugin',
		'Plugins/Known_Plugins/Post_Views_Plugins/Post_Views_Plugin',
		'Plugins/Known_Plugins/Post_Views_Plugins/A3REV_Views_Plugin',
		'Plugins/Known_Plugins/Post_Views_Plugins/DFactory_Views_Plugin',
		'Plugins/Known_Plugins/Post_Views_Plugins/GamerZ_Views_Plugin',

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

		// Tabs_Creator.
		'Tabs_Creator/Tabs_Creator',

		// Tabs_Styles.
		'Tabs_Creator/Tabs_Styles/Tab_Style',
		'Tabs_Creator/Tabs_Styles/Styles/Simple_Tabs',
		'Tabs_Creator/Tabs_Styles/Styles/Button_Tabs',

		// TWRP_Widget.
		'TWRP_Widget',
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
	 * Function that is executed after all this plugin files have been included.
	 * These are things that cannot wait until 'after_setup_theme' action, that
	 * this plugin uses to initialize classes.
	 *
	 * If you want to add basic actions, see After_Setup_Theme_Init_Trait.
	 *
	 * @return void
	 */
	public static function after_file_including_execute() {

		// Regenerate the database and file icons, in case the plugin was
		// previously installed.
		$main_file_path = Directory_Utils::get_path_of_main_plugin_file();
		register_activation_hook( $main_file_path, array( Icons_CSS::class, 'write_needed_icons_to_file_on_plugin_activation' ) );
	}

	/**
	 * Searches for all classes that have the After_Setup_Theme_Init_Trait
	 * trait, and call the trait functions.
	 *
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
