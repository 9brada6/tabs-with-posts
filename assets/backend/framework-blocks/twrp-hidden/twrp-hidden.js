"use strict";
var __importDefault = (this && this.__importDefault) || function (mod) {
    return (mod && mod.__esModule) ? mod : { "default": mod };
};
Object.defineProperty(exports, "__esModule", { value: true });
exports.showLeft = exports.hideLeft = exports.hideUp = exports.showUp = void 0;
var jquery_1 = __importDefault(require("jquery"));
require("jqueryui");
// Todo... Remove all paragraphs with hide.
var effectDuration = 500;
// #region -- Hide/Show Vertically
function hideUp(element) {
    jquery_1.default(element).slideUp({
        duration: effectDuration,
        complete: function () {
            addHideClass(element);
        },
    });
}
exports.hideUp = hideUp;
function showUp(element) {
    jquery_1.default(element).slideDown({
        duration: effectDuration,
        complete: function () {
            removeHideClass(element);
        },
    });
}
exports.showUp = showUp;
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
    jquery_1.default(element).hide({
        effect: 'blind',
        duration: effectDuration,
        direction: 'left',
        complete: completeFunction,
    });
}
exports.hideLeft = hideLeft;
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
    jquery_1.default(element).show({
        effect: 'blind',
        duration: effectDuration,
        direction: 'left',
        complete: function () {
            removeHideClass(element);
        },
    });
}
exports.showLeft = showLeft;
// =============================================================================
function addHideClass(element) {
    jquery_1.default(element).addClass('twrp-hidden');
}
function removeHideClass(element) {
    jquery_1.default(element).removeClass('twrp-hidden').css('display', '');
}
function removeElement(element) {
    jquery_1.default(element).remove();
}
