<?php
/**
 * File that contains the class with the same name.
 */

namespace TWRP\Icons;

use RuntimeException;
use WP_Filesystem_Direct;
use TWRP_Main;
use TWRP\Utils;
use TWRP\Database\General_Options;
use TWRP\Icons\Date_Icons;
use TWRP\Icons\User_Icons;
use TWRP\Icons\Category_Icons;
use TWRP\Icons\Comments_Icons;
use TWRP\Icons\Comments_Disabled_Icons;
use TWRP\Icons\Views_Icons;
use TWRP\Icons\Rating_Icons;


/**
 * By convention, to make the working more easily, every Id should be composed
 * as: twrp-{icon-meaning}-{brand/author}-[additional-icon-meaning]-{icon-type}.
 */
class SVG_Manager {

	/**
	 * Called before anything else, to initialize all the things that this class
	 * needs.
	 *
	 * Always called at 'after_setup_theme' action. Other things added here should be
	 * additionally checked, for example by admin hooks, or whether or not to be
	 * included in special pages, ...etc.
	 *
	 * @return void
	 */
	public static function init() {}

	#region -- Get specific icon sets

	/**
	 * Get all registered icons that represents the user.
	 *
	 * @return array<string,Icon>
	 */
	public static function get_user_icons() {
		$icons = User_Icons::get_user_icons();

		$icons_classes = array();
		foreach ( $icons as $icon_id => $icon ) {
			$new_icon                  = new Icon( $icon_id, $icon );
			$icons_classes[ $icon_id ] = $new_icon;
		}

		return $icons_classes;
	}

	/**
	 * Get all registered icons that represents the date.
	 *
	 * @return array<string,Icon>
	 */
	public static function get_date_icons() {
		$icons = Date_Icons::get_date_icons();

		$icons_classes = array();
		foreach ( $icons as $icon_id => $icon ) {
			$new_icon                  = new Icon( $icon_id, $icon );
			$icons_classes[ $icon_id ] = $new_icon;
		}

		return $icons_classes;
	}

	/**
	 * Get all registered icons that represents the category.
	 *
	 * @return array<string,Icon>
	 */
	public static function get_category_icons() {
		$icons = Category_Icons::get_category_icons();

		$icons_classes = array();
		foreach ( $icons as $icon_id => $icon ) {
			$new_icon                  = new Icon( $icon_id, $icon );
			$icons_classes[ $icon_id ] = $new_icon;
		}

		return $icons_classes;
	}

	/**
	 * Get all registered icons that represents the comments.
	 *
	 * @return array<string,Icon>
	 */
	public static function get_comment_icons() {
		$icons = Comments_Icons::get_comment_icons();

		$icons_classes = array();
		foreach ( $icons as $icon_id => $icon ) {
			$new_icon                  = new Icon( $icon_id, $icon );
			$icons_classes[ $icon_id ] = $new_icon;
		}

		return $icons_classes;
	}

	/**
	 * Get all registered icons that represents the disabled comments.
	 *
	 * @return array<string,Icon>
	 */
	public static function get_comment_disabled_icons() {
		$icons = Comments_Disabled_Icons::get_disabled_comment_icons();

		$icons_classes = array();
		foreach ( $icons as $icon_id => $icon ) {
			$new_icon                  = new Icon( $icon_id, $icon );
			$icons_classes[ $icon_id ] = $new_icon;
		}

		return $icons_classes;
	}

	/**
	 *  Get all registered icons that represents the number of views.
	 *
	 * @return array<string,Icon>
	 */
	public static function get_views_icons() {
		$icons = Views_Icons::get_views_icons();

		$icons_classes = array();
		foreach ( $icons as $icon_id => $icon ) {
			$new_icon                  = new Icon( $icon_id, $icon );
			$icons_classes[ $icon_id ] = $new_icon;
		}

		return $icons_classes;
	}

	/**
	 * Get all registered icons that represents the rating.
	 *
	 * @return array<string,Icon>
	 */
	public static function get_rating_icons() {
		$icons = Rating_Icons::get_rating_icons();

		$icons_classes = array();
		foreach ( $icons as $icon_id => $icon ) {
			$new_icon                  = new Icon( $icon_id, $icon );
			$icons_classes[ $icon_id ] = $new_icon;
		}

		return $icons_classes;
	}

	#endregion -- Get specific icon sets

	#region -- Todo

	/**
	 * Get all rating icons packs.
	 *
	 * @return array<string,array>
	 */
	public static function get_rating_packs() {
		return Rating_Icons::get_rating_packs();
	}

	#endregion -- Todo

	#region -- Get all icons

	/**
	 * Get an array with all registered icons attributes.
	 *
	 * @return array<string,array>
	 */
	public static function get_all_icons_attr() {
		return User_Icons::get_user_icons() +
			Date_Icons::get_date_icons() +
			Category_Icons::get_category_icons() +
			Comments_Icons::get_comment_icons() +
			Comments_Disabled_Icons::get_disabled_comment_icons() +
			Views_Icons::get_views_icons() +
			Rating_Icons::get_rating_icons();
	}

	/**
	 * Get an array with all registered icons.
	 *
	 * @return array<string,Icon>
	 */
	public static function get_all_icons() {
		return self::get_user_icons() +
			self::get_date_icons() +
			self::get_category_icons() +
			self::get_comment_icons() +
			self::get_comment_disabled_icons() +
			self::get_views_icons() +
			self::get_rating_icons();
	}

	#endregion -- Get all icons

	#region -- Development test icons alignment

	/**
	 * This function was created for testing and prototyping. It is not for use
	 * in the theme directly.
	 *
	 * @return void
	 */
	public static function test_icons() {
		$icons = self::get_all_icons();
		Create_And_Enqueue_Icons::include_all_icons_file();
		$icon_nr = 0;

		?>
		<style>
		.twrp-test__icon-block-wrapper {
			margin:3px; margin-right: 10px; font-size: 1.5rem; display:inline-block; color:darkblue;
		}
		.twrp-test__icon-wrapper {
			margin-right: 6px
		}
		</style>
		<?php

		echo '<p>';
		foreach ( $icons as $icon ) {
			$random_word = substr( str_shuffle( 'abcdefghijklmnopqrstuvwxyz' ), 0, 4 );

			if ( 0 === $icon_nr % 3 ) {
				echo '<div>';
			}

			echo '<span class="twrp-test__icon-block-wrapper">';
			echo '<span class="twrp-test__icon-wrapper">';
				echo $icon->get_html(); // phpcs:ignore
			echo '</span>';
			echo esc_html( $random_word );
			echo '</span>';

			if ( ( ( $icon_nr + 1 ) % 3 ) === 0 || ( count( $icons ) === $icon_nr ) ) {
				echo '</div>';
			}

			$icon_nr++;
		}
		echo '</p>';
	}

	#endregion -- Development test icons alignment

}
