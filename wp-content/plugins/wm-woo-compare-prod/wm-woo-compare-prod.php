<?php
/*
Plugin name: добавить продукты в стравнение
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
define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-plugin-name-activator.php
 */
function activate_wcp() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/wcp-activator.php';
	WCP_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-plugin-name-deactivator.php
 */
function deactivate_wcp() {
	// require_once plugin_dir_path( __FILE__ ) . 'includes/class-plugin-name-deactivator.php';
	// Plugin_Name_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wcp' );
register_deactivation_hook( __FILE__, 'deactivate_wcp' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/wcp.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_plugin_name() {
	$wcp_compare = new Wcp();
	$wcp_compare->run();
}
add_action('init', 'run_plugin_name');
