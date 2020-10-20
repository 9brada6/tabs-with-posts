<?php
/**
 * File that contains the class with the same name.
 */

namespace TWRP\Admin;

use TWRP\Database\General_Options;
use TWRP\Icons\SVG_Manager;
use TWRP\Icons\Icon;
use TWRP\Icons\Rating_Icon_Pack;

/**
 * Simple factory pattern, to use the needed General Settings class, with the
 * needed arguments to generate a setting.
 *
 * To add a setting you must:
 *
 * 1. Add a class that manages that specific setting, into
 * get_setting_classes_correlated() function.
 * 2. Add a method name that returns the setting arguments for that specific
 * setting.
 * 3. Add the method to return the arguments.
 */
class General_Settings_Factory {

	const SETTING_CLASSES_NAMESPACE = 'TWRP\\Admin\\';

	const SETTING_CLASS_CREATOR = 'General_Setting_Creator';

	const SELECT_SETTING_CLASS = 'General_Select_Setting';

	const RADIO_SETTING_CLASS = 'General_Radio_Setting';

	const TEXT_SETTING_CLASS = 'General_Text_Setting';

	/**
	 * Constructor is private, display_setting() is the only static method to
	 * use.
	 *
	 * @suppress PhanEmptyPrivateMethod
	 */
	private function __construct() {}

	/**
	 * Display the setting by the setting name.
	 *
	 * This function will call the appropriate Setting_Creator class, with the
	 * arguments needed, based on the setting name.
	 *
	 * @param string $setting_name
	 * @return void
	 */
	public static function display_setting( $setting_name ) {
		$current_value      = General_Options::get_option( $setting_name );
		$setting_arguments  = static::get_setting_args( $setting_name );
		$setting_class_name = static::SETTING_CLASSES_NAMESPACE . static::get_setting_class_name( $setting_name );

		if ( empty( $setting_arguments ) ) {
			return;
		}
		if ( ! is_subclass_of( $setting_class_name, static::SETTING_CLASSES_NAMESPACE . static::SETTING_CLASS_CREATOR ) ) {
			return;
		}

		$setting_class = new $setting_class_name( $setting_name, $current_value, $setting_arguments );
		$setting_class->display();
	}

	#region -- Get correlated class name or argument retrieved method from the setting name.

	/**
	 * Get the class name for the setting to use.
	 *
	 * @param string $setting_name
	 * @return string An empty string if class name could not be retrieved.
	 */
	protected static function get_setting_class_name( $setting_name ) {
		$correlated_classes = static::get_setting_classes_correlated();

		if ( isset( $correlated_classes[ $setting_name ] ) && is_string( $correlated_classes[ $setting_name ] ) ) {
			return $correlated_classes[ $setting_name ];
		}

		return '';
	}

	/**
	 * Get the setting arguments, depending on the setting name. Additionally,
	 * adds the default argument in the argument it returns.
	 *
	 * @param string $setting_name
	 * @return array An empty array if settings couldn't be retrieved.
	 */
	protected static function get_setting_args( $setting_name ) {
		$correlated_functions = static::get_argument_functions_correlated();

		if ( isset( $correlated_functions[ $setting_name ] ) && is_callable( array( get_called_class(), $correlated_functions[ $setting_name ] ) ) ) {
			$class_name  = get_called_class();
			$method_name = $correlated_functions[ $setting_name ];

			$setting_arguments = call_user_func( array( $class_name, $method_name ) );

			$setting_arguments['default'] = General_Options::get_default_setting( $setting_name );
			return $setting_arguments;
		}

		return array();
	}

	#endregion -- Get correlated class name or argument retrieved method from the setting name.

	#region -- Get an array with each setting name correlated to a class name or argument retrieved method.

	/**
	 * Get an array where each key is the setting name, and the value is a class
	 * name, that is used to create the specific setting controller.
	 *
	 * @return array
	 */
	protected static function get_setting_classes_correlated() {
		$correlated_classes = array(
			General_Options::KEY__PER_WIDGET_DATE_FORMAT => self::RADIO_SETTING_CLASS,
			General_Options::KEY__HUMAN_READABLE_DATE    => self::RADIO_SETTING_CLASS,
			General_Options::KEY__DATE_FORMAT            => self::TEXT_SETTING_CLASS,
			General_Options::KEY__AUTHOR_ICON            => self::SELECT_SETTING_CLASS,
			General_Options::KEY__DATE_ICON              => self::SELECT_SETTING_CLASS,
			General_Options::KEY__CATEGORY_ICON          => self::SELECT_SETTING_CLASS,
			General_Options::KEY__COMMENTS_ICON          => self::SELECT_SETTING_CLASS,
			General_Options::KEY__COMMENTS_DISABLED_ICON => self::SELECT_SETTING_CLASS,
			General_Options::KEY__VIEWS_ICON             => self::SELECT_SETTING_CLASS,
			General_Options::KEY__RATING_ICON_PACK       => self::SELECT_SETTING_CLASS,
		);

		return $correlated_classes;
	}

	/**
	 * Get an array where each key is the setting name, and the value is a
	 * method name from this class, that returns an array with the arguments to
	 * create a setting.
	 *
	 * @return array
	 */
	protected static function get_argument_functions_correlated() {
		$correlated_functions = array(
			General_Options::KEY__PER_WIDGET_DATE_FORMAT => 'get_per_widget_date_format_setting_args',
			General_Options::KEY__HUMAN_READABLE_DATE    => 'get_human_readable_setting_args',
			General_Options::KEY__DATE_FORMAT            => 'get_date_format_setting_args',
			General_Options::KEY__AUTHOR_ICON            => 'get_author_icon_setting_args',
			General_Options::KEY__DATE_ICON              => 'get_date_icon_setting_args',
			General_Options::KEY__CATEGORY_ICON          => 'get_category_icon_setting_args',
			General_Options::KEY__COMMENTS_ICON          => 'get_comments_icon_setting_args',
			General_Options::KEY__COMMENTS_DISABLED_ICON => 'get_comments_disabled_icon_setting_args',
			General_Options::KEY__VIEWS_ICON             => 'get_views_icon_setting_args',
			General_Options::KEY__RATING_ICON_PACK       => 'get_rating_pack_setting_args',
		);

		return $correlated_functions;
	}

	#endregion -- Get an array with each setting name correlated to a class name or argument retrieved method.

	#region -- Methods to get setting arguments for each of the setting available.

	/**
	 * Return the arguments of the setting to enable date format selection per widget.
	 *
	 * @return array
	 */
	protected static function get_per_widget_date_format_setting_args() {
		return array(
			'title'   => _x( 'Get an additional option for each widget tab to select date format individually?', 'backend', 'twrp' ),
			'options' => array(
				'true'  => __( 'Yes', 'twrp' ),
				'false' => __( 'No', 'twrp' ),
			),
			'default' => General_Options::get_default_setting( General_Options::KEY__PER_WIDGET_DATE_FORMAT ),
		);
	}

	/**
	 * Return the arguments of the setting to enable/disable human readable date format.
	 *
	 * @return array
	 */
	protected static function get_human_readable_setting_args() {
		return array(
			'title'   => _x( 'Display the date in relative format(Ex: 3 weeks ago)?', 'backend', 'twrp' ),
			'options' => array(
				'true'  => __( 'Yes', 'twrp' ),
				'false' => __( 'No', 'twrp' ),
			),
			'default' => General_Options::get_default_setting( General_Options::KEY__HUMAN_READABLE_DATE ),
		);
	}

	/**
	 * Return the arguments of the setting to input a custom date format.
	 *
	 * @return array
	 */
	protected static function get_date_format_setting_args() {
		$is_hidden = false;
		if ( 'true' === General_Options::get_option( General_Options::KEY__HUMAN_READABLE_DATE ) ) {
			$is_hidden = true;
		}

		return array(
			'title'      => _x( 'Enter custom date format(leave empty for WordPress default setting):', 'backend', 'twrp' ),
			'input_attr' => array(
				'placeholder' => _x( 'Ex: F j, Y', 'backend', 'twrp' ),
			),
			'is_hidden'  => $is_hidden,
		);
	}

	/**
	 * Return the arguments of the setting to select the author icon.
	 *
	 * @return array
	 */
	protected static function get_author_icon_setting_args() {
		$options = Icon::get_description_options_by_brands( SVG_Manager::get_user_icons() );

		return array(
			'title'   => _x( 'Select the default author icon:', 'backend', 'twrp' ),
			'options' => $options,
		);
	}

	/**
	 * Return the arguments of the setting to select the date icon.
	 *
	 * @return array
	 */
	protected static function get_date_icon_setting_args() {
		$options = Icon::get_description_options_by_brands( SVG_Manager::get_date_icons() );

		return array(
			'title'   => _x( 'Select the default date icon:', 'backend', 'twrp' ),
			'options' => $options,
		);
	}

	/**
	 * Return the arguments of the setting to select the category icon.
	 *
	 * @return array
	 */
	protected static function get_category_icon_setting_args() {
		$options = Icon::get_description_options_by_brands( SVG_Manager::get_category_icons() );

		return array(
			'title'   => _x( 'Select the default category icon:', 'backend', 'twrp' ),
			'options' => $options,
		);
	}

	/**
	 * Return the arguments of the setting to select the comments icon.
	 *
	 * @return array
	 */
	protected static function get_comments_icon_setting_args() {
		$options = Icon::get_description_options_by_brands( SVG_Manager::get_comment_icons() );

		return array(
			'title'   => _x( 'Select the default comments icon:', 'backend', 'twrp' ),
			'options' => $options,
		);
	}

	/**
	 * Return the arguments of the setting to select the disabled comments icon.
	 *
	 * @return array
	 */
	protected static function get_comments_disabled_icon_setting_args() {
		$options           = Icon::get_description_options_by_brands( SVG_Manager::get_comment_disabled_icons() );
		$rating_packs_data = SVG_Manager::get_compatibles_disabled_comments_attr();

		return array(
			'title'           => _x( 'Select the default disabled comments icon:', 'backend', 'twrp' ),
			'options'         => $options,
			'additional_attr' => array(
				'data-twrp-related-comment-icons' => wp_json_encode( $rating_packs_data ),
			),
		);
	}

	/**
	 * Return the arguments of the setting to select the views icon.
	 *
	 * @return array
	 */
	protected static function get_views_icon_setting_args() {
		$options = Icon::get_description_options_by_brands( SVG_Manager::get_views_icons() );

		return array(
			'title'   => _x( 'Select the default views icon:', 'backend', 'twrp' ),
			'options' => $options,
			'default' => General_Options::get_default_setting( General_Options::KEY__VIEWS_ICON ),
		);
	}

	/**
	 * Return the arguments of the setting to select the rating icons pack.
	 *
	 * @return array
	 */
	protected static function get_rating_pack_setting_args() {
		$options = Rating_Icon_Pack::nest_packs_by_brands( SVG_Manager::get_rating_packs() );

		foreach ( $options as $rating_packs_brand => $rating_packs ) {
			foreach ( $rating_packs as $rating_pack_id => $rating_pack ) {
				$options[ $rating_packs_brand ][ $rating_pack_id ] = $rating_pack->get_option_pack_description();
			}
		}

		$rating_packs_data = SVG_Manager::get_rating_packs_attr();
		foreach ( $rating_packs_data as $id => $date ) {
			if ( isset( $rating_packs_data[ $id ]['brand'], $rating_packs_data[ $id ]['description'] ) ) {
				unset( $rating_packs_data[ $id ]['brand'] );
				unset( $rating_packs_data[ $id ]['description'] );
			}
		}

		return array(
			'title'           => _x( 'Select the default rating pack icons:', 'backend', 'twrp' ),
			'options'         => $options,
			'additional_attr' => array(
				'data-twrp-rating-packs' => wp_json_encode( $rating_packs_data ),
			),
		);
	}

	#endregion -- Methods to get setting arguments for each of the setting available.

}
