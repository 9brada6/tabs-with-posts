<?php
/**
 * Define the class Settings_Menu. See the class doc for more info.
 *
 * @todo: Remove query arg from url for the default tab.
 * @todo: Check if users have capability to see the post.
 *
 * @package Tabs_With_Recommended_Posts
 */

namespace TWRP\Admin;

use TWRP\Admin\Tabs\Interface_Admin_Menu_Tab;

/**
 * Class for creating the Plugin Settings.
 *
 * These settings are added as a submenu page, to the "Settings" Admin Menu.
 *
 * This Page will have multiple tabs, to add a tab use the static function
 * TWRP\Admin\Settings_Menu::add_tab( 'tab_name' ), usually at "admin_menu"
 * action. The class that implements a tab must have the
 * \TWRP\Admin\Tabs\Interface_Admin_Menu_Tab interface.
 */
class Settings_Menu {

	/**
	 * Holds the ID of the WordPress submenu. The submenu is added to
	 * "Settings" menu.
	 *
	 * @var string
	 */
	const MENU_SLUG = 'tabs_with_recommended_posts';

	/**
	 * Key of the URL parameter that holds each tab value.
	 *
	 * @var string
	 */
	const TAB__URL_PARAMETER_KEY = 'tab';

	/**
	 * Holds all the HTML attribute classes to display the HTML.
	 *
	 * ID => HTML classes.
	 *
	 * @var array
	 */
	const CLASSES = array(
		'page'                => 'twrp-admin wrap',
		'tab-btns-wrapper'    => 'twrp-admin__tabs nav-tab-wrapper',
		'tab-btn'             => 'twrp-admin__tab-btn nav-tab',
		'tab-btn-active'      => 'twrp-admin__tab-btn--active nav-tab-active',
		'tab-content-wrapper' => 'twrp-admin__tab-content',
	);

	/**
	 * Holds all tabs.
	 *
	 * The tabs can be added via 'admin_menu' hook. The default plugin tabs are initialized at 5,6,7 priority.
	 *
	 * @var array<Interface_Admin_Menu_Tab>
	 */
	protected static $tabs = array();

	/**
	 * Add a new tab to be displayed in the settings.
	 *
	 * @param string $tab_class The name of a class that implements Interface_Admin_Menu_Tab interface.
	 *
	 * @return bool Whether or not the tab has been successfully added.
	 */
	public static function add_tab( $tab_class ) {
		if ( class_exists( $tab_class ) ) {
			$tab_class = new $tab_class();
			if ( $tab_class instanceof Interface_Admin_Menu_Tab ) {
				array_push( self::$tabs, new $tab_class() );
				return true;
			}
		}

		return false;
	}

	/**
	 * Main static function, displays the whole page.
	 *
	 * Static function to be used via add_options_page() or equivalent.
	 *
	 * @return void
	 */
	public static function display_admin_page_hook() {
		$class = new Settings_Menu();
		$class->display_admin_page();
	}

	/**
	 * Main function, displays the whole page.
	 *
	 * @return void
	 */
	public function display_admin_page() {
		?>
		<div class="<?= esc_attr( self::CLASSES['page'] ) ?>">
			<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
			<?php $this->display_tab_buttons(); ?>
			<?php $this->display_active_tab(); ?>
		</div>
		<?php
	}

	/**
	 * Display the main tab buttons selection.
	 *
	 * @return void
	 */
	protected function display_tab_buttons() {
		?>
			<div class="<?= esc_attr( self::CLASSES['tab-btns-wrapper'] ) ?>">
				<?php foreach ( self::$tabs as $tab ) : ?>
					<a href="<?= esc_url( self::get_tab_url( $tab ) ) ?>" class="<?= esc_attr( $this->get_tab_class_attribute( $tab ) ) ?>">
						<?= $this->get_tab_title( $tab ); // phpcs:ignore -- "Feature" to add icons. ?>
					</a>
				<?php endforeach; ?>
			</div>
		<?php
	}

	/**
	 * Display the content of the active tab.
	 *
	 * @return void
	 */
	protected function display_active_tab() {
		$active_tab = $this->get_active_tab();
		?>
		<div class="<?= esc_attr( self::CLASSES['tab-content-wrapper'] ) ?>">
			<?php $active_tab->display_tab(); ?>
		</div>
		<?php
	}


	/**
	 * Return the URL to the specific tab. The url is not sanitized.
	 *
	 * @param Interface_Admin_Menu_Tab $tab_class The tab to create the URL.
	 *
	 * @return string The URL, not sanitized.
	 */
	public static function get_tab_url( $tab_class ) {
		$url_arg     = $tab_class->get_tab_url_arg();
		$submenu_url = menu_page_url( self::MENU_SLUG, false );

		return add_query_arg( self::TAB__URL_PARAMETER_KEY, $url_arg, $submenu_url );
	}

	/**
	 * Get the HTML class attribute of a specific tab button.
	 *
	 * @param Interface_Admin_Menu_Tab $tab_class The tab to create the attribute.
	 *
	 * @return string
	 */
	protected function get_tab_class_attribute( $tab_class ) {
		$default_class = self::CLASSES['tab-btn'];

		if ( self::is_tab_active( $tab_class ) ) {
			$default_class .= ' ' . self::CLASSES['tab-btn-active'];
		}

		return $default_class;
	}

	/**
	 * Return the tab title.
	 *
	 * @param Interface_Admin_Menu_Tab $tab_class The tab to retrieve the title.
	 *
	 * @return string
	 */
	protected function get_tab_title( $tab_class ) {
		return $tab_class->get_tab_title();
	}


	/**
	 * Whether or not the tab is currently displayed.
	 *
	 * @param Interface_Admin_Menu_Tab $tab_class The tab to verify.
	 *
	 * @return bool
	 */
	public static function is_tab_active( $tab_class ) {
		if ( self::get_active_tab_arg() === $tab_class->get_tab_url_arg() ) {
			return true;
		}

		return false;
	}

	/**
	 * Get the url argument value, of the active tab.
	 *
	 * @return string
	 */
	public static function get_active_tab_arg() {
		$active_tab = self::get_active_tab();
		return $active_tab->get_tab_url_arg();
	}

	/**
	 * Get the active tab class.
	 *
	 * Usually you might need to call is_active_screen() first, to check if the
	 * admin submenu is selected.
	 *
	 * @return Interface_Admin_Menu_Tab The active tab class.
	 */
	public static function get_active_tab() {
		if ( ! self::is_active_screen() ) {
			return self::$tabs[0];
		}

		$active_tab = '';
		if ( isset( $_GET[ self::TAB__URL_PARAMETER_KEY ] ) ) { // phpcs:ignore WordPress.Security
			$active_tab = sanitize_key( $_GET[ self::TAB__URL_PARAMETER_KEY ] ); // phpcs:ignore WordPress.Security
		}

		foreach ( self::$tabs as $tab ) {
			if ( $tab->get_tab_url_arg() === $active_tab ) {
				return $tab;
			}
		}

		$default_tab = self::$tabs[0];
		return $default_tab;
	}

	/**
	 * Whether or not the option page for plugin is displayed.
	 *
	 * @return bool
	 */
	public static function is_active_screen() {
		$screen = get_current_screen();
		if ( isset( $screen, $screen->id ) && strpos( $screen->id, self::MENU_SLUG ) ) {
			return true;
		}

		return false;
	}

}