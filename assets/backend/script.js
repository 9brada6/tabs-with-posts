!function t(e,n,i){function r(o,d){if(!n[o]){if(!e[o]){var s="function"==typeof require&&require;if(!d&&s)return s(o,!0);if(a)return a(o,!0);var u=new Error("Cannot find module '"+o+"'");throw u.code="MODULE_NOT_FOUND",u}var l=n[o]={exports:{}};e[o][0].call(l.exports,(function(t){return r(e[o][1][t]||t)}),l,l.exports,t,e,n,i)}return n[o].exports}for(var a="function"==typeof require&&require,o=0;o<i.length;o++)r(i[o]);return r}({1:[function(t,e,n){(function(t){"use strict";var e=this&&this.__importDefault||function(t){return t&&t.__esModule?t:{default:t}};Object.defineProperty(n,"__esModule",{value:!0});var i=e("undefined"!=typeof window?window.jQuery:void 0!==t?t.jQuery:null);"undefined"!=typeof window?window.jQuery:void 0!==t&&t.jQuery,i.default((function(){i.default(".twrpb-collapsible").each((function(){var t=i.default(this),e="1"===t.attr("data-twrpb-is-collapsed")&&0;t.accordion({active:e,heightStyle:"content",collapsible:!0,icons:!1})}))}))}).call(this,"undefined"!=typeof global?global:"undefined"!=typeof self?self:"undefined"!=typeof window?window:{})},{}],2:[function(t,e,n){(function(t){"use strict";var e=this&&this.__importDefault||function(t){return t&&t.__esModule?t:{default:t}};Object.defineProperty(n,"__esModule",{value:!0}),n.showLeft=n.hideLeft=n.hideUp=n.showUp=n.toggleDisplay=void 0;var i=e("undefined"!=typeof window?window.jQuery:void 0!==t?t.jQuery:null);"undefined"!=typeof window?window.jQuery:void 0!==t&&t.jQuery;var r=500;function a(t){i.default(t).slideUp({duration:r,complete:function(){d(t)}})}function o(t){i.default(t).slideDown({duration:r,complete:function(){s(t)}})}function d(t){i.default(t).addClass("twrpb-hidden")}function s(t){i.default(t).removeClass("twrpb-hidden").css("display","")}n.toggleDisplay=function(t){t.hasClass("twrpb-hidden")?o(t):a(t)},n.hideUp=a,n.showUp=o,n.hideLeft=function(t,e){void 0===e&&(e="");var n=function(){d(t)};"remove"===e&&(n=function(){!function(t){i.default(t).remove()}(t)}),i.default(t).hide({effect:"blind",duration:r,direction:"left",complete:n})},n.showLeft=function(t,e){void 0===e&&(e=""),"hide_first"===e&&t.addClass("twrpb-hidden"),i.default(t).show({effect:"blind",duration:r,direction:"left",complete:function(){s(t)}})}}).call(this,"undefined"!=typeof global?global:"undefined"!=typeof self?self:"undefined"!=typeof window?window:{})},{}],3:[function(t,e,n){(function(e){"use strict";var i=this&&this.__importDefault||function(t){return t&&t.__esModule?t:{default:t}};Object.defineProperty(n,"__esModule",{value:!0});var r=i("undefined"!=typeof window?window.jQuery:void 0!==e?e.jQuery:null),a=t("../admin-blocks/twrpb-hidden/twrpb-hidden");r.default(document).on("click",".twrpb-icons-spoiler__btn",(function(){var t=r.default(this).parent(".twrpb-icons-spoiler__category").find(".twrpb-icons-spoiler__spoiler");a.toggleDisplay(t)}))}).call(this,"undefined"!=typeof global?global:"undefined"!=typeof self?self:"undefined"!=typeof window?window:{})},{"../admin-blocks/twrpb-hidden/twrpb-hidden":2}],4:[function(t,e,n){(function(e){"use strict";var i=this&&this.__importDefault||function(t){return t&&t.__esModule?t:{default:t}};Object.defineProperty(n,"__esModule",{value:!0});var r=i("undefined"!=typeof window?window.jQuery:void 0!==e?e.jQuery:null);"undefined"!=typeof window?window.jQuery:void 0!==e&&e.jQuery;var a=t("../admin-blocks/twrpb-hidden/twrpb-hidden");function o(){var t=r.default("#twrpb-general-settings__human_readable_date-setting-true"),e=r.default("#twrpb-general-settings__date_format-wrapper");t.is(":checked")?a.hideUp(e):a.showUp(e)}r.default(o),r.default(document).on("click",o);var d="twrpb-general-settings__icon-preview",s='<span class="'+d+'"><svg><use/></svg></span>',u=["author_icon","date_icon","category_icon","comments_icon","comments_disabled_icon","views_icon"];function l(t){var e=r.default('select[name="'+t+'"');if(0!==e.length){var n=e.parent(),i=String(e.val());n.find("."+d).remove(),r.default(s).insertBefore(e),n.find("use").attr("href","#"+i)}}r.default((function(){for(var t=0,e=u;t<e.length;t++){l(e[t])}})),r.default(document).on("change",function(){for(var t="",e=0,n=u;e<n.length;e++){t&&(t+=", "),t=t+'select[name="'+n[e]+'"]'}return t}(),(function(){var t=String(r.default(this).attr("name"));if(!t)return;l(t)}));var f="twrpb-general-select__rating_icons_preview",c=s,p=null;function w(){null===p&&function(){var t=r.default("#twrpb-general-settings__rating_pack_icons-wrapper");if(0!==t.length){var e=t.attr("data-twrpb-rating-packs");if("string"==typeof e)try{p=JSON.parse(e)}catch(t){}}}();var t=r.default('select[name="rating_pack_icons"]');if(0!==t.length){var e=t.parent(),n=String(t.val());if(n in p&&"empty"in p[n]&&"half"in p[n]&&"full"in p[n]){var i=p[n].empty,a=p[n].half,o=p[n].full;e.find("."+f).remove(),e.prepend('<span class="twrpb-general-select__rating_icons_preview"></span>');var d=e.find("."+f);r.default(c).appendTo(d).find("use").attr("href","#"+o),r.default(c).appendTo(d).find("use").attr("href","#"+a),r.default(c).appendTo(d).find("use").attr("href","#"+i)}}}r.default(w),r.default(document).on("change",'select[name="rating_pack_icons"]',w);var h="#twrpb-general-settings__comments_icon-setting",b="#twrpb-general-settings__comments_disabled_icon-setting",_=null,g="comments_disabled_icon_auto_select";function v(){if(null===_&&function(){var t=r.default("#twrpb-general-settings__comments_disabled_icon-wrapper");if(0!==t.length){var e=t.attr("data-twrpb-related-comment-icons");if("string"==typeof e)try{_=JSON.parse(e)}catch(t){}}}(),null!==_){var t=String(r.default(h).val());if(_[t]){var e=String(_[t]);r.default(b).val(e).trigger("change")}}}r.default(m),r.default(document).on("change",h,(function(){j()&&v()})),r.default(document).on("change",'input[name="'+g+'"]',m),r.default(document).on("submit",(function(){k()}));var y=!0;function m(){j()?(r.default(b).prop("disabled",!0),y||v(),y=!1):k()}function j(){var t=String(r.default('input[name="'+g+'"]:checked').val());return 1===parseInt(t)||"true"===t}function k(){r.default(b).removeProp("disabled")}}).call(this,"undefined"!=typeof global?global:"undefined"!=typeof self?self:"undefined"!=typeof window?window:{})},{"../admin-blocks/twrpb-hidden/twrpb-hidden":2}],5:[function(t,e,n){(function(t){"use strict";var e=this&&this.__importDefault||function(t){return t&&t.__esModule?t:{default:t}};Object.defineProperty(n,"__esModule",{value:!0}),e("undefined"!=typeof window?window.jQuery:void 0!==t?t.jQuery:null).default((function(){var t=document.getElementById("twrpb-advanced-args__textarea");t&&CodeMirror.fromTextArea(t,{mode:"application/json",theme:"material-darker",indentUnit:4,indentWithTabs:!0,lineNumbers:!0,autoRefresh:!0})}))}).call(this,"undefined"!=typeof global?global:"undefined"!=typeof self?self:"undefined"!=typeof window?window:{})},{}],6:[function(t,e,n){(function(e){"use strict";var i=this&&this.__importDefault||function(t){return t&&t.__esModule?t:{default:t}};Object.defineProperty(n,"__esModule",{value:!0});var r=i("undefined"!=typeof window?window.jQuery:void 0!==e?e.jQuery:null);"undefined"!=typeof window?window.jQuery:void 0!==e&&e.jQuery;var a=t("../../admin-blocks/twrpb-hidden/twrpb-hidden"),o=r.default("#twrpb-author-settings__select_type"),d=r.default("#twrpb-author-settings__author-search-wrap"),s=r.default("#twrpb-author-settings__js-authors-list");r.default(document).on("change","#twrpb-author-settings__select_type",(function(){var t=o.val();"IN"===t||"OUT"===t?(a.showUp(d),a.showUp(s)):(a.hideUp(d),a.hideUp(s))}));var u=r.default("#twrpb-author-settings__js-same-author-notice");function l(){"SAME"===o.val()?a.showUp(u):a.hideUp(u)}r.default(l),r.default(document).on("change","#twrpb-author-settings__select_type",l),r.default((function(){f.autocomplete({source:c,minLength:2})}));var f=r.default("#twrpb-author-settings__js-author-search");function c(t,e){var n=new wp.api.collections.Users,i=[];function a(){for(var t=0;t<n.length;t++){var a=void 0,o=void 0;try{d=n.models[t].attributes.name,a=r.default("<div>").html(d).text(),o=n.models[t].attributes.id}catch(t){continue}i.push({value:a,label:a,id:o})}var d;e(i)}n.fetch({data:{_fields:"id,name",search:t.term}}),n.once("sync",a),n.once("error",(function(){console.error("TWRP Backbone error when getting users."),a()})),n.once("invalid",(function(){console.error("TWRP Backbone invalid when getting users."),a()}))}var p=r.default("#twrpb-author-settings__js-author-ids"),w=r.default("#twrpb-author-settings__js-authors-list"),h="data-twrpb-aria-remove-label",b=r.default('<div class="twrpb-display-list__item twrpb-author-settings__author-item"><div class="twrpb-author-settings__author-item-name"></div><button class="twrpb-display-list__item-remove-btn twrpb-author-settings__js-author-remove-btn" type="button"><span class="dashicons dashicons-no"></span></button></div>'),_="data-author-id";function g(t,e){!function(t,e){if(function(t){if(w.find('[data-author-id="'+t+'"]').length)return!0;return!1}(t))return;var n=b.clone(),i=function(){var t=w.attr(h);if(!t)return"";return t}().replace("%s",e);n.find(".twrpb-author-settings__author-item-name").text(e),n.find(".twrpb-display-list__item-remove-btn").attr("aria-label",i),n.attr(_,t),w.append(n),a.showLeft(n,"hide_first")}(t,e),function(t){if(function(t){var e=String(p.val());if(t=Number(t),!(e&&t>0))return!1;if(-1!==e.split(";").map(n).indexOf(t))return!0;return!1;function n(t){return parseInt(t)}}(t))return;t=String(t);var e=p.val(),n="";n=e?e+";"+t:t;p.val(n)}(t),y()}r.default(document).on("click","#twrpb-author-settings__js-author-add-btn",(function(){var t,e,n=f.autocomplete("instance");try{var i=n.selectedItem;t=i.id,e=i.label}catch(t){return}g(t,e)})),r.default(document).on("keypress","#twrpb-author-settings__js-author-search",(function(t){if(13!==(t.keyCode?t.keyCode:t.which))return;t.preventDefault();var e,n,i=f.autocomplete("instance");try{var r=i.selectedItem;e=r.id,n=r.label}catch(t){return}g(e,n)})),r.default(document).on("click",".twrpb-author-settings__js-author-remove-btn",(function(){var t=Number(r.default(this).closest("[data-author-id]").attr(_));if(!(t>0))return;!function(t){(function(t){var e=w.find('[data-author-id="'+t+'"]');e.removeAttr(_),a.hideLeft(e,"remove")})(t),function(t){var e=String(p.val());t=String(t);var n=e.split(";"),i=n.indexOf(t);-1!==i&&(n.splice(i,1),p.val(n.join(";")))}(t),y()}(t)}));var v=r.default("#twrpb-author-settings__js-no-authors-selected");function y(){w.find("[data-author-id]").length>0&&a.hideLeft(v),w.find("[data-author-id]").length>0||a.showLeft(v)}function m(){var t=w.find(".twrpb-author-settings__author-item"),e=[];t.each((function(){var t=Number(r.default(this).attr(_));t>0&&e.push(t)})),p.val(e.join(";"))}r.default(y),r.default((function(){w.sortable({placeholder:"twrpb-display-list__placeholder",stop:m})}))}).call(this,"undefined"!=typeof global?global:"undefined"!=typeof self?self:"undefined"!=typeof window?window:{})},{"../../admin-blocks/twrpb-hidden/twrpb-hidden":2}],7:[function(t,e,n){(function(e){"use strict";var i=this&&this.__importDefault||function(t){return t&&t.__esModule?t:{default:t}};Object.defineProperty(n,"__esModule",{value:!0});var r=i("undefined"!=typeof window?window.jQuery:void 0!==e?e.jQuery:null);"undefined"!=typeof window?window.jQuery:void 0!==e&&e.jQuery;var a=t("../../admin-blocks/twrpb-hidden/twrpb-hidden"),o=r.default("#twrpb-cat-settings__js-cat-dropdown"),d=r.default("#twrpb-cat-settings__cat-ids"),s="data-cat-id",u=r.default("#twrpb-cat-settings__cat-list-wrap"),l=u.find(".twrpb-display-list__empty-msg"),f=r.default('<div class="twrpb-display-list__item twrpb-cat-settings__cat-list-item"><div class="twrpb-display-list__item-name twrpb-cat-settings__cat-item-name"></div><button class="twrpb-display-list__item-remove-btn twrpb-cat-settings__cat-remove-btn" type="button"><span class="dashicons dashicons-no"></span></button></div>');function c(){u.find("[data-cat-id]").length>0||a.showLeft(l),u.find("[data-cat-id]").length>0&&a.hideLeft(l)}r.default(document).on("click","#twrpb-cat-settings__add-cat-btn",(function(){var t=o.find(":selected").val(),e=b(o.find(":selected").text());t>0&&(function(t){var e,n=d.val();e=n&&t?n+";"+t:t;(function(t){var e=d.val();if(!e)return!1;if(-1!==e.split(";").indexOf(t))return!0;return!1})(t)||d.val(e)}(t),function(t,e){if(!function(t){var e=u.find(".twrpb-cat-settings__cat-list-item"),n=!1;if(e.each((function(){t===r.default(this).attr(s)&&(n=!0)})),n)return!0;return!1}(t)){var n=f.clone(),i=function(){var t=u.attr("data-twrpb-aria-remove-label");if(!t)return"";return t}().replace("%s",b(e));n.find(".twrpb-cat-settings__cat-item-name").text(b(e)),n.find(".twrpb-display-list__item-remove-btn").attr("aria-label",i),n.attr(s,t),u.append(n),c(),a.showLeft(n,"hide_first")}}(t,e))})),r.default(document).on("click",".twrpb-cat-settings__cat-remove-btn",(function(){var t=String(r.default(this).closest("[data-cat-id]").attr(s));(function(t){var e=u.find('[data-cat-id="'+t+'"]');e.removeAttr(s),c(),a.hideLeft(e,"remove")})(t),function(t){var e=String(d.val()).split(";"),n=e.indexOf(String(t));-1!==n&&(e.splice(n,1),d.val(e.join(";")))}(t)})),r.default((function(){u.sortable({placeholder:"twrpb-display-list__placeholder",stop:_})}));var p=r.default("#twrpb-cat-settings__type"),w=r.default("#twrpb-cat-settings__js-select-relation-wrap"),h=r.default("#twrpb-cat-settings__js-settings-wrapper");function b(t){return t=(t=t.replace(/\([^(]*\)$/,"")).trim()}function _(){var t=u.find(".twrpb-cat-settings__cat-list-item"),e="";t.each((function(){var t=String(r.default(this).attr(s));e?e+=";"+t:e=t})),d.val(e)}r.default(document).on("change","#twrpb-cat-settings__type",(function(){var t=p.val();"NA"===t?(a.hideUp(h),a.hideUp(w)):"IN"===t?(w.is(":hidden")?(w.show(),a.showUp(h),w.hide()):a.showUp(h),a.showUp(w)):(a.showUp(h),a.hideUp(w))}))}).call(this,"undefined"!=typeof global?global:"undefined"!=typeof self?self:"undefined"!=typeof window?window:{})},{"../../admin-blocks/twrpb-hidden/twrpb-hidden":2}],8:[function(t,e,n){(function(e){"use strict";var i=this&&this.__importDefault||function(t){return t&&t.__esModule?t:{default:t}};Object.defineProperty(n,"__esModule",{value:!0});var r=i("undefined"!=typeof window?window.jQuery:void 0!==e?e.jQuery:null);"undefined"!=typeof window?window.jQuery:void 0!==e&&e.jQuery;var a=t("../../admin-blocks/twrpb-hidden/twrpb-hidden"),o=r.default("#twrpb-comments-settings__js-comparator"),d=r.default("#twrpb-comments-settings__js-num_comments");function s(){"NA"===o.val()?a.hideUp(d):a.showUp(d)}r.default(s),r.default(document).on("change","#twrpb-comments-settings__js-comparator",s)}).call(this,"undefined"!=typeof global?global:"undefined"!=typeof self?self:"undefined"!=typeof window?window:{})},{"../../admin-blocks/twrpb-hidden/twrpb-hidden":2}],9:[function(t,e,n){(function(e){"use strict";var i=this&&this.__importDefault||function(t){return t&&t.__esModule?t:{default:t}};Object.defineProperty(n,"__esModule",{value:!0});var r=i("undefined"!=typeof window?window.jQuery:void 0!==e?e.jQuery:null);"undefined"!=typeof window?window.jQuery:void 0!==e&&e.jQuery;var a=t("../../admin-blocks/twrpb-hidden/twrpb-hidden"),o=r.default("#twrpb-date-settings__after"),d=r.default("#twrpb-date-settings__before");r.default((function(){if(t=document.createElement("input"),e="not-a-date",t.setAttribute("type","date"),t.setAttribute("value",e),t.value!==e)return;var t,e;var n={dateFormat:"yy-mm-dd",changeMonth:!0,changeYear:!0,beforeShow:function(){r.default("#ui-datepicker-div").addClass("twrpb-jqueryui-datepicker")}};o.datepicker(n),d.datepicker(n)}));var s=r.default("#twrpb-date-settings__js-date-type"),u=r.default("#twrpb-date-settings__js-last-period-wrapper"),l=r.default("#twrpb-date-settings__js-between-wrapper");function f(){"LT"===s.val()?a.showUp(u):a.hideUp(u)}function c(){"FT"===s.val()?a.showUp(l):a.hideUp(l)}r.default(f),r.default(document).on("change","#twrpb-date-settings__js-date-type",f),r.default(c),r.default(document).on("change","#twrpb-date-settings__js-date-type",c)}).call(this,"undefined"!=typeof global?global:"undefined"!=typeof self?self:"undefined"!=typeof window?window:{})},{"../../admin-blocks/twrpb-hidden/twrpb-hidden":2}],10:[function(t,e,n){(function(e){"use strict";var i=this&&this.__importDefault||function(t){return t&&t.__esModule?t:{default:t}};Object.defineProperty(n,"__esModule",{value:!0});var r=i("undefined"!=typeof window?window.jQuery:void 0!==e?e.jQuery:null),a=t("../../admin-blocks/twrpb-hidden/twrpb-hidden"),o="#twrpb-meta-setting__js-meta-type",d="#twrpb-meta-setting__js-meta-value";function s(){var t=r.default(o).val();"NOT EXISTS"===t||"EXISTS"===t?a.hideUp(r.default(d)):a.showUp(r.default(d))}r.default(s),r.default(document).on("change",o,s)}).call(this,"undefined"!=typeof global?global:"undefined"!=typeof self?self:"undefined"!=typeof window?window:{})},{"../../admin-blocks/twrpb-hidden/twrpb-hidden":2}],11:[function(t,e,n){(function(e){"use strict";var i=this&&this.__importDefault||function(t){return t&&t.__esModule?t:{default:t}};Object.defineProperty(n,"__esModule",{value:!0});var r=i("undefined"!=typeof window?window.jQuery:void 0!==e?e.jQuery:null);"undefined"!=typeof window?window.jQuery:void 0!==e&&e.jQuery;var a=t("../../admin-blocks/twrpb-hidden/twrpb-hidden"),o=r.default("#twrpb-order-setting__js-first-order-group"),d=r.default("#twrpb-order-setting__js-second-order-group"),s=r.default("#twrpb-order-setting__js-third-order-group"),u="twrpb-order-setting__js-orderby",l=[o,d,s];function f(){for(var t=!1,e=0;e<l.length;e++)t?a.hideUp(l[e]):a.showUp(l[e]),"not_applied"===l[e].find("."+u).val()?(t=!0,a.hideUp(l[e].find(".twrpb-order-setting__js-order-type"))):a.showUp(l[e].find(".twrpb-order-setting__js-order-type"))}r.default(f),r.default(document).on("change","."+u,f),r.default(document).on("change","."+u,(function(){for(var t=0;t<l.length;t++)l[t].find("option").removeAttr("disabled");for(t=0;t<l.length;t++){var e=l[t].find("."+u).val();if("not_applied"!==e)for(var n=t+1;n<l.length;n++){var i=l[n].find("."+u),r=i.val();i.find('[value="'+e+'"]').attr("disabled","disabled"),r===e&&(i.val("not_applied"),i.trigger("change"))}}}))}).call(this,"undefined"!=typeof global?global:"undefined"!=typeof self?self:"undefined"!=typeof window?window:{})},{"../../admin-blocks/twrpb-hidden/twrpb-hidden":2}],12:[function(t,e,n){(function(e){"use strict";var i=this&&this.__awaiter||function(t,e,n,i){return new(n||(n=Promise))((function(r,a){function o(t){try{s(i.next(t))}catch(t){a(t)}}function d(t){try{s(i.throw(t))}catch(t){a(t)}}function s(t){var e;t.done?r(t.value):(e=t.value,e instanceof n?e:new n((function(t){t(e)}))).then(o,d)}s((i=i.apply(t,e||[])).next())}))},r=this&&this.__generator||function(t,e){var n,i,r,a,o={label:0,sent:function(){if(1&r[0])throw r[1];return r[1]},trys:[],ops:[]};return a={next:d(0),throw:d(1),return:d(2)},"function"==typeof Symbol&&(a[Symbol.iterator]=function(){return this}),a;function d(a){return function(d){return function(a){if(n)throw new TypeError("Generator is already executing.");for(;o;)try{if(n=1,i&&(r=2&a[0]?i.return:a[0]?i.throw||((r=i.return)&&r.call(i),0):i.next)&&!(r=r.call(i,a[1])).done)return r;switch(i=0,r&&(a=[2&a[0],r.value]),a[0]){case 0:case 1:r=a;break;case 4:return o.label++,{value:a[1],done:!1};case 5:o.label++,i=a[1],a=[0];continue;case 7:a=o.ops.pop(),o.trys.pop();continue;default:if(!(r=o.trys,(r=r.length>0&&r[r.length-1])||6!==a[0]&&2!==a[0])){o=0;continue}if(3===a[0]&&(!r||a[1]>r[0]&&a[1]<r[3])){o.label=a[1];break}if(6===a[0]&&o.label<r[1]){o.label=r[1],r=a;break}if(r&&o.label<r[2]){o.label=r[2],o.ops.push(a);break}r[2]&&o.ops.pop(),o.trys.pop();continue}a=e.call(t,o)}catch(t){a=[6,t],i=0}finally{n=r=0}if(5&a[0])throw a[1];return{value:a[0]?a[1]:void 0,done:!0}}([a,d])}}},a=this&&this.__importDefault||function(t){return t&&t.__esModule?t:{default:t}};Object.defineProperty(n,"__esModule",{value:!0});var o=a("undefined"!=typeof window?window.jQuery:void 0!==e?e.jQuery:null);"undefined"!=typeof window?window.jQuery:void 0!==e&&e.jQuery;var d=t("../../admin-blocks/twrpb-hidden/twrpb-hidden"),s=o.default("#twrpb-posts-settings__js-filter-type"),u=o.default("#twrpb-posts-settings__js-posts-list"),l=o.default("#twrpb-posts-settings__js-posts-search-wrap");function f(){"NA"===s.val()?(d.hideUp(l),d.hideUp(u)):(d.showUp(l),d.showUp(u))}o.default(f),o.default(document).on("change","#twrpb-posts-settings__js-filter-type",f);var c=o.default("#twrpb-posts-settings__js-posts-search");function p(t,e){return i(this,void 0,void 0,(function(){var n,i,a,o,d;return r(this,(function(r){switch(r.label){case 0:return n=wpApiSettings.root+wpApiSettings.versionString,i=n+"search?_fields=id,title&search="+t.term+"&page=1&per_page=10",[4,fetch(i)];case 1:return[4,r.sent().json()];case 2:for((a=r.sent())instanceof Array||console.error("TWRP error when fetching posts."),o=[],d=0;d<a.length;d++)o.push({value:m(a[d].title),label:m(a[d].title),id:a[d].id});return e(o),[2]}}))}))}o.default((function(){c.autocomplete({source:p,minLength:2})}));var w=o.default("#twrpb-posts-settings__js-posts-ids"),h="data-post-id",b=o.default('<div class="twrpb-display-list__item twrpb-posts-settings__post-item"><div class="twrpb-posts-settings__post-item-title"></div><button class="twrpb-display-list__item-remove-btn twrpb-posts-settings__js-post-remove-btn" type="button"><span class="dashicons dashicons-no"></span></button></div>');function _(t,e){!function(t,e){if(function(t){if(u.find('[data-post-id="'+t+'"]').length)return!0;return!1}(t))return;var n=b.clone(),i=function(){var t=u.attr("data-twrpb-aria-remove-label");if(!t)return"";return t}().replace("%s",e);n.find(".twrpb-posts-settings__post-item-title").text(e),n.find(".twrpb-display-list__item-remove-btn").attr("aria-label",i),n.attr(h,t),u.append(n),d.showLeft(n,"hide_first")}(t,e),function(t){if(function(t){var e=String(w.val());if(t=Number(t),!(e&&t>0))return!1;if(-1!==e.split(";").map(n).indexOf(t))return!0;return!1;function n(t){return parseInt(t)}}(t))return;t=String(t);var e=w.val(),n="";n=e?e+";"+t:t;w.val(n)}(t),v()}o.default(document).on("click","#twrpb-posts-settings__js-posts-add-btn",(function(){var t,e,n=c.autocomplete("instance");try{var i=n.selectedItem;t=i.id,e=i.label}catch(t){return}_(t,e)})),o.default(document).on("keypress","#twrpb-posts-settings__js-posts-search",(function(t){if(13!==(t.keyCode?t.keyCode:t.which))return;t.preventDefault();var e,n,i=c.autocomplete("instance");try{var r=i.selectedItem;e=r.id,n=r.label}catch(t){return}_(e,n)})),o.default(document).on("click",".twrpb-posts-settings__js-post-remove-btn",(function(){var t=o.default(this).closest("[data-post-id]").attr(h);if(!((t=Number(t))>0))return;!function(t){(function(t){var e=u.find('[data-post-id="'+t+'"]');e.removeAttr(h),d.hideLeft(e,"remove")})(t),function(t){var e=String(w.val());t=String(t);var n=e.split(";"),i=n.indexOf(t);-1!==i&&(n.splice(i,1),w.val(n.join(";")))}(t),v()}(t)}));var g=o.default("#twrpb-posts-settings__js-no-posts-selected");function v(){u.find("[data-post-id]").length>0&&d.hideLeft(g),u.find("[data-post-id]").length>0||d.showLeft(g)}function y(){var t=u.find(".twrpb-posts-settings__post-item").filter("[data-post-id]"),e=[];t.each((function(){var t=o.default(this).attr(h);(t=+t)>0&&e.push(t)})),w.val(e.join(";"))}function m(t){return o.default("<div>").html(t).text()}o.default(v),o.default((function(){u.sortable({placeholder:"twrpb-display-list__placeholder",stop:y})}))}).call(this,"undefined"!=typeof global?global:"undefined"!=typeof self?self:"undefined"!=typeof window?window:{})},{"../../admin-blocks/twrpb-hidden/twrpb-hidden":2}],13:[function(t,e,n){(function(e){"use strict";var i=this&&this.__importDefault||function(t){return t&&t.__esModule?t:{default:t}};Object.defineProperty(n,"__esModule",{value:!0});var r=i("undefined"!=typeof window?window.jQuery:void 0!==e?e.jQuery:null);"undefined"!=typeof window?window.jQuery:void 0!==e&&e.jQuery;var a=t("../../admin-blocks/twrpb-hidden/twrpb-hidden"),o=r.default("#twrpb-search-setting__js-search-input"),d=r.default("#twrpb-search-setting__js-words-warning");function s(){var t=String(o.val()).length;0!==t&&t<4?a.showUp(d):a.hideUp(d)}r.default(s),r.default(document).on("change","#twrpb-search-setting__js-search-input",s)}).call(this,"undefined"!=typeof global?global:"undefined"!=typeof self?self:"undefined"!=typeof window?window:{})},{"../../admin-blocks/twrpb-hidden/twrpb-hidden":2}],14:[function(t,e,n){(function(e){"use strict";var i=this&&this.__importDefault||function(t){return t&&t.__esModule?t:{default:t}};Object.defineProperty(n,"__esModule",{value:!0});var r=i("undefined"!=typeof window?window.jQuery:void 0!==e?e.jQuery:null);"undefined"!=typeof window?window.jQuery:void 0!==e&&e.jQuery;var a=t("../../admin-blocks/twrpb-hidden/twrpb-hidden"),o=r.default("#twrpb-statuses-settings__js-apply-select"),d=r.default("#twrpb-statuses-settings__js-statuses-wrapper");function s(){"not_applied"===o.val()?a.hideUp(d):a.showUp(d)}r.default(document).on("change","#twrpb-statuses-settings__js-apply-select",s),r.default(s)}).call(this,"undefined"!=typeof global?global:"undefined"!=typeof self?self:"undefined"!=typeof window?window:{})},{"../../admin-blocks/twrpb-hidden/twrpb-hidden":2}],15:[function(t,e,n){"use strict";Object.defineProperty(n,"__esModule",{value:!0}),t("./admin-blocks/twrpb-hidden/twrpb-hidden"),t("./admin-blocks/twrpb-collapsible/twrpb-collapsible"),t("./documentation-page/twrpb-documentation-page"),t("./general-settings/twrpb-general-settings"),t("./query-settings/twrpb-advanced-args/twrpb-advanced-args"),t("./query-settings/twrpb-author-settings/twrpb-author-settings"),t("./query-settings/twrpb-cat-settings/twrpb-cat-settings"),t("./query-settings/twrpb-comments-settings/twrpb-comments-settings"),t("./query-settings/twrpb-date-settings/twrpb-date-settings"),t("./query-settings/twrpb-meta-setting/twrpb-meta-setting"),t("./query-settings/twrpb-order-setting/twrpb-order-setting"),t("./query-settings/twrpb-posts-settings/twrpb-posts-settings"),t("./query-settings/twrpb-search-setting/twrpb-search-setting"),t("./query-settings/twrpb-statuses-settings/twrpb-statuses-settings"),t("./widget-blocks/twrp-color-picker"),t("./widget-blocks/twrp-icon-select-preview"),t("./widget-blocks/twrp-widget-form"),t("./widget-blocks/twrp-widget-components"),n.default={}},{"./admin-blocks/twrpb-collapsible/twrpb-collapsible":1,"./admin-blocks/twrpb-hidden/twrpb-hidden":2,"./documentation-page/twrpb-documentation-page":3,"./general-settings/twrpb-general-settings":4,"./query-settings/twrpb-advanced-args/twrpb-advanced-args":5,"./query-settings/twrpb-author-settings/twrpb-author-settings":6,"./query-settings/twrpb-cat-settings/twrpb-cat-settings":7,"./query-settings/twrpb-comments-settings/twrpb-comments-settings":8,"./query-settings/twrpb-date-settings/twrpb-date-settings":9,"./query-settings/twrpb-meta-setting/twrpb-meta-setting":10,"./query-settings/twrpb-order-setting/twrpb-order-setting":11,"./query-settings/twrpb-posts-settings/twrpb-posts-settings":12,"./query-settings/twrpb-search-setting/twrpb-search-setting":13,"./query-settings/twrpb-statuses-settings/twrpb-statuses-settings":14,"./widget-blocks/twrp-color-picker":16,"./widget-blocks/twrp-icon-select-preview":17,"./widget-blocks/twrp-widget-components":18,"./widget-blocks/twrp-widget-form":19}],16:[function(t,e,n){(function(t){"use strict";var e=this&&this.__importDefault||function(t){return t&&t.__esModule?t:{default:t}};Object.defineProperty(n,"__esModule",{value:!0});var i=e("undefined"!=typeof window?window.jQuery:void 0!==t?t.jQuery:null);i.default((function(){i.default(".twrp-color-picker").each((function(){var t=i.default(this).parent().find("input"),e=t.val();e||(e=null);var n=Pickr.create({el:this,theme:"classic",container:"body",default:e,appClass:"twrp-pickr",swatches:["rgba(244, 67, 54, 1)","rgba(233, 30, 99, 1)","rgba(156, 39, 176, 1)","rgba(103, 58, 183, 1)","rgba(63, 81, 181, 1)","rgba(33, 150, 243, 1)","rgba(3, 169, 244, 1)","rgba(0, 188, 212, 1)","rgba(0, 150, 136, 1)","rgba(76, 175, 80, 1)","rgba(139, 195, 74, 1)","rgba(205, 220, 57, 1)","rgba(255, 235, 59, 1)","rgba(255, 193, 7, 1)"],defaultRepresentation:"RGBA",components:{preview:!0,opacity:!0,hue:!0,interaction:{input:!0,cancel:!0,clear:!0,save:!0}}}).on("save",(function(e){e?t.val(e.toRGBA().toString(0)):t.val(""),t.change(),n.hide()}));n.setColorRepresentation("RGBA")}))}))}).call(this,"undefined"!=typeof global?global:"undefined"!=typeof self?self:"undefined"!=typeof window?window:{})},{}],17:[function(t,e,n){"use strict";Object.defineProperty(n,"__esModule",{value:!0})},{}],18:[function(t,e,n){(function(t){"use strict";var e=this&&this.__importDefault||function(t){return t&&t.__esModule?t:{default:t}};Object.defineProperty(n,"__esModule",{value:!0});var i=e("undefined"!=typeof window?window.jQuery:void 0!==t?t.jQuery:null);"undefined"!=typeof window?window.jQuery:void 0!==t&&t.jQuery,i.default((function(){i.default(".twrp-widget-components").tabs({active:0})}))}).call(this,"undefined"!=typeof global?global:"undefined"!=typeof self?self:"undefined"!=typeof window?window:{})},{}],19:[function(t,e,n){(function(t){"use strict";var e=this&&this.__awaiter||function(t,e,n,i){return new(n||(n=Promise))((function(r,a){function o(t){try{s(i.next(t))}catch(t){a(t)}}function d(t){try{s(i.throw(t))}catch(t){a(t)}}function s(t){var e;t.done?r(t.value):(e=t.value,e instanceof n?e:new n((function(t){t(e)}))).then(o,d)}s((i=i.apply(t,e||[])).next())}))},i=this&&this.__generator||function(t,e){var n,i,r,a,o={label:0,sent:function(){if(1&r[0])throw r[1];return r[1]},trys:[],ops:[]};return a={next:d(0),throw:d(1),return:d(2)},"function"==typeof Symbol&&(a[Symbol.iterator]=function(){return this}),a;function d(a){return function(d){return function(a){if(n)throw new TypeError("Generator is already executing.");for(;o;)try{if(n=1,i&&(r=2&a[0]?i.return:a[0]?i.throw||((r=i.return)&&r.call(i),0):i.next)&&!(r=r.call(i,a[1])).done)return r;switch(i=0,r&&(a=[2&a[0],r.value]),a[0]){case 0:case 1:r=a;break;case 4:return o.label++,{value:a[1],done:!1};case 5:o.label++,i=a[1],a=[0];continue;case 7:a=o.ops.pop(),o.trys.pop();continue;default:if(!(r=o.trys,(r=r.length>0&&r[r.length-1])||6!==a[0]&&2!==a[0])){o=0;continue}if(3===a[0]&&(!r||a[1]>r[0]&&a[1]<r[3])){o.label=a[1];break}if(6===a[0]&&o.label<r[1]){o.label=r[1],r=a;break}if(r&&o.label<r[2]){o.label=r[2],o.ops.push(a);break}r[2]&&o.ops.pop(),o.trys.pop();continue}a=e.call(t,o)}catch(t){a=[6,t],i=0}finally{n=r=0}if(5&a[0])throw a[1];return{value:a[0]?a[1]:void 0,done:!0}}([a,d])}}},r=this&&this.__importDefault||function(t){return t&&t.__esModule?t:{default:t}};Object.defineProperty(n,"__esModule",{value:!0});var a=r("undefined"!=typeof window?window.jQuery:void 0!==t?t.jQuery:null);"undefined"!=typeof window?window.jQuery:void 0!==t&&t.jQuery;var o="data-twrp-widget-id",d="data-twrp-query-id",s="data-twrp-selected-artblock",u=".twrp-widget-form__selected-queries-list",l=".twrp-widget-form__selected-queries",f=".twrp-widget-form__article-block-settings";a.default(document).on("click",".twrp-widget-form__select-query-to-add-btn",(function(){var t=a.default(this).closest(".twrp-widget-form"),e=t.attr(o),n=String(t.find(".twrp-widget-form__select-query-to-add").val()),i=k(t);-1===i.indexOf(n)&&(i.push(n),Q(e,i),g(e,n)||b(e,n))})),a.default(document).on("click",".twrp-widget-form__remove-selected-query",(function(){var t=v(a.default(this)),e=y(a.default(this));(function(t,e){j(t,e).remove()})(t,e),h(t)}));var c=a.default();function p(){c=a.default(document).find("["+o+"]")}function w(){c.each((function(){!function(t){for(var e=m(t),n=k(e),i=0;i<n.length;i++)g(t,n[i])||b(t,n[i]);e.find("["+d+"]").each((function(){var t=a.default(this).attr(d);-1===n.indexOf(t)&&a.default(this).remove()}))}(a.default(this).attr(o))}))}function h(t){var e=m(t).find(u).find(".twrp-widget-form__selected-query"),n=[];e.each((function(){var t=a.default(this).attr(d);t&&n.push(t)})),Q(t,n)}function b(t,n){return e(this,void 0,void 0,(function(){var e,r,a;return i(this,(function(i){switch(i.label){case 0:return[4,_(t,n)];case 1:return e=i.sent(),r=m(t),g(t,n)||((a=r.find(".twrp-widget-form__selected-queries-list")).append(e),a.trigger("twrp-query-list-added",[t,n])),[2]}}))}))}function _(t,e){return a.default.ajax({url:ajaxurl,method:"POST",data:{action:"twrp_widget_create_query_setting",widget_id:t,query_id:e}})}function g(t,e){return!!j(t,e).length}function v(t){return a.default(t).closest("["+o+"]").attr(o)}function y(t){return a.default(t).closest("["+d+"]").attr(d)}function m(t){return a.default(document).find("["+o+'="'+t+'"]')}function j(t,e){var n=m(t);return a.default(n).find("["+d+'="'+e+'"]')}function k(t){var e=t.find(l),n=String(e.val()).split(";");return n=n.filter((function(t){return Boolean(t)}))}function Q(t,e){var n=m(t).find(l),i=e.join(";");n.val(i)}function U(){h(v(this))}function q(){p(),c.each((function(){var t=a.default(this).attr(o);a.default(this).find("["+d+"]").each((function(){var e=a.default(this).attr(d);S(t,e)}))}))}function S(t,e){var n=j(t,e);n.accordion("instance")?n.accordion("refresh"):n.accordion({collapsible:!0,active:!1,heightStyle:"content"})}function M(t,e,n){return x(t,e,n)?function(t,e,n){if(x(t,e,n))return O[t][e][n];return!1}(t,e,n):a.default.ajax({url:ajaxurl,method:"POST",data:{action:"twrp_widget_create_artblock_settings",artblock_id:n,widget_id:t,query_id:e}})}a.default(p),a.default(document).on("click",p),a.default(w),a.default(document).on("click",w),a.default(document).on("twrp-query-list-added",(function(t,e){!function(t){var e=m(t),n=e.find(u),i=e.find("["+d+"]"),r=k(e);i.detach();for(var a=0;a<r.length;a++)for(var o=0;o<i.length;o++)r[a]===i.eq(o).attr(d)&&n.append(i.eq(o))}(e)})),a.default(document).on("click",(function(){c.each((function(){a.default(this).find(u).sortable({update:U})}))})),a.default(q),a.default(document).on("twrp-query-list-added widget-updated widget-added",(function(t,e,n){"twrp-query-list-added"===t.type?S(e,n):q()})),a.default(document).on("change",".twrp-widget-form__article-block-selector",(function(){return e(this,void 0,void 0,(function(){var t,e,n,r;return i(this,(function(i){switch(i.label){case 0:return t=v(a.default(this)),e=y(a.default(this)),n=String(a.default(this).val()),[4,M(t,e,n)];case 1:return r=i.sent(),function(t,e,n){var i=j(t,e),r=i.find(f),a=i.find(".twrp-widget-form__article-block-settings-container");r.detach(),function(t,e,n){var i=n.attr(s);if(!t||!e||!i)return;O[t]||(O[t]=[]);O[t][e]||(O[t][e]=[]);O[t][e][i]=n}(t,e,r),a.append(n)}(t,e,r),[2]}}))}))}));var O=Array();function x(t,e,n){return!!O[t]&&(!!O[t][e]&&(!!O[t][e][n]&&O[t][e][n].attr(s)===n))}}).call(this,"undefined"!=typeof global?global:"undefined"!=typeof self?self:"undefined"!=typeof window?window:{})},{}]},{},[15]);
//# sourceMappingURL=script.js.map
