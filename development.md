# Tabs With Recommended Posts - Development Notes

## Plugins Used

- ### Rating Plugins

    How retrieving the rating:
    1. If the rating is displayed, and a plugin exist, then the meta should be displayed for all posts, even if they don't have a rating yet.
    2. If we have an average rating, then display the rating.
    3. If we don't have a rating average, then just display 0, and an empty star?.
    4. If we have a rating count and is selected to display and is above 0, then display it.

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

- ### Tabs

- If the browser does not support :focus-visible, then the style will show as :focus, to increase compatibility.
- Depending on what setting on the widget were used, to generate the inline style for a tab take 20ms(old laptop).
- Depending on what tabs and query were used, it will take some seconds to generate the tabs.

- ### Cache

- ! Careful, because the page is cached, getting posts or other things depending by the user privileges
can be dangerous, because an admin can generate a cache that should not be visible to a user that is not logged in.

## ✅ Todo

- Add a way for free plugin, to show a way of the other supported premium plugins.

- Tab Queries:

- Add a message, if the tab contents are empty.
- Add background component to meta 7,8 on YT style.

- ------------------------------------------------------------------------------

- Make ajax in widget when selecting article block to show a fail text.
- Make ajax show a "Loading..." text before loading widget.

- In General Settings, add a note to say that if you use a plugin with cache, then the cache should be refreshed.

- Remove schedule from documentation.

- ### TODO Manual Tests

- Add in manual test: Test disabled comment display align(usually, not having margin-right).
- Add in manual testing a lot of testing, mainly including javascript things.
- Add in Manual tests, to test the cache with various plugins.
- Add in Manual tests, to check if query templates work.
- Add in Manual tests to test query template, because they can go wrong very easy.
- Query/plugin, if a plugin from a category is not installed, then the query should say that the plugin is not installed
and show an error.

- ### ✅ Todo Documentation

    - Move the documentation to the last position, in he tabs.
    - Add some photos.
    - Make a link button, and add the id before the title, as when clicked on a link, to see the title(search on google how to do it before).

    Additional plugin supported notes:
    - Support main category from SEO.
    - YASR does not support ordered by count if is set to overall.

    General Settings:
    - Say that if a plugin to cache pages is used, then the page cache must be purged(deleted).
    - Say that all tables/settings are deleted when plugin is uninstalled.

    Cache:
    - Say how cache works, what plugin have been tested on.
    - Write in documentation what plugins are supported: WP Fastest Cache(By Emre Vona), Autoptimize(By Frank Goossens (futtta)), WP Super Cache(By Automattic), WP-Optimize(By David Anderson, Ruhani Rabin, Team Updraft), Hummingbird(By WPMU DEV), W3 Total Cache(By BoldGrid)
    - Say that all tables/settings are deleted when plugin is uninstalled.

    Query tabs:
    - Say that there should be not any difference in displaying between an admin and an user, because if an admin enter the website, the cache can be saved and all the users will see it.

    CSS:

    - Don't forget to add CSS specificity in documentation.
    - Say in documentation that tab variables css are better to be overwrite in tab main classes.
    - Say in YT style documentation to use the variables for yt style.

    Tabs:

    - Don't forget to say that tabs are not displayed when only a single tab is displayed.
    - A widget can be forced to load via ajax or not, via a method call.

    Article Block:

    - Say that you can use Yoast plugin to set the primary category.
    - Say in documentation that the thumbnails are loading lazy.
    - Add in documentation that you can overwrite an article block either via 'twrp-style-name.php' or 'twrp-templates/style-name.php'

    Documentation Style:

    - Add a style for documentation.
    - Add a style for twrpb-documentation__text-developer.

    Plugins:

    - Say how YASR rating plugin setting works, and also put a link from settings.
    - Say that YASR performance sucks when using to order by this plugin.(maybe say that also in settings).
    - Write in documentation that GamerZ like/dislike system is not working.

    Cache: Say how it works, and why is good to be enabled.

    Translations:

    - Add a section in documentation where you write about translations, how they work,
    and how to translate this plugin.

## 🎉 Todo: After first release

- Make widget work in elementor and other page builders, test other page builders how they work.
- Learn about multi-language support and test what external translation plugins, this plugin support.
- Test A3Rev views plugin, because we changed something.
- 🥇 Add taxonomy options(with post formats).
- ➕ When a tab query is deleted, then delete the tab from the widgets?(sounds very good), and if is not deleted, then improve the message that a tab is non existed in widget.
- ➕ Add a way to minimize CSS/HTML when is cached. CSS is very important to minimize, because there is a lot of improvement.
- ➕ Fix order By YASR plugin.
- Add in documentation to switch to another plugin if YASR plugin is used to get most rated posts.
- ➕ Add filters for all things.
- ➕ In the title component, add a setting to how many lines of text should be displayed.
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
- ➕ Test Redis object caching.
- ➕ In the settings, add a notice that says that the caching is not enabled, and is recommended to be enabled.
- ➕ In the script that generates the .POT file, do not override previous translations?
- Add more rating icons, like trophies, smiles, thumbs.
