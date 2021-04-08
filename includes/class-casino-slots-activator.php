<?php

if (!defined('ABSPATH')) {
	die;
}

/**
 * Fired during plugin activation
 *
 * @link       https://yoursite.lv
 * @since      1.0.0
 *
 * @package    Casino_Slots
 * @subpackage Casino_Slots/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Casino_Slots
 * @subpackage Casino_Slots/includes
 * @author     Kristaps Ritins <kristaps@yoursite.lv>
 */

if (!class_exists('Slot_Games_Activator')) :
	class Slot_Games_Activator
	{

		/**
		 * Short Description. (use period)
		 *
		 * Long Description.
		 *
		 * @since    1.0.0
		 */
		public static function activate()
		{
			require_once CASINO_SLOTS_BASE_DIR . 'includes/class-casino-slots-post-types.php';

			//Register CPT 
			$plugin_post_type = new Slot_Games_Post_Types(CASINO_SLOTS_NAME, CASINO_SLOTS_VERSION);

			$plugin_post_type->init();
			
			//Flush permalinks
			flush_rewrite_rules();
		}
	}
endif;
