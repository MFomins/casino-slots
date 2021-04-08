<?php 

if (!defined('ABSPATH')) {
	die;
}
/**
 * SOURCE IMAGE / IFRAME
 */

$cg_game_src = get_post_meta(get_the_ID(), 'cg_game_src', true);

$cg_redirect_link = get_post_meta(get_the_ID(), 'cg_redirect_link', true);

/**
 * TITLE
 */
$game_title = get_the_title();

/**
 * INFO FIELDS
 */

$cg_provider = get_post_meta(get_the_ID(), 'cg_provider', true);

$cg_released = get_post_meta(get_the_ID(), 'cg_released', true);

$cg_paylines = get_post_meta(get_the_ID(), 'cg_paylines', true);

$cg_reels = get_post_meta(get_the_ID(), 'cg_reels', true);;

$cg_min_per_line = get_post_meta(get_the_ID(), 'cg_min_per_line', true);

$cg_max_per_line = get_post_meta(get_the_ID(), 'cg_max_per_line', true);

$cg_rtp = get_post_meta(get_the_ID(), 'cg_rtp', true);

$cg_jackpot = get_post_meta(get_the_ID(), 'cg_jackpot', true);



