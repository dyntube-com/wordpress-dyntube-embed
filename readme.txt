WordPress DynTube Embed

Overview

WordPress DynTube Embed is a plugin that facilitates the integration of DynTube videos and channels into WordPress sites. It provides functionality for video embedding with customizable options, including user tracking and responsive design.

Features

- Shortcode implementation for easy embedding of DynTube videos and channels
- Support for both iframe-based and JavaScript-based embed codes
- Optional email tracking for user analytics (iframe embeds)
- Responsive video embedding
- Customizable video aspect ratios (iframe embeds)
- Configurable maximum dimensions for both embed types

Installation

1. Access your WordPress dashboard and navigate to Plugins > Add New Plugin > Upload Plugin.
2. Upload the wordpress-dyntube-embed.zip file. The latest version is available in the dist directory.
3. Activate the plugin via the 'Plugins' menu in WordPress.

Usage

Shortcode Syntax

Iframe-based Embed (Individual Videos):
[dyntube iframe_id="YOUR_IFRAME_ID" track_email="true" ratio="16x9" width="800" height="450"]

JavaScript-based Embed (Channels or Videos):
[dyntube channel_key="YOUR_CHANNEL_KEY" width="800"]

Parameters

Iframe-based Embed Parameters:
- iframe_id (Required): DynTube video iframe ID
- track_email (Optional): Enable/disable email tracking ("true" or "false"). Default: "false"
- ratio (Optional): Video aspect ratio (e.g., "16x9", "4x3", "1x1"). Default: "16x9"
- width (Optional): Maximum video width in pixels
- height (Optional): Maximum video height in pixels

JavaScript-based Embed Parameters:
- channel_key (Required): DynTube channel or playlist key
- width (Optional): Maximum embed width in pixels
- track_email (Optional): Enable/disable email tracking ("true" or "false"). Default: "false"

Implementation Examples

1. Default 16:9 ratio iframe embed:
   [dyntube iframe_id="kt0E5TY8ABGTYkl4gf6uFQ"]

2. Iframe embed with email tracking:
   [dyntube iframe_id="kt0E5TY8ABGTYkl4gf6uFQ" track_email="true"]

3. Custom 9:16 ratio iframe embed:
   [dyntube iframe_id="kt0E5TY8ABGTYkl4gf6uFQ" ratio="9x16"]

4. JavaScript-based channel embed:
   [dyntube channel_key="NCzHehj8Z0OKtqNE1TbfA"]

5. JavaScript-based channel embed with maximum width:
   [dyntube channel_key="NCzHehj8Z0OKtqNE1TbfA" width="800"]

Identifier Retrieval

iframe_id:
The iframe_id is the unique identifier for a DynTube video. It can be obtained from:
- The DynTube dashboard
- The DynTube API
- The final segment of the DynTube video iframe URL

Example:
For the URL https://videos.dyntube.com/iframes/kt0E5TY8ABGTYkl4gf6uFQ, the iframe_id is kt0E5TY8ABGTYkl4gf6uFQ.

channel_key:
The channel_key can be acquired through:
- The ChannelKey field of a video when fetched using the API
- Clicking on a video title in the dashboard
- The Key field of a channel when fetched using the API
- Clicking the three-dots icon next to the channel name in the dashboard

FAQ

Q: What distinguishes iframe_id from channel_key?
A: iframe_id is used for embedding individual videos via an iframe-based approach, while channel_key is used for embedding entire channels or playlists using a JavaScript-based approach.

Q: How does email tracking function?
A: For iframe-based embeds with email tracking enabled, the plugin includes the current user's email address in the video embed URL, allowing DynTube to associate video views with specific users. JavaScript-based embeds handle email tracking automatically.

Q: Can email tracking be disabled?
A: For iframe-based embeds, set track_email="false" in the shortcode to disable email tracking. JavaScript-based embeds handle email tracking automatically through DynTube.

Q: How can the video aspect ratio be modified?
A: For iframe-based embeds, use the ratio parameter in the shortcode (e.g., ratio="4x3"). JavaScript-based embeds automatically adjust to the content.

Q: Is it possible to limit the size of embedded videos or channels?
A: Yes, use the width parameter to set a maximum width for both embed types. For iframe-based embeds, the height parameter is also available. The content will maintain its aspect ratio within these dimensions.

Changelog

Version 1.0
- Initial release