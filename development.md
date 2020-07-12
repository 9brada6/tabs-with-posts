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
- Make Category/Author/ORderby Query Settings Better.
- Make a way to remove deleted categories.
- Show if a post/category/author is deleted? Update: - post is not show, - author is not show.

- Make hideLeft/showRight javascript animations work.

- Add meta_key for the post order.
- Date Filter: Hide note 2 when not necessary. Change name of note 2. Bring last
- checkbox(last days to first checkbox). Change the first note to a good explication(hard).
- Post order remove flash of content.

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

### After first release

- 🥇 Add taxonomy options(with post formats).
- 📬 Add filters for all things.
