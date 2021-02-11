import $ from 'jquery';

const querySettingCollapsibleSelector = '.twrpb-query-settings__setting';

const dataSettingName = 'data-twrpb-setting-name';
const dataDefaultSettingsName = 'data-twrpb-default-settings';

// todo: testing
setInterval( resetAllQuerySettingsToDefault, 12000 );

// #region -- Set all settings to default.

function resetAllQuerySettingsToDefault() {
	const querySettingsWrappers = $( querySettingCollapsibleSelector ).not( '[' + dataSettingName + '="query_name"]' );

	for ( let i = 0; i < querySettingsWrappers.length; i++ ) {
		setQuerySettingToDefault( querySettingsWrappers.eq( i ) );
	}
}

function setQuerySettingToDefault( querySettingWrapper: JQuery ) {
	const settingBaseName = querySettingWrapper.attr( dataSettingName );
	const defaultSettings = JSON.parse( querySettingWrapper.attr( dataDefaultSettingsName ) );

	for ( const settingName of Object.keys( defaultSettings ) ) {
		const defaultSettingValue = defaultSettings[ settingName ];
		const fullSettingName = settingBaseName + '[' + settingName + ']';

		const settingControl = $( '[name="' + fullSettingName + '"], [type="checkbox"][name^="' + fullSettingName + '"]' );
		if ( settingControl.length === 0 ) {
			continue;
		}

		setControlValue( settingControl, defaultSettingValue );
	}
}

// #endregion -- Set all settings to default.

function setControlValue( control: JQuery, setting: string|Array<string> ) {
	if ( getControlType( control ) === 'select' ) {
		control.val( setting );
		triggerControlChange( control );
		return;
	}

	if ( getControlType( control ) === 'checkbox' ) {
		if ( Array.isArray( setting ) ) {
			control.each( ( index, el ) => {
				const element = $( el );

				// If the element is checked and it shouldn't, then uncheck.
				if ( setting.indexOf( String( element.val() ) ) === -1 && element.prop( 'checked' ) === true ) {
					element.prop( 'checked', false );
					triggerControlChange( element );
				}

				// If the element is unchecked and it should, then check.
				if ( setting.indexOf( String( element.val() ) ) !== -1 && element.prop( 'checked' ) === false ) {
					element.prop( 'checked', true );
					triggerControlChange( element );
				}
			} );
		}
		return;
	}

	if ( getControlType( control ) === 'text' ) {
		control.val( setting );
		triggerControlChange( control );
		return;
	}

	if ( getControlType( control ) === 'number' ) {
		control.val( setting );
		triggerControlChange( control );
	}
}

function triggerControlChange( control: JQuery ): void {
	// Default trigger.
	control.trigger( 'change' );
}

/**
 * Get the type of control recognized.
 *
 * For the moment only select, checkboxes, number, text and textarea are recognized.
 */
function getControlType( control: JQuery ): string {
	if ( control.is( 'select' ) ) {
		return 'select';
	}

	if ( control.is( 'input[type="checkbox"]' ) ) {
		return 'checkbox';
	}

	if ( control.is( 'input[type="text"]' ) ) {
		return 'text';
	}

	if ( control.is( 'input[type="number"]' ) ) {
		return 'number';
	}

	return null;
}
