import $ from 'jquery';
import 'jqueryui';

declare const ajaxurl: string;

/**
 * Todo: Do not save widget if the query tabs are not displayed.
 */

const dataWidgetId = 'data-twrp-widget-id';
const dataQueryId = 'data-twrp-query-id';

const queriesListSelector = '.twrp-widget-form__selected-queries-list';
const queriesItemSelector = '.twrp-widget-form__selected-query';

const queryAddSelector = '.twrp-widget-form__select-query-to-add-btn';
const queryRemoveSelector = '.twrp-widget-form__remove-selected-query';

const queriesInputSelector = '.twrp-widget-form__selected-queries';

const selectArticleBlockSelector = '.twrp-widget-form__article-block-selector';
const artblockSettingsWrapperSelector = '.twrp-widget-form__article-block-settings';

$( document ).on( 'click', queryAddSelector, handleAddQueryButton );
$( document ).on( 'click', queryRemoveSelector, handleRemoveQuery );

/**
 * Handles the click when a user wants to add a query(tab) to be displayed and
 * modify its settings.
 */
function handleAddQueryButton(): void {
	const widgetWrapper = $( this ).closest( '.twrp-widget-form' );
	const widgetId = widgetWrapper.attr( dataWidgetId );
	const queryId = String( widgetWrapper.find( '.twrp-widget-form__select-query-to-add' ).val() );

	const queriesInputValue = getQueriesInputValues( widgetWrapper );

	if ( queriesInputValue.indexOf( queryId ) === -1 ) {
		queriesInputValue.push( queryId );
		setQueriesInputValues( widgetId, queriesInputValue );
		if ( ! queryExistInList( widgetId, queryId ) ) {
			appendQueryToList( widgetId, queryId );
		}
	}
}

/**
 * Removes the query from Display List and Input List.
 */
function handleRemoveQuery() {
	const widgetId = getClosestWidgetId( $( this ) );
	const queryId = getClosestQueryId( $( this ) );

	removeQueryFromList( widgetId, queryId );
	updateQueriesInput( widgetId );
}

// =============================================================================
// Widgets

let widgets: JQuery<HTMLElement> = $();

$( updateWidgetsList );

$( document ).on( 'click', updateWidgetsList );

/**
 * Update the file global variable "widgets" to contain all the instance widgets
 * on the page.
 */
function updateWidgetsList(): void {
	widgets = $( document ).find( `[${ dataWidgetId }]` );
}

// =============================================================================
// Widget List Display Functions

$( updateAllWidgetsListOnLoad );
$( document ).on( 'click', updateAllWidgetsListOnLoad );

function updateAllWidgetsListOnLoad(): void {
	widgets.each( function() {
		const widgetId = $( this ).attr( dataWidgetId );
		updateQueriesDisplayListFromInput( widgetId );
	} );
}

/**
 * Update the queries list from the queries input.
 */
function updateQueriesDisplayListFromInput( widgetId: string ) {
	const widget = getWidgetWrapperById( widgetId );
	const queries = getQueriesInputValues( widget );

	for ( let i = 0; i < queries.length; i++ ) {
		if ( ! queryExistInList( widgetId, queries[ i ] ) ) {
			appendQueryToList( widgetId, queries[ i ] );
		}
	}

	// Todo: remove all widgets that are not in the input.
	const queriesItems = widget.find( `[${ dataQueryId }]` );
	queriesItems.each( function() {
		const queryId = $( this ).attr( dataQueryId );
		if ( queries.indexOf( queryId ) === -1 ) {
			$( this ).remove();
		}
	} );
}

/**
 * Updates the queries input, from the queries display list.
 */
function updateQueriesInput( widgetId: string ): void {
	const widget = getWidgetWrapperById( widgetId );
	const queriesItems = widget.find( queriesListSelector ).find( queriesItemSelector );

	const queries = [];
	queriesItems.each( function() {
		const queryId = $( this ).attr( dataQueryId );
		if ( queryId ) {
			queries.push( queryId );
		}
	} );
	setQueriesInputValues( widgetId, queries );
}

/**
 * Appends a query tab to the widget list of queries.
 */
async function appendQueryToList( widgetId: string, queryId: string|number ) {
	const queryHTML = await getQueryHTMLForList( widgetId, queryId );
	const widget = getWidgetWrapperById( widgetId );
	if ( ! queryExistInList( widgetId, queryId ) ) {
		const queriesList = widget.find( '.twrp-widget-form__selected-queries-list' );
		queriesList.append( queryHTML );
		queriesList.trigger( 'twrp-query-list-added', [ widgetId, queryId ] );
	}
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

/**
 * Remove a Query From the Display List.
 */
function removeQueryFromList( widgetId: string, queryId: string|number ) {
	const queryItem = getQueryItemById( widgetId, queryId );
	queryItem.remove();
}

/**
 * Check if a query settings are displayed in the widget.
 */
function queryExistInList( widgetId: string, queryId: string|number ): boolean {
	const queryItem = getQueryItemById( widgetId, queryId );
	if ( queryItem.length ) {
		return true;
	}

	return false;
}

$( document ).on( 'twrp-query-list-added', handleReorderQueries );

function handleReorderQueries( event, widgetId ) {
	reorderQueriesDisplayList( widgetId );
}

function reorderQueriesDisplayList( widgetId: string ): void {
	const widget = getWidgetWrapperById( widgetId );
	const queryList = widget.find( queriesListSelector );
	const queryItems = widget.find( `[${ dataQueryId }]` );
	const queriesIds = getQueriesInputValues( widget );

	queryItems.detach();

	for ( let i = 0; i < queriesIds.length; i++ ) {
		for ( let j = 0; j < queryItems.length; j++ ) {
			if ( queriesIds[ i ] === queryItems.eq( j ).attr( dataQueryId ) ) {
				queryList.append( queryItems.eq( j ) );
			}
		}
	}
}

// =============================================================================
// Utility functions.

function getClosestWidgetId( element: any ): string {
	return $( element ).closest( `[${ dataWidgetId }]` ).attr( dataWidgetId );
}

function getClosestQueryId( element: any ): string {
	return $( element ).closest( `[${ dataQueryId }]` ).attr( dataQueryId );
}

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

function setQueriesInputValues( widgetId: string, queries: Array<string> ): void {
	const widget = getWidgetWrapperById( widgetId );
	const input = widget.find( queriesInputSelector );
	const value = queries.join( ';' );
	input.val( value );
}

// =============================================================================
// jQuery sorting and collapsing.

$( document ).on( 'click', initializeAllQueriesSorting );

function initializeAllQueriesSorting(): void {
	widgets.each( function() {
		initializeWidgetSorting( $( this ) );
	} );
}

function initializeWidgetSorting( widget: JQuery<HTMLElement> ) {
	const queriesList = widget.find( queriesListSelector );
	queriesList.sortable( {
		update: handleSortingChange,
	} );
}

function handleSortingChange(): void {
	const widgetId = getClosestWidgetId( this );
	updateQueriesInput( widgetId );
}

// =============================================================================
// jQuery collapsing.

$( document ).on( 'twrp-query-list-added', handleAddQueryCollapsible );

function handleAddQueryCollapsible( event, widgetId: string, queryId: string ) {
	makeQueryCollapsible( widgetId, queryId );
}

function makeQueryCollapsible( widgetId: string, queryId: string ): void {
	const query = getQueryItemById( widgetId, queryId );
	const accordionInstance = query.accordion( 'instance' );
	if ( accordionInstance ) {
		query.accordion( 'refresh' );
	} else {
		query.accordion( {
			collapsible: true,
			active: false,
			heightStyle: 'content',
		} );
	}
}

// =============================================================================
// Load article blocks settings on the fly.

$( document ).on( 'change', selectArticleBlockSelector, handleArticleBlockChanged );

async function handleArticleBlockChanged() {
	const widgetId = getClosestWidgetId( $( this ) );
	const queryId = getClosestQueryId( $( this ) );
	const artblockId = String( $( this ).val() );
	const artblockSettingsHTML = await getArticleBlockSettings( widgetId, queryId, artblockId );
	insertArticleBlock( widgetId, queryId, artblockSettingsHTML );
}

function getArticleBlockSettings( widgetId: string, queryId: string|number, artblockId: string|number ) {
	return $.ajax( {
		url: ajaxurl,
		method: 'POST',
		data: {
			action: 'twrp_widget_create_artblock_settings',
			artblock_id: artblockId,
			widget_id: widgetId,
			query_id: queryId,
		},
	} );
}

function insertArticleBlock( widgetId: string, queryId: string|number, html: string ) {
	const queryItem = getQueryItemById( widgetId, queryId );
	const artblockSettingsWrapper = queryItem.find( artblockSettingsWrapperSelector );
	const artblockContainer = artblockSettingsWrapper.closest( '.twrp-widget-form__article-block-settings-container' );
	artblockSettingsWrapper.remove();
	artblockContainer.append( html );
}
