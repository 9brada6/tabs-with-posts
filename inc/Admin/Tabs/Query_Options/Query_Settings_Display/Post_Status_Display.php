<?php
/**
 * File that contains the class with the same name.
 */

namespace TWRP\Admin\Tabs\Query_Options;

use TWRP\Query_Generator\Query_Setting\Post_Status;
use TWRP\Admin\Helpers\Remember_Note;

/**
 * Used to display the post status filter setting control.
 */
class Post_Status_Display extends Query_Setting_Display {

	public static function get_class_order_among_siblings() {
		return 30;
	}

	protected function get_setting_class() {
		return new Post_Status();
	}

	public function get_title() {
		return _x( 'Filter by post statuses', 'backend', 'twrp' );
	}

	public function display_setting( $current_setting ) {
		$apply_statuses_name    = Post_Status::get_setting_name() . '[' . Post_Status::APPLY_STATUSES__SETTING_NAME . ']';
		$current_apply_statuses = $current_setting[ Post_Status::APPLY_STATUSES__SETTING_NAME ];

		$additional_hide_class = 'not_applied' === $current_apply_statuses ? ' twrpb-hidden' : '';

		$remember_note = new Remember_Note( Remember_Note::NOTE__POST_STATUS_INFO );
		$remember_note->display_note( $this->get_query_setting_paragraph_class() );
		?>

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
		return 'twrpb-statuses-settings';
	}

}