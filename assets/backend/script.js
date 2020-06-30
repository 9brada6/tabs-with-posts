var TWRP_Plugin = (function ($) {
	'use strict';

	$ = $ && Object.prototype.hasOwnProperty.call($, 'default') ? $['default'] : $;

	$(document).ready(enableCollapsibleSettings);
	function enableCollapsibleSettings() {
	    $('.twrp-collapsible').each(function () {
	        var element = $(this);
	        var activeTabIndex = (element.attr('data-twrp-is-collapsed') === '1') ? 0 : false;
	        element.accordion({
	            active: activeTabIndex,
	            heightStyle: 'content',
	            collapsible: true,
	            icons: false,
	        });
	    });
	}

	$(document).ready(enableCodeMirror);
	function enableCodeMirror() {
	    var element = document.getElementById('twrp-advanced-args__codemirror-textarea');
	    if (element) {
	        CodeMirror.fromTextArea(element, {
	            mode: 'application/json',
	            theme: 'material-darker',
	            indentUnit: 4,
	            indentWithTabs: true,
	            lineNumbers: true,
	            autoRefresh: true,
	        });
	    }
	}

	// Todo...
	var effectDuration = 500;
	// =============================================================================
	function hideUp(element) {
	    $(element).hide({
	        effect: 'blind',
	        duration: effectDuration,
	        complete: addHideClass,
	    });
	}
	function showUp(element) {
	    $(element).show({
	        effect: 'blind',
	        duration: effectDuration,
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

	// todo: Make everything under twrp-display-list block.
	// #region -- Defining some global variables.
	var effectDuration$1 = 300;
	var categorySelector = $('#twrp-cat-settings__js-cat-dropdown');
	var categoriesInput = $('#twrp-cat-settings__cat-ids');
	var categoryIdAttrName = 'data-cat-id';
	var categoriesItemsWrapper = $('#twrp-cat-settings__cat-list-wrap');
	var categoriesEmptyMessage = categoriesItemsWrapper.find('.twrp-display-list__empty-msg');
	var categoryItem = $('<div class="twrp-display-list__item twrp-cat-settings__cat-list-item">' +
	    '<div class="twrp-display-list__item-name twrp-cat-settings__cat-item-name">' +
	    '</div>' +
	    '<button class="twrp-display-list__item-remove-btn twrp-cat-settings__cat-remove-btn" type="button"><span class="dashicons dashicons-no"></span></button>' +
	    '</div>');
	// #endregion -- Defining some global variables.
	// #region -- add a categories on the lists.
	$(document).on('click', '#twrp-cat-settings__add-cat-btn', handleAddCategoryButton);
	/**
	 * Handle the addition of a new category via the button click.
	 */
	function handleAddCategoryButton() {
	    var categoryId = categorySelector.find(':selected').val();
	    var name = sanitizeCategoryName(categorySelector.find(':selected').text());
	    if (categoryId > 0) {
	        addCatToInput(categoryId);
	        addCatToVisual(categoryId, name);
	    }
	}
	/**
	 * Add a category to the hidden input.
	 */
	function addCatToInput(categoryId) {
	    var oldValue = categoriesInput.val();
	    var newValue;
	    if (oldValue && categoryId) {
	        newValue = oldValue + ';' + categoryId;
	    }
	    else {
	        newValue = categoryId;
	    }
	    if (!categoryIdInsertedInInput(categoryId)) {
	        categoriesInput.val(newValue);
	    }
	}
	/**
	 * Adds a category to visual list.
	 */
	function addCatToVisual(categoryId, name) {
	    if (!categoryItemIsDisplayed(categoryId)) {
	        var toAppend = categoryItem.clone();
	        // Show a nice effect on removing.
	        categoriesEmptyMessage.hide({
	            effect: 'blind',
	            duration: effectDuration$1,
	            direction: 'left',
	            complete: removeEmptyMessage,
	        });
	        toAppend.find('.twrp-cat-settings__cat-item-name').text(sanitizeCategoryName(name));
	        toAppend.attr(categoryIdAttrName, categoryId);
	        categoriesItemsWrapper.append(toAppend);
	        // After appending, show a nice effect.
	        toAppend.hide();
	        toAppend.show({
	            effect: 'blind',
	            duration: effectDuration$1,
	            direction: 'left',
	        });
	    }
	    function removeEmptyMessage() {
	        categoriesEmptyMessage.remove();
	    }
	}
	// #endregion -- add a categories on the lists.
	// #region -- Removing categories.
	$(document).on('click', '.twrp-cat-settings__cat-remove-btn', handleRemoveCategory);
	/**
	 * Removes a selected category when a button is clicked.
	 */
	function handleRemoveCategory() {
	    var categoryId = $(this).closest('[' + categoryIdAttrName + ']').attr(categoryIdAttrName);
	    removeCategoryFromDisplay(categoryId);
	    removeCategoryFromInput(categoryId);
	}
	/**
	 * Removes a category from the display list with the categories.
	 */
	function removeCategoryFromDisplay(categoryId) {
	    var toRemove = categoriesItemsWrapper.find('[' + categoryIdAttrName + '="' + categoryId + '"]');
	    toRemove.effect({
	        effect: 'blind',
	        duration: effectDuration$1,
	        direction: 'left',
	        complete: removeElement,
	    });
	    function removeElement() {
	        toRemove.remove();
	        if (0 === categoriesItemsWrapper.children().length) {
	            categoriesItemsWrapper.append(categoriesEmptyMessage);
	            categoriesEmptyMessage.show({
	                effect: 'blind',
	                duration: effectDuration$1,
	                direction: 'left',
	            });
	        }
	    }
	}
	/**
	 * Removes a category from the hidden input.
	 */
	function removeCategoryFromInput(categoryId) {
	    var categoryIds = String(categoriesInput.val()).split(';');
	    var toRemoveCategoryIndex = categoryIds.indexOf(String(categoryId));
	    if (toRemoveCategoryIndex !== -1) {
	        categoryIds.splice(toRemoveCategoryIndex, 1);
	        categoriesInput.val(categoryIds.join(';'));
	    }
	}
	// #endregion -- Removing categories.
	// #region -- Verify if a category exist.
	/**
	 * Check to see if a category item is displayed in the Visual List of categories.
	 */
	function categoryItemIsDisplayed(categoryId) {
	    var items = categoriesItemsWrapper.find('.twrp-cat-settings__cat-list-item');
	    var sameIdFound = false;
	    items.each(function () {
	        if (categoryId === $(this).attr(categoryIdAttrName)) {
	            sameIdFound = true;
	        }
	    });
	    if (sameIdFound) {
	        return true;
	    }
	    return false;
	}
	/**
	 * Check to see if the category Id is found in the hidden input.
	 */
	function categoryIdInsertedInInput(categoryId) {
	    var value = categoriesInput.val();
	    if (!value) {
	        return false;
	    }
	    var categoryIds = value.split(';');
	    if (categoryIds.indexOf(categoryId) !== -1) {
	        return true;
	    }
	    return false;
	}
	// #endregion -- Removing categories.
	// #region -- Sanitization.
	/**
	 * Take out the number of counts and trim the name.
	 */
	function sanitizeCategoryName(name) {
	    var removeCountParenthesisRegex = /\([^(]*\)$/;
	    name = name.replace(removeCountParenthesisRegex, '');
	    name = name.trim();
	    return name;
	}
	// #endregion -- Sanitization.
	// #region -- Make The Categories Sortable.
	$(makeItemsSortable);
	function makeItemsSortable() {
	    categoriesItemsWrapper.sortable({
	        placeholder: 'twrp-display-list__placeholder',
	        stop: refreshInputtedCategories,
	    });
	}
	// #endregion -- Make The Categories Sortable.
	// #region -- Show/Hide Select For Category Relation.
	var categoryTypeSelect = $('#twrp-cat-settings__type');
	var categoryRelationWrapper = $('#twrp-cat-settings__js-select-relation-wrap');
	var mainCategorySettings = $('#twrp-cat-settings__js-settings-wrapper');
	// todo: uncomment document.ready.
	// $( document ).ready( hideOrShowCategorySettings );
	$(document).on('change', '#twrp-cat-settings__type', hideOrShowCategorySettings);
	function hideOrShowCategorySettings() {
	    var selectVal = categoryTypeSelect.val();
	    if ('NA' === selectVal) {
	        hideUp(mainCategorySettings);
	        hideUp(categoryRelationWrapper);
	    }
	    else if ('IN' === selectVal) {
	        if (categoryRelationWrapper.is(':hidden')) {
	            categoryRelationWrapper.show();
	            showUp(mainCategorySettings);
	            categoryRelationWrapper.hide();
	        }
	        else {
	            showUp(mainCategorySettings);
	        }
	        showUp(categoryRelationWrapper);
	    }
	    else {
	        showUp(mainCategorySettings);
	        hideUp(categoryRelationWrapper);
	    }
	}
	// #endregion -- Show/Hide Select For Category Relation.
	// #region -- Helpers
	/**
	 * For a given category Id, return the category name.
	 */
	function getCategoryName(categoryId) {
	    var name = categorySelector.find('[value="' + categoryId + '"]').text();
	    return sanitizeCategoryName(name);
	}
	// #endregion -- Helpers
	// #region -- Refresh Display/Hidden input categories.
	$(refreshDisplayCategories);
	/**
	 * Refresh the visual list categories, with Ids taken from the hidden input.
	 */
	function refreshDisplayCategories() {
	    var categoriesVal = String(categoriesInput.val());
	    if (!categoriesVal) {
	        return;
	    }
	    var categoryIds = categoriesVal.split(';');
	    for (var i_1 = 0; i_1 < categoryIds.length; i_1++) {
	        var categoryName = getCategoryName(categoryIds[i_1]);
	        if (categoryName) {
	            addCatToVisual(categoryIds[i_1], getCategoryName(categoryIds[i_1]));
	        }
	        else {
	            categoryIds.splice(i_1, 1);
	            i_1--;
	        }
	    }
	    categoriesInput.val(categoryIds.join(';'));
	}
	/**
	 * Refresh the hidden input categories, with Ids taken from the visual list.
	 */
	function refreshInputtedCategories() {
	    var categoriesItems = categoriesItemsWrapper.find('.twrp-cat-settings__cat-list-item');
	    var categoriesIds = '';
	    categoriesItems.each(function () {
	        var catId = $(this).attr(categoryIdAttrName);
	        if (!categoriesIds) {
	            categoriesIds = catId;
	        }
	        else {
	            categoriesIds += ';' + catId;
	        }
	    });
	    categoriesInput.val(categoriesIds);
	}
	// #endregion -- Refresh Display/Hidden input categories.

	// =============================================================================
	// Hide/Show Author List and Add Button based on option selected.
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
	        showUp(authorSearchWrap);
	        showUp(authorToHideList);
	    }
	    else {
	        hideUp(authorSearchWrap);
	        hideUp(authorToHideList);
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
	            var name_1 = void 0, id = void 0;
	            try {
	                name_1 = allUsers.models[i_1].attributes.name;
	                id = allUsers.models[i_1].attributes.id;
	            }
	            catch (error) {
	                continue;
	            }
	            usersFound.push({
	                value: name_1,
	                label: name_1,
	                id: id,
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
	/**
	 * Removes an author from the hidden input list.
	 */
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
	/**
	 * Make the visual items sortable, and update the hidden input accordingly.
	 */
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
	 * Check to see if a given author item exist in the hidden list.
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
	/**
	 * Updates the Ids in the input in the same order as the ones
	 * from the visual list.
	 */
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

	var selectCommentsComparator = $('#twrp-comments-settings__js-comparator');
	var numCommentsInput = $('#twrp-comments-settings__js-num_comments');
	$(document).ready(hideOrShowCommentsNumberInput);
	$(document).on('change', '#twrp-comments-settings__js-comparator', hideOrShowCommentsNumberInput);
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

	var applySettingSelect = $('#twrp-statuses-settings__js-apply-select');
	var postStatuses = $('#twrp-statuses-settings__js-statuses-wrapper');
	$(document).on('change', '#twrp-statuses-settings__js-apply-select', hideOrShowPostStatuses);
	$(document).ready(hideOrShowPostStatuses);
	function hideOrShowPostStatuses() {
	    if (applySettingSelect.val() === 'not_applied') {
	        hideUp(postStatuses);
	    }
	    else {
	        showUp(postStatuses);
	    }
	}

	// =============================================================================
	var after = $('#twrp-date-settings__after');
	var before = $('#twrp-date-settings__before');
	$(document).ready(enableDatePickerIfNecessary);
	function enableDatePickerIfNecessary() {
	    if (inputDateTypeIsAvailable()) {
	        return;
	    }
	    var options = {
	        dateFormat: 'yy-mm-dd',
	        changeMonth: true,
	        changeYear: true,
	    };
	    after.datepicker(options);
	    before.datepicker(options);
	}
	function inputDateTypeIsAvailable() {
	    var input = document.createElement('input');
	    var notADateValue = 'not-a-date';
	    input.setAttribute('type', 'date');
	    input.setAttribute('value', notADateValue);
	    return (input.value !== notADateValue);
	}
	// =============================================================================
	var selectDateType = $('#twrp-date-settings__js-date-type');
	var lastPeriodWrapper = $('#twrp-date-settings__js-last-period-wrapper');
	var betweenPeriodWrapper = $('#twrp-date-settings__js-between-wrapper');
	$(document).ready(hideOrShowLastPeriodSettings);
	$(document).on('change', '#twrp-date-settings__js-date-type', hideOrShowLastPeriodSettings);
	$(document).ready(hideOrShowBetweenTimeSettings);
	$(document).on('change', '#twrp-date-settings__js-date-type', hideOrShowBetweenTimeSettings);
	function hideOrShowLastPeriodSettings() {
	    var selectedType = selectDateType.val();
	    if ('LT' === selectedType) {
	        showUp(lastPeriodWrapper);
	    }
	    else {
	        hideUp(lastPeriodWrapper);
	    }
	}
	function hideOrShowBetweenTimeSettings() {
	    var selectedType = selectDateType.val();
	    if ('FT' === selectedType) {
	        showUp(betweenPeriodWrapper);
	    }
	    else {
	        hideUp(betweenPeriodWrapper);
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

	// =============================================================================
	// Show/Hide Posts List.
	var postTypeSelect = $('#twrp-posts-settings__js-filter-type');
	var postVisualList = $('#twrp-posts-settings__js-posts-list');
	var searchingWrapper = $('#twrp-posts-settings__js-posts-search-wrap');
	$(document).ready(hideOrShowVisualList$1);
	$(document).on('change', '#twrp-posts-settings__js-filter-type', hideOrShowVisualList$1);
	/**
	 * Hide or show the visual list and the form input to search for users.
	 */
	function hideOrShowVisualList$1() {
	    var authorTypeVal = postTypeSelect.val();
	    if ('NA' === authorTypeVal) {
	        searchingWrapper.hide('blind');
	        postVisualList.hide('blind');
	    }
	    else {
	        searchingWrapper.show('blind');
	        postVisualList.show('blind');
	    }
	}
	// =============================================================================
	// Manage Posts Search
	/**
	 * The search input where administrators will search for posts.
	 */
	var postsSearchInput = $('#twrp-posts-settings__js-posts-search');
	$(document).ready(initializeAutoComplete$1);
	/**
	 * Initialize the search input, when a user enter some characters, it will
	 * automatically search and display the options.
	 */
	function initializeAutoComplete$1() {
	    postsSearchInput.autocomplete({
	        source: showSearchedPosts,
	        minLength: 2,
	    });
	}
	/**
	 * Search for the posts and append the results into the autocomplete selector.
	 */
	function showSearchedPosts(request, sendToControl) {
	    return __awaiter(this, void 0, void 0, function () {
	        var wpApiURL, fetchUrl, fetchedResult, posts, postsToSend, i_1;
	        return __generator(this, function (_a) {
	            switch (_a.label) {
	                case 0:
	                    wpApiURL = wpApiSettings.root + wpApiSettings.versionString;
	                    fetchUrl = wpApiURL + ("search?_fields=id,title&search=" + request.term + "&page=1&per_page=10");
	                    return [4 /*yield*/, fetch(fetchUrl)];
	                case 1:
	                    fetchedResult = _a.sent();
	                    return [4 /*yield*/, fetchedResult.json()];
	                case 2:
	                    posts = _a.sent();
	                    if (!(posts instanceof Array)) {
	                        console.error('TWRP error when fetching posts.'); // eslint-disable-line
	                    }
	                    postsToSend = [];
	                    for (i_1 = 0; i_1 < posts.length; i_1++) {
	                        postsToSend.push({
	                            value: posts[i_1].title,
	                            label: posts[i_1].title,
	                            id: posts[i_1].id,
	                        });
	                    }
	                    sendToControl(postsToSend);
	                    return [2 /*return*/];
	            }
	        });
	    });
	}
	// =============================================================================
	// Add Post.
	var postsIdsInput = $('#twrp-posts-settings__js-posts-ids');
	/**
	 * The post attribute name that hold the Id of a visual item.
	 */
	var postIdAttrName = 'data-post-id';
	/**
	 * The template for a post item, to be appended to the visual list. Note that
	 * we have a similar template in the PHP file, so a change here will require
	 * also a change there, and vice-versa.
	 */
	var postVisualItem = $('<div class="twrp-display-list__item twrp-posts-settings__post-item">' +
	    '<div class="twrp-posts-settings__post-item-title"></div>' +
	    '<button class="twrp-display-list__item-remove-btn twrp-posts-settings__js-post-remove-btn" type="button">' +
	    '<span class="dashicons dashicons-no"></span>' +
	    '</button>' +
	    '</div>');
	$(document).on('click', '#twrp-posts-settings__js-posts-add-btn', handleAddPostClick);
	$(document).on('keypress', '#twrp-posts-settings__js-posts-search', handleSearchInputKeypress$1);
	/**
	 * When a user click "enter", add the current selected author to the list.
	 */
	function handleSearchInputKeypress$1(event) {
	    var keycode = (event.keyCode ? event.keyCode : event.which);
	    if (keycode !== 13) {
	        return;
	    }
	    event.preventDefault();
	    var autocompleteInstance = postsSearchInput.autocomplete('instance');
	    var id, name;
	    try {
	        var selectedItem = autocompleteInstance.selectedItem;
	        id = selectedItem.id;
	        name = selectedItem.label;
	    }
	    catch (error) {
	        return;
	    }
	    addPost(id, name);
	}
	/**
	 * Handles the click on "Add post" button.
	 */
	function handleAddPostClick() {
	    var autocompleteInstance = postsSearchInput.autocomplete('instance');
	    var id, name;
	    try {
	        var selectedItem = autocompleteInstance.selectedItem;
	        id = selectedItem.id;
	        name = selectedItem.label;
	    }
	    catch (error) {
	        return;
	    }
	    addPost(id, name);
	}
	/**
	 * Add a post to the list of selected posts(both visual, and in the hidden
	 * input).
	 */
	function addPost(id, name) {
	    _addPostToVisualList(id, name);
	    _addPostToHiddenInput(id);
	    removeOrAddNoPostsText();
	}
	/**
	 * Add a post to the visual list.
	 */
	function _addPostToVisualList(id, name) {
	    if (postExistInVisualList(id)) {
	        return;
	    }
	    var newAuthorItem = postVisualItem.clone();
	    newAuthorItem.find('.twrp-posts-settings__post-item-title').append(sanitizePostName(name));
	    newAuthorItem.attr(postIdAttrName, id);
	    postVisualList.append(newAuthorItem);
	}
	/**
	 * Add a post to the list of hidden input.
	 */
	function _addPostToHiddenInput(id) {
	    if (postExistInHiddenInput(id)) {
	        return;
	    }
	    id = String(id);
	    var previousVal = postsIdsInput.val();
	    var newVal = '';
	    if (previousVal) {
	        newVal = previousVal + ';' + id;
	    }
	    else {
	        newVal = id;
	    }
	    postsIdsInput.val(newVal);
	}
	// =============================================================================
	// Remove an author
	$(document).on('click', '.twrp-posts-settings__js-post-remove-btn', handleRemovePost);
	/**
	 * Handle the removing of the posts from the selected list.
	 */
	function handleRemovePost() {
	    var id = $(this).closest('[' + postIdAttrName + ']').attr(postIdAttrName);
	    id = Number(id);
	    if (!(id > 0)) {
	        return;
	    }
	    removePost(id);
	}
	/**
	 * Removes a post to the list of selected posts(both visual, and in the
	 * hidden input).
	 */
	function removePost(id) {
	    _removePostFromVisualList(id);
	    _removePostFromHiddenInput(id);
	    removeOrAddNoPostsText();
	}
	/**
	 * Removes a post from the visual list, based on id.
	 */
	function _removePostFromVisualList(id) {
	    var itemsToRemove = postVisualList.find('[' + postIdAttrName + '="' + id + '"]');
	    itemsToRemove.remove();
	}
	/**
	 * Removes a post from the hidden input list.
	 */
	function _removePostFromHiddenInput(id) {
	    var currentValue = String(postsIdsInput.val());
	    id = String(id);
	    var postsIds = currentValue.split(';');
	    var indexOfId = postsIds.indexOf(id);
	    if (indexOfId !== -1) {
	        postsIds.splice(indexOfId, 1);
	        postsIdsInput.val(postsIds.join(';'));
	    }
	}
	// =============================================================================
	// Manage the "No Authors Added" Text.
	/**
	 * Contains the HTML Element that will be inserted/removed as necessary.
	 */
	var noPostsText = $('#twrp-posts-settings__js-no-posts-selected');
	$(document).ready(removeOrAddNoPostsText);
	/**
	 * Remove or add "No posts selected" text if necessary.
	 */
	function removeOrAddNoPostsText() {
	    _removeNoPostsTextIfNecessary();
	    _addNoPostsTextIfNecessary();
	}
	/**
	 * If Necessary, removes the "No Posts selected" text.
	 */
	function _removeNoPostsTextIfNecessary() {
	    var textIsAppended = (postVisualList.find(noPostsText).length > 0);
	    var haveItems = (postVisualList.find("[" + postIdAttrName + "]").length > 0);
	    if (haveItems && textIsAppended) {
	        noPostsText.detach();
	    }
	}
	/**
	 * If Necessary, adds the "No Posts selected" text.
	 */
	function _addNoPostsTextIfNecessary() {
	    var textIsAppended = (postVisualList.find(noPostsText).length > 0);
	    var haveItems = (postVisualList.find("[" + postIdAttrName + "]").length > 0);
	    if ((!textIsAppended) && (!haveItems)) {
	        postVisualList.append(noPostsText);
	    }
	}
	// =============================================================================
	// Sorting function.
	$(document).ready(initializeSorting$1);
	/**
	 * Make the visual items sortable, and update the hidden input accordingly.
	 */
	function initializeSorting$1() {
	    postVisualList.sortable({
	        placeholder: 'twrp-display-list__placeholder',
	        stop: updatePostsIdsFromVisualList,
	    });
	}
	// =============================================================================
	// Helper Functions
	/**
	 * Check to see if a given post item is displayed in visual list.
	 */
	function postExistInVisualList(id) {
	    var postItem = postVisualList.find('[' + postIdAttrName + '="' + id + '"]');
	    if (postItem.length) {
	        return true;
	    }
	    return false;
	}
	/**
	 * Check to see if a given post item exist in the hidden list.
	 */
	function postExistInHiddenInput(id) {
	    var inputVal = String(postsIdsInput.val());
	    id = Number(id);
	    if ((!inputVal) || !(id > 0)) {
	        return false;
	    }
	    var postsIds = inputVal.split(';').map(mapToInt);
	    if (postsIds.indexOf(id) !== -1) {
	        return true;
	    }
	    return false;
	    function mapToInt(val) {
	        return parseInt(val);
	    }
	}
	/**
	 * Updates the Ids in the input in the same order as the ones
	 * from the visual list.
	 */
	function updatePostsIdsFromVisualList() {
	    var postItems = postVisualList.find('.twrp-posts-settings__post-item');
	    var authorsIds = [];
	    postItems.each(function () {
	        var itemId = $(this).attr(postIdAttrName);
	        itemId = +itemId;
	        if (itemId > 0) {
	            authorsIds.push(itemId);
	        }
	    });
	    postsIdsInput.val(authorsIds.join(';'));
	}
	/**
	 * todo
	 */
	function sanitizePostName(name) {
	    return name;
	}

	var firstOrderGroup = $('#twrp-order-setting__js-first-order-group');
	var secondOrderGroup = $('#twrp-order-setting__js-second-order-group');
	var thirdOrderGroup = $('#twrp-order-setting__js-third-order-group');
	var orderByClassName = 'twrp-order-setting__js-orderby';
	var orderGroups = [firstOrderGroup, secondOrderGroup, thirdOrderGroup];
	//todo: delete
	$(hideOrShowUnnecessarySelectors);
	$(document).on('change', "." + orderByClassName, hideOrShowUnnecessarySelectors);
	/**
	 * Hide or show the next selectors for the order by and order type, making the
	 * user experience better.
	 */
	function hideOrShowUnnecessarySelectors() {
	    var hideNext = false;
	    for (var i_1 = 0; i_1 < orderGroups.length; i_1++) {
	        if (hideNext) {
	            hideUp(orderGroups[i_1]);
	        }
	        else {
	            showUp(orderGroups[i_1]);
	        }
	        if (orderGroups[i_1].find("." + orderByClassName).val() === 'not_applied') {
	            hideNext = true;
	            hideUp(orderGroups[i_1].find('.twrp-order-setting__js-order-type'));
	        }
	        else {
	            showUp(orderGroups[i_1].find('.twrp-order-setting__js-order-type'));
	        }
	    }
	}
	$(document).on('change', "." + orderByClassName, hideOrShowSelectedValues);
	function hideOrShowSelectedValues() {
	    for (var i_2 = 0; i_2 < orderGroups.length; i_2++) {
	        orderGroups[i_2].find('option').removeAttr('disabled');
	    }
	    for (var i_3 = 0; i_3 < orderGroups.length; i_3++) {
	        var selectedVal = orderGroups[i_3].find("." + orderByClassName).val();
	        if (selectedVal !== 'not_applied') {
	            for (var j = i_3 + 1; j < orderGroups.length; j++) {
	                var orderBySelect = orderGroups[j].find("." + orderByClassName);
	                var nextSelectedVal = orderBySelect.val();
	                orderBySelect.find("[value=\"" + selectedVal + "\"]").attr('disabled', 'disabled');
	                if (nextSelectedVal === selectedVal) {
	                    orderBySelect.val('not_applied');
	                    orderBySelect.trigger('change');
	                }
	            }
	        }
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
//# sourceMappingURL=script.js.map
