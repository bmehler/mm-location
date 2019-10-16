<?php

namespace MM\Location;

if (!function_exists('wp_my_admin_enqueue_scripts')) :
    function wp_my_admin_enqueue_scripts( $hook ) {
    
        if ('edit.php' === $hook &&
            isset($_GET['post_type']) &&
            'location' === $_GET['post_type']) {
            //var_dump($_GET);    
            wp_enqueue_script('mm-location-edit', plugins_url('mm-location/assets/js/admin-edit.js'), false, null, true );
        }
    }
    endif;

add_action('admin_enqueue_scripts', 'MM\Location\wp_my_admin_enqueue_scripts');