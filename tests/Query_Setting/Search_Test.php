<?php

namespace TWRP\Query_Setting;

use PHPUnit\Framework\TestCase;

/**
 * @phan-file-suppress PhanThrowTypeAbsentForCall
 */
class Search_Test extends TestCase {

	use Verify_Basic_Settings;

	/**
	 * @var \TWRP\Query_Setting\Search
	 */
	public static $class_instance;

	public static $settings_keys = array();


	public static function setUpBeforeClass() {
		self::$class_instance = new Search();
		self::$settings_keys  = array(
			self::$class_instance::SEARCH_KEYWORDS__SETTING_NAME,
		);
	}

	public function test__get_setting_name() {
		$this->verify_setting_name( self::$class_instance );
	}

	public function test__get_title() {
		$this->verify_title( self::$class_instance );
	}

	public function test__setting_is_collapsed() {
		$this->verify_setting_is_collapsed( self::$class_instance );
	}

	public function test__get_default_setting() {
		$this->verify_get_default_setting( self::$class_instance, self::$settings_keys );
	}

	public function test__display_setting() {
		$this->verify_display_the_setting( self::$class_instance, self::$settings_keys, self::$class_instance::get_default_setting() );
	}

	/**
	 * @dataProvider sanitization_provider
	 *
	 * @param mixed $value
	 */
	public function test__sanitize_setting( $value ) {
		$class      = self::$class_instance;
		$search_key = $class::SEARCH_KEYWORDS__SETTING_NAME;

		$sanitized_value = $class::sanitize_setting( $value );
		$this->assertArrayHasKey( $search_key, $sanitized_value );
		$this->assertTrue( is_string( $sanitized_value[ $search_key ] ) );

		return $sanitized_value;
	}

	public function test__get_submitted_sanitized_setting() {
		$class = self::$class_instance;

		$search_key = $class::SEARCH_KEYWORDS__SETTING_NAME;

		$values = array(
			'0',
			false,
			true,
			0,
			-343,
			null,
			444,
			'merge',
			'castle -sand',
		);

		foreach ( $values as $value ) {
			$_POST[ $class::get_setting_name() ] = array( $class::SEARCH_KEYWORDS__SETTING_NAME => $value );
			$sanitized_val                       = $class->get_submitted_sanitized_setting();
			$this->assertArrayHasKey( $search_key, $sanitized_val );
			$this->assertTrue( is_string( $sanitized_val[ $search_key ] ) );

			$_POST[ $class::get_setting_name() ] = $value;
			$sanitized_val                       = $class->get_submitted_sanitized_setting();
			$this->assertArrayHasKey( $search_key, $sanitized_val );
			$this->assertTrue( is_string( $sanitized_val[ $search_key ] ) );
		}
	}

	/**
	 * @dataProvider add_query_arg_settings_provider
	 */
	public function test__add_query_arg( $setting = null ) {
		$class         = self::$class_instance;
		$full_settings = array( $class::get_setting_name() => $setting );

		$query_var       = $class::add_query_arg( array(), $full_settings );
		$valid_query_var = ( ! isset( $query_var['s'] ) ) || ( ! empty( $query_var['s'] ) );
		$this->assertTrue( $valid_query_var );
	}

	public function sanitization_provider() {
		$search_key = Search::SEARCH_KEYWORDS__SETTING_NAME;

		$simple_values = array(
			array( '0' ),
			array( false ),
			array( true ),
			array( 0 ),
			array( -343 ),
			array( null ),
			array( 444 ),
			array( 'merge' ),
			array( 'castle -sand' ),
		);

		$setting_values = array();

		foreach ( $simple_values as $value ) {
			array_push( $setting_values, array( array( $search_key => $value[0] ) ) );
		}

		return array_merge( $simple_values, $setting_values );
	}

	public function add_query_arg_settings_provider() {
		$data_provider_values = $this->sanitization_provider();
		$to_provide           = array();

		foreach ( $data_provider_values as $value ) {
			foreach ( $value as $sanitization_value ) {
				$to_provide_val = Search::sanitize_setting( $sanitization_value );
				array_push( $to_provide, array( $to_provide_val ) );
			}
		}

		// Additional value for code coverage.
		$additional = array( array( null ) );

		return array_merge( $to_provide, $additional );
	}
}
