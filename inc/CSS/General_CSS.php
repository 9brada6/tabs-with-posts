<?php
/**
 * File that contains the class with the same name.
 */

namespace TWRP\CSS;

use TWRP\Database\General_Options;

use TWRP\Utils\Color_Utils;
use TWRP\Utils\Helper_Trait\After_Setup_Theme_Init_Trait;

/**
 * Class used to enqueue and generate the inline CSS.
 */
class Generate_CSS {

	use After_Setup_Theme_Init_Trait;

	/**
	 * Include the styles. See After_Setup_Theme_Init_Trait for more details.
	 *
	 * @return void
	 */
	public static function after_setup_theme_init() {
		add_action( 'wp_head', array( __CLASS__, 'generate_color_variables_inline_style' ) );
	}

	/**
	 * Generate the inline twrp color variables.
	 *
	 * @return void
	 */
	public static function generate_color_variables_inline_style() {
		$background_color = General_Options::get_option( General_Options::BACKGROUND_COLOR );
		if ( ! is_string( $background_color ) || ! Color_Utils::is_color( $background_color ) || '' === $background_color ) {
			$background_color = 'inherit';
		}

		$secondary_background_color = General_Options::get_option( General_Options::SECONDARY_BACKGROUND_COLOR );
		if ( ! is_string( $secondary_background_color ) || ! Color_Utils::is_color( $secondary_background_color ) || '' === $secondary_background_color ) {
			$secondary_background_color = 'inherit';
		}

		$text_color = General_Options::get_option( General_Options::TEXT_COLOR );
		if ( ! is_string( $text_color ) || ! Color_Utils::is_color( $text_color ) || '' === $text_color ) {
			$text_color = 'inherit';
		}

		$secondary_text_color = General_Options::get_option( General_Options::SECONDARY_TEXT_COLOR );
		if ( ! is_string( $secondary_text_color ) || ! Color_Utils::is_color( $secondary_text_color ) || '' === $secondary_text_color ) {
			$secondary_text_color = 'inherit';
		}

		$accent_color = General_Options::get_option( General_Options::ACCENT_COLOR );
		if ( ! is_string( $accent_color ) || ! Color_Utils::is_color( $accent_color ) || '' === $accent_color ) {
			$accent_color = 'inherit';
		}

		$secondary_accent_color = General_Options::get_option( General_Options::SECONDARY_ACCENT_COLOR );
		if ( ! is_string( $secondary_accent_color ) || ! Color_Utils::is_color( $secondary_accent_color ) || '' === $secondary_accent_color ) {
			$secondary_accent_color = 'inherit';
		}

		$outline_accent_color = Color_Utils::set_opacity( $accent_color, 0.5 );
		if ( ! is_string( $outline_accent_color ) ) {
			$outline_accent_color = $accent_color;
		}

		$best_accent_text_color = 'rgba(256, 256, 256, 1)';
		if ( 0 === Color_Utils::white_or_black_text( $accent_color ) ) {
			$best_accent_text_color = 'rgba(0, 0, 0, 1)';
		}

		$best_secondary_accent_text_color = 'rgba(256, 256, 256, 1)';
		if ( 0 === Color_Utils::white_or_black_text( $secondary_accent_color ) ) {
			$best_secondary_accent_text_color = 'rgba(0, 0, 0, 1)';
		}

		echo '<style type="text/css">:root{' .
			'--twrp-background-color: ' . esc_html( $background_color ) . ';' .
			'--twrp-secondary-background-color: ' . esc_html( $secondary_background_color ) . ';' .

			'--twrp-text-color: ' . esc_html( $text_color ) . ';' .
			'--twrp-secondary-text-color: ' . esc_html( $secondary_text_color ) . ';' .

			'--twrp-accent-color: ' . esc_html( $accent_color ) . ';' .
			'--twrp-secondary-accent-color: ' . esc_html( $secondary_accent_color ) . ';' .

			'--twrp-outline-accent-color: ' . esc_html( $outline_accent_color ) . ';' .

			'--twrp-accent-best-text-color: ' . esc_html( $best_accent_text_color ) . ';' .
			'--twrp-secondary-accent-best-text-color: ' . esc_html( $best_secondary_accent_text_color ) . ';' .
		'}</style>';
	}
}
