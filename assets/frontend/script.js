!function t(e,r,n){function o(i,l){if(!r[i]){if(!e[i]){var u="function"==typeof require&&require;if(!l&&u)return u(i,!0);if(a)return a(i,!0);var s=new Error("Cannot find module '"+i+"'");throw s.code="MODULE_NOT_FOUND",s}var c=r[i]={exports:{}};e[i][0].call(c.exports,(function(t){return o(e[i][1][t]||t)}),c,c.exports,t,e,r,n)}return r[i].exports}for(var a="function"==typeof require&&require,i=0;i<n.length;i++)o(n[i]);return o}({1:[function(t,e,r){"use strict";Object.defineProperty(r,"__esModule",{value:!0});var n={idPrefix:"tabby-toggle_",default:"[data-tabby-default]"},o=function(t){if(t&&"true"!=t.getAttribute("aria-selected")){var e=document.querySelector(t.hash);if(e){var r=function(t){var e=t.closest('[role="tablist"]');if(!e)return{};var r=e.querySelector('[role="tab"][aria-selected="true"]');if(!r)return{};var n=document.querySelector(r.hash);return r.setAttribute("aria-selected","false"),r.setAttribute("tabindex","-1"),n?(n.setAttribute("hidden","hidden"),{previousTab:r,previousContent:n}):{previousTab:r}}(t);!function(t,e){t.setAttribute("aria-selected","true"),t.setAttribute("tabindex","0"),e.removeAttribute("hidden"),t.focus()}(t,e),r.tab=t,r.content=e,function(t,e){var r;"function"==typeof window.CustomEvent?r=new CustomEvent("tabby",{bubbles:!0,cancelable:!0,detail:e}):(r=document.createEvent("CustomEvent")).initCustomEvent("tabby",!0,!0,e),t.dispatchEvent(r)}(t,r)}}},a=function(t,e){var r=function(t){var e=t.closest('[role="tablist"]'),r=e?e.querySelectorAll('[role="tab"]'):null;if(r)return{tabs:r,index:Array.prototype.indexOf.call(r,t)}}(t);if(r){var n,a=r.tabs.length-1;["ArrowUp","ArrowLeft","Up","Left"].indexOf(e)>-1?n=r.index<1?a:r.index-1:["ArrowDown","ArrowRight","Down","Right"].indexOf(e)>-1?n=r.index===a?0:r.index+1:"Home"===e?n=0:"End"===e&&(n=a),o(r.tabs[n])}};r.default=function(t,e){var r,i,l={};l.destroy=function(){var t=i.querySelectorAll("a");Array.prototype.forEach.call(t,(function(t){var e=document.querySelector(t.hash);e&&function(t,e,r){t.id.slice(0,r.idPrefix.length)===r.idPrefix&&(t.id=""),t.removeAttribute("role"),t.removeAttribute("aria-controls"),t.removeAttribute("aria-selected"),t.removeAttribute("tabindex"),t.closest("li").removeAttribute("role"),e.removeAttribute("role"),e.removeAttribute("aria-labelledby"),e.removeAttribute("hidden")}(t,e,r)})),i.removeAttribute("role"),document.documentElement.removeEventListener("click",u,!0),i.removeEventListener("keydown",s,!0),r=null,i=null},l.setup=function(){if(i=document.querySelector(t)){var e=i.querySelectorAll("a");i.setAttribute("role","tablist"),Array.prototype.forEach.call(e,(function(t){var e=document.querySelector(t.hash);e&&function(t,e,r){t.id||(t.id=r.idPrefix+e.id),t.setAttribute("role","tab"),t.setAttribute("aria-controls",e.id),t.closest("li").setAttribute("role","presentation"),e.setAttribute("role","tabpanel"),e.setAttribute("aria-labelledby",t.id),t.matches(r.default)?t.setAttribute("aria-selected","true"):(t.setAttribute("aria-selected","false"),t.setAttribute("tabindex","-1"),e.setAttribute("hidden","hidden"))}(t,e,r)}))}},l.toggle=function(e){var r=e;"string"==typeof e&&(r=document.querySelector(t+' [role="tab"][href*="'+e+'"]')),o(r)};var u=function(e){var r=e.target.closest(t+' [role="tab"]');r&&(e.preventDefault(),o(r))},s=function(e){var r=document.activeElement;r.matches(t+' [role="tab"]')&&(["ArrowUp","ArrowDown","ArrowLeft","ArrowRight","Up","Down","Left","Right","Home","End"].indexOf(e.key)<0||a(r,e.key))};return r=function(){var t={};return Array.prototype.forEach.call(arguments,(function(e){for(var r in e){if(!e.hasOwnProperty(r))return;t[r]=e[r]}})),t}(n,e||{}),l.setup(),function(t){if(!(window.location.hash.length<1)){var e=document.querySelector(t+' [role="tab"][href*="'+window.location.hash+'"]');o(e)}}(t),document.documentElement.addEventListener("click",u,!0),i.addEventListener("keydown",s,!0),l}},{}],2:[function(t,e,r){"use strict";Element.prototype.closest||(Element.prototype.matches||(Element.prototype.matches=Element.prototype.msMatchesSelector||Element.prototype.webkitMatchesSelector),Element.prototype.closest=function(t){var e=this;if(!document.documentElement.contains(this))return null;do{if(e.matches(t))return e;e=e.parentElement}while(null!==e);return null})},{}],3:[function(t,e,r){"use strict";Object.defineProperty(r,"__esModule",{value:!0}),t("./tabs/twrp-tab.ts"),r.default={}},{"./tabs/twrp-tab.ts":4}],4:[function(t,e,r){"use strict";var n=this&&this.__importDefault||function(t){return t&&t.__esModule?t:{default:t}};Object.defineProperty(r,"__esModule",{value:!0}),t("../external/tabby/tabby_polyfill");var o=n(t("../external/tabby/tabby"));function a(){new o.default("[data-twrp-tabs-btns]",{idPrefix:"twrp-tabby__",default:"[data-twrp-default-tab]"})}"loading"===document.readyState?window.addEventListener("DOMContentLoaded",a):a();var i="twrp-main__btn-item--active",l="twrp-main__btn-item--inactive";function u(){for(var t=document.querySelectorAll("[data-twrp-tabs-btns]"),e=0;e<t.length;e++)s(t[e])}function s(t){if(t.hasAttribute("data-twrp-tabs-btns")){for(var e=t.querySelectorAll('[aria-selected="false"]'),r=t.querySelectorAll('[aria-selected="true"]'),n=0;n<e.length;n++)e[n].parentElement.classList.remove(i),e[n].parentElement.classList.add(l);for(n=0;n<r.length;n++)r[n].parentElement.classList.remove(l),r[n].parentElement.classList.add(i)}}"loading"===document.readyState?window.addEventListener("DOMContentLoaded",u):u(),document.addEventListener("tabby",(function(t){var e=t.target;if(r=e,!(r instanceof Element||r instanceof HTMLDocument))return;var r;var n=e.closest("[data-twrp-tabs-btns]");if(!n)return;s(n)}))},{"../external/tabby/tabby":1,"../external/tabby/tabby_polyfill":2}]},{},[3]);
//# sourceMappingURL=script.js.map
