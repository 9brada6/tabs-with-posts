<?php
/**
 * File that contains the class with the same name.
 */

namespace TWRP\Admin\Tabs\Query_Options;

use TWRP\Query_Generator\Query_Setting\Post_Settings;
use TWRP\Utils\Simple_Utils;

/**
 * Used to display the post settings query setting control.
 */
class Post_Settings_Display extends Query_Setting_Display {

	public static function get_class_order_among_siblings() {
		return 50;
	}

	protected function get_setting_class() {
		return new Post_Settings();
	}

	public function get_title() {
		return _x( 'Include/Exclude posts by ID or parent ID.', 'backend', 'twrp' );
	}

	#region -- Display settings

	public function display_setting( $current_setting ) {
		?>
		<div class="<?php $this->bem_class(); ?>">
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
		<div class="<?php $this->query_setting_paragraph_class(); ?>">
			<select id="<?php $this->bem_class( 'js-filter-type' ); ?>" name="<?= esc_attr( $select_name ); ?>">
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
			$list_is_hidden_class = ' twrpb-hidden';
		}

		$text_is_hidden_class = '';
		if ( ! empty( $posts ) ) {
			$text_is_hidden_class = ' twrpb-hidden';
		}

		?>
		<div
			id="<?php $this->bem_class( 'js-posts-list' ); ?>"
			class="twrpb-display-list <?php $this->query_setting_paragraph_class(); ?> <?php $this->bem_class( 'posts-list' ); ?><?= esc_attr( $list_is_hidden_class ); ?>"
			data-twrpb-aria-remove-label="<?= esc_attr( $remove_aria_label ); ?>"
		>
			<div
				id="<?php $this->bem_class( 'js-no-posts-selected' ); ?>"
				class="twrpb-display-list__empty-msg<?= esc_attr( $text_is_hidden_class ); ?>"
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

				<div class="twrpb-display-list__item <?php $this->bem_class( 'post-item' ); ?>" data-post-id="<?= esc_attr( (string) $post->ID ); ?>">
					<div class="<?php $this->bem_class( 'post-item-title' ); ?>"><?= $title // phpcs:ignore -- No XSS. ?></div>
					<button class="twrpb-display-list__item-remove-btn <?php $this->bem_class( 'js-post-remove-btn' ); ?>" type="button" aria-label="<?= esc_attr( $remove_btn_label ); ?>">
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
			$list_is_hidden_class = ' twrpb-hidden';
		}

		?>
		<div id="<?php $this->bem_class( 'js-posts-search-wrap' ); ?>" class="<?php $this->bem_class( 'posts-search-wrap' ); ?> <?php $this->query_setting_paragraph_class(); ?><?= esc_attr( $list_is_hidden_class ); ?>">
			<input
				id="<?php $this->bem_class( 'js-posts-search' ); ?>" type="text"
				class="<?php $this->bem_class( 'posts-search' ); ?>"
				placeholder="<?= _x( 'Search for a post', 'backend', 'twrp' ); ?>"
			/>

			<button
				id="<?php $this->bem_class( 'js-posts-add-btn' ); ?>" type="button"
				class="<?php $this->bem_class( 'js-posts-add-btn' ); ?> button button-primary"
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
		<input id="<?php $this->bem_class( 'js-posts-ids' ); ?>"
			name="<?= esc_attr( $input_name ); ?>" type="hidden"
			value="<?= esc_attr( $value ); ?>"
		>
		<?php
	}

	#endregion -- Display settings

	protected function get_bem_base_class() {
		return 'twrpb-posts-settings';
	}

}
