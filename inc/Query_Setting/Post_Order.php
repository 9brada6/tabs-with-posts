<?php
/**
 * Contains the class that will select the order in which the posts are
 * displayed.
 *
 * @todo: Add more order by options.
 * @todo: If an option is choose, then remove the option from the next one/two
 * select possibilities.
 * @todo: Add notes.
 */

namespace TWRP\Query_Setting;

use TWRP\Plugins\Post_Views;

/**
 * Creates the possibility to select the order in which the posts will be
 * displayed.
 */
class Post_Order implements Query_Setting {

	/**
	 * The name of the first select to set orderby.
	 */
	const FIRST_ORDERBY_SELECT_NAME = 'first_orderby';

	/**
	 * The name of the second select to set orderby.
	 */
	const SECOND_ORDERBY_SELECT_NAME = 'second_orderby';

	/**
	 * The name of the third select to set orderby.
	 */
	const THIRD_ORDERBY_SELECT_NAME = 'third_orderby';

	/**
	 * The name of the first select to set the ascending or descending order.
	 */
	const FIRST_ORDER_TYPE_SELECT_NAME = 'first_order_type';

	/**
	 * The name of the second select to set the ascending or descending order.
	 */
	const SECOND_ORDER_TYPE_SELECT_NAME = 'second_order_type';

	/**
	 * The name of the third select to set the ascending or descending order.
	 */
	const THIRD_ORDER_TYPE_SELECT_NAME = 'third_order_type';

	/**
	 * Orderby key that will be replaced with a custom order implemented by a
	 * plugin.
	 */
	const PLUGIN_DFACTORY_ORDERBY_VALUE = 'post_views_dfactory';

	/**
	 * Orderby key that will be replaced with a custom order implemented by a
	 * plugin.
	 */
	const PLUGIN_GAMERZ_VIEWS_ORDERBY_VALUE = 'post_views_gamerz';

	/**
	 * Orderby key that will be replaced with a custom order implemented by a
	 * plugin.
	 */
	const PLUGIN_BLAZK_ORDERBY_VALUE = 'post_views_gamerz';

	/**
	 * Orderby key that will be replaced with a custom order implemented by a
	 * plugin.
	 */
	const PLUGIN_GAMERZ_RATING_ORDERBY_VALUE = 'post_rating_gamerz';


	/**
	 * The name of the HTML form input and of the array key that stores the option of the query.
	 *
	 * @return string
	 */
	public static function get_setting_name() {
		return 'post_order';
	}

	/**
	 * The title of the setting accordion.
	 *
	 * @return string
	 */
	public function get_title() {
		return _x( 'Order of posts', 'backend', 'twrp' );
	}

	/**
	 * Whether or not when displaying the setting in the backend only the title
	 * is shown and the setting HTML is hidden(return false), or both are
	 * shown(return true).
	 *
	 * @return bool
	 */
	public static function setting_is_collapsed() {
		return true;
	}

	/**
	 * Display the backend HTML for the setting.
	 *
	 * @param array $current_setting An array filled with only the settings that
	 * this class work with. The settings are sanitized.
	 * @return void
	 */
	public function display_setting( $current_setting ) {
		$first_select_orderby_name  = self::get_setting_name() . '[' . self::FIRST_ORDERBY_SELECT_NAME . ']';
		$second_select_orderby_name = self::get_setting_name() . '[' . self::SECOND_ORDERBY_SELECT_NAME . ']';
		$third_select_orderby_name  = self::get_setting_name() . '[' . self::THIRD_ORDERBY_SELECT_NAME . ']';

		$first_select_order_type_name  = self::get_setting_name() . '[' . self::FIRST_ORDER_TYPE_SELECT_NAME . ']';
		$second_select_order_type_name = self::get_setting_name() . '[' . self::SECOND_ORDER_TYPE_SELECT_NAME . ']';
		$third_select_order_type_name  = self::get_setting_name() . '[' . self::THIRD_ORDER_TYPE_SELECT_NAME . ']';

		$first_orderby_setting  = isset( $current_setting[ self::FIRST_ORDERBY_SELECT_NAME ] ) ? $current_setting[ self::FIRST_ORDERBY_SELECT_NAME ] : null;
		$second_orderby_setting = isset( $current_setting[ self::SECOND_ORDERBY_SELECT_NAME ] ) ? $current_setting[ self::SECOND_ORDERBY_SELECT_NAME ] : null;
		$third_orderby_setting  = isset( $current_setting[ self::THIRD_ORDERBY_SELECT_NAME ] ) ? $current_setting[ self::THIRD_ORDERBY_SELECT_NAME ] : null;

		$first_order_type_setting  = isset( $current_setting[ self::FIRST_ORDER_TYPE_SELECT_NAME ] ) ? $current_setting[ self::FIRST_ORDER_TYPE_SELECT_NAME ] : null;
		$second_order_type_setting = isset( $current_setting[ self::SECOND_ORDER_TYPE_SELECT_NAME ] ) ? $current_setting[ self::SECOND_ORDER_TYPE_SELECT_NAME ] : null;
		$third_order_type_setting  = isset( $current_setting[ self::THIRD_ORDER_TYPE_SELECT_NAME ] ) ? $current_setting[ self::THIRD_ORDER_TYPE_SELECT_NAME ] : null;

		?>
		<div class="twrp-order-setting">
			<p id="twrp-order-setting__js-first-order-group" class="twrp-order-setting__order-group twrp-query-settings__paragraph">
				<select class="twrp-order-setting__js-orderby" name=<?= esc_attr( $first_select_orderby_name ); ?>>
					<?php $this->display_order_by_select_options( $first_orderby_setting ); ?>
					<?php $this->display_order_by_select_options( $first_orderby_setting, self::get_orderby_plugin_select_options() ); ?>
				</select>

				<select class="twrp-order-setting__js-order-type" name=<?= esc_attr( $first_select_order_type_name ); ?>>
					<?php $this->display_order_type_select_options( $first_order_type_setting ); ?>
				</select>
			</p>

			<p id="twrp-order-setting__js-second-order-group" class="twrp-order-setting__order-group twrp-query-settings__paragraph-with-hide">
				<select class="twrp-order-setting__js-orderby" name=<?= esc_attr( $second_select_orderby_name ); ?>>
					<?php $this->display_order_by_select_options( $second_orderby_setting ); ?>
				</select>

				<select class="twrp-order-setting__js-order-type" name=<?= esc_attr( $second_select_order_type_name ); ?>>
					<?php $this->display_order_type_select_options( $second_order_type_setting ); ?>
				</select>
			</p>

			<p id="twrp-order-setting__js-third-order-group" class="twrp-order-setting__order-group twrp-query-settings__paragraph-with-hide">
				<select class="twrp-order-setting__js-orderby" name=<?= esc_attr( $third_select_orderby_name ); ?>>
					<?php $this->display_order_by_select_options( $third_orderby_setting ); ?>
				</select>

				<select class="twrp-order-setting__js-order-type" name=<?= esc_attr( $third_select_order_type_name ); ?>>
					<?php $this->display_order_type_select_options( $third_order_type_setting ); ?>
				</select>
			</p>
		</div>
		<?php
	}

	/**
	 * Display all possible orderby options to select.
	 *
	 * @param string|null $current_setting Current selected option.
	 * @param array|null $options
	 * @return void
	 */
	protected function display_order_by_select_options( $current_setting, $options = null ) {
		if ( null === $options || ! is_array( $options ) ) {
			$options = self::get_orderby_select_options();
		}

		foreach ( $options as $value => $description ) {
			?>
				<option value=<?= esc_attr( $value ); ?> <?php selected( $value, $current_setting ); ?>>
					<?= esc_html( $description ); ?>
				</option>
			<?php
		}
	}

	/**
	 * Display all possible order type options to select.
	 *
	 * @param string|null $current_setting Current selected option.
	 * @return void
	 */
	protected function display_order_type_select_options( $current_setting ) {
		$options = array(
			'DESC' => 'Descending order',
			'ASC'  => 'Ascending order',
		);

		foreach ( $options as $value => $description ) {
			?>
				<option value=<?= esc_attr( $value ); ?> <?php selected( $value, $current_setting ); ?>>
					<?= esc_html( $description ); ?>
				</option>
			<?php
		}
	}

	/**
	 * Get an array with all orderby select values.
	 *
	 * @return array The array key is the value that should go into WP_Query
	 * arguments parameters and into HTML option value, while the array value
	 * is a text that will be displayed in the front-end select statement.
	 */
	public static function get_orderby_select_options() {
		$select_options = array(
			'not_applied'   => _x( 'Not applied', 'backend', 'twrp' ),
			'none'          => _x( 'No order', 'backend', 'twrp' ),
			'ID'            => _x( 'Order by post id', 'backend', 'twrp' ),
			'author'        => _x( 'Order by author', 'backend', 'twrp' ),
			'name'          => _x( 'Order by post slug', 'backend', 'twrp' ),
			'type'          => _x( 'Order by post type', 'backend', 'twrp' ),
			'date'          => _x( 'Order by date', 'backend', 'twrp' ),
			'modified'      => _x( 'Order by last modified date', 'backend', 'twrp' ),
			'parent'        => _x( 'Order by post/page parent id', 'backend', 'twrp' ),
			'rand'          => _x( 'Random order', 'backend', 'twrp' ),
			'comment_count' => _x( 'Order by number of comments', 'backend', 'twrp' ),
			'relevance'     => _x( 'Order by searched terms', 'backend', 'twrp' ),
		);

		return $select_options;
	}

	public static function get_orderby_plugin_select_options() {
		$select_options = array(
			self::PLUGIN_DFACTORY_ORDERBY_VALUE => _x( '(Plugin DFactory) Order by post views', 'backend', 'twrp' ),
			self::PLUGIN_GAMERZ_VIEWS_ORDERBY_VALUE   => _x( '(Plugin GamerZ) Order by post views', 'backend', 'twrp' ),
		);

		return $select_options;
	}

	/**
	 * The default setting to be retrieved, if user didn't set anything.
	 *
	 * @return array
	 */
	public static function get_default_setting() {
		return array(
			self::FIRST_ORDERBY_SELECT_NAME     => 'not_applied',
			self::SECOND_ORDERBY_SELECT_NAME    => 'not_applied',
			self::THIRD_ORDERBY_SELECT_NAME     => 'not_applied',

			self::FIRST_ORDER_TYPE_SELECT_NAME  => 'DESC',
			self::SECOND_ORDER_TYPE_SELECT_NAME => 'DESC',
			self::THIRD_ORDER_TYPE_SELECT_NAME  => 'DESC',
		);
	}

	/**
	 * Get the setting submitted from the form. The setting is sanitized and
	 * ready to use.
	 *
	 * @return array
	 */
	public function get_submitted_sanitized_setting() {
		if ( isset( $_POST[ self::get_setting_name() ] ) ) { // phpcs:ignore -- Nonce verified
			// phpcs:ignore -- Nonce verified and the setting is sanitized.
			return self::sanitize_setting( wp_unslash( $_POST[ self::get_setting_name() ] ) );
		}

		return self::get_default_setting();
	}

	/**
	 * Sanitize a variable, to be safe for processing.
	 *
	 * @param mixed $setting
	 * @return array
	 */
	public static function sanitize_setting( $setting ) {
		$sanitized_setting = self::sanitize_orderby_parameters( $setting );
		$sanitized_setting = self::plugin_additional_sanitization( $sanitized_setting );

		return $sanitized_setting;
	}

	protected static function sanitize_orderby_parameters( $setting ) {
		$sanitized_setting = self::get_default_setting();
		$setting           = wp_parse_args( $setting, self::get_default_setting() );

		$orderby_options        = array_keys( self::get_orderby_select_options() );
		$plugin_orderby_options = array_keys( self::get_orderby_plugin_select_options() );
		$valid_orderby_options  = array_merge( $orderby_options, $plugin_orderby_options );

		$order_type_options = array( 'DESC', 'ASC' );

		$orderby_settings_keys = array(
			self::FIRST_ORDERBY_SELECT_NAME,
			self::SECOND_ORDERBY_SELECT_NAME,
			self::THIRD_ORDERBY_SELECT_NAME,
		);

		$order_type_settings_keys = array(
			self::FIRST_ORDER_TYPE_SELECT_NAME,
			self::SECOND_ORDER_TYPE_SELECT_NAME,
			self::THIRD_ORDER_TYPE_SELECT_NAME,
		);

		// Sanitize orderby Settings, check if elements are valid and if one of
		// the element in the array setting equals 'not_applied', then all
		// elements after will also equal 'not_applied.'
		$must_apply_next_orderby = true;
		foreach ( $orderby_settings_keys as $orderby_key ) {
			$is_valid_option = in_array( $setting[ $orderby_key ], $valid_orderby_options, true );

			if ( ! $is_valid_option || ! $must_apply_next_orderby ) {
				$setting[ $orderby_key ] = 'not_applied';
			}

			if ( ( 'not_applied' === $setting[ $orderby_key ] ) ) {
				$must_apply_next_orderby = false;
			}

			$sanitized_setting[ $orderby_key ] = $setting[ $orderby_key ];
		}

		foreach ( $order_type_settings_keys as $order_type_key ) {
			$is_valid_setting = in_array( $setting[ $order_type_key ], $order_type_options, true );
			if ( ! $is_valid_setting ) {
				$setting[ $order_type_key ] = 'DESC';
			}

			$sanitized_setting[ $order_type_key ] = $setting[ $order_type_key ];
		}

		return $sanitized_setting;
	}

	protected static function plugin_additional_sanitization( $settings ) {
		if ( ! in_array( self::PLUGIN_DFACTORY_ORDERBY_VALUE, $settings, true ) ) {
			return $settings;
		}

		$settings[ self::FIRST_ORDERBY_SELECT_NAME ] = self::PLUGIN_DFACTORY_ORDERBY_VALUE;

		$settings[ self::SECOND_ORDERBY_SELECT_NAME ]    = 'not_applied';
		$settings[ self::THIRD_ORDERBY_SELECT_NAME ]     = 'not_applied';
		$settings[ self::SECOND_ORDER_TYPE_SELECT_NAME ] = 'DESC';
		$settings[ self::THIRD_ORDER_TYPE_SELECT_NAME ]  = 'DESC';

		return $settings;
	}

	/**
	 * Create and insert the new arguments for the WP_Query.
	 *
	 * The previous query arguments will be modified such that will also contain
	 * the new settings, and will return the new query arguments to be passed
	 * into WP_Query class.
	 *
	 * @param array $previous_query_args The query arguments before being modified.
	 * @param mixed $query_settings All query settings, these settings are sanitized.
	 * @return array The new arguments modified.
	 */
	public static function add_query_arg( $previous_query_args, $query_settings ) {
		$previous_query_args = self::add_wp_query_arg( $previous_query_args, $query_settings );
		$previous_query_args = Post_Views::modify_query_arg_if_necessary( $previous_query_args, $query_settings );

		return $previous_query_args;
	}

	public static function add_wp_query_arg( $previous_query_args, $query_settings ) {
		$orderby  = array();
		$settings = $query_settings[ self::get_setting_name() ];

		$setting_names = array(
			self::FIRST_ORDERBY_SELECT_NAME  => self::FIRST_ORDER_TYPE_SELECT_NAME,
			self::SECOND_ORDERBY_SELECT_NAME => self::SECOND_ORDER_TYPE_SELECT_NAME,
			self::THIRD_ORDERBY_SELECT_NAME  => self::THIRD_ORDER_TYPE_SELECT_NAME,
		);

		foreach ( $setting_names as $orderby_setting_name => $order_type_name ) {
			if ( 'not_applied' === $settings[ $orderby_setting_name ] ) {
				break;
			}

			$orderby[ $settings[ $orderby_setting_name ] ] = $settings[ $order_type_name ];
		}

		if ( empty( $orderby ) ) {
			return $previous_query_args;
		}

		$previous_query_args['orderby'] = $orderby;
		return $previous_query_args;
	}

}
