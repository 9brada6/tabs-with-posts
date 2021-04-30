<?php

namespace TWRP\Database;

use TWRP\Utils\Class_Retriever_Utils;

/**
 * Class used to manage the cleaning of database when needed.
 */
class Manage_Clean_Database {
	public static function delete_all_plugin_database_entries() {
		$all_class_names = Class_Retriever_Utils::get_all_clean_database_class_names();

		foreach ( $all_class_names as $class_name ) {
			$class_name::clean_database();
		}
	}
}
