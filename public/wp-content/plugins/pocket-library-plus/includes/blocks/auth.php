<?php

function plp_auth_render_cb($atts) {
    ob_start();
    ?>
        <div class="wp-block-pocket-library-plus-auth">
            <?php

                if($atts['showAuth']) {
                ?>
                    <a class="auth-container" href="#">
                        <div class="auth-icon"><?php echo get_account_icon(); ?></div>
                        <div class="auth-text">My Account</div>
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