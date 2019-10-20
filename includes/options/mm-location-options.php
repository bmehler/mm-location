<?php

namespace MM\Location;
if (is_admin()){
    add_action('admin_menu', 'MM\Location\register_mm_location_submenu_page');
    add_action('admin_init', 'MM\Location\register_mm_location_settings' );
}
 
function register_mm_location_submenu_page() {
    add_submenu_page(
        'edit.php?post_type=location',
        'Options',
        'Options',
        'manage_options',
        'mm-location-submenu-page',
        'MM\Location\mm_location_submenu_page_callback' );
}

function register_mm_location_settings() {
    register_setting('mm-location-option-input', 'location_input_field');
}
 
function mm_location_submenu_page_callback() {
    ?>
    <div class="location-wrap">
        <div id="icon-tools" class="icon32"></div>
        <h2>Location Options</h2>
        <form method="post" action="options.php">
        <?php settings_fields('mm-location-option-input'); ?>
        <?php do_settings_sections('mm-location-option-input'); ?>
        <table class="form-table">
            <tr valign="top">
                <th scope="row">Test Input Box</th>
                <td><input type="text" name="location_input_field" value="<?php echo esc_attr(get_option('location_input_field')); ?>"/></td>
            </tr>
        </table>

        <?php submit_button(); ?>
        
        </form>
    </div>
    <?php
}