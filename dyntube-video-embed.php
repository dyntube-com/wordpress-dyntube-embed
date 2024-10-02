<?php
/**
 * Plugin Name: WordPress DynTube Embed
 * Plugin URI: https://github.com/dyntube-com/wordpress-dyntube-embed
 * Description: A plugin to embed DynTube videos with support for both iframe and JavaScript embed codes, including custom and user-based watermarks.
 * Version: 1.5
 * Author: DynTube Team
 * Author URI: https://www.dyntube.com
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class WordPressDynTubeEmbed {
    public function __construct() {
        add_shortcode('dyntube', array($this, 'dyntube_shortcode'));
    }

    public function dyntube_shortcode($atts) {
        $atts = shortcode_atts(array(
            'iframe_id' => '',
            'channel_key' => '',
            'track_email' => 'false',
            'ratio' => '16x9',
            'width' => '',
            'height' => '',
            'watermark' => '', // Can be 'user', custom text, or empty
        ), $atts, 'dyntube');

        if (empty($atts['iframe_id']) && empty($atts['channel_key'])) {
            return 'Error: Either DynTube iframe ID or channel key is required.';
        }

        $track_email = filter_var($atts['track_email'], FILTER_VALIDATE_BOOLEAN);
        $current_user = wp_get_current_user();
        $email = $current_user->user_email;

        // Determine watermark
        $watermark = $this->get_watermark($atts['watermark'], $current_user);

        if (!empty($atts['channel_key'])) {
            // JavaScript-based embed code
            $channel_key = sanitize_text_field($atts['channel_key']);
            $width = $atts['width'] ? intval($atts['width']) : '';
            $output = $this->generate_js_embed($channel_key, $email, $width, $watermark);
        } else {
            // Iframe-based embed code
            $iframe_id = sanitize_text_field($atts['iframe_id']);
            $ratio = $this->parse_ratio($atts['ratio']);
            $width = $atts['width'] ? intval($atts['width']) : '';
            $height = $atts['height'] ? intval($atts['height']) : '';
            $output = $this->generate_iframe_embed($iframe_id, $track_email, $email, $ratio, $width, $height, $watermark);
        }

        return $output;
    }

    private function get_watermark($watermark_attr, $current_user) {
        if ($watermark_attr === 'user') {
            return $current_user->user_email ?: $current_user->user_login;
        } elseif (!empty($watermark_attr)) {
            return $watermark_attr;
        }
        return '';
    }

    private function generate_js_embed($channel_key, $email, $width, $watermark) {
        $output = '<script>!function(e,t,i){if(void 0===e._dyntube_v1_init){e._dyntube_v1_init=!0;var a=t.createElement("script");a.type="text/javascript",a.async=!0,a.src="https://embed.dyntube.com/v1.0/dyntube.js",t.getElementsByTagName("head")[0].appendChild(a)}}(window,document);</script>';
        
        $style = $width ? sprintf('style="max-width: %dpx; margin: 0 auto;"', $width) : '';
        $output .= sprintf('<div %s>', $style);
        $output .= sprintf('<div data-dyntube-key="%s" data-user-id="%s"%s></div>', 
            esc_attr($channel_key), 
            esc_attr($email),
            $watermark ? sprintf(' data-watermark="%s"', esc_attr($watermark)) : ''
        );
        $output .= '</div>';
        
        return $output;
    }

    private function generate_iframe_embed($iframe_id, $track_email, $email, $ratio, $width, $height, $watermark) {
        $embed_url = "https://videos.dyntube.com/iframes/{$iframe_id}";
        $query_params = array();
        
        if ($track_email && $email) {
            $query_params['email'] = urlencode($email);
        }
        
        if (!empty($watermark)) {
            $query_params['watermark'] = urlencode($watermark);
        }
        
        if (!empty($query_params)) {
            $embed_url .= '?' . http_build_query($query_params);
        }

        $style = $this->generate_container_style($ratio, $width, $height);

        $output = '<div class="dyntube-embed" data-iframe-id="' . esc_attr($iframe_id) . '" data-track-email="' . ($track_email ? 'true' : 'false') . '">';
        $output .= '<div style="' . $style . '">';
        $output .= '<iframe style="position:absolute;top:0;left:0;bottom:0;right:0;width:100%;height:100%;border:none" allow="autoplay; fullscreen" webkitallowfullscreen mozallowfullscreen allowfullscreen src="' . esc_url($embed_url) . '" title="DynTube Video"></iframe>';
        $output .= '</div></div>';

        return $output;
    }

    private function parse_ratio($ratio) {
        $parts = explode('x', strtolower($ratio));
        if (count($parts) === 2 && is_numeric($parts[0]) && is_numeric($parts[1])) {
            return array(intval($parts[0]), intval($parts[1]));
        }
        return array(16, 9); // Default to 16:9 if invalid ratio is provided
    }

    private function generate_container_style($ratio, $width, $height) {
        $padding_top = round(($ratio[1] / $ratio[0]) * 100, 2);
        $style = "position:relative;width:100%;overflow:hidden;padding-top:{$padding_top}%;";

        if ($width) {
            $style .= "max-width:{$width}px;";
        }
        if ($height) {
            $style .= "max-height:{$height}px;";
        }

        return $style;
    }
}

new WordPressDynTubeEmbed();
