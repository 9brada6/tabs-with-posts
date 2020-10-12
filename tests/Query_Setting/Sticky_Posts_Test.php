<?php
/**
 * @phan-file-suppress PhanThrowTypeAbsentForCall
 */

namespace TWRP\Query_Setting;

use PHPUnit\Framework\TestCase;

class Sticky_Posts_Test extends TestCase {

	use Verify_Basic_Settings;

	/**
	 * @var \TWRP\Query_Setting\Sticky_Posts
	 */
	public static $class_instance;

	public static $settings_keys = array();

	public static function setUpBeforeClass() {
		self::$class_instance = new Sticky_Posts();
		self::$settings_keys  = array(
			Sticky_Posts::INCLUSION__SETTING_NAME,
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

	/**
	 * @covers \TWRP\Query_Setting\Sticky_Posts::get_default_setting
	 */
	public function test__get_default_setting() {
		$this->verify_get_default_setting( self::$class_instance, self::$settings_keys );
	}

	/**
	 * @covers \TWRP\Query_Setting\Sticky_Posts::display_setting
	 */
	public function test__display_setting( $setting = null ) {
		$this->verify_display_the_setting( self::$class_instance, self::$settings_keys, self::$class_instance::get_default_setting() );
	}

	public function test__get_submitted_sanitized_setting() {
		$class         = self::$class_instance;
		$inclusion_key = $class::INCLUSION__SETTING_NAME;

		$values_should_return_not_include = array(
			'not_include',
			'includes',
			'',
			'0',
			432,
			false,
			true,
			array(),
			array( 'include' ),
			'include',
		);

		$this->assertSame( $class->get_submitted_sanitized_setting(), $class::get_default_setting() );

		foreach ( $values_should_return_not_include as $value_setting ) {
			$_POST[ $class::get_setting_name() ] = array( $inclusion_key => $value_setting );

			$returned           = $class->get_submitted_sanitized_setting();
			$returned_sanitized = $class::sanitize_setting( array( $inclusion_key => $value_setting ) );

			$this->assertSame( $returned, $returned_sanitized );

			$_POST[ $class::get_setting_name() ] = $value_setting;

			$returned           = $class->get_submitted_sanitized_setting();
			$returned_sanitized = $class::sanitize_setting( $value_setting );

			$this->assertSame( $returned, $returned_sanitized );
		}

	}

	public function test__sanitize_setting() {
		$class         = self::$class_instance;
		$inclusion_key = $class::INCLUSION__SETTING_NAME;

		$returned = $class::sanitize_setting( array( $inclusion_key => 'include' ) );
		$this->assertSame( $returned[ $inclusion_key ], 'include' );

		$values_should_return_not_include = array(
			'not_include',
			'includes',
			'',
			'0',
			432,
			false,
			true,
			array(),
			array( 'include' ),
		);
		foreach ( $values_should_return_not_include as $value_setting ) {
			$returned = $class::sanitize_setting( array( $inclusion_key => $value_setting ) );
			$this->assertSame( $returned[ $inclusion_key ], 'not_include' );
			$returned = $class::sanitize_setting( $value_setting );
			$this->assertSame( $returned[ $inclusion_key ], 'not_include' );
		}
	}

	public function test__add_query_arg() {
		$class          = self::$class_instance;
		$funct_settings = array(
			$class::get_setting_name() => $class::get_default_setting(),
		);

		// By default should have an array key and be true.
		$query = $class::add_query_arg( array(), $funct_settings );
		$this->assertCount( 1, $query );
		$this->assertTrue( $query['ignore_sticky_posts'] );

		// Should include sticky posts.
		$funct_settings[ $class::get_setting_name() ][ $class::INCLUSION__SETTING_NAME ] = 'include';
		$query = $class::add_query_arg( array(), $funct_settings );
		$this->assertCount( 1, $query );
		$this->assertFalse( $query['ignore_sticky_posts'] );

		// Should not include sticky posts.
		$funct_settings[ $class::get_setting_name() ][ $class::INCLUSION__SETTING_NAME ] = 'not_include';
		$query = $class::add_query_arg( array(), $funct_settings );
		$this->assertCount( 1, $query );
		$this->assertTrue( $query['ignore_sticky_posts'] );
	}

}
