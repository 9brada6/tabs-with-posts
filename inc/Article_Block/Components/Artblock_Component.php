<?php
/**
 * File that contains the class with the same name.
 */

namespace TWRP\Article_Block\Component;

use TWRP\Utils\Widget_Utils;
use TWRP\Article_Block\Component\Component_Setting;
use TWRP\Utils\Simple_Utils;

/**
 * Class that represents an artblock component and its settings. A component is
 * an abstract thing that is used to style a part of an artblock independently
 * from other parts.
 *
 * For example we can have a "Title" component, which will style just the title
 * (font-color, font-size).. etc. and other components for meta like "Author",
 * "Views", "Post Thumbnail"... etc.
 */
class Artblock_Component {

	const COMPONENTS_NAMESPACE_PREFIX = 'TWRP\\Article_Block\\Component\\';

	const FONT_SIZE_SETTING   = 'Font_Size_Setting';
	const LINE_HEIGHT_SETTING = 'Line_Height_Setting';
	const FONT_WEIGHT_SETTING = 'Font_Weight_Setting';
	const COLOR_SETTING       = 'Color_Setting';

	const TEXT_SETTINGS = array(
		self::FONT_SIZE_SETTING,
		self::LINE_HEIGHT_SETTING,
		self::FONT_WEIGHT_SETTING,
		self::COLOR_SETTING,
	);

	const HOVER_COLOR_SETTING = 'Hover_Color_Setting';

	const AUTHOR_ICON_SETTING = 'Author_Icon_Setting';

	const DATE_ICON_SETTING = 'Date_Icon_Setting';

	const CATEGORY_ICON_SETTING = 'Category_Icon_Setting';

	/**
	 * The name of the component. It should be as something unique, will appear
	 * when creating the names in HTML attribute.
	 *
	 * @var string
	 */
	protected $name;

	/**
	 * The title of the component. Will appear as a tab title in the widget
	 * settings.
	 *
	 * @var string
	 */
	protected $component_title;

	/**
	 * The widget id this component belongs.
	 *
	 * @var int
	 */
	protected $widget_id;

	/**
	 * The query id this component belongs.
	 *
	 * @var int
	 */
	protected $query_id;

	/**
	 * The current settings of the component.
	 *
	 * @var array
	 */
	protected $settings;

	/**
	 * A selector as the array key, and a component setting as the value. The
	 * value will apply to the selector.
	 *
	 * @var array
	 */
	protected $css_settings;

	/**
	 * Variable that holds all the component settings classes needed.
	 *
	 * @var array
	 */
	protected $setting_classes;

	/**
	 * Creates the class.
	 *
	 * @param int $widget_id
	 * @param int $query_id
	 * @param string $name The name must be unique between other components.
	 * @param string $component_title
	 * @param array $settings
	 * @param array $css_settings
	 */
	public function __construct( $widget_id, $query_id, $name, $component_title, $settings, $css_settings ) {
		$this->name            = $name;
		$this->component_title = $component_title;
		$this->widget_id       = $widget_id;
		$this->query_id        = $query_id;
		$this->settings        = $settings;
		$this->css_settings    = $css_settings;

		$this->setting_classes = $this->get_component_classes( $this->css_settings );
	}

	/**
	 * Get the component name.
	 *
	 * @return string
	 */
	public function get_component_name() {
		return $this->name;
	}

	/**
	 * Get the component title.
	 *
	 * @return string
	 */
	public function get_component_title() {
		return $this->component_title;
	}

	/**
	 * Display the component setting controls, in the widget settings manager.
	 *
	 * @return void
	 */
	public function display_component_settings() {
		$component_setting_classes = $this->setting_classes;

		$prefix_name = $this->get_component_prefix_name();
		$prefix_id   = $this->get_component_prefix_id();

		foreach ( $component_setting_classes as $component_class ) {
			$value = null;
			if ( isset( $this->settings[ $component_class::get_key_name() ] ) ) {
				$value = $this->settings[ $component_class::get_key_name() ];
			}

			$component_class::display_setting( $prefix_id, $prefix_name, $value );
		}
	}

	/**
	 * Get the component prefix name for a setting.
	 *
	 * @return string
	 */
	protected function get_component_prefix_name() {
		return Widget_Utils::get_field_name( $this->widget_id, $this->query_id, $this->name );
	}

	/**
	 * Get the component prefix id of a setting.
	 *
	 * @return string
	 */
	protected function get_component_prefix_id() {
		return Widget_Utils::get_field_id( $this->widget_id, $this->query_id, $this->name );
	}

	#region -- Sanitization

	/**
	 * Sanitize the internal state settings, and returns them.
	 *
	 * @return array
	 */
	public function sanitize_settings() {
		$component_setting_classes = $this->setting_classes;
		$settings                  = $this->settings;

		$sanitized_settings = array();
		foreach ( $component_setting_classes as $setting_class ) {
			$setting_key = $setting_class::get_key_name();

			if ( isset( $settings[ $setting_key ] ) ) {
				$sanitized_settings[ $setting_key ] = $setting_class::sanitize_setting( $settings[ $setting_key ] );
			} else {
				$sanitized_settings[ $setting_key ] = $setting_class::sanitize_setting( null );
			}
		}

		$this->settings = $sanitized_settings;
		return $sanitized_settings;
	}

	#endregion -- Sanitization

	/**
	 * Returns an array with all the setting classes objects.
	 *
	 * @param array $component_setting_classes Can be a multidimensional array.
	 * @return array<Component_Setting>
	 */
	public function get_component_classes( $component_setting_classes ) {
		$classes_names   = Simple_Utils::flatten_array( $component_setting_classes );
		$setting_classes = array();

		foreach ( $classes_names as $component_setting_class_name ) {
			$component_setting_class_name = self::COMPONENTS_NAMESPACE_PREFIX . $component_setting_class_name;

			if ( ! class_exists( $component_setting_class_name ) ) {
				continue;
			}

			$component_setting_class = new $component_setting_class_name();

			if ( $component_setting_class instanceof Component_Setting ) {
				array_push( $setting_classes, $component_setting_class );
			}
		}

		return $setting_classes;
	}

	/**
	 * Display the components settings in the widget.
	 *
	 * @param array<Artblock_Component> $components
	 * @return void
	 */
	public static function display_components( $components ) {
		?>
		<div class="twrp-widget-components">
			<ul class="twrp-widget-components__tab-buttons">
				<?php foreach ( $components as $component ) : ?>
					<li class="twrp-widget-components__btn-wrapper">
						<a class="twrp-widget-components__btn" href="<?= esc_attr( '#' . $component->get_html_id_attr() ); ?>">
						<?= esc_html( $component->get_component_title() ); ?>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
			<div class="twrp-widget-components__components">
				<?php foreach ( $components as $component ) : ?>
					<div id="<?= esc_attr( $component->get_html_id_attr() ); ?>" class="twrp-widget-components__component-wrapper">
						<?php $component->display_component_settings(); ?>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
		<?php
	}

	/**
	 * Create and return the id for an input of the component.
	 *
	 * @return string
	 */
	public function get_html_id_attr() {
		return 'twrp-widget-components__' . $this->widget_id . '-' . $this->query_id . '-' . $this->name;
	}

	/**
	 * Create the CSS of the component and return it.
	 *
	 * @return string
	 */
	public function get_css() {
		$css = '';

		foreach ( $this->css_settings as $selector => $css_component ) {
			if ( ! is_array( $css_component ) ) {
				continue;
			}

			$components = $this->get_component_classes( $css_component );

			$component_css = '';
			foreach ( $components as $component ) {
				if ( isset( $this->settings[ $component::get_key_name() ] ) ) {
					$value          = $this->settings[ $component::get_key_name() ];
					$component_css .= $component->get_css( $value );
				}
			}

			if ( ! empty( $component_css ) ) {
				$css .= $selector . '{' . $component_css . '}';
			}
		}

		return $css;
	}

}
