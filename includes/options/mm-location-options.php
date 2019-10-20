<?php

namespace MM\Location;

add_action('admin_menu', 'MM\Location\wpdocs_register_mm_location_submenu_page');
 
function wpdocs_register_mm_location_submenu_page() {
    add_submenu_page(
        'edit.php?post_type=location',
        'Options',
        'Options',
        'manage_options',
        'mm-location-submenu-page',
        'MM\Location\mm_location_submenu_page_callback' );
}
 
function mm_location_submenu_page_callback() {
    echo '<div class="wrap"><div id="icon-tools" class="icon32"></div>';
        echo '<h2>Location Options</h2>';
    echo '</div>';
}