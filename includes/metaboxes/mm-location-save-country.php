<?php

namespace MM\Location;

/**
 * Save metabox country.
 */

function country_callback( $post) {

    wp_nonce_field( '_country_nonce', 'country_nonce' );

    $value = get_post_meta( $post->ID, 'country', true );
    echo '
        <table class="form-table">
            <tr>
                <th scope="row">
                    <label for="country">' . __('Subsidiary Country') . '</label>
                </th>
                <td>
                    <input type="text" class="regular-text code" name="country" id="country" value="'.  esc_attr( $value ) . '"/><br>' . PHP_EOL . '
                </td>
            </tr>
        </table>' . PHP_EOL;

}

function country_meta_box_save( $post_id, $post, $update ) {

    $post_type = get_post_type($post_id);

    if ( "location" != $post_type ) return;

    if ( isset( $_POST['country'] )  ) {
        $country = sanitize_text_field( $_POST['country'] );
        update_post_meta( $post_id, 'country', $country );
    } else {
        update_post_meta( $post_id, 'country', FALSE );
    }
}

add_action( 'save_post', 'MM\Location\country_meta_box_save', 10, 3 );





