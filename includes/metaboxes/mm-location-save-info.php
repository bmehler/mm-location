<?php

namespace MM\Location;

/**
 * Save metabox country.
 */

function info_callback( $post) {

    wp_nonce_field( '_info_nonce', 'info_nonce' );

    $value = get_post_meta( $post->ID, 'info', true );
    echo '
        <table class="form-table">
            <tr>
                <th scope="row">
                    <label for="info">' . __('Company Info') . '</label>
                </th>
                <td>
                    <textarea class="regular-text code" name="info" id="info" cols="35" rows="4">'.  esc_attr( $value ) . '</textarea> 	' . PHP_EOL . '
                </td>
            </tr>
        </table>' . PHP_EOL;

}

function info_meta_box_save( $post_id, $post, $update ) {

    $post_type = get_post_type($post_id);

    if ( "location" != $post_type ) return;

    if ( isset( $_POST['info'] )  ) {
        $country = sanitize_text_field( $_POST['info'] );
        update_post_meta( $post_id, 'info', $country );
    } else {
        update_post_meta( $post_id, 'info', FALSE );
    }
}

add_action( 'save_post', 'MM\Location\info_meta_box_save', 10, 3 );