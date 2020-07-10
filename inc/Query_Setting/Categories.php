<?php
/**
 * @todo: Comment file.
 * @todo: Remove the margin-bottom of categories classes and move to setting section classes.
 *
 * phpcs:disable Squiz.Commenting.FunctionComment.Missing -- Inherited from interface.
 */

namespace TWRP\Query_Setting;

use TWRP\Utils;

/**
 * Class that will filter posts via categories.
 */
class Categories implements Query_Setting {

	const CATEGORIES_TYPE__SETTING_KEY  = 'setting_type';
	const INCLUDE_CHILDREN__SETTING_KEY = 'include_children';
	const RELATION__SETTING_KEY         = 'relation';

	/**
	 * Input name and array key of the option that remembers the selected
	 * categories.
	 */
	const CATEGORIES_IDS__SETTING_KEY = 'cat_ids';

	public static function init() {
		// Do nothing.
	}

	public static function get_setting_name() {
		return 'cat_settings';
	}

	public function get_title() {
		return _x( 'Include/Exclude posts by categories', 'backend', 'twrp' );
	}

	public static function setting_is_collapsed() {
		return 'auto';
	}

	public function display_setting( $current_setting ) {
		$cat_type_setting = $current_setting[ self::CATEGORIES_TYPE__SETTING_KEY ];

		$additional_class = '';
		if ( 'NA' === $cat_type_setting ) {
			$additional_class = ' twrp-hidden';
		}

		?>
		<div class="twrp-cat-settings twrp-collapsible-content">
			<?php
			$this->display_category_select_type( $current_setting );

			?>
			<div id="twrp-cat-settings__js-settings-wrapper" class="twrp-cat-settings__settings-wrapper<?= esc_attr( $additional_class ); ?>">
				<?php
				$this->display_category_include_children( $current_setting );
				$this->display_categories_relation_setting( $current_setting );

				echo '<hr class="twrp-admin-settings-separator twrp-cat-settings__separator" />';

				$this->display_categories_list( $current_setting );
				$this->display_category_dropdown_selector( $current_setting );
				$this->display_hidden_input_with_cat_ids( $current_setting );
				?>
			</div>
		</div>
		<?php
	}

	#region -- Display settings

	/**
	 * Display a select field where the administrator will select how to filter
	 * the posts in the query based on categories.
	 *
	 * @param array $current_setting
	 * @return void
	 */
	protected function display_category_select_type( $current_setting ) {
		$cat_type_setting = $current_setting[ self::CATEGORIES_TYPE__SETTING_KEY ];
		?>
		<div class="twrp-query-settings__paragraph twrp-cat-settings__select-type-wrap">
			<select
				id="twrp-cat-settings__type"
				class="twrp-cat-settings__type"
				name="<?= esc_attr( $this->get_setting_name() . '[' . self::CATEGORIES_TYPE__SETTING_KEY . ']' ) ?>"
			>
				<option value="NA" <?php selected( $cat_type_setting, 'NA' ); ?>>
					<?= _x( 'Not applied', 'backend', 'twrp' ); ?>
				</option>

				<option value="IN" <?php selected( $cat_type_setting, 'IN' ); ?>>
					<?= _x( 'Include categories', 'backend', 'twrp' ); ?>
				</option>

				<option value="OUT" <?php selected( $cat_type_setting, 'OUT' ); ?>>
				<?= _x( 'Exclude categories', 'backend', 'twrp' ); ?>
				</option>
			</select>
		</div>
		<?php
	}

	/**
	 * Display a checkbox setting that will remember whether or not to also
	 * include categories children.
	 *
	 * @param array $current_setting
	 * @return void
	 */
	protected function display_category_include_children( $current_setting ) {
		?>
		<div class="twrp-query-settings__paragraph-with-hide twrp-cat-settings__include-children-wrap">
			<input
				id="twrp-cat-settings__include-children"
				type="checkbox"
				value="1"
				name="<?= esc_attr( $this->get_setting_name() . '[' . self::INCLUDE_CHILDREN__SETTING_KEY . ']' ) ?>"
				<?php checked( '1', $current_setting[ self::INCLUDE_CHILDREN__SETTING_KEY ] ); ?>
			/>
			<label for="twrp-cat-settings__include-children" class="twrp-cat-settings__include-children-label">
				<?= _x( 'For each category selected include also all children categories.', 'backend', 'twrp' ); ?>
			</label>
		</div>
		<?php
	}

	/**
	 * Display a select field to choose the relation between categories.
	 *
	 * @param array $current_setting
	 * @return void
	 */
	protected function display_categories_relation_setting( $current_setting ) {
		$select_name  = $this->get_setting_name() . '[' . self::RELATION__SETTING_KEY . ']';
		$cat_relation = $current_setting[ self::RELATION__SETTING_KEY ];

		?>
		<div id="twrp-cat-settings__js-select-relation-wrap" class="twrp-query-settings__paragraph-with-hide twrp-cat-settings__select-relation-wrap">
			<p class="twrp-cat-settings__select-relation-text">
				<?= _x( 'An article should have:', 'backend', 'twrp' ); ?>
			</p>

			<select
				id="twrp-cat-settings__relation"
				class="twrp-cat-settings__relation"
				name="<?= esc_attr( $select_name ); ?>"
			>
				<option value="OR" <?php selected( $cat_relation, 'OR' ); ?>>
					<?= _x( 'Minimum one selected category', 'backend', 'twrp' ); ?>
				</option>
				<option value="AND" <?php selected( $cat_relation, 'AND' ); ?>>
					<?= _x( 'All selected categories', 'backend', 'twrp' ); ?>
				</option>
			</select>
		</div>
		<?php
	}

	/**
	 * Display a list with the categories selected.
	 *
	 * @param array $current_setting
	 * @return void
	 */
	protected function display_categories_list( $current_setting ) {
		?>
		<h4 class="twrp-collapsible-content__section-title">
			<?= _x( 'Selected categories:', 'backend', 'twrp' ); ?>
		</h4>
		<div class="twrp-cat-settings__cat-list-section twrp-query-settings__paragraph">
			<div id="twrp-cat-settings__cat-list-wrap" class="twrp-display-list twrp-cat-settings__cat-list-wrap">
				<span class="twrp-display-list__empty-msg">
					<?= _x( 'No categories added. Select a category and click the button to add.', 'backend', 'twrp' ) ?>
				</span>
			</div>
		</div>
		<?php
	}

	/**
	 * Display a dropdown with all categories and an "Add Button" to add them
	 * to the categories list.
	 *
	 * @param array $current_setting
	 * @return void
	 */
	protected function display_category_dropdown_selector( $current_setting ) {
		$categories_dropdown = wp_dropdown_categories(
			array(
				'echo'         => false,
				'name'         => 'cat_dropdown',
				'id'           => 'twrp-cat-settings__js-cat-dropdown',
				'class'        => 'twrp-cat-settings__cat-dropdown',
				'show_count'   => '1',
				'hierarchical' => true,
			)
		);

		?>
		<div class="twrp-cat-settings__add-cat-wrapper twrp-query-settings__paragraph">
			<?= $categories_dropdown; // phpcs:ignore -- No need to escape. ?>
			<button id="twrp-cat-settings__add-cat-btn" class="button button-primary" type="button">
				<?= _x( 'Add Category To List', 'backend', 'twrp' ); ?>
			</button>
		</div>
		<?php
	}

	/**
	 * Display a hidden input where the categories selected will be remembered.
	 *
	 * @param array $current_setting
	 * @return void
	 */
	protected function display_hidden_input_with_cat_ids( $current_setting ) {
		?>
			<input
				id="twrp-cat-settings__cat-ids"
				class="twrp-cat-settings__cat-ids"
				type="hidden"
				name="<?= esc_attr( $this->get_setting_name() . '[' . self::CATEGORIES_IDS__SETTING_KEY . ']' ) ?>"
				value="<?= esc_attr( $current_setting[ self::CATEGORIES_IDS__SETTING_KEY ] ) ?>"
			/>
		<?php
	}

	#endregion -- Display settings

	public static function get_default_setting() {
		return array(
			self::CATEGORIES_TYPE__SETTING_KEY  => 'NA',
			self::INCLUDE_CHILDREN__SETTING_KEY => '1',
			self::RELATION__SETTING_KEY         => 'OR',
			self::CATEGORIES_IDS__SETTING_KEY   => '',
		);
	}

	public static function sanitize_setting( $setting ) {
		$sanitized_setting = array();
		if ( ! is_array( $setting ) ) {
			return self::get_default_setting();
		}

		if ( isset( $setting[ self::CATEGORIES_TYPE__SETTING_KEY ] ) ) {
			$possible_cat_types = array( 'OUT', 'IN' );
			$has_valid_setting  = in_array( $setting[ self::CATEGORIES_TYPE__SETTING_KEY ], $possible_cat_types, true );
			if ( ! $has_valid_setting ) {
				return self::get_default_setting();
			}
		} else {
			return self::get_default_setting();
		}
		$sanitized_setting[ self::CATEGORIES_TYPE__SETTING_KEY ] = $setting[ self::CATEGORIES_TYPE__SETTING_KEY ];

		// Sanitizing the option to include children of all categories selected.
		if ( ! empty( $setting[ self::INCLUDE_CHILDREN__SETTING_KEY ] ) ) {
			$sanitized_setting[ self::INCLUDE_CHILDREN__SETTING_KEY ] = '1';
		} else {
			$sanitized_setting[ self::INCLUDE_CHILDREN__SETTING_KEY ] = '0';
		}

		// Sanitizing the category relation.
		$possible_cat_relation = array( 'OR', 'AND' );
		$has_valid_setting     = in_array( $setting[ self::RELATION__SETTING_KEY ], $possible_cat_relation, true );
		if ( ! $has_valid_setting || 'OUT' === $setting[ self::CATEGORIES_TYPE__SETTING_KEY ] ) {
			$setting[ self::RELATION__SETTING_KEY ] = 'OR';
		}
		$sanitized_setting[ self::RELATION__SETTING_KEY ] = $setting[ self::RELATION__SETTING_KEY ];

		// Checking to see if the categories are a string.
		if ( ! is_string( $setting[ self::CATEGORIES_IDS__SETTING_KEY ] ) ) {
			return self::get_default_setting();
		}

		// Explode the categories into an array of ids and verify them.
		$categories = explode( ';', $setting[ self::CATEGORIES_IDS__SETTING_KEY ] );
		$categories = Utils::get_valid_wp_ids( $categories );
		$categories = array_values( $categories );

		// Checking to see if the array exist.
		if ( empty( $categories ) ) {
			return self::get_default_setting();
		}

		$categories = implode( ';', $categories );
		$sanitized_setting[ self::CATEGORIES_IDS__SETTING_KEY ] = $categories;

		return $sanitized_setting;
	}

	public function get_submitted_sanitized_setting() {
		if ( isset( $_POST[ self::get_setting_name() ] ) ) { // phpcs:ignore -- Nonce verified
			// phpcs:ignore -- Nonce verified and the setting is sanitized.
			return self::sanitize_setting( wp_unslash( $_POST[ self::get_setting_name() ] ) );
		}

		return self::get_default_setting();
	}

	public static function add_query_arg( $previous_query_args, $query_settings ) {
		$settings = $query_settings[ self::get_setting_name() ];

		if ( 'NA' === $settings[ self::CATEGORIES_TYPE__SETTING_KEY ] ) {
			return $previous_query_args;
		}

		if ( empty( $settings[ self::CATEGORIES_IDS__SETTING_KEY ] ) ) {
			return $previous_query_args;
		}
		$cat_ids = explode( ';', $settings[ self::CATEGORIES_IDS__SETTING_KEY ] );
		$cat_ids = Utils::get_valid_wp_ids( $cat_ids );

		if ( '0' === $settings[ self::INCLUDE_CHILDREN__SETTING_KEY ] ) {
			// Do not include children.
			// category__in (array) – use category id.
			// category__not_in (array) – use category id.
			if ( 'IN' === $settings[ self::CATEGORIES_TYPE__SETTING_KEY ] ) {
				if ( 'OR' === $settings[ self::RELATION__SETTING_KEY ] ) {
					$previous_query_args['category__in'] = $cat_ids;
				} else {
					$previous_query_args['category__and'] = $cat_ids;
				}
			} else { // OUT.
				$previous_query_args['category__out'] = $cat_ids;
			}
		} else {
			// cat (int) – use category id.
			if ( 'IN' === $settings[ self::CATEGORIES_TYPE__SETTING_KEY ] ) {
				if ( 'OR' === $settings[ self::RELATION__SETTING_KEY ] ) {
					$cat_ids                    = implode( ',', $cat_ids );
					$previous_query_args['cat'] = $cat_ids;
				} else {
					$categories = get_categories( array( 'include' => $cat_ids ) );
					$cat_slugs  = array();
					foreach ( $categories as $category ) {
						array_push( $cat_slugs, $category->slug );
					}
					$cat_slugs                            = implode( '+', $cat_slugs );
					$previous_query_args['category_name'] = $cat_slugs;
				}
			} else { // OUT.
				foreach ( $cat_ids as &$id ) {
					$id = '-' . $id;
				}
				$cat_ids                    = implode( ',', $cat_ids );
				$previous_query_args['cat'] = $cat_ids;
			}
		}

		return $previous_query_args;
	}
}
