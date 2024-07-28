<?php

function plp_rest_api_init() {
    register_rest_route("plp/v1", "/register", [
        "methods" => WP_REST_Server::CREATABLE,
        "callback" => "plp_rest_api_register_handler",
        "permission_callback" => "__return_true"
    ]);

    register_rest_route('plp/v1', '/login', [
        'methods' => WP_REST_Server::EDITABLE,
        "callback" => "plp_rest_api_login_handler",
        "permission_callback" => "__return_true"
    ]);
}