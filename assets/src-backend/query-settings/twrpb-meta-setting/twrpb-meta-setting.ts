import $ from 'jquery';
import { showUp, hideUp } from '../../admin-blocks/twrpb-hidden/twrpb-hidden';

const metaTypeSelector = '#twrpb-meta-setting__js-meta-type';
const metaValueSelector = '#twrpb-meta-setting__js-meta-value';

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
