<?php

function plp_register_blocks() {

    $blocks = [
        [ 'name' => 'example-block'],
        ['name' => 'search-form', 'options' => [
            'render_callback' => 'plp_search_form_render_cb'
        ]],
        [ "name" => "search-results-header", "options" => [
            "render_callback" => "plp_search_results_header_render_cb"
        ]],
        ['name' => 'auth', 'options' => [
            "render_callback" => "plp_auth_render_cb"
        ]]
    ];

    foreach($blocks as $block) {
        register_block_type(
            PLP_PLUGIN_DIR . 'build/blocks/' . $block['name'],
            $block['options'] ?? []
        );
    }
}
