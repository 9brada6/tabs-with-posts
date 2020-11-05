<?php

namespace TWRP\Utils\Helper_Trait;

trait BEM_Class_Naming_Trait {

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
	protected function bem_class( $bem_element = '', $bem_modifier = '' ) {
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
}
