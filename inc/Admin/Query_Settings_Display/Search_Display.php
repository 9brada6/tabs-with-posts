<?php
/**
 * File that contains the class with the same name.
 */

namespace TWRP\Admin\Query_Settings_Display;

use TWRP\Query_Generator\Query_Setting\Search;
use TWRP\Admin\Remember_Note;

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

	public function display_setting( $current_setting ) {
		$search_keywords = $current_setting[ Search::SEARCH_KEYWORDS__SETTING_NAME ];

		$warning_text_is_shown = ( strlen( $search_keywords ) < 4 ) && ( strlen( $search_keywords ) !== -1 );

		$warning_hidden_class = ' twrp-hidden';
		if ( $warning_text_is_shown ) {
			$warning_hidden_class = '';
		}

		?>
		<div class="<?php $this->bem_class(); ?>">
			<?php
			$remember_note = new Remember_Note( Remember_Note::NOTE__SEARCH_QUERY_INFO );
			$remember_note->display_note( $this->get_query_setting_paragraph_class() );
			?>

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

			<div id="<?php $this->bem_class( 'js-words-warning' ); ?>" class="<?php $this->query_setting_paragraph_class(); ?><?php esc_attr( $warning_hidden_class ); ?>">
				<?php
				$remember_note = new Remember_Note( Remember_Note::NOTE__SEARCH_QUERY_TOO_SHORT_WARNING, 'warning' );
				$remember_note->display_note();
				?>
			</div>
		</div>
		<?php
	}

	protected function get_bem_base_class() {
		return 'twrpb-search-setting';
	}

}
