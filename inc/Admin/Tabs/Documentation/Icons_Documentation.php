<?php
/**
 * File containing the class with the same.
 */

namespace TWRP\Admin\Tabs\Documentation;

use TWRP\Icons\Icon_Factory;
use TWRP\Icons\Icon;
use TWRP\Icons\Rating_Icon_Pack;

/**
 * Class that is used to display Icons Documentation. Mostly used as a class for
 * the separation of the content between files.
 */
class Icons_Documentation {

	/**
	 * Display the icons documentation. In this documentation there is also a
	 * list with all available icons.
	 *
	 * @return void
	 */
	public function display_icon_documentation() {
		?>
		<h2><?= esc_html( _x( 'Icons', 'backend documentation', 'twrp' ) ); ?></h2>
		<p>
			<?= esc_html( _x( 'Check the spoilers bellow to see all available icons:', 'backend documentation', 'twrp' ) ); ?>
		</p>
		<?php
		$this->display_all_icons_in_a_spoiler();
	}

	/**
	 * For each icon category, display a button to show/hide the spoiler, and a
	 * spoiler will all icons in that category.
	 *
	 * @return void
	 */
	protected function display_all_icons_in_a_spoiler() {
		$title_and_icons = $this->get_title_and_icons();

		?>
		<div id="twrp-documentation-page__all-icons-reference" class="twrpb-icons-spoiler twrp-documentation-page__icons-spoiler-wrapper">
			<h3><?= _x( 'All icons reference', 'backend', 'twrp' ); ?></h3>
			<?php foreach ( $title_and_icons as $category => $title_and_icon ) : ?>
			<div class="twrpb-icons-spoiler__category">
				<button class="twrpb-icons-spoiler__btn button">
					<?php /* translators: %s: icon category. Ex: "Author Icons" or "Date Icons"  */ ?>
					<?= esc_html( sprintf( _x( 'Toggle "%s" Spoiler', 'backend', 'twrp' ), $title_and_icon['title'] ) ); ?>
				</button>

				<?php $this->display_icon_category_spoiler( $title_and_icon['icons'], $category ); ?>
			</div>
			<?php endforeach; ?>
		</div>
		<?php
	}

	/**
	 * Display the spoiler with the icons.
	 *
	 * @param array $icons
	 * @param string $additional_class_modifier
	 * @return void
	 */
	protected function display_icon_category_spoiler( $icons, $additional_class_modifier ) {
		$icons              = Icon::nest_icons_by_brands( $icons );
		$bem_modifier_class = ' twrpb-icons-spoiler__spoiler--' . $additional_class_modifier;
		?>
		<div class="twrpb-icons-spoiler__spoiler twrpb-hidden<?= esc_attr( $bem_modifier_class ); ?>">
		<?php foreach ( $icons as $brand => $brand_icons ) : ?>
			<div class="twrpb-icons-spoiler__icon-group">
				<h4 class="twrpb-icons-spoiler__brand-title">
					<?= esc_html( $brand ); ?>
				</h4>

				<?php foreach ( $brand_icons as $icon ) : ?>
					<div class="twrpb-icons-spoiler__icon-presentation">
						<span class="twrpb-icons-spoiler__icon">
							<?php
							if ( $icon instanceof Rating_Icon_Pack ) {
								$rating_icon = $icon->get_filled_icon();
								$rating_icon->display();
								$rating_icon = $icon->get_half_filled_icon();
								$rating_icon->display();
								$rating_icon = $icon->get_empty_icon();
								$rating_icon->display();
							} else {
								$icon->display();
							}
							?>
						</span>
						<span class="twrpb-icons-spoiler__description">
							<?php
							if ( $icon instanceof Rating_Icon_Pack ) {
								echo esc_html( $icon->get_option_pack_description() );
							} else {
								echo esc_html( $icon->get_option_icon_description() );
							}
							?>
						</span>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endforeach; ?>
		</div>
		<?php
	}

	/**
	 * Returns an array containing the title and the icons to be displayed with
	 * that title.
	 *
	 * @return array<string,array{title:string,icons:array}>
	 */
	protected function get_title_and_icons() {
		$title_and_icons = array(
			'author'           => array(
				'title' => _x( 'Author Icons', 'backend documentation', 'twrp' ),
				'icons' => Icon_Factory::get_user_icons(),
			),

			'date'             => array(
				'title' => _x( 'Date Icons', 'backend documentation', 'twrp' ),
				'icons' => Icon_Factory::get_date_icons(),
			),

			'category'         => array(
				'title' => _x( 'Category Icons', 'backend documentation', 'twrp' ),
				'icons' => Icon_Factory::get_category_icons(),
			),

			'comment'          => array(
				'title' => _x( 'Comment Icons', 'backend documentation', 'twrp' ),
				'icons' => Icon_Factory::get_comment_icons(),
			),

			'comment_disabled' => array(
				'title' => _x( 'Comment Disabled Icons', 'backend documentation', 'twrp' ),
				'icons' => Icon_Factory::get_comment_disabled_icons(),
			),

			'views'            => array(
				'title' => _x( 'Views Icons', 'backend documentation', 'twrp' ),
				'icons' => Icon_Factory::get_views_icons(),
			),

			'rating_packs'     => array(
				'title' => _x( 'Rating Icons', 'backend documentation', 'twrp' ),
				'icons' => Icon_Factory::get_rating_packs(),
			),
		);

		return $title_and_icons;
	}

}
