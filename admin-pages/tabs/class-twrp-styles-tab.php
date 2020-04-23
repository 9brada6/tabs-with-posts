<?php

class TWRP_Styles_Tab implements TWRP_Admin_Menu_Tab {

	public function display_tab() {

		?>
		<div class="twrp-styles-tab">
			<div class="twrp-styles-tab__settings">
				<?php $this->display_form(); ?>
			</div>

			<div class="twrp-styles-tab__preview">
				<?php $this->display_preview_column(); ?>
			</div>
		</div>
		<?php
	}

	// =========================================================================
	protected function display_preview_column() {
		$query_id = 6;
		$posts    = TWRP_Query_Posts::get_posts_by_query_id( $query_id );
		?>
		<div class="twrp-styles-preview">
			<div class="twrp-styles-preview__orientation-wrapper">
				<button id="twrp-styles-tab__js-vertical-btn" class="twrp-styles-preview__toggle-btn button button-outline-primary" type="button">
					<?= _x( 'Vertical Dock', 'backend', 'twrp' ); ?>
				</button>

				<button id="twrp-styles-tab__js-horizontal-btn" class="twrp-styles-preview__toggle-btn button button-outline-primary" type="button">
					<?= _x( 'Horizontal Dock', 'backend', 'twrp' ); ?>
				</button>
			</div>

			<?php
			foreach ( $posts as $post ) {
				TWRP_Templates::display_post( 'simple_style', $post );
			}
			?>
		</div>
		<?php
	}


	// =========================================================================

	protected function display_form() {
		$style_classes = TWRP_Manage_Classes::get_style_classes();
		?>

		<form class="twrp-styles-form" method="post" action="<?= esc_url( TWRP_Admin_Settings_Submenu::get_tab_url( $this ) ) ?>">
			<div>
				<h2>Style Settings:</h2>
				<div class="twrp-styles-form">
					<?php foreach ( $style_classes as $style_class ) : ?>
						<div class="twrp-styles-form__row">
							<div class="twrp-styles-form__select-column">
								<input class="twrp-styles-form__radio-btn" type="radio" name="style" value="<?= esc_attr( $style_class->get_style_id() ); ?>" />
							</div>

							<div class="twrp-styles-form__style-column">
								<h3 class="twrp-styles-form__style-title">Style Title</h3>
								<p>Style description, not necessary.</p>
								<div>
									<?php $style_class->display_backend_style_preview(); ?>
								</div>
								<div>
									<?php $style_class->display_backend_settings(); ?>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
			<button type="submit" name="style-submit" value="submitted"><?= _x( 'Submit', 'backend', 'twrp' ); ?></button>
		</form>
		<?php
	}


	// =========================================================================

	public static function form_submitted() {

	}

	public static function get_tab_title() {
		return _x( 'Styles', 'backend', 'twrp' );
	}

	public static function get_tab_url_arg() {
		return 'styles';
	}

}
