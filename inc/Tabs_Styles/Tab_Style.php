<?php
/**
 * File that contains the class with the same name.
 */

namespace TWRP\Tabs_Styles;

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
	 * Construct the class.
	 *
	 * @param int $widget_id
	 * @param string $variant Optional parameter.
	 */
	final public function __construct( $widget_id, $variant = '' ) {
		$this->widget_id = $widget_id;
		$this->variant   = $variant;
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
	 * @return void
	 */
	abstract public function tab_button( $button_text, $query_id = '' );

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
}
