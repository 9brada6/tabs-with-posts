import $ from 'jquery';
import 'jqueryui';

$( document ).ready( createWidgetTabs );
function createWidgetTabs() {
	$( '.twrp-widget-components' ).tabs( {
		active: 0,
	} );
}
