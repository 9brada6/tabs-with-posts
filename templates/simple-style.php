<?php
/**
 * The settings are sanitized, and all keys should be set as declared in
 * Article_Block::sanitize_widget_settings() function.
 */

if ( ! isset( $settings, $widget_id, $query_id ) ) {
	return;
}

$block_class = 'twrp-block--' . $widget_id . '-' . $query_id;

$block_title = get_the_title();
if ( empty( $block_title ) ) {
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

<div class="twrp-ss twrp-block <?= esc_attr( $block_class ); ?>">
	<a class="twrp-ss__link twrp-link-expand" href="<?php the_permalink(); ?>">
		<h3 class="twrp-ss__title">
			<?php the_title(); ?>
		</h3>
	</a>

	<div class="twrp-ss__meta-wrapper">
		<?php if ( $settings['display_author'] ) : ?>
			<span class="twrp-ss__author">
				<?php if ( ! empty( $settings['author']['author_icon'] ) ) : ?>
					<?php TWRP\SVG_Manager::include_svg( $settings['author']['author_icon'], 'twrp-ss__author-icon' ); ?>
				<?php endif; ?>
				<?php the_author(); ?>
			</span>
		<?php endif; ?>

		<?php if ( $settings['display_date'] ) : ?>
			<span class="twrp-ss__date">
				<?php if ( ! empty( $settings['date']['date_icon'] ) ) : ?>
					<?php TWRP\SVG_Manager::include_svg( $settings['date']['date_icon'], 'twrp-ss__date-icon' ); ?>
				<?php endif; ?>
				<?= $date_text; // phpcs:ignore -- Safe XSS ?>
			</span>
		<?php endif; ?>

		<?php if ( $settings['display_views'] ) : ?>

		<?php endif; ?>

		<?php if ( $settings['display_rating'] ) : ?>

		<?php endif; ?>

		<?php if ( $settings['display_comments'] ) : ?>
			<span class="twrp-ss__comments">


			</span>
		<?php endif; ?>
	</div>
</div>
