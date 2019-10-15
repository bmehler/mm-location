<?php

namespace MM\Location;

add_action('save_post', 'MM\Location\save_location_quick_edit_meta');

function save_location_quick_edit_meta($post_id) {
    $slug = 'location';
    
    if ($slug !== $_POST['post_type']) {
        return;
    }

    if ( !current_user_can('edit_post', $post_id)) {
        return;
    }

    $_POST += array("{$slug}_edit_nonce" => '');
    
    if ( !wp_verify_nonce($_POST["{$slug}_edit_nonce"], plugin_basename( __FILE__ ))) {
        return;
    }

    if ( isset($_REQUEST['country'])) {
        update_post_meta($post_id, 'country', $_REQUEST['country']);
    }
}