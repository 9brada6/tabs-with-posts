import $ from 'jquery';

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
