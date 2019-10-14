<?php

namespace MM\Location;

/**
 * Save metabox country.
 */

function country_callback( $post) {

    wp_nonce_field( '_url_nonce', 'url_nonce' );

    $value = get_post_meta( $post->ID, 'url', true );
    echo '
        <table class="form-table">
            <tr>
                <th scope="row">
                    <label for="url">' . __('URL zum Video') . '</label>
                </th>
                <td>
                    <input type="text" class="regular-text code" name="url" id="url" value="'.  esc_attr( $value ) . '"/><br>' . PHP_EOL . '
                    <em>' . __('z.B. http://www.video.uni-erlangen.de/webplayer/id/13953') . '</em>
                </td>
            </tr>
        </table>' . PHP_EOL;

}

function url_meta_box_save( $post_id, $post, $update ) {

    $post_type = get_post_type($post_id);

    if ( "location" != $post_type ) return;

    if ( isset( $_POST['url'] )  ) {
        $url = sanitize_text_field( $_POST['url'] );
        update_post_meta( $post_id, 'url', $url );
    } else {
        update_post_meta( $post_id, 'url', FALSE );
    }
}

add_action( 'save_post', 'MM\Location\url_meta_box_save', 10, 3 );





