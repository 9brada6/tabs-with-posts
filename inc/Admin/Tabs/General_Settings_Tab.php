<?php

namespace TWRP\Admin\Tabs;

use TWRP\Database\General_Options;
use TWRP\Admin\Settings_Menu;
use TWRP\Icons\SVG_Manager;

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
				<?php
				self::create_radio_option( General_Options::KEY__PER_WIDGET_ICON, General_Options::get_option( General_Options::KEY__PER_WIDGET_ICON ), self::get_per_widget_setting_args() );
				self::create_select_option( General_Options::KEY__AUTHOR_ICON, General_Options::get_option( General_Options::KEY__AUTHOR_ICON ), self::get_author_icon_setting_args() );
				self::create_select_option( General_Options::KEY__DATE_ICON, General_Options::get_option( General_Options::KEY__DATE_ICON ), self::get_date_icon_setting_args() );
				self::create_select_option( General_Options::KEY__CATEGORY_ICON, General_Options::get_option( General_Options::KEY__CATEGORY_ICON ), self::get_category_icon_setting_args() );
				self::create_select_option( General_Options::KEY__COMMENTS_ICON, General_Options::get_option( General_Options::KEY__COMMENTS_ICON ), self::get_comments_icon_setting_args() );
				self::create_select_option( General_Options::KEY__VIEWS_ICON, General_Options::get_option( General_Options::KEY__VIEWS_ICON ), self::get_views_icon_setting_args() );
				self::create_select_option( General_Options::KEY__RATING_ICON_PACK, General_Options::get_option( General_Options::KEY__RATING_ICON_PACK ), self::get_rating_pack_setting_args() );

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

		?>
		<div class="twrp-general-radio twrp-general-settings__radio-group">
			<div class="twrp-general-radio__title">
				<?= $args['title']; // phpcs:ignore -- No XSS ?>
			</div>

			<div class="twrp-general-radio__checkboxes">
				<?php foreach ( $args['options'] as $option_value => $text ) : ?>
					<?php
						$id      = 'twrp-general-radio__id-' . $name . '-' . $option_value;
						$checked = ( $option_value === $value ? ' checked' : '' );
					?>
					<span class="twrp-general-radio__selection">
						<input id="<?= esc_attr( $id ); ?>" type="radio" name="<?= esc_attr( $name ); ?>" value="<?= esc_attr( $option_value ); ?>"<?= esc_attr( $checked ); ?>>
						<label for="<?= esc_attr( $id ); ?>">
							<?= $text; // phpcs:ignore -- No XSS ?>
						</label>
					</span>
				<?php endforeach; ?>
			</div>

		</div>
		<?php
	}

	/**
	 * Creates a select option and outputs the HTML.
	 *
	 * @param string $name The name of the input.
	 * @param string|null $value The current value of the input, null for default.
	 * @param array{title:string,options:array,default:string} $args
	 * @return void
	 */
	protected static function create_select_option( $name, $value, $args ) {
		if ( null === $value ) {
			$value = $args['default'];
		}

		?>
		<div class="twrp-general-select twrp-general-settings__select-group">
			<div class="twrp-general-select__title">
				<?= $args['title']; // phpcs:ignore -- No XSS ?>
			</div>

			<div class="twrp-general-select__select-wrapper">
				<select name="<?= esc_attr( $name ); ?>">
					<?php
					if ( self::select_with_optgroup( $args['options'] ) ) :
						foreach ( $args['options'] as $label => $options ) :
							?>
							<optgroup label="<?= esc_attr( $label ); ?>">
								<?php self::create_select_options( $options, $value ); ?>
							</optgroup>
							<?php
						endforeach;
					else :
						self::create_select_options( $args['options'], $value );
					endif;
					?>
				</select>
			</div>
		</div>
		<?php
	}

	/**
	 * Detect if the options passed to create_select_option() function are for
	 * creating a select with optgroup.
	 *
	 * @param array $options
	 * @return bool
	 */
	protected static function select_with_optgroup( $options ) {
		$first_value = reset( $options );

		if ( is_array( $first_value ) ) {
			return true;
		}

		return false;
	}

	/**
	 * Creates the options for a select input.
	 *
	 * @param array $options
	 * @param string $value The current selected value.
	 * @return void
	 */
	protected static function create_select_options( $options, $value ) {
		foreach ( $options as $option_value => $option_label ) :
			$selected = ( $option_value === $value ? ' selected' : '' );
			?>
			<option value="<?= esc_attr( $option_value ); ?>"<?= esc_attr( $selected ); ?>>
				<?= esc_html( $option_label ); ?>
			</option>
			<?php
		endforeach;
	}

	#endregion -- Option Creator

	#region -- Settings Arguments

	/**
	 * Return the arguments of the setting to enable icon selection per widget.
	 *
	 * @return array
	 */
	protected static function get_per_widget_setting_args() {
		return array(
			'title'   => _x( 'Get an additional option for each widget tab to select icons(user, date, ..etc) individually?', 'backend', 'twrp' ),
			'options' => array(
				'true'  => __( 'Yes', 'twrp' ),
				'false' => __( 'No', 'twrp' ),
			),
			'default' => 'false',
		);
	}

	/**
	 * Return the arguments of the setting to select the author icon.
	 *
	 * @return array
	 */
	protected static function get_author_icon_setting_args() {
		$args    = General_Options::get_author_icon_setting_args();
		$options = SVG_Manager::nest_icons_by_brands( SVG_Manager::get_user_icons() );

		foreach ( $options as $key => $brand_icons ) {
			foreach ( $brand_icons as $icon_id => $icon ) {
				$options[ $key ][ $icon_id ] = SVG_Manager::get_icon_description( $icon );
			}
		}

		return array(
			'title'   => _x( 'Select the default author icon:', 'backend', 'twrp' ),
			'options' => $options,
			'default' => $args['default'],
		);
	}

	/**
	 * Return the arguments of the setting to select the date icon.
	 *
	 * @return array
	 */
	protected static function get_date_icon_setting_args() {
		$args    = General_Options::get_date_icon_setting_args();
		$options = SVG_Manager::nest_icons_by_brands( SVG_Manager::get_date_icons() );

		foreach ( $options as $key => $brand_icons ) {
			foreach ( $brand_icons as $icon_id => $icon ) {
				$options[ $key ][ $icon_id ] = SVG_Manager::get_icon_description( $icon );
			}
		}

		return array(
			'title'   => _x( 'Select the default date icon:', 'backend', 'twrp' ),
			'options' => $options,
			'default' => $args['default'],
		);
	}

	/**
	 * Return the arguments of the setting to select the category icon.
	 *
	 * @return array
	 */
	protected static function get_category_icon_setting_args() {
		$args    = General_Options::get_category_icon_setting_args();
		$options = SVG_Manager::nest_icons_by_brands( SVG_Manager::get_category_icons() );

		foreach ( $options as $key => $brand_icons ) {
			foreach ( $brand_icons as $icon_id => $icon ) {
				$options[ $key ][ $icon_id ] = SVG_Manager::get_icon_description( $icon );
			}
		}

		return array(
			'title'   => _x( 'Select the default category icon:', 'backend', 'twrp' ),
			'options' => $options,
			'default' => $args['default'],
		);
	}

	/**
	 * Return the arguments of the setting to select the comments icon.
	 *
	 * @return array
	 */
	protected static function get_comments_icon_setting_args() {
		$args    = General_Options::get_comments_icon_setting_args();
		$options = SVG_Manager::nest_icons_by_brands( SVG_Manager::get_comment_icons() );

		foreach ( $options as $key => $brand_icons ) {
			foreach ( $brand_icons as $icon_id => $icon ) {
				$options[ $key ][ $icon_id ] = SVG_Manager::get_icon_description( $icon );
			}
		}

		return array(
			'title'   => _x( 'Select the default comments icon:', 'backend', 'twrp' ),
			'options' => $options,
			'default' => $args['default'],
		);
	}

	/**
	 * Return the arguments of the setting to select the views icon.
	 *
	 * @return array
	 */
	protected static function get_views_icon_setting_args() {
		$args    = General_Options::get_views_icon_setting_args();
		$options = SVG_Manager::nest_icons_by_brands( SVG_Manager::get_views_icons() );

		foreach ( $options as $key => $brand_icons ) {
			foreach ( $brand_icons as $icon_id => $icon ) {
				$options[ $key ][ $icon_id ] = SVG_Manager::get_icon_description( $icon );
			}
		}

		return array(
			'title'   => _x( 'Select the default views icon:', 'backend', 'twrp' ),
			'options' => $options,
			'default' => $args['default'],
		);
	}

	/**
	 * Return the arguments of the setting to select the rating icons pack.
	 *
	 * @return array
	 */
	protected static function get_rating_pack_setting_args() {
		$args    = General_Options::get_rating_pack_setting_args();
		$options = SVG_Manager::nest_icons_by_brands( SVG_Manager::get_rating_packs() );

		foreach ( $options as $key => $brand_icons ) {
			foreach ( $brand_icons as $icon_id => $icon ) {
				$options[ $key ][ $icon_id ] = SVG_Manager::get_icon_description( $icon );
			}
		}

		return array(
			'title'   => _x( 'Select the default rating pack icons:', 'backend', 'twrp' ),
			'options' => $options,
			'default' => $args['default'],
		);
	}

	#endregion -- Settings Arguments

}
