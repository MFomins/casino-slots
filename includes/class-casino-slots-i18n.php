<?php

if (!defined('ABSPATH')) {
	die;
}

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://yoursite.lv
 * @since      1.0.0
 *
 * @package    Casino_Slots
 * @subpackage Casino_Slots/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Casino_Slots
 * @subpackage Casino_Slots/includes
 * @author     Kristaps Ritins <kristaps@yoursite.lv>
 */

if (!class_exists('Slot_Games_i18n')) :
	class Slot_Games_i18n
	{


		/**
		 * Load the plugin text domain for translation.
		 *
		 * @since    1.0.0
		 */
		public function load_plugin_textdomain()
		{

			load_plugin_textdomain(
				'casino-slots',
				false,
				dirname(dirname(plugin_basename(__FILE__))) . '/languages/'
			);
		}
	}
endif;
