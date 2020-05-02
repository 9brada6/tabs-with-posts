<?php
/**
 * File that contains a very simple interface for the article blocks to implement.
 *
 * @package Tabs_With_Recommended_Posts
 */

namespace TWRP\Article_Block;

/**
 * Interface that an article block should implement if they want to display
 * a nice preview of what the block can do.
 */
interface Article_Block_Preview {

	/**
	 * Display a preview of the article block. Usually it should be an image.
	 *
	 * @return void
	 */
	public function display_backend_preview();
}
