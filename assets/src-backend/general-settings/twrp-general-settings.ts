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
