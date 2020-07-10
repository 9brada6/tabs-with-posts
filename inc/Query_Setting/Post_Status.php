<?php
/**
 * Contains the class that will filter articles via the post status property.
 *
 * @todo: query_arg do not add if array is empty.
 * @todo: Add a note that post statuses can reveal things do not wanted.
 *
 * phpcs:disable Squiz.Commenting.FunctionComment.Missing -- Inherited from interface.
 */

namespace TWRP\Query_Setting;

/**
 * Creates the possibility to filter a query based on post statuses.
 */
class Post_Status implements Query_Setting {

	const APPLY_STATUSES__SETTING_NAME = 'status_type';

	const POST_STATUSES__SETTING_NAME = 'selected_statuses';

	public static function init() {
		// Do nothing.
	}

	public static function get_setting_name() {
		return 'post_status';
	}

	public function get_title() {
		return _x( 'Filter by post statuses', 'backend', 'twrp' );
	}

	public static function setting_is_collapsed() {
		return 'auto';
	}

	public function display_setting( $current_setting ) {
		$info_label = _x( 'Note: ', 'backend', 'twrp' );
		$info_text  = _x( 'Default value is "Published" alongside with all other "public" custom post statuses. If the user is logged in, "private" is also added.', 'backend', 'twrp' );
		$info_text2 = _x( 'Be aware of this setting. As it can easily lead to an information disclosure vulnerability if you are not careful.', 'backend', 'twrp' );

		$apply_statuses_name    = self::get_setting_name() . '[' . self::APPLY_STATUSES__SETTING_NAME . ']';
		$current_apply_statuses = $current_setting[ self::APPLY_STATUSES__SETTING_NAME ];

		$additional_hide_class = 'not_applied' === $current_apply_statuses ? ' twrp-hidden' : '';
		?>
		<p class="twrp-query-settings__paragraph twrp-setting-note">
			<span class="twrp-setting-note__label"><?= esc_html( $info_label ); ?></span>
			<span class="twrp-setting-note__text"><?= esc_html( $info_text ); ?></span>
		</p>

		<p class="twrp-query-settings__paragraph twrp-setting-note">
			<span class="twrp-setting-note__label"><?= esc_html( $info_label ); ?></span>
			<span class="twrp-setting-note__text"><?= esc_html( $info_text2 ); ?></span>
		</p>

		<div class="twrp-query-settings__paragraph">
			<select id="twrp-statuses-settings__js-apply-select" name="<?= esc_attr( $apply_statuses_name ); ?>">
				<option value="not_applied" <?= selected( $current_apply_statuses, 'not_applied' ); ?>>
					<?= _x( 'Not applied', 'backend', 'twrp' ); ?>
				</option>
				<option value="apply" <?= selected( $current_apply_statuses, 'apply' ); ?>>
					<?= _x( 'Filter by post statuses', 'backend', 'twrp' ); ?>
				</option>
			</select>
		</div>

		<div id="twrp-statuses-settings__js-statuses-wrapper" class="twrp-query-settings__paragraph-with-hide twrp-statuses-settings__statuses-wrap<?= esc_attr( $additional_hide_class ); ?>">
			<?php
			$post_stats = self::get_post_statuses();
			foreach ( $post_stats as $status ) :
				if ( isset( $status->name, $status->label ) ) :
					$id = 'twrp-statuses-settings__' . $status->name;

					$checked = '';
					if ( in_array( $status->name, $current_setting[ self::POST_STATUSES__SETTING_NAME ], true ) ) {
						$checked = 'checked';
					}
					?>
					<div class="twrp-query-settings__checkbox-line">
						<input
							id="<?= esc_attr( $id ); ?>"
							class="twrp-statuses-settings__input"
							name="<?= esc_attr( $this->get_setting_name() . '[' . self::POST_STATUSES__SETTING_NAME . '][' . $status->name . ']' ); ?>"
							type="checkbox"
							value="<?= esc_attr( $status->name ); ?>"
							<?= esc_attr( $checked ); ?>
						/>
						<label class="twrp-statuses-settings__label" for="<?= esc_attr( $id ); ?>">
							<?= esc_html( $status->label ); ?>
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
	 * Get the post statuses that an user can choose to make a query.
	 *
	 * @return object[] An array with stdClass post statuses.
	 */
	public static function get_post_statuses() {
		$args = array(
			'public'                    => true,
			'publicly_queryable'        => true,
			'show_in_admin_all_list'    => true,
			'show_in_admin_status_list' => true,
			'internal'                  => false,
		);
		return get_post_stati( $args, 'objects', 'or' );
	}

	public static function get_default_setting() {
		return array(
			self::APPLY_STATUSES__SETTING_NAME => 'not_applied',
			self::POST_STATUSES__SETTING_NAME  => array(),
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
		if ( ! is_array( $setting ) ) {
			return self::get_default_setting();
		}

		if ( ! isset( $setting[ self::APPLY_STATUSES__SETTING_NAME ] ) || 'apply' !== $setting[ self::APPLY_STATUSES__SETTING_NAME ] ) {
			return self::get_default_setting();
		}

		if ( ! isset( $setting[ self::POST_STATUSES__SETTING_NAME ] ) || ! is_array( $setting[ self::POST_STATUSES__SETTING_NAME ] ) ) {
			return self::get_default_setting();
		}

		$post_statuses       = self::get_post_statuses();
		$post_statuses_names = wp_list_pluck( $post_statuses, 'name' );

		$sanitized_post_statuses = array(
			self::APPLY_STATUSES__SETTING_NAME => $setting[ self::APPLY_STATUSES__SETTING_NAME ],
			self::POST_STATUSES__SETTING_NAME  => array(),
		);
		foreach ( $setting[ self::POST_STATUSES__SETTING_NAME ] as $post_status ) {
			if ( in_array( $post_status, $post_statuses_names, true ) ) {
				array_push( $sanitized_post_statuses[ self::POST_STATUSES__SETTING_NAME ], $post_status );
			}
		}

		/** @psalm-suppress RedundantCondition -- There is no redundant condition. */
		if ( empty( $sanitized_post_statuses[ self::POST_STATUSES__SETTING_NAME ] ) ) {
			return self::get_default_setting();
		}

		return $sanitized_post_statuses;
	}

	public static function add_query_arg( $previous_query_args, $query_settings ) {
		if ( ! isset( $query_settings[ self::get_setting_name() ][ self::APPLY_STATUSES__SETTING_NAME ] )
			|| 'apply' !== $query_settings[ self::get_setting_name() ][ self::APPLY_STATUSES__SETTING_NAME ] ) {
				return $previous_query_args;
		}

		if ( empty( $query_settings[ self::get_setting_name() ][ self::POST_STATUSES__SETTING_NAME ] ) ) {
			return $previous_query_args;
		}

		$previous_query_args['post_status'] = $query_settings[ self::get_setting_name() ][ self::POST_STATUSES__SETTING_NAME ];
		return $previous_query_args;
	}
}
