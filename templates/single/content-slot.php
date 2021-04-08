<?php

include CASINO_SLOTS_BASE_DIR . 'templates/slots-meta-data.php';

/**
 * The template part for displaying single posts
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('single-game-container'); ?>>
    <div class="game-title">
        <h1><?php the_title(); ?> </h1>
    </div>
    <div class="game-upper-container">
        <div class="game-right">
            <div class="game-right-overlay">
                <div class="play-for-real">
                    <a href="<?php echo $cg_redirect_link;?>" target="_blank"><?php echo __('Play for real money', 'casino-slots'); ?><i class="fas fa-angle-right"></i></a>
                </div>
                <div class="play-for-play">
                    <span><?php echo __('Play for play money', 'casino-slots'); ?><i class="fas fa-angle-right"></i></span>
                </div>
            </div>
            <iframe class="singlegame-iframe" frameborder="0" scrolling="no" allowfullscreen="" src="<?php echo $cg_game_src; ?>"></iframe>
        </div>

        <?php include CASINO_SLOTS_BASE_DIR . 'templates/single/content-info.php'; ?>
    </div>
    <div class="game-lower-container">
        <div class="game-content">
            <?php the_content(); ?>
        </div>
    </div>


</div>