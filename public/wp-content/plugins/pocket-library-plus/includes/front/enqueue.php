<?php

function plp_enqueue_scripts() {
    $authURLs = json_encode([
        'register' => esc_url_raw(rest_url('plp/v1/register')),
        "login" => esc_url_raw(rest_url("plp/v1/login"))
    ]);

    wp_add_inline_script(
        "pocket-library-plus-auth-modal-view-script",
        "const plp_auth_rest = {$authURLs}",
        "before"
    );
}