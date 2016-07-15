<?php
/**
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * and registers the activation and deactivation functions.
 *
 * @link              http://github.com/mixd
 * @author            Mixd
 * @version           1.0.0
 * @package           mixd-wp-demo
 *
 * @wordpress-plugin
 * Plugin Name:       Demo Plugin
 * Plugin URI:        https://github.com/mixd
 * Description:       This is an example of a WordPress Plugin
 * Version:           1.0.0
 * Author:            Mixd
 * Author URI:        http://www.mixd.co.uk
 * License:           GPLv3
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       mixd-wp-demo
*/



/**
 * If we're not being loaded by WordPress, abort now
 */
if ( !defined( 'WPINC' ) ) { die; }



/**
 * Load the Mixd Plugin foundation
 *
 * @since 1.0.0
 */
require_once( 'mixd-wp-foundation.php' );



/**
 * Define the title to display in plugin's admin Page
 *
 * @since 1.0.0
 * @return string
 */
function mixd_wp_demo_title() {
    return __("Mixd's demo Plugin for WordPress", "mixd-wp-demo");
}



/**
 * Define a short description to display in the plugin's admin Page
 *
 * @since 1.0.0
 * @return string
 */
function mixd_wp_demo_description() {
    return __("This is a short description about how to use this plugin", "mixd-wp-demo");
}



/**
 * Load the relevant scripts dependant on if the plugin is being loaded on the
 * frontend or the backend
 *
 * @since 1.0.0
 */
if( is_admin() ) {
    require_once( plugin_dir_path(__FILE__) . 'admin/mixd-wp-demo-admin.php' );
} else {
    require_once( plugin_dir_path(__FILE__) . 'public/mixd-wp-demo-public.php' );
}



/**
 * Do something when the plugin is activated from within WordPress
 * - Generally used to set up a new CPT and flush permalinks
 *
 * @since 1.0.0
 */
function mixd_wp_demo_activation() {
    // flush_rewrite_rules();
}

register_activation_hook( __FILE__, 'mixd_wp_demo_activation' );



/**
 * Do something when the plugin is de-activated from within WordPress
 * - Generally used to remove a previously set up CPT and flush permalinks
 *
 * @since 1.0.0
 */
function mixd_wp_demo_deactivation() {
    // flush_rewrite_rules();
}

register_deactivation_hook( __FILE__, 'mixd_wp_demo_deactivation' );



/**
 * Do something when the plugin is uninstalled from within WordPress
 *
 * @since 1.0.0
 */
function mixd_wp_demo_uninstall() {
    //
}

register_uninstall_hook( __FILE__, 'mixd_wp_demo_uninstall' );
