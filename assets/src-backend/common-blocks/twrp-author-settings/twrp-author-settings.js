import $ from 'jquery';

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
