<?php

if (!defined('ABSPATH')) {
    die;
}

if (!function_exists('cs_get_template_loader')) :
    function cs_get_template_loader()
    {
        return Slot_Games_Global::template_loader();
    }
endif;

if (!function_exists('cs_is_archive_slot')) :
    function cs_is_archive_slot()
    {
        return (is_post_type_archive('slot')) ? true : false;
    }
endif;


