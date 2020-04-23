<?php

class TWRP_Styles_Tab implements TWRP_Admin_Menu_Tab {

	/**
	 * The URL parameter key which say which style ID should be edited. If this
	 * parameter has no value, then a new style is added.
	 *
	 * @var string
	 */
	const EDIT_STYLE__URL_PARAM_KEY = 'query_edit_style';

	/**
	 * The name of the input that holds the Style name in the Add/Edit Page.
	 *
	 * @var string
	 */
	const STYLE_NAME = 'query_name';


	/**
	 * Display the styles tab.
	 *
	 * @return void
	 */
	public function display_tab() {

		if ( $this->edit_style_screen_is_displayed() ) {
			$this->display_edit_style();
		} else {
			$this->display_existing_styles();
		}
	}

	// =========================================================================
	// Functions to display the existing style table

	protected function display_existing_styles() {
		// $existing_styles = TWRP_Manage_Options::get_all_styles();

		$edit_icon    = '<span class="twrp-queries-table__edit-icon dashicons dashicons-edit"></span>';
		$delete_icon  = '<span class="twrp-existing-queries__delete-icon dashicons dashicons-trash"></span>';
		$add_btn_icon = '<span class="twrp-existing-queries__add-btn-icon dashicons dashicons-plus"></span>';

		?>
		<div class="twrp-existing-styles">
			<h3 class="twrp-existing-styles__title"><?= _x( 'Existing Styles:', 'backend', 'twrp' ) ?></h3>

			<table class="twrp-existing-styles__table twrp-styles-table wp-list-table widefat striped">
				<thead>
					<tr>
						<th class="twrp-styles-table__edit-head">
							<?= _x( 'Actions', 'backend', 'twrp' ) ?>
						</th>
						<th class="twrp-styles-table__title-head"><?= _x( 'Style Name', 'backend', 'twrp' ); ?></th>
					</tr>
				</thead>

				<tbody>
					<?php if ( ! empty( $existing_styles ) ) : ?>
						<?php foreach ( $existing_styles as $style_id => $style ) : ?>
							<tr>
								<td class="twrp-queries-table__edit-col">
									<a class="twrp-queries-table__delete-link" href="<?= esc_url( $this->get_style_delete_link( $style_id ) ); ?>">
										<?php
											/* translators: %s: delete dashicon html. */
											echo sprintf( _x( 'Delete', 'backend', 'twrp' ), $delete_icon ); // phpcs:ignore
										?>
									</a>
									/
									<a class="twrp-queries-table__edit-link" href="<?= esc_url( $this->get_style_edit_link( $style_id ) ); ?>">
										<?php
											/* translators: %s: edit dashicon html. */
											echo sprintf( _x( 'Edit', 'backend', 'twrp' ), $edit_icon ); // phpcs:ignore
										?>
									</a>
								</td>

								<td class="twrp-styles-table__title-col">
									<?php
									if ( isset( $style[ self::STYLE_NAME ] ) ) {
										echo esc_html( $style[ self::STYLE_NAME ] );
									} else {
										echo esc_html( 'Style-' . $style_id );
									}
									?>
								</td>
							</tr>
						<?php endforeach; ?>
					<?php else : ?>
						<tr>
							<td class="twrp-styles-table__no-styles-col" colspan="2">
							<?= _x( 'No styles created', 'backend', 'twrp' ); ?>
							</td>
						</tr>
					<?php endif; ?>
				</tbody>
			</table>

			<a class="twrp-existing-styles__btn button button-primary button-large" href=<?= esc_url( $this->get_new_style_link() ); ?>>
				<?php
					/* translators: %s: plus icon. */
					printf( _x( '%s Add New Style', 'backend', 'twrp' ), $add_btn_icon ); // phpcs:ignore
				?>
			</a>
		</div>
		<?php
	}

	// =========================================================================


	protected function display_edit_style() {
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
	// Utility functions

	/**
	 * Check to see if the user is currently editing a query.
	 *
	 * @return bool
	 */
	protected function edit_style_screen_is_displayed() {
		// phpcs:ignore
		if ( isset( $_GET[ self::EDIT_STYLE__URL_PARAM_KEY ] ) ) {
			return true;
		}

		return false;
	}

	/**
	 * Return the url to add a new query.
	 *
	 * @return string
	 */
	protected function get_new_style_link() {
		$add_new_link = TWRP_Admin_Settings_Submenu::get_tab_url( $this );
		$add_new_link = add_query_arg( self::EDIT_STYLE__URL_PARAM_KEY, '', $add_new_link );

		return $add_new_link;
	}

	protected function get_style_edit_link( $style_id ) {
		return $style_id;
	}

	protected function get_style_delete_link( $style_id ) {
		return $style_id;

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
