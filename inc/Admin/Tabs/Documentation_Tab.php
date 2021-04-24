<?php

namespace TWRP\Admin\Tabs;

use TWRP\Admin\Tabs\Documentation\License_Display;
use TWRP\Admin\Tabs\Documentation\Icons_Documentation;
use TWRP\Admin\Tabs\Documentation\Plugin_Support_Docs;
use TWRP\Admin\Tabs\Documentation\Tab_Queries_Docs;
use TWRP\Utils\Helper_Trait\BEM_Class_Naming_Trait;

/**
 * Display the documentation tab in the admin area.
 */
class Documentation_Tab extends Admin_Menu_Tab {

	use BEM_Class_Naming_Trait;

	public function display_tab() {
		?>
		<div class="<?php $this->bem_class(); ?>">

			<?php
				$plugin_support = new Plugin_Support_Docs();
				$plugin_support->display();
			?>

			<div class="<?php $this->bem_class( 'text' ); ?>">
				<?php
				$tab_queries_docs = new Tab_Queries_Docs();
				$tab_queries_docs->display();
				?>
			</div>

			<div class="<?php $this->bem_class( 'text' ); ?>">
				<?php
				$icons_documentation = new Icons_Documentation();
				$icons_documentation->display_icon_documentation();
				?>
			</div>

			<?php
			$license_docs = new License_Display();
			$license_docs->display_external_licenses();
			?>
		</div>
		<?php
	}

	public function get_tab_url_arg() {
		return 'documentation';
	}

	public function get_tab_title() {
		return _x( 'Documentation', 'backend', 'tabs-with-posts' );
	}

	public function get_bem_base_class() {
		return 'twrpb-docs';
	}
}
