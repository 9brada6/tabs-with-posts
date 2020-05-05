import $ from 'jquery';
import 'jqueryui';

declare const ajaxurl: string;

let widgets: JQuery<HTMLElement>;

const dataWidgetId = 'data-twrp-widget-id';
const dataQueryId = 'data-twrp-query-id';

const queriesListSelector = '.twrp-widget-form__selected-queries-list';
const queriesItemSelector = '.twrp-widget-form__selected-query';

const queriesInputSelector = '.twrp-widget-form__selected-queries';

$( document ).on( 'click', '.twrp-widget-form__select-query-to-add-btn', handleAddQueryButton );

$( document ).on( 'click', updateWidgetsList );
updateWidgetsList();

$( document ).on( 'click', updateAllWidgets );
updateAllWidgets();

/**
 * Update the file global variable "widgets" to contain all the instance widgets
 * on the page.
 */
function updateWidgetsList(): void {
	widgets = $( document ).find( `[${ dataWidgetId }]` );
}

function updateAllWidgets(): void {
	widgets.each( function() {
		const widgetId = $( this ).attr( dataWidgetId );
		updateWidgetQueriesDisplayList( widgetId );
	} );
}

/**
 * Handles the click when a user wants to add a query(tab) to be displayed and
 * modify its settings.
 */
function handleAddQueryButton(): void {
	const widgetWrapper = $( this ).closest( '.twrp-widget-form' );
	const queryId = String( widgetWrapper.find( '.twrp-widget-form__select-query-to-add' ).val() );

	const queriesInputValue = getQueriesInputValues( widgetWrapper );

	if ( queriesInputValue.indexOf( queryId ) === -1 ) {
		queriesInputValue.push( queryId );
		setQueriesInputValues( widgetWrapper, queriesInputValue );
	}
}

// =============================================================================
// Widget List Functions

/**
 * Update the queries list from the queries input.
 */
function updateWidgetQueriesDisplayList( widgetId: string ) {
	const widget = getWidgetWrapperById( widgetId );
	const queries = getQueriesInputValues( widget );

	for ( let i = 0; i < queries.length; i++ ) {
		if ( ! queryExistInWidgetList( widgetId, queries[ i ] ) ) {
			appendQueryToWidgetList( widgetId, queries[ i ] );
		}
	}
}

/**
 * Somewhat the reversed of updateWidgetQueriesDisplayList(), updates the queries
 * input, from the queries display list.
 */
function updateWidgetQueriesInput( widgetId: string ): void {
	const widget = getWidgetWrapperById( widgetId );
	const queriesItems = widget.find( queriesListSelector ).find( queriesItemSelector );

	const queries = [];
	for ( i = 0; i < queriesItems.length; i++ ) {

	}
}

/**
 * Check if a query settings are displayed in the widget.
 */
function queryExistInWidgetList( widgetId: string, queryId: string|number ): boolean {
	const queryItem = getQueryItemById( widgetId, queryId );
	if ( queryItem.length ) {
		return true;
	}

	return false;
}

/**
 * Appends a query tab to the widget list of queries.
 */
async function appendQueryToWidgetList( widgetId: string, queryId: string|number ) {
	const queryHTML = await getQueryHTMLForList( widgetId, queryId );
	const widget = getWidgetWrapperById( widgetId );
	widget.find( '.twrp-widget-form__selected-queries-list' ).append( queryHTML );
}

/**
 * Get the HTML for a query tab to be displayed in the widget setting.
 */
function getQueryHTMLForList( widgetId: string, queryId: string|number ) {
	return $.ajax( {
		url: ajaxurl,
		method: 'POST',
		data: {
			action: 'twrp_widget_create_query_setting',
			widget_id: widgetId,
			query_id: queryId,
		},
	} );
}

// =============================================================================
// Utility functions.

function getWidgetWrapperById( widgetId: string ): JQuery<HTMLElement> {
	return $( document ).find( `[${ dataWidgetId }="${ widgetId }"]` );
}

function getQueryItemById( widgetId: string, queryId: string|number ): JQuery<HTMLElement> {
	const widget = getWidgetWrapperById( widgetId );
	return $( widget ).find( `[${ dataQueryId }="${ queryId }"]` );
}

function getQueriesInputValues( widget: JQuery<HTMLElement> ): Array<string> {
	const queryInput = widget.find( queriesInputSelector );
	let queries = String( queryInput.val() ).split( ';' );
	queries = queries.filter( isNonEmptyString );

	return queries;

	function isNonEmptyString( elem: string ): boolean {
		return Boolean( elem );
	}
}

function setQueriesInputValues( widget: JQuery<HTMLElement>, queries: Array<string> ): void {
	const input = widget.find( queriesInputSelector );
	const value = queries.join( ';' );
	input.val( value );
}

// =============================================================================
// jQuery initialize sorting and collapsing.

$( document ).on( 'click', initializeAllQueriesSorting );

function initializeAllQueriesSorting(): void {
	widgets.each( function() {
		initializeWidgetSorting( $( this ) );
	} );
}

function initializeWidgetSorting( widget: JQuery ) {
	const queriesList = widget.find( queriesListSelector );
	queriesList.sortable();
}
