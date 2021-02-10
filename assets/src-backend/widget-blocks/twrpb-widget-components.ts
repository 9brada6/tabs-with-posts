import $ from 'jquery';
import 'jqueryui';

$( createWidgetTabs );
$( document ).on( 'widget-updated twrpb-artblock-added twrpb-query-added', createWidgetTabs );

const animationDuration = 250;

function createWidgetTabs() {
	$( '.twrpb-widget-components' ).tabs( {
		active: getActiveTab(),
		collapsible: true,
		show: { effect: 'slideDown', duration: animationDuration },
		hide: { effect: 'slideUp', duration: animationDuration },
		beforeActivate: changeTabsAnimation,
	} );
}

function changeTabsAnimation( e: JQueryEventObject, ui ) {
	const oldTab: JQuery = ui.oldTab;
	const newTab: JQuery = ui.newTab;
	const oldPanel: JQuery = ui.oldPanel;
	const newPanel: JQuery = ui.newPanel;

	const oldTabId = oldTab.attr( 'aria-controls' );
	const newTabId = newTab.attr( 'aria-controls' );
	const tabsWrapper = $( e.currentTarget ).closest( '.twrpb-widget-components' );

	if ( ! oldTabId || ! newTabId ) {
		makeTabsSlide( tabsWrapper );
	} else {
		makePanelsHeightAnimatable( oldPanel, newPanel );
		makeTabsFade( tabsWrapper );
	}
}

function makeTabsFade( tabsWrapper ) {
	tabsWrapper.tabs( 'option', 'hide', { effect: 'fadeOut', duration: animationDuration } );
	tabsWrapper.tabs( 'option', 'show', { effect: 'fadeIn', duration: animationDuration } );
}

function makeTabsSlide( tabsWrapper ) {
	tabsWrapper.tabs( 'option', 'hide', { effect: 'slideUp', duration: animationDuration } );
	tabsWrapper.tabs( 'option', 'show', { effect: 'slideDown', duration: animationDuration } );
}

function makePanelsHeightAnimatable( oldPanel, newPanel ) {
	const panelContents = oldPanel.parent();

	const oldPanelHeight = panelContents.height();

	oldPanel.hide();
	newPanel.show();
	const newPanelHeight = panelContents.height();
	newPanel.hide();
	oldPanel.show();

	panelContents.height( oldPanelHeight );
	panelContents.css( {
		transition: 'height ' + animationDuration + 'ms ease',
	} );
	panelContents.height( newPanelHeight );
	setTimeout( function() {
		panelContents.height( 'auto' );
		panelContents.css( {
			transition: '',
		} );
	}, ( animationDuration * 2 ) );
}

// todo:
function getActiveTab() {
	return false;
}
