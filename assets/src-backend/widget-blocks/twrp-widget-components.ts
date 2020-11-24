import $ from 'jquery';
import 'jqueryui';

$( createWidgetTabs );
$( document ).on( 'widget-updated twrpb-artblock-added twrpb-query-added', createWidgetTabs );

function createWidgetTabs() {
	$( '.twrp-widget-components' ).tabs( {
		active: 0,
	} );
}
