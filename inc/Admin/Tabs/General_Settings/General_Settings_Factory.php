<?php

namespace TWRP\Admin\Tabs\General_Settings;

use TWRP\Article_Block\Article_Block;
use TWRP\Database\General_Options;
use TWRP\Icons\Icon_Factory;
use TWRP\Icons\Icon;
use TWRP\Icons\Rating_Icon_Pack;
use TWRP\Plugins\Known_Plugins\YASR_Rating_Plugin;
use TWRP\Utils\Simple_Utils;

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

	const SETTING_CLASSES_NAMESPACE = __NAMESPACE__;

	const SETTING_CLASS_CREATOR = 'General_Setting_Creator';

	const SELECT_SETTING_CLASS = 'General_Select_Setting';

	const RADIO_SETTING_CLASS = 'General_Radio_Setting';

	const TEXT_SETTING_CLASS = 'General_Text_Setting';

	const NUMBER_SETTING_CLASS = 'General_Number_Setting';

	const COLOR_SETTING_CLASS = 'General_Color_Setting';

	const IMAGE_SETTING_CLASS = 'General_Image_Setting';

	const SELECT_SETTING_WITH_SWITCH_CLASS = 'General_Select_With_Switch_Setting';

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
		$setting_class_name = static::SETTING_CLASSES_NAMESPACE . '\\' . static::get_setting_class_name( $setting_name );

		if ( empty( $setting_arguments ) ) {
			return;
		}
		if ( ! is_subclass_of( $setting_class_name, static::SETTING_CLASSES_NAMESPACE . '\\' . static::SETTING_CLASS_CREATOR ) ) {
			return;
		}

		$setting_class = new $setting_class_name( General_Options::get_key_by_class( $setting_name ), $current_value, $setting_arguments );
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

		if ( isset( $correlated_functions[ $setting_name ] ) && Simple_Utils::method_exist_in_class( get_called_class(), $correlated_functions[ $setting_name ] ) ) {
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
			General_Options::TEXT_COLOR                 => self::COLOR_SETTING_CLASS,
			General_Options::DISABLED_TEXT_COLOR        => self::COLOR_SETTING_CLASS,
			General_Options::BACKGROUND_COLOR           => self::COLOR_SETTING_CLASS,
			General_Options::SECONDARY_BACKGROUND_COLOR => self::COLOR_SETTING_CLASS,
			General_Options::ACCENT_COLOR               => self::COLOR_SETTING_CLASS,
			General_Options::DARKER_ACCENT_COLOR        => self::COLOR_SETTING_CLASS,
			General_Options::LIGHTER_ACCENT_COLOR       => self::COLOR_SETTING_CLASS,
			General_Options::BORDER_COLOR               => self::COLOR_SETTING_CLASS,
			General_Options::SECONDARY_BORDER_COLOR     => self::COLOR_SETTING_CLASS,
			General_Options::BORDER_RADIUS              => self::NUMBER_SETTING_CLASS,
			General_Options::TAB_BUTTON_SIZE            => self::NUMBER_SETTING_CLASS,
			General_Options::HUMAN_READABLE_DATE        => self::RADIO_SETTING_CLASS,
			General_Options::NO_THUMBNAIL_IMAGE         => self::IMAGE_SETTING_CLASS,
			General_Options::DATE_FORMAT                => self::TEXT_SETTING_CLASS,
			General_Options::AUTHOR_ICON                => self::SELECT_SETTING_CLASS,
			General_Options::DATE_ICON                  => self::SELECT_SETTING_CLASS,
			General_Options::CATEGORY_ICON              => self::SELECT_SETTING_CLASS,
			General_Options::COMMENTS_ICON              => self::SELECT_SETTING_CLASS,
			General_Options::COMMENTS_DISABLED_ICON     => self::SELECT_SETTING_WITH_SWITCH_CLASS,
			General_Options::VIEWS_ICON                 => self::SELECT_SETTING_CLASS,
			General_Options::RATING_ICON_PACK           => self::SELECT_SETTING_CLASS,
			General_Options::SVG_INCLUDE_INLINE         => self::RADIO_SETTING_CLASS,
			General_Options::YASR_RATING_TYPE           => self::SELECT_SETTING_CLASS,
			General_Options::ENABLE_CACHE               => self::RADIO_SETTING_CLASS,
			General_Options::CACHE_AUTOMATIC_REFRESH    => self::SELECT_SETTING_CLASS,
			General_Options::LOAD_WIDGET_VIA_AJAX       => self::RADIO_SETTING_CLASS,
			General_Options::FILL_GRID_WITH_POSTS       => self::RADIO_SETTING_CLASS,
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
			General_Options::ACCENT_COLOR               => 'get_accent_color_setting_args',
			General_Options::DARKER_ACCENT_COLOR        => 'get_darker_accent_color_setting_args',
			General_Options::LIGHTER_ACCENT_COLOR       => 'get_lighter_accent_color_setting_args',
			General_Options::TEXT_COLOR                 => 'get_text_color_setting_args',
			General_Options::DISABLED_TEXT_COLOR        => 'get_disabled_text_color_setting_args',
			General_Options::BACKGROUND_COLOR           => 'get_background_color_setting_args',
			General_Options::SECONDARY_BACKGROUND_COLOR => 'get_secondary_background_color_setting_args',
			General_Options::BORDER_COLOR               => 'get_border_color_setting_args',
			General_Options::SECONDARY_BORDER_COLOR     => 'get_secondary_border_color_setting_args',
			General_Options::BORDER_RADIUS              => 'get_border_radius_setting_args',
			General_Options::TAB_BUTTON_SIZE            => 'tab_button_size_setting_args',
			General_Options::HUMAN_READABLE_DATE        => 'get_human_readable_setting_args',
			General_Options::NO_THUMBNAIL_IMAGE         => 'get_no_thumbnail_image_setting_args',
			General_Options::DATE_FORMAT                => 'get_date_format_setting_args',
			General_Options::AUTHOR_ICON                => 'get_author_icon_setting_args',
			General_Options::DATE_ICON                  => 'get_date_icon_setting_args',
			General_Options::CATEGORY_ICON              => 'get_category_icon_setting_args',
			General_Options::COMMENTS_ICON              => 'get_comments_icon_setting_args',
			General_Options::COMMENTS_DISABLED_ICON     => 'get_comments_disabled_icon_setting_args',
			General_Options::VIEWS_ICON                 => 'get_views_icon_setting_args',
			General_Options::RATING_ICON_PACK           => 'get_rating_pack_setting_args',
			General_Options::SVG_INCLUDE_INLINE         => 'get_svg_include_inline_args',
			General_Options::YASR_RATING_TYPE           => 'get_yasr_rating_type_args',
			General_Options::ENABLE_CACHE               => 'get_enable_cache_args',
			General_Options::CACHE_AUTOMATIC_REFRESH    => 'get_cache_minutes_automatic_refresh_args',
			General_Options::LOAD_WIDGET_VIA_AJAX       => 'get_load_widgets_via_ajax_args',
			General_Options::FILL_GRID_WITH_POSTS       => 'get_fill_grid_with_posts_args',
		);

		return $correlated_functions;
	}

	#endregion -- Get an array with each setting name correlated to a class name or argument retrieved method.

	#region -- Methods to get setting arguments for each of the setting available.

	/**
	 * Return the arguments of the setting to enable/disable human readable date format.
	 *
	 * @return array
	 */
	protected static function get_human_readable_setting_args() {
		return array(
			'title'   => _x( 'Display the date in relative format(Ex: 3 weeks ago)?', 'backend', 'tabs-with-posts' ),
			'options' => array(
				'true'  => _x( 'Yes', 'backend', 'tabs-with-posts' ),
				'false' => _x( 'No', 'backend', 'tabs-with-posts' ),
			),
			'default' => General_Options::get_default_setting( General_Options::HUMAN_READABLE_DATE ),
		);
	}

	/**
	 * Return the arguments of the setting to input a custom date format.
	 *
	 * @return array
	 */
	protected static function get_date_format_setting_args() {
		$is_hidden = false;
		if ( 'true' === General_Options::get_option( General_Options::HUMAN_READABLE_DATE ) ) {
			$is_hidden = true;
		}

		return array(
			'title'      => _x( 'Enter custom date format(leave empty for WordPress default setting):', 'backend', 'tabs-with-posts' ),
			'input_attr' => array(
				'placeholder' => _x( 'Ex: F j, Y', 'backend, date format', 'tabs-with-posts' ),
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
		$options = Icon::get_description_options_by_brands( Icon_Factory::get_user_icons() );

		return array(
			'title'   => _x( 'Select the default author icon:', 'backend', 'tabs-with-posts' ),
			'options' => $options,
		);
	}

	/**
	 * Return the arguments of the setting to select the date icon.
	 *
	 * @return array
	 */
	protected static function get_date_icon_setting_args() {
		$options = Icon::get_description_options_by_brands( Icon_Factory::get_date_icons() );

		return array(
			'title'   => _x( 'Select the default date icon:', 'backend', 'tabs-with-posts' ),
			'options' => $options,
		);
	}

	/**
	 * Return the arguments of the setting to select the category icon.
	 *
	 * @return array
	 */
	protected static function get_category_icon_setting_args() {
		$options = Icon::get_description_options_by_brands( Icon_Factory::get_category_icons() );

		return array(
			'title'   => _x( 'Select the default category icon:', 'backend', 'tabs-with-posts' ),
			'options' => $options,
		);
	}

	/**
	 * Return the arguments of the setting to select the comments icon.
	 *
	 * @return array
	 */
	protected static function get_comments_icon_setting_args() {
		$options = Icon::get_description_options_by_brands( Icon_Factory::get_comment_icons() );

		return array(
			'title'   => _x( 'Select the default comments icon:', 'backend', 'tabs-with-posts' ),
			'options' => $options,
		);
	}

	/**
	 * Return the arguments of the setting to select the disabled comments icon.
	 *
	 * @return array
	 */
	protected static function get_comments_disabled_icon_setting_args() {
		$options                      = Icon::get_description_options_by_brands( Icon_Factory::get_comment_disabled_icons() );
		$disabled_comments_packs_data = Icon_Factory::get_compatibles_disabled_comments_attr();

		$switch_value = General_Options::get_option( General_Options::COMMENTS_DISABLED_ICON_AUTO_SELECT );

		return array(
			'title'           => _x( 'Select the default disabled comments icon:', 'backend', 'tabs-with-posts' ),
			'options'         => $options,
			'additional_attr' => array(
				'data-twrpb-related-comment-icons' => wp_json_encode( $disabled_comments_packs_data ),
			),
			'switch'          => array(
				'title' => _x( 'Auto-select this icon(best-looking) based on the comment icon.', 'backend', 'tabs-with-posts' ),
				'value' => $switch_value,
				'name'  => General_Options::get_key_by_class( General_Options::COMMENTS_DISABLED_ICON_AUTO_SELECT ),
			),
		);
	}

	/**
	 * Return the arguments of the setting to select the views icon.
	 *
	 * @return array
	 */
	protected static function get_views_icon_setting_args() {
		$options = Icon::get_description_options_by_brands( Icon_Factory::get_views_icons() );

		return array(
			'title'   => _x( 'Select the default views icon:', 'backend', 'tabs-with-posts' ),
			'options' => $options,
			'default' => General_Options::get_default_setting( General_Options::VIEWS_ICON ),
		);
	}

	/**
	 * Return the arguments of the setting to select the rating icons pack.
	 *
	 * @return array
	 */
	protected static function get_rating_pack_setting_args() {
		$options = Rating_Icon_Pack::nest_packs_by_brands( Icon_Factory::get_rating_packs() );

		foreach ( $options as $rating_packs_brand => $rating_packs ) {
			foreach ( $rating_packs as $rating_pack_id => $rating_pack ) {
				$options[ $rating_packs_brand ][ $rating_pack_id ] = $rating_pack->get_option_pack_description();
			}
		}

		$rating_packs_data = Icon_Factory::get_rating_packs_attr();
		foreach ( $rating_packs_data as $id => $date ) {
			if ( isset( $rating_packs_data[ $id ]['brand'], $rating_packs_data[ $id ]['description'] ) ) {
				unset( $rating_packs_data[ $id ]['brand'] );
				unset( $rating_packs_data[ $id ]['description'] );
			}
		}

		return array(
			'title'           => _x( 'Select the default rating pack icons:', 'backend', 'tabs-with-posts' ),
			'options'         => $options,
			'additional_attr' => array(
				'data-twrpb-rating-packs' => wp_json_encode( $rating_packs_data ),
			),
		);
	}

	/**
	 * Return the arguments of the setting to enable date format selection per widget.
	 *
	 * @return array
	 */
	protected static function get_svg_include_inline_args() {
		return array(
			'title'   => _x( 'Include SVG icons inline?', 'backend', 'tabs-with-posts' ),
			'options' => array(
				'true'  => _x( 'Yes', 'backend', 'tabs-with-posts' ),
				'false' => _x( 'No', 'backend', 'tabs-with-posts' ),
			),
		);
	}

	/**
	 * Return the arguments to create the text color setting.
	 *
	 * @return array
	 */
	protected static function get_text_color_setting_args() {
		return array(
			'title'  => _x( 'Select the text color:', 'backend', 'tabs-with-posts' ),
			'before' => _x( 'Click to change:', 'backend', 'tabs-with-posts' ),
		);
	}

	/**
	 * Return the arguments to create the disabled text color setting.
	 *
	 * @return array
	 */
	protected static function get_disabled_text_color_setting_args() {
		return array(
			'title'  => _x( 'Select the disabled text color:', 'backend', 'tabs-with-posts' ),
			'before' => _x( 'Click to change:', 'backend', 'tabs-with-posts' ),
		);
	}

	/**
	 * Return the arguments to create the background color setting.
	 *
	 * @return array
	 */
	protected static function get_background_color_setting_args() {
		return array(
			'title'  => _x( 'Select the background color:', 'backend', 'tabs-with-posts' ),
			'before' => _x( 'Click to change:', 'backend', 'tabs-with-posts' ),
		);
	}

	/**
	 * Return the arguments to create the secondary background color setting.
	 *
	 * @return array
	 */
	protected static function get_secondary_background_color_setting_args() {
		return array(
			'title'  => _x( 'Select the secondary background color:', 'backend', 'tabs-with-posts' ),
			'before' => _x( 'Click to change:', 'backend', 'tabs-with-posts' ),
		);
	}

	/**
	 * Return the arguments to create the accent color setting.
	 *
	 * @return array
	 */
	protected static function get_accent_color_setting_args() {
		return array(
			'title'  => _x( 'Select the accent color:', 'backend', 'tabs-with-posts' ),
			'before' => _x( 'Click to change:', 'backend', 'tabs-with-posts' ),
		);
	}

	/**
	 * Return the arguments to create the darker accent color setting.
	 *
	 * @return array
	 */
	protected static function get_darker_accent_color_setting_args() {
		return array(
			'title'  => _x( 'Select the darker accent color:', 'backend', 'tabs-with-posts' ),
			'before' => _x( 'Click to change:', 'backend', 'tabs-with-posts' ),
		);
	}

	/**
	 * Return the arguments to create the lighter accent color setting.
	 *
	 * @return array
	 */
	protected static function get_lighter_accent_color_setting_args() {
		return array(
			'title'  => _x( 'Select the lighter accent color:', 'backend', 'tabs-with-posts' ),
			'before' => _x( 'Click to change:', 'backend', 'tabs-with-posts' ),
		);
	}

	/**
	 * Return the arguments to create the border color setting.
	 *
	 * @return array
	 */
	protected static function get_border_color_setting_args() {
		return array(
			'title'  => _x( 'Select the border color:', 'backend', 'tabs-with-posts' ),
			'before' => _x( 'Click to change:', 'backend', 'tabs-with-posts' ),
		);
	}

	/**
	 * Return the arguments to create the secondary border color setting.
	 *
	 * @return array
	 */
	protected static function get_secondary_border_color_setting_args() {
		return array(
			'title'  => _x( 'Select the secondary border color:', 'backend', 'tabs-with-posts' ),
			'before' => _x( 'Click to change:', 'backend', 'tabs-with-posts' ),
		);
	}

	/**
	 * Return the arguments to create the border radius setting.
	 *
	 * @return array
	 */
	protected static function get_border_radius_setting_args() {
		return array(
			'title' => _x( 'Change the default border radius of elements:', 'backend', 'tabs-with-posts' ),
			'after' => 'px',
		);
	}

	/**
	 * Return the arguments to create the border radius setting.
	 *
	 * @return array
	 */
	protected static function tab_button_size_setting_args() {
		return array(
			'title'      => _x( 'Change the default tab button font-size:', 'backend', 'tabs-with-posts' ),
			'after'      => 'rem',
			'input_attr' => array(
				'min'  => '0.8',
				'max'  => '2',
				'step' => '0.05',
			),
		);
	}

	/**
	 * Return the arguments to create the setting to select an image if the post
	 * has no thumbnail.
	 *
	 * @return array
	 */
	protected static function get_no_thumbnail_image_setting_args() {
		return array(
			'title'       => _x( 'Select an image to display if the post has no thumbnail:', 'backend', 'tabs-with-posts' ),
			'default_src' => Article_Block::get_default_no_thumbnail_image_url(),
			'input_attr'  => array(
				'data-twrpb-default-image' => Article_Block::get_default_no_thumbnail_image_url(),
				'data-twrpb-media-args'    => wp_json_encode(
					array(
						'multiple' => false,
						'library'  => array( 'type' => 'image' ),
					)
				),
			),
		);
	}

	/**
	 * Return the arguments for the YASR plugin to select the rating type.
	 *
	 * @return array
	 */
	protected static function get_yasr_rating_type_args() {
		$title       = _x( 'Select the YASR rating type that you wish this plugin to show in posts:', 'backend', 'tabs-with-posts' );
		$yasr_plugin = new YASR_Rating_Plugin();

		if ( ! $yasr_plugin->is_installed_and_can_be_used() ) {
			$title = '(' . _x( 'Not Installed', 'backend', 'tabs-with-posts' ) . ') ' . $title;
		}

		return array(
			'title'   => $title,
			'options' => array(
				'overall'            => _x( 'Overall/Author Rating', 'backend', 'tabs-with-posts' ),
				'visitors'           => _x( 'Visitors Vote', 'backend', 'tabs-with-posts' ),
				'multi_set_overall'  => _x( 'Multiset Overall/Authors Vote', 'backend', 'tabs-with-posts' ),
				'multi_set_visitors' => _x( 'Multiset Visitors Vote', 'backend', 'tabs-with-posts' ),
			),
		);
	}

	/**
	 * Return the arguments to create the fill grid with posts setting.
	 *
	 * @return array
	 */
	protected static function get_fill_grid_with_posts_args() {
		return array(
			'title'   => _x( 'Fill the empty grid spaces with posts?', 'backend', 'tabs-with-posts' ),
			'options' => array(
				'true'  => _x( 'Yes', 'backend', 'tabs-with-posts' ),
				'false' => _x( 'No', 'backend', 'tabs-with-posts' ),
			),
		);
	}

	/**
	 * Return the arguments to create "enable cache" setting.
	 *
	 * @return array
	 */
	protected static function get_enable_cache_args() {
		return array(
			'title'   => _x( 'Enable widget cache?', 'backend', 'tabs-with-posts' ),
			'options' => array(
				'true'  => _x( 'Yes', 'backend', 'tabs-with-posts' ),
				'false' => _x( 'No', 'backend', 'tabs-with-posts' ),
			),
		);
	}

	/**
	 * Return the arguments to create the setting to select after how many
	 * minutes a cache should refresh.
	 *
	 * @return array
	 */
	protected static function get_cache_minutes_automatic_refresh_args() {
		return array(
			'title'   => _x( 'After how many minutes the cache should refresh?', 'backend', 'tabs-with-posts' ),
			'options' => array(
				'7'  => _x( '7 minutes', 'backend', 'tabs-with-posts' ),
				'10' => _x( '10 minutes', 'backend', 'tabs-with-posts' ),
				'15' => _x( '15 minutes', 'backend', 'tabs-with-posts' ),
				'20' => _x( '20 minutes', 'backend', 'tabs-with-posts' ),
				'30' => _x( '30 minutes', 'backend', 'tabs-with-posts' ),
				'45' => _x( '45 minutes', 'backend', 'tabs-with-posts' ),
				'60' => _x( '60 minutes', 'backend', 'tabs-with-posts' ),
			),
		);
	}

	/**
	 * Get the arguments for "Load widgets via ajax setting".
	 *
	 * @return array
	 */
	protected static function get_load_widgets_via_ajax_args() {
		return array(
			'title'   => _x( 'Load widgets dynamically, via Ajax? Set "Yes" if you use another plugin to cache pages.', 'backend', 'tabs-with-posts' ),
			'options' => array(
				'true'  => _x( 'Yes', 'backend', 'tabs-with-posts' ),
				'false' => _x( 'No', 'backend', 'tabs-with-posts' ),
			),
		);
	}

	#endregion -- Methods to get setting arguments for each of the setting available.

}
