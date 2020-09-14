<?php
/**
 * File that contains the abstract class of the article blocks.
 */

namespace TWRP\Article_Block;

use WP_Post;
use TWRP\Artblock_Component\Widget_Component_Settings;
use TWRP\Database\General_Options;
use TWRP\Icons\SVG_Manager;
use TWRP\Utils;
use TWRP\Plugins\Post_Views;

/**
 * The abstract for an article block. By extending this class, a class can
 * be declared an article block.
 *
 * Definition: An article block is how a post can be displayed in the widget.
 * It can be displayed as a simple title, where a user can click on it(it can
 * also have some metadata like the author or the date), or it can be displayed
 * maybe as a title and alongside a thumbnail, like YouTube do. Or maybe we want
 * to display a custom WooCommerce product. The possibilities are very large.
 */
abstract class Article_Block {

	use Get_Widget_Settings_Trait;

	/**
	 * Holds the widget id of these article blocks.
	 *
	 * @var int
	 */
	protected $widget_id;

	/**
	 * Holds the query id of these article blocks.
	 *
	 * @var int
	 */
	protected $query_id;

	/**
	 * Holds the query settings. This property is commented because is
	 * implemented in Get_Widget_Settings_Trait, but is also put here to know
	 * the properties of this object.
	 *
	 * @var array
	 */
	// protected $settings;

	/**
	 * Get the Id of the article block.
	 *
	 * This should be unique across all article blocks.
	 *
	 * @return string
	 */
	abstract public static function get_id();

	/**
	 * Get the name of the Article Block. The name should have spaces instead
	 * of "_" and should be something representative.
	 *
	 * @return string
	 */
	abstract public static function get_name();

	/**
	 * Get the file name. The name must have appended ".php" suffix.
	 *
	 * @return string
	 */
	abstract protected static function get_file_name();

	/**
	 * Called before anything else, to initialize actions and filters.
	 *
	 * Always called at 'after_setup_theme' action. Other things added here should be
	 * additionally checked, for example by admin hooks, or whether or not to be
	 * included in special pages, ...etc.
	 *
	 * @return void
	 *
	 * @phan-suppress PhanEmptyPublicMethod
	 */
	public static function init() {
		// Do nothing for now.
	}

	/**
	 * Get the widget Id this artblock is build for.
	 *
	 * @return int
	 */
	public function get_widget_id() {
		return $this->widget_id;
	}

	/**
	 * Get the query Id this artblock is build for.
	 *
	 * @return int
	 */
	public function get_query_id() {
		return $this->query_id;
	}

	/**
	 * Get the settings of this artblock.
	 *
	 * @return array
	 */
	public function get_settings() {
		return $this->settings;
	}

	/**
	 * Construct the object instance.
	 *
	 * @param int $widget_id
	 * @param int $query_id
	 * @param array $settings
	 */
	public function __construct( $widget_id, $query_id, $settings ) {
		$this->widget_id = $widget_id;
		$this->query_id  = $query_id;
		$this->settings  = $settings;
	}

	/**
	 * Echo the block class that each article block in the query should have.
	 *
	 * The string is escaped when echoed.
	 *
	 * @return void
	 */
	public function the_block_class() {
		echo esc_attr( $this->get_block_class() );
	}

	/**
	 * Get the block class that each article block in the query should have.
	 *
	 * @return string
	 */
	public function get_block_class() {
		return 'twrp-block--' . $this->widget_id . '-' . $this->query_id;
	}

	/**
	 * Include the template that should be displayed in the frontend.
	 *
	 * @return void
	 * @psalm-suppress UnresolvableInclude
	 */
	public function include_template() {
		$artblock = $this;
		include \TWRP_Main::get_templates_directory() . static::get_file_name();
	}

	/**
	 * Get the components that can be edited for this artblock.
	 *
	 * @return array<Widget_Component_Settings>
	 */
	abstract public function get_components();

	/**
	 * Display the article block settings in the Widgets::form().
	 *
	 * @return void
	 */
	abstract public function display_form_settings();

	/**
	 * Sanitize the widget settings of this specific article block.
	 *
	 * @return array The new array of settings.
	 */
	abstract public function sanitize_widget_settings();

	/**
	 * Create and return the css of the component.
	 *
	 * @return string
	 */
	public function get_css() {
		$components = $this->get_components();

		$css = '';
		foreach ( $components as $component ) {
			$css .= $component->get_css();
		}

		return $css;
	}

	#region -- Verify if meta information is displayed

	/**
	 * Whether or not the author must be shown in the article.
	 *
	 * @return bool
	 */
	public function is_author_displayed() {
		return isset( $this->settings['display_author'] ) && $this->settings['display_author'];
	}

	/**
	 * Whether or not the date must be shown in the article.
	 *
	 * @return bool
	 */
	public function is_date_displayed() {
		return isset( $this->settings['display_date'] ) && $this->settings['display_date'];
	}

	/**
	 * Whether or not the categories must be shown in the article.
	 *
	 * @return bool
	 */
	public function are_categories_displayed() {
		return isset( $this->settings['display_categories'] ) && $this->settings['display_categories'];
	}

	/**
	 * Whether or not the views must be shown in the article.
	 *
	 * @return bool
	 */
	public function are_views_displayed() {
		return isset( $this->settings['display_views'] ) && $this->settings['display_views'];
	}

	/**
	 * Whether or not the rating must be shown in the article.
	 *
	 * @return bool
	 */
	public function is_rating_displayed() {
		return isset( $this->settings['display_rating'] ) && $this->settings['display_rating'];
	}

	/**
	 * Whether or not the comments must be shown in the article.
	 *
	 * @return bool
	 */
	public function are_comments_displayed() {
		return isset( $this->settings['display_comments'] ) && $this->settings['display_comments'];
	}

	#endregion -- Verify if meta information is displayed

	#region -- Display meta

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
			$from = Utils::get_post_timestamp( $post );
			$to   = date_timestamp_get( Utils::current_datetime() );

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

	#endregion -- Display meta

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
		return SVG_Manager::get_html_svg( $this->get_selected_author_icon(), 'twrp-author-icon' );
	}

	/**
	 * Include the HTML svg for the author icon.
	 *
	 * @return void
	 */
	public function include_author_icon() {
		// phpcs:ignore
		echo $this->get_author_icon_html();
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
		return SVG_Manager::get_html_svg( $this->get_selected_date_icon(), 'twrp-date-icon' );
	}

	/**
	 * Include the HTML svg for the date icon.
	 *
	 * @return void
	 */
	public function include_date_icon() {
		// phpcs:ignore
		echo $this->get_date_icon_html();
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
		return SVG_Manager::get_html_svg( $this->get_selected_views_icon(), 'twrp-views-icon' );
	}

	/**
	 * Include the HTML svg for the views icon.
	 *
	 * @return void
	 */
	public function include_views_icon() {
		// phpcs:ignore
		echo $this->get_views_icon_html();
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

		return SVG_Manager::get_html_svg( $comments_icon, 'twrp-views-icon' );
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
	public function include_comments_icon( $post = null ) {
		echo $this->get_comments_icon_html( $post ); // phpcs:ignore
	}


	#endregion -- Icons

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

}
