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
}
