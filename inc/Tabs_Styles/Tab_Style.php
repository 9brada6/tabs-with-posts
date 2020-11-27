<?php
/**
 * File that contains the class with the same name.
 */

namespace TWRP\Tabs_Styles;

use TWRP\Utils\Helper_Trait\BEM_Class_Naming_Trait;

/**
 * Each tab style must extend this class.
 *
 * A tab style is a way of the tabs buttons of how to display the tabs. A tab
 * style can have multiple variants. A variant is usually a basic css color
 * scheme change.
 */
abstract class Tab_Style {

	/**
	 * Holds the tab style Id. Every tab style must have an unique id.
	 */
	const TAB_ID = '';

	use BEM_Class_Naming_Trait;

	/**
	 * Widget Id of the tabs. Usually used in classes.
	 *
	 * @var int
	 */
	protected $widget_id;

	/**
	 * Holds the variant of the tabs.
	 *
	 * @var string
	 */
	protected $variant;

	/**
	 * Sometimes a widget can be displayed simultaneous on different parts of a
	 * page, if this is the case then this value will hold what instance this
	 * widget can be(same widget). Property used to generate an unique id per
	 * tab.
	 *
	 * If this is 1, then this is the first tab with this id generated. If is
	 * more then is 2nd, or 3rd, ... etc.
	 *
	 * @var int
	 */
	protected $additional_instance;

	/**
	 * The key is the widget id, and the value is how many number of instances
	 * for this widget id were created.
	 *
	 * @var array
	 */
	protected static $instances_num = array();

	/**
	 * Construct the class.
	 *
	 * @param int $widget_id
	 * @param string $variant Optional parameter.
	 */
	final public function __construct( $widget_id, $variant = '' ) {
		$this->widget_id = $widget_id;
		$this->variant   = $variant;

		if ( empty( self::$instances_num[ $widget_id ] ) ) {
			self::$instances_num[ $widget_id ] = 1;
			$this->additional_instance         = 1;
		} else {
			self::$instances_num[ $widget_id ]++;
			$this->additional_instance = (int) self::$instances_num[ $widget_id ];
		}

	}

	/**
	 * Get all the variants of this tab, where the array key is the id of the
	 * variant, and the value is nice name to be displayed in the admin area.
	 *
	 * @return array<string,string>
	 */
	public static function get_all_variants() {
		return array();
	}

	/**
	 * Get the name of the Tab Style. Usually used in the options when to select
	 * a style.
	 *
	 * @return string
	 */
	abstract public static function get_tab_style_name();

	/**
	 * Template function that is called first.
	 *
	 * Basically in what the HTML tags the tabs should be wrapped.
	 *
	 * @return void
	 */
	abstract public function start_tabs_wrapper();

	/**
	 * Template function that is called last.
	 *
	 * Must close the HTML tags of function start_tabs_wrapper();
	 *
	 * @return void
	 */
	abstract public function end_tabs_wrapper();

	/**
	 * Template function that is called before every tab button is displayed.
	 *
	 * Usually must wrap the buttons in a div.
	 *
	 * @return void
	 */
	abstract public function start_tab_buttons_wrapper();

	/**
	 * Template function that is called after every tab button is displayed.
	 *
	 * Usually must close the opening wrap div.
	 *
	 * @return void
	 */
	abstract public function end_tab_buttons_wrapper();

	/**
	 * Display the tab button for a specific tab.
	 *
	 * @param string $button_text
	 * @param int|string $query_id
	 * @param bool $default_tab
	 * @return void
	 */
	abstract public function tab_button( $button_text, $query_id = '', $default_tab = false );

	/**
	 * Template function that is called one time to encapsulate all the tabs
	 * into some HTML elements.
	 *
	 * @return void
	 */
	abstract public function start_all_tabs_wrapper();

	/**
	 * Template function that is called one time, after displaying all the tabs.
	 *
	 * Usually must close the HTML tags opened in start_all_tabs_wrapper()
	 *
	 * @return void
	 */
	abstract public function end_all_tabs_wrapper();

	/**
	 * Template function that is called before every tab content with its posts
	 * is displayed.
	 *
	 * @param int|string $query_id
	 * @return void
	 */
	abstract public function start_tab_content_wrapper( $query_id = '' );

	/**
	 * Template function that is called before every tab content with its posts
	 * is displayed.
	 *
	 * Usually must close the HTML tags opened in start_tab_content_wrapper()
	 *
	 * @param int|string $query_id
	 * @return void
	 */
	abstract public function end_tab_content_wrapper( $query_id = '' );

	#region -- Tabby JavaScript attributes

	protected function tabby_btns_data_attr() {
		echo 'data-twrp-tabs-btns';
	}

	protected function get_tabby_default_tab_data_attr() {
		return 'data-twrp-default-tab';
	}

	protected function tabby_btn_data_attr() {
		echo 'data-twrp-tabs-btn';
	}

	protected function tabby_tabs_content_data_attr() {
		echo 'data-twrp-tabs-content';
	}

	protected function tabby_tab_content_data_attr() {
		echo 'data-twrp-tab-content';
	}

	#endregion -- Tabby JavaScript attributes

	#region -- Tab Attribute Id Functions

	protected function tab_id( $query_id ) {
		echo esc_attr( $this->get_tab_id( $query_id ) );
	}

	protected function get_tab_id( $query_id ) {
		if ( $this->additional_instance > 1 ) {
			return "twrp-tab-{$this->widget_id}-{$query_id}-{$this->additional_instance}";
		} else {
			return "twrp-tab-{$this->widget_id}-{$query_id}";
		}
	}

	#endregion -- Tab Attribute Id Functions

	#region -- Tab Attribute Class Functions

	public function tab_class() {
		echo 'twrp-tab ';
		$this->bem_class();
	}

	public function tab_btns_class() {
		$this->bem_class( 'btns-wrapper' );
	}

	public function tab_btn_item_class() {
		$this->bem_class( 'btn-item' );
	}

	public function tab_btn_class() {
		$this->bem_class( 'btn' );
	}

	public function tab_contents_wrapper_class() {
		$this->bem_class( 'contents-wrapper' );
	}

	public function tab_content_class() {
		$this->bem_class( 'content' );
	}

	protected function get_bem_base_class() {
		return 'twrp-tab';
	}

	#endregion -- Tab Attribute Class Functions

}
