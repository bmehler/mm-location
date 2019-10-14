<?php

namespace MM\Location;

/**
 * Save metabox country.
 */

function city_callback( $post) {

    wp_nonce_field( '_city_nonce', 'city_nonce' );

    $value = get_post_meta( $post->ID, 'city', true );
    echo '
        <table class="form-table">
            <tr>
                <th scope="row">
                    <label for="city">' . __('Company City') . '</label>
                </th>
                <td>
                    <input type="text" class="regular-text code" name="city" id="city" value="'.  esc_attr( $value ) . '"/><br>' . PHP_EOL . '
                </td>
            </tr>
        </table>' . PHP_EOL;

}

function city_meta_box_save( $post_id, $post, $update ) {

    $post_type = get_post_type($post_id);

    if ( "location" != $post_type ) return;

    if ( isset( $_POST['city'] )  ) {
        $country = sanitize_text_field( $_POST['city'] );
        update_post_meta( $post_id, 'city', $country );
    } else {
        update_post_meta( $post_id, 'city', FALSE );
    }
}

add_action( 'save_post', 'MM\Location\city_meta_box_save', 10, 3 );