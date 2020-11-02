<?php
/**
 * File that holds the class with the same name.
 */

namespace TWRP\TWRP_Widget;

use TWRP\Database\Query_Options;
use TWRP\TWRP_Widget\Widget;
use TWRP\Utils;

/**
 * Class responsible with displaying the widget form.
 */
class Widget_Form {

	/**
	 * Display the admin widget form, where user make settings.
	 *
	 * @param array $instance_settings Widget instance settings.
	 * @param int $widget_id
	 * @return void
	 */
	public static function display_form( $instance_settings, $widget_id ) {
		$queries = Query_Options::get_all_queries();
		?>
		<div class="twrp-widget-form" data-twrp-widget-id=<?= esc_attr( (string) $widget_id ); ?> >
			<?php
			if ( empty( $queries ) ) {
				self::display_no_queries_exist();
			} else {
				self::display_select_query_options();
				self::display_queries_settings( $instance_settings, $widget_id );
			}
			?>
		</div>
		<?php
	}

	/**
	 * Display a text in case that no queries have been create, to guide the
	 * administrator to the settings.
	 *
	 * @return void
	 */
	protected static function display_no_queries_exist() {
		?>
		<p class="twrp-widget-form__select-queries-exist">
			<?= _x( 'No queries created. You need to go to Settings Menu -> Tabs With Recommended Posts(Submenu) and create a query and a style.', 'backend', 'twrp' ); ?>
		</p>
		<?php
	}

	/**
	 * Display a selector and an add button to add queries to be displayed.
	 *
	 * @return void
	 */
	protected static function display_select_query_options() {
		$queries     = Query_Options::get_all_queries();
		$queries_ids = array_keys( $queries );
		?>
		<p class="twrp-widget-form__select-query-wrapper">
			<span class="twrp-widget-form__select-query-to-add-text">
				<?= _x( 'Select a query(tab) to add:', 'backend', 'twrp' ); ?>
			</span>
			<select class="twrp-widget-form__select-query-to-add">
				<?php foreach ( $queries_ids as $query_id ) : ?>
					<option value="<?= esc_attr( (string) $query_id ) ?>">
						<?= esc_html( Query_Options::get_query_display_name( $query_id ) ); ?>
					</option>
				<?php endforeach; ?>
			</select>
			<button class="twrp-widget-form__select-query-to-add-btn button button-primary" type="button">
				<?= _x( 'Add', 'backend', 'twrp' ); ?>
			</button>
		</p>
		<?php
	}

	/**
	 * Display all settings for each query separated into each tab.
	 *
	 * @param array $instance_settings Widget instance settings.
	 * @param int $widget_id
	 * @return void
	 */
	protected static function display_queries_settings( $instance_settings, $widget_id ) {
		$selected_queries_list = '';
		if ( isset( $instance_settings['queries'] ) ) {
			$selected_queries_list = $instance_settings['queries'];
		}
		$selected_queries_ids = explode( ';', $selected_queries_list );
		$selected_queries_ids = Utils::get_valid_wp_ids( $selected_queries_ids );

		$queries_field_id   = Widget::twrp_get_field_id( $widget_id, 'queries' );
		$queries_field_name = Widget::twrp_get_field_name( $widget_id, 'queries' );

		?>
		<ul class="twrp-widget-form__selected-queries-list">
			<?php
			foreach ( $selected_queries_ids as $query_id ) :
				self::display_query_settings( (int) $widget_id, (int) $query_id );
			endforeach;
			?>
		</ul>

		<input
			id="<?= esc_attr( $queries_field_id ); ?>"
			class="twrp-widget-form__selected-queries"
			name="<?= esc_attr( $queries_field_name ); ?>"
			type="text"
			value="<?= esc_attr( $selected_queries_list ); ?>"
		/>
		<?php
	}

	#region -- Functions to create each query tab setting.

	/**
	 * Display the settings of a specified query, including the article block
	 * selected.
	 *
	 * @param int $widget_id
	 * @param int $query_id
	 * @return void
	 */
	public static function display_query_settings( $widget_id, $query_id ) {
		?>
		<li class="twrp-widget-form__selected-query" data-twrp-query-id="<?= esc_attr( (string) $query_id ); ?>">
			<h4 class="twrp-widget-form__selected-query-title">
				<button class="twrp-widget-form__remove-selected-query" type="button" >X</button>
				<?= esc_attr( Query_Options::get_query_display_name( $query_id ) ); ?>
			</h4>

			<div class="twrp-widget-form__selected-query-settings">

				<h5 class="twrp-widget-form__query-description-title">
					<?= _x( 'Tab Settings:', 'backend', 'twrp' ); ?>
				</h5>
				<?php self::display_query_button_text_setting( $widget_id, $query_id ); ?>
				<?php self::display_query_select_artblock( $widget_id, $query_id ); ?>

				<h5 class="twrp-widget-form__query-description-title">
					<?= _x( 'Style Settings:', 'backend', 'twrp' ); ?>
				</h5>
				<?php self::display_query_wrapper_for_artblock( $widget_id, $query_id ); ?>
			</div>
		</li>
		<?php
	}

	/**
	 * Display the form input field that will let the user choose what button text
	 * the query will have.
	 *
	 * @param int $widget_id
	 * @param int $query_id
	 * @return void
	 */
	protected static function display_query_button_text_setting( $widget_id, $query_id ) {
		$instance_options = Widget::get_instance_settings( $widget_id );
		?>
		<p>
			<?= _x( 'Tab button text:', 'backend', 'twrp' ); ?>
			<input
				type="text"
				name="<?= esc_attr( Widget::twrp_get_field_name( $widget_id, $query_id . '[' . Widget::QUERY_BUTTON_TITLE__NAME . ']' ) ); ?>"
				placeholder="<?= _x( 'Display tab title', 'backend', 'twrp' ) ?>"
				value="<?= esc_attr( $instance_options[ $query_id ][ Widget::QUERY_BUTTON_TITLE__NAME ] ); ?>"
			/>
		</p>
		<?php
	}

	/**
	 * Display a HTML select form control, which will let user choose what article
	 * block to display posts with.
	 *
	 * @param int $widget_id
	 * @param int $query_id
	 * @return void
	 */
	protected static function display_query_select_artblock( $widget_id, $query_id ) {
		$instance_options     = Widget::get_instance_settings( $widget_id );
		$artblock_id_selected = Widget::get_selected_artblock_id( $widget_id, $query_id );
		$registered_artblocks = Utils::get_all_article_block_names();

		$select_name = Widget::twrp_get_field_name( $widget_id, $query_id . '[' . Widget::ARTBLOCK_SELECTOR__NAME . ']' );
		$select_val  = $instance_options[ $query_id ][ Widget::ARTBLOCK_SELECTOR__NAME ];
		?>
		<p>
			<?= _x( 'Select a style to display:', 'backend', 'twrp' ); ?>
			<select class="twrp-widget-form__article-block-selector" name="<?= esc_attr( $select_name ); ?>" value="<?= esc_attr( $select_val ); ?>">
				<?php foreach ( $registered_artblocks as $artblock ) : ?>
					<?php
						$artblock_id  = $artblock::get_id();
						$article_name = $artblock::get_name();
					?>
					<option
						class="twrp-widget-form__article-block-select-option"
						value="<?= esc_attr( (string) $artblock_id ); ?>"
						<?= $artblock_id_selected === $artblock_id ? 'selected' : '' ?>
					>
						<?= esc_html( $article_name ); ?>
					</option>
				<?php endforeach; ?>
			</select>
		</p>
		<?php
	}

	/**
	 * Display the query wrapper for the article block settings.
	 *
	 * @param int $widget_id
	 * @param int $query_id
	 * @return void
	 */
	protected static function display_query_wrapper_for_artblock( $widget_id, $query_id ) {
		$artblock_id_selected = Widget::get_selected_artblock_id( $widget_id, $query_id );

		?>
		<div class="twrp-widget-form__article-block-settings-container">
			<?php self::display_artblock_settings( $widget_id, $query_id, $artblock_id_selected ); ?>
		</div>
		<?php
	}

	#endregion -- Functions to create each query tab setting.

	#region -- Functions to display the artblock settings.

	/**
	 * Display the artblock settings for a specific widget and query.
	 *
	 * @param int $widget_id Either the int or the whole widget Id.
	 * @param int $query_id
	 * @param string $artblock_id
	 * @return void
	 */
	public static function display_artblock_settings( $widget_id, $query_id, $artblock_id ) {
		try {
			$widget_id = Widget::twrp_get_widget_id_num( $widget_id );
		} catch ( \RuntimeException $e ) {
			return;
		}

		$current_settings  = Widget::get_instance_settings( $widget_id );
		$artblock_settings = array();
		if ( isset( $current_settings[ $query_id ] ) ) {
			$artblock_settings = $current_settings[ $query_id ];
		}

		try {
			$artblock = Article_Block::construct_class_by_name_or_id( $artblock_id, $widget_id, $query_id, $artblock_settings );
		} catch ( \RuntimeException $e ) {
			try {
				$artblock = Article_Block::construct_class_by_name_or_id( Widget::DEFAULT_SELECTED_ARTBLOCK_ID, $widget_id, $query_id, $artblock_settings );
			} catch ( \RuntimeException $e ) {
				return;
			}
		}

		$artblock->sanitize_widget_settings();

		?>
		<div class="twrp-widget-form__article-block-settings" data-twrp-selected-artblock="<?= esc_attr( (string) $artblock_id ); ?>" >
			<?php $artblock->display_form_settings(); ?>
		</div>
		<?php
	}

	#endregion -- Functions to display the artblock settings.

}
