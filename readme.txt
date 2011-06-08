=== Simple Google +1 Button ===
Contributors: bainternet 
Donate link:http://en.bainternet.info/donations
Tags: google +1, plus one, plus 1, button, google button, share button
Requires at least: 2.9.2
Tested up to: 3.1.3
Stable tag: 1.3

This Plugin lets you add the new Google +1 button to your site or blog.

== Description ==

This Plugin lets you add the new Google +1 button to your site or blog automatically in your posts or pages.

Main features:

*	Automatically button to posts, pages.
*	Easy configuration screen.
*	Four display styles (standard, small, medium, tall).
*	Show \ Hide count.
*	Over 40 languages to choose from.
*	Use as shortcode.
*	Use as template tag for easy integration with your theme or plugin.
*	Use in widgets.
*	
any Feedback is Welcome.

check out my [other plugins][1]

[1]: http://en.bainternet.info/category/plugins

== Installation ==

1.  Upload the plugin directory to the /wp-content/plugins/ directory
1.  Activate the plugin through the \'Plugins\' menu in WordPress
1.  Go to \"Simple Google +1\" option to configure the button
== Frequently Asked Questions ==

= I have Found a Bug, Now what? =

Simply use the <a href=\"http://wordpress.org/tags/simple-g-1-plusone?forum_id=10\">Support Forum</a> and thanks a head for doing that.

= How to use as Widget? =

Create a text widget and insert the shortcode

= How to use Shortcode? =

simply add `[gplusone]`.
you can also configure the shortcode with a few parameters:
1. size: Size of the button , accepts tall,small,medium,standart.
1. count: Show count, accepts true,false
1. callback: use custom callback function, accepts callback function name
eg:
`[gplusone size="small" count="true" callback="my_callback"]`

= How to use in template files? =

`<?php echo do_shortcode('[gplusone]'); ?>`

== Screenshots ==
1. +1 button example

2. Options panel

== Changelog ==
1.3 Fixed all WP_Debug warnings.

1.2 added option to show button before and after the content.
added a div wrapper for button for better styling options.

1.1 fixed shortcode bug.

1.0 initial release.
