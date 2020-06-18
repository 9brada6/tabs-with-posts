<?php

namespace TWRP\Query_Setting;

use PHPUnit\Framework\TestCase;

class Post_Types_Test extends TestCase {

	use Verify_Basic_Settings;

	/**
	 * @var \TWRP\Query_Setting\Post_Types
	 */
	public static $class_instance;

	public static $settings_keys = array();

	public static function setUpBeforeClass() {
		self::$class_instance = new Post_Types();
		self::$settings_keys  = array(
			self::$class_instance::SELECTED_TYPES__SETTING_NAME,
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

}
