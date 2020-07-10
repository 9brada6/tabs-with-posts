<?php
/**
 * File that define the TWRP\Query_Setting\Query_Name class.
 *
 * phpcs:disable Squiz.Commenting.FunctionComment.Missing -- Inherited from interface.
 */

namespace TWRP\Query_Setting;

/**
 * Implements the query name setting.
 *
 * This setting is used for the administrators to give a query interrogation a
 * simple name to remember and describe what a query do. This name will be
 * visible only in the backend of the website.
 */
class Query_Name implements Query_Setting {

	/**
	 * The name of the setting and array key which represents the query name.
	 */
	const QUERY_NAME__SETTING_NAME = 'name';

	public static function init() {
		// Do nothing.
	}

	public static function get_setting_name() {
		return 'query_name';
	}

	public function get_title() {
		return _x( 'Name of the query', 'backend', 'twrp' );
	}

	public static function setting_is_collapsed() {
		return true;
	}

	public function display_setting( $current_setting ) {
		$name        = self::get_setting_name() . '[' . self::QUERY_NAME__SETTING_NAME . ']';
		$value       = $current_setting[ self::QUERY_NAME__SETTING_NAME ];
		$placeholder = _x( 'Ex: Related Posts', 'backend', 'twrp' );

		?>
		<div class="twrp-name-setting">
			<div class="twrp-query-settings__paragraph">
			<input
				id="twrp-name-setting__name"
				class="twrp-name-setting__name" type="text"
				name="<?= esc_attr( $name ) ?>"
				value="<?= esc_attr( $value ) ?>"
				placeholder="<?= esc_attr( $placeholder ) ?>"
			/>
			</div>


			<div class="twrp-setting-note twrp-query-settings__paragraph">
				<span class="twrp-setting-note__label">
					<?= _x( 'Note:', 'backend', 'twrp' ); ?>
				</span>
				<span class="twrp-setting-note__text">
					<?= _x( 'The name will be visible ONLY in the admin screen.', 'backend', 'twrp' ); ?>
				</span>
			</div>
		</div>
		<?php
	}

	public static function get_default_setting() {
		return array(
			self::QUERY_NAME__SETTING_NAME => '',
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
		if ( ! isset( $setting[ self::QUERY_NAME__SETTING_NAME ] ) ) {
			return self::get_default_setting();
		}

		if ( ! is_string( $setting[ self::QUERY_NAME__SETTING_NAME ] ) ) {
			return self::get_default_setting();
		}

		$sanitized_setting                                   = array();
		$sanitized_setting[ self::QUERY_NAME__SETTING_NAME ] = $setting[ self::QUERY_NAME__SETTING_NAME ];

		return $sanitized_setting;
	}

	public static function add_query_arg( $previous_query_args, $query_settings ) {
		return $previous_query_args;
	}

	/**
	 * Get the display name for a query.
	 *
	 * @param array $query_settings The full settings of the query, or just the query name settings.
	 * @param int|string $query_id_to_replace The query id to replace with, in case the query does not have a name.
	 * @return string Will return "Query-$query_id_to_replace" if a name doesn't exist.
	 */
	public static function get_query_display_name( $query_settings, $query_id_to_replace ) {
		if ( isset( $query_settings[ self::get_setting_name() ][ self::QUERY_NAME__SETTING_NAME ] ) ) {
			$name = $query_settings[ self::get_setting_name() ][ self::QUERY_NAME__SETTING_NAME ];
		} elseif ( isset( $query_settings[ self::QUERY_NAME__SETTING_NAME ] ) ) {
			$name = $query_settings[ self::QUERY_NAME__SETTING_NAME ];
		} else {
			$name = '';
		}

		if ( empty( $name ) ) {
			/* translators: %s: an unique id number, this translation will be displayed if somehow no query name is present. */
			$name_replacement = _x( 'Query-%s', 'backend', 'twrp' );
			$name             = sprintf( $name_replacement, $query_id_to_replace );
		}

		return $name;
	}
}
