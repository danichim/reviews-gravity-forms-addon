=== Plugin Name ===
Contributors: daneasypromoweb, robixxu
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=NBYM23P9RZFHS
Tags: reviews, gravityforms, survey, leave reviews, feedback
Requires at least: 3.0.1
Tested up to: 3.4
Stable tag: 4.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

To display reviews using shortcode with 2 layouts from gravity forms with survey add-on

== Description ==

You need to have gravity forms plugin and survey addon to display reviews using our shortcode

== Installation ==

1. Upload `reviews-gravity-forms-addon.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Place shortcode in page or post where you want to display

== Frequently Asked Questions ==

== Screenshots ==

1. This screen shot description corresponds to screenshot-1.(png|jpg|jpeg|gif). Note that the screenshot is taken from
the /assets directory or the directory that contains the stable readme.txt (tags or trunk). Screenshots in the /assets
directory take precedence. For example, `/assets/screenshot-1.png` would win over `/tags/4.3/screenshot-1.png`
(or jpg, jpeg, gif).
2. This is the second screen shot

== Changelog ==

= 1.0 =
* Initial release

== Usage Shortcode ==

<code>
// Default
[gravity_reviews feedback="http://localhost/sample-page" type="page" nav="true" per_page="2"]

//Widget
[gravity_reviews feedback="http://localhost/sample-page" type="widget" nav="true"]

// Multiple forms
[gravity_reviews form_id="2" star1="valueOfStarFromForm1" star2="valueOfStarFromForm2" star3="valueOfStarFromForm3" star4="valueOfStarFromForm4" star5="valueOfStarFromForm5" feedback="http://localhost/sample-page"]
</code>

== A brief Markdown Example ==

[markdown syntax]: http://daringfireball.net/projects/markdown/syntax
            "Markdown is what the parser uses to process much of the readme file"

Markdown uses email style notation for blockquotes and I've been told:
> Asterisks for *emphasis*. Double it up  for **strong**.

`<?php code(); // goes in backticks ?>`
