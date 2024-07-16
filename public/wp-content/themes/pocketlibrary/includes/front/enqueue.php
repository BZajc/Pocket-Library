<?php

function pl_enqueue(){
    wp_register_style(
        'pl_font_lato_and_pacifico',
        'https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Pacifico&display=swap',
        [],
        null
    );

    wp_register_style(
        'pl_theme',
        get_theme_file_uri('assets/public/index.css')
    );

    wp_enqueue_style('pl_font_lato_and_pacifico');
    wp_enqueue_style('pl_theme');
}