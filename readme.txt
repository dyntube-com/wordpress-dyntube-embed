WordPress DynTube Embed

Overview

WordPress DynTube Embed is a plugin that facilitates the integration of DynTube videos and channels into WordPress sites. It provides functionality for video embedding with customizable options, including user tracking, responsive design, and watermarking.

Features

- Shortcode implementation for easy embedding of DynTube videos and channels
- Support for both iframe-based and JavaScript-based embed codes
- Optional email tracking for user analytics (iframe embeds)
- Responsive video embedding
- Customizable video aspect ratios (iframe embeds)
- Configurable maximum dimensions for both embed types
- Watermarking support for both custom text and user-based watermarks

Installation

1. Access your WordPress dashboard and navigate to Plugins > Add New Plugin > Upload Plugin.
2. Upload the wordpress-dyntube-embed.zip file. The latest version is available in the dist directory.
3. Activate the plugin via the 'Plugins' menu in WordPress.

Usage

Shortcode Syntax

Iframe-based Embed (Individual Videos):
[dyntube iframe_id="YOUR_IFRAME_ID" track_email="true" ratio="16x9" width="800" height="450" watermark="user"]

JavaScript-based Embed (Channels or Videos):
[dyntube channel_key="YOUR_CHANNEL_KEY" width="800" watermark="MY-CUSTOM-WATERMARK"]

Parameters

Iframe-based Embed Parameters:
- iframe_id (Required): DynTube video iframe ID
- track_email (Optional): Enable/disable email tracking ("true" or "false"). Default: "false"
- ratio (Optional): Video aspect ratio (e.g., "16x9", "4x3", "1x1"). Default: "16x9"
- width (Optional): Maximum video width in pixels
- height (Optional): Maximum video height in pixels
- watermark (Optional): Custom watermark text or "user" for user-based watermark

JavaScript-based Embed Parameters:
- channel_key (Required): DynTube channel key or video's channel key
- width (Optional): Maximum embed width in pixels
- track_email (Optional): Enable/disable email tracking ("true" or "false"). Default: "false"
- watermark (Optional): Custom watermark text or "user" for user-based watermark

Implementation Examples

1. Default 16:9 ratio iframe embed:
   [dyntube iframe_id="kt0E5TY8ABGTYkl4gf6uFQ"]

2. Iframe embed with email tracking and user-based watermark:
   [dyntube iframe_id="kt0E5TY8ABGTYkl4gf6uFQ" track_email="true" watermark="user"]

3. Custom 9:16 ratio iframe embed with custom watermark:
   [dyntube iframe_id="kt0E5TY8ABGTYkl4gf6uFQ" ratio="9x16" watermark="MY-COMPANY"]

4. JavaScript-based channel embed with user-based watermark:
   [dyntube channel_key="NCzHehj8Z0OKtqNE1TbfA" watermark="user"]

5. JavaScript-based channel embed with maximum width and custom watermark:
   [dyntube channel_key="NCzHehj8Z0OKtqNE1TbfA" width="800" watermark="COPYRIGHT-2024"]

Identifier Retrieval

[... existing content ...]

FAQ

[... existing questions ...]

Q: How does the watermark feature work?
A: The watermark feature allows you to add a text overlay to embedded videos. You can use a custom text watermark by specifying it in the watermark parameter, or use "user" to automatically use the current WordPress user's email or username as the watermark.

Q: Can I disable the watermark?
A: Yes, simply omit the watermark parameter from the shortcode to embed videos without a watermark.

Changelog

Version 1.1
- Added watermark support for both iframe and JavaScript-based embeds

Version 1.0
- Initial release