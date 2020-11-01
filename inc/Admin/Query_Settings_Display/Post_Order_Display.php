<?php
/**
 * File that contains the class with the same name.
 *
 * @phpcs:disable Squiz.Commenting.FunctionComment.Missing
 */

namespace TWRP\Admin\Query_Settings_Display;

use TWRP\Query_Setting\Post_Order;

/**
 * Used to display the post order query setting control.
 */
class Post_Order_Display extends Query_Setting_Display {

	const CLASS_ORDER = 40;

	public function get_setting_class() {
		return new Post_Order();
	}

	public function get_title() {
		return _x( 'Order of posts', 'backend', 'twrp' );
	}

	public function get_submitted_sanitized_setting() {
		if ( isset( $_POST[ Post_Order::get_setting_name() ] ) ) { // phpcs:ignore -- Nonce verified
			// phpcs:ignore -- Nonce verified and the setting is sanitized.
			return Post_Order::sanitize_setting( wp_unslash( $_POST[ Post_Order::get_setting_name() ] ) );
		}

		return Post_Order::get_default_setting();
	}

	public function display_setting( $current_setting ) {
		$first_select_orderby_name  = Post_Order::get_setting_name() . '[' . Post_Order::FIRST_ORDERBY_SELECT_NAME . ']';
		$second_select_orderby_name = Post_Order::get_setting_name() . '[' . Post_Order::SECOND_ORDERBY_SELECT_NAME . ']';
		$third_select_orderby_name  = Post_Order::get_setting_name() . '[' . Post_Order::THIRD_ORDERBY_SELECT_NAME . ']';

		$first_select_order_type_name  = Post_Order::get_setting_name() . '[' . Post_Order::FIRST_ORDER_TYPE_SELECT_NAME . ']';
		$second_select_order_type_name = Post_Order::get_setting_name() . '[' . Post_Order::SECOND_ORDER_TYPE_SELECT_NAME . ']';
		$third_select_order_type_name  = Post_Order::get_setting_name() . '[' . Post_Order::THIRD_ORDER_TYPE_SELECT_NAME . ']';

		$first_orderby_setting  = isset( $current_setting[ Post_Order::FIRST_ORDERBY_SELECT_NAME ] ) ? $current_setting[ Post_Order::FIRST_ORDERBY_SELECT_NAME ] : null;
		$second_orderby_setting = isset( $current_setting[ Post_Order::SECOND_ORDERBY_SELECT_NAME ] ) ? $current_setting[ Post_Order::SECOND_ORDERBY_SELECT_NAME ] : null;
		$third_orderby_setting  = isset( $current_setting[ Post_Order::THIRD_ORDERBY_SELECT_NAME ] ) ? $current_setting[ Post_Order::THIRD_ORDERBY_SELECT_NAME ] : null;

		$first_order_type_setting  = isset( $current_setting[ Post_Order::FIRST_ORDER_TYPE_SELECT_NAME ] ) ? $current_setting[ Post_Order::FIRST_ORDER_TYPE_SELECT_NAME ] : null;
		$second_order_type_setting = isset( $current_setting[ Post_Order::SECOND_ORDER_TYPE_SELECT_NAME ] ) ? $current_setting[ Post_Order::SECOND_ORDER_TYPE_SELECT_NAME ] : null;
		$third_order_type_setting  = isset( $current_setting[ Post_Order::THIRD_ORDER_TYPE_SELECT_NAME ] ) ? $current_setting[ Post_Order::THIRD_ORDER_TYPE_SELECT_NAME ] : null;

		$additional_second_order_class     = '';
		$additional_first_order_type_class = '';
		if ( 'not_applied' === $first_orderby_setting ) {
			$additional_first_order_type_class = ' twrp-hidden';
			$additional_second_order_class     = ' twrp-hidden';
		}

		$additional_third_order_class       = '';
		$additional_second_order_type_class = '';
		if ( 'not_applied' === $second_orderby_setting ) {
			$additional_second_order_type_class = ' twrp-hidden';
			$additional_third_order_class       = ' twrp-hidden';
		}

		$additional_third_order_type_class = '';
		if ( 'not_applied' === $third_orderby_setting ) {
			$additional_third_order_type_class = ' twrp-hidden';
		}

		?>
		<div class="twrp-order-setting">
			<p id="twrp-order-setting__js-first-order-group" class="twrp-order-setting__order-group twrp-query-settings__paragraph">
				<select class="twrp-order-setting__js-orderby" name=<?= esc_attr( $first_select_orderby_name ); ?>>
					<?php $this->display_order_by_select_options( $first_orderby_setting, Post_Order::get_orderby_select_options() ); ?>
					<?php $this->display_order_by_select_options( $first_orderby_setting, Post_Order::get_orderby_single_select_options() ); ?>
				</select>

				<select class="twrp-order-setting__js-order-type<?= esc_html( $additional_first_order_type_class ); ?>" name=<?= esc_attr( $first_select_order_type_name ); ?>>
					<?php $this->display_order_type_select_options( $first_order_type_setting ); ?>
				</select>
			</p>

			<p id="twrp-order-setting__js-second-order-group" class="twrp-order-setting__order-group twrp-query-settings__paragraph<?= esc_html( $additional_second_order_class ); ?>">
				<select class="twrp-order-setting__js-orderby" name=<?= esc_attr( $second_select_orderby_name ); ?>>
					<?php $this->display_order_by_select_options( $second_orderby_setting, Post_Order::get_orderby_select_options() ); ?>
				</select>

				<select class="twrp-order-setting__js-order-type<?= esc_html( $additional_second_order_type_class ); ?>" name=<?= esc_attr( $second_select_order_type_name ); ?>>
					<?php $this->display_order_type_select_options( $second_order_type_setting ); ?>
				</select>
			</p>

			<p id="twrp-order-setting__js-third-order-group" class="twrp-order-setting__order-group twrp-query-settings__paragraph<?= esc_html( $additional_third_order_class ); ?>">
				<select class="twrp-order-setting__js-orderby" name=<?= esc_attr( $third_select_orderby_name ); ?>>
					<?php $this->display_order_by_select_options( $third_orderby_setting, Post_Order::get_orderby_select_options() ); ?>
				</select>

				<select class="twrp-order-setting__js-order-type<?= esc_html( $additional_third_order_type_class ); ?>" name=<?= esc_attr( $third_select_order_type_name ); ?>>
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
	 * @param array $options
	 * @return void
	 */
	protected function display_order_by_select_options( $current_setting, $options ) {
		if ( ! isset( $current_setting ) ) {
			$current_setting = 'not_applied';
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

}
