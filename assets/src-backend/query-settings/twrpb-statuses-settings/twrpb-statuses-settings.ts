import $ from 'jquery';
import 'jqueryui';
import { hideUp, showUp } from '../../admin-blocks/twrpb-hidden/twrpb-hidden';

const applySettingSelect = $( '#twrpb-statuses-settings__js-apply-select' );
const postStatuses = $( '#twrpb-statuses-settings__js-statuses-wrapper' );
const modifyNote = $( '#twrpb-setting-note__post_status_info2' );

$( document ).on( 'change', '#twrpb-statuses-settings__js-apply-select', hideOrShowPostStatuses );
$( hideOrShowPostStatuses );

function hideOrShowPostStatuses() {
	if ( applySettingSelect.val() === 'not_applied' ) {
		hideUp( postStatuses );
		hideUp( modifyNote );
	} else {
		showUp( postStatuses );
		showUp( modifyNote );
	}
}
