<?php

use TWRP\Article_Block\Blocks\Youtube_Article;

if ( ! isset( $artblock ) || ! ( $artblock instanceof Youtube_Article ) ) {
	return;
}

?>

<article class="twrp-ys twrp-block <?php $artblock->the_block_class(); ?>">
	<?php if ( $artblock->thumbnail_is_displayed() ) : ?>
		<div class="twrp-ys__thumbnail-container">
			<div class="twrp-thumbnail-wrapper twrp-ys__thumbnail-wrapper">
				<?php $artblock->display_post_thumbnail( 'medium', array( 'class' => 'twrp-thumbnail twrp-ys__thumbnail' ) ); ?>
			</div>
		</div>
	<?php endif; ?>

	<div class="twrp-ys__right-presentation-wrapper">
		<a class="twrp-link-expand twrp-ys__link-expanded" href="<?php $artblock->the_permalink(); ?>">
			<h3 class="twrp-ys__title">
				<?php $artblock->the_title(); ?>
			</h3>
		</a>

		<div class="twrp-ys__first-meta-wrapper">
			<?php if ( $artblock->are_views_displayed() ) : ?>
				<span class="twrp-ys__meta twrp-ys__views"><?php $artblock->display_views_icon(); ?> <?php $artblock->display_the_views(); ?></span>
			<?php endif; ?>

			<?php if ( $artblock->is_author_displayed() ) : ?>
				<span class="twrp-ys__meta twrp-ys__author"><?php $artblock->display_author_icon(); ?> <?php $artblock->display_the_author(); ?></span>
			<?php endif; ?>
		</div>

		<div class="twrp-ys__second-meta-wrapper">
			<?php if ( $artblock->is_rating_displayed() ) : ?>
				<span class="twrp-ys__meta twrp-ys__rating"><?php $artblock->display_rating_icon(); ?> <?php $artblock->display_rating(); ?></span>
			<?php endif; ?>

			<?php if ( $artblock->is_date_displayed() ) : ?>
				<span class="twrp-ys__meta twrp-ys__date"><?php $artblock->display_date_icon(); ?> <?php $artblock->display_the_date(); ?></span>
			<?php endif; ?>
		</div>
	</div>

</article>
