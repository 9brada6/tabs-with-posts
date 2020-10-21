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

## ✅ Todo

### Query Settings

- Finish Advanced Arguments.

- Date Filter: Hide note 2 when not necessary. Change name of note 2. Bring last
- checkbox(last days to first checkbox). Change the first note to a good explication(hard).

- Meta-Key: Add meta_key for the post order or separately.
- Hide meta key value if comparator is exists or not exists.
- Remove order from orderby that does not depend, like post__in
- Make transition better in Post_Settings and Author.
- Add a way when selected views/rating/popular posts plugin, to select only the first installed, the rest should be disabled.

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
- Custom date format is not working, make it disabled(not to hide).

### Icons

- Make icons work also inline and via a file.
- In tests, add coverage for each method.
- Google Clock, Filled, Outline, Duotone is wrong.
- Set default icon settings.


#### General Settings

- Change twrp to twrpb classes, change also ts filename, make ts scripts to work.
- Remove redundant get_default_option, and also remove all redundant 'default' keys from creating classes.

### JS/SCSS

### After first release

- 🥇 Add taxonomy options(with post formats).
- 📬 Add filters for all things.
- Put all Query Notes in a separate class.
- 🔀 Add a way to invert category icons?
