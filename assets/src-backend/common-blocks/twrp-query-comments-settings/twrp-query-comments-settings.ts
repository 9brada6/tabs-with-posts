import $ from 'jquery';
import 'jqueryui';
import { hideUp, showUp } from '../twrp-hidden/twrp-hidden';

const selectCommentsComparator = $( '#twrp-query-comments-settings__js-comparator' );

const numCommentsInput = $( '#twrp-query-comments-settings__js-num_comments' );

$( document ).ready( hideOrShowCommentsNumberInput );
$( document ).on( 'change', '#twrp-query-comments-settings__js-comparator', hideOrShowCommentsNumberInput );

function hideOrShowCommentsNumberInput() {
	const comparator = selectCommentsComparator.val();

	if ( 'NA' === comparator ) {
		hideUp( numCommentsInput );
	} else {
		showUp( numCommentsInput );
	}
}
