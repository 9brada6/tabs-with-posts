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

- Add accessibility to visual list remove button.
- Make all Add Category/Post/Author/.. etc to handle Add on enter and not submit the form.
- Make Category/Author/ORderby Query Settings Better.
- Comment post order functions.
- Read more about perm => 'readable' and 'editable' and add setting.
- Add post formats.
- Add permission.
- Make a way to remove deleted posts from include/exclude posts by id.
- Make a way to remove deleted authors.
- Make a way to remove deleted categories.
- Show if a post/category/author is deleted?
- There is a setting that is displaying the post even if it doesn't exit.
- Add a way for post order to order things via a filter.
- Add filters for all things?
- Add an init method to all classes.

### Plugins

- Make Plugin DFactory Block Suppress filter option.
- GamerZ/BlazK: Sort by most rated/unrated posts.
- Site Reviews Plugin has a custom Category Id ratting, Think if we should implement that.
- Don't know how to count site reviews ratings, maybe email for support?
- Add each plugin, move orderby plugin indicators to classes.

### General

- Put databases class in a new folder, with a new namespace.
- There should be a function for human diff in Utilities.
- Remove twrp_get_name and id from widget utilities.
- The plugin is very slow, find out why and repair it.
