import $ from 'jquery';
import 'jqueryui';
import { showUp, hideUp, hideLeft, showLeft } from '../../framework-blocks/twrp-hidden/twrp-hidden';

declare const wp: any;

// #region -- Hide/Show Author List and Add Button based on option selected.

const authorTypeSelector = $( '#twrp-author-settings__select_type' );

const authorSearchWrap = $( '#twrp-author-settings__author-search-wrap' );
const authorToHideList = $( '#twrp-author-settings__js-authors-list' );

// $( document ).ready( hideOrShowVisualList );
$( document ).on( 'change', '#twrp-author-settings__select_type', hideOrShowVisualList );

/**
 * Hide or show the visual list and the form input to search for users.
 */
function hideOrShowVisualList() {
	const authorTypeVal = authorTypeSelector.val();

	if ( 'IN' === authorTypeVal || 'OUT' === authorTypeVal ) {
		showUp( authorSearchWrap );
		showUp( authorToHideList );
	} else {
		hideUp( authorSearchWrap );
		hideUp( authorToHideList );
	}
}

// #endregion -- Hide/Show Author List and Add Button based on option selected.

// #region -- Hide/Show Same author notice.

const sameAuthorNotice = $( '#twrp-author-settings__js-same-author-notice' );

$( document ).ready( handleSameAuthorNotice );
$( document ).on( 'change', '#twrp-author-settings__select_type', handleSameAuthorNotice );

/**
 * Hide or show a notice that says that when the author is set to the same as
 * the post, the query will not be displayed on non-singular pages.
 */
function handleSameAuthorNotice() {
	const authorTypeVal = authorTypeSelector.val();

	if ( 'SAME' === authorTypeVal ) {
		sameAuthorNotice.show( 'blind' );
	} else {
		sameAuthorNotice.hide( 'blind' );
	}
}

// #endregion -- Hide/Show Same author notice.

// #region -- Manage Author Search

$( initializeAutoComplete );

/**
 * The search input where administrators will search for users.
 */
const authorSearchInput = $( '#twrp-author-settings__js-author-search' );

/**
 * Initialize the search input, when a user enter some characters, it will
 * automatically search and display the options.
 */
function initializeAutoComplete() {
	authorSearchInput.autocomplete( {
		source: showSearchedUsers,
		minLength: 2,
	} );
}

/**
 * Search for the users and append the results into the autocomplete selector.
 */
function showSearchedUsers( request: any, sendToControl: CallableFunction ): void {
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
			let name, id;
			try {
				name = decodeHtml( allUsers.models[ i ].attributes.name );
				id = allUsers.models[ i ].attributes.id;
			} catch ( error ) {
				continue;
			}

			usersFound.push( {
				value: name,
				label: name,
				id,
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

// #endregion -- Manage Author Search

// #region -- Add an author

const authorsIdsInput = $( '#twrp-author-settings__js-author-ids' );

const authorsVisualList = $( '#twrp-author-settings__js-authors-list' );

/**
 * Attribute on authorsVisualList that holds the aria label for the remove button.
 */
const ariaLabelDataAttr = 'data-twrp-aria-remove-label';

/**
 * The template for an author item, to be appended to the visual list. Note that
 * we have a similar template in the PHP file, so a change here will require
 * also a change there, and vice-versa.
 */
const authorVisualItem = $(
	'<div class="twrp-display-list__item twrp-author-settings__author-item">' +
		'<div class="twrp-author-settings__author-item-name"></div>' +
		'<button class="twrp-display-list__item-remove-btn twrp-author-settings__js-author-remove-btn" type="button">' +
			'<span class="dashicons dashicons-no"></span>' +
		'</button>' +
	'</div>'
);

/**
 * The author attribute name that hold the Id of a visual item.
 */
const authorIdAttrName = 'data-author-id';

$( document ).on( 'click', '#twrp-author-settings__js-author-add-btn', handleAddAuthorClick );
$( document ).on( 'keypress', '#twrp-author-settings__js-author-search', handleSearchInputKeypress );

/**
 * When a user click "enter", add the current selected author to the list.
 */
function handleSearchInputKeypress( event: JQueryEventObject ): void {
	const keycode = ( event.keyCode ? event.keyCode : event.which );
	if ( keycode !== 13 ) {
		return;
	}

	event.preventDefault();
	const autocompleteInstance: any = authorSearchInput.autocomplete( 'instance' );

	let id: string, name: string;
	try {
		const selectedItem = autocompleteInstance.selectedItem;
		id = selectedItem.id;
		name = selectedItem.label;
	} catch ( error ) {
		return;
	}

	addAuthor( id, name );
}

/**
 * Handles the click on "Add author" button.
 */
function handleAddAuthorClick(): void {
	const autocompleteInstance: any = authorSearchInput.autocomplete( 'instance' );

	let id: string, name: string;
	try {
		const selectedItem = autocompleteInstance.selectedItem;
		id = selectedItem.id;
		name = selectedItem.label;
	} catch ( error ) {
		return;
	}

	addAuthor( id, name );
}

/**
 * Add an author to the list of selected authors(both visual, and in the hidden
 * input).
 */
function addAuthor( id:number|string, name: string ): void {
	_addAuthorToVisualList( id, name );
	_addAuthorToHiddenInput( id );
	removeOrAddNoAuthorsText();
}

/**
 * Add an author to the visual list.
 */
function _addAuthorToVisualList( id: number|string, name: string ): void {
	if ( authorExistInVisualList( id ) ) {
		return;
	}

	const newAuthorItem = authorVisualItem.clone();
	const removeBtnAriaLabel = getRemoveButtonAriaLabel().replace( '%s', sanitizeAuthorName( name ) );
	newAuthorItem.find( '.twrp-author-settings__author-item-name' ).text( sanitizeAuthorName( name ) );
	newAuthorItem.find( '.twrp-display-list__item-remove-btn' ).attr( 'aria-label', removeBtnAriaLabel );
	newAuthorItem.attr( authorIdAttrName, id );
	authorsVisualList.append( newAuthorItem );
	showLeft( newAuthorItem, 'hide_first' );
}

/**
 * Add an author to the list of hidden input.
 */
function _addAuthorToHiddenInput( id: number|string ): void {
	if ( authorExistInHiddenInput( id ) ) {
		return;
	}
	id = String( id );
	const previousVal = authorsIdsInput.val();

	let newVal = '';
	if ( previousVal ) {
		newVal = previousVal + ';' + id;
	} else {
		newVal = id;
	}

	authorsIdsInput.val( newVal );
}

// #endregion -- Add an author

// #region -- Remove an author

$( document ).on( 'click', '.twrp-author-settings__js-author-remove-btn', handleRemoveAuthor );

/**
 * Handle the removing of the authors from the selected list.
 */
function handleRemoveAuthor(): void {
	let id: string|number = $( this ).closest( '[' + authorIdAttrName + ']' ).attr( authorIdAttrName );

	id = Number( id );
	if ( ! ( id > 0 ) ) {
		return;
	}

	removeAuthor( id );
}

/**
 * Removes an author to the list of selected authors(both visual, and in the
 * hidden input).
 */
function removeAuthor( id:number|string ): void {
	_removeAuthorFromVisualList( id );
	_removeAuthorFromHiddenInput( id );
	removeOrAddNoAuthorsText();
}

/**
 * Removes the author from the visual list, based on id.
 */
function _removeAuthorFromVisualList( id: string|number ): void {
	const itemToRemove = authorsVisualList.find( '[' + authorIdAttrName + '="' + id + '"]' );
	// Remove the attr fast, to trigger to show the empty authors list message
	// if necessary.
	itemToRemove.removeAttr( authorIdAttrName );
	hideLeft( itemToRemove, 'remove' );
}

/**
 * Removes an author from the hidden input list.
 */
function _removeAuthorFromHiddenInput( id: number|string ): void {
	const currentValue = String( authorsIdsInput.val() );
	id = String( id );

	const authorsIds = currentValue.split( ';' );
	const indexOfId = authorsIds.indexOf( id );

	if ( indexOfId !== -1 ) {
		authorsIds.splice( indexOfId, 1 );
		authorsIdsInput.val( authorsIds.join( ';' ) );
	}
}

// #endregion -- Remove an author

// #region -- Manage the "No Authors Added" Text.

/**
 * Contains the HTML Element that will be inserted/removed as necessary.
 */
const noAuthorsText = $( '#twrp-author-settings__js-no-authors-selected' );

$( document ).ready( removeOrAddNoAuthorsText );

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
	const haveItems = ( authorsVisualList.find( `[${ authorIdAttrName }]` ).length > 0 );

	if ( haveItems ) {
		hideLeft( noAuthorsText );
	}
}

/**
 * If Necessary, adds the "No Authors selected" text.
 */
function _addNoAuthorsTextIfNecessary() {
	const haveItems = ( authorsVisualList.find( `[${ authorIdAttrName }]` ).length > 0 );

	if ( ! haveItems ) {
		showLeft( noAuthorsText );
	}
}

// #endregion -- Manage the "No Authors Added" Text.

// #region -- Sorting function.

$( document ).ready( initializeSorting );

/**
 * Make the visual items sortable, and update the hidden input accordingly.
 */
function initializeSorting() {
	authorsVisualList.sortable( {
		placeholder: 'twrp-display-list__placeholder',
		stop: updateAuthorsIdsFromVisualList,
	} );
}

// #endregion -- Sorting function.

// #region -- Helper Functions

/**
 * Check to see if a given author item is displayed in visual list.
 */
function authorExistInVisualList( id: number|string ): boolean {
	const authorItem = authorsVisualList.find( '[' + authorIdAttrName + '="' + id + '"]' );

	if ( authorItem.length ) {
		return true;
	}

	return false;
}

/**
 * Check to see if a given author item exist in the hidden list.
 */
function authorExistInHiddenInput( id: number|string ): boolean {
	const inputVal = String( authorsIdsInput.val() );
	id = Number( id );

	if ( ( ! inputVal ) || ! ( id > 0 ) ) {
		return false;
	}

	const authorsIds = inputVal.split( ';' ).map( mapToInt );

	if ( authorsIds.indexOf( id ) !== -1 ) {
		return true;
	}

	return false;

	function mapToInt( val: any ): number {
		return parseInt( val );
	}
}

/**
 * Updates the Ids in the input in the same order as the ones
 * from the visual list.
 */
function updateAuthorsIdsFromVisualList(): void {
	const authorItems = authorsVisualList.find( '.twrp-author-settings__author-item' );
	const authorsIds = [];

	authorItems.each( function() {
		let itemId: string|number = $( this ).attr( authorIdAttrName );

		itemId = +itemId;
		if ( itemId > 0 ) {
			authorsIds.push( itemId );
		}
	} );

	authorsIdsInput.val( authorsIds.join( ';' ) );
}

/**
 * Get the aria label for the remove button. In the aria label will be present
 * "%s", which will need to be replaced with an author.
 */
function getRemoveButtonAriaLabel(): string {
	const ariaLabel = authorsVisualList.attr( ariaLabelDataAttr );
	if ( ! ariaLabel ) {
		return '';
	}

	return ariaLabel;
}

/**
 * Sanitize the author name.
 */
function sanitizeAuthorName( name: string ): string {
	// Names that are get are already sanitized.
	return name;
}

/**
 * Decodes the HTML entities.
 */
function decodeHtml( html: string ): string {
	return $( '<div>' ).html( html ).text();
}

// #endregion -- Helper Functions
