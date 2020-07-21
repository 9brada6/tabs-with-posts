<?php
/**
 * The settings are sanitized, and all keys should be set as declared in
 * Article_Block::sanitize_widget_settings() function.
 */

if ( ! isset( $settings ) ) {
	return;
}

$title = get_the_title();
if ( empty( $title ) ) {
	return;
}



if ( isset( $settings['show_date_difference'] ) && $settings['show_date_difference'] ) {
	$from = get_post_timestamp();
	$to   = date_timestamp_get( current_datetime() );

	if ( false === $from ) {
		$date_text = '';
	} else {
		$date_text = sprintf( '%s ago', human_time_diff( $from, $to ) );
	}
} else {
	if ( empty( $settings['date_format'] ) ) {
		$settings['date_format'] = get_option( 'date_format' );
	}
	$date_text = get_the_time( $settings['date_format'] );
}



?>

<div class="twrp-ss">
	<a class="twrp-ss__link twrp-link-expand" href="<?php the_permalink(); ?>">
		<h3 class="twrp-ss__title">
			<?php the_title(); ?>
		</h3>
	</a>

		<?php if ( $settings['display_author'] ) : ?>
			<span class="twrp-ss__author">
				<?php the_author(); ?>
			</span>
		<?php endif; ?>

		<?php if ( $settings['display_date'] ) : ?>
			<span class="twrp-ss__date">
				<?= $date_text; // phpcs:ignore -- Safe XSS ?>
			</span>
		<?php endif; ?>

</div>
