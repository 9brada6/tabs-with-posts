<?php

/**
 * Logs the user email, IP, and registration date of a new site.
 *
 * @since MU (3.0.0)
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param int $blog_id
 * @param int $user_id
 */
function wpmu_log_new_registrations($blog_id, $user_id)
{
}
/**
 * Maintains a canonical list of terms by syncing terms created for each blog with the global terms table.
 *
 * @since 3.0.0
 *
 * @see term_id_filter
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 * @staticvar int $global_terms_recurse
 *
 * @param int    $term_id    An ID for a term on the current blog.
 * @param string $deprecated Not used.
 * @return int An ID from the global terms table mapped from $term_id.
 */
function global_terms($term_id, $deprecated = '')
{
}
/**
 * Ensure that the current site's domain is listed in the allowed redirect host list.
 *
 * @see wp_validate_redirect()
 * @since MU (3.0.0)
 *
 * @param array|string $deprecated Not used.
 * @return array The current site's domain
 */
function redirect_this_site($deprecated = '')
{
}
/**
 * Check whether an upload is too big.
 *
 * @since MU (3.0.0)
 *
 * @blessed
 *
 * @param array $upload
 * @return string|array If the upload is under the size limit, $upload is returned. Otherwise returns an error message.
 */
function upload_is_file_too_big($upload)
{
}
/**
 * Add a nonce field to the signup page.
 *
 * @since MU (3.0.0)
 */
function signup_nonce_fields()
{
}
/**
 * Process the signup nonce created in signup_nonce_fields().
 *
 * @since MU (3.0.0)
 *
 * @param array $result
 * @return array
 */
function signup_nonce_check($result)
{
}
/**
 * Correct 404 redirects when NOBLOGREDIRECT is defined.
 *
 * @since MU (3.0.0)
 */
function maybe_redirect_404()
{
}
/**
 * Add a new user to a blog by visiting /newbloguser/{key}/.
 *
 * This will only work when the user's details are saved as an option
 * keyed as 'new_user_{key}', where '{key}' is a hash generated for the user to be
 * added, as when a user is invited through the regular WP Add User interface.
 *
 * @since MU (3.0.0)
 */
function maybe_add_existing_user_to_blog()
{
}
/**
 * Add a user to a blog based on details from maybe_add_existing_user_to_blog().
 *
 * @since MU (3.0.0)
 *
 * @param array $details
 * @return true|WP_Error|void
 */
function add_existing_user_to_blog($details = \false)
{
}
/**
 * Adds a newly created user to the appropriate blog
 *
 * To add a user in general, use add_user_to_blog(). This function
 * is specifically hooked into the {@see 'wpmu_activate_user'} action.
 *
 * @since MU (3.0.0)
 * @see add_user_to_blog()
 *
 * @param int   $user_id
 * @param mixed $password Ignored.
 * @param array $meta
 */
function add_new_user_to_blog($user_id, $password, $meta)
{
}
/**
 * Correct From host on outgoing mail to match the site domain
 *
 * @since MU (3.0.0)
 *
 * @param PHPMailer $phpmailer The PHPMailer instance (passed by reference).
 */
function fix_phpmailer_messageid($phpmailer)
{
}
/**
 * Check to see whether a user is marked as a spammer, based on user login.
 *
 * @since MU (3.0.0)
 *
 * @param string|WP_User $user Optional. Defaults to current user. WP_User object,
 * 	                           or user login name as a string.
 * @return bool
 */
function is_user_spammy($user = \null)
{
}
/**
 * Update this blog's 'public' setting in the global blogs table.
 *
 * Public blogs have a setting of 1, private blogs are 0.
 *
 * @since MU (3.0.0)
 *
 * @param int $old_value
 * @param int $value     The new public value
 */
function update_blog_public($old_value, $value)
{
}
/**
 * Check whether users can self-register, based on Network settings.
 *
 * @since MU (3.0.0)
 *
 * @return bool
 */
function users_can_register_signup_filter()
{
}
/**
 * Ensure that the welcome message is not empty. Currently unused.
 *
 * @since MU (3.0.0)
 *
 * @param string $text
 * @return string
 */
function welcome_user_msg_filter($text)
{
}
/**
 * Whether to force SSL on content.
 *
 * @since 2.8.5
 *
 * @staticvar bool $forced_content
 *
 * @param bool $force
 * @return bool True if forced, false if not forced.
 */
function force_ssl_content($force = '')
{
}
/**
 * Formats a URL to use https.
 *
 * Useful as a filter.
 *
 * @since 2.8.5
 *
 * @param string $url URL
 * @return string URL with https as the scheme
 */
function filter_SSL($url)
{
}
/**
 * Schedule update of the network-wide counts for the current network.
 *
 * @since 3.1.0
 */
function wp_schedule_update_network_counts()
{
}
/**
 * Update the network-wide counts for the current network.
 *
 * @since 3.1.0
 * @since 4.8.0 The $network_id parameter has been added.
 *
 * @param int|null $network_id ID of the network. Default is the current network.
 */
function wp_update_network_counts($network_id = \null)
{
}
/**
 * Update the count of sites for the current network.
 *
 * If enabled through the {@see 'enable_live_network_counts'} filter, update the sites count
 * on a network when a site is created or its status is updated.
 *
 * @since 3.7.0
 * @since 4.8.0 The $network_id parameter has been added.
 *
 * @param int|null $network_id ID of the network. Default is the current network.
 */
function wp_maybe_update_network_site_counts($network_id = \null)
{
}
/**
 * Update the network-wide users count.
 *
 * If enabled through the {@see 'enable_live_network_counts'} filter, update the users count
 * on a network when a user is created or its status is updated.
 *
 * @since 3.7.0
 * @since 4.8.0 The $network_id parameter has been added.
 *
 * @param int|null $network_id ID of the network. Default is the current network.
 */
function wp_maybe_update_network_user_counts($network_id = \null)
{
}
/**
 * Update the network-wide site count.
 *
 * @since 3.7.0
 * @since 4.8.0 The $network_id parameter has been added.
 *
 * @param int|null $network_id ID of the network. Default is the current network.
 */
function wp_update_network_site_counts($network_id = \null)
{
}
/**
 * Update the network-wide user count.
 *
 * @since 3.7.0
 * @since 4.8.0 The $network_id parameter has been added.
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param int|null $network_id ID of the network. Default is the current network.
 */
function wp_update_network_user_counts($network_id = \null)
{
}
/**
 * Returns the space used by the current blog.
 *
 * @since 3.5.0
 *
 * @return int Used space in megabytes
 */
function get_space_used()
{
}
/**
 * Returns the upload quota for the current blog.
 *
 * @since MU (3.0.0)
 *
 * @return int Quota in megabytes
 */
function get_space_allowed()
{
}
/**
 * Determines if there is any upload space left in the current blog's quota.
 *
 * @since 3.0.0
 *
 * @return int of upload space available in bytes
 */
function get_upload_space_available()
{
}
/**
 * Determines if there is any upload space left in the current blog's quota.
 *
 * @since 3.0.0
 * @return bool True if space is available, false otherwise.
 */
function is_upload_space_available()
{
}
/**
 * Filters the maximum upload file size allowed, in bytes.
 *
 * @since 3.0.0
 *
 * @param  int $size Upload size limit in bytes.
 * @return int       Upload size limit in bytes.
 */
function upload_size_limit_filter($size)
{
}
/**
 * Whether or not we have a large network.
 *
 * The default criteria for a large network is either more than 10,000 users or more than 10,000 sites.
 * Plugins can alter this criteria using the {@see 'wp_is_large_network'} filter.
 *
 * @since 3.3.0
 * @since 4.8.0 The $network_id parameter has been added.
 *
 * @param string   $using      'sites or 'users'. Default is 'sites'.
 * @param int|null $network_id ID of the network. Default is the current network.
 * @return bool True if the network meets the criteria for large. False otherwise.
 */
function wp_is_large_network($using = 'sites', $network_id = \null)
{
}
/**
 * Retrieves a list of reserved site on a sub-directory Multisite installation.
 *
 * @since 4.4.0
 *
 * @return array $names Array of reserved subdirectory names.
 */
function get_subdirectory_reserved_names()
{
}
/**
 * Send a confirmation request email when a change of network admin email address is attempted.
 *
 * The new network admin address will not become active until confirmed.
 *
 * @since 4.9.0
 *
 * @param string $old_value The old network admin email address.
 * @param string $value     The proposed new network admin email address.
 */
function update_network_option_new_admin_email($old_value, $value)
{
}
/**
 * Send an email to the old network admin email address when the network admin email address changes.
 *
 * @since 4.9.0
 *
 * @param string $option_name The relevant database option name.
 * @param string $new_email   The new network admin email address.
 * @param string $old_email   The old network admin email address.
 * @param int    $network_id  ID of the network.
 */
function wp_network_admin_email_change_notification($option_name, $new_email, $old_email, $network_id)
{
}
/**
 * These functions are needed to load Multisite.
 *
 * @since 3.0.0
 *
 * @package WordPress
 * @subpackage Multisite
 */
/**
 * Whether a subdomain configuration is enabled.
 *
 * @since 3.0.0
 *
 * @return bool True if subdomain configuration is enabled, false otherwise.
 */
function is_subdomain_install()
{
}
/**
 * Returns array of network plugin files to be included in global scope.
 *
 * The default directory is wp-content/plugins. To change the default directory
 * manually, define `WP_PLUGIN_DIR` and `WP_PLUGIN_URL` in `wp-config.php`.
 *
 * @access private
 * @since 3.1.0
 *
 * @return array Files to include.
 */
function wp_get_active_network_plugins()
{
}
/**
 * Checks status of current blog.
 *
 * Checks if the blog is deleted, inactive, archived, or spammed.
 *
 * Dies with a default message if the blog does not pass the check.
 *
 * To change the default message when a blog does not pass the check,
 * use the wp-content/blog-deleted.php, blog-inactive.php and
 * blog-suspended.php drop-ins.
 *
 * @since 3.0.0
 *
 * @return true|string Returns true on success, or drop-in file to include.
 */
function ms_site_check()
{
}
/**
 * Retrieve the closest matching network for a domain and path.
 *
 * @since 3.9.0
 *
 * @internal In 4.4.0, converted to a wrapper for WP_Network::get_by_path()
 *
 * @param string   $domain   Domain to check.
 * @param string   $path     Path to check.
 * @param int|null $segments Path segments to use. Defaults to null, or the full path.
 * @return WP_Network|false Network object if successful. False when no network is found.
 */
function get_network_by_path($domain, $path, $segments = \null)
{
}
/**
 * Retrieves the closest matching site object by its domain and path.
 *
 * This will not necessarily return an exact match for a domain and path. Instead, it
 * breaks the domain and path into pieces that are then used to match the closest
 * possibility from a query.
 *
 * The intent of this method is to match a site object during bootstrap for a
 * requested site address
 *
 * @since 3.9.0
 * @since 4.7.0 Updated to always return a `WP_Site` object.
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param string   $domain   Domain to check.
 * @param string   $path     Path to check.
 * @param int|null $segments Path segments to use. Defaults to null, or the full path.
 * @return WP_Site|false Site object if successful. False when no site is found.
 */
function get_site_by_path($domain, $path, $segments = \null)
{
}
/**
 * Identifies the network and site of a requested domain and path and populates the
 * corresponding network and site global objects as part of the multisite bootstrap process.
 *
 * Prior to 4.6.0, this was a procedural block in `ms-settings.php`. It was wrapped into
 * a function to facilitate unit tests. It should not be used outside of core.
 *
 * Usually, it's easier to query the site first, which then declares its network.
 * In limited situations, we either can or must find the network first.
 *
 * If a network and site are found, a `true` response will be returned so that the
 * request can continue.
 *
 * If neither a network or site is found, `false` or a URL string will be returned
 * so that either an error can be shown or a redirect can occur.
 *
 * @since 4.6.0
 * @access private
 *
 * @global WP_Network $current_site The current network.
 * @global WP_Site    $current_blog The current site.
 *
 * @param string $domain    The requested domain.
 * @param string $path      The requested path.
 * @param bool   $subdomain Optional. Whether a subdomain (true) or subdirectory (false) configuration.
 *                          Default false.
 * @return bool|string True if bootstrap successfully populated `$current_blog` and `$current_site`.
 *                     False if bootstrap could not be properly completed.
 *                     Redirect URL if parts exist, but the request as a whole can not be fulfilled.
 */
function ms_load_current_site_and_network($domain, $path, $subdomain = \false)
{
}
/**
 * Displays a failure message.
 *
 * Used when a blog's tables do not exist. Checks for a missing $wpdb->site table as well.
 *
 * @access private
 * @since 3.0.0
 * @since 4.4.0 The `$domain` and `$path` parameters were added.
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param string $domain The requested domain for the error to reference.
 * @param string $path   The requested path for the error to reference.
 */
function ms_not_installed($domain, $path)
{
}
/**
 * This deprecated function formerly set the site_name property of the $current_site object.
 *
 * This function simply returns the object, as before.
 * The bootstrap takes care of setting site_name.
 *
 * @access private
 * @since 3.0.0
 * @deprecated 3.9.0 Use get_current_site() instead.
 *
 * @param object $current_site
 * @return object
 */
function get_current_site_name($current_site)
{
}
/**
 * This deprecated function managed much of the site and network loading in multisite.
 *
 * The current bootstrap code is now responsible for parsing the site and network load as
 * well as setting the global $current_site object.
 *
 * @access private
 * @since 3.0.0
 * @deprecated 3.9.0
 *
 * @global object $current_site
 *
 * @return object
 */
function wpmu_current_site()
{
}
/**
 * Retrieve an object containing information about the requested network.
 *
 * @since 3.9.0
 * @deprecated 4.7.0 Use `get_network()`
 * @see get_network()
 *
 * @internal In 4.6.0, converted to use get_network()
 *
 * @param object|int $network The network's database row or ID.
 * @return WP_Network|false Object containing network information if found, false if not.
 */
function wp_get_network($network)
{
}
/**
 * Displays a navigation menu.
 *
 * @since 3.0.0
 * @since 4.7.0 Added the `item_spacing` argument.
 *
 * @staticvar array $menu_id_slugs
 *
 * @param array $args {
 *     Optional. Array of nav menu arguments.
 *
 *     @type int|string|WP_Term $menu            Desired menu. Accepts a menu ID, slug, name, or object. Default empty.
 *     @type string             $menu_class      CSS class to use for the ul element which forms the menu. Default 'menu'.
 *     @type string             $menu_id         The ID that is applied to the ul element which forms the menu.
 *                                               Default is the menu slug, incremented.
 *     @type string             $container       Whether to wrap the ul, and what to wrap it with. Default 'div'.
 *     @type string             $container_class Class that is applied to the container. Default 'menu-{menu slug}-container'.
 *     @type string             $container_id    The ID that is applied to the container. Default empty.
 *     @type callable|bool      $fallback_cb     If the menu doesn't exists, a callback function will fire.
 *                                               Default is 'wp_page_menu'. Set to false for no fallback.
 *     @type string             $before          Text before the link markup. Default empty.
 *     @type string             $after           Text after the link markup. Default empty.
 *     @type string             $link_before     Text before the link text. Default empty.
 *     @type string             $link_after      Text after the link text. Default empty.
 *     @type bool               $echo            Whether to echo the menu or return it. Default true.
 *     @type int                $depth           How many levels of the hierarchy are to be included. 0 means all. Default 0.
 *     @type object             $walker          Instance of a custom walker class. Default empty.
 *     @type string             $theme_location  Theme location to be used. Must be registered with register_nav_menu()
 *                                               in order to be selectable by the user.
 *     @type string             $items_wrap      How the list items should be wrapped. Default is a ul with an id and class.
 *                                               Uses printf() format with numbered placeholders.
 *     @type string             $item_spacing    Whether to preserve whitespace within the menu's HTML. Accepts 'preserve' or 'discard'. Default 'preserve'.
 * }
 * @return string|false|void Menu output if $echo is false, false if there are no items or no menu was found.
 */
function wp_nav_menu($args = array())
{
}
/**
 * Add the class property classes for the current context, if applicable.
 *
 * @access private
 * @since 3.0.0
 *
 * @global WP_Query   $wp_query
 * @global WP_Rewrite $wp_rewrite
 *
 * @param array $menu_items The current menu item objects to which to add the class property information.
 */
function _wp_menu_item_classes_by_context(&$menu_items)
{
}
/**
 * Retrieve the HTML list content for nav menu items.
 *
 * @uses Walker_Nav_Menu to create HTML list content.
 * @since 3.0.0
 *
 * @param array    $items The menu items, sorted by each menu item's menu order.
 * @param int      $depth Depth of the item in reference to parents.
 * @param stdClass $r     An object containing wp_nav_menu() arguments.
 * @return string The HTML list content for the menu items.
 */
function walk_nav_menu_tree($items, $depth, $r)
{
}
/**
 * Prevents a menu item ID from being used more than once.
 *
 * @since 3.0.1
 * @access private
 *
 * @staticvar array $used_ids
 * @param string $id
 * @param object $item
 * @return string
 */
function _nav_menu_item_id_use_once($id, $item)
{
}
/**
 * Navigation Menu functions
 *
 * @package WordPress
 * @subpackage Nav_Menus
 * @since 3.0.0
 */
/**
 * Returns a navigation menu object.
 *
 * @since 3.0.0
 *
 * @param int|string|WP_Term $menu Menu ID, slug, name, or object.
 * @return WP_Term|false False if $menu param isn't supplied or term does not exist, menu object if successful.
 */
function wp_get_nav_menu_object($menu)
{
}
/**
 * Check if the given ID is a navigation menu.
 *
 * Returns true if it is; false otherwise.
 *
 * @since 3.0.0
 *
 * @param int|string|WP_Term $menu Menu ID, slug, name, or object of menu to check.
 * @return bool Whether the menu exists.
 */
function is_nav_menu($menu)
{
}
/**
 * Registers navigation menu locations for a theme.
 *
 * @since 3.0.0
 *
 * @global array $_wp_registered_nav_menus
 *
 * @param array $locations Associative array of menu location identifiers (like a slug) and descriptive text.
 */
function register_nav_menus($locations = array())
{
}
/**
 * Unregisters a navigation menu location for a theme.
 *
 * @since 3.1.0
 * @global array $_wp_registered_nav_menus
 *
 * @param string $location The menu location identifier.
 * @return bool True on success, false on failure.
 */
function unregister_nav_menu($location)
{
}
/**
 * Registers a navigation menu location for a theme.
 *
 * @since 3.0.0
 *
 * @param string $location    Menu location identifier, like a slug.
 * @param string $description Menu location descriptive text.
 */
function register_nav_menu($location, $description)
{
}
/**
 * Retrieves all registered navigation menu locations in a theme.
 *
 * @since 3.0.0
 *
 * @global array $_wp_registered_nav_menus
 *
 * @return array Registered navigation menu locations. If none are registered, an empty array.
 */
function get_registered_nav_menus()
{
}
/**
 * Retrieves all registered navigation menu locations and the menus assigned to them.
 *
 * @since 3.0.0
 *
 * @return array Registered navigation menu locations and the menus assigned them.
 *               If none are registered, an empty array.
 */
function get_nav_menu_locations()
{
}
/**
 * Determines whether a registered nav menu location has a menu assigned to it.
 *
 * @since 3.0.0
 *
 * @param string $location Menu location identifier.
 * @return bool Whether location has a menu.
 */
function has_nav_menu($location)
{
}
/**
 * Returns the name of a navigation menu.
 *
 * @since 4.9.0
 *
 * @param string $location Menu location identifier.
 * @return string Menu name.
 */
function wp_get_nav_menu_name($location)
{
}
/**
 * Determines whether the given ID is a nav menu item.
 *
 * @since 3.0.0
 *
 * @param int $menu_item_id The ID of the potential nav menu item.
 * @return bool Whether the given ID is that of a nav menu item.
 */
function is_nav_menu_item($menu_item_id = 0)
{
}
/**
 * Creates a navigation menu.
 *
 * Note that `$menu_name` is expected to be pre-slashed.
 *
 * @since 3.0.0
 *
 * @param string $menu_name Menu name.
 * @return int|WP_Error Menu ID on success, WP_Error object on failure.
 */
function wp_create_nav_menu($menu_name)
{
}
/**
 * Delete a Navigation Menu.
 *
 * @since 3.0.0
 *
 * @param int|string|WP_Term $menu Menu ID, slug, name, or object.
 * @return bool|WP_Error True on success, false or WP_Error object on failure.
 */
function wp_delete_nav_menu($menu)
{
}
/**
 * Save the properties of a menu or create a new menu with those properties.
 *
 * Note that `$menu_data` is expected to be pre-slashed.
 *
 * @since 3.0.0
 *
 * @param int   $menu_id   The ID of the menu or "0" to create a new menu.
 * @param array $menu_data The array of menu data.
 * @return int|WP_Error Menu ID on success, WP_Error object on failure.
 */
function wp_update_nav_menu_object($menu_id = 0, $menu_data = array())
{
}
/**
 * Save the properties of a menu item or create a new one.
 *
 * The menu-item-title, menu-item-description, and menu-item-attr-title are expected
 * to be pre-slashed since they are passed directly into `wp_insert_post()`.
 *
 * @since 3.0.0
 *
 * @param int   $menu_id         The ID of the menu. Required. If "0", makes the menu item a draft orphan.
 * @param int   $menu_item_db_id The ID of the menu item. If "0", creates a new menu item.
 * @param array $menu_item_data  The menu item's data.
 * @return int|WP_Error The menu item's database ID or WP_Error object on failure.
 */
function wp_update_nav_menu_item($menu_id = 0, $menu_item_db_id = 0, $menu_item_data = array())
{
}
/**
 * Returns all navigation menu objects.
 *
 * @since 3.0.0
 * @since 4.1.0 Default value of the 'orderby' argument was changed from 'none'
 *              to 'name'.
 *
 * @param array $args Optional. Array of arguments passed on to get_terms().
 *                    Default empty array.
 * @return array Menu objects.
 */
function wp_get_nav_menus($args = array())
{
}
/**
 * Return if a menu item is valid.
 *
 * @link https://core.trac.wordpress.org/ticket/13958
 *
 * @since 3.2.0
 * @access private
 *
 * @param object $item The menu item to check.
 * @return bool False if invalid, otherwise true.
 */
function _is_valid_nav_menu_item($item)
{
}
/**
 * Retrieves all menu items of a navigation menu.
 *
 * Note: Most arguments passed to the `$args` parameter – save for 'output_key' – are
 * specifically for retrieving nav_menu_item posts from get_posts() and may only
 * indirectly affect the ultimate ordering and content of the resulting nav menu
 * items that get returned from this function.
 *
 * @since 3.0.0
 *
 * @global string $_menu_item_sort_prop
 * @staticvar array $fetched
 *
 * @param int|string|WP_Term $menu Menu ID, slug, name, or object.
 * @param array              $args {
 *     Optional. Arguments to pass to get_posts().
 *
 *     @type string $order       How to order nav menu items as queried with get_posts(). Will be ignored
 *                               if 'output' is ARRAY_A. Default 'ASC'.
 *     @type string $orderby     Field to order menu items by as retrieved from get_posts(). Supply an orderby
 *                               field via 'output_key' to affect the output order of nav menu items.
 *                               Default 'menu_order'.
 *     @type string $post_type   Menu items post type. Default 'nav_menu_item'.
 *     @type string $post_status Menu items post status. Default 'publish'.
 *     @type string $output      How to order outputted menu items. Default ARRAY_A.
 *     @type string $output_key  Key to use for ordering the actual menu items that get returned. Note that
 *                               that is not a get_posts() argument and will only affect output of menu items
 *                               processed in this function. Default 'menu_order'.
 *     @type bool   $nopaging    Whether to retrieve all menu items (true) or paginate (false). Default true.
 * }
 * @return false|array $items Array of menu items, otherwise false.
 */
function wp_get_nav_menu_items($menu, $args = array())
{
}
/**
 * Decorates a menu item object with the shared navigation menu item properties.
 *
 * Properties:
 * - ID:               The term_id if the menu item represents a taxonomy term.
 * - attr_title:       The title attribute of the link element for this menu item.
 * - classes:          The array of class attribute values for the link element of this menu item.
 * - db_id:            The DB ID of this item as a nav_menu_item object, if it exists (0 if it doesn't exist).
 * - description:      The description of this menu item.
 * - menu_item_parent: The DB ID of the nav_menu_item that is this item's menu parent, if any. 0 otherwise.
 * - object:           The type of object originally represented, such as "category," "post", or "attachment."
 * - object_id:        The DB ID of the original object this menu item represents, e.g. ID for posts and term_id for categories.
 * - post_parent:      The DB ID of the original object's parent object, if any (0 otherwise).
 * - post_title:       A "no title" label if menu item represents a post that lacks a title.
 * - target:           The target attribute of the link element for this menu item.
 * - title:            The title of this menu item.
 * - type:             The family of objects originally represented, such as "post_type" or "taxonomy."
 * - type_label:       The singular label used to describe this type of menu item.
 * - url:              The URL to which this menu item points.
 * - xfn:              The XFN relationship expressed in the link of this menu item.
 * - _invalid:         Whether the menu item represents an object that no longer exists.
 *
 * @since 3.0.0
 *
 * @param object $menu_item The menu item to modify.
 * @return object $menu_item The menu item with standard menu item properties.
 */
function wp_setup_nav_menu_item($menu_item)
{
}
/**
 * Get the menu items associated with a particular object.
 *
 * @since 3.0.0
 *
 * @param int    $object_id   The ID of the original object.
 * @param string $object_type The type of object, such as "taxonomy" or "post_type."
 * @param string $taxonomy    If $object_type is "taxonomy", $taxonomy is the name of the tax that $object_id belongs to
 * @return array The array of menu item IDs; empty array if none;
 */
function wp_get_associated_nav_menu_items($object_id = 0, $object_type = 'post_type', $taxonomy = '')
{
}
/**
 * Callback for handling a menu item when its original object is deleted.
 *
 * @since 3.0.0
 * @access private
 *
 * @param int $object_id The ID of the original object being trashed.
 *
 */
function _wp_delete_post_menu_item($object_id = 0)
{
}
/**
 * Serves as a callback for handling a menu item when its original object is deleted.
 *
 * @since 3.0.0
 * @access private
 *
 * @param int    $object_id Optional. The ID of the original object being trashed. Default 0.
 * @param int    $tt_id     Term taxonomy ID. Unused.
 * @param string $taxonomy  Taxonomy slug.
 */
function _wp_delete_tax_menu_item($object_id = 0, $tt_id, $taxonomy)
{
}
/**
 * Automatically add newly published page objects to menus with that as an option.
 *
 * @since 3.0.0
 * @access private
 *
 * @param string $new_status The new status of the post object.
 * @param string $old_status The old status of the post object.
 * @param object $post       The post object being transitioned from one status to another.
 */
function _wp_auto_add_pages_to_menu($new_status, $old_status, $post)
{
}
/**
 * Delete auto-draft posts associated with the supplied changeset.
 *
 * @since 4.8.0
 * @access private
 *
 * @param int $post_id Post ID for the customize_changeset.
 */
function _wp_delete_customize_changeset_dependent_auto_drafts($post_id)
{
}
/**
 * Handle menu config after theme change.
 *
 * @access private
 * @since 4.9.0
 */
function _wp_menus_changed()
{
}
/**
 * Maps nav menu locations according to assignments in previously active theme.
 *
 * @since 4.9.0
 *
 * @param array $new_nav_menu_locations New nav menu locations assignments.
 * @param array $old_nav_menu_locations Old nav menu locations assignments.
 * @return array Nav menus mapped to new nav menu locations.
 */
function wp_map_nav_menu_locations($new_nav_menu_locations, $old_nav_menu_locations)
{
}
/**
 * Option API
 *
 * @package WordPress
 * @subpackage Option
 */
/**
 * Retrieves an option value based on an option name.
 *
 * If the option does not exist or does not have a value, then the return value
 * will be false. This is useful to check whether you need to install an option
 * and is commonly used during installation of plugin options and to test
 * whether upgrading is required.
 *
 * If the option was serialized then it will be unserialized when it is returned.
 *
 * Any scalar values will be returned as strings. You may coerce the return type of
 * a given option by registering an {@see 'option_$option'} filter callback.
 *
 * @since 1.5.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param string $option  Name of option to retrieve. Expected to not be SQL-escaped.
 * @param mixed  $default Optional. Default value to return if the option does not exist.
 * @return mixed Value set for the option.
 */
function get_option($option, $default = \false)
{
}
/**
 * Protect WordPress special option from being modified.
 *
 * Will die if $option is in protected list. Protected options are 'alloptions'
 * and 'notoptions' options.
 *
 * @since 2.2.0
 *
 * @param string $option Option name.
 */
function wp_protect_special_option($option)
{
}
/**
 * Print option value after sanitizing for forms.
 *
 * @since 1.5.0
 *
 * @param string $option Option name.
 */
function form_option($option)
{
}
/**
 * Loads and caches all autoloaded options, if available or all options.
 *
 * @since 2.2.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @return array List of all options.
 */
function wp_load_alloptions()
{
}
/**
 * Loads and caches certain often requested site options if is_multisite() and a persistent cache is not being used.
 *
 * @since 3.0.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param int $network_id Optional site ID for which to query the options. Defaults to the current site.
 */
function wp_load_core_site_options($network_id = \null)
{
}
/**
 * Update the value of an option that was already added.
 *
 * You do not need to serialize values. If the value needs to be serialized, then
 * it will be serialized before it is inserted into the database. Remember,
 * resources can not be serialized or added as an option.
 *
 * If the option does not exist, then the option will be added with the option value,
 * with an `$autoload` value of 'yes'.
 *
 * @since 1.0.0
 * @since 4.2.0 The `$autoload` parameter was added.
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param string      $option   Option name. Expected to not be SQL-escaped.
 * @param mixed       $value    Option value. Must be serializable if non-scalar. Expected to not be SQL-escaped.
 * @param string|bool $autoload Optional. Whether to load the option when WordPress starts up. For existing options,
 *                              `$autoload` can only be updated using `update_option()` if `$value` is also changed.
 *                              Accepts 'yes'|true to enable or 'no'|false to disable. For non-existent options,
 *                              the default value is 'yes'. Default null.
 * @return bool False if value was not updated and true if value was updated.
 */
function update_option($option, $value, $autoload = \null)
{
}
/**
 * Add a new option.
 *
 * You do not need to serialize values. If the value needs to be serialized, then
 * it will be serialized before it is inserted into the database. Remember,
 * resources can not be serialized or added as an option.
 *
 * You can create options without values and then update the values later.
 * Existing options will not be updated and checks are performed to ensure that you
 * aren't adding a protected WordPress option. Care should be taken to not name
 * options the same as the ones which are protected.
 *
 * @since 1.0.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param string         $option      Name of option to add. Expected to not be SQL-escaped.
 * @param mixed          $value       Optional. Option value. Must be serializable if non-scalar. Expected to not be SQL-escaped.
 * @param string         $deprecated  Optional. Description. Not used anymore.
 * @param string|bool    $autoload    Optional. Whether to load the option when WordPress starts up.
 *                                    Default is enabled. Accepts 'no' to disable for legacy reasons.
 * @return bool False if option was not added and true if option was added.
 */
function add_option($option, $value = '', $deprecated = '', $autoload = 'yes')
{
}
/**
 * Removes option by name. Prevents removal of protected WordPress options.
 *
 * @since 1.2.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param string $option Name of option to remove. Expected to not be SQL-escaped.
 * @return bool True, if option is successfully deleted. False on failure.
 */
function delete_option($option)
{
}
/**
 * Delete a transient.
 *
 * @since 2.8.0
 *
 * @param string $transient Transient name. Expected to not be SQL-escaped.
 * @return bool true if successful, false otherwise
 */
function delete_transient($transient)
{
}
/**
 * Get the value of a transient.
 *
 * If the transient does not exist, does not have a value, or has expired,
 * then the return value will be false.
 *
 * @since 2.8.0
 *
 * @param string $transient Transient name. Expected to not be SQL-escaped.
 * @return mixed Value of transient.
 */
function get_transient($transient)
{
}
/**
 * Set/update the value of a transient.
 *
 * You do not need to serialize values. If the value needs to be serialized, then
 * it will be serialized before it is set.
 *
 * @since 2.8.0
 *
 * @param string $transient  Transient name. Expected to not be SQL-escaped. Must be
 *                           172 characters or fewer in length.
 * @param mixed  $value      Transient value. Must be serializable if non-scalar.
 *                           Expected to not be SQL-escaped.
 * @param int    $expiration Optional. Time until expiration in seconds. Default 0 (no expiration).
 * @return bool False if value was not set and true if value was set.
 */
function set_transient($transient, $value, $expiration = 0)
{
}
/**
 * Deletes all expired transients.
 *
 * The multi-table delete syntax is used to delete the transient record
 * from table a, and the corresponding transient_timeout record from table b.
 *
 * @since 4.9.0
 *
 * @param bool $force_db Optional. Force cleanup to run against the database even when an external object cache is used.
 */
function delete_expired_transients($force_db = \false)
{
}
/**
 * Saves and restores user interface settings stored in a cookie.
 *
 * Checks if the current user-settings cookie is updated and stores it. When no
 * cookie exists (different browser used), adds the last saved cookie restoring
 * the settings.
 *
 * @since 2.7.0
 */
function wp_user_settings()
{
}
/**
 * Retrieve user interface setting value based on setting name.
 *
 * @since 2.7.0
 *
 * @param string $name    The name of the setting.
 * @param string $default Optional default value to return when $name is not set.
 * @return mixed the last saved user setting or the default value/false if it doesn't exist.
 */
function get_user_setting($name, $default = \false)
{
}
/**
 * Add or update user interface setting.
 *
 * Both $name and $value can contain only ASCII letters, numbers and underscores.
 *
 * This function has to be used before any output has started as it calls setcookie().
 *
 * @since 2.8.0
 *
 * @param string $name  The name of the setting.
 * @param string $value The value for the setting.
 * @return bool|null True if set successfully, false if not. Null if the current user can't be established.
 */
function set_user_setting($name, $value)
{
}
/**
 * Delete user interface settings.
 *
 * Deleting settings would reset them to the defaults.
 *
 * This function has to be used before any output has started as it calls setcookie().
 *
 * @since 2.7.0
 *
 * @param string $names The name or array of names of the setting to be deleted.
 * @return bool|null True if deleted successfully, false if not. Null if the current user can't be established.
 */
function delete_user_setting($names)
{
}
/**
 * Retrieve all user interface settings.
 *
 * @since 2.7.0
 *
 * @global array $_updated_user_settings
 *
 * @return array the last saved user settings or empty array.
 */
function get_all_user_settings()
{
}
/**
 * Private. Set all user interface settings.
 *
 * @since 2.8.0
 * @access private
 *
 * @global array $_updated_user_settings
 *
 * @param array $user_settings User settings.
 * @return bool|null False if the current user can't be found, null if the current
 *                   user is not a super admin or a member of the site, otherwise true.
 */
function wp_set_all_user_settings($user_settings)
{
}
/**
 * Delete the user settings of the current user.
 *
 * @since 2.7.0
 */
function delete_all_user_settings()
{
}
/**
 * Retrieve an option value for the current network based on name of option.
 *
 * @since 2.8.0
 * @since 4.4.0 The `$use_cache` parameter was deprecated.
 * @since 4.4.0 Modified into wrapper for get_network_option()
 *
 * @see get_network_option()
 *
 * @param string $option     Name of option to retrieve. Expected to not be SQL-escaped.
 * @param mixed  $default    Optional value to return if option doesn't exist. Default false.
 * @param bool   $deprecated Whether to use cache. Multisite only. Always set to true.
 * @return mixed Value set for the option.
 */
function get_site_option($option, $default = \false, $deprecated = \true)
{
}
/**
 * Add a new option for the current network.
 *
 * Existing options will not be updated. Note that prior to 3.3 this wasn't the case.
 *
 * @since 2.8.0
 * @since 4.4.0 Modified into wrapper for add_network_option()
 *
 * @see add_network_option()
 *
 * @param string $option Name of option to add. Expected to not be SQL-escaped.
 * @param mixed  $value  Option value, can be anything. Expected to not be SQL-escaped.
 * @return bool False if the option was not added. True if the option was added.
 */
function add_site_option($option, $value)
{
}
/**
 * Removes a option by name for the current network.
 *
 * @since 2.8.0
 * @since 4.4.0 Modified into wrapper for delete_network_option()
 *
 * @see delete_network_option()
 *
 * @param string $option Name of option to remove. Expected to not be SQL-escaped.
 * @return bool True, if succeed. False, if failure.
 */
function delete_site_option($option)
{
}
/**
 * Update the value of an option that was already added for the current network.
 *
 * @since 2.8.0
 * @since 4.4.0 Modified into wrapper for update_network_option()
 *
 * @see update_network_option()
 *
 * @param string $option Name of option. Expected to not be SQL-escaped.
 * @param mixed  $value  Option value. Expected to not be SQL-escaped.
 * @return bool False if value was not updated. True if value was updated.
 */
function update_site_option($option, $value)
{
}
/**
 * Retrieve a network's option value based on the option name.
 *
 * @since 4.4.0
 *
 * @see get_option()
 *
 * @global wpdb $wpdb
 *
 * @param int      $network_id ID of the network. Can be null to default to the current network ID.
 * @param string   $option     Name of option to retrieve. Expected to not be SQL-escaped.
 * @param mixed    $default    Optional. Value to return if the option doesn't exist. Default false.
 * @return mixed Value set for the option.
 */
function get_network_option($network_id, $option, $default = \false)
{
}
/**
 * Add a new network option.
 *
 * Existing options will not be updated.
 *
 * @since 4.4.0
 *
 * @see add_option()
 *
 * @global wpdb $wpdb
 *
 * @param int    $network_id ID of the network. Can be null to default to the current network ID.
 * @param string $option     Name of option to add. Expected to not be SQL-escaped.
 * @param mixed  $value      Option value, can be anything. Expected to not be SQL-escaped.
 * @return bool False if option was not added and true if option was added.
 */
function add_network_option($network_id, $option, $value)
{
}
/**
 * Removes a network option by name.
 *
 * @since 4.4.0
 *
 * @see delete_option()
 *
 * @global wpdb $wpdb
 *
 * @param int    $network_id ID of the network. Can be null to default to the current network ID.
 * @param string $option     Name of option to remove. Expected to not be SQL-escaped.
 * @return bool True, if succeed. False, if failure.
 */
function delete_network_option($network_id, $option)
{
}
/**
 * Update the value of a network option that was already added.
 *
 * @since 4.4.0
 *
 * @see update_option()
 *
 * @global wpdb $wpdb
 *
 * @param int      $network_id ID of the network. Can be null to default to the current network ID.
 * @param string   $option     Name of option. Expected to not be SQL-escaped.
 * @param mixed    $value      Option value. Expected to not be SQL-escaped.
 * @return bool False if value was not updated and true if value was updated.
 */
function update_network_option($network_id, $option, $value)
{
}
/**
 * Delete a site transient.
 *
 * @since 2.9.0
 *
 * @param string $transient Transient name. Expected to not be SQL-escaped.
 * @return bool True if successful, false otherwise
 */
function delete_site_transient($transient)
{
}
/**
 * Get the value of a site transient.
 *
 * If the transient does not exist, does not have a value, or has expired,
 * then the return value will be false.
 *
 * @since 2.9.0
 *
 * @see get_transient()
 *
 * @param string $transient Transient name. Expected to not be SQL-escaped.
 * @return mixed Value of transient.
 */
function get_site_transient($transient)
{
}
/**
 * Set/update the value of a site transient.
 *
 * You do not need to serialize values, if the value needs to be serialize, then
 * it will be serialized before it is set.
 *
 * @since 2.9.0
 *
 * @see set_transient()
 *
 * @param string $transient  Transient name. Expected to not be SQL-escaped. Must be
 *                           167 characters or fewer in length.
 * @param mixed  $value      Transient value. Expected to not be SQL-escaped.
 * @param int    $expiration Optional. Time until expiration in seconds. Default 0 (no expiration).
 * @return bool False if value was not set and true if value was set.
 */
function set_site_transient($transient, $value, $expiration = 0)
{
}
/**
 * Register default settings available in WordPress.
 *
 * The settings registered here are primarily useful for the REST API, so this
 * does not encompass all settings available in WordPress.
 *
 * @since 4.7.0
 */
function register_initial_settings()
{
}
/**
 * Register a setting and its data.
 *
 * @since 2.7.0
 * @since 4.7.0 `$args` can be passed to set flags on the setting, similar to `register_meta()`.
 *
 * @global array $new_whitelist_options
 * @global array $wp_registered_settings
 *
 * @param string $option_group A settings group name. Should correspond to a whitelisted option key name.
 * 	Default whitelisted option key names include "general," "discussion," and "reading," among others.
 * @param string $option_name The name of an option to sanitize and save.
 * @param array  $args {
 *     Data used to describe the setting when registered.
 *
 *     @type string   $type              The type of data associated with this setting.
 *                                       Valid values are 'string', 'boolean', 'integer', and 'number'.
 *     @type string   $description       A description of the data attached to this setting.
 *     @type callable $sanitize_callback A callback function that sanitizes the option's value.
 *     @type bool     $show_in_rest      Whether data associated with this setting should be included in the REST API.
 *     @type mixed    $default           Default value when calling `get_option()`.
 * }
 */
function register_setting($option_group, $option_name, $args = array())
{
}
/**
 * Unregister a setting.
 *
 * @since 2.7.0
 * @since 4.7.0 `$sanitize_callback` was deprecated. The callback from `register_setting()` is now used instead.
 *
 * @global array $new_whitelist_options
 *
 * @param string   $option_group      The settings group name used during registration.
 * @param string   $option_name       The name of the option to unregister.
 * @param callable $deprecated        Deprecated.
 */
function unregister_setting($option_group, $option_name, $deprecated = '')
{
}
/**
 * Retrieves an array of registered settings.
 *
 * @since 4.7.0
 *
 * @return array List of registered settings, keyed by option name.
 */
function get_registered_settings()
{
}
/**
 * Filter the default value for the option.
 *
 * For settings which register a default setting in `register_setting()`, this
 * function is added as a filter to `default_option_{$option}`.
 *
 * @since 4.7.0
 *
 * @param mixed $default Existing default value to return.
 * @param string $option Option name.
 * @param bool $passed_default Was `get_option()` passed a default value?
 * @return mixed Filtered default value.
 */
function filter_default_option($default, $option, $passed_default)
{
}
/**
 * Changes the current user by ID or name.
 *
 * Set $id to null and specify a name if you do not know a user's ID.
 *
 * @since 2.0.1
 * @deprecated 3.0.0 Use wp_set_current_user()
 * @see wp_set_current_user()
 *
 * @param int|null $id User ID.
 * @param string $name Optional. The user's username
 * @return WP_User returns wp_set_current_user()
 */
function set_current_user($id, $name = '')
{
}
/**
 * Populate global variables with information about the currently logged in user.
 *
 * @since 0.71
 * @deprecated 4.5.0 Use wp_get_current_user()
 * @see wp_get_current_user()
 *
 * @return bool|WP_User False on XMLRPC Request and invalid auth cookie, WP_User instance otherwise.
 */
function get_currentuserinfo()
{
}
/**
 * Retrieve user info by login name.
 *
 * @since 0.71
 * @deprecated 3.3.0 Use get_user_by()
 * @see get_user_by()
 *
 * @param string $user_login User's username
 * @return bool|object False on failure, User DB row object
 */
function get_userdatabylogin($user_login)
{
}
/**
 * Retrieve user info by email.
 *
 * @since 2.5.0
 * @deprecated 3.3.0 Use get_user_by()
 * @see get_user_by()
 *
 * @param string $email User's email address
 * @return bool|object False on failure, User DB row object
 */
function get_user_by_email($email)
{
}
/**
 * Sets a cookie for a user who just logged in. This function is deprecated.
 *
 * @since 1.5.0
 * @deprecated 2.5.0 Use wp_set_auth_cookie()
 * @see wp_set_auth_cookie()
 *
 * @param string $username The user's username
 * @param string $password Optional. The user's password
 * @param bool $already_md5 Optional. Whether the password has already been through MD5
 * @param string $home Optional. Will be used instead of COOKIEPATH if set
 * @param string $siteurl Optional. Will be used instead of SITECOOKIEPATH if set
 * @param bool $remember Optional. Remember that the user is logged in
 */
function wp_setcookie($username, $password = '', $already_md5 = \false, $home = '', $siteurl = '', $remember = \false)
{
}
/**
 * Clears the authentication cookie, logging the user out. This function is deprecated.
 *
 * @since 1.5.0
 * @deprecated 2.5.0 Use wp_clear_auth_cookie()
 * @see wp_clear_auth_cookie()
 */
function wp_clearcookie()
{
}
/**
 * Gets the user cookie login. This function is deprecated.
 *
 * This function is deprecated and should no longer be extended as it won't be
 * used anywhere in WordPress. Also, plugins shouldn't use it either.
 *
 * @since 2.0.3
 * @deprecated 2.5.0
 *
 * @return bool Always returns false
 */
function wp_get_cookie_login()
{
}
/**
 * Checks a users login information and logs them in if it checks out. This function is deprecated.
 *
 * Use the global $error to get the reason why the login failed. If the username
 * is blank, no error will be set, so assume blank username on that case.
 *
 * Plugins extending this function should also provide the global $error and set
 * what the error is, so that those checking the global for why there was a
 * failure can utilize it later.
 *
 * @since 1.2.2
 * @deprecated 2.5.0 Use wp_signon()
 * @see wp_signon()
 *
 * @global string $error Error when false is returned
 *
 * @param string $username   User's username
 * @param string $password   User's password
 * @param string $deprecated Not used
 * @return bool False on login failure, true on successful check
 */
function wp_login($username, $password, $deprecated = '')
{
}
/**
 * Changes the current user by ID or name.
 *
 * Set $id to null and specify a name if you do not know a user's ID.
 *
 * Some WordPress functionality is based on the current user and not based on
 * the signed in user. Therefore, it opens the ability to edit and perform
 * actions on users who aren't signed in.
 *
 * @since 2.0.3
 * @global WP_User $current_user The current user object which holds the user data.
 *
 * @param int    $id   User ID
 * @param string $name User's username
 * @return WP_User Current user User object
 */
function wp_set_current_user($id, $name = '')
{
}
/**
 * Retrieve the current user object.
 *
 * Will set the current user, if the current user is not set. The current user
 * will be set to the logged-in person. If no user is logged-in, then it will
 * set the current user to 0, which is invalid and won't have any permissions.
 *
 * @since 2.0.3
 *
 * @see _wp_get_current_user()
 * @global WP_User $current_user Checks if the current user is set.
 *
 * @return WP_User Current WP_User instance.
 */
function wp_get_current_user()
{
}
/**
 * Retrieve user info by user ID.
 *
 * @since 0.71
 *
 * @param int $user_id User ID
 * @return WP_User|false WP_User object on success, false on failure.
 */
function get_userdata($user_id)
{
}
/**
 * Retrieve user info by a given field
 *
 * @since 2.8.0
 * @since 4.4.0 Added 'ID' as an alias of 'id' for the `$field` parameter.
 *
 * @param string     $field The field to retrieve the user with. id | ID | slug | email | login.
 * @param int|string $value A value for $field. A user ID, slug, email address, or login name.
 * @return WP_User|false WP_User object on success, false on failure.
 */
function get_user_by($field, $value)
{
}
/**
 * Retrieve info for user lists to prevent multiple queries by get_userdata()
 *
 * @since 3.0.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param array $user_ids User ID numbers list
 */
function cache_users($user_ids)
{
}
/**
 * Send mail, similar to PHP's mail
 *
 * A true return value does not automatically mean that the user received the
 * email successfully. It just only means that the method used was able to
 * process the request without any errors.
 *
 * Using the two 'wp_mail_from' and 'wp_mail_from_name' hooks allow from
 * creating a from address like 'Name <email@address.com>' when both are set. If
 * just 'wp_mail_from' is set, then just the email address will be used with no
 * name.
 *
 * The default content type is 'text/plain' which does not allow using HTML.
 * However, you can set the content type of the email by using the
 * {@see 'wp_mail_content_type'} filter.
 *
 * The default charset is based on the charset used on the blog. The charset can
 * be set using the {@see 'wp_mail_charset'} filter.
 *
 * @since 1.2.1
 *
 * @global PHPMailer $phpmailer
 *
 * @param string|array $to          Array or comma-separated list of email addresses to send message.
 * @param string       $subject     Email subject
 * @param string       $message     Message contents
 * @param string|array $headers     Optional. Additional headers.
 * @param string|array $attachments Optional. Files to attach.
 * @return bool Whether the email contents were sent successfully.
 */
function wp_mail($to, $subject, $message, $headers = '', $attachments = array())
{
}
/**
 * Authenticate a user, confirming the login credentials are valid.
 *
 * @since 2.5.0
 * @since 4.5.0 `$username` now accepts an email address.
 *
 * @param string $username User's username or email address.
 * @param string $password User's password.
 * @return WP_User|WP_Error WP_User object if the credentials are valid,
 *                          otherwise WP_Error.
 */
function wp_authenticate($username, $password)
{
}
/**
 * Log the current user out.
 *
 * @since 2.5.0
 */
function wp_logout()
{
}
/**
 * Validates authentication cookie.
 *
 * The checks include making sure that the authentication cookie is set and
 * pulling in the contents (if $cookie is not used).
 *
 * Makes sure the cookie is not expired. Verifies the hash in cookie is what is
 * should be and compares the two.
 *
 * @since 2.5.0
 *
 * @global int $login_grace_period
 *
 * @param string $cookie Optional. If used, will validate contents instead of cookie's
 * @param string $scheme Optional. The cookie scheme to use: auth, secure_auth, or logged_in
 * @return false|int False if invalid cookie, User ID if valid.
 */
function wp_validate_auth_cookie($cookie = '', $scheme = '')
{
}
/**
 * Generate authentication cookie contents.
 *
 * @since 2.5.0
 * @since 4.0.0 The `$token` parameter was added.
 *
 * @param int    $user_id    User ID
 * @param int    $expiration The time the cookie expires as a UNIX timestamp.
 * @param string $scheme     Optional. The cookie scheme to use: auth, secure_auth, or logged_in
 * @param string $token      User's session token to use for this cookie
 * @return string Authentication cookie contents. Empty string if user does not exist.
 */
function wp_generate_auth_cookie($user_id, $expiration, $scheme = 'auth', $token = '')
{
}
/**
 * Parse a cookie into its components
 *
 * @since 2.7.0
 *
 * @param string $cookie
 * @param string $scheme Optional. The cookie scheme to use: auth, secure_auth, or logged_in
 * @return array|false Authentication cookie components
 */
function wp_parse_auth_cookie($cookie = '', $scheme = '')
{
}
/**
 * Log in a user by setting authentication cookies.
 *
 * The $remember parameter increases the time that the cookie will be kept. The
 * default the cookie is kept without remembering is two days. When $remember is
 * set, the cookies will be kept for 14 days or two weeks.
 *
 * @since 2.5.0
 * @since 4.3.0 Added the `$token` parameter.
 *
 * @param int    $user_id  User ID
 * @param bool   $remember Whether to remember the user
 * @param mixed  $secure   Whether the admin cookies should only be sent over HTTPS.
 *                         Default is_ssl().
 * @param string $token    Optional. User's session token to use for this cookie.
 */
function wp_set_auth_cookie($user_id, $remember = \false, $secure = '', $token = '')
{
}
/**
 * Removes all of the cookies associated with authentication.
 *
 * @since 2.5.0
 */
function wp_clear_auth_cookie()
{
}
/**
 * Checks if the current visitor is a logged in user.
 *
 * @since 2.0.0
 *
 * @return bool True if user is logged in, false if not logged in.
 */
function is_user_logged_in()
{
}
/**
 * Checks if a user is logged in, if not it redirects them to the login page.
 *
 * @since 1.5.0
 */
function auth_redirect()
{
}
/**
 * Makes sure that a user was referred from another admin page.
 *
 * To avoid security exploits.
 *
 * @since 1.2.0
 *
 * @param int|string $action    Action nonce.
 * @param string     $query_arg Optional. Key to check for nonce in `$_REQUEST` (since 2.5).
 *                              Default '_wpnonce'.
 * @return false|int False if the nonce is invalid, 1 if the nonce is valid and generated between
 *                   0-12 hours ago, 2 if the nonce is valid and generated between 12-24 hours ago.
 */
function check_admin_referer($action = -1, $query_arg = '_wpnonce')
{
}
/**
 * Verifies the Ajax request to prevent processing requests external of the blog.
 *
 * @since 2.0.3
 *
 * @param int|string   $action    Action nonce.
 * @param false|string $query_arg Optional. Key to check for the nonce in `$_REQUEST` (since 2.5). If false,
 *                                `$_REQUEST` values will be evaluated for '_ajax_nonce', and '_wpnonce'
 *                                (in that order). Default false.
 * @param bool         $die       Optional. Whether to die early when the nonce cannot be verified.
 *                                Default true.
 * @return false|int False if the nonce is invalid, 1 if the nonce is valid and generated between
 *                   0-12 hours ago, 2 if the nonce is valid and generated between 12-24 hours ago.
 */
function check_ajax_referer($action = -1, $query_arg = \false, $die = \true)
{
}
/**
 * Redirects to another page.
 *
 * Note: wp_redirect() does not exit automatically, and should almost always be
 * followed by a call to `exit;`:
 *
 *     wp_redirect( $url );
 *     exit;
 *
 * Exiting can also be selectively manipulated by using wp_redirect() as a conditional
 * in conjunction with the {@see 'wp_redirect'} and {@see 'wp_redirect_location'} hooks:
 *
 *     if ( wp_redirect( $url ) ) {
 *         exit;
 *     }
 *
 * @since 1.5.1
 *
 * @global bool $is_IIS
 *
 * @param string $location The path to redirect to.
 * @param int    $status   Status code to use.
 * @return bool False if $location is not provided, true otherwise.
 */
function wp_redirect($location, $status = 302)
{
}
/**
 * Sanitizes a URL for use in a redirect.
 *
 * @since 2.3.0
 *
 * @param string $location The path to redirect to.
 * @return string Redirect-sanitized URL.
 **/
function wp_sanitize_redirect($location)
{
}
/**
 * URL encode UTF-8 characters in a URL.
 *
 * @ignore
 * @since 4.2.0
 * @access private
 *
 * @see wp_sanitize_redirect()
 *
 * @param array $matches RegEx matches against the redirect location.
 * @return string URL-encoded version of the first RegEx match.
 */
function _wp_sanitize_utf8_in_redirect($matches)
{
}
/**
 * Performs a safe (local) redirect, using wp_redirect().
 *
 * Checks whether the $location is using an allowed host, if it has an absolute
 * path. A plugin can therefore set or remove allowed host(s) to or from the
 * list.
 *
 * If the host is not allowed, then the redirect defaults to wp-admin on the siteurl
 * instead. This prevents malicious redirects which redirect to another host,
 * but only used in a few places.
 *
 * @since 2.3.0
 *
 * @param string $location The path to redirect to.
 * @param int    $status   Status code to use.
 */
function wp_safe_redirect($location, $status = 302)
{
}
/**
 * Validates a URL for use in a redirect.
 *
 * Checks whether the $location is using an allowed host, if it has an absolute
 * path. A plugin can therefore set or remove allowed host(s) to or from the
 * list.
 *
 * If the host is not allowed, then the redirect is to $default supplied
 *
 * @since 2.8.1
 *
 * @param string $location The redirect to validate
 * @param string $default  The value to return if $location is not allowed
 * @return string redirect-sanitized URL
 **/
function wp_validate_redirect($location, $default = '')
{
}
/**
 * Notify an author (and/or others) of a comment/trackback/pingback on a post.
 *
 * @since 1.0.0
 *
 * @param int|WP_Comment  $comment_id Comment ID or WP_Comment object.
 * @param string          $deprecated Not used
 * @return bool True on completion. False if no email addresses were specified.
 */
function wp_notify_postauthor($comment_id, $deprecated = \null)
{
}
/**
 * Notifies the moderator of the site about a new comment that is awaiting approval.
 *
 * @since 1.0.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * Uses the {@see 'notify_moderator'} filter to determine whether the site moderator
 * should be notified, overriding the site setting.
 *
 * @param int $comment_id Comment ID.
 * @return true Always returns true.
 */
function wp_notify_moderator($comment_id)
{
}
/**
 * Notify the blog admin of a user changing password, normally via email.
 *
 * @since 2.7.0
 *
 * @param WP_User $user User object.
 */
function wp_password_change_notification($user)
{
}
/**
 * Email login credentials to a newly-registered user.
 *
 * A new user registration notification is also sent to admin email.
 *
 * @since 2.0.0
 * @since 4.3.0 The `$plaintext_pass` parameter was changed to `$notify`.
 * @since 4.3.1 The `$plaintext_pass` parameter was deprecated. `$notify` added as a third parameter.
 * @since 4.6.0 The `$notify` parameter accepts 'user' for sending notification only to the user created.
 *
 * @global wpdb         $wpdb      WordPress database object for queries.
 * @global PasswordHash $wp_hasher Portable PHP password hashing framework instance.
 *
 * @param int    $user_id    User ID.
 * @param null   $deprecated Not used (argument deprecated).
 * @param string $notify     Optional. Type of notification that should happen. Accepts 'admin' or an empty
 *                           string (admin only), 'user', or 'both' (admin and user). Default empty.
 */
function wp_new_user_notification($user_id, $deprecated = \null, $notify = '')
{
}
/**
 * Get the time-dependent variable for nonce creation.
 *
 * A nonce has a lifespan of two ticks. Nonces in their second tick may be
 * updated, e.g. by autosave.
 *
 * @since 2.5.0
 *
 * @return float Float value rounded up to the next highest integer.
 */
function wp_nonce_tick()
{
}
/**
 * Verify that correct nonce was used with time limit.
 *
 * The user is given an amount of time to use the token, so therefore, since the
 * UID and $action remain the same, the independent variable is the time.
 *
 * @since 2.0.3
 *
 * @param string     $nonce  Nonce that was used in the form to verify
 * @param string|int $action Should give context to what is taking place and be the same when nonce was created.
 * @return false|int False if the nonce is invalid, 1 if the nonce is valid and generated between
 *                   0-12 hours ago, 2 if the nonce is valid and generated between 12-24 hours ago.
 */
function wp_verify_nonce($nonce, $action = -1)
{
}
/**
 * Creates a cryptographic token tied to a specific action, user, user session,
 * and window of time.
 *
 * @since 2.0.3
 * @since 4.0.0 Session tokens were integrated with nonce creation
 *
 * @param string|int $action Scalar value to add context to the nonce.
 * @return string The token.
 */
function wp_create_nonce($action = -1)
{
}
/**
 * Get salt to add to hashes.
 *
 * Salts are created using secret keys. Secret keys are located in two places:
 * in the database and in the wp-config.php file. The secret key in the database
 * is randomly generated and will be appended to the secret keys in wp-config.php.
 *
 * The secret keys in wp-config.php should be updated to strong, random keys to maximize
 * security. Below is an example of how the secret key constants are defined.
 * Do not paste this example directly into wp-config.php. Instead, have a
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ secret key created} just
 * for you.
 *
 *     define('AUTH_KEY',         ' Xakm<o xQy rw4EMsLKM-?!T+,PFF})H4lzcW57AF0U@N@< >M%G4Yt>f`z]MON');
 *     define('SECURE_AUTH_KEY',  'LzJ}op]mr|6+![P}Ak:uNdJCJZd>(Hx.-Mh#Tz)pCIU#uGEnfFz|f ;;eU%/U^O~');
 *     define('LOGGED_IN_KEY',    '|i|Ux`9<p-h$aFf(qnT:sDO:D1P^wZ$$/Ra@miTJi9G;ddp_<q}6H1)o|a +&JCM');
 *     define('NONCE_KEY',        '%:R{[P|,s.KuMltH5}cI;/k<Gx~j!f0I)m_sIyu+&NJZ)-iO>z7X>QYR0Z_XnZ@|');
 *     define('AUTH_SALT',        'eZyT)-Naw]F8CwA*VaW#q*|.)g@o}||wf~@C-YSt}(dh_r6EbI#A,y|nU2{B#JBW');
 *     define('SECURE_AUTH_SALT', '!=oLUTXh,QW=H `}`L|9/^4-3 STz},T(w}W<I`.JjPi)<Bmf1v,HpGe}T1:Xt7n');
 *     define('LOGGED_IN_SALT',   '+XSqHc;@Q*K_b|Z?NC[3H!!EONbh.n<+=uKR:>*c(u`g~EJBf#8u#R{mUEZrozmm');
 *     define('NONCE_SALT',       'h`GXHhD>SLWVfg1(1(N{;.V!MoE(SfbA_ksP@&`+AycHcAV$+?@3q+rxV{%^VyKT');
 *
 * Salting passwords helps against tools which has stored hashed values of
 * common dictionary strings. The added values makes it harder to crack.
 *
 * @since 2.5.0
 *
 * @link https://api.wordpress.org/secret-key/1.1/salt/ Create secrets for wp-config.php
 *
 * @staticvar array $cached_salts
 * @staticvar array $duplicated_keys
 *
 * @param string $scheme Authentication scheme (auth, secure_auth, logged_in, nonce)
 * @return string Salt value
 */
function wp_salt($scheme = 'auth')
{
}
/**
 * Get hash of given string.
 *
 * @since 2.0.3
 *
 * @param string $data   Plain text to hash
 * @param string $scheme Authentication scheme (auth, secure_auth, logged_in, nonce)
 * @return string Hash of $data
 */
function wp_hash($data, $scheme = 'auth')
{
}
/**
 * Create a hash (encrypt) of a plain text password.
 *
 * For integration with other applications, this function can be overwritten to
 * instead use the other package password checking algorithm.
 *
 * @since 2.5.0
 *
 * @global PasswordHash $wp_hasher PHPass object
 *
 * @param string $password Plain text user password to hash
 * @return string The hash string of the password
 */
function wp_hash_password($password)
{
}
/**
 * Checks the plaintext password against the encrypted Password.
 *
 * Maintains compatibility between old version and the new cookie authentication
 * protocol using PHPass library. The $hash parameter is the encrypted password
 * and the function compares the plain text password when encrypted similarly
 * against the already encrypted password to see if they match.
 *
 * For integration with other applications, this function can be overwritten to
 * instead use the other package password checking algorithm.
 *
 * @since 2.5.0
 *
 * @global PasswordHash $wp_hasher PHPass object used for checking the password
 *	against the $hash + $password
 * @uses PasswordHash::CheckPassword
 *
 * @param string     $password Plaintext user's password
 * @param string     $hash     Hash of the user's password to check against.
 * @param string|int $user_id  Optional. User ID.
 * @return bool False, if the $password does not match the hashed password
 */
function wp_check_password($password, $hash, $user_id = '')
{
}
/**
 * Generates a random password drawn from the defined set of characters.
 *
 * @since 2.5.0
 *
 * @param int  $length              Optional. The length of password to generate. Default 12.
 * @param bool $special_chars       Optional. Whether to include standard special characters.
 *                                  Default true.
 * @param bool $extra_special_chars Optional. Whether to include other special characters.
 *                                  Used when generating secret keys and salts. Default false.
 * @return string The random password.
 */
function wp_generate_password($length = 12, $special_chars = \true, $extra_special_chars = \false)
{
}
/**
 * Generates a random number
 *
 * @since 2.6.2
 * @since 4.4.0 Uses PHP7 random_int() or the random_compat library if available.
 *
 * @global string $rnd_value
 * @staticvar string $seed
 * @staticvar bool $external_rand_source_available
 *
 * @param int $min Lower limit for the generated number
 * @param int $max Upper limit for the generated number
 * @return int A random number between min and max
 */
function wp_rand($min = 0, $max = 0)
{
}
/**
 * Updates the user's password with a new encrypted one.
 *
 * For integration with other applications, this function can be overwritten to
 * instead use the other package password checking algorithm.
 *
 * Please note: This function should be used sparingly and is really only meant for single-time
 * application. Leveraging this improperly in a plugin or theme could result in an endless loop
 * of password resets if precautions are not taken to ensure it does not execute on every page load.
 *
 * @since 2.5.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param string $password The plaintext new user password
 * @param int    $user_id  User ID
 */
function wp_set_password($password, $user_id)
{
}
/**
 * Retrieve the avatar `<img>` tag for a user, email address, MD5 hash, comment, or post.
 *
 * @since 2.5.0
 * @since 4.2.0 Optional `$args` parameter added.
 *
 * @param mixed $id_or_email The Gravatar to retrieve. Accepts a user_id, gravatar md5 hash,
 *                           user email, WP_User object, WP_Post object, or WP_Comment object.
 * @param int    $size       Optional. Height and width of the avatar image file in pixels. Default 96.
 * @param string $default    Optional. URL for the default image or a default type. Accepts '404'
 *                           (return a 404 instead of a default image), 'retro' (8bit), 'monsterid'
 *                           (monster), 'wavatar' (cartoon face), 'indenticon' (the "quilt"),
 *                           'mystery', 'mm', or 'mysteryman' (The Oyster Man), 'blank' (transparent GIF),
 *                           or 'gravatar_default' (the Gravatar logo). Default is the value of the
 *                           'avatar_default' option, with a fallback of 'mystery'.
 * @param string $alt        Optional. Alternative text to use in &lt;img&gt; tag. Default empty.
 * @param array  $args       {
 *     Optional. Extra arguments to retrieve the avatar.
 *
 *     @type int          $height        Display height of the avatar in pixels. Defaults to $size.
 *     @type int          $width         Display width of the avatar in pixels. Defaults to $size.
 *     @type bool         $force_default Whether to always show the default image, never the Gravatar. Default false.
 *     @type string       $rating        What rating to display avatars up to. Accepts 'G', 'PG', 'R', 'X', and are
 *                                       judged in that order. Default is the value of the 'avatar_rating' option.
 *     @type string       $scheme        URL scheme to use. See set_url_scheme() for accepted values.
 *                                       Default null.
 *     @type array|string $class         Array or string of additional classes to add to the &lt;img&gt; element.
 *                                       Default null.
 *     @type bool         $force_display Whether to always show the avatar - ignores the show_avatars option.
 *                                       Default false.
 *     @type string       $extra_attr    HTML attributes to insert in the IMG element. Is not sanitized. Default empty.
 * }
 * @return false|string `<img>` tag for the user's avatar. False on failure.
 */
function get_avatar($id_or_email, $size = 96, $default = '', $alt = '', $args = \null)
{
}
/**
 * Displays a human readable HTML representation of the difference between two strings.
 *
 * The Diff is available for getting the changes between versions. The output is
 * HTML, so the primary use is for displaying the changes. If the two strings
 * are equivalent, then an empty string will be returned.
 *
 * The arguments supported and can be changed are listed below.
 *
 * 'title' : Default is an empty string. Titles the diff in a manner compatible
 *		with the output.
 * 'title_left' : Default is an empty string. Change the HTML to the left of the
 *		title.
 * 'title_right' : Default is an empty string. Change the HTML to the right of
 *		the title.
 *
 * @since 2.6.0
 *
 * @see wp_parse_args() Used to change defaults to user defined settings.
 * @uses Text_Diff
 * @uses WP_Text_Diff_Renderer_Table
 *
 * @param string       $left_string  "old" (left) version of string
 * @param string       $right_string "new" (right) version of string
 * @param string|array $args         Optional. Change 'title', 'title_left', and 'title_right' defaults.
 * @return string Empty string if strings are equivalent or HTML with differences.
 */
function wp_text_diff($left_string, $right_string, $args = \null)
{
}
/**
 * Hook a function or method to a specific filter action.
 *
 * WordPress offers filter hooks to allow plugins to modify
 * various types of internal data at runtime.
 *
 * A plugin can modify data by binding a callback to a filter hook. When the filter
 * is later applied, each bound callback is run in order of priority, and given
 * the opportunity to modify a value by returning a new value.
 *
 * The following example shows how a callback function is bound to a filter hook.
 *
 * Note that `$example` is passed to the callback, (maybe) modified, then returned:
 *
 *     function example_callback( $example ) {
 *         // Maybe modify $example in some way.
 *         return $example;
 *     }
 *     add_filter( 'example_filter', 'example_callback' );
 *
 * Bound callbacks can accept from none to the total number of arguments passed as parameters
 * in the corresponding apply_filters() call.
 *
 * In other words, if an apply_filters() call passes four total arguments, callbacks bound to
 * it can accept none (the same as 1) of the arguments or up to four. The important part is that
 * the `$accepted_args` value must reflect the number of arguments the bound callback *actually*
 * opted to accept. If no arguments were accepted by the callback that is considered to be the
 * same as accepting 1 argument. For example:
 *
 *     // Filter call.
 *     $value = apply_filters( 'hook', $value, $arg2, $arg3 );
 *
 *     // Accepting zero/one arguments.
 *     function example_callback() {
 *         ...
 *         return 'some value';
 *     }
 *     add_filter( 'hook', 'example_callback' ); // Where $priority is default 10, $accepted_args is default 1.
 *
 *     // Accepting two arguments (three possible).
 *     function example_callback( $value, $arg2 ) {
 *         ...
 *         return $maybe_modified_value;
 *     }
 *     add_filter( 'hook', 'example_callback', 10, 2 ); // Where $priority is 10, $accepted_args is 2.
 *
 * *Note:* The function will return true whether or not the callback is valid.
 * It is up to you to take care. This is done for optimization purposes, so
 * everything is as quick as possible.
 *
 * @since 0.71
 *
 * @global array $wp_filter      A multidimensional array of all hooks and the callbacks hooked to them.
 *
 * @param string   $tag             The name of the filter to hook the $function_to_add callback to.
 * @param callable $function_to_add The callback to be run when the filter is applied.
 * @param int      $priority        Optional. Used to specify the order in which the functions
 *                                  associated with a particular action are executed. Default 10.
 *                                  Lower numbers correspond with earlier execution,
 *                                  and functions with the same priority are executed
 *                                  in the order in which they were added to the action.
 * @param int      $accepted_args   Optional. The number of arguments the function accepts. Default 1.
 * @return true
 */
function add_filter($tag, $function_to_add, $priority = 10, $accepted_args = 1)
{
}
/**
 * Check if any filter has been registered for a hook.
 *
 * @since 2.5.0
 *
 * @global array $wp_filter Stores all of the filters.
 *
 * @param string        $tag               The name of the filter hook.
 * @param callable|bool $function_to_check Optional. The callback to check for. Default false.
 * @return false|int If $function_to_check is omitted, returns boolean for whether the hook has
 *                   anything registered. When checking a specific function, the priority of that
 *                   hook is returned, or false if the function is not attached. When using the
 *                   $function_to_check argument, this function may return a non-boolean value
 *                   that evaluates to false (e.g.) 0, so use the === operator for testing the
 *                   return value.
 */
function has_filter($tag, $function_to_check = \false)
{
}
/**
 * Call the functions added to a filter hook.
 *
 * The callback functions attached to filter hook $tag are invoked by calling
 * this function. This function can be used to create a new filter hook by
 * simply calling this function with the name of the new hook specified using
 * the $tag parameter.
 *
 * The function allows for additional arguments to be added and passed to hooks.
 *
 *     // Our filter callback function
 *     function example_callback( $string, $arg1, $arg2 ) {
 *         // (maybe) modify $string
 *         return $string;
 *     }
 *     add_filter( 'example_filter', 'example_callback', 10, 3 );
 *
 *     /*
 *      * Apply the filters by calling the 'example_callback' function we
 *      * "hooked" to 'example_filter' using the add_filter() function above.
 *      * - 'example_filter' is the filter hook $tag
 *      * - 'filter me' is the value being filtered
 *      * - $arg1 and $arg2 are the additional arguments passed to the callback.
 *     $value = apply_filters( 'example_filter', 'filter me', $arg1, $arg2 );
 *
 * @since 0.71
 *
 * @global array $wp_filter         Stores all of the filters.
 * @global array $wp_current_filter Stores the list of current filters with the current one last.
 *
 * @param string $tag     The name of the filter hook.
 * @param mixed  $value   The value on which the filters hooked to `$tag` are applied on.
 * @param mixed  ...$var Additional variables passed to the functions hooked to `$tag`.
 * @return mixed The filtered value after all hooked functions are applied to it.
 */
function apply_filters($tag, $value, ...$var)
{
}
/**
 * Execute functions hooked on a specific filter hook, specifying arguments in an array.
 *
 * @since 3.0.0
 *
 * @see apply_filters() This function is identical, but the arguments passed to the
 * functions hooked to `$tag` are supplied using an array.
 *
 * @global array $wp_filter         Stores all of the filters
 * @global array $wp_current_filter Stores the list of current filters with the current one last
 *
 * @param string $tag  The name of the filter hook.
 * @param array  $args The arguments supplied to the functions hooked to $tag.
 * @return mixed The filtered value after all hooked functions are applied to it.
 */
function apply_filters_ref_array($tag, $args)
{
}
/**
 * Removes a function from a specified filter hook.
 *
 * This function removes a function attached to a specified filter hook. This
 * method can be used to remove default functions attached to a specific filter
 * hook and possibly replace them with a substitute.
 *
 * To remove a hook, the $function_to_remove and $priority arguments must match
 * when the hook was added. This goes for both filters and actions. No warning
 * will be given on removal failure.
 *
 * @since 1.2.0
 *
 * @global array $wp_filter         Stores all of the filters
 *
 * @param string   $tag                The filter hook to which the function to be removed is hooked.
 * @param callable $function_to_remove The name of the function which should be removed.
 * @param int      $priority           Optional. The priority of the function. Default 10.
 * @return bool    Whether the function existed before it was removed.
 */
function remove_filter($tag, $function_to_remove, $priority = 10)
{
}
/**
 * Remove all of the hooks from a filter.
 *
 * @since 2.7.0
 *
 * @global array $wp_filter  Stores all of the filters
 *
 * @param string   $tag      The filter to remove hooks from.
 * @param int|bool $priority Optional. The priority number to remove. Default false.
 * @return true True when finished.
 */
function remove_all_filters($tag, $priority = \false)
{
}
/**
 * Retrieve the name of the current filter or action.
 *
 * @since 2.5.0
 *
 * @global array $wp_current_filter Stores the list of current filters with the current one last
 *
 * @return string Hook name of the current filter or action.
 */
function current_filter()
{
}
/**
 * Retrieve the name of the current action.
 *
 * @since 3.9.0
 *
 * @return string Hook name of the current action.
 */
function current_action()
{
}
/**
 * Retrieve the name of a filter currently being processed.
 *
 * The function current_filter() only returns the most recent filter or action
 * being executed. did_action() returns true once the action is initially
 * processed.
 *
 * This function allows detection for any filter currently being
 * executed (despite not being the most recent filter to fire, in the case of
 * hooks called from hook callbacks) to be verified.
 *
 * @since 3.9.0
 *
 * @see current_filter()
 * @see did_action()
 * @global array $wp_current_filter Current filter.
 *
 * @param null|string $filter Optional. Filter to check. Defaults to null, which
 *                            checks if any filter is currently being run.
 * @return bool Whether the filter is currently in the stack.
 */
function doing_filter($filter = \null)
{
}
/**
 * Retrieve the name of an action currently being processed.
 *
 * @since 3.9.0
 *
 * @param string|null $action Optional. Action to check. Defaults to null, which checks
 *                            if any action is currently being run.
 * @return bool Whether the action is currently in the stack.
 */
function doing_action($action = \null)
{
}
/**
 * Hooks a function on to a specific action.
 *
 * Actions are the hooks that the WordPress core launches at specific points
 * during execution, or when specific events occur. Plugins can specify that
 * one or more of its PHP functions are executed at these points, using the
 * Action API.
 *
 * @since 1.2.0
 *
 * @param string   $tag             The name of the action to which the $function_to_add is hooked.
 * @param callable $function_to_add The name of the function you wish to be called.
 * @param int      $priority        Optional. Used to specify the order in which the functions
 *                                  associated with a particular action are executed. Default 10.
 *                                  Lower numbers correspond with earlier execution,
 *                                  and functions with the same priority are executed
 *                                  in the order in which they were added to the action.
 * @param int      $accepted_args   Optional. The number of arguments the function accepts. Default 1.
 * @return true Will always return true.
 */
function add_action($tag, $function_to_add, $priority = 10, $accepted_args = 1)
{
}
/**
 * Execute functions hooked on a specific action hook.
 *
 * This function invokes all functions attached to action hook `$tag`. It is
 * possible to create new action hooks by simply calling this function,
 * specifying the name of the new hook using the `$tag` parameter.
 *
 * You can pass extra arguments to the hooks, much like you can with apply_filters().
 *
 * @since 1.2.0
 *
 * @global array $wp_filter         Stores all of the filters
 * @global array $wp_actions        Increments the amount of times action was triggered.
 * @global array $wp_current_filter Stores the list of current filters with the current one last
 *
 * @param string $tag     The name of the action to be executed.
 * @param mixed  $arg,... Optional. Additional arguments which are passed on to the
 *                        functions hooked to the action. Default empty.
 */
function do_action($tag, ...$arg )
{
}
/**
 * Retrieve the number of times an action is fired.
 *
 * @since 2.1.0
 *
 * @global array $wp_actions Increments the amount of times action was triggered.
 *
 * @param string $tag The name of the action hook.
 * @return int The number of times action hook $tag is fired.
 */
function did_action($tag)
{
}
/**
 * Execute functions hooked on a specific action hook, specifying arguments in an array.
 *
 * @since 2.1.0
 *
 * @see do_action() This function is identical, but the arguments passed to the
 *                  functions hooked to $tag< are supplied using an array.
 * @global array $wp_filter         Stores all of the filters
 * @global array $wp_actions        Increments the amount of times action was triggered.
 * @global array $wp_current_filter Stores the list of current filters with the current one last
 *
 * @param string $tag  The name of the action to be executed.
 * @param array  $args The arguments supplied to the functions hooked to `$tag`.
 */
function do_action_ref_array($tag, $args)
{
}
/**
 * Check if any action has been registered for a hook.
 *
 * @since 2.5.0
 *
 * @see has_filter() has_action() is an alias of has_filter().
 *
 * @param string        $tag               The name of the action hook.
 * @param callable|bool $function_to_check Optional. The callback to check for. Default false.
 * @return bool|int If $function_to_check is omitted, returns boolean for whether the hook has
 *                  anything registered. When checking a specific function, the priority of that
 *                  hook is returned, or false if the function is not attached. When using the
 *                  $function_to_check argument, this function may return a non-boolean value
 *                  that evaluates to false (e.g.) 0, so use the === operator for testing the
 *                  return value.
 */
function has_action($tag, $function_to_check = \false)
{
}
/**
 * Removes a function from a specified action hook.
 *
 * This function removes a function attached to a specified action hook. This
 * method can be used to remove default functions attached to a specific filter
 * hook and possibly replace them with a substitute.
 *
 * @since 1.2.0
 *
 * @param string   $tag                The action hook to which the function to be removed is hooked.
 * @param callable $function_to_remove The name of the function which should be removed.
 * @param int      $priority           Optional. The priority of the function. Default 10.
 * @return bool Whether the function is removed.
 */
function remove_action($tag, $function_to_remove, $priority = 10)
{
}
/**
 * Remove all of the hooks from an action.
 *
 * @since 2.7.0
 *
 * @param string   $tag      The action to remove hooks from.
 * @param int|bool $priority The priority number to remove them from. Default false.
 * @return true True when finished.
 */
function remove_all_actions($tag, $priority = \false)
{
}
/**
 * Fires functions attached to a deprecated filter hook.
 *
 * When a filter hook is deprecated, the apply_filters() call is replaced with
 * apply_filters_deprecated(), which triggers a deprecation notice and then fires
 * the original filter hook.
 *
 * Note: the value and extra arguments passed to the original apply_filters() call
 * must be passed here to `$args` as an array. For example:
 *
 *     // Old filter.
 *     return apply_filters( 'wpdocs_filter', $value, $extra_arg );
 *
 *     // Deprecated.
 *     return apply_filters_deprecated( 'wpdocs_filter', array( $value, $extra_arg ), '4.9', 'wpdocs_new_filter' );
 *
 * @since 4.6.0
 *
 * @see _deprecated_hook()
 *
 * @param string $tag         The name of the filter hook.
 * @param array  $args        Array of additional function arguments to be passed to apply_filters().
 * @param string $version     The version of WordPress that deprecated the hook.
 * @param string $replacement Optional. The hook that should have been used. Default false.
 * @param string $message     Optional. A message regarding the change. Default null.
 */
function apply_filters_deprecated($tag, $args, $version, $replacement = \false, $message = \null)
{
}
/**
 * Fires functions attached to a deprecated action hook.
 *
 * When an action hook is deprecated, the do_action() call is replaced with
 * do_action_deprecated(), which triggers a deprecation notice and then fires
 * the original hook.
 *
 * @since 4.6.0
 *
 * @see _deprecated_hook()
 *
 * @param string $tag         The name of the action hook.
 * @param array  $args        Array of additional function arguments to be passed to do_action().
 * @param string $version     The version of WordPress that deprecated the hook.
 * @param string $replacement Optional. The hook that should have been used.
 * @param string $message     Optional. A message regarding the change.
 */
function do_action_deprecated($tag, $args, $version, $replacement = \false, $message = \null)
{
}
//
// Functions for handling plugins.
//
/**
 * Gets the basename of a plugin.
 *
 * This method extracts the name of a plugin from its filename.
 *
 * @since 1.5.0
 *
 * @global array $wp_plugin_paths
 *
 * @param string $file The filename of plugin.
 * @return string The name of a plugin.
 */
function plugin_basename($file)
{
}
/**
 * Register a plugin's real path.
 *
 * This is used in plugin_basename() to resolve symlinked paths.
 *
 * @since 3.9.0
 *
 * @see wp_normalize_path()
 *
 * @global array $wp_plugin_paths
 *
 * @staticvar string $wp_plugin_path
 * @staticvar string $wpmu_plugin_path
 *
 * @param string $file Known path to the file.
 * @return bool Whether the path was able to be registered.
 */
function wp_register_plugin_realpath($file)
{
}
/**
 * Get the filesystem directory path (with trailing slash) for the plugin __FILE__ passed in.
 *
 * @since 2.8.0
 *
 * @param string $file The filename of the plugin (__FILE__).
 * @return string the filesystem path of the directory that contains the plugin.
 */
function plugin_dir_path($file)
{
}
/**
 * Get the URL directory path (with trailing slash) for the plugin __FILE__ passed in.
 *
 * @since 2.8.0
 *
 * @param string $file The filename of the plugin (__FILE__).
 * @return string the URL path of the directory that contains the plugin.
 */
function plugin_dir_url($file)
{
}
/**
 * Set the activation hook for a plugin.
 *
 * When a plugin is activated, the action 'activate_PLUGINNAME' hook is
 * called. In the name of this hook, PLUGINNAME is replaced with the name
 * of the plugin, including the optional subdirectory. For example, when the
 * plugin is located in wp-content/plugins/sampleplugin/sample.php, then
 * the name of this hook will become 'activate_sampleplugin/sample.php'.
 *
 * When the plugin consists of only one file and is (as by default) located at
 * wp-content/plugins/sample.php the name of this hook will be
 * 'activate_sample.php'.
 *
 * @since 2.0.0
 *
 * @param string   $file     The filename of the plugin including the path.
 * @param callable $function The function hooked to the 'activate_PLUGIN' action.
 */
function register_activation_hook($file, $function)
{
}
/**
 * Set the deactivation hook for a plugin.
 *
 * When a plugin is deactivated, the action 'deactivate_PLUGINNAME' hook is
 * called. In the name of this hook, PLUGINNAME is replaced with the name
 * of the plugin, including the optional subdirectory. For example, when the
 * plugin is located in wp-content/plugins/sampleplugin/sample.php, then
 * the name of this hook will become 'deactivate_sampleplugin/sample.php'.
 *
 * When the plugin consists of only one file and is (as by default) located at
 * wp-content/plugins/sample.php the name of this hook will be
 * 'deactivate_sample.php'.
 *
 * @since 2.0.0
 *
 * @param string   $file     The filename of the plugin including the path.
 * @param callable $function The function hooked to the 'deactivate_PLUGIN' action.
 */
function register_deactivation_hook($file, $function)
{
}
/**
 * Set the uninstallation hook for a plugin.
 *
 * Registers the uninstall hook that will be called when the user clicks on the
 * uninstall link that calls for the plugin to uninstall itself. The link won't
 * be active unless the plugin hooks into the action.
 *
 * The plugin should not run arbitrary code outside of functions, when
 * registering the uninstall hook. In order to run using the hook, the plugin
 * will have to be included, which means that any code laying outside of a
 * function will be run during the uninstallation process. The plugin should not
 * hinder the uninstallation process.
 *
 * If the plugin can not be written without running code within the plugin, then
 * the plugin should create a file named 'uninstall.php' in the base plugin
 * folder. This file will be called, if it exists, during the uninstallation process
 * bypassing the uninstall hook. The plugin, when using the 'uninstall.php'
 * should always check for the 'WP_UNINSTALL_PLUGIN' constant, before
 * executing.
 *
 * @since 2.7.0
 *
 * @param string   $file     Plugin file.
 * @param callable $callback The callback to run when the hook is called. Must be
 *                           a static method or function.
 */
function register_uninstall_hook($file, $callback)
{
}
/**
 * Call the 'all' hook, which will process the functions hooked into it.
 *
 * The 'all' hook passes all of the arguments or parameters that were used for
 * the hook, which this function was called for.
 *
 * This function is used internally for apply_filters(), do_action(), and
 * do_action_ref_array() and is not meant to be used from outside those
 * functions. This function does not check for the existence of the all hook, so
 * it will fail unless the all hook exists prior to this function call.
 *
 * @since 2.5.0
 * @access private
 *
 * @global array $wp_filter  Stores all of the filters
 *
 * @param array $args The collected parameters from the hook that was called.
 */
function _wp_call_all_hook($args)
{
}
/**
 * Build Unique ID for storage and retrieval.
 *
 * The old way to serialize the callback caused issues and this function is the
 * solution. It works by checking for objects and creating a new property in
 * the class to keep track of the object and new objects of the same class that
 * need to be added.
 *
 * It also allows for the removal of actions and filters for objects after they
 * change class properties. It is possible to include the property $wp_filter_id
 * in your class and set it to "null" or a number to bypass the workaround.
 * However this will prevent you from adding new classes and any new classes
 * will overwrite the previous hook by the same class.
 *
 * Functions and static method callbacks are just returned as strings and
 * shouldn't have any speed penalty.
 *
 * @link https://core.trac.wordpress.org/ticket/3875
 *
 * @since 2.2.3
 * @access private
 *
 * @global array $wp_filter Storage for all of the filters and actions.
 * @staticvar int $filter_id_count
 *
 * @param string   $tag      Used in counting how many hooks were applied
 * @param callable $function Used for creating unique id
 * @param int|bool $priority Used in counting how many hooks were applied. If === false
 *                           and $function is an object reference, we return the unique
 *                           id only if it already has one, false otherwise.
 * @return string|false Unique ID for usage as array key or false if $priority === false
 *                      and $function is an object reference, and it does not already have
 *                      a unique id.
 */
function _wp_filter_build_unique_id($tag, $function, $priority)
{
}
/**
 * Post format functions.
 *
 * @package WordPress
 * @subpackage Post
 */
/**
 * Retrieve the format slug for a post
 *
 * @since 3.1.0
 *
 * @param int|object|null $post Post ID or post object. Optional, default is the current post from the loop.
 * @return string|false The format if successful. False otherwise.
 */
function get_post_format($post = \null)
{
}
/**
 * Check if a post has any of the given formats, or any format.
 *
 * @since 3.1.0
 *
 * @param string|array    $format Optional. The format or formats to check.
 * @param object|int|null $post   Optional. The post to check. If not supplied, defaults to the current post if used in the loop.
 * @return bool True if the post has any of the given formats (or any format, if no format specified), false otherwise.
 */
function has_post_format($format = array(), $post = \null)
{
}
/**
 * Assign a format to a post
 *
 * @since 3.1.0
 *
 * @param int|object $post   The post for which to assign a format.
 * @param string     $format A format to assign. Use an empty string or array to remove all formats from the post.
 * @return array|WP_Error|false WP_Error on error. Array of affected term IDs on success.
 */
function set_post_format($post, $format)
{
}
/**
 * Returns an array of post format slugs to their translated and pretty display versions
 *
 * @since 3.1.0
 *
 * @return array The array of translated post format names.
 */
function get_post_format_strings()
{
}
/**
 * Retrieves the array of post format slugs.
 *
 * @since 3.1.0
 *
 * @return array The array of post format slugs as both keys and values.
 */
function get_post_format_slugs()
{
}
/**
 * Returns a pretty, translated version of a post format slug
 *
 * @since 3.1.0
 *
 * @param string $slug A post format slug.
 * @return string The translated post format name.
 */
function get_post_format_string($slug)
{
}
/**
 * Returns a link to a post format index.
 *
 * @since 3.1.0
 *
 * @param string $format The post format slug.
 * @return string|WP_Error|false The post format term link.
 */
function get_post_format_link($format)
{
}
/**
 * Filters the request to allow for the format prefix.
 *
 * @access private
 * @since 3.1.0
 *
 * @param array $qvs
 * @return array
 */
function _post_format_request($qvs)
{
}
/**
 * Filters the post format term link to remove the format prefix.
 *
 * @access private
 * @since 3.1.0
 *
 * @global WP_Rewrite $wp_rewrite
 *
 * @param string $link
 * @param object $term
 * @param string $taxonomy
 * @return string
 */
function _post_format_link($link, $term, $taxonomy)
{
}
/**
 * Remove the post format prefix from the name property of the term object created by get_term().
 *
 * @access private
 * @since 3.1.0
 *
 * @param object $term
 * @return object
 */
function _post_format_get_term($term)
{
}
/**
 * Remove the post format prefix from the name property of the term objects created by get_terms().
 *
 * @access private
 * @since 3.1.0
 *
 * @param array        $terms
 * @param string|array $taxonomies
 * @param array        $args
 * @return array
 */
function _post_format_get_terms($terms, $taxonomies, $args)
{
}
/**
 * Remove the post format prefix from the name property of the term objects created by wp_get_object_terms().
 *
 * @access private
 * @since 3.1.0
 *
 * @param array $terms
 * @return array
 */
function _post_format_wp_get_object_terms($terms)
{
}
/**
 * WordPress Post Template Functions.
 *
 * Gets content for the current post in the loop.
 *
 * @package WordPress
 * @subpackage Template
 */
/**
 * Display the ID of the current item in the WordPress Loop.
 *
 * @since 0.71
 */
function the_ID()
{
}
/**
 * Retrieve the ID of the current item in the WordPress Loop.
 *
 * @since 2.1.0
 *
 * @return int|false The ID of the current item in the WordPress Loop. False if $post is not set.
 */
function get_the_ID()
{
}
/**
 * Display or retrieve the current post title with optional markup.
 *
 * @since 0.71
 *
 * @param string $before Optional. Markup to prepend to the title. Default empty.
 * @param string $after  Optional. Markup to append to the title. Default empty.
 * @param bool   $echo   Optional. Whether to echo or return the title. Default true for echo.
 * @return string|void Current post title if $echo is false.
 */
function the_title($before = '', $after = '', $echo = \true)
{
}
/**
 * Sanitize the current title when retrieving or displaying.
 *
 * Works like the_title(), except the parameters can be in a string or
 * an array. See the function for what can be override in the $args parameter.
 *
 * The title before it is displayed will have the tags stripped and esc_attr()
 * before it is passed to the user or displayed. The default as with the_title(),
 * is to display the title.
 *
 * @since 2.3.0
 *
 * @param string|array $args {
 *     Title attribute arguments. Optional.
 *
 *     @type string  $before Markup to prepend to the title. Default empty.
 *     @type string  $after  Markup to append to the title. Default empty.
 *     @type bool    $echo   Whether to echo or return the title. Default true for echo.
 *     @type WP_Post $post   Current post object to retrieve the title for.
 * }
 * @return string|void String when echo is false.
 */
function the_title_attribute($args = '')
{
}
/**
 * Retrieve post title.
 *
 * If the post is protected and the visitor is not an admin, then "Protected"
 * will be displayed before the post title. If the post is private, then
 * "Private" will be located before the post title.
 *
 * @since 0.71
 *
 * @param int|WP_Post $post Optional. Post ID or WP_Post object. Default is global $post.
 * @return string
 */
function get_the_title($post = 0)
{
}
/**
 * Display the Post Global Unique Identifier (guid).
 *
 * The guid will appear to be a link, but should not be used as a link to the
 * post. The reason you should not use it as a link, is because of moving the
 * blog across domains.
 *
 * URL is escaped to make it XML-safe.
 *
 * @since 1.5.0
 *
 * @param int|WP_Post $post Optional. Post ID or post object. Default is global $post.
 */
function the_guid($post = 0)
{
}
/**
 * Retrieve the Post Global Unique Identifier (guid).
 *
 * The guid will appear to be a link, but should not be used as an link to the
 * post. The reason you should not use it as a link, is because of moving the
 * blog across domains.
 *
 * @since 1.5.0
 *
 * @param int|WP_Post $post Optional. Post ID or post object. Default is global $post.
 * @return string
 */
function get_the_guid($post = 0)
{
}
/**
 * Display the post content.
 *
 * @since 0.71
 *
 * @param string $more_link_text Optional. Content for when there is more text.
 * @param bool   $strip_teaser   Optional. Strip teaser content before the more text. Default is false.
 */
function the_content($more_link_text = \null, $strip_teaser = \false)
{
}
/**
 * Retrieve the post content.
 *
 * @since 0.71
 *
 * @global int   $page      Page number of a single post/page.
 * @global int   $more      Boolean indicator for whether single post/page is being viewed.
 * @global bool  $preview   Whether post/page is in preview mode.
 * @global array $pages     Array of all pages in post/page. Each array element contains part of the content separated by the <!--nextpage--> tag.
 * @global int   $multipage Boolean indicator for whether multiple pages are in play.
 *
 * @param string $more_link_text Optional. Content for when there is more text.
 * @param bool   $strip_teaser   Optional. Strip teaser content before the more text. Default is false.
 * @return string
 */
function get_the_content($more_link_text = \null, $strip_teaser = \false)
{
}
/**
 * Display the post excerpt.
 *
 * @since 0.71
 */
function the_excerpt()
{
}
/**
 * Retrieves the post excerpt.
 *
 * @since 0.71
 * @since 4.5.0 Introduced the `$post` parameter.
 *
 * @param int|WP_Post $post Optional. Post ID or WP_Post object. Default is global $post.
 * @return string Post excerpt.
 */
function get_the_excerpt($post = \null)
{
}
/**
 * Whether the post has a custom excerpt.
 *
 * @since 2.3.0
 *
 * @param int|WP_Post $post Optional. Post ID or WP_Post object. Default is global $post.
 * @return bool True if the post has a custom excerpt, false otherwise.
 */
function has_excerpt($post = 0)
{
}
/**
 * Display the classes for the post div.
 *
 * @since 2.7.0
 *
 * @param string|array $class   One or more classes to add to the class list.
 * @param int|WP_Post  $post_id Optional. Post ID or post object. Defaults to the global `$post`.
 */
function post_class($class = '', $post_id = \null)
{
}
/**
 * Retrieves the classes for the post div as an array.
 *
 * The class names are many. If the post is a sticky, then the 'sticky'
 * class name. The class 'hentry' is always added to each post. If the post has a
 * post thumbnail, 'has-post-thumbnail' is added as a class. For each taxonomy that
 * the post belongs to, a class will be added of the format '{$taxonomy}-{$slug}' -
 * eg 'category-foo' or 'my_custom_taxonomy-bar'.
 *
 * The 'post_tag' taxonomy is a special
 * case; the class has the 'tag-' prefix instead of 'post_tag-'. All classes are
 * passed through the filter, {@see 'post_class'}, with the list of classes, followed by
 * $class parameter value, with the post ID as the last parameter.
 *
 * @since 2.7.0
 * @since 4.2.0 Custom taxonomy classes were added.
 *
 * @param string|array $class   One or more classes to add to the class list.
 * @param int|WP_Post  $post_id Optional. Post ID or post object.
 * @return array Array of classes.
 */
function get_post_class($class = '', $post_id = \null)
{
}
/**
 * Display the classes for the body element.
 *
 * @since 2.8.0
 *
 * @param string|array $class One or more classes to add to the class list.
 */
function body_class($class = '')
{
}
/**
 * Retrieve the classes for the body element as an array.
 *
 * @since 2.8.0
 *
 * @global WP_Query $wp_query
 *
 * @param string|array $class One or more classes to add to the class list.
 * @return array Array of classes.
 */
function get_body_class($class = '')
{
}
/**
 * Whether post requires password and correct password has been provided.
 *
 * @since 2.7.0
 *
 * @param int|WP_Post|null $post An optional post. Global $post used if not provided.
 * @return bool false if a password is not required or the correct password cookie is present, true otherwise.
 */
function post_password_required($post = \null)
{
}
//
// Page Template Functions for usage in Themes
//
/**
 * The formatted output of a list of pages.
 *
 * Displays page links for paginated posts (i.e. includes the <!--nextpage-->.
 * Quicktag one or more times). This tag must be within The Loop.
 *
 * @since 1.2.0
 *
 * @global int $page
 * @global int $numpages
 * @global int $multipage
 * @global int $more
 *
 * @param string|array $args {
 *     Optional. Array or string of default arguments.
 *
 *     @type string       $before           HTML or text to prepend to each link. Default is `<p> Pages:`.
 *     @type string       $after            HTML or text to append to each link. Default is `</p>`.
 *     @type string       $link_before      HTML or text to prepend to each link, inside the `<a>` tag.
 *                                          Also prepended to the current item, which is not linked. Default empty.
 *     @type string       $link_after       HTML or text to append to each Pages link inside the `<a>` tag.
 *                                          Also appended to the current item, which is not linked. Default empty.
 *     @type string       $next_or_number   Indicates whether page numbers should be used. Valid values are number
 *                                          and next. Default is 'number'.
 *     @type string       $separator        Text between pagination links. Default is ' '.
 *     @type string       $nextpagelink     Link text for the next page link, if available. Default is 'Next Page'.
 *     @type string       $previouspagelink Link text for the previous page link, if available. Default is 'Previous Page'.
 *     @type string       $pagelink         Format string for page numbers. The % in the parameter string will be
 *                                          replaced with the page number, so 'Page %' generates "Page 1", "Page 2", etc.
 *                                          Defaults to '%', just the page number.
 *     @type int|bool     $echo             Whether to echo or not. Accepts 1|true or 0|false. Default 1|true.
 * }
 * @return string Formatted output in HTML.
 */
function wp_link_pages($args = '')
{
}
/**
 * Helper function for wp_link_pages().
 *
 * @since 3.1.0
 * @access private
 *
 * @global WP_Rewrite $wp_rewrite
 *
 * @param int $i Page number.
 * @return string Link.
 */
function _wp_link_page($i)
{
}
//
// Post-meta: Custom per-post fields.
//
/**
 * Retrieve post custom meta data field.
 *
 * @since 1.5.0
 *
 * @param string $key Meta data key name.
 * @return false|string|array Array of values or single value, if only one element exists. False will be returned if key does not exist.
 */
function post_custom($key = '')
{
}
/**
 * Display list of post custom fields.
 *
 * @since 1.2.0
 *
 * @internal This will probably change at some point...
 *
 */
function the_meta()
{
}
//
// Pages
//
/**
 * Retrieve or display list of pages as a dropdown (select list).
 *
 * @since 2.1.0
 * @since 4.2.0 The `$value_field` argument was added.
 * @since 4.3.0 The `$class` argument was added.
 *
 * @param array|string $args {
 *     Optional. Array or string of arguments to generate a pages drop-down element.
 *
 *     @type int          $depth                 Maximum depth. Default 0.
 *     @type int          $child_of              Page ID to retrieve child pages of. Default 0.
 *     @type int|string   $selected              Value of the option that should be selected. Default 0.
 *     @type bool|int     $echo                  Whether to echo or return the generated markup. Accepts 0, 1,
 *                                               or their bool equivalents. Default 1.
 *     @type string       $name                  Value for the 'name' attribute of the select element.
 *                                               Default 'page_id'.
 *     @type string       $id                    Value for the 'id' attribute of the select element.
 *     @type string       $class                 Value for the 'class' attribute of the select element. Default: none.
 *                                               Defaults to the value of `$name`.
 *     @type string       $show_option_none      Text to display for showing no pages. Default empty (does not display).
 *     @type string       $show_option_no_change Text to display for "no change" option. Default empty (does not display).
 *     @type string       $option_none_value     Value to use when no page is selected. Default empty.
 *     @type string       $value_field           Post field used to populate the 'value' attribute of the option
 *                                               elements. Accepts any valid post field. Default 'ID'.
 * }
 * @return string HTML content, if not displaying.
 */
function wp_dropdown_pages($args = '')
{
}
/**
 * Retrieve or display list of pages (or hierarchical post type items) in list (li) format.
 *
 * @since 1.5.0
 * @since 4.7.0 Added the `item_spacing` argument.
 *
 * @see get_pages()
 *
 * @global WP_Query $wp_query
 *
 * @param array|string $args {
 *     Array or string of arguments. Optional.
 *
 *     @type int          $child_of     Display only the sub-pages of a single page by ID. Default 0 (all pages).
 *     @type string       $authors      Comma-separated list of author IDs. Default empty (all authors).
 *     @type string       $date_format  PHP date format to use for the listed pages. Relies on the 'show_date' parameter.
 *                                      Default is the value of 'date_format' option.
 *     @type int          $depth        Number of levels in the hierarchy of pages to include in the generated list.
 *                                      Accepts -1 (any depth), 0 (all pages), 1 (top-level pages only), and n (pages to
 *                                      the given n depth). Default 0.
 *     @type bool         $echo         Whether or not to echo the list of pages. Default true.
 *     @type string       $exclude      Comma-separated list of page IDs to exclude. Default empty.
 *     @type array        $include      Comma-separated list of page IDs to include. Default empty.
 *     @type string       $link_after   Text or HTML to follow the page link label. Default null.
 *     @type string       $link_before  Text or HTML to precede the page link label. Default null.
 *     @type string       $post_type    Post type to query for. Default 'page'.
 *     @type string|array $post_status  Comma-separated list or array of post statuses to include. Default 'publish'.
 *     @type string       $show_date    Whether to display the page publish or modified date for each page. Accepts
 *                                      'modified' or any other value. An empty value hides the date. Default empty.
 *     @type string       $sort_column  Comma-separated list of column names to sort the pages by. Accepts 'post_author',
 *                                      'post_date', 'post_title', 'post_name', 'post_modified', 'post_modified_gmt',
 *                                      'menu_order', 'post_parent', 'ID', 'rand', or 'comment_count'. Default 'post_title'.
 *     @type string       $title_li     List heading. Passing a null or empty value will result in no heading, and the list
 *                                      will not be wrapped with unordered list `<ul>` tags. Default 'Pages'.
 *     @type string       $item_spacing Whether to preserve whitespace within the menu's HTML. Accepts 'preserve' or 'discard'.
 *                                      Default 'preserve'.
 *     @type Walker       $walker       Walker instance to use for listing pages. Default empty (Walker_Page).
 * }
 * @return string|void HTML list of pages.
 */
function wp_list_pages($args = '')
{
}
/**
 * Displays or retrieves a list of pages with an optional home link.
 *
 * The arguments are listed below and part of the arguments are for wp_list_pages()} function.
 * Check that function for more info on those arguments.
 *
 * @since 2.7.0
 * @since 4.4.0 Added `menu_id`, `container`, `before`, `after`, and `walker` arguments.
 * @since 4.7.0 Added the `item_spacing` argument.
 *
 * @param array|string $args {
 *     Optional. Arguments to generate a page menu. See wp_list_pages() for additional arguments.
 *
 *     @type string          $sort_column  How to sort the list of pages. Accepts post column names.
 *                                         Default 'menu_order, post_title'.
 *     @type string          $menu_id      ID for the div containing the page list. Default is empty string.
 *     @type string          $menu_class   Class to use for the element containing the page list. Default 'menu'.
 *     @type string          $container    Element to use for the element containing the page list. Default 'div'.
 *     @type bool            $echo         Whether to echo the list or return it. Accepts true (echo) or false (return).
 *                                         Default true.
 *     @type int|bool|string $show_home    Whether to display the link to the home page. Can just enter the text
 *                                         you'd like shown for the home link. 1|true defaults to 'Home'.
 *     @type string          $link_before  The HTML or text to prepend to $show_home text. Default empty.
 *     @type string          $link_after   The HTML or text to append to $show_home text. Default empty.
 *     @type string          $before       The HTML or text to prepend to the menu. Default is '<ul>'.
 *     @type string          $after        The HTML or text to append to the menu. Default is '</ul>'.
 *     @type string          $item_spacing Whether to preserve whitespace within the menu's HTML. Accepts 'preserve' or 'discard'. Default 'discard'.
 *     @type Walker          $walker       Walker instance to use for listing pages. Default empty (Walker_Page).
 * }
 * @return string|void HTML menu
 */
function wp_page_menu($args = array())
{
}
//
// Page helpers
//
/**
 * Retrieve HTML list content for page list.
 *
 * @uses Walker_Page to create HTML list content.
 * @since 2.1.0
 *
 * @param array $pages
 * @param int   $depth
 * @param int   $current_page
 * @param array $r
 * @return string
 */
function walk_page_tree($pages, $depth, $current_page, $r)
{
}
/**
 * Retrieve HTML dropdown (select) content for page list.
 *
 * @uses Walker_PageDropdown to create HTML dropdown content.
 * @since 2.1.0
 * @see Walker_PageDropdown::walk() for parameters and return description.
 *
 * @return string
 */
function walk_page_dropdown_tree()
{
}
//
// Attachments
//
/**
 * Display an attachment page link using an image or icon.
 *
 * @since 2.0.0
 *
 * @param int|WP_Post $id Optional. Post ID or post object.
 * @param bool        $fullsize     Optional, default is false. Whether to use full size.
 * @param bool        $deprecated   Deprecated. Not used.
 * @param bool        $permalink    Optional, default is false. Whether to include permalink.
 */
function the_attachment_link($id = 0, $fullsize = \false, $deprecated = \false, $permalink = \false)
{
}
/**
 * Retrieve an attachment page link using an image or icon, if possible.
 *
 * @since 2.5.0
 * @since 4.4.0 The `$id` parameter can now accept either a post ID or `WP_Post` object.
 *
 * @param int|WP_Post  $id        Optional. Post ID or post object.
 * @param string|array $size      Optional. Image size. Accepts any valid image size, or an array
 *                                of width and height values in pixels (in that order).
 *                                Default 'thumbnail'.
 * @param bool         $permalink Optional, Whether to add permalink to image. Default false.
 * @param bool         $icon      Optional. Whether the attachment is an icon. Default false.
 * @param string|false $text      Optional. Link text to use. Activated by passing a string, false otherwise.
 *                                Default false.
 * @param array|string $attr      Optional. Array or string of attributes. Default empty.
 * @return string HTML content.
 */
function wp_get_attachment_link($id = 0, $size = 'thumbnail', $permalink = \false, $icon = \false, $text = \false, $attr = '')
{
}
/**
 * Wrap attachment in paragraph tag before content.
 *
 * @since 2.0.0
 *
 * @param string $content
 * @return string
 */
function prepend_attachment($content)
{
}
//
// Misc
//
/**
 * Retrieve protected post password form content.
 *
 * @since 1.0.0
 *
 * @param int|WP_Post $post Optional. Post ID or WP_Post object. Default is global $post.
 * @return string HTML content for password form for password protected post.
 */
function get_the_password_form($post = 0)
{
}
/**
 * Whether currently in a page template.
 *
 * This template tag allows you to determine if you are in a page template.
 * You can optionally provide a template name or array of template names
 * and then the check will be specific to that template.
 *
 * @since 2.5.0
 * @since 4.2.0 The `$template` parameter was changed to also accept an array of page templates.
 * @since 4.7.0 Now works with any post type, not just pages.
 *
 * @param string|array $template The specific template name or array of templates to match.
 * @return bool True on success, false on failure.
 */
function is_page_template($template = '')
{
}
/**
 * Get the specific template name for a given post.
 *
 * @since 3.4.0
 * @since 4.7.0 Now works with any post type, not just pages.
 *
 * @param int|WP_Post $post Optional. Post ID or WP_Post object. Default is global $post.
 * @return string|false Page template filename. Returns an empty string when the default page template
 * 	is in use. Returns false if the post does not exist.
 */
function get_page_template_slug($post = \null)
{
}
/**
 * Retrieve formatted date timestamp of a revision (linked to that revisions's page).
 *
 * @since 2.6.0
 *
 * @param int|object $revision Revision ID or revision object.
 * @param bool       $link     Optional, default is true. Link to revisions's page?
 * @return string|false i18n formatted datetimestamp or localized 'Current Revision'.
 */
function wp_post_revision_title($revision, $link = \true)
{
}
/**
 * Retrieve formatted date timestamp of a revision (linked to that revisions's page).
 *
 * @since 3.6.0
 *
 * @param int|object $revision Revision ID or revision object.
 * @param bool       $link     Optional, default is true. Link to revisions's page?
 * @return string|false gravatar, user, i18n formatted datetimestamp or localized 'Current Revision'.
 */
function wp_post_revision_title_expanded($revision, $link = \true)
{
}
/**
 * Display list of a post's revisions.
 *
 * Can output either a UL with edit links or a TABLE with diff interface, and
 * restore action links.
 *
 * @since 2.6.0
 *
 * @param int|WP_Post $post_id Optional. Post ID or WP_Post object. Default is global $post.
 * @param string      $type    'all' (default), 'revision' or 'autosave'
 */
function wp_list_post_revisions($post_id = 0, $type = 'all')
{
}
/**
 * WordPress Post Thumbnail Template Functions.
 *
 * Support for post thumbnails.
 * Theme's functions.php must call add_theme_support( 'post-thumbnails' ) to use these.
 *
 * @package WordPress
 * @subpackage Template
 */
/**
 * Check if post has an image attached.
 *
 * @since 2.9.0
 * @since 4.4.0 `$post` can be a post ID or WP_Post object.
 *
 * @param int|WP_Post $post Optional. Post ID or WP_Post object. Default is global `$post`.
 * @return bool Whether the post has an image attached.
 */
function has_post_thumbnail($post = \null)
{
}
/**
 * Retrieve post thumbnail ID.
 *
 * @since 2.9.0
 * @since 4.4.0 `$post` can be a post ID or WP_Post object.
 *
 * @param int|WP_Post $post Optional. Post ID or WP_Post object. Default is global `$post`.
 * @return string|int Post thumbnail ID or empty string.
 */
function get_post_thumbnail_id($post = \null)
{
}
/**
 * Display the post thumbnail.
 *
 * When a theme adds 'post-thumbnail' support, a special 'post-thumbnail' image size
 * is registered, which differs from the 'thumbnail' image size managed via the
 * Settings > Media screen.
 *
 * When using the_post_thumbnail() or related functions, the 'post-thumbnail' image
 * size is used by default, though a different size can be specified instead as needed.
 *
 * @since 2.9.0
 *
 * @see get_the_post_thumbnail()
 *
 * @param string|array $size Optional. Image size to use. Accepts any valid image size, or
 *                           an array of width and height values in pixels (in that order).
 *                           Default 'post-thumbnail'.
 * @param string|array $attr Optional. Query string or array of attributes. Default empty.
 */
function the_post_thumbnail($size = 'post-thumbnail', $attr = '')
{
}
/**
 * Update cache for thumbnails in the current loop.
 *
 * @since 3.2.0
 *
 * @global WP_Query $wp_query
 *
 * @param WP_Query $wp_query Optional. A WP_Query instance. Defaults to the $wp_query global.
 */
function update_post_thumbnail_cache($wp_query = \null)
{
}
/**
 * Retrieve the post thumbnail.
 *
 * When a theme adds 'post-thumbnail' support, a special 'post-thumbnail' image size
 * is registered, which differs from the 'thumbnail' image size managed via the
 * Settings > Media screen.
 *
 * When using the_post_thumbnail() or related functions, the 'post-thumbnail' image
 * size is used by default, though a different size can be specified instead as needed.
 *
 * @since 2.9.0
 * @since 4.4.0 `$post` can be a post ID or WP_Post object.
 *
 * @param int|WP_Post  $post Optional. Post ID or WP_Post object.  Default is global `$post`.
 * @param string|array $size Optional. Image size to use. Accepts any valid image size, or
 *                           an array of width and height values in pixels (in that order).
 *                           Default 'post-thumbnail'.
 * @param string|array $attr Optional. Query string or array of attributes. Default empty.
 * @return string The post thumbnail image tag.
 */
function get_the_post_thumbnail($post = \null, $size = 'post-thumbnail', $attr = '')
{
}
/**
 * Return the post thumbnail URL.
 *
 * @since 4.4.0
 *
 * @param int|WP_Post  $post Optional. Post ID or WP_Post object.  Default is global `$post`.
 * @param string|array $size Optional. Registered image size to retrieve the source for or a flat
 *                           array of height and width dimensions. Default 'post-thumbnail'.
 * @return string|false Post thumbnail URL or false if no URL is available.
 */
function get_the_post_thumbnail_url($post = \null, $size = 'post-thumbnail')
{
}
/**
 * Display the post thumbnail URL.
 *
 * @since 4.4.0
 *
 * @param string|array $size Optional. Image size to use. Accepts any valid image size,
 *                           or an array of width and height values in pixels (in that order).
 *                           Default 'post-thumbnail'.
 */
function the_post_thumbnail_url($size = 'post-thumbnail')
{
}
/**
 * Returns the post thumbnail caption.
 *
 * @since 4.6.0
 *
 * @param int|WP_Post $post Optional. Post ID or WP_Post object. Default is global `$post`.
 * @return string Post thumbnail caption.
 */
function get_the_post_thumbnail_caption($post = \null)
{
}
/**
 * Displays the post thumbnail caption.
 *
 * @since 4.6.0
 *
 * @param int|WP_Post $post Optional. Post ID or WP_Post object. Default is global `$post`.
 */
function the_post_thumbnail_caption($post = \null)
{
}
/**
 * Core Post API
 *
 * @package WordPress
 * @subpackage Post
 */
//
// Post Type Registration
//
/**
 * Creates the initial post types when 'init' action is fired.
 *
 * See {@see 'init'}.
 *
 * @since 2.9.0
 */
function create_initial_post_types()
{
}
/**
 * Retrieve attached file path based on attachment ID.
 *
 * By default the path will go through the 'get_attached_file' filter, but
 * passing a true to the $unfiltered argument of get_attached_file() will
 * return the file path unfiltered.
 *
 * The function works by getting the single post meta name, named
 * '_wp_attached_file' and returning it. This is a convenience function to
 * prevent looking up the meta name and provide a mechanism for sending the
 * attached filename through a filter.
 *
 * @since 2.0.0
 *
 * @param int  $attachment_id Attachment ID.
 * @param bool $unfiltered    Optional. Whether to apply filters. Default false.
 * @return string|false The file path to where the attached file should be, false otherwise.
 */
function get_attached_file($attachment_id, $unfiltered = \false)
{
}
/**
 * Update attachment file path based on attachment ID.
 *
 * Used to update the file path of the attachment, which uses post meta name
 * '_wp_attached_file' to store the path of the attachment.
 *
 * @since 2.1.0
 *
 * @param int    $attachment_id Attachment ID.
 * @param string $file          File path for the attachment.
 * @return bool True on success, false on failure.
 */
function update_attached_file($attachment_id, $file)
{
}
/**
 * Return relative path to an uploaded file.
 *
 * The path is relative to the current upload dir.
 *
 * @since 2.9.0
 *
 * @param string $path Full path to the file.
 * @return string Relative path on success, unchanged path on failure.
 */
function _wp_relative_upload_path($path)
{
}
/**
 * Retrieve all children of the post parent ID.
 *
 * Normally, without any enhancements, the children would apply to pages. In the
 * context of the inner workings of WordPress, pages, posts, and attachments
 * share the same table, so therefore the functionality could apply to any one
 * of them. It is then noted that while this function does not work on posts, it
 * does not mean that it won't work on posts. It is recommended that you know
 * what context you wish to retrieve the children of.
 *
 * Attachments may also be made the child of a post, so if that is an accurate
 * statement (which needs to be verified), it would then be possible to get
 * all of the attachments for a post. Attachments have since changed since
 * version 2.5, so this is most likely inaccurate, but serves generally as an
 * example of what is possible.
 *
 * The arguments listed as defaults are for this function and also of the
 * get_posts() function. The arguments are combined with the get_children defaults
 * and are then passed to the get_posts() function, which accepts additional arguments.
 * You can replace the defaults in this function, listed below and the additional
 * arguments listed in the get_posts() function.
 *
 * The 'post_parent' is the most important argument and important attention
 * needs to be paid to the $args parameter. If you pass either an object or an
 * integer (number), then just the 'post_parent' is grabbed and everything else
 * is lost. If you don't specify any arguments, then it is assumed that you are
 * in The Loop and the post parent will be grabbed for from the current post.
 *
 * The 'post_parent' argument is the ID to get the children. The 'numberposts'
 * is the amount of posts to retrieve that has a default of '-1', which is
 * used to get all of the posts. Giving a number higher than 0 will only
 * retrieve that amount of posts.
 *
 * The 'post_type' and 'post_status' arguments can be used to choose what
 * criteria of posts to retrieve. The 'post_type' can be anything, but WordPress
 * post types are 'post', 'pages', and 'attachments'. The 'post_status'
 * argument will accept any post status within the write administration panels.
 *
 * @since 2.0.0
 *
 * @see get_posts()
 * @todo Check validity of description.
 *
 * @global WP_Post $post
 *
 * @param mixed  $args   Optional. User defined arguments for replacing the defaults. Default empty.
 * @param string $output Optional. The required return type. One of OBJECT, ARRAY_A, or ARRAY_N, which correspond to
 *                       a WP_Post object, an associative array, or a numeric array, respectively. Default OBJECT.
 * @return array Array of children, where the type of each element is determined by $output parameter.
 *               Empty array on failure.
 */
function get_children($args = '', $output = \OBJECT)
{
}
/**
 * Get extended entry info (<!--more-->).
 *
 * There should not be any space after the second dash and before the word
 * 'more'. There can be text or space(s) after the word 'more', but won't be
 * referenced.
 *
 * The returned array has 'main', 'extended', and 'more_text' keys. Main has the text before
 * the `<!--more-->`. The 'extended' key has the content after the
 * `<!--more-->` comment. The 'more_text' key has the custom "Read More" text.
 *
 * @since 1.0.0
 *
 * @param string $post Post content.
 * @return array Post before ('main'), after ('extended'), and custom read more ('more_text').
 */
function get_extended($post)
{
}
/**
 * Retrieves post data given a post ID or post object.
 *
 * See sanitize_post() for optional $filter values. Also, the parameter
 * `$post`, must be given as a variable, since it is passed by reference.
 *
 * @since 1.5.1
 *
 * @global WP_Post $post
 *
 * @param int|WP_Post|null $post   Optional. Post ID or post object. Defaults to global $post.
 * @param string           $output Optional. The required return type. One of OBJECT, ARRAY_A, or ARRAY_N, which correspond to
 *                                 a WP_Post object, an associative array, or a numeric array, respectively. Default OBJECT.
 * @param string           $filter Optional. Type of filter to apply. Accepts 'raw', 'edit', 'db',
 *                                 or 'display'. Default 'raw'.
 * @return WP_Post|array|null Type corresponding to $output on success or null on failure.
 *                            When $output is OBJECT, a `WP_Post` instance is returned.
 */
function get_post($post = \null, $output = \OBJECT, $filter = 'raw')
{
}
/**
 * Retrieve ancestors of a post.
 *
 * @since 2.5.0
 *
 * @param int|WP_Post $post Post ID or post object.
 * @return array Ancestor IDs or empty array if none are found.
 */
function get_post_ancestors($post)
{
}
/**
 * Retrieve data from a post field based on Post ID.
 *
 * Examples of the post field will be, 'post_type', 'post_status', 'post_content',
 * etc and based off of the post object property or key names.
 *
 * The context values are based off of the taxonomy filter functions and
 * supported values are found within those functions.
 *
 * @since 2.3.0
 * @since 4.5.0 The `$post` parameter was made optional.
 *
 * @see sanitize_post_field()
 *
 * @param string      $field   Post field name.
 * @param int|WP_Post $post    Optional. Post ID or post object. Defaults to current post.
 * @param string      $context Optional. How to filter the field. Accepts 'raw', 'edit', 'db',
 *                             or 'display'. Default 'display'.
 * @return string The value of the post field on success, empty string on failure.
 */
function get_post_field($field, $post = \null, $context = 'display')
{
}
/**
 * Retrieve the mime type of an attachment based on the ID.
 *
 * This function can be used with any post type, but it makes more sense with
 * attachments.
 *
 * @since 2.0.0
 *
 * @param int|WP_Post $ID Optional. Post ID or post object. Default empty.
 * @return string|false The mime type on success, false on failure.
 */
function get_post_mime_type($ID = '')
{
}
/**
 * Retrieve the post status based on the Post ID.
 *
 * If the post ID is of an attachment, then the parent post status will be given
 * instead.
 *
 * @since 2.0.0
 *
 * @param int|WP_Post $ID Optional. Post ID or post object. Default empty.
 * @return string|false Post status on success, false on failure.
 */
function get_post_status($ID = '')
{
}
/**
 * Retrieve all of the WordPress supported post statuses.
 *
 * Posts have a limited set of valid status values, this provides the
 * post_status values and descriptions.
 *
 * @since 2.5.0
 *
 * @return array List of post statuses.
 */
function get_post_statuses()
{
}
/**
 * Retrieve all of the WordPress support page statuses.
 *
 * Pages have a limited set of valid status values, this provides the
 * post_status values and descriptions.
 *
 * @since 2.5.0
 *
 * @return array List of page statuses.
 */
function get_page_statuses()
{
}
/**
 * Return statuses for privacy requests.
 *
 * @since 4.9.6
 *
 * @return array
 */
function _wp_privacy_statuses()
{
}
/**
 * Register a post status. Do not use before init.
 *
 * A simple function for creating or modifying a post status based on the
 * parameters given. The function will accept an array (second optional
 * parameter), along with a string for the post status name.
 *
 * Arguments prefixed with an _underscore shouldn't be used by plugins and themes.
 *
 * @since 3.0.0
 * @global array $wp_post_statuses Inserts new post status object into the list
 *
 * @param string $post_status Name of the post status.
 * @param array|string $args {
 *     Optional. Array or string of post status arguments.
 *
 *     @type bool|string $label                     A descriptive name for the post status marked
 *                                                  for translation. Defaults to value of $post_status.
 *     @type bool|array  $label_count               Descriptive text to use for nooped plurals.
 *                                                  Default array of $label, twice
 *     @type bool        $exclude_from_search       Whether to exclude posts with this post status
 *                                                  from search results. Default is value of $internal.
 *     @type bool        $_builtin                  Whether the status is built-in. Core-use only.
 *                                                  Default false.
 *     @type bool        $public                    Whether posts of this status should be shown
 *                                                  in the front end of the site. Default false.
 *     @type bool        $internal                  Whether the status is for internal use only.
 *                                                  Default false.
 *     @type bool        $protected                 Whether posts with this status should be protected.
 *                                                  Default false.
 *     @type bool        $private                   Whether posts with this status should be private.
 *                                                  Default false.
 *     @type bool        $publicly_queryable        Whether posts with this status should be publicly-
 *                                                  queryable. Default is value of $public.
 *     @type bool        $show_in_admin_all_list    Whether to include posts in the edit listing for
 *                                                  their post type. Default is value of $internal.
 *     @type bool        $show_in_admin_status_list Show in the list of statuses with post counts at
 *                                                  the top of the edit listings,
 *                                                  e.g. All (12) | Published (9) | My Custom Status (2)
 *                                                  Default is value of $internal.
 * }
 * @return object
 */
function register_post_status($post_status, $args = array())
{
}
/**
 * Retrieve a post status object by name.
 *
 * @since 3.0.0
 *
 * @global array $wp_post_statuses List of post statuses.
 *
 * @see register_post_status()
 *
 * @param string $post_status The name of a registered post status.
 * @return object|null A post status object.
 */
function get_post_status_object($post_status)
{
}
/**
 * Get a list of post statuses.
 *
 * @since 3.0.0
 *
 * @global array $wp_post_statuses List of post statuses.
 *
 * @see register_post_status()
 *
 * @param array|string $args     Optional. Array or string of post status arguments to compare against
 *                               properties of the global `$wp_post_statuses objects`. Default empty array.
 * @param string       $output   Optional. The type of output to return, either 'names' or 'objects'. Default 'names'.
 * @param string       $operator Optional. The logical operation to perform. 'or' means only one element
 *                               from the array needs to match; 'and' means all elements must match.
 *                               Default 'and'.
 * @return array A list of post status names or objects.
 */
function get_post_stati($args = array(), $output = 'names', $operator = 'and')
{
}
/**
 * Whether the post type is hierarchical.
 *
 * A false return value might also mean that the post type does not exist.
 *
 * @since 3.0.0
 *
 * @see get_post_type_object()
 *
 * @param string $post_type Post type name
 * @return bool Whether post type is hierarchical.
 */
function is_post_type_hierarchical($post_type)
{
}
/**
 * Check if a post type is registered.
 *
 * @since 3.0.0
 *
 * @see get_post_type_object()
 *
 * @param string $post_type Post type name.
 * @return bool Whether post type is registered.
 */
function post_type_exists($post_type)
{
}
/**
 * Retrieves the post type of the current post or of a given post.
 *
 * @since 2.1.0
 *
 * @param int|WP_Post|null $post Optional. Post ID or post object. Default is global $post.
 * @return string|false          Post type on success, false on failure.
 */
function get_post_type($post = \null)
{
}
/**
 * Retrieves a post type object by name.
 *
 * @since 3.0.0
 * @since 4.6.0 Object returned is now an instance of WP_Post_Type.
 *
 * @global array $wp_post_types List of post types.
 *
 * @see register_post_type()
 *
 * @param string $post_type The name of a registered post type.
 * @return WP_Post_Type|null WP_Post_Type object if it exists, null otherwise.
 */
function get_post_type_object($post_type)
{
}
/**
 * Get a list of all registered post type objects.
 *
 * @since 2.9.0
 *
 * @global array $wp_post_types List of post types.
 *
 * @see register_post_type() for accepted arguments.
 *
 * @param array|string $args     Optional. An array of key => value arguments to match against
 *                               the post type objects. Default empty array.
 * @param string       $output   Optional. The type of output to return. Accepts post type 'names'
 *                               or 'objects'. Default 'names'.
 * @param string       $operator Optional. The logical operation to perform. 'or' means only one
 *                               element from the array needs to match; 'and' means all elements
 *                               must match; 'not' means no elements may match. Default 'and'.
 * @return array A list of post type names or objects.
 */
function get_post_types($args = array(), $output = 'names', $operator = 'and')
{
}
/**
 * Registers a post type.
 *
 * Note: Post type registrations should not be hooked before the
 * {@see 'init'} action. Also, any taxonomy connections should be
 * registered via the `$taxonomies` argument to ensure consistency
 * when hooks such as {@see 'parse_query'} or {@see 'pre_get_posts'}
 * are used.
 *
 * Post types can support any number of built-in core features such
 * as meta boxes, custom fields, post thumbnails, post statuses,
 * comments, and more. See the `$supports` argument for a complete
 * list of supported features.
 *
 * @since 2.9.0
 * @since 3.0.0 The `show_ui` argument is now enforced on the new post screen.
 * @since 4.4.0 The `show_ui` argument is now enforced on the post type listing
 *              screen and post editing screen.
 * @since 4.6.0 Post type object returned is now an instance of WP_Post_Type.
 * @since 4.7.0 Introduced `show_in_rest`, 'rest_base' and 'rest_controller_class'
 *              arguments to register the post type in REST API.
 *
 * @global array $wp_post_types List of post types.
 *
 * @param string $post_type Post type key. Must not exceed 20 characters and may
 *                          only contain lowercase alphanumeric characters, dashes,
 *                          and underscores. See sanitize_key().
 * @param array|string $args {
 *     Array or string of arguments for registering a post type.
 *
 *     @type string      $label                 Name of the post type shown in the menu. Usually plural.
 *                                              Default is value of $labels['name'].
 *     @type array       $labels                An array of labels for this post type. If not set, post
 *                                              labels are inherited for non-hierarchical types and page
 *                                              labels for hierarchical ones. See get_post_type_labels() for a full
 *                                              list of supported labels.
 *     @type string      $description           A short descriptive summary of what the post type is.
 *                                              Default empty.
 *     @type bool        $public                Whether a post type is intended for use publicly either via
 *                                              the admin interface or by front-end users. While the default
 *                                              settings of $exclude_from_search, $publicly_queryable, $show_ui,
 *                                              and $show_in_nav_menus are inherited from public, each does not
 *                                              rely on this relationship and controls a very specific intention.
 *                                              Default false.
 *     @type bool        $hierarchical          Whether the post type is hierarchical (e.g. page). Default false.
 *     @type bool        $exclude_from_search   Whether to exclude posts with this post type from front end search
 *                                              results. Default is the opposite value of $public.
 *     @type bool        $publicly_queryable    Whether queries can be performed on the front end for the post type
 *                                              as part of parse_request(). Endpoints would include:
 *                                              * ?post_type={post_type_key}
 *                                              * ?{post_type_key}={single_post_slug}
 *                                              * ?{post_type_query_var}={single_post_slug}
 *                                              If not set, the default is inherited from $public.
 *     @type bool        $show_ui               Whether to generate and allow a UI for managing this post type in the
 *                                              admin. Default is value of $public.
 *     @type bool        $show_in_menu          Where to show the post type in the admin menu. To work, $show_ui
 *                                              must be true. If true, the post type is shown in its own top level
 *                                              menu. If false, no menu is shown. If a string of an existing top
 *                                              level menu (eg. 'tools.php' or 'edit.php?post_type=page'), the post
 *                                              type will be placed as a sub-menu of that.
 *                                              Default is value of $show_ui.
 *     @type bool        $show_in_nav_menus     Makes this post type available for selection in navigation menus.
 *                                              Default is value $public.
 *     @type bool        $show_in_admin_bar     Makes this post type available via the admin bar. Default is value
 *                                              of $show_in_menu.
 *     @type bool        $show_in_rest          Whether to add the post type route in the REST API 'wp/v2' namespace.
 *     @type string      $rest_base             To change the base url of REST API route. Default is $post_type.
 *     @type string      $rest_controller_class REST API Controller class name. Default is 'WP_REST_Posts_Controller'.
 *     @type int         $menu_position         The position in the menu order the post type should appear. To work,
 *                                              $show_in_menu must be true. Default null (at the bottom).
 *     @type string      $menu_icon             The url to the icon to be used for this menu. Pass a base64-encoded
 *                                              SVG using a data URI, which will be colored to match the color scheme
 *                                              -- this should begin with 'data:image/svg+xml;base64,'. Pass the name
 *                                              of a Dashicons helper class to use a font icon, e.g.
 *                                              'dashicons-chart-pie'. Pass 'none' to leave div.wp-menu-image empty
 *                                              so an icon can be added via CSS. Defaults to use the posts icon.
 *     @type string      $capability_type       The string to use to build the read, edit, and delete capabilities.
 *                                              May be passed as an array to allow for alternative plurals when using
 *                                              this argument as a base to construct the capabilities, e.g.
 *                                              array('story', 'stories'). Default 'post'.
 *     @type array       $capabilities          Array of capabilities for this post type. $capability_type is used
 *                                              as a base to construct capabilities by default.
 *                                              See get_post_type_capabilities().
 *     @type bool        $map_meta_cap          Whether to use the internal default meta capability handling.
 *                                              Default false.
 *     @type array       $supports              Core feature(s) the post type supports. Serves as an alias for calling
 *                                              add_post_type_support() directly. Core features include 'title',
 *                                              'editor', 'comments', 'revisions', 'trackbacks', 'author', 'excerpt',
 *                                              'page-attributes', 'thumbnail', 'custom-fields', and 'post-formats'.
 *                                              Additionally, the 'revisions' feature dictates whether the post type
 *                                              will store revisions, and the 'comments' feature dictates whether the
 *                                              comments count will show on the edit screen. Defaults is an array
 *                                              containing 'title' and 'editor'.
 *     @type callable    $register_meta_box_cb  Provide a callback function that sets up the meta boxes for the
 *                                              edit form. Do remove_meta_box() and add_meta_box() calls in the
 *                                              callback. Default null.
 *     @type array       $taxonomies            An array of taxonomy identifiers that will be registered for the
 *                                              post type. Taxonomies can be registered later with register_taxonomy()
 *                                              or register_taxonomy_for_object_type().
 *                                              Default empty array.
 *     @type bool|string $has_archive           Whether there should be post type archives, or if a string, the
 *                                              archive slug to use. Will generate the proper rewrite rules if
 *                                              $rewrite is enabled. Default false.
 *     @type bool|array  $rewrite              {
 *         Triggers the handling of rewrites for this post type. To prevent rewrite, set to false.
 *         Defaults to true, using $post_type as slug. To specify rewrite rules, an array can be
 *         passed with any of these keys:
 *
 *         @type string $slug       Customize the permastruct slug. Defaults to $post_type key.
 *         @type bool   $with_front Whether the permastruct should be prepended with WP_Rewrite::$front.
 *                                  Default true.
 *         @type bool   $feeds      Whether the feed permastruct should be built for this post type.
 *                                  Default is value of $has_archive.
 *         @type bool   $pages      Whether the permastruct should provide for pagination. Default true.
 *         @type const  $ep_mask    Endpoint mask to assign. If not specified and permalink_epmask is set,
 *                                  inherits from $permalink_epmask. If not specified and permalink_epmask
 *                                  is not set, defaults to EP_PERMALINK.
 *     }
 *     @type string|bool $query_var             Sets the query_var key for this post type. Defaults to $post_type
 *                                              key. If false, a post type cannot be loaded at
 *                                              ?{query_var}={post_slug}. If specified as a string, the query
 *                                              ?{query_var_string}={post_slug} will be valid.
 *     @type bool        $can_export            Whether to allow this post type to be exported. Default true.
 *     @type bool        $delete_with_user      Whether to delete posts of this type when deleting a user. If true,
 *                                              posts of this type belonging to the user will be moved to trash
 *                                              when then user is deleted. If false, posts of this type belonging
 *                                              to the user will *not* be trashed or deleted. If not set (the default),
 *                                              posts are trashed if post_type_supports('author'). Otherwise posts
 *                                              are not trashed or deleted. Default null.
 *     @type bool        $_builtin              FOR INTERNAL USE ONLY! True if this post type is a native or
 *                                              "built-in" post_type. Default false.
 *     @type string      $_edit_link            FOR INTERNAL USE ONLY! URL segment to use for edit link of
 *                                              this post type. Default 'post.php?post=%d'.
 * }
 * @return WP_Post_Type|WP_Error The registered post type object, or an error object.
 */
function register_post_type($post_type, $args = array())
{
}
/**
 * Unregisters a post type.
 *
 * Can not be used to unregister built-in post types.
 *
 * @since 4.5.0
 *
 * @global array $wp_post_types List of post types.
 *
 * @param string $post_type Post type to unregister.
 * @return bool|WP_Error True on success, WP_Error on failure or if the post type doesn't exist.
 */
function unregister_post_type($post_type)
{
}
/**
 * Build an object with all post type capabilities out of a post type object
 *
 * Post type capabilities use the 'capability_type' argument as a base, if the
 * capability is not set in the 'capabilities' argument array or if the
 * 'capabilities' argument is not supplied.
 *
 * The capability_type argument can optionally be registered as an array, with
 * the first value being singular and the second plural, e.g. array('story, 'stories')
 * Otherwise, an 's' will be added to the value for the plural form. After
 * registration, capability_type will always be a string of the singular value.
 *
 * By default, seven keys are accepted as part of the capabilities array:
 *
 * - edit_post, read_post, and delete_post are meta capabilities, which are then
 *   generally mapped to corresponding primitive capabilities depending on the
 *   context, which would be the post being edited/read/deleted and the user or
 *   role being checked. Thus these capabilities would generally not be granted
 *   directly to users or roles.
 *
 * - edit_posts - Controls whether objects of this post type can be edited.
 * - edit_others_posts - Controls whether objects of this type owned by other users
 *   can be edited. If the post type does not support an author, then this will
 *   behave like edit_posts.
 * - publish_posts - Controls publishing objects of this post type.
 * - read_private_posts - Controls whether private objects can be read.
 *
 * These four primitive capabilities are checked in core in various locations.
 * There are also seven other primitive capabilities which are not referenced
 * directly in core, except in map_meta_cap(), which takes the three aforementioned
 * meta capabilities and translates them into one or more primitive capabilities
 * that must then be checked against the user or role, depending on the context.
 *
 * - read - Controls whether objects of this post type can be read.
 * - delete_posts - Controls whether objects of this post type can be deleted.
 * - delete_private_posts - Controls whether private objects can be deleted.
 * - delete_published_posts - Controls whether published objects can be deleted.
 * - delete_others_posts - Controls whether objects owned by other users can be
 *   can be deleted. If the post type does not support an author, then this will
 *   behave like delete_posts.
 * - edit_private_posts - Controls whether private objects can be edited.
 * - edit_published_posts - Controls whether published objects can be edited.
 *
 * These additional capabilities are only used in map_meta_cap(). Thus, they are
 * only assigned by default if the post type is registered with the 'map_meta_cap'
 * argument set to true (default is false).
 *
 * @since 3.0.0
 *
 * @see register_post_type()
 * @see map_meta_cap()
 *
 * @param object $args Post type registration arguments.
 * @return object Object with all the capabilities as member variables.
 */
function get_post_type_capabilities($args)
{
}
/**
 * Store or return a list of post type meta caps for map_meta_cap().
 *
 * @since 3.1.0
 * @access private
 *
 * @global array $post_type_meta_caps Used to store meta capabilities.
 *
 * @param array $capabilities Post type meta capabilities.
 */
function _post_type_meta_capabilities($capabilities = \null)
{
}
/**
 * Builds an object with all post type labels out of a post type object.
 *
 * Accepted keys of the label array in the post type object:
 *
 * - `name` - General name for the post type, usually plural. The same and overridden
 *          by `$post_type_object->label`. Default is 'Posts' / 'Pages'.
 * - `singular_name` - Name for one object of this post type. Default is 'Post' / 'Page'.
 * - `add_new` - Default is 'Add New' for both hierarchical and non-hierarchical types.
 *             When internationalizing this string, please use a {@link https://codex.wordpress.org/I18n_for_WordPress_Developers#Disambiguation_by_context gettext context}
 *             matching your post type. Example: `_x( 'Add New', 'product', 'textdomain' );`.
 * - `add_new_item` - Label for adding a new singular item. Default is 'Add New Post' / 'Add New Page'.
 * - `edit_item` - Label for editing a singular item. Default is 'Edit Post' / 'Edit Page'.
 * - `new_item` - Label for the new item page title. Default is 'New Post' / 'New Page'.
 * - `view_item` - Label for viewing a singular item. Default is 'View Post' / 'View Page'.
 * - `view_items` - Label for viewing post type archives. Default is 'View Posts' / 'View Pages'.
 * - `search_items` - Label for searching plural items. Default is 'Search Posts' / 'Search Pages'.
 * - `not_found` - Label used when no items are found. Default is 'No posts found' / 'No pages found'.
 * - `not_found_in_trash` - Label used when no items are in the trash. Default is 'No posts found in Trash' /
 *                        'No pages found in Trash'.
 * - `parent_item_colon` - Label used to prefix parents of hierarchical items. Not used on non-hierarchical
 *                       post types. Default is 'Parent Page:'.
 * - `all_items` - Label to signify all items in a submenu link. Default is 'All Posts' / 'All Pages'.
 * - `archives` - Label for archives in nav menus. Default is 'Post Archives' / 'Page Archives'.
 * - `attributes` - Label for the attributes meta box. Default is 'Post Attributes' / 'Page Attributes'.
 * - `insert_into_item` - Label for the media frame button. Default is 'Insert into post' / 'Insert into page'.
 * - `uploaded_to_this_item` - Label for the media frame filter. Default is 'Uploaded to this post' /
 *                           'Uploaded to this page'.
 * - `featured_image` - Label for the Featured Image meta box title. Default is 'Featured Image'.
 * - `set_featured_image` - Label for setting the featured image. Default is 'Set featured image'.
 * - `remove_featured_image` - Label for removing the featured image. Default is 'Remove featured image'.
 * - `use_featured_image` - Label in the media frame for using a featured image. Default is 'Use as featured image'.
 * - `menu_name` - Label for the menu name. Default is the same as `name`.
 * - `filter_items_list` - Label for the table views hidden heading. Default is 'Filter posts list' /
 *                       'Filter pages list'.
 * - `items_list_navigation` - Label for the table pagination hidden heading. Default is 'Posts list navigation' /
 *                           'Pages list navigation'.
 * - `items_list` - Label for the table hidden heading. Default is 'Posts list' / 'Pages list'.
 *
 * Above, the first default value is for non-hierarchical post types (like posts)
 * and the second one is for hierarchical post types (like pages).
 *
 * Note: To set labels used in post type admin notices, see the {@see 'post_updated_messages'} filter.
 *
 * @since 3.0.0
 * @since 4.3.0 Added the `featured_image`, `set_featured_image`, `remove_featured_image`,
 *              and `use_featured_image` labels.
 * @since 4.4.0 Added the `archives`, `insert_into_item`, `uploaded_to_this_item`, `filter_items_list`,
 *              `items_list_navigation`, and `items_list` labels.
 * @since 4.6.0 Converted the `$post_type` parameter to accept a WP_Post_Type object.
 * @since 4.7.0 Added the `view_items` and `attributes` labels.
 *
 * @access private
 *
 * @param object|WP_Post_Type $post_type_object Post type object.
 * @return object Object with all the labels as member variables.
 */
function get_post_type_labels($post_type_object)
{
}
/**
 * Build an object with custom-something object (post type, taxonomy) labels
 * out of a custom-something object
 *
 * @since 3.0.0
 * @access private
 *
 * @param object $object                  A custom-something object.
 * @param array  $nohier_vs_hier_defaults Hierarchical vs non-hierarchical default labels.
 * @return object Object containing labels for the given custom-something object.
 */
function _get_custom_object_labels($object, $nohier_vs_hier_defaults)
{
}
/**
 * Add submenus for post types.
 *
 * @access private
 * @since 3.1.0
 */
function _add_post_type_submenus()
{
}
/**
 * Register support of certain features for a post type.
 *
 * All core features are directly associated with a functional area of the edit
 * screen, such as the editor or a meta box. Features include: 'title', 'editor',
 * 'comments', 'revisions', 'trackbacks', 'author', 'excerpt', 'page-attributes',
 * 'thumbnail', 'custom-fields', and 'post-formats'.
 *
 * Additionally, the 'revisions' feature dictates whether the post type will
 * store revisions, and the 'comments' feature dictates whether the comments
 * count will show on the edit screen.
 *
 * @since 3.0.0
 *
 * @global array $_wp_post_type_features
 *
 * @param string       $post_type The post type for which to add the feature.
 * @param string|array $feature   The feature being added, accepts an array of
 *                                feature strings or a single string.
 */
function add_post_type_support($post_type, $feature)
{
}
/**
 * Remove support for a feature from a post type.
 *
 * @since 3.0.0
 *
 * @global array $_wp_post_type_features
 *
 * @param string $post_type The post type for which to remove the feature.
 * @param string $feature   The feature being removed.
 */
function remove_post_type_support($post_type, $feature)
{
}
/**
 * Get all the post type features
 *
 * @since 3.4.0
 *
 * @global array $_wp_post_type_features
 *
 * @param string $post_type The post type.
 * @return array Post type supports list.
 */
function get_all_post_type_supports($post_type)
{
}
/**
 * Check a post type's support for a given feature.
 *
 * @since 3.0.0
 *
 * @global array $_wp_post_type_features
 *
 * @param string $post_type The post type being checked.
 * @param string $feature   The feature being checked.
 * @return bool Whether the post type supports the given feature.
 */
function post_type_supports($post_type, $feature)
{
}
/**
 * Retrieves a list of post type names that support a specific feature.
 *
 * @since 4.5.0
 *
 * @global array $_wp_post_type_features Post type features
 *
 * @param array|string $feature  Single feature or an array of features the post types should support.
 * @param string       $operator Optional. The logical operation to perform. 'or' means
 *                               only one element from the array needs to match; 'and'
 *                               means all elements must match; 'not' means no elements may
 *                               match. Default 'and'.
 * @return array A list of post type names.
 */
function get_post_types_by_support($feature, $operator = 'and')
{
}
/**
 * Update the post type for the post ID.
 *
 * The page or post cache will be cleaned for the post ID.
 *
 * @since 2.5.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param int    $post_id   Optional. Post ID to change post type. Default 0.
 * @param string $post_type Optional. Post type. Accepts 'post' or 'page' to
 *                          name a few. Default 'post'.
 * @return int|false Amount of rows changed. Should be 1 for success and 0 for failure.
 */
function set_post_type($post_id = 0, $post_type = 'post')
{
}
/**
 * Determines whether a post type is considered "viewable".
 *
 * For built-in post types such as posts and pages, the 'public' value will be evaluated.
 * For all others, the 'publicly_queryable' value will be used.
 *
 * @since 4.4.0
 * @since 4.5.0 Added the ability to pass a post type name in addition to object.
 * @since 4.6.0 Converted the `$post_type` parameter to accept a WP_Post_Type object.
 *
 * @param string|WP_Post_Type $post_type Post type name or object.
 * @return bool Whether the post type should be considered viewable.
 */
function is_post_type_viewable($post_type)
{
}
/**
 * Retrieve list of latest posts or posts matching criteria.
 *
 * The defaults are as follows:
 *
 * @since 1.2.0
 *
 * @see WP_Query::parse_query()
 *
 * @param array $args {
 *     Optional. Arguments to retrieve posts. See WP_Query::parse_query() for all
 *     available arguments.
 *
 *     @type int        $numberposts      Total number of posts to retrieve. Is an alias of $posts_per_page
 *                                        in WP_Query. Accepts -1 for all. Default 5.
 *     @type int|string $category         Category ID or comma-separated list of IDs (this or any children).
 *                                        Is an alias of $cat in WP_Query. Default 0.
 *     @type array      $include          An array of post IDs to retrieve, sticky posts will be included.
 *                                        Is an alias of $post__in in WP_Query. Default empty array.
 *     @type array      $exclude          An array of post IDs not to retrieve. Default empty array.
 *     @type bool       $suppress_filters Whether to suppress filters. Default true.
 * }
 * @return array List of posts.
 */
function get_posts($args = \null)
{
}
//
// Post meta functions
//
/**
 * Add meta data field to a post.
 *
 * Post meta data is called "Custom Fields" on the Administration Screen.
 *
 * @since 1.5.0
 *
 * @param int    $post_id    Post ID.
 * @param string $meta_key   Metadata name.
 * @param mixed  $meta_value Metadata value. Must be serializable if non-scalar.
 * @param bool   $unique     Optional. Whether the same key should not be added.
 *                           Default false.
 * @return int|false Meta ID on success, false on failure.
 */
function add_post_meta($post_id, $meta_key, $meta_value, $unique = \false)
{
}
/**
 * Remove metadata matching criteria from a post.
 *
 * You can match based on the key, or key and value. Removing based on key and
 * value, will keep from removing duplicate metadata with the same key. It also
 * allows removing all metadata matching key, if needed.
 *
 * @since 1.5.0
 *
 * @param int    $post_id    Post ID.
 * @param string $meta_key   Metadata name.
 * @param mixed  $meta_value Optional. Metadata value. Must be serializable if
 *                           non-scalar. Default empty.
 * @return bool True on success, false on failure.
 */
function delete_post_meta($post_id, $meta_key, $meta_value = '')
{
}
/**
 * Retrieve post meta field for a post.
 *
 * @since 1.5.0
 *
 * @param int    $post_id Post ID.
 * @param string $key     Optional. The meta key to retrieve. By default, returns
 *                        data for all keys. Default empty.
 * @param bool   $single  Optional. Whether to return a single value. Default false.
 * @return mixed Will be an array if $single is false. Will be value of meta data
 *               field if $single is true.
 */
function get_post_meta($post_id, $key = '', $single = \false)
{
}
/**
 * Update post meta field based on post ID.
 *
 * Use the $prev_value parameter to differentiate between meta fields with the
 * same key and post ID.
 *
 * If the meta field for the post does not exist, it will be added.
 *
 * @since 1.5.0
 *
 * @param int    $post_id    Post ID.
 * @param string $meta_key   Metadata key.
 * @param mixed  $meta_value Metadata value. Must be serializable if non-scalar.
 * @param mixed  $prev_value Optional. Previous value to check before removing.
 *                           Default empty.
 * @return int|bool Meta ID if the key didn't exist, true on successful update,
 *                  false on failure.
 */
function update_post_meta($post_id, $meta_key, $meta_value, $prev_value = '')
{
}
/**
 * Delete everything from post meta matching meta key.
 *
 * @since 2.3.0
 *
 * @param string $post_meta_key Key to search for when deleting.
 * @return bool Whether the post meta key was deleted from the database.
 */
function delete_post_meta_by_key($post_meta_key)
{
}
/**
 * Registers a meta key for posts.
 *
 * @since 4.9.8
 *
 * @param string $post_type Post type to register a meta key for. Pass an empty string
 *                          to register the meta key across all existing post types.
 * @param string $meta_key  The meta key to register.
 * @param array  $args      Data used to describe the meta key when registered. See
 *                          {@see register_meta()} for a list of supported arguments.
 * @return bool True if the meta key was successfully registered, false if not.
 */
function register_post_meta($post_type, $meta_key, array $args)
{
}
/**
 * Unregisters a meta key for posts.
 *
 * @since 4.9.8
 *
 * @param string $post_type Post type the meta key is currently registered for. Pass
 *                          an empty string if the meta key is registered across all
 *                          existing post types.
 * @param string $meta_key  The meta key to unregister.
 * @return bool True on success, false if the meta key was not previously registered.
 */
function unregister_post_meta($post_type, $meta_key)
{
}
/**
 * Retrieve post meta fields, based on post ID.
 *
 * The post meta fields are retrieved from the cache where possible,
 * so the function is optimized to be called more than once.
 *
 * @since 1.2.0
 *
 * @param int $post_id Optional. Post ID. Default is ID of the global $post.
 * @return array Post meta for the given post.
 */
function get_post_custom($post_id = 0)
{
}
/**
 * Retrieve meta field names for a post.
 *
 * If there are no meta fields, then nothing (null) will be returned.
 *
 * @since 1.2.0
 *
 * @param int $post_id Optional. Post ID. Default is ID of the global $post.
 * @return array|void Array of the keys, if retrieved.
 */
function get_post_custom_keys($post_id = 0)
{
}
/**
 * Retrieve values for a custom post field.
 *
 * The parameters must not be considered optional. All of the post meta fields
 * will be retrieved and only the meta field key values returned.
 *
 * @since 1.2.0
 *
 * @param string $key     Optional. Meta field key. Default empty.
 * @param int    $post_id Optional. Post ID. Default is ID of the global $post.
 * @return array|null Meta field values.
 */
function get_post_custom_values($key = '', $post_id = 0)
{
}
/**
 * Check if post is sticky.
 *
 * Sticky posts should remain at the top of The Loop. If the post ID is not
 * given, then The Loop ID for the current post will be used.
 *
 * @since 2.7.0
 *
 * @param int $post_id Optional. Post ID. Default is ID of the global $post.
 * @return bool Whether post is sticky.
 */
function is_sticky($post_id = 0)
{
}
/**
 * Sanitize every post field.
 *
 * If the context is 'raw', then the post object or array will get minimal
 * sanitization of the integer fields.
 *
 * @since 2.3.0
 *
 * @see sanitize_post_field()
 *
 * @param object|WP_Post|array $post    The Post Object or Array
 * @param string               $context Optional. How to sanitize post fields.
 *                                      Accepts 'raw', 'edit', 'db', or 'display'.
 *                                      Default 'display'.
 * @return object|WP_Post|array The now sanitized Post Object or Array (will be the
 *                              same type as $post).
 */
function sanitize_post($post, $context = 'display')
{
}
/**
 * Sanitize post field based on context.
 *
 * Possible context values are:  'raw', 'edit', 'db', 'display', 'attribute' and
 * 'js'. The 'display' context is used by default. 'attribute' and 'js' contexts
 * are treated like 'display' when calling filters.
 *
 * @since 2.3.0
 * @since 4.4.0 Like `sanitize_post()`, `$context` defaults to 'display'.
 *
 * @param string $field   The Post Object field name.
 * @param mixed  $value   The Post Object value.
 * @param int    $post_id Post ID.
 * @param string $context Optional. How to sanitize post fields. Looks for 'raw', 'edit',
 *                        'db', 'display', 'attribute' and 'js'. Default 'display'.
 * @return mixed Sanitized value.
 */
function sanitize_post_field($field, $value, $post_id, $context = 'display')
{
}
/**
 * Make a post sticky.
 *
 * Sticky posts should be displayed at the top of the front page.
 *
 * @since 2.7.0
 *
 * @param int $post_id Post ID.
 */
function stick_post($post_id)
{
}
/**
 * Un-stick a post.
 *
 * Sticky posts should be displayed at the top of the front page.
 *
 * @since 2.7.0
 *
 * @param int $post_id Post ID.
 */
function unstick_post($post_id)
{
}
/**
 * Return the cache key for wp_count_posts() based on the passed arguments.
 *
 * @since 3.9.0
 *
 * @param string $type Optional. Post type to retrieve count Default 'post'.
 * @param string $perm Optional. 'readable' or empty. Default empty.
 * @return string The cache key.
 */
function _count_posts_cache_key($type = 'post', $perm = '')
{
}
/**
 * Count number of posts of a post type and if user has permissions to view.
 *
 * This function provides an efficient method of finding the amount of post's
 * type a blog has. Another method is to count the amount of items in
 * get_posts(), but that method has a lot of overhead with doing so. Therefore,
 * when developing for 2.5+, use this function instead.
 *
 * The $perm parameter checks for 'readable' value and if the user can read
 * private posts, it will display that for the user that is signed in.
 *
 * @since 2.5.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param string $type Optional. Post type to retrieve count. Default 'post'.
 * @param string $perm Optional. 'readable' or empty. Default empty.
 * @return object Number of posts for each status.
 */
function wp_count_posts($type = 'post', $perm = '')
{
}
/**
 * Count number of attachments for the mime type(s).
 *
 * If you set the optional mime_type parameter, then an array will still be
 * returned, but will only have the item you are looking for. It does not give
 * you the number of attachments that are children of a post. You can get that
 * by counting the number of children that post has.
 *
 * @since 2.5.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param string|array $mime_type Optional. Array or comma-separated list of
 *                                MIME patterns. Default empty.
 * @return object An object containing the attachment counts by mime type.
 */
function wp_count_attachments($mime_type = '')
{
}
/**
 * Get default post mime types.
 *
 * @since 2.9.0
 *
 * @return array List of post mime types.
 */
function get_post_mime_types()
{
}
/**
 * Check a MIME-Type against a list.
 *
 * If the wildcard_mime_types parameter is a string, it must be comma separated
 * list. If the real_mime_types is a string, it is also comma separated to
 * create the list.
 *
 * @since 2.5.0
 *
 * @param string|array $wildcard_mime_types Mime types, e.g. audio/mpeg or image (same as image/*)
 *                                          or flash (same as *flash*).
 * @param string|array $real_mime_types     Real post mime type values.
 * @return array array(wildcard=>array(real types)).
 */
function wp_match_mime_types($wildcard_mime_types, $real_mime_types)
{
}
/**
 * Convert MIME types into SQL.
 *
 * @since 2.5.0
 *
 * @param string|array $post_mime_types List of mime types or comma separated string
 *                                      of mime types.
 * @param string       $table_alias     Optional. Specify a table alias, if needed.
 *                                      Default empty.
 * @return string The SQL AND clause for mime searching.
 */
function wp_post_mime_type_where($post_mime_types, $table_alias = '')
{
}
/**
 * Trash or delete a post or page.
 *
 * When the post and page is permanently deleted, everything that is tied to
 * it is deleted also. This includes comments, post meta fields, and terms
 * associated with the post.
 *
 * The post or page is moved to trash instead of permanently deleted unless
 * trash is disabled, item is already in the trash, or $force_delete is true.
 *
 * @since 1.0.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 * @see wp_delete_attachment()
 * @see wp_trash_post()
 *
 * @param int  $postid       Optional. Post ID. Default 0.
 * @param bool $force_delete Optional. Whether to bypass trash and force deletion.
 *                           Default false.
 * @return WP_Post|false|null Post data on success, false or null on failure.
 */
function wp_delete_post($postid = 0, $force_delete = \false)
{
}
/**
 * Reset the page_on_front, show_on_front, and page_for_post settings when
 * a linked page is deleted or trashed.
 *
 * Also ensures the post is no longer sticky.
 *
 * @since 3.7.0
 * @access private
 *
 * @param int $post_id Post ID.
 */
function _reset_front_page_settings_for_post($post_id)
{
}
/**
 * Move a post or page to the Trash
 *
 * If trash is disabled, the post or page is permanently deleted.
 *
 * @since 2.9.0
 *
 * @see wp_delete_post()
 *
 * @param int $post_id Optional. Post ID. Default is ID of the global $post
 *                     if EMPTY_TRASH_DAYS equals true.
 * @return WP_Post|false|null Post data on success, false or null on failure.
 */
function wp_trash_post($post_id = 0)
{
}
/**
 * Restore a post or page from the Trash.
 *
 * @since 2.9.0
 *
 * @param int $post_id Optional. Post ID. Default is ID of the global $post.
 * @return WP_Post|false|null Post data on success, false or null on failure.
 */
function wp_untrash_post($post_id = 0)
{
}
/**
 * Moves comments for a post to the trash.
 *
 * @since 2.9.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param int|WP_Post|null $post Optional. Post ID or post object. Defaults to global $post.
 * @return mixed|void False on failure.
 */
function wp_trash_post_comments($post = \null)
{
}
/**
 * Restore comments for a post from the trash.
 *
 * @since 2.9.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param int|WP_Post|null $post Optional. Post ID or post object. Defaults to global $post.
 * @return true|void
 */
function wp_untrash_post_comments($post = \null)
{
}
/**
 * Retrieve the list of categories for a post.
 *
 * Compatibility layer for themes and plugins. Also an easy layer of abstraction
 * away from the complexity of the taxonomy layer.
 *
 * @since 2.1.0
 *
 * @see wp_get_object_terms()
 *
 * @param int   $post_id Optional. The Post ID. Does not default to the ID of the
 *                       global $post. Default 0.
 * @param array $args    Optional. Category query parameters. Default empty array.
 *                       See WP_Term_Query::__construct() for supported arguments.
 * @return array|WP_Error List of categories. If the `$fields` argument passed via `$args` is 'all' or
 *                        'all_with_object_id', an array of WP_Term objects will be returned. If `$fields`
 *                        is 'ids', an array of category ids. If `$fields` is 'names', an array of category names.
 *                        WP_Error object if 'category' taxonomy doesn't exist.
 */
function wp_get_post_categories($post_id = 0, $args = array())
{
}
/**
 * Retrieve the tags for a post.
 *
 * There is only one default for this function, called 'fields' and by default
 * is set to 'all'. There are other defaults that can be overridden in
 * wp_get_object_terms().
 *
 * @since 2.3.0
 *
 * @param int   $post_id Optional. The Post ID. Does not default to the ID of the
 *                       global $post. Default 0.
 * @param array $args    Optional. Tag query parameters. Default empty array.
 *                       See WP_Term_Query::__construct() for supported arguments.
 * @return array|WP_Error Array of WP_Term objects on success or empty array if no tags were found.
 *                        WP_Error object if 'post_tag' taxonomy doesn't exist.
 */
function wp_get_post_tags($post_id = 0, $args = array())
{
}
/**
 * Retrieves the terms for a post.
 *
 * @since 2.8.0
 *
 * @param int          $post_id  Optional. The Post ID. Does not default to the ID of the
 *                               global $post. Default 0.
 * @param string|array $taxonomy Optional. The taxonomy slug or array of slugs for which
 *                               to retrieve terms. Default 'post_tag'.
 * @param array        $args     {
 *     Optional. Term query parameters. See WP_Term_Query::__construct() for supported arguments.
 *
 *     @type string $fields Term fields to retrieve. Default 'all'.
 * }
 * @return array|WP_Error Array of WP_Term objects on success or empty array if no terms were found.
 *                        WP_Error object if `$taxonomy` doesn't exist.
 */
function wp_get_post_terms($post_id = 0, $taxonomy = 'post_tag', $args = array())
{
}
/**
 * Retrieve a number of recent posts.
 *
 * @since 1.0.0
 *
 * @see get_posts()
 *
 * @param array  $args   Optional. Arguments to retrieve posts. Default empty array.
 * @param string $output Optional. The required return type. One of OBJECT or ARRAY_A, which correspond to
 *                       a WP_Post object or an associative array, respectively. Default ARRAY_A.
 * @return array|false Array of recent posts, where the type of each element is determined by $output parameter.
 *                     Empty array on failure.
 */
function wp_get_recent_posts($args = array(), $output = \ARRAY_A)
{
}
/**
 * Insert or update a post.
 *
 * If the $postarr parameter has 'ID' set to a value, then post will be updated.
 *
 * You can set the post date manually, by setting the values for 'post_date'
 * and 'post_date_gmt' keys. You can close the comments or open the comments by
 * setting the value for 'comment_status' key.
 *
 * @since 1.0.0
 * @since 4.2.0 Support was added for encoding emoji in the post title, content, and excerpt.
 * @since 4.4.0 A 'meta_input' array can now be passed to `$postarr` to add post meta data.
 *
 * @see sanitize_post()
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param array $postarr {
 *     An array of elements that make up a post to update or insert.
 *
 *     @type int    $ID                    The post ID. If equal to something other than 0,
 *                                         the post with that ID will be updated. Default 0.
 *     @type int    $post_author           The ID of the user who added the post. Default is
 *                                         the current user ID.
 *     @type string $post_date             The date of the post. Default is the current time.
 *     @type string $post_date_gmt         The date of the post in the GMT timezone. Default is
 *                                         the value of `$post_date`.
 *     @type mixed  $post_content          The post content. Default empty.
 *     @type string $post_content_filtered The filtered post content. Default empty.
 *     @type string $post_title            The post title. Default empty.
 *     @type string $post_excerpt          The post excerpt. Default empty.
 *     @type string $post_status           The post status. Default 'draft'.
 *     @type string $post_type             The post type. Default 'post'.
 *     @type string $comment_status        Whether the post can accept comments. Accepts 'open' or 'closed'.
 *                                         Default is the value of 'default_comment_status' option.
 *     @type string $ping_status           Whether the post can accept pings. Accepts 'open' or 'closed'.
 *                                         Default is the value of 'default_ping_status' option.
 *     @type string $post_password         The password to access the post. Default empty.
 *     @type string $post_name             The post name. Default is the sanitized post title
 *                                         when creating a new post.
 *     @type string $to_ping               Space or carriage return-separated list of URLs to ping.
 *                                         Default empty.
 *     @type string $pinged                Space or carriage return-separated list of URLs that have
 *                                         been pinged. Default empty.
 *     @type string $post_modified         The date when the post was last modified. Default is
 *                                         the current time.
 *     @type string $post_modified_gmt     The date when the post was last modified in the GMT
 *                                         timezone. Default is the current time.
 *     @type int    $post_parent           Set this for the post it belongs to, if any. Default 0.
 *     @type int    $menu_order            The order the post should be displayed in. Default 0.
 *     @type string $post_mime_type        The mime type of the post. Default empty.
 *     @type string $guid                  Global Unique ID for referencing the post. Default empty.
 *     @type array  $post_category         Array of category names, slugs, or IDs.
 *                                         Defaults to value of the 'default_category' option.
 *     @type array  $tags_input            Array of tag names, slugs, or IDs. Default empty.
 *     @type array  $tax_input             Array of taxonomy terms keyed by their taxonomy name. Default empty.
 *     @type array  $meta_input            Array of post meta values keyed by their post meta key. Default empty.
 * }
 * @param bool  $wp_error Optional. Whether to return a WP_Error on failure. Default false.
 * @return int|WP_Error The post ID on success. The value 0 or WP_Error on failure.
 */
function wp_insert_post($postarr, $wp_error = \false)
{
}
/**
 * Update a post with new post data.
 *
 * The date does not have to be set for drafts. You can set the date and it will
 * not be overridden.
 *
 * @since 1.0.0
 *
 * @param array|object $postarr  Optional. Post data. Arrays are expected to be escaped,
 *                               objects are not. Default array.
 * @param bool         $wp_error Optional. Allow return of WP_Error on failure. Default false.
 * @return int|WP_Error The value 0 or WP_Error on failure. The post ID on success.
 */
function wp_update_post($postarr = array(), $wp_error = \false)
{
}
/**
 * Publish a post by transitioning the post status.
 *
 * @since 2.1.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param int|WP_Post $post Post ID or post object.
 */
function wp_publish_post($post)
{
}
/**
 * Publish future post and make sure post ID has future post status.
 *
 * Invoked by cron 'publish_future_post' event. This safeguard prevents cron
 * from publishing drafts, etc.
 *
 * @since 2.5.0
 *
 * @param int|WP_Post $post_id Post ID or post object.
 */
function check_and_publish_future_post($post_id)
{
}
/**
 * Computes a unique slug for the post, when given the desired slug and some post details.
 *
 * @since 2.8.0
 *
 * @global wpdb       $wpdb WordPress database abstraction object.
 * @global WP_Rewrite $wp_rewrite
 *
 * @param string $slug        The desired slug (post_name).
 * @param int    $post_ID     Post ID.
 * @param string $post_status No uniqueness checks are made if the post is still draft or pending.
 * @param string $post_type   Post type.
 * @param int    $post_parent Post parent ID.
 * @return string Unique slug for the post, based on $post_name (with a -1, -2, etc. suffix)
 */
function wp_unique_post_slug($slug, $post_ID, $post_status, $post_type, $post_parent)
{
}
/**
 * Truncate a post slug.
 *
 * @since 3.6.0
 * @access private
 *
 * @see utf8_uri_encode()
 *
 * @param string $slug   The slug to truncate.
 * @param int    $length Optional. Max length of the slug. Default 200 (characters).
 * @return string The truncated slug.
 */
function _truncate_post_slug($slug, $length = 200)
{
}
/**
 * Add tags to a post.
 *
 * @see wp_set_post_tags()
 *
 * @since 2.3.0
 *
 * @param int          $post_id Optional. The Post ID. Does not default to the ID of the global $post.
 * @param string|array $tags    Optional. An array of tags to set for the post, or a string of tags
 *                              separated by commas. Default empty.
 * @return array|false|WP_Error Array of affected term IDs. WP_Error or false on failure.
 */
function wp_add_post_tags($post_id = 0, $tags = '')
{
}
/**
 * Set the tags for a post.
 *
 * @since 2.3.0
 *
 * @see wp_set_object_terms()
 *
 * @param int          $post_id Optional. The Post ID. Does not default to the ID of the global $post.
 * @param string|array $tags    Optional. An array of tags to set for the post, or a string of tags
 *                              separated by commas. Default empty.
 * @param bool         $append  Optional. If true, don't delete existing tags, just add on. If false,
 *                              replace the tags with the new tags. Default false.
 * @return array|false|WP_Error Array of term taxonomy IDs of affected terms. WP_Error or false on failure.
 */
function wp_set_post_tags($post_id = 0, $tags = '', $append = \false)
{
}
/**
 * Set the terms for a post.
 *
 * @since 2.8.0
 *
 * @see wp_set_object_terms()
 *
 * @param int          $post_id  Optional. The Post ID. Does not default to the ID of the global $post.
 * @param string|array $tags     Optional. An array of terms to set for the post, or a string of terms
 *                               separated by commas. Default empty.
 * @param string       $taxonomy Optional. Taxonomy name. Default 'post_tag'.
 * @param bool         $append   Optional. If true, don't delete existing terms, just add on. If false,
 *                               replace the terms with the new terms. Default false.
 * @return array|false|WP_Error Array of term taxonomy IDs of affected terms. WP_Error or false on failure.
 */
function wp_set_post_terms($post_id = 0, $tags = '', $taxonomy = 'post_tag', $append = \false)
{
}
/**
 * Set categories for a post.
 *
 * If the post categories parameter is not set, then the default category is
 * going used.
 *
 * @since 2.1.0
 *
 * @param int       $post_ID         Optional. The Post ID. Does not default to the ID
 *                                   of the global $post. Default 0.
 * @param array|int $post_categories Optional. List of categories or ID of category.
 *                                   Default empty array.
 * @param bool      $append         If true, don't delete existing categories, just add on.
 *                                  If false, replace the categories with the new categories.
 * @return array|false|WP_Error Array of term taxonomy IDs of affected categories. WP_Error or false on failure.
 */
function wp_set_post_categories($post_ID = 0, $post_categories = array(), $append = \false)
{
}
/**
 * Fires actions related to the transitioning of a post's status.
 *
 * When a post is saved, the post status is "transitioned" from one status to another,
 * though this does not always mean the status has actually changed before and after
 * the save. This function fires a number of action hooks related to that transition:
 * the generic {@see 'transition_post_status'} action, as well as the dynamic hooks
 * {@see '$old_status_to_$new_status'} and {@see '$new_status_$post->post_type'}. Note
 * that the function does not transition the post object in the database.
 *
 * For instance: When publishing a post for the first time, the post status may transition
 * from 'draft' – or some other status – to 'publish'. However, if a post is already
 * published and is simply being updated, the "old" and "new" statuses may both be 'publish'
 * before and after the transition.
 *
 * @since 2.3.0
 *
 * @param string  $new_status Transition to this post status.
 * @param string  $old_status Previous post status.
 * @param WP_Post $post Post data.
 */
function wp_transition_post_status($new_status, $old_status, $post)
{
}
//
// Comment, trackback, and pingback functions.
//
/**
 * Add a URL to those already pinged.
 *
 * @since 1.5.0
 * @since 4.7.0 $post_id can be a WP_Post object.
 * @since 4.7.0 $uri can be an array of URIs.
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param int|WP_Post  $post_id Post object or ID.
 * @param string|array $uri     Ping URI or array of URIs.
 * @return int|false How many rows were updated.
 */
function add_ping($post_id, $uri)
{
}
/**
 * Retrieve enclosures already enclosed for a post.
 *
 * @since 1.5.0
 *
 * @param int $post_id Post ID.
 * @return array List of enclosures.
 */
function get_enclosed($post_id)
{
}
/**
 * Retrieve URLs already pinged for a post.
 *
 * @since 1.5.0
 *
 * @since 4.7.0 $post_id can be a WP_Post object.
 *
 * @param int|WP_Post $post_id Post ID or object.
 * @return array
 */
function get_pung($post_id)
{
}
/**
 * Retrieve URLs that need to be pinged.
 *
 * @since 1.5.0
 * @since 4.7.0 $post_id can be a WP_Post object.
 *
 * @param int|WP_Post $post_id Post Object or ID
 * @return array
 */
function get_to_ping($post_id)
{
}
/**
 * Do trackbacks for a list of URLs.
 *
 * @since 1.0.0
 *
 * @param string $tb_list Comma separated list of URLs.
 * @param int    $post_id Post ID.
 */
function trackback_url_list($tb_list, $post_id)
{
}
//
// Page functions
//
/**
 * Get a list of page IDs.
 *
 * @since 2.0.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @return array List of page IDs.
 */
function get_all_page_ids()
{
}
/**
 * Retrieves page data given a page ID or page object.
 *
 * Use get_post() instead of get_page().
 *
 * @since 1.5.1
 * @deprecated 3.5.0 Use get_post()
 *
 * @param mixed  $page   Page object or page ID. Passed by reference.
 * @param string $output Optional. The required return type. One of OBJECT, ARRAY_A, or ARRAY_N, which correspond to
 *                       a WP_Post object, an associative array, or a numeric array, respectively. Default OBJECT.
 * @param string $filter Optional. How the return value should be filtered. Accepts 'raw',
 *                       'edit', 'db', 'display'. Default 'raw'.
 * @return WP_Post|array|null WP_Post (or array) on success, or null on failure.
 */
function get_page($page, $output = \OBJECT, $filter = 'raw')
{
}
/**
 * Retrieves a page given its path.
 *
 * @since 2.1.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param string       $page_path Page path.
 * @param string       $output    Optional. The required return type. One of OBJECT, ARRAY_A, or ARRAY_N, which correspond to
 *                                a WP_Post object, an associative array, or a numeric array, respectively. Default OBJECT.
 * @param string|array $post_type Optional. Post type or array of post types. Default 'page'.
 * @return WP_Post|array|null WP_Post (or array) on success, or null on failure.
 */
function get_page_by_path($page_path, $output = \OBJECT, $post_type = 'page')
{
}
/**
 * Retrieve a page given its title.
 *
 * @since 2.1.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param string       $page_title Page title
 * @param string       $output     Optional. The required return type. One of OBJECT, ARRAY_A, or ARRAY_N, which correspond to
 *                                 a WP_Post object, an associative array, or a numeric array, respectively. Default OBJECT.
 * @param string|array $post_type  Optional. Post type or array of post types. Default 'page'.
 * @return WP_Post|array|null WP_Post (or array) on success, or null on failure.
 */
function get_page_by_title($page_title, $output = \OBJECT, $post_type = 'page')
{
}
/**
 * Identify descendants of a given page ID in a list of page objects.
 *
 * Descendants are identified from the `$pages` array passed to the function. No database queries are performed.
 *
 * @since 1.5.1
 *
 * @param int   $page_id Page ID.
 * @param array $pages   List of page objects from which descendants should be identified.
 * @return array List of page children.
 */
function get_page_children($page_id, $pages)
{
}
/**
 * Order the pages with children under parents in a flat list.
 *
 * It uses auxiliary structure to hold parent-children relationships and
 * runs in O(N) complexity
 *
 * @since 2.0.0
 *
 * @param array $pages   Posts array (passed by reference).
 * @param int   $page_id Optional. Parent page ID. Default 0.
 * @return array A list arranged by hierarchy. Children immediately follow their parents.
 */
function get_page_hierarchy(&$pages, $page_id = 0)
{
}
/**
 * Traverse and return all the nested children post names of a root page.
 *
 * $children contains parent-children relations
 *
 * @since 2.9.0
 *
 * @see _page_traverse_name()
 *
 * @param int   $page_id   Page ID.
 * @param array $children  Parent-children relations (passed by reference).
 * @param array $result    Result (passed by reference).
 */
function _page_traverse_name($page_id, &$children, &$result)
{
}
/**
 * Build the URI path for a page.
 *
 * Sub pages will be in the "directory" under the parent page post name.
 *
 * @since 1.5.0
 * @since 4.6.0 Converted the `$page` parameter to optional.
 *
 * @param WP_Post|object|int $page Optional. Page ID or WP_Post object. Default is global $post.
 * @return string|false Page URI, false on error.
 */
function get_page_uri($page = 0)
{
}
/**
 * Retrieve a list of pages (or hierarchical post type items).
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @since 1.5.0
 *
 * @param array|string $args {
 *     Optional. Array or string of arguments to retrieve pages.
 *
 *     @type int          $child_of     Page ID to return child and grandchild pages of. Note: The value
 *                                      of `$hierarchical` has no bearing on whether `$child_of` returns
 *                                      hierarchical results. Default 0, or no restriction.
 *     @type string       $sort_order   How to sort retrieved pages. Accepts 'ASC', 'DESC'. Default 'ASC'.
 *     @type string       $sort_column  What columns to sort pages by, comma-separated. Accepts 'post_author',
 *                                      'post_date', 'post_title', 'post_name', 'post_modified', 'menu_order',
 *                                      'post_modified_gmt', 'post_parent', 'ID', 'rand', 'comment_count'.
 *                                      'post_' can be omitted for any values that start with it.
 *                                      Default 'post_title'.
 *     @type bool         $hierarchical Whether to return pages hierarchically. If false in conjunction with
 *                                      `$child_of` also being false, both arguments will be disregarded.
 *                                      Default true.
 *     @type array        $exclude      Array of page IDs to exclude. Default empty array.
 *     @type array        $include      Array of page IDs to include. Cannot be used with `$child_of`,
 *                                      `$parent`, `$exclude`, `$meta_key`, `$meta_value`, or `$hierarchical`.
 *                                      Default empty array.
 *     @type string       $meta_key     Only include pages with this meta key. Default empty.
 *     @type string       $meta_value   Only include pages with this meta value. Requires `$meta_key`.
 *                                      Default empty.
 *     @type string       $authors      A comma-separated list of author IDs. Default empty.
 *     @type int          $parent       Page ID to return direct children of. Default -1, or no restriction.
 *     @type string|array $exclude_tree Comma-separated string or array of page IDs to exclude.
 *                                      Default empty array.
 *     @type int          $number       The number of pages to return. Default 0, or all pages.
 *     @type int          $offset       The number of pages to skip before returning. Requires `$number`.
 *                                      Default 0.
 *     @type string       $post_type    The post type to query. Default 'page'.
 *     @type string|array $post_status  A comma-separated list or array of post statuses to include.
 *                                      Default 'publish'.
 * }
 * @return array|false List of pages matching defaults or `$args`.
 */
function get_pages($args = array())
{
}
//
// Attachment functions
//
/**
 * Check if the attachment URI is local one and is really an attachment.
 *
 * @since 2.0.0
 *
 * @param string $url URL to check
 * @return bool True on success, false on failure.
 */
function is_local_attachment($url)
{
}
/**
 * Insert an attachment.
 *
 * If you set the 'ID' in the $args parameter, it will mean that you are
 * updating and attempt to update the attachment. You can also set the
 * attachment name or title by setting the key 'post_name' or 'post_title'.
 *
 * You can set the dates for the attachment manually by setting the 'post_date'
 * and 'post_date_gmt' keys' values.
 *
 * By default, the comments will use the default settings for whether the
 * comments are allowed. You can close them manually or keep them open by
 * setting the value for the 'comment_status' key.
 *
 * @since 2.0.0
 * @since 4.7.0 Added the `$wp_error` parameter to allow a WP_Error to be returned on failure.
 *
 * @see wp_insert_post()
 *
 * @param string|array $args     Arguments for inserting an attachment.
 * @param string       $file     Optional. Filename.
 * @param int          $parent   Optional. Parent post ID.
 * @param bool         $wp_error Optional. Whether to return a WP_Error on failure. Default false.
 * @return int|WP_Error The attachment ID on success. The value 0 or WP_Error on failure.
 */
function wp_insert_attachment($args, $file = \false, $parent = 0, $wp_error = \false)
{
}
/**
 * Trash or delete an attachment.
 *
 * When an attachment is permanently deleted, the file will also be removed.
 * Deletion removes all post meta fields, taxonomy, comments, etc. associated
 * with the attachment (except the main post).
 *
 * The attachment is moved to the trash instead of permanently deleted unless trash
 * for media is disabled, item is already in the trash, or $force_delete is true.
 *
 * @since 2.0.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param int  $post_id      Attachment ID.
 * @param bool $force_delete Optional. Whether to bypass trash and force deletion.
 *                           Default false.
 * @return WP_Post|false|null Post data on success, false or null on failure.
 */
function wp_delete_attachment($post_id, $force_delete = \false)
{
}
/**
 * Deletes all files that belong to the given attachment.
 *
 * @since 4.9.7
 *
 * @param int    $post_id      Attachment ID.
 * @param array  $meta         The attachment's meta data.
 * @param array  $backup_sizes The meta data for the attachment's backup images.
 * @param string $file         Absolute path to the attachment's file.
 * @return bool True on success, false on failure.
 */
function wp_delete_attachment_files($post_id, $meta, $backup_sizes, $file)
{
}
/**
 * Retrieve attachment meta field for attachment ID.
 *
 * @since 2.1.0
 *
 * @param int  $attachment_id Attachment post ID. Defaults to global $post.
 * @param bool $unfiltered    Optional. If true, filters are not run. Default false.
 * @return mixed Attachment meta field. False on failure.
 */
function wp_get_attachment_metadata($attachment_id = 0, $unfiltered = \false)
{
}
/**
 * Update metadata for an attachment.
 *
 * @since 2.1.0
 *
 * @param int   $attachment_id Attachment post ID.
 * @param array $data          Attachment meta data.
 * @return int|bool False if $post is invalid.
 */
function wp_update_attachment_metadata($attachment_id, $data)
{
}
/**
 * Retrieve the URL for an attachment.
 *
 * @since 2.1.0
 *
 * @global string $pagenow
 *
 * @param int $attachment_id Optional. Attachment post ID. Defaults to global $post.
 * @return string|false Attachment URL, otherwise false.
 */
function wp_get_attachment_url($attachment_id = 0)
{
}
/**
 * Retrieves the caption for an attachment.
 *
 * @since 4.6.0
 *
 * @param int $post_id Optional. Attachment ID. Default is the ID of the global `$post`.
 * @return string|false False on failure. Attachment caption on success.
 */
function wp_get_attachment_caption($post_id = 0)
{
}
/**
 * Retrieve thumbnail for an attachment.
 *
 * @since 2.1.0
 *
 * @param int $post_id Optional. Attachment ID. Default 0.
 * @return string|false False on failure. Thumbnail file path on success.
 */
function wp_get_attachment_thumb_file($post_id = 0)
{
}
/**
 * Retrieve URL for an attachment thumbnail.
 *
 * @since 2.1.0
 *
 * @param int $post_id Optional. Attachment ID. Default 0.
 * @return string|false False on failure. Thumbnail URL on success.
 */
function wp_get_attachment_thumb_url($post_id = 0)
{
}
/**
 * Verifies an attachment is of a given type.
 *
 * @since 4.2.0
 *
 * @param string      $type Attachment type. Accepts 'image', 'audio', or 'video'.
 * @param int|WP_Post $post Optional. Attachment ID or object. Default is global $post.
 * @return bool True if one of the accepted types, false otherwise.
 */
function wp_attachment_is($type, $post = \null)
{
}
/**
 * Checks if the attachment is an image.
 *
 * @since 2.1.0
 * @since 4.2.0 Modified into wrapper for wp_attachment_is() and
 *              allowed WP_Post object to be passed.
 *
 * @param int|WP_Post $post Optional. Attachment ID or object. Default is global $post.
 * @return bool Whether the attachment is an image.
 */
function wp_attachment_is_image($post = \null)
{
}
/**
 * Retrieve the icon for a MIME type.
 *
 * @since 2.1.0
 *
 * @param string|int $mime MIME type or attachment ID.
 * @return string|false Icon, false otherwise.
 */
function wp_mime_type_icon($mime = 0)
{
}
/**
 * Check for changed slugs for published post objects and save the old slug.
 *
 * The function is used when a post object of any type is updated,
 * by comparing the current and previous post objects.
 *
 * If the slug was changed and not already part of the old slugs then it will be
 * added to the post meta field ('_wp_old_slug') for storing old slugs for that
 * post.
 *
 * The most logically usage of this function is redirecting changed post objects, so
 * that those that linked to an changed post will be redirected to the new post.
 *
 * @since 2.1.0
 *
 * @param int     $post_id     Post ID.
 * @param WP_Post $post        The Post Object
 * @param WP_Post $post_before The Previous Post Object
 */
function wp_check_for_changed_slugs($post_id, $post, $post_before)
{
}
/**
 * Check for changed dates for published post objects and save the old date.
 *
 * The function is used when a post object of any type is updated,
 * by comparing the current and previous post objects.
 *
 * If the date was changed and not already part of the old dates then it will be
 * added to the post meta field ('_wp_old_date') for storing old dates for that
 * post.
 *
 * The most logically usage of this function is redirecting changed post objects, so
 * that those that linked to an changed post will be redirected to the new post.
 *
 * @since 4.9.3
 *
 * @param int     $post_id     Post ID.
 * @param WP_Post $post        The Post Object
 * @param WP_Post $post_before The Previous Post Object
 */
function wp_check_for_changed_dates($post_id, $post, $post_before)
{
}
/**
 * Retrieve the private post SQL based on capability.
 *
 * This function provides a standardized way to appropriately select on the
 * post_status of a post type. The function will return a piece of SQL code
 * that can be added to a WHERE clause; this SQL is constructed to allow all
 * published posts, and all private posts to which the user has access.
 *
 * @since 2.2.0
 * @since 4.3.0 Added the ability to pass an array to `$post_type`.
 *
 * @param string|array $post_type Single post type or an array of post types. Currently only supports 'post' or 'page'.
 * @return string SQL code that can be added to a where clause.
 */
function get_private_posts_cap_sql($post_type)
{
}
/**
 * Retrieve the post SQL based on capability, author, and type.
 *
 * @since 3.0.0
 * @since 4.3.0 Introduced the ability to pass an array of post types to `$post_type`.
 *
 * @see get_private_posts_cap_sql()
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param array|string   $post_type   Single post type or an array of post types.
 * @param bool           $full        Optional. Returns a full WHERE statement instead of just
 *                                    an 'andalso' term. Default true.
 * @param int            $post_author Optional. Query posts having a single author ID. Default null.
 * @param bool           $public_only Optional. Only return public posts. Skips cap checks for
 *                                    $current_user.  Default false.
 * @return string SQL WHERE code that can be added to a query.
 */
function get_posts_by_author_sql($post_type, $full = \true, $post_author = \null, $public_only = \false)
{
}
/**
 * Retrieve the date that the last post was published.
 *
 * The server timezone is the default and is the difference between GMT and
 * server time. The 'blog' value is the date when the last post was posted. The
 * 'gmt' is when the last post was posted in GMT formatted date.
 *
 * @since 0.71
 * @since 4.4.0 The `$post_type` argument was added.
 *
 * @param string $timezone  Optional. The timezone for the timestamp. Accepts 'server', 'blog', or 'gmt'.
 *                          'server' uses the server's internal timezone.
 *                          'blog' uses the `post_modified` field, which proxies to the timezone set for the site.
 *                          'gmt' uses the `post_modified_gmt` field.
 *                          Default 'server'.
 * @param string $post_type Optional. The post type to check. Default 'any'.
 * @return string The date of the last post.
 */
function get_lastpostdate($timezone = 'server', $post_type = 'any')
{
}
/**
 * Get the timestamp of the last time any post was modified.
 *
 * The server timezone is the default and is the difference between GMT and
 * server time. The 'blog' value is just when the last post was modified. The
 * 'gmt' is when the last post was modified in GMT time.
 *
 * @since 1.2.0
 * @since 4.4.0 The `$post_type` argument was added.
 *
 * @param string $timezone  Optional. The timezone for the timestamp. See get_lastpostdate()
 *                          for information on accepted values.
 *                          Default 'server'.
 * @param string $post_type Optional. The post type to check. Default 'any'.
 * @return string The timestamp.
 */
function get_lastpostmodified($timezone = 'server', $post_type = 'any')
{
}
/**
 * Get the timestamp of the last time any post was modified or published.
 *
 * @since 3.1.0
 * @since 4.4.0 The `$post_type` argument was added.
 * @access private
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param string $timezone  The timezone for the timestamp. See get_lastpostdate().
 *                          for information on accepted values.
 * @param string $field     Post field to check. Accepts 'date' or 'modified'.
 * @param string $post_type Optional. The post type to check. Default 'any'.
 * @return string|false The timestamp.
 */
function _get_last_post_time($timezone, $field, $post_type = 'any')
{
}
/**
 * Updates posts in cache.
 *
 * @since 1.5.1
 *
 * @param array $posts Array of post objects (passed by reference).
 */
function update_post_cache(&$posts)
{
}
/**
 * Will clean the post in the cache.
 *
 * Cleaning means delete from the cache of the post. Will call to clean the term
 * object cache associated with the post ID.
 *
 * This function not run if $_wp_suspend_cache_invalidation is not empty. See
 * wp_suspend_cache_invalidation().
 *
 * @since 2.0.0
 *
 * @global bool $_wp_suspend_cache_invalidation
 *
 * @param int|WP_Post $post Post ID or post object to remove from the cache.
 */
function clean_post_cache($post)
{
}
/**
 * Call major cache updating functions for list of Post objects.
 *
 * @since 1.5.0
 *
 * @param array  $posts             Array of Post objects
 * @param string $post_type         Optional. Post type. Default 'post'.
 * @param bool   $update_term_cache Optional. Whether to update the term cache. Default true.
 * @param bool   $update_meta_cache Optional. Whether to update the meta cache. Default true.
 */
function update_post_caches(&$posts, $post_type = 'post', $update_term_cache = \true, $update_meta_cache = \true)
{
}
/**
 * Updates metadata cache for list of post IDs.
 *
 * Performs SQL query to retrieve the metadata for the post IDs and updates the
 * metadata cache for the posts. Therefore, the functions, which call this
 * function, do not need to perform SQL queries on their own.
 *
 * @since 2.1.0
 *
 * @param array $post_ids List of post IDs.
 * @return array|false Returns false if there is nothing to update or an array
 *                     of metadata.
 */
function update_postmeta_cache($post_ids)
{
}
/**
 * Will clean the attachment in the cache.
 *
 * Cleaning means delete from the cache. Optionally will clean the term
 * object cache associated with the attachment ID.
 *
 * This function will not run if $_wp_suspend_cache_invalidation is not empty.
 *
 * @since 3.0.0
 *
 * @global bool $_wp_suspend_cache_invalidation
 *
 * @param int  $id          The attachment ID in the cache to clean.
 * @param bool $clean_terms Optional. Whether to clean terms cache. Default false.
 */
function clean_attachment_cache($id, $clean_terms = \false)
{
}
//
// Hooks
//
/**
 * Hook for managing future post transitions to published.
 *
 * @since 2.3.0
 * @access private
 *
 * @see wp_clear_scheduled_hook()
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param string  $new_status New post status.
 * @param string  $old_status Previous post status.
 * @param WP_Post $post       Post object.
 */
function _transition_post_status($new_status, $old_status, $post)
{
}
/**
 * Hook used to schedule publication for a post marked for the future.
 *
 * The $post properties used and must exist are 'ID' and 'post_date_gmt'.
 *
 * @since 2.3.0
 * @access private
 *
 * @param int     $deprecated Not used. Can be set to null. Never implemented. Not marked
 *                            as deprecated with _deprecated_argument() as it conflicts with
 *                            wp_transition_post_status() and the default filter for _future_post_hook().
 * @param WP_Post $post       Post object.
 */
function _future_post_hook($deprecated, $post)
{
}
/**
 * Hook to schedule pings and enclosures when a post is published.
 *
 * Uses XMLRPC_REQUEST and WP_IMPORTING constants.
 *
 * @since 2.3.0
 * @access private
 *
 * @param int $post_id The ID in the database table of the post being published.
 */
function _publish_post_hook($post_id)
{
}
/**
 * Return the post's parent's post_ID
 *
 * @since 3.1.0
 *
 * @param int $post_ID
 *
 * @return int|false Post parent ID, otherwise false.
 */
function wp_get_post_parent_id($post_ID)
{
}
/**
 * Check the given subset of the post hierarchy for hierarchy loops.
 *
 * Prevents loops from forming and breaks those that it finds. Attached
 * to the {@see 'wp_insert_post_parent'} filter.
 *
 * @since 3.1.0
 *
 * @see wp_find_hierarchy_loop()
 *
 * @param int $post_parent ID of the parent for the post we're checking.
 * @param int $post_ID     ID of the post we're checking.
 * @return int The new post_parent for the post, 0 otherwise.
 */
function wp_check_post_hierarchy_for_loops($post_parent, $post_ID)
{
}
/**
 * Set a post thumbnail.
 *
 * @since 3.1.0
 *
 * @param int|WP_Post $post         Post ID or post object where thumbnail should be attached.
 * @param int         $thumbnail_id Thumbnail to attach.
 * @return int|bool True on success, false on failure.
 */
function set_post_thumbnail($post, $thumbnail_id)
{
}
/**
 * Remove a post thumbnail.
 *
 * @since 3.3.0
 *
 * @param int|WP_Post $post Post ID or post object where thumbnail should be removed from.
 * @return bool True on success, false on failure.
 */
function delete_post_thumbnail($post)
{
}
/**
 * Delete auto-drafts for new posts that are > 7 days old.
 *
 * @since 3.4.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 */
function wp_delete_auto_drafts()
{
}
/**
 * Queues posts for lazy-loading of term meta.
 *
 * @since 4.5.0
 *
 * @param array $posts Array of WP_Post objects.
 */
function wp_queue_posts_for_term_meta_lazyload($posts)
{
}
/**
 * Update the custom taxonomies' term counts when a post's status is changed.
 *
 * For example, default posts term counts (for custom taxonomies) don't include
 * private / draft posts.
 *
 * @since 3.3.0
 * @access private
 *
 * @param string  $new_status New post status.
 * @param string  $old_status Old post status.
 * @param WP_Post $post       Post object.
 */
function _update_term_count_on_transition_post_status($new_status, $old_status, $post)
{
}
/**
 * Adds any posts from the given ids to the cache that do not already exist in cache
 *
 * @since 3.4.0
 * @access private
 *
 * @see update_post_caches()
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param array $ids               ID list.
 * @param bool  $update_term_cache Optional. Whether to update the term cache. Default true.
 * @param bool  $update_meta_cache Optional. Whether to update the meta cache. Default true.
 */
function _prime_post_caches($ids, $update_term_cache = \true, $update_meta_cache = \true)
{
}
/**
 * Adds a suffix if any trashed posts have a given slug.
 *
 * Store its desired (i.e. current) slug so it can try to reclaim it
 * if the post is untrashed.
 *
 * For internal use.
 *
 * @since 4.5.0
 * @access private
 *
 * @param string $post_name Slug.
 * @param string $post_ID   Optional. Post ID that should be ignored. Default 0.
 */
function wp_add_trashed_suffix_to_post_name_for_trashed_posts($post_name, $post_ID = 0)
{
}
/**
 * Adds a trashed suffix for a given post.
 *
 * Store its desired (i.e. current) slug so it can try to reclaim it
 * if the post is untrashed.
 *
 * For internal use.
 *
 * @since 4.5.0
 * @access private
 *
 * @param WP_Post $post The post.
 * @return string New slug for the post.
 */
function wp_add_trashed_suffix_to_post_name_for_post($post)
{
}
/**
 * Filter the SQL clauses of an attachment query to include filenames.
 *
 * @since 4.7.0
 * @access private
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param array $clauses An array including WHERE, GROUP BY, JOIN, ORDER BY,
 *                       DISTINCT, fields (SELECT), and LIMITS clauses.
 * @return array The modified clauses.
 */
function _filter_query_attachment_filenames($clauses)
{
}
/**
 * WordPress Query API
 *
 * The query API attempts to get which part of WordPress the user is on. It
 * also provides functionality for getting URL query information.
 *
 * @link https://codex.wordpress.org/The_Loop More information on The Loop.
 *
 * @package WordPress
 * @subpackage Query
 */
/**
 * Retrieve variable in the WP_Query class.
 *
 * @since 1.5.0
 * @since 3.9.0 The `$default` argument was introduced.
 *
 * @global WP_Query $wp_query Global WP_Query instance.
 *
 * @param string $var       The variable key to retrieve.
 * @param mixed  $default   Optional. Value to return if the query variable is not set. Default empty.
 * @return mixed Contents of the query variable.
 */
function get_query_var($var, $default = '')
{
}
/**
 * Retrieve the currently-queried object.
 *
 * Wrapper for WP_Query::get_queried_object().
 *
 * @since 3.1.0
 *
 * @global WP_Query $wp_query Global WP_Query instance.
 *
 * @return object Queried object.
 */
function get_queried_object()
{
}
/**
 * Retrieve ID of the current queried object.
 *
 * Wrapper for WP_Query::get_queried_object_id().
 *
 * @since 3.1.0
 *
 * @global WP_Query $wp_query Global WP_Query instance.
 *
 * @return int ID of the queried object.
 */
function get_queried_object_id()
{
}
/**
 * Set query variable.
 *
 * @since 2.2.0
 *
 * @global WP_Query $wp_query Global WP_Query instance.
 *
 * @param string $var   Query variable key.
 * @param mixed  $value Query variable value.
 */
function set_query_var($var, $value)
{
}
/**
 * Sets up The Loop with query parameters.
 *
 * Note: This function will completely override the main query and isn't intended for use
 * by plugins or themes. Its overly-simplistic approach to modifying the main query can be
 * problematic and should be avoided wherever possible. In most cases, there are better,
 * more performant options for modifying the main query such as via the {@see 'pre_get_posts'}
 * action within WP_Query.
 *
 * This must not be used within the WordPress Loop.
 *
 * @since 1.5.0
 *
 * @global WP_Query $wp_query Global WP_Query instance.
 *
 * @param array|string $query Array or string of WP_Query arguments.
 * @return array List of post objects.
 */
function query_posts($query)
{
}
/**
 * Destroys the previous query and sets up a new query.
 *
 * This should be used after query_posts() and before another query_posts().
 * This will remove obscure bugs that occur when the previous WP_Query object
 * is not destroyed properly before another is set up.
 *
 * @since 2.3.0
 *
 * @global WP_Query $wp_query     Global WP_Query instance.
 * @global WP_Query $wp_the_query Copy of the global WP_Query instance created during wp_reset_query().
 */
function wp_reset_query()
{
}
/**
 * After looping through a separate query, this function restores
 * the $post global to the current post in the main query.
 *
 * @since 3.0.0
 *
 * @global WP_Query $wp_query Global WP_Query instance.
 */
function wp_reset_postdata()
{
}
/*
 * Query type checks.
 */
/**
 * Is the query for an existing archive page?
 *
 * Month, Year, Category, Author, Post Type archive...
 *
 * @since 1.5.0
 *
 * @global WP_Query $wp_query Global WP_Query instance.
 *
 * @return bool
 */
function is_archive()
{
}
/**
 * Is the query for an existing post type archive page?
 *
 * @since 3.1.0
 *
 * @global WP_Query $wp_query Global WP_Query instance.
 *
 * @param string|array $post_types Optional. Post type or array of posts types to check against.
 * @return bool
 */
function is_post_type_archive($post_types = '')
{
}
/**
 * Is the query for an existing attachment page?
 *
 * @since 2.0.0
 *
 * @global WP_Query $wp_query Global WP_Query instance.
 *
 * @param int|string|array|object $attachment Attachment ID, title, slug, or array of such.
 * @return bool
 */
function is_attachment($attachment = '')
{
}
/**
 * Is the query for an existing author archive page?
 *
 * If the $author parameter is specified, this function will additionally
 * check if the query is for one of the authors specified.
 *
 * @since 1.5.0
 *
 * @global WP_Query $wp_query Global WP_Query instance.
 *
 * @param mixed $author Optional. User ID, nickname, nicename, or array of User IDs, nicknames, and nicenames
 * @return bool
 */
function is_author($author = '')
{
}
/**
 * Is the query for an existing category archive page?
 *
 * If the $category parameter is specified, this function will additionally
 * check if the query is for one of the categories specified.
 *
 * @since 1.5.0
 *
 * @global WP_Query $wp_query Global WP_Query instance.
 *
 * @param mixed $category Optional. Category ID, name, slug, or array of Category IDs, names, and slugs.
 * @return bool
 */
function is_category($category = '')
{
}
/**
 * Is the query for an existing tag archive page?
 *
 * If the $tag parameter is specified, this function will additionally
 * check if the query is for one of the tags specified.
 *
 * @since 2.3.0
 *
 * @global WP_Query $wp_query Global WP_Query instance.
 *
 * @param mixed $tag Optional. Tag ID, name, slug, or array of Tag IDs, names, and slugs.
 * @return bool
 */
function is_tag($tag = '')
{
}
/**
 * Is the query for an existing custom taxonomy archive page?
 *
 * If the $taxonomy parameter is specified, this function will additionally
 * check if the query is for that specific $taxonomy.
 *
 * If the $term parameter is specified in addition to the $taxonomy parameter,
 * this function will additionally check if the query is for one of the terms
 * specified.
 *
 * @since 2.5.0
 *
 * @global WP_Query $wp_query Global WP_Query instance.
 *
 * @param string|array     $taxonomy Optional. Taxonomy slug or slugs.
 * @param int|string|array $term     Optional. Term ID, name, slug or array of Term IDs, names, and slugs.
 * @return bool True for custom taxonomy archive pages, false for built-in taxonomies (category and tag archives).
 */
function is_tax($taxonomy = '', $term = '')
{
}
/**
 * Is the query for an existing date archive?
 *
 * @since 1.5.0
 *
 * @global WP_Query $wp_query Global WP_Query instance.
 *
 * @return bool
 */
function is_date()
{
}
/**
 * Is the query for an existing day archive?
 *
 * @since 1.5.0
 *
 * @global WP_Query $wp_query Global WP_Query instance.
 *
 * @return bool
 */
function is_day()
{
}
/**
 * Is the query for a feed?
 *
 * @since 1.5.0
 *
 * @global WP_Query $wp_query Global WP_Query instance.
 *
 * @param string|array $feeds Optional feed types to check.
 * @return bool
 */
function is_feed($feeds = '')
{
}
/**
 * Is the query for a comments feed?
 *
 * @since 3.0.0
 *
 * @global WP_Query $wp_query Global WP_Query instance.
 *
 * @return bool
 */
function is_comment_feed()
{
}
/**
 * Is the query for the front page of the site?
 *
 * This is for what is displayed at your site's main URL.
 *
 * Depends on the site's "Front page displays" Reading Settings 'show_on_front' and 'page_on_front'.
 *
 * If you set a static page for the front page of your site, this function will return
 * true when viewing that page.
 *
 * Otherwise the same as @see is_home()
 *
 * @since 2.5.0
 *
 * @global WP_Query $wp_query Global WP_Query instance.
 *
 * @return bool True, if front of site.
 */
function is_front_page()
{
}
/**
 * Determines if the query is for the blog homepage.
 *
 * The blog homepage is the page that shows the time-based blog content of the site.
 *
 * is_home() is dependent on the site's "Front page displays" Reading Settings 'show_on_front'
 * and 'page_for_posts'.
 *
 * If a static page is set for the front page of the site, this function will return true only
 * on the page you set as the "Posts page".
 *
 * @since 1.5.0
 *
 * @see is_front_page()
 * @global WP_Query $wp_query Global WP_Query instance.
 *
 * @return bool True if blog view homepage, otherwise false.
 */
function is_home()
{
}
/**
 * Is the query for an existing month archive?
 *
 * @since 1.5.0
 *
 * @global WP_Query $wp_query Global WP_Query instance.
 *
 * @return bool
 */
function is_month()
{
}
/**
 * Is the query for an existing single page?
 *
 * If the $page parameter is specified, this function will additionally
 * check if the query is for one of the pages specified.
 *
 * @see is_single()
 * @see is_singular()
 *
 * @since 1.5.0
 *
 * @global WP_Query $wp_query Global WP_Query instance.
 *
 * @param int|string|array $page Optional. Page ID, title, slug, or array of such. Default empty.
 * @return bool Whether the query is for an existing single page.
 */
function is_page($page = '')
{
}
/**
 * Is the query for paged result and not for the first page?
 *
 * @since 1.5.0
 *
 * @global WP_Query $wp_query Global WP_Query instance.
 *
 * @return bool
 */
function is_paged()
{
}
/**
 * Is the query for a post or page preview?
 *
 * @since 2.0.0
 *
 * @global WP_Query $wp_query Global WP_Query instance.
 *
 * @return bool
 */
function is_preview()
{
}
/**
 * Is the query for the robots file?
 *
 * @since 2.1.0
 *
 * @global WP_Query $wp_query Global WP_Query instance.
 *
 * @return bool
 */
function is_robots()
{
}
/**
 * Is the query for a search?
 *
 * @since 1.5.0
 *
 * @global WP_Query $wp_query Global WP_Query instance.
 *
 * @return bool
 */
function is_search()
{
}
/**
 * Is the query for an existing single post?
 *
 * Works for any post type, except attachments and pages
 *
 * If the $post parameter is specified, this function will additionally
 * check if the query is for one of the Posts specified.
 *
 * @see is_page()
 * @see is_singular()
 *
 * @since 1.5.0
 *
 * @global WP_Query $wp_query Global WP_Query instance.
 *
 * @param int|string|array $post Optional. Post ID, title, slug, or array of such. Default empty.
 * @return bool Whether the query is for an existing single post.
 */
function is_single($post = '')
{
}
/**
 * Is the query for an existing single post of any post type (post, attachment, page,
 * custom post types)?
 *
 * If the $post_types parameter is specified, this function will additionally
 * check if the query is for one of the Posts Types specified.
 *
 * @see is_page()
 * @see is_single()
 *
 * @since 1.5.0
 *
 * @global WP_Query $wp_query Global WP_Query instance.
 *
 * @param string|array $post_types Optional. Post type or array of post types. Default empty.
 * @return bool Whether the query is for an existing single post of any of the given post types.
 */
function is_singular($post_types = '')
{
}
/**
 * Is the query for a specific time?
 *
 * @since 1.5.0
 *
 * @global WP_Query $wp_query Global WP_Query instance.
 *
 * @return bool
 */
function is_time()
{
}
/**
 * Is the query for a trackback endpoint call?
 *
 * @since 1.5.0
 *
 * @global WP_Query $wp_query Global WP_Query instance.
 *
 * @return bool
 */
function is_trackback()
{
}
/**
 * Is the query for an existing year archive?
 *
 * @since 1.5.0
 *
 * @global WP_Query $wp_query Global WP_Query instance.
 *
 * @return bool
 */
function is_year()
{
}
/**
 * Is the query a 404 (returns no results)?
 *
 * @since 1.5.0
 *
 * @global WP_Query $wp_query Global WP_Query instance.
 *
 * @return bool
 */
function is_404()
{
}
/**
 * Is the query for an embedded post?
 *
 * @since 4.4.0
 *
 * @global WP_Query $wp_query Global WP_Query instance.
 *
 * @return bool Whether we're in an embedded post or not.
 */
function is_embed()
{
}
/**
 * Is the query the main query?
 *
 * @since 3.3.0
 *
 * @global WP_Query $wp_query Global WP_Query instance.
 *
 * @return bool
 */
function is_main_query()
{
}
/*
 * The Loop. Post loop control.
 */
/**
 * Whether current WordPress query has results to loop over.
 *
 * @since 1.5.0
 *
 * @global WP_Query $wp_query Global WP_Query instance.
 *
 * @return bool
 */
function have_posts()
{
}
/**
 * Whether the caller is in the Loop.
 *
 * @since 2.0.0
 *
 * @global WP_Query $wp_query Global WP_Query instance.
 *
 * @return bool True if caller is within loop, false if loop hasn't started or ended.
 */
function in_the_loop()
{
}
/**
 * Rewind the loop posts.
 *
 * @since 1.5.0
 *
 * @global WP_Query $wp_query Global WP_Query instance.
 */
function rewind_posts()
{
}
/**
 * Iterate the post index in the loop.
 *
 * @since 1.5.0
 *
 * @global WP_Query $wp_query Global WP_Query instance.
 */
function the_post()
{
}
/*
 * Comments loop.
 */
/**
 * Whether there are comments to loop over.
 *
 * @since 2.2.0
 *
 * @global WP_Query $wp_query Global WP_Query instance.
 *
 * @return bool
 */
function have_comments()
{
}
/**
 * Iterate comment index in the comment loop.
 *
 * @since 2.2.0
 *
 * @global WP_Query $wp_query Global WP_Query instance.
 *
 * @return object
 */
function the_comment()
{
}
/**
 * Redirect old slugs to the correct permalink.
 *
 * Attempts to find the current slug from the past slugs.
 *
 * @since 2.1.0
 */
function wp_old_slug_redirect()
{
}
/**
 * Find the post ID for redirecting an old slug.
 *
 * @see wp_old_slug_redirect()
 *
 * @since 4.9.3
 * @access private
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param string $post_type The current post type based on the query vars.
 * @return int $id The Post ID.
 */
function _find_post_by_old_slug($post_type)
{
}
/**
 * Find the post ID for redirecting an old date.
 *
 * @see wp_old_slug_redirect()
 *
 * @since 4.9.3
 * @access private
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param string $post_type The current post type based on the query vars.
 * @return int $id The Post ID.
 */
function _find_post_by_old_date($post_type)
{
}
/**
 * Set up global post data.
 *
 * @since 1.5.0
 * @since 4.4.0 Added the ability to pass a post ID to `$post`.
 *
 * @global WP_Query $wp_query Global WP_Query instance.
 *
 * @param WP_Post|object|int $post WP_Post instance or Post ID/object.
 * @return bool True when finished.
 */
function setup_postdata($post)
{
}
/**
 * Registers a REST API route.
 *
 * @since 4.4.0
 *
 * @param string $namespace The first URL segment after core prefix. Should be unique to your package/plugin.
 * @param string $route     The base URL for route you are adding.
 * @param array  $args      Optional. Either an array of options for the endpoint, or an array of arrays for
 *                          multiple methods. Default empty array.
 * @param bool   $override  Optional. If the route already exists, should we override it? True overrides,
 *                          false merges (with newer overriding if duplicate keys exist). Default false.
 * @return bool True on success, false on error.
 */
function register_rest_route($namespace, $route, $args = array(), $override = \false)
{
}
/**
 * Registers a new field on an existing WordPress object type.
 *
 * @since 4.7.0
 *
 * @global array $wp_rest_additional_fields Holds registered fields, organized
 *                                          by object type.
 *
 * @param string|array $object_type Object(s) the field is being registered
 *                                  to, "post"|"term"|"comment" etc.
 * @param string $attribute         The attribute name.
 * @param array  $args {
 *     Optional. An array of arguments used to handle the registered field.
 *
 *     @type string|array|null $get_callback    Optional. The callback function used to retrieve the field
 *                                              value. Default is 'null', the field will not be returned in
 *                                              the response.
 *     @type string|array|null $update_callback Optional. The callback function used to set and update the
 *                                              field value. Default is 'null', the value cannot be set or
 *                                              updated.
 *     @type string|array|null $schema          Optional. The callback function used to create the schema for
 *                                              this field. Default is 'null', no schema entry will be returned.
 * }
 */
function register_rest_field($object_type, $attribute, $args = array())
{
}
/**
 * Registers rewrite rules for the API.
 *
 * @since 4.4.0
 *
 * @see rest_api_register_rewrites()
 * @global WP $wp Current WordPress environment instance.
 */
function rest_api_init()
{
}
/**
 * Adds REST rewrite rules.
 *
 * @since 4.4.0
 *
 * @see add_rewrite_rule()
 * @global WP_Rewrite $wp_rewrite
 */
function rest_api_register_rewrites()
{
}
/**
 * Registers the default REST API filters.
 *
 * Attached to the {@see 'rest_api_init'} action
 * to make testing and disabling these filters easier.
 *
 * @since 4.4.0
 */
function rest_api_default_filters()
{
}
/**
 * Registers default REST API routes.
 *
 * @since 4.7.0
 */
function create_initial_rest_routes()
{
}
/**
 * Loads the REST API.
 *
 * @since 4.4.0
 *
 * @global WP             $wp             Current WordPress environment instance.
 */
function rest_api_loaded()
{
}
/**
 * Retrieves the URL prefix for any API resource.
 *
 * @since 4.4.0
 *
 * @return string Prefix.
 */
function rest_get_url_prefix()
{
}
/**
 * Retrieves the URL to a REST endpoint on a site.
 *
 * Note: The returned URL is NOT escaped.
 *
 * @since 4.4.0
 *
 * @todo Check if this is even necessary
 * @global WP_Rewrite $wp_rewrite
 *
 * @param int    $blog_id Optional. Blog ID. Default of null returns URL for current blog.
 * @param string $path    Optional. REST route. Default '/'.
 * @param string $scheme  Optional. Sanitization scheme. Default 'rest'.
 * @return string Full URL to the endpoint.
 */
function get_rest_url($blog_id = \null, $path = '/', $scheme = 'rest')
{
}
/**
 * Retrieves the URL to a REST endpoint.
 *
 * Note: The returned URL is NOT escaped.
 *
 * @since 4.4.0
 *
 * @param string $path   Optional. REST route. Default empty.
 * @param string $scheme Optional. Sanitization scheme. Default 'json'.
 * @return string Full URL to the endpoint.
 */
function rest_url($path = '', $scheme = 'json')
{
}
/**
 * Do a REST request.
 *
 * Used primarily to route internal requests through WP_REST_Server.
 *
 * @since 4.4.0
 *
 * @param WP_REST_Request|string $request Request.
 * @return WP_REST_Response REST response.
 */
function rest_do_request($request)
{
}
/**
 * Retrieves the current REST server instance.
 *
 * Instantiates a new instance if none exists already.
 *
 * @since 4.5.0
 *
 * @global WP_REST_Server $wp_rest_server REST server instance.
 *
 * @return WP_REST_Server REST server instance.
 */
function rest_get_server()
{
}
/**
 * Ensures request arguments are a request object (for consistency).
 *
 * @since 4.4.0
 *
 * @param array|WP_REST_Request $request Request to check.
 * @return WP_REST_Request REST request instance.
 */
function rest_ensure_request($request)
{
}
/**
 * Ensures a REST response is a response object (for consistency).
 *
 * This implements WP_HTTP_Response, allowing usage of `set_status`/`header`/etc
 * without needing to double-check the object. Will also allow WP_Error to indicate error
 * responses, so users should immediately check for this value.
 *
 * @since 4.4.0
 *
 * @param WP_Error|WP_HTTP_Response|mixed $response Response to check.
 * @return WP_REST_Response|mixed If response generated an error, WP_Error, if response
 *                                is already an instance, WP_HTTP_Response, otherwise
 *                                returns a new WP_REST_Response instance.
 */
function rest_ensure_response($response)
{
}
/**
 * Handles _deprecated_function() errors.
 *
 * @since 4.4.0
 *
 * @param string $function    The function that was called.
 * @param string $replacement The function that should have been called.
 * @param string $version     Version.
 */
function rest_handle_deprecated_function($function, $replacement, $version)
{
}
/**
 * Handles _deprecated_argument() errors.
 *
 * @since 4.4.0
 *
 * @param string $function    The function that was called.
 * @param string $message     A message regarding the change.
 * @param string $version     Version.
 */
function rest_handle_deprecated_argument($function, $message, $version)
{
}
/**
 * Sends Cross-Origin Resource Sharing headers with API requests.
 *
 * @since 4.4.0
 *
 * @param mixed $value Response data.
 * @return mixed Response data.
 */
function rest_send_cors_headers($value)
{
}
/**
 * Handles OPTIONS requests for the server.
 *
 * This is handled outside of the server code, as it doesn't obey normal route
 * mapping.
 *
 * @since 4.4.0
 *
 * @param mixed           $response Current response, either response or `null` to indicate pass-through.
 * @param WP_REST_Server  $handler  ResponseHandler instance (usually WP_REST_Server).
 * @param WP_REST_Request $request  The request that was used to make current response.
 * @return WP_REST_Response Modified response, either response or `null` to indicate pass-through.
 */
function rest_handle_options_request($response, $handler, $request)
{
}
/**
 * Sends the "Allow" header to state all methods that can be sent to the current route.
 *
 * @since 4.4.0
 *
 * @param WP_REST_Response $response Current response being served.
 * @param WP_REST_Server   $server   ResponseHandler instance (usually WP_REST_Server).
 * @param WP_REST_Request  $request  The request that was used to make current response.
 * @return WP_REST_Response Response to be served, with "Allow" header if route has allowed methods.
 */
function rest_send_allow_header($response, $server, $request)
{
}
/**
 * Filter the API response to include only a white-listed set of response object fields.
 *
 * @since 4.8.0
 *
 * @param WP_REST_Response $response Current response being served.
 * @param WP_REST_Server   $server   ResponseHandler instance (usually WP_REST_Server).
 * @param WP_REST_Request  $request  The request that was used to make current response.
 *
 * @return WP_REST_Response Response to be served, trimmed down to contain a subset of fields.
 */
function rest_filter_response_fields($response, $server, $request)
{
}
/**
 * Adds the REST API URL to the WP RSD endpoint.
 *
 * @since 4.4.0
 *
 * @see get_rest_url()
 */
function rest_output_rsd()
{
}
/**
 * Outputs the REST API link tag into page header.
 *
 * @since 4.4.0
 *
 * @see get_rest_url()
 */
function rest_output_link_wp_head()
{
}
/**
 * Sends a Link header for the REST API.
 *
 * @since 4.4.0
 */
function rest_output_link_header()
{
}
/**
 * Checks for errors when using cookie-based authentication.
 *
 * WordPress' built-in cookie authentication is always active
 * for logged in users. However, the API has to check nonces
 * for each request to ensure users are not vulnerable to CSRF.
 *
 * @since 4.4.0
 *
 * @global mixed          $wp_rest_auth_cookie
 *
 * @param WP_Error|mixed $result Error from another authentication handler,
 *                               null if we should handle it, or another value
 *                               if not.
 * @return WP_Error|mixed|bool WP_Error if the cookie is invalid, the $result, otherwise true.
 */
function rest_cookie_check_errors($result)
{
}
/**
 * Collects cookie authentication status.
 *
 * Collects errors from wp_validate_auth_cookie for use by rest_cookie_check_errors.
 *
 * @since 4.4.0
 *
 * @see current_action()
 * @global mixed $wp_rest_auth_cookie
 */
function rest_cookie_collect_status()
{
}
/**
 * Parses an RFC3339 time into a Unix timestamp.
 *
 * @since 4.4.0
 *
 * @param string $date      RFC3339 timestamp.
 * @param bool   $force_utc Optional. Whether to force UTC timezone instead of using
 *                          the timestamp's timezone. Default false.
 * @return int Unix timestamp.
 */
function rest_parse_date($date, $force_utc = \false)
{
}
/**
 * Parses a date into both its local and UTC equivalent, in MySQL datetime format.
 *
 * @since 4.4.0
 *
 * @see rest_parse_date()
 *
 * @param string $date   RFC3339 timestamp.
 * @param bool   $is_utc Whether the provided date should be interpreted as UTC. Default false.
 * @return array|null Local and UTC datetime strings, in MySQL datetime format (Y-m-d H:i:s),
 *                    null on failure.
 */
function rest_get_date_with_gmt($date, $is_utc = \false)
{
}
/**
 * Returns a contextual HTTP error code for authorization failure.
 *
 * @since 4.7.0
 *
 * @return integer 401 if the user is not logged in, 403 if the user is logged in.
 */
function rest_authorization_required_code()
{
}
/**
 * Validate a request argument based on details registered to the route.
 *
 * @since 4.7.0
 *
 * @param  mixed            $value
 * @param  WP_REST_Request  $request
 * @param  string           $param
 * @return WP_Error|boolean
 */
function rest_validate_request_arg($value, $request, $param)
{
}
/**
 * Sanitize a request argument based on details registered to the route.
 *
 * @since 4.7.0
 *
 * @param  mixed            $value
 * @param  WP_REST_Request  $request
 * @param  string           $param
 * @return mixed
 */
function rest_sanitize_request_arg($value, $request, $param)
{
}
/**
 * Parse a request argument based on details registered to the route.
 *
 * Runs a validation check and sanitizes the value, primarily to be used via
 * the `sanitize_callback` arguments in the endpoint args registration.
 *
 * @since 4.7.0
 *
 * @param  mixed            $value
 * @param  WP_REST_Request  $request
 * @param  string           $param
 * @return mixed
 */
function rest_parse_request_arg($value, $request, $param)
{
}
/**
 * Determines if an IP address is valid.
 *
 * Handles both IPv4 and IPv6 addresses.
 *
 * @since 4.7.0
 *
 * @param  string $ip IP address.
 * @return string|false The valid IP address, otherwise false.
 */
function rest_is_ip_address($ip)
{
}
/**
 * Changes a boolean-like value into the proper boolean value.
 *
 * @since 4.7.0
 *
 * @param bool|string|int $value The value being evaluated.
 * @return boolean Returns the proper associated boolean value.
 */
function rest_sanitize_boolean($value)
{
}
/**
 * Determines if a given value is boolean-like.
 *
 * @since 4.7.0
 *
 * @param bool|string $maybe_bool The value being evaluated.
 * @return boolean True if a boolean, otherwise false.
 */
function rest_is_boolean($maybe_bool)
{
}
/**
 * Retrieves the avatar urls in various sizes based on a given email address.
 *
 * @since 4.7.0
 *
 * @see get_avatar_url()
 *
 * @param string $email Email address.
 * @return array $urls Gravatar url for each size.
 */
function rest_get_avatar_urls($email)
{
}
/**
 * Retrieves the pixel sizes for avatars.
 *
 * @since 4.7.0
 *
 * @return array List of pixel sizes for avatars. Default `[ 24, 48, 96 ]`.
 */
function rest_get_avatar_sizes()
{
}
/**
 * Validate a value based on a schema.
 *
 * @since 4.7.0
 *
 * @param mixed  $value The value to validate.
 * @param array  $args  Schema array to use for validation.
 * @param string $param The parameter name, used in error messages.
 * @return true|WP_Error
 */
function rest_validate_value_from_schema($value, $args, $param = '')
{
}
/**
 * Sanitize a value based on a schema.
 *
 * @since 4.7.0
 *
 * @param mixed $value The value to sanitize.
 * @param array $args  Schema array to use for sanitization.
 * @return true|WP_Error
 */
function rest_sanitize_value_from_schema($value, $args)
{
}
/**
 * Post revision functions.
 *
 * @package WordPress
 * @subpackage Post_Revisions
 */
/**
 * Determines which fields of posts are to be saved in revisions.
 *
 * @since 2.6.0
 * @since 4.5.0 A `WP_Post` object can now be passed to the `$post` parameter.
 * @since 4.5.0 The optional `$autosave` parameter was deprecated and renamed to `$deprecated`.
 * @access private
 *
 * @staticvar array $fields
 *
 * @param array|WP_Post $post       Optional. A post array or a WP_Post object being processed
 *                                  for insertion as a post revision. Default empty array.
 * @param bool          $deprecated Not used.
 * @return array Array of fields that can be versioned.
 */
function _wp_post_revision_fields($post = array(), $deprecated = \false)
{
}
/**
 * Returns a post array ready to be inserted into the posts table as a post revision.
 *
 * @since 4.5.0
 * @access private
 *
 * @param array|WP_Post $post     Optional. A post array or a WP_Post object to be processed
 *                                for insertion as a post revision. Default empty array.
 * @param bool          $autosave Optional. Is the revision an autosave? Default false.
 * @return array Post array ready to be inserted as a post revision.
 */
function _wp_post_revision_data($post = array(), $autosave = \false)
{
}
/**
 * Creates a revision for the current version of a post.
 *
 * Typically used immediately after a post update, as every update is a revision,
 * and the most recent revision always matches the current post.
 *
 * @since 2.6.0
 *
 * @param int $post_id The ID of the post to save as a revision.
 * @return int|WP_Error|void Void or 0 if error, new revision ID, if success.
 */
function wp_save_post_revision($post_id)
{
}
/**
 * Retrieve the autosaved data of the specified post.
 *
 * Returns a post object containing the information that was autosaved for the
 * specified post. If the optional $user_id is passed, returns the autosave for that user
 * otherwise returns the latest autosave.
 *
 * @since 2.6.0
 *
 * @param int $post_id The post ID.
 * @param int $user_id Optional The post author ID.
 * @return WP_Post|false The autosaved data or false on failure or when no autosave exists.
 */
function wp_get_post_autosave($post_id, $user_id = 0)
{
}
/**
 * Determines if the specified post is a revision.
 *
 * @since 2.6.0
 *
 * @param int|WP_Post $post Post ID or post object.
 * @return false|int False if not a revision, ID of revision's parent otherwise.
 */
function wp_is_post_revision($post)
{
}
/**
 * Determines if the specified post is an autosave.
 *
 * @since 2.6.0
 *
 * @param int|WP_Post $post Post ID or post object.
 * @return false|int False if not a revision, ID of autosave's parent otherwise
 */
function wp_is_post_autosave($post)
{
}
/**
 * Inserts post data into the posts table as a post revision.
 *
 * @since 2.6.0
 * @access private
 *
 * @param int|WP_Post|array|null $post     Post ID, post object OR post array.
 * @param bool                   $autosave Optional. Is the revision an autosave?
 * @return int|WP_Error WP_Error or 0 if error, new revision ID if success.
 */
function _wp_put_post_revision($post = \null, $autosave = \false)
{
}
/**
 * Gets a post revision.
 *
 * @since 2.6.0
 *
 * @param int|WP_Post $post   The post ID or object.
 * @param string      $output Optional. The required return type. One of OBJECT, ARRAY_A, or ARRAY_N, which correspond to
 *                            a WP_Post object, an associative array, or a numeric array, respectively. Default OBJECT.
 * @param string      $filter Optional sanitation filter. See sanitize_post().
 * @return WP_Post|array|null WP_Post (or array) on success, or null on failure.
 */
function wp_get_post_revision(&$post, $output = \OBJECT, $filter = 'raw')
{
}
/**
 * Restores a post to the specified revision.
 *
 * Can restore a past revision using all fields of the post revision, or only selected fields.
 *
 * @since 2.6.0
 *
 * @param int|WP_Post $revision_id Revision ID or revision object.
 * @param array       $fields      Optional. What fields to restore from. Defaults to all.
 * @return int|false|null Null if error, false if no fields to restore, (int) post ID if success.
 */
function wp_restore_post_revision($revision_id, $fields = \null)
{
}
/**
 * Deletes a revision.
 *
 * Deletes the row from the posts table corresponding to the specified revision.
 *
 * @since 2.6.0
 *
 * @param int|WP_Post $revision_id Revision ID or revision object.
 * @return array|false|WP_Post|WP_Error|null Null or WP_Error if error, deleted post if success.
 */
function wp_delete_post_revision($revision_id)
{
}
/**
 * Returns all revisions of specified post.
 *
 * @since 2.6.0
 *
 * @see get_children()
 *
 * @param int|WP_Post $post_id Optional. Post ID or WP_Post object. Default is global `$post`.
 * @param array|null  $args    Optional. Arguments for retrieving post revisions. Default null.
 * @return array An array of revisions, or an empty array if none.
 */
function wp_get_post_revisions($post_id = 0, $args = \null)
{
}
/**
 * Determine if revisions are enabled for a given post.
 *
 * @since 3.6.0
 *
 * @param WP_Post $post The post object.
 * @return bool True if number of revisions to keep isn't zero, false otherwise.
 */
function wp_revisions_enabled($post)
{
}
/**
 * Determine how many revisions to retain for a given post.
 *
 * By default, an infinite number of revisions are kept.
 *
 * The constant WP_POST_REVISIONS can be set in wp-config to specify the limit
 * of revisions to keep.
 *
 * @since 3.6.0
 *
 * @param WP_Post $post The post object.
 * @return int The number of revisions to keep.
 */
function wp_revisions_to_keep($post)
{
}
/**
 * Sets up the post object for preview based on the post autosave.
 *
 * @since 2.7.0
 * @access private
 *
 * @param WP_Post $post
 * @return WP_Post|false
 */
function _set_preview($post)
{
}
/**
 * Filters the latest content for preview from the post autosave.
 *
 * @since 2.7.0
 * @access private
 */
function _show_post_preview()
{
}
/**
 * Filters terms lookup to set the post format.
 *
 * @since 3.6.0
 * @access private
 *
 * @param array  $terms
 * @param int    $post_id
 * @param string $taxonomy
 * @return array
 */
function _wp_preview_terms_filter($terms, $post_id, $taxonomy)
{
}
/**
 * Filters post thumbnail lookup to set the post thumbnail.
 *
 * @since 4.6.0
 * @access private
 *
 * @param null|array|string $value    The value to return - a single metadata value, or an array of values.
 * @param int               $post_id  Post ID.
 * @param string            $meta_key Meta key.
 * @return null|array The default return value or the post thumbnail meta array.
 */
function _wp_preview_post_thumbnail_filter($value, $post_id, $meta_key)
{
}
/**
 * Gets the post revision version.
 *
 * @since 3.6.0
 * @access private
 *
 * @param WP_Post $revision
 * @return int|false
 */
function _wp_get_post_revision_version($revision)
{
}
/**
 * Upgrade the revisions author, add the current post as a revision and set the revisions version to 1
 *
 * @since 3.6.0
 * @access private
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param WP_Post $post      Post object
 * @param array   $revisions Current revisions of the post
 * @return bool true if the revisions were upgraded, false if problems
 */
function _wp_upgrade_revisions_of_post($post, $revisions)
{
}
/**
 * Adds a rewrite rule that transforms a URL structure to a set of query vars.
 *
 * Any value in the $after parameter that isn't 'bottom' will result in the rule
 * being placed at the top of the rewrite rules.
 *
 * @since 2.1.0
 * @since 4.4.0 Array support was added to the `$query` parameter.
 *
 * @global WP_Rewrite $wp_rewrite WordPress Rewrite Component.
 *
 * @param string       $regex Regular expression to match request against.
 * @param string|array $query The corresponding query vars for this rewrite rule.
 * @param string       $after Optional. Priority of the new rule. Accepts 'top'
 *                            or 'bottom'. Default 'bottom'.
 */
function add_rewrite_rule($regex, $query, $after = 'bottom')
{
}
/**
 * Add a new rewrite tag (like %postname%).
 *
 * The $query parameter is optional. If it is omitted you must ensure that
 * you call this on, or before, the {@see 'init'} hook. This is because $query defaults
 * to "$tag=", and for this to work a new query var has to be added.
 *
 * @since 2.1.0
 *
 * @global WP_Rewrite $wp_rewrite
 * @global WP         $wp
 *
 * @param string $tag   Name of the new rewrite tag.
 * @param string $regex Regular expression to substitute the tag for in rewrite rules.
 * @param string $query Optional. String to append to the rewritten query. Must end in '='. Default empty.
 */
function add_rewrite_tag($tag, $regex, $query = '')
{
}
/**
 * Removes an existing rewrite tag (like %postname%).
 *
 * @since 4.5.0
 *
 * @global WP_Rewrite $wp_rewrite WordPress rewrite component.
 *
 * @param string $tag Name of the rewrite tag.
 */
function remove_rewrite_tag($tag)
{
}
/**
 * Add permalink structure.
 *
 * @since 3.0.0
 *
 * @see WP_Rewrite::add_permastruct()
 * @global WP_Rewrite $wp_rewrite WordPress rewrite component.
 *
 * @param string $name   Name for permalink structure.
 * @param string $struct Permalink structure.
 * @param array  $args   Optional. Arguments for building the rules from the permalink structure,
 *                       see WP_Rewrite::add_permastruct() for full details. Default empty array.
 */
function add_permastruct($name, $struct, $args = array())
{
}
/**
 * Removes a permalink structure.
 *
 * Can only be used to remove permastructs that were added using add_permastruct().
 * Built-in permastructs cannot be removed.
 *
 * @since 4.5.0
 *
 * @see WP_Rewrite::remove_permastruct()
 * @global WP_Rewrite $wp_rewrite WordPress rewrite component.
 *
 * @param string $name Name for permalink structure.
 */
function remove_permastruct($name)
{
}
/**
 * Add a new feed type like /atom1/.
 *
 * @since 2.1.0
 *
 * @global WP_Rewrite $wp_rewrite
 *
 * @param string   $feedname Feed name.
 * @param callable $function Callback to run on feed display.
 * @return string Feed action name.
 */
function add_feed($feedname, $function)
{
}
/**
 * Remove rewrite rules and then recreate rewrite rules.
 *
 * @since 3.0.0
 *
 * @global WP_Rewrite $wp_rewrite
 *
 * @param bool $hard Whether to update .htaccess (hard flush) or just update
 * 	                 rewrite_rules transient (soft flush). Default is true (hard).
 */
function flush_rewrite_rules($hard = \true)
{
}
/**
 * Add an endpoint, like /trackback/.
 *
 * Adding an endpoint creates extra rewrite rules for each of the matching
 * places specified by the provided bitmask. For example:
 *
 *     add_rewrite_endpoint( 'json', EP_PERMALINK | EP_PAGES );
 *
 * will add a new rewrite rule ending with "json(/(.*))?/?$" for every permastruct
 * that describes a permalink (post) or page. This is rewritten to "json=$match"
 * where $match is the part of the URL matched by the endpoint regex (e.g. "foo" in
 * "[permalink]/json/foo/").
 *
 * A new query var with the same name as the endpoint will also be created.
 *
 * When specifying $places ensure that you are using the EP_* constants (or a
 * combination of them using the bitwise OR operator) as their values are not
 * guaranteed to remain static (especially `EP_ALL`).
 *
 * Be sure to flush the rewrite rules - see flush_rewrite_rules() - when your plugin gets
 * activated and deactivated.
 *
 * @since 2.1.0
 * @since 4.3.0 Added support for skipping query var registration by passing `false` to `$query_var`.
 *
 * @global WP_Rewrite $wp_rewrite
 *
 * @param string      $name      Name of the endpoint.
 * @param int         $places    Endpoint mask describing the places the endpoint should be added.
 * @param string|bool $query_var Name of the corresponding query variable. Pass `false` to skip registering a query_var
 *                               for this endpoint. Defaults to the value of `$name`.
 */
function add_rewrite_endpoint($name, $places, $query_var = \true)
{
}
/**
 * Filters the URL base for taxonomies.
 *
 * To remove any manually prepended /index.php/.
 *
 * @access private
 * @since 2.6.0
 *
 * @param string $base The taxonomy base that we're going to filter
 * @return string
 */
function _wp_filter_taxonomy_base($base)
{
}
/**
 * Resolve numeric slugs that collide with date permalinks.
 *
 * Permalinks of posts with numeric slugs can sometimes look to WP_Query::parse_query()
 * like a date archive, as when your permalink structure is `/%year%/%postname%/` and
 * a post with post_name '05' has the URL `/2015/05/`.
 *
 * This function detects conflicts of this type and resolves them in favor of the
 * post permalink.
 *
 * Note that, since 4.3.0, wp_unique_post_slug() prevents the creation of post slugs
 * that would result in a date archive conflict. The resolution performed in this
 * function is primarily for legacy content, as well as cases when the admin has changed
 * the site's permalink structure in a way that introduces URL conflicts.
 *
 * @since 4.3.0
 *
 * @param array $query_vars Optional. Query variables for setting up the loop, as determined in
 *                          WP::parse_request(). Default empty array.
 * @return array Returns the original array of query vars, with date/post conflicts resolved.
 */
function wp_resolve_numeric_slug_conflicts($query_vars = array())
{
}
/**
 * Examine a URL and try to determine the post ID it represents.
 *
 * Checks are supposedly from the hosted site blog.
 *
 * @since 1.0.0
 *
 * @global WP_Rewrite $wp_rewrite
 * @global WP         $wp
 *
 * @param string $url Permalink to check.
 * @return int Post ID, or 0 on failure.
 */
function url_to_postid($url)
{
}
/**
 * Build Magpie object based on RSS from URL.
 *
 * @since 1.5.0
 * @package External
 * @subpackage MagpieRSS
 *
 * @param string $url URL to retrieve feed
 * @return bool|MagpieRSS false on failure or MagpieRSS object on success.
 */
function fetch_rss($url)
{
}
/**
 * Retrieve URL headers and content using WP HTTP Request API.
 *
 * @since 1.5.0
 * @package External
 * @subpackage MagpieRSS
 *
 * @param string $url URL to retrieve
 * @param array $headers Optional. Headers to send to the URL.
 * @return Snoopy style response
 */
function _fetch_remote_file($url, $headers = "")
{
}
/**
 * Retrieve
 *
 * @since 1.5.0
 * @package External
 * @subpackage MagpieRSS
 *
 * @param array $resp
 * @return MagpieRSS|bool
 */
function _response_to_rss($resp)
{
}
/**
 * Set up constants with default values, unless user overrides.
 *
 * @since 1.5.0
 * @package External
 * @subpackage MagpieRSS
 */
function init()
{
}
function is_info($sc)
{
}
function is_success($sc)
{
}
function is_redirect($sc)
{
}
function is_error($sc)
{
}
function is_client_error($sc)
{
}
function is_server_error($sc)
{
}
function parse_w3cdtf($date_str)
{
}
/**
 * Display all RSS items in a HTML ordered list.
 *
 * @since 1.5.0
 * @package External
 * @subpackage MagpieRSS
 *
 * @param string $url URL of feed to display. Will not auto sense feed URL.
 * @param int $num_items Optional. Number of items to display, default is all.
 */
function wp_rss($url, $num_items = -1)
{
}
/**
 * Display RSS items in HTML list items.
 *
 * You have to specify which HTML list you want, either ordered or unordered
 * before using the function. You also have to specify how many items you wish
 * to display. You can't display all of them like you can with wp_rss()
 * function.
 *
 * @since 1.5.0
 * @package External
 * @subpackage MagpieRSS
 *
 * @param string $url URL of feed to display. Will not auto sense feed URL.
 * @param int $num_items Optional. Number of items to display, default is all.
 * @return bool False on failure.
 */
function get_rss($url, $num_items = 5)
{
}
/**
 * Register all WordPress scripts.
 *
 * Localizes some of them.
 * args order: `$scripts->add( 'handle', 'url', 'dependencies', 'query-string', 1 );`
 * when last arg === 1 queues the script for the footer
 *
 * @since 2.6.0
 *
 * @param WP_Scripts $scripts WP_Scripts object.
 */
function wp_default_scripts(&$scripts)
{
}
/**
 * Assign default styles to $styles object.
 *
 * Nothing is returned, because the $styles parameter is passed by reference.
 * Meaning that whatever object is passed will be updated without having to
 * reassign the variable that was passed back to the same value. This saves
 * memory.
 *
 * Adding default styles is not the only task, it also assigns the base_url
 * property, the default version, and text direction for the object.
 *
 * @since 2.6.0
 *
 * @param WP_Styles $styles
 */
function wp_default_styles(&$styles)
{
}
/**
 * Reorder JavaScript scripts array to place prototype before jQuery.
 *
 * @since 2.3.1
 *
 * @param array $js_array JavaScript scripts array
 * @return array Reordered array, if needed.
 */
function wp_prototype_before_jquery($js_array)
{
}
/**
 * Load localized data on print rather than initialization.
 *
 * These localizations require information that may not be loaded even by init.
 *
 * @since 2.5.0
 */
function wp_just_in_time_script_localization()
{
}
/**
 * Localizes the jQuery UI datepicker.
 *
 * @since 4.6.0
 *
 * @link https://api.jqueryui.com/datepicker/#options
 *
 * @global WP_Locale $wp_locale The WordPress date and time locale object.
 */
function wp_localize_jquery_ui_datepicker()
{
}
/**
 * Localizes community events data that needs to be passed to dashboard.js.
 *
 * @since 4.8.0
 */
function wp_localize_community_events()
{
}
/**
 * Administration Screen CSS for changing the styles.
 *
 * If installing the 'wp-admin/' directory will be replaced with './'.
 *
 * The $_wp_admin_css_colors global manages the Administration Screens CSS
 * stylesheet that is loaded. The option that is set is 'admin_color' and is the
 * color and key for the array. The value for the color key is an object with
 * a 'url' parameter that has the URL path to the CSS file.
 *
 * The query from $src parameter will be appended to the URL that is given from
 * the $_wp_admin_css_colors array value URL.
 *
 * @since 2.6.0
 * @global array $_wp_admin_css_colors
 *
 * @param string $src    Source URL.
 * @param string $handle Either 'colors' or 'colors-rtl'.
 * @return string|false URL path to CSS stylesheet for Administration Screens.
 */
function wp_style_loader_src($src, $handle)
{
}
/**
 * Prints the script queue in the HTML head on admin pages.
 *
 * Postpones the scripts that were queued for the footer.
 * print_footer_scripts() is called in the footer to print these scripts.
 *
 * @since 2.8.0
 *
 * @see wp_print_scripts()
 *
 * @global bool $concatenate_scripts
 *
 * @return array
 */
function print_head_scripts()
{
}
/**
 * Prints the scripts that were queued for the footer or too late for the HTML head.
 *
 * @since 2.8.0
 *
 * @global WP_Scripts $wp_scripts
 * @global bool       $concatenate_scripts
 *
 * @return array
 */
function print_footer_scripts()
{
}
/**
 * Print scripts (internal use only)
 *
 * @ignore
 *
 * @global WP_Scripts $wp_scripts
 * @global bool       $compress_scripts
 */
function _print_scripts()
{
}
/**
 * Prints the script queue in the HTML head on the front end.
 *
 * Postpones the scripts that were queued for the footer.
 * wp_print_footer_scripts() is called in the footer to print these scripts.
 *
 * @since 2.8.0
 *
 * @global WP_Scripts $wp_scripts
 *
 * @return array
 */
function wp_print_head_scripts()
{
}
/**
 * Private, for use in *_footer_scripts hooks
 *
 * @since 3.3.0
 */
function _wp_footer_scripts()
{
}
/**
 * Hooks to print the scripts and styles in the footer.
 *
 * @since 2.8.0
 */
function wp_print_footer_scripts()
{
}
/**
 * Wrapper for do_action('wp_enqueue_scripts')
 *
 * Allows plugins to queue scripts for the front end using wp_enqueue_script().
 * Runs first in wp_head() where all is_home(), is_page(), etc. functions are available.
 *
 * @since 2.8.0
 */
function wp_enqueue_scripts()
{
}
/**
 * Prints the styles queue in the HTML head on admin pages.
 *
 * @since 2.8.0
 *
 * @global bool $concatenate_scripts
 *
 * @return array
 */
function print_admin_styles()
{
}
/**
 * Prints the styles that were queued too late for the HTML head.
 *
 * @since 3.3.0
 *
 * @global WP_Styles $wp_styles
 * @global bool      $concatenate_scripts
 *
 * @return array|void
 */
function print_late_styles()
{
}
/**
 * Print styles (internal use only)
 *
 * @ignore
 * @since 3.3.0
 *
 * @global bool $compress_css
 */
function _print_styles()
{
}
/**
 * Determine the concatenation and compression settings for scripts and styles.
 *
 * @since 2.8.0
 *
 * @global bool $concatenate_scripts
 * @global bool $compress_scripts
 * @global bool $compress_css
 */
function script_concat_settings()
{
}
/**
 * Adds a new shortcode.
 *
 * Care should be taken through prefixing or other means to ensure that the
 * shortcode tag being added is unique and will not conflict with other,
 * already-added shortcode tags. In the event of a duplicated tag, the tag
 * loaded last will take precedence.
 *
 * @since 2.5.0
 *
 * @global array $shortcode_tags
 *
 * @param string   $tag      Shortcode tag to be searched in post content.
 * @param callable $callback The callback function to run when the shortcode is found.
 *                           Every shortcode callback is passed three parameters by default,
 *                           including an array of attributes (`$atts`), the shortcode content
 *                           or null if not set (`$content`), and finally the shortcode tag
 *                           itself (`$shortcode_tag`), in that order.
 */
function add_shortcode($tag, $callback)
{
}
/**
 * Removes hook for shortcode.
 *
 * @since 2.5.0
 *
 * @global array $shortcode_tags
 *
 * @param string $tag Shortcode tag to remove hook for.
 */
function remove_shortcode($tag)
{
}
/**
 * Clear all shortcodes.
 *
 * This function is simple, it clears all of the shortcode tags by replacing the
 * shortcodes global by a empty array. This is actually a very efficient method
 * for removing all shortcodes.
 *
 * @since 2.5.0
 *
 * @global array $shortcode_tags
 */
function remove_all_shortcodes()
{
}
/**
 * Whether a registered shortcode exists named $tag
 *
 * @since 3.6.0
 *
 * @global array $shortcode_tags List of shortcode tags and their callback hooks.
 *
 * @param string $tag Shortcode tag to check.
 * @return bool Whether the given shortcode exists.
 */
function shortcode_exists($tag)
{
}
/**
 * Whether the passed content contains the specified shortcode
 *
 * @since 3.6.0
 *
 * @global array $shortcode_tags
 *
 * @param string $content Content to search for shortcodes.
 * @param string $tag     Shortcode tag to check.
 * @return bool Whether the passed content contains the given shortcode.
 */
function has_shortcode($content, $tag)
{
}
/**
 * Search content for shortcodes and filter shortcodes through their hooks.
 *
 * If there are no shortcode tags defined, then the content will be returned
 * without any filtering. This might cause issues when plugins are disabled but
 * the shortcode will still show up in the post or content.
 *
 * @since 2.5.0
 *
 * @global array $shortcode_tags List of shortcode tags and their callback hooks.
 *
 * @param string $content Content to search for shortcodes.
 * @param bool $ignore_html When true, shortcodes inside HTML elements will be skipped.
 * @return string Content with shortcodes filtered out.
 */
function do_shortcode($content, $ignore_html = \false)
{
}
/**
 * Retrieve the shortcode regular expression for searching.
 *
 * The regular expression combines the shortcode tags in the regular expression
 * in a regex class.
 *
 * The regular expression contains 6 different sub matches to help with parsing.
 *
 * 1 - An extra [ to allow for escaping shortcodes with double [[]]
 * 2 - The shortcode name
 * 3 - The shortcode argument list
 * 4 - The self closing /
 * 5 - The content of a shortcode when it wraps some content.
 * 6 - An extra ] to allow for escaping shortcodes with double [[]]
 *
 * @since 2.5.0
 * @since 4.4.0 Added the `$tagnames` parameter.
 *
 * @global array $shortcode_tags
 *
 * @param array $tagnames Optional. List of shortcodes to find. Defaults to all registered shortcodes.
 * @return string The shortcode search regular expression
 */
function get_shortcode_regex($tagnames = \null)
{
}
/**
 * Regular Expression callable for do_shortcode() for calling shortcode hook.
 * @see get_shortcode_regex for details of the match array contents.
 *
 * @since 2.5.0
 * @access private
 *
 * @global array $shortcode_tags
 *
 * @param array $m Regular expression match array
 * @return string|false False on failure.
 */
function do_shortcode_tag($m)
{
}
/**
 * Search only inside HTML elements for shortcodes and process them.
 *
 * Any [ or ] characters remaining inside elements will be HTML encoded
 * to prevent interference with shortcodes that are outside the elements.
 * Assumes $content processed by KSES already.  Users with unfiltered_html
 * capability may get unexpected output if angle braces are nested in tags.
 *
 * @since 4.2.3
 *
 * @param string $content Content to search for shortcodes
 * @param bool $ignore_html When true, all square braces inside elements will be encoded.
 * @param array $tagnames List of shortcodes to find.
 * @return string Content with shortcodes filtered out.
 */
function do_shortcodes_in_html_tags($content, $ignore_html, $tagnames)
{
}
/**
 * Remove placeholders added by do_shortcodes_in_html_tags().
 *
 * @since 4.2.3
 *
 * @param string $content Content to search for placeholders.
 * @return string Content with placeholders removed.
 */
function unescape_invalid_shortcodes($content)
{
}
/**
 * Retrieve the shortcode attributes regex.
 *
 * @since 4.4.0
 *
 * @return string The shortcode attribute regular expression
 */
function get_shortcode_atts_regex()
{
}
/**
 * Retrieve all attributes from the shortcodes tag.
 *
 * The attributes list has the attribute name as the key and the value of the
 * attribute as the value in the key/value pair. This allows for easier
 * retrieval of the attributes, since all attributes have to be known.
 *
 * @since 2.5.0
 *
 * @param string $text
 * @return array|string List of attribute values.
 *                      Returns empty array if trim( $text ) == '""'.
 *                      Returns empty string if trim( $text ) == ''.
 *                      All other matches are checked for not empty().
 */
function shortcode_parse_atts($text)
{
}
/**
 * Combine user attributes with known attributes and fill in defaults when needed.
 *
 * The pairs should be considered to be all of the attributes which are
 * supported by the caller and given as a list. The returned attributes will
 * only contain the attributes in the $pairs list.
 *
 * If the $atts list has unsupported attributes, then they will be ignored and
 * removed from the final returned list.
 *
 * @since 2.5.0
 *
 * @param array  $pairs     Entire list of supported attributes and their defaults.
 * @param array  $atts      User defined attributes in shortcode tag.
 * @param string $shortcode Optional. The name of the shortcode, provided for context to enable filtering
 * @return array Combined and filtered attribute list.
 */
function shortcode_atts($pairs, $atts, $shortcode = '')
{
}
/**
 * Remove all shortcode tags from the given content.
 *
 * @since 2.5.0
 *
 * @global array $shortcode_tags
 *
 * @param string $content Content to remove shortcode tags.
 * @return string Content without shortcode tags.
 */
function strip_shortcodes($content)
{
}
/**
 * Strips a shortcode tag based on RegEx matches against post content.
 *
 * @since 3.3.0
 *
 * @param array $m RegEx matches against post content.
 * @return string|false The content stripped of the tag, otherwise false.
 */
function strip_shortcode_tag($m)
{
}
/**
 * Core Taxonomy API
 *
 * @package WordPress
 * @subpackage Taxonomy
 */
//
// Taxonomy Registration
//
/**
 * Creates the initial taxonomies.
 *
 * This function fires twice: in wp-settings.php before plugins are loaded (for
 * backward compatibility reasons), and again on the {@see 'init'} action. We must
 * avoid registering rewrite rules before the {@see 'init'} action.
 *
 * @since 2.8.0
 *
 * @global WP_Rewrite $wp_rewrite The WordPress rewrite class.
 */
function create_initial_taxonomies()
{
}
/**
 * Retrieves a list of registered taxonomy names or objects.
 *
 * @since 3.0.0
 *
 * @global array $wp_taxonomies The registered taxonomies.
 *
 * @param array  $args     Optional. An array of `key => value` arguments to match against the taxonomy objects.
 *                         Default empty array.
 * @param string $output   Optional. The type of output to return in the array. Accepts either taxonomy 'names'
 *                         or 'objects'. Default 'names'.
 * @param string $operator Optional. The logical operation to perform. Accepts 'and' or 'or'. 'or' means only
 *                         one element from the array needs to match; 'and' means all elements must match.
 *                         Default 'and'.
 * @return array A list of taxonomy names or objects.
 */
function get_taxonomies($args = array(), $output = 'names', $operator = 'and')
{
}
/**
 * Return the names or objects of the taxonomies which are registered for the requested object or object type, such as
 * a post object or post type name.
 *
 * Example:
 *
 *     $taxonomies = get_object_taxonomies( 'post' );
 *
 * This results in:
 *
 *     Array( 'category', 'post_tag' )
 *
 * @since 2.3.0
 *
 * @global array $wp_taxonomies The registered taxonomies.
 *
 * @param array|string|WP_Post $object Name of the type of taxonomy object, or an object (row from posts)
 * @param string               $output Optional. The type of output to return in the array. Accepts either
 *                                     taxonomy 'names' or 'objects'. Default 'names'.
 * @return array The names of all taxonomy of $object_type.
 */
function get_object_taxonomies($object, $output = 'names')
{
}
/**
 * Retrieves the taxonomy object of $taxonomy.
 *
 * The get_taxonomy function will first check that the parameter string given
 * is a taxonomy object and if it is, it will return it.
 *
 * @since 2.3.0
 *
 * @global array $wp_taxonomies The registered taxonomies.
 *
 * @param string $taxonomy Name of taxonomy object to return.
 * @return WP_Taxonomy|false The Taxonomy Object or false if $taxonomy doesn't exist.
 */
function get_taxonomy($taxonomy)
{
}
/**
 * Checks that the taxonomy name exists.
 *
 * Formerly is_taxonomy(), introduced in 2.3.0.
 *
 * @since 3.0.0
 *
 * @global array $wp_taxonomies The registered taxonomies.
 *
 * @param string $taxonomy Name of taxonomy object.
 * @return bool Whether the taxonomy exists.
 */
function taxonomy_exists($taxonomy)
{
}
/**
 * Whether the taxonomy object is hierarchical.
 *
 * Checks to make sure that the taxonomy is an object first. Then Gets the
 * object, and finally returns the hierarchical value in the object.
 *
 * A false return value might also mean that the taxonomy does not exist.
 *
 * @since 2.3.0
 *
 * @param string $taxonomy Name of taxonomy object.
 * @return bool Whether the taxonomy is hierarchical.
 */
function is_taxonomy_hierarchical($taxonomy)
{
}
/**
 * Creates or modifies a taxonomy object.
 *
 * Note: Do not use before the {@see 'init'} hook.
 *
 * A simple function for creating or modifying a taxonomy object based on
 * the parameters given. If modifying an existing taxonomy object, note
 * that the `$object_type` value from the original registration will be
 * overwritten.
 *
 * @since 2.3.0
 * @since 4.2.0 Introduced `show_in_quick_edit` argument.
 * @since 4.4.0 The `show_ui` argument is now enforced on the term editing screen.
 * @since 4.4.0 The `public` argument now controls whether the taxonomy can be queried on the front end.
 * @since 4.5.0 Introduced `publicly_queryable` argument.
 * @since 4.7.0 Introduced `show_in_rest`, 'rest_base' and 'rest_controller_class'
 *              arguments to register the Taxonomy in REST API.
 *
 * @global array $wp_taxonomies Registered taxonomies.
 *
 * @param string       $taxonomy    Taxonomy key, must not exceed 32 characters.
 * @param array|string $object_type Object type or array of object types with which the taxonomy should be associated.
 * @param array|string $args        {
 *     Optional. Array or query string of arguments for registering a taxonomy.
 *
 *     @type array         $labels                An array of labels for this taxonomy. By default, Tag labels are
 *                                                used for non-hierarchical taxonomies, and Category labels are used
 *                                                for hierarchical taxonomies. See accepted values in
 *                                                get_taxonomy_labels(). Default empty array.
 *     @type string        $description           A short descriptive summary of what the taxonomy is for. Default empty.
 *     @type bool          $public                Whether a taxonomy is intended for use publicly either via
 *                                                the admin interface or by front-end users. The default settings
 *                                                of `$publicly_queryable`, `$show_ui`, and `$show_in_nav_menus`
 *                                                are inherited from `$public`.
 *     @type bool          $publicly_queryable    Whether the taxonomy is publicly queryable.
 *                                                If not set, the default is inherited from `$public`
 *     @type bool          $hierarchical          Whether the taxonomy is hierarchical. Default false.
 *     @type bool          $show_ui               Whether to generate and allow a UI for managing terms in this taxonomy in
 *                                                the admin. If not set, the default is inherited from `$public`
 *                                                (default true).
 *     @type bool          $show_in_menu          Whether to show the taxonomy in the admin menu. If true, the taxonomy is
 *                                                shown as a submenu of the object type menu. If false, no menu is shown.
 *                                                `$show_ui` must be true. If not set, default is inherited from `$show_ui`
 *                                                (default true).
 *     @type bool          $show_in_nav_menus     Makes this taxonomy available for selection in navigation menus. If not
 *                                                set, the default is inherited from `$public` (default true).
 *     @type bool          $show_in_rest          Whether to include the taxonomy in the REST API.
 *     @type string        $rest_base             To change the base url of REST API route. Default is $taxonomy.
 *     @type string        $rest_controller_class REST API Controller class name. Default is 'WP_REST_Terms_Controller'.
 *     @type bool          $show_tagcloud         Whether to list the taxonomy in the Tag Cloud Widget controls. If not set,
 *                                                the default is inherited from `$show_ui` (default true).
 *     @type bool          $show_in_quick_edit    Whether to show the taxonomy in the quick/bulk edit panel. It not set,
 *                                                the default is inherited from `$show_ui` (default true).
 *     @type bool          $show_admin_column     Whether to display a column for the taxonomy on its post type listing
 *                                                screens. Default false.
 *     @type bool|callable $meta_box_cb           Provide a callback function for the meta box display. If not set,
 *                                                post_categories_meta_box() is used for hierarchical taxonomies, and
 *                                                post_tags_meta_box() is used for non-hierarchical. If false, no meta
 *                                                box is shown.
 *     @type array         $capabilities {
 *         Array of capabilities for this taxonomy.
 *
 *         @type string $manage_terms Default 'manage_categories'.
 *         @type string $edit_terms   Default 'manage_categories'.
 *         @type string $delete_terms Default 'manage_categories'.
 *         @type string $assign_terms Default 'edit_posts'.
 *     }
 *     @type bool|array    $rewrite {
 *         Triggers the handling of rewrites for this taxonomy. Default true, using $taxonomy as slug. To prevent
 *         rewrite, set to false. To specify rewrite rules, an array can be passed with any of these keys:
 *
 *         @type string $slug         Customize the permastruct slug. Default `$taxonomy` key.
 *         @type bool   $with_front   Should the permastruct be prepended with WP_Rewrite::$front. Default true.
 *         @type bool   $hierarchical Either hierarchical rewrite tag or not. Default false.
 *         @type int    $ep_mask      Assign an endpoint mask. Default `EP_NONE`.
 *     }
 *     @type string        $query_var             Sets the query var key for this taxonomy. Default `$taxonomy` key. If
 *                                                false, a taxonomy cannot be loaded at `?{query_var}={term_slug}`. If a
 *                                                string, the query `?{query_var}={term_slug}` will be valid.
 *     @type callable      $update_count_callback Works much like a hook, in that it will be called when the count is
 *                                                updated. Default _update_post_term_count() for taxonomies attached
 *                                                to post types, which confirms that the objects are published before
 *                                                counting them. Default _update_generic_term_count() for taxonomies
 *                                                attached to other object types, such as users.
 *     @type bool          $_builtin              This taxonomy is a "built-in" taxonomy. INTERNAL USE ONLY!
 *                                                Default false.
 * }
 * @return WP_Error|void WP_Error, if errors.
 */
function register_taxonomy($taxonomy, $object_type, $args = array())
{
}
/**
 * Unregisters a taxonomy.
 *
 * Can not be used to unregister built-in taxonomies.
 *
 * @since 4.5.0
 *
 * @global WP    $wp            Current WordPress environment instance.
 * @global array $wp_taxonomies List of taxonomies.
 *
 * @param string $taxonomy Taxonomy name.
 * @return bool|WP_Error True on success, WP_Error on failure or if the taxonomy doesn't exist.
 */
function unregister_taxonomy($taxonomy)
{
}
/**
 * Builds an object with all taxonomy labels out of a taxonomy object.
 *
 * @since 3.0.0
 * @since 4.3.0 Added the `no_terms` label.
 * @since 4.4.0 Added the `items_list_navigation` and `items_list` labels.
 * @since 4.9.0 Added the `most_used` and `back_to_items` labels.
 *
 * @param WP_Taxonomy $tax Taxonomy object.
 * @return object {
 *     Taxonomy labels object. The first default value is for non-hierarchical taxonomies
 *     (like tags) and the second one is for hierarchical taxonomies (like categories).
 *
 *     @type string $name                       General name for the taxonomy, usually plural. The same
 *                                              as and overridden by `$tax->label`. Default 'Tags'/'Categories'.
 *     @type string $singular_name              Name for one object of this taxonomy. Default 'Tag'/'Category'.
 *     @type string $search_items               Default 'Search Tags'/'Search Categories'.
 *     @type string $popular_items              This label is only used for non-hierarchical taxonomies.
 *                                              Default 'Popular Tags'.
 *     @type string $all_items                  Default 'All Tags'/'All Categories'.
 *     @type string $parent_item                This label is only used for hierarchical taxonomies. Default
 *                                              'Parent Category'.
 *     @type string $parent_item_colon          The same as `parent_item`, but with colon `:` in the end.
 *     @type string $edit_item                  Default 'Edit Tag'/'Edit Category'.
 *     @type string $view_item                  Default 'View Tag'/'View Category'.
 *     @type string $update_item                Default 'Update Tag'/'Update Category'.
 *     @type string $add_new_item               Default 'Add New Tag'/'Add New Category'.
 *     @type string $new_item_name              Default 'New Tag Name'/'New Category Name'.
 *     @type string $separate_items_with_commas This label is only used for non-hierarchical taxonomies. Default
 *                                              'Separate tags with commas', used in the meta box.
 *     @type string $add_or_remove_items        This label is only used for non-hierarchical taxonomies. Default
 *                                              'Add or remove tags', used in the meta box when JavaScript
 *                                              is disabled.
 *     @type string $choose_from_most_used      This label is only used on non-hierarchical taxonomies. Default
 *                                              'Choose from the most used tags', used in the meta box.
 *     @type string $not_found                  Default 'No tags found'/'No categories found', used in
 *                                              the meta box and taxonomy list table.
 *     @type string $no_terms                   Default 'No tags'/'No categories', used in the posts and media
 *                                              list tables.
 *     @type string $items_list_navigation      Label for the table pagination hidden heading.
 *     @type string $items_list                 Label for the table hidden heading.
 *     @type string $most_used                  Title for the Most Used tab. Default 'Most Used'.
 *     @type string $back_to_items              Label displayed after a term has been updated.
 * }
 */
function get_taxonomy_labels($tax)
{
}
/**
 * Add an already registered taxonomy to an object type.
 *
 * @since 3.0.0
 *
 * @global array $wp_taxonomies The registered taxonomies.
 *
 * @param string $taxonomy    Name of taxonomy object.
 * @param string $object_type Name of the object type.
 * @return bool True if successful, false if not.
 */
function register_taxonomy_for_object_type($taxonomy, $object_type)
{
}
/**
 * Remove an already registered taxonomy from an object type.
 *
 * @since 3.7.0
 *
 * @global array $wp_taxonomies The registered taxonomies.
 *
 * @param string $taxonomy    Name of taxonomy object.
 * @param string $object_type Name of the object type.
 * @return bool True if successful, false if not.
 */
function unregister_taxonomy_for_object_type($taxonomy, $object_type)
{
}
//
// Term API
//
/**
 * Retrieve object_ids of valid taxonomy and term.
 *
 * The strings of $taxonomies must exist before this function will continue. On
 * failure of finding a valid taxonomy, it will return an WP_Error class, kind
 * of like Exceptions in PHP 5, except you can't catch them. Even so, you can
 * still test for the WP_Error class and get the error message.
 *
 * The $terms aren't checked the same as $taxonomies, but still need to exist
 * for $object_ids to be returned.
 *
 * It is possible to change the order that object_ids is returned by either
 * using PHP sort family functions or using the database by using $args with
 * either ASC or DESC array. The value should be in the key named 'order'.
 *
 * @since 2.3.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param int|array    $term_ids   Term id or array of term ids of terms that will be used.
 * @param string|array $taxonomies String of taxonomy name or Array of string values of taxonomy names.
 * @param array|string $args       Change the order of the object_ids, either ASC or DESC.
 * @return WP_Error|array If the taxonomy does not exist, then WP_Error will be returned. On success.
 *	the array can be empty meaning that there are no $object_ids found or it will return the $object_ids found.
 */
function get_objects_in_term($term_ids, $taxonomies, $args = array())
{
}
/**
 * Given a taxonomy query, generates SQL to be appended to a main query.
 *
 * @since 3.1.0
 *
 * @see WP_Tax_Query
 *
 * @param array  $tax_query         A compact tax query
 * @param string $primary_table
 * @param string $primary_id_column
 * @return array
 */
function get_tax_sql($tax_query, $primary_table, $primary_id_column)
{
}
/**
 * Get all Term data from database by Term ID.
 *
 * The usage of the get_term function is to apply filters to a term object. It
 * is possible to get a term object from the database before applying the
 * filters.
 *
 * $term ID must be part of $taxonomy, to get from the database. Failure, might
 * be able to be captured by the hooks. Failure would be the same value as $wpdb
 * returns for the get_row method.
 *
 * There are two hooks, one is specifically for each term, named 'get_term', and
 * the second is for the taxonomy name, 'term_$taxonomy'. Both hooks gets the
 * term object, and the taxonomy name as parameters. Both hooks are expected to
 * return a Term object.
 *
 * {@see 'get_term'} hook - Takes two parameters the term Object and the taxonomy name.
 * Must return term object. Used in get_term() as a catch-all filter for every
 * $term.
 *
 * {@see 'get_$taxonomy'} hook - Takes two parameters the term Object and the taxonomy
 * name. Must return term object. $taxonomy will be the taxonomy name, so for
 * example, if 'category', it would be 'get_category' as the filter name. Useful
 * for custom taxonomies or plugging into default taxonomies.
 *
 * @todo Better formatting for DocBlock
 *
 * @since 2.3.0
 * @since 4.4.0 Converted to return a WP_Term object if `$output` is `OBJECT`.
 *              The `$taxonomy` parameter was made optional.
 *
 * @see sanitize_term_field() The $context param lists the available values for get_term_by() $filter param.
 *
 * @param int|WP_Term|object $term If integer, term data will be fetched from the database, or from the cache if
 *                                 available. If stdClass object (as in the results of a database query), will apply
 *                                 filters and return a `WP_Term` object corresponding to the `$term` data. If `WP_Term`,
 *                                 will return `$term`.
 * @param string     $taxonomy Optional. Taxonomy name that $term is part of.
 * @param string     $output   Optional. The required return type. One of OBJECT, ARRAY_A, or ARRAY_N, which correspond to
 *                             a WP_Term object, an associative array, or a numeric array, respectively. Default OBJECT.
 * @param string     $filter   Optional, default is raw or no WordPress defined filter will applied.
 * @return array|WP_Term|WP_Error|null Object of the type specified by `$output` on success. When `$output` is 'OBJECT',
 *                                     a WP_Term instance is returned. If taxonomy does not exist, a WP_Error is
 *                                     returned. Returns null for miscellaneous failure.
 */
function get_term($term, $taxonomy = '', $output = \OBJECT, $filter = 'raw')
{
}
/**
 * Get all Term data from database by Term field and data.
 *
 * Warning: $value is not escaped for 'name' $field. You must do it yourself, if
 * required.
 *
 * The default $field is 'id', therefore it is possible to also use null for
 * field, but not recommended that you do so.
 *
 * If $value does not exist, the return value will be false. If $taxonomy exists
 * and $field and $value combinations exist, the Term will be returned.
 *
 * This function will always return the first term that matches the `$field`-
 * `$value`-`$taxonomy` combination specified in the parameters. If your query
 * is likely to match more than one term (as is likely to be the case when
 * `$field` is 'name', for example), consider using get_terms() instead; that
 * way, you will get all matching terms, and can provide your own logic for
 * deciding which one was intended.
 *
 * @todo Better formatting for DocBlock.
 *
 * @since 2.3.0
 * @since 4.4.0 `$taxonomy` is optional if `$field` is 'term_taxonomy_id'. Converted to return
 *              a WP_Term object if `$output` is `OBJECT`.
 *
 * @see sanitize_term_field() The $context param lists the available values for get_term_by() $filter param.
 *
 * @param string     $field    Either 'slug', 'name', 'id' (term_id), or 'term_taxonomy_id'
 * @param string|int $value    Search for this term value
 * @param string     $taxonomy Taxonomy name. Optional, if `$field` is 'term_taxonomy_id'.
 * @param string     $output   Optional. The required return type. One of OBJECT, ARRAY_A, or ARRAY_N, which correspond to
 *                             a WP_Term object, an associative array, or a numeric array, respectively. Default OBJECT.
 * @param string     $filter   Optional, default is raw or no WordPress defined filter will applied.
 * @return WP_Term|array|false WP_Term instance (or array) on success. Will return false if `$taxonomy` does not exist
 *                             or `$term` was not found.
 */
function get_term_by($field, $value, $taxonomy = '', $output = \OBJECT, $filter = 'raw')
{
}
/**
 * Merge all term children into a single array of their IDs.
 *
 * This recursive function will merge all of the children of $term into the same
 * array of term IDs. Only useful for taxonomies which are hierarchical.
 *
 * Will return an empty array if $term does not exist in $taxonomy.
 *
 * @since 2.3.0
 *
 * @param int    $term_id  ID of Term to get children.
 * @param string $taxonomy Taxonomy Name.
 * @return array|WP_Error List of Term IDs. WP_Error returned if `$taxonomy` does not exist.
 */
function get_term_children($term_id, $taxonomy)
{
}
/**
 * Get sanitized Term field.
 *
 * The function is for contextual reasons and for simplicity of usage.
 *
 * @since 2.3.0
 * @since 4.4.0 The `$taxonomy` parameter was made optional. `$term` can also now accept a WP_Term object.
 *
 * @see sanitize_term_field()
 *
 * @param string      $field    Term field to fetch.
 * @param int|WP_Term $term     Term ID or object.
 * @param string      $taxonomy Optional. Taxonomy Name. Default empty.
 * @param string      $context  Optional, default is display. Look at sanitize_term_field() for available options.
 * @return string|int|null|WP_Error Will return an empty string if $term is not an object or if $field is not set in $term.
 */
function get_term_field($field, $term, $taxonomy = '', $context = 'display')
{
}
/**
 * Sanitizes Term for editing.
 *
 * Return value is sanitize_term() and usage is for sanitizing the term for
 * editing. Function is for contextual and simplicity.
 *
 * @since 2.3.0
 *
 * @param int|object $id       Term ID or object.
 * @param string     $taxonomy Taxonomy name.
 * @return string|int|null|WP_Error Will return empty string if $term is not an object.
 */
function get_term_to_edit($id, $taxonomy)
{
}
/**
 * Retrieve the terms in a given taxonomy or list of taxonomies.
 *
 * You can fully inject any customizations to the query before it is sent, as
 * well as control the output with a filter.
 *
 * The {@see 'get_terms'} filter will be called when the cache has the term and will
 * pass the found term along with the array of $taxonomies and array of $args.
 * This filter is also called before the array of terms is passed and will pass
 * the array of terms, along with the $taxonomies and $args.
 *
 * The {@see 'list_terms_exclusions'} filter passes the compiled exclusions along with
 * the $args.
 *
 * The {@see 'get_terms_orderby'} filter passes the `ORDER BY` clause for the query
 * along with the $args array.
 *
 * Prior to 4.5.0, the first parameter of `get_terms()` was a taxonomy or list of taxonomies:
 *
 *     $terms = get_terms( 'post_tag', array(
 *         'hide_empty' => false,
 *     ) );
 *
 * Since 4.5.0, taxonomies should be passed via the 'taxonomy' argument in the `$args` array:
 *
 *     $terms = get_terms( array(
 *         'taxonomy' => 'post_tag',
 *         'hide_empty' => false,
 *     ) );
 *
 * @since 2.3.0
 * @since 4.2.0 Introduced 'name' and 'childless' parameters.
 * @since 4.4.0 Introduced the ability to pass 'term_id' as an alias of 'id' for the `orderby` parameter.
 *              Introduced the 'meta_query' and 'update_term_meta_cache' parameters. Converted to return
 *              a list of WP_Term objects.
 * @since 4.5.0 Changed the function signature so that the `$args` array can be provided as the first parameter.
 *              Introduced 'meta_key' and 'meta_value' parameters. Introduced the ability to order results by metadata.
 * @since 4.8.0 Introduced 'suppress_filter' parameter.
 *
 * @internal The `$deprecated` parameter is parsed for backward compatibility only.
 *
 * @param string|array $args       Optional. Array or string of arguments. See WP_Term_Query::__construct()
 *                                 for information on accepted arguments. Default empty.
 * @param array        $deprecated Argument array, when using the legacy function parameter format. If present, this
 *                                 parameter will be interpreted as `$args`, and the first function parameter will
 *                                 be parsed as a taxonomy or array of taxonomies.
 * @return array|int|WP_Error List of WP_Term instances and their children. Will return WP_Error, if any of $taxonomies
 *                            do not exist.
 */
function get_terms($args = array(), $deprecated = '')
{
}
/**
 * Adds metadata to a term.
 *
 * @since 4.4.0
 *
 * @param int    $term_id    Term ID.
 * @param string $meta_key   Metadata name.
 * @param mixed  $meta_value Metadata value.
 * @param bool   $unique     Optional. Whether to bail if an entry with the same key is found for the term.
 *                           Default false.
 * @return int|WP_Error|bool Meta ID on success. WP_Error when term_id is ambiguous between taxonomies.
 *                           False on failure.
 */
function add_term_meta($term_id, $meta_key, $meta_value, $unique = \false)
{
}
/**
 * Removes metadata matching criteria from a term.
 *
 * @since 4.4.0
 *
 * @param int    $term_id    Term ID.
 * @param string $meta_key   Metadata name.
 * @param mixed  $meta_value Optional. Metadata value. If provided, rows will only be removed that match the value.
 * @return bool True on success, false on failure.
 */
function delete_term_meta($term_id, $meta_key, $meta_value = '')
{
}
/**
 * Retrieves metadata for a term.
 *
 * @since 4.4.0
 *
 * @param int    $term_id Term ID.
 * @param string $key     Optional. The meta key to retrieve. If no key is provided, fetches all metadata for the term.
 * @param bool   $single  Whether to return a single value. If false, an array of all values matching the
 *                        `$term_id`/`$key` pair will be returned. Default: false.
 * @return mixed If `$single` is false, an array of metadata values. If `$single` is true, a single metadata value.
 */
function get_term_meta($term_id, $key = '', $single = \false)
{
}
/**
 * Updates term metadata.
 *
 * Use the `$prev_value` parameter to differentiate between meta fields with the same key and term ID.
 *
 * If the meta field for the term does not exist, it will be added.
 *
 * @since 4.4.0
 *
 * @param int    $term_id    Term ID.
 * @param string $meta_key   Metadata key.
 * @param mixed  $meta_value Metadata value.
 * @param mixed  $prev_value Optional. Previous value to check before removing.
 * @return int|WP_Error|bool Meta ID if the key didn't previously exist. True on successful update.
 *                           WP_Error when term_id is ambiguous between taxonomies. False on failure.
 */
function update_term_meta($term_id, $meta_key, $meta_value, $prev_value = '')
{
}
/**
 * Updates metadata cache for list of term IDs.
 *
 * Performs SQL query to retrieve all metadata for the terms matching `$term_ids` and stores them in the cache.
 * Subsequent calls to `get_term_meta()` will not need to query the database.
 *
 * @since 4.4.0
 *
 * @param array $term_ids List of term IDs.
 * @return array|false Returns false if there is nothing to update. Returns an array of metadata on success.
 */
function update_termmeta_cache($term_ids)
{
}
/**
 * Get all meta data, including meta IDs, for the given term ID.
 *
 * @since 4.9.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param int $term_id Term ID.
 * @return array|false Array with meta data, or false when the meta table is not installed.
 */
function has_term_meta($term_id)
{
}
/**
 * Registers a meta key for terms.
 *
 * @since 4.9.8
 *
 * @param string $taxonomy Taxonomy to register a meta key for. Pass an empty string
 *                         to register the meta key across all existing taxonomies.
 * @param string $meta_key The meta key to register.
 * @param array  $args     Data used to describe the meta key when registered. See
 *                         {@see register_meta()} for a list of supported arguments.
 * @return bool True if the meta key was successfully registered, false if not.
 */
function register_term_meta($taxonomy, $meta_key, array $args)
{
}
/**
 * Unregisters a meta key for terms.
 *
 * @since 4.9.8
 *
 * @param string $taxonomy Taxonomy the meta key is currently registered for. Pass
 *                         an empty string if the meta key is registered across all
 *                         existing taxonomies.
 * @param string $meta_key The meta key to unregister.
 * @return bool True on success, false if the meta key was not previously registered.
 */
function unregister_term_meta($taxonomy, $meta_key)
{
}
/**
 * Check if Term exists.
 *
 * Formerly is_term(), introduced in 2.3.0.
 *
 * @since 3.0.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param int|string $term     The term to check. Accepts term ID, slug, or name.
 * @param string     $taxonomy The taxonomy name to use
 * @param int        $parent   Optional. ID of parent term under which to confine the exists search.
 * @return mixed Returns null if the term does not exist. Returns the term ID
 *               if no taxonomy is specified and the term ID exists. Returns
 *               an array of the term ID and the term taxonomy ID the taxonomy
 *               is specified and the pairing exists.
 */
function term_exists($term, $taxonomy = '', $parent = \null)
{
}
/**
 * Check if a term is an ancestor of another term.
 *
 * You can use either an id or the term object for both parameters.
 *
 * @since 3.4.0
 *
 * @param int|object $term1    ID or object to check if this is the parent term.
 * @param int|object $term2    The child term.
 * @param string     $taxonomy Taxonomy name that $term1 and `$term2` belong to.
 * @return bool Whether `$term2` is a child of `$term1`.
 */
function term_is_ancestor_of($term1, $term2, $taxonomy)
{
}
/**
 * Sanitize Term all fields.
 *
 * Relies on sanitize_term_field() to sanitize the term. The difference is that
 * this function will sanitize <strong>all</strong> fields. The context is based
 * on sanitize_term_field().
 *
 * The $term is expected to be either an array or an object.
 *
 * @since 2.3.0
 *
 * @param array|object $term     The term to check.
 * @param string       $taxonomy The taxonomy name to use.
 * @param string       $context  Optional. Context in which to sanitize the term. Accepts 'edit', 'db',
 *                               'display', 'attribute', or 'js'. Default 'display'.
 * @return array|object Term with all fields sanitized.
 */
function sanitize_term($term, $taxonomy, $context = 'display')
{
}
/**
 * Cleanse the field value in the term based on the context.
 *
 * Passing a term field value through the function should be assumed to have
 * cleansed the value for whatever context the term field is going to be used.
 *
 * If no context or an unsupported context is given, then default filters will
 * be applied.
 *
 * There are enough filters for each context to support a custom filtering
 * without creating your own filter function. Simply create a function that
 * hooks into the filter you need.
 *
 * @since 2.3.0
 *
 * @param string $field    Term field to sanitize.
 * @param string $value    Search for this term value.
 * @param int    $term_id  Term ID.
 * @param string $taxonomy Taxonomy Name.
 * @param string $context  Context in which to sanitize the term field. Accepts 'edit', 'db', 'display',
 *                         'attribute', or 'js'.
 * @return mixed Sanitized field.
 */
function sanitize_term_field($field, $value, $term_id, $taxonomy, $context)
{
}
/**
 * Count how many terms are in Taxonomy.
 *
 * Default $args is 'hide_empty' which can be 'hide_empty=true' or array('hide_empty' => true).
 *
 * @since 2.3.0
 *
 * @param string       $taxonomy Taxonomy name.
 * @param array|string $args     Optional. Array of arguments that get passed to get_terms().
 *                               Default empty array.
 * @return array|int|WP_Error Number of terms in that taxonomy or WP_Error if the taxonomy does not exist.
 */
function wp_count_terms($taxonomy, $args = array())
{
}
/**
 * Will unlink the object from the taxonomy or taxonomies.
 *
 * Will remove all relationships between the object and any terms in
 * a particular taxonomy or taxonomies. Does not remove the term or
 * taxonomy itself.
 *
 * @since 2.3.0
 *
 * @param int          $object_id  The term Object Id that refers to the term.
 * @param string|array $taxonomies List of Taxonomy Names or single Taxonomy name.
 */
function wp_delete_object_term_relationships($object_id, $taxonomies)
{
}
/**
 * Removes a term from the database.
 *
 * If the term is a parent of other terms, then the children will be updated to
 * that term's parent.
 *
 * Metadata associated with the term will be deleted.
 *
 * @since 2.3.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param int          $term     Term ID.
 * @param string       $taxonomy Taxonomy Name.
 * @param array|string $args {
 *     Optional. Array of arguments to override the default term ID. Default empty array.
 *
 *     @type int  $default       The term ID to make the default term. This will only override
 *                               the terms found if there is only one term found. Any other and
 *                               the found terms are used.
 *     @type bool $force_default Optional. Whether to force the supplied term as default to be
 *                               assigned even if the object was not going to be term-less.
 *                               Default false.
 * }
 * @return bool|int|WP_Error True on success, false if term does not exist. Zero on attempted
 *                           deletion of default Category. WP_Error if the taxonomy does not exist.
 */
function wp_delete_term($term, $taxonomy, $args = array())
{
}
/**
 * Deletes one existing category.
 *
 * @since 2.0.0
 *
 * @param int $cat_ID Category term ID.
 * @return bool|int|WP_Error Returns true if completes delete action; false if term doesn't exist;
 * 	Zero on attempted deletion of default Category; WP_Error object is also a possibility.
 */
function wp_delete_category($cat_ID)
{
}
/**
 * Retrieves the terms associated with the given object(s), in the supplied taxonomies.
 *
 * @since 2.3.0
 * @since 4.2.0 Added support for 'taxonomy', 'parent', and 'term_taxonomy_id' values of `$orderby`.
 *              Introduced `$parent` argument.
 * @since 4.4.0 Introduced `$meta_query` and `$update_term_meta_cache` arguments. When `$fields` is 'all' or
 *              'all_with_object_id', an array of `WP_Term` objects will be returned.
 * @since 4.7.0 Refactored to use WP_Term_Query, and to support any WP_Term_Query arguments.
 *
 * @param int|array    $object_ids The ID(s) of the object(s) to retrieve.
 * @param string|array $taxonomies The taxonomies to retrieve terms from.
 * @param array|string $args       See WP_Term_Query::__construct() for supported arguments.
 * @return array|WP_Error The requested term data or empty array if no terms found.
 *                        WP_Error if any of the $taxonomies don't exist.
 */
function wp_get_object_terms($object_ids, $taxonomies, $args = array())
{
}
/**
 * Add a new term to the database.
 *
 * A non-existent term is inserted in the following sequence:
 * 1. The term is added to the term table, then related to the taxonomy.
 * 2. If everything is correct, several actions are fired.
 * 3. The 'term_id_filter' is evaluated.
 * 4. The term cache is cleaned.
 * 5. Several more actions are fired.
 * 6. An array is returned containing the term_id and term_taxonomy_id.
 *
 * If the 'slug' argument is not empty, then it is checked to see if the term
 * is invalid. If it is not a valid, existing term, it is added and the term_id
 * is given.
 *
 * If the taxonomy is hierarchical, and the 'parent' argument is not empty,
 * the term is inserted and the term_id will be given.
 *
 * Error handling:
 * If $taxonomy does not exist or $term is empty,
 * a WP_Error object will be returned.
 *
 * If the term already exists on the same hierarchical level,
 * or the term slug and name are not unique, a WP_Error object will be returned.
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @since 2.3.0
 *
 * @param string       $term     The term to add or update.
 * @param string       $taxonomy The taxonomy to which to add the term.
 * @param array|string $args {
 *     Optional. Array or string of arguments for inserting a term.
 *
 *     @type string $alias_of    Slug of the term to make this term an alias of.
 *                               Default empty string. Accepts a term slug.
 *     @type string $description The term description. Default empty string.
 *     @type int    $parent      The id of the parent term. Default 0.
 *     @type string $slug        The term slug to use. Default empty string.
 * }
 * @return array|WP_Error An array containing the `term_id` and `term_taxonomy_id`,
 *                        WP_Error otherwise.
 */
function wp_insert_term($term, $taxonomy, $args = array())
{
}
/**
 * Create Term and Taxonomy Relationships.
 *
 * Relates an object (post, link etc) to a term and taxonomy type. Creates the
 * term and taxonomy relationship if it doesn't already exist. Creates a term if
 * it doesn't exist (using the slug).
 *
 * A relationship means that the term is grouped in or belongs to the taxonomy.
 * A term has no meaning until it is given context by defining which taxonomy it
 * exists under.
 *
 * @since 2.3.0
 *
 * @global wpdb $wpdb The WordPress database abstraction object.
 *
 * @param int              $object_id The object to relate to.
 * @param string|int|array $terms     A single term slug, single term id, or array of either term slugs or ids.
 *                                    Will replace all existing related terms in this taxonomy. Passing an
 *                                    empty value will remove all related terms.
 * @param string           $taxonomy  The context in which to relate the term to the object.
 * @param bool             $append    Optional. If false will delete difference of terms. Default false.
 * @return array|WP_Error Term taxonomy IDs of the affected terms.
 */
function wp_set_object_terms($object_id, $terms, $taxonomy, $append = \false)
{
}
/**
 * Add term(s) associated with a given object.
 *
 * @since 3.6.0
 *
 * @param int              $object_id The ID of the object to which the terms will be added.
 * @param string|int|array $terms     The slug(s) or ID(s) of the term(s) to add.
 * @param array|string     $taxonomy  Taxonomy name.
 * @return array|WP_Error Term taxonomy IDs of the affected terms.
 */
function wp_add_object_terms($object_id, $terms, $taxonomy)
{
}
/**
 * Remove term(s) associated with a given object.
 *
 * @since 3.6.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param int              $object_id The ID of the object from which the terms will be removed.
 * @param string|int|array $terms     The slug(s) or ID(s) of the term(s) to remove.
 * @param array|string     $taxonomy  Taxonomy name.
 * @return bool|WP_Error True on success, false or WP_Error on failure.
 */
function wp_remove_object_terms($object_id, $terms, $taxonomy)
{
}
/**
 * Will make slug unique, if it isn't already.
 *
 * The `$slug` has to be unique global to every taxonomy, meaning that one
 * taxonomy term can't have a matching slug with another taxonomy term. Each
 * slug has to be globally unique for every taxonomy.
 *
 * The way this works is that if the taxonomy that the term belongs to is
 * hierarchical and has a parent, it will append that parent to the $slug.
 *
 * If that still doesn't return an unique slug, then it try to append a number
 * until it finds a number that is truly unique.
 *
 * The only purpose for `$term` is for appending a parent, if one exists.
 *
 * @since 2.3.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param string $slug The string that will be tried for a unique slug.
 * @param object $term The term object that the `$slug` will belong to.
 * @return string Will return a true unique slug.
 */
function wp_unique_term_slug($slug, $term)
{
}
/**
 * Update term based on arguments provided.
 *
 * The $args will indiscriminately override all values with the same field name.
 * Care must be taken to not override important information need to update or
 * update will fail (or perhaps create a new term, neither would be acceptable).
 *
 * Defaults will set 'alias_of', 'description', 'parent', and 'slug' if not
 * defined in $args already.
 *
 * 'alias_of' will create a term group, if it doesn't already exist, and update
 * it for the $term.
 *
 * If the 'slug' argument in $args is missing, then the 'name' in $args will be
 * used. It should also be noted that if you set 'slug' and it isn't unique then
 * a WP_Error will be passed back. If you don't pass any slug, then a unique one
 * will be created for you.
 *
 * For what can be overrode in `$args`, check the term scheme can contain and stay
 * away from the term keys.
 *
 * @since 2.3.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param int          $term_id  The ID of the term
 * @param string       $taxonomy The context in which to relate the term to the object.
 * @param array|string $args     Optional. Array of get_terms() arguments. Default empty array.
 * @return array|WP_Error Returns Term ID and Taxonomy Term ID
 */
function wp_update_term($term_id, $taxonomy, $args = array())
{
}
/**
 * Enable or disable term counting.
 *
 * @since 2.5.0
 *
 * @staticvar bool $_defer
 *
 * @param bool $defer Optional. Enable if true, disable if false.
 * @return bool Whether term counting is enabled or disabled.
 */
function wp_defer_term_counting($defer = \null)
{
}
/**
 * Updates the amount of terms in taxonomy.
 *
 * If there is a taxonomy callback applied, then it will be called for updating
 * the count.
 *
 * The default action is to count what the amount of terms have the relationship
 * of term ID. Once that is done, then update the database.
 *
 * @since 2.3.0
 *
 * @staticvar array $_deferred
 *
 * @param int|array $terms       The term_taxonomy_id of the terms.
 * @param string    $taxonomy    The context of the term.
 * @param bool      $do_deferred Whether to flush the deferred term counts too. Default false.
 * @return bool If no terms will return false, and if successful will return true.
 */
function wp_update_term_count($terms, $taxonomy, $do_deferred = \false)
{
}
/**
 * Perform term count update immediately.
 *
 * @since 2.5.0
 *
 * @param array  $terms    The term_taxonomy_id of terms to update.
 * @param string $taxonomy The context of the term.
 * @return true Always true when complete.
 */
function wp_update_term_count_now($terms, $taxonomy)
{
}
//
// Cache
//
/**
 * Removes the taxonomy relationship to terms from the cache.
 *
 * Will remove the entire taxonomy relationship containing term `$object_id`. The
 * term IDs have to exist within the taxonomy `$object_type` for the deletion to
 * take place.
 *
 * @since 2.3.0
 *
 * @global bool $_wp_suspend_cache_invalidation
 *
 * @see get_object_taxonomies() for more on $object_type.
 *
 * @param int|array    $object_ids  Single or list of term object ID(s).
 * @param array|string $object_type The taxonomy object type.
 */
function clean_object_term_cache($object_ids, $object_type)
{
}
/**
 * Will remove all of the term ids from the cache.
 *
 * @since 2.3.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 * @global bool $_wp_suspend_cache_invalidation
 *
 * @param int|array $ids            Single or list of Term IDs.
 * @param string    $taxonomy       Optional. Can be empty and will assume `tt_ids`, else will use for context.
 *                                  Default empty.
 * @param bool      $clean_taxonomy Optional. Whether to clean taxonomy wide caches (true), or just individual
 *                                  term object caches (false). Default true.
 */
function clean_term_cache($ids, $taxonomy = '', $clean_taxonomy = \true)
{
}
/**
 * Clean the caches for a taxonomy.
 *
 * @since 4.9.0
 *
 * @param string $taxonomy Taxonomy slug.
 */
function clean_taxonomy_cache($taxonomy)
{
}
/**
 * Retrieves the taxonomy relationship to the term object id.
 *
 * Upstream functions (like get_the_terms() and is_object_in_term()) are
 * responsible for populating the object-term relationship cache. The current
 * function only fetches relationship data that is already in the cache.
 *
 * @since 2.3.0
 * @since 4.7.0 Returns a WP_Error object if get_term() returns an error for
 *              any of the matched terms.
 *
 * @param int    $id       Term object ID.
 * @param string $taxonomy Taxonomy name.
 * @return bool|array|WP_Error Array of `WP_Term` objects, if cached.
 *                             False if cache is empty for `$taxonomy` and `$id`.
 *                             WP_Error if get_term() returns an error object for any term.
 */
function get_object_term_cache($id, $taxonomy)
{
}
/**
 * Updates the cache for the given term object ID(s).
 *
 * Note: Due to performance concerns, great care should be taken to only update
 * term caches when necessary. Processing time can increase exponentially depending
 * on both the number of passed term IDs and the number of taxonomies those terms
 * belong to.
 *
 * Caches will only be updated for terms not already cached.
 *
 * @since 2.3.0
 *
 * @param string|array $object_ids  Comma-separated list or array of term object IDs.
 * @param array|string $object_type The taxonomy object type.
 * @return void|false False if all of the terms in `$object_ids` are already cached.
 */
function update_object_term_cache($object_ids, $object_type)
{
}
/**
 * Updates Terms to Taxonomy in cache.
 *
 * @since 2.3.0
 *
 * @param array  $terms    List of term objects to change.
 * @param string $taxonomy Optional. Update Term to this taxonomy in cache. Default empty.
 */
function update_term_cache($terms, $taxonomy = '')
{
}
//
// Private
//
/**
 * Retrieves children of taxonomy as Term IDs.
 *
 * @ignore
 * @since 2.3.0
 *
 * @param string $taxonomy Taxonomy name.
 * @return array Empty if $taxonomy isn't hierarchical or returns children as Term IDs.
 */
function _get_term_hierarchy($taxonomy)
{
}
/**
 * Get the subset of $terms that are descendants of $term_id.
 *
 * If `$terms` is an array of objects, then _get_term_children() returns an array of objects.
 * If `$terms` is an array of IDs, then _get_term_children() returns an array of IDs.
 *
 * @access private
 * @since 2.3.0
 *
 * @param int    $term_id   The ancestor term: all returned terms should be descendants of `$term_id`.
 * @param array  $terms     The set of terms - either an array of term objects or term IDs - from which those that
 *                          are descendants of $term_id will be chosen.
 * @param string $taxonomy  The taxonomy which determines the hierarchy of the terms.
 * @param array  $ancestors Optional. Term ancestors that have already been identified. Passed by reference, to keep
 *                          track of found terms when recursing the hierarchy. The array of located ancestors is used
 *                          to prevent infinite recursion loops. For performance, `term_ids` are used as array keys,
 *                          with 1 as value. Default empty array.
 * @return array|WP_Error The subset of $terms that are descendants of $term_id.
 */
function _get_term_children($term_id, $terms, $taxonomy, &$ancestors = array())
{
}
/**
 * Add count of children to parent count.
 *
 * Recalculates term counts by including items from child terms. Assumes all
 * relevant children are already in the $terms argument.
 *
 * @access private
 * @since 2.3.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param array  $terms    List of term objects (passed by reference).
 * @param string $taxonomy Term context.
 */
function _pad_term_counts(&$terms, $taxonomy)
{
}
/**
 * Adds any terms from the given IDs to the cache that do not already exist in cache.
 *
 * @since 4.6.0
 * @access private
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param array $term_ids          Array of term IDs.
 * @param bool  $update_meta_cache Optional. Whether to update the meta cache. Default true.
 */
function _prime_term_caches($term_ids, $update_meta_cache = \true)
{
}
//
// Default callbacks
//
/**
 * Will update term count based on object types of the current taxonomy.
 *
 * Private function for the default callback for post_tag and category
 * taxonomies.
 *
 * @access private
 * @since 2.3.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param array  $terms    List of Term taxonomy IDs.
 * @param object $taxonomy Current taxonomy object of terms.
 */
function _update_post_term_count($terms, $taxonomy)
{
}
/**
 * Will update term count based on number of objects.
 *
 * Default callback for the 'link_category' taxonomy.
 *
 * @since 3.3.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param array  $terms    List of term taxonomy IDs.
 * @param object $taxonomy Current taxonomy object of terms.
 */
function _update_generic_term_count($terms, $taxonomy)
{
}
/**
 * Create a new term for a term_taxonomy item that currently shares its term
 * with another term_taxonomy.
 *
 * @ignore
 * @since 4.2.0
 * @since 4.3.0 Introduced `$record` parameter. Also, `$term_id` and
 *              `$term_taxonomy_id` can now accept objects.
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param int|object $term_id          ID of the shared term, or the shared term object.
 * @param int|object $term_taxonomy_id ID of the term_taxonomy item to receive a new term, or the term_taxonomy object
 *                                     (corresponding to a row from the term_taxonomy table).
 * @param bool       $record           Whether to record data about the split term in the options table. The recording
 *                                     process has the potential to be resource-intensive, so during batch operations
 *                                     it can be beneficial to skip inline recording and do it just once, after the
 *                                     batch is processed. Only set this to `false` if you know what you are doing.
 *                                     Default: true.
 * @return int|WP_Error When the current term does not need to be split (or cannot be split on the current
 *                      database schema), `$term_id` is returned. When the term is successfully split, the
 *                      new term_id is returned. A WP_Error is returned for miscellaneous errors.
 */
function _split_shared_term($term_id, $term_taxonomy_id, $record = \true)
{
}
/**
 * Splits a batch of shared taxonomy terms.
 *
 * @since 4.3.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 */
function _wp_batch_split_terms()
{
}
/**
 * In order to avoid the _wp_batch_split_terms() job being accidentally removed,
 * check that it's still scheduled while we haven't finished splitting terms.
 *
 * @ignore
 * @since 4.3.0
 */
function _wp_check_for_scheduled_split_terms()
{
}
/**
 * Check default categories when a term gets split to see if any of them need to be updated.
 *
 * @ignore
 * @since 4.2.0
 *
 * @param int    $term_id          ID of the formerly shared term.
 * @param int    $new_term_id      ID of the new term created for the $term_taxonomy_id.
 * @param int    $term_taxonomy_id ID for the term_taxonomy row affected by the split.
 * @param string $taxonomy         Taxonomy for the split term.
 */
function _wp_check_split_default_terms($term_id, $new_term_id, $term_taxonomy_id, $taxonomy)
{
}
/**
 * Check menu items when a term gets split to see if any of them need to be updated.
 *
 * @ignore
 * @since 4.2.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param int    $term_id          ID of the formerly shared term.
 * @param int    $new_term_id      ID of the new term created for the $term_taxonomy_id.
 * @param int    $term_taxonomy_id ID for the term_taxonomy row affected by the split.
 * @param string $taxonomy         Taxonomy for the split term.
 */
function _wp_check_split_terms_in_menus($term_id, $new_term_id, $term_taxonomy_id, $taxonomy)
{
}
/**
 * If the term being split is a nav_menu, change associations.
 *
 * @ignore
 * @since 4.3.0
 *
 * @param int    $term_id          ID of the formerly shared term.
 * @param int    $new_term_id      ID of the new term created for the $term_taxonomy_id.
 * @param int    $term_taxonomy_id ID for the term_taxonomy row affected by the split.
 * @param string $taxonomy         Taxonomy for the split term.
 */
function _wp_check_split_nav_menu_terms($term_id, $new_term_id, $term_taxonomy_id, $taxonomy)
{
}
/**
 * Get data about terms that previously shared a single term_id, but have since been split.
 *
 * @since 4.2.0
 *
 * @param int $old_term_id Term ID. This is the old, pre-split term ID.
 * @return array Array of new term IDs, keyed by taxonomy.
 */
function wp_get_split_terms($old_term_id)
{
}
/**
 * Get the new term ID corresponding to a previously split term.
 *
 * @since 4.2.0
 *
 * @param int    $old_term_id Term ID. This is the old, pre-split term ID.
 * @param string $taxonomy    Taxonomy that the term belongs to.
 * @return int|false If a previously split term is found corresponding to the old term_id and taxonomy,
 *                   the new term_id will be returned. If no previously split term is found matching
 *                   the parameters, returns false.
 */
function wp_get_split_term($old_term_id, $taxonomy)
{
}
/**
 * Determine whether a term is shared between multiple taxonomies.
 *
 * Shared taxonomy terms began to be split in 4.3, but failed cron tasks or
 * other delays in upgrade routines may cause shared terms to remain.
 *
 * @since 4.4.0
 *
 * @param int $term_id Term ID.
 * @return bool Returns false if a term is not shared between multiple taxonomies or
 *              if splittng shared taxonomy terms is finished.
 */
function wp_term_is_shared($term_id)
{
}
/**
 * Generate a permalink for a taxonomy term archive.
 *
 * @since 2.5.0
 *
 * @global WP_Rewrite $wp_rewrite
 *
 * @param object|int|string $term     The term object, ID, or slug whose link will be retrieved.
 * @param string            $taxonomy Optional. Taxonomy. Default empty.
 * @return string|WP_Error HTML link to taxonomy term archive on success, WP_Error if term does not exist.
 */
function get_term_link($term, $taxonomy = '')
{
}
/**
 * Display the taxonomies of a post with available options.
 *
 * This function can be used within the loop to display the taxonomies for a
 * post without specifying the Post ID. You can also use it outside the Loop to
 * display the taxonomies for a specific post.
 *
 * @since 2.5.0
 *
 * @param array $args {
 *     Arguments about which post to use and how to format the output. Shares all of the arguments
 *     supported by get_the_taxonomies(), in addition to the following.
 *
 *     @type  int|WP_Post $post   Post ID or object to get taxonomies of. Default current post.
 *     @type  string      $before Displays before the taxonomies. Default empty string.
 *     @type  string      $sep    Separates each taxonomy. Default is a space.
 *     @type  string      $after  Displays after the taxonomies. Default empty string.
 * }
 */
function the_taxonomies($args = array())
{
}
/**
 * Retrieve all taxonomies associated with a post.
 *
 * This function can be used within the loop. It will also return an array of
 * the taxonomies with links to the taxonomy and name.
 *
 * @since 2.5.0
 *
 * @param int|WP_Post $post Optional. Post ID or WP_Post object. Default is global $post.
 * @param array $args {
 *     Optional. Arguments about how to format the list of taxonomies. Default empty array.
 *
 *     @type string $template      Template for displaying a taxonomy label and list of terms.
 *                                 Default is "Label: Terms."
 *     @type string $term_template Template for displaying a single term in the list. Default is the term name
 *                                 linked to its archive.
 * }
 * @return array List of taxonomies.
 */
function get_the_taxonomies($post = 0, $args = array())
{
}
/**
 * Retrieve all taxonomies of a post with just the names.
 *
 * @since 2.5.0
 *
 * @param int|WP_Post $post Optional. Post ID or WP_Post object. Default is global $post.
 * @return array An array of all taxonomy names for the given post.
 */
function get_post_taxonomies($post = 0)
{
}
/**
 * Determine if the given object is associated with any of the given terms.
 *
 * The given terms are checked against the object's terms' term_ids, names and slugs.
 * Terms given as integers will only be checked against the object's terms' term_ids.
 * If no terms are given, determines if object is associated with any terms in the given taxonomy.
 *
 * @since 2.7.0
 *
 * @param int              $object_id ID of the object (post ID, link ID, ...).
 * @param string           $taxonomy  Single taxonomy name.
 * @param int|string|array $terms     Optional. Term term_id, name, slug or array of said. Default null.
 * @return bool|WP_Error WP_Error on input error.
 */
function is_object_in_term($object_id, $taxonomy, $terms = \null)
{
}
/**
 * Determine if the given object type is associated with the given taxonomy.
 *
 * @since 3.0.0
 *
 * @param string $object_type Object type string.
 * @param string $taxonomy    Single taxonomy name.
 * @return bool True if object is associated with the taxonomy, otherwise false.
 */
function is_object_in_taxonomy($object_type, $taxonomy)
{
}
/**
 * Get an array of ancestor IDs for a given object.
 *
 * @since 3.1.0
 * @since 4.1.0 Introduced the `$resource_type` argument.
 *
 * @param int    $object_id     Optional. The ID of the object. Default 0.
 * @param string $object_type   Optional. The type of object for which we'll be retrieving
 *                              ancestors. Accepts a post type or a taxonomy name. Default empty.
 * @param string $resource_type Optional. Type of resource $object_type is. Accepts 'post_type'
 *                              or 'taxonomy'. Default empty.
 * @return array An array of ancestors from lowest to highest in the hierarchy.
 */
function get_ancestors($object_id = 0, $object_type = '', $resource_type = '')
{
}
/**
 * Returns the term's parent's term_ID.
 *
 * @since 3.1.0
 *
 * @param int    $term_id  Term ID.
 * @param string $taxonomy Taxonomy name.
 * @return int|false False on error.
 */
function wp_get_term_taxonomy_parent_id($term_id, $taxonomy)
{
}
/**
 * Checks the given subset of the term hierarchy for hierarchy loops.
 * Prevents loops from forming and breaks those that it finds.
 *
 * Attached to the {@see 'wp_update_term_parent'} filter.
 *
 * @since 3.1.0
 *
 * @param int    $parent   `term_id` of the parent for the term we're checking.
 * @param int    $term_id  The term we're checking.
 * @param string $taxonomy The taxonomy of the term we're checking.
 *
 * @return int The new parent for the term.
 */
function wp_check_term_hierarchy_for_loops($parent, $term_id, $taxonomy)
{
}
/**
 * Template loading functions.
 *
 * @package WordPress
 * @subpackage Template
 */
/**
 * Retrieve path to a template
 *
 * Used to quickly retrieve the path of a template without including the file
 * extension. It will also check the parent theme, if the file exists, with
 * the use of locate_template(). Allows for more generic template location
 * without the use of the other get_*_template() functions.
 *
 * @since 1.5.0
 *
 * @param string $type      Filename without extension.
 * @param array  $templates An optional list of template candidates
 * @return string Full path to template file.
 */
function get_query_template($type, $templates = array())
{
}
/**
 * Retrieve path of index template in current or parent template.
 *
 * The template hierarchy and template path are filterable via the {@see '$type_template_hierarchy'}
 * and {@see '$type_template'} dynamic hooks, where `$type` is 'index'.
 *
 * @since 3.0.0
 *
 * @see get_query_template()
 *
 * @return string Full path to index template file.
 */
function get_index_template()
{
}
/**
 * Retrieve path of 404 template in current or parent template.
 *
 * The template hierarchy and template path are filterable via the {@see '$type_template_hierarchy'}
 * and {@see '$type_template'} dynamic hooks, where `$type` is '404'.
 *
 * @since 1.5.0
 *
 * @see get_query_template()
 *
 * @return string Full path to 404 template file.
 */
function get_404_template()
{
}
/**
 * Retrieve path of archive template in current or parent template.
 *
 * The template hierarchy and template path are filterable via the {@see '$type_template_hierarchy'}
 * and {@see '$type_template'} dynamic hooks, where `$type` is 'archive'.
 *
 * @since 1.5.0
 *
 * @see get_query_template()
 *
 * @return string Full path to archive template file.
 */
function get_archive_template()
{
}
/**
 * Retrieve path of post type archive template in current or parent template.
 *
 * The template hierarchy and template path are filterable via the {@see '$type_template_hierarchy'}
 * and {@see '$type_template'} dynamic hooks, where `$type` is 'archive'.
 *
 * @since 3.7.0
 *
 * @see get_archive_template()
 *
 * @return string Full path to archive template file.
 */
function get_post_type_archive_template()
{
}
/**
 * Retrieve path of author template in current or parent template.
 *
 * The hierarchy for this template looks like:
 *
 * 1. author-{nicename}.php
 * 2. author-{id}.php
 * 3. author.php
 *
 * An example of this is:
 *
 * 1. author-john.php
 * 2. author-1.php
 * 3. author.php
 *
 * The template hierarchy and template path are filterable via the {@see '$type_template_hierarchy'}
 * and {@see '$type_template'} dynamic hooks, where `$type` is 'author'.
 *
 * @since 1.5.0
 *
 * @see get_query_template()
 *
 * @return string Full path to author template file.
 */
function get_author_template()
{
}
/**
 * Retrieve path of category template in current or parent template.
 *
 * The hierarchy for this template looks like:
 *
 * 1. category-{slug}.php
 * 2. category-{id}.php
 * 3. category.php
 *
 * An example of this is:
 *
 * 1. category-news.php
 * 2. category-2.php
 * 3. category.php
 *
 * The template hierarchy and template path are filterable via the {@see '$type_template_hierarchy'}
 * and {@see '$type_template'} dynamic hooks, where `$type` is 'category'.
 *
 * @since 1.5.0
 * @since 4.7.0 The decoded form of `category-{slug}.php` was added to the top of the
 *              template hierarchy when the category slug contains multibyte characters.
 *
 * @see get_query_template()
 *
 * @return string Full path to category template file.
 */
function get_category_template()
{
}
/**
 * Retrieve path of tag template in current or parent template.
 *
 * The hierarchy for this template looks like:
 *
 * 1. tag-{slug}.php
 * 2. tag-{id}.php
 * 3. tag.php
 *
 * An example of this is:
 *
 * 1. tag-wordpress.php
 * 2. tag-3.php
 * 3. tag.php
 *
 * The template hierarchy and template path are filterable via the {@see '$type_template_hierarchy'}
 * and {@see '$type_template'} dynamic hooks, where `$type` is 'tag'.
 *
 * @since 2.3.0
 * @since 4.7.0 The decoded form of `tag-{slug}.php` was added to the top of the
 *              template hierarchy when the tag slug contains multibyte characters.
 *
 * @see get_query_template()
 *
 * @return string Full path to tag template file.
 */
function get_tag_template()
{
}
/**
 * Retrieve path of custom taxonomy term template in current or parent template.
 *
 * The hierarchy for this template looks like:
 *
 * 1. taxonomy-{taxonomy_slug}-{term_slug}.php
 * 2. taxonomy-{taxonomy_slug}.php
 * 3. taxonomy.php
 *
 * An example of this is:
 *
 * 1. taxonomy-location-texas.php
 * 2. taxonomy-location.php
 * 3. taxonomy.php
 *
 * The template hierarchy and template path are filterable via the {@see '$type_template_hierarchy'}
 * and {@see '$type_template'} dynamic hooks, where `$type` is 'taxonomy'.
 *
 * @since 2.5.0
 * @since 4.7.0 The decoded form of `taxonomy-{taxonomy_slug}-{term_slug}.php` was added to the top of the
 *              template hierarchy when the term slug contains multibyte characters.
 *
 * @see get_query_template()
 *
 * @return string Full path to custom taxonomy term template file.
 */
function get_taxonomy_template()
{
}
/**
 * Retrieve path of date template in current or parent template.
 *
 * The template hierarchy and template path are filterable via the {@see '$type_template_hierarchy'}
 * and {@see '$type_template'} dynamic hooks, where `$type` is 'date'.
 *
 * @since 1.5.0
 *
 * @see get_query_template()
 *
 * @return string Full path to date template file.
 */
function get_date_template()
{
}
/**
 * Retrieve path of home template in current or parent template.
 *
 * The template hierarchy and template path are filterable via the {@see '$type_template_hierarchy'}
 * and {@see '$type_template'} dynamic hooks, where `$type` is 'home'.
 *
 * @since 1.5.0
 *
 * @see get_query_template()
 *
 * @return string Full path to home template file.
 */
function get_home_template()
{
}
/**
 * Retrieve path of front page template in current or parent template.
 *
 * The template hierarchy and template path are filterable via the {@see '$type_template_hierarchy'}
 * and {@see '$type_template'} dynamic hooks, where `$type` is 'frontpage'.
 *
 * @since 3.0.0
 *
 * @see get_query_template()
 *
 * @return string Full path to front page template file.
 */
function get_front_page_template()
{
}
/**
 * Retrieve path of page template in current or parent template.
 *
 * The hierarchy for this template looks like:
 *
 * 1. {Page Template}.php
 * 2. page-{page_name}.php
 * 3. page-{id}.php
 * 4. page.php
 *
 * An example of this is:
 *
 * 1. page-templates/full-width.php
 * 2. page-about.php
 * 3. page-4.php
 * 4. page.php
 *
 * The template hierarchy and template path are filterable via the {@see '$type_template_hierarchy'}
 * and {@see '$type_template'} dynamic hooks, where `$type` is 'page'.
 *
 * @since 1.5.0
 * @since 4.7.0 The decoded form of `page-{page_name}.php` was added to the top of the
 *              template hierarchy when the page name contains multibyte characters.
 *
 * @see get_query_template()
 *
 * @return string Full path to page template file.
 */
function get_page_template()
{
}
/**
 * Retrieve path of search template in current or parent template.
 *
 * The template hierarchy and template path are filterable via the {@see '$type_template_hierarchy'}
 * and {@see '$type_template'} dynamic hooks, where `$type` is 'search'.
 *
 * @since 1.5.0
 *
 * @see get_query_template()
 *
 * @return string Full path to search template file.
 */
function get_search_template()
{
}
/**
 * Retrieve path of single template in current or parent template. Applies to single Posts,
 * single Attachments, and single custom post types.
 *
 * The hierarchy for this template looks like:
 *
 * 1. {Post Type Template}.php
 * 2. single-{post_type}-{post_name}.php
 * 3. single-{post_type}.php
 * 4. single.php
 *
 * An example of this is:
 *
 * 1. templates/full-width.php
 * 2. single-post-hello-world.php
 * 3. single-post.php
 * 4. single.php
 *
 * The template hierarchy and template path are filterable via the {@see '$type_template_hierarchy'}
 * and {@see '$type_template'} dynamic hooks, where `$type` is 'single'.
 *
 * @since 1.5.0
 * @since 4.4.0 `single-{post_type}-{post_name}.php` was added to the top of the template hierarchy.
 * @since 4.7.0 The decoded form of `single-{post_type}-{post_name}.php` was added to the top of the
 *              template hierarchy when the post name contains multibyte characters.
 * @since 4.7.0 {Post Type Template}.php was added to the top of the template hierarchy.
 *
 * @see get_query_template()
 *
 * @return string Full path to single template file.
 */
function get_single_template()
{
}
/**
 * Retrieves an embed template path in the current or parent template.
 *
 * The hierarchy for this template looks like:
 *
 * 1. embed-{post_type}-{post_format}.php
 * 2. embed-{post_type}.php
 * 3. embed.php
 *
 * An example of this is:
 *
 * 1. embed-post-audio.php
 * 2. embed-post.php
 * 3. embed.php
 *
 * The template hierarchy and template path are filterable via the {@see '$type_template_hierarchy'}
 * and {@see '$type_template'} dynamic hooks, where `$type` is 'embed'.
 *
 * @since 4.5.0
 *
 * @see get_query_template()
 *
 * @return string Full path to embed template file.
 */
function get_embed_template()
{
}
/**
 * Retrieves the path of the singular template in current or parent template.
 *
 * The template hierarchy and template path are filterable via the {@see '$type_template_hierarchy'}
 * and {@see '$type_template'} dynamic hooks, where `$type` is 'singular'.
 *
 * @since 4.3.0
 *
 * @see get_query_template()
 *
 * @return string Full path to singular template file
 */
function get_singular_template()
{
}
/**
 * Retrieve path of attachment template in current or parent template.
 *
 * The hierarchy for this template looks like:
 *
 * 1. {mime_type}-{sub_type}.php
 * 2. {sub_type}.php
 * 3. {mime_type}.php
 * 4. attachment.php
 *
 * An example of this is:
 *
 * 1. image-jpeg.php
 * 2. jpeg.php
 * 3. image.php
 * 4. attachment.php
 *
 * The template hierarchy and template path are filterable via the {@see '$type_template_hierarchy'}
 * and {@see '$type_template'} dynamic hooks, where `$type` is 'attachment'.
 *
 * @since 2.0.0
 * @since 4.3.0 The order of the mime type logic was reversed so the hierarchy is more logical.
 *
 * @see get_query_template()
 *
 * @global array $posts
 *
 * @return string Full path to attachment template file.
 */
function get_attachment_template()
{
}
/**
 * Retrieve the name of the highest priority template file that exists.
 *
 * Searches in the STYLESHEETPATH before TEMPLATEPATH and wp-includes/theme-compat
 * so that themes which inherit from a parent theme can just overload one file.
 *
 * @since 2.7.0
 *
 * @param string|array $template_names Template file(s) to search for, in order.
 * @param bool         $load           If true the template file will be loaded if it is found.
 * @param bool         $require_once   Whether to require_once or require. Default true. Has no effect if $load is false.
 * @return string The template filename if one is located.
 */
function locate_template($template_names, $load = \false, $require_once = \true)
{
}
/**
 * Require the template file with WordPress environment.
 *
 * The globals are set up for the template file to ensure that the WordPress
 * environment is available from within the function. The query variables are
 * also available.
 *
 * @since 1.5.0
 *
 * @global array      $posts
 * @global WP_Post    $post
 * @global bool       $wp_did_header
 * @global WP_Query   $wp_query
 * @global WP_Rewrite $wp_rewrite
 * @global wpdb       $wpdb
 * @global string     $wp_version
 * @global WP         $wp
 * @global int        $id
 * @global WP_Comment $comment
 * @global int        $user_ID
 *
 * @param string $_template_file Path to template file.
 * @param bool   $require_once   Whether to require_once or require. Default true.
 */
function load_template($_template_file, $require_once = \true)
{
}
/**
 * Theme, template, and stylesheet functions.
 *
 * @package WordPress
 * @subpackage Theme
 */
/**
 * Returns an array of WP_Theme objects based on the arguments.
 *
 * Despite advances over get_themes(), this function is quite expensive, and grows
 * linearly with additional themes. Stick to wp_get_theme() if possible.
 *
 * @since 3.4.0
 *
 * @global array $wp_theme_directories
 * @staticvar array $_themes
 *
 * @param array $args The search arguments. Optional.
 * - errors      mixed  True to return themes with errors, false to return themes without errors, null
 *                      to return all themes. Defaults to false.
 * - allowed     mixed  (Multisite) True to return only allowed themes for a site. False to return only
 *                      disallowed themes for a site. 'site' to return only site-allowed themes. 'network'
 *                      to return only network-allowed themes. Null to return all themes. Defaults to null.
 * - blog_id     int    (Multisite) The blog ID used to calculate which themes are allowed. Defaults to 0,
 *                      synonymous for the current blog.
 * @return array Array of WP_Theme objects.
 */
function wp_get_themes($args = array())
{
}
/**
 * Gets a WP_Theme object for a theme.
 *
 * @since 3.4.0
 *
 * @global array $wp_theme_directories
 *
 * @param string $stylesheet Directory name for the theme. Optional. Defaults to current theme.
 * @param string $theme_root Absolute path of the theme root to look in. Optional. If not specified, get_raw_theme_root()
 * 	                         is used to calculate the theme root for the $stylesheet provided (or current theme).
 * @return WP_Theme Theme object. Be sure to check the object's exists() method if you need to confirm the theme's existence.
 */
function wp_get_theme($stylesheet = \null, $theme_root = \null)
{
}
/**
 * Clears the cache held by get_theme_roots() and WP_Theme.
 *
 * @since 3.5.0
 * @param bool $clear_update_cache Whether to clear the Theme updates cache
 */
function wp_clean_themes_cache($clear_update_cache = \true)
{
}
/**
 * Whether a child theme is in use.
 *
 * @since 3.0.0
 *
 * @return bool true if a child theme is in use, false otherwise.
 **/
function is_child_theme()
{
}
/**
 * Retrieve name of the current stylesheet.
 *
 * The theme name that the administrator has currently set the front end theme
 * as.
 *
 * For all intents and purposes, the template name and the stylesheet name are
 * going to be the same for most cases.
 *
 * @since 1.5.0
 *
 * @return string Stylesheet name.
 */
function get_stylesheet()
{
}
/**
 * Retrieve stylesheet directory path for current theme.
 *
 * @since 1.5.0
 *
 * @return string Path to current theme directory.
 */
function get_stylesheet_directory()
{
}
/**
 * Retrieve stylesheet directory URI.
 *
 * @since 1.5.0
 *
 * @return string
 */
function get_stylesheet_directory_uri()
{
}
/**
 * Retrieves the URI of current theme stylesheet.
 *
 * The stylesheet file name is 'style.css' which is appended to the stylesheet directory URI path.
 * See get_stylesheet_directory_uri().
 *
 * @since 1.5.0
 *
 * @return string
 */
function get_stylesheet_uri()
{
}
/**
 * Retrieves the localized stylesheet URI.
 *
 * The stylesheet directory for the localized stylesheet files are located, by
 * default, in the base theme directory. The name of the locale file will be the
 * locale followed by '.css'. If that does not exist, then the text direction
 * stylesheet will be checked for existence, for example 'ltr.css'.
 *
 * The theme may change the location of the stylesheet directory by either using
 * the {@see 'stylesheet_directory_uri'} or {@see 'locale_stylesheet_uri'} filters.
 *
 * If you want to change the location of the stylesheet files for the entire
 * WordPress workflow, then change the former. If you just have the locale in a
 * separate folder, then change the latter.
 *
 * @since 2.1.0
 *
 * @global WP_Locale $wp_locale
 *
 * @return string
 */
function get_locale_stylesheet_uri()
{
}
/**
 * Retrieve name of the current theme.
 *
 * @since 1.5.0
 *
 * @return string Template name.
 */
function get_template()
{
}
/**
 * Retrieve current theme directory.
 *
 * @since 1.5.0
 *
 * @return string Template directory path.
 */
function get_template_directory()
{
}
/**
 * Retrieve theme directory URI.
 *
 * @since 1.5.0
 *
 * @return string Template directory URI.
 */
function get_template_directory_uri()
{
}
/**
 * Retrieve theme roots.
 *
 * @since 2.9.0
 *
 * @global array $wp_theme_directories
 *
 * @return array|string An array of theme roots keyed by template/stylesheet or a single theme root if all themes have the same root.
 */
function get_theme_roots()
{
}
/**
 * Register a directory that contains themes.
 *
 * @since 2.9.0
 *
 * @global array $wp_theme_directories
 *
 * @param string $directory Either the full filesystem path to a theme folder or a folder within WP_CONTENT_DIR
 * @return bool
 */
function register_theme_directory($directory)
{
}
/**
 * Search all registered theme directories for complete and valid themes.
 *
 * @since 2.9.0
 *
 * @global array $wp_theme_directories
 * @staticvar array $found_themes
 *
 * @param bool $force Optional. Whether to force a new directory scan. Defaults to false.
 * @return array|false Valid themes found
 */
function search_theme_directories($force = \false)
{
}
/**
 * Retrieve path to themes directory.
 *
 * Does not have trailing slash.
 *
 * @since 1.5.0
 *
 * @global array $wp_theme_directories
 *
 * @param string $stylesheet_or_template The stylesheet or template name of the theme
 * @return string Theme path.
 */
function get_theme_root($stylesheet_or_template = \false)
{
}
/**
 * Retrieve URI for themes directory.
 *
 * Does not have trailing slash.
 *
 * @since 1.5.0
 *
 * @global array $wp_theme_directories
 *
 * @param string $stylesheet_or_template Optional. The stylesheet or template name of the theme.
 * 	                                     Default is to leverage the main theme root.
 * @param string $theme_root             Optional. The theme root for which calculations will be based, preventing
 * 	                                     the need for a get_raw_theme_root() call.
 * @return string Themes URI.
 */
function get_theme_root_uri($stylesheet_or_template = \false, $theme_root = \false)
{
}
/**
 * Get the raw theme root relative to the content directory with no filters applied.
 *
 * @since 3.1.0
 *
 * @global array $wp_theme_directories
 *
 * @param string $stylesheet_or_template The stylesheet or template name of the theme
 * @param bool   $skip_cache             Optional. Whether to skip the cache.
 *                                       Defaults to false, meaning the cache is used.
 * @return string Theme root
 */
function get_raw_theme_root($stylesheet_or_template, $skip_cache = \false)
{
}
/**
 * Display localized stylesheet link element.
 *
 * @since 2.1.0
 */
function locale_stylesheet()
{
}
/**
 * Switches the theme.
 *
 * Accepts one argument: $stylesheet of the theme. It also accepts an additional function signature
 * of two arguments: $template then $stylesheet. This is for backward compatibility.
 *
 * @since 2.5.0
 *
 * @global array                $wp_theme_directories
 * @global WP_Customize_Manager $wp_customize
 * @global array                $sidebars_widgets
 *
 * @param string $stylesheet Stylesheet name
 */
function switch_theme($stylesheet)
{
}
/**
 * Checks that current theme files 'index.php' and 'style.css' exists.
 *
 * Does not initially check the default theme, which is the fallback and should always exist.
 * But if it doesn't exist, it'll fall back to the latest core default theme that does exist.
 * Will switch theme to the fallback theme if current theme does not validate.
 *
 * You can use the {@see 'validate_current_theme'} filter to return false to
 * disable this functionality.
 *
 * @since 1.5.0
 * @see WP_DEFAULT_THEME
 *
 * @return bool
 */
function validate_current_theme()
{
}
/**
 * Retrieve all theme modifications.
 *
 * @since 3.1.0
 *
 * @return array|void Theme modifications.
 */
function get_theme_mods()
{
}
/**
 * Retrieve theme modification value for the current theme.
 *
 * If the modification name does not exist, then the $default will be passed
 * through {@link https://secure.php.net/sprintf sprintf()} PHP function with the first
 * string the template directory URI and the second string the stylesheet
 * directory URI.
 *
 * @since 2.1.0
 *
 * @param string      $name    Theme modification name.
 * @param bool|string $default
 * @return string
 */
function get_theme_mod($name, $default = \false)
{
}
/**
 * Update theme modification value for the current theme.
 *
 * @since 2.1.0
 *
 * @param string $name  Theme modification name.
 * @param mixed  $value Theme modification value.
 */
function set_theme_mod($name, $value)
{
}
/**
 * Remove theme modification name from current theme list.
 *
 * If removing the name also removes all elements, then the entire option will
 * be removed.
 *
 * @since 2.1.0
 *
 * @param string $name Theme modification name.
 */
function remove_theme_mod($name)
{
}
/**
 * Remove theme modifications option for current theme.
 *
 * @since 2.1.0
 */
function remove_theme_mods()
{
}
/**
 * Retrieves the custom header text color in 3- or 6-digit hexadecimal form.
 *
 * @since 2.1.0
 *
 * @return string Header text color in 3- or 6-digit hexadecimal form (minus the hash symbol).
 */
function get_header_textcolor()
{
}
/**
 * Displays the custom header text color in 3- or 6-digit hexadecimal form (minus the hash symbol).
 *
 * @since 2.1.0
 */
function header_textcolor()
{
}
/**
 * Whether to display the header text.
 *
 * @since 3.4.0
 *
 * @return bool
 */
function display_header_text()
{
}
/**
 * Check whether a header image is set or not.
 *
 * @since 4.2.0
 *
 * @see get_header_image()
 *
 * @return bool Whether a header image is set or not.
 */
function has_header_image()
{
}
/**
 * Retrieve header image for custom header.
 *
 * @since 2.1.0
 *
 * @return string|false
 */
function get_header_image()
{
}
/**
 * Create image tag markup for a custom header image.
 *
 * @since 4.4.0
 *
 * @param array $attr Optional. Additional attributes for the image tag. Can be used
 *                              to override the default attributes. Default empty.
 * @return string HTML image element markup or empty string on failure.
 */
function get_header_image_tag($attr = array())
{
}
/**
 * Display the image markup for a custom header image.
 *
 * @since 4.4.0
 *
 * @param array $attr Optional. Attributes for the image markup. Default empty.
 */
function the_header_image_tag($attr = array())
{
}
/**
 * Get random header image data from registered images in theme.
 *
 * @since 3.4.0
 *
 * @access private
 *
 * @global array  $_wp_default_headers
 * @staticvar object $_wp_random_header
 *
 * @return object
 */
function _get_random_header_data()
{
}
/**
 * Get random header image url from registered images in theme.
 *
 * @since 3.2.0
 *
 * @return string Path to header image
 */
function get_random_header_image()
{
}
/**
 * Check if random header image is in use.
 *
 * Always true if user expressly chooses the option in Appearance > Header.
 * Also true if theme has multiple header images registered, no specific header image
 * is chosen, and theme turns on random headers with add_theme_support().
 *
 * @since 3.2.0
 *
 * @param string $type The random pool to use. any|default|uploaded
 * @return bool
 */
function is_random_header_image($type = 'any')
{
}
/**
 * Display header image URL.
 *
 * @since 2.1.0
 */
function header_image()
{
}
/**
 * Get the header images uploaded for the current theme.
 *
 * @since 3.2.0
 *
 * @return array
 */
function get_uploaded_header_images()
{
}
/**
 * Get the header image data.
 *
 * @since 3.4.0
 *
 * @global array $_wp_default_headers
 *
 * @return object
 */
function get_custom_header()
{
}
/**
 * Register a selection of default headers to be displayed by the custom header admin UI.
 *
 * @since 3.0.0
 *
 * @global array $_wp_default_headers
 *
 * @param array $headers Array of headers keyed by a string id. The ids point to arrays containing 'url', 'thumbnail_url', and 'description' keys.
 */
function register_default_headers($headers)
{
}
/**
 * Unregister default headers.
 *
 * This function must be called after register_default_headers() has already added the
 * header you want to remove.
 *
 * @see register_default_headers()
 * @since 3.0.0
 *
 * @global array $_wp_default_headers
 *
 * @param string|array $header The header string id (key of array) to remove, or an array thereof.
 * @return bool|void A single header returns true on success, false on failure.
 *                   There is currently no return value for multiple headers.
 */
function unregister_default_headers($header)
{
}
/**
 * Check whether a header video is set or not.
 *
 * @since 4.7.0
 *
 * @see get_header_video_url()
 *
 * @return bool Whether a header video is set or not.
 */
function has_header_video()
{
}
/**
 * Retrieve header video URL for custom header.
 *
 * Uses a local video if present, or falls back to an external video.
 *
 * @since 4.7.0
 *
 * @return string|false Header video URL or false if there is no video.
 */
function get_header_video_url()
{
}
/**
 * Display header video URL.
 *
 * @since 4.7.0
 */
function the_header_video_url()
{
}
/**
 * Retrieve header video settings.
 *
 * @since 4.7.0
 *
 * @return array
 */
function get_header_video_settings()
{
}
/**
 * Check whether a custom header is set or not.
 *
 * @since 4.7.0
 *
 * @return bool True if a custom header is set. False if not.
 */
function has_custom_header()
{
}
/**
 * Checks whether the custom header video is eligible to show on the current page.
 *
 * @since 4.7.0
 *
 * @return bool True if the custom header video should be shown. False if not.
 */
function is_header_video_active()
{
}
/**
 * Retrieve the markup for a custom header.
 *
 * The container div will always be returned in the Customizer preview.
 *
 * @since 4.7.0
 *
 * @return string The markup for a custom header on success.
 */
function get_custom_header_markup()
{
}
/**
 * Print the markup for a custom header.
 *
 * A container div will always be printed in the Customizer preview.
 *
 * @since 4.7.0
 */
function the_custom_header_markup()
{
}
/**
 * Retrieve background image for custom background.
 *
 * @since 3.0.0
 *
 * @return string
 */
function get_background_image()
{
}
/**
 * Display background image path.
 *
 * @since 3.0.0
 */
function background_image()
{
}
/**
 * Retrieve value for custom background color.
 *
 * @since 3.0.0
 *
 * @return string
 */
function get_background_color()
{
}
/**
 * Display background color value.
 *
 * @since 3.0.0
 */
function background_color()
{
}
/**
 * Default custom background callback.
 *
 * @since 3.0.0
 */
function _custom_background_cb()
{
}
/**
 * Render the Custom CSS style element.
 *
 * @since 4.7.0
 */
function wp_custom_css_cb()
{
}
/**
 * Fetch the `custom_css` post for a given theme.
 *
 * @since 4.7.0
 *
 * @param string $stylesheet Optional. A theme object stylesheet name. Defaults to the current theme.
 * @return WP_Post|null The custom_css post or null if none exists.
 */
function wp_get_custom_css_post($stylesheet = '')
{
}
/**
 * Fetch the saved Custom CSS content for rendering.
 *
 * @since 4.7.0
 *
 * @param string $stylesheet Optional. A theme object stylesheet name. Defaults to the current theme.
 * @return string The Custom CSS Post content.
 */
function wp_get_custom_css($stylesheet = '')
{
}
/**
 * Update the `custom_css` post for a given theme.
 *
 * Inserts a `custom_css` post when one doesn't yet exist.
 *
 * @since 4.7.0
 *
 * @param string $css CSS, stored in `post_content`.
 * @param array  $args {
 *     Args.
 *
 *     @type string $preprocessed Pre-processed CSS, stored in `post_content_filtered`. Normally empty string. Optional.
 *     @type string $stylesheet   Stylesheet (child theme) to update. Optional, defaults to current theme/stylesheet.
 * }
 * @return WP_Post|WP_Error Post on success, error on failure.
 */
function wp_update_custom_css_post($css, $args = array())
{
}
/**
 * Add callback for custom TinyMCE editor stylesheets.
 *
 * The parameter $stylesheet is the name of the stylesheet, relative to
 * the theme root. It also accepts an array of stylesheets.
 * It is optional and defaults to 'editor-style.css'.
 *
 * This function automatically adds another stylesheet with -rtl prefix, e.g. editor-style-rtl.css.
 * If that file doesn't exist, it is removed before adding the stylesheet(s) to TinyMCE.
 * If an array of stylesheets is passed to add_editor_style(),
 * RTL is only added for the first stylesheet.
 *
 * Since version 3.4 the TinyMCE body has .rtl CSS class.
 * It is a better option to use that class and add any RTL styles to the main stylesheet.
 *
 * @since 3.0.0
 *
 * @global array $editor_styles
 *
 * @param array|string $stylesheet Optional. Stylesheet name or array thereof, relative to theme root.
 * 	                               Defaults to 'editor-style.css'
 */
function add_editor_style($stylesheet = 'editor-style.css')
{
}
/**
 * Removes all visual editor stylesheets.
 *
 * @since 3.1.0
 *
 * @global array $editor_styles
 *
 * @return bool True on success, false if there were no stylesheets to remove.
 */
function remove_editor_styles()
{
}
/**
 * Retrieve any registered editor stylesheets
 *
 * @since 4.0.0
 *
 * @global array $editor_styles Registered editor stylesheets
 *
 * @return array If registered, a list of editor stylesheet URLs.
 */
function get_editor_stylesheets()
{
}
/**
 * Expand a theme's starter content configuration using core-provided data.
 *
 * @since 4.7.0
 *
 * @return array Array of starter content.
 */
function get_theme_starter_content()
{
}
/**
 * Registers theme support for a given feature.
 *
 * Must be called in the theme's functions.php file to work.
 * If attached to a hook, it must be {@see 'after_setup_theme'}.
 * The {@see 'init'} hook may be too late for some features.
 *
 * @since 2.9.0
 * @since 3.6.0 The `html5` feature was added
 * @since 3.9.0 The `html5` feature now also accepts 'gallery' and 'caption'
 * @since 4.1.0 The `title-tag` feature was added
 * @since 4.5.0 The `customize-selective-refresh-widgets` feature was added
 * @since 4.7.0 The `starter-content` feature was added
 *
 * @global array $_wp_theme_features
 *
 * @param string $feature  The feature being added. Likely core values include 'post-formats',
 *                         'post-thumbnails', 'html5', 'custom-logo', 'custom-header-uploads',
 *                         'custom-header', 'custom-background', 'title-tag', 'starter-content', etc.
 * @param mixed  $args,... Optional extra arguments to pass along with certain features.
 * @return void|bool False on failure, void otherwise.
 */
function add_theme_support($feature)
{
}
/**
 * Registers the internal custom header and background routines.
 *
 * @since 3.4.0
 * @access private
 *
 * @global Custom_Image_Header $custom_image_header
 * @global Custom_Background   $custom_background
 */
function _custom_header_background_just_in_time()
{
}
/**
 * Adds CSS to hide header text for custom logo, based on Customizer setting.
 *
 * @since 4.5.0
 * @access private
 */
function _custom_logo_header_styles()
{
}
/**
 * Gets the theme support arguments passed when registering that support
 *
 * @since 3.1.0
 *
 * @global array $_wp_theme_features
 *
 * @param string $feature the feature to check
 * @return mixed The array of extra arguments or the value for the registered feature.
 */
function get_theme_support($feature)
{
}
/**
 * Allows a theme to de-register its support of a certain feature
 *
 * Should be called in the theme's functions.php file. Generally would
 * be used for child themes to override support from the parent theme.
 *
 * @since 3.0.0
 * @see add_theme_support()
 * @param string $feature the feature being added
 * @return bool|void Whether feature was removed.
 */
function remove_theme_support($feature)
{
}
/**
 * Do not use. Removes theme support internally, ignorant of the blacklist.
 *
 * @access private
 * @since 3.1.0
 *
 * @global array               $_wp_theme_features
 * @global Custom_Image_Header $custom_image_header
 * @global Custom_Background   $custom_background
 *
 * @param string $feature
 */
function _remove_theme_support($feature)
{
}
/**
 * Checks a theme's support for a given feature
 *
 * @since 2.9.0
 *
 * @global array $_wp_theme_features
 *
 * @param string $feature the feature being checked
 * @return bool
 */
function current_theme_supports($feature)
{
}
/**
 * Checks a theme's support for a given feature before loading the functions which implement it.
 *
 * @since 2.9.0
 *
 * @param string $feature The feature being checked.
 * @param string $include Path to the file.
 * @return bool True if the current theme supports the supplied feature, false otherwise.
 */
function require_if_theme_supports($feature, $include)
{
}
/**
 * Checks an attachment being deleted to see if it's a header or background image.
 *
 * If true it removes the theme modification which would be pointing at the deleted
 * attachment.
 *
 * @access private
 * @since 3.0.0
 * @since 4.3.0 Also removes `header_image_data`.
 * @since 4.5.0 Also removes custom logo theme mods.
 *
 * @param int $id The attachment id.
 */
function _delete_attachment_theme_mod($id)
{
}
/**
 * Checks if a theme has been changed and runs 'after_switch_theme' hook on the next WP load.
 *
 * See {@see 'after_switch_theme'}.
 *
 * @since 3.3.0
 */
function check_theme_switched()
{
}
/**
 * Includes and instantiates the WP_Customize_Manager class.
 *
 * Loads the Customizer at plugins_loaded when accessing the customize.php admin
 * page or when any request includes a wp_customize=on param or a customize_changeset
 * param (a UUID). This param is a signal for whether to bootstrap the Customizer when
 * WordPress is loading, especially in the Customizer preview
 * or when making Customizer Ajax requests for widgets or menus.
 *
 * @since 3.4.0
 *
 * @global WP_Customize_Manager $wp_customize
 */
function _wp_customize_include()
{
}
/**
 * Publishes a snapshot's changes.
 *
 * @since 4.7.0
 * @access private
 *
 * @global wpdb                 $wpdb         WordPress database abstraction object.
 * @global WP_Customize_Manager $wp_customize Customizer instance.
 *
 * @param string  $new_status     New post status.
 * @param string  $old_status     Old post status.
 * @param WP_Post $changeset_post Changeset post object.
 */
function _wp_customize_publish_changeset($new_status, $old_status, $changeset_post)
{
}
/**
 * Filters changeset post data upon insert to ensure post_name is intact.
 *
 * This is needed to prevent the post_name from being dropped when the post is
 * transitioned into pending status by a contributor.
 *
 * @since 4.7.0
 * @see wp_insert_post()
 *
 * @param array $post_data          An array of slashed post data.
 * @param array $supplied_post_data An array of sanitized, but otherwise unmodified post data.
 * @returns array Filtered data.
 */
function _wp_customize_changeset_filter_insert_post_data($post_data, $supplied_post_data)
{
}
/**
 * Adds settings for the customize-loader script.
 *
 * @since 3.4.0
 */
function _wp_customize_loader_settings()
{
}
/**
 * Returns a URL to load the Customizer.
 *
 * @since 3.4.0
 *
 * @param string $stylesheet Optional. Theme to customize. Defaults to current theme.
 * 	                         The theme's stylesheet will be urlencoded if necessary.
 * @return string
 */
function wp_customize_url($stylesheet = \null)
{
}
/**
 * Prints a script to check whether or not the Customizer is supported,
 * and apply either the no-customize-support or customize-support class
 * to the body.
 *
 * This function MUST be called inside the body tag.
 *
 * Ideally, call this function immediately after the body tag is opened.
 * This prevents a flash of unstyled content.
 *
 * It is also recommended that you add the "no-customize-support" class
 * to the body tag by default.
 *
 * @since 3.4.0
 * @since 4.7.0 Support for IE8 and below is explicitly removed via conditional comments.
 */
function wp_customize_support_script()
{
}
/**
 * Whether the site is being previewed in the Customizer.
 *
 * @since 4.0.0
 *
 * @global WP_Customize_Manager $wp_customize Customizer instance.
 *
 * @return bool True if the site is being previewed in the Customizer, false otherwise.
 */
function is_customize_preview()
{
}
/**
 * Make sure that auto-draft posts get their post_date bumped or status changed to draft to prevent premature garbage-collection.
 *
 * When a changeset is updated but remains an auto-draft, ensure the post_date
 * for the auto-draft posts remains the same so that it will be
 * garbage-collected at the same time by `wp_delete_auto_drafts()`. Otherwise,
 * if the changeset is updated to be a draft then update the posts
 * to have a far-future post_date so that they will never be garbage collected
 * unless the changeset post itself is deleted.
 *
 * When a changeset is updated to be a persistent draft or to be scheduled for
 * publishing, then transition any dependent auto-drafts to a draft status so
 * that they likewise will not be garbage-collected but also so that they can
 * be edited in the admin before publishing since there is not yet a post/page
 * editing flow in the Customizer. See #39752.
 *
 * @link https://core.trac.wordpress.org/ticket/39752
 *
 * @since 4.8.0
 * @access private
 * @see wp_delete_auto_drafts()
 *
 * @param string   $new_status Transition to this post status.
 * @param string   $old_status Previous post status.
 * @param \WP_Post $post       Post data.
 * @global wpdb $wpdb
 */
function _wp_keep_alive_customize_changeset_dependent_auto_drafts($new_status, $old_status, $post)
{
}
/**
 * A simple set of functions to check our version 1.0 update service.
 *
 * @package WordPress
 * @since 2.3.0
 */
/**
 * Check WordPress version against the newest version.
 *
 * The WordPress version, PHP version, and Locale is sent. Checks against the
 * WordPress server at api.wordpress.org server. Will only check if WordPress
 * isn't installing.
 *
 * @since 2.3.0
 * @global string $wp_version Used to check against the newest WordPress version.
 * @global wpdb   $wpdb
 * @global string $wp_local_package
 *
 * @param array $extra_stats Extra statistics to report to the WordPress.org API.
 * @param bool  $force_check Whether to bypass the transient cache and force a fresh update check. Defaults to false, true if $extra_stats is set.
 */
function wp_version_check($extra_stats = array(), $force_check = \false)
{
}
/**
 * Check plugin versions against the latest versions hosted on WordPress.org.
 *
 * The WordPress version, PHP version, and Locale is sent along with a list of
 * all plugins installed. Checks against the WordPress server at
 * api.wordpress.org. Will only check if WordPress isn't installing.
 *
 * @since 2.3.0
 * @global string $wp_version Used to notify the WordPress version.
 *
 * @param array $extra_stats Extra statistics to report to the WordPress.org API.
 */
function wp_update_plugins($extra_stats = array())
{
}
/**
 * Check theme versions against the latest versions hosted on WordPress.org.
 *
 * A list of all themes installed in sent to WP. Checks against the
 * WordPress server at api.wordpress.org. Will only check if WordPress isn't
 * installing.
 *
 * @since 2.7.0
 *
 * @param array $extra_stats Extra statistics to report to the WordPress.org API.
 */
function wp_update_themes($extra_stats = array())
{
}
/**
 * Performs WordPress automatic background updates.
 *
 * @since 3.7.0
 */
function wp_maybe_auto_update()
{
}
/**
 * Retrieves a list of all language updates available.
 *
 * @since 3.7.0
 *
 * @return array
 */
function wp_get_translation_updates()
{
}
/**
 * Collect counts and UI strings for available updates
 *
 * @since 3.3.0
 *
 * @return array
 */
function wp_get_update_data()
{
}
/**
 * Determines whether core should be updated.
 *
 * @since 2.8.0
 *
 * @global string $wp_version
 */
function _maybe_update_core()
{
}
/**
 * Check the last time plugins were run before checking plugin versions.
 *
 * This might have been backported to WordPress 2.6.1 for performance reasons.
 * This is used for the wp-admin to check only so often instead of every page
 * load.
 *
 * @since 2.7.0
 * @access private
 */
function _maybe_update_plugins()
{
}
/**
 * Check themes versions only after a duration of time.
 *
 * This is for performance reasons to make sure that on the theme version
 * checker is not run on every page load.
 *
 * @since 2.7.0
 * @access private
 */
function _maybe_update_themes()
{
}
/**
 * Schedule core, theme, and plugin update checks.
 *
 * @since 3.1.0
 */
function wp_schedule_update_checks()
{
}
/**
 * Clear existing update caches for plugins, themes, and core.
 *
 * @since 4.1.0
 */
function wp_clean_update_cache()
{
}
/**
 * Core User API
 *
 * @package WordPress
 * @subpackage Users
 */
/**
 * Authenticates and logs a user in with 'remember' capability.
 *
 * The credentials is an array that has 'user_login', 'user_password', and
 * 'remember' indices. If the credentials is not given, then the log in form
 * will be assumed and used if set.
 *
 * The various authentication cookies will be set by this function and will be
 * set for a longer period depending on if the 'remember' credential is set to
 * true.
 *
 * Note: wp_signon() doesn't handle setting the current user. This means that if the
 * function is called before the {@see 'init'} hook is fired, is_user_logged_in() will
 * evaluate as false until that point. If is_user_logged_in() is needed in conjunction
 * with wp_signon(), wp_set_current_user() should be called explicitly.
 *
 * @since 2.5.0
 *
 * @global string $auth_secure_cookie
 *
 * @param array       $credentials   Optional. User info in order to sign on.
 * @param string|bool $secure_cookie Optional. Whether to use secure cookie.
 * @return WP_User|WP_Error WP_User on success, WP_Error on failure.
 */
function wp_signon($credentials = array(), $secure_cookie = '')
{
}
/**
 * Authenticate a user, confirming the username and password are valid.
 *
 * @since 2.8.0
 *
 * @param WP_User|WP_Error|null $user     WP_User or WP_Error object from a previous callback. Default null.
 * @param string                $username Username for authentication.
 * @param string                $password Password for authentication.
 * @return WP_User|WP_Error WP_User on success, WP_Error on failure.
 */
function wp_authenticate_username_password($user, $username, $password)
{
}
/**
 * Authenticates a user using the email and password.
 *
 * @since 4.5.0
 *
 * @param WP_User|WP_Error|null $user     WP_User or WP_Error object if a previous
 *                                        callback failed authentication.
 * @param string                $email    Email address for authentication.
 * @param string                $password Password for authentication.
 * @return WP_User|WP_Error WP_User on success, WP_Error on failure.
 */
function wp_authenticate_email_password($user, $email, $password)
{
}
/**
 * Authenticate the user using the WordPress auth cookie.
 *
 * @since 2.8.0
 *
 * @global string $auth_secure_cookie
 *
 * @param WP_User|WP_Error|null $user     WP_User or WP_Error object from a previous callback. Default null.
 * @param string                $username Username. If not empty, cancels the cookie authentication.
 * @param string                $password Password. If not empty, cancels the cookie authentication.
 * @return WP_User|WP_Error WP_User on success, WP_Error on failure.
 */
function wp_authenticate_cookie($user, $username, $password)
{
}
/**
 * For Multisite blogs, check if the authenticated user has been marked as a
 * spammer, or if the user's primary blog has been marked as spam.
 *
 * @since 3.7.0
 *
 * @param WP_User|WP_Error|null $user WP_User or WP_Error object from a previous callback. Default null.
 * @return WP_User|WP_Error WP_User on success, WP_Error if the user is considered a spammer.
 */
function wp_authenticate_spam_check($user)
{
}
/**
 * Validates the logged-in cookie.
 *
 * Checks the logged-in cookie if the previous auth cookie could not be
 * validated and parsed.
 *
 * This is a callback for the {@see 'determine_current_user'} filter, rather than API.
 *
 * @since 3.9.0
 *
 * @param int|bool $user_id The user ID (or false) as received from the
 *                       determine_current_user filter.
 * @return int|false User ID if validated, false otherwise. If a user ID from
 *                   an earlier filter callback is received, that value is returned.
 */
function wp_validate_logged_in_cookie($user_id)
{
}
/**
 * Number of posts user has written.
 *
 * @since 3.0.0
 * @since 4.1.0 Added `$post_type` argument.
 * @since 4.3.0 Added `$public_only` argument. Added the ability to pass an array
 *              of post types to `$post_type`.
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param int          $userid      User ID.
 * @param array|string $post_type   Optional. Single post type or array of post types to count the number of posts for. Default 'post'.
 * @param bool         $public_only Optional. Whether to only return counts for public posts. Default false.
 * @return string Number of posts the user has written in this post type.
 */
function count_user_posts($userid, $post_type = 'post', $public_only = \false)
{
}
/**
 * Number of posts written by a list of users.
 *
 * @since 3.0.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param array        $users       Array of user IDs.
 * @param string|array $post_type   Optional. Single post type or array of post types to check. Defaults to 'post'.
 * @param bool         $public_only Optional. Only return counts for public posts.  Defaults to false.
 * @return array Amount of posts each user has written.
 */
function count_many_users_posts($users, $post_type = 'post', $public_only = \false)
{
}
//
// User option functions
//
/**
 * Get the current user's ID
 *
 * @since MU (3.0.0)
 *
 * @return int The current user's ID, or 0 if no user is logged in.
 */
function get_current_user_id()
{
}
/**
 * Retrieve user option that can be either per Site or per Network.
 *
 * If the user ID is not given, then the current user will be used instead. If
 * the user ID is given, then the user data will be retrieved. The filter for
 * the result, will also pass the original option name and finally the user data
 * object as the third parameter.
 *
 * The option will first check for the per site name and then the per Network name.
 *
 * @since 2.0.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param string $option     User option name.
 * @param int    $user       Optional. User ID.
 * @param string $deprecated Use get_option() to check for an option in the options table.
 * @return mixed User option value on success, false on failure.
 */
function get_user_option($option, $user = 0, $deprecated = '')
{
}
/**
 * Update user option with global blog capability.
 *
 * User options are just like user metadata except that they have support for
 * global blog options. If the 'global' parameter is false, which it is by default
 * it will prepend the WordPress table prefix to the option name.
 *
 * Deletes the user option if $newvalue is empty.
 *
 * @since 2.0.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param int    $user_id     User ID.
 * @param string $option_name User option name.
 * @param mixed  $newvalue    User option value.
 * @param bool   $global      Optional. Whether option name is global or blog specific.
 *                            Default false (blog specific).
 * @return int|bool User meta ID if the option didn't exist, true on successful update,
 *                  false on failure.
 */
function update_user_option($user_id, $option_name, $newvalue, $global = \false)
{
}
/**
 * Delete user option with global blog capability.
 *
 * User options are just like user metadata except that they have support for
 * global blog options. If the 'global' parameter is false, which it is by default
 * it will prepend the WordPress table prefix to the option name.
 *
 * @since 3.0.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param int    $user_id     User ID
 * @param string $option_name User option name.
 * @param bool   $global      Optional. Whether option name is global or blog specific.
 *                            Default false (blog specific).
 * @return bool True on success, false on failure.
 */
function delete_user_option($user_id, $option_name, $global = \false)
{
}
/**
 * Retrieve list of users matching criteria.
 *
 * @since 3.1.0
 *
 * @see WP_User_Query
 *
 * @param array $args Optional. Arguments to retrieve users. See WP_User_Query::prepare_query().
 *                    for more information on accepted arguments.
 * @return array List of users.
 */
function get_users($args = array())
{
}
/**
 * Get the sites a user belongs to.
 *
 * @since 3.0.0
 * @since 4.7.0 Converted to use get_sites().
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param int  $user_id User ID
 * @param bool $all     Whether to retrieve all sites, or only sites that are not
 *                      marked as deleted, archived, or spam.
 * @return array A list of the user's sites. An empty array if the user doesn't exist
 *               or belongs to no sites.
 */
function get_blogs_of_user($user_id, $all = \false)
{
}
/**
 * Find out whether a user is a member of a given blog.
 *
 * @since MU (3.0.0)
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param int $user_id Optional. The unique ID of the user. Defaults to the current user.
 * @param int $blog_id Optional. ID of the blog to check. Defaults to the current site.
 * @return bool
 */
function is_user_member_of_blog($user_id = 0, $blog_id = 0)
{
}
/**
 * Adds meta data to a user.
 *
 * @since 3.0.0
 *
 * @param int    $user_id    User ID.
 * @param string $meta_key   Metadata name.
 * @param mixed  $meta_value Metadata value.
 * @param bool   $unique     Optional. Whether the same key should not be added. Default false.
 * @return int|false Meta ID on success, false on failure.
 */
function add_user_meta($user_id, $meta_key, $meta_value, $unique = \false)
{
}
/**
 * Remove metadata matching criteria from a user.
 *
 * You can match based on the key, or key and value. Removing based on key and
 * value, will keep from removing duplicate metadata with the same key. It also
 * allows removing all metadata matching key, if needed.
 *
 * @since 3.0.0
 * @link https://codex.wordpress.org/Function_Reference/delete_user_meta
 *
 * @param int    $user_id    User ID
 * @param string $meta_key   Metadata name.
 * @param mixed  $meta_value Optional. Metadata value.
 * @return bool True on success, false on failure.
 */
function delete_user_meta($user_id, $meta_key, $meta_value = '')
{
}
/**
 * Retrieve user meta field for a user.
 *
 * @since 3.0.0
 * @link https://codex.wordpress.org/Function_Reference/get_user_meta
 *
 * @param int    $user_id User ID.
 * @param string $key     Optional. The meta key to retrieve. By default, returns data for all keys.
 * @param bool   $single  Whether to return a single value.
 * @return mixed Will be an array if $single is false. Will be value of meta data field if $single is true.
 */
function get_user_meta($user_id, $key = '', $single = \false)
{
}
/**
 * Update user meta field based on user ID.
 *
 * Use the $prev_value parameter to differentiate between meta fields with the
 * same key and user ID.
 *
 * If the meta field for the user does not exist, it will be added.
 *
 * @since 3.0.0
 * @link https://codex.wordpress.org/Function_Reference/update_user_meta
 *
 * @param int    $user_id    User ID.
 * @param string $meta_key   Metadata key.
 * @param mixed  $meta_value Metadata value.
 * @param mixed  $prev_value Optional. Previous value to check before removing.
 * @return int|bool Meta ID if the key didn't exist, true on successful update, false on failure.
 */
function update_user_meta($user_id, $meta_key, $meta_value, $prev_value = '')
{
}
/**
 * Count number of users who have each of the user roles.
 *
 * Assumes there are neither duplicated nor orphaned capabilities meta_values.
 * Assumes role names are unique phrases. Same assumption made by WP_User_Query::prepare_query()
 * Using $strategy = 'time' this is CPU-intensive and should handle around 10^7 users.
 * Using $strategy = 'memory' this is memory-intensive and should handle around 10^5 users, but see WP Bug #12257.
 *
 * @since 3.0.0
 * @since 4.4.0 The number of users with no role is now included in the `none` element.
 * @since 4.9.0 The `$site_id` parameter was added to support multisite.
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param string   $strategy Optional. The computational strategy to use when counting the users.
 *                           Accepts either 'time' or 'memory'. Default 'time'.
 * @param int|null $site_id  Optional. The site ID to count users for. Defaults to the current site.
 * @return array Includes a grand total and an array of counts indexed by role strings.
 */
function count_users($strategy = 'time', $site_id = \null)
{
}
//
// Private helper functions
//
/**
 * Set up global user vars.
 *
 * Used by wp_set_current_user() for back compat. Might be deprecated in the future.
 *
 * @since 2.0.4
 *
 * @global string  $user_login    The user username for logging in
 * @global WP_User $userdata      User data.
 * @global int     $user_level    The level of the user
 * @global int     $user_ID       The ID of the user
 * @global string  $user_email    The email address of the user
 * @global string  $user_url      The url in the user's profile
 * @global string  $user_identity The display name of the user
 *
 * @param int $for_user_id Optional. User ID to set up global data.
 */
function setup_userdata($for_user_id = '')
{
}
/**
 * Create dropdown HTML content of users.
 *
 * The content can either be displayed, which it is by default or retrieved by
 * setting the 'echo' argument. The 'include' and 'exclude' arguments do not
 * need to be used; all users will be displayed in that case. Only one can be
 * used, either 'include' or 'exclude', but not both.
 *
 * The available arguments are as follows:
 *
 * @since 2.3.0
 * @since 4.5.0 Added the 'display_name_with_login' value for 'show'.
 * @since 4.7.0 Added the `$role`, `$role__in`, and `$role__not_in` parameters.
 *
 * @param array|string $args {
 *     Optional. Array or string of arguments to generate a drop-down of users.
 *     See WP_User_Query::prepare_query() for additional available arguments.
 *
 *     @type string       $show_option_all         Text to show as the drop-down default (all).
 *                                                 Default empty.
 *     @type string       $show_option_none        Text to show as the drop-down default when no
 *                                                 users were found. Default empty.
 *     @type int|string   $option_none_value       Value to use for $show_option_non when no users
 *                                                 were found. Default -1.
 *     @type string       $hide_if_only_one_author Whether to skip generating the drop-down
 *                                                 if only one user was found. Default empty.
 *     @type string       $orderby                 Field to order found users by. Accepts user fields.
 *                                                 Default 'display_name'.
 *     @type string       $order                   Whether to order users in ascending or descending
 *                                                 order. Accepts 'ASC' (ascending) or 'DESC' (descending).
 *                                                 Default 'ASC'.
 *     @type array|string $include                 Array or comma-separated list of user IDs to include.
 *                                                 Default empty.
 *     @type array|string $exclude                 Array or comma-separated list of user IDs to exclude.
 *                                                 Default empty.
 *     @type bool|int     $multi                   Whether to skip the ID attribute on the 'select' element.
 *                                                 Accepts 1|true or 0|false. Default 0|false.
 *     @type string       $show                    User data to display. If the selected item is empty
 *                                                 then the 'user_login' will be displayed in parentheses.
 *                                                 Accepts any user field, or 'display_name_with_login' to show
 *                                                 the display name with user_login in parentheses.
 *                                                 Default 'display_name'.
 *     @type int|bool     $echo                    Whether to echo or return the drop-down. Accepts 1|true (echo)
 *                                                 or 0|false (return). Default 1|true.
 *     @type int          $selected                Which user ID should be selected. Default 0.
 *     @type bool         $include_selected        Whether to always include the selected user ID in the drop-
 *                                                 down. Default false.
 *     @type string       $name                    Name attribute of select element. Default 'user'.
 *     @type string       $id                      ID attribute of the select element. Default is the value of $name.
 *     @type string       $class                   Class attribute of the select element. Default empty.
 *     @type int          $blog_id                 ID of blog (Multisite only). Default is ID of the current blog.
 *     @type string       $who                     Which type of users to query. Accepts only an empty string or
 *                                                 'authors'. Default empty.
 *     @type string|array $role                    An array or a comma-separated list of role names that users must
 *                                                 match to be included in results. Note that this is an inclusive
 *                                                 list: users must match *each* role. Default empty.
 *     @type array        $role__in                An array of role names. Matched users must have at least one of
 *                                                 these roles. Default empty array.
 *     @type array        $role__not_in            An array of role names to exclude. Users matching one or more of
 *                                                 these roles will not be included in results. Default empty array.
 * }
 * @return string String of HTML content.
 */
function wp_dropdown_users($args = '')
{
}
/**
 * Sanitize user field based on context.
 *
 * Possible context values are:  'raw', 'edit', 'db', 'display', 'attribute' and 'js'. The
 * 'display' context is used by default. 'attribute' and 'js' contexts are treated like 'display'
 * when calling filters.
 *
 * @since 2.3.0
 *
 * @param string $field   The user Object field name.
 * @param mixed  $value   The user Object value.
 * @param int    $user_id User ID.
 * @param string $context How to sanitize user fields. Looks for 'raw', 'edit', 'db', 'display',
 *                        'attribute' and 'js'.
 * @return mixed Sanitized value.
 */
function sanitize_user_field($field, $value, $user_id, $context)
{
}
/**
 * Update all user caches
 *
 * @since 3.0.0
 *
 * @param WP_User $user User object to be cached
 * @return bool|null Returns false on failure.
 */
function update_user_caches($user)
{
}
/**
 * Clean all user caches
 *
 * @since 3.0.0
 * @since 4.4.0 'clean_user_cache' action was added.
 *
 * @param WP_User|int $user User object or ID to be cleaned from the cache
 */
function clean_user_cache($user)
{
}
/**
 * Checks whether the given username exists.
 *
 * @since 2.0.0
 *
 * @param string $username Username.
 * @return int|false The user's ID on success, and false on failure.
 */
function username_exists($username)
{
}
/**
 * Checks whether the given email exists.
 *
 * @since 2.1.0
 *
 * @param string $email Email.
 * @return int|false The user's ID on success, and false on failure.
 */
function email_exists($email)
{
}
/**
 * Checks whether a username is valid.
 *
 * @since 2.0.1
 * @since 4.4.0 Empty sanitized usernames are now considered invalid
 *
 * @param string $username Username.
 * @return bool Whether username given is valid
 */
function validate_username($username)
{
}
/**
 * Insert a user into the database.
 *
 * Most of the `$userdata` array fields have filters associated with the values. Exceptions are
 * 'ID', 'rich_editing', 'syntax_highlighting', 'comment_shortcuts', 'admin_color', 'use_ssl',
 * 'user_registered', and 'role'. The filters have the prefix 'pre_user_' followed by the field
 * name. An example using 'description' would have the filter called, 'pre_user_description' that
 * can be hooked into.
 *
 * @since 2.0.0
 * @since 3.6.0 The `aim`, `jabber`, and `yim` fields were removed as default user contact
 *              methods for new installations. See wp_get_user_contact_methods().
 * @since 4.7.0 The user's locale can be passed to `$userdata`.
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param array|object|WP_User $userdata {
 *     An array, object, or WP_User object of user data arguments.
 *
 *     @type int         $ID                   User ID. If supplied, the user will be updated.
 *     @type string      $user_pass            The plain-text user password.
 *     @type string      $user_login           The user's login username.
 *     @type string      $user_nicename        The URL-friendly user name.
 *     @type string      $user_url             The user URL.
 *     @type string      $user_email           The user email address.
 *     @type string      $display_name         The user's display name.
 *                                             Default is the user's username.
 *     @type string      $nickname             The user's nickname.
 *                                             Default is the user's username.
 *     @type string      $first_name           The user's first name. For new users, will be used
 *                                             to build the first part of the user's display name
 *                                             if `$display_name` is not specified.
 *     @type string      $last_name            The user's last name. For new users, will be used
 *                                             to build the second part of the user's display name
 *                                             if `$display_name` is not specified.
 *     @type string      $description          The user's biographical description.
 *     @type string|bool $rich_editing         Whether to enable the rich-editor for the user.
 *                                             False if not empty.
 *     @type string|bool $syntax_highlighting  Whether to enable the rich code editor for the user.
 *                                             False if not empty.
 *     @type string|bool $comment_shortcuts    Whether to enable comment moderation keyboard
 *                                             shortcuts for the user. Default false.
 *     @type string      $admin_color          Admin color scheme for the user. Default 'fresh'.
 *     @type bool        $use_ssl              Whether the user should always access the admin over
 *                                             https. Default false.
 *     @type string      $user_registered      Date the user registered. Format is 'Y-m-d H:i:s'.
 *     @type string|bool $show_admin_bar_front Whether to display the Admin Bar for the user on the
 *                                             site's front end. Default true.
 *     @type string      $role                 User's role.
 *     @type string      $locale               User's locale. Default empty.
 * }
 * @return int|WP_Error The newly created user's ID or a WP_Error object if the user could not
 *                      be created.
 */
function wp_insert_user($userdata)
{
}
/**
 * Update a user in the database.
 *
 * It is possible to update a user's password by specifying the 'user_pass'
 * value in the $userdata parameter array.
 *
 * If current user's password is being updated, then the cookies will be
 * cleared.
 *
 * @since 2.0.0
 *
 * @see wp_insert_user() For what fields can be set in $userdata.
 *
 * @param object|WP_User $userdata An array of user data or a user object of type stdClass or WP_User.
 * @return int|WP_Error The updated user's ID or a WP_Error object if the user could not be updated.
 */
function wp_update_user($userdata)
{
}
/**
 * A simpler way of inserting a user into the database.
 *
 * Creates a new user with just the username, password, and email. For more
 * complex user creation use wp_insert_user() to specify more information.
 *
 * @since 2.0.0
 * @see wp_insert_user() More complete way to create a new user
 *
 * @param string $username The user's username.
 * @param string $password The user's password.
 * @param string $email    Optional. The user's email. Default empty.
 * @return int|WP_Error The newly created user's ID or a WP_Error object if the user could not
 *                      be created.
 */
function wp_create_user($username, $password, $email = '')
{
}
/**
 * Returns a list of meta keys to be (maybe) populated in wp_update_user().
 *
 * The list of keys returned via this function are dependent on the presence
 * of those keys in the user meta data to be set.
 *
 * @since 3.3.0
 * @access private
 *
 * @param WP_User $user WP_User instance.
 * @return array List of user keys to be populated in wp_update_user().
 */
function _get_additional_user_keys($user)
{
}
/**
 * Set up the user contact methods.
 *
 * Default contact methods were removed in 3.6. A filter dictates contact methods.
 *
 * @since 3.7.0
 *
 * @param WP_User $user Optional. WP_User object.
 * @return array Array of contact methods and their labels.
 */
function wp_get_user_contact_methods($user = \null)
{
}
/**
 * The old private function for setting up user contact methods.
 *
 * Use wp_get_user_contact_methods() instead.
 *
 * @since 2.9.0
 * @access private
 *
 * @param WP_User $user Optional. WP_User object. Default null.
 * @return array Array of contact methods and their labels.
 */
function _wp_get_user_contactmethods($user = \null)
{
}
/**
 * Gets the text suggesting how to create strong passwords.
 *
 * @since 4.1.0
 *
 * @return string The password hint text.
 */
function wp_get_password_hint()
{
}
/**
 * Creates, stores, then returns a password reset key for user.
 *
 * @since 4.4.0
 *
 * @global wpdb         $wpdb      WordPress database abstraction object.
 * @global PasswordHash $wp_hasher Portable PHP password hashing framework.
 *
 * @param WP_User $user User to retrieve password reset key for.
 *
 * @return string|WP_Error Password reset key on success. WP_Error on error.
 */
function get_password_reset_key($user)
{
}
/**
 * Retrieves a user row based on password reset key and login
 *
 * A key is considered 'expired' if it exactly matches the value of the
 * user_activation_key field, rather than being matched after going through the
 * hashing process. This field is now hashed; old values are no longer accepted
 * but have a different WP_Error code so good user feedback can be provided.
 *
 * @since 3.1.0
 *
 * @global wpdb         $wpdb      WordPress database object for queries.
 * @global PasswordHash $wp_hasher Portable PHP password hashing framework instance.
 *
 * @param string $key       Hash to validate sending user's password.
 * @param string $login     The user login.
 * @return WP_User|WP_Error WP_User object on success, WP_Error object for invalid or expired keys.
 */
function check_password_reset_key($key, $login)
{
}
/**
 * Handles resetting the user's password.
 *
 * @since 2.5.0
 *
 * @param WP_User $user     The user
 * @param string $new_pass New password for the user in plaintext
 */
function reset_password($user, $new_pass)
{
}
/**
 * Handles registering a new user.
 *
 * @since 2.5.0
 *
 * @param string $user_login User's username for logging in
 * @param string $user_email User's email address to send password and add
 * @return int|WP_Error Either user's ID or error on failure.
 */
function register_new_user($user_login, $user_email)
{
}
/**
 * Initiates email notifications related to the creation of new users.
 *
 * Notifications are sent both to the site admin and to the newly created user.
 *
 * @since 4.4.0
 * @since 4.6.0 Converted the `$notify` parameter to accept 'user' for sending
 *              notifications only to the user created.
 *
 * @param int    $user_id ID of the newly created user.
 * @param string $notify  Optional. Type of notification that should happen. Accepts 'admin'
 *                        or an empty string (admin only), 'user', or 'both' (admin and user).
 *                        Default 'both'.
 */
function wp_send_new_user_notifications($user_id, $notify = 'both')
{
}
/**
 * Retrieve the current session token from the logged_in cookie.
 *
 * @since 4.0.0
 *
 * @return string Token.
 */
function wp_get_session_token()
{
}
/**
 * Retrieve a list of sessions for the current user.
 *
 * @since 4.0.0
 * @return array Array of sessions.
 */
function wp_get_all_sessions()
{
}
/**
 * Remove the current session token from the database.
 *
 * @since 4.0.0
 */
function wp_destroy_current_session()
{
}
/**
 * Remove all but the current session token for the current user for the database.
 *
 * @since 4.0.0
 */
function wp_destroy_other_sessions()
{
}
/**
 * Remove all session tokens for the current user from the database.
 *
 * @since 4.0.0
 */
function wp_destroy_all_sessions()
{
}
/**
 * Get the user IDs of all users with no role on this site.
 *
 * @since 4.4.0
 * @since 4.9.0 The `$site_id` parameter was added to support multisite.
 *
 * @param int|null $site_id Optional. The site ID to get users with no role for. Defaults to the current site.
 * @return array Array of user IDs.
 */
function wp_get_users_with_no_role($site_id = \null)
{
}
/**
 * Retrieves the current user object.
 *
 * Will set the current user, if the current user is not set. The current user
 * will be set to the logged-in person. If no user is logged-in, then it will
 * set the current user to 0, which is invalid and won't have any permissions.
 *
 * This function is used by the pluggable functions wp_get_current_user() and
 * get_currentuserinfo(), the latter of which is deprecated but used for backward
 * compatibility.
 *
 * @since 4.5.0
 * @access private
 *
 * @see wp_get_current_user()
 * @global WP_User $current_user Checks if the current user is set.
 *
 * @return WP_User Current WP_User instance.
 */
function _wp_get_current_user()
{
}
/**
 * Send a confirmation request email when a change of user email address is attempted.
 *
 * @since 3.0.0
 * @since 4.9.0 This function was moved from wp-admin/includes/ms.php so it's no longer Multisite specific.
 *
 * @global WP_Error $errors WP_Error object.
 * @global wpdb     $wpdb   WordPress database object.
 */
function send_confirmation_on_profile_email()
{
}
/**
 * Adds an admin notice alerting the user to check for confirmation request email
 * after email address change.
 *
 * @since 3.0.0
 * @since 4.9.0 This function was moved from wp-admin/includes/ms.php so it's no longer Multisite specific.
 *
 * @global string $pagenow
 */
function new_user_email_admin_notice()
{
}
/**
 * Get all user privacy request types.
 *
 * @since 4.9.6
 * @access private
 *
 * @return array List of core privacy action types.
 */
function _wp_privacy_action_request_types()
{
}
/**
 * Registers the personal data exporter for users.
 *
 * @since 4.9.6
 *
 * @param array $exporters  An array of personal data exporters.
 * @return array An array of personal data exporters.
 */
function wp_register_user_personal_data_exporter($exporters)
{
}
/**
 * Finds and exports personal data associated with an email address from the user and user_meta table.
 *
 * @since 4.9.6
 *
 * @param string $email_address  The users email address.
 * @return array An array of personal data.
 */
function wp_user_personal_data_exporter($email_address)
{
}
/**
 * Update log when privacy request is confirmed.
 *
 * @since 4.9.6
 * @access private
 *
 * @param int $request_id ID of the request.
 */
function _wp_privacy_account_request_confirmed($request_id)
{
}
/**
 * Notify the site administrator via email when a request is confirmed.
 *
 * Without this, the admin would have to manually check the site to see if any
 * action was needed on their part yet.
 *
 * @since 4.9.6
 *
 * @param int $request_id The ID of the request.
 */
function _wp_privacy_send_request_confirmation_notification($request_id)
{
}
/**
 * Notify the user when their erasure request is fulfilled.
 *
 * Without this, the user would never know if their data was actually erased.
 *
 * @since 4.9.6
 *
 * @param int $request_id The privacy request post ID associated with this request.
 */
function _wp_privacy_send_erasure_fulfillment_notification($request_id)
{
}
/**
 * Return request confirmation message HTML.
 *
 * @since 4.9.6
 * @access private
 *
 * @param int $request_id The request ID being confirmed.
 * @return string $message The confirmation message.
 */
function _wp_privacy_account_request_confirmed_message($request_id)
{
}
/**
 * Create and log a user request to perform a specific action.
 *
 * Requests are stored inside a post type named `user_request` since they can apply to both
 * users on the site, or guests without a user account.
 *
 * @since 4.9.6
 *
 * @param string $email_address User email address. This can be the address of a registered or non-registered user.
 * @param string $action_name   Name of the action that is being confirmed. Required.
 * @param array  $request_data  Misc data you want to send with the verification request and pass to the actions once the request is confirmed.
 * @return int|WP_Error Returns the request ID if successful, or a WP_Error object on failure.
 */
function wp_create_user_request($email_address = '', $action_name = '', $request_data = array())
{
}
/**
 * Get action description from the name and return a string.
 *
 * @since 4.9.6
 *
 * @param string $action_name Action name of the request.
 * @return string Human readable action name.
 */
function wp_user_request_action_description($action_name)
{
}
/**
 * Send a confirmation request email to confirm an action.
 *
 * If the request is not already pending, it will be updated.
 *
 * @since 4.9.6
 *
 * @param string $request_id ID of the request created via wp_create_user_request().
 * @return WP_Error|bool Will return true/false based on the success of sending the email, or a WP_Error object.
 */
function wp_send_user_request($request_id)
{
}
/**
 * Returns a confirmation key for a user action and stores the hashed version for future comparison.
 *
 * @since 4.9.6
 *
 * @param int $request_id Request ID.
 * @return string Confirmation key.
 */
function wp_generate_user_request_key($request_id)
{
}
/**
 * Validate a user request by comparing the key with the request's key.
 *
 * @since 4.9.6
 *
 * @param string $request_id ID of the request being confirmed.
 * @param string $key        Provided key to validate.
 * @return bool|WP_Error WP_Error on failure, true on success.
 */
function wp_validate_user_request_key($request_id, $key)
{
}
/**
 * Return data about a user request.
 *
 * @since 4.9.6
 *
 * @param int $request_id Request ID to get data about.
 * @return WP_User_Request|false
 */
function wp_get_user_request_data($request_id)
{
}
/**
 * Test if the current browser runs on a mobile device (smart phone, tablet, etc.)
 *
 * @since 3.4.0
 *
 * @return bool
 */
function wp_is_mobile()
{
}
//
// Template tags & API functions
//
/**
 * Register a widget
 *
 * Registers a WP_Widget widget
 *
 * @since 2.8.0
 * @since 4.6.0 Updated the `$widget` parameter to also accept a WP_Widget instance object
 *              instead of simply a `WP_Widget` subclass name.
 *
 * @see WP_Widget
 *
 * @global WP_Widget_Factory $wp_widget_factory
 *
 * @param string|WP_Widget $widget Either the name of a `WP_Widget` subclass or an instance of a `WP_Widget` subclass.
 */
function register_widget($widget)
{
}
/**
 * Unregisters a widget.
 *
 * Unregisters a WP_Widget widget. Useful for un-registering default widgets.
 * Run within a function hooked to the {@see 'widgets_init'} action.
 *
 * @since 2.8.0
 * @since 4.6.0 Updated the `$widget` parameter to also accept a WP_Widget instance object
 *              instead of simply a `WP_Widget` subclass name.
 *
 * @see WP_Widget
 *
 * @global WP_Widget_Factory $wp_widget_factory
 *
 * @param string|WP_Widget $widget Either the name of a `WP_Widget` subclass or an instance of a `WP_Widget` subclass.
 */
function unregister_widget($widget)
{
}
/**
 * Creates multiple sidebars.
 *
 * If you wanted to quickly create multiple sidebars for a theme or internally.
 * This function will allow you to do so. If you don't pass the 'name' and/or
 * 'id' in `$args`, then they will be built for you.
 *
 * @since 2.2.0
 *
 * @see register_sidebar() The second parameter is documented by register_sidebar() and is the same here.
 *
 * @global array $wp_registered_sidebars
 *
 * @param int          $number Optional. Number of sidebars to create. Default 1.
 * @param array|string $args {
 *     Optional. Array or string of arguments for building a sidebar.
 *
 *     @type string $id   The base string of the unique identifier for each sidebar. If provided, and multiple
 *                        sidebars are being defined, the id will have "-2" appended, and so on.
 *                        Default 'sidebar-' followed by the number the sidebar creation is currently at.
 *     @type string $name The name or title for the sidebars displayed in the admin dashboard. If registering
 *                        more than one sidebar, include '%d' in the string as a placeholder for the uniquely
 *                        assigned number for each sidebar.
 *                        Default 'Sidebar' for the first sidebar, otherwise 'Sidebar %d'.
 * }
 */
function register_sidebars($number = 1, $args = array())
{
}
/**
 * Builds the definition for a single sidebar and returns the ID.
 *
 * Accepts either a string or an array and then parses that against a set
 * of default arguments for the new sidebar. WordPress will automatically
 * generate a sidebar ID and name based on the current number of registered
 * sidebars if those arguments are not included.
 *
 * When allowing for automatic generation of the name and ID parameters, keep
 * in mind that the incrementor for your sidebar can change over time depending
 * on what other plugins and themes are installed.
 *
 * If theme support for 'widgets' has not yet been added when this function is
 * called, it will be automatically enabled through the use of add_theme_support()
 *
 * @since 2.2.0
 *
 * @global array $wp_registered_sidebars Stores the new sidebar in this array by sidebar ID.
 *
 * @param array|string $args {
 *     Optional. Array or string of arguments for the sidebar being registered.
 *
 *     @type string $name          The name or title of the sidebar displayed in the Widgets
 *                                 interface. Default 'Sidebar $instance'.
 *     @type string $id            The unique identifier by which the sidebar will be called.
 *                                 Default 'sidebar-$instance'.
 *     @type string $description   Description of the sidebar, displayed in the Widgets interface.
 *                                 Default empty string.
 *     @type string $class         Extra CSS class to assign to the sidebar in the Widgets interface.
 *                                 Default empty.
 *     @type string $before_widget HTML content to prepend to each widget's HTML output when
 *                                 assigned to this sidebar. Default is an opening list item element.
 *     @type string $after_widget  HTML content to append to each widget's HTML output when
 *                                 assigned to this sidebar. Default is a closing list item element.
 *     @type string $before_title  HTML content to prepend to the sidebar title when displayed.
 *                                 Default is an opening h2 element.
 *     @type string $after_title   HTML content to append to the sidebar title when displayed.
 *                                 Default is a closing h2 element.
 * }
 * @return string Sidebar ID added to $wp_registered_sidebars global.
 */
function register_sidebar($args = array())
{
}
/**
 * Removes a sidebar from the list.
 *
 * @since 2.2.0
 *
 * @global array $wp_registered_sidebars Stores the new sidebar in this array by sidebar ID.
 *
 * @param string|int $sidebar_id The ID of the sidebar when it was registered.
 */
function unregister_sidebar($sidebar_id)
{
}
/**
 * Checks if a sidebar is registered.
 *
 * @since 4.4.0
 *
 * @global array $wp_registered_sidebars Registered sidebars.
 *
 * @param string|int $sidebar_id The ID of the sidebar when it was registered.
 * @return bool True if the sidebar is registered, false otherwise.
 */
function is_registered_sidebar($sidebar_id)
{
}
/**
 * Register an instance of a widget.
 *
 * The default widget option is 'classname' that can be overridden.
 *
 * The function can also be used to un-register widgets when `$output_callback`
 * parameter is an empty string.
 *
 * @since 2.2.0
 *
 * @global array $wp_registered_widgets            Uses stored registered widgets.
 * @global array $wp_registered_widget_controls    Stores the registered widget controls (options).
 * @global array $wp_registered_widget_updates
 * @global array $_wp_deprecated_widgets_callbacks
 *
 * @param int|string $id              Widget ID.
 * @param string     $name            Widget display title.
 * @param callable   $output_callback Run when widget is called.
 * @param array      $options {
 *     Optional. An array of supplementary widget options for the instance.
 *
 *     @type string $classname   Class name for the widget's HTML container. Default is a shortened
 *                               version of the output callback name.
 *     @type string $description Widget description for display in the widget administration
 *                               panel and/or theme.
 * }
 */
function wp_register_sidebar_widget($id, $name, $output_callback, $options = array())
{
}
/**
 * Retrieve description for widget.
 *
 * When registering widgets, the options can also include 'description' that
 * describes the widget for display on the widget administration panel or
 * in the theme.
 *
 * @since 2.5.0
 *
 * @global array $wp_registered_widgets
 *
 * @param int|string $id Widget ID.
 * @return string|void Widget description, if available.
 */
function wp_widget_description($id)
{
}
/**
 * Retrieve description for a sidebar.
 *
 * When registering sidebars a 'description' parameter can be included that
 * describes the sidebar for display on the widget administration panel.
 *
 * @since 2.9.0
 *
 * @global array $wp_registered_sidebars
 *
 * @param string $id sidebar ID.
 * @return string|void Sidebar description, if available.
 */
function wp_sidebar_description($id)
{
}
/**
 * Remove widget from sidebar.
 *
 * @since 2.2.0
 *
 * @param int|string $id Widget ID.
 */
function wp_unregister_sidebar_widget($id)
{
}
/**
 * Registers widget control callback for customizing options.
 *
 * @since 2.2.0
 *
 * @todo `$params` parameter?
 *
 * @global array $wp_registered_widget_controls
 * @global array $wp_registered_widget_updates
 * @global array $wp_registered_widgets
 * @global array $_wp_deprecated_widgets_callbacks
 *
 * @param int|string   $id               Sidebar ID.
 * @param string       $name             Sidebar display name.
 * @param callable     $control_callback Run when sidebar is displayed.
 * @param array $options {
 *     Optional. Array or string of control options. Default empty array.
 *
 *     @type int        $height  Never used. Default 200.
 *     @type int        $width   Width of the fully expanded control form (but try hard to use the default width).
 *                               Default 250.
 *     @type int|string $id_base Required for multi-widgets, i.e widgets that allow multiple instances such as the
 *                               text widget. The widget id will end up looking like `{$id_base}-{$unique_number}`.
 * }
 */
function wp_register_widget_control($id, $name, $control_callback, $options = array())
{
}
/**
 * Registers the update callback for a widget.
 *
 * @since 2.8.0
 *
 * @global array $wp_registered_widget_updates
 *
 * @param string   $id_base         The base ID of a widget created by extending WP_Widget.
 * @param callable $update_callback Update callback method for the widget.
 * @param array    $options         Optional. Widget control options. See wp_register_widget_control().
 *                                  Default empty array.
 */
function _register_widget_update_callback($id_base, $update_callback, $options = array())
{
}
/**
 * Registers the form callback for a widget.
 *
 * @since 2.8.0
 *
 * @global array $wp_registered_widget_controls
 *
 * @param int|string $id            Widget ID.
 * @param string     $name          Name attribute for the widget.
 * @param callable   $form_callback Form callback.
 * @param array      $options       Optional. Widget control options. See wp_register_widget_control().
 *                                  Default empty array.
 */
function _register_widget_form_callback($id, $name, $form_callback, $options = array())
{
}
/**
 * Remove control callback for widget.
 *
 * @since 2.2.0
 *
 * @param int|string $id Widget ID.
 */
function wp_unregister_widget_control($id)
{
}
/**
 * Display dynamic sidebar.
 *
 * By default this displays the default sidebar or 'sidebar-1'. If your theme specifies the 'id' or
 * 'name' parameter for its registered sidebars you can pass an id or name as the $index parameter.
 * Otherwise, you can pass in a numerical index to display the sidebar at that index.
 *
 * @since 2.2.0
 *
 * @global array $wp_registered_sidebars
 * @global array $wp_registered_widgets
 *
 * @param int|string $index Optional, default is 1. Index, name or ID of dynamic sidebar.
 * @return bool True, if widget sidebar was found and called. False if not found or not called.
 */
function dynamic_sidebar($index = 1)
{
}
/**
 * Whether widget is displayed on the front end.
 *
 * Either $callback or $id_base can be used
 * $id_base is the first argument when extending WP_Widget class
 * Without the optional $widget_id parameter, returns the ID of the first sidebar
 * in which the first instance of the widget with the given callback or $id_base is found.
 * With the $widget_id parameter, returns the ID of the sidebar where
 * the widget with that callback/$id_base AND that ID is found.
 *
 * NOTE: $widget_id and $id_base are the same for single widgets. To be effective
 * this function has to run after widgets have initialized, at action {@see 'init'} or later.
 *
 * @since 2.2.0
 *
 * @global array $wp_registered_widgets
 *
 * @param string|false $callback      Optional, Widget callback to check. Default false.
 * @param int|false    $widget_id     Optional. Widget ID. Optional, but needed for checking. Default false.
 * @param string|false $id_base       Optional. The base ID of a widget created by extending WP_Widget. Default false.
 * @param bool         $skip_inactive Optional. Whether to check in 'wp_inactive_widgets'. Default true.
 * @return string|false False if widget is not active or id of sidebar in which the widget is active.
 */
function is_active_widget($callback = \false, $widget_id = \false, $id_base = \false, $skip_inactive = \true)
{
}
/**
 * Whether the dynamic sidebar is enabled and used by theme.
 *
 * @since 2.2.0
 *
 * @global array $wp_registered_widgets
 * @global array $wp_registered_sidebars
 *
 * @return bool True, if using widgets. False, if not using widgets.
 */
function is_dynamic_sidebar()
{
}
/**
 * Whether a sidebar is in use.
 *
 * @since 2.8.0
 *
 * @param string|int $index Sidebar name, id or number to check.
 * @return bool true if the sidebar is in use, false otherwise.
 */
function is_active_sidebar($index)
{
}
//
// Internal Functions
//
/**
 * Retrieve full list of sidebars and their widget instance IDs.
 *
 * Will upgrade sidebar widget list, if needed. Will also save updated list, if
 * needed.
 *
 * @since 2.2.0
 * @access private
 *
 * @global array $_wp_sidebars_widgets
 * @global array $sidebars_widgets
 *
 * @param bool $deprecated Not used (argument deprecated).
 * @return array Upgraded list of widgets to version 3 array format when called from the admin.
 */
function wp_get_sidebars_widgets($deprecated = \true)
{
}
/**
 * Set the sidebar widget option to update sidebars.
 *
 * @since 2.2.0
 * @access private
 *
 * @global array $_wp_sidebars_widgets
 * @param array $sidebars_widgets Sidebar widgets and their settings.
 */
function wp_set_sidebars_widgets($sidebars_widgets)
{
}
/**
 * Retrieve default registered sidebars list.
 *
 * @since 2.2.0
 * @access private
 *
 * @global array $wp_registered_sidebars
 *
 * @return array
 */
function wp_get_widget_defaults()
{
}
/**
 * Convert the widget settings from single to multi-widget format.
 *
 * @since 2.8.0
 *
 * @global array $_wp_sidebars_widgets
 *
 * @param string $base_name
 * @param string $option_name
 * @param array  $settings
 * @return array
 */
function wp_convert_widget_settings($base_name, $option_name, $settings)
{
}
/**
 * Output an arbitrary widget as a template tag.
 *
 * @since 2.8.0
 *
 * @global WP_Widget_Factory $wp_widget_factory
 *
 * @param string $widget   The widget's PHP class name (see class-wp-widget.php).
 * @param array  $instance Optional. The widget's instance settings. Default empty array.
 * @param array  $args {
 *     Optional. Array of arguments to configure the display of the widget.
 *
 *     @type string $before_widget HTML content that will be prepended to the widget's HTML output.
 *                                 Default `<div class="widget %s">`, where `%s` is the widget's class name.
 *     @type string $after_widget  HTML content that will be appended to the widget's HTML output.
 *                                 Default `</div>`.
 *     @type string $before_title  HTML content that will be prepended to the widget's title when displayed.
 *                                 Default `<h2 class="widgettitle">`.
 *     @type string $after_title   HTML content that will be appended to the widget's title when displayed.
 *                                 Default `</h2>`.
 * }
 */
function the_widget($widget, $instance = array(), $args = array())
{
}
/**
 * Retrieves the widget ID base value.
 *
 * @since 2.8.0
 *
 * @param string $id Widget ID.
 * @return string Widget ID base.
 */
function _get_widget_id_base($id)
{
}
/**
 * Handle sidebars config after theme change
 *
 * @access private
 * @since 3.3.0
 *
 * @global array $sidebars_widgets
 */
function _wp_sidebars_changed()
{
}
/**
 * Look for "lost" widgets, this has to run at least on each theme change.
 *
 * @since 2.8.0
 *
 * @global array $wp_registered_sidebars
 * @global array $sidebars_widgets
 * @global array $wp_registered_widgets
 *
 * @param string|bool $theme_changed Whether the theme was changed as a boolean. A value
 *                                   of 'customize' defers updates for the Customizer.
 * @return array Updated sidebars widgets.
 */
function retrieve_widgets($theme_changed = \false)
{
}
/**
 * Compares a list of sidebars with their widgets against a whitelist.
 *
 * @since 4.9.0
 * @since 4.9.2 Always tries to restore widget assignments from previous data, not just if sidebars needed mapping.
 *
 * @param array $existing_sidebars_widgets List of sidebars and their widget instance IDs.
 * @return array Mapped sidebars widgets.
 */
function wp_map_sidebars_widgets($existing_sidebars_widgets)
{
}
/**
 * Compares a list of sidebars with their widgets against a whitelist.
 *
 * @since 4.9.0
 *
 * @param array $sidebars_widgets List of sidebars and their widget instance IDs.
 * @param array $whitelist        Optional. List of widget IDs to compare against. Default: Registered widgets.
 * @return array Sidebars with whitelisted widgets.
 */
function _wp_remove_unregistered_widgets($sidebars_widgets, $whitelist = array())
{
}
/**
 * Display the RSS entries in a list.
 *
 * @since 2.5.0
 *
 * @param string|array|object $rss RSS url.
 * @param array $args Widget arguments.
 */
function wp_widget_rss_output($rss, $args = array())
{
}
/**
 * Display RSS widget options form.
 *
 * The options for what fields are displayed for the RSS form are all booleans
 * and are as follows: 'url', 'title', 'items', 'show_summary', 'show_author',
 * 'show_date'.
 *
 * @since 2.5.0
 *
 * @param array|string $args Values for input fields.
 * @param array $inputs Override default display options.
 */
function wp_widget_rss_form($args, $inputs = \null)
{
}
/**
 * Process RSS feed widget data and optionally retrieve feed items.
 *
 * The feed widget can not have more than 20 items or it will reset back to the
 * default, which is 10.
 *
 * The resulting array has the feed title, feed url, feed link (from channel),
 * feed items, error (if any), and whether to show summary, author, and date.
 * All respectively in the order of the array elements.
 *
 * @since 2.5.0
 *
 * @param array $widget_rss RSS widget feed data. Expects unescaped data.
 * @param bool $check_feed Optional, default is true. Whether to check feed for errors.
 * @return array
 */
function wp_widget_rss_process($widget_rss, $check_feed = \true)
{
}
/**
 * Registers all of the default WordPress widgets on startup.
 *
 * Calls {@see 'widgets_init'} action after all of the WordPress widgets have been registered.
 *
 * @since 2.2.0
 */
function wp_widgets_init()
{
}
/**
 * Output the login page header.
 *
 * @param string   $title    Optional. WordPress login Page title to display in the `<title>` element.
 *                           Default 'Log In'.
 * @param string   $message  Optional. Message to display in header. Default empty.
 * @param WP_Error $wp_error Optional. The error to pass. Default is a WP_Error instance.
 */
function login_header($title = 'Log In', $message = '', $wp_error = \null)
{
}
// End of login_header()
/**
 * Outputs the footer for the login page.
 *
 * @param string $input_id Which input to auto-focus
 */
function login_footer($input_id = '')
{
}
/**
 * @since 3.0.0
 */
function wp_shake_js()
{
}
/**
 * @since 3.7.0
 */
function wp_login_viewport_meta()
{
}
/**
 * Handles sending password retrieval email to user.
 *
 * @return bool|WP_Error True: when finish. WP_Error on error
 */
function retrieve_password()
{
}
/**
 * Prints signup_header via wp_head
 *
 * @since MU (3.0.0)
 */
function do_signup_header()
{
}
/**
 * Prints styles for front-end Multisite signup pages
 *
 * @since MU (3.0.0)
 */
function wpmu_signup_stylesheet()
{
}
/**
 * Generates and displays the Signup and Create Site forms
 *
 * @since MU (3.0.0)
 *
 * @param string          $blogname   The new site name.
 * @param string          $blog_title The new site title.
 * @param WP_Error|string $errors     A WP_Error object containing existing errors. Defaults to empty string.
 */
function show_blog_form($blogname = '', $blog_title = '', $errors = '')
{
}
/**
 * Validate the new site signup
 *
 * @since MU (3.0.0)
 *
 * @return array Contains the new site data and error messages.
 */
function validate_blog_form()
{
}
/**
 * Display user registration form
 *
 * @since MU (3.0.0)
 *
 * @param string          $user_name  The entered username.
 * @param string          $user_email The entered email address.
 * @param WP_Error|string $errors     A WP_Error object containing existing errors. Defaults to empty string.
 */
function show_user_form($user_name = '', $user_email = '', $errors = '')
{
}
/**
 * Validate user signup name and email
 *
 * @since MU (3.0.0)
 *
 * @return array Contains username, email, and error messages.
 */
function validate_user_form()
{
}
/**
 * Allow returning users to sign up for another site
 *
 * @since MU (3.0.0)
 *
 * @param string          $blogname   The new site name
 * @param string          $blog_title The new site title.
 * @param WP_Error|string $errors     A WP_Error object containing existing errors. Defaults to empty string.
 */
function signup_another_blog($blogname = '', $blog_title = '', $errors = '')
{
}
/**
 * Validate a new site signup.
 *
 * @since MU (3.0.0)
 *
 * @return null|bool True if site signup was validated, false if error.
 *                   The function halts all execution if the user is not logged in.
 */
function validate_another_blog_signup()
{
}
/**
 * Confirm a new site signup.
 *
 * @since MU (3.0.0)
 * @since 4.4.0 Added the `$blog_id` parameter.
 *
 * @param string $domain     The domain URL.
 * @param string $path       The site root path.
 * @param string $blog_title The site title.
 * @param string $user_name  The username.
 * @param string $user_email The user's email address.
 * @param array  $meta       Any additional meta from the {@see 'add_signup_meta'} filter in validate_blog_signup().
 * @param int    $blog_id    The site ID.
 */
function confirm_another_blog_signup($domain, $path, $blog_title, $user_name, $user_email = '', $meta = array(), $blog_id = 0)
{
}
/**
 * Setup the new user signup process
 *
 * @since MU (3.0.0)
 *
 * @param string          $user_name  The username.
 * @param string          $user_email The user's email.
 * @param WP_Error|string $errors     A WP_Error object containing existing errors. Defaults to empty string.
 */
function signup_user($user_name = '', $user_email = '', $errors = '')
{
}
/**
 * Validate the new user signup
 *
 * @since MU (3.0.0)
 *
 * @return bool True if new user signup was validated, false if error
 */
function validate_user_signup()
{
}
/**
 * New user signup confirmation
 *
 * @since MU (3.0.0)
 *
 * @param string $user_name The username
 * @param string $user_email The user's email address
 */
function confirm_user_signup($user_name, $user_email)
{
}
/**
 * Setup the new site signup
 *
 * @since MU (3.0.0)
 *
 * @param string          $user_name  The username.
 * @param string          $user_email The user's email address.
 * @param string          $blogname   The site name.
 * @param string          $blog_title The site title.
 * @param WP_Error|string $errors     A WP_Error object containing existing errors. Defaults to empty string.
 */
function signup_blog($user_name = '', $user_email = '', $blogname = '', $blog_title = '', $errors = '')
{
}
/**
 * Validate new site signup
 *
 * @since MU (3.0.0)
 *
 * @return bool True if the site signup was validated, false if error
 */
function validate_blog_signup()
{
}
/**
 * New site signup confirmation
 *
 * @since MU (3.0.0)
 *
 * @param string $domain The domain URL
 * @param string $path The site root path
 * @param string $blog_title The new site title
 * @param string $user_name The user's username
 * @param string $user_email The user's email address
 * @param array $meta Any additional meta from the {@see 'add_signup_meta'} filter in validate_blog_signup()
 */
function confirm_blog_signup($domain, $path, $blog_title, $user_name = '', $user_email = '', $meta = array())
{
}
/**
 * Retrieves languages available during the site/user signup process.
 *
 * @since 4.4.0
 *
 * @see get_available_languages()
 *
 * @return array List of available languages.
 */
function signup_get_available_languages()
{
}
/**
 * Response to a trackback.
 *
 * Responds with an error or success XML message.
 *
 * @since 0.71
 *
 * @param mixed  $error         Whether there was an error.
 *                              Default '0'. Accepts '0' or '1', true or false.
 * @param string $error_message Error message if an error occurred.
 */
function trackback_response($error = 0, $error_message = '')
{
}
/**
 * logIO() - Writes logging info to a file.
 *
 * @deprecated 3.4.0 Use error_log()
 * @see error_log()
 *
 * @param string $io Whether input or output
 * @param string $msg Information describing logging reason.
 */
function logIO($io, $msg)
{
}
/**
 * WordPress database abstraction object.
 * @var wpdb
 */
$wpdb = \null;
