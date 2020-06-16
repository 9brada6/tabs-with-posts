import $ from 'jquery';
import 'jqueryui';

declare const wpApiSettings: any;

// =============================================================================
// Show/Hide Posts List.

const postTypeSelect = $( '#twrp-posts-settings__js-filter-type' );

const postVisualList = $( '#twrp-posts-settings__js-posts-list' );

const searchingWrapper = $( '#twrp-posts-settings__js-posts-search-wrap' );

$( document ).ready( hideOrShowVisualList );
$( document ).on( 'change', '#twrp-posts-settings__js-filter-type', hideOrShowVisualList );

/**
 * Hide or show the visual list and the form input to search for users.
 */
function hideOrShowVisualList() {
	const authorTypeVal = postTypeSelect.val();

	if ( 'NA' === authorTypeVal ) {
		searchingWrapper.hide( 'blind' );
		postVisualList.hide( 'blind' );
	} else {
		searchingWrapper.show( 'blind' );
		postVisualList.show( 'blind' );
	}
}

// =============================================================================
// Manage Posts Search

/**
 * The search input where administrators will search for posts.
 */
const postsSearchInput = $( '#twrp-posts-settings__js-posts-search' );

$( document ).ready( initializeAutoComplete );

/**
 * Initialize the search input, when a user enter some characters, it will
 * automatically search and display the options.
 */
function initializeAutoComplete() {
	postsSearchInput.autocomplete( {
		source: showSearchedPosts,
		minLength: 2,
	} );
}

/**
 * Search for the posts and append the results into the autocomplete selector.
 */
async function showSearchedPosts( request: any, sendToControl: CallableFunction ) {
	const wpApiURL = wpApiSettings.root + wpApiSettings.versionString;
	const fetchUrl = wpApiURL + `search?_fields=id,title&search=${ request.term }&page=1&per_page=10`;
	const fetchedResult = await fetch( fetchUrl );
	const posts = await fetchedResult.json();

	if ( ! ( posts instanceof Array ) ) {
		console.error( 'TWRP error when fetching posts.' ); // eslint-disable-line
	}

	const postsToSend = [];
	for ( let i = 0; i < posts.length; i++ ) {
		postsToSend.push( {
			value: posts[ i ].title,
			label: posts[ i ].title,
			id: posts[ i ].id,
		} );
	}
	sendToControl( postsToSend );
}

// =============================================================================
// Add Post.

const postsIdsInput = $( '#twrp-posts-settings__js-posts-ids' );

/**
 * The post attribute name that hold the Id of a visual item.
 */
const postIdAttrName = 'data-post-id';

/**
 * The template for a post item, to be appended to the visual list. Note that
 * we have a similar template in the PHP file, so a change here will require
 * also a change there, and vice-versa.
 */
const postVisualItem = $(
	'<div class="twrp-display-list__item twrp-posts-settings__post-item">' +
		'<div class="twrp-posts-settings__post-item-title"></div>' +
		'<button class="twrp-display-list__item-remove-btn twrp-posts-settings__js-post-remove-btn" type="button">' +
			'<span class="dashicons dashicons-no"></span>' +
		'</button>' +
	'</div>'
);

$( document ).on( 'click', '#twrp-posts-settings__js-posts-add-btn', handleAddPostClick );
$( document ).on( 'keypress', '#twrp-posts-settings__js-posts-search', handleSearchInputKeypress );

/**
 * When a user click "enter", add the current selected author to the list.
 */
function handleSearchInputKeypress( event: JQueryEventObject ): void {
	const keycode = ( event.keyCode ? event.keyCode : event.which );
	if ( keycode !== 13 ) {
		return;
	}

	event.preventDefault();
	const autocompleteInstance: any = postsSearchInput.autocomplete( 'instance' );

	let id: string, name: string;
	try {
		const selectedItem = autocompleteInstance.selectedItem;
		id = selectedItem.id;
		name = selectedItem.label;
	} catch ( error ) {
		return;
	}

	addPost( id, name );
}

/**
 * Handles the click on "Add post" button.
 */
function handleAddPostClick(): void {
	const autocompleteInstance: any = postsSearchInput.autocomplete( 'instance' );

	let id: string, name: string;
	try {
		const selectedItem = autocompleteInstance.selectedItem;
		id = selectedItem.id;
		name = selectedItem.label;
	} catch ( error ) {
		return;
	}

	addPost( id, name );
}

/**
 * Add a post to the list of selected posts(both visual, and in the hidden
 * input).
 */
function addPost( id:number|string, name: string ): void {
	_addPostToVisualList( id, name );
	_addPostToHiddenInput( id );
	removeOrAddNoPostsText();
}

/**
 * Add a post to the visual list.
 */
function _addPostToVisualList( id: number|string, name: string ): void {
	if ( postExistInVisualList( id ) ) {
		return;
	}

	const newAuthorItem = postVisualItem.clone();
	newAuthorItem.find( '.twrp-posts-settings__post-item-title' ).append( sanitizePostName( name ) );
	newAuthorItem.attr( postIdAttrName, id );
	postVisualList.append( newAuthorItem );
}

/**
 * Add a post to the list of hidden input.
 */
function _addPostToHiddenInput( id: number|string ): void {
	if ( postExistInHiddenInput( id ) ) {
		return;
	}
	id = String( id );
	const previousVal = postsIdsInput.val();

	let newVal = '';
	if ( previousVal ) {
		newVal = previousVal + ';' + id;
	} else {
		newVal = id;
	}

	postsIdsInput.val( newVal );
}

// =============================================================================
// Remove an author

$( document ).on( 'click', '.twrp-posts-settings__js-post-remove-btn', handleRemovePost );

/**
 * Handle the removing of the posts from the selected list.
 */
function handleRemovePost(): void {
	let id: string|number = $( this ).closest( '[' + postIdAttrName + ']' ).attr( postIdAttrName );

	id = Number( id );
	if ( ! ( id > 0 ) ) {
		return;
	}

	removePost( id );
}

/**
 * Removes a post to the list of selected posts(both visual, and in the
 * hidden input).
 */
function removePost( id:number|string ): void {
	_removePostFromVisualList( id );
	_removePostFromHiddenInput( id );
	removeOrAddNoPostsText();
}

/**
 * Removes a post from the visual list, based on id.
 */
function _removePostFromVisualList( id: string|number ): void {
	const itemsToRemove = postVisualList.find( '[' + postIdAttrName + '="' + id + '"]' );
	itemsToRemove.remove();
}

/**
 * Removes a post from the hidden input list.
 */
function _removePostFromHiddenInput( id: number|string ): void {
	const currentValue = String( postsIdsInput.val() );
	id = String( id );

	const postsIds = currentValue.split( ';' );
	const indexOfId = postsIds.indexOf( id );

	if ( indexOfId !== -1 ) {
		postsIds.splice( indexOfId, 1 );
		postsIdsInput.val( postsIds.join( ';' ) );
	}
}

// =============================================================================
// Manage the "No Authors Added" Text.

/**
 * Contains the HTML Element that will be inserted/removed as necessary.
 */
const noPostsText = $( '#twrp-posts-settings__js-no-posts-selected' );

$( document ).ready( removeOrAddNoPostsText );

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
	const textIsAppended = ( postVisualList.find( noPostsText ).length > 0 );
	const haveItems = ( postVisualList.find( `[${ postIdAttrName }]` ).length > 0 );

	if ( haveItems && textIsAppended ) {
		noPostsText.detach();
	}
}

/**
 * If Necessary, adds the "No Posts selected" text.
 */
function _addNoPostsTextIfNecessary() {
	const textIsAppended = ( postVisualList.find( noPostsText ).length > 0 );
	const haveItems = ( postVisualList.find( `[${ postIdAttrName }]` ).length > 0 );

	if ( ( ! textIsAppended ) && ( ! haveItems ) ) {
		postVisualList.append( noPostsText );
	}
}

// =============================================================================
// Sorting function.

$( document ).ready( initializeSorting );

/**
 * Make the visual items sortable, and update the hidden input accordingly.
 */
function initializeSorting() {
	postVisualList.sortable( {
		placeholder: 'twrp-display-list__placeholder',
		stop: updatePostsIdsFromVisualList,
	} );
}

// =============================================================================
// Helper Functions

/**
 * Check to see if a given post item is displayed in visual list.
 */
function postExistInVisualList( id: number|string ): boolean {
	const postItem = postVisualList.find( '[' + postIdAttrName + '="' + id + '"]' );

	if ( postItem.length ) {
		return true;
	}

	return false;
}

/**
 * Check to see if a given post item exist in the hidden list.
 */
function postExistInHiddenInput( id: number|string ): boolean {
	const inputVal = String( postsIdsInput.val() );
	id = Number( id );

	if ( ( ! inputVal ) || ! ( id > 0 ) ) {
		return false;
	}

	const postsIds = inputVal.split( ';' ).map( mapToInt );

	if ( postsIds.indexOf( id ) !== -1 ) {
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
function updatePostsIdsFromVisualList(): void {
	const postItems = postVisualList.find( '.twrp-posts-settings__post-item' );
	const authorsIds = [];

	postItems.each( function() {
		let itemId: string|number = $( this ).attr( postIdAttrName );

		itemId = +itemId;
		if ( itemId > 0 ) {
			authorsIds.push( itemId );
		}
	} );

	postsIdsInput.val( authorsIds.join( ';' ) );
}

/**
 * todo
 */
function sanitizePostName( name: string ): string {
	return name;
}