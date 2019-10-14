<?php

namespace MM\Location;

/**
 * Save metabox country.
 */

function maps_callback( $post) {

    wp_nonce_field( '_maps_nonce', 'maps_nonce' );

    $value = get_post_meta( $post->ID, 'maps', true );
    echo '
        <table class="form-table">
            <tr>
                <th scope="row">
                    <label for="maps">' . __('Company Location') . '</label>
                </th>
                <td>
                    <input type="text" class="regular-text code" name="maps" id="maps" value="'.  esc_attr( $value ) . '"/><br>' . PHP_EOL . '
                </td>
            </tr>
        </table>' . PHP_EOL;

}

function maps_meta_box_save( $post_id, $post, $update ) {

    $post_type = get_post_type($post_id);

    if ( "location" != $post_type ) return;

    if ( isset( $_POST['maps'] )  ) {
        $country = sanitize_text_field( $_POST['maps'] );
        update_post_meta( $post_id, 'maps', $country );
    } else {
        update_post_meta( $post_id, 'maps', FALSE );
    }
}

add_action( 'save_post', 'MM\Location\maps_meta_box_save', 10, 3 );





