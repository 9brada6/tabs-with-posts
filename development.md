# Tabs With Recommended Posts - Development Notes

## Plugins Used

- ### Rating Plugins

    How retrieving the rating:
    1. If the rating is displayed, and a plugin exist, then the meta should be displayed for all posts, even if they don't have a rating yet.
    2. If we have an average rating, then display the rating.
    3. If we don't have a rating average, then just display 0, and an empty star?.
    4. If we have a rating count and is selected to display and is above 0, then display it.

## Tabs

- The code use :focus-visible, and does not use additional @support check. Even if the support is 70%, the majority of the users that are impaired and need this feature use a browser, where this feature is supported. Also this is not something like a deal-breaker, since this feature is already widely being implemented as a spec.
- Depending on what setting on the widget were used, to generate the inline style for a tab take 20ms(old laptop).
- Depending on what tabs and query were used, it will take some seconds to generate the tabs.

## Cache

- The cache is created when:
    1. Any post is updated/add/deleted.

## ✅ Todo

- Benchmark file inclusion?
- In general settings, we get a javascript error: autocomplete is not a function.

- Make General_Options::get_option faster(and all other functions).

- Cache:
- Add a setting for cache refresh minutes.

- Bug: If we make a most rated posts, then we disable the plugin, the tab will display but the contents not.
- Bug: autoselect disable comment does not work.

- Test the widget outside(in customizer, elementor)... etc, and make it work.
- In the widget, add a photo where the meta are displayed about meta positions.

- Add in manual test: Test if cache disable works as expected. Test if cache works as expected. Test if cache fire at the actions.
- Add in manual test: Test disabled comment display align(usually, not having margin-right).
- Add in manual testing a lot of testing, mainly including javascript things.

- Make debugger not throw when class_exist_and_method is not exist.

- ### ✅ Todo Documentation

    - Add some photos.
    - Make a link button, and add the id before the title, as when clicked on a link, to see the title(search on google how to do it before).

    CSS:

    - Don't forget to add CSS specificity in documentation.
    - Say in documentation that tab variables css are better to be overwrite in tab main classes.
    - Say in YT style documentation to use the variables for yt style.

    Tabs:

    - Don't forget to say that tabs are not displayed when only a single tab is displayed.

    Article Block:

    - Say that you can use Yoast plugin to set the primary category.
    - Say in documentation that the thumbnails are loading lazy.
    - Add in documentation that you can overwrite an article block either via 'twrp-style-name.php' or 'twrp-templates/style-name.php'

    Documentation Style:

    - Add a style for documentation.
    - Add a style for twrpb-documentation__text-developer.

    Plugins:

    - Say how YASR rating plugin setting works, and also put a link from settings.
    - Write in documentation that GamerZ like/dislike system is not working.

    Cache: Say how it works, and why is good to be enabled.

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
- ➕ Maybe make the documentation and all the backend settings centered?(for ultra-wide monitors), or maybe only make centered on ultra-wide monitors.
- ➕ Add Translate strings setting, and say to use Loco Translate if they want to translate more.
- ➕ Add more rating/views plugins.
- ➕ Support more versions of KK rating plugin, maybe version 3.0 or 2.6 too?.
- ➕ Animate when a page is shown(increase height).
- ➕ Support reading time plugins.
- ➕ Improve browser compatibility.
- ➕ On widget refresh cache, after the success dispatch, say a message when the cache has been successfully created.

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

- ### Plugins

    - It seems that MU Plugins work, but we can't get the version yet.
