<?php
/**
 * Contains the class that will include or not sticky posts.
 *
 * phpcs:disable Squiz.Commenting.FunctionComment.Missing -- Inherited from interface.
 */

namespace TWRP\Query_Setting;

/**
 * Class that will create the setting to include or not sticky posts.
 */
class Sticky_Posts implements Query_Setting {

	/**
	 * The name of the setting which represents whether or not to include sticky
	 * posts.
	 */
	const INCLUSION__SETTING_NAME = 'inclusion';

	public static function get_setting_name() {
		return 'sticky_posts';
	}

	public function get_title() {
		return _x( 'Sticky posts inclusion', 'backend', 'twrp' );
	}

	public static function setting_is_collapsed() {
		return 'auto';
	}

	public function display_setting( $current_setting ) {
		$name            = self::get_setting_name() . '[' . self::INCLUSION__SETTING_NAME . ']';
		$selected_option = $current_setting[ self::INCLUSION__SETTING_NAME ];
		?>
		<div class="twrp-sticky-setting">
			<p class="twrp-query-settings__paragraph">
				<select class="twrp-sticky-setting__selector" name="<?= esc_attr( $name ); ?>">
					<option value="not_include" <?php selected( $selected_option, 'not_include' ); ?>>
						<?= _x( 'Do not include sticky posts', 'backend', 'twrp' ); ?>
					</option>

					<option value="include" <?php selected( $selected_option, 'include' ); ?>>
						<?= _x( 'Include sticky posts', 'backend', 'twrp' ); ?>
					</option>
				</select>
			</p>
		</div>
		<?php
	}

	public static function get_default_setting() {
		return array(
			self::INCLUSION__SETTING_NAME => 'not_include',
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
		if ( ! isset( $setting[ self::INCLUSION__SETTING_NAME ] ) ) {
			return self::get_default_setting();
		}

		$inclusion_setting = $setting[ self::INCLUSION__SETTING_NAME ];
		$possible_values   = array( 'not_include', 'include' );
		if ( ! in_array( $inclusion_setting, $possible_values, true ) ) {
			return self::get_default_setting();
		}

		$sanitized_setting = array(
			self::INCLUSION__SETTING_NAME => $setting[ self::INCLUSION__SETTING_NAME ],
		);

		return $sanitized_setting;
	}

	public static function add_query_arg( $previous_query_args, $query_settings ) {
		$inclusion_setting = $query_settings[ self::get_setting_name() ][ self::INCLUSION__SETTING_NAME ];

		if ( 'include' === $inclusion_setting ) {
			$previous_query_args['ignore_sticky_posts'] = false;
		} else {
			$previous_query_args['ignore_sticky_posts'] = true;
		}

		return $previous_query_args;
	}
}
