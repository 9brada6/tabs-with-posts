<?php
/**
 * File that contains the class with the same name.
 */

namespace TWRP\Utils;

use TWRP\TWRP_Widget\Widget;
use TWRP_Main;
use RuntimeException;

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

	// public static function get_query_tab_button_title( $widget_id, $query_id ) {
	// try {
	// $instance_settings = Widget::get_query_instance_settings( $widget_id, $query_id );
	// } catch ( \RuntimeException $e ) {
	// return '';
	// }

	// if ( ! empty( $instance_settings[ Widget::get_query_button_title_name() ] ) ) {
	// return $instance_settings[ Widget::get_query_button_title_name() ];
	// }

	// return '';
	// }

	/**
	 * Try to get the artblock id that should be used for a specific query_id.
	 *
	 * @param array $widget_instance_settings
	 * @param string|int $query_id
	 * @return string
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
	 * Get the instance settings array based on.
	 *
	 * @param string|int $widget_id Either the int or the whole widget Id.
	 * @return array Empty array if no settings are present.
	 */
	public static function get_instance_settings( $widget_id ) {
		try {
			$widget_id = self::twrp_get_widget_id_num( $widget_id );
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
	public static function twrp_get_widget_id_num( $widget_id ) {
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
