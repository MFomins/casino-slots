<?php

if (!defined('ABSPATH')) {
	die;
}

/**
 * Global Shared Class for the plugin
 * 
 * @package Casino_Slots
 * @subpackage Casino_Slots/includes
 * @author Kristaps
 */

if (!class_exists('Slot_Games_Global')) {
    class Slot_Games_Global
    {
        protected static $template_loader;

        public static function template_loader()
        {
            if (empty(self::$template_loader)) {
                self::set_template_loader();
            }

            return self::$template_loader;
        }

        public static function set_template_loader()
        {
            //template for CPT casino
            require_once CASINO_SLOTS_BASE_DIR . 'public/class-casino-slots-template-loader.php';

            self::$template_loader = new Slot_Games_Template_Loader();
        }
    }
}
