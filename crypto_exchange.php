<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/manishankarvakta
 * @since             1.0.0
 * @package           Crypto_exchange
 *
 * @wordpress-plugin
 * Plugin Name:       All in One WP Crypto Exchange
 * Plugin URI:        https://auroratec.net
 * Description:       All in one Crypto Exchange Feature in wordpress website.
 * Version:           1.0.0
 * Author:            Manishankar Vakta
 * Author URI:        https://github.com/manishankarvakta
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       crypto_exchange
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'CRYPTO_EXCHANGE_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-crypto_exchange-activator.php
 */
function activate_crypto_exchange() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-crypto_exchange-activator.php';
	$activator = new Crypto_exchange_Activator();
	$activator->activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-crypto_exchange-deactivator.php
 */
function deactivate_crypto_exchange() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-crypto_exchange-deactivator.php';
	$deactivator = new Crypto_exchange_Deactivator();
	$deactivator->deactivate();
}

register_activation_hook( __FILE__, 'activate_crypto_exchange' );
register_deactivation_hook( __FILE__, 'deactivate_crypto_exchange' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-crypto_exchange.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_crypto_exchange() {

	$plugin = new Crypto_exchange();
	$plugin->run();

}
run_crypto_exchange();
