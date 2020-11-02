<?php

namespace TWRP;

use TWRP\TWRP_Widget\Widget;
use DateTimeZone;
use TWRP_Main;
use WP_Filesystem_Direct;
use TWRP\Article_Block\Article_Block;
use TWRP\Query_Setting\Query_Setting;
use TWRP\Admin\Query_Settings_Display\Query_Setting_Display;

class Utils {

	const HOW_MANY_FOLDERS_THIS_FILE_IS_NESTED = 1;

	/**
	 * Verify that a value is a number bigger than 0.
	 *
	 * This will work everywhere where WP use an id, like posts, users,
	 * categories, ...etc.
	 *
	 * @param mixed $post_id
	 * @return int|false False if not valid.
	 */
	public static function get_valid_wp_id( $post_id ) {
		if ( ! is_numeric( $post_id ) ) {
			return false;
		}

		$post_id = (int) $post_id;

		if ( ! ( $post_id > 0 ) ) {
			return false;
		}

		return $post_id;
	}

	/**
	 * Verify that each value in an array is a number bigger than 0.
	 *
	 * This will work everywhere where WP use an id, like posts, users,
	 * categories, ...etc.
	 *
	 * @param array $post_ids
	 * @return array<int>
	 */
	public static function get_valid_wp_ids( $post_ids ) {
		foreach ( $post_ids as $key => $post_id ) {
			$sanitized_id = self::get_valid_wp_id( $post_id );

			if ( $sanitized_id ) {
				$post_ids[ $key ] = $sanitized_id;
			} else {
				unset( $post_ids[ $key ] );
			}
		}

		return $post_ids;
	}

	/**
	 * Flatten multi-dimensional array.
	 *
	 * @param array $array
	 * @return array
	 */
	public static function flatten_array( array $array ) {
		$ret_array = array();
		foreach ( new \RecursiveIteratorIterator( new \RecursiveArrayIterator( $array ) ) as $value ) {
			$ret_array[] = $value;
		}
		return $ret_array;
	}

	/**
	 * Get the name of a control for the Tabs with Recommended Posts Widget.
	 *
	 * @param int|string $widget_id
	 * @param int|string ...$other_name_keys
	 * @return string
	 *
	 * @psalm-param numeric $widget_id
	 * @psalm-param array-key ...$other_name_keys
	 */
	public static function get_twrp_widget_name( $widget_id, ...$other_name_keys ) {
		$suffix = '[' . $widget_id . ']';
		foreach ( $other_name_keys as $name_key ) {
			$name_key = sanitize_key( (string) $name_key );
			if ( empty( $name_key ) ) {
				continue;
			}

			$suffix .= '[' . $name_key . ']';
		}

		$twrp_widget_base_id = Widget::TWRP_BASE_ID;

		$name = 'widget-' . $twrp_widget_base_id . $suffix;
		return $name;
	}

	/**
	 * Get the name of a control for the Tabs with Recommended Posts Widget.
	 *
	 * @param int|string $widget_id
	 * @param int|string ...$other_name_keys
	 * @return string
	 *
	 * @psalm-param numeric $widget_id
	 */
	public static function get_twrp_widget_id( $widget_id, ...$other_name_keys ) {
		$suffix = '-' . $widget_id;
		foreach ( $other_name_keys as $name_key ) {
			$suffix .= '-' . $name_key;
		}

		$twrp_widget_base_id = Widget::TWRP_BASE_ID;

		$name = 'widget-' . $twrp_widget_base_id . $suffix;
		return $name;
	}

	#region -- WP Date and Time Polyfills

	/**
	 * Get the website timezone.
	 *
	 * This will try to use WP function wp_timezone() available from WP 5.3, or
	 * else, will fallback to a polyfill.
	 *
	 * @return DateTimeZone
	 */
	public static function wp_timezone() {
		if ( function_exists( 'wp_timezone' ) ) {
			return wp_timezone(); // @phan-suppress-current-line PhanUndeclaredFunction
		}

		return new DateTimeZone( self::wp_timezone_polyfill() );
	}

	/**
	 * Get the timezone string. Used as polyfill if wp_timezone is not available.
	 *
	 * @return string
	 */
	protected static function wp_timezone_polyfill() {
		$timezone_string = get_option( 'timezone_string' );

		if ( $timezone_string ) {
			return $timezone_string;
		}

		$offset  = (float) get_option( 'gmt_offset' );
		$hours   = (int) $offset;
		$minutes = ( $offset - $hours );

		$sign      = ( $offset < 0 ) ? '-' : '+';
		$abs_hour  = abs( $hours );
		$abs_mins  = abs( $minutes * 60 );
		$tz_offset = sprintf( '%s%02d:%02d', $sign, $abs_hour, $abs_mins );

		return $tz_offset;
	}


	/**
	 * Retrieve post published or modified time as a Unix timestamp. This function
	 * will either use the native WP function with the same name(WP 5.3), or
	 * will fallback to the polyfill version.
	 *
	 * @param \WP_Post|int|null $post WP_Post object or ID. Default is global $post object.
	 * @param string $field Published or modified time to use from database. Accepts 'date' or 'modified'.
	 * @return int|false Unix timestamp on success, false on failure.
	 */
	public static function get_post_timestamp( $post = null, $field = 'date' ) {
		if ( function_exists( 'get_post_timestamp' ) ) {
			return get_post_timestamp( $post, $field ); // @phan-suppress-current-line PhanUndeclaredFunction
		}

		return self::get_post_timestamp_polyfill( $post, $field );
	}

	/**
	 * Polyfill version of the get_post_timestamp() function introduced in WP 5.3.
	 *
	 * @param \WP_Post|int|null $post WP_Post object or ID. Default is global $post object.
	 * @param string $field Published or modified time to use from database. Accepts 'date' or 'modified'.
	 * @return int|false Unix timestamp on success, false on failure.
	 */
	protected static function get_post_timestamp_polyfill( $post = null, $field = 'date' ) {
		$datetime = self::get_post_datetime( $post, $field );

		if ( false === $datetime ) {
			return false;
		}

		return $datetime->getTimestamp();
	}


	/**
	 * Retrieve post published or modified time as a DateTimeImmutable object
	 * instance. This will either use the wp function if available(WP 5.3), or
	 * will fallback to the polyfill version.
	 *
	 * For legacy reasons, this function allows to choose to instantiate from
	 * local or UTC time in database. Normally this should make no difference to
	 * the result. However, the values might get out of sync in database,
	 * typically because of timezone setting changes. The parameter ensures the
	 * ability to reproduce backwards compatible behaviors in such cases.
	 *
	 * @param \WP_Post|int|null $post WP_Post object or ID. Default is global $post object.
	 * @param string $field Published or modified time to use from database. Accepts 'date' or 'modified'.
	 * @param string $source Local or UTC time to use from database. Accepts 'local' or 'gmt'.
	 * @return \DateTimeImmutable|false Time object on success, false on failure.
	 */
	public static function get_post_datetime( $post = null, $field = 'date', $source = 'local' ) {
		if ( function_exists( 'get_post_datetime' ) ) {
			return get_post_datetime( $post, $field, $source ); // @phan-suppress-current-line PhanUndeclaredFunction
		}

		return self::get_post_datetime_polyfill( $post, $field, $source );
	}

	/**
	 * Retrieve post published or modified time as a DateTimeImmutable object
	 * instance. This is a polyfill of the wp function get_post_datetime() (WP 5.3).
	 *
	 * For legacy reasons, this function allows to choose to instantiate from
	 * local or UTC time in database. Normally this should make no difference to
	 * the result. However, the values might get out of sync in database,
	 * typically because of timezone setting changes. The parameter ensures the
	 * ability to reproduce backwards compatible behaviors in such cases.
	 *
	 * @param \WP_Post|int|null $post WP_Post object or ID. Default is global $post object.
	 * @param string $field Published or modified time to use from database. Accepts 'date' or 'modified'.
	 * @param string $source Local or UTC time to use from database. Accepts 'local' or 'gmt'.
	 * @return \DateTimeImmutable|false Time object on success, false on failure.
	 */
	protected static function get_post_datetime_polyfill( $post = null, $field = 'date', $source = 'local' ) {
		$post = get_post( $post );

		if ( ! $post || is_array( $post ) ) {
			return false;
		}

		$wp_timezone = self::wp_timezone();

		if ( 'gmt' === $source ) {
			$time     = ( 'modified' === $field ) ? $post->post_modified_gmt : $post->post_date_gmt;
			$timezone = new DateTimeZone( 'UTC' );
		} else {
			$time     = ( 'modified' === $field ) ? $post->post_modified : $post->post_date;
			$timezone = $wp_timezone;
		}

		if ( empty( $time ) || '0000-00-00 00:00:00' === $time ) {
			return false;
		}

		$datetime = date_create_immutable_from_format( 'Y-m-d H:i:s', $time, $timezone );

		if ( false === $datetime ) {
			return false;
		}

		return $datetime->setTimezone( $wp_timezone );
	}


	/**
	 * Retrieves the current time as an object with the timezone from settings.
	 * This function will either call the WP function current_datetime() if
	 * available(> WP 5.3) or fallback to a polyfill.
	 *
	 * @return \DateTimeImmutable Date and time object.
	 */
	public static function current_datetime() {
		if ( function_exists( 'current_datetime' ) ) {
			return current_datetime(); // @phan-suppress-current-line PhanUndeclaredFunction
		}

		return self::current_datetime_polyfill();
	}

	/**
	 * Retrieves the current time as an object with the timezone from settings.
	 * This function is a polyfill for the WP function introduced in WP 5.3.
	 *
	 * @return \DateTimeImmutable Date and time object.
	 */
	protected static function current_datetime_polyfill() {
		return new \DateTimeImmutable( 'now', self::wp_timezone() );
	}

	#endregion -- WP Date and Time Polyfills

	#region -- Directory Utilities

	/**
	 * Returns the path to this plugin directory.
	 *
	 * @return string The path is trail slashed.
	 */
	public static function get_plugin_directory_path() {
		$file = __FILE__;
		for ( $i = self::HOW_MANY_FOLDERS_THIS_FILE_IS_NESTED; $i > 0; $i-- ) {
			$file = dirname( $file );
		}

		return trailingslashit( plugin_dir_path( $file ) );
	}

	/**
	 * Get this plugin directory URL.
	 *
	 * @return string Url has a trailing slash.
	 */
	public static function get_plugin_directory_url() {
		$file = __FILE__;

		for ( $i = self::HOW_MANY_FOLDERS_THIS_FILE_IS_NESTED; $i > 0; $i-- ) {
			$file = dirname( $file );
		}

		return trailingslashit( plugin_dir_url( $file ) );
	}

	/**
	 * Get the path to plugin "templates" folder.
	 *
	 * @return string The path is has an ending slash.
	 */
	public static function get_template_directory_path() {
		$directory = trailingslashit( self::get_plugin_directory_path() ) . ltrim( TWRP_Main::TEMPLATES_FOLDER, '/' );
		return trailingslashit( $directory );
	}

	/**
	 * Get the url to plugin "templates" folder.
	 *
	 * @return string The path is has an ending slash.
	 */
	public static function get_template_directory_url() {
		$url = trailingslashit( self::get_plugin_directory_url() ) . ltrim( TWRP_Main::TEMPLATES_FOLDER, '/' );
		return trailingslashit( $url );
	}

	/**
	 * Get plugin assets directory path.
	 *
	 * @return string Path has a trailing slash.
	 */
	public static function get_assets_directory_path() {
		$assets_dir = trailingslashit( self::get_plugin_directory_path() ) . ltrim( TWRP_Main::ASSETS_FOLDER, '/' );
		return trailingslashit( $assets_dir );
	}

	/**
	 * Get plugin assets URL.
	 *
	 * @return string Url has a trailing slash.
	 */
	public static function get_assets_directory_url() {
		$assets_url = trailingslashit( self::get_plugin_directory_url() ) . ltrim( TWRP_Main::ASSETS_FOLDER, '/' );
		return trailingslashit( $assets_url );
	}

	/**
	 * Get plugin assets svgs directory path.
	 *
	 * @return string Path has a trailing slash.
	 */
	public static function get_assets_svgs_directory_path() {
		$assets_svgs_dir = trailingslashit( self::get_plugin_directory_path() ) . ltrim( TWRP_Main::SVG_FOLDER, '/' );
		return trailingslashit( $assets_svgs_dir );
	}

	/**
	 * Get plugin assets svgs URL.
	 *
	 * @return string Url has a trailing slash.
	 */
	public static function get_assets_svgs_directory_url() {
		$assets_svgs_url = trailingslashit( self::get_plugin_directory_url() ) . ltrim( TWRP_Main::SVG_FOLDER, '/' );
		return trailingslashit( $assets_svgs_url );
	}

	/**
	 * Get path for the all icons file.
	 *
	 * @return string
	 */
	public static function get_all_icons_path() {
		$file = trailingslashit( self::get_plugin_directory_path() ) . ltrim( TWRP_Main::ALL_ICONS_FILE, '/' );
		return $file;
	}

	/**
	 * Get url for the all icons file.
	 *
	 * @return string
	 */
	public static function get_all_icons_url() {
		$file = trailingslashit( self::get_plugin_directory_url() ) . ltrim( TWRP_Main::ALL_ICONS_FILE, '/' );
		return $file;
	}

	/**
	 * Get path for the needed icons file.
	 *
	 * @return string
	 */
	public static function get_needed_icons_path() {
		$file = trailingslashit( self::get_plugin_directory_path() ) . ltrim( TWRP_Main::NEEDED_ICONS_FILE, '/' );
		return $file;
	}

	/**
	 * Get url for the needed icons file.
	 *
	 * @return string
	 */
	public static function get_needed_icons_url() {
		$file = trailingslashit( self::get_plugin_directory_url() ) . ltrim( TWRP_Main::NEEDED_ICONS_FILE, '/' );
		return $file;
	}

	#endregion -- Directory Utilities

	#region -- Filesystem Utilities

	/**
	 * Get the WP_Filesystem_Direct class. This class should be used only to
	 * get contents, to write anything.
	 *
	 * @psalm-suppress UnresolvableInclude
	 *
	 * @return null|WP_Filesystem_Direct
	 */
	public static function get_direct_filesystem() {
		if ( ! \defined( 'ABSPATH' ) ) {
			return null;
		}

		if ( ! class_exists( 'WP_Filesystem_Base' ) || ! class_exists( 'WP_Filesystem_Direct' ) ) {
			require_once trailingslashit( ABSPATH ) . 'wp-admin/includes/class-wp-filesystem-base.php'; // @codeCoverageIgnore
			require_once trailingslashit( ABSPATH ) . 'wp-admin/includes/class-wp-filesystem-direct.php'; // @codeCoverageIgnore
		}

		return new WP_Filesystem_Direct( null );
	}

	/**
	 * Get the contents of a file.
	 *
	 * This function use WP_Filesystem_Direct class, to check if file exist and
	 * to get the contents.
	 *
	 * @param string $file_path
	 * @return string|false
	 */
	public static function get_file_contents( $file_path ) {
		$direct_filesystem = self::get_direct_filesystem();
		if ( is_null( $direct_filesystem ) || ! $direct_filesystem->exists( $file_path ) ) {
			return false;
		}

		$content = $direct_filesystem->get_contents( $file_path );
		if ( is_string( $content ) ) {
			return $content;
		}

		return false;
	}

	/**
	 * Set the contents of a file, will work only if the file exist.
	 *
	 * This function use WP_Filesystem_Direct class, to check if file exist and
	 * to set the contents.
	 *
	 * @param string $file_path
	 * @param string $content
	 * @return bool True on success, false on failure.
	 */
	public static function set_file_contents( $file_path, $content ) {
		$direct_filesystem = self::get_direct_filesystem();
		if ( is_null( $direct_filesystem ) || ! $direct_filesystem->exists( $file_path ) ) {
			return false;
		}

		if ( $direct_filesystem->put_contents( $file_path, $content, 0664 ) ) {
			return true;
		}

		return false;
	}

	#endregion -- Filesystem Utilities

	/**
	 * Get all the Article_Block objects.
	 *
	 * @return array<string,string>
	 * @psalm-return array<string,class-string<Article_Block>>
	 */
	public static function get_all_article_block_names() {
		$class_names = static::get_all_child_classes( 'TWRP\\Article_Block\\Article_Block' );
		$class_names = self::order_class_name( $class_names );

		return $class_names;
	}

	/**
	 * Get all the Query_Setting objects.
	 *
	 * @return array<Query_Setting>
	 */
	public static function get_all_query_settings_objects() {
		$class_names = static::get_all_child_classes( 'TWRP\\Query_Setting\\Query_Setting' );
		$class_names = self::order_class_name( $class_names );

		foreach ( $class_names as $key => $class_name ) {
			$class_names[ $key ] = new $class_name();
		}

		return $class_names;
	}

	/**
	 * Get all the Query_Setting_Display objects.
	 *
	 * @return array<Query_Setting_Display>
	 */
	public static function get_all_display_query_settings_objects() {
		$class_names = static::get_all_child_classes( 'TWRP\\Admin\\Query_Settings_Display\\Query_Setting_Display' );
		$class_names = self::order_class_name( $class_names );

		foreach ( $class_names as $key => $class_name ) {
			$class_names[ $key ] = new $class_name();
		}

		return $class_names;
	}

	/**
	 * Get all classes that implements/extends a certain interface/class.
	 *
	 * @param string $parent_class
	 * @return array
	 *
	 * @psalm-return array<class-string>
	 */
	protected static function get_all_child_classes( $parent_class ) {
		$children_classes = array();
		$declared_classes = get_declared_classes();

		foreach ( $declared_classes as $declared_class ) {
			if ( is_subclass_of( $declared_class, $parent_class ) ) {
				array_push( $children_classes, $declared_class );
			}
		}

		return $children_classes;
	}

	/**
	 * Order class name by CLASS_ORDER constant.
	 *
	 * @param array<string> $class_names
	 * @return array
	 */
	private static function order_class_name( $class_names ) {
		usort( $class_names, array( get_called_class(), 'sort_classes_algorithm' ) );
		return $class_names;
	}

	/**
	 * Function to be passed as an algorithm to usort function, to order class
	 * by CLASS_ORDER constant if defined.
	 *
	 * @param string $first_class_name
	 * @param string $second_class_name
	 * @return int
	 */
	private static function sort_classes_algorithm( $first_class_name, $second_class_name ) {
		if ( ! defined( $first_class_name . '::CLASS_ORDER' ) ) {
			return 0;
		}

		if ( ! defined( $second_class_name . '::CLASS_ORDER' ) ) {
			return 0;
		}

		$first_class_order  = $first_class_name::CLASS_ORDER;
		$second_class_order = $second_class_name::CLASS_ORDER;

		if ( $first_class_order === $second_class_order ) {
			return 0;
		}

		return ( $first_class_order < $second_class_order ) ? -1 : 1;
	}

}
