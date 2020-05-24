import $ from 'jquery';
import 'jqueryui';

const effectDuration = 500;

// =============================================================================

function hideUp( element ) {
	$( element ).hide( {
		effect: 'blind',
		duration: effectDuration,
		complete: addHideClass,
	} );
}

function showUp( element ) {
	$( element ).show( {
		effect: 'blind',
		duration: effectDuration,
		complete: removeHideClass,
	} );
}

// =============================================================================

function hideLeft( element ) {
	$( element ).hide( {
		effect: 'blind',
		duration: 5000,
		complete: addHideClass,
	} );
}

// =============================================================================

function addHideClass() {
	$( this ).addClass( 'twrp-hidden' );
}

function removeHideClass() {
	$( this ).removeClass( 'twrp-hidden' );
}

// =============================================================================

export {
	showUp,
	hideUp,
	hideLeft,
};
