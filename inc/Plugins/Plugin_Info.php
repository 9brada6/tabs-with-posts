<?php
/**
 * File that holds the interface with the same name.
 */

namespace TWRP\Plugins;

use TWRP\Utils;

abstract class Plugin_Info {

	/**
	 * Called before anything else, to initialize actions and filters.
	 *
	 * Always called at 'after_setup_theme' action. Other things added here should be
	 * additionally checked, for example by admin hooks, or whether or not to be
	 * included in special pages, ...etc.
	 *
	 * @return void
	 */
	abstract public static function init();

	/**
	 * Get the title of the plugin.
	 *
	 * @return string
	 */
	abstract public static function get_plugin_title();

	/**
	 * Get the author of the plugin.
	 *
	 * @return string
	 */
	abstract public static function get_plugin_author();

	/**
	 * Get the current version of the plugin.
	 *
	 * @return string|false False in case the plugin is not installed.
	 */
	public static function get_plugin_version() {
		$plugins = get_plugins();

		if ( ! is_callable( array( get_called_class(), 'get_plugin_file_relative_path' ) ) ) {
			return false;
		}

		$plugin_file = static::get_plugin_file_relative_path(); // @phan-suppress-current-line PhanAbstractStaticMethodCallInStatic
		if ( ! isset( $plugins[ $plugin_file ]['Version'] ) ) {
			return false;
		}

		return $plugins[ $plugin_file ]['Version'];
	}

	/**
	 * Get last manually tested version of the plugin.
	 *
	 * @return string
	 */
	abstract public static function get_last_tested_plugin_version();

	/**
	 * Get the current version of the plugin.
	 *
	 * @return string
	 */
	public static function get_plugin_avatar_src() {
		$assets_dir = Utils::get_assets_directory_url();

		$fully_class_name = get_called_class();
		$class_name       = substr( $fully_class_name, (int) strrpos( $fully_class_name, '\\' ) + 1 );

		$image_file = trailingslashit( $assets_dir ) . 'plugin-avatars/' . $class_name . '.png';

		return $image_file;
	}

	/**
	 * Get the plugin file path, relative to WP plugins directory.
	 *
	 * @return string
	 */
	abstract public static function get_plugin_file_relative_path();

	/**
	 * Whether or not the plugin is installed.
	 *
	 * @return bool
	 */
	abstract public static function is_installed_and_can_be_used();

}
