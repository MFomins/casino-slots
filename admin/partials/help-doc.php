<?php

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    die;
}

?>

<div class="help-container">
    <div class="help-wrap">
        <h1>Shortcodes</h1>
        <h2>Limit</h2>
        <p><strong>[slots_list limit=5]</strong></p>
        <p>Will output 5 casino slot games</p>
        <p>DEFAULT VALUE: Settings -> Reading -> Blog pages show at most</p>
        <hr>
        <h2>ID</h2>
        <strong>[slots_list ID=1]</strong>
        <p>Will output casino slot with ID=1</p>
        <strong>[slots_list ID=1,2,3,4]</strong> 
        <p>Will output multiple slot games with given ID's</p>
        <strong>To find slot game ID go to Games-> All Games-> Hover the slot game you need-> Look at the bottom of the browser where link is showing. <br>The ID is located after post.php?post=[ID]</strong>
        <hr>
        <h2>Columns</h2>
        <strong>[slots_list col=4]</strong>
        <p>Will output 4 column style</p>
        <p>Available styles: col=2, col=3, col=4</p>
        <p>DEFAULT VALUE: 3 columns</p>
        <hr>
        <h2>Pagination</h2>
        <strong>[slots_list pagination=on]</strong>
        <p>Will turn on pagination.</p>
        <p>DEFAULT VALUE: off</p>
        <hr>
        <h2>Multiple shortcodes combined</h2>
        <strong>[slots_list limit=12 col=4 pagination=on]</strong>
        <p>Will output 12 slot games in 4 columns with pagination</p>
    </div>
</div>