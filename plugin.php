<?php
/**
 * Plugin Name: JSON REST API Yoast routes 
 * Description: Adds Yoast fields to page and post metadata 
 * Author: jmfurlott<jmfurlott@gmail.com>
 * Author URI: https://jmfurlott.com
 * Author: nabilfreeman<nabil+oss@freemans.website>
 * Author URI: http://freemans.website
 * Version: 1.0.0
 * Plugin URI: https://github.com/jmfurlott/wp-api-yoast
 */
function wp_api_encode_yoast($data, $post, $context) {
    $yoastMeta = array(
        'special_focus_keyword' => get_post_meta($post->ID, '_yoast_wpseo_focuskw', true),
        'page_title' => get_post_meta($post->ID, '_yoast_wpseo_title', true),
        'page_description' => get_post_meta($post->ID, '_yoast_wpseo_metadesc', true),
        'page_linkex' => get_post_meta($post->ID, '_yoast_wpseo_linkdex', true),
        'page_keywords' => get_post_meta($post->ID, '_yoast_wpseo_metakeywords', true),
        'robots-noindex' => get_post_meta($post->ID, '_yoast_wpseo_meta-robots-noindex', true),
        'robots-nofollow' => get_post_meta($post->ID, '_yoast_wpseo_meta-robots-nofollow', true),
        'robots-adv' => get_post_meta($post->ID, '_yoast_wpseo_meta-robots-adv', true),
        'canonical' => get_post_meta($post->ID, '_yoast_wpseo_canonical', true),
        'redirect' => get_post_meta($post->ID, '_yoast_wpseo_redirect', true),
        'og-title' => get_post_meta($post->ID, '_yoast_wpseo_opengraph-title', true),
        'og-description' => get_post_meta($post->ID, '_yoast_wpseo_opengraph-description', true),
        'og-image' => get_post_meta($post->ID, '_yoast_wpseo_opengraph-image', true),
        'twitter-title' => get_post_meta($post->ID, '_yoast_wpseo_twitter-title', true),
        'twitter-description' => get_post_meta($post->ID, '_yoast_wpseo_twitter-description', true),
        'twitter-image' => get_post_meta($post->ID, '_yoast_wpseo_twitter-image', true)
    );

    $data->data['yoast_meta'] = (array) $yoastMeta;

    return $data;
}

add_filter('rest_prepare_post', 'wp_api_encode_yoast', 10, 3);
add_filter('rest_prepare_page', 'wp_api_encode_yoast', 10, 3);
