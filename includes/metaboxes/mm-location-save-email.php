<?php

namespace MM\Location;

/**
 * Save metabox country.
 */

function email_callback( $post) {

    wp_nonce_field( '_email_nonce', 'email_nonce' );

    $value = get_post_meta( $post->ID, 'email', true );
    echo '
        <table class="form-table">
            <tr>
                <th scope="row">
                    <label for="email">' . __('Company E-Mail') . '</label>
                </th>
                <td>
                    <input type="text" class="regular-text code" name="email" id="email" value="'.  esc_attr( $value ) . '"/><br>' . PHP_EOL . '
                </td>
            </tr>
        </table>' . PHP_EOL;

}

function email_meta_box_save( $post_id, $post, $update ) {

    $post_type = get_post_type($post_id);

    if ( "location" != $post_type ) return;

    if ( isset( $_POST['email'] )  ) {
        $country = sanitize_text_field( $_POST['email'] );
        update_post_meta( $post_id, 'email', $country );
    } else {
        update_post_meta( $post_id, 'email', FALSE );
    }
}

add_action( 'save_post', 'MM\Location\email_meta_box_save', 10, 3 );