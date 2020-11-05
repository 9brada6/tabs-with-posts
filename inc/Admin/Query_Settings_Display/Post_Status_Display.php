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

	public function display_setting( $current_setting ) {
		$info_label = _x( 'Note: ', 'backend', 'twrp' );
		$info_text  = _x( 'Default value is "Published" alongside with all other "public" custom post statuses. If the user is logged in, "private" is also added.', 'backend', 'twrp' );
		$info_text2 = _x( 'Modifying this setting will make query get only posts that the current user has permission to read. For example if a post is "private", it will not show on normal users, only on logged in users(if they have permission to read).', 'backend', 'twrp' );

		$apply_statuses_name    = Post_Status::get_setting_name() . '[' . Post_Status::APPLY_STATUSES__SETTING_NAME . ']';
		$current_apply_statuses = $current_setting[ Post_Status::APPLY_STATUSES__SETTING_NAME ];

		$additional_hide_class = 'not_applied' === $current_apply_statuses ? ' twrp-hidden' : '';
		?>
		<p class="<?php $this->query_setting_paragraph_class(); ?> twrp-setting-note">
			<span class="twrp-setting-note__label"><?= esc_html( $info_label ); ?></span>
			<span class="twrp-setting-note__text"><?= esc_html( $info_text ); ?></span>
		</p>

		<p class="<?php $this->query_setting_paragraph_class(); ?> twrp-setting-note">
			<span class="twrp-setting-note__label"><?= esc_html( $info_label ); ?></span>
			<span class="twrp-setting-note__text"><?= esc_html( $info_text2 ); ?></span>
		</p>

		<div class="<?php $this->query_setting_paragraph_class(); ?>">
			<select id="<?php $this->bem_class( 'js-apply-select' ); ?>" name="<?= esc_attr( $apply_statuses_name ); ?>">
				<option value="not_applied" <?= selected( $current_apply_statuses, 'not_applied' ); ?>>
					<?= _x( 'Not applied', 'backend', 'twrp' ); ?>
				</option>
				<option value="apply" <?= selected( $current_apply_statuses, 'apply' ); ?>>
					<?= _x( 'Filter by post statuses', 'backend', 'twrp' ); ?>
				</option>
			</select>
		</div>

		<div id="<?php $this->bem_class( 'js-statuses-wrapper' ); ?>" class="<?php $this->query_setting_paragraph_class(); ?> <?php $this->bem_class( 'statuses-wrap' ); ?><?= esc_attr( $additional_hide_class ); ?>">
			<?php
			$post_stats = Post_Status::get_post_statuses();
			foreach ( $post_stats as $status ) :
				if ( isset( $status->name, $status->label ) ) :
					$id = $this->get_bem_class( $status->name );

					$checked = '';
					if ( in_array( $status->name, $current_setting[ Post_Status::POST_STATUSES__SETTING_NAME ], true ) ) {
						$checked = 'checked';
					}
					?>
					<div class="<?php $this->query_setting_checkbox_line_class(); ?>">
						<input
							id="<?= esc_attr( $id ); ?>"
							class="<?php $this->bem_class( 'input' ); ?>"
							name="<?= esc_attr( Post_Status::get_setting_name() . '[' . Post_Status::POST_STATUSES__SETTING_NAME . '][' . $status->name . ']' ); ?>"
							type="checkbox"
							value="<?= esc_attr( $status->name ); ?>"
							<?= esc_attr( $checked ); ?>
						/>
						<label class="<?php $this->bem_class( 'label' ); ?>" for="<?= esc_attr( $id ); ?>">
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

	protected function get_bem_base_class() {
		return 'twrp-statuses-settings';
	}

}
