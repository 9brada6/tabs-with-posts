<?php

namespace TWRP\Admin\Helpers;

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

	const NOTE__POST_DATE_SETTING_REMEMBER = 'post_date_setting_remember';

	const NOTE__POST_DATE_AFTER_BEFORE_SETTING_EXAMPLE = 'post_date_after_before_setting_example';

	const NOTE__QUERY_NAME_INFO = 'query_name_info';

	const NOTE__SEARCH_QUERY_INFO = 'search_query_info';

	const NOTE__SEARCH_QUERY_TOO_SHORT_WARNING = 'search_query_too_short_warning';

	const NOTE__SUPPRESS_FILTERS_INFO = 'suppress_filters_info';

	const NOTE__POST_STATUS_INFO = 'post_status_info';

	const NOTE__ORDERING_BY_POST_ID_WARNING = 'ordering_by_post_id_warning';

	const NOTE__ORDERING_BY_COMMENTS_WARNING = 'order_by_comments_warning';

	const NOTE__ORDERING_BY_SEARCH_NOTE = 'order_by_search_note';

	const NOTE__ORDERING_BY_META_NOTE = 'order_by_meta_note';

	const NOTE__ORDERING_BY_POSTS_IN_NOTE = 'order_by_posts_in_note';

	const NOTE__ORDERING_BY_VIEWS_NOTE = 'order_by_views_in_note';

	const NOTE__POST_SETTINGS_NOTE = 'post_settings_note';

	const NOTE__INVALID_JSON_WARNING = 'invalid_json_warning';

	const NOTE__ADVANCED_ARGS_NOTE = 'advanced_args_note';

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

			static::NOTE__POST_DATE_SETTING_REMEMBER     => array(
				'text' => _x( 'When putting a custom number of days, do not forget to check the last option and to put a number of days.', 'backend', 'twrp' ),
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
				'text' => _x( 'By default, you have only one choice here("Published"), so usually you don\'t want to modify this setting. If you want to show the Scheduled Posts, read in documentation how to do it.', 'backend', 'twrp' ),
			),

			static::NOTE__ORDERING_BY_POST_ID_WARNING    => array(
				'text' => _x( 'Ordering by post ID is not usually a good choice. If you don\'t know what a post ID is, then you maybe want to order by date, which is more efficient.', 'backend', 'twrp' ),
			),

			static::NOTE__ORDERING_BY_COMMENTS_WARNING   => array(
				'text' => _x( 'When ordering by comments, is good to order by something else secondarily(like date), in case the number of comments are equal between posts.', 'backend', 'twrp' ),
			),

			static::NOTE__ORDERING_BY_SEARCH_NOTE        => array(
				'text' => _x( 'Don\'t forget to add some search terms, also, there is a technical explanation in the documentation of how ordering by search works.', 'backend', 'twrp' ),
			),

			static::NOTE__ORDERING_BY_META_NOTE          => array(
				'text' => _x( 'Don\'t forget to add a meta value. Do not confuse sorting alphabetically with numerically, in documentation there is an explanation between the two.', 'backend', 'twrp' ),
			),

			static::NOTE__ORDERING_BY_POSTS_IN_NOTE      => array(
				'text' => _x( 'Don\'t forget to add posts to the "Included Posts" setting, and sort them how you want.', 'backend', 'twrp' ),
			),

			static::NOTE__ORDERING_BY_VIEWS_NOTE         => array(
				'text' => _x( 'Depending on how the plugin is ordering, either "Suppress Filters" or "Meta Settings" options are overwritten.', 'backend', 'twrp' ),
			),

			static::NOTE__POST_SETTINGS_NOTE             => array(
				'text' => _x( 'This setting is a filter, and the posts added here can be filtered by other options. For example if a post(of type "Post") is added here, and in the Post Types Setting only "Pages" setting is selected, then the post will not be shown because it is filtered out by other setting.', 'backend', 'twrp' ),
			),

			static::NOTE__ADVANCED_ARGS_NOTE             => array(
				'text' => _x( 'This is a JSON setting, will overwrite any other settings, used for more advanced settings that are not usually worth making a graphical settings for them. You can read in documentation some examples. If you want to use PHP, then use the filters to overwrite a specific query(examples in documentation).', 'backend', 'twrp' ),
			),

			static::NOTE__INVALID_JSON_WARNING           => array(
				/* translators: The tags %1$s and %2$s will be replaced with a HTML link tag. */
				'text' => sprintf( _x( 'The JSON you entered is invalid and will not be applied. If you can\'t detect where the error might be, you can copy the text into an %1$s online checker%2$s for more details.', 'backend', 'twrp' ), '<a href="' . esc_url( 'https://jsonformatter.curiousconcept.com/' ) . '">', '</a>' ),
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
		$allowed_html = array(
			'a'      => array(
				'href'  => array(),
				'title' => array(),
			),
			'br'     => array(),
			'em'     => array(),
			'strong' => array(),
		);
		?>
		<p id="<?php $this->bem_class( $this->name ); ?>" class="<?php $this->bem_class(); ?><?php $this->additional_note_modifier_class(); ?><?= esc_attr( $note_additional_class ); ?>">
			<span class="<?php $this->bem_class( 'label' ); ?>">
				<?= esc_html( $this->label ); ?>
			</span>

			<span class="<?php $this->bem_class( 'text' ); ?>">
				<?= wp_kses( $this->text, wp_kses_allowed_html() ); ?>
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
			$class = $this->get_bem_class( '', 'warning' );
		}

		if ( ! empty( $class ) ) {
			echo esc_attr( ' ' . $class );
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

	/**
	 * See the trait for more info.
	 *
	 * @return string
	 */
	protected function get_bem_base_class() {
		return 'twrpb-setting-note';
	}

}
