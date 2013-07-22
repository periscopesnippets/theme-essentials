<?php
/**
 * Enable theme features
 */
add_theme_support('nice-search');           // Enable /?s= to /search/ redirect
add_theme_support('jquery-cdn');            // Enable to load jQuery from the Google CDN

/**
 * Configuration values
 */
define('POST_EXCERPT_LENGTH', 40);

/**
 * $content_width is a global variable used by WordPress for max image upload sizes
 * and media embeds (in pixels).
 *
 * Example: If the content area is 640px wide, set $content_width = 620; so images and videos will not overflow.
 * Default: 940px is the default Bootstrap container width.
 */
if (!isset($content_width)) { $content_width = 940; }
