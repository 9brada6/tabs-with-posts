<?php

namespace TWRP\Query_Setting;

use PHPUnit\Framework\TestCase;

/**
 * @covers \TWRP\Query_Setting\Query_Name
 * @phan-file-suppress PhanThrowTypeAbsentForCall
 */
class Query_Name_Test extends TestCase {

	use Verify_Basic_Settings;

	/**
	 * @var \TWRP\Query_Setting\Query_Name
	 */
	public static $class_instance;

	public static $settings_keys = array();

	public static $name_key = '';

	public static function setUpBeforeClass() {
		self::$class_instance = new Query_Name();
		self::$name_key       = self::$class_instance::QUERY_NAME__SETTING_NAME;

		self::$settings_keys = array(
			self::$name_key,
		);
	}

	/**
	 * @covers \TWRP\Query_Setting\Query_Name::get_setting_name
	 */
	public function test__get_setting_name() {
		$this->verify_setting_name( self::$class_instance );
	}

	/**
	 * @covers \TWRP\Query_Setting\Query_Name::get_title
	 */
	public function test__get_title() {
		$this->verify_title( self::$class_instance );
	}

	/**
	 * @covers \TWRP\Query_Setting\Query_Name::setting_is_collapsed
	 */
	public function test__setting_is_collapsed() {
		$this->verify_setting_is_collapsed( self::$class_instance );
	}

	/**
	 * @covers \TWRP\Query_Setting\Query_Name::get_default_setting
	 */
	public function test__get_default_setting() {
		$this->verify_get_default_setting( self::$class_instance, self::$settings_keys );
	}

	/**
	 * @covers \TWRP\Query_Setting\Query_Name::display_setting
	 */
	public function test__display_setting() {
		$this->verify_display_the_setting( self::$class_instance, self::$settings_keys, self::$class_instance::get_default_setting() );
	}

	/**
	 * @dataProvider sanitization_provider
	 * @covers \TWRP\Query_Setting\Query_Name::sanitize_setting
	 *
	 * @param mixed $value
	 */
	public function test__sanitize_setting( $value ) {
		$class    = self::$class_instance;
		$name_key = self::$name_key;

		$sanitized_value = $class::sanitize_setting( $value );
		$this->assertArrayHasKey( $name_key, $sanitized_value );
		$this->assertTrue( is_string( $sanitized_value[ $name_key ] ) );
		$this->assertTrue( 1 === count( $sanitized_value ) );
	}

	/**
	 * @dataProvider sanitization_provider
	 * @covers \TWRP\Query_Setting\Query_Name::get_submitted_sanitized_setting
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
	 * @covers \TWRP\Query_Setting\Query_Name::add_query_arg
	 *
	 * @param mixed $setting
	 */
	public function test__add_query_arg( $setting = null ) {
		$class         = self::$class_instance;
		$full_settings = array( $class::get_setting_name() => $setting );

		$query_var       = $class::add_query_arg( array(), $full_settings );
		$valid_query_var = ( array() === $query_var );
		$this->assertTrue( $valid_query_var );
	}

	#region -- Data Providers

	public function sanitization_provider() {
		self::setUpBeforeClass();
		$name_key     = self::$name_key;
		$basic_values = $this->get_basic_types_data_provider();

		/**
		 * After basic values, add the values to the setting key.
		 */
		$setting_values = array();
		foreach ( $basic_values as $basic_value_array ) {
			$basic_value = $basic_value_array[0];

			$to_test_value = array(
				$name_key       => $basic_value,
				'not_valid_key' => $basic_value,
			);

			array_push( $setting_values, array( $to_test_value ) );
		}

		// Additional value for code coverage.
		$additional = array( array( null ) );

		return array_merge( $basic_values, $setting_values, $additional );
	}


	public function add_query_arg_settings_provider() {
		$data_provider_values = $this->sanitization_provider();
		$to_provide           = array();

		foreach ( $data_provider_values as $value ) {
			foreach ( $value as $sanitization_value ) {
				$to_provide_val = Query_Name::sanitize_setting( $sanitization_value );
				array_push( $to_provide, array( $to_provide_val ) );
			}
		}

		// Additional value for code coverage.
		$additional = array( array( null ) );

		return array_merge( $to_provide, $additional );
	}

	#endregion -- Data Providers
}
