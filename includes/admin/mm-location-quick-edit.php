<?php

namespace MM\Location;

add_action('quick_edit_custom_box', 'MM\Location\display_custom_quickedit_book', 10, 2);

function display_custom_quickedit_book( $column_name, $post_type ) {
    static $printNonce = TRUE;
    if ( $printNonce ) {
        $printNonce = FALSE;
        wp_nonce_field( plugin_basename( __FILE__ ), 'location_edit_nonce' );
    }

    ?>
    <fieldset class="inline-edit-location">
        <div class="inline-edit-col column-<?php echo $column_name; ?>">
            <label class="inline-edit-group">
            <?php 
                switch ( $column_name ) {
                case 'country':
                    ?><span class="mm-quick-edit-country">Country</span><input name="country" /><?php
                    break;
                case 'company':
                    ?><span class="mm-quick-edit-company">Company</span><input name="company" /><?php
                    break;
                case 'phone':
                    ?><span class="mm-quick-edit-phone">Phone</span><input name="phone" /><?php
                break;
                case 'street':
                    ?><span class="mm-quick-edit-street">Street</span><input name="street" /><?php
                break;
                case 'city':
                    ?><span class="mm-quick-edit-city">City</span><input name="city" /><?php
                break;
                case 'email':
                    ?><span class="mm-quick-edit-email">E-Mail</span><input name="email" /><?php
                break;
                case 'maps':
                    ?><span class="mm-quick-edit-maps">Maps</span><input name="maps" /><?php
                break;
                }
            ?>
        </label>
      </div>
    </fieldset>
    <?php
}