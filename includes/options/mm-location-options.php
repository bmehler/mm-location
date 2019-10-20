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
    register_setting('mm-location-option-group', 'location_select_option_field');
    register_setting('mm-location-option-group', 'location_radio_option_field');
}
 
function mm_location_submenu_page_callback() {
    ?>
    <div class="location-wrap">
        <div id="icon-tools" class="icon32"></div>
        <h2>Options Examples</h2>
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
                        <li>
                            <input type="checkbox" name="location_checkbox_field" value="1" <?php checked(1, get_option('location_checkbox_field'), true);?> class="location_checkbox_field" />
                        </li>
                    </ul>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Test Select Box</th>
                <td>
                    <select name="location_select_option_field">
                        <option value="Napoli" <?php selected(get_option('location_select_option_field'), "Napoli"); ?>>Pizza Napoli</option>
                        <option value="Funghi" <?php selected(get_option('location_select_option_field'), "Funghi"); ?>>Pizza Funghi</option>
                        <option value="Mare" <?php selected(get_option('location_select_option_field'), "Mare"); ?>>Pizza Mare</option>
                        <option value="Tonno" <?php selected(get_option('location_select_option_field'), "Tonno"); ?>>Pizza Tonno</option>
                    </select>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Test Radio Select</th>
                <td>
                    <input type="radio" name="location_radio_option_field" value="male" <?php checked(get_option('location_radio_option_field'), "male"); ?>> Male<br>
                    <input type="radio" name="location_radio_option_field" value="female" <?php checked(get_option('location_radio_option_field'), "female"); ?>> Female<br>
                    <input type="radio" name="location_radio_option_field" value="other" <?php checked(get_option('location_radio_option_field'), "other"); ?>> Other<br> 
                </td>
            </tr>
        </table>

        <?php submit_button(); ?>
        
        </form>
    </div>
    <?php
}