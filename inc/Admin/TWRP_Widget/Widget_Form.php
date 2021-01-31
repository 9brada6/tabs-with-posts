<?php

namespace TWRP\Admin\TWRP_Widget;

use TWRP\TWRP_Widget;
use TWRP\Article_Block\Article_Block;
use TWRP\Database\Query_Options;

use TWRP\Utils\Class_Retriever_Utils;
use TWRP\Utils\Helper_Trait\BEM_Class_Naming_Trait;
use TWRP\Utils\Widget_Utils;

use TWRP\Admin\Widget_Control\Checkbox_Control;
use TWRP\Admin\Widget_Control\Select_Control;

use RuntimeException;

/**
 * Class that manages the form to modify the settings for the widget, displayed
 * in the admin area of the website.
 */
class Widget_Form {

	use BEM_Class_Naming_Trait;

	/**
	 * Holds the widget id number. Note that by default, when WP add a widget to
	 * the settings, the Id is a string, usually __i__, and will be replaced by
	 * JavaScript in the frontend. So always there will be a generated class
	 * where "__i__" string will be passed here.
	 *
	 * @var int|string
	 */
	protected $widget_id;

	/**
	 * Holds the widget instance settings.
	 *
	 * @var array<string|int,mixed>
	 */
	protected $instance_settings;

	/**
	 * Construct this class, to display the widget form.
	 *
	 * @param int|string $widget_id The number of widget id.
	 * @param array $widget_instance_settings
	 */
	public function __construct( $widget_id, $widget_instance_settings ) {
		$this->widget_id         = $widget_id;
		$this->instance_settings = $widget_instance_settings;
	}

	/**
	 * Display the widget form.
	 *
	 * @return void
	 */
	public function display_form() {
		$queries = Query_Options::get_all_queries();
		?>
		<div class="<?php $this->bem_class(); ?>" data-twrpb-widget-id=<?= esc_attr( (string) $this->widget_id ); ?> >
			<?php
			if ( empty( $queries ) ) {
				$this->display_no_queries_exist();
			} else {
				$this->display_tab_style_options();
				$this->display_artblock_sync_settings();
				$this->display_select_query_options();
				$this->display_queries_settings();
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
	protected function display_no_queries_exist() {
		$allowed_tags = array(
			'br' => array(),
			'b'  => array(),
		);

		?>
		<p class="<?php $this->bem_class( 'select-queries-exist' ); ?>">
			<?=
				wp_kses(
					/* translators: The <b>, </b>, and <br /> tag is a HTML tag and is good to remain there(only these tags are allowed). */
					_x( 'No queries created. You need to select from right menu: <br /><b> "Settings" -> "Tabs With Recommended Posts" (Submenu).</b><br /> Then navigate to: <br /><b> "Post Queries" (Tab) -> "Add Query".</b>', 'backend', 'twrp' ),
					$allowed_tags
				);
			?>
		</p>
		<?php
	}

	/**
	 * Display a selector and an add button to add queries to be displayed.
	 *
	 * @return void
	 */
	protected function display_select_query_options() {
		$queries     = Query_Options::get_all_queries();
		$queries_ids = array_keys( $queries );
		?>
		<p class="<?php $this->bem_class( 'select-query-wrapper' ); ?>">
			<span class="<?php $this->bem_class( 'select-query-to-add-text' ); ?>">
				<?= _x( 'Select a query(tab) to add:', 'backend', 'twrp' ); ?>
			</span>

			<select class="<?php $this->bem_class( 'select-query-to-add' ); ?>">
				<?php foreach ( $queries_ids as $query_id ) : ?>
					<option value="<?= esc_attr( (string) $query_id ) ?>">
						<?= esc_html( Query_Options::get_query_display_name( $query_id ) ); ?>
					</option>
				<?php endforeach; ?>
			</select>

			<button class="<?php $this->bem_class( 'select-query-to-add-btn' ); ?> twrpb-button" type="button">
				<?= _x( 'Add', 'backend', 'twrp' ); ?>
			</button>
		</p>
		<?php
	}

	/**
	 * Display if the query settings should be synced, or simplified.
	 *
	 * @return void
	 */
	protected function display_artblock_sync_settings() {
		$option_name  = Widget_Utils::get_field_name( $this->widget_id, TWRP_Widget::SYNC_QUERY_SETTINGS__NAME );
		$option_value = '1';
		if ( array_key_exists( TWRP_Widget::SYNC_QUERY_SETTINGS__NAME, $this->instance_settings ) && '1' !== $this->instance_settings[ TWRP_Widget::SYNC_QUERY_SETTINGS__NAME ] ) {
			$option_value = '';
		}

		$id = Widget_Utils::get_field_id( $this->widget_id, 'js-sync-query' );

		Checkbox_Control::display_setting( $id, $option_name, $option_value, self::get_query_sync_control_args() );
	}

	/**
	 * Display the options for selecting the tab style and the variant.
	 *
	 * @return void
	 */
	protected function display_tab_style_options() {
		$id          = Widget_Utils::get_field_id( $this->widget_id, TWRP_Widget::TAB_STYLE_AND_VARIANT__NAME );
		$select_name = Widget_Utils::get_field_name( $this->widget_id, TWRP_Widget::TAB_STYLE_AND_VARIANT__NAME );

		$current_option_value = '';
		if ( isset( $this->instance_settings[ TWRP_Widget::TAB_STYLE_AND_VARIANT__NAME ] ) ) {
			$current_option_value = $this->instance_settings[ TWRP_Widget::TAB_STYLE_AND_VARIANT__NAME ];
		}

		Select_Control::display_setting( $id, $select_name, $current_option_value, self::get_tab_style_control_args() );
	}

	/**
	 * Display all settings for each query separated into each tab.
	 *
	 * @return void
	 */
	protected function display_queries_settings() {
		$selected_queries_list = '';
		if ( isset( $this->instance_settings['queries'] ) ) {
			$selected_queries_list = $this->instance_settings['queries'];
		}
		$selected_queries_ids = Widget_Utils::pluck_valid_query_ids( $this->instance_settings );

		$queries_field_id   = Widget_Utils::get_field_id( $this->widget_id, 'queries' );
		$queries_field_name = Widget_Utils::get_field_name( $this->widget_id, 'queries' );
		?>
		<ul class="<?php $this->bem_class( 'selected-queries-list' ); ?>">
			<?php
			foreach ( $selected_queries_ids as $query_id ) :
				$this->display_query_settings( (int) $query_id );
			endforeach;
			?>
		</ul>

		<input
			id="<?= esc_attr( $queries_field_id ); ?>"
			class="<?php $this->bem_class( 'selected-queries' ); ?>"
			name="<?= esc_attr( $queries_field_name ); ?>"
			<?php // todo: change text with hidden. ?>
			type="text"
			value="<?= esc_attr( $selected_queries_list ); ?>"
		/>
		<?php
	}

	#region -- Display the settings per each tab.

	/**
	 * Display the settings of a specified query, including the article block
	 * selected.
	 *
	 * @param int $query_id
	 * @return void
	 */
	public function display_query_settings( $query_id ) {
		$delete_button_text       = _x( 'Delete', 'backend', 'twrp' );
		$delete_button_aria_label = _x( 'Delete this tab', 'backend', 'twrp' );
		?>
		<li class="<?php $this->bem_class( 'selected-query' ); ?>" data-twrpb-query-id="<?= esc_attr( (string) $query_id ); ?>">
			<h4 class="<?php $this->bem_class( 'selected-query-title' ); ?>">
				<span class="<?php $this->bem_class( 'accordion-indicator' ); ?>"></span>
				<?= esc_attr( Query_Options::get_query_display_name( $query_id ) ); ?>
				<button class="<?php $this->bem_class( 'remove-selected-query' ); ?> twrpb-button twrpb-button--small twrpb-button--delete" type="button" aria-label="<?= esc_attr( $delete_button_aria_label ); ?>"><?= esc_html( $delete_button_text ) ?></button>
			</h4>

			<div class="<?php $this->bem_class( 'selected-query-settings' ); ?>">
				<h5 class="<?php $this->bem_class( 'query-description-title' ); ?>">
					<?= _x( 'Tab Settings:', 'backend', 'twrp' ); ?>
				</h5>
				<?php $this->display_tab_button_text_setting( $query_id ); ?>
				<?php $this->display_tab_query_select_artblock( $query_id ); ?>

				<h5 class="<?php $this->bem_class( 'query-description-title' ); ?>">
					<?= _x( 'Style Settings and Custom CSS Variables:', 'backend', 'twrp' ); ?>
				</h5>
				<hr class="<?php $this->bem_class( 'style-separator' ); ?>">
				<div class="<?php $this->bem_class( 'article-block-settings-container' ); ?>">
					<?php $this->display_artblock_settings( $query_id ); ?>
				</div>
			</div>
		</li>
		<?php
	}

	/**
	 * Display the form input field that will let the user choose what button text
	 * the query will have.
	 *
	 * @param int $query_id
	 * @return void
	 */
	protected function display_tab_button_text_setting( $query_id ) {
		// Phan will complain about being an int.
		$query_id         = (string) $query_id;
		$setting_key_name = TWRP_Widget::QUERY_BUTTON_TITLE__NAME;

		$name = Widget_Utils::get_field_name( $this->widget_id, $query_id, $setting_key_name );

		$value = '';
		if ( isset( $this->instance_settings[ $query_id ][ $setting_key_name ] ) ) {
			$value = $this->instance_settings[ $query_id ][ $setting_key_name ];
		}

		?>
		<p class="<?php $this->bem_class( 'tab-button-text-wrapper' ); ?>">
			<?= esc_html( _x( 'Tab button text:', 'backend', 'twrp' ) ); ?>
			<input
				type="text"
				class="<?php $this->bem_class( 'tab-button-text' ); ?>"
				name="<?= esc_attr( $name ); ?>"
				placeholder="<?= esc_attr( _x( 'Display tab title', 'backend', 'twrp' ) ); ?>"
				value="<?= esc_attr( $value ); ?>"
			/>
		</p>
		<?php
	}

	/**
	 * Display a HTML select form control, which will let user choose what
	 * article block to display posts with.
	 *
	 * @param int $query_id
	 * @return void
	 */
	protected function display_tab_query_select_artblock( $query_id ) {
		$registered_artblocks = Class_Retriever_Utils::get_all_article_block_names();

		$selected_value = Widget_Utils::pluck_artblock_id( $this->instance_settings, $query_id );
		if ( empty( $selected_value ) ) {
			$selected_value = TWRP_Widget::DEFAULT_SELECTED_ARTBLOCK_ID;
		}

		$select_name = Widget_Utils::get_field_name( $this->widget_id, $query_id, TWRP_Widget::ARTBLOCK_SELECTOR__NAME );
		?>
		<p class="<?php $this->bem_class( 'article-block-selector-wrapper' ); ?>">
			<?= _x( 'Select a style to display:', 'backend', 'twrp' ); ?>
			<select class="<?php $this->bem_class( 'article-block-selector' ); ?>" name="<?= esc_attr( $select_name ); ?>">
				<?php foreach ( $registered_artblocks as $artblock ) : ?>
					<option
						class="<?php $this->bem_class( 'article-block-select-option' ); ?>"
						value="<?= esc_attr( $artblock::get_id() ); ?>"
						<?= $selected_value === $artblock::get_id() ? 'selected' : '' ?>
					>
						<?= esc_html( $artblock::get_name() ); ?>
					</option>
				<?php endforeach; ?>
			</select>
		</p>
		<?php
	}

	#endregion -- Display the settings per each tab.

	#region -- Functions to display the artblock settings.

	/**
	 * Display the artblock settings for a specific widget and query. Can
	 * optionally display another artblock settings.
	 *
	 * @param int $query_id
	 * @param string $artblock_id Optionally, pass another artblock id here to
	 * display the settings for another artblock. This is used in AJAX requests
	 * to display dynamic settings.
	 * @return void
	 */
	public function display_artblock_settings( $query_id, $artblock_id = '' ) {
		if ( empty( $artblock_id ) ) {
			$artblock_id = Widget_Utils::pluck_artblock_id( $this->instance_settings, $query_id );
		}

		$artblock_settings = array();
		if ( isset( $this->instance_settings[ $query_id ] ) ) {
			$artblock_settings = $this->instance_settings[ $query_id ];
		}

		// The widget id used here should already be an int. The __i__ value is
		// used only initially when generating the first widget settings.
		try {
			$artblock = Article_Block::construct_class_by_name_or_id( $artblock_id, $this->widget_id, $query_id, $artblock_settings );
		} catch ( RuntimeException $e ) {
			try {
				$artblock_id = TWRP_Widget::DEFAULT_SELECTED_ARTBLOCK_ID;
				$artblock    = Article_Block::construct_class_by_name_or_id( $artblock_id, $this->widget_id, $query_id, $artblock_settings );
			} catch ( RuntimeException $e ) {
				return;
			}
		}
		$artblock->sanitize_widget_settings();

		?>
		<div class="twrpb-widget-form__article-block-settings" data-twrpb-selected-artblock="<?= esc_attr( (string) $artblock_id ); ?>" >
			<?php $artblock->display_form_settings(); ?>
		</div>
		<?php
	}

	#endregion -- Functions to display the artblock settings.

	#endregion -- Display the settings per each tab.

	/**
	 * Get the arguments to display the query sync option.
	 *
	 * @return array
	 */
	public static function get_query_sync_control_args() {
		return array(
			'after'   => _x( 'Make all the tabs look the same.', 'backend', 'twrp' ),
			'value'   => '1',
			'default' => '1',
		);
	}

	/**
	 * Get the arguments to display the option to select the tab style.
	 *
	 * @return array
	 */
	public static function get_tab_style_control_args() {
		$options = self::get_all_tab_styles_options();

		// Get the first key.
		reset( $options );
		$first_key = key( $options );
		if ( null === $first_key ) {
			$first_key = '';
		}

		return array(
			'options' => self::get_all_tab_styles_options(),
			'before'  => _x( 'Select the style of the tab buttons:', 'backend', 'twrp' ),
			'default' => $first_key,
		);
	}

	/**
	 * Get an array with all the tab styles and variants, where the array key is
	 * the tab variant id, and the array value is the description of the style
	 * and the variant.
	 *
	 * @return array<string,string>
	 */
	public static function get_all_tab_styles_options() {
		$all_style_class_names = Class_Retriever_Utils::get_all_tab_style_class_names();
		$options               = array();

		foreach ( $all_style_class_names as $tab_style_class_name ) {
			$tab_style_id   = $tab_style_class_name::TAB_ID;
			$style_variants = $tab_style_class_name::get_all_variants();

			$options[ $tab_style_id ] = $tab_style_class_name::get_tab_style_name();

			foreach ( $style_variants as $style_variant => $style_variant_name ) {
				$options[ $tab_style_id . '___' . $style_variant ] = $tab_style_class_name::get_tab_style_name() . ' - ' . $style_variant_name;
			}
		}

		return $options;
	}

	#region -- Bem CSS classes.

	/**
	 * Get the block element CSS class name. See the trait for more info.
	 *
	 * @return string
	 */
	protected function get_bem_base_class() {
		return 'twrpb-widget-form';
	}

	#endregion -- Bem CSS classes.

}
