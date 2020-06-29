<?php
/**
 * Contains the class that will select whether or not to apply filters when
 * querying for posts.
 *
 * phpcs:disable Squiz.Commenting.FunctionComment.Missing -- Inherited from interface.
 */

namespace TWRP\Query_Setting;

/**
 * Class that will make a setting that will decide whether or not to suppress
 * the query filters.
 *
 * The default of this setting is true(opposed from WP default false), to try
 * to not have unexpected behaviour because of a plugin/theme/custom filter.
 */
class Suppress_Filters implements Query_Setting {

	/**
	 * The array key of the setting that remember whether or not to suppress the
	 * filters.
	 */
	const SUPPRESS_FILTERS__SETTING_NAME = 'suppress';

	public static function get_setting_name() {
		return 'suppress_filters';
	}

	public function get_title() {
		return _x( 'Suppress other plugins/theme query filters', 'backend', 'twrp' );
	}

	public static function setting_is_collapsed() {
		return 'auto';
	}

	public function display_setting( $current_setting ) {
		$suppress_the_filters = $current_setting[ self::SUPPRESS_FILTERS__SETTING_NAME ];
		$name                 = self::get_setting_name() . '[' . self::SUPPRESS_FILTERS__SETTING_NAME . ']';
		?>
		<div class="twrp-filters-setting">
			<div class="twrp-query-settings__paragraph">
			<select id="twrp-filters-setting__suppress-filters" name="<?= esc_attr( $name ); ?>">
				<option value="true" <?= selected( $suppress_the_filters, 'true' ); ?>>
					<?= _x( 'Suppress the filters', 'backend', 'twrp' ); ?>
				</option>
				<option value="false" <?= selected( $suppress_the_filters, 'false' ); ?>>
					<?= _x( 'Do not suppress the filters', 'backend', 'twrp' ); ?>
				</option>
			</select>
			</div>
		</div>
		<?php
	}

	public static function get_default_setting() {
		return array(
			self::SUPPRESS_FILTERS__SETTING_NAME => 'true',
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

		if ( ! isset( $setting[ self::SUPPRESS_FILTERS__SETTING_NAME ] ) ) {
			return self::get_default_setting();
		}

		$suppress_possible_values = array( 'true', 'false' );
		if ( ! in_array( $setting[ self::SUPPRESS_FILTERS__SETTING_NAME ], $suppress_possible_values, true ) ) {
			return self::get_default_setting();
		}
		$sanitized_settings = array();
		$sanitized_settings[ self::SUPPRESS_FILTERS__SETTING_NAME ] = $setting[ self::SUPPRESS_FILTERS__SETTING_NAME ];

		return $sanitized_settings;
	}

	public static function add_query_arg( $previous_query_args, $query_settings ) {
		if ( ! isset( $query_settings[ self::get_setting_name() ][ self::SUPPRESS_FILTERS__SETTING_NAME ] ) ) {
			return $previous_query_args;
		}

		if ( 'true' === $query_settings[ self::get_setting_name() ][ self::SUPPRESS_FILTERS__SETTING_NAME ] ) {
			$previous_query_args['suppress_filters'] = true;
		}

		return $previous_query_args;
	}
}
