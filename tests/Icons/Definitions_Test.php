<?php
/**
 * File that contains the class with the same name.
 */

namespace TWRP\Icons;

use RuntimeException;
use WP_UnitTestCase;
use TWRP\Utils;
use TWRP_Main;

/**
 * Tests all the icon definitions.
 *
 * @covers \TWRP\Icons\Icon_Factory
 * @covers \TWRP\Icons\Category_Icons
 * @covers \TWRP\Icons\Comments_Disabled_Icons
 * @covers \TWRP\Icons\Comments_Icons
 * @covers \TWRP\Icons\Date_Icons
 * @covers \TWRP\Icons\Rating_Icons
 * @covers \TWRP\Icons\User_Icons
 * @covers \TWRP\Icons\Views_Icons
 */
class Icons_Definitions_Test extends WP_UnitTestCase {

	/**
	 * Test that each folder in the SVG assets have a license, and each brand
	 * have the same license across all folders.
	 */
	public function test__each_folder_have_license() {
		$plugin_folder = Utils::get_plugin_directory_path();
		$svg_folder    = $plugin_folder . TWRP_Main::SVG_FOLDER;

		$folders_without_license      = array();
		$brands_with_not_same_license = array();

		$brands_licenses = array();

		$folders = scandir( $svg_folder );
		if ( false === $folders ) {
			$this->assertTrue( false, 'Cannot find assets svg folders.' );
		}

		foreach ( $folders as $folder ) {
			if ( '.' === $folder || '..' === $folder || strpos( $folder, '.' ) !== false ) {
				continue;
			}

			$brand_folders = scandir( trailingslashit( $svg_folder ) . $folder );
			if ( false === $brand_folders ) {
				$this->assertTrue( false, 'Cannot find assets svg folders.' );
			}

			foreach ( $brand_folders as $brand_folder ) {
				if ( '.' === $brand_folder || '..' === $brand_folder ) {
					continue;
				}

				$file = trailingslashit( $svg_folder ) . trailingslashit( $folder ) . trailingslashit( $brand_folder ) . 'LICENSE.txt';
				if ( ! file_exists( $file ) ) {
					array_push( $folders_without_license, $file );
				} else {
					if ( ! isset( $brands_licenses[ $brand_folder ] ) ) {
						$brands_licenses[ $brand_folder ] = file_get_contents( $file ); // phpcs:ignore
					}

					if ( $brands_licenses[ $brand_folder ] !== file_get_contents( $file ) ) { // phpcs:ignore
						array_push( $brands_with_not_same_license, $brand_folder );
					}
				}
			}
		}

		$this->assertTrue( empty( $folders_without_license ), 'Files that should be licenses: ' . implode( ', ', $folders_without_license ) );
		$this->assertTrue( empty( $brands_with_not_same_license ), 'Brands that have different licenses across folders: ' . implode( ', ', $brands_with_not_same_license ) );
	}

	/**
	 * Check if an icon Id is the same as in file that reference it.
	 */
	public function test__id_match_in_file() {
		$icons     = Icon_Factory::get_all_icons();
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
		$all_icons = Icon_Factory::get_all_icons();
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
		$all_icons = Icon_Factory::get_all_icons();
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
		$all_icons = Icon_Factory::get_all_icons();
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
		$all_icons    = Icon_Factory::get_all_icons();
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

			$icon_filename = $icon->get_icon_file_path();
			if ( ! is_string( $icon_filename ) || strstr( $icon_filename, $icon_matches[ $icon_id_type ]['file_prefix'] ) === false ) {
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
	public function test__icons_must_be_missing_attributes_or_characters() {
		$icons = Icon_Factory::get_all_icons();

		$attributes   = array( 'class', 'role', 'focusable', 'aria', ' "', '  ', "\t", '<g', '</g' );
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

	/**
	 * Test that each icon must have a category.
	 */
	public function test__each_icon_must_be_in_a_category() {
		$all_icons              = Icon_Factory::get_all_icons();
		$icons_without_category = array();

		foreach ( $all_icons as $icon ) {
			try {
				$icon->get_icon_category();
			} catch ( RuntimeException $e ) {
				array_push( $icons_without_category, $icon->get_id() );
			}
		}

		$fail_message = 'Icons that are not having a category: ' . implode( ', ', $icons_without_category );
		$this->assertTrue( empty( $icons_without_category ), $fail_message );
	}

	/**
	 * Test that each icon must have a category.
	 */
	public function test__each_icon_to_be_in_correct_category() {
		$static_functions_to_call = array(
			'get_user_icons',
			'get_date_icons',
			'get_category_icons',
			'get_comment_icons',
			'get_comment_disabled_icons',
			'get_views_icons',
			'get_rating_icons',
		);

		$bad_icons = array();

		$verified_num  = 0;
		$all_icons_num = count( Icon_Factory::get_all_icons() );

		foreach ( $static_functions_to_call as $function_name ) {
			$icons = Icon_Factory::$function_name();

			$first_icon_category = null;
			foreach ( $icons as $icon ) {
				if ( ! $first_icon_category ) {
					$first_icon_category = $icon->get_icon_category();
				}

				if ( ! $icon->get_icon_category() === $first_icon_category ) {
					array_push( $bad_icons, $icon->get_id() );
				}

				$verified_num++;
			}
		}

		$fail_message = 'Icons that are not in the correct category(or first icon from function is not): ' . implode( ', ', $bad_icons );
		$this->assertTrue( empty( $bad_icons ), $fail_message );

		$fail_message2 = 'Not all icons were verified.';
		$this->assertEquals( $verified_num, $all_icons_num, $fail_message2 );
	}

	/**
	 * Test that each comment icon must have a compatible(corresponding)
	 * disabled icon.
	 *
	 * @return void
	 */
	public function test__each_comment_icon_have_a_compatible_disabled_comment() {
		$comment_icons         = Icon_Factory::get_comment_icons();
		$not_having_compatible = array();

		foreach ( $comment_icons as $comment_icon ) {
			$disabled_comment_icon = Icon_Factory::get_compatible_disabled_comment_icon( $comment_icon );

			if ( null === $disabled_comment_icon ) {
				array_push( $not_having_compatible, $comment_icon->get_id() );
			}
		}

		$fail_message = 'Comment icons that do not have a compatible disabled comment: ' . implode( ', ', $not_having_compatible );
		$this->assertTrue( empty( $not_having_compatible ), $fail_message );
	}

	/**
	 * Test each icon id to have a maximum of 5 characters between "-".
	 */
	public function test__icon_id_must_have_maxim_5_char_words() {
		$icons            = Icon_Factory::get_all_icons();
		$allowed_keywords = array( 'views' );
		$bad_icons_ids    = array();

		foreach ( $icons as $icon ) {
			$icon_id_words = explode( '-', $icon->get_id() );

			foreach ( $icon_id_words as $id_word ) {
				if ( strlen( $id_word ) > 4 && ! in_array( $id_word, $allowed_keywords, true ) ) {
					array_push( $bad_icons_ids, $icon->get_id() );
				}
			}
		}

		$fail_message = 'Icons that exceed 5 characters words: ' . implode( ', ', $bad_icons_ids );
		$this->assertTrue( empty( $bad_icons_ids ), $fail_message );
	}

	/**
	 * Test that each rating packs have the same brand.
	 */
	public function test__rating_icons_pack() {
		$rating_packs = Icon_Factory::get_rating_packs_attr();
		$wrong_ids    = array();

		foreach ( $rating_packs as $pack_id => $rating_pack ) {
			$empty_id_parts  = explode( '-', $rating_pack['empty'] );
			$half_id_parts   = explode( '-', $rating_pack['half'] );
			$filled_id_parts = explode( '-', $rating_pack['full'] );

			if ( $empty_id_parts[1] !== $half_id_parts[1] || $half_id_parts[1] !== $filled_id_parts[1] ) {
				array_push( $wrong_ids, $pack_id );
			}
		}

		$this->assertTrue( empty( $wrong_ids ), 'The following rating icon packs are incorrect: ' . implode( ', ', $wrong_ids ) );

		$rating_packs_objects = Icon_Factory::get_rating_packs();

		$this->assertTrue( count( $rating_packs_objects ) === count( $rating_packs ), 'Some rating packs are not valid.' );
	}
}
