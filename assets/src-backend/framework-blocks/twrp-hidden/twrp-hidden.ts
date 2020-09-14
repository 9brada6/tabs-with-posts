import $ from 'jquery';
import 'jqueryui';

// Todo... Remove all paragraphs with hide.

const effectDuration = 500;

// #region -- Hide/Show Vertically

function hideUp( element: JQuery ): void {
	$( element ).slideUp( {
		duration: effectDuration,
		complete: addHideClass,
	} );
}

function showUp( element: JQuery ): void {
	$( element ).slideDown( {
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
	let completeFunction = function() {
		addHideClass( element );
	};
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

function addHideClass( element: JQuery = null ): void {
	if ( element ) {
		$( element ).addClass( 'twrp-hidden' );
	} else {
		$( this ).addClass( 'twrp-hidden' );
	}
}

function removeHideClass( element: JQuery = null ): void {
	if ( element ) {
		$( element ).removeClass( 'twrp-hidden' ).css( 'display', '' );
	} else {
		$( this ).removeClass( 'twrp-hidden' ).css( 'display', '' );
	}
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
