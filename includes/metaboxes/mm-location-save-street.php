<?php

namespace MM\Location;

/**
 * Save metabox country.
 */

function street_callback( $post) {

    wp_nonce_field( '_street_nonce', 'street_nonce' );

    $value = get_post_meta( $post->ID, 'street', true );
    echo '
        <table class="form-table">
            <tr>
                <th scope="row">
                    <label for="street">' . __('Company Street') . '</label>
                </th>
                <td>
                    <input type="text" class="regular-text code" name="street" id="street" value="'.  esc_attr( $value ) . '"/><br>' . PHP_EOL . '
                </td>
            </tr>
        </table>' . PHP_EOL;

}

function street_meta_box_save( $post_id, $post, $update ) {

    $post_type = get_post_type($post_id);

    if ( "location" != $post_type ) return;

    if ( isset( $_POST['street'] )  ) {
        $country = sanitize_text_field( $_POST['street'] );
        update_post_meta( $post_id, 'street', $country );
    } else {
        update_post_meta( $post_id, 'street', FALSE );
    }
}

add_action( 'save_post', 'MM\Location\street_meta_box_save', 10, 3 );





