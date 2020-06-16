<?php

namespace TWRP\Query_Setting;

use PHPUnit\Framework\Assert;
use Masterminds\HTML5;

/**
 * Verify if the main setting name corresponds to what its needed.
 */
trait Verify_Basic_Settings {

	public function verify_setting_name( $class_instance ) {
		$name = $class_instance::get_setting_name();
		Assert::assertTrue( is_string( $name ) );
		Assert::assertTrue( strlen( $name ) > 4 );
		Assert::assertRegExp( '/^[a-z_]+$/', $name );
	}

	public function verify_title( $class_instance ) {
		$title = $class_instance->get_title();
		Assert::assertTrue( is_string( $title ) );
		Assert::assertTrue( strlen( $title ) > 6 );
	}

	public function verify_setting_is_collapsed( $class_instance ) {
		$setting = $class_instance::setting_is_collapsed();

		$value_is_correct_type = ( is_bool( $setting ) || 'auto' === $setting );
		Assert::assertTrue( $value_is_correct_type );
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
}