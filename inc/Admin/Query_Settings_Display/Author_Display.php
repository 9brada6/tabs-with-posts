<?php
/**
 * File that contains the class with the same name.
 */

namespace TWRP\Admin\Query_Settings_Display;

use TWRP\Query_Generator\Query_Setting\Author;
use TWRP\Utils\Simple_Utils;
use TWRP\Admin\Remember_Note;

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

		?>
		<div class="<?php $this->bem_class(); ?>">
			<?php
			$this->display_authors_select_type( $current_setting );
			$this->display_selected_authors_list( $current_setting, $is_showing );
			$this->display_add_authors_to_list( $current_setting, $is_showing );
			$this->display_note( $same_author_note_showing );
			?>
		</div>
		<?php
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
		<div class="<?php $this->query_setting_paragraph_class(); ?>">
			<select
				id="<?php $this->bem_class( 'select_type' ); ?>"
				class="<?php $this->bem_class( 'select_type' ); ?>"
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
			$authors_ids = Simple_Utils::get_valid_wp_ids( $authors_ids );

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
			id="<?php $this->bem_class( 'js-authors-list' ); ?>"
			class="twrpb-display-list <?php $this->bem_class( 'display-list' ); ?> <?php $this->query_setting_paragraph_class(); ?><?= esc_attr( $additional_list_class ); ?>"
			data-twrp-aria-remove-label="<?= esc_attr( $remove_aria_label ); ?>"
		>
			<div id="<?php $this->bem_class( 'js-no-authors-selected' ); ?>" class="twrpb-display-list__empty-msg<?= esc_attr( $additional_no_authors_class ); ?>">
				<?= _x( 'No authors selected. You can search for an author and click the button to add.', 'backend', 'twrp' ); ?>
			</div>
			<?php foreach ( $authors as $author ) : ?>
				<?php
				$author_display_name = $author->display_name;

				// The following HTML can also be generated in JS, so it will
				// be need to be changed there as well.
				?>
				<div class="<?php $this->bem_class( 'author-item' ); ?> twrpb-display-list__item" data-author-id="<?= esc_attr( (string) $author->ID ); ?>">
					<div class="<?php $this->bem_class( 'author-item-name' ); ?>">
						<?= esc_html( $author_display_name ); ?>
					</div>
					<button
						class="twrpb-display-list__item-remove-btn <?php $this->bem_class( 'js-author-remove-btn' ); ?>"
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
		<div id="<?php $this->bem_class( 'author-search-wrap' ); ?>" class="<?php $this->bem_class( 'author-search-wrap' ); ?> <?php $this->query_setting_paragraph_class(); ?><?= esc_attr( $additional_class ); ?>">
			<input
				id="<?php $this->bem_class( 'js-author-search' ); ?>" type="text"
				class="<?php $this->bem_class( 'author-search' ); ?>"
				placeholder="<?= _x( 'Search for Author', 'backend', 'twrp' ); ?>"
			/>

			<button
				id="<?php $this->bem_class( 'js-author-add-btn' ); ?>" type="button"
				class="<?php $this->bem_class( 'js-author-add-btn' ); ?> button button-primary"
			>
				<?= _x( 'Add Author', 'backend', 'twrp' ); ?>
			</button>

			<input
				id="<?php $this->bem_class( 'js-author-ids' ); ?>" type="hidden"
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
		<div id="<?php $this->bem_class( 'js-same-author-notice' ); ?>" class="<?php $this->bem_class( 'same-author-note' ); ?> <?php $this->query_setting_paragraph_class(); ?><?= esc_attr( $additional_note_class ); ?>">
			<?php
			$remember_note = new Remember_Note( Remember_Note::NOTE__SAME_AUTHOR_SETTING_NOTE );
			$remember_note->display_note();
			?>
		</div>
		<?php
	}

	// todo.
	protected function get_bem_base_class() {
		return 'twrpb-author-settings';
	}

}
