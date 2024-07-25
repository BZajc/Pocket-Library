<?php

function plp_search_form_render_cb($atts) {
    $bgColor = esc_attr($atts['bgColor']);
    $textColor = esc_attr($atts['textColor']);
    $styleAttr = "background-color:{$bgColor};color:{$textColor};";

    ob_start();
    ?>
    <div style="<?php echo $styleAttr; ?>" class="wp-block-pocket-library-plus-search-form">
        </h3>
        <form class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
            <input
                type="text"
                placeholder="<?php esc_html_e("Search", "pocket-library-plus"); ?>"
                class="search-form-input"
                style="<?php echo $styleAttr; ?>"
                name="s"
                value="<?php the_search_query(); ?>"
            />
            <div>
                <button type="submit" class="search-form-button">
                &#x1F50E;
                </button>
            </div>
        </form>
    </div>
    <script>
        function validateSearchForm() {
            var input = document.querySelector('.search-form-input');
            var value = input.value.trim();
            if (value === '') {
                alert('Please enter a search term.');
                return false;
            }
            return true;
        }
    </script>
    <?php

    $output = ob_get_contents();
    ob_end_clean();
    
    return $output;
}