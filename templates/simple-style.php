<?php

use TWRP\Article_Block\Simple_Article_Block;

if ( ! isset( $artblock ) && ! ( $artblock instanceof Simple_Article_Block ) ) {
	return;
}

if ( empty( get_the_title() ) ) {
	return;
}

?>

<div class="twrp-ss twrp-block <?php $artblock->the_block_class(); ?>">
	<a class="twrp-ss__link-expanded twrp-link-expand" href="<?php the_permalink(); ?>">
		<h3 class="twrp-ss__title">
			<?php the_title(); ?>
		</h3>
	</a>

	<?php if ( $artblock->thumbnail_exist_and_displayed() ) : ?>
		<div class="twrp-thumbnail-wrapper twrp-ss__thumbnail-wrapper">
			<?php the_post_thumbnail( 'medium', array( 'class' => 'twrp-thumbnail twrp-ss__thumbnail' ) ); ?>
		</div>
	<?php endif; ?>

	<div class="twrp-ss__meta-wrapper">
		<?php if ( $artblock->is_author_displayed() ) : ?>
			<span class="twrp-ss__meta twrp-ss__author">
				<?php $artblock->display_author_icon(); ?>
				<?php $artblock->display_the_author(); ?>
			</span>
		<?php endif; ?>

		<?php if ( $artblock->is_date_displayed() ) : ?>
			<span class="twrp-ss__meta twrp-ss__date">
				<?php $artblock->display_date_icon(); ?>
				<?php $artblock->display_the_date(); ?>
			</span>
		<?php endif; ?>

		<?php if ( $artblock->are_views_displayed() ) : ?>
			<span class="twrp-ss__meta twrp-ss__views">
				<?php $artblock->display_views_icon(); ?>
				<?php $artblock->display_the_views(); ?>
			</span>
		<?php endif; ?>

		<?php if ( $artblock->is_rating_displayed() ) : ?>
			<span class="twrp-ss__meta twrp-ss__rating">
				<?php // $artblock->include_rating_icon(); ?>
			</span>
		<?php endif; ?>

		<?php if ( $artblock->are_categories_displayed() ) : ?>
			<span class="twrp-ss__meta twrp-ss__categories">
				<?php // $artblock->include_rating_icon(); ?>
			</span>
		<?php endif; ?>

		<?php if ( $artblock->are_comments_displayed() ) : ?>
			<span class="twrp-ss__meta twrp-ss__comments">
			<?php $artblock->display_comments_icon(); ?>
			<?php $artblock->display_comments_number(); ?>
			</span>
		<?php endif; ?>
	</div>
</div>
