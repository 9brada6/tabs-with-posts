<?php

use TWRP\Plugins\Known_Plugins\YASR_Rating_Plugin;

add_filter( 'the_content', 'twrp_test_yasr_overall_rating', 100 );

function twrp_test_yasr_overall_rating( $content ) {
	global $post;
	$post_id = $post->ID;

	$plugin_class = new YASR_Rating_Plugin();

	$votes = YasrDatabaseRatings::getOverallRating( ( $post_id ) );
	$votes = YasrDatabaseRatings::getVisitorVotes( ( $post_id ) );

	$votes = $plugin_class->get_rating_count( $post_id );

	$content .= 'TWRP Test, YASR Rating: ';
	$content .= do_shortcode( '[yasr_overall_rating size="medium"]' );

	// Else calculate multi-set average votes.
	$set_id = $plugin_class->try_to_get_visitors_multi_set_id( $post_id );
	$average_rating = YasrMultiSetData::returnMultiSetAverage( $post_id, $set_id, true );
	if ( is_numeric( $average_rating ) && $average_rating > 0 ) {
		// return (float) $average_rating;
	}

	return $content;
}
