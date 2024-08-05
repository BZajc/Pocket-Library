<?php

// Includes
include(get_theme_file_path('/includes/front/enqueue.php'));
include(get_theme_file_path('/includes/front/head.php'));
include(get_theme_file_path('/includes/setup.php'));
include(get_theme_file_path('/includes/search-filter.php' ));

// Hooks
add_action('wp_enqueue_scripts', 'pl_enqueue');
add_action('wp_head', 'pl_head', 5);
add_action('after_setup_theme', 'pl_setup_theme');
add_filter('pre_get_posts', 'pl_search_only_posts');