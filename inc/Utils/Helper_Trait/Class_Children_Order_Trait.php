<?php

namespace TWRP\Utils\Helper_Trait;

trait Class_Children_Order_Trait {

	/**
	 * Get the order in which the class should be retrieved among it's children.
	 *
	 * @return int
	 */
	abstract public static function get_class_order_among_siblings();

}
