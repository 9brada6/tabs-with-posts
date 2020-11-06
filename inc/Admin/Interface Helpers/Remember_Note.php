<?php
/**
 * File that contains the class with the same name.
 */

namespace TWRP\Admin;

use TWRP\Utils\Helper_Trait\BEM_Class_Naming_Trait;

/**
 * Class that will generate notices that remembers the users about a
 * functionality in the admin area of the website.
 *
 * To add a new note:
 * 1. Create a new const variable with a note name.
 * 2. Add a new text value into get_all_notes() function, additionally, a label
 * can be added.
 *
 * Externally, this class can be extended via 'twrpb_all_notes_array' filter,
 * where you should add a new key with an array setting, and create an instance
 * of this class based on the key you added.
 */
class Remember_Note {

	use BEM_Class_Naming_Trait;

	const NOTE__POST_DATE_SETTING_INFO = 'post_date_setting_info';

	const NOTE__POST_DATE_SETTING_REMEMBER = 'post_date_setting_remember';

	const NOTE__POST_DATE_AFTER_BEFORE_SETTING_EXAMPLE = 'post_date_after_before_setting_example';

	const NOTE__QUERY_NAME_INFO = 'query_name_info';

	const NOTE__SEARCH_QUERY_INFO = 'search_query_info';

	const NOTE__SEARCH_QUERY_TOO_SHORT_WARNING = 'search_query_too_short_warning';

	const NOTE__SUPPRESS_FILTERS_INFO = 'suppress_filters_info';

	const NOTE__POST_STATUS_INFO = 'post_status_info';

	const NOTE__POST_STATUS_INFO2 = 'post_status_info2';

	const NOTE__SAME_AUTHOR_SETTING_NOTE = 'same_author_setting_note';

	/**
	 * The name of the note to be displayed.
	 *
	 * @var string
	 */
	protected $name;

	/**
	 * The translated text of the note to be displayed.
	 *
	 * @var string
	 */
	protected $text = '';

	/**
	 * The label(translated) of text of the note to be displayed.
	 *
	 * @var string
	 */
	protected $label = '';

	/**
	 * Whether or not the note is in fact a warning.
	 *
	 * @var bool
	 */
	protected $is_warning = false;

	/**
	 * Construct a new instance of this class.
	 *
	 * @param string $name The name of the note, must be a name of an existing setting.
	 * @param 'warning'|'' $type Additionally, can pass 'warning' to display the
	 *                           note as a warning.
	 */
	public function __construct( $name, $type = '' ) {
		$note_info = $this->get_note_info( $name );

		$this->name = $name;

		if ( isset( $note_info['label'] ) ) {
			$this->label = $note_info['label'];
		}

		if ( 'warning' === $type ) {
			$this->is_warning = true;
			$this->label      = $this->get_default_warning_label();
		} else {
			$this->label = $this->get_default_note_label();
		}

		if ( isset( $note_info['text'] ) ) {
			$this->text = $note_info['text'];
		}
	}

	/**
	 * Get an array with all declared notes.
	 *
	 * @return array
	 */
	protected function get_all_notes() {
		$all_notes = array(

			static::NOTE__SAME_AUTHOR_SETTING_NOTE       => array(
				'text' => _x( 'This query(tab) will be displayed only on singular pages(post, page, attachments, custom post types), but not on blogroll pages, categories pages, ..etc, because these pages do not display an article from where the author can be retrieved.', 'backend', 'twrp' ),
			),

			static::NOTE__POST_DATE_SETTING_INFO         => array(
				'text' => _x( 'You can either put a number of days manually(7 for week, 30 for a month, ..etc), or calculate the first day of last week/month and include everything after.', 'backend', 'twrp' ),
			),

			static::NOTE__POST_DATE_SETTING_REMEMBER     => array(
				'text' => _x( 'When putting a custom number of days, do not forget to also check the last option.', 'backend', 'twrp' ),
			),

			static::NOTE__POST_DATE_AFTER_BEFORE_SETTING_EXAMPLE => array(
				'text' => _x( 'If you want, only one setting can be set(either "after" or "before"). For example to display all posts after 2020, set only "after": 01/01/2020.', 'backend', 'twrp' ),
			),

			static::NOTE__QUERY_NAME_INFO                => array(
				'text' => _x( 'The name will be visible ONLY in the admin screen.', 'backend', 'twrp' ),
			),

			static::NOTE__SEARCH_QUERY_INFO              => array(
				'text' => _x( 'You can remove keywords by placing "-" in front of them: "pillow -sofa". Leave empty to not apply.', 'backend', 'twrp' ),
			),

			static::NOTE__SEARCH_QUERY_TOO_SHORT_WARNING => array(
				'text' => _x( 'You have searched for a very small keyword, this can be a mistake. The query will work and include the search result whatsoever.', 'backend', 'twrp' ),
			),

			static::NOTE__SUPPRESS_FILTERS_INFO          => array(
				'text' => _x( 'Some theme/plugins can alter any WP database query, modifying it\'s results in unexpected ways. Fortunately, with this setting we can suppress/allow them all together.', 'backend', 'twrp' ),
			),

			static::NOTE__POST_STATUS_INFO               => array(
				'text' => _x( 'Default value is "Published" alongside with all other "public" custom post statuses. If the user is logged in, "private" is also added.', 'backend', 'twrp' ),
			),

			static::NOTE__POST_STATUS_INFO2              => array(
				'text' => _x( 'Modifying this setting will make query get only posts that the current user has permission to read. For example if a post is "private", it will not show on normal users, only on logged in users(if they have permission to read).', 'backend', 'twrp' ),
			),

		);

		return apply_filters( 'twrpb_all_notes_array', $all_notes );
	}

	/**
	 * Display a note text about something.
	 *
	 * @param string $note_additional_class
	 * @return void
	 */
	public function display_note( $note_additional_class = '' ) {
		if ( ! empty( $note_additional_class ) ) {
			$note_additional_class = ' ' . $note_additional_class;
		}

		?>
		<p id="<?php $this->bem_class( $this->name ); ?>" class="<?php $this->bem_class(); ?> <?php $this->additional_note_modifier_class(); ?><?= esc_attr( $note_additional_class ); ?>">
			<span class="<?php $this->bem_class( 'label' ); ?>">
				<?= esc_html( $this->label ); ?>
			</span>

			<span class="<?php $this->bem_class( 'text' ); ?>">
				<?= esc_html( $this->text ); ?>
			</span>
		</p>
		<?php
	}

	/**
	 * Echo the additional modifier class for the block, if needed.
	 *
	 * @return void
	 */
	protected function additional_note_modifier_class() {
		if ( $this->is_warning ) {
			$this->bem_class( '', 'warning' );
		}
	}

	/**
	 * Get the default note label.
	 *
	 * @return string
	 */
	protected function get_default_note_label() {
		return _x( 'Note:', 'backend', 'twrp' );
	}

	/**
	 * Get the default warning label.
	 *
	 * @return string
	 */
	protected function get_default_warning_label() {
		return _x( 'Warning:', 'backend', 'twrp' );
	}


	/**
	 * Get the note information by note name.
	 *
	 * @param string $note_name
	 * @return array|false
	 */
	protected function get_note_info( $note_name ) {
		$all_notes = $this->get_all_notes();

		if ( isset( $all_notes[ $note_name ] ) ) {
			return $all_notes[ $note_name ];
		}

		return false;
	}

	protected function get_bem_base_class() {
		return 'twrp-setting-note';
	}

}
