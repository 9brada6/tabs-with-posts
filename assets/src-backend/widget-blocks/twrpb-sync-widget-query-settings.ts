/**
 * Works on: "type"="checkbox", type="number", type="hidden", pickr color, select.
 *
 * Todo: Do not sync the tab name(it does not sync for now, but make an exception in the code).
 */

import $ from 'jquery';

const widgetFormSelector = '.twrp-widget-form';
const queryTabSettingsSelector = '.twrp-widget-form__selected-query';

addDocumentEvents();
function addDocumentEvents() {
	$( document ).on( 'change', widgetFormSelector + ' ' + queryTabSettingsSelector, syncAllSettings );
}

function removeDocumentEvents() {
	$( document ).off( 'change', widgetFormSelector + ' ' + queryTabSettingsSelector, syncAllSettings );
}

function syncAllSettings( event ) {
	const elementChanged = $( event.target );
	const elementName = elementChanged.attr( 'name' );

	// Only named elements can be synchronized.
	if ( ! elementName ) {
		return;
	}

	const allWidgetQueriesTabs = elementChanged.closest( widgetFormSelector ).find( queryTabSettingsSelector );

	const nameSuffixToSearch = elementName.replace( /widget-twrp_tabs_with_recommended_posts\[\d+\]\[\d+\]/, '' );

	let allSimilarQuerySettings = allWidgetQueriesTabs.find( '[name$="' + nameSuffixToSearch + '"]' );
	allSimilarQuerySettings = filterSimilarQuerySettings( elementChanged, allSimilarQuerySettings );

	changeAllSettings( elementChanged, allSimilarQuerySettings );
	triggerChanges( elementChanged, allSimilarQuerySettings );
}

function filterSimilarQuerySettings( elementName: JQuery, allSimilarQuerySettings : JQuery ): JQuery {
	const elementType = getElementChangedType( elementName );

	if ( elementType === 'checkbox' ) {
		allSimilarQuerySettings = allSimilarQuerySettings.not( '[type="hidden"]' );
	}

	return allSimilarQuerySettings;
}

function changeAllSettings( elementName: JQuery, allSimilarQuerySettings : JQuery ): void {
	const elementType = getElementChangedType( elementName );
	const valueToChange = elementName.val();

	allSimilarQuerySettings.each( function() {
		if ( elementType === 'checkbox' ) {
			const propValue = elementName.prop( 'checked' );
			$( this ).prop( 'checked', propValue );
		} else if ( elementType === 'select' ) {
			$( this ).val( valueToChange );
		} else if ( elementType === 'number' ) {
			$( this ).val( valueToChange );
		} else if ( elementType === 'hidden' ) {
			$( this ).val( valueToChange );
		} else if ( elementType === 'color' ) {
			$( this ).val( valueToChange );
			if ( valueToChange && ( typeof valueToChange === 'string' ) ) {
				$( this ).next( '.pickr' ).find( 'button' ).css( 'color', valueToChange );
			} else {
				$( this ).next( '.pickr' ).find( 'button' ).css( 'color', 'rgba(0, 0, 0, 0.15)' );
			}
		}
	} );
}

function triggerChanges( elementName: JQuery, allSimilarQuerySettings : JQuery ): void {
	removeDocumentEvents();
	const elementType = getElementChangedType( elementName );
	allSimilarQuerySettings.each( function() {
		if ( elementType === 'checkbox' ) {
			$( this ).trigger( 'change' );
		} else if ( elementType === 'select' ) {
			$( this ).trigger( 'change' );
		} else if ( elementType === 'number' ) {
			$( this ).trigger( 'change' );
		} else if ( elementType === 'hidden' ) {
			$( this ).trigger( 'change' );
		} else if ( elementType === 'color' ) {
			$( this ).trigger( 'change' );
		}
	} );
	addDocumentEvents();
}

function getElementChangedType( elementName ) {
	if ( elementName.attr( 'type' ) === 'hidden' && elementName.next( '.pickr' ).length ) {
		return 'color';
	} else if ( elementName.attr( 'type' ) === 'hidden' ) {
		return 'hidden';
	} else if ( elementName.attr( 'type' ) === 'checkbox' ) {
		return 'checkbox';
	} else if ( elementName.is( 'select' ) ) {
		return 'select';
	} else if ( elementName.attr( 'type' ) === 'number' ) {
		return 'number';
	}
}
