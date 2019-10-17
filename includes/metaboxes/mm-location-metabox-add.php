<?php

namespace MM\Location;

/**
 * Add metaboxes to location posttype.
 */

add_action('add_meta_boxes', 'MM\Location\headquarter_meta_box');
add_action('add_meta_boxes', 'MM\Location\country_meta_box');
add_action('add_meta_boxes', 'MM\Location\company_meta_box');
add_action('add_meta_boxes', 'MM\Location\phone_meta_box');
add_action('add_meta_boxes', 'MM\Location\street_meta_box');
add_action('add_meta_boxes', 'MM\Location\city_meta_box');
add_action('add_meta_boxes', 'MM\Location\email_meta_box');
add_action('add_meta_boxes', 'MM\Location\maps_meta_box');

function headquarter_meta_box() {
    add_meta_box(
        'headquarter',
        __( 'Headquarter', 'mm-location' ),
        'MM\Location\headquarter_callback',
        'location',
        'normal',
        'high'
    );
}

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
        'company',
        __( 'Company', 'mm-location' ),
        'MM\Location\company_callback',
        'location',
        'normal',
        'high'
    );
}

function phone_meta_box() {
    add_meta_box(
        'phone',
        __( 'Phone', 'mm-location' ),
        'MM\Location\phone_callback',
        'location',
        'normal',
        'high'
    );
}

function street_meta_box() {
    add_meta_box(
        'street',
        __( 'Street', 'mm-location' ),
        'MM\Location\street_callback',
        'location',
        'normal',
        'high'
    );
}

function city_meta_box() {
    add_meta_box(
        'city',
        __( 'City', 'mm-location' ),
        'MM\Location\city_callback',
        'location',
        'normal',
        'high'
    );
}

function email_meta_box() {
    add_meta_box(
        'email',
        __( 'E-Mail', 'mm-location' ),
        'MM\Location\email_callback',
        'location',
        'normal',
        'high'
    );
}

function maps_meta_box() {
    add_meta_box(
        'maps',
        __('Maps', 'mm-location' ),
        'MM\Location\maps_callback',
        'location',
        'normal',
        'high'
    );
}