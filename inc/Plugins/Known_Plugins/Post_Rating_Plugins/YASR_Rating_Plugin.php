<?php

namespace TWRP\Plugins\Known_Plugins;

use Exception;
use YasrDatabaseRatings;
use TWRP\Utils\Simple_Utils;
use YasrMultiSetData;

/**
 * Class used to retrieve the ratings for YASR Rating Plugin.
 *
 * todo: say better how this plugin works.
 *
 * This plugin implements have multiple functions to return average ratings.
 * First it searches for authors/editors average rating, then it tries to
 * calculate the average rating, after it tries to calculate the multi-set
 * average. The multi-set is found by searching in the logs table.
 */
class YASR_Rating_Plugin extends Post_Rating_Plugin {

	public static function get_class_order_among_siblings() {
		return 50;
	}

	#region -- Plugin Meta

	public function get_plugin_title() {
		return 'Yet Another Stars Rating';
	}

	public function get_plugin_author() {
		return 'Dario Curvino';
	}

	public function get_last_tested_plugin_version() {
		return '2.6.2';
	}

	public function get_plugin_file_relative_path() {
		return 'yet-another-stars-rating/yet-another-stars-rating.php';
	}

	#endregion -- Plugin Meta

	#region -- Detect if is installed.

	public function is_installed_and_can_be_used() {
		return Simple_Utils::method_exist_and_is_public( YasrDatabaseRatings::class, 'getOverallRating' );
	}

	#endregion -- Detect if is installed.

	#region -- Get Ratings.

	public function get_rating( $post_id ) {
		$post_id = Simple_Utils::get_valid_wp_id( $post_id );
		if ( ! $post_id ) {
			return false;
		}

		// If we have Overall rating, then return it.
		$average_rating = YasrDatabaseRatings::getOverallRating( ( $post_id ) );
		if ( is_numeric( $average_rating ) && $average_rating > 0 ) {
			return (float) $average_rating;
		}

		// Else calculate visitors average votes.
		$votes          = YasrDatabaseRatings::getVisitorVotes( ( $post_id ) );
		$average_rating = $this->calculate_yasr_average_votes( $votes );
		if ( is_numeric( $average_rating ) && $average_rating > 0 ) {
			return (float) $average_rating;
		}

		// Try to get the multi set id of the post.
		$set_id = $this->try_to_get_set_id( $post_id );
		if ( ! $set_id ) {
			return false;
		}

		// Else get multi-set average overall votes.
		// Dunno if there is a bug, but this variable is static, so I assume it
		// should be write every time to calculate good.
		YasrMultiSetData::$array_to_return = array();
		$average_rating                    = YasrMultiSetData::returnMultiSetAverage( $post_id, $set_id, false );
		if ( is_numeric( $average_rating ) && $average_rating > 0 ) {
			return (float) $average_rating;
		}

		// Else calculate multi-set average votes.
		$average_rating = YasrMultiSetData::returnMultiSetAverage( $post_id, $set_id, true );
		if ( is_numeric( $average_rating ) && $average_rating > 0 ) {
			return (float) $average_rating;
		}

		return false;
	}

	public function get_rating_count( $post_id ) {
		$post_id = (int) $post_id;

		// Overall does not have votes count.
		// If we have Overall rating, then return it.
		$average_rating = YasrDatabaseRatings::getOverallRating( ( $post_id ) );
		if ( is_numeric( $average_rating ) && $average_rating > 0 ) {
			return 0;
		}

		// Else calculate visitors votes.
		$votes = YasrDatabaseRatings::getVisitorVotes( ( $post_id ) );
		if ( is_array( $votes ) && isset( $votes['number_of_votes'] ) && is_numeric( $votes['number_of_votes'] ) && $votes['number_of_votes'] > 0 ) {
			return (int) $votes['number_of_votes'];
		}

		// Try to get the multi set id of the post.
		// Dunno if there is a bug, but this variable is static, so I assume it
		// should be write every time to calculate good.
		$set_id = $this->try_to_get_set_id( $post_id );
		if ( ! $set_id ) {
			return false;
		}

		// Multi-set average overall does not have votes count.
		YasrMultiSetData::$array_to_return = array();
		$average_rating                    = YasrMultiSetData::returnMultiSetAverage( $post_id, $set_id, false );
		if ( is_numeric( $average_rating ) && $average_rating > 0 ) {
			return 0;
		}

		// Else calculate visitors multi set votes.
		$multiset_votes = YasrMultiSetData::returnMultisetContent( $post_id, $set_id, true );
		if ( is_array( $multiset_votes ) && ! ( empty( $multiset_votes ) ) ) {
			$max = 0;
			foreach ( $multiset_votes as $multiset_vote ) {
				if ( is_array( $multiset_vote ) && isset( $multiset_vote['number_of_votes'] ) && is_numeric( $multiset_vote['number_of_votes'] ) && $multiset_vote['number_of_votes'] > $max ) {
					$max = (int) $multiset_vote['number_of_votes'];
				}
			}
			if ( $max > 0 ) {
				return $max;
			}
		}

		return false;
	}

	#endregion -- Get Ratings.

	#region -- Helper Methods

	/**
	 * Given a parameter, determine if is an array formatted as YASR plugin does
	 * of visitor votes and return the calculated the average rating.
	 *
	 * @param mixed $votes
	 * @return float|int|false false if the average cannot be determined.
	 */
	public function calculate_yasr_average_votes( $votes ) {
		if ( is_array( $votes ) && ! isset( $votes['number_of_votes'], $votes['sum_votes'] ) ) {
			return false;
		}

		if ( ( ! is_numeric( $votes['sum_votes'] ) ) || ( ! is_numeric( $votes['number_of_votes'] ) ) ) {
			return false;
		}

		// Make float/int.
		$sum_votes       = + $votes['sum_votes'];
		$number_of_votes = + $votes['number_of_votes'];

		if ( ! ( $sum_votes > 0 ) || ! ( $number_of_votes >= 1 ) ) {
			return false;
		}

		return $sum_votes / $number_of_votes;
	}

	/**
	 * Try to get a set id for a post_id. The set_id is searched in the yasr log
	 * table, order by last id entered.
	 *
	 * @param int $post_id
	 * @return int|false|null Either the post_id, or false if not found.
	 */
	public function try_to_get_set_id( $post_id ) {
		global $wpdb;

		$table_name = YASR_LOG_MULTI_SET;

		try {
			$wpdb->hide_errors();
			// phpcs:ignore WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.DirectDatabaseQuery.DirectQuery
			$result = $wpdb->get_results( $wpdb->prepare( "SELECT set_type FROM ${table_name} AS l WHERE l.post_id=%d ORDER BY l.id DESC LIMIT 1", $post_id ), ARRAY_A );
		} catch ( Exception $e ) { // phpcs:ignore SlevomatCodingStandard.Exceptions.ReferenceThrowableOnly, Generic.CodeAnalysis.EmptyStatement
			// Do nothing.
		} finally {
			$wpdb->show_errors();
		}

		if ( is_array( $result ) && isset( $result[0], $result[0]['set_type'] ) ) {
			$field_id = $result[0]['set_type'];
			if ( is_numeric( $field_id ) && $field_id > 0 ) {
				return (int) $field_id;
			}
		}

	}

	#endregion -- Helper Methods

}
