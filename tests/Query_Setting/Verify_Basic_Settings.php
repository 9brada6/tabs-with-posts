<?php

namespace TWRP\Query_Generator\Query_Setting;

use Masterminds\HTML5;

/**
 * Verify if the main setting name corresponds to what its needed.
 *
 * @inherits \PHPUnit\Framework\TestCase
 */
trait Verify_Basic_Settings {


	public function verify_setting_name( $class_instance ) {
		$name = $class_instance::get_setting_name();
		$this->assertTrue( is_string( $name ) );
		$this->assertTrue( strlen( $name ) > 4 );
		$this->assertRegExp( '/^[a-z_]+$/', $name );
	}

	public function verify_title( $class_instance ) {
		$title = $class_instance->get_title();
		$this->assertTrue( is_string( $title ) );
		$this->assertTrue( strlen( $title ) > 6 );
	}

	public function verify_setting_is_collapsed( $class_instance ) {
		$setting = $class_instance::setting_is_collapsed();

		$value_is_correct_type = ( is_bool( $setting ) || 'auto' === $setting );
		$this->assertTrue( $value_is_correct_type );
	}

	public function verify_get_default_setting( $class_instance, $settings_keys ) {
		$default_setting = $class_instance::get_default_setting();
		foreach ( $settings_keys as $key ) {
			$this->assertArrayHasKey( $key, $default_setting );
		}
		$this->assertCount( count( $settings_keys ), $default_setting );
	}

	public function verify_display_the_setting( $class_instance, $settings_keys, $settings ) {
		foreach ( $settings_keys as $setting_key ) {
			$name_attr_regex = 'name="' . $class_instance::get_setting_name() . '\[' . $setting_key . '\]"';
			$this->expectOutputRegex( '/' . $name_attr_regex . '/' );
		}

		// Get the return value and the displayed html.
		$return_value = $class_instance->display_setting( $settings );
		$html         = $this->getActualOutput();

		$this->assertTrue( is_null( $return_value ) );

		$html5_parser = new Html5();
		$html5_parser->loadHTMLFragment( $html );
		$this->assertFalse( $html5_parser->hasErrors() );
	}

	/**
	 * Return an array with basic types.
	 *
	 * @return array<mixed>
	 */
	public function get_basic_types() {
		return array(
			null,
			'a_string',
			'a string with spaces',
			'',
			true,
			false,
			0,
			1,
			-1,
			'0',
			'1',
			'-1',
		);
	}

	/**
	 * Return an array with each basic type in an array.
	 *
	 * @return array<array<mixed>>
	 */
	public function get_basic_types_data_provider() {
		$basic_types = array(
			'a_string',
			'a string with spaces',
			'',
			true,
			false,
			0,
			1,
			-1,
			'0',
			'1',
			'-1',
		);

		foreach ( $basic_types as &$basic_type ) {
			$basic_type = array( $basic_type );
		}

		return $basic_types;
	}
}
