<?php
/**
 * File that contains the class with the same name.
 */

namespace Tabs_Creator;

use TWRP\TWRP_Widget\Widget;
use RuntimeException;
use TWRP\Article_Block\Article_Block;
use TWRP\Query_Generator\Query_Generator;

class Tabs_Creator {

	/**
	 * @var int
	 */
	protected $widget_id = 0;

	/**
	 * @var int
	 */
	protected $widget_instance = null;

	protected $query_ids = array();

	public function display_tabs() {
		?>
		<style><?= $this->get_widget_css() ?></style>
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

	protected function get_widget_css() {
		$css = '';
		foreach ( $this->query_ids as $query_id ) {
			try {
				$artblock = $this->get_artblock( $query_id );
			} catch ( \RuntimeException $e ) {
				continue;
			}

			$css .= $artblock->get_css();
		}

		return $css;
	}

	protected function display_query( $query_id ) {
		global $post;

		try {
			$query_posts = Query_Generator::get_posts_by_query_id( $query_id );
			$artblock    = $this->get_artblock( $query_id );
			$artblock->sanitize_widget_settings();
		} catch ( \RuntimeException $e ) {
			return;
		}

		foreach ( $query_posts as $query_post ) {
			$post = $query_post; // phpcs:ignore -- We reset it.
			setup_postdata( $query_post );
			$artblock->include_template();
		}
		wp_reset_postdata();
	}

	/**
	 * Get the article block class for a query in the widget.
	 *
	 * @throws RuntimeException In case the needed Article_Block class does not
	 *                          exist.
	 *
	 * @param int $query_id
	 * @return Article_Block
	 */
	protected function get_artblock( $query_id ) {
		try {
			// $artblock_id = Widget::get_selected_artblock_id( $this->widget_id, $query_id );
			$settings = Widget::get_query_instance_settings( $this->widget_id, $query_id );
			$artblock = Article_Block::construct_class_by_name_or_id( $artblock_id, $this->widget_id, $query_id, $settings );
			$settings = $artblock->sanitize_widget_settings();
		} catch ( RuntimeException $e ) {
			throw new RuntimeException();
		}

		return $artblock;
	}
}
