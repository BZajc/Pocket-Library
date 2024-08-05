<?php

function plp_activate_plugin() {
    if(version_compare(get_bloginfo('version'), '6.0', '<')) {
        wp_die(__('Please update the Wordpress to use this plugin'));
    }

    plp_book_post_type();
    flush_rewrite_rules();
}