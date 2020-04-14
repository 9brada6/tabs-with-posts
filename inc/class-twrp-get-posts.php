<?php

class TWRP_Get_Posts {
	public static function get_posts_by_query_id( $query_id ) {
		$posts = get_posts( self::get_query_args( $query_id ) );

		return $posts;
	}

	public static function get_query_args( $query_id ) {
		$query_options = TWRP_Manage_Options::get_query_options_by_id( $query_id );
		$query_args    = self::get_starting_query_args();

		$registered_settings = TWRP_Manage_Classes::get_registered_query_args_settings();
		foreach ( $registered_settings as $setting_to_apply ) {
			$query_args = $setting_to_apply->add_query_arg( $query_args, $query_options );
		}

		return $query_args;
	}

	protected static function get_starting_query_args() {
		return array();
	}
}
