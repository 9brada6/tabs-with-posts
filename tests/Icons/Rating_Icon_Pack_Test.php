<?php
/**
 * File that contains the class with the same name.
 */

namespace TWRP\Icons;

use RuntimeException;
use WP_UnitTestCase;

/**
 * Test the Rating Icon Pack class.
 *
 * @covers TWRP\Icons\Rating_Icon_Pack
 */
class Rating_Icon_Pack_Test extends WP_UnitTestCase {

	public function test__basic_functions() {
		$rating_pack_attr = SVG_Manager::get_rating_packs_attr();
		$rating_pack_attr = $rating_pack_attr['twrp-hearts'];

		// For a valid icon pack id, returns a correct object.
		$rating_pack = SVG_Manager::get_rating_pack( 'twrp-hearts' );
		$this->assertTrue( $rating_pack instanceof Rating_Icon_Pack ); // @phan-suppress-current-line PhanRedundantCondition

		$this->assertTrue( $rating_pack->get_id() === 'twrp-hearts' );
		$this->assertTrue( $rating_pack->get_description() === $rating_pack_attr['description'] );
		$this->assertTrue( $rating_pack->get_brand() === $rating_pack_attr['brand'] );

		// Test methods that return Icons.
		$this->assertTrue( $rating_pack->get_empty_icon() instanceof Icon );
		$this->assertTrue( $rating_pack->get_half_filled_icon() instanceof Icon );
		$this->assertTrue( $rating_pack->get_filled_icon() instanceof Icon );

		$this->assertTrue( is_string( $rating_pack->get_option_pack_description() ) );
		$this->assertStringContainsString( $rating_pack->get_brand(), $rating_pack->get_option_pack_description( true ) );
		$this->assertTrue( $rating_pack->get_option_pack_description( false ) === $rating_pack->get_option_pack_description() );
	}

	public function test__nest_packs_by_brands() {
		$rating_pack_nested_by_brands = Rating_Icon_Pack::nest_packs_by_brands( SVG_Manager::get_rating_packs() );
		$icons_pack_nested_is_wrong   = false;
		$number_of_packs              = 0;
		foreach ( $rating_pack_nested_by_brands as $brand => $icon_packs ) {
			foreach ( $icon_packs as $icon_pack ) {
				if ( $icon_pack->get_brand() !== $brand ) {
					$icons_pack_nested_is_wrong = true;
				}

				$number_of_packs++;
			}
		}

		$this->assertTrue( count( SVG_Manager::get_rating_packs() ) === $number_of_packs );
		$this->assertFalse( $icons_pack_nested_is_wrong );
	}

	/**
	 * For a bad icon pack id, throw an error.
	 */
	public function test__constructor_throw_exception() {
		$this->expectException( RuntimeException::class );
		$icon = SVG_Manager::get_rating_pack( 'bad-id' );
	}
}
