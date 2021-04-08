<?php

if (!defined('ABSPATH')) {
	die;
}

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://yoursite.lv
 * @since             1.0.0
 * @package           Casino_Slots
 *
 * @wordpress-plugin
 * Plugin Name:       Casino Slots
 * Plugin URI:        https://yoursite.lv
 * Description:       Create different casino slots
 * Version:           1.0.0
 * Author:            Kristaps Ritins
 * Author URI:        https://yoursite.lv
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       casino-slots
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
defined('CASINO_SLOTS_VERSION') or define('CASINO_SLOTS_VERSION', '1.0.18');

defined('CASINO_SLOTS_NAME') or define('CASINO_SLOTS_NAME', 'casino-slots');

/**
 * Plugin directory path
 */
defined('CASINO_SLOTS_BASE_DIR') or define('CASINO_SLOTS_BASE_DIR', plugin_dir_path(__FILE__));

/**
 * Plugin directory URL
 */
defined('CASINO_SLOTS_PLUGIN_URL') or define('CASINO_SLOTS_PLUGIN_URL', plugin_dir_url(__FILE__));


/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-casino-slots-activator.php
 */
function activate_casino_slots()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-casino-slots-activator.php';
	Slot_Games_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-casino-slots-deactivator.php
 */
function deactivate_casino_slots()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-casino-slots-deactivator.php';
	Slot_Games_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_casino_slots');
register_deactivation_hook(__FILE__, 'deactivate_casino_slots');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-casino-slots.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_casino_slots()
{

	$plugin = new Casino_Slots();
	$plugin->run();
}
run_casino_slots();