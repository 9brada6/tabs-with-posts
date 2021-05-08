<?php

if ( ! isset( $artblock ) ) {
	return;
}

?>

<article class="twrp-ys twrp-block <?php $artblock->the_block_class(); ?>">
	<div class="twrp-ys__thumbnail-container">
		<div class="twrp-thumbnail-wrapper twrp-ys__thumbnail-wrapper">
			<?php $artblock->display_post_thumbnail( 'thumbnail', array( 'class' => 'twrp-thumbnail twrp-ys__thumbnail' ) ); ?>
		</div>

		<?php if ( $artblock->one_or_more_meta_id_displayed( array( 5, 6 ) ) ) : ?>
		<div class="twrp-ys__thumbnail-meta-wrapper">
			<?php if ( $artblock->get_meta_displayed_name( 5 ) ) : ?>
				<span class="twrp-ys__meta twrp-ys__meta--5 twrp-ys__<?php $artblock->meta_suffix_class( 5 ); ?>"><?php $artblock->display_meta( 5 ); ?></span>
			<?php endif; ?>

			<?php if ( $artblock->get_meta_displayed_name( 6 ) ) : ?>
				<span class="twrp-ys__meta twrp-ys__meta--6 twrp-ys__<?php $artblock->meta_suffix_class( 6 ); ?>"><?php $artblock->display_meta( 6 ); ?></span>
			<?php endif; ?>
		</div>
		<?php endif; ?>
	</div>

	<div class="twrp-ys__right-presentation-wrapper">
		<a class="twrp-link-expand twrp-ys__link" href="<?php $artblock->the_permalink(); ?>">
			<?php $artblock->the_title( '<h3 class="twrp-ys__title">', '</h3>' ); ?>
		</a>

		<?php if ( $artblock->one_or_more_meta_id_displayed( array( 1, 2 ) ) ) : ?>
		<div class="twrp-ys__first-meta-wrapper twrp-ys__flex-meta-wrapper--<?php $artblock->meta_suffix_classes( array( 1, 2 ) ); ?>">
			<?php if ( $artblock->get_meta_displayed_name( 1 ) ) : ?>
				<span class="twrp-ys__meta twrp-ys__meta--1 twrp-ys__<?php $artblock->meta_suffix_class( 1 ); ?>"><?php $artblock->display_meta( 1 ); ?></span>
			<?php endif; ?>

			<?php if ( $artblock->get_meta_displayed_name( 2 ) ) : ?>
				<span class="twrp-ys__meta twrp-ys__meta--2 twrp-ys__<?php $artblock->meta_suffix_class( 2 ); ?>"><?php $artblock->display_meta( 2 ); ?></span>
			<?php endif; ?>
		</div>
		<?php endif; ?>

		<?php if ( $artblock->one_or_more_meta_id_displayed( array( 3, 4 ) ) ) : ?>
		<div class="twrp-ys__second-meta-wrapper twrp-ys__flex-meta-wrapper--<?php $artblock->meta_suffix_classes( array( 3, 4 ) ); ?>">
			<?php if ( $artblock->get_meta_displayed_name( 3 ) ) : ?>
				<span class="twrp-ys__meta twrp-ys__meta--3 twrp-ys__<?php $artblock->meta_suffix_class( 3 ); ?>"><?php $artblock->display_meta( 3 ); ?></span>
			<?php endif; ?>

			<?php if ( $artblock->get_meta_displayed_name( 4 ) ) : ?>
				<span class="twrp-ys__meta twrp-ys__meta--4 twrp-ys__<?php $artblock->meta_suffix_class( 4 ); ?>"><?php $artblock->display_meta( 4 ); ?></span>
			<?php endif; ?>
		</div>
		<?php endif; ?>
	</div>
</article>
