<?php

namespace TWRP\Query_Setting;

use TWRP\Get_Posts;
use WP_User;
use RuntimeException;

class Author implements Query_Setting {

	/**
	 * The setting attribute name, and the array key of the author filter type.
	 */
	const AUTHORS_TYPE__SETTING_NAME = 'setting_type';

	/**
	 * The setting attribute name, and the array key of the ids selected. The
	 * ids selected are a string separated by ';'.
	 */
	const AUTHORS_IDS__SETTING_NAME = 'authors';

	/**
	 * Do not filter by authors type.
	 */
	const AUTHORS_TYPE__DISABLED = 'DISABLED';

	/**
	 * Filter by including authors.
	 */
	const AUTHORS_TYPE__INCLUDE = 'IN';

	/**
	 * Filter by excluding authors.
	 */
	const AUTHORS_TYPE__EXCLUDE = 'OUT';

	/**
	 * Filter by same author as the post.
	 */
	const AUTHORS_TYPE__SAME = 'SAME';

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
		$this->display_note();
	}

	/**
	 * Display a select field which will tell what to do with the authors selected.
	 *
	 * @param array $current_setting
	 * @return void
	 */
	protected function display_authors_select_type( $current_setting ) {
		$selected_option = $current_setting[ self::AUTHORS_TYPE__SETTING_NAME ];
		?>
		<select
			id="twrp-author-settings__select_type"
			class="twrp-author-settings__select_type"
			name="<?= esc_attr( $this->get_setting_name() . '[' . self::AUTHORS_TYPE__SETTING_NAME . ']' ); ?>"
		>
			<option value="<?= esc_attr( self::AUTHORS_TYPE__DISABLED ) ?>" <?php selected( self::AUTHORS_TYPE__DISABLED, $selected_option ); ?>>
				<?= _x( 'Not applied', 'backend', 'twrp' ); ?>
			</option>
			<option value="<?= esc_attr( self::AUTHORS_TYPE__SAME ) ?>" <?php selected( self::AUTHORS_TYPE__SAME, $selected_option ); ?>>
				<?= _x( 'Same author as the post', 'backend', 'twrp' ); ?>
			</option>
			<option value="<?= esc_attr( self::AUTHORS_TYPE__INCLUDE ) ?>" <?php selected( self::AUTHORS_TYPE__INCLUDE, $selected_option ); ?>>
				<?= _x( 'Include selected authors', 'backend', 'twrp' ); ?>
			</option>
			<option value="<?= esc_attr( self::AUTHORS_TYPE__EXCLUDE ) ?>" <?php selected( self::AUTHORS_TYPE__EXCLUDE, $selected_option ); ?>>
				<?= _x( 'Exclude selected authors', 'backend', 'twrp' ); ?>
			</option>
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
			<div id="twrp-author-settings__js-no-authors-selected" class="twrp-display-list__empty-msg">
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
		<div id="twrp-author-settings__author-search-wrap" class="twrp-author-settings__author-search-wrap">
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
		</div>
		<?php
	}

	protected function display_note() {
		?>
		<div id="twrp-author-settings__js-same-author-notice" class="twrp-setting-notice">
			<span class="twrp-setting-notice__note"><?= _x( 'Note: ', 'backend', 'twrp' ); ?></span>
			<span>
				<?= _x(
					'This query(tab) will be displayed only on singular pages(post, page, attachments, custom post types), but not on blogroll pages, categories pages, ..etc, because these pages do not display an article from where the author can be retrieved.',
					'backend',
					'twrp'
				); ?>
			</span>
		</div>
		<?php
	}

	/**
	 * The name of the input, and also of the array key that stores the option of the query.
	 */
	public static function get_default_setting() {
		return array(
			self::AUTHORS_TYPE__SETTING_NAME => self::AUTHORS_TYPE__DISABLED,
			self::AUTHORS_IDS__SETTING_NAME  => '',
		);
	}

	/**
	 * Sanitize a variable, to be safe for processing.
	 *
	 * @param mixed $settings The string to be sanitized.
	 */
	public static function sanitize_setting( $settings ) {
		if ( ! isset( $settings[ self::AUTHORS_TYPE__SETTING_NAME ] ) ) {
			return self::get_default_setting();
		}

		$authors_type    = $settings[ self::AUTHORS_TYPE__SETTING_NAME ];
		$available_types = array( self::AUTHORS_TYPE__DISABLED, self::AUTHORS_TYPE__INCLUDE, self::AUTHORS_TYPE__EXCLUDE, self::AUTHORS_TYPE__SAME );
		if ( ! in_array( $authors_type, $available_types, true ) ) {
			return self::get_default_setting();
		}

		if ( self::AUTHORS_TYPE__DISABLED === $authors_type ) {
			return self::get_default_setting();
		}

		$sanitized_setting = array(
			self::AUTHORS_TYPE__SETTING_NAME => $settings[ self::AUTHORS_TYPE__SETTING_NAME ],
			self::AUTHORS_IDS__SETTING_NAME  => '',
		);
		if ( self::AUTHORS_TYPE__SAME === $authors_type ) {
			return $sanitized_setting;
		}

		$authors_ids           = explode( ';', $settings[ self::AUTHORS_IDS__SETTING_NAME ] );
		$sanitized_authors_ids = array();
		foreach ( $authors_ids as $author_id ) {
			$author = get_userdata( (int) $author_id );
			if ( false !== $author ) {
				array_push( $sanitized_authors_ids, $author_id );
			}
		}
		$sanitized_authors_ids = implode( ';', $sanitized_authors_ids );

		$sanitized_setting[ self::AUTHORS_IDS__SETTING_NAME ] = $sanitized_authors_ids;

		return $sanitized_setting;
	}

	/**
	 * Get the setting submitted from the form. The setting is sanitized and
	 * ready to use.
	 */
	public function get_submitted_sanitized_setting() {
		if ( isset( $_POST[ $this->get_setting_name() ] ) ) { // phpcs:ignore -- Nonce verified
			// phpcs:ignore -- Nonce verified and the setting is sanitized.
			return self::sanitize_setting( wp_unslash( $_POST[ $this->get_setting_name() ] ) );
		} else {
			return self::get_default_setting();
		}
	}

	/**
	 * Create and insert the new arguments for the WP_Query.
	 *
	 * The previous query arguments will be modified such that will also contain
	 * the new settings, and will return the new query arguments to be passed
	 * into WP_Query class.
	 *
	 * @throws RuntimeException When the widget is displayed in the blog roll
	 * and the current author cannot be retrieved.
	 *
	 * @param array $previous_query_args The query arguments before being modified.
	 * @param mixed $query_settings All query settings, these settings are sanitized.
	 * @return array The new arguments modified.
	 */
	public static function add_query_arg( $previous_query_args, $query_settings ) {
		$settings     = $query_settings[ self::get_setting_name() ];
		$authors_type = $settings[ self::AUTHORS_TYPE__SETTING_NAME ];

		if ( self::AUTHORS_TYPE__DISABLED === $authors_type ) {
			return $previous_query_args;
		}

		if ( self::AUTHORS_TYPE__SAME === $authors_type ) {
			$global_post = Get_Posts::get_global_post();
			if ( ( ! $global_post ) || ( ! is_singular() ) ) {
				throw new RuntimeException( 'Author cannot be retrieved in a non single page.' );
			}
			$author_id = get_the_author_meta( 'ID', $global_post->post_author );

			$previous_query_args['author__in'] = array( $author_id );
			return $previous_query_args;
		}

		$authors_ids = explode( ';', $settings[ self::AUTHORS_IDS__SETTING_NAME ] );

		if ( self::AUTHORS_TYPE__INCLUDE === $authors_type ) {
			$previous_query_args['author__in'] = $authors_ids;
		} elseif ( self::AUTHORS_TYPE__EXCLUDE === $authors_type ) {
			$previous_query_args['author__not_in'] = $authors_ids;
		}

		return $previous_query_args;
	}
}
