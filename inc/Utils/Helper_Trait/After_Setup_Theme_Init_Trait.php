<?php

namespace TWRP\Utils\Helper_Trait;

trait After_Setup_Theme_Init_Trait {

	/**
	 * Called before anything else, to initialize actions and filters.
	 *
	 * Always called at 'after_setup_theme' action. Other things added here should be
	 * additionally checked, for example by admin hooks, or whether or not to be
	 * included in special pages, ...etc.
	 *
	 * This function should not depend on whether or not other init functions
	 * from other classes have been executed.
	 *
	 * @return void
	 */
	public static function after_setup_theme_init() {
		// Do nothing.
	}
}
