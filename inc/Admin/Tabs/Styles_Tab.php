<?php

namespace TWRP\Admin\Tabs;

use TWRP\Admin\Settings_Menu;
use TWRP\Manage_Component_Classes;
use TWRP\DB_Style_Options;
use TWRP\Get_Posts;
use TWRP\Templates;
use TWRP\Article_Block\Article_Block_Interface;
use TWRP\Article_Block\Article_Block_Preview;

/**
 * @todo: get_style_edit_link if style doesn't exist return nothing.
 */
class Styles_Tab implements Interface_Admin_Menu_Tab {

	/**
	 * The URL parameter key which say which style ID should be edited. If this
	 * parameter has no value, then a new style is added.
	 */
	const EDIT_STYLE__URL_PARAM_KEY = 'style_edit_id';

	/**
	 * The URL parameter key which say which style should be deleted.
	 */
	const DELETE_STYLE__URL_PARAM_KEY = 'style_delete_id';

	/**
	 * The name of the input that holds the Style name in the Add/Edit Page.
	 */
	const STYLE_NAME = 'style_name';

	/**
	 * The name of the radio where the user selects which post style to use.
	 */
	const KEY__POST_STYLE_ID = 'post_style_id';

	/**
	 * The name of the button that submit the Add/Edit form. The constant
	 * is also used as the value attribute of the button.
	 */
	const SUBMIT_BTN_NAME = 'twrp_style_submitted';

	/**
	 * Name of the nonce from the edit form.
	 */
	const NONCE_EDIT_NAME = 'twrp_style_nonce';

	/**
	 * Action of the nonce from the edit form.
	 */
	const NONCE_EDIT_ACTION = 'twrp_edit_style';

	/**
	 * Name of the nonce to delete a style.
	 */
	const NONCE_DELETE_NAME = 'twrp_style_delete_nonce';

	/**
	 * Action of the nonce to delete a style.
	 */
	const NONCE_DELETE_ACTION = 'twrp_delete_style';

	/**
	 * The tab title, it will be displayed on the tab button.
	 */
	public static function get_tab_title(): string {
		return _x( 'Styles', 'backend', 'twrp' );
	}

	/**
	 * Get the url parameter value that represents the tab.
	 */
	public static function get_tab_url_arg(): string {
		return 'styles';
	}

	/**
	 * Display the styles tab.
	 *
	 * @todo
	 *
	 * @return void
	 */
	public function display_tab() {

		if ( $this->form_has_been_submitted() ) {
			if ( $this->form_nonce_is_valid() ) {
				$this->update_form_submitted_settings();
				// todo.
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
	// Functions to display the existing styles.

	/**
	 * Display the existing style page. This is the default view of the tab.
	 */
	protected function display_existing_styles() {
		?>
		<div class="twrp-existing-styles">
			<h3 class="twrp-existing-styles__title"><?= _x( 'Existing Styles:', 'backend', 'twrp' ) ?></h3>
			<?php $this->display_existing_table(); ?>
			<?php $this->display_add_new_style_btn(); ?>
		</div>
		<?php
	}

	/**
	 * Displays the table of existing styles.
	 *
	 * @return void
	 */
	protected function display_existing_table() {
		$existing_styles = DB_Style_Options::get_all_styles();
		?>
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
					<?php
					foreach ( $existing_styles as $style_id => $style_settings ) {
						$this->display_existing_style_row( $style_id, $style_settings );
					}
					?>
				<?php else : ?>
					<tr>
						<td class="twrp-styles-table__no-styles-col" colspan="2">
						<?= _x( 'No styles created', 'backend', 'twrp' ); ?>
						</td>
					</tr>
				<?php endif; ?>
			</tbody>
		</table>
		<?php
	}

	/**
	 * Display a row in the existing style table.
	 *
	 * @param int|string   $style_id The style id.
	 * @param array<mixed> $style_settings The style settings.
	 */
	protected function display_existing_style_row( $style_id, array $style_settings ) {
		$edit_icon   = '<span class="twrp-queries-table__edit-icon dashicons dashicons-edit"></span>';
		$delete_icon = '<span class="twrp-existing-queries__delete-icon dashicons dashicons-trash"></span>';

		?>
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
				if ( isset( $style_settings[ self::STYLE_NAME ] ) ) {
					echo esc_html( $style_settings[ self::STYLE_NAME ] );
				} else {
					echo esc_html( 'Style-' . $style_id );
				}
				?>
			</td>
		</tr>
		<?php
	}

	/**
	 * Display a button to add a new style.
	 */
	protected function display_add_new_style_btn() {
		$add_btn_icon = '<span class="twrp-existing-queries__add-btn-icon dashicons dashicons-plus"></span>';
		?>
		<a class="twrp-existing-styles__btn button button-primary button-large" href=<?= esc_url( $this->get_new_style_link() ); ?>>
			<?php
			/* translators: %s: plus(add) icon. */
			printf( _x( '%s Add New Style', 'backend', 'twrp' ), $add_btn_icon ); // phpcs:ignore
			?>
		</a>
		<?php
	}

	/**
	 * Return the url to add a new style.
	 */
	protected function get_new_style_link(): string {
		$add_new_link = Settings_Menu::get_tab_url( $this );
		$add_new_link = add_query_arg( self::EDIT_STYLE__URL_PARAM_KEY, '', $add_new_link );

		return $add_new_link;
	}

	/**
	 * Returns the url to edit a style. If style doesn't exist it will return the tab link.
	 *
	 * @param int|string $style_id The ID.
	 */
	protected function get_style_edit_link( $style_id ): string {
		$edit_url = Settings_Menu::get_tab_url( $this );

		if ( DB_Style_Options::style_exists( $style_id ) ) {
			return add_query_arg( self::EDIT_STYLE__URL_PARAM_KEY, $style_id, $edit_url );
		}

		return $edit_url;
	}

	/**
	 * Returns he url to delete a style. If style doesn't exist it will return the tab link.
	 *
	 * @param int|string $style_id The ID.
	 */
	protected function get_style_delete_link( $style_id ): string {
		$delete_url = Settings_Menu::get_tab_url( $this );

		if ( DB_Style_Options::style_exists( $style_id ) ) {
			$url = add_query_arg( self::DELETE_STYLE__URL_PARAM_KEY, $style_id, $delete_url );
			$url = add_query_arg( self::NONCE_DELETE_NAME, wp_create_nonce( self::NONCE_DELETE_ACTION ), $url );
			return $url;
		}

		return $delete_url;
	}


	// =========================================================================
	// Functions to display edit/add styles page.

	/**
	 * Display the whole edit style screen.
	 */
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

	/**
	 * Check to see if the user is currently editing a query.
	 */
	protected function edit_style_screen_is_displayed(): bool {
		// phpcs:ignore
		if ( isset( $_GET[ self::EDIT_STYLE__URL_PARAM_KEY ] ) ) {
			return true;
		}

		return false;
	}


	// =========================================================================
	// Functions to display the form.

	/**
	 * @todo
	 */
	protected function display_form() {
		$style_name = $this->get_edited_style_name();

		?>
		<form class="twrp-styles-form" method="post" action="<?= esc_url( $this->get_edit_style_form_action() ) ?>">
			<div>
				<input required name="<?= esc_attr( self::STYLE_NAME ); ?>"
					value="<?= esc_attr( $style_name ); ?>"
					placeholder="<?= esc_attr( _x( 'Ex: Right Sidebar Style', 'backend', 'twrp' ) ); ?>"
					type="text"
				/>
			</div>

			<?php $this->display_form_article_blocks(); ?>
			<?php $this->display_form_submit_button(); ?>
		</form>
		<?php
	}

	/**
	 * @todo
	 */
	protected function display_form_article_blocks() {
		$article_blocks = Manage_Component_Classes::get_style_classes();
		?>
		<div>
			<h2>Style Settings:</h2>
			<div class="twrp-styles-form">
			<?php
			foreach ( $article_blocks as $article_block ) :
				$this->display_form_article_block( $article_block );
			endforeach;
			?>
			</div>
		</div>
		<?php
	}

	/**
	 * Display a radio button along side with the settings for the article block.
	 *
	 * @param Article_Block_Interface $article_block
	 * @todo
	 */
	protected function display_form_article_block( $article_block ) {
		$current_settings = $this->get_form_current_settings();
		?>
		<div class="twrp-styles-form__row">
			<div class="twrp-styles-form__select-column">
				<input required class="twrp-styles-form__radio-btn" type="radio"
					name="<?= esc_attr( self::KEY__POST_STYLE_ID ) ?>"
					value="<?= esc_attr( $article_block->get_style_id() ); ?>"
					<?= $this->article_block_radio_is_checked( $article_block ); // phpcs:ignore -- Output is XSS safe. ?>
				/>
			</div>

			<div class="twrp-styles-form__article-block-column">
				<h3 class="twrp-styles-form__article-block-title">
					<?= $article_block->get_name(); //phpcs:ignore ?>
				</h3>

				<div class="twrp-styles-form__article-block-short">
					<?php if ( $article_block instanceof Article_Block_Preview ): ?>
						<div class="twrp-styles-form__article-block-preview">
							<?php $article_block->display_backend_preview(); ?>
						</div>
					<?php endif; ?>
					<div class="twrp-styles-form__article-block-description">
						<span class="twrp-styles-form__article-block-description-tag">
							<?= _x( 'Description:', 'backend', 'twrp' ); ?>
						</span>
						<?php $article_block->display_backend_style_description(); // @phan-suppress-current-line PhanPossiblyUndeclaredMethod ?>
					</div>
				</div>

				<div class="twrp-styles-form__article-block-settings">
					<h4 class="twrp-styles-form__article-block-settings-title">
						<?= _x( 'Settings:', 'backend', 'twrp' ) ?>
					</h4>
					<?php $article_block->display_backend_settings( $current_settings ); // @phan-suppress-current-line PhanPossiblyUndeclaredMethod ?>
				</div>
			</div>
		</div>
		<?php
	}

	/**
	 * Display the button that submits the edit form.
	 */
	protected function display_form_submit_button() {
		wp_nonce_field( self::NONCE_EDIT_ACTION, self::NONCE_EDIT_NAME );
		?>
		<button type="submit" name="<?= esc_attr( self::SUBMIT_BTN_NAME ) ?>" value="<?= esc_attr( self::SUBMIT_BTN_NAME ) ?>">
			<?= _x( 'Submit', 'backend', 'twrp' ); ?>
		</button>
		<?php
	}


	// =========================================================================
	// Functions to display the preview of style.

	/**
	 * Display the column that tries to preview how the article blocks are displayed.
	 *
	 * @todo
	 */
	protected function display_preview_column() {
		$query_id = 6;
		$posts    = Get_Posts::get_posts_by_query_id( $query_id );
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

			<div class="twrp-articles">
				<?php
				foreach ( $posts as $post ) {
					Templates::display_post( 'simple_style', $post );
				}
				?>
			</div>
		</div>
		<?php
	}


	// =========================================================================
	// Form Utility Functions

	/**
	 * Get the Id of the current style that is being edited, or an empty string if
	 * the style is added/not exist. This function should be called when the form
	 * is displayed, and not when is submitted.
	 */
	protected function get_id_of_style_being_modified(): string {
		if ( isset( $_GET[ self::EDIT_STYLE__URL_PARAM_KEY ] ) ) { // phpcs:ignore -- Nonce verified.
			// phpcs:ignore WordPress.Security -- The setting is sanitized.
			$style_id = wp_unslash( $_GET[ self::EDIT_STYLE__URL_PARAM_KEY ] );

			if ( is_numeric( $style_id ) && DB_Style_Options::style_exists( $style_id ) ) {
				return $style_id;
			}
		}

		return '';
	}

	/**
	 * Get all the settings of the current style that is edited. This function
	 * should be use when the form is displayed, and not when is submitted.
	 *
	 * @return array The settings are not sanitized.
	 */
	protected function get_form_current_settings() {
		$style_id = $this->get_id_of_style_being_modified();
		try {
			$current_settings = DB_Style_Options::get_all_style_settings( $style_id );
		} catch ( \RuntimeException $e ) {
			return array();
		}

		return $current_settings;
	}

	/**
	 * Get the action url attribute for the edit style form.
	 */
	protected function get_edit_style_form_action(): string {
		$url = Settings_Menu::get_tab_url( $this );
		$url = add_query_arg( self::EDIT_STYLE__URL_PARAM_KEY, $this->get_id_of_style_being_modified(), $url );
		return $url;
	}

	/**
	 * Get the name of the current edited style from database. This function
	 * should be called when the form is displayed, and not to get the name when
	 * the form is submitted.
	 *
	 * @return string The style name or an empty string if the style doesn't exist yet.
	 */
	protected function get_edited_style_name(): string {
		$style_id_modified = $this->get_id_of_style_being_modified();
		try {
			$current_settings = DB_Style_Options::get_all_style_settings( $style_id_modified );
		} catch ( \RuntimeException $e ) { // @phan-suppress-current-line PhanUnusedVariableCaughtException
			return '';
		}

		$style_name = '';
		if ( isset( $current_settings[ self::STYLE_NAME ] ) ) {
			$style_name = self::sanitize_style_name( $current_settings[ self::STYLE_NAME ] );
		}

		return $style_name;
	}

	/**
	 * Compare the selected form article block radio button and another article
	 * block(given as parameter), to determine wether or not the radio is checked.
	 *
	 * @return string HTML attribute to be inserted or empty string.
	 */
	protected function article_block_radio_is_checked( Article_Block_Interface $article_block ): string {
		$style_id_modified = $this->get_id_of_style_being_modified();
		try {
			$current_settings = DB_Style_Options::get_all_style_settings( $style_id_modified );
		} catch ( \RuntimeException $e ) { // @phan-suppress-current-line PhanUnusedVariableCaughtException
			return '';
		}

		$post_style_selected = '';
		if ( isset( $current_settings[ self::KEY__POST_STYLE_ID ] ) ) {
			$post_style_selected = $current_settings[ self::KEY__POST_STYLE_ID ];
		}

		return checked( $article_block->get_style_id(), $post_style_selected, false );
	}

	/**
	 * Verify if the edit style form has been submitted.
	 */
	protected function form_has_been_submitted(): bool {
		// phpcs:ignore
		if ( isset( $_POST[ self::SUBMIT_BTN_NAME ] ) && self::SUBMIT_BTN_NAME === $_POST[ self::SUBMIT_BTN_NAME ] ) {
			return true;
		}

		return false;
	}

	/**
	 * Verify if the nonce send by the form is valid.
	 */
	protected function form_nonce_is_valid(): bool {
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

	/**
	 * Function called when the form is submitted to update the settings.
	 *
	 * @return bool True of the WP functions to update DB were called, false otherwise.
	 *              True doesn't guarantee an update in the DB.
	 */
	protected function update_form_submitted_settings(): bool {
		$styles_classes            = Manage_Component_Classes::get_style_classes();
		$style_id                  = $this->get_id_of_style_being_modified();
		$selected_article_block_id = $this->form_get_article_block_id_selected();
		$style_name                = $this->get_submitted_sanitized_style_name();

		if ( ! isset( $styles_classes[ $selected_article_block_id ] ) ) {
			return false;
		}
		$selected_post_style = $styles_classes[ $selected_article_block_id ];

		$style_settings = $selected_post_style->get_submitted_sanitized_settings();

		// Update the style with the style name and the selected article block Id.
		$style_settings[ self::STYLE_NAME ]         = $style_name;
		$style_settings[ self::KEY__POST_STYLE_ID ] = $selected_article_block_id;

		if ( empty( $style_id ) ) {
			DB_Style_Options::add_new_style( $style_settings );
			return true;
		} elseif ( DB_Style_Options::style_exists( $style_id ) ) {
			DB_Style_Options::update_style( $style_id, $style_settings );
			return true;
		}

		return false;
	}

	/**
	 * When the form is submitted, this function will retrieve the name of the style.
	 *
	 * @return string The name or an empty string.
	 */
	protected function get_submitted_sanitized_style_name(): string {
		if ( isset( $_POST[ self::STYLE_NAME ] ) ) { // phpcs:ignore -- no need for nonce.
			return self::sanitize_style_name( wp_unslash( $_POST[ self::STYLE_NAME ] ) ); // phpcs:ignore -- no need for nonce.
		}

		return '';
	}

	/**
	 * Get the Id of the article block selected via the radio buttons in the interface.
	 *
	 * @return string The article block id, or an empty string. The article is not necessary to be valid.
	 */
	protected function form_get_article_block_id_selected(): string {
		if ( isset( $_POST[ self::KEY__POST_STYLE_ID ] ) ) { // phpcs:ignore -- nonce verified.
			$post_style_name = wp_unslash( $_POST[ self::KEY__POST_STYLE_ID ] ); // phpcs:ignore -- nonce verified.
			if ( is_string( $post_style_name ) ) {
				return sanitize_key( $post_style_name );
			}
		}

		return '';
	}

	/**
	 * Sanitize the style name.
	 *
	 * @todo
	 */
	public static function sanitize_style_name( string $unsanitized_name ): string {
		return $unsanitized_name;
	}
}
