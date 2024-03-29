<?php

// Intelephense and Phan suppress, because there is no suppress comment for code.
// Page View Count Plugin(A3REV)
namespace A3Rev\PageViewsCount {
	class A3_PVC {
		public static function pvc_fetch_post_total( $post_id ) {}
	}
}

/**
 * Freemius Function
 *
 * @return mixed
 */
function twrp_fs() {
	return null;
}

namespace {
	const ABSPATH = '';

	// Page View Count Plugin(A3REV)
	class A3_PVC {
		public static function pvc_fetch_post_total( $post_id ) {}
	}

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

	const YASR_LOG_TABLE = 'Some Value 2';

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
		public static function returnVisitorMultiSetContent( $post_id, $set_id ) {}
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
