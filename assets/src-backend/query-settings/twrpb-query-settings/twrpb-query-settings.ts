import $ from 'jquery';

// #region -- Ask an alert question before deleting a query.

const deleteButtonSelector = '.twrpb-queries-table__delete-link';

const deleteConfirmationMessageHolder = '#twrpb-query-settings__before-deleting-confirmation';
const deleteConfirmationMessageData = 'data-twrpb-query-delete-confirm';

$( document ).on( 'click', deleteButtonSelector, handleDeleteButtonClicked );

function handleDeleteButtonClicked( event ) {
	const alertMessage = $( deleteConfirmationMessageHolder ).attr( deleteConfirmationMessageData );
	// eslint-disable-next-line no-alert
	const confirmation = confirm( alertMessage );

	if ( ! confirmation ) {
		event.preventDefault();
	}
}

// #endregion -- Ask an alert question before deleting a query.
