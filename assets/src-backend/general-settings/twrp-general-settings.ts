import $ from 'jquery';
import 'jqueryui';
import { showUp, hideUp } from '../framework-blocks/twrp-hidden/twrp-hidden';

// #region -- Hide or show custom date format depending on human readable date format.

const humanReadableEnabledCheckbox = $( '#twrp-general-select__human_readable_date-setting-true' );
const customDateWrapper = $( '#twrp-general-select__date_format-wrapper' );

function showOrHideCustomDateFormat() {
	if ( humanReadableEnabledCheckbox.is( ':checked' ) ) {
		hideUp( customDateWrapper );
	} else {
		showUp( customDateWrapper );
	}
}

$( document ).ready( showOrHideCustomDateFormat );
$( document ).on( 'click', showOrHideCustomDateFormat );

// #endregion -- Hide or show custom date format depending on human readable date format.

// #region -- Add an Icon preview on the right.

const iconWrapperClassName = 'twrp-general-settings__icon-preview';
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
	selectWrapper.prepend( iconAndSvgElem );
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
