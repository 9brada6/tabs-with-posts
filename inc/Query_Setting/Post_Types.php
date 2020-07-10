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

	public static function init() {
		// Do nothing.
	}

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
		$selected_post_types = $current_setting[ self::SELECTED_TYPES__SETTING_NAME ];
		?>
		<div class="twrp-types-setting">
			<div class="twrp-query-settings__paragraph">
				<?php
				$available_post_types = self::get_available_types();
				foreach ( $available_post_types as $post_type ) :
					if ( ! is_string( $post_type ) && isset( $post_type->name, $post_type->label ) ) :
						$is_checked = in_array( $post_type->name, $selected_post_types, true );
						$this->display_post_type_setting_checkbox( $post_type->name, $post_type->label, $is_checked );
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
	 * @param bool $is_checked
	 * @return void
	 */
	protected function display_post_type_setting_checkbox( $name, $label, $is_checked ) {
		$checked_attr  = $is_checked ? 'checked="checked"' : '';
		$checkbox_id   = 'twrp-post-type-checkbox__' . $name;
		$checkbox_name = 'post_types[' . self::SELECTED_TYPES__SETTING_NAME . '][' . $name . ']';

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
		</div>
		<?php
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

		$available_post_types = self::get_available_types( 'names' );

		$sanitized_post_types = array();
		foreach ( $selected_types as $post_type_name ) {
			if ( in_array( $post_type_name, $available_post_types, true ) ) {
				array_push( $sanitized_post_types, $post_type_name );
			}
		}

		return array( self::SELECTED_TYPES__SETTING_NAME => $sanitized_post_types );
	}

	public static function get_default_setting() {
		if ( post_type_exists( 'post' ) ) {
			return array(
				self::SELECTED_TYPES__SETTING_NAME => array( 'post' ),
			);
		}

		return array(
			self::SELECTED_TYPES__SETTING_NAME => array(),
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
