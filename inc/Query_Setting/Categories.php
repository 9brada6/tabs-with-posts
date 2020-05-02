<?php
/**
 * @todo: Remove the margin-bottom of categories classes and move to setting section classes.
 */

namespace TWRP\Query_Setting;

/**
 *
 * We have the following categories:
 * TWRP A: 195
 * TWRP A->B: 196
 * TWRP A->B->C: 197
 *
 * TWRP A1: 198
 * TWRP A1->B1: 199
 * TWRP A1->B1->C1: 200
 *
 *
 * Category and any children.
 * cat => '195'
 *
 * Category 195 and it's children OR Category 198 and it's children
 * cat => '195, 198'
 *
 * Category 195 and it's children OR Category 198 and it's children
 * cat => '195, 198'
 */
class Categories implements Interface_Backend_Layout {

	const CATEGORIES_TYPE__SETTING_KEY  = 'setting_type';
	const INCLUDE_CHILDREN__SETTING_KEY = 'include_children';
	const RELATION__SETTING_KEY         = 'relation';

	const CATEGORIES_IDS__SETTING_KEY = 'cat_ids';

	/**
	 * Display the backend HTML for the setting.
	 *
	 * @param mixed $current_setting The current setting of a query if is being
	 * edited, or else an empty string or null will be given.
	 *
	 * @return void
	 */
	public function display_setting( $current_setting ) {

		$current_setting = $this->sanitize_setting( $current_setting );
		\Debug\console_dump( $current_setting );

		$this->display_sum_tests();
		?>
		<div class="twrp-cat-settings twrp-collapsible-content">
			<div class="twrp-cat-settings__select-type-wrap">
				<p class="twrp-cat-settings__select-type-text">Get all articles that:</p>
				<select
					id="twrp-cat-settings__type"
					class="twrp-cat-settings__type"
					name="<?= esc_attr( $this->get_setting_name() . '[' . self::CATEGORIES_TYPE__SETTING_KEY . ']' ) ?>"
				>
					<option value="OUT" <?php selected( $current_setting[ self::CATEGORIES_TYPE__SETTING_KEY ], 'OUT' ); ?>>
						Don't have these categories
					</option>
					<option value="IN" <?php selected( $current_setting[ self::CATEGORIES_TYPE__SETTING_KEY ], 'IN' ); ?>>
						Have these categories
					</option>
				</select>
			</div>

			<div class="twrp-cat-settings__include-children-wrap">
				<input
					id="twrp-cat-settings__include-children"
					type="checkbox"
					value="1"
					name="<?= esc_attr( $this->get_setting_name() . '[' . self::INCLUDE_CHILDREN__SETTING_KEY . ']' ) ?>"
					<?php checked( '1', $current_setting[ self::INCLUDE_CHILDREN__SETTING_KEY ] ); ?>
				/>
				<label for="twrp-cat-settings__include-children" class="twrp-cat-settings__include-children-label">
					For each category selected include also all children categories.
				</label>
			</div>

			<div id="twrp-cat-settings__js-select-relation-wrap" class="twrp-cat-settings__select-relation-wrap twrp-cat-settings__select-relation-wrap--hidden">
				<p class="twrp-cat-settings__select-relation-text">An article should have:</p>
				<select
					id="twrp-cat-settings__relation"
					class="twrp-cat-settings__relation"
					name="<?= esc_attr( $this->get_setting_name() . '[' . self::RELATION__SETTING_KEY . ']' ) ?>"
				>
					<option value="OR" <?php selected( $current_setting[ self::RELATION__SETTING_KEY ], 'OR' ); ?>>
						Minimum one selected category
					</option>
					<option value="AND" <?php selected( $current_setting[ self::RELATION__SETTING_KEY ], 'AND' ); ?>>
						All selected categories
					</option>
				</select>
			</div>

			<hr class="twrp-admin-settings-separator">

			<h4 class="twrp-collapsible-content__section-title">Selected Categories</h4>
			<div class="twrp-cat-settings__cat-list-section">
				<div id="twrp-cat-settings__cat-list-wrap" class="twrp-display-list twrp-cat-settings__cat-list-wrap">
					<span class="twrp-display-list__empty-msg">
						<?= _x( 'No categories added. Select a category and click the button to add.', 'backend', 'twrp' ) ?>
					</span>
				</div>
			</div>

			<!-- todo: accessibility -->
			<div class="twrp-cat-settings__add-cat-wrapper">
				<?php $this->display_dropdown_categories(); ?>
				<button id="twrp-cat-settings__add-cat-btn" class="button button-primary" type="button">Add Category To List</button>

				<input
					id="twrp-cat-settings__cat-ids"
					class="twrp-cat-settings__cat-ids"
					type="hidden"
					name="<?= esc_attr( $this->get_setting_name() . '[' . self::CATEGORIES_IDS__SETTING_KEY . ']' ) ?>"
					value="<?= esc_attr( $current_setting[ self::CATEGORIES_IDS__SETTING_KEY ] ) ?>"
				/>
			</div>
		</div>
		<?php
	}

	public function display_dropdown_categories() {
		wp_dropdown_categories(
			array(
				'show_count'   => '1',
				'hierarchical' => true,
			)
		);
	}

	public function display_sum_tests() {

		$cat_195 = array(
			'cat' => '195',
		);
		$posts   = get_posts( $cat_195 );
		\Debug\console_dump( $posts, 'Cat: 195' );

		$cat_195_198 = array(
			'cat' => '195,198',
		);
		$posts       = get_posts( $cat_195_198 );
		\Debug\console_dump( $posts, 'Cat: 195,198' );

		$cat_195_198 = array(
			'cat' => '195+198',
		);
		$posts       = get_posts( $cat_195_198 );
		\Debug\console_dump( $posts, 'Cat: 195+198' );

		$cat_name_195_198 = array(
			'category_name' => 'category-twrp-a+twrp-a1',
		);
		$posts            = get_posts( $cat_name_195_198 );
		\Debug\console_dump( $posts, 'category_name: category-twrp-a+twrp-a1' );

		$cat_minus_198 = array(
			'cat'     => '-198',
			'orderby' => 'date',
			'order'   => 'DESC',
		);
		$posts         = get_posts( $cat_minus_198 );
		\Debug\console_dump( $posts, 'Cat: -198' );
	}

	/**
	 * The title of the setting.
	 *
	 * @return string
	 */
	public function get_title() {
		return _x( 'Categories Settings', 'backend', 'twrp' );
	}

	/**
	 * The name of the input and of the array key that stores the option of the query.
	 *
	 * @return string
	 */
	public static function get_setting_name() {
		return 'cat_settings';
	}

	/**
	 * Sanitize a variable, to be safe for processing.
	 *
	 * @param mixed $setting The string to be sanitized.
	 */
	public static function sanitize_setting( $setting ) {
		$setting = wp_unslash( $setting );

		if ( isset( $setting[ self::CATEGORIES_TYPE__SETTING_KEY ] ) ) {
			$possible_cat_types = array( 'OUT', 'IN' );
			$has_valid_setting  = in_array( $setting[ self::CATEGORIES_TYPE__SETTING_KEY ], $possible_cat_types, true );
			if ( ! $has_valid_setting ) {
				$setting[ self::CATEGORIES_TYPE__SETTING_KEY ] = 'OUT';
			}
		} else {
			$setting[ self::CATEGORIES_TYPE__SETTING_KEY ] = 'OUT';
		}

		// Sanitizing the option to include children of all categories selected.
		if ( isset( $setting[ self::INCLUDE_CHILDREN__SETTING_KEY ] ) && $setting[ self::INCLUDE_CHILDREN__SETTING_KEY ] ) {
			$setting[ self::INCLUDE_CHILDREN__SETTING_KEY ] = '1';
		} else {
			$setting[ self::INCLUDE_CHILDREN__SETTING_KEY ] = '0';
		}

		// Sanitizing the category relation.
		$possible_cat_relation = array( 'OR', 'AND' );
		$has_valid_setting     = in_array( $setting[ self::RELATION__SETTING_KEY ], $possible_cat_relation, true );
		if ( ! $has_valid_setting || 'OUT' === $setting[ self::CATEGORIES_TYPE__SETTING_KEY ] ) {
			$setting[ self::RELATION__SETTING_KEY ] = 'OR';
		}

		// Checking to see if the categories are a string.
		if ( ! is_string( $setting[ self::CATEGORIES_IDS__SETTING_KEY ] ) ) {
			$setting[ self::CATEGORIES_IDS__SETTING_KEY ] = '';
			return $setting;
		}

		// Explode the categories into an array of ids.
		$categories = explode( ';', $setting[ self::CATEGORIES_IDS__SETTING_KEY ] );

		// Checking to see if the array exist, and explode didn't return false.
		if ( ! $categories ) {
			$setting[ self::CATEGORIES_IDS__SETTING_KEY ] = '';
			return $setting;
		}

		// Verify for each id, and implode at the final.
		foreach ( $categories as $key => $category_id ) {
			if ( ! is_numeric( $category_id ) ) {
				unset( $categories[ $key ] );
				continue;
			} else {
				$categories[ $key ] = (int) $category_id;
			}
		}
		$categories = array_values( $categories );
		$categories = implode( ';', $categories );

		$setting[ self::CATEGORIES_IDS__SETTING_KEY ] = $categories;

		return $setting;
	}

	/**
	 * Get the setting submitted from the form. The setting is sanitized and
	 * ready to use.
	 */
	public function get_submitted_sanitized_setting() {
		if ( isset( $_POST[ self::get_setting_name() ] ) ) {
			return $this->sanitize_setting( $_POST[ self::get_setting_name() ] );
		}

		return $this->get_default_setting();
	}

	/**
	 * The name of the input, and also of the array key that stores the option of the query.
	 */
	public static function get_default_setting() {
		return array();
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
}
