<?php

namespace TWRP\Admin\Tabs\Query_Options;

use RuntimeException;
use TWRP\Utils\Class_Retriever_Utils;
use TWRP\Admin\Tabs\Query_Options\Query_Setting_Display;
use TWRP\Admin\Tabs\Queries_Tab;
use TWRP\Database\Query_Options;

/**
 * Class that displays the query settings, where an administrator can add/edit
 * a query setting.
 */
class Modify_Query_Settings {

	const NAME__QUERY_ID_HIDDEN_INPUT = 'query_id_being_modified';

	/**
	 * Display all the query settings.
	 *
	 * @return void
	 */
	public function display() {
		$settings_classes = Class_Retriever_Utils::get_all_display_query_settings_objects();
		$queries_tab      = new Queries_Tab();
		$query_id         = $queries_tab->get_sanitized_id_of_query_being_modified();

		?>
			<input type="hidden" name="<?= esc_attr( self::NAME__QUERY_ID_HIDDEN_INPUT ) ?>" value="<?= esc_attr( $query_id ); ?>">
		<?php
		foreach ( $settings_classes as $setting_class ) :
			$this->display_query_setting( $setting_class );
		endforeach;
	}

	/**
	 * Display a specific setting control in query settings.
	 *
	 * @param Query_Setting_Display $setting_display_class
	 * @return void
	 */
	protected function display_query_setting( $setting_display_class ) {
		$current_setting       = $this->get_query_input_setting( $setting_display_class );
		$collapsed             = $this->get_if_setting_collapsed( $setting_display_class, $current_setting ) ? '1' : '0';
		$queries_tab           = new Queries_Tab();
		$default_settings_json = wp_json_encode( $setting_display_class->get_default_setting() );
		if ( false === $default_settings_json ) {
			$default_settings_json = '';
		}

		?>
		<div class="<?= esc_attr( $queries_tab->get_query_setting_wrapper_class() ); ?> twrpb-collapsible"
			data-twrpb-is-collapsed="<?= esc_attr( $collapsed ) ?>"
			data-twrpb-default-settings="<?= esc_attr( $default_settings_json ); ?>"
			data-twrpb-setting-name="<?= esc_attr( $setting_display_class->get_setting_name() ); ?>"
		>
			<h2 class="twrpb-collapsible__title">
				<span class="twrpb-collapsible__indicator"></span>
				<?= $setting_display_class->get_title(); // phpcs:ignore -- No need to escape title. ?>
			</h2>
			<div class="twrpb-collapsible__content">
				<?php $setting_display_class->display_setting( $current_setting ); ?>
			</div>
		</div>
		<?php
	}

	/**
	 * Get the current setting of the query.
	 *
	 * @param Query_Setting_Display $setting_class
	 * @return mixed The specific settings of the query, sanitized.
	 */
	protected function get_query_input_setting( $setting_class ) {
		$queries_tab_class = new Queries_Tab();
		try {
			$query_id           = $queries_tab_class->get_sanitized_id_of_query_being_modified();
			$all_query_settings = Query_Options::get_all_query_settings( $query_id );
		} catch ( RuntimeException $e ) { // phpcs:ignore -- Empty catch.
			// Do nothing.
		}

		if ( isset( $all_query_settings[ $setting_class->get_setting_name() ] ) ) {
			return $all_query_settings[ $setting_class->get_setting_name() ];
		}

		return $setting_class->get_default_setting();
	}

	/**
	 * Get whether or not the setting should be collapsed
	 *
	 * @param Query_Setting_Display $display_setting_class
	 * @param array $current_settings
	 * @return bool
	 */
	protected function get_if_setting_collapsed( $display_setting_class, $current_settings ) {
		$setting_is_collapsed = $display_setting_class->setting_is_collapsed();
		if ( is_bool( $setting_is_collapsed ) ) {
			return $setting_is_collapsed;
		}

		$default_settings = $display_setting_class->get_default_setting();

		array_multisort( $default_settings );
		array_multisort( $current_settings );

		if ( $current_settings === $default_settings ) {
			return false;
		}

		return true;
	}

	/**
	 * Add a new query settings, or updates a query when the form is submitted.
	 *
	 * @return void
	 */
	public function update_form_submitted_settings() {
		$settings_classes_name = Class_Retriever_Utils::get_all_display_query_settings_objects();
		$query_settings        = array();

		foreach ( $settings_classes_name as $setting_class ) {
			$query_settings[ $setting_class->get_setting_name() ] = $setting_class->get_submitted_sanitized_setting();
		}

		$query_key = $this->get_sanitized_submitted_query_id_being_modified();
		if ( ! $query_key ) {
			Query_Options::add_new_query( $query_settings );
		} elseif ( Query_Options::query_exists( $query_key ) ) {
			Query_Options::update_query( $query_key, $query_settings );
		}
	}

	/**
	 * Get the submitted query id that the settings are modified.
	 *
	 * @return int|false False if the query id does not exist, or the id is not valid.
	 */
	protected function get_sanitized_submitted_query_id_being_modified() {
		if ( ! isset( $_POST, $_POST[ self::NAME__QUERY_ID_HIDDEN_INPUT ] ) ) { // phpcs:ignore -- Nonce verified.
			return false;
		}

		$query_id = intval( wp_unslash( $_POST[ self::NAME__QUERY_ID_HIDDEN_INPUT ] ) ); // phpcs:ignore -- Nonce verified.

		if ( Query_Options::query_exists( $query_id ) ) {
			return $query_id;
		}

		return false;
	}
}
