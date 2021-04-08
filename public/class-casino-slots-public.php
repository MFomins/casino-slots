<?php

if (!defined('ABSPATH')) {
	die;
}

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://yoursite.lv
 * @since      1.0.0
 *
 * @package    Casino_Slots
 * @subpackage Casino_Slots/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Casino_Slots
 * @subpackage Casino_Slots/public
 * @author     Kristaps Ritins <kristaps@yoursite.lv>
 */

if (!class_exists('Slot_Games_Public')) :
	class Slot_Games_Public
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
		 * @param      string    $plugin_name       The name of the plugin.
		 * @param      string    $version    The version of this plugin.
		 */
		public function __construct($plugin_name, $version)
		{

			$this->plugin_name = $plugin_name;
			$this->version = $version;
		}

		/**
		 * Register the stylesheets for the public-facing side of the site.
		 *
		 * @since    1.0.0
		 */
		public function enqueue_styles()
		{

			/**
			 * An instance of this class should be passed to the run() function
			 * defined in Slot_Games_Loader as all of the hooks are defined
			 * in that particular class.
			 *
			 * The Slot_Games_Loader will then create the relationship
			 * between the defined hooks and the functions defined in this
			 * class.
			 */

			wp_enqueue_style('roboto', 'https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap');

			wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/casino-slots-public.css', array(), $this->version, 'all');


			if (is_singular('game')) {
				wp_enqueue_style($this->plugin_name . '-single-casino', plugin_dir_url(__FILE__) . 'css/casino-slots-casino-single.css', array(), $this->version, 'all');
			}
		}

		/**
		 * Register the JavaScript for the public-facing side of the site.
		 *
		 * @since    1.0.0
		 */
		public function enqueue_scripts()
		{

			/**
			 * This function is provided for demonstration purposes only.
			 *
			 * An instance of this class should be passed to the run() function
			 * defined in Slot_Games_Loader as all of the hooks are defined
			 * in that particular class.
			 *
			 * The Slot_Games_Loader will then create the relationship
			 * between the defined hooks and the functions defined in this
			 * class.
			 */

			wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/casino-slots-public.js', array('jquery'), $this->version, false);

			//For ajax filter
			wp_enqueue_script('slots-ajax', plugin_dir_url(__FILE__) . 'js/casino-slots-filter.js', array('jquery'), $this->version, true);

			wp_localize_script('slots-ajax', 'wp_ajax', array('ajax_url' => admin_url('admin-ajax.php')));
		}
	}
endif;
