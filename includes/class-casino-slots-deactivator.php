<?php

if (!defined('ABSPATH')) {
	die;
}

/**
 * Fired during plugin deactivation
 *
 * @link       https://yoursite.lv
 * @since      1.0.0
 *
 * @package    Casino_Slots
 * @subpackage Casino_Slots/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Casino_Slots
 * @subpackage Casino_Slots/includes
 * @author     Kristaps Ritins <kristaps@yoursite.lv>
 */

if (!class_exists('Slot_Games_Dectivator')) :
	class Slot_Games_Deactivator
	{

		/**
		 * Short Description. (use period)
		 *
		 * Long Description.
		 *
		 * @since    1.0.0
		 */
		public static function deactivate()
		{

			//Unregister CPT Casino
			unregister_post_type('slot');

			//Flush rewrite rules
			flush_rewrite_rules();
		}
	}
endif;
