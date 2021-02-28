# Tabs With Recommended Posts - Development Notes

## Plugins Used

- ### Rating Plugins

    How retrieving the rating:
    1. If the rating is displayed, and a plugin exist, then the meta should be displayed for all posts, even if they don't have a rating yet.
    2. If we have an average rating, then display the rating.
    3. If we don't have a rating average, then just display 0, and an empty star?.
    4. If we have a rating count and is selected to display and is above 0, then display it.

    YASR Rating Plugin
    BlazK Rating Plugin
    GamerZ Rating Plugin

## ✅ Todo

- Add rating plugins.
- Add an option to select whether or not to display rating counts, and style the rating counts.
- Change all plugin images from png to jpg and resize them, and compress them.

- Scheduled posts can only be viewed by authors? disable link for them?
- Fix colors, border-radius, tab button size, and calculate others.
- Add pages to the tabs.

- Test a plugin as a MU plugin to see with debugger how function Post_Meta::get_plugin_version() get the plugin keys, maybe we will need to make another get_plugin_file_relative_path for MU plugins?.

- Add in manual testing that each gettext _x, _ex, etc should have as a context "backend, documentation".

- Make Article Block first search in child theme, then in theme, then in plugin, add this thing in documentation.

- ### ✅ Todo Documentation

    - Add some photos.
    - Make a link button, and add the id before the title, as when clicked on a link, to see the title(search on google how to do it before).

    CSS:

    - Don't forget to add CSS specificity in documentation

    Tabs:

    - Don't forget to say that tabs are not displayed when only a single tab is displayed.

    Article Block:

    - Say that you can use Yoast plugin to set the primary category.
    - Say in documentation that the thumbnails are loading lazy.

    Documentation Style:

    - Add a style for documentation.
    - Add a style for twrpb-documentation__text-developer.

    Plugins:

    - Say how YASR rating plugin setting works, and also put a link from settings.
    - Write in documentation that GamerZ like/dislike system is not working.

- ### ✅ Plugins

    - Change Get last tested, with get tested versions?

    - Make Plugin DFactory Block Suppress filter option.
    - Site Reviews Plugin has a custom Category Id ratting, Think if we should implement that.
    - Don't know how to count site reviews ratings, maybe email for support?
    - Add each plugin, move orderby plugin indicators to classes.

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
- ➕ Add support for more plugins that support primary category.
- ➕ Add support to sort by rating.
- ➕ Try to speed up every plugin, by adding a static variable to hold an internal cache for each post id of average/sum_votes(especially the rating plugins).
- ➕ Maybe try to test more YASR Rating Plugin? I didn't tested very good and maybe there is a very hard bug to find.
- ➕ Maybe make the documentation and all the backend settings centered?(for ultra-wide monitors)

## 📖 Development Documentation

- ### Tools used

    Phan

    - Phan can be run via docker(see the script in the composer). In VSCode it comes pre-installed with the extension. It is not installed in vendor via composer.
    - You need to change the Phan path in vscode workspace options when you change the PC.

- ### External programs used

    It's best to keep them updated.

    - Pickr -> Included by default in the backend style/scripts. Pickr class does not exist globally. The original styles are not scoped, as is hard to do and they will not change in the future. Included only in the admin area.
    - Codemirror -> Use WP default script/themes, a dark theme css is included, but is scoped inside a twrpb class. Included only in the admin area.
    - Jquery-ui -> Use WP default scripts/themes, only a datepicker css theme exist, but is scoped inside a twrpb class. Included only in the admin area.

- ### Assets

    - In the backend script, the default jQuery UI included with WordPress is used. These must be compatible from jQuery ui version 11 and up.

- ### Article Blocks

    - The line clamp work on 96% desktop browsers. On IE11 ellipses(...) are not displayed, but the text is on 3 lines.
