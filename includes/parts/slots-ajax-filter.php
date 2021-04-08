<?php

if (!defined('ABSPATH')) {
    die;
}

$taxonomies = get_terms(array(
    'taxonomy' => 'slot-category',
    'hide_empty' => false
));


if (!empty($taxonomies)) :
    $output = "<div class='slots-filter'><div class='slots-filter-wrapper'>";

    foreach ($taxonomies as $category) {
        $term_id = $category->term_id;
        $output .= "<a data-category='{$term_id}' class='js-slots-filter slots-button-filter' href='#{$category->slug}'>" . esc_attr($category->name) . '</a>';
    }
    $output .= "</div></div>";
    echo $output;
endif;