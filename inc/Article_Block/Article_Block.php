<?php
/**
 * File that contains the abstract class of the article blocks.
 */

namespace TWRP\Article_Block;

use TWRP\Database\General_Options;
use TWRP\Plugins\Post_Views;
use TWRP\Icons\Icon_Factory;

use TWRP\Utils\Class_Retriever_Utils;
use TWRP\Utils\Directory_Utils;
use TWRP\Utils\Date_Utils;
use TWRP\Utils\Helper_Trait\Class_Children_Order_Trait;

use TWRP\Article_Block\Component\Artblock_Component;
use TWRP\Article_Block\Settings\Artblock_Setting;

use WP_Post;
use RuntimeException;

/**
 * The abstract for an article block. By extending this class, a class can
 * be declared an article block.
 *
 * Definition: An article block is how a post can be displayed in the widget.
 * It can be displayed as a simple title, where a user can click on it(it can
 * also have some metadata like the author or the date), or it can be displayed
 * maybe as a title and alongside a thumbnail, like YouTube do. Or maybe we want
 * to display a custom WooCommerce product. The possibilities are very large.
 *
 * If you want to sanitize the widgets settings(usually you don't need because
 * they are sanitized before adding in database), call
 * sanitize_widget_settings() function externally.
 */
abstract class Article_Block {

	use Class_Children_Order_Trait;

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
	 * Holds the query settings.
	 *
	 * @var array
	 */
	protected $settings;

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
	final public function __construct( $widget_id, $query_id, $settings ) {
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
	 * Create the block for each post inside of the array.
	 *
	 * @param array<WP_Post> $query_posts
	 * @return void
	 */
	public function display_blocks( $query_posts ) {
		global $post;

		foreach ( $query_posts as $query_post ) {
			$post = $query_post; // phpcs:ignore -- We reset it.
			setup_postdata( $query_post );
			$this->include_template();
		}
	}

	/**
	 * Include the template that should be displayed in the frontend.
	 *
	 * @return void
	 * @psalm-suppress UnresolvableInclude
	 */
	public function include_template() {
		$artblock = $this;
		include Directory_Utils::get_template_directory_path() . static::get_file_name();
	}

	/**
	 * Get the components that can be edited for this artblock.
	 *
	 * @return array<Artblock_Component>
	 */
	abstract public function get_components();

	/**
	 * Get an array of artblock class settings names.
	 *
	 * @return array<Artblock_Setting>
	 */
	abstract public function get_artblock_settings();

	/**
	 * Display the article block settings in the Widgets::form().
	 *
	 * @return void
	 */
	public function display_form_settings() {
		$settings = $this->get_artblock_settings();
		foreach ( $settings as $query_artblock_setting ) {
			$query_artblock_setting->display_setting();
		}

		// Display the components settings.
		$components = $this->get_components();
		Artblock_Component::display_components( $components );
	}

	/**
	 * Sanitize the widget settings of this specific article block.
	 *
	 * @param bool $set_internal Whether or not to set the object settings to
	 * the one sanitized. Default to true.
	 * @return array The new array of settings.
	 */
	public function sanitize_widget_settings( $set_internal = true ) {
		$components         = $this->get_components();
		$sanitized_settings = array();

		foreach ( $components as $component ) {
			$sanitized_settings[ $component->get_component_name() ] = $component->sanitize_settings();
		}

		$query_settings = $this->get_artblock_settings();

		foreach ( $query_settings as $query_artblock_setting ) {
			$sanitized_settings[ $query_artblock_setting->get_setting_name() ] = $query_artblock_setting->sanitize_setting();
		}

		if ( $set_internal ) {
			$this->settings = $sanitized_settings;
		}

		return $sanitized_settings;
	}


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

	#region -- Verify if meta post information is displayed

	/**
	 * Whether or not the thumbnail exist and must be displayed in the article.
	 *
	 * @return bool
	 */
	public function thumbnail_exist_and_displayed() {
		$display_thumbnail = isset( $this->settings['display_post_thumbnail'] ) && $this->settings['display_post_thumbnail'];
		$thumbnail_exist   = has_post_thumbnail();

		return $display_thumbnail && $thumbnail_exist;
	}

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

	#endregion -- Verify if meta post information is displayed

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
				/* translators: %s: a date representation, in the website language. Ex: 2 days ago, 3 weeks ago,  1 month ago... etc */
				$date_text = sprintf( __( '%s ago', 'twrp' ), human_time_diff( $from, $to ) );
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

	#region -- Display Icons Functions

	/**
	 * Include the HTML svg for the author icon.
	 *
	 * @return void
	 */
	public function display_author_icon() {
		echo $this->get_author_icon_html(); // phpcs:ignore -- No XSS.
	}

	/**
	 * Return the svg for the author icon.
	 *
	 * @return string The HTML is safe for output.
	 */
	public function get_author_icon_html() {
		try {
			$icon = Icon_Factory::get_icon( $this->get_selected_author_icon() );
			return $icon->get_html();
		} catch ( RuntimeException $e ) {
			return '';
		}
	}

	/**
	 * Get the Id of the selected author icon. Empty if nothing is set(usually
	 * should not be encounter).
	 *
	 * @return string
	 */
	protected function get_selected_author_icon() {
		$option = General_Options::get_option( General_Options::AUTHOR_ICON );

		if ( ! is_string( $option ) ) {
			return '';
		}

		return $option;
	}

	/**
	 * Include the HTML svg for the date icon.
	 *
	 * @return void
	 */
	public function display_date_icon() {
		echo $this->get_date_icon_html(); // phpcs:ignore -- No XSS.
	}

	/**
	 * Return the svg for the date icon.
	 *
	 * @return string The HTML is safe for output.
	 */
	public function get_date_icon_html() {
		try {
			$icon = Icon_Factory::get_icon( $this->get_selected_date_icon() );
			return $icon->get_html();
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
	protected function get_selected_date_icon() {
		$option = General_Options::get_option( General_Options::DATE_ICON );

		if ( ! is_string( $option ) ) {
			return '';
		}
		return $option;
	}

	/**
	 * Include the HTML svg for the views icon.
	 *
	 * @return void
	 */
	public function display_views_icon() {
		echo $this->get_views_icon_html(); // phpcs:ignore -- No XSS.
	}

	/**
	 * Return the svg for the views icon.
	 *
	 * @return string The HTML is safe for output.
	 */
	public function get_views_icon_html() {
		try {
			$icon = Icon_Factory::get_icon( $this->get_selected_date_icon() );
			return $icon->get_html();
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
	protected function get_selected_views_icon() {
		$option = General_Options::get_option( General_Options::VIEWS_ICON );

		if ( ! is_string( $option ) ) {
			return '';
		}
		return $option;
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
		echo $this->get_comments_icon_html( $post ); // phpcs:ignore -- No XSS.
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
			$icon = Icon_Factory::get_icon( $comments_icon );
			return $icon->get_html();
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
	protected function get_selected_comments_icon() {
		$option = General_Options::get_option( General_Options::COMMENTS_ICON );

		if ( ! is_string( $option ) ) {
			return '';
		}
		return $option;
	}

	/**
	 * Get the Id of the selected comments disabled icon. Empty if nothing is
	 * set(usually should not be encounter).
	 *
	 * @return string
	 */
	protected function get_selected_disabled_comments_icon() {
		$option = General_Options::get_option( General_Options::COMMENTS_DISABLED_ICON );

		if ( ! is_string( $option ) ) {
			return '';
		}
		return $option;
	}

	// Todo: need to add more functions.

	#endregion -- Icons

	#region -- Helper methods

	/**
	 * Get the date format to display, or to display in the human readable form.
	 *
	 * @return string Either the date format, or HUMAN_READABLE to signal that
	 * the relative human readable string should be used. An empty string means
	 * to use the default WP date format.
	 */
	public function get_date_format() {
		if ( 'true' === General_Options::get_option( General_Options::HUMAN_READABLE_DATE ) ) {
			return 'HUMAN_READABLE';

		} else {
			return General_Options::get_option( General_Options::DATE_FORMAT );
		}
	}

	/**
	 * Factory function to construct if a name exist.
	 *
	 * @throws \RuntimeException If class is not found.
	 *
	 * @param string $name_or_id For the name of the class, can be either just
	 *                           the class name, or fully qualified name.
	 * @param int|string $widget_id A numerical parameter.
	 * @param int|string $query_id A numerical parameter.
	 * @param array $settings
	 * @return Article_Block
	 */
	public static function construct_class_by_name_or_id( $name_or_id, $widget_id, $query_id, $settings ) {
		$artblock_class_names  = Class_Retriever_Utils::get_all_article_block_names();
		$founded_artblock_name = '';

		foreach ( $artblock_class_names as $artblock_name ) {
			// find the class by id.
			if ( $artblock_name::get_id() === $name_or_id ) {
				$founded_artblock_name = $artblock_name;
				break;
			}

			// Find the class by class name. Verify if not empty first because otherwise PHP throw warning.
			if ( ! empty( $name_or_id ) && strpos( $artblock_name, $name_or_id ) !== false ) {
				$founded_artblock_name = $artblock_name;
				break;
			}
		}

		if ( ! class_exists( $founded_artblock_name ) ) {
			throw new \RuntimeException( 'Could not find class ' . $founded_artblock_name );
		} else {
			return new $founded_artblock_name( $widget_id, $query_id, $settings );
		}

	}

	/**
	 * Return whether or not the article block is registered.
	 *
	 * @param string $artblock_id
	 * @return bool
	 */
	public static function article_block_id_exist( $artblock_id ) {
		$article_block_names = Class_Retriever_Utils::get_all_article_block_names();

		foreach ( $article_block_names as $article_block_name ) {
			if ( $article_block_name::get_id() === $artblock_id ) {
				return true;
			}
		}

		return false;
	}

	#endregion -- Helper methods

}
