<?php
/**
 *
 * @todo: add a constant for all settings with default values.
 * @todo: add constant for setting names.
 */

namespace TWRP\Article_Block;

use TWRP\Artblock_Component\Widget_Component_Settings;
use TWRP\Utils;
use TWRP\Widget_Control\Checkbox_Control;

class Simple_Article_Block implements Article_Block {

	const AUTHOR_ATTR           = 'author';
	const DATE_ATTR             = 'date';
	const TITLE_FONT_SIZE_ATTR  = 'font-size';
	const AUTHOR_FONT_SIZE_ATTR = 'author-font-size';

	/**
	 * Holds the widget id of these article blocks.
	 *
	 * @var int
	 */
	protected $widget_id;

	/**
	 * Holds the query id of these article blocks.
	 *
	 * @var int
	 */
	protected $query_id;

	/**
	 * Holds the query settings.
	 *
	 * @var array
	 */
	protected $settings;

	/**
	 * Get the Id of the article block.
	 *
	 * This should be unique across all article blocks.
	 *
	 * @return string
	 */
	public static function get_id() {
		return 'simple_style';
	}

	/**
	 * Get the name of the Article Block. The name should have spaces instead
	 * of "_" and should be something representative.
	 *
	 * @return string
	 */
	public static function get_name() {
		return 'Simple Style';
	}

	/**
	 * Called before anything else, to initialize all others plugin adapter
	 * classes.
	 *
	 * Always called at 'after_setup_theme' action. Other things added here should be
	 * additionally checked, for example by admin hooks, or whether or not to be
	 * included in special pages, ...etc.
	 *
	 * @return void
	 */
	public static function init() {
		// Do nothing for now.
	}

	/**
	 * Construct the Article Block class.
	 *
	 * @param int $widget_id
	 * @param int $query_id
	 * @param array $settings
	 */
	public function __construct( $widget_id, $query_id, $settings ) {
		$this->widget_id = $widget_id;
		$this->query_id  = $query_id;
		$this->settings  = $settings;
	}

	/**
	 * Include the template that should be displayed in the frontend.
	 *
	 * @param array $settings The article block settings, included in the
	 * function closure to be available in the template.
	 * @return void
	 */
	public function include_template( $settings ) {
		?>
		<div class="<?= esc_attr( $this->get_block_class_wrapper() ); ?>">
			<?php include \TWRP_Main::get_templates_directory() . 'simple-style.php'; ?>
		</div>
		<?php
	}

	/**
	 * Get the components that can be edited for this artblock.
	 *
	 * @return array<Widget_Component_Settings>
	 */
	public function get_components() {
		$components = array();

		// Title Component
		$title_component_settings = ( isset( $this->settings['title'] ) && is_array( $this->settings['title'] ) ) ? $this->settings['title'] : array();
		$title_component          = new Widget_Component_Settings(
			$this->widget_id,
			$this->query_id,
			'title',
			_x( 'Title', 'backend', 'twrp' ),
			$title_component_settings,
			array(
				'.twrp-ss__title'                      => Widget_Component_Settings::TEXT_SETTINGS,
				'.twrp-ss__link:hover .twrp-ss__title' => array( Widget_Component_Settings::HOVER_COLOR_SETTING ),
			)
		);
		$components ['title']     = $title_component;

		// Date Component
		$date_component_settings = ( isset( $this->settings['date'] ) && is_array( $this->settings['date'] ) ) ? $this->settings['date'] : array();
		$date_component          = new Widget_Component_Settings(
			$this->widget_id,
			$this->query_id,
			'date',
			_x( 'Date', 'backend', 'twrp' ),
			$date_component_settings,
			array(
				'.twrp-ss__date'                        => Widget_Component_Settings::TEXT_SETTINGS,
				'.twrp-ss__link:hover + .twrp-ss__date' => array( Widget_Component_Settings::HOVER_COLOR_SETTING ),
			)
		);
		$components ['date']     = $date_component;

		// Author Component
		$author_component_settings = ( isset( $this->settings['author'] ) && is_array( $this->settings['author'] ) ) ? $this->settings['author'] : array();
		$author_component          = new Widget_Component_Settings(
			$this->widget_id,
			$this->query_id,
			'author',
			_x( 'Author', 'backend', 'twrp' ),
			$author_component_settings,
			array(
				'.twrp-ss__author'                        => Widget_Component_Settings::TEXT_SETTINGS,
				'.twrp-ss__link:hover + .twrp-ss__author' => array( Widget_Component_Settings::HOVER_COLOR_SETTING ),
			)
		);
		$components ['author']     = $author_component;

		return $components;
	}

	/**
	 * Display the article block settings in the Widgets::form().
	 *
	 * @return void
	 */
	public function display_form_settings() {
		// Display Author Setting
		$id              = Utils::get_twrp_widget_id( $this->widget_id, $this->query_id, 'display_author' );
		$name            = Utils::get_twrp_widget_name( $this->widget_id, $this->query_id, 'display_author' );
		$current_setting = ( isset( $this->settings['display_author'] ) && is_string( $this->settings['display_author'] ) ) ? $this->settings['display_author'] : null;
		Checkbox_Control::display_setting( $id, $name, $current_setting, $this->get_display_author_setting_args() ); // @phan-suppress-current-line PhanPartialTypeMismatchArgument

		// Display Date Setting
		$id              = Utils::get_twrp_widget_id( $this->widget_id, $this->query_id, 'display_date' );
		$name            = Utils::get_twrp_widget_name( $this->widget_id, $this->query_id, 'display_date' );
		$current_setting = ( isset( $this->settings['display_date'] ) && is_string( $this->settings['display_date'] ) ) ? $this->settings['display_date'] : null;
		Checkbox_Control::display_setting( $id, $name, $current_setting, $this->get_display_date_setting_args() ); // @phan-suppress-current-line PhanPartialTypeMismatchArgument

		// Display Date in readable format Setting
		$id              = Utils::get_twrp_widget_id( $this->widget_id, $this->query_id, 'human_readable_date' );
		$name            = Utils::get_twrp_widget_name( $this->widget_id, $this->query_id, 'human_readable_date' );
		$current_setting = ( isset( $this->settings['human_readable_date'] ) && is_string( $this->settings['human_readable_date'] ) ) ? $this->settings['human_readable_date'] : null;
		Checkbox_Control::display_setting( $id, $name, $current_setting, $this->get_human_readable_setting_args() ); // @phan-suppress-current-line PhanPartialTypeMismatchArgument

		// Display the components settings.
		$components = $this->get_components();
		Widget_Component_Settings::display_components( $components );
	}

	/**
	 * Sanitize the widget settings of this specific article block. Also replace
	 * the internal settings with sanitized ones by default.
	 *
	 * @param bool $set_internal Whether or not to also sanitize internal settings.
	 * @return array The new array of settings.
	 */
	public function sanitize_widget_settings( $set_internal = true ) {
		$components         = $this->get_components();
		$sanitized_settings = array();

		foreach ( $components as $component ) {
			$component_name = $component->get_component_name();
			if ( isset( $this->settings[ $component_name ] ) ) {
				$sanitized_settings[ $component_name ] = $component->sanitize_settings();
			} else {
				$sanitized_settings[ $component_name ] = $component->sanitize_settings();
			}
		}

		$settings = $this->settings;

		$author_setting_to_sanitize           = isset( $settings['display_author'] ) ? $settings['display_author'] : null;
		$sanitized_settings['display_author'] = Checkbox_Control::sanitize_setting( $author_setting_to_sanitize, $this->get_display_author_setting_args() );

		$author_setting_to_sanitize         = isset( $settings['display_date'] ) ? $settings['display_date'] : null;
		$sanitized_settings['display_date'] = Checkbox_Control::sanitize_setting( $author_setting_to_sanitize, $this->get_display_date_setting_args() );

		$author_setting_to_sanitize                = isset( $settings['human_readable_date'] ) ? $settings['human_readable_date'] : null;
		$sanitized_settings['human_readable_date'] = Checkbox_Control::sanitize_setting( $author_setting_to_sanitize, $this->get_human_readable_setting_args() );

		if ( $set_internal ) {
			$this->settings = $sanitized_settings;
		}

		return $sanitized_settings;
	}

	#region -- Settings defaults

	public function get_display_author_setting_args() {
		return array(
			'default' => '1',
			'value'   => '1',
			'before'  => _x( 'Display the author', 'backend', 'twrp' ),
		);
	}

	public function get_display_date_setting_args() {
		return array(
			'default' => '1',
			'value'   => '1',
			'before'  => _x( 'Display the date', 'backend', 'twrp' ),
		);
	}

	public function get_human_readable_setting_args() {
		return array(
			'default' => '1',
			'value'   => '1',
			'before'  => _x( 'Date in relative format(Ex: 3 days ago)', 'backend', 'twrp' ),
		);
	}

	protected function get_block_class_wrapper() {
		return 'twrp-block__' . $this->widget_id . '-' . $this->query_id;
	}

	/**
	 * Create and return the css of the component.
	 *
	 * @return string
	 */
	public function get_css() {
		$components = $this->get_components();

		$css = '';
		foreach ( $components as $component ) {
			$css .= $component->get_css();
		}

		return $css;
	}

	#endregion -- Settings defaults
}
