import $ from 'jquery';
import 'jqueryui';
import { hideUp, showUp } from '../../framework-blocks/twrp-hidden/twrp-hidden';

// #region -- Polyfill Datepicker

const after = $( '#twrpb-date-settings__after' );

const before = $( '#twrpb-date-settings__before' );

$( enableDatePickerIfNecessary );

function enableDatePickerIfNecessary() {
	if ( inputDateTypeIsAvailable() ) {
		return;
	}

	const options = {
		dateFormat: 'yy-mm-dd',
		changeMonth: true,
		changeYear: true,
	};

	after.datepicker( options );
	before.datepicker( options );
}

function inputDateTypeIsAvailable() {
	const input = document.createElement( 'input' );
	const notADateValue = 'not-a-date';

	input.setAttribute( 'type', 'date' );
	input.setAttribute( 'value', notADateValue );

	return ( input.value !== notADateValue );
}

// #endregion -- Polyfill Datepicker

// #region -- Hide/Show Date

const selectDateType = $( '#twrpb-date-settings__js-date-type' );

const lastPeriodWrapper = $( '#twrpb-date-settings__js-last-period-wrapper' );

const betweenPeriodWrapper = $( '#twrpb-date-settings__js-between-wrapper' );

$( hideOrShowLastPeriodSettings );
$( document ).on( 'change', '#twrpb-date-settings__js-date-type', hideOrShowLastPeriodSettings );

$( hideOrShowBetweenTimeSettings );
$( document ).on( 'change', '#twrpb-date-settings__js-date-type', hideOrShowBetweenTimeSettings );

function hideOrShowLastPeriodSettings() {
	const selectedType = selectDateType.val();

	if ( 'LT' === selectedType ) {
		showUp( lastPeriodWrapper );
	} else {
		hideUp( lastPeriodWrapper );
	}
}

function hideOrShowBetweenTimeSettings() {
	const selectedType = selectDateType.val();

	if ( 'FT' === selectedType ) {
		showUp( betweenPeriodWrapper );
	} else {
		hideUp( betweenPeriodWrapper );
	}
}

// #endregion -- Hide/Show Date
