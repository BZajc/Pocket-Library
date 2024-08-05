<?php

function plp_auth_modal_render_cb($atts) {
    ob_start();
    ?>
    <div class="wp-block-pocket-library-plus-auth-modal">
        <div class="auth-form-overlay"></div>
        <!-- Modal body -->
        <div class="auth-form-container">
            <!-- Modal tabs -->
            <div class="auth-form-columns">
                <div class="auth-image-column">
                    <div class="auth-text-container">
                        <?php
                        if (is_user_logged_in()) {
                            ?>
                            <h2 class="auth-h2">Hello <span class="auth-subtext-blue"><?php echo esc_html(wp_get_current_user()->display_name); ?></span></h2>
                            <p class="auth-subtext">We're glad to have you here. Enjoy your personalized content, resources, and community interactions. Dive back in and explore what's new!</p>
                            <?php
                        } else {
                            ?>
                            <h2 class="auth-h2">Join Our Community</h2>
                            <p class="auth-subtext">Sign up today and unlock access to <span class="auth-subtext-blue">exclusive content</span>, <span class="auth-subtext-blue">resources</span>, and a <span class="auth-subtext-blue">vibrant community</span>. Connect, learn, and grow with us!</p>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="auth-form-column">
                    <div class="auth-topside-row">
                        <?php
                        if (!is_user_logged_in()) {
                        ?>
                        <ul class="auth-tabs">
                            <!-- Login Tab -->
                            <li>
                                <a href="#auth-login-form" class="auth-active-tab">LOGIN</a>
                            </li>
                            <?php 
                            if ($atts['showRegister']) {
                                ?>
                                <!-- Register Tab -->
                                <li>
                                    <a href="#auth-register-form" class="">REGISTER</a>
                                </li>
                                <?php
                            }
                        }
                            ?>
                        </ul>
                        <button class="auth-close-button">&#x2716;</button>
                    </div>
                    <!-- Form and Settings Column-->
                    <?php
                    if (is_user_logged_in()) {
                        $current_user = wp_get_current_user();
                        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_user_info'])) {
                            // Security
                            check_admin_referer('update_user_info_nonce');

                            // Sanitize
                            $first_name = sanitize_text_field($_POST['first_name']);
                            $last_name = sanitize_text_field($_POST['last_name']);

                            // Update
                            wp_update_user(array(
                                'ID' => $current_user->ID,
                                'first_name' => $first_name,
                                'last_name' => $last_name
                            ));
                        }
                        ?>
                            <div>
                                <h4 class="auth-section-name">Account Info</h4>
                                <p class="auth-remember">Remember, your ID and email are private data, and you shouldn't show them to anyone</p>
                                <ul>
                                    <h5 class="auth-sub-section-name auth-sub-section-name-private">Private</h5>
                                    <li class="auth-user-data auth-user-data-private">ID: <?php echo esc_html($current_user->user_login); ?></li>
                                    <li class="auth-user-data auth-user-data-private">Email: <?php echo esc_html($current_user->user_email); ?></li>
                                    <h5 class="auth-sub-section-name auth-sub-section-name-public">Public</h5>
                                    <div class="auth-public-data-container">
                                        <li class="auth-user-data auth-user-data-public">First Name: <?php echo esc_html($current_user->first_name); ?></li>
                                        <li class="auth-user-data auth-user-data-public">Last Name: <?php echo esc_html($current_user->last_name); ?></li>
                                    </div>
                                    <button class="auth-change-button"> Change Info </button>
                                </ul>
                                <form action="" method="post" class="auth-update-form">
                                    <?php wp_nonce_field('update_user_info_nonce'); ?>

                                    <label for="first_name">First Name</label>
                                    <input type="text" name="first_name" id="first_name" value="<?php echo esc_attr($current_user->first_name); ?>">

                                    <label for="last_name">Last Name</label>
                                    <input type="text" name="last_name" id="last_name" value="<?php echo esc_attr($current_user->last_name); ?>">

                                    <button type="submit" name="update_user_info" class="auth-update-button">Update Info</button>
                                </form>
                            </div>
                            <form action="<?php echo esc_url(wp_logout_url(home_url())); ?>" method="post">
                                <button type="submit" class="auth-logout-button">Logout</button>
                            </form>
                        <?php
                    } else {
                        ?>
                        <!-- Login Form -->
                        <form id="auth-login-form">
                            <div class="auth-login-status"></div>
                            <fieldset class="auth-fieldset">
                                <label>Email</label>
                                <input type="text" id="auth-login-email" placeholder="example@example.com">

                                <label>Password</label>
                                <input type="password" id="auth-login-password" placeholder="********">


                                <button class="auth-confirm-button" type="submit">Login</button>
                            </fieldset>
                        </form>
                        <?php 
                        if ($atts['showRegister']) {
                            ?>
                            <!-- Register Form -->
                            <form id="auth-register-form">
                                <div class="auth-register-status"></div>
                                <fieldset class="auth-fieldset">
                                    <label>Name</label>
                                    <input type="text" id="auth-register-name" placeholder="John Doe">

                                    <label>Email</label>
                                    <input type="email" id="auth-register-email" placeholder="example@example.com">

                                    <label>Password</label>
                                    <input type="password" id="auth-register-password" placeholder="********">

                                    <button class="auth-confirm-button" type="submit">Create Account</button>
                                </fieldset>
                            </form>
                            <?php
                        }
                        ?>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}
?>
