<?php
/**
 * File that contains the class with the same name.
 *
 * @phpcs:disable Squiz.Commenting.FunctionComment.Missing
 */

namespace TWRP\Admin\Query_Settings_Display;

use TWRP\Query_Setting\Post_Settings;
use TWRP\Simple_Utils;

/**
 * Used to display the post settings query setting control.
 */
class Post_Settings_Display extends Query_Setting_Display {

	const CLASS_ORDER = 50;

	protected function get_setting_class() {
		return new Post_Settings();
	}

	public function get_title() {
		return _x( 'Include/Exclude posts by ID or parent ID.', 'backend', 'twrp' );
	}

	public function get_submitted_sanitized_setting() {
		if ( isset( $_POST[ Post_Settings::get_setting_name() ] ) ) { // phpcs:ignore -- Nonce verified
			// phpcs:ignore -- Nonce verified and the setting is sanitized.
			return Post_Settings::sanitize_setting( wp_unslash( $_POST[ Post_Settings::get_setting_name() ] ) );
		}

		return Post_Settings::get_default_setting();
	}

	#region -- Display settings

	public function display_setting( $current_setting ) {
		?>
		<div class="twrp-posts-settings">
			<?php $this->display_select_posts_inclusion_type( $current_setting ); ?>
			<?php $this->display_selected_posts_list( $current_setting ); ?>
			<?php $this->display_search_and_add_posts_to_list( $current_setting ); ?>
			<?php $this->display_posts_ids_hidden_input( $current_setting ); ?>
		</div>
		<?php
	}

	/**
	 * Display an option that will decide what to do with the selected posts.
	 *
	 * @param array $current_setting
	 * @return void
	 */
	protected function display_select_posts_inclusion_type( $current_setting ) {
		$select_name     = Post_Settings::get_setting_name() . '[' . Post_Settings::FILTER_TYPE__SETTING_NAME . ']';
		$option_selected = '';
		if ( isset( $current_setting[ Post_Settings::FILTER_TYPE__SETTING_NAME ] ) ) {
			$option_selected = $current_setting[ Post_Settings::FILTER_TYPE__SETTING_NAME ];
		}

		?>
		<div class="twrp-query-settings__paragraph">
			<select id="twrp-posts-settings__js-filter-type" name="<?= esc_attr( $select_name ); ?>">
				<option value="NA" <?php selected( 'NA', $option_selected ); ?>>
					<?= _x( 'Not Applied', 'backend', 'twrp' ); ?>
				</option>
				<option value="IP" <?php selected( 'IP', $option_selected ); ?>>
					<?= _x( 'Include Posts', 'backend', 'twrp' ); ?>
				</option>
				<option value="EP" <?php selected( 'EP', $option_selected ); ?>>
					<?= _x( 'Exclude Posts', 'backend', 'twrp' ); ?>
				</option>
				<option value="IPP" <?php selected( 'IPP', $option_selected ); ?>>
					<?= _x( 'Include Posts by Parent Id', 'backend', 'twrp' ); ?>
				</option>
				<option value="EPP" <?php selected( 'EPP', $option_selected ); ?>>
					<?= _x( 'Exclude Posts by Parent Id', 'backend', 'twrp' ); ?>
				</option>
			</select>
		</div>
		<?php
	}

	/**
	 * Creates and display the selected posts list.
	 *
	 * @param array $current_setting
	 * @return void
	 */
	protected function display_selected_posts_list( $current_setting ) {
		$ids   = array();
		$posts = array();

		if ( isset( $current_setting[ Post_Settings::POSTS_INPUT__SETTING_NAME ] ) ) {
			$ids = $current_setting[ Post_Settings::POSTS_INPUT__SETTING_NAME ];
			$ids = explode( ';', $ids );
			$ids = Simple_Utils::get_valid_wp_ids( $ids );
			if ( ! empty( $ids ) ) {
				$posts = get_posts(
					array(
						'post__in' => $ids,
						'orderby'  => 'post__in',
					)
				);
			}
		}

		/* translators: %s -> post name. */
		$remove_aria_label = _x( 'remove post %s', 'backend, accessibility text', 'twrp' );

		$list_is_hidden_class = '';
		if ( isset( $current_setting[ Post_Settings::POSTS_INPUT__SETTING_NAME ] ) && 'NA' === $current_setting[ Post_Settings::POSTS_INPUT__SETTING_NAME ] ) {
			$list_is_hidden_class = ' twrp_hidden';
		}

		$text_is_hidden_class = '';
		if ( ! empty( $posts ) ) {
			$text_is_hidden_class = ' twrp-hidden';
		}

		?>
		<div
			id="twrp-posts-settings__js-posts-list"
			class="twrp-display-list twrp-query-settings__paragraph twrp-posts-settings__posts-list<?= esc_attr( $list_is_hidden_class ); ?>"
			data-twrp-aria-remove-label="<?= esc_attr( $remove_aria_label ); ?>"
		>
			<div
				id="twrp-posts-settings__js-no-posts-selected"
				class="twrp-display-list__empty-msg<?= esc_attr( $text_is_hidden_class ); ?>"
			>
				<?= _x( 'No posts selected. You can search for a post and click the button to add.', 'backend', 'twrp' ); ?>
			</div>
			<?php foreach ( $posts as $post ) : ?>
				<?php
				$title = get_the_title( $post );

				if ( empty( $title ) ) {
					$title = _x( 'Post with no title', 'backend', 'twrp' );
				}

				$remove_btn_label = sprintf( $remove_aria_label, $title );
				?>

				<div class="twrp-display-list__item twrp-posts-settings__post-item" data-post-id="<?= esc_attr( (string) $post->ID ); ?>">
					<div class="twrp-posts-settings__post-item-title"><?= $title // phpcs:ignore ?></div>
					<button class="twrp-display-list__item-remove-btn twrp-posts-settings__js-post-remove-btn" type="button" aria-label="<?= esc_attr( $remove_btn_label ); ?>">
						<span class="dashicons dashicons-no"></span>
					</button>
				</div>
			<?php endforeach; ?>
		</div>
		<?php
	}

	/**
	 * Display a search box and an add button to add posts.
	 *
	 * @param array $current_setting
	 * @return void
	 */
	protected function display_search_and_add_posts_to_list( $current_setting ) {
		$list_is_hidden_class = '';
		if ( isset( $current_setting[ Post_Settings::POSTS_INPUT__SETTING_NAME ] ) && 'NA' === $current_setting[ Post_Settings::POSTS_INPUT__SETTING_NAME ] ) {
			$list_is_hidden_class = ' twrp_hidden';
		}

		?>
		<div id="twrp-posts-settings__js-posts-search-wrap" class="twrp-posts-settings__posts-search-wrap twrp-query-settings__paragraph<?= esc_attr( $list_is_hidden_class ); ?>">
			<input
				id="twrp-posts-settings__js-posts-search" type="text"
				class="twrp-posts-settings__posts-search"
				placeholder="<?= _x( 'Search for a post', 'backend', 'twrp' ); ?>"
			/>

			<button
				id="twrp-posts-settings__js-posts-add-btn" type="button"
				class="twrp-posts-settings__js-posts-add-btn button button-primary"
			>
				<?= _x( 'Add Post', 'backend', 'twrp' ); ?>
			</button>
		</div>
		<?php
	}

	/**
	 * Display a hidden input that will remember what posts the administrator
	 * has chosen.
	 *
	 * @param array $current_setting
	 * @return void
	 */
	protected function display_posts_ids_hidden_input( $current_setting ) {
		$input_name = Post_Settings::get_setting_name() . '[' . Post_Settings::POSTS_INPUT__SETTING_NAME . ']';

		$value = '';
		if ( isset( $current_setting[ Post_Settings::POSTS_INPUT__SETTING_NAME ] ) ) {
			$value = $current_setting[ Post_Settings::POSTS_INPUT__SETTING_NAME ];
		}

		?>
		<input id="twrp-posts-settings__js-posts-ids"
			name="<?= esc_attr( $input_name ); ?>" type="hidden"
			value="<?= esc_attr( $value ); ?>"
		>
		<?php
	}

	#endregion -- Display settings



}
