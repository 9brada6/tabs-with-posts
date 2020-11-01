<?php
/**
 * File that contains the class with the same name.
 *
 * @phpcs:disable Squiz.Commenting.FunctionComment.Missing
 */

namespace TWRP\Admin\Query_Settings_Display;

use TWRP\Query_Setting\Post_Types;

/**
 * Used to display the search query setting control.
 */
class Post_Types_Display extends Query_Setting_Display {

	const CLASS_ORDER = 20;

	public function get_setting_class() {
		return new Post_Types();
	}

	public function get_title() {
		return _x( 'Post types to include', 'backend', 'twrp' );
	}

	public function get_submitted_sanitized_setting() {
		if ( isset( $_POST[ Post_Types::get_setting_name() ] ) ) { // phpcs:ignore -- Nonce verified
			// phpcs:ignore -- Nonce verified and the setting is sanitized.
			return Post_Types::sanitize_setting( wp_unslash( $_POST[ Post_Types::get_setting_name() ] ) );
		}

		return Post_Types::get_default_setting();
	}

	public function display_setting( $current_setting ) {
		$selected_post_types = $current_setting[ Post_Types::SELECTED_TYPES__SETTING_NAME ];
		?>
		<div class="twrp-types-setting">
			<div class="twrp-query-settings__paragraph">
				<?php
				$available_post_types = Post_Types::get_available_types();
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
		$checkbox_name = 'post_types[' . Post_Types::SELECTED_TYPES__SETTING_NAME . '][' . $name . ']';

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

}
