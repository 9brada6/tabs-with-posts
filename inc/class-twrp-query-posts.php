<?php

class TWRP_Query_Posts {
	public static function get_posts_by_query_id( $query_id ) {
		$posts = get_posts( self::get_wp_query_arguments( $query_id ) );

		return $posts;
	}

	/**
	 * Construct the WP Query Arguments for a registered query, based on the
	 * setting classes registered.
	 *
	 * @todo What Todo if the query_id does not exist.
	 *
	 * @see TWRP_Manage_Classes On how to add a setting class.
	 *
	 * @param int|string $query_id The Id to construct query for.
	 *
	 * @return array
	 */
	public static function get_wp_query_arguments( $query_id ) {
		$registered_settings_classes = TWRP_Manage_Classes::get_registered_query_args_settings();
		$query_options               = TWRP_Manage_Options::get_all_query_settings( $query_id );
		$query_args                  = self::get_starting_query_args();

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
}
