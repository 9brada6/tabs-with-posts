<?php
/**
 * Contains the class with the same name.
 */

namespace TWRP\Query_Setting;

/**
 * Filter the posts based on if the posts contain a meta key or not.
 */
class Meta_Setting implements Query_Setting {

	const META_KEY_NAME__SETTING_NAME       = 'meta_name';
	const META_KEY_VALUE__SETTING_NAME      = 'meta_value';
	const META_KEY_COMPARATOR__SETTING_NAME = 'meta_comparator';

	public static function init() {
		// Do nothing.
	}

	public static function get_setting_name() {
		return 'meta_settings';
	}

	public function get_title() {
		return _x( 'Meta key', 'backend', 'twrp' );
	}

	public static function setting_is_collapsed() {
		return 'auto';
	}

	public function display_setting( $current_setting ) {
		$comparators    = self::get_meta_key_comparators();
		$meta_key_name  = self::get_setting_name() . '[' . self::META_KEY_NAME__SETTING_NAME . ']';
		$meta_key_value = $current_setting[ self::META_KEY_NAME__SETTING_NAME ];

		$meta_compare_name  = self::get_setting_name() . '[' . self::META_KEY_COMPARATOR__SETTING_NAME . ']';
		$meta_compare_value = $current_setting[ self::META_KEY_COMPARATOR__SETTING_NAME ];

		$meta_value_name  = self::get_setting_name() . '[' . self::META_KEY_VALUE__SETTING_NAME . ']';
		$meta_value_value = $current_setting[ self::META_KEY_VALUE__SETTING_NAME ];

		?>
		<div class="twrp-meta-setting">
			<div class="twrp-query-settings__paragraph">
				<input id="twrp-meta-setting__meta-key" type="text" name="<?= esc_attr( $meta_key_name ); ?>" value="<?= esc_attr( $meta_key_value ); ?>"/>

				<select name="<?= esc_attr( $meta_compare_name ); ?>">
					<?php foreach ( $comparators as $value => $display ) : ?>
						<option
							value="<?= esc_attr( $value ); ?>"
							<?php selected( $value, $meta_compare_value ); ?>
						>
							<?= esc_html( $display ); ?>
						</option>
					<?php endforeach; ?>
				</select>

				<input id="twrp-meta-setting__meta-key-value" type="text" name="<?= esc_attr( $meta_value_name ); ?>" value="<?= esc_attr( $meta_value_value ); ?>"/>
			</div>
		</div>
		<?php
	}

	/**
	 * Get an array where the key is meta comparator and the value is a
	 * description of the comparator.
	 *
	 * @return array
	 */
	public static function get_meta_key_comparators() {
		return array(
			'EXISTS'     => _x( 'Exists', 'backend', 'twrp' ),
			'NOT EXISTS' => _x( 'Not Exists', 'backend', 'twrp' ),
			'!='         => _x( 'Not equal (!=)', 'backend', 'twrp' ),
			'='          => _x( 'Equal (=)', 'backend', 'twrp' ),
			'>='         => _x( 'Bigger or equal than (>=)', 'backend', 'twrp' ),
			'<='         => _x( 'Less or equal than (<=)', 'backend', 'twrp' ),
			'>'          => _x( 'Bigger than (>)', 'backend', 'twrp' ),
			'<'          => _x( 'Less than (<)', 'backend', 'twrp' ),
		);
	}

	public static function get_default_setting() {
		return array(
			self::META_KEY_NAME__SETTING_NAME       => '',
			self::META_KEY_VALUE__SETTING_NAME      => '',
			self::META_KEY_COMPARATOR__SETTING_NAME => '',
		);
	}

	public function get_submitted_sanitized_setting() {
		if ( isset( $_POST[ self::get_setting_name() ] ) ) { // phpcs:ignore -- Nonce verified
			// phpcs:ignore -- Nonce verified and the setting is sanitized.
			return self::sanitize_setting( wp_unslash( $_POST[ self::get_setting_name() ] ) );
		}

		return self::get_default_setting();
	}

	public static function sanitize_setting( $settings ) {
		if ( empty( $settings[ self::META_KEY_NAME__SETTING_NAME ] ) ) {
			return self::get_default_setting();
		}

		$key_name        = sanitize_key( $settings[ self::META_KEY_NAME__SETTING_NAME ] );
		$is_empty_string = preg_match( '/^\s+$/', $key_name );
		if ( $is_empty_string ) {
			return self::get_default_setting();
		}
		$sanitize_settings = array( self::META_KEY_NAME__SETTING_NAME => $key_name );

		// Comparator verification.
		if ( empty( $settings[ self::META_KEY_COMPARATOR__SETTING_NAME ] ) ) {
			return self::get_default_setting();
		}
		$possible_values = array_keys( self::get_meta_key_comparators() );
		if ( ! in_array( $settings[ self::META_KEY_COMPARATOR__SETTING_NAME ], $possible_values, true ) ) {
			return self::get_default_setting();
		}
		$sanitize_settings[ self::META_KEY_COMPARATOR__SETTING_NAME ] = $settings[ self::META_KEY_COMPARATOR__SETTING_NAME ];

		// Meta value verification
		$meta_comparator = $sanitize_settings[ self::META_KEY_COMPARATOR__SETTING_NAME ];
		if ( empty( $settings[ self::META_KEY_VALUE__SETTING_NAME ] )
		|| ( 'EXISTS' === $meta_comparator )
		|| ( 'NOT EXISTS' === $meta_comparator )
		) {
			$sanitize_settings[ self::META_KEY_VALUE__SETTING_NAME ] = '';
		} else {
			$sanitize_settings[ self::META_KEY_VALUE__SETTING_NAME ] = $settings[ self::META_KEY_VALUE__SETTING_NAME ];
		}

		return $sanitize_settings;
	}

	public static function add_query_arg( $previous_query_args, $query_settings ) {
		if ( empty( $query_settings[ self::get_setting_name() ][ self::META_KEY_NAME__SETTING_NAME ] ) ) {
			return $previous_query_args;
		}

		$meta_settings = $query_settings[ self::get_setting_name() ];

		// phpcs:ignore -- Slow query.
		$previous_query_args['meta_key'] = $meta_settings[ self::META_KEY_NAME__SETTING_NAME ];

		if ( 'EXISTS' === $meta_settings[ self::META_KEY_COMPARATOR__SETTING_NAME ] ) {
			return $previous_query_args;
		}

		$previous_query_args['meta_compare'] = $meta_settings[ self::META_KEY_COMPARATOR__SETTING_NAME ];

		if ( isset( $meta_settings[ self::META_KEY_VALUE__SETTING_NAME ] ) ) {
			if ( is_numeric( $meta_settings[ self::META_KEY_VALUE__SETTING_NAME ] ) ) {
				$previous_query_args['meta_value_num'] = $meta_settings[ self::META_KEY_VALUE__SETTING_NAME ];
			} else {
				$previous_query_args['meta_value'] = $meta_settings[ self::META_KEY_VALUE__SETTING_NAME ]; // phpcs:ignore -- Slow query.
			}
		} else {
			$previous_query_args['meta_value'] = ''; // phpcs:ignore -- Slow query.
		}

		return $previous_query_args;
	}
}
