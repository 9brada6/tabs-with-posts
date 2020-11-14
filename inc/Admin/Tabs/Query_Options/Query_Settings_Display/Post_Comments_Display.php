<?php
/**
 * File that contains the class with the same name.
 */

namespace TWRP\Admin\Tabs\Query_Options;

use TWRP\Query_Generator\Query_Setting\Post_Comments;

/**
 * Used to display the post comments query setting control.
 */
class Post_Comments_Display extends Query_Setting_Display {

	public static function get_class_order_among_siblings() {
		return 100;
	}

	protected function get_setting_class() {
		return new Post_Comments();
	}

	public function get_title() {
		return _x( 'Filter by comments', 'backend', 'twrp' );
	}

	public function display_setting( $current_setting ) {
		$hidden_class = '';
		if ( 'NA' === $current_setting[ Post_Comments::COMMENTS_COMPARATOR_NAME ] ) {
			$hidden_class = ' twrpb-hidden';
		}

		?>
			<div class="<?php $this->bem_class(); ?>">
				<div class="<?php $this->query_setting_paragraph_class(); ?> <?php $this->bem_class( 'wrapper' ); ?>">
					<select
						id="<?php $this->bem_class( 'js-comparator' ); ?>"
						class="<?php $this->bem_class( 'comparator' ); ?>"
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
						id="<?php $this->bem_class( 'js-num_comments' ); ?>"
						class="<?php $this->bem_class( 'num_comments' ); ?><?= esc_attr( $hidden_class ); ?>"
						type="number" min="0" step="1"
						placeholder="<?= _x( 'Number of comments', 'backend', 'twrp' ); ?>"
						name="<?= esc_attr( Post_Comments::get_setting_name() . '[' . Post_Comments::COMMENTS_VALUE_NAME . ']' ); ?>"
						value="<?= esc_attr( $current_setting[ Post_Comments::COMMENTS_VALUE_NAME ] ); ?>"
					/>
				</div>
			</div>
		<?php
	}

	protected function get_bem_base_class() {
		return 'twrpb-comments-settings';
	}

}
