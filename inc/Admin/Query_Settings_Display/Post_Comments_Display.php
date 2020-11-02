<?php
/**
 * File that contains the class with the same name.
 *
 * @phpcs:disable Squiz.Commenting.FunctionComment.Missing
 */

namespace TWRP\Admin\Query_Settings_Display;

use TWRP\Query_Generator\Query_Setting\Post_Comments;

/**
 * Used to display the post comments query setting control.
 */
class Post_Comments_Display extends Query_Setting_Display {

	const CLASS_ORDER = 100;

	protected function get_setting_class() {
		return new Post_Comments();
	}

	public function get_title() {
		return _x( 'Filter by comments', 'backend', 'twrp' );
	}

	public function get_submitted_sanitized_setting() {
		if ( isset( $_POST[ Post_Comments::get_setting_name() ] ) ) { // phpcs:ignore -- Nonce verified
			// phpcs:ignore -- Nonce verified and the setting is sanitized.
			return Post_Comments::sanitize_setting( wp_unslash( $_POST[ Post_Comments::get_setting_name() ] ) );
		}

		return Post_Comments::get_default_setting();
	}

	public function display_setting( $current_setting ) {
		$hidden_class = '';
		if ( 'NA' === $current_setting[ Post_Comments::COMMENTS_COMPARATOR_NAME ] ) {
			$hidden_class = ' twrp-hidden';
		}

		?>
			<div class="twrp-comments-settings">
				<div class="twrp-query-settings__paragraph twrp-comments-settings__wrapper">
					<span>
						<?= _x( 'Filter articles by number of comments: ', 'backend', 'twrp' ); ?>
					</span>

					<select
						id="twrp-comments-settings__js-comparator"
						class="twrp-comments-settings__comparator"
						name="<?= esc_attr( Post_Comments::get_setting_name() . '[' . Post_Comments::COMMENTS_COMPARATOR_NAME . ']' ); ?>"
					>
						<option value="NA" <?php selected( 'NA', $current_setting[ Post_Comments::COMMENTS_COMPARATOR_NAME ] ); ?>>
							<?= _x( 'Not applied', 'backend', 'twrp' ); ?>
						</option>
						<option value="BE" <?php selected( 'BE', $current_setting[ Post_Comments::COMMENTS_COMPARATOR_NAME ] ); ?>>
							<?= _x( 'Bigger or equal than: >=', 'backend', 'twrp' ); ?>
						</option>
						<option value="LE" <?php selected( 'LE', $current_setting[ Post_Comments::COMMENTS_COMPARATOR_NAME ] ); ?>>
							<?= _x( 'Less or equal than: <=', 'backend', 'twrp' ); ?>
						</option>
						<option value="E" <?php selected( 'E', $current_setting[ Post_Comments::COMMENTS_COMPARATOR_NAME ] ); ?>>
							<?= _x( 'Equal', 'backend', 'twrp' ); ?>
						</option>
						<option value="NE" <?php selected( 'NE', $current_setting[ Post_Comments::COMMENTS_COMPARATOR_NAME ] ); ?>>
							<?= _x( 'Not equal', 'backend', 'twrp' ); ?>
						</option>
					</select>

					<input
						id="twrp-comments-settings__js-num_comments"
						class="twrp-comments-settings__num_comments<?= esc_attr( $hidden_class ); ?>"
						type="number" min="0" step="1"
						placeholder="<?= _x( 'Number of comments', 'backend', 'twrp' ); ?>"
						name="<?= esc_attr( Post_Comments::get_setting_name() . '[' . Post_Comments::COMMENTS_VALUE_NAME . ']' ); ?>"
						value="<?= esc_attr( $current_setting[ Post_Comments::COMMENTS_VALUE_NAME ] ); ?>"
					/>
				</div>
			</div>
		<?php
	}

}
