<?php

namespace TWRP\Admin\Tabs\Documentation;

use TWRP\Admin\Tabs\Documentation_Tab;
use TWRP\Utils\Helper_Trait\BEM_Class_Naming_Trait;

/**
 * Class that is used to display the tab queries documentation. Mostly used as
 * a class for the separation of the content between files.
 */
class Tab_Queries_Docs {

	use BEM_Class_Naming_Trait;

	protected function get_bem_base_class() {
		$documentation_tab = new Documentation_Tab();
		return $documentation_tab->get_bem_base_class();
	}

	public function display() {
		?>
		<h2 class="<?php $this->bem_class( 'title-section' ); ?>"><?= esc_html_x( 'Tab Queries', 'backend, documentation', 'twrp' ); ?></h2>

		<p>
			<?=  esc_html_x( 'In the tab queries, you can select what kinds of posts to display under one tab. Ex: Last Posts, Most Viewed, Post in a specific category... etc. You must add a tab query or more to use this plugin, give a name, and modify later if necessary. You can use a tab query in more than one widget.', 'backend, documentation', 'twrp' ); ?>
		</p>

		<p>
			<?=  esc_html_x( 'There are a lot of options of which you can create your own query, you can see how these work by applying a starter template, and modify from there, maybe add more post types, or exclude some categories... the number of possibilities is big.', 'backend, documentation', 'twrp' ); ?>
		</p>

		<p class="<?php $this->bem_class( 'developer-text' ); ?>">
			<?=  esc_html_x( 'If not even then, in the last option you can add a JSON text, with the WP_Query arguments, that will overwrite all the above applied arguments, and if that isn\'t enough and you want to write in PHP, then the filter "twrp_get_query_arguments_created" where the first argument is an array with the WP_Query arguments(second is the tab query id) can do it for you.', 'backend, documentation', 'twrp' ); ?>
		</p>

		<p>
			<?=  esc_html_x( 'Below are some of the setting that might be confused, explained:', 'backend, documentation', 'twrp' ); ?>
		</p>

		<h3 class="<?php $this->bem_class( 'title-sub-section' ); ?>"><?=  esc_html_x( 'Starting template setting', 'backend, documentation', 'twrp' ); ?></h3>

		<p>
			<?=  esc_html_x( 'The starting templates are there to give users an insight of how the settings should work. By filling the most important ones, the user can then expand for them, changing other settings if needed.', 'backend, documentation', 'twrp' ); ?>
		</p>

		<h3 class="<?php $this->bem_class( 'title-sub-section' ); ?>"><?=  esc_html_x( 'Name setting', 'backend, documentation', 'twrp' ); ?></h3>

		<p>
			<?=  esc_html_x( 'Differentiate between tab queries, giving them a name. As written in the note below it, the name is for you to know what posts the tab is displaying, and is not displayed in the frontend.', 'backend, documentation', 'twrp' ); ?>
		</p>

		<h3 class="<?php $this->bem_class( 'title-sub-section' ); ?>"><?=  esc_html_x( 'Post statuses setting', 'backend, documentation', 'twrp' ); ?></h3>

		<p>
			<?=  esc_html_x( 'If not custom added, only "Published" should be shown, which is also the default value. There isn\'t much of doing here, the "Scheduled" status wasn\'t added because it may show unwanted posts, but below(at advance arguments) there is an explanation of how exactly to set to show only some scheduled posts. The "private" is also not an option here, because those are meant for administrators and editors, not for users.', 'backend, documentation', 'twrp' ); ?>
		</p>

		<p>
			<?=  esc_html_x( 'By writing the custom post statuses in the advanced query settings, you somehow realize that some unwanted posts might show to the users, and you become more carefully.', 'backend, documentation', 'twrp' ); ?>
		</p>

		<h3 id="<?php $this->bem_class( 'ordering-settings' ); ?>" class="<?php $this->bem_class( 'title-sub-section' ); ?>"><?=  esc_html_x( 'Order of posts setting', 'backend, documentation', 'twrp' ); ?></h3>

		<p>
			<?=  esc_html_x( 'There are 3 order options, you can use all 3 or none. Usually you must set something to be sure that what is displayed is what you want. The most common ordering is by date in descending order(to get last posts).', 'backend, documentation', 'twrp' ); ?>
		</p>

		<p>
			<?=  esc_html_x( 'Because most of the ordering itself is pretty much self-documented by the name, below are just some of the settings that might have some quirks.', 'backend, documentation', 'twrp' ); ?>
		</p>

		<p>
			<b><?=  esc_html_x( 'Ordering by searching terms:', 'backend, documentation', 'twrp' ); ?></b>
			<?=  esc_html_x( 'Order by search terms in the following order: First, whether the entire sentence is matched. Second, if all the search terms are within the titles. Third, if any of the search terms appear in the titles. And, fourth, if the full sentence appears in the contents.', 'backend, documentation', 'twrp' ); ?>
		</p>

		<p>
			<b><?=  esc_html_x( 'Meta order:', 'backend, documentation', 'twrp' ); ?></b>
			<?=  esc_html_x( 'There are 2 meta ordering, alphabetically and numerically, it\'s pretty easy to choose correctly, if you have numbers choose numerically, otherwise alphabetically. If you chose alphabetically when you should choose numbers, then instead of ordering ascending by meta like this: 12, 45, 114, 324.. etc, it will order like this: 114, 12, 324, 45. I hope you get the idea, will compare by first different digit, not the number as a whole.', 'backend, documentation', 'twrp' ); ?>
		</p>

		<p>
			<b><?=  esc_html_x( 'Views order:', 'backend, documentation', 'twrp' ); ?></b>
			<?=  esc_html_x( 'When ordering by views ordering, depending on how the plugin works, either the suppress filters or meta setting will be overwritten. The views plugin "WP-PostViews" by "Lester \'GaMerZ\' Chan" will overwrite the meta setting, while the plugins by "Digital Factory" and "a3Rev Software" will overwrite the suppress filters option.', 'backend, documentation', 'twrp' ); ?>
		</p>

		<h3 class="<?php $this->bem_class( 'title-sub-section' ); ?>"><?=  esc_html_x( 'Meta key setting', 'backend, documentation', 'twrp' ); ?></h3>

		<p class="<?php $this->bem_class( 'developer-text' ); ?>">
			<?=  esc_html_x( 'By changing this setting, you must know what is the meta key that you should modify, the meta value(shown if you have a comparator) is verified if it is a number, and either compared as a number, or as a string(and is added to either meta_value, or meta_value_num key).', 'backend, documentation', 'twrp' ); ?>
		</p>

		<h3 id="<?php $this->bem_class( 'advanced-query-settings' ); ?>" class="<?php $this->bem_class( 'title-sub-section' ); ?>"><?=  esc_html_x( 'Advanced query settings', 'backend, documentation', 'twrp' ); ?></h3>

		<p class="<?php $this->bem_class( 'developer-text' ); ?>">
			<?=  esc_html_x( 'With the last option setting, you can override entirely the query, or add things keys that are not found in the settings provided. These arguments are provided as a JSON transformed into a PHP array, and then merged to the previous arguments, replacing them if they are already defined. If you want to use the PHP directly, then use the "twrp_get_query_arguments_created" filter', 'backend, documentation', 'twrp' ); ?>
		</p>

		<p>
			<?= esc_html_x( 'Below is an example of how we choose to show only some scheduled posts. Keep in mind that some arguments are added by default, like "no_found_rows", "ignore_sticky_posts", or "post_type". But you can save the setting and check the debugger if the final arguments are what you wish for. The "post__in" posts are added as an extra measure, to not show unwanted(or all) scheduled posts. The "perm" (from permission) is added because is a best practice to always add this key when we modify "post_status" key, especially when we show private posts.', 'backend, documentation', 'twrp' ); ?>
		</p>

		<?php // phpcs:disable WordPress.WhiteSpace ?>
		<pre>
{
  "post_status": "future",
  "perm": "readable",
  "orderby": "post__in",
  "post__in": [200,300,400]
}
		</pre>
		<?php // phpcs:enable WordPress.WhiteSpace ?>

		<p>
			<?=  esc_html_x( 'You can even remove the post__in key, to show them dynamically, as they appear:', 'backend, documentation', 'twrp' ); ?>
		</p>

		<?php // phpcs:disable WordPress.WhiteSpace ?>
		<pre>
{
  "post_status": "future",
  "perm": "readable",
  "orderby": "date",
  "order": "DESC"
}
		</pre>
		<?php // phpcs:enable WordPress.WhiteSpace ?>

		<p>
			<?=  esc_html_x( 'As for private post statuses, these are meant for administrators and editors, if you want to show the posts in this tab, just schedule them, it\'s not worth to show a lot things that should not be showing(also you need to remove the perm key, which is totally not recommended).', 'backend, documentation', 'twrp' ); ?>
		</p>

		<h3 class="<?php $this->bem_class( 'title-sub-section' ); ?>"><?=  esc_html_x( 'Debug generated query settings', 'backend, documentation', 'twrp' ); ?></h3>

		<p class="<?php $this->bem_class( 'developer-text' ); ?>">
			<?=  esc_html_x( 'After the save button, there is a button that lets you see the WP_Query array args created by the query. You can use this to check if you doubt about a setting, or just to make sure that is not the query that is wrong, and the posts retrieved are intended. Keep in mind that you can see some array keys not in official possible arguments, used by plugins to create their custom query.', 'backend, documentation', 'twrp' ); ?>
		</p>

		<?php
	}
}