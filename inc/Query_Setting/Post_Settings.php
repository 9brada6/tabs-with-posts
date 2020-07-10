<?php
/**
 * Contains the class that will filter articles via post ids.
 *
 * @todo: When fetching posts, try to also apply other rules, like posts subtypes
 * and status.
 * @todo: Check to see if posts fetching work in IE 11.
 * @todo post__in (array) – use post ids. Specify posts to retrieve. ATTENTION If you use sticky posts, they will be included (prepended!) in the posts you retrieve whether you want it or not. To suppress this behaviour use ignore_sticky_posts.
 *
 * phpcs:disable Squiz.Commenting.FunctionComment.Missing -- Inherited from interface.
 */

namespace TWRP\Query_Setting;

use TWRP\Utils;

/**
 * Class that will filter the articles via selected post ids. Can include/exclude
 * for posts Ids and posts parents.
 */
class Post_Settings implements Query_Setting {

	const FILTER_TYPE__SETTING_NAME = 'posts_filter';

	const POSTS_INPUT__SETTING_NAME = 'posts_ids';

	public static function init() {
		// Do nothing.
	}

	public static function get_setting_name() {
		return 'post_settings';
	}

	public function get_title() {
		return _x( 'Include/Exclude posts by ID or parent ID.', 'backend', 'twrp' );
	}

	public static function setting_is_collapsed() {
		return 'auto';
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
		$select_name     = self::get_setting_name() . '[' . self::FILTER_TYPE__SETTING_NAME . ']';
		$option_selected = '';
		if ( isset( $current_setting[ self::FILTER_TYPE__SETTING_NAME ] ) ) {
			$option_selected = $current_setting[ self::FILTER_TYPE__SETTING_NAME ];
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
	 * @todo Do not use get_post for each post to make multiple db calls, make just one call.
	 *
	 * @param array $current_setting
	 * @return void
	 */
	protected function display_selected_posts_list( $current_setting ) {
		$ids = array();
		if ( isset( $current_setting[ self::POSTS_INPUT__SETTING_NAME ] ) ) {
			$ids = $current_setting[ self::POSTS_INPUT__SETTING_NAME ];
			$ids = explode( ';', $ids );
			$ids = Utils::get_valid_post_ids( $ids );
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
		<div id="twrp-posts-settings__js-posts-list" class="twrp-display-list twrp-query-settings__paragraph-with-hide twrp-posts-settings__posts-list<?= esc_attr( $list_is_hidden_class ); ?>">
			<div
				id="twrp-posts-settings__js-no-posts-selected"
				class="twrp-display-list__empty-msg<?= esc_attr( $text_is_hidden_class ); ?>"
			>
				<?= _x( 'No posts selected. You can search for a post and click the button to add.', 'backend', 'twrp' ); ?>
			</div>
			<?php foreach ( $ids as $id ) : ?>
				<?php
				$post = get_post( (int) $id );

				if ( $post instanceof \WP_Post ) {
					$title = get_the_title( $post );
				} else {
					continue;
				}

				if ( empty( $title ) ) {
					$title = _x( 'Post with no title', 'backend', 'twrp' );
				}
				?>

				<div class="twrp-display-list__item twrp-posts-settings__post-item" data-post-id="<?= esc_attr( (string) $id ); ?>">
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
		<div id="twrp-posts-settings__js-posts-search-wrap" class="twrp-posts-settings__posts-search-wrap twrp-query-settings__paragraph-with-hide<?= esc_attr( $list_is_hidden_class ); ?>">
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
			name="<?= esc_attr( $input_name ); ?>" type="hidden"
			value="<?= esc_attr( $value ); ?>"
		>
		<?php
	}

	#endregion -- Display settings

	public function get_submitted_sanitized_setting() {
		if ( isset( $_POST[ self::get_setting_name() ] ) ) { // phpcs:ignore -- Nonce verified
			// phpcs:ignore -- Nonce verified and the setting is sanitized.
			return self::sanitize_setting( wp_unslash( $_POST[ self::get_setting_name() ] ) );
		}

		return self::get_default_setting();
	}

	public static function get_default_setting() {
		return array(
			self::FILTER_TYPE__SETTING_NAME => 'NA',
			self::POSTS_INPUT__SETTING_NAME => '',
		);
	}

	public static function sanitize_setting( $setting ) {
		if ( ! isset( $setting[ self::FILTER_TYPE__SETTING_NAME ], $setting[ self::POSTS_INPUT__SETTING_NAME ] ) ) {
			return self::get_default_setting();
		}
		$filter_type = $setting[ self::FILTER_TYPE__SETTING_NAME ];
		$posts_ids   = $setting[ self::POSTS_INPUT__SETTING_NAME ];

		$possible_filters = array( 'NA', 'IP', 'EP', 'IPP', 'EPP' );

		if ( ( ! in_array( $filter_type, $possible_filters, true ) ) || 'NA' === $filter_type ) {
			return self::get_default_setting();
		}

		$sanitized_settings  = array( self::FILTER_TYPE__SETTING_NAME => $setting[ self::FILTER_TYPE__SETTING_NAME ] );
		$posts_ids           = explode( ';', $posts_ids );
		$sanitized_posts_ids = array();

		foreach ( $posts_ids as $id ) {
			$post = get_post( (int) $id );
			if ( $post instanceof \WP_Post ) {
				array_push( $sanitized_posts_ids, $id );
			}
		}

		$sanitized_settings[ self::POSTS_INPUT__SETTING_NAME ] = implode( ';', $posts_ids );

		if ( empty( $sanitized_settings[ self::POSTS_INPUT__SETTING_NAME ] ) ) {
			return self::get_default_setting();
		}

		return $sanitized_settings;
	}

	public static function add_query_arg( $previous_query_args, $query_settings ) {
		if ( ! isset( $query_settings[ self::get_setting_name() ] ) ) {
			return $previous_query_args;
		}
		$settings = $query_settings[ self::get_setting_name() ];

		if ( ! isset( $settings[ self::FILTER_TYPE__SETTING_NAME ], $settings[ self::POSTS_INPUT__SETTING_NAME ] ) ) {
			return $previous_query_args;
		}

		$filter_type = $settings[ self::FILTER_TYPE__SETTING_NAME ];
		if ( 'NA' === $filter_type ) {
			return $previous_query_args;
		}

		$posts_ids = explode( ';', $settings[ self::POSTS_INPUT__SETTING_NAME ] );

		if ( empty( $posts_ids ) ) {
			return $previous_query_args;
		}

		$posts_query_attr = '';
		if ( 'IP' === $filter_type ) {
			$posts_query_attr = 'post__in';
		} elseif ( 'EP' === $filter_type ) {
			$posts_query_attr = 'post__not_in';
		} elseif ( 'IPP' === $filter_type ) {
			$posts_query_attr = 'post_parent__in ';
		} elseif ( 'EPP' === $filter_type ) {
			$posts_query_attr = 'post_parent__not_in ';
		} else {
			return $previous_query_args;
		}

		$previous_query_args[ $posts_query_attr ] = $posts_ids;

		return $previous_query_args;
	}
}
