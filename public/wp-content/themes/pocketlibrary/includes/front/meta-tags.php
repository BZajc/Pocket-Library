<?php

function custom_meta_tags() {
    if (is_singular()) { // Checks if its a single post page or custom post type
        global $post;

        $description = has_excerpt($post) ? get_the_excerpt($post) : get_bloginfo('description');

        $keywords = "online library, book reviews, reading community, book shop";
        
        // Print meta tags
        echo '<meta name="description" content="' . esc_attr($description) . '">' . "\n";
        echo '<meta name="keywords" content="' . esc_attr($keywords) . '">' . "\n";
        
        // Open Graph meta tags
        echo '<meta property="og:title" content="' . esc_attr(get_the_title()) . '">' . "\n";
        echo '<meta property="og:description" content="' . esc_attr($description) . '">' . "\n";
        echo '<meta property="og:url" content="' . esc_url(get_permalink()) . '">' . "\n";
        echo '<meta property="og:image" content="' . esc_url(get_the_post_thumbnail_url($post)) . '">' . "\n";
        
        // Twitter Card meta tags
        echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
        echo '<meta name="twitter:site" content="@yourtwitterhandle">' . "\n";
        echo '<meta name="twitter:title" content="' . esc_attr(get_the_title()) . '">' . "\n";
        echo '<meta name="twitter:description" content="' . esc_attr($description) . '">' . "\n";
        echo '<meta name="twitter:image" content="' . esc_url(get_the_post_thumbnail_url($post)) . '">' . "\n";
    }
}