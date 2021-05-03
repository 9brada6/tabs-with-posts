<?php

if ( ! isset( $artblock ) ) {
	return;
}

?>

<article class="twrp-ms twrp-block <?php $artblock->the_block_class(); ?>">
	<a class="twrp-link-expand twrp-ms__link" href="<?php $artblock->the_permalink(); ?>">
		<?php $artblock->the_title( '<h3 class="twrp-ms__title">', '</h3>' ); ?>
	</a>

	<div class="twrp-ms__thumbnail-container">
		<div class="twrp-thumbnail-wrapper twrp-ms__thumbnail-wrapper">
			<?php $artblock->display_post_thumbnail( 'medium', array( 'class' => 'twrp-thumbnail twrp-ms__thumbnail' ) ); ?>
		</div>

		<?php if ( $artblock->one_or_more_meta_id_displayed( array( 7, 8 ) ) ) : ?>
			<div class="twrp-ms__top-meta-wrapper">
				<?php if ( $artblock->one_or_more_meta_id_displayed( array( 7 ) ) ) : ?>
					<div class="twrp-ms__top-left-meta">
						<span class="twrp-ms__meta twrp-ms__meta--7 twrp-ms__<?php $artblock->meta_suffix_class( 7 ); ?>"><?php $artblock->display_meta( 7 ); ?></span>
					</div>
				<?php endif; ?>

				<?php if ( $artblock->one_or_more_meta_id_displayed( array( 8 ) ) ) : ?>
					<div class="twrp-ms__top-right-meta">
						<span class="twrp-ms__meta twrp-ms__meta--8 twrp-ms__<?php $artblock->meta_suffix_class( 8 ); ?>"><?php $artblock->display_meta( 8 ); ?></span>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<?php if ( $artblock->one_or_more_meta_id_displayed( array( 1, 2, 3, 4, 5, 6 ) ) ) : ?>
			<div class="twrp-ms__bot-meta-wrapper">
				<?php if ( $artblock->one_or_more_meta_id_displayed( array( 1, 2, 3 ) ) ) : ?>
					<div class="twrp-ms__first-meta-wrapper">
						<?php if ( $artblock->get_meta_displayed_name( 1 ) ) : ?>
							<span class="twrp-ms__meta twrp-ms__meta--1 twrp-ms__<?php $artblock->meta_suffix_class( 1 ); ?>"><?php $artblock->display_meta( 1 ); ?></span>
						<?php endif; ?>

						<?php if ( $artblock->get_meta_displayed_name( 2 ) ) : ?>
							<span class="twrp-ms__meta twrp-ms__meta--2 twrp-ms__<?php $artblock->meta_suffix_class( 2 ); ?>"><?php $artblock->display_meta( 2 ); ?></span>
						<?php endif; ?>

						<?php if ( $artblock->get_meta_displayed_name( 3 ) ) : ?>
							<span class="twrp-ms__meta twrp-ms__meta--3 twrp-ms__<?php $artblock->meta_suffix_class( 3 ); ?>"><?php $artblock->display_meta( 3 ); ?></span>
						<?php endif; ?>
					</div>
				<?php endif; ?>

				<?php if ( $artblock->one_or_more_meta_id_displayed( array( 4, 5, 6 ) ) ) : ?>
					<div class="twrp-ms__second-meta-wrapper">
						<?php if ( $artblock->get_meta_displayed_name( 4 ) ) : ?>
							<span class="twrp-ms__meta twrp-ms__meta--4 twrp-ms__<?php $artblock->meta_suffix_class( 4 ); ?>"><?php $artblock->display_meta( 4 ); ?></span>
						<?php endif; ?>

						<?php if ( $artblock->get_meta_displayed_name( 5 ) ) : ?>
							<span class="twrp-ms__meta twrp-ms__meta--5 twrp-ms__<?php $artblock->meta_suffix_class( 5 ); ?>"><?php $artblock->display_meta( 5 ); ?></span>
						<?php endif; ?>

						<?php if ( $artblock->get_meta_displayed_name( 6 ) ) : ?>
							<span class="twrp-ms__meta twrp-ms__meta--6 twrp-ms__<?php $artblock->meta_suffix_class( 6 ); ?>"><?php $artblock->display_meta( 6 ); ?></span>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>
</article>
