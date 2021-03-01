<?php

namespace TWRP\Admin\Tabs\Documentation;

use TWRP\Admin\Tabs\Documentation_Tab;
use TWRP\Plugins\Post_Views;
use TWRP\Plugins\Post_Rating;
use TWRP\Plugins\Known_Plugins\Known_Plugin;

use TWRP\Utils\Helper_Trait\BEM_Class_Naming_Trait;

/**
 * Class used to display the supported plugins in the documentation.
 */
class Plugin_Support_Docs {

	use BEM_Class_Naming_Trait;

	protected function get_bem_base_class() {
		$documentation_tab = new Documentation_Tab();
		return $documentation_tab->get_bem_base_class();
	}

	/**
	 * Display the other WP support of the plugins in the documentation.
	 *
	 * @return void
	 */
	public function display() {
		?>
		<div class="<?php $this->bem_class( 'text' ); ?> <?php $this->bem_class( 'text', 'full' ); ?>">
			<?php $this->display_views_plugin_support(); ?>
		</div>

		<div class="<?php $this->bem_class( 'text' ); ?> <?php $this->bem_class( 'text', 'full' ); ?>">
			<?php $this->display_rating_plugin_support(); ?>
		</div>
		<?php
	}

	/**
	 * Display a list of all views plugins support.
	 *
	 * @return void
	 */
	protected function display_views_plugin_support() {
		$plugin_classes = Post_Views::get_plugin_classes();
		$plugin_in_use  = Post_Views::get_plugin_to_use();
		?>
		<div class="<?php $this->bem_class( 'plugins-support' ); ?> <?php $this->bem_class( 'plugins-support', 'views-plugin' ); ?>">
			<h2 class="<?php $this->bem_class( 'title-section' ); ?>">
				<?= _x( 'Views plugin support', 'backend, documentation', 'twrp' ); ?>
			</h2>

			<div class="<?php $this->bem_class( 'plugins-list' ); ?>">
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
	 * Display a list of all rating plugins support.
	 *
	 * @return void
	 */
	protected function display_rating_plugin_support() {
		$plugin_classes = Post_Rating::get_plugin_classes();
		$plugin_in_use  = Post_Rating::get_plugin_to_use();
		?>
		<div class="<?php $this->bem_class( 'plugins-support' ); ?> <?php $this->bem_class( 'plugins-support', 'views-plugin' ); ?>">
			<h2 class="<?php $this->bem_class( 'title-section' ); ?>">
				<?= _x( 'Rating plugin support', 'backend, documentation', 'twrp' ); ?>
			</h2>

			<div class="<?php $this->bem_class( 'plugins-list' ); ?>">
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
	 * @param Known_Plugin $plugin
	 * @param Known_Plugin|false $plugin_in_use The plugin what is currently used.
	 * @return void
	 */
	protected function display_plugin_info( $plugin, $plugin_in_use ) {
		?>
		<div class="<?php $this->bem_class( 'docs-plugin' ); ?>">
			<div class="<?php $this->bem_class( 'plugin-avatar-wrapper' ); ?>">
				<img src="<?= esc_url( $plugin->get_plugin_avatar_src() ) ?>" alt="<?= esc_attr( _x( 'Plugin avatar', 'backend, documentation, screen reader', 'twrp' ) ); ?>"/>
			</div>

			<div class="<?php $this->bem_class( 'meta-wrapper' ); ?>">
				<h3 class="<?php $this->bem_class( 'plugin-title' ); ?>"><?= esc_html( $plugin->get_plugin_title() ); ?></h3>

				<p class="<?php $this->bem_class( 'plugin-author-wrap' ); ?>">
					<?= _x( 'Author:', 'backend, documentation', 'twrp' ) . ' ' . esc_html( $plugin->get_plugin_author() ); ?>
				</p>

				<p class="<?php $this->bem_class( 'plugin-version-wrap' ); ?>">
					<?php
					echo _x( 'Installed Version:', 'backend, documentation', 'twrp' ) . ' ';
					$plugin_version = $plugin->get_plugin_version();
					if ( false === $plugin_version ) {
						echo '<span class="' . esc_attr( $this->get_bem_class( 'plugin-not-installed-text' ) ) . '">';
						echo _x( 'Not Installed', 'backend, documentation', 'twrp' );
						echo '</span>';
					} else {
						echo esc_html( $plugin_version );

						if ( false === $plugin->is_installed_and_can_be_used() ) {
							echo '<span class="' . esc_attr( $this->get_bem_class( 'plugin-not-active-text' ) ) . '">';
							echo ' (' . _x( 'Not Active', 'backend, documentation', 'twrp' ) . ')';
							echo '</span>';
						} elseif ( ( false !== $plugin_in_use ) && ( get_class( $plugin_in_use ) === get_class( $plugin ) ) ) {
							echo '<span class="' . esc_attr( $this->get_bem_class( 'plugin-used-text' ) ) . '">';
							echo ' (' . _x( 'Used', 'backend, documentation', 'twrp' ) . ')';
							echo '</span>';
						}
					}
					?>
				</p>

				<p class="<?php $this->bem_class( 'plugin-tested-version-wrap' ); ?>">
					<?= _x( 'Last tested version:', 'backend, documentation', 'twrp' ) . ' ' . esc_html( $plugin->get_tested_plugin_versions() ); ?>
				</p>
			</div>
		</div>
		<?php
	}

}
