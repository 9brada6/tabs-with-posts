<?php
/**
 * Contains the class that will filter articles via the post types.
 *
 * phpcs:disable Squiz.Commenting.FunctionComment.Missing -- Inherited from interface.
 */

namespace TWRP\Query_Setting;

/**
 * Class that will filter the articles via selected posts types.
 */
class Post_Types implements Query_Setting {

	const SELECTED_TYPES__SETTING_NAME = 'selected_post_types';
	const FORMATS_TYPE__SETTING_NAME   = 'post_format_enable_type';
	const POST_FORMATS__SETTING_NAME   = 'post_formats_selected';

	public static function get_setting_name() {
		return 'post_types';
	}

	public function get_title() {
		return _x( 'Post types to include', 'backend', 'twrp' );
	}

	public static function setting_is_collapsed() {
		return 'auto';
	}

	public function display_setting( $current_setting ) {
		?>
		<div class="twrp-types-setting">
			<div class="twrp-query-settings__paragraph">
				<?php
				$available_post_types = self::get_available_types();
				foreach ( $available_post_types as $post_type ) :
					/**
					 * @todo: remove psalm and make an assert.
					 *
					 * @psalm-suppress PossiblyInvalidPropertyFetch
					 */
					if ( isset( $post_type->name, $post_type->label ) ) :
						$this->display_post_type_setting( $post_type->name, $post_type->label, $current_setting );
					endif;
				endforeach;
				?>
			</div>
		</div>
		<?php
	}

	/**
	 * Display the checkbox for a single custom post type item.
	 *
	 * @param string $name
	 * @param string $label
	 * @param array $current_setting
	 * @return void
	 */
	protected function display_post_type_setting( $name, $label, $current_setting ) {
		$selected_post_types = $current_setting[ self::SELECTED_TYPES__SETTING_NAME ];
		$is_checked          = in_array( $name, $selected_post_types, true );
		$checked_attr        = $is_checked ? 'checked="checked"' : '';
		$checkbox_id         = 'twrp-post-type-checkbox__' . $name;
		$checkbox_name       = self::get_setting_name() . '[' . self::SELECTED_TYPES__SETTING_NAME . '][' . $name . ']';

		?>
		<div class="twrp-types-setting__checkbox twrp-query-settings__checkbox-line">
			<input
				id="<?= esc_attr( $checkbox_id ); ?>"
				name="<?= esc_attr( $checkbox_name ); ?>"
				type="checkbox"
				value="<?= esc_attr( $name ); ?>"
				<?= $checked_attr //phpcs:ignore ?>
			/>
			<label for="<?= esc_attr( $checkbox_id ); ?>">
				<?= esc_html( $label ) ?>
			</label>
			<?php
			if ( 'post' === $name ) { // In WP, only posts currently support post formats.
				$this->display_post_formats_settings( $name, $current_setting );
			}
			?>
		</div>
		<?php
	}

	/**
	 * Display the post formats for the post type.
	 *
	 * @param string $name
	 * @param array $current_setting
	 * @return void
	 */
	protected function display_post_formats_settings( $name, $current_setting ) {
		$select_id    = 'twrp-types-setting__js-' . $name . '-select-formats-type';
		$select_class = 'twrp-types-setting__' . $name . '-select-formats-type';
		$select_name  = self::get_setting_name() . '[' . self::FORMATS_TYPE__SETTING_NAME . '][' . $name . ']';

		$selected_value = 'all';
		if ( isset( $current_setting[ self::FORMATS_TYPE__SETTING_NAME ][ $name ] ) ) {
			$selected_value = $current_setting[ self::FORMATS_TYPE__SETTING_NAME ][ $name ];
		}

		$post_formats = self::get_registered_post_formats();
		if ( false !== $post_formats && ! empty( $post_formats ) ) :
			?>
			<div>
				<select id="<?= esc_attr( $select_id ); ?>" class="<?= esc_attr( $select_class ); ?>" name=<?= esc_attr( $select_name ); ?>>
					<option value="all" <?= selected( 'all', $selected_value ); ?>><?= _x( 'All post formats', 'backend', 'twrp' ); ?></option>
					<option value="custom" <?= selected( 'custom', $selected_value ); ?>><?= _x( 'Custom post formats', 'backend', 'twrp' ); ?></option>
				</select>

				<div>
				<?php foreach ( $post_formats as $format_name ) : ?>
					<?php
						$format_input_id = 'twrp-types-setting__' . $format_name . '-format-checkbox';
						$checkbox_name   = self::get_setting_name() . '[' . self::POST_FORMATS__SETTING_NAME . '][' . $name . '][' . $format_name . ']';
						$is_checked      = 'custom' === $selected_value && in_array( $format_name, $current_setting[ self::POST_FORMATS__SETTING_NAME ][ $name ], true ) ? 'checked="checked"' : '';
					?>
					<div>
						<input
							id="<?= esc_attr( $format_input_id ); ?>"
							name="<?= esc_attr( $checkbox_name ); ?>"
							type="checkbox"
							value="<?= esc_attr( $format_name ); ?>"
							<?= $is_checked // phpcs:ignore ?>
						/>
						<label for="<?= esc_attr( $format_input_id ); ?>">
							<?= esc_html( $format_name ) ?>
						</label>
					</div>
				<?php endforeach; ?>
				</div>
			</div>
			<?php
		endif;
	}

	public function get_submitted_sanitized_setting() {
		if ( isset( $_POST[ self::get_setting_name() ] ) ) { // phpcs:ignore -- Nonce verified
			// phpcs:ignore -- Nonce verified and the setting is sanitized.
			return self::sanitize_setting( wp_unslash( $_POST[ self::get_setting_name() ] ) );
		}

		return self::get_default_setting();
	}

	public static function sanitize_setting( $setting ) {
		if ( ! isset( $setting[ self::SELECTED_TYPES__SETTING_NAME ] ) ) {
			return self::get_default_setting();
		}
		$selected_types = $setting[ self::SELECTED_TYPES__SETTING_NAME ];

		if ( ! is_array( $selected_types ) ) {
			return self::get_default_setting();
		}

		$available_post_types   = self::get_available_types( 'names' );
		$possible_formats_types = array( 'all', 'custom' );

		$sanitized_post_types            = array();
		$sanitized_post_type_format_type = array();
		$sanitized_post_type_formats     = array();
		foreach ( $selected_types as $post_type_name ) {
			if ( in_array( $post_type_name, $available_post_types, true ) ) {
				array_push( $sanitized_post_types, $post_type_name );
			} else {
				continue;
			}

			if ( ! isset( $setting[ self::FORMATS_TYPE__SETTING_NAME ][ $post_type_name ] )
			|| ! in_array( $setting[ self::FORMATS_TYPE__SETTING_NAME ][ $post_type_name ], $possible_formats_types, true )
			|| 'all' === $setting[ self::FORMATS_TYPE__SETTING_NAME ][ $post_type_name ] ) {
				$sanitized_post_type_format_type[ $post_type_name ] = 'all';
				$sanitized_post_type_formats[ $post_type_name ]     = array();
			} else {
				$sanitized_post_type_format_type[ $post_type_name ] = $setting[ self::FORMATS_TYPE__SETTING_NAME ][ $post_type_name ];
				$sanitized_post_type_formats[ $post_type_name ]     = array();

				if ( isset( $setting[ self::POST_FORMATS__SETTING_NAME ][ $post_type_name ] ) && is_array( $setting[ self::POST_FORMATS__SETTING_NAME ][ $post_type_name ] ) ) {
					if ( empty( $setting[ self::POST_FORMATS__SETTING_NAME ][ $post_type_name ] ) ) {
						$sanitized_post_type_format_type[ $post_type_name ] = 'all';
						$sanitized_post_type_formats[ $post_type_name ]     = array();
					}

					$selected_post_formats  = $setting[ self::POST_FORMATS__SETTING_NAME ][ $post_type_name ];
					$available_post_formats = self::get_registered_post_formats();

					if ( false === $available_post_formats ) {
						continue;
					}

					foreach ( $selected_post_formats as $post_format ) {
						if ( in_array( $post_format, $available_post_formats, true ) ) {
							array_push( $sanitized_post_type_formats[ $post_type_name ], $post_format );
						}
					}
				}
			}
		}

		return array(
			self::SELECTED_TYPES__SETTING_NAME => $sanitized_post_types,
			self::FORMATS_TYPE__SETTING_NAME   => $sanitized_post_type_format_type,
			self::POST_FORMATS__SETTING_NAME   => $sanitized_post_type_formats,
		);
	}

	public static function get_default_setting() {
		$default_post_types = array( 'post' );
		if ( post_type_exists( 'post' ) ) {
			$default_post_types = array();
		}

		return array(
			self::SELECTED_TYPES__SETTING_NAME => $default_post_types,
			self::FORMATS_TYPE__SETTING_NAME   => array(),
			self::POST_FORMATS__SETTING_NAME   => array(),
		);
	}

	/**
	 * Get the registered custom post types that are available as options to
	 * query posts from.
	 *
	 * @param string $return_type Can be 'objects', or names, @see get_post_types().
	 *
	 * @return \WP_Post_Type[]|string[] Depends on return type parameter.
	 */
	public static function get_available_types( $return_type = 'objects' ) {
		$args = array(
			'public' => true,
		);

		if ( 'names' === $return_type ) {
			return get_post_types( $args, 'names' );
		}

		return get_post_types( $args, 'objects' );
	}

	/**
	 * Get the registered post formats that theme supports, or false otherwise.
	 *
	 * @return array<string>|false
	 */
	public static function get_registered_post_formats() {
		if ( current_theme_supports( 'post-formats' ) ) {
			$post_formats = get_theme_support( 'post-formats' );

			if ( is_array( $post_formats[0] ) ) {
				return $post_formats[0];
			}
		}

		return false;
	}

	public static function add_query_arg( $previous_query_args, $query_settings ) {
		if ( ! empty( $query_settings[ self::get_setting_name() ][ self::SELECTED_TYPES__SETTING_NAME ] ) ) {
			$post_types = $query_settings[ self::get_setting_name() ][ self::SELECTED_TYPES__SETTING_NAME ];
		} else {
			return $previous_query_args;
		}

		$previous_query_args['post_type'] = $post_types;
		return $previous_query_args;
	}
}
