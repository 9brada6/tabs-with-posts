<?php
/**
 * File that contains the class with the same name.
 */

namespace TWRP\Icons;

use WP_UnitTestCase;
use RuntimeException;
use Masterminds\HTML5;

/**
 * Test the Icon class.
 */
class Icon_Test extends WP_UnitTestCase {

	/**
	 * @covers TWRP\Icons\Icon::__construct
	 * @covers TWRP\Icons\Icon::get_id
	 * @covers TWRP\Icons\Icon::get_description
	 * @covers TWRP\Icons\Icon::get_brand
	 * @covers TWRP\Icons\Icon::get_icon_type
	 * @covers TWRP\Icons\Icon::get_fix_classes
	 */
	public function test__basic_functions() {
		$icons_attr       = SVG_Manager::get_all_icons_attr();
		$random_icon_id   = array_rand( $icons_attr );
		$random_icon_attr = $icons_attr[ $random_icon_id ];

		// For a valid icon pack id, returns a correct object.
		$icon = new Icon( $random_icon_id ); // @phan-suppress-current-line PhanPartialTypeMismatchArgument
		$this->assertTrue( $icon instanceof Icon ); // @phan-suppress-current-line PhanRedundantCondition

		$this->assertTrue( $icon->get_id() === $random_icon_id );
		$this->assertTrue( $icon->get_description() === $random_icon_attr['description'] );
		$this->assertTrue( $icon->get_brand() === $random_icon_attr['brand'] );
		$this->assertTrue( $icon->get_icon_type() === $random_icon_attr['type'] );

		$fix_classes = ( isset( $random_icon_attr['fix_classes'] ) ? $random_icon_attr['fix_classes'] : '' );
		$this->assertTrue( $icon->get_fix_classes() === $fix_classes );

		// For code coverage.
		$icon = new Icon( $random_icon_id, $random_icon_attr ); // @phan-suppress-current-line PhanPartialTypeMismatchArgument

		$this->expectException( RuntimeException::class );
		$icon = new Icon( 'bad-id' );
	}

	/**
	 * @covers TWRP\Icons\Icon::get_icon_filename
	 * @covers TWRP\Icons\Icon::get_brand_folder
	 */
	public function test__get_icon_filename() {
		$icons_attr     = SVG_Manager::get_all_icons_attr();
		$random_icon_id = array_rand( $icons_attr );
		$icon           = new Icon( $random_icon_id ); // @phan-suppress-current-line PhanPartialTypeMismatchArgument

		$this->assertTrue( file_exists( $icon->get_icon_file_path() ) ); // @phan-suppress-current-line PhanPossiblyFalseTypeArgumentInternal

		$false_icon_attr              = $icons_attr[ $random_icon_id ];
		$false_icon_attr['file_name'] = 'bad_filename';
		$icon                         = new Icon( 'bad-id', $false_icon_attr );
		$this->assertFalse( $icon->get_icon_file_path() );
	}

	/**
	 * @covers TWRP\Icons\Icon::get_html
	 * @covers TWRP\Icons\Icon::display
	 */
	public function test__get_html() {
		$icons_attr       = SVG_Manager::get_all_icons_attr();
		$random_icon_id   = array_rand( $icons_attr );
		$random_icon_attr = $icons_attr[ $random_icon_id ];

		$random_icon_attr['fix_classes'] = 'some_class';
		$icon                            = new Icon( $random_icon_id, $random_icon_attr ); // @phan-suppress-current-line PhanPartialTypeMismatchArgument

		ob_start();
		$icon->display();
		$output = ob_get_clean();

		$this->assertTrue( $icon->get_html() === $output );

		$html5_parser = new Html5();
		$html5_parser->loadHTMLFragment( $icon->get_html() );
		$this->assertFalse( $html5_parser->hasErrors() );
		$this->assertStringContainsString( 'html_class', $icon->get_html( 'html_class' ) );
	}

	/**
	 * @covers TWRP\Icons\Icon::get_icon_svg_definition
	 */
	public function test__get_icon_svg_definition() {
		$icons_attr       = SVG_Manager::get_all_icons_attr();
		$random_icon_id   = array_rand( $icons_attr );
		$random_icon_attr = $icons_attr[ $random_icon_id ];
		$icon             = new Icon( $random_icon_id, $random_icon_attr ); // @phan-suppress-current-line PhanPartialTypeMismatchArgument

		$html5_parser = new Html5();
		$html5_parser->loadHTMLFragment( $icon->get_icon_svg_definition() ); // @phan-suppress-current-line PhanPossiblyFalseTypeArgument
		$this->assertFalse( $html5_parser->hasErrors() );

		// Trigger svg definition cache for coverage.
		$icon->get_icon_svg_definition();

		$icon = new Icon( 'bad-id', $random_icon_attr );
		$this->assertFalse( $icon->get_icon_svg_definition() );
	}

	/**
	 * @covers TWRP\Icons\Icon::nest_icons_by_brands
	 */
	public function test__nest_icons_by_brands() {
		$all_nested_icons = Icon::nest_icons_by_brands( SVG_Manager::get_all_icons() );
		$nested_is_wrong  = false;
		$number_of_packs  = 0;

		foreach ( $all_nested_icons as $brand => $same_brand_icons ) {
			foreach ( $same_brand_icons as $icon ) {
				if ( $icon->get_brand() !== $brand ) {
					$nested_is_wrong = true;
				}

				$number_of_packs++;
			}
		}

		$this->assertTrue( count( SVG_Manager::get_all_icons() ) === $number_of_packs );
		$this->assertFalse( $nested_is_wrong );
	}

	/**
	 * @covers TWRP\Icons\Icon::get_option_icon_description
	 */
	public function test__get_option_icon_description() {
		$icons_attr     = SVG_Manager::get_all_icons_attr();
		$random_icon_id = array_rand( $icons_attr );
		$icon           = new Icon( $random_icon_id, $icons_attr[ $random_icon_id ] ); // @phan-suppress-current-line PhanPartialTypeMismatchArgument

		$this->assertTrue( is_string( $icon->get_option_icon_description() ) );
		$this->assertStringContainsString( $icon->get_brand(), $icon->get_option_icon_description( true ) );
		$this->assertTrue( $icon->get_option_icon_description( false ) === $icon->get_option_icon_description() );
	}

	/**
	 * @covers TWRP\Icons\Icon::get_icon_category_class
	 */
	public function test__get_icon_category_class() {
		$all_icons = SVG_Manager::get_all_icons();

		$all_icons_category = true;
		foreach ( $all_icons as $icon ) {
			if ( strlen( $icon->get_icon_category_class() ) === 0 || strpos( $icon->get_icon_category_class(), 'twrp-i--' ) === false ) {
				$all_icons_category = false;
			}
		}
		$this->assertTrue( $all_icons_category );

		$icons_attr     = SVG_Manager::get_all_icons_attr();
		$random_icon_id = array_rand( $icons_attr );
		$wrong_icon     = new Icon( 'bad-id', $icons_attr[ $random_icon_id ] );

		$this->assertTrue( strlen( $wrong_icon->get_icon_category_class() ) === 0 );
	}

	/**
	 * @covers TWRP\Icons\Icon::get_icon_aria_label
	 */
	public function test__get_icon_aria_label() {
		$all_icons = SVG_Manager::get_all_icons();

		$all_icons_have_label = true;
		foreach ( $all_icons as $icon ) {
			if ( strlen( $icon->get_icon_aria_label() ) === 0 ) {
				$all_icons_have_label = false;
			}
		}
		$this->assertTrue( $all_icons_have_label );

		$icons_attr     = SVG_Manager::get_all_icons_attr();
		$random_icon_id = array_rand( $icons_attr );
		$wrong_icon     = new Icon( 'bad-id', $icons_attr[ $random_icon_id ] );

		$this->assertTrue( strlen( $wrong_icon->get_icon_aria_label() ) === 0 );
	}

	/**
	 * @throws RuntimeException Phpcs comment.
	 *
	 * @covers TWRP\Icons\Icon::get_folder_name_category
	 * @covers TWRP\Icons\Icon::get_icon_category
	 */
	public function test__get_folder_name_category__get_icon_category() {
		$all_icons = SVG_Manager::get_all_icons();

		foreach ( $all_icons as $icon ) {
			$icon->get_folder_name_category();
		}

		$icons_attr     = SVG_Manager::get_all_icons_attr();
		$random_icon_id = array_rand( $icons_attr );
		$wrong_icon     = new Icon( 'bad-id', $icons_attr[ $random_icon_id ] );

		$this->expectException( RuntimeException::class );
		$wrong_icon->get_folder_name_category();
	}
}
