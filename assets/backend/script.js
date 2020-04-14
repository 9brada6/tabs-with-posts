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

	var script = {};

	return script;

}(jQuery));
