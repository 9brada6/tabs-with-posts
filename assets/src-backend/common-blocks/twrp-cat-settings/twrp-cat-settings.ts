import $ from 'jquery';
import 'jqueryui';
import { showUp, hideUp, showLeft, hideLeft } from '../../framework-blocks/twrp-hidden/twrp-hidden';

// #region -- Defining some global variables.

const categorySelector = $( '#twrp-cat-settings__js-cat-dropdown' );

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

// #endregion -- Defining some global variables.

// #region -- Add a categories on the lists.

$( document ).on( 'click', '#twrp-cat-settings__add-cat-btn', handleAddCategoryButton );

/**
 * Handle the addition of a new category via the button click.
 */
function handleAddCategoryButton(): void {
	const categoryId: any = categorySelector.find( ':selected' ).val();
	const name = sanitizeCategoryName( categorySelector.find( ':selected' ).text() );

	if ( categoryId > 0 ) {
		addCatToInput( categoryId );
		addCatToVisual( categoryId, name );
	}
}

/**
 * Add a category to the hidden input.
 */
function addCatToInput( categoryId: string|number ): void {
	const oldValue = categoriesInput.val();

	let newValue: string|number;
	if ( oldValue && categoryId ) {
		newValue = oldValue + ';' + categoryId;
	} else {
		newValue = categoryId;
	}

	if ( ! categoryIdInsertedInInput( categoryId ) ) {
		categoriesInput.val( newValue );
	}
}

/**
 * Adds a category to visual list.
 */
function addCatToVisual( categoryId: string|number, name: string ): void {
	if ( ! categoryItemIsDisplayed( categoryId ) ) {
		const toAppend = categoryItem.clone();
		const removeButtonAriaLabel = getRemoveButtonAriaLabel().replace( '%s', sanitizeCategoryName( name ) );

		toAppend.find( '.twrp-cat-settings__cat-item-name' ).text( sanitizeCategoryName( name ) );
		toAppend.find( '.twrp-display-list__item-remove-btn' ).attr( 'aria-label', removeButtonAriaLabel );
		toAppend.attr( categoryIdAttrName, categoryId );

		categoriesItemsWrapper.append( toAppend );
		hideOrShowEmptyMessage();
		showLeft( toAppend, 'hide_first' );
	}
}

// #endregion -- add a categories on the lists.

// #region -- Removing categories.

$( document ).on( 'click', '.twrp-cat-settings__cat-remove-btn', handleRemoveCategory );

/**
 * Removes a selected category when a button is clicked.
 */
function handleRemoveCategory( this:JQuery ): void {
	const categoryId = String( $( this ).closest( '[' + categoryIdAttrName + ']' ).attr( categoryIdAttrName ) );
	removeCategoryFromDisplay( categoryId );
	removeCategoryFromInput( categoryId );
}

/**
 * Removes a category from the display list with the categories.
 */
function removeCategoryFromDisplay( categoryId: string|number ): void {
	const toRemove = categoriesItemsWrapper.find( '[' + categoryIdAttrName + '="' + categoryId + '"]' );
	toRemove.removeAttr( categoryIdAttrName );
	hideOrShowEmptyMessage();
	hideLeft( toRemove, 'remove' );
}

/**
 * Removes a category from the hidden input.
 */
function removeCategoryFromInput( categoryId: string|number ): void {
	const categoryIds = String( categoriesInput.val() ).split( ';' );
	const toRemoveCategoryIndex = categoryIds.indexOf( String( categoryId ) );

	if ( toRemoveCategoryIndex !== -1 ) {
		categoryIds.splice( toRemoveCategoryIndex, 1 );
		categoriesInput.val( categoryIds.join( ';' ) );
	}
}

// #endregion -- Removing categories.

// #region -- Show or Hide empty message.

function hideOrShowEmptyMessage(): void {
	_showEmptyMessageIfNecessary();
	_hideEmptyMessageIfNecessary();
}

/**
 * Show the empty list message, that should be displayed when no items exists.
 */
function _showEmptyMessageIfNecessary(): void {
	const listHaveItems = ( categoriesItemsWrapper.find( '[' + categoryIdAttrName + ']' ).length > 0 );

	if ( ! listHaveItems ) {
		showLeft( categoriesEmptyMessage );
	}
}

/**
 * Hide the empty list message, that should not be displayed when at least an
 * item exists.
 */
function _hideEmptyMessageIfNecessary(): void {
	const listHaveItems = ( categoriesItemsWrapper.find( '[' + categoryIdAttrName + ']' ).length > 0 );

	if ( listHaveItems ) {
		hideLeft( categoriesEmptyMessage );
	}
}

// #endregion -- Show or Hide empty message.

// #region -- Verify if a category is selected.

/**
 * Check to see if a category item is displayed in the Visual List of categories.
 */
function categoryItemIsDisplayed( categoryId: string|number ): boolean {
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

/**
 * Check to see if the category Id is found in the hidden input.
 */
function categoryIdInsertedInInput( categoryId: string|number ): boolean {
	const value: any = categoriesInput.val();
	if ( ! value ) {
		return false;
	}
	const categoryIds = value.split( ';' );

	if ( categoryIds.indexOf( categoryId ) !== -1 ) {
		return true;
	}

	return false;
}

// #endregion -- Verify if a category is selected.

// #region -- Make The Categories Sortable.

$( makeItemsSortable );

function makeItemsSortable(): void {
	categoriesItemsWrapper.sortable( {
		placeholder: 'twrp-display-list__placeholder',
		stop: refreshInputtedCategories,
	} );
}

// #endregion -- Make The Categories Sortable.

// #region -- Show/Hide Select For Category Relation.

const categoryTypeSelect = $( '#twrp-cat-settings__type' );
const categoryRelationWrapper = $( '#twrp-cat-settings__js-select-relation-wrap' );
const mainCategorySettings = $( '#twrp-cat-settings__js-settings-wrapper' );

// todo: uncomment document.ready.
// $( hideOrShowCategorySettings );
$( document ).on( 'change', '#twrp-cat-settings__type', hideOrShowCategorySettings );

function hideOrShowCategorySettings(): void {
	const selectVal = categoryTypeSelect.val();

	if ( 'NA' === selectVal ) {
		hideUp( mainCategorySettings );
		hideUp( categoryRelationWrapper );
	} else if ( 'IN' === selectVal ) {
		if ( categoryRelationWrapper.is( ':hidden' ) ) {
			categoryRelationWrapper.show();
			showUp( mainCategorySettings );
			categoryRelationWrapper.hide();
		} else {
			showUp( mainCategorySettings );
		}
		showUp( categoryRelationWrapper );
	} else {
		showUp( mainCategorySettings );
		hideUp( categoryRelationWrapper );
	}
}

// #endregion -- Show/Hide Select For Category Relation.

// #region -- Helpers

/**
 * Get the aria label for the remove button. In the aria label will be present
 * "%s", which will need to be replaced with an author.
 */
function getRemoveButtonAriaLabel(): string {
	const ariaLabel = categoriesItemsWrapper.attr( 'data-twrp-aria-remove-label' );
	if ( ! ariaLabel ) {
		return '';
	}

	return ariaLabel;
}

/**
 * Take out the number of counts and trim the name.
 */
function sanitizeCategoryName( name: string ): string {
	const removeCountParenthesisRegex = /\([^(]*\)$/;
	name = name.replace( removeCountParenthesisRegex, '' );
	name = name.trim();

	return name;
}

// #endregion -- Helpers

// #region -- Refresh Display/Hidden input categories.

/**
 * Refresh the hidden input categories, with Ids taken from the visual list.
 */
function refreshInputtedCategories(): void {
	const categoriesItems = categoriesItemsWrapper.find( '.twrp-cat-settings__cat-list-item' );

	let categoriesIds = '';
	categoriesItems.each( function() {
		const catId = String( $( this ).attr( categoryIdAttrName ) );
		if ( ! categoriesIds ) {
			categoriesIds = catId;
		} else {
			categoriesIds += ';' + catId;
		}
	} );

	categoriesInput.val( categoriesIds );
}

// #endregion -- Refresh Display/Hidden input categories.
