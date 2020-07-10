<?php
/**
 * Contains the class that will filter articles via the comments.
 *
 * phpcs:disable Squiz.Commenting.FunctionComment.Missing -- Inherited from interface.
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

	public static function init() {
		// Do nothing.
	}

	public static function get_setting_name() {
		return 'post_comments';
	}

	public function get_title() {
		return _x( 'Filter by comments', 'backend', 'twrp' );
	}

	public static function setting_is_collapsed() {
		return 'auto';
	}

	public function display_setting( $current_setting ) {
		$hidden_class = '';
		if ( 'NA' === $current_setting[ self::COMMENTS_COMPARATOR_NAME ] ) {
			$hidden_class = ' twrp-hidden';
		}

		?>
			<div class="twrp-comments-settings">
				<div class="twrp-query-settings__paragraph twrp-comments-settings__wrapper">
					<span>
						<?= _x( 'Filter articles by number of comments: ', 'backend', 'twrp' ); ?>
					</span>

					<select
						id="twrp-comments-settings__js-comparator"
						class="twrp-comments-settings__comparator"
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
						id="twrp-comments-settings__js-num_comments"
						class="twrp-comments-settings__num_comments<?= esc_attr( $hidden_class ); ?>"
						type="number" min="0" step="1"
						placeholder="<?= _x( 'Number of comments', 'backend', 'twrp' ); ?>"
						name="<?= esc_attr( self::get_setting_name() . '[' . self::COMMENTS_VALUE_NAME . ']' ); ?>"
						value="<?= esc_attr( $current_setting[ self::COMMENTS_VALUE_NAME ] ); ?>"
					/>
				</div>
			</div>
		<?php
	}

	public static function get_default_setting() {
		return array(
			self::COMMENTS_COMPARATOR_NAME => 'NA',
			self::COMMENTS_VALUE_NAME      => '',
		);
	}

	public function get_submitted_sanitized_setting() {
		if ( isset( $_POST[ self::get_setting_name() ] ) ) { // phpcs:ignore -- Nonce verified
			// phpcs:ignore -- Nonce verified and the setting is sanitized.
			return self::sanitize_setting( wp_unslash( $_POST[ self::get_setting_name() ] ) );
		}

		return self::get_default_setting();
	}

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
