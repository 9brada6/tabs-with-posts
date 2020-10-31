import $ from 'jquery';
import { toggleDisplay } from '../framework-blocks/twrp-hidden/twrp-hidden';

const showButtonSelector = '.twrpb-icons-spoiler__btn';

$( document ).on( 'click', showButtonSelector, hideOrShowIconsSpoiler );

function hideOrShowIconsSpoiler() {
	const spoilerWrapper = $( this ).parent( '.twrpb-icons-spoiler__category' ).find( '.twrpb-icons-spoiler__spoiler' );
	toggleDisplay( spoilerWrapper );
}
