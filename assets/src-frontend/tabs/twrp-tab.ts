import '../external/tabby/tabby_polyfill';
import Tabby from '../external/tabby/tabby';
import { isElement } from '../common-blocks/_twrp-utils';

let tabs;

if ( document.readyState === 'loading' ) {
	window.addEventListener( 'DOMContentLoaded', initializeAllTabs );
} else {
	initializeAllTabs();
}

function initializeAllTabs() {
	// @ts-ignore -- No Tabby type declared yet.
	tabs = new Tabby( '[data-twrp-tabs-btns]', {
		idPrefix: 'twrp-tabby__',
		default: '[data-twrp-default-tab]',
	} );
}

// #region -- Add Active/Inactive Classes to Tab Items.

const tabBtnItemActiveClass = 'twrp-tab__btn-item-active';
const tabBtnItemInactiveClass = 'twrp-tab__btn-item-inactive';

if ( document.readyState === 'loading' ) {
	window.addEventListener( 'DOMContentLoaded', handleAllAdditionalClasses );
} else {
	handleAllAdditionalClasses();
}

document.addEventListener( 'tabby', handleAdditionalActiveClassesToTabs );

function handleAllAdditionalClasses() {
	const allListTabs = document.querySelectorAll( '[data-twrp-tabs-btns]' );

	for ( let i = 0; i < allListTabs.length; i++ ) {
		updateAdditionalTabClasses( allListTabs[ i ] );
	}
}

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
