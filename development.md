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

### Plugins

- Make Plugin DFactory Block Suppress filter option.
- GamerZ/BlazK: Sort by most rated/unrated posts.
- Site Reviews Plugin has a custom Category Id ratting, Think if we should implement that.
- Don't know how to count site reviews ratings, maybe email for support?
- Add each plugin, move orderby plugin indicators to classes.

### Widget

- Add regions is typescript files
- Add margin between before/after text and control.
- Add label and for attribute for checkbox control.
- Test a SVG color icon to see if the "fill" property will change it.

### General

- There should be a function for human diff in Utilities.
- Remove twrp_get_name and id from widget utilities.
- Use Webpack and not Rollup.
- When displaying the widget page there is an exception, most likely from first widget with id 0. Fix it.

### Icons

- Add License to FontAwesome
- Search what fill="currentColor" means
- Change vertical-align of the icons to em.
- See from where to use Icons: Linea?
- Add some colored icons?
- Remove all XML tags and all fill="none" tags.
- Reorder Google icons, all icons first after content, and then after type.

- Add another icons from these Packages: IconMonstr, Founsation

### After first release

- 🥇 Add taxonomy options(with post formats).
- 📬 Add filters for all things.
- Put all Query Notes in a separate class.
