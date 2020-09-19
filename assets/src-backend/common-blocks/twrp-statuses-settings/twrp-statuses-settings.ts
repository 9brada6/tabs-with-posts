import $ from 'jquery';
import 'jqueryui';
import { hideUp, showUp } from '../../framework-blocks/twrp-hidden/twrp-hidden';

const applySettingSelect = $( '#twrp-statuses-settings__js-apply-select' );
const postStatuses = $( '#twrp-statuses-settings__js-statuses-wrapper' );

$( document ).on( 'change', '#twrp-statuses-settings__js-apply-select', hideOrShowPostStatuses );
$( hideOrShowPostStatuses );

function hideOrShowPostStatuses() {
	if ( applySettingSelect.val() === 'not_applied' ) {
		hideUp( postStatuses );
	} else {
		showUp( postStatuses );
	}
}
