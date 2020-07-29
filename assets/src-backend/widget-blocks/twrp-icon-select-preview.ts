import $ from 'jquery';

$( document ).on( 'change', '[name*="author_icon"]', changeIconPreview );

function changeIconPreview() {
	const select = $( this );

	if ( select.parent().find( '.twrp-widget-icon-preview' ).length === 0 ) {
		select.parent().append( '<div class="twrp-widget-icon-preview"></div>' );
	}

	const previewWrapper = select.parent().find( '.twrp-widget-icon-preview' );

	const svgId = select.val();
	previewWrapper.html( '' );
	previewWrapper.append( '<svg><use xlink:href="#' + svgId + '" /></svg>' );
}
