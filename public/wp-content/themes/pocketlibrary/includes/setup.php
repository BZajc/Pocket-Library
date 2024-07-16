<?php

function pl_setup_theme() {
    add_theme_support('editor-styles');

    add_editor_style([
        'https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Pacifico&display=swap',
        'assets/public/index.css'
    ]);
}