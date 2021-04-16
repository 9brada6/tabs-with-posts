<?php
/**
 * File that contains the class with the same name.
 */

namespace TWRP\Development_Tests;

use TWRP\Icons\Icon;
use TWRP\Icons\Icon_Factory;
use TWRP\Enqueue_Scripts\Icons_CSS;

/**
 * Implement some static methods to display all icons for testing purpose, as
 * to see if an icon is missing, or that if all icons are aligned nice.
 */
class Icon_Display_Test {

	#region -- Development test icons alignment

	/**
	 * This function was created for testing and prototyping. It is not for use
	 * in the theme directly.
	 *
	 * @return void
	 */
	public static function test_icons() {
		$icons = Icon_Factory::get_all_icons();
		Icons_CSS::include_all_icons_file();
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
				echo $icon->get_html(); // phpcs:ignore -- No XSS.
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
					echo $icon->get_html(); // phpcs:ignore -- No XSS.
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
		$icons = Icon_Factory::get_comment_icons();
		?>
		<div style="font-family:monospace">
			<?php foreach ( $icons as $comment_icon ) : ?>
				<?php
					$disabled_comment_icon = Icon_Factory::get_compatible_disabled_comment_icon( $comment_icon );
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
		$author_icons = Icon_Factory::get_user_icons();
		$date_icons   = Icon_Factory::get_date_icons();
		$views_icons  = Icon_Factory::get_views_icons();
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
