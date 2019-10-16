<?php

namespace MM\Location;

add_action('save_post', 'MM\Location\save_location_quick_edit_meta');

function save_location_quick_edit_meta($post_id) {
    $post_type = get_post_type($post_id);

    if ('location' != $post_type) return;

    if (isset( $_REQUEST['mm-quick-edit-country'])) {
        $country = sanitize_text_field($_REQUEST['mm-quick-edit-country']);
        update_post_meta($post_id, 'mm-quick-edit-country', $country);
    } else {
        update_post_meta($post_id, 'mm-quick-edit-country', FALSE);
    }
}