<?php

namespace TWRP\Plugins\Known_Plugins;

use TWRP\Utils\Helper_Interfaces\Class_Children_Order;

/**
 * Interface that will tell what methods the plugin wrapper classes should
 * implement.
 *
 * @psalm-consistent-constructor The constructor should not have any parameter.
 */
abstract class Post_Rating_Plugin extends Known_Plugin implements Class_Children_Order {

	/**
	 * Get the average rating for a post. Return false if cannot be retrieved.
	 *
	 * @param int|string $post_id The post Id.
	 * @return float|int|false
	 */
	abstract public function get_rating( $post_id );

	/**
	 * Get how many people have rated a post. Return false if cannot be
	 * retrieved.
	 *
	 * @param int|string $post_id The post Id.
	 * @return int|false
	 */
	abstract public function get_rating_count( $post_id );

}
