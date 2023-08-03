<?php
/*
Plugin Name: Starter Pack WP BlueWindow
Plugin URI: https://wordpress.com/
Description: Un plugin tout-en-un qui ajoute diverses fonctionnalités à un site WordPress.
Version: 1.0.0
Author: Eagle Consulting Group
Author URI: https://eagle-consultgroup.com/
License: GPLv2 or later
Text Domain: starter-pack-wp-bluewindow
*/

//enqueue du fichier CSS
function spwpbw_enqueue_styles () {
    wp_enqueue_style('spwpbw-plugin-styles', plugin_dir_url(__FILE__) . 'css/bluewindow-styles.css');
}
add_action('wp_enqueue_scripts', 'spwpbw_enqueue_styles');

// Empêcher l'accès direct au fichier
defined( 'ABSPATH' ) || exit;

function spwpbw_uninstall() {
    wp_redirect(admin_url('plugins.php'));
    exit();
}
register_uninstall_hook( __FILE__, 'spwpbw_uninstall' );

// Ajout de l'icône dans le menu wp-admin
function spwpbw_add_menu_icon() {
    $icon_url = plugins_url('icon_bluewindow.png', __FILE__);
    add_menu_page(
        'Starter Pack WP BlueWindow',
        'BlueWindow',
        'manage_options',
        'spwpbw_dashboard',
        'spwpbw_render_dashboard',
        $icon_url,
        3
    );
}
add_action('admin_menu', 'spwpbw_add_menu_icon');

// Page de tableau de bord du plugin
function spwpbw_render_dashboard() {
    require_once(plugin_dir_path(__FILE__) . 'bluewindow-dashboard.php');

}


// Fonctionnalités du plugin.

// Plugin pour avoir variables de jour, mois & année
require_once(plugin_dir_path(__FILE__) . 'includes/bluewindow-dates.php');
require_once(plugin_dir_path(__FILE__) . 'includes/bluewindow-time.php');
require_once(plugin_dir_path(__FILE__) . 'includes/bluewindow-table.php');
?>
