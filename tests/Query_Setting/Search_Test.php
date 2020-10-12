<?php

namespace TWRP\Query_Setting;

use PHPUnit\Framework\TestCase;

/**
 * @covers \TWRP\Query_Setting\Search
 */
class Search_Test extends TestCase {

	use Verify_Basic_Settings;

	/**
	 * @var \TWRP\Query_Setting\Search
	 */
	public static $class_instance;

	public static $settings_keys = array();

	public static $search_key = '';

	public static function setUpBeforeClass() {
		self::$class_instance = new Search();
		self::$search_key     = self::$class_instance::SEARCH_KEYWORDS__SETTING_NAME;

		self::$settings_keys = array(
			self::$search_key,
		);
	}

	/**
	 * @covers \TWRP\Query_Setting\Search::get_setting_name
	 */
	public function test__get_setting_name() {
		$this->verify_setting_name( self::$class_instance );
	}

	/**
	 * @covers \TWRP\Query_Setting\Search::get_title
	 */
	public function test__get_title() {
		$this->verify_title( self::$class_instance );
	}

	/**
	 * @covers \TWRP\Query_Setting\Search::setting_is_collapsed
	 */
	public function test__setting_is_collapsed() {
		$this->verify_setting_is_collapsed( self::$class_instance );
	}

	/**
	 * @covers \TWRP\Query_Setting\Search::get_default_setting
	 */
	public function test__get_default_setting() {
		$this->verify_get_default_setting( self::$class_instance, self::$settings_keys );
	}

	/**
	 * @covers \TWRP\Query_Setting\Search::display_setting
	 */
	public function test__display_setting() {
		$this->verify_display_the_setting( self::$class_instance, self::$settings_keys, self::$class_instance::get_default_setting() );
	}

	/**
	 * @dataProvider sanitization_provider
	 * @covers \TWRP\Query_Setting\Search::sanitize_setting
	 *
	 * @param mixed $value
	 */
	public function test__sanitize_setting( $value ) {
		$class      = self::$class_instance;
		$search_key = self::$search_key;

		$sanitized_value = $class::sanitize_setting( $value );
		$this->assertArrayHasKey( $search_key, $sanitized_value );
		$this->assertTrue( is_string( $sanitized_value[ $search_key ] ) );

		return $sanitized_value;
	}

	/**
	 * @dataProvider sanitization_provider
	 * @covers \TWRP\Query_Setting\Search::get_submitted_sanitized_setting
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
	 *
	 * @param mixed $setting
	 */
	public function test__add_query_arg( $setting ) {
		$class         = self::$class_instance;
		$full_settings = array( $class::get_setting_name() => $setting );

		$query_var       = $class::add_query_arg( array(), $full_settings );
		$valid_query_var = ( ! isset( $query_var['s'] ) ) || ( ! empty( $query_var['s'] ) );
		$this->assertTrue( $valid_query_var );
	}

	/**
	 * @dataProvider add_query_arg_settings_provider
	 */
	public function test__add_query_arg_2() {
		$class      = self::$class_instance;
		$search_key = self::$search_key;

		$to_add_1 = array( $class::get_setting_name() => array( $search_key => 'a search -string' ) );
		$result_1 = array( 's' => 'a search -string' );

		$to_add_2 = array( $class::get_setting_name() => array( $search_key => 'a' ) );
		$result_2 = array( 's' => 'a' );

		$to_add_3 = array( $class::get_setting_name() => array( $search_key => '' ) );
		$result_3 = array();

		$this->assertSame( $class::add_query_arg( array(), $to_add_1 ), $result_1 );
		$this->assertSame( $class::add_query_arg( array(), $to_add_2 ), $result_2 );
		$this->assertSame( $class::add_query_arg( array(), $to_add_3 ), $result_3 );
	}

	#region -- Data Providers

	public function sanitization_provider() {
		self::setUpBeforeClass();
		$search_key   = self::$search_key;
		$basic_values = $this->get_basic_types_data_provider();

		/**
		 * After basic values, add the values to the setting key.
		 */
		$setting_values = array();
		foreach ( $basic_values as $basic_value_array ) {
			$basic_value = $basic_value_array[0];

			$to_test_value = array(
				$search_key     => $basic_value,
				'not_valid_key' => $basic_value,
			);

			array_push( $setting_values, array( $to_test_value ) );
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
