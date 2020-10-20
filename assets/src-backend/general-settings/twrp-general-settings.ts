import $ from 'jquery';
import 'jqueryui';
import { showUp, hideUp } from '../framework-blocks/twrp-hidden/twrp-hidden';

// #region -- Hide or show custom date format depending on human readable date format.

const humanReadableEnabledCheckbox = $( '#twrpb-general-select__human_readable_date-setting-true' );
const customDateWrapper = $( '#twrpb-general-select__date_format-wrapper' );

function showOrHideCustomDateFormat() {
	if ( humanReadableEnabledCheckbox.is( ':checked' ) ) {
		hideUp( customDateWrapper );
	} else {
		showUp( customDateWrapper );
	}
}

$( showOrHideCustomDateFormat );
$( document ).on( 'click', showOrHideCustomDateFormat );

// #endregion -- Hide or show custom date format depending on human readable date format.

// #region -- Add an Icon preview on the right.

const iconWrapperClassName = 'twrpb-general-settings__icon-preview';
const iconAndSvgElem = '<span class="' + iconWrapperClassName + '"><svg><use/></svg></span>';
const selectNames = [ 'user_icon', 'date_icon', 'category_icon', 'comments_icon', 'comments_disabled_icon', 'views_icon' ];

$( updateAllIcons );
$( document ).on( 'change', getDocumentOnClickSelector(), onChangeHandler );

/**
 * Handler for the selection of the icon. Update the preview of changed icon.
 */
function onChangeHandler( this: JQuery ) {
	const selectName = String( $( this ).attr( 'name' ) );

	if ( ! selectName ) {
		return;
	}

	updateIcon( selectName );
}

/**
 * Update all icons on all selectors.
 */
function updateAllIcons() {
	for ( const selectName of selectNames ) {
		updateIcon( selectName );
	}
}

/**
 * Given a selector name, update the icon corresponding to it.
 */
function updateIcon( selectName: string ): void {
	const selectElem = $( 'select[name="' + selectName + '"' );

	if ( selectElem.length === 0 ) {
		return;
	}

	const selectWrapper = selectElem.parent();
	const iconId = String( selectElem.val() );

	selectWrapper.find( '.' + iconWrapperClassName ).remove();
	$( iconAndSvgElem ).insertBefore( selectElem );
	selectWrapper.find( 'use' ).attr( 'href', '#' + iconId );
}

/**
 * Get the jQuery selector to attach the event to the document.
 */
function getDocumentOnClickSelector(): string {
	let documentOnClickSelector = '';

	for ( const selectName of selectNames ) {
		if ( documentOnClickSelector ) {
			documentOnClickSelector = documentOnClickSelector + ', ';
		}
		documentOnClickSelector = documentOnClickSelector + 'select[name="' + selectName + '"]';
	}

	return documentOnClickSelector;
}

// #endregion -- Add an Icon preview on the right.

// #region -- Add icons preview on the right for rating packs.

const ratingIconsDataSetElementId = 'twrpb-general-settings__rating_pack_icons-wrapper';
const dataHolderName = 'data-twrp-rating-packs';
const selectRatingName = 'rating_pack_icons';

const iconsPreviewWrapperClassName = 'twrpb-general-select__rating_icons_preview';
const iconsPreviewWrapper = '<span class="' + iconsPreviewWrapperClassName + '"></span>';
const ratingIconAndSvgElem = iconAndSvgElem;
let ratingIconsSet = null;

$( updateRatingIcons );
$( document ).on( 'change', 'select[name="' + selectRatingName + '"]', updateRatingIcons );

function setRatingIconsData() {
	const dataHolderElement = $( '#' + ratingIconsDataSetElementId );
	if ( dataHolderElement.length === 0 ) {
		return;
	}

	const toParse = dataHolderElement.attr( dataHolderName );

	if ( ( typeof toParse ) !== 'string' ) {
		return;
	}

	try {
		ratingIconsSet = JSON.parse( toParse );
	} catch ( e ) {
		// Do nothing.
	}
}

function updateRatingIcons() {
	if ( null === ratingIconsSet ) {
		setRatingIconsData();
	}

	const selectElem = $( 'select[name="' + selectRatingName + '"]' );

	if ( selectElem.length === 0 ) {
		return;
	}

	const selectWrapper = selectElem.parent();
	const selectedRatingPack = String( selectElem.val() );

	// todo: check if we can access ratingIconsSet object.

	const emptyIconId = ratingIconsSet[ selectedRatingPack ].empty;
	const halfFilledIconId = ratingIconsSet[ selectedRatingPack ].half;
	const filledIconId = ratingIconsSet[ selectedRatingPack ].full;

	selectWrapper.find( '.' + iconsPreviewWrapperClassName ).remove();
	selectWrapper.prepend( iconsPreviewWrapper );

	const iconsWrapperPreviewElement = selectWrapper.find( '.' + iconsPreviewWrapperClassName );
	$( ratingIconAndSvgElem ).appendTo( iconsWrapperPreviewElement ).find( 'use' ).attr( 'href', '#' + filledIconId );
	$( ratingIconAndSvgElem ).appendTo( iconsWrapperPreviewElement ).find( 'use' ).attr( 'href', '#' + halfFilledIconId );
	$( ratingIconAndSvgElem ).appendTo( iconsWrapperPreviewElement ).find( 'use' ).attr( 'href', '#' + emptyIconId );
}

// #endregion -- Add icons preview on the right for rating packs.

// #region -- Auto-Choose the compatible disabled icon.

const selectCommentIconSelector = '';
const selectDisabledCommentIconSelector = '';
const compatibleDisabledComments = null;

function doDisabledCommentIconAutoSelect() {
	const commentId = $( selectCommentIconSelector ).val();
}

// #endregion -- Auto-Choose the compatible disabled icon.
