<?php
/**
 * File that contains the class with the same name.
 */

namespace TWRP\Database;

use TWRP\Icons\SVG_Manager;

/**
 * This class manages retrieving and setting the general options in the database.
 *
 * For every setting that is added we must:
 *   1. Have a const key.
 *   2. Have a default value in get_default_settings() function.
 *   3. Have a sanitized way in the function sanitize_setting() function.
 *   4. Have a function that return the arguments.
 *   5. Create the HTML to modify the setting, in the general settings tab.
 */
class General_Options {

	#region -- Date Keys

	const KEY__PER_WIDGET_DATE_FORMAT = 'per_widget_date_format';

	const KEY__HUMAN_READABLE_DATE = 'human_readable_date';

	const KEY__DATE_FORMAT = 'date_format';

	#endregion -- Date Keys

	#region -- Icon Keys

	const KEY__PER_WIDGET_ICON = 'per_widget_icons';

	const KEY__AUTHOR_ICON = 'user_icon';

	const KEY__DATE_ICON = 'date_icon';

	const KEY__CATEGORY_ICON = 'category_icon';

	const KEY__COMMENTS_ICON = 'comments_icon';

	const KEY__COMMENTS_DISABLED_ICON = 'comments_disabled_icon';

	const KEY__VIEWS_ICON = 'views_icon';

	const KEY__RATING_ICON_PACK = 'rating_icon_icon';

	#endregion -- Icon Keys

	#region -- Getting Options

	/**
	 * Get an array with all default settings.
	 *
	 * Guarantees that all array indexes are set.
	 *
	 * @return array
	 */
	public static function get_default_settings() {
		return array(
			self::KEY__PER_WIDGET_ICON        => 'false',
			self::KEY__HUMAN_READABLE_DATE    => 'true',
			self::KEY__DATE_FORMAT            => '', // empty will default to WP date.
			self::KEY__AUTHOR_ICON            => 'twrp-user-goo-ol',
			self::KEY__DATE_ICON              => 'twrp-cal-goo-ol',
			self::KEY__CATEGORY_ICON          => 'twrp-tax-goo-ol',
			self::KEY__COMMENTS_ICON          => 'twrp-com-goo-ol',
			self::KEY__COMMENTS_DISABLED_ICON => 'twrp-dcom-im-f',
			self::KEY__VIEWS_ICON             => 'twrp-views-goo-ol',
			self::KEY__RATING_ICON_PACK       => 'fa-stars',
			self::KEY__PER_WIDGET_DATE_FORMAT => 'false',
		);
	}

	/**
	 * Get a default setting by name.
	 *
	 * @param string $name
	 * @return mixed|null Null in case of setting name does not exist.
	 */
	public static function get_default_setting( $name ) {
		$defaults = self::get_default_settings();

		if ( isset( $defaults[ $name ] ) ) {
			return $defaults[ $name ];
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
		$options = get_option( 'twrp_general_options', self::get_default_settings() );

		if ( ! is_array( $options ) ) {
			return self::get_default_settings();
		}

		return array_merge( self::get_default_settings(), $options );
	}

	/**
	 * Get the option with the specific name. Return null if option is not set.
	 *
	 * @param string $name The key of the option.
	 * @return mixed Can return a string/array or null if is not set.
	 */
	public static function get_option( $name ) {
		$options = self::get_all_options();

		if ( isset( $options[ $name ] ) ) {
			return $options[ $name ];
		}

		return null;
	}


	#endregion -- Getting Options

	#region -- Setting Options

	/**
	 * Set a new value for the option.
	 *
	 * @param string $key
	 * @param mixed $value
	 * @return void
	 */
	public static function set_option( $key, $value ) {
		$value = self::sanitize_setting( $key, $value );

		// If is null, then the setting doesn't have a sanitization method.
		if ( null === $value ) {
			return;
		}

		$options         = self::get_all_options();
		$options[ $key ] = $value;

		update_option( 'twrp_general_options', $options );
	}

	/**
	 * Set multiple general options.
	 *
	 * @param array $options An array with key => value pair representing the
	 * key of the option and the value.
	 * @return void
	 */
	public static function set_options( $options ) {
		$db_options = self::get_all_options();

		foreach ( $options as $key => $value ) {
			$sanitized_value = self::sanitize_setting( $key, $value );

			// If is null, then the setting doesn't have a sanitization method.
			if ( null !== $sanitized_value ) {
				$db_options[ $key ] = $sanitized_value;
			}
		}

		update_option( 'twrp_general_options', $db_options );
	}

	#endregion -- Setting Options

	#region -- Setting Options

	/**
	 * Set a new option.
	 *
	 * @param string $name
	 * @param mixed $value
	 * @return void
	 */
	public static function set_setting( $name, $value ) {
		$options = self::get_all_options();

		$sanitized_setting = self::sanitize_setting( $name, $value );

		$options[ $name ] = $sanitized_setting;

		update_option( 'twrp_general_options', $options );
	}

	#endregion -- Setting Options

	#region -- Sanitization

	/**
	 * Sanitize a setting based on his name and value.
	 *
	 * @param string $name The name or key of the setting.
	 * @param mixed $value The value to sanitize.
	 * @return string|bool|null Null if setting doesn't have a sanitization method.
	 */
	public static function sanitize_setting( $name, $value ) {
		switch ( $name ) {
			case self::KEY__PER_WIDGET_DATE_FORMAT:
				return self::sanitize_string_choice( $value, self::get_per_widget_date_format_setting_args() );
			case self::KEY__HUMAN_READABLE_DATE:
				return self::sanitize_string_choice( $value, self::get_human_readable_date_setting_args() );
			case self::KEY__DATE_FORMAT:
				return self::sanitize_date_format( $value );
			case self::KEY__PER_WIDGET_ICON:
				return self::sanitize_string_choice( $value, self::get_per_widget_icon_setting_args() );
			case self::KEY__AUTHOR_ICON:
				return self::sanitize_string_choice( $value, self::get_author_icon_setting_args() );
			case self::KEY__DATE_ICON:
				return self::sanitize_string_choice( $value, self::get_date_icon_setting_args() );
			case self::KEY__CATEGORY_ICON:
				return self::sanitize_string_choice( $value, self::get_category_icon_setting_args() );
			case self::KEY__COMMENTS_ICON:
				return self::sanitize_string_choice( $value, self::get_comments_icon_setting_args() );
			case self::KEY__COMMENTS_DISABLED_ICON:
				return self::sanitize_string_choice( $value, self::get_comments_disabled_icon_setting_args() );
			case self::KEY__VIEWS_ICON:
				return self::sanitize_string_choice( $value, self::get_views_icon_setting_args() );
			case self::KEY__RATING_ICON_PACK:
				return self::sanitize_string_choice( $value, self::get_rating_pack_setting_args() );
		}

		return null;
	}

	/**
	 * Sanitize choices the strings.
	 *
	 * @param mixed $value
	 * @param array{default:string,options:array<string>} $args
	 * @return string
	 */
	protected static function sanitize_string_choice( $value, $args ) {
		if ( is_array( $args['options'] ) && in_array( $value, $args['options'], true ) ) {
			return $value;
		}

		return $args['default'];
	}

	/**
	 * Sanitize the date format.
	 *
	 * @param mixed $value
	 * @return string
	 */
	protected static function sanitize_date_format( $value ) {
		if ( ! is_string( $value ) ) {
			return '';
		}

		return $value;
	}

	#endregion -- Sanitization

	#region -- Sanitization Arguments

	/**
	 * Get the arguments for the setting to enable the choosing of date format
	 * per widget.
	 *
	 * @return array
	 */
	protected static function get_per_widget_date_format_setting_args() {
		$default_value = self::get_default_setting( self::KEY__PER_WIDGET_DATE_FORMAT );

		return array(
			'default' => $default_value,
			'options' => array( 'true', 'false' ),
		);
	}

	/**
	 * Get the arguments for the setting to enable/disable the human readable
	 * date format.
	 *
	 * @return array
	 */
	protected static function get_human_readable_date_setting_args() {
		$default_value = self::get_default_setting( self::KEY__HUMAN_READABLE_DATE );

		return array(
			'default' => $default_value,
			'options' => array( 'true', 'false' ),
		);
	}

	/**
	 * Get the arguments for the setting to enable the choosing of icon per
	 * widget.
	 *
	 * @return array
	 */
	protected static function get_per_widget_icon_setting_args() {
		$default_value = self::get_default_setting( self::KEY__PER_WIDGET_ICON );

		return array(
			'default' => $default_value,
			'options' => array( 'true', 'false' ),
		);
	}

	/**
	 * Get the arguments for the setting of author icon.
	 *
	 * @return array
	 */
	protected static function get_author_icon_setting_args() {
		$default_value = self::get_default_setting( self::KEY__AUTHOR_ICON );
		$icons         = SVG_Manager::get_user_icons();
		$icons         = array_keys( $icons );

		return array(
			'default' => $default_value,
			'options' => $icons,
		);
	}

	/**
	 * Get the arguments for the setting of date icon.
	 *
	 * @return array
	 */
	protected static function get_date_icon_setting_args() {
		$default_value = self::get_default_setting( self::KEY__DATE_ICON );
		$icons         = SVG_Manager::get_date_icons();
		$icons         = array_keys( $icons );

		return array(
			'default' => $default_value,
			'options' => $icons,
		);
	}

	/**
	 * Get the arguments for the setting of category icon.
	 *
	 * @return array
	 */
	public static function get_category_icon_setting_args() {
		$default_value = self::get_default_setting( self::KEY__CATEGORY_ICON );
		$icons         = SVG_Manager::get_category_icons();
		$icons         = array_keys( $icons );

		return array(
			'default' => $default_value,
			'options' => $icons,
		);
	}

	/**
	 * Get the arguments for the setting of comments icon.
	 *
	 * @return array
	 */
	protected static function get_comments_icon_setting_args() {
		$default_value = self::get_default_setting( self::KEY__COMMENTS_ICON );
		$icons         = SVG_Manager::get_comment_icons();
		$icons         = array_keys( $icons );

		return array(
			'default' => $default_value,
			'options' => $icons,
		);
	}

	/**
	 * Get the arguments for the setting of comments disabled icon.
	 *
	 * @return array
	 */
	protected static function get_comments_disabled_icon_setting_args() {
		$default_value = self::get_default_setting( self::KEY__COMMENTS_DISABLED_ICON );
		$icons         = SVG_Manager::get_comment_disabled_icons();
		$icons         = array_keys( $icons );

		return array(
			'default' => $default_value,
			'options' => $icons,
		);
	}

	/**
	 * Get the arguments for the setting of views icon.
	 *
	 * @return array
	 */
	protected static function get_views_icon_setting_args() {
		$default_value = self::get_default_setting( self::KEY__VIEWS_ICON );
		$icons         = SVG_Manager::get_views_icons();
		$icons         = array_keys( $icons );

		return array(
			'default' => $default_value,
			'options' => $icons,
		);
	}

	/**
	 * Get the arguments for the setting of rating pack icons.
	 *
	 * @return array
	 */
	protected static function get_rating_pack_setting_args() {
		$default_value = self::get_default_setting( self::KEY__RATING_ICON_PACK );
		$icons         = SVG_Manager::get_rating_packs();
		$icons         = array_keys( $icons );

		return array(
			'default' => $default_value,
			'options' => $icons,
		);
	}

	#endregion -- Sanitization Arguments

}
