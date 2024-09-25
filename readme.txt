=== WordPress DynTube Embed ===
Contributors: Team DynTube
Tags: video, embed, dyntube
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

You can embed DynTube videos in your WordPress site with the option to enable video tracking by user email and customize video dimensions.

== Description ==

WordPress DynTube Embed allows you to easily embed DynTube videos on your WordPress site. It provides a shortcode for embedding videos using the DynTube iframe ID and includes options to track users by email and customize video dimensions.

Features:
* Simple shortcode for embedding DynTube videos
* Toggle option for email tracking
* Responsive video embeds
* Customizable video aspect ratios
* Optional maximum width and height settings

== Installation ==

1. In your WordPress dashboard, navigate to `Plugins`, then select `Add New Plugin`, and click on `Upload Plugin`. Next, upload the `wordpress-dyntube-embed.zip` file. You can download the latest version from `dist` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Use the shortcode [dyntube iframe_id="YOUR_IFRAME_ID"] in your posts or pages.
== Usage ==

Use the following shortcode to embed a DynTube video:

[dyntube iframe_id="YOUR_IFRAME_ID" track_email="true" ratio="16x9" width="800" height="450"]

Parameters:
* iframe_id (required): The ID of the DynTube video iframe
* track_email (optional): Set to "true" or "false" to enable or disable email tracking (default: "false")
* ratio (optional): Set the aspect ratio of the video (e.g., "16x9", "4x3", "1x1") (default: "16x9")
* width (optional): Set the maximum width of the video in pixels
* height (optional): Set the maximum height of the video in pixels

Examples:
1. Default 16:9 ratio:
   [dyntube iframe_id="kt0E5TY8ABGTYkl4gf6uFQ"]

2. Custom 9:16 ratio:
   [dyntube iframe_id="kt0E5TY8ABGTYkl4gf6uFQ" ratio="9x16"]

3. Custom ratio with max width:
   [dyntube iframe_id="kt0E5TY8ABGTYkl4gf6uFQ" ratio="4x3" width="800"]

4. Custom ratio with max height:
   [dyntube iframe_id="kt0E5TY8ABGTYkl4gf6uFQ" ratio="1x1" height="600"]

5. Custom ratio with both max width and height:
   [dyntube iframe_id="kt0E5TY8ABGTYkl4gf6uFQ" ratio="16x9" width="1200" height="675"]

= Where to find the iframe_id =

The `iframe_id` serves as the unique identifier for your DynTube video. You can locate it in the DynTube dashboard or retrieve it through the API. Typically, it appears as the final segment of the DynTube video iframe URL.

For example, if your DynTube video URL is:
https://videos.dyntube.com/iframes/kt0E5TY8ABGTYkl4gf6uFQ

Then your iframe_id would be:
kt0E5TY8ABGTYkl4gf6uFQ

== Frequently Asked Questions ==

= How does email tracking work? =

When email tracking is enabled, the plugin will include the current user's email address in the video embed URL. This allows DynTube to associate video views with specific users.

= Can I disable email tracking? =

Yes, you can disable email tracking by setting track_email="false" in the shortcode, or by toggling the switch below each embedded video.

= How do I change the aspect ratio of the video? =

You can use the `ratio` parameter in the shortcode to set a custom aspect ratio. For example, `ratio="4x3"` will set a 4:3 aspect ratio.

= Can I limit the size of the embedded video? =

Yes, you can use the `width` and `height` parameters to set maximum dimensions for the video. The video will maintain its aspect ratio while not exceeding these dimensions.

== Changelog ==

= 1.0 =
* Initial release
