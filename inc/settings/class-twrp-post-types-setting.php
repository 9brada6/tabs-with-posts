<?php

class TWRP_Post_Types_Setting implements TWRP_Backend_Setting, TWRP_Create_Query_Args {
	public function display_setting( $current_setting ) {

		$post_types = self::get_available_types();

		$selected = self::get_default_setting();
		if ( ! empty( $current_setting ) ) {
			$selected = $current_setting;
		}

		?>
		<div class="twrp-tabs-settings__post-types">
			<?php
			foreach ( $post_types as $post_type ) :
				if ( isset( $post_type->name ) ) :
					$is_checked   = in_array( $post_type->name, $selected, true );
					$checked_attr = $is_checked ? 'checked="checked"' : '';
					?>
					<div>
						<input
							id="twrp-post-type-checkbox__<?= esc_attr( $post_type->name ); ?>"
							name="post_types[<?= esc_attr( $post_type->name ); ?>]"
							type="checkbox"
							value="1"
							<?= $checked_attr //phpcs:ignore ?>
						/>
						<label for="twrp-post-type-checkbox__<?= esc_attr( $post_type->name ); ?>">
							<?= esc_html( $post_type->label ) ?>
						</label>
					</div>
					<?php
				endif;
			endforeach;
			?>
		</div>
		<?php
	}

	public function get_title() {
		return _x( 'Post types to display', 'backend', 'twrp' );
	}

	public function get_submitted_sanitized_setting() {
		if ( isset( $_POST, $_POST['post_types'] ) ) { // phpcs:ignore WordPress.Security
			return self::sanitize_setting( $_POST['post_types'] ); // phpcs:ignore WordPress.Security
		}

		return self::get_default_setting();
	}

	public static function sanitize_setting( $post_types ) {
		$sanitized_post_types = array();

		if ( ! is_array( $post_types ) ) {
			return self::get_default_setting();
		}

		$available_post_types = self::get_available_types( 'names' );
		foreach ( $post_types as $type => $is_enabled ) {
			if ( $is_enabled ) {
				if ( in_array( $type, $available_post_types, true ) ) {
					array_push( $sanitized_post_types, $type );
				}
			}
		}

		if ( empty( $sanitized_post_types ) ) {
			return self::get_default_setting();
		}

		return $sanitized_post_types;
	}

	public static function get_default_setting() {
		return array( 'post' );
	}

	/**
	 * Get the registered custom post types that are available as options to
	 * query posts from.
	 *
	 * @param string $return_type Can be 'objects', or names, @see get_post_types().
	 *
	 * @return array<object>|array<string> Depends on return type parameter.
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
	 * The name of the input, and also of the array key that stores the option of the query.
	 *
	 * @return string
	 */
	public static function get_setting_name() {
		return 'post_types';
	}

	public static function add_query_arg( $previous_query_args, $tabs_settings ) {
		return array();
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
}
