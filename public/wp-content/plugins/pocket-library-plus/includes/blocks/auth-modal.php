<?php

function plp_auth_modal_render_cb($atts) {
    ob_start();
    ?>
    <div class="wp-block-pocket-library-plus-auth-modal">
        <div class="auth-form-overlay">
            <!-- Modal body -->
            <div class="auth-form-container">
                <!-- Modal tabs -->
                <div class="auth-form-columns">
                    <div class="auth-image-column">
                        <div class="auth-text-container">
                            <h2 class="auth-h2">Join Our Community</h2>
                            <p class="auth-subtext">Sign up today and unlock access to <span class="auth-subtext-blue">exclusive content</span>, <span class="auth-subtext-blue">resources</span>, and a <span class="auth-subtext-blue">vibrant community</span>. Connect, learn, and grow with us!</p>
                        </div>
                    </div>
                    <div class="auth-form-column">
                        <div class="auth-topside-row">
                            <ul class="auth-tabs">
                                <!-- Login Tab -->
                                <li>
                                    <a href="#auth-login-form" class="auth-active-tab">
                                        LOGIN
                                    </a>
                                </li>
                                <?php 
                                if($atts['showRegister']){
                                    ?>
                                    <!-- Register Tab -->
                                    <li>
                                        <a href="#auth-register-form">
                                            REGISTER
                                        </a>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                            <button class="auth-close-button">&#x2716;</button>
                        </div>
                        <!-- Login Form -->
                        <form id="auth-login-form">
                            <div class="auth-login-status"></div>
                            <fieldset class="auth-fieldset">
                                <label>Username or Email</label>
                                <input type="text" class="auth-login-email" placeholder="example@example.com">

                                <label>Password</label>
                                <input type="password" class="auth-login-password"
                                placeholder="********">

                                <button class="auth-confirm-button" type="submit">Login</button>
                            </fieldset>
                        </form>
                        <?php 
                        if($atts['showRegister']){
                            ?>
                            <!-- Register Form -->
                            <form id="auth-register-form">
                                <div class="auth-register-status"></div>
                                <fieldset class="auth-fieldset">
                                    <label>Name</label>
                                    <input type="text" class="auth-register-name" placeholder="John Doe">

                                    <label>Email</label>
                                    <input type="email" class="auth-register-email" placeholder="example@example.com">

                                    <label>Password</label>
                                    <input type="password" class="auth-register-password"
                                    placeholder="********">

                                    <button class="auth-confirm-button" type="submit">Create Account</button>
                                </fieldset>
                            </form>
                            <?php
                        }
                        ?>
                    </div>
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
