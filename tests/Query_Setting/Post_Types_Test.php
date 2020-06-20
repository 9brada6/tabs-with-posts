<?php

namespace TWRP\Query_Setting;

use PHPUnit\Framework\TestCase;
use Masterminds\HTML5;

/**
 * @covers \TWRP\Query_Setting\Post_Types
 * @phan-file-suppress PhanThrowTypeAbsentForCall, PhanTypeVoidAssignment
 */
class Post_Types_Test extends TestCase {

	use Verify_Basic_Settings;

	/**
	 * @var \TWRP\Query_Setting\Post_Types
	 */
	public static $class_instance;

	public static $settings_keys = array();

	public static $selected_types_key = '';

	public static function setUpBeforeClass() {
		self::$class_instance     = new Post_Types();
		self::$selected_types_key = self::$class_instance::SELECTED_TYPES__SETTING_NAME;

		self::$settings_keys = array(
			self::$selected_types_key,
		);

		register_post_type(
			'public_post_type',
			array(
				'label'  => 'Public',
				'public' => true,
			)
		);

		register_post_type(
			'not_public_post_type',
			array(
				'label'  => 'Public',
				'public' => false,
			)
		);

	}

	public static function tearDownAfterClass() {
		unregister_post_type( 'public_post_type' );
		unregister_post_type( 'not_public_post_type' );
	}

	/**
	 * @covers \TWRP\Query_Setting\Post_Types::get_setting_name
	 */
	public function test__get_setting_name() {
		$this->verify_setting_name( self::$class_instance );
	}

	/**
	 * @covers \TWRP\Query_Setting\Post_Types::get_title
	 */
	public function test__get_title() {
		$this->verify_title( self::$class_instance );
	}

	/**
	 * @covers \TWRP\Query_Setting\Post_Types::setting_is_collapsed
	 */
	public function test__setting_is_collapsed() {
		$this->verify_setting_is_collapsed( self::$class_instance );
	}

	/**
	 * @covers \TWRP\Query_Setting\Post_Types::get_default_setting
	 */
	public function test__get_default_setting() {
		$this->verify_get_default_setting( self::$class_instance, self::$settings_keys );

		// Remove and add back the default WordPress "post" type.
		global $wp_post_types;
		if ( isset( $wp_post_types['post'] ) ) {
			$backup_post_type = $wp_post_types['post'];
			unset( $wp_post_types['post'] );

			$this->verify_get_default_setting( self::$class_instance, self::$settings_keys );

			$wp_post_types['post'] = $backup_post_type; // phpcs:ignore
		}
	}

	/**
	 * @covers \TWRP\Query_Setting\Post_Types::display_setting
	 * @covers \TWRP\Query_Setting\Post_Types::display_post_type_setting_checkbox
	 */
	public function test__display_setting() {
		$class           = self::$class_instance;
		$setting_key     = self::$selected_types_key;
		$default_setting = $class::get_default_setting();

		foreach ( $default_setting[ $setting_key ] as $post_type ) {
			$name_attr_regex = 'name="' . $class::get_setting_name() . '\[' . $setting_key . '\]\[' . $post_type . '\]"';
			$this->expectOutputRegex( '/' . $name_attr_regex . '/' );
		}

		// Get the return value and the displayed html.
		$return_value = $class->display_setting( $class::get_default_setting() );
		$html         = $this->getActualOutput();

		$this->assertTrue( is_null( $return_value ) );

		$html5_parser = new Html5();
		$html5_parser->loadHTMLFragment( $html );
		$this->assertFalse( $html5_parser->hasErrors() );
	}

	/**
	 * @dataProvider sanitization_provider
	 * @covers \TWRP\Query_Setting\Post_Types::sanitize_setting
	 *
	 * @param mixed $value
	 */
	public function test__sanitize_setting( $value ) {
		$class              = self::$class_instance;
		$selected_types_key = self::$selected_types_key;

		$sanitized_value = $class::sanitize_setting( $value );
		$this->assertArrayHasKey( $selected_types_key, $sanitized_value );
		$this->assertTrue( is_array( $sanitized_value[ $selected_types_key ] ) );
		$this->assertTrue( 1 === count( $sanitized_value ) );
	}

	/**
	 * @covers \TWRP\Query_Setting\Post_Types::get_available_types
	 */
	public function test__get_available_types() {
		$available_types_obj   = self::$class_instance::get_available_types( 'objects' );
		$available_types_names = self::$class_instance::get_available_types( 'names' );
		$this->assertEquals( wp_list_pluck( $available_types_obj, 'name' ), $available_types_names );
		$this->assertContains( 'public_post_type', $available_types_names );
		$this->assertNotContains( 'not_public_post_type', $available_types_names );
	}

	/**
	 * @dataProvider sanitization_provider
	 * @covers \TWRP\Query_Setting\Post_Types::get_submitted_sanitized_setting
	 *
	 * @param mixed $value
	 */
	public function test__get_submitted_sanitized_setting( $value ) {
		$class = self::$class_instance;

		$_POST[ $class::get_setting_name() ] = $value;

		$sanitized_submitted_val = $class->get_submitted_sanitized_setting();
		$sanitized_val           = $class::sanitize_setting( $value );

		$this->assertTrue( ( $sanitized_submitted_val === $sanitized_val ) );
	}


	/**
	 * @dataProvider add_query_arg_settings_provider
	 * @covers \TWRP\Query_Setting\Post_Types::add_query_arg
	 *
	 * @param mixed $value
	 */
	public function test__add_query_arg( $value ) {
		$class         = self::$class_instance;
		$full_settings = array( $class::get_setting_name() => $value );

		$query_var = $class::add_query_arg( array(), $full_settings );

		$valid_added_query_var = ( isset( $query_var['post_types'] ) && is_array( $query_var['post_types'] ) && ! empty( $query_var['post_types'] ) );

		if ( $valid_added_query_var ) {
			foreach ( $query_var['post_types'] as $post_type_value ) {
				$this->assertTrue( is_string( $post_type_value ) );
			}
		}

		$valid_not_added_query_var = ( ! isset( $query_var['post_types'] ) && ! array_key_exists( 'post_types', $query_var ) );

		$this->assertTrue( $valid_added_query_var || $valid_not_added_query_var );
	}

	#region -- Data Providers

	public function sanitization_provider() {
		self::setUpBeforeClass();
		$selected_types_key = self::$selected_types_key;
		$basic_values       = $this->get_basic_types_data_provider();

		$post_type_values = array( array( 'post' ), array( 'public_post_type' ), array( 'not_public_post_type' ) );
		$basic_values     = array_merge( $basic_values, $post_type_values );

		/**
		 * After basic values, add the values to the setting key.
		 */
		$setting_values = array();
		foreach ( $basic_values as $basic_value_array ) {
			$basic_value = $basic_value_array[0];

			$to_test_value = array(
				$selected_types_key => $basic_value,
				'not_valid_key'     => $basic_value,
			);

			$to_test_value2 = array(
				$selected_types_key => array( $basic_value ), // This setting needs to be an array to take effect.
				'not_valid_key'     => $basic_value,
			);

			array_push( $setting_values, array( $to_test_value ), array( $to_test_value2 ) );
		}

		// Additional value for code coverage.
		$additional = array( array( null ) );

		return array_merge( $basic_values, $setting_values, $additional );
	}

	public function add_query_arg_settings_provider() {
		self::setUpBeforeClass();
		$data_provider_values = $this->sanitization_provider();
		$to_provide           = array();

		foreach ( $data_provider_values as $value ) {
			foreach ( $value as $sanitization_value ) {
				$to_provide_val = self::$class_instance::sanitize_setting( $sanitization_value );
				array_push( $to_provide, array( $to_provide_val ) );
			}
		}

		// Additional value for code coverage.
		$additional = array( array( null ) );

		return array_merge( $to_provide, $additional );
	}

	#endregion -- Data Providers

}
