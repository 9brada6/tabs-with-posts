<?php
/**
 * File that contains the class with the same name.
 *
 * @phpcs:disable Squiz.Commenting.FunctionComment.Missing
 */

namespace TWRP\Admin\Query_Settings_Display;

use TWRP\Query_Generator\Query_Setting\Post_Status;

/**
 * Used to display the search query setting control.
 */
class Post_Status_Display extends Query_Setting_Display {

	const CLASS_ORDER = 30;

	protected function get_setting_class() {
		return new Post_Status();
	}

	public function get_title() {
		return _x( 'Filter by post statuses', 'backend', 'twrp' );
	}

	public function get_submitted_sanitized_setting() {
		if ( isset( $_POST[ Post_Status::get_setting_name() ] ) ) { // phpcs:ignore -- Nonce verified
			// phpcs:ignore -- Nonce verified and the setting is sanitized.
			return Post_Status::sanitize_setting( wp_unslash( $_POST[ Post_Status::get_setting_name() ] ) );
		}

		return Post_Status::get_default_setting();
	}

	public function display_setting( $current_setting ) {
		$info_label = _x( 'Note: ', 'backend', 'twrp' );
		$info_text  = _x( 'Default value is "Published" alongside with all other "public" custom post statuses. If the user is logged in, "private" is also added.', 'backend', 'twrp' );
		$info_text2 = _x( 'Modifying this setting will make query get only posts that the current user has permission to read. For example if a post is "private", it will not show on normal users, only on logged in users(if they have permission to read).', 'backend', 'twrp' );

		$apply_statuses_name    = Post_Status::get_setting_name() . '[' . Post_Status::APPLY_STATUSES__SETTING_NAME . ']';
		$current_apply_statuses = $current_setting[ Post_Status::APPLY_STATUSES__SETTING_NAME ];

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

		<div id="twrp-statuses-settings__js-statuses-wrapper" class="twrp-query-settings__paragraph twrp-statuses-settings__statuses-wrap<?= esc_attr( $additional_hide_class ); ?>">
			<?php
			$post_stats = Post_Status::get_post_statuses();
			foreach ( $post_stats as $status ) :
				if ( isset( $status->name, $status->label ) ) :
					$id = 'twrp-statuses-settings__' . $status->name;

					$checked = '';
					if ( in_array( $status->name, $current_setting[ Post_Status::POST_STATUSES__SETTING_NAME ], true ) ) {
						$checked = 'checked';
					}
					?>
					<div class="twrp-query-settings__checkbox-line">
						<input
							id="<?= esc_attr( $id ); ?>"
							class="twrp-statuses-settings__input"
							name="<?= esc_attr( Post_Status::get_setting_name() . '[' . Post_Status::POST_STATUSES__SETTING_NAME . '][' . $status->name . ']' ); ?>"
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

}
