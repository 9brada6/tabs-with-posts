<?php

namespace TWRP;

use TWRP\Manage_Component_Classes;

class Templates
{

    /**
     * Display an article based on the article block id and a post object.
     *
     * @param string   $articleBlockId The article id to be displayed.
     * @param \WP_Post $postToDisplay The post.
     *
     * @throws \InvalidArgumentException If a $post is not valid, or if template name is not valid.
     *
     * @return void
     */
    public static function displayPost($articleBlockId, $postToDisplay)
    {
        global $post;
        $postToDisplay = get_post($postToDisplay);
        if (! $postToDisplay) {
            throw new \InvalidArgumentException('A post couldn\'t be found.');
        }

        $style = Manage_Component_Classes::get_style_class_by_name($articleBlockId);

        // Set global $post to the new post.
        $post = $postToDisplay; // phpcs:ignore --  The global $post will be restored.
        setup_postdata($postToDisplay); // @phan-suppress-current-line PhanPartialTypeMismatchArgument

        $style->include_template();

        // Restore previous global $post.
        wp_reset_postdata();
    }
}
