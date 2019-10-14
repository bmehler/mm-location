<?php

namespace MM\Location;

/**
 * Add metaboxes to location posttype.
 */

add_action('add_meta_boxes', 'MM\Location\country_meta_box');
/*add_action('add_meta_boxes', 'MM\Location\company_meta_box');
add_action('add_meta_boxes', 'MM\Location\phone_meta_box');
add_action('add_meta_boxes', 'MM\Location\street_meta_box');
add_action('add_meta_boxes', 'MM\Location\city_meta_box');
add_action('add_meta_boxes', 'MM\Location\email_meta_box');
add_action('add_meta_boxes', 'MM\Location\maps_meta_box');*/

function country_meta_box() {
    add_meta_box(
        'country',
        __( 'Country', 'mm-location' ),
        'MM\Location\country_callback',
        'location',
        'normal',
        'high'
    );
}

function company_meta_box() {
    add_meta_box(
        'company_box',
        __( 'Company', 'mm-location' ),
        'MM\Location\company_callback',
        'location',
        'normal',
        'high'
    );
}

function phone_meta_box() {
    add_meta_box(
        'phone_box',
        __( 'Phone', 'mm-location' ),
        'MM\Location\phone_callback',
        'location',
        'normal',
        'high'
    );
}

function street_meta_box() {
    add_meta_box(
        'street_box',
        __( 'Street', 'mm-location' ),
        'MM\Location\street_callback',
        'location',
        'normal',
        'high'
    );
}

function city_meta_box() {
    add_meta_box(
        'city_box',
        __( 'City', 'mm-location' ),
        'MM\Location\city_callback',
        'location',
        'normal',
        'high'
    );
}

function email_meta_box() {
    add_meta_box(
        'email_box',
        __( 'E-Mail', 'mm-location' ),
        'MM\Location\email_callback',
        'location',
        'normal',
        'high'
    );
}

function maps_meta_box() {
    add_meta_box(
        'maps_box',
        __('Maps', 'mm-location' ),
        'MM\Location\maps_callback',
        'location',
        'normal',
        'high'
    );
}