<?php

namespace TWRP;

use TWRP\Database\Query_Options;
use TWRP\Query_Settings_Manager;

class Get_Posts {

	/**
	 * Get the WordPress posts for a specific defined query.
	 *
	 * @throws \RuntimeException If the Query ID does not exist.
	 *
	 * @param int|string $query_id The Query ID to get posts from.
	 *
	 * @return \WP_Post[] The WordPress Posts.
	 */
	public static function get_posts_by_query_id( $query_id ) {
		try {
			$query_args = self::get_wp_query_arguments( $query_id );
		} catch ( \RuntimeException $exception ) {
			throw $exception;
		}

		$posts = get_posts( $query_args );

		return $posts; // @phan-suppress-current-line PhanPartialTypeMismatchReturn
	}

	/**
	 * Construct the WP Query Arguments for a registered query, based on the
	 * setting classes registered.
	 *
	 * @see \TWRP\Query_Settings_Manager On how to add a setting class.
	 * @throws \RuntimeException If the Query ID does not exist, or something went wrong.
	 *
	 * @param int|string $query_id The Id to construct query for.
	 *
	 * @return array
	 */
	public static function get_wp_query_arguments( $query_id ) {
		$registered_settings_classes = Query_Settings_Manager::get_registered_query_args_settings();
		$query_args                  = self::get_starting_query_args();

		try {
			$query_options = Query_Options::get_all_query_settings( $query_id );
		} catch ( \RuntimeException $exception ) {
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
		return array();
	}

	// todo: Make a global variable that will hold the original post when global
	// post is replaced.
	// todo: Maybe delete this function? or move it to utils?
	public static function get_global_post() {
		global $post;

		return $post;
	}
}
