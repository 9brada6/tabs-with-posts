<?php

namespace TWRP\Admin\Tabs;

use TWRP\Plugins\Post_Views;
use TWRP\Plugins\Plugin_Info;

class Documentation_Tab implements Interface_Admin_Menu_Tab {
	public function display_tab() {
		?>
		<div class="twrp-documentation-page">
			<?php $this->display_views_plugin_support(); ?>
		</div>
		<?php
	}

	public static function get_tab_url_arg() {
		return 'documentation';
	}

	public static function get_tab_title() {
		return _x( 'Documentation', 'backend', 'twrp' );
	}

	/**
	 * Display a list of all support.
	 *
	 * @return void
	 */
	protected function display_views_plugin_support() {
		$plugin_classes = Post_Views::get_plugin_classes();
		$plugin_in_use  = Post_Views::get_plugin_to_use();
		?>
		<div class="twrp-plugins-support twrp-documentation-page__plugins-support twrp-plugins-support--views-plugin">
			<div class="twrp-plugins-support__plugins-list-title-wrap">
				<h2 class="twrp-plugins-support__plugins-list-title">
					<?= _x( 'Views plugin support', 'backend', 'twrp' ); ?>
				</h2>
			</div>

			<div class="twrp-plugins-support__plugins-list">
				<?php
				foreach ( $plugin_classes as $plugin ) {
					$this->display_plugin_info( $plugin, $plugin_in_use );
				}
				?>
			</div>
		</div>
		<?php
	}

	/**
	 * Display the support for a plugin.
	 *
	 * @param Plugin_Info $plugin
	 * @param Plugin_Info|false $plugin_in_use The plugin what is currently used.
	 * @return void
	 */
	protected function display_plugin_info( $plugin, $plugin_in_use ) {
		?>
		<div class="twrp-plugins-support__plugin">
			<div class="twrp-plugins-support__avatar-wrapper">
				<img src="<?= esc_url( $plugin::get_plugin_avatar_src() ) ?>" alt="<?= esc_attr( _x( 'Plugin avatar', 'backend image alt', 'twrp' ) ); ?>"/>
			</div>

			<div class="twrp-plugins-support__meta-wrapper">
				<h3 class="twrp-plugins-support__plugin-title"><?= esc_html( $plugin::get_plugin_title() ); ?></h3>

				<p class="twrp-plugins-support__plugin-author-wrap">
					<?= _x( 'Author:', 'backend', 'twrp' ) . ' ' . esc_html( $plugin::get_plugin_author() ); ?>
				</p>

				<p class="twrp-plugins-support__plugin-version-wrap">
					<?php
					echo _x( 'Installed Version:', 'backend', 'twrp' ) . ' ';
					$plugin_version = $plugin::get_plugin_version();
					if ( false === $plugin_version ) {
						echo '<span class="twrp-plugins-support__not-installed-text">';
						echo _x( 'Not Installed', 'backend', 'twrp' );
						echo '</span>';
					} else {
						echo esc_html( $plugin_version );

						if ( false === $plugin::is_installed_and_can_be_used() ) {
							echo '<span class="twrp-plugins-support__not-active-text">';
							echo ' (' . _x( 'Not Active', 'backend', 'twrp' ) . ')';
							echo '</span>';
						} elseif ( false !== $plugin_in_use && get_class( $plugin_in_use ) === get_class( $plugin ) ) {
							echo '<span class="twrp-plugins-support__used-text">';
							echo ' (' . _x( 'Used', 'backend', 'twrp' ) . ')';
							echo '</span>';
						}
					}
					?>
				</p>

				<p class="twrp-plugins-support__plugin-tested-version-wrap">
					<?= _x( 'Last tested version:', 'backend', 'twrp' ) . ' ' . esc_html( $plugin::get_last_tested_plugin_version() ); ?>
				</p>
			</div>
		</div>
		<?php
	}

}
