<?php 

if (!defined('ABSPATH')) {
	die;
}

/**
 * Template Loader Class
 * 
 * @package Casino_Slots
 * @subpackage Casino_Slots/includes
 * @author Kristaps Ritins <kristaps@yoursite.lv>
 */

if (! class_exists('Slot_Games_Template_Loader')) {

    if (! class_exists('Gamajo_Template_Loader')) {
        require_once CASINO_SLOTS_BASE_DIR . 'vendor/class-gamajo-template-loader.php';
    }

    class Slot_Games_Template_Loader extends Gamajo_Template_Loader {
        // Prefix for filter names
        protected $filter_prefix = 'casino_slots';

        //Directory name where custom templates for this plugin should be found in there.
        protected $theme_template_directory = 'casino-slots';

        //Reference to the root directory path of this plugin
        protected $plugin_directory = CASINO_SLOTS_BASE_DIR;

        //Directory name where templates are found in this plugin
        protected $plugin_template_directory = 'templates';
    }
}

?>