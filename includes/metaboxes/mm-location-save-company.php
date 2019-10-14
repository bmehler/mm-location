<?php

namespace MM\Location;

/**
 * Save metabox country.
 */

function company_callback( $post) {

    wp_nonce_field( '_company_nonce', 'company_nonce' );

    $value = get_post_meta( $post->ID, 'company', true );
    echo '
        <table class="form-table">
            <tr>
                <th scope="row">
                    <label for="company">' . __('Company name') . '</label>
                </th>
                <td>
                    <input type="text" class="regular-text code" name="company" id="company" value="'.  esc_attr( $value ) . '"/><br>' . PHP_EOL . '
                </td>
            </tr>
        </table>' . PHP_EOL;

}

function company_meta_box_save( $post_id, $post, $update ) {

    $post_type = get_post_type($post_id);

    if ( "location" != $post_type ) return;

    if ( isset( $_POST['company'] )  ) {
        $country = sanitize_text_field( $_POST['company'] );
        update_post_meta( $post_id, 'company', $country );
    } else {
        update_post_meta( $post_id, 'company', FALSE );
    }
}

add_action( 'save_post', 'MM\Location\company_meta_box_save', 10, 3 );





