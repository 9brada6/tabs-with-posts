<?php
/**
 * File that contains the class with the same name.
 */

namespace TWRP\Utils;

use TWRP\TWRP_Widget\Widget;
use TWRP_Main;
use RuntimeException;
use TWRP\Database\Query_Options;

class Widget_Utils {

	/**
	 * For a widget id, return the widget instance.
	 *
	 * @throws RuntimeException If the widget id does not exist or is not valid.
	 *
	 * @param int $widget_id
	 * @return Widget|null
	 */
	/*
	  public static function get_widget_instance_by_id( $widget_id ) {
		if ( ! ( $widget_id > 0 ) ) {
			throw new RuntimeException();
		}

		$settings = self::get_instance_settings( $widget_id );

		if ( empty( $settings ) ) {
			return null;
		}

		global $wp_widget_factory;

		if ( ! isset( $wp_widget_factory->widgets['TWRP\\TWRP_Widget\\Widget'] ) ) {
			return null;
		}

		// TODO:
		// $widget_obj = $wp_widget_factory->widgets[ $widget ];
		// if ( ! ( $widget_obj instanceof WP_Widget ) ) {
		// return;
		// }

		// $default_args              = array(
		// 'before_widget' => '<div class="widget %s">',
		// 'after_widget'  => '</div>',
		// 'before_title'  => '<h2 class="widgettitle">',
		// 'after_title'   => '</h2>',
		// );
		// $settings                  = wp_parse_args( $settings, $default_args );
		// $settings['before_widget'] = sprintf( $settings['before_widget'], $widget_obj->widget_options['classname'] );

		// $instance = wp_parse_args( $instance );

		// if ( false === $instance ) {
		// return;
		// }

		// $widget_obj->_set( -1 );
		return $widget_instance;
	} */

	/**
	 * Try to get the tab style id that should be used for a specific query_id.
	 *
	 * @param array $widget_instance_settings
	 * @return string
	 */
	public static function pluck_tab_style_class_name_by_id( $widget_instance_settings ) {
		if ( isset( $widget_instance_settings[ Widget::TAB_STYLE__NAME ] ) ) {
			return $widget_instance_settings[ Widget::TAB_STYLE__NAME ];
		}

		return '';
	}

	/**
	 * Try to get the tab style variant that should be used for a specific query_id.
	 *
	 * @param array $widget_instance_settings
	 * @return string
	 */
	public static function pluck_tab_style_variant( $widget_instance_settings ) {
		if ( isset( $widget_instance_settings[ Widget::TAB_STYLE_VARIANT__NAME ] ) ) {
			return $widget_instance_settings[ Widget::TAB_STYLE_VARIANT__NAME ];
		}

		return '';
	}

	/**
	 * Try to get the tab style variant that should be used for a specific query_id.
	 *
	 * @param array $widget_instance_settings
	 * @param int $query_id
	 * @return string|'' The title or empty string if not set.
	 */
	public static function pluck_tab_button_title( $widget_instance_settings, $query_id ) {
		if ( ! empty( $widget_instance_settings[ $query_id ][ Widget::QUERY_BUTTON_TITLE__NAME ] ) ) {
			return $widget_instance_settings[ $query_id ][ Widget::QUERY_BUTTON_TITLE__NAME ];
		}

		return '';
	}

	/**
	 * Get a specific query settings from the whole instance settings.
	 *
	 * @param array $widget_instance_settings
	 * @param int $query_id
	 * @return array Empty array if settings do not exist or are not set.
	 */
	public static function pluck_query_settings( $widget_instance_settings, $query_id ) {
		if ( isset( $widget_instance_settings[ $query_id ] ) ) {
			if ( is_array( $widget_instance_settings[ $query_id ] ) ) {
				return $widget_instance_settings[ $query_id ];
			}
		}

		return array();
	}

	/**
	 * Get all the valid query ids(that exist) from the widget instance settings.
	 *
	 * @param array $widget_instance_settings
	 * @return array
	 */
	public static function pluck_valid_query_ids( $widget_instance_settings ) {
		$query_ids = array();

		if ( isset( $widget_instance_settings['queries'] ) ) {
			$query_ids = explode( ';', $widget_instance_settings['queries'] );
		}

		$sanitized_query_ids = array();

		foreach ( $query_ids as $query_id ) {
			if ( Query_Options::query_exists( $query_id ) ) {
				array_push( $sanitized_query_ids, $query_id );
			}
		}

		return $sanitized_query_ids;
	}

	/**
	 * Try to get the artblock id that should be used for a specific query_id.
	 *
	 * @param array $widget_instance_settings
	 * @param string|int $query_id
	 * @return string|'' Empty string if no id is selected or not isset.
	 */
	public static function pluck_artblock_id( $widget_instance_settings, $query_id ) {
		if ( ! isset( $widget_instance_settings[ $query_id ][ Widget::ARTBLOCK_SELECTOR__NAME ] ) ) {
			return '';
		}
		$artblock_id = $widget_instance_settings[ $query_id ][ Widget::ARTBLOCK_SELECTOR__NAME ];

		if ( ! is_string( $artblock_id ) ) {
			return '';
		}

		return $artblock_id;
	}

	/**
	 * Get the id of a control for the Tabs with Recommended Posts Widget.
	 *
	 * This is meant to replace the WP widget get_field_id() in
	 * WP_Widget::form() function.
	 *
	 * @param int|string $widget_id
	 * @param int|string ...$other_name_keys
	 * @return string
	 *
	 * @psalm-param numeric $widget_id
	 */
	public static function get_field_id( $widget_id, ...$other_name_keys ) {
		$suffix = '-' . $widget_id;
		foreach ( $other_name_keys as $name_key ) {
			$suffix .= '-' . $name_key;
		}

		return 'widget-' . Widget::TWRP_BASE_ID . $suffix;
	}

	/**
	 * Get the name of a control for the Tabs with Recommended Posts Widget.
	 *
	 * This is meant to replace the WP widget get_field_name() in
	 * WP_Widget::form() function.
	 *
	 * @param int|string $widget_id
	 * @param int|string ...$other_name_keys
	 * @return string
	 *
	 * @psalm-param numeric $widget_id
	 * @psalm-param array-key ...$other_name_keys
	 */
	public static function get_field_name( $widget_id, ...$other_name_keys ) {
		$suffix = '[' . $widget_id . ']';
		foreach ( $other_name_keys as $name_key ) {
			$name_key = sanitize_key( (string) $name_key );
			if ( empty( $name_key ) ) {
				continue;
			}

			$suffix .= '[' . $name_key . ']';
		}

		return 'widget-' . Widget::TWRP_BASE_ID . $suffix;
	}

	/**
	 * Get the instance settings array based on.
	 *
	 * @param string|int $widget_id Either the int or the whole widget Id.
	 * @return array Empty array if no settings are present.
	 */
	public static function get_instance_settings( $widget_id ) {
		try {
			$widget_id = self::get_widget_id_number( $widget_id );
		} catch ( \RuntimeException $e ) {
			return array();
		}

		$instance_options = get_option( 'widget_' . TWRP_Main::TWRP_WIDGET__BASE_ID );
		if ( isset( $instance_options[ $widget_id ] ) ) {
			return $instance_options[ $widget_id ];
		}

		return array();
	}

	/**
	 * Get only the widget Id number for this type of widget.
	 *
	 * @throws \RuntimeException If the widget Id cannot be retrieved.
	 *
	 * @param string|int $widget_id Either the int or the whole widget Id.
	 * @return int
	 */
	public static function get_widget_id_number( $widget_id ) {
		if ( is_numeric( $widget_id ) ) {
			return (int) $widget_id;
		}

		$widget_id_num = ltrim( str_replace( TWRP_Main::TWRP_WIDGET__BASE_ID, '', $widget_id ), '-' );

		if ( is_numeric( $widget_id_num ) ) {
			return (int) $widget_id_num;
		} else {
			throw new \RuntimeException( 'Cannot retrieve a number corresponding to a widget Id.' );
		}
	}

}
