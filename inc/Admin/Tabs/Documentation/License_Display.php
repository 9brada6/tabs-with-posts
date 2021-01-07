<?php
/**
 * File containing the class with the same.
 */

namespace TWRP\Admin\Tabs\Documentation;

/**
 * Class that is used to display licenses of the external works, and the license
 * of this plugin.
 */
class License_Display {

	/**
	 * Get an array, where each value is an array with the license attributions.
	 *
	 * @return array<string,array{brand:string,title:string,license_url:string,license_link_description:string,description:string}>
	 */
	protected static function get_external_licenses_settings() {

		$mit_license_url        = 'https://opensource.org/licenses/MIT';
		$apache_v2_license_url  = 'https://www.apache.org/licenses/LICENSE-2.0';
		$gnu_v3_license_url     = 'https://www.gnu.org/licenses/gpl-3.0.en.html';
		$iconmonstr_license_url = 'https://iconmonstr.com/license/';
		$cc_by_sa_license_url   = 'https://creativecommons.org/licenses/by-sa/2.0/';
		$cc_zero_license_url    = '';

		$mit_license_text        = _x( 'MIT License', 'backend', 'twrp' );
		$apache_v2_license_text  = _x( 'Apache License Version 2.0', 'backend', 'twrp' );
		$gnu_v3_license_text     = _x( 'GNU General Public License Version 3', 'backend', 'twrp' );
		$iconmonstr_license_text = _x( 'IconMonstr License', 'backend', 'twrp' );
		$cc_by_sa_license_text   = _x( 'Attribution-ShareAlike 2.0 Generic (CC BY-SA 2.0) License', 'backend', 'twrp' );
		$cc_zero_license_text    = _x( 'Creative Commons Zero v1.0 Universal', 'backend', 'twrp' );

		/* translators: %1$s: icons brand name, %2$s: license name. */
		$icons_license_description = _x( '%1$s Icons are published under "%2$s", which grant the permission to be included in this plugin. Some icons may be modified in scale(increased to the margin of svg view box) and alignment(centered in svg view box), to be uniform displayed with other icons.', 'backend', 'twrp' );

		$external_licenses = array(
			'fontawesome'  => array(
				'brand'                    => 'FontAwesome',
				'title'                    => _x( 'FontAwesome Icons', 'backend', 'twrp' ),
				'license_url'              => $mit_license_url,
				'license_link_description' => $mit_license_text,
				'description'              => sprintf( $icons_license_description, 'FontAwesome', $mit_license_text ),
			),

			'google'       => array(
				'brand'                    => 'Google',
				'title'                    => _x( 'Google Icons', 'backend', 'twrp' ),
				'license_url'              => $apache_v2_license_url,
				'license_link_description' => $apache_v2_license_text,
				'description'              => sprintf( $icons_license_description, 'Google', $apache_v2_license_text ),
			),

			'dashicons'    => array(
				'brand'                    => 'Dashicons',
				'title'                    => 'Dashicons',
				'license_url'              => $gnu_v3_license_url,
				'license_link_description' => $gnu_v3_license_text,
				'description'              => sprintf( $icons_license_description, 'Dashicons', $gnu_v3_license_text ),
			),

			'foundation'   => array(
				'brand'                    => 'Foundation',
				'title'                    => _x( 'Foundation Icons', 'backend', 'twrp' ),
				'license_url'              => $mit_license_url,
				'license_link_description' => $mit_license_text,
				'description'              => sprintf( $icons_license_description, 'Foundation', $mit_license_text ),
			),

			'ionicons'     => array(
				'brand'                    => 'Ionicons',
				'title'                    => 'Ionicons',
				'license_url'              => $mit_license_url,
				'license_link_description' => $mit_license_text,
				'description'              => sprintf( $icons_license_description, 'Ionicons', $mit_license_text ),
			),

			'iconmonstr'   => array(
				'brand'                    => 'IconMonstr',
				'title'                    => 'IconMonstr',
				'license_url'              => $iconmonstr_license_url,
				'license_link_description' => $iconmonstr_license_text,
				'description'              => sprintf( $icons_license_description, 'IconMonstr', $iconmonstr_license_text ),
			),

			'captain-icon' => array(
				'brand'                    => 'Captain Icons',
				'title'                    => _x( 'Captain Icons', 'backend', 'twrp' ),
				'license_url'              => $cc_by_sa_license_url,
				'license_link_description' => $cc_by_sa_license_text,
				'description'              => sprintf( $icons_license_description, 'Captain', $cc_by_sa_license_text ),
			),

			'feather'      => array(
				'brand'                    => 'Feather',
				'title'                    => _x( 'Feather Icons', 'backend', 'twrp' ),
				'license_url'              => $mit_license_url,
				'license_link_description' => $mit_license_text,
				'description'              => sprintf( $icons_license_description, 'Feather', $mit_license_text ),
			),

			'jamicons'     => array(
				'brand'                    => 'Jam Icons',
				'title'                    => _x( 'Jam Icons', 'backend', 'twrp' ),
				'license_url'              => $mit_license_url,
				'license_link_description' => $mit_license_text,
				'description'              => sprintf( $icons_license_description, 'Jam', $mit_license_text ),
			),

			'linea'        => array(
				'brand'                    => 'Linea Icons',
				'title'                    => _x( 'Linea Icons', 'backend', 'twrp' ),
				'license_url'              => $cc_zero_license_url,
				'license_link_description' => $cc_zero_license_text,
				'description'              => sprintf( $icons_license_description, 'Linea', $cc_zero_license_text ),
			),

			'octicons'     => array(
				'brand'                    => 'Octicons',
				'title'                    => 'Octicons',
				'license_url'              => $mit_license_url,
				'license_link_description' => $mit_license_text,
				'description'              => sprintf( $icons_license_description, 'Octicons', $mit_license_text ),
			),

			'typicons'     => array(
				'brand'                    => 'Typicons',
				'title'                    => 'Typicons',
				'license_url'              => $cc_by_sa_license_url,
				'license_link_description' => $cc_by_sa_license_text,
				'description'              => sprintf( $icons_license_description, 'Typicons', $cc_by_sa_license_text ),
			),

		);

		return $external_licenses;
	}

	/**
	 * Display a list with all external programs used, and their licenses.
	 *
	 * @return void
	 */
	public static function display_external_licenses() {
		$licenses = self::get_external_licenses_settings();

		?>
		<div class="twrpb-licenses">
			<div class="twrpb-licenses__title-wrapper">
				<h2 class="twrpb-licenses__title"><?= esc_html( _x( 'Licenses and external programs used', 'backend', 'twrp' ) ); ?></h2>
			</div>

			<div class="twrpb-licenses__licenses-list">
				<?php
				foreach ( $licenses as $license ) {
					self::display_external_license( $license );
				}
				?>
			</div>
		</div>
		<?php
	}

	/**
	 * Display an external license info.
	 *
	 * @param array{brand:string,title:string,license_url:string,license_link_description:string,description:string} $license
	 * @return void
	 */
	protected static function display_external_license( $license ) {
		if ( ! isset( $license['brand'], $license['title'], $license['license_url'], $license['license_link_description'], $license['description'] ) ) {
			return;
		}

		?>
			<div class="twrpb-licenses__license">
				<h3 class="twrpb-licenses__license-title">
					<?= esc_html( $license['title'] ); ?>
				</h3>

				<div class="twrpb-licenses__license-description">
					<?= $license['description']; // phpcs:ignore -- It's a feature to include HTML. ?>
				</div>

				<div class="twrpb-licenses__license-link-wrapper">
					<?= esc_html( _x( 'License Link:', 'backend', 'twrp' ) ); ?>
					<a href="<?= esc_url( $license['license_link_description'] ); ?>" class="twrpb-licenses__license-link">
						<?= esc_html( $license['license_link_description'] ); ?>
					</a>
				</div>
			</div>
		<?php
	}
}