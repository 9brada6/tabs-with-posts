<?php
/**
 * File that contains the class with the same name.
 */

namespace TWRP\Icons;

use RuntimeException;

class Icon_Categories {

	/**
	 * Numerical index, representing a user icon.
	 */
	const USER_ICON = 1;

	/**
	 * Numerical index, representing a date icon.
	 */
	const DATE_ICON = 2;

	/**
	 * Numerical index, representing a views icon.
	 */
	const VIEWS_ICON = 3;

	/**
	 * Numerical index, representing a rating icon.
	 */
	const RATING_ICON = 4;

	/**
	 * Numerical index, representing a rating icon.
	 */
	const CATEGORY_ICON = 5;

	/**
	 * Numerical index, representing a comment icon.
	 */
	const COMMENT_ICON = 6;

	/**
	 * Numerical index, representing a disabled comment icon.
	 */
	const DISABLED_COMMENT_ICON = 7;

	/**
	 * Each icon category has a folder where icons are found, these are declared
	 * here.
	 */
	const ICON_CATEGORY_FOLDER = array(
		self::USER_ICON             => 'user',
		self::DATE_ICON             => 'date',
		self::VIEWS_ICON            => 'views',
		self::RATING_ICON           => 'rating',
		self::CATEGORY_ICON         => 'taxonomy',
		self::COMMENT_ICON          => 'comments',
		self::DISABLED_COMMENT_ICON => 'disabled-comments',
	);

	/**
	 * Each icon category will be wrapped in a HTML element, with a class name
	 * of one of these.
	 */
	const ICON_CATEGORY_CLASS = array(
		self::USER_ICON             => 'twrp-i--user',
		self::DATE_ICON             => 'twrp-i--date',
		self::VIEWS_ICON            => 'twrp-i--views',
		self::RATING_ICON           => 'twrp-i--rating',
		self::CATEGORY_ICON         => 'twrp-i--category',
		self::COMMENT_ICON          => 'twrp-i--comment',
		self::DISABLED_COMMENT_ICON => 'twrp-i--disabled-comment',
	);

	/**
	 * Get an array, where the key is the icon category index, and the value
	 * is the aria label for these type of icons.
	 *
	 * @return array
	 */
	public static function get_category_aria_label() {
		$aria_labels = array(
			self::USER_ICON             => _x( 'Author', 'accessibility text', 'twrp' ),
			self::DATE_ICON             => _x( 'Date', 'accessibility text', 'twrp' ),
			self::VIEWS_ICON            => _x( 'Views', 'accessibility text', 'twrp' ),
			self::RATING_ICON           => _x( 'Rating', 'accessibility text', 'twrp' ),
			self::CATEGORY_ICON         => _x( 'Category', 'accessibility text', 'twrp' ),
			self::COMMENT_ICON          => _x( 'Comments', 'accessibility text', 'twrp' ),
			self::DISABLED_COMMENT_ICON => _x( 'Comments Disabled', 'accessibility text', 'twrp' ),
		);

		return $aria_labels;
	}

	/**
	 * Get a numeric value, representing the icon category. The numeric value
	 * is a constant declared in this class. Return false otherwise.
	 *
	 * @throws RuntimeException In case the numeric value cannot be retrieved.
	 *
	 * @param string $icon_id
	 * @return int
	 */
	public static function get_icon_category( $icon_id ) {
		if ( strstr( $icon_id, 'views' ) ) {
			return self::VIEWS_ICON;
		}

		if ( strstr( $icon_id, 'cal' ) ) {
			return self::DATE_ICON;
		}

		if ( strstr( $icon_id, 'dcom' ) ) {
			return self::DISABLED_COMMENT_ICON;
		}

		if ( strstr( $icon_id, 'com' ) && ! strstr( $icon_id, 'dcom' ) ) {
			return self::COMMENT_ICON;
		}

		if ( strstr( $icon_id, 'user' ) ) {
			return self::USER_ICON;
		}

		if ( strstr( $icon_id, 'tax' ) ) {
			return self::CATEGORY_ICON;
		}

		if ( strstr( $icon_id, 'rat' ) ) {
			return self::RATING_ICON;
		}

		throw new RuntimeException();
	}
}

// Todo: Speed up Icon creation, retrieved only the attributes based on icon category.
	/**
	 * Get the icon attributes array, or false if do not exist.
	 *
	 * @param string $icon_id
	 * @return array|false
	 */
/*
  public static function get_icon_attr( $icon_id ) {
		try {
			$icon_category = self::get_icon_category( $icon_id );
		} catch ( RuntimeException $e ) {
			return false;
		}

		if ( self::USER_ICON === $icon_category ) {
			$icons_attr = User_Icons::get_user_icons();
		}

		if ( self::DATE_ICON === $icon_category ) {
			$icons_attr = Date_Icons::get_date_icons();
		}

		if ( self::CATEGORY_ICON === $icon_category ) {
			$icons_attr = Category_Icons::get_category_icons();
		}

		if ( self::COMMENT_ICON === $icon_category ) {
			$icons_attr = Comments_Icons::get_comment_icons();
		}

		if ( self::DISABLED_COMMENT_ICON === $icon_category ) {
			$icons_attr = Comments_Disabled_Icons::get_disabled_comment_icons();
		}

		if ( self::VIEWS_ICON === $icon_category ) {
			$icons_attr = Views_Icons::get_views_icons();
		}

		if ( self::RATING_ICON === $icon_category ) {
			$icons_attr = Rating_Icons::get_rating_icons();
		}

		if ( isset( $icons_attr[ $icon_id ] ) ) {
			return $icons_attr[ $icon_id ];
		}

		return false; // @codeCoverageIgnore
	} */
