<?php
/**
 * Implements the Query_Tab class. See class DocBlock for more.
 */

namespace TWRP\Admin\Tabs;

use TWRP\Utils\Class_Retriever_Utils;
use TWRP\Admin\Settings_Menu;
use TWRP\Database\Query_Options;
use TWRP\Query_Generator\Query_Setting\Query_Setting;
use TWRP\Query_Generator\Query_Setting\Query_Name;
use TWRP\Admin\Tabs\Query_Options\Query_Setting_Display;
use RuntimeException;
use TWRP\Admin\Tabs\Query_Options\Modify_Query_Settings;
use TWRP\Admin\Tabs\Query_Options\Query_Existing_Table;

/**
 * Implements a tab in the Settings Menu called "Queries Tab". The implemented
 * focus on creating queries that will remember by which properties the posts
 * should be retrieved, in which order, how to filter them, ..etc. In short,
 * it's a easy UI for the user to create parameters for WP_Query function.
 *
 * For a given query, this class shows an UI with each filter implemented. Each
 * filter has it's own class, and implement Query_Setting interface.
 */
class Queries_Tab implements Interface_Admin_Menu_Tab {

	/**
	 * The value that represents the tab in the query URL parameter.
	 *
	 * Ex: .../wp-admin/options-general.php?page=tabs_with_recommended_posts&tab=query_posts
	 */
	const TAB_URL_ARG = 'query_posts';

	/**
	 * The URL parameter key which say what query ID should be edited. If this
	 * parameter has no value, then a new query is added.
	 */
	const EDIT_QUERY__URL_PARAM_KEY = 'query_edit_id';

	/**
	 * The URL parameter key which say which query should be deleted.
	 */
	const DELETE_QUERY__URL_PARAM_KEY = 'query_delete_id';

	/**
	 * The name of the input that holds the query name in the Add/Edit Page.
	 * This value should be the same as
	 * TWRP\Query_Generator\Query_Setting\Query_Name::get_setting_name().
	 *
	 * @todo: See where it is used and remove.
	 */
	const QUERY_NAME = 'query_name';

	/**
	 * Name of the nonce from the edit form.
	 */
	const NONCE_EDIT_NAME = 'twrp_query_nonce';

	/**
	 * Action of the nonce from the edit form.
	 */
	const NONCE_EDIT_ACTION = 'twrp_edit_query';

	/**
	 * Name of the nonce to delete a query.
	 */
	const NONCE_DELETE_NAME = 'twrp_query_delete_nonce';

	/**
	 * Action of the nonce to delete a query.
	 */
	const NONCE_DELETE_ACTION = 'twrp_delete_query';

	/**
	 * The name of the button that submit the Add/Edit form. The constant
	 * is also used as the value attribute of the button.
	 */
	const SUBMIT_BTN_NAME = 'twrp_query_submitted';

	/**
	 * Get the value that represents the tab in the query URL parameter.
	 *
	 * Ex: .../wp-admin/options-general.php?page=tabs_with_recommended_posts&tab=query_posts
	 *
	 * @return string
	 */
	public static function get_tab_url_arg() {
		return self::TAB_URL_ARG;
	}

	/**
	 * Get the tab title, it will be displayed on the tab button.
	 *
	 * @return string
	 */
	public static function get_tab_title() {
		return _x( 'Query Posts', 'backend', 'twrp' );
	}

	/**
	 * Display the tab contents.
	 *
	 * @return void
	 */
	public function display_tab() {
		if ( $this->form_has_been_submitted() ) {
			if ( $this->edit_nonce_is_valid() ) {
				$modify_query_settings = new Modify_Query_Settings();
				$modify_query_settings->update_form_submitted_settings();
				/**
				 * @todo
				 */
				echo _x( 'Settings saved', 'backend', 'twrp' );
				$this->display_existing_queries_page();
				return;
			} else {
				wp_nonce_ays( self::NONCE_EDIT_ACTION );
			}
		}

		if ( $this->delete_button_clicked() ) {
			/**
			 * @todo
			 */
			echo _x( 'Deleted Setting', 'backend', 'twrp' );
			$this->execute_delete_query_action();
		}

		if ( $this->edit_query_screen_is_displayed() ) {
			$this->display_query_form();
		} else {
			$this->display_existing_queries_page();
		}
	}

	#region -- Existing Queries Table Methods

	/**
	 * Creates a table that display the existing queries.
	 *
	 * @return void
	 */
	public function display_existing_queries_page() {
		$existing_queries_table = new Query_Existing_Table();
		?>
		<div class="twrpb-existing-queries">
			<h3 class="twrpb-existing-queries__title"><?= _x( 'Existing Queries:', 'backend', 'twrp' ) ?></h3>
			<?php
			do_action( 'twrp_before_displaying_existing_queries_table' );
			$existing_queries_table->display();
			$this->display_existing_queries_add_new_btn();
			do_action( 'twrp_after_displaying_existing_queries_table' );
			?>
		</div>
		<?php
	}

	/**
	 * Return the url to edit a query. If query doesn't exist it will
	 * return the tab link.
	 *
	 * @param int|string $query_id The ID.
	 *
	 * @return string
	 */
	public function get_query_edit_link( $query_id ) {
		$tab_url = Settings_Menu::get_tab_url( $this );

		if ( Query_Options::query_exists( $query_id ) ) {
			return add_query_arg( self::EDIT_QUERY__URL_PARAM_KEY, (string) $query_id, $tab_url );
		}

		return $tab_url;
	}

	/**
	 * Return the url to delete a query. If query doesn't exist it will
	 * return the tab link.
	 *
	 * @param int|string $query_id The ID.
	 *
	 * @return string
	 */
	public function get_query_delete_link( $query_id ) {
		$tab_url = Settings_Menu::get_tab_url( $this );

		if ( Query_Options::query_exists( $query_id ) ) {
			$url = add_query_arg( self::DELETE_QUERY__URL_PARAM_KEY, (string) $query_id, $tab_url );
			$url = add_query_arg( self::NONCE_DELETE_NAME, wp_create_nonce( self::NONCE_DELETE_ACTION ), $url );
			return $url;
		}

		return $tab_url;
	}

	/**
	 * Display a button to add a new query. Used on the existed queries page.
	 *
	 * @return void
	 */
	protected function display_existing_queries_add_new_btn() {
		$add_btn_icon = '<span class="twrpb-existing-queries__add-btn-icon dashicons dashicons-plus"></span>';
		?>
		<a class="twrpb-existing-queries__btn button button-primary button-large" href=<?= esc_url( $this->get_new_query_link() ); ?>>
			<?php
				/* translators: %s: plus dashicon html. */
				echo sprintf( _x( '%s Add New Query', 'backend', 'twrp' ), $add_btn_icon ); // phpcs:ignore -- No XSS.
			?>
		</a>
		<?php
	}

	/**
	 * Return the url to add a new query.
	 *
	 * @return string
	 */
	protected function get_new_query_link() {
		$add_new_link = Settings_Menu::get_tab_url( $this );
		$add_new_link = add_query_arg( self::EDIT_QUERY__URL_PARAM_KEY, '', $add_new_link );

		return $add_new_link;
	}

	/**
	 * Check to see if a deleted button of a query has been clicked.
	 *
	 * @return bool True if has been clicked, false otherwise.
	 */
	protected function delete_button_clicked() {
		if ( isset( $_GET[ self::DELETE_QUERY__URL_PARAM_KEY ] ) ) { // phpcs:ignore -- Nonce verified.
			return true;
		}

		return false;
	}

	/**
	 * Verify if the nonce of the deleted query is valid.
	 *
	 * @return bool
	 */
	protected function verify_delete_nonce() {
		if ( isset( $_GET[ self::NONCE_DELETE_NAME ] ) ) {
			$nonce_value = sanitize_key( (string) $_GET[ self::NONCE_DELETE_NAME ] );
			$nonce_check = wp_verify_nonce( $nonce_value, self::NONCE_DELETE_ACTION );
			if ( 1 === $nonce_check ) {
				return true;
			}
		}

		return false;
	}

	/**
	 * Delete the query when the button is clicked.
	 *
	 * @return void
	 */
	protected function execute_delete_query_action() {
		if ( isset( $_GET[ self::DELETE_QUERY__URL_PARAM_KEY ] ) ) { // phpcs:ignore -- Nonce verified and input sanitized.
			$key = wp_unslash( $_GET[ self::DELETE_QUERY__URL_PARAM_KEY ] ); // phpcs:ignore -- Nonce verified and input sanitized.
			if ( ! is_string( $key ) ) {
				return;
			}
			$key = sanitize_key( $key ); // phpcs:ignore -- Nonce verified and input sanitized.

			if ( Query_Options::query_exists( $key ) ) {
				Query_Options::delete_query( $key );
			}
		}
	}

	#endregion -- Existing Queries Table Methods


	/**
	 * Display the form to add a new query or to modify a pre-existed query.
	 *
	 * @return void
	 */
	protected function display_query_form() {
		$query_settings_display = new Modify_Query_Settings()
		?>
		<div class="twrpb-query-settings">
			<form action="<?= esc_url( $this->get_edit_query_form_action() ); ?>" method="post">
				<?php $query_settings_display->display(); ?>
				<?php wp_nonce_field( self::NONCE_EDIT_ACTION, self::NONCE_EDIT_NAME ); ?>
				<button name="<?= esc_attr( self::SUBMIT_BTN_NAME ) ?>" value="<?= esc_attr( self::SUBMIT_BTN_NAME ) ?>" type="submit"><?= _x( 'Submit', 'backend', 'twrp' ); ?></button>
			</form>
		</div>
		<?php
	}

	/**
	 * Check to see if the user is currently editing a query.
	 *
	 * @return bool
	 */
	protected function edit_query_screen_is_displayed() {
		// phpcs:ignore -- No need for sanitization
		if ( isset( $_GET[ self::EDIT_QUERY__URL_PARAM_KEY ] ) ) {
			return true;
		}

		return false;
	}

	/**
	 * Returns the ID of the query being modified. Returns an empty string if
	 * a new query is added.
	 *
	 * @return string The ID of the query being modified, or an empty string.
	 */
	public function get_id_of_query_being_modified() {
		if ( isset( $_GET[ self::EDIT_QUERY__URL_PARAM_KEY ] ) ) { // phpcs:ignore -- Nonce verified.
			// phpcs:ignore WordPress.Security -- The setting is sanitized below.
			$key = wp_unslash( $_GET[ self::EDIT_QUERY__URL_PARAM_KEY ] );

			if ( is_numeric( $key ) && Query_Options::query_exists( $key ) ) {
				return $key;
			}
		}

		return '';
	}

	/**
	 * Get the HTML form action attribute(URL).
	 *
	 * @return string
	 */
	protected function get_edit_query_form_action() {
		return $this->get_query_edit_link( $this->get_id_of_query_being_modified() );
	}

	/**
	 * Whether or not the user have submitted the form.
	 *
	 * @return bool
	 */
	protected function form_has_been_submitted() {
		// phpcs:ignore -- Nonce verified.
		if ( isset( $_POST[ self::SUBMIT_BTN_NAME ] ) && self::SUBMIT_BTN_NAME === $_POST[ self::SUBMIT_BTN_NAME ] ) {
			return true;
		}

		return false;
	}

	/**
	 * Verify if the nonce from the edit query screen is valid.
	 *
	 * @return bool True if is valid, false otherwise.
	 */
	protected function edit_nonce_is_valid() {
		if ( isset( $_POST[ self::NONCE_EDIT_NAME ] ) ) {
			$nonce_value = sanitize_key( (string) $_POST[ self::NONCE_EDIT_NAME ] );
			$nonce_check = wp_verify_nonce( $nonce_value, self::NONCE_EDIT_ACTION );
			if ( 1 === $nonce_check ) {
				return true;
			}
		}

		return false;
	}

}
