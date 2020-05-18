<?php
/**
 * Contains the class that will filter articles via the post types.
 */

namespace TWRP\Query_Setting;

/**
 * Class that will filter the articles via selected posts types.
 */
class Post_Types implements Interface_Backend_Layout, Interface_Modify_Query_Arguments {

	/**
	 * Display the backend HTML for the setting.
	 *
	 * @param mixed $current_setting The current setting of a query if is being
	 * edited, or else an empty string or null will be given.
	 *
	 * @return void
	 */
	public function display_setting( $current_setting ) {
		$current_setting     = self::sanitize_setting( $current_setting );
		$selected_post_types = self::get_default_setting();
		if ( ! empty( $current_setting ) ) {
			$selected_post_types = $current_setting;
		}

		?>
		<div class="twrp-tabs-settings__post-types">
			<?php
			$available_post_types = self::get_available_types();
			foreach ( $available_post_types as $available_post_type ) :
				if ( isset( $available_post_type->name, $available_post_type->label ) ) :

					$is_checked   = in_array( $available_post_type->name, $selected_post_types, true );
					$checked_attr = $is_checked ? 'checked="checked"' : '';

					?>
					<div>
						<input
							id="twrp-post-type-checkbox__<?= esc_attr( $available_post_type->name ); ?>"
							name="post_types[<?= esc_attr( $available_post_type->name ); ?>]"
							type="checkbox"
							value="<?= esc_attr( $available_post_type->name ); ?>"
							<?= $checked_attr //phpcs:ignore ?>
						/>
						<label for="twrp-post-type-checkbox__<?= esc_attr( $available_post_type->name ); ?>">
							<?= esc_html( $available_post_type->label ) ?>
						</label>
					</div>
					<?php
				endif;
			endforeach;
			?>
		</div>
		<?php
	}

	/**
	 * The title of the setting accordion.
	 *
	 * @return string
	 */
	public function get_title() {
		return _x( 'Post types to display', 'backend', 'twrp' );
	}

	/**
	 * Get the setting submitted from the form. The setting is sanitized and
	 * ready to use.
	 *
	 * @return array
	 */
	public function get_submitted_sanitized_setting() {
		if ( isset( $_POST, $_POST['post_types'] ) ) { // phpcs:ignore WordPress.Security
			return self::sanitize_setting( $_POST['post_types'] ); // phpcs:ignore WordPress.Security
		}

		return self::get_default_setting();
	}

	/**
	 * Sanitize the post types, to be safe for processing.
	 *
	 * @param array<string>|mixed $post_types The array with post types to be sanitized.
	 *                                        If passed anything else, will return te default settings.
	 *
	 * @return array The sanitized post types.
	 */
	public static function sanitize_setting( $post_types ) {
		$sanitized_post_types = array();

		if ( ! is_array( $post_types ) ) {
			return self::get_default_setting();
		}

		$available_post_types = self::get_available_types( 'names' );
		foreach ( $post_types as $post_type_name ) {
			if ( in_array( $post_type_name, $available_post_types, true ) ) {
				array_push( $sanitized_post_types, $post_type_name );
			}
		}

		if ( empty( $sanitized_post_types ) ) {
			return self::get_default_setting();
		}

		return $sanitized_post_types;
	}

	/**
	 * The default setting to be retrieved, if user didn't set anything.
	 *
	 * @return mixed
	 */
	public static function get_default_setting() {
		if ( post_type_exists( 'post' ) ) {
			return array( 'post' );
		}

		return array();
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
	 * The name of the HTML form input, and also of the array key that stores
	 * the option of the query.
	 *
	 * @return string
	 */
	public static function get_setting_name() {
		return 'post_types';
	}

	/**
	 * Create and insert the new arguments for the WP_Query.
	 *
	 * The previous query arguments will be modified such that will also contain
	 * the new settings, and will return the new query arguments to be passed
	 * into WP_Query class.
	 *
	 * @param array $previous_query_args The query arguments before being modified.
	 * @param mixed $query_settings All query settings, these settings are unsanitized.
	 *
	 * @return array The new arguments modified.
	 */
	public static function add_query_arg( $previous_query_args, $query_settings ) {
		if ( isset( $query_settings[ self::get_setting_name() ] ) ) {
			$post_types = $query_settings[ self::get_setting_name() ];
		} else {
			$post_types = self::get_default_setting();
		}

		$previous_query_args['post_types'] = self::sanitize_setting( $post_types );
		return $previous_query_args;
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
