<?php

namespace MM\Location;

if (!function_exists('wp_my_admin_enqueue_scripts')) :
    function wp_my_admin_enqueue_scripts( $hook ) {
    
        if ('edit.php' === $hook &&
            isset($_GET['post_type']) &&
            'location' === $_GET['post_type']) {
            wp_enqueue_script('mm-location-edit', plugins_url('mm-location/assets/js/admin-edit.js'), false, null, true );
        }
    }
    endif;

    add_action('admin_enqueue_scripts', 'MM\Location\wp_my_admin_enqueue_scripts');
    //add_action('manage_location_posts_custom_column' , 'MM\Location\custom_location_column', 10, 2);

    function custom_location_column($column, $post_id) {
        switch ($column) {
          case 'country':
            $country = get_post_meta($post_id , 'country' , true);
                echo "<input type='text' value=" . $country ."/>";
            break;
        }
    }