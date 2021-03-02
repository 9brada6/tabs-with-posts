<?php

/**
 * Converts lone & characters into `&#038;` (a.k.a. `&amp;`)
 *
 * @since 0.71
 *
 * @param string $content    String of characters to be converted.
 * @param string $deprecated Not used.
 * @return string Converted string.
 */
function convert_chars($content, $deprecated = '')
{
}
/**
 * Converts invalid Unicode references range to valid range.
 *
 * @since 4.3.0
 *
 * @param string $content String with entities that need converting.
 * @return string Converted string.
 */
function convert_invalid_entities($content)
{
}
/**
 * Balances tags if forced to, or if the 'use_balanceTags' option is set to true.
 *
 * @since 0.71
 *
 * @param string $text  Text to be balanced
 * @param bool   $force If true, forces balancing, ignoring the value of the option. Default false.
 * @return string Balanced text
 */
function balanceTags($text, $force = \false)
{
}
/**
 * Balances tags of string using a modified stack.
 *
 * @since 2.0.4
 *
 * @author Leonard Lin <leonard@acm.org>
 * @license GPL
 * @copyright November 4, 2001
 * @version 1.1
 * @todo Make better - change loop condition to $text in 1.2
 * @internal Modified by Scott Reilly (coffee2code) 02 Aug 2004
 *		1.1  Fixed handling of append/stack pop order of end text
 *			 Added Cleaning Hooks
 *		1.0  First Version
 *
 * @param string $text Text to be balanced.
 * @return string Balanced text.
 */
function force_balance_tags($text)
{
}
/**
 * Acts on text which is about to be edited.
 *
 * The $content is run through esc_textarea(), which uses htmlspecialchars()
 * to convert special characters to HTML entities. If `$richedit` is set to true,
 * it is simply a holder for the {@see 'format_to_edit'} filter.
 *
 * @since 0.71
 * @since 4.4.0 The `$richedit` parameter was renamed to `$rich_text` for clarity.
 *
 * @param string $content   The text about to be edited.
 * @param bool   $rich_text Optional. Whether `$content` should be considered rich text,
 *                          in which case it would not be passed through esc_textarea().
 *                          Default false.
 * @return string The text after the filter (and possibly htmlspecialchars()) has been run.
 */
function format_to_edit($content, $rich_text = \false)
{
}
/**
 * Add leading zeros when necessary.
 *
 * If you set the threshold to '4' and the number is '10', then you will get
 * back '0010'. If you set the threshold to '4' and the number is '5000', then you
 * will get back '5000'.
 *
 * Uses sprintf to append the amount of zeros based on the $threshold parameter
 * and the size of the number. If the number is large enough, then no zeros will
 * be appended.
 *
 * @since 0.71
 *
 * @param int $number     Number to append zeros to if not greater than threshold.
 * @param int $threshold  Digit places number needs to be to not have zeros added.
 * @return string Adds leading zeros to number if needed.
 */
function zeroise($number, $threshold)
{
}
/**
 * Adds backslashes before letters and before a number at the start of a string.
 *
 * @since 0.71
 *
 * @param string $string Value to which backslashes will be added.
 * @return string String with backslashes inserted.
 */
function backslashit($string)
{
}
/**
 * Appends a trailing slash.
 *
 * Will remove trailing forward and backslashes if it exists already before adding
 * a trailing forward slash. This prevents double slashing a string or path.
 *
 * The primary use of this is for paths and thus should be used for paths. It is
 * not restricted to paths and offers no specific path support.
 *
 * @since 1.2.0
 *
 * @param string $string What to add the trailing slash to.
 * @return string String with trailing slash added.
 */
function trailingslashit($string)
{
}
/**
 * Removes trailing forward slashes and backslashes if they exist.
 *
 * The primary use of this is for paths and thus should be used for paths. It is
 * not restricted to paths and offers no specific path support.
 *
 * @since 2.2.0
 *
 * @param string $string What to remove the trailing slashes from.
 * @return string String without the trailing slashes.
 */
function untrailingslashit($string)
{
}
/**
 * Adds slashes to escape strings.
 *
 * Slashes will first be removed if magic_quotes_gpc is set, see {@link
 * https://secure.php.net/magic_quotes} for more details.
 *
 * @since 0.71
 *
 * @param string $gpc The string returned from HTTP request data.
 * @return string Returns a string escaped with slashes.
 */
function addslashes_gpc($gpc)
{
}
/**
 * Navigates through an array, object, or scalar, and removes slashes from the values.
 *
 * @since 2.0.0
 *
 * @param mixed $value The value to be stripped.
 * @return mixed Stripped value.
 */
function stripslashes_deep($value)
{
}
/**
 * Callback function for `stripslashes_deep()` which strips slashes from strings.
 *
 * @since 4.4.0
 *
 * @param mixed $value The array or string to be stripped.
 * @return mixed $value The stripped value.
 */
function stripslashes_from_strings_only($value)
{
}
/**
 * Navigates through an array, object, or scalar, and encodes the values to be used in a URL.
 *
 * @since 2.2.0
 *
 * @param mixed $value The array or string to be encoded.
 * @return mixed $value The encoded value.
 */
function urlencode_deep($value)
{
}
/**
 * Navigates through an array, object, or scalar, and raw-encodes the values to be used in a URL.
 *
 * @since 3.4.0
 *
 * @param mixed $value The array or string to be encoded.
 * @return mixed $value The encoded value.
 */
function rawurlencode_deep($value)
{
}
/**
 * Navigates through an array, object, or scalar, and decodes URL-encoded values
 *
 * @since 4.4.0
 *
 * @param mixed $value The array or string to be decoded.
 * @return mixed $value The decoded value.
 */
function urldecode_deep($value)
{
}
/**
 * Converts email addresses characters to HTML entities to block spam bots.
 *
 * @since 0.71
 *
 * @param string $email_address Email address.
 * @param int    $hex_encoding  Optional. Set to 1 to enable hex encoding.
 * @return string Converted email address.
 */
function antispambot($email_address, $hex_encoding = 0)
{
}
/**
 * Callback to convert URI match to HTML A element.
 *
 * This function was backported from 2.5.0 to 2.3.2. Regex callback for make_clickable().
 *
 * @since 2.3.2
 * @access private
 *
 * @param array $matches Single Regex Match.
 * @return string HTML A element with URI address.
 */
function _make_url_clickable_cb($matches)
{
}
/**
 * Callback to convert URL match to HTML A element.
 *
 * This function was backported from 2.5.0 to 2.3.2. Regex callback for make_clickable().
 *
 * @since 2.3.2
 * @access private
 *
 * @param array $matches Single Regex Match.
 * @return string HTML A element with URL address.
 */
function _make_web_ftp_clickable_cb($matches)
{
}
/**
 * Callback to convert email address match to HTML A element.
 *
 * This function was backported from 2.5.0 to 2.3.2. Regex callback for make_clickable().
 *
 * @since 2.3.2
 * @access private
 *
 * @param array $matches Single Regex Match.
 * @return string HTML A element with email address.
 */
function _make_email_clickable_cb($matches)
{
}
/**
 * Convert plaintext URI to HTML links.
 *
 * Converts URI, www and ftp, and email addresses. Finishes by fixing links
 * within links.
 *
 * @since 0.71
 *
 * @param string $text Content to convert URIs.
 * @return string Content with converted URIs.
 */
function make_clickable($text)
{
}
/**
 * Breaks a string into chunks by splitting at whitespace characters.
 * The length of each returned chunk is as close to the specified length goal as possible,
 * with the caveat that each chunk includes its trailing delimiter.
 * Chunks longer than the goal are guaranteed to not have any inner whitespace.
 *
 * Joining the returned chunks with empty delimiters reconstructs the input string losslessly.
 *
 * Input string must have no null characters (or eventual transformations on output chunks must not care about null characters)
 *
 *     _split_str_by_whitespace( "1234 67890 1234 67890a cd 1234   890 123456789 1234567890a    45678   1 3 5 7 90 ", 10 ) ==
 *     array (
 *         0 => '1234 67890 ',  // 11 characters: Perfect split
 *         1 => '1234 ',        //  5 characters: '1234 67890a' was too long
 *         2 => '67890a cd ',   // 10 characters: '67890a cd 1234' was too long
 *         3 => '1234   890 ',  // 11 characters: Perfect split
 *         4 => '123456789 ',   // 10 characters: '123456789 1234567890a' was too long
 *         5 => '1234567890a ', // 12 characters: Too long, but no inner whitespace on which to split
 *         6 => '   45678   ',  // 11 characters: Perfect split
 *         7 => '1 3 5 7 90 ',  // 11 characters: End of $string
 *     );
 *
 * @since 3.4.0
 * @access private
 *
 * @param string $string The string to split.
 * @param int    $goal   The desired chunk length.
 * @return array Numeric array of chunks.
 */
function _split_str_by_whitespace($string, $goal)
{
}
/**
 * Adds rel nofollow string to all HTML A elements in content.
 *
 * @since 1.5.0
 *
 * @param string $text Content that may contain HTML A elements.
 * @return string Converted content.
 */
function wp_rel_nofollow($text)
{
}
/**
 * Callback to add rel=nofollow string to HTML A element.
 *
 * Will remove already existing rel="nofollow" and rel='nofollow' from the
 * string to prevent from invalidating (X)HTML.
 *
 * @since 2.3.0
 *
 * @param array $matches Single Match
 * @return string HTML A Element with rel nofollow.
 */
function wp_rel_nofollow_callback($matches)
{
}
/**
 * Convert one smiley code to the icon graphic file equivalent.
 *
 * Callback handler for convert_smilies().
 *
 * Looks up one smiley code in the $wpsmiliestrans global array and returns an
 * `<img>` string for that smiley.
 *
 * @since 2.8.0
 *
 * @global array $wpsmiliestrans
 *
 * @param array $matches Single match. Smiley code to convert to image.
 * @return string Image string for smiley.
 */
function translate_smiley($matches)
{
}
/**
 * Convert text equivalent of smilies to images.
 *
 * Will only convert smilies if the option 'use_smilies' is true and the global
 * used in the function isn't empty.
 *
 * @since 0.71
 *
 * @global string|array $wp_smiliessearch
 *
 * @param string $text Content to convert smilies from text.
 * @return string Converted content with text smilies replaced with images.
 */
function convert_smilies($text)
{
}
/**
 * Verifies that an email is valid.
 *
 * Does not grok i18n domains. Not RFC compliant.
 *
 * @since 0.71
 *
 * @param string $email      Email address to verify.
 * @param bool   $deprecated Deprecated.
 * @return string|bool Either false or the valid email address.
 */
function is_email($email, $deprecated = \false)
{
}
/**
 * Convert to ASCII from email subjects.
 *
 * @since 1.2.0
 *
 * @param string $string Subject line
 * @return string Converted string to ASCII
 */
function wp_iso_descrambler($string)
{
}
/**
 * Helper function to convert hex encoded chars to ASCII
 *
 * @since 3.1.0
 * @access private
 *
 * @param array $match The preg_replace_callback matches array
 * @return string Converted chars
 */
function _wp_iso_convert($match)
{
}
/**
 * Returns a date in the GMT equivalent.
 *
 * Requires and returns a date in the Y-m-d H:i:s format. If there is a
 * timezone_string available, the date is assumed to be in that timezone,
 * otherwise it simply subtracts the value of the 'gmt_offset' option. Return
 * format can be overridden using the $format parameter.
 *
 * @since 1.2.0
 *
 * @param string $string The date to be converted.
 * @param string $format The format string for the returned date (default is Y-m-d H:i:s)
 * @return string GMT version of the date provided.
 */
function get_gmt_from_date($string, $format = 'Y-m-d H:i:s')
{
}
/**
 * Converts a GMT date into the correct format for the blog.
 *
 * Requires and returns a date in the Y-m-d H:i:s format. If there is a
 * timezone_string available, the returned date is in that timezone, otherwise
 * it simply adds the value of gmt_offset. Return format can be overridden
 * using the $format parameter
 *
 * @since 1.2.0
 *
 * @param string $string The date to be converted.
 * @param string $format The format string for the returned date (default is Y-m-d H:i:s)
 * @return string Formatted date relative to the timezone / GMT offset.
 */
function get_date_from_gmt($string, $format = 'Y-m-d H:i:s')
{
}
/**
 * Computes an offset in seconds from an iso8601 timezone.
 *
 * @since 1.5.0
 *
 * @param string $timezone Either 'Z' for 0 offset or '±hhmm'.
 * @return int|float The offset in seconds.
 */
function iso8601_timezone_to_offset($timezone)
{
}
/**
 * Converts an iso8601 date to MySQL DateTime format used by post_date[_gmt].
 *
 * @since 1.5.0
 *
 * @param string $date_string Date and time in ISO 8601 format {@link https://en.wikipedia.org/wiki/ISO_8601}.
 * @param string $timezone    Optional. If set to GMT returns the time minus gmt_offset. Default is 'user'.
 * @return string The date and time in MySQL DateTime format - Y-m-d H:i:s.
 */
function iso8601_to_datetime($date_string, $timezone = 'user')
{
}
/**
 * Strips out all characters that are not allowable in an email.
 *
 * @since 1.5.0
 *
 * @param string $email Email address to filter.
 * @return string Filtered email address.
 */
function sanitize_email($email)
{
}
/**
 * Determines the difference between two timestamps.
 *
 * The difference is returned in a human readable format such as "1 hour",
 * "5 mins", "2 days".
 *
 * @since 1.5.0
 *
 * @param int $from Unix timestamp from which the difference begins.
 * @param int $to   Optional. Unix timestamp to end the time difference. Default becomes time() if not set.
 * @return string Human readable time difference.
 */
function human_time_diff($from, $to = '')
{
}
/**
 * Generates an excerpt from the content, if needed.
 *
 * The excerpt word amount will be 55 words and if the amount is greater than
 * that, then the string ' [&hellip;]' will be appended to the excerpt. If the string
 * is less than 55 words, then the content will be returned as is.
 *
 * The 55 word limit can be modified by plugins/themes using the {@see 'excerpt_length'} filter
 * The ' [&hellip;]' string can be modified by plugins/themes using the {@see 'excerpt_more'} filter
 *
 * @since 1.5.0
 *
 * @param string $text Optional. The excerpt. If set to empty, an excerpt is generated.
 * @return string The excerpt.
 */
function wp_trim_excerpt($text = '')
{
}
/**
 * Trims text to a certain number of words.
 *
 * This function is localized. For languages that count 'words' by the individual
 * character (such as East Asian languages), the $num_words argument will apply
 * to the number of individual characters.
 *
 * @since 3.3.0
 *
 * @param string $text      Text to trim.
 * @param int    $num_words Number of words. Default 55.
 * @param string $more      Optional. What to append if $text needs to be trimmed. Default '&hellip;'.
 * @return string Trimmed text.
 */
function wp_trim_words($text, $num_words = 55, $more = \null)
{
}
/**
 * Converts named entities into numbered entities.
 *
 * @since 1.5.1
 *
 * @param string $text The text within which entities will be converted.
 * @return string Text with converted entities.
 */
function ent2ncr($text)
{
}
/**
 * Formats text for the editor.
 *
 * Generally the browsers treat everything inside a textarea as text, but
 * it is still a good idea to HTML entity encode `<`, `>` and `&` in the content.
 *
 * The filter {@see 'format_for_editor'} is applied here. If `$text` is empty the
 * filter will be applied to an empty string.
 *
 * @since 4.3.0
 *
 * @see _WP_Editors::editor()
 *
 * @param string $text           The text to be formatted.
 * @param string $default_editor The default editor for the current user.
 *                               It is usually either 'html' or 'tinymce'.
 * @return string The formatted text after filter is applied.
 */
function format_for_editor($text, $default_editor = \null)
{
}
/**
 * Perform a deep string replace operation to ensure the values in $search are no longer present
 *
 * Repeats the replacement operation until it no longer replaces anything so as to remove "nested" values
 * e.g. $subject = '%0%0%0DDD', $search ='%0D', $result ='' rather than the '%0%0DD' that
 * str_replace would return
 *
 * @since 2.8.1
 * @access private
 *
 * @param string|array $search  The value being searched for, otherwise known as the needle.
 *                              An array may be used to designate multiple needles.
 * @param string       $subject The string being searched and replaced on, otherwise known as the haystack.
 * @return string The string with the replaced svalues.
 */
function _deep_replace($search, $subject)
{
}
/**
 * Escapes data for use in a MySQL query.
 *
 * Usually you should prepare queries using wpdb::prepare().
 * Sometimes, spot-escaping is required or useful. One example
 * is preparing an array for use in an IN clause.
 *
 * NOTE: Since 4.8.3, '%' characters will be replaced with a placeholder string,
 * this prevents certain SQLi attacks from taking place. This change in behaviour
 * may cause issues for code that expects the return value of esc_sql() to be useable
 * for other purposes.
 *
 * @since 2.8.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param string|array $data Unescaped data
 * @return string|array Escaped data
 */
function esc_sql($data)
{
}
/**
 * Checks and cleans a URL.
 *
 * A number of characters are removed from the URL. If the URL is for displaying
 * (the default behaviour) ampersands are also replaced. The {@see 'clean_url'} filter
 * is applied to the returned cleaned URL.
 *
 * @since 2.8.0
 *
 * @param string $url       The URL to be cleaned.
 * @param array  $protocols Optional. An array of acceptable protocols.
 *		                    Defaults to return value of wp_allowed_protocols()
 * @param string $_context  Private. Use esc_url_raw() for database usage.
 * @return string The cleaned $url after the {@see 'clean_url'} filter is applied.
 */
function esc_url($url, $protocols = \null, $_context = 'display')
{
}
/**
 * Performs esc_url() for database usage.
 *
 * @since 2.8.0
 *
 * @param string $url       The URL to be cleaned.
 * @param array  $protocols An array of acceptable protocols.
 * @return string The cleaned URL.
 */
function esc_url_raw($url, $protocols = \null)
{
}
/**
 * Convert entities, while preserving already-encoded entities.
 *
 * @link https://secure.php.net/htmlentities Borrowed from the PHP Manual user notes.
 *
 * @since 1.2.2
 *
 * @param string $myHTML The text to be converted.
 * @return string Converted text.
 */
function htmlentities2($myHTML)
{
}
/**
 * Escape single quotes, htmlspecialchar " < > &, and fix line endings.
 *
 * Escapes text strings for echoing in JS. It is intended to be used for inline JS
 * (in a tag attribute, for example onclick="..."). Note that the strings have to
 * be in single quotes. The {@see 'js_escape'} filter is also applied here.
 *
 * @since 2.8.0
 *
 * @param string $text The text to be escaped.
 * @return string Escaped text.
 */
function esc_js($text)
{
}
/**
 * Escaping for HTML blocks.
 *
 * @since 2.8.0
 *
 * @param string $text
 * @return string
 */
function esc_html($text)
{
}
/**
 * Escaping for HTML attributes.
 *
 * @since 2.8.0
 *
 * @param string $text
 * @return string
 */
function esc_attr($text)
{
}
/**
 * Escaping for textarea values.
 *
 * @since 3.1.0
 *
 * @param string $text
 * @return string
 */
function esc_textarea($text)
{
}
/**
 * Escape an HTML tag name.
 *
 * @since 2.5.0
 *
 * @param string $tag_name
 * @return string
 */
function tag_escape($tag_name)
{
}
/**
 * Convert full URL paths to absolute paths.
 *
 * Removes the http or https protocols and the domain. Keeps the path '/' at the
 * beginning, so it isn't a true relative link, but from the web root base.
 *
 * @since 2.1.0
 * @since 4.1.0 Support was added for relative URLs.
 *
 * @param string $link Full URL path.
 * @return string Absolute path.
 */
function wp_make_link_relative($link)
{
}
/**
 * Sanitises various option values based on the nature of the option.
 *
 * This is basically a switch statement which will pass $value through a number
 * of functions depending on the $option.
 *
 * @since 2.0.5
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param string $option The name of the option.
 * @param string $value  The unsanitised value.
 * @return string Sanitized value.
 */
function sanitize_option($option, $value)
{
}
/**
 * Maps a function to all non-iterable elements of an array or an object.
 *
 * This is similar to `array_walk_recursive()` but acts upon objects too.
 *
 * @since 4.4.0
 *
 * @param mixed    $value    The array, object, or scalar.
 * @param callable $callback The function to map onto $value.
 * @return mixed The value with the callback applied to all non-arrays and non-objects inside it.
 */
function map_deep($value, $callback)
{
}
/**
 * Parses a string into variables to be stored in an array.
 *
 * Uses {@link https://secure.php.net/parse_str parse_str()} and stripslashes if
 * {@link https://secure.php.net/magic_quotes magic_quotes_gpc} is on.
 *
 * @since 2.2.1
 *
 * @param string $string The string to be parsed.
 * @param array  $array  Variables will be stored in this array.
 */
function wp_parse_str($string, &$array)
{
}
/**
 * Convert lone less than signs.
 *
 * KSES already converts lone greater than signs.
 *
 * @since 2.3.0
 *
 * @param string $text Text to be converted.
 * @return string Converted text.
 */
function wp_pre_kses_less_than($text)
{
}
/**
 * Callback function used by preg_replace.
 *
 * @since 2.3.0
 *
 * @param array $matches Populated by matches to preg_replace.
 * @return string The text returned after esc_html if needed.
 */
function wp_pre_kses_less_than_callback($matches)
{
}
/**
 * WordPress implementation of PHP sprintf() with filters.
 *
 * @since 2.5.0
 * @link https://secure.php.net/sprintf
 *
 * @param string $pattern   The string which formatted args are inserted.
 * @param mixed  $args ,... Arguments to be formatted into the $pattern string.
 * @return string The formatted string.
 */
function wp_sprintf($pattern)
{
}
/**
 * Localize list items before the rest of the content.
 *
 * The '%l' must be at the first characters can then contain the rest of the
 * content. The list items will have ', ', ', and', and ' and ' added depending
 * on the amount of list items in the $args parameter.
 *
 * @since 2.5.0
 *
 * @param string $pattern Content containing '%l' at the beginning.
 * @param array  $args    List items to prepend to the content and replace '%l'.
 * @return string Localized list items and rest of the content.
 */
function wp_sprintf_l($pattern, $args)
{
}
/**
 * Safely extracts not more than the first $count characters from html string.
 *
 * UTF-8, tags and entities safe prefix extraction. Entities inside will *NOT*
 * be counted as one character. For example &amp; will be counted as 4, &lt; as
 * 3, etc.
 *
 * @since 2.5.0
 *
 * @param string $str   String to get the excerpt from.
 * @param int    $count Maximum number of characters to take.
 * @param string $more  Optional. What to append if $str needs to be trimmed. Defaults to empty string.
 * @return string The excerpt.
 */
function wp_html_excerpt($str, $count, $more = \null)
{
}
/**
 * Add a Base url to relative links in passed content.
 *
 * By default it supports the 'src' and 'href' attributes. However this can be
 * changed via the 3rd param.
 *
 * @since 2.7.0
 *
 * @global string $_links_add_base
 *
 * @param string $content String to search for links in.
 * @param string $base    The base URL to prefix to links.
 * @param array  $attrs   The attributes which should be processed.
 * @return string The processed content.
 */
function links_add_base_url($content, $base, $attrs = array('src', 'href'))
{
}
/**
 * Callback to add a base url to relative links in passed content.
 *
 * @since 2.7.0
 * @access private
 *
 * @global string $_links_add_base
 *
 * @param string $m The matched link.
 * @return string The processed link.
 */
function _links_add_base($m)
{
}
/**
 * Adds a Target attribute to all links in passed content.
 *
 * This function by default only applies to `<a>` tags, however this can be
 * modified by the 3rd param.
 *
 * *NOTE:* Any current target attributed will be stripped and replaced.
 *
 * @since 2.7.0
 *
 * @global string $_links_add_target
 *
 * @param string $content String to search for links in.
 * @param string $target  The Target to add to the links.
 * @param array  $tags    An array of tags to apply to.
 * @return string The processed content.
 */
function links_add_target($content, $target = '_blank', $tags = array('a'))
{
}
/**
 * Callback to add a target attribute to all links in passed content.
 *
 * @since 2.7.0
 * @access private
 *
 * @global string $_links_add_target
 *
 * @param string $m The matched link.
 * @return string The processed link.
 */
function _links_add_target($m)
{
}
/**
 * Normalize EOL characters and strip duplicate whitespace.
 *
 * @since 2.7.0
 *
 * @param string $str The string to normalize.
 * @return string The normalized string.
 */
function normalize_whitespace($str)
{
}
/**
 * Properly strip all HTML tags including script and style
 *
 * This differs from strip_tags() because it removes the contents of
 * the `<script>` and `<style>` tags. E.g. `strip_tags( '<script>something</script>' )`
 * will return 'something'. wp_strip_all_tags will return ''
 *
 * @since 2.9.0
 *
 * @param string $string        String containing HTML tags
 * @param bool   $remove_breaks Optional. Whether to remove left over line breaks and white space chars
 * @return string The processed string.
 */
function wp_strip_all_tags($string, $remove_breaks = \false)
{
}
/**
 * Sanitizes a string from user input or from the database.
 *
 * - Checks for invalid UTF-8,
 * - Converts single `<` characters to entities
 * - Strips all tags
 * - Removes line breaks, tabs, and extra whitespace
 * - Strips octets
 *
 * @since 2.9.0
 *
 * @see sanitize_textarea_field()
 * @see wp_check_invalid_utf8()
 * @see wp_strip_all_tags()
 *
 * @param string $str String to sanitize.
 * @return string Sanitized string.
 */
function sanitize_text_field($str)
{
}
/**
 * Sanitizes a multiline string from user input or from the database.
 *
 * The function is like sanitize_text_field(), but preserves
 * new lines (\n) and other whitespace, which are legitimate
 * input in textarea elements.
 *
 * @see sanitize_text_field()
 *
 * @since 4.7.0
 *
 * @param string $str String to sanitize.
 * @return string Sanitized string.
 */
function sanitize_textarea_field($str)
{
}
/**
 * Internal helper function to sanitize a string from user input or from the db
 *
 * @since 4.7.0
 * @access private
 *
 * @param string $str String to sanitize.
 * @param bool $keep_newlines optional Whether to keep newlines. Default: false.
 * @return string Sanitized string.
 */
function _sanitize_text_fields($str, $keep_newlines = \false)
{
}
/**
 * i18n friendly version of basename()
 *
 * @since 3.1.0
 *
 * @param string $path   A path.
 * @param string $suffix If the filename ends in suffix this will also be cut off.
 * @return string
 */
function wp_basename($path, $suffix = '')
{
}
/**
 * Forever eliminate "Wordpress" from the planet (or at least the little bit we can influence).
 *
 * Violating our coding standards for a good function name.
 *
 * @since 3.0.0
 *
 * @staticvar string|false $dblq
 *
 * @param string $text The text to be modified.
 * @return string The modified text.
 */
function capital_P_dangit($text)
{
}
/**
 * Sanitize a mime type
 *
 * @since 3.1.3
 *
 * @param string $mime_type Mime type
 * @return string Sanitized mime type
 */
function sanitize_mime_type($mime_type)
{
}
/**
 * Sanitize space or carriage return separated URLs that are used to send trackbacks.
 *
 * @since 3.4.0
 *
 * @param string $to_ping Space or carriage return separated URLs
 * @return string URLs starting with the http or https protocol, separated by a carriage return.
 */
function sanitize_trackback_urls($to_ping)
{
}
/**
 * Add slashes to a string or array of strings.
 *
 * This should be used when preparing data for core API that expects slashed data.
 * This should not be used to escape data going directly into an SQL query.
 *
 * @since 3.6.0
 *
 * @param string|array $value String or array of strings to slash.
 * @return string|array Slashed $value
 */
function wp_slash($value)
{
}
/**
 * Remove slashes from a string or array of strings.
 *
 * This should be used to remove slashes from data passed to core API that
 * expects data to be unslashed.
 *
 * @since 3.6.0
 *
 * @param string|array $value String or array of strings to unslash.
 * @return string|array Unslashed $value
 */
function wp_unslash($value)
{
}
/**
 * Extract and return the first URL from passed content.
 *
 * @since 3.6.0
 *
 * @param string $content A string which might contain a URL.
 * @return string|false The found URL.
 */
function get_url_in_content($content)
{
}
/**
 * Returns the regexp for common whitespace characters.
 *
 * By default, spaces include new lines, tabs, nbsp entities, and the UTF-8 nbsp.
 * This is designed to replace the PCRE \s sequence.  In ticket #22692, that
 * sequence was found to be unreliable due to random inclusion of the A0 byte.
 *
 * @since 4.0.0
 *
 * @staticvar string $spaces
 *
 * @return string The spaces regexp.
 */
function wp_spaces_regexp()
{
}
/**
 * Print the important emoji-related styles.
 *
 * @since 4.2.0
 *
 * @staticvar bool $printed
 */
function print_emoji_styles()
{
}
/**
 * Print the inline Emoji detection script if it is not already printed.
 *
 * @since 4.2.0
 * @staticvar bool $printed
 */
function print_emoji_detection_script()
{
}
/**
 * Prints inline Emoji dection script
 *
 * @ignore
 * @since 4.6.0
 * @access private
 */
function _print_emoji_detection_script()
{
}
/**
 * Convert emoji characters to their equivalent HTML entity.
 *
 * This allows us to store emoji in a DB using the utf8 character set.
 *
 * @since 4.2.0
 *
 * @param string $content The content to encode.
 * @return string The encoded content.
 */
function wp_encode_emoji($content)
{
}
/**
 * Convert emoji to a static img element.
 *
 * @since 4.2.0
 *
 * @param string $text The content to encode.
 * @return string The encoded content.
 */
function wp_staticize_emoji($text)
{
}
/**
 * Convert emoji in emails into static images.
 *
 * @since 4.2.0
 *
 * @param array $mail The email data array.
 * @return array The email data array, with emoji in the message staticized.
 */
function wp_staticize_emoji_for_email($mail)
{
}
/**
 * Returns a arrays of emoji data.
 *
 * These arrays automatically built from the regex in twemoji.js - if they need to be updated,
 * you should update the regex there, then run the `grunt precommit:emoji` job.
 *
 * @since 4.9.0
 * @access private
 *
 * @param string $type Optional. Which array type to return. Accepts 'partials' or 'entities', default 'entities'.
 * @return array An array to match all emoji that WordPress recognises.
 */
function _wp_emoji_list($type = 'entities')
{
}
/**
 * Shorten a URL, to be used as link text.
 *
 * @since 1.2.0
 * @since 4.4.0 Moved to wp-includes/formatting.php from wp-admin/includes/misc.php and added $length param.
 *
 * @param string $url    URL to shorten.
 * @param int    $length Optional. Maximum length of the shortened URL. Default 35 characters.
 * @return string Shortened URL.
 */
function url_shorten($url, $length = 35)
{
}
/**
 * Sanitizes a hex color.
 *
 * Returns either '', a 3 or 6 digit hex color (with #), or nothing.
 * For sanitizing values without a #, see sanitize_hex_color_no_hash().
 *
 * @since 3.4.0
 *
 * @param string $color
 * @return string|void
 */
function sanitize_hex_color($color)
{
}
/**
 * Sanitizes a hex color without a hash. Use sanitize_hex_color() when possible.
 *
 * Saving hex colors without a hash puts the burden of adding the hash on the
 * UI, which makes it difficult to use or upgrade to other color types such as
 * rgba, hsl, rgb, and html color names.
 *
 * Returns either '', a 3 or 6 digit hex color (without a #), or null.
 *
 * @since 3.4.0
 *
 * @param string $color
 * @return string|null
 */
function sanitize_hex_color_no_hash($color)
{
}
/**
 * Ensures that any hex color is properly hashed.
 * Otherwise, returns value untouched.
 *
 * This method should only be necessary if using sanitize_hex_color_no_hash().
 *
 * @since 3.4.0
 *
 * @param string $color
 * @return string
 */
function maybe_hash_hex_color($color)
{
}
/**
 * Convert given date string into a different format.
 *
 * $format should be either a PHP date format string, e.g. 'U' for a Unix
 * timestamp, or 'G' for a Unix timestamp assuming that $date is GMT.
 *
 * If $translate is true then the given date and format string will
 * be passed to date_i18n() for translation.
 *
 * @since 0.71
 *
 * @param string $format    Format of the date to return.
 * @param string $date      Date string to convert.
 * @param bool   $translate Whether the return date should be translated. Default true.
 * @return string|int|bool Formatted date string or Unix timestamp. False if $date is empty.
 */
function mysql2date($format, $date, $translate = \true)
{
}
/**
 * Retrieve the current time based on specified type.
 *
 * The 'mysql' type will return the time in the format for MySQL DATETIME field.
 * The 'timestamp' type will return the current timestamp.
 * Other strings will be interpreted as PHP date formats (e.g. 'Y-m-d').
 *
 * If $gmt is set to either '1' or 'true', then both types will use GMT time.
 * if $gmt is false, the output is adjusted with the GMT offset in the WordPress option.
 *
 * @since 1.0.0
 *
 * @param string   $type Type of time to retrieve. Accepts 'mysql', 'timestamp', or PHP date
 *                       format string (e.g. 'Y-m-d').
 * @param int|bool $gmt  Optional. Whether to use GMT timezone. Default false.
 * @return int|string Integer if $type is 'timestamp', string otherwise.
 */
function current_time($type, $gmt = 0)
{
}
/**
 * Retrieve the date in localized format, based on timestamp.
 *
 * If the locale specifies the locale month and weekday, then the locale will
 * take over the format for the date. If it isn't, then the date format string
 * will be used instead.
 *
 * @since 0.71
 *
 * @global WP_Locale $wp_locale
 *
 * @param string   $dateformatstring Format to display the date.
 * @param bool|int $unixtimestamp    Optional. Unix timestamp. Default false.
 * @param bool     $gmt              Optional. Whether to use GMT timezone. Default false.
 *
 * @return string The date, translated if locale specifies it.
 */
function date_i18n($dateformatstring, $unixtimestamp = \false, $gmt = \false)
{
}
/**
 * Determines if the date should be declined.
 *
 * If the locale specifies that month names require a genitive case in certain
 * formats (like 'j F Y'), the month name will be replaced with a correct form.
 *
 * @since 4.4.0
 *
 * @global WP_Locale $wp_locale
 *
 * @param string $date Formatted date string.
 * @return string The date, declined if locale specifies it.
 */
function wp_maybe_decline_date($date)
{
}
/**
 * Convert float number to format based on the locale.
 *
 * @since 2.3.0
 *
 * @global WP_Locale $wp_locale
 *
 * @param float $number   The number to convert based on locale.
 * @param int   $decimals Optional. Precision of the number of decimal places. Default 0.
 * @return string Converted number in string format.
 */
function number_format_i18n($number, $decimals = 0)
{
}
/**
 * Convert number of bytes largest unit bytes will fit into.
 *
 * It is easier to read 1 KB than 1024 bytes and 1 MB than 1048576 bytes. Converts
 * number of bytes to human readable number by taking the number of that unit
 * that the bytes will go into it. Supports TB value.
 *
 * Please note that integers in PHP are limited to 32 bits, unless they are on
 * 64 bit architecture, then they have 64 bit size. If you need to place the
 * larger size then what PHP integer type will hold, then use a string. It will
 * be converted to a double, which should always have 64 bit length.
 *
 * Technically the correct unit names for powers of 1024 are KiB, MiB etc.
 *
 * @since 2.3.0
 *
 * @param int|string $bytes    Number of bytes. Note max integer size for integers.
 * @param int        $decimals Optional. Precision of number of decimal places. Default 0.
 * @return string|false False on failure. Number string on success.
 */
function size_format($bytes, $decimals = 0)
{
}
/**
 * Get the week start and end from the datetime or date string from MySQL.
 *
 * @since 0.71
 *
 * @param string     $mysqlstring   Date or datetime field type from MySQL.
 * @param int|string $start_of_week Optional. Start of the week as an integer. Default empty string.
 * @return array Keys are 'start' and 'end'.
 */
function get_weekstartend($mysqlstring, $start_of_week = '')
{
}
/**
 * Unserialize value only if it was serialized.
 *
 * @since 2.0.0
 *
 * @param string $original Maybe unserialized original, if is needed.
 * @return mixed Unserialized data can be any type.
 */
function maybe_unserialize($original)
{
}
/**
 * Check value to find if it was serialized.
 *
 * If $data is not an string, then returned value will always be false.
 * Serialized data is always a string.
 *
 * @since 2.0.5
 *
 * @param string $data   Value to check to see if was serialized.
 * @param bool   $strict Optional. Whether to be strict about the end of the string. Default true.
 * @return bool False if not serialized and true if it was.
 */
function is_serialized($data, $strict = \true)
{
}
/**
 * Check whether serialized data is of string type.
 *
 * @since 2.0.5
 *
 * @param string $data Serialized data.
 * @return bool False if not a serialized string, true if it is.
 */
function is_serialized_string($data)
{
}
/**
 * Serialize data, if needed.
 *
 * @since 2.0.5
 *
 * @param string|array|object $data Data that might be serialized.
 * @return mixed A scalar data
 */
function maybe_serialize($data)
{
}
/**
 * Retrieve post title from XMLRPC XML.
 *
 * If the title element is not part of the XML, then the default post title from
 * the $post_default_title will be used instead.
 *
 * @since 0.71
 *
 * @global string $post_default_title Default XML-RPC post title.
 *
 * @param string $content XMLRPC XML Request content
 * @return string Post title
 */
function xmlrpc_getposttitle($content)
{
}
/**
 * Retrieve the post category or categories from XMLRPC XML.
 *
 * If the category element is not found, then the default post category will be
 * used. The return type then would be what $post_default_category. If the
 * category is found, then it will always be an array.
 *
 * @since 0.71
 *
 * @global string $post_default_category Default XML-RPC post category.
 *
 * @param string $content XMLRPC XML Request content
 * @return string|array List of categories or category name.
 */
function xmlrpc_getpostcategory($content)
{
}
/**
 * XMLRPC XML content without title and category elements.
 *
 * @since 0.71
 *
 * @param string $content XML-RPC XML Request content.
 * @return string XMLRPC XML Request content without title and category elements.
 */
function xmlrpc_removepostdata($content)
{
}
/**
 * Use RegEx to extract URLs from arbitrary content.
 *
 * @since 3.7.0
 *
 * @param string $content Content to extract URLs from.
 * @return array URLs found in passed string.
 */
function wp_extract_urls($content)
{
}
/**
 * Check content for video and audio links to add as enclosures.
 *
 * Will not add enclosures that have already been added and will
 * remove enclosures that are no longer in the post. This is called as
 * pingbacks and trackbacks.
 *
 * @since 1.5.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param string $content Post Content.
 * @param int    $post_ID Post ID.
 */
function do_enclose($content, $post_ID)
{
}
/**
 * Retrieve HTTP Headers from URL.
 *
 * @since 1.5.1
 *
 * @param string $url        URL to retrieve HTTP headers from.
 * @param bool   $deprecated Not Used.
 * @return bool|string False on failure, headers on success.
 */
function wp_get_http_headers($url, $deprecated = \false)
{
}
/**
 * Whether the publish date of the current post in the loop is different from the
 * publish date of the previous post in the loop.
 *
 * @since 0.71
 *
 * @global string $currentday  The day of the current post in the loop.
 * @global string $previousday The day of the previous post in the loop.
 *
 * @return int 1 when new day, 0 if not a new day.
 */
function is_new_day()
{
}
/**
 * Build URL query based on an associative and, or indexed array.
 *
 * This is a convenient function for easily building url queries. It sets the
 * separator to '&' and uses _http_build_query() function.
 *
 * @since 2.3.0
 *
 * @see _http_build_query() Used to build the query
 * @link https://secure.php.net/manual/en/function.http-build-query.php for more on what
 *		 http_build_query() does.
 *
 * @param array $data URL-encode key/value pairs.
 * @return string URL-encoded string.
 */
function build_query($data)
{
}
/**
 * From php.net (modified by Mark Jaquith to behave like the native PHP5 function).
 *
 * @since 3.2.0
 * @access private
 *
 * @see https://secure.php.net/manual/en/function.http-build-query.php
 *
 * @param array|object  $data       An array or object of data. Converted to array.
 * @param string        $prefix     Optional. Numeric index. If set, start parameter numbering with it.
 *                                  Default null.
 * @param string        $sep        Optional. Argument separator; defaults to 'arg_separator.output'.
 *                                  Default null.
 * @param string        $key        Optional. Used to prefix key name. Default empty.
 * @param bool          $urlencode  Optional. Whether to use urlencode() in the result. Default true.
 *
 * @return string The query string.
 */
function _http_build_query($data, $prefix = \null, $sep = \null, $key = '', $urlencode = \true)
{
}
/**
 * Retrieves a modified URL query string.
 *
 * You can rebuild the URL and append query variables to the URL query by using this function.
 * There are two ways to use this function; either a single key and value, or an associative array.
 *
 * Using a single key and value:
 *
 *     add_query_arg( 'key', 'value', 'http://example.com' );
 *
 * Using an associative array:
 *
 *     add_query_arg( array(
 *         'key1' => 'value1',
 *         'key2' => 'value2',
 *     ), 'http://example.com' );
 *
 * Omitting the URL from either use results in the current URL being used
 * (the value of `$_SERVER['REQUEST_URI']`).
 *
 * Values are expected to be encoded appropriately with urlencode() or rawurlencode().
 *
 * Setting any query variable's value to boolean false removes the key (see remove_query_arg()).
 *
 * Important: The return value of add_query_arg() is not escaped by default. Output should be
 * late-escaped with esc_url() or similar to help prevent vulnerability to cross-site scripting
 * (XSS) attacks.
 *
 * @since 1.5.0
 *
 * @param string|array $key   Either a query variable key, or an associative array of query variables.
 * @param string       $value Optional. Either a query variable value, or a URL to act upon.
 * @param string       $url   Optional. A URL to act upon.
 * @return string New URL query string (unescaped).
 */
function add_query_arg( $key, $value, $url )
{
}
/**
 * Removes an item or items from a query string.
 *
 * @since 1.5.0
 *
 * @param string|array $key   Query key or keys to remove.
 * @param bool|string  $query Optional. When false uses the current URL. Default false.
 * @return string New URL query string.
 */
function remove_query_arg($key, $query = \false)
{
}
/**
 * Returns an array of single-use query variable names that can be removed from a URL.
 *
 * @since 4.4.0
 *
 * @return array An array of parameters to remove from the URL.
 */
function wp_removable_query_args()
{
}
/**
 * Walks the array while sanitizing the contents.
 *
 * @since 0.71
 *
 * @param array $array Array to walk while sanitizing contents.
 * @return array Sanitized $array.
 */
function add_magic_quotes($array)
{
}
/**
 * HTTP request for URI to retrieve content.
 *
 * @since 1.5.1
 *
 * @see wp_safe_remote_get()
 *
 * @param string $uri URI/URL of web page to retrieve.
 * @return false|string HTTP content. False on failure.
 */
function wp_remote_fopen($uri)
{
}
/**
 * Set up the WordPress query.
 *
 * @since 2.0.0
 *
 * @global WP       $wp_locale
 * @global WP_Query $wp_query
 * @global WP_Query $wp_the_query
 *
 * @param string|array $query_vars Default WP_Query arguments.
 */
function wp($query_vars = '')
{
}
/**
 * Retrieve the description for the HTTP status.
 *
 * @since 2.3.0
 *
 * @global array $wp_header_to_desc
 *
 * @param int $code HTTP status code.
 * @return string Empty string if not found, or description if found.
 */
function get_status_header_desc($code)
{
}
/**
 * Set HTTP status header.
 *
 * @since 2.0.0
 * @since 4.4.0 Added the `$description` parameter.
 *
 * @see get_status_header_desc()
 *
 * @param int    $code        HTTP status code.
 * @param string $description Optional. A custom description for the HTTP status.
 */
function status_header($code, $description = '')
{
}
/**
 * Get the header information to prevent caching.
 *
 * The several different headers cover the different ways cache prevention
 * is handled by different browsers
 *
 * @since 2.8.0
 *
 * @return array The associative array of header names and field values.
 */
function wp_get_nocache_headers()
{
}
/**
 * Set the headers to prevent caching for the different browsers.
 *
 * Different browsers support different nocache headers, so several
 * headers must be sent so that all of them get the point that no
 * caching should occur.
 *
 * @since 2.0.0
 *
 * @see wp_get_nocache_headers()
 */
function nocache_headers()
{
}
/**
 * Set the headers for caching for 10 days with JavaScript content type.
 *
 * @since 2.1.0
 */
function cache_javascript_headers()
{
}
/**
 * Retrieve the number of database queries during the WordPress execution.
 *
 * @since 2.0.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @return int Number of database queries.
 */
function get_num_queries()
{
}
/**
 * Whether input is yes or no.
 *
 * Must be 'y' to be true.
 *
 * @since 1.0.0
 *
 * @param string $yn Character string containing either 'y' (yes) or 'n' (no).
 * @return bool True if yes, false on anything else.
 */
function bool_from_yn($yn)
{
}
/**
 * Load the feed template from the use of an action hook.
 *
 * If the feed action does not have a hook, then the function will die with a
 * message telling the visitor that the feed is not valid.
 *
 * It is better to only have one hook for each feed.
 *
 * @since 2.1.0
 *
 * @global WP_Query $wp_query Used to tell if the use a comment feed.
 */
function do_feed()
{
}
/**
 * Load the RDF RSS 0.91 Feed template.
 *
 * @since 2.1.0
 *
 * @see load_template()
 */
function do_feed_rdf()
{
}
/**
 * Load the RSS 1.0 Feed Template.
 *
 * @since 2.1.0
 *
 * @see load_template()
 */
function do_feed_rss()
{
}
/**
 * Load either the RSS2 comment feed or the RSS2 posts feed.
 *
 * @since 2.1.0
 *
 * @see load_template()
 *
 * @param bool $for_comments True for the comment feed, false for normal feed.
 */
function do_feed_rss2($for_comments)
{
}
/**
 * Load either Atom comment feed or Atom posts feed.
 *
 * @since 2.1.0
 *
 * @see load_template()
 *
 * @param bool $for_comments True for the comment feed, false for normal feed.
 */
function do_feed_atom($for_comments)
{
}
/**
 * Display the robots.txt file content.
 *
 * The echo content should be with usage of the permalinks or for creating the
 * robots.txt file.
 *
 * @since 2.1.0
 */
function do_robots()
{
}
/**
 * Test whether WordPress is already installed.
 *
 * The cache will be checked first. If you have a cache plugin, which saves
 * the cache values, then this will work. If you use the default WordPress
 * cache, and the database goes away, then you might have problems.
 *
 * Checks for the 'siteurl' option for whether WordPress is installed.
 *
 * @since 2.1.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @return bool Whether the site is already installed.
 */
function is_blog_installed()
{
}
/**
 * Retrieve URL with nonce added to URL query.
 *
 * @since 2.0.4
 *
 * @param string     $actionurl URL to add nonce action.
 * @param int|string $action    Optional. Nonce action name. Default -1.
 * @param string     $name      Optional. Nonce name. Default '_wpnonce'.
 * @return string Escaped URL with nonce action added.
 */
function wp_nonce_url($actionurl, $action = -1, $name = '_wpnonce')
{
}
/**
 * Retrieve or display nonce hidden field for forms.
 *
 * The nonce field is used to validate that the contents of the form came from
 * the location on the current site and not somewhere else. The nonce does not
 * offer absolute protection, but should protect against most cases. It is very
 * important to use nonce field in forms.
 *
 * The $action and $name are optional, but if you want to have better security,
 * it is strongly suggested to set those two parameters. It is easier to just
 * call the function without any parameters, because validation of the nonce
 * doesn't require any parameters, but since crackers know what the default is
 * it won't be difficult for them to find a way around your nonce and cause
 * damage.
 *
 * The input name will be whatever $name value you gave. The input value will be
 * the nonce creation value.
 *
 * @since 2.0.4
 *
 * @param int|string $action  Optional. Action name. Default -1.
 * @param string     $name    Optional. Nonce name. Default '_wpnonce'.
 * @param bool       $referer Optional. Whether to set the referer field for validation. Default true.
 * @param bool       $echo    Optional. Whether to display or return hidden form field. Default true.
 * @return string Nonce field HTML markup.
 */
function wp_nonce_field($action = -1, $name = "_wpnonce", $referer = \true, $echo = \true)
{
}
/**
 * Retrieve or display referer hidden field for forms.
 *
 * The referer link is the current Request URI from the server super global. The
 * input name is '_wp_http_referer', in case you wanted to check manually.
 *
 * @since 2.0.4
 *
 * @param bool $echo Optional. Whether to echo or return the referer field. Default true.
 * @return string Referer field HTML markup.
 */
function wp_referer_field($echo = \true)
{
}
/**
 * Retrieve or display original referer hidden field for forms.
 *
 * The input name is '_wp_original_http_referer' and will be either the same
 * value of wp_referer_field(), if that was posted already or it will be the
 * current page, if it doesn't exist.
 *
 * @since 2.0.4
 *
 * @param bool   $echo         Optional. Whether to echo the original http referer. Default true.
 * @param string $jump_back_to Optional. Can be 'previous' or page you want to jump back to.
 *                             Default 'current'.
 * @return string Original referer field.
 */
function wp_original_referer_field($echo = \true, $jump_back_to = 'current')
{
}
/**
 * Retrieve referer from '_wp_http_referer' or HTTP referer.
 *
 * If it's the same as the current request URL, will return false.
 *
 * @since 2.0.4
 *
 * @return false|string False on failure. Referer URL on success.
 */
function wp_get_referer()
{
}
/**
 * Retrieves unvalidated referer from '_wp_http_referer' or HTTP referer.
 *
 * Do not use for redirects, use wp_get_referer() instead.
 *
 * @since 4.5.0
 *
 * @return string|false Referer URL on success, false on failure.
 */
function wp_get_raw_referer()
{
}
/**
 * Retrieve original referer that was posted, if it exists.
 *
 * @since 2.0.4
 *
 * @return string|false False if no original referer or original referer if set.
 */
function wp_get_original_referer()
{
}
/**
 * Recursive directory creation based on full path.
 *
 * Will attempt to set permissions on folders.
 *
 * @since 2.0.1
 *
 * @param string $target Full path to attempt to create.
 * @return bool Whether the path was created. True if path already exists.
 */
function wp_mkdir_p($target)
{
}
/**
 * Test if a given filesystem path is absolute.
 *
 * For example, '/foo/bar', or 'c:\windows'.
 *
 * @since 2.5.0
 *
 * @param string $path File path.
 * @return bool True if path is absolute, false is not absolute.
 */
function path_is_absolute($path)
{
}
/**
 * Join two filesystem paths together.
 *
 * For example, 'give me $path relative to $base'. If the $path is absolute,
 * then it the full path is returned.
 *
 * @since 2.5.0
 *
 * @param string $base Base path.
 * @param string $path Path relative to $base.
 * @return string The path with the base or absolute path.
 */
function path_join($base, $path)
{
}
/**
 * Normalize a filesystem path.
 *
 * On windows systems, replaces backslashes with forward slashes
 * and forces upper-case drive letters.
 * Allows for two leading slashes for Windows network shares, but
 * ensures that all other duplicate slashes are reduced to a single.
 *
 * @since 3.9.0
 * @since 4.4.0 Ensures upper-case drive letters on Windows systems.
 * @since 4.5.0 Allows for Windows network shares.
 * @since 4.9.7 Allows for PHP file wrappers.
 *
 * @param string $path Path to normalize.
 * @return string Normalized path.
 */
function wp_normalize_path($path)
{
}
/**
 * Determine a writable directory for temporary files.
 *
 * Function's preference is the return value of sys_get_temp_dir(),
 * followed by your PHP temporary upload directory, followed by WP_CONTENT_DIR,
 * before finally defaulting to /tmp/
 *
 * In the event that this function does not find a writable location,
 * It may be overridden by the WP_TEMP_DIR constant in your wp-config.php file.
 *
 * @since 2.5.0
 *
 * @staticvar string $temp
 *
 * @return string Writable temporary directory.
 */
function get_temp_dir()
{
}
/**
 * Determine if a directory is writable.
 *
 * This function is used to work around certain ACL issues in PHP primarily
 * affecting Windows Servers.
 *
 * @since 3.6.0
 *
 * @see win_is_writable()
 *
 * @param string $path Path to check for write-ability.
 * @return bool Whether the path is writable.
 */
function wp_is_writable($path)
{
}
/**
 * Workaround for Windows bug in is_writable() function
 *
 * PHP has issues with Windows ACL's for determine if a
 * directory is writable or not, this works around them by
 * checking the ability to open files rather than relying
 * upon PHP to interprate the OS ACL.
 *
 * @since 2.8.0
 *
 * @see https://bugs.php.net/bug.php?id=27609
 * @see https://bugs.php.net/bug.php?id=30931
 *
 * @param string $path Windows path to check for write-ability.
 * @return bool Whether the path is writable.
 */
function win_is_writable($path)
{
}
/**
 * Retrieves uploads directory information.
 *
 * Same as wp_upload_dir() but "light weight" as it doesn't attempt to create the uploads directory.
 * Intended for use in themes, when only 'basedir' and 'baseurl' are needed, generally in all cases
 * when not uploading files.
 *
 * @since 4.5.0
 *
 * @see wp_upload_dir()
 *
 * @return array See wp_upload_dir() for description.
 */
function wp_get_upload_dir()
{
}
/**
 * Get an array containing the current upload directory's path and url.
 *
 * Checks the 'upload_path' option, which should be from the web root folder,
 * and if it isn't empty it will be used. If it is empty, then the path will be
 * 'WP_CONTENT_DIR/uploads'. If the 'UPLOADS' constant is defined, then it will
 * override the 'upload_path' option and 'WP_CONTENT_DIR/uploads' path.
 *
 * The upload URL path is set either by the 'upload_url_path' option or by using
 * the 'WP_CONTENT_URL' constant and appending '/uploads' to the path.
 *
 * If the 'uploads_use_yearmonth_folders' is set to true (checkbox if checked in
 * the administration settings panel), then the time will be used. The format
 * will be year first and then month.
 *
 * If the path couldn't be created, then an error will be returned with the key
 * 'error' containing the error message. The error suggests that the parent
 * directory is not writable by the server.
 *
 * On success, the returned array will have many indices:
 * 'path' - base directory and sub directory or full path to upload directory.
 * 'url' - base url and sub directory or absolute URL to upload directory.
 * 'subdir' - sub directory if uploads use year/month folders option is on.
 * 'basedir' - path without subdir.
 * 'baseurl' - URL path without subdir.
 * 'error' - false or error message.
 *
 * @since 2.0.0
 * @uses _wp_upload_dir()
 *
 * @staticvar array $cache
 * @staticvar array $tested_paths
 *
 * @param string $time Optional. Time formatted in 'yyyy/mm'. Default null.
 * @param bool   $create_dir Optional. Whether to check and create the uploads directory.
 *                           Default true for backward compatibility.
 * @param bool   $refresh_cache Optional. Whether to refresh the cache. Default false.
 * @return array See above for description.
 */
function wp_upload_dir($time = \null, $create_dir = \true, $refresh_cache = \false)
{
}
/**
 * A non-filtered, non-cached version of wp_upload_dir() that doesn't check the path.
 *
 * @since 4.5.0
 * @access private
 *
 * @param string $time Optional. Time formatted in 'yyyy/mm'. Default null.
 * @return array See wp_upload_dir()
 */
function _wp_upload_dir($time = \null)
{
}
/**
 * Get a filename that is sanitized and unique for the given directory.
 *
 * If the filename is not unique, then a number will be added to the filename
 * before the extension, and will continue adding numbers until the filename is
 * unique.
 *
 * The callback is passed three parameters, the first one is the directory, the
 * second is the filename, and the third is the extension.
 *
 * @since 2.5.0
 *
 * @param string   $dir                      Directory.
 * @param string   $filename                 File name.
 * @param callable $unique_filename_callback Callback. Default null.
 * @return string New filename, if given wasn't unique.
 */
function wp_unique_filename($dir, $filename, $unique_filename_callback = \null)
{
}
/**
 * Create a file in the upload folder with given content.
 *
 * If there is an error, then the key 'error' will exist with the error message.
 * If success, then the key 'file' will have the unique file path, the 'url' key
 * will have the link to the new file. and the 'error' key will be set to false.
 *
 * This function will not move an uploaded file to the upload folder. It will
 * create a new file with the content in $bits parameter. If you move the upload
 * file, read the content of the uploaded file, and then you can give the
 * filename and content to this function, which will add it to the upload
 * folder.
 *
 * The permissions will be set on the new file automatically by this function.
 *
 * @since 2.0.0
 *
 * @param string       $name       Filename.
 * @param null|string  $deprecated Never used. Set to null.
 * @param mixed        $bits       File content
 * @param string       $time       Optional. Time formatted in 'yyyy/mm'. Default null.
 * @return array
 */
function wp_upload_bits($name, $deprecated, $bits, $time = \null)
{
}
/**
 * Retrieve the file type based on the extension name.
 *
 * @since 2.5.0
 *
 * @param string $ext The extension to search.
 * @return string|void The file type, example: audio, video, document, spreadsheet, etc.
 */
function wp_ext2type($ext)
{
}
/**
 * Retrieve the file type from the file name.
 *
 * You can optionally define the mime array, if needed.
 *
 * @since 2.0.4
 *
 * @param string $filename File name or path.
 * @param array  $mimes    Optional. Key is the file extension with value as the mime type.
 * @return array Values with extension first and mime type.
 */
function wp_check_filetype($filename, $mimes = \null)
{
}
/**
 * Attempt to determine the real file type of a file.
 *
 * If unable to, the file name extension will be used to determine type.
 *
 * If it's determined that the extension does not match the file's real type,
 * then the "proper_filename" value will be set with a proper filename and extension.
 *
 * Currently this function only supports renaming images validated via wp_get_image_mime().
 *
 * @since 3.0.0
 *
 * @param string $file     Full path to the file.
 * @param string $filename The name of the file (may differ from $file due to $file being
 *                         in a tmp directory).
 * @param array   $mimes   Optional. Key is the file extension with value as the mime type.
 * @return array Values for the extension, MIME, and either a corrected filename or false
 *               if original $filename is valid.
 */
function wp_check_filetype_and_ext($file, $filename, $mimes = \null)
{
}
/**
 * Returns the real mime type of an image file.
 *
 * This depends on exif_imagetype() or getimagesize() to determine real mime types.
 *
 * @since 4.7.1
 *
 * @param string $file Full path to the file.
 * @return string|false The actual mime type or false if the type cannot be determined.
 */
function wp_get_image_mime($file)
{
}
/**
 * Retrieve list of mime types and file extensions.
 *
 * @since 3.5.0
 * @since 4.2.0 Support was added for GIMP (xcf) files.
 *
 * @return array Array of mime types keyed by the file extension regex corresponding to those types.
 */
function wp_get_mime_types()
{
}
/**
 * Retrieves the list of common file extensions and their types.
 *
 * @since 4.6.0
 *
 * @return array Array of file extensions types keyed by the type of file.
 */
function wp_get_ext_types()
{
}
/**
 * Retrieve list of allowed mime types and file extensions.
 *
 * @since 2.8.6
 *
 * @param int|WP_User $user Optional. User to check. Defaults to current user.
 * @return array Array of mime types keyed by the file extension regex corresponding
 *               to those types.
 */
function get_allowed_mime_types($user = \null)
{
}
/**
 * Display "Are You Sure" message to confirm the action being taken.
 *
 * If the action has the nonce explain message, then it will be displayed
 * along with the "Are you sure?" message.
 *
 * @since 2.0.4
 *
 * @param string $action The nonce action.
 */
function wp_nonce_ays($action)
{
}
/**
 * Kill WordPress execution and display HTML message with error message.
 *
 * This function complements the `die()` PHP function. The difference is that
 * HTML will be displayed to the user. It is recommended to use this function
 * only when the execution should not continue any further. It is not recommended
 * to call this function very often, and try to handle as many errors as possible
 * silently or more gracefully.
 *
 * As a shorthand, the desired HTTP response code may be passed as an integer to
 * the `$title` parameter (the default title would apply) or the `$args` parameter.
 *
 * @since 2.0.4
 * @since 4.1.0 The `$title` and `$args` parameters were changed to optionally accept
 *              an integer to be used as the response code.
 *
 * @param string|WP_Error  $message Optional. Error message. If this is a WP_Error object,
 *                                  and not an Ajax or XML-RPC request, the error's messages are used.
 *                                  Default empty.
 * @param string|int       $title   Optional. Error title. If `$message` is a `WP_Error` object,
 *                                  error data with the key 'title' may be used to specify the title.
 *                                  If `$title` is an integer, then it is treated as the response
 *                                  code. Default empty.
 * @param string|array|int $args {
 *     Optional. Arguments to control behavior. If `$args` is an integer, then it is treated
 *     as the response code. Default empty array.
 *
 *     @type int    $response       The HTTP response code. Default 200 for Ajax requests, 500 otherwise.
 *     @type bool   $back_link      Whether to include a link to go back. Default false.
 *     @type string $text_direction The text direction. This is only useful internally, when WordPress
 *                                  is still loading and the site's locale is not set up yet. Accepts 'rtl'.
 *                                  Default is the value of is_rtl().
 * }
 */
function wp_die($message = '', $title = '', $args = array())
{
}
/**
 * Kills WordPress execution and display HTML message with error message.
 *
 * This is the default handler for wp_die if you want a custom one for your
 * site then you can overload using the {@see 'wp_die_handler'} filter in wp_die().
 *
 * @since 3.0.0
 * @access private
 *
 * @param string|WP_Error $message Error message or WP_Error object.
 * @param string          $title   Optional. Error title. Default empty.
 * @param string|array    $args    Optional. Arguments to control behavior. Default empty array.
 */
function _default_wp_die_handler($message, $title = '', $args = array())
{
}
/**
 * Kill WordPress execution and display XML message with error message.
 *
 * This is the handler for wp_die when processing XMLRPC requests.
 *
 * @since 3.2.0
 * @access private
 *
 * @global wp_xmlrpc_server $wp_xmlrpc_server
 *
 * @param string       $message Error message.
 * @param string       $title   Optional. Error title. Default empty.
 * @param string|array $args    Optional. Arguments to control behavior. Default empty array.
 */
function _xmlrpc_wp_die_handler($message, $title = '', $args = array())
{
}
/**
 * Kill WordPress ajax execution.
 *
 * This is the handler for wp_die when processing Ajax requests.
 *
 * @since 3.4.0
 * @access private
 *
 * @param string       $message Error message.
 * @param string       $title   Optional. Error title (unused). Default empty.
 * @param string|array $args    Optional. Arguments to control behavior. Default empty array.
 */
function _ajax_wp_die_handler($message, $title = '', $args = array())
{
}
/**
 * Kill WordPress execution.
 *
 * This is the handler for wp_die when processing APP requests.
 *
 * @since 3.4.0
 * @access private
 *
 * @param string $message Optional. Response to print. Default empty.
 */
function _scalar_wp_die_handler($message = '')
{
}
/**
 * Encode a variable into JSON, with some sanity checks.
 *
 * @since 4.1.0
 *
 * @param mixed $data    Variable (usually an array or object) to encode as JSON.
 * @param int   $options Optional. Options to be passed to json_encode(). Default 0.
 * @param int   $depth   Optional. Maximum depth to walk through $data. Must be
 *                       greater than 0. Default 512.
 * @return string|false The JSON encoded string, or false if it cannot be encoded.
 */
function wp_json_encode($data, $options = 0, $depth = 512)
{
}
/**
 * Perform sanity checks on data that shall be encoded to JSON.
 *
 * @ignore
 * @since 4.1.0
 * @access private
 *
 * @see wp_json_encode()
 *
 * @param mixed $data  Variable (usually an array or object) to encode as JSON.
 * @param int   $depth Maximum depth to walk through $data. Must be greater than 0.
 * @return mixed The sanitized data that shall be encoded to JSON.
 */
function _wp_json_sanity_check($data, $depth)
{
}
/**
 * Convert a string to UTF-8, so that it can be safely encoded to JSON.
 *
 * @ignore
 * @since 4.1.0
 * @access private
 *
 * @see _wp_json_sanity_check()
 *
 * @staticvar bool $use_mb
 *
 * @param string $string The string which is to be converted.
 * @return string The checked string.
 */
function _wp_json_convert_string($string)
{
}
/**
 * Prepares response data to be serialized to JSON.
 *
 * This supports the JsonSerializable interface for PHP 5.2-5.3 as well.
 *
 * @ignore
 * @since 4.4.0
 * @access private
 *
 * @param mixed $data Native representation.
 * @return bool|int|float|null|string|array Data ready for `json_encode()`.
 */
function _wp_json_prepare_data($data)
{
}
/**
 * Send a JSON response back to an Ajax request.
 *
 * @since 3.5.0
 * @since 4.7.0 The `$status_code` parameter was added.
 *
 * @param mixed $response    Variable (usually an array or object) to encode as JSON,
 *                           then print and die.
 * @param int   $status_code The HTTP status code to output.
 */
function wp_send_json($response, $status_code = \null)
{
}
/**
 * Send a JSON response back to an Ajax request, indicating success.
 *
 * @since 3.5.0
 * @since 4.7.0 The `$status_code` parameter was added.
 *
 * @param mixed $data        Data to encode as JSON, then print and die.
 * @param int   $status_code The HTTP status code to output.
 */
function wp_send_json_success($data = \null, $status_code = \null)
{
}
/**
 * Send a JSON response back to an Ajax request, indicating failure.
 *
 * If the `$data` parameter is a WP_Error object, the errors
 * within the object are processed and output as an array of error
 * codes and corresponding messages. All other types are output
 * without further processing.
 *
 * @since 3.5.0
 * @since 4.1.0 The `$data` parameter is now processed if a WP_Error object is passed in.
 * @since 4.7.0 The `$status_code` parameter was added.
 *
 * @param mixed $data        Data to encode as JSON, then print and die.
 * @param int   $status_code The HTTP status code to output.
 */
function wp_send_json_error($data = \null, $status_code = \null)
{
}
/**
 * Checks that a JSONP callback is a valid JavaScript callback.
 *
 * Only allows alphanumeric characters and the dot character in callback
 * function names. This helps to mitigate XSS attacks caused by directly
 * outputting user input.
 *
 * @since 4.6.0
 *
 * @param string $callback Supplied JSONP callback function.
 * @return bool True if valid callback, otherwise false.
 */
function wp_check_jsonp_callback($callback)
{
}
/**
 * Retrieve the WordPress home page URL.
 *
 * If the constant named 'WP_HOME' exists, then it will be used and returned
 * by the function. This can be used to counter the redirection on your local
 * development environment.
 *
 * @since 2.2.0
 * @access private
 *
 * @see WP_HOME
 *
 * @param string $url URL for the home location.
 * @return string Homepage location.
 */
function _config_wp_home($url = '')
{
}
/**
 * Retrieve the WordPress site URL.
 *
 * If the constant named 'WP_SITEURL' is defined, then the value in that
 * constant will always be returned. This can be used for debugging a site
 * on your localhost while not having to change the database to your URL.
 *
 * @since 2.2.0
 * @access private
 *
 * @see WP_SITEURL
 *
 * @param string $url URL to set the WordPress site location.
 * @return string The WordPress Site URL.
 */
function _config_wp_siteurl($url = '')
{
}
/**
 * Delete the fresh site option.
 *
 * @since 4.7.0
 * @access private
 */
function _delete_option_fresh_site()
{
}
/**
 * Set the localized direction for MCE plugin.
 *
 * Will only set the direction to 'rtl', if the WordPress locale has
 * the text direction set to 'rtl'.
 *
 * Fills in the 'directionality' setting, enables the 'directionality'
 * plugin, and adds the 'ltr' button to 'toolbar1', formerly
 * 'theme_advanced_buttons1' array keys. These keys are then returned
 * in the $mce_init (TinyMCE settings) array.
 *
 * @since 2.1.0
 * @access private
 *
 * @param array $mce_init MCE settings array.
 * @return array Direction set for 'rtl', if needed by locale.
 */
function _mce_set_direction($mce_init)
{
}
/**
 * Convert smiley code to the icon graphic file equivalent.
 *
 * You can turn off smilies, by going to the write setting screen and unchecking
 * the box, or by setting 'use_smilies' option to false or removing the option.
 *
 * Plugins may override the default smiley list by setting the $wpsmiliestrans
 * to an array, with the key the code the blogger types in and the value the
 * image file.
 *
 * The $wp_smiliessearch global is for the regular expression and is set each
 * time the function is called.
 *
 * The full list of smilies can be found in the function and won't be listed in
 * the description. Probably should create a Codex page for it, so that it is
 * available.
 *
 * @global array $wpsmiliestrans
 * @global array $wp_smiliessearch
 *
 * @since 2.2.0
 */
function smilies_init()
{
}
/**
 * Merge user defined arguments into defaults array.
 *
 * This function is used throughout WordPress to allow for both string or array
 * to be merged into another array.
 *
 * @since 2.2.0
 * @since 2.3.0 `$args` can now also be an object.
 *
 * @param string|array|object $args     Value to merge with $defaults.
 * @param array               $defaults Optional. Array that serves as the defaults. Default empty.
 * @return array Merged user defined values with defaults.
 */
function wp_parse_args($args, $defaults = '')
{
}
/**
 * Clean up an array, comma- or space-separated list of IDs.
 *
 * @since 3.0.0
 *
 * @param array|string $list List of ids.
 * @return array Sanitized array of IDs.
 */
function wp_parse_id_list($list)
{
}
/**
 * Clean up an array, comma- or space-separated list of slugs.
 *
 * @since 4.7.0
 *
 * @param  array|string $list List of slugs.
 * @return array Sanitized array of slugs.
 */
function wp_parse_slug_list($list)
{
}
/**
 * Extract a slice of an array, given a list of keys.
 *
 * @since 3.1.0
 *
 * @param array $array The original array.
 * @param array $keys  The list of keys.
 * @return array The array slice.
 */
function wp_array_slice_assoc($array, $keys)
{
}
/**
 * Determines if the variable is a numeric-indexed array.
 *
 * @since 4.4.0
 *
 * @param mixed $data Variable to check.
 * @return bool Whether the variable is a list.
 */
function wp_is_numeric_array($data)
{
}
/**
 * Filters a list of objects, based on a set of key => value arguments.
 *
 * @since 3.0.0
 * @since 4.7.0 Uses WP_List_Util class.
 *
 * @param array       $list     An array of objects to filter
 * @param array       $args     Optional. An array of key => value arguments to match
 *                              against each object. Default empty array.
 * @param string      $operator Optional. The logical operation to perform. 'or' means
 *                              only one element from the array needs to match; 'and'
 *                              means all elements must match; 'not' means no elements may
 *                              match. Default 'and'.
 * @param bool|string $field    A field from the object to place instead of the entire object.
 *                              Default false.
 * @return array A list of objects or object fields.
 */
function wp_filter_object_list($list, $args = array(), $operator = 'and', $field = \false)
{
}
/**
 * Filters a list of objects, based on a set of key => value arguments.
 *
 * @since 3.1.0
 * @since 4.7.0 Uses WP_List_Util class.
 *
 * @param array  $list     An array of objects to filter.
 * @param array  $args     Optional. An array of key => value arguments to match
 *                         against each object. Default empty array.
 * @param string $operator Optional. The logical operation to perform. 'AND' means
 *                         all elements from the array must match. 'OR' means only
 *                         one element needs to match. 'NOT' means no elements may
 *                         match. Default 'AND'.
 * @return array Array of found values.
 */
function wp_list_filter($list, $args = array(), $operator = 'AND')
{
}
/**
 * Pluck a certain field out of each object in a list.
 *
 * This has the same functionality and prototype of
 * array_column() (PHP 5.5) but also supports objects.
 *
 * @since 3.1.0
 * @since 4.0.0 $index_key parameter added.
 * @since 4.7.0 Uses WP_List_Util class.
 *
 * @param array      $list      List of objects or arrays
 * @param int|string $field     Field from the object to place instead of the entire object
 * @param int|string $index_key Optional. Field from the object to use as keys for the new array.
 *                              Default null.
 * @return array Array of found values. If `$index_key` is set, an array of found values with keys
 *               corresponding to `$index_key`. If `$index_key` is null, array keys from the original
 *               `$list` will be preserved in the results.
 */
function wp_list_pluck($list, $field, $index_key = \null)
{
}
/**
 * Sorts a list of objects, based on one or more orderby arguments.
 *
 * @since 4.7.0
 *
 * @param array        $list          An array of objects to filter.
 * @param string|array $orderby       Optional. Either the field name to order by or an array
 *                                    of multiple orderby fields as $orderby => $order.
 * @param string       $order         Optional. Either 'ASC' or 'DESC'. Only used if $orderby
 *                                    is a string.
 * @param bool         $preserve_keys Optional. Whether to preserve keys. Default false.
 * @return array The sorted array.
 */
function wp_list_sort($list, $orderby = array(), $order = 'ASC', $preserve_keys = \false)
{
}
/**
 * Determines if Widgets library should be loaded.
 *
 * Checks to make sure that the widgets library hasn't already been loaded.
 * If it hasn't, then it will load the widgets library and run an action hook.
 *
 * @since 2.2.0
 */
function wp_maybe_load_widgets()
{
}
/**
 * Append the Widgets menu to the themes main menu.
 *
 * @since 2.2.0
 *
 * @global array $submenu
 */
function wp_widgets_add_menu()
{
}
/**
 * Flush all output buffers for PHP 5.2.
 *
 * Make sure all output buffers are flushed before our singletons are destroyed.
 *
 * @since 2.2.0
 */
function wp_ob_end_flush_all()
{
}
/**
 * Load custom DB error or display WordPress DB error.
 *
 * If a file exists in the wp-content directory named db-error.php, then it will
 * be loaded instead of displaying the WordPress DB error. If it is not found,
 * then the WordPress DB error will be displayed instead.
 *
 * The WordPress DB error sets the HTTP status header to 500 to try to prevent
 * search engines from caching the message. Custom DB messages should do the
 * same.
 *
 * This function was backported to WordPress 2.3.2, but originally was added
 * in WordPress 2.5.0.
 *
 * @since 2.3.2
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 */
function dead_db()
{
}
/**
 * Convert a value to non-negative integer.
 *
 * @since 2.5.0
 *
 * @param mixed $maybeint Data you wish to have converted to a non-negative integer.
 * @return int A non-negative integer.
 */
function absint($maybeint)
{
}
/**
 * Mark a function as deprecated and inform when it has been used.
 *
 * There is a {@see 'hook deprecated_function_run'} that will be called that can be used
 * to get the backtrace up to what file and function called the deprecated
 * function.
 *
 * The current behavior is to trigger a user error if `WP_DEBUG` is true.
 *
 * This function is to be used in every function that is deprecated.
 *
 * @since 2.5.0
 * @access private
 *
 * @param string $function    The function that was called.
 * @param string $version     The version of WordPress that deprecated the function.
 * @param string $replacement Optional. The function that should have been called. Default null.
 */
function _deprecated_function($function, $version, $replacement = \null)
{
}
/**
 * Marks a constructor as deprecated and informs when it has been used.
 *
 * Similar to _deprecated_function(), but with different strings. Used to
 * remove PHP4 style constructors.
 *
 * The current behavior is to trigger a user error if `WP_DEBUG` is true.
 *
 * This function is to be used in every PHP4 style constructor method that is deprecated.
 *
 * @since 4.3.0
 * @since 4.5.0 Added the `$parent_class` parameter.
 *
 * @access private
 *
 * @param string $class        The class containing the deprecated constructor.
 * @param string $version      The version of WordPress that deprecated the function.
 * @param string $parent_class Optional. The parent class calling the deprecated constructor.
 *                             Default empty string.
 */
function _deprecated_constructor($class, $version, $parent_class = '')
{
}
/**
 * Mark a file as deprecated and inform when it has been used.
 *
 * There is a hook {@see 'deprecated_file_included'} that will be called that can be used
 * to get the backtrace up to what file and function included the deprecated
 * file.
 *
 * The current behavior is to trigger a user error if `WP_DEBUG` is true.
 *
 * This function is to be used in every file that is deprecated.
 *
 * @since 2.5.0
 * @access private
 *
 * @param string $file        The file that was included.
 * @param string $version     The version of WordPress that deprecated the file.
 * @param string $replacement Optional. The file that should have been included based on ABSPATH.
 *                            Default null.
 * @param string $message     Optional. A message regarding the change. Default empty.
 */
function _deprecated_file($file, $version, $replacement = \null, $message = '')
{
}
/**
 * Mark a function argument as deprecated and inform when it has been used.
 *
 * This function is to be used whenever a deprecated function argument is used.
 * Before this function is called, the argument must be checked for whether it was
 * used by comparing it to its default value or evaluating whether it is empty.
 * For example:
 *
 *     if ( ! empty( $deprecated ) ) {
 *         _deprecated_argument( __FUNCTION__, '3.0.0' );
 *     }
 *
 *
 * There is a hook deprecated_argument_run that will be called that can be used
 * to get the backtrace up to what file and function used the deprecated
 * argument.
 *
 * The current behavior is to trigger a user error if WP_DEBUG is true.
 *
 * @since 3.0.0
 * @access private
 *
 * @param string $function The function that was called.
 * @param string $version  The version of WordPress that deprecated the argument used.
 * @param string $message  Optional. A message regarding the change. Default null.
 */
function _deprecated_argument($function, $version, $message = \null)
{
}
/**
 * Marks a deprecated action or filter hook as deprecated and throws a notice.
 *
 * Use the {@see 'deprecated_hook_run'} action to get the backtrace describing where
 * the deprecated hook was called.
 *
 * Default behavior is to trigger a user error if `WP_DEBUG` is true.
 *
 * This function is called by the do_action_deprecated() and apply_filters_deprecated()
 * functions, and so generally does not need to be called directly.
 *
 * @since 4.6.0
 * @access private
 *
 * @param string $hook        The hook that was used.
 * @param string $version     The version of WordPress that deprecated the hook.
 * @param string $replacement Optional. The hook that should have been used.
 * @param string $message     Optional. A message regarding the change.
 */
function _deprecated_hook($hook, $version, $replacement = \null, $message = \null)
{
}
/**
 * Mark something as being incorrectly called.
 *
 * There is a hook {@see 'doing_it_wrong_run'} that will be called that can be used
 * to get the backtrace up to what file and function called the deprecated
 * function.
 *
 * The current behavior is to trigger a user error if `WP_DEBUG` is true.
 *
 * @since 3.1.0
 * @access private
 *
 * @param string $function The function that was called.
 * @param string $message  A message explaining what has been done incorrectly.
 * @param string $version  The version of WordPress where the message was added.
 */
function _doing_it_wrong($function, $message, $version)
{
}
/**
 * Is the server running earlier than 1.5.0 version of lighttpd?
 *
 * @since 2.5.0
 *
 * @return bool Whether the server is running lighttpd < 1.5.0.
 */
function is_lighttpd_before_150()
{
}
/**
 * Does the specified module exist in the Apache config?
 *
 * @since 2.5.0
 *
 * @global bool $is_apache
 *
 * @param string $mod     The module, e.g. mod_rewrite.
 * @param bool   $default Optional. The default return value if the module is not found. Default false.
 * @return bool Whether the specified module is loaded.
 */
function apache_mod_loaded($mod, $default = \false)
{
}
/**
 * Check if IIS 7+ supports pretty permalinks.
 *
 * @since 2.8.0
 *
 * @global bool $is_iis7
 *
 * @return bool Whether IIS7 supports permalinks.
 */
function iis7_supports_permalinks()
{
}
/**
 * Validates a file name and path against an allowed set of rules.
 *
 * A return value of `1` means the file path contains directory traversal.
 *
 * A return value of `2` means the file path contains a Windows drive path.
 *
 * A return value of `3` means the file is not in the allowed files list.
 *
 * @since 1.2.0
 *
 * @param string $file          File path.
 * @param array  $allowed_files Optional. List of allowed files.
 * @return int 0 means nothing is wrong, greater than 0 means something was wrong.
 */
function validate_file($file, $allowed_files = array())
{
}
/**
 * Whether to force SSL used for the Administration Screens.
 *
 * @since 2.6.0
 *
 * @staticvar bool $forced
 *
 * @param string|bool $force Optional. Whether to force SSL in admin screens. Default null.
 * @return bool True if forced, false if not forced.
 */
function force_ssl_admin($force = \null)
{
}
/**
 * Guess the URL for the site.
 *
 * Will remove wp-admin links to retrieve only return URLs not in the wp-admin
 * directory.
 *
 * @since 2.6.0
 *
 * @return string The guessed URL.
 */
function wp_guess_url()
{
}
/**
 * Temporarily suspend cache additions.
 *
 * Stops more data being added to the cache, but still allows cache retrieval.
 * This is useful for actions, such as imports, when a lot of data would otherwise
 * be almost uselessly added to the cache.
 *
 * Suspension lasts for a single page load at most. Remember to call this
 * function again if you wish to re-enable cache adds earlier.
 *
 * @since 3.3.0
 *
 * @staticvar bool $_suspend
 *
 * @param bool $suspend Optional. Suspends additions if true, re-enables them if false.
 * @return bool The current suspend setting
 */
function wp_suspend_cache_addition($suspend = \null)
{
}
/**
 * Suspend cache invalidation.
 *
 * Turns cache invalidation on and off. Useful during imports where you don't want to do
 * invalidations every time a post is inserted. Callers must be sure that what they are
 * doing won't lead to an inconsistent cache when invalidation is suspended.
 *
 * @since 2.7.0
 *
 * @global bool $_wp_suspend_cache_invalidation
 *
 * @param bool $suspend Optional. Whether to suspend or enable cache invalidation. Default true.
 * @return bool The current suspend setting.
 */
function wp_suspend_cache_invalidation($suspend = \true)
{
}
/**
 * Determine whether a site is the main site of the current network.
 *
 * @since 3.0.0
 * @since 4.9.0 The $network_id parameter has been added.
 *
 * @param int $site_id    Optional. Site ID to test. Defaults to current site.
 * @param int $network_id Optional. Network ID of the network to check for.
 *                        Defaults to current network.
 * @return bool True if $site_id is the main site of the network, or if not
 *              running Multisite.
 */
function is_main_site($site_id = \null, $network_id = \null)
{
}
/**
 * Gets the main site ID.
 *
 * @since 4.9.0
 *
 * @param int $network_id Optional. The ID of the network for which to get the main site.
 *                        Defaults to the current network.
 * @return int The ID of the main site.
 */
function get_main_site_id($network_id = \null)
{
}
/**
 * Determine whether a network is the main network of the Multisite installation.
 *
 * @since 3.7.0
 *
 * @param int $network_id Optional. Network ID to test. Defaults to current network.
 * @return bool True if $network_id is the main network, or if not running Multisite.
 */
function is_main_network($network_id = \null)
{
}
/**
 * Get the main network ID.
 *
 * @since 4.3.0
 *
 * @return int The ID of the main network.
 */
function get_main_network_id()
{
}
/**
 * Determine whether global terms are enabled.
 *
 * @since 3.0.0
 *
 * @staticvar bool $global_terms
 *
 * @return bool True if multisite and global terms enabled.
 */
function global_terms_enabled()
{
}
/**
 * gmt_offset modification for smart timezone handling.
 *
 * Overrides the gmt_offset option if we have a timezone_string available.
 *
 * @since 2.8.0
 *
 * @return float|false Timezone GMT offset, false otherwise.
 */
function wp_timezone_override_offset()
{
}
/**
 * Sort-helper for timezones.
 *
 * @since 2.9.0
 * @access private
 *
 * @param array $a
 * @param array $b
 * @return int
 */
function _wp_timezone_choice_usort_callback($a, $b)
{
}
/**
 * Gives a nicely-formatted list of timezone strings.
 *
 * @since 2.9.0
 * @since 4.7.0 Added the `$locale` parameter.
 *
 * @staticvar bool $mo_loaded
 * @staticvar string $locale_loaded
 *
 * @param string $selected_zone Selected timezone.
 * @param string $locale        Optional. Locale to load the timezones in. Default current site locale.
 * @return string
 */
function wp_timezone_choice($selected_zone, $locale = \null)
{
}
/**
 * Strip close comment and close php tags from file headers used by WP.
 *
 * @since 2.8.0
 * @access private
 *
 * @see https://core.trac.wordpress.org/ticket/8497
 *
 * @param string $str Header comment to clean up.
 * @return string
 */
function _cleanup_header_comment($str)
{
}
/**
 * Permanently delete comments or posts of any type that have held a status
 * of 'trash' for the number of days defined in EMPTY_TRASH_DAYS.
 *
 * The default value of `EMPTY_TRASH_DAYS` is 30 (days).
 *
 * @since 2.9.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 */
function wp_scheduled_delete()
{
}
/**
 * Retrieve metadata from a file.
 *
 * Searches for metadata in the first 8kiB of a file, such as a plugin or theme.
 * Each piece of metadata must be on its own line. Fields can not span multiple
 * lines, the value will get cut at the end of the first line.
 *
 * If the file data is not within that first 8kiB, then the author should correct
 * their plugin file and move the data headers to the top.
 *
 * @link https://codex.wordpress.org/File_Header
 *
 * @since 2.9.0
 *
 * @param string $file            Path to the file.
 * @param array  $default_headers List of headers, in the format array('HeaderKey' => 'Header Name').
 * @param string $context         Optional. If specified adds filter hook {@see 'extra_$context_headers'}.
 *                                Default empty.
 * @return array Array of file headers in `HeaderKey => Header Value` format.
 */
function get_file_data($file, $default_headers, $context = '')
{
}
/**
 * Returns true.
 *
 * Useful for returning true to filters easily.
 *
 * @since 3.0.0
 *
 * @see __return_false()
 *
 * @return true True.
 */
function __return_true()
{
}
/**
 * Returns false.
 *
 * Useful for returning false to filters easily.
 *
 * @since 3.0.0
 *
 * @see __return_true()
 *
 * @return false False.
 */
function __return_false()
{
}
/**
 * Returns 0.
 *
 * Useful for returning 0 to filters easily.
 *
 * @since 3.0.0
 *
 * @return int 0.
 */
function __return_zero()
{
}
/**
 * Returns an empty array.
 *
 * Useful for returning an empty array to filters easily.
 *
 * @since 3.0.0
 *
 * @return array Empty array.
 */
function __return_empty_array()
{
}
/**
 * Returns null.
 *
 * Useful for returning null to filters easily.
 *
 * @since 3.4.0
 *
 * @return null Null value.
 */
function __return_null()
{
}
/**
 * Returns an empty string.
 *
 * Useful for returning an empty string to filters easily.
 *
 * @since 3.7.0
 *
 * @see __return_null()
 *
 * @return string Empty string.
 */
function __return_empty_string()
{
}
/**
 * Send a HTTP header to disable content type sniffing in browsers which support it.
 *
 * @since 3.0.0
 *
 * @see https://blogs.msdn.com/ie/archive/2008/07/02/ie8-security-part-v-comprehensive-protection.aspx
 * @see https://src.chromium.org/viewvc/chrome?view=rev&revision=6985
 */
function send_nosniff_header()
{
}
/**
 * Return a MySQL expression for selecting the week number based on the start_of_week option.
 *
 * @ignore
 * @since 3.0.0
 *
 * @param string $column Database column.
 * @return string SQL clause.
 */
function _wp_mysql_week($column)
{
}
/**
 * Find hierarchy loops using a callback function that maps object IDs to parent IDs.
 *
 * @since 3.1.0
 * @access private
 *
 * @param callable $callback      Function that accepts ( ID, $callback_args ) and outputs parent_ID.
 * @param int      $start         The ID to start the loop check at.
 * @param int      $start_parent  The parent_ID of $start to use instead of calling $callback( $start ).
 *                                Use null to always use $callback
 * @param array    $callback_args Optional. Additional arguments to send to $callback.
 * @return array IDs of all members of loop.
 */
function wp_find_hierarchy_loop($callback, $start, $start_parent, $callback_args = array())
{
}
/**
 * Use the "The Tortoise and the Hare" algorithm to detect loops.
 *
 * For every step of the algorithm, the hare takes two steps and the tortoise one.
 * If the hare ever laps the tortoise, there must be a loop.
 *
 * @since 3.1.0
 * @access private
 *
 * @param callable $callback      Function that accepts ( ID, callback_arg, ... ) and outputs parent_ID.
 * @param int      $start         The ID to start the loop check at.
 * @param array    $override      Optional. An array of ( ID => parent_ID, ... ) to use instead of $callback.
 *                                Default empty array.
 * @param array    $callback_args Optional. Additional arguments to send to $callback. Default empty array.
 * @param bool     $_return_loop  Optional. Return loop members or just detect presence of loop? Only set
 *                                to true if you already know the given $start is part of a loop (otherwise
 *                                the returned array might include branches). Default false.
 * @return mixed Scalar ID of some arbitrary member of the loop, or array of IDs of all members of loop if
 *               $_return_loop
 */
function wp_find_hierarchy_loop_tortoise_hare($callback, $start, $override = array(), $callback_args = array(), $_return_loop = \false)
{
}
/**
 * Send a HTTP header to limit rendering of pages to same origin iframes.
 *
 * @since 3.1.3
 *
 * @see https://developer.mozilla.org/en/the_x-frame-options_response_header
 */
function send_frame_options_header()
{
}
/**
 * Retrieve a list of protocols to allow in HTML attributes.
 *
 * @since 3.3.0
 * @since 4.3.0 Added 'webcal' to the protocols array.
 * @since 4.7.0 Added 'urn' to the protocols array.
 *
 * @see wp_kses()
 * @see esc_url()
 *
 * @staticvar array $protocols
 *
 * @return array Array of allowed protocols. Defaults to an array containing 'http', 'https',
 *               'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet',
 *               'mms', 'rtsp', 'svn', 'tel', 'fax', 'xmpp', 'webcal', and 'urn'.
 */
function wp_allowed_protocols()
{
}
/**
 * Return a comma-separated string of functions that have been called to get
 * to the current point in code.
 *
 * @since 3.4.0
 *
 * @see https://core.trac.wordpress.org/ticket/19589
 *
 * @param string $ignore_class Optional. A class to ignore all function calls within - useful
 *                             when you want to just give info about the callee. Default null.
 * @param int    $skip_frames  Optional. A number of stack frames to skip - useful for unwinding
 *                             back to the source of the issue. Default 0.
 * @param bool   $pretty       Optional. Whether or not you want a comma separated string or raw
 *                             array returned. Default true.
 * @return string|array Either a string containing a reversed comma separated trace or an array
 *                      of individual calls.
 */
function wp_debug_backtrace_summary($ignore_class = \null, $skip_frames = 0, $pretty = \true)
{
}
/**
 * Retrieve ids that are not already present in the cache.
 *
 * @since 3.4.0
 * @access private
 *
 * @param array  $object_ids ID list.
 * @param string $cache_key  The cache bucket to check against.
 *
 * @return array List of ids not present in the cache.
 */
function _get_non_cached_ids($object_ids, $cache_key)
{
}
/**
 * Test if the current device has the capability to upload files.
 *
 * @since 3.4.0
 * @access private
 *
 * @return bool Whether the device is able to upload files.
 */
function _device_can_upload()
{
}
/**
 * Test if a given path is a stream URL
 *
 * @since 3.5.0
 *
 * @param string $path The resource path or URL.
 * @return bool True if the path is a stream URL.
 */
function wp_is_stream($path)
{
}
/**
 * Test if the supplied date is valid for the Gregorian calendar.
 *
 * @since 3.5.0
 *
 * @link https://secure.php.net/manual/en/function.checkdate.php
 *
 * @param  int    $month       Month number.
 * @param  int    $day         Day number.
 * @param  int    $year        Year number.
 * @param  string $source_date The date to filter.
 * @return bool True if valid date, false if not valid date.
 */
function wp_checkdate($month, $day, $year, $source_date)
{
}
/**
 * Load the auth check for monitoring whether the user is still logged in.
 *
 * Can be disabled with remove_action( 'admin_enqueue_scripts', 'wp_auth_check_load' );
 *
 * This is disabled for certain screens where a login screen could cause an
 * inconvenient interruption. A filter called {@see 'wp_auth_check_load'} can be used
 * for fine-grained control.
 *
 * @since 3.6.0
 */
function wp_auth_check_load()
{
}
/**
 * Output the HTML that shows the wp-login dialog when the user is no longer logged in.
 *
 * @since 3.6.0
 */
function wp_auth_check_html()
{
}
/**
 * Check whether a user is still logged in, for the heartbeat.
 *
 * Send a result that shows a log-in box if the user is no longer logged in,
 * or if their cookie is within the grace period.
 *
 * @since 3.6.0
 *
 * @global int $login_grace_period
 *
 * @param array $response  The Heartbeat response.
 * @return array $response The Heartbeat response with 'wp-auth-check' value set.
 */
function wp_auth_check($response)
{
}
/**
 * Return RegEx body to liberally match an opening HTML tag.
 *
 * Matches an opening HTML tag that:
 * 1. Is self-closing or
 * 2. Has no body but has a closing tag of the same name or
 * 3. Contains a body and a closing tag of the same name
 *
 * Note: this RegEx does not balance inner tags and does not attempt
 * to produce valid HTML
 *
 * @since 3.6.0
 *
 * @param string $tag An HTML tag name. Example: 'video'.
 * @return string Tag RegEx.
 */
function get_tag_regex($tag)
{
}
/**
 * Retrieve a canonical form of the provided charset appropriate for passing to PHP
 * functions such as htmlspecialchars() and charset html attributes.
 *
 * @since 3.6.0
 * @access private
 *
 * @see https://core.trac.wordpress.org/ticket/23688
 *
 * @param string $charset A charset name.
 * @return string The canonical form of the charset.
 */
function _canonical_charset($charset)
{
}
/**
 * Set the mbstring internal encoding to a binary safe encoding when func_overload
 * is enabled.
 *
 * When mbstring.func_overload is in use for multi-byte encodings, the results from
 * strlen() and similar functions respect the utf8 characters, causing binary data
 * to return incorrect lengths.
 *
 * This function overrides the mbstring encoding to a binary-safe encoding, and
 * resets it to the users expected encoding afterwards through the
 * `reset_mbstring_encoding` function.
 *
 * It is safe to recursively call this function, however each
 * `mbstring_binary_safe_encoding()` call must be followed up with an equal number
 * of `reset_mbstring_encoding()` calls.
 *
 * @since 3.7.0
 *
 * @see reset_mbstring_encoding()
 *
 * @staticvar array $encodings
 * @staticvar bool  $overloaded
 *
 * @param bool $reset Optional. Whether to reset the encoding back to a previously-set encoding.
 *                    Default false.
 */
function mbstring_binary_safe_encoding($reset = \false)
{
}
/**
 * Reset the mbstring internal encoding to a users previously set encoding.
 *
 * @see mbstring_binary_safe_encoding()
 *
 * @since 3.7.0
 */
function reset_mbstring_encoding()
{
}
/**
 * Filter/validate a variable as a boolean.
 *
 * Alternative to `filter_var( $var, FILTER_VALIDATE_BOOLEAN )`.
 *
 * @since 4.0.0
 *
 * @param mixed $var Boolean value to validate.
 * @return bool Whether the value is validated.
 */
function wp_validate_boolean($var)
{
}
/**
 * Delete a file
 *
 * @since 4.2.0
 *
 * @param string $file The path to the file to delete.
 */
function wp_delete_file($file)
{
}
/**
 * Deletes a file if its path is within the given directory.
 *
 * @since 4.9.7
 *
 * @param string $file      Absolute path to the file to delete.
 * @param string $directory Absolute path to a directory.
 * @return bool True on success, false on failure.
 */
function wp_delete_file_from_directory($file, $directory)
{
}
/**
 * Outputs a small JS snippet on preview tabs/windows to remove `window.name` on unload.
 *
 * This prevents reusing the same tab for a preview when the user has navigated away.
 *
 * @since 4.3.0
 *
 * @global WP_Post $post
 */
function wp_post_preview_js()
{
}
/**
 * Parses and formats a MySQL datetime (Y-m-d H:i:s) for ISO8601/RFC3339.
 *
 * Explicitly strips timezones, as datetimes are not saved with any timezone
 * information. Including any information on the offset could be misleading.
 *
 * @since 4.4.0
 *
 * @param string $date_string Date string to parse and format.
 * @return string Date formatted for ISO8601/RFC3339.
 */
function mysql_to_rfc3339($date_string)
{
}
/**
 * Attempts to raise the PHP memory limit for memory intensive processes.
 *
 * Only allows raising the existing limit and prevents lowering it.
 *
 * @since 4.6.0
 *
 * @param string $context Optional. Context in which the function is called. Accepts either 'admin',
 *                        'image', or an arbitrary other context. If an arbitrary context is passed,
 *                        the similarly arbitrary {@see '{$context}_memory_limit'} filter will be
 *                        invoked. Default 'admin'.
 * @return bool|int|string The limit that was set or false on failure.
 */
function wp_raise_memory_limit($context = 'admin')
{
}
/**
 * Generate a random UUID (version 4).
 *
 * @since 4.7.0
 *
 * @return string UUID.
 */
function wp_generate_uuid4()
{
}
/**
 * Validates that a UUID is valid.
 *
 * @since 4.9.0
 *
 * @param mixed $uuid    UUID to check.
 * @param int   $version Specify which version of UUID to check against. Default is none, to accept any UUID version. Otherwise, only version allowed is `4`.
 * @return bool The string is a valid UUID or false on failure.
 */
function wp_is_uuid($uuid, $version = \null)
{
}
/**
 * Get last changed date for the specified cache group.
 *
 * @since 4.7.0
 *
 * @param string $group Where the cache contents are grouped.
 *
 * @return string $last_changed UNIX timestamp with microseconds representing when the group was last changed.
 */
function wp_cache_get_last_changed($group)
{
}
/**
 * Send an email to the old site admin email address when the site admin email address changes.
 *
 * @since 4.9.0
 *
 * @param string $old_email   The old site admin email address.
 * @param string $new_email   The new site admin email address.
 * @param string $option_name The relevant database option name.
 */
function wp_site_admin_email_change_notification($old_email, $new_email, $option_name)
{
}
/**
 * Return an anonymized IPv4 or IPv6 address.
 *
 * @since 4.9.6 Abstracted from `WP_Community_Events::get_unsafe_client_ip()`.
 *
 * @param  string $ip_addr        The IPv4 or IPv6 address to be anonymized.
 * @param  bool   $ipv6_fallback  Optional. Whether to return the original IPv6 address if the needed functions
 *                                to anonymize it are not present. Default false, return `::` (unspecified address).
 * @return string  The anonymized IP address.
 */
function wp_privacy_anonymize_ip($ip_addr, $ipv6_fallback = \false)
{
}
/**
 * Return uniform "anonymous" data by type.
 *
 * @since 4.9.6
 *
 * @param  string $type The type of data to be anonymized.
 * @param  string $data Optional The data to be anonymized.
 * @return string The anonymous data for the requested type.
 */
function wp_privacy_anonymize_data($type, $data = '')
{
}
/**
 * Returns the directory used to store personal data export files.
 *
 * @since 4.9.6
 *
 * @see wp_privacy_exports_url
 *
 * @return string Exports directory.
 */
function wp_privacy_exports_dir()
{
}
/**
 * Returns the URL of the directory used to store personal data export files.
 *
 * @since 4.9.6
 *
 * @see wp_privacy_exports_dir
 *
 * @return string Exports directory URL.
 */
function wp_privacy_exports_url()
{
}
/**
 * Schedule a `WP_Cron` job to delete expired export files.
 *
 * @since 4.9.6
 */
function wp_schedule_delete_old_privacy_export_files()
{
}
/**
 * Cleans up export files older than three days old.
 *
 * The export files are stored in `wp-content/uploads`, and are therefore publicly
 * accessible. A CSPRN is appended to the filename to mitigate the risk of an
 * unauthorized person downloading the file, but it is still possible. Deleting
 * the file after the data subject has had a chance to delete it adds an additional
 * layer of protection.
 *
 * @since 4.9.6
 */
function wp_privacy_delete_old_export_files()
{
}
/**
 * Dependencies API: Scripts functions
 *
 * @since 2.6.0
 *
 * @package WordPress
 * @subpackage Dependencies
 */
/**
 * Initialize $wp_scripts if it has not been set.
 *
 * @global WP_Scripts $wp_scripts
 *
 * @since 4.2.0
 *
 * @return WP_Scripts WP_Scripts instance.
 */
function wp_scripts()
{
}
/**
 * Helper function to output a _doing_it_wrong message when applicable.
 *
 * @ignore
 * @since 4.2.0
 *
 * @param string $function Function name.
 */
function _wp_scripts_maybe_doing_it_wrong($function)
{
}
/**
 * Prints scripts in document head that are in the $handles queue.
 *
 * Called by admin-header.php and {@see 'wp_head'} hook. Since it is called by wp_head on every page load,
 * the function does not instantiate the WP_Scripts object unless script names are explicitly passed.
 * Makes use of already-instantiated $wp_scripts global if present. Use provided {@see 'wp_print_scripts'}
 * hook to register/enqueue new scripts.
 *
 * @see WP_Scripts::do_items()
 * @global WP_Scripts $wp_scripts The WP_Scripts object for printing scripts.
 *
 * @since 2.1.0
 *
 * @param string|bool|array $handles Optional. Scripts to be printed. Default 'false'.
 * @return array On success, a processed array of WP_Dependencies items; otherwise, an empty array.
 */
function wp_print_scripts($handles = \false)
{
}
/**
 * Adds extra code to a registered script.
 *
 * Code will only be added if the script in already in the queue.
 * Accepts a string $data containing the Code. If two or more code blocks
 * are added to the same script $handle, they will be printed in the order
 * they were added, i.e. the latter added code can redeclare the previous.
 *
 * @since 4.5.0
 *
 * @see WP_Scripts::add_inline_script()
 *
 * @param string $handle   Name of the script to add the inline script to.
 * @param string $data     String containing the javascript to be added.
 * @param string $position Optional. Whether to add the inline script before the handle
 *                         or after. Default 'after'.
 * @return bool True on success, false on failure.
 */
function wp_add_inline_script($handle, $data, $position = 'after')
{
}
/**
 * Register a new script.
 *
 * Registers a script to be enqueued later using the wp_enqueue_script() function.
 *
 * @see WP_Dependencies::add()
 * @see WP_Dependencies::add_data()
 *
 * @since 2.1.0
 * @since 4.3.0 A return value was added.
 *
 * @param string           $handle    Name of the script. Should be unique.
 * @param string           $src       Full URL of the script, or path of the script relative to the WordPress root directory.
 * @param array            $deps      Optional. An array of registered script handles this script depends on. Default empty array.
 * @param string|bool|null $ver       Optional. String specifying script version number, if it has one, which is added to the URL
 *                                    as a query string for cache busting purposes. If version is set to false, a version
 *                                    number is automatically added equal to current installed WordPress version.
 *                                    If set to null, no version is added.
 * @param bool             $in_footer Optional. Whether to enqueue the script before </body> instead of in the <head>.
 *                                    Default 'false'.
 * @return bool Whether the script has been registered. True on success, false on failure.
 */
function wp_register_script($handle, $src, $deps = array(), $ver = \false, $in_footer = \false)
{
}
/**
 * Localize a script.
 *
 * Works only if the script has already been added.
 *
 * Accepts an associative array $l10n and creates a JavaScript object:
 *
 *     "$object_name" = {
 *         key: value,
 *         key: value,
 *         ...
 *     }
 *
 *
 * @see WP_Dependencies::localize()
 * @link https://core.trac.wordpress.org/ticket/11520
 * @global WP_Scripts $wp_scripts The WP_Scripts object for printing scripts.
 *
 * @since 2.2.0
 *
 * @todo Documentation cleanup
 *
 * @param string $handle      Script handle the data will be attached to.
 * @param string $object_name Name for the JavaScript object. Passed directly, so it should be qualified JS variable.
 *                            Example: '/[a-zA-Z0-9_]+/'.
 * @param array $l10n         The data itself. The data can be either a single or multi-dimensional array.
 * @return bool True if the script was successfully localized, false otherwise.
 */
function wp_localize_script($handle, $object_name, $l10n)
{
}
/**
 * Remove a registered script.
 *
 * Note: there are intentional safeguards in place to prevent critical admin scripts,
 * such as jQuery core, from being unregistered.
 *
 * @see WP_Dependencies::remove()
 *
 * @since 2.1.0
 *
 * @param string $handle Name of the script to be removed.
 */
function wp_deregister_script($handle)
{
}
/**
 * Enqueue a script.
 *
 * Registers the script if $src provided (does NOT overwrite), and enqueues it.
 *
 * @see WP_Dependencies::add()
 * @see WP_Dependencies::add_data()
 * @see WP_Dependencies::enqueue()
 *
 * @since 2.1.0
 *
 * @param string           $handle    Name of the script. Should be unique.
 * @param string           $src       Full URL of the script, or path of the script relative to the WordPress root directory.
 *                                    Default empty.
 * @param array            $deps      Optional. An array of registered script handles this script depends on. Default empty array.
 * @param string|bool|null $ver       Optional. String specifying script version number, if it has one, which is added to the URL
 *                                    as a query string for cache busting purposes. If version is set to false, a version
 *                                    number is automatically added equal to current installed WordPress version.
 *                                    If set to null, no version is added.
 * @param bool             $in_footer Optional. Whether to enqueue the script before </body> instead of in the <head>.
 *                                    Default 'false'.
 */
function wp_enqueue_script($handle, $src = '', $deps = array(), $ver = \false, $in_footer = \false)
{
}
/**
 * Remove a previously enqueued script.
 *
 * @see WP_Dependencies::dequeue()
 *
 * @since 3.1.0
 *
 * @param string $handle Name of the script to be removed.
 */
function wp_dequeue_script($handle)
{
}
/**
 * Check whether a script has been added to the queue.
 *
 * @since 2.8.0
 * @since 3.5.0 'enqueued' added as an alias of the 'queue' list.
 *
 * @param string $handle Name of the script.
 * @param string $list   Optional. Status of the script to check. Default 'enqueued'.
 *                       Accepts 'enqueued', 'registered', 'queue', 'to_do', and 'done'.
 * @return bool Whether the script is queued.
 */
function wp_script_is($handle, $list = 'enqueued')
{
}
/**
 * Add metadata to a script.
 *
 * Works only if the script has already been added.
 *
 * Possible values for $key and $value:
 * 'conditional' string Comments for IE 6, lte IE 7, etc.
 *
 * @since 4.2.0
 *
 * @see WP_Dependency::add_data()
 *
 * @param string $handle Name of the script.
 * @param string $key    Name of data point for which we're storing a value.
 * @param mixed  $value  String containing the data to be added.
 * @return bool True on success, false on failure.
 */
function wp_script_add_data($handle, $key, $value)
{
}
/**
 * Dependencies API: Styles functions
 *
 * @since 2.6.0
 *
 * @package WordPress
 * @subpackage Dependencies
 */
/**
 * Initialize $wp_styles if it has not been set.
 *
 * @global WP_Styles $wp_styles
 *
 * @since 4.2.0
 *
 * @return WP_Styles WP_Styles instance.
 */
function wp_styles()
{
}
/**
 * Display styles that are in the $handles queue.
 *
 * Passing an empty array to $handles prints the queue,
 * passing an array with one string prints that style,
 * and passing an array of strings prints those styles.
 *
 * @global WP_Styles $wp_styles The WP_Styles object for printing styles.
 *
 * @since 2.6.0
 *
 * @param string|bool|array $handles Styles to be printed. Default 'false'.
 * @return array On success, a processed array of WP_Dependencies items; otherwise, an empty array.
 */
function wp_print_styles($handles = \false)
{
}
/**
 * Add extra CSS styles to a registered stylesheet.
 *
 * Styles will only be added if the stylesheet in already in the queue.
 * Accepts a string $data containing the CSS. If two or more CSS code blocks
 * are added to the same stylesheet $handle, they will be printed in the order
 * they were added, i.e. the latter added styles can redeclare the previous.
 *
 * @see WP_Styles::add_inline_style()
 *
 * @since 3.3.0
 *
 * @param string $handle Name of the stylesheet to add the extra styles to.
 * @param string $data   String containing the CSS styles to be added.
 * @return bool True on success, false on failure.
 */
function wp_add_inline_style($handle, $data)
{
}
/**
 * Register a CSS stylesheet.
 *
 * @see WP_Dependencies::add()
 * @link https://www.w3.org/TR/CSS2/media.html#media-types List of CSS media types.
 *
 * @since 2.6.0
 * @since 4.3.0 A return value was added.
 *
 * @param string           $handle Name of the stylesheet. Should be unique.
 * @param string           $src    Full URL of the stylesheet, or path of the stylesheet relative to the WordPress root directory.
 * @param array            $deps   Optional. An array of registered stylesheet handles this stylesheet depends on. Default empty array.
 * @param string|bool|null $ver    Optional. String specifying stylesheet version number, if it has one, which is added to the URL
 *                                 as a query string for cache busting purposes. If version is set to false, a version
 *                                 number is automatically added equal to current installed WordPress version.
 *                                 If set to null, no version is added.
 * @param string           $media  Optional. The media for which this stylesheet has been defined.
 *                                 Default 'all'. Accepts media types like 'all', 'print' and 'screen', or media queries like
 *                                 '(orientation: portrait)' and '(max-width: 640px)'.
 * @return bool Whether the style has been registered. True on success, false on failure.
 */
function wp_register_style($handle, $src, $deps = array(), $ver = \false, $media = 'all')
{
}
/**
 * Remove a registered stylesheet.
 *
 * @see WP_Dependencies::remove()
 *
 * @since 2.1.0
 *
 * @param string $handle Name of the stylesheet to be removed.
 */
function wp_deregister_style($handle)
{
}
/**
 * Enqueue a CSS stylesheet.
 *
 * Registers the style if source provided (does NOT overwrite) and enqueues.
 *
 * @see WP_Dependencies::add()
 * @see WP_Dependencies::enqueue()
 * @link https://www.w3.org/TR/CSS2/media.html#media-types List of CSS media types.
 *
 * @since 2.6.0
 *
 * @param string           $handle Name of the stylesheet. Should be unique.
 * @param string           $src    Full URL of the stylesheet, or path of the stylesheet relative to the WordPress root directory.
 *                                 Default empty.
 * @param array            $deps   Optional. An array of registered stylesheet handles this stylesheet depends on. Default empty array.
 * @param string|bool|null $ver    Optional. String specifying stylesheet version number, if it has one, which is added to the URL
 *                                 as a query string for cache busting purposes. If version is set to false, a version
 *                                 number is automatically added equal to current installed WordPress version.
 *                                 If set to null, no version is added.
 * @param string           $media  Optional. The media for which this stylesheet has been defined.
 *                                 Default 'all'. Accepts media types like 'all', 'print' and 'screen', or media queries like
 *                                 '(orientation: portrait)' and '(max-width: 640px)'.
 */
function wp_enqueue_style($handle, $src = '', $deps = array(), $ver = \false, $media = 'all')
{
}
/**
 * Remove a previously enqueued CSS stylesheet.
 *
 * @see WP_Dependencies::dequeue()
 *
 * @since 3.1.0
 *
 * @param string $handle Name of the stylesheet to be removed.
 */
function wp_dequeue_style($handle)
{
}
/**
 * Check whether a CSS stylesheet has been added to the queue.
 *
 * @since 2.8.0
 *
 * @param string $handle Name of the stylesheet.
 * @param string $list   Optional. Status of the stylesheet to check. Default 'enqueued'.
 *                       Accepts 'enqueued', 'registered', 'queue', 'to_do', and 'done'.
 * @return bool Whether style is queued.
 */
function wp_style_is($handle, $list = 'enqueued')
{
}
/**
 * Add metadata to a CSS stylesheet.
 *
 * Works only if the stylesheet has already been added.
 *
 * Possible values for $key and $value:
 * 'conditional' string      Comments for IE 6, lte IE 7 etc.
 * 'rtl'         bool|string To declare an RTL stylesheet.
 * 'suffix'      string      Optional suffix, used in combination with RTL.
 * 'alt'         bool        For rel="alternate stylesheet".
 * 'title'       string      For preferred/alternate stylesheets.
 *
 * @see WP_Dependency::add_data()
 *
 * @since 3.6.0
 *
 * @param string $handle Name of the stylesheet.
 * @param string $key    Name of data point for which we're storing a value.
 *                       Accepts 'conditional', 'rtl' and 'suffix', 'alt' and 'title'.
 * @param mixed  $value  String containing the CSS data to be added.
 * @return bool True on success, false on failure.
 */
function wp_style_add_data($handle, $key, $value)
{
}
/**
 * General template tags that can go anywhere in a template.
 *
 * @package WordPress
 * @subpackage Template
 */
/**
 * Load header template.
 *
 * Includes the header template for a theme or if a name is specified then a
 * specialised header will be included.
 *
 * For the parameter, if the file is called "header-special.php" then specify
 * "special".
 *
 * @since 1.5.0
 *
 * @param string $name The name of the specialised header.
 */
function get_header($name = \null)
{
}
/**
 * Load footer template.
 *
 * Includes the footer template for a theme or if a name is specified then a
 * specialised footer will be included.
 *
 * For the parameter, if the file is called "footer-special.php" then specify
 * "special".
 *
 * @since 1.5.0
 *
 * @param string $name The name of the specialised footer.
 */
function get_footer($name = \null)
{
}
/**
 * Load sidebar template.
 *
 * Includes the sidebar template for a theme or if a name is specified then a
 * specialised sidebar will be included.
 *
 * For the parameter, if the file is called "sidebar-special.php" then specify
 * "special".
 *
 * @since 1.5.0
 *
 * @param string $name The name of the specialised sidebar.
 */
function get_sidebar($name = \null)
{
}
/**
 * Loads a template part into a template.
 *
 * Provides a simple mechanism for child themes to overload reusable sections of code
 * in the theme.
 *
 * Includes the named template part for a theme or if a name is specified then a
 * specialised part will be included. If the theme contains no {slug}.php file
 * then no template will be included.
 *
 * The template is included using require, not require_once, so you may include the
 * same template part multiple times.
 *
 * For the $name parameter, if the file is called "{slug}-special.php" then specify
 * "special".
 *
 * @since 3.0.0
 *
 * @param string $slug The slug name for the generic template.
 * @param string $name The name of the specialised template.
 */
function get_template_part($slug, $name = \null)
{
}
/**
 * Display search form.
 *
 * Will first attempt to locate the searchform.php file in either the child or
 * the parent, then load it. If it doesn't exist, then the default search form
 * will be displayed. The default search form is HTML, which will be displayed.
 * There is a filter applied to the search form HTML in order to edit or replace
 * it. The filter is {@see 'get_search_form'}.
 *
 * This function is primarily used by themes which want to hardcode the search
 * form into the sidebar and also by the search widget in WordPress.
 *
 * There is also an action that is called whenever the function is run called,
 * {@see 'pre_get_search_form'}. This can be useful for outputting JavaScript that the
 * search relies on or various formatting that applies to the beginning of the
 * search. To give a few examples of what it can be used for.
 *
 * @since 2.7.0
 *
 * @param bool $echo Default to echo and not return the form.
 * @return string|void String when $echo is false.
 */
function get_search_form($echo = \true)
{
}
/**
 * Display the Log In/Out link.
 *
 * Displays a link, which allows users to navigate to the Log In page to log in
 * or log out depending on whether they are currently logged in.
 *
 * @since 1.5.0
 *
 * @param string $redirect Optional path to redirect to on login/logout.
 * @param bool   $echo     Default to echo and not return the link.
 * @return string|void String when retrieving.
 */
function wp_loginout($redirect = '', $echo = \true)
{
}
/**
 * Retrieves the logout URL.
 *
 * Returns the URL that allows the user to log out of the site.
 *
 * @since 2.7.0
 *
 * @param string $redirect Path to redirect to on logout.
 * @return string The logout URL. Note: HTML-encoded via esc_html() in wp_nonce_url().
 */
function wp_logout_url($redirect = '')
{
}
/**
 * Retrieves the login URL.
 *
 * @since 2.7.0
 *
 * @param string $redirect     Path to redirect to on log in.
 * @param bool   $force_reauth Whether to force reauthorization, even if a cookie is present.
 *                             Default false.
 * @return string The login URL. Not HTML-encoded.
 */
function wp_login_url($redirect = '', $force_reauth = \false)
{
}
/**
 * Returns the URL that allows the user to register on the site.
 *
 * @since 3.6.0
 *
 * @return string User registration URL.
 */
function wp_registration_url()
{
}
/**
 * Provides a simple login form for use anywhere within WordPress.
 *
 * The login format HTML is echoed by default. Pass a false value for `$echo` to return it instead.
 *
 * @since 3.0.0
 *
 * @param array $args {
 *     Optional. Array of options to control the form output. Default empty array.
 *
 *     @type bool   $echo           Whether to display the login form or return the form HTML code.
 *                                  Default true (echo).
 *     @type string $redirect       URL to redirect to. Must be absolute, as in "https://example.com/mypage/".
 *                                  Default is to redirect back to the request URI.
 *     @type string $form_id        ID attribute value for the form. Default 'loginform'.
 *     @type string $label_username Label for the username or email address field. Default 'Username or Email Address'.
 *     @type string $label_password Label for the password field. Default 'Password'.
 *     @type string $label_remember Label for the remember field. Default 'Remember Me'.
 *     @type string $label_log_in   Label for the submit button. Default 'Log In'.
 *     @type string $id_username    ID attribute value for the username field. Default 'user_login'.
 *     @type string $id_password    ID attribute value for the password field. Default 'user_pass'.
 *     @type string $id_remember    ID attribute value for the remember field. Default 'rememberme'.
 *     @type string $id_submit      ID attribute value for the submit button. Default 'wp-submit'.
 *     @type bool   $remember       Whether to display the "rememberme" checkbox in the form.
 *     @type string $value_username Default value for the username field. Default empty.
 *     @type bool   $value_remember Whether the "Remember Me" checkbox should be checked by default.
 *                                  Default false (unchecked).
 *
 * }
 * @return string|void String when retrieving.
 */
function wp_login_form($args = array())
{
}
/**
 * Returns the URL that allows the user to retrieve the lost password
 *
 * @since 2.8.0
 *
 * @param string $redirect Path to redirect to on login.
 * @return string Lost password URL.
 */
function wp_lostpassword_url($redirect = '')
{
}
/**
 * Display the Registration or Admin link.
 *
 * Display a link which allows the user to navigate to the registration page if
 * not logged in and registration is enabled or to the dashboard if logged in.
 *
 * @since 1.5.0
 *
 * @param string $before Text to output before the link. Default `<li>`.
 * @param string $after  Text to output after the link. Default `</li>`.
 * @param bool   $echo   Default to echo and not return the link.
 * @return string|void String when retrieving.
 */
function wp_register($before = '<li>', $after = '</li>', $echo = \true)
{
}
/**
 * Theme container function for the 'wp_meta' action.
 *
 * The {@see 'wp_meta'} action can have several purposes, depending on how you use it,
 * but one purpose might have been to allow for theme switching.
 *
 * @since 1.5.0
 *
 * @link https://core.trac.wordpress.org/ticket/1458 Explanation of 'wp_meta' action.
 */
function wp_meta()
{
}
/**
 * Displays information about the current site.
 *
 * @since 0.71
 *
 * @see get_bloginfo() For possible `$show` values
 *
 * @param string $show Optional. Site information to display. Default empty.
 */
function bloginfo($show = '')
{
}
/**
 * Retrieves information about the current site.
 *
 * Possible values for `$show` include:
 *
 * - 'name' - Site title (set in Settings > General)
 * - 'description' - Site tagline (set in Settings > General)
 * - 'wpurl' - The WordPress address (URL) (set in Settings > General)
 * - 'url' - The Site address (URL) (set in Settings > General)
 * - 'admin_email' - Admin email (set in Settings > General)
 * - 'charset' - The "Encoding for pages and feeds"  (set in Settings > Reading)
 * - 'version' - The current WordPress version
 * - 'html_type' - The content-type (default: "text/html"). Themes and plugins
 *   can override the default value using the {@see 'pre_option_html_type'} filter
 * - 'text_direction' - The text direction determined by the site's language. is_rtl()
 *   should be used instead
 * - 'language' - Language code for the current site
 * - 'stylesheet_url' - URL to the stylesheet for the active theme. An active child theme
 *   will take precedence over this value
 * - 'stylesheet_directory' - Directory path for the active theme.  An active child theme
 *   will take precedence over this value
 * - 'template_url' / 'template_directory' - URL of the active theme's directory. An active
 *   child theme will NOT take precedence over this value
 * - 'pingback_url' - The pingback XML-RPC file URL (xmlrpc.php)
 * - 'atom_url' - The Atom feed URL (/feed/atom)
 * - 'rdf_url' - The RDF/RSS 1.0 feed URL (/feed/rfd)
 * - 'rss_url' - The RSS 0.92 feed URL (/feed/rss)
 * - 'rss2_url' - The RSS 2.0 feed URL (/feed)
 * - 'comments_atom_url' - The comments Atom feed URL (/comments/feed)
 * - 'comments_rss2_url' - The comments RSS 2.0 feed URL (/comments/feed)
 *
 * Some `$show` values are deprecated and will be removed in future versions.
 * These options will trigger the _deprecated_argument() function.
 *
 * Deprecated arguments include:
 *
 * - 'siteurl' - Use 'url' instead
 * - 'home' - Use 'url' instead
 *
 * @since 0.71
 *
 * @global string $wp_version
 *
 * @param string $show   Optional. Site info to retrieve. Default empty (site name).
 * @param string $filter Optional. How to filter what is retrieved. Default 'raw'.
 * @return string Mostly string values, might be empty.
 */
function get_bloginfo($show = '', $filter = 'raw')
{
}
/**
 * Returns the Site Icon URL.
 *
 * @since 4.3.0
 *
 * @param int    $size    Optional. Size of the site icon. Default 512 (pixels).
 * @param string $url     Optional. Fallback url if no site icon is found. Default empty.
 * @param int    $blog_id Optional. ID of the blog to get the site icon for. Default current blog.
 * @return string Site Icon URL.
 */
function get_site_icon_url($size = 512, $url = '', $blog_id = 0)
{
}
/**
 * Displays the Site Icon URL.
 *
 * @since 4.3.0
 *
 * @param int    $size    Optional. Size of the site icon. Default 512 (pixels).
 * @param string $url     Optional. Fallback url if no site icon is found. Default empty.
 * @param int    $blog_id Optional. ID of the blog to get the site icon for. Default current blog.
 */
function site_icon_url($size = 512, $url = '', $blog_id = 0)
{
}
/**
 * Whether the site has a Site Icon.
 *
 * @since 4.3.0
 *
 * @param int $blog_id Optional. ID of the blog in question. Default current blog.
 * @return bool Whether the site has a site icon or not.
 */
function has_site_icon($blog_id = 0)
{
}
/**
 * Determines whether the site has a custom logo.
 *
 * @since 4.5.0
 *
 * @param int $blog_id Optional. ID of the blog in question. Default is the ID of the current blog.
 * @return bool Whether the site has a custom logo or not.
 */
function has_custom_logo($blog_id = 0)
{
}
/**
 * Returns a custom logo, linked to home.
 *
 * @since 4.5.0
 *
 * @param int $blog_id Optional. ID of the blog in question. Default is the ID of the current blog.
 * @return string Custom logo markup.
 */
function get_custom_logo($blog_id = 0)
{
}
/**
 * Displays a custom logo, linked to home.
 *
 * @since 4.5.0
 *
 * @param int $blog_id Optional. ID of the blog in question. Default is the ID of the current blog.
 */
function the_custom_logo($blog_id = 0)
{
}
/**
 * Returns document title for the current page.
 *
 * @since 4.4.0
 *
 * @global int $page  Page number of a single post.
 * @global int $paged Page number of a list of posts.
 *
 * @return string Tag with the document title.
 */
function wp_get_document_title()
{
}
/**
 * Displays title tag with content.
 *
 * @ignore
 * @since 4.1.0
 * @since 4.4.0 Improved title output replaced `wp_title()`.
 * @access private
 */
function _wp_render_title_tag()
{
}
/**
 * Display or retrieve page title for all areas of blog.
 *
 * By default, the page title will display the separator before the page title,
 * so that the blog title will be before the page title. This is not good for
 * title display, since the blog title shows up on most tabs and not what is
 * important, which is the page that the user is looking at.
 *
 * There are also SEO benefits to having the blog title after or to the 'right'
 * of the page title. However, it is mostly common sense to have the blog title
 * to the right with most browsers supporting tabs. You can achieve this by
 * using the seplocation parameter and setting the value to 'right'. This change
 * was introduced around 2.5.0, in case backward compatibility of themes is
 * important.
 *
 * @since 1.0.0
 *
 * @global WP_Locale $wp_locale
 *
 * @param string $sep         Optional, default is '&raquo;'. How to separate the various items
 *                            within the page title.
 * @param bool   $display     Optional, default is true. Whether to display or retrieve title.
 * @param string $seplocation Optional. Direction to display title, 'right'.
 * @return string|null String on retrieve, null when displaying.
 */
function wp_title($sep = '&raquo;', $display = \true, $seplocation = '')
{
}
/**
 * Display or retrieve page title for post.
 *
 * This is optimized for single.php template file for displaying the post title.
 *
 * It does not support placing the separator after the title, but by leaving the
 * prefix parameter empty, you can set the title separator manually. The prefix
 * does not automatically place a space between the prefix, so if there should
 * be a space, the parameter value will need to have it at the end.
 *
 * @since 0.71
 *
 * @param string $prefix  Optional. What to display before the title.
 * @param bool   $display Optional, default is true. Whether to display or retrieve title.
 * @return string|void Title when retrieving.
 */
function single_post_title($prefix = '', $display = \true)
{
}
/**
 * Display or retrieve title for a post type archive.
 *
 * This is optimized for archive.php and archive-{$post_type}.php template files
 * for displaying the title of the post type.
 *
 * @since 3.1.0
 *
 * @param string $prefix  Optional. What to display before the title.
 * @param bool   $display Optional, default is true. Whether to display or retrieve title.
 * @return string|void Title when retrieving, null when displaying or failure.
 */
function post_type_archive_title($prefix = '', $display = \true)
{
}
/**
 * Display or retrieve page title for category archive.
 *
 * Useful for category template files for displaying the category page title.
 * The prefix does not automatically place a space between the prefix, so if
 * there should be a space, the parameter value will need to have it at the end.
 *
 * @since 0.71
 *
 * @param string $prefix  Optional. What to display before the title.
 * @param bool   $display Optional, default is true. Whether to display or retrieve title.
 * @return string|void Title when retrieving.
 */
function single_cat_title($prefix = '', $display = \true)
{
}
/**
 * Display or retrieve page title for tag post archive.
 *
 * Useful for tag template files for displaying the tag page title. The prefix
 * does not automatically place a space between the prefix, so if there should
 * be a space, the parameter value will need to have it at the end.
 *
 * @since 2.3.0
 *
 * @param string $prefix  Optional. What to display before the title.
 * @param bool   $display Optional, default is true. Whether to display or retrieve title.
 * @return string|void Title when retrieving.
 */
function single_tag_title($prefix = '', $display = \true)
{
}
/**
 * Display or retrieve page title for taxonomy term archive.
 *
 * Useful for taxonomy term template files for displaying the taxonomy term page title.
 * The prefix does not automatically place a space between the prefix, so if there should
 * be a space, the parameter value will need to have it at the end.
 *
 * @since 3.1.0
 *
 * @param string $prefix  Optional. What to display before the title.
 * @param bool   $display Optional, default is true. Whether to display or retrieve title.
 * @return string|void Title when retrieving.
 */
function single_term_title($prefix = '', $display = \true)
{
}
/**
 * Display or retrieve page title for post archive based on date.
 *
 * Useful for when the template only needs to display the month and year,
 * if either are available. The prefix does not automatically place a space
 * between the prefix, so if there should be a space, the parameter value
 * will need to have it at the end.
 *
 * @since 0.71
 *
 * @global WP_Locale $wp_locale
 *
 * @param string $prefix  Optional. What to display before the title.
 * @param bool   $display Optional, default is true. Whether to display or retrieve title.
 * @return string|void Title when retrieving.
 */
function single_month_title($prefix = '', $display = \true)
{
}
/**
 * Display the archive title based on the queried object.
 *
 * @since 4.1.0
 *
 * @see get_the_archive_title()
 *
 * @param string $before Optional. Content to prepend to the title. Default empty.
 * @param string $after  Optional. Content to append to the title. Default empty.
 */
function the_archive_title($before = '', $after = '')
{
}
/**
 * Retrieve the archive title based on the queried object.
 *
 * @since 4.1.0
 *
 * @return string Archive title.
 */
function get_the_archive_title()
{
}
/**
 * Display category, tag, term, or author description.
 *
 * @since 4.1.0
 *
 * @see get_the_archive_description()
 *
 * @param string $before Optional. Content to prepend to the description. Default empty.
 * @param string $after  Optional. Content to append to the description. Default empty.
 */
function the_archive_description($before = '', $after = '')
{
}
/**
 * Retrieves the description for an author, post type, or term archive.
 *
 * @since 4.1.0
 * @since 4.7.0 Added support for author archives.
 * @since 4.9.0 Added support for post type archives.
 *
 * @see term_description()
 *
 * @return string Archive description.
 */
function get_the_archive_description()
{
}
/**
 * Retrieves the description for a post type archive.
 *
 * @since 4.9.0
 *
 * @return string The post type description.
 */
function get_the_post_type_description()
{
}
/**
 * Retrieve archive link content based on predefined or custom code.
 *
 * The format can be one of four styles. The 'link' for head element, 'option'
 * for use in the select element, 'html' for use in list (either ol or ul HTML
 * elements). Custom content is also supported using the before and after
 * parameters.
 *
 * The 'link' format uses the `<link>` HTML element with the **archives**
 * relationship. The before and after parameters are not used. The text
 * parameter is used to describe the link.
 *
 * The 'option' format uses the option HTML element for use in select element.
 * The value is the url parameter and the before and after parameters are used
 * between the text description.
 *
 * The 'html' format, which is the default, uses the li HTML element for use in
 * the list HTML elements. The before parameter is before the link and the after
 * parameter is after the closing link.
 *
 * The custom format uses the before parameter before the link ('a' HTML
 * element) and the after parameter after the closing link tag. If the above
 * three values for the format are not used, then custom format is assumed.
 *
 * @since 1.0.0
 *
 * @param string $url    URL to archive.
 * @param string $text   Archive text description.
 * @param string $format Optional, default is 'html'. Can be 'link', 'option', 'html', or custom.
 * @param string $before Optional. Content to prepend to the description. Default empty.
 * @param string $after  Optional. Content to append to the description. Default empty.
 * @return string HTML link content for archive.
 */
function get_archives_link($url, $text, $format = 'html', $before = '', $after = '')
{
}
/**
 * Display archive links based on type and format.
 *
 * @since 1.2.0
 * @since 4.4.0 $post_type arg was added.
 *
 * @see get_archives_link()
 *
 * @global wpdb      $wpdb
 * @global WP_Locale $wp_locale
 *
 * @param string|array $args {
 *     Default archive links arguments. Optional.
 *
 *     @type string     $type            Type of archive to retrieve. Accepts 'daily', 'weekly', 'monthly',
 *                                       'yearly', 'postbypost', or 'alpha'. Both 'postbypost' and 'alpha'
 *                                       display the same archive link list as well as post titles instead
 *                                       of displaying dates. The difference between the two is that 'alpha'
 *                                       will order by post title and 'postbypost' will order by post date.
 *                                       Default 'monthly'.
 *     @type string|int $limit           Number of links to limit the query to. Default empty (no limit).
 *     @type string     $format          Format each link should take using the $before and $after args.
 *                                       Accepts 'link' (`<link>` tag), 'option' (`<option>` tag), 'html'
 *                                       (`<li>` tag), or a custom format, which generates a link anchor
 *                                       with $before preceding and $after succeeding. Default 'html'.
 *     @type string     $before          Markup to prepend to the beginning of each link. Default empty.
 *     @type string     $after           Markup to append to the end of each link. Default empty.
 *     @type bool       $show_post_count Whether to display the post count alongside the link. Default false.
 *     @type bool|int   $echo            Whether to echo or return the links list. Default 1|true to echo.
 *     @type string     $order           Whether to use ascending or descending order. Accepts 'ASC', or 'DESC'.
 *                                       Default 'DESC'.
 *     @type string     $post_type       Post type. Default 'post'.
 * }
 * @return string|void String when retrieving.
 */
function wp_get_archives($args = '')
{
}
/**
 * Get number of days since the start of the week.
 *
 * @since 1.5.0
 *
 * @param int $num Number of day.
 * @return float Days since the start of the week.
 */
function calendar_week_mod($num)
{
}
/**
 * Display calendar with days that have posts as links.
 *
 * The calendar is cached, which will be retrieved, if it exists. If there are
 * no posts for the month, then it will not be displayed.
 *
 * @since 1.0.0
 *
 * @global wpdb      $wpdb
 * @global int       $m
 * @global int       $monthnum
 * @global int       $year
 * @global WP_Locale $wp_locale
 * @global array     $posts
 *
 * @param bool $initial Optional, default is true. Use initial calendar names.
 * @param bool $echo    Optional, default is true. Set to false for return.
 * @return string|void String when retrieving.
 */
function get_calendar($initial = \true, $echo = \true)
{
}
/**
 * Purge the cached results of get_calendar.
 *
 * @see get_calendar
 * @since 2.1.0
 */
function delete_get_calendar_cache()
{
}
/**
 * Display all of the allowed tags in HTML format with attributes.
 *
 * This is useful for displaying in the comment area, which elements and
 * attributes are supported. As well as any plugins which want to display it.
 *
 * @since 1.0.1
 *
 * @global array $allowedtags
 *
 * @return string HTML allowed tags entity encoded.
 */
function allowed_tags()
{
}
/***** Date/Time tags *****/
/**
 * Outputs the date in iso8601 format for xml files.
 *
 * @since 1.0.0
 */
function the_date_xml()
{
}
/**
 * Display or Retrieve the date the current post was written (once per date)
 *
 * Will only output the date if the current post's date is different from the
 * previous one output.
 *
 * i.e. Only one date listing will show per day worth of posts shown in the loop, even if the
 * function is called several times for each post.
 *
 * HTML output can be filtered with 'the_date'.
 * Date string output can be filtered with 'get_the_date'.
 *
 * @since 0.71
 *
 * @global string|int|bool $currentday
 * @global string|int|bool $previousday
 *
 * @param string $d      Optional. PHP date format defaults to the date_format option if not specified.
 * @param string $before Optional. Output before the date.
 * @param string $after  Optional. Output after the date.
 * @param bool   $echo   Optional, default is display. Whether to echo the date or return it.
 * @return string|void String if retrieving.
 */
function the_date($d = '', $before = '', $after = '', $echo = \true)
{
}
/**
 * Retrieve the date on which the post was written.
 *
 * Unlike the_date() this function will always return the date.
 * Modify output with the {@see 'get_the_date'} filter.
 *
 * @since 3.0.0
 *
 * @param  string      $d    Optional. PHP date format defaults to the date_format option if not specified.
 * @param  int|WP_Post $post Optional. Post ID or WP_Post object. Default current post.
 * @return false|string Date the current post was written. False on failure.
 */
function get_the_date($d = '', $post = \null)
{
}
/**
 * Display the date on which the post was last modified.
 *
 * @since 2.1.0
 *
 * @param string $d      Optional. PHP date format defaults to the date_format option if not specified.
 * @param string $before Optional. Output before the date.
 * @param string $after  Optional. Output after the date.
 * @param bool   $echo   Optional, default is display. Whether to echo the date or return it.
 * @return string|void String if retrieving.
 */
function the_modified_date($d = '', $before = '', $after = '', $echo = \true)
{
}
/**
 * Retrieve the date on which the post was last modified.
 *
 * @since 2.1.0
 * @since 4.6.0 Added the `$post` parameter.
 *
 * @param string      $d    Optional. PHP date format defaults to the date_format option if not specified.
 * @param int|WP_Post $post Optional. Post ID or WP_Post object. Default current post.
 * @return false|string Date the current post was modified. False on failure.
 */
function get_the_modified_date($d = '', $post = \null)
{
}
/**
 * Display the time at which the post was written.
 *
 * @since 0.71
 *
 * @param string $d Either 'G', 'U', or php date format.
 */
function the_time($d = '')
{
}
/**
 * Retrieve the time at which the post was written.
 *
 * @since 1.5.0
 *
 * @param string      $d    Optional. Format to use for retrieving the time the post
 *                          was written. Either 'G', 'U', or php date format defaults
 *                          to the value specified in the time_format option. Default empty.
 * @param int|WP_Post|null $post WP_Post object or ID. Default is global $post object.
 * @return string|int|false Formatted date string or Unix timestamp if `$id` is 'U' or 'G'. False on failure.
 */
function get_the_time($d = '', $post = \null)
{
}
/**
 * Retrieve the time at which the post was written.
 *
 * @since 2.0.0
 *
 * @param string      $d         Optional. Format to use for retrieving the time the post
 *                               was written. Either 'G', 'U', or php date format. Default 'U'.
 * @param bool        $gmt       Optional. Whether to retrieve the GMT time. Default false.
 * @param int|WP_Post $post      WP_Post object or ID. Default is global $post object.
 * @param bool        $translate Whether to translate the time string. Default false.
 * @return string|int|false Formatted date string or Unix timestamp if `$id` is 'U' or 'G'. False on failure.
 */
function get_post_time($d = 'U', $gmt = \false, $post = \null, $translate = \false)
{
}
/**
 * Display the time at which the post was last modified.
 *
 * @since 2.0.0
 *
 * @param string $d Optional Either 'G', 'U', or php date format defaults to the value specified in the time_format option.
 */
function the_modified_time($d = '')
{
}
/**
 * Retrieve the time at which the post was last modified.
 *
 * @since 2.0.0
 * @since 4.6.0 Added the `$post` parameter.
 *
 * @param string      $d     Optional. Format to use for retrieving the time the post
 *                           was modified. Either 'G', 'U', or php date format defaults
 *                           to the value specified in the time_format option. Default empty.
 * @param int|WP_Post $post  Optional. Post ID or WP_Post object. Default current post.
 * @return false|string Formatted date string or Unix timestamp. False on failure.
 */
function get_the_modified_time($d = '', $post = \null)
{
}
/**
 * Retrieve the time at which the post was last modified.
 *
 * @since 2.0.0
 *
 * @param string      $d         Optional. Format to use for retrieving the time the post
 *                               was modified. Either 'G', 'U', or php date format. Default 'U'.
 * @param bool        $gmt       Optional. Whether to retrieve the GMT time. Default false.
 * @param int|WP_Post $post      WP_Post object or ID. Default is global $post object.
 * @param bool        $translate Whether to translate the time string. Default false.
 * @return string|int|false Formatted date string or Unix timestamp if `$id` is 'U' or 'G'. False on failure.
 */
function get_post_modified_time($d = 'U', $gmt = \false, $post = \null, $translate = \false)
{
}
/**
 * Display the weekday on which the post was written.
 *
 * @since 0.71
 *
 * @global WP_Locale $wp_locale
 */
function the_weekday()
{
}
/**
 * Display the weekday on which the post was written.
 *
 * Will only output the weekday if the current post's weekday is different from
 * the previous one output.
 *
 * @since 0.71
 *
 * @global WP_Locale       $wp_locale
 * @global string|int|bool $currentday
 * @global string|int|bool $previousweekday
 *
 * @param string $before Optional Output before the date.
 * @param string $after Optional Output after the date.
 */
function the_weekday_date($before = '', $after = '')
{
}
/**
 * Fire the wp_head action.
 *
 * See {@see 'wp_head'}.
 *
 * @since 1.2.0
 */
function wp_head()
{
}
/**
 * Fire the wp_footer action.
 *
 * See {@see 'wp_footer'}.
 *
 * @since 1.5.1
 */
function wp_footer()
{
}
/**
 * Display the links to the general feeds.
 *
 * @since 2.8.0
 *
 * @param array $args Optional arguments.
 */
function feed_links($args = array())
{
}
/**
 * Display the links to the extra feeds such as category feeds.
 *
 * @since 2.8.0
 *
 * @param array $args Optional arguments.
 */
function feed_links_extra($args = array())
{
}
/**
 * Display the link to the Really Simple Discovery service endpoint.
 *
 * @link http://archipelago.phrasewise.com/rsd
 * @since 2.0.0
 */
function rsd_link()
{
}
/**
 * Display the link to the Windows Live Writer manifest file.
 *
 * @link https://msdn.microsoft.com/en-us/library/bb463265.aspx
 * @since 2.3.1
 */
function wlwmanifest_link()
{
}
/**
 * Displays a noindex meta tag if required by the blog configuration.
 *
 * If a blog is marked as not being public then the noindex meta tag will be
 * output to tell web robots not to index the page content. Add this to the
 * {@see 'wp_head'} action.
 *
 * Typical usage is as a {@see 'wp_head'} callback:
 *
 *     add_action( 'wp_head', 'noindex' );
 *
 * @see wp_no_robots
 *
 * @since 2.1.0
 */
function noindex()
{
}
/**
 * Display a noindex meta tag.
 *
 * Outputs a noindex meta tag that tells web robots not to index the page content.
 * Typical usage is as a wp_head callback. add_action( 'wp_head', 'wp_no_robots' );
 *
 * @since 3.3.0
 */
function wp_no_robots()
{
}
/**
 * Display a noindex,noarchive meta tag and referrer origin-when-cross-origin meta tag.
 *
 * Outputs a noindex,noarchive meta tag that tells web robots not to index or cache the page content.
 * Outputs a referrer origin-when-cross-origin meta tag that tells the browser not to send the full
 * url as a referrer to other sites when cross-origin assets are loaded.
 *
 * Typical usage is as a wp_head callback. add_action( 'wp_head', 'wp_sensitive_page_meta' );
 *
 * @since 5.0.0
 */
function wp_sensitive_page_meta()
{
}
/**
 * Display site icon meta tags.
 *
 * @since 4.3.0
 *
 * @link https://www.whatwg.org/specs/web-apps/current-work/multipage/links.html#rel-icon HTML5 specification link icon.
 */
function wp_site_icon()
{
}
/**
 * Prints resource hints to browsers for pre-fetching, pre-rendering
 * and pre-connecting to web sites.
 *
 * Gives hints to browsers to prefetch specific pages or render them
 * in the background, to perform DNS lookups or to begin the connection
 * handshake (DNS, TCP, TLS) in the background.
 *
 * These performance improving indicators work by using `<link rel"…">`.
 *
 * @since 4.6.0
 */
function wp_resource_hints()
{
}
/**
 * Retrieves a list of unique hosts of all enqueued scripts and styles.
 *
 * @since 4.6.0
 *
 * @return array A list of unique hosts of enqueued scripts and styles.
 */
function wp_dependencies_unique_hosts()
{
}
/**
 * Whether the user can access the visual editor.
 *
 * Checks if the user can access the visual editor and that it's supported by the user's browser.
 *
 * @since 2.0.0
 *
 * @global bool $wp_rich_edit Whether the user can access the visual editor.
 * @global bool $is_gecko     Whether the browser is Gecko-based.
 * @global bool $is_opera     Whether the browser is Opera.
 * @global bool $is_safari    Whether the browser is Safari.
 * @global bool $is_chrome    Whether the browser is Chrome.
 * @global bool $is_IE        Whether the browser is Internet Explorer.
 * @global bool $is_edge      Whether the browser is Microsoft Edge.
 *
 * @return bool True if the user can access the visual editor, false otherwise.
 */
function user_can_richedit()
{
}
/**
 * Find out which editor should be displayed by default.
 *
 * Works out which of the two editors to display as the current editor for a
 * user. The 'html' setting is for the "Text" editor tab.
 *
 * @since 2.5.0
 *
 * @return string Either 'tinymce', or 'html', or 'test'
 */
function wp_default_editor()
{
}
/**
 * Renders an editor.
 *
 * Using this function is the proper way to output all needed components for both TinyMCE and Quicktags.
 * _WP_Editors should not be used directly. See https://core.trac.wordpress.org/ticket/17144.
 *
 * NOTE: Once initialized the TinyMCE editor cannot be safely moved in the DOM. For that reason
 * running wp_editor() inside of a meta box is not a good idea unless only Quicktags is used.
 * On the post edit screen several actions can be used to include additional editors
 * containing TinyMCE: 'edit_page_form', 'edit_form_advanced' and 'dbx_post_sidebar'.
 * See https://core.trac.wordpress.org/ticket/19173 for more information.
 *
 * @see _WP_Editors::editor()
 * @since 3.3.0
 *
 * @param string $content   Initial content for the editor.
 * @param string $editor_id HTML ID attribute value for the textarea and TinyMCE. Can only be /[a-z]+/.
 * @param array  $settings  See _WP_Editors::editor().
 */
function wp_editor($content, $editor_id, $settings = array())
{
}
/**
 * Outputs the editor scripts, stylesheets, and default settings.
 *
 * The editor can be initialized when needed after page load.
 * See wp.editor.initialize() in wp-admin/js/editor.js for initialization options.
 *
 * @uses _WP_Editors
 * @since 4.8.0
 */
function wp_enqueue_editor()
{
}
/**
 * Enqueue assets needed by the code editor for the given settings.
 *
 * @since 4.9.0
 *
 * @see wp_enqueue_editor()
 * @see _WP_Editors::parse_settings()
 * @param array $args {
 *     Args.
 *
 *     @type string   $type       The MIME type of the file to be edited.
 *     @type string   $file       Filename to be edited. Extension is used to sniff the type. Can be supplied as alternative to `$type` param.
 *     @type WP_Theme $theme      Theme being edited when on theme editor.
 *     @type string   $plugin     Plugin being edited when on plugin editor.
 *     @type array    $codemirror Additional CodeMirror setting overrides.
 *     @type array    $csslint    CSSLint rule overrides.
 *     @type array    $jshint     JSHint rule overrides.
 *     @type array    $htmlhint   JSHint rule overrides.
 * }
 * @returns array|false Settings for the enqueued code editor, or false if the editor was not enqueued .
 */
function wp_enqueue_code_editor($args)
{
}
/**
 * Retrieves the contents of the search WordPress query variable.
 *
 * The search query string is passed through esc_attr() to ensure that it is safe
 * for placing in an html attribute.
 *
 * @since 2.3.0
 *
 * @param bool $escaped Whether the result is escaped. Default true.
 * 	                    Only use when you are later escaping it. Do not use unescaped.
 * @return string
 */
function get_search_query($escaped = \true)
{
}
/**
 * Displays the contents of the search query variable.
 *
 * The search query string is passed through esc_attr() to ensure that it is safe
 * for placing in an html attribute.
 *
 * @since 2.1.0
 */
function the_search_query()
{
}
/**
 * Gets the language attributes for the html tag.
 *
 * Builds up a set of html attributes containing the text direction and language
 * information for the page.
 *
 * @since 4.3.0
 *
 * @param string $doctype Optional. The type of html document. Accepts 'xhtml' or 'html'. Default 'html'.
 */
function get_language_attributes($doctype = 'html')
{
}
/**
 * Displays the language attributes for the html tag.
 *
 * Builds up a set of html attributes containing the text direction and language
 * information for the page.
 *
 * @since 2.1.0
 * @since 4.3.0 Converted into a wrapper for get_language_attributes().
 *
 * @param string $doctype Optional. The type of html document. Accepts 'xhtml' or 'html'. Default 'html'.
 */
function language_attributes($doctype = 'html')
{
}
/**
 * Retrieve paginated link for archive post pages.
 *
 * Technically, the function can be used to create paginated link list for any
 * area. The 'base' argument is used to reference the url, which will be used to
 * create the paginated links. The 'format' argument is then used for replacing
 * the page number. It is however, most likely and by default, to be used on the
 * archive post pages.
 *
 * The 'type' argument controls format of the returned value. The default is
 * 'plain', which is just a string with the links separated by a newline
 * character. The other possible values are either 'array' or 'list'. The
 * 'array' value will return an array of the paginated link list to offer full
 * control of display. The 'list' value will place all of the paginated links in
 * an unordered HTML list.
 *
 * The 'total' argument is the total amount of pages and is an integer. The
 * 'current' argument is the current page number and is also an integer.
 *
 * An example of the 'base' argument is "http://example.com/all_posts.php%_%"
 * and the '%_%' is required. The '%_%' will be replaced by the contents of in
 * the 'format' argument. An example for the 'format' argument is "?page=%#%"
 * and the '%#%' is also required. The '%#%' will be replaced with the page
 * number.
 *
 * You can include the previous and next links in the list by setting the
 * 'prev_next' argument to true, which it is by default. You can set the
 * previous text, by using the 'prev_text' argument. You can set the next text
 * by setting the 'next_text' argument.
 *
 * If the 'show_all' argument is set to true, then it will show all of the pages
 * instead of a short list of the pages near the current page. By default, the
 * 'show_all' is set to false and controlled by the 'end_size' and 'mid_size'
 * arguments. The 'end_size' argument is how many numbers on either the start
 * and the end list edges, by default is 1. The 'mid_size' argument is how many
 * numbers to either side of current page, but not including current page.
 *
 * It is possible to add query vars to the link by using the 'add_args' argument
 * and see add_query_arg() for more information.
 *
 * The 'before_page_number' and 'after_page_number' arguments allow users to
 * augment the links themselves. Typically this might be to add context to the
 * numbered links so that screen reader users understand what the links are for.
 * The text strings are added before and after the page number - within the
 * anchor tag.
 *
 * @since 2.1.0
 * @since 4.9.0 Added the `aria_current` argument.
 *
 * @global WP_Query   $wp_query
 * @global WP_Rewrite $wp_rewrite
 *
 * @param string|array $args {
 *     Optional. Array or string of arguments for generating paginated links for archives.
 *
 *     @type string $base               Base of the paginated url. Default empty.
 *     @type string $format             Format for the pagination structure. Default empty.
 *     @type int    $total              The total amount of pages. Default is the value WP_Query's
 *                                      `max_num_pages` or 1.
 *     @type int    $current            The current page number. Default is 'paged' query var or 1.
 *     @type string $aria_current       The value for the aria-current attribute. Possible values are 'page',
 *                                      'step', 'location', 'date', 'time', 'true', 'false'. Default is 'page'.
 *     @type bool   $show_all           Whether to show all pages. Default false.
 *     @type int    $end_size           How many numbers on either the start and the end list edges.
 *                                      Default 1.
 *     @type int    $mid_size           How many numbers to either side of the current pages. Default 2.
 *     @type bool   $prev_next          Whether to include the previous and next links in the list. Default true.
 *     @type bool   $prev_text          The previous page text. Default '&laquo; Previous'.
 *     @type bool   $next_text          The next page text. Default 'Next &raquo;'.
 *     @type string $type               Controls format of the returned value. Possible values are 'plain',
 *                                      'array' and 'list'. Default is 'plain'.
 *     @type array  $add_args           An array of query args to add. Default false.
 *     @type string $add_fragment       A string to append to each link. Default empty.
 *     @type string $before_page_number A string to appear before the page number. Default empty.
 *     @type string $after_page_number  A string to append after the page number. Default empty.
 * }
 * @return array|string|void String of page links or array of page links.
 */
function paginate_links($args = '')
{
}
/**
 * Registers an admin colour scheme css file.
 *
 * Allows a plugin to register a new admin colour scheme. For example:
 *
 *     wp_admin_css_color( 'classic', __( 'Classic' ), admin_url( "css/colors-classic.css" ), array(
 *         '#07273E', '#14568A', '#D54E21', '#2683AE'
 *     ) );
 *
 * @since 2.5.0
 *
 * @global array $_wp_admin_css_colors
 *
 * @param string $key    The unique key for this theme.
 * @param string $name   The name of the theme.
 * @param string $url    The URL of the CSS file containing the color scheme.
 * @param array  $colors Optional. An array of CSS color definition strings which are used
 *                       to give the user a feel for the theme.
 * @param array  $icons {
 *     Optional. CSS color definitions used to color any SVG icons.
 *
 *     @type string $base    SVG icon base color.
 *     @type string $focus   SVG icon color on focus.
 *     @type string $current SVG icon color of current admin menu link.
 * }
 */
function wp_admin_css_color($key, $name, $url, $colors = array(), $icons = array())
{
}
/**
 * Registers the default Admin color schemes
 *
 * @since 3.0.0
 */
function register_admin_color_schemes()
{
}
/**
 * Displays the URL of a WordPress admin CSS file.
 *
 * @see WP_Styles::_css_href and its {@see 'style_loader_src'} filter.
 *
 * @since 2.3.0
 *
 * @param string $file file relative to wp-admin/ without its ".css" extension.
 * @return string
 */
function wp_admin_css_uri($file = 'wp-admin')
{
}
/**
 * Enqueues or directly prints a stylesheet link to the specified CSS file.
 *
 * "Intelligently" decides to enqueue or to print the CSS file. If the
 * {@see 'wp_print_styles'} action has *not* yet been called, the CSS file will be
 * enqueued. If the {@see 'wp_print_styles'} action has been called, the CSS link will
 * be printed. Printing may be forced by passing true as the $force_echo
 * (second) parameter.
 *
 * For backward compatibility with WordPress 2.3 calling method: If the $file
 * (first) parameter does not correspond to a registered CSS file, we assume
 * $file is a file relative to wp-admin/ without its ".css" extension. A
 * stylesheet link to that generated URL is printed.
 *
 * @since 2.3.0
 *
 * @param string $file       Optional. Style handle name or file name (without ".css" extension) relative
 * 	                         to wp-admin/. Defaults to 'wp-admin'.
 * @param bool   $force_echo Optional. Force the stylesheet link to be printed rather than enqueued.
 */
function wp_admin_css($file = 'wp-admin', $force_echo = \false)
{
}
/**
 * Enqueues the default ThickBox js and css.
 *
 * If any of the settings need to be changed, this can be done with another js
 * file similar to media-upload.js. That file should
 * require array('thickbox') to ensure it is loaded after.
 *
 * @since 2.5.0
 */
function add_thickbox()
{
}
/**
 * Displays the XHTML generator that is generated on the wp_head hook.
 *
 * See {@see 'wp_head'}.
 *
 * @since 2.5.0
 */
function wp_generator()
{
}
/**
 * Display the generator XML or Comment for RSS, ATOM, etc.
 *
 * Returns the correct generator type for the requested output format. Allows
 * for a plugin to filter generators overall the {@see 'the_generator'} filter.
 *
 * @since 2.5.0
 *
 * @param string $type The type of generator to output - (html|xhtml|atom|rss2|rdf|comment|export).
 */
function the_generator($type)
{
}
/**
 * Creates the generator XML or Comment for RSS, ATOM, etc.
 *
 * Returns the correct generator type for the requested output format. Allows
 * for a plugin to filter generators on an individual basis using the
 * {@see 'get_the_generator_$type'} filter.
 *
 * @since 2.5.0
 *
 * @param string $type The type of generator to return - (html|xhtml|atom|rss2|rdf|comment|export).
 * @return string|void The HTML content for the generator.
 */
function get_the_generator($type = '')
{
}
/**
 * Outputs the html checked attribute.
 *
 * Compares the first two arguments and if identical marks as checked
 *
 * @since 1.0.0
 *
 * @param mixed $checked One of the values to compare
 * @param mixed $current (true) The other value to compare if not just true
 * @param bool  $echo    Whether to echo or just return the string
 * @return string html attribute or empty string
 */
function checked($checked, $current = \true, $echo = \true)
{
}
/**
 * Outputs the html selected attribute.
 *
 * Compares the first two arguments and if identical marks as selected
 *
 * @since 1.0.0
 *
 * @param mixed $selected One of the values to compare
 * @param mixed $current  (true) The other value to compare if not just true
 * @param bool  $echo     Whether to echo or just return the string
 * @return string html attribute or empty string
 */
function selected($selected, $current = \true, $echo = \true)
{
}
/**
 * Outputs the html disabled attribute.
 *
 * Compares the first two arguments and if identical marks as disabled
 *
 * @since 3.0.0
 *
 * @param mixed $disabled One of the values to compare
 * @param mixed $current  (true) The other value to compare if not just true
 * @param bool  $echo     Whether to echo or just return the string
 * @return string html attribute or empty string
 */
function disabled($disabled, $current = \true, $echo = \true)
{
}
/**
 * Outputs the html readonly attribute.
 *
 * Compares the first two arguments and if identical marks as readonly
 *
 * @since 4.9.0
 *
 * @param mixed $readonly One of the values to compare
 * @param mixed $current  (true) The other value to compare if not just true
 * @param bool  $echo     Whether to echo or just return the string
 * @return string html attribute or empty string
 */
function readonly($readonly, $current = \true, $echo = \true)
{
}
/**
 * Private helper function for checked, selected, disabled and readonly.
 *
 * Compares the first two arguments and if identical marks as $type
 *
 * @since 2.8.0
 * @access private
 *
 * @param mixed  $helper  One of the values to compare
 * @param mixed  $current (true) The other value to compare if not just true
 * @param bool   $echo    Whether to echo or just return the string
 * @param string $type    The type of checked|selected|disabled|readonly we are doing
 * @return string html attribute or empty string
 */
function __checked_selected_helper($helper, $current, $echo, $type)
{
}
/**
 * Default settings for heartbeat
 *
 * Outputs the nonce used in the heartbeat XHR
 *
 * @since 3.6.0
 *
 * @param array $settings
 * @return array $settings
 */
function wp_heartbeat_settings($settings)
{
}
/**
 * Core HTTP Request API
 *
 * Standardizes the HTTP requests for WordPress. Handles cookies, gzip encoding and decoding, chunk
 * decoding, if HTTP 1.1 and various other difficult HTTP protocol implementations.
 *
 * @package WordPress
 * @subpackage HTTP
 */
/**
 * Returns the initialized WP_Http Object
 *
 * @since 2.7.0
 * @access private
 *
 * @staticvar WP_Http $http
 *
 * @return WP_Http HTTP Transport object.
 */
function _wp_http_get_object()
{
}
/**
 * Retrieve the raw response from a safe HTTP request.
 *
 * This function is ideal when the HTTP request is being made to an arbitrary
 * URL. The URL is validated to avoid redirection and request forgery attacks.
 *
 * @since 3.6.0
 *
 * @see wp_remote_request() For more information on the response array format.
 * @see WP_Http::request() For default arguments information.
 *
 * @param string $url  Site URL to retrieve.
 * @param array  $args Optional. Request arguments. Default empty array.
 * @return WP_Error|array The response or WP_Error on failure.
 */
function wp_safe_remote_request($url, $args = array())
{
}
/**
 * Retrieve the raw response from a safe HTTP request using the GET method.
 *
 * This function is ideal when the HTTP request is being made to an arbitrary
 * URL. The URL is validated to avoid redirection and request forgery attacks.
 *
 * @since 3.6.0
 *
 * @see wp_remote_request() For more information on the response array format.
 * @see WP_Http::request() For default arguments information.
 *
 * @param string $url  Site URL to retrieve.
 * @param array  $args Optional. Request arguments. Default empty array.
 * @return WP_Error|array The response or WP_Error on failure.
 */
function wp_safe_remote_get($url, $args = array())
{
}
/**
 * Retrieve the raw response from a safe HTTP request using the POST method.
 *
 * This function is ideal when the HTTP request is being made to an arbitrary
 * URL. The URL is validated to avoid redirection and request forgery attacks.
 *
 * @since 3.6.0
 *
 * @see wp_remote_request() For more information on the response array format.
 * @see WP_Http::request() For default arguments information.
 *
 * @param string $url  Site URL to retrieve.
 * @param array  $args Optional. Request arguments. Default empty array.
 * @return WP_Error|array The response or WP_Error on failure.
 */
function wp_safe_remote_post($url, $args = array())
{
}
/**
 * Retrieve the raw response from a safe HTTP request using the HEAD method.
 *
 * This function is ideal when the HTTP request is being made to an arbitrary
 * URL. The URL is validated to avoid redirection and request forgery attacks.
 *
 * @since 3.6.0
 *
 * @see wp_remote_request() For more information on the response array format.
 * @see WP_Http::request() For default arguments information.
 *
 * @param string $url Site URL to retrieve.
 * @param array $args Optional. Request arguments. Default empty array.
 * @return WP_Error|array The response or WP_Error on failure.
 */
function wp_safe_remote_head($url, $args = array())
{
}
/**
 * Retrieve the raw response from the HTTP request.
 *
 * The array structure is a little complex:
 *
 *     $res = array(
 *         'headers'  => array(),
 *         'response' => array(
 *             'code'    => int,
 *             'message' => string
 *         )
 *     );
 *
 * All of the headers in $res['headers'] are with the name as the key and the
 * value as the value. So to get the User-Agent, you would do the following.
 *
 *     $user_agent = $res['headers']['user-agent'];
 *
 * The body is the raw response content and can be retrieved from $res['body'].
 *
 * This function is called first to make the request and there are other API
 * functions to abstract out the above convoluted setup.
 *
 * Request method defaults for helper functions:
 *  - Default 'GET'  for wp_remote_get()
 *  - Default 'POST' for wp_remote_post()
 *  - Default 'HEAD' for wp_remote_head()
 *
 * @since 2.7.0
 *
 * @see WP_Http::request() For additional information on default arguments.
 *
 * @param string $url  Site URL to retrieve.
 * @param array  $args Optional. Request arguments. Default empty array.
 * @return WP_Error|array The response or WP_Error on failure.
 */
function wp_remote_request($url, $args = array())
{
}
/**
 * Retrieve the raw response from the HTTP request using the GET method.
 *
 * @since 2.7.0
 *
 * @see wp_remote_request() For more information on the response array format.
 * @see WP_Http::request() For default arguments information.
 *
 * @param string $url  Site URL to retrieve.
 * @param array  $args Optional. Request arguments. Default empty array.
 * @return WP_Error|array The response or WP_Error on failure.
 */
function wp_remote_get($url, $args = array())
{
}
/**
 * Retrieve the raw response from the HTTP request using the POST method.
 *
 * @since 2.7.0
 *
 * @see wp_remote_request() For more information on the response array format.
 * @see WP_Http::request() For default arguments information.
 *
 * @param string $url  Site URL to retrieve.
 * @param array  $args Optional. Request arguments. Default empty array.
 * @return WP_Error|array The response or WP_Error on failure.
 */
function wp_remote_post($url, $args = array())
{
}
/**
 * Retrieve the raw response from the HTTP request using the HEAD method.
 *
 * @since 2.7.0
 *
 * @see wp_remote_request() For more information on the response array format.
 * @see WP_Http::request() For default arguments information.
 *
 * @param string $url  Site URL to retrieve.
 * @param array  $args Optional. Request arguments. Default empty array.
 * @return WP_Error|array The response or WP_Error on failure.
 */
function wp_remote_head($url, $args = array())
{
}
/**
 * Retrieve only the headers from the raw response.
 *
 * @since 2.7.0
 * @since 4.6.0 Return value changed from an array to an Requests_Utility_CaseInsensitiveDictionary instance.
 *
 * @see \Requests_Utility_CaseInsensitiveDictionary
 *
 * @param array $response HTTP response.
 * @return array|\Requests_Utility_CaseInsensitiveDictionary The headers of the response. Empty array if incorrect parameter given.
 */
function wp_remote_retrieve_headers($response)
{
}
/**
 * Retrieve a single header by name from the raw response.
 *
 * @since 2.7.0
 *
 * @param array  $response
 * @param string $header Header name to retrieve value from.
 * @return string The header value. Empty string on if incorrect parameter given, or if the header doesn't exist.
 */
function wp_remote_retrieve_header($response, $header)
{
}
/**
 * Retrieve only the response code from the raw response.
 *
 * Will return an empty array if incorrect parameter value is given.
 *
 * @since 2.7.0
 *
 * @param array $response HTTP response.
 * @return int|string The response code as an integer. Empty string on incorrect parameter given.
 */
function wp_remote_retrieve_response_code($response)
{
}
/**
 * Retrieve only the response message from the raw response.
 *
 * Will return an empty array if incorrect parameter value is given.
 *
 * @since 2.7.0
 *
 * @param array $response HTTP response.
 * @return string The response message. Empty string on incorrect parameter given.
 */
function wp_remote_retrieve_response_message($response)
{
}
/**
 * Retrieve only the body from the raw response.
 *
 * @since 2.7.0
 *
 * @param array $response HTTP response.
 * @return string The body of the response. Empty string if no body or incorrect parameter given.
 */
function wp_remote_retrieve_body($response)
{
}
/**
 * Retrieve only the cookies from the raw response.
 *
 * @since 4.4.0
 *
 * @param array $response HTTP response.
 * @return array An array of `WP_Http_Cookie` objects from the response. Empty array if there are none, or the response is a WP_Error.
 */
function wp_remote_retrieve_cookies($response)
{
}
/**
 * Retrieve a single cookie by name from the raw response.
 *
 * @since 4.4.0
 *
 * @param array  $response HTTP response.
 * @param string $name     The name of the cookie to retrieve.
 * @return WP_Http_Cookie|string The `WP_Http_Cookie` object. Empty string if the cookie isn't present in the response.
 */
function wp_remote_retrieve_cookie($response, $name)
{
}
/**
 * Retrieve a single cookie's value by name from the raw response.
 *
 * @since 4.4.0
 *
 * @param array  $response HTTP response.
 * @param string $name     The name of the cookie to retrieve.
 * @return string The value of the cookie. Empty string if the cookie isn't present in the response.
 */
function wp_remote_retrieve_cookie_value($response, $name)
{
}
/**
 * Determines if there is an HTTP Transport that can process this request.
 *
 * @since 3.2.0
 *
 * @param array  $capabilities Array of capabilities to test or a wp_remote_request() $args array.
 * @param string $url          Optional. If given, will check if the URL requires SSL and adds
 *                             that requirement to the capabilities array.
 *
 * @return bool
 */
function wp_http_supports($capabilities = array(), $url = \null)
{
}
/**
 * Get the HTTP Origin of the current request.
 *
 * @since 3.4.0
 *
 * @return string URL of the origin. Empty string if no origin.
 */
function get_http_origin()
{
}
/**
 * Retrieve list of allowed HTTP origins.
 *
 * @since 3.4.0
 *
 * @return array Array of origin URLs.
 */
function get_allowed_http_origins()
{
}
/**
 * Determines if the HTTP origin is an authorized one.
 *
 * @since 3.4.0
 *
 * @param null|string $origin Origin URL. If not provided, the value of get_http_origin() is used.
 * @return string Origin URL if allowed, empty string if not.
 */
function is_allowed_http_origin($origin = \null)
{
}
/**
 * Send Access-Control-Allow-Origin and related headers if the current request
 * is from an allowed origin.
 *
 * If the request is an OPTIONS request, the script exits with either access
 * control headers sent, or a 403 response if the origin is not allowed. For
 * other request methods, you will receive a return value.
 *
 * @since 3.4.0
 *
 * @return string|false Returns the origin URL if headers are sent. Returns false
 *                      if headers are not sent.
 */
function send_origin_headers()
{
}
/**
 * Validate a URL for safe use in the HTTP API.
 *
 * @since 3.5.2
 *
 * @param string $url
 * @return false|string URL or false on failure.
 */
function wp_http_validate_url($url)
{
}
/**
 * Whitelists allowed redirect hosts for safe HTTP requests as well.
 *
 * Attached to the {@see 'http_request_host_is_external'} filter.
 *
 * @since 3.6.0
 *
 * @param bool   $is_external
 * @param string $host
 * @return bool
 */
function allowed_http_request_hosts($is_external, $host)
{
}
/**
 * Whitelists any domain in a multisite installation for safe HTTP requests.
 *
 * Attached to the {@see 'http_request_host_is_external'} filter.
 *
 * @since 3.6.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 * @staticvar array $queried
 *
 * @param bool   $is_external
 * @param string $host
 * @return bool
 */
function ms_allowed_http_request_hosts($is_external, $host)
{
}
/**
 * A wrapper for PHP's parse_url() function that handles consistency in the return
 * values across PHP versions.
 *
 * PHP 5.4.7 expanded parse_url()'s ability to handle non-absolute url's, including
 * schemeless and relative url's with :// in the path. This function works around
 * those limitations providing a standard output on PHP 5.2~5.4+.
 *
 * Secondly, across various PHP versions, schemeless URLs starting containing a ":"
 * in the query are being handled inconsistently. This function works around those
 * differences as well.
 *
 * Error suppression is used as prior to PHP 5.3.3, an E_WARNING would be generated
 * when URL parsing failed.
 *
 * @since 4.4.0
 * @since 4.7.0 The $component parameter was added for parity with PHP's parse_url().
 *
 * @link https://secure.php.net/manual/en/function.parse-url.php
 *
 * @param string $url       The URL to parse.
 * @param int    $component The specific component to retrieve. Use one of the PHP
 *                          predefined constants to specify which one.
 *                          Defaults to -1 (= return all parts as an array).
 * @return mixed False on parse failure; Array of URL components on success;
 *               When a specific component has been requested: null if the component
 *               doesn't exist in the given URL; a string or - in the case of
 *               PHP_URL_PORT - integer when it does. See parse_url()'s return values.
 */
function wp_parse_url($url, $component = -1)
{
}
/**
 * Retrieve a specific component from a parsed URL array.
 *
 * @internal
 *
 * @since 4.7.0
 * @access private
 *
 * @link https://secure.php.net/manual/en/function.parse-url.php
 *
 * @param array|false $url_parts The parsed URL. Can be false if the URL failed to parse.
 * @param int    $component The specific component to retrieve. Use one of the PHP
 *                          predefined constants to specify which one.
 *                          Defaults to -1 (= return all parts as an array).
 * @return mixed False on parse failure; Array of URL components on success;
 *               When a specific component has been requested: null if the component
 *               doesn't exist in the given URL; a string or - in the case of
 *               PHP_URL_PORT - integer when it does. See parse_url()'s return values.
 */
function _get_component_from_parsed_url_array($url_parts, $component = -1)
{
}
/**
 * Translate a PHP_URL_* constant to the named array keys PHP uses.
 *
 * @internal
 *
 * @since 4.7.0
 * @access private
 *
 * @link https://secure.php.net/manual/en/url.constants.php
 *
 * @param int $constant PHP_URL_* constant.
 * @return string|bool The named key or false.
 */
function _wp_translate_php_url_constant_to_key($constant)
{
}
function get_file($path)
{
}
/**
 * Filters content and keeps only allowable HTML elements.
 *
 * This function makes sure that only the allowed HTML element names, attribute
 * names and attribute values plus only sane HTML entities will occur in
 * $string. You have to remove any slashes from PHP's magic quotes before you
 * call this function.
 *
 * The default allowed protocols are 'http', 'https', 'ftp', 'mailto', 'news',
 * 'irc', 'gopher', 'nntp', 'feed', 'telnet, 'mms', 'rtsp' and 'svn'. This
 * covers all common link protocols, except for 'javascript' which should not
 * be allowed for untrusted users.
 *
 * @since 1.0.0
 *
 * @param string $string            Content to filter through kses
 * @param array  $allowed_html      List of allowed HTML elements
 * @param array  $allowed_protocols Optional. Allowed protocol in links.
 * @return string Filtered content with only allowed HTML elements
 */
function wp_kses($string, $allowed_html, $allowed_protocols = array())
{
}
/**
 * Filters one attribute only and ensures its value is allowed.
 *
 * This function has the advantage of being more secure than esc_attr() and can
 * escape data in some situations where wp_kses() must strip the whole attribute.
 *
 * @since 4.2.3
 *
 * @param string $string The 'whole' attribute, including name and value.
 * @param string $element The element name to which the attribute belongs.
 * @return string Filtered attribute.
 */
function wp_kses_one_attr($string, $element)
{
}
/**
 * Return a list of allowed tags and attributes for a given context.
 *
 * @since 3.5.0
 * @since 5.0.1 `form` removed as allowable HTML tag.
 *
 * @global array $allowedposttags
 * @global array $allowedtags
 * @global array $allowedentitynames
 *
 * @param string|array $context The context for which to retrieve tags.
 *                              Allowed values are post, strip, data, entities, or
 *                              the name of a field filter such as pre_user_description.
 * @return array List of allowed tags and their allowed attributes.
 */
function wp_kses_allowed_html($context = '')
{
}
/**
 * You add any kses hooks here.
 *
 * There is currently only one kses WordPress hook, {@see 'pre_kses'}, and it is called here.
 * All parameters are passed to the hooks and expected to receive a string.
 *
 * @since 1.0.0
 *
 * @param string $string            Content to filter through kses
 * @param array  $allowed_html      List of allowed HTML elements
 * @param array  $allowed_protocols Allowed protocol in links
 * @return string Filtered content through {@see 'pre_kses'} hook.
 */
function wp_kses_hook($string, $allowed_html, $allowed_protocols)
{
}
/**
 * This function returns kses' version number.
 *
 * @since 1.0.0
 *
 * @return string KSES Version Number
 */
function wp_kses_version()
{
}
/**
 * Searches for HTML tags, no matter how malformed.
 *
 * It also matches stray ">" characters.
 *
 * @since 1.0.0
 *
 * @global array $pass_allowed_html
 * @global array $pass_allowed_protocols
 *
 * @param string $string            Content to filter
 * @param array  $allowed_html      Allowed HTML elements
 * @param array  $allowed_protocols Allowed protocols to keep
 * @return string Content with fixed HTML tags
 */
function wp_kses_split($string, $allowed_html, $allowed_protocols)
{
}
/**
 * Helper function listing HTML attributes containing a URL.
 *
 * This function returns a list of all HTML attributes that must contain
 * a URL according to the HTML specification.
 *
 * This list includes URI attributes both allowed and disallowed by KSES.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Attributes
 *
 * @since 5.0.1
 *
 * @return array HTML attributes that must include a URL.
 */
function wp_kses_uri_attributes()
{
}
/**
 * Callback for wp_kses_split.
 *
 * @since 3.1.0
 * @access private
 *
 * @global array $pass_allowed_html
 * @global array $pass_allowed_protocols
 *
 * @return string
 */
function _wp_kses_split_callback($match)
{
}
/**
 * Callback for wp_kses_split for fixing malformed HTML tags.
 *
 * This function does a lot of work. It rejects some very malformed things like
 * <:::>. It returns an empty string, if the element isn't allowed (look ma, no
 * strip_tags()!). Otherwise it splits the tag into an element and an attribute
 * list.
 *
 * After the tag is split into an element and an attribute list, it is run
 * through another filter which will remove illegal attributes and once that is
 * completed, will be returned.
 *
 * @access private
 * @since 1.0.0
 *
 * @param string $string            Content to filter
 * @param array  $allowed_html      Allowed HTML elements
 * @param array  $allowed_protocols Allowed protocols to keep
 * @return string Fixed HTML element
 */
function wp_kses_split2($string, $allowed_html, $allowed_protocols)
{
}
/**
 * Removes all attributes, if none are allowed for this element.
 *
 * If some are allowed it calls wp_kses_hair() to split them further, and then
 * it builds up new HTML code from the data that kses_hair() returns. It also
 * removes "<" and ">" characters, if there are any left. One more thing it does
 * is to check if the tag has a closing XHTML slash, and if it does, it puts one
 * in the returned code as well.
 *
 * @since 1.0.0
 *
 * @param string $element           HTML element/tag
 * @param string $attr              HTML attributes from HTML element to closing HTML element tag
 * @param array  $allowed_html      Allowed HTML elements
 * @param array  $allowed_protocols Allowed protocols to keep
 * @return string Sanitized HTML element
 */
function wp_kses_attr($element, $attr, $allowed_html, $allowed_protocols)
{
}
/**
 * Determine whether an attribute is allowed.
 *
 * @since 4.2.3
 *
 * @param string $name The attribute name. Returns empty string when not allowed.
 * @param string $value The attribute value. Returns a filtered value.
 * @param string $whole The name=value input. Returns filtered input.
 * @param string $vless 'y' when attribute like "enabled", otherwise 'n'.
 * @param string $element The name of the element to which this attribute belongs.
 * @param array $allowed_html The full list of allowed elements and attributes.
 * @return bool Is the attribute allowed?
 */
function wp_kses_attr_check(&$name, &$value, &$whole, $vless, $element, $allowed_html)
{
}
/**
 * Builds an attribute list from string containing attributes.
 *
 * This function does a lot of work. It parses an attribute list into an array
 * with attribute data, and tries to do the right thing even if it gets weird
 * input. It will add quotes around attribute values that don't have any quotes
 * or apostrophes around them, to make it easier to produce HTML code that will
 * conform to W3C's HTML specification. It will also remove bad URL protocols
 * from attribute values. It also reduces duplicate attributes by using the
 * attribute defined first (foo='bar' foo='baz' will result in foo='bar').
 *
 * @since 1.0.0
 *
 * @param string $attr              Attribute list from HTML element to closing HTML element tag
 * @param array  $allowed_protocols Allowed protocols to keep
 * @return array List of attributes after parsing
 */
function wp_kses_hair($attr, $allowed_protocols)
{
}
/**
 * Finds all attributes of an HTML element.
 *
 * Does not modify input.  May return "evil" output.
 *
 * Based on wp_kses_split2() and wp_kses_attr()
 *
 * @since 4.2.3
 *
 * @param string $element HTML element/tag
 * @return array|bool List of attributes found in $element. Returns false on failure.
 */
function wp_kses_attr_parse($element)
{
}
/**
 * Builds an attribute list from string containing attributes.
 *
 * Does not modify input.  May return "evil" output.
 * In case of unexpected input, returns false instead of stripping things.
 *
 * Based on wp_kses_hair() but does not return a multi-dimensional array.
 *
 * @since 4.2.3
 *
 * @param string $attr Attribute list from HTML element to closing HTML element tag
 * @return array|bool List of attributes found in $attr. Returns false on failure.
 */
function wp_kses_hair_parse($attr)
{
}
/**
 * Performs different checks for attribute values.
 *
 * The currently implemented checks are "maxlen", "minlen", "maxval", "minval"
 * and "valueless".
 *
 * @since 1.0.0
 *
 * @param string $value      Attribute value
 * @param string $vless      Whether the value is valueless. Use 'y' or 'n'
 * @param string $checkname  What $checkvalue is checking for.
 * @param mixed  $checkvalue What constraint the value should pass
 * @return bool Whether check passes
 */
function wp_kses_check_attr_val($value, $vless, $checkname, $checkvalue)
{
}
/**
 * Sanitize string from bad protocols.
 *
 * This function removes all non-allowed protocols from the beginning of
 * $string. It ignores whitespace and the case of the letters, and it does
 * understand HTML entities. It does its work in a while loop, so it won't be
 * fooled by a string like "javascript:javascript:alert(57)".
 *
 * @since 1.0.0
 *
 * @param string $string            Content to filter bad protocols from
 * @param array  $allowed_protocols Allowed protocols to keep
 * @return string Filtered content
 */
function wp_kses_bad_protocol($string, $allowed_protocols)
{
}
/**
 * Removes any invalid control characters in $string.
 *
 * Also removes any instance of the '\0' string.
 *
 * @since 1.0.0
 *
 * @param string $string
 * @param array $options Set 'slash_zero' => 'keep' when '\0' is allowed. Default is 'remove'.
 * @return string
 */
function wp_kses_no_null($string, $options = \null)
{
}
/**
 * Strips slashes from in front of quotes.
 *
 * This function changes the character sequence \" to just ". It leaves all
 * other slashes alone. It's really weird, but the quoting from
 * preg_replace(//e) seems to require this.
 *
 * @since 1.0.0
 *
 * @param string $string String to strip slashes
 * @return string Fixed string with quoted slashes
 */
function wp_kses_stripslashes($string)
{
}
/**
 * Goes through an array and changes the keys to all lower case.
 *
 * @since 1.0.0
 *
 * @param array $inarray Unfiltered array
 * @return array Fixed array with all lowercase keys
 */
function wp_kses_array_lc($inarray)
{
}
/**
 * Handles parsing errors in wp_kses_hair().
 *
 * The general plan is to remove everything to and including some whitespace,
 * but it deals with quotes and apostrophes as well.
 *
 * @since 1.0.0
 *
 * @param string $string
 * @return string
 */
function wp_kses_html_error($string)
{
}
/**
 * Sanitizes content from bad protocols and other characters.
 *
 * This function searches for URL protocols at the beginning of $string, while
 * handling whitespace and HTML entities.
 *
 * @since 1.0.0
 *
 * @param string $string            Content to check for bad protocols
 * @param string $allowed_protocols Allowed protocols
 * @return string Sanitized content
 */
function wp_kses_bad_protocol_once($string, $allowed_protocols, $count = 1)
{
}
/**
 * Callback for wp_kses_bad_protocol_once() regular expression.
 *
 * This function processes URL protocols, checks to see if they're in the
 * whitelist or not, and returns different data depending on the answer.
 *
 * @access private
 * @since 1.0.0
 *
 * @param string $string            URI scheme to check against the whitelist
 * @param string $allowed_protocols Allowed protocols
 * @return string Sanitized content
 */
function wp_kses_bad_protocol_once2($string, $allowed_protocols)
{
}
/**
 * Converts and fixes HTML entities.
 *
 * This function normalizes HTML entities. It will convert `AT&T` to the correct
 * `AT&amp;T`, `&#00058;` to `&#58;`, `&#XYZZY;` to `&amp;#XYZZY;` and so on.
 *
 * @since 1.0.0
 *
 * @param string $string Content to normalize entities
 * @return string Content with normalized entities
 */
function wp_kses_normalize_entities($string)
{
}
/**
 * Callback for wp_kses_normalize_entities() regular expression.
 *
 * This function only accepts valid named entity references, which are finite,
 * case-sensitive, and highly scrutinized by HTML and XML validators.
 *
 * @since 3.0.0
 *
 * @global array $allowedentitynames
 *
 * @param array $matches preg_replace_callback() matches array
 * @return string Correctly encoded entity
 */
function wp_kses_named_entities($matches)
{
}
/**
 * Callback for wp_kses_normalize_entities() regular expression.
 *
 * This function helps wp_kses_normalize_entities() to only accept 16-bit
 * values and nothing more for `&#number;` entities.
 *
 * @access private
 * @since 1.0.0
 *
 * @param array $matches preg_replace_callback() matches array
 * @return string Correctly encoded entity
 */
function wp_kses_normalize_entities2($matches)
{
}
/**
 * Callback for wp_kses_normalize_entities() for regular expression.
 *
 * This function helps wp_kses_normalize_entities() to only accept valid Unicode
 * numeric entities in hex form.
 *
 * @since 2.7.0
 * @access private
 *
 * @param array $matches preg_replace_callback() matches array
 * @return string Correctly encoded entity
 */
function wp_kses_normalize_entities3($matches)
{
}
/**
 * Helper function to determine if a Unicode value is valid.
 *
 * @since 2.7.0
 *
 * @param int $i Unicode value
 * @return bool True if the value was a valid Unicode number
 */
function valid_unicode($i)
{
}
/**
 * Convert all entities to their character counterparts.
 *
 * This function decodes numeric HTML entities (`&#65;` and `&#x41;`).
 * It doesn't do anything with other entities like &auml;, but we don't
 * need them in the URL protocol whitelisting system anyway.
 *
 * @since 1.0.0
 *
 * @param string $string Content to change entities
 * @return string Content after decoded entities
 */
function wp_kses_decode_entities($string)
{
}
/**
 * Regex callback for wp_kses_decode_entities()
 *
 * @since 2.9.0
 *
 * @param array $match preg match
 * @return string
 */
function _wp_kses_decode_entities_chr($match)
{
}
/**
 * Regex callback for wp_kses_decode_entities()
 *
 * @since 2.9.0
 *
 * @param array $match preg match
 * @return string
 */
function _wp_kses_decode_entities_chr_hexdec($match)
{
}
/**
 * Sanitize content with allowed HTML Kses rules.
 *
 * @since 1.0.0
 *
 * @param string $data Content to filter, expected to be escaped with slashes
 * @return string Filtered content
 */
function wp_filter_kses($data)
{
}
/**
 * Sanitize content with allowed HTML Kses rules.
 *
 * @since 2.9.0
 *
 * @param string $data Content to filter, expected to not be escaped
 * @return string Filtered content
 */
function wp_kses_data($data)
{
}
/**
 * Sanitize content for allowed HTML tags for post content.
 *
 * Post content refers to the page contents of the 'post' type and not $_POST
 * data from forms.
 *
 * @since 2.0.0
 *
 * @param string $data Post content to filter, expected to be escaped with slashes
 * @return string Filtered post content with allowed HTML tags and attributes intact.
 */
function wp_filter_post_kses($data)
{
}
/**
 * Sanitize content for allowed HTML tags for post content.
 *
 * Post content refers to the page contents of the 'post' type and not $_POST
 * data from forms.
 *
 * @since 2.9.0
 *
 * @param string $data Post content to filter
 * @return string Filtered post content with allowed HTML tags and attributes intact.
 */
function wp_kses_post($data)
{
}
/**
 * Navigates through an array, object, or scalar, and sanitizes content for
 * allowed HTML tags for post content.
 *
 * @since 4.4.2
 *
 * @see map_deep()
 *
 * @param mixed $data The array, object, or scalar value to inspect.
 * @return mixed The filtered content.
 */
function wp_kses_post_deep($data)
{
}
/**
 * Strips all of the HTML in the content.
 *
 * @since 2.1.0
 *
 * @param string $data Content to strip all HTML from
 * @return string Filtered content without any HTML
 */
function wp_filter_nohtml_kses($data)
{
}
/**
 * Adds all Kses input form content filters.
 *
 * All hooks have default priority. The wp_filter_kses() function is added to
 * the 'pre_comment_content' and 'title_save_pre' hooks.
 *
 * The wp_filter_post_kses() function is added to the 'content_save_pre',
 * 'excerpt_save_pre', and 'content_filtered_save_pre' hooks.
 *
 * @since 2.0.0
 */
function kses_init_filters()
{
}
/**
 * Removes all Kses input form content filters.
 *
 * A quick procedural method to removing all of the filters that kses uses for
 * content in WordPress Loop.
 *
 * Does not remove the kses_init() function from {@see 'init'} hook (priority is
 * default). Also does not remove kses_init() function from {@see 'set_current_user'}
 * hook (priority is also default).
 *
 * @since 2.0.6
 */
function kses_remove_filters()
{
}
/**
 * Sets up most of the Kses filters for input form content.
 *
 * If you remove the kses_init() function from {@see 'init'} hook and
 * {@see 'set_current_user'} (priority is default), then none of the Kses filter hooks
 * will be added.
 *
 * First removes all of the Kses filters in case the current user does not need
 * to have Kses filter the content. If the user does not have unfiltered_html
 * capability, then Kses filters are added.
 *
 * @since 2.0.0
 */
function kses_init()
{
}
/**
 * Inline CSS filter
 *
 * @since 2.8.1
 *
 * @param string $css        A string of CSS rules.
 * @param string $deprecated Not used.
 * @return string            Filtered string of CSS rules.
 */
function safecss_filter_attr($css, $deprecated = '')
{
}
/**
 * Helper function to add global attributes to a tag in the allowed html list.
 *
 * @since 3.5.0
 * @access private
 *
 * @param array $value An array of attributes.
 * @return array The array of attributes with global attributes added.
 */
function _wp_add_global_attributes($value)
{
}
/**
 * Core Translation API
 *
 * @package WordPress
 * @subpackage i18n
 * @since 1.2.0
 */
/**
 * Retrieves the current locale.
 *
 * If the locale is set, then it will filter the locale in the {@see 'locale'}
 * filter hook and return the value.
 *
 * If the locale is not set already, then the WPLANG constant is used if it is
 * defined. Then it is filtered through the {@see 'locale'} filter hook and
 * the value for the locale global set and the locale is returned.
 *
 * The process to get the locale should only be done once, but the locale will
 * always be filtered using the {@see 'locale'} hook.
 *
 * @since 1.5.0
 *
 * @global string $locale
 * @global string $wp_local_package
 *
 * @return string The locale of the blog or from the {@see 'locale'} hook.
 */
function get_locale()
{
}
/**
 * Retrieves the locale of a user.
 *
 * If the user has a locale set to a non-empty string then it will be
 * returned. Otherwise it returns the locale of get_locale().
 *
 * @since 4.7.0
 *
 * @param int|WP_User $user_id User's ID or a WP_User object. Defaults to current user.
 * @return string The locale of the user.
 */
function get_user_locale($user_id = 0)
{
}
/**
 * Retrieve the translation of $text.
 *
 * If there is no translation, or the text domain isn't loaded, the original text is returned.
 *
 * *Note:* Don't use translate() directly, use __() or related functions.
 *
 * @since 2.2.0
 *
 * @param string $text   Text to translate.
 * @param string $domain Optional. Text domain. Unique identifier for retrieving translated strings.
 *                       Default 'default'.
 * @return string Translated text
 */
function translate($text, $domain = 'default')
{
}
/**
 * Remove last item on a pipe-delimited string.
 *
 * Meant for removing the last item in a string, such as 'Role name|User role'. The original
 * string will be returned if no pipe '|' characters are found in the string.
 *
 * @since 2.8.0
 *
 * @param string $string A pipe-delimited string.
 * @return string Either $string or everything before the last pipe.
 */
function before_last_bar($string)
{
}
/**
 * Retrieve the translation of $text in the context defined in $context.
 *
 * If there is no translation, or the text domain isn't loaded the original
 * text is returned.
 *
 * *Note:* Don't use translate_with_gettext_context() directly, use _x() or related functions.
 *
 * @since 2.8.0
 *
 * @param string $text    Text to translate.
 * @param string $context Context information for the translators.
 * @param string $domain  Optional. Text domain. Unique identifier for retrieving translated strings.
 *                        Default 'default'.
 * @return string Translated text on success, original text on failure.
 */
function translate_with_gettext_context($text, $context, $domain = 'default')
{
}
/**
 * Retrieve the translation of $text.
 *
 * If there is no translation, or the text domain isn't loaded, the original text is returned.
 *
 * @since 2.1.0
 *
 * @param string $text   Text to translate.
 * @param string $domain Optional. Text domain. Unique identifier for retrieving translated strings.
 *                       Default 'default'.
 * @return string Translated text.
 */
function __($text, $domain = 'default')
{
}
/**
 * Retrieve the translation of $text and escapes it for safe use in an attribute.
 *
 * If there is no translation, or the text domain isn't loaded, the original text is returned.
 *
 * @since 2.8.0
 *
 * @param string $text   Text to translate.
 * @param string $domain Optional. Text domain. Unique identifier for retrieving translated strings.
 *                       Default 'default'.
 * @return string Translated text on success, original text on failure.
 */
function esc_attr__($text, $domain = 'default')
{
}
/**
 * Retrieve the translation of $text and escapes it for safe use in HTML output.
 *
 * If there is no translation, or the text domain isn't loaded, the original text
 * is escaped and returned..
 *
 * @since 2.8.0
 *
 * @param string $text   Text to translate.
 * @param string $domain Optional. Text domain. Unique identifier for retrieving translated strings.
 *                       Default 'default'.
 * @return string Translated text
 */
function esc_html__($text, $domain = 'default')
{
}
/**
 * Display translated text.
 *
 * @since 1.2.0
 *
 * @param string $text   Text to translate.
 * @param string $domain Optional. Text domain. Unique identifier for retrieving translated strings.
 *                       Default 'default'.
 */
function _e($text, $domain = 'default')
{
}
/**
 * Display translated text that has been escaped for safe use in an attribute.
 *
 * @since 2.8.0
 *
 * @param string $text   Text to translate.
 * @param string $domain Optional. Text domain. Unique identifier for retrieving translated strings.
 *                       Default 'default'.
 */
function esc_attr_e($text, $domain = 'default')
{
}
/**
 * Display translated text that has been escaped for safe use in HTML output.
 *
 * @since 2.8.0
 *
 * @param string $text   Text to translate.
 * @param string $domain Optional. Text domain. Unique identifier for retrieving translated strings.
 *                       Default 'default'.
 */
function esc_html_e($text, $domain = 'default')
{
}
/**
 * Retrieve translated string with gettext context.
 *
 * Quite a few times, there will be collisions with similar translatable text
 * found in more than two places, but with different translated context.
 *
 * By including the context in the pot file, translators can translate the two
 * strings differently.
 *
 * @since 2.8.0
 *
 * @param string $text    Text to translate.
 * @param string $context Context information for the translators.
 * @param string $domain  Optional. Text domain. Unique identifier for retrieving translated strings.
 *                        Default 'default'.
 * @return string Translated context string without pipe.
 */
function _x($text, $context, $domain = 'default')
{
}
/**
 * Display translated string with gettext context.
 *
 * @since 3.0.0
 *
 * @param string $text    Text to translate.
 * @param string $context Context information for the translators.
 * @param string $domain  Optional. Text domain. Unique identifier for retrieving translated strings.
 *                        Default 'default'.
 * @return string Translated context string without pipe.
 */
function _ex($text, $context, $domain = 'default')
{
}
/**
 * Translate string with gettext context, and escapes it for safe use in an attribute.
 *
 * @since 2.8.0
 *
 * @param string $text    Text to translate.
 * @param string $context Context information for the translators.
 * @param string $domain  Optional. Text domain. Unique identifier for retrieving translated strings.
 *                        Default 'default'.
 * @return string Translated text
 */
function esc_attr_x($text, $context, $domain = 'default')
{
}
/**
 * Translate string with gettext context, and escapes it for safe use in HTML output.
 *
 * @since 2.9.0
 *
 * @param string $text    Text to translate.
 * @param string $context Context information for the translators.
 * @param string $domain  Optional. Text domain. Unique identifier for retrieving translated strings.
 *                        Default 'default'.
 * @return string Translated text.
 */
function esc_html_x($text, $context, $domain = 'default')
{
}
/**
 * Translates and retrieves the singular or plural form based on the supplied number.
 *
 * Used when you want to use the appropriate form of a string based on whether a
 * number is singular or plural.
 *
 * Example:
 *
 *     printf( _n( '%s person', '%s people', $count, 'text-domain' ), number_format_i18n( $count ) );
 *
 * @since 2.8.0
 *
 * @param string $single The text to be used if the number is singular.
 * @param string $plural The text to be used if the number is plural.
 * @param int    $number The number to compare against to use either the singular or plural form.
 * @param string $domain Optional. Text domain. Unique identifier for retrieving translated strings.
 *                       Default 'default'.
 * @return string The translated singular or plural form.
 */
function _n($single, $plural, $number, $domain = 'default')
{
}
/**
 * Translates and retrieves the singular or plural form based on the supplied number, with gettext context.
 *
 * This is a hybrid of _n() and _x(). It supports context and plurals.
 *
 * Used when you want to use the appropriate form of a string with context based on whether a
 * number is singular or plural.
 *
 * Example of a generic phrase which is disambiguated via the context parameter:
 *
 *     printf( _nx( '%s group', '%s groups', $people, 'group of people', 'text-domain' ), number_format_i18n( $people ) );
 *     printf( _nx( '%s group', '%s groups', $animals, 'group of animals', 'text-domain' ), number_format_i18n( $animals ) );
 *
 * @since 2.8.0
 *
 * @param string $single  The text to be used if the number is singular.
 * @param string $plural  The text to be used if the number is plural.
 * @param int    $number  The number to compare against to use either the singular or plural form.
 * @param string $context Context information for the translators.
 * @param string $domain  Optional. Text domain. Unique identifier for retrieving translated strings.
 *                        Default 'default'.
 * @return string The translated singular or plural form.
 */
function _nx($single, $plural, $number, $context, $domain = 'default')
{
}
/**
 * Registers plural strings in POT file, but does not translate them.
 *
 * Used when you want to keep structures with translatable plural
 * strings and use them later when the number is known.
 *
 * Example:
 *
 *     $message = _n_noop( '%s post', '%s posts', 'text-domain' );
 *     ...
 *     printf( translate_nooped_plural( $message, $count, 'text-domain' ), number_format_i18n( $count ) );
 *
 * @since 2.5.0
 *
 * @param string $singular Singular form to be localized.
 * @param string $plural   Plural form to be localized.
 * @param string $domain   Optional. Text domain. Unique identifier for retrieving translated strings.
 *                         Default null.
 * @return array {
 *     Array of translation information for the strings.
 *
 *     @type string $0        Singular form to be localized. No longer used.
 *     @type string $1        Plural form to be localized. No longer used.
 *     @type string $singular Singular form to be localized.
 *     @type string $plural   Plural form to be localized.
 *     @type null   $context  Context information for the translators.
 *     @type string $domain   Text domain.
 * }
 */
function _n_noop($singular, $plural, $domain = \null)
{
}
/**
 * Registers plural strings with gettext context in POT file, but does not translate them.
 *
 * Used when you want to keep structures with translatable plural
 * strings and use them later when the number is known.
 *
 * Example of a generic phrase which is disambiguated via the context parameter:
 *
 *     $messages = array(
 *      	'people'  => _nx_noop( '%s group', '%s groups', 'people', 'text-domain' ),
 *      	'animals' => _nx_noop( '%s group', '%s groups', 'animals', 'text-domain' ),
 *     );
 *     ...
 *     $message = $messages[ $type ];
 *     printf( translate_nooped_plural( $message, $count, 'text-domain' ), number_format_i18n( $count ) );
 *
 * @since 2.8.0
 *
 * @param string $singular Singular form to be localized.
 * @param string $plural   Plural form to be localized.
 * @param string $context  Context information for the translators.
 * @param string $domain   Optional. Text domain. Unique identifier for retrieving translated strings.
 *                         Default null.
 * @return array {
 *     Array of translation information for the strings.
 *
 *     @type string $0        Singular form to be localized. No longer used.
 *     @type string $1        Plural form to be localized. No longer used.
 *     @type string $2        Context information for the translators. No longer used.
 *     @type string $singular Singular form to be localized.
 *     @type string $plural   Plural form to be localized.
 *     @type string $context  Context information for the translators.
 *     @type string $domain   Text domain.
 * }
 */
function _nx_noop($singular, $plural, $context, $domain = \null)
{
}
/**
 * Translates and retrieves the singular or plural form of a string that's been registered
 * with _n_noop() or _nx_noop().
 *
 * Used when you want to use a translatable plural string once the number is known.
 *
 * Example:
 *
 *     $message = _n_noop( '%s post', '%s posts', 'text-domain' );
 *     ...
 *     printf( translate_nooped_plural( $message, $count, 'text-domain' ), number_format_i18n( $count ) );
 *
 * @since 3.1.0
 *
 * @param array  $nooped_plural Array with singular, plural, and context keys, usually the result of _n_noop() or _nx_noop().
 * @param int    $count         Number of objects.
 * @param string $domain        Optional. Text domain. Unique identifier for retrieving translated strings. If $nooped_plural contains
 *                              a text domain passed to _n_noop() or _nx_noop(), it will override this value. Default 'default'.
 * @return string Either $single or $plural translated text.
 */
function translate_nooped_plural($nooped_plural, $count, $domain = 'default')
{
}
/**
 * Load a .mo file into the text domain $domain.
 *
 * If the text domain already exists, the translations will be merged. If both
 * sets have the same string, the translation from the original value will be taken.
 *
 * On success, the .mo file will be placed in the $l10n global by $domain
 * and will be a MO object.
 *
 * @since 1.5.0
 *
 * @global array $l10n          An array of all currently loaded text domains.
 * @global array $l10n_unloaded An array of all text domains that have been unloaded again.
 *
 * @param string $domain Text domain. Unique identifier for retrieving translated strings.
 * @param string $mofile Path to the .mo file.
 * @return bool True on success, false on failure.
 */
function load_textdomain($domain, $mofile)
{
}
/**
 * Unload translations for a text domain.
 *
 * @since 3.0.0
 *
 * @global array $l10n          An array of all currently loaded text domains.
 * @global array $l10n_unloaded An array of all text domains that have been unloaded again.
 *
 * @param string $domain Text domain. Unique identifier for retrieving translated strings.
 * @return bool Whether textdomain was unloaded.
 */
function unload_textdomain($domain)
{
}
/**
 * Load default translated strings based on locale.
 *
 * Loads the .mo file in WP_LANG_DIR constant path from WordPress root.
 * The translated (.mo) file is named based on the locale.
 *
 * @see load_textdomain()
 *
 * @since 1.5.0
 *
 * @param string $locale Optional. Locale to load. Default is the value of get_locale().
 * @return bool Whether the textdomain was loaded.
 */
function load_default_textdomain($locale = \null)
{
}
/**
 * Loads a plugin's translated strings.
 *
 * If the path is not given then it will be the root of the plugin directory.
 *
 * The .mo file should be named based on the text domain with a dash, and then the locale exactly.
 *
 * @since 1.5.0
 * @since 4.6.0 The function now tries to load the .mo file from the languages directory first.
 *
 * @param string $domain          Unique identifier for retrieving translated strings
 * @param string $deprecated      Optional. Use the $plugin_rel_path parameter instead. Default false.
 * @param string $plugin_rel_path Optional. Relative path to WP_PLUGIN_DIR where the .mo file resides.
 *                                Default false.
 * @return bool True when textdomain is successfully loaded, false otherwise.
 */
function load_plugin_textdomain($domain, $deprecated = \false, $plugin_rel_path = \false)
{
}
/**
 * Load the translated strings for a plugin residing in the mu-plugins directory.
 *
 * @since 3.0.0
 * @since 4.6.0 The function now tries to load the .mo file from the languages directory first.
 *
 * @param string $domain             Text domain. Unique identifier for retrieving translated strings.
 * @param string $mu_plugin_rel_path Optional. Relative to `WPMU_PLUGIN_DIR` directory in which the .mo
 *                                   file resides. Default empty string.
 * @return bool True when textdomain is successfully loaded, false otherwise.
 */
function load_muplugin_textdomain($domain, $mu_plugin_rel_path = '')
{
}
/**
 * Load the theme's translated strings.
 *
 * If the current locale exists as a .mo file in the theme's root directory, it
 * will be included in the translated strings by the $domain.
 *
 * The .mo files must be named based on the locale exactly.
 *
 * @since 1.5.0
 * @since 4.6.0 The function now tries to load the .mo file from the languages directory first.
 *
 * @param string $domain Text domain. Unique identifier for retrieving translated strings.
 * @param string $path   Optional. Path to the directory containing the .mo file.
 *                       Default false.
 * @return bool True when textdomain is successfully loaded, false otherwise.
 */
function load_theme_textdomain($domain, $path = \false)
{
}
/**
 * Load the child themes translated strings.
 *
 * If the current locale exists as a .mo file in the child themes
 * root directory, it will be included in the translated strings by the $domain.
 *
 * The .mo files must be named based on the locale exactly.
 *
 * @since 2.9.0
 *
 * @param string $domain Text domain. Unique identifier for retrieving translated strings.
 * @param string $path   Optional. Path to the directory containing the .mo file.
 *                       Default false.
 * @return bool True when the theme textdomain is successfully loaded, false otherwise.
 */
function load_child_theme_textdomain($domain, $path = \false)
{
}
/**
 * Loads plugin and theme textdomains just-in-time.
 *
 * When a textdomain is encountered for the first time, we try to load
 * the translation file from `wp-content/languages`, removing the need
 * to call load_plugin_texdomain() or load_theme_texdomain().
 *
 * @since 4.6.0
 * @access private
 *
 * @see get_translations_for_domain()
 * @global array $l10n_unloaded An array of all text domains that have been unloaded again.
 *
 * @param string $domain Text domain. Unique identifier for retrieving translated strings.
 * @return bool True when the textdomain is successfully loaded, false otherwise.
 */
function _load_textdomain_just_in_time($domain)
{
}
/**
 * Gets the path to a translation file for loading a textdomain just in time.
 *
 * Caches the retrieved results internally.
 *
 * @since 4.7.0
 * @access private
 *
 * @see _load_textdomain_just_in_time()
 *
 * @param string $domain Text domain. Unique identifier for retrieving translated strings.
 * @param bool   $reset  Whether to reset the internal cache. Used by the switch to locale functionality.
 * @return string|false The path to the translation file or false if no translation file was found.
 */
function _get_path_to_translation($domain, $reset = \false)
{
}
/**
 * Gets the path to a translation file in the languages directory for the current locale.
 *
 * Holds a cached list of available .mo files to improve performance.
 *
 * @since 4.7.0
 * @access private
 *
 * @see _get_path_to_translation()
 *
 * @param string $domain Text domain. Unique identifier for retrieving translated strings.
 * @return string|false The path to the translation file or false if no translation file was found.
 */
function _get_path_to_translation_from_lang_dir($domain)
{
}
/**
 * Return the Translations instance for a text domain.
 *
 * If there isn't one, returns empty Translations instance.
 *
 * @since 2.8.0
 *
 * @global array $l10n
 *
 * @param string $domain Text domain. Unique identifier for retrieving translated strings.
 * @return Translations|NOOP_Translations A Translations instance.
 */
function get_translations_for_domain($domain)
{
}
/**
 * Whether there are translations for the text domain.
 *
 * @since 3.0.0
 *
 * @global array $l10n
 *
 * @param string $domain Text domain. Unique identifier for retrieving translated strings.
 * @return bool Whether there are translations.
 */
function is_textdomain_loaded($domain)
{
}
/**
 * Translates role name.
 *
 * Since the role names are in the database and not in the source there
 * are dummy gettext calls to get them into the POT file and this function
 * properly translates them back.
 *
 * The before_last_bar() call is needed, because older installations keep the roles
 * using the old context format: 'Role name|User role' and just skipping the
 * content after the last bar is easier than fixing them in the DB. New installations
 * won't suffer from that problem.
 *
 * @since 2.8.0
 *
 * @param string $name The role name.
 * @return string Translated role name on success, original name on failure.
 */
function translate_user_role($name)
{
}
/**
 * Get all available languages based on the presence of *.mo files in a given directory.
 *
 * The default directory is WP_LANG_DIR.
 *
 * @since 3.0.0
 * @since 4.7.0 The results are now filterable with the {@see 'get_available_languages'} filter.
 *
 * @param string $dir A directory to search for language files.
 *                    Default WP_LANG_DIR.
 * @return array An array of language codes or an empty array if no languages are present. Language codes are formed by stripping the .mo extension from the language file names.
 */
function get_available_languages($dir = \null)
{
}
/**
 * Get installed translations.
 *
 * Looks in the wp-content/languages directory for translations of
 * plugins or themes.
 *
 * @since 3.7.0
 *
 * @param string $type What to search for. Accepts 'plugins', 'themes', 'core'.
 * @return array Array of language data.
 */
function wp_get_installed_translations($type)
{
}
/**
 * Extract headers from a PO file.
 *
 * @since 3.7.0
 *
 * @param string $po_file Path to PO file.
 * @return array PO file headers.
 */
function wp_get_pomo_file_data($po_file)
{
}
/**
 * Language selector.
 *
 * @since 4.0.0
 * @since 4.3.0 Introduced the `echo` argument.
 * @since 4.7.0 Introduced the `show_option_site_default` argument.
 *
 * @see get_available_languages()
 * @see wp_get_available_translations()
 *
 * @param string|array $args {
 *     Optional. Array or string of arguments for outputting the language selector.
 *
 *     @type string   $id                           ID attribute of the select element. Default 'locale'.
 *     @type string   $name                         Name attribute of the select element. Default 'locale'.
 *     @type array    $languages                    List of installed languages, contain only the locales.
 *                                                  Default empty array.
 *     @type array    $translations                 List of available translations. Default result of
 *                                                  wp_get_available_translations().
 *     @type string   $selected                     Language which should be selected. Default empty.
 *     @type bool|int $echo                         Whether to echo the generated markup. Accepts 0, 1, or their
 *                                                  boolean equivalents. Default 1.
 *     @type bool     $show_available_translations  Whether to show available translations. Default true.
 *     @type bool     $show_option_site_default     Whether to show an option to fall back to the site's locale. Default false.
 * }
 * @return string HTML content
 */
function wp_dropdown_languages($args = array())
{
}
/**
 * Checks if current locale is RTL.
 *
 * @since 3.0.0
 *
 * @global WP_Locale $wp_locale
 *
 * @return bool Whether locale is RTL.
 */
function is_rtl()
{
}
/**
 * Switches the translations according to the given locale.
 *
 * @since 4.7.0
 *
 * @global WP_Locale_Switcher $wp_locale_switcher
 *
 * @param string $locale The locale.
 * @return bool True on success, false on failure.
 */
function switch_to_locale($locale)
{
}
/**
 * Restores the translations according to the previous locale.
 *
 * @since 4.7.0
 *
 * @global WP_Locale_Switcher $wp_locale_switcher
 *
 * @return string|false Locale on success, false on error.
 */
function restore_previous_locale()
{
}
/**
 * Restores the translations according to the original locale.
 *
 * @since 4.7.0
 *
 * @global WP_Locale_Switcher $wp_locale_switcher
 *
 * @return string|false Locale on success, false on error.
 */
function restore_current_locale()
{
}
/**
 * Whether switch_to_locale() is in effect.
 *
 * @since 4.7.0
 *
 * @global WP_Locale_Switcher $wp_locale_switcher
 *
 * @return bool True if the locale has been switched, false otherwise.
 */
function is_locale_switched()
{
}
/**
 * WordPress Link Template Functions
 *
 * @package WordPress
 * @subpackage Template
 */
/**
 * Displays the permalink for the current post.
 *
 * @since 1.2.0
 * @since 4.4.0 Added the `$post` parameter.
 *
 * @param int|WP_Post|null $post Optional. Post ID or post object. Default is the global `$post`.
 */
function the_permalink($post = 0)
{
}
/**
 * Retrieves a trailing-slashed string if the site is set for adding trailing slashes.
 *
 * Conditionally adds a trailing slash if the permalink structure has a trailing
 * slash, strips the trailing slash if not. The string is passed through the
 * {@see 'user_trailingslashit'} filter. Will remove trailing slash from string, if
 * site is not set to have them.
 *
 * @since 2.2.0
 *
 * @global WP_Rewrite $wp_rewrite
 *
 * @param string $string      URL with or without a trailing slash.
 * @param string $type_of_url Optional. The type of URL being considered (e.g. single, category, etc)
 *                            for use in the filter. Default empty string.
 * @return string The URL with the trailing slash appended or stripped.
 */
function user_trailingslashit($string, $type_of_url = '')
{
}
/**
 * Displays the permalink anchor for the current post.
 *
 * The permalink mode title will use the post title for the 'a' element 'id'
 * attribute. The id mode uses 'post-' with the post ID for the 'id' attribute.
 *
 * @since 0.71
 *
 * @param string $mode Optional. Permalink mode. Accepts 'title' or 'id'. Default 'id'.
 */
function permalink_anchor($mode = 'id')
{
}
/**
 * Retrieves the full permalink for the current post or post ID.
 *
 * This function is an alias for get_permalink().
 *
 * @since 3.9.0
 *
 * @see get_permalink()
 *
 * @param int|WP_Post|null $post      Optional. Post ID or post object. Default is the global `$post`.
 * @param bool        $leavename Optional. Whether to keep post name or page name. Default false.
 *
 * @return string|false The permalink URL or false if post does not exist.
 */
function get_the_permalink($post = 0, $leavename = \false)
{
}
/**
 * Retrieves the full permalink for the current post or post ID.
 *
 * @since 1.0.0
 *
 * @param int|WP_Post $post      Optional. Post ID or post object. Default is the global `$post`.
 * @param bool        $leavename Optional. Whether to keep post name or page name. Default false.
 * @return string|false The permalink URL or false if post does not exist.
 */
function get_permalink($post = 0, $leavename = \false)
{
}
/**
 * Retrieves the permalink for a post of a custom post type.
 *
 * @since 3.0.0
 *
 * @global WP_Rewrite $wp_rewrite
 *
 * @param int|WP_Post $id        Optional. Post ID or post object. Default is the global `$post`.
 * @param bool        $leavename Optional, defaults to false. Whether to keep post name. Default false.
 * @param bool        $sample    Optional, defaults to false. Is it a sample permalink. Default false.
 * @return string|WP_Error The post permalink.
 */
function get_post_permalink($id = 0, $leavename = \false, $sample = \false)
{
}
/**
 * Retrieves the permalink for the current page or page ID.
 *
 * Respects page_on_front. Use this one.
 *
 * @since 1.5.0
 *
 * @param int|WP_Post $post      Optional. Post ID or object. Default uses the global `$post`.
 * @param bool        $leavename Optional. Whether to keep the page name. Default false.
 * @param bool        $sample    Optional. Whether it should be treated as a sample permalink.
 *                               Default false.
 * @return string The page permalink.
 */
function get_page_link($post = \false, $leavename = \false, $sample = \false)
{
}
/**
 * Retrieves the page permalink.
 *
 * Ignores page_on_front. Internal use only.
 *
 * @since 2.1.0
 * @access private
 *
 * @global WP_Rewrite $wp_rewrite
 *
 * @param int|WP_Post $post      Optional. Post ID or object. Default uses the global `$post`.
 * @param bool        $leavename Optional. Whether to keep the page name. Default false.
 * @param bool        $sample    Optional. Whether it should be treated as a sample permalink.
 *                               Default false.
 * @return string The page permalink.
 */
function _get_page_link($post = \false, $leavename = \false, $sample = \false)
{
}
/**
 * Retrieves the permalink for an attachment.
 *
 * This can be used in the WordPress Loop or outside of it.
 *
 * @since 2.0.0
 *
 * @global WP_Rewrite $wp_rewrite
 *
 * @param int|object $post      Optional. Post ID or object. Default uses the global `$post`.
 * @param bool       $leavename Optional. Whether to keep the page name. Default false.
 * @return string The attachment permalink.
 */
function get_attachment_link($post = \null, $leavename = \false)
{
}
/**
 * Retrieves the permalink for the year archives.
 *
 * @since 1.5.0
 *
 * @global WP_Rewrite $wp_rewrite
 *
 * @param int|bool $year False for current year or year for permalink.
 * @return string The permalink for the specified year archive.
 */
function get_year_link($year)
{
}
/**
 * Retrieves the permalink for the month archives with year.
 *
 * @since 1.0.0
 *
 * @global WP_Rewrite $wp_rewrite
 *
 * @param bool|int $year  False for current year. Integer of year.
 * @param bool|int $month False for current month. Integer of month.
 * @return string The permalink for the specified month and year archive.
 */
function get_month_link($year, $month)
{
}
/**
 * Retrieves the permalink for the day archives with year and month.
 *
 * @since 1.0.0
 *
 * @global WP_Rewrite $wp_rewrite
 *
 * @param bool|int $year  False for current year. Integer of year.
 * @param bool|int $month False for current month. Integer of month.
 * @param bool|int $day   False for current day. Integer of day.
 * @return string The permalink for the specified day, month, and year archive.
 */
function get_day_link($year, $month, $day)
{
}
/**
 * Displays the permalink for the feed type.
 *
 * @since 3.0.0
 *
 * @param string $anchor The link's anchor text.
 * @param string $feed   Optional. Feed type. Default empty.
 */
function the_feed_link($anchor, $feed = '')
{
}
/**
 * Retrieves the permalink for the feed type.
 *
 * @since 1.5.0
 *
 * @global WP_Rewrite $wp_rewrite
 *
 * @param string $feed Optional. Feed type. Default empty.
 * @return string The feed permalink.
 */
function get_feed_link($feed = '')
{
}
/**
 * Retrieves the permalink for the post comments feed.
 *
 * @since 2.2.0
 *
 * @param int    $post_id Optional. Post ID. Default is the ID of the global `$post`.
 * @param string $feed    Optional. Feed type. Default empty.
 * @return string The permalink for the comments feed for the given post.
 */
function get_post_comments_feed_link($post_id = 0, $feed = '')
{
}
/**
 * Displays the comment feed link for a post.
 *
 * Prints out the comment feed link for a post. Link text is placed in the
 * anchor. If no link text is specified, default text is used. If no post ID is
 * specified, the current post is used.
 *
 * @since 2.5.0
 *
 * @param string $link_text Optional. Descriptive link text. Default 'Comments Feed'.
 * @param int    $post_id   Optional. Post ID. Default is the ID of the global `$post`.
 * @param string $feed      Optional. Feed format. Default empty.
 */
function post_comments_feed_link($link_text = '', $post_id = '', $feed = '')
{
}
/**
 * Retrieves the feed link for a given author.
 *
 * Returns a link to the feed for all posts by a given author. A specific feed
 * can be requested or left blank to get the default feed.
 *
 * @since 2.5.0
 *
 * @param int    $author_id Author ID.
 * @param string $feed      Optional. Feed type. Default empty.
 * @return string Link to the feed for the author specified by $author_id.
 */
function get_author_feed_link($author_id, $feed = '')
{
}
/**
 * Retrieves the feed link for a category.
 *
 * Returns a link to the feed for all posts in a given category. A specific feed
 * can be requested or left blank to get the default feed.
 *
 * @since 2.5.0
 *
 * @param int    $cat_id Category ID.
 * @param string $feed   Optional. Feed type. Default empty.
 * @return string Link to the feed for the category specified by $cat_id.
 */
function get_category_feed_link($cat_id, $feed = '')
{
}
/**
 * Retrieves the feed link for a term.
 *
 * Returns a link to the feed for all posts in a given term. A specific feed
 * can be requested or left blank to get the default feed.
 *
 * @since 3.0.0
 *
 * @param int    $term_id  Term ID.
 * @param string $taxonomy Optional. Taxonomy of `$term_id`. Default 'category'.
 * @param string $feed     Optional. Feed type. Default empty.
 * @return string|false Link to the feed for the term specified by $term_id and $taxonomy.
 */
function get_term_feed_link($term_id, $taxonomy = 'category', $feed = '')
{
}
/**
 * Retrieves the permalink for a tag feed.
 *
 * @since 2.3.0
 *
 * @param int    $tag_id Tag ID.
 * @param string $feed   Optional. Feed type. Default empty.
 * @return string The feed permalink for the given tag.
 */
function get_tag_feed_link($tag_id, $feed = '')
{
}
/**
 * Retrieves the edit link for a tag.
 *
 * @since 2.7.0
 *
 * @param int    $tag_id   Tag ID.
 * @param string $taxonomy Optional. Taxonomy slug. Default 'post_tag'.
 * @return string The edit tag link URL for the given tag.
 */
function get_edit_tag_link($tag_id, $taxonomy = 'post_tag')
{
}
/**
 * Displays or retrieves the edit link for a tag with formatting.
 *
 * @since 2.7.0
 *
 * @param string  $link   Optional. Anchor text. Default empty.
 * @param string  $before Optional. Display before edit link. Default empty.
 * @param string  $after  Optional. Display after edit link. Default empty.
 * @param WP_Term $tag    Optional. Term object. If null, the queried object will be inspected.
 *                        Default null.
 */
function edit_tag_link($link = '', $before = '', $after = '', $tag = \null)
{
}
/**
 * Retrieves the URL for editing a given term.
 *
 * @since 3.1.0
 * @since 4.5.0 The `$taxonomy` argument was made optional.
 *
 * @param int    $term_id     Term ID.
 * @param string $taxonomy    Optional. Taxonomy. Defaults to the taxonomy of the term identified
 *                            by `$term_id`.
 * @param string $object_type Optional. The object type. Used to highlight the proper post type
 *                            menu on the linked page. Defaults to the first object_type associated
 *                            with the taxonomy.
 * @return string|null The edit term link URL for the given term, or null on failure.
 */
function get_edit_term_link($term_id, $taxonomy = '', $object_type = '')
{
}
/**
 * Displays or retrieves the edit term link with formatting.
 *
 * @since 3.1.0
 *
 * @param string $link   Optional. Anchor text. Default empty.
 * @param string $before Optional. Display before edit link. Default empty.
 * @param string $after  Optional. Display after edit link. Default empty.
 * @param object $term   Optional. Term object. If null, the queried object will be inspected. Default null.
 * @param bool   $echo   Optional. Whether or not to echo the return. Default true.
 * @return string|void HTML content.
 */
function edit_term_link($link = '', $before = '', $after = '', $term = \null, $echo = \true)
{
}
/**
 * Retrieves the permalink for a search.
 *
 * @since  3.0.0
 *
 * @global WP_Rewrite $wp_rewrite
 *
 * @param string $query Optional. The query string to use. If empty the current query is used. Default empty.
 * @return string The search permalink.
 */
function get_search_link($query = '')
{
}
/**
 * Retrieves the permalink for the search results feed.
 *
 * @since 2.5.0
 *
 * @global WP_Rewrite $wp_rewrite
 *
 * @param string $search_query Optional. Search query. Default empty.
 * @param string $feed         Optional. Feed type. Default empty.
 * @return string The search results feed permalink.
 */
function get_search_feed_link($search_query = '', $feed = '')
{
}
/**
 * Retrieves the permalink for the search results comments feed.
 *
 * @since 2.5.0
 *
 * @global WP_Rewrite $wp_rewrite
 *
 * @param string $search_query Optional. Search query. Default empty.
 * @param string $feed         Optional. Feed type. Default empty.
 * @return string The comments feed search results permalink.
 */
function get_search_comments_feed_link($search_query = '', $feed = '')
{
}
/**
 * Retrieves the permalink for a post type archive.
 *
 * @since 3.1.0
 * @since 4.5.0 Support for posts was added.
 *
 * @global WP_Rewrite $wp_rewrite
 *
 * @param string $post_type Post type.
 * @return string|false The post type archive permalink.
 */
function get_post_type_archive_link($post_type)
{
}
/**
 * Retrieves the permalink for a post type archive feed.
 *
 * @since 3.1.0
 *
 * @param string $post_type Post type
 * @param string $feed      Optional. Feed type. Default empty.
 * @return string|false The post type feed permalink.
 */
function get_post_type_archive_feed_link($post_type, $feed = '')
{
}
/**
 * Retrieves the URL used for the post preview.
 *
 * Allows additional query args to be appended.
 *
 * @since 4.4.0
 *
 * @param int|WP_Post $post         Optional. Post ID or `WP_Post` object. Defaults to global `$post`.
 * @param array       $query_args   Optional. Array of additional query args to be appended to the link.
 *                                  Default empty array.
 * @param string      $preview_link Optional. Base preview link to be used if it should differ from the
 *                                  post permalink. Default empty.
 * @return string|null URL used for the post preview, or null if the post does not exist.
 */
function get_preview_post_link($post = \null, $query_args = array(), $preview_link = '')
{
}
/**
 * Retrieves the edit post link for post.
 *
 * Can be used within the WordPress loop or outside of it. Can be used with
 * pages, posts, attachments, and revisions.
 *
 * @since 2.3.0
 *
 * @param int|WP_Post $id      Optional. Post ID or post object. Default is the global `$post`.
 * @param string      $context Optional. How to output the '&' character. Default '&amp;'.
 * @return string|null The edit post link for the given post. null if the post type is invalid or does
 *                     not allow an editing UI.
 */
function get_edit_post_link($id = 0, $context = 'display')
{
}
/**
 * Displays the edit post link for post.
 *
 * @since 1.0.0
 * @since 4.4.0 The `$class` argument was added.
 *
 * @param string      $text   Optional. Anchor text. If null, default is 'Edit This'. Default null.
 * @param string      $before Optional. Display before edit link. Default empty.
 * @param string      $after  Optional. Display after edit link. Default empty.
 * @param int|WP_Post $id     Optional. Post ID or post object. Default is the global `$post`.
 * @param string      $class  Optional. Add custom class to link. Default 'post-edit-link'.
 */
function edit_post_link($text = \null, $before = '', $after = '', $id = 0, $class = 'post-edit-link')
{
}
/**
 * Retrieves the delete posts link for post.
 *
 * Can be used within the WordPress loop or outside of it, with any post type.
 *
 * @since 2.9.0
 *
 * @param int|WP_Post $id           Optional. Post ID or post object. Default is the global `$post`.
 * @param string      $deprecated   Not used.
 * @param bool        $force_delete Optional. Whether to bypass trash and force deletion. Default false.
 * @return string|void The delete post link URL for the given post.
 */
function get_delete_post_link($id = 0, $deprecated = '', $force_delete = \false)
{
}
/**
 * Retrieves the edit comment link.
 *
 * @since 2.3.0
 *
 * @param int|WP_Comment $comment_id Optional. Comment ID or WP_Comment object.
 * @return string|void The edit comment link URL for the given comment.
 */
function get_edit_comment_link($comment_id = 0)
{
}
/**
 * Displays the edit comment link with formatting.
 *
 * @since 1.0.0
 *
 * @param string $text   Optional. Anchor text. If null, default is 'Edit This'. Default null.
 * @param string $before Optional. Display before edit link. Default empty.
 * @param string $after  Optional. Display after edit link. Default empty.
 */
function edit_comment_link($text = \null, $before = '', $after = '')
{
}
/**
 * Displays the edit bookmark link.
 *
 * @since 2.7.0
 *
 * @param int|stdClass $link Optional. Bookmark ID. Default is the id of the current bookmark.
 * @return string|void The edit bookmark link URL.
 */
function get_edit_bookmark_link($link = 0)
{
}
/**
 * Displays the edit bookmark link anchor content.
 *
 * @since 2.7.0
 *
 * @param string $link     Optional. Anchor text. Default empty.
 * @param string $before   Optional. Display before edit link. Default empty.
 * @param string $after    Optional. Display after edit link. Default empty.
 * @param int    $bookmark Optional. Bookmark ID. Default is the current bookmark.
 */
function edit_bookmark_link($link = '', $before = '', $after = '', $bookmark = \null)
{
}
/**
 * Retrieves the edit user link.
 *
 * @since 3.5.0
 *
 * @param int $user_id Optional. User ID. Defaults to the current user.
 * @return string URL to edit user page or empty string.
 */
function get_edit_user_link($user_id = \null)
{
}
// Navigation links
/**
 * Retrieves the previous post that is adjacent to the current post.
 *
 * @since 1.5.0
 *
 * @param bool         $in_same_term   Optional. Whether post should be in a same taxonomy term. Default false.
 * @param array|string $excluded_terms Optional. Array or comma-separated list of excluded term IDs. Default empty.
 * @param string       $taxonomy       Optional. Taxonomy, if $in_same_term is true. Default 'category'.
 * @return null|string|WP_Post Post object if successful. Null if global $post is not set. Empty string if no
 *                             corresponding post exists.
 */
function get_previous_post($in_same_term = \false, $excluded_terms = '', $taxonomy = 'category')
{
}
/**
 * Retrieves the next post that is adjacent to the current post.
 *
 * @since 1.5.0
 *
 * @param bool         $in_same_term   Optional. Whether post should be in a same taxonomy term. Default false.
 * @param array|string $excluded_terms Optional. Array or comma-separated list of excluded term IDs. Default empty.
 * @param string       $taxonomy       Optional. Taxonomy, if $in_same_term is true. Default 'category'.
 * @return null|string|WP_Post Post object if successful. Null if global $post is not set. Empty string if no
 *                             corresponding post exists.
 */
function get_next_post($in_same_term = \false, $excluded_terms = '', $taxonomy = 'category')
{
}
/**
 * Retrieves the adjacent post.
 *
 * Can either be next or previous post.
 *
 * @since 2.5.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param bool         $in_same_term   Optional. Whether post should be in a same taxonomy term. Default false.
 * @param array|string $excluded_terms Optional. Array or comma-separated list of excluded term IDs. Default empty.
 * @param bool         $previous       Optional. Whether to retrieve previous post. Default true
 * @param string       $taxonomy       Optional. Taxonomy, if $in_same_term is true. Default 'category'.
 * @return null|string|WP_Post Post object if successful. Null if global $post is not set. Empty string if no
 *                             corresponding post exists.
 */
function get_adjacent_post($in_same_term = \false, $excluded_terms = '', $previous = \true, $taxonomy = 'category')
{
}
/**
 * Retrieves the adjacent post relational link.
 *
 * Can either be next or previous post relational link.
 *
 * @since 2.8.0
 *
 * @param string       $title          Optional. Link title format. Default '%title'.
 * @param bool         $in_same_term   Optional. Whether link should be in a same taxonomy term. Default false.
 * @param array|string $excluded_terms Optional. Array or comma-separated list of excluded term IDs. Default empty.
 * @param bool         $previous       Optional. Whether to display link to previous or next post. Default true.
 * @param string       $taxonomy       Optional. Taxonomy, if $in_same_term is true. Default 'category'.
 * @return string|void The adjacent post relational link URL.
 */
function get_adjacent_post_rel_link($title = '%title', $in_same_term = \false, $excluded_terms = '', $previous = \true, $taxonomy = 'category')
{
}
/**
 * Displays the relational links for the posts adjacent to the current post.
 *
 * @since 2.8.0
 *
 * @param string       $title          Optional. Link title format. Default '%title'.
 * @param bool         $in_same_term   Optional. Whether link should be in a same taxonomy term. Default false.
 * @param array|string $excluded_terms Optional. Array or comma-separated list of excluded term IDs. Default empty.
 * @param string       $taxonomy       Optional. Taxonomy, if $in_same_term is true. Default 'category'.
 */
function adjacent_posts_rel_link($title = '%title', $in_same_term = \false, $excluded_terms = '', $taxonomy = 'category')
{
}
/**
 * Displays relational links for the posts adjacent to the current post for single post pages.
 *
 * This is meant to be attached to actions like 'wp_head'. Do not call this directly in plugins
 * or theme templates.
 *
 * @since 3.0.0
 *
 * @see adjacent_posts_rel_link()
 */
function adjacent_posts_rel_link_wp_head()
{
}
/**
 * Displays the relational link for the next post adjacent to the current post.
 *
 * @since 2.8.0
 *
 * @see get_adjacent_post_rel_link()
 *
 * @param string       $title          Optional. Link title format. Default '%title'.
 * @param bool         $in_same_term   Optional. Whether link should be in a same taxonomy term. Default false.
 * @param array|string $excluded_terms Optional. Array or comma-separated list of excluded term IDs. Default empty.
 * @param string       $taxonomy       Optional. Taxonomy, if $in_same_term is true. Default 'category'.
 */
function next_post_rel_link($title = '%title', $in_same_term = \false, $excluded_terms = '', $taxonomy = 'category')
{
}
/**
 * Displays the relational link for the previous post adjacent to the current post.
 *
 * @since 2.8.0
 *
 * @see get_adjacent_post_rel_link()
 *
 * @param string       $title          Optional. Link title format. Default '%title'.
 * @param bool         $in_same_term   Optional. Whether link should be in a same taxonomy term. Default false.
 * @param array|string $excluded_terms Optional. Array or comma-separated list of excluded term IDs. Default true.
 * @param string       $taxonomy       Optional. Taxonomy, if $in_same_term is true. Default 'category'.
 */
function prev_post_rel_link($title = '%title', $in_same_term = \false, $excluded_terms = '', $taxonomy = 'category')
{
}
/**
 * Retrieves the boundary post.
 *
 * Boundary being either the first or last post by publish date within the constraints specified
 * by $in_same_term or $excluded_terms.
 *
 * @since 2.8.0
 *
 * @param bool         $in_same_term   Optional. Whether returned post should be in a same taxonomy term.
 *                                     Default false.
 * @param array|string $excluded_terms Optional. Array or comma-separated list of excluded term IDs.
 *                                     Default empty.
 * @param bool         $start          Optional. Whether to retrieve first or last post. Default true
 * @param string       $taxonomy       Optional. Taxonomy, if $in_same_term is true. Default 'category'.
 * @return null|array Array containing the boundary post object if successful, null otherwise.
 */
function get_boundary_post($in_same_term = \false, $excluded_terms = '', $start = \true, $taxonomy = 'category')
{
}
/**
 * Retrieves the previous post link that is adjacent to the current post.
 *
 * @since 3.7.0
 *
 * @param string       $format         Optional. Link anchor format. Default '&laquo; %link'.
 * @param string       $link           Optional. Link permalink format. Default '%title'.
 * @param bool         $in_same_term   Optional. Whether link should be in a same taxonomy term. Default false.
 * @param array|string $excluded_terms Optional. Array or comma-separated list of excluded term IDs. Default empty.
 * @param string       $taxonomy       Optional. Taxonomy, if $in_same_term is true. Default 'category'.
 * @return string The link URL of the previous post in relation to the current post.
 */
function get_previous_post_link($format = '&laquo; %link', $link = '%title', $in_same_term = \false, $excluded_terms = '', $taxonomy = 'category')
{
}
/**
 * Displays the previous post link that is adjacent to the current post.
 *
 * @since 1.5.0
 *
 * @see get_previous_post_link()
 *
 * @param string       $format         Optional. Link anchor format. Default '&laquo; %link'.
 * @param string       $link           Optional. Link permalink format. Default '%title'.
 * @param bool         $in_same_term   Optional. Whether link should be in a same taxonomy term. Default false.
 * @param array|string $excluded_terms Optional. Array or comma-separated list of excluded term IDs. Default empty.
 * @param string       $taxonomy       Optional. Taxonomy, if $in_same_term is true. Default 'category'.
 */
function previous_post_link($format = '&laquo; %link', $link = '%title', $in_same_term = \false, $excluded_terms = '', $taxonomy = 'category')
{
}
/**
 * Retrieves the next post link that is adjacent to the current post.
 *
 * @since 3.7.0
 *
 * @param string       $format         Optional. Link anchor format. Default '&laquo; %link'.
 * @param string       $link           Optional. Link permalink format. Default '%title'.
 * @param bool         $in_same_term   Optional. Whether link should be in a same taxonomy term. Default false.
 * @param array|string $excluded_terms Optional. Array or comma-separated list of excluded term IDs. Default empty.
 * @param string       $taxonomy       Optional. Taxonomy, if $in_same_term is true. Default 'category'.
 * @return string The link URL of the next post in relation to the current post.
 */
function get_next_post_link($format = '%link &raquo;', $link = '%title', $in_same_term = \false, $excluded_terms = '', $taxonomy = 'category')
{
}
/**
 * Displays the next post link that is adjacent to the current post.
 *
 * @since 1.5.0
 * @see get_next_post_link()
 *
 * @param string       $format         Optional. Link anchor format. Default '&laquo; %link'.
 * @param string       $link           Optional. Link permalink format. Default '%title'
 * @param bool         $in_same_term   Optional. Whether link should be in a same taxonomy term. Default false.
 * @param array|string $excluded_terms Optional. Array or comma-separated list of excluded term IDs. Default empty.
 * @param string       $taxonomy       Optional. Taxonomy, if $in_same_term is true. Default 'category'.
 */
function next_post_link($format = '%link &raquo;', $link = '%title', $in_same_term = \false, $excluded_terms = '', $taxonomy = 'category')
{
}
/**
 * Retrieves the adjacent post link.
 *
 * Can be either next post link or previous.
 *
 * @since 3.7.0
 *
 * @param string       $format         Link anchor format.
 * @param string       $link           Link permalink format.
 * @param bool         $in_same_term   Optional. Whether link should be in a same taxonomy term. Default false.
 * @param array|string $excluded_terms Optional. Array or comma-separated list of excluded terms IDs. Default empty.
 * @param bool         $previous       Optional. Whether to display link to previous or next post. Default true.
 * @param string       $taxonomy       Optional. Taxonomy, if $in_same_term is true. Default 'category'.
 * @return string The link URL of the previous or next post in relation to the current post.
 */
function get_adjacent_post_link($format, $link, $in_same_term = \false, $excluded_terms = '', $previous = \true, $taxonomy = 'category')
{
}
/**
 * Displays the adjacent post link.
 *
 * Can be either next post link or previous.
 *
 * @since 2.5.0
 *
 * @param string       $format         Link anchor format.
 * @param string       $link           Link permalink format.
 * @param bool         $in_same_term   Optional. Whether link should be in a same taxonomy term. Default false.
 * @param array|string $excluded_terms Optional. Array or comma-separated list of excluded category IDs. Default empty.
 * @param bool         $previous       Optional. Whether to display link to previous or next post. Default true.
 * @param string       $taxonomy       Optional. Taxonomy, if $in_same_term is true. Default 'category'.
 */
function adjacent_post_link($format, $link, $in_same_term = \false, $excluded_terms = '', $previous = \true, $taxonomy = 'category')
{
}
/**
 * Retrieves the link for a page number.
 *
 * @since 1.5.0
 *
 * @global WP_Rewrite $wp_rewrite
 *
 * @param int  $pagenum Optional. Page ID. Default 1.
 * @param bool $escape  Optional. Whether to escape the URL for display, with esc_url(). Defaults to true.
 * 	                    Otherwise, prepares the URL with esc_url_raw().
 * @return string The link URL for the given page number.
 */
function get_pagenum_link($pagenum = 1, $escape = \true)
{
}
/**
 * Retrieves the next posts page link.
 *
 * Backported from 2.1.3 to 2.0.10.
 *
 * @since 2.0.10
 *
 * @global int $paged
 *
 * @param int $max_page Optional. Max pages. Default 0.
 * @return string|void The link URL for next posts page.
 */
function get_next_posts_page_link($max_page = 0)
{
}
/**
 * Displays or retrieves the next posts page link.
 *
 * @since 0.71
 *
 * @param int   $max_page Optional. Max pages. Default 0.
 * @param bool  $echo     Optional. Whether to echo the link. Default true.
 * @return string|void The link URL for next posts page if `$echo = false`.
 */
function next_posts($max_page = 0, $echo = \true)
{
}
/**
 * Retrieves the next posts page link.
 *
 * @since 2.7.0
 *
 * @global int      $paged
 * @global WP_Query $wp_query
 *
 * @param string $label    Content for link text.
 * @param int    $max_page Optional. Max pages. Default 0.
 * @return string|void HTML-formatted next posts page link.
 */
function get_next_posts_link($label = \null, $max_page = 0)
{
}
/**
 * Displays the next posts page link.
 *
 * @since 0.71
 *
 * @param string $label    Content for link text.
 * @param int    $max_page Optional. Max pages. Default 0.
 */
function next_posts_link($label = \null, $max_page = 0)
{
}
/**
 * Retrieves the previous posts page link.
 *
 * Will only return string, if not on a single page or post.
 *
 * Backported to 2.0.10 from 2.1.3.
 *
 * @since 2.0.10
 *
 * @global int $paged
 *
 * @return string|void The link for the previous posts page.
 */
function get_previous_posts_page_link()
{
}
/**
 * Displays or retrieves the previous posts page link.
 *
 * @since 0.71
 *
 * @param bool $echo Optional. Whether to echo the link. Default true.
 * @return string|void The previous posts page link if `$echo = false`.
 */
function previous_posts($echo = \true)
{
}
/**
 * Retrieves the previous posts page link.
 *
 * @since 2.7.0
 *
 * @global int $paged
 *
 * @param string $label Optional. Previous page link text.
 * @return string|void HTML-formatted previous page link.
 */
function get_previous_posts_link($label = \null)
{
}
/**
 * Displays the previous posts page link.
 *
 * @since 0.71
 *
 * @param string $label Optional. Previous page link text.
 */
function previous_posts_link($label = \null)
{
}
/**
 * Retrieves the post pages link navigation for previous and next pages.
 *
 * @since 2.8.0
 *
 * @global WP_Query $wp_query
 *
 * @param string|array $args {
 *     Optional. Arguments to build the post pages link navigation.
 *
 *     @type string $sep      Separator character. Default '&#8212;'.
 *     @type string $prelabel Link text to display for the previous page link.
 *                            Default '&laquo; Previous Page'.
 *     @type string $nxtlabel Link text to display for the next page link.
 *                            Default 'Next Page &raquo;'.
 * }
 * @return string The posts link navigation.
 */
function get_posts_nav_link($args = array())
{
}
/**
 * Displays the post pages link navigation for previous and next pages.
 *
 * @since 0.71
 *
 * @param string $sep      Optional. Separator for posts navigation links. Default empty.
 * @param string $prelabel Optional. Label for previous pages. Default empty.
 * @param string $nxtlabel Optional Label for next pages. Default empty.
 */
function posts_nav_link($sep = '', $prelabel = '', $nxtlabel = '')
{
}
/**
 * Retrieves the navigation to next/previous post, when applicable.
 *
 * @since 4.1.0
 * @since 4.4.0 Introduced the `in_same_term`, `excluded_terms`, and `taxonomy` arguments.
 *
 * @param array $args {
 *     Optional. Default post navigation arguments. Default empty array.
 *
 *     @type string       $prev_text          Anchor text to display in the previous post link. Default '%title'.
 *     @type string       $next_text          Anchor text to display in the next post link. Default '%title'.
 *     @type bool         $in_same_term       Whether link should be in a same taxonomy term. Default false.
 *     @type array|string $excluded_terms     Array or comma-separated list of excluded term IDs. Default empty.
 *     @type string       $taxonomy           Taxonomy, if `$in_same_term` is true. Default 'category'.
 *     @type string       $screen_reader_text Screen reader text for nav element. Default 'Post navigation'.
 * }
 * @return string Markup for post links.
 */
function get_the_post_navigation($args = array())
{
}
/**
 * Displays the navigation to next/previous post, when applicable.
 *
 * @since 4.1.0
 *
 * @param array $args Optional. See get_the_post_navigation() for available arguments.
 *                    Default empty array.
 */
function the_post_navigation($args = array())
{
}
/**
 * Returns the navigation to next/previous set of posts, when applicable.
 *
 * @since 4.1.0
 *
 * @global WP_Query $wp_query WordPress Query object.
 *
 * @param array $args {
 *     Optional. Default posts navigation arguments. Default empty array.
 *
 *     @type string $prev_text          Anchor text to display in the previous posts link.
 *                                      Default 'Older posts'.
 *     @type string $next_text          Anchor text to display in the next posts link.
 *                                      Default 'Newer posts'.
 *     @type string $screen_reader_text Screen reader text for nav element.
 *                                      Default 'Posts navigation'.
 * }
 * @return string Markup for posts links.
 */
function get_the_posts_navigation($args = array())
{
}
/**
 * Displays the navigation to next/previous set of posts, when applicable.
 *
 * @since 4.1.0
 *
 * @param array $args Optional. See get_the_posts_navigation() for available arguments.
 *                    Default empty array.
 */
function the_posts_navigation($args = array())
{
}
/**
 * Retrieves a paginated navigation to next/previous set of posts, when applicable.
 *
 * @since 4.1.0
 *
 * @param array $args {
 *     Optional. Default pagination arguments, see paginate_links().
 *
 *     @type string $screen_reader_text Screen reader text for navigation element.
 *                                      Default 'Posts navigation'.
 * }
 * @return string Markup for pagination links.
 */
function get_the_posts_pagination($args = array())
{
}
/**
 * Displays a paginated navigation to next/previous set of posts, when applicable.
 *
 * @since 4.1.0
 *
 * @param array $args Optional. See get_the_posts_pagination() for available arguments.
 *                    Default empty array.
 */
function the_posts_pagination($args = array())
{
}
/**
 * Wraps passed links in navigational markup.
 *
 * @since 4.1.0
 * @access private
 *
 * @param string $links              Navigational links.
 * @param string $class              Optional. Custom class for nav element. Default: 'posts-navigation'.
 * @param string $screen_reader_text Optional. Screen reader text for nav element. Default: 'Posts navigation'.
 * @return string Navigation template tag.
 */
function _navigation_markup($links, $class = 'posts-navigation', $screen_reader_text = '')
{
}
/**
 * Retrieves the comments page number link.
 *
 * @since 2.7.0
 *
 * @global WP_Rewrite $wp_rewrite
 *
 * @param int $pagenum  Optional. Page number. Default 1.
 * @param int $max_page Optional. The maximum number of comment pages. Default 0.
 * @return string The comments page number link URL.
 */
function get_comments_pagenum_link($pagenum = 1, $max_page = 0)
{
}
/**
 * Retrieves the link to the next comments page.
 *
 * @since 2.7.1
 *
 * @global WP_Query $wp_query
 *
 * @param string $label    Optional. Label for link text. Default empty.
 * @param int    $max_page Optional. Max page. Default 0.
 * @return string|void HTML-formatted link for the next page of comments.
 */
function get_next_comments_link($label = '', $max_page = 0)
{
}
/**
 * Displays the link to the next comments page.
 *
 * @since 2.7.0
 *
 * @param string $label    Optional. Label for link text. Default empty.
 * @param int    $max_page Optional. Max page. Default 0.
 */
function next_comments_link($label = '', $max_page = 0)
{
}
/**
 * Retrieves the link to the previous comments page.
 *
 * @since 2.7.1
 *
 * @param string $label Optional. Label for comments link text. Default empty.
 * @return string|void HTML-formatted link for the previous page of comments.
 */
function get_previous_comments_link($label = '')
{
}
/**
 * Displays the link to the previous comments page.
 *
 * @since 2.7.0
 *
 * @param string $label Optional. Label for comments link text. Default empty.
 */
function previous_comments_link($label = '')
{
}
/**
 * Displays or retrieves pagination links for the comments on the current post.
 *
 * @see paginate_links()
 * @since 2.7.0
 *
 * @global WP_Rewrite $wp_rewrite
 *
 * @param string|array $args Optional args. See paginate_links(). Default empty array.
 * @return string|void Markup for pagination links.
 */
function paginate_comments_links($args = array())
{
}
/**
 * Retrieves navigation to next/previous set of comments, when applicable.
 *
 * @since 4.4.0
 *
 * @param array $args {
 *     Optional. Default comments navigation arguments.
 *
 *     @type string $prev_text          Anchor text to display in the previous comments link.
 *                                      Default 'Older comments'.
 *     @type string $next_text          Anchor text to display in the next comments link.
 *                                      Default 'Newer comments'.
 *     @type string $screen_reader_text Screen reader text for nav element. Default 'Comments navigation'.
 * }
 * @return string Markup for comments links.
 */
function get_the_comments_navigation($args = array())
{
}
/**
 * Displays navigation to next/previous set of comments, when applicable.
 *
 * @since 4.4.0
 *
 * @param array $args See get_the_comments_navigation() for available arguments. Default empty array.
 */
function the_comments_navigation($args = array())
{
}
/**
 * Retrieves a paginated navigation to next/previous set of comments, when applicable.
 *
 * @since 4.4.0
 *
 * @see paginate_comments_links()
 *
 * @param array $args {
 *     Optional. Default pagination arguments.
 *
 *     @type string $screen_reader_text Screen reader text for nav element. Default 'Comments navigation'.
 * }
 * @return string Markup for pagination links.
 */
function get_the_comments_pagination($args = array())
{
}
/**
 * Displays a paginated navigation to next/previous set of comments, when applicable.
 *
 * @since 4.4.0
 *
 * @param array $args See get_the_comments_pagination() for available arguments. Default empty array.
 */
function the_comments_pagination($args = array())
{
}
/**
 * Retrieves the URL for the current site where the front end is accessible.
 *
 * Returns the 'home' option with the appropriate protocol. The protocol will be 'https'
 * if is_ssl() evaluates to true; otherwise, it will be the same as the 'home' option.
 * If `$scheme` is 'http' or 'https', is_ssl() is overridden.
 *
 * @since 3.0.0
 *
 * @param  string      $path   Optional. Path relative to the home URL. Default empty.
 * @param  string|null $scheme Optional. Scheme to give the home URL context. Accepts
 *                             'http', 'https', 'relative', 'rest', or null. Default null.
 * @return string Home URL link with optional path appended.
 */
function home_url($path = '', $scheme = \null)
{
}
/**
 * Retrieves the URL for a given site where the front end is accessible.
 *
 * Returns the 'home' option with the appropriate protocol. The protocol will be 'https'
 * if is_ssl() evaluates to true; otherwise, it will be the same as the 'home' option.
 * If `$scheme` is 'http' or 'https', is_ssl() is overridden.
 *
 * @since 3.0.0
 *
 * @global string $pagenow
 *
 * @param  int         $blog_id Optional. Site ID. Default null (current site).
 * @param  string      $path    Optional. Path relative to the home URL. Default empty.
 * @param  string|null $scheme  Optional. Scheme to give the home URL context. Accepts
 *                              'http', 'https', 'relative', 'rest', or null. Default null.
 * @return string Home URL link with optional path appended.
 */
function get_home_url($blog_id = \null, $path = '', $scheme = \null)
{
}
/**
 * Retrieves the URL for the current site where WordPress application files
 * (e.g. wp-blog-header.php or the wp-admin/ folder) are accessible.
 *
 * Returns the 'site_url' option with the appropriate protocol, 'https' if
 * is_ssl() and 'http' otherwise. If $scheme is 'http' or 'https', is_ssl() is
 * overridden.
 *
 * @since 3.0.0
 *
 * @param string $path   Optional. Path relative to the site URL. Default empty.
 * @param string $scheme Optional. Scheme to give the site URL context. See set_url_scheme().
 * @return string Site URL link with optional path appended.
 */
function site_url($path = '', $scheme = \null)
{
}
/**
 * Retrieves the URL for a given site where WordPress application files
 * (e.g. wp-blog-header.php or the wp-admin/ folder) are accessible.
 *
 * Returns the 'site_url' option with the appropriate protocol, 'https' if
 * is_ssl() and 'http' otherwise. If `$scheme` is 'http' or 'https',
 * `is_ssl()` is overridden.
 *
 * @since 3.0.0
 *
 * @param int    $blog_id Optional. Site ID. Default null (current site).
 * @param string $path    Optional. Path relative to the site URL. Default empty.
 * @param string $scheme  Optional. Scheme to give the site URL context. Accepts
 *                        'http', 'https', 'login', 'login_post', 'admin', or
 *                        'relative'. Default null.
 * @return string Site URL link with optional path appended.
 */
function get_site_url($blog_id = \null, $path = '', $scheme = \null)
{
}
/**
 * Retrieves the URL to the admin area for the current site.
 *
 * @since 2.6.0
 *
 * @param string $path   Optional path relative to the admin URL.
 * @param string $scheme The scheme to use. Default is 'admin', which obeys force_ssl_admin() and is_ssl().
 *                       'http' or 'https' can be passed to force those schemes.
 * @return string Admin URL link with optional path appended.
 */
function admin_url($path = '', $scheme = 'admin')
{
}
/**
 * Retrieves the URL to the admin area for a given site.
 *
 * @since 3.0.0
 *
 * @param int    $blog_id Optional. Site ID. Default null (current site).
 * @param string $path    Optional. Path relative to the admin URL. Default empty.
 * @param string $scheme  Optional. The scheme to use. Accepts 'http' or 'https',
 *                        to force those schemes. Default 'admin', which obeys
 *                        force_ssl_admin() and is_ssl().
 * @return string Admin URL link with optional path appended.
 */
function get_admin_url($blog_id = \null, $path = '', $scheme = 'admin')
{
}
/**
 * Retrieves the URL to the includes directory.
 *
 * @since 2.6.0
 *
 * @param string $path   Optional. Path relative to the includes URL. Default empty.
 * @param string $scheme Optional. Scheme to give the includes URL context. Accepts
 *                       'http', 'https', or 'relative'. Default null.
 * @return string Includes URL link with optional path appended.
 */
function includes_url($path = '', $scheme = \null)
{
}
/**
 * Retrieves the URL to the content directory.
 *
 * @since 2.6.0
 *
 * @param string $path Optional. Path relative to the content URL. Default empty.
 * @return string Content URL link with optional path appended.
 */
function content_url($path = '')
{
}
/**
 * Retrieves a URL within the plugins or mu-plugins directory.
 *
 * Defaults to the plugins directory URL if no arguments are supplied.
 *
 * @since 2.6.0
 *
 * @param  string $path   Optional. Extra path appended to the end of the URL, including
 *                        the relative directory if $plugin is supplied. Default empty.
 * @param  string $plugin Optional. A full path to a file inside a plugin or mu-plugin.
 *                        The URL will be relative to its directory. Default empty.
 *                        Typically this is done by passing `__FILE__` as the argument.
 * @return string Plugins URL link with optional paths appended.
 */
function plugins_url($path = '', $plugin = '')
{
}
/**
 * Retrieves the site URL for the current network.
 *
 * Returns the site URL with the appropriate protocol, 'https' if
 * is_ssl() and 'http' otherwise. If $scheme is 'http' or 'https', is_ssl() is
 * overridden.
 *
 * @since 3.0.0
 *
 * @see set_url_scheme()
 *
 * @param string $path   Optional. Path relative to the site URL. Default empty.
 * @param string $scheme Optional. Scheme to give the site URL context. Accepts
 *                       'http', 'https', or 'relative'. Default null.
 * @return string Site URL link with optional path appended.
 */
function network_site_url($path = '', $scheme = \null)
{
}
/**
 * Retrieves the home URL for the current network.
 *
 * Returns the home URL with the appropriate protocol, 'https' is_ssl()
 * and 'http' otherwise. If `$scheme` is 'http' or 'https', `is_ssl()` is
 * overridden.
 *
 * @since 3.0.0
 *
 * @param  string $path   Optional. Path relative to the home URL. Default empty.
 * @param  string $scheme Optional. Scheme to give the home URL context. Accepts
 *                        'http', 'https', or 'relative'. Default null.
 * @return string Home URL link with optional path appended.
 */
function network_home_url($path = '', $scheme = \null)
{
}
/**
 * Retrieves the URL to the admin area for the network.
 *
 * @since 3.0.0
 *
 * @param string $path   Optional path relative to the admin URL. Default empty.
 * @param string $scheme Optional. The scheme to use. Default is 'admin', which obeys force_ssl_admin()
 *                       and is_ssl(). 'http' or 'https' can be passed to force those schemes.
 * @return string Admin URL link with optional path appended.
 */
function network_admin_url($path = '', $scheme = 'admin')
{
}
/**
 * Retrieves the URL to the admin area for the current user.
 *
 * @since 3.0.0
 *
 * @param string $path   Optional. Path relative to the admin URL. Default empty.
 * @param string $scheme Optional. The scheme to use. Default is 'admin', which obeys force_ssl_admin()
 *                       and is_ssl(). 'http' or 'https' can be passed to force those schemes.
 * @return string Admin URL link with optional path appended.
 */
function user_admin_url($path = '', $scheme = 'admin')
{
}
/**
 * Retrieves the URL to the admin area for either the current site or the network depending on context.
 *
 * @since 3.1.0
 *
 * @param string $path   Optional. Path relative to the admin URL. Default empty.
 * @param string $scheme Optional. The scheme to use. Default is 'admin', which obeys force_ssl_admin()
 *                       and is_ssl(). 'http' or 'https' can be passed to force those schemes.
 * @return string Admin URL link with optional path appended.
 */
function self_admin_url($path = '', $scheme = 'admin')
{
}
/**
 * Sets the scheme for a URL.
 *
 * @since 3.4.0
 * @since 4.4.0 The 'rest' scheme was added.
 *
 * @param string      $url    Absolute URL that includes a scheme
 * @param string|null $scheme Optional. Scheme to give $url. Currently 'http', 'https', 'login',
 *                            'login_post', 'admin', 'relative', 'rest', 'rpc', or null. Default null.
 * @return string $url URL with chosen scheme.
 */
function set_url_scheme($url, $scheme = \null)
{
}
/**
 * Retrieves the URL to the user's dashboard.
 *
 * If a user does not belong to any site, the global user dashboard is used. If the user
 * belongs to the current site, the dashboard for the current site is returned. If the user
 * cannot edit the current site, the dashboard to the user's primary site is returned.
 *
 * @since 3.1.0
 *
 * @param int    $user_id Optional. User ID. Defaults to current user.
 * @param string $path    Optional path relative to the dashboard. Use only paths known to
 *                        both site and user admins. Default empty.
 * @param string $scheme  The scheme to use. Default is 'admin', which obeys force_ssl_admin()
 *                        and is_ssl(). 'http' or 'https' can be passed to force those schemes.
 * @return string Dashboard URL link with optional path appended.
 */
function get_dashboard_url($user_id = 0, $path = '', $scheme = 'admin')
{
}
/**
 * Retrieves the URL to the user's profile editor.
 *
 * @since 3.1.0
 *
 * @param int    $user_id Optional. User ID. Defaults to current user.
 * @param string $scheme  Optional. The scheme to use. Default is 'admin', which obeys force_ssl_admin()
 *                        and is_ssl(). 'http' or 'https' can be passed to force those schemes.
 * @return string Dashboard URL link with optional path appended.
 */
function get_edit_profile_url($user_id = 0, $scheme = 'admin')
{
}
/**
 * Returns the canonical URL for a post.
 *
 * When the post is the same as the current requested page the function will handle the
 * pagination arguments too.
 *
 * @since 4.6.0
 *
 * @param int|WP_Post $post Optional. Post ID or object. Default is global `$post`.
 * @return string|false The canonical URL, or false if the post does not exist or has not
 *                      been published yet.
 */
function wp_get_canonical_url($post = \null)
{
}
/**
 * Outputs rel=canonical for singular queries.
 *
 * @since 2.9.0
 * @since 4.6.0 Adjusted to use wp_get_canonical_url().
 */
function rel_canonical()
{
}
/**
 * Returns a shortlink for a post, page, attachment, or site.
 *
 * This function exists to provide a shortlink tag that all themes and plugins can target.
 * A plugin must hook in to provide the actual shortlinks. Default shortlink support is
 * limited to providing ?p= style links for posts. Plugins can short-circuit this function
 * via the {@see 'pre_get_shortlink'} filter or filter the output via the {@see 'get_shortlink'}
 * filter.
 *
 * @since 3.0.0.
 *
 * @param int    $id          Optional. A post or site id. Default is 0, which means the current post or site.
 * @param string $context     Optional. Whether the id is a 'site' id, 'post' id, or 'media' id. If 'post',
 *                            the post_type of the post is consulted. If 'query', the current query is consulted
 *                            to determine the id and context. Default 'post'.
 * @param bool   $allow_slugs Optional. Whether to allow post slugs in the shortlink. It is up to the plugin how
 *                            and whether to honor this. Default true.
 * @return string A shortlink or an empty string if no shortlink exists for the requested resource or if shortlinks
 *                are not enabled.
 */
function wp_get_shortlink($id = 0, $context = 'post', $allow_slugs = \true)
{
}
/**
 * Injects rel=shortlink into the head if a shortlink is defined for the current page.
 *
 * Attached to the {@see 'wp_head'} action.
 *
 * @since 3.0.0
 */
function wp_shortlink_wp_head()
{
}
/**
 * Sends a Link: rel=shortlink header if a shortlink is defined for the current page.
 *
 * Attached to the {@see 'wp'} action.
 *
 * @since 3.0.0
 */
function wp_shortlink_header()
{
}
/**
 * Displays the shortlink for a post.
 *
 * Must be called from inside "The Loop"
 *
 * Call like the_shortlink( __( 'Shortlinkage FTW' ) )
 *
 * @since 3.0.0
 *
 * @param string $text   Optional The link text or HTML to be displayed. Defaults to 'This is the short link.'
 * @param string $title  Optional The tooltip for the link. Must be sanitized. Defaults to the sanitized post title.
 * @param string $before Optional HTML to display before the link. Default empty.
 * @param string $after  Optional HTML to display after the link. Default empty.
 */
function the_shortlink($text = '', $title = '', $before = '', $after = '')
{
}
/**
 * Retrieves the avatar URL.
 *
 * @since 4.2.0
 *
 * @param mixed $id_or_email The Gravatar to retrieve a URL for. Accepts a user_id, gravatar md5 hash,
 *                           user email, WP_User object, WP_Post object, or WP_Comment object.
 * @param array $args {
 *     Optional. Arguments to return instead of the default arguments.
 *
 *     @type int    $size           Height and width of the avatar in pixels. Default 96.
 *     @type string $default        URL for the default image or a default type. Accepts '404' (return
 *                                  a 404 instead of a default image), 'retro' (8bit), 'monsterid' (monster),
 *                                  'wavatar' (cartoon face), 'indenticon' (the "quilt"), 'mystery', 'mm',
 *                                  or 'mysteryman' (The Oyster Man), 'blank' (transparent GIF), or
 *                                  'gravatar_default' (the Gravatar logo). Default is the value of the
 *                                  'avatar_default' option, with a fallback of 'mystery'.
 *     @type bool   $force_default  Whether to always show the default image, never the Gravatar. Default false.
 *     @type string $rating         What rating to display avatars up to. Accepts 'G', 'PG', 'R', 'X', and are
 *                                  judged in that order. Default is the value of the 'avatar_rating' option.
 *     @type string $scheme         URL scheme to use. See set_url_scheme() for accepted values.
 *                                  Default null.
 *     @type array  $processed_args When the function returns, the value will be the processed/sanitized $args
 *                                  plus a "found_avatar" guess. Pass as a reference. Default null.
 * }
 * @return false|string The URL of the avatar we found, or false if we couldn't find an avatar.
 */
function get_avatar_url($id_or_email, $args = \null)
{
}
/**
 * Retrieves default data about the avatar.
 *
 * @since 4.2.0
 *
 * @param mixed $id_or_email The Gravatar to retrieve. Accepts a user_id, gravatar md5 hash,
 *                            user email, WP_User object, WP_Post object, or WP_Comment object.
 * @param array $args {
 *     Optional. Arguments to return instead of the default arguments.
 *
 *     @type int    $size           Height and width of the avatar image file in pixels. Default 96.
 *     @type int    $height         Display height of the avatar in pixels. Defaults to $size.
 *     @type int    $width          Display width of the avatar in pixels. Defaults to $size.
 *     @type string $default        URL for the default image or a default type. Accepts '404' (return
 *                                  a 404 instead of a default image), 'retro' (8bit), 'monsterid' (monster),
 *                                  'wavatar' (cartoon face), 'indenticon' (the "quilt"), 'mystery', 'mm',
 *                                  or 'mysteryman' (The Oyster Man), 'blank' (transparent GIF), or
 *                                  'gravatar_default' (the Gravatar logo). Default is the value of the
 *                                  'avatar_default' option, with a fallback of 'mystery'.
 *     @type bool   $force_default  Whether to always show the default image, never the Gravatar. Default false.
 *     @type string $rating         What rating to display avatars up to. Accepts 'G', 'PG', 'R', 'X', and are
 *                                  judged in that order. Default is the value of the 'avatar_rating' option.
 *     @type string $scheme         URL scheme to use. See set_url_scheme() for accepted values.
 *                                  Default null.
 *     @type array  $processed_args When the function returns, the value will be the processed/sanitized $args
 *                                  plus a "found_avatar" guess. Pass as a reference. Default null.
 *     @type string $extra_attr     HTML attributes to insert in the IMG element. Is not sanitized. Default empty.
 * }
 * @return array $processed_args {
 *     Along with the arguments passed in `$args`, this will contain a couple of extra arguments.
 *
 *     @type bool   $found_avatar True if we were able to find an avatar for this user,
 *                                false or not set if we couldn't.
 *     @type string $url          The URL of the avatar we found.
 * }
 */
function get_avatar_data($id_or_email, $args = \null)
{
}
/**
 * Retrieves the URL of a file in the theme.
 *
 * Searches in the stylesheet directory before the template directory so themes
 * which inherit from a parent theme can just override one file.
 *
 * @since 4.7.0
 *
 * @param string $file Optional. File to search for in the stylesheet directory.
 * @return string The URL of the file.
 */
function get_theme_file_uri($file = '')
{
}
/**
 * Retrieves the URL of a file in the parent theme.
 *
 * @since 4.7.0
 *
 * @param string $file Optional. File to return the URL for in the template directory.
 * @return string The URL of the file.
 */
function get_parent_theme_file_uri($file = '')
{
}
/**
 * Retrieves the path of a file in the theme.
 *
 * Searches in the stylesheet directory before the template directory so themes
 * which inherit from a parent theme can just override one file.
 *
 * @since 4.7.0
 *
 * @param string $file Optional. File to search for in the stylesheet directory.
 * @return string The path of the file.
 */
function get_theme_file_path($file = '')
{
}
/**
 * Retrieves the path of a file in the parent theme.
 *
 * @since 4.7.0
 *
 * @param string $file Optional. File to return the path for in the template directory.
 * @return string The path of the file.
 */
function get_parent_theme_file_path($file = '')
{
}
/**
 * Retrieves the URL to the privacy policy page.
 *
 * @since 4.9.6
 *
 * @return string The URL to the privacy policy page. Empty string if it doesn't exist.
 */
function get_privacy_policy_url()
{
}
/**
 * Displays the privacy policy link with formatting, when applicable.
 *
 * @since 4.9.6
 *
 * @param string $before Optional. Display before privacy policy link. Default empty.
 * @param string $after  Optional. Display after privacy policy link. Default empty.
 */
function the_privacy_policy_link($before = '', $after = '')
{
}
/**
 * Returns the privacy policy link with formatting, when applicable.
 *
 * @since 4.9.6
 *
 * @param string $before Optional. Display before privacy policy link. Default empty.
 * @param string $after  Optional. Display after privacy policy link. Default empty.
 *
 * @return string Markup for the link and surrounding elements. Empty string if it
 *                doesn't exist.
 */
function get_the_privacy_policy_link($before = '', $after = '')
{
}
/**
 * These functions are needed to load WordPress.
 *
 * @package WordPress
 */
/**
 * Return the HTTP protocol sent by the server.
 *
 * @since 4.4.0
 *
 * @return string The HTTP protocol. Default: HTTP/1.0.
 */
function wp_get_server_protocol()
{
}
/**
 * Turn register globals off.
 *
 * @since 2.1.0
 * @access private
 */
function wp_unregister_GLOBALS()
{
}
/**
 * Fix `$_SERVER` variables for various setups.
 *
 * @since 3.0.0
 * @access private
 *
 * @global string $PHP_SELF The filename of the currently executing script,
 *                          relative to the document root.
 */
function wp_fix_server_vars()
{
}
/**
 * Check for the required PHP version, and the MySQL extension or
 * a database drop-in.
 *
 * Dies if requirements are not met.
 *
 * @since 3.0.0
 * @access private
 *
 * @global string $required_php_version The required PHP version string.
 * @global string $wp_version           The WordPress version string.
 */
function wp_check_php_mysql_versions()
{
}
/**
 * Don't load all of WordPress when handling a favicon.ico request.
 *
 * Instead, send the headers for a zero-length favicon and bail.
 *
 * @since 3.0.0
 */
function wp_favicon_request()
{
}
/**
 * Die with a maintenance message when conditions are met.
 *
 * Checks for a file in the WordPress root directory named ".maintenance".
 * This file will contain the variable $upgrading, set to the time the file
 * was created. If the file was created less than 10 minutes ago, WordPress
 * enters maintenance mode and displays a message.
 *
 * The default message can be replaced by using a drop-in (maintenance.php in
 * the wp-content directory).
 *
 * @since 3.0.0
 * @access private
 *
 * @global int $upgrading the unix timestamp marking when upgrading WordPress began.
 */
function wp_maintenance()
{
}
/**
 * Start the WordPress micro-timer.
 *
 * @since 0.71
 * @access private
 *
 * @global float $timestart Unix timestamp set at the beginning of the page load.
 * @see timer_stop()
 *
 * @return bool Always returns true.
 */
function timer_start()
{
}
/**
 * Retrieve or display the time from the page start to when function is called.
 *
 * @since 0.71
 *
 * @global float   $timestart Seconds from when timer_start() is called.
 * @global float   $timeend   Seconds from when function is called.
 *
 * @param int|bool $display   Whether to echo or return the results. Accepts 0|false for return,
 *                            1|true for echo. Default 0|false.
 * @param int      $precision The number of digits from the right of the decimal to display.
 *                            Default 3.
 * @return string The "second.microsecond" finished time calculation. The number is formatted
 *                for human consumption, both localized and rounded.
 */
function timer_stop($display = 0, $precision = 3)
{
}
/**
 * Set PHP error reporting based on WordPress debug settings.
 *
 * Uses three constants: `WP_DEBUG`, `WP_DEBUG_DISPLAY`, and `WP_DEBUG_LOG`.
 * All three can be defined in wp-config.php. By default, `WP_DEBUG` and
 * `WP_DEBUG_LOG` are set to false, and `WP_DEBUG_DISPLAY` is set to true.
 *
 * When `WP_DEBUG` is true, all PHP notices are reported. WordPress will also
 * display internal notices: when a deprecated WordPress function, function
 * argument, or file is used. Deprecated code may be removed from a later
 * version.
 *
 * It is strongly recommended that plugin and theme developers use `WP_DEBUG`
 * in their development environments.
 *
 * `WP_DEBUG_DISPLAY` and `WP_DEBUG_LOG` perform no function unless `WP_DEBUG`
 * is true.
 *
 * When `WP_DEBUG_DISPLAY` is true, WordPress will force errors to be displayed.
 * `WP_DEBUG_DISPLAY` defaults to true. Defining it as null prevents WordPress
 * from changing the global configuration setting. Defining `WP_DEBUG_DISPLAY`
 * as false will force errors to be hidden.
 *
 * When `WP_DEBUG_LOG` is true, errors will be logged to debug.log in the content
 * directory.
 *
 * Errors are never displayed for XML-RPC, REST, and Ajax requests.
 *
 * @since 3.0.0
 * @access private
 */
function wp_debug_mode()
{
}
/**
 * Set the location of the language directory.
 *
 * To set directory manually, define the `WP_LANG_DIR` constant
 * in wp-config.php.
 *
 * If the language directory exists within `WP_CONTENT_DIR`, it
 * is used. Otherwise the language directory is assumed to live
 * in `WPINC`.
 *
 * @since 3.0.0
 * @access private
 */
function wp_set_lang_dir()
{
}
/**
 * Load the database class file and instantiate the `$wpdb` global.
 *
 * @since 2.5.0
 *
 * @global wpdb $wpdb The WordPress database class.
 */
function require_wp_db()
{
}
/**
 * Set the database table prefix and the format specifiers for database
 * table columns.
 *
 * Columns not listed here default to `%s`.
 *
 * @since 3.0.0
 * @access private
 *
 * @global wpdb   $wpdb         The WordPress database class.
 * @global string $table_prefix The database table prefix.
 */
function wp_set_wpdb_vars()
{
}
/**
 * Toggle `$_wp_using_ext_object_cache` on and off without directly
 * touching global.
 *
 * @since 3.7.0
 *
 * @global bool $_wp_using_ext_object_cache
 *
 * @param bool $using Whether external object cache is being used.
 * @return bool The current 'using' setting.
 */
function wp_using_ext_object_cache($using = \null)
{
}
/**
 * Start the WordPress object cache.
 *
 * If an object-cache.php file exists in the wp-content directory,
 * it uses that drop-in as an external object cache.
 *
 * @since 3.0.0
 * @access private
 *
 * @global array $wp_filter Stores all of the filters.
 */
function wp_start_object_cache()
{
}
/**
 * Redirect to the installer if WordPress is not installed.
 *
 * Dies with an error message when Multisite is enabled.
 *
 * @since 3.0.0
 * @access private
 */
function wp_not_installed()
{
}
/**
 * Retrieve an array of must-use plugin files.
 *
 * The default directory is wp-content/mu-plugins. To change the default
 * directory manually, define `WPMU_PLUGIN_DIR` and `WPMU_PLUGIN_URL`
 * in wp-config.php.
 *
 * @since 3.0.0
 * @access private
 *
 * @return array Files to include.
 */
function wp_get_mu_plugins()
{
}
/**
 * Retrieve an array of active and valid plugin files.
 *
 * While upgrading or installing WordPress, no plugins are returned.
 *
 * The default directory is wp-content/plugins. To change the default
 * directory manually, define `WP_PLUGIN_DIR` and `WP_PLUGIN_URL`
 * in wp-config.php.
 *
 * @since 3.0.0
 * @access private
 *
 * @return array Files.
 */
function wp_get_active_and_valid_plugins()
{
}
/**
 * Set internal encoding.
 *
 * In most cases the default internal encoding is latin1, which is
 * of no use, since we want to use the `mb_` functions for `utf-8` strings.
 *
 * @since 3.0.0
 * @access private
 */
function wp_set_internal_encoding()
{
}
/**
 * Add magic quotes to `$_GET`, `$_POST`, `$_COOKIE`, and `$_SERVER`.
 *
 * Also forces `$_REQUEST` to be `$_GET + $_POST`. If `$_SERVER`,
 * `$_COOKIE`, or `$_ENV` are needed, use those superglobals directly.
 *
 * @since 3.0.0
 * @access private
 */
function wp_magic_quotes()
{
}
/**
 * Runs just before PHP shuts down execution.
 *
 * @since 1.2.0
 * @access private
 */
function shutdown_action_hook()
{
}
/**
 * Copy an object.
 *
 * @since 2.7.0
 * @deprecated 3.2.0
 *
 * @param object $object The object to clone.
 * @return object The cloned object.
 */
function wp_clone($object)
{
}
/**
 * Whether the current request is for an administrative interface page.
 *
 * Does not check if the user is an administrator; current_user_can()
 * for checking roles and capabilities.
 *
 * @since 1.5.1
 *
 * @global WP_Screen $current_screen
 *
 * @return bool True if inside WordPress administration interface, false otherwise.
 */
function is_admin()
{
}
/**
 * Whether the current request is for a site's admininstrative interface.
 *
 * e.g. `/wp-admin/`
 *
 * Does not check if the user is an administrator; current_user_can()
 * for checking roles and capabilities.
 *
 * @since 3.1.0
 *
 * @global WP_Screen $current_screen
 *
 * @return bool True if inside WordPress blog administration pages.
 */
function is_blog_admin()
{
}
/**
 * Whether the current request is for the network administrative interface.
 *
 * e.g. `/wp-admin/network/`
 *
 * Does not check if the user is an administrator; current_user_can()
 * for checking roles and capabilities.
 *
 * @since 3.1.0
 *
 * @global WP_Screen $current_screen
 *
 * @return bool True if inside WordPress network administration pages.
 */
function is_network_admin()
{
}
/**
 * Whether the current request is for a user admin screen.
 *
 * e.g. `/wp-admin/user/`
 *
 * Does not inform on whether the user is an admin! Use capability
 * checks to tell if the user should be accessing a section or not
 * current_user_can().
 *
 * @since 3.1.0
 *
 * @global WP_Screen $current_screen
 *
 * @return bool True if inside WordPress user administration pages.
 */
function is_user_admin()
{
}
/**
 * If Multisite is enabled.
 *
 * @since 3.0.0
 *
 * @return bool True if Multisite is enabled, false otherwise.
 */
function is_multisite()
{
}
/**
 * Retrieve the current site ID.
 *
 * @since 3.1.0
 *
 * @global int $blog_id
 *
 * @return int Site ID.
 */
function get_current_blog_id()
{
}
/**
 * Retrieves the current network ID.
 *
 * @since 4.6.0
 *
 * @return int The ID of the current network.
 */
function get_current_network_id()
{
}
/**
 * Attempt an early load of translations.
 *
 * Used for errors encountered during the initial loading process, before
 * the locale has been properly detected and loaded.
 *
 * Designed for unusual load sequences (like setup-config.php) or for when
 * the script will then terminate with an error, otherwise there is a risk
 * that a file can be double-included.
 *
 * @since 3.4.0
 * @access private
 *
 * @global WP_Locale $wp_locale The WordPress date and time locale object.
 *
 * @staticvar bool $loaded
 */
function wp_load_translations_early()
{
}
/**
 * Check or set whether WordPress is in "installation" mode.
 *
 * If the `WP_INSTALLING` constant is defined during the bootstrap, `wp_installing()` will default to `true`.
 *
 * @since 4.4.0
 *
 * @staticvar bool $installing
 *
 * @param bool $is_installing Optional. True to set WP into Installing mode, false to turn Installing mode off.
 *                            Omit this parameter if you only want to fetch the current status.
 * @return bool True if WP is installing, otherwise false. When a `$is_installing` is passed, the function will
 *              report whether WP was in installing mode prior to the change to `$is_installing`.
 */
function wp_installing($is_installing = \null)
{
}
/**
 * Determines if SSL is used.
 *
 * @since 2.6.0
 * @since 4.6.0 Moved from functions.php to load.php.
 *
 * @return bool True if SSL, otherwise false.
 */
function is_ssl()
{
}
/**
 * Converts a shorthand byte value to an integer byte value.
 *
 * @since 2.3.0
 * @since 4.6.0 Moved from media.php to load.php.
 *
 * @link https://secure.php.net/manual/en/function.ini-get.php
 * @link https://secure.php.net/manual/en/faq.using.php#faq.using.shorthandbytes
 *
 * @param string $value A (PHP ini) byte value, either shorthand or ordinary.
 * @return int An integer byte value.
 */
function wp_convert_hr_to_bytes($value)
{
}
/**
 * Determines whether a PHP ini value is changeable at runtime.
 *
 * @since 4.6.0
 *
 * @staticvar array $ini_all
 *
 * @link https://secure.php.net/manual/en/function.ini-get-all.php
 *
 * @param string $setting The name of the ini setting to check.
 * @return bool True if the value is changeable at runtime. False otherwise.
 */
function wp_is_ini_value_changeable($setting)
{
}
/**
 * Determines whether the current request is a WordPress Ajax request.
 *
 * @since 4.7.0
 *
 * @return bool True if it's a WordPress Ajax request, false otherwise.
 */
function wp_doing_ajax()
{
}
/**
 * Determines whether the current request is a WordPress cron request.
 *
 * @since 4.8.0
 *
 * @return bool True if it's a WordPress cron request, false otherwise.
 */
function wp_doing_cron()
{
}
/**
 * Check whether variable is a WordPress Error.
 *
 * Returns true if $thing is an object of the WP_Error class.
 *
 * @since 2.1.0
 *
 * @param mixed $thing Check if unknown variable is a WP_Error object.
 * @return bool True, if WP_Error. False, if not WP_Error.
 */
function is_wp_error($thing)
{
}
/**
 * Determines whether file modifications are allowed.
 *
 * @since 4.8.0
 *
 * @param string $context The usage context.
 * @return bool True if file modification is allowed, false otherwise.
 */
function wp_is_file_mod_allowed($context)
{
}
/**
 * Start scraping edited file errors.
 *
 * @since 4.9.0
 */
function wp_start_scraping_edited_file_errors()
{
}
/**
 * Finalize scraping for edited file errors.
 *
 * @since 4.9.0
 *
 * @param string $scrape_key Scrape key.
 */
function wp_finalize_scraping_edited_file_errors($scrape_key)
{
}
/**
 * WordPress media templates.
 *
 * @package WordPress
 * @subpackage Media
 * @since 3.5.0
 */
/**
 * Output the markup for a audio tag to be used in an Underscore template
 * when data.model is passed.
 *
 * @since 3.9.0
 */
function wp_underscore_audio_template()
{
}
/**
 * Output the markup for a video tag to be used in an Underscore template
 * when data.model is passed.
 *
 * @since 3.9.0
 */
function wp_underscore_video_template()
{
}
/**
 * Prints the templates used in the media manager.
 *
 * @since 3.5.0
 *
 * @global bool $is_IE
 */
function wp_print_media_templates()
{
}
/**
 * WordPress API for media display.
 *
 * @package WordPress
 * @subpackage Media
 */
/**
 * Retrieve additional image sizes.
 *
 * @since 4.7.0
 *
 * @global array $_wp_additional_image_sizes
 *
 * @return array Additional images size data.
 */
function wp_get_additional_image_sizes()
{
}
/**
 * Scale down the default size of an image.
 *
 * This is so that the image is a better fit for the editor and theme.
 *
 * The `$size` parameter accepts either an array or a string. The supported string
 * values are 'thumb' or 'thumbnail' for the given thumbnail size or defaults at
 * 128 width and 96 height in pixels. Also supported for the string value is
 * 'medium', 'medium_large' and 'full'. The 'full' isn't actually supported, but any value other
 * than the supported will result in the content_width size or 500 if that is
 * not set.
 *
 * Finally, there is a filter named {@see 'editor_max_image_size'}, that will be
 * called on the calculated array for width and height, respectively. The second
 * parameter will be the value that was in the $size parameter. The returned
 * type for the hook is an array with the width as the first element and the
 * height as the second element.
 *
 * @since 2.5.0
 *
 * @global int   $content_width
 *
 * @param int          $width   Width of the image in pixels.
 * @param int          $height  Height of the image in pixels.
 * @param string|array $size    Optional. Image size. Accepts any valid image size, or an array
 *                              of width and height values in pixels (in that order).
 *                              Default 'medium'.
 * @param string       $context Optional. Could be 'display' (like in a theme) or 'edit'
 *                              (like inserting into an editor). Default null.
 * @return array Width and height of what the result image should resize to.
 */
function image_constrain_size_for_editor($width, $height, $size = 'medium', $context = \null)
{
}
/**
 * Retrieve width and height attributes using given width and height values.
 *
 * Both attributes are required in the sense that both parameters must have a
 * value, but are optional in that if you set them to false or null, then they
 * will not be added to the returned string.
 *
 * You can set the value using a string, but it will only take numeric values.
 * If you wish to put 'px' after the numbers, then it will be stripped out of
 * the return.
 *
 * @since 2.5.0
 *
 * @param int|string $width  Image width in pixels.
 * @param int|string $height Image height in pixels.
 * @return string HTML attributes for width and, or height.
 */
function image_hwstring($width, $height)
{
}
/**
 * Scale an image to fit a particular size (such as 'thumb' or 'medium').
 *
 * Array with image url, width, height, and whether is intermediate size, in
 * that order is returned on success is returned. $is_intermediate is true if
 * $url is a resized image, false if it is the original.
 *
 * The URL might be the original image, or it might be a resized version. This
 * function won't create a new resized copy, it will just return an already
 * resized one if it exists.
 *
 * A plugin may use the {@see 'image_downsize'} filter to hook into and offer image
 * resizing services for images. The hook must return an array with the same
 * elements that are returned in the function. The first element being the URL
 * to the new image that was resized.
 *
 * @since 2.5.0
 *
 * @param int          $id   Attachment ID for image.
 * @param array|string $size Optional. Image size to scale to. Accepts any valid image size,
 *                           or an array of width and height values in pixels (in that order).
 *                           Default 'medium'.
 * @return false|array Array containing the image URL, width, height, and boolean for whether
 *                     the image is an intermediate size. False on failure.
 */
function image_downsize($id, $size = 'medium')
{
}
/**
 * Register a new image size.
 *
 * Cropping behavior for the image size is dependent on the value of $crop:
 * 1. If false (default), images will be scaled, not cropped.
 * 2. If an array in the form of array( x_crop_position, y_crop_position ):
 *    - x_crop_position accepts 'left' 'center', or 'right'.
 *    - y_crop_position accepts 'top', 'center', or 'bottom'.
 *    Images will be cropped to the specified dimensions within the defined crop area.
 * 3. If true, images will be cropped to the specified dimensions using center positions.
 *
 * @since 2.9.0
 *
 * @global array $_wp_additional_image_sizes Associative array of additional image sizes.
 *
 * @param string     $name   Image size identifier.
 * @param int        $width  Image width in pixels.
 * @param int        $height Image height in pixels.
 * @param bool|array $crop   Optional. Whether to crop images to specified width and height or resize.
 *                           An array can specify positioning of the crop area. Default false.
 */
function add_image_size($name, $width = 0, $height = 0, $crop = \false)
{
}
/**
 * Check if an image size exists.
 *
 * @since 3.9.0
 *
 * @param string $name The image size to check.
 * @return bool True if the image size exists, false if not.
 */
function has_image_size($name)
{
}
/**
 * Remove a new image size.
 *
 * @since 3.9.0
 *
 * @global array $_wp_additional_image_sizes
 *
 * @param string $name The image size to remove.
 * @return bool True if the image size was successfully removed, false on failure.
 */
function remove_image_size($name)
{
}
/**
 * Registers an image size for the post thumbnail.
 *
 * @since 2.9.0
 *
 * @see add_image_size() for details on cropping behavior.
 *
 * @param int        $width  Image width in pixels.
 * @param int        $height Image height in pixels.
 * @param bool|array $crop   Optional. Whether to crop images to specified width and height or resize.
 *                           An array can specify positioning of the crop area. Default false.
 */
function set_post_thumbnail_size($width = 0, $height = 0, $crop = \false)
{
}
/**
 * Gets an img tag for an image attachment, scaling it down if requested.
 *
 * The {@see 'get_image_tag_class'} filter allows for changing the class name for the
 * image without having to use regular expressions on the HTML content. The
 * parameters are: what WordPress will use for the class, the Attachment ID,
 * image align value, and the size the image should be.
 *
 * The second filter, {@see 'get_image_tag'}, has the HTML content, which can then be
 * further manipulated by a plugin to change all attribute values and even HTML
 * content.
 *
 * @since 2.5.0
 *
 * @param int          $id    Attachment ID.
 * @param string       $alt   Image Description for the alt attribute.
 * @param string       $title Image Description for the title attribute.
 * @param string       $align Part of the class name for aligning the image.
 * @param string|array $size  Optional. Registered image size to retrieve a tag for. Accepts any
 *                            valid image size, or an array of width and height values in pixels
 *                            (in that order). Default 'medium'.
 * @return string HTML IMG element for given image attachment
 */
function get_image_tag($id, $alt, $title, $align, $size = 'medium')
{
}
/**
 * Calculates the new dimensions for a down-sampled image.
 *
 * If either width or height are empty, no constraint is applied on
 * that dimension.
 *
 * @since 2.5.0
 *
 * @param int $current_width  Current width of the image.
 * @param int $current_height Current height of the image.
 * @param int $max_width      Optional. Max width in pixels to constrain to. Default 0.
 * @param int $max_height     Optional. Max height in pixels to constrain to. Default 0.
 * @return array First item is the width, the second item is the height.
 */
function wp_constrain_dimensions($current_width, $current_height, $max_width = 0, $max_height = 0)
{
}
/**
 * Retrieves calculated resize dimensions for use in WP_Image_Editor.
 *
 * Calculates dimensions and coordinates for a resized image that fits
 * within a specified width and height.
 *
 * Cropping behavior is dependent on the value of $crop:
 * 1. If false (default), images will not be cropped.
 * 2. If an array in the form of array( x_crop_position, y_crop_position ):
 *    - x_crop_position accepts 'left' 'center', or 'right'.
 *    - y_crop_position accepts 'top', 'center', or 'bottom'.
 *    Images will be cropped to the specified dimensions within the defined crop area.
 * 3. If true, images will be cropped to the specified dimensions using center positions.
 *
 * @since 2.5.0
 *
 * @param int        $orig_w Original width in pixels.
 * @param int        $orig_h Original height in pixels.
 * @param int        $dest_w New width in pixels.
 * @param int        $dest_h New height in pixels.
 * @param bool|array $crop   Optional. Whether to crop image to specified width and height or resize.
 *                           An array can specify positioning of the crop area. Default false.
 * @return false|array False on failure. Returned array matches parameters for `imagecopyresampled()`.
 */
function image_resize_dimensions($orig_w, $orig_h, $dest_w, $dest_h, $crop = \false)
{
}
/**
 * Resizes an image to make a thumbnail or intermediate size.
 *
 * The returned array has the file size, the image width, and image height. The
 * {@see 'image_make_intermediate_size'} filter can be used to hook in and change the
 * values of the returned array. The only parameter is the resized file path.
 *
 * @since 2.5.0
 *
 * @param string $file   File path.
 * @param int    $width  Image width.
 * @param int    $height Image height.
 * @param bool   $crop   Optional. Whether to crop image to specified width and height or resize.
 *                       Default false.
 * @return false|array False, if no image was created. Metadata array on success.
 */
function image_make_intermediate_size($file, $width, $height, $crop = \false)
{
}
/**
 * Helper function to test if aspect ratios for two images match.
 *
 * @since 4.6.0
 *
 * @param int $source_width  Width of the first image in pixels.
 * @param int $source_height Height of the first image in pixels.
 * @param int $target_width  Width of the second image in pixels.
 * @param int $target_height Height of the second image in pixels.
 * @return bool True if aspect ratios match within 1px. False if not.
 */
function wp_image_matches_ratio($source_width, $source_height, $target_width, $target_height)
{
}
/**
 * Retrieves the image's intermediate size (resized) path, width, and height.
 *
 * The $size parameter can be an array with the width and height respectively.
 * If the size matches the 'sizes' metadata array for width and height, then it
 * will be used. If there is no direct match, then the nearest image size larger
 * than the specified size will be used. If nothing is found, then the function
 * will break out and return false.
 *
 * The metadata 'sizes' is used for compatible sizes that can be used for the
 * parameter $size value.
 *
 * The url path will be given, when the $size parameter is a string.
 *
 * If you are passing an array for the $size, you should consider using
 * add_image_size() so that a cropped version is generated. It's much more
 * efficient than having to find the closest-sized image and then having the
 * browser scale down the image.
 *
 * @since 2.5.0
 *
 * @param int          $post_id Attachment ID.
 * @param array|string $size    Optional. Image size. Accepts any valid image size, or an array
 *                              of width and height values in pixels (in that order).
 *                              Default 'thumbnail'.
 * @return false|array $data {
 *     Array of file relative path, width, and height on success. Additionally includes absolute
 *     path and URL if registered size is passed to $size parameter. False on failure.
 *
 *     @type string $file   Image's path relative to uploads directory
 *     @type int    $width  Width of image
 *     @type int    $height Height of image
 *     @type string $path   Image's absolute filesystem path.
 *     @type string $url    Image's URL.
 * }
 */
function image_get_intermediate_size($post_id, $size = 'thumbnail')
{
}
/**
 * Gets the available intermediate image sizes.
 *
 * @since 3.0.0
 *
 * @return array Returns a filtered array of image size strings.
 */
function get_intermediate_image_sizes()
{
}
/**
 * Retrieve an image to represent an attachment.
 *
 * A mime icon for files, thumbnail or intermediate size for images.
 *
 * The returned array contains four values: the URL of the attachment image src,
 * the width of the image file, the height of the image file, and a boolean
 * representing whether the returned array describes an intermediate (generated)
 * image size or the original, full-sized upload.
 *
 * @since 2.5.0
 *
 * @param int          $attachment_id Image attachment ID.
 * @param string|array $size          Optional. Image size. Accepts any valid image size, or an array of width
 *                                    and height values in pixels (in that order). Default 'thumbnail'.
 * @param bool         $icon          Optional. Whether the image should be treated as an icon. Default false.
 * @return false|array Returns an array (url, width, height, is_intermediate), or false, if no image is available.
 */
function wp_get_attachment_image_src($attachment_id, $size = 'thumbnail', $icon = \false)
{
}
/**
 * Get an HTML img element representing an image attachment
 *
 * While `$size` will accept an array, it is better to register a size with
 * add_image_size() so that a cropped version is generated. It's much more
 * efficient than having to find the closest-sized image and then having the
 * browser scale down the image.
 *
 * @since 2.5.0
 *
 * @param int          $attachment_id Image attachment ID.
 * @param string|array $size          Optional. Image size. Accepts any valid image size, or an array of width
 *                                    and height values in pixels (in that order). Default 'thumbnail'.
 * @param bool         $icon          Optional. Whether the image should be treated as an icon. Default false.
 * @param string|array $attr          Optional. Attributes for the image markup. Default empty.
 * @return string HTML img element or empty string on failure.
 */
function wp_get_attachment_image($attachment_id, $size = 'thumbnail', $icon = \false, $attr = '')
{
}
/**
 * Get the URL of an image attachment.
 *
 * @since 4.4.0
 *
 * @param int          $attachment_id Image attachment ID.
 * @param string|array $size          Optional. Image size to retrieve. Accepts any valid image size, or an array
 *                                    of width and height values in pixels (in that order). Default 'thumbnail'.
 * @param bool         $icon          Optional. Whether the image should be treated as an icon. Default false.
 * @return string|false Attachment URL or false if no image is available.
 */
function wp_get_attachment_image_url($attachment_id, $size = 'thumbnail', $icon = \false)
{
}
/**
 * Get the attachment path relative to the upload directory.
 *
 * @since 4.4.1
 * @access private
 *
 * @param string $file Attachment file name.
 * @return string Attachment path relative to the upload directory.
 */
function _wp_get_attachment_relative_path($file)
{
}
/**
 * Get the image size as array from its meta data.
 *
 * Used for responsive images.
 *
 * @since 4.4.0
 * @access private
 *
 * @param string $size_name  Image size. Accepts any valid image size name ('thumbnail', 'medium', etc.).
 * @param array  $image_meta The image meta data.
 * @return array|bool Array of width and height values in pixels (in that order)
 *                    or false if the size doesn't exist.
 */
function _wp_get_image_size_from_meta($size_name, $image_meta)
{
}
/**
 * Retrieves the value for an image attachment's 'srcset' attribute.
 *
 * @since 4.4.0
 *
 * @see wp_calculate_image_srcset()
 *
 * @param int          $attachment_id Image attachment ID.
 * @param array|string $size          Optional. Image size. Accepts any valid image size, or an array of
 *                                    width and height values in pixels (in that order). Default 'medium'.
 * @param array        $image_meta    Optional. The image meta data as returned by 'wp_get_attachment_metadata()'.
 *                                    Default null.
 * @return string|bool A 'srcset' value string or false.
 */
function wp_get_attachment_image_srcset($attachment_id, $size = 'medium', $image_meta = \null)
{
}
/**
 * A helper function to calculate the image sources to include in a 'srcset' attribute.
 *
 * @since 4.4.0
 *
 * @param array  $size_array    Array of width and height values in pixels (in that order).
 * @param string $image_src     The 'src' of the image.
 * @param array  $image_meta    The image meta data as returned by 'wp_get_attachment_metadata()'.
 * @param int    $attachment_id Optional. The image attachment ID to pass to the filter. Default 0.
 * @return string|bool          The 'srcset' attribute value. False on error or when only one source exists.
 */
function wp_calculate_image_srcset($size_array, $image_src, $image_meta, $attachment_id = 0)
{
}
/**
 * Retrieves the value for an image attachment's 'sizes' attribute.
 *
 * @since 4.4.0
 *
 * @see wp_calculate_image_sizes()
 *
 * @param int          $attachment_id Image attachment ID.
 * @param array|string $size          Optional. Image size. Accepts any valid image size, or an array of width
 *                                    and height values in pixels (in that order). Default 'medium'.
 * @param array        $image_meta    Optional. The image meta data as returned by 'wp_get_attachment_metadata()'.
 *                                    Default null.
 * @return string|bool A valid source size value for use in a 'sizes' attribute or false.
 */
function wp_get_attachment_image_sizes($attachment_id, $size = 'medium', $image_meta = \null)
{
}
/**
 * Creates a 'sizes' attribute value for an image.
 *
 * @since 4.4.0
 *
 * @param array|string $size          Image size to retrieve. Accepts any valid image size, or an array
 *                                    of width and height values in pixels (in that order). Default 'medium'.
 * @param string       $image_src     Optional. The URL to the image file. Default null.
 * @param array        $image_meta    Optional. The image meta data as returned by 'wp_get_attachment_metadata()'.
 *                                    Default null.
 * @param int          $attachment_id Optional. Image attachment ID. Either `$image_meta` or `$attachment_id`
 *                                    is needed when using the image size name as argument for `$size`. Default 0.
 * @return string|bool A valid source size value for use in a 'sizes' attribute or false.
 */
function wp_calculate_image_sizes($size, $image_src = \null, $image_meta = \null, $attachment_id = 0)
{
}
/**
 * Filters 'img' elements in post content to add 'srcset' and 'sizes' attributes.
 *
 * @since 4.4.0
 *
 * @see wp_image_add_srcset_and_sizes()
 *
 * @param string $content The raw post content to be filtered.
 * @return string Converted content with 'srcset' and 'sizes' attributes added to images.
 */
function wp_make_content_images_responsive($content)
{
}
/**
 * Adds 'srcset' and 'sizes' attributes to an existing 'img' element.
 *
 * @since 4.4.0
 *
 * @see wp_calculate_image_srcset()
 * @see wp_calculate_image_sizes()
 *
 * @param string $image         An HTML 'img' element to be filtered.
 * @param array  $image_meta    The image meta data as returned by 'wp_get_attachment_metadata()'.
 * @param int    $attachment_id Image attachment ID.
 * @return string Converted 'img' element with 'srcset' and 'sizes' attributes added.
 */
function wp_image_add_srcset_and_sizes($image, $image_meta, $attachment_id)
{
}
/**
 * Adds a 'wp-post-image' class to post thumbnails. Internal use only.
 *
 * Uses the {@see 'begin_fetch_post_thumbnail_html'} and {@see 'end_fetch_post_thumbnail_html'}
 * action hooks to dynamically add/remove itself so as to only filter post thumbnails.
 *
 * @ignore
 * @since 2.9.0
 *
 * @param array $attr Thumbnail attributes including src, class, alt, title.
 * @return array Modified array of attributes including the new 'wp-post-image' class.
 */
function _wp_post_thumbnail_class_filter($attr)
{
}
/**
 * Adds '_wp_post_thumbnail_class_filter' callback to the 'wp_get_attachment_image_attributes'
 * filter hook. Internal use only.
 *
 * @ignore
 * @since 2.9.0
 *
 * @param array $attr Thumbnail attributes including src, class, alt, title.
 */
function _wp_post_thumbnail_class_filter_add($attr)
{
}
/**
 * Removes the '_wp_post_thumbnail_class_filter' callback from the 'wp_get_attachment_image_attributes'
 * filter hook. Internal use only.
 *
 * @ignore
 * @since 2.9.0
 *
 * @param array $attr Thumbnail attributes including src, class, alt, title.
 */
function _wp_post_thumbnail_class_filter_remove($attr)
{
}
/**
 * Builds the Caption shortcode output.
 *
 * Allows a plugin to replace the content that would otherwise be returned. The
 * filter is {@see 'img_caption_shortcode'} and passes an empty string, the attr
 * parameter and the content parameter values.
 *
 * The supported attributes for the shortcode are 'id', 'align', 'width', and
 * 'caption'.
 *
 * @since 2.6.0
 *
 * @param array  $attr {
 *     Attributes of the caption shortcode.
 *
 *     @type string $id      ID of the div element for the caption.
 *     @type string $align   Class name that aligns the caption. Default 'alignnone'. Accepts 'alignleft',
 *                           'aligncenter', alignright', 'alignnone'.
 *     @type int    $width   The width of the caption, in pixels.
 *     @type string $caption The caption text.
 *     @type string $class   Additional class name(s) added to the caption container.
 * }
 * @param string $content Shortcode content.
 * @return string HTML content to display the caption.
 */
function img_caption_shortcode($attr, $content = \null)
{
}
/**
 * Builds the Gallery shortcode output.
 *
 * This implements the functionality of the Gallery Shortcode for displaying
 * WordPress images on a post.
 *
 * @since 2.5.0
 *
 * @staticvar int $instance
 *
 * @param array $attr {
 *     Attributes of the gallery shortcode.
 *
 *     @type string       $order      Order of the images in the gallery. Default 'ASC'. Accepts 'ASC', 'DESC'.
 *     @type string       $orderby    The field to use when ordering the images. Default 'menu_order ID'.
 *                                    Accepts any valid SQL ORDERBY statement.
 *     @type int          $id         Post ID.
 *     @type string       $itemtag    HTML tag to use for each image in the gallery.
 *                                    Default 'dl', or 'figure' when the theme registers HTML5 gallery support.
 *     @type string       $icontag    HTML tag to use for each image's icon.
 *                                    Default 'dt', or 'div' when the theme registers HTML5 gallery support.
 *     @type string       $captiontag HTML tag to use for each image's caption.
 *                                    Default 'dd', or 'figcaption' when the theme registers HTML5 gallery support.
 *     @type int          $columns    Number of columns of images to display. Default 3.
 *     @type string|array $size       Size of the images to display. Accepts any valid image size, or an array of width
 *                                    and height values in pixels (in that order). Default 'thumbnail'.
 *     @type string       $ids        A comma-separated list of IDs of attachments to display. Default empty.
 *     @type string       $include    A comma-separated list of IDs of attachments to include. Default empty.
 *     @type string       $exclude    A comma-separated list of IDs of attachments to exclude. Default empty.
 *     @type string       $link       What to link each image to. Default empty (links to the attachment page).
 *                                    Accepts 'file', 'none'.
 * }
 * @return string HTML content to display gallery.
 */
function gallery_shortcode($attr)
{
}
/**
 * Outputs the templates used by playlists.
 *
 * @since 3.9.0
 */
function wp_underscore_playlist_templates()
{
}
/**
 * Outputs and enqueue default scripts and styles for playlists.
 *
 * @since 3.9.0
 *
 * @param string $type Type of playlist. Accepts 'audio' or 'video'.
 */
function wp_playlist_scripts($type)
{
}
/**
 * Builds the Playlist shortcode output.
 *
 * This implements the functionality of the playlist shortcode for displaying
 * a collection of WordPress audio or video files in a post.
 *
 * @since 3.9.0
 *
 * @global int $content_width
 * @staticvar int $instance
 *
 * @param array $attr {
 *     Array of default playlist attributes.
 *
 *     @type string  $type         Type of playlist to display. Accepts 'audio' or 'video'. Default 'audio'.
 *     @type string  $order        Designates ascending or descending order of items in the playlist.
 *                                 Accepts 'ASC', 'DESC'. Default 'ASC'.
 *     @type string  $orderby      Any column, or columns, to sort the playlist. If $ids are
 *                                 passed, this defaults to the order of the $ids array ('post__in').
 *                                 Otherwise default is 'menu_order ID'.
 *     @type int     $id           If an explicit $ids array is not present, this parameter
 *                                 will determine which attachments are used for the playlist.
 *                                 Default is the current post ID.
 *     @type array   $ids          Create a playlist out of these explicit attachment IDs. If empty,
 *                                 a playlist will be created from all $type attachments of $id.
 *                                 Default empty.
 *     @type array   $exclude      List of specific attachment IDs to exclude from the playlist. Default empty.
 *     @type string  $style        Playlist style to use. Accepts 'light' or 'dark'. Default 'light'.
 *     @type bool    $tracklist    Whether to show or hide the playlist. Default true.
 *     @type bool    $tracknumbers Whether to show or hide the numbers next to entries in the playlist. Default true.
 *     @type bool    $images       Show or hide the video or audio thumbnail (Featured Image/post
 *                                 thumbnail). Default true.
 *     @type bool    $artists      Whether to show or hide artist name in the playlist. Default true.
 * }
 *
 * @return string Playlist output. Empty string if the passed type is unsupported.
 */
function wp_playlist_shortcode($attr)
{
}
/**
 * Provides a No-JS Flash fallback as a last resort for audio / video.
 *
 * @since 3.6.0
 *
 * @param string $url The media element URL.
 * @return string Fallback HTML.
 */
function wp_mediaelement_fallback($url)
{
}
/**
 * Returns a filtered list of WP-supported audio formats.
 *
 * @since 3.6.0
 *
 * @return array Supported audio formats.
 */
function wp_get_audio_extensions()
{
}
/**
 * Returns useful keys to use to lookup data from an attachment's stored metadata.
 *
 * @since 3.9.0
 *
 * @param WP_Post $attachment The current attachment, provided for context.
 * @param string  $context    Optional. The context. Accepts 'edit', 'display'. Default 'display'.
 * @return array Key/value pairs of field keys to labels.
 */
function wp_get_attachment_id3_keys($attachment, $context = 'display')
{
}
/**
 * Builds the Audio shortcode output.
 *
 * This implements the functionality of the Audio Shortcode for displaying
 * WordPress mp3s in a post.
 *
 * @since 3.6.0
 *
 * @staticvar int $instance
 *
 * @param array  $attr {
 *     Attributes of the audio shortcode.
 *
 *     @type string $src      URL to the source of the audio file. Default empty.
 *     @type string $loop     The 'loop' attribute for the `<audio>` element. Default empty.
 *     @type string $autoplay The 'autoplay' attribute for the `<audio>` element. Default empty.
 *     @type string $preload  The 'preload' attribute for the `<audio>` element. Default 'none'.
 *     @type string $class    The 'class' attribute for the `<audio>` element. Default 'wp-audio-shortcode'.
 *     @type string $style    The 'style' attribute for the `<audio>` element. Default 'width: 100%;'.
 * }
 * @param string $content Shortcode content.
 * @return string|void HTML content to display audio.
 */
function wp_audio_shortcode($attr, $content = '')
{
}
/**
 * Returns a filtered list of WP-supported video formats.
 *
 * @since 3.6.0
 *
 * @return array List of supported video formats.
 */
function wp_get_video_extensions()
{
}
/**
 * Builds the Video shortcode output.
 *
 * This implements the functionality of the Video Shortcode for displaying
 * WordPress mp4s in a post.
 *
 * @since 3.6.0
 *
 * @global int $content_width
 * @staticvar int $instance
 *
 * @param array  $attr {
 *     Attributes of the shortcode.
 *
 *     @type string $src      URL to the source of the video file. Default empty.
 *     @type int    $height   Height of the video embed in pixels. Default 360.
 *     @type int    $width    Width of the video embed in pixels. Default $content_width or 640.
 *     @type string $poster   The 'poster' attribute for the `<video>` element. Default empty.
 *     @type string $loop     The 'loop' attribute for the `<video>` element. Default empty.
 *     @type string $autoplay The 'autoplay' attribute for the `<video>` element. Default empty.
 *     @type string $preload  The 'preload' attribute for the `<video>` element.
 *                            Default 'metadata'.
 *     @type string $class    The 'class' attribute for the `<video>` element.
 *                            Default 'wp-video-shortcode'.
 * }
 * @param string $content Shortcode content.
 * @return string|void HTML content to display video.
 */
function wp_video_shortcode($attr, $content = '')
{
}
/**
 * Displays previous image link that has the same post parent.
 *
 * @since 2.5.0
 *
 * @see adjacent_image_link()
 *
 * @param string|array $size Optional. Image size. Accepts any valid image size, an array of width and
 *                           height values in pixels (in that order), 0, or 'none'. 0 or 'none' will
 *                           default to 'post_title' or `$text`. Default 'thumbnail'.
 * @param string       $text Optional. Link text. Default false.
 */
function previous_image_link($size = 'thumbnail', $text = \false)
{
}
/**
 * Displays next image link that has the same post parent.
 *
 * @since 2.5.0
 *
 * @see adjacent_image_link()
 *
 * @param string|array $size Optional. Image size. Accepts any valid image size, an array of width and
 *                           height values in pixels (in that order), 0, or 'none'. 0 or 'none' will
 *                           default to 'post_title' or `$text`. Default 'thumbnail'.
 * @param string       $text Optional. Link text. Default false.
 */
function next_image_link($size = 'thumbnail', $text = \false)
{
}
/**
 * Displays next or previous image link that has the same post parent.
 *
 * Retrieves the current attachment object from the $post global.
 *
 * @since 2.5.0
 *
 * @param bool         $prev Optional. Whether to display the next (false) or previous (true) link. Default true.
 * @param string|array $size Optional. Image size. Accepts any valid image size, or an array of width and height
 *                           values in pixels (in that order). Default 'thumbnail'.
 * @param bool         $text Optional. Link text. Default false.
 */
function adjacent_image_link($prev = \true, $size = 'thumbnail', $text = \false)
{
}
/**
 * Retrieves taxonomies attached to given the attachment.
 *
 * @since 2.5.0
 * @since 4.7.0 Introduced the `$output` parameter.
 *
 * @param int|array|object $attachment Attachment ID, data array, or data object.
 * @param string           $output     Output type. 'names' to return an array of taxonomy names,
 *                                     or 'objects' to return an array of taxonomy objects.
 *                                     Default is 'names'.
 * @return array Empty array on failure. List of taxonomies on success.
 */
function get_attachment_taxonomies($attachment, $output = 'names')
{
}
/**
 * Retrieves all of the taxonomy names that are registered for attachments.
 *
 * Handles mime-type-specific taxonomies such as attachment:image and attachment:video.
 *
 * @since 3.5.0
 *
 * @see get_taxonomies()
 *
 * @param string $output Optional. The type of taxonomy output to return. Accepts 'names' or 'objects'.
 *                       Default 'names'.
 * @return array The names of all taxonomy of $object_type.
 */
function get_taxonomies_for_attachments($output = 'names')
{
}
/**
 * Create new GD image resource with transparency support
 *
 * @todo: Deprecate if possible.
 *
 * @since 2.9.0
 *
 * @param int $width  Image width in pixels.
 * @param int $height Image height in pixels..
 * @return resource The GD image resource.
 */
function wp_imagecreatetruecolor($width, $height)
{
}
/**
 * Based on a supplied width/height example, return the biggest possible dimensions based on the max width/height.
 *
 * @since 2.9.0
 *
 * @see wp_constrain_dimensions()
 *
 * @param int $example_width  The width of an example embed.
 * @param int $example_height The height of an example embed.
 * @param int $max_width      The maximum allowed width.
 * @param int $max_height     The maximum allowed height.
 * @return array The maximum possible width and height based on the example ratio.
 */
function wp_expand_dimensions($example_width, $example_height, $max_width, $max_height)
{
}
/**
 * Determines the maximum upload size allowed in php.ini.
 *
 * @since 2.5.0
 *
 * @return int Allowed upload size.
 */
function wp_max_upload_size()
{
}
/**
 * Returns a WP_Image_Editor instance and loads file into it.
 *
 * @since 3.5.0
 *
 * @param string $path Path to the file to load.
 * @param array  $args Optional. Additional arguments for retrieving the image editor.
 *                     Default empty array.
 * @return WP_Image_Editor|WP_Error The WP_Image_Editor object if successful, an WP_Error
 *                                  object otherwise.
 */
function wp_get_image_editor($path, $args = array())
{
}
/**
 * Tests whether there is an editor that supports a given mime type or methods.
 *
 * @since 3.5.0
 *
 * @param string|array $args Optional. Array of arguments to retrieve the image editor supports.
 *                           Default empty array.
 * @return bool True if an eligible editor is found; false otherwise.
 */
function wp_image_editor_supports($args = array())
{
}
/**
 * Tests which editors are capable of supporting the request.
 *
 * @ignore
 * @since 3.5.0
 *
 * @param array $args Optional. Array of arguments for choosing a capable editor. Default empty array.
 * @return string|false Class name for the first editor that claims to support the request. False if no
 *                     editor claims to support the request.
 */
function _wp_image_editor_choose($args = array())
{
}
/**
 * Prints default Plupload arguments.
 *
 * @since 3.4.0
 */
function wp_plupload_default_settings()
{
}
/**
 * Prepares an attachment post object for JS, where it is expected
 * to be JSON-encoded and fit into an Attachment model.
 *
 * @since 3.5.0
 *
 * @param mixed $attachment Attachment ID or object.
 * @return array|void Array of attachment details.
 */
function wp_prepare_attachment_for_js($attachment)
{
}
/**
 * Enqueues all scripts, styles, settings, and templates necessary to use
 * all media JS APIs.
 *
 * @since 3.5.0
 *
 * @global int       $content_width
 * @global wpdb      $wpdb
 * @global WP_Locale $wp_locale
 *
 * @param array $args {
 *     Arguments for enqueuing media scripts.
 *
 *     @type int|WP_Post A post object or ID.
 * }
 */
function wp_enqueue_media($args = array())
{
}
/**
 * Retrieves media attached to the passed post.
 *
 * @since 3.6.0
 *
 * @param string      $type Mime type.
 * @param int|WP_Post $post Optional. Post ID or WP_Post object. Default is global $post.
 * @return array Found attachments.
 */
function get_attached_media($type, $post = 0)
{
}
/**
 * Check the content blob for an audio, video, object, embed, or iframe tags.
 *
 * @since 3.6.0
 *
 * @param string $content A string which might contain media data.
 * @param array  $types   An array of media types: 'audio', 'video', 'object', 'embed', or 'iframe'.
 * @return array A list of found HTML media embeds.
 */
function get_media_embedded_in_content($content, $types = \null)
{
}
/**
 * Retrieves galleries from the passed post's content.
 *
 * @since 3.6.0
 *
 * @param int|WP_Post $post Post ID or object.
 * @param bool        $html Optional. Whether to return HTML or data in the array. Default true.
 * @return array A list of arrays, each containing gallery data and srcs parsed
 *               from the expanded shortcode.
 */
function get_post_galleries($post, $html = \true)
{
}
/**
 * Check a specified post's content for gallery and, if present, return the first
 *
 * @since 3.6.0
 *
 * @param int|WP_Post $post Optional. Post ID or WP_Post object. Default is global $post.
 * @param bool        $html Optional. Whether to return HTML or data. Default is true.
 * @return string|array Gallery data and srcs parsed from the expanded shortcode.
 */
function get_post_gallery($post = 0, $html = \true)
{
}
/**
 * Retrieve the image srcs from galleries from a post's content, if present
 *
 * @since 3.6.0
 *
 * @see get_post_galleries()
 *
 * @param int|WP_Post $post Optional. Post ID or WP_Post object. Default is global `$post`.
 * @return array A list of lists, each containing image srcs parsed.
 *               from an expanded shortcode
 */
function get_post_galleries_images($post = 0)
{
}
/**
 * Checks a post's content for galleries and return the image srcs for the first found gallery
 *
 * @since 3.6.0
 *
 * @see get_post_gallery()
 *
 * @param int|WP_Post $post Optional. Post ID or WP_Post object. Default is global `$post`.
 * @return array A list of a gallery's image srcs in order.
 */
function get_post_gallery_images($post = 0)
{
}
/**
 * Maybe attempts to generate attachment metadata, if missing.
 *
 * @since 3.9.0
 *
 * @param WP_Post $attachment Attachment object.
 */
function wp_maybe_generate_attachment_metadata($attachment)
{
}
/**
 * Tries to convert an attachment URL into a post ID.
 *
 * @since 4.0.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param string $url The URL to resolve.
 * @return int The found post ID, or 0 on failure.
 */
function attachment_url_to_postid($url)
{
}
/**
 * Returns the URLs for CSS files used in an iframe-sandbox'd TinyMCE media view.
 *
 * @since 4.0.0
 *
 * @return array The relevant CSS file URLs.
 */
function wpview_media_sandbox_styles()
{
}
/**
 * Registers the personal data exporter for media
 *
 * @param array   $exporters   An array of personal data exporters.
 * @return array  An array of personal data exporters.
 */
function wp_register_media_personal_data_exporter($exporters)
{
}
/**
 * Finds and exports attachments associated with an email address.
 *
 * @since 4.9.6
 *
 * @param  string $email_address The attachment owner email address.
 * @param  int    $page          Attachment page.
 * @return array  $return        An array of personal data.
 */
function wp_media_personal_data_exporter($email_address, $page = 1)
{
}
/**
 * Core Metadata API
 *
 * Functions for retrieving and manipulating metadata of various WordPress object types. Metadata
 * for an object is a represented by a simple key-value pair. Objects may contain multiple
 * metadata entries that share the same key and differ only in their value.
 *
 * @package WordPress
 * @subpackage Meta
 */
/**
 * Add metadata for the specified object.
 *
 * @since 2.9.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param string $meta_type  Type of object metadata is for (e.g., comment, post, term, or user).
 * @param int    $object_id  ID of the object metadata is for
 * @param string $meta_key   Metadata key
 * @param mixed  $meta_value Metadata value. Must be serializable if non-scalar.
 * @param bool   $unique     Optional, default is false.
 *                           Whether the specified metadata key should be unique for the object.
 *                           If true, and the object already has a value for the specified metadata key,
 *                           no change will be made.
 * @return int|false The meta ID on success, false on failure.
 */
function add_metadata($meta_type, $object_id, $meta_key, $meta_value, $unique = \false)
{
}
/**
 * Update metadata for the specified object. If no value already exists for the specified object
 * ID and metadata key, the metadata will be added.
 *
 * @since 2.9.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param string $meta_type  Type of object metadata is for (e.g., comment, post, term, or user).
 * @param int    $object_id  ID of the object metadata is for
 * @param string $meta_key   Metadata key
 * @param mixed  $meta_value Metadata value. Must be serializable if non-scalar.
 * @param mixed  $prev_value Optional. If specified, only update existing metadata entries with
 * 		                     the specified value. Otherwise, update all entries.
 * @return int|bool Meta ID if the key didn't exist, true on successful update, false on failure.
 */
function update_metadata($meta_type, $object_id, $meta_key, $meta_value, $prev_value = '')
{
}
/**
 * Delete metadata for the specified object.
 *
 * @since 2.9.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param string $meta_type  Type of object metadata is for (e.g., comment, post, term, or user).
 * @param int    $object_id  ID of the object metadata is for
 * @param string $meta_key   Metadata key
 * @param mixed  $meta_value Optional. Metadata value. Must be serializable if non-scalar. If specified, only delete
 *                           metadata entries with this value. Otherwise, delete all entries with the specified meta_key.
 *                           Pass `null, `false`, or an empty string to skip this check. (For backward compatibility,
 *                           it is not possible to pass an empty string to delete those entries with an empty string
 *                           for a value.)
 * @param bool   $delete_all Optional, default is false. If true, delete matching metadata entries for all objects,
 *                           ignoring the specified object_id. Otherwise, only delete matching metadata entries for
 *                           the specified object_id.
 * @return bool True on successful delete, false on failure.
 */
function delete_metadata($meta_type, $object_id, $meta_key, $meta_value = '', $delete_all = \false)
{
}
/**
 * Retrieve metadata for the specified object.
 *
 * @since 2.9.0
 *
 * @param string $meta_type Type of object metadata is for (e.g., comment, post, term, or user).
 * @param int    $object_id ID of the object metadata is for
 * @param string $meta_key  Optional. Metadata key. If not specified, retrieve all metadata for
 * 		                    the specified object.
 * @param bool   $single    Optional, default is false.
 *                          If true, return only the first value of the specified meta_key.
 *                          This parameter has no effect if meta_key is not specified.
 * @return mixed Single metadata value, or array of values
 */
function get_metadata($meta_type, $object_id, $meta_key = '', $single = \false)
{
}
/**
 * Determine if a meta key is set for a given object
 *
 * @since 3.3.0
 *
 * @param string $meta_type Type of object metadata is for (e.g., comment, post, term, or user).
 * @param int    $object_id ID of the object metadata is for
 * @param string $meta_key  Metadata key.
 * @return bool True of the key is set, false if not.
 */
function metadata_exists($meta_type, $object_id, $meta_key)
{
}
/**
 * Get meta data by meta ID
 *
 * @since 3.3.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param string $meta_type Type of object metadata is for (e.g., comment, post, term, or user).
 * @param int    $meta_id   ID for a specific meta row
 * @return object|false Meta object or false.
 */
function get_metadata_by_mid($meta_type, $meta_id)
{
}
/**
 * Update meta data by meta ID
 *
 * @since 3.3.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param string $meta_type  Type of object metadata is for (e.g., comment, post, term, or user).
 * @param int    $meta_id    ID for a specific meta row
 * @param string $meta_value Metadata value
 * @param string $meta_key   Optional, you can provide a meta key to update it
 * @return bool True on successful update, false on failure.
 */
function update_metadata_by_mid($meta_type, $meta_id, $meta_value, $meta_key = \false)
{
}
/**
 * Delete meta data by meta ID
 *
 * @since 3.3.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param string $meta_type Type of object metadata is for (e.g., comment, post, term, or user).
 * @param int    $meta_id   ID for a specific meta row
 * @return bool True on successful delete, false on failure.
 */
function delete_metadata_by_mid($meta_type, $meta_id)
{
}
/**
 * Update the metadata cache for the specified objects.
 *
 * @since 2.9.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param string    $meta_type  Type of object metadata is for (e.g., comment, post, term, or user).
 * @param int|array $object_ids Array or comma delimited list of object IDs to update cache for
 * @return array|false Metadata cache for the specified objects, or false on failure.
 */
function update_meta_cache($meta_type, $object_ids)
{
}
/**
 * Retrieves the queue for lazy-loading metadata.
 *
 * @since 4.5.0
 *
 * @return WP_Metadata_Lazyloader $lazyloader Metadata lazyloader queue.
 */
function wp_metadata_lazyloader()
{
}
/**
 * Given a meta query, generates SQL clauses to be appended to a main query.
 *
 * @since 3.2.0
 *
 * @see WP_Meta_Query
 *
 * @param array $meta_query         A meta query.
 * @param string $type              Type of meta.
 * @param string $primary_table     Primary database table name.
 * @param string $primary_id_column Primary ID column name.
 * @param object $context           Optional. The main query object
 * @return array Associative array of `JOIN` and `WHERE` SQL.
 */
function get_meta_sql($meta_query, $type, $primary_table, $primary_id_column, $context = \null)
{
}
/**
 * Retrieve the name of the metadata table for the specified object type.
 *
 * @since 2.9.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param string $type Type of object to get metadata table for (e.g., comment, post, term, or user).
 * @return string|false Metadata table name, or false if no metadata table exists
 */
function _get_meta_table($type)
{
}
/**
 * Determine whether a meta key is protected.
 *
 * @since 3.1.3
 *
 * @param string      $meta_key  Meta key
 * @param string|null $meta_type Optional. Type of object metadata is for (e.g., comment, post,
 *                               term, or user).
 * @return bool True if the key is protected, false otherwise.
 */
function is_protected_meta($meta_key, $meta_type = \null)
{
}
/**
 * Sanitize meta value.
 *
 * @since 3.1.3
 * @since 4.9.8 The `$object_subtype` parameter was added.
 *
 * @param string $meta_key       Meta key.
 * @param mixed  $meta_value     Meta value to sanitize.
 * @param string $object_type    Type of object the meta is registered to.
 *
 * @return mixed Sanitized $meta_value.
 */
function sanitize_meta($meta_key, $meta_value, $object_type, $object_subtype = '')
{
}
/**
 * Registers a meta key.
 *
 * It is recommended to register meta keys for a specific combination of object type and object subtype. If passing
 * an object subtype is omitted, the meta key will be registered for the entire object type, however it can be partly
 * overridden in case a more specific meta key of the same name exists for the same object type and a subtype.
 *
 * If an object type does not support any subtypes, such as users or comments, you should commonly call this function
 * without passing a subtype.
 *
 * @since 3.3.0
 * @since 4.6.0 {@link https://core.trac.wordpress.org/ticket/35658 Modified
 *              to support an array of data to attach to registered meta keys}. Previous arguments for
 *              `$sanitize_callback` and `$auth_callback` have been folded into this array.
 * @since 4.9.8 The `$object_subtype` argument was added to the arguments array.
 *
 * @param string $object_type    Type of object this meta is registered to.
 * @param string $meta_key       Meta key to register.
 * @param array  $args {
 *     Data used to describe the meta key when registered.
 *
 *     @type string $object_subtype    A subtype; e.g. if the object type is "post", the post type. If left empty,
 *                                     the meta key will be registered on the entire object type. Default empty.
 *     @type string $type              The type of data associated with this meta key.
 *                                     Valid values are 'string', 'boolean', 'integer', and 'number'.
 *     @type string $description       A description of the data attached to this meta key.
 *     @type bool   $single            Whether the meta key has one value per object, or an array of values per object.
 *     @type string $sanitize_callback A function or method to call when sanitizing `$meta_key` data.
 *     @type string $auth_callback     Optional. A function or method to call when performing edit_post_meta, add_post_meta, and delete_post_meta capability checks.
 *     @type bool   $show_in_rest      Whether data associated with this meta key can be considered public.
 * }
 * @param string|array $deprecated Deprecated. Use `$args` instead.
 *
 * @return bool True if the meta key was successfully registered in the global array, false if not.
 *                       Registering a meta key with distinct sanitize and auth callbacks will fire those
 *                       callbacks, but will not add to the global registry.
 */
function register_meta($object_type, $meta_key, $args, $deprecated = \null)
{
}
/**
 * Checks if a meta key is registered.
 *
 * @since 4.6.0
 * @since 4.9.8 The `$object_subtype` parameter was added.
 *
 * @param string $object_type    The type of object.
 * @param string $meta_key       The meta key.
 * @param string $object_subtype Optional. The subtype of the object type.
 *
 * @return bool True if the meta key is registered to the object type and, if provided,
 *              the object subtype. False if not.
 */
function registered_meta_key_exists($object_type, $meta_key, $object_subtype = '')
{
}
/**
 * Unregisters a meta key from the list of registered keys.
 *
 * @since 4.6.0
 * @since 4.9.8 The `$object_subtype` parameter was added.
 *
 * @param string $object_type    The type of object.
 * @param string $meta_key       The meta key.
 * @param string $object_subtype Optional. The subtype of the object type.
 * @return bool True if successful. False if the meta key was not registered.
 */
function unregister_meta_key($object_type, $meta_key, $object_subtype = '')
{
}
/**
 * Retrieves a list of registered meta keys for an object type.
 *
 * @since 4.6.0
 * @since 4.9.8 The `$object_subtype` parameter was added.
 *
 * @param string $object_type    The type of object. Post, comment, user, term.
 * @param string $object_subtype Optional. The subtype of the object type.
 * @return array List of registered meta keys.
 */
function get_registered_meta_keys($object_type, $object_subtype = '')
{
}
/**
 * Retrieves registered metadata for a specified object.
 *
 * The results include both meta that is registered specifically for the
 * object's subtype and meta that is registered for the entire object type.
 *
 * @since 4.6.0
 *
 * @param string $object_type Type of object to request metadata for. (e.g. comment, post, term, user)
 * @param int    $object_id   ID of the object the metadata is for.
 * @param string $meta_key    Optional. Registered metadata key. If not specified, retrieve all registered
 *                            metadata for the specified object.
 * @return mixed A single value or array of values for a key if specified. An array of all registered keys
 *               and values for an object ID if not. False if a given $meta_key is not registered.
 */
function get_registered_metadata($object_type, $object_id, $meta_key = '')
{
}
/**
 * Filter out `register_meta()` args based on a whitelist.
 * `register_meta()` args may change over time, so requiring the whitelist
 * to be explicitly turned off is a warranty seal of sorts.
 *
 * @access private
 * @since 4.6.0
 *
 * @param array $args         Arguments from `register_meta()`.
 * @param array $default_args Default arguments for `register_meta()`.
 *
 * @return array Filtered arguments.
 */
function _wp_register_meta_args_whitelist($args, $default_args)
{
}
/**
 * Returns the object subtype for a given object ID of a specific type.
 *
 * @since 4.9.8
 *
 * @param string $object_type Type of object to request metadata for. (e.g. comment, post, term, user)
 * @param int    $object_id   ID of the object to retrieve its subtype.
 * @return string The object subtype or an empty string if unspecified subtype.
 */
function get_object_subtype($object_type, $object_id)
{
}
/**
 * Site/blog functions that work with the blogs table and related data.
 *
 * @package WordPress
 * @subpackage Multisite
 * @since MU (3.0.0)
 */
/**
 * Update the last_updated field for the current site.
 *
 * @since MU (3.0.0)
 */
function wpmu_update_blogs_date()
{
}
/**
 * Get a full blog URL, given a blog id.
 *
 * @since MU (3.0.0)
 *
 * @param int $blog_id Blog ID
 * @return string Full URL of the blog if found. Empty string if not.
 */
function get_blogaddress_by_id($blog_id)
{
}
/**
 * Get a full blog URL, given a blog name.
 *
 * @since MU (3.0.0)
 *
 * @param string $blogname The (subdomain or directory) name
 * @return string
 */
function get_blogaddress_by_name($blogname)
{
}
/**
 * Retrieves a sites ID given its (subdomain or directory) slug.
 *
 * @since MU (3.0.0)
 * @since 4.7.0 Converted to use get_sites().
 *
 * @param string $slug A site's slug.
 * @return int|null The site ID, or null if no site is found for the given slug.
 */
function get_id_from_blogname($slug)
{
}
/**
 * Retrieve the details for a blog from the blogs table and blog options.
 *
 * @since MU (3.0.0)
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param int|string|array $fields  Optional. A blog ID, a blog slug, or an array of fields to query against.
 *                                  If not specified the current blog ID is used.
 * @param bool             $get_all Whether to retrieve all details or only the details in the blogs table.
 *                                  Default is true.
 * @return WP_Site|false Blog details on success. False on failure.
 */
function get_blog_details($fields = \null, $get_all = \true)
{
}
/**
 * Clear the blog details cache.
 *
 * @since MU (3.0.0)
 *
 * @param int $blog_id Optional. Blog ID. Defaults to current blog.
 */
function refresh_blog_details($blog_id = 0)
{
}
/**
 * Update the details for a blog. Updates the blogs table for a given blog id.
 *
 * @since MU (3.0.0)
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param int   $blog_id Blog ID
 * @param array $details Array of details keyed by blogs table field names.
 * @return bool True if update succeeds, false otherwise.
 */
function update_blog_details($blog_id, $details = array())
{
}
/**
 * Clean the blog cache
 *
 * @since 3.5.0
 *
 * @global bool $_wp_suspend_cache_invalidation
 *
 * @param WP_Site|int $blog The site object or ID to be cleared from cache.
 */
function clean_blog_cache($blog)
{
}
/**
 * Cleans the site details cache for a site.
 *
 * @since 4.7.4
 *
 * @param int $site_id Optional. Site ID. Default is the current site ID.
 */
function clean_site_details_cache($site_id = 0)
{
}
/**
 * Retrieves site data given a site ID or site object.
 *
 * Site data will be cached and returned after being passed through a filter.
 * If the provided site is empty, the current site global will be used.
 *
 * @since 4.6.0
 *
 * @param WP_Site|int|null $site Optional. Site to retrieve. Default is the current site.
 * @return WP_Site|null The site object or null if not found.
 */
function get_site($site = \null)
{
}
/**
 * Adds any sites from the given ids to the cache that do not already exist in cache.
 *
 * @since 4.6.0
 * @access private
 *
 * @see update_site_cache()
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param array $ids ID list.
 */
function _prime_site_caches($ids)
{
}
/**
 * Updates sites in cache.
 *
 * @since 4.6.0
 *
 * @param array $sites Array of site objects.
 */
function update_site_cache($sites)
{
}
/**
 * Retrieves a list of sites matching requested arguments.
 *
 * @since 4.6.0
 * @since 4.8.0 Introduced the 'lang_id', 'lang__in', and 'lang__not_in' parameters.
 *
 * @see WP_Site_Query::parse_query()
 *
 * @param string|array $args {
 *     Optional. Array or query string of site query parameters. Default empty.
 *
 *     @type array        $site__in          Array of site IDs to include. Default empty.
 *     @type array        $site__not_in      Array of site IDs to exclude. Default empty.
 *     @type bool         $count             Whether to return a site count (true) or array of site objects.
 *                                           Default false.
 *     @type array        $date_query        Date query clauses to limit sites by. See WP_Date_Query.
 *                                           Default null.
 *     @type string       $fields            Site fields to return. Accepts 'ids' (returns an array of site IDs)
 *                                           or empty (returns an array of complete site objects). Default empty.
 *     @type int          $ID                A site ID to only return that site. Default empty.
 *     @type int          $number            Maximum number of sites to retrieve. Default 100.
 *     @type int          $offset            Number of sites to offset the query. Used to build LIMIT clause.
 *                                           Default 0.
 *     @type bool         $no_found_rows     Whether to disable the `SQL_CALC_FOUND_ROWS` query. Default true.
 *     @type string|array $orderby           Site status or array of statuses. Accepts 'id', 'domain', 'path',
 *                                           'network_id', 'last_updated', 'registered', 'domain_length',
 *                                           'path_length', 'site__in' and 'network__in'. Also accepts false,
 *                                           an empty array, or 'none' to disable `ORDER BY` clause.
 *                                           Default 'id'.
 *     @type string       $order             How to order retrieved sites. Accepts 'ASC', 'DESC'. Default 'ASC'.
 *     @type int          $network_id        Limit results to those affiliated with a given network ID. If 0,
 *                                           include all networks. Default 0.
 *     @type array        $network__in       Array of network IDs to include affiliated sites for. Default empty.
 *     @type array        $network__not_in   Array of network IDs to exclude affiliated sites for. Default empty.
 *     @type string       $domain            Limit results to those affiliated with a given domain. Default empty.
 *     @type array        $domain__in        Array of domains to include affiliated sites for. Default empty.
 *     @type array        $domain__not_in    Array of domains to exclude affiliated sites for. Default empty.
 *     @type string       $path              Limit results to those affiliated with a given path. Default empty.
 *     @type array        $path__in          Array of paths to include affiliated sites for. Default empty.
 *     @type array        $path__not_in      Array of paths to exclude affiliated sites for. Default empty.
 *     @type int          $public            Limit results to public sites. Accepts '1' or '0'. Default empty.
 *     @type int          $archived          Limit results to archived sites. Accepts '1' or '0'. Default empty.
 *     @type int          $mature            Limit results to mature sites. Accepts '1' or '0'. Default empty.
 *     @type int          $spam              Limit results to spam sites. Accepts '1' or '0'. Default empty.
 *     @type int          $deleted           Limit results to deleted sites. Accepts '1' or '0'. Default empty.
 *     @type int          $lang_id           Limit results to a language ID. Default empty.
 *     @type array        $lang__in          Array of language IDs to include affiliated sites for. Default empty.
 *     @type array        $lang__not_in      Array of language IDs to exclude affiliated sites for. Default empty.
 *     @type string       $search            Search term(s) to retrieve matching sites for. Default empty.
 *     @type array        $search_columns    Array of column names to be searched. Accepts 'domain' and 'path'.
 *                                           Default empty array.
 *     @type bool         $update_site_cache Whether to prime the cache for found sites. Default true.
 * }
 * @return array|int List of WP_Site objects, a list of site ids when 'fields' is set to 'ids',
 *                   or the number of sites when 'count' is passed as a query var.
 */
function get_sites($args = array())
{
}
/**
 * Retrieve option value for a given blog id based on name of option.
 *
 * If the option does not exist or does not have a value, then the return value
 * will be false. This is useful to check whether you need to install an option
 * and is commonly used during installation of plugin options and to test
 * whether upgrading is required.
 *
 * If the option was serialized then it will be unserialized when it is returned.
 *
 * @since MU (3.0.0)
 *
 * @param int    $id      A blog ID. Can be null to refer to the current blog.
 * @param string $option  Name of option to retrieve. Expected to not be SQL-escaped.
 * @param mixed  $default Optional. Default value to return if the option does not exist.
 * @return mixed Value set for the option.
 */
function get_blog_option($id, $option, $default = \false)
{
}
/**
 * Add a new option for a given blog id.
 *
 * You do not need to serialize values. If the value needs to be serialized, then
 * it will be serialized before it is inserted into the database. Remember,
 * resources can not be serialized or added as an option.
 *
 * You can create options without values and then update the values later.
 * Existing options will not be updated and checks are performed to ensure that you
 * aren't adding a protected WordPress option. Care should be taken to not name
 * options the same as the ones which are protected.
 *
 * @since MU (3.0.0)
 *
 * @param int    $id     A blog ID. Can be null to refer to the current blog.
 * @param string $option Name of option to add. Expected to not be SQL-escaped.
 * @param mixed  $value  Optional. Option value, can be anything. Expected to not be SQL-escaped.
 * @return bool False if option was not added and true if option was added.
 */
function add_blog_option($id, $option, $value)
{
}
/**
 * Removes option by name for a given blog id. Prevents removal of protected WordPress options.
 *
 * @since MU (3.0.0)
 *
 * @param int    $id     A blog ID. Can be null to refer to the current blog.
 * @param string $option Name of option to remove. Expected to not be SQL-escaped.
 * @return bool True, if option is successfully deleted. False on failure.
 */
function delete_blog_option($id, $option)
{
}
/**
 * Update an option for a particular blog.
 *
 * @since MU (3.0.0)
 *
 * @param int    $id         The blog id.
 * @param string $option     The option key.
 * @param mixed  $value      The option value.
 * @param mixed  $deprecated Not used.
 * @return bool True on success, false on failure.
 */
function update_blog_option($id, $option, $value, $deprecated = \null)
{
}
/**
 * Switch the current blog.
 *
 * This function is useful if you need to pull posts, or other information,
 * from other blogs. You can switch back afterwards using restore_current_blog().
 *
 * Things that aren't switched:
 *  - plugins. See #14941
 *
 * @see restore_current_blog()
 * @since MU (3.0.0)
 *
 * @global wpdb            $wpdb
 * @global int             $blog_id
 * @global array           $_wp_switched_stack
 * @global bool            $switched
 * @global string          $table_prefix
 * @global WP_Object_Cache $wp_object_cache
 *
 * @param int  $new_blog   The id of the blog you want to switch to. Default: current blog
 * @param bool $deprecated Deprecated argument
 * @return true Always returns True.
 */
function switch_to_blog($new_blog, $deprecated = \null)
{
}
/**
 * Restore the current blog, after calling switch_to_blog()
 *
 * @see switch_to_blog()
 * @since MU (3.0.0)
 *
 * @global wpdb            $wpdb
 * @global array           $_wp_switched_stack
 * @global int             $blog_id
 * @global bool            $switched
 * @global string          $table_prefix
 * @global WP_Object_Cache $wp_object_cache
 *
 * @return bool True on success, false if we're already on the current blog
 */
function restore_current_blog()
{
}
/**
 * Switches the initialized roles and current user capabilities to another site.
 *
 * @since 4.9.0
 *
 * @param int $new_site_id New site ID.
 * @param int $old_site_id Old site ID.
 */
function wp_switch_roles_and_user($new_site_id, $old_site_id)
{
}
/**
 * Determines if switch_to_blog() is in effect
 *
 * @since 3.5.0
 *
 * @global array $_wp_switched_stack
 *
 * @return bool True if switched, false otherwise.
 */
function ms_is_switched()
{
}
/**
 * Check if a particular blog is archived.
 *
 * @since MU (3.0.0)
 *
 * @param int $id The blog id
 * @return string Whether the blog is archived or not
 */
function is_archived($id)
{
}
/**
 * Update the 'archived' status of a particular blog.
 *
 * @since MU (3.0.0)
 *
 * @param int    $id       The blog id
 * @param string $archived The new status
 * @return string $archived
 */
function update_archived($id, $archived)
{
}
/**
 * Update a blog details field.
 *
 * @since MU (3.0.0)
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param int    $blog_id BLog ID
 * @param string $pref    A field name
 * @param string $value   Value for $pref
 * @param null   $deprecated
 * @return string|false $value
 */
function update_blog_status($blog_id, $pref, $value, $deprecated = \null)
{
}
/**
 * Get a blog details field.
 *
 * @since MU (3.0.0)
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param int    $id   The blog id
 * @param string $pref A field name
 * @return bool|string|null $value
 */
function get_blog_status($id, $pref)
{
}
/**
 * Get a list of most recently updated blogs.
 *
 * @since MU (3.0.0)
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param mixed $deprecated Not used
 * @param int   $start      The offset
 * @param int   $quantity   The maximum number of blogs to retrieve. Default is 40.
 * @return array The list of blogs
 */
function get_last_updated($deprecated = '', $start = 0, $quantity = 40)
{
}
/**
 * Retrieves a list of networks.
 *
 * @since 4.6.0
 *
 * @param string|array $args Optional. Array or string of arguments. See WP_Network_Query::parse_query()
 *                           for information on accepted arguments. Default empty array.
 * @return array|int List of WP_Network objects, a list of network ids when 'fields' is set to 'ids',
 *                   or the number of networks when 'count' is passed as a query var.
 */
function get_networks($args = array())
{
}
/**
 * Retrieves network data given a network ID or network object.
 *
 * Network data will be cached and returned after being passed through a filter.
 * If the provided network is empty, the current network global will be used.
 *
 * @since 4.6.0
 *
 * @global WP_Network $current_site
 *
 * @param WP_Network|int|null $network Optional. Network to retrieve. Default is the current network.
 * @return WP_Network|null The network object or null if not found.
 */
function get_network($network = \null)
{
}
/**
 * Removes a network from the object cache.
 *
 * @since 4.6.0
 *
 * @global bool $_wp_suspend_cache_invalidation
 *
 * @param int|array $ids Network ID or an array of network IDs to remove from cache.
 */
function clean_network_cache($ids)
{
}
/**
 * Updates the network cache of given networks.
 *
 * Will add the networks in $networks to the cache. If network ID already exists
 * in the network cache then it will not be updated. The network is added to the
 * cache using the network group with the key using the ID of the networks.
 *
 * @since 4.6.0
 *
 * @param array $networks Array of network row objects.
 */
function update_network_cache($networks)
{
}
/**
 * Adds any networks from the given IDs to the cache that do not already exist in cache.
 *
 * @since 4.6.0
 * @access private
 *
 * @see update_network_cache()
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param array $network_ids Array of network IDs.
 */
function _prime_network_caches($network_ids)
{
}
/**
 * Handler for updating the site's last updated date when a post is published or
 * an already published post is changed.
 *
 * @since 3.3.0
 *
 * @param string $new_status The new post status
 * @param string $old_status The old post status
 * @param object $post       Post object
 */
function _update_blog_date_on_post_publish($new_status, $old_status, $post)
{
}
/**
 * Handler for updating the current site's last updated date when a published
 * post is deleted.
 *
 * @since 3.4.0
 *
 * @param int $post_id Post ID
 */
function _update_blog_date_on_post_delete($post_id)
{
}
/**
 * Handler for updating the current site's posts count when a post is deleted.
 *
 * @since 4.0.0
 *
 * @param int $post_id Post ID.
 */
function _update_posts_count_on_delete($post_id)
{
}
/**
 * Handler for updating the current site's posts count when a post status changes.
 *
 * @since 4.0.0
 * @since 4.9.0 Added the `$post` parameter.
 *
 * @param string  $new_status The status the post is changing to.
 * @param string  $old_status The status the post is changing from.
 * @param WP_Post $post       Post object
 */
function _update_posts_count_on_transition_post_status($new_status, $old_status, $post = \null)
{
}
/**
 * Defines constants and global variables that can be overridden, generally in wp-config.php.
 *
 * @package WordPress
 * @subpackage Multisite
 * @since 3.0.0
 */
/**
 * Defines Multisite upload constants.
 *
 * Exists for backward compatibility with legacy file-serving through
 * wp-includes/ms-files.php (wp-content/blogs.php in MU).
 *
 * @since 3.0.0
 */
function ms_upload_constants()
{
}
/**
 * Defines Multisite cookie constants.
 *
 * @since 3.0.0
 */
function ms_cookie_constants()
{
}
/**
 * Defines Multisite file constants.
 *
 * Exists for backward compatibility with legacy file-serving through
 * wp-includes/ms-files.php (wp-content/blogs.php in MU).
 *
 * @since 3.0.0
 */
function ms_file_constants()
{
}
/**
 * Defines Multisite subdomain constants and handles warnings and notices.
 *
 * VHOST is deprecated in favor of SUBDOMAIN_INSTALL, which is a bool.
 *
 * On first call, the constants are checked and defined. On second call,
 * we will have translations loaded and can trigger warnings easily.
 *
 * @since 3.0.0
 *
 * @staticvar bool $subdomain_error
 * @staticvar bool $subdomain_error_warn
 */
function ms_subdomain_constants()
{
}
/**
 * Deprecated functions from WordPress MU and the multisite feature. You shouldn't
 * use these functions and look for the alternatives instead. The functions will be
 * removed in a later version.
 *
 * @package WordPress
 * @subpackage Deprecated
 * @since 3.0.0
 */
/*
 * Deprecated functions come here to die.
 */
/**
 * Get the "dashboard blog", the blog where users without a blog edit their profile data.
 * Dashboard blog functionality was removed in WordPress 3.1, replaced by the user admin.
 *
 * @since MU (3.0.0)
 * @deprecated 3.1.0 Use get_site()
 * @see get_site()
 *
 * @return WP_Site Current site object.
 */
function get_dashboard_blog()
{
}
/**
 * Generates a random password.
 *
 * @since MU (3.0.0)
 * @deprecated 3.0.0 Use wp_generate_password()
 * @see wp_generate_password()
 *
 * @param int $len Optional. The length of password to generate. Default 8.
 */
function generate_random_password($len = 8)
{
}
/**
 * Determine if user is a site admin.
 *
 * Plugins should use is_multisite() instead of checking if this function exists
 * to determine if multisite is enabled.
 *
 * This function must reside in a file included only if is_multisite() due to
 * legacy function_exists() checks to determine if multisite is enabled.
 *
 * @since MU (3.0.0)
 * @deprecated 3.0.0 Use is_super_admin()
 * @see is_super_admin()
 *
 * @param string $user_login Optional. Username for the user to check. Default empty.
 */
function is_site_admin($user_login = '')
{
}
/**
 * Deprecated functionality to gracefully fail.
 *
 * @since MU (3.0.0)
 * @deprecated 3.0.0 Use wp_die()
 * @see wp_die()
 */
function graceful_fail($message)
{
}
/**
 * Deprecated functionality to retrieve user information.
 *
 * @since MU (3.0.0)
 * @deprecated 3.0.0 Use get_user_by()
 * @see get_user_by()
 *
 * @param string $username Username.
 */
function get_user_details($username)
{
}
/**
 * Deprecated functionality to clear the global post cache.
 *
 * @since MU (3.0.0)
 * @deprecated 3.0.0 Use clean_post_cache()
 * @see clean_post_cache()
 *
 * @param int $post_id Post ID.
 */
function clear_global_post_cache($post_id)
{
}
/**
 * Deprecated functionality to determin if the current site is the main site.
 *
 * @since MU (3.0.0)
 * @deprecated 3.0.0 Use is_main_site()
 * @see is_main_site()
 */
function is_main_blog()
{
}
/**
 * Deprecated functionality to validate an email address.
 *
 * @since MU (3.0.0)
 * @deprecated 3.0.0 Use is_email()
 * @see is_email()
 *
 * @param string $email        Email address to verify.
 * @param bool   $check_domain Deprecated.
 * @return string|bool Either false or the valid email address.
 */
function validate_email($email, $check_domain = \true)
{
}
/**
 * Deprecated functionality to retrieve a list of all sites.
 *
 * @since MU (3.0.0)
 * @deprecated 3.0.0 Use wp_get_sites()
 * @see wp_get_sites()
 *
 * @param int    $start      Optional. Offset for retrieving the blog list. Default 0.
 * @param int    $num        Optional. Number of blogs to list. Default 10.
 * @param string $deprecated Unused.
 */
function get_blog_list($start = 0, $num = 10, $deprecated = '')
{
}
/**
 * Deprecated functionality to retrieve a list of the most active sites.
 *
 * @since MU (3.0.0)
 * @deprecated 3.0.0
 *
 * @param int  $num     Optional. Number of activate blogs to retrieve. Default 10.
 * @param bool $display Optional. Whether or not to display the most active blogs list. Default true.
 * @return array List of "most active" sites.
 */
function get_most_active_blogs($num = 10, $display = \true)
{
}
/**
 * Redirect a user based on $_GET or $_POST arguments.
 *
 * The function looks for redirect arguments in the following order:
 * 1) $_GET['ref']
 * 2) $_POST['ref']
 * 3) $_SERVER['HTTP_REFERER']
 * 4) $_GET['redirect']
 * 5) $_POST['redirect']
 * 6) $url
 *
 * @since MU (3.0.0)
 * @deprecated 3.3.0 Use wp_redirect()
 * @see wp_redirect()
 *
 * @param string $url Optional. Redirect URL. Default empty.
 */
function wpmu_admin_do_redirect($url = '')
{
}
/**
 * Adds an 'updated=true' argument to a URL.
 *
 * @since MU (3.0.0)
 * @deprecated 3.3.0 Use add_query_arg()
 * @see add_query_arg()
 *
 * @param string $url Optional. Redirect URL. Default empty.
 * @return string
 */
function wpmu_admin_redirect_add_updated_param($url = '')
{
}
/**
 * Get a numeric user ID from either an email address or a login.
 *
 * A numeric string is considered to be an existing user ID
 * and is simply returned as such.
 *
 * @since MU (3.0.0)
 * @deprecated 3.6.0 Use get_user_by()
 * @see get_user_by()
 *
 * @param string $string Either an email address or a login.
 * @return int
 */
function get_user_id_from_string($string)
{
}
/**
 * Get a full blog URL, given a domain and a path.
 *
 * @since MU (3.0.0)
 * @deprecated 3.7.0
 *
 * @param string $domain
 * @param string $path
 * @return string
 */
function get_blogaddress_by_domain($domain, $path)
{
}
/**
 * Create an empty blog.
 *
 * @since MU (3.0.0)
 * @deprecated 4.4.0
 *
 * @param string $domain       The new blog's domain.
 * @param string $path         The new blog's path.
 * @param string $weblog_title The new blog's title.
 * @param int    $site_id      Optional. Defaults to 1.
 * @return string|int The ID of the newly created blog
 */
function create_empty_blog($domain, $path, $weblog_title, $site_id = 1)
{
}
/**
 * Get the admin for a domain/path combination.
 *
 * @since MU (3.0.0)
 * @deprecated 4.4.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param string $domain Optional. Network domain.
 * @param string $path   Optional. Network path.
 * @return array|false The network admins.
 */
function get_admin_users_for_domain($domain = '', $path = '')
{
}
/**
 * Return an array of sites for a network or networks.
 *
 * @since 3.7.0
 * @deprecated 4.6.0 Use get_sites()
 * @see get_sites()
 *
 * @param array $args {
 *     Array of default arguments. Optional.
 *
 *     @type int|array $network_id A network ID or array of network IDs. Set to null to retrieve sites
 *                                 from all networks. Defaults to current network ID.
 *     @type int       $public     Retrieve public or non-public sites. Default null, for any.
 *     @type int       $archived   Retrieve archived or non-archived sites. Default null, for any.
 *     @type int       $mature     Retrieve mature or non-mature sites. Default null, for any.
 *     @type int       $spam       Retrieve spam or non-spam sites. Default null, for any.
 *     @type int       $deleted    Retrieve deleted or non-deleted sites. Default null, for any.
 *     @type int       $limit      Number of sites to limit the query to. Default 100.
 *     @type int       $offset     Exclude the first x sites. Used in combination with the $limit parameter. Default 0.
 * }
 * @return array An empty array if the installation is considered "large" via wp_is_large_network(). Otherwise,
 *               an associative array of site data arrays, each containing the site (network) ID, blog ID,
 *               site domain and path, dates registered and modified, and the language ID. Also, boolean
 *               values for whether the site is public, archived, mature, spam, and/or deleted.
 */
function wp_get_sites($args = array())
{
}
/**
 * Check whether a usermeta key has to do with the current blog.
 *
 * @since MU (3.0.0)
 * @deprecated 4.9.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param string $key
 * @param int    $user_id Optional. Defaults to current user.
 * @param int    $blog_id Optional. Defaults to current blog.
 * @return bool
 */
function is_user_option_local($key, $user_id = 0, $blog_id = 0)
{
}
/**
 * Multisite WordPress API
 *
 * @package WordPress
 * @subpackage Multisite
 * @since 3.0.0
 */
/**
 * Gets the network's site and user counts.
 *
 * @since MU (3.0.0)
 *
 * @return array Site and user count for the network.
 */
function get_sitestats()
{
}
/**
 * Get one of a user's active blogs
 *
 * Returns the user's primary blog, if they have one and
 * it is active. If it's inactive, function returns another
 * active blog of the user. If none are found, the user
 * is added as a Subscriber to the Dashboard Blog and that blog
 * is returned.
 *
 * @since MU (3.0.0)
 *
 * @param int $user_id The unique ID of the user
 * @return WP_Site|void The blog object
 */
function get_active_blog_for_user($user_id)
{
}
/**
 * The number of active users in your installation.
 *
 * The count is cached and updated twice daily. This is not a live count.
 *
 * @since MU (3.0.0)
 * @since 4.8.0 The $network_id parameter has been added.
 *
 * @param int|null $network_id ID of the network. Default is the current network.
 * @return int Number of active users on the network.
 */
function get_user_count($network_id = \null)
{
}
/**
 * The number of active sites on your installation.
 *
 * The count is cached and updated twice daily. This is not a live count.
 *
 * @since MU (3.0.0)
 * @since 3.7.0 The $network_id parameter has been deprecated.
 * @since 4.8.0 The $network_id parameter is now being used.
 *
 * @param int|null $network_id ID of the network. Default is the current network.
 * @return int Number of active sites on the network.
 */
function get_blog_count($network_id = \null)
{
}
/**
 * Get a blog post from any site on the network.
 *
 * @since MU (3.0.0)
 *
 * @param int $blog_id ID of the blog.
 * @param int $post_id ID of the post you're looking for.
 * @return WP_Post|null WP_Post on success or null on failure
 */
function get_blog_post($blog_id, $post_id)
{
}
/**
 * Adds a user to a blog.
 *
 * Use the {@see 'add_user_to_blog'} action to fire an event when users are added to a blog.
 *
 * @since MU (3.0.0)
 *
 * @param int    $blog_id ID of the blog you're adding the user to.
 * @param int    $user_id ID of the user you're adding.
 * @param string $role    The role you want the user to have
 * @return true|WP_Error
 */
function add_user_to_blog($blog_id, $user_id, $role)
{
}
/**
 * Remove a user from a blog.
 *
 * Use the {@see 'remove_user_from_blog'} action to fire an event when
 * users are removed from a blog.
 *
 * Accepts an optional `$reassign` parameter, if you want to
 * reassign the user's blog posts to another user upon removal.
 *
 * @since MU (3.0.0)
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param int    $user_id  ID of the user you're removing.
 * @param int    $blog_id  ID of the blog you're removing the user from.
 * @param string $reassign Optional. A user to whom to reassign posts.
 * @return true|WP_Error
 */
function remove_user_from_blog($user_id, $blog_id = '', $reassign = '')
{
}
/**
 * Get the permalink for a post on another blog.
 *
 * @since MU (3.0.0) 1.0
 *
 * @param int $blog_id ID of the source blog.
 * @param int $post_id ID of the desired post.
 * @return string The post's permalink
 */
function get_blog_permalink($blog_id, $post_id)
{
}
/**
 * Get a blog's numeric ID from its URL.
 *
 * On a subdirectory installation like example.com/blog1/,
 * $domain will be the root 'example.com' and $path the
 * subdirectory '/blog1/'. With subdomains like blog1.example.com,
 * $domain is 'blog1.example.com' and $path is '/'.
 *
 * @since MU (3.0.0)
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param string $domain
 * @param string $path   Optional. Not required for subdomain installations.
 * @return int 0 if no blog found, otherwise the ID of the matching blog
 */
function get_blog_id_from_url($domain, $path = '/')
{
}
// Admin functions
/**
 * Checks an email address against a list of banned domains.
 *
 * This function checks against the Banned Email Domains list
 * at wp-admin/network/settings.php. The check is only run on
 * self-registrations; user creation at wp-admin/network/users.php
 * bypasses this check.
 *
 * @since MU (3.0.0)
 *
 * @param string $user_email The email provided by the user at registration.
 * @return bool Returns true when the email address is banned.
 */
function is_email_address_unsafe($user_email)
{
}
/**
 * Sanitize and validate data required for a user sign-up.
 *
 * Verifies the validity and uniqueness of user names and user email addresses,
 * and checks email addresses against admin-provided domain whitelists and blacklists.
 *
 * The {@see 'wpmu_validate_user_signup'} hook provides an easy way to modify the sign-up
 * process. The value $result, which is passed to the hook, contains both the user-provided
 * info and the error messages created by the function. {@see 'wpmu_validate_user_signup'}
 * allows you to process the data in any way you'd like, and unset the relevant errors if
 * necessary.
 *
 * @since MU (3.0.0)
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param string $user_name  The login name provided by the user.
 * @param string $user_email The email provided by the user.
 * @return array Contains username, email, and error messages.
 */
function wpmu_validate_user_signup($user_name, $user_email)
{
}
/**
 * Processes new site registrations.
 *
 * Checks the data provided by the user during blog signup. Verifies
 * the validity and uniqueness of blog paths and domains.
 *
 * This function prevents the current user from registering a new site
 * with a blogname equivalent to another user's login name. Passing the
 * $user parameter to the function, where $user is the other user, is
 * effectively an override of this limitation.
 *
 * Filter {@see 'wpmu_validate_blog_signup'} if you want to modify
 * the way that WordPress validates new site signups.
 *
 * @since MU (3.0.0)
 *
 * @global wpdb   $wpdb
 * @global string $domain
 *
 * @param string         $blogname   The blog name provided by the user. Must be unique.
 * @param string         $blog_title The blog title provided by the user.
 * @param WP_User|string $user       Optional. The user object to check against the new site name.
 * @return array Contains the new site data and error messages.
 */
function wpmu_validate_blog_signup($blogname, $blog_title, $user = '')
{
}
/**
 * Record site signup information for future activation.
 *
 * @since MU (3.0.0)
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param string $domain     The requested domain.
 * @param string $path       The requested path.
 * @param string $title      The requested site title.
 * @param string $user       The user's requested login name.
 * @param string $user_email The user's email address.
 * @param array  $meta       Optional. Signup meta data. By default, contains the requested privacy setting and lang_id.
 */
function wpmu_signup_blog($domain, $path, $title, $user, $user_email, $meta = array())
{
}
/**
 * Record user signup information for future activation.
 *
 * This function is used when user registration is open but
 * new site registration is not.
 *
 * @since MU (3.0.0)
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param string $user       The user's requested login name.
 * @param string $user_email The user's email address.
 * @param array  $meta       Optional. Signup meta data. Default empty array.
 */
function wpmu_signup_user($user, $user_email, $meta = array())
{
}
/**
 * Send a confirmation request email to a user when they sign up for a new site. The new site will not become active
 * until the confirmation link is clicked.
 *
 * This is the notification function used when site registration
 * is enabled.
 *
 * Filter {@see 'wpmu_signup_blog_notification'} to bypass this function or
 * replace it with your own notification behavior.
 *
 * Filter {@see 'wpmu_signup_blog_notification_email'} and
 * {@see 'wpmu_signup_blog_notification_subject'} to change the content
 * and subject line of the email sent to newly registered users.
 *
 * @since MU (3.0.0)
 *
 * @param string $domain     The new blog domain.
 * @param string $path       The new blog path.
 * @param string $title      The site title.
 * @param string $user_login The user's login name.
 * @param string $user_email The user's email address.
 * @param string $key        The activation key created in wpmu_signup_blog()
 * @param array  $meta       Optional. Signup meta data. By default, contains the requested privacy setting and lang_id.
 * @return bool
 */
function wpmu_signup_blog_notification($domain, $path, $title, $user_login, $user_email, $key, $meta = array())
{
}
/**
 * Send a confirmation request email to a user when they sign up for a new user account (without signing up for a site
 * at the same time). The user account will not become active until the confirmation link is clicked.
 *
 * This is the notification function used when no new site has
 * been requested.
 *
 * Filter {@see 'wpmu_signup_user_notification'} to bypass this function or
 * replace it with your own notification behavior.
 *
 * Filter {@see 'wpmu_signup_user_notification_email'} and
 * {@see 'wpmu_signup_user_notification_subject'} to change the content
 * and subject line of the email sent to newly registered users.
 *
 * @since MU (3.0.0)
 *
 * @param string $user_login The user's login name.
 * @param string $user_email The user's email address.
 * @param string $key        The activation key created in wpmu_signup_user()
 * @param array  $meta       Optional. Signup meta data. Default empty array.
 * @return bool
 */
function wpmu_signup_user_notification($user_login, $user_email, $key, $meta = array())
{
}
/**
 * Activate a signup.
 *
 * Hook to {@see 'wpmu_activate_user'} or {@see 'wpmu_activate_blog'} for events
 * that should happen only when users or sites are self-created (since
 * those actions are not called when users and sites are created
 * by a Super Admin).
 *
 * @since MU (3.0.0)
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param string $key The activation key provided to the user.
 * @return array|WP_Error An array containing information about the activated user and/or blog
 */
function wpmu_activate_signup($key)
{
}
/**
 * Create a user.
 *
 * This function runs when a user self-registers as well as when
 * a Super Admin creates a new user. Hook to {@see 'wpmu_new_user'} for events
 * that should affect all new users, but only on Multisite (otherwise
 * use {@see'user_register'}).
 *
 * @since MU (3.0.0)
 *
 * @param string $user_name The new user's login name.
 * @param string $password  The new user's password.
 * @param string $email     The new user's email address.
 * @return int|false Returns false on failure, or int $user_id on success
 */
function wpmu_create_user($user_name, $password, $email)
{
}
/**
 * Create a site.
 *
 * This function runs when a user self-registers a new site as well
 * as when a Super Admin creates a new site. Hook to {@see 'wpmu_new_blog'}
 * for events that should affect all new sites.
 *
 * On subdirectory installations, $domain is the same as the main site's
 * domain, and the path is the subdirectory name (eg 'example.com'
 * and '/blog1/'). On subdomain installations, $domain is the new subdomain +
 * root domain (eg 'blog1.example.com'), and $path is '/'.
 *
 * @since MU (3.0.0)
 *
 * @param string $domain     The new site's domain.
 * @param string $path       The new site's path.
 * @param string $title      The new site's title.
 * @param int    $user_id    The user ID of the new site's admin.
 * @param array  $meta       Optional. Array of key=>value pairs used to set initial site options.
 *                           If valid status keys are included ('public', 'archived', 'mature',
 *                           'spam', 'deleted', or 'lang_id') the given site status(es) will be
 *                           updated. Otherwise, keys and values will be used to set options for
 *                           the new site. Default empty array.
 * @param int    $network_id Optional. Network ID. Only relevant on multi-network installations.
 * @return int|WP_Error Returns WP_Error object on failure, the new site ID on success.
 */
function wpmu_create_blog($domain, $path, $title, $user_id, $meta = array(), $network_id = 1)
{
}
/**
 * Notifies the network admin that a new site has been activated.
 *
 * Filter {@see 'newblog_notify_siteadmin'} to change the content of
 * the notification email.
 *
 * @since MU (3.0.0)
 *
 * @param int    $blog_id    The new site's ID.
 * @param string $deprecated Not used.
 * @return bool
 */
function newblog_notify_siteadmin($blog_id, $deprecated = '')
{
}
/**
 * Notifies the network admin that a new user has been activated.
 *
 * Filter {@see 'newuser_notify_siteadmin'} to change the content of
 * the notification email.
 *
 * @since MU (3.0.0)
 *
 * @param int $user_id The new user's ID.
 * @return bool
 */
function newuser_notify_siteadmin($user_id)
{
}
/**
 * Checks whether a site name is already taken.
 *
 * The name is the site's subdomain or the site's subdirectory
 * path depending on the network settings.
 *
 * Used during the new site registration process to ensure
 * that each site name is unique.
 *
 * @since MU (3.0.0)
 *
 * @param string $domain     The domain to be checked.
 * @param string $path       The path to be checked.
 * @param int    $network_id Optional. Network ID. Relevant only on multi-network installations.
 * @return int|null The site ID if the site name exists, null otherwise.
 */
function domain_exists($domain, $path, $network_id = 1)
{
}
/**
 * Store basic site info in the blogs table.
 *
 * This function creates a row in the wp_blogs table and returns
 * the new blog's ID. It is the first step in creating a new blog.
 *
 * @since MU (3.0.0)
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param string $domain     The domain of the new site.
 * @param string $path       The path of the new site.
 * @param int    $network_id Unless you're running a multi-network installation, be sure to set this value to 1.
 * @return int|false The ID of the new row
 */
function insert_blog($domain, $path, $network_id)
{
}
/**
 * Install an empty blog.
 *
 * Creates the new blog tables and options. If calling this function
 * directly, be sure to use switch_to_blog() first, so that $wpdb
 * points to the new blog.
 *
 * @since MU (3.0.0)
 *
 * @global wpdb     $wpdb
 * @global WP_Roles $wp_roles
 *
 * @param int    $blog_id    The value returned by insert_blog().
 * @param string $blog_title The title of the new site.
 */
function install_blog($blog_id, $blog_title = '')
{
}
/**
 * Set blog defaults.
 *
 * This function creates a row in the wp_blogs table.
 *
 * @since MU (3.0.0)
 * @deprecated MU
 * @deprecated Use wp_install_defaults()
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param int $blog_id Ignored in this function.
 * @param int $user_id
 */
function install_blog_defaults($blog_id, $user_id)
{
}
/**
 * Notify a user that their blog activation has been successful.
 *
 * Filter {@see 'wpmu_welcome_notification'} to disable or bypass.
 *
 * Filter {@see 'update_welcome_email'} and {@see 'update_welcome_subject'} to
 * modify the content and subject line of the notification email.
 *
 * @since MU (3.0.0)
 *
 * @param int    $blog_id  Blog ID.
 * @param int    $user_id  User ID.
 * @param string $password User password.
 * @param string $title    Site title.
 * @param array  $meta     Optional. Signup meta data. By default, contains the requested privacy setting and lang_id.
 * @return bool
 */
function wpmu_welcome_notification($blog_id, $user_id, $password, $title, $meta = array())
{
}
/**
 * Notify a user that their account activation has been successful.
 *
 * Filter {@see 'wpmu_welcome_user_notification'} to disable or bypass.
 *
 * Filter {@see 'update_welcome_user_email'} and {@see 'update_welcome_user_subject'} to
 * modify the content and subject line of the notification email.
 *
 * @since MU (3.0.0)
 *
 * @param int    $user_id  User ID.
 * @param string $password User password.
 * @param array  $meta     Optional. Signup meta data. Default empty array.
 * @return bool
 */
function wpmu_welcome_user_notification($user_id, $password, $meta = array())
{
}
/**
 * Get the current network.
 *
 * Returns an object containing the 'id', 'domain', 'path', and 'site_name'
 * properties of the network being viewed.
 *
 * @see wpmu_current_site()
 *
 * @since MU (3.0.0)
 *
 * @global WP_Network $current_site
 *
 * @return WP_Network
 */
function get_current_site()
{
}
/**
 * Get a user's most recent post.
 *
 * Walks through each of a user's blogs to find the post with
 * the most recent post_date_gmt.
 *
 * @since MU (3.0.0)
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param int $user_id
 * @return array Contains the blog_id, post_id, post_date_gmt, and post_gmt_ts
 */
function get_most_recent_post_of_user($user_id)
{
}
// Misc functions
/**
 * Get the size of a directory.
 *
 * A helper function that is used primarily to check whether
 * a blog has exceeded its allowed upload space.
 *
 * @since MU (3.0.0)
 *
 * @param string $directory Full path of a directory.
 * @return int Size of the directory in MB.
 */
function get_dirsize($directory)
{
}
/**
 * Get the size of a directory recursively.
 *
 * Used by get_dirsize() to get a directory's size when it contains
 * other directories.
 *
 * @since MU (3.0.0)
 * @since 4.3.0 $exclude parameter added.
 *
 * @param string $directory Full path of a directory.
 * @param string $exclude   Optional. Full path of a subdirectory to exclude from the total.
 * @return int|false Size in MB if a valid directory. False if not.
 */
function recurse_dirsize($directory, $exclude = \null)
{
}
/**
 * Check an array of MIME types against a whitelist.
 *
 * WordPress ships with a set of allowed upload filetypes,
 * which is defined in wp-includes/functions.php in
 * get_allowed_mime_types(). This function is used to filter
 * that list against the filetype whitelist provided by Multisite
 * Super Admins at wp-admin/network/settings.php.
 *
 * @since MU (3.0.0)
 *
 * @param array $mimes
 * @return array
 */
function check_upload_mimes($mimes)
{
}
/**
 * Update a blog's post count.
 *
 * WordPress MS stores a blog's post count as an option so as
 * to avoid extraneous COUNTs when a blog's details are fetched
 * with get_site(). This function is called when posts are published
 * or unpublished to make sure the count stays current.
 *
 * @since MU (3.0.0)
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param string $deprecated Not used.
 */
function update_posts_count($deprecated = '')
{
}