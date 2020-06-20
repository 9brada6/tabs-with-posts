<?php

namespace TWRP\Query_Setting;

use PHPUnit\Framework\TestCase;
use Masterminds\HTML5;

/**
 * @covers \TWRP\Query_Setting\Post_Status
 * @phan-file-suppress PhanThrowTypeAbsentForCall
 */
class Post_Status_Test extends TestCase {

	use Verify_Basic_Settings;

	/**
	 * @var \TWRP\Query_Setting\Post_Status
	 */
	public static $class_instance;

	public static $settings_keys = array();

	public static $post_statuses_key = '';

	public static function setUpBeforeClass() {
		self::$class_instance = new Post_Status();

		self::$post_statuses_key = self::$class_instance::POST_STATUSES__SETTING_NAME;

		self::$settings_keys = array(
			self::$post_statuses_key,
		);

		register_post_status( 'test_public_status', array( 'public' => true ) );
		register_post_status( 'test_internal_status', array( 'internal' => true ) );

	}

	/**
	 * @covers \TWRP\Query_Setting\Post_Status::get_setting_name
	 */
	public function test__get_setting_name() {
		$this->verify_setting_name( self::$class_instance );
	}

	/**
	 * @covers \TWRP\Query_Setting\Post_Status::get_title
	 */
	public function test__get_title() {
		$this->verify_title( self::$class_instance );
	}

	/**
	 * @covers \TWRP\Query_Setting\Post_Status::setting_is_collapsed
	 */
	public function test__setting_is_collapsed() {
		$this->verify_setting_is_collapsed( self::$class_instance );
	}

	/**
	 * @covers \TWRP\Query_Setting\Post_Status::display_setting
	 */
	public function test__display_setting() {
		$class            = self::$class_instance;
		$settings_to_test = array(
			$class::get_default_setting(),
			array(
				self::$post_statuses_key => array( 'pending', 'publish' ),
			),
		);

		foreach ( $settings_to_test as $setting ) {
			foreach ( self::$settings_keys as $setting_key ) {
				$name_attr_regex = 'name="' . $class::get_setting_name() . '\[' . $setting_key . '\]\[.+\]"';
				$this->expectOutputRegex( '/' . $name_attr_regex . '/' );
			}

			// Get the return value and the displayed html.
			// @phan-suppress-next-line PhanTypeVoidAssignment
			$return_value = $class->display_setting( $setting );
			$html         = $this->getActualOutput();

			$this->assertTrue( is_null( $return_value ) );

			$html5_parser = new Html5();
			$html5_parser->loadHTMLFragment( $html );
			$this->assertFalse( $html5_parser->hasErrors() );
		}
	}

	/**
	 * @covers \TWRP\Query_Setting\Post_Status::get_post_statuses
	 */
	public function test__get_post_statuses() {
		$post_statuses = self::$class_instance::get_post_statuses();

		$this->assertArrayHasKey( 'publish', $post_statuses );
		$this->assertArrayHasKey( 'pending', $post_statuses );
		$this->assertArrayHasKey( 'test_public_status', $post_statuses );
		$this->assertArrayNotHasKey( 'test_internal_status', $post_statuses );
	}

	/**
	 * @covers \TWRP\Query_Setting\Post_Status::get_default_setting
	 */
	public function test__get_default_setting() {
		$this->verify_get_default_setting( self::$class_instance, self::$settings_keys );
		$return_value = self::$class_instance::get_default_setting();
		$this->assertEmpty( $return_value[ self::$post_statuses_key ] );
	}

	/**
	 * @dataProvider sanitization_provider
	 * @covers \TWRP\Query_Setting\Post_Status::sanitize_setting
	 *
	 * @param mixed $value
	 */
	public function test_sanitize_setting( $value ) {
		$class             = self::$class_instance;
		$post_statuses_key = self::$post_statuses_key;

		$sanitized_value = $class::sanitize_setting( $value );
		$this->assertArrayHasKey( $post_statuses_key, $sanitized_value );
		$this->assertTrue( is_array( $sanitized_value[ $post_statuses_key ] ) );

	}

	/**
	 * @covers \TWRP\Query_Setting\Post_Status::sanitize_setting
	 */
	public function test_sanitize_setting_2() {
		$class              = self::$class_instance;
		$to_sanitize        = array(
			self::$post_statuses_key => array( 'test_public_status', 'test_internal_status', 'pending' ),
		);
		$to_sanitize_equals = array(
			self::$post_statuses_key => array( 'test_public_status', 'pending' ),
		);

		$to_sanitize_2        = array(
			self::$post_statuses_key => array( 'test_internal_status' ),
		);
		$to_sanitize_equals_2 = array(
			self::$post_statuses_key => array(),
		);

		$to_sanitize_3        = array(
			self::$post_statuses_key => array(),
		);
		$to_sanitize_equals_3 = array(
			self::$post_statuses_key => array(),
		);

		$to_sanitize_4        = array(
			self::$post_statuses_key => array( null, array( 'published' ), 543 ),
		);
		$to_sanitize_equals_4 = array(
			self::$post_statuses_key => array(),
		);

		$this->assertEquals( $class::sanitize_setting( $to_sanitize ), $to_sanitize_equals );
		$this->assertEquals( $class::sanitize_setting( $to_sanitize_2 ), $to_sanitize_equals_2 );
		$this->assertEquals( $class::sanitize_setting( $to_sanitize_3 ), $to_sanitize_equals_3 );
		$this->assertEquals( $class::sanitize_setting( $to_sanitize_4 ), $to_sanitize_equals_4 );
	}

	/**
	 * @dataProvider sanitization_provider
	 * @covers \TWRP\Query_Setting\Post_Status::get_submitted_sanitized_setting
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
	 * @covers \TWRP\Query_Setting\Post_Status::add_query_arg
	 *
	 * @param mixed $setting
	 */
	public function test__add_query_arg( $setting ) {
		$class         = self::$class_instance;
		$full_settings = array( $class::get_setting_name() );

		$result = $class::add_query_arg( array(), $full_settings );

		$is_not_added = empty( $result );
		$is_added     = ( ! empty( $result['post_status'] ) );

		$this->assertTrue( $is_added || $is_not_added );
	}

	/**
	 * @covers \TWRP\Query_Setting\Post_Status::add_query_arg
	 */
	public function test__add_query_arg_2() {
		$class = self::$class_instance;

		$to_add_1 = array( $class::get_setting_name() => array( self::$post_statuses_key => array( 'publish', 'whatever' ) ) );
		$result_1 = array( 'post_status' => array( 'publish', 'whatever' ) );

		$to_add_2 = array( $class::get_setting_name() => array( self::$post_statuses_key => array() ) );
		$result_2 = array();

		$to_add_3 = array( $class::get_setting_name() => 'publish' );
		$result_3 = array();

		$this->assertEquals( $class::add_query_arg( array(), $to_add_1 ), $result_1 );
		$this->assertEquals( $class::add_query_arg( array(), $to_add_2 ), $result_2 );
		$this->assertEquals( $class::add_query_arg( array(), $to_add_3 ), $result_3 );
	}

	#region -- Data Providers

	public function sanitization_provider() {
		self::setUpBeforeClass();
		$post_statuses_key = self::$post_statuses_key;
		$basic_values      = $this->get_basic_types_data_provider();

		/**
		 * After basic values, add the values to the setting key.
		 */
		$setting_values = array();
		foreach ( $basic_values as $basic_value_array ) {
			$basic_value = $basic_value_array[0];

			$to_test_value = array(
				$post_statuses_key => $basic_value,
				'not_valid_key'    => $basic_value,
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
