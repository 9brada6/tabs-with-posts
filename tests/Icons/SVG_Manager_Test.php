<?php
/**
 * File that contains the class with the same name.
 */

namespace TWRP\Icons;

use WP_UnitTestCase;
use RuntimeException;

/**
 * Tests the Icon_Factory class methods that remains untested. Other tests are
 * made in Definitions_Test.php file.
 *
 * @covers \TWRP\Icons\Icon_Factory
 */
class SVG_Manager_Test extends WP_UnitTestCase {

	/**
	 * @covers \TWRP\Icons\SVG_Manager::get_compatible_disabled_comment_icon_id
	 *
	 * @psalm-suppress InvalidScalarArgument
	 */
	public function test__get_compatible_disabled_comment_icon_id() {
		$icon_id = Icon_Factory::get_compatible_disabled_comment_icon_id( 'wrong_id' );
		$this->assertNull( $icon_id );

		// @phan-suppress-next-line PhanTypeMismatchArgument
		$icon_id = Icon_Factory::get_compatible_disabled_comment_icon_id( 30 );
		$this->assertNull( $icon_id );

		$icon = Icon_Factory::get_compatible_disabled_comment_icon( 'wrong_id' );
		$this->assertNull( $icon );
	}

	/**
	 * @covers \TWRP\Icons\SVG_Manager::get_category_aria_label
	 * @psalm-suppress RedundantCondition
	 */
	// public function test__get_category_aria_label() {
	// $categories_aria_label = SVG_Manager::get_category_aria_label();
	// $number_of_cat         = 7;

	// $is_correct = true;
	// @phan-suppress-next-line PhanSuspiciousValueComparison
	// if ( count( $categories_aria_label ) !== $number_of_cat || count( SVG_Manager::ICON_CATEGORY_CLASS ) !== $number_of_cat || count( SVG_Manager::ICON_CATEGORY_FOLDER ) !== $number_of_cat ) {
	// $is_correct = false;
	// }

	// $this->assertTrue( $is_correct, 'Number of categories do not match across const variables.' );
	// }

	/**
	 * @covers \TWRP\Icons\Icon_Factory::get_icon_attr
	 * @covers \TWRP\Icons\Icon_Factory::get_icon_category
	 */
	public function test__get_icon_attr__get_icon_category() {
		$icons_attr = Icon_Factory::get_all_icons_attr();

		$works = true;
		foreach ( $icons_attr as $icon_id => $icon_attr ) {
			if ( Icon_Factory::get_icon_attr( $icon_id ) !== $icon_attr ) {
				$works = false;
			}
		}

		$this->assertTrue( $works );

		$this->assertFalse( Icon_Factory::get_icon_attr( 'bad-icon' ) );

		$this->expectException( RuntimeException::class );
		Icon_Factory::get_icon_category( 'bad-icon' ); // @phan-suppress-current-line PhanThrowTypeAbsentForCall
	}
}
