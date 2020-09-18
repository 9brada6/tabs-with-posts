<?php
/**
 * File that contains the trait with the same name.
 */

namespace TWRP\Article_Block;

/**
 * Create functions to get each widget setting, instead of getting them through
 * $setting['setting_key']. This will allow for greater flexibility in the future.
 */
trait Get_Widget_Settings_Trait {

	/**
	 * Holds the query settings.
	 *
	 * @var array
	 */
	protected $settings;

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

	#region -- Get widget icons setting

	/**
	 * Get the widget author icon id.
	 *
	 * If is not set or the setting doesn't exist, return empty string.
	 *
	 * @return string Empty string if setting doesn't exist.
	 */
	protected function get_widget_author_icon() {
		if ( isset( $this->settings['date']['author_icon'] ) ) {
			return $this->settings['date']['author_icon'];
		}
		return '';
	}

	/**
	 * Get the widget date icon id.
	 *
	 * If is not set or the setting doesn't exist, return empty string.
	 *
	 * @return string Empty string if setting doesn't exist.
	 */
	protected function get_widget_date_icon() {
		if ( isset( $this->settings['date']['date_icon'] ) ) {
			return $this->settings['date']['date_icon'];
		}
		return '';
	}

	/**
	 * Get the widget comments icon id.
	 *
	 * If is not set or the setting doesn't exist, return empty string.
	 *
	 * @return string Empty string if setting doesn't exist.
	 */
	protected function get_widget_comments_icon() {
		if ( isset( $this->settings['date']['comments_icon'] ) ) {
			return $this->settings['date']['comments_icon'];
		}
		return '';
	}

	/**
	 * Get the widget comments disabled icon id.
	 *
	 * If is not set or the setting doesn't exist, return empty string.
	 *
	 * @return string Empty string if setting doesn't exist.
	 */
	protected function get_widget_comments_disabled_icon() {
		if ( isset( $this->settings['date']['comments_disabled_icon'] ) ) {
			return $this->settings['date']['comments_disabled_icon'];
		}
		return '';
	}

	/**
	 * Get the widget views icon id.
	 *
	 * If is not set or the setting doesn't exist, return empty string.
	 *
	 * @return string Empty string if setting doesn't exist.
	 */
	protected function get_widget_views_icon() {
		if ( isset( $this->settings['date']['views_icon'] ) ) {
			return $this->settings['date']['views_icon'];
		}
		return '';
	}

	#region -- Get widget icons setting

}
