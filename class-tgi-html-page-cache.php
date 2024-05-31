<?php

class TGI_HTML_Page_Cache {

    private $cache_dir;

    public function __construct() {
        $this->cache_dir = WP_CONTENT_DIR . '/cache/tgi-html-page-cache/';
        if (!file_exists($this->cache_dir)) {
            mkdir($this->cache_dir, 0755, true);
        }
    }

    public function init() {
        add_action('template_redirect', [$this, 'start_cache']);
        add_action('shutdown', [$this, 'end_cache']);
        add_action('admin_menu', [$this, 'admin_menu']);
    }

    public function start_cache() {
        if ($this->is_cachable()) {
            $cache_file = $this->get_cache_file();
            if (file_exists($cache_file)) {
                echo file_get_contents($cache_file);
                exit;
            } else {
                ob_start();
            }
        }
    }

    public function end_cache() {
        if ($this->is_cachable() && ob_get_length()) {
            $content = ob_get_flush();
            file_put_contents($this->get_cache_file(), $content);
        }
    }

    private function is_cachable() {
        // Add logic to determine if the page should be cached
        return is_page();
    }

    private function get_cache_file() {
        $url = $_SERVER['REQUEST_URI'];
        $hash = md5($url);
        return $this->cache_dir . $hash . '.html';
    }

    public function admin_menu() {
        add_options_page('TGI HTML Page Cache', 'TGI HTML Page Cache', 'manage_options', 'tgi-html-page-cache', [$this, 'settings_page']);
    }

    public function settings_page() {
        if (isset($_POST['clear_cache'])) {
            $this->clear_cache();
            echo '<div class="updated"><p>Cache cleared.</p></div>';
        }
        ?>
        <div class="wrap">
            <h1>TGI HTML Page Cache Settings</h1>
            <form method="post" action="">
                <?php wp_nonce_field('tgi_html_page_cache_clear', 'tgi_html_page_cache_nonce'); ?>
                <p>
                    <input type="submit" name="clear_cache" class="button button-primary" value="Clear Cache">
                </p>
            </form>
        </div>
        <?php
    }

    private function clear_cache() {
        $files = glob($this->cache_dir . '*');
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }
    }
}
