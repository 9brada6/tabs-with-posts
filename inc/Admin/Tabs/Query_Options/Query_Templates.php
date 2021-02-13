<?php

namespace TWRP\Admin\Tabs\Query_Options;

use TWRP\Query_Generator\Query_Setting\Post_Order;

/**
 * Class that is used to declare the starting templates for query settings.
 *
 * To add a template:
 * 1. Add a const with the name id that you want.
 * 2. Add the option name in get_all_query_posts_templates_options() function.
 * 3. Add a function that sets the template settings.
 */
class Query_Templates {

	const LAST_POSTS__TEMPLATE_NAME = 'last_posts_template';

	const MOST_COMMENTED__TEMPLATE_NAME = 'most_commented_template';

	/**
	 * Get an array with the template id as key and the template display name as
	 * value.
	 *
	 * @return array
	 */
	public function get_all_query_posts_templates_options() {
		return array(
			self::LAST_POSTS__TEMPLATE_NAME     => _x( 'Last Posts Template', 'backend', 'twrp' ),
			self::MOST_COMMENTED__TEMPLATE_NAME => _x( 'Most Commented Template', 'backend', 'twrp' ),
		);
	}

	/**
	 * Get an array with the template id as key and the template settings as a
	 * value.
	 *
	 * @return array
	 */
	public function get_all_query_posts_templates() {
		return array(
			self::LAST_POSTS__TEMPLATE_NAME     => $this->get_last_posts_template_settings(),
			self::MOST_COMMENTED__TEMPLATE_NAME => $this->get_most_commented_template_settings(),
		);
	}

	/**
	 * Get the settings for last posts template.
	 *
	 * @return array
	 */
	public function get_last_posts_template_settings() {
		$post_order_class = new Post_Order();
		$setting_prefix   = $post_order_class->get_setting_name();

		return array(
			$setting_prefix . '[' . $post_order_class::FIRST_ORDERBY_SELECT_NAME . ']' => 'date',
			$setting_prefix . '[' . $post_order_class::FIRST_ORDER_TYPE_SELECT_NAME . ']' => 'DESC',
		);
	}

	/**
	 * Get the settings for most commented posts template.
	 *
	 * @return array
	 */
	public function get_most_commented_template_settings() {
		$post_order_class = new Post_Order();
		$setting_prefix   = $post_order_class->get_setting_name();

		return array(
			$setting_prefix . '[' . $post_order_class::FIRST_ORDERBY_SELECT_NAME . ']' => 'comment_count',
			$setting_prefix . '[' . $post_order_class::FIRST_ORDER_TYPE_SELECT_NAME . ']' => 'DESC',
			$setting_prefix . '[' . $post_order_class::SECOND_ORDERBY_SELECT_NAME . ']' => 'date',
			$setting_prefix . '[' . $post_order_class::SECOND_ORDER_TYPE_SELECT_NAME . ']' => 'DESC',
		);
	}
}
