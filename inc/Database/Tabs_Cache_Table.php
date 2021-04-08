<?php

namespace TWRP\Database;

class Tabs_Cache_Table {

	const TABLE_NAME = 'twrp_widget_cache';

	private $widget_id = null;

	private $query_id = null;

	private $post_id = null;

	public function __construct( $widget_id, $query_id, $post_id = 0 ) {
		$this->widget_id = $widget_id;
		$this->query_id  = $query_id;
		$this->post_id   = $post_id;
	}

	public function get_widget_html() {
		global $wpdb;
		$table_name = $wpdb->prefix . self::TABLE_NAME;
		$widget_id  = $this->widget_id;
		$query_id   = $this->query_id;
		$post_id    = $this->post_id;

		$results = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT html FROM $table_name WHERE widget_id=%d AND query_id=%s AND post_id=%d",
				$widget_id,
				$query_id,
				$post_id
			),
			ARRAY_A
		);

		if ( is_array( $results ) && isset( $results[0], $results[0]['html'] ) ) {
			return $results[0]['html'];
		}

		return '';
	}

	public function update_widget_html( $html ) {
		global $wpdb;

		$table_name   = $wpdb->prefix . self::TABLE_NAME;
		$widget_id    = $this->widget_id;
		$query_id     = $this->query_id;
		$post_id      = $this->post_id;
		$current_time = time();
		$post_id      = 0;

		// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery
		$wpdb->query(
			$wpdb->prepare(
				// phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared
				"INSERT INTO {$table_name} (widget_id,query_id,post_id,html,time_generated) VALUES (%d,%s,%s,%s,%d) ON DUPLICATE KEY UPDATE html=%s, time_generated=%d",
				$widget_id,
				$query_id,
				$post_id,
				$html,
				$current_time,
				$html,
				$current_time
			)
		);

	}

	#region -- Create cache table.

	/**
	 * Create the table on plugin activation.
	 *
	 * @return void
	 */
	public static function create_table_on_plugin_activation() {
		static::create_table();
	}

	/**
	 * Create a table to hold the tabs HTML.
	 *
	 * @return void
	 * @psalm-suppress UnresolvableInclude
	 * @psalm-suppress UndefinedConstant
	 * @psalm-suppress MissingFile
	 */
	public static function create_table() {
		global $wpdb;

		$table_name      = $wpdb->prefix . self::TABLE_NAME;
		$charset_collate = $wpdb->get_charset_collate();

		$sql = "CREATE TABLE $table_name (
			id int NOT NULL AUTO_INCREMENT,
			widget_id int NOT NULL,
			query_id varchar(16) NOT NULL,
			post_id int NOT NULL,
			html text NOT NULL,
			time_generated varchar(16) NOT NULL,
			PRIMARY KEY  (id),
			UNIQUE KEY widget_id (widget_id,query_id,post_id)
		) $charset_collate;";

		require_once \ABSPATH . 'wp-admin/includes/upgrade.php'; // @phan-suppress-current-line PhanMissingRequireFile
		dbDelta( $sql );
	}

	#endregion -- Create cache table.

}
