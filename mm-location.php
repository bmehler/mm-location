<?php
/**
* Plugin Name: Location Plugin
* Plugin URI: http://www.mehler-medial.de
* Description: Gibt die einzelnen Standortinformationen aus.
* Version: 0.0.1
* Author: Bernhard Mehler
* Author URI: http://www.mehler-medial.de
* License: GPL2
* Text Domain: mm-location
*/
namespace MM\Location;

add_action('plugins_loaded', 'MM\Location\init');

function init() {
    loadTextdomain();
    include_once('includes/posttype/mm-location-posttype.php');
    include_once('includes/posttype/mm-location-taxonomy.php');
    include_once('includes/metaboxes/mm-location-save-headquarter.php');
    include_once('includes/metaboxes/mm-location-save-country.php');
    include_once('includes/metaboxes/mm-location-save-company.php');
    include_once('includes/metaboxes/mm-location-save-phone.php');
    include_once('includes/metaboxes/mm-location-save-street.php');
    include_once('includes/metaboxes/mm-location-save-city.php');
    include_once('includes/metaboxes/mm-location-save-email.php');
    include_once('includes/metaboxes/mm-location-save-maps.php');
    include_once('includes/metaboxes/mm-location-save-info.php');
    include_once('includes/metaboxes/mm-location-metabox-add.php');
    include_once('includes/admin/mm-location-admin-view.php');
    include_once('includes/admin/mm-location-admin-help-tab.php');
    include_once('includes/admin/mm-location-quick-edit.php');
    include_once('includes/admin/mm-location-quick-edit-update-save.php');
    include_once('includes/shortcode/mm-location-shortcode.php');
    include_once('includes/widget/mm-location-widget.php');
    add_action( 'admin_enqueue_scripts', 'MM\Location\register_plugin_styles' );
}
function loadTextdomain() {
    load_plugin_textdomain( 'mm-location', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
}
function register_plugin_styles() {
    wp_register_style('font-awesome-css', plugins_url('mm-location/assets/css/font-awesome/css/font-awesome.css'));
    wp_enqueue_style('font-awesome-css');
    wp_register_style('lottery-styles-css', plugins_url('mm-location/assets/css/styles.css'));
    wp_enqueue_style('lottery-styles-css');
    wp_register_script('location-js', plugins_url('mm-location/assets/js/location.js'));
    wp_enqueue_script('location-js');
}
?>