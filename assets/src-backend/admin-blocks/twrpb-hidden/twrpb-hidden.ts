import $ from 'jquery';
import 'jqueryui';

// Todo... Remove all paragraphs with hide.

const effectDuration = 500;

function toggleDisplay( element: JQuery ): void {
	if ( element.hasClass( 'twrpb-hidden' ) ) {
		showUp( element );
	} else {
		hideUp( element );
	}
}

// #region -- Hide/Show Vertically

function hideUp( element: JQuery ): void {
	$( element ).slideUp( {
		duration: effectDuration,
		complete() {
			addHideClass( element );
		},
	} );
}

function showUp( element: JQuery ): void {
	$( element ).slideDown( {
		duration: effectDuration,
		complete() {
			removeHideClass( element );
		},
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
		completeFunction = function() {
			removeElement( element );
		};
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
		element.addClass( 'twrpb-hidden' );
	}

	$( element ).show( {
		effect: 'blind',
		duration: effectDuration,
		direction: 'left',
		complete() {
			removeHideClass( element );
		},
	} );
}

// =============================================================================

function addHideClass( element: JQuery ): void {
	$( element ).addClass( 'twrpb-hidden' );
}

function removeHideClass( element: JQuery ): void {
	$( element ).removeClass( 'twrpb-hidden' ).css( 'display', '' );
}

function removeElement( element: JQuery ): void {
	$( element ).remove();
}

// =============================================================================

export {
	toggleDisplay,
	showUp,
	hideUp,
	hideLeft,
	showLeft,
};
