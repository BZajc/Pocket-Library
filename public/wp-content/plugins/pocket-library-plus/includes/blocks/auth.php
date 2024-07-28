<?php

function plp_auth_render_cb($atts) {
    ob_start();
    ?>
        <div class="wp-block-pocket-library-plus-auth">
            <?php

                if($atts['showAuth']) {
                    // Check if user is looged in and display the name
                    if (is_user_logged_in()) {
                        $current_user = wp_get_current_user();
                        $user_name = $current_user->display_name;
                    } else {
                        $user_name = 'My Account';
                    }
            ?>
    <a class="auth-container" href="#">
        <div class="auth-icon"><?php echo get_account_icon(); ?></div>
        <div class="auth-text"><?php echo esc_html($user_name); ?></div>
    </a>
    </div>
            <?php
            }

            ?>
        </div>
        <?php

        $output = ob_get_contents();
        ob_end_clean();

        return $output;
}