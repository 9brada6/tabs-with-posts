<?php

declare( strict_types = 1 );

namespace TWRP\Admin\Tabs;

use TWRP\Admin\Settings_Menu;
use TWRP\DB_Query_Options;
use TWRP\Manage_Component_Classes;


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
	 * This value should be the same as TWRP\Query_Setting\Query_Name::get_setting_name().
	 */
	const QUERY_NAME = 'tab_name';

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
			if ( $this->verify_edit_nonce() ) {
				$this->update_form_submitted_settings();
				/**
				 * @todo
				 */
				echo _x( 'Settings saved', 'backend', 'twrp' );
				$this->display_existing_queries();
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
			$this->display_existing_queries();
		}
	}

	// =========================================================================

	/**
	 * Creates a table that display the existing queries.
	 *
	 * @return void
	 */
	protected function display_existing_queries() {
		$existing_queries = DB_Query_Options::get_all_queries();

		$edit_icon    = '<span class="twrp-queries-table__edit-icon dashicons dashicons-edit"></span>';
		$delete_icon  = '<span class="twrp-existing-queries__delete-icon dashicons dashicons-trash"></span>';
		$add_btn_icon = '<span class="twrp-existing-queries__add-btn-icon dashicons dashicons-plus"></span>';

		// todo: delete.
		var_dump( \TWRP\Get_Posts::get_wp_query_arguments( 6 ) );
		var_dump( post_type_exists( 'monitor' ) );
		?>
		<div class="twrp-existing-queries">
			<h3 class="twrp-existing-queries__title"><?= _x( 'Existing Queries:', 'backend', 'twrp' ) ?></h3>

			<table class="twrp-existing-queries__table twrp-queries-table wp-list-table widefat striped">
				<thead>
					<tr>
						<th class="twrp-queries-table__edit-head">
							<?= _x( 'Actions', 'backend', 'twrp' ) ?>
						</th>
						<th class="twrp-queries-table__title-head"><?= _x( 'Query Name', 'backend', 'twrp' ); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php if ( ! empty( $existing_queries ) ) : ?>
						<?php foreach ( $existing_queries as $query_id => $query ) : ?>
							<tr>
								<td class="twrp-queries-table__edit-col">
									<a class="twrp-queries-table__delete-link" href="<?= esc_url( $this->get_query_delete_link( $query_id ) ); ?>">
										<?php
											/* translators: %s: delete dashicon html. */
											echo sprintf( _x( 'Delete', 'backend', 'twrp' ), $delete_icon ); // phpcs:ignore
										?>
									</a>
									/
									<a class="twrp-queries-table__edit-link" href="<?= esc_url( $this->get_query_edit_link( $query_id ) ); ?>">
										<?php
											/* translators: %s: edit dashicon html. */
											echo sprintf( _x( 'Edit', 'backend', 'twrp' ), $edit_icon ); // phpcs:ignore
										?>
									</a>
								</td>
								<td class="twrp-queries-table__title-col">
									<?php
									if ( isset( $query[ self::QUERY_NAME ] ) ) {
										echo esc_html( $query[ self::QUERY_NAME ] );
									} else {
										echo esc_html( 'Query-' . $query_id );
									}
									?>
								</td>
							</tr>
						<?php endforeach; ?>
					<?php else : ?>
						<tr>
							<td class="twrp-queries-table__no-queries-col" colspan="2">
							<?= _x( 'No queries added', 'backend', 'twrp' ); ?>
							</td>
						</tr>
					<?php endif; ?>
				</tbody>
			</table>

			<a class="twrp-existing-queries__btn button button-primary button-large" href=<?= esc_url( $this->get_new_query_link() ); ?>>
				<?php
					/* translators: %s: plus dashicon html. */
					echo sprintf( _x( '%s Add New Query', 'backend', 'twrp' ), $add_btn_icon ); // phpcs:ignore
				?>
			</a>
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
	protected function get_query_edit_link( $query_id ) {
		$tab_url = Settings_Menu::get_tab_url( $this );

		if ( DB_Query_Options::query_exists( $query_id ) ) {
			return add_query_arg( self::EDIT_QUERY__URL_PARAM_KEY, $query_id, $tab_url );
		}

		return $tab_url;
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

	// =========================================================================

	/**
	 * Display the form to add a new query or to modify a pre-existed query.
	 *
	 * @return void
	 */
	protected function display_query_form() {
		$setting_classes = Manage_Component_Classes::get_registered_backend_settings();
		$query_id        = $this->get_id_of_query_being_modified();
		?>
		<div class="twrp-posts-queries-tab">
			<form action="<?= esc_url( $this->get_edit_query_form_action() ); ?>" method="post">
				<?php foreach ( $setting_classes as $setting_class ) : ?>
					<?php
					$current_settings = DB_Query_Options::get_all_query_settings( $query_id );

					if ( isset( $current_settings[ $setting_class->get_setting_name() ] ) ) {
						$current_setting = $current_settings[ $setting_class->get_setting_name() ];
					} else {
						$current_setting = null;
					}

					$collapsed = $setting_class->setting_is_collapsed() ? '1' : '0';
					?>

					<div class="twrp-posts-queries-tab__setting twrp-collapsible" data-twrp-is-collapsed="<?= esc_attr( $collapsed ) ?>">
						<h2 class="twrp-collapsible__title">
							<span class="twrp-collapsible__indicator"></span>
							<?= $setting_class->get_title(); // phpcs:ignore -- No need to escape title. ?>
						</h2>
						<div class="twrp-collapsible__content">
							<?php $setting_class->display_setting( $current_setting ); ?>
						</div>
					</div>
				<?php endforeach ?>

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
		// phpcs:ignore
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
	protected function get_id_of_query_being_modified() {
		if ( isset( $_GET[ self::EDIT_QUERY__URL_PARAM_KEY ] ) ) { // phpcs:ignore -- Nonce verified.
			// phpcs:ignore WordPress.Security -- The setting is sanitized.
			$key = wp_unslash( $_GET[ self::EDIT_QUERY__URL_PARAM_KEY ] );

			if ( is_numeric( $key ) && DB_Query_Options::query_exists( $key ) ) {
				return $key;
			}
		}

		return '';
	}

	/**
	 * Get the form action(URL) of the edit/add query settings.
	 *
	 * @return string
	 */
	protected function get_edit_query_form_action() {
		$url = Settings_Menu::get_tab_url( $this );
		$url = add_query_arg( self::EDIT_QUERY__URL_PARAM_KEY, $this->get_id_of_query_being_modified(), $url );
		return $url;
	}

	/**
	 * Whether or not the user have submitted the form.
	 *
	 * @return bool
	 */
	protected function form_has_been_submitted() {
		// phpcs:ignore
		if ( isset( $_POST[ self::SUBMIT_BTN_NAME ] ) && self::SUBMIT_BTN_NAME === $_POST[ self::SUBMIT_BTN_NAME ] ) {
			return true;
		}

		return false;
	}

	/**
	 * Add a new query settings, or updates a query when the form is submitted.
	 *
	 * @return void
	 */
	protected function update_form_submitted_settings() {
		$setting_classes = Manage_Component_Classes::get_registered_backend_settings();

		$query_key      = $this->get_id_of_query_being_modified();
		$query_settings = array();

		foreach ( $setting_classes as $setting_class ) {
			$query_settings[ $setting_class->get_setting_name() ] = $setting_class->get_submitted_sanitized_setting();
		}

		if ( '' === $query_key ) {
			DB_Query_Options::add_new_query( $query_settings );
		} elseif ( DB_Query_Options::query_exists( $query_key ) ) {
			DB_Query_Options::update_query( $query_key, $query_settings );
		}
	}


	protected function verify_edit_nonce() {
		if ( isset( $_POST[ self::NONCE_EDIT_NAME ] ) ) {
			$nonce_value = sanitize_key( $_POST[ self::NONCE_EDIT_NAME ] );
			$nonce_check = wp_verify_nonce( $nonce_value, self::NONCE_EDIT_ACTION );
			if ( 1 === $nonce_check ) {
				return true;
			}
		}

		return false;
	}

	// =========================================================================

	/**
	 * Return the url to delete a query. If query doesn't exist it will
	 * return the tab link.
	 *
	 * @param int|string $query_id The ID.
	 *
	 * @return string
	 */
	protected function get_query_delete_link( $query_id ) {
		$tab_url = Settings_Menu::get_tab_url( $this );

		if ( DB_Query_Options::query_exists( $query_id ) ) {
			$url = add_query_arg( self::DELETE_QUERY__URL_PARAM_KEY, $query_id, $tab_url );
			$url = add_query_arg( self::NONCE_DELETE_NAME, wp_create_nonce( self::NONCE_DELETE_ACTION ), $url );
			return $url;
		}

		return $tab_url;
	}

	/**
	 * Check to see if a deleted button of a query has been clicked.
	 *
	 * @return bool True if has been clicked, false otherwise.
	 */
	protected function delete_button_clicked() {
		if ( isset( $_GET[ self::DELETE_QUERY__URL_PARAM_KEY ] ) ) { // phpcs:ignore
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
			$nonce_value = sanitize_key( $_GET[ self::NONCE_DELETE_NAME ] );
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
		if ( isset( $_GET[ self::DELETE_QUERY__URL_PARAM_KEY ] ) ) { // phpcs:ignore
			$key = sanitize_key( wp_unslash( $_GET[ self::DELETE_QUERY__URL_PARAM_KEY ] ) ); // phpcs:ignore
			if ( DB_Query_Options::query_exists( $key ) ) {
				DB_Query_Options::delete_query( $key );
			}
		}
	}

}
