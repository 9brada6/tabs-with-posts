<?php

namespace TWRP\Query_Generator;

use TWRP\Database\Query_Options;

use TWRP\Utils\Class_Retriever_Utils;

use WP_Query;
use WP_Post;
use RuntimeException;

class Query_Generator {

	/**
	 * Get the WordPress posts for a specific defined query.
	 *
	 * @throws RuntimeException If the Query ID does not exist.
	 *
	 * @param int|string $query_id The Query ID to get posts from.
	 *
	 * @return WP_Post[] The WordPress Posts.
	 */
	public static function get_posts_by_query_id( $query_id ) {
		try {
			$query_args = self::get_wp_query_arguments( $query_id );
		} catch ( RuntimeException $exception ) {
			throw $exception;
		}
		$wp_query = new WP_Query();
		$posts    = $wp_query->query( $query_args );

		return $posts;
	}

	/**
	 * Construct the WP Query Arguments for a registered query, based on the
	 * setting classes registered.
	 *
	 * @see \TWRP\Query_Settings_Manager On how to add a setting class.
	 * @throws RuntimeException If the Query ID does not exist, or something went wrong.
	 *
	 * @param int|string $query_id The Id to construct query for.
	 *
	 * @return array
	 */
	public static function get_wp_query_arguments( $query_id ) {
		$registered_settings_classes = Class_Retriever_Utils::get_all_query_settings_objects();
		$query_args                  = self::get_starting_query_args();

		try {
			$query_options = Query_Options::get_all_query_settings( $query_id );
		} catch ( RuntimeException $exception ) {
			throw $exception;
		}

		foreach ( $registered_settings_classes as $setting_class_to_apply ) {
			$query_args = $setting_class_to_apply->add_query_arg( $query_args, $query_options );
		}

		return $query_args;
	}

	/**
	 * Get the WP Query arguments before even any other setting is applied.
	 *
	 * @return array
	 */
	protected static function get_starting_query_args() {
		return array(
			// Like in get_posts(), we set to get only published posts. By
			// default WP adds private posts if user is logged in.
			'post_status'   => 'publish',
			'no_found_rows' => true,
		);
	}

}
