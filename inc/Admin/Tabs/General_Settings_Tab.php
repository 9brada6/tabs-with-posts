<?php

namespace TWRP\Admin\Tabs;

use RuntimeException;
use TWRP\Database\General_Options;
use TWRP\Admin\Settings_Menu;
use TWRP\Icons\SVG_Manager;
use TWRP\Icons\Icon;
use TWRP\Icons\Rating_Icon_Pack;
use TWRP\Admin\General_Select_Setting;

class General_Settings_Tab implements Interface_Admin_Menu_Tab {

	public static function get_tab_url_arg() {
		return 'general_settings';
	}

	public static function get_tab_title() {
		return _x( 'General Settings', 'backend', 'twrp' );
	}

	#region -- Display Settings

	public function display_tab() {
		?>
		<div class="twrp-general-settings">
			<?php
			if ( self::are_settings_submitted() ) {
				if ( self::is_nonce_correct() ) {
					self::settings_submitted_message();
					self::save_settings_submitted();
				} else {
					// todo:
				}
			}
			?>

			<form class="twrp-general-settings__form" method="post" action="<?= esc_url( self::get_form_action() ); ?>">
				<fieldset class="twrp-general-settings__fieldset">
					<legend class="twrp-general-settings__legend"><?= _x( 'Date Settings', 'backend', 'twrp' ); ?></legend>
					<?php
					self::create_radio_option( General_Options::KEY__PER_WIDGET_DATE_FORMAT, General_Options::get_option( General_Options::KEY__PER_WIDGET_DATE_FORMAT ), self::get_per_widget_date_format_setting_args() );
					self::create_radio_option( General_Options::KEY__HUMAN_READABLE_DATE, General_Options::get_option( General_Options::KEY__HUMAN_READABLE_DATE ), self::get_human_readable_setting_args() );
					self::create_text_option( General_Options::KEY__DATE_FORMAT, General_Options::get_option( General_Options::KEY__DATE_FORMAT ), self::get_date_format_setting_args() );
					?>
				</fieldset>

				<fieldset class="twrp-general-settings__fieldset">
					<legend class="twrp-general-settings__legend"><?= _x( 'Icons Settings', 'backend', 'twrp' ); ?></legend>
					<?php
					self::create_radio_option( General_Options::KEY__PER_WIDGET_ICON, General_Options::get_option( General_Options::KEY__PER_WIDGET_ICON ), self::get_per_widget_icons_setting_args() );

					$setting_option = new General_Select_Setting( General_Options::KEY__AUTHOR_ICON, General_Options::get_option( General_Options::KEY__AUTHOR_ICON ), self::get_author_icon_setting_args() );
					$setting_option->display();

					$setting_option = new General_Select_Setting( General_Options::KEY__DATE_ICON, General_Options::get_option( General_Options::KEY__DATE_ICON ), self::get_date_icon_setting_args() );
					$setting_option->display();

					$setting_option = new General_Select_Setting( General_Options::KEY__CATEGORY_ICON, General_Options::get_option( General_Options::KEY__CATEGORY_ICON ), self::get_category_icon_setting_args() );
					$setting_option->display();

					$setting_option = new General_Select_Setting( General_Options::KEY__COMMENTS_ICON, General_Options::get_option( General_Options::KEY__COMMENTS_ICON ), self::get_comments_icon_setting_args() );
					$setting_option->display();

					$setting_option = new General_Select_Setting( General_Options::KEY__COMMENTS_DISABLED_ICON, General_Options::get_option( General_Options::KEY__COMMENTS_DISABLED_ICON ), self::get_comments_disabled_icon_setting_args() );
					$setting_option->display();

					$setting_option = new General_Select_Setting( General_Options::KEY__VIEWS_ICON, General_Options::get_option( General_Options::KEY__VIEWS_ICON ), self::get_views_icon_setting_args() );
					$setting_option->display();

					$setting_option = new General_Select_Setting( General_Options::KEY__RATING_ICON_PACK, General_Options::get_option( General_Options::KEY__RATING_ICON_PACK ), self::get_rating_pack_setting_args() );
					$setting_option->display();
					?>
				</fieldset>

				<?php
				self::display_submit_button();
				?>
			</form>
		</div>
		<?php
	}

	/**
	 * Display a message that show that the settings were submitted successfully.
	 *
	 * @return void
	 */
	protected static function settings_submitted_message() {
		?>
		<div class="twrp-general-settings__success-submitted-wrapper">
			<?= _x( 'Settings successfully saved.', 'backend', 'twrp' ); ?>
		</div>
		<?php
	}

	/**
	 * Check if the form has been submitted.
	 *
	 * @return bool
	 */
	protected static function are_settings_submitted() {
		if ( isset( $_POST['submit'] ) && 'submit' === $_POST['submit'] ) { // phpcs:ignore -- Nonce verified.
			return true;
		}

		return false;
	}

	/**
	 * Get the action of the general settings form.
	 *
	 * @return string The url is not sanitized.
	 */
	protected static function get_form_action() {
		return Settings_Menu::get_tab_url( new self() );
	}

	/**
	 * Display the submit button of the form.
	 *
	 * @return void
	 */
	protected static function display_submit_button() {
		?>
		<div class="twrp-general-settings__submit-btn-wrapper">
			<?php wp_nonce_field( 'twrp_general_submit_nonce', 'twrp_general_nonce', true, true ); ?>
			<button id="twrp-general-settings__submit-btn" class="twrp-general-settings__submit-btn" type="submit" name="submit" value="submit">
				<?= _x( 'Save Settings', 'backend', 'twrp' ); ?>
			</button>
		</div>
		<?php
	}

	#endregion -- Display Settings

	#region -- Update Settings

	/**
	 * Verify if the nonce submitted is correct.
	 *
	 * @return bool
	 */
	protected static function is_nonce_correct() {
		if ( ! isset( $_POST['twrp_general_nonce'] ) || ! is_string( $_POST['twrp_general_nonce'] ) ) {
			return false;
		}

		if ( 1 === wp_verify_nonce( $_POST['twrp_general_nonce'], 'twrp_general_submit_nonce' ) ) { // phpcs:ignore -- No need for sanitization or unslash.
			return true;
		}

		return false;
	}

	/**
	 * Save the submitted settings into database.
	 *
	 * @return void
	 */
	protected static function save_settings_submitted() {
		$settings = $_POST; // phpcs:ignore -- No need to check for nonce here.
		General_Options::set_options( $settings );
	}

	#endregion -- Update Settings

	#region -- Option Creator

	// todo: add id's to wrappers.

	/**
	 * Creates a radio option and outputs the HTML.
	 *
	 * @param string $name The name of the input.
	 * @param string|null $value The current value of the input, null for default.
	 * @param array{title:string,options:array,default:string} $args
	 * @return void
	 */
	protected static function create_radio_option( $name, $value, $args ) {
		if ( null === $value ) {
			$value = $args['default'];
		}

		$wrapper_id = self::get_setting_wrapper_attr_id( $name );

		?>
		<div id="<?= esc_attr( $wrapper_id ); ?>" class="twrp-general-radio twrp-general-settings__radio-group">
			<div class="twrp-general-radio__title">
				<?= $args['title']; // phpcs:ignore -- No XSS ?>
			</div>

			<div class="twrp-general-radio__checkboxes">
				<?php foreach ( $args['options'] as $option_value => $text ) : ?>
					<?php
						$radio_id = self::get_settings_attr_id( $name, $option_value );
						$checked  = ( $option_value === $value ? ' checked' : '' );
					?>
					<span class="twrp-general-radio__selection">
						<input id="<?= esc_attr( $radio_id ); ?>" type="radio" name="<?= esc_attr( $name ); ?>" value="<?= esc_attr( $option_value ); ?>"<?= esc_attr( $checked ); ?>>
						<label for="<?= esc_attr( $radio_id ); ?>">
							<?= $text; // phpcs:ignore -- No XSS ?>
						</label>
					</span>
				<?php endforeach; ?>
			</div>

		</div>
		<?php
	}

	/**
	 * Create an input text and outputs the HTML.
	 *
	 * @param string $name The name of the input.
	 * @param string|null $value The current value of the input, null for default.
	 * @param array{title:string,placeholder:string,default:string,is_hidden:bool} $args
	 * @return void
	 */
	protected static function create_text_option( $name, $value, $args ) {
		if ( null === $value ) {
			$value = $args['default'];
		}

		$wrapper_id = self::get_setting_wrapper_attr_id( $name );
		$input_id   = self::get_settings_attr_id( $name );

		$is_hidden = '';
		if ( isset( $args['is_hidden'] ) && true === $args['is_hidden'] ) {
			$is_hidden = ' twrp-hidden';
		}

		$placeholder = '';
		if ( isset( $args['placeholder'] ) ) {
			$placeholder = 'placeholder="' . $args['placeholder'] . '"';
		}

		?>
		<div id="<?= esc_attr( $wrapper_id ); ?>" class="twrp-general-text twrp-general-settings__text-group<?= esc_attr( $is_hidden ) ?>">
			<div class="twrp-general-text__title">
			   <?= $args['title']; // phpcs:ignore -- No XSS ?>
			</div>

			<div class="twrp-general-text__wrapper">
				<input id="<?= esc_attr( $input_id ); ?>" type="text" name="<?= esc_attr( $name ); ?>" value="<?= esc_attr( $value ); ?>" <?= $placeholder; // phpcs:ignore ?>/>
			</div>
		</div>
		<?php
	}

	#endregion -- Option Creator

	#region -- Option Creator Helpers

	/**
	 * Return the HTML wrapper id of a setting.
	 *
	 * @param string $name
	 * @return string
	 */
	protected static function get_setting_wrapper_attr_id( $name ) {
		return 'twrp-general-select__' . $name . '-wrapper';
	}

	/**
	 * Return the HTML id of a setting.
	 *
	 * @param string $name
	 * @param string $option_value If there are multiple id's separate them by an additional value.
	 * @return string
	 */
	protected static function get_settings_attr_id( $name, $option_value = '' ) {
		$id = 'twrp-general-select__' . $name . '-setting';

		if ( '' !== $option_value ) {
			$id = $id . '-' . $option_value;
		}

		return $id;
	}

	#endregion -- Option Creator Helpers

	#region -- Settings Arguments

	/**
	 * Return the arguments of the setting to enable date format selection per widget.
	 *
	 * @return array
	 */
	protected static function get_per_widget_date_format_setting_args() {
		return array(
			'title'   => _x( 'Get an additional option for each widget tab to select date format individually?', 'backend', 'twrp' ),
			'options' => array(
				'true'  => __( 'Yes', 'twrp' ),
				'false' => __( 'No', 'twrp' ),
			),
			'default' => General_Options::get_default_setting( General_Options::KEY__PER_WIDGET_DATE_FORMAT ),
		);
	}

	/**
	 * Return the arguments of the setting to enable/disable human readable date format.
	 *
	 * @return array
	 */
	protected static function get_human_readable_setting_args() {
		return array(
			'title'   => _x( 'Display the date in relative format(Ex: 3 weeks ago)?', 'backend', 'twrp' ),
			'options' => array(
				'true'  => __( 'Yes', 'twrp' ),
				'false' => __( 'No', 'twrp' ),
			),
			'default' => General_Options::get_default_setting( General_Options::KEY__HUMAN_READABLE_DATE ),
		);
	}

	/**
	 * Return the arguments of the setting to input a custom date format.
	 *
	 * @return array
	 */
	protected static function get_date_format_setting_args() {
		$is_hidden = false;
		if ( 'true' === General_Options::get_option( General_Options::KEY__HUMAN_READABLE_DATE ) ) {
			$is_hidden = true;
		}

		return array(
			'title'       => _x( 'Enter custom date format(leave empty for WordPress default setting):', 'backend', 'twrp' ),
			'placeholder' => _x( 'Ex: F j, Y', 'backend', 'twrp' ),
			'default'     => General_Options::get_default_setting( General_Options::KEY__HUMAN_READABLE_DATE ),
			'is_hidden'   => $is_hidden,
		);
	}

	/**
	 * Return the arguments of the setting to enable icon selection per widget.
	 *
	 * @return array
	 */
	protected static function get_per_widget_icons_setting_args() {
		return array(
			'title'   => _x( 'Get an additional option for each widget tab to select icons(user, date, ..etc) individually?', 'backend', 'twrp' ),
			'options' => array(
				'true'  => __( 'Yes', 'twrp' ),
				'false' => __( 'No', 'twrp' ),
			),
			'default' => General_Options::get_default_setting( General_Options::KEY__PER_WIDGET_ICON ),
		);
	}

	/**
	 * Return the arguments of the setting to select the author icon.
	 *
	 * @return array
	 */
	protected static function get_author_icon_setting_args() {
		$options = self::create_select_options_by_brands( SVG_Manager::get_user_icons() );

		return array(
			'title'   => _x( 'Select the default author icon:', 'backend', 'twrp' ),
			'options' => $options,
			'default' => General_Options::get_default_setting( General_Options::KEY__AUTHOR_ICON ),
		);
	}

	/**
	 * Return the arguments of the setting to select the date icon.
	 *
	 * @return array
	 */
	protected static function get_date_icon_setting_args() {
		$options = self::create_select_options_by_brands( SVG_Manager::get_date_icons() );

		return array(
			'title'   => _x( 'Select the default date icon:', 'backend', 'twrp' ),
			'options' => $options,
			'default' => General_Options::get_default_setting( General_Options::KEY__DATE_ICON ),
		);
	}

	/**
	 * Return the arguments of the setting to select the category icon.
	 *
	 * @return array
	 */
	protected static function get_category_icon_setting_args() {
		$options = self::create_select_options_by_brands( SVG_Manager::get_category_icons() );

		return array(
			'title'   => _x( 'Select the default category icon:', 'backend', 'twrp' ),
			'options' => $options,
			'default' => General_Options::get_default_setting( General_Options::KEY__CATEGORY_ICON ),
		);
	}

	/**
	 * Return the arguments of the setting to select the comments icon.
	 *
	 * @return array
	 */
	protected static function get_comments_icon_setting_args() {
		$options = self::create_select_options_by_brands( SVG_Manager::get_comment_icons() );

		return array(
			'title'   => _x( 'Select the default comments icon:', 'backend', 'twrp' ),
			'options' => $options,
			'default' => General_Options::get_default_setting( General_Options::KEY__COMMENTS_ICON ),
		);
	}

	/**
	 * Return the arguments of the setting to select the disabled comments icon.
	 *
	 * @return array
	 */
	protected static function get_comments_disabled_icon_setting_args() {
		$options           = self::create_select_options_by_brands( SVG_Manager::get_comment_disabled_icons() );
		$rating_packs_data = SVG_Manager::get_compatibles_disabled_comments_attr();

		return array(
			'title'            => _x( 'Select the default disabled comments icon:', 'backend', 'twrp' ),
			'options'          => $options,
			'default'          => General_Options::get_default_setting( General_Options::KEY__COMMENTS_DISABLED_ICON ),
			'additional_attrs' => array(
				'data-twrp-related-comment-icons' => wp_json_encode( $rating_packs_data ),
			),
		);
	}

	/**
	 * Return the arguments of the setting to select the views icon.
	 *
	 * @return array
	 */
	protected static function get_views_icon_setting_args() {
		$options = self::create_select_options_by_brands( SVG_Manager::get_views_icons() );

		return array(
			'title'   => _x( 'Select the default views icon:', 'backend', 'twrp' ),
			'options' => $options,
			'default' => General_Options::get_default_setting( General_Options::KEY__VIEWS_ICON ),
		);
	}

	/**
	 * Return the arguments of the setting to select the rating icons pack.
	 *
	 * @return array
	 */
	protected static function get_rating_pack_setting_args() {
		$options = Rating_Icon_Pack::nest_packs_by_brands( SVG_Manager::get_rating_packs() );

		foreach ( $options as $rating_packs_brand => $rating_packs ) {
			foreach ( $rating_packs as $rating_pack_id => $rating_pack ) {
				$options[ $rating_packs_brand ][ $rating_pack_id ] = $rating_pack->get_option_pack_description();
			}
		}

		$rating_packs_data = SVG_Manager::get_rating_packs_attr();
		foreach ( $rating_packs_data as $id => $date ) {
			if ( isset( $rating_packs_data[ $id ]['brand'], $rating_packs_data[ $id ]['description'] ) ) {
				unset( $rating_packs_data[ $id ]['brand'] );
				unset( $rating_packs_data[ $id ]['description'] );
			}
		}

		return array(
			'title'            => _x( 'Select the default rating pack icons:', 'backend', 'twrp' ),
			'options'          => $options,
			'default'          => General_Options::get_default_setting( General_Options::KEY__RATING_ICON_PACK ),
			'additional_attrs' => array(
				'data-twrp-rating-packs' => wp_json_encode( $rating_packs_data ),
			),
		);
	}

	#endregion -- Settings Arguments

	/**
	 * Create an array with the brand as a key, and the value containing an
	 * array of icons of the same brand.
	 *
	 * @param array<Icon> $icons
	 * @return array
	 */
	protected static function create_select_options_by_brands( $icons ) {
		$options = Icon::nest_icons_by_brands( $icons );

		foreach ( $options as $brand => $brand_icons ) {
			foreach ( $brand_icons as $icon_id => $icon ) {
				$options[ $brand ][ $icon_id ] = $icon->get_option_icon_description();
			}
		}

		return $options;
	}

}
