<?php
/**
 * File that contains the trait with the same name.
 *
 * @todo: add a function to get human_readable_date in widget_settings trait.
 */

namespace TWRP\Article_Block;

use RuntimeException;
use WP_Post;
use TWRP\Database\General_Options;
use TWRP\Icons\SVG_Manager;
use TWRP\Icons\Icon;

/**
 * In addition to trait Get_Widget_Settings_Trait, which will get only the settings
 * declared in widget, the settings retrieved with these function will try to
 * use first the General Settings if they can be applied.
 *
 * Always prefer to use the function declared here, than the ones declared in
 * Get_Widget_Settings_Trait.
 */
trait Get_Settings_Trait {

	use Get_Widget_Settings_Trait;

	/**
	 * Get the date format to display, or to display in the human readable form.
	 *
	 * @return string Either the date format, or HUMAN_READABLE to signal that
	 * the relative human readable string should be used. An empty string means
	 * to use the default WP date format.
	 */
	public function get_date_format() {
		if ( 'true' === General_Options::get_option( General_Options::KEY__PER_WIDGET_DATE_FORMAT ) ) {
			if ( 'true' === General_Options::get_option( General_Options::KEY__HUMAN_READABLE_DATE ) ) {
				return 'HUMAN_READABLE';

			} else {
				return General_Options::get_option( General_Options::KEY__DATE_FORMAT );
			}
		}

		if ( isset( $this->settings['human_readable_date'] ) && $this->settings['human_readable_date'] ) {
			return 'HUMAN_READABLE';
		}

		if ( isset( $this->settings['date_format'] ) ) {
			$setting = $this->settings['date_format'];
			if ( is_string( $setting ) ) {
				return $setting;
			}
		}

		return '';
	}

	#region -- Icons

	/**
	 * Get the Id of the selected author icon. Empty if nothing is set(usually
	 * should not be encounter).
	 *
	 * @return string
	 */
	public function get_selected_author_icon() {
		if ( 'false' === General_Options::get_option( General_Options::KEY__PER_WIDGET_ICON ) ) {
			$option = General_Options::get_option( General_Options::KEY__AUTHOR_ICON );

			if ( ! is_string( $option ) ) {
				return '';
			}
			return $option;
		}

		if ( $this->get_widget_author_icon() ) {
			return $this->get_widget_author_icon();
		}

		if ( null !== General_Options::get_option( General_Options::KEY__AUTHOR_ICON ) ) {
			$option = General_Options::get_option( General_Options::KEY__AUTHOR_ICON );

			if ( ! is_string( $option ) ) {
				return '';
			}
			return $option;
		}

		return '';
	}

	/**
	 * Return the svg for the author icon.
	 *
	 * @return string The HTML is safe for output.
	 */
	public function get_author_icon_html() {
		try {
			$icon = new Icon( $this->get_selected_author_icon() );
			return $icon->get_html( 'twrp-i--author' );
		} catch ( RuntimeException $e ) {
			return '';
		}
	}


	/**
	 * Get the Id of the selected date icon. Empty if nothing is set(usually
	 * should not be encounter).
	 *
	 * @return string
	 */
	public function get_selected_date_icon() {
		if ( 'false' === General_Options::get_option( General_Options::KEY__PER_WIDGET_ICON ) ) {
			$option = General_Options::get_option( General_Options::KEY__DATE_ICON );

			if ( ! is_string( $option ) ) {
				return '';
			}
			return $option;
		}

		if ( $this->get_widget_date_icon() ) {
			return $this->get_widget_date_icon();
		}

		if ( null !== General_Options::get_option( General_Options::KEY__DATE_ICON ) ) {
			$option = General_Options::get_option( General_Options::KEY__DATE_ICON );

			if ( ! is_string( $option ) ) {
				return '';
			}
			return $option;
		}

		return '';
	}

	/**
	 * Return the svg for the date icon.
	 *
	 * @return string The HTML is safe for output.
	 */
	public function get_date_icon_html() {
		try {
			$icon = new Icon( $this->get_selected_date_icon() );
			return $icon->get_html( 'twrp-i--date' );
		} catch ( RuntimeException $e ) {
			return '';
		}
	}


	/**
	 * Get the Id of the selected views icon. Empty if nothing is set(usually
	 * should not be encounter).
	 *
	 * @return string
	 */
	public function get_selected_views_icon() {
		if ( 'false' === General_Options::get_option( General_Options::KEY__PER_WIDGET_ICON ) ) {
			$option = General_Options::get_option( General_Options::KEY__VIEWS_ICON );

			if ( ! is_string( $option ) ) {
				return '';
			}
			return $option;
		}

		if ( $this->get_widget_views_icon() ) {
			return $this->get_widget_views_icon();
		}

		if ( null !== General_Options::get_option( General_Options::KEY__VIEWS_ICON ) ) {
			$option = General_Options::get_option( General_Options::KEY__VIEWS_ICON );

			if ( ! is_string( $option ) ) {
				return '';
			}
			return $option;
		}

		return '';
	}

	/**
	 * Return the svg for the views icon.
	 *
	 * @return string The HTML is safe for output.
	 */
	public function get_views_icon_html() {
		try {
			$icon = new Icon( $this->get_selected_date_icon() );
			return $icon->get_html( 'twrp-i--views' );
		} catch ( RuntimeException $e ) {
			return '';
		}
	}


	/**
	 * Get the Id of the selected comments icon. Empty if nothing is
	 * set(usually should not be encounter).
	 *
	 * @return string
	 */
	public function get_selected_comments_icon() {
		if ( 'false' === General_Options::get_option( General_Options::KEY__PER_WIDGET_ICON ) ) {
			$option = General_Options::get_option( General_Options::KEY__COMMENTS_ICON );

			if ( ! is_string( $option ) ) {
				return '';
			}
			return $option;
		}

		if ( $this->get_widget_comments_icon() ) {
			return $this->get_widget_comments_icon();
		}

		if ( null !== General_Options::get_option( General_Options::KEY__COMMENTS_ICON ) ) {
			$option = General_Options::get_option( General_Options::KEY__COMMENTS_ICON );

			if ( ! is_string( $option ) ) {
				return '';
			}
			return $option;
		}

		return '';
	}

	/**
	 * Get the Id of the selected comments disabled icon. Empty if nothing is
	 * set(usually should not be encounter).
	 *
	 * @return string
	 */
	public function get_selected_disabled_comments_icon() {
		if ( 'false' === General_Options::get_option( General_Options::KEY__PER_WIDGET_ICON ) ) {
			$option = General_Options::get_option( General_Options::KEY__COMMENTS_DISABLED_ICON );

			if ( ! is_string( $option ) ) {
				return '';
			}
			return $option;
		}

		if ( $this->get_widget_comments_disabled_icon() ) {
			return $this->get_widget_comments_disabled_icon();
		}

		if ( null !== General_Options::get_option( General_Options::KEY__COMMENTS_DISABLED_ICON ) ) {
			$option = General_Options::get_option( General_Options::KEY__COMMENTS_DISABLED_ICON );

			if ( ! is_string( $option ) ) {
				return '';
			}
			return $option;
		}

		return '';
	}

	/**
	 * Get the HTML to display the svg icon
	 *
	 * If comments are disabled and the post has no comments, then the comments
	 * disable icon will be used. If the post has at least one comment or
	 * comments are open, the normal comments icon will be given.
	 *
	 * @param WP_Post|int|null $post Defaults to global $post.
	 * @return string
	 */
	public function get_comments_icon_html( $post = null ) {
		$post = get_post( $post );

		if ( null === $post || is_array( $post ) ) { // This is for static type checkers.
			return '';
		}

		$number_of_comments = (int) get_comments_number( $post );
		$comments_open      = comments_open( $post );
		$comments_icon      = '';

		if ( 0 === $number_of_comments && ( ! $comments_open ) ) {
			$comments_icon = $this->get_selected_disabled_comments_icon();
		} else {
			$comments_icon = $this->get_selected_comments_icon();
		}

		try {
			$icon = new Icon( $comments_icon );
			return $icon->get_html( 'twrp-i--comments' );
		} catch ( RuntimeException $e ) {
			return '';
		}
	}

	#endregion -- Icons


}
