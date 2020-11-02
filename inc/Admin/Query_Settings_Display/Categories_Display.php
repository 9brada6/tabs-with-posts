<?php
/**
 * File that contains the class with the same name.
 *
 * @phpcs:disable Squiz.Commenting.FunctionComment.Missing
 */

namespace TWRP\Admin\Query_Settings_Display;

use TWRP\Query_Setting\Categories;
use TWRP\Simple_Utils;
use WP_Term;

/**
 * Used to display the categories query setting control.
 */
class Categories_Display extends Query_Setting_Display {

	const CLASS_ORDER = 60;

	protected function get_setting_class() {
		return new Categories();
	}

	public function get_title() {
		return _x( 'Include/Exclude posts by categories', 'backend', 'twrp' );
	}

	public function get_submitted_sanitized_setting() {
		if ( isset( $_POST[ Categories::get_setting_name() ] ) ) { // phpcs:ignore -- Nonce verified
			// phpcs:ignore -- Nonce verified and the setting is sanitized.
			return Categories::sanitize_setting( wp_unslash( $_POST[ Categories::get_setting_name() ] ) );
		}

		return Categories::get_default_setting();
	}

	public function display_setting( $current_setting ) {
		$cat_type_setting = $current_setting[ Categories::CATEGORIES_TYPE__SETTING_KEY ];

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
		$cat_type_setting = $current_setting[ Categories::CATEGORIES_TYPE__SETTING_KEY ];
		?>
		<div class="twrp-query-settings__paragraph twrp-cat-settings__select-type-wrap">
			<select
				id="twrp-cat-settings__type"
				class="twrp-cat-settings__type"
				name="<?= esc_attr( Categories::get_setting_name() . '[' . Categories::CATEGORIES_TYPE__SETTING_KEY . ']' ) ?>"
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
		<div class="twrp-query-settings__paragraph twrp-cat-settings__include-children-wrap">
			<input
				id="twrp-cat-settings__include-children"
				type="checkbox"
				value="1"
				name="<?= esc_attr( Categories::get_setting_name() . '[' . Categories::INCLUDE_CHILDREN__SETTING_KEY . ']' ) ?>"
				<?php checked( '1', $current_setting[ Categories::INCLUDE_CHILDREN__SETTING_KEY ] ); ?>
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
		$select_name  = Categories::get_setting_name() . '[' . Categories::RELATION__SETTING_KEY . ']';
		$cat_relation = $current_setting[ Categories::RELATION__SETTING_KEY ];

		$additional_class = '';
		if ( 'IN' !== $current_setting[ Categories::CATEGORIES_TYPE__SETTING_KEY ] ) {
			$additional_class = ' twrp-hidden';
		}

		?>
		<div
			id="twrp-cat-settings__js-select-relation-wrap"
			class="twrp-query-settings__paragraph twrp-cat-settings__select-relation-wrap<?= esc_attr( $additional_class ); ?>"
		>
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
		/* translators: %s -> category name. */
		$remove_aria_label = _x( 'remove category %s', 'backend, accessibility text', 'twrp' );

		$categories_ids = $current_setting[ Categories::CATEGORIES_IDS__SETTING_KEY ];
		$categories_ids = explode( ';', $categories_ids );
		$categories_ids = Simple_Utils::get_valid_wp_ids( $categories_ids );

		$categories_are_displayed = array();
		if ( ! empty( $categories_ids ) ) {
			$categories_are_displayed = get_categories( array( 'include' => $categories_ids ) );
		}

		$additional_empty_msg_class = '';
		if ( count( $categories_are_displayed ) > 0 ) {
			$additional_empty_msg_class = ' twrp-hidden';
		}

		?>
		<h4 class="twrp-collapsible-content__section-title">
			<?= _x( 'Selected categories:', 'backend', 'twrp' ); ?>
		</h4>
		<div class="twrp-cat-settings__cat-list-section twrp-query-settings__paragraph">
			<div
				id="twrp-cat-settings__cat-list-wrap"
				class="twrp-display-list twrp-cat-settings__cat-list-wrap"
				data-twrp-aria-remove-label="<?= esc_attr( $remove_aria_label ); ?>"
			>
				<div class="twrp-display-list__empty-msg<?= esc_attr( $additional_empty_msg_class ); ?>">
					<span>
						<?= _x( 'No categories added. Select a category and click the button to add.', 'backend', 'twrp' ) ?>
					</span>
				</div>
				<?php foreach ( $categories_ids as $category_id ) : ?>
					<?php
					$category = get_category( (int) $category_id );

					if ( ! $category instanceof WP_Term ) {
						continue;
					}

					$remove_button_aria_label = sprintf( $remove_aria_label, $category->name );
					?>
					<div class="twrp-display-list__item twrp-cat-settings__cat-list-item" data-cat-id="<?= esc_attr( (string) $category->term_id ); ?>">
						<div class="twrp-display-list__item-name twrp-cat-settings__cat-item-name">
							<?= esc_html( $category->name ); ?>
						</div>
						<button
							class="twrp-display-list__item-remove-btn twrp-cat-settings__cat-remove-btn"
							type="button"
							aria-label=<?= esc_html( $remove_button_aria_label ); ?>
						>
							<span class="dashicons dashicons-no"></span>
						</button>
					</div>
				<?php endforeach; ?>
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
				'hide_empty'   => Categories::CATEGORIES_HIDE_EMPTY,
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
				name="<?= esc_attr( Categories::get_setting_name() . '[' . Categories::CATEGORIES_IDS__SETTING_KEY . ']' ) ?>"
				value="<?= esc_attr( $current_setting[ Categories::CATEGORIES_IDS__SETTING_KEY ] ) ?>"
			/>
		<?php
	}

	#endregion -- Display settings



}
