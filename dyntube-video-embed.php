<?php
/**
 * Plugin Name: WordPress DynTube Embed
 * Plugin URI: https://github.com/dyntube-com/wordpress-dyntube-embed
 * Description: A plugin to embed DynTube videos with optional user tracking by email and customizable video ratios.
 * Version: 1.2
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
            'track_email' => 'false',
            'ratio' => '16x9',
            'width' => '',
            'height' => '',
        ), $atts, 'dyntube');

        if (empty($atts['iframe_id'])) {
            return 'Error: DynTube iframe ID is required.';
        }

        $iframe_id = sanitize_text_field($atts['iframe_id']);
        $track_email = filter_var($atts['track_email'], FILTER_VALIDATE_BOOLEAN);
        $ratio = $this->parse_ratio($atts['ratio']);
        $width = $atts['width'] ? intval($atts['width']) : '';
        $height = $atts['height'] ? intval($atts['height']) : '';

        $current_user = wp_get_current_user();
        $email = $current_user->user_email;

        $embed_url = "https://videos.dyntube.com/iframes/{$iframe_id}";
        if ($track_email && $email) {
            $embed_url .= "?email=" . urlencode($email);
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