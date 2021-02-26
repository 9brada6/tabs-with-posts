<?php

namespace TWRP\Admin\Tabs;

use TWRP\Database\General_Options;
use TWRP\Admin\Settings_Menu;
use TWRP\Admin\Tabs\General_Settings\General_Settings_Factory;

/**
 * Display the general settings tab in the admin area. From this tab, the
 * administrator can change the settings of the plugin.
 */
class General_Settings_Tab extends Admin_Menu_Tab {

	public function get_tab_url_arg() {
		return 'general_settings';
	}

	public function get_tab_title() {
		return _x( 'General Settings', 'backend', 'twrp' );
	}

	#region -- Display Settings

	public function display_tab() {
		?>
		<div class="twrpb-general-settings">
			<?php
			if ( self::are_settings_submitted() ) {
				if ( self::is_nonce_correct() ) {
					self::settings_submitted_success_message();
					self::save_settings_submitted();
				} else {
					wp_nonce_ays( 'twrp_general_submit_nonce' );
				}
			}
			?>

			<form class="twrpb-general-settings__form" method="post" action="<?= esc_url( self::get_form_action() ); ?>">
				<fieldset class="twrpb-general-settings__fieldset">
					<legend class="twrpb-general-settings__legend"><?= _x( 'Color Settings', 'backend', 'twrp' ); ?></legend>
					<?php
					General_Settings_Factory::display_setting( General_Options::BACKGROUND_COLOR );
					General_Settings_Factory::display_setting( General_Options::SECONDARY_BACKGROUND_COLOR );
					General_Settings_Factory::display_setting( General_Options::TEXT_COLOR );
					General_Settings_Factory::display_setting( General_Options::DISABLED_TEXT_COLOR );
					General_Settings_Factory::display_setting( General_Options::ACCENT_COLOR );
					General_Settings_Factory::display_setting( General_Options::DARKER_ACCENT_COLOR );
					General_Settings_Factory::display_setting( General_Options::LIGHTER_ACCENT_COLOR );
					General_Settings_Factory::display_setting( General_Options::BORDER_COLOR );
					General_Settings_Factory::display_setting( General_Options::SECONDARY_BORDER_COLOR );
					?>
				</fieldset>

				<fieldset class="twrpb-general-settings__fieldset">
					<legend class="twrpb-general-settings__legend"><?= _x( 'Date Settings', 'backend', 'twrp' ); ?></legend>
					<?php
					General_Settings_Factory::display_setting( General_Options::HUMAN_READABLE_DATE );
					General_Settings_Factory::display_setting( General_Options::DATE_FORMAT );
					?>
				</fieldset>

				<fieldset class="twrpb-general-settings__fieldset">
					<legend class="twrpb-general-settings__legend"><?= _x( 'Thumbnail Settings', 'backend', 'twrp' ); ?></legend>
					<?php
					General_Settings_Factory::display_setting( General_Options::NO_THUMBNAIL_IMAGE );
					?>
				</fieldset>

				<fieldset class="twrpb-general-settings__fieldset">
					<legend class="twrpb-general-settings__legend"><?= _x( 'Icons Settings', 'backend', 'twrp' ); ?></legend>
					<p>
						<?php
						$icon_reference_link = Settings_Menu::get_tab_url( new Documentation_Tab() );
						$icon_reference_link = $icon_reference_link . '#twrpb-docs__all-icons-reference';
						echo sprintf(
							/* translators: %1$s and %2$s are placeholder where HTML code will be inserted, as a link wrapper(going to another page). No translation words are inserted there. Just translate the whole sentence, and be sure the corresponding words are between %$1s and %2$s tags. */
							_x( 'Note: To see a long list with all the icons, please look at %1$s documentation icons reference %2$s.', 'backend', 'twrp' ),
							'<a href="' . esc_url( $icon_reference_link ) . '" target="_blank">',
							'</a>'
						);
						?>
					</p>
					<?php
					General_Settings_Factory::display_setting( General_Options::AUTHOR_ICON );
					General_Settings_Factory::display_setting( General_Options::DATE_ICON );
					General_Settings_Factory::display_setting( General_Options::CATEGORY_ICON );
					General_Settings_Factory::display_setting( General_Options::COMMENTS_ICON );
					General_Settings_Factory::display_setting( General_Options::COMMENTS_DISABLED_ICON );
					General_Settings_Factory::display_setting( General_Options::VIEWS_ICON );
					General_Settings_Factory::display_setting( General_Options::RATING_ICON_PACK );
					General_Settings_Factory::display_setting( General_Options::SVG_INCLUDE_INLINE );
					?>
				</fieldset>

				<fieldset class="twrpb-general-settings__fieldset">
					<legend class="twrpb-general-settings__legend"><?= _x( 'External Plugin Settings', 'backend', 'twrp' ); ?></legend>
					<p><?= _x( 'Read more in documentation for what is this setting about.', 'backend', 'twrp' ); ?></p>
					<?php General_Settings_Factory::display_setting( General_Options::YASR_RATING_TYPE ); ?>
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
	protected static function settings_submitted_success_message() {
		?>
		<div class="twrpb-general-settings__success-submitted-wrapper twrpb-notification twrpb-notification--success">
			<?= _x( 'Settings saved successfully.', 'backend', 'twrp' ); ?>
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
		<div class="twrpb-general-settings__submit-btn-wrapper">
			<?php wp_nonce_field( 'twrp_general_submit_nonce', 'twrp_general_nonce', true, true ); ?>
			<button id="twrpb-general-settings__submit-btn" class="twrpb-general-settings__submit-btn twrpb-button twrpb-button--save twrpb-button--large" type="submit" name="submit" value="submit">
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

		do_action( 'twrp_general_before_settings_submitted', $settings );

		General_Options::set_options( $settings );

		do_action( 'twrp_general_after_settings_submitted', $settings );
	}

	#endregion -- Update Settings
}
