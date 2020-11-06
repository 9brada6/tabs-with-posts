import $ from 'jquery';
import 'jqueryui';
import { hideUp, showUp } from '../../admin-blocks/twrp-hidden/twrp-hidden';

const searchInput = $( '#twrpb-search-setting__js-search-input' );
const warningWrapper = $( '#twrpb-search-setting__js-words-warning' );

$( hiderOrShowSearchWarning );
$( document ).on( 'change', '#twrpb-search-setting__js-search-input', hiderOrShowSearchWarning );

function hiderOrShowSearchWarning(): void {
	const searchString = String( searchInput.val() );
	const searchStringLength = searchString.length;

	if ( ( searchStringLength !== 0 ) && ( searchStringLength < 4 ) ) {
		showUp( warningWrapper );
	} else {
		hideUp( warningWrapper );
	}
}
