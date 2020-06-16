<?php
/**
 * Contains the class that will filter articles by search keywords.
 */

namespace TWRP\Query_Setting;

/**
 * Creates the possibility to filter a query based on a search string.
 */
class Search implements Query_Setting {

	const SEARCH_KEYWORDS__SETTING_NAME = 'search_keywords';

	/**
	 * The name of the HTML form input and of the array key that stores the option of the query.
	 *
	 * @return string
	 */
	public static function get_setting_name() {
		return 'search';
	}

	/**
	 * The title of the setting accordion.
	 *
	 * @return string
	 */
	public function get_title() {
		return _x( 'Search keywords', 'backend', 'twrp' );
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
	 * @param array $current_setting The setting is sanitized.
	 *
	 * @return void
	 */
	public function display_setting( $current_setting ) {
		$search_keywords = $current_setting[ self::SEARCH_KEYWORDS__SETTING_NAME ];

		$info_label = _x( 'Info:', 'backend', 'twrp' );
		$info_text  = _x( 'You can remove keywords by placing "-" in front of them: "pillow -sofa".', 'backend', 'twrp' );
		$info_text2 = _x( 'Leave empty to not apply.', 'backend', 'twrp' );

		$warning_label = _x( 'Warning:.', 'backend', 'twrp' );
		$warning_text  = _x( 'You have searched for a very small keyword, this can be a mistake. The query will work and include the search result whatsoever.', 'backend', 'twrp' );

		$warning_text_is_shown = ( strlen( $search_keywords ) < 3 ) && ( strlen( $search_keywords ) !== -1 );

		$warning_hidden_class = ' twrp-hidden';
		if ( $warning_text_is_shown ) {
			$warning_hidden_class = '';
		}

		?>
		<div class="twrp-search-setting">
			<p class="twrp-posts-queries-tab__paragraph twrp-setting-info twrp-search-setting__paragraph">
				<span class="twrp-setting-info__tag"><?= esc_html( $info_label ); ?></span>
				<span class="twrp-setting-info__text"><?= esc_html( $info_text ); ?> <?= esc_html( $info_text2 ); ?></span>
			</p>

			<div class="twrp-posts-queries-tab__paragraph twrp-search-setting__paragraph">
				<input
					id="twrp-search-setting__js-search-input"
					class="twrp-search-setting__input"
					type="text"
					name="<?= esc_attr( self::get_setting_name() . '[' . self::SEARCH_KEYWORDS__SETTING_NAME . ']' ); ?>"
					value="<?= esc_attr( $search_keywords ) ?>"
					placeholder="<?= esc_attr_x( 'Search keywords...', 'backend', 'twrp' ) ?>"
				/>
			</div>

			<p id="twrp-search-setting__js-words-warning" class="twrp-posts-queries-tab__paragraph-with-hide twrp-setting-warning twrp-search-setting__paragraph <?= esc_attr( $warning_hidden_class ); ?>">
				<span class="twrp-setting-warning__tag">
					<?= esc_html( $warning_label ); ?>
				</span>
				<span class="twrp-setting-warning__text">
					<?= esc_html( $warning_text ); ?>
				</span>
			</p>
		</div>
		<?php
	}

	/**
	 * The default setting to be retrieved, if user didn't set anything.
	 *
	 * @return array
	 */
	public static function get_default_setting() {
		return array(
			self::SEARCH_KEYWORDS__SETTING_NAME => '',
		);
	}

	/**
	 * Get the setting submitted from the form. The setting is sanitized and
	 * ready to use.
	 *
	 * @return string
	 */
	public function get_submitted_sanitized_setting() {
		if ( isset( $_POST[ self::get_setting_name() ] ) ) { // phpcs:ignore -- Nonce verified
			// phpcs:ignore -- Nonce verified and the setting is sanitized.
			return self::sanitize_setting( wp_unslash( $_POST[ self::get_setting_name() ] ) );
		}

		return self::get_default_setting();
	}

	/**
	 * Sanitize the search string.
	 *
	 * @param array $setting
	 * @return array
	 */
	public static function sanitize_setting( $setting ) {
		if ( ! isset( $setting[ self::SEARCH_KEYWORDS__SETTING_NAME ] ) ) {
			return self::get_default_setting();
		}
		$search_keywords = $setting[ self::SEARCH_KEYWORDS__SETTING_NAME ];

		if ( ! is_string( $search_keywords ) ) {
			return self::get_default_setting();
		}

		return $setting;
	}

	/**
	 * Create and insert the new arguments for the WP_Query.
	 *
	 * The previous query arguments will be modified such that will also contain
	 * the new settings, and will return the new query arguments to be passed
	 * into WP_Query class.
	 *
	 * @param array $previous_query_args The query arguments before being modified.
	 * @param mixed $query_settings All query settings, these settings are sanitized.
	 * @return array The new arguments modified.
	 */
	public static function add_query_arg( $previous_query_args, $query_settings ) {
		if ( ! isset( $query_settings[ self::get_setting_name() ][ self::SEARCH_KEYWORDS__SETTING_NAME ] ) ) {
			return $previous_query_args;
		}

		$search_keywords = $query_settings[ self::get_setting_name() ][ self::SEARCH_KEYWORDS__SETTING_NAME ];

		if ( empty( $search_keywords ) ) {
			return $previous_query_args;
		}

		$previous_query_args['s'] = $search_keywords;
		return $previous_query_args;
	}
}
