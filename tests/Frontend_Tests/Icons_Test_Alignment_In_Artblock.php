<?php
/**
 * Include this file to start testing.
 */

use TWRP\Icons\Icon_Factory;
use TWRP\Icons\Icon;
use TWRP\CSS\Icons_CSS;


add_filter( 'the_content', 'add_after_content_test_all_icons_alignment' );
add_filter( 'wp_head', array( Icons_CSS::class, 'include_all_icons_file' ) );

function add_after_content_test_all_icons_alignment( $content ) {
	if ( is_single() ) {
		$content .= test_all_icons_alignment();
	}
	return $content;
}

function test_all_icons_alignment() {

	$author_icons           = Icon_Factory::get_user_icons();
	$date_icons             = Icon_Factory::get_date_icons();
	$views_icons            = Icon_Factory::get_views_icons();
	$category_icons         = Icon_Factory::get_category_icons();
	$rating_icons           = Icon_Factory::get_rating_icons();
	$comment_icons          = Icon_Factory::get_comment_icons();
	$disabled_comment_icons = Icon_Factory::get_comment_disabled_icons();

	$author = reset( $author_icons );
	$date   = reset( $date_icons );
	$view   = reset( $views_icons );
	$cat    = reset( $category_icons );

	?>
	<div id="twrp-tab-2-1" class="twrp-tab-bs__content" role="tabpanel" aria-labelledby="twrp-tabby__twrp-tab-2-1">
	<?php

	foreach ( $comment_icons as $comment_icon ) {
		$disable_icon = Icon_Factory::get_compatible_disabled_comment_icon( $comment_icon );
		test_icon_alignment( $author, $comment_icon, $disable_icon, $comment_icon );
	}

	// foreach ( $disabled_comment_icons as $disabled_comment_icon ) {
	// test_icon_alignment( $author, $date, $disabled_comment_icon, $cat );
	// }

	// foreach ( $comment_icons as $comment_icon ) {
	// test_icon_alignment( $author, $date, $view, $comment_icon );
	// }

	// foreach ( $rating_icons as $rating_icon ) {
	// test_icon_alignment( $author, $date, $view, $rating_icon );
	// }

	// foreach ( $category_icons as $cat_icon ) {
	// test_icon_alignment( $author, $date, $view, $cat_icon );
	// }

	// foreach ( $views_icons as $view_icon ) {
	// test_icon_alignment( $author, $date, $view_icon, $cat );
	// }

	// foreach ( $date_icons as $date_icon ) {
	// test_icon_alignment( $author, $date_icon, $view, $cat );
	// }

	// foreach ( $author_icons as $author_icon ) {
	// test_icon_alignment( $author_icon, $date, $view, $cat );
	// }
	?>
	</div>
	<?php
}

/**
 *
 * @param Icon $author
 * @param Icon $date
 * @param Icon $views
 * @param Icon $category
 * @return void
 */
function test_icon_alignment( $author, $date, $views, $category ) {
	?>
	<article class="twrp-ss twrp-block twrp-block--2-1">
		<a class="twrp-link-expand twrp-ss__link" href="http://localhost/2018/11/03/block-image/">
			<h3 class="twrp-ss__title">Block: Image</h3>
		</a>

		<div class="twrp-ss__meta-wrapper">
			<span class="twrp-ss__meta twrp-ss__author"><?php $author->display(); ?> Theme</span>
			<span class="twrp-ss__meta twrp-ss__date"><?php $date->display(); ?> 2</span>
			<span class="twrp-ss__meta twrp-ss__views"><?php $views->display(); ?> 3</span>
			<span class="twrp-ss__meta twrp-ss__category"><?php $category->display(); ?> Block</span>
		</div>
	</article>
	<?php
}
