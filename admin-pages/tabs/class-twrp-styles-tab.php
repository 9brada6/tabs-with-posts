<?php

/**
 * @todo: get_style_edit_link if style doesn't exist return nothing.
 */

class TWRP_Styles_Tab implements TWRP_Admin_Menu_Tab {

	/**
	 * The URL parameter key which say which style ID should be edited. If this
	 * parameter has no value, then a new style is added.
	 *
	 * @var string
	 */
	const EDIT_STYLE__URL_PARAM_KEY = 'style_edit_id';

	/**
	 * The URL parameter key which say which style should be deleted.
	 *
	 * @var string
	 */
	const DELETE_STYLE__URL_PARAM_KEY = 'style_delete_id';

	/**
	 * The name of the input that holds the Style name in the Add/Edit Page.
	 *
	 * @var string
	 */
	const STYLE_NAME = 'style_name';

	/**
	 * The name of the radio where the user selects which post style to use.
	 *
	 * @var string
	 */
	const KEY__POST_STYLE_ID = 'post_style_id';

	/**
	 * The name of the button that submit the Add/Edit form. The constant
	 * is also used as the value attribute of the button.
	 *
	 * @var string
	 */
	const SUBMIT_BTN_NAME = 'twrp_style_submitted';

	/**
	 * Name of the nonce from the edit form.
	 *
	 * @var string
	 */
	const NONCE_EDIT_NAME = 'twrp_style_nonce';

	/**
	 * Action of the nonce from the edit form.
	 *
	 * @var string
	 */
	const NONCE_EDIT_ACTION = 'twrp_edit_style';

	/**
	 * Name of the nonce to delete a style.
	 *
	 * @var string
	 */
	const NONCE_DELETE_NAME = 'twrp_style_delete_nonce';

	/**
	 * Action of the nonce to delete a style.
	 *
	 * @var string
	 */
	const NONCE_DELETE_ACTION = 'twrp_delete_style';



	/**
	 * Display the styles tab.
	 *
	 * @return void
	 */
	public function display_tab() {

		if ( $this->form_has_been_submitted() ) {
			if ( $this->verify_edit_nonce() ) {
				$this->update_form_submitted_settings();
				/**
				* @todo
				*/
				echo _x( 'Settings saved', 'backend', 'twrp' );
				$this->display_existing_styles();
				return;
			} else {
				wp_nonce_ays( self::NONCE_EDIT_ACTION );
			}
		}

		if ( $this->edit_style_screen_is_displayed() ) {
			$this->display_edit_style();
		} else {
			$this->display_existing_styles();
		}
	}

	// =========================================================================
	// Functions to display the existing style table

	protected function display_existing_styles() {
		$existing_styles = TWRP_Manage_Options::get_all_styles();

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
								<td class="twrp-styles-table__edit-col">
									<a class="twrp-styles-table__delete-link" href="<?= esc_url( $this->get_style_delete_link( $style_id ) ); ?>">
										<?php
											/* translators: %s: delete dashicon html. */
											echo sprintf( _x( 'Delete', 'backend', 'twrp' ), $delete_icon ); // phpcs:ignore
										?>
									</a>
									/
									<a class="twrp-styles-table__edit-link" href="<?= esc_url( $this->get_style_edit_link( $style_id ) ); ?>">
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
		$style_id_modified = $this->get_id_of_style_being_modified();
		$current_settings  = TWRP_Manage_Options::get_all_style_settings( $style_id_modified );
		$style_classes     = TWRP_Manage_Classes::get_style_classes();

		$style_name = '';
		if ( isset( $current_settings[ self::STYLE_NAME ] ) ) {
			$style_name = $this->sanitize_style_name( $current_settings[ self::STYLE_NAME ] );
		}

		$post_style_selected = '';
		if ( isset( $current_settings[ self::KEY__POST_STYLE_ID ] ) ) {
			$post_style_selected = $current_settings[ self::KEY__POST_STYLE_ID ];
		}

		?>

		<form class="twrp-styles-form" method="post" action="<?= esc_url( $this->get_edit_style_form_action() ) ?>">
			<div>
				<div>
					<input required name="<?= esc_attr( self::STYLE_NAME ); ?>" value="<?= esc_attr( $style_name ); ?>" placeholder="<?= esc_attr( _x( 'Ex: Right Sidebar Style', 'backend', 'twrp' ) ); ?>" type="text" />
				</div>

				<h2>Style Settings:</h2>
				<div class="twrp-styles-form">
					<?php foreach ( $style_classes as $style_class ) : ?>
						<div class="twrp-styles-form__row">
							<div class="twrp-styles-form__select-column">
								<input required class="twrp-styles-form__radio-btn" type="radio" name="<?= esc_attr( self::KEY__POST_STYLE_ID ) ?>" value="<?= esc_attr( $style_class->get_style_id() ); ?>" <?php checked( $style_class->get_style_id(), $post_style_selected ); ?>/>
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
			<?php wp_nonce_field( self::NONCE_EDIT_ACTION, self::NONCE_EDIT_NAME ); ?>
			<button type="submit" name="<?= esc_attr( self::SUBMIT_BTN_NAME ) ?>" value="<?= esc_attr( self::SUBMIT_BTN_NAME ) ?>"><?= _x( 'Submit', 'backend', 'twrp' ); ?></button>
		</form>
		<?php
	}


	// =========================================================================
	// Form Functions

	/**
	 * Whether or not the user have submitted the edit form.
	 *
	 * @return bool
	 */
	protected function form_has_been_submitted() {
		// phpcs:ignore
		if ( isset( $_POST[ self::SUBMIT_BTN_NAME ] ) && self::SUBMIT_BTN_NAME === $_POST[ self::SUBMIT_BTN_NAME ] ) {
			return true;
		}

		return false;
	}

	protected function verify_edit_nonce() {
		if ( isset( $_POST[ self::NONCE_EDIT_NAME ] ) ) {

			if ( ! is_string( $_POST[ self::NONCE_EDIT_NAME ] ) ) {
				return false;
			}

			$nonce_value = sanitize_key( $_POST[ self::NONCE_EDIT_NAME ] );
			$nonce_check = wp_verify_nonce( $nonce_value, self::NONCE_EDIT_ACTION );
			if ( 1 === $nonce_check ) {
				return true;
			}
		}

		return false;
	}




	protected function update_form_submitted_settings() {

		$styles_classes         = TWRP_Manage_Classes::get_style_classes();
		$style_id               = $this->get_id_of_style_being_modified();
		$selected_post_style_id = $this->form_get_post_style_id_selected();
		$style_name             = $this->get_submitted_sanitized_style_name();

		if ( ! isset( $styles_classes[ $selected_post_style_id ] ) ) {
			return false;
		}
		$selected_post_style = $styles_classes[ $selected_post_style_id ];

		$style_settings = $selected_post_style->get_submitted_sanitized_settings();

		// Update the style wit
		$style_settings[ self::STYLE_NAME ]         = $style_name;
		$style_settings[ self::KEY__POST_STYLE_ID ] = $selected_post_style_id;

		if ( empty( $style_id ) ) {
			TWRP_Manage_Options::add_new_style( $style_settings );
			return true;
		} elseif ( TWRP_Manage_Options::style_exists( $style_id ) ) {
			TWRP_Manage_Options::update_style( $style_id, $style_settings );
			return true;
		}

		return false;
	}

	/**
	 * Returns the ID of the style being modified. Returns an empty string if
	 * a new style is added.
	 *
	 * @return string The ID of the style being modified, or an empty string.
	 */
	protected function get_id_of_style_being_modified() {
		if ( isset( $_GET[ self::EDIT_STYLE__URL_PARAM_KEY ] ) ) { // phpcs:ignore -- Nonce verified.
			// phpcs:ignore WordPress.Security -- The setting is sanitized.
			$style_id = wp_unslash( $_GET[ self::EDIT_STYLE__URL_PARAM_KEY ] );

			if ( is_numeric( $style_id ) && TWRP_Manage_Options::style_exists( $style_id ) ) {
				return $style_id;
			}
		}

		return '';
	}


	// =========================================================================
	// Utility functions

	protected function get_submitted_sanitized_style_name() {
		if ( isset( $_POST[ self::STYLE_NAME ] ) ) { // phpcs:ignore -- no need for nonce.
			return $this->sanitize_style_name( wp_unslash( $_POST[ self::STYLE_NAME ] ) ); // phpcs:ignore -- no need for nonce.
		}

		return '';
	}

	protected function sanitize_style_name( $unsanitized_name ) {
		return $unsanitized_name;
	}

	protected function form_get_post_style_id_selected() {
		if ( isset( $_POST[ self::KEY__POST_STYLE_ID ] ) ) { // phpcs:ignore -- nonce verified.
			$post_style_name = wp_unslash( $_POST[ self::KEY__POST_STYLE_ID ] ); // phpcs:ignore -- nonce verified.
			if ( is_string( $post_style_name ) ) {
				return sanitize_key( $post_style_name );
			}
		}

		return '';
	}

	/**
	 * Get the form action(URL) of the edit/add style settings.
	 *
	 * @return string
	 */
	protected function get_edit_style_form_action() {
		$url = TWRP_Admin_Settings_Submenu::get_tab_url( $this );
		$url = add_query_arg( self::EDIT_STYLE__URL_PARAM_KEY, $this->get_id_of_style_being_modified(), $url );
		return $url;
	}

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
	 * Return the url to add a new style.
	 *
	 * @return string
	 */
	protected function get_new_style_link() {
		$add_new_link = TWRP_Admin_Settings_Submenu::get_tab_url( $this );
		$add_new_link = add_query_arg( self::EDIT_STYLE__URL_PARAM_KEY, '', $add_new_link );

		return $add_new_link;
	}

	/**
	 * Return the url to edit a style. If style doesn't exist it will
	 * return the tab link.
	 *
	 * @param int|string $style_id The ID.
	 *
	 * @return string
	 */
	protected function get_style_edit_link( $style_id ) {
		$edit_url = TWRP_Admin_Settings_Submenu::get_tab_url( $this );

		if ( TWRP_Manage_Options::style_exists( $style_id ) ) {
			return add_query_arg( self::EDIT_STYLE__URL_PARAM_KEY, $style_id, $edit_url );
		}

		return $edit_url;
	}

	/**
	 * Return the url to delete a style. If style doesn't exist it will
	 * return the tab link.
	 *
	 * @param int|string $style_id The ID.
	 *
	 * @return string
	 */
	protected function get_style_delete_link( $style_id ) {
		$delete_url = TWRP_Admin_Settings_Submenu::get_tab_url( $this );

		if ( TWRP_Manage_Options::style_exists( $style_id ) ) {
			$url = add_query_arg( self::DELETE_STYLE__URL_PARAM_KEY, $style_id, $delete_url );
			$url = add_query_arg( self::NONCE_DELETE_NAME, wp_create_nonce( self::NONCE_DELETE_ACTION ), $url );
			return $url;
		}

		return $delete_url;
	}

	// =========================================================================

	public static function get_tab_title() {
		return _x( 'Styles', 'backend', 'twrp' );
	}

	public static function get_tab_url_arg() {
		return 'styles';
	}

}
