<?php

class TWRP_Templates {

	/**
	 * Display a post block based on a style id and a post object.
	 *
	 * @param string   $post_block_style_id The style id to be displayed.
	 * @param \WP_Post $displayed_post The post.
	 *
	 * @throws InvalidArgumentException If a $post is not valid, or if template name is not valid.
	 *
	 * @return void
	 */
	public static function display_post( $post_block_style_id, $displayed_post ) {
		global $post;
		$displayed_post = get_post( $displayed_post );
		if ( ! $displayed_post ) {
			throw new InvalidArgumentException( 'A post couldn\'t be found.' );
		}

		$style = TWRP_Manage_Classes::get_style_class_by_name( $post_block_style_id );

		// Set global $post to the new post.
		$post = $displayed_post; // phpcs:ignore --  The global $post will be restored.
		setup_postdata( $displayed_post ); // @phan-suppress-current-line PhanPartialTypeMismatchArgument

		$style->include_template();

		// Restore previous global $post.
		wp_reset_postdata();
	}
}
