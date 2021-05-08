<?php

namespace TWRP\Plugins\Known_Plugins;

use Exception;
use TWRP\Database\General_Options;
use TWRP\Plugins\Post_Rating;
use TWRP\Utils\Helper_Trait\After_Setup_Theme_Init_Trait;
use YasrDatabaseRatings;
use TWRP\Utils\Simple_Utils;
use WP_Query;
use YasrMultiSetData;

/**
 * Class used to retrieve the ratings for YASR Rating Plugin.
 *
 * This plugin implements various types of rating a post:
 * 1. Overall/Authors vote, which is a vote in the backend, more like a review.
 * 2. Visitors votes, a normal stars system.
 * 3. Multiset Authors votes, votes give by an author in the backend. The multiset
 * comes from the fact that there are votes for different things, like on Amazon.
 * 4. Multiset visitors votes, like above, give by visitors.
 *
 * We cannot count the number of votes of Overall/Authors because there is only one.
 * The system is between 1-5 stars.
 */
class YASR_Rating_Plugin extends Post_Rating_Plugin {

	public static function get_class_order_among_siblings() {
		return 60;
	}

	#region -- Plugin Meta

	public function get_plugin_title() {
		return 'Yet Another Stars Rating';
	}

	public function get_plugin_author() {
		return 'Dario Curvino';
	}

	public function get_tested_plugin_versions() {
		return '2.3.0 - 2.6.2';
	}

	public function get_plugin_file_relative_path() {
		return 'yet-another-stars-rating/yet-another-stars-rating.php';
	}

	#endregion -- Plugin Meta

	#region -- Detect if is installed.

	public function is_installed_and_can_be_used() {
		$overall_rating   = Simple_Utils::method_exist_and_is_public( YasrDatabaseRatings::class, 'getOverallRating' );
		$visitors_votes   = Simple_Utils::method_exist_and_is_public( YasrDatabaseRatings::class, 'getVisitorVotes' );
		$multiset_average = Simple_Utils::method_exist_and_is_public( YasrMultiSetData::class, 'returnMultiSetAverage' );

		$multiset_count = Simple_Utils::method_exist_and_is_public( YasrMultiSetData::class, 'returnMultisetContent' ) ||
		Simple_Utils::method_exist_and_is_public( YasrMultiSetData::class, 'returnVisitorMultiSetContent' );

		$constants_defined = defined( 'YASR_LOG_MULTI_SET' ) && defined( 'YASR_LOG_TABLE' );

		return $overall_rating && $visitors_votes && $multiset_average && $multiset_count && $constants_defined;
	}

	#endregion -- Detect if is installed.

	#region -- Get Ratings.

	public function get_rating( $post_id ) {
		$post_id = Simple_Utils::get_valid_wp_id( $post_id );
		if ( ! $post_id ) {
			return false;
		}

		$yasr_rating_type = General_Options::get_option( General_Options::YASR_RATING_TYPE );

		if ( 'overall' === $yasr_rating_type ) {
			$average_rating = YasrDatabaseRatings::getOverallRating( ( $post_id ) );
			if ( is_numeric( $average_rating ) && $average_rating > 0 ) {
				return (float) $average_rating;
			}
			return 0;
		}

		if ( 'visitors' === $yasr_rating_type ) {
			$votes          = YasrDatabaseRatings::getVisitorVotes( ( $post_id ) );
			$average_rating = $this->calculate_yasr_average_votes( $votes );
			if ( is_numeric( $average_rating ) && $average_rating > 0 ) {
				return (float) $average_rating;
			}
			return 0;
		}

		if ( 'multi_set_overall' === $yasr_rating_type ) {
			// First try to get the multiset id.
			$multiset_meta = get_post_meta( $post_id, 'yasr_multiset_author_votes', true );
			if ( is_array( $multiset_meta ) && isset( $multiset_meta[0] ) && is_array( $multiset_meta[0] ) && isset( $multiset_meta[0]['set_id'] ) ) {
				$set_id = $multiset_meta[0]['set_id'];
				if ( is_numeric( $set_id ) && $set_id > 0 ) {
					// Dunno if there is a bug, but this variable is static, so I assume it
					// should be write every time to calculate good.
					YasrMultiSetData::$array_to_return = array();
					$average_rating                    = YasrMultiSetData::returnMultiSetAverage( $post_id, $set_id, false );
					if ( is_numeric( $average_rating ) && $average_rating > 0 ) {
						return (float) $average_rating;
					}
				}
			}

			return 0;
		}

		if ( 'multi_set_visitors' === $yasr_rating_type ) {
			// Try to get the multi set id of the post.
			$set_id = $this->try_to_get_visitors_multi_set_id( $post_id );
			if ( ! $set_id ) {
				return false;
			}

			$average_rating = YasrMultiSetData::returnMultiSetAverage( $post_id, $set_id, true );
			if ( is_numeric( $average_rating ) && $average_rating > 0 ) {
				return (float) $average_rating;
			}

			return 0;
		}

		return false;
	}

	public function get_rating_count( $post_id ) {
		$post_id = Simple_Utils::get_valid_wp_id( $post_id );
		if ( ! $post_id ) {
			return false;
		}

		$yasr_rating_type = General_Options::get_option( General_Options::YASR_RATING_TYPE );

		if ( 'overall' === $yasr_rating_type ) {
			// Overall does not have votes count.
			return 0;
		}

		if ( 'visitors' === $yasr_rating_type ) {
			$votes = YasrDatabaseRatings::getVisitorVotes( ( $post_id ) );
			if ( is_array( $votes ) && isset( $votes['number_of_votes'] ) && is_numeric( $votes['number_of_votes'] ) && $votes['number_of_votes'] > 0 ) {
				return (int) $votes['number_of_votes'];
			}

			return 0;
		}

		if ( 'multi_set_overall' === $yasr_rating_type ) {
			// Multiset Overall does not have votes count.
			return 0;
		}

		if ( 'multi_set_visitors' === $yasr_rating_type ) {
			$set_id = $this->try_to_get_visitors_multi_set_id( $post_id );
			if ( ! $set_id ) {
				return 0;
			}

			if ( Simple_Utils::method_exist_and_is_public( YasrMultiSetData::class, 'returnVisitorMultiSetContent' ) ) {
				$multiset_votes = YasrMultiSetData::returnVisitorMultiSetContent( $post_id, $set_id );
			} else {
				$multiset_votes = YasrMultiSetData::returnMultisetContent( $post_id, $set_id, true );
			}

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

			return 0;
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
	public function try_to_get_visitors_multi_set_id( $post_id ) {
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

	#region -- Modify the query argument to order posts.

	public function modify_query_arg_if_necessary( $query_args ) {
		$query_args = $this->modify_query_arg_if_necessary_to_order_by_average( $query_args );
		$query_args = $this->modify_query_arg_if_necessary_to_order_by_count( $query_args );

		return $query_args;
	}

	/**
	 * Given the query args, modify them to order them by average.
	 *
	 * @param array $query_args
	 * @return array
	 */
	protected function modify_query_arg_if_necessary_to_order_by_average( $query_args ) {
		$orderby_value = Post_Rating::ORDERBY_RATING_OPTION_KEY;
		if ( ! isset( $query_args['orderby'][ $orderby_value ] ) ) {
			return $query_args;
		}

		$yasr_rating_type = General_Options::get_option( General_Options::YASR_RATING_TYPE );

		if ( 'overall' === $yasr_rating_type ) {
			$orderby     = $query_args['orderby'];
			$new_orderby = array();
			foreach ( $orderby as $key => $value ) {
				if ( Post_Rating::ORDERBY_RATING_OPTION_KEY === $key ) {
					$new_orderby['meta_value_num'] = $value;
				} else {
					$new_orderby[ $key ] = $value;
				}
			}
			$query_args['orderby']  = $new_orderby;
			$query_args['meta_key'] = 'yasr_overall_rating'; // phpcs:ignore WordPress.DB.SlowDBQuery

			return $query_args;
		}

		if ( 'visitors' === $yasr_rating_type ) {
			$query_args['twrp_order_by_yasr_average_visitors'] = true;
			$query_args['suppress_filters']                    = false;

			return $query_args;
		}

		if ( 'multi_set_overall' === $yasr_rating_type ) {
			$orderby     = $query_args['orderby'];
			$new_orderby = array();
			foreach ( $orderby as $key => $value ) {
				if ( Post_Rating::ORDERBY_RATING_OPTION_KEY === $key ) {
					$new_orderby['meta_value_num'] = $value;
				} else {
					$new_orderby[ $key ] = $value;
				}
			}
			$query_args['orderby']  = $new_orderby;
			$query_args['meta_key'] = 'yasr_multiset_author_votes'; // phpcs:ignore WordPress.DB.SlowDBQuery

			return $query_args;
		}

		if ( 'multi_set_visitors' === $yasr_rating_type ) {
			$query_args['twrp_order_by_yasr_average_multiset_visitors'] = true;
			$query_args['suppress_filters']                             = false;

			return $query_args;
		}

		return $query_args;
	}

	/**
	 * Given the query args, modify them to order them by rating count.
	 *
	 * @param array $query_args
	 * @return array
	 */
	protected function modify_query_arg_if_necessary_to_order_by_count( $query_args ) {
		$orderby_value = Post_Rating::ORDERBY_RATING_COUNT_OPTION_KEY;
		if ( ! isset( $query_args['orderby'][ $orderby_value ] ) ) {
			return $query_args;
		}

		$yasr_rating_type = General_Options::get_option( General_Options::YASR_RATING_TYPE );

		if ( 'overall' === $yasr_rating_type || 'multi_set_overall' === $yasr_rating_type ) {
			return $query_args;
		}

		if ( 'visitors' === $yasr_rating_type ) {
			$query_args['twrp_order_by_yasr_count_visitors'] = true;
			$query_args['suppress_filters']                  = false;

			return $query_args;
		}

		if ( 'multi_set_visitors' === $yasr_rating_type ) {
			$query_args['twrp_order_by_yasr_count_multiset_visitors'] = true;
			$query_args['suppress_filters']                           = false;

			return $query_args;
		}

	}

	#endregion -- Modify the query argument to order posts.

	#region -- Order by average Query Hooks.

	use After_Setup_Theme_Init_Trait;

	public static function after_setup_theme_init() {
		add_filter(
			'twrp_before_getting_query',
			/**
			 * Added some filters that can order posts by this plugin views.
			 *
			 * @param array $query_args
			 * @return array
			*/
			function( $query_args ) {
				add_filter( 'posts_join', array( self::class, 'add_posts_query_join_table' ), 10, 2 );
				add_filter( 'posts_orderby', array( self::class, 'add_query_posts_orderby_rating' ), 10, 2 );
				return $query_args;
			}
		);

		add_filter(
			'twrp_after_getting_posts_filter',
			/**
			 * Remove the filters installed.
			 *
			 * @param array $query_args
			 * @return array
			*/
			function( $query_args ) {
				remove_filter( 'posts_join', array( self::class, 'add_posts_query_join_table' ) );
				remove_filter( 'posts_orderby', array( self::class, 'add_query_posts_orderby_rating' ) );
				return $query_args;
			}
		);
	}

	/**
	 * Filter that joins 2 sql tables if needed to order by this plugin rating.
	 *
	 * @param string $join
	 * @param WP_Query $wp_query
	 * @return string
	 *
	 * @psalm-suppress DocblockTypeContradiction
	 */
	public static function add_posts_query_join_table( $join, $wp_query ) {
		global $wpdb;

		$query_array = $wp_query->query;
		if ( ! is_array( $query_array ) ) {
			return $join;
		}

		$wp_posts_table = $wpdb->posts;

		if ( array_key_exists( 'twrp_order_by_yasr_average_visitors', $query_array ) ) {
			$yasr_log_table = YASR_LOG_TABLE;
			$join          .= "INNER JOIN (SELECT post_id as twrp_avg_post_id, SUM(vote)/COUNT(vote) as twrp_avg_vote FROM $yasr_log_table WHERE vote > 0 AND vote <= 5 GROUP BY post_id) as twrp_avg_rating_table ON twrp_avg_rating_table.twrp_avg_post_id = $wp_posts_table.ID";
		}

		if ( array_key_exists( 'twrp_order_by_yasr_average_multiset_visitors', $query_array ) ) {
			$yasr_log_table = YASR_LOG_MULTI_SET;
			$join          .= "INNER JOIN (SELECT post_id as twrp_avg_post_id, SUM(vote)/COUNT(vote) as twrp_avg_vote FROM $yasr_log_table WHERE vote > 0 AND vote <= 5 GROUP BY post_id) as twrp_avg_rating_table ON twrp_avg_rating_table.twrp_avg_post_id = $wp_posts_table.ID";
		}

		if ( array_key_exists( 'twrp_order_by_yasr_count_visitors', $query_array ) ) {
			$yasr_log_table = YASR_LOG_TABLE;
			$join          .= "INNER JOIN (SELECT post_id as twrp_avg_post_id, COUNT(vote) as twrp_rating_counts FROM $yasr_log_table WHERE vote > 0 AND vote <= 5 GROUP BY post_id) as twrp_count_rating_table ON twrp_count_rating_table.twrp_avg_post_id = $wp_posts_table.ID";
		}

		if ( array_key_exists( 'twrp_order_by_yasr_count_multiset_visitors', $query_array ) ) {
			$yasr_log_table = YASR_LOG_MULTI_SET;
		}

		// twrp_count_rating_table.twrp_rating_counts

		return $join;
	}

	/**
	 * Filter function that adds to the query how to order by views stored by
	 * this plugin, if necessary.
	 *
	 * @param string $orderby
	 * @param WP_Query $wp_query
	 * @return string
	 *
	 * @psalm-suppress DocblockTypeContradiction
	 */
	public static function add_query_posts_orderby_rating( $orderby, $wp_query ) {
		$orderby_value = Post_Rating::ORDERBY_RATING_OPTION_KEY;

		$query_array = $wp_query->query;
		if ( ! is_array( $query_array ) ) {
			return $orderby;
		}

		$order = 'DESC';
		if ( isset( $query_array['orderby'], $query_array['orderby'][ $orderby_value ] ) ) {
			$order = $query_array['orderby'][ $orderby_value ];
		}

		if ( array_key_exists( 'twrp_order_by_yasr_average_visitors', $query_array )
		|| array_key_exists( 'twrp_order_by_yasr_average_multiset_visitors', $query_array ) ) {
			if ( ! empty( $orderby ) ) {
				$orderby = ', ' . $orderby;
			}

			$orderby = 'twrp_avg_rating_table.twrp_avg_vote ' . $order . $orderby;
		}

		if ( array_key_exists( 'twrp_order_by_yasr_count_visitors', $query_array )
		|| array_key_exists( 'twrp_order_by_yasr_count_multiset_visitors', $query_array ) ) {
			if ( ! empty( $orderby ) ) {
				$orderby = ', ' . $orderby;
			}

			$orderby = 'twrp_count_rating_table.twrp_rating_counts ' . $order . $orderby;
		}

		return $orderby;
	}

	#endregion -- Order by average Query Hooks.

}
