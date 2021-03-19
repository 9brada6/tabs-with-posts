# Manual Testing

## Assets

- Make sure that in the backend script, the JQuery ui widgets used are compatible with Jquery UI v11 and up.

## Query Settings Manual Testing

- Test each setting, see in the debugger if it is as there should be.
- Be sure that only these types of controls are used: text, number, checkbox, radio, date, number, select, textarea, and hidden(with a custom JS thing).
- Test each note/warning when a setting change, also test them after/before the templates are set/resets.
- Add here a list of more explicit things to test.
- By default each control setting must have a default setting, even that is hidden by something else.
- Its very good to keep settings hidden with a "No apply" select, mandatory for settings that are too long.
- Hidden settings and textarea must always have a "No apply" select.
- All date controls should have yy-mm-dd format.
- All settings should be only in the first array, aka the array of settings should not be a multidimensional array, except for a checkbox setting(that are array by default).
- Each link to a documentation section should work, and open in a new tab.

## Icons Manual Testing

- Checked to see if they align in the middle:
- Check that each rating pack have 3 different icons, empty, half-filled, and filled.

## Widget

- If a setting is changed, the "Save" button becomes active, for all items.

### Components

- Components settings by default should be collapsed(hidden).
- Order of components tab buttons should be the same as they appear in the HTML.
- If any component setting change, components settings should be open. This should work either if the page is refreshed, or if a new/previous style was selected.
- The only component setting controls that should be used are: number, pickr color-picker, select.
- If any new setting control is added, make sure that is verified.
- All the pickr color picker controls by default their value should be blank(no value).
- All the number inputs controls, by default should be empty(no value).
- All the select controls that apply CSS, should have an option "Not Apply" that must be default.

## Tabs

1. The tab buttons text should not have space before/after the HTML tags, because text-decoration might be applied wrong.
2. Test how each article block style works with show more posts button.

## CSS of Tabs

1. The mixin twrp-tab-clean-style must contain all tab classes, even that they have no style.
2. Each tab must implement the mixin twrp-tab-clean-style.
3. Each element must implement twrp-box, anchor tags should also implement twrp-anchor.
4. When displaying, any tab should not have any flash of content.

## Article Blocks

1. There should be no space between HTML tags and the meta/title. So the starting HTML and ending tags should be on the same line as the meta/title output(because text-decoration might get applied wrong).
2. Each article block should show the thumbnail if the option is selected. If is not selected, then an image that say no thumbnail available must be placed.
3. Add a title that has a lot HTML tags.
4. Test each meta/title with a long text, and long unbreakable text.
5. Make sure that each function written in an article block reference article block class, even the_title() or the_permalink().
6. Usually, the title should have &__title, and the meta should have &__meta.
7. Test how each article block style works with show more posts button.

## CSS of Article Blocks

1. Each element that exist in a template file must have at least a class(BEM style).
2. Each class element must be declared in the SCSS file, even if that we don't need to style that class.(Some classes might not be declared only if they target same element, and they are additional descriptors. Ex: an element with &__meta and &__meta-author is unnecessary to add &__meta-author in SCSS file if it is not needed.)
3. Each block element, or inline element, like div, span, h tags, a, article/sections elements must extend .twrp-box mixin, including the main element. Exceptions are elements that use .twrp-thumbnail-wrapper and .twrp-thumbnail, since these mixins are already included in the classes.
4. Only these elements can be used in a template: div, span, h tags, a, article/sections.
5. Usually only one a(anchor) tag should be used.
6. Each element must not declare css proprieties that can inherit: font-weight, font-face, font-kerning... etc. The only exceptions are font-size, word-break, word-wrap, white-spacing and line-height.
7. Meta elements should have font-variant-numeric: lining-nums; to align the numbers in meta with the icons.
8. All anchors should have the color and background color set in CSS, including in hover, focus state.
9. ???? Make sure that .twrp-block-padding class is added to the child of main article block if needed for horizontal padding.
10. Make sure no margin bottom is on last article element, and no margin top is on last article element. For each combination of last-item, first item possible. Margin-top: auto or margin-bottom: auto is permitted to align blocks in grid.
11. Each article block should have word-wrap: break-word where is necessary, including in the title and meta. Test this by inserting long lines of text.
12. Make sure that each component has in css transition defined, transition is a CSS property that is not inherited.
13. Any block should import twrp-block-mixin, and additionally, any meta item should have the class &__meta, title should have the class &__title.
14. Test how article blocks are displayed in grid mode when the title/meta is longer than the others. Make sure is
displayed nice. As a fix, add margin-top:auto/margin-bottom: auto; on first/last item.

## Plugins

1. Test each plugin very good.
2. Each function/class/method used by the plugin should be verified if exists in the plugin_is_installed function.
3. Each custom plugin that use a Database table to retrieve the custom data to display/order posts, must verify first if the Mysql table exist in database.
4. Be sure that the plugins must not have the same order, and the plugins order must be declared in interface they implement.
5. Make sure that each plugin has an avatar and is displayed in documentation.

## Documentation

1. Make sure that each gettext function(\_x, \_ex, ..etc) have the context "backend, documentation".
