import $ from 'jquery';
import 'jqueryui';
import { hideUp, showUp } from '../twrp-hidden/twrp-hidden';

const selectCommentsComparator = $( '#twrp-comments-settings__js-comparator' );

const numCommentsInput = $( '#twrp-comments-settings__js-num_comments' );

$( document ).ready( hideOrShowCommentsNumberInput );
$( document ).on( 'change', '#twrp-comments-settings__js-comparator', hideOrShowCommentsNumberInput );

function hideOrShowCommentsNumberInput() {
	const comparator = selectCommentsComparator.val();

	if ( 'NA' === comparator ) {
		hideUp( numCommentsInput );
	} else {
		showUp( numCommentsInput );
	}
}
