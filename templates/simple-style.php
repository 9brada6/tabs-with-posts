<?php
/**
 * The settings are sanitized, and all keys should be set as declared in
 * Article_Block::sanitize_widget_settings() function.
 */

if ( ! isset( $settings ) ) {
	return;
}
?>

<div class="twrp-ss">
	<?php the_title( '<p class="h3 twrp-ss__title">', '</p>' ); ?>
	<?php if ( $settings['display_author'] ) : ?>
		<?php the_author(); ?>
	<?php endif; ?>

</div>
