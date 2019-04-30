<?php
/*
Plugin name: добавить продукты в избранное
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
function activate_wwl() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/wwl-activator.php';
	WWL_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-plugin-name-deactivator.php
 */
function deactivate_wwl() {
	// require_once plugin_dir_path( __FILE__ ) . 'includes/class-plugin-name-deactivator.php';
	// Plugin_Name_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wwl' );
register_deactivation_hook( __FILE__, 'deactivate_wwl' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/wwl.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wwl() {
	$wwl_compare = new Wwl();
	$wwl_compare->run();
	wwl_check_available();
}
add_action('init', 'run_wwl');


function wwl_check_available()
{
	if ( is_user_logged_in() ) { 
		global $wpdb; 
		$db_res = $wpdb->get_results( "SELECT product_id FROM " . $wpdb->prefix . "client_id_wishlist_id WHERE client_id = " . get_current_user_id(), ARRAY_A); 
		foreach ($db_res as $key => $value) { 
			if (wc_get_product( $value['product_id'] )->status == 'trash' || !wc_get_product( $value['product_id'] )) {
				$wpdb->delete( $wpdb->prefix . "client_id_wishlist_id", array('product_id' => $value['product_id'] ) ); 
			}
		}	 
	} else { 
		$in_cookie = json_decode( $_COOKIE['wwl_compare'], true );
		foreach ($in_cookie as $key => $value) {
			if (wc_get_product( $value )->status == 'trash' || !wc_get_product( $value )) {
				unset($in_cookie[$key]);
			}
		}
		if ( empty( $in_cookie ) ) { 
			setcookie( 'wwl_compare', null, -1, '/' );
		} else { 
			setcookie(  
				'wwl_compare',  
				json_encode( array_values( $in_cookie) ), 
				time()+60*60*24*380, 
				'/' 
			); 
		} 
	}
}
