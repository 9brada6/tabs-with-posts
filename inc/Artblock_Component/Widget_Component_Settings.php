<?php

namespace TWRP\Artblock_Component;

use TWRP\Utils;
use TWRP\Artblock_Component\Component_Setting;

/**
 * Class that represents an artblock component and its settings.
 */
class Widget_Component_Settings {

	const COMPONENTS_NAMESPACE_PREFIX = 'TWRP\\Artblock_Component\\';

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

	protected $name;

	protected $component_title;

	protected $css_selector;

	protected $widget_id;

	protected $query_id;

	protected $settings;

	protected $css_settings;

	/**
	 * Variable that holds the component settings classes needed.
	 *
	 * @var array|null
	 */
	protected $setting_classes = null;

	public function __construct( $widget_id, $query_id, $name, $component_title, $settings, $css_settings ) {
		$this->name            = $name;
		$this->component_title = $component_title;
		$this->widget_id       = $widget_id;
		$this->query_id        = $query_id;
		$this->settings        = $settings;
		$this->css_settings    = $css_settings;
	}

	/**
	 * Get the widget component setting classes used in this component.
	 *
	 * @return array<Component_Setting>
	 */
	protected function get_classes() {
		if ( is_array( $this->setting_classes ) ) {
			return $this->setting_classes;
		}

		$setting_classes = self::get_component_classes( $this->css_settings );

		$this->setting_classes = $setting_classes;
		return $setting_classes;
	}

	public function get_component_name() {
		return $this->name;
	}

	public function get_component_title() {
		return $this->component_title;
	}

	public function display_component_settings() {
		$component_setting_classes = $this->get_classes();

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

	protected function get_component_prefix_name() {
		return Utils::get_twrp_widget_name( $this->widget_id, $this->query_id, $this->name );
	}

	protected function get_component_prefix_id() {
		return Utils::get_twrp_widget_id( $this->widget_id, $this->query_id, $this->name );
	}

	#region -- Sanitization

	/**
	 * Sanitize the internal settings, and returns them.
	 *
	 * @return array
	 */
	public function sanitize_settings() {
		$component_setting_classes = $this->get_classes();
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

	public static function get_component_classes( $component_setting_classes ) {
		$classes_names   = Utils::flatten_array( $component_setting_classes );
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
