<?php

if (!defined('ABSPATH')) {
    die;
}

/**
 * The template for displaying casino posts
 */

get_header();

?>

		<?php
        // Start the loop.
        while (have_posts()) :
            the_post();

            include CASINO_SLOTS_BASE_DIR . 'templates/single/content-slot.php';

        endwhile;
        ?>
<?php get_footer(); ?>
