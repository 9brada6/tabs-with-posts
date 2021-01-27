<?php

/**
 * Deletes orphaned draft menu items
 *
 * @access private
 * @since 3.0.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 */
function _wp_delete_orphaned_draft_menu_items()
{
}
/**
 * Saves nav menu items
 *
 * @since 3.6.0
 *
 * @param int|string $nav_menu_selected_id (id, slug, or name ) of the currently-selected menu
 * @param string $nav_menu_selected_title Title of the currently-selected menu
 * @return array $messages The menu updated message
 */
function wp_nav_menu_update_menu_items($nav_menu_selected_id, $nav_menu_selected_title)
{
}
/**
 * If a JSON blob of navigation menu data is in POST data, expand it and inject
 * it into `$_POST` to avoid PHP `max_input_vars` limitations. See #14134.
 *
 * @ignore
 * @since 4.5.3
 * @access private
 */
function _wp_expand_nav_menu_post_data()
{
}
/**
 * WordPress Network Administration API.
 *
 * @package WordPress
 * @subpackage Administration
 * @since 4.4.0
 */
/**
 * Check for an existing network.
 *
 * @since 3.0.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @return Whether a network exists.
 */
function network_domain_check()
{
}
/**
 * Allow subdomain installation
 *
 * @since 3.0.0
 * @return bool Whether subdomain installation is allowed
 */
function allow_subdomain_install()
{
}
/**
 * Allow subdirectory installation.
 *
 * @since 3.0.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @return bool Whether subdirectory installation is allowed
 */
function allow_subdirectory_install()
{
}
/**
 * Get base domain of network.
 *
 * @since 3.0.0
 * @return string Base domain.
 */
function get_clean_basedomain()
{
}
/**
 * Prints step 1 for Network installation process.
 *
 * @todo Realistically, step 1 should be a welcome screen explaining what a Network is and such. Navigating to Tools > Network
 * 	should not be a sudden "Welcome to a new install process! Fill this out and click here." See also contextual help todo.
 *
 * @since 3.0.0
 *
 * @global bool $is_apache
 *
 * @param WP_Error $errors
 */
function network_step1($errors = \false)
{
}
/**
 * Prints step 2 for Network installation process.
 *
 * @since 3.0.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param WP_Error $errors
 */
function network_step2($errors = \false)
{
}
/**
 * WordPress Options Administration API.
 *
 * @package WordPress
 * @subpackage Administration
 * @since 4.4.0
 */
/**
 * Output JavaScript to toggle display of additional settings if avatars are disabled.
 *
 * @since 4.2.0
 */
function options_discussion_add_js()
{
}
/**
 * Display JavaScript on the page.
 *
 * @since 3.5.0
 */
function options_general_add_js()
{
}
/**
 * Display JavaScript on the page.
 *
 * @since 3.5.0
 */
function options_reading_add_js()
{
}
/**
 * Render the site charset setting.
 *
 * @since 3.5.0
 */
function options_reading_blog_charset()
{
}
/**
 * WordPress Plugin Install Administration API
 *
 * @package WordPress
 * @subpackage Administration
 */
/**
 * Retrieves plugin installer pages from the WordPress.org Plugins API.
 *
 * It is possible for a plugin to override the Plugin API result with three
 * filters. Assume this is for plugins, which can extend on the Plugin Info to
 * offer more choices. This is very powerful and must be used with care when
 * overriding the filters.
 *
 * The first filter, {@see 'plugins_api_args'}, is for the args and gives the action
 * as the second parameter. The hook for {@see 'plugins_api_args'} must ensure that
 * an object is returned.
 *
 * The second filter, {@see 'plugins_api'}, allows a plugin to override the WordPress.org
 * Plugin Installation API entirely. If `$action` is 'query_plugins' or 'plugin_information',
 * an object MUST be passed. If `$action` is 'hot_tags' or 'hot_categories', an array MUST
 * be passed.
 *
 * Finally, the third filter, {@see 'plugins_api_result'}, makes it possible to filter the
 * response object or array, depending on the `$action` type.
 *
 * Supported arguments per action:
 *
 * | Argument Name        | query_plugins | plugin_information | hot_tags | hot_categories |
 * | -------------------- | :-----------: | :----------------: | :------: | :------------: |
 * | `$slug`              | No            |  Yes               | No       | No             |
 * | `$per_page`          | Yes           |  No                | No       | No             |
 * | `$page`              | Yes           |  No                | No       | No             |
 * | `$number`            | No            |  No                | Yes      | Yes            |
 * | `$search`            | Yes           |  No                | No       | No             |
 * | `$tag`               | Yes           |  No                | No       | No             |
 * | `$author`            | Yes           |  No                | No       | No             |
 * | `$user`              | Yes           |  No                | No       | No             |
 * | `$browse`            | Yes           |  No                | No       | No             |
 * | `$locale`            | Yes           |  Yes               | No       | No             |
 * | `$installed_plugins` | Yes           |  No                | No       | No             |
 * | `$is_ssl`            | Yes           |  Yes               | No       | No             |
 * | `$fields`            | Yes           |  Yes               | No       | No             |
 *
 * @since 2.7.0
 *
 * @param string       $action API action to perform: 'query_plugins', 'plugin_information',
 *                             'hot_tags' or 'hot_categories'.
 * @param array|object $args   {
 *     Optional. Array or object of arguments to serialize for the Plugin Info API.
 *
 *     @type string  $slug              The plugin slug. Default empty.
 *     @type int     $per_page          Number of plugins per page. Default 24.
 *     @type int     $page              Number of current page. Default 1.
 *     @type int     $number            Number of tags or categories to be queried.
 *     @type string  $search            A search term. Default empty.
 *     @type string  $tag               Tag to filter plugins. Default empty.
 *     @type string  $author            Username of an plugin author to filter plugins. Default empty.
 *     @type string  $user              Username to query for their favorites. Default empty.
 *     @type string  $browse            Browse view: 'popular', 'new', 'beta', 'recommended'.
 *     @type string  $locale            Locale to provide context-sensitive results. Default is the value
 *                                      of get_locale().
 *     @type string  $installed_plugins Installed plugins to provide context-sensitive results.
 *     @type bool    $is_ssl            Whether links should be returned with https or not. Default false.
 *     @type array   $fields            {
 *         Array of fields which should or should not be returned.
 *
 *         @type bool $short_description Whether to return the plugin short description. Default true.
 *         @type bool $description       Whether to return the plugin full description. Default false.
 *         @type bool $sections          Whether to return the plugin readme sections: description, installation,
 *                                       FAQ, screenshots, other notes, and changelog. Default false.
 *         @type bool $tested            Whether to return the 'Compatible up to' value. Default true.
 *         @type bool $requires          Whether to return the required WordPress version. Default true.
 *         @type bool $rating            Whether to return the rating in percent and total number of ratings.
 *                                       Default true.
 *         @type bool $ratings           Whether to return the number of rating for each star (1-5). Default true.
 *         @type bool $downloaded        Whether to return the download count. Default true.
 *         @type bool $downloadlink      Whether to return the download link for the package. Default true.
 *         @type bool $last_updated      Whether to return the date of the last update. Default true.
 *         @type bool $added             Whether to return the date when the plugin was added to the wordpress.org
 *                                       repository. Default true.
 *         @type bool $tags              Whether to return the assigned tags. Default true.
 *         @type bool $compatibility     Whether to return the WordPress compatibility list. Default true.
 *         @type bool $homepage          Whether to return the plugin homepage link. Default true.
 *         @type bool $versions          Whether to return the list of all available versions. Default false.
 *         @type bool $donate_link       Whether to return the donation link. Default true.
 *         @type bool $reviews           Whether to return the plugin reviews. Default false.
 *         @type bool $banners           Whether to return the banner images links. Default false.
 *         @type bool $icons             Whether to return the icon links. Default false.
 *         @type bool $active_installs   Whether to return the number of active installations. Default false.
 *         @type bool $group             Whether to return the assigned group. Default false.
 *         @type bool $contributors      Whether to return the list of contributors. Default false.
 *     }
 * }
 * @return object|array|WP_Error Response object or array on success, WP_Error on failure. See the
 *         {@link https://developer.wordpress.org/reference/functions/plugins_api/ function reference article}
 *         for more information on the make-up of possible return values depending on the value of `$action`.
 */
function plugins_api($action, $args = array())
{
}
/**
 * Retrieve popular WordPress plugin tags.
 *
 * @since 2.7.0
 *
 * @param array $args
 * @return array
 */
function install_popular_tags($args = array())
{
}
/**
 * @since 2.7.0
 */
function install_dashboard()
{
}
/**
 * Displays a search form for searching plugins.
 *
 * @since 2.7.0
 * @since 4.6.0 The `$type_selector` parameter was deprecated.
 *
 * @param bool $deprecated Not used.
 */
function install_search_form($deprecated = \true)
{
}
/**
 * Upload from zip
 * @since 2.8.0
 */
function install_plugins_upload()
{
}
/**
 * Show a username form for the favorites page
 * @since 3.5.0
 *
 */
function install_plugins_favorites_form()
{
}
/**
 * Display plugin content based on plugin list.
 *
 * @since 2.7.0
 *
 * @global WP_List_Table $wp_list_table
 */
function display_plugins_table()
{
}
/**
 * Determine the status we can perform on a plugin.
 *
 * @since 3.0.0
 *
 * @param  array|object $api  Data about the plugin retrieved from the API.
 * @param  bool         $loop Optional. Disable further loops. Default false.
 * @return array {
 *     Plugin installation status data.
 *
 *     @type string $status  Status of a plugin. Could be one of 'install', 'update_available', 'latest_installed' or 'newer_installed'.
 *     @type string $url     Plugin installation URL.
 *     @type string $version The most recent version of the plugin.
 *     @type string $file    Plugin filename relative to the plugins directory.
 * }
 */
function install_plugin_install_status($api, $loop = \false)
{
}
/**
 * Display plugin information in dialog box form.
 *
 * @since 2.7.0
 *
 * @global string $tab
 */
function install_plugin_information()
{
}
/**
 * WordPress Plugin Administration API
 *
 * @package WordPress
 * @subpackage Administration
 */
/**
 * Parses the plugin contents to retrieve plugin's metadata.
 *
 * The metadata of the plugin's data searches for the following in the plugin's
 * header. All plugin data must be on its own line. For plugin description, it
 * must not have any newlines or only parts of the description will be displayed
 * and the same goes for the plugin data. The below is formatted for printing.
 *
 *     /*
 *     Plugin Name: Name of Plugin
 *     Plugin URI: Link to plugin information
 *     Description: Plugin Description
 *     Author: Plugin author's name
 *     Author URI: Link to the author's web site
 *     Version: Must be set in the plugin for WordPress 2.3+
 *     Text Domain: Optional. Unique identifier, should be same as the one used in
 *    		load_plugin_textdomain()
 *     Domain Path: Optional. Only useful if the translations are located in a
 *    		folder above the plugin's base path. For example, if .mo files are
 *    		located in the locale folder then Domain Path will be "/locale/" and
 *    		must have the first slash. Defaults to the base folder the plugin is
 *    		located in.
 *     Network: Optional. Specify "Network: true" to require that a plugin is activated
 *    		across all sites in an installation. This will prevent a plugin from being
 *    		activated on a single site when Multisite is enabled.
 *      * / # Remove the space to close comment
 *
 * Some users have issues with opening large files and manipulating the contents
 * for want is usually the first 1kiB or 2kiB. This function stops pulling in
 * the plugin contents when it has all of the required plugin data.
 *
 * The first 8kiB of the file will be pulled in and if the plugin data is not
 * within that first 8kiB, then the plugin author should correct their plugin
 * and move the plugin data headers to the top.
 *
 * The plugin file is assumed to have permissions to allow for scripts to read
 * the file. This is not checked however and the file is only opened for
 * reading.
 *
 * @since 1.5.0
 *
 * @param string $plugin_file Path to the main plugin file.
 * @param bool   $markup      Optional. If the returned data should have HTML markup applied.
 *                            Default true.
 * @param bool   $translate   Optional. If the returned data should be translated. Default true.
 * @return array {
 *     Plugin data. Values will be empty if not supplied by the plugin.
 *
 *     @type string $Name        Name of the plugin. Should be unique.
 *     @type string $Title       Title of the plugin and link to the plugin's site (if set).
 *     @type string $Description Plugin description.
 *     @type string $Author      Author's name.
 *     @type string $AuthorURI   Author's website address (if set).
 *     @type string $Version     Plugin version.
 *     @type string $TextDomain  Plugin textdomain.
 *     @type string $DomainPath  Plugins relative directory path to .mo files.
 *     @type bool   $Network     Whether the plugin can only be activated network-wide.
 * }
 */
function get_plugin_data($plugin_file, $markup = \true, $translate = \true)
{
}
/**
 * Sanitizes plugin data, optionally adds markup, optionally translates.
 *
 * @since 2.7.0
 * @access private
 * @see get_plugin_data()
 */
function _get_plugin_data_markup_translate($plugin_file, $plugin_data, $markup = \true, $translate = \true)
{
}
/**
 * Get a list of a plugin's files.
 *
 * @since 2.8.0
 *
 * @param string $plugin Path to the main plugin file from plugins directory.
 * @return array List of files relative to the plugin root.
 */
function get_plugin_files($plugin)
{
}
/**
 * Check the plugins directory and retrieve all plugin files with plugin data.
 *
 * WordPress only supports plugin files in the base plugins directory
 * (wp-content/plugins) and in one directory above the plugins directory
 * (wp-content/plugins/my-plugin). The file it looks for has the plugin data
 * and must be found in those two locations. It is recommended to keep your
 * plugin files in their own directories.
 *
 * The file with the plugin data is the file that will be included and therefore
 * needs to have the main execution for the plugin. This does not mean
 * everything must be contained in the file and it is recommended that the file
 * be split for maintainability. Keep everything in one file for extreme
 * optimization purposes.
 *
 * @since 1.5.0
 *
 * @param string $plugin_folder Optional. Relative path to single plugin folder.
 * @return array Key is the plugin file path and the value is an array of the plugin data.
 */
function get_plugins($plugin_folder = '')
{
}
/**
 * Check the mu-plugins directory and retrieve all mu-plugin files with any plugin data.
 *
 * WordPress only includes mu-plugin files in the base mu-plugins directory (wp-content/mu-plugins).
 *
 * @since 3.0.0
 * @return array Key is the mu-plugin file path and the value is an array of the mu-plugin data.
 */
function get_mu_plugins()
{
}
/**
 * Callback to sort array by a 'Name' key.
 *
 * @since 3.1.0
 * @access private
 */
function _sort_uname_callback($a, $b)
{
}
/**
 * Check the wp-content directory and retrieve all drop-ins with any plugin data.
 *
 * @since 3.0.0
 * @return array Key is the file path and the value is an array of the plugin data.
 */
function get_dropins()
{
}
/**
 * Returns drop-ins that WordPress uses.
 *
 * Includes Multisite drop-ins only when is_multisite()
 *
 * @since 3.0.0
 * @return array Key is file name. The value is an array, with the first value the
 *	purpose of the drop-in and the second value the name of the constant that must be
 *	true for the drop-in to be used, or true if no constant is required.
 */
function _get_dropins()
{
}
/**
 * Check whether a plugin is active.
 *
 * Only plugins installed in the plugins/ folder can be active.
 *
 * Plugins in the mu-plugins/ folder can't be "activated," so this function will
 * return false for those plugins.
 *
 * @since 2.5.0
 *
 * @param string $plugin Path to the main plugin file from plugins directory.
 * @return bool True, if in the active plugins list. False, not in the list.
 */
function is_plugin_active($plugin)
{
}
/**
 * Check whether the plugin is inactive.
 *
 * Reverse of is_plugin_active(). Used as a callback.
 *
 * @since 3.1.0
 * @see is_plugin_active()
 *
 * @param string $plugin Path to the main plugin file from plugins directory.
 * @return bool True if inactive. False if active.
 */
function is_plugin_inactive($plugin)
{
}
/**
 * Check whether the plugin is active for the entire network.
 *
 * Only plugins installed in the plugins/ folder can be active.
 *
 * Plugins in the mu-plugins/ folder can't be "activated," so this function will
 * return false for those plugins.
 *
 * @since 3.0.0
 *
 * @param string $plugin Path to the main plugin file from plugins directory.
 * @return bool True, if active for the network, otherwise false.
 */
function is_plugin_active_for_network($plugin)
{
}
/**
 * Checks for "Network: true" in the plugin header to see if this should
 * be activated only as a network wide plugin. The plugin would also work
 * when Multisite is not enabled.
 *
 * Checks for "Site Wide Only: true" for backward compatibility.
 *
 * @since 3.0.0
 *
 * @param string $plugin Path to the main plugin file from plugins directory.
 * @return bool True if plugin is network only, false otherwise.
 */
function is_network_only_plugin($plugin)
{
}
/**
 * Attempts activation of plugin in a "sandbox" and redirects on success.
 *
 * A plugin that is already activated will not attempt to be activated again.
 *
 * The way it works is by setting the redirection to the error before trying to
 * include the plugin file. If the plugin fails, then the redirection will not
 * be overwritten with the success message. Also, the options will not be
 * updated and the activation hook will not be called on plugin error.
 *
 * It should be noted that in no way the below code will actually prevent errors
 * within the file. The code should not be used elsewhere to replicate the
 * "sandbox", which uses redirection to work.
 * {@source 13 1}
 *
 * If any errors are found or text is outputted, then it will be captured to
 * ensure that the success redirection will update the error redirection.
 *
 * @since 2.5.0
 *
 * @param string $plugin       Path to the main plugin file from plugins directory.
 * @param string $redirect     Optional. URL to redirect to.
 * @param bool   $network_wide Optional. Whether to enable the plugin for all sites in the network
 *                             or just the current site. Multisite only. Default false.
 * @param bool   $silent       Optional. Whether to prevent calling activation hooks. Default false.
 * @return WP_Error|null WP_Error on invalid file or null on success.
 */
function activate_plugin($plugin, $redirect = '', $network_wide = \false, $silent = \false)
{
}
/**
 * Deactivate a single plugin or multiple plugins.
 *
 * The deactivation hook is disabled by the plugin upgrader by using the $silent
 * parameter.
 *
 * @since 2.5.0
 *
 * @param string|array $plugins Single plugin or list of plugins to deactivate.
 * @param bool $silent Prevent calling deactivation hooks. Default is false.
 * @param mixed $network_wide Whether to deactivate the plugin for all sites in the network.
 * 	A value of null (the default) will deactivate plugins for both the site and the network.
 */
function deactivate_plugins($plugins, $silent = \false, $network_wide = \null)
{
}
/**
 * Activate multiple plugins.
 *
 * When WP_Error is returned, it does not mean that one of the plugins had
 * errors. It means that one or more of the plugins file path was invalid.
 *
 * The execution will be halted as soon as one of the plugins has an error.
 *
 * @since 2.6.0
 *
 * @param string|array $plugins Single plugin or list of plugins to activate.
 * @param string $redirect Redirect to page after successful activation.
 * @param bool $network_wide Whether to enable the plugin for all sites in the network.
 * @param bool $silent Prevent calling activation hooks. Default is false.
 * @return bool|WP_Error True when finished or WP_Error if there were errors during a plugin activation.
 */
function activate_plugins($plugins, $redirect = '', $network_wide = \false, $silent = \false)
{
}
/**
 * Remove directory and files of a plugin for a list of plugins.
 *
 * @since 2.6.0
 *
 * @global WP_Filesystem_Base $wp_filesystem
 *
 * @param array  $plugins    List of plugins to delete.
 * @param string $deprecated Deprecated.
 * @return bool|null|WP_Error True on success, false is $plugins is empty, WP_Error on failure.
 *                            Null if filesystem credentials are required to proceed.
 */
function delete_plugins($plugins, $deprecated = '')
{
}
/**
 * Validate active plugins
 *
 * Validate all active plugins, deactivates invalid and
 * returns an array of deactivated ones.
 *
 * @since 2.5.0
 * @return array invalid plugins, plugin as key, error as value
 */
function validate_active_plugins()
{
}
/**
 * Validate the plugin path.
 *
 * Checks that the main plugin file exists and is a valid plugin. See validate_file().
 *
 * @since 2.5.0
 *
 * @param string $plugin Path to the main plugin file from plugins directory.
 * @return WP_Error|int 0 on success, WP_Error on failure.
 */
function validate_plugin($plugin)
{
}
/**
 * Whether the plugin can be uninstalled.
 *
 * @since 2.7.0
 *
 * @param string $plugin Path to the main plugin file from plugins directory.
 * @return bool Whether plugin can be uninstalled.
 */
function is_uninstallable_plugin($plugin)
{
}
/**
 * Uninstall a single plugin.
 *
 * Calls the uninstall hook, if it is available.
 *
 * @since 2.7.0
 *
 * @param string $plugin Path to the main plugin file from plugins directory.
 * @return true True if a plugin's uninstall.php file has been found and included.
 */
function uninstall_plugin($plugin)
{
}
//
// Menu
//
/**
 * Add a top-level menu page.
 *
 * This function takes a capability which will be used to determine whether
 * or not a page is included in the menu.
 *
 * The function which is hooked in to handle the output of the page must check
 * that the user has the required capability as well.
 *
 * @global array $menu
 * @global array $admin_page_hooks
 * @global array $_registered_pages
 * @global array $_parent_pages
 *
 * @param string   $page_title The text to be displayed in the title tags of the page when the menu is selected.
 * @param string   $menu_title The text to be used for the menu.
 * @param string   $capability The capability required for this menu to be displayed to the user.
 * @param string   $menu_slug  The slug name to refer to this menu by. Should be unique for this menu page and only
 *                             include lowercase alphanumeric, dashes, and underscores characters to be compatible
 *                             with sanitize_key().
 * @param callable $function   The function to be called to output the content for this page.
 * @param string   $icon_url   The URL to the icon to be used for this menu.
 *                             * Pass a base64-encoded SVG using a data URI, which will be colored to match
 *                               the color scheme. This should begin with 'data:image/svg+xml;base64,'.
 *                             * Pass the name of a Dashicons helper class to use a font icon,
 *                               e.g. 'dashicons-chart-pie'.
 *                             * Pass 'none' to leave div.wp-menu-image empty so an icon can be added via CSS.
 * @param int      $position   The position in the menu order this one should appear.
 * @return string The resulting page's hook_suffix.
 */
function add_menu_page($page_title, $menu_title, $capability, $menu_slug, $function = '', $icon_url = '', $position = \null)
{
}
/**
 * Add a submenu page.
 *
 * This function takes a capability which will be used to determine whether
 * or not a page is included in the menu.
 *
 * The function which is hooked in to handle the output of the page must check
 * that the user has the required capability as well.
 *
 * @global array $submenu
 * @global array $menu
 * @global array $_wp_real_parent_file
 * @global bool  $_wp_submenu_nopriv
 * @global array $_registered_pages
 * @global array $_parent_pages
 *
 * @param string   $parent_slug The slug name for the parent menu (or the file name of a standard
 *                              WordPress admin page).
 * @param string   $page_title  The text to be displayed in the title tags of the page when the menu
 *                              is selected.
 * @param string   $menu_title  The text to be used for the menu.
 * @param string   $capability  The capability required for this menu to be displayed to the user.
 * @param string   $menu_slug   The slug name to refer to this menu by. Should be unique for this menu
 *                              and only include lowercase alphanumeric, dashes, and underscores characters
 *                              to be compatible with sanitize_key().
 * @param callable $function    The function to be called to output the content for this page.
 * @return false|string The resulting page's hook_suffix, or false if the user does not have the capability required.
 */
function add_submenu_page($parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function = '')
{
}
/**
 * Add submenu page to the Tools main menu.
 *
 * This function takes a capability which will be used to determine whether
 * or not a page is included in the menu.
 *
 * The function which is hooked in to handle the output of the page must check
 * that the user has the required capability as well.
 *
 * @param string   $page_title The text to be displayed in the title tags of the page when the menu is selected.
 * @param string   $menu_title The text to be used for the menu.
 * @param string   $capability The capability required for this menu to be displayed to the user.
 * @param string   $menu_slug  The slug name to refer to this menu by (should be unique for this menu).
 * @param callable $function   The function to be called to output the content for this page.
 * @return false|string The resulting page's hook_suffix, or false if the user does not have the capability required.
 */
function add_management_page($page_title, $menu_title, $capability, $menu_slug, $function = '')
{
}
/**
 * Add submenu page to the Settings main menu.
 *
 * This function takes a capability which will be used to determine whether
 * or not a page is included in the menu.
 *
 * The function which is hooked in to handle the output of the page must check
 * that the user has the required capability as well.
 *
 * @param string   $page_title The text to be displayed in the title tags of the page when the menu is selected.
 * @param string   $menu_title The text to be used for the menu.
 * @param string   $capability The capability required for this menu to be displayed to the user.
 * @param string   $menu_slug  The slug name to refer to this menu by (should be unique for this menu).
 * @param callable $function   The function to be called to output the content for this page.
 * @return false|string The resulting page's hook_suffix, or false if the user does not have the capability required.
 */
function add_options_page($page_title, $menu_title, $capability, $menu_slug, $function = '')
{
}
/**
 * Add submenu page to the Appearance main menu.
 *
 * This function takes a capability which will be used to determine whether
 * or not a page is included in the menu.
 *
 * The function which is hooked in to handle the output of the page must check
 * that the user has the required capability as well.
 *
 * @param string   $page_title The text to be displayed in the title tags of the page when the menu is selected.
 * @param string   $menu_title The text to be used for the menu.
 * @param string   $capability The capability required for this menu to be displayed to the user.
 * @param string   $menu_slug  The slug name to refer to this menu by (should be unique for this menu).
 * @param callable $function   The function to be called to output the content for this page.
 * @return false|string The resulting page's hook_suffix, or false if the user does not have the capability required.
 */
function add_theme_page($page_title, $menu_title, $capability, $menu_slug, $function = '')
{
}
/**
 * Add submenu page to the Plugins main menu.
 *
 * This function takes a capability which will be used to determine whether
 * or not a page is included in the menu.
 *
 * The function which is hooked in to handle the output of the page must check
 * that the user has the required capability as well.
 *
 * @param string   $page_title The text to be displayed in the title tags of the page when the menu is selected.
 * @param string   $menu_title The text to be used for the menu.
 * @param string   $capability The capability required for this menu to be displayed to the user.
 * @param string   $menu_slug  The slug name to refer to this menu by (should be unique for this menu).
 * @param callable $function   The function to be called to output the content for this page.
 * @return false|string The resulting page's hook_suffix, or false if the user does not have the capability required.
 */
function add_plugins_page($page_title, $menu_title, $capability, $menu_slug, $function = '')
{
}
/**
 * Add submenu page to the Users/Profile main menu.
 *
 * This function takes a capability which will be used to determine whether
 * or not a page is included in the menu.
 *
 * The function which is hooked in to handle the output of the page must check
 * that the user has the required capability as well.
 *
 * @param string   $page_title The text to be displayed in the title tags of the page when the menu is selected.
 * @param string   $menu_title The text to be used for the menu.
 * @param string   $capability The capability required for this menu to be displayed to the user.
 * @param string   $menu_slug  The slug name to refer to this menu by (should be unique for this menu).
 * @param callable $function   The function to be called to output the content for this page.
 * @return false|string The resulting page's hook_suffix, or false if the user does not have the capability required.
 */
function add_users_page($page_title, $menu_title, $capability, $menu_slug, $function = '')
{
}
/**
 * Add submenu page to the Dashboard main menu.
 *
 * This function takes a capability which will be used to determine whether
 * or not a page is included in the menu.
 *
 * The function which is hooked in to handle the output of the page must check
 * that the user has the required capability as well.
 *
 * @param string   $page_title The text to be displayed in the title tags of the page when the menu is selected.
 * @param string   $menu_title The text to be used for the menu.
 * @param string   $capability The capability required for this menu to be displayed to the user.
 * @param string   $menu_slug  The slug name to refer to this menu by (should be unique for this menu).
 * @param callable $function   The function to be called to output the content for this page.
 * @return false|string The resulting page's hook_suffix, or false if the user does not have the capability required.
 */
function add_dashboard_page($page_title, $menu_title, $capability, $menu_slug, $function = '')
{
}
/**
 * Add submenu page to the Posts main menu.
 *
 * This function takes a capability which will be used to determine whether
 * or not a page is included in the menu.
 *
 * The function which is hooked in to handle the output of the page must check
 * that the user has the required capability as well.
 *
 * @param string   $page_title The text to be displayed in the title tags of the page when the menu is selected.
 * @param string   $menu_title The text to be used for the menu.
 * @param string   $capability The capability required for this menu to be displayed to the user.
 * @param string   $menu_slug  The slug name to refer to this menu by (should be unique for this menu).
 * @param callable $function   The function to be called to output the content for this page.
 * @return false|string The resulting page's hook_suffix, or false if the user does not have the capability required.
 */
function add_posts_page($page_title, $menu_title, $capability, $menu_slug, $function = '')
{
}
/**
 * Add submenu page to the Media main menu.
 *
 * This function takes a capability which will be used to determine whether
 * or not a page is included in the menu.
 *
 * The function which is hooked in to handle the output of the page must check
 * that the user has the required capability as well.
 *
 * @param string   $page_title The text to be displayed in the title tags of the page when the menu is selected.
 * @param string   $menu_title The text to be used for the menu.
 * @param string   $capability The capability required for this menu to be displayed to the user.
 * @param string   $menu_slug  The slug name to refer to this menu by (should be unique for this menu).
 * @param callable $function   The function to be called to output the content for this page.
 * @return false|string The resulting page's hook_suffix, or false if the user does not have the capability required.
 */
function add_media_page($page_title, $menu_title, $capability, $menu_slug, $function = '')
{
}
/**
 * Add submenu page to the Links main menu.
 *
 * This function takes a capability which will be used to determine whether
 * or not a page is included in the menu.
 *
 * The function which is hooked in to handle the output of the page must check
 * that the user has the required capability as well.
 *
 * @param string   $page_title The text to be displayed in the title tags of the page when the menu is selected.
 * @param string   $menu_title The text to be used for the menu.
 * @param string   $capability The capability required for this menu to be displayed to the user.
 * @param string   $menu_slug  The slug name to refer to this menu by (should be unique for this menu).
 * @param callable $function   The function to be called to output the content for this page.
 * @return false|string The resulting page's hook_suffix, or false if the user does not have the capability required.
 */
function add_links_page($page_title, $menu_title, $capability, $menu_slug, $function = '')
{
}
/**
 * Add submenu page to the Pages main menu.
 *
 * This function takes a capability which will be used to determine whether
 * or not a page is included in the menu.
 *
 * The function which is hooked in to handle the output of the page must check
 * that the user has the required capability as well.
 *
 * @param string   $page_title The text to be displayed in the title tags of the page when the menu is selected.
 * @param string   $menu_title The text to be used for the menu.
 * @param string   $capability The capability required for this menu to be displayed to the user.
 * @param string   $menu_slug  The slug name to refer to this menu by (should be unique for this menu).
 * @param callable $function   The function to be called to output the content for this page.
 * @return false|string The resulting page's hook_suffix, or false if the user does not have the capability required.
 */
function add_pages_page($page_title, $menu_title, $capability, $menu_slug, $function = '')
{
}
/**
 * Add submenu page to the Comments main menu.
 *
 * This function takes a capability which will be used to determine whether
 * or not a page is included in the menu.
 *
 * The function which is hooked in to handle the output of the page must check
 * that the user has the required capability as well.
 *
 * @param string   $page_title The text to be displayed in the title tags of the page when the menu is selected.
 * @param string   $menu_title The text to be used for the menu.
 * @param string   $capability The capability required for this menu to be displayed to the user.
 * @param string   $menu_slug  The slug name to refer to this menu by (should be unique for this menu).
 * @param callable $function   The function to be called to output the content for this page.
 * @return false|string The resulting page's hook_suffix, or false if the user does not have the capability required.
 */
function add_comments_page($page_title, $menu_title, $capability, $menu_slug, $function = '')
{
}
/**
 * Remove a top-level admin menu.
 *
 * @since 3.1.0
 *
 * @global array $menu
 *
 * @param string $menu_slug The slug of the menu.
 * @return array|bool The removed menu on success, false if not found.
 */
function remove_menu_page($menu_slug)
{
}
/**
 * Remove an admin submenu.
 *
 * @since 3.1.0
 *
 * @global array $submenu
 *
 * @param string $menu_slug    The slug for the parent menu.
 * @param string $submenu_slug The slug of the submenu.
 * @return array|bool The removed submenu on success, false if not found.
 */
function remove_submenu_page($menu_slug, $submenu_slug)
{
}
/**
 * Get the url to access a particular menu page based on the slug it was registered with.
 *
 * If the slug hasn't been registered properly no url will be returned
 *
 * @since 3.0.0
 *
 * @global array $_parent_pages
 *
 * @param string $menu_slug The slug name to refer to this menu by (should be unique for this menu)
 * @param bool $echo Whether or not to echo the url - default is true
 * @return string the url
 */
function menu_page_url($menu_slug, $echo = \true)
{
}
//
// Pluggable Menu Support -- Private
//
/**
 *
 * @global string $parent_file
 * @global array $menu
 * @global array $submenu
 * @global string $pagenow
 * @global string $typenow
 * @global string $plugin_page
 * @global array $_wp_real_parent_file
 * @global array $_wp_menu_nopriv
 * @global array $_wp_submenu_nopriv
 */
function get_admin_page_parent($parent = '')
{
}
/**
 *
 * @global string $title
 * @global array $menu
 * @global array $submenu
 * @global string $pagenow
 * @global string $plugin_page
 * @global string $typenow
 * @return string The title of the current admin page.
 */
function get_admin_page_title()
{
}
/**
 * @since 2.3.0
 *
 * @param string $plugin_page
 * @param string $parent_page
 * @return string|null
 */
function get_plugin_page_hook($plugin_page, $parent_page)
{
}
/**
 *
 * @global array $admin_page_hooks
 * @param string $plugin_page
 * @param string $parent_page
 */
function get_plugin_page_hookname($plugin_page, $parent_page)
{
}
/**
 *
 * @global string $pagenow
 * @global array $menu
 * @global array $submenu
 * @global array $_wp_menu_nopriv
 * @global array $_wp_submenu_nopriv
 * @global string $plugin_page
 * @global array $_registered_pages
 */
function user_can_access_admin_page()
{
}
/* Whitelist functions */
/**
 * Refreshes the value of the options whitelist available via the 'whitelist_options' hook.
 *
 * See the {@see 'whitelist_options'} filter.
 *
 * @since 2.7.0
 *
 * @global array $new_whitelist_options
 *
 * @param array $options
 * @return array
 */
function option_update_filter($options)
{
}
/**
 * Adds an array of options to the options whitelist.
 *
 * @since 2.7.0
 *
 * @global array $whitelist_options
 *
 * @param array        $new_options
 * @param string|array $options
 * @return array
 */
function add_option_whitelist($new_options, $options = '')
{
}
/**
 * Removes a list of options from the options whitelist.
 *
 * @since 2.7.0
 *
 * @global array $whitelist_options
 *
 * @param array        $del_options
 * @param string|array $options
 * @return array
 */
function remove_option_whitelist($del_options, $options = '')
{
}
/**
 * Output nonce, action, and option_page fields for a settings page.
 *
 * @since 2.7.0
 *
 * @param string $option_group A settings group name. This should match the group name used in register_setting().
 */
function settings_fields($option_group)
{
}
/**
 * Clears the Plugins cache used by get_plugins() and by default, the Plugin Update cache.
 *
 * @since 3.7.0
 *
 * @param bool $clear_update_cache Whether to clear the Plugin updates cache
 */
function wp_clean_plugins_cache($clear_update_cache = \true)
{
}
/**
 * Load a given plugin attempt to generate errors.
 *
 * @since 3.0.0
 * @since 4.4.0 Function was moved into the `wp-admin/includes/plugin.php` file.
 *
 * @param string $plugin Plugin file to load.
 */
function plugin_sandbox_scrape($plugin)
{
}
/**
 * Helper function for adding content to the Privacy Policy Guide.
 *
 * Plugins and themes should suggest text for inclusion in the site's privacy policy.
 * The suggested text should contain information about any functionality that affects user privacy,
 * and will be shown on the Privacy Policy Guide screen.
 *
 * A plugin or theme can use this function multiple times as long as it will help to better present
 * the suggested policy content. For example modular plugins such as WooCommerse or Jetpack
 * can add or remove suggested content depending on the modules/extensions that are enabled.
 * For more information see the Plugin Handbook:
 * https://developer.wordpress.org/plugins/privacy/suggesting-text-for-the-site-privacy-policy/.
 *
 * Intended for use with the `'admin_init'` action.
 *
 * @since 4.9.6
 *
 * @param string $plugin_name The name of the plugin or theme that is suggesting content for the site's privacy policy.
 * @param string $policy_text The suggested content for inclusion in the policy.
 */
function wp_add_privacy_policy_content($plugin_name, $policy_text)
{
}
/**
 * WordPress Post Administration API.
 *
 * @package WordPress
 * @subpackage Administration
 */
/**
 * Rename $_POST data from form names to DB post columns.
 *
 * Manipulates $_POST directly.
 *
 * @since 2.6.0
 *
 * @param bool $update Are we updating a pre-existing post?
 * @param array $post_data Array of post data. Defaults to the contents of $_POST.
 * @return object|bool WP_Error on failure, true on success.
 */
function _wp_translate_postdata($update = \false, $post_data = \null)
{
}
/**
 * Returns only allowed post data fields
 *
 * @since 4.9.9
 *
 * @param array $post_data Array of post data. Defaults to the contents of $_POST.
 * @return object|bool WP_Error on failure, true on success.
 */
function _wp_get_allowed_postdata($post_data = \null)
{
}
/**
 * Update an existing post with values provided in $_POST.
 *
 * @since 1.5.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param array $post_data Optional.
 * @return int Post ID.
 */
function edit_post($post_data = \null)
{
}
/**
 * Process the post data for the bulk editing of posts.
 *
 * Updates all bulk edited posts/pages, adding (but not removing) tags and
 * categories. Skips pages when they would be their own parent or child.
 *
 * @since 2.7.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param array $post_data Optional, the array of post data to process if not provided will use $_POST superglobal.
 * @return array
 */
function bulk_edit_posts($post_data = \null)
{
}
/**
 * Default post information to use when populating the "Write Post" form.
 *
 * @since 2.0.0
 *
 * @param string $post_type    Optional. A post type string. Default 'post'.
 * @param bool   $create_in_db Optional. Whether to insert the post into database. Default false.
 * @return WP_Post Post object containing all the default post data as attributes
 */
function get_default_post_to_edit($post_type = 'post', $create_in_db = \false)
{
}
/**
 * Determine if a post exists based on title, content, and date
 *
 * @since 2.0.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param string $title Post title
 * @param string $content Optional post content
 * @param string $date Optional post date
 * @return int Post ID if post exists, 0 otherwise.
 */
function post_exists($title, $content = '', $date = '')
{
}
/**
 * Creates a new post from the "Write Post" form using $_POST information.
 *
 * @since 2.1.0
 *
 * @global WP_User $current_user
 *
 * @return int|WP_Error
 */
function wp_write_post()
{
}
/**
 * Calls wp_write_post() and handles the errors.
 *
 * @since 2.0.0
 *
 * @return int|null
 */
function write_post()
{
}
//
// Post Meta
//
/**
 * Add post meta data defined in $_POST superglobal for post with given ID.
 *
 * @since 1.2.0
 *
 * @param int $post_ID
 * @return int|bool
 */
function add_meta($post_ID)
{
}
// add_meta
/**
 * Delete post meta data by meta ID.
 *
 * @since 1.2.0
 *
 * @param int $mid
 * @return bool
 */
function delete_meta($mid)
{
}
/**
 * Get a list of previously defined keys.
 *
 * @since 1.2.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @return mixed
 */
function get_meta_keys()
{
}
/**
 * Get post meta data by meta ID.
 *
 * @since 2.1.0
 *
 * @param int $mid
 * @return object|bool
 */
function get_post_meta_by_id($mid)
{
}
/**
 * Get meta data for the given post ID.
 *
 * @since 1.2.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param int $postid
 * @return mixed
 */
function has_meta($postid)
{
}
/**
 * Update post meta data by meta ID.
 *
 * @since 1.2.0
 *
 * @param int    $meta_id
 * @param string $meta_key Expect Slashed
 * @param string $meta_value Expect Slashed
 * @return bool
 */
function update_meta($meta_id, $meta_key, $meta_value)
{
}
//
// Private
//
/**
 * Replace hrefs of attachment anchors with up-to-date permalinks.
 *
 * @since 2.3.0
 * @access private
 *
 * @param int|object $post Post ID or post object.
 * @return void|int|WP_Error Void if nothing fixed. 0 or WP_Error on update failure. The post ID on update success.
 */
function _fix_attachment_links($post)
{
}
/**
 * Get all the possible statuses for a post_type
 *
 * @since 2.5.0
 *
 * @param string $type The post_type you want the statuses for
 * @return array As array of all the statuses for the supplied post type
 */
function get_available_post_statuses($type = 'post')
{
}
/**
 * Run the wp query to fetch the posts for listing on the edit posts page
 *
 * @since 2.5.0
 *
 * @param array|bool $q Array of query variables to use to build the query or false to use $_GET superglobal.
 * @return array
 */
function wp_edit_posts_query($q = \false)
{
}
/**
 * Get all available post MIME types for a given post type.
 *
 * @since 2.5.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param string $type
 * @return mixed
 */
function get_available_post_mime_types($type = 'attachment')
{
}
/**
 * Get the query variables for the current attachments request.
 *
 * @since 4.2.0
 *
 * @param array|false $q Optional. Array of query variables to use to build the query or false
 *                       to use $_GET superglobal. Default false.
 * @return array The parsed query vars.
 */
function wp_edit_attachments_query_vars($q = \false)
{
}
/**
 * Executes a query for attachments. An array of WP_Query arguments
 * can be passed in, which will override the arguments set by this function.
 *
 * @since 2.5.0
 *
 * @param array|false $q Array of query variables to use to build the query or false to use $_GET superglobal.
 * @return array
 */
function wp_edit_attachments_query($q = \false)
{
}
/**
 * Returns the list of classes to be used by a meta box.
 *
 * @since 2.5.0
 *
 * @param string $id
 * @param string $page
 * @return string
 */
function postbox_classes($id, $page)
{
}
/**
 * Get a sample permalink based off of the post name.
 *
 * @since 2.5.0
 *
 * @param int    $id    Post ID or post object.
 * @param string $title Optional. Title to override the post's current title when generating the post name. Default null.
 * @param string $name  Optional. Name to override the post name. Default null.
 * @return array Array containing the sample permalink with placeholder for the post name, and the post name.
 */
function get_sample_permalink($id, $title = \null, $name = \null)
{
}
/**
 * Returns the HTML of the sample permalink slug editor.
 *
 * @since 2.5.0
 *
 * @param int    $id        Post ID or post object.
 * @param string $new_title Optional. New title. Default null.
 * @param string $new_slug  Optional. New slug. Default null.
 * @return string The HTML of the sample permalink slug editor.
 */
function get_sample_permalink_html($id, $new_title = \null, $new_slug = \null)
{
}
/**
 * Output HTML for the post thumbnail meta-box.
 *
 * @since 2.9.0
 *
 * @param int $thumbnail_id ID of the attachment used for thumbnail
 * @param mixed $post The post ID or object associated with the thumbnail, defaults to global $post.
 * @return string html
 */
function _wp_post_thumbnail_html($thumbnail_id = \null, $post = \null)
{
}
/**
 * Check to see if the post is currently being edited by another user.
 *
 * @since 2.5.0
 *
 * @param int $post_id ID of the post to check for editing.
 * @return int|false ID of the user with lock. False if the post does not exist, post is not locked,
 *                   the user with lock does not exist, or the post is locked by current user.
 */
function wp_check_post_lock($post_id)
{
}
/**
 * Mark the post as currently being edited by the current user
 *
 * @since 2.5.0
 *
 * @param int $post_id ID of the post being edited.
 * @return array|false Array of the lock time and user ID. False if the post does not exist, or
 *                     there is no current user.
 */
function wp_set_post_lock($post_id)
{
}
/**
 * Outputs the HTML for the notice to say that someone else is editing or has taken over editing of this post.
 *
 * @since 2.8.5
 * @return none
 */
function _admin_notice_post_locked()
{
}
/**
 * Creates autosave data for the specified post from $_POST data.
 *
 * @since 2.6.0
 *
 * @param mixed $post_data Associative array containing the post data or int post ID.
 * @return mixed The autosave revision ID. WP_Error or 0 on error.
 */
function wp_create_post_autosave($post_data)
{
}
/**
 * Saves a draft or manually autosaves for the purpose of showing a post preview.
 *
 * @since 2.7.0
 *
 * @return string URL to redirect to show the preview.
 */
function post_preview()
{
}
/**
 * Save a post submitted with XHR
 *
 * Intended for use with heartbeat and autosave.js
 *
 * @since 3.9.0
 *
 * @param array $post_data Associative array of the submitted post data.
 * @return mixed The value 0 or WP_Error on failure. The saved post ID on success.
 *               The ID can be the draft post_id or the autosave revision post_id.
 */
function wp_autosave($post_data)
{
}
/**
 * Redirect to previous page.
 *
 * @param int $post_id Optional. Post ID.
 */
function redirect_post($post_id = '')
{
}
/**
 * WordPress Administration Revisions API
 *
 * @package WordPress
 * @subpackage Administration
 * @since 3.6.0
 */
/**
 * Get the revision UI diff.
 *
 * @since 3.6.0
 *
 * @param object|int $post         The post object. Also accepts a post ID.
 * @param int        $compare_from The revision ID to compare from.
 * @param int        $compare_to   The revision ID to come to.
 *
 * @return array|bool Associative array of a post's revisioned fields and their diffs.
 *                    Or, false on failure.
 */
function wp_get_revision_ui_diff($post, $compare_from, $compare_to)
{
}
/**
 * Prepare revisions for JavaScript.
 *
 * @since 3.6.0
 *
 * @param object|int $post                 The post object. Also accepts a post ID.
 * @param int        $selected_revision_id The selected revision ID.
 * @param int        $from                 Optional. The revision ID to compare from.
 *
 * @return array An associative array of revision data and related settings.
 */
function wp_prepare_revisions_for_js($post, $selected_revision_id, $from = \null)
{
}
/**
 * Print JavaScript templates required for the revisions experience.
 *
 * @since 4.1.0
 *
 * @global WP_Post $post The global `$post` object.
 */
function wp_print_revision_templates()
{
}
/**
 * Retrieve the SQL for creating database tables.
 *
 * @since 3.3.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param string $scope Optional. The tables for which to retrieve SQL. Can be all, global, ms_global, or blog tables. Defaults to all.
 * @param int $blog_id Optional. The site ID for which to retrieve SQL. Default is the current site ID.
 * @return string The SQL needed to create the requested tables.
 */
function wp_get_db_schema($scope = 'all', $blog_id = \null)
{
}
/**
 * Create WordPress options and set the default values.
 *
 * @since 1.5.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 * @global int  $wp_db_version
 * @global int  $wp_current_db_version
 */
function populate_options()
{
}
/**
 * Execute WordPress role creation for the various WordPress versions.
 *
 * @since 2.0.0
 */
function populate_roles()
{
}
/**
 * Create the roles for WordPress 2.0
 *
 * @since 2.0.0
 */
function populate_roles_160()
{
}
/**
 * Create and modify WordPress roles for WordPress 2.1.
 *
 * @since 2.1.0
 */
function populate_roles_210()
{
}
/**
 * Create and modify WordPress roles for WordPress 2.3.
 *
 * @since 2.3.0
 */
function populate_roles_230()
{
}
/**
 * Create and modify WordPress roles for WordPress 2.5.
 *
 * @since 2.5.0
 */
function populate_roles_250()
{
}
/**
 * Create and modify WordPress roles for WordPress 2.6.
 *
 * @since 2.6.0
 */
function populate_roles_260()
{
}
/**
 * Create and modify WordPress roles for WordPress 2.7.
 *
 * @since 2.7.0
 */
function populate_roles_270()
{
}
/**
 * Create and modify WordPress roles for WordPress 2.8.
 *
 * @since 2.8.0
 */
function populate_roles_280()
{
}
/**
 * Create and modify WordPress roles for WordPress 3.0.
 *
 * @since 3.0.0
 */
function populate_roles_300()
{
}
/**
 * Install Network.
 *
 * @since 3.0.0
 */
function install_network()
{
}
/**
 * Populate network settings.
 *
 * @since 3.0.0
 *
 * @global wpdb       $wpdb
 * @global object     $current_site
 * @global int        $wp_db_version
 * @global WP_Rewrite $wp_rewrite
 *
 * @param int    $network_id        ID of network to populate.
 * @param string $domain            The domain name for the network (eg. "example.com").
 * @param string $email             Email address for the network administrator.
 * @param string $site_name         The name of the network.
 * @param string $path              Optional. The path to append to the network's domain name. Default '/'.
 * @param bool   $subdomain_install Optional. Whether the network is a subdomain installation or a subdirectory installation.
 *                                  Default false, meaning the network is a subdirectory installation.
 * @return bool|WP_Error True on success, or WP_Error on warning (with the installation otherwise successful,
 *                       so the error code must be checked) or failure.
 */
function populate_network($network_id = 1, $domain = '', $email = '', $site_name = '', $path = '/', $subdomain_install = \false)
{
}
/**
 * WordPress Administration Screen API.
 *
 * @package WordPress
 * @subpackage Administration
 */
/**
 * Get the column headers for a screen
 *
 * @since 2.7.0
 *
 * @staticvar array $column_headers
 *
 * @param string|WP_Screen $screen The screen you want the headers for
 * @return array Containing the headers in the format id => UI String
 */
function get_column_headers($screen)
{
}
/**
 * Get a list of hidden columns.
 *
 * @since 2.7.0
 *
 * @param string|WP_Screen $screen The screen you want the hidden columns for
 * @return array
 */
function get_hidden_columns($screen)
{
}
/**
 * Prints the meta box preferences for screen meta.
 *
 * @since 2.7.0
 *
 * @global array $wp_meta_boxes
 *
 * @param WP_Screen $screen
 */
function meta_box_prefs($screen)
{
}
/**
 * Get Hidden Meta Boxes
 *
 * @since 2.7.0
 *
 * @param string|WP_Screen $screen Screen identifier
 * @return array Hidden Meta Boxes
 */
function get_hidden_meta_boxes($screen)
{
}
/**
 * Register and configure an admin screen option
 *
 * @since 3.1.0
 *
 * @param string $option An option name.
 * @param mixed $args Option-dependent arguments.
 */
function add_screen_option($option, $args = array())
{
}
/**
 * Get the current screen object
 *
 * @since 3.1.0
 *
 * @global WP_Screen $current_screen
 *
 * @return WP_Screen|null Current screen object or null when screen not defined.
 */
function get_current_screen()
{
}
/**
 * Set the current screen object
 *
 * @since 3.0.0
 *
 * @param mixed $hook_name Optional. The hook name (also known as the hook suffix) used to determine the screen,
 *	                       or an existing screen object.
 */
function set_current_screen($hook_name = '')
{
}
/**
 * WordPress Taxonomy Administration API.
 *
 * @package WordPress
 * @subpackage Administration
 */
//
// Category
//
/**
 * Check whether a category exists.
 *
 * @since 2.0.0
 *
 * @see term_exists()
 *
 * @param int|string $cat_name Category name.
 * @param int        $parent   Optional. ID of parent term.
 * @return mixed
 */
function category_exists($cat_name, $parent = \null)
{
}
/**
 * Get category object for given ID and 'edit' filter context.
 *
 * @since 2.0.0
 *
 * @param int $id
 * @return object
 */
function get_category_to_edit($id)
{
}
/**
 * Add a new category to the database if it does not already exist.
 *
 * @since 2.0.0
 *
 * @param int|string $cat_name
 * @param int        $parent
 * @return int|WP_Error
 */
function wp_create_category($cat_name, $parent = 0)
{
}
/**
 * Create categories for the given post.
 *
 * @since 2.0.0
 *
 * @param array $categories List of categories to create.
 * @param int   $post_id    Optional. The post ID. Default empty.
 * @return array List of categories to create for the given post.
 */
function wp_create_categories($categories, $post_id = '')
{
}
/**
 * Updates an existing Category or creates a new Category.
 *
 * @since 2.0.0
 * @since 2.5.0 $wp_error parameter was added.
 * @since 3.0.0 The 'taxonomy' argument was added.
 *
 * @param array $catarr {
 *     Array of arguments for inserting a new category.
 *
 *     @type int        $cat_ID               Category ID. A non-zero value updates an existing category.
 *                                            Default 0.
 *     @type string     $taxonomy             Taxonomy slug. Default 'category'.
 *     @type string     $cat_name             Category name. Default empty.
 *     @type string     $category_description Category description. Default empty.
 *     @type string     $category_nicename    Category nice (display) name. Default empty.
 *     @type int|string $category_parent      Category parent ID. Default empty.
 * }
 * @param bool  $wp_error Optional. Default false.
 * @return int|object The ID number of the new or updated Category on success. Zero or a WP_Error on failure,
 *                    depending on param $wp_error.
 */
function wp_insert_category($catarr, $wp_error = \false)
{
}
/**
 * Aliases wp_insert_category() with minimal args.
 *
 * If you want to update only some fields of an existing category, call this
 * function with only the new values set inside $catarr.
 *
 * @since 2.0.0
 *
 * @param array $catarr The 'cat_ID' value is required. All other keys are optional.
 * @return int|bool The ID number of the new or updated Category on success. Zero or FALSE on failure.
 */
function wp_update_category($catarr)
{
}
//
// Tags
//
/**
 * Check whether a post tag with a given name exists.
 *
 * @since 2.3.0
 *
 * @param int|string $tag_name
 * @return mixed
 */
function tag_exists($tag_name)
{
}
/**
 * Add a new tag to the database if it does not already exist.
 *
 * @since 2.3.0
 *
 * @param int|string $tag_name
 * @return array|WP_Error
 */
function wp_create_tag($tag_name)
{
}
/**
 * Get comma-separated list of tags available to edit.
 *
 * @since 2.3.0
 *
 * @param int    $post_id
 * @param string $taxonomy Optional. The taxonomy for which to retrieve terms. Default 'post_tag'.
 * @return string|bool|WP_Error
 */
function get_tags_to_edit($post_id, $taxonomy = 'post_tag')
{
}
/**
 * Get comma-separated list of terms available to edit for the given post ID.
 *
 * @since 2.8.0
 *
 * @param int    $post_id
 * @param string $taxonomy Optional. The taxonomy for which to retrieve terms. Default 'post_tag'.
 * @return string|bool|WP_Error
 */
function get_terms_to_edit($post_id, $taxonomy = 'post_tag')
{
}
/**
 * Add a new term to the database if it does not already exist.
 *
 * @since 2.8.0
 *
 * @param int|string $tag_name
 * @param string $taxonomy Optional. The taxonomy for which to retrieve terms. Default 'post_tag'.
 * @return array|WP_Error
 */
function wp_create_term($tag_name, $taxonomy = 'post_tag')
{
}
//
// Category Checklists
//
/**
 * Output an unordered list of checkbox input elements labeled with category names.
 *
 * @since 2.5.1
 *
 * @see wp_terms_checklist()
 *
 * @param int    $post_id              Optional. Post to generate a categories checklist for. Default 0.
 *                                     $selected_cats must not be an array. Default 0.
 * @param int    $descendants_and_self Optional. ID of the category to output along with its descendants.
 *                                     Default 0.
 * @param array  $selected_cats        Optional. List of categories to mark as checked. Default false.
 * @param array  $popular_cats         Optional. List of categories to receive the "popular-category" class.
 *                                     Default false.
 * @param object $walker               Optional. Walker object to use to build the output.
 *                                     Default is a Walker_Category_Checklist instance.
 * @param bool   $checked_ontop        Optional. Whether to move checked items out of the hierarchy and to
 *                                     the top of the list. Default true.
 */
function wp_category_checklist($post_id = 0, $descendants_and_self = 0, $selected_cats = \false, $popular_cats = \false, $walker = \null, $checked_ontop = \true)
{
}
/**
 * Output an unordered list of checkbox input elements labelled with term names.
 *
 * Taxonomy-independent version of wp_category_checklist().
 *
 * @since 3.0.0
 * @since 4.4.0 Introduced the `$echo` argument.
 *
 * @param int          $post_id Optional. Post ID. Default 0.
 * @param array|string $args {
 *     Optional. Array or string of arguments for generating a terms checklist. Default empty array.
 *
 *     @type int    $descendants_and_self ID of the category to output along with its descendants.
 *                                        Default 0.
 *     @type array  $selected_cats        List of categories to mark as checked. Default false.
 *     @type array  $popular_cats         List of categories to receive the "popular-category" class.
 *                                        Default false.
 *     @type object $walker               Walker object to use to build the output.
 *                                        Default is a Walker_Category_Checklist instance.
 *     @type string $taxonomy             Taxonomy to generate the checklist for. Default 'category'.
 *     @type bool   $checked_ontop        Whether to move checked items out of the hierarchy and to
 *                                        the top of the list. Default true.
 *     @type bool   $echo                 Whether to echo the generated markup. False to return the markup instead
 *                                        of echoing it. Default true.
 * }
 */
function wp_terms_checklist($post_id = 0, $args = array())
{
}
/**
 * Retrieve a list of the most popular terms from the specified taxonomy.
 *
 * If the $echo argument is true then the elements for a list of checkbox
 * `<input>` elements labelled with the names of the selected terms is output.
 * If the $post_ID global isn't empty then the terms associated with that
 * post will be marked as checked.
 *
 * @since 2.5.0
 *
 * @param string $taxonomy Taxonomy to retrieve terms from.
 * @param int $default Not used.
 * @param int $number Number of terms to retrieve. Defaults to 10.
 * @param bool $echo Optionally output the list as well. Defaults to true.
 * @return array List of popular term IDs.
 */
function wp_popular_terms_checklist($taxonomy, $default = 0, $number = 10, $echo = \true)
{
}
/**
 * Outputs a link category checklist element.
 *
 * @since 2.5.1
 *
 * @param int $link_id
 */
function wp_link_category_checklist($link_id = 0)
{
}
/**
 * Adds hidden fields with the data for use in the inline editor for posts and pages.
 *
 * @since 2.7.0
 *
 * @param WP_Post $post Post object.
 */
function get_inline_data($post)
{
}
/**
 * Outputs the in-line comment reply-to form in the Comments list table.
 *
 * @since 2.7.0
 *
 * @global WP_List_Table $wp_list_table
 *
 * @param int    $position
 * @param bool   $checkbox
 * @param string $mode
 * @param bool   $table_row
 */
function wp_comment_reply($position = 1, $checkbox = \false, $mode = 'single', $table_row = \true)
{
}
/**
 * Output 'undo move to trash' text for comments
 *
 * @since 2.9.0
 */
function wp_comment_trashnotice()
{
}
/**
 * Outputs a post's public meta data in the Custom Fields meta box.
 *
 * @since 1.2.0
 *
 * @param array $meta
 */
function list_meta($meta)
{
}
/**
 * Outputs a single row of public meta data in the Custom Fields meta box.
 *
 * @since 2.5.0
 *
 * @staticvar string $update_nonce
 *
 * @param array $entry
 * @param int   $count
 * @return string
 */
function _list_meta_row($entry, &$count)
{
}
/**
 * Prints the form in the Custom Fields meta box.
 *
 * @since 1.2.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param WP_Post $post Optional. The post being edited.
 */
function meta_form($post = \null)
{
}
/**
 * Print out HTML form date elements for editing post or comment publish date.
 *
 * @since 0.71
 * @since 4.4.0 Converted to use get_comment() instead of the global `$comment`.
 *
 * @global WP_Locale  $wp_locale
 *
 * @param int|bool $edit      Accepts 1|true for editing the date, 0|false for adding the date.
 * @param int|bool $for_post  Accepts 1|true for applying the date to a post, 0|false for a comment.
 * @param int      $tab_index The tabindex attribute to add. Default 0.
 * @param int|bool $multi     Optional. Whether the additional fields and buttons should be added.
 *                            Default 0|false.
 */
function touch_time($edit = 1, $for_post = 1, $tab_index = 0, $multi = 0)
{
}
/**
 * Print out option HTML elements for the page templates drop-down.
 *
 * @since 1.5.0
 * @since 4.7.0 Added the `$post_type` parameter.
 *
 * @param string $default   Optional. The template file name. Default empty.
 * @param string $post_type Optional. Post type to get templates for. Default 'post'.
 */
function page_template_dropdown($default = '', $post_type = 'page')
{
}
/**
 * Print out option HTML elements for the page parents drop-down.
 *
 * @since 1.5.0
 * @since 4.4.0 `$post` argument was added.
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param int         $default Optional. The default page ID to be pre-selected. Default 0.
 * @param int         $parent  Optional. The parent page ID. Default 0.
 * @param int         $level   Optional. Page depth level. Default 0.
 * @param int|WP_Post $post    Post ID or WP_Post object.
 *
 * @return null|false Boolean False if page has no children, otherwise print out html elements
 */
function parent_dropdown($default = 0, $parent = 0, $level = 0, $post = \null)
{
}
/**
 * Print out option html elements for role selectors.
 *
 * @since 2.1.0
 *
 * @param string $selected Slug for the role that should be already selected.
 */
function wp_dropdown_roles($selected = '')
{
}
/**
 * Outputs the form used by the importers to accept the data to be imported
 *
 * @since 2.0.0
 *
 * @param string $action The action attribute for the form.
 */
function wp_import_upload_form($action)
{
}
/**
 * Adds a meta box to one or more screens.
 *
 * @since 2.5.0
 * @since 4.4.0 The `$screen` parameter now accepts an array of screen IDs.
 *
 * @global array $wp_meta_boxes
 *
 * @param string                 $id            Meta box ID (used in the 'id' attribute for the meta box).
 * @param string                 $title         Title of the meta box.
 * @param callable               $callback      Function that fills the box with the desired content.
 *                                              The function should echo its output.
 * @param string|array|WP_Screen $screen        Optional. The screen or screens on which to show the box
 *                                              (such as a post type, 'link', or 'comment'). Accepts a single
 *                                              screen ID, WP_Screen object, or array of screen IDs. Default
 *                                              is the current screen.  If you have used add_menu_page() or
 *                                              add_submenu_page() to create a new screen (and hence screen_id),
 *                                              make sure your menu slug conforms to the limits of sanitize_key()
 *                                              otherwise the 'screen' menu may not correctly render on your page.
 * @param string                 $context       Optional. The context within the screen where the boxes
 *                                              should display. Available contexts vary from screen to
 *                                              screen. Post edit screen contexts include 'normal', 'side',
 *                                              and 'advanced'. Comments screen contexts include 'normal'
 *                                              and 'side'. Menus meta boxes (accordion sections) all use
 *                                              the 'side' context. Global default is 'advanced'.
 * @param string                 $priority      Optional. The priority within the context where the boxes
 *                                              should show ('high', 'low'). Default 'default'.
 * @param array                  $callback_args Optional. Data that should be set as the $args property
 *                                              of the box array (which is the second parameter passed
 *                                              to your callback). Default null.
 */
function add_meta_box($id, $title, $callback, $screen = \null, $context = 'advanced', $priority = 'default', $callback_args = \null)
{
}
/**
 * Meta-Box template function
 *
 * @since 2.5.0
 *
 * @global array $wp_meta_boxes
 *
 * @staticvar bool $already_sorted
 *
 * @param string|WP_Screen $screen  Screen identifier. If you have used add_menu_page() or
 *                                  add_submenu_page() to create a new screen (and hence screen_id)
 *                                  make sure your menu slug conforms to the limits of sanitize_key()
 *                                  otherwise the 'screen' menu may not correctly render on your page.
 * @param string           $context box context
 * @param mixed            $object  gets passed to the box callback function as first parameter
 * @return int number of meta_boxes
 */
function do_meta_boxes($screen, $context, $object)
{
}
/**
 * Removes a meta box from one or more screens.
 *
 * @since 2.6.0
 * @since 4.4.0 The `$screen` parameter now accepts an array of screen IDs.
 *
 * @global array $wp_meta_boxes
 *
 * @param string                 $id      Meta box ID (used in the 'id' attribute for the meta box).
 * @param string|array|WP_Screen $screen  The screen or screens on which the meta box is shown (such as a
 *                                        post type, 'link', or 'comment'). Accepts a single screen ID,
 *                                        WP_Screen object, or array of screen IDs.
 * @param string                 $context The context within the screen where the box is set to display.
 *                                        Contexts vary from screen to screen. Post edit screen contexts
 *                                        include 'normal', 'side', and 'advanced'. Comments screen contexts
 *                                        include 'normal' and 'side'. Menus meta boxes (accordion sections)
 *                                        all use the 'side' context.
 */
function remove_meta_box($id, $screen, $context)
{
}
/**
 * Meta Box Accordion Template Function
 *
 * Largely made up of abstracted code from do_meta_boxes(), this
 * function serves to build meta boxes as list items for display as
 * a collapsible accordion.
 *
 * @since 3.6.0
 *
 * @uses global $wp_meta_boxes Used to retrieve registered meta boxes.
 *
 * @param string|object $screen  The screen identifier.
 * @param string        $context The meta box context.
 * @param mixed         $object  gets passed to the section callback function as first parameter.
 * @return int number of meta boxes as accordion sections.
 */
function do_accordion_sections($screen, $context, $object)
{
}
/**
 * Add a new section to a settings page.
 *
 * Part of the Settings API. Use this to define new settings sections for an admin page.
 * Show settings sections in your admin page callback function with do_settings_sections().
 * Add settings fields to your section with add_settings_field()
 *
 * The $callback argument should be the name of a function that echoes out any
 * content you want to show at the top of the settings section before the actual
 * fields. It can output nothing if you want.
 *
 * @since 2.7.0
 *
 * @global $wp_settings_sections Storage array of all settings sections added to admin pages
 *
 * @param string   $id       Slug-name to identify the section. Used in the 'id' attribute of tags.
 * @param string   $title    Formatted title of the section. Shown as the heading for the section.
 * @param callable $callback Function that echos out any content at the top of the section (between heading and fields).
 * @param string   $page     The slug-name of the settings page on which to show the section. Built-in pages include
 *                           'general', 'reading', 'writing', 'discussion', 'media', etc. Create your own using
 *                           add_options_page();
 */
function add_settings_section($id, $title, $callback, $page)
{
}
/**
 * Add a new field to a section of a settings page
 *
 * Part of the Settings API. Use this to define a settings field that will show
 * as part of a settings section inside a settings page. The fields are shown using
 * do_settings_fields() in do_settings-sections()
 *
 * The $callback argument should be the name of a function that echoes out the
 * html input tags for this setting field. Use get_option() to retrieve existing
 * values to show.
 *
 * @since 2.7.0
 * @since 4.2.0 The `$class` argument was added.
 *
 * @global $wp_settings_fields Storage array of settings fields and info about their pages/sections
 *
 * @param string   $id       Slug-name to identify the field. Used in the 'id' attribute of tags.
 * @param string   $title    Formatted title of the field. Shown as the label for the field
 *                           during output.
 * @param callable $callback Function that fills the field with the desired form inputs. The
 *                           function should echo its output.
 * @param string   $page     The slug-name of the settings page on which to show the section
 *                           (general, reading, writing, ...).
 * @param string   $section  Optional. The slug-name of the section of the settings page
 *                           in which to show the box. Default 'default'.
 * @param array    $args {
 *     Optional. Extra arguments used when outputting the field.
 *
 *     @type string $label_for When supplied, the setting title will be wrapped
 *                             in a `<label>` element, its `for` attribute populated
 *                             with this value.
 *     @type string $class     CSS Class to be added to the `<tr>` element when the
 *                             field is output.
 * }
 */
function add_settings_field($id, $title, $callback, $page, $section = 'default', $args = array())
{
}
/**
 * Prints out all settings sections added to a particular settings page
 *
 * Part of the Settings API. Use this in a settings page callback function
 * to output all the sections and fields that were added to that $page with
 * add_settings_section() and add_settings_field()
 *
 * @global $wp_settings_sections Storage array of all settings sections added to admin pages
 * @global $wp_settings_fields Storage array of settings fields and info about their pages/sections
 * @since 2.7.0
 *
 * @param string $page The slug name of the page whose settings sections you want to output
 */
function do_settings_sections($page)
{
}
/**
 * Print out the settings fields for a particular settings section
 *
 * Part of the Settings API. Use this in a settings page to output
 * a specific section. Should normally be called by do_settings_sections()
 * rather than directly.
 *
 * @global $wp_settings_fields Storage array of settings fields and their pages/sections
 *
 * @since 2.7.0
 *
 * @param string $page Slug title of the admin page who's settings fields you want to show.
 * @param string $section Slug title of the settings section who's fields you want to show.
 */
function do_settings_fields($page, $section)
{
}
/**
 * Register a settings error to be displayed to the user
 *
 * Part of the Settings API. Use this to show messages to users about settings validation
 * problems, missing settings or anything else.
 *
 * Settings errors should be added inside the $sanitize_callback function defined in
 * register_setting() for a given setting to give feedback about the submission.
 *
 * By default messages will show immediately after the submission that generated the error.
 * Additional calls to settings_errors() can be used to show errors even when the settings
 * page is first accessed.
 *
 * @since 3.0.0
 *
 * @global array $wp_settings_errors Storage array of errors registered during this pageload
 *
 * @param string $setting Slug title of the setting to which this error applies
 * @param string $code    Slug-name to identify the error. Used as part of 'id' attribute in HTML output.
 * @param string $message The formatted message text to display to the user (will be shown inside styled
 *                        `<div>` and `<p>` tags).
 * @param string $type    Optional. Message type, controls HTML class. Accepts 'error' or 'updated'.
 *                        Default 'error'.
 */
function add_settings_error($setting, $code, $message, $type = 'error')
{
}
/**
 * Fetch settings errors registered by add_settings_error()
 *
 * Checks the $wp_settings_errors array for any errors declared during the current
 * pageload and returns them.
 *
 * If changes were just submitted ($_GET['settings-updated']) and settings errors were saved
 * to the 'settings_errors' transient then those errors will be returned instead. This
 * is used to pass errors back across pageloads.
 *
 * Use the $sanitize argument to manually re-sanitize the option before returning errors.
 * This is useful if you have errors or notices you want to show even when the user
 * hasn't submitted data (i.e. when they first load an options page, or in the {@see 'admin_notices'}
 * action hook).
 *
 * @since 3.0.0
 *
 * @global array $wp_settings_errors Storage array of errors registered during this pageload
 *
 * @param string $setting Optional slug title of a specific setting who's errors you want.
 * @param boolean $sanitize Whether to re-sanitize the setting value before returning errors.
 * @return array Array of settings errors
 */
function get_settings_errors($setting = '', $sanitize = \false)
{
}
/**
 * Display settings errors registered by add_settings_error().
 *
 * Part of the Settings API. Outputs a div for each error retrieved by
 * get_settings_errors().
 *
 * This is called automatically after a settings page based on the
 * Settings API is submitted. Errors should be added during the validation
 * callback function for a setting defined in register_setting().
 *
 * The $sanitize option is passed into get_settings_errors() and will
 * re-run the setting sanitization
 * on its current value.
 *
 * The $hide_on_update option will cause errors to only show when the settings
 * page is first loaded. if the user has already saved new values it will be
 * hidden to avoid repeating messages already shown in the default error
 * reporting after submission. This is useful to show general errors like
 * missing settings when the user arrives at the settings page.
 *
 * @since 3.0.0
 *
 * @param string $setting        Optional slug title of a specific setting who's errors you want.
 * @param bool   $sanitize       Whether to re-sanitize the setting value before returning errors.
 * @param bool   $hide_on_update If set to true errors will not be shown if the settings page has
 *                               already been submitted.
 */
function settings_errors($setting = '', $sanitize = \false, $hide_on_update = \false)
{
}
/**
 * Outputs the modal window used for attaching media to posts or pages in the media-listing screen.
 *
 * @since 2.7.0
 *
 * @param string $found_action
 */
function find_posts_div($found_action = '')
{
}
/**
 * Displays the post password.
 *
 * The password is passed through esc_attr() to ensure that it is safe for placing in an html attribute.
 *
 * @since 2.7.0
 */
function the_post_password()
{
}
/**
 * Get the post title.
 *
 * The post title is fetched and if it is blank then a default string is
 * returned.
 *
 * @since 2.7.0
 *
 * @param int|WP_Post $post Optional. Post ID or WP_Post object. Default is global $post.
 * @return string The post title if set.
 */
function _draft_or_post_title($post = 0)
{
}
/**
 * Displays the search query.
 *
 * A simple wrapper to display the "s" parameter in a `GET` URI. This function
 * should only be used when the_search_query() cannot.
 *
 * @since 2.7.0
 */
function _admin_search_query()
{
}
/**
 * Generic Iframe header for use with Thickbox
 *
 * @since 2.7.0
 *
 * @global string    $hook_suffix
 * @global string    $admin_body_class
 * @global WP_Locale $wp_locale
 *
 * @param string $title      Optional. Title of the Iframe page. Default empty.
 * @param bool   $deprecated Not used.
 */
function iframe_header($title = '', $deprecated = \false)
{
}
/**
 * Generic Iframe footer for use with Thickbox
 *
 * @since 2.7.0
 */
function iframe_footer()
{
}
/**
 *
 * @param WP_Post $post
 */
function _post_states($post)
{
}
/**
 *
 * @param WP_Post $post
 */
function _media_states($post)
{
}
/**
 * Test support for compressing JavaScript from PHP
 *
 * Outputs JavaScript that tests if compression from PHP works as expected
 * and sets an option with the result. Has no effect when the current user
 * is not an administrator. To run the test again the option 'can_compress_scripts'
 * has to be deleted.
 *
 * @since 2.8.0
 */
function compression_test()
{
}
/**
 * Echoes a submit button, with provided text and appropriate class(es).
 *
 * @since 3.1.0
 *
 * @see get_submit_button()
 *
 * @param string       $text             The text of the button (defaults to 'Save Changes')
 * @param string       $type             Optional. The type and CSS class(es) of the button. Core values
 *                                       include 'primary', 'small', and 'large'. Default 'primary'.
 * @param string       $name             The HTML name of the submit button. Defaults to "submit". If no
 *                                       id attribute is given in $other_attributes below, $name will be
 *                                       used as the button's id.
 * @param bool         $wrap             True if the output button should be wrapped in a paragraph tag,
 *                                       false otherwise. Defaults to true
 * @param array|string $other_attributes Other attributes that should be output with the button, mapping
 *                                       attributes to their values, such as setting tabindex to 1, etc.
 *                                       These key/value attribute pairs will be output as attribute="value",
 *                                       where attribute is the key. Other attributes can also be provided
 *                                       as a string such as 'tabindex="1"', though the array format is
 *                                       preferred. Default null.
 */
function submit_button($text = \null, $type = 'primary', $name = 'submit', $wrap = \true, $other_attributes = \null)
{
}
/**
 * Returns a submit button, with provided text and appropriate class
 *
 * @since 3.1.0
 *
 * @param string       $text             Optional. The text of the button. Default 'Save Changes'.
 * @param string       $type             Optional. The type and CSS class(es) of the button. Core values
 *                                       include 'primary', 'small', and 'large'. Default 'primary large'.
 * @param string       $name             Optional. The HTML name of the submit button. Defaults to "submit".
 *                                       If no id attribute is given in $other_attributes below, `$name` will
 *                                       be used as the button's id. Default 'submit'.
 * @param bool         $wrap             Optional. True if the output button should be wrapped in a paragraph
 *                                       tag, false otherwise. Default true.
 * @param array|string $other_attributes Optional. Other attributes that should be output with the button,
 *                                       mapping attributes to their values, such as `array( 'tabindex' => '1' )`.
 *                                       These attributes will be output as `attribute="value"`, such as
 *                                       `tabindex="1"`. Other attributes can also be provided as a string such
 *                                       as `tabindex="1"`, though the array format is typically cleaner.
 *                                       Default empty.
 * @return string Submit button HTML.
 */
function get_submit_button($text = '', $type = 'primary large', $name = 'submit', $wrap = \true, $other_attributes = '')
{
}
/**
 *
 * @global bool $is_IE
 */
function _wp_admin_html_begin()
{
}
/**
 * Convert a screen string to a screen object
 *
 * @since 3.0.0
 *
 * @param string $hook_name The hook name (also known as the hook suffix) used to determine the screen.
 * @return WP_Screen Screen object.
 */
function convert_to_screen($hook_name)
{
}
/**
 * Output the HTML for restoring the post data from DOM storage
 *
 * @since 3.6.0
 * @access private
 */
function _local_storage_notice()
{
}
/**
 * Output a HTML element with a star rating for a given rating.
 *
 * Outputs a HTML element with the star rating exposed on a 0..5 scale in
 * half star increments (ie. 1, 1.5, 2 stars). Optionally, if specified, the
 * number of ratings may also be displayed by passing the $number parameter.
 *
 * @since 3.8.0
 * @since 4.4.0 Introduced the `echo` parameter.
 *
 * @param array $args {
 *     Optional. Array of star ratings arguments.
 *
 *     @type int|float $rating The rating to display, expressed in either a 0.5 rating increment,
 *                             or percentage. Default 0.
 *     @type string    $type   Format that the $rating is in. Valid values are 'rating' (default),
 *                             or, 'percent'. Default 'rating'.
 *     @type int       $number The number of ratings that makes up this rating. Default 0.
 *     @type bool      $echo   Whether to echo the generated markup. False to return the markup instead
 *                             of echoing it. Default true.
 * }
 * @return string Star rating HTML.
 */
function wp_star_rating($args = array())
{
}
/**
 * Output a notice when editing the page for posts (internal use only).
 *
 * @ignore
 * @since 4.2.0
 */
function _wp_posts_page_notice()
{
}
/**
 * Retrieve list of WordPress theme features (aka theme tags)
 *
 * @since 2.8.0
 *
 * @deprecated since 3.1.0 Use get_theme_feature_list() instead.
 *
 * @return array
 */
function install_themes_feature_list()
{
}
/**
 * Display search form for searching themes.
 *
 * @since 2.8.0
 *
 * @param bool $type_selector
 */
function install_theme_search_form($type_selector = \true)
{
}
/**
 * Display tags filter for themes.
 *
 * @since 2.8.0
 */
function install_themes_dashboard()
{
}
/**
 * @since 2.8.0
 */
function install_themes_upload()
{
}
/**
 * Prints a theme on the Install Themes pages.
 *
 * @deprecated 3.4.0
 *
 * @global WP_Theme_Install_List_Table $wp_list_table
 *
 * @param object $theme
 */
function display_theme($theme)
{
}
/**
 * Display theme content based on theme list.
 *
 * @since 2.8.0
 *
 * @global WP_Theme_Install_List_Table $wp_list_table
 */
function display_themes()
{
}
/**
 * Display theme information in dialog box form.
 *
 * @since 2.8.0
 *
 * @global WP_Theme_Install_List_Table $wp_list_table
 */
function install_theme_information()
{
}
/**
 * WordPress Theme Administration API
 *
 * @package WordPress
 * @subpackage Administration
 */
/**
 * Remove a theme
 *
 * @since 2.8.0
 *
 * @global WP_Filesystem_Base $wp_filesystem Subclass
 *
 * @param string $stylesheet Stylesheet of the theme to delete
 * @param string $redirect Redirect to page when complete.
 * @return void|bool|WP_Error When void, echoes content.
 */
function delete_theme($stylesheet, $redirect = '')
{
}
/**
 * Get the Page Templates available in this theme
 *
 * @since 1.5.0
 * @since 4.7.0 Added the `$post_type` parameter.
 *
 * @param WP_Post|null $post      Optional. The post being edited, provided for context.
 * @param string       $post_type Optional. Post type to get the templates for. Default 'page'.
 * @return array Key is the template name, value is the filename of the template
 */
function get_page_templates($post = \null, $post_type = 'page')
{
}
/**
 * Tidies a filename for url display by the theme editor.
 *
 * @since 2.9.0
 * @access private
 *
 * @param string $fullpath Full path to the theme file
 * @param string $containingfolder Path of the theme parent folder
 * @return string
 */
function _get_template_edit_filename($fullpath, $containingfolder)
{
}
/**
 * Check if there is an update for a theme available.
 *
 * Will display link, if there is an update available.
 *
 * @since 2.7.0
 * @see get_theme_update_available()
 *
 * @param WP_Theme $theme Theme data object.
 */
function theme_update_available($theme)
{
}
/**
 * Retrieve the update link if there is a theme update available.
 *
 * Will return a link if there is an update available.
 *
 * @since 3.8.0
 *
 * @staticvar object $themes_update
 *
 * @param WP_Theme $theme WP_Theme object.
 * @return false|string HTML for the update link, or false if invalid info was passed.
 */
function get_theme_update_available($theme)
{
}
/**
 * Retrieve list of WordPress theme features (aka theme tags)
 *
 * @since 3.1.0
 *
 * @param bool $api Optional. Whether try to fetch tags from the WordPress.org API. Defaults to true.
 * @return array Array of features keyed by category with translations keyed by slug.
 */
function get_theme_feature_list($api = \true)
{
}
/**
 * Retrieves theme installer pages from the WordPress.org Themes API.
 *
 * It is possible for a theme to override the Themes API result with three
 * filters. Assume this is for themes, which can extend on the Theme Info to
 * offer more choices. This is very powerful and must be used with care, when
 * overriding the filters.
 *
 * The first filter, {@see 'themes_api_args'}, is for the args and gives the action
 * as the second parameter. The hook for {@see 'themes_api_args'} must ensure that
 * an object is returned.
 *
 * The second filter, {@see 'themes_api'}, allows a plugin to override the WordPress.org
 * Theme API entirely. If `$action` is 'query_themes', 'theme_information', or 'feature_list',
 * an object MUST be passed. If `$action` is 'hot_tags', an array should be passed.
 *
 * Finally, the third filter, {@see 'themes_api_result'}, makes it possible to filter the
 * response object or array, depending on the `$action` type.
 *
 * Supported arguments per action:
 *
 * | Argument Name      | 'query_themes' | 'theme_information' | 'hot_tags' | 'feature_list'   |
 * | -------------------| :------------: | :-----------------: | :--------: | :--------------: |
 * | `$slug`            | No             |  Yes                | No         | No               |
 * | `$per_page`        | Yes            |  No                 | No         | No               |
 * | `$page`            | Yes            |  No                 | No         | No               |
 * | `$number`          | No             |  No                 | Yes        | No               |
 * | `$search`          | Yes            |  No                 | No         | No               |
 * | `$tag`             | Yes            |  No                 | No         | No               |
 * | `$author`          | Yes            |  No                 | No         | No               |
 * | `$user`            | Yes            |  No                 | No         | No               |
 * | `$browse`          | Yes            |  No                 | No         | No               |
 * | `$locale`          | Yes            |  Yes                | No         | No               |
 * | `$fields`          | Yes            |  Yes                | No         | No               |
 *
 * @since 2.8.0
 *
 * @param string       $action API action to perform: 'query_themes', 'theme_information',
 *                             'hot_tags' or 'feature_list'.
 * @param array|object $args   {
 *     Optional. Array or object of arguments to serialize for the Themes API.
 *
 *     @type string  $slug     The theme slug. Default empty.
 *     @type int     $per_page Number of themes per page. Default 24.
 *     @type int     $page     Number of current page. Default 1.
 *     @type int     $number   Number of tags to be queried.
 *     @type string  $search   A search term. Default empty.
 *     @type string  $tag      Tag to filter themes. Default empty.
 *     @type string  $author   Username of an author to filter themes. Default empty.
 *     @type string  $user     Username to query for their favorites. Default empty.
 *     @type string  $browse   Browse view: 'featured', 'popular', 'updated', 'favorites'.
 *     @type string  $locale   Locale to provide context-sensitive results. Default is the value of get_locale().
 *     @type array   $fields   {
 *         Array of fields which should or should not be returned.
 *
 *         @type bool $description        Whether to return the theme full description. Default false.
 *         @type bool $sections           Whether to return the theme readme sections: description, installation,
 *                                        FAQ, screenshots, other notes, and changelog. Default false.
 *         @type bool $rating             Whether to return the rating in percent and total number of ratings.
 *                                        Default false.
 *         @type bool $ratings            Whether to return the number of rating for each star (1-5). Default false.
 *         @type bool $downloaded         Whether to return the download count. Default false.
 *         @type bool $downloadlink       Whether to return the download link for the package. Default false.
 *         @type bool $last_updated       Whether to return the date of the last update. Default false.
 *         @type bool $tags               Whether to return the assigned tags. Default false.
 *         @type bool $homepage           Whether to return the theme homepage link. Default false.
 *         @type bool $screenshots        Whether to return the screenshots. Default false.
 *         @type int  $screenshot_count   Number of screenshots to return. Default 1.
 *         @type bool $screenshot_url     Whether to return the URL of the first screenshot. Default false.
 *         @type bool $photon_screenshots Whether to return the screenshots via Photon. Default false.
 *         @type bool $template           Whether to return the slug of the parent theme. Default false.
 *         @type bool $parent             Whether to return the slug, name and homepage of the parent theme. Default false.
 *         @type bool $versions           Whether to return the list of all available versions. Default false.
 *         @type bool $theme_url          Whether to return theme's URL. Default false.
 *         @type bool $extended_author    Whether to return nicename or nicename and display name. Default false.
 *     }
 * }
 * @return object|array|WP_Error Response object or array on success, WP_Error on failure. See the
 *         {@link https://developer.wordpress.org/reference/functions/themes_api/ function reference article}
 *         for more information on the make-up of possible return objects depending on the value of `$action`.
 */
function themes_api($action, $args = array())
{
}
/**
 * Prepare themes for JavaScript.
 *
 * @since 3.8.0
 *
 * @param array $themes Optional. Array of WP_Theme objects to prepare.
 *                      Defaults to all allowed themes.
 *
 * @return array An associative array of theme data, sorted by name.
 */
function wp_prepare_themes_for_js($themes = \null)
{
}
/**
 * Print JS templates for the theme-browsing UI in the Customizer.
 *
 * @since 4.2.0
 */
function customize_themes_print_templates()
{
}
/**
 * WordPress Translation Installation Administration API
 *
 * @package WordPress
 * @subpackage Administration
 */
/**
 * Retrieve translations from WordPress Translation API.
 *
 * @since 4.0.0
 *
 * @param string       $type Type of translations. Accepts 'plugins', 'themes', 'core'.
 * @param array|object $args Translation API arguments. Optional.
 * @return object|WP_Error On success an object of translations, WP_Error on failure.
 */
function translations_api($type, $args = \null)
{
}
/**
 * Get available translations from the WordPress.org API.
 *
 * @since 4.0.0
 *
 * @see translations_api()
 *
 * @return array Array of translations, each an array of data. If the API response results
 *               in an error, an empty array will be returned.
 */
function wp_get_available_translations()
{
}
/**
 * Output the select form for the language selection on the installation screen.
 *
 * @since 4.0.0
 *
 * @global string $wp_local_package
 *
 * @param array $languages Array of available languages (populated via the Translation API).
 */
function wp_install_language_form($languages)
{
}
/**
 * Download a language pack.
 *
 * @since 4.0.0
 *
 * @see wp_get_available_translations()
 *
 * @param string $download Language code to download.
 * @return string|bool Returns the language code if successfully downloaded
 *                     (or already installed), or false on failure.
 */
function wp_download_language_pack($download)
{
}
/**
 * Check if WordPress has access to the filesystem without asking for
 * credentials.
 *
 * @since 4.0.0
 *
 * @return bool Returns true on success, false on failure.
 */
function wp_can_install_language_pack()
{
}
/**
 * Upgrades the core of WordPress.
 *
 * This will create a .maintenance file at the base of the WordPress directory
 * to ensure that people can not access the web site, when the files are being
 * copied to their locations.
 *
 * The files in the `$_old_files` list will be removed and the new files
 * copied from the zip file after the database is upgraded.
 *
 * The files in the `$_new_bundled_files` list will be added to the installation
 * if the version is greater than or equal to the old version being upgraded.
 *
 * The steps for the upgrader for after the new release is downloaded and
 * unzipped is:
 *   1. Test unzipped location for select files to ensure that unzipped worked.
 *   2. Create the .maintenance file in current WordPress base.
 *   3. Copy new WordPress directory over old WordPress files.
 *   4. Upgrade WordPress to new version.
 *     4.1. Copy all files/folders other than wp-content
 *     4.2. Copy any language files to WP_LANG_DIR (which may differ from WP_CONTENT_DIR
 *     4.3. Copy any new bundled themes/plugins to their respective locations
 *   5. Delete new WordPress directory path.
 *   6. Delete .maintenance file.
 *   7. Remove old files.
 *   8. Delete 'update_core' option.
 *
 * There are several areas of failure. For instance if PHP times out before step
 * 6, then you will not be able to access any portion of your site. Also, since
 * the upgrade will not continue where it left off, you will not be able to
 * automatically remove old files and remove the 'update_core' option. This
 * isn't that bad.
 *
 * If the copy of the new WordPress over the old fails, then the worse is that
 * the new WordPress directory will remain.
 *
 * If it is assumed that every file will be copied over, including plugins and
 * themes, then if you edit the default theme, you should rename it, so that
 * your changes remain.
 *
 * @since 2.7.0
 *
 * @global WP_Filesystem_Base $wp_filesystem
 * @global array              $_old_files
 * @global array              $_new_bundled_files
 * @global wpdb               $wpdb
 * @global string             $wp_version
 * @global string             $required_php_version
 * @global string             $required_mysql_version
 *
 * @param string $from New release unzipped path.
 * @param string $to   Path to old WordPress installation.
 * @return WP_Error|null WP_Error on failure, null on success.
 */
function update_core($from, $to)
{
}
/**
 * Copies a directory from one location to another via the WordPress Filesystem Abstraction.
 * Assumes that WP_Filesystem() has already been called and setup.
 *
 * This is a temporary function for the 3.1 -> 3.2 upgrade, as well as for those upgrading to
 * 3.7+
 *
 * @ignore
 * @since 3.2.0
 * @since 3.7.0 Updated not to use a regular expression for the skip list
 * @see copy_dir()
 *
 * @global WP_Filesystem_Base $wp_filesystem
 *
 * @param string $from     source directory
 * @param string $to       destination directory
 * @param array $skip_list a list of files/folders to skip copying
 * @return mixed WP_Error on failure, True on success.
 */
function _copy_dir($from, $to, $skip_list = array())
{
}
/**
 * Redirect to the About WordPress page after a successful upgrade.
 *
 * This function is only needed when the existing installation is older than 3.4.0.
 *
 * @since 3.3.0
 *
 * @global string $wp_version
 * @global string $pagenow
 * @global string $action
 *
 * @param string $new_version
 */
function _redirect_to_about_wordpress($new_version)
{
}
/**
 * Cleans up Genericons example files.
 *
 * @since 4.2.2
 *
 * @global array              $wp_theme_directories
 * @global WP_Filesystem_Base $wp_filesystem
 */
function _upgrade_422_remove_genericons()
{
}
/**
 * Recursively find Genericons example files in a given folder.
 *
 * @ignore
 * @since 4.2.2
 *
 * @param string $directory Directory path. Expects trailingslashed.
 * @return array
 */
function _upgrade_422_find_genericons_files_in_folder($directory)
{
}
/**
 * @ignore
 * @since 4.4.0
 */
function _upgrade_440_force_deactivate_incompatible_plugins()
{
}
/**
 * WordPress Administration Update API
 *
 * @package WordPress
 * @subpackage Administration
 */
/**
 * Selects the first update version from the update_core option.
 *
 * @return object|array|false The response from the API on success, false on failure.
 */
function get_preferred_from_update_core()
{
}
/**
 * Get available core updates.
 *
 * @param array $options Set $options['dismissed'] to true to show dismissed upgrades too,
 * 	                     set $options['available'] to false to skip not-dismissed updates.
 * @return array|false Array of the update objects on success, false on failure.
 */
function get_core_updates($options = array())
{
}
/**
 * Gets the best available (and enabled) Auto-Update for WordPress Core.
 *
 * If there's 1.2.3 and 1.3 on offer, it'll choose 1.3 if the installation allows it, else, 1.2.3
 *
 * @since 3.7.0
 *
 * @return array|false False on failure, otherwise the core update offering.
 */
function find_core_auto_update()
{
}
/**
 * Gets and caches the checksums for the given version of WordPress.
 *
 * @since 3.7.0
 *
 * @param string $version Version string to query.
 * @param string $locale  Locale to query.
 * @return bool|array False on failure. An array of checksums on success.
 */
function get_core_checksums($version, $locale)
{
}
/**
 *
 * @param object $update
 * @return bool
 */
function dismiss_core_update($update)
{
}
/**
 *
 * @param string $version
 * @param string $locale
 * @return bool
 */
function undismiss_core_update($version, $locale)
{
}
/**
 *
 * @param string $version
 * @param string $locale
 * @return object|false
 */
function find_core_update($version, $locale)
{
}
/**
 *
 * @param string $msg
 * @return string
 */
function core_update_footer($msg = '')
{
}
/**
 *
 * @global string $pagenow
 * @return false|void
 */
function update_nag()
{
}
// Called directly from dashboard
function update_right_now_message()
{
}
/**
 * @since 2.9.0
 *
 * @return array
 */
function get_plugin_updates()
{
}
/**
 * @since 2.9.0
 */
function wp_plugin_update_rows()
{
}
/**
 * Displays update information for a plugin.
 *
 * @param string $file        Plugin basename.
 * @param array  $plugin_data Plugin information.
 * @return false|void
 */
function wp_plugin_update_row($file, $plugin_data)
{
}
/**
 *
 * @return array
 */
function get_theme_updates()
{
}
/**
 * @since 3.1.0
 */
function wp_theme_update_rows()
{
}
/**
 * Displays update information for a theme.
 *
 * @param string   $theme_key Theme stylesheet.
 * @param WP_Theme $theme     Theme object.
 * @return false|void
 */
function wp_theme_update_row($theme_key, $theme)
{
}
/**
 *
 * @global int $upgrading
 * @return false|void
 */
function maintenance_nag()
{
}
/**
 * Prints the JavaScript templates for update admin notices.
 *
 * Template takes one argument with four values:
 *
 *     param {object} data {
 *         Arguments for admin notice.
 *
 *         @type string id        ID of the notice.
 *         @type string className Class names for the notice.
 *         @type string message   The notice's message.
 *         @type string type      The type of update the notice is for. Either 'plugin' or 'theme'.
 *     }
 *
 * @since 4.6.0
 */
function wp_print_admin_notice_templates()
{
}
/**
 * Prints the JavaScript templates for update and deletion rows in list tables.
 *
 * The update template takes one argument with four values:
 *
 *     param {object} data {
 *         Arguments for the update row
 *
 *         @type string slug    Plugin slug.
 *         @type string plugin  Plugin base name.
 *         @type string colspan The number of table columns this row spans.
 *         @type string content The row content.
 *     }
 *
 * The delete template takes one argument with four values:
 *
 *     param {object} data {
 *         Arguments for the update row
 *
 *         @type string slug    Plugin slug.
 *         @type string plugin  Plugin base name.
 *         @type string name    Plugin name.
 *         @type string colspan The number of table columns this row spans.
 *     }
 *
 * @since 4.6.0
 */
function wp_print_update_row_templates()
{
}
/**
 * Installs the site.
 *
 * Runs the required functions to set up and populate the database,
 * including primary admin user and initial options.
 *
 * @since 2.1.0
 *
 * @param string $blog_title    Site title.
 * @param string $user_name     User's username.
 * @param string $user_email    User's email.
 * @param bool   $public        Whether site is public.
 * @param string $deprecated    Optional. Not used.
 * @param string $user_password Optional. User's chosen password. Default empty (random password).
 * @param string $language      Optional. Language chosen. Default empty.
 * @return array Array keys 'url', 'user_id', 'password', and 'password_message'.
 */
function wp_install($blog_title, $user_name, $user_email, $public, $deprecated = '', $user_password = '', $language = '')
{
}
/**
 * Creates the initial content for a newly-installed site.
 *
 * Adds the default "Uncategorized" category, the first post (with comment),
 * first page, and default widgets for default theme for the current version.
 *
 * @since 2.1.0
 *
 * @global wpdb       $wpdb
 * @global WP_Rewrite $wp_rewrite
 * @global string     $table_prefix
 *
 * @param int $user_id User ID.
 */
function wp_install_defaults($user_id)
{
}
/**
 * Maybe enable pretty permalinks on installation.
 *
 * If after enabling pretty permalinks don't work, fallback to query-string permalinks.
 *
 * @since 4.2.0
 *
 * @global WP_Rewrite $wp_rewrite WordPress rewrite component.
 *
 * @return bool Whether pretty permalinks are enabled. False otherwise.
 */
function wp_install_maybe_enable_pretty_permalinks()
{
}
/**
 * Notifies the site admin that the setup is complete.
 *
 * Sends an email with wp_mail to the new administrator that the site setup is complete,
 * and provides them with a record of their login credentials.
 *
 * @since 2.1.0
 *
 * @param string $blog_title Site title.
 * @param string $blog_url   Site url.
 * @param int    $user_id    User ID.
 * @param string $password   User's Password.
 */
function wp_new_blog_notification($blog_title, $blog_url, $user_id, $password)
{
}
/**
 * Runs WordPress Upgrade functions.
 *
 * Upgrades the database if needed during a site update.
 *
 * @since 2.1.0
 *
 * @global int  $wp_current_db_version
 * @global int  $wp_db_version
 * @global wpdb $wpdb WordPress database abstraction object.
 */
function wp_upgrade()
{
}
/**
 * Functions to be called in installation and upgrade scripts.
 *
 * Contains conditional checks to determine which upgrade scripts to run,
 * based on database version and WP version being updated-to.
 *
 * @ignore
 * @since 1.0.1
 *
 * @global int $wp_current_db_version
 * @global int $wp_db_version
 */
function upgrade_all()
{
}
/**
 * Execute changes made in WordPress 1.0.
 *
 * @ignore
 * @since 1.0.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 */
function upgrade_100()
{
}
/**
 * Execute changes made in WordPress 1.0.1.
 *
 * @ignore
 * @since 1.0.1
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 */
function upgrade_101()
{
}
/**
 * Execute changes made in WordPress 1.2.
 *
 * @ignore
 * @since 1.2.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 */
function upgrade_110()
{
}
/**
 * Execute changes made in WordPress 1.5.
 *
 * @ignore
 * @since 1.5.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 */
function upgrade_130()
{
}
/**
 * Execute changes made in WordPress 2.0.
 *
 * @ignore
 * @since 2.0.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 * @global int  $wp_current_db_version
 */
function upgrade_160()
{
}
/**
 * Execute changes made in WordPress 2.1.
 *
 * @ignore
 * @since 2.1.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 * @global int  $wp_current_db_version
 */
function upgrade_210()
{
}
/**
 * Execute changes made in WordPress 2.3.
 *
 * @ignore
 * @since 2.3.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 * @global int  $wp_current_db_version
 */
function upgrade_230()
{
}
/**
 * Remove old options from the database.
 *
 * @ignore
 * @since 2.3.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 */
function upgrade_230_options_table()
{
}
/**
 * Remove old categories, link2cat, and post2cat database tables.
 *
 * @ignore
 * @since 2.3.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 */
function upgrade_230_old_tables()
{
}
/**
 * Upgrade old slugs made in version 2.2.
 *
 * @ignore
 * @since 2.2.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 */
function upgrade_old_slugs()
{
}
/**
 * Execute changes made in WordPress 2.5.0.
 *
 * @ignore
 * @since 2.5.0
 *
 * @global int $wp_current_db_version
 */
function upgrade_250()
{
}
/**
 * Execute changes made in WordPress 2.5.2.
 *
 * @ignore
 * @since 2.5.2
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 */
function upgrade_252()
{
}
/**
 * Execute changes made in WordPress 2.6.
 *
 * @ignore
 * @since 2.6.0
 *
 * @global int $wp_current_db_version
 */
function upgrade_260()
{
}
/**
 * Execute changes made in WordPress 2.7.
 *
 * @ignore
 * @since 2.7.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 * @global int  $wp_current_db_version
 */
function upgrade_270()
{
}
/**
 * Execute changes made in WordPress 2.8.
 *
 * @ignore
 * @since 2.8.0
 *
 * @global int  $wp_current_db_version
 * @global wpdb $wpdb WordPress database abstraction object.
 */
function upgrade_280()
{
}
/**
 * Execute changes made in WordPress 2.9.
 *
 * @ignore
 * @since 2.9.0
 *
 * @global int $wp_current_db_version
 */
function upgrade_290()
{
}
/**
 * Execute changes made in WordPress 3.0.
 *
 * @ignore
 * @since 3.0.0
 *
 * @global int  $wp_current_db_version
 * @global wpdb $wpdb WordPress database abstraction object.
 */
function upgrade_300()
{
}
/**
 * Execute changes made in WordPress 3.3.
 *
 * @ignore
 * @since 3.3.0
 *
 * @global int   $wp_current_db_version
 * @global wpdb  $wpdb
 * @global array $wp_registered_widgets
 * @global array $sidebars_widgets
 */
function upgrade_330()
{
}
/**
 * Execute changes made in WordPress 3.4.
 *
 * @ignore
 * @since 3.4.0
 *
 * @global int   $wp_current_db_version
 * @global wpdb  $wpdb
 */
function upgrade_340()
{
}
/**
 * Execute changes made in WordPress 3.5.
 *
 * @ignore
 * @since 3.5.0
 *
 * @global int   $wp_current_db_version
 * @global wpdb  $wpdb
 */
function upgrade_350()
{
}
/**
 * Execute changes made in WordPress 3.7.
 *
 * @ignore
 * @since 3.7.0
 *
 * @global int $wp_current_db_version
 */
function upgrade_370()
{
}
/**
 * Execute changes made in WordPress 3.7.2.
 *
 * @ignore
 * @since 3.7.2
 * @since 3.8.0
 *
 * @global int $wp_current_db_version
 */
function upgrade_372()
{
}
/**
 * Execute changes made in WordPress 3.8.0.
 *
 * @ignore
 * @since 3.8.0
 *
 * @global int $wp_current_db_version
 */
function upgrade_380()
{
}
/**
 * Execute changes made in WordPress 4.0.0.
 *
 * @ignore
 * @since 4.0.0
 *
 * @global int $wp_current_db_version
 */
function upgrade_400()
{
}
/**
 * Execute changes made in WordPress 4.2.0.
 *
 * @ignore
 * @since 4.2.0
 *
 * @global int   $wp_current_db_version
 * @global wpdb  $wpdb
 */
function upgrade_420()
{
}
/**
 * Executes changes made in WordPress 4.3.0.
 *
 * @ignore
 * @since 4.3.0
 *
 * @global int  $wp_current_db_version Current version.
 * @global wpdb $wpdb                  WordPress database abstraction object.
 */
function upgrade_430()
{
}
/**
 * Executes comments changes made in WordPress 4.3.0.
 *
 * @ignore
 * @since 4.3.0
 *
 * @global int  $wp_current_db_version Current version.
 * @global wpdb $wpdb                  WordPress database abstraction object.
 */
function upgrade_430_fix_comments()
{
}
/**
 * Executes changes made in WordPress 4.3.1.
 *
 * @ignore
 * @since 4.3.1
 */
function upgrade_431()
{
}
/**
 * Executes changes made in WordPress 4.4.0.
 *
 * @ignore
 * @since 4.4.0
 *
 * @global int  $wp_current_db_version Current version.
 * @global wpdb $wpdb                  WordPress database abstraction object.
 */
function upgrade_440()
{
}
/**
 * Executes changes made in WordPress 4.5.0.
 *
 * @ignore
 * @since 4.5.0
 *
 * @global int  $wp_current_db_version Current database version.
 * @global wpdb $wpdb                  WordPress database abstraction object.
 */
function upgrade_450()
{
}
/**
 * Executes changes made in WordPress 4.6.0.
 *
 * @ignore
 * @since 4.6.0
 *
 * @global int $wp_current_db_version Current database version.
 */
function upgrade_460()
{
}
/**
 * Executes network-level upgrade routines.
 *
 * @since 3.0.0
 *
 * @global int   $wp_current_db_version
 * @global wpdb  $wpdb
 */
function upgrade_network()
{
}
//
// General functions we use to actually do stuff
//
/**
 * Creates a table in the database if it doesn't already exist.
 *
 * This method checks for an existing database and creates a new one if it's not
 * already present. It doesn't rely on MySQL's "IF NOT EXISTS" statement, but chooses
 * to query all tables first and then run the SQL statement creating the table.
 *
 * @since 1.0.0
 *
 * @global wpdb  $wpdb
 *
 * @param string $table_name Database table name to create.
 * @param string $create_ddl SQL statement to create table.
 * @return bool If table already exists or was created by function.
 */
function maybe_create_table($table_name, $create_ddl)
{
}
/**
 * Drops a specified index from a table.
 *
 * @since 1.0.1
 *
 * @global wpdb  $wpdb
 *
 * @param string $table Database table name.
 * @param string $index Index name to drop.
 * @return true True, when finished.
 */
function drop_index($table, $index)
{
}
/**
 * Adds an index to a specified table.
 *
 * @since 1.0.1
 *
 * @global wpdb  $wpdb
 *
 * @param string $table Database table name.
 * @param string $index Database table index column.
 * @return true True, when done with execution.
 */
function add_clean_index($table, $index)
{
}
/**
 * Adds column to a database table if it doesn't already exist.
 *
 * @since 1.3.0
 *
 * @global wpdb  $wpdb
 *
 * @param string $table_name  The table name to modify.
 * @param string $column_name The column name to add to the table.
 * @param string $create_ddl  The SQL statement used to add the column.
 * @return bool True if already exists or on successful completion, false on error.
 */
function maybe_add_column($table_name, $column_name, $create_ddl)
{
}
/**
 * If a table only contains utf8 or utf8mb4 columns, convert it to utf8mb4.
 *
 * @since 4.2.0
 *
 * @global wpdb  $wpdb
 *
 * @param string $table The table to convert.
 * @return bool true if the table was converted, false if it wasn't.
 */
function maybe_convert_table_to_utf8mb4($table)
{
}
/**
 * Retrieve all options as it was for 1.2.
 *
 * @since 1.2.0
 *
 * @global wpdb  $wpdb
 *
 * @return stdClass List of options.
 */
function get_alloptions_110()
{
}
/**
 * Utility version of get_option that is private to installation/upgrade.
 *
 * @ignore
 * @since 1.5.1
 * @access private
 *
 * @global wpdb  $wpdb
 *
 * @param string $setting Option name.
 * @return mixed
 */
function __get_option($setting)
{
}
/**
 * Filters for content to remove unnecessary slashes.
 *
 * @since 1.5.0
 *
 * @param string $content The content to modify.
 * @return string The de-slashed content.
 */
function deslash($content)
{
}
/**
 * Modifies the database based on specified SQL statements.
 *
 * Useful for creating new tables and updating existing tables to a new structure.
 *
 * @since 1.5.0
 *
 * @global wpdb  $wpdb
 *
 * @param string|array $queries Optional. The query to run. Can be multiple queries
 *                              in an array, or a string of queries separated by
 *                              semicolons. Default empty.
 * @param bool         $execute Optional. Whether or not to execute the query right away.
 *                              Default true.
 * @return array Strings containing the results of the various update queries.
 */
function dbDelta($queries = '', $execute = \true)
{
}
/**
 * Updates the database tables to a new schema.
 *
 * By default, updates all the tables to use the latest defined schema, but can also
 * be used to update a specific set of tables in wp_get_db_schema().
 *
 * @since 1.5.0
 *
 * @uses dbDelta
 *
 * @param string $tables Optional. Which set of tables to update. Default is 'all'.
 */
function make_db_current($tables = 'all')
{
}
/**
 * Updates the database tables to a new schema, but without displaying results.
 *
 * By default, updates all the tables to use the latest defined schema, but can
 * also be used to update a specific set of tables in wp_get_db_schema().
 *
 * @since 1.5.0
 *
 * @see make_db_current()
 *
 * @param string $tables Optional. Which set of tables to update. Default is 'all'.
 */
function make_db_current_silent($tables = 'all')
{
}
/**
 * Creates a site theme from an existing theme.
 *
 * {@internal Missing Long Description}}
 *
 * @since 1.5.0
 *
 * @param string $theme_name The name of the theme.
 * @param string $template   The directory name of the theme.
 * @return bool
 */
function make_site_theme_from_oldschool($theme_name, $template)
{
}
/**
 * Creates a site theme from the default theme.
 *
 * {@internal Missing Long Description}}
 *
 * @since 1.5.0
 *
 * @param string $theme_name The name of the theme.
 * @param string $template   The directory name of the theme.
 * @return false|void
 */
function make_site_theme_from_default($theme_name, $template)
{
}
/**
 * Creates a site theme.
 *
 * {@internal Missing Long Description}}
 *
 * @since 1.5.0
 *
 * @return false|string
 */
function make_site_theme()
{
}
/**
 * Translate user level to user role name.
 *
 * @since 2.0.0
 *
 * @param int $level User level.
 * @return string User role name.
 */
function translate_level_to_role($level)
{
}
/**
 * Checks the version of the installed MySQL binary.
 *
 * @since 2.1.0
 *
 * @global wpdb  $wpdb
 */
function wp_check_mysql_version()
{
}
/**
 * Disables the Automattic widgets plugin, which was merged into core.
 *
 * @since 2.2.0
 */
function maybe_disable_automattic_widgets()
{
}
/**
 * Disables the Link Manager on upgrade if, at the time of upgrade, no links exist in the DB.
 *
 * @since 3.5.0
 *
 * @global int  $wp_current_db_version
 * @global wpdb $wpdb WordPress database abstraction object.
 */
function maybe_disable_link_manager()
{
}
/**
 * Runs before the schema is upgraded.
 *
 * @since 2.9.0
 *
 * @global int  $wp_current_db_version
 * @global wpdb $wpdb WordPress database abstraction object.
 */
function pre_schema_upgrade()
{
}
/**
 * Install global terms.
 *
 * @since 3.0.0
 *
 * @global wpdb   $wpdb
 * @global string $charset_collate
 */
function install_global_terms()
{
}
/**
 * Determine if global tables should be upgraded.
 *
 * This function performs a series of checks to ensure the environment allows
 * for the safe upgrading of global WordPress database tables. It is necessary
 * because global tables will commonly grow to millions of rows on large
 * installations, and the ability to control their upgrade routines can be
 * critical to the operation of large networks.
 *
 * In a future iteration, this function may use `wp_is_large_network()` to more-
 * intelligently prevent global table upgrades. Until then, we make sure
 * WordPress is on the main site of the main network, to avoid running queries
 * more than once in multi-site or multi-network environments.
 *
 * @since 4.3.0
 *
 * @return bool Whether to run the upgrade routines on global tables.
 */
function wp_should_upgrade_global_tables()
{
}
/**
 * WordPress user administration API.
 *
 * @package WordPress
 * @subpackage Administration
 */
/**
 * Creates a new user from the "Users" form using $_POST information.
 *
 * @since 2.0.0
 *
 * @return int|WP_Error WP_Error or User ID.
 */
function add_user()
{
}
/**
 * Edit user settings based on contents of $_POST
 *
 * Used on user-edit.php and profile.php to manage and process user options, passwords etc.
 *
 * @since 2.0.0
 *
 * @param int $user_id Optional. User ID.
 * @return int|WP_Error user id of the updated user
 */
function edit_user($user_id = 0)
{
}
/**
 * Fetch a filtered list of user roles that the current user is
 * allowed to edit.
 *
 * Simple function who's main purpose is to allow filtering of the
 * list of roles in the $wp_roles object so that plugins can remove
 * inappropriate ones depending on the situation or user making edits.
 * Specifically because without filtering anyone with the edit_users
 * capability can edit others to be administrators, even if they are
 * only editors or authors. This filter allows admins to delegate
 * user management.
 *
 * @since 2.8.0
 *
 * @return array
 */
function get_editable_roles()
{
}
/**
 * Retrieve user data and filter it.
 *
 * @since 2.0.5
 *
 * @param int $user_id User ID.
 * @return WP_User|bool WP_User object on success, false on failure.
 */
function get_user_to_edit($user_id)
{
}
/**
 * Retrieve the user's drafts.
 *
 * @since 2.0.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param int $user_id User ID.
 * @return array
 */
function get_users_drafts($user_id)
{
}
/**
 * Remove user and optionally reassign posts and links to another user.
 *
 * If the $reassign parameter is not assigned to a User ID, then all posts will
 * be deleted of that user. The action {@see 'delete_user'} that is passed the User ID
 * being deleted will be run after the posts are either reassigned or deleted.
 * The user meta will also be deleted that are for that User ID.
 *
 * @since 2.0.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param int $id User ID.
 * @param int $reassign Optional. Reassign posts and links to new User ID.
 * @return bool True when finished.
 */
function wp_delete_user($id, $reassign = \null)
{
}
/**
 * Remove all capabilities from user.
 *
 * @since 2.1.0
 *
 * @param int $id User ID.
 */
function wp_revoke_user($id)
{
}
/**
 * @since 2.8.0
 *
 * @global int $user_ID
 *
 * @param false $errors Deprecated.
 */
function default_password_nag_handler($errors = \false)
{
}
/**
 * @since 2.8.0
 *
 * @param int    $user_ID
 * @param object $old_data
 */
function default_password_nag_edit_user($user_ID, $old_data)
{
}
/**
 * @since 2.8.0
 *
 * @global string $pagenow
 */
function default_password_nag()
{
}
/**
 * @since 3.5.0
 * @access private
 */
function delete_users_add_js()
{
}
/**
 * Optional SSL preference that can be turned on by hooking to the 'personal_options' action.
 *
 * See the {@see 'personal_options'} action.
 *
 * @since 2.7.0
 *
 * @param object $user User data object
 */
function use_ssl_preference($user)
{
}
/**
 *
 * @param string $text
 * @return string
 */
function admin_created_user_email($text)
{
}
/**
 * Resend an existing request and return the result.
 *
 * @since 4.9.6
 * @access private
 *
 * @param int $request_id Request ID.
 * @return bool|WP_Error Returns true/false based on the success of sending the email, or a WP_Error object.
 */
function _wp_privacy_resend_request($request_id)
{
}
/**
 * Marks a request as completed by the admin and logs the current timestamp.
 *
 * @since 4.9.6
 * @access private
 *
 * @param  int          $request_id Request ID.
 * @return int|WP_Error $request    Request ID on success or WP_Error.
 */
function _wp_privacy_completed_request($request_id)
{
}
/**
 * Handle list table actions.
 *
 * @since 4.9.6
 * @access private
 */
function _wp_personal_data_handle_actions()
{
}
/**
 * Cleans up failed and expired requests before displaying the list table.
 *
 * @since 4.9.6
 * @access private
 */
function _wp_personal_data_cleanup_requests()
{
}
/**
 * Personal data export.
 *
 * @since 4.9.6
 * @access private
 */
function _wp_personal_data_export_page()
{
}
/**
 * Personal data anonymization.
 *
 * @since 4.9.6
 * @access private
 */
function _wp_personal_data_removal_page()
{
}
/**
 * Mark erasure requests as completed after processing is finished.
 *
 * This intercepts the Ajax responses to personal data eraser page requests, and
 * monitors the status of a request. Once all of the processing has finished, the
 * request is marked as completed.
 *
 * @since 4.9.6
 *
 * @see wp_privacy_personal_data_erasure_page
 *
 * @param array  $response      The response from the personal data eraser for
 *                              the given page.
 * @param int    $eraser_index  The index of the personal data eraser. Begins
 *                              at 1.
 * @param string $email_address The email address of the user whose personal
 *                              data this is.
 * @param int    $page          The page of personal data for this eraser.
 *                              Begins at 1.
 * @param int    $request_id    The request ID for this personal data erasure.
 * @return array The filtered response.
 */
function wp_privacy_process_personal_data_erasure_page($response, $eraser_index, $email_address, $page, $request_id)
{
}
/**
 * Add requests pages.
 *
 * @since 4.9.6
 * @access private
 */
function _wp_privacy_hook_requests_page()
{
}
/**
 * Add options for the privacy requests screens.
 *
 * @since 4.9.8
 * @access private
 */
function _wp_privacy_requests_screen_options()
{
}
/**
 * WordPress Widgets Administration API
 *
 * @package WordPress
 * @subpackage Administration
 */
/**
 * Display list of the available widgets.
 *
 * @since 2.5.0
 *
 * @global array $wp_registered_widgets
 * @global array $wp_registered_widget_controls
 */
function wp_list_widgets()
{
}
/**
 * Callback to sort array by a 'name' key.
 *
 * @since 3.1.0
 * @access private
 *
 * @return int
 */
function _sort_name_callback($a, $b)
{
}
/**
 * Show the widgets and their settings for a sidebar.
 * Used in the admin widget config screen.
 *
 * @since 2.5.0
 *
 * @param string $sidebar      Sidebar ID.
 * @param string $sidebar_name Optional. Sidebar name. Default empty.
 */
function wp_list_widget_controls($sidebar, $sidebar_name = '')
{
}
/**
 * Retrieves the widget control arguments.
 *
 * @since 2.5.0
 *
 * @global array $wp_registered_widgets
 *
 * @staticvar int $i
 *
 * @param array $params
 * @return array
 */
function wp_list_widget_controls_dynamic_sidebar($params)
{
}
/**
 *
 * @global array $wp_registered_widgets
 *
 * @param string $id_base
 * @return int
 */
function next_widget_id_number($id_base)
{
}
/**
 * Meta widget used to display the control form for a widget.
 *
 * Called from dynamic_sidebar().
 *
 * @since 2.5.0
 *
 * @global array $wp_registered_widgets
 * @global array $wp_registered_widget_controls
 * @global array $sidebars_widgets
 *
 * @param array $sidebar_args
 * @return array
 */
function wp_widget_control($sidebar_args)
{
}
/**
 *
 * @param string $classes
 * @return string
 */
function wp_widgets_access_body_class($classes)
{
}
/**
 * Display installation header.
 *
 * @since 2.5.0
 *
 * @param string $body_classes
 */
function display_header($body_classes = '')
{
}
// end display_header()
/**
 * Display installer setup form.
 *
 * @since 2.8.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param string|null $error
 */
function display_setup_form($error = \null)
{
}
/**
 * XML callback function for the start of a new XML tag.
 *
 * @since 0.71
 * @access private
 *
 * @global array $names
 * @global array $urls
 * @global array $targets
 * @global array $descriptions
 * @global array $feeds
 *
 * @param mixed $parser XML Parser resource.
 * @param string $tagName XML element name.
 * @param array $attrs XML element attributes.
 */
function startElement($parser, $tagName, $attrs)
{
}
/**
 * XML callback function that is called at the end of a XML tag.
 *
 * @since 0.71
 * @access private
 *
 * @param mixed $parser XML Parser resource.
 * @param string $tagName XML tag name.
 */
function endElement($parser, $tagName)
{
}
/**
 * Display menu.
 *
 * @access private
 * @since 2.7.0
 *
 * @global string $self
 * @global string $parent_file
 * @global string $submenu_file
 * @global string $plugin_page
 * @global string $typenow
 *
 * @param array $menu
 * @param array $submenu
 * @param bool  $submenu_as_parent
 */
function _wp_menu_output($menu, $submenu, $submenu_as_parent = \true)
{
}
/**
 * Adds the (theme) 'Editor' link to the bottom of the Appearance menu.
 *
 * @access private
 * @since 3.0.0
 */
function _add_themes_utility_last()
{
}
/**
 *
 * @global int $_wp_nav_menu_max_depth
 *
 * @param string $classes
 * @return string
 */
function wp_nav_menu_max_depth($classes)
{
}
function wp_load_press_this()
{
}
/**
 * Display setup wp-config.php file header.
 *
 * @ignore
 * @since 2.3.0
 *
 * @global string    $wp_local_package
 * @global WP_Locale $wp_locale
 *
 * @param string|array $body_classes
 */
function setup_config_display_header($body_classes = array())
{
}
/**
 *
 * @global string $wp_local_package
 * @global wpdb   $wpdb
 *
 * @staticvar bool $first_pass
 *
 * @param object $update
 */
function list_core_update($update)
{
}
/**
 * @since 2.7.0
 */
function dismissed_updates()
{
}
/**
 * Display upgrade WordPress for downloading latest or upgrading automatically form.
 *
 * @since 2.7.0
 *
 * @global string $required_php_version
 * @global string $required_mysql_version
 */
function core_upgrade_preamble()
{
}
function list_plugin_updates()
{
}
/**
 * @since 2.9.0
 */
function list_theme_updates()
{
}
/**
 * @since 3.7.0
 */
function list_translation_updates()
{
}
/**
 * Upgrade WordPress core display.
 *
 * @since 2.7.0
 *
 * @global WP_Filesystem_Base $wp_filesystem Subclass
 *
 * @param bool $reinstall
 */
function do_core_upgrade($reinstall = \false)
{
}
/**
 * @since 2.7.0
 */
function do_dismiss_core_update()
{
}
/**
 * @since 2.7.0
 */
function do_undismiss_core_update()
{
}
/**
 * Retrieves the cron lock.
 *
 * Returns the uncached `doing_cron` transient.
 *
 * @ignore
 * @since 3.3.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @return string|false Value of the `doing_cron` transient, 0|false otherwise.
 */
function _get_cron_lock()
{
}
/**
 * Toolbar API: Top-level Toolbar functionality
 *
 * @package WordPress
 * @subpackage Toolbar
 * @since 3.1.0
 */
/**
 * Instantiate the admin bar object and set it up as a global for access elsewhere.
 *
 * UNHOOKING THIS FUNCTION WILL NOT PROPERLY REMOVE THE ADMIN BAR.
 * For that, use show_admin_bar(false) or the {@see 'show_admin_bar'} filter.
 *
 * @since 3.1.0
 * @access private
 *
 * @global WP_Admin_Bar $wp_admin_bar
 *
 * @return bool Whether the admin bar was successfully initialized.
 */
function _wp_admin_bar_init()
{
}
/**
 * Renders the admin bar to the page based on the $wp_admin_bar->menu member var.
 *
 * This is called very late on the footer actions so that it will render after
 * anything else being added to the footer.
 *
 * It includes the {@see 'admin_bar_menu'} action which should be used to hook in and
 * add new menus to the admin bar. That way you can be sure that you are adding at most
 * optimal point, right before the admin bar is rendered. This also gives you access to
 * the `$post` global, among others.
 *
 * @since 3.1.0
 *
 * @global WP_Admin_Bar $wp_admin_bar
 */
function wp_admin_bar_render()
{
}
/**
 * Add the WordPress logo menu.
 *
 * @since 3.3.0
 *
 * @param WP_Admin_Bar $wp_admin_bar
 */
function wp_admin_bar_wp_menu($wp_admin_bar)
{
}
/**
 * Add the sidebar toggle button.
 *
 * @since 3.8.0
 *
 * @param WP_Admin_Bar $wp_admin_bar
 */
function wp_admin_bar_sidebar_toggle($wp_admin_bar)
{
}
/**
 * Add the "My Account" item.
 *
 * @since 3.3.0
 *
 * @param WP_Admin_Bar $wp_admin_bar
 */
function wp_admin_bar_my_account_item($wp_admin_bar)
{
}
/**
 * Add the "My Account" submenu items.
 *
 * @since 3.1.0
 *
 * @param WP_Admin_Bar $wp_admin_bar
 */
function wp_admin_bar_my_account_menu($wp_admin_bar)
{
}
/**
 * Add the "Site Name" menu.
 *
 * @since 3.3.0
 *
 * @param WP_Admin_Bar $wp_admin_bar
 */
function wp_admin_bar_site_menu($wp_admin_bar)
{
}
/**
 * Adds the "Customize" link to the Toolbar.
 *
 * @since 4.3.0
 *
 * @param WP_Admin_Bar $wp_admin_bar WP_Admin_Bar instance.
 * @global WP_Customize_Manager $wp_customize
 */
function wp_admin_bar_customize_menu($wp_admin_bar)
{
}
/**
 * Add the "My Sites/[Site Name]" menu and all submenus.
 *
 * @since 3.1.0
 *
 * @param WP_Admin_Bar $wp_admin_bar
 */
function wp_admin_bar_my_sites_menu($wp_admin_bar)
{
}
/**
 * Provide a shortlink.
 *
 * @since 3.1.0
 *
 * @param WP_Admin_Bar $wp_admin_bar
 */
function wp_admin_bar_shortlink_menu($wp_admin_bar)
{
}
/**
 * Provide an edit link for posts and terms.
 *
 * @since 3.1.0
 *
 * @global WP_Term  $tag
 * @global WP_Query $wp_the_query
 *
 * @param WP_Admin_Bar $wp_admin_bar
 */
function wp_admin_bar_edit_menu($wp_admin_bar)
{
}
/**
 * Add "Add New" menu.
 *
 * @since 3.1.0
 *
 * @param WP_Admin_Bar $wp_admin_bar
 */
function wp_admin_bar_new_content_menu($wp_admin_bar)
{
}
/**
 * Add edit comments link with awaiting moderation count bubble.
 *
 * @since 3.1.0
 *
 * @param WP_Admin_Bar $wp_admin_bar
 */
function wp_admin_bar_comments_menu($wp_admin_bar)
{
}
/**
 * Add appearance submenu items to the "Site Name" menu.
 *
 * @since 3.1.0
 *
 * @param WP_Admin_Bar $wp_admin_bar
 */
function wp_admin_bar_appearance_menu($wp_admin_bar)
{
}
/**
 * Provide an update link if theme/plugin/core updates are available.
 *
 * @since 3.1.0
 *
 * @param WP_Admin_Bar $wp_admin_bar
 */
function wp_admin_bar_updates_menu($wp_admin_bar)
{
}
/**
 * Add search form.
 *
 * @since 3.3.0
 *
 * @param WP_Admin_Bar $wp_admin_bar
 */
function wp_admin_bar_search_menu($wp_admin_bar)
{
}
/**
 * Add secondary menus.
 *
 * @since 3.3.0
 *
 * @param WP_Admin_Bar $wp_admin_bar
 */
function wp_admin_bar_add_secondary_groups($wp_admin_bar)
{
}
/**
 * Style and scripts for the admin bar.
 *
 * @since 3.1.0
 */
function wp_admin_bar_header()
{
}
/**
 * Default admin bar callback.
 *
 * @since 3.1.0
 */
function _admin_bar_bump_cb()
{
}
/**
 * Sets the display status of the admin bar.
 *
 * This can be called immediately upon plugin load. It does not need to be called
 * from a function hooked to the {@see 'init'} action.
 *
 * @since 3.1.0
 *
 * @global bool $show_admin_bar
 *
 * @param bool $show Whether to allow the admin bar to show.
 */
function show_admin_bar($show)
{
}
/**
 * Determine whether the admin bar should be showing.
 *
 * @since 3.1.0
 *
 * @global bool   $show_admin_bar
 * @global string $pagenow
 *
 * @return bool Whether the admin bar should be showing.
 */
function is_admin_bar_showing()
{
}
/**
 * Retrieve the admin bar display preference of a user.
 *
 * @since 3.1.0
 * @access private
 *
 * @param string $context Context of this preference check. Defaults to 'front'. The 'admin'
 * 	preference is no longer used.
 * @param int $user Optional. ID of the user to check, defaults to 0 for current user.
 * @return bool Whether the admin bar should be showing for this user.
 */
function _get_admin_bar_pref($context = 'front', $user = 0)
{
}
/**
 * Author Template functions for use in themes.
 *
 * These functions must be used within the WordPress Loop.
 *
 * @link https://codex.wordpress.org/Author_Templates
 *
 * @package WordPress
 * @subpackage Template
 */
/**
 * Retrieve the author of the current post.
 *
 * @since 1.5.0
 *
 * @global object $authordata The current author's DB object.
 *
 * @param string $deprecated Deprecated.
 * @return string|null The author's display name.
 */
function get_the_author($deprecated = '')
{
}
/**
 * Display the name of the author of the current post.
 *
 * The behavior of this function is based off of old functionality predating
 * get_the_author(). This function is not deprecated, but is designed to echo
 * the value from get_the_author() and as an result of any old theme that might
 * still use the old behavior will also pass the value from get_the_author().
 *
 * The normal, expected behavior of this function is to echo the author and not
 * return it. However, backward compatibility has to be maintained.
 *
 * @since 0.71
 * @see get_the_author()
 * @link https://codex.wordpress.org/Template_Tags/the_author
 *
 * @param string $deprecated Deprecated.
 * @param string $deprecated_echo Deprecated. Use get_the_author(). Echo the string or return it.
 * @return string|null The author's display name, from get_the_author().
 */
function the_author($deprecated = '', $deprecated_echo = \true)
{
}
/**
 * Retrieve the author who last edited the current post.
 *
 * @since 2.8.0
 *
 * @return string|void The author's display name.
 */
function get_the_modified_author()
{
}
/**
 * Display the name of the author who last edited the current post,
 * if the author's ID is available.
 *
 * @since 2.8.0
 *
 * @see get_the_author()
 */
function the_modified_author()
{
}
/**
 * Retrieves the requested data of the author of the current post.
 *
 * Valid values for the `$field` parameter include:
 *
 * - admin_color
 * - aim
 * - comment_shortcuts
 * - description
 * - display_name
 * - first_name
 * - ID
 * - jabber
 * - last_name
 * - nickname
 * - plugins_last_view
 * - plugins_per_page
 * - rich_editing
 * - syntax_highlighting
 * - user_activation_key
 * - user_description
 * - user_email
 * - user_firstname
 * - user_lastname
 * - user_level
 * - user_login
 * - user_nicename
 * - user_pass
 * - user_registered
 * - user_status
 * - user_url
 * - yim
 *
 * @since 2.8.0
 *
 * @global object $authordata The current author's DB object.
 *
 * @param string $field   Optional. The user field to retrieve. Default empty.
 * @param int    $user_id Optional. User ID.
 * @return string The author's field from the current author's DB object, otherwise an empty string.
 */
function get_the_author_meta($field = '', $user_id = \false)
{
}
/**
 * Outputs the field from the user's DB object. Defaults to current post's author.
 *
 * @since 2.8.0
 *
 * @param string $field   Selects the field of the users record. See get_the_author_meta()
 *                        for the list of possible fields.
 * @param int    $user_id Optional. User ID.
 *
 * @see get_the_author_meta()
 */
function the_author_meta($field = '', $user_id = \false)
{
}
/**
 * Retrieve either author's link or author's name.
 *
 * If the author has a home page set, return an HTML link, otherwise just return the
 * author's name.
 *
 * @since 3.0.0
 *
 * @return string|null An HTML link if the author's url exist in user meta,
 *                     else the result of get_the_author().
 */
function get_the_author_link()
{
}
/**
 * Display either author's link or author's name.
 *
 * If the author has a home page set, echo an HTML link, otherwise just echo the
 * author's name.
 *
 * @link https://codex.wordpress.org/Template_Tags/the_author_link
 *
 * @since 2.1.0
 */
function the_author_link()
{
}
/**
 * Retrieve the number of posts by the author of the current post.
 *
 * @since 1.5.0
 *
 * @return int The number of posts by the author.
 */
function get_the_author_posts()
{
}
/**
 * Display the number of posts by the author of the current post.
 *
 * @link https://codex.wordpress.org/Template_Tags/the_author_posts
 * @since 0.71
 */
function the_author_posts()
{
}
/**
 * Retrieves an HTML link to the author page of the current post's author.
 *
 * Returns an HTML-formatted link using get_author_posts_url().
 *
 * @since 4.4.0
 *
 * @global object $authordata The current author's DB object.
 *
 * @return string An HTML link to the author page.
 */
function get_the_author_posts_link()
{
}
/**
 * Displays an HTML link to the author page of the current post's author.
 *
 * @since 1.2.0
 * @since 4.4.0 Converted into a wrapper for get_the_author_posts_link()
 *
 * @param string $deprecated Unused.
 */
function the_author_posts_link($deprecated = '')
{
}
/**
 * Retrieve the URL to the author page for the user with the ID provided.
 *
 * @since 2.1.0
 *
 * @global WP_Rewrite $wp_rewrite
 *
 * @param int    $author_id       Author ID.
 * @param string $author_nicename Optional. The author's nicename (slug). Default empty.
 * @return string The URL to the author's page.
 */
function get_author_posts_url($author_id, $author_nicename = '')
{
}
/**
 * List all the authors of the site, with several options available.
 *
 * @link https://codex.wordpress.org/Template_Tags/wp_list_authors
 *
 * @since 1.2.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param string|array $args {
 *     Optional. Array or string of default arguments.
 *
 *     @type string       $orderby       How to sort the authors. Accepts 'nicename', 'email', 'url', 'registered',
 *                                       'user_nicename', 'user_email', 'user_url', 'user_registered', 'name',
 *                                       'display_name', 'post_count', 'ID', 'meta_value', 'user_login'. Default 'name'.
 *     @type string       $order         Sorting direction for $orderby. Accepts 'ASC', 'DESC'. Default 'ASC'.
 *     @type int          $number        Maximum authors to return or display. Default empty (all authors).
 *     @type bool         $optioncount   Show the count in parenthesis next to the author's name. Default false.
 *     @type bool         $exclude_admin Whether to exclude the 'admin' account, if it exists. Default false.
 *     @type bool         $show_fullname Whether to show the author's full name. Default false.
 *     @type bool         $hide_empty    Whether to hide any authors with no posts. Default true.
 *     @type string       $feed          If not empty, show a link to the author's feed and use this text as the alt
 *                                       parameter of the link. Default empty.
 *     @type string       $feed_image    If not empty, show a link to the author's feed and use this image URL as
 *                                       clickable anchor. Default empty.
 *     @type string       $feed_type     The feed type to link to, such as 'rss2'. Defaults to default feed type.
 *     @type bool         $echo          Whether to output the result or instead return it. Default true.
 *     @type string       $style         If 'list', each author is wrapped in an `<li>` element, otherwise the authors
 *                                       will be separated by commas.
 *     @type bool         $html          Whether to list the items in HTML form or plaintext. Default true.
 *     @type array|string $exclude       Array or comma/space-separated list of author IDs to exclude. Default empty.
 *     @type array|string $include       Array or comma/space-separated list of author IDs to include. Default empty.
 * }
 * @return string|void The output, if echo is set to false.
 */
function wp_list_authors($args = '')
{
}
/**
 * Does this site have more than one author
 *
 * Checks to see if more than one author has published posts.
 *
 * @since 3.2.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @return bool Whether or not we have more than one author
 */
function is_multi_author()
{
}
/**
 * Helper function to clear the cache for number of authors.
 *
 * @since 3.2.0
 * @access private
 */
function __clear_multi_author_cache()
{
}
/**
 * Bookmark Template Functions for usage in Themes
 *
 * @package WordPress
 * @subpackage Template
 */
/**
 * The formatted output of a list of bookmarks.
 *
 * The $bookmarks array must contain bookmark objects and will be iterated over
 * to retrieve the bookmark to be used in the output.
 *
 * The output is formatted as HTML with no way to change that format. However,
 * what is between, before, and after can be changed. The link itself will be
 * HTML.
 *
 * This function is used internally by wp_list_bookmarks() and should not be
 * used by themes.
 *
 * @since 2.1.0
 * @access private
 *
 * @param array $bookmarks List of bookmarks to traverse.
 * @param string|array $args {
 *     Optional. Bookmarks arguments.
 *
 *     @type int|bool $show_updated     Whether to show the time the bookmark was last updated.
 *                                      Accepts 1|true or 0|false. Default 0|false.
 *     @type int|bool $show_description Whether to show the bookmakr description. Accepts 1|true,
 *                                      Accepts 1|true or 0|false. Default 0|false.
 *     @type int|bool $show_images      Whether to show the link image if available. Accepts 1|true
 *                                      or 0|false. Default 1|true.
 *     @type int|bool $show_name        Whether to show link name if available. Accepts 1|true or
 *                                      0|false. Default 0|false.
 *     @type string   $before           The HTML or text to prepend to each bookmark. Default `<li>`.
 *     @type string   $after            The HTML or text to append to each bookmark. Default `</li>`.
 *     @type string   $link_before      The HTML or text to prepend to each bookmark inside the anchor
 *                                      tags. Default empty.
 *     @type string   $link_after       The HTML or text to append to each bookmark inside the anchor
 *                                      tags. Default empty.
 *     @type string   $between          The string for use in between the link, description, and image.
 *                                      Default "\n".
 *     @type int|bool $show_rating      Whether to show the link rating. Accepts 1|true or 0|false.
 *                                      Default 0|false.
 *
 * }
 * @return string Formatted output in HTML
 */
function _walk_bookmarks($bookmarks, $args = '')
{
}
/**
 * Retrieve or echo all of the bookmarks.
 *
 * List of default arguments are as follows:
 *
 * These options define how the Category name will appear before the category
 * links are displayed, if 'categorize' is 1. If 'categorize' is 0, then it will
 * display for only the 'title_li' string and only if 'title_li' is not empty.
 *
 * @since 2.1.0
 *
 * @see _walk_bookmarks()
 *
 * @param string|array $args {
 *     Optional. String or array of arguments to list bookmarks.
 *
 *     @type string   $orderby          How to order the links by. Accepts post fields. Default 'name'.
 *     @type string   $order            Whether to order bookmarks in ascending or descending order.
 *                                      Accepts 'ASC' (ascending) or 'DESC' (descending). Default 'ASC'.
 *     @type int      $limit            Amount of bookmarks to display. Accepts 1+ or -1 for all.
 *                                      Default -1.
 *     @type string   $category         Comma-separated list of category ids to include links from.
 *                                      Default empty.
 *     @type string   $category_name    Category to retrieve links for by name. Default empty.
 *     @type int|bool $hide_invisible   Whether to show or hide links marked as 'invisible'. Accepts
 *                                      1|true or 0|false. Default 1|true.
 *     @type int|bool $show_updated     Whether to display the time the bookmark was last updated.
 *                                      Accepts 1|true or 0|false. Default 0|false.
 *     @type int|bool $echo             Whether to echo or return the formatted bookmarks. Accepts
 *                                      1|true (echo) or 0|false (return). Default 1|true.
 *     @type int|bool $categorize       Whether to show links listed by category or in a single column.
 *                                      Accepts 1|true (by category) or 0|false (one column). Default 1|true.
 *     @type int|bool $show_description Whether to show the bookmark descriptions. Accepts 1|true or 0|false.
 *                                      Default 0|false.
 *     @type string   $title_li         What to show before the links appear. Default 'Bookmarks'.
 *     @type string   $title_before     The HTML or text to prepend to the $title_li string. Default '<h2>'.
 *     @type string   $title_after      The HTML or text to append to the $title_li string. Default '</h2>'.
 *     @type string   $class            The CSS class to use for the $title_li. Default 'linkcat'.
 *     @type string   $category_before  The HTML or text to prepend to $title_before if $categorize is true.
 *                                      String must contain '%id' and '%class' to inherit the category ID and
 *                                      the $class argument used for formatting in themes.
 *                                      Default '<li id="%id" class="%class">'.
 *     @type string   $category_after   The HTML or text to append to $title_after if $categorize is true.
 *                                      Default '</li>'.
 *     @type string   $category_orderby How to order the bookmark category based on term scheme if $categorize
 *                                      is true. Default 'name'.
 *     @type string   $category_order   Whether to order categories in ascending or descending order if
 *                                      $categorize is true. Accepts 'ASC' (ascending) or 'DESC' (descending).
 *                                      Default 'ASC'.
 * }
 * @return string|void Will only return if echo option is set to not echo. Default is not return anything.
 */
function wp_list_bookmarks($args = '')
{
}
/**
 * Link/Bookmark API
 *
 * @package WordPress
 * @subpackage Bookmark
 */
/**
 * Retrieve Bookmark data
 *
 * @since 2.1.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param int|stdClass $bookmark
 * @param string $output Optional. The required return type. One of OBJECT, ARRAY_A, or ARRAY_N, which correspond to
 *                       an stdClass object, an associative array, or a numeric array, respectively. Default OBJECT.
 * @param string $filter Optional, default is 'raw'.
 * @return array|object|null Type returned depends on $output value.
 */
function get_bookmark($bookmark, $output = \OBJECT, $filter = 'raw')
{
}
/**
 * Retrieve single bookmark data item or field.
 *
 * @since 2.3.0
 *
 * @param string $field The name of the data field to return
 * @param int $bookmark The bookmark ID to get field
 * @param string $context Optional. The context of how the field will be used.
 * @return string|WP_Error
 */
function get_bookmark_field($field, $bookmark, $context = 'display')
{
}
/**
 * Retrieves the list of bookmarks
 *
 * Attempts to retrieve from the cache first based on MD5 hash of arguments. If
 * that fails, then the query will be built from the arguments and executed. The
 * results will be stored to the cache.
 *
 * @since 2.1.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param string|array $args {
 *     Optional. String or array of arguments to retrieve bookmarks.
 *
 *     @type string   $orderby        How to order the links by. Accepts post fields. Default 'name'.
 *     @type string   $order          Whether to order bookmarks in ascending or descending order.
 *                                    Accepts 'ASC' (ascending) or 'DESC' (descending). Default 'ASC'.
 *     @type int      $limit          Amount of bookmarks to display. Accepts 1+ or -1 for all.
 *                                    Default -1.
 *     @type string   $category       Comma-separated list of category ids to include links from.
 *                                    Default empty.
 *     @type string   $category_name  Category to retrieve links for by name. Default empty.
 *     @type int|bool $hide_invisible Whether to show or hide links marked as 'invisible'. Accepts
 *                                    1|true or 0|false. Default 1|true.
 *     @type int|bool $show_updated   Whether to display the time the bookmark was last updated.
 *                                    Accepts 1|true or 0|false. Default 0|false.
 *     @type string   $include        Comma-separated list of bookmark IDs to include. Default empty.
 *     @type string   $exclude        Comma-separated list of bookmark IDs to exclude. Default empty.
 * }
 * @return array List of bookmark row objects.
 */
function get_bookmarks($args = '')
{
}
/**
 * Sanitizes all bookmark fields
 *
 * @since 2.3.0
 *
 * @param stdClass|array $bookmark Bookmark row
 * @param string $context Optional, default is 'display'. How to filter the
 *		fields
 * @return stdClass|array Same type as $bookmark but with fields sanitized.
 */
function sanitize_bookmark($bookmark, $context = 'display')
{
}
/**
 * Sanitizes a bookmark field.
 *
 * Sanitizes the bookmark fields based on what the field name is. If the field
 * has a strict value set, then it will be tested for that, else a more generic
 * filtering is applied. After the more strict filter is applied, if the `$context`
 * is 'raw' then the value is immediately return.
 *
 * Hooks exist for the more generic cases. With the 'edit' context, the {@see 'edit_$field'}
 * filter will be called and passed the `$value` and `$bookmark_id` respectively.
 *
 * With the 'db' context, the {@see 'pre_$field'} filter is called and passed the value.
 * The 'display' context is the final context and has the `$field` has the filter name
 * and is passed the `$value`, `$bookmark_id`, and `$context`, respectively.
 *
 * @since 2.3.0
 *
 * @param string $field       The bookmark field.
 * @param mixed  $value       The bookmark field value.
 * @param int    $bookmark_id Bookmark ID.
 * @param string $context     How to filter the field value. Accepts 'raw', 'edit', 'attribute',
 *                            'js', 'db', or 'display'
 * @return mixed The filtered value.
 */
function sanitize_bookmark_field($field, $value, $bookmark_id, $context)
{
}
/**
 * Deletes the bookmark cache.
 *
 * @since 2.7.0
 *
 * @param int $bookmark_id Bookmark ID.
 */
function clean_bookmark_cache($bookmark_id)
{
}
/**
 * Object Cache API
 *
 * @link https://codex.wordpress.org/Class_Reference/WP_Object_Cache
 *
 * @package WordPress
 * @subpackage Cache
 */
/**
 * Adds data to the cache, if the cache key doesn't already exist.
 *
 * @since 2.0.0
 *
 * @see WP_Object_Cache::add()
 * @global WP_Object_Cache $wp_object_cache Object cache global instance.
 *
 * @param int|string $key    The cache key to use for retrieval later.
 * @param mixed      $data   The data to add to the cache.
 * @param string     $group  Optional. The group to add the cache to. Enables the same key
 *                           to be used across groups. Default empty.
 * @param int        $expire Optional. When the cache data should expire, in seconds.
 *                           Default 0 (no expiration).
 * @return bool False if cache key and group already exist, true on success.
 */
function wp_cache_add($key, $data, $group = '', $expire = 0)
{
}
/**
 * Closes the cache.
 *
 * This function has ceased to do anything since WordPress 2.5. The
 * functionality was removed along with the rest of the persistent cache.
 *
 * This does not mean that plugins can't implement this function when they need
 * to make sure that the cache is cleaned up after WordPress no longer needs it.
 *
 * @since 2.0.0
 *
 * @return true Always returns true.
 */
function wp_cache_close()
{
}
/**
 * Decrements numeric cache item's value.
 *
 * @since 3.3.0
 *
 * @see WP_Object_Cache::decr()
 * @global WP_Object_Cache $wp_object_cache Object cache global instance.
 *
 * @param int|string $key    The cache key to decrement.
 * @param int        $offset Optional. The amount by which to decrement the item's value. Default 1.
 * @param string     $group  Optional. The group the key is in. Default empty.
 * @return false|int False on failure, the item's new value on success.
 */
function wp_cache_decr($key, $offset = 1, $group = '')
{
}
/**
 * Removes the cache contents matching key and group.
 *
 * @since 2.0.0
 *
 * @see WP_Object_Cache::delete()
 * @global WP_Object_Cache $wp_object_cache Object cache global instance.
 *
 * @param int|string $key   What the contents in the cache are called.
 * @param string     $group Optional. Where the cache contents are grouped. Default empty.
 * @return bool True on successful removal, false on failure.
 */
function wp_cache_delete($key, $group = '')
{
}
/**
 * Removes all cache items.
 *
 * @since 2.0.0
 *
 * @see WP_Object_Cache::flush()
 * @global WP_Object_Cache $wp_object_cache Object cache global instance.
 *
 * @return bool False on failure, true on success
 */
function wp_cache_flush()
{
}
/**
 * Retrieves the cache contents from the cache by key and group.
 *
 * @since 2.0.0
 *
 * @see WP_Object_Cache::get()
 * @global WP_Object_Cache $wp_object_cache Object cache global instance.
 *
 * @param int|string  $key    The key under which the cache contents are stored.
 * @param string      $group  Optional. Where the cache contents are grouped. Default empty.
 * @param bool        $force  Optional. Whether to force an update of the local cache from the persistent
 *                            cache. Default false.
 * @param bool        $found  Optional. Whether the key was found in the cache (passed by reference).
 *                            Disambiguates a return of false, a storable value. Default null.
 * @return bool|mixed False on failure to retrieve contents or the cache
 *		              contents on success
 */
function wp_cache_get($key, $group = '', $force = \false, &$found = \null)
{
}
/**
 * Increment numeric cache item's value
 *
 * @since 3.3.0
 *
 * @see WP_Object_Cache::incr()
 * @global WP_Object_Cache $wp_object_cache Object cache global instance.
 *
 * @param int|string $key    The key for the cache contents that should be incremented.
 * @param int        $offset Optional. The amount by which to increment the item's value. Default 1.
 * @param string     $group  Optional. The group the key is in. Default empty.
 * @return false|int False on failure, the item's new value on success.
 */
function wp_cache_incr($key, $offset = 1, $group = '')
{
}
/**
 * Sets up Object Cache Global and assigns it.
 *
 * @since 2.0.0
 *
 * @global WP_Object_Cache $wp_object_cache
 */
function wp_cache_init()
{
}
/**
 * Replaces the contents of the cache with new data.
 *
 * @since 2.0.0
 *
 * @see WP_Object_Cache::replace()
 * @global WP_Object_Cache $wp_object_cache Object cache global instance.
 *
 * @param int|string $key    The key for the cache data that should be replaced.
 * @param mixed      $data   The new data to store in the cache.
 * @param string     $group  Optional. The group for the cache data that should be replaced.
 *                           Default empty.
 * @param int        $expire Optional. When to expire the cache contents, in seconds.
 *                           Default 0 (no expiration).
 * @return bool False if original value does not exist, true if contents were replaced
 */
function wp_cache_replace($key, $data, $group = '', $expire = 0)
{
}
/**
 * Saves the data to the cache.
 *
 * Differs from wp_cache_add() and wp_cache_replace() in that it will always write data.
 *
 * @since 2.0.0
 *
 * @see WP_Object_Cache::set()
 * @global WP_Object_Cache $wp_object_cache Object cache global instance.
 *
 * @param int|string $key    The cache key to use for retrieval later.
 * @param mixed      $data   The contents to store in the cache.
 * @param string     $group  Optional. Where to group the cache contents. Enables the same key
 *                           to be used across groups. Default empty.
 * @param int        $expire Optional. When to expire the cache contents, in seconds.
 *                           Default 0 (no expiration).
 * @return bool False on failure, true on success
 */
function wp_cache_set($key, $data, $group = '', $expire = 0)
{
}
/**
 * Switches the internal blog ID.
 *
 * This changes the blog id used to create keys in blog specific groups.
 *
 * @since 3.5.0
 *
 * @see WP_Object_Cache::switch_to_blog()
 * @global WP_Object_Cache $wp_object_cache Object cache global instance.
 *
 * @param int $blog_id Site ID.
 */
function wp_cache_switch_to_blog($blog_id)
{
}
/**
 * Adds a group or set of groups to the list of global groups.
 *
 * @since 2.6.0
 *
 * @see WP_Object_Cache::add_global_groups()
 * @global WP_Object_Cache $wp_object_cache Object cache global instance.
 *
 * @param string|array $groups A group or an array of groups to add.
 */
function wp_cache_add_global_groups($groups)
{
}
/**
 * Adds a group or set of groups to the list of non-persistent groups.
 *
 * @since 2.6.0
 *
 * @param string|array $groups A group or an array of groups to add.
 */
function wp_cache_add_non_persistent_groups($groups)
{
}
/**
 * Reset internal cache keys and structures.
 *
 * If the cache back end uses global blog or site IDs as part of its cache keys,
 * this function instructs the back end to reset those keys and perform any cleanup
 * since blog or site IDs have changed since cache init.
 *
 * This function is deprecated. Use wp_cache_switch_to_blog() instead of this
 * function when preparing the cache for a blog switch. For clearing the cache
 * during unit tests, consider using wp_cache_init(). wp_cache_init() is not
 * recommended outside of unit tests as the performance penalty for using it is
 * high.
 *
 * @since 2.6.0
 * @deprecated 3.5.0 WP_Object_Cache::reset()
 * @see WP_Object_Cache::reset()
 *
 * @global WP_Object_Cache $wp_object_cache Object cache global instance.
 */
function wp_cache_reset()
{
}
/**
 * Canonical API to handle WordPress Redirecting
 *
 * Based on "Permalink Redirect" from Scott Yang and "Enforce www. Preference"
 * by Mark Jaquith
 *
 * @package WordPress
 * @since 2.3.0
 */
/**
 * Redirects incoming links to the proper URL based on the site url.
 *
 * Search engines consider www.somedomain.com and somedomain.com to be two
 * different URLs when they both go to the same location. This SEO enhancement
 * prevents penalty for duplicate content by redirecting all incoming links to
 * one or the other.
 *
 * Prevents redirection for feeds, trackbacks, searches, and
 * admin URLs. Does not redirect on non-pretty-permalink-supporting IIS 7+,
 * page/post previews, WP admin, Trackbacks, robots.txt, searches, or on POST
 * requests.
 *
 * Will also attempt to find the correct link when a user enters a URL that does
 * not exist based on exact WordPress query. Will instead try to parse the URL
 * or query in an attempt to figure the correct page to go to.
 *
 * @since 2.3.0
 *
 * @global WP_Rewrite $wp_rewrite
 * @global bool $is_IIS
 * @global WP_Query $wp_query
 * @global wpdb $wpdb WordPress database abstraction object.
 * @global WP $wp Current WordPress environment instance.
 *
 * @param string $requested_url Optional. The URL that was requested, used to
 *		figure if redirect is needed.
 * @param bool $do_redirect Optional. Redirect to the new URL.
 * @return string|void The string of the URL, if redirect needed.
 */
function redirect_canonical($requested_url = \null, $do_redirect = \true)
{
}
/**
 * Removes arguments from a query string if they are not present in a URL
 * DO NOT use this in plugin code.
 *
 * @since 3.4.0
 * @access private
 *
 * @param string $query_string
 * @param array $args_to_check
 * @param string $url
 * @return string The altered query string
 */
function _remove_qs_args_if_not_in_url($query_string, array $args_to_check, $url)
{
}
/**
 * Strips the #fragment from a URL, if one is present.
 *
 * @since 4.4.0
 *
 * @param string $url The URL to strip.
 * @return string The altered URL.
 */
function strip_fragment_from_url($url)
{
}
/**
 * Attempts to guess the correct URL based on query vars
 *
 * @since 2.3.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @return false|string The correct URL if one is found. False on failure.
 */
function redirect_guess_404_permalink()
{
}
/**
 * Redirects a variety of shorthand URLs to the admin.
 *
 * If a user visits example.com/admin, they'll be redirected to /wp-admin.
 * Visiting /login redirects to /wp-login.php, and so on.
 *
 * @since 3.4.0
 *
 * @global WP_Rewrite $wp_rewrite
 */
function wp_redirect_admin_locations()
{
}
/**
 * Core User Role & Capabilities API
 *
 * @package WordPress
 * @subpackage Users
 */
/**
 * Map meta capabilities to primitive capabilities.
 *
 * This does not actually compare whether the user ID has the actual capability,
 * just what the capability or capabilities are. Meta capability list value can
 * be 'delete_user', 'edit_user', 'remove_user', 'promote_user', 'delete_post',
 * 'delete_page', 'edit_post', 'edit_page', 'read_post', or 'read_page'.
 *
 * @since 2.0.0
 *
 * @global array $post_type_meta_caps Used to get post type meta capabilities.
 *
 * @param string $cap       Capability name.
 * @param int    $user_id   User ID.
 * @param int    $object_id Optional. ID of the specific object to check against if `$cap` is a "meta" cap.
 *                          "Meta" capabilities, e.g. 'edit_post', 'edit_user', etc., are capabilities used
 *                          by map_meta_cap() to map to other "primitive" capabilities, e.g. 'edit_posts',
 *                          'edit_others_posts', etc. The parameter is accessed via func_get_args().
 * @return array Actual capabilities for meta capability.
 */
function map_meta_cap($cap, $user_id)
{
}
/**
 * Whether the current user has a specific capability.
 *
 * While checking against particular roles in place of a capability is supported
 * in part, this practice is discouraged as it may produce unreliable results.
 *
 * Note: Will always return true if the current user is a super admin, unless specifically denied.
 *
 * @since 2.0.0
 *
 * @see WP_User::has_cap()
 * @see map_meta_cap()
 *
 * @param string $capability Capability name.
 * @param int    $object_id  Optional. ID of the specific object to check against if `$capability` is a "meta" cap.
 *                           "Meta" capabilities, e.g. 'edit_post', 'edit_user', etc., are capabilities used
 *                           by map_meta_cap() to map to other "primitive" capabilities, e.g. 'edit_posts',
 *                           'edit_others_posts', etc. Accessed via func_get_args() and passed to WP_User::has_cap(),
 *                           then map_meta_cap().
 * @return bool Whether the current user has the given capability. If `$capability` is a meta cap and `$object_id` is
 *              passed, whether the current user has the given meta capability for the given object.
 */
function current_user_can($capability)
{
}
/**
 * Whether the current user has a specific capability for a given site.
 *
 * @since 3.0.0
 *
 * @param int    $blog_id    Site ID.
 * @param string $capability Capability name.
 * @return bool Whether the user has the given capability.
 */
function current_user_can_for_blog($blog_id, $capability)
{
}
/**
 * Whether the author of the supplied post has a specific capability.
 *
 * @since 2.9.0
 *
 * @param int|WP_Post $post       Post ID or post object.
 * @param string      $capability Capability name.
 * @return bool Whether the post author has the given capability.
 */
function author_can($post, $capability)
{
}
/**
 * Whether a particular user has a specific capability.
 *
 * @since 3.1.0
 *
 * @param int|WP_User $user       User ID or object.
 * @param string      $capability Capability name.
 * @return bool Whether the user has the given capability.
 */
function user_can($user, $capability)
{
}
/**
 * Retrieves the global WP_Roles instance and instantiates it if necessary.
 *
 * @since 4.3.0
 *
 * @global WP_Roles $wp_roles WP_Roles global instance.
 *
 * @return WP_Roles WP_Roles global instance if not already instantiated.
 */
function wp_roles()
{
}
/**
 * Retrieve role object.
 *
 * @since 2.0.0
 *
 * @param string $role Role name.
 * @return WP_Role|null WP_Role object if found, null if the role does not exist.
 */
function get_role($role)
{
}
/**
 * Add role, if it does not exist.
 *
 * @since 2.0.0
 *
 * @param string $role Role name.
 * @param string $display_name Display name for role.
 * @param array $capabilities List of capabilities, e.g. array( 'edit_posts' => true, 'delete_posts' => false );
 * @return WP_Role|null WP_Role object if role is added, null if already exists.
 */
function add_role($role, $display_name, $capabilities = array())
{
}
/**
 * Remove role, if it exists.
 *
 * @since 2.0.0
 *
 * @param string $role Role name.
 */
function remove_role($role)
{
}
/**
 * Retrieve a list of super admins.
 *
 * @since 3.0.0
 *
 * @global array $super_admins
 *
 * @return array List of super admin logins
 */
function get_super_admins()
{
}
/**
 * Determine if user is a site admin.
 *
 * @since 3.0.0
 *
 * @param int $user_id (Optional) The ID of a user. Defaults to the current user.
 * @return bool True if the user is a site admin.
 */
function is_super_admin($user_id = \false)
{
}
/**
 * Grants Super Admin privileges.
 *
 * @since 3.0.0
 *
 * @global array $super_admins
 *
 * @param int $user_id ID of the user to be granted Super Admin privileges.
 * @return bool True on success, false on failure. This can fail when the user is
 *              already a super admin or when the `$super_admins` global is defined.
 */
function grant_super_admin($user_id)
{
}
/**
 * Revokes Super Admin privileges.
 *
 * @since 3.0.0
 *
 * @global array $super_admins
 *
 * @param int $user_id ID of the user Super Admin privileges to be revoked from.
 * @return bool True on success, false on failure. This can fail when the user's email
 *              is the network admin email or when the `$super_admins` global is defined.
 */
function revoke_super_admin($user_id)
{
}
/**
 * Filters the user capabilities to grant the 'install_languages' capability as necessary.
 *
 * A user must have at least one out of the 'update_core', 'install_plugins', and
 * 'install_themes' capabilities to qualify for 'install_languages'.
 *
 * @since 4.9.0
 *
 * @param array $allcaps An array of all the user's capabilities.
 * @return array Filtered array of the user's capabilities.
 */
function wp_maybe_grant_install_languages_cap($allcaps)
{
}
/**
 * Taxonomy API: Core category-specific template tags
 *
 * @package WordPress
 * @subpackage Template
 * @since 1.2.0
 */
/**
 * Retrieve category link URL.
 *
 * @since 1.0.0
 * @see get_term_link()
 *
 * @param int|object $category Category ID or object.
 * @return string Link on success, empty string if category does not exist.
 */
function get_category_link($category)
{
}
/**
 * Retrieve category parents with separator.
 *
 * @since 1.2.0
 * @since 4.8.0 The `$visited` parameter was deprecated and renamed to `$deprecated`.
 *
 * @param int $id Category ID.
 * @param bool $link Optional, default is false. Whether to format with link.
 * @param string $separator Optional, default is '/'. How to separate categories.
 * @param bool $nicename Optional, default is false. Whether to use nice name for display.
 * @param array $deprecated Not used.
 * @return string|WP_Error A list of category parents on success, WP_Error on failure.
 */
function get_category_parents($id, $link = \false, $separator = '/', $nicename = \false, $deprecated = array())
{
}
/**
 * Retrieve post categories.
 *
 * This tag may be used outside The Loop by passing a post id as the parameter.
 *
 * Note: This function only returns results from the default "category" taxonomy.
 * For custom taxonomies use get_the_terms().
 *
 * @since 0.71
 *
 * @param int $id Optional, default to current post ID. The post ID.
 * @return array Array of WP_Term objects, one for each category assigned to the post.
 */
function get_the_category($id = \false)
{
}
/**
 * Retrieve category name based on category ID.
 *
 * @since 0.71
 *
 * @param int $cat_ID Category ID.
 * @return string|WP_Error Category name on success, WP_Error on failure.
 */
function get_the_category_by_ID($cat_ID)
{
}
/**
 * Retrieve category list for a post in either HTML list or custom format.
 *
 * @since 1.5.1
 *
 * @global WP_Rewrite $wp_rewrite
 *
 * @param string $separator Optional. Separator between the categories. By default, the links are placed
 *                          in an unordered list. An empty string will result in the default behavior.
 * @param string $parents Optional. How to display the parents.
 * @param int $post_id Optional. Post ID to retrieve categories.
 * @return string
 */
function get_the_category_list($separator = '', $parents = '', $post_id = \false)
{
}
/**
 * Check if the current post is within any of the given categories.
 *
 * The given categories are checked against the post's categories' term_ids, names and slugs.
 * Categories given as integers will only be checked against the post's categories' term_ids.
 *
 * Prior to v2.5 of WordPress, category names were not supported.
 * Prior to v2.7, category slugs were not supported.
 * Prior to v2.7, only one category could be compared: in_category( $single_category ).
 * Prior to v2.7, this function could only be used in the WordPress Loop.
 * As of 2.7, the function can be used anywhere if it is provided a post ID or post object.
 *
 * @since 1.2.0
 *
 * @param int|string|array $category Category ID, name or slug, or array of said.
 * @param int|object $post Optional. Post to check instead of the current post. (since 2.7.0)
 * @return bool True if the current post is in any of the given categories.
 */
function in_category($category, $post = \null)
{
}
/**
 * Display category list for a post in either HTML list or custom format.
 *
 * @since 0.71
 *
 * @param string $separator Optional. Separator between the categories. By default, the links are placed
 *                          in an unordered list. An empty string will result in the default behavior.
 * @param string $parents Optional. How to display the parents.
 * @param int $post_id Optional. Post ID to retrieve categories.
 */
function the_category($separator = '', $parents = '', $post_id = \false)
{
}
/**
 * Retrieve category description.
 *
 * @since 1.0.0
 *
 * @param int $category Optional. Category ID. Will use global category ID by default.
 * @return string Category description, available.
 */
function category_description($category = 0)
{
}
/**
 * Display or retrieve the HTML dropdown list of categories.
 *
 * The 'hierarchical' argument, which is disabled by default, will override the
 * depth argument, unless it is true. When the argument is false, it will
 * display all of the categories. When it is enabled it will use the value in
 * the 'depth' argument.
 *
 * @since 2.1.0
 * @since 4.2.0 Introduced the `value_field` argument.
 * @since 4.6.0 Introduced the `required` argument.
 *
 * @param string|array $args {
 *     Optional. Array or string of arguments to generate a categories drop-down element. See WP_Term_Query::__construct()
 *     for information on additional accepted arguments.
 *
 *     @type string       $show_option_all   Text to display for showing all categories. Default empty.
 *     @type string       $show_option_none  Text to display for showing no categories. Default empty.
 *     @type string       $option_none_value Value to use when no category is selected. Default empty.
 *     @type string       $orderby           Which column to use for ordering categories. See get_terms() for a list
 *                                           of accepted values. Default 'id' (term_id).
 *     @type bool         $pad_counts        See get_terms() for an argument description. Default false.
 *     @type bool|int     $show_count        Whether to include post counts. Accepts 0, 1, or their bool equivalents.
 *                                           Default 0.
 *     @type bool|int     $echo              Whether to echo or return the generated markup. Accepts 0, 1, or their
 *                                           bool equivalents. Default 1.
 *     @type bool|int     $hierarchical      Whether to traverse the taxonomy hierarchy. Accepts 0, 1, or their bool
 *                                           equivalents. Default 0.
 *     @type int          $depth             Maximum depth. Default 0.
 *     @type int          $tab_index         Tab index for the select element. Default 0 (no tabindex).
 *     @type string       $name              Value for the 'name' attribute of the select element. Default 'cat'.
 *     @type string       $id                Value for the 'id' attribute of the select element. Defaults to the value
 *                                           of `$name`.
 *     @type string       $class             Value for the 'class' attribute of the select element. Default 'postform'.
 *     @type int|string   $selected          Value of the option that should be selected. Default 0.
 *     @type string       $value_field       Term field that should be used to populate the 'value' attribute
 *                                           of the option elements. Accepts any valid term field: 'term_id', 'name',
 *                                           'slug', 'term_group', 'term_taxonomy_id', 'taxonomy', 'description',
 *                                           'parent', 'count'. Default 'term_id'.
 *     @type string|array $taxonomy          Name of the category or categories to retrieve. Default 'category'.
 *     @type bool         $hide_if_empty     True to skip generating markup if no categories are found.
 *                                           Default false (create select element even if no categories are found).
 *     @type bool         $required          Whether the `<select>` element should have the HTML5 'required' attribute.
 *                                           Default false.
 * }
 * @return string HTML content only if 'echo' argument is 0.
 */
function wp_dropdown_categories($args = '')
{
}
/**
 * Display or retrieve the HTML list of categories.
 *
 * @since 2.1.0
 * @since 4.4.0 Introduced the `hide_title_if_empty` and `separator` arguments. The `current_category` argument was modified to
 *              optionally accept an array of values.
 *
 * @param string|array $args {
 *     Array of optional arguments.
 *
 *     @type int          $child_of              Term ID to retrieve child terms of. See get_terms(). Default 0.
 *     @type int|array    $current_category      ID of category, or array of IDs of categories, that should get the
 *                                               'current-cat' class. Default 0.
 *     @type int          $depth                 Category depth. Used for tab indentation. Default 0.
 *     @type bool|int     $echo                  True to echo markup, false to return it. Default 1.
 *     @type array|string $exclude               Array or comma/space-separated string of term IDs to exclude.
 *                                               If `$hierarchical` is true, descendants of `$exclude` terms will also
 *                                               be excluded; see `$exclude_tree`. See get_terms().
 *                                               Default empty string.
 *     @type array|string $exclude_tree          Array or comma/space-separated string of term IDs to exclude, along
 *                                               with their descendants. See get_terms(). Default empty string.
 *     @type string       $feed                  Text to use for the feed link. Default 'Feed for all posts filed
 *                                               under [cat name]'.
 *     @type string       $feed_image            URL of an image to use for the feed link. Default empty string.
 *     @type string       $feed_type             Feed type. Used to build feed link. See get_term_feed_link().
 *                                               Default empty string (default feed).
 *     @type bool|int     $hide_empty            Whether to hide categories that don't have any posts attached to them.
 *                                               Default 1.
 *     @type bool         $hide_title_if_empty   Whether to hide the `$title_li` element if there are no terms in
 *                                               the list. Default false (title will always be shown).
 *     @type bool         $hierarchical          Whether to include terms that have non-empty descendants.
 *                                               See get_terms(). Default true.
 *     @type string       $order                 Which direction to order categories. Accepts 'ASC' or 'DESC'.
 *                                               Default 'ASC'.
 *     @type string       $orderby               The column to use for ordering categories. Default 'name'.
 *     @type string       $separator             Separator between links. Default '<br />'.
 *     @type bool|int     $show_count            Whether to show how many posts are in the category. Default 0.
 *     @type string       $show_option_all       Text to display for showing all categories. Default empty string.
 *     @type string       $show_option_none      Text to display for the 'no categories' option.
 *                                               Default 'No categories'.
 *     @type string       $style                 The style used to display the categories list. If 'list', categories
 *                                               will be output as an unordered list. If left empty or another value,
 *                                               categories will be output separated by `<br>` tags. Default 'list'.
 *     @type string       $taxonomy              Taxonomy name. Default 'category'.
 *     @type string       $title_li              Text to use for the list title `<li>` element. Pass an empty string
 *                                               to disable. Default 'Categories'.
 *     @type bool|int     $use_desc_for_title    Whether to use the category description as the title attribute.
 *                                               Default 1.
 * }
 * @return false|string HTML content only if 'echo' argument is 0.
 */
function wp_list_categories($args = '')
{
}
/**
 * Display tag cloud.
 *
 * The text size is set by the 'smallest' and 'largest' arguments, which will
 * use the 'unit' argument value for the CSS text size unit. The 'format'
 * argument can be 'flat' (default), 'list', or 'array'. The flat value for the
 * 'format' argument will separate tags with spaces. The list value for the
 * 'format' argument will format the tags in a UL HTML list. The array value for
 * the 'format' argument will return in PHP array type format.
 *
 * The 'orderby' argument will accept 'name' or 'count' and defaults to 'name'.
 * The 'order' is the direction to sort, defaults to 'ASC' and can be 'DESC'.
 *
 * The 'number' argument is how many tags to return. By default, the limit will
 * be to return the top 45 tags in the tag cloud list.
 *
 * The 'topic_count_text' argument is a nooped plural from _n_noop() to generate the
 * text for the tag link count.
 *
 * The 'topic_count_text_callback' argument is a function, which given the count
 * of the posts with that tag returns a text for the tag link count.
 *
 * The 'post_type' argument is used only when 'link' is set to 'edit'. It determines the post_type
 * passed to edit.php for the popular tags edit links.
 *
 * The 'exclude' and 'include' arguments are used for the get_tags() function. Only one
 * should be used, because only one will be used and the other ignored, if they are both set.
 *
 * @since 2.3.0
 * @since 4.8.0 Added the `show_count` argument.
 *
 * @param array|string|null $args Optional. Override default arguments.
 * @return void|array Generated tag cloud, only if no failures and 'array' is set for the 'format' argument.
 *                    Otherwise, this function outputs the tag cloud.
 */
function wp_tag_cloud($args = '')
{
}
/**
 * Default topic count scaling for tag links.
 *
 * @since 2.9.0
 *
 * @param int $count Number of posts with that tag.
 * @return int Scaled count.
 */
function default_topic_count_scale($count)
{
}
/**
 * Generates a tag cloud (heatmap) from provided data.
 *
 * @todo Complete functionality.
 * @since 2.3.0
 * @since 4.8.0 Added the `show_count` argument.
 *
 * @param array $tags List of tags.
 * @param string|array $args {
 *     Optional. Array of string of arguments for generating a tag cloud.
 *
 *     @type int      $smallest                   Smallest font size used to display tags. Paired
 *                                                with the value of `$unit`, to determine CSS text
 *                                                size unit. Default 8 (pt).
 *     @type int      $largest                    Largest font size used to display tags. Paired
 *                                                with the value of `$unit`, to determine CSS text
 *                                                size unit. Default 22 (pt).
 *     @type string   $unit                       CSS text size unit to use with the `$smallest`
 *                                                and `$largest` values. Accepts any valid CSS text
 *                                                size unit. Default 'pt'.
 *     @type int      $number                     The number of tags to return. Accepts any
 *                                                positive integer or zero to return all.
 *                                                Default 0.
 *     @type string   $format                     Format to display the tag cloud in. Accepts 'flat'
 *                                                (tags separated with spaces), 'list' (tags displayed
 *                                                in an unordered list), or 'array' (returns an array).
 *                                                Default 'flat'.
 *     @type string   $separator                  HTML or text to separate the tags. Default "\n" (newline).
 *     @type string   $orderby                    Value to order tags by. Accepts 'name' or 'count'.
 *                                                Default 'name'. The {@see 'tag_cloud_sort'} filter
 *                                                can also affect how tags are sorted.
 *     @type string   $order                      How to order the tags. Accepts 'ASC' (ascending),
 *                                                'DESC' (descending), or 'RAND' (random). Default 'ASC'.
 *     @type int|bool $filter                     Whether to enable filtering of the final output
 *                                                via {@see 'wp_generate_tag_cloud'}. Default 1|true.
 *     @type string   $topic_count_text           Nooped plural text from _n_noop() to supply to
 *                                                tag counts. Default null.
 *     @type callable $topic_count_text_callback  Callback used to generate nooped plural text for
 *                                                tag counts based on the count. Default null.
 *     @type callable $topic_count_scale_callback Callback used to determine the tag count scaling
 *                                                value. Default default_topic_count_scale().
 *     @type bool|int $show_count                 Whether to display the tag counts. Default 0. Accepts
 *                                                0, 1, or their bool equivalents.
 * }
 * @return string|array Tag cloud as a string or an array, depending on 'format' argument.
 */
function wp_generate_tag_cloud($tags, $args = '')
{
}
/**
 * Serves as a callback for comparing objects based on name.
 *
 * Used with `uasort()`.
 *
 * @since 3.1.0
 * @access private
 *
 * @param object $a The first object to compare.
 * @param object $b The second object to compare.
 * @return int Negative number if `$a->name` is less than `$b->name`, zero if they are equal,
 *             or greater than zero if `$a->name` is greater than `$b->name`.
 */
function _wp_object_name_sort_cb($a, $b)
{
}
/**
 * Serves as a callback for comparing objects based on count.
 *
 * Used with `uasort()`.
 *
 * @since 3.1.0
 * @access private
 *
 * @param object $a The first object to compare.
 * @param object $b The second object to compare.
 * @return bool Whether the count value for `$a` is greater than the count value for `$b`.
 */
function _wp_object_count_sort_cb($a, $b)
{
}
//
// Helper functions
//
/**
 * Retrieve HTML list content for category list.
 *
 * @uses Walker_Category to create HTML list content.
 * @since 2.1.0
 * @see Walker_Category::walk() for parameters and return description.
 * @return string
 */
function walk_category_tree()
{
}
/**
 * Retrieve HTML dropdown (select) content for category list.
 *
 * @uses Walker_CategoryDropdown to create HTML dropdown content.
 * @since 2.1.0
 * @see Walker_CategoryDropdown::walk() for parameters and return description.
 * @return string
 */
function walk_category_dropdown_tree()
{
}
//
// Tags
//
/**
 * Retrieve the link to the tag.
 *
 * @since 2.3.0
 * @see get_term_link()
 *
 * @param int|object $tag Tag ID or object.
 * @return string Link on success, empty string if tag does not exist.
 */
function get_tag_link($tag)
{
}
/**
 * Retrieve the tags for a post.
 *
 * @since 2.3.0
 *
 * @param int $id Post ID.
 * @return array|false|WP_Error Array of tag objects on success, false on failure.
 */
function get_the_tags($id = 0)
{
}
/**
 * Retrieve the tags for a post formatted as a string.
 *
 * @since 2.3.0
 *
 * @param string $before Optional. Before tags.
 * @param string $sep Optional. Between tags.
 * @param string $after Optional. After tags.
 * @param int $id Optional. Post ID. Defaults to the current post.
 * @return string|false|WP_Error A list of tags on success, false if there are no terms, WP_Error on failure.
 */
function get_the_tag_list($before = '', $sep = '', $after = '', $id = 0)
{
}
/**
 * Retrieve the tags for a post.
 *
 * @since 2.3.0
 *
 * @param string $before Optional. Before list.
 * @param string $sep Optional. Separate items using this.
 * @param string $after Optional. After list.
 */
function the_tags($before = \null, $sep = ', ', $after = '')
{
}
/**
 * Retrieve tag description.
 *
 * @since 2.8.0
 *
 * @param int $tag Optional. Tag ID. Will use global tag ID by default.
 * @return string Tag description, available.
 */
function tag_description($tag = 0)
{
}
/**
 * Retrieve term description.
 *
 * @since 2.8.0
 * @since 4.9.2 The `$taxonomy` parameter was deprecated.
 *
 * @param int  $term       Optional. Term ID. Will use global term ID by default.
 * @param null $deprecated Deprecated argument.
 * @return string Term description, available.
 */
function term_description($term = 0, $deprecated = \null)
{
}
/**
 * Retrieve the terms of the taxonomy that are attached to the post.
 *
 * @since 2.5.0
 *
 * @param int|object $post Post ID or object.
 * @param string $taxonomy Taxonomy name.
 * @return array|false|WP_Error Array of WP_Term objects on success, false if there are no terms
 *                              or the post does not exist, WP_Error on failure.
 */
function get_the_terms($post, $taxonomy)
{
}
/**
 * Retrieve a post's terms as a list with specified format.
 *
 * @since 2.5.0
 *
 * @param int $id Post ID.
 * @param string $taxonomy Taxonomy name.
 * @param string $before Optional. Before list.
 * @param string $sep Optional. Separate items using this.
 * @param string $after Optional. After list.
 * @return string|false|WP_Error A list of terms on success, false if there are no terms, WP_Error on failure.
 */
function get_the_term_list($id, $taxonomy, $before = '', $sep = '', $after = '')
{
}
/**
 * Retrieve term parents with separator.
 *
 * @since 4.8.0
 *
 * @param int     $term_id  Term ID.
 * @param string  $taxonomy Taxonomy name.
 * @param string|array $args {
 *     Array of optional arguments.
 *
 *     @type string $format    Use term names or slugs for display. Accepts 'name' or 'slug'.
 *                             Default 'name'.
 *     @type string $separator Separator for between the terms. Default '/'.
 *     @type bool   $link      Whether to format as a link. Default true.
 *     @type bool   $inclusive Include the term to get the parents for. Default true.
 * }
 * @return string|WP_Error A list of term parents on success, WP_Error or empty string on failure.
 */
function get_term_parents_list($term_id, $taxonomy, $args = array())
{
}
/**
 * Display the terms in a list.
 *
 * @since 2.5.0
 *
 * @param int $id Post ID.
 * @param string $taxonomy Taxonomy name.
 * @param string $before Optional. Before list.
 * @param string $sep Optional. Separate items using this.
 * @param string $after Optional. After list.
 * @return false|void False on WordPress error.
 */
function the_terms($id, $taxonomy, $before = '', $sep = ', ', $after = '')
{
}
/**
 * Check if the current post has any of given category.
 *
 * @since 3.1.0
 *
 * @param string|int|array $category Optional. The category name/term_id/slug or array of them to check for.
 * @param int|object $post Optional. Post to check instead of the current post.
 * @return bool True if the current post has any of the given categories (or any category, if no category specified).
 */
function has_category($category = '', $post = \null)
{
}
/**
 * Check if the current post has any of given tags.
 *
 * The given tags are checked against the post's tags' term_ids, names and slugs.
 * Tags given as integers will only be checked against the post's tags' term_ids.
 * If no tags are given, determines if post has any tags.
 *
 * Prior to v2.7 of WordPress, tags given as integers would also be checked against the post's tags' names and slugs (in addition to term_ids)
 * Prior to v2.7, this function could only be used in the WordPress Loop.
 * As of 2.7, the function can be used anywhere if it is provided a post ID or post object.
 *
 * @since 2.6.0
 *
 * @param string|int|array $tag Optional. The tag name/term_id/slug or array of them to check for.
 * @param int|object $post Optional. Post to check instead of the current post. (since 2.7.0)
 * @return bool True if the current post has any of the given tags (or any tag, if no tag specified).
 */
function has_tag($tag = '', $post = \null)
{
}
/**
 * Check if the current post has any of given terms.
 *
 * The given terms are checked against the post's terms' term_ids, names and slugs.
 * Terms given as integers will only be checked against the post's terms' term_ids.
 * If no terms are given, determines if post has any terms.
 *
 * @since 3.1.0
 *
 * @param string|int|array $term Optional. The term name/term_id/slug or array of them to check for.
 * @param string $taxonomy Taxonomy name
 * @param int|object $post Optional. Post to check instead of the current post.
 * @return bool True if the current post has any of the given tags (or any tag, if no tag specified).
 */
function has_term($term = '', $taxonomy = '', $post = \null)
{
}
/**
 * Taxonomy API: Core category-specific functionality
 *
 * @package WordPress
 * @subpackage Taxonomy
 */
/**
 * Retrieve list of category objects.
 *
 * If you change the type to 'link' in the arguments, then the link categories
 * will be returned instead. Also all categories will be updated to be backward
 * compatible with pre-2.3 plugins and themes.
 *
 * @since 2.1.0
 * @see get_terms() Type of arguments that can be changed.
 *
 * @param string|array $args {
 *     Optional. Arguments to retrieve categories. See get_terms() for additional options.
 *
 *     @type string $taxonomy Taxonomy to retrieve terms for. In this case, default 'category'.
 * }
 * @return array List of categories.
 */
function get_categories($args = '')
{
}
/**
 * Retrieves category data given a category ID or category object.
 *
 * If you pass the $category parameter an object, which is assumed to be the
 * category row object retrieved the database. It will cache the category data.
 *
 * If you pass $category an integer of the category ID, then that category will
 * be retrieved from the database, if it isn't already cached, and pass it back.
 *
 * If you look at get_term(), then both types will be passed through several
 * filters and finally sanitized based on the $filter parameter value.
 *
 * The category will converted to maintain backward compatibility.
 *
 * @since 1.5.1
 *
 * @param int|object $category Category ID or Category row object
 * @param string $output Optional. The required return type. One of OBJECT, ARRAY_A, or ARRAY_N, which correspond to a
 *                       WP_Term object, an associative array, or a numeric array, respectively. Default OBJECT.
 * @param string $filter Optional. Default is raw or no WordPress defined filter will applied.
 * @return object|array|WP_Error|null Category data in type defined by $output parameter.
 *                                    WP_Error if $category is empty, null if it does not exist.
 */
function get_category($category, $output = \OBJECT, $filter = 'raw')
{
}
/**
 * Retrieve category based on URL containing the category slug.
 *
 * Breaks the $category_path parameter up to get the category slug.
 *
 * Tries to find the child path and will return it. If it doesn't find a
 * match, then it will return the first category matching slug, if $full_match,
 * is set to false. If it does not, then it will return null.
 *
 * It is also possible that it will return a WP_Error object on failure. Check
 * for it when using this function.
 *
 * @since 2.1.0
 *
 * @param string $category_path URL containing category slugs.
 * @param bool   $full_match    Optional. Whether full path should be matched.
 * @param string $output        Optional. The required return type. One of OBJECT, ARRAY_A, or ARRAY_N, which correspond to
 *                              a WP_Term object, an associative array, or a numeric array, respectively. Default OBJECT.
 * @return WP_Term|array|WP_Error|null Type is based on $output value.
 */
function get_category_by_path($category_path, $full_match = \true, $output = \OBJECT)
{
}
/**
 * Retrieve category object by category slug.
 *
 * @since 2.3.0
 *
 * @param string $slug The category slug.
 * @return object Category data object
 */
function get_category_by_slug($slug)
{
}
/**
 * Retrieve the ID of a category from its name.
 *
 * @since 1.0.0
 *
 * @param string $cat_name Category name.
 * @return int 0, if failure and ID of category on success.
 */
function get_cat_ID($cat_name)
{
}
/**
 * Retrieve the name of a category from its ID.
 *
 * @since 1.0.0
 *
 * @param int $cat_id Category ID
 * @return string Category name, or an empty string if category doesn't exist.
 */
function get_cat_name($cat_id)
{
}
/**
 * Check if a category is an ancestor of another category.
 *
 * You can use either an id or the category object for both parameters. If you
 * use an integer the category will be retrieved.
 *
 * @since 2.1.0
 *
 * @param int|object $cat1 ID or object to check if this is the parent category.
 * @param int|object $cat2 The child category.
 * @return bool Whether $cat2 is child of $cat1
 */
function cat_is_ancestor_of($cat1, $cat2)
{
}
/**
 * Sanitizes category data based on context.
 *
 * @since 2.3.0
 *
 * @param object|array $category Category data
 * @param string $context Optional. Default is 'display'.
 * @return object|array Same type as $category with sanitized data for safe use.
 */
function sanitize_category($category, $context = 'display')
{
}
/**
 * Sanitizes data in single category key field.
 *
 * @since 2.3.0
 *
 * @param string $field Category key to sanitize
 * @param mixed $value Category value to sanitize
 * @param int $cat_id Category ID
 * @param string $context What filter to use, 'raw', 'display', etc.
 * @return mixed Same type as $value after $value has been sanitized.
 */
function sanitize_category_field($field, $value, $cat_id, $context)
{
}
/* Tags */
/**
 * Retrieves all post tags.
 *
 * @since 2.3.0
 * @see get_terms() For list of arguments to pass.
 *
 * @param string|array $args Tag arguments to use when retrieving tags.
 * @return array List of tags.
 */
function get_tags($args = '')
{
}
/**
 * Retrieve post tag by tag ID or tag object.
 *
 * If you pass the $tag parameter an object, which is assumed to be the tag row
 * object retrieved the database. It will cache the tag data.
 *
 * If you pass $tag an integer of the tag ID, then that tag will
 * be retrieved from the database, if it isn't already cached, and pass it back.
 *
 * If you look at get_term(), then both types will be passed through several
 * filters and finally sanitized based on the $filter parameter value.
 *
 * @since 2.3.0
 *
 * @param int|WP_Term|object $tag    A tag ID or object.
 * @param string             $output Optional. The required return type. One of OBJECT, ARRAY_A, or ARRAY_N, which correspond to
 *                                   a WP_Term object, an associative array, or a numeric array, respectively. Default OBJECT.
 * @param string             $filter Optional. Default is raw or no WordPress defined filter will applied.
 * @return WP_Term|array|WP_Error|null Tag data in type defined by $output parameter. WP_Error if $tag is empty, null if it does not exist.
 */
function get_tag($tag, $output = \OBJECT, $filter = 'raw')
{
}
/* Cache */
/**
 * Remove the category cache data based on ID.
 *
 * @since 2.1.0
 *
 * @param int $id Category ID
 */
function clean_category_cache($id)
{
}
/**
 * Update category structure to old pre 2.3 from new taxonomy structure.
 *
 * This function was added for the taxonomy support to update the new category
 * structure with the old category one. This will maintain compatibility with
 * plugins and themes which depend on the old key or property names.
 *
 * The parameter should only be passed a variable and not create the array or
 * object inline to the parameter. The reason for this is that parameter is
 * passed by reference and PHP will fail unless it has the variable.
 *
 * There is no return value, because everything is updated on the variable you
 * pass to it. This is one of the features with using pass by reference in PHP.
 *
 * @since 2.3.0
 * @since 4.4.0 The `$category` parameter now also accepts a WP_Term object.
 * @access private
 *
 * @param array|object|WP_Term $category Category Row object or array
 */
function _make_cat_compat(&$category)
{
}
/**
 * WordPress autoloader for SimplePie.
 *
 * @since 3.5.0
 */
function wp_simplepie_autoload($class)
{
}
/**
 * Comment template functions
 *
 * These functions are meant to live inside of the WordPress loop.
 *
 * @package WordPress
 * @subpackage Template
 */
/**
 * Retrieve the author of the current comment.
 *
 * If the comment has an empty comment_author field, then 'Anonymous' person is
 * assumed.
 *
 * @since 1.5.0
 * @since 4.4.0 Added the ability for `$comment_ID` to also accept a WP_Comment object.
 *
 * @param int|WP_Comment $comment_ID Optional. WP_Comment or the ID of the comment for which to retrieve the author.
 *									 Default current comment.
 * @return string The comment author
 */
function get_comment_author($comment_ID = 0)
{
}
/**
 * Displays the author of the current comment.
 *
 * @since 0.71
 * @since 4.4.0 Added the ability for `$comment_ID` to also accept a WP_Comment object.
 *
 * @param int|WP_Comment $comment_ID Optional. WP_Comment or the ID of the comment for which to print the author.
 *									 Default current comment.
 */
function comment_author($comment_ID = 0)
{
}
/**
 * Retrieve the email of the author of the current comment.
 *
 * @since 1.5.0
 * @since 4.4.0 Added the ability for `$comment_ID` to also accept a WP_Comment object.
 *
 * @param int|WP_Comment $comment_ID Optional. WP_Comment or the ID of the comment for which to get the author's email.
 *									 Default current comment.
 * @return string The current comment author's email
 */
function get_comment_author_email($comment_ID = 0)
{
}
/**
 * Display the email of the author of the current global $comment.
 *
 * Care should be taken to protect the email address and assure that email
 * harvesters do not capture your commentors' email address. Most assume that
 * their email address will not appear in raw form on the site. Doing so will
 * enable anyone, including those that people don't want to get the email
 * address and use it for their own means good and bad.
 *
 * @since 0.71
 * @since 4.4.0 Added the ability for `$comment_ID` to also accept a WP_Comment object.
 *
 * @param int|WP_Comment $comment_ID Optional. WP_Comment or the ID of the comment for which to print the author's email.
 *									 Default current comment.
 */
function comment_author_email($comment_ID = 0)
{
}
/**
 * Display the html email link to the author of the current comment.
 *
 * Care should be taken to protect the email address and assure that email
 * harvesters do not capture your commentors' email address. Most assume that
 * their email address will not appear in raw form on the site. Doing so will
 * enable anyone, including those that people don't want to get the email
 * address and use it for their own means good and bad.
 *
 * @since 0.71
 * @since 4.6.0 Added the `$comment` parameter.
 *
 * @param string         $linktext Optional. Text to display instead of the comment author's email address.
 *                                 Default empty.
 * @param string         $before   Optional. Text or HTML to display before the email link. Default empty.
 * @param string         $after    Optional. Text or HTML to display after the email link. Default empty.
 * @param int|WP_Comment $comment  Optional. Comment ID or WP_Comment object. Default is the current comment.
 */
function comment_author_email_link($linktext = '', $before = '', $after = '', $comment = \null)
{
}
/**
 * Return the html email link to the author of the current comment.
 *
 * Care should be taken to protect the email address and assure that email
 * harvesters do not capture your commentors' email address. Most assume that
 * their email address will not appear in raw form on the site. Doing so will
 * enable anyone, including those that people don't want to get the email
 * address and use it for their own means good and bad.
 *
 * @since 2.7.0
 * @since 4.6.0 Added the `$comment` parameter.
 *
 * @param string         $linktext Optional. Text to display instead of the comment author's email address.
 *                                 Default empty.
 * @param string         $before   Optional. Text or HTML to display before the email link. Default empty.
 * @param string         $after    Optional. Text or HTML to display after the email link. Default empty.
 * @param int|WP_Comment $comment  Optional. Comment ID or WP_Comment object. Default is the current comment.
 * @return string HTML markup for the comment author email link. By default, the email address is obfuscated
 *                via the {@see 'comment_email'} filter with antispambot().
 */
function get_comment_author_email_link($linktext = '', $before = '', $after = '', $comment = \null)
{
}
/**
 * Retrieve the HTML link to the URL of the author of the current comment.
 *
 * Both get_comment_author_url() and get_comment_author() rely on get_comment(),
 * which falls back to the global comment variable if the $comment_ID argument is empty.
 *
 * @since 1.5.0
 * @since 4.4.0 Added the ability for `$comment_ID` to also accept a WP_Comment object.
 *
 * @param int|WP_Comment $comment_ID Optional. WP_Comment or the ID of the comment for which to get the author's link.
 *									 Default current comment.
 * @return string The comment author name or HTML link for author's URL.
 */
function get_comment_author_link($comment_ID = 0)
{
}
/**
 * Display the html link to the url of the author of the current comment.
 *
 * @since 0.71
 * @since 4.4.0 Added the ability for `$comment_ID` to also accept a WP_Comment object.
 *
 * @param int|WP_Comment $comment_ID Optional. WP_Comment or the ID of the comment for which to print the author's link.
 *									 Default current comment.
 */
function comment_author_link($comment_ID = 0)
{
}
/**
 * Retrieve the IP address of the author of the current comment.
 *
 * @since 1.5.0
 * @since 4.4.0 Added the ability for `$comment_ID` to also accept a WP_Comment object.
 *
 * @param int|WP_Comment $comment_ID Optional. WP_Comment or the ID of the comment for which to get the author's IP address.
 *									 Default current comment.
 * @return string Comment author's IP address.
 */
function get_comment_author_IP($comment_ID = 0)
{
}
/**
 * Display the IP address of the author of the current comment.
 *
 * @since 0.71
 * @since 4.4.0 Added the ability for `$comment_ID` to also accept a WP_Comment object.
 *
 * @param int|WP_Comment $comment_ID Optional. WP_Comment or the ID of the comment for which to print the author's IP address.
 *									 Default current comment.
 */
function comment_author_IP($comment_ID = 0)
{
}
/**
 * Retrieve the url of the author of the current comment.
 *
 * @since 1.5.0
 * @since 4.4.0 Added the ability for `$comment_ID` to also accept a WP_Comment object.
 *
 * @param int|WP_Comment $comment_ID Optional. WP_Comment or the ID of the comment for which to get the author's URL.
 *									 Default current comment.
 * @return string Comment author URL.
 */
function get_comment_author_url($comment_ID = 0)
{
}
/**
 * Display the url of the author of the current comment.
 *
 * @since 0.71
 * @since 4.4.0 Added the ability for `$comment_ID` to also accept a WP_Comment object.
 *
 * @param int|WP_Comment $comment_ID Optional. WP_Comment or the ID of the comment for which to print the author's URL.
 *									 Default current comment.
 */
function comment_author_url($comment_ID = 0)
{
}
/**
 * Retrieves the HTML link of the url of the author of the current comment.
 *
 * $linktext parameter is only used if the URL does not exist for the comment
 * author. If the URL does exist then the URL will be used and the $linktext
 * will be ignored.
 *
 * Encapsulate the HTML link between the $before and $after. So it will appear
 * in the order of $before, link, and finally $after.
 *
 * @since 1.5.0
 * @since 4.6.0 Added the `$comment` parameter.
 *
 * @param string         $linktext Optional. The text to display instead of the comment
 *                                 author's email address. Default empty.
 * @param string         $before   Optional. The text or HTML to display before the email link.
 *                                 Default empty.
 * @param string         $after    Optional. The text or HTML to display after the email link.
 *                                 Default empty.
 * @param int|WP_Comment $comment  Optional. Comment ID or WP_Comment object.
 *                                 Default is the current comment.
 * @return string The HTML link between the $before and $after parameters.
 */
function get_comment_author_url_link($linktext = '', $before = '', $after = '', $comment = 0)
{
}
/**
 * Displays the HTML link of the url of the author of the current comment.
 *
 * @since 0.71
 * @since 4.6.0 Added the `$comment` parameter.
 *
 * @param string         $linktext Optional. Text to display instead of the comment author's
 *                                 email address. Default empty.
 * @param string         $before   Optional. Text or HTML to display before the email link.
 *                                 Default empty.
 * @param string         $after    Optional. Text or HTML to display after the email link.
 *                                 Default empty.
 * @param int|WP_Comment $comment  Optional. Comment ID or WP_Comment object.
 *                                 Default is the current comment.
 */
function comment_author_url_link($linktext = '', $before = '', $after = '', $comment = 0)
{
}
/**
 * Generates semantic classes for each comment element.
 *
 * @since 2.7.0
 * @since 4.4.0 Added the ability for `$comment` to also accept a WP_Comment object.
 *
 * @param string|array   $class    Optional. One or more classes to add to the class list.
 *                                 Default empty.
 * @param int|WP_Comment $comment  Comment ID or WP_Comment object. Default current comment.
 * @param int|WP_Post    $post_id  Post ID or WP_Post object. Default current post.
 * @param bool           $echo     Optional. Whether to cho or return the output.
 *                                 Default true.
 * @return string If `$echo` is false, the class will be returned. Void otherwise.
 */
function comment_class($class = '', $comment = \null, $post_id = \null, $echo = \true)
{
}
/**
 * Returns the classes for the comment div as an array.
 *
 * @since 2.7.0
 * @since 4.4.0 Added the ability for `$comment_id` to also accept a WP_Comment object.
 *
 * @global int $comment_alt
 * @global int $comment_depth
 * @global int $comment_thread_alt
 *
 * @param string|array   $class      Optional. One or more classes to add to the class list. Default empty.
 * @param int|WP_Comment $comment_id Comment ID or WP_Comment object. Default current comment.
 * @param int|WP_Post    $post_id    Post ID or WP_Post object. Default current post.
 * @return array An array of classes.
 */
function get_comment_class($class = '', $comment_id = \null, $post_id = \null)
{
}
/**
 * Retrieve the comment date of the current comment.
 *
 * @since 1.5.0
 * @since 4.4.0 Added the ability for `$comment_ID` to also accept a WP_Comment object.
 *
 * @param string          $d          Optional. The format of the date. Default user's setting.
 * @param int|WP_Comment  $comment_ID WP_Comment or ID of the comment for which to get the date.
 *                                    Default current comment.
 * @return string The comment's date.
 */
function get_comment_date($d = '', $comment_ID = 0)
{
}
/**
 * Display the comment date of the current comment.
 *
 * @since 0.71
 * @since 4.4.0 Added the ability for `$comment_ID` to also accept a WP_Comment object.
 *
 * @param string         $d          Optional. The format of the date. Default user's settings.
 * @param int|WP_Comment $comment_ID WP_Comment or ID of the comment for which to print the date.
 *                                   Default current comment.
 */
function comment_date($d = '', $comment_ID = 0)
{
}
/**
 * Retrieve the excerpt of the current comment.
 *
 * Will cut each word and only output the first 20 words with '&hellip;' at the end.
 * If the word count is less than 20, then no truncating is done and no '&hellip;'
 * will appear.
 *
 * @since 1.5.0
 * @since 4.4.0 Added the ability for `$comment_ID` to also accept a WP_Comment object.
 *
 * @param int|WP_Comment $comment_ID  WP_Comment or ID of the comment for which to get the excerpt.
 *                                    Default current comment.
 * @return string The maybe truncated comment with 20 words or less.
 */
function get_comment_excerpt($comment_ID = 0)
{
}
/**
 * Display the excerpt of the current comment.
 *
 * @since 1.2.0
 * @since 4.4.0 Added the ability for `$comment_ID` to also accept a WP_Comment object.
 *
 * @param int|WP_Comment $comment_ID  WP_Comment or ID of the comment for which to print the excerpt.
 *                                    Default current comment.
 */
function comment_excerpt($comment_ID = 0)
{
}
/**
 * Retrieve the comment id of the current comment.
 *
 * @since 1.5.0
 *
 * @return int The comment ID.
 */
function get_comment_ID()
{
}
/**
 * Display the comment id of the current comment.
 *
 * @since 0.71
 */
function comment_ID()
{
}
/**
 * Retrieve the link to a given comment.
 *
 * @since 1.5.0
 * @since 4.4.0 Added the ability for `$comment` to also accept a WP_Comment object. Added `$cpage` argument.
 *
 * @see get_page_of_comment()
 *
 * @global WP_Rewrite $wp_rewrite
 * @global bool       $in_comment_loop
 *
 * @param WP_Comment|int|null $comment Comment to retrieve. Default current comment.
 * @param array               $args {
 *     An array of optional arguments to override the defaults.
 *
 *     @type string     $type      Passed to get_page_of_comment().
 *     @type int        $page      Current page of comments, for calculating comment pagination.
 *     @type int        $per_page  Per-page value for comment pagination.
 *     @type int        $max_depth Passed to get_page_of_comment().
 *     @type int|string $cpage     Value to use for the comment's "comment-page" or "cpage" value.
 *                                 If provided, this value overrides any value calculated from `$page`
 *                                 and `$per_page`.
 * }
 * @return string The permalink to the given comment.
 */
function get_comment_link($comment = \null, $args = array())
{
}
/**
 * Retrieves the link to the current post comments.
 *
 * @since 1.5.0
 *
 * @param int|WP_Post $post_id Optional. Post ID or WP_Post object. Default is global $post.
 * @return string The link to the comments.
 */
function get_comments_link($post_id = 0)
{
}
/**
 * Display the link to the current post comments.
 *
 * @since 0.71
 *
 * @param string $deprecated   Not Used.
 * @param string $deprecated_2 Not Used.
 */
function comments_link($deprecated = '', $deprecated_2 = '')
{
}
/**
 * Retrieves the amount of comments a post has.
 *
 * @since 1.5.0
 *
 * @param int|WP_Post $post_id Optional. Post ID or WP_Post object. Default is the global `$post`.
 * @return string|int If the post exists, a numeric string representing the number of comments
 *                    the post has, otherwise 0.
 */
function get_comments_number($post_id = 0)
{
}
/**
 * Display the language string for the number of comments the current post has.
 *
 * @since 0.71
 *
 * @param string $zero       Optional. Text for no comments. Default false.
 * @param string $one        Optional. Text for one comment. Default false.
 * @param string $more       Optional. Text for more than one comment. Default false.
 * @param string $deprecated Not used.
 */
function comments_number($zero = \false, $one = \false, $more = \false, $deprecated = '')
{
}
/**
 * Display the language string for the number of comments the current post has.
 *
 * @since 4.0.0
 *
 * @param string $zero Optional. Text for no comments. Default false.
 * @param string $one  Optional. Text for one comment. Default false.
 * @param string $more Optional. Text for more than one comment. Default false.
 */
function get_comments_number_text($zero = \false, $one = \false, $more = \false)
{
}
/**
 * Retrieve the text of the current comment.
 *
 * @since 1.5.0
 * @since 4.4.0 Added the ability for `$comment_ID` to also accept a WP_Comment object.
 *
 * @see Walker_Comment::comment()
 *
 * @param int|WP_Comment  $comment_ID WP_Comment or ID of the comment for which to get the text.
 *                                    Default current comment.
 * @param array           $args       Optional. An array of arguments. Default empty.
 * @return string The comment content.
 */
function get_comment_text($comment_ID = 0, $args = array())
{
}
/**
 * Display the text of the current comment.
 *
 * @since 0.71
 * @since 4.4.0 Added the ability for `$comment_ID` to also accept a WP_Comment object.
 *
 * @see Walker_Comment::comment()
 *
 * @param int|WP_Comment  $comment_ID WP_Comment or ID of the comment for which to print the text.
 *                                    Default current comment.
 * @param array           $args       Optional. An array of arguments. Default empty array. Default empty.
 */
function comment_text($comment_ID = 0, $args = array())
{
}
/**
 * Retrieve the comment time of the current comment.
 *
 * @since 1.5.0
 *
 * @param string $d         Optional. The format of the time. Default user's settings.
 * @param bool   $gmt       Optional. Whether to use the GMT date. Default false.
 * @param bool   $translate Optional. Whether to translate the time (for use in feeds).
 *                          Default true.
 * @return string The formatted time.
 */
function get_comment_time($d = '', $gmt = \false, $translate = \true)
{
}
/**
 * Display the comment time of the current comment.
 *
 * @since 0.71
 *
 * @param string $d Optional. The format of the time. Default user's settings.
 */
function comment_time($d = '')
{
}
/**
 * Retrieve the comment type of the current comment.
 *
 * @since 1.5.0
 * @since 4.4.0 Added the ability for `$comment_ID` to also accept a WP_Comment object.
 *
 * @param int|WP_Comment $comment_ID Optional. WP_Comment or ID of the comment for which to get the type.
 *                                   Default current comment.
 * @return string The comment type.
 */
function get_comment_type($comment_ID = 0)
{
}
/**
 * Display the comment type of the current comment.
 *
 * @since 0.71
 *
 * @param string $commenttxt   Optional. String to display for comment type. Default false.
 * @param string $trackbacktxt Optional. String to display for trackback type. Default false.
 * @param string $pingbacktxt  Optional. String to display for pingback type. Default false.
 */
function comment_type($commenttxt = \false, $trackbacktxt = \false, $pingbacktxt = \false)
{
}
/**
 * Retrieve The current post's trackback URL.
 *
 * There is a check to see if permalink's have been enabled and if so, will
 * retrieve the pretty path. If permalinks weren't enabled, the ID of the
 * current post is used and appended to the correct page to go to.
 *
 * @since 1.5.0
 *
 * @return string The trackback URL after being filtered.
 */
function get_trackback_url()
{
}
/**
 * Display the current post's trackback URL.
 *
 * @since 0.71
 *
 * @param bool $deprecated_echo Not used.
 * @return void|string Should only be used to echo the trackback URL, use get_trackback_url()
 *                     for the result instead.
 */
function trackback_url($deprecated_echo = \true)
{
}
/**
 * Generate and display the RDF for the trackback information of current post.
 *
 * Deprecated in 3.0.0, and restored in 3.0.1.
 *
 * @since 0.71
 *
 * @param int $deprecated Not used (Was $timezone = 0).
 */
function trackback_rdf($deprecated = '')
{
}
/**
 * Whether the current post is open for comments.
 *
 * @since 1.5.0
 *
 * @param int|WP_Post $post_id Post ID or WP_Post object. Default current post.
 * @return bool True if the comments are open.
 */
function comments_open($post_id = \null)
{
}
/**
 * Whether the current post is open for pings.
 *
 * @since 1.5.0
 *
 * @param int|WP_Post $post_id Post ID or WP_Post object. Default current post.
 * @return bool True if pings are accepted
 */
function pings_open($post_id = \null)
{
}
/**
 * Display form token for unfiltered comments.
 *
 * Will only display nonce token if the current user has permissions for
 * unfiltered html. Won't display the token for other users.
 *
 * The function was backported to 2.0.10 and was added to versions 2.1.3 and
 * above. Does not exist in versions prior to 2.0.10 in the 2.0 branch and in
 * the 2.1 branch, prior to 2.1.3. Technically added in 2.2.0.
 *
 * Backported to 2.0.10.
 *
 * @since 2.1.3
 */
function wp_comment_form_unfiltered_html_nonce()
{
}
/**
 * Load the comment template specified in $file.
 *
 * Will not display the comments template if not on single post or page, or if
 * the post does not have comments.
 *
 * Uses the WordPress database object to query for the comments. The comments
 * are passed through the {@see 'comments_array'} filter hook with the list of comments
 * and the post ID respectively.
 *
 * The `$file` path is passed through a filter hook called {@see 'comments_template'},
 * which includes the TEMPLATEPATH and $file combined. Tries the $filtered path
 * first and if it fails it will require the default comment template from the
 * default theme. If either does not exist, then the WordPress process will be
 * halted. It is advised for that reason, that the default theme is not deleted.
 *
 * Will not try to get the comments if the post has none.
 *
 * @since 1.5.0
 *
 * @global WP_Query   $wp_query
 * @global WP_Post    $post
 * @global wpdb       $wpdb
 * @global int        $id
 * @global WP_Comment $comment
 * @global string     $user_login
 * @global int        $user_ID
 * @global string     $user_identity
 * @global bool       $overridden_cpage
 * @global bool       $withcomments
 *
 * @param string $file              Optional. The file to load. Default '/comments.php'.
 * @param bool   $separate_comments Optional. Whether to separate the comments by comment type.
 *                                  Default false.
 */
function comments_template($file = '/comments.php', $separate_comments = \false)
{
}
/**
 * Displays the link to the comments for the current post ID.
 *
 * @since 0.71
 *
 * @param string $zero      Optional. String to display when no comments. Default false.
 * @param string $one       Optional. String to display when only one comment is available.
 *                          Default false.
 * @param string $more      Optional. String to display when there are more than one comment.
 *                          Default false.
 * @param string $css_class Optional. CSS class to use for comments. Default empty.
 * @param string $none      Optional. String to display when comments have been turned off.
 *                          Default false.
 */
function comments_popup_link($zero = \false, $one = \false, $more = \false, $css_class = '', $none = \false)
{
}
/**
 * Retrieve HTML content for reply to comment link.
 *
 * @since 2.7.0
 * @since 4.4.0 Added the ability for `$comment` to also accept a WP_Comment object.
 *
 * @param array $args {
 *     Optional. Override default arguments.
 *
 *     @type string $add_below  The first part of the selector used to identify the comment to respond below.
 *                              The resulting value is passed as the first parameter to addComment.moveForm(),
 *                              concatenated as $add_below-$comment->comment_ID. Default 'comment'.
 *     @type string $respond_id The selector identifying the responding comment. Passed as the third parameter
 *                              to addComment.moveForm(), and appended to the link URL as a hash value.
 *                              Default 'respond'.
 *     @type string $reply_text The text of the Reply link. Default 'Reply'.
 *     @type string $login_text The text of the link to reply if logged out. Default 'Log in to Reply'.
 *     @type int    $max_depth  The max depth of the comment tree. Default 0.
 *     @type int    $depth      The depth of the new comment. Must be greater than 0 and less than the value
 *                              of the 'thread_comments_depth' option set in Settings > Discussion. Default 0.
 *     @type string $before     The text or HTML to add before the reply link. Default empty.
 *     @type string $after      The text or HTML to add after the reply link. Default empty.
 * }
 * @param int|WP_Comment $comment Comment being replied to. Default current comment.
 * @param int|WP_Post    $post    Post ID or WP_Post object the comment is going to be displayed on.
 *                                Default current post.
 * @return void|false|string Link to show comment form, if successful. False, if comments are closed.
 */
function get_comment_reply_link($args = array(), $comment = \null, $post = \null)
{
}
/**
 * Displays the HTML content for reply to comment link.
 *
 * @since 2.7.0
 *
 * @see get_comment_reply_link()
 *
 * @param array       $args    Optional. Override default options.
 * @param int         $comment Comment being replied to. Default current comment.
 * @param int|WP_Post $post    Post ID or WP_Post object the comment is going to be displayed on.
 *                             Default current post.
 * @return mixed Link to show comment form, if successful. False, if comments are closed.
 */
function comment_reply_link($args = array(), $comment = \null, $post = \null)
{
}
/**
 * Retrieve HTML content for reply to post link.
 *
 * @since 2.7.0
 *
 * @param array $args {
 *     Optional. Override default arguments.
 *
 *     @type string $add_below  The first part of the selector used to identify the comment to respond below.
 *                              The resulting value is passed as the first parameter to addComment.moveForm(),
 *                              concatenated as $add_below-$comment->comment_ID. Default is 'post'.
 *     @type string $respond_id The selector identifying the responding comment. Passed as the third parameter
 *                              to addComment.moveForm(), and appended to the link URL as a hash value.
 *                              Default 'respond'.
 *     @type string $reply_text Text of the Reply link. Default is 'Leave a Comment'.
 *     @type string $login_text Text of the link to reply if logged out. Default is 'Log in to leave a Comment'.
 *     @type string $before     Text or HTML to add before the reply link. Default empty.
 *     @type string $after      Text or HTML to add after the reply link. Default empty.
 * }
 * @param int|WP_Post $post    Optional. Post ID or WP_Post object the comment is going to be displayed on.
 *                             Default current post.
 * @return false|null|string Link to show comment form, if successful. False, if comments are closed.
 */
function get_post_reply_link($args = array(), $post = \null)
{
}
/**
 * Displays the HTML content for reply to post link.
 *
 * @since 2.7.0
 *
 * @see get_post_reply_link()
 *
 * @param array       $args Optional. Override default options,
 * @param int|WP_Post $post Post ID or WP_Post object the comment is going to be displayed on.
 *                          Default current post.
 * @return string|bool|null Link to show comment form, if successful. False, if comments are closed.
 */
function post_reply_link($args = array(), $post = \null)
{
}
/**
 * Retrieve HTML content for cancel comment reply link.
 *
 * @since 2.7.0
 *
 * @param string $text Optional. Text to display for cancel reply link. Default empty.
 * @return string
 */
function get_cancel_comment_reply_link($text = '')
{
}
/**
 * Display HTML content for cancel comment reply link.
 *
 * @since 2.7.0
 *
 * @param string $text Optional. Text to display for cancel reply link. Default empty.
 */
function cancel_comment_reply_link($text = '')
{
}
/**
 * Retrieve hidden input HTML for replying to comments.
 *
 * @since 3.0.0
 *
 * @param int $id Optional. Post ID. Default current post ID.
 * @return string Hidden input HTML for replying to comments
 */
function get_comment_id_fields($id = 0)
{
}
/**
 * Output hidden input HTML for replying to comments.
 *
 * @since 2.7.0
 *
 * @param int $id Optional. Post ID. Default current post ID.
 */
function comment_id_fields($id = 0)
{
}
/**
 * Display text based on comment reply status.
 *
 * Only affects users with JavaScript disabled.
 *
 * @internal The $comment global must be present to allow template tags access to the current
 *           comment. See https://core.trac.wordpress.org/changeset/36512.
 *
 * @since 2.7.0
 *
 * @global WP_Comment $comment Current comment.
 *
 * @param string $noreplytext  Optional. Text to display when not replying to a comment.
 *                             Default false.
 * @param string $replytext    Optional. Text to display when replying to a comment.
 *                             Default false. Accepts "%s" for the author of the comment
 *                             being replied to.
 * @param string $linktoparent Optional. Boolean to control making the author's name a link
 *                             to their comment. Default true.
 */
function comment_form_title($noreplytext = \false, $replytext = \false, $linktoparent = \true)
{
}
/**
 * List comments.
 *
 * Used in the comments.php template to list comments for a particular post.
 *
 * @since 2.7.0
 *
 * @see WP_Query->comments
 *
 * @global WP_Query $wp_query
 * @global int      $comment_alt
 * @global int      $comment_depth
 * @global int      $comment_thread_alt
 * @global bool     $overridden_cpage
 * @global bool     $in_comment_loop
 *
 * @param string|array $args {
 *     Optional. Formatting options.
 *
 *     @type object $walker            Instance of a Walker class to list comments. Default null.
 *     @type int    $max_depth         The maximum comments depth. Default empty.
 *     @type string $style             The style of list ordering. Default 'ul'. Accepts 'ul', 'ol'.
 *     @type string $callback          Callback function to use. Default null.
 *     @type string $end-callback      Callback function to use at the end. Default null.
 *     @type string $type              Type of comments to list.
 *                                     Default 'all'. Accepts 'all', 'comment', 'pingback', 'trackback', 'pings'.
 *     @type int    $page              Page ID to list comments for. Default empty.
 *     @type int    $per_page          Number of comments to list per page. Default empty.
 *     @type int    $avatar_size       Height and width dimensions of the avatar size. Default 32.
 *     @type bool   $reverse_top_level Ordering of the listed comments. If true, will display newest comments first.
 *     @type bool   $reverse_children  Whether to reverse child comments in the list. Default null.
 *     @type string $format            How to format the comments list.
 *                                     Default 'html5' if the theme supports it. Accepts 'html5', 'xhtml'.
 *     @type bool   $short_ping        Whether to output short pings. Default false.
 *     @type bool   $echo              Whether to echo the output or return it. Default true.
 * }
 * @param array $comments Optional. Array of WP_Comment objects.
 */
function wp_list_comments($args = array(), $comments = \null)
{
}
/**
 * Outputs a complete commenting form for use within a template.
 *
 * Most strings and form fields may be controlled through the $args array passed
 * into the function, while you may also choose to use the {@see 'comment_form_default_fields'}
 * filter to modify the array of default fields if you'd just like to add a new
 * one or remove a single field. All fields are also individually passed through
 * a filter of the {@see 'comment_form_field_$name'} where $name is the key used
 * in the array of fields.
 *
 * @since 3.0.0
 * @since 4.1.0 Introduced the 'class_submit' argument.
 * @since 4.2.0 Introduced the 'submit_button' and 'submit_fields' arguments.
 * @since 4.4.0 Introduced the 'class_form', 'title_reply_before', 'title_reply_after',
 *              'cancel_reply_before', and 'cancel_reply_after' arguments.
 * @since 4.5.0 The 'author', 'email', and 'url' form fields are limited to 245, 100,
 *              and 200 characters, respectively.
 * @since 4.6.0 Introduced the 'action' argument.
 * @since 4.9.6 Introduced the 'cookies' default comment field.
 *
 * @param array       $args {
 *     Optional. Default arguments and form fields to override.
 *
 *     @type array $fields {
 *         Default comment fields, filterable by default via the {@see 'comment_form_default_fields'} hook.
 *
 *         @type string $author  Comment author field HTML.
 *         @type string $email   Comment author email field HTML.
 *         @type string $url     Comment author URL field HTML.
 *         @type string $cookies Comment cookie opt-in field HTML.
 *     }
 *     @type string $comment_field        The comment textarea field HTML.
 *     @type string $must_log_in          HTML element for a 'must be logged in to comment' message.
 *     @type string $logged_in_as         HTML element for a 'logged in as [user]' message.
 *     @type string $comment_notes_before HTML element for a message displayed before the comment fields
 *                                        if the user is not logged in.
 *                                        Default 'Your email address will not be published.'.
 *     @type string $comment_notes_after  HTML element for a message displayed after the textarea field.
 *     @type string $action               The comment form element action attribute. Default '/wp-comments-post.php'.
 *     @type string $id_form              The comment form element id attribute. Default 'commentform'.
 *     @type string $id_submit            The comment submit element id attribute. Default 'submit'.
 *     @type string $class_form           The comment form element class attribute. Default 'comment-form'.
 *     @type string $class_submit         The comment submit element class attribute. Default 'submit'.
 *     @type string $name_submit          The comment submit element name attribute. Default 'submit'.
 *     @type string $title_reply          The translatable 'reply' button label. Default 'Leave a Reply'.
 *     @type string $title_reply_to       The translatable 'reply-to' button label. Default 'Leave a Reply to %s',
 *                                        where %s is the author of the comment being replied to.
 *     @type string $title_reply_before   HTML displayed before the comment form title.
 *                                        Default: '<h3 id="reply-title" class="comment-reply-title">'.
 *     @type string $title_reply_after    HTML displayed after the comment form title.
 *                                        Default: '</h3>'.
 *     @type string $cancel_reply_before  HTML displayed before the cancel reply link.
 *     @type string $cancel_reply_after   HTML displayed after the cancel reply link.
 *     @type string $cancel_reply_link    The translatable 'cancel reply' button label. Default 'Cancel reply'.
 *     @type string $label_submit         The translatable 'submit' button label. Default 'Post a comment'.
 *     @type string $submit_button        HTML format for the Submit button.
 *                                        Default: '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />'.
 *     @type string $submit_field         HTML format for the markup surrounding the Submit button and comment hidden
 *                                        fields. Default: '<p class="form-submit">%1$s %2$s</p>', where %1$s is the
 *                                        submit button markup and %2$s is the comment hidden fields.
 *     @type string $format               The comment form format. Default 'xhtml'. Accepts 'xhtml', 'html5'.
 * }
 * @param int|WP_Post $post_id Post ID or WP_Post object to generate the form for. Default current post.
 */
function comment_form($args = array(), $post_id = \null)
{
}
/**
 * Core Comment API
 *
 * @package WordPress
 * @subpackage Comment
 */
/**
 * Check whether a comment passes internal checks to be allowed to add.
 *
 * If manual comment moderation is set in the administration, then all checks,
 * regardless of their type and whitelist, will fail and the function will
 * return false.
 *
 * If the number of links exceeds the amount in the administration, then the
 * check fails. If any of the parameter contents match the blacklist of words,
 * then the check fails.
 *
 * If the comment author was approved before, then the comment is automatically
 * whitelisted.
 *
 * If all checks pass, the function will return true.
 *
 * @since 1.2.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param string $author       Comment author name.
 * @param string $email        Comment author email.
 * @param string $url          Comment author URL.
 * @param string $comment      Content of the comment.
 * @param string $user_ip      Comment author IP address.
 * @param string $user_agent   Comment author User-Agent.
 * @param string $comment_type Comment type, either user-submitted comment,
 *		                       trackback, or pingback.
 * @return bool If all checks pass, true, otherwise false.
 */
function check_comment($author, $email, $url, $comment, $user_ip, $user_agent, $comment_type)
{
}
/**
 * Retrieve the approved comments for post $post_id.
 *
 * @since 2.0.0
 * @since 4.1.0 Refactored to leverage WP_Comment_Query over a direct query.
 *
 * @param  int   $post_id The ID of the post.
 * @param  array $args    Optional. See WP_Comment_Query::__construct() for information on accepted arguments.
 * @return int|array $comments The approved comments, or number of comments if `$count`
 *                             argument is true.
 */
function get_approved_comments($post_id, $args = array())
{
}
/**
 * Retrieves comment data given a comment ID or comment object.
 *
 * If an object is passed then the comment data will be cached and then returned
 * after being passed through a filter. If the comment is empty, then the global
 * comment variable will be used, if it is set.
 *
 * @since 2.0.0
 *
 * @global WP_Comment $comment
 *
 * @param WP_Comment|string|int $comment Comment to retrieve.
 * @param string                $output  Optional. The required return type. One of OBJECT, ARRAY_A, or ARRAY_N, which correspond to
 *                                       a WP_Comment object, an associative array, or a numeric array, respectively. Default OBJECT.
 * @return WP_Comment|array|null Depends on $output value.
 */
function get_comment(&$comment = \null, $output = \OBJECT)
{
}
/**
 * Retrieve a list of comments.
 *
 * The comment list can be for the blog as a whole or for an individual post.
 *
 * @since 2.7.0
 *
 * @param string|array $args Optional. Array or string of arguments. See WP_Comment_Query::__construct()
 *                           for information on accepted arguments. Default empty.
 * @return int|array List of comments or number of found comments if `$count` argument is true.
 */
function get_comments($args = '')
{
}
/**
 * Retrieve all of the WordPress supported comment statuses.
 *
 * Comments have a limited set of valid status values, this provides the comment
 * status values and descriptions.
 *
 * @since 2.7.0
 *
 * @return array List of comment statuses.
 */
function get_comment_statuses()
{
}
/**
 * Gets the default comment status for a post type.
 *
 * @since 4.3.0
 *
 * @param string $post_type    Optional. Post type. Default 'post'.
 * @param string $comment_type Optional. Comment type. Default 'comment'.
 * @return string Expected return value is 'open' or 'closed'.
 */
function get_default_comment_status($post_type = 'post', $comment_type = 'comment')
{
}
/**
 * The date the last comment was modified.
 *
 * @since 1.5.0
 * @since 4.7.0 Replaced caching the modified date in a local static variable
 *              with the Object Cache API.
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param string $timezone Which timezone to use in reference to 'gmt', 'blog', or 'server' locations.
 * @return string|false Last comment modified date on success, false on failure.
 */
function get_lastcommentmodified($timezone = 'server')
{
}
/**
 * The amount of comments in a post or total comments.
 *
 * A lot like wp_count_comments(), in that they both return comment stats (albeit with different types).
 * The wp_count_comments() actually caches, but this function does not.
 *
 * @since 2.0.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param int $post_id Optional. Comment amount in post if > 0, else total comments blog wide.
 * @return array The amount of spam, approved, awaiting moderation, and total comments.
 */
function get_comment_count($post_id = 0)
{
}
//
// Comment meta functions
//
/**
 * Add meta data field to a comment.
 *
 * @since 2.9.0
 * @link https://codex.wordpress.org/Function_Reference/add_comment_meta
 *
 * @param int $comment_id Comment ID.
 * @param string $meta_key Metadata name.
 * @param mixed $meta_value Metadata value.
 * @param bool $unique Optional, default is false. Whether the same key should not be added.
 * @return int|bool Meta ID on success, false on failure.
 */
function add_comment_meta($comment_id, $meta_key, $meta_value, $unique = \false)
{
}
/**
 * Remove metadata matching criteria from a comment.
 *
 * You can match based on the key, or key and value. Removing based on key and
 * value, will keep from removing duplicate metadata with the same key. It also
 * allows removing all metadata matching key, if needed.
 *
 * @since 2.9.0
 * @link https://codex.wordpress.org/Function_Reference/delete_comment_meta
 *
 * @param int $comment_id comment ID
 * @param string $meta_key Metadata name.
 * @param mixed $meta_value Optional. Metadata value.
 * @return bool True on success, false on failure.
 */
function delete_comment_meta($comment_id, $meta_key, $meta_value = '')
{
}
/**
 * Retrieve comment meta field for a comment.
 *
 * @since 2.9.0
 * @link https://codex.wordpress.org/Function_Reference/get_comment_meta
 *
 * @param int $comment_id Comment ID.
 * @param string $key Optional. The meta key to retrieve. By default, returns data for all keys.
 * @param bool $single Whether to return a single value.
 * @return mixed Will be an array if $single is false. Will be value of meta data field if $single
 *  is true.
 */
function get_comment_meta($comment_id, $key = '', $single = \false)
{
}
/**
 * Update comment meta field based on comment ID.
 *
 * Use the $prev_value parameter to differentiate between meta fields with the
 * same key and comment ID.
 *
 * If the meta field for the comment does not exist, it will be added.
 *
 * @since 2.9.0
 * @link https://codex.wordpress.org/Function_Reference/update_comment_meta
 *
 * @param int $comment_id Comment ID.
 * @param string $meta_key Metadata key.
 * @param mixed $meta_value Metadata value.
 * @param mixed $prev_value Optional. Previous value to check before removing.
 * @return int|bool Meta ID if the key didn't exist, true on successful update, false on failure.
 */
function update_comment_meta($comment_id, $meta_key, $meta_value, $prev_value = '')
{
}
/**
 * Queues comments for metadata lazy-loading.
 *
 * @since 4.5.0
 *
 * @param array $comments Array of comment objects.
 */
function wp_queue_comments_for_comment_meta_lazyload($comments)
{
}
/**
 * Sets the cookies used to store an unauthenticated commentator's identity. Typically used
 * to recall previous comments by this commentator that are still held in moderation.
 *
 * @since 3.4.0
 * @since 4.9.6 The `$cookies_consent` parameter was added.
 *
 * @param WP_Comment $comment         Comment object.
 * @param WP_User    $user            Comment author's user object. The user may not exist.
 * @param boolean    $cookies_consent Optional. Comment author's consent to store cookies. Default true.
 */
function wp_set_comment_cookies($comment, $user, $cookies_consent = \true)
{
}
/**
 * Sanitizes the cookies sent to the user already.
 *
 * Will only do anything if the cookies have already been created for the user.
 * Mostly used after cookies had been sent to use elsewhere.
 *
 * @since 2.0.4
 */
function sanitize_comment_cookies()
{
}
/**
 * Validates whether this comment is allowed to be made.
 *
 * @since 2.0.0
 * @since 4.7.0 The `$avoid_die` parameter was added, allowing the function to
 *              return a WP_Error object instead of dying.
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param array $commentdata Contains information on the comment.
 * @param bool  $avoid_die   When true, a disallowed comment will result in the function
 *                           returning a WP_Error object, rather than executing wp_die().
 *                           Default false.
 * @return int|string|WP_Error Allowed comments return the approval status (0|1|'spam').
 *                             If `$avoid_die` is true, disallowed comments return a WP_Error.
 */
function wp_allow_comment($commentdata, $avoid_die = \false)
{
}
/**
 * Hooks WP's native database-based comment-flood check.
 *
 * This wrapper maintains backward compatibility with plugins that expect to
 * be able to unhook the legacy check_comment_flood_db() function from
 * 'check_comment_flood' using remove_action().
 *
 * @since 2.3.0
 * @since 4.7.0 Converted to be an add_filter() wrapper.
 */
function check_comment_flood_db()
{
}
/**
 * Checks whether comment flooding is occurring.
 *
 * Won't run, if current user can manage options, so to not block
 * administrators.
 *
 * @since 4.7.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param bool   $is_flood  Is a comment flooding occurring?
 * @param string $ip        Comment author's IP address.
 * @param string $email     Comment author's email address.
 * @param string $date      MySQL time string.
 * @param bool   $avoid_die When true, a disallowed comment will result in the function
 *                          returning a WP_Error object, rather than executing wp_die().
 *                          Default false.
 * @return bool Whether comment flooding is occurring.
 */
function wp_check_comment_flood($is_flood, $ip, $email, $date, $avoid_die = \false)
{
}
/**
 * Separates an array of comments into an array keyed by comment_type.
 *
 * @since 2.7.0
 *
 * @param array $comments Array of comments
 * @return array Array of comments keyed by comment_type.
 */
function separate_comments(&$comments)
{
}
/**
 * Calculate the total number of comment pages.
 *
 * @since 2.7.0
 *
 * @uses Walker_Comment
 *
 * @global WP_Query $wp_query
 *
 * @param array $comments Optional array of WP_Comment objects. Defaults to $wp_query->comments
 * @param int   $per_page Optional comments per page.
 * @param bool  $threaded Optional control over flat or threaded comments.
 * @return int Number of comment pages.
 */
function get_comment_pages_count($comments = \null, $per_page = \null, $threaded = \null)
{
}
/**
 * Calculate what page number a comment will appear on for comment paging.
 *
 * @since 2.7.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param int   $comment_ID Comment ID.
 * @param array $args {
 *      Array of optional arguments.
 *      @type string     $type      Limit paginated comments to those matching a given type. Accepts 'comment',
 *                                  'trackback', 'pingback', 'pings' (trackbacks and pingbacks), or 'all'.
 *                                  Default is 'all'.
 *      @type int        $per_page  Per-page count to use when calculating pagination. Defaults to the value of the
 *                                  'comments_per_page' option.
 *      @type int|string $max_depth If greater than 1, comment page will be determined for the top-level parent of
 *                                  `$comment_ID`. Defaults to the value of the 'thread_comments_depth' option.
 * } *
 * @return int|null Comment page number or null on error.
 */
function get_page_of_comment($comment_ID, $args = array())
{
}
/**
 * Retrieves the maximum character lengths for the comment form fields.
 *
 * @since 4.5.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @return array Maximum character length for the comment form fields.
 */
function wp_get_comment_fields_max_lengths()
{
}
/**
 * Compares the lengths of comment data against the maximum character limits.
 *
 * @since 4.7.0
 *
 * @param array $comment_data Array of arguments for inserting a comment.
 * @return WP_Error|true WP_Error when a comment field exceeds the limit,
 *                       otherwise true.
 */
function wp_check_comment_data_max_lengths($comment_data)
{
}
/**
 * Does comment contain blacklisted characters or words.
 *
 * @since 1.5.0
 *
 * @param string $author The author of the comment
 * @param string $email The email of the comment
 * @param string $url The url used in the comment
 * @param string $comment The comment content
 * @param string $user_ip The comment author's IP address
 * @param string $user_agent The author's browser user agent
 * @return bool True if comment contains blacklisted content, false if comment does not
 */
function wp_blacklist_check($author, $email, $url, $comment, $user_ip, $user_agent)
{
}
/**
 * Retrieve total comments for blog or single post.
 *
 * The properties of the returned object contain the 'moderated', 'approved',
 * and spam comments for either the entire blog or single post. Those properties
 * contain the amount of comments that match the status. The 'total_comments'
 * property contains the integer of total comments.
 *
 * The comment stats are cached and then retrieved, if they already exist in the
 * cache.
 *
 * @since 2.5.0
 *
 * @param int $post_id Optional. Post ID.
 * @return object|array Comment stats.
 */
function wp_count_comments($post_id = 0)
{
}
/**
 * Trashes or deletes a comment.
 *
 * The comment is moved to trash instead of permanently deleted unless trash is
 * disabled, item is already in the trash, or $force_delete is true.
 *
 * The post comment count will be updated if the comment was approved and has a
 * post ID available.
 *
 * @since 2.0.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param int|WP_Comment $comment_id   Comment ID or WP_Comment object.
 * @param bool           $force_delete Whether to bypass trash and force deletion. Default is false.
 * @return bool True on success, false on failure.
 */
function wp_delete_comment($comment_id, $force_delete = \false)
{
}
/**
 * Moves a comment to the Trash
 *
 * If trash is disabled, comment is permanently deleted.
 *
 * @since 2.9.0
 *
 * @param int|WP_Comment $comment_id Comment ID or WP_Comment object.
 * @return bool True on success, false on failure.
 */
function wp_trash_comment($comment_id)
{
}
/**
 * Removes a comment from the Trash
 *
 * @since 2.9.0
 *
 * @param int|WP_Comment $comment_id Comment ID or WP_Comment object.
 * @return bool True on success, false on failure.
 */
function wp_untrash_comment($comment_id)
{
}
/**
 * Marks a comment as Spam
 *
 * @since 2.9.0
 *
 * @param int|WP_Comment $comment_id Comment ID or WP_Comment object.
 * @return bool True on success, false on failure.
 */
function wp_spam_comment($comment_id)
{
}
/**
 * Removes a comment from the Spam
 *
 * @since 2.9.0
 *
 * @param int|WP_Comment $comment_id Comment ID or WP_Comment object.
 * @return bool True on success, false on failure.
 */
function wp_unspam_comment($comment_id)
{
}
/**
 * The status of a comment by ID.
 *
 * @since 1.0.0
 *
 * @param int|WP_Comment $comment_id Comment ID or WP_Comment object
 * @return false|string Status might be 'trash', 'approved', 'unapproved', 'spam'. False on failure.
 */
function wp_get_comment_status($comment_id)
{
}
/**
 * Call hooks for when a comment status transition occurs.
 *
 * Calls hooks for comment status transitions. If the new comment status is not the same
 * as the previous comment status, then two hooks will be ran, the first is
 * {@see 'transition_comment_status'} with new status, old status, and comment data. The
 * next action called is {@see comment_$old_status_to_$new_status'}. It has the
 * comment data.
 *
 * The final action will run whether or not the comment statuses are the same. The
 * action is named {@see 'comment_$new_status_$comment->comment_type'}.
 *
 * @since 2.7.0
 *
 * @param string $new_status New comment status.
 * @param string $old_status Previous comment status.
 * @param object $comment Comment data.
 */
function wp_transition_comment_status($new_status, $old_status, $comment)
{
}
/**
 * Clear the lastcommentmodified cached value when a comment status is changed.
 *
 * Deletes the lastcommentmodified cache key when a comment enters or leaves
 * 'approved' status.
 *
 * @since 4.7.0
 * @access private
 *
 * @param string $new_status The new comment status.
 * @param string $old_status The old comment status.
 */
function _clear_modified_cache_on_transition_comment_status($new_status, $old_status)
{
}
/**
 * Get current commenter's name, email, and URL.
 *
 * Expects cookies content to already be sanitized. User of this function might
 * wish to recheck the returned array for validity.
 *
 * @see sanitize_comment_cookies() Use to sanitize cookies
 *
 * @since 2.0.4
 *
 * @return array Comment author, email, url respectively.
 */
function wp_get_current_commenter()
{
}
/**
 * Inserts a comment into the database.
 *
 * @since 2.0.0
 * @since 4.4.0 Introduced `$comment_meta` argument.
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param array $commentdata {
 *     Array of arguments for inserting a new comment.
 *
 *     @type string     $comment_agent        The HTTP user agent of the `$comment_author` when
 *                                            the comment was submitted. Default empty.
 *     @type int|string $comment_approved     Whether the comment has been approved. Default 1.
 *     @type string     $comment_author       The name of the author of the comment. Default empty.
 *     @type string     $comment_author_email The email address of the `$comment_author`. Default empty.
 *     @type string     $comment_author_IP    The IP address of the `$comment_author`. Default empty.
 *     @type string     $comment_author_url   The URL address of the `$comment_author`. Default empty.
 *     @type string     $comment_content      The content of the comment. Default empty.
 *     @type string     $comment_date         The date the comment was submitted. To set the date
 *                                            manually, `$comment_date_gmt` must also be specified.
 *                                            Default is the current time.
 *     @type string     $comment_date_gmt     The date the comment was submitted in the GMT timezone.
 *                                            Default is `$comment_date` in the site's GMT timezone.
 *     @type int        $comment_karma        The karma of the comment. Default 0.
 *     @type int        $comment_parent       ID of this comment's parent, if any. Default 0.
 *     @type int        $comment_post_ID      ID of the post that relates to the comment, if any.
 *                                            Default 0.
 *     @type string     $comment_type         Comment type. Default empty.
 *     @type array      $comment_meta         Optional. Array of key/value pairs to be stored in commentmeta for the
 *                                            new comment.
 *     @type int        $user_id              ID of the user who submitted the comment. Default 0.
 * }
 * @return int|false The new comment's ID on success, false on failure.
 */
function wp_insert_comment($commentdata)
{
}
/**
 * Filters and sanitizes comment data.
 *
 * Sets the comment data 'filtered' field to true when finished. This can be
 * checked as to whether the comment should be filtered and to keep from
 * filtering the same comment more than once.
 *
 * @since 2.0.0
 *
 * @param array $commentdata Contains information on the comment.
 * @return array Parsed comment information.
 */
function wp_filter_comment($commentdata)
{
}
/**
 * Whether a comment should be blocked because of comment flood.
 *
 * @since 2.1.0
 *
 * @param bool $block Whether plugin has already blocked comment.
 * @param int $time_lastcomment Timestamp for last comment.
 * @param int $time_newcomment Timestamp for new comment.
 * @return bool Whether comment should be blocked.
 */
function wp_throttle_comment_flood($block, $time_lastcomment, $time_newcomment)
{
}
/**
 * Adds a new comment to the database.
 *
 * Filters new comment to ensure that the fields are sanitized and valid before
 * inserting comment into database. Calls {@see 'comment_post'} action with comment ID
 * and whether comment is approved by WordPress. Also has {@see 'preprocess_comment'}
 * filter for processing the comment data before the function handles it.
 *
 * We use `REMOTE_ADDR` here directly. If you are behind a proxy, you should ensure
 * that it is properly set, such as in wp-config.php, for your environment.
 *
 * See {@link https://core.trac.wordpress.org/ticket/9235}
 *
 * @since 1.5.0
 * @since 4.3.0 'comment_agent' and 'comment_author_IP' can be set via `$commentdata`.
 * @since 4.7.0 The `$avoid_die` parameter was added, allowing the function to
 *              return a WP_Error object instead of dying.
 *
 * @see wp_insert_comment()
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param array $commentdata {
 *     Comment data.
 *
 *     @type string $comment_author       The name of the comment author.
 *     @type string $comment_author_email The comment author email address.
 *     @type string $comment_author_url   The comment author URL.
 *     @type string $comment_content      The content of the comment.
 *     @type string $comment_date         The date the comment was submitted. Default is the current time.
 *     @type string $comment_date_gmt     The date the comment was submitted in the GMT timezone.
 *                                        Default is `$comment_date` in the GMT timezone.
 *     @type int    $comment_parent       The ID of this comment's parent, if any. Default 0.
 *     @type int    $comment_post_ID      The ID of the post that relates to the comment.
 *     @type int    $user_id              The ID of the user who submitted the comment. Default 0.
 *     @type int    $user_ID              Kept for backward-compatibility. Use `$user_id` instead.
 *     @type string $comment_agent        Comment author user agent. Default is the value of 'HTTP_USER_AGENT'
 *                                        in the `$_SERVER` superglobal sent in the original request.
 *     @type string $comment_author_IP    Comment author IP address in IPv4 format. Default is the value of
 *                                        'REMOTE_ADDR' in the `$_SERVER` superglobal sent in the original request.
 * }
 * @param bool $avoid_die Should errors be returned as WP_Error objects instead of
 *                        executing wp_die()? Default false.
 * @return int|false|WP_Error The ID of the comment on success, false or WP_Error on failure.
 */
function wp_new_comment($commentdata, $avoid_die = \false)
{
}
/**
 * Send a comment moderation notification to the comment moderator.
 *
 * @since 4.4.0
 *
 * @param int $comment_ID ID of the comment.
 * @return bool True on success, false on failure.
 */
function wp_new_comment_notify_moderator($comment_ID)
{
}
/**
 * Send a notification of a new comment to the post author.
 *
 * @since 4.4.0
 *
 * Uses the {@see 'notify_post_author'} filter to determine whether the post author
 * should be notified when a new comment is added, overriding site setting.
 *
 * @param int $comment_ID Comment ID.
 * @return bool True on success, false on failure.
 */
function wp_new_comment_notify_postauthor($comment_ID)
{
}
/**
 * Sets the status of a comment.
 *
 * The {@see 'wp_set_comment_status'} action is called after the comment is handled.
 * If the comment status is not in the list, then false is returned.
 *
 * @since 1.0.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param int|WP_Comment $comment_id     Comment ID or WP_Comment object.
 * @param string         $comment_status New comment status, either 'hold', 'approve', 'spam', or 'trash'.
 * @param bool           $wp_error       Whether to return a WP_Error object if there is a failure. Default is false.
 * @return bool|WP_Error True on success, false or WP_Error on failure.
 */
function wp_set_comment_status($comment_id, $comment_status, $wp_error = \false)
{
}
/**
 * Updates an existing comment in the database.
 *
 * Filters the comment and makes sure certain fields are valid before updating.
 *
 * @since 2.0.0
 * @since 4.9.0 Add updating comment meta during comment update.
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param array $commentarr Contains information on the comment.
 * @return int Comment was updated if value is 1, or was not updated if value is 0.
 */
function wp_update_comment($commentarr)
{
}
/**
 * Whether to defer comment counting.
 *
 * When setting $defer to true, all post comment counts will not be updated
 * until $defer is set to false. When $defer is set to false, then all
 * previously deferred updated post comment counts will then be automatically
 * updated without having to call wp_update_comment_count() after.
 *
 * @since 2.5.0
 * @staticvar bool $_defer
 *
 * @param bool $defer
 * @return bool
 */
function wp_defer_comment_counting($defer = \null)
{
}
/**
 * Updates the comment count for post(s).
 *
 * When $do_deferred is false (is by default) and the comments have been set to
 * be deferred, the post_id will be added to a queue, which will be updated at a
 * later date and only updated once per post ID.
 *
 * If the comments have not be set up to be deferred, then the post will be
 * updated. When $do_deferred is set to true, then all previous deferred post
 * IDs will be updated along with the current $post_id.
 *
 * @since 2.1.0
 * @see wp_update_comment_count_now() For what could cause a false return value
 *
 * @staticvar array $_deferred
 *
 * @param int|null $post_id     Post ID.
 * @param bool     $do_deferred Optional. Whether to process previously deferred
 *                              post comment counts. Default false.
 * @return bool|void True on success, false on failure or if post with ID does
 *                   not exist.
 */
function wp_update_comment_count($post_id, $do_deferred = \false)
{
}
/**
 * Updates the comment count for the post.
 *
 * @since 2.5.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param int $post_id Post ID
 * @return bool True on success, false on '0' $post_id or if post with ID does not exist.
 */
function wp_update_comment_count_now($post_id)
{
}
//
// Ping and trackback functions.
//
/**
 * Finds a pingback server URI based on the given URL.
 *
 * Checks the HTML for the rel="pingback" link and x-pingback headers. It does
 * a check for the x-pingback headers first and returns that, if available. The
 * check for the rel="pingback" has more overhead than just the header.
 *
 * @since 1.5.0
 *
 * @param string $url URL to ping.
 * @param int $deprecated Not Used.
 * @return false|string False on failure, string containing URI on success.
 */
function discover_pingback_server_uri($url, $deprecated = '')
{
}
/**
 * Perform all pingbacks, enclosures, trackbacks, and send to pingback services.
 *
 * @since 2.1.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 */
function do_all_pings()
{
}
/**
 * Perform trackbacks.
 *
 * @since 1.5.0
 * @since 4.7.0 $post_id can be a WP_Post object.
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param int|WP_Post $post_id Post object or ID to do trackbacks on.
 */
function do_trackbacks($post_id)
{
}
/**
 * Sends pings to all of the ping site services.
 *
 * @since 1.2.0
 *
 * @param int $post_id Post ID.
 * @return int Same as Post ID from parameter
 */
function generic_ping($post_id = 0)
{
}
/**
 * Pings back the links found in a post.
 *
 * @since 0.71
 * @since 4.7.0 $post_id can be a WP_Post object.
 *
 * @param string $content Post content to check for links. If empty will retrieve from post.
 * @param int|WP_Post $post_id Post Object or ID.
 */
function pingback($content, $post_id)
{
}
/**
 * Check whether blog is public before returning sites.
 *
 * @since 2.1.0
 *
 * @param mixed $sites Will return if blog is public, will not return if not public.
 * @return mixed Empty string if blog is not public, returns $sites, if site is public.
 */
function privacy_ping_filter($sites)
{
}
/**
 * Send a Trackback.
 *
 * Updates database when sending trackback to prevent duplicates.
 *
 * @since 0.71
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param string $trackback_url URL to send trackbacks.
 * @param string $title Title of post.
 * @param string $excerpt Excerpt of post.
 * @param int $ID Post ID.
 * @return int|false|void Database query from update.
 */
function trackback($trackback_url, $title, $excerpt, $ID)
{
}
/**
 * Send a pingback.
 *
 * @since 1.2.0
 *
 * @param string $server Host of blog to connect to.
 * @param string $path Path to send the ping.
 */
function weblog_ping($server = '', $path = '')
{
}
/**
 * Default filter attached to pingback_ping_source_uri to validate the pingback's Source URI
 *
 * @since 3.5.1
 * @see wp_http_validate_url()
 *
 * @param string $source_uri
 * @return string
 */
function pingback_ping_source_uri($source_uri)
{
}
/**
 * Default filter attached to xmlrpc_pingback_error.
 *
 * Returns a generic pingback error code unless the error code is 48,
 * which reports that the pingback is already registered.
 *
 * @since 3.5.1
 * @link https://www.hixie.ch/specs/pingback/pingback#TOC3
 *
 * @param IXR_Error $ixr_error
 * @return IXR_Error
 */
function xmlrpc_pingback_error($ixr_error)
{
}
//
// Cache
//
/**
 * Removes a comment from the object cache.
 *
 * @since 2.3.0
 *
 * @param int|array $ids Comment ID or an array of comment IDs to remove from cache.
 */
function clean_comment_cache($ids)
{
}
/**
 * Updates the comment cache of given comments.
 *
 * Will add the comments in $comments to the cache. If comment ID already exists
 * in the comment cache then it will not be updated. The comment is added to the
 * cache using the comment group with the key using the ID of the comments.
 *
 * @since 2.3.0
 * @since 4.4.0 Introduced the `$update_meta_cache` parameter.
 *
 * @param array $comments          Array of comment row objects
 * @param bool  $update_meta_cache Whether to update commentmeta cache. Default true.
 */
function update_comment_cache($comments, $update_meta_cache = \true)
{
}
/**
 * Adds any comments from the given IDs to the cache that do not already exist in cache.
 *
 * @since 4.4.0
 * @access private
 *
 * @see update_comment_cache()
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param array $comment_ids       Array of comment IDs.
 * @param bool  $update_meta_cache Optional. Whether to update the meta cache. Default true.
 */
function _prime_comment_caches($comment_ids, $update_meta_cache = \true)
{
}
//
// Internal
//
/**
 * Close comments on old posts on the fly, without any extra DB queries. Hooked to the_posts.
 *
 * @access private
 * @since 2.7.0
 *
 * @param WP_Post  $posts Post data object.
 * @param WP_Query $query Query object.
 * @return array
 */
function _close_comments_for_old_posts($posts, $query)
{
}
/**
 * Close comments on an old post. Hooked to comments_open and pings_open.
 *
 * @access private
 * @since 2.7.0
 *
 * @param bool $open Comments open or closed
 * @param int $post_id Post ID
 * @return bool $open
 */
function _close_comments_for_old_post($open, $post_id)
{
}
/**
 * Handles the submission of a comment, usually posted to wp-comments-post.php via a comment form.
 *
 * This function expects unslashed data, as opposed to functions such as `wp_new_comment()` which
 * expect slashed data.
 *
 * @since 4.4.0
 *
 * @param array $comment_data {
 *     Comment data.
 *
 *     @type string|int $comment_post_ID             The ID of the post that relates to the comment.
 *     @type string     $author                      The name of the comment author.
 *     @type string     $email                       The comment author email address.
 *     @type string     $url                         The comment author URL.
 *     @type string     $comment                     The content of the comment.
 *     @type string|int $comment_parent              The ID of this comment's parent, if any. Default 0.
 *     @type string     $_wp_unfiltered_html_comment The nonce value for allowing unfiltered HTML.
 * }
 * @return WP_Comment|WP_Error A WP_Comment object on success, a WP_Error object on failure.
 */
function wp_handle_comment_submission($comment_data)
{
}
/**
 * Registers the personal data exporter for comments.
 *
 * @since 4.9.6
 *
 * @param array $exporters An array of personal data exporters.
 * @return array $exporters An array of personal data exporters.
 */
function wp_register_comment_personal_data_exporter($exporters)
{
}
/**
 * Finds and exports personal data associated with an email address from the comments table.
 *
 * @since 4.9.6
 *
 * @param string $email_address The comment author email address.
 * @param int    $page          Comment page.
 * @return array $return An array of personal data.
 */
function wp_comments_personal_data_exporter($email_address, $page = 1)
{
}
/**
 * Registers the personal data eraser for comments.
 *
 * @since 4.9.6
 *
 * @param  array $erasers An array of personal data erasers.
 * @return array $erasers An array of personal data erasers.
 */
function wp_register_comment_personal_data_eraser($erasers)
{
}
/**
 * Erases personal data associated with an email address from the comments table.
 *
 * @since 4.9.6
 *
 * @param  string $email_address The comment author email address.
 * @param  int    $page          Comment page.
 * @return array
 */
function wp_comments_personal_data_eraser($email_address, $page = 1)
{
}
/**
 * WordPress Cron API
 *
 * @package WordPress
 */
/**
 * Schedules an event to run only once.
 *
 * Schedules an event which will execute once by the WordPress actions core at
 * a time which you specify. The action will fire off when someone visits your
 * WordPress site, if the schedule time has passed.
 *
 * Note that scheduling an event to occur within 10 minutes of an existing event
 * with the same action hook will be ignored unless you pass unique `$args` values
 * for each scheduled event.
 *
 * @since 2.1.0
 * @link https://codex.wordpress.org/Function_Reference/wp_schedule_single_event
 *
 * @param int $timestamp Unix timestamp (UTC) for when to run the event.
 * @param string $hook Action hook to execute when event is run.
 * @param array $args Optional. Arguments to pass to the hook's callback function.
 * @return false|void False if the event does not get scheduled.
 */
function wp_schedule_single_event($timestamp, $hook, $args = array())
{
}
/**
 * Schedule a recurring event.
 *
 * Schedules a hook which will be executed by the WordPress actions core on a
 * specific interval, specified by you. The action will trigger when someone
 * visits your WordPress site, if the scheduled time has passed.
 *
 * Valid values for the recurrence are hourly, daily, and twicedaily. These can
 * be extended using the {@see 'cron_schedules'} filter in wp_get_schedules().
 *
 * Use wp_next_scheduled() to prevent duplicates
 *
 * @since 2.1.0
 *
 * @param int $timestamp Unix timestamp (UTC) for when to run the event.
 * @param string $recurrence How often the event should recur.
 * @param string $hook Action hook to execute when event is run.
 * @param array $args Optional. Arguments to pass to the hook's callback function.
 * @return false|void False if the event does not get scheduled.
 */
function wp_schedule_event($timestamp, $recurrence, $hook, $args = array())
{
}
/**
 * Reschedule a recurring event.
 *
 * @since 2.1.0
 *
 * @param int $timestamp Unix timestamp (UTC) for when to run the event.
 * @param string $recurrence How often the event should recur.
 * @param string $hook Action hook to execute when event is run.
 * @param array $args Optional. Arguments to pass to the hook's callback function.
 * @return false|void False if the event does not get rescheduled.
 */
function wp_reschedule_event($timestamp, $recurrence, $hook, $args = array())
{
}
/**
 * Unschedule a previously scheduled event.
 *
 * The $timestamp and $hook parameters are required so that the event can be
 * identified.
 *
 * @since 2.1.0
 *
 * @param int $timestamp Unix timestamp (UTC) for when to run the event.
 * @param string $hook Action hook, the execution of which will be unscheduled.
 * @param array $args Arguments to pass to the hook's callback function.
 * Although not passed to a callback function, these arguments are used
 * to uniquely identify the scheduled event, so they should be the same
 * as those used when originally scheduling the event.
 * @return false|void False if the event does not get unscheduled.
 */
function wp_unschedule_event($timestamp, $hook, $args = array())
{
}
/**
 * Unschedules all events attached to the hook with the specified arguments.
 *
 * @since 2.1.0
 *
 * @param string $hook Action hook, the execution of which will be unscheduled.
 * @param array $args Optional. Arguments that were to be passed to the hook's callback function.
 */
function wp_clear_scheduled_hook($hook, $args = array())
{
}
/**
 * Unschedules all events attached to the hook.
 *
 * Can be useful for plugins when deactivating to clean up the cron queue.
 *
 * @since 4.9.0
 *
 * @param string $hook Action hook, the execution of which will be unscheduled.
 */
function wp_unschedule_hook($hook)
{
}
/**
 * Retrieve the next timestamp for an event.
 *
 * @since 2.1.0
 *
 * @param string $hook Action hook to execute when event is run.
 * @param array $args Optional. Arguments to pass to the hook's callback function.
 * @return false|int The Unix timestamp of the next time the scheduled event will occur.
 */
function wp_next_scheduled($hook, $args = array())
{
}
/**
 * Sends a request to run cron through HTTP request that doesn't halt page loading.
 *
 * @since 2.1.0
 *
 * @param int $gmt_time Optional. Unix timestamp (UTC). Default 0 (current time is used).
 */
function spawn_cron($gmt_time = 0)
{
}
/**
 * Run scheduled callbacks or spawn cron for all scheduled events.
 *
 * @since 2.1.0
 */
function wp_cron()
{
}
/**
 * Retrieve supported event recurrence schedules.
 *
 * The default supported recurrences are 'hourly', 'twicedaily', and 'daily'. A plugin may
 * add more by hooking into the {@see 'cron_schedules'} filter. The filter accepts an array
 * of arrays. The outer array has a key that is the name of the schedule or for
 * example 'weekly'. The value is an array with two keys, one is 'interval' and
 * the other is 'display'.
 *
 * The 'interval' is a number in seconds of when the cron job should run. So for
 * 'hourly', the time is 3600 or 60*60. For weekly, the value would be
 * 60*60*24*7 or 604800. The value of 'interval' would then be 604800.
 *
 * The 'display' is the description. For the 'weekly' key, the 'display' would
 * be `__( 'Once Weekly' )`.
 *
 * For your plugin, you will be passed an array. you can easily add your
 * schedule by doing the following.
 *
 *     // Filter parameter variable name is 'array'.
 *     $array['weekly'] = array(
 *         'interval' => 604800,
 *     	   'display'  => __( 'Once Weekly' )
 *     );
 *
 *
 * @since 2.1.0
 *
 * @return array
 */
function wp_get_schedules()
{
}
/**
 * Retrieve the recurrence schedule for an event.
 *
 * @see wp_get_schedules() for available schedules.
 *
 * @since 2.1.0
 *
 * @param string $hook Action hook to identify the event.
 * @param array $args Optional. Arguments passed to the event's callback function.
 * @return string|false False, if no schedule. Schedule name on success.
 */
function wp_get_schedule($hook, $args = array())
{
}
//
// Private functions
//
/**
 * Retrieve cron info array option.
 *
 * @since 2.1.0
 * @access private
 *
 * @return false|array CRON info array.
 */
function _get_cron_array()
{
}
/**
 * Updates the CRON option with the new CRON array.
 *
 * @since 2.1.0
 * @access private
 *
 * @param array $cron Cron info array from _get_cron_array().
 */
function _set_cron_array($cron)
{
}
/**
 * Upgrade a Cron info array.
 *
 * This function upgrades the Cron info array to version 2.
 *
 * @since 2.1.0
 * @access private
 *
 * @param array $cron Cron info array from _get_cron_array().
 * @return array An upgraded Cron info array.
 */
function _upgrade_cron_array($cron)
{
}
/**
 * Defines constants and global variables that can be overridden, generally in wp-config.php.
 *
 * @package WordPress
 */
/**
 * Defines initial WordPress constants
 *
 * @see wp_debug_mode()
 *
 * @since 3.0.0
 *
 * @global int    $blog_id    The current site ID.
 * @global string $wp_version The WordPress version string.
 */
function wp_initial_constants()
{
}
/**
 * Defines plugin directory WordPress constants
 *
 * Defines must-use plugin directory constants, which may be overridden in the sunrise.php drop-in
 *
 * @since 3.0.0
 */
function wp_plugin_directory_constants()
{
}
/**
 * Defines cookie related WordPress constants
 *
 * Defines constants after multisite is loaded.
 * @since 3.0.0
 */
function wp_cookie_constants()
{
}
/**
 * Defines cookie related WordPress constants
 *
 * @since 3.0.0
 */
function wp_ssl_constants()
{
}
/**
 * Defines functionality related WordPress constants
 *
 * @since 3.0.0
 */
function wp_functionality_constants()
{
}
/**
 * Defines templating related WordPress constants
 *
 * @since 3.0.0
 */
function wp_templating_constants()
{
}
/**
 * Deprecated functions from past WordPress versions. You shouldn't use these
 * functions and look for the alternatives instead. The functions will be
 * removed in a later version.
 *
 * @package WordPress
 * @subpackage Deprecated
 */
/*
 * Deprecated functions come here to die.
 */
/**
 * Retrieves all post data for a given post.
 *
 * @since 0.71
 * @deprecated 1.5.1 Use get_post()
 * @see get_post()
 *
 * @param int $postid Post ID.
 * @return array Post data.
 */
function get_postdata($postid)
{
}
/**
 * Sets up the WordPress Loop.
 *
 * Use The Loop instead.
 *
 * @link https://codex.wordpress.org/The_Loop
 *
 * @since 1.0.1
 * @deprecated 1.5.0
 */
function start_wp()
{
}
/**
 * Returns or prints a category ID.
 *
 * @since 0.71
 * @deprecated 0.71 Use get_the_category()
 * @see get_the_category()
 *
 * @param bool $echo Optional. Whether to echo the output. Default true.
 * @return int Category ID.
 */
function the_category_ID($echo = \true)
{
}
/**
 * Prints a category with optional text before and after.
 *
 * @since 0.71
 * @deprecated 0.71 Use get_the_category_by_ID()
 * @see get_the_category_by_ID()
 *
 * @param string $before Optional. Text to display before the category. Default empty.
 * @param string $after  Optional. Text to display after the category. Default empty.
 */
function the_category_head($before = '', $after = '')
{
}
/**
 * Prints a link to the previous post.
 *
 * @since 1.5.0
 * @deprecated 2.0.0 Use previous_post_link()
 * @see previous_post_link()
 *
 * @param string $format
 * @param string $previous
 * @param string $title
 * @param string $in_same_cat
 * @param int    $limitprev
 * @param string $excluded_categories
 */
function previous_post($format = '%', $previous = 'previous post: ', $title = 'yes', $in_same_cat = 'no', $limitprev = 1, $excluded_categories = '')
{
}
/**
 * Prints link to the next post.
 *
 * @since 0.71
 * @deprecated 2.0.0 Use next_post_link()
 * @see next_post_link()
 *
 * @param string $format
 * @param string $next
 * @param string $title
 * @param string $in_same_cat
 * @param int $limitnext
 * @param string $excluded_categories
 */
function next_post($format = '%', $next = 'next post: ', $title = 'yes', $in_same_cat = 'no', $limitnext = 1, $excluded_categories = '')
{
}
/**
 * Whether user can create a post.
 *
 * @since 1.5.0
 * @deprecated 2.0.0 Use current_user_can()
 * @see current_user_can()
 *
 * @param int $user_id
 * @param int $blog_id Not Used
 * @param int $category_id Not Used
 * @return bool
 */
function user_can_create_post($user_id, $blog_id = 1, $category_id = 'None')
{
}
/**
 * Whether user can create a post.
 *
 * @since 1.5.0
 * @deprecated 2.0.0 Use current_user_can()
 * @see current_user_can()
 *
 * @param int $user_id
 * @param int $blog_id Not Used
 * @param int $category_id Not Used
 * @return bool
 */
function user_can_create_draft($user_id, $blog_id = 1, $category_id = 'None')
{
}
/**
 * Whether user can edit a post.
 *
 * @since 1.5.0
 * @deprecated 2.0.0 Use current_user_can()
 * @see current_user_can()
 *
 * @param int $user_id
 * @param int $post_id
 * @param int $blog_id Not Used
 * @return bool
 */
function user_can_edit_post($user_id, $post_id, $blog_id = 1)
{
}
/**
 * Whether user can delete a post.
 *
 * @since 1.5.0
 * @deprecated 2.0.0 Use current_user_can()
 * @see current_user_can()
 *
 * @param int $user_id
 * @param int $post_id
 * @param int $blog_id Not Used
 * @return bool
 */
function user_can_delete_post($user_id, $post_id, $blog_id = 1)
{
}
/**
 * Whether user can set new posts' dates.
 *
 * @since 1.5.0
 * @deprecated 2.0.0 Use current_user_can()
 * @see current_user_can()
 *
 * @param int $user_id
 * @param int $blog_id Not Used
 * @param int $category_id Not Used
 * @return bool
 */
function user_can_set_post_date($user_id, $blog_id = 1, $category_id = 'None')
{
}
/**
 * Whether user can delete a post.
 *
 * @since 1.5.0
 * @deprecated 2.0.0 Use current_user_can()
 * @see current_user_can()
 *
 * @param int $user_id
 * @param int $post_id
 * @param int $blog_id Not Used
 * @return bool returns true if $user_id can edit $post_id's date
 */
function user_can_edit_post_date($user_id, $post_id, $blog_id = 1)
{
}
/**
 * Whether user can delete a post.
 *
 * @since 1.5.0
 * @deprecated 2.0.0 Use current_user_can()
 * @see current_user_can()
 *
 * @param int $user_id
 * @param int $post_id
 * @param int $blog_id Not Used
 * @return bool returns true if $user_id can edit $post_id's comments
 */
function user_can_edit_post_comments($user_id, $post_id, $blog_id = 1)
{
}
/**
 * Whether user can delete a post.
 *
 * @since 1.5.0
 * @deprecated 2.0.0 Use current_user_can()
 * @see current_user_can()
 *
 * @param int $user_id
 * @param int $post_id
 * @param int $blog_id Not Used
 * @return bool returns true if $user_id can delete $post_id's comments
 */
function user_can_delete_post_comments($user_id, $post_id, $blog_id = 1)
{
}
/**
 * Can user can edit other user.
 *
 * @since 1.5.0
 * @deprecated 2.0.0 Use current_user_can()
 * @see current_user_can()
 *
 * @param int $user_id
 * @param int $other_user
 * @return bool
 */
function user_can_edit_user($user_id, $other_user)
{
}
/**
 * Gets the links associated with category $cat_name.
 *
 * @since 0.71
 * @deprecated 2.1.0 Use get_bookmarks()
 * @see get_bookmarks()
 *
 * @param string $cat_name Optional. The category name to use. If no match is found uses all.
 * @param string $before Optional. The html to output before the link.
 * @param string $after Optional. The html to output after the link.
 * @param string $between Optional. The html to output between the link/image and its description. Not used if no image or $show_images is true.
 * @param bool $show_images Optional. Whether to show images (if defined).
 * @param string $orderby Optional. The order to output the links. E.g. 'id', 'name', 'url', 'description' or 'rating'. Or maybe owner.
 *		If you start the name with an underscore the order will be reversed. You can also specify 'rand' as the order which will return links in a
 *		random order.
 * @param bool $show_description Optional. Whether to show the description if show_images=false/not defined.
 * @param bool $show_rating Optional. Show rating stars/chars.
 * @param int $limit		Optional. Limit to X entries. If not specified, all entries are shown.
 * @param int $show_updated Optional. Whether to show last updated timestamp
 */
function get_linksbyname($cat_name = "noname", $before = '', $after = '<br />', $between = " ", $show_images = \true, $orderby = 'id', $show_description = \true, $show_rating = \false, $limit = -1, $show_updated = 0)
{
}
/**
 * Gets the links associated with the named category.
 *
 * @since 1.0.1
 * @deprecated 2.1.0 Use wp_list_bookmarks()
 * @see wp_list_bookmarks()
 *
 * @param string $category The category to use.
 * @param string $args
 * @return string|null
 */
function wp_get_linksbyname($category, $args = '')
{
}
/**
 * Gets an array of link objects associated with category $cat_name.
 *
 *     $links = get_linkobjectsbyname( 'fred' );
 *     foreach ( $links as $link ) {
 *      	echo '<li>' . $link->link_name . '</li>';
 *     }
 *
 * @since 1.0.1
 * @deprecated 2.1.0 Use get_bookmarks()
 * @see get_bookmarks()
 *
 * @param string $cat_name The category name to use. If no match is found uses all.
 * @param string $orderby The order to output the links. E.g. 'id', 'name', 'url', 'description', or 'rating'.
 *		Or maybe owner. If you start the name with an underscore the order will be reversed. You can also
 *		specify 'rand' as the order which will return links in a random order.
 * @param int $limit Limit to X entries. If not specified, all entries are shown.
 * @return array
 */
function get_linkobjectsbyname($cat_name = "noname", $orderby = 'name', $limit = -1)
{
}
/**
 * Gets an array of link objects associated with category n.
 *
 * Usage:
 *
 *     $links = get_linkobjects(1);
 *     if ($links) {
 *     	foreach ($links as $link) {
 *     		echo '<li>'.$link->link_name.'<br />'.$link->link_description.'</li>';
 *     	}
 *     }
 *
 * Fields are:
 *
 * - link_id
 * - link_url
 * - link_name
 * - link_image
 * - link_target
 * - link_category
 * - link_description
 * - link_visible
 * - link_owner
 * - link_rating
 * - link_updated
 * - link_rel
 * - link_notes
 *
 * @since 1.0.1
 * @deprecated 2.1.0 Use get_bookmarks()
 * @see get_bookmarks()
 *
 * @param int $category The category to use. If no category supplied uses all
 * @param string $orderby the order to output the links. E.g. 'id', 'name', 'url',
 *		'description', or 'rating'. Or maybe owner. If you start the name with an
 *		underscore the order will be reversed. You can also specify 'rand' as the
 *		order which will return links in a random order.
 * @param int $limit Limit to X entries. If not specified, all entries are shown.
 * @return array
 */
function get_linkobjects($category = 0, $orderby = 'name', $limit = 0)
{
}
/**
 * Gets the links associated with category 'cat_name' and display rating stars/chars.
 *
 * @since 0.71
 * @deprecated 2.1.0 Use get_bookmarks()
 * @see get_bookmarks()
 *
 * @param string $cat_name The category name to use. If no match is found uses all
 * @param string $before The html to output before the link
 * @param string $after The html to output after the link
 * @param string $between The html to output between the link/image and its description. Not used if no image or show_images is true
 * @param bool $show_images Whether to show images (if defined).
 * @param string $orderby the order to output the links. E.g. 'id', 'name', 'url',
 *		'description', or 'rating'. Or maybe owner. If you start the name with an
 *		underscore the order will be reversed. You can also specify 'rand' as the
 *		order which will return links in a random order.
 * @param bool $show_description Whether to show the description if show_images=false/not defined
 * @param int $limit Limit to X entries. If not specified, all entries are shown.
 * @param int $show_updated Whether to show last updated timestamp
 */
function get_linksbyname_withrating($cat_name = "noname", $before = '', $after = '<br />', $between = " ", $show_images = \true, $orderby = 'id', $show_description = \true, $limit = -1, $show_updated = 0)
{
}
/**
 * Gets the links associated with category n and display rating stars/chars.
 *
 * @since 0.71
 * @deprecated 2.1.0 Use get_bookmarks()
 * @see get_bookmarks()
 *
 * @param int $category The category to use. If no category supplied uses all
 * @param string $before The html to output before the link
 * @param string $after The html to output after the link
 * @param string $between The html to output between the link/image and its description. Not used if no image or show_images == true
 * @param bool $show_images Whether to show images (if defined).
 * @param string $orderby The order to output the links. E.g. 'id', 'name', 'url',
 *		'description', or 'rating'. Or maybe owner. If you start the name with an
 *		underscore the order will be reversed. You can also specify 'rand' as the
 *		order which will return links in a random order.
 * @param bool $show_description Whether to show the description if show_images=false/not defined.
 * @param int $limit Limit to X entries. If not specified, all entries are shown.
 * @param int $show_updated Whether to show last updated timestamp
 */
function get_links_withrating($category = -1, $before = '', $after = '<br />', $between = " ", $show_images = \true, $orderby = 'id', $show_description = \true, $limit = -1, $show_updated = 0)
{
}
/**
 * Gets the auto_toggle setting.
 *
 * @since 0.71
 * @deprecated 2.1.0
 *
 * @param int $id The category to get. If no category supplied uses 0
 * @return int Only returns 0.
 */
function get_autotoggle($id = 0)
{
}
/**
 * Lists categories.
 *
 * @since 0.71
 * @deprecated 2.1.0 Use wp_list_categories()
 * @see wp_list_categories()
 *
 * @param int $optionall
 * @param string $all
 * @param string $sort_column
 * @param string $sort_order
 * @param string $file
 * @param bool $list
 * @param int $optiondates
 * @param int $optioncount
 * @param int $hide_empty
 * @param int $use_desc_for_title
 * @param bool $children
 * @param int $child_of
 * @param int $categories
 * @param int $recurse
 * @param string $feed
 * @param string $feed_image
 * @param string $exclude
 * @param bool $hierarchical
 * @return false|null
 */
function list_cats($optionall = 1, $all = 'All', $sort_column = 'ID', $sort_order = 'asc', $file = '', $list = \true, $optiondates = 0, $optioncount = 0, $hide_empty = 1, $use_desc_for_title = 1, $children = \false, $child_of = 0, $categories = 0, $recurse = 0, $feed = '', $feed_image = '', $exclude = '', $hierarchical = \false)
{
}
/**
 * Lists categories.
 *
 * @since 1.2.0
 * @deprecated 2.1.0 Use wp_list_categories()
 * @see wp_list_categories()
 *
 * @param string|array $args
 * @return false|null|string
 */
function wp_list_cats($args = '')
{
}
/**
 * Deprecated method for generating a drop-down of categories.
 *
 * @since 0.71
 * @deprecated 2.1.0 Use wp_dropdown_categories()
 * @see wp_dropdown_categories()
 *
 * @param int $optionall
 * @param string $all
 * @param string $orderby
 * @param string $order
 * @param int $show_last_update
 * @param int $show_count
 * @param int $hide_empty
 * @param bool $optionnone
 * @param int $selected
 * @param int $exclude
 * @return string
 */
function dropdown_cats($optionall = 1, $all = 'All', $orderby = 'ID', $order = 'asc', $show_last_update = 0, $show_count = 0, $hide_empty = 1, $optionnone = \false, $selected = 0, $exclude = 0)
{
}
/**
 * Lists authors.
 *
 * @since 1.2.0
 * @deprecated 2.1.0 Use wp_list_authors()
 * @see wp_list_authors()
 *
 * @param bool $optioncount
 * @param bool $exclude_admin
 * @param bool $show_fullname
 * @param bool $hide_empty
 * @param string $feed
 * @param string $feed_image
 * @return null|string
 */
function list_authors($optioncount = \false, $exclude_admin = \true, $show_fullname = \false, $hide_empty = \true, $feed = '', $feed_image = '')
{
}
/**
 * Retrieves a list of post categories.
 *
 * @since 1.0.1
 * @deprecated 2.1.0 Use wp_get_post_categories()
 * @see wp_get_post_categories()
 *
 * @param int $blogid Not Used
 * @param int $post_ID
 * @return array
 */
function wp_get_post_cats($blogid = '1', $post_ID = 0)
{
}
/**
 * Sets the categories that the post id belongs to.
 *
 * @since 1.0.1
 * @deprecated 2.1.0
 * @deprecated Use wp_set_post_categories()
 * @see wp_set_post_categories()
 *
 * @param int $blogid Not used
 * @param int $post_ID
 * @param array $post_categories
 * @return bool|mixed
 */
function wp_set_post_cats($blogid = '1', $post_ID = 0, $post_categories = array())
{
}
/**
 * Retrieves a list of archives.
 *
 * @since 0.71
 * @deprecated 2.1.0 Use wp_get_archives()
 * @see wp_get_archives()
 *
 * @param string $type
 * @param string $limit
 * @param string $format
 * @param string $before
 * @param string $after
 * @param bool $show_post_count
 * @return string|null
 */
function get_archives($type = '', $limit = '', $format = 'html', $before = '', $after = '', $show_post_count = \false)
{
}
/**
 * Returns or Prints link to the author's posts.
 *
 * @since 1.2.0
 * @deprecated 2.1.0 Use get_author_posts_url()
 * @see get_author_posts_url()
 *
 * @param bool $echo
 * @param int $author_id
 * @param string $author_nicename Optional.
 * @return string|null
 */
function get_author_link($echo, $author_id, $author_nicename = '')
{
}
/**
 * Print list of pages based on arguments.
 *
 * @since 0.71
 * @deprecated 2.1.0 Use wp_link_pages()
 * @see wp_link_pages()
 *
 * @param string $before
 * @param string $after
 * @param string $next_or_number
 * @param string $nextpagelink
 * @param string $previouspagelink
 * @param string $pagelink
 * @param string $more_file
 * @return string
 */
function link_pages($before = '<br />', $after = '<br />', $next_or_number = 'number', $nextpagelink = 'next page', $previouspagelink = 'previous page', $pagelink = '%', $more_file = '')
{
}
/**
 * Get value based on option.
 *
 * @since 0.71
 * @deprecated 2.1.0 Use get_option()
 * @see get_option()
 *
 * @param string $option
 * @return string
 */
function get_settings($option)
{
}
/**
 * Print the permalink of the current post in the loop.
 *
 * @since 0.71
 * @deprecated 1.2.0 Use the_permalink()
 * @see the_permalink()
 */
function permalink_link()
{
}
/**
 * Print the permalink to the RSS feed.
 *
 * @since 0.71
 * @deprecated 2.3.0 Use the_permalink_rss()
 * @see the_permalink_rss()
 *
 * @param string $deprecated
 */
function permalink_single_rss($deprecated = '')
{
}
/**
 * Gets the links associated with category.
 *
 * @since 1.0.1
 * @deprecated 2.1.0 Use wp_list_bookmarks()
 * @see wp_list_bookmarks()
 *
 * @param string $args a query string
 * @return null|string
 */
function wp_get_links($args = '')
{
}
/**
 * Gets the links associated with category by id.
 *
 * @since 0.71
 * @deprecated 2.1.0 Use get_bookmarks()
 * @see get_bookmarks()
 *
 * @param int $category The category to use. If no category supplied uses all
 * @param string $before the html to output before the link
 * @param string $after the html to output after the link
 * @param string $between the html to output between the link/image and its description.
 *		Not used if no image or show_images == true
 * @param bool $show_images whether to show images (if defined).
 * @param string $orderby the order to output the links. E.g. 'id', 'name', 'url',
 *		'description', or 'rating'. Or maybe owner. If you start the name with an
 *		underscore the order will be reversed. You can also specify 'rand' as the order
 *		which will return links in a random order.
 * @param bool $show_description whether to show the description if show_images=false/not defined.
 * @param bool $show_rating show rating stars/chars
 * @param int $limit Limit to X entries. If not specified, all entries are shown.
 * @param int $show_updated whether to show last updated timestamp
 * @param bool $echo whether to echo the results, or return them instead
 * @return null|string
 */
function get_links($category = -1, $before = '', $after = '<br />', $between = ' ', $show_images = \true, $orderby = 'name', $show_description = \true, $show_rating = \false, $limit = -1, $show_updated = 1, $echo = \true)
{
}
/**
 * Output entire list of links by category.
 *
 * Output a list of all links, listed by category, using the settings in
 * $wpdb->linkcategories and output it as a nested HTML unordered list.
 *
 * @since 1.0.1
 * @deprecated 2.1.0 Use wp_list_bookmarks()
 * @see wp_list_bookmarks()
 *
 * @param string $order Sort link categories by 'name' or 'id'
 */
function get_links_list($order = 'name')
{
}
/**
 * Show the link to the links popup and the number of links.
 *
 * @since 0.71
 * @deprecated 2.1.0
 *
 * @param string $text the text of the link
 * @param int $width the width of the popup window
 * @param int $height the height of the popup window
 * @param string $file the page to open in the popup window
 * @param bool $count the number of links in the db
 */
function links_popup_script($text = 'Links', $width = 400, $height = 400, $file = 'links.all.php', $count = \true)
{
}
/**
 * Legacy function that retrieved the value of a link's link_rating field.
 *
 * @since 1.0.1
 * @deprecated 2.1.0 Use sanitize_bookmark_field()
 * @see sanitize_bookmark_field()
 *
 * @param object $link Link object.
 * @return mixed Value of the 'link_rating' field, false otherwise.
 */
function get_linkrating($link)
{
}
/**
 * Gets the name of category by id.
 *
 * @since 0.71
 * @deprecated 2.1.0 Use get_category()
 * @see get_category()
 *
 * @param int $id The category to get. If no category supplied uses 0
 * @return string
 */
function get_linkcatname($id = 0)
{
}
/**
 * Print RSS comment feed link.
 *
 * @since 1.0.1
 * @deprecated 2.5.0 Use post_comments_feed_link()
 * @see post_comments_feed_link()
 *
 * @param string $link_text
 */
function comments_rss_link($link_text = 'Comments RSS')
{
}
/**
 * Print/Return link to category RSS2 feed.
 *
 * @since 1.2.0
 * @deprecated 2.5.0 Use get_category_feed_link()
 * @see get_category_feed_link()
 *
 * @param bool $echo
 * @param int $cat_ID
 * @return string
 */
function get_category_rss_link($echo = \false, $cat_ID = 1)
{
}
/**
 * Print/Return link to author RSS feed.
 *
 * @since 1.2.0
 * @deprecated 2.5.0 Use get_author_feed_link()
 * @see get_author_feed_link()
 *
 * @param bool $echo
 * @param int $author_id
 * @return string
 */
function get_author_rss_link($echo = \false, $author_id = 1)
{
}
/**
 * Return link to the post RSS feed.
 *
 * @since 1.5.0
 * @deprecated 2.2.0 Use get_post_comments_feed_link()
 * @see get_post_comments_feed_link()
 *
 * @return string
 */
function comments_rss()
{
}
/**
 * An alias of wp_create_user().
 *
 * @since 2.0.0
 * @deprecated 2.0.0 Use wp_create_user()
 * @see wp_create_user()
 *
 * @param string $username The user's username.
 * @param string $password The user's password.
 * @param string $email    The user's email.
 * @return int The new user's ID.
 */
function create_user($username, $password, $email)
{
}
/**
 * Unused function.
 *
 * @deprecated 2.5.0
 */
function gzip_compression()
{
}
/**
 * Retrieve an array of comment data about comment $comment_ID.
 *
 * @since 0.71
 * @deprecated 2.7.0 Use get_comment()
 * @see get_comment()
 *
 * @param int $comment_ID The ID of the comment
 * @param int $no_cache Whether to use the cache (cast to bool)
 * @param bool $include_unapproved Whether to include unapproved comments
 * @return array The comment data
 */
function get_commentdata($comment_ID, $no_cache = 0, $include_unapproved = \false)
{
}
/**
 * Retrieve the category name by the category ID.
 *
 * @since 0.71
 * @deprecated 2.8.0 Use get_cat_name()
 * @see get_cat_name()
 *
 * @param int $cat_ID Category ID
 * @return string category name
 */
function get_catname($cat_ID)
{
}
/**
 * Retrieve category children list separated before and after the term IDs.
 *
 * @since 1.2.0
 * @deprecated 2.8.0 Use get_term_children()
 * @see get_term_children()
 *
 * @param int $id Category ID to retrieve children.
 * @param string $before Optional. Prepend before category term ID.
 * @param string $after Optional, default is empty string. Append after category term ID.
 * @param array $visited Optional. Category Term IDs that have already been added.
 * @return string
 */
function get_category_children($id, $before = '/', $after = '', $visited = array())
{
}
/**
 * Retrieves all category IDs.
 *
 * @since 2.0.0
 * @deprecated 4.0.0 Use get_terms()
 * @see get_terms()
 *
 * @link https://codex.wordpress.org/Function_Reference/get_all_category_ids
 *
 * @return object List of all of the category IDs.
 */
function get_all_category_ids()
{
}
/**
 * Retrieve the description of the author of the current post.
 *
 * @since 1.5.0
 * @deprecated 2.8.0 Use get_the_author_meta()
 * @see get_the_author_meta()
 *
 * @return string The author's description.
 */
function get_the_author_description()
{
}
/**
 * Display the description of the author of the current post.
 *
 * @since 1.0.0
 * @deprecated 2.8.0 Use the_author_meta()
 * @see the_author_meta()
 */
function the_author_description()
{
}
/**
 * Retrieve the login name of the author of the current post.
 *
 * @since 1.5.0
 * @deprecated 2.8.0 Use get_the_author_meta()
 * @see get_the_author_meta()
 *
 * @return string The author's login name (username).
 */
function get_the_author_login()
{
}
/**
 * Display the login name of the author of the current post.
 *
 * @since 0.71
 * @deprecated 2.8.0 Use the_author_meta()
 * @see the_author_meta()
 */
function the_author_login()
{
}
/**
 * Retrieve the first name of the author of the current post.
 *
 * @since 1.5.0
 * @deprecated 2.8.0 Use get_the_author_meta()
 * @see get_the_author_meta()
 *
 * @return string The author's first name.
 */
function get_the_author_firstname()
{
}
/**
 * Display the first name of the author of the current post.
 *
 * @since 0.71
 * @deprecated 2.8.0 Use the_author_meta()
 * @see the_author_meta()
 */
function the_author_firstname()
{
}
/**
 * Retrieve the last name of the author of the current post.
 *
 * @since 1.5.0
 * @deprecated 2.8.0 Use get_the_author_meta()
 * @see get_the_author_meta()
 *
 * @return string The author's last name.
 */
function get_the_author_lastname()
{
}
/**
 * Display the last name of the author of the current post.
 *
 * @since 0.71
 * @deprecated 2.8.0 Use the_author_meta()
 * @see the_author_meta()
 */
function the_author_lastname()
{
}
/**
 * Retrieve the nickname of the author of the current post.
 *
 * @since 1.5.0
 * @deprecated 2.8.0 Use get_the_author_meta()
 * @see get_the_author_meta()
 *
 * @return string The author's nickname.
 */
function get_the_author_nickname()
{
}
/**
 * Display the nickname of the author of the current post.
 *
 * @since 0.71
 * @deprecated 2.8.0 Use the_author_meta()
 * @see the_author_meta()
 */
function the_author_nickname()
{
}
/**
 * Retrieve the email of the author of the current post.
 *
 * @since 1.5.0
 * @deprecated 2.8.0 Use get_the_author_meta()
 * @see get_the_author_meta()
 *
 * @return string The author's username.
 */
function get_the_author_email()
{
}
/**
 * Display the email of the author of the current post.
 *
 * @since 0.71
 * @deprecated 2.8.0 Use the_author_meta()
 * @see the_author_meta()
 */
function the_author_email()
{
}
/**
 * Retrieve the ICQ number of the author of the current post.
 *
 * @since 1.5.0
 * @deprecated 2.8.0 Use get_the_author_meta()
 * @see get_the_author_meta()
 *
 * @return string The author's ICQ number.
 */
function get_the_author_icq()
{
}
/**
 * Display the ICQ number of the author of the current post.
 *
 * @since 0.71
 * @deprecated 2.8.0 Use the_author_meta()
 * @see the_author_meta()
 */
function the_author_icq()
{
}
/**
 * Retrieve the Yahoo! IM name of the author of the current post.
 *
 * @since 1.5.0
 * @deprecated 2.8.0 Use get_the_author_meta()
 * @see get_the_author_meta()
 *
 * @return string The author's Yahoo! IM name.
 */
function get_the_author_yim()
{
}
/**
 * Display the Yahoo! IM name of the author of the current post.
 *
 * @since 0.71
 * @deprecated 2.8.0 Use the_author_meta()
 * @see the_author_meta()
 */
function the_author_yim()
{
}
/**
 * Retrieve the MSN address of the author of the current post.
 *
 * @since 1.5.0
 * @deprecated 2.8.0 Use get_the_author_meta()
 * @see get_the_author_meta()
 *
 * @return string The author's MSN address.
 */
function get_the_author_msn()
{
}
/**
 * Display the MSN address of the author of the current post.
 *
 * @since 0.71
 * @deprecated 2.8.0 Use the_author_meta()
 * @see the_author_meta()
 */
function the_author_msn()
{
}
/**
 * Retrieve the AIM address of the author of the current post.
 *
 * @since 1.5.0
 * @deprecated 2.8.0 Use get_the_author_meta()
 * @see get_the_author_meta()
 *
 * @return string The author's AIM address.
 */
function get_the_author_aim()
{
}
/**
 * Display the AIM address of the author of the current post.
 *
 * @since 0.71
 * @deprecated 2.8.0 Use the_author_meta('aim')
 * @see the_author_meta()
 */
function the_author_aim()
{
}
/**
 * Retrieve the specified author's preferred display name.
 *
 * @since 1.0.0
 * @deprecated 2.8.0 Use get_the_author_meta()
 * @see get_the_author_meta()
 *
 * @param int $auth_id The ID of the author.
 * @return string The author's display name.
 */
function get_author_name($auth_id = \false)
{
}
/**
 * Retrieve the URL to the home page of the author of the current post.
 *
 * @since 1.5.0
 * @deprecated 2.8.0 Use get_the_author_meta()
 * @see get_the_author_meta()
 *
 * @return string The URL to the author's page.
 */
function get_the_author_url()
{
}
/**
 * Display the URL to the home page of the author of the current post.
 *
 * @since 0.71
 * @deprecated 2.8.0 Use the_author_meta()
 * @see the_author_meta()
 */
function the_author_url()
{
}
/**
 * Retrieve the ID of the author of the current post.
 *
 * @since 1.5.0
 * @deprecated 2.8.0 Use get_the_author_meta()
 * @see get_the_author_meta()
 *
 * @return string|int The author's ID.
 */
function get_the_author_ID()
{
}
/**
 * Display the ID of the author of the current post.
 *
 * @since 0.71
 * @deprecated 2.8.0 Use the_author_meta()
 * @see the_author_meta()
 */
function the_author_ID()
{
}
/**
 * Display the post content for the feed.
 *
 * For encoding the html or the $encode_html parameter, there are three possible
 * values. '0' will make urls footnotes and use make_url_footnote(). '1' will
 * encode special characters and automatically display all of the content. The
 * value of '2' will strip all HTML tags from the content.
 *
 * Also note that you cannot set the amount of words and not set the html
 * encoding. If that is the case, then the html encoding will default to 2,
 * which will strip all HTML tags.
 *
 * To restrict the amount of words of the content, you can use the cut
 * parameter. If the content is less than the amount, then there won't be any
 * dots added to the end. If there is content left over, then dots will be added
 * and the rest of the content will be removed.
 *
 * @since 0.71
 *
 * @deprecated 2.9.0 Use the_content_feed()
 * @see the_content_feed()
 *
 * @param string $more_link_text Optional. Text to display when more content is available but not displayed.
 * @param int $stripteaser Optional. Default is 0.
 * @param string $more_file Optional.
 * @param int $cut Optional. Amount of words to keep for the content.
 * @param int $encode_html Optional. How to encode the content.
 */
function the_content_rss($more_link_text = '(more...)', $stripteaser = 0, $more_file = '', $cut = 0, $encode_html = 0)
{
}
/**
 * Strip HTML and put links at the bottom of stripped content.
 *
 * Searches for all of the links, strips them out of the content, and places
 * them at the bottom of the content with numbers.
 *
 * @since 0.71
 * @deprecated 2.9.0
 *
 * @param string $content Content to get links
 * @return string HTML stripped out of content with links at the bottom.
 */
function make_url_footnote($content)
{
}
/**
 * Retrieve translated string with vertical bar context
 *
 * Quite a few times, there will be collisions with similar translatable text
 * found in more than two places but with different translated context.
 *
 * In order to use the separate contexts, the _c() function is used and the
 * translatable string uses a pipe ('|') which has the context the string is in.
 *
 * When the translated string is returned, it is everything before the pipe, not
 * including the pipe character. If there is no pipe in the translated text then
 * everything is returned.
 *
 * @since 2.2.0
 * @deprecated 2.9.0 Use _x()
 * @see _x()
 *
 * @param string $text Text to translate
 * @param string $domain Optional. Domain to retrieve the translated text
 * @return string Translated context string without pipe
 */
function _c($text, $domain = 'default')
{
}
/**
 * Translates $text like translate(), but assumes that the text
 * contains a context after its last vertical bar.
 *
 * @since 2.5.0
 * @deprecated 3.0.0 Use _x()
 * @see _x()
 *
 * @param string $text Text to translate
 * @param string $domain Domain to retrieve the translated text
 * @return string Translated text
 */
function translate_with_context($text, $domain = 'default')
{
}
/**
 * Legacy version of _n(), which supports contexts.
 *
 * Strips everything from the translation after the last bar.
 *
 * @since 2.7.0
 * @deprecated 3.0.0 Use _nx()
 * @see _nx()
 *
 * @param string $single The text to be used if the number is singular.
 * @param string $plural The text to be used if the number is plural.
 * @param int    $number The number to compare against to use either the singular or plural form.
 * @param string $domain Optional. Text domain. Unique identifier for retrieving translated strings.
 *                       Default 'default'.
 * @return string The translated singular or plural form.
 */
function _nc($single, $plural, $number, $domain = 'default')
{
}
/**
 * Retrieve the plural or single form based on the amount.
 *
 * @since 1.2.0
 * @deprecated 2.8.0 Use _n()
 * @see _n()
 */
function __ngettext()
{
}
/**
 * Register plural strings in POT file, but don't translate them.
 *
 * @since 2.5.0
 * @deprecated 2.8.0 Use _n_noop()
 * @see _n_noop()
 */
function __ngettext_noop()
{
}
/**
 * Retrieve all autoload options, or all options if no autoloaded ones exist.
 *
 * @since 1.0.0
 * @deprecated 3.0.0 Use wp_load_alloptions())
 * @see wp_load_alloptions()
 *
 * @return array List of all options.
 */
function get_alloptions()
{
}
/**
 * Retrieve HTML content of attachment image with link.
 *
 * @since 2.0.0
 * @deprecated 2.5.0 Use wp_get_attachment_link()
 * @see wp_get_attachment_link()
 *
 * @param int $id Optional. Post ID.
 * @param bool $fullsize Optional, default is false. Whether to use full size image.
 * @param array $max_dims Optional. Max image dimensions.
 * @param bool $permalink Optional, default is false. Whether to include permalink to image.
 * @return string
 */
function get_the_attachment_link($id = 0, $fullsize = \false, $max_dims = \false, $permalink = \false)
{
}
/**
 * Retrieve icon URL and Path.
 *
 * @since 2.1.0
 * @deprecated 2.5.0 Use wp_get_attachment_image_src()
 * @see wp_get_attachment_image_src()
 *
 * @param int $id Optional. Post ID.
 * @param bool $fullsize Optional, default to false. Whether to have full image.
 * @return array Icon URL and full path to file, respectively.
 */
function get_attachment_icon_src($id = 0, $fullsize = \false)
{
}
/**
 * Retrieve HTML content of icon attachment image element.
 *
 * @since 2.0.0
 * @deprecated 2.5.0 Use wp_get_attachment_image()
 * @see wp_get_attachment_image()
 *
 * @param int $id Optional. Post ID.
 * @param bool $fullsize Optional, default to false. Whether to have full size image.
 * @param array $max_dims Optional. Dimensions of image.
 * @return false|string HTML content.
 */
function get_attachment_icon($id = 0, $fullsize = \false, $max_dims = \false)
{
}
/**
 * Retrieve HTML content of image element.
 *
 * @since 2.0.0
 * @deprecated 2.5.0 Use wp_get_attachment_image()
 * @see wp_get_attachment_image()
 *
 * @param int $id Optional. Post ID.
 * @param bool $fullsize Optional, default to false. Whether to have full size image.
 * @param array $max_dims Optional. Dimensions of image.
 * @return false|string
 */
function get_attachment_innerHTML($id = 0, $fullsize = \false, $max_dims = \false)
{
}
/**
 * Retrieves bookmark data based on ID.
 *
 * @since 2.0.0
 * @deprecated 2.1.0 Use get_bookmark()
 * @see get_bookmark()
 *
 * @param int    $bookmark_id ID of link
 * @param string $output      Optional. Type of output. Accepts OBJECT, ARRAY_N, or ARRAY_A.
 *                            Default OBJECT.
 * @param string $filter      Optional. How to filter the link for output. Accepts 'raw', 'edit',
 *                            'attribute', 'js', 'db', or 'display'. Default 'raw'.
 * @return object|array Bookmark object or array, depending on the type specified by `$output`.
 */
function get_link($bookmark_id, $output = \OBJECT, $filter = 'raw')
{
}
/**
 * Performs esc_url() for database or redirect usage.
 *
 * @since 2.3.1
 * @deprecated 2.8.0 Use esc_url_raw()
 * @see esc_url_raw()
 *
 * @param string $url The URL to be cleaned.
 * @param array $protocols An array of acceptable protocols.
 * @return string The cleaned URL.
 */
function sanitize_url($url, $protocols = \null)
{
}
/**
 * Checks and cleans a URL.
 *
 * A number of characters are removed from the URL. If the URL is for displaying
 * (the default behaviour) ampersands are also replaced. The 'clean_url' filter
 * is applied to the returned cleaned URL.
 *
 * @since 1.2.0
 * @deprecated 3.0.0 Use esc_url()
 * @see esc_url()
 *
 * @param string $url The URL to be cleaned.
 * @param array $protocols Optional. An array of acceptable protocols.
 * @param string $context Optional. How the URL will be used. Default is 'display'.
 * @return string The cleaned $url after the {@see 'clean_url'} filter is applied.
 */
function clean_url($url, $protocols = \null, $context = 'display')
{
}
/**
 * Escape single quotes, specialchar double quotes, and fix line endings.
 *
 * The filter {@see 'js_escape'} is also applied by esc_js().
 *
 * @since 2.0.4
 * @deprecated 2.8.0 Use esc_js()
 * @see esc_js()
 *
 * @param string $text The text to be escaped.
 * @return string Escaped text.
 */
function js_escape($text)
{
}
/**
 * Legacy escaping for HTML blocks.
 *
 * @deprecated 2.8.0 Use esc_html()
 * @see esc_html()
 *
 * @param string       $string        String to escape.
 * @param string       $quote_style   Unused.
 * @param false|string $charset       Unused.
 * @param false        $double_encode Whether to double encode. Unused.
 * @return string Escaped `$string`.
 */
function wp_specialchars($string, $quote_style = \ENT_NOQUOTES, $charset = \false, $double_encode = \false)
{
}
/**
 * Escaping for HTML attributes.
 *
 * @since 2.0.6
 * @deprecated 2.8.0 Use esc_attr()
 * @see esc_attr()
 *
 * @param string $text
 * @return string
 */
function attribute_escape($text)
{
}
/**
 * Register widget for sidebar with backward compatibility.
 *
 * Allows $name to be an array that accepts either three elements to grab the
 * first element and the third for the name or just uses the first element of
 * the array for the name.
 *
 * Passes to wp_register_sidebar_widget() after argument list and backward
 * compatibility is complete.
 *
 * @since 2.2.0
 * @deprecated 2.8.0 Use wp_register_sidebar_widget()
 * @see wp_register_sidebar_widget()
 *
 * @param string|int $name            Widget ID.
 * @param callable   $output_callback Run when widget is called.
 * @param string     $classname       Optional. Classname widget option. Default empty.
 * @param mixed      $params ,...     Widget parameters.
 */
function register_sidebar_widget($name, $output_callback, $classname = '')
{
}
/**
 * Serves as an alias of wp_unregister_sidebar_widget().
 *
 * @since 2.2.0
 * @deprecated 2.8.0 Use wp_unregister_sidebar_widget()
 * @see wp_unregister_sidebar_widget()
 *
 * @param int|string $id Widget ID.
 */
function unregister_sidebar_widget($id)
{
}
/**
 * Registers widget control callback for customizing options.
 *
 * Allows $name to be an array that accepts either three elements to grab the
 * first element and the third for the name or just uses the first element of
 * the array for the name.
 *
 * Passes to wp_register_widget_control() after the argument list has
 * been compiled.
 *
 * @since 2.2.0
 * @deprecated 2.8.0 Use wp_register_widget_control()
 * @see wp_register_widget_control()
 *
 * @param int|string $name Sidebar ID.
 * @param callable $control_callback Widget control callback to display and process form.
 * @param int $width Widget width.
 * @param int $height Widget height.
 */
function register_widget_control($name, $control_callback, $width = '', $height = '')
{
}
/**
 * Alias of wp_unregister_widget_control().
 *
 * @since 2.2.0
 * @deprecated 2.8.0 Use wp_unregister_widget_control()
 * @see wp_unregister_widget_control()
 *
 * @param int|string $id Widget ID.
 */
function unregister_widget_control($id)
{
}
/**
 * Remove user meta data.
 *
 * @since 2.0.0
 * @deprecated 3.0.0 Use delete_user_meta()
 * @see delete_user_meta()
 *
 * @param int $user_id User ID.
 * @param string $meta_key Metadata key.
 * @param mixed $meta_value Metadata value.
 * @return bool True deletion completed and false if user_id is not a number.
 */
function delete_usermeta($user_id, $meta_key, $meta_value = '')
{
}
/**
 * Retrieve user metadata.
 *
 * If $user_id is not a number, then the function will fail over with a 'false'
 * boolean return value. Other returned values depend on whether there is only
 * one item to be returned, which be that single item type. If there is more
 * than one metadata value, then it will be list of metadata values.
 *
 * @since 2.0.0
 * @deprecated 3.0.0 Use get_user_meta()
 * @see get_user_meta()
 *
 * @param int $user_id User ID
 * @param string $meta_key Optional. Metadata key.
 * @return mixed
 */
function get_usermeta($user_id, $meta_key = '')
{
}
/**
 * Update metadata of user.
 *
 * There is no need to serialize values, they will be serialized if it is
 * needed. The metadata key can only be a string with underscores. All else will
 * be removed.
 *
 * Will remove the metadata, if the meta value is empty.
 *
 * @since 2.0.0
 * @deprecated 3.0.0 Use update_user_meta()
 * @see update_user_meta()
 *
 * @param int $user_id User ID
 * @param string $meta_key Metadata key.
 * @param mixed $meta_value Metadata value.
 * @return bool True on successful update, false on failure.
 */
function update_usermeta($user_id, $meta_key, $meta_value)
{
}
/**
 * Get users for the site.
 *
 * For setups that use the multisite feature. Can be used outside of the
 * multisite feature.
 *
 * @since 2.2.0
 * @deprecated 3.1.0 Use get_users()
 * @see get_users()
 *
 * @global wpdb $wpdb    WordPress database abstraction object.
 *
 * @param int $id Site ID.
 * @return array List of users that are part of that site ID
 */
function get_users_of_blog($id = '')
{
}
/**
 * Enable/disable automatic general feed link outputting.
 *
 * @since 2.8.0
 * @deprecated 3.0.0 Use add_theme_support()
 * @see add_theme_support()
 *
 * @param bool $add Optional, default is true. Add or remove links. Defaults to true.
 */
function automatic_feed_links($add = \true)
{
}
/**
 * Retrieve user data based on field.
 *
 * @since 1.5.0
 * @deprecated 3.0.0 Use get_the_author_meta()
 * @see get_the_author_meta()
 *
 * @param string    $field User meta field.
 * @param false|int $user Optional. User ID to retrieve the field for. Default false (current user).
 * @return string The author's field from the current author's DB object.
 */
function get_profile($field, $user = \false)
{
}
/**
 * Retrieves the number of posts a user has written.
 *
 * @since 0.71
 * @deprecated 3.0.0 Use count_user_posts()
 * @see count_user_posts()
 *
 * @param int $userid User to count posts for.
 * @return int Number of posts the given user has written.
 */
function get_usernumposts($userid)
{
}
/**
 * Callback used to change %uXXXX to &#YYY; syntax
 *
 * @since 2.8.0
 * @access private
 * @deprecated 3.0.0
 *
 * @param array $matches Single Match
 * @return string An HTML entity
 */
function funky_javascript_callback($matches)
{
}
/**
 * Fixes JavaScript bugs in browsers.
 *
 * Converts unicode characters to HTML numbered entities.
 *
 * @since 1.5.0
 * @deprecated 3.0.0
 *
 * @global $is_macIE
 * @global $is_winIE
 *
 * @param string $text Text to be made safe.
 * @return string Fixed text.
 */
function funky_javascript_fix($text)
{
}
/**
 * Checks that the taxonomy name exists.
 *
 * @since 2.3.0
 * @deprecated 3.0.0 Use taxonomy_exists()
 * @see taxonomy_exists()
 *
 * @param string $taxonomy Name of taxonomy object
 * @return bool Whether the taxonomy exists.
 */
function is_taxonomy($taxonomy)
{
}
/**
 * Check if Term exists.
 *
 * @since 2.3.0
 * @deprecated 3.0.0 Use term_exists()
 * @see term_exists()
 *
 * @param int|string $term The term to check
 * @param string $taxonomy The taxonomy name to use
 * @param int $parent ID of parent term under which to confine the exists search.
 * @return mixed Get the term id or Term Object, if exists.
 */
function is_term($term, $taxonomy = '', $parent = 0)
{
}
/**
 * Is the current admin page generated by a plugin?
 *
 * Use global $plugin_page and/or get_plugin_page_hookname() hooks.
 *
 * @since 1.5.0
 * @deprecated 3.1.0
 *
 * @global $plugin_page
 *
 * @return bool
 */
function is_plugin_page()
{
}
/**
 * Update the categories cache.
 *
 * This function does not appear to be used anymore or does not appear to be
 * needed. It might be a legacy function left over from when there was a need
 * for updating the category cache.
 *
 * @since 1.5.0
 * @deprecated 3.1.0
 *
 * @return bool Always return True
 */
function update_category_cache()
{
}
/**
 * Check for PHP timezone support
 *
 * @since 2.9.0
 * @deprecated 3.2.0
 *
 * @return bool
 */
function wp_timezone_supported()
{
}
/**
 * Displays an editor: TinyMCE, HTML, or both.
 *
 * @since 2.1.0
 * @deprecated 3.3.0 Use wp_editor()
 * @see wp_editor()
 *
 * @param string $content       Textarea content.
 * @param string $id            Optional. HTML ID attribute value. Default 'content'.
 * @param string $prev_id       Optional. Unused.
 * @param bool   $media_buttons Optional. Whether to display media buttons. Default true.
 * @param int    $tab_index     Optional. Unused.
 * @param bool   $extended      Optional. Unused.
 */
function the_editor($content, $id = 'content', $prev_id = 'title', $media_buttons = \true, $tab_index = 2, $extended = \true)
{
}
/**
 * Perform the query to get the $metavalues array(s) needed by _fill_user and _fill_many_users
 *
 * @since 3.0.0
 * @deprecated 3.3.0
 *
 * @param array $ids User ID numbers list.
 * @return array of arrays. The array is indexed by user_id, containing $metavalues object arrays.
 */
function get_user_metavalues($ids)
{
}
/**
 * Sanitize every user field.
 *
 * If the context is 'raw', then the user object or array will get minimal santization of the int fields.
 *
 * @since 2.3.0
 * @deprecated 3.3.0
 *
 * @param object|array $user The User Object or Array
 * @param string $context Optional, default is 'display'. How to sanitize user fields.
 * @return object|array The now sanitized User Object or Array (will be the same type as $user)
 */
function sanitize_user_object($user, $context = 'display')
{
}
/**
 * Get boundary post relational link.
 *
 * Can either be start or end post relational link.
 *
 * @since 2.8.0
 * @deprecated 3.3.0
 *
 * @param string $title Optional. Link title format.
 * @param bool $in_same_cat Optional. Whether link should be in a same category.
 * @param string $excluded_categories Optional. Excluded categories IDs.
 * @param bool $start Optional, default is true. Whether to display link to first or last post.
 * @return string
 */
function get_boundary_post_rel_link($title = '%title', $in_same_cat = \false, $excluded_categories = '', $start = \true)
{
}
/**
 * Display relational link for the first post.
 *
 * @since 2.8.0
 * @deprecated 3.3.0
 *
 * @param string $title Optional. Link title format.
 * @param bool $in_same_cat Optional. Whether link should be in a same category.
 * @param string $excluded_categories Optional. Excluded categories IDs.
 */
function start_post_rel_link($title = '%title', $in_same_cat = \false, $excluded_categories = '')
{
}
/**
 * Get site index relational link.
 *
 * @since 2.8.0
 * @deprecated 3.3.0
 *
 * @return string
 */
function get_index_rel_link()
{
}
/**
 * Display relational link for the site index.
 *
 * @since 2.8.0
 * @deprecated 3.3.0
 */
function index_rel_link()
{
}
/**
 * Get parent post relational link.
 *
 * @since 2.8.0
 * @deprecated 3.3.0
 *
 * @param string $title Optional. Link title format. Default '%title'.
 * @return string
 */
function get_parent_post_rel_link($title = '%title')
{
}
/**
 * Display relational link for parent item
 *
 * @since 2.8.0
 * @deprecated 3.3.0
 *
 * @param string $title Optional. Link title format. Default '%title'.
 */
function parent_post_rel_link($title = '%title')
{
}
/**
 * Add the "Dashboard"/"Visit Site" menu.
 *
 * @since 3.2.0
 * @deprecated 3.3.0
 *
 * @param WP_Admin_Bar $wp_admin_bar WP_Admin_Bar instance.
 */
function wp_admin_bar_dashboard_view_site_menu($wp_admin_bar)
{
}
/**
 * Checks if the current user belong to a given site.
 *
 * @since MU (3.0.0)
 * @deprecated 3.3.0 Use is_user_member_of_blog()
 * @see is_user_member_of_blog()
 *
 * @param int $blog_id Site ID
 * @return bool True if the current users belong to $blog_id, false if not.
 */
function is_blog_user($blog_id = 0)
{
}
/**
 * Open the file handle for debugging.
 *
 * @since 0.71
 * @deprecated 3.4.0 Use error_log()
 * @see error_log()
 *
 * @link https://secure.php.net/manual/en/function.error-log.php
 *
 * @param string $filename File name.
 * @param string $mode     Type of access you required to the stream.
 * @return false Always false.
 */
function debug_fopen($filename, $mode)
{
}
/**
 * Write contents to the file used for debugging.
 *
 * @since 0.71
 * @deprecated 3.4.0 Use error_log()
 * @see error_log()
 *
 * @link https://secure.php.net/manual/en/function.error-log.php
 *
 * @param mixed  $fp     Unused.
 * @param string $string Message to log.
 */
function debug_fwrite($fp, $string)
{
}
/**
 * Close the debugging file handle.
 *
 * @since 0.71
 * @deprecated 3.4.0 Use error_log()
 * @see error_log()
 *
 * @link https://secure.php.net/manual/en/function.error-log.php
 *
 * @param mixed $fp Unused.
 */
function debug_fclose($fp)
{
}
/**
 * Retrieve list of themes with theme data in theme directory.
 *
 * The theme is broken, if it doesn't have a parent theme and is missing either
 * style.css and, or index.php. If the theme has a parent theme then it is
 * broken, if it is missing style.css; index.php is optional.
 *
 * @since 1.5.0
 * @deprecated 3.4.0 Use wp_get_themes()
 * @see wp_get_themes()
 *
 * @return array Theme list with theme data.
 */
function get_themes()
{
}
/**
 * Retrieve theme data.
 *
 * @since 1.5.0
 * @deprecated 3.4.0 Use wp_get_theme()
 * @see wp_get_theme()
 *
 * @param string $theme Theme name.
 * @return array|null Null, if theme name does not exist. Theme data, if exists.
 */
function get_theme($theme)
{
}
/**
 * Retrieve current theme name.
 *
 * @since 1.5.0
 * @deprecated 3.4.0 Use wp_get_theme()
 * @see wp_get_theme()
 *
 * @return string
 */
function get_current_theme()
{
}
/**
 * Accepts matches array from preg_replace_callback in wpautop() or a string.
 *
 * Ensures that the contents of a `<pre>...</pre>` HTML block are not
 * converted into paragraphs or line-breaks.
 *
 * @since 1.2.0
 * @deprecated 3.4.0
 *
 * @param array|string $matches The array or string
 * @return string The pre block without paragraph/line-break conversion.
 */
function clean_pre($matches)
{
}
/**
 * Add callbacks for image header display.
 *
 * @since 2.1.0
 * @deprecated 3.4.0 Use add_theme_support()
 * @see add_theme_support()
 *
 * @param callable $wp_head_callback Call on the {@see 'wp_head'} action.
 * @param callable $admin_head_callback Call on custom header administration screen.
 * @param callable $admin_preview_callback Output a custom header image div on the custom header administration screen. Optional.
 */
function add_custom_image_header($wp_head_callback, $admin_head_callback, $admin_preview_callback = '')
{
}
/**
 * Remove image header support.
 *
 * @since 3.1.0
 * @deprecated 3.4.0 Use remove_theme_support()
 * @see remove_theme_support()
 *
 * @return null|bool Whether support was removed.
 */
function remove_custom_image_header()
{
}
/**
 * Add callbacks for background image display.
 *
 * @since 3.0.0
 * @deprecated 3.4.0 Use add_theme_support()
 * @see add_theme_support()
 *
 * @param callable $wp_head_callback Call on the {@see 'wp_head'} action.
 * @param callable $admin_head_callback Call on custom background administration screen.
 * @param callable $admin_preview_callback Output a custom background image div on the custom background administration screen. Optional.
 */
function add_custom_background($wp_head_callback = '', $admin_head_callback = '', $admin_preview_callback = '')
{
}
/**
 * Remove custom background support.
 *
 * @since 3.1.0
 * @deprecated 3.4.0 Use add_custom_background()
 * @see add_custom_background()
 *
 * @return null|bool Whether support was removed.
 */
function remove_custom_background()
{
}
/**
 * Retrieve theme data from parsed theme file.
 *
 * @since 1.5.0
 * @deprecated 3.4.0 Use wp_get_theme()
 * @see wp_get_theme()
 *
 * @param string $theme_file Theme file path.
 * @return array Theme data.
 */
function get_theme_data($theme_file)
{
}
/**
 * Alias of update_post_cache().
 *
 * @see update_post_cache() Posts and pages are the same, alias is intentional
 *
 * @since 1.5.1
 * @deprecated 3.4.0 Use update_post_cache()
 * @see update_post_cache()
 *
 * @param array $pages list of page objects
 */
function update_page_cache(&$pages)
{
}
/**
 * Will clean the page in the cache.
 *
 * Clean (read: delete) page from cache that matches $id. Will also clean cache
 * associated with 'all_page_ids' and 'get_pages'.
 *
 * @since 2.0.0
 * @deprecated 3.4.0 Use clean_post_cache
 * @see clean_post_cache()
 *
 * @param int $id Page ID to clean
 */
function clean_page_cache($id)
{
}
/**
 * Retrieve nonce action "Are you sure" message.
 *
 * Deprecated in 3.4.1 and 3.5.0. Backported to 3.3.3.
 *
 * @since 2.0.4
 * @deprecated 3.4.1 Use wp_nonce_ays()
 * @see wp_nonce_ays()
 *
 * @param string $action Nonce action.
 * @return string Are you sure message.
 */
function wp_explain_nonce($action)
{
}
/**
 * Display "sticky" CSS class, if a post is sticky.
 *
 * @since 2.7.0
 * @deprecated 3.5.0 Use post_class()
 * @see post_class()
 *
 * @param int $post_id An optional post ID.
 */
function sticky_class($post_id = \null)
{
}
/**
 * Retrieve post ancestors.
 *
 * This is no longer needed as WP_Post lazy-loads the ancestors
 * property with get_post_ancestors().
 *
 * @since 2.3.4
 * @deprecated 3.5.0 Use get_post_ancestors()
 * @see get_post_ancestors()
 *
 * @param WP_Post $post Post object, passed by reference (unused).
 */
function _get_post_ancestors(&$post)
{
}
/**
 * Load an image from a string, if PHP supports it.
 *
 * @since 2.1.0
 * @deprecated 3.5.0 Use wp_get_image_editor()
 * @see wp_get_image_editor()
 *
 * @param string $file Filename of the image to load.
 * @return resource The resulting image resource on success, Error string on failure.
 */
function wp_load_image($file)
{
}
/**
 * Scale down an image to fit a particular size and save a new copy of the image.
 *
 * The PNG transparency will be preserved using the function, as well as the
 * image type. If the file going in is PNG, then the resized image is going to
 * be PNG. The only supported image types are PNG, GIF, and JPEG.
 *
 * Some functionality requires API to exist, so some PHP version may lose out
 * support. This is not the fault of WordPress (where functionality is
 * downgraded, not actual defects), but of your PHP version.
 *
 * @since 2.5.0
 * @deprecated 3.5.0 Use wp_get_image_editor()
 * @see wp_get_image_editor()
 *
 * @param string $file Image file path.
 * @param int $max_w Maximum width to resize to.
 * @param int $max_h Maximum height to resize to.
 * @param bool $crop Optional. Whether to crop image or resize.
 * @param string $suffix Optional. File suffix.
 * @param string $dest_path Optional. New image file path.
 * @param int $jpeg_quality Optional, default is 90. Image quality percentage.
 * @return mixed WP_Error on failure. String with new destination path.
 */
function image_resize($file, $max_w, $max_h, $crop = \false, $suffix = \null, $dest_path = \null, $jpeg_quality = 90)
{
}
/**
 * Retrieve a single post, based on post ID.
 *
 * Has categories in 'post_category' property or key. Has tags in 'tags_input'
 * property or key.
 *
 * @since 1.0.0
 * @deprecated 3.5.0 Use get_post()
 * @see get_post()
 *
 * @param int $postid Post ID.
 * @param string $mode How to return result, either OBJECT, ARRAY_N, or ARRAY_A.
 * @return WP_Post|null Post object or array holding post contents and information
 */
function wp_get_single_post($postid = 0, $mode = \OBJECT)
{
}
/**
 * Check that the user login name and password is correct.
 *
 * @since 0.71
 * @deprecated 3.5.0 Use wp_authenticate()
 * @see wp_authenticate()
 *
 * @param string $user_login User name.
 * @param string $user_pass User password.
 * @return bool False if does not authenticate, true if username and password authenticates.
 */
function user_pass_ok($user_login, $user_pass)
{
}
/**
 * Callback formerly fired on the save_post hook. No longer needed.
 *
 * @since 2.3.0
 * @deprecated 3.5.0
 */
function _save_post_hook()
{
}
/**
 * Check if the installed version of GD supports particular image type
 *
 * @since 2.9.0
 * @deprecated 3.5.0 Use wp_image_editor_supports()
 * @see wp_image_editor_supports()
 *
 * @param string $mime_type
 * @return bool
 */
function gd_edit_image_support($mime_type)
{
}
/**
 * Converts an integer byte value to a shorthand byte value.
 *
 * @since 2.3.0
 * @deprecated 3.6.0 Use size_format()
 * @see size_format()
 *
 * @param int $bytes An integer byte value.
 * @return string A shorthand byte value.
 */
function wp_convert_bytes_to_hr($bytes)
{
}
/**
 * Formerly used internally to tidy up the search terms.
 *
 * @since 2.9.0
 * @access private
 * @deprecated 3.7.0
 *
 * @param string $t Search terms to "tidy", e.g. trim.
 * @return string Trimmed search terms.
 */
function _search_terms_tidy($t)
{
}
/**
 * Determine if TinyMCE is available.
 *
 * Checks to see if the user has deleted the tinymce files to slim down
 * their WordPress installation.
 *
 * @since 2.1.0
 * @deprecated 3.9.0
 *
 * @return bool Whether TinyMCE exists.
 */
function rich_edit_exists()
{
}
/**
 * Old callback for tag link tooltips.
 *
 * @since 2.7.0
 * @access private
 * @deprecated 3.9.0
 *
 * @param int $count Number of topics.
 * @return int Number of topics.
 */
function default_topic_count_text($count)
{
}
/**
 * Formerly used to escape strings before inserting into the DB.
 *
 * Has not performed this function for many, many years. Use wpdb::prepare() instead.
 *
 * @since 0.71
 * @deprecated 3.9.0
 *
 * @param string $content The text to format.
 * @return string The very same text.
 */
function format_to_post($content)
{
}
/**
 * Formerly used to escape strings before searching the DB. It was poorly documented and never worked as described.
 *
 * @since 2.5.0
 * @deprecated 4.0.0 Use wpdb::esc_like()
 * @see wpdb::esc_like()
 *
 * @param string $text The text to be escaped.
 * @return string text, safe for inclusion in LIKE query.
 */
function like_escape($text)
{
}
/**
 * Determines if the URL can be accessed over SSL.
 *
 * Determines if the URL can be accessed over SSL by using the WordPress HTTP API to access
 * the URL using https as the scheme.
 *
 * @since 2.5.0
 * @deprecated 4.0.0
 *
 * @param string $url The URL to test.
 * @return bool Whether SSL access is available.
 */
function url_is_accessable_via_ssl($url)
{
}
/**
 * Start preview theme output buffer.
 *
 * Will only perform task if the user has permissions and template and preview
 * query variables exist.
 *
 * @since 2.6.0
 * @deprecated 4.3.0
 */
function preview_theme()
{
}
/**
 * Private function to modify the current template when previewing a theme
 *
 * @since 2.9.0
 * @deprecated 4.3.0
 * @access private
 *
 * @return string
 */
function _preview_theme_template_filter()
{
}
/**
 * Private function to modify the current stylesheet when previewing a theme
 *
 * @since 2.9.0
 * @deprecated 4.3.0
 * @access private
 *
 * @return string
 */
function _preview_theme_stylesheet_filter()
{
}
/**
 * Callback function for ob_start() to capture all links in the theme.
 *
 * @since 2.6.0
 * @deprecated 4.3.0
 * @access private
 *
 * @param string $content
 * @return string
 */
function preview_theme_ob_filter($content)
{
}
/**
 * Manipulates preview theme links in order to control and maintain location.
 *
 * Callback function for preg_replace_callback() to accept and filter matches.
 *
 * @since 2.6.0
 * @deprecated 4.3.0
 * @access private
 *
 * @param array $matches
 * @return string
 */
function preview_theme_ob_filter_callback($matches)
{
}
/**
 * Formats text for the rich text editor.
 *
 * The {@see 'richedit_pre'} filter is applied here. If $text is empty the filter will
 * be applied to an empty string.
 *
 * @since 2.0.0
 * @deprecated 4.3.0 Use format_for_editor()
 * @see format_for_editor()
 *
 * @param string $text The text to be formatted.
 * @return string The formatted text after filter is applied.
 */
function wp_richedit_pre($text)
{
}
/**
 * Formats text for the HTML editor.
 *
 * Unless $output is empty it will pass through htmlspecialchars before the
 * {@see 'htmledit_pre'} filter is applied.
 *
 * @since 2.5.0
 * @deprecated 4.3.0 Use format_for_editor()
 * @see format_for_editor()
 *
 * @param string $output The text to be formatted.
 * @return string Formatted text after filter applied.
 */
function wp_htmledit_pre($output)
{
}
/**
 * Retrieve permalink from post ID.
 *
 * @since 1.0.0
 * @deprecated 4.4.0 Use get_permalink()
 * @see get_permalink()
 *
 * @param int|WP_Post $post_id Optional. Post ID or WP_Post object. Default is global $post.
 * @return string|false
 */
function post_permalink($post_id = 0)
{
}
/**
 * Perform a HTTP HEAD or GET request.
 *
 * If $file_path is a writable filename, this will do a GET request and write
 * the file to that path.
 *
 * @since 2.5.0
 * @deprecated 4.4.0 Use WP_Http
 * @see WP_Http
 *
 * @param string      $url       URL to fetch.
 * @param string|bool $file_path Optional. File path to write request to. Default false.
 * @param int         $red       Optional. The number of Redirects followed, Upon 5 being hit,
 *                               returns false. Default 1.
 * @return bool|string False on failure and string of headers if HEAD request.
 */
function wp_get_http($url, $file_path = \false, $red = 1)
{
}
/**
 * Whether SSL login should be forced.
 *
 * @since 2.6.0
 * @deprecated 4.4.0 Use force_ssl_admin()
 * @see force_ssl_admin()
 *
 * @param string|bool $force Optional Whether to force SSL login. Default null.
 * @return bool True if forced, false if not forced.
 */
function force_ssl_login($force = \null)
{
}
/**
 * Retrieve path of comment popup template in current or parent template.
 *
 * @since 1.5.0
 * @deprecated 4.5.0
 *
 * @return string Full path to comments popup template file.
 */
function get_comments_popup_template()
{
}
/**
 * Whether the current URL is within the comments popup window.
 *
 * @since 1.5.0
 * @deprecated 4.5.0
 *
 * @return bool
 */
function is_comments_popup()
{
}
/**
 * Display the JS popup script to show a comment.
 *
 * @since 0.71
 * @deprecated 4.5.0
 */
function comments_popup_script()
{
}
/**
 * Adds element attributes to open links in new windows.
 *
 * @since 0.71
 * @deprecated 4.5.0
 *
 * @param string $text Content to replace links to open in a new window.
 * @return string Content that has filtered links.
 */
function popuplinks($text)
{
}
/**
 * The Google Video embed handler callback.
 *
 * Deprecated function that previously assisted in turning Google Video URLs
 * into embeds but that service has since been shut down.
 *
 * @since 2.9.0
 * @deprecated 4.6.0
 *
 * @return string An empty string.
 */
function wp_embed_handler_googlevideo($matches, $attr, $url, $rawattr)
{
}
/**
 * Retrieve path of paged template in current or parent template.
 *
 * @since 1.5.0
 * @deprecated 4.7.0 The paged.php template is no longer part of the theme template hierarchy.
 *
 * @return string Full path to paged template file.
 */
function get_paged_template()
{
}
/**
 * Removes the HTML JavaScript entities found in early versions of Netscape 4.
 *
 * Previously, this function was pulled in from the original
 * import of kses and removed a specific vulnerability only
 * existent in early version of Netscape 4. However, this
 * vulnerability never affected any other browsers and can
 * be considered safe for the modern web.
 *
 * The regular expression which sanitized this vulnerability
 * has been removed in consideration of the performance and
 * energy demands it placed, now merely passing through its
 * input to the return.
 *
 * @since 1.0.0
 * @deprecated 4.7.0 Officially dropped security support for Netscape 4.
 *
 * @param string $string
 * @return string
 */
function wp_kses_js_entities($string)
{
}
/**
 * Sort categories by ID.
 *
 * Used by usort() as a callback, should not be used directly. Can actually be
 * used to sort any term object.
 *
 * @since 2.3.0
 * @deprecated 4.7.0 Use wp_list_sort()
 * @access private
 *
 * @param object $a
 * @param object $b
 * @return int
 */
function _usort_terms_by_ID($a, $b)
{
}
/**
 * Sort categories by name.
 *
 * Used by usort() as a callback, should not be used directly. Can actually be
 * used to sort any term object.
 *
 * @since 2.3.0
 * @deprecated 4.7.0 Use wp_list_sort()
 * @access private
 *
 * @param object $a
 * @param object $b
 * @return int
 */
function _usort_terms_by_name($a, $b)
{
}
/**
 * Sort menu items by the desired key.
 *
 * @since 3.0.0
 * @deprecated 4.7.0 Use wp_list_sort()
 * @access private
 *
 * @global string $_menu_item_sort_prop
 *
 * @param object $a The first object to compare
 * @param object $b The second object to compare
 * @return int -1, 0, or 1 if $a is considered to be respectively less than, equal to, or greater than $b.
 */
function _sort_nav_menu_items($a, $b)
{
}
/**
 * Retrieves the Press This bookmarklet link.
 *
 * @since 2.6.0
 * @deprecated 4.9.0
 *
 */
function get_shortcut_link()
{
}
/**
* Ajax handler for saving a post from Press This.
*
* @since 4.2.0
* @deprecated 4.9.0
*/
function wp_ajax_press_this_save_post()
{
}
/**
* Ajax handler for creating new category from Press This.
*
* @since 4.2.0
* @deprecated 4.9.0
*/
function wp_ajax_press_this_add_category()
{
}
/**
 * oEmbed API: Top-level oEmbed functionality
 *
 * @package WordPress
 * @subpackage oEmbed
 * @since 4.4.0
 */
/**
 * Registers an embed handler.
 *
 * Should probably only be used for sites that do not support oEmbed.
 *
 * @since 2.9.0
 *
 * @global WP_Embed $wp_embed
 *
 * @param string   $id       An internal ID/name for the handler. Needs to be unique.
 * @param string   $regex    The regex that will be used to see if this handler should be used for a URL.
 * @param callable $callback The callback function that will be called if the regex is matched.
 * @param int      $priority Optional. Used to specify the order in which the registered handlers will
 *                           be tested. Default 10.
 */
function wp_embed_register_handler($id, $regex, $callback, $priority = 10)
{
}
/**
 * Unregisters a previously-registered embed handler.
 *
 * @since 2.9.0
 *
 * @global WP_Embed $wp_embed
 *
 * @param string $id       The handler ID that should be removed.
 * @param int    $priority Optional. The priority of the handler to be removed. Default 10.
 */
function wp_embed_unregister_handler($id, $priority = 10)
{
}
/**
 * Creates default array of embed parameters.
 *
 * The width defaults to the content width as specified by the theme. If the
 * theme does not specify a content width, then 500px is used.
 *
 * The default height is 1.5 times the width, or 1000px, whichever is smaller.
 *
 * The {@see 'embed_defaults'} filter can be used to adjust either of these values.
 *
 * @since 2.9.0
 *
 * @global int $content_width
 *
 * @param string $url Optional. The URL that should be embedded. Default empty.
 *
 * @return array Default embed parameters.
 */
function wp_embed_defaults($url = '')
{
}
/**
 * Attempts to fetch the embed HTML for a provided URL using oEmbed.
 *
 * @since 2.9.0
 *
 * @see WP_oEmbed
 *
 * @param string $url  The URL that should be embedded.
 * @param array  $args Optional. Additional arguments and parameters for retrieving embed HTML.
 *                     Default empty.
 * @return false|string False on failure or the embed HTML on success.
 */
function wp_oembed_get($url, $args = '')
{
}
/**
 * Returns the initialized WP_oEmbed object.
 *
 * @since 2.9.0
 * @access private
 *
 * @staticvar WP_oEmbed $wp_oembed
 *
 * @return WP_oEmbed object.
 */
function _wp_oembed_get_object()
{
}
/**
 * Adds a URL format and oEmbed provider URL pair.
 *
 * @since 2.9.0
 *
 * @see WP_oEmbed
 *
 * @param string  $format   The format of URL that this provider can handle. You can use asterisks
 *                          as wildcards.
 * @param string  $provider The URL to the oEmbed provider.
 * @param boolean $regex    Optional. Whether the `$format` parameter is in a RegEx format. Default false.
 */
function wp_oembed_add_provider($format, $provider, $regex = \false)
{
}
/**
 * Removes an oEmbed provider.
 *
 * @since 3.5.0
 *
 * @see WP_oEmbed
 *
 * @param string $format The URL format for the oEmbed provider to remove.
 * @return bool Was the provider removed successfully?
 */
function wp_oembed_remove_provider($format)
{
}
/**
 * Determines if default embed handlers should be loaded.
 *
 * Checks to make sure that the embeds library hasn't already been loaded. If
 * it hasn't, then it will load the embeds library.
 *
 * @since 2.9.0
 *
 * @see wp_embed_register_handler()
 */
function wp_maybe_load_embeds()
{
}
/**
 * YouTube iframe embed handler callback.
 *
 * Catches YouTube iframe embed URLs that are not parsable by oEmbed but can be translated into a URL that is.
 *
 * @since 4.0.0
 *
 * @global WP_Embed $wp_embed
 *
 * @param array  $matches The RegEx matches from the provided regex when calling
 *                        wp_embed_register_handler().
 * @param array  $attr    Embed attributes.
 * @param string $url     The original URL that was matched by the regex.
 * @param array  $rawattr The original unmodified attributes.
 * @return string The embed HTML.
 */
function wp_embed_handler_youtube($matches, $attr, $url, $rawattr)
{
}
/**
 * Audio embed handler callback.
 *
 * @since 3.6.0
 *
 * @param array  $matches The RegEx matches from the provided regex when calling wp_embed_register_handler().
 * @param array  $attr Embed attributes.
 * @param string $url The original URL that was matched by the regex.
 * @param array  $rawattr The original unmodified attributes.
 * @return string The embed HTML.
 */
function wp_embed_handler_audio($matches, $attr, $url, $rawattr)
{
}
/**
 * Video embed handler callback.
 *
 * @since 3.6.0
 *
 * @param array  $matches The RegEx matches from the provided regex when calling wp_embed_register_handler().
 * @param array  $attr    Embed attributes.
 * @param string $url     The original URL that was matched by the regex.
 * @param array  $rawattr The original unmodified attributes.
 * @return string The embed HTML.
 */
function wp_embed_handler_video($matches, $attr, $url, $rawattr)
{
}
/**
 * Registers the oEmbed REST API route.
 *
 * @since 4.4.0
 */
function wp_oembed_register_route()
{
}
/**
 * Adds oEmbed discovery links in the website <head>.
 *
 * @since 4.4.0
 */
function wp_oembed_add_discovery_links()
{
}
/**
 * Adds the necessary JavaScript to communicate with the embedded iframes.
 *
 * @since 4.4.0
 */
function wp_oembed_add_host_js()
{
}
/**
 * Retrieves the URL to embed a specific post in an iframe.
 *
 * @since 4.4.0
 *
 * @param int|WP_Post $post Optional. Post ID or object. Defaults to the current post.
 * @return string|false The post embed URL on success, false if the post doesn't exist.
 */
function get_post_embed_url($post = \null)
{
}
/**
 * Retrieves the oEmbed endpoint URL for a given permalink.
 *
 * Pass an empty string as the first argument to get the endpoint base URL.
 *
 * @since 4.4.0
 *
 * @param string $permalink Optional. The permalink used for the `url` query arg. Default empty.
 * @param string $format    Optional. The requested response format. Default 'json'.
 * @return string The oEmbed endpoint URL.
 */
function get_oembed_endpoint_url($permalink = '', $format = 'json')
{
}
/**
 * Retrieves the embed code for a specific post.
 *
 * @since 4.4.0
 *
 * @param int         $width  The width for the response.
 * @param int         $height The height for the response.
 * @param int|WP_Post $post   Optional. Post ID or object. Default is global `$post`.
 * @return string|false Embed code on success, false if post doesn't exist.
 */
function get_post_embed_html($width, $height, $post = \null)
{
}
/**
 * Retrieves the oEmbed response data for a given post.
 *
 * @since 4.4.0
 *
 * @param WP_Post|int $post  Post object or ID.
 * @param int         $width The requested width.
 * @return array|false Response data on success, false if post doesn't exist.
 */
function get_oembed_response_data($post, $width)
{
}
/**
 * Filters the oEmbed response data to return an iframe embed code.
 *
 * @since 4.4.0
 *
 * @param array   $data   The response data.
 * @param WP_Post $post   The post object.
 * @param int     $width  The requested width.
 * @param int     $height The calculated height.
 * @return array The modified response data.
 */
function get_oembed_response_data_rich($data, $post, $width, $height)
{
}
/**
 * Ensures that the specified format is either 'json' or 'xml'.
 *
 * @since 4.4.0
 *
 * @param string $format The oEmbed response format. Accepts 'json' or 'xml'.
 * @return string The format, either 'xml' or 'json'. Default 'json'.
 */
function wp_oembed_ensure_format($format)
{
}
/**
 * Hooks into the REST API output to print XML instead of JSON.
 *
 * This is only done for the oEmbed API endpoint,
 * which supports both formats.
 *
 * @access private
 * @since 4.4.0
 *
 * @param bool                      $served  Whether the request has already been served.
 * @param WP_HTTP_ResponseInterface $result  Result to send to the client. Usually a WP_REST_Response.
 * @param WP_REST_Request           $request Request used to generate the response.
 * @param WP_REST_Server            $server  Server instance.
 * @return true
 */
function _oembed_rest_pre_serve_request($served, $result, $request, $server)
{
}
/**
 * Creates an XML string from a given array.
 *
 * @since 4.4.0
 * @access private
 *
 * @param array            $data The original oEmbed response data.
 * @param SimpleXMLElement $node Optional. XML node to append the result to recursively.
 * @return string|false XML string on success, false on error.
 */
function _oembed_create_xml($data, $node = \null)
{
}
/**
 * Filters the given oEmbed HTML.
 *
 * If the `$url` isn't on the trusted providers list,
 * we need to filter the HTML heavily for security.
 *
 * Only filters 'rich' and 'html' response types.
 *
 * @since 4.4.0
 *
 * @param string $result The oEmbed HTML result.
 * @param object $data   A data object result from an oEmbed provider.
 * @param string $url    The URL of the content to be embedded.
 * @return string The filtered and sanitized oEmbed result.
 */
function wp_filter_oembed_result($result, $data, $url)
{
}
/**
 * Filters the string in the 'more' link displayed after a trimmed excerpt.
 *
 * Replaces '[...]' (appended to automatically generated excerpts) with an
 * ellipsis and a "Continue reading" link in the embed template.
 *
 * @since 4.4.0
 *
 * @param string $more_string Default 'more' string.
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function wp_embed_excerpt_more($more_string)
{
}
/**
 * Displays the post excerpt for the embed template.
 *
 * Intended to be used in 'The Loop'.
 *
 * @since 4.4.0
 */
function the_excerpt_embed()
{
}
/**
 * Filters the post excerpt for the embed template.
 *
 * Shows players for video and audio attachments.
 *
 * @since 4.4.0
 *
 * @param string $content The current post excerpt.
 * @return string The modified post excerpt.
 */
function wp_embed_excerpt_attachment($content)
{
}
/**
 * Enqueue embed iframe default CSS and JS & fire do_action('enqueue_embed_scripts')
 *
 * Enqueue PNG fallback CSS for embed iframe for legacy versions of IE.
 *
 * Allows plugins to queue scripts for the embed iframe end using wp_enqueue_script().
 * Runs first in oembed_head().
 *
 * @since 4.4.0
 */
function enqueue_embed_scripts()
{
}
/**
 * Prints the CSS in the embed iframe header.
 *
 * @since 4.4.0
 */
function print_embed_styles()
{
}
/**
 * Prints the JavaScript in the embed iframe header.
 *
 * @since 4.4.0
 */
function print_embed_scripts()
{
}
/**
 * Prepare the oembed HTML to be displayed in an RSS feed.
 *
 * @since 4.4.0
 * @access private
 *
 * @param string $content The content to filter.
 * @return string The filtered content.
 */
function _oembed_filter_feed_content($content)
{
}
/**
 * Prints the necessary markup for the embed comments button.
 *
 * @since 4.4.0
 */
function print_embed_comments_button()
{
}
/**
 * Prints the necessary markup for the embed sharing button.
 *
 * @since 4.4.0
 */
function print_embed_sharing_button()
{
}
/**
 * Prints the necessary markup for the embed sharing dialog.
 *
 * @since 4.4.0
 */
function print_embed_sharing_dialog()
{
}
/**
 * Prints the necessary markup for the site title in an embed template.
 *
 * @since 4.5.0
 */
function the_embed_site_title()
{
}
/**
 * Filters the oEmbed result before any HTTP requests are made.
 *
 * If the URL belongs to the current site, the result is fetched directly instead of
 * going through the oEmbed discovery process.
 *
 * @since 4.5.3
 *
 * @param null|string $result The UNSANITIZED (and potentially unsafe) HTML that should be used to embed. Default null.
 * @param string      $url    The URL that should be inspected for discovery `<link>` tags.
 * @param array       $args   oEmbed remote get arguments.
 * @return null|string The UNSANITIZED (and potentially unsafe) HTML that should be used to embed.
 *                     Null if the URL does not belong to the current site.
 */
function wp_filter_pre_oembed_result($result, $url, $args)
{
}
/**
 * WordPress Feed API
 *
 * Many of the functions used in here belong in The Loop, or The Loop for the
 * Feeds.
 *
 * @package WordPress
 * @subpackage Feed
 * @since 2.1.0
 */
/**
 * RSS container for the bloginfo function.
 *
 * You can retrieve anything that you can using the get_bloginfo() function.
 * Everything will be stripped of tags and characters converted, when the values
 * are retrieved for use in the feeds.
 *
 * @since 1.5.1
 * @see get_bloginfo() For the list of possible values to display.
 *
 * @param string $show See get_bloginfo() for possible values.
 * @return string
 */
function get_bloginfo_rss($show = '')
{
}
/**
 * Display RSS container for the bloginfo function.
 *
 * You can retrieve anything that you can using the get_bloginfo() function.
 * Everything will be stripped of tags and characters converted, when the values
 * are retrieved for use in the feeds.
 *
 * @since 0.71
 * @see get_bloginfo() For the list of possible values to display.
 *
 * @param string $show See get_bloginfo() for possible values.
 */
function bloginfo_rss($show = '')
{
}
/**
 * Retrieve the default feed.
 *
 * The default feed is 'rss2', unless a plugin changes it through the
 * {@see 'default_feed'} filter.
 *
 * @since 2.5.0
 *
 * @return string Default feed, or for example 'rss2', 'atom', etc.
 */
function get_default_feed()
{
}
/**
 * Retrieve the blog title for the feed title.
 *
 * @since 2.2.0
 * @since 4.4.0 The optional `$sep` parameter was deprecated and renamed to `$deprecated`.
 *
 * @param string $deprecated Unused..
 * @return string The document title.
 */
function get_wp_title_rss($deprecated = '&#8211;')
{
}
/**
 * Display the blog title for display of the feed title.
 *
 * @since 2.2.0
 * @since 4.4.0 The optional `$sep` parameter was deprecated and renamed to `$deprecated`.
 *
 * @param string $deprecated Unused.
 */
function wp_title_rss($deprecated = '&#8211;')
{
}
/**
 * Retrieve the current post title for the feed.
 *
 * @since 2.0.0
 *
 * @return string Current post title.
 */
function get_the_title_rss()
{
}
/**
 * Display the post title in the feed.
 *
 * @since 0.71
 */
function the_title_rss()
{
}
/**
 * Retrieve the post content for feeds.
 *
 * @since 2.9.0
 * @see get_the_content()
 *
 * @param string $feed_type The type of feed. rss2 | atom | rss | rdf
 * @return string The filtered content.
 */
function get_the_content_feed($feed_type = \null)
{
}
/**
 * Display the post content for feeds.
 *
 * @since 2.9.0
 *
 * @param string $feed_type The type of feed. rss2 | atom | rss | rdf
 */
function the_content_feed($feed_type = \null)
{
}
/**
 * Display the post excerpt for the feed.
 *
 * @since 0.71
 */
function the_excerpt_rss()
{
}
/**
 * Display the permalink to the post for use in feeds.
 *
 * @since 2.3.0
 */
function the_permalink_rss()
{
}
/**
 * Outputs the link to the comments for the current post in an xml safe way
 *
 * @since 3.0.0
 * @return none
 */
function comments_link_feed()
{
}
/**
 * Display the feed GUID for the current comment.
 *
 * @since 2.5.0
 *
 * @param int|WP_Comment $comment_id Optional comment object or id. Defaults to global comment object.
 */
function comment_guid($comment_id = \null)
{
}
/**
 * Retrieve the feed GUID for the current comment.
 *
 * @since 2.5.0
 *
 * @param int|WP_Comment $comment_id Optional comment object or id. Defaults to global comment object.
 * @return false|string false on failure or guid for comment on success.
 */
function get_comment_guid($comment_id = \null)
{
}
/**
 * Display the link to the comments.
 *
 * @since 1.5.0
 * @since 4.4.0 Introduced the `$comment` argument.
 *
 * @param int|WP_Comment $comment Optional. Comment object or id. Defaults to global comment object.
 */
function comment_link($comment = \null)
{
}
/**
 * Retrieve the current comment author for use in the feeds.
 *
 * @since 2.0.0
 *
 * @return string Comment Author
 */
function get_comment_author_rss()
{
}
/**
 * Display the current comment author in the feed.
 *
 * @since 1.0.0
 */
function comment_author_rss()
{
}
/**
 * Display the current comment content for use in the feeds.
 *
 * @since 1.0.0
 */
function comment_text_rss()
{
}
/**
 * Retrieve all of the post categories, formatted for use in feeds.
 *
 * All of the categories for the current post in the feed loop, will be
 * retrieved and have feed markup added, so that they can easily be added to the
 * RSS2, Atom, or RSS1 and RSS0.91 RDF feeds.
 *
 * @since 2.1.0
 *
 * @param string $type Optional, default is the type returned by get_default_feed().
 * @return string All of the post categories for displaying in the feed.
 */
function get_the_category_rss($type = \null)
{
}
/**
 * Display the post categories in the feed.
 *
 * @since 0.71
 * @see get_the_category_rss() For better explanation.
 *
 * @param string $type Optional, default is the type returned by get_default_feed().
 */
function the_category_rss($type = \null)
{
}
/**
 * Display the HTML type based on the blog setting.
 *
 * The two possible values are either 'xhtml' or 'html'.
 *
 * @since 2.2.0
 */
function html_type_rss()
{
}
/**
 * Display the rss enclosure for the current post.
 *
 * Uses the global $post to check whether the post requires a password and if
 * the user has the password for the post. If not then it will return before
 * displaying.
 *
 * Also uses the function get_post_custom() to get the post's 'enclosure'
 * metadata field and parses the value to display the enclosure(s). The
 * enclosure(s) consist of enclosure HTML tag(s) with a URI and other
 * attributes.
 *
 * @since 1.5.0
 */
function rss_enclosure()
{
}
/**
 * Display the atom enclosure for the current post.
 *
 * Uses the global $post to check whether the post requires a password and if
 * the user has the password for the post. If not then it will return before
 * displaying.
 *
 * Also uses the function get_post_custom() to get the post's 'enclosure'
 * metadata field and parses the value to display the enclosure(s). The
 * enclosure(s) consist of link HTML tag(s) with a URI and other attributes.
 *
 * @since 2.2.0
 */
function atom_enclosure()
{
}
/**
 * Determine the type of a string of data with the data formatted.
 *
 * Tell whether the type is text, html, or xhtml, per RFC 4287 section 3.1.
 *
 * In the case of WordPress, text is defined as containing no markup,
 * xhtml is defined as "well formed", and html as tag soup (i.e., the rest).
 *
 * Container div tags are added to xhtml values, per section 3.1.1.3.
 *
 * @link http://www.atomenabled.org/developers/syndication/atom-format-spec.php#rfc.section.3.1
 *
 * @since 2.5.0
 *
 * @param string $data Input string
 * @return array array(type, value)
 */
function prep_atom_text_construct($data)
{
}
/**
 * Displays Site Icon in atom feeds.
 *
 * @since 4.3.0
 *
 * @see get_site_icon_url()
 */
function atom_site_icon()
{
}
/**
 * Displays Site Icon in RSS2.
 *
 * @since 4.3.0
 */
function rss2_site_icon()
{
}
/**
 * Display the link for the currently displayed feed in a XSS safe way.
 *
 * Generate a correct link for the atom:self element.
 *
 * @since 2.5.0
 */
function self_link()
{
}
/**
 * Return the content type for specified feed type.
 *
 * @since 2.8.0
 *
 * @param string $type Type of feed. Possible values include 'rss', rss2', 'atom', and 'rdf'.
 */
function feed_content_type($type = '')
{
}
/**
 * Build SimplePie object based on RSS or Atom feed from URL.
 *
 * @since 2.8.0
 *
 * @param mixed $url URL of feed to retrieve. If an array of URLs, the feeds are merged
 * using SimplePie's multifeed feature.
 * See also {@link ​http://simplepie.org/wiki/faq/typical_multifeed_gotchas}
 *
 * @return WP_Error|SimplePie WP_Error object on failure or SimplePie object on success
 */
function fetch_feed($url)
{
}
/**
 * Main WordPress Formatting API.
 *
 * Handles many functions for formatting output.
 *
 * @package WordPress
 */
/**
 * Replaces common plain text characters into formatted entities
 *
 * As an example,
 *
 *     'cause today's effort makes it worth tomorrow's "holiday" ...
 *
 * Becomes:
 *
 *     &#8217;cause today&#8217;s effort makes it worth tomorrow&#8217;s &#8220;holiday&#8221; &#8230;
 *
 * Code within certain html blocks are skipped.
 *
 * Do not use this function before the {@see 'init'} action hook; everything will break.
 *
 * @since 0.71
 *
 * @global array $wp_cockneyreplace Array of formatted entities for certain common phrases
 * @global array $shortcode_tags
 * @staticvar array  $static_characters
 * @staticvar array  $static_replacements
 * @staticvar array  $dynamic_characters
 * @staticvar array  $dynamic_replacements
 * @staticvar array  $default_no_texturize_tags
 * @staticvar array  $default_no_texturize_shortcodes
 * @staticvar bool   $run_texturize
 * @staticvar string $apos
 * @staticvar string $prime
 * @staticvar string $double_prime
 * @staticvar string $opening_quote
 * @staticvar string $closing_quote
 * @staticvar string $opening_single_quote
 * @staticvar string $closing_single_quote
 * @staticvar string $open_q_flag
 * @staticvar string $open_sq_flag
 * @staticvar string $apos_flag
 *
 * @param string $text The text to be formatted
 * @param bool   $reset Set to true for unit testing. Translated patterns will reset.
 * @return string The string replaced with html entities
 */
function wptexturize($text, $reset = \false)
{
}
/**
 * Implements a logic tree to determine whether or not "7'." represents seven feet,
 * then converts the special char into either a prime char or a closing quote char.
 *
 * @since 4.3.0
 *
 * @param string $haystack    The plain text to be searched.
 * @param string $needle      The character to search for such as ' or ".
 * @param string $prime       The prime char to use for replacement.
 * @param string $open_quote  The opening quote char. Opening quote replacement must be
 *                            accomplished already.
 * @param string $close_quote The closing quote char to use for replacement.
 * @return string The $haystack value after primes and quotes replacements.
 */
function wptexturize_primes($haystack, $needle, $prime, $open_quote, $close_quote)
{
}
/**
 * Search for disabled element tags. Push element to stack on tag open and pop
 * on tag close.
 *
 * Assumes first char of $text is tag opening and last char is tag closing.
 * Assumes second char of $text is optionally '/' to indicate closing as in </html>.
 *
 * @since 2.9.0
 * @access private
 *
 * @param string $text Text to check. Must be a tag like `<html>` or `[shortcode]`.
 * @param array  $stack List of open tag elements.
 * @param array  $disabled_elements The tag names to match against. Spaces are not allowed in tag names.
 */
function _wptexturize_pushpop_element($text, &$stack, $disabled_elements)
{
}
/**
 * Replaces double line-breaks with paragraph elements.
 *
 * A group of regex replaces used to identify text formatted with newlines and
 * replace double line-breaks with HTML paragraph tags. The remaining line-breaks
 * after conversion become <<br />> tags, unless $br is set to '0' or 'false'.
 *
 * @since 0.71
 *
 * @param string $pee The text which has to be formatted.
 * @param bool   $br  Optional. If set, this will convert all remaining line-breaks
 *                    after paragraphing. Default true.
 * @return string Text which has been converted into correct paragraph tags.
 */
function wpautop($pee, $br = \true)
{
}
/**
 * Separate HTML elements and comments from the text.
 *
 * @since 4.2.4
 *
 * @param string $input The text which has to be formatted.
 * @return array The formatted text.
 */
function wp_html_split($input)
{
}
/**
 * Retrieve the regular expression for an HTML element.
 *
 * @since 4.4.0
 *
 * @staticvar string $regex
 *
 * @return string The regular expression
 */
function get_html_split_regex()
{
}
/**
 * Retrieve the combined regular expression for HTML and shortcodes.
 *
 * @access private
 * @ignore
 * @internal This function will be removed in 4.5.0 per Shortcode API Roadmap.
 * @since 4.4.0
 *
 * @staticvar string $html_regex
 *
 * @param string $shortcode_regex The result from _get_wptexturize_shortcode_regex().  Optional.
 * @return string The regular expression
 */
function _get_wptexturize_split_regex($shortcode_regex = '')
{
}
/**
 * Retrieve the regular expression for shortcodes.
 *
 * @access private
 * @ignore
 * @internal This function will be removed in 4.5.0 per Shortcode API Roadmap.
 * @since 4.4.0
 *
 * @param array $tagnames List of shortcodes to find.
 * @return string The regular expression
 */
function _get_wptexturize_shortcode_regex($tagnames)
{
}
/**
 * Replace characters or phrases within HTML elements only.
 *
 * @since 4.2.3
 *
 * @param string $haystack The text which has to be formatted.
 * @param array $replace_pairs In the form array('from' => 'to', ...).
 * @return string The formatted text.
 */
function wp_replace_in_html_tags($haystack, $replace_pairs)
{
}
/**
 * Newline preservation help function for wpautop
 *
 * @since 3.1.0
 * @access private
 *
 * @param array $matches preg_replace_callback matches array
 * @return string
 */
function _autop_newline_preservation_helper($matches)
{
}
/**
 * Don't auto-p wrap shortcodes that stand alone
 *
 * Ensures that shortcodes are not wrapped in `<p>...</p>`.
 *
 * @since 2.9.0
 *
 * @global array $shortcode_tags
 *
 * @param string $pee The content.
 * @return string The filtered content.
 */
function shortcode_unautop($pee)
{
}
/**
 * Checks to see if a string is utf8 encoded.
 *
 * NOTE: This function checks for 5-Byte sequences, UTF8
 *       has Bytes Sequences with a maximum length of 4.
 *
 * @author bmorel at ssi dot fr (modified)
 * @since 1.2.1
 *
 * @param string $str The string to be checked
 * @return bool True if $str fits a UTF-8 model, false otherwise.
 */
function seems_utf8($str)
{
}
/**
 * Converts a number of special characters into their HTML entities.
 *
 * Specifically deals with: &, <, >, ", and '.
 *
 * $quote_style can be set to ENT_COMPAT to encode " to
 * &quot;, or ENT_QUOTES to do both. Default is ENT_NOQUOTES where no quotes are encoded.
 *
 * @since 1.2.2
 * @access private
 *
 * @staticvar string $_charset
 *
 * @param string     $string         The text which is to be encoded.
 * @param int|string $quote_style    Optional. Converts double quotes if set to ENT_COMPAT,
 *                                   both single and double if set to ENT_QUOTES or none if set to ENT_NOQUOTES.
 *                                   Also compatible with old values; converting single quotes if set to 'single',
 *                                   double if set to 'double' or both if otherwise set.
 *                                   Default is ENT_NOQUOTES.
 * @param string     $charset        Optional. The character encoding of the string. Default is false.
 * @param bool       $double_encode  Optional. Whether to encode existing html entities. Default is false.
 * @return string The encoded text with HTML entities.
 */
function _wp_specialchars($string, $quote_style = \ENT_NOQUOTES, $charset = \false, $double_encode = \false)
{
}
/**
 * Converts a number of HTML entities into their special characters.
 *
 * Specifically deals with: &, <, >, ", and '.
 *
 * $quote_style can be set to ENT_COMPAT to decode " entities,
 * or ENT_QUOTES to do both " and '. Default is ENT_NOQUOTES where no quotes are decoded.
 *
 * @since 2.8.0
 *
 * @param string     $string The text which is to be decoded.
 * @param string|int $quote_style Optional. Converts double quotes if set to ENT_COMPAT,
 *                                both single and double if set to ENT_QUOTES or
 *                                none if set to ENT_NOQUOTES.
 *                                Also compatible with old _wp_specialchars() values;
 *                                converting single quotes if set to 'single',
 *                                double if set to 'double' or both if otherwise set.
 *                                Default is ENT_NOQUOTES.
 * @return string The decoded text without HTML entities.
 */
function wp_specialchars_decode($string, $quote_style = \ENT_NOQUOTES)
{
}
/**
 * Checks for invalid UTF8 in a string.
 *
 * @since 2.8.0
 *
 * @staticvar bool $is_utf8
 * @staticvar bool $utf8_pcre
 *
 * @param string  $string The text which is to be checked.
 * @param bool    $strip Optional. Whether to attempt to strip out invalid UTF8. Default is false.
 * @return string The checked text.
 */
function wp_check_invalid_utf8($string, $strip = \false)
{
}
/**
 * Encode the Unicode values to be used in the URI.
 *
 * @since 1.5.0
 *
 * @param string $utf8_string
 * @param int    $length Max  length of the string
 * @return string String with Unicode encoded for URI.
 */
function utf8_uri_encode($utf8_string, $length = 0)
{
}
/**
 * Converts all accent characters to ASCII characters.
 *
 * If there are no accent characters, then the string given is just returned.
 *
 * **Accent characters converted:**
 *
 * Currency signs:
 *
 * |   Code   | Glyph | Replacement |     Description     |
 * | -------- | ----- | ----------- | ------------------- |
 * | U+00A3   | £     | (empty)     | British Pound sign  |
 * | U+20AC   | €     | E           | Euro sign           |
 *
 * Decompositions for Latin-1 Supplement:
 *
 * |  Code   | Glyph | Replacement |               Description              |
 * | ------- | ----- | ----------- | -------------------------------------- |
 * | U+00AA  | ª     | a           | Feminine ordinal indicator             |
 * | U+00BA  | º     | o           | Masculine ordinal indicator            |
 * | U+00C0  | À     | A           | Latin capital letter A with grave      |
 * | U+00C1  | Á     | A           | Latin capital letter A with acute      |
 * | U+00C2  | Â     | A           | Latin capital letter A with circumflex |
 * | U+00C3  | Ã     | A           | Latin capital letter A with tilde      |
 * | U+00C4  | Ä     | A           | Latin capital letter A with diaeresis  |
 * | U+00C5  | Å     | A           | Latin capital letter A with ring above |
 * | U+00C6  | Æ     | AE          | Latin capital letter AE                |
 * | U+00C7  | Ç     | C           | Latin capital letter C with cedilla    |
 * | U+00C8  | È     | E           | Latin capital letter E with grave      |
 * | U+00C9  | É     | E           | Latin capital letter E with acute      |
 * | U+00CA  | Ê     | E           | Latin capital letter E with circumflex |
 * | U+00CB  | Ë     | E           | Latin capital letter E with diaeresis  |
 * | U+00CC  | Ì     | I           | Latin capital letter I with grave      |
 * | U+00CD  | Í     | I           | Latin capital letter I with acute      |
 * | U+00CE  | Î     | I           | Latin capital letter I with circumflex |
 * | U+00CF  | Ï     | I           | Latin capital letter I with diaeresis  |
 * | U+00D0  | Ð     | D           | Latin capital letter Eth               |
 * | U+00D1  | Ñ     | N           | Latin capital letter N with tilde      |
 * | U+00D2  | Ò     | O           | Latin capital letter O with grave      |
 * | U+00D3  | Ó     | O           | Latin capital letter O with acute      |
 * | U+00D4  | Ô     | O           | Latin capital letter O with circumflex |
 * | U+00D5  | Õ     | O           | Latin capital letter O with tilde      |
 * | U+00D6  | Ö     | O           | Latin capital letter O with diaeresis  |
 * | U+00D8  | Ø     | O           | Latin capital letter O with stroke     |
 * | U+00D9  | Ù     | U           | Latin capital letter U with grave      |
 * | U+00DA  | Ú     | U           | Latin capital letter U with acute      |
 * | U+00DB  | Û     | U           | Latin capital letter U with circumflex |
 * | U+00DC  | Ü     | U           | Latin capital letter U with diaeresis  |
 * | U+00DD  | Ý     | Y           | Latin capital letter Y with acute      |
 * | U+00DE  | Þ     | TH          | Latin capital letter Thorn             |
 * | U+00DF  | ß     | s           | Latin small letter sharp s             |
 * | U+00E0  | à     | a           | Latin small letter a with grave        |
 * | U+00E1  | á     | a           | Latin small letter a with acute        |
 * | U+00E2  | â     | a           | Latin small letter a with circumflex   |
 * | U+00E3  | ã     | a           | Latin small letter a with tilde        |
 * | U+00E4  | ä     | a           | Latin small letter a with diaeresis    |
 * | U+00E5  | å     | a           | Latin small letter a with ring above   |
 * | U+00E6  | æ     | ae          | Latin small letter ae                  |
 * | U+00E7  | ç     | c           | Latin small letter c with cedilla      |
 * | U+00E8  | è     | e           | Latin small letter e with grave        |
 * | U+00E9  | é     | e           | Latin small letter e with acute        |
 * | U+00EA  | ê     | e           | Latin small letter e with circumflex   |
 * | U+00EB  | ë     | e           | Latin small letter e with diaeresis    |
 * | U+00EC  | ì     | i           | Latin small letter i with grave        |
 * | U+00ED  | í     | i           | Latin small letter i with acute        |
 * | U+00EE  | î     | i           | Latin small letter i with circumflex   |
 * | U+00EF  | ï     | i           | Latin small letter i with diaeresis    |
 * | U+00F0  | ð     | d           | Latin small letter Eth                 |
 * | U+00F1  | ñ     | n           | Latin small letter n with tilde        |
 * | U+00F2  | ò     | o           | Latin small letter o with grave        |
 * | U+00F3  | ó     | o           | Latin small letter o with acute        |
 * | U+00F4  | ô     | o           | Latin small letter o with circumflex   |
 * | U+00F5  | õ     | o           | Latin small letter o with tilde        |
 * | U+00F6  | ö     | o           | Latin small letter o with diaeresis    |
 * | U+00F8  | ø     | o           | Latin small letter o with stroke       |
 * | U+00F9  | ù     | u           | Latin small letter u with grave        |
 * | U+00FA  | ú     | u           | Latin small letter u with acute        |
 * | U+00FB  | û     | u           | Latin small letter u with circumflex   |
 * | U+00FC  | ü     | u           | Latin small letter u with diaeresis    |
 * | U+00FD  | ý     | y           | Latin small letter y with acute        |
 * | U+00FE  | þ     | th          | Latin small letter Thorn               |
 * | U+00FF  | ÿ     | y           | Latin small letter y with diaeresis    |
 *
 * Decompositions for Latin Extended-A:
 *
 * |  Code   | Glyph | Replacement |                    Description                    |
 * | ------- | ----- | ----------- | ------------------------------------------------- |
 * | U+0100  | Ā     | A           | Latin capital letter A with macron                |
 * | U+0101  | ā     | a           | Latin small letter a with macron                  |
 * | U+0102  | Ă     | A           | Latin capital letter A with breve                 |
 * | U+0103  | ă     | a           | Latin small letter a with breve                   |
 * | U+0104  | Ą     | A           | Latin capital letter A with ogonek                |
 * | U+0105  | ą     | a           | Latin small letter a with ogonek                  |
 * | U+01006 | Ć     | C           | Latin capital letter C with acute                 |
 * | U+0107  | ć     | c           | Latin small letter c with acute                   |
 * | U+0108  | Ĉ     | C           | Latin capital letter C with circumflex            |
 * | U+0109  | ĉ     | c           | Latin small letter c with circumflex              |
 * | U+010A  | Ċ     | C           | Latin capital letter C with dot above             |
 * | U+010B  | ċ     | c           | Latin small letter c with dot above               |
 * | U+010C  | Č     | C           | Latin capital letter C with caron                 |
 * | U+010D  | č     | c           | Latin small letter c with caron                   |
 * | U+010E  | Ď     | D           | Latin capital letter D with caron                 |
 * | U+010F  | ď     | d           | Latin small letter d with caron                   |
 * | U+0110  | Đ     | D           | Latin capital letter D with stroke                |
 * | U+0111  | đ     | d           | Latin small letter d with stroke                  |
 * | U+0112  | Ē     | E           | Latin capital letter E with macron                |
 * | U+0113  | ē     | e           | Latin small letter e with macron                  |
 * | U+0114  | Ĕ     | E           | Latin capital letter E with breve                 |
 * | U+0115  | ĕ     | e           | Latin small letter e with breve                   |
 * | U+0116  | Ė     | E           | Latin capital letter E with dot above             |
 * | U+0117  | ė     | e           | Latin small letter e with dot above               |
 * | U+0118  | Ę     | E           | Latin capital letter E with ogonek                |
 * | U+0119  | ę     | e           | Latin small letter e with ogonek                  |
 * | U+011A  | Ě     | E           | Latin capital letter E with caron                 |
 * | U+011B  | ě     | e           | Latin small letter e with caron                   |
 * | U+011C  | Ĝ     | G           | Latin capital letter G with circumflex            |
 * | U+011D  | ĝ     | g           | Latin small letter g with circumflex              |
 * | U+011E  | Ğ     | G           | Latin capital letter G with breve                 |
 * | U+011F  | ğ     | g           | Latin small letter g with breve                   |
 * | U+0120  | Ġ     | G           | Latin capital letter G with dot above             |
 * | U+0121  | ġ     | g           | Latin small letter g with dot above               |
 * | U+0122  | Ģ     | G           | Latin capital letter G with cedilla               |
 * | U+0123  | ģ     | g           | Latin small letter g with cedilla                 |
 * | U+0124  | Ĥ     | H           | Latin capital letter H with circumflex            |
 * | U+0125  | ĥ     | h           | Latin small letter h with circumflex              |
 * | U+0126  | Ħ     | H           | Latin capital letter H with stroke                |
 * | U+0127  | ħ     | h           | Latin small letter h with stroke                  |
 * | U+0128  | Ĩ     | I           | Latin capital letter I with tilde                 |
 * | U+0129  | ĩ     | i           | Latin small letter i with tilde                   |
 * | U+012A  | Ī     | I           | Latin capital letter I with macron                |
 * | U+012B  | ī     | i           | Latin small letter i with macron                  |
 * | U+012C  | Ĭ     | I           | Latin capital letter I with breve                 |
 * | U+012D  | ĭ     | i           | Latin small letter i with breve                   |
 * | U+012E  | Į     | I           | Latin capital letter I with ogonek                |
 * | U+012F  | į     | i           | Latin small letter i with ogonek                  |
 * | U+0130  | İ     | I           | Latin capital letter I with dot above             |
 * | U+0131  | ı     | i           | Latin small letter dotless i                      |
 * | U+0132  | Ĳ     | IJ          | Latin capital ligature IJ                         |
 * | U+0133  | ĳ     | ij          | Latin small ligature ij                           |
 * | U+0134  | Ĵ     | J           | Latin capital letter J with circumflex            |
 * | U+0135  | ĵ     | j           | Latin small letter j with circumflex              |
 * | U+0136  | Ķ     | K           | Latin capital letter K with cedilla               |
 * | U+0137  | ķ     | k           | Latin small letter k with cedilla                 |
 * | U+0138  | ĸ     | k           | Latin small letter Kra                            |
 * | U+0139  | Ĺ     | L           | Latin capital letter L with acute                 |
 * | U+013A  | ĺ     | l           | Latin small letter l with acute                   |
 * | U+013B  | Ļ     | L           | Latin capital letter L with cedilla               |
 * | U+013C  | ļ     | l           | Latin small letter l with cedilla                 |
 * | U+013D  | Ľ     | L           | Latin capital letter L with caron                 |
 * | U+013E  | ľ     | l           | Latin small letter l with caron                   |
 * | U+013F  | Ŀ     | L           | Latin capital letter L with middle dot            |
 * | U+0140  | ŀ     | l           | Latin small letter l with middle dot              |
 * | U+0141  | Ł     | L           | Latin capital letter L with stroke                |
 * | U+0142  | ł     | l           | Latin small letter l with stroke                  |
 * | U+0143  | Ń     | N           | Latin capital letter N with acute                 |
 * | U+0144  | ń     | n           | Latin small letter N with acute                   |
 * | U+0145  | Ņ     | N           | Latin capital letter N with cedilla               |
 * | U+0146  | ņ     | n           | Latin small letter n with cedilla                 |
 * | U+0147  | Ň     | N           | Latin capital letter N with caron                 |
 * | U+0148  | ň     | n           | Latin small letter n with caron                   |
 * | U+0149  | ŉ     | n           | Latin small letter n preceded by apostrophe       |
 * | U+014A  | Ŋ     | N           | Latin capital letter Eng                          |
 * | U+014B  | ŋ     | n           | Latin small letter Eng                            |
 * | U+014C  | Ō     | O           | Latin capital letter O with macron                |
 * | U+014D  | ō     | o           | Latin small letter o with macron                  |
 * | U+014E  | Ŏ     | O           | Latin capital letter O with breve                 |
 * | U+014F  | ŏ     | o           | Latin small letter o with breve                   |
 * | U+0150  | Ő     | O           | Latin capital letter O with double acute          |
 * | U+0151  | ő     | o           | Latin small letter o with double acute            |
 * | U+0152  | Œ     | OE          | Latin capital ligature OE                         |
 * | U+0153  | œ     | oe          | Latin small ligature oe                           |
 * | U+0154  | Ŕ     | R           | Latin capital letter R with acute                 |
 * | U+0155  | ŕ     | r           | Latin small letter r with acute                   |
 * | U+0156  | Ŗ     | R           | Latin capital letter R with cedilla               |
 * | U+0157  | ŗ     | r           | Latin small letter r with cedilla                 |
 * | U+0158  | Ř     | R           | Latin capital letter R with caron                 |
 * | U+0159  | ř     | r           | Latin small letter r with caron                   |
 * | U+015A  | Ś     | S           | Latin capital letter S with acute                 |
 * | U+015B  | ś     | s           | Latin small letter s with acute                   |
 * | U+015C  | Ŝ     | S           | Latin capital letter S with circumflex            |
 * | U+015D  | ŝ     | s           | Latin small letter s with circumflex              |
 * | U+015E  | Ş     | S           | Latin capital letter S with cedilla               |
 * | U+015F  | ş     | s           | Latin small letter s with cedilla                 |
 * | U+0160  | Š     | S           | Latin capital letter S with caron                 |
 * | U+0161  | š     | s           | Latin small letter s with caron                   |
 * | U+0162  | Ţ     | T           | Latin capital letter T with cedilla               |
 * | U+0163  | ţ     | t           | Latin small letter t with cedilla                 |
 * | U+0164  | Ť     | T           | Latin capital letter T with caron                 |
 * | U+0165  | ť     | t           | Latin small letter t with caron                   |
 * | U+0166  | Ŧ     | T           | Latin capital letter T with stroke                |
 * | U+0167  | ŧ     | t           | Latin small letter t with stroke                  |
 * | U+0168  | Ũ     | U           | Latin capital letter U with tilde                 |
 * | U+0169  | ũ     | u           | Latin small letter u with tilde                   |
 * | U+016A  | Ū     | U           | Latin capital letter U with macron                |
 * | U+016B  | ū     | u           | Latin small letter u with macron                  |
 * | U+016C  | Ŭ     | U           | Latin capital letter U with breve                 |
 * | U+016D  | ŭ     | u           | Latin small letter u with breve                   |
 * | U+016E  | Ů     | U           | Latin capital letter U with ring above            |
 * | U+016F  | ů     | u           | Latin small letter u with ring above              |
 * | U+0170  | Ű     | U           | Latin capital letter U with double acute          |
 * | U+0171  | ű     | u           | Latin small letter u with double acute            |
 * | U+0172  | Ų     | U           | Latin capital letter U with ogonek                |
 * | U+0173  | ų     | u           | Latin small letter u with ogonek                  |
 * | U+0174  | Ŵ     | W           | Latin capital letter W with circumflex            |
 * | U+0175  | ŵ     | w           | Latin small letter w with circumflex              |
 * | U+0176  | Ŷ     | Y           | Latin capital letter Y with circumflex            |
 * | U+0177  | ŷ     | y           | Latin small letter y with circumflex              |
 * | U+0178  | Ÿ     | Y           | Latin capital letter Y with diaeresis             |
 * | U+0179  | Ź     | Z           | Latin capital letter Z with acute                 |
 * | U+017A  | ź     | z           | Latin small letter z with acute                   |
 * | U+017B  | Ż     | Z           | Latin capital letter Z with dot above             |
 * | U+017C  | ż     | z           | Latin small letter z with dot above               |
 * | U+017D  | Ž     | Z           | Latin capital letter Z with caron                 |
 * | U+017E  | ž     | z           | Latin small letter z with caron                   |
 * | U+017F  | ſ     | s           | Latin small letter long s                         |
 * | U+01A0  | Ơ     | O           | Latin capital letter O with horn                  |
 * | U+01A1  | ơ     | o           | Latin small letter o with horn                    |
 * | U+01AF  | Ư     | U           | Latin capital letter U with horn                  |
 * | U+01B0  | ư     | u           | Latin small letter u with horn                    |
 * | U+01CD  | Ǎ     | A           | Latin capital letter A with caron                 |
 * | U+01CE  | ǎ     | a           | Latin small letter a with caron                   |
 * | U+01CF  | Ǐ     | I           | Latin capital letter I with caron                 |
 * | U+01D0  | ǐ     | i           | Latin small letter i with caron                   |
 * | U+01D1  | Ǒ     | O           | Latin capital letter O with caron                 |
 * | U+01D2  | ǒ     | o           | Latin small letter o with caron                   |
 * | U+01D3  | Ǔ     | U           | Latin capital letter U with caron                 |
 * | U+01D4  | ǔ     | u           | Latin small letter u with caron                   |
 * | U+01D5  | Ǖ     | U           | Latin capital letter U with diaeresis and macron  |
 * | U+01D6  | ǖ     | u           | Latin small letter u with diaeresis and macron    |
 * | U+01D7  | Ǘ     | U           | Latin capital letter U with diaeresis and acute   |
 * | U+01D8  | ǘ     | u           | Latin small letter u with diaeresis and acute     |
 * | U+01D9  | Ǚ     | U           | Latin capital letter U with diaeresis and caron   |
 * | U+01DA  | ǚ     | u           | Latin small letter u with diaeresis and caron     |
 * | U+01DB  | Ǜ     | U           | Latin capital letter U with diaeresis and grave   |
 * | U+01DC  | ǜ     | u           | Latin small letter u with diaeresis and grave     |
 *
 * Decompositions for Latin Extended-B:
 *
 * |   Code   | Glyph | Replacement |                Description                |
 * | -------- | ----- | ----------- | ----------------------------------------- |
 * | U+0218   | Ș     | S           | Latin capital letter S with comma below   |
 * | U+0219   | ș     | s           | Latin small letter s with comma below     |
 * | U+021A   | Ț     | T           | Latin capital letter T with comma below   |
 * | U+021B   | ț     | t           | Latin small letter t with comma below     |
 *
 * Vowels with diacritic (Chinese, Hanyu Pinyin):
 *
 * |   Code   | Glyph | Replacement |                      Description                      |
 * | -------- | ----- | ----------- | ----------------------------------------------------- |
 * | U+0251   | ɑ     | a           | Latin small letter alpha                              |
 * | U+1EA0   | Ạ     | A           | Latin capital letter A with dot below                 |
 * | U+1EA1   | ạ     | a           | Latin small letter a with dot below                   |
 * | U+1EA2   | Ả     | A           | Latin capital letter A with hook above                |
 * | U+1EA3   | ả     | a           | Latin small letter a with hook above                  |
 * | U+1EA4   | Ấ     | A           | Latin capital letter A with circumflex and acute      |
 * | U+1EA5   | ấ     | a           | Latin small letter a with circumflex and acute        |
 * | U+1EA6   | Ầ     | A           | Latin capital letter A with circumflex and grave      |
 * | U+1EA7   | ầ     | a           | Latin small letter a with circumflex and grave        |
 * | U+1EA8   | Ẩ     | A           | Latin capital letter A with circumflex and hook above |
 * | U+1EA9   | ẩ     | a           | Latin small letter a with circumflex and hook above   |
 * | U+1EAA   | Ẫ     | A           | Latin capital letter A with circumflex and tilde      |
 * | U+1EAB   | ẫ     | a           | Latin small letter a with circumflex and tilde        |
 * | U+1EA6   | Ậ     | A           | Latin capital letter A with circumflex and dot below  |
 * | U+1EAD   | ậ     | a           | Latin small letter a with circumflex and dot below    |
 * | U+1EAE   | Ắ     | A           | Latin capital letter A with breve and acute           |
 * | U+1EAF   | ắ     | a           | Latin small letter a with breve and acute             |
 * | U+1EB0   | Ằ     | A           | Latin capital letter A with breve and grave           |
 * | U+1EB1   | ằ     | a           | Latin small letter a with breve and grave             |
 * | U+1EB2   | Ẳ     | A           | Latin capital letter A with breve and hook above      |
 * | U+1EB3   | ẳ     | a           | Latin small letter a with breve and hook above        |
 * | U+1EB4   | Ẵ     | A           | Latin capital letter A with breve and tilde           |
 * | U+1EB5   | ẵ     | a           | Latin small letter a with breve and tilde             |
 * | U+1EB6   | Ặ     | A           | Latin capital letter A with breve and dot below       |
 * | U+1EB7   | ặ     | a           | Latin small letter a with breve and dot below         |
 * | U+1EB8   | Ẹ     | E           | Latin capital letter E with dot below                 |
 * | U+1EB9   | ẹ     | e           | Latin small letter e with dot below                   |
 * | U+1EBA   | Ẻ     | E           | Latin capital letter E with hook above                |
 * | U+1EBB   | ẻ     | e           | Latin small letter e with hook above                  |
 * | U+1EBC   | Ẽ     | E           | Latin capital letter E with tilde                     |
 * | U+1EBD   | ẽ     | e           | Latin small letter e with tilde                       |
 * | U+1EBE   | Ế     | E           | Latin capital letter E with circumflex and acute      |
 * | U+1EBF   | ế     | e           | Latin small letter e with circumflex and acute        |
 * | U+1EC0   | Ề     | E           | Latin capital letter E with circumflex and grave      |
 * | U+1EC1   | ề     | e           | Latin small letter e with circumflex and grave        |
 * | U+1EC2   | Ể     | E           | Latin capital letter E with circumflex and hook above |
 * | U+1EC3   | ể     | e           | Latin small letter e with circumflex and hook above   |
 * | U+1EC4   | Ễ     | E           | Latin capital letter E with circumflex and tilde      |
 * | U+1EC5   | ễ     | e           | Latin small letter e with circumflex and tilde        |
 * | U+1EC6   | Ệ     | E           | Latin capital letter E with circumflex and dot below  |
 * | U+1EC7   | ệ     | e           | Latin small letter e with circumflex and dot below    |
 * | U+1EC8   | Ỉ     | I           | Latin capital letter I with hook above                |
 * | U+1EC9   | ỉ     | i           | Latin small letter i with hook above                  |
 * | U+1ECA   | Ị     | I           | Latin capital letter I with dot below                 |
 * | U+1ECB   | ị     | i           | Latin small letter i with dot below                   |
 * | U+1ECC   | Ọ     | O           | Latin capital letter O with dot below                 |
 * | U+1ECD   | ọ     | o           | Latin small letter o with dot below                   |
 * | U+1ECE   | Ỏ     | O           | Latin capital letter O with hook above                |
 * | U+1ECF   | ỏ     | o           | Latin small letter o with hook above                  |
 * | U+1ED0   | Ố     | O           | Latin capital letter O with circumflex and acute      |
 * | U+1ED1   | ố     | o           | Latin small letter o with circumflex and acute        |
 * | U+1ED2   | Ồ     | O           | Latin capital letter O with circumflex and grave      |
 * | U+1ED3   | ồ     | o           | Latin small letter o with circumflex and grave        |
 * | U+1ED4   | Ổ     | O           | Latin capital letter O with circumflex and hook above |
 * | U+1ED5   | ổ     | o           | Latin small letter o with circumflex and hook above   |
 * | U+1ED6   | Ỗ     | O           | Latin capital letter O with circumflex and tilde      |
 * | U+1ED7   | ỗ     | o           | Latin small letter o with circumflex and tilde        |
 * | U+1ED8   | Ộ     | O           | Latin capital letter O with circumflex and dot below  |
 * | U+1ED9   | ộ     | o           | Latin small letter o with circumflex and dot below    |
 * | U+1EDA   | Ớ     | O           | Latin capital letter O with horn and acute            |
 * | U+1EDB   | ớ     | o           | Latin small letter o with horn and acute              |
 * | U+1EDC   | Ờ     | O           | Latin capital letter O with horn and grave            |
 * | U+1EDD   | ờ     | o           | Latin small letter o with horn and grave              |
 * | U+1EDE   | Ở     | O           | Latin capital letter O with horn and hook above       |
 * | U+1EDF   | ở     | o           | Latin small letter o with horn and hook above         |
 * | U+1EE0   | Ỡ     | O           | Latin capital letter O with horn and tilde            |
 * | U+1EE1   | ỡ     | o           | Latin small letter o with horn and tilde              |
 * | U+1EE2   | Ợ     | O           | Latin capital letter O with horn and dot below        |
 * | U+1EE3   | ợ     | o           | Latin small letter o with horn and dot below          |
 * | U+1EE4   | Ụ     | U           | Latin capital letter U with dot below                 |
 * | U+1EE5   | ụ     | u           | Latin small letter u with dot below                   |
 * | U+1EE6   | Ủ     | U           | Latin capital letter U with hook above                |
 * | U+1EE7   | ủ     | u           | Latin small letter u with hook above                  |
 * | U+1EE8   | Ứ     | U           | Latin capital letter U with horn and acute            |
 * | U+1EE9   | ứ     | u           | Latin small letter u with horn and acute              |
 * | U+1EEA   | Ừ     | U           | Latin capital letter U with horn and grave            |
 * | U+1EEB   | ừ     | u           | Latin small letter u with horn and grave              |
 * | U+1EEC   | Ử     | U           | Latin capital letter U with horn and hook above       |
 * | U+1EED   | ử     | u           | Latin small letter u with horn and hook above         |
 * | U+1EEE   | Ữ     | U           | Latin capital letter U with horn and tilde            |
 * | U+1EEF   | ữ     | u           | Latin small letter u with horn and tilde              |
 * | U+1EF0   | Ự     | U           | Latin capital letter U with horn and dot below        |
 * | U+1EF1   | ự     | u           | Latin small letter u with horn and dot below          |
 * | U+1EF2   | Ỳ     | Y           | Latin capital letter Y with grave                     |
 * | U+1EF3   | ỳ     | y           | Latin small letter y with grave                       |
 * | U+1EF4   | Ỵ     | Y           | Latin capital letter Y with dot below                 |
 * | U+1EF5   | ỵ     | y           | Latin small letter y with dot below                   |
 * | U+1EF6   | Ỷ     | Y           | Latin capital letter Y with hook above                |
 * | U+1EF7   | ỷ     | y           | Latin small letter y with hook above                  |
 * | U+1EF8   | Ỹ     | Y           | Latin capital letter Y with tilde                     |
 * | U+1EF9   | ỹ     | y           | Latin small letter y with tilde                       |
 *
 * German (`de_DE`), German formal (`de_DE_formal`), German (Switzerland) formal (`de_CH`),
 * and German (Switzerland) informal (`de_CH_informal`) locales:
 *
 * |   Code   | Glyph | Replacement |               Description               |
 * | -------- | ----- | ----------- | --------------------------------------- |
 * | U+00C4   | Ä     | Ae          | Latin capital letter A with diaeresis   |
 * | U+00E4   | ä     | ae          | Latin small letter a with diaeresis     |
 * | U+00D6   | Ö     | Oe          | Latin capital letter O with diaeresis   |
 * | U+00F6   | ö     | oe          | Latin small letter o with diaeresis     |
 * | U+00DC   | Ü     | Ue          | Latin capital letter U with diaeresis   |
 * | U+00FC   | ü     | ue          | Latin small letter u with diaeresis     |
 * | U+00DF   | ß     | ss          | Latin small letter sharp s              |
 *
 * Danish (`da_DK`) locale:
 *
 * |   Code   | Glyph | Replacement |               Description               |
 * | -------- | ----- | ----------- | --------------------------------------- |
 * | U+00C6   | Æ     | Ae          | Latin capital letter AE                 |
 * | U+00E6   | æ     | ae          | Latin small letter ae                   |
 * | U+00D8   | Ø     | Oe          | Latin capital letter O with stroke      |
 * | U+00F8   | ø     | oe          | Latin small letter o with stroke        |
 * | U+00C5   | Å     | Aa          | Latin capital letter A with ring above  |
 * | U+00E5   | å     | aa          | Latin small letter a with ring above    |
 *
 * Catalan (`ca`) locale:
 *
 * |   Code   | Glyph | Replacement |               Description               |
 * | -------- | ----- | ----------- | --------------------------------------- |
 * | U+00B7   | l·l   | ll          | Flown dot (between two Ls)              |
 *
 * Serbian (`sr_RS`) and Bosnian (`bs_BA`) locales:
 *
 * |   Code   | Glyph | Replacement |               Description               |
 * | -------- | ----- | ----------- | --------------------------------------- |
 * | U+0110   | Đ     | DJ          | Latin capital letter D with stroke      |
 * | U+0111   | đ     | dj          | Latin small letter d with stroke        |
 *
 * @since 1.2.1
 * @since 4.6.0 Added locale support for `de_CH`, `de_CH_informal`, and `ca`.
 * @since 4.7.0 Added locale support for `sr_RS`.
 * @since 4.8.0 Added locale support for `bs_BA`.
 *
 * @param string $string Text that might have accent characters
 * @return string Filtered string with replaced "nice" characters.
 */
function remove_accents($string)
{
}
/**
 * Sanitizes a filename, replacing whitespace with dashes.
 *
 * Removes special characters that are illegal in filenames on certain
 * operating systems and special characters requiring special escaping
 * to manipulate at the command line. Replaces spaces and consecutive
 * dashes with a single dash. Trims period, dash and underscore from beginning
 * and end of filename. It is not guaranteed that this function will return a
 * filename that is allowed to be uploaded.
 *
 * @since 2.1.0
 *
 * @param string $filename The filename to be sanitized
 * @return string The sanitized filename
 */
function sanitize_file_name($filename)
{
}
/**
 * Sanitizes a username, stripping out unsafe characters.
 *
 * Removes tags, octets, entities, and if strict is enabled, will only keep
 * alphanumeric, _, space, ., -, @. After sanitizing, it passes the username,
 * raw username (the username in the parameter), and the value of $strict as
 * parameters for the {@see 'sanitize_user'} filter.
 *
 * @since 2.0.0
 *
 * @param string $username The username to be sanitized.
 * @param bool   $strict   If set limits $username to specific characters. Default false.
 * @return string The sanitized username, after passing through filters.
 */
function sanitize_user($username, $strict = \false)
{
}
/**
 * Sanitizes a string key.
 *
 * Keys are used as internal identifiers. Lowercase alphanumeric characters, dashes and underscores are allowed.
 *
 * @since 3.0.0
 *
 * @param string $key String key
 * @return string Sanitized key
 */
function sanitize_key($key)
{
}
/**
 * Sanitizes a title, or returns a fallback title.
 *
 * Specifically, HTML and PHP tags are stripped. Further actions can be added
 * via the plugin API. If $title is empty and $fallback_title is set, the latter
 * will be used.
 *
 * @since 1.0.0
 *
 * @param string $title          The string to be sanitized.
 * @param string $fallback_title Optional. A title to use if $title is empty.
 * @param string $context        Optional. The operation for which the string is sanitized
 * @return string The sanitized string.
 */
function sanitize_title($title, $fallback_title = '', $context = 'save')
{
}
/**
 * Sanitizes a title with the 'query' context.
 *
 * Used for querying the database for a value from URL.
 *
 * @since 3.1.0
 *
 * @param string $title The string to be sanitized.
 * @return string The sanitized string.
 */
function sanitize_title_for_query($title)
{
}
/**
 * Sanitizes a title, replacing whitespace and a few other characters with dashes.
 *
 * Limits the output to alphanumeric characters, underscore (_) and dash (-).
 * Whitespace becomes a dash.
 *
 * @since 1.2.0
 *
 * @param string $title     The title to be sanitized.
 * @param string $raw_title Optional. Not used.
 * @param string $context   Optional. The operation for which the string is sanitized.
 * @return string The sanitized title.
 */
function sanitize_title_with_dashes($title, $raw_title = '', $context = 'display')
{
}
/**
 * Ensures a string is a valid SQL 'order by' clause.
 *
 * Accepts one or more columns, with or without a sort order (ASC / DESC).
 * e.g. 'column_1', 'column_1, column_2', 'column_1 ASC, column_2 DESC' etc.
 *
 * Also accepts 'RAND()'.
 *
 * @since 2.5.1
 *
 * @param string $orderby Order by clause to be validated.
 * @return string|false Returns $orderby if valid, false otherwise.
 */
function sanitize_sql_orderby($orderby)
{
}
/**
 * Sanitizes an HTML classname to ensure it only contains valid characters.
 *
 * Strips the string down to A-Z,a-z,0-9,_,-. If this results in an empty
 * string then it will return the alternative value supplied.
 *
 * @todo Expand to support the full range of CDATA that a class attribute can contain.
 *
 * @since 2.8.0
 *
 * @param string $class    The classname to be sanitized
 * @param string $fallback Optional. The value to return if the sanitization ends up as an empty string.
 * 	Defaults to an empty string.
 * @return string The sanitized value
 */
function sanitize_html_class($class, $fallback = '')
{
}