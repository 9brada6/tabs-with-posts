import $ from 'jquery';
import 'jqueryui';

$( createWidgetTabs );
function createWidgetTabs() {
	$( '.twrp-widget-components' ).tabs( {
		active: 0,
	} );
}
