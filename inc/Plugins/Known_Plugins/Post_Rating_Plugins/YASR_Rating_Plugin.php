<?php

namespace TWRP\Plugins\Known_Plugins;

use YasrDatabaseRatings;
use TWRP\Utils\Simple_Utils;

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
		return Simple_Utils::method_exist_and_is_public( YasrDatabaseRatings::class, 'getAllOverallRatings' );
	}

	#endregion -- Detect if is installed.

	#region -- Get Ratings.

	// todo.
	public function get_rating( $post_id ) {
		$post_id = Simple_Utils::get_valid_wp_id( $post_id );
		if ( ! $post_id ) {
			return false;
		}

		$votes = YasrDatabaseRatings::getAllOverallRatings( ( $post_id ) );

		return false;
	}

	// todo.
	public function get_rating_count( $post_id ) {
		return false;
	}

	#endregion -- Get Ratings.

}
