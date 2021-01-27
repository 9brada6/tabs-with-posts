<?php
/**
 * Generated stub declarations for WordPress.
 * @see https://wordpress.org
 * @see https://github.com/szepeviktor/wordpress-stubs
 */

/**
 * The custom background script.
 *
 * @package WordPress
 * @subpackage Administration
 */
/**
 * The custom background class.
 *
 * @since 3.0.0
 */
class Custom_Background
{
    /**
     * Callback for administration header.
     *
     * @var callable
     * @since 3.0.0
     */
    public $admin_header_callback;
    /**
     * Callback for header div.
     *
     * @var callable
     * @since 3.0.0
     */
    public $admin_image_div_callback;
    /**
     * Used to trigger a success message when settings updated and set to true.
     *
     * @since 3.0.0
     * @var bool
     */
    private $updated;
    /**
     * Constructor - Register administration header callback.
     *
     * @since 3.0.0
     * @param callable $admin_header_callback
     * @param callable $admin_image_div_callback Optional custom image div output callback.
     */
    public function __construct($admin_header_callback = '', $admin_image_div_callback = '')
    {
    }
    /**
     * Set up the hooks for the Custom Background admin page.
     *
     * @since 3.0.0
     */
    public function init()
    {
    }
    /**
     * Set up the enqueue for the CSS & JavaScript files.
     *
     * @since 3.0.0
     */
    public function admin_load()
    {
    }
    /**
     * Execute custom background modification.
     *
     * @since 3.0.0
     */
    public function take_action()
    {
    }
    /**
     * Display the custom background page.
     *
     * @since 3.0.0
     */
    public function admin_page()
    {
    }
    /**
     * Handle an Image upload for the background image.
     *
     * @since 3.0.0
     */
    public function handle_upload()
    {
    }
    /**
     * Ajax handler for adding custom background context to an attachment.
     *
     * Triggered when the user adds a new background image from the
     * Media Manager.
     *
     * @since 4.1.0
     */
    public function ajax_background_add()
    {
    }
    /**
     *
     * @since 3.4.0
     * @deprecated 3.5.0
     *
     * @param array $form_fields
     * @return array $form_fields
     */
    public function attachment_fields_to_edit($form_fields)
    {
    }
    /**
     *
     * @since 3.4.0
     * @deprecated 3.5.0
     *
     * @param array $tabs
     * @return array $tabs
     */
    public function filter_upload_tabs($tabs)
    {
    }
    /**
     *
     * @since 3.4.0
     * @deprecated 3.5.0
     */
    public function wp_set_background_image()
    {
    }
}
/**
 * The custom header image script.
 *
 * @package WordPress
 * @subpackage Administration
 */
/**
 * The custom header image class.
 *
 * @since 2.1.0
 */
class Custom_Image_Header
{
    /**
     * Callback for administration header.
     *
     * @var callable
     * @since 2.1.0
     */
    public $admin_header_callback;
    /**
     * Callback for header div.
     *
     * @var callable
     * @since 3.0.0
     */
    public $admin_image_div_callback;
    /**
     * Holds default headers.
     *
     * @var array
     * @since 3.0.0
     */
    public $default_headers = array();
    /**
     * Used to trigger a success message when settings updated and set to true.
     *
     * @since 3.0.0
     * @var bool
     */
    private $updated;
    /**
     * Constructor - Register administration header callback.
     *
     * @since 2.1.0
     * @param callable $admin_header_callback
     * @param callable $admin_image_div_callback Optional custom image div output callback.
     */
    public function __construct($admin_header_callback, $admin_image_div_callback = '')
    {
    }
    /**
     * Set up the hooks for the Custom Header admin page.
     *
     * @since 2.1.0
     */
    public function init()
    {
    }
    /**
     * Adds contextual help.
     *
     * @since 3.0.0
     */
    public function help()
    {
    }
    /**
     * Get the current step.
     *
     * @since 2.6.0
     *
     * @return int Current step
     */
    public function step()
    {
    }
    /**
     * Set up the enqueue for the JavaScript files.
     *
     * @since 2.1.0
     */
    public function js_includes()
    {
    }
    /**
     * Set up the enqueue for the CSS files
     *
     * @since 2.7.0
     */
    public function css_includes()
    {
    }
    /**
     * Execute custom header modification.
     *
     * @since 2.6.0
     */
    public function take_action()
    {
    }
    /**
     * Process the default headers
     *
     * @since 3.0.0
     *
     * @global array $_wp_default_headers
     */
    public function process_default_headers()
    {
    }
    /**
     * Display UI for selecting one of several default headers.
     *
     * Show the random image option if this theme has multiple header images.
     * Random image option is on by default if no header has been set.
     *
     * @since 3.0.0
     *
     * @param string $type The header type. One of 'default' (for the Uploaded Images control)
     *                     or 'uploaded' (for the Uploaded Images control).
     */
    public function show_header_selector($type = 'default')
    {
    }
    /**
     * Execute JavaScript depending on step.
     *
     * @since 2.1.0
     */
    public function js()
    {
    }
    /**
     * Display JavaScript based on Step 1 and 3.
     *
     * @since 2.6.0
     */
    public function js_1()
    {
    }
    /**
     * Display JavaScript based on Step 2.
     *
     * @since 2.6.0
     */
    public function js_2()
    {
    }
    /**
     * Display first step of custom header image page.
     *
     * @since 2.1.0
     */
    public function step_1()
    {
    }
    /**
     * Display second step of custom header image page.
     *
     * @since 2.1.0
     */
    public function step_2()
    {
    }
    /**
     * Upload the file to be cropped in the second step.
     *
     * @since 3.4.0
     */
    public function step_2_manage_upload()
    {
    }
    /**
     * Display third step of custom header image page.
     *
     * @since 2.1.0
     * @since 4.4.0 Switched to using wp_get_attachment_url() instead of the guid
     *              for retrieving the header image URL.
     */
    public function step_3()
    {
    }
    /**
     * Display last step of custom header image page.
     *
     * @since 2.1.0
     */
    public function finished()
    {
    }
    /**
     * Display the page based on the current step.
     *
     * @since 2.1.0
     */
    public function admin_page()
    {
    }
    /**
     * Unused since 3.5.0.
     *
     * @since 3.4.0
     *
     * @param array $form_fields
     * @return array $form_fields
     */
    public function attachment_fields_to_edit($form_fields)
    {
    }
    /**
     * Unused since 3.5.0.
     *
     * @since 3.4.0
     *
     * @param array $tabs
     * @return array $tabs
     */
    public function filter_upload_tabs($tabs)
    {
    }
    /**
     * Choose a header image, selected from existing uploaded and default headers,
     * or provide an array of uploaded header data (either new, or from media library).
     *
     * @since 3.4.0
     *
     * @param mixed $choice Which header image to select. Allows for values of 'random-default-image',
     * 	for randomly cycling among the default images; 'random-uploaded-image', for randomly cycling
     * 	among the uploaded images; the key of a default image registered for that theme; and
     * 	the key of an image uploaded for that theme (the attachment ID of the image).
     *  Or an array of arguments: attachment_id, url, width, height. All are required.
     */
    public final function set_header_image($choice)
    {
    }
    /**
     * Remove a header image.
     *
     * @since 3.4.0
     */
    public final function remove_header_image()
    {
    }
    /**
     * Reset a header image to the default image for the theme.
     *
     * This method does not do anything if the theme does not have a default header image.
     *
     * @since 3.4.0
     */
    public final function reset_header_image()
    {
    }
    /**
     * Calculate width and height based on what the currently selected theme supports.
     *
     * @since 3.9.0
     *
     * @param array $dimensions
     * @return array dst_height and dst_width of header image.
     */
    public final function get_header_dimensions($dimensions)
    {
    }
    /**
     * Create an attachment 'object'.
     *
     * @since 3.9.0
     *
     * @param string $cropped              Cropped image URL.
     * @param int    $parent_attachment_id Attachment ID of parent image.
     * @return array Attachment object.
     */
    public final function create_attachment_object($cropped, $parent_attachment_id)
    {
    }
    /**
     * Insert an attachment and its metadata.
     *
     * @since 3.9.0
     *
     * @param array  $object  Attachment object.
     * @param string $cropped Cropped image URL.
     * @return int Attachment ID.
     */
    public final function insert_attachment($object, $cropped)
    {
    }
    /**
     * Gets attachment uploaded by Media Manager, crops it, then saves it as a
     * new object. Returns JSON-encoded object details.
     *
     * @since 3.9.0
     */
    public function ajax_header_crop()
    {
    }
    /**
     * Given an attachment ID for a header image, updates its "last used"
     * timestamp to now.
     *
     * Triggered when the user tries adds a new header image from the
     * Media Manager, even if s/he doesn't save that change.
     *
     * @since 3.9.0
     */
    public function ajax_header_add()
    {
    }
    /**
     * Given an attachment ID for a header image, unsets it as a user-uploaded
     * header image for the current theme.
     *
     * Triggered when the user clicks the overlay "X" button next to each image
     * choice in the Customizer's Header tool.
     *
     * @since 3.9.0
     */
    public function ajax_header_remove()
    {
    }
    /**
     * Updates the last-used postmeta on a header image attachment after saving a new header image via the Customizer.
     *
     * @since 3.9.0
     *
     * @param WP_Customize_Manager $wp_customize Customize manager.
     */
    public function customize_set_last_used($wp_customize)
    {
    }
    /**
     * Gets the details of default header images if defined.
     *
     * @since 3.9.0
     *
     * @return array Default header images.
     */
    public function get_default_header_images()
    {
    }
    /**
     * Gets the previously uploaded header images.
     *
     * @since 3.9.0
     *
     * @return array Uploaded header images.
     */
    public function get_uploaded_header_images()
    {
    }
    /**
     * Get the ID of a previous crop from the same base image.
     *
     * @since 4.9.0
     *
     * @param  array $object A crop attachment object.
     * @return int|false An attachment ID if one exists. False if none.
     */
    public function get_previous_crop($object)
    {
    }
}
/**
 * Upgrader API: WP_Upgrader_Skin class
 *
 * @package WordPress
 * @subpackage Upgrader
 * @since 4.6.0
 */
/**
 * Generic Skin for the WordPress Upgrader classes. This skin is designed to be extended for specific purposes.
 *
 * @since 2.8.0
 * @since 4.6.0 Moved to its own file from wp-admin/includes/class-wp-upgrader-skins.php.
 */
class WP_Upgrader_Skin
{
    public $upgrader;
    public $done_header = \false;
    public $done_footer = \false;
    /**
     * Holds the result of an upgrade.
     *
     * @since 2.8.0
     * @var string|bool|WP_Error
     */
    public $result = \false;
    public $options = array();
    /**
     *
     * @param array $args
     */
    public function __construct($args = array())
    {
    }
    /**
     *
     * @param WP_Upgrader $upgrader
     */
    public function set_upgrader(&$upgrader)
    {
    }
    /**
     */
    public function add_strings()
    {
    }
    /**
     * Sets the result of an upgrade.
     *
     * @since 2.8.0
     *
     * @param string|bool|WP_Error $result The result of an upgrade.
     */
    public function set_result($result)
    {
    }
    /**
     * Displays a form to the user to request for their FTP/SSH details in order
     * to connect to the filesystem.
     *
     * @since 2.8.0
     * @since 4.6.0 The `$context` parameter default changed from `false` to an empty string.
     *
     * @see request_filesystem_credentials()
     *
     * @param bool   $error                        Optional. Whether the current request has failed to connect.
     *                                             Default false.
     * @param string $context                      Optional. Full path to the directory that is tested
     *                                             for being writable. Default empty.
     * @param bool   $allow_relaxed_file_ownership Optional. Whether to allow Group/World writable. Default false.
     * @return bool False on failure, true on success.
     */
    public function request_filesystem_credentials($error = \false, $context = '', $allow_relaxed_file_ownership = \false)
    {
    }
    /**
     */
    public function header()
    {
    }
    /**
     */
    public function footer()
    {
    }
    /**
     *
     * @param string|WP_Error $errors
     */
    public function error($errors)
    {
    }
    /**
     *
     * @param string $string
     */
    public function feedback($string)
    {
    }
    /**
     */
    public function before()
    {
    }
    /**
     */
    public function after()
    {
    }
    /**
     * Output JavaScript that calls function to decrement the update counts.
     *
     * @since 3.9.0
     *
     * @param string $type Type of update count to decrement. Likely values include 'plugin',
     *                     'theme', 'translation', etc.
     */
    protected function decrement_update_count($type)
    {
    }
    /**
     */
    public function bulk_header()
    {
    }
    /**
     */
    public function bulk_footer()
    {
    }
}
/**
 * Upgrader API: Automatic_Upgrader_Skin class
 *
 * @package WordPress
 * @subpackage Upgrader
 * @since 4.6.0
 */
/**
 * Upgrader Skin for Automatic WordPress Upgrades
 *
 * This skin is designed to be used when no output is intended, all output
 * is captured and stored for the caller to process and log/email/discard.
 *
 * @since 3.7.0
 * @since 4.6.0 Moved to its own file from wp-admin/includes/class-wp-upgrader-skins.php.
 *
 * @see Bulk_Upgrader_Skin
 */
class Automatic_Upgrader_Skin extends \WP_Upgrader_Skin
{
    protected $messages = array();
    /**
     * Determines whether the upgrader needs FTP/SSH details in order to connect
     * to the filesystem.
     *
     * @since 3.7.0
     * @since 4.6.0 The `$context` parameter default changed from `false` to an empty string.
     *
     * @see request_filesystem_credentials()
     *
     * @param bool   $error                        Optional. Whether the current request has failed to connect.
     *                                             Default false.
     * @param string $context                      Optional. Full path to the directory that is tested
     *                                             for being writable. Default empty.
     * @param bool   $allow_relaxed_file_ownership Optional. Whether to allow Group/World writable. Default false.
     * @return bool True on success, false on failure.
     */
    public function request_filesystem_credentials($error = \false, $context = '', $allow_relaxed_file_ownership = \false)
    {
    }
    /**
     *
     * @return array
     */
    public function get_upgrade_messages()
    {
    }
    /**
     *
     * @param string|array|WP_Error $data
     */
    public function feedback($data)
    {
    }
    /**
     */
    public function header()
    {
    }
    /**
     */
    public function footer()
    {
    }
}
/**
 * Upgrader API: Bulk_Upgrader_Skin class
 *
 * @package WordPress
 * @subpackage Upgrader
 * @since 4.6.0
 */
/**
 * Generic Bulk Upgrader Skin for WordPress Upgrades.
 *
 * @since 3.0.0
 * @since 4.6.0 Moved to its own file from wp-admin/includes/class-wp-upgrader-skins.php.
 *
 * @see WP_Upgrader_Skin
 */
class Bulk_Upgrader_Skin extends \WP_Upgrader_Skin
{
    public $in_loop = \false;
    /**
     * @var string|false
     */
    public $error = \false;
    /**
     *
     * @param array $args
     */
    public function __construct($args = array())
    {
    }
    /**
     */
    public function add_strings()
    {
    }
    /**
     *
     * @param string $string
     */
    public function feedback($string)
    {
    }
    /**
     */
    public function header()
    {
    }
    /**
     */
    public function footer()
    {
    }
    /**
     *
     * @param string|WP_Error $error
     */
    public function error($error)
    {
    }
    /**
     */
    public function bulk_header()
    {
    }
    /**
     */
    public function bulk_footer()
    {
    }
    /**
     *
     * @param string $title
     */
    public function before($title = '')
    {
    }
    /**
     *
     * @param string $title
     */
    public function after($title = '')
    {
    }
    /**
     */
    public function reset()
    {
    }
    /**
     */
    public function flush_output()
    {
    }
}
/**
 * Upgrader API: Bulk_Plugin_Upgrader_Skin class
 *
 * @package WordPress
 * @subpackage Upgrader
 * @since 4.6.0
 */
/**
 * Bulk Plugin Upgrader Skin for WordPress Plugin Upgrades.
 *
 * @since 3.0.0
 * @since 4.6.0 Moved to its own file from wp-admin/includes/class-wp-upgrader-skins.php.
 *
 * @see Bulk_Upgrader_Skin
 */
class Bulk_Plugin_Upgrader_Skin extends \Bulk_Upgrader_Skin
{
    public $plugin_info = array();
    // Plugin_Upgrader::bulk() will fill this in.
    public function add_strings()
    {
    }
    /**
     *
     * @param string $title
     */
    public function before($title = '')
    {
    }
    /**
     *
     * @param string $title
     */
    public function after($title = '')
    {
    }
    /**
     */
    public function bulk_footer()
    {
    }
}
/**
 * Upgrader API: Bulk_Plugin_Upgrader_Skin class
 *
 * @package WordPress
 * @subpackage Upgrader
 * @since 4.6.0
 */
/**
 * Bulk Theme Upgrader Skin for WordPress Theme Upgrades.
 *
 * @since 3.0.0
 * @since 4.6.0 Moved to its own file from wp-admin/includes/class-wp-upgrader-skins.php.
 *
 * @see Bulk_Upgrader_Skin
 */
class Bulk_Theme_Upgrader_Skin extends \Bulk_Upgrader_Skin
{
    public $theme_info = array();
    // Theme_Upgrader::bulk() will fill this in.
    public function add_strings()
    {
    }
    /**
     *
     * @param string $title
     */
    public function before($title = '')
    {
    }
    /**
     *
     * @param string $title
     */
    public function after($title = '')
    {
    }
    /**
     */
    public function bulk_footer()
    {
    }
}
/**
 * Core class used for upgrading/installing a local set of files via
 * the Filesystem Abstraction classes from a Zip file.
 *
 * @since 2.8.0
 */
class WP_Upgrader
{
    /**
     * The error/notification strings used to update the user on the progress.
     *
     * @since 2.8.0
     * @var array $strings
     */
    public $strings = array();
    /**
     * The upgrader skin being used.
     *
     * @since 2.8.0
     * @var Automatic_Upgrader_Skin|WP_Upgrader_Skin $skin
     */
    public $skin = \null;
    /**
     * The result of the installation.
     *
     * This is set by WP_Upgrader::install_package(), only when the package is installed
     * successfully. It will then be an array, unless a WP_Error is returned by the
     * {@see 'upgrader_post_install'} filter. In that case, the WP_Error will be assigned to
     * it.
     *
     * @since 2.8.0
     *
     * @var WP_Error|array $result {
     *      @type string $source             The full path to the source the files were installed from.
     *      @type string $source_files       List of all the files in the source directory.
     *      @type string $destination        The full path to the installation destination folder.
     *      @type string $destination_name   The name of the destination folder, or empty if `$destination`
     *                                       and `$local_destination` are the same.
     *      @type string $local_destination  The full local path to the destination folder. This is usually
     *                                       the same as `$destination`.
     *      @type string $remote_destination The full remote path to the destination folder
     *                                       (i.e., from `$wp_filesystem`).
     *      @type bool   $clear_destination  Whether the destination folder was cleared.
     * }
     */
    public $result = array();
    /**
     * The total number of updates being performed.
     *
     * Set by the bulk update methods.
     *
     * @since 3.0.0
     * @var int $update_count
     */
    public $update_count = 0;
    /**
     * The current update if multiple updates are being performed.
     *
     * Used by the bulk update methods, and incremented for each update.
     *
     * @since 3.0.0
     * @var int
     */
    public $update_current = 0;
    /**
     * Construct the upgrader with a skin.
     *
     * @since 2.8.0
     *
     * @param WP_Upgrader_Skin $skin The upgrader skin to use. Default is a WP_Upgrader_Skin.
     *                               instance.
     */
    public function __construct($skin = \null)
    {
    }
    /**
     * Initialize the upgrader.
     *
     * This will set the relationship between the skin being used and this upgrader,
     * and also add the generic strings to `WP_Upgrader::$strings`.
     *
     * @since 2.8.0
     */
    public function init()
    {
    }
    /**
     * Add the generic strings to WP_Upgrader::$strings.
     *
     * @since 2.8.0
     */
    public function generic_strings()
    {
    }
    /**
     * Connect to the filesystem.
     *
     * @since 2.8.0
     *
     * @global WP_Filesystem_Base $wp_filesystem Subclass
     *
     * @param array $directories                  Optional. A list of directories. If any of these do
     *                                            not exist, a WP_Error object will be returned.
     *                                            Default empty array.
     * @param bool  $allow_relaxed_file_ownership Whether to allow relaxed file ownership.
     *                                            Default false.
     * @return bool|WP_Error True if able to connect, false or a WP_Error otherwise.
     */
    public function fs_connect($directories = array(), $allow_relaxed_file_ownership = \false)
    {
    }
    //end fs_connect();
    /**
     * Download a package.
     *
     * @since 2.8.0
     *
     * @param string $package The URI of the package. If this is the full path to an
     *                        existing local file, it will be returned untouched.
     * @return string|WP_Error The full path to the downloaded package file, or a WP_Error object.
     */
    public function download_package($package)
    {
    }
    /**
     * Unpack a compressed package file.
     *
     * @since 2.8.0
     *
     * @global WP_Filesystem_Base $wp_filesystem Subclass
     *
     * @param string $package        Full path to the package file.
     * @param bool   $delete_package Optional. Whether to delete the package file after attempting
     *                               to unpack it. Default true.
     * @return string|WP_Error The path to the unpacked contents, or a WP_Error on failure.
     */
    public function unpack_package($package, $delete_package = \true)
    {
    }
    /**
     * Flatten the results of WP_Filesystem::dirlist() for iterating over.
     *
     * @since 4.9.0
     * @access protected
     *
     * @param  array  $nested_files  Array of files as returned by WP_Filesystem::dirlist()
     * @param  string $path          Relative path to prepend to child nodes. Optional.
     * @return array $files A flattened array of the $nested_files specified.
     */
    protected function flatten_dirlist($nested_files, $path = '')
    {
    }
    /**
     * Clears the directory where this item is going to be installed into.
     *
     * @since 4.3.0
     *
     * @global WP_Filesystem_Base $wp_filesystem Subclass
     *
     * @param string $remote_destination The location on the remote filesystem to be cleared
     * @return bool|WP_Error True upon success, WP_Error on failure.
     */
    public function clear_destination($remote_destination)
    {
    }
    /**
     * Install a package.
     *
     * Copies the contents of a package form a source directory, and installs them in
     * a destination directory. Optionally removes the source. It can also optionally
     * clear out the destination folder if it already exists.
     *
     * @since 2.8.0
     *
     * @global WP_Filesystem_Base $wp_filesystem Subclass
     * @global array              $wp_theme_directories
     *
     * @param array|string $args {
     *     Optional. Array or string of arguments for installing a package. Default empty array.
     *
     *     @type string $source                      Required path to the package source. Default empty.
     *     @type string $destination                 Required path to a folder to install the package in.
     *                                               Default empty.
     *     @type bool   $clear_destination           Whether to delete any files already in the destination
     *                                               folder. Default false.
     *     @type bool   $clear_working               Whether to delete the files form the working directory
     *                                               after copying to the destination. Default false.
     *     @type bool   $abort_if_destination_exists Whether to abort the installation if
     *                                               the destination folder already exists. Default true.
     *     @type array  $hook_extra                  Extra arguments to pass to the filter hooks called by
     *                                               WP_Upgrader::install_package(). Default empty array.
     * }
     *
     * @return array|WP_Error The result (also stored in `WP_Upgrader::$result`), or a WP_Error on failure.
     */
    public function install_package($args = array())
    {
    }
    /**
     * Run an upgrade/installation.
     *
     * Attempts to download the package (if it is not a local file), unpack it, and
     * install it in the destination folder.
     *
     * @since 2.8.0
     *
     * @param array $options {
     *     Array or string of arguments for upgrading/installing a package.
     *
     *     @type string $package                     The full path or URI of the package to install.
     *                                               Default empty.
     *     @type string $destination                 The full path to the destination folder.
     *                                               Default empty.
     *     @type bool   $clear_destination           Whether to delete any files already in the
     *                                               destination folder. Default false.
     *     @type bool   $clear_working               Whether to delete the files form the working
     *                                               directory after copying to the destination.
     *                                               Default false.
     *     @type bool   $abort_if_destination_exists Whether to abort the installation if the destination
     *                                               folder already exists. When true, `$clear_destination`
     *                                               should be false. Default true.
     *     @type bool   $is_multi                    Whether this run is one of multiple upgrade/installation
     *                                               actions being performed in bulk. When true, the skin
     *                                               WP_Upgrader::header() and WP_Upgrader::footer()
     *                                               aren't called. Default false.
     *     @type array  $hook_extra                  Extra arguments to pass to the filter hooks called by
     *                                               WP_Upgrader::run().
     * }
     * @return array|false|WP_error The result from self::install_package() on success, otherwise a WP_Error,
     *                              or false if unable to connect to the filesystem.
     */
    public function run($options)
    {
    }
    /**
     * Toggle maintenance mode for the site.
     *
     * Creates/deletes the maintenance file to enable/disable maintenance mode.
     *
     * @since 2.8.0
     *
     * @global WP_Filesystem_Base $wp_filesystem Subclass
     *
     * @param bool $enable True to enable maintenance mode, false to disable.
     */
    public function maintenance_mode($enable = \false)
    {
    }
    /**
     * Creates a lock using WordPress options.
     *
     * @since 4.5.0
     * @static
     *
     * @param string $lock_name       The name of this unique lock.
     * @param int    $release_timeout Optional. The duration in seconds to respect an existing lock.
     *                                Default: 1 hour.
     * @return bool False if a lock couldn't be created or if the lock is still valid. True otherwise.
     */
    public static function create_lock($lock_name, $release_timeout = \null)
    {
    }
    /**
     * Releases an upgrader lock.
     *
     * @since 4.5.0
     * @static
     *
     * @see WP_Upgrader::create_lock()
     *
     * @param string $lock_name The name of this unique lock.
     * @return bool True if the lock was successfully released. False on failure.
     */
    public static function release_lock($lock_name)
    {
    }
}
/**
 * Upgrade API: Core_Upgrader class
 *
 * @package WordPress
 * @subpackage Upgrader
 * @since 4.6.0
 */
/**
 * Core class used for updating core.
 *
 * It allows for WordPress to upgrade itself in combination with
 * the wp-admin/includes/update-core.php file.
 *
 * @since 2.8.0
 * @since 4.6.0 Moved to its own file from wp-admin/includes/class-wp-upgrader.php.
 *
 * @see WP_Upgrader
 */
class Core_Upgrader extends \WP_Upgrader
{
    /**
     * Initialize the upgrade strings.
     *
     * @since 2.8.0
     */
    public function upgrade_strings()
    {
    }
    /**
     * Upgrade WordPress core.
     *
     * @since 2.8.0
     *
     * @global WP_Filesystem_Base $wp_filesystem Subclass
     * @global callable           $_wp_filesystem_direct_method
     *
     * @param object $current Response object for whether WordPress is current.
     * @param array  $args {
     *        Optional. Arguments for upgrading WordPress core. Default empty array.
     *
     *        @type bool $pre_check_md5    Whether to check the file checksums before
     *                                     attempting the upgrade. Default true.
     *        @type bool $attempt_rollback Whether to attempt to rollback the chances if
     *                                     there is a problem. Default false.
     *        @type bool $do_rollback      Whether to perform this "upgrade" as a rollback.
     *                                     Default false.
     * }
     * @return null|false|WP_Error False or WP_Error on failure, null on success.
     */
    public function upgrade($current, $args = array())
    {
    }
    /**
     * Determines if this WordPress Core version should update to an offered version or not.
     *
     * @since 3.7.0
     *
     * @static
     *
     * @param string $offered_ver The offered version, of the format x.y.z.
     * @return bool True if we should update to the offered version, otherwise false.
     */
    public static function should_update_to_version($offered_ver)
    {
    }
    /**
     * Compare the disk file checksums against the expected checksums.
     *
     * @since 3.7.0
     *
     * @global string $wp_version
     * @global string $wp_local_package
     *
     * @return bool True if the checksums match, otherwise false.
     */
    public function check_files()
    {
    }
}
/**
 * Upgrade API: File_Upload_Upgrader class
 *
 * @package WordPress
 * @subpackage Upgrader
 * @since 4.6.0
 */
/**
 * Core class used for handling file uploads.
 *
 * This class handles the upload process and passes it as if it's a local file
 * to the Upgrade/Installer functions.
 *
 * @since 2.8.0
 * @since 4.6.0 Moved to its own file from wp-admin/includes/class-wp-upgrader.php.
 */
class File_Upload_Upgrader
{
    /**
     * The full path to the file package.
     *
     * @since 2.8.0
     * @var string $package
     */
    public $package;
    /**
     * The name of the file.
     *
     * @since 2.8.0
     * @var string $filename
     */
    public $filename;
    /**
     * The ID of the attachment post for this file.
     *
     * @since 3.3.0
     * @var int $id
     */
    public $id = 0;
    /**
     * Construct the upgrader for a form.
     *
     * @since 2.8.0
     *
     * @param string $form      The name of the form the file was uploaded from.
     * @param string $urlholder The name of the `GET` parameter that holds the filename.
     */
    public function __construct($form, $urlholder)
    {
    }
    /**
     * Delete the attachment/uploaded file.
     *
     * @since 3.2.2
     *
     * @return bool Whether the cleanup was successful.
     */
    public function cleanup()
    {
    }
}
/**
 * PemFTP base class
 *
 */
class ftp_base
{
    /* Public variables */
    var $LocalEcho;
    var $Verbose;
    var $OS_local;
    var $OS_remote;
    /* Private variables */
    var $_lastaction;
    var $_errors;
    var $_type;
    var $_umask;
    var $_timeout;
    var $_passive;
    var $_host;
    var $_fullhost;
    var $_port;
    var $_datahost;
    var $_dataport;
    var $_ftp_control_sock;
    var $_ftp_data_sock;
    var $_ftp_temp_sock;
    var $_ftp_buff_size;
    var $_login;
    var $_password;
    var $_connected;
    var $_ready;
    var $_code;
    var $_message;
    var $_can_restore;
    var $_port_available;
    var $_curtype;
    var $_features;
    var $_error_array;
    var $AuthorizedTransferMode;
    var $OS_FullName;
    var $_eol_code;
    var $AutoAsciiExt;
    /* Constructor */
    function __construct($port_mode = false, $verb = false, $le = false)
    {
    }
    function ftp_base($port_mode = false)
    {
    }
    // <!-- --------------------------------------------------------------------------------------- -->
    // <!--       Public functions                                                                  -->
    // <!-- --------------------------------------------------------------------------------------- -->
    function parselisting($line)
    {
    }
    function SendMSG($message = "", $crlf = \true)
    {
    }
    function SetType($mode = \FTP_AUTOASCII)
    {
    }
    function _settype($mode = \FTP_ASCII)
    {
    }
    function Passive($pasv = \NULL)
    {
    }
    function SetServer($host, $port = 21, $reconnect = \true)
    {
    }
    function SetUmask($umask = 022)
    {
    }
    function SetTimeout($timeout = 30)
    {
    }
    function connect($server = \NULL)
    {
    }
    function quit($force = \false)
    {
    }
    function login($user = \NULL, $pass = \NULL)
    {
    }
    function pwd()
    {
    }
    function cdup()
    {
    }
    function chdir($pathname)
    {
    }
    function rmdir($pathname)
    {
    }
    function mkdir($pathname)
    {
    }
    function rename($from, $to)
    {
    }
    function filesize($pathname)
    {
    }
    function abort()
    {
    }
    function mdtm($pathname)
    {
    }
    function systype()
    {
    }
    function delete($pathname)
    {
    }
    function site($command, $fnction = "site")
    {
    }
    function chmod($pathname, $mode)
    {
    }
    function restore($from)
    {
    }
    function features()
    {
    }
    function rawlist($pathname = "", $arg = "")
    {
    }
    function nlist($pathname = "", $arg = "")
    {
    }
    function is_exists($pathname)
    {
    }
    function file_exists($pathname)
    {
    }
    function fget($fp, $remotefile, $rest = 0)
    {
    }
    function get($remotefile, $localfile = \NULL, $rest = 0)
    {
    }
    function fput($remotefile, $fp)
    {
    }
    function put($localfile, $remotefile = \NULL, $rest = 0)
    {
    }
    function mput($local = ".", $remote = \NULL, $continious = \false)
    {
    }
    function mget($remote, $local = ".", $continious = \false)
    {
    }
    function mdel($remote, $continious = \false)
    {
    }
    function mmkdir($dir, $mode = 0777)
    {
    }
    function glob($pattern, $handle = \NULL)
    {
    }
    function glob_pattern_match($pattern, $string)
    {
    }
    function glob_regexp($pattern, $probe)
    {
    }
    function dirlist($remote)
    {
    }
    // <!-- --------------------------------------------------------------------------------------- -->
    // <!--       Private functions                                                                 -->
    // <!-- --------------------------------------------------------------------------------------- -->
    function _checkCode()
    {
    }
    function _list($arg = "", $cmd = "LIST", $fnction = "_list")
    {
    }
    // <!-- --------------------------------------------------------------------------------------- -->
    // <!-- Partie : gestion des erreurs                                                            -->
    // <!-- --------------------------------------------------------------------------------------- -->
    // Gnre une erreur pour traitement externe  la classe
    function PushError($fctname, $msg, $desc = \false)
    {
    }
    // Rcupre une erreur externe
    function PopError()
    {
    }
}
/**
 * PemFTP - A Ftp implementation in pure PHP
 *
 * @package PemFTP
 * @since 2.5.0
 *
 * @version 1.0
 * @copyright Alexey Dotsenko
 * @author Alexey Dotsenko
 * @link http://www.phpclasses.org/browse/package/1743.html Site
 * @license LGPL http://www.opensource.org/licenses/lgpl-license.html
 */
/**
 * FTP implementation using fsockopen to connect.
 *
 * @package PemFTP
 * @subpackage Pure
 * @since 2.5.0
 *
 * @version 1.0
 * @copyright Alexey Dotsenko
 * @author Alexey Dotsenko
 * @link http://www.phpclasses.org/browse/package/1743.html Site
 * @license LGPL http://www.opensource.org/licenses/lgpl-license.html
 */
class ftp_pure extends \ftp_base
{
    function __construct($verb = \FALSE, $le = \FALSE)
    {
    }
    // <!-- --------------------------------------------------------------------------------------- -->
    // <!--       Private functions                                                                 -->
    // <!-- --------------------------------------------------------------------------------------- -->
    function _settimeout($sock)
    {
    }
    function _connect($host, $port)
    {
    }
    function _readmsg($fnction = "_readmsg")
    {
    }
    function _exec($cmd, $fnction = "_exec")
    {
    }
    function _data_prepare($mode = \FTP_ASCII)
    {
    }
    function _data_read($mode = \FTP_ASCII, $fp = \NULL)
    {
    }
    function _data_write($mode = \FTP_ASCII, $fp = \NULL)
    {
    }
    function _data_write_block($mode, $block)
    {
    }
    function _data_close()
    {
    }
    function _quit($force = \FALSE)
    {
    }
}
/**
 * PemFTP - A Ftp implementation in pure PHP
 *
 * @package PemFTP
 * @since 2.5.0
 *
 * @version 1.0
 * @copyright Alexey Dotsenko
 * @author Alexey Dotsenko
 * @link http://www.phpclasses.org/browse/package/1743.html Site
 * @license LGPL http://www.opensource.org/licenses/lgpl-license.html
 */
/**
 * Socket Based FTP implementation
 *
 * @package PemFTP
 * @subpackage Socket
 * @since 2.5.0
 *
 * @version 1.0
 * @copyright Alexey Dotsenko
 * @author Alexey Dotsenko
 * @link http://www.phpclasses.org/browse/package/1743.html Site
 * @license LGPL http://www.opensource.org/licenses/lgpl-license.html
 */
class ftp_sockets extends \ftp_base
{
    function __construct($verb = \FALSE, $le = \FALSE)
    {
    }
    // <!-- --------------------------------------------------------------------------------------- -->
    // <!--       Private functions                                                                 -->
    // <!-- --------------------------------------------------------------------------------------- -->
    function _settimeout($sock)
    {
    }
    function _connect($host, $port)
    {
    }
    function _readmsg($fnction = "_readmsg")
    {
    }
    function _exec($cmd, $fnction = "_exec")
    {
    }
    function _data_prepare($mode = \FTP_ASCII)
    {
    }
    function _data_read($mode = \FTP_ASCII, $fp = \NULL)
    {
    }
    function _data_write($mode = \FTP_ASCII, $fp = \NULL)
    {
    }
    function _data_write_block($mode, $block)
    {
    }
    function _data_close()
    {
    }
    function _quit()
    {
    }
}
class ftp extends \ftp_sockets
{
}
/**
 * Upgrader API: Language_Pack_Upgrader_Skin class
 *
 * @package WordPress
 * @subpackage Upgrader
 * @since 4.6.0
 */
/**
 * Translation Upgrader Skin for WordPress Translation Upgrades.
 *
 * @since 3.7.0
 * @since 4.6.0 Moved to its own file from wp-admin/includes/class-wp-upgrader-skins.php.
 *
 * @see WP_Upgrader_Skin
 */
class Language_Pack_Upgrader_Skin extends \WP_Upgrader_Skin
{
    public $language_update = \null;
    public $done_header = \false;
    public $done_footer = \false;
    public $display_footer_actions = \true;
    /**
     *
     * @param array $args
     */
    public function __construct($args = array())
    {
    }
    /**
     */
    public function before()
    {
    }
    /**
     *
     * @param string|WP_Error $error
     */
    public function error($error)
    {
    }
    /**
     */
    public function after()
    {
    }
    /**
     */
    public function bulk_footer()
    {
    }
}
/**
 * Upgrade API: Language_Pack_Upgrader class
 *
 * @package WordPress
 * @subpackage Upgrader
 * @since 4.6.0
 */
/**
 * Core class used for updating/installing language packs (translations)
 * for plugins, themes, and core.
 *
 * @since 3.7.0
 * @since 4.6.0 Moved to its own file from wp-admin/includes/class-wp-upgrader.php.
 *
 * @see WP_Upgrader
 */
class Language_Pack_Upgrader extends \WP_Upgrader
{
    /**
     * Result of the language pack upgrade.
     *
     * @since 3.7.0
     * @var array|WP_Error $result
     * @see WP_Upgrader::$result
     */
    public $result;
    /**
     * Whether a bulk upgrade/installation is being performed.
     *
     * @since 3.7.0
     * @var bool $bulk
     */
    public $bulk = \true;
    /**
     * Asynchronously upgrades language packs after other upgrades have been made.
     *
     * Hooked to the {@see 'upgrader_process_complete'} action by default.
     *
     * @since 3.7.0
     * @static
     *
     * @param false|WP_Upgrader $upgrader Optional. WP_Upgrader instance or false. If `$upgrader` is
     *                                    a Language_Pack_Upgrader instance, the method will bail to
     *                                    avoid recursion. Otherwise unused. Default false.
     */
    public static function async_upgrade($upgrader = \false)
    {
    }
    /**
     * Initialize the upgrade strings.
     *
     * @since 3.7.0
     */
    public function upgrade_strings()
    {
    }
    /**
     * Upgrade a language pack.
     *
     * @since 3.7.0
     *
     * @param string|false $update Optional. Whether an update offer is available. Default false.
     * @param array        $args   Optional. Other optional arguments, see
     *                             Language_Pack_Upgrader::bulk_upgrade(). Default empty array.
     * @return array|bool|WP_Error The result of the upgrade, or a WP_Error object instead.
     */
    public function upgrade($update = \false, $args = array())
    {
    }
    /**
     * Bulk upgrade language packs.
     *
     * @since 3.7.0
     *
     * @global WP_Filesystem_Base $wp_filesystem Subclass
     *
     * @param array $language_updates Optional. Language pack updates. Default empty array.
     * @param array $args {
     *     Optional. Other arguments for upgrading multiple language packs. Default empty array
     *
     *     @type bool $clear_update_cache Whether to clear the update cache when done.
     *                                    Default true.
     * }
     * @return array|bool|WP_Error Will return an array of results, or true if there are no updates,
     *                                   false or WP_Error for initial errors.
     */
    public function bulk_upgrade($language_updates = array(), $args = array())
    {
    }
    /**
     * Check the package source to make sure there are .mo and .po files.
     *
     * Hooked to the {@see 'upgrader_source_selection'} filter by
     * Language_Pack_Upgrader::bulk_upgrade().
     *
     * @since 3.7.0
     *
     * @global WP_Filesystem_Base $wp_filesystem Subclass
     *
     * @param string|WP_Error $source
     * @param string          $remote_source
     */
    public function check_package($source, $remote_source)
    {
    }
    /**
     * Get the name of an item being updated.
     *
     * @since 3.7.0
     *
     * @param object $update The data for an update.
     * @return string The name of the item being updated.
     */
    public function get_name_for_update($update)
    {
    }
}
/* For futur use
  define( 'PCLZIP_CB_PRE_LIST', 78005 );
  define( 'PCLZIP_CB_POST_LIST', 78006 );
  define( 'PCLZIP_CB_PRE_DELETE', 78007 );
  define( 'PCLZIP_CB_POST_DELETE', 78008 );
  */
// --------------------------------------------------------------------------------
// Class : PclZip
// Description :
//   PclZip is the class that represent a Zip archive.
//   The public methods allow the manipulation of the archive.
// Attributes :
//   Attributes must not be accessed directly.
// Methods :
//   PclZip() : Object creator
//   create() : Creates the Zip archive
//   listContent() : List the content of the Zip archive
//   extract() : Extract the content of the archive
//   properties() : List the properties of the archive
// --------------------------------------------------------------------------------
class PclZip
{
    // ----- Filename of the zip file
    var $zipname = '';
    // ----- File descriptor of the zip file
    var $zip_fd = 0;
    // ----- Internal error handling
    var $error_code = 1;
    var $error_string = '';
    // ----- Current status of the magic_quotes_runtime
    // This value store the php configuration for magic_quotes
    // The class can then disable the magic_quotes and reset it after
    var $magic_quotes_status;
    // --------------------------------------------------------------------------------
    // Function : PclZip()
    // Description :
    //   Creates a PclZip object and set the name of the associated Zip archive
    //   filename.
    //   Note that no real action is taken, if the archive does not exist it is not
    //   created. Use create() for that.
    // --------------------------------------------------------------------------------
    function __construct($p_zipname)
    {
    }
    public function PclZip($p_zipname)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function :
    //   create($p_filelist, $p_add_dir="", $p_remove_dir="")
    //   create($p_filelist, $p_option, $p_option_value, ...)
    // Description :
    //   This method supports two different synopsis. The first one is historical.
    //   This method creates a Zip Archive. The Zip file is created in the
    //   filesystem. The files and directories indicated in $p_filelist
    //   are added in the archive. See the parameters description for the
    //   supported format of $p_filelist.
    //   When a directory is in the list, the directory and its content is added
    //   in the archive.
    //   In this synopsis, the function takes an optional variable list of
    //   options. See bellow the supported options.
    // Parameters :
    //   $p_filelist : An array containing file or directory names, or
    //                 a string containing one filename or one directory name, or
    //                 a string containing a list of filenames and/or directory
    //                 names separated by spaces.
    //   $p_add_dir : A path to add before the real path of the archived file,
    //                in order to have it memorized in the archive.
    //   $p_remove_dir : A path to remove from the real path of the file to archive,
    //                   in order to have a shorter path memorized in the archive.
    //                   When $p_add_dir and $p_remove_dir are set, $p_remove_dir
    //                   is removed first, before $p_add_dir is added.
    // Options :
    //   PCLZIP_OPT_ADD_PATH :
    //   PCLZIP_OPT_REMOVE_PATH :
    //   PCLZIP_OPT_REMOVE_ALL_PATH :
    //   PCLZIP_OPT_COMMENT :
    //   PCLZIP_CB_PRE_ADD :
    //   PCLZIP_CB_POST_ADD :
    // Return Values :
    //   0 on failure,
    //   The list of the added files, with a status of the add action.
    //   (see PclZip::listContent() for list entry format)
    // --------------------------------------------------------------------------------
    function create($p_filelist)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function :
    //   add($p_filelist, $p_add_dir="", $p_remove_dir="")
    //   add($p_filelist, $p_option, $p_option_value, ...)
    // Description :
    //   This method supports two synopsis. The first one is historical.
    //   This methods add the list of files in an existing archive.
    //   If a file with the same name already exists, it is added at the end of the
    //   archive, the first one is still present.
    //   If the archive does not exist, it is created.
    // Parameters :
    //   $p_filelist : An array containing file or directory names, or
    //                 a string containing one filename or one directory name, or
    //                 a string containing a list of filenames and/or directory
    //                 names separated by spaces.
    //   $p_add_dir : A path to add before the real path of the archived file,
    //                in order to have it memorized in the archive.
    //   $p_remove_dir : A path to remove from the real path of the file to archive,
    //                   in order to have a shorter path memorized in the archive.
    //                   When $p_add_dir and $p_remove_dir are set, $p_remove_dir
    //                   is removed first, before $p_add_dir is added.
    // Options :
    //   PCLZIP_OPT_ADD_PATH :
    //   PCLZIP_OPT_REMOVE_PATH :
    //   PCLZIP_OPT_REMOVE_ALL_PATH :
    //   PCLZIP_OPT_COMMENT :
    //   PCLZIP_OPT_ADD_COMMENT :
    //   PCLZIP_OPT_PREPEND_COMMENT :
    //   PCLZIP_CB_PRE_ADD :
    //   PCLZIP_CB_POST_ADD :
    // Return Values :
    //   0 on failure,
    //   The list of the added files, with a status of the add action.
    //   (see PclZip::listContent() for list entry format)
    // --------------------------------------------------------------------------------
    function add($p_filelist)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : listContent()
    // Description :
    //   This public method, gives the list of the files and directories, with their
    //   properties.
    //   The properties of each entries in the list are (used also in other functions) :
    //     filename : Name of the file. For a create or add action it is the filename
    //                given by the user. For an extract function it is the filename
    //                of the extracted file.
    //     stored_filename : Name of the file / directory stored in the archive.
    //     size : Size of the stored file.
    //     compressed_size : Size of the file's data compressed in the archive
    //                       (without the headers overhead)
    //     mtime : Last known modification date of the file (UNIX timestamp)
    //     comment : Comment associated with the file
    //     folder : true | false
    //     index : index of the file in the archive
    //     status : status of the action (depending of the action) :
    //              Values are :
    //                ok : OK !
    //                filtered : the file / dir is not extracted (filtered by user)
    //                already_a_directory : the file can not be extracted because a
    //                                      directory with the same name already exists
    //                write_protected : the file can not be extracted because a file
    //                                  with the same name already exists and is
    //                                  write protected
    //                newer_exist : the file was not extracted because a newer file exists
    //                path_creation_fail : the file is not extracted because the folder
    //                                     does not exist and can not be created
    //                write_error : the file was not extracted because there was a
    //                              error while writing the file
    //                read_error : the file was not extracted because there was a error
    //                             while reading the file
    //                invalid_header : the file was not extracted because of an archive
    //                                 format error (bad file header)
    //   Note that each time a method can continue operating when there
    //   is an action error on a file, the error is only logged in the file status.
    // Return Values :
    //   0 on an unrecoverable failure,
    //   The list of the files in the archive.
    // --------------------------------------------------------------------------------
    function listContent()
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function :
    //   extract($p_path="./", $p_remove_path="")
    //   extract([$p_option, $p_option_value, ...])
    // Description :
    //   This method supports two synopsis. The first one is historical.
    //   This method extract all the files / directories from the archive to the
    //   folder indicated in $p_path.
    //   If you want to ignore the 'root' part of path of the memorized files
    //   you can indicate this in the optional $p_remove_path parameter.
    //   By default, if a newer file with the same name already exists, the
    //   file is not extracted.
    //
    //   If both PCLZIP_OPT_PATH and PCLZIP_OPT_ADD_PATH aoptions
    //   are used, the path indicated in PCLZIP_OPT_ADD_PATH is append
    //   at the end of the path value of PCLZIP_OPT_PATH.
    // Parameters :
    //   $p_path : Path where the files and directories are to be extracted
    //   $p_remove_path : First part ('root' part) of the memorized path
    //                    (if any similar) to remove while extracting.
    // Options :
    //   PCLZIP_OPT_PATH :
    //   PCLZIP_OPT_ADD_PATH :
    //   PCLZIP_OPT_REMOVE_PATH :
    //   PCLZIP_OPT_REMOVE_ALL_PATH :
    //   PCLZIP_CB_PRE_EXTRACT :
    //   PCLZIP_CB_POST_EXTRACT :
    // Return Values :
    //   0 or a negative value on failure,
    //   The list of the extracted files, with a status of the action.
    //   (see PclZip::listContent() for list entry format)
    // --------------------------------------------------------------------------------
    function extract()
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function :
    //   extractByIndex($p_index, $p_path="./", $p_remove_path="")
    //   extractByIndex($p_index, [$p_option, $p_option_value, ...])
    // Description :
    //   This method supports two synopsis. The first one is historical.
    //   This method is doing a partial extract of the archive.
    //   The extracted files or folders are identified by their index in the
    //   archive (from 0 to n).
    //   Note that if the index identify a folder, only the folder entry is
    //   extracted, not all the files included in the archive.
    // Parameters :
    //   $p_index : A single index (integer) or a string of indexes of files to
    //              extract. The form of the string is "0,4-6,8-12" with only numbers
    //              and '-' for range or ',' to separate ranges. No spaces or ';'
    //              are allowed.
    //   $p_path : Path where the files and directories are to be extracted
    //   $p_remove_path : First part ('root' part) of the memorized path
    //                    (if any similar) to remove while extracting.
    // Options :
    //   PCLZIP_OPT_PATH :
    //   PCLZIP_OPT_ADD_PATH :
    //   PCLZIP_OPT_REMOVE_PATH :
    //   PCLZIP_OPT_REMOVE_ALL_PATH :
    //   PCLZIP_OPT_EXTRACT_AS_STRING : The files are extracted as strings and
    //     not as files.
    //     The resulting content is in a new field 'content' in the file
    //     structure.
    //     This option must be used alone (any other options are ignored).
    //   PCLZIP_CB_PRE_EXTRACT :
    //   PCLZIP_CB_POST_EXTRACT :
    // Return Values :
    //   0 on failure,
    //   The list of the extracted files, with a status of the action.
    //   (see PclZip::listContent() for list entry format)
    // --------------------------------------------------------------------------------
    //function extractByIndex($p_index, options...)
    function extractByIndex($p_index)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function :
    //   delete([$p_option, $p_option_value, ...])
    // Description :
    //   This method removes files from the archive.
    //   If no parameters are given, then all the archive is emptied.
    // Parameters :
    //   None or optional arguments.
    // Options :
    //   PCLZIP_OPT_BY_INDEX :
    //   PCLZIP_OPT_BY_NAME :
    //   PCLZIP_OPT_BY_EREG :
    //   PCLZIP_OPT_BY_PREG :
    // Return Values :
    //   0 on failure,
    //   The list of the files which are still present in the archive.
    //   (see PclZip::listContent() for list entry format)
    // --------------------------------------------------------------------------------
    function delete()
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : deleteByIndex()
    // Description :
    //   ***** Deprecated *****
    //   delete(PCLZIP_OPT_BY_INDEX, $p_index) should be prefered.
    // --------------------------------------------------------------------------------
    function deleteByIndex($p_index)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : properties()
    // Description :
    //   This method gives the properties of the archive.
    //   The properties are :
    //     nb : Number of files in the archive
    //     comment : Comment associated with the archive file
    //     status : not_exist, ok
    // Parameters :
    //   None
    // Return Values :
    //   0 on failure,
    //   An array with the archive properties.
    // --------------------------------------------------------------------------------
    function properties()
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : duplicate()
    // Description :
    //   This method creates an archive by copying the content of an other one. If
    //   the archive already exist, it is replaced by the new one without any warning.
    // Parameters :
    //   $p_archive : The filename of a valid archive, or
    //                a valid PclZip object.
    // Return Values :
    //   1 on success.
    //   0 or a negative value on error (error code).
    // --------------------------------------------------------------------------------
    function duplicate($p_archive)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : merge()
    // Description :
    //   This method merge the $p_archive_to_add archive at the end of the current
    //   one ($this).
    //   If the archive ($this) does not exist, the merge becomes a duplicate.
    //   If the $p_archive_to_add archive does not exist, the merge is a success.
    // Parameters :
    //   $p_archive_to_add : It can be directly the filename of a valid zip archive,
    //                       or a PclZip object archive.
    // Return Values :
    //   1 on success,
    //   0 or negative values on error (see below).
    // --------------------------------------------------------------------------------
    function merge($p_archive_to_add)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : errorCode()
    // Description :
    // Parameters :
    // --------------------------------------------------------------------------------
    function errorCode()
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : errorName()
    // Description :
    // Parameters :
    // --------------------------------------------------------------------------------
    function errorName($p_with_code = \false)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : errorInfo()
    // Description :
    // Parameters :
    // --------------------------------------------------------------------------------
    function errorInfo($p_full = \false)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // ***** UNDER THIS LINE ARE DEFINED PRIVATE INTERNAL FUNCTIONS *****
    // *****                                                        *****
    // *****       THESES FUNCTIONS MUST NOT BE USED DIRECTLY       *****
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privCheckFormat()
    // Description :
    //   This method check that the archive exists and is a valid zip archive.
    //   Several level of check exists. (futur)
    // Parameters :
    //   $p_level : Level of check. Default 0.
    //              0 : Check the first bytes (magic codes) (default value))
    //              1 : 0 + Check the central directory (futur)
    //              2 : 1 + Check each file header (futur)
    // Return Values :
    //   true on success,
    //   false on error, the error code is set.
    // --------------------------------------------------------------------------------
    function privCheckFormat($p_level = 0)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privParseOptions()
    // Description :
    //   This internal methods reads the variable list of arguments ($p_options_list,
    //   $p_size) and generate an array with the options and values ($v_result_list).
    //   $v_requested_options contains the options that can be present and those that
    //   must be present.
    //   $v_requested_options is an array, with the option value as key, and 'optional',
    //   or 'mandatory' as value.
    // Parameters :
    //   See above.
    // Return Values :
    //   1 on success.
    //   0 on failure.
    // --------------------------------------------------------------------------------
    function privParseOptions(&$p_options_list, $p_size, &$v_result_list, $v_requested_options = \false)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privOptionDefaultThreshold()
    // Description :
    // Parameters :
    // Return Values :
    // --------------------------------------------------------------------------------
    function privOptionDefaultThreshold(&$p_options)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privFileDescrParseAtt()
    // Description :
    // Parameters :
    // Return Values :
    //   1 on success.
    //   0 on failure.
    // --------------------------------------------------------------------------------
    function privFileDescrParseAtt(&$p_file_list, &$p_filedescr, $v_options, $v_requested_options = \false)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privFileDescrExpand()
    // Description :
    //   This method look for each item of the list to see if its a file, a folder
    //   or a string to be added as file. For any other type of files (link, other)
    //   just ignore the item.
    //   Then prepare the information that will be stored for that file.
    //   When its a folder, expand the folder with all the files that are in that
    //   folder (recursively).
    // Parameters :
    // Return Values :
    //   1 on success.
    //   0 on failure.
    // --------------------------------------------------------------------------------
    function privFileDescrExpand(&$p_filedescr_list, &$p_options)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privCreate()
    // Description :
    // Parameters :
    // Return Values :
    // --------------------------------------------------------------------------------
    function privCreate($p_filedescr_list, &$p_result_list, &$p_options)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privAdd()
    // Description :
    // Parameters :
    // Return Values :
    // --------------------------------------------------------------------------------
    function privAdd($p_filedescr_list, &$p_result_list, &$p_options)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privOpenFd()
    // Description :
    // Parameters :
    // --------------------------------------------------------------------------------
    function privOpenFd($p_mode)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privCloseFd()
    // Description :
    // Parameters :
    // --------------------------------------------------------------------------------
    function privCloseFd()
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privAddList()
    // Description :
    //   $p_add_dir and $p_remove_dir will give the ability to memorize a path which is
    //   different from the real path of the file. This is usefull if you want to have PclTar
    //   running in any directory, and memorize relative path from an other directory.
    // Parameters :
    //   $p_list : An array containing the file or directory names to add in the tar
    //   $p_result_list : list of added files with their properties (specially the status field)
    //   $p_add_dir : Path to add in the filename path archived
    //   $p_remove_dir : Path to remove in the filename path archived
    // Return Values :
    // --------------------------------------------------------------------------------
    //  function privAddList($p_list, &$p_result_list, $p_add_dir, $p_remove_dir, $p_remove_all_dir, &$p_options)
    function privAddList($p_filedescr_list, &$p_result_list, &$p_options)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privAddFileList()
    // Description :
    // Parameters :
    //   $p_filedescr_list : An array containing the file description
    //                      or directory names to add in the zip
    //   $p_result_list : list of added files with their properties (specially the status field)
    // Return Values :
    // --------------------------------------------------------------------------------
    function privAddFileList($p_filedescr_list, &$p_result_list, &$p_options)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privAddFile()
    // Description :
    // Parameters :
    // Return Values :
    // --------------------------------------------------------------------------------
    function privAddFile($p_filedescr, &$p_header, &$p_options)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privAddFileUsingTempFile()
    // Description :
    // Parameters :
    // Return Values :
    // --------------------------------------------------------------------------------
    function privAddFileUsingTempFile($p_filedescr, &$p_header, &$p_options)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privCalculateStoredFilename()
    // Description :
    //   Based on file descriptor properties and global options, this method
    //   calculate the filename that will be stored in the archive.
    // Parameters :
    // Return Values :
    // --------------------------------------------------------------------------------
    function privCalculateStoredFilename(&$p_filedescr, &$p_options)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privWriteFileHeader()
    // Description :
    // Parameters :
    // Return Values :
    // --------------------------------------------------------------------------------
    function privWriteFileHeader(&$p_header)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privWriteCentralFileHeader()
    // Description :
    // Parameters :
    // Return Values :
    // --------------------------------------------------------------------------------
    function privWriteCentralFileHeader(&$p_header)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privWriteCentralHeader()
    // Description :
    // Parameters :
    // Return Values :
    // --------------------------------------------------------------------------------
    function privWriteCentralHeader($p_nb_entries, $p_size, $p_offset, $p_comment)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privList()
    // Description :
    // Parameters :
    // Return Values :
    // --------------------------------------------------------------------------------
    function privList(&$p_list)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privConvertHeader2FileInfo()
    // Description :
    //   This function takes the file informations from the central directory
    //   entries and extract the interesting parameters that will be given back.
    //   The resulting file infos are set in the array $p_info
    //     $p_info['filename'] : Filename with full path. Given by user (add),
    //                           extracted in the filesystem (extract).
    //     $p_info['stored_filename'] : Stored filename in the archive.
    //     $p_info['size'] = Size of the file.
    //     $p_info['compressed_size'] = Compressed size of the file.
    //     $p_info['mtime'] = Last modification date of the file.
    //     $p_info['comment'] = Comment associated with the file.
    //     $p_info['folder'] = true/false : indicates if the entry is a folder or not.
    //     $p_info['status'] = status of the action on the file.
    //     $p_info['crc'] = CRC of the file content.
    // Parameters :
    // Return Values :
    // --------------------------------------------------------------------------------
    function privConvertHeader2FileInfo($p_header, &$p_info)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privExtractByRule()
    // Description :
    //   Extract a file or directory depending of rules (by index, by name, ...)
    // Parameters :
    //   $p_file_list : An array where will be placed the properties of each
    //                  extracted file
    //   $p_path : Path to add while writing the extracted files
    //   $p_remove_path : Path to remove (from the file memorized path) while writing the
    //                    extracted files. If the path does not match the file path,
    //                    the file is extracted with its memorized path.
    //                    $p_remove_path does not apply to 'list' mode.
    //                    $p_path and $p_remove_path are commulative.
    // Return Values :
    //   1 on success,0 or less on error (see error code list)
    // --------------------------------------------------------------------------------
    function privExtractByRule(&$p_file_list, $p_path, $p_remove_path, $p_remove_all_path, &$p_options)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privExtractFile()
    // Description :
    // Parameters :
    // Return Values :
    //
    // 1 : ... ?
    // PCLZIP_ERR_USER_ABORTED(2) : User ask for extraction stop in callback
    // --------------------------------------------------------------------------------
    function privExtractFile(&$p_entry, $p_path, $p_remove_path, $p_remove_all_path, &$p_options)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privExtractFileUsingTempFile()
    // Description :
    // Parameters :
    // Return Values :
    // --------------------------------------------------------------------------------
    function privExtractFileUsingTempFile(&$p_entry, &$p_options)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privExtractFileInOutput()
    // Description :
    // Parameters :
    // Return Values :
    // --------------------------------------------------------------------------------
    function privExtractFileInOutput(&$p_entry, &$p_options)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privExtractFileAsString()
    // Description :
    // Parameters :
    // Return Values :
    // --------------------------------------------------------------------------------
    function privExtractFileAsString(&$p_entry, &$p_string, &$p_options)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privReadFileHeader()
    // Description :
    // Parameters :
    // Return Values :
    // --------------------------------------------------------------------------------
    function privReadFileHeader(&$p_header)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privReadCentralFileHeader()
    // Description :
    // Parameters :
    // Return Values :
    // --------------------------------------------------------------------------------
    function privReadCentralFileHeader(&$p_header)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privCheckFileHeaders()
    // Description :
    // Parameters :
    // Return Values :
    //   1 on success,
    //   0 on error;
    // --------------------------------------------------------------------------------
    function privCheckFileHeaders(&$p_local_header, &$p_central_header)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privReadEndCentralDir()
    // Description :
    // Parameters :
    // Return Values :
    // --------------------------------------------------------------------------------
    function privReadEndCentralDir(&$p_central_dir)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privDeleteByRule()
    // Description :
    // Parameters :
    // Return Values :
    // --------------------------------------------------------------------------------
    function privDeleteByRule(&$p_result_list, &$p_options)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privDirCheck()
    // Description :
    //   Check if a directory exists, if not it creates it and all the parents directory
    //   which may be useful.
    // Parameters :
    //   $p_dir : Directory path to check.
    // Return Values :
    //    1 : OK
    //   -1 : Unable to create directory
    // --------------------------------------------------------------------------------
    function privDirCheck($p_dir, $p_is_dir = \false)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privMerge()
    // Description :
    //   If $p_archive_to_add does not exist, the function exit with a success result.
    // Parameters :
    // Return Values :
    // --------------------------------------------------------------------------------
    function privMerge(&$p_archive_to_add)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privDuplicate()
    // Description :
    // Parameters :
    // Return Values :
    // --------------------------------------------------------------------------------
    function privDuplicate($p_archive_filename)
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privErrorLog()
    // Description :
    // Parameters :
    // --------------------------------------------------------------------------------
    function privErrorLog($p_error_code = 0, $p_error_string = '')
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privErrorReset()
    // Description :
    // Parameters :
    // --------------------------------------------------------------------------------
    function privErrorReset()
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privDisableMagicQuotes()
    // Description :
    // Parameters :
    // Return Values :
    // --------------------------------------------------------------------------------
    function privDisableMagicQuotes()
    {
    }
    // --------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------
    // Function : privSwapBackMagicQuotes()
    // Description :
    // Parameters :
    // Return Values :
    // --------------------------------------------------------------------------------
    function privSwapBackMagicQuotes()
    {
    }
}
/**
 * Upgrader API: Plugin_Installer_Skin class
 *
 * @package WordPress
 * @subpackage Upgrader
 * @since 4.6.0
 */
/**
 * Plugin Installer Skin for WordPress Plugin Installer.
 *
 * @since 2.8.0
 * @since 4.6.0 Moved to its own file from wp-admin/includes/class-wp-upgrader-skins.php.
 *
 * @see WP_Upgrader_Skin
 */
class Plugin_Installer_Skin extends \WP_Upgrader_Skin
{
    public $api;
    public $type;
    /**
     *
     * @param array $args
     */
    public function __construct($args = array())
    {
    }
    /**
     */
    public function before()
    {
    }
    /**
     */
    public function after()
    {
    }
}
/**
 * Upgrader API: Plugin_Upgrader_Skin class
 *
 * @package WordPress
 * @subpackage Upgrader
 * @since 4.6.0
 */
/**
 * Plugin Upgrader Skin for WordPress Plugin Upgrades.
 *
 * @since 2.8.0
 * @since 4.6.0 Moved to its own file from wp-admin/includes/class-wp-upgrader-skins.php.
 *
 * @see WP_Upgrader_Skin
 */
class Plugin_Upgrader_Skin extends \WP_Upgrader_Skin
{
    public $plugin = '';
    public $plugin_active = \false;
    public $plugin_network_active = \false;
    /**
     *
     * @param array $args
     */
    public function __construct($args = array())
    {
    }
    /**
     */
    public function after()
    {
    }
}
/**
 * Upgrade API: Plugin_Upgrader class
 *
 * @package WordPress
 * @subpackage Upgrader
 * @since 4.6.0
 */
/**
 * Core class used for upgrading/installing plugins.
 *
 * It is designed to upgrade/install plugins from a local zip, remote zip URL,
 * or uploaded zip file.
 *
 * @since 2.8.0
 * @since 4.6.0 Moved to its own file from wp-admin/includes/class-wp-upgrader.php.
 *
 * @see WP_Upgrader
 */
class Plugin_Upgrader extends \WP_Upgrader
{
    /**
     * Plugin upgrade result.
     *
     * @since 2.8.0
     * @var array|WP_Error $result
     *
     * @see WP_Upgrader::$result
     */
    public $result;
    /**
     * Whether a bulk upgrade/installation is being performed.
     *
     * @since 2.9.0
     * @var bool $bulk
     */
    public $bulk = \false;
    /**
     * Initialize the upgrade strings.
     *
     * @since 2.8.0
     */
    public function upgrade_strings()
    {
    }
    /**
     * Initialize the installation strings.
     *
     * @since 2.8.0
     */
    public function install_strings()
    {
    }
    /**
     * Install a plugin package.
     *
     * @since 2.8.0
     * @since 3.7.0 The `$args` parameter was added, making clearing the plugin update cache optional.
     *
     * @param string $package The full local path or URI of the package.
     * @param array  $args {
     *     Optional. Other arguments for installing a plugin package. Default empty array.
     *
     *     @type bool $clear_update_cache Whether to clear the plugin updates cache if successful.
     *                                    Default true.
     * }
     * @return bool|WP_Error True if the installation was successful, false or a WP_Error otherwise.
     */
    public function install($package, $args = array())
    {
    }
    /**
     * Upgrade a plugin.
     *
     * @since 2.8.0
     * @since 3.7.0 The `$args` parameter was added, making clearing the plugin update cache optional.
     *
     * @param string $plugin The basename path to the main plugin file.
     * @param array  $args {
     *     Optional. Other arguments for upgrading a plugin package. Default empty array.
     *
     *     @type bool $clear_update_cache Whether to clear the plugin updates cache if successful.
     *                                    Default true.
     * }
     * @return bool|WP_Error True if the upgrade was successful, false or a WP_Error object otherwise.
     */
    public function upgrade($plugin, $args = array())
    {
    }
    /**
     * Bulk upgrade several plugins at once.
     *
     * @since 2.8.0
     * @since 3.7.0 The `$args` parameter was added, making clearing the plugin update cache optional.
     *
     * @param array $plugins Array of the basename paths of the plugins' main files.
     * @param array $args {
     *     Optional. Other arguments for upgrading several plugins at once. Default empty array.
     *
     *     @type bool $clear_update_cache Whether to clear the plugin updates cache if successful.
     *                                    Default true.
     * }
     * @return array|false An array of results indexed by plugin file, or false if unable to connect to the filesystem.
     */
    public function bulk_upgrade($plugins, $args = array())
    {
    }
    /**
     * Check a source package to be sure it contains a plugin.
     *
     * This function is added to the {@see 'upgrader_source_selection'} filter by
     * Plugin_Upgrader::install().
     *
     * @since 3.3.0
     *
     * @global WP_Filesystem_Base $wp_filesystem Subclass
     *
     * @param string $source The path to the downloaded package source.
     * @return string|WP_Error The source as passed, or a WP_Error object
     *                         if no plugins were found.
     */
    public function check_package($source)
    {
    }
    /**
     * Retrieve the path to the file that contains the plugin info.
     *
     * This isn't used internally in the class, but is called by the skins.
     *
     * @since 2.8.0
     *
     * @return string|false The full path to the main plugin file, or false.
     */
    public function plugin_info()
    {
    }
    /**
     * Deactivates a plugin before it is upgraded.
     *
     * Hooked to the {@see 'upgrader_pre_install'} filter by Plugin_Upgrader::upgrade().
     *
     * @since 2.8.0
     * @since 4.1.0 Added a return value.
     *
     * @param bool|WP_Error  $return Upgrade offer return.
     * @param array          $plugin Plugin package arguments.
     * @return bool|WP_Error The passed in $return param or WP_Error.
     */
    public function deactivate_plugin_before_upgrade($return, $plugin)
    {
    }
    /**
     * Delete the old plugin during an upgrade.
     *
     * Hooked to the {@see 'upgrader_clear_destination'} filter by
     * Plugin_Upgrader::upgrade() and Plugin_Upgrader::bulk_upgrade().
     *
     * @since 2.8.0
     *
     * @global WP_Filesystem_Base $wp_filesystem Subclass
     *
     * @param bool|WP_Error $removed
     * @param string        $local_destination
     * @param string        $remote_destination
     * @param array         $plugin
     * @return WP_Error|bool
     */
    public function delete_old_plugin($removed, $local_destination, $remote_destination, $plugin)
    {
    }
}
/**
 * Upgrader API: Theme_Installer_Skin class
 *
 * @package WordPress
 * @subpackage Upgrader
 * @since 4.6.0
 */
/**
 * Theme Installer Skin for the WordPress Theme Installer.
 *
 * @since 2.8.0
 * @since 4.6.0 Moved to its own file from wp-admin/includes/class-wp-upgrader-skins.php.
 *
 * @see WP_Upgrader_Skin
 */
class Theme_Installer_Skin extends \WP_Upgrader_Skin
{
    public $api;
    public $type;
    /**
     *
     * @param array $args
     */
    public function __construct($args = array())
    {
    }
    /**
     */
    public function before()
    {
    }
    /**
     */
    public function after()
    {
    }
}
/**
 * Upgrader API: Theme_Upgrader_Skin class
 *
 * @package WordPress
 * @subpackage Upgrader
 * @since 4.6.0
 */
/**
 * Theme Upgrader Skin for WordPress Theme Upgrades.
 *
 * @since 2.8.0
 * @since 4.6.0 Moved to its own file from wp-admin/includes/class-wp-upgrader-skins.php.
 *
 * @see WP_Upgrader_Skin
 */
class Theme_Upgrader_Skin extends \WP_Upgrader_Skin
{
    public $theme = '';
    /**
     *
     * @param array $args
     */
    public function __construct($args = array())
    {
    }
    /**
     */
    public function after()
    {
    }
}
/**
 * Upgrade API: Theme_Upgrader class
 *
 * @package WordPress
 * @subpackage Upgrader
 * @since 4.6.0
 */
/**
 * Core class used for upgrading/installing themes.
 *
 * It is designed to upgrade/install themes from a local zip, remote zip URL,
 * or uploaded zip file.
 *
 * @since 2.8.0
 * @since 4.6.0 Moved to its own file from wp-admin/includes/class-wp-upgrader.php.
 *
 * @see WP_Upgrader
 */
class Theme_Upgrader extends \WP_Upgrader
{
    /**
     * Result of the theme upgrade offer.
     *
     * @since 2.8.0
     * @var array|WP_Error $result
     * @see WP_Upgrader::$result
     */
    public $result;
    /**
     * Whether multiple themes are being upgraded/installed in bulk.
     *
     * @since 2.9.0
     * @var bool $bulk
     */
    public $bulk = \false;
    /**
     * Initialize the upgrade strings.
     *
     * @since 2.8.0
     */
    public function upgrade_strings()
    {
    }
    /**
     * Initialize the installation strings.
     *
     * @since 2.8.0
     */
    public function install_strings()
    {
    }
    /**
     * Check if a child theme is being installed and we need to install its parent.
     *
     * Hooked to the {@see 'upgrader_post_install'} filter by Theme_Upgrader::install().
     *
     * @since 3.4.0
     *
     * @param bool  $install_result
     * @param array $hook_extra
     * @param array $child_result
     * @return type
     */
    public function check_parent_theme_filter($install_result, $hook_extra, $child_result)
    {
    }
    /**
     * Don't display the activate and preview actions to the user.
     *
     * Hooked to the {@see 'install_theme_complete_actions'} filter by
     * Theme_Upgrader::check_parent_theme_filter() when installing
     * a child theme and installing the parent theme fails.
     *
     * @since 3.4.0
     *
     * @param array $actions Preview actions.
     * @return array
     */
    public function hide_activate_preview_actions($actions)
    {
    }
    /**
     * Install a theme package.
     *
     * @since 2.8.0
     * @since 3.7.0 The `$args` parameter was added, making clearing the update cache optional.
     *
     * @param string $package The full local path or URI of the package.
     * @param array  $args {
     *     Optional. Other arguments for installing a theme package. Default empty array.
     *
     *     @type bool $clear_update_cache Whether to clear the updates cache if successful.
     *                                    Default true.
     * }
     *
     * @return bool|WP_Error True if the installation was successful, false or a WP_Error object otherwise.
     */
    public function install($package, $args = array())
    {
    }
    /**
     * Upgrade a theme.
     *
     * @since 2.8.0
     * @since 3.7.0 The `$args` parameter was added, making clearing the update cache optional.
     *
     * @param string $theme The theme slug.
     * @param array  $args {
     *     Optional. Other arguments for upgrading a theme. Default empty array.
     *
     *     @type bool $clear_update_cache Whether to clear the update cache if successful.
     *                                    Default true.
     * }
     * @return bool|WP_Error True if the upgrade was successful, false or a WP_Error object otherwise.
     */
    public function upgrade($theme, $args = array())
    {
    }
    /**
     * Upgrade several themes at once.
     *
     * @since 3.0.0
     * @since 3.7.0 The `$args` parameter was added, making clearing the update cache optional.
     *
     * @param array $themes The theme slugs.
     * @param array $args {
     *     Optional. Other arguments for upgrading several themes at once. Default empty array.
     *
     *     @type bool $clear_update_cache Whether to clear the update cache if successful.
     *                                    Default true.
     * }
     * @return array[]|false An array of results, or false if unable to connect to the filesystem.
     */
    public function bulk_upgrade($themes, $args = array())
    {
    }
    /**
     * Check that the package source contains a valid theme.
     *
     * Hooked to the {@see 'upgrader_source_selection'} filter by Theme_Upgrader::install().
     * It will return an error if the theme doesn't have style.css or index.php
     * files.
     *
     * @since 3.3.0
     *
     * @global WP_Filesystem_Base $wp_filesystem Subclass
     *
     * @param string $source The full path to the package source.
     * @return string|WP_Error The source or a WP_Error.
     */
    public function check_package($source)
    {
    }
    /**
     * Turn on maintenance mode before attempting to upgrade the current theme.
     *
     * Hooked to the {@see 'upgrader_pre_install'} filter by Theme_Upgrader::upgrade() and
     * Theme_Upgrader::bulk_upgrade().
     *
     * @since 2.8.0
     *
     * @param bool|WP_Error  $return
     * @param array          $theme
     * @return bool|WP_Error
     */
    public function current_before($return, $theme)
    {
    }
    /**
     * Turn off maintenance mode after upgrading the current theme.
     *
     * Hooked to the {@see 'upgrader_post_install'} filter by Theme_Upgrader::upgrade()
     * and Theme_Upgrader::bulk_upgrade().
     *
     * @since 2.8.0
     *
     * @param bool|WP_Error  $return
     * @param array          $theme
     * @return bool|WP_Error
     */
    public function current_after($return, $theme)
    {
    }
    /**
     * Delete the old theme during an upgrade.
     *
     * Hooked to the {@see 'upgrader_clear_destination'} filter by Theme_Upgrader::upgrade()
     * and Theme_Upgrader::bulk_upgrade().
     *
     * @since 2.8.0
     *
     * @global WP_Filesystem_Base $wp_filesystem Subclass
     *
     * @param bool   $removed
     * @param string $local_destination
     * @param string $remote_destination
     * @param array  $theme
     * @return bool
     */
    public function delete_old_theme($removed, $local_destination, $remote_destination, $theme)
    {
    }
    /**
     * Get the WP_Theme object for a theme.
     *
     * @since 2.8.0
     * @since 3.0.0 The `$theme` argument was added.
     *
     * @param string $theme The directory name of the theme. This is optional, and if not supplied,
     *                      the directory name from the last result will be used.
     * @return WP_Theme|false The theme's info object, or false `$theme` is not supplied
     *                        and the last result isn't set.
     */
    public function theme_info($theme = \null)
    {
    }
}
/**
 * A class for displaying various tree-like structures.
 *
 * Extend the Walker class to use it, see examples below. Child classes
 * do not need to implement all of the abstract methods in the class. The child
 * only needs to implement the methods that are needed.
 *
 * @since 2.1.0
 *
 * @package WordPress
 * @abstract
 */
class Walker
{
    /**
     * What the class handles.
     *
     * @since 2.1.0
     * @var string
     */
    public $tree_type;
    /**
     * DB fields to use.
     *
     * @since 2.1.0
     * @var array
     */
    public $db_fields;
    /**
     * Max number of pages walked by the paged walker
     *
     * @since 2.7.0
     * @var int
     */
    public $max_pages = 1;
    /**
     * Whether the current element has children or not.
     *
     * To be used in start_el().
     *
     * @since 4.0.0
     * @var bool
     */
    public $has_children;
    /**
     * Starts the list before the elements are added.
     *
     * The $args parameter holds additional values that may be used with the child
     * class methods. This method is called at the start of the output list.
     *
     * @since 2.1.0
     * @abstract
     *
     * @param string $output Used to append additional content (passed by reference).
     * @param int    $depth  Depth of the item.
     * @param array  $args   An array of additional arguments.
     */
    public function start_lvl(&$output, $depth = 0, $args = array())
    {
    }
    /**
     * Ends the list of after the elements are added.
     *
     * The $args parameter holds additional values that may be used with the child
     * class methods. This method finishes the list at the end of output of the elements.
     *
     * @since 2.1.0
     * @abstract
     *
     * @param string $output Used to append additional content (passed by reference).
     * @param int    $depth  Depth of the item.
     * @param array  $args   An array of additional arguments.
     */
    public function end_lvl(&$output, $depth = 0, $args = array())
    {
    }
    /**
     * Start the element output.
     *
     * The $args parameter holds additional values that may be used with the child
     * class methods. Includes the element output also.
     *
     * @since 2.1.0
     * @abstract
     *
     * @param string $output            Used to append additional content (passed by reference).
     * @param object $object            The data object.
     * @param int    $depth             Depth of the item.
     * @param array  $args              An array of additional arguments.
     * @param int    $current_object_id ID of the current item.
     */
    public function start_el(&$output, $object, $depth = 0, $args = array(), $current_object_id = 0)
    {
    }
    /**
     * Ends the element output, if needed.
     *
     * The $args parameter holds additional values that may be used with the child class methods.
     *
     * @since 2.1.0
     * @abstract
     *
     * @param string $output Used to append additional content (passed by reference).
     * @param object $object The data object.
     * @param int    $depth  Depth of the item.
     * @param array  $args   An array of additional arguments.
     */
    public function end_el(&$output, $object, $depth = 0, $args = array())
    {
    }
    /**
     * Traverse elements to create list from elements.
     *
     * Display one element if the element doesn't have any children otherwise,
     * display the element and its children. Will only traverse up to the max
     * depth and no ignore elements under that depth. It is possible to set the
     * max depth to include all depths, see walk() method.
     *
     * This method should not be called directly, use the walk() method instead.
     *
     * @since 2.5.0
     *
     * @param object $element           Data object.
     * @param array  $children_elements List of elements to continue traversing (passed by reference).
     * @param int    $max_depth         Max depth to traverse.
     * @param int    $depth             Depth of current element.
     * @param array  $args              An array of arguments.
     * @param string $output            Used to append additional content (passed by reference).
     */
    public function display_element($element, &$children_elements, $max_depth, $depth, $args, &$output)
    {
    }
    /**
     * Display array of elements hierarchically.
     *
     * Does not assume any existing order of elements.
     *
     * $max_depth = -1 means flatly display every element.
     * $max_depth = 0 means display all levels.
     * $max_depth > 0 specifies the number of display levels.
     *
     * @since 2.1.0
     *
     * @param array $elements  An array of elements.
     * @param int   $max_depth The maximum hierarchical depth.
     * @return string The hierarchical item output.
     */
    public function walk($elements, $max_depth)
    {
    }
    /**
     * paged_walk() - produce a page of nested elements
     *
     * Given an array of hierarchical elements, the maximum depth, a specific page number,
     * and number of elements per page, this function first determines all top level root elements
     * belonging to that page, then lists them and all of their children in hierarchical order.
     *
     * $max_depth = 0 means display all levels.
     * $max_depth > 0 specifies the number of display levels.
     *
     * @since 2.7.0
     *
     * @param array $elements
     * @param int   $max_depth The maximum hierarchical depth.
     * @param int   $page_num The specific page number, beginning with 1.
     * @param int   $per_page
     * @return string XHTML of the specified page of elements
     */
    public function paged_walk($elements, $max_depth, $page_num, $per_page)
    {
    }
    /**
     * Calculates the total number of root elements.
     *
     * @since 2.7.0
     *
     * @param array $elements Elements to list.
     * @return int Number of root elements.
     */
    public function get_number_of_root_elements($elements)
    {
    }
    /**
     * Unset all the children for a given top level element.
     *
     * @since 2.7.0
     *
     * @param object $e
     * @param array $children_elements
     */
    public function unset_children($e, &$children_elements)
    {
    }
}
/**
 * Taxonomy API: Walker_Category_Checklist class
 *
 * @package WordPress
 * @subpackage Administration
 * @since 4.4.0
 */
/**
 * Core walker class to output an unordered list of category checkbox input elements.
 *
 * @since 2.5.1
 *
 * @see Walker
 * @see wp_category_checklist()
 * @see wp_terms_checklist()
 */
class Walker_Category_Checklist extends \Walker
{
    public $tree_type = 'category';
    public $db_fields = array('parent' => 'parent', 'id' => 'term_id');
    //TODO: decouple this
    /**
     * Starts the list before the elements are added.
     *
     * @see Walker:start_lvl()
     *
     * @since 2.5.1
     *
     * @param string $output Used to append additional content (passed by reference).
     * @param int    $depth  Depth of category. Used for tab indentation.
     * @param array  $args   An array of arguments. @see wp_terms_checklist()
     */
    public function start_lvl(&$output, $depth = 0, $args = array())
    {
    }
    /**
     * Ends the list of after the elements are added.
     *
     * @see Walker::end_lvl()
     *
     * @since 2.5.1
     *
     * @param string $output Used to append additional content (passed by reference).
     * @param int    $depth  Depth of category. Used for tab indentation.
     * @param array  $args   An array of arguments. @see wp_terms_checklist()
     */
    public function end_lvl(&$output, $depth = 0, $args = array())
    {
    }
    /**
     * Start the element output.
     *
     * @see Walker::start_el()
     *
     * @since 2.5.1
     *
     * @param string $output   Used to append additional content (passed by reference).
     * @param object $category The current term object.
     * @param int    $depth    Depth of the term in reference to parents. Default 0.
     * @param array  $args     An array of arguments. @see wp_terms_checklist()
     * @param int    $id       ID of the current term.
     */
    public function start_el(&$output, $category, $depth = 0, $args = array(), $id = 0)
    {
    }
    /**
     * Ends the element output, if needed.
     *
     * @see Walker::end_el()
     *
     * @since 2.5.1
     *
     * @param string $output   Used to append additional content (passed by reference).
     * @param object $category The current term object.
     * @param int    $depth    Depth of the term in reference to parents. Default 0.
     * @param array  $args     An array of arguments. @see wp_terms_checklist()
     */
    public function end_el(&$output, $category, $depth = 0, $args = array())
    {
    }
}
/**
 * Nav Menu API: Walker_Nav_Menu class
 *
 * @package WordPress
 * @subpackage Nav_Menus
 * @since 4.6.0
 */
/**
 * Core class used to implement an HTML list of nav menu items.
 *
 * @since 3.0.0
 *
 * @see Walker
 */
class Walker_Nav_Menu extends \Walker
{
    /**
     * What the class handles.
     *
     * @since 3.0.0
     * @var string
     *
     * @see Walker::$tree_type
     */
    public $tree_type = array('post_type', 'taxonomy', 'custom');
    /**
     * Database fields to use.
     *
     * @since 3.0.0
     * @todo Decouple this.
     * @var array
     *
     * @see Walker::$db_fields
     */
    public $db_fields = array('parent' => 'menu_item_parent', 'id' => 'db_id');
    /**
     * Starts the list before the elements are added.
     *
     * @since 3.0.0
     *
     * @see Walker::start_lvl()
     *
     * @param string   $output Used to append additional content (passed by reference).
     * @param int      $depth  Depth of menu item. Used for padding.
     * @param stdClass $args   An object of wp_nav_menu() arguments.
     */
    public function start_lvl(&$output, $depth = 0, $args = array())
    {
    }
    /**
     * Ends the list of after the elements are added.
     *
     * @since 3.0.0
     *
     * @see Walker::end_lvl()
     *
     * @param string   $output Used to append additional content (passed by reference).
     * @param int      $depth  Depth of menu item. Used for padding.
     * @param stdClass $args   An object of wp_nav_menu() arguments.
     */
    public function end_lvl(&$output, $depth = 0, $args = array())
    {
    }
    /**
     * Starts the element output.
     *
     * @since 3.0.0
     * @since 4.4.0 The {@see 'nav_menu_item_args'} filter was added.
     *
     * @see Walker::start_el()
     *
     * @param string   $output Used to append additional content (passed by reference).
     * @param WP_Post  $item   Menu item data object.
     * @param int      $depth  Depth of menu item. Used for padding.
     * @param stdClass $args   An object of wp_nav_menu() arguments.
     * @param int      $id     Current item ID.
     */
    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
    }
    /**
     * Ends the element output, if needed.
     *
     * @since 3.0.0
     *
     * @see Walker::end_el()
     *
     * @param string   $output Used to append additional content (passed by reference).
     * @param WP_Post  $item   Page data object. Not used.
     * @param int      $depth  Depth of page. Not Used.
     * @param stdClass $args   An object of wp_nav_menu() arguments.
     */
    public function end_el(&$output, $item, $depth = 0, $args = array())
    {
    }
}
/**
 * Navigation Menu API: Walker_Nav_Menu_Checklist class
 *
 * @package WordPress
 * @subpackage Administration
 * @since 4.4.0
 */
/**
 * Create HTML list of nav menu input items.
 *
 * @since 3.0.0
 * @uses Walker_Nav_Menu
 */
class Walker_Nav_Menu_Checklist extends \Walker_Nav_Menu
{
    /**
     *
     * @param array $fields
     */
    public function __construct($fields = \false)
    {
    }
    /**
     * Starts the list before the elements are added.
     *
     * @see Walker_Nav_Menu::start_lvl()
     *
     * @since 3.0.0
     *
     * @param string $output Used to append additional content (passed by reference).
     * @param int    $depth  Depth of page. Used for padding.
     * @param array  $args   Not used.
     */
    public function start_lvl(&$output, $depth = 0, $args = array())
    {
    }
    /**
     * Ends the list of after the elements are added.
     *
     * @see Walker_Nav_Menu::end_lvl()
     *
     * @since 3.0.0
     *
     * @param string $output Used to append additional content (passed by reference).
     * @param int    $depth  Depth of page. Used for padding.
     * @param array  $args   Not used.
     */
    public function end_lvl(&$output, $depth = 0, $args = array())
    {
    }
    /**
     * Start the element output.
     *
     * @see Walker_Nav_Menu::start_el()
     *
     * @since 3.0.0
     *
     * @global int $_nav_menu_placeholder
     *
     * @param string $output Used to append additional content (passed by reference).
     * @param object $item   Menu item data object.
     * @param int    $depth  Depth of menu item. Used for padding.
     * @param array  $args   Not used.
     * @param int    $id     Not used.
     */
    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
    }
}
/**
 * Navigation Menu API: Walker_Nav_Menu_Edit class
 *
 * @package WordPress
 * @subpackage Administration
 * @since 4.4.0
 */
/**
 * Create HTML list of nav menu input items.
 *
 * @since 3.0.0
 *
 * @see Walker_Nav_Menu
 */
class Walker_Nav_Menu_Edit extends \Walker_Nav_Menu
{
    /**
     * Starts the list before the elements are added.
     *
     * @see Walker_Nav_Menu::start_lvl()
     *
     * @since 3.0.0
     *
     * @param string $output Passed by reference.
     * @param int    $depth  Depth of menu item. Used for padding.
     * @param array  $args   Not used.
     */
    public function start_lvl(&$output, $depth = 0, $args = array())
    {
    }
    /**
     * Ends the list of after the elements are added.
     *
     * @see Walker_Nav_Menu::end_lvl()
     *
     * @since 3.0.0
     *
     * @param string $output Passed by reference.
     * @param int    $depth  Depth of menu item. Used for padding.
     * @param array  $args   Not used.
     */
    public function end_lvl(&$output, $depth = 0, $args = array())
    {
    }
    /**
     * Start the element output.
     *
     * @see Walker_Nav_Menu::start_el()
     * @since 3.0.0
     *
     * @global int $_wp_nav_menu_max_depth
     *
     * @param string $output Used to append additional content (passed by reference).
     * @param object $item   Menu item data object.
     * @param int    $depth  Depth of menu item. Used for padding.
     * @param array  $args   Not used.
     * @param int    $id     Not used.
     */
    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
    }
}
/**
 * Upgrader API: WP_Ajax_Upgrader_Skin class
 *
 * @package WordPress
 * @subpackage Upgrader
 * @since 4.6.0
 */
/**
 * Upgrader Skin for Ajax WordPress upgrades.
 *
 * This skin is designed to be used for Ajax updates.
 *
 * @since 4.6.0
 *
 * @see Automatic_Upgrader_Skin
 */
class WP_Ajax_Upgrader_Skin extends \Automatic_Upgrader_Skin
{
    /**
     * Holds the WP_Error object.
     *
     * @since 4.6.0
     * @var null|WP_Error
     */
    protected $errors = \null;
    /**
     * Constructor.
     *
     * @since 4.6.0
     *
     * @param array $args Options for the upgrader, see WP_Upgrader_Skin::__construct().
     */
    public function __construct($args = array())
    {
    }
    /**
     * Retrieves the list of errors.
     *
     * @since 4.6.0
     *
     * @return WP_Error Errors during an upgrade.
     */
    public function get_errors()
    {
    }
    /**
     * Retrieves a string for error messages.
     *
     * @since 4.6.0
     *
     * @return string Error messages during an upgrade.
     */
    public function get_error_messages()
    {
    }
    /**
     * Stores a log entry for an error.
     *
     * @since 4.6.0
     *
     * @param string|WP_Error $errors Errors.
     */
    public function error($errors)
    {
    }
    /**
     * Stores a log entry.
     *
     * @since 4.6.0
     *
     * @param string|array|WP_Error $data Log entry data.
     */
    public function feedback($data)
    {
    }
}
/**
 * Upgrade API: WP_Automatic_Updater class
 *
 * @package WordPress
 * @subpackage Upgrader
 * @since 4.6.0
 */
/**
 * Core class used for handling automatic background updates.
 *
 * @since 3.7.0
 * @since 4.6.0 Moved to its own file from wp-admin/includes/class-wp-upgrader.php.
 */
class WP_Automatic_Updater
{
    /**
     * Tracks update results during processing.
     *
     * @var array
     */
    protected $update_results = array();
    /**
     * Whether the entire automatic updater is disabled.
     *
     * @since 3.7.0
     */
    public function is_disabled()
    {
    }
    /**
     * Check for version control checkouts.
     *
     * Checks for Subversion, Git, Mercurial, and Bazaar. It recursively looks up the
     * filesystem to the top of the drive, erring on the side of detecting a VCS
     * checkout somewhere.
     *
     * ABSPATH is always checked in addition to whatever $context is (which may be the
     * wp-content directory, for example). The underlying assumption is that if you are
     * using version control *anywhere*, then you should be making decisions for
     * how things get updated.
     *
     * @since 3.7.0
     *
     * @param string $context The filesystem path to check, in addition to ABSPATH.
     */
    public function is_vcs_checkout($context)
    {
    }
    /**
     * Tests to see if we can and should update a specific item.
     *
     * @since 3.7.0
     *
     * @global wpdb $wpdb WordPress database abstraction object.
     *
     * @param string $type    The type of update being checked: 'core', 'theme',
     *                        'plugin', 'translation'.
     * @param object $item    The update offer.
     * @param string $context The filesystem context (a path) against which filesystem
     *                        access and status should be checked.
     */
    public function should_update($type, $item, $context)
    {
    }
    /**
     * Notifies an administrator of a core update.
     *
     * @since 3.7.0
     *
     * @param object $item The update offer.
     */
    protected function send_core_update_notification_email($item)
    {
    }
    /**
     * Update an item, if appropriate.
     *
     * @since 3.7.0
     *
     * @param string $type The type of update being checked: 'core', 'theme', 'plugin', 'translation'.
     * @param object $item The update offer.
     *
     * @return null|WP_Error
     */
    public function update($type, $item)
    {
    }
    /**
     * Kicks off the background update process, looping through all pending updates.
     *
     * @since 3.7.0
     */
    public function run()
    {
    }
    /**
     * If we tried to perform a core update, check if we should send an email,
     * and if we need to avoid processing future updates.
     *
     * @since 3.7.0
     *
     * @param object $update_result The result of the core update. Includes the update offer and result.
     */
    protected function after_core_update($update_result)
    {
    }
    /**
     * Sends an email upon the completion or failure of a background core update.
     *
     * @since 3.7.0
     *
     * @param string $type        The type of email to send. Can be one of 'success', 'fail', 'manual', 'critical'.
     * @param object $core_update The update offer that was attempted.
     * @param mixed  $result      Optional. The result for the core update. Can be WP_Error.
     */
    protected function send_email($type, $core_update, $result = \null)
    {
    }
    /**
     * Prepares and sends an email of a full log of background update results, useful for debugging and geekery.
     *
     * @since 3.7.0
     */
    protected function send_debug_email()
    {
    }
}
/**
 * Administration API: WP_List_Table class
 *
 * @package WordPress
 * @subpackage List_Table
 * @since 3.1.0
 */
/**
 * Base class for displaying a list of items in an ajaxified HTML table.
 *
 * @since 3.1.0
 * @access private
 */
class WP_List_Table
{
    /**
     * The current list of items.
     *
     * @since 3.1.0
     * @var array
     */
    public $items;
    /**
     * Various information about the current table.
     *
     * @since 3.1.0
     * @var array
     */
    protected $_args;
    /**
     * Various information needed for displaying the pagination.
     *
     * @since 3.1.0
     * @var array
     */
    protected $_pagination_args = array();
    /**
     * The current screen.
     *
     * @since 3.1.0
     * @var object
     */
    protected $screen;
    /**
     * Cached bulk actions.
     *
     * @since 3.1.0
     * @var array
     */
    private $_actions;
    /**
     * Cached pagination output.
     *
     * @since 3.1.0
     * @var string
     */
    private $_pagination;
    /**
     * The view switcher modes.
     *
     * @since 4.1.0
     * @var array
     */
    protected $modes = array();
    /**
     * Stores the value returned by ->get_column_info().
     *
     * @since 4.1.0
     * @var array
     */
    protected $_column_headers;
    /**
     * {@internal Missing Summary}
     *
     * @var array
     */
    protected $compat_fields = array('_args', '_pagination_args', 'screen', '_actions', '_pagination');
    /**
     * {@internal Missing Summary}
     *
     * @var array
     */
    protected $compat_methods = array('set_pagination_args', 'get_views', 'get_bulk_actions', 'bulk_actions', 'row_actions', 'months_dropdown', 'view_switcher', 'comments_bubble', 'get_items_per_page', 'pagination', 'get_sortable_columns', 'get_column_info', 'get_table_classes', 'display_tablenav', 'extra_tablenav', 'single_row_columns');
    /**
     * Constructor.
     *
     * The child class should call this constructor from its own constructor to override
     * the default $args.
     *
     * @since 3.1.0
     *
     * @param array|string $args {
     *     Array or string of arguments.
     *
     *     @type string $plural   Plural value used for labels and the objects being listed.
     *                            This affects things such as CSS class-names and nonces used
     *                            in the list table, e.g. 'posts'. Default empty.
     *     @type string $singular Singular label for an object being listed, e.g. 'post'.
     *                            Default empty
     *     @type bool   $ajax     Whether the list table supports Ajax. This includes loading
     *                            and sorting data, for example. If true, the class will call
     *                            the _js_vars() method in the footer to provide variables
     *                            to any scripts handling Ajax events. Default false.
     *     @type string $screen   String containing the hook name used to determine the current
     *                            screen. If left null, the current screen will be automatically set.
     *                            Default null.
     * }
     */
    public function __construct($args = array())
    {
    }
    /**
     * Make private properties readable for backward compatibility.
     *
     * @since 4.0.0
     *
     * @param string $name Property to get.
     * @return mixed Property.
     */
    public function __get($name)
    {
    }
    /**
     * Make private properties settable for backward compatibility.
     *
     * @since 4.0.0
     *
     * @param string $name  Property to check if set.
     * @param mixed  $value Property value.
     * @return mixed Newly-set property.
     */
    public function __set($name, $value)
    {
    }
    /**
     * Make private properties checkable for backward compatibility.
     *
     * @since 4.0.0
     *
     * @param string $name Property to check if set.
     * @return bool Whether the property is set.
     */
    public function __isset($name)
    {
    }
    /**
     * Make private properties un-settable for backward compatibility.
     *
     * @since 4.0.0
     *
     * @param string $name Property to unset.
     */
    public function __unset($name)
    {
    }
    /**
     * Make private/protected methods readable for backward compatibility.
     *
     * @since 4.0.0
     *
     * @param callable $name      Method to call.
     * @param array    $arguments Arguments to pass when calling.
     * @return mixed|bool Return value of the callback, false otherwise.
     */
    public function __call($name, $arguments)
    {
    }
    /**
     * Checks the current user's permissions
     *
     * @since 3.1.0
     * @abstract
     */
    public function ajax_user_can()
    {
    }
    /**
     * Prepares the list of items for displaying.
     * @uses WP_List_Table::set_pagination_args()
     *
     * @since 3.1.0
     * @abstract
     */
    public function prepare_items()
    {
    }
    /**
     * An internal method that sets all the necessary pagination arguments
     *
     * @since 3.1.0
     *
     * @param array|string $args Array or string of arguments with information about the pagination.
     */
    protected function set_pagination_args($args)
    {
    }
    /**
     * Access the pagination args.
     *
     * @since 3.1.0
     *
     * @param string $key Pagination argument to retrieve. Common values include 'total_items',
     *                    'total_pages', 'per_page', or 'infinite_scroll'.
     * @return int Number of items that correspond to the given pagination argument.
     */
    public function get_pagination_arg($key)
    {
    }
    /**
     * Whether the table has items to display or not
     *
     * @since 3.1.0
     *
     * @return bool
     */
    public function has_items()
    {
    }
    /**
     * Message to be displayed when there are no items
     *
     * @since 3.1.0
     */
    public function no_items()
    {
    }
    /**
     * Displays the search box.
     *
     * @since 3.1.0
     *
     * @param string $text     The 'submit' button label.
     * @param string $input_id ID attribute value for the search input field.
     */
    public function search_box($text, $input_id)
    {
    }
    /**
     * Get an associative array ( id => link ) with the list
     * of views available on this table.
     *
     * @since 3.1.0
     *
     * @return array
     */
    protected function get_views()
    {
    }
    /**
     * Display the list of views available on this table.
     *
     * @since 3.1.0
     */
    public function views()
    {
    }
    /**
     * Get an associative array ( option_name => option_title ) with the list
     * of bulk actions available on this table.
     *
     * @since 3.1.0
     *
     * @return array
     */
    protected function get_bulk_actions()
    {
    }
    /**
     * Display the bulk actions dropdown.
     *
     * @since 3.1.0
     *
     * @param string $which The location of the bulk actions: 'top' or 'bottom'.
     *                      This is designated as optional for backward compatibility.
     */
    protected function bulk_actions($which = '')
    {
    }
    /**
     * Get the current action selected from the bulk actions dropdown.
     *
     * @since 3.1.0
     *
     * @return string|false The action name or False if no action was selected
     */
    public function current_action()
    {
    }
    /**
     * Generate row actions div
     *
     * @since 3.1.0
     *
     * @param array $actions The list of actions
     * @param bool $always_visible Whether the actions should be always visible
     * @return string
     */
    protected function row_actions($actions, $always_visible = \false)
    {
    }
    /**
     * Display a monthly dropdown for filtering items
     *
     * @since 3.1.0
     *
     * @global wpdb      $wpdb
     * @global WP_Locale $wp_locale
     *
     * @param string $post_type
     */
    protected function months_dropdown($post_type)
    {
    }
    /**
     * Display a view switcher
     *
     * @since 3.1.0
     *
     * @param string $current_mode
     */
    protected function view_switcher($current_mode)
    {
    }
    /**
     * Display a comment count bubble
     *
     * @since 3.1.0
     *
     * @param int $post_id          The post ID.
     * @param int $pending_comments Number of pending comments.
     */
    protected function comments_bubble($post_id, $pending_comments)
    {
    }
    /**
     * Get the current page number
     *
     * @since 3.1.0
     *
     * @return int
     */
    public function get_pagenum()
    {
    }
    /**
     * Get number of items to display on a single page
     *
     * @since 3.1.0
     *
     * @param string $option
     * @param int    $default
     * @return int
     */
    protected function get_items_per_page($option, $default = 20)
    {
    }
    /**
     * Display the pagination.
     *
     * @since 3.1.0
     *
     * @param string $which
     */
    protected function pagination($which)
    {
    }
    /**
     * Get a list of columns. The format is:
     * 'internal-name' => 'Title'
     *
     * @since 3.1.0
     * @abstract
     *
     * @return array
     */
    public function get_columns()
    {
    }
    /**
     * Get a list of sortable columns. The format is:
     * 'internal-name' => 'orderby'
     * or
     * 'internal-name' => array( 'orderby', true )
     *
     * The second format will make the initial sorting order be descending
     *
     * @since 3.1.0
     *
     * @return array
     */
    protected function get_sortable_columns()
    {
    }
    /**
     * Gets the name of the default primary column.
     *
     * @since 4.3.0
     *
     * @return string Name of the default primary column, in this case, an empty string.
     */
    protected function get_default_primary_column_name()
    {
    }
    /**
     * Public wrapper for WP_List_Table::get_default_primary_column_name().
     *
     * @since 4.4.0
     *
     * @return string Name of the default primary column.
     */
    public function get_primary_column()
    {
    }
    /**
     * Gets the name of the primary column.
     *
     * @since 4.3.0
     *
     * @return string The name of the primary column.
     */
    protected function get_primary_column_name()
    {
    }
    /**
     * Get a list of all, hidden and sortable columns, with filter applied
     *
     * @since 3.1.0
     *
     * @return array
     */
    protected function get_column_info()
    {
    }
    /**
     * Return number of visible columns
     *
     * @since 3.1.0
     *
     * @return int
     */
    public function get_column_count()
    {
    }
    /**
     * Print column headers, accounting for hidden and sortable columns.
     *
     * @since 3.1.0
     *
     * @staticvar int $cb_counter
     *
     * @param bool $with_id Whether to set the id attribute or not
     */
    public function print_column_headers($with_id = \true)
    {
    }
    /**
     * Display the table
     *
     * @since 3.1.0
     */
    public function display()
    {
    }
    /**
     * Get a list of CSS classes for the WP_List_Table table tag.
     *
     * @since 3.1.0
     *
     * @return array List of CSS classes for the table tag.
     */
    protected function get_table_classes()
    {
    }
    /**
     * Generate the table navigation above or below the table
     *
     * @since 3.1.0
     * @param string $which
     */
    protected function display_tablenav($which)
    {
    }
    /**
     * Extra controls to be displayed between bulk actions and pagination
     *
     * @since 3.1.0
     *
     * @param string $which
     */
    protected function extra_tablenav($which)
    {
    }
    /**
     * Generate the tbody element for the list table.
     *
     * @since 3.1.0
     */
    public function display_rows_or_placeholder()
    {
    }
    /**
     * Generate the table rows
     *
     * @since 3.1.0
     */
    public function display_rows()
    {
    }
    /**
     * Generates content for a single row of the table
     *
     * @since 3.1.0
     *
     * @param object $item The current item
     */
    public function single_row($item)
    {
    }
    /**
     *
     * @param object $item
     * @param string $column_name
     */
    protected function column_default($item, $column_name)
    {
    }
    /**
     *
     * @param object $item
     */
    protected function column_cb($item)
    {
    }
    /**
     * Generates the columns for a single row of the table
     *
     * @since 3.1.0
     *
     * @param object $item The current item
     */
    protected function single_row_columns($item)
    {
    }
    /**
     * Generates and display row actions links for the list table.
     *
     * @since 4.3.0
     *
     * @param object $item        The item being acted upon.
     * @param string $column_name Current column name.
     * @param string $primary     Primary column name.
     * @return string The row actions HTML, or an empty string if the current column is the primary column.
     */
    protected function handle_row_actions($item, $column_name, $primary)
    {
    }
    /**
     * Handle an incoming ajax request (called from admin-ajax.php)
     *
     * @since 3.1.0
     */
    public function ajax_response()
    {
    }
    /**
     * Send required variables to JavaScript land
     *
     */
    public function _js_vars()
    {
    }
}
/**
 * List Table API: WP_Comments_List_Table class
 *
 * @package WordPress
 * @subpackage Administration
 * @since 3.1.0
 */
/**
 * Core class used to implement displaying comments in a list table.
 *
 * @since 3.1.0
 * @access private
 *
 * @see WP_List_Table
 */
class WP_Comments_List_Table extends \WP_List_Table
{
    public $checkbox = \true;
    public $pending_count = array();
    public $extra_items;
    private $user_can;
    /**
     * Constructor.
     *
     * @since 3.1.0
     *
     * @see WP_List_Table::__construct() for more information on default arguments.
     *
     * @global int $post_id
     *
     * @param array $args An associative array of arguments.
     */
    public function __construct($args = array())
    {
    }
    public function floated_admin_avatar($name, $comment_ID)
    {
    }
    /**
     * @return bool
     */
    public function ajax_user_can()
    {
    }
    /**
     *
     * @global int    $post_id
     * @global string $comment_status
     * @global string $search
     * @global string $comment_type
     */
    public function prepare_items()
    {
    }
    /**
     *
     * @param string $comment_status
     * @return int
     */
    public function get_per_page($comment_status = 'all')
    {
    }
    /**
     *
     * @global string $comment_status
     */
    public function no_items()
    {
    }
    /**
     *
     * @global int $post_id
     * @global string $comment_status
     * @global string $comment_type
     */
    protected function get_views()
    {
    }
    /**
     *
     * @global string $comment_status
     *
     * @return array
     */
    protected function get_bulk_actions()
    {
    }
    /**
     *
     * @global string $comment_status
     * @global string $comment_type
     *
     * @param string $which
     */
    protected function extra_tablenav($which)
    {
    }
    /**
     * @return string|false
     */
    public function current_action()
    {
    }
    /**
     *
     * @global int $post_id
     *
     * @return array
     */
    public function get_columns()
    {
    }
    /**
     *
     * @return array
     */
    protected function get_sortable_columns()
    {
    }
    /**
     * Get the name of the default primary column.
     *
     * @since 4.3.0
     *
     * @return string Name of the default primary column, in this case, 'comment'.
     */
    protected function get_default_primary_column_name()
    {
    }
    /**
     */
    public function display()
    {
    }
    /**
     * @global WP_Post    $post
     * @global WP_Comment $comment
     *
     * @param WP_Comment $item
     */
    public function single_row($item)
    {
    }
    /**
     * Generate and display row actions links.
     *
     * @since 4.3.0
     *
     * @global string $comment_status Status for the current listed comments.
     *
     * @param WP_Comment $comment     The comment object.
     * @param string     $column_name Current column name.
     * @param string     $primary     Primary column name.
     * @return string|void Comment row actions output.
     */
    protected function handle_row_actions($comment, $column_name, $primary)
    {
    }
    /**
     *
     * @param WP_Comment $comment The comment object.
     */
    public function column_cb($comment)
    {
    }
    /**
     * @param WP_Comment $comment The comment object.
     */
    public function column_comment($comment)
    {
    }
    /**
     *
     * @global string $comment_status
     *
     * @param WP_Comment $comment The comment object.
     */
    public function column_author($comment)
    {
    }
    /**
     *
     * @param WP_Comment $comment The comment object.
     */
    public function column_date($comment)
    {
    }
    /**
     *
     * @param WP_Comment $comment The comment object.
     */
    public function column_response($comment)
    {
    }
    /**
     *
     * @param WP_Comment $comment     The comment object.
     * @param string     $column_name The custom column's name.
     */
    public function column_default($comment, $column_name)
    {
    }
}
/**
 * Administration: Community Events class.
 *
 * @package WordPress
 * @subpackage Administration
 * @since 4.8.0
 */
/**
 * Class WP_Community_Events.
 *
 * A client for api.wordpress.org/events.
 *
 * @since 4.8.0
 */
class WP_Community_Events
{
    /**
     * ID for a WordPress user account.
     *
     * @since 4.8.0
     *
     * @var int
     */
    protected $user_id = 0;
    /**
     * Stores location data for the user.
     *
     * @since 4.8.0
     *
     * @var bool|array
     */
    protected $user_location = \false;
    /**
     * Constructor for WP_Community_Events.
     *
     * @since 4.8.0
     *
     * @param int        $user_id       WP user ID.
     * @param bool|array $user_location Stored location data for the user.
     *                                  false to pass no location;
     *                                  array to pass a location {
     *     @type string $description The name of the location
     *     @type string $latitude    The latitude in decimal degrees notation, without the degree
     *                               symbol. e.g.: 47.615200.
     *     @type string $longitude   The longitude in decimal degrees notation, without the degree
     *                               symbol. e.g.: -122.341100.
     *     @type string $country     The ISO 3166-1 alpha-2 country code. e.g.: BR
     * }
     */
    public function __construct($user_id, $user_location = \false)
    {
    }
    /**
     * Gets data about events near a particular location.
     *
     * Cached events will be immediately returned if the `user_location` property
     * is set for the current user, and cached events exist for that location.
     *
     * Otherwise, this method sends a request to the w.org Events API with location
     * data. The API will send back a recognized location based on the data, along
     * with nearby events.
     *
     * The browser's request for events is proxied with this method, rather
     * than having the browser make the request directly to api.wordpress.org,
     * because it allows results to be cached server-side and shared with other
     * users and sites in the network. This makes the process more efficient,
     * since increasing the number of visits that get cached data means users
     * don't have to wait as often; if the user's browser made the request
     * directly, it would also need to make a second request to WP in order to
     * pass the data for caching. Having WP make the request also introduces
     * the opportunity to anonymize the IP before sending it to w.org, which
     * mitigates possible privacy concerns.
     *
     * @since 4.8.0
     *
     * @param string $location_search Optional. City name to help determine the location.
     *                                e.g., "Seattle". Default empty string.
     * @param string $timezone        Optional. Timezone to help determine the location.
     *                                Default empty string.
     * @return array|WP_Error A WP_Error on failure; an array with location and events on
     *                        success.
     */
    public function get_events($location_search = '', $timezone = '')
    {
    }
    /**
     * Builds an array of args to use in an HTTP request to the w.org Events API.
     *
     * @since 4.8.0
     *
     * @param string $search   Optional. City search string. Default empty string.
     * @param string $timezone Optional. Timezone string. Default empty string.
     * @return array The request args.
     */
    protected function get_request_args($search = '', $timezone = '')
    {
    }
    /**
     * Determines the user's actual IP address and attempts to partially
     * anonymize an IP address by converting it to a network ID.
     *
     * Geolocating the network ID usually returns a similar location as the
     * actual IP, but provides some privacy for the user.
     *
     * $_SERVER['REMOTE_ADDR'] cannot be used in all cases, such as when the user
     * is making their request through a proxy, or when the web server is behind
     * a proxy. In those cases, $_SERVER['REMOTE_ADDR'] is set to the proxy address rather
     * than the user's actual address.
     *
     * Modified from https://stackoverflow.com/a/2031935/450127, MIT license.
     * Modified from https://github.com/geertw/php-ip-anonymizer, MIT license.
     *
     * SECURITY WARNING: This function is _NOT_ intended to be used in
     * circumstances where the authenticity of the IP address matters. This does
     * _NOT_ guarantee that the returned address is valid or accurate, and it can
     * be easily spoofed.
     *
     * @since 4.8.0
     *
     * @return false|string The anonymized address on success; the given address
     *                      or false on failure.
     */
    public static function get_unsafe_client_ip()
    {
    }
    /**
     * Test if two pairs of latitude/longitude coordinates match each other.
     *
     * @since 4.8.0
     *
     * @param array $a The first pair, with indexes 'latitude' and 'longitude'.
     * @param array $b The second pair, with indexes 'latitude' and 'longitude'.
     * @return bool True if they match, false if they don't.
     */
    protected function coordinates_match($a, $b)
    {
    }
    /**
     * Generates a transient key based on user location.
     *
     * This could be reduced to a one-liner in the calling functions, but it's
     * intentionally a separate function because it's called from multiple
     * functions, and having it abstracted keeps the logic consistent and DRY,
     * which is less prone to errors.
     *
     * @since 4.8.0
     *
     * @param  array $location Should contain 'latitude' and 'longitude' indexes.
     * @return bool|string false on failure, or a string on success.
     */
    protected function get_events_transient_key($location)
    {
    }
    /**
     * Caches an array of events data from the Events API.
     *
     * @since 4.8.0
     *
     * @param array    $events     Response body from the API request.
     * @param int|bool $expiration Optional. Amount of time to cache the events. Defaults to false.
     * @return bool true if events were cached; false if not.
     */
    protected function cache_events($events, $expiration = \false)
    {
    }
    /**
     * Gets cached events.
     *
     * @since 4.8.0
     *
     * @return false|array false on failure; an array containing `location`
     *                     and `events` items on success.
     */
    public function get_cached_events()
    {
    }
    /**
     * Adds formatted date and time items for each event in an API response.
     *
     * This has to be called after the data is pulled from the cache, because
     * the cached events are shared by all users. If it was called before storing
     * the cache, then all users would see the events in the localized data/time
     * of the user who triggered the cache refresh, rather than their own.
     *
     * @since 4.8.0
     *
     * @param  array $response_body The response which contains the events.
     * @return array The response with dates and times formatted.
     */
    protected function format_event_data_time($response_body)
    {
    }
    /**
     * Prepares the event list for presentation.
     *
     * Discards expired events, and makes WordCamps "sticky." Attendees need more
     * advanced notice about WordCamps than they do for meetups, so camps should
     * appear in the list sooner. If a WordCamp is coming up, the API will "stick"
     * it in the response, even if it wouldn't otherwise appear. When that happens,
     * the event will be at the end of the list, and will need to be moved into a
     * higher position, so that it doesn't get trimmed off.
     *
     * @since 4.8.0
     * @since 4.9.7 Stick a WordCamp to the final list.
     *
     * @param  array $response_body The response body which contains the events.
     * @return array The response body with events trimmed.
     */
    protected function trim_events($response_body)
    {
    }
    /**
     * Logs responses to Events API requests.
     *
     * @since 4.8.0
     * @deprecated 4.9.0 Use a plugin instead. See #41217 for an example.
     *
     * @param string $message A description of what occurred.
     * @param array  $details Details that provide more context for the
     *                        log entry.
     */
    protected function maybe_log_events_response($message, $details)
    {
    }
}
/**
 * Base WordPress Filesystem
 *
 * @package WordPress
 * @subpackage Filesystem
 */
/**
 * Base WordPress Filesystem class for which Filesystem implementations extend
 *
 * @since 2.5.0
 */
class WP_Filesystem_Base
{
    /**
     * Whether to display debug data for the connection.
     *
     * @since 2.5.0
     * @var bool
     */
    public $verbose = \false;
    /**
     * Cached list of local filepaths to mapped remote filepaths.
     *
     * @since 2.7.0
     * @var array
     */
    public $cache = array();
    /**
     * The Access method of the current connection, Set automatically.
     *
     * @since 2.5.0
     * @var string
     */
    public $method = '';
    /**
     * @var WP_Error
     */
    public $errors = \null;
    /**
     */
    public $options = array();
    /**
     * Return the path on the remote filesystem of ABSPATH.
     *
     * @since 2.7.0
     *
     * @return string The location of the remote path.
     */
    public function abspath()
    {
    }
    /**
     * Return the path on the remote filesystem of WP_CONTENT_DIR.
     *
     * @since 2.7.0
     *
     * @return string The location of the remote path.
     */
    public function wp_content_dir()
    {
    }
    /**
     * Return the path on the remote filesystem of WP_PLUGIN_DIR.
     *
     * @since 2.7.0
     *
     * @return string The location of the remote path.
     */
    public function wp_plugins_dir()
    {
    }
    /**
     * Return the path on the remote filesystem of the Themes Directory.
     *
     * @since 2.7.0
     *
     * @param string $theme The Theme stylesheet or template for the directory.
     * @return string The location of the remote path.
     */
    public function wp_themes_dir($theme = \false)
    {
    }
    /**
     * Return the path on the remote filesystem of WP_LANG_DIR.
     *
     * @since 3.2.0
     *
     * @return string The location of the remote path.
     */
    public function wp_lang_dir()
    {
    }
    /**
     * Locate a folder on the remote filesystem.
     *
     * @since 2.5.0
     * @deprecated 2.7.0 use WP_Filesystem::abspath() or WP_Filesystem::wp_*_dir() instead.
     * @see WP_Filesystem::abspath()
     * @see WP_Filesystem::wp_content_dir()
     * @see WP_Filesystem::wp_plugins_dir()
     * @see WP_Filesystem::wp_themes_dir()
     * @see WP_Filesystem::wp_lang_dir()
     *
     * @param string $base The folder to start searching from.
     * @param bool   $echo True to display debug information.
     *                     Default false.
     * @return string The location of the remote path.
     */
    public function find_base_dir($base = '.', $echo = \false)
    {
    }
    /**
     * Locate a folder on the remote filesystem.
     *
     * @since 2.5.0
     * @deprecated 2.7.0 use WP_Filesystem::abspath() or WP_Filesystem::wp_*_dir() methods instead.
     * @see WP_Filesystem::abspath()
     * @see WP_Filesystem::wp_content_dir()
     * @see WP_Filesystem::wp_plugins_dir()
     * @see WP_Filesystem::wp_themes_dir()
     * @see WP_Filesystem::wp_lang_dir()
     *
     * @param string $base The folder to start searching from.
     * @param bool   $echo True to display debug information.
     * @return string The location of the remote path.
     */
    public function get_base_dir($base = '.', $echo = \false)
    {
    }
    /**
     * Locate a folder on the remote filesystem.
     *
     * Assumes that on Windows systems, Stripping off the Drive
     * letter is OK Sanitizes \\ to / in windows filepaths.
     *
     * @since 2.7.0
     *
     * @param string $folder the folder to locate.
     * @return string|false The location of the remote path, false on failure.
     */
    public function find_folder($folder)
    {
    }
    /**
     * Locate a folder on the remote filesystem.
     *
     * Expects Windows sanitized path.
     *
     * @since 2.7.0
     *
     * @param string $folder The folder to locate.
     * @param string $base   The folder to start searching from.
     * @param bool   $loop   If the function has recursed, Internal use only.
     * @return string|false The location of the remote path, false to cease looping.
     */
    public function search_for_folder($folder, $base = '.', $loop = \false)
    {
    }
    /**
     * Return the *nix-style file permissions for a file.
     *
     * From the PHP documentation page for fileperms().
     *
     * @link https://secure.php.net/manual/en/function.fileperms.php
     *
     * @since 2.5.0
     *
     * @param string $file String filename.
     * @return string The *nix-style representation of permissions.
     */
    public function gethchmod($file)
    {
    }
    /**
     * Gets the permissions of the specified file or filepath in their octal format
     *
     * @since 2.5.0
     * @param string $file
     * @return string the last 3 characters of the octal number
     */
    public function getchmod($file)
    {
    }
    /**
     * Convert *nix-style file permissions to a octal number.
     *
     * Converts '-rw-r--r--' to 0644
     * From "info at rvgate dot nl"'s comment on the PHP documentation for chmod()
     *
     * @link https://secure.php.net/manual/en/function.chmod.php#49614
     *
     * @since 2.5.0
     *
     * @param string $mode string The *nix-style file permission.
     * @return int octal representation
     */
    public function getnumchmodfromh($mode)
    {
    }
    /**
     * Determine if the string provided contains binary characters.
     *
     * @since 2.7.0
     *
     * @param string $text String to test against.
     * @return bool true if string is binary, false otherwise.
     */
    public function is_binary($text)
    {
    }
    /**
     * Change the ownership of a file / folder.
     *
     * Default behavior is to do nothing, override this in your subclass, if desired.
     *
     * @since 2.5.0
     *
     * @param string $file      Path to the file.
     * @param mixed  $owner     A user name or number.
     * @param bool   $recursive Optional. If set True changes file owner recursivly. Defaults to False.
     * @return bool Returns true on success or false on failure.
     */
    public function chown($file, $owner, $recursive = \false)
    {
    }
    /**
     * Connect filesystem.
     *
     * @since 2.5.0
     * @abstract
     *
     * @return bool True on success or false on failure (always true for WP_Filesystem_Direct).
     */
    public function connect()
    {
    }
    /**
     * Read entire file into a string.
     *
     * @since 2.5.0
     * @abstract
     *
     * @param string $file Name of the file to read.
     * @return mixed|bool Returns the read data or false on failure.
     */
    public function get_contents($file)
    {
    }
    /**
     * Read entire file into an array.
     *
     * @since 2.5.0
     * @abstract
     *
     * @param string $file Path to the file.
     * @return array|bool the file contents in an array or false on failure.
     */
    public function get_contents_array($file)
    {
    }
    /**
     * Write a string to a file.
     *
     * @since 2.5.0
     * @abstract
     *
     * @param string $file     Remote path to the file where to write the data.
     * @param string $contents The data to write.
     * @param int    $mode     Optional. The file permissions as octal number, usually 0644.
     * @return bool False on failure.
     */
    public function put_contents($file, $contents, $mode = \false)
    {
    }
    /**
     * Get the current working directory.
     *
     * @since 2.5.0
     * @abstract
     *
     * @return string|bool The current working directory on success, or false on failure.
     */
    public function cwd()
    {
    }
    /**
     * Change current directory.
     *
     * @since 2.5.0
     * @abstract
     *
     * @param string $dir The new current directory.
     * @return bool|string
     */
    public function chdir($dir)
    {
    }
    /**
     * Change the file group.
     *
     * @since 2.5.0
     * @abstract
     *
     * @param string $file      Path to the file.
     * @param mixed  $group     A group name or number.
     * @param bool   $recursive Optional. If set True changes file group recursively. Defaults to False.
     * @return bool|string
     */
    public function chgrp($file, $group, $recursive = \false)
    {
    }
    /**
     * Change filesystem permissions.
     *
     * @since 2.5.0
     * @abstract
     *
     * @param string $file      Path to the file.
     * @param int    $mode      Optional. The permissions as octal number, usually 0644 for files, 0755 for dirs.
     * @param bool   $recursive Optional. If set True changes file group recursively. Defaults to False.
     * @return bool|string
     */
    public function chmod($file, $mode = \false, $recursive = \false)
    {
    }
    /**
     * Get the file owner.
     *
     * @since 2.5.0
     * @abstract
     *
     * @param string $file Path to the file.
     * @return string|bool Username of the user or false on error.
     */
    public function owner($file)
    {
    }
    /**
     * Get the file's group.
     *
     * @since 2.5.0
     * @abstract
     *
     * @param string $file Path to the file.
     * @return string|bool The group or false on error.
     */
    public function group($file)
    {
    }
    /**
     * Copy a file.
     *
     * @since 2.5.0
     * @abstract
     *
     * @param string $source      Path to the source file.
     * @param string $destination Path to the destination file.
     * @param bool   $overwrite   Optional. Whether to overwrite the destination file if it exists.
     *                            Default false.
     * @param int    $mode        Optional. The permissions as octal number, usually 0644 for files, 0755 for dirs.
     *                            Default false.
     * @return bool True if file copied successfully, False otherwise.
     */
    public function copy($source, $destination, $overwrite = \false, $mode = \false)
    {
    }
    /**
     * Move a file.
     *
     * @since 2.5.0
     * @abstract
     *
     * @param string $source      Path to the source file.
     * @param string $destination Path to the destination file.
     * @param bool   $overwrite   Optional. Whether to overwrite the destination file if it exists.
     *                            Default false.
     * @return bool True if file copied successfully, False otherwise.
     */
    public function move($source, $destination, $overwrite = \false)
    {
    }
    /**
     * Delete a file or directory.
     *
     * @since 2.5.0
     * @abstract
     *
     * @param string $file      Path to the file.
     * @param bool   $recursive Optional. If set True changes file group recursively. Defaults to False.
     *                          Default false.
     * @param bool   $type      Type of resource. 'f' for file, 'd' for directory.
     *                          Default false.
     * @return bool True if the file or directory was deleted, false on failure.
     */
    public function delete($file, $recursive = \false, $type = \false)
    {
    }
    /**
     * Check if a file or directory exists.
     *
     * @since 2.5.0
     * @abstract
     *
     * @param string $file Path to file/directory.
     * @return bool Whether $file exists or not.
     */
    public function exists($file)
    {
    }
    /**
     * Check if resource is a file.
     *
     * @since 2.5.0
     * @abstract
     *
     * @param string $file File path.
     * @return bool Whether $file is a file.
     */
    public function is_file($file)
    {
    }
    /**
     * Check if resource is a directory.
     *
     * @since 2.5.0
     * @abstract
     *
     * @param string $path Directory path.
     * @return bool Whether $path is a directory.
     */
    public function is_dir($path)
    {
    }
    /**
     * Check if a file is readable.
     *
     * @since 2.5.0
     * @abstract
     *
     * @param string $file Path to file.
     * @return bool Whether $file is readable.
     */
    public function is_readable($file)
    {
    }
    /**
     * Check if a file or directory is writable.
     *
     * @since 2.5.0
     * @abstract
     *
     * @param string $file Path to file.
     * @return bool Whether $file is writable.
     */
    public function is_writable($file)
    {
    }
    /**
     * Gets the file's last access time.
     *
     * @since 2.5.0
     * @abstract
     *
     * @param string $file Path to file.
     * @return int|bool Unix timestamp representing last access time.
     */
    public function atime($file)
    {
    }
    /**
     * Gets the file modification time.
     *
     * @since 2.5.0
     * @abstract
     *
     * @param string $file Path to file.
     * @return int|bool Unix timestamp representing modification time.
     */
    public function mtime($file)
    {
    }
    /**
     * Gets the file size (in bytes).
     *
     * @since 2.5.0
     * @abstract
     *
     * @param string $file Path to file.
     * @return int|bool Size of the file in bytes.
     */
    public function size($file)
    {
    }
    /**
     * Set the access and modification times of a file.
     *
     * Note: If $file doesn't exist, it will be created.
     *
     * @since 2.5.0
     * @abstract
     *
     * @param string $file  Path to file.
     * @param int    $time  Optional. Modified time to set for file.
     *                      Default 0.
     * @param int    $atime Optional. Access time to set for file.
     *                      Default 0.
     * @return bool Whether operation was successful or not.
     */
    public function touch($file, $time = 0, $atime = 0)
    {
    }
    /**
     * Create a directory.
     *
     * @since 2.5.0
     * @abstract
     *
     * @param string $path  Path for new directory.
     * @param mixed  $chmod Optional. The permissions as octal number, (or False to skip chmod)
     *                      Default false.
     * @param mixed  $chown Optional. A user name or number (or False to skip chown)
     *                      Default false.
     * @param mixed  $chgrp Optional. A group name or number (or False to skip chgrp).
     *                      Default false.
     * @return bool False if directory cannot be created, true otherwise.
     */
    public function mkdir($path, $chmod = \false, $chown = \false, $chgrp = \false)
    {
    }
    /**
     * Delete a directory.
     *
     * @since 2.5.0
     * @abstract
     *
     * @param string $path      Path to directory.
     * @param bool   $recursive Optional. Whether to recursively remove files/directories.
     *                          Default false.
     * @return bool Whether directory is deleted successfully or not.
     */
    public function rmdir($path, $recursive = \false)
    {
    }
    /**
     * Get details for files in a directory or a specific file.
     *
     * @since 2.5.0
     * @abstract
     *
     * @param string $path           Path to directory or file.
     * @param bool   $include_hidden Optional. Whether to include details of hidden ("." prefixed) files.
     *                               Default true.
     * @param bool   $recursive      Optional. Whether to recursively include file details in nested directories.
     *                               Default false.
     * @return array|bool {
     *     Array of files. False if unable to list directory contents.
     *
     *     @type string $name        Name of the file/directory.
     *     @type string $perms       *nix representation of permissions.
     *     @type int    $permsn      Octal representation of permissions.
     *     @type string $owner       Owner name or ID.
     *     @type int    $size        Size of file in bytes.
     *     @type int    $lastmodunix Last modified unix timestamp.
     *     @type mixed  $lastmod     Last modified month (3 letter) and day (without leading 0).
     *     @type int    $time        Last modified time.
     *     @type string $type        Type of resource. 'f' for file, 'd' for directory.
     *     @type mixed  $files       If a directory and $recursive is true, contains another array of files.
     * }
     */
    public function dirlist($path, $include_hidden = \true, $recursive = \false)
    {
    }
}
/**
 * WordPress Direct Filesystem.
 *
 * @package WordPress
 * @subpackage Filesystem
 */
/**
 * WordPress Filesystem Class for direct PHP file and folder manipulation.
 *
 * @since 2.5.0
 *
 * @see WP_Filesystem_Base
 */
class WP_Filesystem_Direct extends \WP_Filesystem_Base
{
    /**
     * constructor
     *
     *
     * @param mixed $arg ignored argument
     */
    public function __construct($arg)
    {
    }
    /**
     * Reads entire file into a string
     *
     *
     * @param string $file Name of the file to read.
     * @return string|bool The function returns the read data or false on failure.
     */
    public function get_contents($file)
    {
    }
    /**
     * Reads entire file into an array
     *
     *
     * @param string $file Path to the file.
     * @return array|bool the file contents in an array or false on failure.
     */
    public function get_contents_array($file)
    {
    }
    /**
     * Write a string to a file
     *
     *
     * @param string $file     Remote path to the file where to write the data.
     * @param string $contents The data to write.
     * @param int    $mode     Optional. The file permissions as octal number, usually 0644.
     *                         Default false.
     * @return bool False upon failure, true otherwise.
     */
    public function put_contents($file, $contents, $mode = \false)
    {
    }
    /**
     * Gets the current working directory
     *
     *
     * @return string|bool the current working directory on success, or false on failure.
     */
    public function cwd()
    {
    }
    /**
     * Change directory
     *
     *
     * @param string $dir The new current directory.
     * @return bool Returns true on success or false on failure.
     */
    public function chdir($dir)
    {
    }
    /**
     * Changes file group
     *
     *
     * @param string $file      Path to the file.
     * @param mixed  $group     A group name or number.
     * @param bool   $recursive Optional. If set True changes file group recursively. Default false.
     * @return bool Returns true on success or false on failure.
     */
    public function chgrp($file, $group, $recursive = \false)
    {
    }
    /**
     * Changes filesystem permissions
     *
     *
     * @param string $file      Path to the file.
     * @param int    $mode      Optional. The permissions as octal number, usually 0644 for files,
     *                          0755 for dirs. Default false.
     * @param bool   $recursive Optional. If set True changes file group recursively. Default false.
     * @return bool Returns true on success or false on failure.
     */
    public function chmod($file, $mode = \false, $recursive = \false)
    {
    }
    /**
     * Changes file owner
     *
     *
     * @param string $file      Path to the file.
     * @param mixed  $owner     A user name or number.
     * @param bool   $recursive Optional. If set True changes file owner recursively.
     *                          Default false.
     * @return bool Returns true on success or false on failure.
     */
    public function chown($file, $owner, $recursive = \false)
    {
    }
    /**
     * Gets file owner
     *
     *
     * @param string $file Path to the file.
     * @return string|bool Username of the user or false on error.
     */
    public function owner($file)
    {
    }
    /**
     * Gets file permissions
     *
     * FIXME does not handle errors in fileperms()
     *
     *
     * @param string $file Path to the file.
     * @return string Mode of the file (last 3 digits).
     */
    public function getchmod($file)
    {
    }
    /**
     *
     * @param string $file
     * @return string|false
     */
    public function group($file)
    {
    }
    /**
     *
     * @param string $source
     * @param string $destination
     * @param bool   $overwrite
     * @param int    $mode
     * @return bool
     */
    public function copy($source, $destination, $overwrite = \false, $mode = \false)
    {
    }
    /**
     *
     * @param string $source
     * @param string $destination
     * @param bool $overwrite
     * @return bool
     */
    public function move($source, $destination, $overwrite = \false)
    {
    }
    /**
     *
     * @param string $file
     * @param bool $recursive
     * @param string $type
     * @return bool
     */
    public function delete($file, $recursive = \false, $type = \false)
    {
    }
    /**
     *
     * @param string $file
     * @return bool
     */
    public function exists($file)
    {
    }
    /**
     *
     * @param string $file
     * @return bool
     */
    public function is_file($file)
    {
    }
    /**
     *
     * @param string $path
     * @return bool
     */
    public function is_dir($path)
    {
    }
    /**
     *
     * @param string $file
     * @return bool
     */
    public function is_readable($file)
    {
    }
    /**
     *
     * @param string $file
     * @return bool
     */
    public function is_writable($file)
    {
    }
    /**
     *
     * @param string $file
     * @return int
     */
    public function atime($file)
    {
    }
    /**
     *
     * @param string $file
     * @return int
     */
    public function mtime($file)
    {
    }
    /**
     *
     * @param string $file
     * @return int
     */
    public function size($file)
    {
    }
    /**
     *
     * @param string $file
     * @param int $time
     * @param int $atime
     * @return bool
     */
    public function touch($file, $time = 0, $atime = 0)
    {
    }
    /**
     *
     * @param string $path
     * @param mixed  $chmod
     * @param mixed  $chown
     * @param mixed  $chgrp
     * @return bool
     */
    public function mkdir($path, $chmod = \false, $chown = \false, $chgrp = \false)
    {
    }
    /**
     *
     * @param string $path
     * @param bool $recursive
     * @return bool
     */
    public function rmdir($path, $recursive = \false)
    {
    }
    /**
     *
     * @param string $path
     * @param bool $include_hidden
     * @param bool $recursive
     * @return bool|array
     */
    public function dirlist($path, $include_hidden = \true, $recursive = \false)
    {
    }
}
/**
 * WordPress FTP Filesystem.
 *
 * @package WordPress
 * @subpackage Filesystem
 */
/**
 * WordPress Filesystem Class for implementing FTP.
 *
 * @since 2.5.0
 *
 * @see WP_Filesystem_Base
 */
class WP_Filesystem_FTPext extends \WP_Filesystem_Base
{
    public $link;
    /**
     *
     * @param array $opt
     */
    public function __construct($opt = '')
    {
    }
    /**
     *
     * @return bool
     */
    public function connect()
    {
    }
    /**
     * Retrieves the file contents.
     *
     * @since 2.5.0
     *
     * @param string $file Filename.
     * @return string|false File contents on success, false if no temp file could be opened,
     *                      or if the file couldn't be retrieved.
     */
    public function get_contents($file)
    {
    }
    /**
     *
     * @param string $file
     * @return array
     */
    public function get_contents_array($file)
    {
    }
    /**
     *
     * @param string $file
     * @param string $contents
     * @param bool|int $mode
     * @return bool
     */
    public function put_contents($file, $contents, $mode = \false)
    {
    }
    /**
     *
     * @return string
     */
    public function cwd()
    {
    }
    /**
     *
     * @param string $dir
     * @return bool
     */
    public function chdir($dir)
    {
    }
    /**
     *
     * @param string $file
     * @param int $mode
     * @param bool $recursive
     * @return bool
     */
    public function chmod($file, $mode = \false, $recursive = \false)
    {
    }
    /**
     *
     * @param string $file
     * @return string
     */
    public function owner($file)
    {
    }
    /**
     *
     * @param string $file
     * @return string
     */
    public function getchmod($file)
    {
    }
    /**
     *
     * @param string $file
     * @return string
     */
    public function group($file)
    {
    }
    /**
     *
     * @param string $source
     * @param string $destination
     * @param bool   $overwrite
     * @param string|bool $mode
     * @return bool
     */
    public function copy($source, $destination, $overwrite = \false, $mode = \false)
    {
    }
    /**
     *
     * @param string $source
     * @param string $destination
     * @param bool $overwrite
     * @return bool
     */
    public function move($source, $destination, $overwrite = \false)
    {
    }
    /**
     *
     * @param string $file
     * @param bool $recursive
     * @param string $type
     * @return bool
     */
    public function delete($file, $recursive = \false, $type = \false)
    {
    }
    /**
     *
     * @param string $file
     * @return bool
     */
    public function exists($file)
    {
    }
    /**
     *
     * @param string $file
     * @return bool
     */
    public function is_file($file)
    {
    }
    /**
     *
     * @param string $path
     * @return bool
     */
    public function is_dir($path)
    {
    }
    /**
     *
     * @param string $file
     * @return bool
     */
    public function is_readable($file)
    {
    }
    /**
     *
     * @param string $file
     * @return bool
     */
    public function is_writable($file)
    {
    }
    /**
     *
     * @param string $file
     * @return bool
     */
    public function atime($file)
    {
    }
    /**
     *
     * @param string $file
     * @return int
     */
    public function mtime($file)
    {
    }
    /**
     *
     * @param string $file
     * @return int
     */
    public function size($file)
    {
    }
    /**
     *
     * @param string $file
     * @return bool
     */
    public function touch($file, $time = 0, $atime = 0)
    {
    }
    /**
     *
     * @param string $path
     * @param mixed $chmod
     * @param mixed $chown
     * @param mixed $chgrp
     * @return bool
     */
    public function mkdir($path, $chmod = \false, $chown = \false, $chgrp = \false)
    {
    }
    /**
     *
     * @param string $path
     * @param bool $recursive
     * @return bool
     */
    public function rmdir($path, $recursive = \false)
    {
    }
    /**
     *
     * @staticvar bool $is_windows
     * @param string $line
     * @return array
     */
    public function parselisting($line)
    {
    }
    /**
     *
     * @param string $path
     * @param bool $include_hidden
     * @param bool $recursive
     * @return bool|array
     */
    public function dirlist($path = '.', $include_hidden = \true, $recursive = \false)
    {
    }
    /**
     */
    public function __destruct()
    {
    }
}
/**
 * WordPress FTP Sockets Filesystem.
 *
 * @package WordPress
 * @subpackage Filesystem
 */
/**
 * WordPress Filesystem Class for implementing FTP Sockets.
 *
 * @since 2.5.0
 *
 * @see WP_Filesystem_Base
 */
class WP_Filesystem_ftpsockets extends \WP_Filesystem_Base
{
    /**
     * @var ftp
     */
    public $ftp;
    /**
     *
     * @param array $opt
     */
    public function __construct($opt = '')
    {
    }
    /**
     *
     * @return bool
     */
    public function connect()
    {
    }
    /**
     * Retrieves the file contents.
     *
     * @since 2.5.0
     *
     * @param string $file Filename.
     * @return string|false File contents on success, false if no temp file could be opened,
     *                      or if the file doesn't exist.
     */
    public function get_contents($file)
    {
    }
    /**
     *
     * @param string $file
     * @return array
     */
    public function get_contents_array($file)
    {
    }
    /**
     *
     * @param string $file
     * @param string $contents
     * @param int|bool $mode
     * @return bool
     */
    public function put_contents($file, $contents, $mode = \false)
    {
    }
    /**
     *
     * @return string
     */
    public function cwd()
    {
    }
    /**
     *
     * @param string $file
     * @return bool
     */
    public function chdir($file)
    {
    }
    /**
     *
     * @param string $file
     * @param int|bool $mode
     * @param bool $recursive
     * @return bool
     */
    public function chmod($file, $mode = \false, $recursive = \false)
    {
    }
    /**
     *
     * @param string $file
     * @return string
     */
    public function owner($file)
    {
    }
    /**
     *
     * @param string $file
     * @return string
     */
    public function getchmod($file)
    {
    }
    /**
     *
     * @param string $file
     * @return string
     */
    public function group($file)
    {
    }
    /**
     *
     * @param string   $source
     * @param string   $destination
     * @param bool     $overwrite
     * @param int|bool $mode
     * @return bool
     */
    public function copy($source, $destination, $overwrite = \false, $mode = \false)
    {
    }
    /**
     *
     * @param string $source
     * @param string $destination
     * @param bool   $overwrite
     * @return bool
     */
    public function move($source, $destination, $overwrite = \false)
    {
    }
    /**
     *
     * @param string $file
     * @param bool   $recursive
     * @param string $type
     * @return bool
     */
    public function delete($file, $recursive = \false, $type = \false)
    {
    }
    /**
     *
     * @param string $file
     * @return bool
     */
    public function exists($file)
    {
    }
    /**
     *
     * @param string $file
     * @return bool
     */
    public function is_file($file)
    {
    }
    /**
     *
     * @param string $path
     * @return bool
     */
    public function is_dir($path)
    {
    }
    /**
     *
     * @param string $file
     * @return bool
     */
    public function is_readable($file)
    {
    }
    /**
     *
     * @param string $file
     * @return bool
     */
    public function is_writable($file)
    {
    }
    /**
     *
     * @param string $file
     * @return bool
     */
    public function atime($file)
    {
    }
    /**
     *
     * @param string $file
     * @return int
     */
    public function mtime($file)
    {
    }
    /**
     * @param string $file
     * @return int
     */
    public function size($file)
    {
    }
    /**
     *
     * @param string $file
     * @param int $time
     * @param int $atime
     * @return bool
     */
    public function touch($file, $time = 0, $atime = 0)
    {
    }
    /**
     *
     * @param string $path
     * @param mixed  $chmod
     * @param mixed  $chown
     * @param mixed  $chgrp
     * @return bool
     */
    public function mkdir($path, $chmod = \false, $chown = \false, $chgrp = \false)
    {
    }
    /**
     *
     * @param string $path
     * @param bool $recursive
     * @return bool
     */
    public function rmdir($path, $recursive = \false)
    {
    }
    /**
     *
     * @param string $path
     * @param bool   $include_hidden
     * @param bool   $recursive
     * @return bool|array
     */
    public function dirlist($path = '.', $include_hidden = \true, $recursive = \false)
    {
    }
    /**
     */
    public function __destruct()
    {
    }
}
/**
 * WordPress Filesystem Class for implementing SSH2
 *
 * To use this class you must follow these steps for PHP 5.2.6+
 *
 * @contrib http://kevin.vanzonneveld.net/techblog/article/make_ssh_connections_with_php/ - Installation Notes
 *
 * Complie libssh2 (Note: Only 0.14 is officaly working with PHP 5.2.6+ right now, But many users have found the latest versions work)
 *
 * cd /usr/src
 * wget http://surfnet.dl.sourceforge.net/sourceforge/libssh2/libssh2-0.14.tar.gz
 * tar -zxvf libssh2-0.14.tar.gz
 * cd libssh2-0.14/
 * ./configure
 * make all install
 *
 * Note: Do not leave the directory yet!
 *
 * Enter: pecl install -f ssh2
 *
 * Copy the ssh.so file it creates to your PHP Module Directory.
 * Open up your PHP.INI file and look for where extensions are placed.
 * Add in your PHP.ini file: extension=ssh2.so
 *
 * Restart Apache!
 * Check phpinfo() streams to confirm that: ssh2.shell, ssh2.exec, ssh2.tunnel, ssh2.scp, ssh2.sftp  exist.
 *
 * Note: as of WordPress 2.8, This utilises the PHP5+ function 'stream_get_contents'
 *
 * @since 2.7.0
 *
 * @package WordPress
 * @subpackage Filesystem
 */
class WP_Filesystem_SSH2 extends \WP_Filesystem_Base
{
    /**
     */
    public $link = \false;
    /**
     * @var resource
     */
    public $sftp_link;
    public $keys = \false;
    /**
     *
     * @param array $opt
     */
    public function __construct($opt = '')
    {
    }
    /**
     *
     * @return bool
     */
    public function connect()
    {
    }
    /**
     * Gets the ssh2.sftp PHP stream wrapper path to open for the given file.
     *
     * This method also works around a PHP bug where the root directory (/) cannot
     * be opened by PHP functions, causing a false failure. In order to work around
     * this, the path is converted to /./ which is semantically the same as /
     * See https://bugs.php.net/bug.php?id=64169 for more details.
     *
     *
     * @since 4.4.0
     *
     * @param string $path The File/Directory path on the remote server to return
     * @return string The ssh2.sftp:// wrapped path to use.
     */
    public function sftp_path($path)
    {
    }
    /**
     *
     * @param string $command
     * @param bool $returnbool
     * @return bool|string True on success, false on failure. String if the command was executed, `$returnbool`
     *                     is false (default), and data from the resulting stream was retrieved.
     */
    public function run_command($command, $returnbool = \false)
    {
    }
    /**
     *
     * @param string $file
     * @return string|false
     */
    public function get_contents($file)
    {
    }
    /**
     *
     * @param string $file
     * @return array
     */
    public function get_contents_array($file)
    {
    }
    /**
     *
     * @param string   $file
     * @param string   $contents
     * @param bool|int $mode
     * @return bool
     */
    public function put_contents($file, $contents, $mode = \false)
    {
    }
    /**
     *
     * @return bool
     */
    public function cwd()
    {
    }
    /**
     *
     * @param string $dir
     * @return bool|string
     */
    public function chdir($dir)
    {
    }
    /**
     *
     * @param string $file
     * @param string $group
     * @param bool   $recursive
     *
     * @return bool
     */
    public function chgrp($file, $group, $recursive = \false)
    {
    }
    /**
     *
     * @param string $file
     * @param int    $mode
     * @param bool   $recursive
     * @return bool|string
     */
    public function chmod($file, $mode = \false, $recursive = \false)
    {
    }
    /**
     * Change the ownership of a file / folder.
     *
     *
     * @param string     $file      Path to the file.
     * @param string|int $owner     A user name or number.
     * @param bool       $recursive Optional. If set True changes file owner recursivly. Default False.
     * @return bool True on success or false on failure.
     */
    public function chown($file, $owner, $recursive = \false)
    {
    }
    /**
     *
     * @param string $file
     * @return string|false
     */
    public function owner($file)
    {
    }
    /**
     *
     * @param string $file
     * @return string
     */
    public function getchmod($file)
    {
    }
    /**
     *
     * @param string $file
     * @return string|false
     */
    public function group($file)
    {
    }
    /**
     *
     * @param string   $source
     * @param string   $destination
     * @param bool     $overwrite
     * @param int|bool $mode
     * @return bool
     */
    public function copy($source, $destination, $overwrite = \false, $mode = \false)
    {
    }
    /**
     *
     * @param string $source
     * @param string $destination
     * @param bool   $overwrite
     * @return bool
     */
    public function move($source, $destination, $overwrite = \false)
    {
    }
    /**
     *
     * @param string      $file
     * @param bool        $recursive
     * @param string|bool $type
     * @return bool
     */
    public function delete($file, $recursive = \false, $type = \false)
    {
    }
    /**
     *
     * @param string $file
     * @return bool
     */
    public function exists($file)
    {
    }
    /**
     *
     * @param string $file
     * @return bool
     */
    public function is_file($file)
    {
    }
    /**
     *
     * @param string $path
     * @return bool
     */
    public function is_dir($path)
    {
    }
    /**
     *
     * @param string $file
     * @return bool
     */
    public function is_readable($file)
    {
    }
    /**
     *
     * @param string $file
     * @return bool
     */
    public function is_writable($file)
    {
    }
    /**
     *
     * @param string $file
     * @return int
     */
    public function atime($file)
    {
    }
    /**
     *
     * @param string $file
     * @return int
     */
    public function mtime($file)
    {
    }
    /**
     *
     * @param string $file
     * @return int
     */
    public function size($file)
    {
    }
    /**
     *
     * @param string $file
     * @param int    $time
     * @param int    $atime
     */
    public function touch($file, $time = 0, $atime = 0)
    {
    }
    /**
     *
     * @param string $path
     * @param mixed  $chmod
     * @param mixed  $chown
     * @param mixed  $chgrp
     * @return bool
     */
    public function mkdir($path, $chmod = \false, $chown = \false, $chgrp = \false)
    {
    }
    /**
     *
     * @param string $path
     * @param bool   $recursive
     * @return bool
     */
    public function rmdir($path, $recursive = \false)
    {
    }
    /**
     *
     * @param string $path
     * @param bool   $include_hidden
     * @param bool   $recursive
     * @return bool|array
     */
    public function dirlist($path, $include_hidden = \true, $recursive = \false)
    {
    }
}
/**
 * WP_Importer base class
 */
class WP_Importer
{
    /**
     * Class Constructor
     *
     */
    public function __construct()
    {
    }
    /**
     * Returns array with imported permalinks from WordPress database
     *
     * @global wpdb $wpdb WordPress database abstraction object.
     *
     * @param string $importer_name
     * @param string $bid
     * @return array
     */
    public function get_imported_posts($importer_name, $bid)
    {
    }
    /**
     * Return count of imported permalinks from WordPress database
     *
     * @global wpdb $wpdb WordPress database abstraction object.
     *
     * @param string $importer_name
     * @param string $bid
     * @return int
     */
    public function count_imported_posts($importer_name, $bid)
    {
    }
    /**
     * Set array with imported comments from WordPress database
     *
     * @global wpdb $wpdb WordPress database abstraction object.
     *
     * @param string $bid
     * @return array
     */
    public function get_imported_comments($bid)
    {
    }
    /**
     *
     * @param int $blog_id
     * @return int|void
     */
    public function set_blog($blog_id)
    {
    }
    /**
     *
     * @param int $user_id
     * @return int|void
     */
    public function set_user($user_id)
    {
    }
    /**
     * Sort by strlen, longest string first
     *
     * @param string $a
     * @param string $b
     * @return int
     */
    public function cmpr_strlen($a, $b)
    {
    }
    /**
     * GET URL
     *
     * @param string $url
     * @param string $username
     * @param string $password
     * @param bool   $head
     * @return array
     */
    public function get_page($url, $username = '', $password = '', $head = \false)
    {
    }
    /**
     * Bump up the request timeout for http requests
     *
     * @param int $val
     * @return int
     */
    public function bump_request_timeout($val)
    {
    }
    /**
     * Check if user has exceeded disk quota
     *
     * @return bool
     */
    public function is_user_over_quota()
    {
    }
    /**
     * Replace newlines, tabs, and multiple spaces with a single space
     *
     * @param string $string
     * @return string
     */
    public function min_whitespace($string)
    {
    }
    /**
     * Resets global variables that grow out of control during imports.
     *
     * @since 3.0.0
     *
     * @global wpdb  $wpdb       WordPress database abstraction object.
     * @global array $wp_actions
     */
    public function stop_the_insanity()
    {
    }
}
/**
 * Administration API: WP_Internal_Pointers class
 *
 * @package WordPress
 * @subpackage Administration
 * @since 4.4.0
 */
/**
 * Core class used to implement an internal admin pointers API.
 *
 * @since 3.3.0
 */
final class WP_Internal_Pointers
{
    /**
     * Initializes the new feature pointers.
     *
     * @since 3.3.0
     *
     * All pointers can be disabled using the following:
     *     remove_action( 'admin_enqueue_scripts', array( 'WP_Internal_Pointers', 'enqueue_scripts' ) );
     *
     * Individual pointers (e.g. wp390_widgets) can be disabled using the following:
     *     remove_action( 'admin_print_footer_scripts', array( 'WP_Internal_Pointers', 'pointer_wp390_widgets' ) );
     *
     * @static
     *
     * @param string $hook_suffix The current admin page.
     */
    public static function enqueue_scripts($hook_suffix)
    {
    }
    /**
     * Print the pointer JavaScript data.
     *
     * @since 3.3.0
     *
     * @static
     *
     * @param string $pointer_id The pointer ID.
     * @param string $selector The HTML elements, on which the pointer should be attached.
     * @param array  $args Arguments to be passed to the pointer JS (see wp-pointer.js).
     */
    private static function print_js($pointer_id, $selector, $args)
    {
    }
    public static function pointer_wp330_toolbar()
    {
    }
    public static function pointer_wp330_media_uploader()
    {
    }
    public static function pointer_wp330_saving_widgets()
    {
    }
    public static function pointer_wp340_customize_current_theme_link()
    {
    }
    public static function pointer_wp340_choose_image_from_library()
    {
    }
    public static function pointer_wp350_media()
    {
    }
    public static function pointer_wp360_revisions()
    {
    }
    public static function pointer_wp360_locks()
    {
    }
    public static function pointer_wp390_widgets()
    {
    }
    public static function pointer_wp410_dfw()
    {
    }
    /**
     * Display a pointer for the new privacy tools.
     *
     * @since 4.9.6
     */
    public static function pointer_wp496_privacy()
    {
    }
    /**
     * Prevents new users from seeing existing 'new feature' pointers.
     *
     * @since 3.3.0
     *
     * @static
     *
     * @param int $user_id User ID.
     */
    public static function dismiss_pointers_for_new_users($user_id)
    {
    }
}
/**
 * List Table API: WP_Links_List_Table class
 *
 * @package WordPress
 * @subpackage Administration
 * @since 3.1.0
 */
/**
 * Core class used to implement displaying links in a list table.
 *
 * @since 3.1.0
 * @access private
 *
 * @see WP_List_Tsble
 */
class WP_Links_List_Table extends \WP_List_Table
{
    /**
     * Constructor.
     *
     * @since 3.1.0
     *
     * @see WP_List_Table::__construct() for more information on default arguments.
     *
     * @param array $args An associative array of arguments.
     */
    public function __construct($args = array())
    {
    }
    /**
     *
     * @return bool
     */
    public function ajax_user_can()
    {
    }
    /**
     *
     * @global int    $cat_id
     * @global string $s
     * @global string $orderby
     * @global string $order
     */
    public function prepare_items()
    {
    }
    /**
     */
    public function no_items()
    {
    }
    /**
     *
     * @return array
     */
    protected function get_bulk_actions()
    {
    }
    /**
     *
     * @global int $cat_id
     * @param string $which
     */
    protected function extra_tablenav($which)
    {
    }
    /**
     *
     * @return array
     */
    public function get_columns()
    {
    }
    /**
     *
     * @return array
     */
    protected function get_sortable_columns()
    {
    }
    /**
     * Get the name of the default primary column.
     *
     * @since 4.3.0
     *
     * @return string Name of the default primary column, in this case, 'name'.
     */
    protected function get_default_primary_column_name()
    {
    }
    /**
     * Handles the checkbox column output.
     *
     * @since 4.3.0
     *
     * @param object $link The current link object.
     */
    public function column_cb($link)
    {
    }
    /**
     * Handles the link name column output.
     *
     * @since 4.3.0
     *
     * @param object $link The current link object.
     */
    public function column_name($link)
    {
    }
    /**
     * Handles the link URL column output.
     *
     * @since 4.3.0
     *
     * @param object $link The current link object.
     */
    public function column_url($link)
    {
    }
    /**
     * Handles the link categories column output.
     *
     * @since 4.3.0
     *
     * @global int $cat_id
     *
     * @param object $link The current link object.
     */
    public function column_categories($link)
    {
    }
    /**
     * Handles the link relation column output.
     *
     * @since 4.3.0
     *
     * @param object $link The current link object.
     */
    public function column_rel($link)
    {
    }
    /**
     * Handles the link visibility column output.
     *
     * @since 4.3.0
     *
     * @param object $link The current link object.
     */
    public function column_visible($link)
    {
    }
    /**
     * Handles the link rating column output.
     *
     * @since 4.3.0
     *
     * @param object $link The current link object.
     */
    public function column_rating($link)
    {
    }
    /**
     * Handles the default column output.
     *
     * @since 4.3.0
     *
     * @param object $link        Link object.
     * @param string $column_name Current column name.
     */
    public function column_default($link, $column_name)
    {
    }
    public function display_rows()
    {
    }
    /**
     * Generates and displays row action links.
     *
     * @since 4.3.0
     *
     * @param object $link        Link being acted upon.
     * @param string $column_name Current column name.
     * @param string $primary     Primary column name.
     * @return string Row action output for links.
     */
    protected function handle_row_actions($link, $column_name, $primary)
    {
    }
}
/**
 * Helper functions for displaying a list of items in an ajaxified HTML table.
 *
 * @package WordPress
 * @subpackage List_Table
 * @since 4.7.0
 */
/**
 * Helper class to be used only by back compat functions
 *
 * @since 3.1.0
 */
class _WP_List_Table_Compat extends \WP_List_Table
{
    public $_screen;
    public $_columns;
    public function __construct($screen, $columns = array())
    {
    }
    /**
     *
     * @return array
     */
    protected function get_column_info()
    {
    }
    /**
     *
     * @return array
     */
    public function get_columns()
    {
    }
}
/**
 * List Table API: WP_Media_List_Table class
 *
 * @package WordPress
 * @subpackage Administration
 * @since 3.1.0
 */
/**
 * Core class used to implement displaying media items in a list table.
 *
 * @since 3.1.0
 * @access private
 *
 * @see WP_List_Table
 */
class WP_Media_List_Table extends \WP_List_Table
{
    /**
     * Holds the number of pending comments for each post.
     *
     * @since 4.4.0
     * @var array
     */
    protected $comment_pending_count = array();
    private $detached;
    private $is_trash;
    /**
     * Constructor.
     *
     * @since 3.1.0
     *
     * @see WP_List_Table::__construct() for more information on default arguments.
     *
     * @param array $args An associative array of arguments.
     */
    public function __construct($args = array())
    {
    }
    /**
     *
     * @return bool
     */
    public function ajax_user_can()
    {
    }
    /**
     *
     * @global WP_Query $wp_query
     * @global array    $post_mime_types
     * @global array    $avail_post_mime_types
     * @global string   $mode
     */
    public function prepare_items()
    {
    }
    /**
     * @global array $post_mime_types
     * @global array $avail_post_mime_types
     * @return array
     */
    protected function get_views()
    {
    }
    /**
     *
     * @return array
     */
    protected function get_bulk_actions()
    {
    }
    /**
     * @param string $which
     */
    protected function extra_tablenav($which)
    {
    }
    /**
     *
     * @return string
     */
    public function current_action()
    {
    }
    /**
     *
     * @return bool
     */
    public function has_items()
    {
    }
    /**
     */
    public function no_items()
    {
    }
    /**
     * Override parent views so we can use the filter bar display.
     *
     * @global string $mode List table view mode.
     */
    public function views()
    {
    }
    /**
     *
     * @return array
     */
    public function get_columns()
    {
    }
    /**
     *
     * @return array
     */
    protected function get_sortable_columns()
    {
    }
    /**
     * Handles the checkbox column output.
     *
     * @since 4.3.0
     *
     * @param WP_Post $post The current WP_Post object.
     */
    public function column_cb($post)
    {
    }
    /**
     * Handles the title column output.
     *
     * @since 4.3.0
     *
     * @param WP_Post $post The current WP_Post object.
     */
    public function column_title($post)
    {
    }
    /**
     * Handles the author column output.
     *
     * @since 4.3.0
     *
     * @param WP_Post $post The current WP_Post object.
     */
    public function column_author($post)
    {
    }
    /**
     * Handles the description column output.
     *
     * @since 4.3.0
     *
     * @param WP_Post $post The current WP_Post object.
     */
    public function column_desc($post)
    {
    }
    /**
     * Handles the date column output.
     *
     * @since 4.3.0
     *
     * @param WP_Post $post The current WP_Post object.
     */
    public function column_date($post)
    {
    }
    /**
     * Handles the parent column output.
     *
     * @since 4.3.0
     *
     * @param WP_Post $post The current WP_Post object.
     */
    public function column_parent($post)
    {
    }
    /**
     * Handles the comments column output.
     *
     * @since 4.3.0
     *
     * @param WP_Post $post The current WP_Post object.
     */
    public function column_comments($post)
    {
    }
    /**
     * Handles output for the default column.
     *
     * @since 4.3.0
     *
     * @param WP_Post $post        The current WP_Post object.
     * @param string  $column_name Current column name.
     */
    public function column_default($post, $column_name)
    {
    }
    /**
     *
     * @global WP_Post $post
     */
    public function display_rows()
    {
    }
    /**
     * Gets the name of the default primary column.
     *
     * @since 4.3.0
     *
     * @return string Name of the default primary column, in this case, 'title'.
     */
    protected function get_default_primary_column_name()
    {
    }
    /**
     * @param WP_Post $post
     * @param string  $att_title
     *
     * @return array
     */
    private function _get_row_actions($post, $att_title)
    {
    }
    /**
     * Generates and displays row action links.
     *
     * @since 4.3.0
     *
     * @param object $post        Attachment being acted upon.
     * @param string $column_name Current column name.
     * @param string $primary     Primary column name.
     * @return string Row actions output for media attachments.
     */
    protected function handle_row_actions($post, $column_name, $primary)
    {
    }
}
/**
 * List Table API: WP_MS_Sites_List_Table class
 *
 * @package WordPress
 * @subpackage Administration
 * @since 3.1.0
 */
/**
 * Core class used to implement displaying sites in a list table for the network admin.
 *
 * @since 3.1.0
 * @access private
 *
 * @see WP_List_Table
 */
class WP_MS_Sites_List_Table extends \WP_List_Table
{
    /**
     * Site status list.
     *
     * @since 4.3.0
     * @var array
     */
    public $status_list;
    /**
     * Constructor.
     *
     * @since 3.1.0
     *
     * @see WP_List_Table::__construct() for more information on default arguments.
     *
     * @param array $args An associative array of arguments.
     */
    public function __construct($args = array())
    {
    }
    /**
     *
     * @return bool
     */
    public function ajax_user_can()
    {
    }
    /**
     * Prepares the list of sites for display.
     *
     * @since 3.1.0
     *
     * @global string $s
     * @global string $mode
     * @global wpdb   $wpdb
     */
    public function prepare_items()
    {
    }
    /**
     */
    public function no_items()
    {
    }
    /**
     *
     * @return array
     */
    protected function get_bulk_actions()
    {
    }
    /**
     * @global string $mode List table view mode.
     *
     * @param string $which
     */
    protected function pagination($which)
    {
    }
    /**
     * @return array
     */
    public function get_columns()
    {
    }
    /**
     * @return array
     */
    protected function get_sortable_columns()
    {
    }
    /**
     * Handles the checkbox column output.
     *
     * @since 4.3.0
     *
     * @param array $blog Current site.
     */
    public function column_cb($blog)
    {
    }
    /**
     * Handles the ID column output.
     *
     * @since 4.4.0
     *
     * @param array $blog Current site.
     */
    public function column_id($blog)
    {
    }
    /**
     * Handles the site name column output.
     *
     * @since 4.3.0
     *
     * @global string $mode List table view mode.
     *
     * @param array $blog Current site.
     */
    public function column_blogname($blog)
    {
    }
    /**
     * Handles the lastupdated column output.
     *
     * @since 4.3.0
     *
     * @global string $mode List table view mode.
     *
     * @param array $blog Current site.
     */
    public function column_lastupdated($blog)
    {
    }
    /**
     * Handles the registered column output.
     *
     * @since 4.3.0
     *
     * @global string $mode List table view mode.
     *
     * @param array $blog Current site.
     */
    public function column_registered($blog)
    {
    }
    /**
     * Handles the users column output.
     *
     * @since 4.3.0
     *
     * @param array $blog Current site.
     */
    public function column_users($blog)
    {
    }
    /**
     * Handles the plugins column output.
     *
     * @since 4.3.0
     *
     * @param array $blog Current site.
     */
    public function column_plugins($blog)
    {
    }
    /**
     * Handles output for the default column.
     *
     * @since 4.3.0
     *
     * @param array  $blog        Current site.
     * @param string $column_name Current column name.
     */
    public function column_default($blog, $column_name)
    {
    }
    /**
     *
     * @global string $mode
     */
    public function display_rows()
    {
    }
    /**
     * Gets the name of the default primary column.
     *
     * @since 4.3.0
     *
     * @return string Name of the default primary column, in this case, 'blogname'.
     */
    protected function get_default_primary_column_name()
    {
    }
    /**
     * Generates and displays row action links.
     *
     * @since 4.3.0
     *
     * @param object $blog        Site being acted upon.
     * @param string $column_name Current column name.
     * @param string $primary     Primary column name.
     * @return string Row actions output.
     */
    protected function handle_row_actions($blog, $column_name, $primary)
    {
    }
}
/**
 * List Table API: WP_MS_Themes_List_Table class
 *
 * @package WordPress
 * @subpackage Administration
 * @since 3.1.0
 */
/**
 * Core class used to implement displaying themes in a list table for the network admin.
 *
 * @since 3.1.0
 * @access private
 *
 * @see WP_List_Table
 */
class WP_MS_Themes_List_Table extends \WP_List_Table
{
    public $site_id;
    public $is_site_themes;
    private $has_items;
    /**
     * Constructor.
     *
     * @since 3.1.0
     *
     * @see WP_List_Table::__construct() for more information on default arguments.
     *
     * @global string $status
     * @global int    $page
     *
     * @param array $args An associative array of arguments.
     */
    public function __construct($args = array())
    {
    }
    /**
     *
     * @return array
     */
    protected function get_table_classes()
    {
    }
    /**
     *
     * @return bool
     */
    public function ajax_user_can()
    {
    }
    /**
     *
     * @global string $status
     * @global array $totals
     * @global int $page
     * @global string $orderby
     * @global string $order
     * @global string $s
     */
    public function prepare_items()
    {
    }
    /**
     * @staticvar string $term
     * @param WP_Theme $theme
     * @return bool
     */
    public function _search_callback($theme)
    {
    }
    // Not used by any core columns.
    /**
     * @global string $orderby
     * @global string $order
     * @param array $theme_a
     * @param array $theme_b
     * @return int
     */
    public function _order_callback($theme_a, $theme_b)
    {
    }
    /**
     */
    public function no_items()
    {
    }
    /**
     *
     * @return array
     */
    public function get_columns()
    {
    }
    /**
     *
     * @return array
     */
    protected function get_sortable_columns()
    {
    }
    /**
     * Gets the name of the primary column.
     *
     * @since 4.3.0
     *
     * @return string Unalterable name of the primary column name, in this case, 'name'.
     */
    protected function get_primary_column_name()
    {
    }
    /**
     *
     * @global array $totals
     * @global string $status
     * @return array
     */
    protected function get_views()
    {
    }
    /**
     * @global string $status
     *
     * @return array
     */
    protected function get_bulk_actions()
    {
    }
    /**
     */
    public function display_rows()
    {
    }
    /**
     * Handles the checkbox column output.
     *
     * @since 4.3.0
     *
     * @param WP_Theme $theme The current WP_Theme object.
     */
    public function column_cb($theme)
    {
    }
    /**
     * Handles the name column output.
     *
     * @since 4.3.0
     *
     * @global string $status
     * @global int    $page
     * @global string $s
     *
     * @param WP_Theme $theme The current WP_Theme object.
     */
    public function column_name($theme)
    {
    }
    /**
     * Handles the description column output.
     *
     * @since 4.3.0
     *
     * @global string $status
     * @global array  $totals
     *
     * @param WP_Theme $theme The current WP_Theme object.
     */
    public function column_description($theme)
    {
    }
    /**
     * Handles default column output.
     *
     * @since 4.3.0
     *
     * @param WP_Theme $theme       The current WP_Theme object.
     * @param string   $column_name The current column name.
     */
    public function column_default($theme, $column_name)
    {
    }
    /**
     * Handles the output for a single table row.
     *
     * @since 4.3.0
     *
     * @param WP_Theme $item The current WP_Theme object.
     */
    public function single_row_columns($item)
    {
    }
    /**
     * @global string $status
     * @global array  $totals
     *
     * @param WP_Theme $theme
     */
    public function single_row($theme)
    {
    }
}
/**
 * List Table API: WP_MS_Users_List_Table class
 *
 * @package WordPress
 * @subpackage Administration
 * @since 3.1.0
 */
/**
 * Core class used to implement displaying users in a list table for the network admin.
 *
 * @since 3.1.0
 * @access private
 *
 * @see WP_List_Table
 */
class WP_MS_Users_List_Table extends \WP_List_Table
{
    /**
     *
     * @return bool
     */
    public function ajax_user_can()
    {
    }
    /**
     *
     * @global string $usersearch
     * @global string $role
     * @global wpdb   $wpdb
     * @global string $mode
     */
    public function prepare_items()
    {
    }
    /**
     *
     * @return array
     */
    protected function get_bulk_actions()
    {
    }
    /**
     */
    public function no_items()
    {
    }
    /**
     *
     * @global string $role
     * @return array
     */
    protected function get_views()
    {
    }
    /**
     * @global string $mode List table view mode.
     *
     * @param string $which
     */
    protected function pagination($which)
    {
    }
    /**
     *
     * @return array
     */
    public function get_columns()
    {
    }
    /**
     *
     * @return array
     */
    protected function get_sortable_columns()
    {
    }
    /**
     * Handles the checkbox column output.
     *
     * @since 4.3.0
     *
     * @param WP_User $user The current WP_User object.
     */
    public function column_cb($user)
    {
    }
    /**
     * Handles the ID column output.
     *
     * @since 4.4.0
     *
     * @param WP_User $user The current WP_User object.
     */
    public function column_id($user)
    {
    }
    /**
     * Handles the username column output.
     *
     * @since 4.3.0
     *
     * @param WP_User $user The current WP_User object.
     */
    public function column_username($user)
    {
    }
    /**
     * Handles the name column output.
     *
     * @since 4.3.0
     *
     * @param WP_User $user The current WP_User object.
     */
    public function column_name($user)
    {
    }
    /**
     * Handles the email column output.
     *
     * @since 4.3.0
     *
     * @param WP_User $user The current WP_User object.
     */
    public function column_email($user)
    {
    }
    /**
     * Handles the registered date column output.
     *
     * @since 4.3.0
     *
     * @global string $mode List table view mode.
     *
     * @param WP_User $user The current WP_User object.
     */
    public function column_registered($user)
    {
    }
    /**
     * @since 4.3.0
     *
     * @param WP_User $user
     * @param string  $classes
     * @param string  $data
     * @param string  $primary
     */
    protected function _column_blogs($user, $classes, $data, $primary)
    {
    }
    /**
     * Handles the sites column output.
     *
     * @since 4.3.0
     *
     * @param WP_User $user The current WP_User object.
     */
    public function column_blogs($user)
    {
    }
    /**
     * Handles the default column output.
     *
     * @since 4.3.0
     *
     * @param WP_User $user       The current WP_User object.
     * @param string $column_name The current column name.
     */
    public function column_default($user, $column_name)
    {
    }
    public function display_rows()
    {
    }
    /**
     * Gets the name of the default primary column.
     *
     * @since 4.3.0
     *
     * @return string Name of the default primary column, in this case, 'username'.
     */
    protected function get_default_primary_column_name()
    {
    }
    /**
     * Generates and displays row action links.
     *
     * @since 4.3.0
     *
     * @param object $user        User being acted upon.
     * @param string $column_name Current column name.
     * @param string $primary     Primary column name.
     * @return string Row actions output for users in Multisite.
     */
    protected function handle_row_actions($user, $column_name, $primary)
    {
    }
}
/**
 * List Table API: WP_Plugin_Install_List_Table class
 *
 * @package WordPress
 * @subpackage Administration
 * @since 3.1.0
 */
/**
 * Core class used to implement displaying plugins to install in a list table.
 *
 * @since 3.1.0
 * @access private
 *
 * @see WP_List_Table
 */
class WP_Plugin_Install_List_Table extends \WP_List_Table
{
    public $order = 'ASC';
    public $orderby = \null;
    public $groups = array();
    private $error;
    /**
     *
     * @return bool
     */
    public function ajax_user_can()
    {
    }
    /**
     * Return the list of known plugins.
     *
     * Uses the transient data from the updates API to determine the known
     * installed plugins.
     *
     * @since 4.9.0
     * @access protected
     *
     * @return array
     */
    protected function get_installed_plugins()
    {
    }
    /**
     * Return a list of slugs of installed plugins, if known.
     *
     * Uses the transient data from the updates API to determine the slugs of
     * known installed plugins. This might be better elsewhere, perhaps even
     * within get_plugins().
     *
     * @since 4.0.0
     *
     * @return array
     */
    protected function get_installed_plugin_slugs()
    {
    }
    /**
     *
     * @global array  $tabs
     * @global string $tab
     * @global int    $paged
     * @global string $type
     * @global string $term
     */
    public function prepare_items()
    {
    }
    /**
     */
    public function no_items()
    {
    }
    /**
     *
     * @global array $tabs
     * @global string $tab
     *
     * @return array
     */
    protected function get_views()
    {
    }
    /**
     * Override parent views so we can use the filter bar display.
     */
    public function views()
    {
    }
    /**
     * Override the parent display() so we can provide a different container.
     */
    public function display()
    {
    }
    /**
     * @global string $tab
     *
     * @param string $which
     */
    protected function display_tablenav($which)
    {
    }
    /**
     * @return array
     */
    protected function get_table_classes()
    {
    }
    /**
     * @return array
     */
    public function get_columns()
    {
    }
    /**
     * @param object $plugin_a
     * @param object $plugin_b
     * @return int
     */
    private function order_callback($plugin_a, $plugin_b)
    {
    }
    public function display_rows()
    {
    }
}
/**
 * List Table API: WP_Plugins_List_Table class
 *
 * @package WordPress
 * @subpackage Administration
 * @since 3.1.0
 */
/**
 * Core class used to implement displaying installed plugins in a list table.
 *
 * @since 3.1.0
 * @access private
 *
 * @see WP_List_Table
 */
class WP_Plugins_List_Table extends \WP_List_Table
{
    /**
     * Constructor.
     *
     * @since 3.1.0
     *
     * @see WP_List_Table::__construct() for more information on default arguments.
     *
     * @global string $status
     * @global int    $page
     *
     * @param array $args An associative array of arguments.
     */
    public function __construct($args = array())
    {
    }
    /**
     * @return array
     */
    protected function get_table_classes()
    {
    }
    /**
     * @return bool
     */
    public function ajax_user_can()
    {
    }
    /**
     *
     * @global string $status
     * @global array  $plugins
     * @global array  $totals
     * @global int    $page
     * @global string $orderby
     * @global string $order
     * @global string $s
     */
    public function prepare_items()
    {
    }
    /**
     * @global string $s URL encoded search term.
     *
     * @param array $plugin
     * @return bool
     */
    public function _search_callback($plugin)
    {
    }
    /**
     * @global string $orderby
     * @global string $order
     * @param array $plugin_a
     * @param array $plugin_b
     * @return int
     */
    public function _order_callback($plugin_a, $plugin_b)
    {
    }
    /**
     *
     * @global array $plugins
     */
    public function no_items()
    {
    }
    /**
     * Displays the search box.
     *
     * @since 4.6.0
     *
     * @param string $text     The 'submit' button label.
     * @param string $input_id ID attribute value for the search input field.
     */
    public function search_box($text, $input_id)
    {
    }
    /**
     *
     * @global string $status
     * @return array
     */
    public function get_columns()
    {
    }
    /**
     * @return array
     */
    protected function get_sortable_columns()
    {
    }
    /**
     *
     * @global array $totals
     * @global string $status
     * @return array
     */
    protected function get_views()
    {
    }
    /**
     *
     * @global string $status
     * @return array
     */
    protected function get_bulk_actions()
    {
    }
    /**
     * @global string $status
     * @param string $which
     */
    public function bulk_actions($which = '')
    {
    }
    /**
     * @global string $status
     * @param string $which
     */
    protected function extra_tablenav($which)
    {
    }
    /**
     * @return string
     */
    public function current_action()
    {
    }
    /**
     *
     * @global string $status
     */
    public function display_rows()
    {
    }
    /**
     * @global string $status
     * @global int $page
     * @global string $s
     * @global array $totals
     *
     * @param array $item
     */
    public function single_row($item)
    {
    }
    /**
     * Gets the name of the primary column for this specific list table.
     *
     * @since 4.3.0
     *
     * @return string Unalterable name for the primary column, in this case, 'name'.
     */
    protected function get_primary_column_name()
    {
    }
}
/**
 * List Table API: WP_Post_Comments_List_Table class
 *
 * @package WordPress
 * @subpackage Administration
 * @since 4.4.0
 */
/**
 * Core class used to implement displaying post comments in a list table.
 *
 * @since 3.1.0
 * @access private
 *
 * @see WP_Comments_List_Table
 */
class WP_Post_Comments_List_Table extends \WP_Comments_List_Table
{
    /**
     *
     * @return array
     */
    protected function get_column_info()
    {
    }
    /**
     *
     * @return array
     */
    protected function get_table_classes()
    {
    }
    /**
     *
     * @param bool $output_empty
     */
    public function display($output_empty = \false)
    {
    }
    /**
     *
     * @param bool $comment_status
     * @return int
     */
    public function get_per_page($comment_status = \false)
    {
    }
}
/**
 * List Table API: WP_Posts_List_Table class
 *
 * @package WordPress
 * @subpackage Administration
 * @since 3.1.0
 */
/**
 * Core class used to implement displaying posts in a list table.
 *
 * @since 3.1.0
 * @access private
 *
 * @see WP_List_Table
 */
class WP_Posts_List_Table extends \WP_List_Table
{
    /**
     * Whether the items should be displayed hierarchically or linearly.
     *
     * @since 3.1.0
     * @var bool
     */
    protected $hierarchical_display;
    /**
     * Holds the number of pending comments for each post.
     *
     * @since 3.1.0
     * @var array
     */
    protected $comment_pending_count;
    /**
     * Holds the number of posts for this user.
     *
     * @since 3.1.0
     * @var int
     */
    private $user_posts_count;
    /**
     * Holds the number of posts which are sticky.
     *
     * @since 3.1.0
     * @var int
     */
    private $sticky_posts_count = 0;
    private $is_trash;
    /**
     * Current level for output.
     *
     * @since 4.3.0
     * @var int
     */
    protected $current_level = 0;
    /**
     * Constructor.
     *
     * @since 3.1.0
     *
     * @see WP_List_Table::__construct() for more information on default arguments.
     *
     * @global WP_Post_Type $post_type_object
     * @global wpdb         $wpdb
     *
     * @param array $args An associative array of arguments.
     */
    public function __construct($args = array())
    {
    }
    /**
     * Sets whether the table layout should be hierarchical or not.
     *
     * @since 4.2.0
     *
     * @param bool $display Whether the table layout should be hierarchical.
     */
    public function set_hierarchical_display($display)
    {
    }
    /**
     *
     * @return bool
     */
    public function ajax_user_can()
    {
    }
    /**
     *
     * @global array    $avail_post_stati
     * @global WP_Query $wp_query
     * @global int      $per_page
     * @global string   $mode
     */
    public function prepare_items()
    {
    }
    /**
     *
     * @return bool
     */
    public function has_items()
    {
    }
    /**
     */
    public function no_items()
    {
    }
    /**
     * Determine if the current view is the "All" view.
     *
     * @since 4.2.0
     *
     * @return bool Whether the current view is the "All" view.
     */
    protected function is_base_request()
    {
    }
    /**
     * Helper to create links to edit.php with params.
     *
     * @since 4.4.0
     *
     * @param array  $args  URL parameters for the link.
     * @param string $label Link text.
     * @param string $class Optional. Class attribute. Default empty string.
     * @return string The formatted link string.
     */
    protected function get_edit_link($args, $label, $class = '')
    {
    }
    /**
     *
     * @global array $locked_post_status This seems to be deprecated.
     * @global array $avail_post_stati
     * @return array
     */
    protected function get_views()
    {
    }
    /**
     *
     * @return array
     */
    protected function get_bulk_actions()
    {
    }
    /**
     * Displays a categories drop-down for filtering on the Posts list table.
     *
     * @since 4.6.0
     *
     * @global int $cat Currently selected category.
     *
     * @param string $post_type Post type slug.
     */
    protected function categories_dropdown($post_type)
    {
    }
    /**
     * @param string $which
     */
    protected function extra_tablenav($which)
    {
    }
    /**
     *
     * @return string
     */
    public function current_action()
    {
    }
    /**
     *
     * @return array
     */
    protected function get_table_classes()
    {
    }
    /**
     *
     * @return array
     */
    public function get_columns()
    {
    }
    /**
     *
     * @return array
     */
    protected function get_sortable_columns()
    {
    }
    /**
     * @global WP_Query $wp_query
     * @global int $per_page
     * @param array $posts
     * @param int $level
     */
    public function display_rows($posts = array(), $level = 0)
    {
    }
    /**
     * @param array $posts
     * @param int $level
     */
    private function _display_rows($posts, $level = 0)
    {
    }
    /**
     * @global wpdb    $wpdb
     * @global WP_Post $post
     * @param array $pages
     * @param int $pagenum
     * @param int $per_page
     */
    private function _display_rows_hierarchical($pages, $pagenum = 1, $per_page = 20)
    {
    }
    /**
     * Given a top level page ID, display the nested hierarchy of sub-pages
     * together with paging support
     *
     * @since 3.1.0 (Standalone function exists since 2.6.0)
     * @since 4.2.0 Added the `$to_display` parameter.
     *
     * @param array $children_pages
     * @param int $count
     * @param int $parent
     * @param int $level
     * @param int $pagenum
     * @param int $per_page
     * @param array $to_display List of pages to be displayed. Passed by reference.
     */
    private function _page_rows(&$children_pages, &$count, $parent, $level, $pagenum, $per_page, &$to_display)
    {
    }
    /**
     * Handles the checkbox column output.
     *
     * @since 4.3.0
     *
     * @param WP_Post $post The current WP_Post object.
     */
    public function column_cb($post)
    {
    }
    /**
     * @since 4.3.0
     *
     * @param WP_Post $post
     * @param string  $classes
     * @param string  $data
     * @param string  $primary
     */
    protected function _column_title($post, $classes, $data, $primary)
    {
    }
    /**
     * Handles the title column output.
     *
     * @since 4.3.0
     *
     * @global string $mode List table view mode.
     *
     * @param WP_Post $post The current WP_Post object.
     */
    public function column_title($post)
    {
    }
    /**
     * Handles the post date column output.
     *
     * @since 4.3.0
     *
     * @global string $mode List table view mode.
     *
     * @param WP_Post $post The current WP_Post object.
     */
    public function column_date($post)
    {
    }
    /**
     * Handles the comments column output.
     *
     * @since 4.3.0
     *
     * @param WP_Post $post The current WP_Post object.
     */
    public function column_comments($post)
    {
    }
    /**
     * Handles the post author column output.
     *
     * @since 4.3.0
     *
     * @param WP_Post $post The current WP_Post object.
     */
    public function column_author($post)
    {
    }
    /**
     * Handles the default column output.
     *
     * @since 4.3.0
     *
     * @param WP_Post $post        The current WP_Post object.
     * @param string  $column_name The current column name.
     */
    public function column_default($post, $column_name)
    {
    }
    /**
     * @global WP_Post $post
     *
     * @param int|WP_Post $post
     * @param int         $level
     */
    public function single_row($post, $level = 0)
    {
    }
    /**
     * Gets the name of the default primary column.
     *
     * @since 4.3.0
     *
     * @return string Name of the default primary column, in this case, 'title'.
     */
    protected function get_default_primary_column_name()
    {
    }
    /**
     * Generates and displays row action links.
     *
     * @since 4.3.0
     *
     * @param object $post        Post being acted upon.
     * @param string $column_name Current column name.
     * @param string $primary     Primary column name.
     * @return string Row actions output for posts.
     */
    protected function handle_row_actions($post, $column_name, $primary)
    {
    }
    /**
     * Outputs the hidden row displayed when inline editing
     *
     * @since 3.1.0
     *
     * @global string $mode List table view mode.
     */
    public function inline_edit()
    {
    }
}
/**
 * Screen API: WP_Screen class
 *
 * @package WordPress
 * @subpackage Administration
 * @since 4.4.0
 */
/**
 * Core class used to implement an admin screen API.
 *
 * @since 3.3.0
 */
final class WP_Screen
{
    /**
     * Any action associated with the screen. 'add' for *-add.php and *-new.php screens. Empty otherwise.
     *
     * @since 3.3.0
     * @var string
     */
    public $action;
    /**
     * The base type of the screen. This is typically the same as $id but with any post types and taxonomies stripped.
     * For example, for an $id of 'edit-post' the base is 'edit'.
     *
     * @since 3.3.0
     * @var string
     */
    public $base;
    /**
     * The number of columns to display. Access with get_columns().
     *
     * @since 3.4.0
     * @var int
     */
    private $columns = 0;
    /**
     * The unique ID of the screen.
     *
     * @since 3.3.0
     * @var string
     */
    public $id;
    /**
     * Which admin the screen is in. network | user | site | false
     *
     * @since 3.5.0
     * @var string
     */
    protected $in_admin;
    /**
     * Whether the screen is in the network admin.
     *
     * Deprecated. Use in_admin() instead.
     *
     * @since 3.3.0
     * @deprecated 3.5.0
     * @var bool
     */
    public $is_network;
    /**
     * Whether the screen is in the user admin.
     *
     * Deprecated. Use in_admin() instead.
     *
     * @since 3.3.0
     * @deprecated 3.5.0
     * @var bool
     */
    public $is_user;
    /**
     * The base menu parent.
     * This is derived from $parent_file by removing the query string and any .php extension.
     * $parent_file values of 'edit.php?post_type=page' and 'edit.php?post_type=post' have a $parent_base of 'edit'.
     *
     * @since 3.3.0
     * @var string
     */
    public $parent_base;
    /**
     * The parent_file for the screen per the admin menu system.
     * Some $parent_file values are 'edit.php?post_type=page', 'edit.php', and 'options-general.php'.
     *
     * @since 3.3.0
     * @var string
     */
    public $parent_file;
    /**
     * The post type associated with the screen, if any.
     * The 'edit.php?post_type=page' screen has a post type of 'page'.
     * The 'edit-tags.php?taxonomy=$taxonomy&post_type=page' screen has a post type of 'page'.
     *
     * @since 3.3.0
     * @var string
     */
    public $post_type;
    /**
     * The taxonomy associated with the screen, if any.
     * The 'edit-tags.php?taxonomy=category' screen has a taxonomy of 'category'.
     * @since 3.3.0
     * @var string
     */
    public $taxonomy;
    /**
     * The help tab data associated with the screen, if any.
     *
     * @since 3.3.0
     * @var array
     */
    private $_help_tabs = array();
    /**
     * The help sidebar data associated with screen, if any.
     *
     * @since 3.3.0
     * @var string
     */
    private $_help_sidebar = '';
    /**
     * The accessible hidden headings and text associated with the screen, if any.
     *
     * @since 4.4.0
     * @var array
     */
    private $_screen_reader_content = array();
    /**
     * Stores old string-based help.
     *
     * @static
     *
     * @var array
     */
    private static $_old_compat_help = array();
    /**
     * The screen options associated with screen, if any.
     *
     * @since 3.3.0
     * @var array
     */
    private $_options = array();
    /**
     * The screen object registry.
     *
     * @since 3.3.0
     *
     * @static
     *
     * @var array
     */
    private static $_registry = array();
    /**
     * Stores the result of the public show_screen_options function.
     *
     * @since 3.3.0
     * @var bool
     */
    private $_show_screen_options;
    /**
     * Stores the 'screen_settings' section of screen options.
     *
     * @since 3.3.0
     * @var string
     */
    private $_screen_settings;
    /**
     * Fetches a screen object.
     *
     * @since 3.3.0
     *
     * @static
     *
     * @global string $hook_suffix
     *
     * @param string|WP_Screen $hook_name Optional. The hook name (also known as the hook suffix) used to determine the screen.
     * 	                                  Defaults to the current $hook_suffix global.
     * @return WP_Screen Screen object.
     */
    public static function get($hook_name = '')
    {
    }
    /**
     * Makes the screen object the current screen.
     *
     * @see set_current_screen()
     * @since 3.3.0
     *
     * @global WP_Screen $current_screen
     * @global string    $taxnow
     * @global string    $typenow
     */
    public function set_current_screen()
    {
    }
    /**
     * Constructor
     *
     * @since 3.3.0
     */
    private function __construct()
    {
    }
    /**
     * Indicates whether the screen is in a particular admin
     *
     * @since 3.5.0
     *
     * @param string $admin The admin to check against (network | user | site).
     *                      If empty any of the three admins will result in true.
     * @return bool True if the screen is in the indicated admin, false otherwise.
     */
    public function in_admin($admin = \null)
    {
    }
    /**
     * Sets the old string-based contextual help for the screen for backward compatibility.
     *
     * @since 3.3.0
     *
     * @static
     *
     * @param WP_Screen $screen A screen object.
     * @param string $help Help text.
     */
    public static function add_old_compat_help($screen, $help)
    {
    }
    /**
     * Set the parent information for the screen.
     * This is called in admin-header.php after the menu parent for the screen has been determined.
     *
     * @since 3.3.0
     *
     * @param string $parent_file The parent file of the screen. Typically the $parent_file global.
     */
    public function set_parentage($parent_file)
    {
    }
    /**
     * Adds an option for the screen.
     * Call this in template files after admin.php is loaded and before admin-header.php is loaded to add screen options.
     *
     * @since 3.3.0
     *
     * @param string $option Option ID
     * @param mixed $args Option-dependent arguments.
     */
    public function add_option($option, $args = array())
    {
    }
    /**
     * Remove an option from the screen.
     *
     * @since 3.8.0
     *
     * @param string $option Option ID.
     */
    public function remove_option($option)
    {
    }
    /**
     * Remove all options from the screen.
     *
     * @since 3.8.0
     */
    public function remove_options()
    {
    }
    /**
     * Get the options registered for the screen.
     *
     * @since 3.8.0
     *
     * @return array Options with arguments.
     */
    public function get_options()
    {
    }
    /**
     * Gets the arguments for an option for the screen.
     *
     * @since 3.3.0
     *
     * @param string $option Option name.
     * @param string $key    Optional. Specific array key for when the option is an array.
     *                       Default false.
     * @return string The option value if set, null otherwise.
     */
    public function get_option($option, $key = \false)
    {
    }
    /**
     * Gets the help tabs registered for the screen.
     *
     * @since 3.4.0
     * @since 4.4.0 Help tabs are ordered by their priority.
     *
     * @return array Help tabs with arguments.
     */
    public function get_help_tabs()
    {
    }
    /**
     * Gets the arguments for a help tab.
     *
     * @since 3.4.0
     *
     * @param string $id Help Tab ID.
     * @return array Help tab arguments.
     */
    public function get_help_tab($id)
    {
    }
    /**
     * Add a help tab to the contextual help for the screen.
     * Call this on the load-$pagenow hook for the relevant screen.
     *
     * @since 3.3.0
     * @since 4.4.0 The `$priority` argument was added.
     *
     * @param array $args {
     *     Array of arguments used to display the help tab.
     *
     *     @type string $title    Title for the tab. Default false.
     *     @type string $id       Tab ID. Must be HTML-safe. Default false.
     *     @type string $content  Optional. Help tab content in plain text or HTML. Default empty string.
     *     @type string $callback Optional. A callback to generate the tab content. Default false.
     *     @type int    $priority Optional. The priority of the tab, used for ordering. Default 10.
     * }
     */
    public function add_help_tab($args)
    {
    }
    /**
     * Removes a help tab from the contextual help for the screen.
     *
     * @since 3.3.0
     *
     * @param string $id The help tab ID.
     */
    public function remove_help_tab($id)
    {
    }
    /**
     * Removes all help tabs from the contextual help for the screen.
     *
     * @since 3.3.0
     */
    public function remove_help_tabs()
    {
    }
    /**
     * Gets the content from a contextual help sidebar.
     *
     * @since 3.4.0
     *
     * @return string Contents of the help sidebar.
     */
    public function get_help_sidebar()
    {
    }
    /**
     * Add a sidebar to the contextual help for the screen.
     * Call this in template files after admin.php is loaded and before admin-header.php is loaded to add a sidebar to the contextual help.
     *
     * @since 3.3.0
     *
     * @param string $content Sidebar content in plain text or HTML.
     */
    public function set_help_sidebar($content)
    {
    }
    /**
     * Gets the number of layout columns the user has selected.
     *
     * The layout_columns option controls the max number and default number of
     * columns. This method returns the number of columns within that range selected
     * by the user via Screen Options. If no selection has been made, the default
     * provisioned in layout_columns is returned. If the screen does not support
     * selecting the number of layout columns, 0 is returned.
     *
     * @since 3.4.0
     *
     * @return int Number of columns to display.
     */
    public function get_columns()
    {
    }
    /**
     * Get the accessible hidden headings and text used in the screen.
     *
     * @since 4.4.0
     *
     * @see set_screen_reader_content() For more information on the array format.
     *
     * @return array An associative array of screen reader text strings.
     */
    public function get_screen_reader_content()
    {
    }
    /**
     * Get a screen reader text string.
     *
     * @since 4.4.0
     *
     * @param string $key Screen reader text array named key.
     * @return string Screen reader text string.
     */
    public function get_screen_reader_text($key)
    {
    }
    /**
     * Add accessible hidden headings and text for the screen.
     *
     * @since 4.4.0
     *
     * @param array $content {
     *     An associative array of screen reader text strings.
     *
     *     @type string $heading_views      Screen reader text for the filter links heading.
     *                                      Default 'Filter items list'.
     *     @type string $heading_pagination Screen reader text for the pagination heading.
     *                                      Default 'Items list navigation'.
     *     @type string $heading_list       Screen reader text for the items list heading.
     *                                      Default 'Items list'.
     * }
     */
    public function set_screen_reader_content($content = array())
    {
    }
    /**
     * Remove all the accessible hidden headings and text for the screen.
     *
     * @since 4.4.0
     */
    public function remove_screen_reader_content()
    {
    }
    /**
     * Render the screen's help section.
     *
     * This will trigger the deprecated filters for backward compatibility.
     *
     * @since 3.3.0
     *
     * @global string $screen_layout_columns
     */
    public function render_screen_meta()
    {
    }
    /**
     *
     * @global array $wp_meta_boxes
     *
     * @return bool
     */
    public function show_screen_options()
    {
    }
    /**
     * Render the screen options tab.
     *
     * @since 3.3.0
     *
     * @param array $options {
     *     @type bool $wrap  Whether the screen-options-wrap div will be included. Defaults to true.
     * }
     */
    public function render_screen_options($options = array())
    {
    }
    /**
     * Render the meta boxes preferences.
     *
     * @since 4.4.0
     *
     * @global array $wp_meta_boxes
     */
    public function render_meta_boxes_preferences()
    {
    }
    /**
     * Render the list table columns preferences.
     *
     * @since 4.4.0
     */
    public function render_list_table_columns_preferences()
    {
    }
    /**
     * Render the option for number of columns on the page
     *
     * @since 3.3.0
     */
    public function render_screen_layout()
    {
    }
    /**
     * Render the items per page option
     *
     * @since 3.3.0
     */
    public function render_per_page_options()
    {
    }
    /**
     * Render the list table view mode preferences.
     *
     * @since 4.4.0
     *
     * @global string $mode List table view mode.
     */
    public function render_view_mode()
    {
    }
    /**
     * Render screen reader text.
     *
     * @since 4.4.0
     *
     * @param string $key The screen reader text array named key.
     * @param string $tag Optional. The HTML tag to wrap the screen reader text. Default h2.
     */
    public function render_screen_reader_content($key = '', $tag = 'h2')
    {
    }
}
/**
 * Administration API: WP_Site_Icon class
 *
 * @package WordPress
 * @subpackage Administration
 * @since 4.3.0
 */
/**
 * Core class used to implement site icon functionality.
 *
 * @since 4.3.0
 */
class WP_Site_Icon
{
    /**
     * The minimum size of the site icon.
     *
     * @since 4.3.0
     * @var int
     */
    public $min_size = 512;
    /**
     * The size to which to crop the image so that we can display it in the UI nicely.
     *
     * @since 4.3.0
     * @var int
     */
    public $page_crop = 512;
    /**
     * List of site icon sizes.
     *
     * @since 4.3.0
     * @var array
     */
    public $site_icon_sizes = array(
        /*
         * Square, medium sized tiles for IE11+.
         *
         * See https://msdn.microsoft.com/library/dn455106(v=vs.85).aspx
         */
        270,
        /*
         * App icon for Android/Chrome.
         *
         * @link https://developers.google.com/web/updates/2014/11/Support-for-theme-color-in-Chrome-39-for-Android
         * @link https://developer.chrome.com/multidevice/android/installtohomescreen
         */
        192,
        /*
         * App icons up to iPhone 6 Plus.
         *
         * See https://developer.apple.com/library/prerelease/ios/documentation/UserExperience/Conceptual/MobileHIG/IconMatrix.html
         */
        180,
        // Our regular Favicon.
        32,
    );
    /**
     * Registers actions and filters.
     *
     * @since 4.3.0
     */
    public function __construct()
    {
    }
    /**
     * Creates an attachment 'object'.
     *
     * @since 4.3.0
     *
     * @param string $cropped              Cropped image URL.
     * @param int    $parent_attachment_id Attachment ID of parent image.
     * @return array Attachment object.
     */
    public function create_attachment_object($cropped, $parent_attachment_id)
    {
    }
    /**
     * Inserts an attachment.
     *
     * @since 4.3.0
     *
     * @param array  $object Attachment object.
     * @param string $file   File path of the attached image.
     * @return int           Attachment ID
     */
    public function insert_attachment($object, $file)
    {
    }
    /**
     * Adds additional sizes to be made when creating the site_icon images.
     *
     * @since 4.3.0
     *
     * @param array $sizes List of additional sizes.
     * @return array Additional image sizes.
     */
    public function additional_sizes($sizes = array())
    {
    }
    /**
     * Adds Site Icon sizes to the array of image sizes on demand.
     *
     * @since 4.3.0
     *
     * @param array $sizes List of image sizes.
     * @return array List of intermediate image sizes.
     */
    public function intermediate_image_sizes($sizes = array())
    {
    }
    /**
     * Deletes the Site Icon when the image file is deleted.
     *
     * @since 4.3.0
     *
     * @param int $post_id Attachment ID.
     */
    public function delete_attachment_data($post_id)
    {
    }
    /**
     * Adds custom image sizes when meta data for an image is requested, that happens to be used as Site Icon.
     *
     * @since 4.3.0
     *
     * @param null|array|string $value    The value get_metadata() should return a single metadata value, or an
     *                                    array of values.
     * @param int               $post_id  Post ID.
     * @param string            $meta_key Meta key.
     * @param string|array      $single   Meta value, or an array of values.
     * @return array|null|string The attachment metadata value, array of values, or null.
     */
    public function get_post_metadata($value, $post_id, $meta_key, $single)
    {
    }
}
/**
 * List Table API: WP_Terms_List_Table class
 *
 * @package WordPress
 * @subpackage Administration
 * @since 3.1.0
 */
/**
 * Core class used to implement displaying terms in a list table.
 *
 * @since 3.1.0
 * @access private
 *
 * @see WP_List_Table
 */
class WP_Terms_List_Table extends \WP_List_Table
{
    public $callback_args;
    private $level;
    /**
     * Constructor.
     *
     * @since 3.1.0
     *
     * @see WP_List_Table::__construct() for more information on default arguments.
     *
     * @global string $post_type
     * @global string $taxonomy
     * @global string $action
     * @global object $tax
     *
     * @param array $args An associative array of arguments.
     */
    public function __construct($args = array())
    {
    }
    /**
     *
     * @return bool
     */
    public function ajax_user_can()
    {
    }
    /**
     */
    public function prepare_items()
    {
    }
    /**
     *
     * @return bool
     */
    public function has_items()
    {
    }
    /**
     */
    public function no_items()
    {
    }
    /**
     *
     * @return array
     */
    protected function get_bulk_actions()
    {
    }
    /**
     *
     * @return string
     */
    public function current_action()
    {
    }
    /**
     *
     * @return array
     */
    public function get_columns()
    {
    }
    /**
     *
     * @return array
     */
    protected function get_sortable_columns()
    {
    }
    /**
     */
    public function display_rows_or_placeholder()
    {
    }
    /**
     * @param string $taxonomy
     * @param array $terms
     * @param array $children
     * @param int   $start
     * @param int   $per_page
     * @param int   $count
     * @param int   $parent
     * @param int   $level
     */
    private function _rows($taxonomy, $terms, &$children, $start, $per_page, &$count, $parent = 0, $level = 0)
    {
    }
    /**
     * @global string $taxonomy
     * @param WP_Term $tag Term object.
     * @param int $level
     */
    public function single_row($tag, $level = 0)
    {
    }
    /**
     * @param WP_Term $tag Term object.
     * @return string
     */
    public function column_cb($tag)
    {
    }
    /**
     * @param WP_Term $tag Term object.
     * @return string
     */
    public function column_name($tag)
    {
    }
    /**
     * Gets the name of the default primary column.
     *
     * @since 4.3.0
     *
     * @return string Name of the default primary column, in this case, 'name'.
     */
    protected function get_default_primary_column_name()
    {
    }
    /**
     * Generates and displays row action links.
     *
     * @since 4.3.0
     *
     * @param WP_Term $tag         Tag being acted upon.
     * @param string  $column_name Current column name.
     * @param string  $primary     Primary column name.
     * @return string Row actions output for terms.
     */
    protected function handle_row_actions($tag, $column_name, $primary)
    {
    }
    /**
     * @param WP_Term $tag Term object.
     * @return string
     */
    public function column_description($tag)
    {
    }
    /**
     * @param WP_Term $tag Term object.
     * @return string
     */
    public function column_slug($tag)
    {
    }
    /**
     * @param WP_Term $tag Term object.
     * @return string
     */
    public function column_posts($tag)
    {
    }
    /**
     * @param WP_Term $tag Term object.
     * @return string
     */
    public function column_links($tag)
    {
    }
    /**
     * @param WP_Term $tag Term object.
     * @param string $column_name
     * @return string
     */
    public function column_default($tag, $column_name)
    {
    }
    /**
     * Outputs the hidden row displayed when inline editing
     *
     * @since 3.1.0
     */
    public function inline_edit()
    {
    }
}
/**
 * List Table API: WP_Themes_List_Table class
 *
 * @package WordPress
 * @subpackage Administration
 * @since 3.1.0
 */
/**
 * Core class used to implement displaying installed themes in a list table.
 *
 * @since 3.1.0
 * @access private
 *
 * @see WP_List_Table
 */
class WP_Themes_List_Table extends \WP_List_Table
{
    protected $search_terms = array();
    public $features = array();
    /**
     * Constructor.
     *
     * @since 3.1.0
     *
     * @see WP_List_Table::__construct() for more information on default arguments.
     *
     * @param array $args An associative array of arguments.
     */
    public function __construct($args = array())
    {
    }
    /**
     *
     * @return bool
     */
    public function ajax_user_can()
    {
    }
    /**
     */
    public function prepare_items()
    {
    }
    /**
     */
    public function no_items()
    {
    }
    /**
     * @param string $which
     */
    public function tablenav($which = 'top')
    {
    }
    /**
     */
    public function display()
    {
    }
    /**
     *
     * @return array
     */
    public function get_columns()
    {
    }
    /**
     */
    public function display_rows_or_placeholder()
    {
    }
    /**
     */
    public function display_rows()
    {
    }
    /**
     * @param WP_Theme $theme
     * @return bool
     */
    public function search_theme($theme)
    {
    }
    /**
     * Send required variables to JavaScript land
     *
     * @since 3.4.0
     *
     * @param array $extra_args
     */
    public function _js_vars($extra_args = array())
    {
    }
}
/**
 * List Table API: WP_Theme_Install_List_Table class
 *
 * @package WordPress
 * @subpackage Administration
 * @since 3.1.0
 */
/**
 * Core class used to implement displaying themes to install in a list table.
 *
 * @since 3.1.0
 * @access private
 *
 * @see WP_Themes_List_Table
 */
class WP_Theme_Install_List_Table extends \WP_Themes_List_Table
{
    public $features = array();
    /**
     *
     * @return bool
     */
    public function ajax_user_can()
    {
    }
    /**
     *
     * @global array  $tabs
     * @global string $tab
     * @global int    $paged
     * @global string $type
     * @global array  $theme_field_defaults
     */
    public function prepare_items()
    {
    }
    /**
     */
    public function no_items()
    {
    }
    /**
     *
     * @global array $tabs
     * @global string $tab
     * @return array
     */
    protected function get_views()
    {
    }
    /**
     */
    public function display()
    {
    }
    /**
     */
    public function display_rows()
    {
    }
    /**
     * Prints a theme from the WordPress.org API.
     *
     * @since 3.1.0
     *
     * @global array $themes_allowedtags
     *
     * @param object $theme {
     *     An object that contains theme data returned by the WordPress.org API.
     *
     *     @type string $name           Theme name, e.g. 'Twenty Seventeen'.
     *     @type string $slug           Theme slug, e.g. 'twentyseventeen'.
     *     @type string $version        Theme version, e.g. '1.1'.
     *     @type string $author         Theme author username, e.g. 'melchoyce'.
     *     @type string $preview_url    Preview URL, e.g. 'http://2017.wordpress.net/'.
     *     @type string $screenshot_url Screenshot URL, e.g. 'https://wordpress.org/themes/twentyseventeen/'.
     *     @type float  $rating         Rating score.
     *     @type int    $num_ratings    The number of ratings.
     *     @type string $homepage       Theme homepage, e.g. 'https://wordpress.org/themes/twentyseventeen/'.
     *     @type string $description    Theme description.
     *     @type string $download_link  Theme ZIP download URL.
     * }
     */
    public function single_row($theme)
    {
    }
    /**
     * Prints the wrapper for the theme installer.
     */
    public function theme_installer()
    {
    }
    /**
     * Prints the wrapper for the theme installer with a provided theme's data.
     * Used to make the theme installer work for no-js.
     *
     * @param object $theme - A WordPress.org Theme API object.
     */
    public function theme_installer_single($theme)
    {
    }
    /**
     * Prints the info for a theme (to be used in the theme installer modal).
     *
     * @global array $themes_allowedtags
     *
     * @param object $theme - A WordPress.org Theme API object.
     */
    public function install_theme_info($theme)
    {
    }
    /**
     * Send required variables to JavaScript land
     *
     * @since 3.4.0
     *
     * @global string $tab  Current tab within Themes->Install screen
     * @global string $type Type of search.
     *
     * @param array $extra_args Unused.
     */
    public function _js_vars($extra_args = array())
    {
    }
    /**
     * Check to see if the theme is already installed.
     *
     * @since 3.4.0
     *
     * @param object $theme - A WordPress.org Theme API object.
     * @return string Theme status.
     */
    private function _get_theme_status($theme)
    {
    }
}
/**
 * List Table API: WP_Users_List_Table class
 *
 * @package WordPress
 * @subpackage Administration
 * @since 3.1.0
 */
/**
 * Core class used to implement displaying users in a list table.
 *
 * @since 3.1.0
 * @access private
 *
 * @see WP_List_Table
 */
class WP_Users_List_Table extends \WP_List_Table
{
    /**
     * Site ID to generate the Users list table for.
     *
     * @since 3.1.0
     * @var int
     */
    public $site_id;
    /**
     * Whether or not the current Users list table is for Multisite.
     *
     * @since 3.1.0
     * @var bool
     */
    public $is_site_users;
    /**
     * Constructor.
     *
     * @since 3.1.0
     *
     * @see WP_List_Table::__construct() for more information on default arguments.
     *
     * @param array $args An associative array of arguments.
     */
    public function __construct($args = array())
    {
    }
    /**
     * Check the current user's permissions.
     *
     * @since 3.1.0
     *
     * @return bool
     */
    public function ajax_user_can()
    {
    }
    /**
     * Prepare the users list for display.
     *
     * @since 3.1.0
     *
     * @global string $role
     * @global string $usersearch
     */
    public function prepare_items()
    {
    }
    /**
     * Output 'no users' message.
     *
     * @since 3.1.0
     */
    public function no_items()
    {
    }
    /**
     * Return an associative array listing all the views that can be used
     * with this table.
     *
     * Provides a list of roles and user count for that role for easy
     * Filtersing of the user table.
     *
     * @since  3.1.0
     *
     * @global string $role
     *
     * @return array An array of HTML links, one for each view.
     */
    protected function get_views()
    {
    }
    /**
     * Retrieve an associative array of bulk actions available on this table.
     *
     * @since  3.1.0
     *
     * @return array Array of bulk actions.
     */
    protected function get_bulk_actions()
    {
    }
    /**
     * Output the controls to allow user roles to be changed in bulk.
     *
     * @since 3.1.0
     *
     * @param string $which Whether this is being invoked above ("top")
     *                      or below the table ("bottom").
     */
    protected function extra_tablenav($which)
    {
    }
    /**
     * Capture the bulk action required, and return it.
     *
     * Overridden from the base class implementation to capture
     * the role change drop-down.
     *
     * @since  3.1.0
     *
     * @return string The bulk action required.
     */
    public function current_action()
    {
    }
    /**
     * Get a list of columns for the list table.
     *
     * @since  3.1.0
     *
     * @return array Array in which the key is the ID of the column,
     *               and the value is the description.
     */
    public function get_columns()
    {
    }
    /**
     * Get a list of sortable columns for the list table.
     *
     * @since 3.1.0
     *
     * @return array Array of sortable columns.
     */
    protected function get_sortable_columns()
    {
    }
    /**
     * Generate the list table rows.
     *
     * @since 3.1.0
     */
    public function display_rows()
    {
    }
    /**
     * Generate HTML for a single row on the users.php admin panel.
     *
     * @since 3.1.0
     * @since 4.2.0 The `$style` parameter was deprecated.
     * @since 4.4.0 The `$role` parameter was deprecated.
     *
     * @param WP_User $user_object The current user object.
     * @param string  $style       Deprecated. Not used.
     * @param string  $role        Deprecated. Not used.
     * @param int     $numposts    Optional. Post count to display for this user. Defaults
     *                             to zero, as in, a new user has made zero posts.
     * @return string Output for a single row.
     */
    public function single_row($user_object, $style = '', $role = '', $numposts = 0)
    {
    }
    /**
     * Gets the name of the default primary column.
     *
     * @since 4.3.0
     *
     * @return string Name of the default primary column, in this case, 'username'.
     */
    protected function get_default_primary_column_name()
    {
    }
    /**
     * Returns an array of user roles for a given user object.
     *
     * @since 4.4.0
     *
     * @param WP_User $user_object The WP_User object.
     * @return array An array of user roles.
     */
    protected function get_role_list($user_object)
    {
    }
}
/**
 * WordPress User Search class.
 *
 * @since 2.1.0
 * @deprecated 3.1.0 Use WP_User_Query
 */
class WP_User_Search
{
    /**
     * {@internal Missing Description}}
     *
     * @since 2.1.0
     * @access private
     * @var mixed
     */
    var $results;
    /**
     * {@internal Missing Description}}
     *
     * @since 2.1.0
     * @access private
     * @var string
     */
    var $search_term;
    /**
     * Page number.
     *
     * @since 2.1.0
     * @access private
     * @var int
     */
    var $page;
    /**
     * Role name that users have.
     *
     * @since 2.5.0
     * @access private
     * @var string
     */
    var $role;
    /**
     * Raw page number.
     *
     * @since 2.1.0
     * @access private
     * @var int|bool
     */
    var $raw_page;
    /**
     * Amount of users to display per page.
     *
     * @since 2.1.0
     * @access public
     * @var int
     */
    var $users_per_page = 50;
    /**
     * {@internal Missing Description}}
     *
     * @since 2.1.0
     * @access private
     * @var int
     */
    var $first_user;
    /**
     * {@internal Missing Description}}
     *
     * @since 2.1.0
     * @access private
     * @var int
     */
    var $last_user;
    /**
     * {@internal Missing Description}}
     *
     * @since 2.1.0
     * @access private
     * @var string
     */
    var $query_limit;
    /**
     * {@internal Missing Description}}
     *
     * @since 3.0.0
     * @access private
     * @var string
     */
    var $query_orderby;
    /**
     * {@internal Missing Description}}
     *
     * @since 3.0.0
     * @access private
     * @var string
     */
    var $query_from;
    /**
     * {@internal Missing Description}}
     *
     * @since 3.0.0
     * @access private
     * @var string
     */
    var $query_where;
    /**
     * {@internal Missing Description}}
     *
     * @since 2.1.0
     * @access private
     * @var int
     */
    var $total_users_for_query = 0;
    /**
     * {@internal Missing Description}}
     *
     * @since 2.1.0
     * @access private
     * @var bool
     */
    var $too_many_total_users = \false;
    /**
     * {@internal Missing Description}}
     *
     * @since 2.1.0
     * @access private
     * @var WP_Error
     */
    var $search_errors;
    /**
     * {@internal Missing Description}}
     *
     * @since 2.7.0
     * @access private
     * @var string
     */
    var $paging_text;
    /**
     * PHP5 Constructor - Sets up the object properties.
     *
     * @since 2.1.0
     *
     * @param string $search_term Search terms string.
     * @param int $page Optional. Page ID.
     * @param string $role Role name.
     * @return WP_User_Search
     */
    function __construct($search_term = '', $page = '', $role = '')
    {
    }
    /**
     * PHP4 Constructor - Sets up the object properties.
     *
     * @since 2.1.0
     *
     * @param string $search_term Search terms string.
     * @param int $page Optional. Page ID.
     * @param string $role Role name.
     * @return WP_User_Search
     */
    public function WP_User_Search($search_term = '', $page = '', $role = '')
    {
    }
    /**
     * Prepares the user search query (legacy).
     *
     * @since 2.1.0
     * @access public
     */
    public function prepare_query()
    {
    }
    /**
     * Executes the user search query.
     *
     * @since 2.1.0
     * @access public
     */
    public function query()
    {
    }
    /**
     * Prepares variables for use in templates.
     *
     * @since 2.1.0
     * @access public
     */
    function prepare_vars_for_template_usage()
    {
    }
    /**
     * Handles paging for the user search query.
     *
     * @since 2.1.0
     * @access public
     */
    public function do_paging()
    {
    }
    /**
     * Retrieves the user search query results.
     *
     * @since 2.1.0
     * @access public
     *
     * @return array
     */
    public function get_results()
    {
    }
    /**
     * Displaying paging text.
     *
     * @see do_paging() Builds paging text.
     *
     * @since 2.1.0
     * @access public
     */
    function page_links()
    {
    }
    /**
     * Whether paging is enabled.
     *
     * @see do_paging() Builds paging text.
     *
     * @since 2.1.0
     * @access public
     *
     * @return bool
     */
    function results_are_paged()
    {
    }
    /**
     * Whether there are search terms.
     *
     * @since 2.1.0
     * @access public
     *
     * @return bool
     */
    function is_search()
    {
    }
}
/**
 * WP_Privacy_Policy_Content class.
 * TODO: move this to a new file.
 *
 * @since 4.9.6
 */
final class WP_Privacy_Policy_Content
{
    private static $policy_content = array();
    /**
     * Constructor
     *
     * @since 4.9.6
     */
    private function __construct()
    {
    }
    /**
     * Add content to the postbox shown when editing the privacy policy.
     *
     * Plugins and themes should suggest text for inclusion in the site's privacy policy.
     * The suggested text should contain information about any functionality that affects user privacy,
     * and will be shown in the Suggested Privacy Policy Content postbox.
     *
     * Intended for use from `wp_add_privacy_policy_content()`.
     *
     * @since 4.9.6
     *
     * @param string $plugin_name The name of the plugin or theme that is suggesting content for the site's privacy policy.
     * @param string $policy_text The suggested content for inclusion in the policy.
     */
    public static function add($plugin_name, $policy_text)
    {
    }
    /**
     * Quick check if any privacy info has changed.
     *
     * @since 4.9.6
     */
    public static function text_change_check()
    {
    }
    /**
     * Output a warning when some privacy info has changed.
     *
     * @since 4.9.6
     */
    public static function policy_text_changed_notice()
    {
    }
    /**
     * Update the cached policy info when the policy page is updated.
     *
     * @since 4.9.6
     * @access private
     */
    public static function _policy_page_updated($post_id)
    {
    }
    /**
     * Check for updated, added or removed privacy policy information from plugins.
     *
     * Caches the current info in post_meta of the policy page.
     *
     * @since 4.9.6
     *
     * @return array The privacy policy text/informtion added by core and plugins.
     */
    public static function get_suggested_policy_text()
    {
    }
    /**
     * Add a notice with a link to the guide when editing the privacy policy page.
     *
     * @since 4.9.6
     *
     * @param WP_Post $post The currently edited post.
     */
    public static function notice($post)
    {
    }
    /**
     * Output the privacy policy guide together with content from the theme and plugins.
     *
     * @since 4.9.6
     */
    public static function privacy_policy_guide()
    {
    }
    /**
     * Return the default suggested privacy policy content.
     *
     * @since 4.9.6
     *
     * @param bool $descr Whether to include the descriptions under the section headings. Default false.
     * @return string The default policy content.
     */
    public static function get_default_content($descr = \false)
    {
    }
    /**
     * Add the suggested privacy policy text to the policy postbox.
     *
     * @since 4.9.6
     */
    public static function add_suggested_content()
    {
    }
}
/**
 * WP_Privacy_Requests_Table class.
 *
 * @since 4.9.6
 */
abstract class WP_Privacy_Requests_Table extends \WP_List_Table
{
    /**
     * Action name for the requests this table will work with. Classes
     * which inherit from WP_Privacy_Requests_Table should define this.
     *
     * Example: 'export_personal_data'.
     *
     * @since 4.9.6
     *
     * @var string $request_type Name of action.
     */
    protected $request_type = 'INVALID';
    /**
     * Post type to be used.
     *
     * @since 4.9.6
     *
     * @var string $post_type The post type.
     */
    protected $post_type = 'INVALID';
    /**
     * Get columns to show in the list table.
     *
     * @since 4.9.6
     *
     * @return array Array of columns.
     */
    public function get_columns()
    {
    }
    /**
     * Get a list of sortable columns.
     *
     * @since 4.9.6
     *
     * @return array Default sortable columns.
     */
    protected function get_sortable_columns()
    {
    }
    /**
     * Default primary column.
     *
     * @since 4.9.6
     *
     * @return string Default primary column name.
     */
    protected function get_default_primary_column_name()
    {
    }
    /**
     * Count number of requests for each status.
     *
     * @since 4.9.6
     *
     * @return object Number of posts for each status.
     */
    protected function get_request_counts()
    {
    }
    /**
     * Get an associative array ( id => link ) with the list of views available on this table.
     *
     * @since 4.9.6
     *
     * @return array Associative array of views in the format of $view_name => $view_markup.
     */
    protected function get_views()
    {
    }
    /**
     * Get bulk actions.
     *
     * @since 4.9.6
     *
     * @return array List of bulk actions.
     */
    protected function get_bulk_actions()
    {
    }
    /**
     * Process bulk actions.
     *
     * @since 4.9.6
     */
    public function process_bulk_action()
    {
    }
    /**
     * Prepare items to output.
     *
     * @since 4.9.6
     */
    public function prepare_items()
    {
    }
    /**
     * Checkbox column.
     *
     * @since 4.9.6
     *
     * @param WP_User_Request $item Item being shown.
     * @return string Checkbox column markup.
     */
    public function column_cb($item)
    {
    }
    /**
     * Status column.
     *
     * @since 4.9.6
     *
     * @param WP_User_Request $item Item being shown.
     * @return string Status column markup.
     */
    public function column_status($item)
    {
    }
    /**
     * Convert timestamp for display.
     *
     * @since 4.9.6
     *
     * @param int $timestamp Event timestamp.
     * @return string Human readable date.
     */
    protected function get_timestamp_as_date($timestamp)
    {
    }
    /**
     * Default column handler.
     *
     * @since 4.9.6
     *
     * @param WP_User_Request $item        Item being shown.
     * @param string          $column_name Name of column being shown.
     * @return string Default column output.
     */
    public function column_default($item, $column_name)
    {
    }
    /**
     * Actions column. Overridden by children.
     *
     * @since 4.9.6
     *
     * @param WP_User_Request $item Item being shown.
     * @return string Email column markup.
     */
    public function column_email($item)
    {
    }
    /**
     * Next steps column. Overridden by children.
     *
     * @since 4.9.6
     *
     * @param WP_User_Request $item Item being shown.
     */
    public function column_next_steps($item)
    {
    }
    /**
     * Generates content for a single row of the table,
     *
     * @since 4.9.6
     *
     * @param WP_User_Request $item The current item.
     */
    public function single_row($item)
    {
    }
    /**
     * Embed scripts used to perform actions. Overridden by children.
     *
     * @since 4.9.6
     */
    public function embed_scripts()
    {
    }
}
/**
 * WP_Privacy_Data_Export_Requests_Table class.
 *
 * @since 4.9.6
 */
class WP_Privacy_Data_Export_Requests_Table extends \WP_Privacy_Requests_Table
{
    /**
     * Action name for the requests this table will work with.
     *
     * @since 4.9.6
     *
     * @var string $request_type Name of action.
     */
    protected $request_type = 'export_personal_data';
    /**
     * Post type for the requests.
     *
     * @since 4.9.6
     *
     * @var string $post_type The post type.
     */
    protected $post_type = 'user_request';
    /**
     * Actions column.
     *
     * @since 4.9.6
     *
     * @param WP_User_Request $item Item being shown.
     * @return string Email column markup.
     */
    public function column_email($item)
    {
    }
    /**
     * Displays the next steps column.
     *
     * @since 4.9.6
     *
     * @param WP_User_Request $item Item being shown.
     */
    public function column_next_steps($item)
    {
    }
}
/**
 * WP_Privacy_Data_Removal_Requests_Table class.
 *
 * @since 4.9.6
 */
class WP_Privacy_Data_Removal_Requests_Table extends \WP_Privacy_Requests_Table
{
    /**
     * Action name for the requests this table will work with.
     *
     * @since 4.9.6
     *
     * @var string $request_type Name of action.
     */
    protected $request_type = 'remove_personal_data';
    /**
     * Post type for the requests.
     *
     * @since 4.9.6
     *
     * @var string $post_type The post type.
     */
    protected $post_type = 'user_request';
    /**
     * Actions column.
     *
     * @since 4.9.6
     *
     * @param WP_User_Request $item Item being shown.
     * @return string Email column markup.
     */
    public function column_email($item)
    {
    }
    /**
     * Next steps column.
     *
     * @since 4.9.6
     *
     * @param WP_User_Request $item Item being shown.
     */
    public function column_next_steps($item)
    {
    }
}
/////////////////////////////////////////////////////////////////
/// getID3() by James Heinrich <info@getid3.org>               //
//  available at http://getid3.sourceforge.net                 //
//            or http://www.getid3.org                         //
//          also https://github.com/JamesHeinrich/getID3       //
/////////////////////////////////////////////////////////////////
//                                                             //
// getid3.lib.php - part of getID3()                           //
// See readme.txt for more details                             //
//                                                            ///
/////////////////////////////////////////////////////////////////
class getid3_lib
{
    public static function PrintHexBytes($string, $hex = \true, $spaces = \true, $htmlencoding = 'UTF-8')
    {
    }
    public static function trunc($floatnumber)
    {
    }
    public static function safe_inc(&$variable, $increment = 1)
    {
    }
    public static function CastAsInt($floatnum)
    {
    }
    public static function intValueSupported($num)
    {
    }
    public static function DecimalizeFraction($fraction)
    {
    }
    public static function DecimalBinary2Float($binarynumerator)
    {
    }
    public static function NormalizeBinaryPoint($binarypointnumber, $maxbits = 52)
    {
    }
    public static function Float2BinaryDecimal($floatvalue)
    {
    }
    public static function Float2String($floatvalue, $bits)
    {
    }
    public static function LittleEndian2Float($byteword)
    {
    }
    public static function BigEndian2Float($byteword)
    {
    }
    public static function BigEndian2Int($byteword, $synchsafe = \false, $signed = \false)
    {
    }
    public static function LittleEndian2Int($byteword, $signed = \false)
    {
    }
    public static function LittleEndian2Bin($byteword)
    {
    }
    public static function BigEndian2Bin($byteword)
    {
    }
    public static function BigEndian2String($number, $minbytes = 1, $synchsafe = \false, $signed = \false)
    {
    }
    public static function Dec2Bin($number)
    {
    }
    public static function Bin2Dec($binstring, $signed = \false)
    {
    }
    public static function Bin2String($binstring)
    {
    }
    public static function LittleEndian2String($number, $minbytes = 1, $synchsafe = \false)
    {
    }
    public static function array_merge_clobber($array1, $array2)
    {
    }
    public static function array_merge_noclobber($array1, $array2)
    {
    }
    public static function flipped_array_merge_noclobber($array1, $array2)
    {
    }
    public static function ksort_recursive(&$theArray)
    {
    }
    public static function fileextension($filename, $numextensions = 1)
    {
    }
    public static function PlaytimeString($seconds)
    {
    }
    public static function DateMac2Unix($macdate)
    {
    }
    public static function FixedPoint8_8($rawdata)
    {
    }
    public static function FixedPoint16_16($rawdata)
    {
    }
    public static function FixedPoint2_30($rawdata)
    {
    }
    public static function CreateDeepArray($ArrayPath, $Separator, $Value)
    {
    }
    public static function array_max($arraydata, $returnkey = \false)
    {
    }
    public static function array_min($arraydata, $returnkey = \false)
    {
    }
    public static function XML2array($XMLstring)
    {
    }
    public static function SimpleXMLelement2array($XMLobject)
    {
    }
    // Allan Hansen <ahØartemis*dk>
    // self::md5_data() - returns md5sum for a file from startuing position to absolute end position
    public static function hash_data($file, $offset, $end, $algorithm)
    {
    }
    public static function CopyFileParts($filename_source, $filename_dest, $offset, $length)
    {
    }
    public static function iconv_fallback_int_utf8($charval)
    {
    }
    // ISO-8859-1 => UTF-8
    public static function iconv_fallback_iso88591_utf8($string, $bom = \false)
    {
    }
    // ISO-8859-1 => UTF-16BE
    public static function iconv_fallback_iso88591_utf16be($string, $bom = \false)
    {
    }
    // ISO-8859-1 => UTF-16LE
    public static function iconv_fallback_iso88591_utf16le($string, $bom = \false)
    {
    }
    // ISO-8859-1 => UTF-16LE (BOM)
    public static function iconv_fallback_iso88591_utf16($string)
    {
    }
    // UTF-8 => ISO-8859-1
    public static function iconv_fallback_utf8_iso88591($string)
    {
    }
    // UTF-8 => UTF-16BE
    public static function iconv_fallback_utf8_utf16be($string, $bom = \false)
    {
    }
    // UTF-8 => UTF-16LE
    public static function iconv_fallback_utf8_utf16le($string, $bom = \false)
    {
    }
    // UTF-8 => UTF-16LE (BOM)
    public static function iconv_fallback_utf8_utf16($string)
    {
    }
    // UTF-16BE => UTF-8
    public static function iconv_fallback_utf16be_utf8($string)
    {
    }
    // UTF-16LE => UTF-8
    public static function iconv_fallback_utf16le_utf8($string)
    {
    }
    // UTF-16BE => ISO-8859-1
    public static function iconv_fallback_utf16be_iso88591($string)
    {
    }
    // UTF-16LE => ISO-8859-1
    public static function iconv_fallback_utf16le_iso88591($string)
    {
    }
    // UTF-16 (BOM) => ISO-8859-1
    public static function iconv_fallback_utf16_iso88591($string)
    {
    }
    // UTF-16 (BOM) => UTF-8
    public static function iconv_fallback_utf16_utf8($string)
    {
    }
    public static function iconv_fallback($in_charset, $out_charset, $string)
    {
    }
    public static function recursiveMultiByteCharString2HTML($data, $charset = 'ISO-8859-1')
    {
    }
    public static function MultiByteCharString2HTML($string, $charset = 'ISO-8859-1')
    {
    }
    public static function RGADnameLookup($namecode)
    {
    }
    public static function RGADoriginatorLookup($originatorcode)
    {
    }
    public static function RGADadjustmentLookup($rawadjustment, $signbit)
    {
    }
    public static function RGADgainString($namecode, $originatorcode, $replaygain)
    {
    }
    public static function RGADamplitude2dB($amplitude)
    {
    }
    public static function GetDataImageSize($imgData, &$imageinfo = array())
    {
    }
    public static function ImageExtFromMime($mime_type)
    {
    }
    public static function ImageTypesLookup($imagetypeid)
    {
    }
    public static function CopyTagsToComments(&$ThisFileInfo)
    {
    }
    public static function EmbeddedLookup($key, $begin, $end, $file, $name)
    {
    }
    public static function IncludeDependency($filename, $sourcefile, $DieOnFailure = \false)
    {
    }
    public static function trimNullByte($string)
    {
    }
    public static function getFileSizeSyscall($path)
    {
    }
    /**
     * Workaround for Bug #37268 (https://bugs.php.net/bug.php?id=37268)
     * @param string $path A path.
     * @param string $suffix If the name component ends in suffix this will also be cut off.
     * @return string
     */
    public static function mb_basename($path, $suffix = \null)
    {
    }
}
// End: Defines
class getID3
{
    // public: Settings
    public $encoding = 'UTF-8';
    // CASE SENSITIVE! - i.e. (must be supported by iconv()). Examples:  ISO-8859-1  UTF-8  UTF-16  UTF-16BE
    public $encoding_id3v1 = 'ISO-8859-1';
    // Should always be 'ISO-8859-1', but some tags may be written in other encodings such as 'EUC-CN' or 'CP1252'
    // public: Optional tag checks - disable for speed.
    public $option_tag_id3v1 = \true;
    // Read and process ID3v1 tags
    public $option_tag_id3v2 = \true;
    // Read and process ID3v2 tags
    public $option_tag_lyrics3 = \true;
    // Read and process Lyrics3 tags
    public $option_tag_apetag = \true;
    // Read and process APE tags
    public $option_tags_process = \true;
    // Copy tags to root key 'tags' and encode to $this->encoding
    public $option_tags_html = \true;
    // Copy tags to root key 'tags_html' properly translated from various encodings to HTML entities
    // public: Optional tag/comment calucations
    public $option_extra_info = \true;
    // Calculate additional info such as bitrate, channelmode etc
    // public: Optional handling of embedded attachments (e.g. images)
    public $option_save_attachments = \true;
    // defaults to true (ATTACHMENTS_INLINE) for backward compatibility
    // public: Optional calculations
    public $option_md5_data = \false;
    // Get MD5 sum of data part - slow
    public $option_md5_data_source = \false;
    // Use MD5 of source file if availble - only FLAC and OptimFROG
    public $option_sha1_data = \false;
    // Get SHA1 sum of data part - slow
    public $option_max_2gb_check = \null;
    // Check whether file is larger than 2GB and thus not supported by 32-bit PHP (null: auto-detect based on PHP_INT_MAX)
    // public: Read buffer size in bytes
    public $option_fread_buffer_size = 32768;
    // Public variables
    public $filename;
    // Filename of file being analysed.
    public $fp;
    // Filepointer to file being analysed.
    public $info;
    // Result array.
    public $tempdir = \GETID3_TEMP_DIR;
    public $memory_limit = 0;
    // Protected variables
    protected $startup_error = '';
    protected $startup_warning = '';
    const VERSION = '1.9.14-201706111222';
    const FREAD_BUFFER_SIZE = 32768;
    const ATTACHMENTS_NONE = \false;
    const ATTACHMENTS_INLINE = \true;
    // public: constructor
    public function __construct()
    {
    }
    public function version()
    {
    }
    public function fread_buffer_size()
    {
    }
    // public: setOption
    public function setOption($optArray)
    {
    }
    public function openfile($filename, $filesize = \null)
    {
    }
    // public: analyze file
    public function analyze($filename, $filesize = \null, $original_filename = '')
    {
    }
    // private: error handling
    public function error($message)
    {
    }
    // private: warning handling
    public function warning($message)
    {
    }
    // private: CleanUp
    private function CleanUp()
    {
    }
    // return array containing information about all supported formats
    public function GetFileFormatArray()
    {
    }
    public function GetFileFormat(&$filedata, $filename = '')
    {
    }
    // converts array to $encoding charset from $this->encoding
    public function CharConvert(&$array, $encoding)
    {
    }
    public function HandleAllTags()
    {
    }
    public function getHashdata($algorithm)
    {
    }
    public function ChannelsBitratePlaytimeCalculations()
    {
    }
    public function CalculateCompressionRatioVideo()
    {
    }
    public function CalculateCompressionRatioAudio()
    {
    }
    public function CalculateReplayGain()
    {
    }
    public function ProcessAudioStreams()
    {
    }
    public function getid3_tempnam()
    {
    }
    public function include_module($name)
    {
    }
    public static function is_writable($filename)
    {
    }
}
abstract class getid3_handler
{
    /**
     * @var getID3
     */
    protected $getid3;
    // pointer
    protected $data_string_flag = \false;
    // analyzing filepointer or string
    protected $data_string = '';
    // string to analyze
    protected $data_string_position = 0;
    // seek position in string
    protected $data_string_length = 0;
    // string length
    private $dependency_to = \null;
    public function __construct(\getID3 $getid3, $call_module = \null)
    {
    }
    // Analyze from file pointer
    public abstract function Analyze();
    // Analyze from string instead
    public function AnalyzeString($string)
    {
    }
    public function setStringMode($string)
    {
    }
    protected function ftell()
    {
    }
    protected function fread($bytes)
    {
    }
    protected function fseek($bytes, $whence = \SEEK_SET)
    {
    }
    protected function feof()
    {
    }
    protected final function isDependencyFor($module)
    {
    }
    protected function error($text)
    {
    }
    protected function warning($text)
    {
    }
    protected function notice($text)
    {
    }
    public function saveAttachment($name, $offset, $length, $image_mime = \null)
    {
    }
}
class getid3_exception extends \Exception
{
    public $message;
}
class getid3_asf extends \getid3_handler
{
    public function __construct(\getID3 $getid3)
    {
    }
    public function Analyze()
    {
    }
    public static function codecListObjectTypeLookup($CodecListType)
    {
    }
    public static function KnownGUIDs()
    {
    }
    public static function GUIDname($GUIDstring)
    {
    }
    public static function ASFIndexObjectIndexTypeLookup($id)
    {
    }
    public static function GUIDtoBytestring($GUIDstring)
    {
    }
    public static function BytestringToGUID($Bytestring)
    {
    }
    public static function FILETIMEtoUNIXtime($FILETIME, $round = \true)
    {
    }
    public static function WMpictureTypeLookup($WMpictureType)
    {
    }
    public function HeaderExtensionObjectDataParse(&$asf_header_extension_object_data, &$unhandled_sections)
    {
    }
    public static function metadataLibraryObjectDataTypeLookup($id)
    {
    }
    public function ASF_WMpicture(&$data)
    {
    }
    // Remove terminator 00 00 and convert UTF-16LE to Latin-1
    public static function TrimConvert($string)
    {
    }
    // Remove terminator 00 00
    public static function TrimTerm($string)
    {
    }
}
class getid3_flv extends \getid3_handler
{
    const magic = 'FLV';
    public $max_frames = 100000;
    // break out of the loop if too many frames have been scanned; only scan this many if meta frame does not contain useful duration
    public function Analyze()
    {
    }
    public static function audioFormatLookup($id)
    {
    }
    public static function audioRateLookup($id)
    {
    }
    public static function audioBitDepthLookup($id)
    {
    }
    public static function videoCodecLookup($id)
    {
    }
}
class AMFStream
{
    public $bytes;
    public $pos;
    public function __construct(&$bytes)
    {
    }
    public function readByte()
    {
    }
    public function readInt()
    {
    }
    public function readLong()
    {
    }
    public function readDouble()
    {
    }
    public function readUTF()
    {
    }
    public function readLongUTF()
    {
    }
    public function read($length)
    {
    }
    public function peekByte()
    {
    }
    public function peekInt()
    {
    }
    public function peekLong()
    {
    }
    public function peekDouble()
    {
    }
    public function peekUTF()
    {
    }
    public function peekLongUTF()
    {
    }
}
class AMFReader
{
    public $stream;
    public function __construct(&$stream)
    {
    }
    public function readData()
    {
    }
    public function readDouble()
    {
    }
    public function readBoolean()
    {
    }
    public function readString()
    {
    }
    public function readObject()
    {
    }
    public function readMixedArray()
    {
    }
    public function readArray()
    {
    }
    public function readDate()
    {
    }
    public function readLongString()
    {
    }
    public function readXML()
    {
    }
    public function readTypedObject()
    {
    }
}
class AVCSequenceParameterSetReader
{
    public $sps;
    public $start = 0;
    public $currentBytes = 0;
    public $currentBits = 0;
    public $width;
    public $height;
    public function __construct($sps)
    {
    }
    public function readData()
    {
    }
    public function skipBits($bits)
    {
    }
    public function getBit()
    {
    }
    public function getBits($bits)
    {
    }
    public function expGolombUe()
    {
    }
    public function expGolombSe()
    {
    }
    public function getWidth()
    {
    }
    public function getHeight()
    {
    }
}
//             [FD] -- Relative position of the data that should be in position of the virtual block.
/**
* @tutorial http://www.matroska.org/technical/specs/index.html
*
* @todo Rewrite EBML parser to reduce it's size and honor default element values
* @todo After rewrite implement stream size calculation, that will provide additional useful info and enable AAC/FLAC audio bitrate detection
*/
class getid3_matroska extends \getid3_handler
{
    // public options
    public static $hide_clusters = \true;
    // if true, do not return information about CLUSTER chunks, since there's a lot of them and they're not usually useful [default: TRUE]
    public static $parse_whole_file = \false;
    // true to parse the whole file, not only header [default: FALSE]
    // private parser settings/placeholders
    private $EBMLbuffer = '';
    private $EBMLbuffer_offset = 0;
    private $EBMLbuffer_length = 0;
    private $current_offset = 0;
    private $unuseful_elements = array(\EBML_ID_CRC32, \EBML_ID_VOID);
    public function Analyze()
    {
    }
    private function parseEBML(&$info)
    {
    }
    private function EnsureBufferHasEnoughData($min_data = 1024)
    {
    }
    private function readEBMLint()
    {
    }
    private function readEBMLelementData($length, $check_buffer = \false)
    {
    }
    private function getEBMLelement(&$element, $parent_end, $get_data = \false)
    {
    }
    private function unhandledElement($type, $line, $element)
    {
    }
    private function ExtractCommentsSimpleTag($SimpleTagArray)
    {
    }
    private function HandleEMBLSimpleTag($parent_end)
    {
    }
    private function HandleEMBLClusterBlock($element, $block_type, &$info)
    {
    }
    private static function EBML2Int($EBMLstring)
    {
    }
    private static function EBMLdate2unix($EBMLdatestamp)
    {
    }
    public static function TargetTypeValue($target_type)
    {
    }
    public static function BlockLacingType($lacingtype)
    {
    }
    public static function CodecIDtoCommonName($codecid)
    {
    }
    private static function EBMLidName($value)
    {
    }
    public static function displayUnit($value)
    {
    }
    private static function getDefaultStreamInfo($streams)
    {
    }
}
// needed for ISO 639-2 language code lookup
class getid3_quicktime extends \getid3_handler
{
    public $ReturnAtomData = \true;
    public $ParseAllPossibleAtoms = \false;
    public function Analyze()
    {
    }
    public function QuicktimeParseAtom($atomname, $atomsize, $atom_data, $baseoffset, &$atomHierarchy, $ParseAllPossibleAtoms)
    {
    }
    public function QuicktimeParseContainerAtom($atom_data, $baseoffset, &$atomHierarchy, $ParseAllPossibleAtoms)
    {
    }
    public function quicktime_read_mp4_descr_length($data, &$offset)
    {
    }
    public function QuicktimeLanguageLookup($languageid)
    {
    }
    public function QuicktimeVideoCodecLookup($codecid)
    {
    }
    public function QuicktimeAudioCodecLookup($codecid)
    {
    }
    public function QuicktimeDCOMLookup($compressionid)
    {
    }
    public function QuicktimeColorNameLookup($colordepthid)
    {
    }
    public function QuicktimeSTIKLookup($stik)
    {
    }
    public function QuicktimeIODSaudioProfileName($audio_profile_id)
    {
    }
    public function QuicktimeIODSvideoProfileName($video_profile_id)
    {
    }
    public function QuicktimeContentRatingLookup($rtng)
    {
    }
    public function QuicktimeStoreAccountTypeLookup($akid)
    {
    }
    public function QuicktimeStoreFrontCodeLookup($sfid)
    {
    }
    public function QuicktimeParseNikonNCTG($atom_data)
    {
    }
    public function CopyToAppropriateCommentsSection($keyname, $data, $boxname = '')
    {
    }
    public function LociString($lstring, &$count)
    {
    }
    public function NoNullString($nullterminatedstring)
    {
    }
    public function Pascal2String($pascalstring)
    {
    }
    /*
    // helper functions for m4b audiobook chapters
    // code by Steffen Hartmann 2015-Nov-08
    */
    public function search_tag_by_key($info, $tag, $history, &$result)
    {
    }
    public function search_tag_by_pair($info, $k, $v, $history, &$result)
    {
    }
    public function quicktime_time_to_sample_table($info)
    {
    }
    function quicktime_bookmark_time_scale($info)
    {
    }
}
class getid3_riff extends \getid3_handler
{
    protected $container = 'riff';
    // default
    public function Analyze()
    {
    }
    public function ParseRIFFAMV($startoffset, $maxoffset)
    {
    }
    public function ParseRIFF($startoffset, $maxoffset)
    {
    }
    public function ParseRIFFdata(&$RIFFdata)
    {
    }
    public static function parseComments(&$RIFFinfoArray, &$CommentsTargetArray)
    {
    }
    public static function parseWAVEFORMATex($WaveFormatExData)
    {
    }
    public function parseWavPackHeader($WavPackChunkData)
    {
    }
    public static function ParseBITMAPINFOHEADER($BITMAPINFOHEADER, $littleEndian = \true)
    {
    }
    public static function ParseDIVXTAG($DIVXTAG, $raw = \false)
    {
    }
    public static function waveSNDMtagLookup($tagshortname)
    {
    }
    public static function wFormatTagLookup($wFormatTag)
    {
    }
    public static function fourccLookup($fourcc)
    {
    }
    private function EitherEndian2Int($byteword, $signed = \false)
    {
    }
}
/////////////////////////////////////////////////////////////////
/// getID3() by James Heinrich <info@getid3.org>               //
//  available at http://getid3.sourceforge.net                 //
//            or http://www.getid3.org                         //
//          also https://github.com/JamesHeinrich/getID3       //
/////////////////////////////////////////////////////////////////
// See readme.txt for more details                             //
/////////////////////////////////////////////////////////////////
//                                                             //
// module.audio.ac3.php                                        //
// module for analyzing AC-3 (aka Dolby Digital) audio files   //
// dependencies: NONE                                          //
//                                                            ///
/////////////////////////////////////////////////////////////////
class getid3_ac3 extends \getid3_handler
{
    private $AC3header = array();
    private $BSIoffset = 0;
    const syncword = 0xb77;
    public function Analyze()
    {
    }
    private function readHeaderBSI($length)
    {
    }
    public static function sampleRateCodeLookup($fscod)
    {
    }
    public static function sampleRateCodeLookup2($fscod2)
    {
    }
    public static function serviceTypeLookup($bsmod, $acmod)
    {
    }
    public static function audioCodingModeLookup($acmod)
    {
    }
    public static function centerMixLevelLookup($cmixlev)
    {
    }
    public static function surroundMixLevelLookup($surmixlev)
    {
    }
    public static function dolbySurroundModeLookup($dsurmod)
    {
    }
    public static function channelsEnabledLookup($acmod, $lfeon)
    {
    }
    public static function heavyCompression($compre)
    {
    }
    public static function roomTypeLookup($roomtyp)
    {
    }
    public static function frameSizeLookup($frmsizecod, $fscod)
    {
    }
    public static function bitrateLookup($frmsizecod)
    {
    }
    public static function blocksPerSyncFrame($numblkscod)
    {
    }
}
/////////////////////////////////////////////////////////////////
/// getID3() by James Heinrich <info@getid3.org>               //
//  available at http://getid3.sourceforge.net                 //
//            or http://www.getid3.org                         //
//          also https://github.com/JamesHeinrich/getID3       //
/////////////////////////////////////////////////////////////////
// See readme.txt for more details                             //
/////////////////////////////////////////////////////////////////
//                                                             //
// module.audio.dts.php                                        //
// module for analyzing DTS Audio files                        //
// dependencies: NONE                                          //
//                                                             //
/////////////////////////////////////////////////////////////////
/**
* @tutorial http://wiki.multimedia.cx/index.php?title=DTS
*/
class getid3_dts extends \getid3_handler
{
    /**
     * Default DTS syncword used in native .cpt or .dts formats
     */
    const syncword = "��\1";
    private $readBinDataOffset = 0;
    /**
     * Possible syncwords indicating bitstream encoding
     */
    public static $syncwords = array(
        0 => "��\1",
        // raw big-endian
        1 => "�\1�",
        // raw little-endian
        2 => "\37��\0",
        // 14-bit big-endian
        3 => "�\37\0�",
    );
    // 14-bit little-endian
    public function Analyze()
    {
    }
    private function readBinData($bin, $length)
    {
    }
    public static function bitrateLookup($index)
    {
    }
    public static function sampleRateLookup($index)
    {
    }
    public static function bitPerSampleLookup($index)
    {
    }
    public static function numChannelsLookup($index)
    {
    }
    public static function channelArrangementLookup($index)
    {
    }
    public static function dialogNormalization($index, $version)
    {
    }
}
/**
* @tutorial http://flac.sourceforge.net/format.html
*/
class getid3_flac extends \getid3_handler
{
    const syncword = 'fLaC';
    public function Analyze()
    {
    }
    public function parseMETAdata()
    {
    }
    private function parseSTREAMINFO($BlockData)
    {
    }
    private function parseAPPLICATION($BlockData)
    {
    }
    private function parseSEEKTABLE($BlockData)
    {
    }
    private function parseVORBIS_COMMENT($BlockData)
    {
    }
    private function parseCUESHEET($BlockData)
    {
    }
    /**
     * Parse METADATA_BLOCK_PICTURE flac structure and extract attachment
     * External usage: audio.ogg
     */
    public function parsePICTURE()
    {
    }
    public static function metaBlockTypeLookup($blocktype)
    {
    }
    public static function applicationIDLookup($applicationid)
    {
    }
    public static function pictureTypeLookup($type_id)
    {
    }
}
class getid3_mp3 extends \getid3_handler
{
    public $allow_bruteforce = \false;
    // forces getID3() to scan the file byte-by-byte and log all the valid audio frame headers - extremely slow, unrecommended, but may provide data from otherwise-unusuable files
    public function Analyze()
    {
    }
    public function GuessEncoderOptions()
    {
    }
    public function decodeMPEGaudioHeader($offset, &$info, $recursivesearch = \true, $ScanAsCBR = \false, $FastMPEGheaderScan = \false)
    {
    }
    public function RecursiveFrameScanning(&$offset, &$nextframetestoffset, $ScanAsCBR)
    {
    }
    public function FreeFormatFrameLength($offset, $deepscan = \false)
    {
    }
    public function getOnlyMPEGaudioInfoBruteForce()
    {
    }
    public function getOnlyMPEGaudioInfo($avdataoffset, $BitrateHistogram = \false)
    {
    }
    public static function MPEGaudioVersionArray()
    {
    }
    public static function MPEGaudioLayerArray()
    {
    }
    public static function MPEGaudioBitrateArray()
    {
    }
    public static function MPEGaudioFrequencyArray()
    {
    }
    public static function MPEGaudioChannelModeArray()
    {
    }
    public static function MPEGaudioModeExtensionArray()
    {
    }
    public static function MPEGaudioEmphasisArray()
    {
    }
    public static function MPEGaudioHeaderBytesValid($head4, $allowBitrate15 = \false)
    {
    }
    public static function MPEGaudioHeaderValid($rawarray, $echoerrors = \false, $allowBitrate15 = \false)
    {
    }
    public static function MPEGaudioHeaderDecode($Header4Bytes)
    {
    }
    public static function MPEGaudioFrameLength(&$bitrate, &$version, &$layer, $padding, &$samplerate)
    {
    }
    public static function ClosestStandardMP3Bitrate($bit_rate)
    {
    }
    public static function XingVBRidOffset($version, $channelmode)
    {
    }
    public static function LAMEvbrMethodLookup($VBRmethodID)
    {
    }
    public static function LAMEmiscStereoModeLookup($StereoModeID)
    {
    }
    public static function LAMEmiscSourceSampleFrequencyLookup($SourceSampleFrequencyID)
    {
    }
    public static function LAMEsurroundInfoLookup($SurroundInfoID)
    {
    }
    public static function LAMEpresetUsedLookup($LAMEtag)
    {
    }
}
class getid3_ogg extends \getid3_handler
{
    // http://xiph.org/vorbis/doc/Vorbis_I_spec.html
    public function Analyze()
    {
    }
    public function ParseVorbisPageHeader(&$filedata, &$filedataoffset, &$oggpageinfo)
    {
    }
    // http://tools.ietf.org/html/draft-ietf-codec-oggopus-03
    public function ParseOpusPageHeader(&$filedata, &$filedataoffset, &$oggpageinfo)
    {
    }
    public function ParseOggPageHeader()
    {
    }
    // http://xiph.org/vorbis/doc/Vorbis_I_spec.html#x1-810005
    public function ParseVorbisComments()
    {
    }
    public static function SpeexBandModeLookup($mode)
    {
    }
    public static function OggPageSegmentLength($OggInfoArray, $SegmentNumber = 1)
    {
    }
    public static function get_quality_from_nominal_bitrate($nominal_bitrate)
    {
    }
    public static function TheoraColorSpace($colorspace_id)
    {
    }
    public static function TheoraPixelFormat($pixelformat_id)
    {
    }
}
/////////////////////////////////////////////////////////////////
/// getID3() by James Heinrich <info@getid3.org>               //
//  available at http://getid3.sourceforge.net                 //
//            or http://www.getid3.org                         //
//          also https://github.com/JamesHeinrich/getID3       //
/////////////////////////////////////////////////////////////////
// See readme.txt for more details                             //
/////////////////////////////////////////////////////////////////
//                                                             //
// module.tag.apetag.php                                       //
// module for analyzing APE tags                               //
// dependencies: NONE                                          //
//                                                            ///
/////////////////////////////////////////////////////////////////
class getid3_apetag extends \getid3_handler
{
    public $inline_attachments = \true;
    // true: return full data for all attachments; false: return no data for all attachments; integer: return data for attachments <= than this; string: save as file to this directory
    public $overrideendoffset = 0;
    public function Analyze()
    {
    }
    public function parseAPEheaderFooter($APEheaderFooterData)
    {
    }
    public function parseAPEtagFlags($rawflagint)
    {
    }
    public function APEcontentTypeFlagLookup($contenttypeid)
    {
    }
    public function APEtagItemIsUTF8Lookup($itemkey)
    {
    }
}
/////////////////////////////////////////////////////////////////
/// getID3() by James Heinrich <info@getid3.org>               //
//  available at http://getid3.sourceforge.net                 //
//            or http://www.getid3.org                         //
//          also https://github.com/JamesHeinrich/getID3       //
/////////////////////////////////////////////////////////////////
// See readme.txt for more details                             //
/////////////////////////////////////////////////////////////////
//                                                             //
// module.tag.id3v1.php                                        //
// module for analyzing ID3v1 tags                             //
// dependencies: NONE                                          //
//                                                            ///
/////////////////////////////////////////////////////////////////
class getid3_id3v1 extends \getid3_handler
{
    public function Analyze()
    {
    }
    public static function cutfield($str)
    {
    }
    public static function ArrayOfGenres($allowSCMPXextended = \false)
    {
    }
    public static function LookupGenreName($genreid, $allowSCMPXextended = \true)
    {
    }
    public static function LookupGenreID($genre, $allowSCMPXextended = \false)
    {
    }
    public static function StandardiseID3v1GenreName($OriginalGenre)
    {
    }
    public static function GenerateID3v1Tag($title, $artist, $album, $year, $genreid, $comment, $track = '')
    {
    }
}
class getid3_id3v2 extends \getid3_handler
{
    public $StartingOffset = 0;
    public function Analyze()
    {
    }
    public function ParseID3v2GenreString($genrestring)
    {
    }
    public function ParseID3v2Frame(&$parsedFrame)
    {
    }
    public function DeUnsynchronise($data)
    {
    }
    public function LookupExtendedHeaderRestrictionsTagSizeLimits($index)
    {
    }
    public function LookupExtendedHeaderRestrictionsTextEncodings($index)
    {
    }
    public function LookupExtendedHeaderRestrictionsTextFieldSize($index)
    {
    }
    public function LookupExtendedHeaderRestrictionsImageEncoding($index)
    {
    }
    public function LookupExtendedHeaderRestrictionsImageSizeSize($index)
    {
    }
    public function LookupCurrencyUnits($currencyid)
    {
    }
    public function LookupCurrencyCountry($currencyid)
    {
    }
    public static function LanguageLookup($languagecode, $casesensitive = \false)
    {
    }
    public static function ETCOEventLookup($index)
    {
    }
    public static function SYTLContentTypeLookup($index)
    {
    }
    public static function APICPictureTypeLookup($index, $returnarray = \false)
    {
    }
    public static function COMRReceivedAsLookup($index)
    {
    }
    public static function RVA2ChannelTypeLookup($index)
    {
    }
    public static function FrameNameLongLookup($framename)
    {
    }
    public static function FrameNameShortLookup($framename)
    {
    }
    public static function TextEncodingTerminatorLookup($encoding)
    {
    }
    public static function TextEncodingNameLookup($encoding)
    {
    }
    public static function IsValidID3v2FrameName($framename, $id3v2majorversion)
    {
    }
    public static function IsANumber($numberstring, $allowdecimal = \false, $allownegative = \false)
    {
    }
    public static function IsValidDateStampString($datestamp)
    {
    }
    public static function ID3v2HeaderLength($majorversion)
    {
    }
    public static function ID3v22iTunesBrokenFrameName($frame_name)
    {
    }
}
/////////////////////////////////////////////////////////////////
/// getID3() by James Heinrich <info@getid3.org>               //
//  available at http://getid3.sourceforge.net                 //
//            or http://www.getid3.org                         //
//          also https://github.com/JamesHeinrich/getID3       //
/////////////////////////////////////////////////////////////////
// See readme.txt for more details                             //
/////////////////////////////////////////////////////////////////
///                                                            //
// module.tag.lyrics3.php                                      //
// module for analyzing Lyrics3 tags                           //
// dependencies: module.tag.apetag.php (optional)              //
//                                                            ///
/////////////////////////////////////////////////////////////////
class getid3_lyrics3 extends \getid3_handler
{
    public function Analyze()
    {
    }
    public function getLyrics3Data($endoffset, $version, $length)
    {
    }
    public function Lyrics3Timestamp2Seconds($rawtimestamp)
    {
    }
    public function Lyrics3LyricsTimestampParse(&$Lyrics3data)
    {
    }
    public function IntString2Bool($char)
    {
    }
}
/**
 * IXR_Base64
 *
 * @package IXR
 * @since 1.5.0
 */
class IXR_Base64
{
    var $data;
    /**
     * PHP5 constructor.
     */
    function __construct($data)
    {
    }
    /**
     * PHP4 constructor.
     */
    public function IXR_Base64($data)
    {
    }
    function getXml()
    {
    }
}
/**
 * IXR_Client
 *
 * @package IXR
 * @since 1.5.0
 *
 */
class IXR_Client
{
    var $server;
    var $port;
    var $path;
    var $useragent;
    var $response;
    var $message = \false;
    var $debug = \false;
    var $timeout;
    var $headers = array();
    // Storage place for an error message
    var $error = \false;
    /**
     * PHP5 constructor.
     */
    function __construct($server, $path = \false, $port = 80, $timeout = 15)
    {
    }
    /**
     * PHP4 constructor.
     */
    public function IXR_Client($server, $path = \false, $port = 80, $timeout = 15)
    {
    }
    function query()
    {
    }
    function getResponse()
    {
    }
    function isError()
    {
    }
    function getErrorCode()
    {
    }
    function getErrorMessage()
    {
    }
}
/**
 * IXR_ClientMulticall
 *
 * @package IXR
 * @since 1.5.0
 */
class IXR_ClientMulticall extends \IXR_Client
{
    var $calls = array();
    /**
     * PHP5 constructor.
     */
    function __construct($server, $path = \false, $port = 80)
    {
    }
    /**
     * PHP4 constructor.
     */
    public function IXR_ClientMulticall($server, $path = \false, $port = 80)
    {
    }
    function addCall()
    {
    }
    function query()
    {
    }
}
/**
 * IXR_Date
 *
 * @package IXR
 * @since 1.5.0
 */
class IXR_Date
{
    var $year;
    var $month;
    var $day;
    var $hour;
    var $minute;
    var $second;
    var $timezone;
    /**
     * PHP5 constructor.
     */
    function __construct($time)
    {
    }
    /**
     * PHP4 constructor.
     */
    public function IXR_Date($time)
    {
    }
    function parseTimestamp($timestamp)
    {
    }
    function parseIso($iso)
    {
    }
    function getIso()
    {
    }
    function getXml()
    {
    }
    function getTimestamp()
    {
    }
}
/**
 * IXR_Error
 *
 * @package IXR
 * @since 1.5.0
 */
class IXR_Error
{
    var $code;
    var $message;
    /**
     * PHP5 constructor.
     */
    function __construct($code, $message)
    {
    }
    /**
     * PHP4 constructor.
     */
    public function IXR_Error($code, $message)
    {
    }
    function getXml()
    {
    }
}
/**
 * IXR_Server
 *
 * @package IXR
 * @since 1.5.0
 */
class IXR_Server
{
    var $data;
    var $callbacks = array();
    var $message;
    var $capabilities;
    /**
     * PHP5 constructor.
     */
    function __construct($callbacks = \false, $data = \false, $wait = \false)
    {
    }
    /**
     * PHP4 constructor.
     */
    public function IXR_Server($callbacks = \false, $data = \false, $wait = \false)
    {
    }
    function serve($data = \false)
    {
    }
    function call($methodname, $args)
    {
    }
    function error($error, $message = \false)
    {
    }
    function output($xml)
    {
    }
    function hasMethod($method)
    {
    }
    function setCapabilities()
    {
    }
    function getCapabilities($args)
    {
    }
    function setCallbacks()
    {
    }
    function listMethods($args)
    {
    }
    function multiCall($methodcalls)
    {
    }
}
/**
 * IXR_IntrospectionServer
 *
 * @package IXR
 * @since 1.5.0
 */
class IXR_IntrospectionServer extends \IXR_Server
{
    var $signatures;
    var $help;
    /**
     * PHP5 constructor.
     */
    function __construct()
    {
    }
    /**
     * PHP4 constructor.
     */
    public function IXR_IntrospectionServer()
    {
    }
    function addCallback($method, $callback, $args, $help)
    {
    }
    function call($methodname, $args)
    {
    }
    function methodSignature($method)
    {
    }
    function methodHelp($method)
    {
    }
}
/**
 * IXR_MESSAGE
 *
 * @package IXR
 * @since 1.5.0
 *
 */
class IXR_Message
{
    var $message = \false;
    var $messageType = \false;
    // methodCall / methodResponse / fault
    var $faultCode = \false;
    var $faultString = \false;
    var $methodName = '';
    var $params = array();
    // Current variable stacks
    var $_arraystructs = array();
    // The stack used to keep track of the current array/struct
    var $_arraystructstypes = array();
    // Stack keeping track of if things are structs or array
    var $_currentStructName = array();
    // A stack as well
    var $_param;
    var $_value;
    var $_currentTag;
    var $_currentTagContents;
    // The XML parser
    var $_parser;
    /**
     * PHP5 constructor.
     */
    function __construct($message)
    {
    }
    /**
     * PHP4 constructor.
     */
    public function IXR_Message($message)
    {
    }
    function parse()
    {
    }
    function tag_open($parser, $tag, $attr)
    {
    }
    function cdata($parser, $cdata)
    {
    }
    function tag_close($parser, $tag)
    {
    }
}
/**
 * IXR_Request
 *
 * @package IXR
 * @since 1.5.0
 */
class IXR_Request
{
    var $method;
    var $args;
    var $xml;
    /**
     * PHP5 constructor.
     */
    function __construct($method, $args)
    {
    }
    /**
     * PHP4 constructor.
     */
    public function IXR_Request($method, $args)
    {
    }
    function getLength()
    {
    }
    function getXml()
    {
    }
}
/**
 * IXR_Value
 *
 * @package IXR
 * @since 1.5.0
 */
class IXR_Value
{
    var $data;
    var $type;
    /**
     * PHP5 constructor.
     */
    function __construct($data, $type = \false)
    {
    }
    /**
     * PHP4 constructor.
     */
    public function IXR_Value($data, $type = \false)
    {
    }
    function calculateType()
    {
    }
    function getXml()
    {
    }
    /**
     * Checks whether or not the supplied array is a struct or not
     *
     * @param array $array
     * @return bool
     */
    function isStruct($array)
    {
    }
}
/**
 * Authentication provider interface
 *
 * @package Requests
 * @subpackage Authentication
 */
/**
 * Authentication provider interface
 *
 * Implement this interface to act as an authentication provider.
 *
 * Parameters should be passed via the constructor where possible, as this
 * makes it much easier for users to use your provider.
 *
 * @see Requests_Hooks
 * @package Requests
 * @subpackage Authentication
 */
interface Requests_Auth
{
    /**
     * Register hooks as needed
     *
     * This method is called in {@see Requests::request} when the user has set
     * an instance as the 'auth' option. Use this callback to register all the
     * hooks you'll need.
     *
     * @see Requests_Hooks::register
     * @param Requests_Hooks $hooks Hook system
     */
    public function register(\Requests_Hooks &$hooks);
}
/**
 * Basic Authentication provider
 *
 * @package Requests
 * @subpackage Authentication
 */
/**
 * Basic Authentication provider
 *
 * Provides a handler for Basic HTTP authentication via the Authorization
 * header.
 *
 * @package Requests
 * @subpackage Authentication
 */
class Requests_Auth_Basic implements \Requests_Auth
{
    /**
     * Username
     *
     * @var string
     */
    public $user;
    /**
     * Password
     *
     * @var string
     */
    public $pass;
    /**
     * Constructor
     *
     * @throws Requests_Exception On incorrect number of arguments (`authbasicbadargs`)
     * @param array|null $args Array of user and password. Must have exactly two elements
     */
    public function __construct($args = \null)
    {
    }
    /**
     * Register the necessary callbacks
     *
     * @see curl_before_send
     * @see fsockopen_header
     * @param Requests_Hooks $hooks Hook system
     */
    public function register(\Requests_Hooks &$hooks)
    {
    }
    /**
     * Set cURL parameters before the data is sent
     *
     * @param resource $handle cURL resource
     */
    public function curl_before_send(&$handle)
    {
    }
    /**
     * Add extra headers to the request before sending
     *
     * @param string $out HTTP header string
     */
    public function fsockopen_header(&$out)
    {
    }
    /**
     * Get the authentication string (user:pass)
     *
     * @return string
     */
    public function getAuthString()
    {
    }
}
/**
 * Cookie storage object
 *
 * @package Requests
 * @subpackage Cookies
 */
/**
 * Cookie storage object
 *
 * @package Requests
 * @subpackage Cookies
 */
class Requests_Cookie
{
    /**
     * Cookie name.
     *
     * @var string
     */
    public $name;
    /**
     * Cookie value.
     *
     * @var string
     */
    public $value;
    /**
     * Cookie attributes
     *
     * Valid keys are (currently) path, domain, expires, max-age, secure and
     * httponly.
     *
     * @var Requests_Utility_CaseInsensitiveDictionary|array Array-like object
     */
    public $attributes = array();
    /**
     * Cookie flags
     *
     * Valid keys are (currently) creation, last-access, persistent and
     * host-only.
     *
     * @var array
     */
    public $flags = array();
    /**
     * Reference time for relative calculations
     *
     * This is used in place of `time()` when calculating Max-Age expiration and
     * checking time validity.
     *
     * @var int
     */
    public $reference_time = 0;
    /**
     * Create a new cookie object
     *
     * @param string $name
     * @param string $value
     * @param array|Requests_Utility_CaseInsensitiveDictionary $attributes Associative array of attribute data
     */
    public function __construct($name, $value, $attributes = array(), $flags = array(), $reference_time = \null)
    {
    }
    /**
     * Check if a cookie is expired.
     *
     * Checks the age against $this->reference_time to determine if the cookie
     * is expired.
     *
     * @return boolean True if expired, false if time is valid.
     */
    public function is_expired()
    {
    }
    /**
     * Check if a cookie is valid for a given URI
     *
     * @param Requests_IRI $uri URI to check
     * @return boolean Whether the cookie is valid for the given URI
     */
    public function uri_matches(\Requests_IRI $uri)
    {
    }
    /**
     * Check if a cookie is valid for a given domain
     *
     * @param string $string Domain to check
     * @return boolean Whether the cookie is valid for the given domain
     */
    public function domain_matches($string)
    {
    }
    /**
     * Check if a cookie is valid for a given path
     *
     * From the path-match check in RFC 6265 section 5.1.4
     *
     * @param string $request_path Path to check
     * @return boolean Whether the cookie is valid for the given path
     */
    public function path_matches($request_path)
    {
    }
    /**
     * Normalize cookie and attributes
     *
     * @return boolean Whether the cookie was successfully normalized
     */
    public function normalize()
    {
    }
    /**
     * Parse an individual cookie attribute
     *
     * Handles parsing individual attributes from the cookie values.
     *
     * @param string $name Attribute name
     * @param string|boolean $value Attribute value (string value, or true if empty/flag)
     * @return mixed Value if available, or null if the attribute value is invalid (and should be skipped)
     */
    protected function normalize_attribute($name, $value)
    {
    }
    /**
     * Format a cookie for a Cookie header
     *
     * This is used when sending cookies to a server.
     *
     * @return string Cookie formatted for Cookie header
     */
    public function format_for_header()
    {
    }
    /**
     * Format a cookie for a Cookie header
     *
     * @codeCoverageIgnore
     * @deprecated Use {@see Requests_Cookie::format_for_header}
     * @return string
     */
    public function formatForHeader()
    {
    }
    /**
     * Format a cookie for a Set-Cookie header
     *
     * This is used when sending cookies to clients. This isn't really
     * applicable to client-side usage, but might be handy for debugging.
     *
     * @return string Cookie formatted for Set-Cookie header
     */
    public function format_for_set_cookie()
    {
    }
    /**
     * Format a cookie for a Set-Cookie header
     *
     * @codeCoverageIgnore
     * @deprecated Use {@see Requests_Cookie::format_for_set_cookie}
     * @return string
     */
    public function formatForSetCookie()
    {
    }
    /**
     * Get the cookie value
     *
     * Attributes and other data can be accessed via methods.
     */
    public function __toString()
    {
    }
    /**
     * Parse a cookie string into a cookie object
     *
     * Based on Mozilla's parsing code in Firefox and related projects, which
     * is an intentional deviation from RFC 2109 and RFC 2616. RFC 6265
     * specifies some of this handling, but not in a thorough manner.
     *
     * @param string Cookie header value (from a Set-Cookie header)
     * @return Requests_Cookie Parsed cookie object
     */
    public static function parse($string, $name = '', $reference_time = \null)
    {
    }
    /**
     * Parse all Set-Cookie headers from request headers
     *
     * @param Requests_Response_Headers $headers Headers to parse from
     * @param Requests_IRI|null $origin URI for comparing cookie origins
     * @param int|null $time Reference time for expiration calculation
     * @return array
     */
    public static function parse_from_headers(\Requests_Response_Headers $headers, \Requests_IRI $origin = \null, $time = \null)
    {
    }
    /**
     * Parse all Set-Cookie headers from request headers
     *
     * @codeCoverageIgnore
     * @deprecated Use {@see Requests_Cookie::parse_from_headers}
     * @return string
     */
    public static function parseFromHeaders(\Requests_Response_Headers $headers)
    {
    }
}
/**
 * Cookie holder object
 *
 * @package Requests
 * @subpackage Cookies
 */
/**
 * Cookie holder object
 *
 * @package Requests
 * @subpackage Cookies
 */
class Requests_Cookie_Jar implements \ArrayAccess, \IteratorAggregate
{
    /**
     * Actual item data
     *
     * @var array
     */
    protected $cookies = array();
    /**
     * Create a new jar
     *
     * @param array $cookies Existing cookie values
     */
    public function __construct($cookies = array())
    {
    }
    /**
     * Normalise cookie data into a Requests_Cookie
     *
     * @param string|Requests_Cookie $cookie
     * @return Requests_Cookie
     */
    public function normalize_cookie($cookie, $key = \null)
    {
    }
    /**
     * Normalise cookie data into a Requests_Cookie
     *
     * @codeCoverageIgnore
     * @deprecated Use {@see Requests_Cookie_Jar::normalize_cookie}
     * @return Requests_Cookie
     */
    public function normalizeCookie($cookie, $key = \null)
    {
    }
    /**
     * Check if the given item exists
     *
     * @param string $key Item key
     * @return boolean Does the item exist?
     */
    public function offsetExists($key)
    {
    }
    /**
     * Get the value for the item
     *
     * @param string $key Item key
     * @return string Item value
     */
    public function offsetGet($key)
    {
    }
    /**
     * Set the given item
     *
     * @throws Requests_Exception On attempting to use dictionary as list (`invalidset`)
     *
     * @param string $key Item name
     * @param string $value Item value
     */
    public function offsetSet($key, $value)
    {
    }
    /**
     * Unset the given header
     *
     * @param string $key
     */
    public function offsetUnset($key)
    {
    }
    /**
     * Get an iterator for the data
     *
     * @return ArrayIterator
     */
    public function getIterator()
    {
    }
    /**
     * Register the cookie handler with the request's hooking system
     *
     * @param Requests_Hooker $hooks Hooking system
     */
    public function register(\Requests_Hooker $hooks)
    {
    }
    /**
     * Add Cookie header to a request if we have any
     *
     * As per RFC 6265, cookies are separated by '; '
     *
     * @param string $url
     * @param array $headers
     * @param array $data
     * @param string $type
     * @param array $options
     */
    public function before_request($url, &$headers, &$data, &$type, &$options)
    {
    }
    /**
     * Parse all cookies from a response and attach them to the response
     *
     * @var Requests_Response $response
     */
    public function before_redirect_check(\Requests_Response &$return)
    {
    }
}