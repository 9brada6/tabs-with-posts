import $ from 'jquery';
import 'jqueryui';
import { hideUp, showUp } from '../../admin-blocks/twrp-hidden/twrp-hidden';

const selectCommentsComparator = $( '#twrpb-comments-settings__js-comparator' );

const numCommentsInput = $( '#twrpb-comments-settings__js-num_comments' );

$( hideOrShowCommentsNumberInput );
$( document ).on( 'change', '#twrpb-comments-settings__js-comparator', hideOrShowCommentsNumberInput );

function hideOrShowCommentsNumberInput() {
	const comparator = selectCommentsComparator.val();

	if ( 'NA' === comparator ) {
		hideUp( numCommentsInput );
	} else {
		showUp( numCommentsInput );
	}
}
