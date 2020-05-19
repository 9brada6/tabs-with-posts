<?php

namespace TWRP\Query_Setting;

use \WP_User;

class Author implements Query_Setting {

	const AUTHORS_TYPE__SETTING_NAME = 'setting_type';

	const AUTHORS_IDS__SETTING_NAME = 'authors';

	/**
	 * The name of the input and of the array key that stores the option of the query.
	 *
	 * @return string
	 */
	public static function get_setting_name() {
		return 'author_settings';
	}

	/**
	 * The title of the setting.
	 *
	 * @return string
	 */
	public function get_title() {
		return _x( 'Author Settings', 'backend', 'twrp' );
	}

	/**
	 * Whether or not when displaying the setting in the backend only the title
	 * is shown and the setting HTML is hidden(return false), or both are
	 * shown(return true).
	 *
	 * @return bool
	 */
	public static function setting_is_collapsed() {
		return true;
	}

	/**
	 * Display the backend HTML for the setting.
	 *
	 * @todo
	 *
	 * @param mixed $current_setting The current setting of a query if is being
	 * edited, or else an empty string or null will be given.
	 *
	 * @return void
	 */
	public function display_setting( $current_setting ) {
		$this->display_authors_select_type( $current_setting );
		$this->display_selected_authors_list( $current_setting );
		$this->display_add_authors_to_list( $current_setting );
	}

	/**
	 * Display a select field which will tell what to do with the authors selected.
	 *
	 * @param array $current_setting
	 * @return void
	 */
	protected function display_authors_select_type( $current_setting ) {
		?>
		<select
			id="twrp-author-settings__select_type"
			class="twrp-author-settings__select_type"
			name="<?= esc_attr( $this->get_setting_name() . '[' . self::AUTHORS_TYPE__SETTING_NAME . ']' ); ?>"
			value="<?= esc_attr( $current_setting[ self::AUTHORS_TYPE__SETTING_NAME ] ); ?>"
		>
			<option value="-1"><?= _x( 'Exclude selected authors', 'backend', 'twrp' ); ?></option>
			<option value="1"><?= _x( 'Include selected authors', 'backend', 'twrp' ); ?></option>
			<option value="2"><?= _x( 'Same author as the post', 'backend', 'twrp' ); ?></option>
		</select>
		<?php
	}

	/**
	 * Display the list with the selected authors.
	 *
	 * @param array $current_setting
	 * @return void
	 */
	protected function display_selected_authors_list( $current_setting ) {
		?>
		<div id="twrp-author-settings__js-authors-list" class="twrp-display-list">
			<div class="twrp-display-list__empty-msg">
				<?= _x( 'No authors selected. You can search for an author and click the button to add.', 'backend', 'twrp' ); ?>
			</div>
			<?php if ( isset( $current_setting[ self::AUTHORS_IDS__SETTING_NAME ] ) ) : ?>
				<?php $authors_ids = explode( ';', $current_setting[ self::AUTHORS_IDS__SETTING_NAME ] ); ?>
				<?php foreach ( $authors_ids as $author_id ) : ?>
					<?php
					$author_class = get_userdata( (int) $author_id );
					if ( ! $author_class || ( ! ( $author_class instanceof WP_User ) ) ) {
						continue;
					}
					$author_display_name = $author_class->get( 'display_name' );

					// The following HTML can also be generated in JS, so it will
					// be need to be changed there as well.
					?>
					<div class="twrp-display-list__item twrp-author-settings__author-item" data-author-id="<?= esc_attr( $author_id ); ?>">
						<div class="twrp-author-settings__author-item-name">
							<?= esc_html( $author_display_name ); ?>
						</div>
						<button class="twrp-display-list__item-remove-btn twrp-author-settings__js-author-remove-btn" type="button">
							<span class="dashicons dashicons-no"></span>
						</button>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
		<?php
	}

	/**
	 * Display the search for authors, the add button, and a hidden input field
	 * that remembers the authors.
	 *
	 * @param array $current_setting
	 * @return void
	 */
	protected function display_add_authors_to_list( $current_setting ) {
		?>
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
			id="twrp-author-settings__js-author-ids" type="text"
			name="<?= esc_attr( $this->get_setting_name() . '[' . self::AUTHORS_IDS__SETTING_NAME . ']' ) ?>"
			value="<?= esc_attr( $current_setting[ self::AUTHORS_IDS__SETTING_NAME ] ) ?>"
		/>
		<?php
	}

	/**
	 * The name of the input, and also of the array key that stores the option of the query.
	 */
	public static function get_default_setting() {
		return array();
	}

	/**
	 * Sanitize a variable, to be safe for processing.
	 *
	 * @todo
	 *
	 * @param mixed $setting The string to be sanitized.
	 */
	public static function sanitize_setting( $setting ) {
		return $setting;
	}

	/**
	 * Get the setting submitted from the form. The setting is sanitized and
	 * ready to use.
	 *
	 * @todo
	 */
	public function get_submitted_sanitized_setting() {
		return $_POST[ $this->get_setting_name() ];
	}

	/**
	 * Create and insert the new arguments for the WP_Query.
	 *
	 * @todo
	 *
	 * The previous query arguments will be modified such that will also contain
	 * the new settings, and will return the new query arguments to be passed
	 * into WP_Query class.
	 *
	 * @param array $previous_query_args The query arguments before being modified.
	 * @param mixed $query_settings All query settings, these settings are unsanitized.
	 *
	 * @return array The new arguments modified.
	 */
	public static function add_query_arg( $previous_query_args, $query_settings ) {
		// Todo:
		return $previous_query_args;
	}
}
