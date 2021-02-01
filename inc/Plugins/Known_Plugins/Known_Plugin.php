<?php

namespace TWRP\Plugins\Known_Plugins;

use TWRP\Utils\Simple_Utils;
use TWRP\Utils\Directory_Utils;
use TWRP\Utils\Helper_Trait\After_Setup_Theme_Init_Trait;

/**
 * Every plugin known to this plugin should extend this class. It contains
 * methods to know the title, author, if plugin is installed, versions tested,
 * plugin avatar... etc.
 */
abstract class Known_Plugin {

	use After_Setup_Theme_Init_Trait;

	/**
	 * Get the title of the plugin.
	 *
	 * @return string
	 */
	abstract public function get_plugin_title();

	/**
	 * Get the author of the plugin.
	 *
	 * @return string
	 */
	abstract public function get_plugin_author();

	/**
	 * Get the current version of the plugin.
	 *
	 * @return string|false False in case the plugin is not installed.
	 */
	public function get_plugin_version() {
		$plugins = get_plugins();

		if ( ! Simple_Utils::method_exist_and_is_public( get_called_class(), 'get_plugin_file_relative_path' ) ) {
			return false;
		}

		$plugin_file = $this->get_plugin_file_relative_path();
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
	abstract public function get_last_tested_plugin_version();

	/**
	 * Get the plugin avatar src.
	 *
	 * @return string
	 */
	public function get_plugin_avatar_src() {
		return Directory_Utils::get_plugin_avatar_src( get_called_class() );
	}

	/**
	 * Get the plugin file path, relative to WP plugins directory.
	 *
	 * @return string
	 */
	abstract public function get_plugin_file_relative_path();

	/**
	 * Whether or not the plugin is installed.
	 *
	 * @return bool
	 */
	abstract public function is_installed_and_can_be_used();

}
