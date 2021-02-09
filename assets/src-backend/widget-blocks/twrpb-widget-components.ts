import $ from 'jquery';
import 'jqueryui';

$( createWidgetTabs );
$( document ).on( 'widget-updated twrpb-artblock-added twrpb-query-added', createWidgetTabs );

function createWidgetTabs() {
	$( '.twrpb-widget-components' ).tabs( {
		active: getActiveTab(),
		collapsible: true,
	} );
}

// todo:
function getActiveTab() {
	return false;
}
