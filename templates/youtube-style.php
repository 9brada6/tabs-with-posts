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

		<?php if ( $artblock->one_or_more_meta_id_displayed( array( 1, 2 ) ) ) : ?>
		<div class="twrp-ys__first-meta-wrapper">
			<?php if ( $artblock->get_meta_displayed_name( 1 ) ) : ?>
				<span class="twrp-ys__meta twrp-ys__<?php $artblock->meta_suffix_class( 1 ); ?>"><?php $artblock->display_meta( 1 ); ?></span>
			<?php endif; ?>

			<?php if ( $artblock->get_meta_displayed_name( 2 ) ) : ?>
				<span class="twrp-ys__meta twrp-ys__<?php $artblock->meta_suffix_class( 2 ); ?>"><?php $artblock->display_meta( 2 ); ?></span>
			<?php endif; ?>
		</div>
		<?php endif; ?>

		<?php if ( $artblock->one_or_more_meta_id_displayed( array( 3, 4 ) ) ) : ?>
		<div class="twrp-ys__second-meta-wrapper">
			<?php if ( $artblock->get_meta_displayed_name( 3 ) ) : ?>
				<span class="twrp-ys__meta twrp-ys__<?php $artblock->meta_suffix_class( 3 ); ?>"><?php $artblock->display_meta( 3 ); ?></span>
			<?php endif; ?>

			<?php if ( $artblock->get_meta_displayed_name( 4 ) ) : ?>
				<span class="twrp-ys__meta twrp-ys__<?php $artblock->meta_suffix_class( 4 ); ?>"><?php $artblock->display_meta( 4 ); ?></span>
			<?php endif; ?>
		</div>
		<?php endif; ?>
	</div>

</article>
