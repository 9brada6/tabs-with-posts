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

// #region -- Add Active/Inactive Classes to Tab Items.

const tabBtnItemActiveClass = 'twrp-main__btn-item--active';
const tabBtnItemInactiveClass = 'twrp-main__btn-item--inactive';

if ( document.readyState === 'loading' ) {
	window.addEventListener( 'DOMContentLoaded', handleAllAdditionalClasses );
} else {
	handleAllAdditionalClasses();
}

function handleAllAdditionalClasses() {
	const allListTabs = document.querySelectorAll( '[data-twrp-tabs-btns]' );

	for ( let i = 0; i < allListTabs.length; i++ ) {
		updateAdditionalTabClasses( allListTabs[ i ] );
	}
}

document.addEventListener( 'tabby', handleAdditionalActiveClassesToTabs );

function handleAdditionalActiveClassesToTabs( event: Event ) {
	const targetElement = event.target as HTMLElement;

	if ( ! isElement( targetElement ) ) {
		return;
	}

	const btnsWrapper = targetElement.closest( '[data-twrp-tabs-btns]' );

	if ( ! btnsWrapper ) {
		return;
	}

	updateAdditionalTabClasses( btnsWrapper );
}

function updateAdditionalTabClasses( tabList: Element ) {
	if ( ! tabList.hasAttribute( 'data-twrp-tabs-btns' ) ) {
		return;
	}

	const inactiveButtons = tabList.querySelectorAll( '[aria-selected="false"]' );
	const activeButton = tabList.querySelectorAll( '[aria-selected="true"]' );

	for ( let i = 0; i < inactiveButtons.length; i++ ) {
		// @ts-ignore -- Parent element is not null.
		inactiveButtons[ i ].parentElement.classList.remove( tabBtnItemActiveClass );
		// @ts-ignore -- Parent element is not null.
		inactiveButtons[ i ].parentElement.classList.add( tabBtnItemInactiveClass );
	}

	for ( let i = 0; i < activeButton.length; i++ ) {
		// @ts-ignore -- Parent element is not null.
		activeButton[ i ].parentElement.classList.remove( tabBtnItemInactiveClass );
		// @ts-ignore -- Parent element is not null.
		activeButton[ i ].parentElement.classList.add( tabBtnItemActiveClass );
	}
}

// #endregion -- Add Active/Inactive Classes to Tab Items.

// #region -- Helpers.

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
