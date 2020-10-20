!function t(e,n,r){function i(a,d){if(!n[a]){if(!e[a]){var s="function"==typeof require&&require;if(!d&&s)return s(a,!0);if(o)return o(a,!0);var u=new Error("Cannot find module '"+a+"'");throw u.code="MODULE_NOT_FOUND",u}var l=n[a]={exports:{}};e[a][0].call(l.exports,(function(t){return i(e[a][1][t]||t)}),l,l.exports,t,e,n,r)}return n[a].exports}for(var o="function"==typeof require&&require,a=0;a<r.length;a++)i(r[a]);return i}({1:[function(t,e,n){(function(t){"use strict";var e=this&&this.__importDefault||function(t){return t&&t.__esModule?t:{default:t}};Object.defineProperty(n,"__esModule",{value:!0}),e("undefined"!=typeof window?window.jQuery:void 0!==t?t.jQuery:null).default((function(){var t=document.getElementById("twrp-advanced-args__codemirror-textarea");t&&CodeMirror.fromTextArea(t,{mode:"application/json",theme:"material-darker",indentUnit:4,indentWithTabs:!0,lineNumbers:!0,autoRefresh:!0})}))}).call(this,"undefined"!=typeof global?global:"undefined"!=typeof self?self:"undefined"!=typeof window?window:{})},{}],2:[function(t,e,n){(function(e){"use strict";var r=this&&this.__importDefault||function(t){return t&&t.__esModule?t:{default:t}};Object.defineProperty(n,"__esModule",{value:!0});var i=r("undefined"!=typeof window?window.jQuery:void 0!==e?e.jQuery:null);"undefined"!=typeof window?window.jQuery:void 0!==e&&e.jQuery;var o=t("../../framework-blocks/twrp-hidden/twrp-hidden"),a=i.default("#twrp-author-settings__select_type"),d=i.default("#twrp-author-settings__author-search-wrap"),s=i.default("#twrp-author-settings__js-authors-list");i.default(document).on("change","#twrp-author-settings__select_type",(function(){var t=a.val();"IN"===t||"OUT"===t?(o.showUp(d),o.showUp(s)):(o.hideUp(d),o.hideUp(s))}));var u=i.default("#twrp-author-settings__js-same-author-notice");function l(){"SAME"===a.val()?u.show("blind"):u.hide("blind")}i.default(l),i.default(document).on("change","#twrp-author-settings__select_type",l),i.default((function(){f.autocomplete({source:c,minLength:2})}));var f=i.default("#twrp-author-settings__js-author-search");function c(t,e){var n=new wp.api.collections.Users,r=[];function o(){for(var t=0;t<n.length;t++){var o=void 0,a=void 0;try{d=n.models[t].attributes.name,o=i.default("<div>").html(d).text(),a=n.models[t].attributes.id}catch(t){continue}r.push({value:o,label:o,id:a})}var d;e(r)}n.fetch({data:{_fields:"id,name",search:t.term}}),n.once("sync",o),n.once("error",(function(){console.error("TWRP Backbone error when getting users."),o()})),n.once("invalid",(function(){console.error("TWRP Backbone invalid when getting users."),o()}))}var p=i.default("#twrp-author-settings__js-author-ids"),w=i.default("#twrp-author-settings__js-authors-list"),h="data-twrp-aria-remove-label",_=i.default('<div class="twrp-display-list__item twrp-author-settings__author-item"><div class="twrp-author-settings__author-item-name"></div><button class="twrp-display-list__item-remove-btn twrp-author-settings__js-author-remove-btn" type="button"><span class="dashicons dashicons-no"></span></button></div>'),v="data-author-id";function g(t,e){!function(t,e){if(function(t){if(w.find('[data-author-id="'+t+'"]').length)return!0;return!1}(t))return;var n=_.clone(),r=function(){var t=w.attr(h);if(!t)return"";return t}().replace("%s",e);n.find(".twrp-author-settings__author-item-name").text(e),n.find(".twrp-display-list__item-remove-btn").attr("aria-label",r),n.attr(v,t),w.append(n),o.showLeft(n,"hide_first")}(t,e),function(t){if(function(t){var e=String(p.val());if(t=Number(t),!(e&&t>0))return!1;if(-1!==e.split(";").map(n).indexOf(t))return!0;return!1;function n(t){return parseInt(t)}}(t))return;t=String(t);var e=p.val(),n="";n=e?e+";"+t:t;p.val(n)}(t),y()}i.default(document).on("click","#twrp-author-settings__js-author-add-btn",(function(){var t,e,n=f.autocomplete("instance");try{var r=n.selectedItem;t=r.id,e=r.label}catch(t){return}g(t,e)})),i.default(document).on("keypress","#twrp-author-settings__js-author-search",(function(t){if(13!==(t.keyCode?t.keyCode:t.which))return;t.preventDefault();var e,n,r=f.autocomplete("instance");try{var i=r.selectedItem;e=i.id,n=i.label}catch(t){return}g(e,n)})),i.default(document).on("click",".twrp-author-settings__js-author-remove-btn",(function(){var t=Number(i.default(this).closest("[data-author-id]").attr(v));if(!(t>0))return;!function(t){(function(t){var e=w.find('[data-author-id="'+t+'"]');e.removeAttr(v),o.hideLeft(e,"remove")})(t),function(t){var e=String(p.val());t=String(t);var n=e.split(";"),r=n.indexOf(t);-1!==r&&(n.splice(r,1),p.val(n.join(";")))}(t),y()}(t)}));var m=i.default("#twrp-author-settings__js-no-authors-selected");function y(){w.find("[data-author-id]").length>0&&o.hideLeft(m),w.find("[data-author-id]").length>0||o.showLeft(m)}function b(){var t=w.find(".twrp-author-settings__author-item"),e=[];t.each((function(){var t=Number(i.default(this).attr(v));t>0&&e.push(t)})),p.val(e.join(";"))}i.default(y),i.default((function(){w.sortable({placeholder:"twrp-display-list__placeholder",stop:b})}))}).call(this,"undefined"!=typeof global?global:"undefined"!=typeof self?self:"undefined"!=typeof window?window:{})},{"../../framework-blocks/twrp-hidden/twrp-hidden":11}],3:[function(t,e,n){(function(e){"use strict";var r=this&&this.__importDefault||function(t){return t&&t.__esModule?t:{default:t}};Object.defineProperty(n,"__esModule",{value:!0});var i=r("undefined"!=typeof window?window.jQuery:void 0!==e?e.jQuery:null);"undefined"!=typeof window?window.jQuery:void 0!==e&&e.jQuery;var o=t("../../framework-blocks/twrp-hidden/twrp-hidden"),a=i.default("#twrp-cat-settings__js-cat-dropdown"),d=i.default("#twrp-cat-settings__cat-ids"),s="data-cat-id",u=i.default("#twrp-cat-settings__cat-list-wrap"),l=u.find(".twrp-display-list__empty-msg"),f=i.default('<div class="twrp-display-list__item twrp-cat-settings__cat-list-item"><div class="twrp-display-list__item-name twrp-cat-settings__cat-item-name"></div><button class="twrp-display-list__item-remove-btn twrp-cat-settings__cat-remove-btn" type="button"><span class="dashicons dashicons-no"></span></button></div>');function c(){u.find("[data-cat-id]").length>0||o.showLeft(l),u.find("[data-cat-id]").length>0&&o.hideLeft(l)}i.default(document).on("click","#twrp-cat-settings__add-cat-btn",(function(){var t=a.find(":selected").val(),e=_(a.find(":selected").text());t>0&&(function(t){var e,n=d.val();e=n&&t?n+";"+t:t;(function(t){var e=d.val();if(!e)return!1;if(-1!==e.split(";").indexOf(t))return!0;return!1})(t)||d.val(e)}(t),function(t,e){if(!function(t){var e=u.find(".twrp-cat-settings__cat-list-item"),n=!1;if(e.each((function(){t===i.default(this).attr(s)&&(n=!0)})),n)return!0;return!1}(t)){var n=f.clone(),r=function(){var t=u.attr("data-twrp-aria-remove-label");if(!t)return"";return t}().replace("%s",_(e));n.find(".twrp-cat-settings__cat-item-name").text(_(e)),n.find(".twrp-display-list__item-remove-btn").attr("aria-label",r),n.attr(s,t),u.append(n),c(),o.showLeft(n,"hide_first")}}(t,e))})),i.default(document).on("click",".twrp-cat-settings__cat-remove-btn",(function(){var t=String(i.default(this).closest("[data-cat-id]").attr(s));(function(t){var e=u.find('[data-cat-id="'+t+'"]');e.removeAttr(s),c(),o.hideLeft(e,"remove")})(t),function(t){var e=String(d.val()).split(";"),n=e.indexOf(String(t));-1!==n&&(e.splice(n,1),d.val(e.join(";")))}(t)})),i.default((function(){u.sortable({placeholder:"twrp-display-list__placeholder",stop:v})}));var p=i.default("#twrp-cat-settings__type"),w=i.default("#twrp-cat-settings__js-select-relation-wrap"),h=i.default("#twrp-cat-settings__js-settings-wrapper");function _(t){return t=(t=t.replace(/\([^(]*\)$/,"")).trim()}function v(){var t=u.find(".twrp-cat-settings__cat-list-item"),e="";t.each((function(){var t=String(i.default(this).attr(s));e?e+=";"+t:e=t})),d.val(e)}i.default(document).on("change","#twrp-cat-settings__type",(function(){var t=p.val();"NA"===t?(o.hideUp(h),o.hideUp(w)):"IN"===t?(w.is(":hidden")?(w.show(),o.showUp(h),w.hide()):o.showUp(h),o.showUp(w)):(o.showUp(h),o.hideUp(w))}))}).call(this,"undefined"!=typeof global?global:"undefined"!=typeof self?self:"undefined"!=typeof window?window:{})},{"../../framework-blocks/twrp-hidden/twrp-hidden":11}],4:[function(t,e,n){(function(t){"use strict";var e=this&&this.__importDefault||function(t){return t&&t.__esModule?t:{default:t}};Object.defineProperty(n,"__esModule",{value:!0});var r=e("undefined"!=typeof window?window.jQuery:void 0!==t?t.jQuery:null);"undefined"!=typeof window?window.jQuery:void 0!==t&&t.jQuery,r.default((function(){r.default(".twrp-collapsible").each((function(){var t=r.default(this),e="1"===t.attr("data-twrp-is-collapsed")&&0;t.accordion({active:e,heightStyle:"content",collapsible:!0,icons:!1})}))}))}).call(this,"undefined"!=typeof global?global:"undefined"!=typeof self?self:"undefined"!=typeof window?window:{})},{}],5:[function(t,e,n){(function(e){"use strict";var r=this&&this.__importDefault||function(t){return t&&t.__esModule?t:{default:t}};Object.defineProperty(n,"__esModule",{value:!0});var i=r("undefined"!=typeof window?window.jQuery:void 0!==e?e.jQuery:null);"undefined"!=typeof window?window.jQuery:void 0!==e&&e.jQuery;var o=t("../../framework-blocks/twrp-hidden/twrp-hidden"),a=i.default("#twrp-comments-settings__js-comparator"),d=i.default("#twrp-comments-settings__js-num_comments");function s(){"NA"===a.val()?o.hideUp(d):o.showUp(d)}i.default(s),i.default(document).on("change","#twrp-comments-settings__js-comparator",s)}).call(this,"undefined"!=typeof global?global:"undefined"!=typeof self?self:"undefined"!=typeof window?window:{})},{"../../framework-blocks/twrp-hidden/twrp-hidden":11}],6:[function(t,e,n){(function(e){"use strict";var r=this&&this.__importDefault||function(t){return t&&t.__esModule?t:{default:t}};Object.defineProperty(n,"__esModule",{value:!0});var i=r("undefined"!=typeof window?window.jQuery:void 0!==e?e.jQuery:null);"undefined"!=typeof window?window.jQuery:void 0!==e&&e.jQuery;var o=t("../../framework-blocks/twrp-hidden/twrp-hidden"),a=i.default("#twrp-date-settings__after"),d=i.default("#twrp-date-settings__before");i.default((function(){if(t=document.createElement("input"),e="not-a-date",t.setAttribute("type","date"),t.setAttribute("value",e),t.value!==e)return;var t,e;var n={dateFormat:"yy-mm-dd",changeMonth:!0,changeYear:!0};a.datepicker(n),d.datepicker(n)}));var s=i.default("#twrp-date-settings__js-date-type"),u=i.default("#twrp-date-settings__js-last-period-wrapper"),l=i.default("#twrp-date-settings__js-between-wrapper");function f(){"LT"===s.val()?o.showUp(u):o.hideUp(u)}function c(){"FT"===s.val()?o.showUp(l):o.hideUp(l)}i.default(f),i.default(document).on("change","#twrp-date-settings__js-date-type",f),i.default(c),i.default(document).on("change","#twrp-date-settings__js-date-type",c)}).call(this,"undefined"!=typeof global?global:"undefined"!=typeof self?self:"undefined"!=typeof window?window:{})},{"../../framework-blocks/twrp-hidden/twrp-hidden":11}],7:[function(t,e,n){(function(e){"use strict";var r=this&&this.__importDefault||function(t){return t&&t.__esModule?t:{default:t}};Object.defineProperty(n,"__esModule",{value:!0});var i=r("undefined"!=typeof window?window.jQuery:void 0!==e?e.jQuery:null);"undefined"!=typeof window?window.jQuery:void 0!==e&&e.jQuery;var o=t("../../framework-blocks/twrp-hidden/twrp-hidden"),a=i.default("#twrp-order-setting__js-first-order-group"),d=i.default("#twrp-order-setting__js-second-order-group"),s=i.default("#twrp-order-setting__js-third-order-group"),u="twrp-order-setting__js-orderby",l=[a,d,s];function f(){for(var t=!1,e=0;e<l.length;e++)t?o.hideUp(l[e]):o.showUp(l[e]),"not_applied"===l[e].find("."+u).val()?(t=!0,o.hideUp(l[e].find(".twrp-order-setting__js-order-type"))):o.showUp(l[e].find(".twrp-order-setting__js-order-type"))}i.default(f),i.default(document).on("change","."+u,f),i.default(document).on("change","."+u,(function(){for(var t=0;t<l.length;t++)l[t].find("option").removeAttr("disabled");for(t=0;t<l.length;t++){var e=l[t].find("."+u).val();if("not_applied"!==e)for(var n=t+1;n<l.length;n++){var r=l[n].find("."+u),i=r.val();r.find('[value="'+e+'"]').attr("disabled","disabled"),i===e&&(r.val("not_applied"),r.trigger("change"))}}}))}).call(this,"undefined"!=typeof global?global:"undefined"!=typeof self?self:"undefined"!=typeof window?window:{})},{"../../framework-blocks/twrp-hidden/twrp-hidden":11}],8:[function(t,e,n){(function(e){"use strict";var r=this&&this.__awaiter||function(t,e,n,r){return new(n||(n=Promise))((function(i,o){function a(t){try{s(r.next(t))}catch(t){o(t)}}function d(t){try{s(r.throw(t))}catch(t){o(t)}}function s(t){var e;t.done?i(t.value):(e=t.value,e instanceof n?e:new n((function(t){t(e)}))).then(a,d)}s((r=r.apply(t,e||[])).next())}))},i=this&&this.__generator||function(t,e){var n,r,i,o,a={label:0,sent:function(){if(1&i[0])throw i[1];return i[1]},trys:[],ops:[]};return o={next:d(0),throw:d(1),return:d(2)},"function"==typeof Symbol&&(o[Symbol.iterator]=function(){return this}),o;function d(o){return function(d){return function(o){if(n)throw new TypeError("Generator is already executing.");for(;a;)try{if(n=1,r&&(i=2&o[0]?r.return:o[0]?r.throw||((i=r.return)&&i.call(r),0):r.next)&&!(i=i.call(r,o[1])).done)return i;switch(r=0,i&&(o=[2&o[0],i.value]),o[0]){case 0:case 1:i=o;break;case 4:return a.label++,{value:o[1],done:!1};case 5:a.label++,r=o[1],o=[0];continue;case 7:o=a.ops.pop(),a.trys.pop();continue;default:if(!(i=a.trys,(i=i.length>0&&i[i.length-1])||6!==o[0]&&2!==o[0])){a=0;continue}if(3===o[0]&&(!i||o[1]>i[0]&&o[1]<i[3])){a.label=o[1];break}if(6===o[0]&&a.label<i[1]){a.label=i[1],i=o;break}if(i&&a.label<i[2]){a.label=i[2],a.ops.push(o);break}i[2]&&a.ops.pop(),a.trys.pop();continue}o=e.call(t,a)}catch(t){o=[6,t],r=0}finally{n=i=0}if(5&o[0])throw o[1];return{value:o[0]?o[1]:void 0,done:!0}}([o,d])}}},o=this&&this.__importDefault||function(t){return t&&t.__esModule?t:{default:t}};Object.defineProperty(n,"__esModule",{value:!0});var a=o("undefined"!=typeof window?window.jQuery:void 0!==e?e.jQuery:null);"undefined"!=typeof window?window.jQuery:void 0!==e&&e.jQuery;var d=t("../../framework-blocks/twrp-hidden/twrp-hidden"),s=a.default("#twrp-posts-settings__js-filter-type"),u=a.default("#twrp-posts-settings__js-posts-list"),l=a.default("#twrp-posts-settings__js-posts-search-wrap");function f(){"NA"===s.val()?(l.hide("blind"),u.hide("blind")):(l.show("blind"),u.show("blind"))}a.default(f),a.default(document).on("change","#twrp-posts-settings__js-filter-type",f);var c=a.default("#twrp-posts-settings__js-posts-search");function p(t,e){return r(this,void 0,void 0,(function(){var n,r,o,a,d;return i(this,(function(i){switch(i.label){case 0:return n=wpApiSettings.root+wpApiSettings.versionString,r=n+"search?_fields=id,title&search="+t.term+"&page=1&per_page=10",[4,fetch(r)];case 1:return[4,i.sent().json()];case 2:for((o=i.sent())instanceof Array||console.error("TWRP error when fetching posts."),a=[],d=0;d<o.length;d++)a.push({value:b(o[d].title),label:b(o[d].title),id:o[d].id});return e(a),[2]}}))}))}a.default((function(){c.autocomplete({source:p,minLength:2})}));var w=a.default("#twrp-posts-settings__js-posts-ids"),h="data-post-id",_=a.default('<div class="twrp-display-list__item twrp-posts-settings__post-item"><div class="twrp-posts-settings__post-item-title"></div><button class="twrp-display-list__item-remove-btn twrp-posts-settings__js-post-remove-btn" type="button"><span class="dashicons dashicons-no"></span></button></div>');function v(t,e){!function(t,e){if(function(t){if(u.find('[data-post-id="'+t+'"]').length)return!0;return!1}(t))return;var n=_.clone(),r=function(){var t=u.attr("data-twrp-aria-remove-label");if(!t)return"";return t}().replace("%s",e);n.find(".twrp-posts-settings__post-item-title").text(e),n.find(".twrp-display-list__item-remove-btn").attr("aria-label",r),n.attr(h,t),u.append(n),d.showLeft(n,"hide_first")}(t,e),function(t){if(function(t){var e=String(w.val());if(t=Number(t),!(e&&t>0))return!1;if(-1!==e.split(";").map(n).indexOf(t))return!0;return!1;function n(t){return parseInt(t)}}(t))return;t=String(t);var e=w.val(),n="";n=e?e+";"+t:t;w.val(n)}(t),m()}a.default(document).on("click","#twrp-posts-settings__js-posts-add-btn",(function(){var t,e,n=c.autocomplete("instance");try{var r=n.selectedItem;t=r.id,e=r.label}catch(t){return}v(t,e)})),a.default(document).on("keypress","#twrp-posts-settings__js-posts-search",(function(t){if(13!==(t.keyCode?t.keyCode:t.which))return;t.preventDefault();var e,n,r=c.autocomplete("instance");try{var i=r.selectedItem;e=i.id,n=i.label}catch(t){return}v(e,n)})),a.default(document).on("click",".twrp-posts-settings__js-post-remove-btn",(function(){var t=a.default(this).closest("[data-post-id]").attr(h);if(!((t=Number(t))>0))return;!function(t){(function(t){var e=u.find('[data-post-id="'+t+'"]');e.removeAttr(h),d.hideLeft(e,"remove")})(t),function(t){var e=String(w.val());t=String(t);var n=e.split(";"),r=n.indexOf(t);-1!==r&&(n.splice(r,1),w.val(n.join(";")))}(t),m()}(t)}));var g=a.default("#twrp-posts-settings__js-no-posts-selected");function m(){u.find("[data-post-id]").length>0&&d.hideLeft(g),u.find("[data-post-id]").length>0||d.showLeft(g)}function y(){var t=u.find(".twrp-posts-settings__post-item").filter("[data-post-id]"),e=[];t.each((function(){var t=a.default(this).attr(h);(t=+t)>0&&e.push(t)})),w.val(e.join(";"))}function b(t){return a.default("<div>").html(t).text()}a.default(m),a.default((function(){u.sortable({placeholder:"twrp-display-list__placeholder",stop:y})}))}).call(this,"undefined"!=typeof global?global:"undefined"!=typeof self?self:"undefined"!=typeof window?window:{})},{"../../framework-blocks/twrp-hidden/twrp-hidden":11}],9:[function(t,e,n){(function(e){"use strict";var r=this&&this.__importDefault||function(t){return t&&t.__esModule?t:{default:t}};Object.defineProperty(n,"__esModule",{value:!0});var i=r("undefined"!=typeof window?window.jQuery:void 0!==e?e.jQuery:null);"undefined"!=typeof window?window.jQuery:void 0!==e&&e.jQuery;var o=t("../../framework-blocks/twrp-hidden/twrp-hidden"),a=i.default("#twrp-search-setting__js-search-input"),d=i.default("#twrp-search-setting__js-words-warning");function s(){var t=String(a.val()).length;0!==t&&t<3?o.showUp(d):o.hideUp(d)}i.default(s),i.default(document).on("change","#twrp-search-setting__js-search-input",s)}).call(this,"undefined"!=typeof global?global:"undefined"!=typeof self?self:"undefined"!=typeof window?window:{})},{"../../framework-blocks/twrp-hidden/twrp-hidden":11}],10:[function(t,e,n){(function(e){"use strict";var r=this&&this.__importDefault||function(t){return t&&t.__esModule?t:{default:t}};Object.defineProperty(n,"__esModule",{value:!0});var i=r("undefined"!=typeof window?window.jQuery:void 0!==e?e.jQuery:null);"undefined"!=typeof window?window.jQuery:void 0!==e&&e.jQuery;var o=t("../../framework-blocks/twrp-hidden/twrp-hidden"),a=i.default("#twrp-statuses-settings__js-apply-select"),d=i.default("#twrp-statuses-settings__js-statuses-wrapper");function s(){"not_applied"===a.val()?o.hideUp(d):o.showUp(d)}i.default(document).on("change","#twrp-statuses-settings__js-apply-select",s),i.default(s)}).call(this,"undefined"!=typeof global?global:"undefined"!=typeof self?self:"undefined"!=typeof window?window:{})},{"../../framework-blocks/twrp-hidden/twrp-hidden":11}],11:[function(t,e,n){(function(t){"use strict";var e=this&&this.__importDefault||function(t){return t&&t.__esModule?t:{default:t}};Object.defineProperty(n,"__esModule",{value:!0}),n.showLeft=n.hideLeft=n.hideUp=n.showUp=void 0;var r=e("undefined"!=typeof window?window.jQuery:void 0!==t?t.jQuery:null);"undefined"!=typeof window?window.jQuery:void 0!==t&&t.jQuery;var i=500;function o(t){r.default(t).addClass("twrp-hidden")}function a(t){r.default(t).removeClass("twrp-hidden").css("display","")}n.hideUp=function(t){r.default(t).slideUp({duration:i,complete:function(){o(t)}})},n.showUp=function(t){r.default(t).slideDown({duration:i,complete:function(){a(t)}})},n.hideLeft=function(t,e){void 0===e&&(e="");var n=function(){o(t)};"remove"===e&&(n=function(){!function(t){r.default(t).remove()}(t)}),r.default(t).hide({effect:"blind",duration:i,direction:"left",complete:n})},n.showLeft=function(t,e){void 0===e&&(e=""),"hide_first"===e&&t.addClass("twrp-hidden"),r.default(t).show({effect:"blind",duration:i,direction:"left",complete:function(){a(t)}})}}).call(this,"undefined"!=typeof global?global:"undefined"!=typeof self?self:"undefined"!=typeof window?window:{})},{}],12:[function(t,e,n){(function(e){"use strict";var r=this&&this.__importDefault||function(t){return t&&t.__esModule?t:{default:t}};Object.defineProperty(n,"__esModule",{value:!0});var i=r("undefined"!=typeof window?window.jQuery:void 0!==e?e.jQuery:null);"undefined"!=typeof window?window.jQuery:void 0!==e&&e.jQuery;var o=t("../framework-blocks/twrp-hidden/twrp-hidden"),a=i.default("#twrpb-general-select__human_readable_date-setting-true"),d=i.default("#twrpb-general-select__date_format-wrapper");function s(){a.is(":checked")?o.hideUp(d):o.showUp(d)}i.default(s),i.default(document).on("click",s);var u="twrpb-general-settings__icon-preview",l='<span class="'+u+'"><svg><use/></svg></span>',f=["user_icon","date_icon","category_icon","comments_icon","comments_disabled_icon","views_icon"];function c(t){var e=i.default('select[name="'+t+'"');if(0!==e.length){var n=e.parent(),r=String(e.val());n.find("."+u).remove(),i.default(l).insertBefore(e),n.find("use").attr("href","#"+r)}}i.default((function(){for(var t=0,e=f;t<e.length;t++){c(e[t])}})),i.default(document).on("change",function(){for(var t="",e=0,n=f;e<n.length;e++){t&&(t+=", "),t=t+'select[name="'+n[e]+'"]'}return t}(),(function(){var t=String(i.default(this).attr("name"));if(!t)return;c(t)}));var p="twrpb-general-select__rating_icons_preview",w=l,h=null;function _(){null===h&&function(){var t=i.default("#twrpb-general-settings__rating_pack_icons-wrapper");if(0!==t.length){var e=t.attr("data-twrp-rating-packs");if("string"==typeof e)try{h=JSON.parse(e)}catch(t){}}}();var t=i.default('select[name="rating_pack_icons"]');if(0!==t.length){var e=t.parent(),n=String(t.val()),r=h[n].empty,o=h[n].half,a=h[n].full;e.find("."+p).remove(),e.prepend('<span class="twrpb-general-select__rating_icons_preview"></span>');var d=e.find("."+p);i.default(w).appendTo(d).find("use").attr("href","#"+a),i.default(w).appendTo(d).find("use").attr("href","#"+o),i.default(w).appendTo(d).find("use").attr("href","#"+r)}}i.default(_),i.default(document).on("change",'select[name="rating_pack_icons"]',_)}).call(this,"undefined"!=typeof global?global:"undefined"!=typeof self?self:"undefined"!=typeof window?window:{})},{"../framework-blocks/twrp-hidden/twrp-hidden":11}],13:[function(t,e,n){"use strict";Object.defineProperty(n,"__esModule",{value:!0}),t("./framework-blocks/twrp-hidden/twrp-hidden"),t("./common-blocks/twrp-collapsible/twrp-collapsible"),t("./common-blocks/twrp-advanced-args/twrp-advanced-args"),t("./common-blocks/twrp-cat-settings/twrp-cat-settings"),t("./common-blocks/twrp-author-settings/twrp-author-settings"),t("./common-blocks/twrp-comments-settings/twrp-comments-settings"),t("./common-blocks/twrp-search-setting/twrp-search-setting"),t("./common-blocks/twrp-statuses-settings/twrp-statuses-settings"),t("./common-blocks/twrp-date-settings/twrp-date-settings"),t("./common-blocks/twrp-posts-settings/twrp-posts-settings"),t("./common-blocks/twrp-order-setting/twrp-order-setting"),t("./widget-blocks/twrp-widget-form"),t("./widget-blocks/twrp-widget-components"),t("./widget-blocks/twrp-color-picker"),t("./widget-blocks/twrp-icon-select-preview"),t("./general-settings/twrp-general-settings"),n.default={}},{"./common-blocks/twrp-advanced-args/twrp-advanced-args":1,"./common-blocks/twrp-author-settings/twrp-author-settings":2,"./common-blocks/twrp-cat-settings/twrp-cat-settings":3,"./common-blocks/twrp-collapsible/twrp-collapsible":4,"./common-blocks/twrp-comments-settings/twrp-comments-settings":5,"./common-blocks/twrp-date-settings/twrp-date-settings":6,"./common-blocks/twrp-order-setting/twrp-order-setting":7,"./common-blocks/twrp-posts-settings/twrp-posts-settings":8,"./common-blocks/twrp-search-setting/twrp-search-setting":9,"./common-blocks/twrp-statuses-settings/twrp-statuses-settings":10,"./framework-blocks/twrp-hidden/twrp-hidden":11,"./general-settings/twrp-general-settings":12,"./widget-blocks/twrp-color-picker":14,"./widget-blocks/twrp-icon-select-preview":15,"./widget-blocks/twrp-widget-components":16,"./widget-blocks/twrp-widget-form":17}],14:[function(t,e,n){(function(t){"use strict";var e=this&&this.__importDefault||function(t){return t&&t.__esModule?t:{default:t}};Object.defineProperty(n,"__esModule",{value:!0});var r=e("undefined"!=typeof window?window.jQuery:void 0!==t?t.jQuery:null);r.default((function(){r.default(".twrp-color-picker").each((function(){var t=r.default(this).parent().find("input"),e=t.val();e||(e=null);var n=Pickr.create({el:this,theme:"classic",container:"body",default:e,appClass:"twrp-pickr",swatches:["rgba(244, 67, 54, 1)","rgba(233, 30, 99, 1)","rgba(156, 39, 176, 1)","rgba(103, 58, 183, 1)","rgba(63, 81, 181, 1)","rgba(33, 150, 243, 1)","rgba(3, 169, 244, 1)","rgba(0, 188, 212, 1)","rgba(0, 150, 136, 1)","rgba(76, 175, 80, 1)","rgba(139, 195, 74, 1)","rgba(205, 220, 57, 1)","rgba(255, 235, 59, 1)","rgba(255, 193, 7, 1)"],defaultRepresentation:"RGBA",components:{preview:!0,opacity:!0,hue:!0,interaction:{input:!0,cancel:!0,clear:!0,save:!0}}}).on("save",(function(e){e?t.val(e.toRGBA().toString(0)):t.val(""),t.change(),n.hide()}));n.setColorRepresentation("RGBA")}))}))}).call(this,"undefined"!=typeof global?global:"undefined"!=typeof self?self:"undefined"!=typeof window?window:{})},{}],15:[function(t,e,n){(function(t){"use strict";var e=this&&this.__importDefault||function(t){return t&&t.__esModule?t:{default:t}};Object.defineProperty(n,"__esModule",{value:!0});var r=e("undefined"!=typeof window?window.jQuery:void 0!==t?t.jQuery:null);r.default(document).on("change",'[name*="author_icon"]',(function(){var t=r.default(this);0===t.parent().find(".twrp-widget-icon-preview").length&&t.parent().append('<div class="twrp-widget-icon-preview"></div>');var e=t.parent().find(".twrp-widget-icon-preview"),n=t.val();e.html(""),e.append('<svg><use xlink:href="#'+n+'" /></svg>')}))}).call(this,"undefined"!=typeof global?global:"undefined"!=typeof self?self:"undefined"!=typeof window?window:{})},{}],16:[function(t,e,n){(function(t){"use strict";var e=this&&this.__importDefault||function(t){return t&&t.__esModule?t:{default:t}};Object.defineProperty(n,"__esModule",{value:!0});var r=e("undefined"!=typeof window?window.jQuery:void 0!==t?t.jQuery:null);"undefined"!=typeof window?window.jQuery:void 0!==t&&t.jQuery,r.default((function(){r.default(".twrp-widget-components").tabs({active:0})}))}).call(this,"undefined"!=typeof global?global:"undefined"!=typeof self?self:"undefined"!=typeof window?window:{})},{}],17:[function(t,e,n){(function(t){"use strict";var e=this&&this.__awaiter||function(t,e,n,r){return new(n||(n=Promise))((function(i,o){function a(t){try{s(r.next(t))}catch(t){o(t)}}function d(t){try{s(r.throw(t))}catch(t){o(t)}}function s(t){var e;t.done?i(t.value):(e=t.value,e instanceof n?e:new n((function(t){t(e)}))).then(a,d)}s((r=r.apply(t,e||[])).next())}))},r=this&&this.__generator||function(t,e){var n,r,i,o,a={label:0,sent:function(){if(1&i[0])throw i[1];return i[1]},trys:[],ops:[]};return o={next:d(0),throw:d(1),return:d(2)},"function"==typeof Symbol&&(o[Symbol.iterator]=function(){return this}),o;function d(o){return function(d){return function(o){if(n)throw new TypeError("Generator is already executing.");for(;a;)try{if(n=1,r&&(i=2&o[0]?r.return:o[0]?r.throw||((i=r.return)&&i.call(r),0):r.next)&&!(i=i.call(r,o[1])).done)return i;switch(r=0,i&&(o=[2&o[0],i.value]),o[0]){case 0:case 1:i=o;break;case 4:return a.label++,{value:o[1],done:!1};case 5:a.label++,r=o[1],o=[0];continue;case 7:o=a.ops.pop(),a.trys.pop();continue;default:if(!(i=a.trys,(i=i.length>0&&i[i.length-1])||6!==o[0]&&2!==o[0])){a=0;continue}if(3===o[0]&&(!i||o[1]>i[0]&&o[1]<i[3])){a.label=o[1];break}if(6===o[0]&&a.label<i[1]){a.label=i[1],i=o;break}if(i&&a.label<i[2]){a.label=i[2],a.ops.push(o);break}i[2]&&a.ops.pop(),a.trys.pop();continue}o=e.call(t,a)}catch(t){o=[6,t],r=0}finally{n=i=0}if(5&o[0])throw o[1];return{value:o[0]?o[1]:void 0,done:!0}}([o,d])}}},i=this&&this.__importDefault||function(t){return t&&t.__esModule?t:{default:t}};Object.defineProperty(n,"__esModule",{value:!0});var o=i("undefined"!=typeof window?window.jQuery:void 0!==t?t.jQuery:null);"undefined"!=typeof window?window.jQuery:void 0!==t&&t.jQuery;var a="data-twrp-widget-id",d="data-twrp-query-id",s="data-twrp-selected-artblock",u=".twrp-widget-form__selected-queries-list",l=".twrp-widget-form__selected-queries",f=".twrp-widget-form__article-block-settings";o.default(document).on("click",".twrp-widget-form__select-query-to-add-btn",(function(){var t=o.default(this).closest(".twrp-widget-form"),e=t.attr(a),n=String(t.find(".twrp-widget-form__select-query-to-add").val()),r=k(t);-1===r.indexOf(n)&&(r.push(n),Q(e,r),g(e,n)||_(e,n))})),o.default(document).on("click",".twrp-widget-form__remove-selected-query",(function(){var t=m(o.default(this)),e=y(o.default(this));(function(t,e){j(t,e).remove()})(t,e),h(t)}));var c=o.default();function p(){c=o.default(document).find("["+a+"]")}function w(){c.each((function(){!function(t){for(var e=b(t),n=k(e),r=0;r<n.length;r++)g(t,n[r])||_(t,n[r]);e.find("["+d+"]").each((function(){var t=o.default(this).attr(d);-1===n.indexOf(t)&&o.default(this).remove()}))}(o.default(this).attr(a))}))}function h(t){var e=b(t).find(u).find(".twrp-widget-form__selected-query"),n=[];e.each((function(){var t=o.default(this).attr(d);t&&n.push(t)})),Q(t,n)}function _(t,n){return e(this,void 0,void 0,(function(){var e,i,o;return r(this,(function(r){switch(r.label){case 0:return[4,v(t,n)];case 1:return e=r.sent(),i=b(t),g(t,n)||((o=i.find(".twrp-widget-form__selected-queries-list")).append(e),o.trigger("twrp-query-list-added",[t,n])),[2]}}))}))}function v(t,e){return o.default.ajax({url:ajaxurl,method:"POST",data:{action:"twrp_widget_create_query_setting",widget_id:t,query_id:e}})}function g(t,e){return!!j(t,e).length}function m(t){return o.default(t).closest("["+a+"]").attr(a)}function y(t){return o.default(t).closest("["+d+"]").attr(d)}function b(t){return o.default(document).find("["+a+'="'+t+'"]')}function j(t,e){var n=b(t);return o.default(n).find("["+d+'="'+e+'"]')}function k(t){var e=t.find(l),n=String(e.val()).split(";");return n=n.filter((function(t){return Boolean(t)}))}function Q(t,e){var n=b(t).find(l),r=e.join(";");n.val(r)}function M(){h(m(this))}function U(){p(),c.each((function(){var t=o.default(this).attr(a);o.default(this).find("["+d+"]").each((function(){var e=o.default(this).attr(d);x(t,e)}))}))}function x(t,e){var n=j(t,e);n.accordion("instance")?n.accordion("refresh"):n.accordion({collapsible:!0,active:!1,heightStyle:"content"})}function S(t,e,n){return P(t,e,n)?function(t,e,n){if(P(t,e,n))return O[t][e][n];return!1}(t,e,n):o.default.ajax({url:ajaxurl,method:"POST",data:{action:"twrp_widget_create_artblock_settings",artblock_id:n,widget_id:t,query_id:e}})}o.default(p),o.default(document).on("click",p),o.default(w),o.default(document).on("click",w),o.default(document).on("twrp-query-list-added",(function(t,e){!function(t){var e=b(t),n=e.find(u),r=e.find("["+d+"]"),i=k(e);r.detach();for(var o=0;o<i.length;o++)for(var a=0;a<r.length;a++)i[o]===r.eq(a).attr(d)&&n.append(r.eq(a))}(e)})),o.default(document).on("click",(function(){c.each((function(){o.default(this).find(u).sortable({update:M})}))})),o.default(U),o.default(document).on("twrp-query-list-added widget-updated widget-added",(function(t,e,n){"twrp-query-list-added"===t.type?x(e,n):U()})),o.default(document).on("change",".twrp-widget-form__article-block-selector",(function(){return e(this,void 0,void 0,(function(){var t,e,n,i;return r(this,(function(r){switch(r.label){case 0:return t=m(o.default(this)),e=y(o.default(this)),n=String(o.default(this).val()),[4,S(t,e,n)];case 1:return i=r.sent(),function(t,e,n){var r=j(t,e),i=r.find(f),o=r.find(".twrp-widget-form__article-block-settings-container");i.detach(),function(t,e,n){var r=n.attr(s);if(!t||!e||!r)return;O[t]||(O[t]=[]);O[t][e]||(O[t][e]=[]);O[t][e][r]=n}(t,e,i),o.append(n)}(t,e,i),[2]}}))}))}));var O=Array();function P(t,e,n){return!!O[t]&&(!!O[t][e]&&(!!O[t][e][n]&&O[t][e][n].attr(s)===n))}}).call(this,"undefined"!=typeof global?global:"undefined"!=typeof self?self:"undefined"!=typeof window?window:{})},{}]},{},[13]);
//# sourceMappingURL=script.js.map
