import $ from 'jquery';
import 'jqueryui';

// Todo...

const effectDuration = 500;

// #region -- Hide/Show Vertically

function hideUp( element: JQuery ): void {
	$( element ).hide( {
		effect: 'blind',
		duration: effectDuration,
		complete: addHideClass,
	} );
}

function showUp( element: JQuery ): void {
	$( element ).show( {
		effect: 'blind',
		duration: effectDuration,
		complete: removeHideClass,
	} );
}

// #endregion -- Hide/Show Vertically

// =============================================================================

/**
 * Hide a HTML element with a blind effect from the left.
 *
 * @param {HTMLElement} element A jquery element.
 * @param {'remove'} remove Add 'remove' to remove the element from the DOM.
 */
function hideLeft( element: JQuery, remove: string = '' ): void {
	let completeFunction = addHideClass;
	if ( remove === 'remove' ) {
		completeFunction = removeElement;
	}

	$( element ).hide( {
		effect: 'blind',
		duration: effectDuration,
		direction: 'left',
		complete: completeFunction,
	} );
}

/**
 * Show a HTML element with a blind effect from the left.
 *
 * @param {HTMLElement} element A jquery element.
 * @param {'hide_first'} hideFirst Add 'hide_first' to first hide then show, if the
 * element already exists.
 */
function showLeft( element: JQuery, hideFirst: string = '' ): void {
	if ( hideFirst === 'hide_first' ) {
		element.addClass( 'twrp-hidden' );
	}

	$( element ).show( {
		effect: 'blind',
		duration: effectDuration,
		direction: 'left',
		complete: removeHideClass,
	} );
}

// =============================================================================

function addHideClass(): void {
	$( this ).addClass( 'twrp-hidden' );
}

function removeHideClass(): void {
	$( this ).removeClass( 'twrp-hidden' ).css( 'display', '' );
}

function removeElement(): void {
	$( this ).remove();
}

// =============================================================================

export {
	showUp,
	hideUp,
	hideLeft,
	showLeft,
};
