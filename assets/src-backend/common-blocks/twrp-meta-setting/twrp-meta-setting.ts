import $ from 'jquery';
import { showUp, hideUp } from '../../framework-blocks/twrp-hidden/twrp-hidden';

const metaTypeSelector = '#twrp-meta-setting__js-meta-type';
const metaValueSelector = '#twrp-meta-setting__js-meta-value';

$( showOrHideValueInput );
$( document ).on( 'change', metaTypeSelector, showOrHideValueInput );

function showOrHideValueInput() {
	const metaTypeValue = $( metaTypeSelector ).val();

	if ( metaTypeValue === 'NOT EXISTS' || metaTypeValue === 'EXISTS' ) {
		hideUp( $( metaValueSelector ) );
	} else {
		showUp( $( metaValueSelector ) );
	}
}
