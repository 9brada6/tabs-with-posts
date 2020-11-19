<?php
/**
 * File that contains the class with the same name.
 */

namespace TWRP;

use TWRP\TWRP_Widget\Widget;
use RuntimeException;
use TWRP\Article_Block\Article_Block;
use TWRP\Query_Generator\Query_Generator;
use TWRP\Utils\Widget_Utils;

/**
 * Construct the tabs widget.
 *
 * The only way to set the settings for the tabs are through the WordPress widget.
 * We can pass a set of custom settings to this constructor, or pass the ones
 * defined in widget.
 */
class Create_Tabs {

	/**
	 * Holds the widget instance settings.
	 *
	 * @var array
	 */
	protected $instance_settings = array();

	/**
	 * Construct the object based on some widget settings.
	 *
	 * By default WordPress Widget classes are not intuitively very reasonable,
	 * we cannot pass a widget object, because the settings are stored in
	 * database and not in the object itself.
	 *
	 * @throws RuntimeException If widget id does not exist, or the instance
	 *                          settings might not be correct.
	 *
	 * @param int|array $widget_id_or_instance_settings The widget id by number,
	 * or the instance settings of a TWRP widget.
	 *
	 * @psalm-suppress DocblockTypeContradiction
	 */
	public function __construct( $widget_id_or_instance_settings ) {
		if ( is_int( $widget_id_or_instance_settings ) ) {
			$widget_id         = $widget_id_or_instance_settings;
			$instance_settings = Widget_Utils::get_instance_settings( $widget_id );
		} else {
			$instance_settings = $widget_id_or_instance_settings;
		}

		if ( empty( $instance_settings ) || ! is_array( $instance_settings ) ) {
			throw new RuntimeException();
		}

		$this->instance_settings = $instance_settings;
	}

	public function display_tabs() {
		if ( 0 === $this->widget_id ) {
			return;
		}
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
		$artblock_id = Widget_Utils::pluck_artblock_id( $this->instance_settings, $query_id );

		try {
			$artblock = Article_Block::construct_class_by_name_or_id( $artblock_id, $this->widget_id, $query_id, $this->instance_settings );
			$settings = $artblock->sanitize_widget_settings();
		} catch ( RuntimeException $e ) {
			throw new RuntimeException();
		}

		return $artblock;
	}
}
