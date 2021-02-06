# Manual Testing

## Query Settings Manual Testing

- Test each setting, and each javascript thing that might be pop-out/hide when a setting change.
- Add here a list of more explicit things to test.

## Icons Manual Testing

- Checked to see if they align in the middle:
- Comments          ( Captain Icons, Dashicons, Feather, FontAwesome, Foundation, Google, IconMonstr, Ionicons, JamIcons, Linea, Octicons, TypIcons )
- Date              ( Captain Icons, Dashicons, Feather, FontAwesome, Foundation, Google, IconMonstr, Ionicons, JamIcons, Linea, Octicons, TypIcons )
- Disabled Comments ( Captain Icons*, Dashicons, Feather*, FontAwesome, Foundation*, Google*, IconMonstr, Ionicons*, JamIcons*, Linea, Octicons*, TypIcons* )
- Rating            ( Captain Icons*, Dashicons, Feather*, FontAwesome, Foundation*, Google*, IconMonstr*, Ionicons*, JamIcons*, Linea*, Octicons*, TypIcons* )
- Taxonomy          ( Captain Icons, Dashicons, Feather, FontAwesome, Foundation, Google, IconMonstr, Ionicons, JamIcons, Linea, Octicons, TypIcons )
- User              ( Captain Icons, Dashicons, Feather, FontAwesome, Foundation, Google, IconMonstr, Ionicons, JamIcons, Linea*, Octicons, TypIcons )
- Views             ( Captain Icons, Dashicons, Feather, FontAwesome, Foundation, Google, IconMonstr, Ionicons, JamIcons, Linea, Octicons, TypIcons )
- (*) = No icons yet.

- Check that each rating pack have 3 different icons, empty, half-filled, and filled.

## CSS of Article Blocks

1. Each element that exist in a template file must have at least a class(BEM style).
2. Each class element must be declared in the SCSS file, even if that we don't need to style that class.(Some classes might not be declared only if they target same element, and they are additional descriptors. Ex: an element with &__meta and &__meta-author is unnecessary to add &__meta-author in SCSS file if it is not needed.)
3. Each block element, or inline element, like div, span, h tags, a, article/sections elements must extend .twrp-box mixin, including the main element. Exceptions are elements that use .twrp-thumbnail-wrapper and .twrp-thumbnail, since these mixins are already included
in the classes.
4. Only these elements can be used in a template: div, span, h tags, a, article/sections.
5. Usually only one a(anchor) tag should be used.
6. Each element must not declare css proprieties that can inherit: font-weight, font-face, font-kerning... etc. The only exceptions are font-size, word-break, word-wrap, white-spacing and line-height, but line-height should be used only when calculating the number of lines to be displayed.
7. Meta elements should have font-variant-numeric: lining-nums; to align the numbers in meta with the icons.
8. All anchors should have the color and background color set in CSS, including in hover, focus state.
9. Make sure that .twrp-block-padding class is added to the child of main article block if needed for horizontal padding.
10. Make sure no margin bottom is on last article element, and no margin top is on last article element. For each combination of last-item, first item possible.
