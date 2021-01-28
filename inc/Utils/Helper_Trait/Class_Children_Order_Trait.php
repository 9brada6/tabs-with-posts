<?php

namespace TWRP\Utils\Helper_Trait;

/**
 * Trait that can be used in an abstract class, to make the child classes order
 * by a number when retrieving dynamically(via class parent).
 *
 * Without this kind of trait, all settings will be in different order each
 * time a page is visited.
 */
trait Class_Children_Order_Trait {

	/**
	 * Get the order in which the class should be retrieved among it's children.
	 *
	 * @return int
	 */
	public static function get_class_order_among_siblings() {
		return 9999;
	}
}
