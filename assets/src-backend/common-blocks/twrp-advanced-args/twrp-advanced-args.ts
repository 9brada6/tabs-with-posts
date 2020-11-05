import $ from 'jquery';

declare let CodeMirror: any;

$( enableCodeMirror );

function enableCodeMirror(): void {
	const element = document.getElementById( 'twrp-advanced-args__textarea' );

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
