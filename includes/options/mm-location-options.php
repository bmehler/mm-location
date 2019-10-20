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
    register_setting('mm-location-option-group', 'location_input_field');
    register_setting('mm-location-option-group', 'location_checkbox_field');
}
 
function mm_location_submenu_page_callback() {
    ?>
    <div class="location-wrap">
        <div id="icon-tools" class="icon32"></div>
        <h2>Location Options</h2>
        <form method="post" action="options.php">
        <?php settings_fields('mm-location-option-group'); ?>
        <?php do_settings_sections('mm-location-option-group'); ?>
        <table class="form-table">
            <tr valign="top">
                <th scope="row">Test Input Box</th>
                <td>
                    <input type="text" name="location_input_field" value="<?php echo esc_attr(get_option('location_input_field')); ?>"/>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Test Checkbox</th>
                <td>
                    <ul class="location-checkbox" id="id-location-checkbox" >
                        <?php
                            #if(esc_attr(get_option('location_checkbox_field'))) {
                            #    $checked = "checked='checked'";
                            #}
                            # <?php echo $checked 
                        ?>
                        <li>
                            <input type="checkbox" name="location_checkbox_field" value="1" <?php checked(1, get_option('location_checkbox_field'), true);?> class="location_checkbox_field" />
                        </li>
                    </ul>
                </td>
            </tr>
        </table>

        <?php submit_button(); ?>
        
        </form>
    </div>
    <?php
}