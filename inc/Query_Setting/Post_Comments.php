<?php
/**
 * Contains the class that will filter articles via the comments.
 */

namespace TWRP\Query_Setting;

/**
 * Creates the possibility to filter a query based on post comments.
 */
class Post_Comments implements Query_Setting {

	/**
	 * Name of the form input field, that holds the number of comments to
	 * compare.
	 */
	const COMMENTS_VALUE_NAME = 'value';

	/**
	 * Name of the form select field, that selects the comparator.
	 */
	const COMMENTS_COMPARATOR_NAME = 'comparator';

	/**
	 * The name of the HTML form input and of the array key that stores the option of the query.
	 *
	 * @return string
	 */
	public static function get_setting_name() {
		return 'post_comments';
	}

	/**
	 * The title of the setting accordion.
	 *
	 * @return string
	 */
	public function get_title() {
		return _x( 'Post Comments', 'backend', 'twrp' );
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
	 * @param mixed $current_setting The setting is sanitized.
	 *
	 * @return void
	 */
	public function display_setting( $current_setting ) {
		$hidden_class = '';
		if ( 'NA' === $current_setting[ self::COMMENTS_COMPARATOR_NAME ] ) {
			$hidden_class = ' twrp-hidden';
		}

		?>
			<div class="twrp-query-comments-settings">
				<span>
					<?= _x( 'Filter articles by number of comments: ', 'backend', 'twrp' ); ?>
				</span>

				<select
					id="twrp-query-comments-settings__js-comparator"
					class="twrp-query-comments-settings__comparator"
					name="<?= esc_attr( self::get_setting_name() . '[' . self::COMMENTS_COMPARATOR_NAME . ']' ); ?>"
				>
					<option value="NA" <?php selected( 'NA', $current_setting[ self::COMMENTS_COMPARATOR_NAME ] ); ?>>
						<?= _x( 'Not applied', 'backend', 'twrp' ); ?>
					</option>
					<option value="BE" <?php selected( 'BE', $current_setting[ self::COMMENTS_COMPARATOR_NAME ] ); ?>>
						<?= _x( 'Bigger or equal than: >=', 'backend', 'twrp' ); ?>
					</option>
					<option value="LE" <?php selected( 'LE', $current_setting[ self::COMMENTS_COMPARATOR_NAME ] ); ?>>
						<?= _x( 'Less or equal than: <=', 'backend', 'twrp' ); ?>
					</option>
					<option value="E" <?php selected( 'E', $current_setting[ self::COMMENTS_COMPARATOR_NAME ] ); ?>>
						<?= _x( 'Equal', 'backend', 'twrp' ); ?>
					</option>
					<option value="NE" <?php selected( 'NE', $current_setting[ self::COMMENTS_COMPARATOR_NAME ] ); ?>>
						<?= _x( 'Not equal', 'backend', 'twrp' ); ?>
					</option>
				</select>

				<input
					id="twrp-query-comments-settings__js-num_comments"
					class="twrp-query-comments-settings__num_comments<?= esc_attr( $hidden_class ); ?>"
					type="number" min="0" step="1"
					placeholder="<?= _x( 'Number of comments', 'backend', 'twrp' ); ?>"
					name="<?= esc_attr( self::get_setting_name() . '[' . self::COMMENTS_VALUE_NAME . ']' ); ?>"
					value="<?= esc_attr( $current_setting[ self::COMMENTS_VALUE_NAME ] ); ?>"
				/>
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
			self::COMMENTS_COMPARATOR_NAME => 'NA',
			self::COMMENTS_VALUE_NAME      => '',
		);
	}

	/**
	 * Get the setting submitted from the form. The setting is sanitized and
	 * ready to use.
	 *
	 * @return array
	 */
	public function get_submitted_sanitized_setting() {
		if ( isset( $_POST[ self::get_setting_name() ] ) ) { // phpcs:ignore -- Nonce verified.
			return self::sanitize_setting( wp_unslash( $_POST[ self::get_setting_name() ] ) ); // phpcs:ignore -- Nonce verified.
		}
		return self::get_default_setting();
	}

	/**
	 * Sanitize the settings, to be safe for processing.
	 *
	 * @param mixed $setting
	 * @return array The sanitized settings
	 */
	public static function sanitize_setting( $setting ) {
		if ( ! is_array( $setting ) ) {
			return self::get_default_setting();
		}

		if ( ! isset( $setting[ self::COMMENTS_VALUE_NAME ], $setting[ self::COMMENTS_COMPARATOR_NAME ] ) ) {
			return self::get_default_setting();
		}

		if ( ! in_array( $setting[ self::COMMENTS_COMPARATOR_NAME ], array( 'BE', 'LE', 'E', 'NE' ), true ) ) {
			return self::get_default_setting();
		}

		if ( ! is_numeric( $setting[ self::COMMENTS_VALUE_NAME ] ) ) {
			return self::get_default_setting();
		}

		$sanitized_setting = array(
			self::COMMENTS_COMPARATOR_NAME => $setting[ self::COMMENTS_COMPARATOR_NAME ],
			self::COMMENTS_VALUE_NAME      => ( (int) $setting[ self::COMMENTS_VALUE_NAME ] ),
		);

		return $sanitized_setting;
	}

	/**
	 * Create and insert the new arguments for the WP_Query.
	 *
	 * The previous query arguments will be modified such that will also contain
	 * the new settings, and will return the new query arguments to be passed
	 * into WP_Query class.
	 *
	 * @param array $previous_query_args The query arguments before being modified.
	 * @param array $query_settings All query settings, these settings are sanitized.
	 * @return array The new arguments modified.
	 */
	public static function add_query_arg( $previous_query_args, $query_settings ) {
		if ( ! isset( $query_settings[ self::get_setting_name() ] ) ) {
			return $previous_query_args;
		}

		$settings = $query_settings[ self::get_setting_name() ];

		if ( ! is_numeric( $settings[ self::COMMENTS_VALUE_NAME ] ) ) {
			return $previous_query_args;
		}

		if ( 'NA' === $settings[ self::COMMENTS_VALUE_NAME ] ) {
			return $previous_query_args;
		}

		$comment_count = array(
			'compare' => self::get_comparator_from_name( $settings[ self::COMMENTS_COMPARATOR_NAME ] ),
			'value'   => $settings[ self::COMMENTS_VALUE_NAME ],
		);

		$previous_query_args['comment_count'] = $comment_count;
		return $previous_query_args;
	}

	/**
	 * Get the comparator like in mathematics from a comparator acronym.
	 *
	 * @param string $name
	 * @return string The comparator;
	 */
	public static function get_comparator_from_name( $name ) {
		switch ( $name ) {
			case 'BE':
				return '>=';
			case 'LE':
				return '<=';
			case 'E':
				return '=';
			case 'NE':
				return '!=';
		}

		return '';
	}
}
