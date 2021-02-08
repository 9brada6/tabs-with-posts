import $ from 'jquery';
import { hideUp, showUp } from '../../admin-blocks/twrpb-hidden/twrpb-hidden';

const firstOrderGroup = $( '#twrpb-order-setting__js-first-order-group' );
const secondOrderGroup = $( '#twrpb-order-setting__js-second-order-group' );
const thirdOrderGroup = $( '#twrpb-order-setting__js-third-order-group' );

const orderByClassName = 'twrpb-order-setting__js-orderby';

const orderGroups = [ firstOrderGroup, secondOrderGroup, thirdOrderGroup ];

$( hideOrShowUnnecessarySelectors );
$( document ).on( 'change', `.${ orderByClassName }`, hideOrShowUnnecessarySelectors );

/**
 * Hide or show the next selectors for the order by and order type, making the
 * user experience better.
 */
function hideOrShowUnnecessarySelectors() {
	let hideNext = false;

	for ( let i = 0; i < orderGroups.length; i++ ) {
		if ( hideNext ) {
			hideUp( orderGroups[ i ] );
		} else {
			showUp( orderGroups[ i ] );
		}

		if ( orderGroups[ i ].find( `.${ orderByClassName }` ).val() === 'not_applied' ) {
			hideNext = true;
			hideUp( orderGroups[ i ].find( '.twrpb-order-setting__js-order-type' ) );
		} else {
			showUp( orderGroups[ i ].find( '.twrpb-order-setting__js-order-type' ) );
		}
	}
}

$( hideOrShowSelectedValues );
$( document ).on( 'change', `.${ orderByClassName }`, hideOrShowSelectedValues );

function hideOrShowSelectedValues() {
	for ( let i = 0; i < orderGroups.length; i++ ) {
		orderGroups[ i ].find( 'option' ).removeAttr( 'disabled' );
	}

	for ( let i = 0; i < orderGroups.length; i++ ) {
		const selectedVal = orderGroups[ i ].find( `.${ orderByClassName }` ).val();
		if ( selectedVal !== 'not_applied' ) {
			for ( let j = i + 1; j < orderGroups.length; j++ ) {
				const orderBySelect = orderGroups[ j ].find( `.${ orderByClassName }` );
				const nextSelectedVal = orderBySelect.val();

				orderBySelect.find( `[value="${ selectedVal }"]` ).attr( 'disabled', 'disabled' );

				if ( nextSelectedVal === selectedVal ) {
					orderBySelect.val( 'not_applied' );
					orderBySelect.trigger( 'change' );
				}
			}
		}
	}
}

// #region -- Hide/Show Post ID warning notice if selected.

const postIdOrderWarning = $( '#twrpb-setting-note__ordering_by_post_id_warning' );

$( hideOrShowWarning );
$( document ).on( 'change', `.${ orderByClassName }`, hideOrShowWarning );

function hideOrShowWarning() : void {
	let showWarning = false;

	for ( let i = 0; i < orderGroups.length; i++ ) {
		const orderByVal = String( $( orderGroups[ i ] ).find( `.${ orderByClassName }` ).val() );

		if ( orderByVal === 'ID' ) {
			showWarning = true;
		}
	}

	if ( showWarning ) {
		showUp( postIdOrderWarning );
	} else {
		hideUp( postIdOrderWarning );
	}
}

// #endregion -- Hide/Show Post ID warning notice if selected.
