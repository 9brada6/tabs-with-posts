<?php

namespace TWRP\Article_Block;

use WP_Post;
use TWRP\Plugins\Post_Views;
use TWRP\Utils\Date_Utils;

trait Display_Post_Meta_Trait {

	use Get_Settings_Trait;

	#region -- Display Post Meta

	/**
	 * Display the author of the current post.
	 *
	 * @return void
	 */
	public function display_the_author() {
		$author = $this->get_the_author();
		if ( is_string( $author ) ) {
			echo esc_html( $author );
		}
	}

	/**
	 * Get the author of the current $post.
	 *
	 * @return string|null
	 */
	public function get_the_author() {
		$author = get_the_author();
		return $author;
	}


	/**
	 * Display the date of the current post.
	 *
	 * @param WP_Post|int|null $post The post, defaults to global post.
	 * @return void
	 */
	public function display_the_date( $post = null ) {
		$date = $this->get_the_date( $post );
		if ( is_string( $date ) ) {
			echo esc_html( $date );
		}
	}

	/**
	 * Get the date of the current post. The date retrieved will be formatted
	 * how it should be.
	 *
	 * @param WP_Post|int|null $post The post, defaults to global post.
	 * @return string|false False in case something was wrong.
	 */
	public function get_the_date( $post = null ) {
		$date_format = $this->get_date_format();
		if ( 'HUMAN_READABLE' === $date_format ) {
			$from = Date_Utils::get_post_timestamp( $post );
			$to   = date_timestamp_get( Date_Utils::current_datetime() );

			if ( false === $from || 0 === $to ) {
				$date_text = false;
			} else {
				$date_text = sprintf( '%s ago', human_time_diff( $from, $to ) );
			}
		} else {
			$date_text = get_the_time( $date_format, $post );
		}

		if ( is_int( $date_text ) ) {
			$date_text = (string) $date_text;
		}

		return $date_text;
	}


	/**
	 * Display the comments number. Will not display if comments are not open
	 * and there are no comments.
	 *
	 * @param WP_Post|int|null $post The post, defaults to global post.
	 * @return void
	 */
	public function display_comments_number( $post = null ) {
		$post = get_post( $post );

		if ( is_array( $post ) || is_null( $post ) ) { // Needed for static analysis checks.
			return;
		}

		if ( ( ! comments_open( $post ) ) && ( ! $this->get_the_comments_number() ) ) {
			return;
		}

		echo $this->get_the_comments_number(); // phpcs:ignore -- No XSS.
	}

	/**
	 * Get the comments number for a post.
	 *
	 * @param WP_Post|int|null $post The post, defaults to global post.
	 * @return int|string A numeric string representing the number of posts, or 0.
	 */
	public function get_the_comments_number( $post = null ) {
		$post = get_post( $post );

		if ( is_array( $post ) || is_null( $post ) ) { // Needed for static analysis checks.
			return 0;
		}

		return get_comments_number( $post );
	}


	/**
	 * Display the views of the post.
	 *
	 * @param WP_Post|int|null $post Defaults to global $post.
	 * @return void
	 */
	public function display_the_views( $post = null ) {
		$author = $this->get_the_views( $post );
		if ( is_int( $author ) ) {
			echo esc_html( (string) $author );
		} else {
			echo '0';
		}
	}

	/**
	 * Get the views of the post.
	 *
	 * @param WP_Post|int|null $post Defaults to global $post.
	 * @return int|false False if something went wrong and the views are not available.
	 */
	public function get_the_views( $post = null ) {
		return Post_Views::get_views( $post );
	}

	#endregion -- Display Post Meta

	#region -- Icons

	/**
	 * Include the HTML svg for the author icon.
	 *
	 * @return void
	 */
	public function display_author_icon() {
		echo $this->get_author_icon_html(); // phpcs:ignore
	}

	/**
	 * Include the HTML svg for the date icon.
	 *
	 * @return void
	 */
	public function display_date_icon() {
		echo $this->get_date_icon_html(); // phpcs:ignore
	}

	/**
	 * Include the HTML svg for the views icon.
	 *
	 * @return void
	 */
	public function display_views_icon() {
		echo $this->get_views_icon_html(); // phpcs:ignore
	}

	/**
	 * Display the HTML svg icon
	 *
	 * If comments are disabled and the post has no comments, then the comments
	 * disable icon will be used. If the post has at least one comment or
	 * comments are open, the normal comments icon will be given.
	 *
	 * @param WP_Post|int|null $post Defaults to global $post.
	 * @return void
	 */
	public function display_comments_icon( $post = null ) {
		echo $this->get_comments_icon_html( $post ); // phpcs:ignore
	}

	#endregion -- Icons

}
