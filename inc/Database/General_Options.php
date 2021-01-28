<?php

namespace TWRP\Database;

use TWRP\Database\Settings\General_Option_Setting;

/**
 * This class manages retrieving and setting the general options in the database.
 *
 * For every setting that is added we must:
 *   1. Have a const key.
 *   2. Add a class with the name as the const key, that extends the
 *   General_Option_Setting class.
 *   3. Add the value in get_default_settings() function.
 */
class General_Options {

	const SETTINGS_NAMESPACE = 'TWRP\\Database\\Settings\\';

	const TABLE_OPTION_KEY = 'twrp__general_options';

	#region -- Color Keys

	const ACCENT_COLOR = 'Accent_Color';

	const SECONDARY_ACCENT_COLOR = 'Secondary_Accent_Color';

	const TEXT_COLOR = 'Text_Color';

	const SECONDARY_TEXT_COLOR = 'Secondary_Text_Color';

	const BACKGROUND_COLOR = 'Background_Color';

	const SECONDARY_BACKGROUND_COLOR = 'Secondary_Background_Color';

	#endregion -- Color Keys

	#region -- Date Keys

	const HUMAN_READABLE_DATE = 'Human_Readable_Date';

	const DATE_FORMAT = 'Date_Format';

	#endregion -- Date Keys

	#region -- Icon Keys

	const ICON_KEYS = array(
		self::AUTHOR_ICON,
		self::DATE_ICON,
		self::CATEGORY_ICON,
		self::COMMENTS_ICON,
		self::COMMENTS_DISABLED_ICON,
		self::VIEWS_ICON,
		self::RATING_ICON_PACK,
	);

	const AUTHOR_ICON = 'Author_Icon';

	const DATE_ICON = 'Date_Icon';

	const CATEGORY_ICON = 'Category_Icon';

	const COMMENTS_ICON = 'Comments_Icon';

	const COMMENTS_DISABLED_ICON_AUTO_SELECT = 'Comments_Disabled_Icon_Auto_Select';

	const COMMENTS_DISABLED_ICON = 'Comments_Disabled_Icon';

	const VIEWS_ICON = 'Views_Icon';

	const RATING_ICON_PACK = 'Rating_Pack_Icons';

	#endregion -- Icon Keys

	#region -- SVG Inclusion Keys

	const SVG_INCLUDE_INLINE = 'Svg_Include_Inline';

	#endregion -- SVG Inclusion Keys

	#region -- Getting Options

	/**
	 * Get an array with all default settings.
	 *
	 * Guarantees that all array indexes are set.
	 *
	 * @return array
	 */
	public static function get_default_settings() {
		$settings_class_names = array(
			self::ACCENT_COLOR,
			self::SECONDARY_ACCENT_COLOR,
			self::TEXT_COLOR,
			self::SECONDARY_TEXT_COLOR,
			self::BACKGROUND_COLOR,
			self::SECONDARY_BACKGROUND_COLOR,
			self::HUMAN_READABLE_DATE,
			self::DATE_FORMAT,
			self::AUTHOR_ICON,
			self::DATE_ICON,
			self::CATEGORY_ICON,
			self::COMMENTS_ICON,
			self::COMMENTS_DISABLED_ICON_AUTO_SELECT,
			self::COMMENTS_DISABLED_ICON,
			self::VIEWS_ICON,
			self::RATING_ICON_PACK,
			self::SVG_INCLUDE_INLINE,
		);

		$default_settings = array();
		foreach ( $settings_class_names as $class_name ) {
			$object = self::get_option_object( $class_name );
			if ( null === $object ) {
				continue;
			}
			$default_settings[ $object->get_key_name() ] = $object->get_default_value();
		}

		return $default_settings;
	}

	/**
	 * Get a default setting by name.
	 *
	 * @param string $name
	 * @return string|array|null Null in case of setting name does not exist.
	 */
	public static function get_default_setting( $name ) {
		$defaults = self::get_default_settings();

		if ( isset( $defaults[ self::get_key_by_class( $name ) ] ) ) {
			return $defaults[ self::get_key_by_class( $name ) ];
		}

		return null;
	}

	/**
	 * Get an array with all the options.
	 *
	 * Does not guarantees that all array indexes are set.
	 *
	 * @return array
	 */
	public static function get_all_options() {
		$options = get_option( self::TABLE_OPTION_KEY, self::get_default_settings() );

		if ( ! is_array( $options ) ) {
			return self::get_default_settings();
		}

		return array_merge( self::get_default_settings(), $options );
	}

	/**
	 * Get the option with the specific name. Return null if option is not set.
	 *
	 * @param string|General_Option_Setting $name The key of the option.
	 * @return string|array|null Return null if is not set.
	 */
	public static function get_option( $name ) {
		$options = self::get_all_options();

		if ( isset( $options[ self::get_key_by_class( $name ) ] ) ) {
			return $options[ self::get_key_by_class( $name ) ];
		}

		return null;
	}


	#endregion -- Getting Options

	#region -- Setting Options

	/**
	 * Set a new value for the option.
	 *
	 * @param string|General_Option_Setting $key The Key of the option, or the class name, or the object.
	 * @param mixed $value
	 * @return void
	 *
	 * @psalm-param class-string<General_Option_Setting>|General_Option_Setting $key
	 */
	public static function set_option( $key, $value ) {
		$value         = self::sanitize_setting( $key, $value );
		$option_object = self::get_option_object( $key );

		// If is null, then the setting doesn't have a sanitization method.
		if ( null === $value || null === $option_object ) {
			return;
		}

		$key_string = $option_object->get_key_name();

		$options                = self::get_all_options();
		$options[ $key_string ] = $value;

		update_option( self::TABLE_OPTION_KEY, $options );
	}

	/**
	 * Set multiple general options.
	 *
	 * @param array $options An array with key => value pair representing the
	 * key of the option and the value.
	 * @return void
	 */
	public static function set_options( $options ) {
		$db_options       = self::get_all_options();
		$previous_options = $db_options;

		foreach ( $options as $key => $value ) {
			$sanitized_value = self::sanitize_setting( $key, $value );

			// If is null, then the setting doesn't have a sanitization method.
			if ( null !== $sanitized_value ) {
				$db_options[ $key ] = $sanitized_value;
			}
		}

		do_action( 'twrp_before_set_general_options', $db_options, $previous_options );
		update_option( self::TABLE_OPTION_KEY, $db_options );
		do_action( 'twrp_after_set_general_options', $db_options, $previous_options );
	}

	#endregion -- Setting Options

	#region -- Sanitization

	/**
	 * Sanitize a setting based on his name and value.
	 *
	 * @param string|General_Option_Setting $name The name or key of the setting.
	 * @param mixed $value The value to sanitize.
	 * @return string|array|null Null if setting doesn't have a sanitization method.
	 *
	 * @psalm-param class-string<General_Option_Setting>|General_Option_Setting $name
	 */
	public static function sanitize_setting( $name, $value ) {
		$object = self::get_option_object( $name );
		if ( $object ) {
			return $object->sanitize( $value );
		}

		return null;
	}

	#endregion -- Sanitization

	/**
	 * Get the Setting option class by the class name(or option key), if is not available, then
	 * will return null.
	 *
	 * @param string|General_Option_Setting $class_name
	 * @return null|General_Option_Setting
	 *
	 * @psalm-suppress MoreSpecificReturnType
	 * @psalm-suppress LessSpecificReturnStatement
	 */
	public static function get_option_object( $class_name ) {
		if ( is_object( $class_name ) && is_subclass_of( $class_name, General_Option_Setting::class ) ) {
			return $class_name;
		}

		if ( is_object( $class_name ) ) {
			return null;
		}

		$class_name = str_replace( '_', ' ', $class_name );
		$class_name = ucwords( $class_name );
		$class_name = str_replace( ' ', '_', $class_name );

		if ( is_subclass_of( self::SETTINGS_NAMESPACE . $class_name, General_Option_Setting::class ) ) {
			$object_name = self::SETTINGS_NAMESPACE . $class_name;
			return new $object_name();
		}

		return null;
	}

	/**
	 * Get the key of the option by the Setting class name, or from a setting object.
	 *
	 * @param string|General_Option_Setting $class_name
	 * @return string
	 */
	public static function get_key_by_class( $class_name ) {
		$object = self::get_option_object( $class_name );

		if ( null === $object ) {
			return '';
		}

		return $object->get_key_name();
	}

}
