var TWRP_Plugin = (function ($) {
	'use strict';

	$ = $ && Object.prototype.hasOwnProperty.call($, 'default') ? $['default'] : $;

	$( enableCollapsibleSettings );

	function enableCollapsibleSettings() {
		$( '.twrp-collapsible' ).each( function () {
			const element = $( this );
			const activeTabIndex = ( element.attr( 'data-twrp-is-collapsed' ) === '1' ) ? 0 : false;

			element.accordion( {
				active: activeTabIndex,
				heightStyle: 'content',
				collapsible: true,
				icons: false
			} );
		} );
	}

	$( enableCodeMirror );

	function enableCodeMirror() {
		const element = document.getElementById( 'twrp-advanced-args__codemirror-textarea' );

		if ( element ) {
			CodeMirror.fromTextArea( element, {
				mode: 'application/json',
				theme: 'material-darker',
				indentUnit: 4,
				indentWithTabs: true,
				lineNumbers: true,
				autoRefresh: true,
			} );
		}
	}

	// todo: Make everything under twrp-display-list block.

	const effectDuration = 300;

	const categorySelector = $( '#cat' );

	const categoriesInput = $( '#twrp-cat-settings__cat-ids' );

	const categoryIdAttrName = 'data-cat-id';

	const categoriesItemsWrapper = $( '#twrp-cat-settings__cat-list-wrap' );
	const categoriesEmptyMessage = categoriesItemsWrapper.find( '.twrp-display-list__empty-msg' );
	const categoryItem = $(
		'<div class="twrp-display-list__item twrp-cat-settings__cat-list-item">' +
			'<div class="twrp-display-list__item-name twrp-cat-settings__cat-item-name">' +
			'</div>' +
			'<button class="twrp-display-list__item-remove-btn twrp-cat-settings__cat-remove-btn" type="button"><span class="dashicons dashicons-no"></span></button>' +
		'</div>'
	);

	// =============================================================================
	// Function to add a category on the lists.

	$( document ).on( 'click', '#twrp-cat-settings__add-cat-btn', addSelectedCategoryOnClickButton );

	function addSelectedCategoryOnClickButton() {
		const categoryId = categorySelector.find( ':selected' ).val();
		const name = sanitizeCategoryName( categorySelector.find( ':selected' ).text() );

		addCatToInput( categoryId );
		addCatToVisual( categoryId, name );
	}

	function addCatToInput( categoryId ) {
		const oldValue = categoriesInput.val();

		let newValue;
		if ( oldValue && categoryId ) {
			newValue = oldValue + ';' + categoryId;
		} else {
			newValue = categoryId;
		}

		if ( ! categoryIdInsertedInInput( categoryId ) ) {
			categoriesInput.val( newValue );
		}
	}

	function addCatToVisual( categoryId, name ) {
		if ( ! categoryItemIsDisplayed( categoryId ) ) {
			const toAppend = categoryItem.clone();

			// Show a nice effect on removing.
			categoriesEmptyMessage.hide( {
				effect: 'blind',
				duration: effectDuration,
				direction: 'left',
				complete: removeEmptyMessage,
			} );

			toAppend.find( '.twrp-cat-settings__cat-item-name' ).text( sanitizeCategoryName( name ) );
			toAppend.attr( categoryIdAttrName, categoryId );

			categoriesItemsWrapper.append( toAppend );

			// After appending, show a nice effect.
			toAppend.hide();
			toAppend.show( {
				effect: 'blind',
				duration: effectDuration,
				direction: 'left',
			} );
		}

		function removeEmptyMessage() {
			categoriesEmptyMessage.remove();
		}
	}

	// =============================================================================
	// Function for removing

	$( document ).on( 'click', '.twrp-cat-settings__cat-remove-btn', removeCategoryOnButtonClick );

	function removeCategoryOnButtonClick() {
		const categoryId = $( this ).closest( '[' + categoryIdAttrName + ']' ).attr( categoryIdAttrName );
		removeCategoryFromDisplay( categoryId );
		removeCategoryFromInput( categoryId );
	}

	function removeCategoryFromDisplay( categoryId ) {
		const toRemove = categoriesItemsWrapper.find( '[' + categoryIdAttrName + '="' + categoryId + '"]' );
		toRemove.effect( {
			effect: 'blind',
			duration: effectDuration,
			direction: 'left',
			complete: removeElement,
		} );

		function removeElement() {
			toRemove.remove();

			if ( 0 === categoriesItemsWrapper.children().length ) {
				categoriesItemsWrapper.append( categoriesEmptyMessage );
				categoriesEmptyMessage.show( {
					effect: 'blind',
					duration: effectDuration,
					direction: 'left',
				} );
			}
		}
	}

	function removeCategoryFromInput( categoryId ) {
		const categoryIds = categoriesInput.val().split( ';' );
		const toRemoveCategoryIndex = categoryIds.indexOf( categoryId );

		if ( toRemoveCategoryIndex !== -1 ) {
			categoryIds.splice( toRemoveCategoryIndex, 1 );
			categoriesInput.val( categoryIds.join( ';' ) );
		}
	}

	// =============================================================================
	// Function for to verify if a category exist.

	function categoryItemIsDisplayed( categoryId ) {
		const items = categoriesItemsWrapper.find( '.twrp-cat-settings__cat-list-item' );

		let sameIdFound = false;

		items.each( function() {
			if ( categoryId === $( this ).attr( categoryIdAttrName ) ) {
				sameIdFound = true;
			}
		} );

		if ( sameIdFound ) {
			return true;
		}

		return false;
	}

	function categoryIdInsertedInInput( categoryId ) {
		const value = categoriesInput.val();
		if ( ! value ) {
			return false;
		}
		const categoryIds = value.split( ';' );

		if ( categoryIds.indexOf( categoryId ) !== -1 ) {
			return true;
		}

		return false;
	}

	// =============================================================================

	$( refreshDisplayCategories );

	function refreshDisplayCategories() {
		let categoryIds = categoriesInput.val();
		if ( ! categoryIds ) {
			return;
		}
		categoryIds = categoryIds.split( ';' );

		for ( let i = 0; i < categoryIds.length; i++ ) {
			const categoryName = getCategoryName( categoryIds[ i ] );
			if ( categoryName ) {
				addCatToVisual( categoryIds[ i ], getCategoryName( categoryIds[ i ] ) );
			} else {
				categoryIds.splice( i, 1 );
				i--;
			}
		}

		categoriesInput.val( categoryIds.join( ';' ) );
	}

	function refreshInputtedCategories() {
		const categoriesItems = categoriesItemsWrapper.find( '.twrp-cat-settings__cat-list-item' );

		let categoriesIds = '';
		categoriesItems.each( function() {
			const catId = $( this ).attr( categoryIdAttrName );
			if ( ! categoriesIds ) {
				categoriesIds = catId;
			} else {
				categoriesIds += ';' + catId;
			}
		} );

		categoriesInput.val( categoriesIds );
	}

	function getCategoryName( categoryId ) {
		const name = categorySelector.find( '[value="' + categoryId + '"]' ).text();
		return sanitizeCategoryName( name );
	}

	// =============================================================================
	// Sanitization for Category Name.

	/**
	 * Take out the number of counts and trim the name.
	 *
	 * @param {string} name The name to be sanitized.
	 */
	function sanitizeCategoryName( name ) {
		const removeCountParenthesisRegex = /\([^(]*\)$/;
		name = name.replace( removeCountParenthesisRegex, '' );
		name = name.trim();
		return name;
	}

	// =============================================================================
	// Make The Categories Sortable
	// =============================================================================

	$( makeItemsSortable );

	function makeItemsSortable() {
		categoriesItemsWrapper.sortable( {
			placeholder: 'twrp-display-list__placeholder',
			stop: refreshInputtedCategories,
		} );
	}

	// =============================================================================
	// Show/Hide Select For Category Relation.
	// =============================================================================

	const CategoryRelationWrapper = $( '#twrp-cat-settings__js-select-relation-wrap' );
	const CategoryRelationHiddenClass = 'twrp-cat-settings__select-relation-wrap--hidden';

	const CategoryTypeSelect = $( '#twrp-cat-settings__type' );

	$( refreshCategoryRelationDisplay );
	$( document ).on( 'change', '#twrp-cat-settings__type', refreshCategoryRelationDisplay );

	function refreshCategoryRelationDisplay() {
		if ( 'IN' === CategoryTypeSelect.val() ) {
			if ( CategoryRelationWrapper.hasClass( CategoryRelationHiddenClass ) ) {
				CategoryRelationWrapper.removeClass( CategoryRelationHiddenClass );
				CategoryRelationWrapper.hide();
				CategoryRelationWrapper.show( {
					effect: 'blind',
					duration: effectDuration,
					complete: resetEffectInlineStyle,
				} );
			}
		} else if ( ! CategoryRelationWrapper.hasClass( CategoryRelationHiddenClass ) ) {
			CategoryRelationWrapper.hide( {
				effect: 'blind',
				duration: effectDuration,
				complete: completeHideEffect,
			} );
		}

		function completeHideEffect() {
			CategoryRelationWrapper.addClass( CategoryRelationHiddenClass );
			resetEffectInlineStyle();
		}

		function resetEffectInlineStyle() {
			CategoryRelationWrapper.removeAttr( 'style' );
		}
	}

	// =============================================================================

	$( initializeAutoComplete );

	const authorSearchControl = $( '#twrp-author-settings__js-author-search' );

	function initializeAutoComplete() {
		authorSearchControl.autocomplete( {
			source: getSearchedUsers,
			minLength: 2,
		} );
	}

	// =============================================================================

	function getSearchedUsers( request, sendToControl ) {
		const allUsers = new wp.api.collections.Users();
		const usersFound = [];

		allUsers.fetch( {
			data: {
				_fields: 'id,name',
				search: request.term,
			},
		} );

		allUsers.once( 'sync', updateCategories );

		function updateCategories() {
			for ( let i = 0; i < allUsers.length; i++ ) {
				// Todo: Check if properties of object exist. Sanitize Name and Id.
				usersFound.push( {
					value: allUsers.models[ i ].attributes.name,
					label: allUsers.models[ i ].attributes.name,
					id: allUsers.models[ i ].attributes.id,
				} );
			}
			sendToControl( usersFound );
		}

		allUsers.once( 'error', function() {
			console.error( 'TWRP Backbone error when getting users.' ); // eslint-disable-line
			updateCategories();
		} );

		allUsers.once( 'invalid', function() {
			console.error( 'TWRP Backbone invalid when getting users.' ); // eslint-disable-line
			updateCategories();
		} );
	}

	// =============================================================================

	const authorHiddenInput = $( '#twrp-author-settings__js-author-ids' );

	const authorsVisualList = $( '#twrp-author-settings__js-authors-list' );
	const authorVisualItem = $(
		'<div class="twrp-display-list__item twrp-author-settings__author-item">' +
			'<div class="twrp-author-settings__author-item-name">' +
			'</div>' +
			'<button class="twrp-display-list__item-remove-btn twrp-author-settings__js-author-remove-btn" type="button"><span class="dashicons dashicons-no"></span></button>' +
		'</div>'
	);

	const authorIdAttrName = 'data-author-id';

	$( document ).on( 'click', '#twrp-author-settings__js-author-add-btn', handleAddAuthorClick );

	function handleAddAuthorClick() {
		const autocompleteInstance = authorSearchControl.autocomplete( 'instance' );

		// todo: Check if property selectedItem exist first.
		const selectedItem = autocompleteInstance.selectedItem;

		// todo: Check if property label,value exist first.
		const id = selectedItem.id;
		const name = selectedItem.label;
		addAuthorToVisualList( id, name );
		addAuthorToHiddenInput( id );
	}

	// =============================================================================

	function addAuthorToVisualList( id, name ) {
		if ( authorExistInVisualList( id ) ) {
			return;
		}

		const newAuthorItem = authorVisualItem.clone();
		newAuthorItem.find( '.twrp-author-settings__author-item-name' ).append( sanitizeAuthorName( name ) );
		newAuthorItem.attr( authorIdAttrName, id );
		authorsVisualList.append( newAuthorItem );
	}

	function addAuthorToHiddenInput( id ) {
		if ( authorExistInHiddenInput( id ) ) {
			return;
		}

		const previousVal = authorHiddenInput.val();

		let newVal = '';
		if ( previousVal ) {
			newVal = previousVal + ';' + id;
		} else {
			newVal = id;
		}

		authorHiddenInput.val( newVal );
	}

	// =============================================================================

	function authorExistInVisualList( id ) {
		const authorItem = authorsVisualList.find( '[' + authorIdAttrName + '="' + id + '"]' );

		if ( authorItem.length ) {
			return true;
		}

		return false;
	}

	function authorExistInHiddenInput( id ) {
		const inputVal = authorHiddenInput.val();

		if ( ! inputVal ) {
			return false;
		}

		const authorsIds = inputVal.split( ';' ).map( mapToInt );

		if ( authorsIds.indexOf( id ) !== -1 ) {
			return true;
		}

		return false;

		function mapToInt( val ) {
			return parseInt( val );
		}
	}

	// =============================================================================

	$( document ).on( 'click', '.twrp-author-settings__js-author-remove-btn', handleRemoveAuthor );

	function handleRemoveAuthor( e ) {
		// todo: check if we have an id.
		const id = $( this ).closest( '[' + authorIdAttrName + ']' ).attr( authorIdAttrName );

		removeAuthorFromVisualList( id );
		removeAuthorFromHiddenInput( id );
	}

	function removeAuthorFromVisualList( id ) {
		const itemsToRemove = authorsVisualList.find( '[' + authorIdAttrName + '="' + id + '"]' );
		console.dir( itemsToRemove );
		itemsToRemove.remove();
	}

	function removeAuthorFromHiddenInput( id ) {
		const currentValue = authorHiddenInput.val();

		// todo: verify if exist.
		const authorsIds = currentValue.split( ';' );
		const indexOfId = authorsIds.indexOf( id );

		if ( indexOfId !== -1 ) {
			authorsIds.splice( indexOfId, 1 );
			const newValue = authorsIds.join( ';' );
			authorHiddenInput.val( newValue );
		}
	}

	// =============================================================================

	function sanitizeAuthorName( name ) {
		return name;
	}

	// =============================================================================

	/*! *****************************************************************************
	Copyright (c) Microsoft Corporation. All rights reserved.
	Licensed under the Apache License, Version 2.0 (the "License"); you may not use
	this file except in compliance with the License. You may obtain a copy of the
	License at http://www.apache.org/licenses/LICENSE-2.0

	THIS CODE IS PROVIDED ON AN *AS IS* BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
	KIND, EITHER EXPRESS OR IMPLIED, INCLUDING WITHOUT LIMITATION ANY IMPLIED
	WARRANTIES OR CONDITIONS OF TITLE, FITNESS FOR A PARTICULAR PURPOSE,
	MERCHANTABLITY OR NON-INFRINGEMENT.

	See the Apache Version 2.0 License for specific language governing permissions
	and limitations under the License.
	***************************************************************************** */

	function __awaiter(thisArg, _arguments, P, generator) {
	    function adopt(value) { return value instanceof P ? value : new P(function (resolve) { resolve(value); }); }
	    return new (P || (P = Promise))(function (resolve, reject) {
	        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }
	        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }
	        function step(result) { result.done ? resolve(result.value) : adopt(result.value).then(fulfilled, rejected); }
	        step((generator = generator.apply(thisArg, _arguments || [])).next());
	    });
	}

	function __generator(thisArg, body) {
	    var _ = { label: 0, sent: function() { if (t[0] & 1) throw t[1]; return t[1]; }, trys: [], ops: [] }, f, y, t, g;
	    return g = { next: verb(0), "throw": verb(1), "return": verb(2) }, typeof Symbol === "function" && (g[Symbol.iterator] = function() { return this; }), g;
	    function verb(n) { return function (v) { return step([n, v]); }; }
	    function step(op) {
	        if (f) throw new TypeError("Generator is already executing.");
	        while (_) try {
	            if (f = 1, y && (t = op[0] & 2 ? y["return"] : op[0] ? y["throw"] || ((t = y["return"]) && t.call(y), 0) : y.next) && !(t = t.call(y, op[1])).done) return t;
	            if (y = 0, t) op = [op[0] & 2, t.value];
	            switch (op[0]) {
	                case 0: case 1: t = op; break;
	                case 4: _.label++; return { value: op[1], done: false };
	                case 5: _.label++; y = op[1]; op = [0]; continue;
	                case 7: op = _.ops.pop(); _.trys.pop(); continue;
	                default:
	                    if (!(t = _.trys, t = t.length > 0 && t[t.length - 1]) && (op[0] === 6 || op[0] === 2)) { _ = 0; continue; }
	                    if (op[0] === 3 && (!t || (op[1] > t[0] && op[1] < t[3]))) { _.label = op[1]; break; }
	                    if (op[0] === 6 && _.label < t[1]) { _.label = t[1]; t = op; break; }
	                    if (t && _.label < t[2]) { _.label = t[2]; _.ops.push(op); break; }
	                    if (t[2]) _.ops.pop();
	                    _.trys.pop(); continue;
	            }
	            op = body.call(thisArg, _);
	        } catch (e) { op = [6, e]; y = 0; } finally { f = t = 0; }
	        if (op[0] & 5) throw op[1]; return { value: op[0] ? op[1] : void 0, done: true };
	    }
	}

	var widgets;
	var dataWidgetId = 'data-twrp-widget-id';
	var dataQueryId = 'data-twrp-query-id';
	var queriesListSelector = '.twrp-widget-form__selected-queries-list';
	var queriesInputSelector = '.twrp-widget-form__selected-queries';
	$(document).on('click', '.twrp-widget-form__select-query-to-add-btn', handleAddQueryButton);
	$(document).on('click', updateWidgetsList);
	updateWidgetsList();
	$(document).on('click', updateAllWidgets);
	updateAllWidgets();
	/**
	 * Update the file global variable "widgets" to contain all the instance widgets
	 * on the page.
	 */
	function updateWidgetsList() {
	    widgets = $(document).find("[" + dataWidgetId + "]");
	}
	function updateAllWidgets() {
	    widgets.each(function () {
	        var widgetId = $(this).attr(dataWidgetId);
	        updateWidgetQueriesDisplayList(widgetId);
	    });
	}
	/**
	 * Handles the click when a user wants to add a query(tab) to be displayed and
	 * modify its settings.
	 */
	function handleAddQueryButton() {
	    var widgetWrapper = $(this).closest('.twrp-widget-form');
	    var queryId = String(widgetWrapper.find('.twrp-widget-form__select-query-to-add').val());
	    var queriesInputValue = getQueriesInputValues(widgetWrapper);
	    if (queriesInputValue.indexOf(queryId) === -1) {
	        queriesInputValue.push(queryId);
	        setQueriesInputValues(widgetWrapper, queriesInputValue);
	    }
	}
	// =============================================================================
	// Widget List Functions
	/**
	 * Update the queries list that display settings from the queries input.
	 */
	function updateWidgetQueriesDisplayList(widgetId) {
	    var widget = getWidgetWrapperById(widgetId);
	    var queries = getQueriesInputValues(widget);
	    for (var i_1 = 0; i_1 < queries.length; i_1++) {
	        if (!queryExistInWidgetList(widgetId, queries[i_1])) {
	            appendQueryToWidgetList(widgetId, queries[i_1]);
	        }
	    }
	}
	/**
	 * Check if a query settings are displayed in the widget.
	 */
	function queryExistInWidgetList(widgetId, queryId) {
	    var queryItem = getQueryItemById(widgetId, queryId);
	    if (queryItem.length) {
	        return true;
	    }
	    return false;
	}
	/**
	 * Appends a query tab to the widget list of queries.
	 */
	function appendQueryToWidgetList(widgetId, queryId) {
	    return __awaiter(this, void 0, void 0, function () {
	        var queryHTML, widget;
	        return __generator(this, function (_a) {
	            switch (_a.label) {
	                case 0: return [4 /*yield*/, getQueryHTMLForList(widgetId, queryId)];
	                case 1:
	                    queryHTML = _a.sent();
	                    widget = getWidgetWrapperById(widgetId);
	                    widget.find('.twrp-widget-form__selected-queries-list').append(queryHTML);
	                    return [2 /*return*/];
	            }
	        });
	    });
	}
	/**
	 * Get the HTML for a query tab to be displayed in the widget setting.
	 */
	function getQueryHTMLForList(widgetId, queryId) {
	    return $.ajax({
	        url: ajaxurl,
	        method: 'POST',
	        data: {
	            action: 'twrp_widget_create_query_setting',
	            widget_id: widgetId,
	            query_id: queryId,
	        },
	    });
	}
	// =============================================================================
	// Utility functions.
	function getWidgetWrapperById(widgetId) {
	    return $(document).find("[" + dataWidgetId + "=\"" + widgetId + "\"]");
	}
	function getQueryItemById(widgetId, queryId) {
	    var widget = getWidgetWrapperById(widgetId);
	    return $(widget).find("[" + dataQueryId + "=\"" + queryId + "\"]");
	}
	function getQueriesInputValues(widget) {
	    var queryInput = widget.find(queriesInputSelector);
	    var queries = String(queryInput.val()).split(';');
	    queries = queries.filter(isNonEmptyString);
	    return queries;
	    function isNonEmptyString(elem) {
	        return Boolean(elem);
	    }
	}
	function setQueriesInputValues(widget, queries) {
	    var input = widget.find(queriesInputSelector);
	    var value = queries.join(';');
	    input.val(value);
	}
	// =============================================================================
	// jQuery initialize sorting and collapsing.
	$(document).on('click', initializeAllQueriesSorting);
	function initializeAllQueriesSorting() {
	    widgets.each(function () {
	        initializeWidgetSorting($(this));
	    });
	}
	function initializeWidgetSorting(widget) {
	    var queriesList = widget.find(queriesListSelector);
	    queriesList.sortable();
	}

	var script = {};

	return script;

}(jQuery));
