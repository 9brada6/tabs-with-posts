<?php

namespace TWRP\Icons;

use WP_UnitTestCase;

class Icons_Definitions_Test extends WP_UnitTestCase {

	/**
	 * Check if an icon Id is the same as in file that reference it.
	 */
	public function test__id_match_in_file() {
		$icons     = SVG_Manager::get_all_icons();
		$wrong_ids = array();

		foreach ( $icons as $icon ) {
			$svg_def = $icon->get_icon_svg_definition();
			if ( ! is_string( $svg_def ) || strstr( $svg_def, 'id="' . $icon->get_id() . '"' ) === false ) {
				array_push( $wrong_ids, $icon->get_id() );
			}
		}

		$error_message = 'Icons ' . implode( ', ', $wrong_ids ) . ' does not match ID with the id in the file.';
		$this->assertTrue( empty( $wrong_ids ), $error_message );
	}

	/**
	 * Test the icons id's to have similar structure.
	 */
	public function test__icons_ids() {
		$all_icons = SVG_Manager::get_all_icons();
		$wrong_ids = array();

		$prefix         = 'twrp-';
		$icon_id_types  = array( 'user', 'tax', 'com', 'dcom', 'rat', 'views', 'cal' );
		$icon_id_brands = array( 'twrp', 'fa', 'goo', 'di', 'fi', 'ii', 'im', 'ci', 'fe', 'ji', 'li', 'oi', 'ti' );

		foreach ( $all_icons as $icon_id => $icon ) {
			// Verify that all Icons start with a prefix.
			if ( strpos( $icon->get_id(), $prefix ) !== 0 ) {
				array_push( $wrong_ids, $icon_id );
				continue;
			}

			$id_sections = explode( '-', $icon_id );

			// Verify that all Icons have a specific category.
			if ( ! in_array( $id_sections[1], $icon_id_types, true ) ) {
				array_push( $wrong_ids, $icon_id );
				continue;
			}

			// Verify that all Icons have a specific brand.
			if ( ! in_array( $id_sections[2], $icon_id_brands, true ) ) {
				array_push( $wrong_ids, $icon_id );
				continue;
			}
		}

		$error_message = 'Icons ' . implode( ', ', $wrong_ids ) . ' does not have correct ID structure.';
		$this->assertTrue( empty( $wrong_ids ), $error_message );
	}

	/**
	 * Test to check that each icon has only one svg element.
	 */
	public function test__icon_only_one_svg_html_elem() {
		$all_icons = SVG_Manager::get_all_icons();
		$wrong_ids = array();

		foreach ( $all_icons as $icon_id => $icon ) {
			$svg_def = $icon->get_icon_svg_definition();

			if ( ! is_string( $svg_def ) || substr_count( $svg_def, 'svg' ) !== 2 ) {
				array_push( $wrong_ids, $icon_id );
			}
		}

		$error_message = 'Icons ' . implode( ', ', $wrong_ids ) . ' does not have only one SVG HTML element.';
		$this->assertTrue( empty( $wrong_ids ), $error_message );
	}

	/**
	 * Test to check that each icon does contain only svg definition and not an
	 * additional XML declaration.
	 */
	public function test__icon_not_have_xml_declaration() {
		$all_icons = SVG_Manager::get_all_icons();
		$wrong_ids = array();

		foreach ( $all_icons as $icon_id => $icon ) {
			$svg_def = $icon->get_icon_svg_definition();

			if ( ! is_string( $svg_def ) || strstr( $svg_def, 'xml' ) !== false ) {
				array_push( $wrong_ids, $icon_id );
			}
		}

		$error_message = 'Icons ' . implode( ', ', $wrong_ids ) . ' does have an XML declaration.';
		$this->assertTrue( empty( $wrong_ids ), $error_message );
	}

	/**
	 * Test to check if type/filename/id acronym match.
	 */
	public function test__icons_description_file_id_match() {
		$all_icons    = SVG_Manager::get_all_icons();
		$icon_matches = array(
			'f'  => array(
				'type'        => 'Filled',
				'file_prefix' => 'filled',
			),
			'ol' => array(
				'type'        => 'Outlined',
				'file_prefix' => 'outlined',
			),
			'sh' => array(
				'type'        => 'Sharp',
				'file_prefix' => 'sharp',
			),
			't'  => array(
				'type'        => 'Thin',
				'file_prefix' => 'thin',
			),
			'dt' => array(
				'type'        => 'DuoTone',
				'file_prefix' => 'duotone',
			),
			'hf' => array(
				'type'        => 'Half Filled',
				'file_prefix' => 'half-filled',
			),
		);
		$wrong_ids    = array();

		foreach ( $all_icons as $icon ) {
			$icon_id        = $icon->get_id();
			$icon_id_pieces = explode( '-', $icon_id );
			$icon_id_type   = $icon_id_pieces[ count( $icon_id_pieces ) - 1 ];

			if ( ! isset( $icon_matches[ $icon_id_type ] ) ) {
				array_push( $wrong_ids, $icon_id );
				continue;
			}

			if ( strstr( $icon->get_icon_type(), $icon_matches[ $icon_id_type ]['type'] ) === false ) {
				array_push( $wrong_ids, $icon_id );
				continue;
			}

			if ( strstr( $icon->get_icon_filename(), $icon_matches[ $icon_id_type ]['file_prefix'] ) === false ) {
				array_push( $wrong_ids, $icon_id );
				continue;
			}
		}

		$error_message = 'Icons ' . implode( ', ', $wrong_ids ) . ' does not correspond in terms of type/file name/id acronym.';
		$this->assertTrue( empty( $wrong_ids ), $error_message );
	}

	/**
	 * Return an array with all attributes present in all icons. The attributes
	 * are only the one we care to not be present.
	 */
	public function test__icons_must_be_missing_attributes() {
		$icons = SVG_Manager::get_all_icons();

		$attributes   = array( 'class', 'role', 'focusable', 'aria', ' "', '  ', "\t" );
		$regex_verify = array( '/#(\d|[abcdef]){3}/i' );
		$wrong_ids    = array();

		foreach ( $icons as $icon ) {
			$svg_def = $icon->get_icon_svg_definition();

			if ( ! is_string( $svg_def ) ) {
				continue;
			}

			foreach ( $attributes as $attribute ) {
				if ( strpos( $svg_def, $attribute ) !== false ) {
					array_push( $wrong_ids, $icon->get_id() );
				}
			}

			foreach ( $regex_verify as $regex_to_verify ) {
				if ( preg_match( $regex_to_verify, $svg_def ) ) {
					array_push( $wrong_ids, $icon->get_id() );
				}
			}
		}

		$error_message = 'Icons ' . implode( ', ', $wrong_ids ) . ' does contain forbidden attributes.';
		$this->assertTrue( empty( $wrong_ids ), $error_message );
	}

}
