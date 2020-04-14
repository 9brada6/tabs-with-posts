import $ from 'jquery';

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
