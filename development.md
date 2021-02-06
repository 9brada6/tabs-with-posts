# Tabs With Recommended Posts - Development Notes

## External programs used

It's best to keep them updated.

- Codemirror
- Pickr

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

- Change by default to include icons inline?
- Add a help button, and with a pop-out to document something, also the document might be exactly as in documentation.

## ✅ Todo

- The tabs do not work if multiple widgets are displayed on the same page.
- Decrease column gap on smaller devices?
- If there is a single tab, then do not display tabs, just add a widget title.
- Generate Icon File when plugin is installed.
- Add more order by options in query_settings "order posts by" collapsible.
- Add more notes on order by options in query_settings.
- Make sure that Jquery UI JS that we enqueue don't interfere with other jquery ui.

### Query Settings

- Add interaction between settings warning: post__in and ignore_sticky_posts
will interact if they are both set. This warning should be shown only if they are both set.

- Add a lot of notices in order by setting. Some ideas: if orderby comments is
set in asc order. If only order by comments is set, then suggest to add orderby date.
- Add in documentation examples on how to use advanced arguments and what query filters to use.
- Order: maybe add more orders, like post__in?.

### Icons

- Make icons work inline(add before tabs, only one time, but we will do this later), and make them the default behavior.
- Verify each icon alignment, in the simple style. Take the reference the user and the calendar icon.

### Documentation

- Don't forget to add CSS specificity in documentation

## 🎉 Todo: After first release

- 🥇 Add taxonomy options(with post formats).
- ➕ Add filters for all things.
- ➕ Add a way to invert category icons?
- ➕ Add a way to "Only Include/Exclude specific posts" to also including all the post children with a checkbox option.
- ➕ Add a preview query posts in the backend. If we add a query preview in the backend, add a warning that will say that sticky posts are not included here.
- ➕ Add in Date Query settings, a way to select posts from this week and this month, 3-7 days(easy).
- ➕ Move all TypeScript display items(Query Settings) into a single one implementation.
- ➕ When drag & drop a display item in query setting, add a replace item with the same dimension as the original item that is being dragged.
- ➕ Backend typescript is compiled with strict: false option. Try to compile it with strict enable and remove any error.
- ➕ Try to change the .pickr class of the color selection. Other plugins might use .pickr and change our CSS.
- ➕ Custom date format, make it disabled(not to hide). Does not make any sense to do this.
- ➕ When a query is saved or deleted, in the save or delete notification, also add the name of the query(better user experience), if possible.
- ➕ Try to speed up plugins, by trying to make a single call to database. For example for a list of posts, don't get the views for each one, but for all together.

### Plugins

- Make Plugin DFactory Block Suppress filter option.
- GamerZ/BlazK: Sort by most rated/unrated posts.
- Site Reviews Plugin has a custom Category Id ratting, Think if we should implement that.
- Don't know how to count site reviews ratings, maybe email for support?
- Add each plugin, move orderby plugin indicators to classes.
- Test a plugin as a MU plugin to see with debugger how function Post_Meta::get_plugin_version() get the plugin keys, maybe we will need to make another get_plugin_file_relative_path for MU plugins?.

## 📖 Development Documentation

### Tools used

#### Phan

- Phan can be run via docker(see the script in the composer). In VSCode it comes pre-installed with the extension. It is not installed in vendor via composer.
- You need to change the Phan path in vscode workspace options when you change the PC.

### Packages

This documentation is split between packages.

### TWRP\Admin\ Package
