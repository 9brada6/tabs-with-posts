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

	public static function get_setting_name() {
		return 'tab_name';
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
			<input
				id="twrp-name-setting__name"
				class="twrp-name-setting__name" type="text"
				name="<?= esc_attr( $name ) ?>"
				value="<?= esc_attr( $value ) ?>"
				placeholder="<?= esc_attr( $placeholder ) ?>"
			>

			<div class="twrp-name-setting__notice-wrap">
				<span class="twrp-name-setting__notice"><?= _x( 'Note: The name will be visible ONLY in the admin screen.', 'backend', 'twrp' ); ?></span>
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
}
