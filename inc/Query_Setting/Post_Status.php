<?php
/**
 * Contains the class that will filter articles via the post status property.
 */

// todo: addquery_arg do not add if array is empty.
// todo: Add a note that post statuses can reveal things do not wanted.

namespace TWRP\Query_Setting;

/**
 * Creates the possibility to filter a query based on post statuses.
 */
class Post_Status implements Query_Setting {

	/**
	 * The name of the HTML form input and of the array key that stores the option of the query.
	 *
	 * @return string
	 */
	public static function get_setting_name() {
		return 'post_status';
	}

	/**
	 * The title of the setting accordion.
	 *
	 * @return string
	 */
	public function get_title() {
		return _x( 'Post Status', 'backend', 'twrp' );
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

	/**
	 * Display the backend HTML for the setting.
	 *
	 * @param mixed $current_setting The setting is sanitized.
	 *
	 * @return void
	 */
	public function display_setting( $current_setting ) {
		$info_label = _x( 'Info: ', 'backend', 'twrp' );
		$info_text  = _x( 'Leave all checkboxes empty for default behaviour, which is "Published" alongside with all other "public" custom post statuses. If the user is logged in, "private" is also added.', 'backend', 'twrp' );
		?>
		<p class="twrp-posts-queries-tab__paragraph twrp-setting-info">
			<span class="twrp-setting-info__tag"><?= esc_html( $info_label ); ?></span>
			<span class="twrp-setting-info__text"><?= esc_html( $info_text ); ?></span>
		</p>
		<?php
		$post_stats = self::get_post_statuses();
		foreach ( $post_stats as $status ) :
			if ( isset( $status->name, $status->label ) ) :
				$id = 'twrp-post-status-setting__' . $status->name;

				$checked = '';
				if ( in_array( $status->name, $current_setting, true ) ) {
					$checked = 'checked';
				}
				?>
				<div class="twrp-posts-queries-tab__paragraph twrp-post-status-setting__paragraph">
					<input
						id="<?= esc_attr( $id ); ?>"
						class="twrp-post-status-setting__input"
						name="<?= esc_attr( $this->get_setting_name() . '[' . $status->name . ']' ); ?>" type="checkbox"
						value="<?= esc_attr( $status->name ); ?>"
						<?= esc_attr( $checked ); ?>
					/>
					<label class="twrp-post-status-setting__label" for="<?= esc_attr( $id ); ?>">
						<?= esc_html( $status->label ); ?>
					</label>
				</div>
				<?php
			endif;
		endforeach;
	}

	/**
	 * Get the post statuses that an user can choose to make a query.
	 *
	 * @return object[] An array with stdClass post statuses.
	 */
	public static function get_post_statuses() {
		$args = array(
			'public'                 => true,
			'publicly_queryable'     => true,
			'show_in_admin_all_list' => true,
			'internal'               => false,
		);
		return get_post_stati( $args, 'objects', 'or' );
	}

	/**
	 * The default setting to be retrieved, if user didn't set anything.
	 *
	 * @return mixed
	 */
	public static function get_default_setting() {
		return array();
	}

	/**
	 * Get the setting submitted from the form. The setting is sanitized and
	 * ready to use.
	 *
	 * @return array
	 */
	public function get_submitted_sanitized_setting() {
		if ( isset( $_POST[ self::get_setting_name() ] ) ) { // phpcs:ignore -- Nonce verified.
			return self::sanitize_setting( wp_unslash( $_POST[ self::get_setting_name() ] ) ); // phpcs:ignore -- Nonce verified.
		}
		return self::get_default_setting();
	}

	/**
	 * Sanitize a variable, to be safe for processing.
	 *
	 * @param mixed $setting
	 * @return string[] The sanitized variable. An array with post statuses.
	 */
	public static function sanitize_setting( $setting ) {
		if ( ! is_array( $setting ) ) {
			return self::get_default_setting();
		}

		$post_statuses       = self::get_post_statuses();
		$post_statuses_names = wp_list_pluck( $post_statuses, 'name' );

		$sanitized_post_statuses = array();
		foreach ( $setting as $post_status ) {
			if ( in_array( $post_status, $post_statuses_names, true ) ) {
				array_push( $sanitized_post_statuses, $post_status );
			}
		}

		if ( empty( $sanitized_post_statuses ) ) {
			return self::get_default_setting();
		}

		return $sanitized_post_statuses;
	}

	/**
	 * Create and insert the new arguments for the WP_Query.
	 *
	 * The previous query arguments will be modified such that will also contain
	 * the new settings, and will return the new query arguments to be passed
	 * into WP_Query class.
	 *
	 * @param array $previous_query_args The query arguments before being modified.
	 * @param mixed $query_settings All query settings, these settings are sanitized.
	 * @return array The new arguments modified.
	 */
	public static function add_query_arg( $previous_query_args, $query_settings ) {
		if ( ! isset( $query_settings[ self::get_setting_name() ] ) ) {
			return $previous_query_args;
		}

		$previous_query_args['post_status'] = $query_settings[ self::get_setting_name() ];
		return $previous_query_args;
	}
}
