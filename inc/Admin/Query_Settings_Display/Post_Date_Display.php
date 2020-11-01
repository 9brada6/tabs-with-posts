<?php
/**
 * File that contains the class with the same name.
 *
 * @phpcs:disable Squiz.Commenting.FunctionComment.Missing
 */

namespace TWRP\Admin\Query_Settings_Display;

use TWRP\Query_Setting\Post_Date;

/**
 * Used to display the post date query setting control.
 */
class Post_Date_Display extends Query_Setting_Display {

	const CLASS_ORDER = 70;

	protected function get_setting_class() {
		return new Post_Date();
	}

	public function get_title() {
		return _x( 'Filter by date', 'backend', 'twrp' );
	}

	public function get_submitted_sanitized_setting() {
		if ( isset( $_POST[ Post_Date::get_setting_name() ] ) ) { // phpcs:ignore -- Nonce verified
			// phpcs:ignore -- Nonce verified and the setting is sanitized.
			return Post_Date::sanitize_setting( wp_unslash( $_POST[ Post_Date::get_setting_name() ] ) );
		}

		return Post_Date::get_default_setting();
	}

	#region -- Display Settings

	public function display_setting( $current_setting ) {
		?>
		<div class="twrp-date-settings">
			<?php $this->display_date_filter_type( $current_setting[ Post_Date::DATE_TYPE_NAME ] ); ?>
			<?php $this->display_last_period_of_time_settings( $current_setting ); ?>
			<?php $this->display_between_fixed_point_in_time_settings( $current_setting ); ?>
		</div>
		<?php
	}

	/**
	 * Display the setting to select the type of date that the articles will be
	 * filter on.
	 *
	 * @param string $date_type
	 * @return void
	 */
	protected function display_date_filter_type( $date_type ) {
		?>
		<div class="twrp-date-settings__type-selector-wrapper twrp-query-settings__paragraph">
			<select id="twrp-date-settings__js-date-type" name="<?= esc_attr( Post_Date::get_setting_name() . '[' . Post_Date::DATE_TYPE_NAME . ']' ) ?>">
				<option value="NA" <?php selected( 'NA', $date_type ); ?>>
					<?= _x( 'Not Applied', 'backend', 'twrp' ) ?>
				</option>

				<option value="LT" <?php selected( 'LT', $date_type ); ?>>
					<?= _x( 'Last period of time', 'backend', 'twrp' ) ?>
				</option>

				<option value="FT" <?php selected( 'FT', $date_type ); ?>>
					<?= _x( 'Between points in time', 'backend', 'twrp' ) ?>
				</option>
			</select>
		</div>
		<?php
	}

	/**
	 * Display the radio buttons to choose to display posts from last periods of
	 * time, like last week/month/year... etc, or a custom number of days.
	 *
	 * @param array $current_setting
	 * @return void
	 */
	protected function display_last_period_of_time_settings( $current_setting ) {
		$name           = Post_Date::get_setting_name() . '[' . Post_Date::DATE_LAST_PERIOD_NAME . ']';
		$last_days_name = Post_Date::get_setting_name() . '[' . Post_Date::DATE_LAST_DAYS_NAME . ']';

		$last_period = '';
		if ( isset( $current_setting[ Post_Date::DATE_LAST_PERIOD_NAME ] ) ) {
			$last_period = $current_setting[ Post_Date::DATE_LAST_PERIOD_NAME ];
		}

		$last_days_num = '';
		if ( isset( $current_setting[ Post_Date::DATE_LAST_DAYS_NAME ] ) && is_numeric( $current_setting[ Post_Date::DATE_LAST_DAYS_NAME ] ) ) {
			$last_days_num = $current_setting[ Post_Date::DATE_LAST_DAYS_NAME ];
		}

		$additional_settings_hidden_class = '';
		if ( ( ! isset( $current_setting[ Post_Date::DATE_TYPE_NAME ] ) ) || ( 'LT' !== $current_setting[ Post_Date::DATE_TYPE_NAME ] ) ) {
			$additional_settings_hidden_class = ' twrp-hidden';
		}

		$note_label = _x( 'Note:', 'backend', 'twrp' );
		$note_text  = _x( 'You can either put a number of days manually(7 for week, 30 for a month, ..etc), or calculate the first day of last week/month and include everything after.', 'backend', 'twrp' );

		$note_label2 = _x( 'Note 2:', 'backend', 'twrp' );
		$note_text2  = _x( 'When putting a custom number of days, do not forget to also check the last option.', 'backend', 'twrp' );

		?>
		<div id="twrp-date-settings__js-last-period-wrapper" class="twrp-date-settings__last-period-wrapper twrp-query-settings__paragraph twrp-query-settings__paragraph<?= esc_attr( $additional_settings_hidden_class ); ?>">
			<p class="twrp-query-settings__paragraph twrp-setting-note">
				<span class="twrp-setting-note__label">
					<?= esc_html( $note_label ); ?>
				</span>
				<span class="twrp-setting-note__text">
					<?= esc_html( $note_text ); ?>
				</span>
			</p>

			<p class="twrp-query-settings__paragraph twrp-setting-note">
				<span class="twrp-setting-note__label">
				<?= esc_html( $note_label2 ); ?>
				</span>
				<span class="twrp-setting-note__text">
				<?= esc_html( $note_text2 ); ?>
				</span>
			</p>

			<p class="twrp-query-settings__checkbox-line">
				<input id="twrp-date-settings__last-week" type="radio" value="LW"
					name="<?= esc_attr( $name ) ?>"
					<?php checked( 'LW', $last_period ); ?>
				/>
				<label for="twrp-date-settings__last-week">
					<?= _x( 'This and last week', 'backend', 'twrp' ); ?>
				</label>
			</p>

			<p class="twrp-query-settings__checkbox-line">
				<input id="twrp-date-settings__last-month" type="radio" value="LM"
					name="<?= esc_attr( $name ) ?>"
					<?php checked( 'LM', $last_period ); ?>
				/>
				<label for="twrp-date-settings__last-month">
					<?= _x( 'This and last month', 'backend', 'twrp' ); ?>
				</label>
			</p>

			<p class="twrp-query-settings__checkbox-line">
				<input id="twrp-date-settings__this-year" type="radio" value="TY"
					name="<?= esc_attr( $name ) ?>"
					<?php checked( 'TY', $last_period ); ?>
				/>
				<label for="twrp-date-settings__this-year">
					<?= _x( 'This year', 'backend', 'twrp' ); ?>
				</label>
			</p>

			<p class="twrp-query-settings__checkbox-line twrp-date-settings__custom-last-days-wrapper">
				<input id="twrp-date-settings__js-custom" type="radio" value="C"
					name="<?= esc_attr( $name ) ?>"
					<?php checked( 'C', $last_period ); ?>
				/>
				<label for="twrp-date-settings__js-custom">
					<?= _x( 'Last n days:', 'backend', 'twrp' ); ?>
				</label>

				<input
					class="twrp-date-settings__last-days-input"
					min="0" step="1" type="number"
					name="<?= esc_attr( $last_days_name ); ?>"
					placeholder="<?= esc_attr_x( 'Last number of days...', 'backend', 'twrp' ); ?>"
					value="<?= esc_attr( (string) $last_days_num ); ?>"
				/>
			</p>
		</div>
		<?php
	}

	/**
	 * Display the radio buttons to choose to display posts from last periods of
	 * time, like last week/month/year... etc, or a custom number of days.
	 *
	 * @param array $current_setting
	 * @return void
	 */
	protected function display_between_fixed_point_in_time_settings( $current_setting ) {
		$after_value = '';
		if ( isset( $current_setting[ Post_Date::AFTER_DATE_NAME ] ) ) {
			$after_value = $current_setting[ Post_Date::AFTER_DATE_NAME ];
		}

		$before_value = '';
		if ( isset( $current_setting[ Post_Date::BEFORE_DATE_NAME ] ) ) {
			$before_value = $current_setting[ Post_Date::BEFORE_DATE_NAME ];
		}

		$is_hidden_class = '';
		if ( 'FT' !== $current_setting[ Post_Date::DATE_TYPE_NAME ] ) {
			$is_hidden_class = ' twrp-hidden';
		}

		$info_tag  = _x( 'Note:', 'backend', 'twrp' );
		$info_text = _x( 'If you want, only one setting can be set(either "after" or "before"). For example to display all posts after 2020, set only "after": 01/01/2020.', 'backend', 'twrp' );

		?>
		<div id="twrp-date-settings__js-between-wrapper" class="twrp-query-settings__paragraph twrp-date-settings__between-wrapper <?= esc_attr( $is_hidden_class ); ?>">
			<p class="twrp-query-settings__paragraph twrp-setting-note">
				<span class="twrp-setting-note__label">
					<?= esc_html( $info_tag ); ?>
				</span>
				<span class="twrp-setting-note__text">
					<?= esc_html( $info_text ); ?>
				</span>
			</p>
			<span class="twrp-date-settings__after-wrapper">
				<label for="twrp-date-settings__after" class="twrp-date-settings__after-label">
					<?= _x( 'After:', 'backend', 'twrp' ); ?>
				</label>
				<br />
				<input id="twrp-date-settings__after" class="twrp-date-settings__after" type="date" autocomplete="off"
					name="<?= esc_attr( Post_Date::get_setting_name() . '[' . Post_Date::AFTER_DATE_NAME . ']' ); ?>"
					value="<?= esc_attr( $after_value ); ?>"
				/>
			</span>

			<span class="twrp-date-settings__after-before-separator"> &nbsp;&ndash;&nbsp; </span>

			<span class="twrp-date-settings__before-wrapper">
				<label for="twrp-date-settings__before" class="twrp-date-settings__before-label">
					<?= _x( 'Before:', 'backend', 'twrp' ); ?>
				</label>
				<br />
				<input id="twrp-date-settings__before" class="twrp-date-settings__before" type="date" autocomplete="off"
					name="<?= esc_attr( Post_Date::get_setting_name() . '[' . Post_Date::BEFORE_DATE_NAME . ']' ); ?>"
					value="<?= esc_attr( $before_value ); ?>"
				/>
			</span>
		</div>
		<?php
	}

	#endregion -- Display Settings


}
