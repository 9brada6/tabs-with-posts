<?php

namespace TWRP\Query_Setting;

use PHPUnit\Framework\TestCase;

class Sticky_Posts_Test extends TestCase {
	public function test_get_default_setting() {
		$this->assertArrayHasKey( Sticky_Posts::INCLUSION__SETTING_NAME, Sticky_Posts::get_default_setting() );
	}
}
