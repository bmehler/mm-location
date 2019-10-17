<?php

namespace MM\Location;

/**
 * Save metabox country.
 */

function headquarter_callback($post) {

    wp_nonce_field( '_headquarter_nonce', 'headquarter_nonce' );

    $headquarter = get_post_meta( $post->ID);
    ?>
        <table class="form-table">
            <tr>
                <th scope="row">
                    <label for="headquarter"><?php echo __('Is headquarter') ?></label>
                </th>
                <td>
                    <input type="checkbox" name="headquarter" id="headquarter" value="yes" <?php if (isset($headquarter['headquarter'])) checked($headquarter['headquarter'][0], 'yes' ); ?> />
                </td>
            </tr>
        </table>
        <?php
}			

function headquarter_meta_box_save( $post_id, $post, $update ) {

    $post_type = get_post_type($post_id);

    if ("location" != $post_type) return;

    if (isset($_POST['headquarter'])) {
        //$headquarter = sanitize_text_field( $_POST['headquarter']);
        update_post_meta($post_id, 'headquarter', 'yes');
    } else {
        update_post_meta($post_id, 'headquarter', 'no');
    }
}

add_action( 'save_post', 'MM\Location\headquarter_meta_box_save', 10, 3 );


//$mytheme_checkbox_value = ( isset( $_POST['mytheme_checkbox_value'] ) && '1' === $_POST['mytheme_checkbox_value'] ) ? 1 : 0; // Input var okay.