<?php
/**
 * File that contains the class with the same name.
 *
 * @phpcs:disable Squiz.Commenting.FunctionComment.Missing
 */

namespace TWRP\Admin\Query_Settings_Display;

use TWRP\Query_Generator\Query_Setting\Search;

/**
 * Used to display the search query setting control.
 */
class Search_Display extends Query_Setting_Display {

	const CLASS_ORDER = 110;

	protected function get_setting_class() {
		return new Search();
	}

	public function get_title() {
		return _x( 'Filter by search keywords', 'backend', 'twrp' );
	}

	public function get_submitted_sanitized_setting() {
		if ( isset( $_POST[ Search::get_setting_name() ] ) ) { // phpcs:ignore -- Nonce verified
			// phpcs:ignore -- Nonce verified and the setting is sanitized.
			return Search::sanitize_setting( wp_unslash( $_POST[ Search::get_setting_name() ] ) );
		}

		return Search::get_default_setting();
	}

	public function display_setting( $current_setting ) {
		$search_keywords = $current_setting[ Search::SEARCH_KEYWORDS__SETTING_NAME ];

		$info_label = _x( 'Info:', 'backend', 'twrp' );
		$info_text  = _x( 'You can remove keywords by placing "-" in front of them: "pillow -sofa".', 'backend', 'twrp' );
		$info_text2 = _x( 'Leave empty to not apply.', 'backend', 'twrp' );

		$warning_label = _x( 'Warning:.', 'backend', 'twrp' );
		$warning_text  = _x( 'You have searched for a very small keyword, this can be a mistake. The query will work and include the search result whatsoever.', 'backend', 'twrp' );

		$warning_text_is_shown = ( strlen( $search_keywords ) < 3 ) && ( strlen( $search_keywords ) !== -1 );

		$warning_hidden_class = ' twrp-hidden';
		if ( $warning_text_is_shown ) {
			$warning_hidden_class = '';
		}

		?>
		<div class="<?php $this->bem_class(); ?>">
			<p class="<?php $this->query_setting_paragraph_class(); ?> <?php $this->bem_class( 'paragraph' ); ?> twrp-setting-note">
				<span class="twrp-setting-note__label"><?= esc_html( $info_label ); ?></span>
				<span class="twrp-setting-note__text"><?= esc_html( $info_text ); ?> <?= esc_html( $info_text2 ); ?></span>
			</p>

			<div class="<?php $this->query_setting_paragraph_class(); ?> <?php $this->bem_class( 'paragraph' ); ?>">
				<input
					id="<?php $this->bem_class( 'js-search-input' ); ?>"
					class="<?php $this->bem_class( 'input' ); ?>"
					type="text"
					name="<?= esc_attr( Search::get_setting_name() . '[' . Search::SEARCH_KEYWORDS__SETTING_NAME . ']' ); ?>"
					value="<?= esc_attr( $search_keywords ) ?>"
					placeholder="<?= esc_attr_x( 'Search keywords...', 'backend', 'twrp' ) ?>"
				/>
			</div>

			<p id="<?php $this->bem_class( 'js-words-warning' ); ?>" class="<?php $this->query_setting_paragraph_class(); ?> <?php $this->bem_class( 'paragraph' ); ?> twrp-setting-warning<?= esc_attr( $warning_hidden_class ); ?>">
				<span class="twrp-setting-warning__label">
					<?= esc_html( $warning_label ); ?>
				</span>
				<span class="twrp-setting-warning__text">
					<?= esc_html( $warning_text ); ?>
				</span>
			</p>
		</div>
		<?php
	}

	protected function get_bem_base_class() {
		return 'twrp-search-setting';
	}

}
