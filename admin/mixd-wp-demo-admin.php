<?php
/**
 * This file should contain all of your functions that you need to fire off when in
 * the WordPress back-end. Please ensure you remember to sanitize your variables if
 * handling $_POST or $_GET data.
 * @see https://developer.wordpress.org/plugins/security/data-validation/
 * @see https://developer.wordpress.org/plugins/security/securing-input/
 */



/**
 * Set up permissions for Administrators and Editors to access the configuration Page
 * of this plugin
 *
 * @since 1.0.0
 */
function mixd_wp_demo_add_caps() {
    $role = get_role('administrator');
    $role->add_cap('mixd_wp_demo_config');
    $role = get_role('editor');
    $role->add_cap('mixd_wp_demo_config');
}

add_action( 'admin_init', 'mixd_wp_demo_add_caps' );



/**
 * Add a sub menu page underneath the existing Mixd Plugins Page
 *
 * @since 1.0.0
 */
function mixd_wp_demo_options_page() {

    add_submenu_page(
        'mixd-wp-plugins',              // $page_title
        'Mixd Plugins: Demo Plugin',    // $menu_title
        'mixd_wp_plugins',              // $capability
        'mixd-wp-demo',                 // $menu_slug
        'mixd_wp_demo_options'          // $callback
    );

}

add_action( 'admin_menu', 'mixd_wp_demo_options_page' );



/**
 * Outputs information on the 'Demo Plugin' Page in WordPress Admin
 *
 * @since 1.0.0
 */
function mixd_wp_demo_options() {
    require_once( plugin_dir_path( __FILE__ ) . 'mixd-wp-demo-options.php' );
}
