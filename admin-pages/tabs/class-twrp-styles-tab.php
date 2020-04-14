<?php

class TWRP_Styles_Tab implements TWRP_Admin_Menu_Tab {

	public function display_tab() {
		$style_classes = TWRP_Manage_Classes::get_style_classes();

		?>
		<form method="post" action="<?= esc_url( TWRP_Admin_Settings_Submenu::get_tab_url( $this ) ) ?>">
			<div>
				<input type="text" name="style-name" />
			</div>
			<div>

				<h2>Settings:</h2>
				<div>
					<?php foreach ( $style_classes as $style_class ) : ?>
						<input type="radio" name="style" value="<?= esc_attr( $style_class->get_style_id() ); ?>" />
						<div>
							<h3>Style Title</h3>
							<p>Style description, not necessary.</p>
							<div>
								<?php $style_class->display_backend_style_preview(); ?>
							</div>
							<div>
								<?php $style_class->display_backend_settings(); ?>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
			<button type="submit" name="style-submit" value="submitted"><?= _x( 'Submit', 'backend', 'twrp' ); ?></button>
		</form>
		<?php
	}

	public static function get_tab_title() {
		return _x( 'Styles', 'backend', 'twrp' );
	}

	public static function get_tab_url_arg() {
		return 'styles';
	}

	public static function form_submitted() {

	}

}
