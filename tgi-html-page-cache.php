<?php
/**
 * Plugin Name: TGI HTML Page Cache
 * Description: A plugin to cache specific pages as HTML files for faster loading.
 * Version: 1.0
 * Author: Syed
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Include the caching class
include_once plugin_dir_path(__FILE__) . 'includes/class-tgi-html-page-cache.php';

// Initialize the plugin
function tgi_html_page_cache_init() {
    $tgi_html_page_cache = new TGI_HTML_Page_Cache();
    $tgi_html_page_cache->init();
}
add_action('plugins_loaded', 'tgi_html_page_cache_init');
