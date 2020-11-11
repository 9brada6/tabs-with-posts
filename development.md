# Tabs With Recommended Posts - Development Notes

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

## Read Before Development

This documentation is split between packages.

### TWRP\Admin\ Package

## ✅ Todo

### Query Settings

- Add something in query_generator like pre applied args to query args, where the
pre applied args will ne no_found_rows, and post_status => published.

- Manually verified each setting: Name, Post Type, Post Statuses, Post Order, Posts Settings.

- Finish Advanced Arguments.
- Meta Value: Maybe do not add meta_value if the comparator is Exist or not exist. Maybe try to
detect if an int is present in intval, and add as a comparator to int. Maybe add a note that
say leave empty to not apply, or add a checkbox that must be checked to apply the setting.

- Create a nice query tab, including the message when no queries are present. Maybe move the actions button to the right?

- Date Filter: Hide note 2 when not necessary. Change name of note 2. Bring last
- checkbox(last days to first checkbox). Change the first note to a good explication(hard).
- Meta Settings verify if add_query_args is good, hasn't been verified before.

- Add a way when selected views/rating/popular posts plugin, to select only the first installed, the rest should be disabled.

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

- In Gulp, when a SCSS file fail to compile, no error is displayed. Try to fix it. For example, if we add an import
that does not exist, the gulp won't show an error, it just will not compile.

### Icons

- Make icons work inline(add before tabs, only one time, but we will do this later), and make them the default behavior.
- In tests, add coverage for each method.
