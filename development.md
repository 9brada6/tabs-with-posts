# Tabs With Recommended Posts - Development Notes

## Article Blocks

- The line clamp work on 96% desktop browsers. On IE11 ellipses(...) are not displayed, but the text is on 3 lines.

## Plugins Used

### Rating Plugins

#### YASR Rating Plugin

    - ✔ Can get the rating for a post.
    - ❌ Can NOT order the posts via rating.

#### BlazK Rating Plugin

    - ✔ Can get the rating for a post.
    - ✔ Can order the posts via a post meta.
    - ✔ Functions used are don't have a chance to change in future, and even, a
    deprecation warning might be displayed(as in other parts of the code).

#### General Settings

- Change twrp to twrpb classes, change also ts filename, make ts scripts to work.
- Add a diagram, and explain everything, how this package works.
- Change by default to include icons inline?
- Add a help button, and with a pop-out to document something, also the document
might be exactly as in documentation.

### JS/SCSS

- Need to do something with jquery-ui-datepicker. Best thing to do is to prefix
it with twrpb or something like that.

### Today

- Split all Query_Settings classes in half, and move them inside admin menu.
- Add a way to order query settings.

### After first release

- 🥇 Add taxonomy options(with post formats).
- ➕ Add filters for all things.
- ➕ Add a way to invert category icons?
- ➕ Add a way to "Only Include/Exclude specific posts" to also including all the post children with a checkbox option.
- ➕ Add a preview query posts in the backend. If we add a query preview in the backend, add a warning that will say that sticky posts are not included here.
- ➕ Add in Date Query settings, a way to select posts from this week and this month, 3-7 days(easy).
- ➕ Move all TypeScript display items(Query Settings) into a single one implementation.
- ➕ When drag & drop a display item in query setting, add a replace item with the same dimension as the original item that is being dragged.

## Read Before Development

This documentation is split between packages.

### TWRP\Admin\ Package

## ✅ Todo

### Query Settings

- Add interaction between settings warning: post__in and ignore_sticky_posts
will interact if they are both set. This warning should be shown only if they are both set.

- Add a lot of notices in order by setting. Some ideas: if orderby comments is
set in asc order. If only order by comments is set, then suggest to add orderby date.

- Add a nice "Settings successfully saved" or "deleted" message.

- Add in documentation examples on how to use advanced arguments and what query filters to use.
- Order: maybe add more orders, like post__in?.

### Plugins

- Make Plugin DFactory Block Suppress filter option.
- GamerZ/BlazK: Sort by most rated/unrated posts.
- Site Reviews Plugin has a custom Category Id ratting, Think if we should implement that.
- Don't know how to count site reviews ratings, maybe email for support?
- Add each plugin, move orderby plugin indicators to classes.
- Test a plugin as a MU plugin to see with debugger how function Post_Meta::get_plugin_version() get the plugin keys, maybe we will need
to make another get_plugin_file_relative_path for MU plugins?.

### Widget

- Add regions is typescript files
- Add margin between before/after text and control.
- Add label and for attribute for checkbox control.
- Test a SVG color icon to see if the "fill" property will change it.

### General

- There should be a function for human diff in Utilities.
- Remove twrp_get_name and id from widget utilities.
- When displaying the widget page there is an exception, most likely from first widget with id 0. Fix it.
- Change all "twrp" css/classes backend prefix with "twrpb"
- Custom date format, make it disabled(not to hide).
- Remove per widget date format.
- Make General_Setting_Creator and all of his subclass implement BEM... interface.
- Change .pickr class.
- The widget component settings are added multiple times(for example the color)(but that should be the default behavior since we have one per each query), and work between widgets, need to make
them work only on the specific widget selected.
- Remove !important from block components css, and make sure that they work.
- Remove the additional CSS that is added to each component, if no custom css is present.

- In Gulp, when a SCSS file fail to compile, no error is displayed. Try to fix it. For example, if we add an import
that does not exist, the gulp won't show an error, it just will not compile.

### Icons

- Make icons work inline(add before tabs, only one time, but we will do this later), and make them the default behavior.
- In tests, add coverage for each method.
- Verify each icon alignment, in the simple style. Take the reference the user and the calendar icon.

### Tab Style

- Make sure that all the styles for tabs exist.
- Make sure that the style is tested(how?)
