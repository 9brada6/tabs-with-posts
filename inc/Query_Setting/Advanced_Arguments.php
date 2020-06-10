<?php
/**
 * Contains the class that will let administrators custom modifying the WP_Query
 * arguments via a JSON object.
 *
 * @todo: change class from twrp-advanced-args into twrp-advanced-settings.
 */

namespace TWRP\Query_Setting;

use TWRP\Admin\Settings_Menu;
use \TWRP\Admin\Tabs\Queries_Tab;

/**
 * Class that will let administrators custom modifying the advanced arguments
 * via JSON parameters.
 */
class Advanced_Arguments implements Query_Setting {

	/**
	 * The setting name and the array key of the option that remembers whether
	 * or not the custom arguments are applied.
	 */
	const IS_APPLIED__SETTING_NAME = 'is_applied_setting';

	/**
	 * The setting name and the array key where the custom arguments JSON is found.
	 */
	const CUSTOM_ARGS__SETTING_NAME = 'custom_args_json';

	/**
	 * The name of the HTML form input and of the array key that stores the option of the query.
	 *
	 * @return string
	 */
	public static function get_setting_name() {
		return 'advanced_args';
	}

	/**
	 * The title of the setting accordion.
	 *
	 * @return string
	 */
	public function get_title() {
		return _x( 'Advanced query settings', 'backend', 'twrp' );
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
	 * @param array $current_setting An array filled with only the settings that
	 * this class work with. The settings are sanitized.
	 *
	 * @return void
	 */
	public function display_setting( $current_setting ) {
		$selector_name = self::get_setting_name() . '[' . self::IS_APPLIED__SETTING_NAME . ']';
		$textarea_name = self::get_setting_name() . '[' . self::CUSTOM_ARGS__SETTING_NAME . ']';

		$advanced_args  = $current_setting[ self::CUSTOM_ARGS__SETTING_NAME ];
		$selector_value = $current_setting[ self::IS_APPLIED__SETTING_NAME ];

		?>
		<div class="twrp-advanced-args">

			<p class="twrp-posts-queries-tab__paragraph">
				<select
					id="twrp-advanced-args__is-applied-selector"
					class="twrp-advanced-args__is-applied-selector"
					name="<?= esc_attr( $selector_name ); ?>"  rows="10"
				>
					<option value="not_apply" <?php selected( $selector_value, 'not_apply' ); ?>>
						<?= _x( 'Not applied', 'backend', 'twrp' ); ?>
					</option>

					<option value="apply" <?php selected( $selector_value, 'apply' ); ?>>
						<?= _x( 'Apply settings', 'backend', 'twrp' ); ?>
					</option>
				</select>
			</p>

			<textarea
				id="twrp-advanced-args__codemirror-textarea"
				name="<?= esc_attr( $textarea_name ); ?>"  rows="10"
			><?= esc_html( $advanced_args ); ?></textarea>
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
			self::IS_APPLIED__SETTING_NAME  => 'not_apply',
			self::CUSTOM_ARGS__SETTING_NAME => self::advanced_arguments_example(),
		);
	}

	/**
	 * Get the setting submitted from the form. The setting is sanitized and
	 * ready to use.
	 *
	 * @return mixed
	 */
	public function get_submitted_sanitized_setting() {
		if ( isset( $_POST[ self::get_setting_name() ] ) ) { // phpcs:ignore -- Nonce verified
			// phpcs:ignore -- Nonce verified and the setting is sanitized.
			return self::sanitize_setting( wp_unslash( $_POST[ self::get_setting_name() ] ) );
		}

		return self::get_default_setting();
	}

	/**
	 * Sanitize the settings, to be safe for processing.
	 *
	 * @param mixed $setting
	 * @return array The sanitized settings.
	 */
	public static function sanitize_setting( $setting ) {
		if ( ! isset( $setting[ self::CUSTOM_ARGS__SETTING_NAME ], $setting[ self::IS_APPLIED__SETTING_NAME ] ) ) {
			return self::get_default_setting();
		}

		$is_applied_possible_values = array( 'not_apply', 'apply' );
		if ( ! in_array( $setting[ self::IS_APPLIED__SETTING_NAME ], $is_applied_possible_values, true ) ) {
			return self::get_default_setting();
		}

		$sanitized_setting = array(
			self::IS_APPLIED__SETTING_NAME => $setting[ self::IS_APPLIED__SETTING_NAME ],
		);

		$sanitized_setting[ self::CUSTOM_ARGS__SETTING_NAME ] = $setting[ self::IS_APPLIED__SETTING_NAME ];
		$sanitized_setting[ self::CUSTOM_ARGS__SETTING_NAME ] = $setting[ self::CUSTOM_ARGS__SETTING_NAME ];

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
	 * @param mixed $query_settings All query settings, these settings are sanitized.
	 *
	 * @return array The new arguments modified.
	 */
	public static function add_query_arg( $previous_query_args, $query_settings ) {
		if ( ! isset( $query_settings[ self::get_setting_name() ][ self::IS_APPLIED__SETTING_NAME ] ) ) {
			return $previous_query_args;
		}
		$settings = $query_settings[ self::get_setting_name() ];

		if ( 'apply' !== $settings[ self::IS_APPLIED__SETTING_NAME ] ) {
			return $previous_query_args;
		}

		// todo:

		return $previous_query_args;
	}

	public static function init() {
		add_action( 'admin_enqueue_scripts', array( 'TWRP\\Query_Setting\\Advanced_Arguments', 'enqueue_scripts' ) );
	}

	public static function enqueue_scripts() {
		if ( Settings_Menu::is_tab_active( new Queries_Tab() ) ) {
			wp_enqueue_script( 'wp-codemirror' );
		}
	}

	public static function is_valid_json( $json ) {

	}

	public static function advanced_arguments_example() {
		// return '/*
		// {
		// "author": 2,
		// "post__in": [13,42],
		// "tax_query": {
		// "relation": "AND",
		// {
		// "taxonomy": "movie_genre",
		// "field": "slug",
		// "terms": ["action", "comedy"]
		// },
		// {
		// "taxonomy": "actor",
		// "field": "term_id",
		// "terms": [104, 115, 206],
		// "operator": "NOT IN"
		// }
		// }
		// }
		// */';
		return '';
	}

}
