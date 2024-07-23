<?php

function plp_search_results_header_render_cb($atts) {
    $heading = esc_html($atts['content']);

    if($atts['customText']) {
        $heading = get_the_archive_title();
    }

    ob_start();
    ?>
        <div class="wp-block-pocket-library-plus-search-results-header">
          <h1><?php echo $heading; ?></h1>
        </div>
    <?php
    

    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}