<?php
/**
 * File that contains the class with the same name.
 */

namespace TWRP\Admin;

/**
 * Abstract class used to create the settings in "General Settings" tab.
 *
 * The "General" term used here does NOT mean as the "default" or in general, it
 * means that is primary used for the "General Settings" interface(so contrary
 * to what is to be expected), where a user could change the main settings.
 */
abstract class General_Setting_Creator {

	/**
	 * HTML class name for all settings.
	 */
	const ELEMENT_CLASS_NAME = 'twrpb-general-settings__setting-group';

	/**
	 * Holds the name of the setting. Used in HTML "name" attribute, so these
	 * must be unique across setting elements.
	 *
	 * @var string
	 */
	protected $name;

	/**
	 * Holds the current value of the setting.
	 *
	 * @var string
	 */
	protected $value;

	/**
	 * Holds the title of the setting.
	 *
	 * @var string
	 */
	protected $title;

	/**
	 * Holds the additional HTML attributes of the element. Usually used to
	 * insert additional data-* attributes into HTML to use in JavaScript.
	 *
	 * @var string
	 */
	protected $additional_attrs;

	/**
	 * Hold the additional options for a setting. Not used in all settings.
	 *
	 * @var array
	 */
	protected $options;

	/**
	 * Construct the Object that will display a setting in the General Settings
	 * tab.
	 *
	 * @param string $name The name of the input.
	 * @param string|null $value The current value of the input, null for default.
	 * @param array{title:string,options:array,default:string,additional_attrs:?array} $args
	 */
	public function __construct( $name, $value, $args ) {
		$this->name = $name;

		if ( null === $value ) {
			if ( isset( $args['default'] ) ) {
				$this->value = $args['default'];
			} else {
				$this->value = '';
			}
		} else {
			$this->value = $value;
		}

		$this->options = array();
		if ( isset( $args['options'] ) && is_array( $args['options'] ) ) {
			$this->options = $args['options'];
		}

		$this->title = '';
		if ( isset( $args['title'] ) && is_string( $args['title'] ) ) {
			$this->title = $args['title'];
		}

		$this->additional_attrs = '';
		if ( isset( $args['additional_attrs'] ) && is_array( $args['additional_attrs'] ) ) {
			$this->additional_attrs = $this->create_additional_attributes( $args['additional_attrs'] );
		}
	}

	/**
	 * Display the whole setting, with the title and the controller.
	 *
	 * @return void
	 */
	public function display() {
		?>
		<div
			id="<?= esc_attr( $this->get_setting_wrapper_attr_id() ); ?>"
			class="<?= esc_html( $this->get_main_html_element_class_name() ) ?>"
			<?= $this->additional_attrs // phpcs:ignore -- Pre-escaped. ?>
		>

			<div class="<?php $this->echo_bem_class( 'title' ); ?>">
				<?= $this->title; // phpcs:ignore -- No XSS ?>
			</div>
			<?php $this->display_internal_setting(); ?>

		</div>
		<?php
	}

	/**
	 * Display the main setting controller.
	 *
	 * @return void
	 */
	abstract protected function display_internal_setting();

	/**
	 * Get the HTML classes for the main element.
	 *
	 * @return string The returned classes are unescaped.
	 */
	protected function get_main_html_element_class_name() {
		$class_name  = '';
		$class_name .= static::ELEMENT_CLASS_NAME;

		$additional_element_class_name = $this->get_bem_class();
		if ( ! empty( $additional_element_class_name ) ) {
			$class_name .= ' ' . $additional_element_class_name;
		}

		return $class_name;
	}

	/**
	 * Echo the HTML class name for an element. The class is a bem class, with
	 * no parameters given will return the BEM block element. Add additional
	 * element/modifier class.
	 *
	 * For more info about BEM, search BEM on a search engine.
	 *
	 * @param string $bem_element The element part of the class. Optional.
	 * @param string $bem_modifier The modifier part of the class. Optional.
	 * @return void
	 */
	protected function echo_bem_class( $bem_element = '', $bem_modifier = '' ) {
		echo esc_attr( $this->get_bem_class( $bem_element, $bem_modifier ) );
	}

	/**
	 * Get a HTML class name for an element. The class is a bem class, with no
	 * parameters given will return the BEM block element. Add additional
	 * element/modifier class.
	 *
	 * For more info about BEM, search BEM on a search engine.
	 *
	 * @param string $bem_element The element part of the class. Optional.
	 * @param string $bem_modifier The modifier part of the class. Optional.
	 * @return string The HTML element class, unescaped.
	 */
	protected function get_bem_class( $bem_element = '', $bem_modifier = '' ) {
		$class = $this->get_bem_base_class();

		if ( ! empty( $bem_element ) ) {
			$class = $class . '__' . $bem_element;
		}

		if ( ! empty( $bem_modifier ) ) {
			$class = $class . '--' . $bem_modifier;
		}

		return $class;
	}

	/**
	 * Get an additional HTML element class, for this specific setting.
	 *
	 * @return string
	 */
	abstract protected function get_bem_base_class();

	/**
	 * Creates the HTML element additional attributes inserted.
	 *
	 * It will have a space before if necessary. The returned string is escaped.
	 *
	 * @param array $attrs
	 * @return string The returned string is escaped.
	 */
	protected function create_additional_attributes( $attrs ) {
		$output_string = '';

		foreach ( $attrs as $name => $value ) {
			$output_string .= ' ' . $name . '="' . esc_attr( $value ) . '"';
		}

		return $output_string;
	}

	/**
	 * Return the HTML wrapper id of a setting.
	 *
	 * @return string
	 */
	protected function get_setting_wrapper_attr_id() {
		return 'twrpb-general-select__' . $this->name . '-wrapper';
	}

	/**
	 * Return the HTML id of a setting.
	 *
	 * @param string $option_value If there are multiple id's separate them by an additional value.
	 * @return string The string is unescaped.
	 */
	protected function get_settings_attr_id( $option_value = '' ) {
		$id = 'twrpb-general-select__' . $this->name . '-setting';

		if ( '' !== $option_value ) {
			$id = $id . '-' . $option_value;
		}

		return $id;
	}
}
