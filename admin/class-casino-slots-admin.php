<?php

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
	die;
}

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://yoursite.lv
 * @since      1.0.0
 *
 * @package    Casino_Slots
 * @subpackage Casino_Slots/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Casino_Slots
 * @subpackage Casino_Slots/admin
 * @author     Kristaps Ritins <kristaps@yoursite.lv>
 */

if (!class_exists('Slot_Games_Admin')) :
	class Slot_Games_Admin
	{

		/**
		 * The ID of this plugin.
		 *
		 * @since    1.0.0
		 * @access   private
		 * @var      string    $plugin_name    The ID of this plugin.
		 */
		private $plugin_name;

		/**
		 * The version of this plugin.
		 *
		 * @since    1.0.0
		 * @access   private
		 * @var      string    $version    The current version of this plugin.
		 */
		private $version;

		/**
		 * Initialize the class and set its properties.
		 *
		 * @since    1.0.0
		 * @param      string    $plugin_name       The name of this plugin.
		 * @param      string    $version    The version of this plugin.
		 */
		public function __construct($plugin_name, $version)
		{

			$this->plugin_name = $plugin_name;
			$this->version = $version;
		}

		/**
		 * Register the stylesheets for the admin area.
		 *
		 * @since    1.0.0
		 */
		public function enqueue_styles()
		{
			wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/casino-slots-admin.css', array(), $this->version, 'all');
		}

		/**
		 * Register the JavaScript for the admin area.
		 *
		 * @since    1.0.0
		 */
		public function enqueue_scripts()
		{
			wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/casino-slots-admin.js', array('jquery'), $this->version, false);
		}

		public function add_admin_menu()
		{
			add_submenu_page(
				'edit.php?post_type=slot',
				'Help',
				'Help',
				'manage_options',
				'casino-slots',
				array( $this, 'admin_page_display' )
			);
		}

		public function admin_page_display() {
			include_once CASINO_SLOTS_BASE_DIR . 'admin/partials/help-doc.php';
		}
	}
endif;
