import '../external/tabby/tabby_polyfill';
import Tabby from '../external/tabby/tabby';

const tabs: any = [];

if ( document.readyState === 'loading' ) {
	window.addEventListener( 'DOMContentLoaded', initializeAllTabs );
} else {
	initializeAllTabs();
}

function initializeAllTabs() {
	const allTabs = document.querySelectorAll( '[data-twrp-tabs-btns]' );

	if ( allTabs.length === 0 ) {
		return;
	}

	for ( let i = 0; i < allTabs.length; i++ ) {
		const element = allTabs[ i ];
		const tabsWrapper = element.closest( '.twrp-main' );
		if ( tabsWrapper === null ) {
			continue;
		}

		const tabId = tabsWrapper.getAttribute( 'id' );
		const tabSelectorId = '#' + tabId + ' [data-twrp-tabs-btns]';

		setTimeout( function() {
			// @ts-ignore -- No Tabby type declared yet.
			tabs.push( new Tabby( tabSelectorId, {
				idPrefix: 'twrp-tabby__',
				default: '[data-twrp-default-tab]',
			} ) );
		}, 0 );
	}
}

// #region -- Make button not take focus on click.

// document.addEventListener( 'click', removeTabButtonFocus );

// function removeTabButtonFocus( event: Event ) {
// 	const tab = event.target;

// 	// @ts-ignore
// 	if ( tab.getAttribute( 'role' ) === 'tab' && ( tab.className.search( 'twrp-' ) !== -1 && tab.getAttribute( 'href' ) ).search( '#twrp-' ) === 0 ) {
// 		// @ts-ignore
// 		tab.blur();
// 	}
// }

//#endregion -- Make button not take focus on click.

// #region -- Add active item to button wrapper.

const activeButtonItemClass = 'twrp-tab-btn-item-active';

if ( document.readyState === 'loading' ) {
	window.addEventListener( 'DOMContentLoaded', addButtonWrapperInitial );
} else {
	addButtonWrapperInitial();
}
function addButtonWrapperInitial() {
	const buttons = document.querySelectorAll( '[data-twrp-default-tab]' );

	for ( let i = 0; i < buttons.length; i++ ) {
		const btnWrapper = buttons[ i ].parentElement;
		// @ts-ignore
		btnWrapper.classList.add( activeButtonItemClass );
	}
}

document.addEventListener( 'tabby', addButtonWrapperActiveClass );
function addButtonWrapperActiveClass( event: Event ) {
	// @ts-ignore
	const buttonWrapper: Element = event.target.parentElement;
	// @ts-ignore
	const prevButtonWrapper: Element = event.detail.previousTab.parentElement;

	if ( buttonWrapper.nodeName === 'LI' && buttonWrapper.className.search( 'twrp-' ) !== -1 ) {
		buttonWrapper.classList.add( activeButtonItemClass );
	}

	prevButtonWrapper.classList.remove( activeButtonItemClass );
}

// #endregion -- Add active item to button wrapper.

// #region -- Helpers.

// eslint-disable-next-line no-unused-vars
function isElement( element: unknown ): boolean {
	return element instanceof Element || element instanceof HTMLDocument;
}

// eslint-disable-next-line no-unused-vars
function isNodeList( nodes: any ): boolean {
	const stringRepresentation = Object.prototype.toString.call( nodes );

	return typeof nodes === 'object' &&
        /^\[object (HTMLCollection|NodeList|Object)\]$/.test( stringRepresentation ) &&
        nodes.hasOwnProperty( 'length' ) &&
        ( nodes.length === 0 || ( typeof nodes[ 0 ] === 'object' && nodes[ 0 ].nodeType > 0 ) );
}

// #endregion -- Helpers.
