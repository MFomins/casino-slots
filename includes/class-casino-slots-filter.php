<?php

if (!defined('ABSPATH')) {
    die;
}

add_action('wp_ajax_nopriv_filters', 'slot_filter_ajax');

add_action('wp_ajax_filters', 'slot_filter_ajax');


function slot_filter_ajax()
{
    $category = $_POST['category'];

    $loop_args = array(
        'post_type' => 'slot',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'slot-category',
                'field'    => 'term_id',
                'terms'    => $category,
                'operator' => 'IN'
            )
        ),

    );

    $loop = new WP_Query($loop_args);

    while ($loop->have_posts()) :
        $loop->the_post();
        include CASINO_SLOTS_BASE_DIR . 'templates/shortcodes/slots-list.php';
    // End the loop.
    endwhile;
    wp_reset_postdata();

    die();
}
