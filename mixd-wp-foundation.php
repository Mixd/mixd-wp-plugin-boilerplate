<?php
/**
 * Mixd WordPress Plugin Foundation
 * - Sets the defaults permissions for Admin & Editor
 * - Adds a Page into WordPress Admin sidebar
 * - Enqueues Mixd plugin stylesheet (sidebar icon)
 *
 * @author      Mixd
 * @version     1.0.0
 *
 */



/**
 * If we're not being loaded by WordPress, abort now
 */
if ( !defined( 'WPINC' ) ) { die; }



/**
 * Set 'Administrator' and 'Editor' roles to have access to Plugin config by default
 *
 * @since 1.0.0
 */
if ( !function_exists( 'mixd_wp_plugin_add_caps' ) ) {
    function mixd_wp_plugin_add_caps() {

        $role = get_role('administrator');
        $role->add_cap('mixd_wp_plugins');

        $role = get_role('editor');
        $role->add_cap('mixd_wp_plugins');

    }

    add_action('admin_init', 'mixd_wp_plugin_add_caps');
}



/**
 * Check to make sure that another plugin has not already registered the plugin
 * splash page. If it does not exist, add a top level Page into the WordPress admin
 * sidebar
 *
 * @var $page_title  string  This is the heading for the page.
 * @var $menu_title  string  This is the title that will appear in the menu.
 * @var $capability  string  Only users with this capability can see this menu page.
 * @var $menu_slug   string  Unique slug to refer to this menu page.
 * @var $callback    string  Name of the function called to render the menu page.
 * @var $icon_url    string  Icon file that is rendered in the menu for this menu page.
 * @var $position    string  This is the position of the menu in the menu hierarchy.
 *
 * @since 1.0.0
 */
if ( empty( $GLOBALS['admin_page_hooks']['mixd-wp-plugins'] ) ) {
    if ( !function_exists( 'mixd_wp_plugin_options_page' ) ) {
        function mixd_wp_plugin_options_page() {
            add_menu_page(
                'Mixd Plugins',     // $page_title
                'Mixd Plugins',     // $menu_title
                'mixd_wp_plugins',  // $capability
                'mixd-wp-plugins',  // $menu_slug
                'mixd_wp_splash',   // $callback
                'dashicons-mixd',   // $icon
                '10'                // $position
            );
        }

        add_action( 'admin_menu', 'mixd_wp_plugin_options_page' );
    }
}


/**
 * Outputs information on the Mixd Plugin Landing Page in WordPress Admin
 *
 * @since 1.0.0
 */
function mixd_wp_splash() {
    //
}



/**
 * Include admin stylesheet if it isn't already enqueued
 *
 * @since 1.0.0
 */
if ( !function_exists( 'mixd_wp_menu_styles' ) ) {
    function mixd_wp_menu_styles() {
        $css = plugins_url( 'assets/css/admin.css', __FILE__ );
        wp_register_style(
            'mixd-wp-admin-styles',
            $css,
            false,
            '1.0.0'
        );
        wp_enqueue_style( 'mixd-wp-admin-styles' );
    }

    add_action( 'admin_enqueue_scripts', 'mixd_wp_menu_styles' );
}
