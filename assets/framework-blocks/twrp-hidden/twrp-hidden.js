import $ from 'jquery';
import 'jqueryui';
// Todo... Remove all paragraphs with hide.
var effectDuration = 500;
// #region -- Hide/Show Vertically
function hideUp(element) {
    $(element).slideUp({
        duration: effectDuration,
        complete: function () {
            addHideClass(element);
        },
    });
}
function showUp(element) {
    $(element).slideDown({
        duration: effectDuration,
        complete: function () {
            removeHideClass(element);
        },
    });
}
// #endregion -- Hide/Show Vertically
// =============================================================================
/**
 * Hide a HTML element with a blind effect from the left.
 *
 * @param {HTMLElement} element A jquery element.
 * @param {'remove'} remove Add 'remove' to remove the element from the DOM.
 */
function hideLeft(element, remove) {
    if (remove === void 0) { remove = ''; }
    var completeFunction = function () {
        addHideClass(element);
    };
    if (remove === 'remove') {
        completeFunction = function () {
            removeElement(element);
        };
    }
    $(element).hide({
        effect: 'blind',
        duration: effectDuration,
        direction: 'left',
        complete: completeFunction,
    });
}
/**
 * Show a HTML element with a blind effect from the left.
 *
 * @param {HTMLElement} element A jquery element.
 * @param {'hide_first'} hideFirst Add 'hide_first' to first hide then show, if the
 * element already exists.
 */
function showLeft(element, hideFirst) {
    if (hideFirst === void 0) { hideFirst = ''; }
    if (hideFirst === 'hide_first') {
        element.addClass('twrp-hidden');
    }
    $(element).show({
        effect: 'blind',
        duration: effectDuration,
        direction: 'left',
        complete: function () {
            removeHideClass(element);
        },
    });
}
// =============================================================================
function addHideClass(element) {
    $(element).addClass('twrp-hidden');
}
function removeHideClass(element) {
    $(element).removeClass('twrp-hidden').css('display', '');
}
function removeElement(element) {
    $(element).remove();
}
// =============================================================================
export { showUp, hideUp, hideLeft, showLeft, };
