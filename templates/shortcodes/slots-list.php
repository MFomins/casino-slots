<?php

include CASINO_SLOTS_BASE_DIR . 'templates/slots-meta-data.php';

?>

<div class="single-casino-game">
    <div class="single-casino-game__top">
    <?php the_post_thumbnail()?>
    </div>
    <div class="single-casino-game__bottom">
        <div class="single-casino-game__bottom-wrap">
            <div class="single-game--info">
                <div class="single-game--name"><?php echo $game_title; ?></div>
                <div class="single-game--provider"><?php echo $cg_provider; ?></div>
            </div>
            <div class="single-game--cta">
                <a href="<?php the_permalink(); ?>" target="_blank"><?php echo __('Play for free', 'casino-slots'); ?><i class="fas fa-angle-right"></i></a>
            </div>
        </div>
    </div>
</div>