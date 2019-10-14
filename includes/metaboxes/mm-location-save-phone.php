<?php

namespace MM\Location;

/**
 * Save metabox country.
 */

function phone_callback( $post) {

    wp_nonce_field( '_phone_nonce', 'phone_nonce' );

    $value = get_post_meta( $post->ID, 'phone', true );
    echo '
        <table class="form-table">
            <tr>
                <th scope="row">
                    <label for="phone">' . __('Phone number') . '</label>
                </th>
                <td>
                    <input type="text" class="regular-text code" name="phone" id="phone" value="'.  esc_attr( $value ) . '"/><br>' . PHP_EOL . '
                </td>
            </tr>
        </table>' . PHP_EOL;

}

function phone_meta_box_save( $post_id, $post, $update ) {

    $post_type = get_post_type($post_id);

    if ( "location" != $post_type ) return;

    if ( isset( $_POST['phone'] )  ) {
        $country = sanitize_text_field( $_POST['phone'] );
        update_post_meta( $post_id, 'phone', $country );
    } else {
        update_post_meta( $post_id, 'phone', FALSE );
    }
}

add_action( 'save_post', 'MM\Location\phone_meta_box_save', 10, 3 );





