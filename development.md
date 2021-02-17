# Tabs With Recommended Posts - Development Notes

## External programs used

It's best to keep them updated.

- Pickr -> Included by default in the backend style/scripts. Pickr class does not exist globally. The original styles are not scoped, as is hard to do and they will not change in the future. Included only in the admin area.
- Codemirror -> Use WP default script/themes, a dark theme css is included, but is scoped inside a twrpb class. Included only in the admin area.
- Jquery-ui -> Use WP default scripts/themes, only a datepicker css theme exist, but is scoped inside a twrpb class. Included only in the admin area.

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

## ✅ Todo

Day:

- Add how orderby views plugin works a notice in orderby setting.
- Make all components work.
- Add order inside component setting.
- Tabs: flash of content: display only the first tab, even without javascript.

- Verify each icon alignment, in the simple style. Take the reference the user and the calendar icon.

### ✅ Todo Documentation

- Don't forget to add CSS specificity in documentation
- Don't forget to say that tabs are not displayed when only a single tab is displayed.
- Tell how to regenerate icons if one is not displayed.
- When say how to use orderby setting, say to add order by date if ordered first
by something else, like number of comments.
- When writing how the search orderby works in the documentation, add a link to
that from the search orderby note.
- When writing how the meta/meta_num orderby works in the documentation, add a link to
that from the meta/meta_num orderby note.
- Document each orderby option, and see whether or not orderby author/post type/...etc is influenced by order in which we declare authors/post types. 2. Unify parent_id note with post_id note if parent_id are not fetched from the array.
- Add in documentation examples on how to use advanced arguments in query settings and what query filters to use. Also make a link from query settings to documentation?
- Say that you can use Yoast plugin to set the primary category.
- Add in documentation how to set scheduled posts, and link from query settings there.
- Add how orderby views plugin works.

### Plugins

- Make Plugin DFactory Block Suppress filter option.
- GamerZ/BlazK: Sort by most rated/unrated posts.
- Site Reviews Plugin has a custom Category Id ratting, Think if we should implement that.
- Don't know how to count site reviews ratings, maybe email for support?
- Add each plugin, move orderby plugin indicators to classes.
- Test a plugin as a MU plugin to see with debugger how function Post_Meta::get_plugin_version() get the plugin keys, maybe we will need to make another get_plugin_file_relative_path for MU plugins?.

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
- ➕ In query templates, when resetting settings, make hidden texts be reset to default 0.
- ➕ Add a help button, and with a pop-out to document a setting if needed in General Settings Tab, also the document might be exactly as in documentation.
- Add support for more plugins that support primary category.

## 📖 Development Documentation

### Tools used

#### Phan

- Phan can be run via docker(see the script in the composer). In VSCode it comes pre-installed with the extension. It is not installed in vendor via composer.
- You need to change the Phan path in vscode workspace options when you change the PC.

### Assets

- In the backend script, the default jQuery UI included with WordPress is used. These must be compatible from jQuery ui version 11 and up.

### Packages

This documentation is split between packages.

### TWRP\Admin\ Package
