<?php

namespace TWRP\Query_Setting;

use \WP_User;

class Author implements Interface_Backend_Layout {

	/**
	 * Display the backend HTML for the setting.
	 *
	 * @param mixed $current_setting The current setting of a query if is being
	 * edited, or else an empty string or null will be given.
	 *
	 * @return void
	 */
	public function display_setting( $current_setting ) {
		?>
		<select id="twrp-author-settings__select_type" class="twrp-author-settings__select_type" name="">
			<option value="">Exclude selected authors</option>
			<option value="">Include selected authors</option>
			<option value="">Same author as the post</option>
		</select>

		<div id="twrp-author-settings__js-authors-list" class="twrp-display-list">
			<?php if ( isset( $current_setting['authors'] ) ) : ?>
				<?php $authors_ids = explode( ';', $current_setting['authors'] ); ?>

				<?php foreach ( $authors_ids as $author_id ) : ?>
					<?php
					$author_class = get_userdata( (int) $author_id );
					if ( ! $author_class || ( ! ( $author_class instanceof WP_User ) ) ) {
						continue;
					}
					$author_display_name = $author_class->get( 'display_name' );

					?>
					<div class="twrp-display-list__item twrp-author-settings__author-item" data-author-id="<?= esc_attr( $author_id ); ?>">
						<div class="twrp-author-settings__author-item-name">
							<?= esc_html( $author_display_name ); ?>
						</div>
						<button class="twrp-display-list__item-remove-btn twrp-author-settings__js-author-remove-btn" type="button"><span class="dashicons dashicons-no"></span></button>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>

		<input id="twrp-author-settings__js-author-search" type="text" placeholder="Search for Author" />
		<button id="twrp-author-settings__js-author-add-btn" type="button">Add Author</button>
		<input
			id="twrp-author-settings__js-author-ids"
			type="text"
			name="<?= esc_attr( $this->get_setting_name() . '[authors]' ) ?>"
			value="<?= esc_attr( $current_setting['authors'] ) ?>"
		/>
		<?php
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
	 * The name of the input and of the array key that stores the option of the query.
	 *
	 * @return string
	 */
	public static function get_setting_name() {
		return 'author_settings';
	}

	/**
	 * Sanitize a variable, to be safe for processing.
	 *
	 * @param mixed $setting The string to be sanitized.
	 */
	public static function sanitize_setting( $setting ) {
		return $setting;
	}

	/**
	 * Get the setting submitted from the form. The setting is sanitized and
	 * ready to use.
	 */
	public function get_submitted_sanitized_setting() {
		return $_POST[ $this->get_setting_name() ];
	}

	/**
	 * The name of the input, and also of the array key that stores the option of the query.
	 */
	public static function get_default_setting() {
		return array();
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
}
