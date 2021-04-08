<?php

if (!defined('ABSPATH')) {
	die;
}

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://yoursite.lv
 * @since      1.0.0
 *
 * @package    Casino_Slots
 * @subpackage Casino_Slots/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Casino_Slots
 * @subpackage Casino_Slots/includes
 * @author     Kristaps Ritins <kristaps@yoursite.lv>
 */

if (!class_exists('Casino_Slots')) :
	class Casino_Slots
	{

		/**
		 * The loader that's responsible for maintaining and registering all hooks that power
		 * the plugin.
		 *
		 * @since    1.0.0
		 * @access   protected
		 * @var      Slot_Games_Loader    $loader    Maintains and registers all hooks for the plugin.
		 */
		protected $loader;

		/**
		 * The unique identifier of this plugin.
		 *
		 * @since    1.0.0
		 * @access   protected
		 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
		 */
		protected $plugin_name;

		/**
		 * The current version of the plugin.
		 *
		 * @since    1.0.0
		 * @access   protected
		 * @var      string    $version    The current version of the plugin.
		 */
		protected $version;

		/**
		 * Define the core functionality of the plugin.
		 *
		 * Set the plugin name and the plugin version that can be used throughout the plugin.
		 * Load the dependencies, define the locale, and set the hooks for the admin area and
		 * the public-facing side of the site.
		 *
		 * @since    1.0.0
		 */
		public function __construct()
		{
			if (defined('CASINO_SLOTS_VERSION')) {
				$this->version = CASINO_SLOTS_VERSION;
			} else {
				$this->version = '1.0.0';
			}

			if (defined('CASINO_SLOTS_NAME')) {
				$this->plugin_name = CASINO_SLOTS_NAME;
			} else {
				$this->plugin_name = 'casino-slots';
			}

			$this->load_dependencies();

			$this->set_locale();

			$this->define_admin_hooks();

			$this->define_public_hooks();

			$this->define_slots_hooks();

			$this->define_slot_shortcode_hooks();

		}

		/**
		 * Load the required dependencies for this plugin.
		 *
		 * Include the following files that make up the plugin:
		 *
		 * - Slot_Games_Loader. Orchestrates the hooks of the plugin.
		 * - Slot_Games_i18n. Defines internationalization functionality.
		 * - Slot_Games_Admin. Defines all hooks for the admin area.
		 * - Slot_Games_Public. Defines all hooks for the public side of the site.
		 *
		 * Create an instance of the loader which will be used to register the hooks
		 * with WordPress.
		 *
		 * @since    1.0.0
		 * @access   private
		 */
		private function load_dependencies()
		{
			/**
			 * Class that is holding shared methods across all classes
			 */
			require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-casino-slots-global.php';

			/**
			 * Contains helper functions for plugin
			 */
			require_once plugin_dir_path(dirname(__FILE__)) . 'includes/helper-functions.php';

			/**
			 * The class responsible for orchestrating the actions and filters of the
			 * core plugin.
			 */
			require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-casino-slots-loader.php';

			/**
			 * The class responsible for defining internationalization functionality
			 * of the plugin.
			 */
			require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-casino-slots-i18n.php';

			/**
			 * The class responsible for defining all actions that occur in the admin area.
			 */
			require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-casino-slots-admin.php';

			/**
			 * The class responsible for defining all actions that occur in the public-facing
			 * side of the site.
			 */
			require_once plugin_dir_path(dirname(__FILE__)) . 'public/class-casino-slots-public.php';

			/**
			 * The class responsible for defining all actions for registering custom post types
			 */
			require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-casino-slots-post-types.php';

			/**
			 * Requiring CMB2 init file for meta boxes
			 */
			require_once plugin_dir_path(dirname(__FILE__)) . 'vendor/CMB2/init.php';

			/**
			 * This class is responsible for defining all shortcodes related functionality
			 */
			require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-casino-slots-shortcodes.php';

			/**
			 * This class is responsible for slot filters functionality
			 */
			require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-casino-slots-filter.php';



			$this->loader = new Slot_Games_Loader();
		}

		/**
		 * Define the locale for this plugin for internationalization.
		 *
		 * Uses the Slot_Games_i18n class in order to set the domain and to register the hook
		 * with WordPress.
		 *
		 * @since    1.0.0
		 * @access   private
		 */
		private function set_locale()
		{

			$plugin_i18n = new Slot_Games_i18n();

			$this->loader->add_action('plugins_loaded', $plugin_i18n, 'load_plugin_textdomain');
		}

		/**
		 * Register all of the hooks related to the admin area functionality
		 * of the plugin.
		 *
		 * @since    1.0.0
		 * @access   private
		 */
		private function define_admin_hooks()
		{

			$plugin_admin = new Slot_Games_Admin($this->get_plugin_name(), $this->get_version());

			$this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_styles');
			$this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts');

			//Admin menu hook
			$this->loader->add_action('admin_menu', $plugin_admin, 'add_admin_menu');
			
			//Hooks for admin_init
			// $this->loader->add_action('admin_init', $plugin_admin, 'admin_init');
			

		}

		/**
		 * Register all of the hooks related to the public-facing functionality
		 * of the plugin.
		 *
		 * @since    1.0.0
		 * @access   private
		 */
		private function define_public_hooks()
		{

			$plugin_public = new Slot_Games_Public($this->get_plugin_name(), $this->get_version());

			$this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_styles');
			$this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_scripts');
		}

		/**
		 * Run the loader to execute all of the hooks with WordPress.
		 *
		 * @since    1.0.0
		 */
		public function run()
		{
			$this->loader->run();
		}

		/**
		 * The name of the plugin used to uniquely identify it within the context of
		 * WordPress and to define internationalization functionality.
		 *
		 * @since     1.0.0
		 * @return    string    The name of the plugin.
		 */
		public function get_plugin_name()
		{
			return $this->plugin_name;
		}

		/**
		 * The reference to the class that orchestrates the hooks with the plugin.
		 *
		 * @since     1.0.0
		 * @return    Slot_Games_Loader    Orchestrates the hooks of the plugin.
		 */
		public function get_loader()
		{
			return $this->loader;
		}

		/**
		 * Retrieve the version number of the plugin.
		 *
		 * @since     1.0.0
		 * @return    string    The version number of the plugin.
		 */
		public function get_version()
		{
			return $this->version;
		}


		/**
		 * Defining all action and filter hooks for registering custom post types
		 */

		function define_slots_hooks()
		{
			$plugin_post_types = new Slot_Games_Post_Types($this->get_plugin_name(), $this->get_version());

			$this->loader->add_action('init', $plugin_post_types, 'init');

			$this->loader->add_filter('single_template', $plugin_post_types,  'single_template_slot');

			$this->loader->add_filter('archive_template', $plugin_post_types,  'archive_template_slot');

			$this->loader->add_action('cmb2_admin_init', $plugin_post_types, 'register_cmb2_metabox_slot');

		}


		/**
		 * Define all shortcodes for the plugin
		 */
		public function define_slot_shortcode_hooks()
		{

			$plugin_shortcodes = new Slot_Games_Shortcodes(
				$this->get_plugin_name(),
				$this->get_version()
			);
			
			add_shortcode('slots_list', array($plugin_shortcodes, 'slots_list'));

		}
	}
endif;
