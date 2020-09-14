<?php

namespace TWRP\Article_Block;

/**
 * Create functions to get each widget setting, instead of getting them through
 * $setting['setting_key'].
 */
trait Get_Widget_Settings_Trait {

	/**
	 * Holds the query settings.
	 *
	 * @var array
	 */
	protected $settings;

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

}
