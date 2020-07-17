<?php
/**
 * File that contains the class with the same name.
 */

namespace TWRP;

use TWRP\TWRP_Widget\Widget;
use TWRP\Article_Blocks_Manager;

class Create_Tabs {

	/**
	 * @var int
	 */
	protected $widget_id = 0;

	protected $query_ids = array();

	/**
	 * @param int $widget_id
	 */
	public function __construct( $widget_id ) {
		if ( ! is_numeric( $widget_id ) || ! Widget::widget_id_exists( $widget_id ) ) {
			$this->widget_id = 0;
		} else {
			$this->widget_id = (int) $widget_id;
			$this->query_ids = Widget::get_selected_queries( $this->widget_id );
		}
	}

	public function display_tabs() {
		if ( 0 === $this->widget_id ) {
			return;
		}

		?>
		<div>
			<div>
				<?php foreach ( $this->query_ids as $query_id ) : ?>
					<button>
						<?= Widget::get_query_tab_button_title( $this->widget_id, $query_id ); // phpcs:ignore -- No escape, this is a feature. ?>
					</button>
				<?php endforeach; ?>
			</div>
			<div>
				<?php
				foreach ( $this->query_ids as $query_id ) {
					$this->display_query( $query_id );
				}
				?>
			</div>
		</div>
		<?php
	}

	protected function display_query( $query_id ) {
		global $post;

		try {
			$artblock_id = Widget::get_selected_artblock_id( $this->widget_id, $query_id );
			$settings    = Widget::get_query_instance_settings( $this->widget_id, $query_id );
			$artblock    = Article_Blocks_Manager::construct_class_by_name_or_id( $artblock_id, $this->widget_id, $query_id, $settings );
			$query_posts = Get_Posts::get_posts_by_query_id( $query_id );
			$settings    = $artblock->sanitize_widget_settings();
		} catch ( \RuntimeException $e ) {
			return;
		}

		foreach ( $query_posts as $query_post ) {
			$post = $query_post; // phpcs:ignore -- We reset it.
			setup_postdata( $query_post );
			$artblock->include_template( $settings );
		}
		wp_reset_postdata();
	}
}
