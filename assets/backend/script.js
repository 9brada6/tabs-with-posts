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
	// Hide/Show Categories List and Add Button based on option selected.
	var authorTypeSelector = $('#twrp-author-settings__select_type');
	var authorSearchWrap = $('#twrp-author-settings__author-search-wrap');
	var authorToHideList = $('#twrp-author-settings__js-authors-list');
	$(document).ready(hideOrShowVisualList);
	$(document).on('change', '#twrp-author-settings__select_type', hideOrShowVisualList);
	/**
	 * Hide or show the visual list and the form input to search for users.
	 */
	function hideOrShowVisualList() {
	    var authorTypeVal = authorTypeSelector.val();
	    if ('IN' === authorTypeVal || 'OUT' === authorTypeVal) {
	        authorSearchWrap.show('blind');
	        authorToHideList.show('blind');
	    }
	    else {
	        authorSearchWrap.hide('blind');
	        authorToHideList.hide('blind');
	    }
	}
	// =============================================================================
	// Hide/Show Same author notice.
	var sameAuthorNotice = $('#twrp-author-settings__js-same-author-notice');
	$(document).ready(handleSameAuthorNotice);
	$(document).on('change', '#twrp-author-settings__select_type', handleSameAuthorNotice);
	/**
	 * Hide or show a notice that says that when the author is set to the same as
	 * the post, the query will not be displayed on non-singular pages.
	 */
	function handleSameAuthorNotice() {
	    var authorTypeVal = authorTypeSelector.val();
	    if ('SAME' === authorTypeVal) {
	        sameAuthorNotice.show('blind');
	    }
	    else {
	        sameAuthorNotice.hide('blind');
	    }
	}
	// =============================================================================
	// Manage Author Search
	$(initializeAutoComplete);
	/**
	 * The search input where administrators will search for users.
	 */
	var authorSearchInput = $('#twrp-author-settings__js-author-search');
	/**
	 * Initialize the search input, when a user enter some characters, it will
	 * automatically search and display the options.
	 */
	function initializeAutoComplete() {
	    authorSearchInput.autocomplete({
	        source: showSearchedUsers,
	        minLength: 2,
	    });
	}
	/**
	 * Search for the users and append the results into the autocomplete selector.
	 */
	function showSearchedUsers(request, sendToControl) {
	    var allUsers = new wp.api.collections.Users();
	    var usersFound = [];
	    allUsers.fetch({
	        data: {
	            _fields: 'id,name',
	            search: request.term,
	        },
	    });
	    allUsers.once('sync', updateCategories);
	    function updateCategories() {
	        for (var i_1 = 0; i_1 < allUsers.length; i_1++) {
	            var name_1 = void 0, id_1 = void 0;
	            try {
	                name_1 = allUsers.models[i_1].attributes.name;
	                id_1 = allUsers.models[i_1].attributes.id;
	            }
	            catch (error) {
	                continue;
	            }
	            usersFound.push({
	                value: name_1,
	                label: name_1,
	                id: id_1,
	            });
	        }
	        sendToControl(usersFound);
	    }
	    allUsers.once('error', function () {
	        console.error('TWRP Backbone error when getting users.'); // eslint-disable-line
	        updateCategories();
	    });
	    allUsers.once('invalid', function () {
	        console.error('TWRP Backbone invalid when getting users.'); // eslint-disable-line
	        updateCategories();
	    });
	}
	// =============================================================================
	// Add an author
	var authorsIdsInput = $('#twrp-author-settings__js-author-ids');
	var authorsVisualList = $('#twrp-author-settings__js-authors-list');
	/**
	 * The template for an author item, to be appended to the visual list. Note that
	 * we have a similar template in the PHP file, so a change here will require
	 * also a change there, and vice-versa.
	 */
	var authorVisualItem = $('<div class="twrp-display-list__item twrp-author-settings__author-item">' +
	    '<div class="twrp-author-settings__author-item-name"></div>' +
	    '<button class="twrp-display-list__item-remove-btn twrp-author-settings__js-author-remove-btn" type="button">' +
	    '<span class="dashicons dashicons-no"></span>' +
	    '</button>' +
	    '</div>');
	/**
	 * The author attribute name that hold the Id of a visual item.
	 */
	var authorIdAttrName = 'data-author-id';
	$(document).on('click', '#twrp-author-settings__js-author-add-btn', handleAddAuthorClick);
	$(document).on('keypress', '#twrp-author-settings__js-author-search', handleSearchInputKeypress);
	/**
	 * When a user click "enter", add the current selected author to the list.
	 */
	function handleSearchInputKeypress(event) {
	    var keycode = (event.keyCode ? event.keyCode : event.which);
	    if (keycode !== 13) {
	        return;
	    }
	    event.preventDefault();
	    var autocompleteInstance = authorSearchInput.autocomplete('instance');
	    var id, name;
	    try {
	        var selectedItem = autocompleteInstance.selectedItem;
	        id = selectedItem.id;
	        name = selectedItem.label;
	    }
	    catch (error) {
	        return;
	    }
	    addAuthor(id, name);
	}
	/**
	 * Handles the click on "Add author" button.
	 */
	function handleAddAuthorClick() {
	    var autocompleteInstance = authorSearchInput.autocomplete('instance');
	    var id, name;
	    try {
	        var selectedItem = autocompleteInstance.selectedItem;
	        id = selectedItem.id;
	        name = selectedItem.label;
	    }
	    catch (error) {
	        return;
	    }
	    addAuthor(id, name);
	}
	/**
	 * Add an author to the list of selected authors(both visual, and in the hidden
	 * input).
	 */
	function addAuthor(id, name) {
	    _addAuthorToVisualList(id, name);
	    _addAuthorToHiddenInput(id);
	    removeOrAddNoAuthorsText();
	}
	/**
	 * Add an author to the visual list.
	 */
	function _addAuthorToVisualList(id, name) {
	    if (authorExistInVisualList(id)) {
	        return;
	    }
	    var newAuthorItem = authorVisualItem.clone();
	    newAuthorItem.find('.twrp-author-settings__author-item-name').append(sanitizeAuthorName(name));
	    newAuthorItem.attr(authorIdAttrName, id);
	    authorsVisualList.append(newAuthorItem);
	}
	/**
	 * Add an author to the list of hidden input.
	 */
	function _addAuthorToHiddenInput(id) {
	    if (authorExistInHiddenInput(id)) {
	        return;
	    }
	    id = String(id);
	    var previousVal = authorsIdsInput.val();
	    var newVal = '';
	    if (previousVal) {
	        newVal = previousVal + ';' + id;
	    }
	    else {
	        newVal = id;
	    }
	    authorsIdsInput.val(newVal);
	}
	// =============================================================================
	// Remove an author
	$(document).on('click', '.twrp-author-settings__js-author-remove-btn', handleRemoveAuthor);
	/**
	 * Handle the removing of the authors from the selected list.
	 */
	function handleRemoveAuthor() {
	    var id = $(this).closest('[' + authorIdAttrName + ']').attr(authorIdAttrName);
	    id = Number(id);
	    if (!(id > 0)) {
	        return;
	    }
	    removeAuthor(id);
	}
	/**
	 * Removes an author to the list of selected authors(both visual, and in the
	 * hidden input).
	 */
	function removeAuthor(id) {
	    _removeAuthorFromVisualList(id);
	    _removeAuthorFromHiddenInput(id);
	    removeOrAddNoAuthorsText();
	}
	/**
	 * Removes the author from the visual list, based on id.
	 */
	function _removeAuthorFromVisualList(id) {
	    var itemsToRemove = authorsVisualList.find('[' + authorIdAttrName + '="' + id + '"]');
	    itemsToRemove.remove();
	}
	function _removeAuthorFromHiddenInput(id) {
	    var currentValue = String(authorsIdsInput.val());
	    id = String(id);
	    var authorsIds = currentValue.split(';');
	    var indexOfId = authorsIds.indexOf(id);
	    if (indexOfId !== -1) {
	        authorsIds.splice(indexOfId, 1);
	        authorsIdsInput.val(authorsIds.join(';'));
	    }
	}
	// =============================================================================
	// Manage the "No Authors Added" Text.
	/**
	 * Contains the HTML Element that will be inserted/removed as necessary.
	 */
	var noAuthorsText = $('#twrp-author-settings__js-no-authors-selected');
	$(document).ready(removeOrAddNoAuthorsText);
	/**
	 * Remove or add "No authors" text if necessary.
	 */
	function removeOrAddNoAuthorsText() {
	    _removeNoAuthorsTextIfNecessary();
	    _addNoAuthorsTextIfNecessary();
	}
	/**
	 * If Necessary, removes the "No Authors selected" text.
	 */
	function _removeNoAuthorsTextIfNecessary() {
	    var textIsAppended = (authorsVisualList.find(noAuthorsText).length > 0);
	    var haveItems = (authorsVisualList.find("[" + authorIdAttrName + "]").length > 0);
	    if (haveItems && textIsAppended) {
	        noAuthorsText.detach();
	    }
	}
	/**
	 * If Necessary, adds the "No Authors selected" text.
	 */
	function _addNoAuthorsTextIfNecessary() {
	    var textIsAppended = (authorsVisualList.find(noAuthorsText).length > 0);
	    var haveItems = (authorsVisualList.find("[" + authorIdAttrName + "]").length > 0);
	    if ((!textIsAppended) && (!haveItems)) {
	        authorsVisualList.append(noAuthorsText);
	    }
	}
	// =============================================================================
	// Sorting function.
	$(document).ready(initializeSorting);
	function initializeSorting() {
	    authorsVisualList.sortable({
	        placeholder: 'twrp-display-list__placeholder',
	        stop: updateAuthorsIdsFromVisualList,
	    });
	}
	// =============================================================================
	// Helper Functions
	/**
	 * Check to see if a given author item is displayed in visual list.
	 */
	function authorExistInVisualList(id) {
	    var authorItem = authorsVisualList.find('[' + authorIdAttrName + '="' + id + '"]');
	    if (authorItem.length) {
	        return true;
	    }
	    return false;
	}
	/**
	 * Check to see if a given author item is displayed in visual list.
	 */
	function authorExistInHiddenInput(id) {
	    var inputVal = String(authorsIdsInput.val());
	    id = Number(id);
	    if ((!inputVal) || !(id > 0)) {
	        return false;
	    }
	    var authorsIds = inputVal.split(';').map(mapToInt);
	    if (authorsIds.indexOf(id) !== -1) {
	        return true;
	    }
	    return false;
	    function mapToInt(val) {
	        return parseInt(val);
	    }
	}
	function updateAuthorsIdsFromVisualList() {
	    var authorItems = authorsVisualList.find('.twrp-author-settings__author-item');
	    var authorsIds = [];
	    authorItems.each(function () {
	        var itemId = $(this).attr(authorIdAttrName);
	        itemId = +itemId;
	        if (itemId > 0) {
	            authorsIds.push(itemId);
	        }
	    });
	    authorsIdsInput.val(authorsIds.join(';'));
	}
	/**
	 * Sanitize the author name.
	 *
	 * @todo
	 */
	function sanitizeAuthorName(name) {
	    return name;
	}

	// Todo...
	var effectDuration$1 = 500;
	// =============================================================================
	function hideUp(element) {
	    $(element).hide({
	        effect: 'blind',
	        duration: effectDuration$1,
	        complete: addHideClass,
	    });
	}
	function showUp(element) {
	    $(element).show({
	        effect: 'blind',
	        duration: effectDuration$1,
	        complete: removeHideClass,
	    });
	}
	// =============================================================================
	function addHideClass() {
	    $(this).addClass('twrp-hidden');
	}
	function removeHideClass() {
	    $(this).removeClass('twrp-hidden');
	}

	var selectCommentsComparator = $('#twrp-query-comments-settings__js-comparator');
	var numCommentsInput = $('#twrp-query-comments-settings__js-num_comments');
	$(document).ready(hideOrShowCommentsNumberInput);
	$(document).on('change', '#twrp-query-comments-settings__js-comparator', hideOrShowCommentsNumberInput);
	function hideOrShowCommentsNumberInput() {
	    var comparator = selectCommentsComparator.val();
	    if ('NA' === comparator) {
	        hideUp(numCommentsInput);
	    }
	    else {
	        showUp(numCommentsInput);
	    }
	}

	var searchInput = $('#twrp-search-setting__js-search-input');
	var warningWrapper = $('#twrp-search-setting__js-words-warning');
	$(document).ready(hiderOrShowSearchWarning);
	$(document).on('change', '#twrp-search-setting__js-search-input', hiderOrShowSearchWarning);
	function hiderOrShowSearchWarning() {
	    var searchString = String(searchInput.val());
	    var searchStringLength = searchString.length;
	    if ((searchStringLength !== 0) && (searchStringLength < 3)) {
	        showUp(warningWrapper);
	    }
	    else {
	        hideUp(warningWrapper);
	    }
	}

	/*! *****************************************************************************
	Copyright (c) Microsoft Corporation.

	Permission to use, copy, modify, and/or distribute this software for any
	purpose with or without fee is hereby granted.

	THE SOFTWARE IS PROVIDED "AS IS" AND THE AUTHOR DISCLAIMS ALL WARRANTIES WITH
	REGARD TO THIS SOFTWARE INCLUDING ALL IMPLIED WARRANTIES OF MERCHANTABILITY
	AND FITNESS. IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR ANY SPECIAL, DIRECT,
	INDIRECT, OR CONSEQUENTIAL DAMAGES OR ANY DAMAGES WHATSOEVER RESULTING FROM
	LOSS OF USE, DATA OR PROFITS, WHETHER IN AN ACTION OF CONTRACT, NEGLIGENCE OR
	OTHER TORTIOUS ACTION, ARISING OUT OF OR IN CONNECTION WITH THE USE OR
	PERFORMANCE OF THIS SOFTWARE.
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

	/**
	 * Todo: Do not save widget if the query tabs are not displayed.
	 * Todo: Block the select option while the article block is loading and waited to be appended.
	 */
	var dataWidgetId = 'data-twrp-widget-id';
	var dataQueryId = 'data-twrp-query-id';
	var dataArtblockId = 'data-twrp-selected-artblock';
	var queriesListSelector = '.twrp-widget-form__selected-queries-list';
	var queriesItemSelector = '.twrp-widget-form__selected-query';
	var queryAddSelector = '.twrp-widget-form__select-query-to-add-btn';
	var queryRemoveSelector = '.twrp-widget-form__remove-selected-query';
	var queriesInputSelector = '.twrp-widget-form__selected-queries';
	var selectArticleBlockSelector = '.twrp-widget-form__article-block-selector';
	var artblockSettingsWrapperSelector = '.twrp-widget-form__article-block-settings';
	$(document).on('click', queryAddSelector, handleAddQueryButton);
	$(document).on('click', queryRemoveSelector, handleRemoveQuery);
	/**
	 * Handles the click when a user wants to add a query(tab) to be displayed and
	 * modify its settings.
	 */
	function handleAddQueryButton() {
	    var widgetWrapper = $(this).closest('.twrp-widget-form');
	    var widgetId = widgetWrapper.attr(dataWidgetId);
	    var queryId = String(widgetWrapper.find('.twrp-widget-form__select-query-to-add').val());
	    var queriesInputValue = getQueriesInputValues(widgetWrapper);
	    if (queriesInputValue.indexOf(queryId) === -1) {
	        queriesInputValue.push(queryId);
	        setQueriesInputValues(widgetId, queriesInputValue);
	        if (!queryExistInList(widgetId, queryId)) {
	            appendQueryToList(widgetId, queryId);
	        }
	    }
	}
	/**
	 * Removes the query from Display List and Input List.
	 */
	function handleRemoveQuery() {
	    var widgetId = getClosestWidgetId($(this));
	    var queryId = getClosestQueryId($(this));
	    removeQueryFromList(widgetId, queryId);
	    updateQueriesInput(widgetId);
	}
	// =============================================================================
	// Widgets
	var widgets = $();
	$(updateWidgetsList);
	$(document).on('click', updateWidgetsList);
	/**
	 * Update the file global variable "widgets" to contain all the instance widgets
	 * on the page.
	 */
	function updateWidgetsList() {
	    widgets = $(document).find("[" + dataWidgetId + "]");
	}
	// =============================================================================
	// Widget List Display Functions
	$(updateAllWidgetsListOnLoad);
	$(document).on('click', updateAllWidgetsListOnLoad);
	function updateAllWidgetsListOnLoad() {
	    widgets.each(function () {
	        var widgetId = $(this).attr(dataWidgetId);
	        updateQueriesDisplayListFromInput(widgetId);
	    });
	}
	/**
	 * Update the queries list from the queries input.
	 */
	function updateQueriesDisplayListFromInput(widgetId) {
	    var widget = getWidgetWrapperById(widgetId);
	    var queries = getQueriesInputValues(widget);
	    for (var i_1 = 0; i_1 < queries.length; i_1++) {
	        if (!queryExistInList(widgetId, queries[i_1])) {
	            appendQueryToList(widgetId, queries[i_1]);
	        }
	    }
	    // Todo: remove all widgets that are not in the input.
	    var queriesItems = widget.find("[" + dataQueryId + "]");
	    queriesItems.each(function () {
	        var queryId = $(this).attr(dataQueryId);
	        if (queries.indexOf(queryId) === -1) {
	            $(this).remove();
	        }
	    });
	}
	/**
	 * Updates the queries input, from the queries display list.
	 */
	function updateQueriesInput(widgetId) {
	    var widget = getWidgetWrapperById(widgetId);
	    var queriesItems = widget.find(queriesListSelector).find(queriesItemSelector);
	    var queries = [];
	    queriesItems.each(function () {
	        var queryId = $(this).attr(dataQueryId);
	        if (queryId) {
	            queries.push(queryId);
	        }
	    });
	    setQueriesInputValues(widgetId, queries);
	}
	/**
	 * Appends a query tab to the widget list of queries.
	 */
	function appendQueryToList(widgetId, queryId) {
	    return __awaiter(this, void 0, void 0, function () {
	        var queryHTML, widget, queriesList;
	        return __generator(this, function (_a) {
	            switch (_a.label) {
	                case 0: return [4 /*yield*/, getQueryHTMLForList(widgetId, queryId)];
	                case 1:
	                    queryHTML = _a.sent();
	                    widget = getWidgetWrapperById(widgetId);
	                    if (!queryExistInList(widgetId, queryId)) {
	                        queriesList = widget.find('.twrp-widget-form__selected-queries-list');
	                        queriesList.append(queryHTML);
	                        queriesList.trigger('twrp-query-list-added', [widgetId, queryId]);
	                    }
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
	/**
	 * Remove a Query From the Display List.
	 */
	function removeQueryFromList(widgetId, queryId) {
	    var queryItem = getQueryItemById(widgetId, queryId);
	    queryItem.remove();
	}
	/**
	 * Check if a query settings are displayed in the widget.
	 */
	function queryExistInList(widgetId, queryId) {
	    var queryItem = getQueryItemById(widgetId, queryId);
	    if (queryItem.length) {
	        return true;
	    }
	    return false;
	}
	$(document).on('twrp-query-list-added', handleReorderQueries);
	function handleReorderQueries(event, widgetId) {
	    reorderQueriesDisplayList(widgetId);
	}
	function reorderQueriesDisplayList(widgetId) {
	    var widget = getWidgetWrapperById(widgetId);
	    var queryList = widget.find(queriesListSelector);
	    var queryItems = widget.find("[" + dataQueryId + "]");
	    var queriesIds = getQueriesInputValues(widget);
	    queryItems.detach();
	    for (var i_2 = 0; i_2 < queriesIds.length; i_2++) {
	        for (var j = 0; j < queryItems.length; j++) {
	            if (queriesIds[i_2] === queryItems.eq(j).attr(dataQueryId)) {
	                queryList.append(queryItems.eq(j));
	            }
	        }
	    }
	}
	// =============================================================================
	// Utility functions.
	function getClosestWidgetId(element) {
	    return $(element).closest("[" + dataWidgetId + "]").attr(dataWidgetId);
	}
	function getClosestQueryId(element) {
	    return $(element).closest("[" + dataQueryId + "]").attr(dataQueryId);
	}
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
	function setQueriesInputValues(widgetId, queries) {
	    var widget = getWidgetWrapperById(widgetId);
	    var input = widget.find(queriesInputSelector);
	    var value = queries.join(';');
	    input.val(value);
	}
	// =============================================================================
	// jQuery sorting and collapsing.
	$(document).on('click', initializeAllQueriesSorting);
	function initializeAllQueriesSorting() {
	    widgets.each(function () {
	        initializeWidgetSorting($(this));
	    });
	}
	function initializeWidgetSorting(widget) {
	    var queriesList = widget.find(queriesListSelector);
	    queriesList.sortable({
	        update: handleSortingChange,
	    });
	}
	function handleSortingChange() {
	    var widgetId = getClosestWidgetId(this);
	    updateQueriesInput(widgetId);
	}
	// =============================================================================
	// jQuery collapsing.
	// todo: add a cache for collapsed to be as before when they update.
	$(document).ready(makeAllQueriesCollapsible);
	$(document).on('twrp-query-list-added widget-updated widget-added', handleQueryModifiedMakeCollapsible);
	function handleQueryModifiedMakeCollapsible(event, widgetId, queryId) {
	    if (event.type === 'twrp-query-list-added') {
	        makeQueryCollapsible(widgetId, queryId);
	    }
	    else {
	        makeAllQueriesCollapsible();
	    }
	}
	function makeAllQueriesCollapsible() {
	    updateWidgetsList();
	    widgets.each(function () {
	        var widgetId = $(this).attr(dataWidgetId);
	        var queryItems = $(this).find("[" + dataQueryId + "]");
	        queryItems.each(function () {
	            var queryId = $(this).attr(dataQueryId);
	            makeQueryCollapsible(widgetId, queryId);
	        });
	    });
	}
	function makeQueryCollapsible(widgetId, queryId) {
	    var query = getQueryItemById(widgetId, queryId);
	    var accordionInstance = query.accordion('instance');
	    if (accordionInstance) {
	        query.accordion('refresh');
	    }
	    else {
	        query.accordion({
	            collapsible: true,
	            active: false,
	            heightStyle: 'content',
	        });
	    }
	}
	// =============================================================================
	// Load article blocks settings on the fly.
	$(document).on('change', selectArticleBlockSelector, handleArticleBlockChanged);
	function handleArticleBlockChanged() {
	    return __awaiter(this, void 0, void 0, function () {
	        var widgetId, queryId, artblockId, artblockSettingsHTML;
	        return __generator(this, function (_a) {
	            switch (_a.label) {
	                case 0:
	                    widgetId = getClosestWidgetId($(this));
	                    queryId = getClosestQueryId($(this));
	                    artblockId = String($(this).val());
	                    return [4 /*yield*/, getArticleBlockSettings(widgetId, queryId, artblockId)];
	                case 1:
	                    artblockSettingsHTML = _a.sent();
	                    insertArticleBlock(widgetId, queryId, artblockSettingsHTML);
	                    return [2 /*return*/];
	            }
	        });
	    });
	}
	function getArticleBlockSettings(widgetId, queryId, artblockId) {
	    if (hasArticleBlockInCache(widgetId, queryId, artblockId)) {
	        return getArticleBlockFromCache(widgetId, queryId, artblockId);
	    }
	    return $.ajax({
	        url: ajaxurl,
	        method: 'POST',
	        data: {
	            action: 'twrp_widget_create_artblock_settings',
	            artblock_id: artblockId,
	            widget_id: widgetId,
	            query_id: queryId,
	        },
	    });
	}
	function insertArticleBlock(widgetId, queryId, html) {
	    var queryItem = getQueryItemById(widgetId, queryId);
	    var artblockSettingsWrapper = queryItem.find(artblockSettingsWrapperSelector);
	    var artblockContainer = queryItem.find('.twrp-widget-form__article-block-settings-container');
	    artblockSettingsWrapper.detach();
	    addArticleBlockToCache(widgetId, queryId, artblockSettingsWrapper);
	    artblockContainer.append(html);
	}
	// ==========================
	// Cache Article Blocks
	/**
	 * An array that contains all the article blocks retrieved and detached.
	 * When a user choose to reselect a previously selected and modified article
	 * block, the settings will not be fetched again from the server and the
	 * modifications will remain.
	 */
	var articleBlocksCache = Array();
	/**
	 * Add the article block to the cache array.
	 */
	function addArticleBlockToCache(widgetId, queryId, artblockWrapper) {
	    var artblockId = artblockWrapper.attr(dataArtblockId);
	    if ((!widgetId) || (!queryId) || (!artblockId)) {
	        return;
	    }
	    if (!articleBlocksCache[widgetId]) {
	        articleBlocksCache[widgetId] = [];
	    }
	    if (!articleBlocksCache[widgetId][queryId]) {
	        articleBlocksCache[widgetId][queryId] = [];
	    }
	    articleBlocksCache[widgetId][queryId][artblockId] = artblockWrapper;
	}
	/**
	 * Get an article block from cache. Or false if the article block is not in cache.
	 */
	function getArticleBlockFromCache(widgetId, queryId, $artblockId) {
	    if (hasArticleBlockInCache(widgetId, queryId, $artblockId)) {
	        return articleBlocksCache[widgetId][queryId][$artblockId];
	    }
	    return false;
	}
	/**
	 * Whether or not an article block was already fetched and put in cache.
	 */
	function hasArticleBlockInCache(widgetId, queryId, $artblockId) {
	    if (!articleBlocksCache[widgetId]) {
	        return false;
	    }
	    if (!articleBlocksCache[widgetId][queryId]) {
	        return false;
	    }
	    if (!articleBlocksCache[widgetId][queryId][$artblockId]) {
	        return false;
	    }
	    var storedArtblockId = articleBlocksCache[widgetId][queryId][$artblockId].attr(dataArtblockId);
	    if (!(storedArtblockId === $artblockId)) {
	        return false;
	    }
	    return true;
	}

	var script = {};

	return script;

}(jQuery));
