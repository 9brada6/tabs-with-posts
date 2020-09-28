#region -- Testing

/**
 * This function was created for testing and prototyping. It is not for use
 * in the theme directly.
 *
 * @return void
 */
public static function test_icons() {
	$icons = self::get_all_icons();
	self::include_all_icons_file();
	$icon_nr = 0;

	?>
	<style>
		.twrp-test__icon-block-wrapper {
			margin:3px; margin-right: 10px; font-size: 1.5rem; display:inline-block; color:darkblue;
		}
		.twrp-test__icon-wrapper {
			margin-right: 6px
		}
	</style>
	<?php

	echo '<p>';
	foreach ( $icons as $id => $vector ) {
		$random_word = substr( str_shuffle( 'abcdefghijklmnopqrstuvwxyz' ), 0, 4 );

		if ( 0 === $icon_nr % 3 ) {
			echo '<div>';
		}

		// Quick and dirty method.
		$additional_class = in_array( $vector, self::get_views_icons(), true ) ? 'twrp-i--views' : '';
		$additional_class = in_array( $vector, self::get_comment_icons(), true ) ? 'twrp-i--comments' : $additional_class;

		echo '<span class="twrp-test__icon-block-wrapper">';
			echo '<span class="twrp-test__icon-wrapper">';
				echo self::get_icon_html( $id, $additional_class ); // phpcs:ignore
			echo '</span>';
			echo esc_html( $random_word );
		echo '</span>';

		if ( ( ( $icon_nr + 1 ) % 3 ) === 0 || ( count( $icons ) === $icon_nr ) ) {
			echo '</div>';
		}

		$icon_nr++;
	}
	echo '</p>';
	}

	/**
	 * Test to see if each file content corresponds to each icon item.
	 *
	 * Best to be called at 'admin_head' action.
	 *
	 * @return void
	 */
	public static function test_same_icons() {
		$icons = self::get_all_icons();

		foreach ( $icons as $id => $icon ) {
			$icon_type = self::test_get_icon_type( $icon );
			$icon_file = trailingslashit( TWRP_Main::get_plugin_directory() ) . 'assets/svgs/' . $icon_type . '/' . strtolower( $icon['brand'] ) . '/' . $icon['file_name'];

			@$file_content = file_get_contents( $icon_file ); // phpcs:ignore

			if ( false === $file_content ) {
				?>
			<script>console.log('Icon <?= esc_html( $id ); ?> not good. Cannot get it\'s content.');</script>
				<?php
			} elseif ( trim( $file_content ) !== $icon['svg'] ) {
				?>
			<script>console.log('Icon <?= esc_html( $id ); ?> not good. Content does not match.');</script>
				<?php
			}
		}

		?>
	<script>console.log('All icons files successfully tested.');</script>
		<?php

		// Verify attributes:
		$founded_attrs = self::test_icons_must_be_missing_attributes();
		$founded_attrs = implode( ', ', $founded_attrs );
		if ( empty( $founded_attrs ) ) {
			?>
		<script>console.log('All attributes are correct.');</script>
			<?php
		} else {
			?>
		<script>console.log('Attributes that must be deleted: <?= esc_html( $founded_attrs ); ?>');</script>
			<?php
		}

		// Verify Id format
		$founded_ids = self::test_icons_ids();
		$founded_ids = implode( ', ', $founded_ids );
		if ( empty( $founded_ids ) ) {
			?>
		<script>console.log('All ids are correct.');</script>
			<?php
		} else {
			?>
		<script>console.log('Ids that must be renamed: <?= esc_html( $founded_ids ); ?>');</script>
			<?php
		}

		// Verify filename format
		$founded_ids = self::test_all_icons_filename();
		$founded_ids = implode( ', ', $founded_ids );
		if ( empty( $founded_ids ) ) {
			?>
		<script>console.log('All ids are correct.');</script>
			<?php
		} else {
			?>
		<script>console.log('Ids that have filenames wrong: <?= esc_html( $founded_ids ); ?>');</script>
			<?php
		}

		// Verify filename format
		$founded_ids = self::test_icons_description_file_id_match();
		$founded_ids = implode( ', ', $founded_ids );
		if ( empty( $founded_ids ) ) {
			?>
		<script>console.log('All ids are correct.');</script>
			<?php
		} else {
			?>
		<script>console.log('Ids that do not correspond in id-description-filename: <?= esc_html( $founded_ids ); ?>');</script>
			<?php
		}

		// Verify that each icon contains only one svg html element.
		$founded_ids = self::test_icon_only_one_svg_html_elem();
		$founded_ids = implode( ', ', $founded_ids );
		if ( empty( $founded_ids ) ) {
			?>
		<script>console.log('All icons are correct.');</script>
			<?php
		} else {
			?>
		<script>console.log('Ids that have not the desired "svg" html element: <?= esc_html( $founded_ids ); ?>');</script>
			<?php
		}
	}

	/**
	 * Test to check that each icon has only one svg element.
	 *
	 * @return array<string>
	 */
	protected static function test_icon_only_one_svg_html_elem() {
		$all_icons = self::get_all_icons();
		$wrong_ids = array();

		foreach ( $all_icons as $icon_id => $icon ) {
			if ( substr_count( $icon['svg'], 'svg' ) !== 2 ) {
				array_push( $wrong_ids, $icon_id );
			}
		}

		return $wrong_ids;
	}

	/**
	 * Returns an array with all ids where the id, description, and filename do
	 * not match in terms of type(filled, outlined, ..etc).
	 *
	 * @return array<string>
	 */
	protected static function test_icons_description_file_id_match() {
		$all_icons    = self::get_all_icons();
		$icon_matches = array(
			'f'  => array(
				'type'        => 'Filled',
				'file_prefix' => 'filled',
			),
			'ol' => array(
				'type'        => 'Outlined',
				'file_prefix' => 'outlined',
			),
			'sh' => array(
				'type'        => 'Sharp',
				'file_prefix' => 'sharp',
			),
			't'  => array(
				'type'        => 'Thin',
				'file_prefix' => 'thin',
			),
			'dt' => array(
				'type'        => 'DuoTone',
				'file_prefix' => 'duotone',
			),
			'hf' => array(
				'type'        => 'Half Filled',
				'file_prefix' => 'half-filled',
			),
		);
		$wrong_ids    = array();

		foreach ( $all_icons as $icon_id => $icon ) {
			$icon_id_pieces = explode( '-', $icon_id );
			$icon_id_type   = $icon_id_pieces[ count( $icon_id_pieces ) - 1 ];

			if ( ! isset( $icon_matches[ $icon_id_type ] ) ) {
				array_push( $wrong_ids, $icon_id );
				continue;
			}

			if ( strstr( $icon['type'], $icon_matches[ $icon_id_type ]['type'] ) === false ) {
				array_push( $wrong_ids, $icon_id );
				continue;
			}

			if ( strstr( $icon['file_name'], $icon_matches[ $icon_id_type ]['file_prefix'] ) === false ) {
				array_push( $wrong_ids, $icon_id );
				continue;
			}
		}

		return $wrong_ids;
	}

	/**
	 * Return an array with all attributes present in all icons. The attributes
	 * are only the one we care to not be present.
	 *
	 * @return array<string>
	 */
	public static function test_icons_must_be_missing_attributes() {
		$all_icons_file_content = self::test_get_all_icons_content();

		$attributes   = array( 'class', 'role', 'focusable', 'aria', ' "', '  ', "\t" );
		$regex_verify = array( '/#(\d|[abcdef]){3}/i' );
		$founded_attr = array();

		foreach ( $attributes as $attribute ) {
			if ( strpos( $all_icons_file_content, $attribute ) !== false ) {
				array_push( $founded_attr, $attribute );
			}
		}

		foreach ( $regex_verify as $regex_to_verify ) {
			if ( preg_match( $regex_to_verify, $all_icons_file_content ) ) {
				array_push( $founded_attr, $regex_to_verify );
			}
		}

		return $founded_attr;
	}

	/**
	 * Get the all-icons.svg file contents.
	 *
	 * @return string Empty string if not available.
	 */
	protected static function test_get_all_icons_content() {
		$all_icons = trailingslashit( TWRP_Main::get_plugin_directory() ) . 'assets/svgs/all-icons.svg';

		@$file_content = file_get_contents( $all_icons ); // phpcs:ignore
		if ( false === $file_content ) {
			return '';
		}

		return $file_content;
	}

	/**
	 * Get an array with all icon id's that do not have filenames that
	 * corresponds to the style.
	 *
	 * @return array<string>
	 */
	protected static function test_all_icons_filename() {
		$icons = self::get_all_icons();

		$finish_format = array( 'filled', 'outlined', 'thin', 'duotone', 'sharp' );
		$wrong_ids     = array();

		foreach ( $icons as $icon_id => $icon ) {
			$found = false;

			foreach ( $finish_format as $format ) {
				if ( isset( $icon['file_name'] ) && strstr( $icon['file_name'], $format ) !== false ) {
					$found = true;
					break;
				}
			}

			if ( ! $found ) {
				array_push( $wrong_ids, $icon_id );
			}
		}

		return $wrong_ids;
	}

	/**
	 * Test the icons id's to have similar structure.
	 *
	 * @return array<string> Return an array with all id's that do not correspond.
	 */
	protected static function test_icons_ids() {
		$all_icons = self::get_all_icons();
		$wrong_ids = array();

		$prefix         = 'twrp-';
		$icon_id_types  = array( 'user', 'tax', 'com', 'dcom', 'rat', 'views', 'cal' );
		$icon_id_brands = array( 'fa', 'goo', 'di', 'fi', 'ii', 'im', 'ci', 'fe', 'ji', 'li', 'oi', 'ti' );

		foreach ( $all_icons as $icon_id => $icon ) {
			if ( strpos( $icon_id, $prefix ) !== 0 ) {
				array_push( $wrong_ids, $icon_id );
				continue;
			}

			$id_sections = explode( '-', $icon_id );

			if ( ! in_array( $id_sections[1], $icon_id_types, true ) ) {
				array_push( $wrong_ids, $icon_id );
				continue;
			}

			if ( ! in_array( $id_sections[2], $icon_id_brands, true ) ) {
				array_push( $wrong_ids, $icon_id );
				continue;
			}
		}

		return $wrong_ids;
	}

	protected static function test_get_icon_type( $icon ) {
		if ( in_array( $icon, self::get_views_icons(), true ) ) {
			return 'views';
		}

		if ( in_array( $icon, self::get_date_icons(), true ) ) {
			return 'date';
		}

		if ( in_array( $icon, self::get_comment_icons(), true ) ) {
			return 'comments';
		}

		if ( in_array( $icon, self::get_user_icons(), true ) ) {
			return 'user';
		}

		if ( in_array( $icon, self::get_category_icons(), true ) ) {
			return 'taxonomy';
		}

		if ( in_array( $icon, self::get_rating_icons(), true ) ) {
			return 'rating';
		}

		if ( in_array( $icon, self::get_comment_disabled_icons(), true ) ) {
			return 'disabled-comments';
		}

		return '';
	}

	#endregion -- Testing
