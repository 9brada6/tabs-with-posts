<?php
/**
 * Contains the class that will filter articles via post ids.
 *
 * @todo: When fetching posts, try to also apply other rules, like posts subtypes
 * and status.
 * @todo: Check to see if posts fetching work in IE 11.
 */

namespace TWRP\Query_Setting;

/**
 * Class that will filter the articles via selected post ids. Can include/exclude
 * for posts Ids and posts parents.
 */
class Post_Settings implements Query_Setting {

	const FILTER_TYPE__SETTING_NAME = 'posts_filter';

	const POSTS_INPUT__SETTING_NAME = 'posts_ids';

	/**
	 * The name of the HTML form input, and also of the array key that stores
	 * the option of the query.
	 *
	 * @return string
	 */
	public static function get_setting_name() {
		return 'post_settings';
	}

	/**
	 * The title of the setting accordion.
	 *
	 * @return string
	 */
	public function get_title() {
		return _x( 'Include/Exclude Posts by Id or Parent Id.', 'backend', 'twrp' );
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
	 * @param array $current_setting An array filled with only the settings that
	 * this class work with. The settings are sanitized.
	 * @return void
	 */
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
		$select_name     = self::get_setting_name() . '[' . self::FILTER_TYPE__SETTING_NAME . ']';
		$option_selected = '';
		if ( isset( $current_setting[ self::FILTER_TYPE__SETTING_NAME ] ) ) {
			$option_selected = $current_setting[ self::FILTER_TYPE__SETTING_NAME ];
		}

		?>
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
		<?php
	}

	/**
	 * Creates and display the selected posts list.
	 *
	 * @todo Do not use get_post for each post to make multiple db calls, make just one call.
	 *
	 * @param array $current_setting
	 * @return void
	 */
	protected function display_selected_posts_list( $current_setting ) {
		$ids = '';
		if ( isset( $current_setting[ self::POSTS_INPUT__SETTING_NAME ] ) ) {
			$ids = $current_setting[ self::POSTS_INPUT__SETTING_NAME ];
			$ids = explode( ';', $ids );
		}

		$list_is_hidden_class = '';
		if ( isset( $current_setting[ self::POSTS_INPUT__SETTING_NAME ] ) && 'NA' === $current_setting[ self::POSTS_INPUT__SETTING_NAME ] ) {
			$list_is_hidden_class = ' twrp_hidden';
		}

		$text_is_hidden_class = '';
		if ( ! empty( $ids ) ) {
			$text_is_hidden_class = ' twrp-hidden';
		}

		?>
		<div id="twrp-posts-settings__js-posts-list" class="twrp-display-list twrp-posts-settings__posts-list<?= esc_attr( $list_is_hidden_class ); ?>">
			<div
				id="twrp-posts-settings__js-no-posts-selected"
				class="twrp-display-list__empty-msg<?= esc_attr( $text_is_hidden_class ); ?>"
			>
				<?= _x( 'No posts selected. You can search for a post and click the button to add.', 'backend', 'twrp' ); ?>
			</div>

			<?php foreach ( $ids as $id ) : ?>
				<?php
				$post = get_post( (int) $id );

				$title = get_the_title( $post ); // @phan-suppress-current-line PhanPartialTypeMismatchArgument
				if ( empty( $title ) ) {
					$title = _x( 'Post with no title', 'backend', 'twrp' );
				}
				?>

				<div class="twrp-display-list__item twrp-posts-settings__post-item" data-post-id="<?= esc_attr( $id ); ?>">
					<div class="twrp-posts-settings__post-item-title"><?= $title // phpcs:ignore ?></div>
					<button class="twrp-display-list__item-remove-btn twrp-posts-settings__js-post-remove-btn" type="button">
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
		if ( isset( $current_setting[ self::POSTS_INPUT__SETTING_NAME ] ) && 'NA' === $current_setting[ self::POSTS_INPUT__SETTING_NAME ] ) {
			$list_is_hidden_class = ' twrp_hidden';
		}

		?>
		<div id="twrp-posts-settings__js-posts-search-wrap" class="twrp-posts-settings__posts-search-wrap<?= esc_attr( $list_is_hidden_class ); ?>">
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
		$input_name = self::get_setting_name() . '[' . self::POSTS_INPUT__SETTING_NAME . ']';

		$value = '';
		if ( isset( $current_setting[ self::POSTS_INPUT__SETTING_NAME ] ) ) {
			$value = $current_setting[ self::POSTS_INPUT__SETTING_NAME ];
		}

		?>
		<input id="twrp-posts-settings__js-posts-ids"
			name="<?= esc_attr( $input_name ); ?>" type="text"
			value="<?= esc_attr( $value ); ?>"
		>
		<?php
	}

	/**
	 * Get the setting submitted from the form. The setting is sanitized and
	 * ready to use.
	 *
	 * @return array
	 */
	public function get_submitted_sanitized_setting() {
		if ( isset( $_POST[ self::get_setting_name() ] ) ) { // phpcs:ignore -- Nonce verified
			// phpcs:ignore -- Nonce verified and the setting is sanitized.
			return self::sanitize_setting( wp_unslash( $_POST[ self::get_setting_name() ] ) );
		}

		return self::get_default_setting();
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
	 * Sanitize a variable, to be safe for processing.
	 *
	 * @param mixed $setting
	 * @return mixed The sanitized variable
	 */
	public static function sanitize_setting( $setting ) {
		return $setting;
	}

	/**
	 * Create and insert the new arguments for the WP_Query.
	 *
	 * The previous query arguments will be modified such that will also contain
	 * the new settings, and will return the new query arguments to be passed
	 * into WP_Query class.
	 *
	 * @throws \RuntimeException If a setting cannot implement something.
	 *
	 * @param array $previous_query_args The query arguments before being modified.
	 * @param mixed $query_settings All query settings, these settings are sanitized.
	 * @return array The new arguments modified.
	 */
	public static function add_query_arg( $previous_query_args, $query_settings ) {

	}
}
