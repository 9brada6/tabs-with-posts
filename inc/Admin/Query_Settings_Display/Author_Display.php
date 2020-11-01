<?php
/**
 * File that contains the class with the same name.
 *
 * @phpcs:disable Squiz.Commenting.FunctionComment.Missing
 */

namespace TWRP\Admin\Query_Settings_Display;

use TWRP\Query_Setting\Author;
use TWRP\Utils;

/**
 * Used to display the author query setting control.
 */
class Author_Display extends Query_Setting_Display {

	const CLASS_ORDER = 80;

	protected function get_setting_class() {
		return new Author();
	}

	public function get_title() {
		return _x( 'Filter by author', 'backend', 'twrp' );
	}

	public function display_setting( $current_setting ) {
		$authors_type             = $current_setting[ Author::AUTHORS_TYPE__SETTING_NAME ];
		$is_showing               = false;
		$same_author_note_showing = false;

		if ( Author::AUTHORS_TYPE__INCLUDE === $authors_type
		|| Author::AUTHORS_TYPE__EXCLUDE === $authors_type ) {
			$is_showing = true;
		}

		if ( Author::AUTHORS_TYPE__SAME === $authors_type ) {
			$same_author_note_showing = true;
		}

		$this->display_authors_select_type( $current_setting );
		$this->display_selected_authors_list( $current_setting, $is_showing );
		$this->display_add_authors_to_list( $current_setting, $is_showing );
		$this->display_note( $same_author_note_showing );
	}

	/**
	 * Display a select field which will tell what to do with the authors selected.
	 *
	 * @param array $current_setting
	 * @return void
	 */
	protected function display_authors_select_type( $current_setting ) {
		$selected_option = $current_setting[ Author::AUTHORS_TYPE__SETTING_NAME ];
		?>
		<div class="twrp-query-settings__paragraph">
			<select
				id="twrp-author-settings__select_type"
				class="twrp-author-settings__select_type"
				name="<?= esc_attr( Author::get_setting_name() . '[' . Author::AUTHORS_TYPE__SETTING_NAME . ']' ); ?>"
			>
				<option value="<?= esc_attr( Author::AUTHORS_TYPE__DISABLED ) ?>" <?php selected( Author::AUTHORS_TYPE__DISABLED, $selected_option ); ?>>
					<?= _x( 'Not applied', 'backend', 'twrp' ); ?>
				</option>
				<option value="<?= esc_attr( Author::AUTHORS_TYPE__SAME ) ?>" <?php selected( Author::AUTHORS_TYPE__SAME, $selected_option ); ?>>
					<?= _x( 'Same author as the post', 'backend', 'twrp' ); ?>
				</option>
				<option value="<?= esc_attr( Author::AUTHORS_TYPE__INCLUDE ) ?>" <?php selected( Author::AUTHORS_TYPE__INCLUDE, $selected_option ); ?>>
					<?= _x( 'Include selected authors', 'backend', 'twrp' ); ?>
				</option>
				<option value="<?= esc_attr( Author::AUTHORS_TYPE__EXCLUDE ) ?>" <?php selected( Author::AUTHORS_TYPE__EXCLUDE, $selected_option ); ?>>
					<?= _x( 'Exclude selected authors', 'backend', 'twrp' ); ?>
				</option>
			</select>
		</div>
		<?php
	}

	/**
	 * Display the list with the selected authors.
	 *
	 * @param array $current_setting
	 * @param bool $is_showing
	 * @return void
	 */
	protected function display_selected_authors_list( $current_setting, $is_showing ) {
		$authors = array();
		if ( isset( $current_setting[ Author::AUTHORS_IDS__SETTING_NAME ] ) ) {
			$authors_ids = explode( ';', $current_setting[ Author::AUTHORS_IDS__SETTING_NAME ] );
			$authors_ids = Utils::get_valid_wp_ids( $authors_ids );

			if ( ! empty( $authors_ids ) ) {
				$authors_args = array(
					'include' => $authors_ids,
					'fields'  => array( 'ID', 'display_name' ),
					'orderby' => 'include',
				);
				$authors      = get_users( $authors_args );
			}
		}

		$additional_list_class = '';
		if ( ! $is_showing ) {
			$additional_list_class = ' twrp-hidden';
		}

		$additional_no_authors_class = '';
		if ( ! empty( $authors ) ) {
			$additional_no_authors_class = ' twrp-hidden';
		}

		/* translators: %s -> display name of the author. */
		$remove_aria_label = _x( 'remove author %s', 'backend, accessibility text', 'twrp' );

		?>
		<div
			id="twrp-author-settings__js-authors-list"
			class="twrp-display-list twrp-query-settings__paragraph twrp-author-settings__display-list<?= esc_attr( $additional_list_class ); ?>"
			data-twrp-aria-remove-label="<?= esc_attr( $remove_aria_label ); ?>"
		>
			<div id="twrp-author-settings__js-no-authors-selected" class="twrp-display-list__empty-msg<?= esc_attr( $additional_no_authors_class ); ?>">
				<?= _x( 'No authors selected. You can search for an author and click the button to add.', 'backend', 'twrp' ); ?>
			</div>
			<?php foreach ( $authors as $author ) : ?>
				<?php
				$author_display_name = $author->display_name;

				// The following HTML can also be generated in JS, so it will
				// be need to be changed there as well.
				?>
				<div class="twrp-display-list__item twrp-author-settings__author-item" data-author-id="<?= esc_attr( (string) $author->ID ); ?>">
					<div class="twrp-author-settings__author-item-name">
						<?= esc_html( $author_display_name ); ?>
					</div>
					<button
						class="twrp-display-list__item-remove-btn twrp-author-settings__js-author-remove-btn"
						type="button"
						aria-label="<?= esc_attr( sprintf( $remove_aria_label, $author_display_name ) ); ?>"
					>
						<span class="dashicons dashicons-no"></span>
					</button>
				</div>
			<?php endforeach; ?>
		</div>
		<?php
	}

	/**
	 * Display the search for authors, the add button, and a hidden input field
	 * that remembers the authors.
	 *
	 * @param array $current_setting
	 * @param bool $is_showing
	 * @return void
	 */
	protected function display_add_authors_to_list( $current_setting, $is_showing ) {
		$additional_class = '';
		if ( ! $is_showing ) {
			$additional_class = ' twrp-hidden';
		}

		?>
		<div id="twrp-author-settings__author-search-wrap" class="twrp-author-settings__author-search-wrap twrp-query-settings__paragraph<?= esc_attr( $additional_class ); ?>">
			<input
				id="twrp-author-settings__js-author-search" type="text"
				class="twrp-author-settings__author-search"
				placeholder="<?= _x( 'Search for Author', 'backend', 'twrp' ); ?>"
			/>

			<button
				id="twrp-author-settings__js-author-add-btn" type="button"
				class="twrp-author-settings__js-author-add-btn button button-primary"
			>
				<?= _x( 'Add Author', 'backend', 'twrp' ); ?>
			</button>

			<input
				id="twrp-author-settings__js-author-ids" type="hidden"
				name="<?= esc_attr( Author::get_setting_name() . '[' . Author::AUTHORS_IDS__SETTING_NAME . ']' ) ?>"
				value="<?= esc_attr( $current_setting[ Author::AUTHORS_IDS__SETTING_NAME ] ) ?>"
			/>
		</div>
		<?php
	}

	/**
	 * Display a note about same author query.
	 *
	 * @param bool $is_showing
	 * @return void
	 */
	protected function display_note( $is_showing ) {
		$additional_note_class = '';
		if ( ! $is_showing ) {
			$additional_note_class = ' twrp-hidden';
		}

		?>
		<div id="twrp-author-settings__js-same-author-notice" class="twrp-setting-note twrp-query-settings__paragraph twrp-author-settings__same-author-note<?= esc_attr( $additional_note_class ); ?>">
			<span class="twrp-setting-note__label"><?= _x( 'Note: ', 'backend', 'twrp' ); ?></span>
			<span class="twrp-setting-note__text">
				<?= _x(
					'This query(tab) will be displayed only on singular pages(post, page, attachments, custom post types), but not on blogroll pages, categories pages, ..etc, because these pages do not display an article from where the author can be retrieved.',
					'backend',
					'twrp'
				); ?>
			</span>
		</div>
		<?php
	}

	public function get_submitted_sanitized_setting() {
		if ( isset( $_POST[ Author::get_setting_name() ] ) ) { // phpcs:ignore -- Nonce verified
			// phpcs:ignore -- Nonce verified and the setting is sanitized.
			return Author::sanitize_setting( wp_unslash( $_POST[ Author::get_setting_name() ] ) );
		}

		return Author::get_default_setting();
	}

}
