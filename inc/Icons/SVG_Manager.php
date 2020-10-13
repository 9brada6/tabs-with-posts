<?php
/**
 * File that contains the class with the same name.
 */

namespace TWRP\Icons;

use RuntimeException;
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

	#region -- Get aria labels

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

	#endregion -- Get aria labels

	#region -- Get compatible disabled comment icon

	/**
	 * For a comment icon, get the compatible disabled icon.
	 *
	 * @param Icon|string $icon Either an Icon object, or an icon id.
	 * @return Icon|null The compatible disabled comment icon, or null if not found.
	 */
	public static function get_compatible_disabled_comment_icon( $icon ) {
		$icon_id = self::get_compatible_disabled_comment_icon_id( $icon );

		if ( ! is_string( $icon_id ) ) {
			return null;
		}

		try {
			$disabled_icon = new Icon( $icon_id );
			return $disabled_icon;
		} catch ( RuntimeException $e ) {
			return null;
		}
	}

	/**
	 * For a comment icon, get the compatible disabled icon.
	 *
	 * @param Icon|string $icon Either an Icon object, or an icon id.
	 * @return string|null The compatible disabled comment icon, or null if not found.
	 */
	public static function get_compatible_disabled_comment_icon_id( $icon ) {
		if ( $icon instanceof Icon ) {
			$icon_id = $icon->get_id();
		} elseif ( is_string( $icon ) ) {
			$icon_id = $icon;
		} else {
			return null;
		}

		$compatible_icons = Comments_Disabled_Icons::get_comment_disabled_compatibles();

		if ( isset( $compatible_icons[ $icon_id ] ) ) {
			return $compatible_icons[ $icon_id ];
		}

		return null;
	}

	#endregion -- Get compatible disabled comment icon

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
			margin:3px; margin-right: 10px; font-size: 1.5rem; display:inline-block;
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

		echo '<p>';
		foreach ( $icons as $icon ) {
			echo '<div>';

			echo '<span class="twrp-test__icon-block-wrapper">';
				echo '<span class="twrp-test__icon-wrapper">';
					echo $icon->get_html(); // phpcs:ignore
				echo '</span>';
				echo esc_html( $icon->get_option_icon_description() );
			echo '</span>';

			echo '</div>';
		}
		echo '</p>';

		self::test__show_comment_icon_compatible_with_disabled_icon();

		self::test__multiple_icons_align();
	}

	/**
	 * For each comment icon, show the compatible disabled comment icon.
	 *
	 * @return void
	 */
	public static function test__show_comment_icon_compatible_with_disabled_icon() {
		$icons = self::get_comment_icons();
		?>
		<div style="font-family:monospace">
			<?php foreach ( $icons as $comment_icon ) : ?>
				<?php
					$disabled_comment_icon = self::get_compatible_disabled_comment_icon( $comment_icon );
				?>
				<div>
					<?php

					$comment_icon->display();
					echo '&nbsp;=>&nbsp;';
					if ( $disabled_comment_icon instanceof Icon ) {
						$disabled_comment_icon->display();
					}

					echo '&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;';

					echo esc_html( $comment_icon->get_id() );
					$id_max_strlen    = 20;
					$spaces_to_repeat = $id_max_strlen - strlen( $comment_icon->get_id() );
					echo esc_html( str_repeat( '&nbsp;', $spaces_to_repeat ) );
					echo '&nbsp;=>&nbsp;';
					if ( $disabled_comment_icon instanceof Icon ) {
						echo esc_html( $disabled_comment_icon->get_id() );
					}

					?>
				</div>
			<?php endforeach; ?>
		</div>
		<?php
	}

	/**
	 * Visually test icons alignment via picking random icons and displaying
	 * them alongside some text.
	 *
	 * @return void
	 */
	public static function test__multiple_icons_align() {
		$author_icons = self::get_user_icons();
		$date_icons   = self::get_date_icons();
		$views_icons  = self::get_views_icons();
		?>
		<div style="font-variant-numeric: lining-nums;">
			<?php for ( $i = 0; $i < 100; $i++ ) : ?>
				<?php
					$author_icon = $author_icons[ array_rand( $author_icons ) ];
					$date_icon   = $date_icons[ array_rand( $date_icons ) ];
					$views_icon  = $views_icons[ array_rand( $views_icons ) ];

				?>
				<div>
					<span style="margin-right: 1rem;">
						<?php $author_icon->display(); ?>
						author
					</span>

					<span style="margin-right: 1rem;">
						<?php $date_icon->display(); ?>
						27 Nov
					</span>

					<span style="margin-right: 1rem;">
						<?php $views_icon->display(); ?>
						1430
					</span>
				</div>
			<?php endfor; ?>
		</div>
		<?php
	}

	#endregion -- Development test icons alignment

}
