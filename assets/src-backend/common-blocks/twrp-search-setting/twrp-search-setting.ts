import $ from 'jquery';
import 'jqueryui';
import { hideUp, showUp } from '../twrp-hidden/twrp-hidden';

const searchInput = $( '#twrp-search-setting__js-search-input' );
const warningWrapper = $( '#twrp-search-setting__js-words-warning' );

$( document ).ready( hiderOrShowSearchWarning );
$( document ).on( 'change', '#twrp-search-setting__js-search-input', hiderOrShowSearchWarning );

function hiderOrShowSearchWarning(): void {
	const searchString = String( searchInput.val() );
	const searchStringLength = searchString.length;

	if ( ( searchStringLength !== 0 ) && ( searchStringLength < 3 ) ) {
		showUp( warningWrapper );
	} else {
		hideUp( warningWrapper );
	}
}