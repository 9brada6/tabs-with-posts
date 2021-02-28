<?php

// Intelephense and Phan suppress, because there is no suppress comment for code.
namespace A3Rev\PageViewsCount {
	class A3_PVC {
		public static function pvc_fetch_post_total( $post_id ) {}
	}
}

namespace {
	/**
	 * Stub.
	 *
	 * @param int $post_id
	 * @return int|string
	 */
	function pvc_get_post_views( $post_id ) {
		if ( $post_id > 0 ) {
			return '';
		}

		return 0;
	}

	class WPSEO_Primary_Term{

		public function __construct($a, $b){}

		public function get_primary_term(){}
	}

	// For YASR Plugin:
	const YASR_LOG_MULTI_SET = 'Some Value';

	const ARRAY_A = 'Some Value';

	class YasrDatabaseRatings {

		/*
		* @param int $post_id
		* @return float|int|null
		*/
	   public static function getOverallRating ($post_id=false) {}

	   	/*
		* @param int $post_id
		* @return array|float|int|null
		*/
		public static function getVisitorVotes ($post_id=false) {}
	}

	class YasrMultiSetData {
		public static $array_to_return = array();
		public static function returnMultiSetAverage( $a, $b, $c ) {}
		public static function returnMultisetContent( $post_id, $set_id, $c ) {}
	}

	// For Blaz Plugin.

	/**
	 *
	 * @param int|false $post_id
	 * @return int
	 */
	function rmp_get_vote_count($post_id = false){}

	/**
	 *
	 * @param int|false $post_id
	 * @return float|int
	 */
	function rmp_get_avg_rating($post_id = false){}
}
