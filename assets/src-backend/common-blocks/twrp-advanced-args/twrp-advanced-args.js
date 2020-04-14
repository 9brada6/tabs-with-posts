import $ from 'jquery';

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
