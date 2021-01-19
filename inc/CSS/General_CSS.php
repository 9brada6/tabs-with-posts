<?php
/**
 * File that contains the class with the same name.
 *
 * @todo: make sure that all versions are got from a static variable?
 * @todo: make sure that all url are got from the utils class?
 */

namespace TWRP\CSS;

use TWRP\Database\General_Options;

use TWRP\Utils\Color_Utils;
use TWRP\Utils\Directory_Utils;
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

		// Frontend.
		add_action( 'wp_enqueue_scripts', array( static::class, 'include_the_frontend_styles' ), 11 );
		add_action( 'wp_enqueue_scripts', array( static::class, 'include_the_frontend_scripts' ), 11 );

		// Admin.
		add_action( 'admin_enqueue_scripts', array( static::class, 'include_the_backend_styles' ), 11 );
		add_action( 'admin_enqueue_scripts', array( static::class, 'include_the_backend_scripts' ), 11 );
	}

	/**
	 * Include the frontend styles necessary for this plugin to work.
	 *
	 * @return void
	 */
	public static function include_the_frontend_styles() {
		$version = Directory_Utils::PLUGIN_VERSION;
		wp_enqueue_style( 'twrp-style', plugins_url( 'tabs-with-recommended-posts/assets/frontend/style.css' ), array(), $version, 'all' );
	}

	/**
	 * Include the frontend scripts necessary for this plugin to work.
	 *
	 * @return void
	 */
	public static function include_the_frontend_scripts() {
		$version = Directory_Utils::PLUGIN_VERSION;
		wp_enqueue_script( 'twrp-script', plugins_url( 'tabs-with-recommended-posts/assets/frontend/script.js' ), array(), $version, true );
	}

	/**
	 * Include the backend styles necessary for this plugin to work.
	 *
	 * @return void
	 */
	public static function include_the_backend_styles() {
		$version = Directory_Utils::PLUGIN_VERSION;

		wp_enqueue_style( 'twrpb-style', plugins_url( 'tabs-with-recommended-posts/assets/backend/style.css' ), array(), $version, 'all' );

		// CodeMirror.
		wp_enqueue_style( 'twrpb-codemirror-style', plugins_url( 'tabs-with-recommended-posts/assets/backend/codemirror/codemirror.css' ), array(), $version, 'all' );
		wp_enqueue_style( 'twrpb-codemirror-theme', plugins_url( 'tabs-with-recommended-posts/assets/backend/codemirror/material-darker.css' ), array( 'twrpb-codemirror-style' ), $version, 'all' );

		// Pickr.
		wp_enqueue_style( 'twrpb-pickr-theme', plugins_url( 'tabs-with-recommended-posts/assets/backend/pickr.min.css' ), array(), $version, 'all' );
	}

	/**
	 * Include the backend scripts necessary for this plugin to work.
	 *
	 * @return void
	 */
	public static function include_the_backend_scripts() {
		$version = Directory_Utils::PLUGIN_VERSION;

		wp_enqueue_script( 'twrpb-script', plugins_url( 'tabs-with-recommended-posts/assets/backend/script.js' ), array( 'jquery', 'wp-api' ), $version, true );

		// CodeMirror.
		wp_enqueue_script( 'twrpb-codemirror-script', plugins_url( 'tabs-with-recommended-posts/assets/backend/codemirror/codemirror.js' ), array(), $version, true );
		wp_enqueue_script( 'twrpb-codemirror-css', plugins_url( 'tabs-with-recommended-posts/assets/backend/codemirror/css.js' ), array( 'twrpb-codemirror-script' ), $version, true );
		wp_enqueue_script( 'twrpb-codemirror-javascript', plugins_url( 'tabs-with-recommended-posts/assets/backend/codemirror/javascript.js' ), array( 'twrpb-codemirror-script' ), $version, true );
		// Need to refresh the editor when is hidden.
		wp_enqueue_script( 'twrpb-codemirror-autorefresh', plugins_url( 'tabs-with-recommended-posts/assets/backend/codemirror/autorefresh.js' ), array( 'twrpb-codemirror-script' ), $version, true );

		// Pickr.
		wp_enqueue_script( 'twrpb-pickr', plugins_url( 'tabs-with-recommended-posts/assets/backend/pickr.min.js' ), array(), $version, true );
		wp_localize_script( 'twrpb-script', 'TwrpPickrTranslations', self::get_pickr_translations() );

		// Jquery UI.
		wp_enqueue_script( 'twrpb-jquery-ui', plugins_url( 'tabs-with-recommended-posts/assets/backend/jquery-ui.min.js' ), array(), $version, true );
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

	/**
	 * Get an array with translations that is needed to be used in the pickr color
	 * picker.
	 *
	 * @return array
	 */
	private static function get_pickr_translations() {
		return array(
			// Strings visible in the UI.
			'ui:dialog'       => _x( 'color picker dialog', 'backend', 'twrp' ),
			'btn:toggle'      => _x( 'toggle color picker dialog', 'backend', 'twrp' ),
			'btn:swatch'      => _x( 'color swatch', 'backend', 'twrp' ),
			'btn:last-color'  => _x( 'use previous color', 'backend', 'twrp' ),
			'btn:save'        => _x( 'Save', 'backend', 'twrp' ),
			'btn:cancel'      => _x( 'Cancel', 'backend', 'twrp' ),
			'btn:clear'       => _x( 'Clear', 'backend', 'twrp' ),

			// Strings used for aria-labels.
			'aria:btn:save'   => _x( 'save and close', 'backend, screen reader text', 'twrp' ),
			'aria:btn:cancel' => _x( 'cancel and close', 'backend, screen reader text', 'twrp' ),
			'aria:btn:clear'  => _x( 'clear and close', 'backend, screen reader text', 'twrp' ),
			'aria:input'      => _x( 'color input field', 'backend, screen reader text', 'twrp' ),
			'aria:palette'    => _x( 'color selection area', 'backend, screen reader text', 'twrp' ),
			'aria:hue'        => _x( 'hue selection slider', 'backend, screen reader text', 'twrp' ),
			'aria:opacity'    => _x( 'selection slider', 'backend, screen reader text', 'twrp' ),
		);
	}

}
