!function t(e,n,i){function r(o,d){if(!n[o]){if(!e[o]){var s="function"==typeof require&&require;if(!d&&s)return s(o,!0);if(a)return a(o,!0);var u=new Error("Cannot find module '"+o+"'");throw u.code="MODULE_NOT_FOUND",u}var l=n[o]={exports:{}};e[o][0].call(l.exports,(function(t){return r(e[o][1][t]||t)}),l,l.exports,t,e,n,i)}return n[o].exports}for(var a="function"==typeof require&&require,o=0;o<i.length;o++)r(i[o]);return r}({1:[function(t,e,n){(function(t){"use strict";var e=this&&this.__importDefault||function(t){return t&&t.__esModule?t:{default:t}};Object.defineProperty(n,"__esModule",{value:!0});var i=e("undefined"!=typeof window?window.jQuery:void 0!==t?t.jQuery:null);"undefined"!=typeof window?window.jQuery:void 0!==t&&t.jQuery,i.default((function(){i.default(".twrpb-collapsible").each((function(){var t=i.default(this),e="1"===t.attr("data-twrpb-is-collapsed")&&0;t.accordion({active:e,heightStyle:"content",collapsible:!0,icons:!1})}))}))}).call(this,"undefined"!=typeof global?global:"undefined"!=typeof self?self:"undefined"!=typeof window?window:{})},{}],2:[function(t,e,n){(function(t){"use strict";var e=this&&this.__importDefault||function(t){return t&&t.__esModule?t:{default:t}};Object.defineProperty(n,"__esModule",{value:!0}),n.showLeft=n.hideLeft=n.hideUp=n.showUp=n.toggleDisplay=void 0;var i=e("undefined"!=typeof window?window.jQuery:void 0!==t?t.jQuery:null);"undefined"!=typeof window?window.jQuery:void 0!==t&&t.jQuery;var r=!1,a=[];function o(t,e){r=!0;var n={name:t,parameters:e};a.push(n)}function d(){if(a.length){var t=a.pop();r=0!==a.length,t.name.apply(null,t.parameters)}r=0!==a.length}function s(){return r}function u(){r=!0}function l(t){i.default(t).slideUp({duration:500,complete:function(){c(t)}})}function f(t){i.default(t).slideDown({duration:500,complete:function(){p(t)}})}function c(t){i.default(t).addClass("twrpb-hidden")}function p(t){i.default(t).removeClass("twrpb-hidden").css("display","")}n.toggleDisplay=function(t){t.hasClass("twrpb-hidden")?f(t):l(t)},n.hideUp=l,n.showUp=f,n.hideLeft=function t(e,n){if(void 0===n&&(n=""),s())o(t,[e,n]);else{u();var r=function(){c(e),d()};"remove"===n&&(r=function(){!function(t){i.default(t).remove()}(e),d()}),i.default(e).hide({effect:"blind",duration:300,direction:"left",complete:r})}},n.showLeft=function t(e,n){void 0===n&&(n=""),s()?o(t,[e,n]):(u(),"hide_first"===n&&e.addClass("twrpb-hidden"),i.default(e).show({effect:"blind",duration:300,direction:"left",complete:function(){p(e),d()}}))}}).call(this,"undefined"!=typeof global?global:"undefined"!=typeof self?self:"undefined"!=typeof window?window:{})},{}],3:[function(t,e,n){(function(e){"use strict";var i=this&&this.__importDefault||function(t){return t&&t.__esModule?t:{default:t}};Object.defineProperty(n,"__esModule",{value:!0});var r=i("undefined"!=typeof window?window.jQuery:void 0!==e?e.jQuery:null),a=t("../admin-blocks/twrpb-hidden/twrpb-hidden");r.default(document).on("click",".twrpb-icons-spoiler__btn",(function(){var t=r.default(this).parent(".twrpb-icons-spoiler__category").find(".twrpb-icons-spoiler__spoiler");a.toggleDisplay(t)}))}).call(this,"undefined"!=typeof global?global:"undefined"!=typeof self?self:"undefined"!=typeof window?window:{})},{"../admin-blocks/twrpb-hidden/twrpb-hidden":2}],4:[function(t,e,n){(function(e){"use strict";var i=this&&this.__importDefault||function(t){return t&&t.__esModule?t:{default:t}};Object.defineProperty(n,"__esModule",{value:!0});var r=i("undefined"!=typeof window?window.jQuery:void 0!==e?e.jQuery:null);"undefined"!=typeof window?window.jQuery:void 0!==e&&e.jQuery;var a=t("../admin-blocks/twrpb-hidden/twrpb-hidden");function o(){var t=r.default("#twrpb-general-settings__human_readable_date-setting-true"),e=r.default("#twrpb-general-settings__date_format-wrapper");t.is(":checked")?a.hideUp(e):a.showUp(e)}r.default(o),r.default(document).on("click",o);var d="twrpb-general-settings__icon-preview",s='<span class="'+d+'"><svg><use/></svg></span>',u=["author_icon","date_icon","category_icon","comments_icon","comments_disabled_icon","views_icon"];function l(t){var e=r.default('select[name="'+t+'"');if(0!==e.length){var n=e.parent(),i=String(e.val());n.find("."+d).remove(),r.default(s).insertBefore(e),n.find("use").attr("href","#"+i)}}r.default((function(){for(var t=0,e=u;t<e.length;t++){l(e[t])}})),r.default(document).on("change",function(){for(var t="",e=0,n=u;e<n.length;e++){t&&(t+=", "),t=t+'select[name="'+n[e]+'"]'}return t}(),(function(){var t=String(r.default(this).attr("name"));if(!t)return;l(t)}));var f="twrpb-general-select__rating_icons_preview",c=s,p=null;function w(){null===p&&function(){var t=r.default("#twrpb-general-settings__rating_pack_icons-wrapper");if(0!==t.length){var e=t.attr("data-twrpb-rating-packs");if("string"==typeof e)try{p=JSON.parse(e)}catch(t){}}}();var t=r.default('select[name="rating_pack_icons"]');if(0!==t.length){var e=t.parent(),n=String(t.val());if(n in p&&"empty"in p[n]&&"half"in p[n]&&"full"in p[n]){var i=p[n].empty,a=p[n].half,o=p[n].full;e.find("."+f).remove(),e.prepend('<span class="twrpb-general-select__rating_icons_preview"></span>');var d=e.find("."+f);r.default(c).appendTo(d).find("use").attr("href","#"+o),r.default(c).appendTo(d).find("use").attr("href","#"+a),r.default(c).appendTo(d).find("use").attr("href","#"+i)}}}r.default(w),r.default(document).on("change",'select[name="rating_pack_icons"]',w);var b="#twrpb-general-settings__comments_icon-setting",h="#twrpb-general-settings__comments_disabled_icon-setting",_=null,g="comments_disabled_icon_auto_select";function v(){if(null===_&&function(){var t=r.default("#twrpb-general-settings__comments_disabled_icon-wrapper");if(0!==t.length){var e=t.attr("data-twrpb-related-comment-icons");if("string"==typeof e)try{_=JSON.parse(e)}catch(t){}}}(),null!==_){var t=String(r.default(b).val());if(_[t]){var e=String(_[t]);r.default(h).val(e).trigger("change")}}}r.default(m),r.default(document).on("change",b,(function(){j()&&v()})),r.default(document).on("change",'input[name="'+g+'"]',m),r.default(document).on("submit",(function(){k()}));var y=!0;function m(){j()?(r.default(h).prop("disabled",!0),y||v(),y=!1):k()}function j(){var t=String(r.default('input[name="'+g+'"]:checked').val());return 1===parseInt(t)||"true"===t}function k(){r.default(h).removeProp("disabled")}}).call(this,"undefined"!=typeof global?global:"undefined"!=typeof self?self:"undefined"!=typeof window?window:{})},{"../admin-blocks/twrpb-hidden/twrpb-hidden":2}],5:[function(t,e,n){(function(e){"use strict";var i=this&&this.__importDefault||function(t){return t&&t.__esModule?t:{default:t}};Object.defineProperty(n,"__esModule",{value:!0});var r=i("undefined"!=typeof window?window.jQuery:void 0!==e?e.jQuery:null),a=t("../../admin-blocks/twrpb-hidden/twrpb-hidden"),o=null;r.default((function(){var t=document.getElementById("twrpb-advanced-settings__textarea");t&&(o=CodeMirror.fromTextArea(t,{mode:"application/json",theme:"material-darker",indentUnit:4,indentWithTabs:!0,lineNumbers:!0,autoRefresh:!0}))}));var d="#twrpb-advanced-settings__is-applied-selector",s="#twrpb-advanced-settings__textarea-wrapper";function u(){"not_apply"===String(r.default(d).val())?a.hideUp(r.default(s)):a.showUp(r.default(s))}r.default(u),r.default(document).on("change",d,u);var l="#twrpb-setting-note__invalid_json_warning";function f(){if(null!==o){var t=o.getValue();!function(t){try{var e=JSON.parse(t);if(e&&"object"==typeof e)return!0}catch(t){}return!1}(t)&&""!==t?a.showUp(r.default(l)):a.hideUp(r.default(l))}}r.default(f),r.default(document).on("change keyup paste","#twrpb-advanced-settings__textarea-wrapper",f)}).call(this,"undefined"!=typeof global?global:"undefined"!=typeof self?self:"undefined"!=typeof window?window:{})},{"../../admin-blocks/twrpb-hidden/twrpb-hidden":2}],6:[function(t,e,n){(function(e){"use strict";var i=this&&this.__importDefault||function(t){return t&&t.__esModule?t:{default:t}};Object.defineProperty(n,"__esModule",{value:!0});var r=i("undefined"!=typeof window?window.jQuery:void 0!==e?e.jQuery:null);"undefined"!=typeof window?window.jQuery:void 0!==e&&e.jQuery;var a=t("../../admin-blocks/twrpb-hidden/twrpb-hidden"),o=r.default("#twrpb-author-settings__select_type"),d=r.default("#twrpb-author-settings__author-search-wrap"),s=r.default("#twrpb-author-settings__js-authors-list");r.default(document).on("change","#twrpb-author-settings__select_type",(function(){var t=o.val();"IN"===t||"OUT"===t?(a.showUp(d),a.showUp(s)):(a.hideUp(d),a.hideUp(s))})),r.default((function(){u.autocomplete({source:l,minLength:2}).autocomplete("widget").addClass("twrpb-jqueryui-autocomplete-menu")}));var u=r.default("#twrpb-author-settings__js-author-search");function l(t,e){var n=new wp.api.collections.Users,i=[];function a(){for(var t=0;t<n.length;t++){var a=void 0,o=void 0;try{d=n.models[t].attributes.name,a=r.default("<div>").html(d).text(),o=n.models[t].attributes.id}catch(t){continue}i.push({value:a,label:a,id:o})}var d;e(i)}n.fetch({data:{_fields:"id,name",search:t.term}}),n.once("sync",a),n.once("error",(function(){console.error("TWRP Backbone error when getting users."),a()})),n.once("invalid",(function(){console.error("TWRP Backbone invalid when getting users."),a()}))}var f=r.default("#twrpb-author-settings__js-author-ids"),c=r.default("#twrpb-author-settings__js-authors-list"),p="data-twrpb-aria-remove-label",w=r.default('<div class="twrpb-display-list__item twrpb-author-settings__author-item"><div class="twrpb-author-settings__author-item-name"></div><button class="twrpb-display-list__item-remove-btn twrpb-author-settings__js-author-remove-btn" type="button"><span class="dashicons dashicons-no"></span></button></div>'),b="data-author-id";function h(t,e){!function(t,e){if(function(t){if(c.find('[data-author-id="'+t+'"]').length)return!0;return!1}(t))return;var n=w.clone(),i=function(){var t=c.attr(p);if(!t)return"";return t}().replace("%s",e);n.find(".twrpb-author-settings__author-item-name").text(e),n.find(".twrpb-display-list__item-remove-btn").attr("aria-label",i),n.attr(b,t),c.append(n),a.showLeft(n,"hide_first")}(t,e),function(t){if(function(t){var e=String(f.val());if(t=Number(t),!(e&&t>0))return!1;if(-1!==e.split(";").map(n).indexOf(t))return!0;return!1;function n(t){return parseInt(t)}}(t))return;t=String(t);var e=f.val(),n="";n=e?e+";"+t:t;f.val(n)}(t),g()}r.default(document).on("click","#twrpb-author-settings__js-author-add-btn",(function(){var t,e,n=u.autocomplete("instance");try{var i=n.selectedItem;t=i.id,e=i.label}catch(t){return}h(t,e)})),r.default(document).on("keypress","#twrpb-author-settings__js-author-search",(function(t){if(13!==(t.keyCode?t.keyCode:t.which))return;t.preventDefault();var e,n,i=u.autocomplete("instance");try{var r=i.selectedItem;e=r.id,n=r.label}catch(t){return}h(e,n)})),r.default(document).on("click",".twrpb-author-settings__js-author-remove-btn",(function(){var t=Number(r.default(this).closest("[data-author-id]").attr(b));if(!(t>0))return;!function(t){(function(t){var e=c.find('[data-author-id="'+t+'"]');e.removeAttr(b),a.hideLeft(e,"remove")})(t),function(t){var e=String(f.val());t=String(t);var n=e.split(";"),i=n.indexOf(t);-1!==i&&(n.splice(i,1),f.val(n.join(";")))}(t),g()}(t)}));var _=r.default("#twrpb-author-settings__js-no-authors-selected");function g(){c.find("[data-author-id]").length>0&&a.hideLeft(_),c.find("[data-author-id]").length>0||a.showLeft(_)}function v(){var t=c.find(".twrpb-author-settings__author-item"),e=[];t.each((function(){var t=Number(r.default(this).attr(b));t>0&&e.push(t)})),f.val(e.join(";"))}r.default(g),r.default((function(){c.sortable({placeholder:"twrpb-display-list__placeholder",stop:v})}))}).call(this,"undefined"!=typeof global?global:"undefined"!=typeof self?self:"undefined"!=typeof window?window:{})},{"../../admin-blocks/twrpb-hidden/twrpb-hidden":2}],7:[function(t,e,n){(function(e){"use strict";var i=this&&this.__importDefault||function(t){return t&&t.__esModule?t:{default:t}};Object.defineProperty(n,"__esModule",{value:!0});var r=i("undefined"!=typeof window?window.jQuery:void 0!==e?e.jQuery:null);"undefined"!=typeof window?window.jQuery:void 0!==e&&e.jQuery;var a=t("../../admin-blocks/twrpb-hidden/twrpb-hidden"),o=r.default("#twrpb-cat-settings__js-cat-dropdown"),d=r.default("#twrpb-cat-settings__cat-ids"),s="data-cat-id",u=r.default("#twrpb-cat-settings__cat-list-wrap"),l=u.find(".twrpb-display-list__empty-msg"),f=r.default('<div class="twrpb-display-list__item twrpb-cat-settings__cat-list-item"><div class="twrpb-display-list__item-name twrpb-cat-settings__cat-item-name"></div><button class="twrpb-display-list__item-remove-btn twrpb-cat-settings__cat-remove-btn" type="button"><span class="dashicons dashicons-no"></span></button></div>');function c(){u.find("[data-cat-id]").length>0||a.showLeft(l),u.find("[data-cat-id]").length>0&&a.hideLeft(l)}r.default(document).on("click","#twrpb-cat-settings__add-cat-btn",(function(){var t=o.find(":selected").val(),e=h(o.find(":selected").text());t>0&&(function(t){var e,n=d.val();e=n&&t?n+";"+t:t;(function(t){var e=d.val();if(!e)return!1;if(-1!==e.split(";").indexOf(t))return!0;return!1})(t)||d.val(e)}(t),function(t,e){if(!function(t){var e=u.find(".twrpb-cat-settings__cat-list-item"),n=!1;if(e.each((function(){t===r.default(this).attr(s)&&(n=!0)})),n)return!0;return!1}(t)){var n=f.clone(),i=function(){var t=u.attr("data-twrpb-aria-remove-label");if(!t)return"";return t}().replace("%s",h(e));n.find(".twrpb-cat-settings__cat-item-name").text(h(e)),n.find(".twrpb-display-list__item-remove-btn").attr("aria-label",i),n.attr(s,t),u.append(n),a.showLeft(n,"hide_first"),c()}}(t,e))})),r.default(document).on("click",".twrpb-cat-settings__cat-remove-btn",(function(){var t=String(r.default(this).closest("[data-cat-id]").attr(s));(function(t){var e=u.find('[data-cat-id="'+t+'"]');e.removeAttr(s),c(),a.hideLeft(e,"remove")})(t),function(t){var e=String(d.val()).split(";"),n=e.indexOf(String(t));-1!==n&&(e.splice(n,1),d.val(e.join(";")))}(t)})),r.default((function(){u.sortable({placeholder:"twrpb-display-list__placeholder",stop:_})}));var p=r.default("#twrpb-cat-settings__type"),w=r.default("#twrpb-cat-settings__js-select-relation-wrap"),b=r.default("#twrpb-cat-settings__js-settings-wrapper");function h(t){return t=(t=t.replace(/\([^(]*\)$/,"")).trim()}function _(){var t=u.find(".twrpb-cat-settings__cat-list-item"),e="";t.each((function(){var t=String(r.default(this).attr(s));e?e+=";"+t:e=t})),d.val(e)}r.default(document).on("change","#twrpb-cat-settings__type",(function(){var t=p.val();"NA"===t?(a.hideUp(b),a.hideUp(w)):"IN"===t?(w.removeClass("twrpb-hidden"),r.default(b).css("opacity",.99),setTimeout((function(){r.default(b).css("opacity",1)}),20),a.showUp(b),a.showUp(w)):(a.showUp(b),a.hideUp(w))}))}).call(this,"undefined"!=typeof global?global:"undefined"!=typeof self?self:"undefined"!=typeof window?window:{})},{"../../admin-blocks/twrpb-hidden/twrpb-hidden":2}],8:[function(t,e,n){(function(e){"use strict";var i=this&&this.__importDefault||function(t){return t&&t.__esModule?t:{default:t}};Object.defineProperty(n,"__esModule",{value:!0});var r=i("undefined"!=typeof window?window.jQuery:void 0!==e?e.jQuery:null);"undefined"!=typeof window?window.jQuery:void 0!==e&&e.jQuery;var a=t("../../admin-blocks/twrpb-hidden/twrpb-hidden"),o=r.default("#twrpb-comments-settings__js-comparator"),d=r.default("#twrpb-comments-settings__js-num_comments");function s(){"NA"===o.val()?a.hideUp(d):a.showUp(d)}r.default(s),r.default(document).on("change","#twrpb-comments-settings__js-comparator",s)}).call(this,"undefined"!=typeof global?global:"undefined"!=typeof self?self:"undefined"!=typeof window?window:{})},{"../../admin-blocks/twrpb-hidden/twrpb-hidden":2}],9:[function(t,e,n){(function(e){"use strict";var i=this&&this.__importDefault||function(t){return t&&t.__esModule?t:{default:t}};Object.defineProperty(n,"__esModule",{value:!0});var r=i("undefined"!=typeof window?window.jQuery:void 0!==e?e.jQuery:null);"undefined"!=typeof window?window.jQuery:void 0!==e&&e.jQuery;var a=t("../../admin-blocks/twrpb-hidden/twrpb-hidden"),o=r.default("#twrpb-date-settings__after"),d=r.default("#twrpb-date-settings__before");r.default((function(){if(t=document.createElement("input"),e="not-a-date",t.setAttribute("type","date"),t.setAttribute("value",e),t.value!==e)return;var t,e;var n={dateFormat:"yy-mm-dd",changeMonth:!0,changeYear:!0,beforeShow:function(){r.default("#ui-datepicker-div").addClass("twrpb-jqueryui-datepicker")}};o.datepicker(n),d.datepicker(n)}));var s=r.default("#twrpb-date-settings__js-date-type"),u=r.default("#twrpb-date-settings__js-last-period-wrapper"),l=r.default("#twrpb-date-settings__js-between-wrapper");function f(){"LT"===s.val()?a.showUp(u):a.hideUp(u)}function c(){"FT"===s.val()?a.showUp(l):a.hideUp(l)}r.default(f),r.default(document).on("change","#twrpb-date-settings__js-date-type",f),r.default(c),r.default(document).on("change","#twrpb-date-settings__js-date-type",c);var p="#twrpb-setting-note__post_date_setting_remember";function w(){var t=r.default("#twrpb-date-settings__js-last-days-input").val();r.default("#twrpb-date-settings__js-custom").is(":checked")||!t?a.hideUp(r.default(p)):a.showUp(r.default(p))}r.default(w),r.default(document).on("keyup mouseup change click","#twrpb-date-settings__js-last-period-wrapper",w)}).call(this,"undefined"!=typeof global?global:"undefined"!=typeof self?self:"undefined"!=typeof window?window:{})},{"../../admin-blocks/twrpb-hidden/twrpb-hidden":2}],10:[function(t,e,n){(function(e){"use strict";var i=this&&this.__importDefault||function(t){return t&&t.__esModule?t:{default:t}};Object.defineProperty(n,"__esModule",{value:!0});var r=i("undefined"!=typeof window?window.jQuery:void 0!==e?e.jQuery:null),a=t("../../admin-blocks/twrpb-hidden/twrpb-hidden"),o="#twrpb-meta-setting__js-meta-type",d="#twrpb-meta-setting__js-meta-value-group";function s(){var t=r.default(o).val();"NOT EXISTS"===t||"EXISTS"===t?a.hideUp(r.default(d)):a.showUp(r.default(d))}r.default(s),r.default(document).on("change",o,s);var u="#twrpb-meta-setting__js-apply-meta-select",l="#twrpb-meta-setting__js-setting-wrapper";function f(){"NA"===String(r.default(u).val())?a.hideUp(r.default(l)):a.showUp(r.default(l))}r.default(f),r.default(document).on("change",u,f)}).call(this,"undefined"!=typeof global?global:"undefined"!=typeof self?self:"undefined"!=typeof window?window:{})},{"../../admin-blocks/twrpb-hidden/twrpb-hidden":2}],11:[function(t,e,n){(function(e){"use strict";var i=this&&this.__importDefault||function(t){return t&&t.__esModule?t:{default:t}};Object.defineProperty(n,"__esModule",{value:!0});var r=i("undefined"!=typeof window?window.jQuery:void 0!==e?e.jQuery:null);"undefined"!=typeof window?window.jQuery:void 0!==e&&e.jQuery;var a=t("../../admin-blocks/twrpb-hidden/twrpb-hidden"),o=r.default("#twrpb-order-setting__js-first-order-group"),d=r.default("#twrpb-order-setting__js-second-order-group"),s=r.default("#twrpb-order-setting__js-third-order-group"),u="twrpb-order-setting__js-orderby",l=[o,d,s];function f(){for(var t=!1,e=0;e<l.length;e++)t?a.hideUp(l[e]):a.showUp(l[e]),"not_applied"===l[e].find("."+u).val()?(t=!0,a.hideUp(l[e].find(".twrpb-order-setting__js-order-type"))):a.showUp(l[e].find(".twrpb-order-setting__js-order-type"))}function c(){for(var t=0;t<l.length;t++)l[t].find("option").removeAttr("disabled");for(t=0;t<l.length;t++){var e=l[t].find("."+u).val();if("not_applied"!==e)for(var n=t+1;n<l.length;n++){var i=l[n].find("."+u),r=i.val();i.find('[value="'+e+'"]').attr("disabled","disabled"),r===e&&(i.val("not_applied"),i.trigger("change"))}}}r.default(f),r.default(document).on("change","."+u,f),r.default(c),r.default(document).on("change","."+u,c);var p=r.default("#twrpb-setting-note__ordering_by_post_id_warning");function w(){for(var t=!1,e=0;e<l.length;e++){"ID"===String(r.default(l[e]).find("."+u).val())&&(t=!0)}t?a.showUp(p):a.hideUp(p)}r.default(w),r.default(document).on("change","."+u,w)}).call(this,"undefined"!=typeof global?global:"undefined"!=typeof self?self:"undefined"!=typeof window?window:{})},{"../../admin-blocks/twrpb-hidden/twrpb-hidden":2}],12:[function(t,e,n){(function(e){"use strict";var i=this&&this.__awaiter||function(t,e,n,i){return new(n||(n=Promise))((function(r,a){function o(t){try{s(i.next(t))}catch(t){a(t)}}function d(t){try{s(i.throw(t))}catch(t){a(t)}}function s(t){var e;t.done?r(t.value):(e=t.value,e instanceof n?e:new n((function(t){t(e)}))).then(o,d)}s((i=i.apply(t,e||[])).next())}))},r=this&&this.__generator||function(t,e){var n,i,r,a,o={label:0,sent:function(){if(1&r[0])throw r[1];return r[1]},trys:[],ops:[]};return a={next:d(0),throw:d(1),return:d(2)},"function"==typeof Symbol&&(a[Symbol.iterator]=function(){return this}),a;function d(a){return function(d){return function(a){if(n)throw new TypeError("Generator is already executing.");for(;o;)try{if(n=1,i&&(r=2&a[0]?i.return:a[0]?i.throw||((r=i.return)&&r.call(i),0):i.next)&&!(r=r.call(i,a[1])).done)return r;switch(i=0,r&&(a=[2&a[0],r.value]),a[0]){case 0:case 1:r=a;break;case 4:return o.label++,{value:a[1],done:!1};case 5:o.label++,i=a[1],a=[0];continue;case 7:a=o.ops.pop(),o.trys.pop();continue;default:if(!(r=o.trys,(r=r.length>0&&r[r.length-1])||6!==a[0]&&2!==a[0])){o=0;continue}if(3===a[0]&&(!r||a[1]>r[0]&&a[1]<r[3])){o.label=a[1];break}if(6===a[0]&&o.label<r[1]){o.label=r[1],r=a;break}if(r&&o.label<r[2]){o.label=r[2],o.ops.push(a);break}r[2]&&o.ops.pop(),o.trys.pop();continue}a=e.call(t,o)}catch(t){a=[6,t],i=0}finally{n=r=0}if(5&a[0])throw a[1];return{value:a[0]?a[1]:void 0,done:!0}}([a,d])}}},a=this&&this.__importDefault||function(t){return t&&t.__esModule?t:{default:t}};Object.defineProperty(n,"__esModule",{value:!0});var o=a("undefined"!=typeof window?window.jQuery:void 0!==e?e.jQuery:null);"undefined"!=typeof window?window.jQuery:void 0!==e&&e.jQuery;var d=t("../../admin-blocks/twrpb-hidden/twrpb-hidden"),s=o.default("#twrpb-posts-settings__js-filter-type"),u=o.default("#twrpb-posts-settings__js-posts-list"),l=o.default("#twrpb-posts-settings__js-posts-search-wrap"),f=o.default("#twrpb-setting-note__post_settings_note");function c(){var t=s.val();"NA"===t?(d.hideUp(l),d.hideUp(u)):(d.showUp(l),d.showUp(u)),"IP"===t?d.showUp(f):d.hideUp(f)}o.default(c),o.default(document).on("change","#twrpb-posts-settings__js-filter-type",c);var p=o.default("#twrpb-posts-settings__js-posts-search");function w(t,e){return i(this,void 0,void 0,(function(){var n,i,a,o,d;return r(this,(function(r){switch(r.label){case 0:return n=wpApiSettings.root+wpApiSettings.versionString,i=n+"search?_fields=id,title&search="+t.term+"&page=1&per_page=10",[4,fetch(i)];case 1:return[4,r.sent().json()];case 2:for((a=r.sent())instanceof Array||console.error("TWRP error when fetching posts."),o=[],d=0;d<a.length;d++)o.push({value:j(a[d].title),label:j(a[d].title),id:a[d].id});return e(o),[2]}}))}))}o.default((function(){p.autocomplete({source:w,minLength:2}).autocomplete("widget").addClass("twrpb-jqueryui-autocomplete-menu")}));var b=o.default("#twrpb-posts-settings__js-posts-ids"),h="data-post-id",_=o.default('<div class="twrpb-display-list__item twrpb-posts-settings__post-item"><div class="twrpb-posts-settings__post-item-title"></div><button class="twrpb-display-list__item-remove-btn twrpb-posts-settings__js-post-remove-btn" type="button"><span class="dashicons dashicons-no"></span></button></div>');function g(t,e){!function(t,e){if(function(t){if(u.find('[data-post-id="'+t+'"]').length)return!0;return!1}(t))return;var n=_.clone(),i=function(){var t=u.attr("data-twrpb-aria-remove-label");if(!t)return"";return t}().replace("%s",e);n.find(".twrpb-posts-settings__post-item-title").text(e),n.find(".twrpb-display-list__item-remove-btn").attr("aria-label",i),n.attr(h,t),u.append(n),d.showLeft(n,"hide_first")}(t,e),function(t){if(function(t){var e=String(b.val());if(t=Number(t),!(e&&t>0))return!1;if(-1!==e.split(";").map(n).indexOf(t))return!0;return!1;function n(t){return parseInt(t)}}(t))return;t=String(t);var e=b.val(),n="";n=e?e+";"+t:t;b.val(n)}(t),y()}o.default(document).on("click","#twrpb-posts-settings__js-posts-add-btn",(function(){var t,e,n=p.autocomplete("instance");try{var i=n.selectedItem;t=i.id,e=i.label}catch(t){return}g(t,e)})),o.default(document).on("keypress","#twrpb-posts-settings__js-posts-search",(function(t){if(13!==(t.keyCode?t.keyCode:t.which))return;t.preventDefault();var e,n,i=p.autocomplete("instance");try{var r=i.selectedItem;e=r.id,n=r.label}catch(t){return}g(e,n)})),o.default(document).on("click",".twrpb-posts-settings__js-post-remove-btn",(function(){var t=o.default(this).closest("[data-post-id]").attr(h);if(!((t=Number(t))>0))return;!function(t){(function(t){var e=u.find('[data-post-id="'+t+'"]');e.removeAttr(h),d.hideLeft(e,"remove")})(t),function(t){var e=String(b.val());t=String(t);var n=e.split(";"),i=n.indexOf(t);-1!==i&&(n.splice(i,1),b.val(n.join(";")))}(t),y()}(t)}));var v=o.default("#twrpb-posts-settings__js-no-posts-selected");function y(){u.find("[data-post-id]").length>0&&d.hideLeft(v),u.find("[data-post-id]").length>0||d.showLeft(v)}function m(){var t=u.find(".twrpb-posts-settings__post-item").filter("[data-post-id]"),e=[];t.each((function(){var t=o.default(this).attr(h);(t=+t)>0&&e.push(t)})),b.val(e.join(";"))}function j(t){return o.default("<div>").html(t).text()}o.default(y),o.default((function(){u.sortable({placeholder:"twrpb-display-list__placeholder",stop:m})}))}).call(this,"undefined"!=typeof global?global:"undefined"!=typeof self?self:"undefined"!=typeof window?window:{})},{"../../admin-blocks/twrpb-hidden/twrpb-hidden":2}],13:[function(t,e,n){(function(t){"use strict";var e=this&&this.__importDefault||function(t){return t&&t.__esModule?t:{default:t}};Object.defineProperty(n,"__esModule",{value:!0});var i=e("undefined"!=typeof window?window.jQuery:void 0!==t?t.jQuery:null);i.default(document).on("click",".twrpb-queries-table__delete-link",(function(t){var e=i.default("#twrpb-query-settings__before-deleting-confirmation").attr("data-twrpb-query-delete-confirm");confirm(e)||t.preventDefault()}))}).call(this,"undefined"!=typeof global?global:"undefined"!=typeof self?self:"undefined"!=typeof window?window:{})},{}],14:[function(t,e,n){(function(e){"use strict";var i=this&&this.__importDefault||function(t){return t&&t.__esModule?t:{default:t}};Object.defineProperty(n,"__esModule",{value:!0});var r=i("undefined"!=typeof window?window.jQuery:void 0!==e?e.jQuery:null);"undefined"!=typeof window?window.jQuery:void 0!==e&&e.jQuery;var a=t("../../admin-blocks/twrpb-hidden/twrpb-hidden"),o=r.default("#twrpb-search-setting__js-search-input"),d=r.default("#twrpb-setting-note__search_query_too_short_warning");function s(){var t=String(o.val()).length;0!==t&&t<4?a.showUp(d):a.hideUp(d)}r.default(s),r.default(document).on("change","#twrpb-search-setting__js-search-input",s)}).call(this,"undefined"!=typeof global?global:"undefined"!=typeof self?self:"undefined"!=typeof window?window:{})},{"../../admin-blocks/twrpb-hidden/twrpb-hidden":2}],15:[function(t,e,n){(function(e){"use strict";var i=this&&this.__importDefault||function(t){return t&&t.__esModule?t:{default:t}};Object.defineProperty(n,"__esModule",{value:!0});var r=i("undefined"!=typeof window?window.jQuery:void 0!==e?e.jQuery:null);"undefined"!=typeof window?window.jQuery:void 0!==e&&e.jQuery;var a=t("../../admin-blocks/twrpb-hidden/twrpb-hidden"),o=r.default("#twrpb-statuses-settings__js-apply-select"),d=r.default("#twrpb-statuses-settings__js-statuses-wrapper");function s(){"not_applied"===o.val()?a.hideUp(d):a.showUp(d)}r.default(document).on("change","#twrpb-statuses-settings__js-apply-select",s),r.default(s)}).call(this,"undefined"!=typeof global?global:"undefined"!=typeof self?self:"undefined"!=typeof window?window:{})},{"../../admin-blocks/twrpb-hidden/twrpb-hidden":2}],16:[function(t,e,n){"use strict";Object.defineProperty(n,"__esModule",{value:!0}),t("./admin-blocks/twrpb-hidden/twrpb-hidden"),t("./admin-blocks/twrpb-collapsible/twrpb-collapsible"),t("./documentation-page/twrpb-documentation-page"),t("./general-settings/twrpb-general-settings"),t("./query-settings/twrpb-advanced-settings/twrpb-advanced-settings"),t("./query-settings/twrpb-author-settings/twrpb-author-settings"),t("./query-settings/twrpb-cat-settings/twrpb-cat-settings"),t("./query-settings/twrpb-comments-settings/twrpb-comments-settings"),t("./query-settings/twrpb-date-settings/twrpb-date-settings"),t("./query-settings/twrpb-meta-setting/twrpb-meta-setting"),t("./query-settings/twrpb-order-setting/twrpb-order-setting"),t("./query-settings/twrpb-posts-settings/twrpb-posts-settings"),t("./query-settings/twrpb-query-settings/twrpb-query-settings"),t("./query-settings/twrpb-search-setting/twrpb-search-setting"),t("./query-settings/twrpb-statuses-settings/twrpb-statuses-settings"),t("./widget-blocks/twrp-widget-form"),t("./widget-blocks/twrp-widget-components"),n.default={}},{"./admin-blocks/twrpb-collapsible/twrpb-collapsible":1,"./admin-blocks/twrpb-hidden/twrpb-hidden":2,"./documentation-page/twrpb-documentation-page":3,"./general-settings/twrpb-general-settings":4,"./query-settings/twrpb-advanced-settings/twrpb-advanced-settings":5,"./query-settings/twrpb-author-settings/twrpb-author-settings":6,"./query-settings/twrpb-cat-settings/twrpb-cat-settings":7,"./query-settings/twrpb-comments-settings/twrpb-comments-settings":8,"./query-settings/twrpb-date-settings/twrpb-date-settings":9,"./query-settings/twrpb-meta-setting/twrpb-meta-setting":10,"./query-settings/twrpb-order-setting/twrpb-order-setting":11,"./query-settings/twrpb-posts-settings/twrpb-posts-settings":12,"./query-settings/twrpb-query-settings/twrpb-query-settings":13,"./query-settings/twrpb-search-setting/twrpb-search-setting":14,"./query-settings/twrpb-statuses-settings/twrpb-statuses-settings":15,"./widget-blocks/twrp-widget-components":17,"./widget-blocks/twrp-widget-form":18}],17:[function(t,e,n){(function(t){"use strict";var e=this&&this.__importDefault||function(t){return t&&t.__esModule?t:{default:t}};Object.defineProperty(n,"__esModule",{value:!0});var i=e("undefined"!=typeof window?window.jQuery:void 0!==t?t.jQuery:null);"undefined"!=typeof window?window.jQuery:void 0!==t&&t.jQuery,i.default((function(){i.default(".twrp-widget-components").tabs({active:0})}))}).call(this,"undefined"!=typeof global?global:"undefined"!=typeof self?self:"undefined"!=typeof window?window:{})},{}],18:[function(t,e,n){(function(t){"use strict";var e=this&&this.__awaiter||function(t,e,n,i){return new(n||(n=Promise))((function(r,a){function o(t){try{s(i.next(t))}catch(t){a(t)}}function d(t){try{s(i.throw(t))}catch(t){a(t)}}function s(t){var e;t.done?r(t.value):(e=t.value,e instanceof n?e:new n((function(t){t(e)}))).then(o,d)}s((i=i.apply(t,e||[])).next())}))},i=this&&this.__generator||function(t,e){var n,i,r,a,o={label:0,sent:function(){if(1&r[0])throw r[1];return r[1]},trys:[],ops:[]};return a={next:d(0),throw:d(1),return:d(2)},"function"==typeof Symbol&&(a[Symbol.iterator]=function(){return this}),a;function d(a){return function(d){return function(a){if(n)throw new TypeError("Generator is already executing.");for(;o;)try{if(n=1,i&&(r=2&a[0]?i.return:a[0]?i.throw||((r=i.return)&&r.call(i),0):i.next)&&!(r=r.call(i,a[1])).done)return r;switch(i=0,r&&(a=[2&a[0],r.value]),a[0]){case 0:case 1:r=a;break;case 4:return o.label++,{value:a[1],done:!1};case 5:o.label++,i=a[1],a=[0];continue;case 7:a=o.ops.pop(),o.trys.pop();continue;default:if(!(r=o.trys,(r=r.length>0&&r[r.length-1])||6!==a[0]&&2!==a[0])){o=0;continue}if(3===a[0]&&(!r||a[1]>r[0]&&a[1]<r[3])){o.label=a[1];break}if(6===a[0]&&o.label<r[1]){o.label=r[1],r=a;break}if(r&&o.label<r[2]){o.label=r[2],o.ops.push(a);break}r[2]&&o.ops.pop(),o.trys.pop();continue}a=e.call(t,o)}catch(t){a=[6,t],i=0}finally{n=r=0}if(5&a[0])throw a[1];return{value:a[0]?a[1]:void 0,done:!0}}([a,d])}}},r=this&&this.__importDefault||function(t){return t&&t.__esModule?t:{default:t}};Object.defineProperty(n,"__esModule",{value:!0});var a=r("undefined"!=typeof window?window.jQuery:void 0!==t?t.jQuery:null);"undefined"!=typeof window?window.jQuery:void 0!==t&&t.jQuery;var o="data-twrp-widget-id",d="data-twrp-query-id",s="data-twrp-selected-artblock",u=".twrp-widget-form__selected-queries-list",l=".twrp-widget-form__selected-queries",f=".twrp-widget-form__article-block-settings-container";function c(t,n){return e(this,void 0,void 0,(function(){var e;return i(this,(function(i){return b(t,n)||(e=String(a.default("#twrpb-plugin-widget-ajax-nonce").attr("data-twrpb-plugin-widget-ajax-nonce")),a.default.ajax({url:ajaxurl,method:"POST",data:{action:"twrp_widget_create_query_setting",widget_id:t,query_id:n,nonce:e}}).done((function(e){e.length>=25&&!b(t,n)&&(y(t).find(".twrp-widget-form__selected-queries-list").append(e),h(t),_())})).fail((function(t){console.error("Something went wrong with the ajax callback in addQueryToListIfDoNotExist() function,")}))),[2]}))}))}function p(){j().each((function(){for(var t=a.default(this),e=t.attr(o),n=function(t){var e=t.find(l),n=String(e.val()).split(";");return n=n.filter(i);function i(t){return Boolean(t)}}(t),i=0;i<n.length;i++)c(e,n[i]);h(e)}))}function w(){j().each((function(){a.default(this).find(u).sortable({update:function(){h(g(this))}})}))}function b(t,e){return!!m(t,e).length}function h(t){var e=y(t),n=e.find(u).find(".twrp-widget-form__selected-query"),i=[];n.each((function(){var t=a.default(this).attr(d);t&&i.push(t)}));var r=e.find(l),o=i.join(";");r.val(o)}function _(){j().each((function(){a.default(this).find("["+d+"]").each((function(){var t=a.default(this);t.accordion("instance")?t.accordion("refresh"):t.accordion({collapsible:!0,active:!1,heightStyle:"content"})}))}))}function g(t){return a.default(t).closest("["+o+"]").attr(o)}function v(t){return a.default(t).closest("["+d+"]").attr(d)}function y(t){return a.default(document).find("["+o+'="'+t+'"]')}function m(t,e){var n=y(t);return a.default(n).find("["+d+'="'+e+'"]')}function j(){return a.default(document).find("["+o+"]")}function k(t,e,n){var i=String(a.default("#twrpb-plugin-widget-ajax-nonce").attr("data-twrpb-plugin-widget-ajax-nonce"));return a.default.ajax({url:ajaxurl,method:"POST",data:{action:"twrp_widget_create_artblock_settings",artblock_id:n,widget_id:t,query_id:e,nonce:i}})}a.default(document).on("click",".twrp-widget-form__select-query-to-add-btn",(function(){var t=a.default(this).closest(".twrp-widget-form"),e=t.attr(o),n=String(t.find(".twrp-widget-form__select-query-to-add").val());c(e,n)})),a.default(document).on("click",".twrp-widget-form__remove-selected-query",(function(){var t=g(a.default(this)),e=v(a.default(this));(function(t,e){m(t,e).remove()})(t,e),h(t)})),a.default(p),a.default(document).on("widget-updated widget-added",p),a.default(w),a.default(document).on("widget-updated widget-added",w),a.default(_),a.default(document).on("widget-updated widget-added",_),a.default(document).on("change",".twrp-widget-form__article-block-selector",(function(){return e(this,void 0,void 0,(function(){var t,e,n,r;return i(this,(function(i){switch(i.label){case 0:return t=g(a.default(this)),e=v(a.default(this)),n=String(a.default(this).val()),function(t,e){if(!t||!e)return;Q[t]||(Q[t]=[]);Q[t][e]||(Q[t][e]=[]);var n=m(t,e).find("["+s+"]").clone(),i=n.attr(s);if(!i)return;Q[t][e][i]=n}(t,e),U(t,e,n)?(r=function(t,e,n){if(U(t,e,n))return Q[t][e][n];return!1}(t,e,n),[3,3]):[3,1];case 1:return[4,k(t,e,n)];case 2:r=i.sent(),i.label=3;case 3:return function(t,e,n){if("string"==typeof n&&n.length<25)return;var i=m(t,e).find(f);i.empty(),i.append(n)}(t,e,r),[2]}}))}))}));var Q=Array();function U(t,e,n){return!!(Q[t]&&Q[t][e]&&Q[t][e][n])}}).call(this,"undefined"!=typeof global?global:"undefined"!=typeof self?self:"undefined"!=typeof window?window:{})},{}]},{},[16]);
//# sourceMappingURL=script.js.map
