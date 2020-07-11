<?php
/**
 * Contains the class that will filter articles via the post password.
 *
 * phpcs:disable Squiz.Commenting.FunctionComment.Missing -- Inherited from interface.
 */

namespace TWRP\Query_Setting;

/**
 * Creates the possibility to filter a query based on the post passwords,
 * if they are set.
 */
class Password_Protected implements Query_Setting {

	/**
	 * The name of the setting and array key which represents whether or not the
	 * posts to be filtered by passwords or not.
	 */
	const PASSWORD_PROTECTED__SETTING_NAME = 'password_protected';

	public static function init() {
		// Do nothing.
	}

	public static function get_setting_name() {
		return 'password_protected';
	}

	public function get_title() {
		return _x( 'Filter by password', 'backend', 'twrp' );
	}

	public static function setting_is_collapsed() {
		return 'auto';
	}

	public function display_setting( $current_setting ) {
		$select_name     = self::get_setting_name() . '[' . self::PASSWORD_PROTECTED__SETTING_NAME . ']';
		$current_setting = $current_setting[ self::PASSWORD_PROTECTED__SETTING_NAME ];

		$not_applied_text  = _x( 'Not Applied (Posts with and without password)', 'backend', 'twrp' );
		$has_password_text = _x( 'Only posts with password', 'backend', 'twrp' );
		$no_password_text  = _x( 'Only posts without password', 'backend', 'twrp' );

		?>
		<div class="twrp-password-settings">
			<div class="twrp-query-settings__paragraph">
				<select name="<?= esc_attr( $select_name ); ?>">
					<option value="not_applied" <?php selected( 'not_applied', $current_setting ); ?>>
						<?= esc_html( $not_applied_text ); ?>
					</option>
					<option value="has_password" <?php selected( 'has_password', $current_setting ); ?>>
						<?= esc_html( $has_password_text ); ?>
					</option>
					<option value="no_password" <?php selected( 'no_password', $current_setting ); ?>>
						<?= esc_html( $no_password_text ); ?>
					</option>
				</select>
			</div>
		</div>
		<?php
	}

	public static function get_default_setting() {
		return array(
			self::PASSWORD_PROTECTED__SETTING_NAME => 'not_applied',
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
		$sanitized_settings = array();
		$options            = array( 'has_password', 'no_password' );
		$need_password      = self::PASSWORD_PROTECTED__SETTING_NAME;

		if ( ! isset( $setting[ $need_password ] ) || ! in_array( $setting[ $need_password ], $options, true ) ) {
			return self::get_default_setting();
		}

		$sanitized_settings[ $need_password ] = $setting[ $need_password ];

		return $sanitized_settings;
	}

	public static function add_query_arg( $previous_query_args, $query_settings ) {
		if ( ! isset( $query_settings[ self::get_setting_name() ][ self::PASSWORD_PROTECTED__SETTING_NAME ] ) ) {
			return $previous_query_args;
		}

		$setting = $query_settings[ self::get_setting_name() ][ self::PASSWORD_PROTECTED__SETTING_NAME ];

		if ( 'has_password' === $setting ) {
			$previous_query_args['has_password'] = true;
		}

		if ( 'no_password' === $setting ) {
			$previous_query_args['has_password'] = false;
		}

		return $previous_query_args;
	}
}
