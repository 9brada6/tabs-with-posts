<?php
/**
 * File that holds the trait with the same name.
 */

namespace TWRP\TWRP_Widget;

use TWRP\Class_Retriever_Utils;
use TWRP\Database\Query_Options;
use TWRP\TWRP_Widget\Widget;

/**
 * Basic utility functions for the Tabs With Recommended Posts Widget.
 */
trait Widget_Utilities {

	/**
	 * Get the instance settings array based on.
	 *
	 * @param string|int $widget_id Either the int or the whole widget Id.
	 * @return array
	 */
	public static function get_instance_settings( $widget_id ) {
		try {
			$widget_id = self::twrp_get_widget_id_num( $widget_id );
		} catch ( \RuntimeException $e ) {
			return array();
		}

		$instance_options = get_option( 'widget_' . self::get_base_id() );
		if ( isset( $instance_options[ $widget_id ] ) ) {
			return $instance_options[ $widget_id ];
		}

		return array();
	}

	/**
	 * Constructs name attributes for use in WP_Widget::form() fields.
	 *
	 * This function is basically the one from WP_Widget Class, but is static
	 * and can be called from outside of the class.
	 *
	 * @param string|int $widget_id Either the int or the whole widget Id.
	 * @param string $field_name The name of the setting to create the name.
	 * @return string The attribute name for that field, corresponding to the widget.
	 */
	public static function twrp_get_field_name( $widget_id, $field_name ) {
		try {
			$widget_id = self::twrp_get_widget_id_num( $widget_id );
		} catch ( \RuntimeException $e ) {
			return '';
		}

		$pos = strpos( $field_name, '[' );
		if ( false === $pos ) {
			return 'widget-' . self::get_base_id() . '[' . $widget_id . '][' . $field_name . ']';
		} else {
			return 'widget-' . self::get_base_id() . '[' . $widget_id . '][' . substr_replace( $field_name, '][', $pos, strlen( '[' ) );
		}
	}

	/**
	 * Constructs id attributes for use in WP_Widget::form() fields. This is the
	 * same as get_field_id(), only that it can be called statically.
	 *
	 * @param string|int $widget_id Either the int or the whole widget Id.
	 * @param string $field_name The name of the setting to create the name.
	 * @return string The attribute name for that field, corresponding to the widget.
	 */
	public static function twrp_get_field_id( $widget_id, $field_name ) {
		try {
			$widget_id = self::twrp_get_widget_id_num( $widget_id );
		} catch ( \RuntimeException $e ) {
			return '';
		}

		return 'widget-' . self::get_base_id() . '-' . $widget_id . '-' .
		trim( str_replace( array( '[]', '[', ']' ), array( '', '-', '' ), $field_name ), '-' );
	}

	/**
	 * Get the selected article block id for a query selected within a widget.
	 * Return the constant "DEFAULT_SELECTED_ARTBLOCK_ID" if something is wrong, or article block not set.
	 *
	 * @param string|int $widget_id Either the int or the whole widget Id.
	 * @param int $query_id
	 * @return string
	 */
	public static function get_selected_artblock_id( $widget_id, $query_id ) {
		try {
			$widget_id = self::twrp_get_widget_id_num( $widget_id );
		} catch ( \RuntimeException $e ) {
			return self::get_default_artblock_id();
		}

		$instance_options = self::get_instance_settings( $widget_id );
		if ( ! isset( $instance_options[ $query_id ][ self::get_artblock_selector_name() ] ) ) {
			return self::get_default_artblock_id();
		}
		$artblock_id = $instance_options[ $query_id ][ self::get_artblock_selector_name() ];

		$registered_artblocks = Class_Retriever_Utils::get_all_article_block_names();
		foreach ( $registered_artblocks as $artblock ) {
			if ( $artblock::get_id() === $artblock_id ) {
				return $artblock_id;
			}
		}

		return self::get_default_artblock_id();
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

		$widget_id_num = ltrim( str_replace( self::get_base_id(), '', $widget_id ), '-' );

		if ( is_numeric( $widget_id_num ) ) {
			return (int) $widget_id_num;
		} else {
			throw new \RuntimeException( 'Cannot retrieve a number corresponding to a widget Id.' );
		}
	}

	/**
	 * Get the selected queries id's for a specific widget. The Id's are
	 * verified if they exist before return.
	 *
	 * @param string|int $widget_id Either the int or the whole widget Id.
	 * @return array All queries id's exist and are valid.
	 */
	public static function get_selected_queries( $widget_id ) {
		try {
			$widget_id = self::twrp_get_widget_id_num( $widget_id );
		} catch ( \RuntimeException $exception ) {
			return array();
		}
		$queries_ids    = array();
		$settings_names = array_keys( self::get_instance_settings( $widget_id ) );

		foreach ( $settings_names as $possible_query_id ) {
			if ( is_numeric( $possible_query_id ) && Query_Options::query_exists( $possible_query_id ) ) {
				array_push( $queries_ids, $possible_query_id );
			}
		}

		return $queries_ids;
	}

	/**
	 * Get the query settings of a specific widget. The settings retrieved from
	 * db are not sanitized after.
	 *
	 * @throws \RuntimeException If settings does not exist.
	 *
	 * @param int|string $widget_id The whole widget id or just the number.
	 * @param int $query_id
	 * @return array
	 */
	public static function get_query_instance_settings( $widget_id, $query_id ) {
		$instance_settings = self::get_instance_settings( $widget_id );

		if ( isset( $instance_settings[ $query_id ] ) ) {
			if ( is_array( $instance_settings[ $query_id ] ) ) {
				return $instance_settings[ $query_id ];
			}
		}

		throw new \RuntimeException( 'The settings does not exist.' );
	}

	/**
	 * Determine whether or not a TWRP widget with the specific number exist.
	 *
	 * @param mixed $widget_id
	 * @return bool
	 */
	public static function widget_id_exists( $widget_id ) {
		// todo:
		return true;
	}

	public static function get_query_tab_button_title( $widget_id, $query_id ) {
		try {
			$instance_settings = Widget::get_query_instance_settings( $widget_id, $query_id );
		} catch ( \RuntimeException $e ) {
			return '';
		}

		if ( ! empty( $instance_settings[ self::get_query_button_title_name() ] ) ) {
			return $instance_settings[ self::get_query_button_title_name() ];
		}

		return '';
	}

	/**
	 * Get the widget base ID.
	 *
	 * @return string
	 */
	protected static function get_base_id() {
		return Widget::TWRP_BASE_ID;
	}

	/**
	 * Get the default selected artblock ID.
	 *
	 * @return string
	 */
	protected static function get_default_artblock_id() {
		return Widget::DEFAULT_SELECTED_ARTBLOCK_ID;
	}

	/**
	 * Get the artblock selector name.
	 *
	 * @return string
	 */
	protected static function get_artblock_selector_name() {
		return Widget::ARTBLOCK_SELECTOR__NAME;
	}

	/**
	 * Get the query button title name.
	 *
	 * @return string
	 */
	protected static function get_query_button_title_name() {
		return Widget::QUERY_BUTTON_TITLE__NAME;
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

}
